<?php

namespace Database\Seeders;

use App\Models\Layanan_spbe;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class layanan_spbe_seeder extends Seeder
{
    public function run(): void
    {
        $instansi = ['Dinas Kesehatan', 'Dinas Pendidikan', 'Bappeda', 'Diskominfo', 'DPMPTSP'];

        for ($i = 1; $i <= 10; $i++) { // Mulai dari 1 agar noreg rapi
            $tglMohon = Carbon::now()->subDays(rand(1, 30));
            $namaInstansi = $instansi[array_rand($instansi)];

            // Langsung gunakan Create di dalam loop
            Layanan_spbe::create([
                'id_jenis_layanan' => rand(1, 5),
                'id_kebutuhan' => rand(1, 10),
                'is_eksternal' => rand(0, 1),
                'tahunanggaran' => 2024,
                'periode' => 'Triwulan I',
                'noreg' => 'REG/2024/' . str_pad($i, 4, '0', STR_PAD_LEFT),
                'id_instansi' => rand(1, 5),
                'nama_instansi' => $namaInstansi,
                'unitKerja' => 'Bidang Teknologi Informasi',
                'lokasi' => 'Gedung A Lantai ' . rand(1, 5),
                'nama_kebutuhan' => 'Pengembangan Sistem Informasi ' . $i,
                'nama_pemohon' => 'Pemohon User ' . $i,
                'nama_penanggungjawab' => 'Bpk/Ibu Pejabat ' . $i,
                'nip_penanggungjawab' => '198501012010011' . str_pad($i, 3, '0', STR_PAD_LEFT),
                'nohp_penanggungjawab' => '0812345678' . $i,
                'jabatan_penanggungjawab' => 'Kepala Bidang',
                'unitKerja_penanggungjawab' => $namaInstansi,
                'email_penanggungjawab' => 'pj' . $i . '@instansi.go.id',
                'ket' => 'Keterangan permohonan ke-' . $i,
                'tgl_permohonan' => $tglMohon,
                'berkas' => 'berkas_permohonan_' . $i . '.pdf',
                'status' => 1,
                'inputby' => 'Admin System',
                'tglinput' => Carbon::now(),

                'status_ver' => $i % 2 == 0 ? 'disetujui' : 'pending',
                'verby' => $i % 2 == 0 ? 'Verifikator Utama' : null,
                'tglver' => $i % 2 == 0 ? Carbon::now() : null,
                'nover' => $i % 2 == 0 ? 'V/2024/ABC/' . $i : null,
                'ketver' => $i % 2 == 0 ? 'Dokumen lengkap dan sesuai.' : null,
                'berkasver' => null,
            ]);
        }
    }
}
