<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notifikasi Tindak Lanjut Permohonan</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap');

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background-color: #f0f4f8;
            margin: 0;
            padding: 0;
        }

        .email-wrapper {
            max-width: 600px;
            margin: 0 auto;
            background: #ffffff;
            border-radius: 24px;
            overflow: hidden;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.1);
        }

        .email-header {
            background: linear-gradient(135deg, #1e3a8a 0%, #3b82f6 100%);
            padding: 32px 24px;
            text-align: center;
        }

        .email-header h1 {
            color: #ffffff;
            font-size: 24px;
            font-weight: 700;
            margin: 0;
            text-transform: uppercase;
            letter-spacing: 0.05em;
        }

        .email-header p {
            color: #dbeafe;
            font-size: 14px;
            margin: 8px 0 0;
        }

        .email-body {
            padding: 32px 24px;
        }

        .info-box {
            background: #f8fafc;
            border-left: 4px solid #3b82f6;
            padding: 20px;
            border-radius: 12px;
            margin-bottom: 24px;
        }

        .info-box h3 {
            color: #1e293b;
            font-size: 16px;
            font-weight: 700;
            margin: 0 0 12px;
        }

        .info-row {
            display: flex;
            margin-bottom: 8px;
        }

        .info-label {
            width: 140px;
            color: #64748b;
            font-size: 14px;
            font-weight: 500;
        }

        .info-value {
            flex: 1;
            color: #1e293b;
            font-size: 14px;
            font-weight: 600;
        }

        .petugas-list {
            margin: 12px 0 0;
            padding-left: 20px;
        }

        .petugas-list li {
            color: #1e293b;
            font-size: 14px;
            margin-bottom: 4px;
        }

        .cta-button {
            display: block;
            background: linear-gradient(135deg, #1e3a8a 0%, #3b82f6 100%);
            color: #ffffff !important;
            padding: 16px 32px;
            text-align: center;
            font-weight: 700;
            font-size: 16px;
            text-decoration: none;
            border-radius: 12px;
            margin: 24px 0;
            text-transform: uppercase;
            letter-spacing: 0.05em;
        }

        .cta-button:hover {
            background: linear-gradient(135deg, #1e40af 0%, #2563eb 100%);
        }

        .sop-notice {
            background: #fef9c3;
            border-left: 4px solid #eab308;
            padding: 20px;
            border-radius: 12px;
            margin-bottom: 24px;
        }

        .sop-notice h3 {
            color: #854d0e;
            font-size: 14px;
            font-weight: 700;
            margin: 0 0 8px;
            text-transform: uppercase;
            letter-spacing: 0.05em;
        }

        .sop-notice p {
            color: #713f12;
            font-size: 13px;
            margin: 0;
            line-height: 1.6;
        }

        .email-footer {
            background: #f8fafc;
            padding: 24px;
            text-align: center;
            border-top: 1px solid #e2e8f0;
        }

        .email-footer p {
            color: #64748b;
            font-size: 12px;
            margin: 0;
            line-height: 1.6;
        }

        .email-footer a {
            color: #3b82f6;
            text-decoration: none;
        }
    </style>
</head>

<body>
    <div class="email-wrapper">
        <div class="email-header">
            <h1>DINAS KOMUNIKASI DAN INFORMATIKA</h1>
            <p>Portal Layanan SPBE Pemerintah</p>
        </div>

        <div class="email-body">
            <p style="color: #1e293b; font-size: 16px; margin-bottom: 24px;">
                Yth. <strong>{{ $ticket->nama_pemohon }}</strong>,
            </p>

            <p style="color: #475569; font-size: 15px; line-height: 1.8; margin-bottom: 24px;">
                Kami ingin memberitahukan bahwa permohonan layanan Anda telah diterima dan akan segera ditindaklanjuti
                oleh petugas kami. Berikut adalah detail informasi permohonan Anda:
            </p>

            <div class="info-box">
                <h3>📋 Detail Permohonan Layanan</h3>
                <div class="info-row">
                    <span class="info-label">Nomor Registrasi</span>
                    <span class="info-value">{{ $ticket->noreg }}</span>
                </div>
                <div class="info-row">
                    <span class="info-label">Tanggal Pengajuan</span>
                    <span
                        class="info-value">{{ \Carbon\Carbon::parse($ticket->tgl_permohonan)->format('d F Y') }}</span>
                </div>
                <div class="info-row">
                    <span class="info-label">Nama Kebutuhan</span>
                    <span class="info-value">{{ $ticket->nama_kebutuhan }}</span>
                </div>
                <div class="info-row">
                    <span class="info-label">Nama Penanggung Jawab</span>
                    <span class="info-value">{{ $ticket->nama_penanggungjawab }}</span>
                </div>
                <div class="info-row" style="margin-bottom: 0;">
                    <span class="info-label">Petugas Yang Ditugaskan</span>
                    <span class="info-value" style="font-weight: 500;">
                        @if (count($petugas) > 0)
                            <ul class="petugas-list">
                                @foreach ($petugas as $p)
                                    <li>{{ $p->name }} ({{ $p->jabatan }})</li>
                                @endforeach
                            </ul>
                        @else
                            <span style="color: #64748b;">Belum ada petugas yang ditugaskan</span>
                        @endif
                    </span>
                </div>
            </div>

            @if ($tindakLanjut->keterangan)
                <div class="info-box" style="border-left-color: #10b981; background: #f0fdf4;">
                    <h3>📝 Catatan Dari Pimpinan</h3>
                    <p style="color: #065f46; font-size: 14px; margin: 0; line-height: 1.7;">
                        {{ $tindakLanjut->keterangan }}
                    </p>
                </div>
            @endif

            <div class="sop-notice">
                <h3>⚠️ Informasi Penting</h3>
                <p>
                    Sesuai dengan Standar Operasional Prosedur (SOP) Dinas Kominfo, petugas kami akan segera
                    menindaklanjuti permohonan Anda maksimal dalam waktu 3 (tiga) hari kerja. Mohon untuk selalu
                    memantau status permohonan Anda melalui dashboard portal layanan SPBE.
                    <br><br>
                    Jika ada pertanyaan atau membutuhkan klarifikasi lebih lanjut, Anda dapat menghubungi tim layanan
                    kami pada jam kerja operasional.
                </p>
            </div>

            <a href="{{ url('/login-pemohon') }}" class="cta-button">
                🔗 Buka Dashboard Pemohon
            </a>

            <p style="color: #64748b; font-size: 13px; margin: 0; line-height: 1.6;">
                Hormat kami,<br>
                <strong>Dinas Komunikasi dan Informatika</strong>
            </p>
        </div>

        <div class="email-footer">
            <p>
                Email ini dikirim secara otomatis oleh Sistem Layanan SPBE. Mohon untuk tidak membalas email ini.<br>
                Untuk bantuan dan pertanyaan, Anda dapat menghubungi tim layanan kami melalui kontak yang tersedia di
                website resmi.
                <br><br>
                © {{ date('Y') }} Dinas Komunikasi dan Informatika. Semua Hak Dilindungi.
            </p>
        </div>
    </div>
</body>

</html>
