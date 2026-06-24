<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('berita_acara_pemeriksaan', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_tindak_lanjut')
                ->constrained('tindak_lanjut_layanan')
                ->cascadeOnDelete();
            $table->text('ringkasan_pekerjaan')->nullable();
            $table->text('ringkasan_masalah')->nullable();
            $table->text('alternatif_solusi')->nullable();
            $table->string('lokasi')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('berita_acara_pemeriksaan');
    }
};
