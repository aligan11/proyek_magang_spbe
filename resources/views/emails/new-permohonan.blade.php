<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notifikasi Permohonan Layanan Baru</title>
</head>
<body style="margin: 0; padding: 0; font-family: Arial, sans-serif; background-color: #f3f4f6;">
    <div style="max-width: 600px; margin: 20px auto; background-color: #ffffff; border-radius: 12px; overflow: hidden; box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);">
        
        <!-- Header -->
        <div style="background: linear-gradient(to right, #1e40af, #3b82f6); padding: 30px; text-align: center;">
            <h1 style="color: #ffffff; margin: 0; font-size: 24px;">SISTEM LAYANAN SPBE</h1>
            <p style="color: #dbeafe; margin: 8px 0 0 0; font-size: 14px;">Dinas Komunikasi dan Informatika</p>
        </div>

        <!-- Content -->
        <div style="padding: 30px;">
            <h2 style="color: #1e293b; margin-top: 0; font-size: 20px;">Yth. Kepala Bidang (Kabid),</h2>
            
            <p style="color: #475569; line-height: 1.6;">
                Dengan hormat, kami ingin memberitahukan bahwa telah masuk permohonan layanan baru pada sistem. Berikut adalah detail permohonan:
            </p>

            <!-- Detail Table -->
            <table style="width: 100%; border-collapse: collapse; margin: 20px 0;">
                <tr>
                    <td style="padding: 10px; background-color: #f3f4f6; color: #374151; font-weight: bold; border: 1px solid #e5e7eb; width: 35%;">Nomor Registrasi</td>
                    <td style="padding: 10px; background-color: #ffffff; color: #1e293b; border: 1px solid #e5e7eb;">{{ $layanan->noreg }}</td>
                </tr>
                <tr>
                    <td style="padding: 10px; background-color: #f3f4f6; color: #374151; font-weight: bold; border: 1px solid #e5e7eb;">Nama Instansi</td>
                    <td style="padding: 10px; background-color: #ffffff; color: #1e293b; border: 1px solid #e5e7eb;">{{ $layanan->nama_instansi }}</td>
                </tr>
                <tr>
                    <td style="padding: 10px; background-color: #f3f4f6; color: #374151; font-weight: bold; border: 1px solid #e5e7eb;">Perihal Kebutuhan</td>
                    <td style="padding: 10px; background-color: #ffffff; color: #1e293b; border: 1px solid #e5e7eb;">{{ $layanan->nama_kebutuhan }}</td>
                </tr>
                <tr>
                    <td style="padding: 10px; background-color: #f3f4f6; color: #374151; font-weight: bold; border: 1px solid #e5e7eb;">Lokasi</td>
                    <td style="padding: 10px; background-color: #ffffff; color: #1e293b; border: 1px solid #e5e7eb;">{{ $layanan->lokasi }}</td>
                </tr>
                <tr>
                    <td style="padding: 10px; background-color: #f3f4f6; color: #374151; font-weight: bold; border: 1px solid #e5e7eb;">Tanggal Pengajuan</td>
                    <td style="padding: 10px; background-color: #ffffff; color: #1e293b; border: 1px solid #e5e7eb;">{{ $layanan->tgl_permohonan->format('d-m-Y H:i') }}</td>
                </tr>
                <tr>
                    <td style="padding: 10px; background-color: #f3f4f6; color: #374151; font-weight: bold; border: 1px solid #e5e7eb;">Nama Pemohon</td>
                    <td style="padding: 10px; background-color: #ffffff; color: #1e293b; border: 1px solid #e5e7eb;">{{ $pemohon->nama_lengkap }}</td>
                </tr>
            </table>

            <!-- SOP Notice -->
            <div style="background-color: #fef9c3; border-left: 4px solid #eab308; padding: 16px; margin: 20px 0;">
                <h3 style="color: #713f12; margin-top: 0; font-size: 15px;">📋 Catatan Prosedur Operasional Standar (SOP)</h3>
                <p style="color: #78350f; line-height: 1.6; margin: 8px 0 0 0; font-size: 14px;">
                    Mohon untuk segera meninjau permohonan ini dan memberikan penugasan kepada petugas yang berwenang paling lambat <strong>3 x 24 jam kerja</strong> untuk menghindari keterlambatan proses layanan. Pastikan koordinasi dengan tim terkait berjalan dengan baik dan seluruh dokumen pendukung telah diverifikasi keabsahannya.
                </p>
            </div>

            <!-- CTA Button -->
            <div style="text-align: center; margin: 30px 0;">
                <a href="{{ route('login') }}" style="display: inline-block; background-color: #3b82f6; color: #ffffff; padding: 14px 30px; border-radius: 8px; text-decoration: none; font-weight: bold; font-size: 15px;">
                    Akses Dashboard
                </a>
            </div>

            <p style="color: #475569; line-height: 1.6; font-size: 14px;">
                Demikian pemberitahuan ini kami sampaikan. Atas perhatian dan kerjasamanya, kami ucapkan terima kasih.
            </p>

            <p style="color: #475569; line-height: 1.6; font-size: 14px; margin-top: 30px;">
                Hormat kami,<br>
                <strong>Admin Sistem Layanan SPBE</strong>
            </p>
        </div>

        <!-- Footer -->
        <div style="background-color: #1e293b; padding: 20px; text-align: center;">
            <p style="color: #cbd5e1; margin: 0; font-size: 13px;">
                © {{ date('Y') }} Dinas Komunikasi dan Informatika. Semua hak cipta dilindungi.
            </p>
            <p style="color: #94a3b8; margin: 5px 0 0 0; font-size: 12px;">
                Email ini dikirim otomatis oleh sistem, mohon untuk tidak membalas email ini.
            </p>
        </div>
    </div>
</body>
</html>