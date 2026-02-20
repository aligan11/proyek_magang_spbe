<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kebutuhan_layanan_spbe extends Model
{
    protected $table = 'kebutuhan_layanan_spbe';
    //
    protected $fillable = [
        'id_jenis_layanan_spbe',
        'no_kebutuhan',
        'nama_kebutuhan',
        'status',
        'ket',
    ];

    public function layanan()
    {
        return $this->hasMany(Layanan_spbe::class);
    }

    public function jenis_layanan()
    {
        return $this->belongsTo(Jenis_layanan_spbe::class);
    }
}
