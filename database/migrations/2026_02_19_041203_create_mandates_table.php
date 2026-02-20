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
        Schema::create('mandates', function (Blueprint $table) {
            $table->id();
            $table->foreignId('service_id')->nullable()->constrained('jenis_layanan_spbe')->cascadeOnDelete();
            $table->foreignId('ticket_id')->constrained('layanan_spbe')->cascadeOnDelete();
            $table->foreignId('pimpinan_id')->constrained('petugas')->cascadeOnDelete();
            $table->string('deskripsi');
            $table->enum('status', ['pending', 'selesai'])->default('pending');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mandates');
    }
};
