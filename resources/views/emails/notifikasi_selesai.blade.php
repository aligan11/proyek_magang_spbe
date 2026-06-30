<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notifikasi Permohonan Selesai</title>
</head>

<body
    style="background: linear-gradient(135deg, #f0f9ff 0%, #e0f2fe 100%); padding: 32px 16px; margin: 0; font-family: 'Plus Jakarta Sans', 'Segoe UI', Roboto, Helvetica, Arial, sans-serif;">

    <div class="email-wrapper"
        style="max-width: 640px; margin: 0 auto; background: #ffffff; border-radius: 24px; overflow: hidden; box-shadow: 0 20px 40px rgba(15, 23, 42, 0.08); border: 1px solid #e2e8f0;">

        <!-- Header: bg-slate-900 to bg-blue-800 -->
        <div class="email-header"
            style="background: linear-gradient(135deg, #0f172a 0%, #1e40af 100%); padding: 40px 32px; text-align: center;">
            <h1
                style="color: #ffffff; font-size: 24px; font-weight: 800; margin: 0; letter-spacing: 0.02em; text-transform: uppercase;">
                ✨ PERMOHONAN LAYANAN TELAH SELESAI</h1>
            <p
                style="color: #bfdbfe; font-size: 12px; font-weight: 600; margin: 8px 0 0; text-transform: uppercase; letter-spacing: 0.15em;">
                Sistem Layanan SPBE - Dinas Komunikasi dan Informatika</p>
        </div>

        <!-- Body -->
        <div class="email-body" style="padding: 40px 32px;">
            <p class="greeting"
                style="color: #0f172a; font-size: 18px; font-weight: 700; margin-top: 0; margin-bottom: 16px;">Halo,
                {{ $task->nama_pemohon ?? 'Bapak/Ibu Pemohon' }}!</p>
            <p class="intro-text" style="color: #475569; font-size: 15px; line-height: 1.7; margin-bottom: 32px;">
                Dengan hormat, kami ingin memberitahukan bahwa permohonan layanan Anda dengan nomor registrasi berikut
                telah berhasil diverifikasi dan selesai diproses oleh petugas kami.
            </p>

            <!-- Info Card -->
            <div class="info-card"
                style="background-color: #f8fafc; border-left: 6px solid #1d4ed8; border-radius: 16px; padding: 24px; margin-bottom: 32px;">
                <div class="info-card-title"
                    style="color: #1e293b; font-size: 16px; font-weight: 800; margin-bottom: 20px; display: flex; align-items: center;">
                    <span style="margin-right: 8px; display: inline-block; vertical-align: middle;">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M9 12L11 14L15 10M21 12C21 16.9706 16.9706 21 12 21C7.02944 21 3 16.9706 3 12C3 7.02944 7.02944 3 12 3C16.9706 3 21 7.02944 21 12Z"
                                stroke="#1d4ed8" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </span>
                    <span style="vertical-align: middle;">Detail Permohonan</span>
                </div>

                <!-- Info Table List -->
                <table style="width: 100%; border-collapse: collapse;">
                    <tr style="border-bottom: 1px solid #edf2f7;">
                        <td style="width: 150px; color: #64748b; font-size: 14px; font-weight: 600; padding: 10px 0;">
                            Nomor Registrasi</td>
                        <td style="color: #0f172a; font-size: 14px; font-weight: 700; padding: 10px 0;">
                            {{ $task->noreg }}</td>
                    </tr>
                    <tr style="border-bottom: 1px solid #edf2f7;">
                        <td style="color: #64748b; font-size: 14px; font-weight: 600; padding: 10px 0;">Tanggal Selesai
                        </td>
                        <td style="color: #0f172a; font-size: 14px; font-weight: 700; padding: 10px 0;">
                            {{ \Carbon\Carbon::parse($task->tglver)->translatedFormat('l, d F Y - H:i') }} WIB</td>
                    </tr>
                    <tr style="border-bottom: 1px solid #edf2f7;">
                        <td style="color: #64748b; font-size: 14px; font-weight: 600; padding: 10px 0;">Nama Kebutuhan
                        </td>
                        <td style="color: #0f172a; font-size: 14px; font-weight: 700; padding: 10px 0;">
                            {{ $task->nama_kebutuhan }}</td>
                    </tr>
                    <tr style="border-bottom: 1px solid #edf2f7;">
                        <td style="color: #64748b; font-size: 14px; font-weight: 600; padding: 10px 0;">Petugas
                            Verifikator</td>
                        <td style="color: #0f172a; font-size: 14px; font-weight: 700; padding: 10px 0;">
                            {{ $task->verby }}</td>
                    </tr>
                    <tr>
                        <td style="color: #64748b; font-size: 14px; font-weight: 600; padding: 10px 0;">Status</td>
                        <td style="color: #059669; font-size: 14px; font-weight: 800; padding: 10px 0;">✅ SELESAI</td>
                    </tr>
                </table>
            </div>

            <!-- Catatan Petugas -->
            @if ($task->ketver)
                <div class="note-card"
                    style="background-color: #f0fdf4; border-left: 6px solid #10b981; border-radius: 16px; padding: 20px; margin-bottom: 32px;">
                    <p class="note-label"
                        style="color: #065f46; font-size: 12px; font-weight: 800; text-transform: uppercase; letter-spacing: 0.05em; margin: 0 0 6px 0;">
                        CATATAN PETUGAS</p>
                    <p class="note-text" style="color: #064e3b; font-size: 14px; line-height: 1.6; margin: 0;">
                        {{ $task->ketver }}</p>
                </div>
            @endif

            <!-- CTA Button (Teks Putih Menggunakan Style Inline) -->
            <a href="{{ url('/login-pemohon') }}" class="cta-button"
                style="display: block; background: linear-gradient(135deg, #1d4ed8 0%, #2563eb 100%); color: #ffffff !important; text-align: center; padding: 16px 24px; font-weight: 700; font-size: 16px; text-decoration: none; border-radius: 14px; box-shadow: 0 10px 20px rgba(37, 99, 235, 0.2); margin-bottom: 32px;">
                <span style="color: #ffffff !important;">🔗 Lihat Detail Permohonan di Portal</span>
            </a>

            <!-- Closing -->
            <p class="closing" style="color: #475569; font-size: 14px; line-height: 1.7; margin-bottom: 0;">
                Demikian pemberitahuan ini, terima kasih atas kepercayaan Anda dalam menggunakan layanan SPBE Dinas
                Komunikasi dan Informatika.
                <br><br>
                Hormat kami,<br>
                <strong>Tim Layanan SPBE</strong><br>
                Dinas Komunikasi dan Informatika
            </p>
        </div>

        <!-- Footer -->
        <div class="email-footer"
            style="background-color: #f8fafc; padding: 32px; text-align: center; border-top: 1px solid #e2e8f0;">
            <p style="color: #64748b; font-size: 11px; line-height: 1.7; margin: 0;">
                Email ini dikirim secara otomatis oleh sistem. Mohon untuk tidak membalas email ini.
                <br><br>
                © {{ date('Y') }} Dinas Komunikasi dan Informatika. All rights reserved.
            </p>
        </div>

    </div>
</body>

</html>
