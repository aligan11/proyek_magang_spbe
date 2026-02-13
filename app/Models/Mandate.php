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
        return $this->belongsTo(Service::class);
    }

    public function ticket()
    {
        return $this->belongsTo(Ticket::class);
    }

    public function pimpinan()
    {
        return $this->belongsTo(Petugas::class);
    }

    public function mandate_petugas()
    {
        return $this->belongsToMany(Petugas::class);
    }
}
