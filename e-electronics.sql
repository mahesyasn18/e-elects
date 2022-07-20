-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 31 Bulan Mei 2021 pada 08.25
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `e-electronics`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `addresses`
--

CREATE TABLE `addresses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `no_hp` bigint(20) NOT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kecamatan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_provinces` bigint(20) UNSIGNED NOT NULL,
  `id_cities` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `addresses`
--

INSERT INTO `addresses` (`id`, `user_id`, `no_hp`, `alamat`, `kecamatan`, `id_provinces`, `id_cities`, `created_at`, `updated_at`) VALUES
(1, 1, 8822211, 'Jalan Astana Anyar No 324', 'Nyengseret', 1, 1, '2021-05-31 06:24:33', '2021-05-31 06:24:33');

-- --------------------------------------------------------

--
-- Struktur dari tabel `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `admins`
--

INSERT INTO `admins` (`id`, `name`, `username`, `password`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Michael', 'admin', '$2y$10$0L1edYKlD7TC7V5JvPlGNe4sY121Z9lF/xGFWGvmoPK3/DCMa2dqm', 'admin', '2021-05-31 06:24:29', '2021-05-31 06:24:29');

-- --------------------------------------------------------

--
-- Struktur dari tabel `answers`
--

CREATE TABLE `answers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `question_id` bigint(20) UNSIGNED NOT NULL,
  `body` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `categories`
--

INSERT INTO `categories` (`id`, `category`, `created_at`, `updated_at`) VALUES
(1, 'New', '2021-05-31 06:24:33', '2021-05-31 06:24:33'),
(2, 'Second', '2021-05-31 06:24:33', '2021-05-31 06:24:33'),
(3, 'Samsung', '2021-05-31 06:24:33', '2021-05-31 06:24:33'),
(4, 'S Series', '2021-05-31 06:24:33', '2021-05-31 06:24:33'),
(5, 'M Series', '2021-05-31 06:24:33', '2021-05-31 06:24:33'),
(6, 'A Series', '2021-05-31 06:24:33', '2021-05-31 06:24:33'),
(7, 'J Series', '2021-05-31 06:24:33', '2021-05-31 06:24:33'),
(8, 'Note Series', '2021-05-31 06:24:33', '2021-05-31 06:24:33'),
(9, 'iPhone', '2021-05-31 06:24:33', '2021-05-31 06:24:33'),
(10, '7 Series', '2021-05-31 06:24:33', '2021-05-31 06:24:33'),
(11, '8 Series', '2021-05-31 06:24:33', '2021-05-31 06:24:33'),
(12, '10 Series', '2021-05-31 06:24:33', '2021-05-31 06:24:33'),
(13, '11 Series', '2021-05-31 06:24:33', '2021-05-31 06:24:33'),
(14, '12 Series', '2021-05-31 06:24:33', '2021-05-31 06:24:33');

-- --------------------------------------------------------

--
-- Struktur dari tabel `category_product`
--

CREATE TABLE `category_product` (
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `cities`
--

CREATE TABLE `cities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `province_id` int(11) NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `cities`
--

INSERT INTO `cities` (`id`, `province_id`, `type`, `city_name`, `created_at`, `updated_at`) VALUES
(1, 21, 'Kabupaten', 'Aceh Barat', NULL, NULL),
(2, 21, 'Kabupaten', 'Aceh Barat Daya', NULL, NULL),
(3, 21, 'Kabupaten', 'Aceh Besar', NULL, NULL),
(4, 21, 'Kabupaten', 'Aceh Jaya', NULL, NULL),
(5, 21, 'Kabupaten', 'Aceh Selatan', NULL, NULL),
(6, 21, 'Kabupaten', 'Aceh Singkil', NULL, NULL),
(7, 21, 'Kabupaten', 'Aceh Tamiang', NULL, NULL),
(8, 21, 'Kabupaten', 'Aceh Tengah', NULL, NULL),
(9, 21, 'Kabupaten', 'Aceh Tenggara', NULL, NULL),
(10, 21, 'Kabupaten', 'Aceh Timur', NULL, NULL),
(11, 21, 'Kabupaten', 'Aceh Utara', NULL, NULL),
(12, 32, 'Kabupaten', 'Agam', NULL, NULL),
(13, 23, 'Kabupaten', 'Alor', NULL, NULL),
(14, 19, 'Kota', 'Ambon', NULL, NULL),
(15, 34, 'Kabupaten', 'Asahan', NULL, NULL),
(16, 24, 'Kabupaten', 'Asmat', NULL, NULL),
(17, 1, 'Kabupaten', 'Badung', NULL, NULL),
(18, 13, 'Kabupaten', 'Balangan', NULL, NULL),
(19, 15, 'Kota', 'Balikpapan', NULL, NULL),
(20, 21, 'Kota', 'Banda Aceh', NULL, NULL),
(21, 18, 'Kota', 'Bandar Lampung', NULL, NULL),
(22, 9, 'Kabupaten', 'Bandung', NULL, NULL),
(23, 9, 'Kota', 'Bandung', NULL, NULL),
(24, 9, 'Kabupaten', 'Bandung Barat', NULL, NULL),
(25, 29, 'Kabupaten', 'Banggai', NULL, NULL),
(26, 29, 'Kabupaten', 'Banggai Kepulauan', NULL, NULL),
(27, 2, 'Kabupaten', 'Bangka', NULL, NULL),
(28, 2, 'Kabupaten', 'Bangka Barat', NULL, NULL),
(29, 2, 'Kabupaten', 'Bangka Selatan', NULL, NULL),
(30, 2, 'Kabupaten', 'Bangka Tengah', NULL, NULL),
(31, 11, 'Kabupaten', 'Bangkalan', NULL, NULL),
(32, 1, 'Kabupaten', 'Bangli', NULL, NULL),
(33, 13, 'Kabupaten', 'Banjar', NULL, NULL),
(34, 9, 'Kota', 'Banjar', NULL, NULL),
(35, 13, 'Kota', 'Banjarbaru', NULL, NULL),
(36, 13, 'Kota', 'Banjarmasin', NULL, NULL),
(37, 10, 'Kabupaten', 'Banjarnegara', NULL, NULL),
(38, 28, 'Kabupaten', 'Bantaeng', NULL, NULL),
(39, 5, 'Kabupaten', 'Bantul', NULL, NULL),
(40, 33, 'Kabupaten', 'Banyuasin', NULL, NULL),
(41, 10, 'Kabupaten', 'Banyumas', NULL, NULL),
(42, 11, 'Kabupaten', 'Banyuwangi', NULL, NULL),
(43, 13, 'Kabupaten', 'Barito Kuala', NULL, NULL),
(44, 14, 'Kabupaten', 'Barito Selatan', NULL, NULL),
(45, 14, 'Kabupaten', 'Barito Timur', NULL, NULL),
(46, 14, 'Kabupaten', 'Barito Utara', NULL, NULL),
(47, 28, 'Kabupaten', 'Barru', NULL, NULL),
(48, 17, 'Kota', 'Batam', NULL, NULL),
(49, 10, 'Kabupaten', 'Batang', NULL, NULL),
(50, 8, 'Kabupaten', 'Batang Hari', NULL, NULL),
(51, 11, 'Kota', 'Batu', NULL, NULL),
(52, 34, 'Kabupaten', 'Batu Bara', NULL, NULL),
(53, 30, 'Kota', 'Bau-Bau', NULL, NULL),
(54, 9, 'Kabupaten', 'Bekasi', NULL, NULL),
(55, 9, 'Kota', 'Bekasi', NULL, NULL),
(56, 2, 'Kabupaten', 'Belitung', NULL, NULL),
(57, 2, 'Kabupaten', 'Belitung Timur', NULL, NULL),
(58, 23, 'Kabupaten', 'Belu', NULL, NULL),
(59, 21, 'Kabupaten', 'Bener Meriah', NULL, NULL),
(60, 26, 'Kabupaten', 'Bengkalis', NULL, NULL),
(61, 12, 'Kabupaten', 'Bengkayang', NULL, NULL),
(62, 4, 'Kota', 'Bengkulu', NULL, NULL),
(63, 4, 'Kabupaten', 'Bengkulu Selatan', NULL, NULL),
(64, 4, 'Kabupaten', 'Bengkulu Tengah', NULL, NULL),
(65, 4, 'Kabupaten', 'Bengkulu Utara', NULL, NULL),
(66, 15, 'Kabupaten', 'Berau', NULL, NULL),
(67, 24, 'Kabupaten', 'Biak Numfor', NULL, NULL),
(68, 22, 'Kabupaten', 'Bima', NULL, NULL),
(69, 22, 'Kota', 'Bima', NULL, NULL),
(70, 34, 'Kota', 'Binjai', NULL, NULL),
(71, 17, 'Kabupaten', 'Bintan', NULL, NULL),
(72, 21, 'Kabupaten', 'Bireuen', NULL, NULL),
(73, 31, 'Kota', 'Bitung', NULL, NULL),
(74, 11, 'Kabupaten', 'Blitar', NULL, NULL),
(75, 11, 'Kota', 'Blitar', NULL, NULL),
(76, 10, 'Kabupaten', 'Blora', NULL, NULL),
(77, 7, 'Kabupaten', 'Boalemo', NULL, NULL),
(78, 9, 'Kabupaten', 'Bogor', NULL, NULL),
(79, 9, 'Kota', 'Bogor', NULL, NULL),
(80, 11, 'Kabupaten', 'Bojonegoro', NULL, NULL),
(81, 31, 'Kabupaten', 'Bolaang Mongondow (Bolmong)', NULL, NULL),
(82, 31, 'Kabupaten', 'Bolaang Mongondow Selatan', NULL, NULL),
(83, 31, 'Kabupaten', 'Bolaang Mongondow Timur', NULL, NULL),
(84, 31, 'Kabupaten', 'Bolaang Mongondow Utara', NULL, NULL),
(85, 30, 'Kabupaten', 'Bombana', NULL, NULL),
(86, 11, 'Kabupaten', 'Bondowoso', NULL, NULL),
(87, 28, 'Kabupaten', 'Bone', NULL, NULL),
(88, 7, 'Kabupaten', 'Bone Bolango', NULL, NULL),
(89, 15, 'Kota', 'Bontang', NULL, NULL),
(90, 24, 'Kabupaten', 'Boven Digoel', NULL, NULL),
(91, 10, 'Kabupaten', 'Boyolali', NULL, NULL),
(92, 10, 'Kabupaten', 'Brebes', NULL, NULL),
(93, 32, 'Kota', 'Bukittinggi', NULL, NULL),
(94, 1, 'Kabupaten', 'Buleleng', NULL, NULL),
(95, 28, 'Kabupaten', 'Bulukumba', NULL, NULL),
(96, 16, 'Kabupaten', 'Bulungan (Bulongan)', NULL, NULL),
(97, 8, 'Kabupaten', 'Bungo', NULL, NULL),
(98, 29, 'Kabupaten', 'Buol', NULL, NULL),
(99, 19, 'Kabupaten', 'Buru', NULL, NULL),
(100, 19, 'Kabupaten', 'Buru Selatan', NULL, NULL),
(101, 30, 'Kabupaten', 'Buton', NULL, NULL),
(102, 30, 'Kabupaten', 'Buton Utara', NULL, NULL),
(103, 9, 'Kabupaten', 'Ciamis', NULL, NULL),
(104, 9, 'Kabupaten', 'Cianjur', NULL, NULL),
(105, 10, 'Kabupaten', 'Cilacap', NULL, NULL),
(106, 3, 'Kota', 'Cilegon', NULL, NULL),
(107, 9, 'Kota', 'Cimahi', NULL, NULL),
(108, 9, 'Kabupaten', 'Cirebon', NULL, NULL),
(109, 9, 'Kota', 'Cirebon', NULL, NULL),
(110, 34, 'Kabupaten', 'Dairi', NULL, NULL),
(111, 24, 'Kabupaten', 'Deiyai (Deliyai)', NULL, NULL),
(112, 34, 'Kabupaten', 'Deli Serdang', NULL, NULL),
(113, 10, 'Kabupaten', 'Demak', NULL, NULL),
(114, 1, 'Kota', 'Denpasar', NULL, NULL),
(115, 9, 'Kota', 'Depok', NULL, NULL),
(116, 32, 'Kabupaten', 'Dharmasraya', NULL, NULL),
(117, 24, 'Kabupaten', 'Dogiyai', NULL, NULL),
(118, 22, 'Kabupaten', 'Dompu', NULL, NULL),
(119, 29, 'Kabupaten', 'Donggala', NULL, NULL),
(120, 26, 'Kota', 'Dumai', NULL, NULL),
(121, 33, 'Kabupaten', 'Empat Lawang', NULL, NULL),
(122, 23, 'Kabupaten', 'Ende', NULL, NULL),
(123, 28, 'Kabupaten', 'Enrekang', NULL, NULL),
(124, 25, 'Kabupaten', 'Fakfak', NULL, NULL),
(125, 23, 'Kabupaten', 'Flores Timur', NULL, NULL),
(126, 9, 'Kabupaten', 'Garut', NULL, NULL),
(127, 21, 'Kabupaten', 'Gayo Lues', NULL, NULL),
(128, 1, 'Kabupaten', 'Gianyar', NULL, NULL),
(129, 7, 'Kabupaten', 'Gorontalo', NULL, NULL),
(130, 7, 'Kota', 'Gorontalo', NULL, NULL),
(131, 7, 'Kabupaten', 'Gorontalo Utara', NULL, NULL),
(132, 28, 'Kabupaten', 'Gowa', NULL, NULL),
(133, 11, 'Kabupaten', 'Gresik', NULL, NULL),
(134, 10, 'Kabupaten', 'Grobogan', NULL, NULL),
(135, 5, 'Kabupaten', 'Gunung Kidul', NULL, NULL),
(136, 14, 'Kabupaten', 'Gunung Mas', NULL, NULL),
(137, 34, 'Kota', 'Gunungsitoli', NULL, NULL),
(138, 20, 'Kabupaten', 'Halmahera Barat', NULL, NULL),
(139, 20, 'Kabupaten', 'Halmahera Selatan', NULL, NULL),
(140, 20, 'Kabupaten', 'Halmahera Tengah', NULL, NULL),
(141, 20, 'Kabupaten', 'Halmahera Timur', NULL, NULL),
(142, 20, 'Kabupaten', 'Halmahera Utara', NULL, NULL),
(143, 13, 'Kabupaten', 'Hulu Sungai Selatan', NULL, NULL),
(144, 13, 'Kabupaten', 'Hulu Sungai Tengah', NULL, NULL),
(145, 13, 'Kabupaten', 'Hulu Sungai Utara', NULL, NULL),
(146, 34, 'Kabupaten', 'Humbang Hasundutan', NULL, NULL),
(147, 26, 'Kabupaten', 'Indragiri Hilir', NULL, NULL),
(148, 26, 'Kabupaten', 'Indragiri Hulu', NULL, NULL),
(149, 9, 'Kabupaten', 'Indramayu', NULL, NULL),
(150, 24, 'Kabupaten', 'Intan Jaya', NULL, NULL),
(151, 6, 'Kota', 'Jakarta Barat', NULL, NULL),
(152, 6, 'Kota', 'Jakarta Pusat', NULL, NULL),
(153, 6, 'Kota', 'Jakarta Selatan', NULL, NULL),
(154, 6, 'Kota', 'Jakarta Timur', NULL, NULL),
(155, 6, 'Kota', 'Jakarta Utara', NULL, NULL),
(156, 8, 'Kota', 'Jambi', NULL, NULL),
(157, 24, 'Kabupaten', 'Jayapura', NULL, NULL),
(158, 24, 'Kota', 'Jayapura', NULL, NULL),
(159, 24, 'Kabupaten', 'Jayawijaya', NULL, NULL),
(160, 11, 'Kabupaten', 'Jember', NULL, NULL),
(161, 1, 'Kabupaten', 'Jembrana', NULL, NULL),
(162, 28, 'Kabupaten', 'Jeneponto', NULL, NULL),
(163, 10, 'Kabupaten', 'Jepara', NULL, NULL),
(164, 11, 'Kabupaten', 'Jombang', NULL, NULL),
(165, 25, 'Kabupaten', 'Kaimana', NULL, NULL),
(166, 26, 'Kabupaten', 'Kampar', NULL, NULL),
(167, 14, 'Kabupaten', 'Kapuas', NULL, NULL),
(168, 12, 'Kabupaten', 'Kapuas Hulu', NULL, NULL),
(169, 10, 'Kabupaten', 'Karanganyar', NULL, NULL),
(170, 1, 'Kabupaten', 'Karangasem', NULL, NULL),
(171, 9, 'Kabupaten', 'Karawang', NULL, NULL),
(172, 17, 'Kabupaten', 'Karimun', NULL, NULL),
(173, 34, 'Kabupaten', 'Karo', NULL, NULL),
(174, 14, 'Kabupaten', 'Katingan', NULL, NULL),
(175, 4, 'Kabupaten', 'Kaur', NULL, NULL),
(176, 12, 'Kabupaten', 'Kayong Utara', NULL, NULL),
(177, 10, 'Kabupaten', 'Kebumen', NULL, NULL),
(178, 11, 'Kabupaten', 'Kediri', NULL, NULL),
(179, 11, 'Kota', 'Kediri', NULL, NULL),
(180, 24, 'Kabupaten', 'Keerom', NULL, NULL),
(181, 10, 'Kabupaten', 'Kendal', NULL, NULL),
(182, 30, 'Kota', 'Kendari', NULL, NULL),
(183, 4, 'Kabupaten', 'Kepahiang', NULL, NULL),
(184, 17, 'Kabupaten', 'Kepulauan Anambas', NULL, NULL),
(185, 19, 'Kabupaten', 'Kepulauan Aru', NULL, NULL),
(186, 32, 'Kabupaten', 'Kepulauan Mentawai', NULL, NULL),
(187, 26, 'Kabupaten', 'Kepulauan Meranti', NULL, NULL),
(188, 31, 'Kabupaten', 'Kepulauan Sangihe', NULL, NULL),
(189, 6, 'Kabupaten', 'Kepulauan Seribu', NULL, NULL),
(190, 31, 'Kabupaten', 'Kepulauan Siau Tagulandang Biaro (Sitaro)', NULL, NULL),
(191, 20, 'Kabupaten', 'Kepulauan Sula', NULL, NULL),
(192, 31, 'Kabupaten', 'Kepulauan Talaud', NULL, NULL),
(193, 24, 'Kabupaten', 'Kepulauan Yapen (Yapen Waropen)', NULL, NULL),
(194, 8, 'Kabupaten', 'Kerinci', NULL, NULL),
(195, 12, 'Kabupaten', 'Ketapang', NULL, NULL),
(196, 10, 'Kabupaten', 'Klaten', NULL, NULL),
(197, 1, 'Kabupaten', 'Klungkung', NULL, NULL),
(198, 30, 'Kabupaten', 'Kolaka', NULL, NULL),
(199, 30, 'Kabupaten', 'Kolaka Utara', NULL, NULL),
(200, 30, 'Kabupaten', 'Konawe', NULL, NULL),
(201, 30, 'Kabupaten', 'Konawe Selatan', NULL, NULL),
(202, 30, 'Kabupaten', 'Konawe Utara', NULL, NULL),
(203, 13, 'Kabupaten', 'Kotabaru', NULL, NULL),
(204, 31, 'Kota', 'Kotamobagu', NULL, NULL),
(205, 14, 'Kabupaten', 'Kotawaringin Barat', NULL, NULL),
(206, 14, 'Kabupaten', 'Kotawaringin Timur', NULL, NULL),
(207, 26, 'Kabupaten', 'Kuantan Singingi', NULL, NULL),
(208, 12, 'Kabupaten', 'Kubu Raya', NULL, NULL),
(209, 10, 'Kabupaten', 'Kudus', NULL, NULL),
(210, 5, 'Kabupaten', 'Kulon Progo', NULL, NULL),
(211, 9, 'Kabupaten', 'Kuningan', NULL, NULL),
(212, 23, 'Kabupaten', 'Kupang', NULL, NULL),
(213, 23, 'Kota', 'Kupang', NULL, NULL),
(214, 15, 'Kabupaten', 'Kutai Barat', NULL, NULL),
(215, 15, 'Kabupaten', 'Kutai Kartanegara', NULL, NULL),
(216, 15, 'Kabupaten', 'Kutai Timur', NULL, NULL),
(217, 34, 'Kabupaten', 'Labuhan Batu', NULL, NULL),
(218, 34, 'Kabupaten', 'Labuhan Batu Selatan', NULL, NULL),
(219, 34, 'Kabupaten', 'Labuhan Batu Utara', NULL, NULL),
(220, 33, 'Kabupaten', 'Lahat', NULL, NULL),
(221, 14, 'Kabupaten', 'Lamandau', NULL, NULL),
(222, 11, 'Kabupaten', 'Lamongan', NULL, NULL),
(223, 18, 'Kabupaten', 'Lampung Barat', NULL, NULL),
(224, 18, 'Kabupaten', 'Lampung Selatan', NULL, NULL),
(225, 18, 'Kabupaten', 'Lampung Tengah', NULL, NULL),
(226, 18, 'Kabupaten', 'Lampung Timur', NULL, NULL),
(227, 18, 'Kabupaten', 'Lampung Utara', NULL, NULL),
(228, 12, 'Kabupaten', 'Landak', NULL, NULL),
(229, 34, 'Kabupaten', 'Langkat', NULL, NULL),
(230, 21, 'Kota', 'Langsa', NULL, NULL),
(231, 24, 'Kabupaten', 'Lanny Jaya', NULL, NULL),
(232, 3, 'Kabupaten', 'Lebak', NULL, NULL),
(233, 4, 'Kabupaten', 'Lebong', NULL, NULL),
(234, 23, 'Kabupaten', 'Lembata', NULL, NULL),
(235, 21, 'Kota', 'Lhokseumawe', NULL, NULL),
(236, 32, 'Kabupaten', 'Lima Puluh Koto/Kota', NULL, NULL),
(237, 17, 'Kabupaten', 'Lingga', NULL, NULL),
(238, 22, 'Kabupaten', 'Lombok Barat', NULL, NULL),
(239, 22, 'Kabupaten', 'Lombok Tengah', NULL, NULL),
(240, 22, 'Kabupaten', 'Lombok Timur', NULL, NULL),
(241, 22, 'Kabupaten', 'Lombok Utara', NULL, NULL),
(242, 33, 'Kota', 'Lubuk Linggau', NULL, NULL),
(243, 11, 'Kabupaten', 'Lumajang', NULL, NULL),
(244, 28, 'Kabupaten', 'Luwu', NULL, NULL),
(245, 28, 'Kabupaten', 'Luwu Timur', NULL, NULL),
(246, 28, 'Kabupaten', 'Luwu Utara', NULL, NULL),
(247, 11, 'Kabupaten', 'Madiun', NULL, NULL),
(248, 11, 'Kota', 'Madiun', NULL, NULL),
(249, 10, 'Kabupaten', 'Magelang', NULL, NULL),
(250, 10, 'Kota', 'Magelang', NULL, NULL),
(251, 11, 'Kabupaten', 'Magetan', NULL, NULL),
(252, 9, 'Kabupaten', 'Majalengka', NULL, NULL),
(253, 27, 'Kabupaten', 'Majene', NULL, NULL),
(254, 28, 'Kota', 'Makassar', NULL, NULL),
(255, 11, 'Kabupaten', 'Malang', NULL, NULL),
(256, 11, 'Kota', 'Malang', NULL, NULL),
(257, 16, 'Kabupaten', 'Malinau', NULL, NULL),
(258, 19, 'Kabupaten', 'Maluku Barat Daya', NULL, NULL),
(259, 19, 'Kabupaten', 'Maluku Tengah', NULL, NULL),
(260, 19, 'Kabupaten', 'Maluku Tenggara', NULL, NULL),
(261, 19, 'Kabupaten', 'Maluku Tenggara Barat', NULL, NULL),
(262, 27, 'Kabupaten', 'Mamasa', NULL, NULL),
(263, 24, 'Kabupaten', 'Mamberamo Raya', NULL, NULL),
(264, 24, 'Kabupaten', 'Mamberamo Tengah', NULL, NULL),
(265, 27, 'Kabupaten', 'Mamuju', NULL, NULL),
(266, 27, 'Kabupaten', 'Mamuju Utara', NULL, NULL),
(267, 31, 'Kota', 'Manado', NULL, NULL),
(268, 34, 'Kabupaten', 'Mandailing Natal', NULL, NULL),
(269, 23, 'Kabupaten', 'Manggarai', NULL, NULL),
(270, 23, 'Kabupaten', 'Manggarai Barat', NULL, NULL),
(271, 23, 'Kabupaten', 'Manggarai Timur', NULL, NULL),
(272, 25, 'Kabupaten', 'Manokwari', NULL, NULL),
(273, 25, 'Kabupaten', 'Manokwari Selatan', NULL, NULL),
(274, 24, 'Kabupaten', 'Mappi', NULL, NULL),
(275, 28, 'Kabupaten', 'Maros', NULL, NULL),
(276, 22, 'Kota', 'Mataram', NULL, NULL),
(277, 25, 'Kabupaten', 'Maybrat', NULL, NULL),
(278, 34, 'Kota', 'Medan', NULL, NULL),
(279, 12, 'Kabupaten', 'Melawi', NULL, NULL),
(280, 8, 'Kabupaten', 'Merangin', NULL, NULL),
(281, 24, 'Kabupaten', 'Merauke', NULL, NULL),
(282, 18, 'Kabupaten', 'Mesuji', NULL, NULL),
(283, 18, 'Kota', 'Metro', NULL, NULL),
(284, 24, 'Kabupaten', 'Mimika', NULL, NULL),
(285, 31, 'Kabupaten', 'Minahasa', NULL, NULL),
(286, 31, 'Kabupaten', 'Minahasa Selatan', NULL, NULL),
(287, 31, 'Kabupaten', 'Minahasa Tenggara', NULL, NULL),
(288, 31, 'Kabupaten', 'Minahasa Utara', NULL, NULL),
(289, 11, 'Kabupaten', 'Mojokerto', NULL, NULL),
(290, 11, 'Kota', 'Mojokerto', NULL, NULL),
(291, 29, 'Kabupaten', 'Morowali', NULL, NULL),
(292, 33, 'Kabupaten', 'Muara Enim', NULL, NULL),
(293, 8, 'Kabupaten', 'Muaro Jambi', NULL, NULL),
(294, 4, 'Kabupaten', 'Muko Muko', NULL, NULL),
(295, 30, 'Kabupaten', 'Muna', NULL, NULL),
(296, 14, 'Kabupaten', 'Murung Raya', NULL, NULL),
(297, 33, 'Kabupaten', 'Musi Banyuasin', NULL, NULL),
(298, 33, 'Kabupaten', 'Musi Rawas', NULL, NULL),
(299, 24, 'Kabupaten', 'Nabire', NULL, NULL),
(300, 21, 'Kabupaten', 'Nagan Raya', NULL, NULL),
(301, 23, 'Kabupaten', 'Nagekeo', NULL, NULL),
(302, 17, 'Kabupaten', 'Natuna', NULL, NULL),
(303, 24, 'Kabupaten', 'Nduga', NULL, NULL),
(304, 23, 'Kabupaten', 'Ngada', NULL, NULL),
(305, 11, 'Kabupaten', 'Nganjuk', NULL, NULL),
(306, 11, 'Kabupaten', 'Ngawi', NULL, NULL),
(307, 34, 'Kabupaten', 'Nias', NULL, NULL),
(308, 34, 'Kabupaten', 'Nias Barat', NULL, NULL),
(309, 34, 'Kabupaten', 'Nias Selatan', NULL, NULL),
(310, 34, 'Kabupaten', 'Nias Utara', NULL, NULL),
(311, 16, 'Kabupaten', 'Nunukan', NULL, NULL),
(312, 33, 'Kabupaten', 'Ogan Ilir', NULL, NULL),
(313, 33, 'Kabupaten', 'Ogan Komering Ilir', NULL, NULL),
(314, 33, 'Kabupaten', 'Ogan Komering Ulu', NULL, NULL),
(315, 33, 'Kabupaten', 'Ogan Komering Ulu Selatan', NULL, NULL),
(316, 33, 'Kabupaten', 'Ogan Komering Ulu Timur', NULL, NULL),
(317, 11, 'Kabupaten', 'Pacitan', NULL, NULL),
(318, 32, 'Kota', 'Padang', NULL, NULL),
(319, 34, 'Kabupaten', 'Padang Lawas', NULL, NULL),
(320, 34, 'Kabupaten', 'Padang Lawas Utara', NULL, NULL),
(321, 32, 'Kota', 'Padang Panjang', NULL, NULL),
(322, 32, 'Kabupaten', 'Padang Pariaman', NULL, NULL),
(323, 34, 'Kota', 'Padang Sidempuan', NULL, NULL),
(324, 33, 'Kota', 'Pagar Alam', NULL, NULL),
(325, 34, 'Kabupaten', 'Pakpak Bharat', NULL, NULL),
(326, 14, 'Kota', 'Palangka Raya', NULL, NULL),
(327, 33, 'Kota', 'Palembang', NULL, NULL),
(328, 28, 'Kota', 'Palopo', NULL, NULL),
(329, 29, 'Kota', 'Palu', NULL, NULL),
(330, 11, 'Kabupaten', 'Pamekasan', NULL, NULL),
(331, 3, 'Kabupaten', 'Pandeglang', NULL, NULL),
(332, 9, 'Kabupaten', 'Pangandaran', NULL, NULL),
(333, 28, 'Kabupaten', 'Pangkajene Kepulauan', NULL, NULL),
(334, 2, 'Kota', 'Pangkal Pinang', NULL, NULL),
(335, 24, 'Kabupaten', 'Paniai', NULL, NULL),
(336, 28, 'Kota', 'Parepare', NULL, NULL),
(337, 32, 'Kota', 'Pariaman', NULL, NULL),
(338, 29, 'Kabupaten', 'Parigi Moutong', NULL, NULL),
(339, 32, 'Kabupaten', 'Pasaman', NULL, NULL),
(340, 32, 'Kabupaten', 'Pasaman Barat', NULL, NULL),
(341, 15, 'Kabupaten', 'Paser', NULL, NULL),
(342, 11, 'Kabupaten', 'Pasuruan', NULL, NULL),
(343, 11, 'Kota', 'Pasuruan', NULL, NULL),
(344, 10, 'Kabupaten', 'Pati', NULL, NULL),
(345, 32, 'Kota', 'Payakumbuh', NULL, NULL),
(346, 25, 'Kabupaten', 'Pegunungan Arfak', NULL, NULL),
(347, 24, 'Kabupaten', 'Pegunungan Bintang', NULL, NULL),
(348, 10, 'Kabupaten', 'Pekalongan', NULL, NULL),
(349, 10, 'Kota', 'Pekalongan', NULL, NULL),
(350, 26, 'Kota', 'Pekanbaru', NULL, NULL),
(351, 26, 'Kabupaten', 'Pelalawan', NULL, NULL),
(352, 10, 'Kabupaten', 'Pemalang', NULL, NULL),
(353, 34, 'Kota', 'Pematang Siantar', NULL, NULL),
(354, 15, 'Kabupaten', 'Penajam Paser Utara', NULL, NULL),
(355, 18, 'Kabupaten', 'Pesawaran', NULL, NULL),
(356, 18, 'Kabupaten', 'Pesisir Barat', NULL, NULL),
(357, 32, 'Kabupaten', 'Pesisir Selatan', NULL, NULL),
(358, 21, 'Kabupaten', 'Pidie', NULL, NULL),
(359, 21, 'Kabupaten', 'Pidie Jaya', NULL, NULL),
(360, 28, 'Kabupaten', 'Pinrang', NULL, NULL),
(361, 7, 'Kabupaten', 'Pohuwato', NULL, NULL),
(362, 27, 'Kabupaten', 'Polewali Mandar', NULL, NULL),
(363, 11, 'Kabupaten', 'Ponorogo', NULL, NULL),
(364, 12, 'Kabupaten', 'Pontianak', NULL, NULL),
(365, 12, 'Kota', 'Pontianak', NULL, NULL),
(366, 29, 'Kabupaten', 'Poso', NULL, NULL),
(367, 33, 'Kota', 'Prabumulih', NULL, NULL),
(368, 18, 'Kabupaten', 'Pringsewu', NULL, NULL),
(369, 11, 'Kabupaten', 'Probolinggo', NULL, NULL),
(370, 11, 'Kota', 'Probolinggo', NULL, NULL),
(371, 14, 'Kabupaten', 'Pulang Pisau', NULL, NULL),
(372, 20, 'Kabupaten', 'Pulau Morotai', NULL, NULL),
(373, 24, 'Kabupaten', 'Puncak', NULL, NULL),
(374, 24, 'Kabupaten', 'Puncak Jaya', NULL, NULL),
(375, 10, 'Kabupaten', 'Purbalingga', NULL, NULL),
(376, 9, 'Kabupaten', 'Purwakarta', NULL, NULL),
(377, 10, 'Kabupaten', 'Purworejo', NULL, NULL),
(378, 25, 'Kabupaten', 'Raja Ampat', NULL, NULL),
(379, 4, 'Kabupaten', 'Rejang Lebong', NULL, NULL),
(380, 10, 'Kabupaten', 'Rembang', NULL, NULL),
(381, 26, 'Kabupaten', 'Rokan Hilir', NULL, NULL),
(382, 26, 'Kabupaten', 'Rokan Hulu', NULL, NULL),
(383, 23, 'Kabupaten', 'Rote Ndao', NULL, NULL),
(384, 21, 'Kota', 'Sabang', NULL, NULL),
(385, 23, 'Kabupaten', 'Sabu Raijua', NULL, NULL),
(386, 10, 'Kota', 'Salatiga', NULL, NULL),
(387, 15, 'Kota', 'Samarinda', NULL, NULL),
(388, 12, 'Kabupaten', 'Sambas', NULL, NULL),
(389, 34, 'Kabupaten', 'Samosir', NULL, NULL),
(390, 11, 'Kabupaten', 'Sampang', NULL, NULL),
(391, 12, 'Kabupaten', 'Sanggau', NULL, NULL),
(392, 24, 'Kabupaten', 'Sarmi', NULL, NULL),
(393, 8, 'Kabupaten', 'Sarolangun', NULL, NULL),
(394, 32, 'Kota', 'Sawah Lunto', NULL, NULL),
(395, 12, 'Kabupaten', 'Sekadau', NULL, NULL),
(396, 28, 'Kabupaten', 'Selayar (Kepulauan Selayar)', NULL, NULL),
(397, 4, 'Kabupaten', 'Seluma', NULL, NULL),
(398, 10, 'Kabupaten', 'Semarang', NULL, NULL),
(399, 10, 'Kota', 'Semarang', NULL, NULL),
(400, 19, 'Kabupaten', 'Seram Bagian Barat', NULL, NULL),
(401, 19, 'Kabupaten', 'Seram Bagian Timur', NULL, NULL),
(402, 3, 'Kabupaten', 'Serang', NULL, NULL),
(403, 3, 'Kota', 'Serang', NULL, NULL),
(404, 34, 'Kabupaten', 'Serdang Bedagai', NULL, NULL),
(405, 14, 'Kabupaten', 'Seruyan', NULL, NULL),
(406, 26, 'Kabupaten', 'Siak', NULL, NULL),
(407, 34, 'Kota', 'Sibolga', NULL, NULL),
(408, 28, 'Kabupaten', 'Sidenreng Rappang/Rapang', NULL, NULL),
(409, 11, 'Kabupaten', 'Sidoarjo', NULL, NULL),
(410, 29, 'Kabupaten', 'Sigi', NULL, NULL),
(411, 32, 'Kabupaten', 'Sijunjung (Sawah Lunto Sijunjung)', NULL, NULL),
(412, 23, 'Kabupaten', 'Sikka', NULL, NULL),
(413, 34, 'Kabupaten', 'Simalungun', NULL, NULL),
(414, 21, 'Kabupaten', 'Simeulue', NULL, NULL),
(415, 12, 'Kota', 'Singkawang', NULL, NULL),
(416, 28, 'Kabupaten', 'Sinjai', NULL, NULL),
(417, 12, 'Kabupaten', 'Sintang', NULL, NULL),
(418, 11, 'Kabupaten', 'Situbondo', NULL, NULL),
(419, 5, 'Kabupaten', 'Sleman', NULL, NULL),
(420, 32, 'Kabupaten', 'Solok', NULL, NULL),
(421, 32, 'Kota', 'Solok', NULL, NULL),
(422, 32, 'Kabupaten', 'Solok Selatan', NULL, NULL),
(423, 28, 'Kabupaten', 'Soppeng', NULL, NULL),
(424, 25, 'Kabupaten', 'Sorong', NULL, NULL),
(425, 25, 'Kota', 'Sorong', NULL, NULL),
(426, 25, 'Kabupaten', 'Sorong Selatan', NULL, NULL),
(427, 10, 'Kabupaten', 'Sragen', NULL, NULL),
(428, 9, 'Kabupaten', 'Subang', NULL, NULL),
(429, 21, 'Kota', 'Subulussalam', NULL, NULL),
(430, 9, 'Kabupaten', 'Sukabumi', NULL, NULL),
(431, 9, 'Kota', 'Sukabumi', NULL, NULL),
(432, 14, 'Kabupaten', 'Sukamara', NULL, NULL),
(433, 10, 'Kabupaten', 'Sukoharjo', NULL, NULL),
(434, 23, 'Kabupaten', 'Sumba Barat', NULL, NULL),
(435, 23, 'Kabupaten', 'Sumba Barat Daya', NULL, NULL),
(436, 23, 'Kabupaten', 'Sumba Tengah', NULL, NULL),
(437, 23, 'Kabupaten', 'Sumba Timur', NULL, NULL),
(438, 22, 'Kabupaten', 'Sumbawa', NULL, NULL),
(439, 22, 'Kabupaten', 'Sumbawa Barat', NULL, NULL),
(440, 9, 'Kabupaten', 'Sumedang', NULL, NULL),
(441, 11, 'Kabupaten', 'Sumenep', NULL, NULL),
(442, 8, 'Kota', 'Sungaipenuh', NULL, NULL),
(443, 24, 'Kabupaten', 'Supiori', NULL, NULL),
(444, 11, 'Kota', 'Surabaya', NULL, NULL),
(445, 10, 'Kota', 'Surakarta (Solo)', NULL, NULL),
(446, 13, 'Kabupaten', 'Tabalong', NULL, NULL),
(447, 1, 'Kabupaten', 'Tabanan', NULL, NULL),
(448, 28, 'Kabupaten', 'Takalar', NULL, NULL),
(449, 25, 'Kabupaten', 'Tambrauw', NULL, NULL),
(450, 16, 'Kabupaten', 'Tana Tidung', NULL, NULL),
(451, 28, 'Kabupaten', 'Tana Toraja', NULL, NULL),
(452, 13, 'Kabupaten', 'Tanah Bumbu', NULL, NULL),
(453, 32, 'Kabupaten', 'Tanah Datar', NULL, NULL),
(454, 13, 'Kabupaten', 'Tanah Laut', NULL, NULL),
(455, 3, 'Kabupaten', 'Tangerang', NULL, NULL),
(456, 3, 'Kota', 'Tangerang', NULL, NULL),
(457, 3, 'Kota', 'Tangerang Selatan', NULL, NULL),
(458, 18, 'Kabupaten', 'Tanggamus', NULL, NULL),
(459, 34, 'Kota', 'Tanjung Balai', NULL, NULL),
(460, 8, 'Kabupaten', 'Tanjung Jabung Barat', NULL, NULL),
(461, 8, 'Kabupaten', 'Tanjung Jabung Timur', NULL, NULL),
(462, 17, 'Kota', 'Tanjung Pinang', NULL, NULL),
(463, 34, 'Kabupaten', 'Tapanuli Selatan', NULL, NULL),
(464, 34, 'Kabupaten', 'Tapanuli Tengah', NULL, NULL),
(465, 34, 'Kabupaten', 'Tapanuli Utara', NULL, NULL),
(466, 13, 'Kabupaten', 'Tapin', NULL, NULL),
(467, 16, 'Kota', 'Tarakan', NULL, NULL),
(468, 9, 'Kabupaten', 'Tasikmalaya', NULL, NULL),
(469, 9, 'Kota', 'Tasikmalaya', NULL, NULL),
(470, 34, 'Kota', 'Tebing Tinggi', NULL, NULL),
(471, 8, 'Kabupaten', 'Tebo', NULL, NULL),
(472, 10, 'Kabupaten', 'Tegal', NULL, NULL),
(473, 10, 'Kota', 'Tegal', NULL, NULL),
(474, 25, 'Kabupaten', 'Teluk Bintuni', NULL, NULL),
(475, 25, 'Kabupaten', 'Teluk Wondama', NULL, NULL),
(476, 10, 'Kabupaten', 'Temanggung', NULL, NULL),
(477, 20, 'Kota', 'Ternate', NULL, NULL),
(478, 20, 'Kota', 'Tidore Kepulauan', NULL, NULL),
(479, 23, 'Kabupaten', 'Timor Tengah Selatan', NULL, NULL),
(480, 23, 'Kabupaten', 'Timor Tengah Utara', NULL, NULL),
(481, 34, 'Kabupaten', 'Toba Samosir', NULL, NULL),
(482, 29, 'Kabupaten', 'Tojo Una-Una', NULL, NULL),
(483, 29, 'Kabupaten', 'Toli-Toli', NULL, NULL),
(484, 24, 'Kabupaten', 'Tolikara', NULL, NULL),
(485, 31, 'Kota', 'Tomohon', NULL, NULL),
(486, 28, 'Kabupaten', 'Toraja Utara', NULL, NULL),
(487, 11, 'Kabupaten', 'Trenggalek', NULL, NULL),
(488, 19, 'Kota', 'Tual', NULL, NULL),
(489, 11, 'Kabupaten', 'Tuban', NULL, NULL),
(490, 18, 'Kabupaten', 'Tulang Bawang', NULL, NULL),
(491, 18, 'Kabupaten', 'Tulang Bawang Barat', NULL, NULL),
(492, 11, 'Kabupaten', 'Tulungagung', NULL, NULL),
(493, 28, 'Kabupaten', 'Wajo', NULL, NULL),
(494, 30, 'Kabupaten', 'Wakatobi', NULL, NULL),
(495, 24, 'Kabupaten', 'Waropen', NULL, NULL),
(496, 18, 'Kabupaten', 'Way Kanan', NULL, NULL),
(497, 10, 'Kabupaten', 'Wonogiri', NULL, NULL),
(498, 10, 'Kabupaten', 'Wonosobo', NULL, NULL),
(499, 24, 'Kabupaten', 'Yahukimo', NULL, NULL),
(500, 24, 'Kabupaten', 'Yalimo', NULL, NULL),
(501, 5, 'Kota', 'Yogyakarta', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2021_05_08_102924_create_admin_table', 1),
(5, '2021_05_09_091701_create_categories_table', 1),
(6, '2021_05_09_092658_create_products_table', 1),
(7, '2021_05_09_112727_create_category_product_table', 1),
(8, '2021_05_10_020911_create_products_details_table', 1),
(9, '2021_05_11_141719_create_provinces_table', 1),
(10, '2021_05_11_143835_create_cities_table', 1),
(11, '2021_05_18_185820_create_questions_table', 1),
(12, '2021_05_18_190310_create_answers_table', 1),
(13, '2021_05_19_080931_create_addresses_table', 1),
(14, '2021_05_19_160247_create_tags_table', 1),
(15, '2021_05_19_193227_create_transactions_table', 1),
(16, '2021_05_19_193345_create_transaction_detail_table', 1),
(17, '2021_05_21_164538_create_payments_table', 1);

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
-- Struktur dari tabel `payments`
--

CREATE TABLE `payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `transaction_id` bigint(20) UNSIGNED NOT NULL,
  `rekening` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `account_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bank` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_date` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `admin_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga` int(11) NOT NULL,
  `stok` bigint(20) NOT NULL,
  `file` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `unique_code` bigint(20) NOT NULL,
  `berat` bigint(20) NOT NULL,
  `color` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `products_details`
--

CREATE TABLE `products_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `announced` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `OS` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `chipset` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `camera` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `sensors` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `battery` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `provinces`
--

CREATE TABLE `provinces` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `province` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `provinces`
--

INSERT INTO `provinces` (`id`, `province`, `created_at`, `updated_at`) VALUES
(1, 'Bali', NULL, NULL),
(2, 'Bangka Belitung', NULL, NULL),
(3, 'Banten', NULL, NULL),
(4, 'Bengkulu', NULL, NULL),
(5, 'DI Yogyakarta', NULL, NULL),
(6, 'DKI Jakarta', NULL, NULL),
(7, 'Gorontalo', NULL, NULL),
(8, 'Jambi', NULL, NULL),
(9, 'Jawa Barat', NULL, NULL),
(10, 'Jawa Tengah', NULL, NULL),
(11, 'Jawa Timur', NULL, NULL),
(12, 'Kalimantan Barat', NULL, NULL),
(13, 'Kalimantan Selatan', NULL, NULL),
(14, 'Kalimantan Tengah', NULL, NULL),
(15, 'Kalimantan Timur', NULL, NULL),
(16, 'Kalimantan Utara', NULL, NULL),
(17, 'Kepulauan Riau', NULL, NULL),
(18, 'Lampung', NULL, NULL),
(19, 'Maluku', NULL, NULL),
(20, 'Maluku Utara', NULL, NULL),
(21, 'Nanggroe Aceh Darussalam (NAD)', NULL, NULL),
(22, 'Nusa Tenggara Barat (NTB)', NULL, NULL),
(23, 'Nusa Tenggara Timur (NTT)', NULL, NULL),
(24, 'Papua', NULL, NULL),
(25, 'Papua Barat', NULL, NULL),
(26, 'Riau', NULL, NULL),
(27, 'Sulawesi Barat', NULL, NULL),
(28, 'Sulawesi Selatan', NULL, NULL),
(29, 'Sulawesi Tengah', NULL, NULL),
(30, 'Sulawesi Tenggara', NULL, NULL),
(31, 'Sulawesi Utara', NULL, NULL),
(32, 'Sumatera Barat', NULL, NULL),
(33, 'Sumatera Selatan', NULL, NULL),
(34, 'Sumatera Utara', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `questions`
--

CREATE TABLE `questions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `body` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tags`
--

CREATE TABLE `tags` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tags` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `tags`
--

INSERT INTO `tags` (`id`, `tags`, `created_at`, `updated_at`) VALUES
(1, 'ordered', '2021-05-31 06:24:33', '2021-05-31 06:24:33'),
(2, 'confirmed', '2021-05-31 06:24:33', '2021-05-31 06:24:33'),
(3, 'packing', '2021-05-31 06:24:33', '2021-05-31 06:24:33'),
(4, 'sent', '2021-05-31 06:24:33', '2021-05-31 06:24:33'),
(5, 'completed', '2021-05-31 06:24:33', '2021-05-31 06:24:33');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transactions`
--

CREATE TABLE `transactions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_hp` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ongkir` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kecamatan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cities_id` bigint(20) UNSIGNED NOT NULL,
  `tag_id` bigint(20) UNSIGNED NOT NULL,
  `ispaid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiry_date` datetime NOT NULL,
  `invoice` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaction_detail`
--

CREATE TABLE `transaction_detail` (
  `transactions_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `qty` int(11) NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `google_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email`, `google_id`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Mahesya Setia Nugraha', 'user', 'user@gmail.com', NULL, NULL, '$2y$10$S30disogWde/BRzVAgnEK.4rAvfgkZkNyYiTIPvj70zYb4.Jx6WaS', NULL, '2021-05-31 06:24:33', '2021-05-31 06:24:33');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `addresses`
--
ALTER TABLE `addresses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `addresses_user_id_foreign` (`user_id`),
  ADD KEY `addresses_id_provinces_foreign` (`id_provinces`),
  ADD KEY `addresses_id_cities_foreign` (`id_cities`);

--
-- Indeks untuk tabel `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `answers`
--
ALTER TABLE `answers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `answers_product_id_foreign` (`product_id`),
  ADD KEY `answers_question_id_foreign` (`question_id`);

--
-- Indeks untuk tabel `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `category_product`
--
ALTER TABLE `category_product`
  ADD KEY `category_product_product_id_foreign` (`product_id`),
  ADD KEY `category_product_category_id_foreign` (`category_id`);

--
-- Indeks untuk tabel `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeks untuk tabel `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `payments_transaction_id_foreign` (`transaction_id`);

--
-- Indeks untuk tabel `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_admin_id_foreign` (`admin_id`);

--
-- Indeks untuk tabel `products_details`
--
ALTER TABLE `products_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_details_product_id_foreign` (`product_id`);

--
-- Indeks untuk tabel `provinces`
--
ALTER TABLE `provinces`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `questions_product_id_foreign` (`product_id`),
  ADD KEY `questions_user_id_foreign` (`user_id`);

--
-- Indeks untuk tabel `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `transactions_user_id_foreign` (`user_id`),
  ADD KEY `transactions_cities_id_foreign` (`cities_id`),
  ADD KEY `transactions_tag_id_foreign` (`tag_id`);

--
-- Indeks untuk tabel `transaction_detail`
--
ALTER TABLE `transaction_detail`
  ADD KEY `transaction_detail_transactions_id_foreign` (`transactions_id`),
  ADD KEY `transaction_detail_product_id_foreign` (`product_id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `addresses`
--
ALTER TABLE `addresses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `answers`
--
ALTER TABLE `answers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `cities`
--
ALTER TABLE `cities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=502;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `payments`
--
ALTER TABLE `payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `products_details`
--
ALTER TABLE `products_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `provinces`
--
ALTER TABLE `provinces`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT untuk tabel `questions`
--
ALTER TABLE `questions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tags`
--
ALTER TABLE `tags`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `addresses`
--
ALTER TABLE `addresses`
  ADD CONSTRAINT `addresses_id_cities_foreign` FOREIGN KEY (`id_cities`) REFERENCES `cities` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `addresses_id_provinces_foreign` FOREIGN KEY (`id_provinces`) REFERENCES `provinces` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `addresses_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `answers`
--
ALTER TABLE `answers`
  ADD CONSTRAINT `answers_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `answers_question_id_foreign` FOREIGN KEY (`question_id`) REFERENCES `questions` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `category_product`
--
ALTER TABLE `category_product`
  ADD CONSTRAINT `category_product_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `category_product_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `payments_transaction_id_foreign` FOREIGN KEY (`transaction_id`) REFERENCES `transactions` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_admin_id_foreign` FOREIGN KEY (`admin_id`) REFERENCES `admins` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `products_details`
--
ALTER TABLE `products_details`
  ADD CONSTRAINT `products_details_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `questions`
--
ALTER TABLE `questions`
  ADD CONSTRAINT `questions_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `questions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `transactions`
--
ALTER TABLE `transactions`
  ADD CONSTRAINT `transactions_cities_id_foreign` FOREIGN KEY (`cities_id`) REFERENCES `cities` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `transactions_tag_id_foreign` FOREIGN KEY (`tag_id`) REFERENCES `tags` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `transactions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `transaction_detail`
--
ALTER TABLE `transaction_detail`
  ADD CONSTRAINT `transaction_detail_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `transaction_detail_transactions_id_foreign` FOREIGN KEY (`transactions_id`) REFERENCES `transactions` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
