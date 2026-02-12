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
        Petugas::create(
            [
                'name'     => 'Afghan Almufq',
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
            ]
        );
        //
    }
}
