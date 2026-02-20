<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('layanan_spbe', function (Blueprint $table) {
            $table->id();

            // Relasi & Identitas
            $table->foreignId('id_jenis_layanan')->nullable()->constrained('jenis_layanan_spbe')->cascadeOnDelete();
            $table->foreignId('id_kebutuhan')->nullable()->constrained('kebutuhan_layanan_spbe', 'id')->cascadeOnDelete();
            $table->char('is_eksternal', 1)->default(1)->nullable();

            // Waktu & Registrasi
            $table->year('tahunanggaran');
            $table->string('periode')->nullable();
            $table->string('noreg')->unique();
            $table->date('tgl_permohonan');

            // Instansi & Unit Kerja
            $table->foreignId('id_instansi')->nullable();
            $table->string('nama_instansi')->nullable();
            $table->string('unitKerja')->nullable();
            $table->string('lokasi')->nullable();
            $table->string('nama_kebutuhan')->nullable();

            // Pemohon & Penanggung Jawab
            $table->string('nama_pemohon')->nullable();
            $table->string('nama_penanggungjawab');
            $table->string('nip_penanggungjawab')->nullable();
            $table->string('nohp_penanggungjawab')->nullable();
            $table->string('jabatan_penanggungjawab')->nullable();
            $table->string('unitkerja_penanggungjawab')->nullable();
            $table->string('email_penanggungjawab')->nullable();

            // Data Tambahan & Berkas
            $table->text('ket')->nullable();
            $table->string('berkas')->nullable(); // Simpan path file
            $table->char('status', 1)->default('1');

            // Audit Log (Input)
            $table->string('inputby')->nullable();
            $table->timestamp('tglinput')->nullable();

            // Verifikasi
            $table->string('status_ver')->nullable();
            $table->string('verby')->nullable();
            $table->timestamp('tglver')->nullable();
            $table->string('nover')->nullable();
            $table->text('ketver')->nullable();
            $table->string('berkasver')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('layanan_spbe');
    }
};
