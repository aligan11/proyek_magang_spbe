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
        'id_pemohon',
        'nama_instansi',
        'unitKerja',
        'lokasi',
        'lokasi',
        'nama_kebutuhan',
        'nama_pemohon',
        'nama_penanggungjawab',
        'nip_penanggungjawab',
        'nohp_penanggungjawab',
        'jabatan_penanggungjawab',
        'unitKerja_penanggungjawab',
        'email_penanggungjawab',
        'ket',
        'tgl_permohonan',
        'berkas',
        'status',
        'petugas_id',
        'inputby',
        'tglinput',
        'status_ver',
        'verby',
        'tglver',
        'nover',
        'ketver',
        'berkasver',
        'status_tl',
        'tl_by',
        'tgl_tl',
    ];

    const STATUS_PROSES = 3;
    const STATUS_SELESAI = 2;
    const STATUS_PENDING = 1;

    protected $casts = [
        'tgl_permohonan' => 'datetime',
        'tglinput' => 'datetime',
        'id_kebutuhan' => 'array',
        'petugas_ids' => 'array',
    ];

    public function inputer()
    {
        return $this->belongsTo(Pemohon::class, 'inputby');
    }

    public function pemohon()
    {
        return $this->belongsTo(Pemohon::class, 'id_pemohon');
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

    public function petugas()
    {
        return $this->belongsTo(User::class, 'petugas_id');
    }

    public function tindak_lanjut()
    {
        return $this->hasMany(tindak_lanjut_layanan::class, 'id_layanan');
    }
}
