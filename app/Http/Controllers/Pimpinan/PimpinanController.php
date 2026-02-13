<?php

namespace App\Http\Controllers\Pimpinan;

use App\Http\Controllers\Controller;
use App\Models\Petugas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\Mime\Email;

class PimpinanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $dataPetugas =  Petugas::where('email', session()->get('email'));
        $email = session()->get('user_email');

        $dataPetugas = Petugas::where('email', $email)->first();
        $Firstname = str($dataPetugas->name)->before(' ')->toString();


        return view('pimpinan.DashboardPimpinan', [
            'title' => 'Dashboard Pimpinan',
            'dataPetugas' => $dataPetugas,
            'firstname' => $Firstname,
        ]);
        //
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
        //
    }
    public function show($id) {}

    /**
     * Display the specified resource.
     */
    public function showProfile()

    {
        $idPetugas = session('id_petugas');
        $dataPetugas = Petugas::FindOrFail($idPetugas);

        //

        return view('pimpinan.ShowProfilePimpinan', ['title' => 'Dashboard Pimpinan', 'data' => $dataPetugas], compact('dataPetugas'));
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
