<?php

namespace App\Http\Controllers;

use App\Models\Kebutuhan_layanan_spbe;
use App\Models\Layanan_spbe;
use App\Models\Mandate;
use App\Models\Petugas;
use App\Models\Ticket;
use App\Models\User;
use GuzzleHttp\Psr7\Query;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http as FacadesHttp;
use PHPUnit\Metadata\Before;

class MandateController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index() {}
    public function indexMandat($status)
    {
        $idPetugas = Auth::guard('petugas')->user()->id;
        $dataPetugas = User::findOrFail($idPetugas); // Hapus ->first() karena FindOrFail sudah mengembalikan objek tunggal
        $firstname = str($dataPetugas->name)->before(' ')->toString();

        // Menggunakan Model Layanan_spbe sesuai struktur baru Anda
        // Filter status 'proses' (atau angka 2 jika Anda menggunakan sistem integer)
        $pendingTickets = Layanan_spbe::with('jenis_layanan')
            ->where('status', $status)
            ->when(request('search'), function ($query) {
                $query->where('noreg', 'like', '%' . request('search') . '%')
                    ->orWhere('nama_kebutuhan', 'like', '%' . request('search') . '%');
            })
            ->latest()
            ->paginate(10);
        if ($status == 1) {
            // Keadaan: Menampilkan Filter 'Belum Ditugaskan' (Aktif)
            $warna      = 'bg-emerald-600'; // Hijau Emerald Utama
            $warnaText  = 'text-white';

            $warna2     = 'bg-white';
            $warnaText2 = 'text-slate-600'; // Abu-abu gelap agar lebih mewah dari hitam pekat
        } else {
            // Keadaan: Menampilkan Filter 'Selesai' (Aktif)
            $warna      = 'bg-white';
            $warnaText  = 'text-slate-600';

            $warna2     = 'bg-emerald-600';
            $warnaText2 = 'text-white';
        }


        $totalTickets = Layanan_spbe::count();
        $pendingTicketsCount = Layanan_spbe::where('status', 1)->count();
        $ongoingTicketsCount = Layanan_spbe::where('status', 0)->count();
        $completedTicketsCount = Layanan_spbe::where('status', 2)->count();

        $availablePetugas = User::where('role', 'staff')->get();
        $petugasOnline = User::where('role', 'staff')
            ->where('last_seen', '>=', now()->subMinutes(5))
            ->get();

        return view('pimpinan.RequestOpd', compact(
            'firstname',
            'dataPetugas',
            'pendingTickets',
            'pendingTicketsCount',
            'ongoingTicketsCount',
            'completedTicketsCount',
            'totalTickets',
            'availablePetugas',
            'petugasOnline',
            'warna',
            'warna2',
            'warnaText',
            'warnaText2',
            'status',
        ) + [
            'title' => 'Layanan List Mandat Pimpinan',
        ]);
    }

    public function create() {}



    /**
     * Show the form for creating a new resource.
     */
    public function createMandate(Request $request, $noreg)
    {
        $idPetugas = Auth::guard('petugas')->user()->id;

        $searchPetugas = $request->input('searchPetugas');

        // Cukup satu variabel untuk Tiket dengan filter
        $pendingTickets = Layanan_spbe::with('jenis_layanan')
            ->where('noreg', $noreg)
            ->firstOrFail();

        $statusMandat = Mandate::where('ticket_id', $pendingTickets->id)->value('status');

        // Cukup satu variabel untuk Petugas dengan filter
        $availablePetugas = User::where('role', 'staff')
            ->when($searchPetugas, function ($query, $searchPetugas) {
                return $query->where('name', 'LIKE', "%{$searchPetugas}%");
            })
            ->latest()->get();

        $dataPetugas = User::findOrFail($idPetugas);

        return view('pimpinan.CreateMandate', [
            'pendingTickets'   => $pendingTickets, // Variabel ini sekarang sudah terfilter
            'availablePetugas' => $availablePetugas,
            'dataPetugas'      => $dataPetugas,
            'title'            => 'Layanan Tambah Mandat',
            'statusMandat' => $statusMandat,
        ]);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'ticket_id' => 'required|exists:layanan_spbe,id',
            'user_ids' => 'required|array|min:1',
            'user_ids.*' => 'required|exists:users,id',
            'deskripsi' => 'required|string|min:10',
        ]);

        // 1. Ambil data ticket terlebih dahulu
        $ticket = Layanan_spbe::findOrFail($request->ticket_id);
        $idPetugas = Auth::guard('petugas')->user()->id;

        $mandate = Mandate::create([
            'ticket_id' => $request->ticket_id,
            'pimpinan_id' => $idPetugas,
            'deskripsi' => $request->deskripsi,
            'status' => 'selesai',
        ]);

        $petugas = User::whereIn('id', $request->user_ids)->get();
        $mandate->mandate_users()->attach($request->user_ids);
        $targetNumbers = $petugas->pluck('phone')->filter()->implode(',');

        // 2. Susun format pesan untuk WhatsApp
        // Gunakan *text* untuk menebalkan teks di WhatsApp
        $urlDetail = route('login'); // Sesuaikan nama route detail kamu

        $urlBerkas = $ticket->berkas ? asset('storage/doc/' . $ticket->berkas) : 'Tidak ada berkas lampiran';

        // 2. Susun format pesan untuk WhatsApp
        $pesanWhatsapp = "Yth. Petugas Layanan,\n\n" .
            "Terdapat permohonan baru dengan No. Registrasi: *{$ticket->noreg}*\n" .
            "Perihal: {$ticket->nama_kebutuhan}\n\n" .
            "Deskripsi Pimpinan: {$request->deskripsi}\n\n" .
            "Silahkan akses detail permohonan pada link berikut:\n" .
            $urlDetail . "\n\n" .
            "Lihat/Unduh Berkas Lampiran:\n" .
            $urlBerkas . "\n\n" . // Menampilkan link berkas di sini
            "Terima kasih.";

        $ticket->update([
            'status' => 2,
        ]);

        if ($targetNumbers) {
            $response = FacadesHttp::withHeaders([
                'authorization' => env('FONNTE_TOKEN'),
            ])->post('https://api.fonnte.com/send', [
                'target' => $targetNumbers,
                'message' => $pesanWhatsapp, // Gunakan variabel pesan yang baru dibuat
            ]);

            if ($response->successful()) {
                return redirect()->route('indexMandat', 2)->with('success', 'Pesan berhasil dikirim ke ' . $petugas->count() . ' petugas');
            }
        }

        return redirect()->route('pimpinan.mandat', $ticket->noreg)->withErrors('Pesan gagal dikirim');
    }


    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $idPetugas = Auth::guard('petugas')->user()->id;

        $mandate = Mandate::with('ticket')->where('id', $id)->firstOrFail();
        $dataPetugas = User::where('id', $idPetugas)->firstOrFail();

        // Karena varchar, kita pastikan di-decode menjadi array
        $ids = json_decode($mandate->ticket->id_kebutuhan, true) ?? [];

        // Ambil nama kebutuhan dari tabel referensi
        $listKebutuhan = Kebutuhan_layanan_spbe::whereIn('id', $ids)->get();

        return view('pimpinan.showMandate', compact('mandate', 'dataPetugas', 'listKebutuhan'), [
            'title' => 'show mandate',
        ]);
        //
    }
    public function showTicket($noreg)
    {
        $idPetugas = Auth::guard('petugas')->user()->id;
        $dataPetugas = User::find($idPetugas);
        $ticket = Layanan_spbe::where('noreg', $noreg)->firstOrFail();

        // 1. Ambil data (asumsikan sudah array karena cast, atau masih string)
        $ids = $ticket->id_kebutuhan;

        // 2. Jika masih string JSON, decode dulu
        if (is_string($ids)) {
            $ids = json_decode($ids, true) ?? [];
        }

        // 3. MEMBERSIHKAN DATA (Paling Penting)
        // Pastikan tidak ada karakter kutip, spasi, atau simbol lain, lalu ubah ke integer
        $cleanIds = collect($ids)->map(function ($value) {
            return (int) str_replace(['"', '[', ']', ' '], '', $value);
        })->filter()->toArray();

        // 4. Query menggunakan array yang sudah bersih
        $listKebutuhan = Kebutuhan_layanan_spbe::whereIn('id', $cleanIds)->get();

        return view('pimpinan.ShowTicket', [
            'ticket' => $ticket,
            'title' => "Informasi detail untuk tiket",
            'dataPetugas' => $dataPetugas,
            'status' => $ticket->status,
            'listKebutuhan' => $listKebutuhan,
        ]);
    }




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
