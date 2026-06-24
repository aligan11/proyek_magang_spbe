<?php

namespace Database\Seeders;

use App\Models\Berita_acara_pemeriksaan;
use App\Models\Tindak_lanjut_layanan;
use Illuminate\Database\Seeder;

class BeritaAcaraPemeriksaanSeeder extends Seeder
{
    public function run(): void
    {
        $tindakLanjutIds = Tindak_lanjut_layanan::query()
            ->orderBy('id')
            ->pluck('id')
            ->all();

        if (empty($tindakLanjutIds)) {
            $this->command?->warn('Seeder dibatalkan: data `tindak_lanjut_layanan` belum tersedia.');

            return;
        }

        $rows = [
            [
                'ringkasan_pekerjaan' => 'Sistem Informasi Tunjangan Kinerja dan Presensi (SI-TUNKIN)',
                'ringkasan_masalah' => 'Pemeriksaan dan optimalisasi sistem presensi dan tunjangan kinerja ASN untuk peningkatan akurasi data.',
                'alternatif_solusi' => 'Melakukan sinkronisasi data, pengecekan integritas, dan update konfigurasi sistem.',
                'lokasi' => 'Dinas Komunikasi dan Informatika',
            ],
            [
                'ringkasan_pekerjaan' => 'Sistem Satu Data Mandiri ASN (SATAM ASN)',
                'ringkasan_masalah' => 'Verifikasi dan validasi data kepegawaian dalam satu platform terintegrasi.',
                'alternatif_solusi' => 'Audit data, penyesuaian kolom, dan integrasi dengan sistem kepegawaian yang ada.',
                'lokasi' => 'Badan Kepegawaian Daerah',
            ],
            [
                'ringkasan_pekerjaan' => 'Sistem Informasi Perencanaan ASN (SIPINTER)',
                'ringkasan_masalah' => 'Perencanaan kebutuhan ASN dan pengembangan kompetensi yang terstruktur.',
                'alternatif_solusi' => 'Pengembangan modul perencanaan, monitoring, dan evaluasi secara berkala.',
                'lokasi' => 'Badan Kepegawaian Daerah',
            ],
            [
                'ringkasan_pekerjaan' => 'Layanan Pengadaan Secara Elektronik (LPSE)',
                'ringkasan_masalah' => 'Pemeriksaan infrastruktur dan keamanan sistem pengadaan barang dan jasa.',
                'alternatif_solusi' => 'Peningkatan kapasitas server, pengecekan keamanan aplikasi, dan backup data.',
                'lokasi' => 'Badan Pengelola Keuangan dan Aset Daerah',
            ],
            [
                'ringkasan_pekerjaan' => 'Sistem Informasi Keuangan Daerah (SIKD)',
                'ringkasan_masalah' => 'Optimalisasi pengelolaan keuangan daerah dan pelaporan keuangan yang akuntabel.',
                'alternatif_solusi' => 'Sinkronisasi data antara unit kerja, penyesuaian chart of account, dan pelatihan pengguna.',
                'lokasi' => 'Badan Pengelola Keuangan dan Aset Daerah',
            ],
            [
                'ringkasan_pekerjaan' => 'Sistem Informasi Manajemen Arsip Dinamis (SIMARDIS)',
                'ringkasan_masalah' => 'Pengelolaan arsip digital dan manajemen dokumen secara terintegrasi.',
                'alternatif_solusi' => 'Pengembangan katalog arsip, fitur pencarian, dan akses yang terkontrol.',
                'lokasi' => 'Perpustakaan dan Arsip Daerah',
            ],
        ];

        foreach ($rows as $index => $row) {
            Berita_acara_pemeriksaan::create([
                'id_tindak_lanjut' => $tindakLanjutIds[$index % count($tindakLanjutIds)],
                'ringkasan_pekerjaan' => $row['ringkasan_pekerjaan'],
                'ringkasan_masalah' => $row['ringkasan_masalah'],
                'alternatif_solusi' => $row['alternatif_solusi'],
                'lokasi' => $row['lokasi'],
            ]);
        }
    }
}
