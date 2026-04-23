<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{

    use HasFactory, Notifiable;
    protected $fillable = [
        'name',
        'email',
        'role',
        'daerah',
        'unitKerja',
        'password',
        'nip',
        'jabatan',
        'pangkat',
        'gol',
        'avatar',
        'phone',
        'last_seen',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }


    public function ticket()
    {
        return $this->hasMany(Ticket::class);
    }

    public function mandate()
    {
        return $this->hasMany(Mandate::class);
    }

    public function mandate_users()
    {
        return $this->belongsToMany(Mandate::class);
    }

    public function isOnline()
    {
        return $this->last_seen && $this->last_seen->diffInMinutes(now()) < 5;
    }
}
