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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('unitKerja');
            $table->string('email')->unique();
            $table->enum('role', ['admin', 'kabid', 'katim', 'staff']);
            $table->string('daerah')->nullable();
            $table->string('password');
            $table->string('nip')->unique();
            $table->string('jabatan');
            $table->string('pangkat');
            $table->string('gol');
            $table->string('phone');
            $table->rememberToken();

            $table->timestamp('last_seen')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
