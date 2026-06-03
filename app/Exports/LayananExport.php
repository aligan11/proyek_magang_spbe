<?php

namespace App\Exports;

use App\Models\Layanan_spbe;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class LayananExport implements FromCollection, WithHeadings, WithMapping
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Layanan_spbe::with(['jenis_layanan', 'inputer'])->get();
    }

    public function headings(): array
    {
        return [
            'No. Registrasi',
            'Tgl Permohonan',
            'Instansi',
            'Unit Kerja',
            'Nama Pemohon',
            'Jenis Layanan',
            'Kebutuhan',
            'Status',
            'Penanggung Jawab',
        ];
    }

    public function map($layanan): array
    {
        $status = match ($layanan->status) {
            1 => 'Pending',
            2 => 'Proses',
            3 => 'Selesai',
            default => 'Pending',
        };

        return [
            $layanan->noreg,
            $layanan->tgl_permohonan->format('d/m/Y'),
            $layanan->nama_instansi,
            $layanan->unitKerja,
            $layanan->nama_pemohon,
            $layanan->jenis_layanan->namajenis ?? '-',
            $layanan->nama_kebutuhan,
            $status,
            $layanan->nama_penanggungjawab,
        ];
    }
}
