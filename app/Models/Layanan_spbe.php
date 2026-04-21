<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Layanan_spbe extends Model
{
    //
    protected $table = 'layanan_spbe';

    protected $fillable = [
        'id_jenis_layanan',
        'id_kebutuhan',
        'is_eksternal',
        'tahunanggaran',
        'periode',
        'noreg',
        'id_instansi',
        'nama_instansi',
        'unitKerja',
        'lokasi',
        'unitKerja',
        'lokasi',
        'nama_kebutuhan',
        'nama_pemohon',
        'nama_penanggungjawab',
        'nip_penanggungjawab',
        'nohp_penanggungjawab',
        'jabatan_penanggungjawab',
        'unitkerja_penanggungjawab',
        'email_penanggungjawab',
        'ket',
        'tgl_permohonan',
        'berkas',
        'status',
        'inputby',
        'tglinput',
        'status_ver',
        'verby',
        'tglver',
        'nover',
        'ketver',
        'berkasver',
    ];

    const STATUS_PENDING = 1;
    const STATUS_PROSES = 2;
    const STATUS_SELESAI = 3;

    protected $casts = [
        'tgl_permohonan' => 'datetime',
        'tglinput' => 'datetime',
        'id_kebutuhan' => 'array',
    ];

    public function inputer()
    {
        return $this->belongsTo(Pemohon::class, 'inputby');
    }

    public function instansi_rel()
    {
        return $this->belongsTo(Instansi::class, 'id_instansi');
    }

    public function jenis_layanan()
    {
        return $this->belongsTo(Jenis_layanan_spbe::class, 'id_jenis_layanan');
    }

    public function kebutuhan()
    {
        return $this->belongsTo(Kebutuhan_layanan_spbe::class);
    }

    public function mandates()
    {
        return $this->hasMany(Mandate::class, 'ticket_id');
    }
}
