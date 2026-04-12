<?php

namespace Database\Seeders;

use App\Models\Petugas;
use App\Models\Service;
use App\Models\Ticket;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TicketSeeder extends Seeder
{
    /**
     * Run the database seeds.  
     * 
     * 
     */
    public function run(): void
    {
        $opdIds =  User::pluck('id')->toArray();
        $serviceIds = Service::pluck('id')->toArray();

        $tickets = [
            [
                'no_ticket'     => 'TKT-20260213001',
                'opd_id'        => $opdIds[array_rand($opdIds)],
                'service_id'    => $serviceIds[0],
                'judul_request' => 'Internet Lantai 2 Mati',
                'deskripsi'     => 'Sudah dicoba restart router tapi koneksi tetap tidak ada di seluruh ruangan.',
                'status'        => 'proses',
            ],
            [
                'no_ticket'     => 'TKT-20260213002',
                'opd_id'        => $opdIds[array_rand($opdIds)],
                'service_id'    => $serviceIds[3],
                'judul_request' => 'Aktivasi TTE Kepala Dinas',
                'deskripsi'     => 'Mohon bantuan untuk aktivasi TTE baru karena masa berlaku yang lama sudah habis.',
                'status'        => 'selesai',
            ],
            [
                'no_ticket'     => 'TKT-20260213003',
                'opd_id'        => $opdIds[array_rand($opdIds)],
                'service_id'    => $serviceIds[2],
                'judul_request' => 'Update Berita di Website',
                'deskripsi'     => 'Tolong bantu upload dokumentasi kegiatan kunjungan kerja kemarin sore.',
                'status'        => 'proses',
            ],
            [
                'no_ticket'     => 'TKT-20260213004',
                'opd_id'        => $opdIds[array_rand($opdIds)],
                'service_id'    => $serviceIds[4],
                'judul_request' => 'Printer Macet (Paper Jam)',
                'deskripsi'     => 'Printer di bagian keuangan macet dan mengeluarkan suara aneh saat mencetak.',
                'status'        => 'proses',
            ],
            [
                'no_ticket'     => 'TKT-20260213005',
                'opd_id'        => $opdIds[array_rand($opdIds)],
                'service_id'    => $serviceIds[1],
                'judul_request' => 'Instalasi Zoom Pro',
                'deskripsi'     => 'Butuh bantuan instalasi dan login akun Zoom Pro untuk rapat jam 1 siang.',
                'status'        => 'proses',
            ],
            [
                'no_ticket'     => 'TKT-20260213006',
                'opd_id'        => $opdIds[array_rand($opdIds)],
                'service_id'    => $serviceIds[7],
                'judul_request' => 'Pengajuan Subdomain Baru',
                'deskripsi'     => 'Permohonan domain silaper.kabupaten.go.id untuk aplikasi perizinan baru.',
                'status'        => 'selesai',
            ],
            [
                'no_ticket'     => 'TKT-20260213007',
                'opd_id'        => $opdIds[array_rand($opdIds)],
                'service_id'    => $serviceIds[6],
                'judul_request' => 'Backup Data Database',
                'deskripsi'     => 'Mohon bantu backup data database Simpeg sebelum ada maintenance rutin.',
                'status'        => 'proses',
            ],
            [
                'no_ticket'     => 'TKT-20260213008',
                'opd_id'        => $opdIds[array_rand($opdIds)],
                'service_id'    => $serviceIds[9],
                'judul_request' => 'Booking Akun Zoom',
                'deskripsi'     => 'Request akun zoom untuk sosialisasi hari Senin depan selama 3 jam.',
                'status'        => 'selesai',
            ],
            [
                'no_ticket'     => 'TKT-20260213009',
                'opd_id'        => $opdIds[array_rand($opdIds)],
                'service_id'    => $serviceIds[0],
                'judul_request' => 'WiFi Publik Lemot',
                'deskripsi'     => 'Banyak keluhan dari pengunjung karena WiFi di ruang tunggu sangat lambat.',
                'status'        => 'proses',
            ],
            [
                'no_ticket'     => 'TKT-20260213010',
                'opd_id'        => $opdIds[array_rand($opdIds)],
                'service_id'    => $serviceIds[4],
                'judul_request' => 'Mouse Rusak',
                'deskripsi'     => 'Butuh penggantian unit mouse baru karena yang lama klik kirinya tidak berfungsi.',
                'status'        => 'selesai',
            ],
        ];

        foreach ($tickets as $item) {
            Ticket::create($item);
        }
        //
    }
}
