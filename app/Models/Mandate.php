<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mandate extends Model
{
    //
    protected $fillable = [
        'service_id',
        'ticket_id',
        'pimpinan_id',
        'deskripsi',
        'status',
    ];

    public function service()
    {
        return $this->belongsTo(Jenis_layanan_spbe::class);
    }

    public function ticket()
    {
        return $this->belongsTo(Layanan_spbe::class);
    }

    public function pimpinan()
    {
        return $this->belongsTo(User::class);
    }

    public function mandate_petugas()
    {
        return $this->belongsToMany(User::class);
    }
}
