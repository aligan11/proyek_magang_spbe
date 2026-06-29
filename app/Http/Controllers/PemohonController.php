<?php

namespace App\Http\Controllers;

use App\Models\Jenis_layanan_spbe;
use App\Models\Kebutuhan_layanan_spbe;
use App\Models\Layanan_spbe;
use App\Models\Notification;
use App\Models\Pemohon;
use App\Models\User;
use App\Mail\NewPermohonanMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class PemohonController extends Controller
{
    /**
     * Helper function to get notifications for authenticated pemohon
     */
    private function getPemohonNotifications($pemohonId)
    {
        $notifications = Notification::where('pemohon_id', $pemohonId)
            ->where('is_read', false)
            ->latest()
            ->get();
        $unreadCount = $notifications->count();
        return compact('notifications', 'unreadCount');
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $idPemohon = Auth::guard('pemohon')->user()->id;
        $notificationData = $this->getPemohonNotifications($idPemohon);

        $permohonan = Layanan_spbe::with('jenis_layanan')
            ->where('id_pemohon', $idPemohon)
            ->when($request->search, function ($query) use ($request) {
                $query->where(function ($q) use ($request) {
                    $q->where('noreg', 'like', '%' . $request->search . '%')
                        ->orWhere('nama_kebutuhan', 'like', '%' . $request->search . '%');
                });
            })
            ->orderBy('tgl_permohonan', 'desc')
            ->paginate(10);

        return view('pemohon.IndexPemohonan', compact('permohonan') + $notificationData);
    }

    /**
     * Display the dashboard for pemohon.
     */
    public function dashboardPemohon()
    {
        $userId = Auth::guard('pemohon')->id();
        $user = Auth::guard('pemohon')->user();
        $userInstansi = Pemohon::with('instansi')->findOrFail($userId);
        $notificationData = $this->getPemohonNotifications($userId);

        $nama = $user->nama_lengkap;

        $countAktif = Layanan_spbe::where('inputby', $nama)
            ->whereIn('status', [Layanan_spbe::STATUS_PENDING, Layanan_spbe::STATUS_PROSES])
            ->count();

        $countSelesai = Layanan_spbe::where('inputby', $nama)
            ->where('status', Layanan_spbe::STATUS_SELESAI)
            ->count();

        $latestRequests = Layanan_spbe::where('inputby', $nama)
            ->latest()
            ->take(3)
            ->get();

        return view('pemohon.DashboardPemohon', compact('user', 'userInstansi', 'countAktif', 'countSelesai', 'latestRequests') + $notificationData);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $jenis = Jenis_layanan_spbe::all();
        $idPemohon = Auth::guard('pemohon')->user()->id;
        $notificationData = $this->getPemohonNotifications($idPemohon);
        return view('pemohon.LayananPemohonPage', compact('jenis') + $notificationData);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            // dd($request->all());
            $request->validate([
                'nama_kebutuhan'    => 'required|string|max:255',
                'id_jenis_layanan'  => 'required|integer',
                'id_kebutuhan'      => 'required|array|min:1',
                'lokasi'            => 'required|string|max:255',
                'unitKerja'        => 'required|string|max:255',
                'berkas'            => 'required|file|mimes:pdf,docx,zip|max:10240',
                'ket'               => 'nullable|string',
                'nama_pj'           => 'required|string|max:255',
                'nip_pj'            => 'required|string|max:50',
                'jabatan_pj'        => 'required|string|max:255',
                'unitkerja_pj'      => 'required|string|max:255',
                'nohp_pj'           => 'required|string|max:20',
                'email_pj'          => 'required|email|max:255',
            ]);

            $user = Auth::guard('pemohon')->user();
            $userWithInstansi = Pemohon::where('id', $user->id)->with('instansi')->first();

            $count = Layanan_spbe::whereDate('tgl_permohonan', now())->count() + 1;
            $noreg = 'REG-' . date('Ymd') . '-' . str_pad($count, 3, '0', STR_PAD_LEFT);

            $fileName = null;
            if ($request->hasFile('berkas')) {
                $file = $request->file('berkas');
                $originalName = str_replace(' ', '_', $file->getClientOriginalName());
                $fileName = time() . '_' . $originalName;
                $file->move(public_path('storage/doc'), $fileName);
            }

            $layanan = Layanan_spbe::create([
                'id_jenis_layanan' => $request->id_jenis_layanan,
                'id_kebutuhan' => $request->id_kebutuhan,
                'nama_kebutuhan'   => $request->nama_kebutuhan,
                'lokasi'           => $request->lokasi,
                'unitKerja'        => $request->unitKerja,
                'ket'              => $request->ket,
                'berkas'           => $fileName,
                'noreg'            => $noreg,
                'tahunanggaran'    => date('Y'),
                'periode'          => 'Triwulan ' . ceil(date('n') / 3),
                'tgl_permohonan'   => now(),
                'status'           => 1, // Sesuai default database
                'is_eksternal'     => empty($user->id_instansi) ? "ya" : "tidak",
                'nama_penanggungjawab'      => $request->nama_pj,
                'nip_penanggungjawab'       => $request->nip_pj,
                'nohp_penanggungjawab'      => $request->nohp_pj,
                'jabatan_penanggungjawab'   => $request->jabatan_pj,
                'unitKerja_penanggungjawab' => $request->unitKerja_pj, // Sesuaikan dengan DB (huruf kecil)
                'email_penanggungjawab'     => $request->email_pj,
                'inputby'          => $user->nama_lengkap,
                'tglinput'         => now(),
                'id_instansi'      => $user->id_instansi,
                'id_pemohon'     => $user->id,
                'nama_instansi'    => $userWithInstansi->instansi->nama_instansi ?? '-',
            ]);


            // Notifikasi Email ke Pimpinan (Kabid)
            $semuaKabid = User::where('role', 'kabid')->get();
            $emailPenerima = $semuaKabid->pluck('email')->filter()->toArray();

            // Fallback email jika tidak ada kabid dengan email
            if (empty($emailPenerima)) {
                $emailPenerima = ['admin@example.com'];
            }

            // Kirim email ke setiap penerima (gunakan queue untuk mencegah hanging)
            foreach ($emailPenerima as $email) {
                Mail::to($email)->queue(new NewPermohonanMail($layanan, $user));
            }

            Alert::success('Berhasil', 'Permohonan berhasil dikirim dengan No. Registrasi: ' . $noreg);
            return redirect()->route('pemohon.index');
        } catch (\Exception $e) {
            dd('FATAL ERROR CAUGHT: ' . $e->getMessage() . ' in file ' . $e->getFile() . ' on line ' . $e->getLine());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $idPemohon = Auth::guard('pemohon')->user()->id;
        $notificationData = $this->getPemohonNotifications($idPemohon);
        $detail = Layanan_spbe::where('id', $id)
            ->where('id_pemohon', $idPemohon)
            ->firstOrFail();

        // Tambahkan logika label status
        $statusValue = (int) ($detail->status_ver ?? $detail->status);

        $detail->status_label = match ($statusValue) {
            Layanan_spbe::STATUS_SELESAI => 'Selesai',
            Layanan_spbe::STATUS_PROSES  => 'Proses',
            default                      => 'Pending',
        };

        $detail->status_color = match ($statusValue) {
            Layanan_spbe::STATUS_SELESAI => 'emerald',
            Layanan_spbe::STATUS_PROSES  => 'blue',
            default                      => 'amber',
        };

        return view('pemohon.ShowPermohonan', compact('detail') + $notificationData);
    }


    public function downloadPdf($id)
    {
        $idPemohon = Auth::guard('pemohon')->user()->id;
        $detail = Layanan_spbe::with('jenis_layanan')->where('id', $id)
            ->where('id_pemohon', $idPemohon)
            ->firstOrFail();

        $pdf = \Barryvdh\DomPDF\Facade\Pdf::loadView('pemohon.reports.permohonan_single_pdf', compact('detail'));
        return $pdf->download('Permohonan-' . $detail->noreg . '.pdf');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $idPemohon = Auth::guard('pemohon')->user()->id;
        $notificationData = $this->getPemohonNotifications($idPemohon);
        $permohonan = Layanan_spbe::where('id', $id)
            ->where('id_pemohon', $idPemohon)
            ->firstOrFail();

        if ($permohonan->status != Layanan_spbe::STATUS_PENDING) {
            Alert::error('Gagal', 'Permohonan yang sedang diproses tidak dapat diubah.');
            return redirect()->route('pemohon.index');
        }

        $jenis = Jenis_layanan_spbe::all();
        $kebutuhan = Kebutuhan_layanan_spbe::where('id_jenis_layanan_spbe', $permohonan->id_jenis_layanan)->get();

        return view('pemohon.EditPermohonan', compact('permohonan', 'jenis', 'kebutuhan') + $notificationData);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $idPemohon = Auth::guard('pemohon')->user()->id;
        $permohonan = Layanan_spbe::where('id', $id)
            ->where('id_pemohon', $idPemohon)
            ->firstOrFail();

        if ($permohonan->status != Layanan_spbe::STATUS_PENDING) {
            Alert::error('Gagal', 'Permohonan yang sedang diproses tidak dapat diubah.');
            return redirect()->route('pemohon.index');
        }

        $request->validate([
            'nama_kebutuhan'    => 'required|string|max:255',
            'id_jenis_layanan'  => 'required|integer',
            'id_kebutuhan'      => 'required|array|min:1',
            'lokasi'            => 'required|string|max:255',
            'unitKerja'        => 'required|string|max:255',
            'berkas'            => 'nullable|file|mimes:pdf,docx,zip|max:10240',
            'ket'               => 'nullable|string',
            'nama_pj'           => 'required|string|max:255',
            'nip_pj'            => 'required|string|max:50',
            'jabatan_pj'        => 'required|string|max:255',
            'unitKerja_pj'      => 'required|string|max:255',
            'nohp_pj'           => 'required|string|max:20',
            'email_pj'          => 'required|email|max:255',
        ]);

        $data = [
            'id_jenis_layanan' => $request->id_jenis_layanan,
            'id_kebutuhan' => $request->id_kebutuhan,
            'nama_kebutuhan'   => $request->nama_kebutuhan,
            'lokasi'           => $request->lokasi,
            'unitKerja'        => $request->unitKerja,
            'ket'              => $request->ket,
            'nama_penanggungjawab'      => $request->nama_pj,
            'nip_penanggungjawab'       => $request->nip_pj,
            'nohp_penanggungjawab'      => $request->nohp_pj,
            'jabatan_penanggungjawab'   => $request->jabatan_pj,
            'unitKerja_penanggungjawab' => $request->unitKerja_pj,
            'email_penanggungjawab'     => $request->email_pj,
        ];

        if ($request->hasFile('berkas')) {
            if ($permohonan->berkas && file_exists(public_path('storage/doc/' . $permohonan->berkas))) {
                unlink(public_path('storage/doc/' . $permohonan->berkas));
            }

            $file = $request->file('berkas');
            $originalName = str_replace(' ', '_', $file->getClientOriginalName());
            $fileName = time() . '_' . $originalName;
            $file->move(public_path('storage/doc'), $fileName);
            $data['berkas'] = $fileName;
        }

        $permohonan->update($data);

        Alert::success('Berhasil', 'Permohonan berhasil diperbarui!');
        return redirect()->route('pemohon.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $idPemohon = Auth::guard('pemohon')->user()->id;
        $permohonan = Layanan_spbe::where('id', $id)
            ->where('id_pemohon', $idPemohon)
            ->firstOrFail();

        if ($permohonan->status != Layanan_spbe::STATUS_PENDING) {
            Alert::error('Gagal', 'Permohonan yang sedang diproses tidak dapat dihapus.');
            return redirect()->route('pemohon.index');
        }

        if ($permohonan->berkas && file_exists(public_path('storage/doc/' . $permohonan->berkas))) {
            unlink(public_path('storage/doc/' . $permohonan->berkas));
        }

        $permohonan->delete();

        Alert::success('Berhasil', 'Permohonan berhasil dihapus!');
        return redirect()->route('pemohon.index');
    }

    /**
     * Show profile settings page.
     */
    public function profilePage()
    {
        $user = Auth::guard('pemohon')->user();
        $notificationData = $this->getPemohonNotifications($user->id);
        return view('pemohon.PengaturanProfile', compact('user') + $notificationData);
    }

    /**
     * Update profile information.
     */
    public function updateProfile(Request $request)
    {
        $id = Auth::guard('pemohon')->user()->id;
        $user = Pemohon::find($id);

        $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email|unique:pemohon,email,' . $user->id,
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = [
            'nama_lengkap' => $request->nama,
            'email' => $request->email,
        ];

        if ($request->hasFile('avatar')) {
            if ($user->avatar && file_exists(public_path('storage/avatars/' . $user->avatar))) {
                unlink(public_path('storage/avatars/' . $user->avatar));
            }

            $file = $request->file('avatar');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('storage/avatars'), $fileName);
            $data['avatar'] = $fileName;
        }

        $user->update($data);

        Alert::success('Berhasil', 'Profil berhasil diperbarui!');
        return redirect()->back();
    }

    /**
     * Update user password.
     */
    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required|current_password',
            'new_password' => ['required', 'confirmed', Password::defaults()],
        ]);

        $id = Auth::guard('pemohon')->user()->id;
        $user = Pemohon::find($id);
        $user->update([
            'password' => Hash::make($request->new_password),
        ]);

        Alert::success('Berhasil', 'Kata sandi berhasil diubah!');
        return redirect()->back();
    }

    /**
     * Mark a single notification as read.
     */
    public function markNotificationRead($id)
    {
        $notification = Notification::where('id', $id)
            ->where('pemohon_id', Auth::guard('pemohon')->id())
            ->firstOrFail();
        $notification->update(['is_read' => true]);
        return back();
    }

    /**
     * Mark all notifications as read for pemohon.
     */
    public function markAllNotificationsRead()
    {
        Notification::where('pemohon_id', Auth::guard('pemohon')->id())
            ->update(['is_read' => true]);
        return back();
    }

    /**
     * Get kebutuhan based on jenis layanan (AJAX).
     */
    public function getKebutuhan($id_jenis)
    {
        $kebutuhan = Kebutuhan_layanan_spbe::where('id_jenis_layanan_spbe', $id_jenis)->get();
        return response()->json($kebutuhan);
    }
}
