-- phpMyAdmin SQL Dump
-- version 5.1.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 04, 2023 at 05:26 PM
-- Server version: 5.7.33
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `new_travel`
--

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `rental_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `mobil_id` int(11) NOT NULL,
  `driver_id` int(11) DEFAULT NULL,
  `tanggal_mulai` date NOT NULL,
  `tanggal_selesai` date NOT NULL,
  `is_status` enum('Dalam Pengantaran') COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kontraks`
--

CREATE TABLE `kontraks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `rental_id` int(11) NOT NULL,
  `perjanjian` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kontraks`
--

INSERT INTO `kontraks` (`id`, `rental_id`, `perjanjian`, `keterangan`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 1, '1683186790document.pdf', 'Keterangan', NULL, '2023-05-04 00:53:10', '2023-05-04 00:53:10');

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
(5, '2023_04_14_080411_create_permission_tables', 1),
(6, '2023_04_15_050941_create_rentals_table', 1),
(7, '2023_04_15_082359_create_mobils_table', 1),
(8, '2023_04_15_132900_create_carts_table', 1),
(9, '2023_04_15_134021_add_driver_to_carts', 1),
(10, '2023_04_16_073400_create_penyewaans_table', 1),
(11, '2023_04_16_075152_create_kontraks_table', 1),
(12, '2023_04_16_075225_create_persyaratans_table', 1),
(13, '2023_04_16_084320_create_pelanggans_table', 1),
(14, '2023_04_16_100512_add_softdeletes_to_penyewaans', 1),
(15, '2023_04_16_130425_add_statuspembayaran_to_penyewaans', 1),
(16, '2023_05_01_065951_create_pengantarans_table', 2),
(18, '2023_05_01_084019_add_keterangan_to_penyewaans', 3),
(19, '2023_05_01_071315_create_pengembalians_table', 4),
(21, '2023_05_02_060956_create_supirs_table', 5),
(22, '2023_05_02_063529_add_supirsid_to_mobils', 6),
(23, '2023_05_04_160723_add_perorangan_to_rentals', 7);

-- --------------------------------------------------------

--
-- Table structure for table `mobils`
--

CREATE TABLE `mobils` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `rental_id` int(11) NOT NULL,
  `supir_id` int(11) DEFAULT NULL,
  `tipe_mobil` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `merk_mobil` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_mobil` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `transmisi_mobil` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kapasitas_mobil` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `warna_mobil` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_bbm` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fasilitas_mobil` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `plat_mobil` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga_sewa_mobil` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto_mobil` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan_mobil` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_mobil` enum('tersedia','tidak tersedia') COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mobils`
--

INSERT INTO `mobils` (`id`, `rental_id`, `supir_id`, `tipe_mobil`, `merk_mobil`, `nama_mobil`, `transmisi_mobil`, `kapasitas_mobil`, `warna_mobil`, `jenis_bbm`, `fasilitas_mobil`, `plat_mobil`, `harga_sewa_mobil`, `foto_mobil`, `keterangan_mobil`, `status_mobil`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 1, NULL, 'Sport Sedan', 'Toyota', 'Minus quo quis quas', 'Automatic', 'Tenetur labore persp', 'Tempor ullam non qui', 'Solar', 'Deserunt esse disti', 'Aspernatur voluptas', '39', '1683122240Astro.png', 'Commodo officiis nul', 'tersedia', NULL, '2023-04-16 06:45:06', '2023-05-03 06:57:20'),
(2, 1, 1, 'LCGC', 'Honda', 'Honda Brio S 1.3 G', 'Manual', '3', 'Biru', 'Bensin', 'Fasilitas', 'KB 1111 HF', '230000', '1681652917LAMBORGHINI AVENTADOR LP 740-4.jpg', 'Keterangan', 'tersedia', NULL, '2023-04-16 06:48:37', '2023-05-01 23:39:29');

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 1),
(2, 'App\\Models\\User', 2),
(3, 'App\\Models\\User', 3),
(2, 'App\\Models\\User', 4),
(3, 'App\\Models\\User', 5),
(2, 'App\\Models\\User', 6);

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
-- Table structure for table `pelanggans`
--

CREATE TABLE `pelanggans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `nik` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_lengkap` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_telp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `latitude` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `longitude` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pelanggans`
--

INSERT INTO `pelanggans` (`id`, `user_id`, `nik`, `nama_lengkap`, `alamat`, `no_telp`, `foto`, `latitude`, `longitude`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 5, '6513215613', 'Agus', 'Jl Perdamaian', '62561981351', '1681652559.jpg', '-0.0372848', '109.3132381', NULL, '2023-04-16 06:42:39', '2023-04-16 06:42:39');

-- --------------------------------------------------------

--
-- Table structure for table `pengantarans`
--

CREATE TABLE `pengantarans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `penyewaan_id` int(11) NOT NULL,
  `tanggal_pengantaran` date NOT NULL,
  `keterangan` text COLLATE utf8mb4_unicode_ci,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pengantarans`
--

INSERT INTO `pengantarans` (`id`, `penyewaan_id`, `tanggal_pengantaran`, `keterangan`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 1, '2023-05-01', NULL, NULL, '2023-05-01 00:32:17', '2023-05-01 00:32:17'),
(2, 4, '2023-05-04', 'Sudah diantar dalam kondisi baik', NULL, '2023-05-04 01:23:04', '2023-05-04 01:23:04');

-- --------------------------------------------------------

--
-- Table structure for table `pengembalians`
--

CREATE TABLE `pengembalians` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `penyewaan_id` int(11) NOT NULL,
  `tanggal_pengembalian` date NOT NULL,
  `keterangan` text COLLATE utf8mb4_unicode_ci,
  `denda` int(11) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pengembalians`
--

INSERT INTO `pengembalians` (`id`, `penyewaan_id`, `tanggal_pengembalian`, `keterangan`, `denda`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 1, '2023-05-01', 'Mobil Lecet', NULL, NULL, '2023-05-01 01:45:27', '2023-05-01 01:45:27'),
(2, 4, '2023-05-04', 'Ada lecet Pemakaian', NULL, NULL, '2023-05-04 01:25:04', '2023-05-04 01:25:04');

-- --------------------------------------------------------

--
-- Table structure for table `penyewaans`
--

CREATE TABLE `penyewaans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `rental_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `mobil_id` int(11) NOT NULL,
  `supir_id` int(11) DEFAULT NULL,
  `tanggal_mulai` date NOT NULL,
  `tanggal_selesai` date NOT NULL,
  `total_hari` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `total_harga` int(11) NOT NULL,
  `pembayaran_awal` int(11) DEFAULT NULL,
  `sisa_pembayaran` int(11) DEFAULT NULL,
  `total_pembayaran` int(11) DEFAULT NULL,
  `is_status` enum('Keranjang','Dalam Persiapan','Sedang Digunakan','Sudah Dikembalikan','Dalam Pengantaran','Selesai Digunakan') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Keranjang',
  `keterangan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `denda` int(11) DEFAULT NULL,
  `is_pembayaran` enum('Belum Dibayar','Lunas','Belum Lunas') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Belum Dibayar',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `kd_invoice` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `penyewaans`
--

INSERT INTO `penyewaans` (`id`, `rental_id`, `customer_id`, `mobil_id`, `supir_id`, `tanggal_mulai`, `tanggal_selesai`, `total_hari`, `harga`, `total_harga`, `pembayaran_awal`, `sisa_pembayaran`, `total_pembayaran`, `is_status`, `keterangan`, `denda`, `is_pembayaran`, `created_at`, `updated_at`, `deleted_at`, `kd_invoice`) VALUES
(1, 1, 1, 1, NULL, '2023-04-16', '2023-04-18', 2, 150000, 300000, 120000, 180000, 120000, 'Sudah Dikembalikan', NULL, 0, 'Belum Lunas', '2023-04-16 07:26:00', '2023-05-01 01:45:27', NULL, 'INV-002-2023'),
(2, 1, 1, 1, NULL, '2023-04-16', '2023-04-18', 2, 150000, 300000, 150000, 150000, 150000, 'Dalam Persiapan', NULL, NULL, 'Belum Lunas', '2023-04-16 08:35:02', '2023-05-01 05:49:33', NULL, 'INV-003-2023'),
(3, 1, 1, 2, NULL, '2023-05-01', '2023-05-12', 11, 230000, 2530000, NULL, NULL, NULL, 'Keranjang', NULL, NULL, 'Belum Dibayar', '2023-05-04 00:41:33', '2023-05-04 00:41:33', NULL, NULL),
(4, 1, 1, 2, NULL, '2023-05-03', '2023-05-06', 3, 230000, 690000, 0, 0, 690000, 'Sudah Dikembalikan', NULL, 0, 'Lunas', '2023-05-04 01:16:42', '2023-05-04 01:25:04', NULL, 'INV-005-2023');

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `persyaratans`
--

CREATE TABLE `persyaratans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `rental_id` int(11) NOT NULL,
  `persyaratan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `persyaratans`
--

INSERT INTO `persyaratans` (`id`, `rental_id`, `persyaratan`, `keterangan`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 1, '1683186814test.pdf', 'Persyaratan', NULL, '2023-05-04 00:53:34', '2023-05-04 00:53:34');

-- --------------------------------------------------------

--
-- Table structure for table `rentals`
--

CREATE TABLE `rentals` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `nama_pemilik` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_rental` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tipe` enum('rental','perorangan') COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_ijin_usaha` bigint(20) NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `latitude` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `longitude` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto_rental` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rentals`
--

INSERT INTO `rentals` (`id`, `user_id`, `nama_pemilik`, `nama_rental`, `tipe`, `no_ijin_usaha`, `alamat`, `latitude`, `longitude`, `foto_rental`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 4, 'Febryan Caesar Pratama', 'Anzon Autoplaza', 'rental', 6132, 'Jalan Kota Baru', '-0.0372848', '109.3142381', '1681652436.jpg', NULL, '2023-04-16 06:40:37', '2023-04-16 06:40:37'),
(2, 6, 'Pemilik Perorangan', 'Rental Perorangan', 'perorangan', 456132, 'Jalan Tanjung Kota', '-0.0372854', '109.3132668', '1683218646.jpg', NULL, '2023-05-04 09:44:06', '2023-05-04 09:44:06');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'web', '2023-04-16 06:06:44', '2023-04-16 06:06:44'),
(2, 'rental', 'web', '2023-04-16 06:06:44', '2023-04-16 06:06:44'),
(3, 'user', 'web', '2023-04-16 06:06:44', '2023-04-16 06:06:44');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `supirs`
--

CREATE TABLE `supirs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `rental_id` int(11) NOT NULL,
  `nama_supir` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_hp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'default.jpg',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `supirs`
--

INSERT INTO `supirs` (`id`, `rental_id`, `nama_supir`, `no_hp`, `alamat`, `foto`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 1, 'Pengemudi1', '8061321', 'Jalan Kota Baru', '1683008416284442882_730475798373203_8737664915737340446_n.jpg', NULL, '2023-05-01 23:20:16', '2023-05-01 23:20:16');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_active` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `is_active`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@admin.com', NULL, '$2y$10$SqRFCqGmBrm074iJy1ljYucXxkI9OQFiSXg62pn4xSDNcFZDH9Mhi', NULL, '0', NULL, '2023-04-16 06:06:44', '2023-04-16 06:06:44'),
(2, 'Rental', 'rental@rental.com', NULL, '$2y$10$lH81qhf/.s5vx2ELDIDBIOpuNadNcWGSOvqPZfA.lZcNrLm0EBNeK', NULL, '0', NULL, '2023-04-16 06:06:44', '2023-04-16 06:06:44'),
(3, 'User', 'user@user.com', NULL, '$2y$10$E.4rBxfhxFqEIPCKMLvxZul7aiIqcRIvt5.GdsQglA.WeF9XAZb/G', NULL, '0', NULL, '2023-04-16 06:06:44', '2023-04-16 06:06:44'),
(4, 'Febryan Caesar Pratama', 'rental@testing.com', NULL, '$2y$10$7bLeOaULFpFN1NPLAxd.eOkY4JmeBKQvoN.FZ2qA2RV4.MTdVTzVm', NULL, '1', NULL, '2023-04-16 06:40:36', '2023-05-04 09:47:10'),
(5, 'Agus', 'user@testing.com', NULL, '$2y$10$Z3iI0AT9H.0I3fKRlh9/2urp3A6FzN4cVq2RJNnsgkUI4U5lrFL0.', NULL, '0', NULL, '2023-04-16 06:42:39', '2023-04-16 06:42:39'),
(6, 'Pemilik Perorangan', 'rental@perorangan.com', NULL, '$2y$10$SqRFCqGmBrm074iJy1ljYucXxkI9OQFiSXg62pn4xSDNcFZDH9Mhi', NULL, '1', NULL, '2023-05-04 09:44:06', '2023-05-04 09:47:05');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `kontraks`
--
ALTER TABLE `kontraks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mobils`
--
ALTER TABLE `mobils`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `pelanggans`
--
ALTER TABLE `pelanggans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pengantarans`
--
ALTER TABLE `pengantarans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pengembalians`
--
ALTER TABLE `pengembalians`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `penyewaans`
--
ALTER TABLE `penyewaans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `persyaratans`
--
ALTER TABLE `persyaratans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rentals`
--
ALTER TABLE `rentals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `supirs`
--
ALTER TABLE `supirs`
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
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kontraks`
--
ALTER TABLE `kontraks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `mobils`
--
ALTER TABLE `mobils`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pelanggans`
--
ALTER TABLE `pelanggans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pengantarans`
--
ALTER TABLE `pengantarans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pengembalians`
--
ALTER TABLE `pengembalians`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `penyewaans`
--
ALTER TABLE `penyewaans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `persyaratans`
--
ALTER TABLE `persyaratans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `rentals`
--
ALTER TABLE `rentals`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `supirs`
--
ALTER TABLE `supirs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
