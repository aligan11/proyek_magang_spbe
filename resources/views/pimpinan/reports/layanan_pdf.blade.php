<!DOCTYPE html>
<html>
<head>
    <title>Laporan Layanan SPBE</title>
    <style>
        body { font-family: sans-serif; font-size: 10pt; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; font-weight: bold; text-transform: uppercase; font-size: 8pt; }
        .header { text-align: center; margin-bottom: 30px; }
        .header h2 { margin: 0; text-transform: uppercase; }
        .header p { margin: 5px 0; color: #666; }
        .status { font-weight: bold; text-transform: uppercase; font-size: 8pt; }
    </style>
</head>
<body>
    <div class="header">
        <h2>Laporan Permohonan Layanan SPBE</h2>
        <p>Dinas Komunikasi dan Informatika</p>
        <p>Tanggal Cetak: {{ now()->format('d F Y H:i') }}</p>
    </div>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>No. Registrasi</th>
                <th>Instansi / Unit Kerja</th>
                <th>Pemohon</th>
                <th>Perihal / Kebutuhan</th>
                <th>Tgl Masuk</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $index => $item)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td><strong>{{ $item->noreg }}</strong></td>
                <td>{{ $item->nama_instansi }}<br><small>{{ $item->unitKerja }}</small></td>
                <td>{{ $item->nama_pemohon }}</td>
                <td>{{ $item->nama_kebutuhan }}</td>
                <td>{{ $item->tglinput->format('d/m/Y') }}</td>
                <td class="status">
                    @if($item->status == 1) PENDING
                    @elseif($item->status == 2) PROSES
                    @elseif($item->status == 3) SELESAI
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
