<?php

namespace App\Http\Controllers;

use App\Models\Jenis_layanan_spbe;
use App\Models\Kebutuhan_layanan_spbe;
use App\Models\Layanan_spbe;
use App\Models\Pemohon;
use App\Models\Petugas;
use App\Models\User;
use Carbon\Carbon;
use GrahamCampbell\ResultType\Success;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\RateLimiter;
use PDO;

class PemohonController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function dashboardPemohon()
    {
        $userId = Auth::guard('pemohon')->id();
        $user = Auth::guard('pemohon')->user();

        $userInstansi = Pemohon::with('instansi')->findOrFail($userId);

        // Hitung Statistik Berdasarkan status di tabel Layanan_spbe
        // Asumsi: status 1 = Menunggu, 2 = Diproses, 3 = Selesai
        $countAktif = \App\Models\Layanan_spbe::where('inputby', $userId)
            ->whereIn('status', [1, 2])
            ->count();

        $countSelesai = \App\Models\Layanan_spbe::where('inputby', $userId)
            ->where('status', 3)
            ->count();

        return view('Pemohon.DashboardPemohon', compact('user', 'userInstansi', 'countAktif', 'countSelesai'));
    }


    public function layananPemohonPage()
    {
        // Mengambil semua data untuk dropdown di form
        $jenis = Jenis_layanan_spbe::all();
        $kebutuhan = Kebutuhan_layanan_spbe::all();

        return view('pemohon.LayananPemohonPage', compact('jenis', 'kebutuhan'));
    }





    public function index(Request $request)
    {
        // 1. Ambil ID pemohon yang sedang login (menggunakan guard pemohon)
        $idPemohon = Auth::guard('pemohon')->user()->id;

        // 2. Ambil data permohonan dengan pagination agar tidak berat
        // Eager loading 'jenis_layanan' untuk menghemat query (N+1 problem)
        $permohonan = Layanan_spbe::with('jenis_layanan')
            ->where('inputby', $idPemohon)
            ->when($request->search, function ($query) use ($request) {
                // Fitur pencarian berdasarkan noreg atau nama kebutuhan
                $query->where(function ($q) use ($request) {
                    $q->where('noreg', 'like', '%' . $request->search . '%')
                        ->orWhere('nama_kebutuhan', 'like', '%' . $request->search . '%');
                });
            })
            ->orderBy('tgl_permohonan', 'desc')
            ->paginate(10); // Menampilkan 10 data per halaman

        // 3. Return ke view dengan membawa data
        return view('pemohon.IndexPemohonan', compact('permohonan'));
    }

    /**
     * Menampilkan detail lengkap satu permohonan
     */
    public function show($id)
    {
        $idPemohon = Auth::guard('pemohon')->user()->id;

        // Cari permohonan berdasarkan ID dan pastikan itu milik pemohon tersebut
        $detail = Layanan_spbe::where('id', $id)
            ->where('inputby', $idPemohon)
            ->firstOrFail();

        return view('pemohon.LayananDetailPage', compact('detail'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // 1. Validasi Input
        $request->validate([
            'nama_kebutuhan'    => 'required|string|max:255',
            'id_jenis_layanan'  => 'required|integer',
            'id_kebutuhan'      => 'required|integer',
            'berkas'            => 'required|file|mimes:pdf,docx,zip|max:10240',
            'ket'               => 'nullable|string',
        ]);

        // 2. Ambil data pemohon
        $user = Auth::guard('pemohon')->user();
        $userWithInstansi = Pemohon::where('id', $user->id)->with('instansi')->first();

        // 3. Generate Nomor Registrasi
        $count = Layanan_spbe::whereDate('tgl_permohonan', now())->count() + 1;
        $noreg = 'REG-' . date('Ymd') . '-' . str_pad($count, 3, '0', STR_PAD_LEFT);

        // 4. Proses Upload Berkas
        $fileName = null;
        if ($request->hasFile('berkas')) {
            $file = $request->file('berkas');
            // Hilangkan spasi pada nama file agar link tidak rusak di WhatsApp
            $originalName = str_replace(' ', '_', $file->getClientOriginalName());
            $fileName = time() . '_' . $originalName;
            $file->move(public_path('storage/doc'), $fileName);
        }

        // Ambil penanggung jawab (Kabid pertama untuk data tabel)
        $penanggungJawab = User::where('role', 'kabid')->first();

        // 5. Simpan ke Database
        $layanan = Layanan_spbe::create([
            'id_jenis_layanan' => $request->id_jenis_layanan,
            'id_kebutuhan'     => $request->id_kebutuhan,
            'nama_kebutuhan'   => $request->nama_kebutuhan,
            'ket'              => $request->ket,
            'berkas'           => $fileName,
            'noreg'            => $noreg,
            'tahunanggaran'    => date('Y'),
            'periode'          => 'Triwulan ' . ceil(date('n') / 3),
            'tgl_permohonan'   => now(),
            'status'           => 1,
            'is_eksternal'     => empty($user->id_instansi) ? 1 : 0,
            'nama_penanggungjawab'      => $penanggungJawab->name,
            'nip_penanggungjawab'       => $penanggungJawab->nip,
            'nohp_penanggungjawab'      => $penanggungJawab->phone,
            'jabatan_penanggungjawab'   => $penanggungJawab->jabatan,
            'unitkerja_penanggungjawab' => $penanggungJawab->unitKerja,
            'email_penanggungjawab'     => $penanggungJawab->email,
            'inputby'          => $user->id,
            'tglinput'         => now(),
            'id_instansi'      => $user->id_instansi,
            'nama_instansi'    => $userWithInstansi->instansi->nama_instansi ?? '-',
            'nama_pemohon'     => $user->nama_lengkap,
        ]);

        // 6. Notifikasi Fonnte ke Semua Kabid
        $semuaKabid = User::where('role', 'kabid')->get();
        $targetNumbers = $semuaKabid->pluck('phone')->filter()->implode(',');

        if ($targetNumbers) {
            $urlDetail = route('login');
            // MENGGUNAKAN secure_asset agar link diawali https:// (ngrok friendly)
            $urlBerkas = secure_asset('storage/doc/' . $layanan->berkas);

            $pesanWhatsapp = "Yth. Petugas Layanan (Kabid),\n\n" .
                "Terdapat *Permohonan Baru* masuk:\n\n" .
                "No. Reg: *{$noreg}*\n" .
                "Instansi: " . ($userWithInstansi->instansi->nama_instansi ?? '-') . "\n" .
                "Perihal: {$request->nama_kebutuhan}\n" .
                "Tgl Pengajuan: " . date('d-m-Y H:i') . "\n\n" .
                "Silahkan cek detail pada link berikut:\n" .
                $urlDetail . "\n\n" .
                "Unduh Berkas:\n" .
                $urlBerkas . "\n\n" .
                "Terima kasih.";

            \Illuminate\Support\Facades\Http::withHeaders([
                'authorization' => env('FONNTE_TOKEN'),
            ])->post('https://api.fonnte.com/send', [
                'target' => $targetNumbers,
                'message' => $pesanWhatsapp,
            ]);
        }

        return redirect()->route('pemohon.index')
            ->with('success', 'Permohonan berhasil dikirim. No Reg: ' . $noreg);
    }




    /**
     * Display the specified resource.
     */


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
