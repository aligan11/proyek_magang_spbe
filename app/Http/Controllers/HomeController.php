<?php

namespace App\Http\Controllers;

use App\Models\Berita_acara_pemeriksaan;
use App\Models\Instansi;

class HomeController extends Controller
{
    public function index()
    {
        // Load all berita acara dengan relasi terkait
        $latestBeritaAcara = Berita_acara_pemeriksaan::with([
            'tindakLanjut.layanan.jenis_layanan'
        ])->latest()->get();

        $beritaAcaraCount = Berita_acara_pemeriksaan::count();
        $instansiCount = Instansi::count();

        // PERBAIKAN: Memastikan nama_instansi tidak null/kosong dan memfilter awalan huruf 'B'
        $featuredInstansi = Instansi::query()
            ->whereNotNull('nama_instansi')
            ->where('nama_instansi', '!=', '')
            ->where('nama_instansi', 'like', 'B%') // Mengambil yang berawalan huruf B
            ->orderBy('nama_instansi', 'asc')
            ->take(4)
            ->pluck('nama_instansi')
            ->toArray();

        return view('welcome', compact(
            'latestBeritaAcara',
            'beritaAcaraCount',
            'instansiCount',
            'featuredInstansi'
        ));
    }
}
