<?php

namespace Database\Seeders;

use App\Models\Kebutuhan_layanan_spbe;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class kebutuhan_layanan_seeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'id_jenis_layanan_spbe' => 1, // E-Izin
                'no_kebutuhan' => 1,
                'nama_kebutuhan' => 'Modul Tanda Tangan Elektronik (TTE)',
                'status' => 1,
                'ket' => 'Integrasi dengan BSRE untuk validasi dokumen.',
            ],
            [
                'id_jenis_layanan_spbe' => 2, // LPSE
                'no_kebutuhan' => 2,
                'nama_kebutuhan' => 'Fitur Reverse Auction',
                'status' => 1,
                'ket' => 'Penambahan fitur penawaran harga terbalik.',
            ],
            [
                'id_jenis_layanan_spbe' => 3, // SIMPEG
                'no_kebutuhan' => 3,
                'nama_kebutuhan' => 'Update Database SKP 2024',
                'status' => 1,
                'ket' => 'Penyesuaian format penilaian kinerja terbaru.',
            ],
            [
                'id_jenis_layanan_spbe' => 4, // Lapor
                'no_kebutuhan' => 4,
                'nama_kebutuhan' => 'Integrasi WhatsApp Gateway',
                'status' => 1,
                'ket' => 'Notifikasi otomatis ke pelapor via WA.',
            ],
            [
                'id_jenis_layanan_spbe' => 5, // E-Pajak
                'no_kebutuhan' => 1,
                'nama_kebutuhan' => 'Payment Gateway QRIS',
                'status' => 1,
                'ket' => 'Sedang dalam tahap koordinasi dengan Bank.',
            ],
            [
                'id_jenis_layanan_spbe' => 6, // SIAK
                'no_kebutuhan' => 2,
                'nama_kebutuhan' => 'Sinkronisasi Data Pusat',
                'status' => 1,
                'ket' => 'Backup rutin data kependudukan ke server pusat.',
            ],
            [
                'id_jenis_layanan_spbe' => 7, // E-Budgeting
                'no_kebutuhan' => 3,
                'nama_kebutuhan' => 'Input RKA Perubahan',
                'status' => 1,
                'ket' => 'Pembukaan akses input untuk anggaran perubahan.',
            ],
            [
                'id_jenis_layanan_spbe' => 1, // E-Izin (tambahan)
                'no_kebutuhan' => 4,
                'nama_kebutuhan' => 'Tracking Status Berkas',
                'status' => 1,
                'ket' => 'Fitur monitoring progres izin oleh pemohon.',
            ],
            [
                'id_jenis_layanan_spbe' => 9, // E-Siswa
                'no_kebutuhan' => 1,
                'nama_kebutuhan' => 'Modul PPDB Online',
                'status' => 1,
                'ket' => 'Persiapan pendaftaran siswa baru tahun ajaran depan.',
            ],
            [
                'id_jenis_layanan_spbe' => 10, // Srikandi
                'no_kebutuhan' => 2,
                'nama_kebutuhan' => 'Migrasi Arsip Fisik ke Digital',
                'status' => 1,
                'ket' => 'Proses scan dan input dokumen tahun 2020-2023.',
            ],
        ];

        // Ganti 'nama_tabel_anda' dengan nama tabel yang sesuai di database
        foreach ($data as $item) {
            Kebutuhan_layanan_spbe::create($item);
            # code...
        }
        //
    }
}
