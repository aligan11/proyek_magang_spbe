<?php

namespace App\Http\Controllers;

use App\Models\Petugas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class petugasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $dataPetugas =  Petugas::where('email', session()->get('email'));
        $email = session()->get('user_email');
        $dataPetugas = Petugas::where('email', $email)->first();


        return view('petugas.DashboardPetugas', [
            'title' => 'Dashboard Petugas',
            'dataPetugas' => $dataPetugas,
        ]);
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
