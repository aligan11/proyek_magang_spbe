<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notifikasi Tugas/Mandate Baru</title>
</head>

<body style="margin: 0; padding: 0; font-family: Arial, sans-serif; background-color: #f3f4f6;">
    <div
        style="max-width: 600px; margin: 20px auto; background-color: #ffffff; border-radius: 12px; overflow: hidden; box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);">

        <!-- Header -->
        <div style="background: linear-gradient(to right, #1e40af, #3b82f6); padding: 30px; text-align: center;">
            <h1 style="color: #ffffff; margin: 0; font-size: 24px;">SISTEM LAYANAN SPBE</h1>
            <p style="color: #dbeafe; margin: 8px 0 0 0; font-size: 14px;">Dinas Komunikasi dan Informatika</p>
        </div>

        <!-- Content -->
        <div style="padding: 30px;">
            <h2 style="color: #1e293b; margin-top: 0; font-size: 20px;">Yth. Petugas Layanan,</h2>

            <p style="color: #475569; line-height: 1.6;">
                Anda telah menerima penugasan baru dari Kepala Bidang untuk menindaklanjuti sebuah permohonan layanan.
                Berikut adalah detail penugasan:
            </p>

            <!-- Detail Table -->
            <table style="width: 100%; border-collapse: collapse; margin: 20px 0;">
                <tr>
                    <td
                        style="padding: 10px; background-color: #f3f4f6; color: #374151; font-weight: bold; border: 1px solid #e5e7eb; width: 35%;">
                        Nomor Registrasi</td>
                    <td style="padding: 10px; background-color: #ffffff; color: #1e293b; border: 1px solid #e5e7eb;">
                        {{ $layanan->noreg }}</td>
                </tr>
                <tr>
                    <td
                        style="padding: 10px; background-color: #f3f4f6; color: #374151; font-weight: bold; border: 1px solid #e5e7eb;">
                        Perihal Kebutuhan</td>
                    <td style="padding: 10px; background-color: #ffffff; color: #1e293b; border: 1px solid #e5e7eb;">
                        {{ $layanan->nama_kebutuhan }}</td>
                </tr>
                <tr>
                    <td
                        style="padding: 10px; background-color: #f3f4f6; color: #374151; font-weight: bold; border: 1px solid #e5e7eb;">
                        Nama Instansi</td>
                    <td style="padding: 10px; background-color: #ffffff; color: #1e293b; border: 1px solid #e5e7eb;">
                        {{ $layanan->nama_instansi }}</td>
                </tr>
                <tr>
                    <td
                        style="padding: 10px; background-color: #f3f4f6; color: #374151; font-weight: bold; border: 1px solid #e5e7eb;">
                        Penugasan Oleh</td>
                    <td style="padding: 10px; background-color: #ffffff; color: #1e293b; border: 1px solid #e5e7eb;">
                        {{ $pimpinan->name }}</td>
                </tr>
                <tr>
                    <td
                        style="padding: 10px; background-color: #f3f4f6; color: #374151; font-weight: bold; border: 1px solid #e5e7eb;">
                        Tanggal Penugasan</td>
                    <td style="padding: 10px; background-color: #ffffff; color: #1e293b; border: 1px solid #e5e7eb;">
                        {{ $tindakLanjut->created_at->format('d-m-Y H:i') }}</td>
                </tr>
                <tr>
                    <td
                        style="padding: 10px; background-color: #f3f4f6; color: #374151; font-weight: bold; border: 1px solid #e5e7eb; vertical-align: top;">
                        Deskripsi Penugasan</td>
                    <td style="padding: 10px; background-color: #ffffff; color: #1e293b; border: 1px solid #e5e7eb;">
                        {{ $tindakLanjut->keterangan }}</td>
                </tr>
            </table>

            <!-- SOP Notice -->
            <div style="background-color: #d1fae5; border-left: 4px solid #10b981; padding: 16px; margin: 20px 0;">
                <h3 style="color: #065f46; margin-top: 0; font-size: 15px;">✅ Panduan Pelaksanaan Tugas</h3>
                <p style="color: #047857; line-height: 1.6; margin: 8px 0 0 0; font-size: 14px;">
                    Mohon untuk segera mempelajari dokumen pendukung dan melaksanakan tugas sesuai dengan standar
                    operasional yang berlaku. Pastikan seluruh proses terdokumentasi dengan baik dan melaporkan
                    perkembangan kepada Kepala Bidang secara berkala. Setelah selesai, Anda diwajibkan untuk mengunggah
                    bukti penindaklanjutan dan membuat berita acara pemeriksaan pada sistem.
                </p>
            </div>

            <!-- CTA Button -->
            <div style="text-align: center; margin: 30px 0;">
                <a href="{{ route('login') }}"
                    style="display: inline-block; background-color: #3b82f6; color: #ffffff; padding: 14px 30px; border-radius: 8px; text-decoration: none; font-weight: bold; font-size: 15px;">
                    Akses Detail Tugas
                </a>
            </div>

            <p style="color: #475569; line-height: 1.6; font-size: 14px;">
                Demikian pemberitahuan penugasan ini kami sampaikan. Atas perhatian dan kerjasamanya, kami ucapkan
                terima kasih.
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
