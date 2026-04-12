<?php

namespace Database\Seeders;

use App\Models\User;
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
                'name'      => 'Afghan Almufqi',
                'email'     => 'afghan12@gmail.com',
                'unitKerja' => 'Seksi Teknologi Informasi dan Komunikasi',
                'role'      => 'staff', // Sebelumnya petugas
                'daerah'    => null,
                'password'  => Hash::make('password123'),
                'nip'       => '199501012023011001',
                'jabatan'   => 'Pranata Komputer',
                'pangkat'   => 'Penata Muda',
                'gol'       => 'III/a',
                'phone'     => '0895417380105',
            ],
            [
                'name'      => 'gan matkuso',
                'email'     => 'gan12@gmail.com',
                'unitKerja' => 'Seksi Teknologi Informasi dan Komunikasi',
                'role'      => 'katim', // Sebelumnya pimpinan
                'daerah'    => null,
                'password'  => Hash::make('pimpinan123'),
                'nip'       => '199501012023011002',
                'jabatan'   => 'Ketua Tim Teknis',
                'pangkat'   => 'Penata Muda',
                'gol'       => 'III/b',
                'phone'     => '6281234567892',
            ],
            [
                'name'      => 'Budi Setiawan',
                'email'     => 'budi.petugas@gmail.com',
                'unitKerja' => 'Seksi Infrastruktur Jaringan',
                'role'      => 'staff', // Sebelumnya petugas
                'daerah'    => null,
                'password'  => Hash::make('password123'),
                'nip'       => '199501012023011003',
                'jabatan'   => 'Teknisi Jaringan',
                'pangkat'   => 'Penata Muda',
                'gol'       => 'III/a',
                'phone'     => '6281277665544',
            ],
            [
                'name'      => 'Super Admin SPBE',
                'email'     => 'admin@spbe.go.id',
                'unitKerja' => 'Sekretariat',
                'role'      => 'admin', // Role Baru: Admin
                'daerah'    => 'Pusat',
                'password'  => Hash::make('admin123'),
                'nip'       => '198805122015031000',
                'jabatan'   => 'Administrator Sistem',
                'pangkat'   => 'Penata',
                'gol'       => 'III/c',
                'phone'     => '6285211223300',
            ],
            [
                'name'      => 'Hendra Wijaya',
                'email'     => 'hendra.pimpinan@gmail.com',
                'unitKerja' => 'Bidang E-Government',
                'role'      => 'kabid', // Sebelumnya pimpinan
                'daerah'    => null,
                'password'  => Hash::make('pimpinan123'),
                'nip'       => '198001012005011005',
                'jabatan'   => 'Kepala Bidang',
                'pangkat'   => 'Pembina',
                'gol'       => 'IV/a',
                'phone'     => '6281399887766',
            ],
            [
                'name'      => 'Hilal',
                'email'     => 'rina.petugas@gmail.com',
                'unitKerja' => 'Seksi Aplikasi Dasar',
                'role'      => 'staff', // Sebelumnya petugas
                'daerah'    => null,
                'password'  => Hash::make('password123'),
                'nip'       => '199702202024012002',
                'jabatan'   => 'Programmer',
                'pangkat'   => 'Penata Muda',
                'gol'       => 'III/a',
                'phone'     => '082178099027',
            ],
            [
                'name'      => 'Pinkan',
                'email'     => 'linda.petugas@gmail.com',
                'unitKerja' => 'Seksi Keamanan Informasi',
                'role'      => 'staff', // Sebelumnya petugas
                'daerah'    => null,
                'password'  => Hash::make('password123'),
                'nip'       => '199608152023022004',
                'jabatan'   => 'Analis Keamanan Siber',
                'pangkat'   => 'Penata Muda',
                'gol'       => 'III/a',
                'phone'     => '081293172600',
            ],
            [
                'name'      => 'Agus Mulyadi',
                'email'     => 'agus.pimpinan@gmail.com',
                'unitKerja' => 'Sekretariat Diskominfo',
                'role'      => 'kabid', // Sebelumnya pimpinan
                'daerah'    => null,
                'password'  => Hash::make('pimpinan123'),
                'nip'       => '197504121998031002',
                'jabatan'   => 'Sekretaris Dinas',
                'pangkat'   => 'Pembina Tk. I',
                'gol'       => 'IV/b',
                'phone'     => '6281122334455',
            ],
            [
                'name'      => 'Rizky Pratama',
                'email'     => 'rizky.opd@gmail.com',
                'unitKerja' => 'Dinas Sosial',
                'role'      => 'katim', // Sebelumnya opd diubah ke katim agar masuk 4 role utama
                'daerah'    => 'Bangka Barat',
                'password'  => Hash::make('password123'),
                'nip'       => '199307072020011010',
                'jabatan'   => 'Ketua Tim Monitoring',
                'pangkat'   => 'Penata Muda',
                'gol'       => 'III/a',
                'phone'     => '6281200998877',
            ],
        ];

        foreach ($data as $item) {
            User::create($item);
        }
    }
}
