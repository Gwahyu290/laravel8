-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 01 Jul 2021 pada 14.40
-- Versi server: 10.4.19-MariaDB
-- Versi PHP: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `proyek2`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `artikels`
--

CREATE TABLE `artikels` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl` date NOT NULL,
  `cabang_id` bigint(20) UNSIGNED NOT NULL,
  `gambar` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nilaiar` int(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `artikels`
--

INSERT INTO `artikels` (`id`, `nama`, `nama_id`, `tgl`, `cabang_id`, `gambar`, `nilaiar`, `created_at`, `updated_at`) VALUES
(50, '24', 'Ella', '2021-06-06', 18, 'artikel1.docx', 2, '2021-06-29 23:32:42', '2021-06-29 23:32:42'),
(51, '24', 'Ella', '2021-06-13', 18, 'artikel2.docx', 2, '2021-06-29 23:32:53', '2021-06-29 23:32:53'),
(52, '24', 'Ella', '2021-06-20', 18, 'daftar pegawai.docx', 3, '2021-06-29 23:33:05', '2021-06-29 23:33:05'),
(53, '24', 'Ella', '2021-06-27', 18, 'daftar pegawai.docx', 3, '2021-06-29 23:33:15', '2021-06-29 23:33:15'),
(54, '35', 'Gista', '2021-06-07', 8, 'artikel2.docx', 2, '2021-06-29 23:43:02', '2021-06-29 23:43:02'),
(55, '35', 'Gista', '2021-06-14', 8, 'artikel2.docx', 3, '2021-06-29 23:43:10', '2021-06-29 23:43:10'),
(56, '35', 'Gista', '2021-06-21', 8, 'artikel2.docx', 2, '2021-06-29 23:43:21', '2021-06-29 23:43:21'),
(57, '35', 'Gista', '2021-06-21', 8, 'artikel2.docx', 2, '2021-06-29 23:43:33', '2021-06-29 23:43:33');

-- --------------------------------------------------------

--
-- Struktur dari tabel `cabangs`
--

CREATE TABLE `cabangs` (
  `id` bigint(11) UNSIGNED NOT NULL,
  `namacbg` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `cabangs`
--

INSERT INTO `cabangs` (`id`, `namacbg`) VALUES
(8, 'Kediri Ngadiluwih'),
(9, 'Kediri Sambi'),
(10, 'Kediri Wates'),
(11, 'Tulungagung Bandung'),
(12, 'Tulungagung Bendilwungu'),
(13, 'Tulungagung Panjer'),
(14, 'Tulungagung Dr. Iskak'),
(15, 'Tulungagung Plosokandang'),
(16, 'Tulungagung Kalangbet'),
(17, 'Blitar Kademangan'),
(18, 'Blitar Wonodadi'),
(19, 'Blitar Cangkring'),
(21, 'Kediri Pare');

-- --------------------------------------------------------

--
-- Struktur dari tabel `dkaryawans`
--

CREATE TABLE `dkaryawans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_tlpn` bigint(12) NOT NULL,
  `cabang_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `facebooks`
--

CREATE TABLE `facebooks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl` date NOT NULL,
  `cabang_id` bigint(20) UNSIGNED NOT NULL,
  `link` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nilaifb` int(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `facebooks`
--

INSERT INTO `facebooks` (`id`, `nama`, `nama_id`, `tgl`, `cabang_id`, `link`, `nilaifb`, `created_at`, `updated_at`) VALUES
(19, '24', 'Ella', '2021-06-01', 18, 'https://www.facebook.com/Pusatkulinerwonodadi', 3, '2021-06-29 23:30:25', '2021-06-30 06:58:00'),
(20, '24', 'Ella', '2021-06-02', 18, 'https://www.facebook.com/Pusatkulinerwonodadi', 2, '2021-06-29 23:30:35', '2021-06-29 23:30:35'),
(21, '24', 'Ella', '2021-06-03', 18, 'https://www.facebook.com/Pusatkulinerwonodadi', 2, '2021-06-29 23:30:44', '2021-06-29 23:30:44'),
(22, '24', 'Ella', '2021-06-04', 18, 'https://www.facebook.com/Pusatkulinerwonodadi', 3, '2021-06-29 23:30:54', '2021-06-29 23:30:54'),
(23, '24', 'Ella', '2021-06-05', 18, 'https://www.facebook.com/Pusatkulinerwonodadi', 2, '2021-06-29 23:31:10', '2021-06-29 23:31:10'),
(24, '35', 'Gista', '2021-06-01', 8, 'https://www.instagram.com/samchick_ngadiluwih/', 2, '2021-06-29 23:39:02', '2021-06-29 23:39:02'),
(25, '35', 'Gista', '2021-06-02', 8, 'https://www.instagram.com/samchick_ngadiluwih/', 3, '2021-06-29 23:39:11', '2021-06-29 23:39:11'),
(26, '35', 'Gista', '2021-06-03', 8, 'https://www.instagram.com/samchick_ngadiluwih/', 2, '2021-06-29 23:39:19', '2021-06-29 23:39:19'),
(27, '35', 'Gista', '2021-06-04', 8, 'https://www.instagram.com/samchick_ngadiluwih/', 2, '2021-06-29 23:39:27', '2021-06-29 23:39:27'),
(28, '35', 'Gista', '2021-06-06', 8, 'https://www.instagram.com/samchick_ngadiluwih/', 2, '2021-06-29 23:39:36', '2021-06-29 23:39:36'),
(29, '35', 'Gista', '2021-06-06', 8, 'https://www.instagram.com/samchick_ngadiluwih/', 2, '2021-06-29 23:39:44', '2021-06-29 23:39:44');

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `googlemaps`
--

CREATE TABLE `googlemaps` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl` date NOT NULL,
  `cabang_id` bigint(20) UNSIGNED NOT NULL,
  `link` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nilaigm` int(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `googlemaps`
--

INSERT INTO `googlemaps` (`id`, `nama`, `nama_id`, `tgl`, `cabang_id`, `link`, `nilaigm`, `created_at`, `updated_at`) VALUES
(20, '24', 'Ella', '2021-06-01', 18, 'https://www.facebook.com/Pusatkulinerwonodadi', 2, '2021-06-29 23:31:24', '2021-06-29 23:31:24'),
(21, '24', 'Ella', '2021-06-02', 18, 'https://www.facebook.com/Pusatkulinerwonodadi', 3, '2021-06-29 23:31:33', '2021-06-29 23:31:33'),
(22, '24', 'Ella', '2021-06-03', 18, 'https://www.facebook.com/Pusatkulinerwonodadi', 2, '2021-06-29 23:31:45', '2021-06-29 23:31:45'),
(23, '24', 'Ella', '2021-06-04', 18, 'https://www.facebook.com/Pusatkulinerwonodadi', 1, '2021-06-29 23:31:53', '2021-06-29 23:31:53'),
(24, '24', 'Ella', '2021-06-05', 18, 'https://www.facebook.com/Pusatkulinerwonodadi', 2, '2021-06-29 23:32:13', '2021-06-29 23:32:13'),
(25, '35', 'Gista', '2021-06-01', 18, 'https://laravel.com/docs/7.x/controllers#introduction', 2, '2021-06-29 23:41:30', '2021-06-29 23:41:30'),
(26, '35', 'Gista', '2021-06-02', 8, 'https://www.instagram.com/samchick_ngadiluwih/', 2, '2021-06-29 23:42:09', '2021-06-29 23:42:09'),
(27, '35', 'Gista', '2021-06-03', 8, 'https://www.instagram.com/samchick_ngadiluwih/', 2, '2021-06-29 23:42:19', '2021-06-29 23:42:19'),
(28, '35', 'Gista', '2021-06-04', 8, 'https://www.instagram.com/samchick_ngadiluwih/', 2, '2021-06-29 23:42:27', '2021-06-29 23:42:27'),
(29, '35', 'Gista', '2021-06-05', 8, 'https://www.instagram.com/samchick_ngadiluwih/', 3, '2021-06-29 23:42:35', '2021-06-29 23:42:35');

-- --------------------------------------------------------

--
-- Struktur dari tabel `instagrams`
--

CREATE TABLE `instagrams` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl` date NOT NULL,
  `cabang_id` bigint(20) UNSIGNED NOT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nilaiins` int(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `instagrams`
--

INSERT INTO `instagrams` (`id`, `nama`, `nama_id`, `tgl`, `cabang_id`, `link`, `nilaiins`, `created_at`, `updated_at`) VALUES
(48, '24', 'Ella', '2021-06-01', 18, 'https://www.instagram.com/samchick_wonodadi/', 2, '2021-06-29 23:28:51', '2021-06-29 23:28:51'),
(49, '24', 'Ella', '2021-06-02', 18, 'https://www.instagram.com/samchick_wonodadi/', 3, '2021-06-29 23:29:20', '2021-06-29 23:29:20'),
(50, '24', 'Ella', '2021-06-03', 18, 'https://www.instagram.com/samchick_wonodadi/', 2, '2021-06-29 23:29:31', '2021-06-29 23:29:31'),
(51, '24', 'Ella', '2021-06-04', 18, 'https://www.instagram.com/samchick_wonodadi/', 3, '2021-06-29 23:29:41', '2021-06-29 23:29:41'),
(52, '24', 'Ella', '2021-06-05', 18, 'https://www.instagram.com/samchick_wonodadi/', 2, '2021-06-29 23:29:51', '2021-06-29 23:29:51'),
(53, '35', 'Gista', '2021-06-01', 8, 'https://www.instagram.com/samchick_ngadiluwih/', 3, '2021-06-29 23:37:57', '2021-06-29 23:37:57'),
(54, '35', 'Gista', '2021-06-02', 8, 'https://www.instagram.com/samchick_ngadiluwih/', 2, '2021-06-29 23:38:08', '2021-06-29 23:38:08'),
(55, '35', 'Gista', '2021-06-03', 8, 'https://www.instagram.com/samchick_ngadiluwih/', 2, '2021-06-29 23:38:20', '2021-06-29 23:38:20'),
(56, '35', 'Gista', '2021-06-04', 8, 'https://www.instagram.com/samchick_ngadiluwih/', 2, '2021-06-29 23:38:30', '2021-06-29 23:38:30'),
(57, '35', 'Gista', '2021-06-05', 8, 'https://www.instagram.com/samchick_ngadiluwih/', 2, '2021-06-29 23:38:40', '2021-06-29 23:38:40'),
(58, '35', 'Gista', '2021-06-06', 8, 'https://www.instagram.com/samchick_ngadiluwih/', 2, '2021-06-29 23:38:49', '2021-06-29 23:38:49'),
(59, '24', 'Ella', '2021-07-01', 14, 'Vyvv.', NULL, '2021-07-01 01:22:16', '2021-07-01 01:22:16');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(4, '2020_10_20_022932_create_dkaryawan_table', 2),
(5, '2020_10_20_023745_create_dkaryawan_table', 3),
(11, '2014_10_12_000000_create_users_table', 4),
(12, '2014_10_12_100000_create_password_resets_table', 4),
(13, '2019_08_19_000000_create_failed_jobs_table', 4),
(14, '2020_10_20_024420_create_dkaryawan_table', 4),
(17, '2020_10_27_020357_create_skaryawan_table', 5),
(18, '2020_11_23_162754_create_djobdesks_table', 6),
(19, '2020_12_21_082011_create_instagrams_table', 7),
(20, '2020_12_21_095122_create_reports_table', 8),
(21, '2020_12_21_112043_create_artikels_table', 9),
(22, '2020_12_21_112421_create_googlemaps_table', 10),
(23, '2020_12_21_112449_create_facebooks_table', 10),
(24, '2021_06_29_134413_create_whatsapps_table', 11),
(25, '2021_06_29_140613_create_pamflets_table', 12);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pamflets`
--

CREATE TABLE `pamflets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl` date NOT NULL,
  `cabang_id` bigint(20) UNSIGNED NOT NULL,
  `gambar` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nilaipm` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `pamflets`
--

INSERT INTO `pamflets` (`id`, `nama`, `nama_id`, `tgl`, `cabang_id`, `gambar`, `nilaipm`, `created_at`, `updated_at`) VALUES
(2, '24', 'Ella', '2021-06-06', 18, 'WhatsApp Image 2021-06-22 at 19.46.22.jpeg', 3, '2021-06-29 23:34:56', '2021-06-29 23:34:56'),
(3, '24', 'Ella', '2021-06-13', 18, 'WhatsApp Image 2021-06-22 at 19.46.45.jpeg', 2, '2021-06-29 23:35:19', '2021-06-29 23:35:19'),
(4, '24', 'Ella', '2021-06-20', 18, 'WhatsApp Image 2021-06-22 at 20.14.11.jpeg', 2, '2021-06-29 23:35:40', '2021-06-29 23:35:40'),
(5, '24', 'Ella', '2021-06-27', 18, 'WhatsApp Image 2021-06-22 at 19.46.45.jpeg', 2, '2021-06-29 23:35:53', '2021-06-29 23:35:53'),
(6, '35', 'Gista', '2021-06-08', 8, 'WhatsApp Image 2021-06-22 at 19.46.22.jpeg', 1, '2021-06-29 23:47:21', '2021-06-29 23:47:21'),
(7, '35', 'Gista', '2021-06-14', 8, 'WhatsApp Image 2021-06-22 at 19.46.45.jpeg', 2, '2021-06-29 23:47:32', '2021-06-29 23:47:32'),
(8, '35', 'Gista', '2021-06-21', 8, 'WhatsApp Image 2021-06-22 at 20.14.11.jpeg', 1, '2021-06-29 23:47:44', '2021-06-29 23:47:44'),
(9, '35', 'Gista', '2021-06-28', 8, 'WhatsApp Image 2021-06-22 at 19.46.45.jpeg', 2, '2021-06-29 23:48:00', '2021-06-29 23:48:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `reports`
--

CREATE TABLE `reports` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl` date NOT NULL,
  `cabang_id` bigint(20) UNSIGNED NOT NULL,
  `hasil` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gambar` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slaporan` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `level` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_tlpn` bigint(12) NOT NULL,
  `cabang_id` bigint(20) UNSIGNED DEFAULT NULL,
  `alamat` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `android` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `level`, `name`, `no_tlpn`, `cabang_id`, `alamat`, `email`, `email_verified_at`, `android`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(24, 'Karyawan', 'Ella', 81322114112, 18, 'Wonodadi', 'ella@gmail.com', NULL, 'ella1234', '$2y$10$PfKd3UO8j2B1BfkdqSH8e.4GvZ4fj5gzNfeRM7lUCm076CK6rJGle', NULL, '2021-06-28 18:56:08', '2021-06-28 18:56:08'),
(26, 'Admin', 'Admin', 85607205237, 19, 'Jombang', 'admin@gmail.com', NULL, 'admin123', '$2y$10$.zsC49pE5tq54uIKLeC3JugwzU/yfV1zUhDFw6e0xHZmkuiTr27Hq', 'eOeCmWdJQEplbxEQusv14fGkGvt1pZq5Tw2aGGQhXECQw3eXd65ayEJC4rtg', '2021-06-29 21:46:15', '2021-06-29 21:46:15'),
(27, 'Karyawan', 'Retno', 85607205232, 19, 'Panjer', 'retno@gmail.com', NULL, 'retno1234', '$2y$10$GPVMTyWAcnmYy8kLvwIaWe.GPNxmTysIwBd6V7KEblQYJkS9kW6tS', NULL, '2021-06-29 23:18:09', '2021-06-29 23:18:09'),
(28, 'Karyawan', 'Tiara', 85607205232, 17, 'Kademangan', 'tiara@gmial.com', NULL, 'tiara1234', '$2y$10$AfgjCewCrJrMI6vrMkZfkupEbEjjPfEx09v0ccE0aucPbKX8b9vCu', NULL, '2021-06-29 23:18:42', '2021-06-29 23:18:42'),
(29, 'Karyawan', 'Bella', 85607205232, 12, 'Bendilwungu', 'bella@gmail.com', NULL, 'bella1234', '$2y$10$5608xFydA3/vFuXlXK0q0OXop8M5SO1YYG7hM.zgE8wvbucwGoa0u', NULL, '2021-06-29 23:20:54', '2021-06-29 23:20:54'),
(30, 'Karyawan', 'Jihan', 85607205232, 19, 'Cangkring', 'jihan@gmail.com', NULL, 'jihan1234', '$2y$10$gC1dmpFuMYISTrkZxgPAaePYKlCcjGSEKwufi9X5IKA2ODOXnb1U2', NULL, '2021-06-29 23:21:34', '2021-06-29 23:21:34'),
(31, 'Karyawan', 'Zahra', 85607205232, 15, 'Ploso Klaten', 'zahra@gmail.com', NULL, 'zahra1234', '$2y$10$kc93vA7vrcNhEwtO5ZF09OjDHD.T.fu9DYsti.DyZp7.GvK6CoZxu', NULL, '2021-06-29 23:22:14', '2021-06-29 23:22:14'),
(32, 'Karyawan', 'Pandu', 85607205232, 21, 'Pare', 'pandu@gmail.com', NULL, 'pandu1234', '$2y$10$itqVM3dv0VDFiH38J/1.V.mDF/ou/oSaHF8.Mdx9ilI7gCQCBLdxK', NULL, '2021-06-29 23:22:41', '2021-06-29 23:22:41'),
(33, 'Karyawan', 'arif', 85607205232, 13, 'Patok', 'arif@gmail.com', NULL, 'arif1234', '$2y$10$ckEi2ZEXCr1JGM9mYxnXq...A6s8999tvKJOq9jvqNqnRoXtFDow2', NULL, '2021-06-29 23:23:05', '2021-06-29 23:23:05'),
(34, 'Karyawan', 'Sari', 85607205232, 9, 'Sambi', 'sari@gmail.com', NULL, 'sari1234', '$2y$10$AtvP.dimbvPpf6G8EoTIoOQ1/kZ8/7NJZMl5//hnLwyc3ALWpaaW6', NULL, '2021-06-29 23:23:30', '2021-06-29 23:23:30'),
(35, 'Karyawan', 'Gista', 85607205234, 8, 'Ngadiluwih', 'gista@gmail.com', NULL, 'gista123', '$2y$10$6KXEHVYsMTfLCk8fwWqoOere1YgGqJVBCcy6kOhcfRtAo4u/7Kzea', NULL, '2021-06-29 23:37:10', '2021-06-29 23:37:10'),
(36, 'Karyawan', 'Coba', 85607203234, 15, 'Coba', 'coba@gmail.com', NULL, 'coba1234', '$2y$10$2eXNqYtHcmqU5CcbIcuB5OkQpQxuNTvvZxF6uV/Ly1rO1epbbfGxu', NULL, '2021-06-30 11:36:39', '2021-06-30 11:36:39');

-- --------------------------------------------------------

--
-- Struktur dari tabel `whatsapps`
--

CREATE TABLE `whatsapps` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl` date NOT NULL,
  `cabang_id` bigint(20) UNSIGNED NOT NULL,
  `gambar` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nilaiwa` bigint(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `whatsapps`
--

INSERT INTO `whatsapps` (`id`, `nama`, `nama_id`, `tgl`, `cabang_id`, `gambar`, `nilaiwa`, `created_at`, `updated_at`) VALUES
(3, '24', 'Ella', '2021-06-06', 18, 'WhatsApp Image 2021-06-14 at 20.44.49.jpeg', 2, '2021-06-29 23:33:42', '2021-06-29 23:33:42'),
(4, '24', 'Ella', '2021-06-13', 18, 'WhatsApp Image 2021-06-14 at 20.44.49.jpeg', 3, '2021-06-29 23:34:02', '2021-06-29 23:55:05'),
(5, '24', 'Ella', '2021-06-20', 18, 'WhatsApp Image 2021-06-14 at 20.44.49.jpeg', 1, '2021-06-29 23:34:24', '2021-06-29 23:34:24'),
(6, '24', 'Ella', '2021-06-27', 18, 'WhatsApp Image 2021-06-14 at 20.44.49.jpeg', 2, '2021-06-29 23:34:40', '2021-06-29 23:34:40'),
(7, '35', 'Gista', '2021-06-07', 8, 'WhatsApp Image 2021-06-14 at 20.44.49.jpeg', 2, '2021-06-29 23:45:47', '2021-06-29 23:45:47'),
(8, '35', 'Gista', '2021-06-14', 8, 'WhatsApp Image 2021-06-14 at 20.44.49.jpeg', 3, '2021-06-29 23:46:34', '2021-06-29 23:46:34'),
(9, '35', 'Gista', '2021-06-21', 8, 'WhatsApp Image 2021-06-14 at 20.44.49.jpeg', 2, '2021-06-29 23:46:47', '2021-06-29 23:46:47'),
(10, '35', 'Gista', '2021-06-28', 8, 'WhatsApp Image 2021-06-14 at 20.44.49.jpeg', 2, '2021-06-29 23:46:58', '2021-06-29 23:46:58');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `artikels`
--
ALTER TABLE `artikels`
  ADD PRIMARY KEY (`id`),
  ADD KEY `artikels_cabang_id_foreign` (`cabang_id`),
  ADD KEY `nama_id` (`nama_id`);

--
-- Indeks untuk tabel `cabangs`
--
ALTER TABLE `cabangs`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `dkaryawans`
--
ALTER TABLE `dkaryawans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `dkaryawans_cabang_id_foreign` (`cabang_id`),
  ADD KEY `nama` (`nama`),
  ADD KEY `nama-id` (`nama`),
  ADD KEY `nama_id` (`nama`);

--
-- Indeks untuk tabel `facebooks`
--
ALTER TABLE `facebooks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `facebooks_cabang_id_foreign` (`cabang_id`),
  ADD KEY `nama_id` (`nama_id`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `googlemaps`
--
ALTER TABLE `googlemaps`
  ADD PRIMARY KEY (`id`),
  ADD KEY `googlemaps_cabang_id_foreign` (`cabang_id`),
  ADD KEY `nama_id` (`nama_id`);

--
-- Indeks untuk tabel `instagrams`
--
ALTER TABLE `instagrams`
  ADD PRIMARY KEY (`id`),
  ADD KEY `instagrams_cabang_id_foreign` (`cabang_id`),
  ADD KEY `instagrams_ibfk_1` (`nama_id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pamflets`
--
ALTER TABLE `pamflets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pamflets_cabang_id_foreign` (`cabang_id`),
  ADD KEY `nama_id` (`nama_id`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeks untuk tabel `reports`
--
ALTER TABLE `reports`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reports_cabang_id_foreign` (`cabang_id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `cabang_id` (`cabang_id`),
  ADD KEY `name` (`name`);

--
-- Indeks untuk tabel `whatsapps`
--
ALTER TABLE `whatsapps`
  ADD PRIMARY KEY (`id`),
  ADD KEY `whatsapps_cabang_id_foreign` (`cabang_id`),
  ADD KEY `nama_id` (`nama_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `artikels`
--
ALTER TABLE `artikels`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT untuk tabel `cabangs`
--
ALTER TABLE `cabangs`
  MODIFY `id` bigint(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT untuk tabel `dkaryawans`
--
ALTER TABLE `dkaryawans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `facebooks`
--
ALTER TABLE `facebooks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `googlemaps`
--
ALTER TABLE `googlemaps`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT untuk tabel `instagrams`
--
ALTER TABLE `instagrams`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT untuk tabel `pamflets`
--
ALTER TABLE `pamflets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `reports`
--
ALTER TABLE `reports`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT untuk tabel `whatsapps`
--
ALTER TABLE `whatsapps`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `artikels`
--
ALTER TABLE `artikels`
  ADD CONSTRAINT `artikels_cabang_id_foreign` FOREIGN KEY (`cabang_id`) REFERENCES `cabangs` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `artikels_ibfk_1` FOREIGN KEY (`nama_id`) REFERENCES `users` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `dkaryawans`
--
ALTER TABLE `dkaryawans`
  ADD CONSTRAINT `dkaryawans_cabang_id_foreign` FOREIGN KEY (`cabang_id`) REFERENCES `cabangs` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `facebooks`
--
ALTER TABLE `facebooks`
  ADD CONSTRAINT `facebooks_cabang_id_foreign` FOREIGN KEY (`cabang_id`) REFERENCES `cabangs` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `facebooks_ibfk_1` FOREIGN KEY (`nama_id`) REFERENCES `users` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `googlemaps`
--
ALTER TABLE `googlemaps`
  ADD CONSTRAINT `googlemaps_cabang_id_foreign` FOREIGN KEY (`cabang_id`) REFERENCES `cabangs` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `googlemaps_ibfk_1` FOREIGN KEY (`nama_id`) REFERENCES `users` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `instagrams`
--
ALTER TABLE `instagrams`
  ADD CONSTRAINT `instagrams_cabang_id_foreign` FOREIGN KEY (`cabang_id`) REFERENCES `cabangs` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `instagrams_ibfk_1` FOREIGN KEY (`nama_id`) REFERENCES `users` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `pamflets`
--
ALTER TABLE `pamflets`
  ADD CONSTRAINT `pamflets_cabang_id_foreign` FOREIGN KEY (`cabang_id`) REFERENCES `cabangs` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pamflets_ibfk_1` FOREIGN KEY (`nama_id`) REFERENCES `users` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `reports`
--
ALTER TABLE `reports`
  ADD CONSTRAINT `reports_cabang_id_foreign` FOREIGN KEY (`cabang_id`) REFERENCES `cabangs` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_cabang_id_foreign` FOREIGN KEY (`cabang_id`) REFERENCES `cabangs` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `whatsapps`
--
ALTER TABLE `whatsapps`
  ADD CONSTRAINT `whatsapps_cabang_id_foreign` FOREIGN KEY (`cabang_id`) REFERENCES `cabangs` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `whatsapps_ibfk_1` FOREIGN KEY (`nama_id`) REFERENCES `users` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
