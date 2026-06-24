<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Berita_acara_pemeriksaan extends Model
{
    protected $table = 'berita_acara_pemeriksaan';

    protected $fillable = [
        'id_tindak_lanjut',
        'ringkasan_pekerjaan',
        'ringkasan_masalah',
        'alternatif_solusi',
        'lokasi',
    ];

    public function tindakLanjut()
    {
        return $this->belongsTo(Tindak_lanjut_layanan::class, 'id_tindak_lanjut', 'id');
    }
}
