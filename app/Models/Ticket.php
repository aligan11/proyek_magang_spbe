<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    //
    protected $fillable = [
        'no_ticket',
        'opd_id',
        'no_ticket',
        'service_id',
        'judul_request',
        'deskripsi',
        'status',
    ];

    public function mandate()
    {
        return $this->hasMany(Mandate::class);
    }

    public function opd()
    {
        return $this->belongsTo(User::class);
    }

    public function service()
    {
        return $this->belongsTo(Service::class);
    }
}
