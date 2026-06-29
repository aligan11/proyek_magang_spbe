<?php

namespace App\Http\Controllers;

use App\Models\Kebutuhan_layanan_spbe;
use App\Models\Layanan_spbe;
use App\Models\Mandate;
use App\Models\Notification;
use App\Models\Petugas;
use App\Models\Ticket;
use App\Models\Tindak_lanjut_layanan;
use App\Models\User;
use App\Mail\NewMandateMail;
use GuzzleHttp\Psr7\Query;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
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
        // Ambil data tiket tunggal berdasarkan nomor registrasi
        $pendingTickets = Layanan_spbe::with('jenis_layanan')
            ->where('noreg', $noreg)
            ->firstOrFail();

        // PERBAIKAN: Langsung ambil kolom status_tl dari objek $pendingTickets tanpa ->first()
        $statusMandat = $pendingTickets->status_tl;

        // Ambil data petugas pelaksana
        $searchPetugas = $request->input('searchPetugas');
        $availablePetugas = User::where('role', 'staff')
            ->when($searchPetugas, function ($query, $searchPetugas) {
                return $query->where('name', 'LIKE', "%{$searchPetugas}%");
            })
            ->latest()
            ->get();

        // Ambil data pimpinan yang sedang login (Gunakan Auth standar jika guard utama)
        $dataPetugas = Auth::user();

        return view('pimpinan.CreateMandate', [
            'pendingTickets' => $pendingTickets,
            'availablePetugas' => $availablePetugas,
            'dataPetugas' => $dataPetugas,
            'title' => 'Layanan Tambah Mandat',
            'statusMandat' => $statusMandat,
        ]);
    }



    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            // dd($request->all());
            $request->validate([
                'ticket_id' => 'required|exists:layanan_spbe,id',
                'user_ids' => 'required|array|min:1',
                'user_ids.*' => 'required|exists:users,id',
                'ket' => 'required|string|min:10',
            ]);

            // 1. Ambil data ticket terlebih dahulu
            $ticket = Layanan_spbe::findOrFail($request->ticket_id);
            $idPetugas = Auth::guard('petugas')->user()->id;
            $user = Auth::guard('petugas')->user();

            // Update layanan_spbe table
            $ticket->update([
                'tl_by' => $user->id,
                'status_tl' => 2,
                'tgl_tl' => now(),
                'status' => 2,
                'status_ver' => 1,
            ]);

            // Insert ke tindak_lanjut_layanan untuk setiap petugas
            $tindakLanjut = Tindak_lanjut_layanan::create([
                'id_layanan' => $ticket->id,
                'id_petugas' => $request->user_ids,
                'keterangan' => $request->ket,
            ]);

            $petugas = User::whereIn('id', $request->user_ids)->get();

            // Create notifications for each petugas
            foreach ($petugas as $p) {
                Notification::create([
                    'user_id' => $p->id,
                    'type' => 'new_mandate',
                    'message' => "Anda mendapat tugas baru untuk permohonan No. {$ticket->noreg} - {$ticket->nama_kebutuhan}",
                    'related_id' => $tindakLanjut->id,
                    'related_type' => 'tindak_lanjut',
                    'is_read' => false,
                ]);

                // Kirim email ke petugas jika email tersedia
                if ($p->email) {
                    Mail::to($p->email)->queue(new NewMandateMail($ticket, $tindakLanjut, $user));
                }
            }

            return redirect()->route('indexMandat', 2)->with('success', 'Penugasan berhasil dibuat dan email telah dikirim ke ' . $petugas->count() . ' petugas');
        } catch (\Exception $e) {
            dd('FATAL ERROR CAUGHT: ' . $e->getMessage() . ' in file ' . $e->getFile() . ' on line ' . $e->getLine());
        }
    }


    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $idPetugas = Auth::guard('petugas')->user()->id;

        $mandate = tindak_lanjut_layanan::with('layanan')->where('id', $id)->firstOrFail();
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

        // 1. Ambil semua baris mandat untuk tiket ini (atau yang terkait petugas ini)
        $mandat = Tindak_lanjut_layanan::with('layanan')
            ->where('id_layanan', $ticket->id) // Sebaiknya berdasarkan ID layanan agar semua mandat tampil
            ->latest()
            ->get();

        // 2. PROSES DAFTAR KEBUTUHAN (Sama seperti kodemu)
        $ids = is_string($ticket->id_kebutuhan) ? json_decode($ticket->id_kebutuhan, true) : $ticket->id_kebutuhan;
        $cleanIds = collect($ids)->map(fn($v) => (int) str_replace(['"', '[', ']', ' '], '', $v))->filter()->toArray();
        $listKebutuhan = Kebutuhan_layanan_spbe::whereIn('id', $cleanIds)->get();

        // 3. PROSES DAFTAR PETUGAS (Dibuat Seragam)
        // Pluck mengambil semua kolom 'id_petugas', flatten menyatukan array di dalamnya
        $allPetugasIds = $mandat->pluck('id_petugas')->flatten()->map(function ($value) {
            return (int) str_replace(['"', '[', ']', ' '], '', $value);
        })->unique()->filter()->toArray();

        // Query ke tabel Users
        $daftarPetugas = User::whereIn('id', $allPetugasIds)->get();

        return view('pimpinan.ShowTicket', [
            'ticket' => $ticket,
            'title' => "Informasi detail untuk tiket",
            'dataPetugas' => $dataPetugas,
            'status' => $ticket->status,
            'mandat' => $mandat,
            'daftarPetugas' => $daftarPetugas, // Sekarang berisi object User
            'listKebutuhan' => $listKebutuhan,
            'deskripsiMandat' => $ticket->ket ?? 'Tidak ada deskripsi',
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
