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
        Schema::table('layanan_spbe', function (Blueprint $table) {
            $table->foreignId('petugas_id')->nullable()->after('status')->constrained('users')->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('layanan_spbe', function (Blueprint $table) {
            $table->dropConstrainedForeignId('petugas_id');
        });
    }
};
