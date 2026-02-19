<?php

namespace Database\Seeders;

use App\Models\admin;
use App\Models\Petugas;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class adminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'name'     => 'Afghan Almufqi',
                'email'    => 'afghan12@gmail.com',
                'unitKerja'    => 'Seksi Teknologi Informasi dan Komunikasi',
                'role'    => 'petugas',
                'daerah'   => null,
                'password' => Hash::make('password123'), // Jangan lupa di-hash
                'nip'      => '199501012023011001',
                'jabatan'  => 'Pranata Komputer',
                'pangkat'  => 'Penata Muda',
                'gol'      => 'III/a',
                'phone'    => '6281234567890', // Gunakan format 62 agar langsung sinkron ke Fonnte
            ],
            [
                'name'     => 'gan matkuso',
                'email'    => 'gan12@gmail.com',
                'unitKerja'    => 'Seksi Teknologi Informasi dan Komunikasi',
                'role'    => 'pimpinan',
                'daerah'   => null,
                'password' => Hash::make('pimpinan123'), // Jangan lupa di-hash
                'nip'      => '199501012023011002',
                'jabatan'  => 'Pranata Komputer',
                'pangkat'  => 'Penata Muda',
                'gol'      => 'III/b',
                'phone'    => '6281234567892', // Gunakan format 62 agar langsung sinkron ke Fonnte
            ],
            [
                'name'     => 'Budi Setiawan',
                'email'    => 'budi.petugas@gmail.com',
                'unitKerja'    => 'Seksi Infrastruktur Jaringan',
                'role'    => 'petugas',
                'daerah'   => null,
                'password' => Hash::make('password123'),
                'nip'      => '199501012023011003',
                'jabatan'  => 'Teknisi Jaringan',
                'pangkat'  => 'Penata Muda',
                'gol'      => 'III/a',
                'phone'    => '6281277665544',
            ],
            [
                'name'     => 'Siti Aminah',
                'email'    => 'siti.opd@gmail.com',
                'unitKerja'    => 'Dinas Kesehatan',
                'role'    => 'opd',
                'daerah'   => 'Pangkalpinang',
                'password' => Hash::make('password123'),
                'nip'      => '198805122015032001',
                'jabatan'  => 'Admin Dinkes',
                'pangkat'  => 'Penata',
                'gol'      => 'III/c',
                'phone'    => '6285211223344',
            ],
            [
                'name'     => 'Hendra Wijaya',
                'email'    => 'hendra.pimpinan@gmail.com',
                'unitKerja'    => 'Bidang E-Government',
                'role'    => 'pimpinan',
                'daerah'   => null,
                'password' => Hash::make('pimpinan123'),
                'nip'      => '198001012005011005',
                'jabatan'  => 'Kepala Bidang',
                'pangkat'  => 'Pembina',
                'gol'      => 'IV/a',
                'phone'    => '6281399887766',
            ],
            [
                'name'     => 'Rina Pratama',
                'email'    => 'rina.petugas@gmail.com',
                'unitKerja'    => 'Seksi Aplikasi Dasar',
                'role'    => 'petugas',
                'daerah'   => null,
                'password' => Hash::make('password123'),
                'nip'      => '199702202024012002',
                'jabatan'  => 'Programmer',
                'pangkat'  => 'Penata Muda',
                'gol'      => 'III/a',
                'phone'    => '6287755443322',
            ],
            [
                'name'     => 'Dedi Kurniawan',
                'email'    => 'dedi.opd@gmail.com',
                'unitKerja'    => 'Dinas Pendidikan',
                'role'    => 'opd',
                'daerah'   => 'Belitung',
                'password' => Hash::make('password123'),
                'nip'      => '199011302018011007',
                'jabatan'  => 'Kasubag Umum',
                'pangkat'  => 'Penata Muda Tk. I',
                'gol'      => 'III/b',
                'phone'    => '6281988776655',
            ],
            [
                'name'     => 'Linda Sari',
                'email'    => 'linda.petugas@gmail.com',
                'unitKerja'    => 'Seksi Keamanan Informasi',
                'role'    => 'petugas',
                'daerah'   => null,
                'password' => Hash::make('password123'),
                'nip'      => '199608152023022004',
                'jabatan'  => 'Analis Keamanan Siber',
                'pangkat'  => 'Penata Muda',
                'gol'      => 'III/a',
                'phone'    => '6285344332211',
            ],
            [
                'name'     => 'Agus Mulyadi',
                'email'    => 'agus.pimpinan@gmail.com',
                'unitKerja'    => 'Sekretariat Diskominfo',
                'role'    => 'pimpinan',
                'daerah'   => null,
                'password' => Hash::make('pimpinan123'),
                'nip'      => '197504121998031002',
                'jabatan'  => 'Sekretaris Dinas',
                'pangkat'  => 'Pembina Tk. I',
                'gol'      => 'IV/b',
                'phone'    => '6281122334455',
            ],
            [
                'name'     => 'Rizky Pratama',
                'email'    => 'rizky.opd@gmail.com',
                'unitKerja'    => 'Dinas Sosial',
                'role'    => 'opd',
                'daerah'   => 'Bangka Barat',
                'password' => Hash::make('password123'),
                'nip'      => '199307072020011010',
                'jabatan'  => 'Admin Sistem',
                'pangkat'  => 'Penata Muda',
                'gol'      => 'III/a',
                'phone'    => '6281200998877',
            ],

        ];

        foreach ($data as $item) {
            Petugas::create($item);
        }
        //
    }
}
