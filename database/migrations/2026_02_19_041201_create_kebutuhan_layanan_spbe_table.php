<?php

use App\Models\Layanan_spbe;
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
        Schema::create('kebutuhan_layanan_spbe', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_jenis_layanan_spbe')->constrained('jenis_layanan_spbe', 'id')->cascadeOnDelete();
            $table->integer('no_kebutuhan')->nullable();
            $table->string('nama_kebutuhan')->nullable();
            $table->char('status', 1)->nullable();
            $table->string('ket')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kebutuhan_layanan_spbe');
    }
};
