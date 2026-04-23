<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

use Illuminate\Notifications\Notifiable;

class Pemohon extends Authenticatable
{
    //
    use HasFactory, Notifiable;
    protected $table = 'pemohon';
    protected $fillable = [
        'nik',
        'tipe_user',

        'nama_lengkap',
        'email',
        'password',
        'no_hp',
        'nip',
        'id_instansi',
        'avatar',
        'alamat',
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

    public function instansi()
    {
        return $this->belongsTo(Instansi::class, 'id_instansi');
    }
}
