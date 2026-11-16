-- phpMyAdmin SQL Dump
-- version 5.2.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 16, 2026 at 05:16 AM
-- Server version: 8.0.30
-- PHP Version: 8.4.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_sekolah_afri`
--

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '2026_11_16_100001_create_table_jurusan_afri', 1),
(3, '2026_11_16_100002_create_table_guru_afri', 1),
(4, '2026_11_16_100003_create_table_siswa_afri', 1),
(5, '2026_11_16_100004_create_table_pelajaran_afri', 1),
(6, '2026_11_16_100005_create_table_kurikulum_afri', 1),
(7, '2026_11_16_100006_create_table_kelas_afri', 1),
(8, '2026_11_16_100007_create_table_jadwal_afri', 1),
(9, '2026_11_16_100008_create_table_nilai_afri', 1);

-- --------------------------------------------------------

--
-- Table structure for table `t_guru_afri`
--

CREATE TABLE `t_guru_afri` (
  `id` bigint UNSIGNED NOT NULL,
  `nip` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_guru` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `t_guru_afri`
--

INSERT INTO `t_guru_afri` (`id`, `nip`, `nama_guru`, `created_at`, `updated_at`) VALUES
(1, 'G-01', 'Herianto', NULL, NULL),
(2, 'G-02', 'Rian Ordila', NULL, NULL),
(3, 'G-03', 'Yulisman', '2026-11-15 22:05:32', '2026-11-15 22:05:32');

-- --------------------------------------------------------

--
-- Table structure for table `t_jadwal_afri`
--

CREATE TABLE `t_jadwal_afri` (
  `id` bigint UNSIGNED NOT NULL,
  `kelas_id` bigint UNSIGNED NOT NULL,
  `pelajaran_id` bigint UNSIGNED NOT NULL,
  `guru_id` bigint UNSIGNED NOT NULL,
  `hari` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jam_mulai` time NOT NULL,
  `jam_selesai` time NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `t_jadwal_afri`
--

INSERT INTO `t_jadwal_afri` (`id`, `kelas_id`, `pelajaran_id`, `guru_id`, `hari`, `jam_mulai`, `jam_selesai`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, 'Senin', '08:00:00', '09:30:00', NULL, NULL),
(2, 2, 2, 2, 'Selasa', '10:00:00', '11:30:00', NULL, NULL),
(3, 3, 4, 3, 'Kamis', '08:00:00', '10:00:00', '2026-11-15 22:07:16', '2026-11-15 22:07:32');

-- --------------------------------------------------------

--
-- Table structure for table `t_jurusan_afri`
--

CREATE TABLE `t_jurusan_afri` (
  `id` bigint UNSIGNED NOT NULL,
  `kode_jurusan` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_jurusan` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `t_jurusan_afri`
--

INSERT INTO `t_jurusan_afri` (`id`, `kode_jurusan`, `nama_jurusan`, `created_at`, `updated_at`) VALUES
(1, 'SI', 'Sistem Informasi', NULL, NULL),
(2, 'TI', 'Teknik Informatika', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `t_kelas_afri`
--

CREATE TABLE `t_kelas_afri` (
  `id` bigint UNSIGNED NOT NULL,
  `kode_kelas` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_kelas` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jurusan_id` bigint UNSIGNED DEFAULT NULL,
  `guru_id` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `t_kelas_afri`
--

INSERT INTO `t_kelas_afri` (`id`, `kode_kelas`, `nama_kelas`, `jurusan_id`, `guru_id`, `created_at`, `updated_at`) VALUES
(1, 'KL-1', 'X-A', 1, 1, NULL, NULL),
(2, 'KL-2', 'X-B', 2, 2, NULL, NULL),
(3, 'KL-3', 'X-C', 2, 3, '2026-11-15 22:06:23', '2026-11-15 22:06:23');

-- --------------------------------------------------------

--
-- Table structure for table `t_kurikulum_afri`
--

CREATE TABLE `t_kurikulum_afri` (
  `id` bigint UNSIGNED NOT NULL,
  `kode_kurikulum` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_kurikulum` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tahun` varchar(9) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `t_kurikulum_afri`
--

INSERT INTO `t_kurikulum_afri` (`id`, `kode_kurikulum`, `nama_kurikulum`, `tahun`, `keterangan`, `created_at`, `updated_at`) VALUES
(1, 'KR-1', 'Kurikulum Merdeka', '2024/2025', 'Kurikulum utama', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `t_nilai_afri`
--

CREATE TABLE `t_nilai_afri` (
  `id` bigint UNSIGNED NOT NULL,
  `siswa_id` bigint UNSIGNED NOT NULL,
  `pelajaran_id` bigint UNSIGNED NOT NULL,
  `tugas` int NOT NULL DEFAULT '0',
  `uts` int NOT NULL DEFAULT '0',
  `uas` int NOT NULL DEFAULT '0',
  `nilai_akhir` decimal(5,2) NOT NULL DEFAULT '0.00',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `t_nilai_afri`
--

INSERT INTO `t_nilai_afri` (`id`, `siswa_id`, `pelajaran_id`, `tugas`, `uts`, `uas`, `nilai_akhir`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 80, 75, 85, 80.00, NULL, NULL),
(2, 2, 2, 70, 78, 82, 76.67, NULL, NULL),
(3, 3, 4, 80, 80, 80, 80.00, '2026-11-15 22:08:12', '2026-11-15 22:08:12');

-- --------------------------------------------------------

--
-- Table structure for table `t_pelajaran_afri`
--

CREATE TABLE `t_pelajaran_afri` (
  `id` bigint UNSIGNED NOT NULL,
  `kode_pelajaran` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_pelajaran` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `t_pelajaran_afri`
--

INSERT INTO `t_pelajaran_afri` (`id`, `kode_pelajaran`, `nama_pelajaran`, `created_at`, `updated_at`) VALUES
(1, 'PL-1', 'Matematika', NULL, NULL),
(2, 'PL-2', 'Bahasa Inggris', NULL, NULL),
(3, 'PL-3', 'Bahasa Indonesia', NULL, NULL),
(4, 'PL-4', 'Pancasila', NULL, NULL),
(5, 'PL-5', 'Fisika', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `t_siswa_afri`
--

CREATE TABLE `t_siswa_afri` (
  `id` bigint UNSIGNED NOT NULL,
  `nis` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_siswa` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jurusan_id` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `t_siswa_afri`
--

INSERT INTO `t_siswa_afri` (`id`, `nis`, `nama_siswa`, `jurusan_id`, `created_at`, `updated_at`) VALUES
(1, '101', 'Afri Rifaldo', 1, NULL, NULL),
(2, '102', 'Nofri Andi', 1, NULL, NULL),
(3, '103', 'Kevin', 2, NULL, NULL),
(4, '104', 'Rifki', 2, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin Afri', 'admin@afri.com', NULL, '$2y$12$QDd1w5kH9LmoD5rk4dAmdOr3o/VLVkjhSevHO5acdnKwMKhD69yTq', NULL, '2026-11-15 22:00:25', '2026-11-15 22:00:25');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_guru_afri`
--
ALTER TABLE `t_guru_afri`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_jadwal_afri`
--
ALTER TABLE `t_jadwal_afri`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_jurusan_afri`
--
ALTER TABLE `t_jurusan_afri`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_kelas_afri`
--
ALTER TABLE `t_kelas_afri`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_kurikulum_afri`
--
ALTER TABLE `t_kurikulum_afri`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_nilai_afri`
--
ALTER TABLE `t_nilai_afri`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_pelajaran_afri`
--
ALTER TABLE `t_pelajaran_afri`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_siswa_afri`
--
ALTER TABLE `t_siswa_afri`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `t_guru_afri`
--
ALTER TABLE `t_guru_afri`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `t_jadwal_afri`
--
ALTER TABLE `t_jadwal_afri`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `t_jurusan_afri`
--
ALTER TABLE `t_jurusan_afri`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `t_kelas_afri`
--
ALTER TABLE `t_kelas_afri`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `t_kurikulum_afri`
--
ALTER TABLE `t_kurikulum_afri`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `t_nilai_afri`
--
ALTER TABLE `t_nilai_afri`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `t_pelajaran_afri`
--
ALTER TABLE `t_pelajaran_afri`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `t_siswa_afri`
--
ALTER TABLE `t_siswa_afri`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
