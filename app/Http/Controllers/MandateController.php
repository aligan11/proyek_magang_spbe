<?php

namespace App\Http\Controllers;

use App\Models\Mandate;
use App\Models\Petugas;
use App\Models\Ticket;
use GuzzleHttp\Psr7\Query;
use Illuminate\Container\Attributes\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http as FacadesHttp;
use PHPUnit\Metadata\Before;

class MandateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $idPetugas = session('id_petugas');
        $dataPetugas = Petugas::FindOrFail($idPetugas)->first();
        $firstname = str($dataPetugas->name)->before(' ')->toString();
        $pendingTickets = Ticket::where('status', 'proses')->latest()->get();
        $totalTickets = Ticket::latest()->get()->count();
        $pendingTicketsCount = Ticket::where('status', 'pending')->get()->count();
        $ongoingTicketsCount = Ticket::where('status', 'proses')->get()->count();
        $availablePetugas = Petugas::where('role', 'petugas')->get();
        $petugasOnline = Petugas::where('role', 'petugas')->where('last_seen', '>=', now()->subMinutes(5))->get();

        $completedTicketsCount = Ticket::where('status', 'selesai')->get()->count();

        return view('pimpinan.RequestOpd', [
            'firstname' => $firstname,
            'dataPetugas' => $dataPetugas,
            'pendingTickets' => $pendingTickets,
            'pendingTicketsCount' => $pendingTicketsCount,
            'ongoingTicketsCount' => $ongoingTicketsCount,
            'completedTicketsCount' => $completedTicketsCount,
            'totalTickets' => $totalTickets,
            'availablePetugas' => $availablePetugas,
            'petugasOnline' => $petugasOnline,


            'title' => 'Layanan List Mandat Pimpinan',
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $idPetugas = session('id_petugas');
        $searchTicket = $request->input('searchTicket');
        $searchPetugas = $request->input('searchPetugas');

        // Cukup satu variabel untuk Tiket dengan filter
        $pendingTickets = Ticket::with('service')
            ->where('status', 'proses')
            ->when($searchTicket, function ($query, $searchTicket) {
                return $query->where('judul_request', 'LIKE', "%{$searchTicket}%")
                    ->orWhere('no_ticket', 'LIKE', "%{$searchTicket}%"); // Tambahkan orWhere agar lebih fleksibel
            })
            ->latest()->get();

        // Cukup satu variabel untuk Petugas dengan filter
        $availablePetugas = Petugas::where('role', 'petugas')
            ->when($searchPetugas, function ($query, $searchPetugas) {
                return $query->where('name', 'LIKE', "%{$searchPetugas}%");
            })
            ->latest()->get();

        $dataPetugas = Petugas::findOrFail($idPetugas);

        return view('pimpinan.CreateMandate', [
            'pendingTickets'   => $pendingTickets, // Variabel ini sekarang sudah terfilter
            'availablePetugas' => $availablePetugas,
            'dataPetugas'      => $dataPetugas,
            'title'            => 'Layanan Tambah Mandat',
        ]);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'ticket_id' => 'required|exists:tickets,id',
            'petugas_ids' => 'required|array|min:1',
            'petugas_ids.*' => 'required|exists:petugas,id',
            'deskripsi' => 'required|string|min:10',
        ]);

        $mandate = Mandate::create([
            'ticket_id' => $request->ticket_id,
            'pimpinan_id' => session('id_petugas'),
            'deskripsi' => $request->deskripsi,
            'status' => 'pending',
        ]);

        $petugas = Petugas::whereIn('id', $request->petugas_ids)->get();

        $mandate->mandate_petugas()->attach($request->petugas_ids);
        $targetNumbers = $petugas->pluck('phone')->filter()->implode(',');

        $ticket = Ticket::where('id', $request->ticket_id);

        $ticket->update([
            'status' => 'selesai',
        ]);



        if ($targetNumbers) {
            $response = FacadesHttp::withHeaders([
                'authorization' => env('FONNTE_TOKEN'),
            ])->post('https://api.fonnte.com/send', [
                'target' => $targetNumbers,
                'message' => $request->deskripsi,
            ]);

            if ($response->successful()) {
                return redirect()->route('mandate.index')->with('success', 'Pesan anda berhasil di kirim ke' . $petugas->count() . 'orang');
                // dd($response->json());
            }
        }

        return redirect()->route('mandate.create')->withErrors('failed', 'Pesan gagal dikirim');
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
