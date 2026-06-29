# LAPORAN SISTEM

## Software Requirements Specification &amp; Desain Sistem

**Nama Sistem**: Sistem Informasi Layanan SPBE  
**Versi Dokumen**: v1.0  
**Tanggal**: 29/06/2026  
**Dibuat Oleh**: [Nama Penyusun]  
**Status**: Final

---

## BAB I — PENDAHULUAN

### 1.1 Tujuan Penulisan

Pada era digitalisasi pemerintahan saat ini, Implementasi Sistem Pemerintahan Berbasis Elektronik (SPBE) telah menjadi kebutuhan utama untuk meningkatkan efisiensi, transparansi, dan akuntabilitas dalam pelayanan publik. Salah satu tantangan utama yang sering dihadapi dalam proses pelayanan instansi pemerintah adalah keterlambatan dalam penanganan permohonan layanan, proses disposisi manual yang rentan terhadap kesalahan, serta sulitnya pelacakan riwayat permohonan, dan tidak adanya arsip digital yang terintegrasi.

Dengan mempertimbangkan latar belakang tersebut, pengembangan Sistem Informasi Layanan SPBE bertujuan untuk menyediakan solusi berbasis web yang dapat mengotomatiskan alur kerja permohonan layanan, mulai dari pengajuan oleh Pemohon, disposisi oleh Pimpinan (Kabid), penanganan oleh Petugas, hingga penerbitan Berita Acara Pemeriksaan (BAP) secara digital. Sistem ini dibangun dengan menggunakan bahasa pemrograman PHP versi 8.4.16 dan framework Laravel 12.x yang dikenal karena kemampuannya dalam mengembangkan aplikasi web yang aman, skalabel, dan mudah dipelihara.

Tujuan khusus dari penulisan dokumen Software Requirements Specification (SRS) ini adalah sebagai berikut:

1. Mendokumentasikan kebutuhan fungsional dan non-fungsional Sistem Informasi Layanan SPBE secara terstruktur dan jelas.
2. Menyediakan acuan bagi tim pengembang dalam proses implementasi sistem.
3. Memastikan kesesuaian antara kebutuhan pengguna dan hasil pengembangan sistem.
4. Menyediakan panduan bagi pihak manajemen dalam melakukan evaluasi dan pengembangan selanjutnya.
5. Mendokumentasikan desain arsitektur sistem, model data, dan antarmuka pengguna (GUI) yang akan diimplementasikan.

### 1.2 Ruang Lingkup Sistem

Sistem Informasi Layanan SPBE ini mencakup alur siklus hidup permohonan layanan yang terintegrasi dengan tiga aktor utama, yaitu Pemohon, Pimpinan (Kabid), dan Petugas. Ruang lingkup sistem ini secara rinci adalah sebagai berikut:

1. **Modul Pemohon**:
    - Pendaftaran akun (register) dan autentikasi (login) untuk Pemohon Internal (ASN/Pegawai) dan Pemohon Eksternal (Masyarakat Umum).
    - Pengajuan permohonan layanan dengan pengisian form dan upload berkas pendukung.
    - Pelacakan status permohonan secara real-time.
    - Pengeditan dan penghapusan permohonan yang masih berstatus Pending.
    - Pengunduhan bukti penerimaan dan Berita Acara Pemeriksaan (BAP) secara digital.

2. **Modul Pimpinan (Kabid)**:
    - Autentikasi (login) ke dashboard Pimpinan.
    - Melihat daftar semua permohonan yang masuk beserta statusnya.
    - Meninjau detail permohonan dan berkas pendukung.
    - Memberikan disposisi/mandate penugasan kepada Petugas Teknis dengan menentukan Petugas yang bertanggung jawab.
    - Melihat riwayat disposisi dan perkembangan permohonan.
    - Mengekspor laporan permohonan dalam format PDF dan Excel.

3. **Modul Petugas**:
    - Autentikasi (login) ke dashboard Petugas.
    - Melihat daftar tugas yang telah ditugaskan oleh Pimpinan.
    - Menerima notifikasi penugasan secara otomatis.
    - Melihat detail permohonan dan berkas pendukung.
    - Mengisi form Berita Acara Pemeriksaan (BAP).
    - Mengunggah bukti verifikasi dan bukti foto.
    - Menyelesaikan tugas dan mengubah status permohonan menjadi Selesai.

4. **Portal Publik**:
    - Menampilkan daftar Berita Acara Pemeriksaan yang telah diselesaikan secara publik.
    - Menyediakan akses informasi layanan yang tersedia.

Sistem ini tidak mencakup fitur manajemen admin (seperti manajemen instansi, manajemen akun pengguna) karena sesuai dengan kebutuhan proyek saat ini.

### 1.3 Definisi, Akronim, dan Singkatan

Berikut adalah daftar istilah, akronim, dan singkatan yang digunakan dalam dokumen ini:

| Istilah/Singkatan | Definisi                                                                                                                                               |
| ----------------- | ------------------------------------------------------------------------------------------------------------------------------------------------------ |
| SRS               | Software Requirements Specification, yaitu dokumen yang menjelaskan kebutuhan perangkat lunak secara terstruktur.                                      |
| ERD               | Entity-Relationship Diagram, yaitu diagram yang menggambarkan hubungan antar entitas dalam database.                                                   |
| PHP 8.4.16        | Versi bahasa pemrograman PHP yang digunakan dalam pengembangan sistem.                                                                                 |
| Laravel 12        | Framework PHP open-source berbasis MVC yang digunakan sebagai fondasi pengembangan sistem.                                                             |
| Pemohon           | Pihak yang mengajukan permohonan layanan SPBE.                                                                                                         |
| Kabid             | Singkatan dari Kepala Bidang, yang berperan sebagai Pimpinan yang memberikan disposisi penugasan.                                                      |
| Petugas           | Pegawai teknis yang bertanggung jawab menangani permohonan layanan.                                                                                    |
| BAP               | Berita Acara Pemeriksaan, yaitu dokumen yang mencatat hasil pemeriksaan dan verifikasi permohonan.                                                     |
| Mandate           | Perintah atau penugasan yang diberikan oleh Pimpinan kepada Petugas untuk menangani permohonan layanan.                                                |
| SMTP              | Simple Mail Transfer Protocol, yaitu protokol yang digunakan untuk mengirim email.                                                                     |
| MVC               | Model-View-Controller, yaitu arsitektur desain perangkat lunak yang memisahkan logika aplikasi menjadi tiga bagian utama: Model, View, dan Controller. |
| ORM               | Object-Relational Mapping, yaitu teknik yang memetakan tabel database ke objek dalam bahasa pemrograman.                                               |
| TLS               | Transport Layer Security, yaitu protokol keamanan yang mengenkripsi komunikasi antara klien dan server.                                                |
| Sync Driver       | Konfigurasi Laravel Notification yang mengirim notifikasi secara sinkron (instan tanpa antrian.                                                        |

---

## BAB II — DESKRIPSI UMUM SISTEM

### 2.1 Perspektif Produk

Sistem Informasi Layanan SPBE dibangun dengan menggunakan arsitektur Model-View-Controller (MVC) yang disediakan oleh Laravel 12. Arsitektur ini memisahkan aplikasi menjadi tiga bagian utama:

1. **Model**: Berisi logika untuk berinteraksi dengan database, termasuk relasi antar tabel, dan validasi data. Sistem ini menggunakan Eloquent ORM (Object-Relational Mapping) untuk memproses tabel database secara aman dan efisien.
2. **View**: Berisi antarmuka pengguna (GUI) yang dibangun dengan Blade Template Engine Laravel dan Tailwind CSS untuk membuat tampilan yang responsif dan modern.
3. **Controller**: Berisi logika bisnis aplikasi, termasuk pengelolaan request dari pengguna, interaksi dengan Model, dan pengiriman response ke View.

Untuk keamanan autentikasi, sistem menggunakan Multi-Guard Authentication yang memisahkan autentikasi antara Pemohon (menggunakan guard `pemohon` dan model `Pemohon`) dan pengguna internal (Petugas dan Pimpinan, menggunakan guard `web` dan model `User`).

Sistem ini juga menyediakan fitur upload berkas pendukung yang disimpan di direktori `public/storage` dengan batas maksimal file sebesar 10 MB per file. Berkas yang diupload dapat diakses oleh pengguna melalui antarmuka pengguna.

### 2.2 Fungsi Utama Sistem

Sistem Informasi Layanan SPBE memiliki fungsi utama sebagai berikut:

1. \*\*Pengelolaan Pengajuan Permohonan Layanan:
    - Pemohon dapat mengajukan permohonan layanan dengan mengisi form yang terstruktur.
    - Pemohon dapat mengunggah berkas pendukung yang dibutuhkan.
    - Sistem menghasilkan nomor registrasi permohonan secara otomatis untuk setiap pengajuan baru.
    - Sistem menyimpan semua data permohonan ke database MySQL dengan aman.

2. \*\*Otomasi Disposisi Tugas:
    - Setelah permohonan masuk, Pimpinan (Kabid) dapat memberikan disposisi/mandate kepada Petugas Teknis.
    - Sistem secara otomatis mengirimkan notifikasi email ke Petugas yang ditunjuk.
    - Sistem mengubah status permohonan menjadi Proses secara otomatis setelah disposisi diberikan.

3. \*\*Notifikasi Surel Instan Sync Driver:
    - Sistem menggunakan Laravel Notification dengan driver `sync` yang mengirimkan notifikasi email secara sinkron/instan tanpa menggunakan background job queue.
    - Notifikasi email dikirimkan menggunakan Gmail SMTP Server pada port 587 dengan keamanan TLS.
    - Notifikasi dikirimkan kepada Pimpinan ketika ada permohonan baru masuk, dan kepada Petugas ketika ada penugasan baru.

4. \*\*Portal Publikasi Berita Acara Pemeriksaan:
    - Setelah Petugas menyelesaikan tugas dan mengisi BAP, sistem secara otomatis mempublikasikan BAP tersebut di portal publik (halaman welcome).
    - Pemohon dan masyarakat umum dapat melihat dan mengunduh BAP yang telah dipublikasikan.

### 2.3 Karakteristik Pengguna

Berikut adalah tabel yang menjelaskan karakteristik dan hak akses masing-masing pengguna sistem:

| Peran Pengguna   | Deskripsi                                                                                                                     | Hak Akses Sistem                                                                                                                                                                                                                                                                           |
| ---------------- | ----------------------------------------------------------------------------------------------------------------------------- | ------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------ |
| Pemohon          | Pihak yang mengajukan permohonan layanan SPBE. Dapat berupa ASN/Pegawai Instansi (Internal) atau Masyarakat Umum (Eksternal). | - Register dan Login ke dashboard Pemohon. Mengajukan permohonan layanan baru. Melihat daftar dan detail permohonan. Mengedit dan menghapus permohonan berstatus Pending. Mengunduh bukti penerimaan dan BAP. Melihat notifikasi. Mengupdate profil dan password.                          |
| Pimpinan (Kabid) | Kepala Bidang yang bertanggung jawab meninjau permohonan dan memberikan disposisi penugasan kepada Petugas.                   | - Login ke dashboard Pimpinan. Melihat daftar semua permohonan. Melihat detail permohonan dan berkas pendukung. Memberikan disposisi/mandate kepada Petugas. Melihat riwayat disposisi. Mengekspor laporan dalam format PDF dan Excel. Melihat notifikasi. Mengupdate profil dan password. |
| Petugas          | Pegawai teknis yang bertanggung jawab menangani permohonan dan membuat Berita Acara Pemeriksaan.                              | - Login ke dashboard Petugas. Melihat daftar tugas yang ditugaskan. Melihat detail permohonan dan berkas pendukung. Mengisi dan mengupload bukti verifikasi. Menyelesaikan tugas dan mengunggah BAP. Melihat notifikasi. Mengupdate profil dan password.                                   |

### 2.4 Batasan Sistem

Sistem Informasi Layanan SPBE memiliki batasan-batasan sebagai berikut:

1. \*\*Lingkungan Pengembangan:
    - Sistem dikembangkan dengan menggunakan Laravel Installer versi 5.2.1.
    - Sistem berjalan pada lingkungan lokal menggunakan Laragon sebagai server web dan database MySQL.

2. \*\*Keamanan Email:
    - Untuk pengembangan lokal, konfigurasi stream SSL pada file `config/mail.php` diatur dengan parameter `verify_peer` dan `verify_peer_name` menjadi `false` untuk mengizinkan penggunaan sertifikat self-signed atau bypass verifikasi SSL stream lokal.

3. \*\*Batas Upload Berkas:
    - Batas maksimal ukuran file yang dapat diupload adalah 10 MB per file.
    - Format file yang diizinkan adalah PDF, DOCX, DOC, JPG, JPEG, dan PNG.

4. \*\*Kompatibilitas Browser:
    - Sistem kompatibel dengan browser modern seperti Google Chrome, Mozilla Firefox, Microsoft Edge, dan Safari versi terbaru.

5. \*\*Pengiriman Notifikasi:
    - Pengiriman email menggunakan driver `sync`, yang berarti sistem akan menunggu proses pengiriman email selesai sebelum menampilkan response ke pengguna.

---

## BAB III — PEMODELAN SISTEM

### 3.1 Deskripsi Use Case Diagram

Use Case Diagram Sistem Informasi Layanan SPBE menggambarkan interaksi antara tiga aktor utama dengan sistem secara terintegrasi. Sistem menggunakan Multi-Guard Authentication untuk memisahkan akses antara Pemohon dan pengguna internal (Petugas dan Pimpinan).

![Use Case Diagram](/laporan/diagram%20use%20case%20baru.drawio.png)

1. **Aktor Pemohon**:
    - Melakukan Register untuk membuat akun baru dengan memilih jenis Pemohon Internal atau Eksternal.
    - Melakukan Login ke dashboard Pemohon menggunakan email dan password.
    - Melihat daftar permohonan yang telah diajukan beserta statusnya.
    - Membuat Pengajuan Permohonan Layanan baru dengan mengisi form dan mengupload berkas pendukung.
    - Mengedit dan menghapus permohonan yang masih berstatus Pending.
    - Mengunduh bukti penerimaan dan Berita Acara Pemeriksaan.
    - Melihat dan mengupdate profil dan password.
    - Melihat notifikasi yang masuk.

2. **Aktor Pimpinan (Kabid)**:
    - Melakukan Login ke dashboard Pimpinan menggunakan email dan password.
    - Melihat daftar semua permohonan yang masuk.
    - Meninjau detail permohonan dan berkas pendukung.
    - Memberikan Disposisi/Mandate penugasan kepada Petugas Teknis.
    - Melihat riwayat disposisi dan perkembangan permohonan.
    - Mengekspor laporan permohonan dalam format PDF dan Excel.
    - Melihat notifikasi yang masuk.
    - Mengupdate profil dan password.

3. **Aktor Petugas**:
    - Melakukan Login ke dashboard Petugas menggunakan email dan password.
    - Melihat daftar tugas yang telah ditugaskan oleh Pimpinan.
    - Melihat detail permohonan dan berkas pendukung.
    - Mengisi form Berita Acara Pemeriksaan.
    - Mengunggah bukti verifikasi dan bukti foto.
    - Menyelesaikan tugas dan mengubah status permohonan menjadi Selesai.
    - Melihat notifikasi yang masuk.
    - Mengupdate profil dan password.

### 3.2 Desain Database (Deskripsi Tabel Utama)

Berikut adalah diagram Entity-Relationship (ERD) dan deskripsi struktur tabel utama yang digunakan dalam Sistem Informasi Layanan SPBE:

![Entity-Relationship Diagram](/laporan/Table%20Diagram%20SPBE%20New-2.png)

#### 3.2.1 Tabel `pemohon`

Tabel ini menyimpan data akun Pemohon, baik Internal maupun Eksternal.

| Nama Kolom          | Tipe Data                     | Keterangan                                                    |
| ------------------- | ----------------------------- | ------------------------------------------------------------- |
| `id`                | BIGINT UNSIGNED               | Primary key, auto increment.                                  |
| `jenis_pemohon`     | ENUM('internal', 'eksternal') | Jenis Pemohon, default 'eksternal'.                           |
| `nik`               | VARCHAR(16)                   | Nomor Induk Kependudukan, unique.                             |
| `nama_lengkap`      | VARCHAR(255)                  | Nama lengkap Pemohon.                                         |
| `email`             | VARCHAR(255)                  | Alamat email Pemohon, unique.                                 |
| `password`          | VARCHAR(255)                  | Kata sandi yang telah di-hash menggunakan BCRYPT.             |
| `no_hp`             | VARCHAR(15)                   | Nomor handphone Pemohon.                                      |
| `nip`               | VARCHAR(18)                   | Nomor Induk Pegawai (hanya untuk Internal), nullable, unique. |
| `id_instansi`       | BIGINT UNSIGNED               | Foreign key ke tabel `instansis`, nullable.                   |
| `alamat`            | TEXT                          | Alamat Pemohon (hanya untuk Eksternal), nullable.             |
| `email_verified_at` | TIMESTAMP                     | Waktu verifikasi email, nullable.                             |
| `remember_token`    | VARCHAR(100)                  | Token untuk fitur "remember me", nullable.                    |
| `created_at`        | TIMESTAMP                     | Waktu pembuatan akun.                                         |
| `updated_at`        | TIMESTAMP                     | Waktu update akun.                                            |

#### 3.2.2 Tabel `layanan_spbe`

Tabel ini menyimpan data permohonan layanan yang diajukan oleh Pemohon.

| Nama Kolom                  | Tipe Data       | Keterangan                                               |
| --------------------------- | --------------- | -------------------------------------------------------- |
| `id`                        | BIGINT UNSIGNED | Primary key, auto increment.                             |
| `id_jenis_layanan`          | BIGINT UNSIGNED | Foreign key ke tabel `jenis_layanan_spbe`, nullable.     |
| `id_kebutuhan`              | BIGINT UNSIGNED | Foreign key ke tabel `kebutuhan_layanan_spbe`, nullable. |
| `is_eksternal`              | CHAR(1)         | Flag apakah permohonan dari Eksternal, default '1'.      |
| `tahunanggaran`             | YEAR            | Tahun anggaran permohonan.                               |
| `periode`                   | VARCHAR(255)    | Periode permohonan, nullable.                            |
| `noreg`                     | VARCHAR(255)    | Nomor registrasi permohonan, unique.                     |
| `tgl_permohonan`            | DATE            | Tanggal pengajuan permohonan.                            |
| `id_instansi`               | BIGINT UNSIGNED | Foreign key ke tabel `instansis`, nullable.              |
| `nama_instansi`             | VARCHAR(255)    | Nama instansi Pemohon, nullable.                         |
| `unitKerja`                 | VARCHAR(255)    | Unit kerja Pemohon, nullable.                            |
| `lokasi`                    | VARCHAR(255)    | Lokasi pemeriksaan, nullable.                            |
| `nama_kebutuhan`            | VARCHAR(255)    | Nama kebutuhan layanan, nullable.                        |
| `nama_pemohon`              | VARCHAR(255)    | Nama Pemohon, nullable.                                  |
| `nama_penanggungjawab`      | VARCHAR(255)    | Nama penanggung jawab permohonan.                        |
| `nip_penanggungjawab`       | VARCHAR(255)    | NIP penanggung jawab, nullable.                          |
| `nohp_penanggungjawab`      | VARCHAR(255)    | Nomor HP penanggung jawab, nullable.                     |
| `jabatan_penanggungjawab`   | VARCHAR(255)    | Jabatan penanggung jawab, nullable.                      |
| `unitKerja_penanggungjawab` | VARCHAR(255)    | Unit kerja penanggung jawab, nullable.                   |
| `email_penanggungjawab`     | VARCHAR(255)    | Email penanggung jawab, nullable.                        |
| `ket`                       | TEXT            | Keterangan tambahan, nullable.                           |
| `berkas`                    | VARCHAR(255)    | Path file berkas pendukung, nullable.                    |
| `status`                    | CHAR(1)         | Status permohonan, default '1' (Pending).                |
| `inputby`                   | VARCHAR(255)    | ID Pemohon yang menginput, nullable.                     |
| `tglinput`                  | TIMESTAMP       | Waktu input permohonan, nullable.                        |
| `status_ver`                | VARCHAR(255)    | Status verifikasi, nullable.                             |
| `verby`                     | VARCHAR(255)    | User yang memverifikasi, nullable.                       |
| `tglver`                    | TIMESTAMP       | Waktu verifikasi, nullable.                              |
| `nover`                     | VARCHAR(255)    | Nomor verifikasi, nullable.                              |
| `ketver`                    | TEXT            | Keterangan verifikasi, nullable.                         |
| `berkasver`                 | VARCHAR(255)    | Path file berkas verifikasi, nullable.                   |
| `created_at`                | TIMESTAMP       | Waktu pembuatan data.                                    |
| `updated_at`                | TIMESTAMP       | Waktu update data.                                       |

#### 3.2.3 Tabel `tindak_lanjut_layanan`

Tabel ini menyimpan data disposisi/mandate yang diberikan oleh Pimpinan kepada Petugas.

| Nama Kolom   | Tipe Data       | Keterangan                                         |
| ------------ | --------------- | -------------------------------------------------- |
| `id`         | BIGINT UNSIGNED | Primary key, auto increment.                       |
| `id_layanan` | BIGINT UNSIGNED | Foreign key ke tabel `layanan_spbe`.               |
| `id_petugas` | JSON            | Array ID Petugas yang ditugaskan.                  |
| `keterangan` | TEXT            | Keterangan atau instruksi dari Pimpinan, nullable. |
| `created_at` | TIMESTAMP       | Waktu pembuatan disposisi.                         |
| `updated_at` | TIMESTAMP       | Waktu update disposisi.                            |

#### 3.2.4 Tabel `berita_acara_pemeriksaan`

Tabel ini menyimpan data Berita Acara Pemeriksaan yang dibuat oleh Petugas.

| Nama Kolom            | Tipe Data       | Keterangan                                             |
| --------------------- | --------------- | ------------------------------------------------------ |
| `id`                  | BIGINT UNSIGNED | Primary key, auto increment.                           |
| `id_tindak_lanjut`    | BIGINT UNSIGNED | Foreign key ke tabel `tindak_lanjut_layanan`.          |
| `ringkasan_pekerjaan` | TEXT            | Ringkasan pekerjaan yang telah dilaksanakan, nullable. |
| `ringkasan_masalah`   | TEXT            | Ringkasan masalah yang ditemukan, nullable.            |
| `alternatif_solusi`   | TEXT            | Alternatif solusi yang ditawarkan, nullable.           |
| `lokasi`              | VARCHAR(255)    | Lokasi pemeriksaan, nullable.                          |
| `created_at`          | TIMESTAMP       | Waktu pembuatan BAP.                                   |
| `updated_at`          | TIMESTAMP       | Waktu update BAP.                                      |

#### 3.2.2 Activity Diagram Pemohon: Pengajuan Permohonan

Berikut adalah Activity Diagram yang menggambarkan alur kerja Pemohon dalam mengajukan permohonan:

![Activity Diagram Pemohon](/laporan/Activity%20Diagram%20Pemohon%20Pengajuan%20Permohonan.png)

#### 3.2.3 Activity Diagram Pimpinan: Disposisi/Mandate

Berikut adalah Activity Diagram yang menggambarkan alur kerja Pimpinan dalam memberikan disposisi:

![Activity Diagram Pimpinan](/laporan/Activity%20Diagram%20Pimpinan%20Kabid%20Disposisi%20Mandate.png)

#### 3.2.4 Activity Diagram Petugas: Penyelesaian Tugas

Berikut adalah Activity Diagram yang menggambarkan alur kerja Petugas dalam menyelesaikan tugas:

![Activity Diagram Petugas](/laporan/Activity%20Diagram%20Petugas%20Penyelesaian%20Tugas.png)

---

## BAB IV — PERSYARATAN FUNGSIONAL (FUNCTIONAL REQUIREMENTS)

### FR-01: Submit Permohonan Layanan SPBE

| Atribut            | Detail                                                                                                                                                                                                                                                                                                                                                                                                                                                        |
| ------------------ | ------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- |
| **ID Persyaratan** | FR-01                                                                                                                                                                                                                                                                                                                                                                                                                                                         |
| **Nama Fitur**     | Submit Permohonan Layanan SPBE                                                                                                                                                                                                                                                                                                                                                                                                                                |
| **Aktor**          | Pemohon                                                                                                                                                                                                                                                                                                                                                                                                                                                       |
| **Deskripsi**      | Fitur ini memungkinkan Pemohon untuk mengajukan permohonan layanan baru dengan mengisi form yang terstruktur dan mengupload berkas pendukung.                                                                                                                                                                                                                                                                                                                 |
| **Input**          | - Jenis layanan yang dipilih. - Kebutuhan layanan yang dipilih. - Tahun anggaran. - Periode (opsional). - Nama instansi dan unit kerja. - Lokasi pemeriksaan. - Nama penanggung jawab. - NIP penanggung jawab (opsional). - Nomor HP penanggung jawab. - Jabatan penanggung jawab (opsional). - Unit kerja penanggung jawab (opsional). - Email penanggung jawab (opsional). - Keterangan tambahan (opsional). - Berkas pendukung (opsional, maksimal 10 MB). |
| **Output**         | - Data permohonan disimpan ke database. - Nomor registrasi permohonan di-generate secara otomatis. - Notifikasi email dikirim ke Pimpinan secara sinkron. - Notifikasi sukses ditampilkan ke Pemohon. - Pemohon dialihkan ke halaman daftar permohonan.                                                                                                                                                                                                       |
| **Kondisi Awal**   | - Pemohon telah login ke sistem.                                                                                                                                                                                                                                                                                                                                                                                                                              |
| **Kondisi Akhir**  | - Data permohonan tersimpan di database dengan status Pending. - Notifikasi email telah dikirim ke Pimpinan.                                                                                                                                                                                                                                                                                                                                                  |
| **Prioritas**      | Tinggi                                                                                                                                                                                                                                                                                                                                                                                                                                                        |

### FR-02: Update Data Permohonan Pending

| Atribut            | Detail                                                                                                                                                                                                 |
| ------------------ | ------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------ |
| **ID Persyaratan** | FR-02                                                                                                                                                                                                  |
| **Nama Fitur**     | Update Data Permohonan Pending                                                                                                                                                                         |
| **Aktor**          | Pemohon                                                                                                                                                                                                |
| **Deskripsi**      | Fitur ini memungkinkan Pemohon untuk mengedit dan menghapus permohonan yang masih berstatus Pending.                                                                                                   |
| **Input**          | - Data permohonan yang ingin diubah. - Berkas pendukung baru (opsional).                                                                                                                               |
| **Output**         | - Data permohonan di-update di database. - Berkas lama dihapus dari direktori `public/storage` menggunakan helper `@unlink` jika ada berkas baru diunggah. - Notifikasi sukses ditampilkan ke Pemohon. |
| **Kondisi Awal**   | - Pemohon telah login ke sistem. - Permohonan berstatus Pending.                                                                                                                                       |
| **Kondisi Akhir**  | - Data permohonan telah di-update di database. - Berkas lama telah dihapus jika ada berkas baru.                                                                                                       |
| **Prioritas**      | Sedang                                                                                                                                                                                                 |

### FR-03: Create Disposisi / Mandate Tugas

| Atribut            | Detail                                                                                                                                                                                                                          |
| ------------------ | ------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- |
| **ID Persyaratan** | FR-03                                                                                                                                                                                                                           |
| **Nama Fitur**     | Create Disposisi / Mandate Tugas                                                                                                                                                                                                |
| **Aktor**          | Pimpinan (Kabid)                                                                                                                                                                                                                |
| **Deskripsi**      | Fitur ini memungkinkan Pimpinan untuk memberikan disposisi/mandate penugasan kepada Petugas Teknis.                                                                                                                             |
| **Input**          | - Pilihan Petugas yang ditugaskan (dapat memilih lebih dari satu). - Keterangan/instruksi (opsional).                                                                                                                           |
| **Output**         | - Data disposisi disimpan ke tabel `tindak_lanjut_layanan`. - Status permohonan diubah menjadi Proses. - Notifikasi email dikirim ke semua Petugas yang ditugaskan secara sinkron. - Notifikasi sukses ditampilkan ke Pimpinan. |
| **Kondisi Awal**   | - Pimpinan telah login ke sistem. - Permohonan berstatus Pending.                                                                                                                                                               |
| **Kondisi Akhir**  | - Data disposisi tersimpan di database. - Status permohonan menjadi Proses. - Notifikasi email telah dikirim ke Petugas.                                                                                                        |
| **Prioritas**      | Tinggi                                                                                                                                                                                                                          |

### FR-04: Input Berita Acara & Selesai Tugas

| Atribut            | Detail                                                                                                                                                                                                    |
| ------------------ | --------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- |
| **ID Persyaratan** | FR-04                                                                                                                                                                                                     |
| **Nama Fitur**     | Input Berita Acara & Selesai Tugas                                                                                                                                                                        |
| **Aktor**          | Petugas                                                                                                                                                                                                   |
| **Deskripsi**      | Fitur ini memungkinkan Petugas untuk mengisi form Berita Acara Pemeriksaan dan menyelesaikan tugas.                                                                                                       |
| **Input**          | - Ringkasan pekerjaan. - Ringkasan masalah. - Alternatif solusi. - Lokasi pemeriksaan. - Bukti verifikasi/foto (opsional).                                                                                |
| **Output**         | - Data BAP disimpan ke tabel `berita_acara_pemeriksaan`. - Status permohonan diubah menjadi Selesai. - BAP dipublikasikan ke portal publik (halaman welcome). - Notifikasi sukses ditampilkan ke Petugas. |
| **Kondisi Awal**   | - Petugas telah login ke sistem. - Petugas telah ditugaskan untuk menangani permohonan tersebut.                                                                                                          |
| **Kondisi Akhir**  | - Data BAP tersimpan di database. - Status permohonan menjadi Selesai. - BAP dipublikasikan di portal publik.                                                                                             |
| **Prioritas**      | Tinggi                                                                                                                                                                                                    |

---

## BAB V — PERSYARATAN NON-FUNGSIONAL

### 5.1 Kinerja (Performance)

Sistem Informasi Layanan SPBE harus memenuhi persyaratan kinerja sebagai berikut:

1. **Waktu Respon**: Waktu respon sistem untuk menampilkan halaman utama tidak boleh melebihi 2 detik.
2. **Waktu Pengiriman Email**: Waktu yang dibutuhkan untuk mengirim notifikasi email menggunakan Gmail SMTP dengan driver `sync` tidak boleh melebihi 5 detik.
3. **Penggunaan Memori**: Penggunaan memori oleh framework Laravel tidak boleh melebihi 30 MB per request.
4. **Kapasitas Database**: Database harus mampu menangani minimal 10.000 data permohonan tanpa mengalami penurunan kinerja yang signifikan.
5. **Waktu Pencarian**: Waktu yang dibutuhkan untuk mencari data permohonan berdasarkan nomor registrasi tidak boleh melebihi 1 detik.

### 5.2 Keamanan (Security)

Sistem Informasi Layanan SPBE harus memenuhi persyaratan keamanan sebagai berikut:

1. **Autentikasi**: Sistem menggunakan Multi-Guard Authentication untuk memisahkan akses antara Pemohon dan pengguna internal.
2. **Enkripsi Password**: Semua password pengguna disimpan di database dengan menggunakan algoritma BCRYPT dengan 12 putaran hashing.
3. **Proteksi SQL Injection**: Sistem menggunakan Eloquent ORM dan parameterized queries untuk melindungi database dari serangan SQL Injection.
4. **Proteksi CSRF**: Sistem menggunakan CSRF token untuk melindungi dari serangan Cross-Site Request Forgery.
5. \*\*Konfigurasi SSL (Development): Untuk lingkungan pengembangan lokal, parameter `verify_peer` dan `verify_peer_name` diatur menjadi `false` di file `config/mail.php` untuk mengizinkan bypass verifikasi SSL stream.
6. **Validasi Input**: Semua input dari pengguna divalidasi sebelum disimpan ke database untuk mencegah serangan Cross-Site Scripting (XSS).

### 5.3 Kemudahan Penggunaan (Usability)

Sistem Informasi Layanan SPBE harus memenuhi persyaratan kemudahan penggunaan sebagai berikut:

1. **Antarmuka Responsif**: Antarmuka pengguna harus dapat menyesuaikan ukuran layar perangkat (desktop, tablet, dan smartphone).
2. **Notifikasi Error yang Jelas**: Sistem harus menampilkan pesan error dan notifikasi yang jelas dan informatif kepada pengguna dalam bahasa Indonesia.
3. **Navigasi yang Mudah**: Navigasi antar halaman harus jelas dan mudah diakses dari dashboard pengguna.
4. **Dukungan Bahasa**: Semua teks dan antarmuka pengguna harus dalam bahasa Indonesia.

---

## BAB VI — DESAIN ANTARMUKA (WIREFRAME DESCRIPTION)

### 6.1 Halaman Form Pengajuan Permohonan (Sisi Pemohon)

Berikut adalah Wire Frame halaman Form Pengajuan Permohonan:

![Wire Frame Pemohon](/laporan/Wire%20Frame%20Pemohon.png)

Halaman Form Pengajuan Permohonan memiliki layout grid yang terstruktur dengan beberapa bagian utama. Bagian atas halaman terdapat header dengan judul "Form Pengajuan Permohonan Layanan" dan tombol kembali ke daftar permohonan.

Di bawah header terdapat kartu form utama yang dibagi menjadi beberapa bagian:

1. **Bagian Data Pemohon**:
    - Input nama lengkap Pemohon yang sudah terisi otomatis dari profil Pemohon (disabled).
    - Dropdown pilihan jenis Pemohon (Internal/Eksternal).
    - Dropdown pilihan instansi (hanya muncul jika jenis Pemohon adalah Internal).

2. **Bagian Data Penanggung Jawab**:
    - Input nama penanggung jawab.
    - Input NIP penanggung jawab (opsional).
    - Input jabatan penanggung jawab (opsional).
    - Input unit kerja penanggung jawab (opsional).
    - Input nomor HP penanggung jawab.
    - Input email penanggung jawab (opsional).

3. **Bagian Detail Permohonan**:
    - Dropdown pilihan jenis layanan.
    - Dropdown pilihan kebutuhan layanan.
    - Input nama kebutuhan layanan (opsional).
    - Input tahun anggaran.
    - Input periode (opsional).
    - Input lokasi pemeriksaan.
    - Textarea keterangan tambahan (opsional).

4. **Bagian Upload Berkas**:
    - Area drag-and-drop berkas pendukung dengan batas maksimal 10 MB.
    - Teks petunjuk tentang format file yang diizinkan (PDF, DOCX, DOC, JPG, JPEG, PNG).
    - Daftar file yang telah dipilih beserta tombol hapus per file.

Di bagian bawah halaman terdapat tombol aksi:

- Tombol "Simpan Sebagai Draf" (border abu-abu, warna teks abu-abu).
- Tombol "Kirim Permohonan" (warna biru tua, warna teks putih, lebar penuh).

### 6.2 Halaman Dashboard & Modal Pop-up Disposisi (Sisi Pimpinan/Kabid)

Berikut adalah Wire Frame halaman Dashboard dan Modal Disposisi Pimpinan:

![Wire Frame Pimpinan](/laporan/Wire%20Frame%20pimpinan.png)
![Wire Frame Pimpinan 2](/laporan/Wire%20Frame%20pimpinan%20copy.png)
![Wire Frame Pimpinan 3](/laporan/Wire%20Frame%20pimpinan%20copy%202.png)

Halaman Dashboard Pimpinan memiliki header dengan judul "Dashboard Pimpinan" dan notifikasi badge. Di bawah header terdapat kartu ringkasan statistik permohonan (jumlah permohonan pending, proses, dan selesai).

Di bagian bawah statistik terdapat tabel daftar permohonan dengan kolom:

- Nomor registrasi.
- Nama Pemohon.
- Nama instansi.
- Jenis layanan.
- Tanggal permohonan.
- Status permohonan.
- Aksi (lihat detail, berikan disposisi).

Saat Pimpinan mengklik tombol "Berikan Disposisi", akan muncul modal pop-up dengan overlay latar belakang hitam transparan. Modal tersebut berisi:

- Header modal dengan judul "Berikan Disposisi Tugas" dan tombol tutup.
- Body modal dengan dropdown pilihan Petugas Teknis (dapat memilih lebih dari satu).
- Textarea keterangan/instruksi.
- Footer modal dengan tombol "Batal" dan "Kirim Disposisi".

### 6.3 Halaman Form Input Berita Acara (Sisi Petugas)

Berikut adalah Wire Frame halaman Form Input Berita Acara untuk Petugas:

![Wire Frame Berita Acara](/laporan/Wire%20Frame%20berita%20acara.png)

Halaman Form Input Berita Acara memiliki header dengan judul "Detail Tugas & Form Berita Acara" dan tombol kembali ke daftar tugas. Di bawah header terdapat kartu ringkasan detail tugas dari Pimpinan, termasuk nomor registrasi, nama Pemohon, nama instansi, dan instruksi dari Pimpinan.

Di bawah kartu detail tugas terdapat kartu form Berita Acara Pemeriksaan dengan bagian-bagian:

- Input nomor Berita Acara (auto-generate).
- Input tanggal pemeriksaan (datepicker).
- Input lokasi pemeriksaan.
- Textarea ringkasan pekerjaan yang dilaksanakan.
- Textarea ringkasan masalah yang ditemukan.
- Textarea alternatif solusi yang ditawarkan.
- Area upload bukti verifikasi/foto (drag-and-drop, format JPG/JPEG/PNG/PDF).
- Textarea keterangan tambahan (opsional).

Di bagian bawah halaman terdapat tombol aksi:

- Tombol "Simpan Sebagai Draf" (border abu-abu, warna teks abu-abu).
- Tombol "Kirim & Selesaikan Tugas" (warna hijau tua, warna teks putih, lebar penuh).

---

## BAB VII — PERSYARATAN LAINNYA & PANDUAN DEVELOPER

### 7.1 Dokumentasi Teknis

Berikut adalah panduan konfigurasi dan pengembangan Sistem Informasi Layanan SPBE:

#### 7.1.1 Konfigurasi File `.env`

Untuk mengkonfigurasi sistem, buat salin file `.env.example` menjadi `.env` dan atur parameter berikut:

```env
# Konfigurasi Aplikasi
APP_NAME="Sistem Layanan SPBE"
APP_ENV=local
APP_KEY=base64:your-app-key-here
APP_DEBUG=true
APP_URL=http://localhost:8000

# Konfigurasi Database
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=nama_database
DB_USERNAME=root
DB_PASSWORD=

# Konfigurasi Email (Gmail SMTP)
MAIL_MAILER=smtp
MAIL_HOST=smtp.gmail.com
MAIL_PORT=587
MAIL_USERNAME=your-email@gmail.com
MAIL_PASSWORD=your-google-app-password
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS=your-email@gmail.com
MAIL_FROM_NAME="Sistem Layanan SPBE"

# Konfigurasi Queue (Sync Driver)
QUEUE_CONNECTION=sync
```

#### 7.1.2 Langkah Instalasi

1. Clone repositori proyek ke direktori lokal.
2. Jalankan perintah `composer install` untuk menginstal dependensi PHP.
3. Salin file `.env.example` menjadi `.env` dan atur konfigurasi database dan email.
4. Jalankan perintah `php artisan key:generate` untuk menghasilkan APP_KEY.
5. Jalankan perintah `php artisan migrate` untuk menjalankan migrasi database.
6. Jalankan perintah `php artisan db:seed` untuk mengisi data dummy (jika ada).
7. Jalankan perintah `php artisan storage:link` untuk membuat symbolic link ke direktori storage.
8. Jalankan perintah `php artisan serve` untuk menjalankan server development.
9. Buka browser dan akses `http://localhost:8000`.

#### 7.1.3 Catatan Penting

- Pastikan PHP versi minimal adalah 8.2 atau lebih baru.
- Pastikan MySQL telah terinstal dan berjalan di port 3306.
- Untuk pengiriman email Gmail, pastikan 2-Step Verification harus diaktifkan di akun Google Anda, kemudian buat App Password khusus untuk aplikasi ini di halaman `https://myaccount.google.com/apppasswords`.
- Untuk lingkungan pengembangan lokal, konfigurasi `verify_peer` dan `verify_peer_name` di file `config/mail.php` telah diatur menjadi `false`.
