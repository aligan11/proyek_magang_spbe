-- phpMyAdmin SQL Dump
-- version 5.2.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 13 Apr 2026 pada 07.09
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
-- Basis data: `db_spbe`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `cache`
--

INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
('laravel-cache-resend-otp:ganasn@gmail.com', 'i:1;', 1775739945),
('laravel-cache-resend-otp:ganasn@gmail.com:timer', 'i:1775739945;', 1775739945);

-- --------------------------------------------------------

--
-- Struktur dari tabel `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `instansi`
--

CREATE TABLE `instansi` (
  `id` bigint UNSIGNED NOT NULL,
  `id_induk` int DEFAULT NULL,
  `kode_instansi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nama_instansi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `singkatan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telepon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` char(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `instansi`
--

INSERT INTO `instansi` (`id`, `id_induk`, `kode_instansi`, `nama_instansi`, `singkatan`, `alamat`, `telepon`, `email`, `status`, `created_at`, `updated_at`) VALUES
(1, NULL, '001', 'Dinas Komunikasi dan Informatika', 'DISKOMINFO', 'Jl. Sinar Baru, Komplek Perkantoran Terpadu', '0717-123456', 'diskominfo@babelprov.go.id', 'aktif', '2026-04-08 20:59:58', '2026-04-08 20:59:58'),
(2, NULL, '002', 'Badan Perencanaan Pembangunan Daerah', 'BAPPEDA', 'Jl. Pulau Bangka, Air Itam', '0717-654321', 'bappeda@babelprov.go.id', 'aktif', '2026-04-08 20:59:58', '2026-04-08 20:59:58'),
(3, NULL, '003', 'Dinas Kesehatan', 'DINKES', 'Jl. Komplek Perkantoran Gubernur', '0717-111222', 'dinkes@babelprov.go.id', 'aktif', '2026-04-08 20:59:58', '2026-04-08 20:59:58'),
(4, NULL, '004', 'Dinas Pendidikan', 'DIKNAS', 'Jl. Air Itam, Pangkalpinang', '0717-333444', 'disdik@babelprov.go.id', 'aktif', '2026-04-08 20:59:58', '2026-04-08 20:59:58'),
(5, NULL, '005', 'Badan Keuangan Daerah', 'BAKUDA', 'Jl. Pulau Belitung, Air Itam', '0717-555666', 'bakuda@babelprov.go.id', 'aktif', '2026-04-08 20:59:58', '2026-04-08 20:59:58'),
(6, NULL, '006', 'Dinas Perhubungan', 'DISHUB', 'Jl. Komplek Perkantoran Terpadu Lt. 2', '0717-777888', 'dishub@babelprov.go.id', 'aktif', '2026-04-08 20:59:58', '2026-04-08 20:59:58'),
(7, NULL, '007', 'Dinas Pekerjaan Umum', 'PU', 'Jl. Jenderal Sudirman No. 10', '0717-999000', 'pu@babelprov.go.id', 'aktif', '2026-04-08 20:59:58', '2026-04-08 20:59:58'),
(8, NULL, '008', 'Badan Kepegawaian Daerah', 'BKD', 'Jl. Air Itam Atas', '0717-222333', 'bkd@babelprov.go.id', 'aktif', '2026-04-08 20:59:58', '2026-04-08 20:59:58'),
(9, NULL, '009', 'Satuan Polisi Pamong Praja', 'SATPOL PP', 'Jl. Komplek Gubernur Babel', '0717-444555', 'satpolpp@babelprov.go.id', 'aktif', '2026-04-08 20:59:58', '2026-04-08 20:59:58'),
(10, NULL, '010', 'Dinas Sosial', 'DINSOS', 'Jl. Bukit Intan No. 5', '0717-666777', 'dinsos@babelprov.go.id', 'aktif', '2026-04-08 20:59:58', '2026-04-08 20:59:58');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis_layanan_spbe`
--

CREATE TABLE `jenis_layanan_spbe` (
  `id` bigint UNSIGNED NOT NULL,
  `kode` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `namajenis` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alias` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `linkna` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `modelna` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `referensi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
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
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kebutuhan_layanan_spbe`
--

CREATE TABLE `kebutuhan_layanan_spbe` (
  `id` bigint UNSIGNED NOT NULL,
  `id_jenis_layanan_spbe` bigint UNSIGNED NOT NULL,
  `no_kebutuhan` int DEFAULT NULL,
  `nama_kebutuhan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` char(1) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ket` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
  `id_kebutuhan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_eksternal` char(1) COLLATE utf8mb4_unicode_ci DEFAULT '1',
  `tahunanggaran` year NOT NULL,
  `periode` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `noreg` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_permohonan` date NOT NULL,
  `id_instansi` bigint UNSIGNED DEFAULT NULL,
  `nama_instansi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `unitKerja` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lokasi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nama_kebutuhan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nama_pemohon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nama_penanggungjawab` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nip_penanggungjawab` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nohp_penanggungjawab` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jabatan_penanggungjawab` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `unitkerja_penanggungjawab` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_penanggungjawab` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ket` text COLLATE utf8mb4_unicode_ci,
  `berkas` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` char(1) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `inputby` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tglinput` timestamp NULL DEFAULT NULL,
  `status_ver` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `verby` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tglver` timestamp NULL DEFAULT NULL,
  `nover` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ketver` text COLLATE utf8mb4_unicode_ci,
  `berkasver` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `layanan_spbe`
--

INSERT INTO `layanan_spbe` (`id`, `id_jenis_layanan`, `id_kebutuhan`, `is_eksternal`, `tahunanggaran`, `periode`, `noreg`, `tgl_permohonan`, `id_instansi`, `nama_instansi`, `unitKerja`, `lokasi`, `nama_kebutuhan`, `nama_pemohon`, `nama_penanggungjawab`, `nip_penanggungjawab`, `nohp_penanggungjawab`, `jabatan_penanggungjawab`, `unitkerja_penanggungjawab`, `email_penanggungjawab`, `ket`, `berkas`, `status`, `inputby`, `tglinput`, `status_ver`, `verby`, `tglver`, `nover`, `ketver`, `berkasver`, `created_at`, `updated_at`) VALUES
(18, 4, '3,1,4,2', '0', '2026', 'Triwulan 2', 'REG-20260413-001', '2026-04-13', 4, 'Dinas Pendidikan', 'e-gov', 'jalan maya', 'coba aja', 'gan asn', 'royy', '198810202015032012', '0895417380190', 'kepala saja', 'informatika', 'royy@gmail.com', 'oyyy cube baii', '1776055700_SERTIF_SEM_1.pdf', '1', '5', '2026-04-12 21:48:20', NULL, NULL, NULL, NULL, NULL, NULL, '2026-04-12 21:48:20', '2026-04-12 21:48:20'),
(19, 4, '[\"3\",\"1\",\"4\"]', '0', '2026', 'Triwulan 2', 'REG-20260413-002', '2026-04-13', 4, 'Dinas Pendidikan', 'e-gov', 'jalan maya1', 'tess ajaa nyube', 'gan asn', 'royy', '198810202015032013', '0895417380191', 'kepala bai', 'informasi', 'royy2@gmail.com', 'cubbeee oy', '1776055900_SERTIF_SEM_3.pdf', '1', '5', '2026-04-12 21:51:40', NULL, NULL, NULL, NULL, NULL, NULL, '2026-04-12 21:51:40', '2026-04-12 21:51:40');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mandates`
--

CREATE TABLE `mandates` (
  `id` bigint UNSIGNED NOT NULL,
  `service_id` bigint UNSIGNED DEFAULT NULL,
  `ticket_id` bigint UNSIGNED NOT NULL,
  `pimpinan_id` bigint UNSIGNED NOT NULL,
  `deskripsi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('pending','selesai') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `mandate_petugas`
--

CREATE TABLE `mandate_petugas` (
  `id` bigint UNSIGNED NOT NULL,
  `mandate_id` bigint UNSIGNED NOT NULL,
  `petugas_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2026_02_12_040554_create_petugas_table', 1),
(5, '2026_02_13_133046_create_services_table', 1),
(6, '2026_02_13_133459_create_tickets_table', 1),
(7, '2026_02_19_041200_create_jenis_layanan_spbe_table', 1),
(8, '2026_02_19_041201_create_kebutuhan_layanan_spbe_table', 1),
(9, '2026_02_19_041202_create_layanan_spbe_table', 1),
(10, '2026_02_19_041203_create_mandates_table', 1),
(11, '2026_02_19_041204_mandate_petugas', 1),
(13, '2026_04_08_005801_create_pemohons_table', 2),
(14, '2026_04_08_005801_create_pemohon_table', 3),
(15, '2026_04_09_033827_create_instansis_table', 4);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pemohon`
--

CREATE TABLE `pemohon` (
  `id` bigint UNSIGNED NOT NULL,
  `tipe_user` enum('internal','eksternal') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'eksternal',
  `nik` varchar(16) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_lengkap` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_hp` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nip` varchar(18) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_instansi` bigint UNSIGNED DEFAULT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `pemohon`
--

INSERT INTO `pemohon` (`id`, `tipe_user`, `nik`, `nama_lengkap`, `email`, `password`, `no_hp`, `nip`, `id_instansi`, `alamat`, `email_verified_at`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'eksternal', '3175092301940002', 'gan', 'gan@gmail.com', '$2y$12$g0B.p/E/cFcl54hyKlpxlOmHY2ghps.08YA2rdV9adLu333lUaFZ6', '0895417380105', NULL, NULL, 'ampui', NULL, '32exfeRQqYbnFJL9eIekNNh5btb6gtR1IVztWXsD9lHpP6tGzKIefbA43hK4', '2026-04-08 17:53:50', '2026-04-08 17:53:50'),
(3, 'eksternal', '3175092301940007', 'gann intera', 'asn@gmail.com', '$2y$12$98kkQ1XSFNOaJiK.eo.9IeCUHstxroXtLdtZl19v8d1VDP0JD3pG6', '0895417380104', '123312312313131234', 9, NULL, NULL, NULL, '2026-04-08 21:08:37', '2026-04-08 21:08:37'),
(5, 'internal', '3175092301940003', 'gan asn', 'ganasn@gmail.com', '$2y$12$fNvAkpiBEhZOMYo4bxvNLeZTDrKQG4LtD6lPy7PHBpJogL3BZT.fm', '0895417380106', '123312312313131235', 4, NULL, NULL, 'Al34V8nDBcOCqqBi4saUkscYCr44PXXhDipYeapBmfFjZG11YuLybjIPXZz1', '2026-04-08 21:18:11', '2026-04-10 00:22:55');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('H1StiGl4xRiL1cQjf1kf3I4SYo5IUwKmHoPoc0wG', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/146.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoielk5cEJGTWFBNE82eUJQN3A3WEJ5YzZJVDk0bnpOV0Q4aVBKNm5iSiI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6Mjk6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9wZW1vaG9uIjtzOjU6InJvdXRlIjtzOjEzOiJwZW1vaG9uLmluZGV4Ijt9czo1NDoibG9naW5fcGVtb2hvbl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjU7fQ==', 1776059841);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `unitKerja` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` enum('admin','kabid','katim','staff') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `daerah` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nip` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jabatan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pangkat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gol` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_seen` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `unitKerja`, `email`, `role`, `daerah`, `password`, `nip`, `jabatan`, `pangkat`, `gol`, `phone`, `remember_token`, `last_seen`, `created_at`, `updated_at`) VALUES
(11, 'Afghan Almufqi', 'Seksi Teknologi Informasi dan Komunikasi', 'afghan12@gmail.com', 'kabid', NULL, '$2y$12$FqYHQQOTf5C1Pi6GBQPo2eVsIdUCVcx.CoOcZ7oV/VoNH8C8Aj6y2', '199501012023011001', 'Pranata Komputer', 'Penata Muda', 'III/a', '0895417380105', NULL, NULL, '2026-04-11 18:28:42', '2026-04-11 18:28:42'),
(12, 'gan matkuso', 'Seksi Teknologi Informasi dan Komunikasi', 'gan12@gmail.com', 'katim', NULL, '$2y$12$MkSnzY8cY5xhdoI5ebqRZ.dMH5WU/oE6JWYoekKqyI37uHdpZ6T/W', '199501012023011002', 'Ketua Tim Teknis', 'Penata Muda', 'III/b', '6281234567892', NULL, NULL, '2026-04-11 18:28:42', '2026-04-11 18:28:42'),
(13, 'Budi Setiawan', 'Seksi Infrastruktur Jaringan', 'budi.petugas@gmail.com', 'staff', NULL, '$2y$12$ck2rLEIWbXtC7MyGpSNq0um4Nw.Hod0lTJEBquvbhK1Kgx2MihIcu', '199501012023011003', 'Teknisi Jaringan', 'Penata Muda', 'III/a', '6281277665544', NULL, NULL, '2026-04-11 18:28:42', '2026-04-11 18:28:42'),
(14, 'Super Admin SPBE', 'Sekretariat', 'admin@spbe.go.id', 'admin', 'Pusat', '$2y$12$Mi774W6bFbzDEvlCmzeniOEw55H8Isl.Irlo/aXJFVh4Sgxu0nfvm', '198805122015031000', 'Administrator Sistem', 'Penata', 'III/c', '6285211223300', NULL, NULL, '2026-04-11 18:28:42', '2026-04-11 18:28:42'),
(15, 'Hendra Wijaya', 'Bidang E-Government', 'hendra.pimpinan@gmail.com', 'staff', NULL, '$2y$12$6enLehoWWvDadigZaw93zewbY8tvpLTjPtofq9itRjQAmKr3ZnJnK', '198001012005011005', 'Kepala Bidang', 'Pembina', 'IV/a', '6281399887766', NULL, NULL, '2026-04-11 18:28:42', '2026-04-11 18:28:42'),
(16, 'Hilal', 'Seksi Aplikasi Dasar', 'rina.petugas@gmail.com', 'staff', NULL, '$2y$12$YdKoka3DeAdRNKUKVt8VdOV0RCbNg9y7d1Ik/4udzt9qVXkAbJgCC', '199702202024012002', 'Programmer', 'Penata Muda', 'III/a', '082178099027', NULL, NULL, '2026-04-11 18:28:42', '2026-04-11 18:28:42'),
(17, 'Pinkan', 'Seksi Keamanan Informasi', 'linda.petugas@gmail.com', 'staff', NULL, '$2y$12$c2Q.0iQagRJ1U4.W0cskqel18WSCpsvJOici3lKf2dqECD5.AR.US', '199608152023022004', 'Analis Keamanan Siber', 'Penata Muda', 'III/a', '081293172600', NULL, NULL, '2026-04-11 18:28:42', '2026-04-11 18:28:42'),
(18, 'Agus Mulyadi', 'Sekretariat Diskominfo', 'agus.pimpinan@gmail.com', 'staff', NULL, '$2y$12$PrGQqXodceS/4XxXTSPeX.fdICffIi8HsE/AOrhqoRnlUiEVGkwSe', '197504121998031002', 'Sekretaris Dinas', 'Pembina Tk. I', 'IV/b', '6281122334455', NULL, NULL, '2026-04-11 18:28:42', '2026-04-11 18:28:42'),
(19, 'Rizky Pratama', 'Dinas Sosial', 'rizky.opd@gmail.com', 'katim', 'Bangka Barat', '$2y$12$2M0VBJAQy8mkVLlgZuKNIunlnXHieQnGZTNmHhkVfSJAFFDqMJW9e', '199307072020011010', 'Ketua Tim Monitoring', 'Penata Muda', 'III/a', '6281200998877', NULL, NULL, '2026-04-11 18:28:42', '2026-04-11 18:28:42');

--
-- Indeks untuk tabel yang dibuang
--

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
  ADD PRIMARY KEY (`id`),
  ADD KEY `kebutuhan_layanan_spbe_id_jenis_layanan_spbe_foreign` (`id_jenis_layanan_spbe`);

--
-- Indeks untuk tabel `layanan_spbe`
--
ALTER TABLE `layanan_spbe`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `layanan_spbe_noreg_unique` (`noreg`),
  ADD KEY `layanan_spbe_id_jenis_layanan_foreign` (`id_jenis_layanan`),
  ADD KEY `layanan_spbe_id_kebutuhan_foreign` (`id_kebutuhan`);

--
-- Indeks untuk tabel `mandates`
--
ALTER TABLE `mandates`
  ADD PRIMARY KEY (`id`),
  ADD KEY `mandates_service_id_foreign` (`service_id`),
  ADD KEY `mandates_ticket_id_foreign` (`ticket_id`),
  ADD KEY `mandates_pimpinan_id_foreign` (`pimpinan_id`);

--
-- Indeks untuk tabel `mandate_petugas`
--
ALTER TABLE `mandate_petugas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `mandate_petugas_mandate_id_foreign` (`mandate_id`),
  ADD KEY `mandate_petugas_petugas_id_foreign` (`petugas_id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

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
  ADD UNIQUE KEY `pemohon_nik_unique` (`nik`),
  ADD UNIQUE KEY `pemohon_email_unique` (`email`),
  ADD UNIQUE KEY `pemohon_nip_unique` (`nip`),
  ADD KEY `pemohon_tipe_user_nik_email_index` (`tipe_user`,`nik`,`email`),
  ADD KEY `instansi_foreign` (`id_instansi`);

--
-- Indeks untuk tabel `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `petugas_email_unique` (`email`),
  ADD UNIQUE KEY `petugas_nip_unique` (`nip`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `instansi`
--
ALTER TABLE `instansi`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `jenis_layanan_spbe`
--
ALTER TABLE `jenis_layanan_spbe`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;

--
-- AUTO_INCREMENT untuk tabel `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `kebutuhan_layanan_spbe`
--
ALTER TABLE `kebutuhan_layanan_spbe`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `layanan_spbe`
--
ALTER TABLE `layanan_spbe`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `mandates`
--
ALTER TABLE `mandates`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `mandate_petugas`
--
ALTER TABLE `mandate_petugas`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `pemohon`
--
ALTER TABLE `pemohon`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `kebutuhan_layanan_spbe`
--
ALTER TABLE `kebutuhan_layanan_spbe`
  ADD CONSTRAINT `kebutuhan_layanan_spbe_id_jenis_layanan_spbe_foreign` FOREIGN KEY (`id_jenis_layanan_spbe`) REFERENCES `jenis_layanan_spbe` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `layanan_spbe`
--
ALTER TABLE `layanan_spbe`
  ADD CONSTRAINT `layanan_spbe_id_jenis_layanan_foreign` FOREIGN KEY (`id_jenis_layanan`) REFERENCES `jenis_layanan_spbe` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `mandates`
--
ALTER TABLE `mandates`
  ADD CONSTRAINT `mandates_pimpinan_id_foreign` FOREIGN KEY (`pimpinan_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `mandates_service_id_foreign` FOREIGN KEY (`service_id`) REFERENCES `jenis_layanan_spbe` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `mandates_ticket_id_foreign` FOREIGN KEY (`ticket_id`) REFERENCES `layanan_spbe` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `mandate_petugas`
--
ALTER TABLE `mandate_petugas`
  ADD CONSTRAINT `mandate_petugas_mandate_id_foreign` FOREIGN KEY (`mandate_id`) REFERENCES `mandates` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `mandate_petugas_petugas_id_foreign` FOREIGN KEY (`petugas_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `pemohon`
--
ALTER TABLE `pemohon`
  ADD CONSTRAINT `instansi_foreign` FOREIGN KEY (`id_instansi`) REFERENCES `instansi` (`id`) ON DELETE CASCADE ON UPDATE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
