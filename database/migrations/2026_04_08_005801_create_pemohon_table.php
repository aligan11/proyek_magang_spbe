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
        Schema::create('pemohon', function (Blueprint $table) {
            $table->id();
            $table->enum('jenis_pemohon', ['internal', 'eksternal'])->default('eksternal');

            // Data Utama (Wajib untuk semua)
            $table->string('nik', 16)->unique();
            $table->string('nama_lengkap');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('no_hp', 15);

            // Data Khusus Internal (ASN) - Nullable karena Eksternal tidak punya
            $table->string('nip', 18)->nullable()->unique();
            $table->unsignedBigInteger('id_instansi')->nullable();

            // Data Khusus Eksternal (Umum)
            $table->text('alamat')->nullable();

            // Metadata
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();

            // Indexing untuk performa pencarian
            $table->index(['jenis_pemohon', 'nik', 'email']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pemohons');
    }
};
