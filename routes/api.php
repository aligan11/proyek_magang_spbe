<?php

use App\Models\Instansi;
use Illuminate\Support\Facades\Route;

Route::get('/get-instansi', function () {
    $instansi = Instansi::query()
        ->where('status', 'aktif')
        ->orderBy('nama_instansi')
        ->get([
            'id',
            'id_induk',
            'kode_instansi',
            'nama_instansi',
            'singkatan',
            'status',
        ]);

    return response()->json([
        'success' => true,
        'data' => $instansi,
    ]);
})->name('api.instansi.index');
