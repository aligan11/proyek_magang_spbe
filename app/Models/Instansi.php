<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Instansi extends Model
{
    // SEKARANG SUDAH AKTIF: Menegaskan Laravel untuk membaca tabel 'instansi' di phpMyAdmin
    protected $table = 'instansi';

    protected $fillable = [
        'id_induk',
        'kode_instansi',
        'nama_instansi',
        'singkatan',
        'alamat',
        'telepon',
        'email',
        'status',
    ];

    public function instansi()
    {
        return $this->hasMany(Pemohon::class);
    }
}
