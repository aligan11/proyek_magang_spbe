<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'nama_layanan' => 'Perbaikan Jaringan Internet',
                'deskripsi'    => 'Penanganan masalah koneksi internet lambat atau terputus di lingkungan kantor.',
                'isAktif'      => 'true',
            ],
            [
                'nama_layanan' => 'Instalasi Software OS',
                'deskripsi'    => 'Layanan instalasi ulang sistem operasi Windows atau Linux beserta driver pendukung.',
                'isAktif'      => 'true',
            ],
            [
                'nama_layanan' => 'Pemeliharaan Website OPD',
                'deskripsi'    => 'Update konten, perbaikan bug, atau optimasi kecepatan website resmi instansi.',
                'isAktif'      => 'true',
            ],
            [
                'nama_layanan' => 'Pengajuan Tanda Tangan Elektronik',
                'deskripsi'    => 'Fasilitasi pembuatan akun dan aktivasi TTE melalui aplikasi BSRE.',
                'isAktif'      => 'true',
            ],
            [
                'nama_layanan' => 'Service Perangkat Keras',
                'deskripsi'    => 'Perbaikan printer, monitor, atau penggantian komponen PC yang rusak.',
                'isAktif'      => 'true',
            ],
            [
                'nama_layanan' => 'Pengembangan Aplikasi Baru',
                'deskripsi'    => 'Permohonan pembuatan sistem informasi khusus untuk kebutuhan internal OPD.',
                'isAktif'      => 'false', // Contoh layanan yang sedang dinonaktifkan
            ],
            [
                'nama_layanan' => 'Backup & Recovery Data',
                'deskripsi'    => 'Layanan pemulihan data yang hilang atau pemindahan data ke storage server.',
                'isAktif'      => 'true',
            ],
            [
                'nama_layanan' => 'Pengajuan Subdomain .go.id',
                'deskripsi'    => 'Pendaftaran nama domain baru untuk aplikasi atau website dinas.',
                'isAktif'      => 'true',
            ],
            [
                'nama_layanan' => 'Keamanan Siber (Audit)',
                'deskripsi'    => 'Pemeriksaan celah keamanan pada sistem informasi yang sedang berjalan.',
                'isAktif'      => 'true',
            ],
            [
                'nama_layanan' => 'Peminjaman Fasilitas Zoom',
                'deskripsi'    => 'Permohonan akun Zoom Pro untuk kebutuhan rapat koordinasi daring.',
                'isAktif'      => 'true',
            ],
        ];

        foreach ($data as $item) {
            Service::create($item);
        }
        //
    }
}
