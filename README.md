# Sistem Informasi Layanan SPBE

Aplikasi web untuk mengelola siklus hidup permohonan layanan **Sistem Pemerintahan Berbasis Elektronik (SPBE)** secara terintegrasi — mulai dari pengajuan oleh Pemohon, disposisi penugasan oleh Pimpinan (Kabid), penanganan oleh Petugas, hingga penerbitan **Berita Acara Pemeriksaan (BAP)** digital yang dipublikasikan pada portal publik.

Dibangun dengan **Laravel 12** (arsitektur MVC) dan **Tailwind CSS 4**, sistem ini mengotomatiskan alur kerja yang sebelumnya manual (disposisi kertas, pelacakan status, dan pengarsipan), sehingga lebih cepat, transparan, dan akuntabel.

---

## Daftar Isi

- [Fitur Utama](#fitur-utama)
- [Tech Stack](#tech-stack)
- [Peran & Hak Akses](#peran--hak-akses)
- [Struktur Database & Relasi](#struktur-database--relasi)
- [Alur Kerja Sistem](#alur-kerja-sistem)
- [Struktur Direktori](#struktur-direktori)
- [Prasyarat](#prasyarat)
- [Instalasi Lokal](#instalasi-lokal)
- [Konfigurasi `.env`](#konfigurasi-env)
- [Akun Default (Seeder)](#akun-default-seeder)
- [Testing](#testing)
- [Catatan Teknis](#catatan-teknis)

---

## Fitur Utama

### Modul Pemohon (Internal & Eksternal)
- Registrasi akun Pemohon **Internal (ASN/Pegawai)** dan **Eksternal (Masyarakat Umum)** dengan validasi NIK/NIP dan captcha.
- Login multi-guard dengan verifikasi **captcha matematika**.
- Pengajuan permohonan layanan dengan form terstruktur dan unggah **berkas pendukung** (PDF/DOCX/ZIP, maks. 10 MB).
- **Nomor registrasi otomatis** berformat `REG-YYYYMMDD-NNN`.
- Pelacakan status permohonan secara real-time (Pending / Proses / Selesai).
- Edit dan hapus permohonan yang masih berstatus **Pending**.
- Unduh **bukti penerimaan** dan detail permohonan dalam format **PDF**.
- Reset kata sandi via **OTP 6 digit** ke email (dengan rate-limit pengiriman ulang).
- Manajemen profil & ubah kata sandi (dengan unggah avatar).

### Modul Pimpinan (Kabid / Katim)
- Dashboard ringkasan statistik permohonan (Total / Pending / Proses / Selesai).
- Daftar semua permohonan dengan pencarian nomor registrasi.
- Tinjau detail permohonan dan berkas pendukung.
- **Disposisi/Mandate penugasan** kepada satu atau lebih Petugas sekaligus.
- Pemantauan status online Petugas (`last_seen`).
- Edit deskripsi/instruksi penugasan.
- Ekspor laporan permohonan ke **PDF** dan **Excel**.
- Ubah profil & kata sandi.

### Modul Petugas (Staff)
- Dashboard daftar tugas yang ditugaskan beserta statistik.
- Detail tugas dan berkas pendukung (dengan proteksi akses per-petugas).
- Pengisian **Berita Acara Pemeriksaan (BAP)**: ringkasan pekerjaan, ringkasan masalah, alternatif solusi, dan lokasi.
- Unggah **berkas verifikasi** (PDF/JPG/PNG/ZIP) dan penyelesaian tugas.
- Notifikasi email otomatis ke Pemohon/Penanggung Jawab saat tugas selesai.
- Ubah profil & kata sandi.

### Portal Publik
- Beranda publik yang menampilkan daftar **Berita Acara Pemeriksaan** terbaru.
- Pencarian BAP dan paginasi (AJAX partial refresh).
- Statistik jumlah BAP dan instansi.

### Notifikasi Email
- Email ke Pimpinan saat ada **permohonan baru** (`NewPermohonanMail`, terlampir berkas).
- Email ke Petugas saat ada **penugasan baru** (`NewMandateMail`, terlampir berkas).
- Email ke Pemohon saat permohonan **ditindaklanjuti** (`TindakLanjutNotification`).
- Email ke Pemohon/Penanggung Jawab saat tugas **diselesaikan** (`NotifikasiSelesaiMail`).

---

## Tech Stack

### Backend (dari `composer.json`)
| Paket | Versi | Kegunaan |
| --- | --- | --- |
| PHP | `^8.2` | Bahasa pemrograman |
| laravel/framework | `^12.0` | Framework utama (MVC) |
| barryvdh/laravel-dompdf | `^3.1` | Generate laporan PDF |
| maatwebsite/excel | `^3.1` | Ekspor laporan Excel |
| realrashid/sweet-alert | `^7.3` | Notifikasi alert |
| laravel/tinker | `^2.10` | REPL untuk debugging |

**Dev tools:** PHPUnit `^11.5`, Laravel Pint, Laravel Pail, Laravel Sail, Faker, Mockery, Collision.

### Frontend (dari `package.json`)
| Paket | Versi | Kegunaan |
| --- | --- | --- |
| tailwindcss | `^4.1.18` | Utility-first CSS framework |
| @tailwindcss/vite | `^4.1.18` | Integrasi Tailwind dengan Vite |
| vite | `^7.0.7` | Build tool & HMR |
| laravel-vite-plugin | `^2.0.0` | Integrasi Vite ↔ Laravel |
| axios | `^1.11.0` | HTTP client untuk request AJAX |

### Lainnya
- **Database:** MySQL (default) — mendukung SQLite.
- **Autentikasi:** Multi-guard session (`petugas` → `User`, `pemohon` → `Pemohon`).
- **Email:** SMTP (Gmail, port 587/TLS) dengan dukungan queue.
- **Template Engine:** Blade + Tailwind CSS.

---

## Peran & Hak Akses

Sistem menggunakan **Multi-Guard Authentication** yang memisahkan Pemohon (`pemohon`) dari pengguna internal (`petugas`).

| Guard | Model | Role | Deskripsi |
| --- | --- | --- | --- |
| `petugas` | `User` | `admin` | Administrator sistem |
| `petugas` | `User` | `kabid` | Kepala Bidang — disposisi & laporan |
| `petugas` | `User` | `katim` | Ketua Tim — disposisi & laporan |
| `petugas` | `User` | `staff` | Petugas teknis — penanganan tugas |
| `pemohon` | `Pemohon` | — | Pemohon internal/eksternal |

Middleware yang digunakan:
- `check.role:<role>` → membatasi akses berdasarkan role internal.
- `check.pemohon` → membatasi akses area Pemohon.
- `loginCheck` → redirect otomatis jika sudah login.
- `petugas.online` → memperbarui kolom `last_seen` Petugas.

---

## Struktur Database & Relasi

Diagram ERD tersedia di [Table Diagram SPBE New-2.png](public/laporan/Table%20Diagram%20SPBE%20New-2.png).

### Tabel Utama

| Tabel | Keterangan |
| --- | --- |
| `users` | Akun pengguna internal (admin, kabid, katim, staff). |
| `pemohon` | Akun Pemohon internal (ASN) & eksternal (umum). |
| `instansi` | Data instansi/OPD (master referensi). |
| `jenis_layanan_spbe` | Master jenis layanan SPBE. |
| `kebutuhan_layanan_spbe` | Master kebutuhan per jenis layanan. |
| `layanan_spbe` | Data permohonan layanan (inti transaksi). |
| `tindak_lanjut_layanan` | Disposisi/mandate penugasan ke Petugas. |
| `berita_acara_pemeriksaan` | BAP hasil pemeriksaan Petugas. |
| `mandates` | Struktur mandate (relasi Pimpinan ↔ Tiket). |
| `mandate_petugas` | Pivot many-to-many mandate ↔ petugas. |
| `notifications` | Notifikasi in-app. |
| `sessions`, `password_reset_tokens`, `cache`, `jobs` | Tabel bawaan Laravel (session, OTP reset, cache, queue). |

### Relasi Kunci

```
instansi 1 ──< pemohon
instansi 1 ──< layanan_spbe

jenis_layanan_spbe 1 ──< kebutuhan_layanan_spbe
jenis_layanan_spbe 1 ──< layanan_spbe

pemohon 1 ──< layanan_spbe            (via id_pemohon / inputby)

layanan_spbe 1 ──< tindak_lanjut_layanan   (via id_layanan)
users (staff) 1 ──< layanan_spbe            (via petugas_id)

tindak_lanjut_layanan 1 ──< berita_acara_pemeriksaan   (via id_tindak_lanjut)

users (Pimpinan/Kabid) 1 ──< mandates
mandates >──< users (Petugas)   (via pivot mandate_petugas)
```

**Catatan desain:** kolom `tindak_lanjut_layanan.id_petugas` bertipe `JSON` untuk menyimpan array ID Petugas yang ditugaskan, dan `layanan_spbe.id_kebutuhan` juga bertipe `JSON` untuk menyimpan array kebutuhan terpilih.

### Status Permohonan (`layanan_spbe.status`)
- `1` — **Pending** (menunggu disposisi Pimpinan).
- `2` — **Proses** (sudah ditugaskan ke Petugas).
- `3` — **Selesai** (BAP telah dibuat).

---

## Alur Kerja Sistem

1. **Pemohon** mendaftar & login, lalu mengajukan permohonan (mengisi form + unggah berkas). Sistem membuat nomor registrasi otomatis dan mengirim email ke seluruh Pimpinan (kabid).
2. **Pimpinan (Kabid/Katim)** meninjau permohonan dan memberikan **disposisi** ke satu/lebih Petugas. Status permohonan berubah menjadi **Proses**, dan email penugasan dikirim ke Petugas serta notifikasi tindak lanjut ke Pemohon.
3. **Petugas** menerima tugas, memeriksa berkas, mengisi **Berita Acara Pemeriksaan**, mengunggah berkas verifikasi, dan menandai tugas **Selesai**. Email notifikasi penyelesaian dikirim ke Pemohon/Penanggung Jawab.
4. **Portal Publik** menampilkan BAP yang telah diselesaikan dan dapat diunduh masyarakat umum.

Activity diagram tersedia di [public/laporan](public/laporan).

---

## Struktur Direktori

```
app/
├── Exports/            # LayananExport (ekspor Excel)
├── Http/
│   ├── Controllers/
│   │   ├── Auth/       # Login, Register, Forgot Password
│   │   ├── Petugas/    # Modul Petugas
│   │   ├── Pimpinan/   # Modul Pimpinan
│   │   ├── PemohonController.php
│   │   ├── MandateController.php          # Disposisi/mandate
│   │   ├── HomeController.php             # Portal publik
│   │   └── ...
│   └── Middleware/     # CheckRole, AuthenticatePemohon, loginCheck, UpdateLastseen
├── Mail/               # 4 kelas Mailable (notifikasi email)
└── Models/             # Eloquent models

database/
├── migrations/         # Skema database
├── seeders/            # Data awal (adminSeeder, jenisLayananSeeder, dll.)
└── kominfo_spbe_baru.sql   # Dump SQL referensi

resources/views/
├── auth/               # Halaman login/register/reset
├── pemohon/            # View dashboard & form Pemohon
├── petugas/            # View dashboard & form Petugas
├── pimpinan/           # View dashboard & mandate Pimpinan
├── emails/             # Template email notifikasi
└── welcome.blade.php   # Portal publik

routes/web.php          # Semua route web
```

---

## Prasyarat

- **PHP >= 8.2** (disarankan 8.3+)
- **Composer**
- **Node.js & NPM**
- **MySQL** (atau MariaDB)
- Web server lokal: **Laragon / XAMPP / Laravel Herd** (opsional)

---

## Instalasi Lokal

```bash
# 1. Clone repositori
git clone <url-repositori> proyekMagangSpbe
cd proyekMagangSpbe

# 2. Install dependensi PHP
composer install

# 3. Install dependensi frontend
npm install

# 4. Salin file environment & generate application key
copy .env.example .env
php artisan key:generate

# 5. Buat database MySQL baru (contoh: proyekmagangspbe),
#    lalu sesuaikan kredensial di file .env (lihat bagian Konfigurasi .env).

# 6. Jalankan migrasi & seeder
php artisan migrate --seed

# 7. Buat direktori penyimpanan berkas (jika belum ada)
#    Berkas diunggah langsung ke public/storage/doc dan public/storage/avatars

# 8. Build aset frontend
npm run build

# 9. Jalankan server
php artisan serve
```

Buka `http://127.0.0.1:8000` pada browser.

> Alternatif satu perintah (sudah tersedia di `composer.json`):
>
> ```bash
> composer setup
> ```

Untuk mode pengembangan dengan **hot reload Vite**, jalankan:

```bash
composer dev
```

Perintah ini menjalankan server PHP, queue listener, log viewer (Pail), dan Vite secara bersamaan.

---

## Konfigurasi `.env`

```env
# Aplikasi
APP_NAME="Sistem Layanan SPBE"
APP_ENV=local
APP_KEY=
APP_DEBUG=true
APP_URL=http://localhost:8000

# Database (MySQL)
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=proyekmagangspbe
DB_USERNAME=root
DB_PASSWORD=

# Email (Gmail SMTP)
MAIL_MAILER=smtp
MAIL_HOST=smtp.gmail.com
MAIL_PORT=587
MAIL_USERNAME=alamat-anda@gmail.com
MAIL_PASSWORD=google-app-password
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS=alamat-anda@gmail.com
MAIL_FROM_NAME="${APP_NAME}"

# Queue
QUEUE_CONNECTION=database
```

> Untuk Gmail: aktifkan **2-Step Verification**, lalu buat **App Password** di
> <https://myaccount.google.com/apppasswords>.

---

## Akun Default (Seeder)

Dijalankan melalui `php artisan migrate --seed` (seeder `adminSeeder`):

| Role | Email | Password |
| --- | --- | --- |
| Pimpinan (kabid) | `agus.pimpinan@gmail.com` | `pimpinan123` |
| Pimpinan (katim) | `gan12@gmail.com` | `pimpinan123` |
| Petugas (staff) | `afghan12@gmail.com` | `password123` |
| Admin | `admin@spbe.go.id` | `admin123` |

Pemohon dapat didaftarkan sendiri melalui halaman **Register Pemohon**.

> Jalankan `php artisan db:seed` untuk memuat data jenis layanan, kebutuhan layanan, dan instansi.

---

## Testing

```bash
# Menjalankan seluruh test
php artisan test

# atau
composer test
```

---

## Catatan Teknis

- **Multi-guard authentication:** guard default adalah `petugas` (model `User`); Pemohon memakai guard `pemohon` (model `Pemohon`).
- **Unggah berkas:** disimpan langsung ke `public/storage/doc` (berkas permohonan & verifikasi) dan `public/storage/avatars` (avatar). Format diizinkan: PDF, DOCX, ZIP, JPG, PNG.
- **Nomor registrasi:** dibuat otomatis dengan format `REG-YYYYMMDD-NNN` berdasarkan jumlah permohonan pada tanggal tersebut.
- **Status permohonan:** tersimpan pada kolom `status` (1/2/3) dan `status_ver` pada tabel `layanan_spbe`.
- **Lingkungan lokal:** pada `config/mail.php`, parameter `verify_peer` dan `verify_peer_name` dapat diatur ke `false` untuk mengizinkan bypass verifikasi SSL stream saat pengembangan.
- **Dokumentasi lengkap:** lihat [DOKUMENTASI_SISTEM_SPBE.md](DOKUMENTASI_SISTEM_SPBE.md) untuk SRS (Software Requirements Specification), use case, activity diagram, wireframe, dan persyaratan fungsional/non-fungsional.

---

## Lisensi

Proyek ini dikembangkan untuk keperluan **Kerja Praktek / Magang**. Hubungi pemilik repositori untuk informasi lisensi lebih lanjut.
