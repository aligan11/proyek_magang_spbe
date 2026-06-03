<!DOCTYPE html>
<html>

<head>
    <title>Formulir Permohonan Layanan SPBE</title>
    <style>
        body {
            font-family: 'Helvetica', 'Arial', sans-serif;
            font-size: 11pt;
            color: #333;
            line-height: 1.6;
        }

        .header {
            text-align: center;
            border-bottom: 3px double #000;
            padding-bottom: 10px;
            margin-bottom: 30px;
        }

        .header h1 {
            margin: 0;
            font-size: 18pt;
            text-transform: uppercase;
        }

        .header p {
            margin: 2px 0;
            font-size: 10pt;
        }

        .noreg {
            text-align: right;
            font-weight: bold;
            font-family: monospace;
            margin-bottom: 20px;
            font-size: 12pt;
        }

        .section-title {
            background: #f4f4f4;
            padding: 5px 10px;
            font-weight: bold;
            text-transform: uppercase;
            border-left: 5px solid #2563eb;
            margin-top: 20px;
            margin-bottom: 10px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        td {
            padding: 8px 5px;
            vertical-align: top;
        }

        .label {
            width: 35%;
            font-weight: bold;
            color: #666;
        }

        .value {
            width: 65%;
            border-bottom: 1px solid #eee;
        }

        .footer {
            margin-top: 50px;
        }

        .signature-box {
            float: right;
            width: 250px;
            text-align: center;
        }

        .signature-space {
            height: 80px;
        }
    </style>
</head>

<body>
    <div class="header">
        <h1>Dinas Komunikasi dan Informatika</h1>
        <p>Provinsi Kepulauan Bangka Belitung</p>
        <p>Jl. Pulau Bangka, Komplek Perkantoran Terpadu Pemerintah Provinsi</p>
    </div>

    <div class="noreg">No. Registrasi: {{ $detail->noreg }}</div>

    <div class="section-title">Informasi Pemohon</div>
    <table>
        <tr>
            <td class="label">Nama Instansi</td>
            <td class="value">{{ $detail->nama_instansi }}</td>
        </tr>
        <tr>
            <td class="label">Unit Kerja</td>
            <td class="value">{{ $detail->unitkerja }}</td>
        </tr>
        <tr>
            <td class="label">Nama Pemohon</td>
            <td class="value">{{ $detail->inputby }}</td>
        </tr>
        <tr>
            <td class="label">Lokasi Kejadian/Kebutuhan</td>
            <td class="value">{{ $detail->lokasi }}</td>
        </tr>
    </table>

    <div class="section-title">Detail Layanan SPBE</div>
    <table>
        <tr>
            <td class="label">Jenis Layanan</td>
            <td class="value">{{ $detail->jenis_layanan->namajenis ?? '-' }}</td>
        </tr>
        <tr>
            <td class="label">Judul / Perihal</td>
            <td class="value">{{ $detail->nama_kebutuhan }}</td>
        </tr>
        <tr>
            <td class="label">Periode Pengajuan</td>
            <td class="value">{{ $detail->periode }} / Tahun {{ $detail->tahunanggaran }}</td>
        </tr>
        <tr>
            <td class="label">Keterangan Tambahan</td>
            <td class="value">{{ $detail->ket ?? '-' }}</td>
        </tr>
    </table>

    <div class="section-title">Penanggung Jawab Struktural</div>
    <table>
        <tr>
            <td class="label">Nama Penanggung Jawab</td>
            <td class="value">{{ $detail->nama_penanggungjawab }}</td>
        </tr>
        <tr>
            <td class="label">NIP</td>
            <td class="value">{{ $detail->nip_penanggungjawab }}</td>
        </tr>
        <tr>
            <td class="label">Jabatan</td>
            <td class="value">{{ $detail->jabatan_penanggungjawab }}</td>
        </tr>
        <tr>
            <td class="label">Kontak (WA/Email)</td>
            <td class="value">{{ $detail->nohp_penanggungjawab }} / {{ $detail->email_penanggungjawab }}</td>
        </tr>
    </table>

    <div class="footer">
        <div class="signature-box">
            <p>Dicetak pada: {{ now()->format('d/m/Y H:i') }}</p>
            <p>Penanggung Jawab,</p>
            <div class="signature-space"></div>
            <p><strong>( {{ $detail->nama_penanggungjawab }} )</strong></p>
            <p>NIP. {{ $detail->nip_penanggungjawab }}</p>
        </div>
    </div>
</body>

</html>
