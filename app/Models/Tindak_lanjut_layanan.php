<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tindak_lanjut_layanan extends Model
{
    //
    protected $table = 'tindak_lanjut_layanan';

    protected $fillable = [
        'id_layanan',
        'id_petugas',
    ];

    protected $casts = [
        'id_petugas' => 'array',
    ];

    public function ticket()
    {
        return $this->belongsTo(Layanan_spbe::class, 'id_layanan');
    }

    public function layanan()
    {
        return $this->belongsTo(Layanan_spbe::class, 'id_layanan');
    }



    public function petugas_tindak()
    {
        return $this->belongsTo(User::class, 'id_petugas');
    }
}
