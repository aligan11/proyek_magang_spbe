<?php

namespace App\Http\Controllers\Petugas;

use App\Http\Controllers\Controller;
use App\Models\Berita_acara_pemeriksaan;
use App\Models\Layanan_spbe;
use App\Models\Notification;
use App\Models\Tindak_lanjut_layanan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class PetugasController extends Controller
{
    // Konstanta Status (berdasarkan status_ver di table layanan_spbe)
    const STATUS_PENDING = 1; // Jika NULL juga dianggap 1
    const STATUS_SELESAI = 2;
    const STATUS_PROSES  = 3;

    // Helper to get notifications data
    private function getNotificationsData($userId)
    {
        $notifications = Notification::where('user_id', $userId)
            ->where('is_read', false)
            ->latest()
            ->get();
        $unreadCount = $notifications->count();
        return compact('notifications', 'unreadCount');
    }

    public function index()
    {
        $idPetugas = Auth::guard('petugas')->user()->id;
        $user = User::find($idPetugas);

        if (!$user) {
            return redirect()->route('login');
        }

        $notificationData = $this->getNotificationsData($idPetugas);

        // 1. Ambil semua data tindak lanjut layanan
        $allMandat = Tindak_lanjut_layanan::with(['ticket', 'ticket.jenis_layanan'])->latest()->get();

        // 2. Filter data mandats yang di dalamnya mengandung ID petugas ini
        $filteredMandates = $allMandat->filter(function ($mandat) use ($idPetugas) {
            $ids = is_string($mandat->id_petugas) ? json_decode($mandat->id_petugas, true) : $mandat->id_petugas;
            $cleanIds = collect($ids)->map(fn($v) => (int) str_replace(['"', '[', ']', ' '], '', $v))->filter()->toArray();
            return in_array((int)$idPetugas, $cleanIds);
        });

        // 3. Hitung Statistik berdasarkan data yang sudah difilter
        $totalCount = $filteredMandates->count();

        $pendingCount = $filteredMandates->filter(function ($mandat) {
            return optional($mandat->ticket)->status_ver == self::STATUS_PENDING || is_null(optional($mandat->ticket)->status_ver);
        })->count();

        $selesaiCount = $filteredMandates->filter(function ($mandat) {
            return optional($mandat->ticket)->status_ver == self::STATUS_SELESAI;
        })->count();

        $stats = [
            'total'   => $totalCount,
            'pending' => $pendingCount,
            'selesai' => $selesaiCount,
        ];

        // Ambil 5 tugas terbaru untuk dashboard
        $latestTasks = $filteredMandates->take(5);
        $title = 'Dashboard';

        return view('petugas.index', compact('stats', 'latestTasks', 'user', 'title') + $notificationData);
    }

    public function tugas()
    {
        $idPetugas = Auth::guard('petugas')->user()->id;
        $user = User::find($idPetugas);

        if (!$user) {
            return redirect()->route('login');
        }

        $notificationData = $this->getNotificationsData($idPetugas);

        // 1. Fetch all transactional data with eager loaded relations
        $allMandat = Tindak_lanjut_layanan::with(['ticket', 'ticket.jenis_layanan'])->latest()->get();

        // 2. Filter collection and drop broken parent records to prevent null crashes
        $filteredMandates = $allMandat->filter(function ($mandat) use ($idPetugas) {

            // SAFETY POINT: If the ticket parent relation does not exist, drop the row immediately!
            if (is_null($mandat->ticket)) {
                return false;
            }

            $ids = is_string($mandat->id_petugas) ? json_decode($mandat->id_petugas, true) : $mandat->id_petugas;
            $cleanIds = collect($ids)->map(fn($v) => (int) str_replace(['"', '[', ']', ' '], '', $v))->filter()->toArray();
            return in_array((int)$idPetugas, $cleanIds);
        });

        // 3. Compute dashboard counter metric statistics using the clean dataset
        $stats = [
            'total'   => $filteredMandates->count(),
            'pending' => $filteredMandates->filter(function ($mandat) {
                return optional($mandat->ticket)->status_ver == self::STATUS_PENDING || is_null(optional($mandat->ticket)->status_ver);
            })->count(),
            'selesai' => $filteredMandates->filter(function ($mandat) {
                return optional($mandat->ticket)->status_ver == self::STATUS_SELESAI;
            })->count(),
        ];

        // 4. Construct pagination segments from the sanitized list
        $perPage = 10;
        $currentPage = request()->get('page', 1);
        $tasks = new \Illuminate\Pagination\LengthAwarePaginator(
            $filteredMandates->forPage($currentPage, $perPage)->values(),
            $filteredMandates->count(),
            $perPage,
            $currentPage,
            ['path' => request()->url(), 'query' => request()->query()]
        );

        $title = 'Tugas Saya';

        return view('petugas.tugas', compact('tasks', 'stats', 'user', 'title') + $notificationData);
    }

    public function create()
    {
        $idPetugas = Auth::guard('petugas')->user()->id;
        $user = User::find($idPetugas);

        if (!$user) {
            return redirect()->route('login');
        }

        $notificationData = $this->getNotificationsData($idPetugas);

        $allMandat = Tindak_lanjut_layanan::with(['ticket'])->latest()->get();

        $tindakLanjutOptions = $allMandat->filter(function ($mandat) use ($idPetugas) {
            $ids = is_string($mandat->id_petugas) ? json_decode($mandat->id_petugas, true) : $mandat->id_petugas;
            $cleanIds = collect($ids)->map(fn($v) => (int) str_replace(['"', '[', ']', ' '], '', $v))->filter()->toArray();

            return in_array((int) $idPetugas, $cleanIds, true);
        })->values();

        $title = 'Tambah Berita Acara';

        return view('petugas.create', compact('tindakLanjutOptions', 'user', 'title') + $notificationData);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'id_tindak_lanjut' => 'required|exists:tindak_lanjut_layanan,id',
            'ringkasan_pekerjaan' => 'nullable|string',
            'ringkasan_masalah' => 'nullable|string',
            'alternatif_solusi' => 'nullable|string',
            'lokasi' => 'nullable|string|max:255',
        ]);

        $idPetugas = Auth::guard('petugas')->user()->id;
        $mandate = Tindak_lanjut_layanan::findOrFail($validated['id_tindak_lanjut']);
        $ids = is_string($mandate->id_petugas) ? json_decode($mandate->id_petugas, true) : $mandate->id_petugas;
        $cleanIds = collect($ids)->map(fn($v) => (int) str_replace(['"', '[', ']', ' '], '', $v))->filter()->toArray();

        if (!in_array((int) $idPetugas, $cleanIds, true)) {
            abort(403, 'Anda tidak memiliki akses untuk membuat berita acara pada data ini.');
        }

        Berita_acara_pemeriksaan::create($validated);

        return redirect()
            ->route('petugas.index')
            ->with('success', 'Berita acara pemeriksaan berhasil disimpan.');
    }

    // Mark notification as read
    public function markNotificationRead($id)
    {
        $notification = Notification::findOrFail($id);
        $notification->update(['is_read' => true]);
        return back();
    }

    // Mark all notifications as read
    public function markAllNotificationsRead()
    {
        $idPetugas = Auth::guard('petugas')->user()->id;
        Notification::where('user_id', $idPetugas)->update(['is_read' => true]);
        return back();
    }


    public function show($id)
    {
        $idPetugas = Auth::guard('petugas')->user()->id;
        $user = User::find($idPetugas);

        if (!$user) {
            return redirect()->route('login');
        }

        $notificationData = $this->getNotificationsData($idPetugas);

        // Cari data berdasarkan ID utama
        $mandate = Tindak_lanjut_layanan::with(['ticket', 'ticket.jenis_layanan', 'ticket.instansi_rel'])->findOrFail($id);

        // Validasi akses keamanan manual agar petugas lain tidak bisa melihat tiket ini
        $ids = is_string($mandate->id_petugas) ? json_decode($mandate->id_petugas, true) : $mandate->id_petugas;
        $cleanIds = collect($ids)->map(fn($v) => (int) str_replace(['"', '[', ']', ' '], '', $v))->filter()->toArray();

        if (!in_array((int)$idPetugas, $cleanIds)) {
            abort(403, 'Anda tidak memiliki akses ke tugas ini.');
        }

        $task = $mandate->ticket;
        $title = 'Detail Mandat';

        return view('petugas.show', compact('task', 'mandate', 'user', 'title') + $notificationData);
    }

    public function updateStatus(Request $request, $id)
    {

        $request->validate([
            'status' => 'required|in:selesai',
            'ketver' => 'required|string',
            'berkasver' => 'nullable|file|mimes:pdf,jpg,png,zip|max:5120',
        ]);

        $idPetugas = Auth::guard('petugas')->user()->id;
        $user = User::find($idPetugas);

        if (!$user) {
            return redirect()->route('login');
        }

        // Ambil data mandat berdasarkan ID utama
        $mandate = Tindak_lanjut_layanan::findOrFail($id);
        $task = $mandate->ticket;

        // Siapkan data update tiket
        $dataTicket = [
            'status_ver' => self::STATUS_SELESAI,
            'ketver'     => $request->ketver,
            'verby'      => $user->name,
            'tglver'     => now(),
        ];

        // Proses penyimpanan berkas
        if ($request->hasFile('berkasver')) {
            $file = $request->file('berkasver');
            $fileName = 'ver_' . time() . '_' . str_replace(' ', '_', $file->getClientOriginalName());
            $file->move(public_path('storage/doc'), $fileName);
            $dataTicket['berkasver'] = $fileName;
        }

        // Eksekusi update pada table layanan_spbe
        $task->update($dataTicket);

        // Create notification for pemohon
        Notification::create([
            'pemohon_id' => $task->id_pemohon,
            'type' => 'status_completed',
            'message' => "Permohonan Anda dengan nomor registrasi {$task->noreg} telah selesai ditindaklanjuti.",
            'related_id' => $task->id,
            'related_type' => 'layanan_spbe',
            'is_read' => false,
        ]);

        return redirect()->route('petugas.tugas')->with('success', 'Mandat telah diselesaikan!');
    }

    public function profile()
    {
        $idPetugas = Auth::guard('petugas')->user()->id;
        $user = User::find($idPetugas);

        if (!$user) {
            return redirect()->route('login');
        }

        $notificationData = $this->getNotificationsData($idPetugas);
        $title = 'Profil';
        return view('petugas.profile', compact('user', 'title') + $notificationData);
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'password' => 'required|confirmed|min:8',
        ]);

        $idPetugas = Auth::guard('petugas')->user()->id;
        $user = User::find($idPetugas);

        if (!$user) {
            return redirect()->route('login');
        }

        if (!Hash::check($request->current_password, $user->password)) {
            return back()->withErrors(['current_password' => 'Password saat ini tidak sesuai']);
        }

        // Menggunakan instance object hasil User::find($idPetugas) agar terhindar dari error undefined method update()
        $user->update(['password' => Hash::make($request->password)]);

        return back()->with('success', 'Password berhasil diperbarui!');
    }
}
