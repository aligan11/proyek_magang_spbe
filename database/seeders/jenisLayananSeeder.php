<?php

namespace Database\Seeders;

use App\Models\Jenis_layanan_spbe;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class jenisLayananSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'kode' => 'LYN001',
                'namajenis' => 'Layanan Perizinan Online',
                'alias' => 'E-Izin',
                'linkna' => 'https://izin.spbe.go.id',
                'modelna' => 'App\Models\Perizinan',
                'referensi' => 'Perpres No 95 Tahun 2018',
                'status' => 'aktif',
            ],
            [
                'kode' => 'LYN002',
                'namajenis' => 'Layanan Pengadaan Barang',
                'alias' => 'LPSE',
                'linkna' => 'https://lpse.spbe.go.id',
                'modelna' => 'App\Models\Pengadaan',
                'referensi' => 'Perka LKPP 1/2021',
                'status' => 'aktif',
            ],
            [
                'kode' => 'LYN003',
                'namajenis' => 'Layanan Kepegawaian',
                'alias' => 'SIMPEG',
                'linkna' => 'https://simpeg.spbe.go.id',
                'modelna' => 'App\Models\Pegawai',
                'referensi' => 'UU ASN No 5/2014',
                'status' => 'aktif',
            ],
            [
                'kode' => 'LYN004',
                'namajenis' => 'Layanan Pengaduan Publik',
                'alias' => 'Lapor',
                'linkna' => 'https://lapor.spbe.go.id',
                'modelna' => 'App\Models\Aspirasi',
                'referensi' => 'Permenpan RB 62/2018',
                'status' => 'aktif',
            ],
            [
                'kode' => 'LYN005',
                'namajenis' => 'Layanan Pajak Daerah',
                'alias' => 'E-Pajak',
                'linkna' => 'https://pajak.spbe.go.id',
                'modelna' => 'App\Models\Pajak',
                'referensi' => 'Perda No 12/2023',
                'status' => 'aktif',
            ],
            [
                'kode' => 'LYN006',
                'namajenis' => 'Layanan Kependudukan',
                'alias' => 'SIAK',
                'linkna' => 'https://dukcapil.spbe.go.id',
                'modelna' => 'App\Models\Penduduk',
                'referensi' => 'Permendagri 109/2019',
                'status' => 'aktif',
            ],
            [
                'kode' => 'LYN007',
                'namajenis' => 'Layanan Anggaran',
                'alias' => 'E-Budgeting',
                'linkna' => 'https://budget.spbe.go.id',
                'modelna' => 'App\Models\Anggaran',
                'referensi' => 'Permendagri 77/2020',
                'status' => 'aktif',
            ],
            [
                'kode' => 'LYN008',
                'namajenis' => 'Layanan Kesehatan',
                'alias' => 'E-Health',
                'linkna' => 'https://health.spbe.go.id',
                'modelna' => 'App\Models\Kesehatan',
                'referensi' => 'UU Kesehatan 2023',
                'status' => 'non-aktif',
            ],
            [
                'kode' => 'LYN009',
                'namajenis' => 'Layanan Pendidikan',
                'alias' => 'E-Siswa',
                'linkna' => 'https://sekolah.spbe.go.id',
                'modelna' => 'App\Models\Pendidikan',
                'referensi' => 'Permendikbud 1/2021',
                'status' => 'aktif',
            ],
            [
                'kode' => 'LYN010',
                'namajenis' => 'Layanan Arsip Digital',
                'alias' => 'Srikandi',
                'linkna' => 'https://arsip.spbe.go.id',
                'modelna' => 'App\Models\Arsip',
                'referensi' => 'Anri No 4/2021',
                'status' => 'aktif',
            ],
        ];

        foreach ($data as $item) {
            Jenis_layanan_spbe::create($item);
        }

        //
    }
}
