-- phpMyAdmin SQL Dump
-- version 5.2.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 29 Jun 2026 pada 23.11
-- Versi server: 8.0.30
-- Versi PHP: 8.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Basis data: `kominfo_spbe_baru`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `activity_logs`
--

CREATE TABLE `activity_logs` (
  `id` bigint UNSIGNED NOT NULL,
  `website_id` bigint UNSIGNED NOT NULL,
  `event` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `actor` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `old_values` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin,
  `new_values` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin,
  `model_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `model_id` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `berita_acara_pemeriksaan`
--

CREATE TABLE `berita_acara_pemeriksaan` (
  `id` bigint UNSIGNED NOT NULL,
  `id_tindak_lanjut` bigint UNSIGNED NOT NULL,
  `ringkasan_pekerjaan` text,
  `ringkasan_masalah` text,
  `alternatif_solusi` text,
  `lokasi` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `berita_acara_pemeriksaan`
--

INSERT INTO `berita_acara_pemeriksaan` (`id`, `id_tindak_lanjut`, `ringkasan_pekerjaan`, `ringkasan_masalah`, `alternatif_solusi`, `lokasi`, `created_at`, `updated_at`) VALUES
(22, 23, 'Pemeriksaan dan optimalisasi infrastruktur jaringan FO (Fiber Optik) untuk persiapan integrasi aplikasi SPBE lintas perangkat daerah telah dilaksanakan pada titik distribusi utama layanan pemerintahan digital.', 'Terjadi degradasi bandwidth pada core switch yang berdampak pada keterlambatan sinkronisasi data antarperangkat daerah.', 'Melakukan instalasi ulang modul SFP, penataan ulang patch cord, serta konfigurasi ulang manajemen bandwidth pada jalur prioritas layanan.', 'Ruang Data Center Dinas Komunikasi dan Informatika', '2026-06-09 22:21:36', '2026-06-09 22:21:36'),
(23, 24, 'Tim melakukan verifikasi kesiapan perangkat server dan pemetaan layanan aktif untuk mendukung penguatan tata kelola pemerintahan berbasis elektronik secara terukur.', 'Ditemukan utilisasi penyimpanan server yang mendekati ambang batas serta dokumentasi backup harian yang belum seragam.', 'Disarankan penambahan kapasitas penyimpanan, pembaruan SOP backup, dan monitoring kapasitas secara berkala melalui dashboard infrastruktur.', 'Ruang Server Utama Pemerintah Daerah', '2026-06-09 22:21:36', '2026-06-09 22:21:36'),
(24, 23, 'Dilakukan pemeriksaan perangkat akses jaringan pada area pelayanan publik sebagai bagian dari upaya peningkatan kualitas konektivitas layanan digital masyarakat.', 'Terdapat beberapa access point dengan penurunan performa sinyal akibat penempatan perangkat yang kurang optimal dan interferensi kanal.', 'Melakukan reposisi access point, penyesuaian kanal frekuensi, dan pembaruan firmware perangkat agar cakupan sinyal lebih stabil.', 'Mal Pelayanan Publik Kabupaten', '2026-06-09 22:21:36', '2026-06-09 22:21:36'),
(25, 24, 'Pemeriksaan keamanan dasar sistem informasi dilakukan melalui validasi konfigurasi akun operator, hak akses pengguna, dan status pembaruan perangkat lunak pendukung layanan.', 'Masih ditemukan penggunaan kata sandi lemah pada beberapa akun operasional serta pembaruan sistem yang tertunda.', 'Menerapkan kebijakan password yang lebih kuat, menjadwalkan update keamanan terpusat, dan melakukan audit akses secara berkala.', 'Bidang Aplikasi Informatika', '2026-06-09 22:21:36', '2026-06-09 22:21:36'),
(26, 23, 'Tim melaksanakan pemeriksaan workstation operator layanan untuk memastikan kesiapan perangkat dalam pengelolaan arsip digital dan dokumen berita acara pemeriksaan.', 'Sebagian perangkat memiliki kapasitas memori yang terbatas sehingga menghambat proses pengolahan berkas digital berukuran besar.', 'Direkomendasikan peningkatan kapasitas RAM, pembersihan file sementara, dan standardisasi spesifikasi minimal perangkat operator.', 'Ruang Operator Layanan SPBE', '2026-06-09 22:21:36', '2026-06-09 22:21:36'),
(27, 24, 'Verifikasi lapangan terhadap jaringan distribusi antarbidang telah dilakukan guna memastikan kelancaran akses aplikasi persuratan, pelaporan, dan dashboard monitoring pimpinan.', 'Terdapat inkonsistensi konfigurasi VLAN pada beberapa titik distribusi yang menyebabkan segmentasi jaringan belum berjalan optimal.', 'Melakukan penyeragaman konfigurasi VLAN, pembaruan dokumentasi topologi jaringan, dan uji konektivitas menyeluruh setelah implementasi.', 'Gedung Kantor Induk Pemerintah Daerah', '2026-06-09 22:21:36', '2026-06-09 22:21:36'),
(28, 24, 'Bertanggung jawab atas pengembangan, pemeliharaan, dan optimalisasi aplikasi web berbasis Laravel dan ReactJS. Tugas utama meliputi perancangan arsitektur database, pembuatan API yang aman, serta integrasi layanan pihak ketiga (seperti payment gateway dan sistem notifikasi WhatsApp). Bekerja sama secara lintas fungsi dengan tim UI/UX dan produk untuk memastikan aplikasi berjalan responsif, minim kendala (bug-free), dan memiliki performa tinggi.', 'Terjadi lonjakan beban server (CPU usage mencapai 98%) setiap kali pengguna mengunduh laporan PDF bulanan secara bersamaan pada pukul 16.00 WIB. Hal ini menyebabkan aplikasi mengalami timeout, gagal memuat halaman dashboard utama, dan memicu beberapa permintaan database menjadi deadlock.', 'bebas yang penting biikin', 'ruang server', '2026-06-23 20:01:33', '2026-06-23 20:01:33');

-- --------------------------------------------------------

--
-- Struktur dari tabel `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `instansi`
--

CREATE TABLE `instansi` (
  `id` bigint UNSIGNED NOT NULL,
  `id_induk` int DEFAULT NULL,
  `kode_instansi` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nama_instansi` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `singkatan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alamat` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telepon` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` char(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `instansi`
--

INSERT INTO `instansi` (`id`, `id_induk`, `kode_instansi`, `nama_instansi`, `singkatan`, `alamat`, `telepon`, `email`, `status`, `created_at`, `updated_at`) VALUES
(1, NULL, NULL, 'BADAN KEPEGAWAIAN DAN PENGEMBANGAN SUMBER DAYA MANUSIA DAERAH', 'BKPSDMD', '', '', '', '1', NULL, NULL),
(2, NULL, NULL, 'BADAN KESATUAN BANGSA DAN POLITIK', 'KESBANGPOL', NULL, NULL, NULL, '1', NULL, NULL),
(3, NULL, NULL, 'BADAN KEUANGAN DAERAH', 'BAKEUDA', NULL, NULL, NULL, '1', NULL, NULL),
(4, NULL, NULL, 'BADAN NARKOTIKA NASIONAL PROVINSI', 'BNNP', NULL, NULL, NULL, '1', NULL, NULL),
(5, NULL, NULL, 'BADAN PENANGGULANGAN BENCANA DAERAH', 'BPBD', NULL, NULL, NULL, '1', NULL, NULL),
(6, NULL, NULL, 'BADAN PENGAWAS PEMILIHAN UMUM', 'BAWASLU', NULL, NULL, NULL, '1', NULL, NULL),
(7, NULL, NULL, 'BADAN PENGHUBUNG PROVINSI', 'BADAN PENGHUBUNG', NULL, NULL, NULL, '1', NULL, NULL),
(8, NULL, NULL, 'BADAN PERENCANAAN PEMBANGUNAN DAN PENELITIAN PENGEMBANGAN DAERAH', 'BAPPPEDA', NULL, NULL, NULL, '1', NULL, NULL),
(10, 45, NULL, 'BIRO HUKUM', 'BIRO HUKUM', NULL, NULL, NULL, '1', NULL, NULL),
(11, NULL, NULL, 'BIRO HUMAS DAN PROTOKOL', 'BIRO HUMAS', NULL, NULL, NULL, '1', NULL, NULL),
(12, 45, NULL, 'BIRO KESEJAHTERAAN RAKYAT', 'BIRO KESRA', NULL, NULL, NULL, '1', NULL, NULL),
(13, 15, NULL, 'BIRO LAYANAN PENGADAAN', 'BLP', NULL, NULL, NULL, '1', NULL, NULL),
(14, 45, NULL, 'BIRO ORGANISASI', 'BIRO ORGANISASI', NULL, NULL, NULL, '1', NULL, NULL),
(15, 45, NULL, 'BIRO PEMBANGUNAN', 'BIRO PEMBANGUNAN', NULL, NULL, NULL, '1', NULL, NULL),
(16, 45, NULL, 'BIRO PEMERINTAHAN', 'BIRO PEMERINTAHAN', NULL, NULL, NULL, '1', NULL, NULL),
(17, NULL, NULL, 'BIRO PEREKONOMIAN', 'BIRO EKONOMI', NULL, NULL, NULL, '1', NULL, NULL),
(18, 45, NULL, 'BIRO UMUM', 'BIRO UMUM', NULL, NULL, NULL, '1', NULL, NULL),
(19, NULL, NULL, 'DINAS ENERGI DAN SUMBER DAYA MINERAL', 'ESDM', NULL, NULL, NULL, '1', NULL, NULL),
(20, NULL, NULL, 'DINAS KEARSIPAN DAN PERPUSTAKAAN', 'DKPUS', NULL, NULL, NULL, '1', NULL, NULL),
(21, NULL, NULL, 'DINAS KEBUDAYAAN DAN PARIWISATA', 'DISBUDPAR', NULL, NULL, NULL, '1', NULL, NULL),
(22, NULL, NULL, 'DINAS KEHUTANAN', 'DISHUT', NULL, NULL, NULL, '1', NULL, NULL),
(23, NULL, NULL, 'DINAS KELAUTAN DAN PERIKANAN', 'DKP', NULL, NULL, NULL, '1', NULL, NULL),
(24, NULL, NULL, 'DINAS KEPEMUDAAN DAN OLAHRAGA', 'DISKEPORA', NULL, NULL, NULL, '1', NULL, NULL),
(25, NULL, NULL, 'DINAS KESEHATAN', 'DINKES', NULL, NULL, NULL, '1', NULL, NULL),
(26, NULL, NULL, 'DINAS KOMUNIKASI DAN INFORMATIKA', 'DISKOMINFO', NULL, NULL, NULL, '1', NULL, NULL),
(27, NULL, NULL, 'DINAS KOPERASI, USAHA KECIL DAN MENENGAH', 'KOPERASI', NULL, NULL, NULL, '1', NULL, NULL),
(28, NULL, NULL, 'DINAS LINGKUNGAN HIDUP', 'DLH', NULL, NULL, NULL, '1', NULL, NULL),
(29, NULL, NULL, 'DINAS PANGAN', NULL, NULL, NULL, NULL, '1', NULL, NULL),
(30, NULL, NULL, 'DINAS PEKERJAAN UMUM DAN PENATAAN RUANG', 'PUPR', 'Jln. Komplek Perkantoran Kantor Gubernur', '1234567', '1234567', '1', NULL, NULL),
(31, NULL, NULL, 'DINAS PEMBERDAYAAN MASYARAKAT DAN DESA', NULL, NULL, NULL, NULL, '1', NULL, NULL),
(32, NULL, NULL, 'DINAS PENANAMAN MODAL DAN PELAYANAN TERPADU SATU PINTU', 'PTSP', NULL, NULL, NULL, '1', NULL, NULL),
(33, NULL, NULL, 'DINAS PENDIDIKAN', 'DINDIK', NULL, NULL, NULL, '1', NULL, NULL),
(34, NULL, NULL, 'DINAS PERHUBUNGAN', 'DISHUB', NULL, NULL, NULL, '1', NULL, NULL),
(35, NULL, NULL, 'DINAS PERINDUSTRIAN DAN PERDAGANGAN', 'DISPERINDAG', NULL, NULL, NULL, '1', NULL, NULL),
(36, NULL, NULL, 'DINAS PERTANIAN', 'DISTAN', NULL, NULL, NULL, '1', NULL, NULL),
(37, NULL, NULL, 'DINAS PERUMAHAN RAKYAT DAN KAWASAN PERMUKIMAN', NULL, NULL, NULL, NULL, '1', NULL, NULL),
(38, NULL, NULL, 'DINAS PPPA, DUKCAPIL, PENGENDALIAN PENDUDUK DAN KB', NULL, NULL, NULL, NULL, '1', NULL, NULL),
(39, NULL, NULL, 'DINAS SOSIAL', 'DINSOS', NULL, NULL, NULL, '1', NULL, NULL),
(40, NULL, NULL, 'DINAS TENAGA KERJA', 'DISNAKER', NULL, NULL, NULL, '1', NULL, NULL),
(41, NULL, NULL, 'INSPEKTORAT DAERAH', 'INSPEKTORAT', NULL, NULL, NULL, '1', NULL, NULL),
(42, 25, NULL, 'RUMAH SAKIT JIWA DAERAH', 'RSJD', NULL, NULL, NULL, '1', NULL, NULL),
(43, NULL, NULL, 'RUMAH SAKIT UMUM DAERAH', 'RSUD', NULL, NULL, NULL, '1', NULL, NULL),
(44, NULL, NULL, 'SATUAN POLISI PAMONG PRAJA', 'SATPOL PP', NULL, NULL, NULL, '1', NULL, NULL),
(45, NULL, NULL, 'SEKRETARIAT DAERAH', 'SETDA', NULL, NULL, NULL, '1', NULL, NULL),
(46, NULL, NULL, 'SEKRETARIAT DPRD', 'SETWAN', NULL, NULL, NULL, '1', NULL, NULL),
(47, NULL, NULL, 'SEKRETARIAT KOMISI PEMILIHAN UMUM', NULL, NULL, NULL, NULL, '1', NULL, NULL),
(48, 23, NULL, 'UPTD BALAI PEMULIAAN IKAN', NULL, NULL, NULL, NULL, '1', NULL, NULL),
(49, 23, NULL, 'UPTD BALAI BENIH IKAN LAUT TANJUNG RUSA', NULL, NULL, NULL, NULL, '1', NULL, NULL),
(50, NULL, NULL, 'UPTD BALAI BENIH IKAN SENTRAL PEMALI', NULL, NULL, NULL, NULL, '1', NULL, NULL),
(51, 206, NULL, 'UPTD BALAI BENIH PERTANIAN', NULL, NULL, NULL, NULL, '1', NULL, NULL),
(52, 40, NULL, 'UPTD BALAI HYGIENE PERUSAHAAN KESEHATAN DAN KESELAMATAN KERJA', NULL, NULL, NULL, NULL, '1', NULL, NULL),
(53, 40, NULL, 'UPTD BALAI LATIHAN KERJA ', NULL, NULL, NULL, NULL, '1', NULL, NULL),
(54, 27, NULL, 'UPTD BALAI LATIHAN KOPERASI USAHA KECIL DAN MENENGAH', 'UPTD KOPERASI', NULL, NULL, NULL, '1', NULL, NULL),
(55, 35, NULL, 'UPTD BALAI PENGUJIAN DAN SERTIFIKASI MUTU BARANG', 'BPSMB', NULL, NULL, NULL, '1', NULL, NULL),
(56, NULL, NULL, 'UPTD BALAI PENGEMBANGAN PRODUKTIVITAS DAERAH', NULL, NULL, NULL, NULL, '1', NULL, NULL),
(57, 206, NULL, 'UPTD BALAI PROTEKSI TANAMAN', NULL, NULL, NULL, NULL, '1', NULL, NULL),
(58, 25, NULL, 'UPTD LABORATORIUM KESEHATAN', NULL, NULL, NULL, NULL, '1', NULL, NULL),
(59, 216, NULL, 'UPTD LABORATORIUM LINGKUNGAN', 'LAB-LH', NULL, NULL, NULL, '1', NULL, NULL),
(60, 23, NULL, 'UPTD LABORATORIUM PENGUJIAN DAN PENGENDALIAN MUTU HASIL PERIKANAN', NULL, NULL, NULL, NULL, '1', NULL, NULL),
(61, 217, NULL, 'UPTD PANTI SOSIAL BINA SERUMPUN', 'SERUMPUN', NULL, NULL, NULL, '1', NULL, NULL),
(62, 3, NULL, 'UPTD SAMSAT WILAYAH KABUPATEN BANGKA', NULL, NULL, NULL, NULL, '1', NULL, NULL),
(63, 3, NULL, 'UPTD SAMSAT WILAYAH KABUPATEN BANGKA BARAT', NULL, NULL, NULL, NULL, '1', NULL, NULL),
(64, 3, NULL, 'UPTD SAMSAT WILAYAH KABUPATEN BANGKA SELATAN', NULL, NULL, NULL, NULL, '1', NULL, NULL),
(65, 3, NULL, 'UPTD SAMSAT WILAYAH KABUPATEN BANGKA TENGAH', NULL, NULL, NULL, NULL, '1', NULL, NULL),
(66, 3, NULL, 'UPTD SAMSAT WILAYAH KABUPATEN BELITUNG', NULL, NULL, NULL, NULL, '1', NULL, NULL),
(67, 218, NULL, 'UPTD PENGAWASAN DAN PERALATAN', 'UPTD PU', NULL, NULL, NULL, '1', NULL, NULL),
(68, 3, NULL, 'UPTD SAMSAT WILAYAH KABUPATEN BELITUNG TIMUR', NULL, NULL, NULL, NULL, '1', NULL, NULL),
(69, 3, NULL, 'UPTD SAMSAT WILAYAH KOTA PANGKALPINANG', NULL, NULL, NULL, NULL, '1', NULL, NULL),
(71, 206, NULL, 'UPTD BALAI PENGAWAS DAN SERTIFIKASI MUTU BENIH', NULL, NULL, NULL, NULL, '1', NULL, NULL),
(72, 209, NULL, 'SMAN 1 PUDING BESAR BANGKA', NULL, NULL, NULL, NULL, '1', NULL, NULL),
(73, 209, NULL, 'SMAN 1 MENDO BARAT BANGKA', NULL, NULL, NULL, NULL, '1', NULL, NULL),
(74, 209, NULL, 'SMAN 1 PEMALI BANGKA', NULL, NULL, NULL, NULL, '1', NULL, NULL),
(75, 209, NULL, 'SMKN 1 SUNGAILIAT BANGKA', NULL, NULL, NULL, NULL, '1', NULL, NULL),
(76, 209, NULL, 'SMAN 1 SUNGAILIAT BANGKA', NULL, NULL, NULL, NULL, '1', NULL, NULL),
(77, 209, NULL, 'SMAN 1 MERAWANG BANGKA', NULL, NULL, NULL, NULL, '1', NULL, NULL),
(78, 209, NULL, 'SMKN 2 SUNGAILIAT BANGKA', NULL, NULL, NULL, NULL, '1', NULL, NULL),
(79, 209, NULL, 'SMAN 1 RIAU SILIP BANGKA', NULL, NULL, NULL, NULL, '1', NULL, NULL),
(80, 209, NULL, 'SMKN 1 BELINYU BANGKA', NULL, NULL, NULL, NULL, '1', NULL, NULL),
(81, 209, NULL, 'SMKN 1 MENDO BARAT BANGKA', NULL, NULL, NULL, NULL, '1', NULL, NULL),
(82, 209, NULL, 'SMAN 1 BELINYU BANGKA', NULL, NULL, NULL, NULL, '1', NULL, NULL),
(83, 209, NULL, 'SLBN SUNGAILIAT BANGKA', NULL, NULL, NULL, NULL, '1', NULL, NULL),
(84, 209, NULL, 'SMKN 1 BAKAM BANGKA', NULL, NULL, NULL, NULL, '1', NULL, NULL),
(85, 209, NULL, 'SMAN 1 BAKAM BANGKA', NULL, NULL, NULL, NULL, '1', NULL, NULL),
(86, 209, NULL, 'SMAN 2 MENDO BARAT BANGKA', NULL, NULL, NULL, NULL, '1', NULL, NULL),
(87, 208, NULL, 'SMKN 3 PANGKALPINANG', NULL, NULL, NULL, NULL, '1', NULL, NULL),
(88, 208, NULL, 'SMAN 3 PANGKALPINANG', NULL, NULL, NULL, NULL, '1', NULL, NULL),
(89, 208, NULL, 'SMAN 2 PANGKALPINANG', NULL, NULL, NULL, NULL, '1', NULL, NULL),
(90, 208, NULL, 'SMKN 2 PANGKALPINANG', NULL, NULL, NULL, NULL, '1', NULL, NULL),
(91, 208, NULL, 'SMAN 4 PANGKALPINANG', NULL, NULL, NULL, NULL, '1', NULL, NULL),
(92, 208, NULL, 'SMKN 5 PANGKALPINANG', NULL, NULL, NULL, NULL, '1', NULL, NULL),
(93, 208, NULL, 'SMAN 1 PANGKALPINANG', NULL, NULL, NULL, NULL, '1', NULL, NULL),
(94, 208, NULL, 'SMKN 4 PANGKALPINANG', NULL, NULL, NULL, NULL, '1', NULL, NULL),
(95, 208, NULL, 'SMKN 1 PANGKALPINANG', NULL, NULL, NULL, NULL, '1', NULL, NULL),
(96, 211, NULL, 'SMAN 1 MUNTOK BANGKA BARAT', NULL, NULL, NULL, NULL, '1', NULL, NULL),
(97, 211, NULL, 'SMAN 1 JEBUS BANGKA BARAT', NULL, NULL, NULL, NULL, '1', NULL, NULL),
(98, 211, NULL, 'SMKN 1 KELAPA BANGKA BARAT', NULL, NULL, NULL, NULL, '1', NULL, NULL),
(99, 211, NULL, 'SMAN 1 KELAPA BANGKA BARAT', NULL, NULL, NULL, NULL, '1', NULL, NULL),
(100, 211, NULL, 'SMKN 1 MUNTOK BANGKA BARAT', NULL, NULL, NULL, NULL, '1', NULL, NULL),
(101, 211, NULL, 'SMKN 1 PARITTIGA BANGKA BARAT', NULL, NULL, NULL, NULL, '1', NULL, NULL),
(102, 211, NULL, 'SMAN 1 SIMPANG TERITIP BANGKA BARAT', NULL, NULL, NULL, NULL, '1', NULL, NULL),
(103, 211, NULL, 'SMAN 1 TEMPILANG BANGKA BARAT', NULL, NULL, NULL, NULL, '1', NULL, NULL),
(104, 33, NULL, '-', NULL, NULL, NULL, NULL, '1', NULL, NULL),
(105, 211, NULL, 'SMAN 1 PARITTIGA BANGKA BARAT', NULL, NULL, NULL, NULL, '1', NULL, NULL),
(106, 211, NULL, 'SMKN 1 TEMPILANG BANGKA BARAT', NULL, NULL, NULL, NULL, '1', NULL, NULL),
(107, 211, NULL, 'SLBN MUNTOK BANGKA BARAT', NULL, NULL, NULL, NULL, '1', NULL, NULL),
(108, 209, NULL, 'SMAN 2 PUDING BESAR BANGKA', NULL, NULL, NULL, NULL, '1', NULL, NULL),
(110, 208, NULL, 'SLBN PANGKALPINANG', NULL, NULL, NULL, NULL, '1', NULL, NULL),
(111, 33, NULL, '-', NULL, NULL, NULL, NULL, '1', NULL, NULL),
(112, 212, NULL, 'SMAN 2 TANJUNGPANDAN BELITUNG', NULL, NULL, NULL, NULL, '1', NULL, NULL),
(113, 212, NULL, 'SLBN TANJUNGPANDAN BELITUNG', NULL, NULL, NULL, NULL, '1', NULL, NULL),
(114, 212, NULL, 'SMAN 1 MEMBALONG BELITUNG', NULL, NULL, NULL, NULL, '1', NULL, NULL),
(115, 212, NULL, 'SMAN 1 SIJUK BELITUNG', NULL, NULL, NULL, NULL, '1', NULL, NULL),
(116, 212, NULL, 'SMKN 1 TANJUNGPANDAN BELITUNG', NULL, NULL, NULL, NULL, '1', NULL, NULL),
(117, 212, NULL, 'SMKN 2 TANJUNGPANDAN BELITUNG', NULL, NULL, NULL, NULL, '1', NULL, NULL),
(118, 212, NULL, 'SMKN 1 BADAU BELITUNG', NULL, NULL, NULL, NULL, '1', NULL, NULL),
(119, 212, NULL, 'SMAN 1 TANJUNG PANDAN BELITUNG', NULL, NULL, NULL, NULL, '1', NULL, NULL),
(120, 212, NULL, 'SMKN 3 TANJUNGPANDAN BELITUNG', NULL, NULL, NULL, NULL, '1', NULL, NULL),
(121, 212, NULL, 'SMKN 1 SELAT NASIK BELITUNG', NULL, NULL, NULL, NULL, '1', NULL, NULL),
(122, 208, NULL, 'SMKN 1 PANGKALAN BARU BANGKA TENGAH', NULL, NULL, NULL, NULL, '1', NULL, NULL),
(123, 208, NULL, 'SMAN 1 KOBA BANGKA TENGAH', NULL, NULL, NULL, NULL, '1', NULL, NULL),
(124, 208, NULL, 'SMAN 1 SUNGAISELAN BANGKA TENGAH', NULL, NULL, NULL, NULL, '1', NULL, NULL),
(125, 208, NULL, 'SMAN 1 NAMANG BANGKA TENGAH', NULL, NULL, NULL, NULL, '1', NULL, NULL),
(126, 208, NULL, 'SMAN 1 LUBUK BESAR BANGKA TENGAH', NULL, NULL, NULL, NULL, '1', NULL, NULL),
(127, 208, NULL, 'SMKN 1 KOBA BANGKA TENGAH', NULL, NULL, NULL, NULL, '1', NULL, NULL),
(128, 208, NULL, 'SMKN 2 KOBA BANGKA TENGAH', NULL, NULL, NULL, NULL, '1', NULL, NULL),
(129, 208, NULL, 'SMAN 1 PANGKALAN BARU BANGKA TENGAH', NULL, NULL, NULL, NULL, '1', NULL, NULL),
(130, 208, NULL, 'SLBN KOBA BANGKA TENGAH', NULL, NULL, NULL, NULL, '1', NULL, NULL),
(131, 208, NULL, 'SMAN 2 SUNGAISELAN BANGKA TENGAH', NULL, NULL, NULL, NULL, '1', NULL, NULL),
(132, 208, NULL, 'SMKN 1 SIMPANG KATIS BANGKA TENGAH', NULL, NULL, NULL, NULL, '1', NULL, NULL),
(133, 208, NULL, 'SMKN 1 SUNGAISELAN BANGKA TENGAH', NULL, NULL, NULL, NULL, '1', NULL, NULL),
(134, 212, NULL, 'SMAN 1 KELAPA KAMPIT BELITUNG TIMUR', NULL, NULL, NULL, NULL, '1', NULL, NULL),
(135, 212, NULL, 'SMAN 1 GANTUNG BELITUNG TIMUR', NULL, NULL, NULL, NULL, '1', NULL, NULL),
(136, 212, NULL, 'SMAN 1 DAMAR BELITUNG TIMUR', NULL, NULL, NULL, NULL, '1', NULL, NULL),
(137, 212, NULL, 'SMKN 1 MANGGAR BELITUNG TIMUR', NULL, NULL, NULL, NULL, '1', NULL, NULL),
(138, 212, NULL, 'SLBN MANGGAR BELITUNG TIMUR', NULL, NULL, NULL, NULL, '1', NULL, NULL),
(139, 212, NULL, 'SMKN 1 KELAPA KAMPIT BELITUNG TIMUR', NULL, NULL, NULL, NULL, '1', NULL, NULL),
(140, 212, NULL, 'SMAN 1 MANGGAR BELITUNG TIMUR', NULL, NULL, NULL, NULL, '1', NULL, NULL),
(141, 212, NULL, 'SMKN 1 DENDANG BELITUNG TIMUR', NULL, NULL, NULL, NULL, '1', NULL, NULL),
(142, 212, NULL, 'SMKN 1 SIMPANG RENGGIANG BELITUNG TIMUR', NULL, NULL, NULL, NULL, '1', NULL, NULL),
(143, 212, NULL, 'SMAN 1 SIMPANG PESAK BELITUNG TIMUR', NULL, NULL, NULL, NULL, '1', NULL, NULL),
(144, 210, NULL, 'SMKN 1 TOBOALI BANGKA SELATAN', NULL, NULL, NULL, NULL, '1', NULL, NULL),
(145, 210, NULL, 'SMKN 1 PAYUNG BANGKA SELATAN', NULL, NULL, NULL, NULL, '1', NULL, NULL),
(146, 210, NULL, 'SMAN 1 PULAU BESAR BANGKA SELATAN', NULL, NULL, NULL, NULL, '1', NULL, NULL),
(147, 210, NULL, 'SMAN 1 TOBOALI BANGKA SELATAN', NULL, NULL, NULL, NULL, '1', NULL, NULL),
(148, 210, NULL, 'SMAN 1 AIR GEGAS BANGKA SELATAN', NULL, NULL, NULL, NULL, '1', NULL, NULL),
(149, 210, NULL, 'SMKN 1 PULAU BESAR BANGKA SELATAN', NULL, NULL, NULL, NULL, '1', NULL, NULL),
(150, 210, NULL, 'SMAN 1 LEPAR PONGOK BANGKA SELATAN', NULL, NULL, NULL, NULL, '1', NULL, NULL),
(151, 210, NULL, 'SMAN 1 PAYUNG BANGKA SELATAN', NULL, NULL, NULL, NULL, '1', NULL, NULL),
(152, 210, NULL, 'SLBN TOBOALI BANGKA SELATAN', NULL, NULL, NULL, NULL, '1', NULL, NULL),
(153, 210, NULL, 'SMAN 1 KEPULAUAN PONGOK BANGKA SELATAN', NULL, NULL, NULL, NULL, '1', NULL, NULL),
(154, 210, NULL, 'SMAN 2 TOBOALI BANGKA SELATAN', NULL, NULL, NULL, NULL, '1', NULL, NULL),
(155, 210, NULL, 'SMAN 1 SIMPANG RIMBA BANGKA SELATAN', NULL, NULL, NULL, NULL, '1', NULL, NULL),
(156, 210, NULL, 'SMKN 1 AIR GEGAS BANGKA SELATAN', NULL, NULL, NULL, NULL, '1', NULL, NULL),
(157, 189, NULL, 'SMK 5 YAPENTOB TOBOALI BANGKA SELATAN', NULL, NULL, NULL, NULL, '1', NULL, NULL),
(158, 210, NULL, 'SMKN 1 TUKAK SADAI BANGKA SELATAN', NULL, NULL, NULL, NULL, '1', NULL, NULL),
(159, 210, NULL, 'SMKN 1 SIMPANG RIMBA BANGKA SELATAN', NULL, NULL, NULL, NULL, '1', NULL, NULL),
(160, 189, NULL, 'SMA MUHAMMADIYAH TOBOALI BANGKA SELATAN', NULL, NULL, NULL, NULL, '1', NULL, NULL),
(161, 208, NULL, 'SMAN 1 SUNGAI SELAN BANGKA TENGAH', NULL, NULL, NULL, NULL, '1', NULL, NULL),
(162, 208, NULL, 'SMKN 1 SIMPANGKATIS BANGKA TENGAH', NULL, NULL, NULL, NULL, '1', NULL, NULL),
(164, NULL, NULL, 'DINAS NON AKTIF', 'PENSIUN, MUTASI KELUAR PROVINSI, MENINGGAL', NULL, NULL, NULL, '1', NULL, NULL),
(170, 217, NULL, 'UPTD PANTI SOSIAL BINA LARAS HIJRAH', 'LARAS', NULL, NULL, NULL, '1', NULL, NULL),
(171, 21, NULL, 'UPTD BALAI PENGEMBANGAN PARIWISATA WILAYAH BELITUNG DINAS PARIWISATA', 'UPTD BALAI PENGEMBANGAN PARIWISATA WILAYAH BELITUNG DINAS PARIWISATA', NULL, NULL, NULL, '1', NULL, NULL),
(172, 216, NULL, 'UPTD KPHP SIGAMBIR KOTAWARINGIN', 'UPTD KPHP SIGAMBIR KOTAWARINGIN', NULL, NULL, NULL, '1', NULL, NULL),
(173, 216, NULL, 'UPTD KPHP BUBUS PANCA', 'UPTD KPHP BUBUS PANCA', NULL, NULL, NULL, '1', NULL, NULL),
(174, 216, NULL, 'UPTD KPHP SUNGAI SEMBULAN', 'UPTD KPHP SUNGAI SEMBULAN', NULL, NULL, NULL, '1', NULL, NULL),
(175, 216, NULL, 'UPTD KPHP RAMBAT MENDUYUNG', 'UPTD KPHP RAMBAT MENDUYUNG', NULL, NULL, NULL, '1', NULL, NULL),
(176, 216, NULL, 'UPTD KPHP MUNTAI PALAS', 'UPTD KPHP MUNTAI PALAS', NULL, NULL, NULL, '1', NULL, NULL),
(177, 216, NULL, 'UPTD KPHL BELANTU MENDANAU', 'UPTD KPHL BELANTU MENDANAU', NULL, NULL, NULL, '1', NULL, NULL),
(178, 216, NULL, 'UPTD KPHP JEBU BAMBANG ANTAN', 'UPTD KPHP JEBU BAMBANG ANTAN', NULL, NULL, NULL, '1', NULL, NULL),
(179, 216, NULL, 'UPTD KPHP GUNUNG DUREN', 'UPTD KPHP GUNUNG DUREN', 'BELITUNG TIMUR', NULL, NULL, '1', NULL, NULL),
(180, 32, NULL, 'UPTD PELAYANAN TERPADU SATU PINTU DINAS PENANAMAN MODAL DAN PELAYANAN TERPADU SATU PINTU', 'UPTD PTSP', NULL, NULL, NULL, '1', NULL, NULL),
(181, 19, NULL, 'CABANG DINAS ESDM WILAYAH BANGKA', 'ESDMBANGKA', NULL, NULL, NULL, '1', NULL, NULL),
(182, 19, NULL, 'CABANG DINAS ESDM WILAYAH BANGKA BARAT', 'ESDMBABAR', NULL, NULL, NULL, '1', NULL, NULL),
(183, 19, NULL, 'CABANG DINAS ESDM WILAYAH BANGKA TENGAH DAN SELATAN', 'ESDMBATENG', NULL, NULL, NULL, '1', NULL, NULL),
(184, 19, NULL, 'CABANG DINAS ESDM WILAYAH BELITUNG TIMUR', 'ESDMBELTIM', NULL, NULL, NULL, '1', NULL, NULL),
(185, 19, NULL, 'CABANG DINAS ESDM WILAYAH BELITUNG', 'ESDMBEL', NULL, NULL, NULL, '1', NULL, NULL),
(186, NULL, NULL, 'X', NULL, NULL, NULL, NULL, '1', NULL, NULL),
(187, 38, NULL, 'UPTD PERLINDUNGAN PEREMPUAN DAN ANAK ', NULL, 'Pangkalpinang', NULL, NULL, '1', NULL, NULL),
(188, 33, NULL, 'CABANG DINAS PENDIDIKAN WILAYAH I (PANGKALPINANG DAN BANGKA)', 'CABDIN PD1', NULL, NULL, NULL, '1', NULL, NULL),
(189, 33, NULL, 'CABANG DINAS PENDIDIKAN WILAYAH II (BANGKA TENGAH DAN BANGKA SELATAN)', 'CABDIN PDII', NULL, NULL, NULL, '1', NULL, NULL),
(190, 33, NULL, 'CABANG DINAS PENDIDIKAN WILAYAH III (BANGKA BARAT)', 'CABDIN PDIII', NULL, NULL, NULL, '1', NULL, NULL),
(191, 33, NULL, 'CABANG DINAS PENDIDIKAN WILAYAH IV (BELITUNG DAN BELITUNG TIMUR)', 'CABDIN PDIV', NULL, NULL, NULL, '1', NULL, NULL),
(192, 211, NULL, 'SMKN 1 SIMPANG TERITIP BANGKA BARAT', 'SMKN 1 SIMPANG TERITIP', 'SIMPANG TERITIP', NULL, NULL, '1', NULL, NULL),
(193, 191, NULL, 'SMAN LASKAR PELANGI', NULL, NULL, NULL, NULL, '1', NULL, NULL),
(194, 30, NULL, 'UPTD PUPR WILAYAH KABUPATEN BELITUNG ', NULL, NULL, NULL, NULL, '1', NULL, NULL),
(195, 208, NULL, 'SMAN OLAHRAGA MUHAMMAD NOER PANGKALAN BARU', NULL, NULL, NULL, NULL, '1', NULL, NULL),
(196, 212, NULL, 'SMKN 1 SIJUK BELITUNG', NULL, NULL, NULL, NULL, '1', NULL, NULL),
(197, NULL, NULL, 'xx', 'xx', NULL, NULL, NULL, '1', NULL, NULL),
(198, 188, NULL, 'SMK PGRI PANGKALPINANG', NULL, NULL, NULL, NULL, '1', NULL, NULL),
(199, 191, NULL, 'DINAS PENDIDIKAN / SMA PGRI TANJUNGPANDAN', NULL, NULL, NULL, NULL, '1', NULL, NULL),
(200, 45, NULL, 'BIRO PEREKONOMIAN DAN ADMINISTRASI PEMBANGUNAN', 'BIRO PEREKONOMIAN DAN ADMINISTRASI PEMBANGUNAN', NULL, NULL, NULL, '1', NULL, NULL),
(201, 45, NULL, 'BIRO PENGADAAN BARANG/JASA', 'BIRO PENGADAAN BARANG/JASA', NULL, NULL, NULL, '1', NULL, NULL),
(202, 35, NULL, 'UPTD RUMAH KEMASAN DAN PENGEMBANGAN PRODUK', 'UPTD RUMAH KEMASAN DAN PENGEMBANGAN PRODUK', NULL, NULL, NULL, '1', NULL, NULL),
(203, 25, NULL, 'UPTD BALAI LABORATORIUM KESEHATAN, PEMELIHARAAN DAN KALIBRASI ALAT KESEHATAN', 'LABKES', NULL, NULL, NULL, '1', NULL, NULL),
(204, 35, NULL, 'UPTD RUMAH PROMOSI DAN KEMASAN', 'PROMOSI', NULL, NULL, NULL, '1', NULL, NULL),
(205, 33, NULL, 'xxSMAN 1 PANGKALPINANG', NULL, 'JL. USMAN AMBON', '0717-421794', 'sman1@dinpendikpkp.go.id', '1', NULL, NULL),
(206, NULL, NULL, 'DINAS PERTANIAN DAN KETAHANAN PANGAN', 'DPKP', NULL, NULL, NULL, '1', NULL, NULL),
(207, 206, NULL, 'UPTD PENGAWASAN MUTU DAN KEAMANAN PANGAN ', 'UPTD MKP', NULL, NULL, NULL, '1', NULL, NULL),
(208, 33, NULL, 'CABANG DINAS PENDIDIKAN WILAYAH I (PANGKALPINANG DAN BANGKA TENGAH)', 'CABDIN PDWIL1', NULL, NULL, NULL, '1', NULL, NULL),
(209, 33, NULL, 'CABANG DINAS PENDIDIKAN WILAYAH II (BANGKA)', 'CABDIN PDWIL2', NULL, NULL, NULL, '1', NULL, NULL),
(210, 33, NULL, 'CABANG DINAS PENDIDIKAN WILAYAH III (BANGKA SELATAN)', 'CABDIN PDWIL3', NULL, NULL, NULL, '1', NULL, NULL),
(211, 33, NULL, 'CABANG DINAS PENDIDIKAN WILAYAH IV (BANGKA BARAT)', 'CABDIN PDWIL4', NULL, NULL, NULL, '1', NULL, NULL),
(212, 33, NULL, 'CABANG DINAS PENDIDIKAN WILAYAH V (BELITUNG DAN BELITUNG TIMUR)', 'CABDIN PDWIL5', NULL, NULL, NULL, '1', NULL, NULL),
(213, 25, NULL, 'RUMAH SAKIT UMUM DAERAH Ir. SOEKARNO', 'RSUP', NULL, NULL, NULL, '1', NULL, NULL),
(214, 33, NULL, 'UPTD BALAI TEKNOLOGI INFORMASI KOMUNIKASI PENDIDIKAN', 'BTIKP', NULL, NULL, NULL, '1', NULL, NULL),
(215, 210, NULL, 'SMAN 3 TOBOALI BANGKA SELATAN', NULL, NULL, NULL, NULL, '1', NULL, NULL),
(216, NULL, NULL, 'DINAS LINGKUNGAN HIDUP DAN KEHUTANAN', 'DLHK', NULL, NULL, NULL, '1', NULL, NULL),
(217, NULL, NULL, 'DINAS SOSIAL DAN PEMBERDAYAAN MASYARAKAT DESA', 'DSPMD', NULL, NULL, NULL, '1', NULL, NULL),
(218, NULL, NULL, 'DINAS PEKERJAAN UMUM PENATAAN RUANG  DAN PERUMAHAN RAKYAT KAWASAN PERMUKIMAN', 'PUPERUM', NULL, NULL, NULL, '1', NULL, NULL),
(219, NULL, NULL, 'DINAS PARIWISATA KEBUDAYAAN DAN KEPEMUDAAN OLAHRAGA', 'DISPARBUDKEPORA', NULL, NULL, NULL, '1', NULL, NULL),
(220, NULL, NULL, '-', 'UPTD KPHP BP (Unit III)', NULL, NULL, NULL, '1', NULL, NULL),
(221, NULL, NULL, '-', 'UPT-LAB DLHK', NULL, NULL, NULL, '1', NULL, NULL),
(222, 219, NULL, 'UPTD BALAI PENGEMBANGAN PARIWISATA WILAYAH BELITUNG', 'UPTD BPPWB', NULL, NULL, NULL, '1', NULL, NULL),
(223, 206, NULL, '-', '-', NULL, NULL, NULL, '1', NULL, NULL),
(224, 208, NULL, 'SMAN 1 SIMPANG KATIS BANGKA TENGAH', NULL, NULL, NULL, NULL, '1', NULL, NULL),
(225, 209, NULL, 'SMAN 2 SUNGAILIAT BANGKA', NULL, NULL, NULL, NULL, '1', NULL, NULL),
(226, NULL, NULL, 'Sekretariat Daerah', NULL, NULL, NULL, NULL, '1', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `issues`
--

CREATE TABLE `issues` (
  `id` bigint UNSIGNED NOT NULL,
  `website_id` bigint UNSIGNED NOT NULL,
  `phase_order` tinyint UNSIGNED DEFAULT NULL,
  `issue_number` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `type` enum('bug','blocker','risk','change_request','question','improvement') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'bug',
  `priority` enum('low','medium','high','critical') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'medium',
  `impact` enum('low','medium','high') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'medium',
  `status` enum('open','in_progress','resolved','closed','deferred') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'open',
  `reported_by` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `assigned_to` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `due_date` date DEFAULT NULL,
  `resolved_at` timestamp NULL DEFAULT NULL,
  `resolution_notes` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `issues`
--

INSERT INTO `issues` (`id`, `website_id`, `phase_order`, `issue_number`, `title`, `description`, `type`, `priority`, `impact`, `status`, `reported_by`, `assigned_to`, `due_date`, `resolved_at`, `resolution_notes`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 5, 7, 'RSUD-001', 'API endpoint lambat > 3 detik', NULL, 'blocker', 'critical', 'medium', 'in_progress', 'Sari Dewi', 'Reza Pratama', NULL, NULL, NULL, '2026-02-24 08:31:50', '2026-02-24 08:31:50', NULL),
(2, 5, 7, 'RSUD-002', 'Performa lambat di halaman artikel panjang', NULL, 'improvement', 'medium', 'medium', 'in_progress', 'Sari Dewi', 'Reza Pratama', NULL, NULL, NULL, '2026-02-24 08:31:50', '2026-02-24 08:31:50', NULL),
(3, 5, 6, 'RSUD-003', 'Integrasi WhatsApp API belum berfungsi', NULL, 'blocker', 'critical', 'medium', 'in_progress', 'Sari Dewi', 'Reza Pratama', NULL, NULL, NULL, '2026-02-24 08:31:50', '2026-02-24 08:31:50', NULL),
(4, 6, 6, 'PT-P-001', 'SSL tidak terdeteksi di beberapa browser', NULL, 'bug', 'high', 'medium', 'in_progress', 'Reza Pratama', 'Budi Santoso', NULL, NULL, NULL, '2026-02-24 08:31:50', '2026-02-24 08:31:50', NULL),
(5, 6, 4, 'PT-P-002', 'Upload gambar melebihi batas ukuran', NULL, 'bug', 'high', 'medium', 'open', 'Reza Pratama', 'Hendra Setiawan', NULL, NULL, NULL, '2026-02-24 08:31:50', '2026-02-24 08:31:50', NULL),
(6, 7, 5, 'PORT-001', 'Performa lambat di halaman artikel panjang', NULL, 'improvement', 'medium', 'medium', 'in_progress', 'Nina Kusuma', 'Sari Dewi', NULL, NULL, NULL, '2026-02-24 08:31:50', '2026-02-24 08:31:50', NULL),
(7, 7, 4, 'PORT-002', 'Integrasi WhatsApp API belum berfungsi', NULL, 'blocker', 'critical', 'medium', 'open', 'Nina Kusuma', 'Reza Pratama', NULL, NULL, NULL, '2026-02-24 08:31:50', '2026-02-24 08:31:50', NULL),
(8, 8, 7, 'DPRD-001', 'Mobile menu overlap dengan konten', NULL, 'bug', 'medium', 'medium', 'open', 'Agus Wibowo', 'Sari Dewi', NULL, NULL, NULL, '2026-02-24 08:31:51', '2026-02-24 08:31:51', NULL),
(9, 8, 7, 'DPRD-002', 'Performa lambat di halaman artikel panjang', NULL, 'improvement', 'medium', 'medium', 'in_progress', 'Agus Wibowo', 'Hendra Setiawan', NULL, NULL, NULL, '2026-02-24 08:31:51', '2026-02-24 08:31:51', NULL),
(10, 8, 6, 'DPRD-003', 'API endpoint lambat > 3 detik', NULL, 'blocker', 'critical', 'medium', 'open', 'Agus Wibowo', 'Reza Pratama', NULL, NULL, NULL, '2026-02-24 08:31:51', '2026-02-24 08:31:51', NULL),
(11, 9, 3, 'BATA-001', 'Tampilan error di Safari & iOS', NULL, 'bug', 'medium', 'medium', 'open', 'Dian Rahayu', 'Hendra Setiawan', NULL, NULL, NULL, '2026-02-24 08:31:51', '2026-02-24 08:31:51', NULL),
(12, 9, 2, 'BATA-002', 'Mobile menu overlap dengan konten', NULL, 'bug', 'medium', 'medium', 'in_progress', 'Dian Rahayu', 'Sari Dewi', NULL, NULL, NULL, '2026-02-24 08:31:51', '2026-02-24 08:31:51', NULL),
(13, 11, 4, 'BANK-001', 'Revisi header sesuai feedback klien', NULL, 'change_request', 'low', 'medium', 'open', 'Lina Putri', 'Sari Dewi', NULL, NULL, NULL, '2026-02-24 08:31:51', '2026-02-24 08:31:51', NULL),
(14, 11, 6, 'BANK-002', 'Data tidak sinkron antar environment', NULL, 'risk', 'high', 'medium', 'open', 'Lina Putri', 'Hendra Setiawan', NULL, NULL, NULL, '2026-02-24 08:31:51', '2026-02-24 08:31:51', NULL),
(15, 11, 4, 'BANK-003', 'Mobile menu overlap dengan konten', NULL, 'bug', 'medium', 'medium', 'open', 'Lina Putri', 'Sari Dewi', NULL, NULL, NULL, '2026-02-24 08:31:51', '2026-02-24 08:31:51', NULL),
(16, 12, 2, 'POLS-001', 'Tampilan error di Safari & iOS', NULL, 'bug', 'medium', 'medium', 'open', 'Budi Santoso', 'Budi Santoso', NULL, NULL, NULL, '2026-02-24 08:31:51', '2026-02-24 08:31:51', NULL),
(17, 12, 3, 'POLS-002', 'API endpoint lambat > 3 detik', NULL, 'blocker', 'critical', 'medium', 'open', 'Budi Santoso', 'Sari Dewi', NULL, NULL, NULL, '2026-02-24 08:31:51', '2026-02-24 08:31:51', NULL),
(18, 12, 3, 'POLS-003', 'Data tidak sinkron antar environment', NULL, 'risk', 'high', 'medium', 'open', 'Budi Santoso', 'Budi Santoso', NULL, NULL, NULL, '2026-02-24 08:31:51', '2026-02-24 08:31:51', NULL),
(19, 12, 4, 'POLS-004', 'SSL tidak terdeteksi di beberapa browser', NULL, 'bug', 'high', 'medium', 'open', 'Budi Santoso', 'Budi Santoso', NULL, NULL, NULL, '2026-02-24 08:31:51', '2026-02-24 08:31:51', NULL),
(20, 14, 4, 'PUSK-001', 'Performa lambat di halaman artikel panjang', NULL, 'improvement', 'medium', 'medium', 'open', 'Reza Pratama', 'Reza Pratama', NULL, NULL, NULL, '2026-02-24 08:31:51', '2026-02-24 08:31:51', NULL),
(21, 14, 5, 'PUSK-002', 'Integrasi WhatsApp API belum berfungsi', NULL, 'blocker', 'critical', 'medium', 'open', 'Reza Pratama', 'Reza Pratama', NULL, NULL, NULL, '2026-02-24 08:31:51', '2026-02-24 08:31:51', NULL),
(22, 14, 3, 'PUSK-003', 'API endpoint lambat > 3 detik', NULL, 'blocker', 'critical', 'medium', 'open', 'Reza Pratama', 'Sari Dewi', NULL, NULL, NULL, '2026-02-24 08:31:51', '2026-02-24 08:31:51', NULL),
(23, 14, 3, 'PUSK-004', 'Data tidak sinkron antar environment', NULL, 'risk', 'high', 'medium', 'open', 'Reza Pratama', 'Reza Pratama', NULL, NULL, NULL, '2026-02-24 08:31:51', '2026-02-24 08:31:51', NULL),
(24, 18, 4, 'BPJS-001', 'Tampilan error di Safari & iOS', NULL, 'bug', 'medium', 'medium', 'open', 'Hendra Setiawan', 'Hendra Setiawan', NULL, NULL, NULL, '2026-02-24 08:31:51', '2026-02-24 08:31:51', NULL),
(25, 19, 6, 'HOTE-001', 'Tampilan error di Safari & iOS', NULL, 'bug', 'medium', 'medium', 'open', 'Lina Putri', 'Hendra Setiawan', NULL, NULL, NULL, '2026-02-24 08:31:52', '2026-02-24 08:31:52', NULL),
(26, 19, 6, 'HOTE-002', 'Form kontak tidak mengirim email', NULL, 'bug', 'high', 'medium', 'in_progress', 'Lina Putri', 'Reza Pratama', NULL, NULL, NULL, '2026-02-24 08:31:52', '2026-02-24 08:31:52', NULL),
(27, 19, 7, 'HOTE-003', 'Performa lambat di halaman artikel panjang', NULL, 'improvement', 'medium', 'medium', 'open', 'Lina Putri', 'Budi Santoso', NULL, NULL, NULL, '2026-02-24 08:31:52', '2026-02-24 08:31:52', NULL),
(28, 19, 6, 'HOTE-004', 'API endpoint lambat > 3 detik', NULL, 'blocker', 'critical', 'medium', 'open', 'Lina Putri', 'Budi Santoso', NULL, NULL, NULL, '2026-02-24 08:31:52', '2026-02-24 08:31:52', NULL),
(29, 20, 3, 'GALA-001', 'Revisi header sesuai feedback klien', NULL, 'change_request', 'low', 'medium', 'open', 'Budi Santoso', 'Reza Pratama', NULL, NULL, NULL, '2026-02-24 08:31:52', '2026-02-24 08:31:52', NULL),
(30, 21, 5, 'KEPR-001', 'Form kontak tidak mengirim email', NULL, 'bug', 'high', 'medium', 'open', 'Sari Dewi', 'Sari Dewi', NULL, NULL, NULL, '2026-02-24 08:31:52', '2026-02-24 08:31:52', NULL),
(31, 22, 2, 'DINA-001', 'Integrasi WhatsApp API belum berfungsi', NULL, 'blocker', 'critical', 'medium', 'in_progress', 'Reza Pratama', 'Budi Santoso', NULL, NULL, NULL, '2026-02-24 08:31:52', '2026-02-24 08:31:52', NULL),
(32, 22, 4, 'DINA-002', 'Tampilan error di Safari & iOS', NULL, 'bug', 'medium', 'medium', 'open', 'Reza Pratama', 'Budi Santoso', NULL, NULL, NULL, '2026-02-24 08:31:52', '2026-02-24 08:31:52', NULL),
(33, 25, 4, 'KOPE-001', 'Mobile menu overlap dengan konten', NULL, 'bug', 'medium', 'medium', 'in_progress', 'Dian Rahayu', 'Budi Santoso', NULL, NULL, NULL, '2026-02-24 08:31:52', '2026-02-24 08:31:52', NULL),
(34, 26, 6, 'PENG-001', 'Performa lambat di halaman artikel panjang', NULL, 'improvement', 'medium', 'medium', 'open', 'Hendra Setiawan', 'Sari Dewi', NULL, NULL, NULL, '2026-02-24 08:31:52', '2026-02-24 08:31:52', NULL),
(35, 26, 6, 'PENG-002', 'Integrasi WhatsApp API belum berfungsi', NULL, 'blocker', 'critical', 'medium', 'open', 'Hendra Setiawan', 'Budi Santoso', NULL, NULL, NULL, '2026-02-24 08:31:52', '2026-02-24 08:31:52', NULL),
(36, 27, 5, 'BATA-001', 'API endpoint lambat > 3 detik', NULL, 'blocker', 'critical', 'medium', 'open', 'Lina Putri', 'Hendra Setiawan', NULL, NULL, NULL, '2026-02-24 08:31:52', '2026-02-24 08:31:52', NULL),
(37, 27, 3, 'BATA-002', 'Revisi header sesuai feedback klien', NULL, 'change_request', 'low', 'medium', 'open', 'Lina Putri', 'Reza Pratama', NULL, NULL, NULL, '2026-02-24 08:31:52', '2026-02-24 08:31:52', NULL),
(38, 27, 4, 'BATA-003', 'Integrasi WhatsApp API belum berfungsi', NULL, 'blocker', 'critical', 'medium', 'open', 'Lina Putri', 'Reza Pratama', NULL, NULL, NULL, '2026-02-24 08:31:52', '2026-02-24 08:31:52', NULL),
(39, 28, 5, 'PLN--001', 'SSL tidak terdeteksi di beberapa browser', NULL, 'bug', 'high', 'medium', 'open', 'Budi Santoso', 'Hendra Setiawan', NULL, NULL, NULL, '2026-02-24 08:31:52', '2026-02-24 08:31:52', NULL),
(40, 28, 6, 'PLN--002', 'Data tidak sinkron antar environment', NULL, 'risk', 'high', 'medium', 'open', 'Budi Santoso', 'Reza Pratama', NULL, NULL, NULL, '2026-02-24 08:31:52', '2026-02-24 08:31:52', NULL),
(41, 28, 5, 'PLN--003', 'Form kontak tidak mengirim email', NULL, 'bug', 'high', 'medium', 'open', 'Budi Santoso', 'Budi Santoso', NULL, NULL, NULL, '2026-02-24 08:31:52', '2026-02-24 08:31:52', NULL),
(42, 31, 6, 'BATA-001', 'Form kontak tidak mengirim email', NULL, 'bug', 'high', 'medium', 'open', 'Nina Kusuma', 'Sari Dewi', NULL, NULL, NULL, '2026-02-24 08:31:53', '2026-02-24 08:31:53', NULL),
(43, 31, 6, 'BATA-002', 'SSL tidak terdeteksi di beberapa browser', NULL, 'bug', 'high', 'medium', 'in_progress', 'Nina Kusuma', 'Reza Pratama', NULL, NULL, NULL, '2026-02-24 08:31:53', '2026-02-24 08:31:53', NULL),
(44, 31, 6, 'BATA-003', 'Performa lambat di halaman artikel panjang', NULL, 'improvement', 'medium', 'medium', 'open', 'Nina Kusuma', 'Reza Pratama', NULL, NULL, NULL, '2026-02-24 08:31:53', '2026-02-24 08:31:53', NULL),
(45, 31, 6, 'BATA-004', 'API endpoint lambat > 3 detik', NULL, 'blocker', 'critical', 'medium', 'open', 'Nina Kusuma', 'Hendra Setiawan', NULL, NULL, NULL, '2026-02-24 08:31:53', '2026-02-24 08:31:53', NULL),
(46, 32, 5, 'BPS--001', 'Revisi header sesuai feedback klien', NULL, 'change_request', 'low', 'medium', 'open', 'Agus Wibowo', 'Hendra Setiawan', NULL, NULL, NULL, '2026-02-24 08:31:53', '2026-02-24 08:31:53', NULL),
(47, 32, 5, 'BPS--002', 'SSL tidak terdeteksi di beberapa browser', NULL, 'bug', 'high', 'medium', 'open', 'Agus Wibowo', 'Sari Dewi', NULL, NULL, NULL, '2026-02-24 08:31:53', '2026-02-24 08:31:53', NULL),
(48, 32, 3, 'BPS--003', 'Upload gambar melebihi batas ukuran', NULL, 'bug', 'high', 'medium', 'in_progress', 'Agus Wibowo', 'Sari Dewi', NULL, NULL, NULL, '2026-02-24 08:31:53', '2026-02-24 08:31:53', NULL),
(49, 32, 3, 'BPS--004', 'Mobile menu overlap dengan konten', NULL, 'bug', 'medium', 'medium', 'in_progress', 'Agus Wibowo', 'Budi Santoso', NULL, NULL, NULL, '2026-02-24 08:31:53', '2026-02-24 08:31:53', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis_layanan_spbe`
--

CREATE TABLE `jenis_layanan_spbe` (
  `id` bigint UNSIGNED NOT NULL,
  `kode` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `namajenis` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `alias` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `linkna` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `modelna` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `referensi` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `status` char(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `jenis_layanan_spbe`
--

INSERT INTO `jenis_layanan_spbe` (`id`, `kode`, `namajenis`, `alias`, `linkna`, `modelna`, `referensi`, `status`, `created_at`, `updated_at`) VALUES
(1, 'SC01', 'Belanja T.I.K', 'tikbelanja', NULL, 'App\\Models\\Tikbelanja', 'kategori_belanja', '1', NULL, '2026-02-28 09:07:41'),
(2, 'SC02', 'Pembangunan Aplikasi', 'tikdevapp', NULL, 'App\\Models\\Tiksiskom', NULL, '1', NULL, NULL),
(3, 'SC03', 'Pusat Data', 'tikpusatdata', NULL, 'App\\Models\\Tiksiskom', NULL, '1', NULL, NULL),
(4, 'SC04', 'Jaringan Intra Pemda', 'tikjaringan', NULL, 'App\\Models\\Tikjaringan', 'kebutuhan_jaringan', '1', NULL, NULL),
(5, 'SC05', 'Sistem Penghubung Layanan Pemda', 'tiksispeng', NULL, 'App\\Models\\Tiksiskom', NULL, '1', NULL, NULL),
(6, 'SC06', 'Manajemen Keamanan Informasi', 'tikkeamanan', NULL, 'App\\Models\\Tiksiskom', NULL, '1', NULL, NULL),
(7, 'SC07', 'Audit TIK', 'tikaudit', NULL, 'App\\Models\\Tiksiskom', NULL, '1', NULL, NULL),
(8, 'SC08', 'Sistem Komunikasi Intra Pemda', 'tiksiskom', NULL, 'App\\Models\\Tiksiskom', 'kebutuhan_intra', '1', NULL, NULL),
(9, 'SC09', 'Pejabat Pengelola Informasi & Dokumentasi', 'tikpejpeng', NULL, 'App\\Models\\Tiksiskom', NULL, '1', NULL, NULL),
(99, 'VS99', 'Kunjungan', 'tikvisit', NULL, 'App\\Models\\Tikvisit', 'kebutuhan_kunjungan', '1', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `queue` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint UNSIGNED NOT NULL,
  `reserved_at` int UNSIGNED DEFAULT NULL,
  `available_at` int UNSIGNED NOT NULL,
  `created_at` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kebutuhan_layanan_spbe`
--

CREATE TABLE `kebutuhan_layanan_spbe` (
  `id` int NOT NULL,
  `id_jenis_layanan_spbe` int DEFAULT NULL,
  `no_kebutuhan` int DEFAULT NULL,
  `nama_kebutuhan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `status` char(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `ket` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `kebutuhan_layanan_spbe`
--

INSERT INTO `kebutuhan_layanan_spbe` (`id`, `id_jenis_layanan_spbe`, `no_kebutuhan`, `nama_kebutuhan`, `status`, `ket`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 4, 1, 'Perancangan interkoneksi jaringan intra pemerintah daerah', '1', '-', '2026-02-14 07:21:30', '2026-02-14 07:21:30', NULL),
(2, 4, 2, 'Pembangunan/pengembangan jaringan intra pemerintah daerah', '1', '-', '2026-02-14 07:22:00', '2026-02-14 07:22:00', NULL),
(3, 4, 3, 'Perbaikan dan atau pemeliharaan jaringan intra pemerintah daerah', '1', NULL, '2026-02-14 07:23:58', '2026-02-14 07:23:58', NULL),
(4, 4, 4, 'Rekomendasi kebutuhan peralatan jaringan intra pemerintah daerah', '1', '-', '2026-02-14 07:24:23', '2026-02-14 07:24:23', NULL),
(5, 8, 1, 'E-mail', '1', NULL, '2026-02-14 07:27:14', '2026-02-14 07:28:17', NULL),
(6, 8, 2, 'Video Conference (Zoom Meeting)', '1', NULL, '2026-02-14 07:27:40', '2026-02-14 07:27:40', NULL),
(7, 8, 3, 'Service Desk', '1', '-', '2026-02-14 07:28:03', '2026-02-14 07:28:03', NULL),
(8, 8, 4, 'Whatsapp Service Desk', '1', NULL, '2026-02-14 07:28:40', '2026-02-14 07:28:40', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `layanan_spbe`
--

CREATE TABLE `layanan_spbe` (
  `id` bigint UNSIGNED NOT NULL,
  `id_jenis_layanan` bigint UNSIGNED DEFAULT NULL,
  `id_kebutuhan` json DEFAULT NULL,
  `is_eksternal` enum('Ya','Tidak') CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `tahunanggaran` varchar(10) DEFAULT '',
  `nama_pemohon` varchar(255) DEFAULT NULL,
  `periode` varchar(40) DEFAULT '',
  `noreg` varchar(100) DEFAULT NULL,
  `id_instansi` bigint UNSIGNED DEFAULT NULL,
  `nama_instansi` varchar(255) DEFAULT '',
  `unitkerja` varchar(255) DEFAULT NULL,
  `lokasi` varchar(100) DEFAULT '',
  `id_pemohon` bigint NOT NULL,
  `nama_penanggungjawab` varchar(100) DEFAULT '',
  `nip_penanggungjawab` varchar(80) DEFAULT NULL,
  `nohp_penanggungjawab` varchar(40) DEFAULT NULL,
  `jabatan_penanggungjawab` varchar(80) DEFAULT NULL,
  `unitkerja_penanggungjawab` varchar(200) DEFAULT NULL,
  `email_penanggungjawab` varchar(100) DEFAULT NULL,
  `ket` text,
  `tgl_permohonan` date DEFAULT NULL,
  `nama_kebutuhan` varchar(255) DEFAULT NULL,
  `berkas` text,
  `status` char(1) DEFAULT NULL,
  `inputby` varchar(40) DEFAULT '',
  `tglinput` date DEFAULT NULL,
  `status_ver` char(255) DEFAULT NULL,
  `verby` varchar(40) DEFAULT NULL,
  `tglver` date DEFAULT NULL,
  `nover` varchar(100) DEFAULT NULL,
  `ketver` text,
  `berkasver` varchar(200) DEFAULT NULL,
  `status_tl` char(1) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `tl_by` varchar(40) DEFAULT NULL,
  `tgl_tl` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `layanan_spbe`
--

INSERT INTO `layanan_spbe` (`id`, `id_jenis_layanan`, `id_kebutuhan`, `is_eksternal`, `tahunanggaran`, `nama_pemohon`, `periode`, `noreg`, `id_instansi`, `nama_instansi`, `unitkerja`, `lokasi`, `id_pemohon`, `nama_penanggungjawab`, `nip_penanggungjawab`, `nohp_penanggungjawab`, `jabatan_penanggungjawab`, `unitkerja_penanggungjawab`, `email_penanggungjawab`, `ket`, `tgl_permohonan`, `nama_kebutuhan`, `berkas`, `status`, `inputby`, `tglinput`, `status_ver`, `verby`, `tglver`, `nover`, `ketver`, `berkasver`, `status_tl`, `tl_by`, `tgl_tl`, `created_at`, `updated_at`, `deleted_at`) VALUES
(26, 4, '[\"2\", \"3\", \"4\"]', 'Tidak', '2026', NULL, 'Triwulan 2', 'REG-20260507-003', 11, 'BIRO HUMAS DAN PROTOKOL', 'e-gov', 'jalan maya 12', 10, 'mayy', '198810202015032013', '0895417380191', 'kepala bai', NULL, 'mayy@gmail.com', '\"tessss Segera lakukan investigasi menyeluruh terkait laporan penurunan performa server pada cluster B. Pastikan petugas yang ditunjuk melakukan audit log dalam 24 jam terakhir dan laporkan hasilnya sebelum jam rapat sore ini. Koordinasikan dengan tim IT Support jika ditemukan anomali pada hardware.\"', '2026-05-07', 'tess ajaa nyube', '1778135705_SERTIF_SEM_5.pdf', '2', 'gan asn', '2026-05-07', '2', 'wijaya petugas', '2026-06-03', NULL, 'asdasd', 'ver_1780456259_doa_via_.pdf', '2', '45', '2026-05-12', '2026-05-06 23:35:05', '2026-06-02 20:10:59', NULL),
(27, 4, '[\"2\", \"3\", \"4\"]', 'Tidak', '2026', NULL, 'Triwulan 2', 'REG-20260603-001', 11, 'BIRO HUMAS DAN PROTOKOL', 'e-gov', 'jalan maya', 10, 'royy', '198810202015032013', '0895417380191', 'kepala saja', NULL, 'royy@gmail.com', 'asdadad', '2026-06-03', 'tess cube bai', '1780462501_doa_via_.pdf', '2', 'gan asn', '2026-06-03', '2', 'wijaya petugas', '2026-06-03', NULL, 'oke lanjutkan', 'ver_1780469783_SERTIF_SEM_5.pdf', '2', '45', '2026-06-03', '2026-06-02 21:55:01', '2026-06-02 23:56:23', NULL),
(28, 4, '[\"2\", \"3\", \"4\"]', 'Tidak', '2026', NULL, 'Triwulan 2', 'REG-20260603-002', 11, 'BIRO HUMAS DAN PROTOKOL', 'e-gov', 'jalan maya1', 10, 'royys', '198810202015032013', '0895417380190', 'kepala bai', NULL, 'royy@gmail.com', 'asdasda', '2026-06-03', 'tess ajaa nyube', '1780467483_doa_via_.pdf', '1', 'gan asn', '2026-06-03', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2026-06-02 23:18:03', '2026-06-02 23:18:03', NULL),
(38, 4, '[\"2\", \"1\"]', 'Tidak', '2026', NULL, 'Triwulan 2', 'REG-20260624-001', 11, 'BIRO HUMAS DAN PROTOKOL', 'e-gov', 'jalan maya', 10, 'royys', '198810202015032015', '0895417380193', 'kepala saja', NULL, 'royy@gmail.com', 'Sistem Pemerintahan Berbasis Elektronik (SPBE) merupakan penyelenggaraan pemerintahan yang memanfaatkan teknologi informasi dan komunikasi untuk memberikan layanan kepada masyarakat secara efektif, efisien, transparan, dan akuntabel. Implementasi SPBE bertujuan untuk meningkatkan kualitas pelayanan publik, mempercepat proses administrasi, serta mendukung terwujudnya tata kelola pemerintahan yang baik (good governance). Dalam pelaksanaannya, setiap instansi pemerintah diharapkan mampu mengintegrasikan proses bisnis, data, dan layanan sehingga tercipta ekosistem digital yang terintegrasi dan berkelanjutan.', '2026-06-24', 'coba bae 1', '1782276317_Table_Diagram_SPBE_New.pdf', '1', 'gan asn', '2026-06-24', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2026-06-23 21:45:17', '2026-06-23 21:45:17', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000001_create_cache_table', 1),
(2, '2025_01_01_000001_create_websites_table', 2),
(3, '2025_01_01_000002_create_phases_table', 2),
(4, '2025_01_01_000003_create_tasks_table', 2),
(5, '2025_01_01_000004_create_website_members_table', 2),
(6, '2025_01_01_000005_create_issues_table', 2),
(7, '2025_01_01_000006_create_milestones_activity_logs_table', 2),
(9, '2026_06_03_035917_create_notifications_table', 3),
(10, '2026_06_06_053052_add_driver_and_staff_gudang_roles_to_users_table', 4),
(11, '2026_06_06_053208_create_penugasan_logistiks_table', 5),
(12, '2026_06_06_053307_create_panens_table', 6);

-- --------------------------------------------------------

--
-- Struktur dari tabel `milestones`
--

CREATE TABLE `milestones` (
  `id` bigint UNSIGNED NOT NULL,
  `website_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` enum('kickoff','design_approval','staging_launch','uat_start','uat_approval','go_live','handover','custom') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'custom',
  `target_date` date NOT NULL,
  `actual_date` date DEFAULT NULL,
  `is_achieved` tinyint(1) NOT NULL DEFAULT '0',
  `phase_order` tinyint UNSIGNED DEFAULT NULL,
  `notes` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `milestones`
--

INSERT INTO `milestones` (`id`, `website_id`, `name`, `type`, `target_date`, `actual_date`, `is_achieved`, `phase_order`, `notes`, `created_at`, `updated_at`) VALUES
(7, 4, 'Kickoff Meeting', 'kickoff', '2025-09-22', '2025-09-21', 1, 1, NULL, '2026-02-24 08:31:50', '2026-02-24 08:31:50'),
(8, 4, 'Design Approval', 'design_approval', '2025-11-10', '2025-11-15', 1, 2, NULL, '2026-02-24 08:31:50', '2026-02-24 08:31:50'),
(9, 4, 'Staging Online', 'staging_launch', '2025-12-26', '2025-12-24', 1, 4, NULL, '2026-02-24 08:31:50', '2026-02-24 08:31:50'),
(10, 4, 'Mulai UAT', 'uat_start', '2026-02-12', '2026-02-09', 1, 6, NULL, '2026-02-24 08:31:50', '2026-02-24 08:31:50'),
(11, 4, 'Approval UAT', 'uat_approval', '2026-03-11', '2026-03-10', 1, 7, NULL, '2026-02-24 08:31:50', '2026-02-24 08:31:50'),
(12, 4, '? Go-Live', 'go_live', '2026-03-24', '2026-03-21', 1, 7, NULL, '2026-02-24 08:31:50', '2026-02-24 08:31:50'),
(13, 5, 'Kickoff Meeting', 'kickoff', '2025-11-26', '2025-11-27', 1, 1, NULL, '2026-02-24 08:31:50', '2026-02-24 08:31:50'),
(14, 5, 'Design Approval', 'design_approval', '2026-01-14', '2026-01-12', 1, 2, NULL, '2026-02-24 08:31:50', '2026-02-24 08:31:50'),
(15, 5, 'Staging Online', 'staging_launch', '2026-03-03', '2026-02-28', 1, 4, NULL, '2026-02-24 08:31:50', '2026-02-24 08:31:50'),
(16, 5, 'Mulai UAT', 'uat_start', '2026-04-20', NULL, 0, 6, NULL, '2026-02-24 08:31:50', '2026-02-24 08:31:50'),
(17, 5, 'Approval UAT', 'uat_approval', '2026-05-15', NULL, 0, 7, NULL, '2026-02-24 08:31:50', '2026-02-24 08:31:50'),
(18, 5, '? Go-Live', 'go_live', '2026-05-28', NULL, 0, 7, NULL, '2026-02-24 08:31:50', '2026-02-24 08:31:50'),
(19, 6, 'Kickoff Meeting', 'kickoff', '2025-12-06', '2025-12-07', 1, 1, NULL, '2026-02-24 08:31:50', '2026-02-24 08:31:50'),
(20, 6, 'Design Approval', 'design_approval', '2026-01-23', '2026-01-23', 1, 2, NULL, '2026-02-24 08:31:50', '2026-02-24 08:31:50'),
(21, 6, 'Staging Online', 'staging_launch', '2026-03-12', '2026-03-16', 1, 4, NULL, '2026-02-24 08:31:50', '2026-02-24 08:31:50'),
(22, 6, 'Mulai UAT', 'uat_start', '2026-04-29', NULL, 0, 6, NULL, '2026-02-24 08:31:50', '2026-02-24 08:31:50'),
(23, 6, 'Approval UAT', 'uat_approval', '2026-05-26', NULL, 0, 7, NULL, '2026-02-24 08:31:50', '2026-02-24 08:31:50'),
(24, 6, '? Go-Live', 'go_live', '2026-06-08', NULL, 0, 7, NULL, '2026-02-24 08:31:50', '2026-02-24 08:31:50'),
(25, 7, 'Kickoff Meeting', 'kickoff', '2025-12-26', '2025-12-28', 1, 1, NULL, '2026-02-24 08:31:50', '2026-02-24 08:31:50'),
(26, 7, 'Design Approval', 'design_approval', '2026-02-13', '2026-02-12', 1, 2, NULL, '2026-02-24 08:31:50', '2026-02-24 08:31:50'),
(27, 7, 'Staging Online', 'staging_launch', '2026-04-02', NULL, 0, 4, NULL, '2026-02-24 08:31:50', '2026-02-24 08:31:50'),
(28, 7, 'Mulai UAT', 'uat_start', '2026-05-20', NULL, 0, 6, NULL, '2026-02-24 08:31:50', '2026-02-24 08:31:50'),
(29, 7, 'Approval UAT', 'uat_approval', '2026-06-16', NULL, 0, 7, NULL, '2026-02-24 08:31:50', '2026-02-24 08:31:50'),
(30, 7, '? Go-Live', 'go_live', '2026-06-29', NULL, 0, 7, NULL, '2026-02-24 08:31:51', '2026-02-24 08:31:51'),
(31, 8, 'Kickoff Meeting', 'kickoff', '2025-10-27', '2025-10-24', 1, 1, NULL, '2026-02-24 08:31:51', '2026-02-24 08:31:51'),
(32, 8, 'Design Approval', 'design_approval', '2025-12-15', '2025-12-15', 1, 2, NULL, '2026-02-24 08:31:51', '2026-02-24 08:31:51'),
(33, 8, 'Staging Online', 'staging_launch', '2026-01-30', '2026-01-28', 1, 4, NULL, '2026-02-24 08:31:51', '2026-02-24 08:31:51'),
(34, 8, 'Mulai UAT', 'uat_start', '2026-03-19', '2026-03-21', 1, 6, NULL, '2026-02-24 08:31:51', '2026-02-24 08:31:51'),
(35, 8, 'Approval UAT', 'uat_approval', '2026-04-15', NULL, 0, 7, NULL, '2026-02-24 08:31:51', '2026-02-24 08:31:51'),
(36, 8, '? Go-Live', 'go_live', '2026-04-28', NULL, 0, 7, NULL, '2026-02-24 08:31:51', '2026-02-24 08:31:51'),
(37, 9, 'Kickoff Meeting', 'kickoff', '2026-01-03', '2026-01-04', 1, 1, NULL, '2026-02-24 08:31:51', '2026-02-24 08:31:51'),
(38, 9, 'Design Approval', 'design_approval', '2026-02-20', '2026-02-22', 1, 2, NULL, '2026-02-24 08:31:51', '2026-02-24 08:31:51'),
(39, 9, 'Staging Online', 'staging_launch', '2026-04-09', NULL, 0, 4, NULL, '2026-02-24 08:31:51', '2026-02-24 08:31:51'),
(40, 9, 'Mulai UAT', 'uat_start', '2026-05-27', NULL, 0, 6, NULL, '2026-02-24 08:31:51', '2026-02-24 08:31:51'),
(41, 9, 'Approval UAT', 'uat_approval', '2026-06-23', NULL, 0, 7, NULL, '2026-02-24 08:31:51', '2026-02-24 08:31:51'),
(42, 9, '? Go-Live', 'go_live', '2026-07-06', NULL, 0, 7, NULL, '2026-02-24 08:31:51', '2026-02-24 08:31:51'),
(43, 10, 'Kickoff Meeting', 'kickoff', '2026-02-04', '2026-02-01', 1, 1, NULL, '2026-02-24 08:31:51', '2026-02-24 08:31:51'),
(44, 10, 'Design Approval', 'design_approval', '2026-03-25', NULL, 0, 2, NULL, '2026-02-24 08:31:51', '2026-02-24 08:31:51'),
(45, 10, 'Staging Online', 'staging_launch', '2026-05-12', NULL, 0, 4, NULL, '2026-02-24 08:31:51', '2026-02-24 08:31:51'),
(46, 10, 'Mulai UAT', 'uat_start', '2026-06-29', NULL, 0, 6, NULL, '2026-02-24 08:31:51', '2026-02-24 08:31:51'),
(47, 10, 'Approval UAT', 'uat_approval', '2026-07-24', NULL, 0, 7, NULL, '2026-02-24 08:31:51', '2026-02-24 08:31:51'),
(48, 10, '? Go-Live', 'go_live', '2026-08-06', NULL, 0, 7, NULL, '2026-02-24 08:31:51', '2026-02-24 08:31:51'),
(49, 11, 'Kickoff Meeting', 'kickoff', '2025-12-14', '2025-12-17', 1, 1, NULL, '2026-02-24 08:31:51', '2026-02-24 08:31:51'),
(50, 11, 'Design Approval', 'design_approval', '2026-01-30', '2026-02-02', 1, 2, NULL, '2026-02-24 08:31:51', '2026-02-24 08:31:51'),
(51, 11, 'Staging Online', 'staging_launch', '2026-03-19', '2026-03-16', 1, 4, NULL, '2026-02-24 08:31:51', '2026-02-24 08:31:51'),
(52, 11, 'Mulai UAT', 'uat_start', '2026-05-06', NULL, 0, 6, NULL, '2026-02-24 08:31:51', '2026-02-24 08:31:51'),
(53, 11, 'Approval UAT', 'uat_approval', '2026-06-02', NULL, 0, 7, NULL, '2026-02-24 08:31:51', '2026-02-24 08:31:51'),
(54, 11, '? Go-Live', 'go_live', '2026-06-15', NULL, 0, 7, NULL, '2026-02-24 08:31:51', '2026-02-24 08:31:51'),
(55, 12, 'Kickoff Meeting', 'kickoff', '2026-01-10', '2026-01-09', 1, 1, NULL, '2026-02-24 08:31:51', '2026-02-24 08:31:51'),
(56, 12, 'Design Approval', 'design_approval', '2026-02-27', '2026-03-02', 1, 2, NULL, '2026-02-24 08:31:51', '2026-02-24 08:31:51'),
(57, 12, 'Staging Online', 'staging_launch', '2026-04-16', NULL, 0, 4, NULL, '2026-02-24 08:31:51', '2026-02-24 08:31:51'),
(58, 12, 'Mulai UAT', 'uat_start', '2026-06-03', NULL, 0, 6, NULL, '2026-02-24 08:31:51', '2026-02-24 08:31:51'),
(59, 12, 'Approval UAT', 'uat_approval', '2026-06-30', NULL, 0, 7, NULL, '2026-02-24 08:31:51', '2026-02-24 08:31:51'),
(60, 12, '? Go-Live', 'go_live', '2026-07-13', NULL, 0, 7, NULL, '2026-02-24 08:31:51', '2026-02-24 08:31:51'),
(61, 13, 'Kickoff Meeting', 'kickoff', '2025-11-06', '2025-11-04', 1, 1, NULL, '2026-02-24 08:31:51', '2026-02-24 08:31:51'),
(62, 13, 'Design Approval', 'design_approval', '2025-12-25', '2025-12-28', 1, 2, NULL, '2026-02-24 08:31:51', '2026-02-24 08:31:51'),
(63, 13, 'Staging Online', 'staging_launch', '2026-02-11', '2026-02-09', 1, 4, NULL, '2026-02-24 08:31:51', '2026-02-24 08:31:51'),
(64, 13, 'Mulai UAT', 'uat_start', '2026-03-31', '2026-03-29', 1, 6, NULL, '2026-02-24 08:31:51', '2026-02-24 08:31:51'),
(65, 13, 'Approval UAT', 'uat_approval', '2026-04-27', '2026-04-26', 1, 7, NULL, '2026-02-24 08:31:51', '2026-02-24 08:31:51'),
(66, 13, '? Go-Live', 'go_live', '2026-05-08', '2026-05-10', 1, 7, NULL, '2026-02-24 08:31:51', '2026-02-24 08:31:51'),
(67, 14, 'Kickoff Meeting', 'kickoff', '2025-12-28', '2025-12-30', 1, 1, NULL, '2026-02-24 08:31:51', '2026-02-24 08:31:51'),
(68, 14, 'Design Approval', 'design_approval', '2026-02-13', '2026-02-13', 1, 2, NULL, '2026-02-24 08:31:51', '2026-02-24 08:31:51'),
(69, 14, 'Staging Online', 'staging_launch', '2026-04-02', NULL, 0, 4, NULL, '2026-02-24 08:31:51', '2026-02-24 08:31:51'),
(70, 14, 'Mulai UAT', 'uat_start', '2026-05-20', NULL, 0, 6, NULL, '2026-02-24 08:31:51', '2026-02-24 08:31:51'),
(71, 14, 'Approval UAT', 'uat_approval', '2026-06-16', NULL, 0, 7, NULL, '2026-02-24 08:31:51', '2026-02-24 08:31:51'),
(72, 14, '? Go-Live', 'go_live', '2026-06-29', NULL, 0, 7, NULL, '2026-02-24 08:31:51', '2026-02-24 08:31:51'),
(73, 15, 'Kickoff Meeting', 'kickoff', '2026-02-06', '2026-02-03', 1, 1, NULL, '2026-02-24 08:31:51', '2026-02-24 08:31:51'),
(74, 15, 'Design Approval', 'design_approval', '2026-03-27', NULL, 0, 2, NULL, '2026-02-24 08:31:51', '2026-02-24 08:31:51'),
(75, 15, 'Staging Online', 'staging_launch', '2026-05-14', NULL, 0, 4, NULL, '2026-02-24 08:31:51', '2026-02-24 08:31:51'),
(76, 15, 'Mulai UAT', 'uat_start', '2026-07-01', NULL, 0, 6, NULL, '2026-02-24 08:31:51', '2026-02-24 08:31:51'),
(77, 15, 'Approval UAT', 'uat_approval', '2026-07-28', NULL, 0, 7, NULL, '2026-02-24 08:31:51', '2026-02-24 08:31:51'),
(78, 15, '? Go-Live', 'go_live', '2026-08-10', NULL, 0, 7, NULL, '2026-02-24 08:31:51', '2026-02-24 08:31:51'),
(79, 16, 'Kickoff Meeting', 'kickoff', '2026-02-19', '2026-02-23', 1, 1, NULL, '2026-02-24 08:31:51', '2026-02-24 08:31:51'),
(80, 16, 'Design Approval', 'design_approval', '2026-04-09', NULL, 0, 2, NULL, '2026-02-24 08:31:51', '2026-02-24 08:31:51'),
(81, 16, 'Staging Online', 'staging_launch', '2026-05-27', NULL, 0, 4, NULL, '2026-02-24 08:31:51', '2026-02-24 08:31:51'),
(82, 16, 'Mulai UAT', 'uat_start', '2026-07-14', NULL, 0, 6, NULL, '2026-02-24 08:31:51', '2026-02-24 08:31:51'),
(83, 16, 'Approval UAT', 'uat_approval', '2026-08-10', NULL, 0, 7, NULL, '2026-02-24 08:31:51', '2026-02-24 08:31:51'),
(84, 16, '? Go-Live', 'go_live', '2026-08-21', NULL, 0, 7, NULL, '2026-02-24 08:31:51', '2026-02-24 08:31:51'),
(85, 17, 'Kickoff Meeting', 'kickoff', '2025-10-02', '2025-10-04', 1, 1, NULL, '2026-02-24 08:31:51', '2026-02-24 08:31:51'),
(86, 17, 'Design Approval', 'design_approval', '2025-11-20', '2025-11-18', 1, 2, NULL, '2026-02-24 08:31:51', '2026-02-24 08:31:51'),
(87, 17, 'Staging Online', 'staging_launch', '2026-01-07', '2026-01-07', 1, 4, NULL, '2026-02-24 08:31:51', '2026-02-24 08:31:51'),
(88, 17, 'Mulai UAT', 'uat_start', '2026-02-24', '2026-03-01', 1, 6, NULL, '2026-02-24 08:31:51', '2026-02-24 08:31:51'),
(89, 17, 'Approval UAT', 'uat_approval', '2026-03-23', '2026-03-24', 1, 7, NULL, '2026-02-24 08:31:51', '2026-02-24 08:31:51'),
(90, 17, '? Go-Live', 'go_live', '2026-04-03', '2026-04-08', 1, 7, NULL, '2026-02-24 08:31:51', '2026-02-24 08:31:51'),
(91, 18, 'Kickoff Meeting', 'kickoff', '2025-12-08', '2025-12-06', 1, 1, NULL, '2026-02-24 08:31:51', '2026-02-24 08:31:51'),
(92, 18, 'Design Approval', 'design_approval', '2026-01-26', '2026-01-29', 1, 2, NULL, '2026-02-24 08:31:52', '2026-02-24 08:31:52'),
(93, 18, 'Staging Online', 'staging_launch', '2026-03-13', '2026-03-14', 1, 4, NULL, '2026-02-24 08:31:52', '2026-02-24 08:31:52'),
(94, 18, 'Mulai UAT', 'uat_start', '2026-04-30', NULL, 0, 6, NULL, '2026-02-24 08:31:52', '2026-02-24 08:31:52'),
(95, 18, 'Approval UAT', 'uat_approval', '2026-05-27', NULL, 0, 7, NULL, '2026-02-24 08:31:52', '2026-02-24 08:31:52'),
(96, 18, '? Go-Live', 'go_live', '2026-06-09', NULL, 0, 7, NULL, '2026-02-24 08:31:52', '2026-02-24 08:31:52'),
(97, 19, 'Kickoff Meeting', 'kickoff', '2025-11-01', '2025-11-05', 1, 1, NULL, '2026-02-24 08:31:52', '2026-02-24 08:31:52'),
(98, 19, 'Design Approval', 'design_approval', '2025-12-19', '2025-12-18', 1, 2, NULL, '2026-02-24 08:31:52', '2026-02-24 08:31:52'),
(99, 19, 'Staging Online', 'staging_launch', '2026-02-05', '2026-02-07', 1, 4, NULL, '2026-02-24 08:31:52', '2026-02-24 08:31:52'),
(100, 19, 'Mulai UAT', 'uat_start', '2026-03-25', '2026-03-28', 1, 6, NULL, '2026-02-24 08:31:52', '2026-02-24 08:31:52'),
(101, 19, 'Approval UAT', 'uat_approval', '2026-04-21', NULL, 0, 7, NULL, '2026-02-24 08:31:52', '2026-02-24 08:31:52'),
(102, 19, '? Go-Live', 'go_live', '2026-05-04', NULL, 0, 7, NULL, '2026-02-24 08:31:52', '2026-02-24 08:31:52'),
(103, 20, 'Kickoff Meeting', 'kickoff', '2026-01-05', '2026-01-02', 1, 1, NULL, '2026-02-24 08:31:52', '2026-02-24 08:31:52'),
(104, 20, 'Design Approval', 'design_approval', '2026-02-23', '2026-02-25', 1, 2, NULL, '2026-02-24 08:31:52', '2026-02-24 08:31:52'),
(105, 20, 'Staging Online', 'staging_launch', '2026-04-10', NULL, 0, 4, NULL, '2026-02-24 08:31:52', '2026-02-24 08:31:52'),
(106, 20, 'Mulai UAT', 'uat_start', '2026-05-28', NULL, 0, 6, NULL, '2026-02-24 08:31:52', '2026-02-24 08:31:52'),
(107, 20, 'Approval UAT', 'uat_approval', '2026-06-24', NULL, 0, 7, NULL, '2026-02-24 08:31:52', '2026-02-24 08:31:52'),
(108, 20, '? Go-Live', 'go_live', '2026-07-07', NULL, 0, 7, NULL, '2026-02-24 08:31:52', '2026-02-24 08:31:52'),
(109, 21, 'Kickoff Meeting', 'kickoff', '2025-12-21', '2025-12-25', 1, 1, NULL, '2026-02-24 08:31:52', '2026-02-24 08:31:52'),
(110, 21, 'Design Approval', 'design_approval', '2026-02-06', '2026-02-03', 1, 2, NULL, '2026-02-24 08:31:52', '2026-02-24 08:31:52'),
(111, 21, 'Staging Online', 'staging_launch', '2026-03-26', '2026-03-24', 1, 4, NULL, '2026-02-24 08:31:52', '2026-02-24 08:31:52'),
(112, 21, 'Mulai UAT', 'uat_start', '2026-05-13', NULL, 0, 6, NULL, '2026-02-24 08:31:52', '2026-02-24 08:31:52'),
(113, 21, 'Approval UAT', 'uat_approval', '2026-06-09', NULL, 0, 7, NULL, '2026-02-24 08:31:52', '2026-02-24 08:31:52'),
(114, 21, '? Go-Live', 'go_live', '2026-06-22', NULL, 0, 7, NULL, '2026-02-24 08:31:52', '2026-02-24 08:31:52'),
(115, 22, 'Kickoff Meeting', 'kickoff', '2026-01-11', '2026-01-12', 1, 1, NULL, '2026-02-24 08:31:52', '2026-02-24 08:31:52'),
(116, 22, 'Design Approval', 'design_approval', '2026-02-27', '2026-02-27', 1, 2, NULL, '2026-02-24 08:31:52', '2026-02-24 08:31:52'),
(117, 22, 'Staging Online', 'staging_launch', '2026-04-16', NULL, 0, 4, NULL, '2026-02-24 08:31:52', '2026-02-24 08:31:52'),
(118, 22, 'Mulai UAT', 'uat_start', '2026-06-03', NULL, 0, 6, NULL, '2026-02-24 08:31:52', '2026-02-24 08:31:52'),
(119, 22, 'Approval UAT', 'uat_approval', '2026-06-30', NULL, 0, 7, NULL, '2026-02-24 08:31:52', '2026-02-24 08:31:52'),
(120, 22, '? Go-Live', 'go_live', '2026-07-13', NULL, 0, 7, NULL, '2026-02-24 08:31:52', '2026-02-24 08:31:52'),
(121, 23, 'Kickoff Meeting', 'kickoff', '2026-02-12', '2026-02-17', 1, 1, NULL, '2026-02-24 08:31:52', '2026-02-24 08:31:52'),
(122, 23, 'Design Approval', 'design_approval', '2026-04-02', NULL, 0, 2, NULL, '2026-02-24 08:31:52', '2026-02-24 08:31:52'),
(123, 23, 'Staging Online', 'staging_launch', '2026-05-20', NULL, 0, 4, NULL, '2026-02-24 08:31:52', '2026-02-24 08:31:52'),
(124, 23, 'Mulai UAT', 'uat_start', '2026-07-07', NULL, 0, 6, NULL, '2026-02-24 08:31:52', '2026-02-24 08:31:52'),
(125, 23, 'Approval UAT', 'uat_approval', '2026-08-03', NULL, 0, 7, NULL, '2026-02-24 08:31:52', '2026-02-24 08:31:52'),
(126, 23, '? Go-Live', 'go_live', '2026-08-14', NULL, 0, 7, NULL, '2026-02-24 08:31:52', '2026-02-24 08:31:52'),
(127, 24, 'Kickoff Meeting', 'kickoff', '2025-09-12', '2025-09-11', 1, 1, NULL, '2026-02-24 08:31:52', '2026-02-24 08:31:52'),
(128, 24, 'Design Approval', 'design_approval', '2025-10-31', '2025-10-31', 1, 2, NULL, '2026-02-24 08:31:52', '2026-02-24 08:31:52'),
(129, 24, 'Staging Online', 'staging_launch', '2025-12-18', '2025-12-19', 1, 4, NULL, '2026-02-24 08:31:52', '2026-02-24 08:31:52'),
(130, 24, 'Mulai UAT', 'uat_start', '2026-02-04', '2026-02-06', 1, 6, NULL, '2026-02-24 08:31:52', '2026-02-24 08:31:52'),
(131, 24, 'Approval UAT', 'uat_approval', '2026-03-03', '2026-03-01', 1, 7, NULL, '2026-02-24 08:31:52', '2026-02-24 08:31:52'),
(132, 24, '? Go-Live', 'go_live', '2026-03-16', '2026-03-15', 1, 7, NULL, '2026-02-24 08:31:52', '2026-02-24 08:31:52'),
(133, 25, 'Kickoff Meeting', 'kickoff', '2026-01-17', '2026-01-20', 1, 1, NULL, '2026-02-24 08:31:52', '2026-02-24 08:31:52'),
(134, 25, 'Design Approval', 'design_approval', '2026-03-06', '2026-03-09', 1, 2, NULL, '2026-02-24 08:31:52', '2026-02-24 08:31:52'),
(135, 25, 'Staging Online', 'staging_launch', '2026-04-23', NULL, 0, 4, NULL, '2026-02-24 08:31:52', '2026-02-24 08:31:52'),
(136, 25, 'Mulai UAT', 'uat_start', '2026-06-10', NULL, 0, 6, NULL, '2026-02-24 08:31:52', '2026-02-24 08:31:52'),
(137, 25, 'Approval UAT', 'uat_approval', '2026-07-07', NULL, 0, 7, NULL, '2026-02-24 08:31:52', '2026-02-24 08:31:52'),
(138, 25, '? Go-Live', 'go_live', '2026-07-20', NULL, 0, 7, NULL, '2026-02-24 08:31:52', '2026-02-24 08:31:52'),
(139, 26, 'Kickoff Meeting', 'kickoff', '2025-10-15', '2025-10-15', 1, 1, NULL, '2026-02-24 08:31:52', '2026-02-24 08:31:52'),
(140, 26, 'Design Approval', 'design_approval', '2025-12-03', '2025-12-06', 1, 2, NULL, '2026-02-24 08:31:52', '2026-02-24 08:31:52'),
(141, 26, 'Staging Online', 'staging_launch', '2026-01-20', '2026-01-18', 1, 4, NULL, '2026-02-24 08:31:52', '2026-02-24 08:31:52'),
(142, 26, 'Mulai UAT', 'uat_start', '2026-03-09', '2026-03-12', 1, 6, NULL, '2026-02-24 08:31:52', '2026-02-24 08:31:52'),
(143, 26, 'Approval UAT', 'uat_approval', '2026-04-03', '2026-04-05', 1, 7, NULL, '2026-02-24 08:31:52', '2026-02-24 08:31:52'),
(144, 26, '? Go-Live', 'go_live', '2026-04-16', NULL, 0, 7, NULL, '2026-02-24 08:31:52', '2026-02-24 08:31:52'),
(145, 27, 'Kickoff Meeting', 'kickoff', '2025-12-31', '2025-12-28', 1, 1, NULL, '2026-02-24 08:31:52', '2026-02-24 08:31:52'),
(146, 27, 'Design Approval', 'design_approval', '2026-02-18', '2026-02-19', 1, 2, NULL, '2026-02-24 08:31:52', '2026-02-24 08:31:52'),
(147, 27, 'Staging Online', 'staging_launch', '2026-04-07', NULL, 0, 4, NULL, '2026-02-24 08:31:52', '2026-02-24 08:31:52'),
(148, 27, 'Mulai UAT', 'uat_start', '2026-05-25', NULL, 0, 6, NULL, '2026-02-24 08:31:52', '2026-02-24 08:31:52'),
(149, 27, 'Approval UAT', 'uat_approval', '2026-06-19', NULL, 0, 7, NULL, '2026-02-24 08:31:52', '2026-02-24 08:31:52'),
(150, 27, '? Go-Live', 'go_live', '2026-07-02', NULL, 0, 7, NULL, '2026-02-24 08:31:52', '2026-02-24 08:31:52'),
(151, 28, 'Kickoff Meeting', 'kickoff', '2025-11-28', '2025-11-29', 1, 1, NULL, '2026-02-24 08:31:52', '2026-02-24 08:31:52'),
(152, 28, 'Design Approval', 'design_approval', '2026-01-16', '2026-01-17', 1, 2, NULL, '2026-02-24 08:31:52', '2026-02-24 08:31:52'),
(153, 28, 'Staging Online', 'staging_launch', '2026-03-05', '2026-03-08', 1, 4, NULL, '2026-02-24 08:31:52', '2026-02-24 08:31:52'),
(154, 28, 'Mulai UAT', 'uat_start', '2026-04-22', NULL, 0, 6, NULL, '2026-02-24 08:31:52', '2026-02-24 08:31:52'),
(155, 28, 'Approval UAT', 'uat_approval', '2026-05-19', NULL, 0, 7, NULL, '2026-02-24 08:31:52', '2026-02-24 08:31:52'),
(156, 28, '? Go-Live', 'go_live', '2026-06-01', NULL, 0, 7, NULL, '2026-02-24 08:31:52', '2026-02-24 08:31:52'),
(157, 29, 'Kickoff Meeting', 'kickoff', '2026-02-16', '2026-02-19', 1, 1, NULL, '2026-02-24 08:31:53', '2026-02-24 08:31:53'),
(158, 29, 'Design Approval', 'design_approval', '2026-04-06', NULL, 0, 2, NULL, '2026-02-24 08:31:53', '2026-02-24 08:31:53'),
(159, 29, 'Staging Online', 'staging_launch', '2026-05-22', NULL, 0, 4, NULL, '2026-02-24 08:31:53', '2026-02-24 08:31:53'),
(160, 29, 'Mulai UAT', 'uat_start', '2026-07-09', NULL, 0, 6, NULL, '2026-02-24 08:31:53', '2026-02-24 08:31:53'),
(161, 29, 'Approval UAT', 'uat_approval', '2026-08-05', NULL, 0, 7, NULL, '2026-02-24 08:31:53', '2026-02-24 08:31:53'),
(162, 29, '? Go-Live', 'go_live', '2026-08-18', NULL, 0, 7, NULL, '2026-02-24 08:31:53', '2026-02-24 08:31:53'),
(163, 30, 'Kickoff Meeting', 'kickoff', '2025-08-23', '2025-08-22', 1, 1, NULL, '2026-02-24 08:31:53', '2026-02-24 08:31:53'),
(164, 30, 'Design Approval', 'design_approval', '2025-10-10', '2025-10-11', 1, 2, NULL, '2026-02-24 08:31:53', '2026-02-24 08:31:53'),
(165, 30, 'Staging Online', 'staging_launch', '2025-11-27', '2025-11-30', 1, 4, NULL, '2026-02-24 08:31:53', '2026-02-24 08:31:53'),
(166, 30, 'Mulai UAT', 'uat_start', '2026-01-14', '2026-01-18', 1, 6, NULL, '2026-02-24 08:31:53', '2026-02-24 08:31:53'),
(167, 30, 'Approval UAT', 'uat_approval', '2026-02-10', '2026-02-15', 1, 7, NULL, '2026-02-24 08:31:53', '2026-02-24 08:31:53'),
(168, 30, '? Go-Live', 'go_live', '2026-02-23', '2026-02-28', 1, 7, NULL, '2026-02-24 08:31:53', '2026-02-24 08:31:53'),
(169, 31, 'Kickoff Meeting', 'kickoff', '2025-12-11', '2025-12-09', 1, 1, NULL, '2026-02-24 08:31:53', '2026-02-24 08:31:53'),
(170, 31, 'Design Approval', 'design_approval', '2026-01-29', '2026-01-31', 1, 2, NULL, '2026-02-24 08:31:53', '2026-02-24 08:31:53'),
(171, 31, 'Staging Online', 'staging_launch', '2026-03-18', '2026-03-19', 1, 4, NULL, '2026-02-24 08:31:53', '2026-02-24 08:31:53'),
(172, 31, 'Mulai UAT', 'uat_start', '2026-05-05', NULL, 0, 6, NULL, '2026-02-24 08:31:53', '2026-02-24 08:31:53'),
(173, 31, 'Approval UAT', 'uat_approval', '2026-06-01', NULL, 0, 7, NULL, '2026-02-24 08:31:53', '2026-02-24 08:31:53'),
(174, 31, '? Go-Live', 'go_live', '2026-06-12', NULL, 0, 7, NULL, '2026-02-24 08:31:53', '2026-02-24 08:31:53'),
(175, 32, 'Kickoff Meeting', 'kickoff', '2025-12-26', '2025-12-30', 1, 1, NULL, '2026-02-24 08:31:53', '2026-02-24 08:31:53'),
(176, 32, 'Design Approval', 'design_approval', '2026-02-13', '2026-02-10', 1, 2, NULL, '2026-02-24 08:31:53', '2026-02-24 08:31:53'),
(177, 32, 'Staging Online', 'staging_launch', '2026-04-02', NULL, 0, 4, NULL, '2026-02-24 08:31:53', '2026-02-24 08:31:53'),
(178, 32, 'Mulai UAT', 'uat_start', '2026-05-20', NULL, 0, 6, NULL, '2026-02-24 08:31:53', '2026-02-24 08:31:53'),
(179, 32, 'Approval UAT', 'uat_approval', '2026-06-16', NULL, 0, 7, NULL, '2026-02-24 08:31:53', '2026-02-24 08:31:53'),
(180, 32, '? Go-Live', 'go_live', '2026-06-29', NULL, 0, 7, NULL, '2026-02-24 08:31:53', '2026-02-24 08:31:53'),
(181, 33, 'Kickoff Meeting', 'kickoff', '2026-02-21', '2026-02-19', 1, 1, NULL, '2026-02-24 08:31:53', '2026-02-24 08:31:53'),
(182, 33, 'Design Approval', 'design_approval', '2026-04-10', NULL, 0, 2, NULL, '2026-02-24 08:31:53', '2026-02-24 08:31:53'),
(183, 33, 'Staging Online', 'staging_launch', '2026-05-28', NULL, 0, 4, NULL, '2026-02-24 08:31:53', '2026-02-24 08:31:53'),
(184, 33, 'Mulai UAT', 'uat_start', '2026-07-15', NULL, 0, 6, NULL, '2026-02-24 08:31:53', '2026-02-24 08:31:53'),
(185, 33, 'Approval UAT', 'uat_approval', '2026-08-11', NULL, 0, 7, NULL, '2026-02-24 08:31:53', '2026-02-24 08:31:53'),
(186, 33, '? Go-Live', 'go_live', '2026-08-24', NULL, 0, 7, NULL, '2026-02-24 08:31:53', '2026-02-24 08:31:53');

-- --------------------------------------------------------

--
-- Struktur dari tabel `notifications`
--

CREATE TABLE `notifications` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `pemohon_id` bigint DEFAULT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `related_id` bigint UNSIGNED DEFAULT NULL,
  `related_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_read` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `notifications`
--

INSERT INTO `notifications` (`id`, `user_id`, `pemohon_id`, `type`, `message`, `related_id`, `related_type`, `is_read`, `created_at`, `updated_at`) VALUES
(1, 47, NULL, 'new_mandate', 'Anda mendapat tugas baru untuk permohonan No. REG-20260603-001 - tess cube bai', 24, 'tindak_lanjut', 0, '2026-06-02 22:40:19', '2026-06-02 22:40:19'),
(2, 49, NULL, 'new_mandate', 'Anda mendapat tugas baru untuk permohonan No. REG-20260603-001 - tess cube bai', 24, 'tindak_lanjut', 1, '2026-06-02 22:40:19', '2026-06-02 23:37:41'),
(3, NULL, 10, 'status_completed', 'Permohonan Anda dengan nomor registrasi REG-20260603-001 telah selesai ditindaklanjuti.', 27, 'layanan_spbe', 1, '2026-06-02 23:56:23', '2026-06-16 23:54:32');

-- --------------------------------------------------------

--
-- Struktur dari tabel `panens`
--

CREATE TABLE `panens` (
  `id` bigint UNSIGNED NOT NULL,
  `tanggal_panen` date NOT NULL,
  `lokasi_kebun_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tenaga_pemanen_id` bigint UNSIGNED NOT NULL,
  `jumlah` int NOT NULL,
  `keterangan` text COLLATE utf8mb4_unicode_ci,
  `status` enum('Pending','Proses','Selesai') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pemohon`
--

CREATE TABLE `pemohon` (
  `id` bigint NOT NULL,
  `id_instansi` bigint DEFAULT NULL,
  `nik` varchar(255) NOT NULL,
  `nama_lengkap` varchar(255) NOT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `jenis_pemohon` enum('internal','eksternal') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `username` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `no_hp` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `nip` varchar(255) DEFAULT NULL,
  `jabatan` varchar(255) DEFAULT NULL,
  `unit_kerja` varchar(255) DEFAULT NULL,
  `alamat` text,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `pemohon`
--

INSERT INTO `pemohon` (`id`, `id_instansi`, `nik`, `nama_lengkap`, `avatar`, `jenis_pemohon`, `username`, `no_hp`, `email`, `email_verified_at`, `nip`, `jabatan`, `unit_kerja`, `alamat`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(8, NULL, '1901399292920002', 'Muhammad Hilal', NULL, 'eksternal', 'hilal', '08123456789', 'hilal@gmail.com', NULL, NULL, NULL, NULL, NULL, '$2y$12$7XYFz8vw7oLNpPyIUT6tauIZTFIaTWl4wKhTQkiXxGPjTdcVrabY2', NULL, '2026-04-28 21:48:04', '2026-04-28 21:48:04'),
(9, NULL, '1901399292920003', 'Dahrul Ulum', NULL, 'internal', 'dahrul', '089876543210', 'dahrul@gmail.com', NULL, '1234567890', 'Kepala Dinas', 'Dinas Tenaga Kerja', NULL, '$2y$12$cfB77FFl2GZcgUkHret2p.DhEL1x6hriBe9FfaX4mZSLNy6gFl0O.', NULL, '2026-04-28 21:48:05', '2026-04-28 21:48:05'),
(10, 11, '3175092301940001', 'gan asn', '1781678871_images.jpg', 'internal', NULL, '0895417380105', 'ganasn@gmail.com', NULL, '123312312313131234', NULL, NULL, NULL, '$2y$12$FeaY1HJNvJ.gfCwL3G3Lp.f6JRPHuYU3xwRFqiC3InD3WmCv6XbZi', 'lQzWjYk72PwAbNIN5dw92yZtUP5AftrEqvauNP8X0XWYTFndVqRXIE3ROKOb', '2026-05-05 21:06:31', '2026-06-16 23:47:51');

-- --------------------------------------------------------

--
-- Struktur dari tabel `phases`
--

CREATE TABLE `phases` (
  `id` bigint UNSIGNED NOT NULL,
  `website_id` bigint UNSIGNED NOT NULL,
  `phase_order` tinyint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `color` varchar(7) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '#6366f1',
  `planned_start` date DEFAULT NULL,
  `planned_end` date DEFAULT NULL,
  `actual_start` date DEFAULT NULL,
  `actual_end` date DEFAULT NULL,
  `estimated_days` smallint UNSIGNED DEFAULT NULL,
  `status` enum('pending','in_progress','review','completed','skipped','blocked') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `progress` tinyint UNSIGNED NOT NULL DEFAULT '0',
  `pic_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `assigned_team` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deliverables` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin,
  `notes` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `blockers` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `is_overdue` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `phases`
--

INSERT INTO `phases` (`id`, `website_id`, `phase_order`, `name`, `description`, `color`, `planned_start`, `planned_end`, `actual_start`, `actual_end`, `estimated_days`, `status`, `progress`, `pic_name`, `assigned_team`, `deliverables`, `notes`, `blockers`, `is_overdue`, `created_at`, `updated_at`) VALUES
(15, 4, 1, 'Perencanaan & Analisis', 'Analisis kebutuhan, audit website lama, penentuan scope, pembuatan dokumen spesifikasi, dan approval stakeholder.', '#8b5cf6', '2025-09-22', '2025-10-10', '2025-09-22', '2025-10-10', 14, 'completed', 100, NULL, NULL, '[{\"name\":\"Dokumen analisis kebutuhan\",\"is_done\":true},{\"name\":\"Hasil audit website lama\",\"is_done\":true},{\"name\":\"Dokumen scope & spesifikasi proyek\",\"is_done\":true},{\"name\":\"Estimasi waktu & anggaran\",\"is_done\":true},{\"name\":\"Sign-off stakeholder\",\"is_done\":true}]', NULL, NULL, 0, '2026-02-24 08:31:50', '2026-02-24 08:31:50'),
(16, 4, 2, 'Desain UI/UX', 'Wireframing, prototyping interaktif, pembuatan design system, mockup desktop & mobile, serta review dan approval desain final.', '#ec4899', '2025-10-10', '2025-11-10', '2025-10-10', NULL, 21, 'in_progress', 100, NULL, NULL, '[{\"name\":\"Wireframe semua halaman utama\",\"is_done\":true},{\"name\":\"Moodboard & style guide\",\"is_done\":true},{\"name\":\"Mockup desktop high-fidelity\",\"is_done\":true},{\"name\":\"Mockup mobile high-fidelity\",\"is_done\":true},{\"name\":\"Design system & component library\",\"is_done\":true},{\"name\":\"Prototype interaktif (Figma)\",\"is_done\":true},{\"name\":\"Design approval dari klien\",\"is_done\":true}]', NULL, NULL, 0, '2026-02-24 08:31:50', '2026-02-24 08:31:50'),
(17, 4, 3, 'Setup Infrastruktur', 'Provisioning server, konfigurasi domain & SSL, setup CI/CD pipeline, environment staging, serta monitoring dan logging.', '#f59e0b', '2025-11-10', '2025-11-24', NULL, NULL, 10, 'pending', 0, NULL, NULL, '[{\"name\":\"Server live & staging aktif\",\"is_done\":false},{\"name\":\"Domain & SSL terkonfigurasi\",\"is_done\":false},{\"name\":\"CI\\/CD pipeline berjalan\",\"is_done\":false},{\"name\":\"Environment staging siap\",\"is_done\":false},{\"name\":\"Monitoring & alerting aktif\",\"is_done\":false}]', NULL, NULL, 0, '2026-02-24 08:31:50', '2026-02-24 08:31:50'),
(18, 4, 4, 'Pengembangan Frontend', 'Implementasi antarmuka berdasarkan desain yang disetujui: komponen UI, halaman-halaman utama, responsiveness, aksesibilitas, dan optimasi performa.', '#06b6d4', '2025-11-24', '2026-01-05', NULL, NULL, 30, 'pending', 0, NULL, NULL, '[{\"name\":\"Setup framework & struktur proyek\",\"is_done\":false},{\"name\":\"Komponen UI reusable\",\"is_done\":false},{\"name\":\"Halaman Beranda\",\"is_done\":false},{\"name\":\"Halaman-halaman dalam (sesuai sitemap)\",\"is_done\":false},{\"name\":\"Responsiveness mobile & tablet\",\"is_done\":false},{\"name\":\"Aksesibilitas (WCAG 2.1)\",\"is_done\":false},{\"name\":\"Optimasi performa (Lighthouse \\u226590)\",\"is_done\":false}]', NULL, NULL, 0, '2026-02-24 08:31:50', '2026-02-24 08:31:50'),
(19, 4, 5, 'Pengembangan Backend & API', 'Pengembangan API, integrasi CMS/database, sistem autentikasi, manajemen media, dan integrasi layanan pihak ketiga.', '#10b981', '2026-01-05', '2026-02-12', NULL, NULL, 28, 'pending', 0, NULL, NULL, '[{\"name\":\"Setup backend framework & database\",\"is_done\":false},{\"name\":\"REST API endpoint lengkap\",\"is_done\":false},{\"name\":\"Sistem autentikasi & otorisasi\",\"is_done\":false},{\"name\":\"Integrasi CMS \\/ headless CMS\",\"is_done\":false},{\"name\":\"Manajemen media (upload, resize)\",\"is_done\":false},{\"name\":\"Integrasi email \\/ notifikasi\",\"is_done\":false},{\"name\":\"Integrasi layanan 3rd party\",\"is_done\":false}]', NULL, NULL, 0, '2026-02-24 08:31:50', '2026-02-24 08:31:50'),
(20, 4, 6, 'Pengujian & QA', 'Unit testing, integration testing, UAT bersama klien, performance testing, security audit, cross-browser testing, dan bug fixing.', '#f97316', '2026-02-12', '2026-03-10', NULL, NULL, 18, 'pending', 0, NULL, NULL, '[{\"name\":\"Unit & integration testing selesai\",\"is_done\":false},{\"name\":\"UAT bersama klien selesai\",\"is_done\":false},{\"name\":\"Performance testing (load & stress)\",\"is_done\":false},{\"name\":\"Security audit & penetration test\",\"is_done\":false},{\"name\":\"Cross-browser & device testing\",\"is_done\":false},{\"name\":\"Semua bug critical & high terselesaikan\",\"is_done\":false},{\"name\":\"Sign-off UAT dari klien\",\"is_done\":false}]', NULL, NULL, 0, '2026-02-24 08:31:50', '2026-02-24 08:31:50'),
(21, 4, 7, 'Go-Live & Pemeliharaan', 'Deployment ke produksi, migrasi data & konten, DNS cutover, monitoring pasca-launch, pelatihan tim klien, dan serah terima dokumentasi.', '#14b8a6', '2026-03-10', '2026-03-24', NULL, NULL, 10, 'pending', 0, NULL, NULL, '[{\"name\":\"Deployment produksi berhasil\",\"is_done\":false},{\"name\":\"Migrasi data & konten selesai\",\"is_done\":false},{\"name\":\"DNS cutover & monitoring\",\"is_done\":false},{\"name\":\"Website live & berjalan normal\",\"is_done\":false},{\"name\":\"Pelatihan tim klien\",\"is_done\":false},{\"name\":\"Dokumentasi teknis & manual\",\"is_done\":false},{\"name\":\"Serah terima akses & aset\",\"is_done\":false}]', NULL, NULL, 0, '2026-02-24 08:31:50', '2026-02-24 08:31:50'),
(22, 5, 1, 'Perencanaan & Analisis', 'Analisis kebutuhan, audit website lama, penentuan scope, pembuatan dokumen spesifikasi, dan approval stakeholder.', '#8b5cf6', '2025-11-26', '2025-12-16', '2025-11-26', NULL, 14, 'in_progress', 100, NULL, NULL, '[{\"name\":\"Dokumen analisis kebutuhan\",\"is_done\":true},{\"name\":\"Hasil audit website lama\",\"is_done\":true},{\"name\":\"Dokumen scope & spesifikasi proyek\",\"is_done\":true},{\"name\":\"Estimasi waktu & anggaran\",\"is_done\":true},{\"name\":\"Sign-off stakeholder\",\"is_done\":true}]', NULL, NULL, 0, '2026-02-24 08:31:50', '2026-02-24 08:31:50'),
(23, 5, 2, 'Desain UI/UX', 'Wireframing, prototyping interaktif, pembuatan design system, mockup desktop & mobile, serta review dan approval desain final.', '#ec4899', '2025-12-16', '2026-01-14', '2026-02-24', NULL, 21, 'in_progress', 90, NULL, NULL, '[{\"name\":\"Wireframe semua halaman utama\",\"is_done\":false},{\"name\":\"Moodboard & style guide\",\"is_done\":false},{\"name\":\"Mockup desktop high-fidelity\",\"is_done\":false},{\"name\":\"Mockup mobile high-fidelity\",\"is_done\":false},{\"name\":\"Design system & component library\",\"is_done\":false},{\"name\":\"Prototype interaktif (Figma)\",\"is_done\":false},{\"name\":\"Design approval dari klien\",\"is_done\":false}]', NULL, NULL, 1, '2026-02-24 08:31:50', '2026-02-24 08:40:47'),
(24, 5, 3, 'Setup Infrastruktur', 'Provisioning server, konfigurasi domain & SSL, setup CI/CD pipeline, environment staging, serta monitoring dan logging.', '#f59e0b', '2026-01-14', '2026-01-28', '2026-02-24', NULL, 10, 'in_progress', 60, NULL, NULL, '[{\"name\":\"Server live & staging aktif\",\"is_done\":false},{\"name\":\"Domain & SSL terkonfigurasi\",\"is_done\":false},{\"name\":\"CI\\/CD pipeline berjalan\",\"is_done\":false},{\"name\":\"Environment staging siap\",\"is_done\":false},{\"name\":\"Monitoring & alerting aktif\",\"is_done\":false}]', NULL, NULL, 1, '2026-02-24 08:31:50', '2026-02-24 08:41:08'),
(25, 5, 4, 'Pengembangan Frontend', 'Implementasi antarmuka berdasarkan desain yang disetujui: komponen UI, halaman-halaman utama, responsiveness, aksesibilitas, dan optimasi performa.', '#06b6d4', '2026-01-28', '2026-03-11', NULL, NULL, 30, 'pending', 0, NULL, NULL, '[{\"name\":\"Setup framework & struktur proyek\",\"is_done\":false},{\"name\":\"Komponen UI reusable\",\"is_done\":false},{\"name\":\"Halaman Beranda\",\"is_done\":false},{\"name\":\"Halaman-halaman dalam (sesuai sitemap)\",\"is_done\":false},{\"name\":\"Responsiveness mobile & tablet\",\"is_done\":false},{\"name\":\"Aksesibilitas (WCAG 2.1)\",\"is_done\":false},{\"name\":\"Optimasi performa (Lighthouse \\u226590)\",\"is_done\":false}]', NULL, NULL, 0, '2026-02-24 08:31:50', '2026-02-24 08:31:50'),
(26, 5, 5, 'Pengembangan Backend & API', 'Pengembangan API, integrasi CMS/database, sistem autentikasi, manajemen media, dan integrasi layanan pihak ketiga.', '#10b981', '2026-03-11', '2026-04-20', NULL, NULL, 28, 'pending', 0, NULL, NULL, '[{\"name\":\"Setup backend framework & database\",\"is_done\":false},{\"name\":\"REST API endpoint lengkap\",\"is_done\":false},{\"name\":\"Sistem autentikasi & otorisasi\",\"is_done\":false},{\"name\":\"Integrasi CMS \\/ headless CMS\",\"is_done\":false},{\"name\":\"Manajemen media (upload, resize)\",\"is_done\":false},{\"name\":\"Integrasi email \\/ notifikasi\",\"is_done\":false},{\"name\":\"Integrasi layanan 3rd party\",\"is_done\":false}]', NULL, NULL, 0, '2026-02-24 08:31:50', '2026-02-24 08:31:50'),
(27, 5, 6, 'Pengujian & QA', 'Unit testing, integration testing, UAT bersama klien, performance testing, security audit, cross-browser testing, dan bug fixing.', '#f97316', '2026-04-20', '2026-05-14', NULL, NULL, 18, 'pending', 0, NULL, NULL, '[{\"name\":\"Unit & integration testing selesai\",\"is_done\":false},{\"name\":\"UAT bersama klien selesai\",\"is_done\":false},{\"name\":\"Performance testing (load & stress)\",\"is_done\":false},{\"name\":\"Security audit & penetration test\",\"is_done\":false},{\"name\":\"Cross-browser & device testing\",\"is_done\":false},{\"name\":\"Semua bug critical & high terselesaikan\",\"is_done\":false},{\"name\":\"Sign-off UAT dari klien\",\"is_done\":false}]', NULL, NULL, 0, '2026-02-24 08:31:50', '2026-02-24 08:31:50'),
(28, 5, 7, 'Go-Live & Pemeliharaan', 'Deployment ke produksi, migrasi data & konten, DNS cutover, monitoring pasca-launch, pelatihan tim klien, dan serah terima dokumentasi.', '#14b8a6', '2026-05-14', '2026-05-28', NULL, NULL, 10, 'pending', 0, NULL, NULL, '[{\"name\":\"Deployment produksi berhasil\",\"is_done\":false},{\"name\":\"Migrasi data & konten selesai\",\"is_done\":false},{\"name\":\"DNS cutover & monitoring\",\"is_done\":false},{\"name\":\"Website live & berjalan normal\",\"is_done\":false},{\"name\":\"Pelatihan tim klien\",\"is_done\":false},{\"name\":\"Dokumentasi teknis & manual\",\"is_done\":false},{\"name\":\"Serah terima akses & aset\",\"is_done\":false}]', NULL, NULL, 0, '2026-02-24 08:31:50', '2026-02-24 08:31:50'),
(29, 6, 1, 'Perencanaan & Analisis', 'Analisis kebutuhan, audit website lama, penentuan scope, pembuatan dokumen spesifikasi, dan approval stakeholder.', '#8b5cf6', '2025-12-06', '2025-12-25', '2025-12-06', NULL, 14, 'in_progress', 100, NULL, NULL, '[{\"name\":\"Dokumen analisis kebutuhan\",\"is_done\":true},{\"name\":\"Hasil audit website lama\",\"is_done\":true},{\"name\":\"Dokumen scope & spesifikasi proyek\",\"is_done\":true},{\"name\":\"Estimasi waktu & anggaran\",\"is_done\":true},{\"name\":\"Sign-off stakeholder\",\"is_done\":true}]', NULL, NULL, 0, '2026-02-24 08:31:50', '2026-02-24 08:31:50'),
(30, 6, 2, 'Desain UI/UX', 'Wireframing, prototyping interaktif, pembuatan design system, mockup desktop & mobile, serta review dan approval desain final.', '#ec4899', '2025-12-25', '2026-01-23', NULL, NULL, 21, 'pending', 0, NULL, NULL, '[{\"name\":\"Wireframe semua halaman utama\",\"is_done\":false},{\"name\":\"Moodboard & style guide\",\"is_done\":false},{\"name\":\"Mockup desktop high-fidelity\",\"is_done\":false},{\"name\":\"Mockup mobile high-fidelity\",\"is_done\":false},{\"name\":\"Design system & component library\",\"is_done\":false},{\"name\":\"Prototype interaktif (Figma)\",\"is_done\":false},{\"name\":\"Design approval dari klien\",\"is_done\":false}]', NULL, NULL, 0, '2026-02-24 08:31:50', '2026-02-24 08:31:50'),
(31, 6, 3, 'Setup Infrastruktur', 'Provisioning server, konfigurasi domain & SSL, setup CI/CD pipeline, environment staging, serta monitoring dan logging.', '#f59e0b', '2026-01-23', '2026-02-06', NULL, NULL, 10, 'pending', 0, NULL, NULL, '[{\"name\":\"Server live & staging aktif\",\"is_done\":false},{\"name\":\"Domain & SSL terkonfigurasi\",\"is_done\":false},{\"name\":\"CI\\/CD pipeline berjalan\",\"is_done\":false},{\"name\":\"Environment staging siap\",\"is_done\":false},{\"name\":\"Monitoring & alerting aktif\",\"is_done\":false}]', NULL, NULL, 0, '2026-02-24 08:31:50', '2026-02-24 08:31:50'),
(32, 6, 4, 'Pengembangan Frontend', 'Implementasi antarmuka berdasarkan desain yang disetujui: komponen UI, halaman-halaman utama, responsiveness, aksesibilitas, dan optimasi performa.', '#06b6d4', '2026-02-06', '2026-03-20', NULL, NULL, 30, 'pending', 0, NULL, NULL, '[{\"name\":\"Setup framework & struktur proyek\",\"is_done\":false},{\"name\":\"Komponen UI reusable\",\"is_done\":false},{\"name\":\"Halaman Beranda\",\"is_done\":false},{\"name\":\"Halaman-halaman dalam (sesuai sitemap)\",\"is_done\":false},{\"name\":\"Responsiveness mobile & tablet\",\"is_done\":false},{\"name\":\"Aksesibilitas (WCAG 2.1)\",\"is_done\":false},{\"name\":\"Optimasi performa (Lighthouse \\u226590)\",\"is_done\":false}]', NULL, NULL, 0, '2026-02-24 08:31:50', '2026-02-24 08:31:50'),
(33, 6, 5, 'Pengembangan Backend & API', 'Pengembangan API, integrasi CMS/database, sistem autentikasi, manajemen media, dan integrasi layanan pihak ketiga.', '#10b981', '2026-03-20', '2026-04-29', NULL, NULL, 28, 'pending', 0, NULL, NULL, '[{\"name\":\"Setup backend framework & database\",\"is_done\":false},{\"name\":\"REST API endpoint lengkap\",\"is_done\":false},{\"name\":\"Sistem autentikasi & otorisasi\",\"is_done\":false},{\"name\":\"Integrasi CMS \\/ headless CMS\",\"is_done\":false},{\"name\":\"Manajemen media (upload, resize)\",\"is_done\":false},{\"name\":\"Integrasi email \\/ notifikasi\",\"is_done\":false},{\"name\":\"Integrasi layanan 3rd party\",\"is_done\":false}]', NULL, NULL, 0, '2026-02-24 08:31:50', '2026-02-24 08:31:50'),
(34, 6, 6, 'Pengujian & QA', 'Unit testing, integration testing, UAT bersama klien, performance testing, security audit, cross-browser testing, dan bug fixing.', '#f97316', '2026-04-29', '2026-05-25', NULL, NULL, 18, 'pending', 0, NULL, NULL, '[{\"name\":\"Unit & integration testing selesai\",\"is_done\":false},{\"name\":\"UAT bersama klien selesai\",\"is_done\":false},{\"name\":\"Performance testing (load & stress)\",\"is_done\":false},{\"name\":\"Security audit & penetration test\",\"is_done\":false},{\"name\":\"Cross-browser & device testing\",\"is_done\":false},{\"name\":\"Semua bug critical & high terselesaikan\",\"is_done\":false},{\"name\":\"Sign-off UAT dari klien\",\"is_done\":false}]', NULL, NULL, 0, '2026-02-24 08:31:50', '2026-02-24 08:31:50'),
(35, 6, 7, 'Go-Live & Pemeliharaan', 'Deployment ke produksi, migrasi data & konten, DNS cutover, monitoring pasca-launch, pelatihan tim klien, dan serah terima dokumentasi.', '#14b8a6', '2026-05-25', '2026-06-08', NULL, NULL, 10, 'pending', 0, NULL, NULL, '[{\"name\":\"Deployment produksi berhasil\",\"is_done\":false},{\"name\":\"Migrasi data & konten selesai\",\"is_done\":false},{\"name\":\"DNS cutover & monitoring\",\"is_done\":false},{\"name\":\"Website live & berjalan normal\",\"is_done\":false},{\"name\":\"Pelatihan tim klien\",\"is_done\":false},{\"name\":\"Dokumentasi teknis & manual\",\"is_done\":false},{\"name\":\"Serah terima akses & aset\",\"is_done\":false}]', NULL, NULL, 0, '2026-02-24 08:31:50', '2026-02-24 08:31:50'),
(36, 7, 1, 'Perencanaan & Analisis', 'Analisis kebutuhan, audit website lama, penentuan scope, pembuatan dokumen spesifikasi, dan approval stakeholder.', '#8b5cf6', '2025-12-26', '2026-01-15', '2025-12-26', NULL, 14, 'in_progress', 100, NULL, NULL, '[{\"name\":\"Dokumen analisis kebutuhan\",\"is_done\":true},{\"name\":\"Hasil audit website lama\",\"is_done\":true},{\"name\":\"Dokumen scope & spesifikasi proyek\",\"is_done\":true},{\"name\":\"Estimasi waktu & anggaran\",\"is_done\":true},{\"name\":\"Sign-off stakeholder\",\"is_done\":true}]', NULL, NULL, 0, '2026-02-24 08:31:50', '2026-02-24 08:31:50'),
(37, 7, 2, 'Desain UI/UX', 'Wireframing, prototyping interaktif, pembuatan design system, mockup desktop & mobile, serta review dan approval desain final.', '#ec4899', '2026-01-15', '2026-02-13', NULL, NULL, 21, 'pending', 0, NULL, NULL, '[{\"name\":\"Wireframe semua halaman utama\",\"is_done\":false},{\"name\":\"Moodboard & style guide\",\"is_done\":false},{\"name\":\"Mockup desktop high-fidelity\",\"is_done\":false},{\"name\":\"Mockup mobile high-fidelity\",\"is_done\":false},{\"name\":\"Design system & component library\",\"is_done\":false},{\"name\":\"Prototype interaktif (Figma)\",\"is_done\":false},{\"name\":\"Design approval dari klien\",\"is_done\":false}]', NULL, NULL, 0, '2026-02-24 08:31:50', '2026-02-24 08:31:50'),
(38, 7, 3, 'Setup Infrastruktur', 'Provisioning server, konfigurasi domain & SSL, setup CI/CD pipeline, environment staging, serta monitoring dan logging.', '#f59e0b', '2026-02-13', '2026-02-27', NULL, NULL, 10, 'pending', 0, NULL, NULL, '[{\"name\":\"Server live & staging aktif\",\"is_done\":false},{\"name\":\"Domain & SSL terkonfigurasi\",\"is_done\":false},{\"name\":\"CI\\/CD pipeline berjalan\",\"is_done\":false},{\"name\":\"Environment staging siap\",\"is_done\":false},{\"name\":\"Monitoring & alerting aktif\",\"is_done\":false}]', NULL, NULL, 0, '2026-02-24 08:31:50', '2026-02-24 08:31:50'),
(39, 7, 4, 'Pengembangan Frontend', 'Implementasi antarmuka berdasarkan desain yang disetujui: komponen UI, halaman-halaman utama, responsiveness, aksesibilitas, dan optimasi performa.', '#06b6d4', '2026-02-27', '2026-04-10', NULL, NULL, 30, 'pending', 0, NULL, NULL, '[{\"name\":\"Setup framework & struktur proyek\",\"is_done\":false},{\"name\":\"Komponen UI reusable\",\"is_done\":false},{\"name\":\"Halaman Beranda\",\"is_done\":false},{\"name\":\"Halaman-halaman dalam (sesuai sitemap)\",\"is_done\":false},{\"name\":\"Responsiveness mobile & tablet\",\"is_done\":false},{\"name\":\"Aksesibilitas (WCAG 2.1)\",\"is_done\":false},{\"name\":\"Optimasi performa (Lighthouse \\u226590)\",\"is_done\":false}]', NULL, NULL, 0, '2026-02-24 08:31:50', '2026-02-24 08:31:50'),
(40, 7, 5, 'Pengembangan Backend & API', 'Pengembangan API, integrasi CMS/database, sistem autentikasi, manajemen media, dan integrasi layanan pihak ketiga.', '#10b981', '2026-04-10', '2026-05-20', NULL, NULL, 28, 'pending', 0, NULL, NULL, '[{\"name\":\"Setup backend framework & database\",\"is_done\":false},{\"name\":\"REST API endpoint lengkap\",\"is_done\":false},{\"name\":\"Sistem autentikasi & otorisasi\",\"is_done\":false},{\"name\":\"Integrasi CMS \\/ headless CMS\",\"is_done\":false},{\"name\":\"Manajemen media (upload, resize)\",\"is_done\":false},{\"name\":\"Integrasi email \\/ notifikasi\",\"is_done\":false},{\"name\":\"Integrasi layanan 3rd party\",\"is_done\":false}]', NULL, NULL, 0, '2026-02-24 08:31:50', '2026-02-24 08:31:50'),
(41, 7, 6, 'Pengujian & QA', 'Unit testing, integration testing, UAT bersama klien, performance testing, security audit, cross-browser testing, dan bug fixing.', '#f97316', '2026-05-20', '2026-06-15', NULL, NULL, 18, 'pending', 0, NULL, NULL, '[{\"name\":\"Unit & integration testing selesai\",\"is_done\":false},{\"name\":\"UAT bersama klien selesai\",\"is_done\":false},{\"name\":\"Performance testing (load & stress)\",\"is_done\":false},{\"name\":\"Security audit & penetration test\",\"is_done\":false},{\"name\":\"Cross-browser & device testing\",\"is_done\":false},{\"name\":\"Semua bug critical & high terselesaikan\",\"is_done\":false},{\"name\":\"Sign-off UAT dari klien\",\"is_done\":false}]', NULL, NULL, 0, '2026-02-24 08:31:50', '2026-02-24 08:31:50'),
(42, 7, 7, 'Go-Live & Pemeliharaan', 'Deployment ke produksi, migrasi data & konten, DNS cutover, monitoring pasca-launch, pelatihan tim klien, dan serah terima dokumentasi.', '#14b8a6', '2026-06-15', '2026-06-29', NULL, NULL, 10, 'pending', 0, NULL, NULL, '[{\"name\":\"Deployment produksi berhasil\",\"is_done\":false},{\"name\":\"Migrasi data & konten selesai\",\"is_done\":false},{\"name\":\"DNS cutover & monitoring\",\"is_done\":false},{\"name\":\"Website live & berjalan normal\",\"is_done\":false},{\"name\":\"Pelatihan tim klien\",\"is_done\":false},{\"name\":\"Dokumentasi teknis & manual\",\"is_done\":false},{\"name\":\"Serah terima akses & aset\",\"is_done\":false}]', NULL, NULL, 0, '2026-02-24 08:31:50', '2026-02-24 08:31:50'),
(43, 8, 1, 'Perencanaan & Analisis', 'Analisis kebutuhan, audit website lama, penentuan scope, pembuatan dokumen spesifikasi, dan approval stakeholder.', '#8b5cf6', '2025-10-27', '2025-11-14', '2025-10-27', NULL, 14, 'review', 100, NULL, NULL, '[{\"name\":\"Dokumen analisis kebutuhan\",\"is_done\":true},{\"name\":\"Hasil audit website lama\",\"is_done\":true},{\"name\":\"Dokumen scope & spesifikasi proyek\",\"is_done\":true},{\"name\":\"Estimasi waktu & anggaran\",\"is_done\":true},{\"name\":\"Sign-off stakeholder\",\"is_done\":true}]', NULL, NULL, 0, '2026-02-24 08:31:51', '2026-02-24 08:31:51'),
(44, 8, 2, 'Desain UI/UX', 'Wireframing, prototyping interaktif, pembuatan design system, mockup desktop & mobile, serta review dan approval desain final.', '#ec4899', '2025-11-14', '2025-12-15', NULL, NULL, 21, 'pending', 0, NULL, NULL, '[{\"name\":\"Wireframe semua halaman utama\",\"is_done\":false},{\"name\":\"Moodboard & style guide\",\"is_done\":false},{\"name\":\"Mockup desktop high-fidelity\",\"is_done\":false},{\"name\":\"Mockup mobile high-fidelity\",\"is_done\":false},{\"name\":\"Design system & component library\",\"is_done\":false},{\"name\":\"Prototype interaktif (Figma)\",\"is_done\":false},{\"name\":\"Design approval dari klien\",\"is_done\":false}]', NULL, NULL, 0, '2026-02-24 08:31:51', '2026-02-24 08:31:51'),
(45, 8, 3, 'Setup Infrastruktur', 'Provisioning server, konfigurasi domain & SSL, setup CI/CD pipeline, environment staging, serta monitoring dan logging.', '#f59e0b', '2025-12-15', '2025-12-29', NULL, NULL, 10, 'pending', 0, NULL, NULL, '[{\"name\":\"Server live & staging aktif\",\"is_done\":false},{\"name\":\"Domain & SSL terkonfigurasi\",\"is_done\":false},{\"name\":\"CI\\/CD pipeline berjalan\",\"is_done\":false},{\"name\":\"Environment staging siap\",\"is_done\":false},{\"name\":\"Monitoring & alerting aktif\",\"is_done\":false}]', NULL, NULL, 0, '2026-02-24 08:31:51', '2026-02-24 08:31:51'),
(46, 8, 4, 'Pengembangan Frontend', 'Implementasi antarmuka berdasarkan desain yang disetujui: komponen UI, halaman-halaman utama, responsiveness, aksesibilitas, dan optimasi performa.', '#06b6d4', '2025-12-29', '2026-02-09', NULL, NULL, 30, 'pending', 0, NULL, NULL, '[{\"name\":\"Setup framework & struktur proyek\",\"is_done\":false},{\"name\":\"Komponen UI reusable\",\"is_done\":false},{\"name\":\"Halaman Beranda\",\"is_done\":false},{\"name\":\"Halaman-halaman dalam (sesuai sitemap)\",\"is_done\":false},{\"name\":\"Responsiveness mobile & tablet\",\"is_done\":false},{\"name\":\"Aksesibilitas (WCAG 2.1)\",\"is_done\":false},{\"name\":\"Optimasi performa (Lighthouse \\u226590)\",\"is_done\":false}]', NULL, NULL, 0, '2026-02-24 08:31:51', '2026-02-24 08:31:51'),
(47, 8, 5, 'Pengembangan Backend & API', 'Pengembangan API, integrasi CMS/database, sistem autentikasi, manajemen media, dan integrasi layanan pihak ketiga.', '#10b981', '2026-02-09', '2026-03-19', NULL, NULL, 28, 'pending', 0, NULL, NULL, '[{\"name\":\"Setup backend framework & database\",\"is_done\":false},{\"name\":\"REST API endpoint lengkap\",\"is_done\":false},{\"name\":\"Sistem autentikasi & otorisasi\",\"is_done\":false},{\"name\":\"Integrasi CMS \\/ headless CMS\",\"is_done\":false},{\"name\":\"Manajemen media (upload, resize)\",\"is_done\":false},{\"name\":\"Integrasi email \\/ notifikasi\",\"is_done\":false},{\"name\":\"Integrasi layanan 3rd party\",\"is_done\":false}]', NULL, NULL, 0, '2026-02-24 08:31:51', '2026-02-24 08:31:51'),
(48, 8, 6, 'Pengujian & QA', 'Unit testing, integration testing, UAT bersama klien, performance testing, security audit, cross-browser testing, dan bug fixing.', '#f97316', '2026-03-19', '2026-04-14', NULL, NULL, 18, 'pending', 0, NULL, NULL, '[{\"name\":\"Unit & integration testing selesai\",\"is_done\":false},{\"name\":\"UAT bersama klien selesai\",\"is_done\":false},{\"name\":\"Performance testing (load & stress)\",\"is_done\":false},{\"name\":\"Security audit & penetration test\",\"is_done\":false},{\"name\":\"Cross-browser & device testing\",\"is_done\":false},{\"name\":\"Semua bug critical & high terselesaikan\",\"is_done\":false},{\"name\":\"Sign-off UAT dari klien\",\"is_done\":false}]', NULL, NULL, 0, '2026-02-24 08:31:51', '2026-02-24 08:31:51'),
(49, 8, 7, 'Go-Live & Pemeliharaan', 'Deployment ke produksi, migrasi data & konten, DNS cutover, monitoring pasca-launch, pelatihan tim klien, dan serah terima dokumentasi.', '#14b8a6', '2026-04-14', '2026-04-28', NULL, NULL, 10, 'pending', 0, NULL, NULL, '[{\"name\":\"Deployment produksi berhasil\",\"is_done\":false},{\"name\":\"Migrasi data & konten selesai\",\"is_done\":false},{\"name\":\"DNS cutover & monitoring\",\"is_done\":false},{\"name\":\"Website live & berjalan normal\",\"is_done\":false},{\"name\":\"Pelatihan tim klien\",\"is_done\":false},{\"name\":\"Dokumentasi teknis & manual\",\"is_done\":false},{\"name\":\"Serah terima akses & aset\",\"is_done\":false}]', NULL, NULL, 0, '2026-02-24 08:31:51', '2026-02-24 08:31:51'),
(50, 9, 1, 'Perencanaan & Analisis', 'Analisis kebutuhan, audit website lama, penentuan scope, pembuatan dokumen spesifikasi, dan approval stakeholder.', '#8b5cf6', '2026-01-03', '2026-01-22', '2026-01-03', NULL, 14, 'in_progress', 100, NULL, NULL, '[{\"name\":\"Dokumen analisis kebutuhan\",\"is_done\":true},{\"name\":\"Hasil audit website lama\",\"is_done\":true},{\"name\":\"Dokumen scope & spesifikasi proyek\",\"is_done\":true},{\"name\":\"Estimasi waktu & anggaran\",\"is_done\":true},{\"name\":\"Sign-off stakeholder\",\"is_done\":true}]', NULL, NULL, 0, '2026-02-24 08:31:51', '2026-02-24 08:31:51'),
(51, 9, 2, 'Desain UI/UX', 'Wireframing, prototyping interaktif, pembuatan design system, mockup desktop & mobile, serta review dan approval desain final.', '#ec4899', '2026-01-22', '2026-02-20', NULL, NULL, 21, 'pending', 0, NULL, NULL, '[{\"name\":\"Wireframe semua halaman utama\",\"is_done\":false},{\"name\":\"Moodboard & style guide\",\"is_done\":false},{\"name\":\"Mockup desktop high-fidelity\",\"is_done\":false},{\"name\":\"Mockup mobile high-fidelity\",\"is_done\":false},{\"name\":\"Design system & component library\",\"is_done\":false},{\"name\":\"Prototype interaktif (Figma)\",\"is_done\":false},{\"name\":\"Design approval dari klien\",\"is_done\":false}]', NULL, NULL, 0, '2026-02-24 08:31:51', '2026-02-24 08:31:51'),
(52, 9, 3, 'Setup Infrastruktur', 'Provisioning server, konfigurasi domain & SSL, setup CI/CD pipeline, environment staging, serta monitoring dan logging.', '#f59e0b', '2026-02-20', '2026-03-06', NULL, NULL, 10, 'pending', 0, NULL, NULL, '[{\"name\":\"Server live & staging aktif\",\"is_done\":false},{\"name\":\"Domain & SSL terkonfigurasi\",\"is_done\":false},{\"name\":\"CI\\/CD pipeline berjalan\",\"is_done\":false},{\"name\":\"Environment staging siap\",\"is_done\":false},{\"name\":\"Monitoring & alerting aktif\",\"is_done\":false}]', NULL, NULL, 0, '2026-02-24 08:31:51', '2026-02-24 08:31:51'),
(53, 9, 4, 'Pengembangan Frontend', 'Implementasi antarmuka berdasarkan desain yang disetujui: komponen UI, halaman-halaman utama, responsiveness, aksesibilitas, dan optimasi performa.', '#06b6d4', '2026-03-06', '2026-04-17', NULL, NULL, 30, 'pending', 0, NULL, NULL, '[{\"name\":\"Setup framework & struktur proyek\",\"is_done\":false},{\"name\":\"Komponen UI reusable\",\"is_done\":false},{\"name\":\"Halaman Beranda\",\"is_done\":false},{\"name\":\"Halaman-halaman dalam (sesuai sitemap)\",\"is_done\":false},{\"name\":\"Responsiveness mobile & tablet\",\"is_done\":false},{\"name\":\"Aksesibilitas (WCAG 2.1)\",\"is_done\":false},{\"name\":\"Optimasi performa (Lighthouse \\u226590)\",\"is_done\":false}]', NULL, NULL, 0, '2026-02-24 08:31:51', '2026-02-24 08:31:51'),
(54, 9, 5, 'Pengembangan Backend & API', 'Pengembangan API, integrasi CMS/database, sistem autentikasi, manajemen media, dan integrasi layanan pihak ketiga.', '#10b981', '2026-04-17', '2026-05-27', NULL, NULL, 28, 'pending', 0, NULL, NULL, '[{\"name\":\"Setup backend framework & database\",\"is_done\":false},{\"name\":\"REST API endpoint lengkap\",\"is_done\":false},{\"name\":\"Sistem autentikasi & otorisasi\",\"is_done\":false},{\"name\":\"Integrasi CMS \\/ headless CMS\",\"is_done\":false},{\"name\":\"Manajemen media (upload, resize)\",\"is_done\":false},{\"name\":\"Integrasi email \\/ notifikasi\",\"is_done\":false},{\"name\":\"Integrasi layanan 3rd party\",\"is_done\":false}]', NULL, NULL, 0, '2026-02-24 08:31:51', '2026-02-24 08:31:51'),
(55, 9, 6, 'Pengujian & QA', 'Unit testing, integration testing, UAT bersama klien, performance testing, security audit, cross-browser testing, dan bug fixing.', '#f97316', '2026-05-27', '2026-06-22', NULL, NULL, 18, 'pending', 0, NULL, NULL, '[{\"name\":\"Unit & integration testing selesai\",\"is_done\":false},{\"name\":\"UAT bersama klien selesai\",\"is_done\":false},{\"name\":\"Performance testing (load & stress)\",\"is_done\":false},{\"name\":\"Security audit & penetration test\",\"is_done\":false},{\"name\":\"Cross-browser & device testing\",\"is_done\":false},{\"name\":\"Semua bug critical & high terselesaikan\",\"is_done\":false},{\"name\":\"Sign-off UAT dari klien\",\"is_done\":false}]', NULL, NULL, 0, '2026-02-24 08:31:51', '2026-02-24 08:31:51'),
(56, 9, 7, 'Go-Live & Pemeliharaan', 'Deployment ke produksi, migrasi data & konten, DNS cutover, monitoring pasca-launch, pelatihan tim klien, dan serah terima dokumentasi.', '#14b8a6', '2026-06-22', '2026-07-06', NULL, NULL, 10, 'pending', 0, NULL, NULL, '[{\"name\":\"Deployment produksi berhasil\",\"is_done\":false},{\"name\":\"Migrasi data & konten selesai\",\"is_done\":false},{\"name\":\"DNS cutover & monitoring\",\"is_done\":false},{\"name\":\"Website live & berjalan normal\",\"is_done\":false},{\"name\":\"Pelatihan tim klien\",\"is_done\":false},{\"name\":\"Dokumentasi teknis & manual\",\"is_done\":false},{\"name\":\"Serah terima akses & aset\",\"is_done\":false}]', NULL, NULL, 0, '2026-02-24 08:31:51', '2026-02-24 08:31:51'),
(57, 10, 1, 'Perencanaan & Analisis', 'Analisis kebutuhan, audit website lama, penentuan scope, pembuatan dokumen spesifikasi, dan approval stakeholder.', '#8b5cf6', '2026-02-04', '2026-02-24', '2026-02-04', NULL, 14, 'in_progress', 100, NULL, NULL, '[{\"name\":\"Dokumen analisis kebutuhan\",\"is_done\":true},{\"name\":\"Hasil audit website lama\",\"is_done\":true},{\"name\":\"Dokumen scope & spesifikasi proyek\",\"is_done\":true},{\"name\":\"Estimasi waktu & anggaran\",\"is_done\":true},{\"name\":\"Sign-off stakeholder\",\"is_done\":true}]', NULL, NULL, 0, '2026-02-24 08:31:51', '2026-02-24 08:31:51'),
(58, 10, 2, 'Desain UI/UX', 'Wireframing, prototyping interaktif, pembuatan design system, mockup desktop & mobile, serta review dan approval desain final.', '#ec4899', '2026-02-24', '2026-03-25', NULL, NULL, 21, 'pending', 0, NULL, NULL, '[{\"name\":\"Wireframe semua halaman utama\",\"is_done\":false},{\"name\":\"Moodboard & style guide\",\"is_done\":false},{\"name\":\"Mockup desktop high-fidelity\",\"is_done\":false},{\"name\":\"Mockup mobile high-fidelity\",\"is_done\":false},{\"name\":\"Design system & component library\",\"is_done\":false},{\"name\":\"Prototype interaktif (Figma)\",\"is_done\":false},{\"name\":\"Design approval dari klien\",\"is_done\":false}]', NULL, NULL, 0, '2026-02-24 08:31:51', '2026-02-24 08:31:51'),
(59, 10, 3, 'Setup Infrastruktur', 'Provisioning server, konfigurasi domain & SSL, setup CI/CD pipeline, environment staging, serta monitoring dan logging.', '#f59e0b', '2026-03-25', '2026-04-08', NULL, NULL, 10, 'pending', 0, NULL, NULL, '[{\"name\":\"Server live & staging aktif\",\"is_done\":false},{\"name\":\"Domain & SSL terkonfigurasi\",\"is_done\":false},{\"name\":\"CI\\/CD pipeline berjalan\",\"is_done\":false},{\"name\":\"Environment staging siap\",\"is_done\":false},{\"name\":\"Monitoring & alerting aktif\",\"is_done\":false}]', NULL, NULL, 0, '2026-02-24 08:31:51', '2026-02-24 08:31:51'),
(60, 10, 4, 'Pengembangan Frontend', 'Implementasi antarmuka berdasarkan desain yang disetujui: komponen UI, halaman-halaman utama, responsiveness, aksesibilitas, dan optimasi performa.', '#06b6d4', '2026-04-08', '2026-05-20', NULL, NULL, 30, 'pending', 0, NULL, NULL, '[{\"name\":\"Setup framework & struktur proyek\",\"is_done\":false},{\"name\":\"Komponen UI reusable\",\"is_done\":false},{\"name\":\"Halaman Beranda\",\"is_done\":false},{\"name\":\"Halaman-halaman dalam (sesuai sitemap)\",\"is_done\":false},{\"name\":\"Responsiveness mobile & tablet\",\"is_done\":false},{\"name\":\"Aksesibilitas (WCAG 2.1)\",\"is_done\":false},{\"name\":\"Optimasi performa (Lighthouse \\u226590)\",\"is_done\":false}]', NULL, NULL, 0, '2026-02-24 08:31:51', '2026-02-24 08:31:51'),
(61, 10, 5, 'Pengembangan Backend & API', 'Pengembangan API, integrasi CMS/database, sistem autentikasi, manajemen media, dan integrasi layanan pihak ketiga.', '#10b981', '2026-05-20', '2026-06-29', NULL, NULL, 28, 'pending', 0, NULL, NULL, '[{\"name\":\"Setup backend framework & database\",\"is_done\":false},{\"name\":\"REST API endpoint lengkap\",\"is_done\":false},{\"name\":\"Sistem autentikasi & otorisasi\",\"is_done\":false},{\"name\":\"Integrasi CMS \\/ headless CMS\",\"is_done\":false},{\"name\":\"Manajemen media (upload, resize)\",\"is_done\":false},{\"name\":\"Integrasi email \\/ notifikasi\",\"is_done\":false},{\"name\":\"Integrasi layanan 3rd party\",\"is_done\":false}]', NULL, NULL, 0, '2026-02-24 08:31:51', '2026-02-24 08:31:51'),
(62, 10, 6, 'Pengujian & QA', 'Unit testing, integration testing, UAT bersama klien, performance testing, security audit, cross-browser testing, dan bug fixing.', '#f97316', '2026-06-29', '2026-07-23', NULL, NULL, 18, 'pending', 0, NULL, NULL, '[{\"name\":\"Unit & integration testing selesai\",\"is_done\":false},{\"name\":\"UAT bersama klien selesai\",\"is_done\":false},{\"name\":\"Performance testing (load & stress)\",\"is_done\":false},{\"name\":\"Security audit & penetration test\",\"is_done\":false},{\"name\":\"Cross-browser & device testing\",\"is_done\":false},{\"name\":\"Semua bug critical & high terselesaikan\",\"is_done\":false},{\"name\":\"Sign-off UAT dari klien\",\"is_done\":false}]', NULL, NULL, 0, '2026-02-24 08:31:51', '2026-02-24 08:31:51'),
(63, 10, 7, 'Go-Live & Pemeliharaan', 'Deployment ke produksi, migrasi data & konten, DNS cutover, monitoring pasca-launch, pelatihan tim klien, dan serah terima dokumentasi.', '#14b8a6', '2026-07-23', '2026-08-06', NULL, NULL, 10, 'pending', 0, NULL, NULL, '[{\"name\":\"Deployment produksi berhasil\",\"is_done\":false},{\"name\":\"Migrasi data & konten selesai\",\"is_done\":false},{\"name\":\"DNS cutover & monitoring\",\"is_done\":false},{\"name\":\"Website live & berjalan normal\",\"is_done\":false},{\"name\":\"Pelatihan tim klien\",\"is_done\":false},{\"name\":\"Dokumentasi teknis & manual\",\"is_done\":false},{\"name\":\"Serah terima akses & aset\",\"is_done\":false}]', NULL, NULL, 0, '2026-02-24 08:31:51', '2026-02-24 08:31:51'),
(64, 11, 1, 'Perencanaan & Analisis', 'Analisis kebutuhan, audit website lama, penentuan scope, pembuatan dokumen spesifikasi, dan approval stakeholder.', '#8b5cf6', '2025-12-14', '2026-01-01', '2025-12-14', NULL, 14, 'in_progress', 100, NULL, NULL, '[{\"name\":\"Dokumen analisis kebutuhan\",\"is_done\":true},{\"name\":\"Hasil audit website lama\",\"is_done\":true},{\"name\":\"Dokumen scope & spesifikasi proyek\",\"is_done\":true},{\"name\":\"Estimasi waktu & anggaran\",\"is_done\":true},{\"name\":\"Sign-off stakeholder\",\"is_done\":true}]', NULL, NULL, 0, '2026-02-24 08:31:51', '2026-02-24 08:31:51'),
(65, 11, 2, 'Desain UI/UX', 'Wireframing, prototyping interaktif, pembuatan design system, mockup desktop & mobile, serta review dan approval desain final.', '#ec4899', '2026-01-01', '2026-01-30', NULL, NULL, 21, 'pending', 0, NULL, NULL, '[{\"name\":\"Wireframe semua halaman utama\",\"is_done\":false},{\"name\":\"Moodboard & style guide\",\"is_done\":false},{\"name\":\"Mockup desktop high-fidelity\",\"is_done\":false},{\"name\":\"Mockup mobile high-fidelity\",\"is_done\":false},{\"name\":\"Design system & component library\",\"is_done\":false},{\"name\":\"Prototype interaktif (Figma)\",\"is_done\":false},{\"name\":\"Design approval dari klien\",\"is_done\":false}]', NULL, NULL, 0, '2026-02-24 08:31:51', '2026-02-24 08:31:51'),
(66, 11, 3, 'Setup Infrastruktur', 'Provisioning server, konfigurasi domain & SSL, setup CI/CD pipeline, environment staging, serta monitoring dan logging.', '#f59e0b', '2026-01-30', '2026-02-13', NULL, NULL, 10, 'pending', 0, NULL, NULL, '[{\"name\":\"Server live & staging aktif\",\"is_done\":false},{\"name\":\"Domain & SSL terkonfigurasi\",\"is_done\":false},{\"name\":\"CI\\/CD pipeline berjalan\",\"is_done\":false},{\"name\":\"Environment staging siap\",\"is_done\":false},{\"name\":\"Monitoring & alerting aktif\",\"is_done\":false}]', NULL, NULL, 0, '2026-02-24 08:31:51', '2026-02-24 08:31:51'),
(67, 11, 4, 'Pengembangan Frontend', 'Implementasi antarmuka berdasarkan desain yang disetujui: komponen UI, halaman-halaman utama, responsiveness, aksesibilitas, dan optimasi performa.', '#06b6d4', '2026-02-13', '2026-03-27', NULL, NULL, 30, 'pending', 0, NULL, NULL, '[{\"name\":\"Setup framework & struktur proyek\",\"is_done\":false},{\"name\":\"Komponen UI reusable\",\"is_done\":false},{\"name\":\"Halaman Beranda\",\"is_done\":false},{\"name\":\"Halaman-halaman dalam (sesuai sitemap)\",\"is_done\":false},{\"name\":\"Responsiveness mobile & tablet\",\"is_done\":false},{\"name\":\"Aksesibilitas (WCAG 2.1)\",\"is_done\":false},{\"name\":\"Optimasi performa (Lighthouse \\u226590)\",\"is_done\":false}]', NULL, NULL, 0, '2026-02-24 08:31:51', '2026-02-24 08:31:51'),
(68, 11, 5, 'Pengembangan Backend & API', 'Pengembangan API, integrasi CMS/database, sistem autentikasi, manajemen media, dan integrasi layanan pihak ketiga.', '#10b981', '2026-03-27', '2026-05-06', NULL, NULL, 28, 'pending', 0, NULL, NULL, '[{\"name\":\"Setup backend framework & database\",\"is_done\":false},{\"name\":\"REST API endpoint lengkap\",\"is_done\":false},{\"name\":\"Sistem autentikasi & otorisasi\",\"is_done\":false},{\"name\":\"Integrasi CMS \\/ headless CMS\",\"is_done\":false},{\"name\":\"Manajemen media (upload, resize)\",\"is_done\":false},{\"name\":\"Integrasi email \\/ notifikasi\",\"is_done\":false},{\"name\":\"Integrasi layanan 3rd party\",\"is_done\":false}]', NULL, NULL, 0, '2026-02-24 08:31:51', '2026-02-24 08:31:51'),
(69, 11, 6, 'Pengujian & QA', 'Unit testing, integration testing, UAT bersama klien, performance testing, security audit, cross-browser testing, dan bug fixing.', '#f97316', '2026-05-06', '2026-06-01', NULL, NULL, 18, 'pending', 0, NULL, NULL, '[{\"name\":\"Unit & integration testing selesai\",\"is_done\":false},{\"name\":\"UAT bersama klien selesai\",\"is_done\":false},{\"name\":\"Performance testing (load & stress)\",\"is_done\":false},{\"name\":\"Security audit & penetration test\",\"is_done\":false},{\"name\":\"Cross-browser & device testing\",\"is_done\":false},{\"name\":\"Semua bug critical & high terselesaikan\",\"is_done\":false},{\"name\":\"Sign-off UAT dari klien\",\"is_done\":false}]', NULL, NULL, 0, '2026-02-24 08:31:51', '2026-02-24 08:31:51'),
(70, 11, 7, 'Go-Live & Pemeliharaan', 'Deployment ke produksi, migrasi data & konten, DNS cutover, monitoring pasca-launch, pelatihan tim klien, dan serah terima dokumentasi.', '#14b8a6', '2026-06-01', '2026-06-15', NULL, NULL, 10, 'pending', 0, NULL, NULL, '[{\"name\":\"Deployment produksi berhasil\",\"is_done\":false},{\"name\":\"Migrasi data & konten selesai\",\"is_done\":false},{\"name\":\"DNS cutover & monitoring\",\"is_done\":false},{\"name\":\"Website live & berjalan normal\",\"is_done\":false},{\"name\":\"Pelatihan tim klien\",\"is_done\":false},{\"name\":\"Dokumentasi teknis & manual\",\"is_done\":false},{\"name\":\"Serah terima akses & aset\",\"is_done\":false}]', NULL, NULL, 0, '2026-02-24 08:31:51', '2026-02-24 08:31:51'),
(71, 12, 1, 'Perencanaan & Analisis', 'Analisis kebutuhan, audit website lama, penentuan scope, pembuatan dokumen spesifikasi, dan approval stakeholder.', '#8b5cf6', '2026-01-10', '2026-01-29', '2026-01-10', NULL, 14, 'in_progress', 100, NULL, NULL, '[{\"name\":\"Dokumen analisis kebutuhan\",\"is_done\":true},{\"name\":\"Hasil audit website lama\",\"is_done\":true},{\"name\":\"Dokumen scope & spesifikasi proyek\",\"is_done\":true},{\"name\":\"Estimasi waktu & anggaran\",\"is_done\":true},{\"name\":\"Sign-off stakeholder\",\"is_done\":true}]', NULL, NULL, 0, '2026-02-24 08:31:51', '2026-02-24 08:31:51'),
(72, 12, 2, 'Desain UI/UX', 'Wireframing, prototyping interaktif, pembuatan design system, mockup desktop & mobile, serta review dan approval desain final.', '#ec4899', '2026-01-29', '2026-02-27', NULL, NULL, 21, 'pending', 0, NULL, NULL, '[{\"name\":\"Wireframe semua halaman utama\",\"is_done\":false},{\"name\":\"Moodboard & style guide\",\"is_done\":false},{\"name\":\"Mockup desktop high-fidelity\",\"is_done\":false},{\"name\":\"Mockup mobile high-fidelity\",\"is_done\":false},{\"name\":\"Design system & component library\",\"is_done\":false},{\"name\":\"Prototype interaktif (Figma)\",\"is_done\":false},{\"name\":\"Design approval dari klien\",\"is_done\":false}]', NULL, NULL, 0, '2026-02-24 08:31:51', '2026-02-24 08:31:51'),
(73, 12, 3, 'Setup Infrastruktur', 'Provisioning server, konfigurasi domain & SSL, setup CI/CD pipeline, environment staging, serta monitoring dan logging.', '#f59e0b', '2026-02-27', '2026-03-13', NULL, NULL, 10, 'pending', 0, NULL, NULL, '[{\"name\":\"Server live & staging aktif\",\"is_done\":false},{\"name\":\"Domain & SSL terkonfigurasi\",\"is_done\":false},{\"name\":\"CI\\/CD pipeline berjalan\",\"is_done\":false},{\"name\":\"Environment staging siap\",\"is_done\":false},{\"name\":\"Monitoring & alerting aktif\",\"is_done\":false}]', NULL, NULL, 0, '2026-02-24 08:31:51', '2026-02-24 08:31:51'),
(74, 12, 4, 'Pengembangan Frontend', 'Implementasi antarmuka berdasarkan desain yang disetujui: komponen UI, halaman-halaman utama, responsiveness, aksesibilitas, dan optimasi performa.', '#06b6d4', '2026-03-13', '2026-04-24', NULL, NULL, 30, 'pending', 0, NULL, NULL, '[{\"name\":\"Setup framework & struktur proyek\",\"is_done\":false},{\"name\":\"Komponen UI reusable\",\"is_done\":false},{\"name\":\"Halaman Beranda\",\"is_done\":false},{\"name\":\"Halaman-halaman dalam (sesuai sitemap)\",\"is_done\":false},{\"name\":\"Responsiveness mobile & tablet\",\"is_done\":false},{\"name\":\"Aksesibilitas (WCAG 2.1)\",\"is_done\":false},{\"name\":\"Optimasi performa (Lighthouse \\u226590)\",\"is_done\":false}]', NULL, NULL, 0, '2026-02-24 08:31:51', '2026-02-24 08:31:51'),
(75, 12, 5, 'Pengembangan Backend & API', 'Pengembangan API, integrasi CMS/database, sistem autentikasi, manajemen media, dan integrasi layanan pihak ketiga.', '#10b981', '2026-04-24', '2026-06-03', NULL, NULL, 28, 'pending', 0, NULL, NULL, '[{\"name\":\"Setup backend framework & database\",\"is_done\":false},{\"name\":\"REST API endpoint lengkap\",\"is_done\":false},{\"name\":\"Sistem autentikasi & otorisasi\",\"is_done\":false},{\"name\":\"Integrasi CMS \\/ headless CMS\",\"is_done\":false},{\"name\":\"Manajemen media (upload, resize)\",\"is_done\":false},{\"name\":\"Integrasi email \\/ notifikasi\",\"is_done\":false},{\"name\":\"Integrasi layanan 3rd party\",\"is_done\":false}]', NULL, NULL, 0, '2026-02-24 08:31:51', '2026-02-24 08:31:51'),
(76, 12, 6, 'Pengujian & QA', 'Unit testing, integration testing, UAT bersama klien, performance testing, security audit, cross-browser testing, dan bug fixing.', '#f97316', '2026-06-03', '2026-06-29', NULL, NULL, 18, 'pending', 0, NULL, NULL, '[{\"name\":\"Unit & integration testing selesai\",\"is_done\":false},{\"name\":\"UAT bersama klien selesai\",\"is_done\":false},{\"name\":\"Performance testing (load & stress)\",\"is_done\":false},{\"name\":\"Security audit & penetration test\",\"is_done\":false},{\"name\":\"Cross-browser & device testing\",\"is_done\":false},{\"name\":\"Semua bug critical & high terselesaikan\",\"is_done\":false},{\"name\":\"Sign-off UAT dari klien\",\"is_done\":false}]', NULL, NULL, 0, '2026-02-24 08:31:51', '2026-02-24 08:31:51'),
(77, 12, 7, 'Go-Live & Pemeliharaan', 'Deployment ke produksi, migrasi data & konten, DNS cutover, monitoring pasca-launch, pelatihan tim klien, dan serah terima dokumentasi.', '#14b8a6', '2026-06-29', '2026-07-13', NULL, NULL, 10, 'pending', 0, NULL, NULL, '[{\"name\":\"Deployment produksi berhasil\",\"is_done\":false},{\"name\":\"Migrasi data & konten selesai\",\"is_done\":false},{\"name\":\"DNS cutover & monitoring\",\"is_done\":false},{\"name\":\"Website live & berjalan normal\",\"is_done\":false},{\"name\":\"Pelatihan tim klien\",\"is_done\":false},{\"name\":\"Dokumentasi teknis & manual\",\"is_done\":false},{\"name\":\"Serah terima akses & aset\",\"is_done\":false}]', NULL, NULL, 0, '2026-02-24 08:31:51', '2026-02-24 08:31:51'),
(78, 13, 1, 'Perencanaan & Analisis', 'Analisis kebutuhan, audit website lama, penentuan scope, pembuatan dokumen spesifikasi, dan approval stakeholder.', '#8b5cf6', '2025-11-06', '2025-11-26', '2025-11-06', '2025-11-26', 14, 'completed', 100, NULL, NULL, '[{\"name\":\"Dokumen analisis kebutuhan\",\"is_done\":true},{\"name\":\"Hasil audit website lama\",\"is_done\":true},{\"name\":\"Dokumen scope & spesifikasi proyek\",\"is_done\":true},{\"name\":\"Estimasi waktu & anggaran\",\"is_done\":true},{\"name\":\"Sign-off stakeholder\",\"is_done\":true}]', NULL, NULL, 0, '2026-02-24 08:31:51', '2026-02-24 08:31:51'),
(79, 13, 2, 'Desain UI/UX', 'Wireframing, prototyping interaktif, pembuatan design system, mockup desktop & mobile, serta review dan approval desain final.', '#ec4899', '2025-11-26', '2025-12-25', '2025-11-26', NULL, 21, 'in_progress', 100, NULL, NULL, '[{\"name\":\"Wireframe semua halaman utama\",\"is_done\":true},{\"name\":\"Moodboard & style guide\",\"is_done\":true},{\"name\":\"Mockup desktop high-fidelity\",\"is_done\":true},{\"name\":\"Mockup mobile high-fidelity\",\"is_done\":true},{\"name\":\"Design system & component library\",\"is_done\":true},{\"name\":\"Prototype interaktif (Figma)\",\"is_done\":true},{\"name\":\"Design approval dari klien\",\"is_done\":true}]', NULL, NULL, 0, '2026-02-24 08:31:51', '2026-02-24 08:31:51'),
(80, 13, 3, 'Setup Infrastruktur', 'Provisioning server, konfigurasi domain & SSL, setup CI/CD pipeline, environment staging, serta monitoring dan logging.', '#f59e0b', '2025-12-25', '2026-01-08', NULL, NULL, 10, 'pending', 0, NULL, NULL, '[{\"name\":\"Server live & staging aktif\",\"is_done\":false},{\"name\":\"Domain & SSL terkonfigurasi\",\"is_done\":false},{\"name\":\"CI\\/CD pipeline berjalan\",\"is_done\":false},{\"name\":\"Environment staging siap\",\"is_done\":false},{\"name\":\"Monitoring & alerting aktif\",\"is_done\":false}]', NULL, NULL, 0, '2026-02-24 08:31:51', '2026-02-24 08:31:51'),
(81, 13, 4, 'Pengembangan Frontend', 'Implementasi antarmuka berdasarkan desain yang disetujui: komponen UI, halaman-halaman utama, responsiveness, aksesibilitas, dan optimasi performa.', '#06b6d4', '2026-01-08', '2026-02-19', NULL, NULL, 30, 'pending', 0, NULL, NULL, '[{\"name\":\"Setup framework & struktur proyek\",\"is_done\":false},{\"name\":\"Komponen UI reusable\",\"is_done\":false},{\"name\":\"Halaman Beranda\",\"is_done\":false},{\"name\":\"Halaman-halaman dalam (sesuai sitemap)\",\"is_done\":false},{\"name\":\"Responsiveness mobile & tablet\",\"is_done\":false},{\"name\":\"Aksesibilitas (WCAG 2.1)\",\"is_done\":false},{\"name\":\"Optimasi performa (Lighthouse \\u226590)\",\"is_done\":false}]', NULL, NULL, 0, '2026-02-24 08:31:51', '2026-02-24 08:31:51'),
(82, 13, 5, 'Pengembangan Backend & API', 'Pengembangan API, integrasi CMS/database, sistem autentikasi, manajemen media, dan integrasi layanan pihak ketiga.', '#10b981', '2026-02-19', '2026-03-31', NULL, NULL, 28, 'pending', 0, NULL, NULL, '[{\"name\":\"Setup backend framework & database\",\"is_done\":false},{\"name\":\"REST API endpoint lengkap\",\"is_done\":false},{\"name\":\"Sistem autentikasi & otorisasi\",\"is_done\":false},{\"name\":\"Integrasi CMS \\/ headless CMS\",\"is_done\":false},{\"name\":\"Manajemen media (upload, resize)\",\"is_done\":false},{\"name\":\"Integrasi email \\/ notifikasi\",\"is_done\":false},{\"name\":\"Integrasi layanan 3rd party\",\"is_done\":false}]', NULL, NULL, 0, '2026-02-24 08:31:51', '2026-02-24 08:31:51'),
(83, 13, 6, 'Pengujian & QA', 'Unit testing, integration testing, UAT bersama klien, performance testing, security audit, cross-browser testing, dan bug fixing.', '#f97316', '2026-03-31', '2026-04-24', NULL, NULL, 18, 'pending', 0, NULL, NULL, '[{\"name\":\"Unit & integration testing selesai\",\"is_done\":false},{\"name\":\"UAT bersama klien selesai\",\"is_done\":false},{\"name\":\"Performance testing (load & stress)\",\"is_done\":false},{\"name\":\"Security audit & penetration test\",\"is_done\":false},{\"name\":\"Cross-browser & device testing\",\"is_done\":false},{\"name\":\"Semua bug critical & high terselesaikan\",\"is_done\":false},{\"name\":\"Sign-off UAT dari klien\",\"is_done\":false}]', NULL, NULL, 0, '2026-02-24 08:31:51', '2026-02-24 08:31:51');
INSERT INTO `phases` (`id`, `website_id`, `phase_order`, `name`, `description`, `color`, `planned_start`, `planned_end`, `actual_start`, `actual_end`, `estimated_days`, `status`, `progress`, `pic_name`, `assigned_team`, `deliverables`, `notes`, `blockers`, `is_overdue`, `created_at`, `updated_at`) VALUES
(84, 13, 7, 'Go-Live & Pemeliharaan', 'Deployment ke produksi, migrasi data & konten, DNS cutover, monitoring pasca-launch, pelatihan tim klien, dan serah terima dokumentasi.', '#14b8a6', '2026-04-24', '2026-05-08', NULL, NULL, 10, 'pending', 0, NULL, NULL, '[{\"name\":\"Deployment produksi berhasil\",\"is_done\":false},{\"name\":\"Migrasi data & konten selesai\",\"is_done\":false},{\"name\":\"DNS cutover & monitoring\",\"is_done\":false},{\"name\":\"Website live & berjalan normal\",\"is_done\":false},{\"name\":\"Pelatihan tim klien\",\"is_done\":false},{\"name\":\"Dokumentasi teknis & manual\",\"is_done\":false},{\"name\":\"Serah terima akses & aset\",\"is_done\":false}]', NULL, NULL, 0, '2026-02-24 08:31:51', '2026-02-24 08:31:51'),
(85, 14, 1, 'Perencanaan & Analisis', 'Analisis kebutuhan, audit website lama, penentuan scope, pembuatan dokumen spesifikasi, dan approval stakeholder.', '#8b5cf6', '2025-12-28', '2026-01-15', '2025-12-28', NULL, 14, 'in_progress', 100, NULL, NULL, '[{\"name\":\"Dokumen analisis kebutuhan\",\"is_done\":true},{\"name\":\"Hasil audit website lama\",\"is_done\":true},{\"name\":\"Dokumen scope & spesifikasi proyek\",\"is_done\":true},{\"name\":\"Estimasi waktu & anggaran\",\"is_done\":true},{\"name\":\"Sign-off stakeholder\",\"is_done\":true}]', NULL, NULL, 0, '2026-02-24 08:31:51', '2026-02-24 08:31:51'),
(86, 14, 2, 'Desain UI/UX', 'Wireframing, prototyping interaktif, pembuatan design system, mockup desktop & mobile, serta review dan approval desain final.', '#ec4899', '2026-01-15', '2026-02-13', NULL, NULL, 21, 'pending', 0, NULL, NULL, '[{\"name\":\"Wireframe semua halaman utama\",\"is_done\":false},{\"name\":\"Moodboard & style guide\",\"is_done\":false},{\"name\":\"Mockup desktop high-fidelity\",\"is_done\":false},{\"name\":\"Mockup mobile high-fidelity\",\"is_done\":false},{\"name\":\"Design system & component library\",\"is_done\":false},{\"name\":\"Prototype interaktif (Figma)\",\"is_done\":false},{\"name\":\"Design approval dari klien\",\"is_done\":false}]', NULL, NULL, 0, '2026-02-24 08:31:51', '2026-02-24 08:31:51'),
(87, 14, 3, 'Setup Infrastruktur', 'Provisioning server, konfigurasi domain & SSL, setup CI/CD pipeline, environment staging, serta monitoring dan logging.', '#f59e0b', '2026-02-13', '2026-02-27', NULL, NULL, 10, 'pending', 0, NULL, NULL, '[{\"name\":\"Server live & staging aktif\",\"is_done\":false},{\"name\":\"Domain & SSL terkonfigurasi\",\"is_done\":false},{\"name\":\"CI\\/CD pipeline berjalan\",\"is_done\":false},{\"name\":\"Environment staging siap\",\"is_done\":false},{\"name\":\"Monitoring & alerting aktif\",\"is_done\":false}]', NULL, NULL, 0, '2026-02-24 08:31:51', '2026-02-24 08:31:51'),
(88, 14, 4, 'Pengembangan Frontend', 'Implementasi antarmuka berdasarkan desain yang disetujui: komponen UI, halaman-halaman utama, responsiveness, aksesibilitas, dan optimasi performa.', '#06b6d4', '2026-02-27', '2026-04-10', NULL, NULL, 30, 'pending', 0, NULL, NULL, '[{\"name\":\"Setup framework & struktur proyek\",\"is_done\":false},{\"name\":\"Komponen UI reusable\",\"is_done\":false},{\"name\":\"Halaman Beranda\",\"is_done\":false},{\"name\":\"Halaman-halaman dalam (sesuai sitemap)\",\"is_done\":false},{\"name\":\"Responsiveness mobile & tablet\",\"is_done\":false},{\"name\":\"Aksesibilitas (WCAG 2.1)\",\"is_done\":false},{\"name\":\"Optimasi performa (Lighthouse \\u226590)\",\"is_done\":false}]', NULL, NULL, 0, '2026-02-24 08:31:51', '2026-02-24 08:31:51'),
(89, 14, 5, 'Pengembangan Backend & API', 'Pengembangan API, integrasi CMS/database, sistem autentikasi, manajemen media, dan integrasi layanan pihak ketiga.', '#10b981', '2026-04-10', '2026-05-20', NULL, NULL, 28, 'pending', 0, NULL, NULL, '[{\"name\":\"Setup backend framework & database\",\"is_done\":false},{\"name\":\"REST API endpoint lengkap\",\"is_done\":false},{\"name\":\"Sistem autentikasi & otorisasi\",\"is_done\":false},{\"name\":\"Integrasi CMS \\/ headless CMS\",\"is_done\":false},{\"name\":\"Manajemen media (upload, resize)\",\"is_done\":false},{\"name\":\"Integrasi email \\/ notifikasi\",\"is_done\":false},{\"name\":\"Integrasi layanan 3rd party\",\"is_done\":false}]', NULL, NULL, 0, '2026-02-24 08:31:51', '2026-02-24 08:31:51'),
(90, 14, 6, 'Pengujian & QA', 'Unit testing, integration testing, UAT bersama klien, performance testing, security audit, cross-browser testing, dan bug fixing.', '#f97316', '2026-05-20', '2026-06-15', NULL, NULL, 18, 'pending', 0, NULL, NULL, '[{\"name\":\"Unit & integration testing selesai\",\"is_done\":false},{\"name\":\"UAT bersama klien selesai\",\"is_done\":false},{\"name\":\"Performance testing (load & stress)\",\"is_done\":false},{\"name\":\"Security audit & penetration test\",\"is_done\":false},{\"name\":\"Cross-browser & device testing\",\"is_done\":false},{\"name\":\"Semua bug critical & high terselesaikan\",\"is_done\":false},{\"name\":\"Sign-off UAT dari klien\",\"is_done\":false}]', NULL, NULL, 0, '2026-02-24 08:31:51', '2026-02-24 08:31:51'),
(91, 14, 7, 'Go-Live & Pemeliharaan', 'Deployment ke produksi, migrasi data & konten, DNS cutover, monitoring pasca-launch, pelatihan tim klien, dan serah terima dokumentasi.', '#14b8a6', '2026-06-15', '2026-06-29', NULL, NULL, 10, 'pending', 0, NULL, NULL, '[{\"name\":\"Deployment produksi berhasil\",\"is_done\":false},{\"name\":\"Migrasi data & konten selesai\",\"is_done\":false},{\"name\":\"DNS cutover & monitoring\",\"is_done\":false},{\"name\":\"Website live & berjalan normal\",\"is_done\":false},{\"name\":\"Pelatihan tim klien\",\"is_done\":false},{\"name\":\"Dokumentasi teknis & manual\",\"is_done\":false},{\"name\":\"Serah terima akses & aset\",\"is_done\":false}]', NULL, NULL, 0, '2026-02-24 08:31:51', '2026-02-24 08:31:51'),
(92, 15, 1, 'Perencanaan & Analisis', 'Analisis kebutuhan, audit website lama, penentuan scope, pembuatan dokumen spesifikasi, dan approval stakeholder.', '#8b5cf6', '2026-02-06', '2026-02-26', '2026-02-06', NULL, 14, 'in_progress', 100, NULL, NULL, '[{\"name\":\"Dokumen analisis kebutuhan\",\"is_done\":true},{\"name\":\"Hasil audit website lama\",\"is_done\":true},{\"name\":\"Dokumen scope & spesifikasi proyek\",\"is_done\":true},{\"name\":\"Estimasi waktu & anggaran\",\"is_done\":true},{\"name\":\"Sign-off stakeholder\",\"is_done\":true}]', NULL, NULL, 0, '2026-02-24 08:31:51', '2026-02-24 08:31:51'),
(93, 15, 2, 'Desain UI/UX', 'Wireframing, prototyping interaktif, pembuatan design system, mockup desktop & mobile, serta review dan approval desain final.', '#ec4899', '2026-02-26', '2026-03-27', NULL, NULL, 21, 'pending', 0, NULL, NULL, '[{\"name\":\"Wireframe semua halaman utama\",\"is_done\":false},{\"name\":\"Moodboard & style guide\",\"is_done\":false},{\"name\":\"Mockup desktop high-fidelity\",\"is_done\":false},{\"name\":\"Mockup mobile high-fidelity\",\"is_done\":false},{\"name\":\"Design system & component library\",\"is_done\":false},{\"name\":\"Prototype interaktif (Figma)\",\"is_done\":false},{\"name\":\"Design approval dari klien\",\"is_done\":false}]', NULL, NULL, 0, '2026-02-24 08:31:51', '2026-02-24 08:31:51'),
(94, 15, 3, 'Setup Infrastruktur', 'Provisioning server, konfigurasi domain & SSL, setup CI/CD pipeline, environment staging, serta monitoring dan logging.', '#f59e0b', '2026-03-27', '2026-04-10', NULL, NULL, 10, 'pending', 0, NULL, NULL, '[{\"name\":\"Server live & staging aktif\",\"is_done\":false},{\"name\":\"Domain & SSL terkonfigurasi\",\"is_done\":false},{\"name\":\"CI\\/CD pipeline berjalan\",\"is_done\":false},{\"name\":\"Environment staging siap\",\"is_done\":false},{\"name\":\"Monitoring & alerting aktif\",\"is_done\":false}]', NULL, NULL, 0, '2026-02-24 08:31:51', '2026-02-24 08:31:51'),
(95, 15, 4, 'Pengembangan Frontend', 'Implementasi antarmuka berdasarkan desain yang disetujui: komponen UI, halaman-halaman utama, responsiveness, aksesibilitas, dan optimasi performa.', '#06b6d4', '2026-04-10', '2026-05-22', NULL, NULL, 30, 'pending', 0, NULL, NULL, '[{\"name\":\"Setup framework & struktur proyek\",\"is_done\":false},{\"name\":\"Komponen UI reusable\",\"is_done\":false},{\"name\":\"Halaman Beranda\",\"is_done\":false},{\"name\":\"Halaman-halaman dalam (sesuai sitemap)\",\"is_done\":false},{\"name\":\"Responsiveness mobile & tablet\",\"is_done\":false},{\"name\":\"Aksesibilitas (WCAG 2.1)\",\"is_done\":false},{\"name\":\"Optimasi performa (Lighthouse \\u226590)\",\"is_done\":false}]', NULL, NULL, 0, '2026-02-24 08:31:51', '2026-02-24 08:31:51'),
(96, 15, 5, 'Pengembangan Backend & API', 'Pengembangan API, integrasi CMS/database, sistem autentikasi, manajemen media, dan integrasi layanan pihak ketiga.', '#10b981', '2026-05-22', '2026-07-01', NULL, NULL, 28, 'pending', 0, NULL, NULL, '[{\"name\":\"Setup backend framework & database\",\"is_done\":false},{\"name\":\"REST API endpoint lengkap\",\"is_done\":false},{\"name\":\"Sistem autentikasi & otorisasi\",\"is_done\":false},{\"name\":\"Integrasi CMS \\/ headless CMS\",\"is_done\":false},{\"name\":\"Manajemen media (upload, resize)\",\"is_done\":false},{\"name\":\"Integrasi email \\/ notifikasi\",\"is_done\":false},{\"name\":\"Integrasi layanan 3rd party\",\"is_done\":false}]', NULL, NULL, 0, '2026-02-24 08:31:51', '2026-02-24 08:31:51'),
(97, 15, 6, 'Pengujian & QA', 'Unit testing, integration testing, UAT bersama klien, performance testing, security audit, cross-browser testing, dan bug fixing.', '#f97316', '2026-07-01', '2026-07-27', NULL, NULL, 18, 'pending', 0, NULL, NULL, '[{\"name\":\"Unit & integration testing selesai\",\"is_done\":false},{\"name\":\"UAT bersama klien selesai\",\"is_done\":false},{\"name\":\"Performance testing (load & stress)\",\"is_done\":false},{\"name\":\"Security audit & penetration test\",\"is_done\":false},{\"name\":\"Cross-browser & device testing\",\"is_done\":false},{\"name\":\"Semua bug critical & high terselesaikan\",\"is_done\":false},{\"name\":\"Sign-off UAT dari klien\",\"is_done\":false}]', NULL, NULL, 0, '2026-02-24 08:31:51', '2026-02-24 08:31:51'),
(98, 15, 7, 'Go-Live & Pemeliharaan', 'Deployment ke produksi, migrasi data & konten, DNS cutover, monitoring pasca-launch, pelatihan tim klien, dan serah terima dokumentasi.', '#14b8a6', '2026-07-27', '2026-08-10', NULL, NULL, 10, 'pending', 0, NULL, NULL, '[{\"name\":\"Deployment produksi berhasil\",\"is_done\":false},{\"name\":\"Migrasi data & konten selesai\",\"is_done\":false},{\"name\":\"DNS cutover & monitoring\",\"is_done\":false},{\"name\":\"Website live & berjalan normal\",\"is_done\":false},{\"name\":\"Pelatihan tim klien\",\"is_done\":false},{\"name\":\"Dokumentasi teknis & manual\",\"is_done\":false},{\"name\":\"Serah terima akses & aset\",\"is_done\":false}]', NULL, NULL, 0, '2026-02-24 08:31:51', '2026-02-24 08:31:51'),
(99, 16, 1, 'Perencanaan & Analisis', 'Analisis kebutuhan, audit website lama, penentuan scope, pembuatan dokumen spesifikasi, dan approval stakeholder.', '#8b5cf6', '2026-02-19', '2026-03-11', NULL, NULL, 14, 'pending', 0, NULL, NULL, '[{\"name\":\"Dokumen analisis kebutuhan\",\"is_done\":false},{\"name\":\"Hasil audit website lama\",\"is_done\":false},{\"name\":\"Dokumen scope & spesifikasi proyek\",\"is_done\":false},{\"name\":\"Estimasi waktu & anggaran\",\"is_done\":false},{\"name\":\"Sign-off stakeholder\",\"is_done\":false}]', NULL, NULL, 0, '2026-02-24 08:31:51', '2026-02-24 08:31:51'),
(100, 16, 2, 'Desain UI/UX', 'Wireframing, prototyping interaktif, pembuatan design system, mockup desktop & mobile, serta review dan approval desain final.', '#ec4899', '2026-03-11', '2026-04-09', NULL, NULL, 21, 'pending', 0, NULL, NULL, '[{\"name\":\"Wireframe semua halaman utama\",\"is_done\":false},{\"name\":\"Moodboard & style guide\",\"is_done\":false},{\"name\":\"Mockup desktop high-fidelity\",\"is_done\":false},{\"name\":\"Mockup mobile high-fidelity\",\"is_done\":false},{\"name\":\"Design system & component library\",\"is_done\":false},{\"name\":\"Prototype interaktif (Figma)\",\"is_done\":false},{\"name\":\"Design approval dari klien\",\"is_done\":false}]', NULL, NULL, 0, '2026-02-24 08:31:51', '2026-02-24 08:31:51'),
(101, 16, 3, 'Setup Infrastruktur', 'Provisioning server, konfigurasi domain & SSL, setup CI/CD pipeline, environment staging, serta monitoring dan logging.', '#f59e0b', '2026-04-09', '2026-04-23', NULL, NULL, 10, 'pending', 0, NULL, NULL, '[{\"name\":\"Server live & staging aktif\",\"is_done\":false},{\"name\":\"Domain & SSL terkonfigurasi\",\"is_done\":false},{\"name\":\"CI\\/CD pipeline berjalan\",\"is_done\":false},{\"name\":\"Environment staging siap\",\"is_done\":false},{\"name\":\"Monitoring & alerting aktif\",\"is_done\":false}]', NULL, NULL, 0, '2026-02-24 08:31:51', '2026-02-24 08:31:51'),
(102, 16, 4, 'Pengembangan Frontend', 'Implementasi antarmuka berdasarkan desain yang disetujui: komponen UI, halaman-halaman utama, responsiveness, aksesibilitas, dan optimasi performa.', '#06b6d4', '2026-04-23', '2026-06-04', NULL, NULL, 30, 'pending', 0, NULL, NULL, '[{\"name\":\"Setup framework & struktur proyek\",\"is_done\":false},{\"name\":\"Komponen UI reusable\",\"is_done\":false},{\"name\":\"Halaman Beranda\",\"is_done\":false},{\"name\":\"Halaman-halaman dalam (sesuai sitemap)\",\"is_done\":false},{\"name\":\"Responsiveness mobile & tablet\",\"is_done\":false},{\"name\":\"Aksesibilitas (WCAG 2.1)\",\"is_done\":false},{\"name\":\"Optimasi performa (Lighthouse \\u226590)\",\"is_done\":false}]', NULL, NULL, 0, '2026-02-24 08:31:51', '2026-02-24 08:31:51'),
(103, 16, 5, 'Pengembangan Backend & API', 'Pengembangan API, integrasi CMS/database, sistem autentikasi, manajemen media, dan integrasi layanan pihak ketiga.', '#10b981', '2026-06-04', '2026-07-14', NULL, NULL, 28, 'pending', 0, NULL, NULL, '[{\"name\":\"Setup backend framework & database\",\"is_done\":false},{\"name\":\"REST API endpoint lengkap\",\"is_done\":false},{\"name\":\"Sistem autentikasi & otorisasi\",\"is_done\":false},{\"name\":\"Integrasi CMS \\/ headless CMS\",\"is_done\":false},{\"name\":\"Manajemen media (upload, resize)\",\"is_done\":false},{\"name\":\"Integrasi email \\/ notifikasi\",\"is_done\":false},{\"name\":\"Integrasi layanan 3rd party\",\"is_done\":false}]', NULL, NULL, 0, '2026-02-24 08:31:51', '2026-02-24 08:31:51'),
(104, 16, 6, 'Pengujian & QA', 'Unit testing, integration testing, UAT bersama klien, performance testing, security audit, cross-browser testing, dan bug fixing.', '#f97316', '2026-07-14', '2026-08-07', NULL, NULL, 18, 'pending', 0, NULL, NULL, '[{\"name\":\"Unit & integration testing selesai\",\"is_done\":false},{\"name\":\"UAT bersama klien selesai\",\"is_done\":false},{\"name\":\"Performance testing (load & stress)\",\"is_done\":false},{\"name\":\"Security audit & penetration test\",\"is_done\":false},{\"name\":\"Cross-browser & device testing\",\"is_done\":false},{\"name\":\"Semua bug critical & high terselesaikan\",\"is_done\":false},{\"name\":\"Sign-off UAT dari klien\",\"is_done\":false}]', NULL, NULL, 0, '2026-02-24 08:31:51', '2026-02-24 08:31:51'),
(105, 16, 7, 'Go-Live & Pemeliharaan', 'Deployment ke produksi, migrasi data & konten, DNS cutover, monitoring pasca-launch, pelatihan tim klien, dan serah terima dokumentasi.', '#14b8a6', '2026-08-07', '2026-08-21', NULL, NULL, 10, 'pending', 0, NULL, NULL, '[{\"name\":\"Deployment produksi berhasil\",\"is_done\":false},{\"name\":\"Migrasi data & konten selesai\",\"is_done\":false},{\"name\":\"DNS cutover & monitoring\",\"is_done\":false},{\"name\":\"Website live & berjalan normal\",\"is_done\":false},{\"name\":\"Pelatihan tim klien\",\"is_done\":false},{\"name\":\"Dokumentasi teknis & manual\",\"is_done\":false},{\"name\":\"Serah terima akses & aset\",\"is_done\":false}]', NULL, NULL, 0, '2026-02-24 08:31:51', '2026-02-24 08:31:51'),
(106, 17, 1, 'Perencanaan & Analisis', 'Analisis kebutuhan, audit website lama, penentuan scope, pembuatan dokumen spesifikasi, dan approval stakeholder.', '#8b5cf6', '2025-10-02', '2025-10-22', '2025-10-02', '2025-10-22', 14, 'completed', 100, NULL, NULL, '[{\"name\":\"Dokumen analisis kebutuhan\",\"is_done\":true},{\"name\":\"Hasil audit website lama\",\"is_done\":true},{\"name\":\"Dokumen scope & spesifikasi proyek\",\"is_done\":true},{\"name\":\"Estimasi waktu & anggaran\",\"is_done\":true},{\"name\":\"Sign-off stakeholder\",\"is_done\":true}]', NULL, NULL, 0, '2026-02-24 08:31:51', '2026-02-24 08:31:51'),
(107, 17, 2, 'Desain UI/UX', 'Wireframing, prototyping interaktif, pembuatan design system, mockup desktop & mobile, serta review dan approval desain final.', '#ec4899', '2025-10-22', '2025-11-20', '2025-10-22', NULL, 21, 'in_progress', 100, NULL, NULL, '[{\"name\":\"Wireframe semua halaman utama\",\"is_done\":true},{\"name\":\"Moodboard & style guide\",\"is_done\":true},{\"name\":\"Mockup desktop high-fidelity\",\"is_done\":true},{\"name\":\"Mockup mobile high-fidelity\",\"is_done\":true},{\"name\":\"Design system & component library\",\"is_done\":true},{\"name\":\"Prototype interaktif (Figma)\",\"is_done\":true},{\"name\":\"Design approval dari klien\",\"is_done\":true}]', NULL, NULL, 0, '2026-02-24 08:31:51', '2026-02-24 08:31:51'),
(108, 17, 3, 'Setup Infrastruktur', 'Provisioning server, konfigurasi domain & SSL, setup CI/CD pipeline, environment staging, serta monitoring dan logging.', '#f59e0b', '2025-11-20', '2025-12-04', NULL, NULL, 10, 'pending', 0, NULL, NULL, '[{\"name\":\"Server live & staging aktif\",\"is_done\":false},{\"name\":\"Domain & SSL terkonfigurasi\",\"is_done\":false},{\"name\":\"CI\\/CD pipeline berjalan\",\"is_done\":false},{\"name\":\"Environment staging siap\",\"is_done\":false},{\"name\":\"Monitoring & alerting aktif\",\"is_done\":false}]', NULL, NULL, 0, '2026-02-24 08:31:51', '2026-02-24 08:31:51'),
(109, 17, 4, 'Pengembangan Frontend', 'Implementasi antarmuka berdasarkan desain yang disetujui: komponen UI, halaman-halaman utama, responsiveness, aksesibilitas, dan optimasi performa.', '#06b6d4', '2025-12-04', '2026-01-15', NULL, NULL, 30, 'pending', 0, NULL, NULL, '[{\"name\":\"Setup framework & struktur proyek\",\"is_done\":false},{\"name\":\"Komponen UI reusable\",\"is_done\":false},{\"name\":\"Halaman Beranda\",\"is_done\":false},{\"name\":\"Halaman-halaman dalam (sesuai sitemap)\",\"is_done\":false},{\"name\":\"Responsiveness mobile & tablet\",\"is_done\":false},{\"name\":\"Aksesibilitas (WCAG 2.1)\",\"is_done\":false},{\"name\":\"Optimasi performa (Lighthouse \\u226590)\",\"is_done\":false}]', NULL, NULL, 0, '2026-02-24 08:31:51', '2026-02-24 08:31:51'),
(110, 17, 5, 'Pengembangan Backend & API', 'Pengembangan API, integrasi CMS/database, sistem autentikasi, manajemen media, dan integrasi layanan pihak ketiga.', '#10b981', '2026-01-15', '2026-02-24', NULL, NULL, 28, 'pending', 0, NULL, NULL, '[{\"name\":\"Setup backend framework & database\",\"is_done\":false},{\"name\":\"REST API endpoint lengkap\",\"is_done\":false},{\"name\":\"Sistem autentikasi & otorisasi\",\"is_done\":false},{\"name\":\"Integrasi CMS \\/ headless CMS\",\"is_done\":false},{\"name\":\"Manajemen media (upload, resize)\",\"is_done\":false},{\"name\":\"Integrasi email \\/ notifikasi\",\"is_done\":false},{\"name\":\"Integrasi layanan 3rd party\",\"is_done\":false}]', NULL, NULL, 0, '2026-02-24 08:31:51', '2026-02-24 08:31:51'),
(111, 17, 6, 'Pengujian & QA', 'Unit testing, integration testing, UAT bersama klien, performance testing, security audit, cross-browser testing, dan bug fixing.', '#f97316', '2026-02-24', '2026-03-20', NULL, NULL, 18, 'pending', 0, NULL, NULL, '[{\"name\":\"Unit & integration testing selesai\",\"is_done\":false},{\"name\":\"UAT bersama klien selesai\",\"is_done\":false},{\"name\":\"Performance testing (load & stress)\",\"is_done\":false},{\"name\":\"Security audit & penetration test\",\"is_done\":false},{\"name\":\"Cross-browser & device testing\",\"is_done\":false},{\"name\":\"Semua bug critical & high terselesaikan\",\"is_done\":false},{\"name\":\"Sign-off UAT dari klien\",\"is_done\":false}]', NULL, NULL, 0, '2026-02-24 08:31:51', '2026-02-24 08:31:51'),
(112, 17, 7, 'Go-Live & Pemeliharaan', 'Deployment ke produksi, migrasi data & konten, DNS cutover, monitoring pasca-launch, pelatihan tim klien, dan serah terima dokumentasi.', '#14b8a6', '2026-03-20', '2026-04-03', NULL, NULL, 10, 'pending', 0, NULL, NULL, '[{\"name\":\"Deployment produksi berhasil\",\"is_done\":false},{\"name\":\"Migrasi data & konten selesai\",\"is_done\":false},{\"name\":\"DNS cutover & monitoring\",\"is_done\":false},{\"name\":\"Website live & berjalan normal\",\"is_done\":false},{\"name\":\"Pelatihan tim klien\",\"is_done\":false},{\"name\":\"Dokumentasi teknis & manual\",\"is_done\":false},{\"name\":\"Serah terima akses & aset\",\"is_done\":false}]', NULL, NULL, 0, '2026-02-24 08:31:51', '2026-02-24 08:31:51'),
(113, 18, 1, 'Perencanaan & Analisis', 'Analisis kebutuhan, audit website lama, penentuan scope, pembuatan dokumen spesifikasi, dan approval stakeholder.', '#8b5cf6', '2025-12-08', '2025-12-26', '2025-12-08', NULL, 14, 'in_progress', 100, NULL, NULL, '[{\"name\":\"Dokumen analisis kebutuhan\",\"is_done\":true},{\"name\":\"Hasil audit website lama\",\"is_done\":true},{\"name\":\"Dokumen scope & spesifikasi proyek\",\"is_done\":true},{\"name\":\"Estimasi waktu & anggaran\",\"is_done\":true},{\"name\":\"Sign-off stakeholder\",\"is_done\":true}]', NULL, NULL, 0, '2026-02-24 08:31:51', '2026-02-24 08:31:51'),
(114, 18, 2, 'Desain UI/UX', 'Wireframing, prototyping interaktif, pembuatan design system, mockup desktop & mobile, serta review dan approval desain final.', '#ec4899', '2025-12-26', '2026-01-26', NULL, NULL, 21, 'pending', 0, NULL, NULL, '[{\"name\":\"Wireframe semua halaman utama\",\"is_done\":false},{\"name\":\"Moodboard & style guide\",\"is_done\":false},{\"name\":\"Mockup desktop high-fidelity\",\"is_done\":false},{\"name\":\"Mockup mobile high-fidelity\",\"is_done\":false},{\"name\":\"Design system & component library\",\"is_done\":false},{\"name\":\"Prototype interaktif (Figma)\",\"is_done\":false},{\"name\":\"Design approval dari klien\",\"is_done\":false}]', NULL, NULL, 0, '2026-02-24 08:31:51', '2026-02-24 08:31:51'),
(115, 18, 3, 'Setup Infrastruktur', 'Provisioning server, konfigurasi domain & SSL, setup CI/CD pipeline, environment staging, serta monitoring dan logging.', '#f59e0b', '2026-01-26', '2026-02-09', NULL, NULL, 10, 'pending', 0, NULL, NULL, '[{\"name\":\"Server live & staging aktif\",\"is_done\":false},{\"name\":\"Domain & SSL terkonfigurasi\",\"is_done\":false},{\"name\":\"CI\\/CD pipeline berjalan\",\"is_done\":false},{\"name\":\"Environment staging siap\",\"is_done\":false},{\"name\":\"Monitoring & alerting aktif\",\"is_done\":false}]', NULL, NULL, 0, '2026-02-24 08:31:51', '2026-02-24 08:31:51'),
(116, 18, 4, 'Pengembangan Frontend', 'Implementasi antarmuka berdasarkan desain yang disetujui: komponen UI, halaman-halaman utama, responsiveness, aksesibilitas, dan optimasi performa.', '#06b6d4', '2026-02-09', '2026-03-23', NULL, NULL, 30, 'pending', 0, NULL, NULL, '[{\"name\":\"Setup framework & struktur proyek\",\"is_done\":false},{\"name\":\"Komponen UI reusable\",\"is_done\":false},{\"name\":\"Halaman Beranda\",\"is_done\":false},{\"name\":\"Halaman-halaman dalam (sesuai sitemap)\",\"is_done\":false},{\"name\":\"Responsiveness mobile & tablet\",\"is_done\":false},{\"name\":\"Aksesibilitas (WCAG 2.1)\",\"is_done\":false},{\"name\":\"Optimasi performa (Lighthouse \\u226590)\",\"is_done\":false}]', NULL, NULL, 0, '2026-02-24 08:31:51', '2026-02-24 08:31:51'),
(117, 18, 5, 'Pengembangan Backend & API', 'Pengembangan API, integrasi CMS/database, sistem autentikasi, manajemen media, dan integrasi layanan pihak ketiga.', '#10b981', '2026-03-23', '2026-04-30', NULL, NULL, 28, 'pending', 0, NULL, NULL, '[{\"name\":\"Setup backend framework & database\",\"is_done\":false},{\"name\":\"REST API endpoint lengkap\",\"is_done\":false},{\"name\":\"Sistem autentikasi & otorisasi\",\"is_done\":false},{\"name\":\"Integrasi CMS \\/ headless CMS\",\"is_done\":false},{\"name\":\"Manajemen media (upload, resize)\",\"is_done\":false},{\"name\":\"Integrasi email \\/ notifikasi\",\"is_done\":false},{\"name\":\"Integrasi layanan 3rd party\",\"is_done\":false}]', NULL, NULL, 0, '2026-02-24 08:31:51', '2026-02-24 08:31:51'),
(118, 18, 6, 'Pengujian & QA', 'Unit testing, integration testing, UAT bersama klien, performance testing, security audit, cross-browser testing, dan bug fixing.', '#f97316', '2026-04-30', '2026-05-26', NULL, NULL, 18, 'pending', 0, NULL, NULL, '[{\"name\":\"Unit & integration testing selesai\",\"is_done\":false},{\"name\":\"UAT bersama klien selesai\",\"is_done\":false},{\"name\":\"Performance testing (load & stress)\",\"is_done\":false},{\"name\":\"Security audit & penetration test\",\"is_done\":false},{\"name\":\"Cross-browser & device testing\",\"is_done\":false},{\"name\":\"Semua bug critical & high terselesaikan\",\"is_done\":false},{\"name\":\"Sign-off UAT dari klien\",\"is_done\":false}]', NULL, NULL, 0, '2026-02-24 08:31:51', '2026-02-24 08:31:51'),
(119, 18, 7, 'Go-Live & Pemeliharaan', 'Deployment ke produksi, migrasi data & konten, DNS cutover, monitoring pasca-launch, pelatihan tim klien, dan serah terima dokumentasi.', '#14b8a6', '2026-05-26', '2026-06-09', NULL, NULL, 10, 'pending', 0, NULL, NULL, '[{\"name\":\"Deployment produksi berhasil\",\"is_done\":false},{\"name\":\"Migrasi data & konten selesai\",\"is_done\":false},{\"name\":\"DNS cutover & monitoring\",\"is_done\":false},{\"name\":\"Website live & berjalan normal\",\"is_done\":false},{\"name\":\"Pelatihan tim klien\",\"is_done\":false},{\"name\":\"Dokumentasi teknis & manual\",\"is_done\":false},{\"name\":\"Serah terima akses & aset\",\"is_done\":false}]', NULL, NULL, 0, '2026-02-24 08:31:51', '2026-02-24 08:31:51'),
(120, 19, 1, 'Perencanaan & Analisis', 'Analisis kebutuhan, audit website lama, penentuan scope, pembuatan dokumen spesifikasi, dan approval stakeholder.', '#8b5cf6', '2025-11-01', '2025-11-20', '2025-11-01', NULL, 14, 'review', 100, NULL, NULL, '[{\"name\":\"Dokumen analisis kebutuhan\",\"is_done\":true},{\"name\":\"Hasil audit website lama\",\"is_done\":true},{\"name\":\"Dokumen scope & spesifikasi proyek\",\"is_done\":true},{\"name\":\"Estimasi waktu & anggaran\",\"is_done\":true},{\"name\":\"Sign-off stakeholder\",\"is_done\":true}]', NULL, NULL, 0, '2026-02-24 08:31:52', '2026-02-24 08:31:52'),
(121, 19, 2, 'Desain UI/UX', 'Wireframing, prototyping interaktif, pembuatan design system, mockup desktop & mobile, serta review dan approval desain final.', '#ec4899', '2025-11-20', '2025-12-19', NULL, NULL, 21, 'pending', 0, NULL, NULL, '[{\"name\":\"Wireframe semua halaman utama\",\"is_done\":false},{\"name\":\"Moodboard & style guide\",\"is_done\":false},{\"name\":\"Mockup desktop high-fidelity\",\"is_done\":false},{\"name\":\"Mockup mobile high-fidelity\",\"is_done\":false},{\"name\":\"Design system & component library\",\"is_done\":false},{\"name\":\"Prototype interaktif (Figma)\",\"is_done\":false},{\"name\":\"Design approval dari klien\",\"is_done\":false}]', NULL, NULL, 0, '2026-02-24 08:31:52', '2026-02-24 08:31:52'),
(122, 19, 3, 'Setup Infrastruktur', 'Provisioning server, konfigurasi domain & SSL, setup CI/CD pipeline, environment staging, serta monitoring dan logging.', '#f59e0b', '2025-12-19', '2026-01-02', NULL, NULL, 10, 'pending', 0, NULL, NULL, '[{\"name\":\"Server live & staging aktif\",\"is_done\":false},{\"name\":\"Domain & SSL terkonfigurasi\",\"is_done\":false},{\"name\":\"CI\\/CD pipeline berjalan\",\"is_done\":false},{\"name\":\"Environment staging siap\",\"is_done\":false},{\"name\":\"Monitoring & alerting aktif\",\"is_done\":false}]', NULL, NULL, 0, '2026-02-24 08:31:52', '2026-02-24 08:31:52'),
(123, 19, 4, 'Pengembangan Frontend', 'Implementasi antarmuka berdasarkan desain yang disetujui: komponen UI, halaman-halaman utama, responsiveness, aksesibilitas, dan optimasi performa.', '#06b6d4', '2026-01-02', '2026-02-13', NULL, NULL, 30, 'pending', 0, NULL, NULL, '[{\"name\":\"Setup framework & struktur proyek\",\"is_done\":false},{\"name\":\"Komponen UI reusable\",\"is_done\":false},{\"name\":\"Halaman Beranda\",\"is_done\":false},{\"name\":\"Halaman-halaman dalam (sesuai sitemap)\",\"is_done\":false},{\"name\":\"Responsiveness mobile & tablet\",\"is_done\":false},{\"name\":\"Aksesibilitas (WCAG 2.1)\",\"is_done\":false},{\"name\":\"Optimasi performa (Lighthouse \\u226590)\",\"is_done\":false}]', NULL, NULL, 0, '2026-02-24 08:31:52', '2026-02-24 08:31:52'),
(124, 19, 5, 'Pengembangan Backend & API', 'Pengembangan API, integrasi CMS/database, sistem autentikasi, manajemen media, dan integrasi layanan pihak ketiga.', '#10b981', '2026-02-13', '2026-03-25', NULL, NULL, 28, 'pending', 0, NULL, NULL, '[{\"name\":\"Setup backend framework & database\",\"is_done\":false},{\"name\":\"REST API endpoint lengkap\",\"is_done\":false},{\"name\":\"Sistem autentikasi & otorisasi\",\"is_done\":false},{\"name\":\"Integrasi CMS \\/ headless CMS\",\"is_done\":false},{\"name\":\"Manajemen media (upload, resize)\",\"is_done\":false},{\"name\":\"Integrasi email \\/ notifikasi\",\"is_done\":false},{\"name\":\"Integrasi layanan 3rd party\",\"is_done\":false}]', NULL, NULL, 0, '2026-02-24 08:31:52', '2026-02-24 08:31:52'),
(125, 19, 6, 'Pengujian & QA', 'Unit testing, integration testing, UAT bersama klien, performance testing, security audit, cross-browser testing, dan bug fixing.', '#f97316', '2026-03-25', '2026-04-20', NULL, NULL, 18, 'pending', 0, NULL, NULL, '[{\"name\":\"Unit & integration testing selesai\",\"is_done\":false},{\"name\":\"UAT bersama klien selesai\",\"is_done\":false},{\"name\":\"Performance testing (load & stress)\",\"is_done\":false},{\"name\":\"Security audit & penetration test\",\"is_done\":false},{\"name\":\"Cross-browser & device testing\",\"is_done\":false},{\"name\":\"Semua bug critical & high terselesaikan\",\"is_done\":false},{\"name\":\"Sign-off UAT dari klien\",\"is_done\":false}]', NULL, NULL, 0, '2026-02-24 08:31:52', '2026-02-24 08:31:52'),
(126, 19, 7, 'Go-Live & Pemeliharaan', 'Deployment ke produksi, migrasi data & konten, DNS cutover, monitoring pasca-launch, pelatihan tim klien, dan serah terima dokumentasi.', '#14b8a6', '2026-04-20', '2026-05-04', NULL, NULL, 10, 'pending', 0, NULL, NULL, '[{\"name\":\"Deployment produksi berhasil\",\"is_done\":false},{\"name\":\"Migrasi data & konten selesai\",\"is_done\":false},{\"name\":\"DNS cutover & monitoring\",\"is_done\":false},{\"name\":\"Website live & berjalan normal\",\"is_done\":false},{\"name\":\"Pelatihan tim klien\",\"is_done\":false},{\"name\":\"Dokumentasi teknis & manual\",\"is_done\":false},{\"name\":\"Serah terima akses & aset\",\"is_done\":false}]', NULL, NULL, 0, '2026-02-24 08:31:52', '2026-02-24 08:31:52'),
(127, 20, 1, 'Perencanaan & Analisis', 'Analisis kebutuhan, audit website lama, penentuan scope, pembuatan dokumen spesifikasi, dan approval stakeholder.', '#8b5cf6', '2026-01-05', '2026-01-23', '2026-01-05', NULL, 14, 'in_progress', 100, NULL, NULL, '[{\"name\":\"Dokumen analisis kebutuhan\",\"is_done\":true},{\"name\":\"Hasil audit website lama\",\"is_done\":true},{\"name\":\"Dokumen scope & spesifikasi proyek\",\"is_done\":true},{\"name\":\"Estimasi waktu & anggaran\",\"is_done\":true},{\"name\":\"Sign-off stakeholder\",\"is_done\":true}]', NULL, NULL, 0, '2026-02-24 08:31:52', '2026-02-24 08:31:52'),
(128, 20, 2, 'Desain UI/UX', 'Wireframing, prototyping interaktif, pembuatan design system, mockup desktop & mobile, serta review dan approval desain final.', '#ec4899', '2026-01-23', '2026-02-23', NULL, NULL, 21, 'pending', 0, NULL, NULL, '[{\"name\":\"Wireframe semua halaman utama\",\"is_done\":false},{\"name\":\"Moodboard & style guide\",\"is_done\":false},{\"name\":\"Mockup desktop high-fidelity\",\"is_done\":false},{\"name\":\"Mockup mobile high-fidelity\",\"is_done\":false},{\"name\":\"Design system & component library\",\"is_done\":false},{\"name\":\"Prototype interaktif (Figma)\",\"is_done\":false},{\"name\":\"Design approval dari klien\",\"is_done\":false}]', NULL, NULL, 0, '2026-02-24 08:31:52', '2026-02-24 08:31:52'),
(129, 20, 3, 'Setup Infrastruktur', 'Provisioning server, konfigurasi domain & SSL, setup CI/CD pipeline, environment staging, serta monitoring dan logging.', '#f59e0b', '2026-02-23', '2026-03-09', NULL, NULL, 10, 'pending', 0, NULL, NULL, '[{\"name\":\"Server live & staging aktif\",\"is_done\":false},{\"name\":\"Domain & SSL terkonfigurasi\",\"is_done\":false},{\"name\":\"CI\\/CD pipeline berjalan\",\"is_done\":false},{\"name\":\"Environment staging siap\",\"is_done\":false},{\"name\":\"Monitoring & alerting aktif\",\"is_done\":false}]', NULL, NULL, 0, '2026-02-24 08:31:52', '2026-02-24 08:31:52'),
(130, 20, 4, 'Pengembangan Frontend', 'Implementasi antarmuka berdasarkan desain yang disetujui: komponen UI, halaman-halaman utama, responsiveness, aksesibilitas, dan optimasi performa.', '#06b6d4', '2026-03-09', '2026-04-20', NULL, NULL, 30, 'pending', 0, NULL, NULL, '[{\"name\":\"Setup framework & struktur proyek\",\"is_done\":false},{\"name\":\"Komponen UI reusable\",\"is_done\":false},{\"name\":\"Halaman Beranda\",\"is_done\":false},{\"name\":\"Halaman-halaman dalam (sesuai sitemap)\",\"is_done\":false},{\"name\":\"Responsiveness mobile & tablet\",\"is_done\":false},{\"name\":\"Aksesibilitas (WCAG 2.1)\",\"is_done\":false},{\"name\":\"Optimasi performa (Lighthouse \\u226590)\",\"is_done\":false}]', NULL, NULL, 0, '2026-02-24 08:31:52', '2026-02-24 08:31:52'),
(131, 20, 5, 'Pengembangan Backend & API', 'Pengembangan API, integrasi CMS/database, sistem autentikasi, manajemen media, dan integrasi layanan pihak ketiga.', '#10b981', '2026-04-20', '2026-05-28', NULL, NULL, 28, 'pending', 0, NULL, NULL, '[{\"name\":\"Setup backend framework & database\",\"is_done\":false},{\"name\":\"REST API endpoint lengkap\",\"is_done\":false},{\"name\":\"Sistem autentikasi & otorisasi\",\"is_done\":false},{\"name\":\"Integrasi CMS \\/ headless CMS\",\"is_done\":false},{\"name\":\"Manajemen media (upload, resize)\",\"is_done\":false},{\"name\":\"Integrasi email \\/ notifikasi\",\"is_done\":false},{\"name\":\"Integrasi layanan 3rd party\",\"is_done\":false}]', NULL, NULL, 0, '2026-02-24 08:31:52', '2026-02-24 08:31:52'),
(132, 20, 6, 'Pengujian & QA', 'Unit testing, integration testing, UAT bersama klien, performance testing, security audit, cross-browser testing, dan bug fixing.', '#f97316', '2026-05-28', '2026-06-23', NULL, NULL, 18, 'pending', 0, NULL, NULL, '[{\"name\":\"Unit & integration testing selesai\",\"is_done\":false},{\"name\":\"UAT bersama klien selesai\",\"is_done\":false},{\"name\":\"Performance testing (load & stress)\",\"is_done\":false},{\"name\":\"Security audit & penetration test\",\"is_done\":false},{\"name\":\"Cross-browser & device testing\",\"is_done\":false},{\"name\":\"Semua bug critical & high terselesaikan\",\"is_done\":false},{\"name\":\"Sign-off UAT dari klien\",\"is_done\":false}]', NULL, NULL, 0, '2026-02-24 08:31:52', '2026-02-24 08:31:52'),
(133, 20, 7, 'Go-Live & Pemeliharaan', 'Deployment ke produksi, migrasi data & konten, DNS cutover, monitoring pasca-launch, pelatihan tim klien, dan serah terima dokumentasi.', '#14b8a6', '2026-06-23', '2026-07-07', NULL, NULL, 10, 'pending', 0, NULL, NULL, '[{\"name\":\"Deployment produksi berhasil\",\"is_done\":false},{\"name\":\"Migrasi data & konten selesai\",\"is_done\":false},{\"name\":\"DNS cutover & monitoring\",\"is_done\":false},{\"name\":\"Website live & berjalan normal\",\"is_done\":false},{\"name\":\"Pelatihan tim klien\",\"is_done\":false},{\"name\":\"Dokumentasi teknis & manual\",\"is_done\":false},{\"name\":\"Serah terima akses & aset\",\"is_done\":false}]', NULL, NULL, 0, '2026-02-24 08:31:52', '2026-02-24 08:31:52'),
(134, 21, 1, 'Perencanaan & Analisis', 'Analisis kebutuhan, audit website lama, penentuan scope, pembuatan dokumen spesifikasi, dan approval stakeholder.', '#8b5cf6', '2025-12-21', '2026-01-08', '2025-12-21', NULL, 14, 'in_progress', 100, NULL, NULL, '[{\"name\":\"Dokumen analisis kebutuhan\",\"is_done\":true},{\"name\":\"Hasil audit website lama\",\"is_done\":true},{\"name\":\"Dokumen scope & spesifikasi proyek\",\"is_done\":true},{\"name\":\"Estimasi waktu & anggaran\",\"is_done\":true},{\"name\":\"Sign-off stakeholder\",\"is_done\":true}]', NULL, NULL, 0, '2026-02-24 08:31:52', '2026-02-24 08:31:52'),
(135, 21, 2, 'Desain UI/UX', 'Wireframing, prototyping interaktif, pembuatan design system, mockup desktop & mobile, serta review dan approval desain final.', '#ec4899', '2026-01-08', '2026-02-06', NULL, NULL, 21, 'pending', 0, NULL, NULL, '[{\"name\":\"Wireframe semua halaman utama\",\"is_done\":false},{\"name\":\"Moodboard & style guide\",\"is_done\":false},{\"name\":\"Mockup desktop high-fidelity\",\"is_done\":false},{\"name\":\"Mockup mobile high-fidelity\",\"is_done\":false},{\"name\":\"Design system & component library\",\"is_done\":false},{\"name\":\"Prototype interaktif (Figma)\",\"is_done\":false},{\"name\":\"Design approval dari klien\",\"is_done\":false}]', NULL, NULL, 0, '2026-02-24 08:31:52', '2026-02-24 08:31:52'),
(136, 21, 3, 'Setup Infrastruktur', 'Provisioning server, konfigurasi domain & SSL, setup CI/CD pipeline, environment staging, serta monitoring dan logging.', '#f59e0b', '2026-02-06', '2026-02-20', NULL, NULL, 10, 'pending', 0, NULL, NULL, '[{\"name\":\"Server live & staging aktif\",\"is_done\":false},{\"name\":\"Domain & SSL terkonfigurasi\",\"is_done\":false},{\"name\":\"CI\\/CD pipeline berjalan\",\"is_done\":false},{\"name\":\"Environment staging siap\",\"is_done\":false},{\"name\":\"Monitoring & alerting aktif\",\"is_done\":false}]', NULL, NULL, 0, '2026-02-24 08:31:52', '2026-02-24 08:31:52'),
(137, 21, 4, 'Pengembangan Frontend', 'Implementasi antarmuka berdasarkan desain yang disetujui: komponen UI, halaman-halaman utama, responsiveness, aksesibilitas, dan optimasi performa.', '#06b6d4', '2026-02-20', '2026-04-03', NULL, NULL, 30, 'pending', 0, NULL, NULL, '[{\"name\":\"Setup framework & struktur proyek\",\"is_done\":false},{\"name\":\"Komponen UI reusable\",\"is_done\":false},{\"name\":\"Halaman Beranda\",\"is_done\":false},{\"name\":\"Halaman-halaman dalam (sesuai sitemap)\",\"is_done\":false},{\"name\":\"Responsiveness mobile & tablet\",\"is_done\":false},{\"name\":\"Aksesibilitas (WCAG 2.1)\",\"is_done\":false},{\"name\":\"Optimasi performa (Lighthouse \\u226590)\",\"is_done\":false}]', NULL, NULL, 0, '2026-02-24 08:31:52', '2026-02-24 08:31:52'),
(138, 21, 5, 'Pengembangan Backend & API', 'Pengembangan API, integrasi CMS/database, sistem autentikasi, manajemen media, dan integrasi layanan pihak ketiga.', '#10b981', '2026-04-03', '2026-05-13', NULL, NULL, 28, 'pending', 0, NULL, NULL, '[{\"name\":\"Setup backend framework & database\",\"is_done\":false},{\"name\":\"REST API endpoint lengkap\",\"is_done\":false},{\"name\":\"Sistem autentikasi & otorisasi\",\"is_done\":false},{\"name\":\"Integrasi CMS \\/ headless CMS\",\"is_done\":false},{\"name\":\"Manajemen media (upload, resize)\",\"is_done\":false},{\"name\":\"Integrasi email \\/ notifikasi\",\"is_done\":false},{\"name\":\"Integrasi layanan 3rd party\",\"is_done\":false}]', NULL, NULL, 0, '2026-02-24 08:31:52', '2026-02-24 08:31:52'),
(139, 21, 6, 'Pengujian & QA', 'Unit testing, integration testing, UAT bersama klien, performance testing, security audit, cross-browser testing, dan bug fixing.', '#f97316', '2026-05-13', '2026-06-08', NULL, NULL, 18, 'pending', 0, NULL, NULL, '[{\"name\":\"Unit & integration testing selesai\",\"is_done\":false},{\"name\":\"UAT bersama klien selesai\",\"is_done\":false},{\"name\":\"Performance testing (load & stress)\",\"is_done\":false},{\"name\":\"Security audit & penetration test\",\"is_done\":false},{\"name\":\"Cross-browser & device testing\",\"is_done\":false},{\"name\":\"Semua bug critical & high terselesaikan\",\"is_done\":false},{\"name\":\"Sign-off UAT dari klien\",\"is_done\":false}]', NULL, NULL, 0, '2026-02-24 08:31:52', '2026-02-24 08:31:52'),
(140, 21, 7, 'Go-Live & Pemeliharaan', 'Deployment ke produksi, migrasi data & konten, DNS cutover, monitoring pasca-launch, pelatihan tim klien, dan serah terima dokumentasi.', '#14b8a6', '2026-06-08', '2026-06-22', NULL, NULL, 10, 'pending', 0, NULL, NULL, '[{\"name\":\"Deployment produksi berhasil\",\"is_done\":false},{\"name\":\"Migrasi data & konten selesai\",\"is_done\":false},{\"name\":\"DNS cutover & monitoring\",\"is_done\":false},{\"name\":\"Website live & berjalan normal\",\"is_done\":false},{\"name\":\"Pelatihan tim klien\",\"is_done\":false},{\"name\":\"Dokumentasi teknis & manual\",\"is_done\":false},{\"name\":\"Serah terima akses & aset\",\"is_done\":false}]', NULL, NULL, 0, '2026-02-24 08:31:52', '2026-02-24 08:31:52'),
(141, 22, 1, 'Perencanaan & Analisis', 'Analisis kebutuhan, audit website lama, penentuan scope, pembuatan dokumen spesifikasi, dan approval stakeholder.', '#8b5cf6', '2026-01-11', '2026-01-29', '2026-01-11', NULL, 14, 'in_progress', 100, NULL, NULL, '[{\"name\":\"Dokumen analisis kebutuhan\",\"is_done\":true},{\"name\":\"Hasil audit website lama\",\"is_done\":true},{\"name\":\"Dokumen scope & spesifikasi proyek\",\"is_done\":true},{\"name\":\"Estimasi waktu & anggaran\",\"is_done\":true},{\"name\":\"Sign-off stakeholder\",\"is_done\":true}]', NULL, NULL, 0, '2026-02-24 08:31:52', '2026-02-24 08:31:52'),
(142, 22, 2, 'Desain UI/UX', 'Wireframing, prototyping interaktif, pembuatan design system, mockup desktop & mobile, serta review dan approval desain final.', '#ec4899', '2026-01-29', '2026-02-27', NULL, NULL, 21, 'pending', 0, NULL, NULL, '[{\"name\":\"Wireframe semua halaman utama\",\"is_done\":false},{\"name\":\"Moodboard & style guide\",\"is_done\":false},{\"name\":\"Mockup desktop high-fidelity\",\"is_done\":false},{\"name\":\"Mockup mobile high-fidelity\",\"is_done\":false},{\"name\":\"Design system & component library\",\"is_done\":false},{\"name\":\"Prototype interaktif (Figma)\",\"is_done\":false},{\"name\":\"Design approval dari klien\",\"is_done\":false}]', NULL, NULL, 0, '2026-02-24 08:31:52', '2026-02-24 08:31:52'),
(143, 22, 3, 'Setup Infrastruktur', 'Provisioning server, konfigurasi domain & SSL, setup CI/CD pipeline, environment staging, serta monitoring dan logging.', '#f59e0b', '2026-02-27', '2026-03-13', NULL, NULL, 10, 'pending', 0, NULL, NULL, '[{\"name\":\"Server live & staging aktif\",\"is_done\":false},{\"name\":\"Domain & SSL terkonfigurasi\",\"is_done\":false},{\"name\":\"CI\\/CD pipeline berjalan\",\"is_done\":false},{\"name\":\"Environment staging siap\",\"is_done\":false},{\"name\":\"Monitoring & alerting aktif\",\"is_done\":false}]', NULL, NULL, 0, '2026-02-24 08:31:52', '2026-02-24 08:31:52'),
(144, 22, 4, 'Pengembangan Frontend', 'Implementasi antarmuka berdasarkan desain yang disetujui: komponen UI, halaman-halaman utama, responsiveness, aksesibilitas, dan optimasi performa.', '#06b6d4', '2026-03-13', '2026-04-24', NULL, NULL, 30, 'pending', 0, NULL, NULL, '[{\"name\":\"Setup framework & struktur proyek\",\"is_done\":false},{\"name\":\"Komponen UI reusable\",\"is_done\":false},{\"name\":\"Halaman Beranda\",\"is_done\":false},{\"name\":\"Halaman-halaman dalam (sesuai sitemap)\",\"is_done\":false},{\"name\":\"Responsiveness mobile & tablet\",\"is_done\":false},{\"name\":\"Aksesibilitas (WCAG 2.1)\",\"is_done\":false},{\"name\":\"Optimasi performa (Lighthouse \\u226590)\",\"is_done\":false}]', NULL, NULL, 0, '2026-02-24 08:31:52', '2026-02-24 08:31:52'),
(145, 22, 5, 'Pengembangan Backend & API', 'Pengembangan API, integrasi CMS/database, sistem autentikasi, manajemen media, dan integrasi layanan pihak ketiga.', '#10b981', '2026-04-24', '2026-06-03', NULL, NULL, 28, 'pending', 0, NULL, NULL, '[{\"name\":\"Setup backend framework & database\",\"is_done\":false},{\"name\":\"REST API endpoint lengkap\",\"is_done\":false},{\"name\":\"Sistem autentikasi & otorisasi\",\"is_done\":false},{\"name\":\"Integrasi CMS \\/ headless CMS\",\"is_done\":false},{\"name\":\"Manajemen media (upload, resize)\",\"is_done\":false},{\"name\":\"Integrasi email \\/ notifikasi\",\"is_done\":false},{\"name\":\"Integrasi layanan 3rd party\",\"is_done\":false}]', NULL, NULL, 0, '2026-02-24 08:31:52', '2026-02-24 08:31:52'),
(146, 22, 6, 'Pengujian & QA', 'Unit testing, integration testing, UAT bersama klien, performance testing, security audit, cross-browser testing, dan bug fixing.', '#f97316', '2026-06-03', '2026-06-29', NULL, NULL, 18, 'pending', 0, NULL, NULL, '[{\"name\":\"Unit & integration testing selesai\",\"is_done\":false},{\"name\":\"UAT bersama klien selesai\",\"is_done\":false},{\"name\":\"Performance testing (load & stress)\",\"is_done\":false},{\"name\":\"Security audit & penetration test\",\"is_done\":false},{\"name\":\"Cross-browser & device testing\",\"is_done\":false},{\"name\":\"Semua bug critical & high terselesaikan\",\"is_done\":false},{\"name\":\"Sign-off UAT dari klien\",\"is_done\":false}]', NULL, NULL, 0, '2026-02-24 08:31:52', '2026-02-24 08:31:52'),
(147, 22, 7, 'Go-Live & Pemeliharaan', 'Deployment ke produksi, migrasi data & konten, DNS cutover, monitoring pasca-launch, pelatihan tim klien, dan serah terima dokumentasi.', '#14b8a6', '2026-06-29', '2026-07-13', NULL, NULL, 10, 'pending', 0, NULL, NULL, '[{\"name\":\"Deployment produksi berhasil\",\"is_done\":false},{\"name\":\"Migrasi data & konten selesai\",\"is_done\":false},{\"name\":\"DNS cutover & monitoring\",\"is_done\":false},{\"name\":\"Website live & berjalan normal\",\"is_done\":false},{\"name\":\"Pelatihan tim klien\",\"is_done\":false},{\"name\":\"Dokumentasi teknis & manual\",\"is_done\":false},{\"name\":\"Serah terima akses & aset\",\"is_done\":false}]', NULL, NULL, 0, '2026-02-24 08:31:52', '2026-02-24 08:31:52'),
(148, 23, 1, 'Perencanaan & Analisis', 'Analisis kebutuhan, audit website lama, penentuan scope, pembuatan dokumen spesifikasi, dan approval stakeholder.', '#8b5cf6', '2026-02-12', '2026-03-04', '2026-02-12', NULL, 14, 'in_progress', 70, NULL, NULL, '[{\"name\":\"Dokumen analisis kebutuhan\",\"is_done\":true},{\"name\":\"Hasil audit website lama\",\"is_done\":true},{\"name\":\"Dokumen scope & spesifikasi proyek\",\"is_done\":true},{\"name\":\"Estimasi waktu & anggaran\",\"is_done\":false},{\"name\":\"Sign-off stakeholder\",\"is_done\":false}]', NULL, NULL, 0, '2026-02-24 08:31:52', '2026-02-24 08:31:52'),
(149, 23, 2, 'Desain UI/UX', 'Wireframing, prototyping interaktif, pembuatan design system, mockup desktop & mobile, serta review dan approval desain final.', '#ec4899', '2026-03-04', '2026-04-02', NULL, NULL, 21, 'pending', 0, NULL, NULL, '[{\"name\":\"Wireframe semua halaman utama\",\"is_done\":false},{\"name\":\"Moodboard & style guide\",\"is_done\":false},{\"name\":\"Mockup desktop high-fidelity\",\"is_done\":false},{\"name\":\"Mockup mobile high-fidelity\",\"is_done\":false},{\"name\":\"Design system & component library\",\"is_done\":false},{\"name\":\"Prototype interaktif (Figma)\",\"is_done\":false},{\"name\":\"Design approval dari klien\",\"is_done\":false}]', NULL, NULL, 0, '2026-02-24 08:31:52', '2026-02-24 08:31:52'),
(150, 23, 3, 'Setup Infrastruktur', 'Provisioning server, konfigurasi domain & SSL, setup CI/CD pipeline, environment staging, serta monitoring dan logging.', '#f59e0b', '2026-04-02', '2026-04-16', NULL, NULL, 10, 'pending', 0, NULL, NULL, '[{\"name\":\"Server live & staging aktif\",\"is_done\":false},{\"name\":\"Domain & SSL terkonfigurasi\",\"is_done\":false},{\"name\":\"CI\\/CD pipeline berjalan\",\"is_done\":false},{\"name\":\"Environment staging siap\",\"is_done\":false},{\"name\":\"Monitoring & alerting aktif\",\"is_done\":false}]', NULL, NULL, 0, '2026-02-24 08:31:52', '2026-02-24 08:31:52'),
(151, 23, 4, 'Pengembangan Frontend', 'Implementasi antarmuka berdasarkan desain yang disetujui: komponen UI, halaman-halaman utama, responsiveness, aksesibilitas, dan optimasi performa.', '#06b6d4', '2026-04-16', '2026-05-28', NULL, NULL, 30, 'pending', 0, NULL, NULL, '[{\"name\":\"Setup framework & struktur proyek\",\"is_done\":false},{\"name\":\"Komponen UI reusable\",\"is_done\":false},{\"name\":\"Halaman Beranda\",\"is_done\":false},{\"name\":\"Halaman-halaman dalam (sesuai sitemap)\",\"is_done\":false},{\"name\":\"Responsiveness mobile & tablet\",\"is_done\":false},{\"name\":\"Aksesibilitas (WCAG 2.1)\",\"is_done\":false},{\"name\":\"Optimasi performa (Lighthouse \\u226590)\",\"is_done\":false}]', NULL, NULL, 0, '2026-02-24 08:31:52', '2026-02-24 08:31:52'),
(152, 23, 5, 'Pengembangan Backend & API', 'Pengembangan API, integrasi CMS/database, sistem autentikasi, manajemen media, dan integrasi layanan pihak ketiga.', '#10b981', '2026-05-28', '2026-07-07', NULL, NULL, 28, 'pending', 0, NULL, NULL, '[{\"name\":\"Setup backend framework & database\",\"is_done\":false},{\"name\":\"REST API endpoint lengkap\",\"is_done\":false},{\"name\":\"Sistem autentikasi & otorisasi\",\"is_done\":false},{\"name\":\"Integrasi CMS \\/ headless CMS\",\"is_done\":false},{\"name\":\"Manajemen media (upload, resize)\",\"is_done\":false},{\"name\":\"Integrasi email \\/ notifikasi\",\"is_done\":false},{\"name\":\"Integrasi layanan 3rd party\",\"is_done\":false}]', NULL, NULL, 0, '2026-02-24 08:31:52', '2026-02-24 08:31:52');
INSERT INTO `phases` (`id`, `website_id`, `phase_order`, `name`, `description`, `color`, `planned_start`, `planned_end`, `actual_start`, `actual_end`, `estimated_days`, `status`, `progress`, `pic_name`, `assigned_team`, `deliverables`, `notes`, `blockers`, `is_overdue`, `created_at`, `updated_at`) VALUES
(153, 23, 6, 'Pengujian & QA', 'Unit testing, integration testing, UAT bersama klien, performance testing, security audit, cross-browser testing, dan bug fixing.', '#f97316', '2026-07-07', '2026-07-31', NULL, NULL, 18, 'pending', 0, NULL, NULL, '[{\"name\":\"Unit & integration testing selesai\",\"is_done\":false},{\"name\":\"UAT bersama klien selesai\",\"is_done\":false},{\"name\":\"Performance testing (load & stress)\",\"is_done\":false},{\"name\":\"Security audit & penetration test\",\"is_done\":false},{\"name\":\"Cross-browser & device testing\",\"is_done\":false},{\"name\":\"Semua bug critical & high terselesaikan\",\"is_done\":false},{\"name\":\"Sign-off UAT dari klien\",\"is_done\":false}]', NULL, NULL, 0, '2026-02-24 08:31:52', '2026-02-24 08:31:52'),
(154, 23, 7, 'Go-Live & Pemeliharaan', 'Deployment ke produksi, migrasi data & konten, DNS cutover, monitoring pasca-launch, pelatihan tim klien, dan serah terima dokumentasi.', '#14b8a6', '2026-07-31', '2026-08-14', NULL, NULL, 10, 'pending', 0, NULL, NULL, '[{\"name\":\"Deployment produksi berhasil\",\"is_done\":false},{\"name\":\"Migrasi data & konten selesai\",\"is_done\":false},{\"name\":\"DNS cutover & monitoring\",\"is_done\":false},{\"name\":\"Website live & berjalan normal\",\"is_done\":false},{\"name\":\"Pelatihan tim klien\",\"is_done\":false},{\"name\":\"Dokumentasi teknis & manual\",\"is_done\":false},{\"name\":\"Serah terima akses & aset\",\"is_done\":false}]', NULL, NULL, 0, '2026-02-24 08:31:52', '2026-02-24 08:31:52'),
(155, 24, 1, 'Perencanaan & Analisis', 'Analisis kebutuhan, audit website lama, penentuan scope, pembuatan dokumen spesifikasi, dan approval stakeholder.', '#8b5cf6', '2025-09-12', '2025-10-02', '2025-09-12', '2025-10-02', 14, 'completed', 100, NULL, NULL, '[{\"name\":\"Dokumen analisis kebutuhan\",\"is_done\":true},{\"name\":\"Hasil audit website lama\",\"is_done\":true},{\"name\":\"Dokumen scope & spesifikasi proyek\",\"is_done\":true},{\"name\":\"Estimasi waktu & anggaran\",\"is_done\":true},{\"name\":\"Sign-off stakeholder\",\"is_done\":true}]', NULL, NULL, 0, '2026-02-24 08:31:52', '2026-02-24 08:31:52'),
(156, 24, 2, 'Desain UI/UX', 'Wireframing, prototyping interaktif, pembuatan design system, mockup desktop & mobile, serta review dan approval desain final.', '#ec4899', '2025-10-02', '2025-10-31', '2025-10-02', NULL, 21, 'in_progress', 100, NULL, NULL, '[{\"name\":\"Wireframe semua halaman utama\",\"is_done\":true},{\"name\":\"Moodboard & style guide\",\"is_done\":true},{\"name\":\"Mockup desktop high-fidelity\",\"is_done\":true},{\"name\":\"Mockup mobile high-fidelity\",\"is_done\":true},{\"name\":\"Design system & component library\",\"is_done\":true},{\"name\":\"Prototype interaktif (Figma)\",\"is_done\":true},{\"name\":\"Design approval dari klien\",\"is_done\":true}]', NULL, NULL, 0, '2026-02-24 08:31:52', '2026-02-24 08:31:52'),
(157, 24, 3, 'Setup Infrastruktur', 'Provisioning server, konfigurasi domain & SSL, setup CI/CD pipeline, environment staging, serta monitoring dan logging.', '#f59e0b', '2025-10-31', '2025-11-14', NULL, NULL, 10, 'pending', 0, NULL, NULL, '[{\"name\":\"Server live & staging aktif\",\"is_done\":false},{\"name\":\"Domain & SSL terkonfigurasi\",\"is_done\":false},{\"name\":\"CI\\/CD pipeline berjalan\",\"is_done\":false},{\"name\":\"Environment staging siap\",\"is_done\":false},{\"name\":\"Monitoring & alerting aktif\",\"is_done\":false}]', NULL, NULL, 0, '2026-02-24 08:31:52', '2026-02-24 08:31:52'),
(158, 24, 4, 'Pengembangan Frontend', 'Implementasi antarmuka berdasarkan desain yang disetujui: komponen UI, halaman-halaman utama, responsiveness, aksesibilitas, dan optimasi performa.', '#06b6d4', '2025-11-14', '2025-12-26', NULL, NULL, 30, 'pending', 0, NULL, NULL, '[{\"name\":\"Setup framework & struktur proyek\",\"is_done\":false},{\"name\":\"Komponen UI reusable\",\"is_done\":false},{\"name\":\"Halaman Beranda\",\"is_done\":false},{\"name\":\"Halaman-halaman dalam (sesuai sitemap)\",\"is_done\":false},{\"name\":\"Responsiveness mobile & tablet\",\"is_done\":false},{\"name\":\"Aksesibilitas (WCAG 2.1)\",\"is_done\":false},{\"name\":\"Optimasi performa (Lighthouse \\u226590)\",\"is_done\":false}]', NULL, NULL, 0, '2026-02-24 08:31:52', '2026-02-24 08:31:52'),
(159, 24, 5, 'Pengembangan Backend & API', 'Pengembangan API, integrasi CMS/database, sistem autentikasi, manajemen media, dan integrasi layanan pihak ketiga.', '#10b981', '2025-12-26', '2026-02-04', NULL, NULL, 28, 'pending', 0, NULL, NULL, '[{\"name\":\"Setup backend framework & database\",\"is_done\":false},{\"name\":\"REST API endpoint lengkap\",\"is_done\":false},{\"name\":\"Sistem autentikasi & otorisasi\",\"is_done\":false},{\"name\":\"Integrasi CMS \\/ headless CMS\",\"is_done\":false},{\"name\":\"Manajemen media (upload, resize)\",\"is_done\":false},{\"name\":\"Integrasi email \\/ notifikasi\",\"is_done\":false},{\"name\":\"Integrasi layanan 3rd party\",\"is_done\":false}]', NULL, NULL, 0, '2026-02-24 08:31:52', '2026-02-24 08:31:52'),
(160, 24, 6, 'Pengujian & QA', 'Unit testing, integration testing, UAT bersama klien, performance testing, security audit, cross-browser testing, dan bug fixing.', '#f97316', '2026-02-04', '2026-03-02', NULL, NULL, 18, 'pending', 0, NULL, NULL, '[{\"name\":\"Unit & integration testing selesai\",\"is_done\":false},{\"name\":\"UAT bersama klien selesai\",\"is_done\":false},{\"name\":\"Performance testing (load & stress)\",\"is_done\":false},{\"name\":\"Security audit & penetration test\",\"is_done\":false},{\"name\":\"Cross-browser & device testing\",\"is_done\":false},{\"name\":\"Semua bug critical & high terselesaikan\",\"is_done\":false},{\"name\":\"Sign-off UAT dari klien\",\"is_done\":false}]', NULL, NULL, 0, '2026-02-24 08:31:52', '2026-02-24 08:31:52'),
(161, 24, 7, 'Go-Live & Pemeliharaan', 'Deployment ke produksi, migrasi data & konten, DNS cutover, monitoring pasca-launch, pelatihan tim klien, dan serah terima dokumentasi.', '#14b8a6', '2026-03-02', '2026-03-16', NULL, NULL, 10, 'pending', 0, NULL, NULL, '[{\"name\":\"Deployment produksi berhasil\",\"is_done\":false},{\"name\":\"Migrasi data & konten selesai\",\"is_done\":false},{\"name\":\"DNS cutover & monitoring\",\"is_done\":false},{\"name\":\"Website live & berjalan normal\",\"is_done\":false},{\"name\":\"Pelatihan tim klien\",\"is_done\":false},{\"name\":\"Dokumentasi teknis & manual\",\"is_done\":false},{\"name\":\"Serah terima akses & aset\",\"is_done\":false}]', NULL, NULL, 0, '2026-02-24 08:31:52', '2026-02-24 08:31:52'),
(162, 25, 1, 'Perencanaan & Analisis', 'Analisis kebutuhan, audit website lama, penentuan scope, pembuatan dokumen spesifikasi, dan approval stakeholder.', '#8b5cf6', '2026-01-17', '2026-02-05', '2026-01-17', NULL, 14, 'in_progress', 100, NULL, NULL, '[{\"name\":\"Dokumen analisis kebutuhan\",\"is_done\":true},{\"name\":\"Hasil audit website lama\",\"is_done\":true},{\"name\":\"Dokumen scope & spesifikasi proyek\",\"is_done\":true},{\"name\":\"Estimasi waktu & anggaran\",\"is_done\":true},{\"name\":\"Sign-off stakeholder\",\"is_done\":true}]', NULL, NULL, 0, '2026-02-24 08:31:52', '2026-02-24 08:31:52'),
(163, 25, 2, 'Desain UI/UX', 'Wireframing, prototyping interaktif, pembuatan design system, mockup desktop & mobile, serta review dan approval desain final.', '#ec4899', '2026-02-05', '2026-03-06', NULL, NULL, 21, 'pending', 0, NULL, NULL, '[{\"name\":\"Wireframe semua halaman utama\",\"is_done\":false},{\"name\":\"Moodboard & style guide\",\"is_done\":false},{\"name\":\"Mockup desktop high-fidelity\",\"is_done\":false},{\"name\":\"Mockup mobile high-fidelity\",\"is_done\":false},{\"name\":\"Design system & component library\",\"is_done\":false},{\"name\":\"Prototype interaktif (Figma)\",\"is_done\":false},{\"name\":\"Design approval dari klien\",\"is_done\":false}]', NULL, NULL, 0, '2026-02-24 08:31:52', '2026-02-24 08:31:52'),
(164, 25, 3, 'Setup Infrastruktur', 'Provisioning server, konfigurasi domain & SSL, setup CI/CD pipeline, environment staging, serta monitoring dan logging.', '#f59e0b', '2026-03-06', '2026-03-20', NULL, NULL, 10, 'pending', 0, NULL, NULL, '[{\"name\":\"Server live & staging aktif\",\"is_done\":false},{\"name\":\"Domain & SSL terkonfigurasi\",\"is_done\":false},{\"name\":\"CI\\/CD pipeline berjalan\",\"is_done\":false},{\"name\":\"Environment staging siap\",\"is_done\":false},{\"name\":\"Monitoring & alerting aktif\",\"is_done\":false}]', NULL, NULL, 0, '2026-02-24 08:31:52', '2026-02-24 08:31:52'),
(165, 25, 4, 'Pengembangan Frontend', 'Implementasi antarmuka berdasarkan desain yang disetujui: komponen UI, halaman-halaman utama, responsiveness, aksesibilitas, dan optimasi performa.', '#06b6d4', '2026-03-20', '2026-05-01', NULL, NULL, 30, 'pending', 0, NULL, NULL, '[{\"name\":\"Setup framework & struktur proyek\",\"is_done\":false},{\"name\":\"Komponen UI reusable\",\"is_done\":false},{\"name\":\"Halaman Beranda\",\"is_done\":false},{\"name\":\"Halaman-halaman dalam (sesuai sitemap)\",\"is_done\":false},{\"name\":\"Responsiveness mobile & tablet\",\"is_done\":false},{\"name\":\"Aksesibilitas (WCAG 2.1)\",\"is_done\":false},{\"name\":\"Optimasi performa (Lighthouse \\u226590)\",\"is_done\":false}]', NULL, NULL, 0, '2026-02-24 08:31:52', '2026-02-24 08:31:52'),
(166, 25, 5, 'Pengembangan Backend & API', 'Pengembangan API, integrasi CMS/database, sistem autentikasi, manajemen media, dan integrasi layanan pihak ketiga.', '#10b981', '2026-05-01', '2026-06-10', NULL, NULL, 28, 'pending', 0, NULL, NULL, '[{\"name\":\"Setup backend framework & database\",\"is_done\":false},{\"name\":\"REST API endpoint lengkap\",\"is_done\":false},{\"name\":\"Sistem autentikasi & otorisasi\",\"is_done\":false},{\"name\":\"Integrasi CMS \\/ headless CMS\",\"is_done\":false},{\"name\":\"Manajemen media (upload, resize)\",\"is_done\":false},{\"name\":\"Integrasi email \\/ notifikasi\",\"is_done\":false},{\"name\":\"Integrasi layanan 3rd party\",\"is_done\":false}]', NULL, NULL, 0, '2026-02-24 08:31:52', '2026-02-24 08:31:52'),
(167, 25, 6, 'Pengujian & QA', 'Unit testing, integration testing, UAT bersama klien, performance testing, security audit, cross-browser testing, dan bug fixing.', '#f97316', '2026-06-10', '2026-07-06', NULL, NULL, 18, 'pending', 0, NULL, NULL, '[{\"name\":\"Unit & integration testing selesai\",\"is_done\":false},{\"name\":\"UAT bersama klien selesai\",\"is_done\":false},{\"name\":\"Performance testing (load & stress)\",\"is_done\":false},{\"name\":\"Security audit & penetration test\",\"is_done\":false},{\"name\":\"Cross-browser & device testing\",\"is_done\":false},{\"name\":\"Semua bug critical & high terselesaikan\",\"is_done\":false},{\"name\":\"Sign-off UAT dari klien\",\"is_done\":false}]', NULL, NULL, 0, '2026-02-24 08:31:52', '2026-02-24 08:31:52'),
(168, 25, 7, 'Go-Live & Pemeliharaan', 'Deployment ke produksi, migrasi data & konten, DNS cutover, monitoring pasca-launch, pelatihan tim klien, dan serah terima dokumentasi.', '#14b8a6', '2026-07-06', '2026-07-20', NULL, NULL, 10, 'pending', 0, NULL, NULL, '[{\"name\":\"Deployment produksi berhasil\",\"is_done\":false},{\"name\":\"Migrasi data & konten selesai\",\"is_done\":false},{\"name\":\"DNS cutover & monitoring\",\"is_done\":false},{\"name\":\"Website live & berjalan normal\",\"is_done\":false},{\"name\":\"Pelatihan tim klien\",\"is_done\":false},{\"name\":\"Dokumentasi teknis & manual\",\"is_done\":false},{\"name\":\"Serah terima akses & aset\",\"is_done\":false}]', NULL, NULL, 0, '2026-02-24 08:31:52', '2026-02-24 08:31:52'),
(169, 26, 1, 'Perencanaan & Analisis', 'Analisis kebutuhan, audit website lama, penentuan scope, pembuatan dokumen spesifikasi, dan approval stakeholder.', '#8b5cf6', '2025-10-15', '2025-11-04', '2025-10-15', NULL, 14, 'review', 100, NULL, NULL, '[{\"name\":\"Dokumen analisis kebutuhan\",\"is_done\":true},{\"name\":\"Hasil audit website lama\",\"is_done\":true},{\"name\":\"Dokumen scope & spesifikasi proyek\",\"is_done\":true},{\"name\":\"Estimasi waktu & anggaran\",\"is_done\":true},{\"name\":\"Sign-off stakeholder\",\"is_done\":true}]', NULL, NULL, 0, '2026-02-24 08:31:52', '2026-02-24 08:31:52'),
(170, 26, 2, 'Desain UI/UX', 'Wireframing, prototyping interaktif, pembuatan design system, mockup desktop & mobile, serta review dan approval desain final.', '#ec4899', '2025-11-04', '2025-12-03', NULL, NULL, 21, 'pending', 0, NULL, NULL, '[{\"name\":\"Wireframe semua halaman utama\",\"is_done\":false},{\"name\":\"Moodboard & style guide\",\"is_done\":false},{\"name\":\"Mockup desktop high-fidelity\",\"is_done\":false},{\"name\":\"Mockup mobile high-fidelity\",\"is_done\":false},{\"name\":\"Design system & component library\",\"is_done\":false},{\"name\":\"Prototype interaktif (Figma)\",\"is_done\":false},{\"name\":\"Design approval dari klien\",\"is_done\":false}]', NULL, NULL, 0, '2026-02-24 08:31:52', '2026-02-24 08:31:52'),
(171, 26, 3, 'Setup Infrastruktur', 'Provisioning server, konfigurasi domain & SSL, setup CI/CD pipeline, environment staging, serta monitoring dan logging.', '#f59e0b', '2025-12-03', '2025-12-17', NULL, NULL, 10, 'pending', 0, NULL, NULL, '[{\"name\":\"Server live & staging aktif\",\"is_done\":false},{\"name\":\"Domain & SSL terkonfigurasi\",\"is_done\":false},{\"name\":\"CI\\/CD pipeline berjalan\",\"is_done\":false},{\"name\":\"Environment staging siap\",\"is_done\":false},{\"name\":\"Monitoring & alerting aktif\",\"is_done\":false}]', NULL, NULL, 0, '2026-02-24 08:31:52', '2026-02-24 08:31:52'),
(172, 26, 4, 'Pengembangan Frontend', 'Implementasi antarmuka berdasarkan desain yang disetujui: komponen UI, halaman-halaman utama, responsiveness, aksesibilitas, dan optimasi performa.', '#06b6d4', '2025-12-17', '2026-01-28', NULL, NULL, 30, 'pending', 0, NULL, NULL, '[{\"name\":\"Setup framework & struktur proyek\",\"is_done\":false},{\"name\":\"Komponen UI reusable\",\"is_done\":false},{\"name\":\"Halaman Beranda\",\"is_done\":false},{\"name\":\"Halaman-halaman dalam (sesuai sitemap)\",\"is_done\":false},{\"name\":\"Responsiveness mobile & tablet\",\"is_done\":false},{\"name\":\"Aksesibilitas (WCAG 2.1)\",\"is_done\":false},{\"name\":\"Optimasi performa (Lighthouse \\u226590)\",\"is_done\":false}]', NULL, NULL, 0, '2026-02-24 08:31:52', '2026-02-24 08:31:52'),
(173, 26, 5, 'Pengembangan Backend & API', 'Pengembangan API, integrasi CMS/database, sistem autentikasi, manajemen media, dan integrasi layanan pihak ketiga.', '#10b981', '2026-01-28', '2026-03-09', NULL, NULL, 28, 'pending', 0, NULL, NULL, '[{\"name\":\"Setup backend framework & database\",\"is_done\":false},{\"name\":\"REST API endpoint lengkap\",\"is_done\":false},{\"name\":\"Sistem autentikasi & otorisasi\",\"is_done\":false},{\"name\":\"Integrasi CMS \\/ headless CMS\",\"is_done\":false},{\"name\":\"Manajemen media (upload, resize)\",\"is_done\":false},{\"name\":\"Integrasi email \\/ notifikasi\",\"is_done\":false},{\"name\":\"Integrasi layanan 3rd party\",\"is_done\":false}]', NULL, NULL, 0, '2026-02-24 08:31:52', '2026-02-24 08:31:52'),
(174, 26, 6, 'Pengujian & QA', 'Unit testing, integration testing, UAT bersama klien, performance testing, security audit, cross-browser testing, dan bug fixing.', '#f97316', '2026-03-09', '2026-04-02', NULL, NULL, 18, 'pending', 0, NULL, NULL, '[{\"name\":\"Unit & integration testing selesai\",\"is_done\":false},{\"name\":\"UAT bersama klien selesai\",\"is_done\":false},{\"name\":\"Performance testing (load & stress)\",\"is_done\":false},{\"name\":\"Security audit & penetration test\",\"is_done\":false},{\"name\":\"Cross-browser & device testing\",\"is_done\":false},{\"name\":\"Semua bug critical & high terselesaikan\",\"is_done\":false},{\"name\":\"Sign-off UAT dari klien\",\"is_done\":false}]', NULL, NULL, 0, '2026-02-24 08:31:52', '2026-02-24 08:31:52'),
(175, 26, 7, 'Go-Live & Pemeliharaan', 'Deployment ke produksi, migrasi data & konten, DNS cutover, monitoring pasca-launch, pelatihan tim klien, dan serah terima dokumentasi.', '#14b8a6', '2026-04-02', '2026-04-16', NULL, NULL, 10, 'pending', 0, NULL, NULL, '[{\"name\":\"Deployment produksi berhasil\",\"is_done\":false},{\"name\":\"Migrasi data & konten selesai\",\"is_done\":false},{\"name\":\"DNS cutover & monitoring\",\"is_done\":false},{\"name\":\"Website live & berjalan normal\",\"is_done\":false},{\"name\":\"Pelatihan tim klien\",\"is_done\":false},{\"name\":\"Dokumentasi teknis & manual\",\"is_done\":false},{\"name\":\"Serah terima akses & aset\",\"is_done\":false}]', NULL, NULL, 0, '2026-02-24 08:31:52', '2026-02-24 08:31:52'),
(176, 27, 1, 'Perencanaan & Analisis', 'Analisis kebutuhan, audit website lama, penentuan scope, pembuatan dokumen spesifikasi, dan approval stakeholder.', '#8b5cf6', '2025-12-31', '2026-01-20', '2025-12-31', NULL, 14, 'in_progress', 100, NULL, NULL, '[{\"name\":\"Dokumen analisis kebutuhan\",\"is_done\":true},{\"name\":\"Hasil audit website lama\",\"is_done\":true},{\"name\":\"Dokumen scope & spesifikasi proyek\",\"is_done\":true},{\"name\":\"Estimasi waktu & anggaran\",\"is_done\":true},{\"name\":\"Sign-off stakeholder\",\"is_done\":true}]', NULL, NULL, 0, '2026-02-24 08:31:52', '2026-02-24 08:31:52'),
(177, 27, 2, 'Desain UI/UX', 'Wireframing, prototyping interaktif, pembuatan design system, mockup desktop & mobile, serta review dan approval desain final.', '#ec4899', '2026-01-20', '2026-02-18', NULL, NULL, 21, 'pending', 0, NULL, NULL, '[{\"name\":\"Wireframe semua halaman utama\",\"is_done\":false},{\"name\":\"Moodboard & style guide\",\"is_done\":false},{\"name\":\"Mockup desktop high-fidelity\",\"is_done\":false},{\"name\":\"Mockup mobile high-fidelity\",\"is_done\":false},{\"name\":\"Design system & component library\",\"is_done\":false},{\"name\":\"Prototype interaktif (Figma)\",\"is_done\":false},{\"name\":\"Design approval dari klien\",\"is_done\":false}]', NULL, NULL, 0, '2026-02-24 08:31:52', '2026-02-24 08:31:52'),
(178, 27, 3, 'Setup Infrastruktur', 'Provisioning server, konfigurasi domain & SSL, setup CI/CD pipeline, environment staging, serta monitoring dan logging.', '#f59e0b', '2026-02-18', '2026-03-04', NULL, NULL, 10, 'pending', 0, NULL, NULL, '[{\"name\":\"Server live & staging aktif\",\"is_done\":false},{\"name\":\"Domain & SSL terkonfigurasi\",\"is_done\":false},{\"name\":\"CI\\/CD pipeline berjalan\",\"is_done\":false},{\"name\":\"Environment staging siap\",\"is_done\":false},{\"name\":\"Monitoring & alerting aktif\",\"is_done\":false}]', NULL, NULL, 0, '2026-02-24 08:31:52', '2026-02-24 08:31:52'),
(179, 27, 4, 'Pengembangan Frontend', 'Implementasi antarmuka berdasarkan desain yang disetujui: komponen UI, halaman-halaman utama, responsiveness, aksesibilitas, dan optimasi performa.', '#06b6d4', '2026-03-04', '2026-04-15', NULL, NULL, 30, 'pending', 0, NULL, NULL, '[{\"name\":\"Setup framework & struktur proyek\",\"is_done\":false},{\"name\":\"Komponen UI reusable\",\"is_done\":false},{\"name\":\"Halaman Beranda\",\"is_done\":false},{\"name\":\"Halaman-halaman dalam (sesuai sitemap)\",\"is_done\":false},{\"name\":\"Responsiveness mobile & tablet\",\"is_done\":false},{\"name\":\"Aksesibilitas (WCAG 2.1)\",\"is_done\":false},{\"name\":\"Optimasi performa (Lighthouse \\u226590)\",\"is_done\":false}]', NULL, NULL, 0, '2026-02-24 08:31:52', '2026-02-24 08:31:52'),
(180, 27, 5, 'Pengembangan Backend & API', 'Pengembangan API, integrasi CMS/database, sistem autentikasi, manajemen media, dan integrasi layanan pihak ketiga.', '#10b981', '2026-04-15', '2026-05-25', NULL, NULL, 28, 'pending', 0, NULL, NULL, '[{\"name\":\"Setup backend framework & database\",\"is_done\":false},{\"name\":\"REST API endpoint lengkap\",\"is_done\":false},{\"name\":\"Sistem autentikasi & otorisasi\",\"is_done\":false},{\"name\":\"Integrasi CMS \\/ headless CMS\",\"is_done\":false},{\"name\":\"Manajemen media (upload, resize)\",\"is_done\":false},{\"name\":\"Integrasi email \\/ notifikasi\",\"is_done\":false},{\"name\":\"Integrasi layanan 3rd party\",\"is_done\":false}]', NULL, NULL, 0, '2026-02-24 08:31:52', '2026-02-24 08:31:52'),
(181, 27, 6, 'Pengujian & QA', 'Unit testing, integration testing, UAT bersama klien, performance testing, security audit, cross-browser testing, dan bug fixing.', '#f97316', '2026-05-25', '2026-06-18', NULL, NULL, 18, 'pending', 0, NULL, NULL, '[{\"name\":\"Unit & integration testing selesai\",\"is_done\":false},{\"name\":\"UAT bersama klien selesai\",\"is_done\":false},{\"name\":\"Performance testing (load & stress)\",\"is_done\":false},{\"name\":\"Security audit & penetration test\",\"is_done\":false},{\"name\":\"Cross-browser & device testing\",\"is_done\":false},{\"name\":\"Semua bug critical & high terselesaikan\",\"is_done\":false},{\"name\":\"Sign-off UAT dari klien\",\"is_done\":false}]', NULL, NULL, 0, '2026-02-24 08:31:52', '2026-02-24 08:31:52'),
(182, 27, 7, 'Go-Live & Pemeliharaan', 'Deployment ke produksi, migrasi data & konten, DNS cutover, monitoring pasca-launch, pelatihan tim klien, dan serah terima dokumentasi.', '#14b8a6', '2026-06-18', '2026-07-02', NULL, NULL, 10, 'pending', 0, NULL, NULL, '[{\"name\":\"Deployment produksi berhasil\",\"is_done\":false},{\"name\":\"Migrasi data & konten selesai\",\"is_done\":false},{\"name\":\"DNS cutover & monitoring\",\"is_done\":false},{\"name\":\"Website live & berjalan normal\",\"is_done\":false},{\"name\":\"Pelatihan tim klien\",\"is_done\":false},{\"name\":\"Dokumentasi teknis & manual\",\"is_done\":false},{\"name\":\"Serah terima akses & aset\",\"is_done\":false}]', NULL, NULL, 0, '2026-02-24 08:31:52', '2026-02-24 08:31:52'),
(183, 28, 1, 'Perencanaan & Analisis', 'Analisis kebutuhan, audit website lama, penentuan scope, pembuatan dokumen spesifikasi, dan approval stakeholder.', '#8b5cf6', '2025-11-28', '2025-12-18', '2025-11-28', NULL, 14, 'in_progress', 100, NULL, NULL, '[{\"name\":\"Dokumen analisis kebutuhan\",\"is_done\":true},{\"name\":\"Hasil audit website lama\",\"is_done\":true},{\"name\":\"Dokumen scope & spesifikasi proyek\",\"is_done\":true},{\"name\":\"Estimasi waktu & anggaran\",\"is_done\":true},{\"name\":\"Sign-off stakeholder\",\"is_done\":true}]', NULL, NULL, 0, '2026-02-24 08:31:52', '2026-02-24 08:31:52'),
(184, 28, 2, 'Desain UI/UX', 'Wireframing, prototyping interaktif, pembuatan design system, mockup desktop & mobile, serta review dan approval desain final.', '#ec4899', '2025-12-18', '2026-01-16', NULL, NULL, 21, 'pending', 0, NULL, NULL, '[{\"name\":\"Wireframe semua halaman utama\",\"is_done\":false},{\"name\":\"Moodboard & style guide\",\"is_done\":false},{\"name\":\"Mockup desktop high-fidelity\",\"is_done\":false},{\"name\":\"Mockup mobile high-fidelity\",\"is_done\":false},{\"name\":\"Design system & component library\",\"is_done\":false},{\"name\":\"Prototype interaktif (Figma)\",\"is_done\":false},{\"name\":\"Design approval dari klien\",\"is_done\":false}]', NULL, NULL, 0, '2026-02-24 08:31:52', '2026-02-24 08:31:52'),
(185, 28, 3, 'Setup Infrastruktur', 'Provisioning server, konfigurasi domain & SSL, setup CI/CD pipeline, environment staging, serta monitoring dan logging.', '#f59e0b', '2026-01-16', '2026-01-30', NULL, NULL, 10, 'pending', 0, NULL, NULL, '[{\"name\":\"Server live & staging aktif\",\"is_done\":false},{\"name\":\"Domain & SSL terkonfigurasi\",\"is_done\":false},{\"name\":\"CI\\/CD pipeline berjalan\",\"is_done\":false},{\"name\":\"Environment staging siap\",\"is_done\":false},{\"name\":\"Monitoring & alerting aktif\",\"is_done\":false}]', NULL, NULL, 0, '2026-02-24 08:31:52', '2026-02-24 08:31:52'),
(186, 28, 4, 'Pengembangan Frontend', 'Implementasi antarmuka berdasarkan desain yang disetujui: komponen UI, halaman-halaman utama, responsiveness, aksesibilitas, dan optimasi performa.', '#06b6d4', '2026-01-30', '2026-03-13', NULL, NULL, 30, 'pending', 0, NULL, NULL, '[{\"name\":\"Setup framework & struktur proyek\",\"is_done\":false},{\"name\":\"Komponen UI reusable\",\"is_done\":false},{\"name\":\"Halaman Beranda\",\"is_done\":false},{\"name\":\"Halaman-halaman dalam (sesuai sitemap)\",\"is_done\":false},{\"name\":\"Responsiveness mobile & tablet\",\"is_done\":false},{\"name\":\"Aksesibilitas (WCAG 2.1)\",\"is_done\":false},{\"name\":\"Optimasi performa (Lighthouse \\u226590)\",\"is_done\":false}]', NULL, NULL, 0, '2026-02-24 08:31:52', '2026-02-24 08:31:52'),
(187, 28, 5, 'Pengembangan Backend & API', 'Pengembangan API, integrasi CMS/database, sistem autentikasi, manajemen media, dan integrasi layanan pihak ketiga.', '#10b981', '2026-03-13', '2026-04-22', NULL, NULL, 28, 'pending', 0, NULL, NULL, '[{\"name\":\"Setup backend framework & database\",\"is_done\":false},{\"name\":\"REST API endpoint lengkap\",\"is_done\":false},{\"name\":\"Sistem autentikasi & otorisasi\",\"is_done\":false},{\"name\":\"Integrasi CMS \\/ headless CMS\",\"is_done\":false},{\"name\":\"Manajemen media (upload, resize)\",\"is_done\":false},{\"name\":\"Integrasi email \\/ notifikasi\",\"is_done\":false},{\"name\":\"Integrasi layanan 3rd party\",\"is_done\":false}]', NULL, NULL, 0, '2026-02-24 08:31:52', '2026-02-24 08:31:52'),
(188, 28, 6, 'Pengujian & QA', 'Unit testing, integration testing, UAT bersama klien, performance testing, security audit, cross-browser testing, dan bug fixing.', '#f97316', '2026-04-22', '2026-05-18', NULL, NULL, 18, 'pending', 0, NULL, NULL, '[{\"name\":\"Unit & integration testing selesai\",\"is_done\":false},{\"name\":\"UAT bersama klien selesai\",\"is_done\":false},{\"name\":\"Performance testing (load & stress)\",\"is_done\":false},{\"name\":\"Security audit & penetration test\",\"is_done\":false},{\"name\":\"Cross-browser & device testing\",\"is_done\":false},{\"name\":\"Semua bug critical & high terselesaikan\",\"is_done\":false},{\"name\":\"Sign-off UAT dari klien\",\"is_done\":false}]', NULL, NULL, 0, '2026-02-24 08:31:52', '2026-02-24 08:31:52'),
(189, 28, 7, 'Go-Live & Pemeliharaan', 'Deployment ke produksi, migrasi data & konten, DNS cutover, monitoring pasca-launch, pelatihan tim klien, dan serah terima dokumentasi.', '#14b8a6', '2026-05-18', '2026-06-01', NULL, NULL, 10, 'pending', 0, NULL, NULL, '[{\"name\":\"Deployment produksi berhasil\",\"is_done\":false},{\"name\":\"Migrasi data & konten selesai\",\"is_done\":false},{\"name\":\"DNS cutover & monitoring\",\"is_done\":false},{\"name\":\"Website live & berjalan normal\",\"is_done\":false},{\"name\":\"Pelatihan tim klien\",\"is_done\":false},{\"name\":\"Dokumentasi teknis & manual\",\"is_done\":false},{\"name\":\"Serah terima akses & aset\",\"is_done\":false}]', NULL, NULL, 0, '2026-02-24 08:31:52', '2026-02-24 08:31:52'),
(190, 29, 1, 'Perencanaan & Analisis', 'Analisis kebutuhan, audit website lama, penentuan scope, pembuatan dokumen spesifikasi, dan approval stakeholder.', '#8b5cf6', '2026-02-16', '2026-03-06', '2026-02-16', NULL, 14, 'in_progress', 35, NULL, NULL, '[{\"name\":\"Dokumen analisis kebutuhan\",\"is_done\":true},{\"name\":\"Hasil audit website lama\",\"is_done\":false},{\"name\":\"Dokumen scope & spesifikasi proyek\",\"is_done\":false},{\"name\":\"Estimasi waktu & anggaran\",\"is_done\":false},{\"name\":\"Sign-off stakeholder\",\"is_done\":false}]', NULL, NULL, 0, '2026-02-24 08:31:52', '2026-02-24 08:31:53'),
(191, 29, 2, 'Desain UI/UX', 'Wireframing, prototyping interaktif, pembuatan design system, mockup desktop & mobile, serta review dan approval desain final.', '#ec4899', '2026-03-06', '2026-04-06', NULL, NULL, 21, 'pending', 0, NULL, NULL, '[{\"name\":\"Wireframe semua halaman utama\",\"is_done\":false},{\"name\":\"Moodboard & style guide\",\"is_done\":false},{\"name\":\"Mockup desktop high-fidelity\",\"is_done\":false},{\"name\":\"Mockup mobile high-fidelity\",\"is_done\":false},{\"name\":\"Design system & component library\",\"is_done\":false},{\"name\":\"Prototype interaktif (Figma)\",\"is_done\":false},{\"name\":\"Design approval dari klien\",\"is_done\":false}]', NULL, NULL, 0, '2026-02-24 08:31:52', '2026-02-24 08:31:52'),
(192, 29, 3, 'Setup Infrastruktur', 'Provisioning server, konfigurasi domain & SSL, setup CI/CD pipeline, environment staging, serta monitoring dan logging.', '#f59e0b', '2026-04-06', '2026-04-20', NULL, NULL, 10, 'pending', 0, NULL, NULL, '[{\"name\":\"Server live & staging aktif\",\"is_done\":false},{\"name\":\"Domain & SSL terkonfigurasi\",\"is_done\":false},{\"name\":\"CI\\/CD pipeline berjalan\",\"is_done\":false},{\"name\":\"Environment staging siap\",\"is_done\":false},{\"name\":\"Monitoring & alerting aktif\",\"is_done\":false}]', NULL, NULL, 0, '2026-02-24 08:31:52', '2026-02-24 08:31:52'),
(193, 29, 4, 'Pengembangan Frontend', 'Implementasi antarmuka berdasarkan desain yang disetujui: komponen UI, halaman-halaman utama, responsiveness, aksesibilitas, dan optimasi performa.', '#06b6d4', '2026-04-20', '2026-06-01', NULL, NULL, 30, 'pending', 0, NULL, NULL, '[{\"name\":\"Setup framework & struktur proyek\",\"is_done\":false},{\"name\":\"Komponen UI reusable\",\"is_done\":false},{\"name\":\"Halaman Beranda\",\"is_done\":false},{\"name\":\"Halaman-halaman dalam (sesuai sitemap)\",\"is_done\":false},{\"name\":\"Responsiveness mobile & tablet\",\"is_done\":false},{\"name\":\"Aksesibilitas (WCAG 2.1)\",\"is_done\":false},{\"name\":\"Optimasi performa (Lighthouse \\u226590)\",\"is_done\":false}]', NULL, NULL, 0, '2026-02-24 08:31:52', '2026-02-24 08:31:52'),
(194, 29, 5, 'Pengembangan Backend & API', 'Pengembangan API, integrasi CMS/database, sistem autentikasi, manajemen media, dan integrasi layanan pihak ketiga.', '#10b981', '2026-06-01', '2026-07-09', NULL, NULL, 28, 'pending', 0, NULL, NULL, '[{\"name\":\"Setup backend framework & database\",\"is_done\":false},{\"name\":\"REST API endpoint lengkap\",\"is_done\":false},{\"name\":\"Sistem autentikasi & otorisasi\",\"is_done\":false},{\"name\":\"Integrasi CMS \\/ headless CMS\",\"is_done\":false},{\"name\":\"Manajemen media (upload, resize)\",\"is_done\":false},{\"name\":\"Integrasi email \\/ notifikasi\",\"is_done\":false},{\"name\":\"Integrasi layanan 3rd party\",\"is_done\":false}]', NULL, NULL, 0, '2026-02-24 08:31:52', '2026-02-24 08:31:52'),
(195, 29, 6, 'Pengujian & QA', 'Unit testing, integration testing, UAT bersama klien, performance testing, security audit, cross-browser testing, dan bug fixing.', '#f97316', '2026-07-09', '2026-08-04', NULL, NULL, 18, 'pending', 0, NULL, NULL, '[{\"name\":\"Unit & integration testing selesai\",\"is_done\":false},{\"name\":\"UAT bersama klien selesai\",\"is_done\":false},{\"name\":\"Performance testing (load & stress)\",\"is_done\":false},{\"name\":\"Security audit & penetration test\",\"is_done\":false},{\"name\":\"Cross-browser & device testing\",\"is_done\":false},{\"name\":\"Semua bug critical & high terselesaikan\",\"is_done\":false},{\"name\":\"Sign-off UAT dari klien\",\"is_done\":false}]', NULL, NULL, 0, '2026-02-24 08:31:52', '2026-02-24 08:31:52'),
(196, 29, 7, 'Go-Live & Pemeliharaan', 'Deployment ke produksi, migrasi data & konten, DNS cutover, monitoring pasca-launch, pelatihan tim klien, dan serah terima dokumentasi.', '#14b8a6', '2026-08-04', '2026-08-18', NULL, NULL, 10, 'pending', 0, NULL, NULL, '[{\"name\":\"Deployment produksi berhasil\",\"is_done\":false},{\"name\":\"Migrasi data & konten selesai\",\"is_done\":false},{\"name\":\"DNS cutover & monitoring\",\"is_done\":false},{\"name\":\"Website live & berjalan normal\",\"is_done\":false},{\"name\":\"Pelatihan tim klien\",\"is_done\":false},{\"name\":\"Dokumentasi teknis & manual\",\"is_done\":false},{\"name\":\"Serah terima akses & aset\",\"is_done\":false}]', NULL, NULL, 0, '2026-02-24 08:31:53', '2026-02-24 08:31:53'),
(197, 30, 1, 'Perencanaan & Analisis', 'Analisis kebutuhan, audit website lama, penentuan scope, pembuatan dokumen spesifikasi, dan approval stakeholder.', '#8b5cf6', '2025-08-23', '2025-09-11', '2025-08-23', '2025-09-11', 14, 'completed', 100, NULL, NULL, '[{\"name\":\"Dokumen analisis kebutuhan\",\"is_done\":true},{\"name\":\"Hasil audit website lama\",\"is_done\":true},{\"name\":\"Dokumen scope & spesifikasi proyek\",\"is_done\":true},{\"name\":\"Estimasi waktu & anggaran\",\"is_done\":true},{\"name\":\"Sign-off stakeholder\",\"is_done\":true}]', NULL, NULL, 0, '2026-02-24 08:31:53', '2026-02-24 08:31:53'),
(198, 30, 2, 'Desain UI/UX', 'Wireframing, prototyping interaktif, pembuatan design system, mockup desktop & mobile, serta review dan approval desain final.', '#ec4899', '2025-09-11', '2025-10-10', '2025-09-11', NULL, 21, 'in_progress', 100, NULL, NULL, '[{\"name\":\"Wireframe semua halaman utama\",\"is_done\":true},{\"name\":\"Moodboard & style guide\",\"is_done\":true},{\"name\":\"Mockup desktop high-fidelity\",\"is_done\":true},{\"name\":\"Mockup mobile high-fidelity\",\"is_done\":true},{\"name\":\"Design system & component library\",\"is_done\":true},{\"name\":\"Prototype interaktif (Figma)\",\"is_done\":true},{\"name\":\"Design approval dari klien\",\"is_done\":true}]', NULL, NULL, 0, '2026-02-24 08:31:53', '2026-02-24 08:31:53'),
(199, 30, 3, 'Setup Infrastruktur', 'Provisioning server, konfigurasi domain & SSL, setup CI/CD pipeline, environment staging, serta monitoring dan logging.', '#f59e0b', '2025-10-10', '2025-10-24', NULL, NULL, 10, 'pending', 0, NULL, NULL, '[{\"name\":\"Server live & staging aktif\",\"is_done\":false},{\"name\":\"Domain & SSL terkonfigurasi\",\"is_done\":false},{\"name\":\"CI\\/CD pipeline berjalan\",\"is_done\":false},{\"name\":\"Environment staging siap\",\"is_done\":false},{\"name\":\"Monitoring & alerting aktif\",\"is_done\":false}]', NULL, NULL, 0, '2026-02-24 08:31:53', '2026-02-24 08:31:53'),
(200, 30, 4, 'Pengembangan Frontend', 'Implementasi antarmuka berdasarkan desain yang disetujui: komponen UI, halaman-halaman utama, responsiveness, aksesibilitas, dan optimasi performa.', '#06b6d4', '2025-10-24', '2025-12-05', NULL, NULL, 30, 'pending', 0, NULL, NULL, '[{\"name\":\"Setup framework & struktur proyek\",\"is_done\":false},{\"name\":\"Komponen UI reusable\",\"is_done\":false},{\"name\":\"Halaman Beranda\",\"is_done\":false},{\"name\":\"Halaman-halaman dalam (sesuai sitemap)\",\"is_done\":false},{\"name\":\"Responsiveness mobile & tablet\",\"is_done\":false},{\"name\":\"Aksesibilitas (WCAG 2.1)\",\"is_done\":false},{\"name\":\"Optimasi performa (Lighthouse \\u226590)\",\"is_done\":false}]', NULL, NULL, 0, '2026-02-24 08:31:53', '2026-02-24 08:31:53'),
(201, 30, 5, 'Pengembangan Backend & API', 'Pengembangan API, integrasi CMS/database, sistem autentikasi, manajemen media, dan integrasi layanan pihak ketiga.', '#10b981', '2025-12-05', '2026-01-14', NULL, NULL, 28, 'pending', 0, NULL, NULL, '[{\"name\":\"Setup backend framework & database\",\"is_done\":false},{\"name\":\"REST API endpoint lengkap\",\"is_done\":false},{\"name\":\"Sistem autentikasi & otorisasi\",\"is_done\":false},{\"name\":\"Integrasi CMS \\/ headless CMS\",\"is_done\":false},{\"name\":\"Manajemen media (upload, resize)\",\"is_done\":false},{\"name\":\"Integrasi email \\/ notifikasi\",\"is_done\":false},{\"name\":\"Integrasi layanan 3rd party\",\"is_done\":false}]', NULL, NULL, 0, '2026-02-24 08:31:53', '2026-02-24 08:31:53'),
(202, 30, 6, 'Pengujian & QA', 'Unit testing, integration testing, UAT bersama klien, performance testing, security audit, cross-browser testing, dan bug fixing.', '#f97316', '2026-01-14', '2026-02-09', NULL, NULL, 18, 'pending', 0, NULL, NULL, '[{\"name\":\"Unit & integration testing selesai\",\"is_done\":false},{\"name\":\"UAT bersama klien selesai\",\"is_done\":false},{\"name\":\"Performance testing (load & stress)\",\"is_done\":false},{\"name\":\"Security audit & penetration test\",\"is_done\":false},{\"name\":\"Cross-browser & device testing\",\"is_done\":false},{\"name\":\"Semua bug critical & high terselesaikan\",\"is_done\":false},{\"name\":\"Sign-off UAT dari klien\",\"is_done\":false}]', NULL, NULL, 0, '2026-02-24 08:31:53', '2026-02-24 08:31:53'),
(203, 30, 7, 'Go-Live & Pemeliharaan', 'Deployment ke produksi, migrasi data & konten, DNS cutover, monitoring pasca-launch, pelatihan tim klien, dan serah terima dokumentasi.', '#14b8a6', '2026-02-09', '2026-02-23', NULL, NULL, 10, 'pending', 0, NULL, NULL, '[{\"name\":\"Deployment produksi berhasil\",\"is_done\":false},{\"name\":\"Migrasi data & konten selesai\",\"is_done\":false},{\"name\":\"DNS cutover & monitoring\",\"is_done\":false},{\"name\":\"Website live & berjalan normal\",\"is_done\":false},{\"name\":\"Pelatihan tim klien\",\"is_done\":false},{\"name\":\"Dokumentasi teknis & manual\",\"is_done\":false},{\"name\":\"Serah terima akses & aset\",\"is_done\":false}]', NULL, NULL, 0, '2026-02-24 08:31:53', '2026-02-24 08:31:53'),
(204, 31, 1, 'Perencanaan & Analisis', 'Analisis kebutuhan, audit website lama, penentuan scope, pembuatan dokumen spesifikasi, dan approval stakeholder.', '#8b5cf6', '2025-12-11', '2025-12-31', '2025-12-11', NULL, 14, 'in_progress', 100, NULL, NULL, '[{\"name\":\"Dokumen analisis kebutuhan\",\"is_done\":true},{\"name\":\"Hasil audit website lama\",\"is_done\":true},{\"name\":\"Dokumen scope & spesifikasi proyek\",\"is_done\":true},{\"name\":\"Estimasi waktu & anggaran\",\"is_done\":true},{\"name\":\"Sign-off stakeholder\",\"is_done\":true}]', NULL, NULL, 0, '2026-02-24 08:31:53', '2026-02-24 08:31:53'),
(205, 31, 2, 'Desain UI/UX', 'Wireframing, prototyping interaktif, pembuatan design system, mockup desktop & mobile, serta review dan approval desain final.', '#ec4899', '2025-12-31', '2026-01-29', NULL, NULL, 21, 'pending', 0, NULL, NULL, '[{\"name\":\"Wireframe semua halaman utama\",\"is_done\":false},{\"name\":\"Moodboard & style guide\",\"is_done\":false},{\"name\":\"Mockup desktop high-fidelity\",\"is_done\":false},{\"name\":\"Mockup mobile high-fidelity\",\"is_done\":false},{\"name\":\"Design system & component library\",\"is_done\":false},{\"name\":\"Prototype interaktif (Figma)\",\"is_done\":false},{\"name\":\"Design approval dari klien\",\"is_done\":false}]', NULL, NULL, 0, '2026-02-24 08:31:53', '2026-02-24 08:31:53'),
(206, 31, 3, 'Setup Infrastruktur', 'Provisioning server, konfigurasi domain & SSL, setup CI/CD pipeline, environment staging, serta monitoring dan logging.', '#f59e0b', '2026-01-29', '2026-02-12', NULL, NULL, 10, 'pending', 0, NULL, NULL, '[{\"name\":\"Server live & staging aktif\",\"is_done\":false},{\"name\":\"Domain & SSL terkonfigurasi\",\"is_done\":false},{\"name\":\"CI\\/CD pipeline berjalan\",\"is_done\":false},{\"name\":\"Environment staging siap\",\"is_done\":false},{\"name\":\"Monitoring & alerting aktif\",\"is_done\":false}]', NULL, NULL, 0, '2026-02-24 08:31:53', '2026-02-24 08:31:53'),
(207, 31, 4, 'Pengembangan Frontend', 'Implementasi antarmuka berdasarkan desain yang disetujui: komponen UI, halaman-halaman utama, responsiveness, aksesibilitas, dan optimasi performa.', '#06b6d4', '2026-02-12', '2026-03-26', NULL, NULL, 30, 'pending', 0, NULL, NULL, '[{\"name\":\"Setup framework & struktur proyek\",\"is_done\":false},{\"name\":\"Komponen UI reusable\",\"is_done\":false},{\"name\":\"Halaman Beranda\",\"is_done\":false},{\"name\":\"Halaman-halaman dalam (sesuai sitemap)\",\"is_done\":false},{\"name\":\"Responsiveness mobile & tablet\",\"is_done\":false},{\"name\":\"Aksesibilitas (WCAG 2.1)\",\"is_done\":false},{\"name\":\"Optimasi performa (Lighthouse \\u226590)\",\"is_done\":false}]', NULL, NULL, 0, '2026-02-24 08:31:53', '2026-02-24 08:31:53'),
(208, 31, 5, 'Pengembangan Backend & API', 'Pengembangan API, integrasi CMS/database, sistem autentikasi, manajemen media, dan integrasi layanan pihak ketiga.', '#10b981', '2026-03-26', '2026-05-05', NULL, NULL, 28, 'pending', 0, NULL, NULL, '[{\"name\":\"Setup backend framework & database\",\"is_done\":false},{\"name\":\"REST API endpoint lengkap\",\"is_done\":false},{\"name\":\"Sistem autentikasi & otorisasi\",\"is_done\":false},{\"name\":\"Integrasi CMS \\/ headless CMS\",\"is_done\":false},{\"name\":\"Manajemen media (upload, resize)\",\"is_done\":false},{\"name\":\"Integrasi email \\/ notifikasi\",\"is_done\":false},{\"name\":\"Integrasi layanan 3rd party\",\"is_done\":false}]', NULL, NULL, 0, '2026-02-24 08:31:53', '2026-02-24 08:31:53'),
(209, 31, 6, 'Pengujian & QA', 'Unit testing, integration testing, UAT bersama klien, performance testing, security audit, cross-browser testing, dan bug fixing.', '#f97316', '2026-05-05', '2026-05-29', NULL, NULL, 18, 'pending', 0, NULL, NULL, '[{\"name\":\"Unit & integration testing selesai\",\"is_done\":false},{\"name\":\"UAT bersama klien selesai\",\"is_done\":false},{\"name\":\"Performance testing (load & stress)\",\"is_done\":false},{\"name\":\"Security audit & penetration test\",\"is_done\":false},{\"name\":\"Cross-browser & device testing\",\"is_done\":false},{\"name\":\"Semua bug critical & high terselesaikan\",\"is_done\":false},{\"name\":\"Sign-off UAT dari klien\",\"is_done\":false}]', NULL, NULL, 0, '2026-02-24 08:31:53', '2026-02-24 08:31:53'),
(210, 31, 7, 'Go-Live & Pemeliharaan', 'Deployment ke produksi, migrasi data & konten, DNS cutover, monitoring pasca-launch, pelatihan tim klien, dan serah terima dokumentasi.', '#14b8a6', '2026-05-29', '2026-06-12', NULL, NULL, 10, 'pending', 0, NULL, NULL, '[{\"name\":\"Deployment produksi berhasil\",\"is_done\":false},{\"name\":\"Migrasi data & konten selesai\",\"is_done\":false},{\"name\":\"DNS cutover & monitoring\",\"is_done\":false},{\"name\":\"Website live & berjalan normal\",\"is_done\":false},{\"name\":\"Pelatihan tim klien\",\"is_done\":false},{\"name\":\"Dokumentasi teknis & manual\",\"is_done\":false},{\"name\":\"Serah terima akses & aset\",\"is_done\":false}]', NULL, NULL, 0, '2026-02-24 08:31:53', '2026-02-24 08:31:53'),
(211, 32, 1, 'Perencanaan & Analisis', 'Analisis kebutuhan, audit website lama, penentuan scope, pembuatan dokumen spesifikasi, dan approval stakeholder.', '#8b5cf6', '2025-12-26', '2026-01-15', '2025-12-26', NULL, 14, 'in_progress', 100, NULL, NULL, '[{\"name\":\"Dokumen analisis kebutuhan\",\"is_done\":true},{\"name\":\"Hasil audit website lama\",\"is_done\":true},{\"name\":\"Dokumen scope & spesifikasi proyek\",\"is_done\":true},{\"name\":\"Estimasi waktu & anggaran\",\"is_done\":true},{\"name\":\"Sign-off stakeholder\",\"is_done\":true}]', NULL, NULL, 0, '2026-02-24 08:31:53', '2026-02-24 08:31:53'),
(212, 32, 2, 'Desain UI/UX', 'Wireframing, prototyping interaktif, pembuatan design system, mockup desktop & mobile, serta review dan approval desain final.', '#ec4899', '2026-01-15', '2026-02-13', NULL, NULL, 21, 'pending', 0, NULL, NULL, '[{\"name\":\"Wireframe semua halaman utama\",\"is_done\":false},{\"name\":\"Moodboard & style guide\",\"is_done\":false},{\"name\":\"Mockup desktop high-fidelity\",\"is_done\":false},{\"name\":\"Mockup mobile high-fidelity\",\"is_done\":false},{\"name\":\"Design system & component library\",\"is_done\":false},{\"name\":\"Prototype interaktif (Figma)\",\"is_done\":false},{\"name\":\"Design approval dari klien\",\"is_done\":false}]', NULL, NULL, 0, '2026-02-24 08:31:53', '2026-02-24 08:31:53'),
(213, 32, 3, 'Setup Infrastruktur', 'Provisioning server, konfigurasi domain & SSL, setup CI/CD pipeline, environment staging, serta monitoring dan logging.', '#f59e0b', '2026-02-13', '2026-02-27', NULL, NULL, 10, 'pending', 0, NULL, NULL, '[{\"name\":\"Server live & staging aktif\",\"is_done\":false},{\"name\":\"Domain & SSL terkonfigurasi\",\"is_done\":false},{\"name\":\"CI\\/CD pipeline berjalan\",\"is_done\":false},{\"name\":\"Environment staging siap\",\"is_done\":false},{\"name\":\"Monitoring & alerting aktif\",\"is_done\":false}]', NULL, NULL, 0, '2026-02-24 08:31:53', '2026-02-24 08:31:53'),
(214, 32, 4, 'Pengembangan Frontend', 'Implementasi antarmuka berdasarkan desain yang disetujui: komponen UI, halaman-halaman utama, responsiveness, aksesibilitas, dan optimasi performa.', '#06b6d4', '2026-02-27', '2026-04-10', NULL, NULL, 30, 'pending', 0, NULL, NULL, '[{\"name\":\"Setup framework & struktur proyek\",\"is_done\":false},{\"name\":\"Komponen UI reusable\",\"is_done\":false},{\"name\":\"Halaman Beranda\",\"is_done\":false},{\"name\":\"Halaman-halaman dalam (sesuai sitemap)\",\"is_done\":false},{\"name\":\"Responsiveness mobile & tablet\",\"is_done\":false},{\"name\":\"Aksesibilitas (WCAG 2.1)\",\"is_done\":false},{\"name\":\"Optimasi performa (Lighthouse \\u226590)\",\"is_done\":false}]', NULL, NULL, 0, '2026-02-24 08:31:53', '2026-02-24 08:31:53'),
(215, 32, 5, 'Pengembangan Backend & API', 'Pengembangan API, integrasi CMS/database, sistem autentikasi, manajemen media, dan integrasi layanan pihak ketiga.', '#10b981', '2026-04-10', '2026-05-20', NULL, NULL, 28, 'pending', 0, NULL, NULL, '[{\"name\":\"Setup backend framework & database\",\"is_done\":false},{\"name\":\"REST API endpoint lengkap\",\"is_done\":false},{\"name\":\"Sistem autentikasi & otorisasi\",\"is_done\":false},{\"name\":\"Integrasi CMS \\/ headless CMS\",\"is_done\":false},{\"name\":\"Manajemen media (upload, resize)\",\"is_done\":false},{\"name\":\"Integrasi email \\/ notifikasi\",\"is_done\":false},{\"name\":\"Integrasi layanan 3rd party\",\"is_done\":false}]', NULL, NULL, 0, '2026-02-24 08:31:53', '2026-02-24 08:31:53'),
(216, 32, 6, 'Pengujian & QA', 'Unit testing, integration testing, UAT bersama klien, performance testing, security audit, cross-browser testing, dan bug fixing.', '#f97316', '2026-05-20', '2026-06-15', NULL, NULL, 18, 'pending', 0, NULL, NULL, '[{\"name\":\"Unit & integration testing selesai\",\"is_done\":false},{\"name\":\"UAT bersama klien selesai\",\"is_done\":false},{\"name\":\"Performance testing (load & stress)\",\"is_done\":false},{\"name\":\"Security audit & penetration test\",\"is_done\":false},{\"name\":\"Cross-browser & device testing\",\"is_done\":false},{\"name\":\"Semua bug critical & high terselesaikan\",\"is_done\":false},{\"name\":\"Sign-off UAT dari klien\",\"is_done\":false}]', NULL, NULL, 0, '2026-02-24 08:31:53', '2026-02-24 08:31:53'),
(217, 32, 7, 'Go-Live & Pemeliharaan', 'Deployment ke produksi, migrasi data & konten, DNS cutover, monitoring pasca-launch, pelatihan tim klien, dan serah terima dokumentasi.', '#14b8a6', '2026-06-15', '2026-06-29', NULL, NULL, 10, 'pending', 0, NULL, NULL, '[{\"name\":\"Deployment produksi berhasil\",\"is_done\":false},{\"name\":\"Migrasi data & konten selesai\",\"is_done\":false},{\"name\":\"DNS cutover & monitoring\",\"is_done\":false},{\"name\":\"Website live & berjalan normal\",\"is_done\":false},{\"name\":\"Pelatihan tim klien\",\"is_done\":false},{\"name\":\"Dokumentasi teknis & manual\",\"is_done\":false},{\"name\":\"Serah terima akses & aset\",\"is_done\":false}]', NULL, NULL, 0, '2026-02-24 08:31:53', '2026-02-24 08:31:53'),
(218, 33, 1, 'Perencanaan & Analisis', 'Analisis kebutuhan, audit website lama, penentuan scope, pembuatan dokumen spesifikasi, dan approval stakeholder.', '#8b5cf6', '2026-02-21', '2026-03-12', NULL, NULL, 14, 'pending', 0, NULL, NULL, '[{\"name\":\"Dokumen analisis kebutuhan\",\"is_done\":false},{\"name\":\"Hasil audit website lama\",\"is_done\":false},{\"name\":\"Dokumen scope & spesifikasi proyek\",\"is_done\":false},{\"name\":\"Estimasi waktu & anggaran\",\"is_done\":false},{\"name\":\"Sign-off stakeholder\",\"is_done\":false}]', NULL, NULL, 0, '2026-02-24 08:31:53', '2026-02-24 08:31:53'),
(219, 33, 2, 'Desain UI/UX', 'Wireframing, prototyping interaktif, pembuatan design system, mockup desktop & mobile, serta review dan approval desain final.', '#ec4899', '2026-03-12', '2026-04-10', NULL, NULL, 21, 'pending', 0, NULL, NULL, '[{\"name\":\"Wireframe semua halaman utama\",\"is_done\":false},{\"name\":\"Moodboard & style guide\",\"is_done\":false},{\"name\":\"Mockup desktop high-fidelity\",\"is_done\":false},{\"name\":\"Mockup mobile high-fidelity\",\"is_done\":false},{\"name\":\"Design system & component library\",\"is_done\":false},{\"name\":\"Prototype interaktif (Figma)\",\"is_done\":false},{\"name\":\"Design approval dari klien\",\"is_done\":false}]', NULL, NULL, 0, '2026-02-24 08:31:53', '2026-02-24 08:31:53'),
(220, 33, 3, 'Setup Infrastruktur', 'Provisioning server, konfigurasi domain & SSL, setup CI/CD pipeline, environment staging, serta monitoring dan logging.', '#f59e0b', '2026-04-10', '2026-04-24', NULL, NULL, 10, 'pending', 0, NULL, NULL, '[{\"name\":\"Server live & staging aktif\",\"is_done\":false},{\"name\":\"Domain & SSL terkonfigurasi\",\"is_done\":false},{\"name\":\"CI\\/CD pipeline berjalan\",\"is_done\":false},{\"name\":\"Environment staging siap\",\"is_done\":false},{\"name\":\"Monitoring & alerting aktif\",\"is_done\":false}]', NULL, NULL, 0, '2026-02-24 08:31:53', '2026-02-24 08:31:53'),
(221, 33, 4, 'Pengembangan Frontend', 'Implementasi antarmuka berdasarkan desain yang disetujui: komponen UI, halaman-halaman utama, responsiveness, aksesibilitas, dan optimasi performa.', '#06b6d4', '2026-04-24', '2026-06-05', NULL, NULL, 30, 'pending', 0, NULL, NULL, '[{\"name\":\"Setup framework & struktur proyek\",\"is_done\":false},{\"name\":\"Komponen UI reusable\",\"is_done\":false},{\"name\":\"Halaman Beranda\",\"is_done\":false},{\"name\":\"Halaman-halaman dalam (sesuai sitemap)\",\"is_done\":false},{\"name\":\"Responsiveness mobile & tablet\",\"is_done\":false},{\"name\":\"Aksesibilitas (WCAG 2.1)\",\"is_done\":false},{\"name\":\"Optimasi performa (Lighthouse \\u226590)\",\"is_done\":false}]', NULL, NULL, 0, '2026-02-24 08:31:53', '2026-02-24 08:31:53');
INSERT INTO `phases` (`id`, `website_id`, `phase_order`, `name`, `description`, `color`, `planned_start`, `planned_end`, `actual_start`, `actual_end`, `estimated_days`, `status`, `progress`, `pic_name`, `assigned_team`, `deliverables`, `notes`, `blockers`, `is_overdue`, `created_at`, `updated_at`) VALUES
(222, 33, 5, 'Pengembangan Backend & API', 'Pengembangan API, integrasi CMS/database, sistem autentikasi, manajemen media, dan integrasi layanan pihak ketiga.', '#10b981', '2026-06-05', '2026-07-15', NULL, NULL, 28, 'pending', 0, NULL, NULL, '[{\"name\":\"Setup backend framework & database\",\"is_done\":false},{\"name\":\"REST API endpoint lengkap\",\"is_done\":false},{\"name\":\"Sistem autentikasi & otorisasi\",\"is_done\":false},{\"name\":\"Integrasi CMS \\/ headless CMS\",\"is_done\":false},{\"name\":\"Manajemen media (upload, resize)\",\"is_done\":false},{\"name\":\"Integrasi email \\/ notifikasi\",\"is_done\":false},{\"name\":\"Integrasi layanan 3rd party\",\"is_done\":false}]', NULL, NULL, 0, '2026-02-24 08:31:53', '2026-02-24 08:31:53'),
(223, 33, 6, 'Pengujian & QA', 'Unit testing, integration testing, UAT bersama klien, performance testing, security audit, cross-browser testing, dan bug fixing.', '#f97316', '2026-07-15', '2026-08-10', NULL, NULL, 18, 'pending', 0, NULL, NULL, '[{\"name\":\"Unit & integration testing selesai\",\"is_done\":false},{\"name\":\"UAT bersama klien selesai\",\"is_done\":false},{\"name\":\"Performance testing (load & stress)\",\"is_done\":false},{\"name\":\"Security audit & penetration test\",\"is_done\":false},{\"name\":\"Cross-browser & device testing\",\"is_done\":false},{\"name\":\"Semua bug critical & high terselesaikan\",\"is_done\":false},{\"name\":\"Sign-off UAT dari klien\",\"is_done\":false}]', NULL, NULL, 0, '2026-02-24 08:31:53', '2026-02-24 08:31:53'),
(224, 33, 7, 'Go-Live & Pemeliharaan', 'Deployment ke produksi, migrasi data & konten, DNS cutover, monitoring pasca-launch, pelatihan tim klien, dan serah terima dokumentasi.', '#14b8a6', '2026-08-10', '2026-08-24', NULL, NULL, 10, 'pending', 0, NULL, NULL, '[{\"name\":\"Deployment produksi berhasil\",\"is_done\":false},{\"name\":\"Migrasi data & konten selesai\",\"is_done\":false},{\"name\":\"DNS cutover & monitoring\",\"is_done\":false},{\"name\":\"Website live & berjalan normal\",\"is_done\":false},{\"name\":\"Pelatihan tim klien\",\"is_done\":false},{\"name\":\"Dokumentasi teknis & manual\",\"is_done\":false},{\"name\":\"Serah terima akses & aset\",\"is_done\":false}]', NULL, NULL, 0, '2026-02-24 08:31:53', '2026-02-24 08:31:53'),
(225, 34, 1, 'Perencanaan & Analisis', 'Analisis kebutuhan, audit website lama, penentuan scope, pembuatan dokumen spesifikasi, dan approval stakeholder.', '#8b5cf6', '2026-02-24', '2026-03-16', NULL, NULL, 14, 'in_progress', 0, NULL, NULL, '[{\"name\":\"Dokumen analisis kebutuhan\",\"is_done\":false},{\"name\":\"Hasil audit website lama\",\"is_done\":false},{\"name\":\"Dokumen scope & spesifikasi proyek\",\"is_done\":false},{\"name\":\"Estimasi waktu & anggaran\",\"is_done\":false},{\"name\":\"Sign-off stakeholder\",\"is_done\":false}]', NULL, NULL, 0, '2026-02-24 08:44:35', '2026-02-24 08:44:35'),
(226, 34, 2, 'Desain UI/UX', 'Wireframing, prototyping interaktif, pembuatan design system, mockup desktop & mobile, serta review dan approval desain final.', '#ec4899', '2026-03-16', '2026-04-14', NULL, NULL, 21, 'pending', 0, NULL, NULL, '[{\"name\":\"Wireframe semua halaman utama\",\"is_done\":false},{\"name\":\"Moodboard & style guide\",\"is_done\":false},{\"name\":\"Mockup desktop high-fidelity\",\"is_done\":false},{\"name\":\"Mockup mobile high-fidelity\",\"is_done\":false},{\"name\":\"Design system & component library\",\"is_done\":false},{\"name\":\"Prototype interaktif (Figma)\",\"is_done\":false},{\"name\":\"Design approval dari klien\",\"is_done\":false}]', NULL, NULL, 0, '2026-02-24 08:44:35', '2026-02-24 08:44:35'),
(227, 34, 3, 'Setup Infrastruktur', 'Provisioning server, konfigurasi domain & SSL, setup CI/CD pipeline, environment staging, serta monitoring dan logging.', '#f59e0b', '2026-04-14', '2026-04-28', NULL, NULL, 10, 'pending', 0, NULL, NULL, '[{\"name\":\"Server live & staging aktif\",\"is_done\":false},{\"name\":\"Domain & SSL terkonfigurasi\",\"is_done\":false},{\"name\":\"CI\\/CD pipeline berjalan\",\"is_done\":false},{\"name\":\"Environment staging siap\",\"is_done\":false},{\"name\":\"Monitoring & alerting aktif\",\"is_done\":false}]', NULL, NULL, 0, '2026-02-24 08:44:35', '2026-02-24 08:44:35'),
(228, 34, 4, 'Pengembangan Frontend', 'Implementasi antarmuka berdasarkan desain yang disetujui: komponen UI, halaman-halaman utama, responsiveness, aksesibilitas, dan optimasi performa.', '#06b6d4', '2026-04-28', '2026-06-09', NULL, NULL, 30, 'pending', 0, NULL, NULL, '[{\"name\":\"Setup framework & struktur proyek\",\"is_done\":false},{\"name\":\"Komponen UI reusable\",\"is_done\":false},{\"name\":\"Halaman Beranda\",\"is_done\":false},{\"name\":\"Halaman-halaman dalam (sesuai sitemap)\",\"is_done\":false},{\"name\":\"Responsiveness mobile & tablet\",\"is_done\":false},{\"name\":\"Aksesibilitas (WCAG 2.1)\",\"is_done\":false},{\"name\":\"Optimasi performa (Lighthouse \\u226590)\",\"is_done\":false}]', NULL, NULL, 0, '2026-02-24 08:44:35', '2026-02-24 08:44:35'),
(229, 34, 5, 'Pengembangan Backend & API', 'Pengembangan API, integrasi CMS/database, sistem autentikasi, manajemen media, dan integrasi layanan pihak ketiga.', '#10b981', '2026-06-09', '2026-07-17', NULL, NULL, 28, 'pending', 0, NULL, NULL, '[{\"name\":\"Setup backend framework & database\",\"is_done\":false},{\"name\":\"REST API endpoint lengkap\",\"is_done\":false},{\"name\":\"Sistem autentikasi & otorisasi\",\"is_done\":false},{\"name\":\"Integrasi CMS \\/ headless CMS\",\"is_done\":false},{\"name\":\"Manajemen media (upload, resize)\",\"is_done\":false},{\"name\":\"Integrasi email \\/ notifikasi\",\"is_done\":false},{\"name\":\"Integrasi layanan 3rd party\",\"is_done\":false}]', NULL, NULL, 0, '2026-02-24 08:44:35', '2026-02-24 08:44:35'),
(230, 34, 6, 'Pengujian & QA', 'Unit testing, integration testing, UAT bersama klien, performance testing, security audit, cross-browser testing, dan bug fixing.', '#f97316', '2026-07-17', '2026-08-12', NULL, NULL, 18, 'pending', 0, NULL, NULL, '[{\"name\":\"Unit & integration testing selesai\",\"is_done\":false},{\"name\":\"UAT bersama klien selesai\",\"is_done\":false},{\"name\":\"Performance testing (load & stress)\",\"is_done\":false},{\"name\":\"Security audit & penetration test\",\"is_done\":false},{\"name\":\"Cross-browser & device testing\",\"is_done\":false},{\"name\":\"Semua bug critical & high terselesaikan\",\"is_done\":false},{\"name\":\"Sign-off UAT dari klien\",\"is_done\":false}]', NULL, NULL, 0, '2026-02-24 08:44:35', '2026-02-24 08:44:35'),
(231, 34, 7, 'Go-Live & Pemeliharaan', 'Deployment ke produksi, migrasi data & konten, DNS cutover, monitoring pasca-launch, pelatihan tim klien, dan serah terima dokumentasi.', '#14b8a6', '2026-08-12', '2026-08-26', NULL, NULL, 10, 'pending', 0, NULL, NULL, '[{\"name\":\"Deployment produksi berhasil\",\"is_done\":false},{\"name\":\"Migrasi data & konten selesai\",\"is_done\":false},{\"name\":\"DNS cutover & monitoring\",\"is_done\":false},{\"name\":\"Website live & berjalan normal\",\"is_done\":false},{\"name\":\"Pelatihan tim klien\",\"is_done\":false},{\"name\":\"Dokumentasi teknis & manual\",\"is_done\":false},{\"name\":\"Serah terima akses & aset\",\"is_done\":false}]', NULL, NULL, 0, '2026-02-24 08:44:35', '2026-02-24 08:44:35');

-- --------------------------------------------------------

--
-- Struktur dari tabel `portals`
--

CREATE TABLE `portals` (
  `id` int NOT NULL,
  `id_instansi` int DEFAULT NULL,
  `nama` varchar(200) DEFAULT NULL,
  `ket` text,
  `linkna` varchar(200) DEFAULT NULL,
  `foto` varchar(100) DEFAULT NULL,
  `status` char(1) DEFAULT NULL,
  `uploadby` varchar(100) DEFAULT NULL,
  `tglupload` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `portals`
--

INSERT INTO `portals` (`id`, `id_instansi`, `nama`, `ket`, `linkna`, `foto`, `status`, `uploadby`, `tglupload`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, NULL, 'Website Resmi BKPSDMD Prov. Kepulauan Bangka Belitung', 'https://bkpsdmd.babelprov.go.id', NULL, '1', NULL, NULL, '2022-06-15 10:14:12', '2022-08-30 22:09:30', NULL),
(2, 26, NULL, 'Kominfo Babel', 'https://kominfo.babelprov.go.id', NULL, '1', NULL, NULL, '2022-06-15 10:14:41', '2022-06-15 10:14:41', NULL),
(3, 2, NULL, NULL, 'https://kesbangpol.babelprov.go.id/', NULL, '1', NULL, NULL, '2022-06-26 06:14:53', '2022-06-26 06:14:53', NULL),
(4, 33, NULL, NULL, 'https://dindik.babelprov.go.id', NULL, '1', NULL, NULL, '2022-06-26 21:01:48', '2022-06-26 21:01:48', NULL),
(5, 33, NULL, NULL, 'https://cabdindikwilayah1.babelprov.go.id', NULL, '1', NULL, NULL, '2022-06-26 21:02:13', '2022-06-26 21:02:13', NULL),
(6, 33, NULL, NULL, 'https://cabdindikwilayah3.babelprov.go.id', NULL, '1', NULL, NULL, '2022-06-26 21:02:33', '2022-06-26 21:02:33', NULL),
(7, 33, NULL, NULL, 'https://cabdindikwilayah5.babelprov.go.id', NULL, '1', NULL, NULL, '2022-06-26 21:02:53', '2022-06-26 21:02:53', NULL),
(8, 33, NULL, NULL, 'https://sman1-pangkalanbaru.babelprov.go.id', NULL, '1', NULL, NULL, '2022-06-26 21:03:16', '2022-06-26 21:03:16', NULL),
(9, 33, NULL, NULL, 'https://smkn1tukaksadai.babelprov.go.id', NULL, '1', NULL, NULL, '2022-06-26 21:03:40', '2022-06-26 21:03:40', NULL),
(10, 41, NULL, NULL, 'https://inspektorat.babelprov.go.id', NULL, '1', NULL, NULL, '2022-06-26 21:04:02', '2022-06-26 21:04:02', NULL),
(11, 25, NULL, NULL, 'https://dinkes.babelprov.go.id', NULL, '1', NULL, NULL, '2022-06-26 21:04:35', '2022-06-26 21:04:35', NULL),
(12, 39, NULL, NULL, 'https://dinsospmd.babelprov.go.id', NULL, '1', NULL, NULL, '2022-06-26 21:04:55', '2022-06-26 21:04:55', NULL),
(13, 30, NULL, NULL, 'https://puprprkp.babelprov.go.id/', NULL, '1', NULL, NULL, '2022-06-26 21:05:38', '2022-09-01 21:18:35', NULL),
(14, 19, NULL, NULL, 'https://esdm.babelprov.go.id', NULL, '1', NULL, NULL, '2022-06-26 21:05:58', '2022-06-26 21:05:58', NULL),
(15, 21, NULL, NULL, 'http://disparbudkepora.babelprov.go.id', NULL, '1', NULL, NULL, '2022-06-26 21:06:20', '2022-06-26 21:06:20', NULL),
(16, 34, NULL, NULL, 'https://dishub.babelprov.go.id', NULL, '1', NULL, NULL, '2022-06-26 21:06:43', '2022-06-26 21:06:43', NULL),
(17, 26, NULL, NULL, 'https://babelprov.go.id', NULL, '1', NULL, NULL, '2022-06-26 21:07:10', '2022-06-26 21:07:10', NULL),
(18, 26, NULL, NULL, 'https://kominfo.babelprov.go.id', NULL, '1', NULL, NULL, '2022-06-26 21:07:31', '2022-06-26 21:07:31', NULL),
(19, 32, NULL, NULL, 'https://dpmptsp.babelprov.go.id', NULL, '1', NULL, NULL, '2022-06-26 21:07:58', '2022-06-26 21:07:58', NULL),
(20, 40, NULL, NULL, 'https://disnaker.babelprov.go.id', NULL, '1', NULL, NULL, '2022-06-26 21:08:24', '2022-06-26 21:08:24', NULL),
(21, 27, NULL, NULL, 'https://kukm.babelprov.go.id', NULL, '1', NULL, NULL, '2022-06-26 21:08:49', '2022-06-26 21:08:49', NULL),
(22, 35, NULL, NULL, 'https://perindag.babelprov.go.id', NULL, '1', NULL, NULL, '2022-06-26 21:09:18', '2022-06-26 21:09:18', NULL),
(23, 36, NULL, NULL, 'https://distan.babelprov.go.id', NULL, '1', NULL, NULL, '2022-06-26 21:09:39', '2022-06-26 21:09:39', NULL),
(24, 36, NULL, NULL, 'https://bppp.babelprov.go.id', NULL, '1', NULL, NULL, '2022-06-26 21:10:03', '2022-06-26 21:10:03', NULL),
(25, 38, NULL, NULL, 'https://dp3acskb.babelprov.go.id', NULL, '1', NULL, NULL, '2022-06-26 21:10:40', '2022-06-26 21:10:40', NULL),
(26, 23, NULL, NULL, 'https://dkp.babelprov.go.id', NULL, '1', NULL, NULL, '2022-06-26 21:11:02', '2022-06-26 21:11:02', NULL),
(27, 22, NULL, NULL, 'https://dlhk.babelprov.go.id', NULL, '1', NULL, NULL, '2022-06-26 21:11:27', '2022-06-26 21:11:27', NULL),
(28, 20, NULL, NULL, 'https://dkpus.babelprov.go.id', NULL, '1', NULL, NULL, '2022-06-26 21:11:50', '2022-06-26 21:11:50', NULL),
(29, 44, NULL, NULL, 'https://satpolpp.babelprov.go.id', NULL, '1', NULL, NULL, '2022-06-26 21:12:14', '2022-06-26 21:12:14', NULL),
(30, 1, NULL, NULL, 'https://bkpsdmd.babelprov.go.id', NULL, '1', NULL, NULL, '2022-06-26 21:12:37', '2022-06-26 21:12:37', NULL),
(31, 1, NULL, NULL, 'https://bappeda.babelprov.go.id', NULL, '1', NULL, NULL, '2022-06-26 21:12:59', '2022-06-26 21:12:59', NULL),
(32, 3, NULL, NULL, 'https://bakuda.babelprov.go.id', NULL, '1', NULL, NULL, '2022-06-26 21:13:17', '2022-06-26 21:13:17', NULL),
(33, 5, NULL, NULL, 'https://bpbd.babelprov.go.id', NULL, '1', NULL, NULL, '2022-06-26 21:13:42', '2022-06-26 21:13:42', NULL),
(34, 7, NULL, NULL, 'https://penghubung.babelprov.go.id', NULL, '1', NULL, NULL, '2022-06-26 21:14:04', '2022-06-26 21:14:04', NULL),
(35, 2, NULL, NULL, 'https://kesbangpol.babelprov.go.id', NULL, '1', NULL, NULL, '2022-06-26 21:14:35', '2022-06-26 21:14:35', NULL),
(36, 26, NULL, NULL, 'tes.com', NULL, '0', NULL, NULL, '2026-04-06 18:47:27', '2026-04-06 18:54:44', '2026-04-06 18:54:44'),
(37, 1, NULL, NULL, 'tes.com', NULL, '1', NULL, NULL, '2026-04-06 18:52:10', '2026-04-06 18:55:16', '2026-04-06 18:55:16'),
(38, 1, NULL, NULL, 'tes.com', NULL, '1', NULL, NULL, '2026-04-06 19:05:04', '2026-04-06 19:05:43', '2026-04-06 19:05:43');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sektor_services`
--

CREATE TABLE `sektor_services` (
  `id` int NOT NULL,
  `tipe` char(1) DEFAULT NULL,
  `nama` varchar(200) DEFAULT NULL,
  `ket` text,
  `foto` varchar(200) DEFAULT NULL,
  `status` char(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `sektor_services`
--

INSERT INTO `sektor_services` (`id`, `tipe`, `nama`, `ket`, `foto`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '1', 'Kesehatan', 'publik', NULL, '1', NULL, NULL, NULL),
(2, '1', 'Pendidikan', 'publik', NULL, '1', NULL, NULL, NULL),
(3, '1', 'Sosial', 'publik', NULL, '1', NULL, NULL, NULL),
(4, '1', 'Pekerjaan Umum, Penataan Ruang dan Kawasan Permukiman', 'publik', NULL, '1', NULL, NULL, NULL),
(5, '1', 'Energi dan Sumber Daya Mineral', 'publik', NULL, '1', NULL, NULL, NULL),
(6, '1', 'Pariwisata, Kebudayaan, Kepemudaan dan Olahraga', 'publik', NULL, '1', NULL, NULL, NULL),
(7, '1', 'Perhubungan', 'publik', NULL, '1', NULL, NULL, NULL),
(8, '1', 'Komunikasi dan Informatika, Statistik dan Persandian', 'publik', NULL, '1', NULL, NULL, NULL),
(9, '1', 'Penanaman Modal dan Pelayanan Terpadu Satu Pintu', 'publik', NULL, '1', NULL, NULL, NULL),
(10, '1', 'Koperasi, Usaha Kecil dan Menengah', 'publik', NULL, '1', NULL, NULL, NULL),
(11, '1', 'Perindustrian dan Perdagangan', 'publik', NULL, '1', NULL, NULL, NULL),
(12, '1', 'Ketentraman dan Ketertiban Umum', 'publik', NULL, '1', NULL, NULL, NULL),
(13, '1', 'Perpustakaan', 'publik', NULL, '1', NULL, NULL, NULL),
(14, '2', 'Perencanaan, Penganggaran dan Keuangan', 'pemda', NULL, '1', NULL, NULL, NULL),
(15, '2', 'Kepegawaian', 'pemda', NULL, '1', NULL, NULL, NULL),
(16, '2', 'Pengadaan Barang/Jasa', 'pemda', NULL, '1', NULL, NULL, NULL),
(17, '2', 'Kearsipan Dinamis', 'pemda', NULL, '1', NULL, NULL, NULL),
(18, '2', 'Pengelolaan Barang Milik Negara / Daerah ', 'pemda', NULL, '1', NULL, NULL, NULL),
(19, '2', 'Pengawasan Internal Pemerintah', 'pemda', NULL, '1', NULL, NULL, NULL),
(20, '2', 'Akuntabilitas Kinerja Organisasi', 'pemda', NULL, '1', NULL, NULL, NULL),
(21, '2', 'Pengaduan Pelayanan Publik', 'pemda', NULL, '1', NULL, NULL, NULL),
(22, '2', 'Data Terbuka', 'pemda', NULL, '1', NULL, NULL, NULL),
(23, '2', 'Jaringan Dokumentasi dan Informasi Hukum (JDIH)', 'pemda', NULL, '1', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `services`
--

CREATE TABLE `services` (
  `id` int NOT NULL,
  `id_tipe` int DEFAULT NULL,
  `id_sektor` int DEFAULT NULL,
  `id_instansi` int DEFAULT NULL,
  `nama` varchar(200) DEFAULT NULL,
  `ket` text,
  `status` char(1) DEFAULT NULL,
  `foto` varchar(200) DEFAULT NULL,
  `linkna` varchar(100) DEFAULT NULL,
  `uploadby` varchar(100) DEFAULT NULL,
  `tglupload` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `services`
--

INSERT INTO `services` (`id`, `id_tipe`, `id_sektor`, `id_instansi`, `nama`, `ket`, `status`, `foto`, `linkna`, `uploadby`, `tglupload`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 2, 14, 8, 'Sistem Informasi Pembangunan Daerah (SIPD)', 'Sistem Informasi Pembangunan Daerah (SIPD) merupakan sistem informasi yang memuat sistem perencanaan pembangunan daerah, dan sistem keuangan daerah serta sistem pemerintahan daerah yang lain, termasuk sistem pembinaan dan pengawasan pemerintahan daerah', '1', 'icon_20220616031935.png', 'https://babelprov.sipd.kemendagri.go.id', NULL, NULL, '2022-06-15 20:19:36', '2022-06-15 20:19:36', NULL),
(2, 1, 1, 25, 'Portal SIM Dinas Kesehatan', NULL, '1', 'icon_20220617075744.PNG', 'https://phic.babelprov.go.id', NULL, NULL, '2022-06-15 20:27:04', '2022-06-17 00:57:44', NULL),
(3, 2, 16, 13, 'Layanan Pengadaan Secara Elektronik (LPSE)', 'Sistem informasi LPSE atau Layanan Pengadaan Secara Elektronik merupakan system informasi yang memuat informasi, transaksi data dan integrasi data dalam penyelenggara sistem elektronik pengadaan barang/jasa pemerintah.', '1', 'icon_20220616041424.png', 'https://lpse.babelprov.go.id', NULL, NULL, '2022-06-15 21:14:24', '2022-06-15 21:15:16', NULL),
(4, 2, 17, 20, 'Sistem Informasi Kearsipan Dinamis Terintegrasi (SRIKANDI)', 'Sistem Informasi Kearsipan Dinamis Terintegrasi (SRIKANDI) merupakan system informasi yang memuat informasi, transaksi data dan integrasi data dalam rangka penyelenggaraan kearsipan nasional, khususnya di bidang pengembangan untuk membantu proses digitalisasi persuratan dan kearsipan dinamis.', '1', 'icon_20220616041801.png', 'https://srikandi.arsip.go.id', NULL, NULL, '2022-06-15 21:18:01', '2022-06-15 21:18:01', NULL),
(5, 1, 1, 25, 'Aplikasi SIM Rumah Sakit', NULL, '1', 'icon_20220616043252.JPG', 'https://sirsak.rsj.babelprov.go.id', NULL, NULL, '2022-06-15 21:32:52', '2022-06-17 00:53:41', NULL),
(6, 1, 2, 33, 'Portal layanan Penerimaan Peserta Didik Baru Jenjang SMA dan SMK', NULL, '1', 'icon_20220616043608.png', 'https://ppdb.babelprov.go.id', NULL, NULL, '2022-06-15 21:36:08', '2022-06-15 21:36:08', NULL),
(7, 1, 3, 39, 'Sistem Informasi Terpadu Kesejahteraan Sosial (SENTRAL)', NULL, '1', 'icon_20220616043840.JPG', 'https://sentralbahari.babelprov.go.id/', NULL, NULL, '2022-06-15 21:38:40', '2022-06-15 21:38:40', NULL),
(8, 1, 3, 39, 'Sistem Informasi Terpadu Dasa Wisma', NULL, '1', 'icon_20220616043948.JPG', 'https://sidumababel.babelprov.go.id/', NULL, NULL, '2022-06-15 21:39:48', '2022-06-15 21:39:48', NULL),
(9, 1, 4, 30, 'Aplikasi SIM Perumahan Rakyat & Kawasan Pemukiman', NULL, '1', 'icon_20220616044238.png', 'https://simpera.babelprov.go.id', NULL, NULL, '2022-06-15 21:42:38', '2022-06-15 23:31:04', NULL),
(10, 1, 5, 19, 'Layanan Konsultasi Dan Informasi Secara Online (LAKSO)', NULL, '1', 'icon_20220616044435.png', 'https://lakso.esdm.babelprov.go.id', NULL, NULL, '2022-06-15 21:44:35', '2022-06-15 21:44:35', NULL),
(11, 1, 5, 19, 'Sistem Informasi Pengisian Minyak Solar (SE MILIAR)', NULL, '1', 'icon_20220616044555.JPG', 'https://esdm.babelprov.go.id/fuel-card/', NULL, NULL, '2022-06-15 21:45:55', '2022-06-15 21:45:55', NULL),
(12, 1, 6, 21, 'Aplikasi Basis Data Pariwisata', NULL, '1', 'icon_20220616044810.JPG', 'https://visitbangkabelitung.com', NULL, NULL, '2022-06-15 21:48:10', '2022-06-15 21:48:10', NULL),
(13, 1, 6, 21, 'Aplikasi SIM Bujang Miak (Kepemudaan)', NULL, '1', 'icon_20220616044958.JPG', 'https://sibumi.babelprov.go.id', NULL, NULL, '2022-06-15 21:49:58', '2022-06-15 21:49:58', NULL),
(14, 1, 7, 34, 'Portal Forum Lalu Lintas Jalan Raya', NULL, '1', 'icon_20220616045146.png', 'https://fllaj.babelprov.go.id', NULL, NULL, '2022-06-15 21:51:46', '2022-06-15 21:51:46', NULL),
(15, 1, 8, 26, 'Aplikasi Asset dan Layanan HelpDesk TIK', NULL, '1', 'icon_20220616045548.JPG', 'https://itsm.babelprov.go.id', NULL, NULL, '2022-06-15 21:55:48', '2022-06-15 21:55:48', NULL),
(16, 1, 8, 26, 'Portal Tim CSirt-Babelprov', NULL, '1', 'icon_20220616045706.JPG', 'https://csirt.babelprov.go.id', NULL, NULL, '2022-06-15 21:57:06', '2022-06-15 21:57:06', NULL),
(17, 1, 8, 26, 'Aplikasi Bantuku', NULL, '1', 'icon_20220616045842.JPG', 'https://bantuku.babelprov.go.id', NULL, NULL, '2022-06-15 21:58:42', '2022-06-15 21:58:42', NULL),
(18, 1, 8, 26, 'Aplikasi Layanan Jaringan', NULL, '1', 'icon_20220616055405.JPG', 'https://sipelajar.babelprov.go.id', NULL, NULL, '2022-06-15 22:54:05', '2022-06-15 22:54:05', NULL),
(19, 1, 8, 26, 'Seleksi Calon Komisi Informasi Daerah', NULL, '1', 'icon_20220616055607.JPG', 'https://sscaki.babelprov.go.id', NULL, NULL, '2022-06-15 22:56:07', '2022-06-15 22:56:07', NULL),
(20, 1, 8, 26, 'Seleksi Calon Komisi Penyiaran Indonesia Daerah', NULL, '1', 'icon_20220616055740.JPG', 'https://sscak.babelprov.go.id', NULL, NULL, '2022-06-15 22:57:40', '2022-06-15 22:57:40', NULL),
(21, 1, 8, 26, 'Satu Data Indonesia Provinsi Kepulauan Bangka Belitung', NULL, '1', 'icon_20220617075257.PNG', 'https://sdi.babelprov.go.id', NULL, NULL, '2022-06-15 23:01:18', '2022-06-17 00:52:57', NULL),
(22, 1, 1, 25, 'Sistem Manajemen Dokumen Akreditasi', NULL, '1', 'icon_20220629084404.png', 'http://sismadak.babelprov.go.id/', NULL, NULL, '2022-06-15 23:04:54', '2022-06-29 01:44:04', NULL),
(23, 1, 10, 27, 'Pusat Data seluruh Usaha Mikro, Kecil dan Menengah', NULL, '1', 'icon_20220616062126.JPG', 'https://data-umkm.babelprov.go.id', NULL, NULL, '2022-06-15 23:21:26', '2022-06-15 23:21:26', NULL),
(24, 1, 11, 35, 'Aplikasi Rumah Kemasan (Desain Kemasan)', NULL, '1', 'icon_20220616062407.png', 'https://rumahkemasan.babelprov.go.id', NULL, NULL, '2022-06-15 23:24:07', '2022-06-15 23:24:07', NULL),
(25, 1, 12, 5, 'Portal Informasi Covid 19 Bangka Belitung', NULL, '1', 'icon_20220616062608.png', 'https://covid19.babelprov.go.id', NULL, NULL, '2022-06-15 23:26:08', '2022-06-15 23:26:08', NULL),
(26, 1, 8, 26, 'Aplikasi Layanan Keterbukaan Informasi Publik', NULL, '1', 'icon_20220616063004.JPG', 'http://ppid.babelprov.go.id', NULL, NULL, '2022-06-15 23:30:04', '2022-06-15 23:30:04', NULL),
(27, 2, 15, 1, 'Sistem Informasi Tunjangan Kinerja dan Presensi', 'Sistem Informasi Tunjangan Kinerja dan Presensi merupakan system informasi dalam pemberian tunjangan kinerja dan presensi sidik jari dan mobile serta pencatatan kinerja harian pegawai ASN.', '1', 'icon_20220616075953.JPG', 'https://e-kinerja.babelprov.go.id', NULL, NULL, '2022-06-16 00:59:53', '2022-06-16 00:59:53', NULL),
(28, 2, 15, 1, 'Sistem Satu Data Mandiri ASN (SATAM ASN)', 'Sistem Satu Data Mandiri ASN (SATAM ASN) merupakan system informasi dalam pengelolaan data updating data serta informasi pribadi, keluarga, unggahan dokumen kelengkapan administratif data individu termasuk pengajuan cuti, usulan kenaikan gaji berkala, dan usulan satya lencana.', '1', 'icon_20220616080145.JPG', 'https://satamasn.babelprov.go.id/', NULL, NULL, '2022-06-16 01:01:45', '2022-06-16 01:01:45', NULL),
(29, 2, 15, 1, 'Sistem Informasi Perencanaan ASN dan Penataan Pegawai Tenaga Kontrak (SIPINTER)', 'Sistem Informasi Perencanaan ASN dan Penataan Pegawai Tenaga Kontrak (SIPINTER) merupakan system informasi dalam penyusunan rencana kebutuhan dan formasi ASN berdasarkan analisis beban kerja serta penataan pegawai tenaga kontrak.', '1', 'icon_20220616080317.JPG', 'https://sipinter.babelprov.go.id/', NULL, NULL, '2022-06-16 01:03:17', '2022-06-16 01:03:17', NULL),
(30, 2, 15, 1, 'Sistem Informasi Rencana Pengembangan Kompetensi (RENBANGKOM)', 'Sistem Informasi Rencana Pengembangan Kompetensi (RENBANGKOM) merupakan system informasi dalam penyusunan rencana Pelatihan Klasikal, Non-Klasikal yang bekerjasama dengan pihak ketiga dan melaporkan hasil mengkuti Pengembangan Kompetensi sebagai Bentuk Pemenuhan 20 JP Pengembangan Kompetensi ASN', '1', 'icon_20220616080459.JPG', 'https://simdiklat.babelprov.go.id/', NULL, NULL, '2022-06-16 01:04:59', '2022-06-16 01:04:59', NULL),
(31, 2, 15, 1, 'Sistem Informasi Kenaikan Pangkat (SIKEPANG)', 'Sistem Informasi Kenaikan Pangkat (SIKEPANG) merupakan system informasi dalam mengusulkan Kenaikan Pangkat dan Jabatan serta penyampaian dokumen persyaratan secara elektronik.', '1', 'icon_20220616080707.JPG', 'https://sikepang.babelprov.go.id/', NULL, NULL, '2022-06-16 01:07:07', '2022-06-16 01:07:07', NULL),
(32, 2, 15, 1, 'Sistem Informasi Manajemen Pendidikan dan Pelatihan (SIMDIKLAT)', 'Sistem Informasi Manajemen Pendidikan dan Pelatihan (SIMDIKLAT) merupakan system informasi dalam pendaftaran dan manajemen Pendidikan Pelatihan berbasis online dan mobile.', '1', 'icon_20220616081143.JPG', 'https://simdiklat.babelprov.go.id/', NULL, NULL, '2022-06-16 01:11:43', '2022-06-16 01:11:43', NULL),
(33, 2, 15, 1, 'Sistem Informasi PRIMADONA', 'Sistem Informasi PRIMADONA merupakan system informasi Manajemen Assessment ASN dalam penilaian kompetensi melalui psikotest, simulasi kompetensi, dan wawancara.', '1', 'icon_20220616081341.JPG', 'https://primadona.babelprov.go.id/', NULL, NULL, '2022-06-16 01:13:41', '2022-06-16 01:13:41', NULL),
(34, 2, 19, 41, 'Sistem Informasi Tindak Lanjut Hasil Pemeriksaan', 'Sistem Informasi Tindak Lanjut Hasil Pemeriksaan merupakan system informasi  yang memuat informasi dan transaksi data dalam pengelolaan tindak lanjut hasil pemeriksaan kinerja dan keuangan.', '1', 'icon_20220616082234.JPG', 'http://sitlhp.babelprov.go.id/', NULL, NULL, '2022-06-16 01:22:34', '2022-06-16 01:22:34', NULL),
(35, 2, 20, 8, 'Sistem Informasi Akuntabilitas Kinerja', 'Sistem Informasi Akuntabilitas Kinerja merupakan system informasi dalam proses perencanaan kinerja, penganggaran kinerja, keterkaitan kegiatan/sub kegiatan dalam pencapaian target kinerja, dan monitoring serta evaluasi pencapaian kinerja dan keuangan', '1', 'icon_20220616082445.JPG', 'https://sakip.babelprov.go.id/', NULL, NULL, '2022-06-16 01:24:45', '2022-06-16 01:24:45', NULL),
(36, 2, 21, 26, 'Sistem Informasi Layanan Aspirasi dan Pengaduan Online Rakyat (disingkat LAPOR!)', 'Sistem Informasi Layanan Aspirasi dan Pengaduan Online Rakyat (disingkat LAPOR!) adalah aplikasi yang melibatkan partisipasi publik dan bersifat dua arah, sehingga dalam aplikasi ini masyarakat dapat berinteraksi dengan pemerintah secara interaktif dengan prinsip mudah dan terpadu untuk pengawasan pembangunan dan pelayanan publik.', '1', 'icon_20220616082706.JPG', 'https://lapor.go.id', NULL, NULL, '2022-06-16 01:27:06', '2022-06-16 01:27:06', NULL),
(37, 2, 21, 26, 'Sistem Informasi Portal Layanan Aspirasi  Pengaduan secara Online dan Responsif dalam Pelayanan Publik (LAPOR PAK)', 'Sistem Informasi Portal Layanan Aspirasi  Pengaduan secara Online dan Responsif dalam Pelayanan Publik (LAPOR PAK)  merupakan sarana bagi masyarakat Provinsi Kepulauan Bangka Belitung dalam menyampaikan aspirasi, pengaduan, masukan dan saran bagi Pemerintah Daerah agar terwujudnya Tata Kepemerintahan yang Baik.', '1', 'icon_20220616082851.JPG', 'http://lapor.babelprov.go.id/', NULL, NULL, '2022-06-16 01:28:51', '2022-06-16 01:28:51', NULL),
(38, 2, 22, 26, 'Sistem Informasi Satu Data Indonesia Provinsi Kepulauan Bangka Belitung', 'Sistem Informasi Satu Data Indonesia Provinsi Kepulauan Bangka Belitung merupakan system informasi yang memuat informasi, transaksi data dan integrasi data dalam melakukan perencanaan data, pengumpulan data, pemeriksaan data, penyebarluasan data statistic sectoral.', '1', 'icon_20220617075240.PNG', 'https://sdi.babelprov.go.id/', NULL, NULL, '2022-06-16 01:37:01', '2022-06-17 00:52:40', NULL),
(39, 2, 23, 10, 'Sistem Informasi Jaringan Dokumentasi dan Informasi Hukum', 'Sistem Informasi Jaringan Dokumentasi dan Informasi Hukum merupakan suatu sistem pendayagunaan bersama peraturan perundang-undangan dan bahan dokumentasi hukum lainnya secara tertib, terpadu dan berkesinambungan serta merupakan sarana pemberian pelayanan informasi hukum secara mudah, cepat dan akurat.', '1', 'icon_20220616083840.JPG', 'https://jdih.babelprov.go.id/', NULL, NULL, '2022-06-16 01:38:40', '2022-06-16 01:38:40', NULL),
(40, 1, 12, 2, 'Aplikasi Mobile Layanan Aspirasi Masyarakat', NULL, '1', 'icon_20220617054814.jpeg', 'https://play.google.com/store/apps/details?id=com.kesbangpol.awasbabel', NULL, NULL, '2022-06-16 01:49:11', '2022-06-16 22:48:14', NULL),
(41, 1, 1, 25, 'Aplikasi Layanan Lab. Kesehatan', NULL, '1', 'icon_20220617013951.JPG', 'https://balailabkes.babelprov.go.id', NULL, NULL, '2022-06-16 18:39:51', '2022-06-16 18:39:51', NULL),
(42, 1, 1, 25, 'Aplikasi Sistem Manajemen Teknologi Berbasis Informasi (SIMELATI) Mobile', NULL, '1', 'icon_20220617054534.jpeg', 'https://play.google.com/store/apps/details?id=com.pyatindonesia.rsupsoekarno', NULL, NULL, '2022-06-16 18:50:20', '2022-06-17 00:54:59', NULL),
(43, 1, 13, 20, 'Aplikasi e-Pusda Mobile', NULL, '1', 'icon_20220617054636.jpeg', 'https://play.google.com/store/apps/details?id=id.kubuku.kbk11285c3', NULL, NULL, '2022-06-16 18:52:35', '2022-06-16 22:46:47', NULL),
(44, 2, 18, 3, 'Sistem Informasi Barang Milik Daerah (BMD)', 'Sistem Informasi Barang Milik Daerah (BMD) merupakan system informasi yang memuat informasi, transaksi data dan integrasi data dalam pengelolaan perencanaan, pengadaan, penggunaan, penatausahaan, pemanfataan, pemeliharaan dan penghapusan barang milik daerah melalui aplikasi SIMD@ bmd.', '1', 'icon_20220617080140.jpg', 'https://drive.google.com/file/d/1vuk8f6rBc71-l7NBcVFMX3_rmi1p9r6Y/view', NULL, NULL, '2022-06-16 19:16:34', '2022-06-17 01:01:40', NULL),
(45, 2, 15, 1, 'E-Presensi & E-Kinerja Mobile', 'E-Presensi & E-Kinerja Mobile', '1', 'icon_20220617055701.jpeg', 'https://play.google.com/store/apps/details?id=id.go.babelprov.ekinerja', NULL, NULL, '2022-06-16 22:57:01', '2022-06-16 22:57:01', NULL),
(46, 1, 9, 32, 'Investmen Platform', NULL, '1', 'icon_20220629083011.png', 'http://promosi.babelprov.go.id/', NULL, NULL, '2022-06-29 01:30:11', '2022-06-29 01:30:11', NULL),
(47, 1, 8, 26, 'Aplikasi PPID Provinsi Kepulauan Bangka Belitung', NULL, '1', 'icon_20220712162505.jpg', 'https://play.google.com/store/apps/details?id=com.babelprov.ppidbabel', NULL, NULL, '2022-07-12 09:25:05', '2022-07-12 09:25:05', NULL),
(48, 1, 6, 21, 'Pendataan Anggota Purna Paskibaraka Indonesia Provinsi Kepulauan Bangka Belitung', NULL, '1', 'icon_20220916123409.jpg', 'https://ppi.babelprov.go.id/', NULL, NULL, '2022-09-16 05:34:10', '2022-11-06 23:40:54', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('cGOqiRy2qK0a9ZsoYiOv2c4ZmiCl6wgfFKQsYjB5', 46, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/149.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiTXlEQnA3UHRYUXRjWXBSTk9saXlXU0phcEt0SWo0ekJSeFV2OTZINiI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MzY6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9tYW5kYXQtaW5kZXgvMSI7czo1OiJyb3V0ZSI7czoxMToiaW5kZXhNYW5kYXQiO31zOjU0OiJsb2dpbl9wZXR1Z2FzXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6NDY7fQ==', 1782774511);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tasks`
--

CREATE TABLE `tasks` (
  `id` bigint UNSIGNED NOT NULL,
  `phase_id` bigint UNSIGNED NOT NULL,
  `website_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `order` smallint UNSIGNED NOT NULL DEFAULT '0',
  `assigned_to` bigint UNSIGNED DEFAULT NULL,
  `status` enum('pending','in_progress','review','completed','blocked','cancelled') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `progress` tinyint UNSIGNED NOT NULL DEFAULT '0',
  `due_date` date DEFAULT NULL,
  `completed_at` date DEFAULT NULL,
  `estimated_hours` smallint UNSIGNED DEFAULT NULL,
  `actual_hours` smallint UNSIGNED DEFAULT NULL,
  `priority` enum('low','medium','high') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'medium',
  `notes` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `attachments` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin,
  `created_by` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tindak_lanjut_layanan`
--

CREATE TABLE `tindak_lanjut_layanan` (
  `id` bigint UNSIGNED NOT NULL,
  `id_layanan` bigint UNSIGNED NOT NULL,
  `id_petugas` json NOT NULL,
  `keterangan` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `tindak_lanjut_layanan`
--

INSERT INTO `tindak_lanjut_layanan` (`id`, `id_layanan`, `id_petugas`, `keterangan`, `created_at`, `updated_at`) VALUES
(23, 26, '[\"47\", \"49\"]', '\"Tolong segera tindak lanjuti kendala akses aplikasi yang dilaporkan pengguna. Prioritaskan pengecekan pada modul integrasi database dan pastikan tidak ada data yang korup. Jika perlu, lakukan restart service pada jam istirahat untuk meminimalisir dampak ke pengguna lain\"', '2026-05-11 20:38:27', '2026-06-02 23:26:09'),
(24, 27, '[\"47\", \"49\"]', NULL, '2026-06-02 22:40:19', '2026-06-02 22:40:19');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `role` enum('admin','kabid','katim','staff') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'staff',
  `no_hp` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nip` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gol` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jabatan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `unit_kerja` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `daerah` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pangkat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_seen` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `role`, `no_hp`, `nip`, `gol`, `jabatan`, `unit_kerja`, `password`, `daerah`, `pangkat`, `avatar`, `remember_token`, `last_seen`, `created_at`, `updated_at`) VALUES
(45, 'Afghan Almufqi', 'kakarotuchiha5@gmail.com', NULL, 'kabid', '0895417380105', '199501012023011001', 'III/a', 'Pranata Komputer', 'Seksi Teknologi Informasi dan Komunikasi', '$2y$12$MAvrciLQDz0EO44iGbGsEuHdt8jcbtaSzN7dvEyvGSituJLoiqKx6', NULL, 'Penata Muda', NULL, NULL, NULL, '2026-05-05 21:03:11', '2026-05-05 21:03:11'),
(46, 'gan matkuso', 'gan12@gmail.com', NULL, 'kabid', '6281234567892', '199501012023011002', 'III/b', 'Ketua Tim Teknis', 'Seksi Teknologi Informasi dan Komunikasi', '$2y$12$SPsM9ssTvs0RKLCSUT9n7umalf0cyb2dGe.ZxzgSgOCOwyaq40AyS', NULL, 'Penata Muda', NULL, NULL, NULL, '2026-05-05 21:03:11', '2026-05-05 21:03:11'),
(47, 'gan oy', 'budi.petugas@gmail.com', NULL, 'staff', '0895417380105', '199501012023011003', 'III/a', 'Teknisi Jaringan', 'Seksi Infrastruktur Jaringan', '$2y$12$uImpqipECg59jGk97u7MUefRKRcjDNRJ9/m0/v306vCSJ8hrlrocW', NULL, 'Penata Muda', NULL, NULL, NULL, '2026-05-05 21:03:11', '2026-05-05 21:03:11'),
(48, 'Super Admin SPBE', 'admin@spbe.go.id', NULL, 'admin', '6285211223300', '198805122015031000', 'III/c', 'Administrator Sistem', 'Sekretariat', '$2y$12$MBh.CQObeMGtGDhG0HKWl.xtrDe0ia1tGgwUj3UHFTOv/dZC9tHW2', 'Pusat', 'Penata', NULL, NULL, NULL, '2026-05-05 21:03:11', '2026-05-05 21:03:11'),
(49, 'wijaya petugas', 'petugas@gmail.com', NULL, 'staff', '6281399887766', '198001012005011005', 'IV/a', 'Kepala Bidang', 'Bidang E-Government', '$2y$12$0.OJK/rl9de9SR/HbBqw0O7Ut3NSiCtDscs6ZxRT1kenjDnt8vxO2', NULL, 'Pembina', '1782773596_images (1).jpg', NULL, NULL, '2026-05-05 21:03:11', '2026-06-29 15:53:16'),
(50, 'Hilal', 'rina.petugas@gmail.com', NULL, 'staff', '082178099027', '199702202024012002', 'III/a', 'Programmer', 'Seksi Aplikasi Dasar', '$2y$12$JTkcvgHN6X4iKBqpd3/lX.qVeAiyzNTKRBNAkYDcQF5920AumL5r6', NULL, 'Penata Muda', NULL, NULL, NULL, '2026-05-05 21:03:11', '2026-05-05 21:03:11'),
(51, 'Pinkan', 'linda.petugas@gmail.com', NULL, 'staff', '081293172600', '199608152023022004', 'III/a', 'Analis Keamanan Siber', 'Seksi Keamanan Informasi', '$2y$12$exFtuQzmc8i7U1GR1zMzL.ZHjvStKCbxy9qsUBYgZr4J/kYIxUDku', NULL, 'Penata Muda', NULL, NULL, NULL, '2026-05-05 21:03:11', '2026-05-05 21:03:11'),
(52, 'Agus Mulyadi', 'agus.pimpinan@gmail.com', NULL, 'kabid', '6281122334455', '197504121998031002', 'IV/b', 'Sekretaris Dinas', 'Sekretariat Diskominfo', '$2y$12$c7ulNuBGZIMIyUMCwGjyUOnhdYwiVwTn/PBifkPYT8x0WWQ96snt.', NULL, 'Pembina Tk. I', NULL, NULL, NULL, '2026-05-05 21:03:11', '2026-05-05 21:03:11'),
(53, 'Rizky Pratama', 'rizky.opd@gmail.com', NULL, 'katim', '6281200998877', '199307072020011010', 'III/a', 'Ketua Tim Monitoring', 'Dinas Sosial', '$2y$12$pCeCaffMKdWpPCDReiTDCegf1MDbs95hEwyxoKDDg7ZPmvrJ38NMq', 'Bangka Barat', 'Penata Muda', NULL, NULL, NULL, '2026-05-05 21:03:11', '2026-05-05 21:03:11');

-- --------------------------------------------------------

--
-- Struktur dari tabel `websites`
--

CREATE TABLE `websites` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url_staging` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `logo_path` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `client_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `client_email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `client_phone` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `client_address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pic_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `pic_email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pic_phone` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category` enum('company_profile','ecommerce','portal','government','education','healthcare','landing_page','webapp','other') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'company_profile',
  `priority` enum('low','medium','high','critical') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'medium',
  `tech_stack` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cms` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hosting_provider` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `server_specs` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `domain_registrar` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `domain_expiry` date DEFAULT NULL,
  `tags` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin,
  `team_members` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin,
  `contract_start` date DEFAULT NULL,
  `contract_end` date DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `target_launch_date` date DEFAULT NULL,
  `actual_launch_date` date DEFAULT NULL,
  `duration_days` smallint UNSIGNED DEFAULT NULL,
  `status` enum('draft','planning','in_progress','on_hold','review','completed','cancelled') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'draft',
  `overall_progress` tinyint UNSIGNED NOT NULL DEFAULT '0',
  `current_phase_order` tinyint UNSIGNED NOT NULL DEFAULT '1',
  `budget_total` decimal(15,2) DEFAULT NULL,
  `budget_spent` decimal(15,2) DEFAULT NULL,
  `internal_notes` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `client_notes` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `websites`
--

INSERT INTO `websites` (`id`, `name`, `slug`, `url`, `url_staging`, `description`, `logo_path`, `client_name`, `client_email`, `client_phone`, `client_address`, `pic_name`, `pic_email`, `pic_phone`, `category`, `priority`, `tech_stack`, `cms`, `hosting_provider`, `server_specs`, `domain_registrar`, `domain_expiry`, `tags`, `team_members`, `contract_start`, `contract_end`, `start_date`, `target_launch_date`, `actual_launch_date`, `duration_days`, `status`, `overall_progress`, `current_phase_order`, `budget_total`, `budget_spent`, `internal_notes`, `client_notes`, `is_active`, `created_at`, `updated_at`, `deleted_at`) VALUES
(4, 'Dinas Pendidikan Kota Batam', 'dinas-pendidikan-kota-batam-1', NULL, NULL, NULL, NULL, 'Pemkot Batam', NULL, NULL, NULL, 'Budi Santoso', NULL, NULL, 'government', 'high', 'Laravel 11 + Next.js 14', 'Strapi', 'DigitalOcean', NULL, NULL, NULL, NULL, '[{\"name\":\"Budi Santoso\",\"role\":\"Project Manager\",\"email\":\"budi.santoso@company.local\"},{\"name\":\"Dedi Kurniawan\",\"role\":\"Frontend Developer\",\"email\":\"dedi.kurniawan@company.local\",\"phone\":\"081268430804\"},{\"name\":\"Ahmad Fauzi\",\"role\":\"Backend Developer\",\"email\":\"ahmad.fauzi@company.local\",\"phone\":\"081233993222\"},{\"name\":\"Nurul Huda\",\"role\":\"UI\\/UX Designer\",\"email\":\"nurul.huda@company.local\",\"phone\":\"081213625183\"},{\"name\":\"Bayu Aji\",\"role\":\"QA Tester\",\"email\":\"bayu.aji@company.local\",\"phone\":\"081243587118\"}]', NULL, NULL, '2025-09-22', '2026-03-24', '2026-03-24', 131, 'completed', 0, 1, NULL, NULL, NULL, NULL, 1, '2026-02-24 08:31:50', '2026-02-24 08:41:42', '2026-02-24 08:41:42'),
(5, 'RSUD Embung Fatimah', 'rsud-embung-fatimah-2', NULL, NULL, NULL, NULL, 'RSUD Batam', NULL, NULL, NULL, 'Sari Dewi', NULL, NULL, 'healthcare', 'critical', 'WordPress + Elementor', 'WordPress', 'Biznet', NULL, NULL, NULL, NULL, '[{\"name\":\"Sari Dewi\",\"role\":\"Project Manager\",\"email\":\"sari.dewi@company.local\"},{\"name\":\"Nurul Huda\",\"role\":\"Frontend Developer\",\"email\":\"nurul.huda@company.local\",\"phone\":\"081259185275\"},{\"name\":\"Siti Aminah\",\"role\":\"Backend Developer\",\"email\":\"siti.aminah@company.local\",\"phone\":\"081278649432\"}]', NULL, NULL, '2025-11-26', '2026-05-28', NULL, 131, 'in_progress', 36, 1, NULL, NULL, NULL, NULL, 1, '2026-02-24 08:31:50', '2026-02-24 08:41:42', '2026-02-24 08:41:42'),
(6, 'PT Pelindo Batam', 'pt-pelindo-batam-3', NULL, NULL, NULL, NULL, 'PT Pelindo', NULL, NULL, NULL, 'Reza Pratama', NULL, NULL, 'company_profile', 'high', 'React + Express', 'Custom', 'DigitalOcean', NULL, NULL, NULL, NULL, '[{\"name\":\"Reza Pratama\",\"role\":\"Project Manager\",\"email\":\"reza.pratama@company.local\"},{\"name\":\"Siti Aminah\",\"role\":\"Frontend Developer\",\"email\":\"siti.aminah@company.local\",\"phone\":\"081288278247\"},{\"name\":\"Rina Sari\",\"role\":\"Backend Developer\",\"email\":\"rina.sari@company.local\",\"phone\":\"081257232696\"},{\"name\":\"Dedi Kurniawan\",\"role\":\"UI\\/UX Designer\",\"email\":\"dedi.kurniawan@company.local\",\"phone\":\"081214736846\"},{\"name\":\"Joko Widodo\",\"role\":\"QA Tester\",\"email\":\"joko.widodo@company.local\",\"phone\":\"081213990094\"}]', NULL, NULL, '2025-12-06', '2026-06-08', NULL, 131, 'in_progress', 0, 1, NULL, NULL, NULL, NULL, 1, '2026-02-24 08:31:50', '2026-02-24 08:41:42', '2026-02-24 08:41:42'),
(7, 'Portal Pariwisata Bintan', 'portal-pariwisata-bintan-4', NULL, NULL, NULL, NULL, 'Dispar Bintan', NULL, NULL, NULL, 'Nina Kusuma', NULL, NULL, 'portal', 'medium', 'Laravel 11 + Vue 3', 'Filament CMS', 'DigitalOcean', NULL, NULL, NULL, NULL, '[{\"name\":\"Nina Kusuma\",\"role\":\"Project Manager\",\"email\":\"nina.kusuma@company.local\"},{\"name\":\"Joko Widodo\",\"role\":\"Frontend Developer\",\"email\":\"joko.widodo@company.local\",\"phone\":\"081241038571\"},{\"name\":\"Bayu Aji\",\"role\":\"Backend Developer\",\"email\":\"bayu.aji@company.local\",\"phone\":\"081233431327\"}]', NULL, NULL, '2025-12-26', '2026-06-29', NULL, 131, 'in_progress', 0, 1, NULL, NULL, NULL, NULL, 1, '2026-02-24 08:31:50', '2026-02-24 08:41:57', '2026-02-24 08:41:57'),
(8, 'DPRD Provinsi Kepri', 'dprd-provinsi-kepri-5', NULL, NULL, NULL, NULL, 'Sekretariat DPRD', NULL, NULL, NULL, 'Agus Wibowo', NULL, NULL, 'government', 'high', 'Nuxt 3 + Laravel API', 'WordPress', 'AWS EC2', NULL, NULL, NULL, NULL, '[{\"name\":\"Agus Wibowo\",\"role\":\"Project Manager\",\"email\":\"agus.wibowo@company.local\"},{\"name\":\"Rina Sari\",\"role\":\"Frontend Developer\",\"email\":\"rina.sari@company.local\",\"phone\":\"081233101915\"},{\"name\":\"Nurul Huda\",\"role\":\"Backend Developer\",\"email\":\"nurul.huda@company.local\",\"phone\":\"081295488153\"}]', NULL, NULL, '2025-10-27', '2026-04-28', NULL, 131, 'review', 0, 1, NULL, NULL, NULL, NULL, 1, '2026-02-24 08:31:51', '2026-02-24 08:41:42', '2026-02-24 08:41:42'),
(9, 'Batam Electronic Store', 'batam-electronic-store-6', NULL, NULL, NULL, NULL, 'CV Batam Elec', NULL, NULL, NULL, 'Dian Rahayu', NULL, NULL, 'ecommerce', 'medium', 'React + Express', 'Custom', 'DigitalOcean', NULL, NULL, NULL, NULL, '[{\"name\":\"Dian Rahayu\",\"role\":\"Project Manager\",\"email\":\"dian.rahayu@company.local\"},{\"name\":\"Rina Sari\",\"role\":\"Frontend Developer\",\"email\":\"rina.sari@company.local\",\"phone\":\"081258649538\"},{\"name\":\"Ahmad Fauzi\",\"role\":\"Backend Developer\",\"email\":\"ahmad.fauzi@company.local\",\"phone\":\"081259729948\"}]', NULL, NULL, '2026-01-03', '2026-07-06', NULL, 131, 'in_progress', 0, 1, NULL, NULL, NULL, NULL, 1, '2026-02-24 08:31:51', '2026-02-24 08:41:57', '2026-02-24 08:41:57'),
(10, 'Universitas Batam Official', 'universitas-batam-official-7', NULL, NULL, NULL, NULL, 'Universitas Batam', NULL, NULL, NULL, 'Hendra Setiawan', NULL, NULL, 'education', 'high', 'React + Express', 'WordPress', 'IDCloudHost', NULL, NULL, NULL, NULL, '[{\"name\":\"Hendra Setiawan\",\"role\":\"Project Manager\",\"email\":\"hendra.setiawan@company.local\"},{\"name\":\"Siti Aminah\",\"role\":\"Frontend Developer\",\"email\":\"siti.aminah@company.local\",\"phone\":\"081284329557\"},{\"name\":\"Maya Putri\",\"role\":\"Backend Developer\",\"email\":\"maya.putri@company.local\",\"phone\":\"081274615301\"},{\"name\":\"Rina Sari\",\"role\":\"UI\\/UX Designer\",\"email\":\"rina.sari@company.local\",\"phone\":\"081284887818\"},{\"name\":\"Dedi Kurniawan\",\"role\":\"QA Tester\",\"email\":\"dedi.kurniawan@company.local\",\"phone\":\"081295633235\"}]', NULL, NULL, '2026-02-04', '2026-08-06', NULL, 131, 'planning', 0, 1, NULL, NULL, NULL, NULL, 1, '2026-02-24 08:31:51', '2026-02-24 08:41:42', '2026-02-24 08:41:42'),
(11, 'Bank BPR Kepri Digital', 'bank-bpr-kepri-digital-8', NULL, NULL, NULL, NULL, 'BPR Kepri', NULL, NULL, NULL, 'Lina Putri', NULL, NULL, 'company_profile', 'high', 'React + Express', 'Filament CMS', 'DigitalOcean', NULL, NULL, NULL, NULL, '[{\"name\":\"Lina Putri\",\"role\":\"Project Manager\",\"email\":\"lina.putri@company.local\"},{\"name\":\"Siti Aminah\",\"role\":\"Frontend Developer\",\"email\":\"siti.aminah@company.local\",\"phone\":\"081218613728\"},{\"name\":\"Dedi Kurniawan\",\"role\":\"Backend Developer\",\"email\":\"dedi.kurniawan@company.local\",\"phone\":\"081275715239\"}]', NULL, NULL, '2025-12-14', '2026-06-15', NULL, 131, 'in_progress', 0, 1, NULL, NULL, NULL, NULL, 1, '2026-02-24 08:31:51', '2026-02-24 08:41:42', '2026-02-24 08:41:42'),
(12, 'Polsek Nongsa Informatif', 'polsek-nongsa-informatif-9', NULL, NULL, NULL, NULL, 'Polsek Nongsa', NULL, NULL, NULL, 'Budi Santoso', NULL, NULL, 'government', 'low', 'Nuxt 3 + Laravel API', 'Custom', 'Niagahoster', NULL, NULL, NULL, NULL, '[{\"name\":\"Budi Santoso\",\"role\":\"Project Manager\",\"email\":\"budi.santoso@company.local\"},{\"name\":\"Joko Widodo\",\"role\":\"Frontend Developer\",\"email\":\"joko.widodo@company.local\",\"phone\":\"081223223286\"},{\"name\":\"Dedi Kurniawan\",\"role\":\"Backend Developer\",\"email\":\"dedi.kurniawan@company.local\",\"phone\":\"081214038194\"}]', NULL, NULL, '2026-01-10', '2026-07-13', NULL, 131, 'in_progress', 0, 1, NULL, NULL, NULL, NULL, 1, '2026-02-24 08:31:51', '2026-02-24 08:42:06', '2026-02-24 08:42:06'),
(13, 'Catering Mama Batam', 'catering-mama-batam-10', NULL, NULL, NULL, NULL, 'UD Mama Catering', NULL, NULL, NULL, 'Sari Dewi', NULL, NULL, 'landing_page', 'low', 'WordPress + Elementor', 'Custom', 'Niagahoster', NULL, NULL, NULL, NULL, '[{\"name\":\"Sari Dewi\",\"role\":\"Project Manager\",\"email\":\"sari.dewi@company.local\"},{\"name\":\"Maya Putri\",\"role\":\"Frontend Developer\",\"email\":\"maya.putri@company.local\",\"phone\":\"081233345943\"},{\"name\":\"Nurul Huda\",\"role\":\"Backend Developer\",\"email\":\"nurul.huda@company.local\",\"phone\":\"081249235219\"},{\"name\":\"Dedi Kurniawan\",\"role\":\"UI\\/UX Designer\",\"email\":\"dedi.kurniawan@company.local\",\"phone\":\"081242349771\"}]', NULL, NULL, '2025-11-06', '2026-05-08', '2026-05-05', 131, 'completed', 0, 1, NULL, NULL, NULL, NULL, 1, '2026-02-24 08:31:51', '2026-02-24 08:42:06', '2026-02-24 08:42:06'),
(14, 'Puskesmas Batu Aji Online', 'puskesmas-batu-aji-online-11', NULL, NULL, NULL, NULL, 'Puskesmas Batu Aji', NULL, NULL, NULL, 'Reza Pratama', NULL, NULL, 'healthcare', 'medium', 'WordPress + Elementor', 'Strapi', 'DigitalOcean', NULL, NULL, NULL, NULL, '[{\"name\":\"Reza Pratama\",\"role\":\"Project Manager\",\"email\":\"reza.pratama@company.local\"},{\"name\":\"Ahmad Fauzi\",\"role\":\"Frontend Developer\",\"email\":\"ahmad.fauzi@company.local\",\"phone\":\"081224280515\"},{\"name\":\"Joko Widodo\",\"role\":\"Backend Developer\",\"email\":\"joko.widodo@company.local\",\"phone\":\"081227165897\"}]', NULL, NULL, '2025-12-28', '2026-06-29', NULL, 131, 'in_progress', 0, 1, NULL, NULL, NULL, NULL, 1, '2026-02-24 08:31:51', '2026-02-24 08:41:57', '2026-02-24 08:41:57'),
(15, 'Kecamatan Sekupang Digital', 'kecamatan-sekupang-digital-12', NULL, NULL, NULL, NULL, 'Kec. Sekupang', NULL, NULL, NULL, 'Nina Kusuma', NULL, NULL, 'government', 'medium', 'Nuxt 3 + Laravel API', 'Filament CMS', 'IDCloudHost', NULL, NULL, NULL, NULL, '[{\"name\":\"Nina Kusuma\",\"role\":\"Project Manager\",\"email\":\"nina.kusuma@company.local\"},{\"name\":\"Rina Sari\",\"role\":\"Frontend Developer\",\"email\":\"rina.sari@company.local\",\"phone\":\"081271991030\"},{\"name\":\"Dedi Kurniawan\",\"role\":\"Backend Developer\",\"email\":\"dedi.kurniawan@company.local\",\"phone\":\"081270338958\"}]', NULL, NULL, '2026-02-06', '2026-08-10', NULL, 131, 'planning', 0, 1, NULL, NULL, NULL, NULL, 1, '2026-02-24 08:31:51', '2026-02-24 08:41:57', '2026-02-24 08:41:57'),
(16, 'Apotek Mulia Farma', 'apotek-mulia-farma-13', NULL, NULL, NULL, NULL, 'Apotek Mulia', NULL, NULL, NULL, 'Agus Wibowo', NULL, NULL, 'ecommerce', 'low', 'Laravel 11 + Next.js 14', 'WordPress', 'IDCloudHost', NULL, NULL, NULL, NULL, '[{\"name\":\"Agus Wibowo\",\"role\":\"Project Manager\",\"email\":\"agus.wibowo@company.local\"},{\"name\":\"Nurul Huda\",\"role\":\"Frontend Developer\",\"email\":\"nurul.huda@company.local\",\"phone\":\"081232388334\"},{\"name\":\"Siti Aminah\",\"role\":\"Backend Developer\",\"email\":\"siti.aminah@company.local\",\"phone\":\"081267635263\"},{\"name\":\"Joko Widodo\",\"role\":\"UI\\/UX Designer\",\"email\":\"joko.widodo@company.local\",\"phone\":\"081283234096\"}]', NULL, NULL, '2026-02-19', '2026-08-21', NULL, 131, 'draft', 0, 1, NULL, NULL, NULL, NULL, 1, '2026-02-24 08:31:51', '2026-02-24 08:42:06', '2026-02-24 08:42:06'),
(17, 'SDN 001 Batam Kota', 'sdn-001-batam-kota-14', NULL, NULL, NULL, NULL, 'SDN 001 Batam', NULL, NULL, NULL, 'Dian Rahayu', NULL, NULL, 'education', 'low', 'Nuxt 3 + Laravel API', 'Filament CMS', 'Biznet', NULL, NULL, NULL, NULL, '[{\"name\":\"Dian Rahayu\",\"role\":\"Project Manager\",\"email\":\"dian.rahayu@company.local\"},{\"name\":\"Dedi Kurniawan\",\"role\":\"Frontend Developer\",\"email\":\"dedi.kurniawan@company.local\",\"phone\":\"081253895027\"},{\"name\":\"Ahmad Fauzi\",\"role\":\"Backend Developer\",\"email\":\"ahmad.fauzi@company.local\",\"phone\":\"081240098631\"},{\"name\":\"Siti Aminah\",\"role\":\"UI\\/UX Designer\",\"email\":\"siti.aminah@company.local\",\"phone\":\"081260150689\"},{\"name\":\"Maya Putri\",\"role\":\"QA Tester\",\"email\":\"maya.putri@company.local\",\"phone\":\"081246173733\"}]', NULL, NULL, '2025-10-02', '2026-04-03', '2026-04-09', 131, 'completed', 0, 1, NULL, NULL, NULL, NULL, 1, '2026-02-24 08:31:51', '2026-02-24 08:42:06', '2026-02-24 08:42:06'),
(18, 'BPJS Ketenagakerjaan Batam', 'bpjs-ketenagakerjaan-batam-15', NULL, NULL, NULL, NULL, 'BPJS TK Batam', NULL, NULL, NULL, 'Hendra Setiawan', NULL, NULL, 'government', 'critical', 'Nuxt 3 + Laravel API', 'Strapi', 'DigitalOcean', NULL, NULL, NULL, NULL, '[{\"name\":\"Hendra Setiawan\",\"role\":\"Project Manager\",\"email\":\"hendra.setiawan@company.local\"},{\"name\":\"Nurul Huda\",\"role\":\"Frontend Developer\",\"email\":\"nurul.huda@company.local\",\"phone\":\"081243985503\"},{\"name\":\"Bayu Aji\",\"role\":\"Backend Developer\",\"email\":\"bayu.aji@company.local\",\"phone\":\"081233308649\"}]', NULL, NULL, '2025-12-08', '2026-06-09', NULL, 131, 'in_progress', 0, 1, NULL, NULL, NULL, NULL, 1, '2026-02-24 08:31:51', '2026-02-24 08:41:42', '2026-02-24 08:41:42'),
(19, 'Hotel Harris Batam Center', 'hotel-harris-batam-center-16', NULL, NULL, NULL, NULL, 'Hotel Harris Group', NULL, NULL, NULL, 'Lina Putri', NULL, NULL, 'company_profile', 'medium', 'Laravel 11 + Vue 3', 'Filament CMS', 'DigitalOcean', NULL, NULL, NULL, NULL, '[{\"name\":\"Lina Putri\",\"role\":\"Project Manager\",\"email\":\"lina.putri@company.local\"},{\"name\":\"Maya Putri\",\"role\":\"Frontend Developer\",\"email\":\"maya.putri@company.local\",\"phone\":\"081213825860\"},{\"name\":\"Dedi Kurniawan\",\"role\":\"Backend Developer\",\"email\":\"dedi.kurniawan@company.local\",\"phone\":\"081278027591\"}]', NULL, NULL, '2025-11-01', '2026-05-04', NULL, 131, 'review', 0, 1, NULL, NULL, NULL, NULL, 1, '2026-02-24 08:31:52', '2026-02-24 08:41:57', '2026-02-24 08:41:57'),
(20, 'Galangan Kapal Bintang Laut', 'galangan-kapal-bintang-laut-17', NULL, NULL, NULL, NULL, 'PT Bintang Laut', NULL, NULL, NULL, 'Budi Santoso', NULL, NULL, 'company_profile', 'medium', 'Laravel 11 + Next.js 14', 'WordPress', 'AWS EC2', NULL, NULL, NULL, NULL, '[{\"name\":\"Budi Santoso\",\"role\":\"Project Manager\",\"email\":\"budi.santoso@company.local\"},{\"name\":\"Nurul Huda\",\"role\":\"Frontend Developer\",\"email\":\"nurul.huda@company.local\",\"phone\":\"081243110672\"},{\"name\":\"Siti Aminah\",\"role\":\"Backend Developer\",\"email\":\"siti.aminah@company.local\",\"phone\":\"081276354487\"}]', NULL, NULL, '2026-01-05', '2026-07-07', NULL, 131, 'in_progress', 0, 1, NULL, NULL, NULL, NULL, 1, '2026-02-24 08:31:52', '2026-02-24 08:41:57', '2026-02-24 08:41:57'),
(21, 'Kepri City Mall Portal', 'kepri-city-mall-portal-18', NULL, NULL, NULL, NULL, 'Kepri City Mall', NULL, NULL, NULL, 'Sari Dewi', NULL, NULL, 'webapp', 'high', 'Laravel 11 + Next.js 14', 'Strapi', 'Niagahoster', NULL, NULL, NULL, NULL, '[{\"name\":\"Sari Dewi\",\"role\":\"Project Manager\",\"email\":\"sari.dewi@company.local\"},{\"name\":\"Rina Sari\",\"role\":\"Frontend Developer\",\"email\":\"rina.sari@company.local\",\"phone\":\"081281800526\"},{\"name\":\"Maya Putri\",\"role\":\"Backend Developer\",\"email\":\"maya.putri@company.local\",\"phone\":\"081238419301\"}]', NULL, NULL, '2025-12-21', '2026-06-22', NULL, 131, 'in_progress', 0, 1, NULL, NULL, NULL, NULL, 1, '2026-02-24 08:31:52', '2026-02-24 08:41:42', '2026-02-24 08:41:42'),
(22, 'Dinas Kesehatan Kepri', 'dinas-kesehatan-kepri-19', NULL, NULL, NULL, NULL, 'Dinkes Prov. Kepri', NULL, NULL, NULL, 'Reza Pratama', NULL, NULL, 'government', 'high', 'Laravel 11 + Vue 3', 'Filament CMS', 'IDCloudHost', NULL, NULL, NULL, NULL, '[{\"name\":\"Reza Pratama\",\"role\":\"Project Manager\",\"email\":\"reza.pratama@company.local\"},{\"name\":\"Siti Aminah\",\"role\":\"Frontend Developer\",\"email\":\"siti.aminah@company.local\",\"phone\":\"081212576806\"},{\"name\":\"Maya Putri\",\"role\":\"Backend Developer\",\"email\":\"maya.putri@company.local\",\"phone\":\"081221080099\"},{\"name\":\"Dedi Kurniawan\",\"role\":\"UI\\/UX Designer\",\"email\":\"dedi.kurniawan@company.local\",\"phone\":\"081299313098\"},{\"name\":\"Ahmad Fauzi\",\"role\":\"QA Tester\",\"email\":\"ahmad.fauzi@company.local\",\"phone\":\"081297871986\"}]', NULL, NULL, '2026-01-11', '2026-07-13', NULL, 131, 'in_progress', 0, 1, NULL, NULL, NULL, NULL, 1, '2026-02-24 08:31:52', '2026-02-24 08:41:42', '2026-02-24 08:41:42'),
(23, 'SMKN 3 Batam Sekolah', 'smkn-3-batam-sekolah-20', NULL, NULL, NULL, NULL, 'SMKN 3 Batam', NULL, NULL, NULL, 'Nina Kusuma', NULL, NULL, 'education', 'low', 'Laravel 11 + Next.js 14', 'Strapi', 'DigitalOcean', NULL, NULL, NULL, NULL, '[{\"name\":\"Nina Kusuma\",\"role\":\"Project Manager\",\"email\":\"nina.kusuma@company.local\"},{\"name\":\"Ahmad Fauzi\",\"role\":\"Frontend Developer\",\"email\":\"ahmad.fauzi@company.local\",\"phone\":\"081239385179\"},{\"name\":\"Nurul Huda\",\"role\":\"Backend Developer\",\"email\":\"nurul.huda@company.local\",\"phone\":\"081241425513\"}]', NULL, NULL, '2026-02-12', '2026-08-14', NULL, 131, 'planning', 0, 1, NULL, NULL, NULL, NULL, 1, '2026-02-24 08:31:52', '2026-02-24 08:42:06', '2026-02-24 08:42:06'),
(24, 'Pelabuhan Roro Telaga Punggur', 'pelabuhan-roro-telaga-punggur-21', NULL, NULL, NULL, NULL, 'PT Punggur Jaya', NULL, NULL, NULL, 'Agus Wibowo', NULL, NULL, 'company_profile', 'medium', 'Laravel 11 + Vue 3', 'Filament CMS', 'DigitalOcean', NULL, NULL, NULL, NULL, '[{\"name\":\"Agus Wibowo\",\"role\":\"Project Manager\",\"email\":\"agus.wibowo@company.local\"},{\"name\":\"Nurul Huda\",\"role\":\"Frontend Developer\",\"email\":\"nurul.huda@company.local\",\"phone\":\"081232489206\"},{\"name\":\"Dedi Kurniawan\",\"role\":\"Backend Developer\",\"email\":\"dedi.kurniawan@company.local\",\"phone\":\"081289483129\"},{\"name\":\"Ahmad Fauzi\",\"role\":\"UI\\/UX Designer\",\"email\":\"ahmad.fauzi@company.local\",\"phone\":\"081213091802\"},{\"name\":\"Bayu Aji\",\"role\":\"QA Tester\",\"email\":\"bayu.aji@company.local\",\"phone\":\"081221647548\"}]', NULL, NULL, '2025-09-12', '2026-03-16', '2026-03-20', 131, 'completed', 0, 1, NULL, NULL, NULL, NULL, 1, '2026-02-24 08:31:52', '2026-02-24 08:41:57', '2026-02-24 08:41:57'),
(25, 'Koperasi Nelayan Tanjung Balai', 'koperasi-nelayan-tanjung-balai-22', NULL, NULL, NULL, NULL, 'KopNel Tanjung Balai', NULL, NULL, NULL, 'Dian Rahayu', NULL, NULL, 'company_profile', 'low', 'WordPress + Elementor', 'WordPress', 'Biznet', NULL, NULL, NULL, NULL, '[{\"name\":\"Dian Rahayu\",\"role\":\"Project Manager\",\"email\":\"dian.rahayu@company.local\"},{\"name\":\"Rina Sari\",\"role\":\"Frontend Developer\",\"email\":\"rina.sari@company.local\",\"phone\":\"081297325484\"},{\"name\":\"Maya Putri\",\"role\":\"Backend Developer\",\"email\":\"maya.putri@company.local\",\"phone\":\"081252557696\"}]', NULL, NULL, '2026-01-17', '2026-07-20', NULL, 131, 'in_progress', 0, 1, NULL, NULL, NULL, NULL, 1, '2026-02-24 08:31:52', '2026-02-24 08:42:06', '2026-02-24 08:42:06'),
(26, 'Pengadilan Negeri Batam', 'pengadilan-negeri-batam-23', NULL, NULL, NULL, NULL, 'PN Batam', NULL, NULL, NULL, 'Hendra Setiawan', NULL, NULL, 'government', 'high', 'Nuxt 3 + Laravel API', 'Strapi', 'Niagahoster', NULL, NULL, NULL, NULL, '[{\"name\":\"Hendra Setiawan\",\"role\":\"Project Manager\",\"email\":\"hendra.setiawan@company.local\"},{\"name\":\"Siti Aminah\",\"role\":\"Frontend Developer\",\"email\":\"siti.aminah@company.local\",\"phone\":\"081275778848\"},{\"name\":\"Rina Sari\",\"role\":\"Backend Developer\",\"email\":\"rina.sari@company.local\",\"phone\":\"081267051989\"},{\"name\":\"Dedi Kurniawan\",\"role\":\"UI\\/UX Designer\",\"email\":\"dedi.kurniawan@company.local\",\"phone\":\"081241400663\"}]', NULL, NULL, '2025-10-15', '2026-04-16', NULL, 131, 'review', 0, 1, NULL, NULL, NULL, NULL, 1, '2026-02-24 08:31:52', '2026-02-24 08:41:57', '2026-02-24 08:41:57'),
(27, 'Batam Fashion Outlet', 'batam-fashion-outlet-24', NULL, NULL, NULL, NULL, 'CV Batam Fashion', NULL, NULL, NULL, 'Lina Putri', NULL, NULL, 'ecommerce', 'medium', 'Laravel 11 + Next.js 14', 'Filament CMS', 'Biznet', NULL, NULL, NULL, NULL, '[{\"name\":\"Lina Putri\",\"role\":\"Project Manager\",\"email\":\"lina.putri@company.local\"},{\"name\":\"Siti Aminah\",\"role\":\"Frontend Developer\",\"email\":\"siti.aminah@company.local\",\"phone\":\"081217538841\"},{\"name\":\"Bayu Aji\",\"role\":\"Backend Developer\",\"email\":\"bayu.aji@company.local\",\"phone\":\"081297995064\"},{\"name\":\"Rina Sari\",\"role\":\"UI\\/UX Designer\",\"email\":\"rina.sari@company.local\",\"phone\":\"081298844618\"},{\"name\":\"Maya Putri\",\"role\":\"QA Tester\",\"email\":\"maya.putri@company.local\",\"phone\":\"081220839325\"}]', NULL, NULL, '2025-12-31', '2026-07-02', NULL, 131, 'in_progress', 0, 1, NULL, NULL, NULL, NULL, 1, '2026-02-24 08:31:52', '2026-02-24 08:41:57', '2026-02-24 08:41:57'),
(28, 'PLN UIW Riau Kepulauan', 'pln-uiw-riau-kepulauan-25', NULL, NULL, NULL, NULL, 'PLN Kepri', NULL, NULL, NULL, 'Budi Santoso', NULL, NULL, 'company_profile', 'critical', 'WordPress + Elementor', 'Custom', 'AWS EC2', NULL, NULL, NULL, NULL, '[{\"name\":\"Budi Santoso\",\"role\":\"Project Manager\",\"email\":\"budi.santoso@company.local\"},{\"name\":\"Rina Sari\",\"role\":\"Frontend Developer\",\"email\":\"rina.sari@company.local\",\"phone\":\"081274750269\"},{\"name\":\"Ahmad Fauzi\",\"role\":\"Backend Developer\",\"email\":\"ahmad.fauzi@company.local\",\"phone\":\"081294073400\"},{\"name\":\"Joko Widodo\",\"role\":\"UI\\/UX Designer\",\"email\":\"joko.widodo@company.local\",\"phone\":\"081259995932\"}]', NULL, NULL, '2025-11-28', '2026-06-01', NULL, 131, 'in_progress', 0, 1, NULL, NULL, NULL, NULL, 1, '2026-02-24 08:31:52', '2026-02-24 08:41:42', '2026-02-24 08:41:42'),
(29, 'Dishub Tanjungpinang', 'dishub-tanjungpinang-26', NULL, NULL, NULL, NULL, 'Dishub Tanjungpinang', NULL, NULL, NULL, 'Sari Dewi', NULL, NULL, 'government', 'medium', 'Nuxt 3 + Laravel API', 'Filament CMS', 'IDCloudHost', NULL, NULL, NULL, NULL, '[{\"name\":\"Sari Dewi\",\"role\":\"Project Manager\",\"email\":\"sari.dewi@company.local\"},{\"name\":\"Maya Putri\",\"role\":\"Frontend Developer\",\"email\":\"maya.putri@company.local\",\"phone\":\"081290903922\"},{\"name\":\"Joko Widodo\",\"role\":\"Backend Developer\",\"email\":\"joko.widodo@company.local\",\"phone\":\"081287572359\"},{\"name\":\"Siti Aminah\",\"role\":\"UI\\/UX Designer\",\"email\":\"siti.aminah@company.local\",\"phone\":\"081211111912\"}]', NULL, NULL, '2026-02-16', '2026-08-18', NULL, 131, 'planning', 0, 1, NULL, NULL, NULL, NULL, 1, '2026-02-24 08:31:52', '2026-02-24 08:42:06', '2026-02-24 08:42:06'),
(30, 'Klinik Dokter Gigi Sehat', 'klinik-dokter-gigi-sehat-27', NULL, NULL, NULL, NULL, 'Klinik dr. Sehat', NULL, NULL, NULL, 'Reza Pratama', NULL, NULL, 'landing_page', 'low', 'Laravel 11 + Next.js 14', 'WordPress', 'IDCloudHost', NULL, NULL, NULL, NULL, '[{\"name\":\"Reza Pratama\",\"role\":\"Project Manager\",\"email\":\"reza.pratama@company.local\"},{\"name\":\"Maya Putri\",\"role\":\"Frontend Developer\",\"email\":\"maya.putri@company.local\",\"phone\":\"081257908805\"},{\"name\":\"Siti Aminah\",\"role\":\"Backend Developer\",\"email\":\"siti.aminah@company.local\",\"phone\":\"081233993419\"},{\"name\":\"Joko Widodo\",\"role\":\"UI\\/UX Designer\",\"email\":\"joko.widodo@company.local\",\"phone\":\"081223631798\"},{\"name\":\"Dedi Kurniawan\",\"role\":\"QA Tester\",\"email\":\"dedi.kurniawan@company.local\",\"phone\":\"081243223937\"}]', NULL, NULL, '2025-08-23', '2026-02-23', '2026-02-22', 131, 'completed', 0, 1, NULL, NULL, NULL, NULL, 1, '2026-02-24 08:31:53', '2026-02-24 08:42:06', '2026-02-24 08:42:06'),
(31, 'Batam Pos Digital Media', 'batam-pos-digital-media-28', NULL, NULL, NULL, NULL, 'PT Batam Pos', NULL, NULL, NULL, 'Nina Kusuma', NULL, NULL, 'portal', 'high', 'Laravel 11 + Next.js 14', 'WordPress', 'DigitalOcean', NULL, NULL, NULL, NULL, '[{\"name\":\"Nina Kusuma\",\"role\":\"Project Manager\",\"email\":\"nina.kusuma@company.local\"},{\"name\":\"Ahmad Fauzi\",\"role\":\"Frontend Developer\",\"email\":\"ahmad.fauzi@company.local\",\"phone\":\"081225292044\"},{\"name\":\"Dedi Kurniawan\",\"role\":\"Backend Developer\",\"email\":\"dedi.kurniawan@company.local\",\"phone\":\"081244510485\"}]', NULL, NULL, '2025-12-11', '2026-06-12', NULL, 131, 'in_progress', 0, 1, NULL, NULL, NULL, NULL, 1, '2026-02-24 08:31:53', '2026-02-24 08:41:57', '2026-02-24 08:41:57'),
(32, 'BPS Kepri Statistik', 'bps-kepri-statistik-29', NULL, NULL, NULL, NULL, 'BPS Prov. Kepri', NULL, NULL, NULL, 'Agus Wibowo', NULL, NULL, 'government', 'medium', 'Nuxt 3 + Laravel API', 'WordPress', 'IDCloudHost', NULL, NULL, NULL, NULL, '[{\"name\":\"Agus Wibowo\",\"role\":\"Project Manager\",\"email\":\"agus.wibowo@company.local\"},{\"name\":\"Siti Aminah\",\"role\":\"Frontend Developer\",\"email\":\"siti.aminah@company.local\",\"phone\":\"081230222326\"},{\"name\":\"Bayu Aji\",\"role\":\"Backend Developer\",\"email\":\"bayu.aji@company.local\",\"phone\":\"081230753924\"},{\"name\":\"Rina Sari\",\"role\":\"UI\\/UX Designer\",\"email\":\"rina.sari@company.local\",\"phone\":\"081243848400\"}]', NULL, NULL, '2025-12-26', '2026-06-29', NULL, 131, 'in_progress', 0, 1, NULL, NULL, NULL, NULL, 1, '2026-02-24 08:31:53', '2026-02-24 08:42:06', '2026-02-24 08:42:06'),
(33, 'Wisata Kuliner Tanjungpinang', 'wisata-kuliner-tanjungpinang-30', NULL, NULL, NULL, NULL, 'Dispar Tanjungpinang', NULL, NULL, NULL, 'Dian Rahayu', NULL, NULL, 'portal', 'low', 'Nuxt 3 + Laravel API', 'WordPress', 'Niagahoster', NULL, NULL, NULL, NULL, '[{\"name\":\"Dian Rahayu\",\"role\":\"Project Manager\",\"email\":\"dian.rahayu@company.local\"},{\"name\":\"Siti Aminah\",\"role\":\"Frontend Developer\",\"email\":\"siti.aminah@company.local\",\"phone\":\"081250326704\"},{\"name\":\"Joko Widodo\",\"role\":\"Backend Developer\",\"email\":\"joko.widodo@company.local\",\"phone\":\"081266662510\"},{\"name\":\"Dedi Kurniawan\",\"role\":\"UI\\/UX Designer\",\"email\":\"dedi.kurniawan@company.local\",\"phone\":\"081210088128\"}]', NULL, NULL, '2026-02-21', '2026-08-24', NULL, 131, 'draft', 0, 1, NULL, NULL, NULL, NULL, 1, '2026-02-24 08:31:53', '2026-02-24 08:42:06', '2026-02-24 08:42:06'),
(34, 'Website DPMPTSP Prov.Babel', 'website-dpmptsp-provbabel', 'https://dpmptsp.babelprov.go.id', 'https://dev-dpmptsp.babelprov.go.id', '-', NULL, 'Dinas PTSP Prov. Babel', NULL, NULL, NULL, 'Remi', NULL, NULL, 'government', 'medium', 'Laravel', 'Filament', 'Local', NULL, NULL, NULL, '[]', '[{\"name\":\"Dahrul\",\"role\":\"Project Manager\",\"email\":\"dahrul.ulum@gmail.com\",\"phone\":\"081322242492\"},{\"name\":\"Afgan\",\"role\":\"Frontend Developer\",\"email\":\"afgan@gmail.com\",\"phone\":null},{\"name\":\"Hilal\",\"role\":\"Backend Developer\",\"email\":\"hilal@gmail.com\",\"phone\":null}]', '2026-02-23', '2026-03-03', '2026-02-24', '2026-03-03', '2026-03-03', 7, 'in_progress', 24, 1, NULL, NULL, NULL, NULL, 1, '2026-02-24 08:44:35', '2026-02-28 09:02:07', NULL),
(35, 'Website Inspektorat Daerah Prov.Babel', 'website-inspektorat-daerah-provbabel', NULL, NULL, NULL, NULL, 'Inspektorat Daerah Provinsi Kepulauan Bangka Belitung', NULL, NULL, NULL, 'Belum Menyampaikan PIC ', NULL, NULL, 'government', 'medium', 'Laravel', NULL, NULL, NULL, NULL, NULL, '[]', '[{\"name\":\"Dahrul Ulum Burhanuddin\",\"role\":\"Fullstack Developer\",\"email\":null,\"phone\":null}]', NULL, NULL, NULL, NULL, NULL, NULL, 'planning', 0, 1, NULL, NULL, NULL, NULL, 1, '2026-02-25 18:22:25', '2026-02-25 18:24:19', NULL),
(36, 'Website Dinas Pendidikan Prov.Babel', 'website-dinas-pendidikan-provbabel', NULL, NULL, NULL, NULL, 'Dinas Pendidikan Provinsi Kepulauan Bangka Belitung ', NULL, NULL, NULL, 'Asmanu, S.Kom ', NULL, NULL, 'government', 'medium', NULL, NULL, NULL, NULL, NULL, NULL, '[]', '[{\"name\":\"Dahrul Ulum Burhanuddin\",\"role\":\"Fullstack Developer\",\"email\":null,\"phone\":null}]', NULL, NULL, NULL, NULL, NULL, NULL, 'planning', 0, 1, NULL, NULL, NULL, NULL, 1, '2026-02-25 18:27:23', '2026-02-25 19:31:20', NULL),
(37, 'Website Dinas Kesehatan Prov.Babel', 'website-dinas-kesehatan-provbabel', NULL, NULL, NULL, NULL, 'Dinas Kesehatan Provinsi Kepulauan Bangka Belitung ', NULL, NULL, NULL, 'M. Novriza Fahlevi ', NULL, NULL, 'government', 'medium', NULL, NULL, NULL, NULL, NULL, NULL, '[]', '[{\"name\":\"Dahrul Ulum Burhanuddin\",\"role\":\"Fullstack Developer\",\"email\":null,\"phone\":null}]', NULL, NULL, NULL, NULL, NULL, NULL, 'planning', 0, 1, NULL, NULL, NULL, NULL, 1, '2026-02-25 18:29:52', '2026-02-25 19:30:56', NULL),
(38, 'Website Dinas Sosial dan Pemberdayaan Masyarakat Desa Prov.Babel', 'website-dinas-sosial-dan-pemberdayaan-masyarakat-desa-provbabel', NULL, NULL, NULL, NULL, ' Dinas Sosial dan Pemberdayaan Masyarakat Desa Provinsi Kep. Bangka Belitung ', NULL, NULL, NULL, 'Muhamad Zarkoli, S.T ', NULL, NULL, 'government', 'medium', NULL, NULL, NULL, NULL, NULL, NULL, '[]', '[{\"name\":\"Dahrul Ulum Burhanuddin\",\"role\":\"Fullstack Developer\",\"email\":null,\"phone\":null}]', NULL, NULL, NULL, NULL, NULL, NULL, 'planning', 0, 1, NULL, NULL, NULL, NULL, 1, '2026-02-25 18:31:34', '2026-02-25 19:30:26', NULL),
(39, 'Website Dinas Pekerjaan Umum Penataan Ruang, Perumahan Rakyat dan Kawasan Permukiman Prov.Babel', 'website-dinas-pekerjaan-umum-penataan-ruang-perumahan-rakyat-dan-kawasan-permukiman-provbabel', NULL, NULL, NULL, NULL, ' Dinas Pekerjaan Umum Penataan  Ruang, Perumahan Rakyat dan Kawasan Permukiman Provinsi Kepulauan Bangka Belitung ', NULL, NULL, NULL, 'Belum Menyampaikan PIC', NULL, NULL, 'government', 'medium', NULL, NULL, NULL, NULL, NULL, NULL, '[]', '[{\"name\":\"Dahrul Ulum Burhanuddin\",\"role\":\"Fullstack Developer\",\"email\":null,\"phone\":null}]', NULL, NULL, NULL, NULL, NULL, NULL, 'planning', 0, 1, NULL, NULL, NULL, NULL, 1, '2026-02-25 18:33:24', '2026-02-25 19:30:00', NULL),
(40, ' Website Satuan Polisi Pamong Praja Prov.Babel', 'website-satuan-polisi-pamong-praja-provbabel', NULL, NULL, NULL, NULL, ' Satuan Polisi Pamong Praja Provinsi Kepulauan Bangka elitung ', NULL, NULL, NULL, 'Eddy Wittanto, S.Kom', NULL, NULL, 'government', 'medium', NULL, NULL, NULL, NULL, NULL, NULL, '[]', '[{\"name\":\"Dahrul Ulum Burhanuddin\",\"role\":\"Fullstack Developer\",\"email\":null,\"phone\":null}]', NULL, NULL, NULL, NULL, NULL, NULL, 'planning', 0, 1, NULL, NULL, NULL, NULL, 1, '2026-02-25 18:34:42', '2026-02-25 19:29:37', NULL),
(41, ' Website Dinas Energi dan Sumber Daya Mineral Prov.Babel', 'website-dinas-energi-dan-sumber-daya-mineral-provbabel', NULL, NULL, NULL, NULL, 'Dinas Energi dan Sumber Daya Mineral Provinsi Kepulauan Bangka Belitung', NULL, NULL, NULL, 'Dessy Pratiwi Putri, S.Kom', NULL, NULL, 'government', 'medium', NULL, NULL, NULL, NULL, NULL, NULL, '[]', '[{\"name\":\"Dahrul Ulum Burhanuddin\",\"role\":\"Fullstack Developer\",\"email\":null,\"phone\":null}]', NULL, NULL, NULL, NULL, NULL, NULL, 'planning', 0, 1, NULL, NULL, NULL, NULL, 1, '2026-02-25 18:36:15', '2026-02-25 19:29:09', NULL),
(42, 'Website Dinas Pariwisata, Kebudayaan dan Kepemudaan Olahraga Prov.Babel', 'website-dinas-pariwisata-kebudayaan-dan-kepemudaan-olahraga-provbabel', NULL, NULL, NULL, NULL, 'Dinas Pariwisata, Kebudayaan dan Kepemudaan Olahraga Provinsi Kepulauan Bangka Belitung', NULL, NULL, NULL, 'Khalimo Tabarani Eddy,  S.Sn ', NULL, NULL, 'government', 'medium', NULL, NULL, NULL, NULL, NULL, NULL, '[]', '[{\"name\":\"Dahrul Ulum Burhanuddin\",\"role\":\"Fullstack Developer\",\"email\":null,\"phone\":null}]', NULL, NULL, NULL, NULL, NULL, NULL, 'planning', 0, 1, NULL, NULL, NULL, NULL, 1, '2026-02-25 18:38:08', '2026-02-25 19:28:48', NULL),
(43, 'Website Dinas Perhubungan Prov.Babel', 'website-dinas-perhubungan-provbabel', NULL, NULL, NULL, NULL, 'Dinas Perhubungan Provinsi Kepulauan Bangka Belitung ', NULL, NULL, NULL, 'Belum Menyampaikan PIC ', NULL, NULL, 'government', 'medium', NULL, NULL, NULL, NULL, NULL, NULL, '[]', '[{\"name\":\"Dahrul Ulum Burhanuddin\",\"role\":\"Fullstack Developer\",\"email\":null,\"phone\":null}]', NULL, NULL, NULL, NULL, NULL, NULL, 'planning', 0, 1, NULL, NULL, NULL, NULL, 1, '2026-02-25 18:40:39', '2026-02-25 19:28:26', NULL),
(44, 'Website Dewan Perwakilan Rakyat Daerah (DPRD) Prov.Babel ', 'website-dewan-perwakilan-rakyat-daerah-dprd-provbabel', NULL, NULL, NULL, NULL, 'Dewan Perwakilan Rakyat Daerah (DPRD) Provinsi Kep. Bangka Belitung ', NULL, NULL, NULL, 'Belum Menyampaikan PIC ', NULL, NULL, 'government', 'medium', NULL, NULL, NULL, NULL, NULL, NULL, '[]', '[{\"name\":\"Dahrul Ulum Burhanuddin\",\"role\":\"Fullstack Developer\",\"email\":null,\"phone\":null}]', NULL, NULL, NULL, NULL, NULL, NULL, 'planning', 0, 1, NULL, NULL, NULL, NULL, 1, '2026-02-25 18:41:54', '2026-02-25 19:28:04', NULL),
(45, 'Website Dinas Penanaman Modal dan Pelayanan Terpadu Satu Pintu Prov.Babel ', 'website-dinas-penanaman-modal-dan-pelayanan-terpadu-satu-pintu-provbabel', NULL, NULL, NULL, NULL, 'Dinas Penanaman Modal dan Pelayanan Terpadu Satu Pintu Provinsi Kepulauan Bangka Belitung ', NULL, NULL, NULL, 'Heru Hardiansyah, S.Kom', NULL, NULL, 'government', 'medium', NULL, NULL, NULL, NULL, NULL, NULL, '[]', '[{\"name\":\"Dahrul Ulum Burhanuddin\",\"role\":\"Fullstack Developer\",\"email\":null,\"phone\":null}]', NULL, NULL, NULL, NULL, NULL, NULL, 'planning', 0, 1, NULL, NULL, NULL, NULL, 1, '2026-02-25 18:43:06', '2026-02-25 19:27:43', NULL),
(46, 'Website Dinas Tenaga Kerja Prov.Babel', 'website-dinas-tenaga-kerja-provbabel', NULL, NULL, NULL, NULL, 'Dinas Tenaga Kerja Provinsi Kepulauan Bangka Belitung', NULL, NULL, NULL, 'Aprilino, S.Kom ', NULL, NULL, 'government', 'medium', NULL, NULL, NULL, NULL, NULL, NULL, '[]', '[{\"name\":\"Dahrul Ulum Burhanuddin\",\"role\":\"Fullstack Developer\",\"email\":null,\"phone\":null}]', NULL, NULL, NULL, NULL, NULL, NULL, 'planning', 0, 1, NULL, NULL, NULL, NULL, 1, '2026-02-25 18:44:13', '2026-02-25 19:27:19', NULL),
(47, 'Website Dinas Komunikasi dan Informatika Prov.Babel', 'website-dinas-komunikasi-dan-informatika-provbabel', NULL, NULL, NULL, NULL, 'Dinas Komunikasi dan Informatika Provinsi Kepulauan Bangka Belitung', NULL, NULL, NULL, 'Nurfajar Al Asyari, S.Kom ', NULL, NULL, 'government', 'medium', NULL, NULL, NULL, NULL, NULL, NULL, '[]', '[{\"name\":\"Nurfajar Al Asyari\",\"role\":\"Fullstack Developer\",\"email\":null,\"phone\":null}]', NULL, NULL, NULL, NULL, NULL, NULL, 'planning', 0, 1, NULL, NULL, NULL, NULL, 1, '2026-02-25 18:48:55', '2026-02-25 19:26:58', NULL),
(48, 'Website Dinas Koperasi, Usaha Kecil dan Menengah Prov.Babel ', 'website-dinas-koperasi-usaha-kecil-dan-menengah-provbabel', NULL, NULL, NULL, NULL, 'Dinas Koperasi, Usaha Kecil dan Menengah Provinsi Kepulauan Bangka Belitung ', NULL, NULL, NULL, 'Belum Menyampaikan PIC ', NULL, NULL, 'government', 'medium', NULL, NULL, NULL, NULL, NULL, NULL, '[]', '[{\"name\":\"Nurfajar Al Asyari\",\"role\":\"Fullstack Developer\",\"email\":null,\"phone\":null}]', NULL, NULL, NULL, NULL, NULL, NULL, 'planning', 0, 1, NULL, NULL, NULL, NULL, 1, '2026-02-25 18:50:56', '2026-02-25 19:26:36', NULL),
(49, 'Website Dinas Perindustrian dan Perdagangan Prov.Babel', 'website-dinas-perindustrian-dan-perdagangan-provbabel', NULL, NULL, NULL, NULL, 'Dinas Perindustrian dan Perdagangan Provinsi Kepulauan Bangka Belitung', NULL, NULL, NULL, 'Belum Menyampaikan PIC ', NULL, NULL, 'government', 'medium', NULL, NULL, NULL, NULL, NULL, NULL, '[]', '[{\"name\":\"Nurfajar Al Asyari\",\"role\":\"Fullstack Developer\",\"email\":null,\"phone\":null}]', NULL, NULL, NULL, NULL, NULL, NULL, 'planning', 0, 1, NULL, NULL, NULL, NULL, 1, '2026-02-25 18:52:22', '2026-02-25 19:26:14', NULL),
(50, 'Website Dinas Pertanian dan Ketahanan Pangan Prov.Babel', 'website-dinas-pertanian-dan-ketahanan-pangan-provbabel', NULL, NULL, NULL, NULL, 'Dinas Pertanian dan Ketahanan Pangan Provinsi Kepulauan Bangka Belitung ', NULL, NULL, NULL, 'Septian Surya Kencana, SE', NULL, NULL, 'government', 'medium', NULL, NULL, NULL, NULL, NULL, NULL, '[]', '[{\"name\":\"Nurfajar Al Asyari\",\"role\":\"Fullstack Developer\",\"email\":null,\"phone\":null}]', NULL, NULL, NULL, NULL, NULL, NULL, 'planning', 0, 1, NULL, NULL, NULL, NULL, 1, '2026-02-25 18:54:49', '2026-02-25 19:25:54', NULL),
(51, 'Website Dinas Pemberdayaan Perempuan, Perlindungan Anak, Kependudukan dan Pencatatan, Pengendalian Penduduk dan Keluarga Berencana Prov.Babel ', 'website-dinas-pemberdayaan-perempuan-perlindungan-anak-kependudukan-dan-pencatatan-pengendalian-penduduk-dan-keluarga-berencana-provbabel', NULL, NULL, NULL, NULL, 'Dinas Pemberdayaan Perempuan, Perlindungan Anak, Kependudukan dan Pencatatan, Pengendalian Penduduk dan Keluarga Berencana Provinsi Kepulauan Bangka Belitung ', NULL, NULL, NULL, 'Muhammad Fadholly, S.Kom ', NULL, NULL, 'government', 'medium', NULL, NULL, NULL, NULL, NULL, NULL, '[]', '[{\"name\":\"Nurfajar Al Asyari\",\"role\":\"Fullstack Developer\",\"email\":null,\"phone\":null}]', NULL, NULL, NULL, NULL, NULL, NULL, 'planning', 0, 1, NULL, NULL, NULL, NULL, 1, '2026-02-25 18:56:45', '2026-02-25 19:25:33', NULL),
(52, 'Website Dinas Kelautan dan Perikanan Prov.Babel', 'website-dinas-kelautan-dan-perikanan-provbabel', NULL, NULL, NULL, NULL, 'Dinas Kelautan dan Perikanan Provinsi Kepulauan Bangka Belitung ', NULL, NULL, NULL, 'Rustam Efendi, A.Md ', NULL, NULL, 'government', 'medium', NULL, NULL, NULL, NULL, NULL, NULL, '[]', '[{\"name\":\"Nurfajar Al Asyari\",\"role\":\"Fullstack Developer\",\"email\":null,\"phone\":null}]', NULL, NULL, NULL, NULL, NULL, NULL, 'planning', 0, 1, NULL, NULL, NULL, NULL, 1, '2026-02-25 18:58:08', '2026-02-25 19:25:13', NULL),
(53, 'Website Dinas Lingkungan Hidup dan Kehutanan Prov.Babel', 'website-dinas-lingkungan-hidup-dan-kehutanan-provbabel', NULL, NULL, NULL, NULL, 'Dinas Lingkungan Hidup dan Kehutanan Provinsi Kepulauan Bangka Belitung ', NULL, NULL, NULL, 'Epieta Noverika, S.Kom ', NULL, NULL, 'government', 'medium', NULL, NULL, NULL, NULL, NULL, NULL, '[]', '[{\"name\":\"Nurfajar Al Asyari\",\"role\":\"Fullstack Developer\",\"email\":null,\"phone\":null}]', NULL, NULL, NULL, NULL, NULL, NULL, 'planning', 0, 1, NULL, NULL, NULL, NULL, 1, '2026-02-25 18:59:35', '2026-02-25 19:24:46', NULL),
(54, 'Website Dinas Kearsipan dan Perpustakaan Prov.Babel ', 'website-dinas-kearsipan-dan-perpustakaan-provbabel', NULL, NULL, NULL, NULL, 'Dinas Kearsipan dan Perpustakaan Provinsi Kepulauan Bangka Belitung ', NULL, NULL, NULL, 'Belum Menyampaikan PIC ', NULL, NULL, 'government', 'medium', NULL, NULL, NULL, NULL, NULL, NULL, '[]', '[{\"name\":\"Nurfajar Al Asyari\",\"role\":\"Fullstack Developer\",\"email\":null,\"phone\":null}]', NULL, NULL, NULL, NULL, NULL, NULL, 'planning', 0, 1, NULL, NULL, NULL, NULL, 1, '2026-02-25 19:01:47', '2026-02-25 19:24:24', NULL),
(55, 'Website Badan Kepegawaian dan Pengembangan Sumber Daya Manusia Daerah Prov.Babel', 'website-badan-kepegawaian-dan-pengembangan-sumber-daya-manusia-daerah-provbabel', NULL, NULL, NULL, NULL, 'Badan Kepegawaian dan  Pengembangan Sumber Daya  Manusia Daerah Provinsi  Kepulauan Bangka Belitung ', NULL, NULL, NULL, 'Anton Hery, S.Kom ', NULL, NULL, 'government', 'medium', NULL, NULL, NULL, NULL, NULL, NULL, '[]', '[{\"name\":\"Nurfajar Al Asyari\",\"role\":\"Fullstack Developer\",\"email\":null,\"phone\":null}]', NULL, NULL, NULL, NULL, NULL, NULL, 'planning', 0, 1, NULL, NULL, NULL, NULL, 1, '2026-02-25 19:02:58', '2026-02-25 19:24:04', NULL),
(56, 'Website Badan Perencanaan  Pembangunan dan Penelitian  Pengembangan Daerah Prov.Babel', 'website-badan-perencanaan-pembangunan-dan-penelitian-pengembangan-daerah-provbabel', NULL, NULL, NULL, NULL, 'Badan Perencanaan  Pembangunan dan Penelitian  Pengembangan Daerah Provinsi  Kepulauan Bangka Belitung ', NULL, NULL, NULL, 'Aditya Hermawan, M.Kom ', NULL, NULL, 'government', 'medium', NULL, NULL, NULL, NULL, NULL, NULL, '[]', '[{\"name\":\"Nurfajar Al Asyari\",\"role\":\"Fullstack Developer\",\"email\":null,\"phone\":null}]', NULL, NULL, NULL, NULL, NULL, NULL, 'planning', 0, 1, NULL, NULL, NULL, NULL, 1, '2026-02-25 19:04:17', '2026-02-25 19:23:44', NULL),
(57, 'Website Badan Keuangan Daerah Prov.Babel', 'website-badan-keuangan-daerah-provbabel', NULL, NULL, NULL, NULL, 'Badan Keuangan Daerah Provinsi  Kepulauan Bangka Belitung ', NULL, NULL, NULL, 'Belum Menyampaikan  PIC ', NULL, NULL, 'government', 'medium', NULL, NULL, NULL, NULL, NULL, NULL, '[]', '[{\"name\":\"Nurfajar Al Asyari\",\"role\":\"Fullstack Developer\",\"email\":null,\"phone\":null}]', NULL, NULL, NULL, NULL, NULL, NULL, 'planning', 0, 1, NULL, NULL, NULL, NULL, 1, '2026-02-25 19:06:54', '2026-02-25 19:23:22', NULL),
(58, 'Website Badan Penanggulangan Bencana  Daerah Prov.Babel', 'website-badan-penanggulangan-bencana-daerah-provbabel', NULL, NULL, NULL, NULL, 'Badan Penanggulangan Bencana  Daerah Provinsi Kepulauan  Bangka Belitung ', NULL, NULL, NULL, 'Zaky Mubarak, S.IP', NULL, NULL, 'government', 'medium', NULL, NULL, NULL, NULL, NULL, NULL, '[]', '[{\"name\":\"Nurfajar Al Asyari\",\"role\":\"Fullstack Developer\",\"email\":null,\"phone\":null}]', NULL, NULL, NULL, NULL, NULL, NULL, 'planning', 0, 1, NULL, NULL, NULL, NULL, 1, '2026-02-25 19:07:53', '2026-02-25 19:23:00', NULL),
(59, 'Website Badan Penghubung Provinsi  Prov.Babel', 'website-badan-penghubung-provinsi-provbabel', NULL, NULL, NULL, NULL, 'Badan Penghubung Provinsi  Provinsi Kepulauan Bangka  Belitung ', NULL, NULL, NULL, 'Belum Menyampaikan  PIC ', NULL, NULL, 'government', 'medium', NULL, NULL, NULL, NULL, NULL, NULL, '[]', '[{\"name\":\"Rahmat Khodirsyah\",\"role\":\"Fullstack Developer\",\"email\":null,\"phone\":null}]', NULL, NULL, NULL, NULL, NULL, NULL, 'planning', 0, 1, NULL, NULL, NULL, NULL, 1, '2026-02-25 19:09:37', '2026-02-25 19:09:37', NULL),
(60, 'Website Badan Kesatuan Bangsa dan  Politik Prov.Babel', 'website-badan-kesatuan-bangsa-dan-politik-provbabel', NULL, NULL, NULL, NULL, 'Badan Kesatuan Bangsa dan  Politik Provinsi Kepulauan  Bangka Belitung ', NULL, NULL, NULL, 'Belum Menyampaikan  PIC ', NULL, NULL, 'government', 'medium', NULL, NULL, NULL, NULL, NULL, NULL, '[]', '[{\"name\":\"Rahmat Khodirsyah\",\"role\":\"Fullstack Developer\",\"email\":null,\"phone\":null}]', NULL, NULL, NULL, NULL, NULL, NULL, 'planning', 0, 1, NULL, NULL, NULL, NULL, 1, '2026-02-25 19:10:47', '2026-02-25 19:10:47', NULL),
(61, 'Website Biro Pemerintahan Setda Prov.Babel', 'website-biro-pemerintahan-setda-provbabel', NULL, NULL, NULL, NULL, 'Biro Pemerintahan Setda Provinsi  Kepulauan Bangka Belitung ', NULL, NULL, NULL, 'Tati Purningsyih, S.Kom ', NULL, NULL, 'government', 'medium', NULL, NULL, NULL, NULL, NULL, NULL, '[]', '[{\"name\":\"Rahmat Khodirsyah\",\"role\":\"Fullstack Developer\",\"email\":null,\"phone\":null}]', NULL, NULL, NULL, NULL, NULL, NULL, 'planning', 0, 1, NULL, NULL, NULL, NULL, 1, '2026-02-25 19:11:58', '2026-02-25 19:11:58', NULL),
(62, 'Website Biro Kesejahteraan Rakyat Setda  Prov.Babel', 'website-biro-kesejahteraan-rakyat-setda-provbabel', NULL, NULL, NULL, NULL, 'Biro Kesejahteraan Rakyat Setda  Provinsi Kepulauan Bangka  Belitung ', NULL, NULL, NULL, 'Aspianto ', NULL, NULL, 'government', 'medium', NULL, NULL, NULL, NULL, NULL, NULL, '[]', '[{\"name\":\"Rahmat Khodirsyah\",\"role\":\"Fullstack Developer\",\"email\":null,\"phone\":null}]', NULL, NULL, NULL, NULL, NULL, NULL, 'planning', 0, 1, NULL, NULL, NULL, NULL, 1, '2026-02-25 19:12:56', '2026-02-25 19:12:56', NULL),
(63, 'Website Biro Hukum Setda Prov.Babel', 'website-biro-hukum-setda-provbabel', NULL, NULL, NULL, NULL, 'Biro Hukum Setda Provinsi  Kepulauan Bangka Belitung ', NULL, NULL, NULL, 'Sidik Rahmadi, S.IP ', NULL, NULL, 'government', 'medium', NULL, NULL, NULL, NULL, NULL, NULL, '[]', '[{\"name\":\"Rahmat Khodirsyah\",\"role\":\"Fullstack Developer\",\"email\":null,\"phone\":null}]', NULL, NULL, NULL, NULL, NULL, NULL, 'planning', 0, 1, NULL, NULL, NULL, NULL, 1, '2026-02-25 19:14:02', '2026-02-25 19:14:02', NULL),
(64, 'Website Biro  Perekonomian  dan  Administrasi Pembangunan Setda  Prov.Babel', 'website-biro-perekonomian-dan-administrasi-pembangunan-setda-provbabel', NULL, NULL, NULL, NULL, 'Biro  Perekonomian  dan  Administrasi Pembangunan Setda  Provinsi  Kepulauan  Bangka  Belitung ', NULL, NULL, NULL, 'Belum Menyampaikan PIC ', NULL, NULL, 'government', 'medium', NULL, NULL, NULL, NULL, NULL, NULL, '[]', '[{\"name\":\"Rahmat Khodirsyah\",\"role\":\"Fullstack Developer\",\"email\":null,\"phone\":null}]', NULL, NULL, NULL, NULL, NULL, NULL, 'planning', 0, 1, NULL, NULL, NULL, NULL, 1, '2026-02-25 19:15:20', '2026-02-25 19:15:20', NULL),
(65, 'Website Biro Pengadaan Barang/Jasa  Setda Prov.Babel', 'website-biro-pengadaan-barangjasa-setda-provbabel', NULL, NULL, NULL, NULL, 'Biro Pengadaan Barang/Jasa  Setda Provinsi Kepulauan  Bangka Belitung ', NULL, NULL, NULL, 'Belum Menyampaikan  PIC', NULL, NULL, 'government', 'medium', NULL, NULL, NULL, NULL, NULL, NULL, '[]', '[{\"name\":\"Rahmat Khodirsyah\",\"role\":\"Fullstack Developer\",\"email\":null,\"phone\":null}]', NULL, NULL, NULL, NULL, NULL, NULL, 'planning', 0, 1, NULL, NULL, NULL, NULL, 1, '2026-02-25 19:16:28', '2026-02-25 19:16:28', NULL),
(66, 'Website Biro Organisasi Setda Prov.Babel', 'website-biro-organisasi-setda-provbabel', NULL, NULL, NULL, NULL, 'Biro Organisasi Setda Provinsi  Kepulauan Bangka Belitung ', NULL, NULL, NULL, 'Darmawan As-syidiqi,  S.Tr.IP ', NULL, NULL, 'government', 'medium', NULL, NULL, NULL, NULL, NULL, NULL, '[]', '[{\"name\":\"Rahmat Khodirsyah\",\"role\":\"Fullstack Developer\",\"email\":null,\"phone\":null}]', NULL, NULL, NULL, NULL, NULL, NULL, 'planning', 0, 1, NULL, NULL, NULL, NULL, 1, '2026-02-25 19:17:26', '2026-02-25 19:17:26', NULL),
(67, 'Website Biro Umum Setda Prov.Babel', 'website-biro-umum-setda-provbabel', NULL, NULL, NULL, NULL, 'Biro Umum Setda Provinsi  Kepulauan Bangka Belitung ', NULL, NULL, NULL, 'Belum Menyampaikan  PIC ', NULL, NULL, 'government', 'medium', NULL, NULL, NULL, NULL, NULL, NULL, '[]', '[{\"name\":\"Rahmat Khodirsyah\",\"role\":\"Fullstack Developer\",\"email\":null,\"phone\":null}]', NULL, NULL, NULL, NULL, NULL, NULL, 'planning', 0, 1, NULL, NULL, NULL, NULL, 1, '2026-02-25 19:18:38', '2026-02-25 19:18:38', NULL),
(68, 'Website Biro Administrasi Pimpinan Setda  Prov.Babel', 'website-biro-administrasi-pimpinan-setda-provbabel', NULL, NULL, NULL, NULL, 'Biro Administrasi Pimpinan Setda  Provinsi Kepulauan Bangka  Belitung', NULL, NULL, NULL, 'Malvin Junio, S.IP ', NULL, NULL, 'government', 'medium', NULL, NULL, NULL, NULL, NULL, NULL, '[]', '[{\"name\":\"Rahmat Khodirsyah\",\"role\":\"Fullstack Developer\",\"email\":null,\"phone\":null}]', NULL, NULL, NULL, NULL, NULL, NULL, 'planning', 0, 1, NULL, NULL, NULL, NULL, 1, '2026-02-25 19:20:13', '2026-02-25 19:20:13', NULL),
(69, 'Website UPTD Rumah Sakit Umum  Daerah Provinsi Kepulauan  Bangka Belitung Prov.Babel', 'website-uptd-rumah-sakit-umum-daerah-provinsi-kepulauan-bangka-belitung-provbabel', NULL, NULL, NULL, NULL, 'UPTD Rumah Sakit Umum  Daerah Provinsi Kepulauan  Bangka Belitung Provinsi  Kepulauan Bangka Belitung ', NULL, NULL, NULL, 'Adhitya Liansyah Putra, S.Kom ', NULL, NULL, 'government', 'medium', NULL, NULL, NULL, NULL, NULL, NULL, '[]', '[{\"name\":\"Rahmat Khodirsyah\",\"role\":\"Fullstack Developer\",\"email\":null,\"phone\":null}]', NULL, NULL, NULL, NULL, NULL, NULL, 'planning', 0, 1, NULL, NULL, NULL, NULL, 1, '2026-02-25 19:21:22', '2026-02-25 19:21:22', NULL),
(70, 'Website UPTD Rumah Sakit Jiwa Prov.Babel', 'website-uptd-rumah-sakit-jiwa-provbabel', NULL, NULL, NULL, NULL, 'UPTD Rumah Sakit Jiwa Provinsi  Kepulauan Bangka Belitung ', NULL, NULL, NULL, 'Hj. Mery Ningsih, S.Kom ', NULL, NULL, 'government', 'medium', NULL, NULL, NULL, NULL, NULL, NULL, '[]', '[{\"name\":\"Rahmat Khodirsyah\",\"role\":\"Fullstack Developer\",\"email\":null,\"phone\":null}]', NULL, NULL, NULL, NULL, NULL, NULL, 'planning', 0, 1, NULL, NULL, NULL, NULL, 1, '2026-02-25 19:22:20', '2026-02-25 19:22:20', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `website_comments`
--

CREATE TABLE `website_comments` (
  `id` bigint UNSIGNED NOT NULL,
  `website_id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `commentable_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `commentable_id` bigint UNSIGNED DEFAULT NULL,
  `body` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_id` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `website_members`
--

CREATE TABLE `website_members` (
  `id` bigint UNSIGNED NOT NULL,
  `website_id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `role` enum('project_manager','developer','designer','qa_tester','devops','content_editor','stakeholder','client') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'developer',
  `specialization` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `joined_at` date DEFAULT NULL,
  `left_at` date DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `notes` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indeks untuk tabel yang dibuang
--

--
-- Indeks untuk tabel `activity_logs`
--
ALTER TABLE `activity_logs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `activity_logs_website_id_created_at_index` (`website_id`,`created_at`);

--
-- Indeks untuk tabel `berita_acara_pemeriksaan`
--
ALTER TABLE `berita_acara_pemeriksaan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `instansi_foreign2` (`id_tindak_lanjut`);

--
-- Indeks untuk tabel `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`),
  ADD KEY `cache_expiration_index` (`expiration`);

--
-- Indeks untuk tabel `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`),
  ADD KEY `cache_locks_expiration_index` (`expiration`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `instansi`
--
ALTER TABLE `instansi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `issues`
--
ALTER TABLE `issues`
  ADD PRIMARY KEY (`id`),
  ADD KEY `issues_website_id_status_index` (`website_id`,`status`),
  ADD KEY `issues_website_id_priority_index` (`website_id`,`priority`),
  ADD KEY `issues_website_id_type_index` (`website_id`,`type`);

--
-- Indeks untuk tabel `jenis_layanan_spbe`
--
ALTER TABLE `jenis_layanan_spbe`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indeks untuk tabel `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kebutuhan_layanan_spbe`
--
ALTER TABLE `kebutuhan_layanan_spbe`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `layanan_spbe`
--
ALTER TABLE `layanan_spbe`
  ADD PRIMARY KEY (`id`),
  ADD KEY `instansi_foreign` (`id_instansi`),
  ADD KEY `jenis_layanan_foreign` (`id_jenis_layanan`),
  ADD KEY `petugas_foreign` (`id_pemohon`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `milestones`
--
ALTER TABLE `milestones`
  ADD PRIMARY KEY (`id`),
  ADD KEY `milestones_website_id_target_date_index` (`website_id`,`target_date`),
  ADD KEY `milestones_website_id_is_achieved_index` (`website_id`,`is_achieved`);

--
-- Indeks untuk tabel `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notifications_user_id_foreign` (`user_id`),
  ADD KEY `notifications_pemohon_id_foreign` (`pemohon_id`);

--
-- Indeks untuk tabel `panens`
--
ALTER TABLE `panens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `panens_tenaga_pemanen_id_foreign` (`tenaga_pemanen_id`);

--
-- Indeks untuk tabel `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indeks untuk tabel `pemohon`
--
ALTER TABLE `pemohon`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `pemohons_email_unique` (`email`) USING BTREE,
  ADD UNIQUE KEY `pemohon_nik_unique` (`nik`) USING BTREE,
  ADD UNIQUE KEY `pemohon_nip_unique` (`nip`) USING BTREE;

--
-- Indeks untuk tabel `phases`
--
ALTER TABLE `phases`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `phases_website_id_phase_order_unique` (`website_id`,`phase_order`),
  ADD KEY `phases_website_id_phase_order_index` (`website_id`,`phase_order`),
  ADD KEY `phases_website_id_status_index` (`website_id`,`status`);

--
-- Indeks untuk tabel `portals`
--
ALTER TABLE `portals`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indeks untuk tabel `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tasks_assigned_to_foreign` (`assigned_to`),
  ADD KEY `tasks_created_by_foreign` (`created_by`),
  ADD KEY `tasks_phase_id_order_index` (`phase_id`,`order`),
  ADD KEY `tasks_website_id_status_index` (`website_id`,`status`),
  ADD KEY `tasks_status_index` (`status`);

--
-- Indeks untuk tabel `tindak_lanjut_layanan`
--
ALTER TABLE `tindak_lanjut_layanan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `layanan_foreign` (`id_layanan`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_nip_unique` (`nip`) USING BTREE;

--
-- Indeks untuk tabel `websites`
--
ALTER TABLE `websites`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `websites_slug_unique` (`slug`),
  ADD KEY `websites_status_index` (`status`),
  ADD KEY `websites_priority_index` (`priority`),
  ADD KEY `websites_target_launch_date_index` (`target_launch_date`),
  ADD KEY `websites_is_active_index` (`is_active`),
  ADD KEY `websites_current_phase_order_index` (`current_phase_order`);

--
-- Indeks untuk tabel `website_comments`
--
ALTER TABLE `website_comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `website_comments_website_id_foreign` (`website_id`),
  ADD KEY `website_comments_user_id_foreign` (`user_id`),
  ADD KEY `website_comments_parent_id_foreign` (`parent_id`),
  ADD KEY `website_comments_commentable_type_commentable_id_index` (`commentable_type`,`commentable_id`);

--
-- Indeks untuk tabel `website_members`
--
ALTER TABLE `website_members`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `website_members_website_id_user_id_unique` (`website_id`,`user_id`),
  ADD KEY `website_members_website_id_role_index` (`website_id`,`role`),
  ADD KEY `website_members_user_id_is_active_index` (`user_id`,`is_active`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `activity_logs`
--
ALTER TABLE `activity_logs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `berita_acara_pemeriksaan`
--
ALTER TABLE `berita_acara_pemeriksaan`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `instansi`
--
ALTER TABLE `instansi`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=227;

--
-- AUTO_INCREMENT untuk tabel `issues`
--
ALTER TABLE `issues`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT untuk tabel `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `kebutuhan_layanan_spbe`
--
ALTER TABLE `kebutuhan_layanan_spbe`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `layanan_spbe`
--
ALTER TABLE `layanan_spbe`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `milestones`
--
ALTER TABLE `milestones`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=187;

--
-- AUTO_INCREMENT untuk tabel `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `panens`
--
ALTER TABLE `panens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `pemohon`
--
ALTER TABLE `pemohon`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `phases`
--
ALTER TABLE `phases`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=232;

--
-- AUTO_INCREMENT untuk tabel `portals`
--
ALTER TABLE `portals`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT untuk tabel `services`
--
ALTER TABLE `services`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT untuk tabel `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tindak_lanjut_layanan`
--
ALTER TABLE `tindak_lanjut_layanan`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT untuk tabel `websites`
--
ALTER TABLE `websites`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `website_comments`
--
ALTER TABLE `website_comments`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `website_members`
--
ALTER TABLE `website_members`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `activity_logs`
--
ALTER TABLE `activity_logs`
  ADD CONSTRAINT `activity_logs_website_id_foreign` FOREIGN KEY (`website_id`) REFERENCES `websites` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `berita_acara_pemeriksaan`
--
ALTER TABLE `berita_acara_pemeriksaan`
  ADD CONSTRAINT `instansi_foreign2` FOREIGN KEY (`id_tindak_lanjut`) REFERENCES `tindak_lanjut_layanan` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Ketidakleluasaan untuk tabel `issues`
--
ALTER TABLE `issues`
  ADD CONSTRAINT `issues_website_id_foreign` FOREIGN KEY (`website_id`) REFERENCES `websites` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `layanan_spbe`
--
ALTER TABLE `layanan_spbe`
  ADD CONSTRAINT `instansi_foreign` FOREIGN KEY (`id_instansi`) REFERENCES `instansi` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  ADD CONSTRAINT `jenis_layanan_foreign` FOREIGN KEY (`id_jenis_layanan`) REFERENCES `jenis_layanan_spbe` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  ADD CONSTRAINT `petugas_foreign` FOREIGN KEY (`id_pemohon`) REFERENCES `pemohon` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `milestones`
--
ALTER TABLE `milestones`
  ADD CONSTRAINT `milestones_website_id_foreign` FOREIGN KEY (`website_id`) REFERENCES `websites` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `notifications`
--
ALTER TABLE `notifications`
  ADD CONSTRAINT `notifications_pemohon_id_foreign` FOREIGN KEY (`pemohon_id`) REFERENCES `pemohon` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `notifications_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `panens`
--
ALTER TABLE `panens`
  ADD CONSTRAINT `panens_tenaga_pemanen_id_foreign` FOREIGN KEY (`tenaga_pemanen_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `phases`
--
ALTER TABLE `phases`
  ADD CONSTRAINT `phases_website_id_foreign` FOREIGN KEY (`website_id`) REFERENCES `websites` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tasks`
--
ALTER TABLE `tasks`
  ADD CONSTRAINT `tasks_assigned_to_foreign` FOREIGN KEY (`assigned_to`) REFERENCES `users` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `tasks_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `tasks_phase_id_foreign` FOREIGN KEY (`phase_id`) REFERENCES `phases` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `tasks_website_id_foreign` FOREIGN KEY (`website_id`) REFERENCES `websites` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tindak_lanjut_layanan`
--
ALTER TABLE `tindak_lanjut_layanan`
  ADD CONSTRAINT `layanan_foreign` FOREIGN KEY (`id_layanan`) REFERENCES `layanan_spbe` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `website_comments`
--
ALTER TABLE `website_comments`
  ADD CONSTRAINT `website_comments_parent_id_foreign` FOREIGN KEY (`parent_id`) REFERENCES `website_comments` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `website_comments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `website_comments_website_id_foreign` FOREIGN KEY (`website_id`) REFERENCES `websites` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `website_members`
--
ALTER TABLE `website_members`
  ADD CONSTRAINT `website_members_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `website_members_website_id_foreign` FOREIGN KEY (`website_id`) REFERENCES `websites` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
