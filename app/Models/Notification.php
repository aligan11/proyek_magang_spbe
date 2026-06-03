<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    protected $fillable = [
        'user_id',
        'pemohon_id',
        'type',
        'message',
        'related_id',
        'related_type',
        'is_read',
    ];

    protected $casts = [
        'is_read' => 'boolean',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function pemohon()
    {
        return $this->belongsTo(Pemohon::class);
    }
}
