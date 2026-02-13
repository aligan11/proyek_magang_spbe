<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable = [
        'nama_layanan',
        'deskripsi',
        'isAktif',
    ];

    public function mandate()
    {
        return $this->hasMany(mandate::class);
    }

    public function ticket()
    {
        return $this->hasMany(Ticket::class);
    }
    //
}
