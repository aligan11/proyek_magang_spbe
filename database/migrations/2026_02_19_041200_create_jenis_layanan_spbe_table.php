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
        Schema::create('jenis_layanan_spbe', function (Blueprint $table) {
            $table->id();
            $table->string('kode', 10)->nullable();
            $table->string('namajenis')->nullable();
            $table->string('alias')->nullable();
            $table->string('linkna')->nullable();
            $table->string('modelna')->nullable();
            $table->string('referensi')->nullable();
            $table->string('status')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jenis_layanan_spbe');
    }
};
