<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Jenis_layanan_spbe extends Model
{
    //
    protected $table = 'jenis_layanan_spbe';
    protected $fillable = [
        'kode',
        'namajenis',
        'alias',
        'linkna',
        'modelna',
        'linkna',
        'referensi',
        'status',
    ];

    public function layanan()
    {
        return $this->hasMany(Layanan_spbe::class);
    }

    public function kebutuhan()
    {
        return $this->hasMany(Kebutuhan_layanan_spbe::class);
    }

    public function mandate()
    {
        return $this->hasMany(Mandate::class);
    }
}
