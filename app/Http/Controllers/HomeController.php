<?php

namespace App\Http\Controllers;

use App\Models\Berita_acara_pemeriksaan;
use App\Models\Instansi;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function index(Request $request)
    {
        $search = $request->input('searchBerita');

        $latestBeritaAcara = Berita_acara_pemeriksaan::with([
            'tindakLanjut.layanan.jenis_layanan'
        ])
            ->when($search, function ($query, $search) {
                return $query->where('ringkasan_pekerjaan', 'like', "%{$search}%")
                    ->orWhere('ringkasan_masalah', 'like', "%{$search}%");
            })
            ->latest()
            ->paginate(6)
            ->withQueryString();

        // Pastikan pengecekan AJAX ini ada di bagian atas
        if ($request->ajax()) {
            return view('partials.berita-grid', compact('latestBeritaAcara'))->render();
        }

        $beritaAcaraCount = Berita_acara_pemeriksaan::count();
        $instansiCount = \App\Models\Instansi::count();

        $featuredInstansi = \App\Models\Instansi::query()
            ->whereNotNull('nama_instansi')
            ->where('nama_instansi', '!=', '')
            ->where('nama_instansi', 'like', 'B%')
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
