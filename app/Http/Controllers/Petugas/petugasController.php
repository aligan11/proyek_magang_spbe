<?php

namespace App\Http\Controllers\Petugas;

use App\Http\Controllers\Controller;
use App\Models\Layanan_spbe;
use App\Models\Mandate;
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

    public function index()
    {
        /** @var \App\Models\User $user */
        $user = auth()->guard('petugas')->user();

        if (!$user) {
            return redirect()->route('login');
        }

        // Statistik mengecek status_ver di tabel ticket (layanan_spbe)
        $stats = [
            'total'   => $user->mandates()->count(),
            'pending' => $user->mandates()->whereHas('ticket', function ($q) {
                $q->where('status_ver', self::STATUS_PENDING)
                    ->orWhereNull('status_ver');
            })->count(),
            'selesai' => $user->mandates()->whereHas('ticket', function ($q) {
                $q->where('status_ver', self::STATUS_SELESAI);
            })->count(),
        ];

        $latestTasks = $user->mandates()
            ->with(['ticket', 'ticket.jenis_layanan'])
            ->latest()
            ->take(5)
            ->get();

        $title = 'Dashboard';

        return view('petugas.index', compact('stats', 'latestTasks', 'user', 'title'));
    }

    public function tugas()
    {
        /** @var \App\Models\User $user */
        $user = auth()->guard('petugas')->user();

        if (!$user) {
            return redirect()->route('login');
        }

        $stats = [
            'total'   => $user->mandates()->count(),
            'pending' => $user->mandates()->whereHas('ticket', function ($q) {
                $q->where('status_ver', self::STATUS_PENDING)
                    ->orWhereNull('status_ver');
            })->count(),
            'selesai' => $user->mandates()->whereHas('ticket', function ($q) {
                $q->where('status_ver', self::STATUS_SELESAI);
            })->count(),
        ];

        $tasks = $user->mandates()
            ->with(['ticket', 'ticket.jenis_layanan'])
            ->latest()
            ->paginate(10);

        $title = 'Tugas Saya';

        return view('petugas.tugas', compact('tasks', 'stats', 'user', 'title'));
    }

    public function show($id)
    {
        /** @var \App\Models\User $user */
        $user = auth()->guard('petugas')->user();

        if (!$user) {
            return redirect()->route('login');
        }

        // Cari mandat milik user yang login
        $mandate = $user->mandates()
            ->with(['ticket', 'ticket.jenis_layanan', 'ticket.instansi_rel'])
            ->findOrFail($id);

        $task = $mandate->ticket;
        $title = 'Detail Mandat';

        return view('petugas.show', compact('task', 'mandate', 'user', 'title'));
    }

    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:selesai',
            'ketver' => 'required|string',
            'berkasver' => 'nullable|file|mimes:pdf,jpg,png,zip|max:5120',
        ]);

        /** @var \App\Models\User $user */
        $user = auth()->guard('petugas')->user();

        if (!$user) {
            return redirect()->route('login');
        }

        // 1. Ambil Mandate & Ticket terkait
        $mandate = $user->mandates()->findOrFail($id);
        $task = $mandate->ticket; // Model Layanan_spbe

        // 2. Siapkan data update untuk tabel layanan_spbe
        $dataTicket = [
            'status_ver' => self::STATUS_SELESAI, // Angka 2
            'ketver'     => $request->ketver,
            'verby'      => $user->name,
            'tglver'     => now(),
        ];

        // 3. Proses File jika ada
        if ($request->hasFile('berkasver')) {
            $file = $request->file('berkasver');
            $fileName = 'ver_' . time() . '_' . str_replace(' ', '_', $file->getClientOriginalName());
            $file->move(public_path('storage/doc'), $fileName);
            $dataTicket['berkasver'] = $fileName;
        }

        // 4. Update tabel Layanan_spbe
        $task->update($dataTicket);

        // 5. Update kolom deskripsi/status di pivot jika memang diperlukan 
        // (Namun karena status_ver ada di table layanan_spbe, update di atas sudah cukup)

        return redirect()->route('petugas.tugas')->with('success', 'Mandat telah diselesaikan!');
    }

    public function profile()
    {
        /** @var \App\Models\User $user */
        $user = auth()->guard('petugas')->user();

        if (!$user) {
            return redirect()->route('login');
        }

        $title = 'Profil';
        return view('petugas.profile', compact('user', 'title'));
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'password' => 'required|confirmed|min:8',
        ]);

        /** @var \App\Models\User $user */
        $user = auth()->guard('petugas')->user();

        if (!$user) {
            return redirect()->route('login');
        }

        if (!Hash::check($request->current_password, $user->password)) {
            return back()->withErrors(['current_password' => 'Password saat ini tidak sesuai']);
        }

        $user->update(['password' => Hash::make($request->password)]);

        return back()->with('success', 'Password berhasil diperbarui!');
    }
}
