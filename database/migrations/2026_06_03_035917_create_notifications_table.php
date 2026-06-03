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
        Schema::create('notifications', function (Blueprint $table) {
            $table->id();
            
            // Untuk petugas dan pimpinan (Mengikuti tabel users bawaan Laravel yang biasanya unsigned)
            $table->unsignedBigInteger('user_id')->nullable(); 
            
            // PERBAIKAN: Menggunakan bigInteger biasa tanpa 'unsigned' agar sama dengan tabel pemohon Anda
            $table->bigInteger('pemohon_id')->nullable(); 
            
            $table->string('type'); // e.g., 'new_mandate', 'request_completed', 'new_request'
            $table->text('message');
            $table->unsignedBigInteger('related_id')->nullable(); // e.g., mandate_id, layanan_id
            $table->string('related_type')->nullable(); // e.g., 'mandate', 'layanan'
            $table->boolean('is_read')->default(false);
            $table->timestamps();

            // Setup Foreign Key Constraints
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('pemohon_id')->references('id')->on('pemohon')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notifications');
    }
};
