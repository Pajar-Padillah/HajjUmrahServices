-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 19, 2023 at 03:09 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `haji`
--

-- --------------------------------------------------------

--
-- Table structure for table `alamat_pendaftar`
--

CREATE TABLE `alamat_pendaftar` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `pendaftaran_id` int(10) UNSIGNED NOT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kelurahan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kecamatan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kota` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode_pos` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_telp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `alamat_pendaftar`
--

INSERT INTO `alamat_pendaftar` (`id`, `pendaftaran_id`, `alamat`, `kelurahan`, `kecamatan`, `kota`, `kode_pos`, `email`, `no_telp`, `created_at`, `updated_at`) VALUES
(2, 2, 'Jl. Veteran', 'Rajabasa', 'Rajabasa Raya', 'Bandar Lampung', '123456', 'user@gmail.com', '1234567890', '2023-07-19 03:52:55', '2023-07-19 03:52:55'),
(4, 7, 'Jl. Veteran', 'Rajabasa', 'Padang Cermin', 'Bandar Lampung', '123123', 'user2@gmail.com', '3434343434343', '2023-07-19 04:15:40', '2023-07-19 04:15:40');

-- --------------------------------------------------------

--
-- Table structure for table `biodata_pendaftar`
--

CREATE TABLE `biodata_pendaftar` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `pendaftaran_id` int(10) UNSIGNED NOT NULL,
  `nama_ayah` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_ibu` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_mahram` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status_mahram` enum('','suami','ayah','anak','adik','kakak','lain-lain') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pernah_haji` enum('pernah','belum') COLLATE utf8mb4_unicode_ci NOT NULL,
  `pernah_umroh` enum('pernah','belum') COLLATE utf8mb4_unicode_ci NOT NULL,
  `merokok` enum('ya','tidak') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `memiliki_penyakit` enum('ya','tidak') COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_penyakit` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `perlu_penanganan_khusus` enum('ya','tidak') COLLATE utf8mb4_unicode_ci NOT NULL,
  `perlu_kursi_roda` enum('ya','tidak') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `biodata_pendaftar`
--

INSERT INTO `biodata_pendaftar` (`id`, `pendaftaran_id`, `nama_ayah`, `nama_ibu`, `nama_mahram`, `status_mahram`, `pernah_haji`, `pernah_umroh`, `merokok`, `memiliki_penyakit`, `nama_penyakit`, `perlu_penanganan_khusus`, `perlu_kursi_roda`, `created_at`, `updated_at`) VALUES
(2, 2, 'Daddy', 'Mommy', 'My Boy', 'kakak', 'belum', 'pernah', 'tidak', 'tidak', 'Batuk', 'tidak', 'tidak', '2023-07-19 03:52:55', '2023-07-19 03:52:55'),
(4, 7, 'Harto', 'Siti', NULL, 'kakak', 'belum', 'belum', 'tidak', 'tidak', 'Flu', 'tidak', 'tidak', '2023-07-19 04:15:39', '2023-07-19 04:15:39');

-- --------------------------------------------------------

--
-- Table structure for table `dokumen_pendaftar`
--

CREATE TABLE `dokumen_pendaftar` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `pendaftaran_id` int(10) UNSIGNED NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bukti_tabungan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bukti_setoran_bpih` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bukti_setoran_bipij` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ktp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kk` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `akte` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `dokumen_pendaftar`
--

INSERT INTO `dokumen_pendaftar` (`id`, `pendaftaran_id`, `image`, `bukti_tabungan`, `bukti_setoran_bpih`, `bukti_setoran_bipij`, `ktp`, `kk`, `akte`, `created_at`, `updated_at`) VALUES
(2, 2, 'pendaftar-images/Yg9zJZEu6LSoNEAw34qFTZ2pDMbbDB315zeqFpYF.jpg', 'berkas/GRqoviV4CirNt50ohC6ZDzYVtaNVsSXy9l61y5y5.pdf', 'berkas/JHgBwOGUxlCScJ7LowDybORWuZBbghhI2M7tRFh5.pdf', 'berkas/bfL9CGHa9AXJZi7xRr1WmkKjvzegzzNkzaW8yhAc.pdf', 'berkas/koDCuKcetUNWKzg6uCZNhiuKxGnjghtrL7HQKOwf.pdf', 'berkas/ehywV3RlZyVBwO60OPHpnp78uVg6WfvK2pk2x0fi.pdf', 'berkas/YxJweqJmZL3wxnrMcMqIeMOnmVpxN9ltlSObzuHM.pdf', '2023-07-19 03:52:55', '2023-07-19 03:52:55'),
(4, 7, 'pendaftar-images/oMLwqzsoe7KxAo4drpYWcnjtr6cDUK4BriOnYPLh.jpg', 'berkas/w0JBz8HElleI10WtcVkMgdpVoWdvm5m0TpbanUwW.pdf', 'berkas/R96Xl6I2mkn1Seq2r8MvyL20l05JyfqEdkEvIByh.pdf', 'berkas/Wsw3unT58WqsHCxrtKU6mGLHq4OCTjULGfMAClml.pdf', 'berkas/0ENFfTk2GFHuBv0VCZ3hBP5BooUs5DMtqoXsKWOj.pdf', 'berkas/3szcgWzw9ZwQz7wVIccHX2n75d0DyPRFbkjqfjEA.pdf', 'berkas/LrbHd9ZRV9cUgEx7tgstB3n5HRU0E5CohtaEM4VX.pdf', '2023-07-19 04:15:40', '2023-07-19 04:15:40');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_04_17_110813_create_syarat_table', 1),
(6, '2023_07_16_150324_create_pendaftaran_table', 1),
(7, '2023_07_16_150651_create_alamat_pendaftar_table', 1),
(8, '2023_07_16_150721_create_biodata_pendaftar_table', 1),
(9, '2023_07_16_150749_create_dokumen_pendaftar_table', 1),
(10, '2023_07_16_150831_create_paspor_pendaftar_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `paspor_pendaftar`
--

CREATE TABLE `paspor_pendaftar` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `pendaftaran_id` int(10) UNSIGNED NOT NULL,
  `no_paspor` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tempat_paspor_terbit` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_paspor_dibuat` date NOT NULL,
  `tanggal_akhir_paspor` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `paspor_pendaftar`
--

INSERT INTO `paspor_pendaftar` (`id`, `pendaftaran_id`, `no_paspor`, `tempat_paspor_terbit`, `tanggal_paspor_dibuat`, `tanggal_akhir_paspor`, `created_at`, `updated_at`) VALUES
(2, 2, '1234', 'Lampung', '2023-07-19', '2023-07-19', '2023-07-19 03:52:55', '2023-07-19 03:52:55'),
(4, 7, '1234', 'Lampung', '2023-07-13', '2023-07-19', '2023-07-19 04:15:39', '2023-07-19 04:15:39');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pendaftaran`
--

CREATE TABLE `pendaftaran` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `no_pendaftaran` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_lengkap` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tempat_lahir` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `jenis_kelamin` enum('laki-laki','perempuan') COLLATE utf8mb4_unicode_ci NOT NULL,
  `pekerjaan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pendidikan_terakhir` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_daftar` enum('haji','umroh') COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_pendaftaran` date NOT NULL,
  `tanggal_berangkat` date NOT NULL,
  `fasilitas_kamar` enum('double','triple','quad') COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_pendaftaran` enum('proses','diterima','ditolak') COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pendaftaran`
--

INSERT INTO `pendaftaran` (`id`, `user_id`, `no_pendaftaran`, `nama_lengkap`, `tempat_lahir`, `tanggal_lahir`, `jenis_kelamin`, `pekerjaan`, `pendidikan_terakhir`, `jenis_daftar`, `tanggal_pendaftaran`, `tanggal_berangkat`, `fasilitas_kamar`, `status_pendaftaran`, `keterangan`, `created_at`, `updated_at`) VALUES
(2, 2, 'P-19072023-9729', 'Niken Ambarwati', 'Jakarta', '2023-07-06', 'perempuan', 'Mahasiswa', 'D3', 'haji', '2023-07-19', '2023-06-27', 'quad', 'proses', '', '2023-07-19 03:52:55', '2023-07-19 03:52:55'),
(7, 4, 'P-19072023-5585', 'Nana Putri', 'Lampung', '2023-06-28', 'laki-laki', 'Singer', 'S1', 'haji', '2023-07-19', '2023-07-21', 'quad', 'proses', '', '2023-07-19 04:15:39', '2023-07-19 04:15:39');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `syarat`
--

CREATE TABLE `syarat` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `file_syarat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `level` enum('admin','user','pimpinan') COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_konfirmasi` enum('1','2','3') COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email`, `password`, `foto`, `level`, `status_konfirmasi`, `keterangan`, `created_at`, `updated_at`) VALUES
(1, 'Pajar Padillah', 'admin', 'admin@gmail.com', '$2y$10$nSC8iOKyWx9p0tEGjw4Q.uxpqSmLRTJIcgW2/mIdlzusEMQdI15Q6', NULL, 'admin', '2', 'Lengkap', '2023-07-19 03:25:00', '2023-07-19 03:25:00'),
(2, 'Niken Ambarwati', 'user', 'user@gmail.com', '$2y$10$zZAhO9wpXZfguoIR4N2sJeEg3wmMWiBCi/VZY3b6NmadO5j8r47dO', 'user-images/dqA4DlW3W3aGDrvOAryR6R43Um9CPYtBS1cWHhHq.jpg', 'user', '2', 'Oke Lengkap', '2023-07-19 03:25:00', '2023-07-19 03:31:54'),
(3, 'Yudi Eka', 'pimpinan', 'pimpinan@gmail.com', '$2y$10$qbz7t7rlz3HPvtgEPdw17uD.4BnRVjlTEM/oH2QHbgUEVIywcVndW', NULL, 'pimpinan', '2', 'Lengkap', '2023-07-19 03:25:00', '2023-07-19 03:25:00'),
(4, 'Nana Putri', 'user2', 'user2@gmail.com', '$2y$10$RWPcKcG//V3.DwuUcmUPhO5Q9Rkquqo22Je/ZqlR5/EOlVs69c4sq', NULL, 'user', '2', 'Oke', '2023-07-19 03:50:11', '2023-07-19 03:54:47');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alamat_pendaftar`
--
ALTER TABLE `alamat_pendaftar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `biodata_pendaftar`
--
ALTER TABLE `biodata_pendaftar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dokumen_pendaftar`
--
ALTER TABLE `dokumen_pendaftar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `paspor_pendaftar`
--
ALTER TABLE `paspor_pendaftar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `pendaftaran`
--
ALTER TABLE `pendaftaran`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `pendaftaran_no_pendaftaran_unique` (`no_pendaftaran`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `syarat`
--
ALTER TABLE `syarat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `alamat_pendaftar`
--
ALTER TABLE `alamat_pendaftar`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `biodata_pendaftar`
--
ALTER TABLE `biodata_pendaftar`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `dokumen_pendaftar`
--
ALTER TABLE `dokumen_pendaftar`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `paspor_pendaftar`
--
ALTER TABLE `paspor_pendaftar`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pendaftaran`
--
ALTER TABLE `pendaftaran`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `syarat`
--
ALTER TABLE `syarat`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
