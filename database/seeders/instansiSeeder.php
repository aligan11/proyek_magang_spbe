<?php

namespace Database\Seeders;

use App\Models\Instansi;
use App\Models\Pemohon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class instansiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $instansi = [
            [
                'id_induk' => null, // Pusat/Sekretariat
                'kode_instansi' => '001',
                'nama_instansi' => 'Dinas Komunikasi dan Informatika',
                'singkatan' => 'DISKOMINFO',
                'alamat' => 'Jl. Sinar Baru, Komplek Perkantoran Terpadu',
                'telepon' => '0717-123456',
                'email' => 'diskominfo@babelprov.go.id',
                'status' => 'aktif',
            ],
            [
                'id_induk' => null,
                'kode_instansi' => '002',
                'nama_instansi' => 'Badan Perencanaan Pembangunan Daerah',
                'singkatan' => 'BAPPEDA',
                'alamat' => 'Jl. Pulau Bangka, Air Itam',
                'telepon' => '0717-654321',
                'email' => 'bappeda@babelprov.go.id',
                'status' => 'aktif',
            ],
            [
                'id_induk' => null,
                'kode_instansi' => '003',
                'nama_instansi' => 'Dinas Kesehatan',
                'singkatan' => 'DINKES',
                'alamat' => 'Jl. Komplek Perkantoran Gubernur',
                'telepon' => '0717-111222',
                'email' => 'dinkes@babelprov.go.id',
                'status' => 'aktif',
            ],
            [
                'id_induk' => null,
                'kode_instansi' => '004',
                'nama_instansi' => 'Dinas Pendidikan',
                'singkatan' => 'DIKNAS',
                'alamat' => 'Jl. Air Itam, Pangkalpinang',
                'telepon' => '0717-333444',
                'email' => 'disdik@babelprov.go.id',
                'status' => 'aktif',
            ],
            [
                'id_induk' => null,
                'kode_instansi' => '005',
                'nama_instansi' => 'Badan Keuangan Daerah',
                'singkatan' => 'BAKUDA',
                'alamat' => 'Jl. Pulau Belitung, Air Itam',
                'telepon' => '0717-555666',
                'email' => 'bakuda@babelprov.go.id',
                'status' => 'aktif',
            ],
            [
                'id_induk' => null,
                'kode_instansi' => '006',
                'nama_instansi' => 'Dinas Perhubungan',
                'singkatan' => 'DISHUB',
                'alamat' => 'Jl. Komplek Perkantoran Terpadu Lt. 2',
                'telepon' => '0717-777888',
                'email' => 'dishub@babelprov.go.id',
                'status' => 'aktif',
            ],
            [
                'id_induk' => null,
                'kode_instansi' => '007',
                'nama_instansi' => 'Dinas Pekerjaan Umum',
                'singkatan' => 'PU',
                'alamat' => 'Jl. Jenderal Sudirman No. 10',
                'telepon' => '0717-999000',
                'email' => 'pu@babelprov.go.id',
                'status' => 'aktif',
            ],
            [
                'id_induk' => null,
                'kode_instansi' => '008',
                'nama_instansi' => 'Badan Kepegawaian Daerah',
                'singkatan' => 'BKD',
                'alamat' => 'Jl. Air Itam Atas',
                'telepon' => '0717-222333',
                'email' => 'bkd@babelprov.go.id',
                'status' => 'aktif',
            ],
            [
                'id_induk' => null,
                'kode_instansi' => '009',
                'nama_instansi' => 'Satuan Polisi Pamong Praja',
                'singkatan' => 'SATPOL PP',
                'alamat' => 'Jl. Komplek Gubernur Babel',
                'telepon' => '0717-444555',
                'email' => 'satpolpp@babelprov.go.id',
                'status' => 'aktif',
            ],
            [
                'id_induk' => null,
                'kode_instansi' => '010',
                'nama_instansi' => 'Dinas Sosial',
                'singkatan' => 'DINSOS',
                'alamat' => 'Jl. Bukit Intan No. 5',
                'telepon' => '0717-666777',
                'email' => 'dinsos@babelprov.go.id',
                'status' => 'aktif',
            ],
        ];

        foreach ($instansi as $item) {
            Instansi::create($item);
        }
    }
}
