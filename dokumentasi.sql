-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 08, 2026 at 06:24 AM
-- Server version: 11.4.5-MariaDB-log
-- PHP Version: 8.3.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dokumentasi`
--

-- --------------------------------------------------------

--
-- Table structure for table `bagian`
--

CREATE TABLE `bagian` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `halaman_id` bigint(20) UNSIGNED NOT NULL,
  `judul` varchar(255) NOT NULL,
  `deskripsi` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bagian`
--

INSERT INTO `bagian` (`id`, `halaman_id`, `judul`, `deskripsi`, `created_at`, `updated_at`) VALUES
(1, 0, 'Setup', NULL, '2026-03-08 19:56:01', '2026-03-08 19:56:01'),
(2, 0, 'Inventori', NULL, '2026-03-08 19:56:01', '2026-03-08 19:56:01'),
(3, 0, 'Core', NULL, '2026-03-08 19:56:01', '2026-03-08 19:56:01'),
(4, 0, 'Alva Store', NULL, '2026-03-08 19:56:01', '2026-03-08 19:56:01'),
(5, 0, 'Finance', NULL, '2026-03-08 19:56:01', '2026-03-08 19:56:01'),
(6, 0, 'CRM', NULL, '2026-03-08 19:56:01', '2026-03-08 19:56:01'),
(7, 0, 'Next JS', NULL, '2026-03-08 19:56:01', '2026-03-08 19:56:01'),
(8, 0, 'HRD', NULL, '2026-03-08 19:56:01', '2026-03-08 19:56:01');

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `halaman`
--

CREATE TABLE `halaman` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kategori_id` bigint(20) UNSIGNED NOT NULL,
  `deskripsi` text NOT NULL,
  `jawaban` longtext NOT NULL,
  `status` enum('draft','publish','archived','delete') DEFAULT 'draft',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `halaman`
--

INSERT INTO `halaman` (`id`, `kategori_id`, `deskripsi`, `jawaban`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(2, 1, 'dfghjbnm', '<p>fgjhb</p>', 'delete', '2026-03-08 20:41:56', '2026-03-09 23:38:41', '2026-03-09 23:38:41'),
(5, 4, 'hjbn', '<p>hn&nbsp;</p><figure class=\"image\"><img src=\"http://127.0.0.1:8000/storage/editor-images/DSpbpWFxZc2MBY47o8fWDE5mEeyByvxJymAzvo8m.jpg\"></figure>', 'draft', '2026-03-08 21:49:42', '2026-03-09 23:38:35', '2026-03-09 23:38:35'),
(6, 2, 'Tutorial mengambil data gudang menggunakan postman', '<h2>Tutorial mengambil data gudang menggunakan postman</h2><p>Asal lah</p><figure class=\"image\"><img src=\"http://127.0.0.1:8000/storage/editor-images/MweCoMSn5LOhHnJicd9Yixa2YeApsiCkuWwAFYmi.png\"></figure>', 'publish', '2026-03-09 19:40:11', '2026-04-06 20:05:59', '2026-04-06 20:05:59'),
(7, 2, 'ftyghbj', '<p>gvhbn</p>', 'publish', '2026-03-09 20:32:06', '2026-03-09 20:32:22', '2026-03-09 20:32:22'),
(8, 2, 'tyguhj', '<p>yguhjb</p>', 'publish', '2026-03-09 20:33:51', '2026-03-09 23:38:32', '2026-03-09 23:38:32'),
(9, 2, 'Tutorial mengambil data Gudang menggunakan Applikasi Postman', '<p><strong>Tutorial mengambil data Gudang menggunakan Applikasi Postman</strong></p>', 'publish', '2026-03-09 20:51:03', '2026-04-06 20:45:02', NULL),
(10, 4, 'ghjn', '<p>uyjrhtegfsvdfbgnhgrfefqdvsfd bf</p>', 'publish', '2026-03-09 23:09:27', '2026-03-09 23:09:40', '2026-03-09 23:09:40'),
(11, 4, 'asdnjanacasnck', '<p>jnajkdnjkasndascnjkda</p>', 'publish', '2026-03-09 23:12:54', '2026-03-09 23:28:49', '2026-03-09 23:28:49'),
(12, 1, 'oweklfmc', '<p>iuwejlfksmc</p><p>&nbsp;</p>', 'publish', '2026-03-09 23:28:39', '2026-03-09 23:28:45', '2026-03-09 23:28:45'),
(13, 4, 'jsnvjsjdnvks', '<p>kjdsnjvnsd</p>', 'publish', '2026-03-09 23:30:31', '2026-03-09 23:38:27', '2026-03-09 23:38:27'),
(14, 2, 'jjnkjnjnkjn', '<p>hbubjnkn</p>', 'publish', '2026-03-09 23:31:07', '2026-03-09 23:38:22', '2026-03-09 23:38:22'),
(15, 8, 'Tutorial mengambil data barang masuk menggunakan postman', '<h2><strong>Tutorial mengambil data barang masuk menggunakan postman</strong></h2>', 'delete', '2026-03-10 00:06:04', '2026-04-06 20:05:48', '2026-04-06 20:05:48'),
(16, 6, 'Tutorial mengambil data rak menggunakan postman', '<h2><strong>Tutorial mengambil data rak menggunakan postman</strong><br>&nbsp;</h2><figure class=\"image\"><img src=\"http://127.0.0.1:8000/storage/editor-images/ra3y1IQkypfq2ZweKmQgqWoZDYKowR0j6RT7aWdI.jpg\"></figure>', 'publish', '2026-03-10 00:19:32', '2026-03-10 02:01:38', '2026-03-10 02:01:38'),
(17, 4, 'adadas', '<p>testing1</p>', 'publish', '2026-03-10 19:45:03', '2026-04-06 20:02:26', '2026-04-06 20:02:26'),
(18, 1, 'Tutorial mengambil data Item menggunakan Applikasi Postman', '<p>Tutorial mengambil data Item menggunakan Applikasi Postman pada bagian url staging ubah menjadi 192.168.1.11:1201, dan untuk organisasi code nya ubah menjadi 20181218045305K7133 {{URL_STAGING}}/master/jmp_inventory_v2/inventory_item/api/inventory_item.php?Organisasi_Kode=20190815113219K54579&amp;read_data_n8n=iya&amp;filter_status=Aktif&amp;search=&amp;limit=1&amp;offset=0&amp;order_dir=&amp;order_column=</p><p><img src=\"http://192.168.1.94:8000/api/image/1NYjmIbUFkDGxFLuhsaDH64CcF8XFsDPRFkXEnY0.jpg\"></p><figure class=\"image\"><img src=\"http://192.168.1.94:8000/storage/editor-images/PqF7PcDDPEL8xz5UnIoCJESRC8RztKX0sN3aGxLK.jpg\"></figure><p>&nbsp;</p><p><img src=\"http://192.168.1.94:8000/storage/editor-images/9FXAvKa2nuBaFyAZBK7aO3qs9uOTuCYeaBRAC1AB.jpg\"></p><p>lalu untuk bearer token kita buat terlebih dahulu di link http://192.168.1.11:1201, kita buat di bagian profil, account setting, lalu generate api key public dan api key service, jangan lupa untuk di save. jika sudah membuat api key, kalian copy code api key nya lalu buka bagian authorization untuk auth type nya pilih bearer token dan untuk api key nya pastekan code yang sudah di copy tadi.</p><p>(gambar contoh)</p><p>jika semua sudah di ubah maka kalian bisa tekan kirim/send dan hasil yang akan muncul seperti ini</p><p>(gambar contoh)<br>&nbsp;</p>', 'publish', '2026-03-10 19:45:42', '2026-04-07 02:06:19', NULL),
(19, 19, 'Tutorial mengambil data Abandon Cart menggunakan Applikasi Postman', '<h2><strong>Tutorial mengambil data Abandon Cart menggunakan Applikasi Postman</strong></h2>', 'publish', '2026-03-10 19:46:05', '2026-04-06 20:07:15', NULL),
(20, 29, 'Tutorial mengambil data Task menggunakan Applikasi Postman', '<h2><strong>Tutorial mengambil data Task menggunakan Applikasi Postman</strong></h2>', 'publish', '2026-03-10 19:46:35', '2026-04-06 20:07:31', NULL),
(21, 30, 'Tutorial mengambil data Auth menggunakan Applikasi Postman', '<h2><strong>Tutorial mengambil data Auth menggunakan Applikasi Postman</strong></h2>', 'publish', '2026-03-10 19:47:03', '2026-04-06 20:53:54', NULL),
(22, 32, 'bisa', '<p>testing7</p>', 'publish', '2026-03-10 19:47:35', '2026-03-10 20:13:31', '2026-03-10 20:13:31'),
(23, 14, 'test', '<p>testinglast yah</p>', 'publish', '2026-03-10 19:47:53', '2026-03-10 20:04:25', '2026-03-10 20:04:25'),
(24, 4, 'tutorial', '<p>tutorial</p>', 'publish', '2026-03-10 19:48:33', '2026-03-10 19:48:58', '2026-03-10 19:48:58'),
(25, 28, 'asdfghjkl', '<p>iniinini</p>', 'publish', '2026-03-10 19:54:14', '2026-03-10 19:55:59', '2026-03-10 19:55:59'),
(26, 6, 'asdhjkj', '<p>adiajdiajd DFGHJKL</p>', 'publish', '2026-03-10 20:05:01', '2026-03-10 20:09:18', '2026-03-10 20:09:18'),
(27, 23, 'tututrwrw', '<p><strong>BISA</strong></p>', 'publish', '2026-03-10 20:13:55', '2026-03-10 20:14:11', '2026-03-10 20:14:11'),
(28, 4, 'ghj', '<p>fghjk</p>', 'publish', '2026-03-10 20:33:39', '2026-03-25 23:32:59', '2026-03-25 23:32:59'),
(29, 9, 'Tutorial mengambil data Barang Keluar menggunakan Applikasi Postman', '<h2><strong>Tutorial mengambil data Barang Keluar menggunakan Applikasi Postman</strong></h2>', 'publish', '2026-03-10 20:36:24', '2026-04-06 20:54:59', NULL),
(30, 4, 'dfghjk', '<p>kokokokok</p>', 'publish', '2026-03-10 20:43:00', '2026-03-10 20:50:40', '2026-03-10 20:50:40'),
(31, 4, 'dfghjk', '<p>kokokokok</p>', 'publish', '2026-03-10 20:43:01', '2026-03-10 20:44:03', '2026-03-10 20:44:03'),
(32, 4, 'dfghjk', '<p>kokokokok</p>', 'publish', '2026-03-10 20:43:02', '2026-03-10 20:43:58', '2026-03-10 20:43:58'),
(33, 4, 'dfghjk', '<p>kokokokok</p>', 'publish', '2026-03-10 20:43:04', '2026-03-10 20:43:39', '2026-03-10 20:43:39'),
(34, 4, 'dfghjk', '<p>kokokokok</p>', 'publish', '2026-03-10 20:43:05', '2026-03-10 20:43:36', '2026-03-10 20:43:36'),
(35, 4, 'dfghjk', '<p>kokokokok</p>', 'publish', '2026-03-10 20:43:06', '2026-03-10 20:43:33', '2026-03-10 20:43:33'),
(36, 4, 'dfghjk', '<p>kokokokok</p>', 'publish', '2026-03-10 20:43:08', '2026-03-10 20:43:30', '2026-03-10 20:43:30'),
(37, 4, 'dfghjk', '<p>kokokokok</p>', 'publish', '2026-03-10 20:43:09', '2026-03-10 20:43:27', '2026-03-10 20:43:27'),
(38, 30, 'test', '<p>test111</p>', 'publish', '2026-03-10 20:50:08', '2026-03-10 20:50:36', '2026-03-10 20:50:36'),
(39, 8, 'test', '<p>test dulu</p>', 'draft', '2026-03-13 02:18:47', '2026-03-13 02:19:18', '2026-03-13 02:19:18'),
(40, 8, 'Tutorial mengambil data Barang Masuk menggunakan Applikasi Postman', '<h2><strong>Tutorial mengambil data Barang Masuk menggunakan Applikasi Postman</strong></h2>', 'publish', '2026-03-25 01:35:58', '2026-04-06 20:56:53', NULL),
(41, 27, 'test', '[{\"insert\":{\"image\":\"http://192.168.1.116:8000/api/image/abSPGRwIiCca0jMEKIH9az2JjYAdfqMWgNIGoF5l.jpg\"}},{\"insert\":\"\\n\"}]', 'publish', '2026-04-01 21:38:30', '2026-04-01 21:41:30', '2026-04-01 21:41:30'),
(42, 28, 'test', '[{\"insert\":{\"image\":\"http://192.168.1.116:8000/api/image/2watP0pmRIJgStH6a1wa1riEs4F2Z3YZAYDqyZnf.jpg\"}},{\"insert\":\"\\n\"}]', 'publish', '2026-04-01 21:39:27', '2026-04-01 21:41:34', '2026-04-01 21:41:34'),
(43, 26, 'fesdf', '[{\"insert\":{\"image\":\"http://192.168.1.116:8000/api/image/eXoqPuQQc6dfjB2A8av1ptDT3cjArNhLh4GeBaKH.jpg\"}},{\"insert\":\"\\n\"}]', 'publish', '2026-04-01 21:44:56', '2026-04-02 00:09:32', '2026-04-02 00:09:32'),
(44, 28, 'sdfsfewfds', '[{\"insert\":{\"image\":\"http://192.168.1.116:8000/api/image/K7X4urxyI0HIymauGiirvEQFBV0JoKqCBEqwyobp.jpg\"}},{\"insert\":\"\\n\"}]', 'publish', '2026-04-01 21:50:26', '2026-04-02 00:09:42', '2026-04-02 00:09:42'),
(45, 27, 'dryfhgjbnm', '[{\"insert\":{\"image\":\"http://192.168.1.116:8000/api/image/5OvzciXTStXnNc91G1UrViAKwBBvfz3ekZyD9Hnh.jpg\"}},{\"insert\":\"\\n\"}]', 'publish', '2026-04-01 22:00:13', '2026-04-02 00:09:45', '2026-04-02 00:09:45'),
(46, 26, 'dwscwfwecwdsc', '[{\"insert\":{\"image\":\"http://192.168.1.116:8000/api/image/lAjBT6hS1eD4PSX2Syi8IiEllL4qqcwmlN2ahz6y.jpg\"}},{\"insert\":\"\\n\"}]', 'publish', '2026-04-01 23:37:19', '2026-04-02 00:09:48', '2026-04-02 00:09:48'),
(47, 24, 'efvsdc', '<p><img src=\"http://192.168.1.116:8000/api/image/jgRw5BJK5Oytu8yPPQ3HCXOUCByyQszakY5fJ6BL.jpg\" style=\"max-width: 100%; height: auto; border-radius: 8px;\"></p><br>', 'publish', '2026-04-02 00:06:45', '2026-04-02 00:10:02', '2026-04-02 00:10:02'),
(48, 25, 'Tutorial mengambil data Bill menggunakan Applikasi Postman', '<h2><strong>Tutorial mengambil data Bill menggunakan Applikasi Postman</strong></h2>', 'publish', '2026-04-02 00:19:47', '2026-04-06 20:55:53', NULL),
(49, 18, 'Tutorial mengambil data Quotion menggunakan Applikasi Postman', '<h2><strong>Tutorial mengambil data Quotion menggunakan Applikasi Postman</strong></h2>', 'publish', '2026-04-06 20:21:15', '2026-04-06 20:21:15', NULL),
(50, 20, 'Tutorial mengambil data Orders menggunakan Applikasi Postman', '<h2><strong>Tutorial mengambil data Orders menggunakan Applikasi Postman</strong></h2>', 'publish', '2026-04-06 20:22:10', '2026-04-06 20:22:10', NULL),
(51, 21, 'Tutorial mengambil data Produk menggunakan Applikasi Postman', '<h2><strong>Tutorial mengambil data Produk menggunakan Applikasi Postman</strong></h2>', 'publish', '2026-04-06 20:23:42', '2026-04-06 20:23:42', NULL),
(52, 22, 'Tutorial mengambil data Produk Kategori menggunakan Applikasi Postman', '<h2><strong>Tutorial mengambil data Produk Kategori menggunakan Applikasi Postman</strong></h2>', 'publish', '2026-04-06 20:24:25', '2026-04-06 20:24:25', NULL),
(53, 16, 'Tutorial mengambil data Mobile Apps menggunakan Applikasi Postman', '<h2><strong>Tutorial mengambil data Mobile Apps menggunakan Applikasi Postman</strong></h2>', 'publish', '2026-04-06 20:27:20', '2026-04-06 20:27:20', NULL),
(54, 15, 'Tutorial mengambil data Organisasi menggunakan Applikasi Postman', '<h2><strong>Tutorial mengambil data Organisasi menggunakan Applikasi Postman</strong></h2>', 'publish', '2026-04-06 20:28:19', '2026-04-06 20:28:19', NULL),
(55, 14, 'Tutorial mengambil data Pengguna menggunakan Applikasi Postman', '<h2><strong>Tutorial mengambil data Pengguna menggunakan Applikasi Postman</strong></h2>', 'publish', '2026-04-06 20:31:30', '2026-04-06 20:31:30', NULL),
(56, 17, 'Tutorial mengambil data Role menggunakan Applikasi Postman', '<h2><strong>Tutorial mengambil data Role menggunakan Applikasi Postman</strong></h2>', 'publish', '2026-04-06 20:32:03', '2026-04-06 20:32:03', NULL),
(57, 28, 'Tutorial mengambil data Case Barang Service menggunakan Applikasi Postman', '<h2><strong>Tutorial mengambil data Case Barang Service menggunakan Applikasi Postman</strong></h2>', 'publish', '2026-04-06 20:33:32', '2026-04-06 20:33:32', NULL),
(58, 5, 'Tutorial mengambil data RMA menggunakan Applikasi Postman', '<h2><strong>Tutorial mengambil data RMA menggunakan Applikasi Postman</strong></h2>', 'publish', '2026-04-06 20:34:15', '2026-04-06 20:34:15', NULL),
(59, 23, 'Tutorial mengambil data Invoice menggunakan Applikasi Postman', '<h2><strong>Tutorial mengambil data Invoice menggunakan Applikasi Postman</strong></h2>', 'publish', '2026-04-06 20:38:09', '2026-04-06 20:38:09', NULL),
(60, 26, 'Tutorial mengambil data Expanses menggunakan Applikasi Postman', '<h2><strong>Tutorial mengambil data Expanses menggunakan Applikasi Postman</strong></h2>', 'publish', '2026-04-06 20:39:01', '2026-04-06 20:39:01', NULL),
(61, 27, 'Tutorial mengambil data Item menggunakan Applikasi Postman', '<h2><strong>Tutorial mengambil data Item menggunakan Applikasi Postman</strong></h2>', 'publish', '2026-04-06 20:39:42', '2026-04-06 20:39:42', NULL),
(62, 24, 'Tutorial mengambil data Purchase Order menggunakan Applikasi Postman', '<h2><strong>Tutorial mengambil data Purchase Order menggunakan Applikasi Postman</strong></h2>', 'publish', '2026-04-06 20:40:30', '2026-04-06 20:40:30', NULL),
(63, 32, 'Tutorial mengambil data Karyawan menggunakan Applikasi Postman', '<h2><strong>Tutorial mengambil data Karyawan menggunakan Applikasi Postman</strong></h2>', 'publish', '2026-04-06 20:42:03', '2026-04-06 20:42:03', NULL),
(64, 31, 'Tutorial mengambil data Pengajuan Kasbon menggunakan Applikasi Postman', '<h2><strong>Tutorial mengambil data Pengajuan Kasbon menggunakan Applikasi Postman</strong></h2>', 'publish', '2026-04-06 20:42:35', '2026-04-06 20:42:35', NULL),
(65, 6, 'Tutorial mengambil data Rak menggunakan Applikasi Postman', '<h2><strong>Tutorial mengambil data Rak menggunakan Applikasi Postman</strong></h2>', 'publish', '2026-04-06 20:46:10', '2026-04-06 20:46:10', NULL),
(66, 7, 'Tutorial mengambil data Track Serial Number menggunakan Applikasi Postman', '<h2><strong>Tutorial mengambil data Track Serial Number menggunakan Applikasi Postman</strong></h2>', 'publish', '2026-04-06 20:48:06', '2026-04-06 20:48:06', NULL),
(67, 10, 'Tutorial mengambil data Delivery menggunakan Applikasi Postman', '<h2><strong>Tutorial mengambil data Delivery menggunakan Applikasi Postman</strong></h2>', 'publish', '2026-04-06 20:49:19', '2026-04-06 20:49:19', NULL),
(68, 11, 'Tutorial mengambil data Stock Request menggunakan Applikasi Postman', '<h2><strong>Tutorial mengambil data Stock Request menggunakan Applikasi Postman</strong></h2>', 'publish', '2026-04-06 20:50:18', '2026-04-06 20:50:18', NULL),
(69, 12, 'Tutorial mengambil data Internal Transfer menggunakan Applikasi Postman', '<h2><strong>Tutorial mengambil data Internal Transfer menggunakan Applikasi Postman</strong></h2>', 'publish', '2026-04-06 20:51:12', '2026-04-06 20:51:12', NULL),
(70, 13, 'Tutorial mengambil data Rak Transfer menggunakan Applikasi Postman', '<h2><strong>Tutorial mengambil data Rak Transfer menggunakan Applikasi Postman</strong></h2>', 'publish', '2026-04-06 20:51:43', '2026-04-06 20:51:43', NULL),
(71, 4, 'Tutorial mengambil data Web menggunakan Applikasi Postman', '<h2><strong>Tutorial mengambil data Web menggunakan Applikasi Postman</strong></h2>', 'publish', '2026-04-06 20:52:59', '2026-04-06 20:52:59', NULL),
(72, 1, 'test1', '<p><i><strong>test1</strong></i></p>', 'delete', '2026-04-07 23:21:30', '2026-04-07 23:24:07', '2026-04-07 23:24:07');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `bagian_id` bigint(20) UNSIGNED NOT NULL,
  `judul` varchar(255) NOT NULL,
  `konten` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id`, `bagian_id`, `judul`, `konten`, `created_at`, `updated_at`) VALUES
(1, 2, 'Item', NULL, '2026-03-08 19:56:01', '2026-03-08 21:09:49'),
(2, 2, 'Gudang', NULL, '2026-03-08 19:56:16', '2026-03-08 19:56:16'),
(4, 1, 'web', NULL, '2026-03-08 21:10:23', '2026-03-08 21:10:23'),
(5, 6, 'RMA', NULL, '2026-03-09 20:52:33', '2026-03-09 23:49:19'),
(6, 2, 'Rak', NULL, '2026-03-09 23:39:52', '2026-03-09 23:39:52'),
(7, 2, 'Track Serial Number', NULL, '2026-03-09 23:40:06', '2026-03-09 23:40:06'),
(8, 2, 'Barang Masuk', NULL, '2026-03-09 23:40:28', '2026-03-09 23:40:28'),
(9, 2, 'Barang Keluar', NULL, '2026-03-09 23:40:41', '2026-03-09 23:40:41'),
(10, 2, 'Delivery', NULL, '2026-03-09 23:41:17', '2026-03-09 23:41:17'),
(11, 2, 'Stock Request', NULL, '2026-03-09 23:41:40', '2026-03-09 23:41:40'),
(12, 2, 'Internal Transfer', NULL, '2026-03-09 23:41:55', '2026-03-09 23:41:55'),
(13, 2, 'Rak Transfer', NULL, '2026-03-09 23:42:07', '2026-03-09 23:42:07'),
(14, 3, 'Pengguna', NULL, '2026-03-09 23:43:21', '2026-03-09 23:43:21'),
(15, 3, 'Organisasi', NULL, '2026-03-09 23:43:35', '2026-03-09 23:43:35'),
(16, 3, 'Mobile Apps', NULL, '2026-03-09 23:43:53', '2026-03-09 23:43:53'),
(17, 3, 'Role', NULL, '2026-03-09 23:44:02', '2026-03-09 23:44:02'),
(18, 4, 'Quotation', NULL, '2026-03-09 23:45:07', '2026-03-09 23:45:07'),
(19, 4, 'Abandon Cart', NULL, '2026-03-09 23:45:21', '2026-03-09 23:45:21'),
(20, 4, 'Orders', NULL, '2026-03-09 23:45:33', '2026-03-09 23:45:33'),
(21, 4, 'Produk', NULL, '2026-03-09 23:45:47', '2026-03-09 23:45:47'),
(22, 4, 'Produk kategori', NULL, '2026-03-09 23:45:59', '2026-03-09 23:45:59'),
(23, 5, 'Invoice', NULL, '2026-03-09 23:46:17', '2026-03-09 23:46:17'),
(24, 5, 'Purchase Order', NULL, '2026-03-09 23:46:35', '2026-03-09 23:46:35'),
(25, 5, 'Bill', NULL, '2026-03-09 23:46:45', '2026-03-09 23:46:45'),
(26, 5, 'Expanses', NULL, '2026-03-09 23:47:01', '2026-03-09 23:47:01'),
(27, 5, 'Item', NULL, '2026-03-09 23:48:10', '2026-03-09 23:48:10'),
(28, 6, 'Case Barang Servis', NULL, '2026-03-09 23:49:41', '2026-03-09 23:49:41'),
(29, 6, 'Task', NULL, '2026-03-09 23:49:58', '2026-03-09 23:49:58'),
(30, 7, 'Auth', NULL, '2026-03-09 23:50:14', '2026-03-09 23:50:14'),
(31, 8, 'Pengajuan Kasbon', NULL, '2026-03-09 23:50:30', '2026-03-09 23:50:30'),
(32, 8, 'Karyawan', NULL, '2026-03-09 23:50:39', '2026-03-09 23:50:39');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '0001_01_01_000003_add_is_admin_to_users_table', 1),
(5, '2026_03_04_022651_create_personal_access_tokens_table', 1),
(6, '2026_03_05_043533_create_bagian_table', 1),
(7, '2026_03_05_061517_kategori', 1),
(8, '2026_03_05_061606_halaman', 1),
(9, '2026_03_09_024936_add_status_to_halaman_table', 1),
(10, '2026_03_09_042405_add_deleted_at_to_halaman_table', 2),
(11, '2026_03_09_043528_update_status_enum_halaman_table', 3),
(12, '2026_03_10_025242_update_status_enum_on_halaman_table', 4),
(13, '2026_04_02_000000_create_notifikasi_table', 5);

-- --------------------------------------------------------

--
-- Table structure for table `notifikasi`
--

CREATE TABLE `notifikasi` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `judul` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `type` enum('success','danger','edit','info') NOT NULL DEFAULT 'info',
  `is_read` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` text NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `personal_access_tokens`
--

INSERT INTO `personal_access_tokens` (`id`, `tokenable_type`, `tokenable_id`, `name`, `token`, `abilities`, `last_used_at`, `expires_at`, `created_at`, `updated_at`) VALUES
(1, 'App\\Models\\User', 1, 'admin-token', '139a54bfe9ebb139db998e4959d7acff8ebcd05484cfed4c523bc44d715f77a0', '[\"*\"]', NULL, NULL, '2026-03-08 19:55:19', '2026-03-08 19:55:19'),
(2, 'App\\Models\\User', 1, 'admin-token', 'ecfe432b9a2b4f84eebb04ee66f59939ea2f0a835c1e0ff1d689a75dd47084d2', '[\"*\"]', '2026-03-13 22:01:29', NULL, '2026-03-13 22:01:28', '2026-03-13 22:01:29'),
(3, 'App\\Models\\User', 1, 'admin-token', '2b0dd6f22ed9fe08c294d7962eb6599307497361557878f59ac26cf203f65c40', '[\"*\"]', '2026-03-13 22:20:23', NULL, '2026-03-13 22:20:22', '2026-03-13 22:20:23'),
(4, 'App\\Models\\User', 1, 'admin-token', '6342eab84b41e4e7ae42b13ccfe4bc15f6346d5c04a9e45e76591d65d2b0d88b', '[\"*\"]', '2026-03-13 23:11:20', NULL, '2026-03-13 23:11:17', '2026-03-13 23:11:20'),
(5, 'App\\Models\\User', 1, 'admin-token', '49fc86c775207dfa5eff20b29a8d583ded842bb502b5919ede1e1fd534b89084', '[\"*\"]', '2026-03-13 23:24:05', NULL, '2026-03-13 23:24:03', '2026-03-13 23:24:05'),
(6, 'App\\Models\\User', 1, 'admin-token', '7bf4b39bf3b1919538b59bc32123ad87fab90b541c016eb55d021ff50294f203', '[\"*\"]', '2026-03-13 23:25:15', NULL, '2026-03-13 23:25:13', '2026-03-13 23:25:15'),
(7, 'App\\Models\\User', 1, 'admin-token', 'f7fc019058d1c798ceb9d3fee962d1ce504a082878659ca7ec17b7b8519eb3e3', '[\"*\"]', '2026-03-13 23:25:35', NULL, '2026-03-13 23:25:32', '2026-03-13 23:25:35'),
(8, 'App\\Models\\User', 1, 'admin-token', '34577c9b6dca15319d03723c0abf26dddcab3a99b60a4fd8efa11caf0ded5ebd', '[\"*\"]', '2026-03-13 23:28:54', NULL, '2026-03-13 23:28:51', '2026-03-13 23:28:54'),
(9, 'App\\Models\\User', 1, 'admin-token', '2de20035b153ff26faf670626ffb5e347f41b89c433727371bef651896702f40', '[\"*\"]', NULL, NULL, '2026-03-24 20:47:46', '2026-03-24 20:47:46'),
(10, 'App\\Models\\User', 1, 'admin-token', '5a644448006eae09eb8171f1d547a6577d3d4afa153d4bd491ea5d04d421f5cd', '[\"*\"]', '2026-03-24 20:48:27', NULL, '2026-03-24 20:48:25', '2026-03-24 20:48:27'),
(11, 'App\\Models\\User', 1, 'admin-token', '1bbf36602a89fc83f5d5bec2905b6a7973978a00b62f2478ff52ae62224efc32', '[\"*\"]', '2026-03-24 20:56:12', NULL, '2026-03-24 20:56:10', '2026-03-24 20:56:12'),
(12, 'App\\Models\\User', 1, 'admin-token', 'c5beb2192c79ae6cec19848b9b54509616d7b90ab8232db080df302e6b30fb7e', '[\"*\"]', '2026-03-24 21:44:36', NULL, '2026-03-24 21:03:50', '2026-03-24 21:44:36'),
(13, 'App\\Models\\User', 1, 'admin-token', 'ec2ddb267275c90743cfe3c55e2a34e2894be7bdc486825e4a41b660e97ed432', '[\"*\"]', '2026-03-24 21:52:35', NULL, '2026-03-24 21:52:32', '2026-03-24 21:52:35'),
(14, 'App\\Models\\User', 1, 'admin-token', '349fce6cfeb523fd88aa131254e452a3a402b6bc5630a267d52667e37b080d61', '[\"*\"]', '2026-03-24 21:56:45', NULL, '2026-03-24 21:56:43', '2026-03-24 21:56:45'),
(15, 'App\\Models\\User', 1, 'admin-token', 'ada7a024c3e41a8e34d306d74dc67aff3e78f18a957858eb93c9076fba523ed8', '[\"*\"]', '2026-03-24 21:58:42', NULL, '2026-03-24 21:58:30', '2026-03-24 21:58:42'),
(16, 'App\\Models\\User', 1, 'admin-token', 'b9ac138d69b9f5f469abcb677840bfb4c11a68281cd058fc76948d9b43850357', '[\"*\"]', '2026-03-24 22:00:53', NULL, '2026-03-24 22:00:49', '2026-03-24 22:00:53'),
(17, 'App\\Models\\User', 1, 'admin-token', '198c9b16717bb1c64ec012eb0299ec6eb5016934a7a5c3b4cfa46771802a175d', '[\"*\"]', '2026-03-25 01:03:26', NULL, '2026-03-24 23:46:23', '2026-03-25 01:03:26'),
(18, 'App\\Models\\User', 1, 'admin-token', '00e90a1260be951c2f49bd8667923394993b9be3d1ee605b263580ae1501bc0a', '[\"*\"]', '2026-03-25 01:06:37', NULL, '2026-03-25 01:05:38', '2026-03-25 01:06:37'),
(19, 'App\\Models\\User', 1, 'admin-token', '23e2487c7ff0b5741fa169d54a0b39283d92a8a3c35f3a320bd53ac3fcf15e26', '[\"*\"]', '2026-03-25 01:07:24', NULL, '2026-03-25 01:07:14', '2026-03-25 01:07:24'),
(20, 'App\\Models\\User', 1, 'admin-token', '42ce162281e6cbafb26052ab06a1ff79d9eb17c613c36f898db461805184e260', '[\"*\"]', '2026-03-25 01:36:39', NULL, '2026-03-25 01:07:54', '2026-03-25 01:36:39'),
(21, 'App\\Models\\User', 1, 'admin-token', '6fe9319d228fca8736c7d010fc97778325b292972e8d852768efdeab5d049158', '[\"*\"]', '2026-03-25 19:48:10', NULL, '2026-03-25 19:08:14', '2026-03-25 19:48:10'),
(22, 'App\\Models\\User', 1, 'admin-token', 'abd3a384b0f725857ef5d6117dd9609189d654b88135ad698600d5e3461c90b9', '[\"*\"]', '2026-03-25 19:57:44', NULL, '2026-03-25 19:52:16', '2026-03-25 19:57:44'),
(23, 'App\\Models\\User', 1, 'admin-token', 'c25658159642babd73c986391541437bd8cc98890761f0a1c84f81f0d0632983', '[\"*\"]', '2026-03-26 00:12:22', NULL, '2026-03-25 20:24:42', '2026-03-26 00:12:22'),
(24, 'App\\Models\\User', 1, 'admin-token', '23a2935de10f989157d850c71b284db108d0e2cbb882efdca1b76339be93470d', '[\"*\"]', '2026-03-26 00:14:02', NULL, '2026-03-26 00:13:34', '2026-03-26 00:14:02'),
(25, 'App\\Models\\User', 1, 'admin-token', 'bf4a52fa7c6d70e911f0923cdf0f9c354244f6c9400c33b77a6bba3aa00e5b60', '[\"*\"]', '2026-03-26 02:19:28', NULL, '2026-03-26 00:19:13', '2026-03-26 02:19:28'),
(26, 'App\\Models\\User', 1, 'admin-token', 'f93c8b9e7372930ec7d36381e2bd819ac30980598a3d34e98d9134f5a9fc9ab6', '[\"*\"]', '2026-03-26 02:42:43', NULL, '2026-03-26 02:21:25', '2026-03-26 02:42:43'),
(27, 'App\\Models\\User', 1, 'admin-token', 'fe1caf7a96f8bf7676a138af8ecce8b72501f62d913e7b1991483f597cbd4b03', '[\"*\"]', '2026-03-26 02:56:13', NULL, '2026-03-26 02:43:01', '2026-03-26 02:56:13'),
(28, 'App\\Models\\User', 1, 'admin-token', '3de58009e3cb72bc32bd91894b042dc201d54befaf45c49294bdca51a82350ac', '[\"*\"]', '2026-03-26 20:03:06', NULL, '2026-03-26 19:16:42', '2026-03-26 20:03:06'),
(29, 'App\\Models\\User', 1, 'admin-token', '4ef8c40dcfba155243fb53b77481d2c64002d76555a4bb57b19f18ad52ad2ff6', '[\"*\"]', '2026-03-26 20:08:08', NULL, '2026-03-26 20:08:02', '2026-03-26 20:08:08'),
(30, 'App\\Models\\User', 1, 'admin-token', '32b0704689cc59f0ed1e30f2f5144cab144be5b99a0d733d4d470eb91d7cd973', '[\"*\"]', '2026-03-26 21:16:00', NULL, '2026-03-26 20:13:46', '2026-03-26 21:16:00'),
(31, 'App\\Models\\User', 1, 'admin-token', '7460ad56a3069f346af6f5e6aac92c2dd591119a3413e59fda3ebabfa0e568b1', '[\"*\"]', '2026-03-27 00:14:32', NULL, '2026-03-26 23:27:48', '2026-03-27 00:14:32'),
(32, 'App\\Models\\User', 1, 'admin-token', 'aaa6f5d8ac5c137bda3c43b8c56116ce259d12530515785291b428eda79e5b9c', '[\"*\"]', '2026-03-27 01:28:51', NULL, '2026-03-27 00:46:09', '2026-03-27 01:28:51'),
(33, 'App\\Models\\User', 1, 'admin-token', 'a0a1ef540ba27205a95f6ecc332817225f7b32231887eecac422332b1b30b7ee', '[\"*\"]', '2026-03-27 19:13:19', NULL, '2026-03-27 19:13:10', '2026-03-27 19:13:19'),
(34, 'App\\Models\\User', 1, 'admin-token', '8cc9f856faa73b194a134cd0b93adda2ccde75d8abe777b72796d72b4577069d', '[\"*\"]', '2026-03-27 19:32:23', NULL, '2026-03-27 19:30:45', '2026-03-27 19:32:23'),
(35, 'App\\Models\\User', 1, 'admin-token', '667d0e1514789b5c1a6c56beca3bd90950adedae949e29ecbd6ce3725f01d5db', '[\"*\"]', '2026-03-27 19:35:46', NULL, '2026-03-27 19:35:18', '2026-03-27 19:35:46'),
(36, 'App\\Models\\User', 1, 'admin-token', '6935b0429a8771119b7ca069d90a61104cb76e22cb710ca5b096264e015bb2c1', '[\"*\"]', '2026-03-27 19:38:30', NULL, '2026-03-27 19:38:22', '2026-03-27 19:38:30'),
(37, 'App\\Models\\User', 1, 'admin-token', '6fca722d66ba419af6ebb82487e7b6d45f180a2f01c5d1fcd2e4871a349cfd81', '[\"*\"]', '2026-03-27 20:04:57', NULL, '2026-03-27 20:04:05', '2026-03-27 20:04:57'),
(38, 'App\\Models\\User', 1, 'admin-token', '748e84452ed7ef4de5025be856549cc60263d04c1fe88989ac3db3b184c323ce', '[\"*\"]', '2026-03-27 20:05:37', NULL, '2026-03-27 20:05:35', '2026-03-27 20:05:37'),
(39, 'App\\Models\\User', 1, 'admin-token', '3ea6d58f458c90be8114b1b687c16daba65ea9638253d9cf1ae753431bd0fed6', '[\"*\"]', '2026-03-27 21:48:49', NULL, '2026-03-27 21:22:45', '2026-03-27 21:48:49'),
(40, 'App\\Models\\User', 1, 'admin-token', 'e7825c43747a4749f2511cd1b4159fdd7e4531d2843e6ab9bfd9aa4b87c02238', '[\"*\"]', '2026-03-27 23:31:51', NULL, '2026-03-27 23:31:41', '2026-03-27 23:31:51'),
(41, 'App\\Models\\User', 1, 'admin-token', '5d8224693502e78dbfcfcf7142a387e23914403d0f065dd50de016365f7c4b60', '[\"*\"]', '2026-03-27 23:46:09', NULL, '2026-03-27 23:38:53', '2026-03-27 23:46:09'),
(42, 'App\\Models\\User', 1, 'admin-token', '7aed7a2747a17e392c02aba432d3ffe5f379a5aa7ccd1f6d053707b343089d02', '[\"*\"]', '2026-03-29 19:27:51', NULL, '2026-03-29 19:27:48', '2026-03-29 19:27:51'),
(43, 'App\\Models\\User', 1, 'admin-token', '188b62f0f5f03d7a090bcc8ac2516f31a2e1832cfbd22ae2c9c54bd845bd25db', '[\"*\"]', '2026-03-29 20:06:18', NULL, '2026-03-29 20:06:12', '2026-03-29 20:06:18'),
(44, 'App\\Models\\User', 1, 'admin-token', '82526a88cc4e18f3659662118df56f863c690c11f9cee75d71062dab13be79b2', '[\"*\"]', '2026-03-29 20:20:56', NULL, '2026-03-29 20:20:54', '2026-03-29 20:20:56'),
(45, 'App\\Models\\User', 1, 'admin-token', 'b3f12c074269ea46253d55fe557d98153985aeda7ee25d20dd71b9b1ece12d24', '[\"*\"]', '2026-03-29 20:23:22', NULL, '2026-03-29 20:23:21', '2026-03-29 20:23:22'),
(46, 'App\\Models\\User', 1, 'admin-token', '837298cbecb65a6255bc2d6d1120cd163c481b199e7f404c70b14b9f82fb99e5', '[\"*\"]', '2026-03-29 20:34:38', NULL, '2026-03-29 20:31:46', '2026-03-29 20:34:38'),
(47, 'App\\Models\\User', 1, 'admin-token', '6848c562335c0c8c4b6629c9d4d956be066172524bda09e1641852db45ca6500', '[\"*\"]', '2026-03-29 20:45:27', NULL, '2026-03-29 20:45:25', '2026-03-29 20:45:27'),
(48, 'App\\Models\\User', 1, 'admin-token', '8a3a1fb53d6276dfdbdf076ec1c51e2ed4018725954ae68b41300443200eb75a', '[\"*\"]', '2026-03-30 20:08:38', NULL, '2026-03-30 19:59:33', '2026-03-30 20:08:38'),
(49, 'App\\Models\\User', 1, 'admin-token', '91da3938cb945a092221b36b6258becdb9b80ead0a9796962ce2cfa0b137a311', '[\"*\"]', '2026-03-30 20:13:57', NULL, '2026-03-30 20:09:00', '2026-03-30 20:13:57'),
(50, 'App\\Models\\User', 1, 'admin-token', 'f9134f4234d74ece5f630cb78bf3e33066303c5ecc0d4d0a53c69c758a626517', '[\"*\"]', '2026-03-30 20:15:33', NULL, '2026-03-30 20:14:16', '2026-03-30 20:15:33'),
(51, 'App\\Models\\User', 1, 'admin-token', '9ecf9f9fcfd29fc6ed2c6f5a12849cadb94e96bfbf11ee0e1262578f601e250f', '[\"*\"]', '2026-03-30 20:17:54', NULL, '2026-03-30 20:15:44', '2026-03-30 20:17:54'),
(52, 'App\\Models\\User', 1, 'admin-token', '89e62e255e0d024c1f98916da8f3bb2df9e0758c1efbc1c19da1119c2ab3f630', '[\"*\"]', '2026-03-30 20:19:55', NULL, '2026-03-30 20:18:05', '2026-03-30 20:19:55'),
(53, 'App\\Models\\User', 1, 'admin-token', 'd002b925b288c8e1255098afae7773890e0f62c9cd2f8096941464448a62161e', '[\"*\"]', '2026-03-30 20:33:58', NULL, '2026-03-30 20:23:21', '2026-03-30 20:33:58'),
(54, 'App\\Models\\User', 1, 'admin-token', '43ca2ab159d6ba58fb6b57671ace33bca76b7b0fd8e489320b816f468f7e9f31', '[\"*\"]', '2026-03-30 21:04:16', NULL, '2026-03-30 20:35:26', '2026-03-30 21:04:16'),
(55, 'App\\Models\\User', 1, 'admin-token', 'f3525c74a65a0d8e3ac82fa97ed1cf56186d4eb564109dac3fdede1fca1f31d3', '[\"*\"]', '2026-03-30 21:05:06', NULL, '2026-03-30 21:04:34', '2026-03-30 21:05:06'),
(56, 'App\\Models\\User', 1, 'admin-token', '55d3955c1207628021c46f0dc055a3c66327ffa1ae123af1722c45b7af972875', '[\"*\"]', '2026-03-30 21:21:15', NULL, '2026-03-30 21:05:40', '2026-03-30 21:21:15'),
(57, 'App\\Models\\User', 1, 'admin-token', '439d36d3fcd5f5c7c8ca1997d7538d001cfb9b124804c1a0323d0da61c9b1269', '[\"*\"]', '2026-03-30 21:24:07', NULL, '2026-03-30 21:21:44', '2026-03-30 21:24:07'),
(58, 'App\\Models\\User', 1, 'admin-token', 'e65b751e92a20b3fdd0062496f745a46ccd244d26d7fa43dde5683c755a85d1c', '[\"*\"]', '2026-03-30 21:24:43', NULL, '2026-03-30 21:24:20', '2026-03-30 21:24:43'),
(59, 'App\\Models\\User', 1, 'admin-token', 'ff2fdaa91014c4a1e9c63eeb57e9fcad84cbcfebfab2855ae12cd65bed4a9d87', '[\"*\"]', '2026-03-30 21:24:59', NULL, '2026-03-30 21:24:58', '2026-03-30 21:24:59'),
(60, 'App\\Models\\User', 1, 'admin-token', 'dc1f4e65030ef58ba45cce989057ecd7c2082fdfd62ac799b027667b99257651', '[\"*\"]', '2026-03-30 21:36:25', NULL, '2026-03-30 21:31:16', '2026-03-30 21:36:25'),
(61, 'App\\Models\\User', 1, 'admin-token', '74c03e0e3e5f7f35bf6763c876667eb20327cd1675be262afb434406484e5018', '[\"*\"]', '2026-03-30 21:42:31', NULL, '2026-03-30 21:36:51', '2026-03-30 21:42:31'),
(62, 'App\\Models\\User', 1, 'admin-token', 'f83b7abe913c198ed31325686473042dd12d63692e4cbff8aede45f478b9d438', '[\"*\"]', '2026-03-30 21:43:11', NULL, '2026-03-30 21:42:50', '2026-03-30 21:43:11'),
(63, 'App\\Models\\User', 1, 'admin-token', 'b0e1e4950f74824c7a37b82e601e3fcacbc271c93f0533bdbdd52b9529c4d4e7', '[\"*\"]', '2026-03-30 21:43:35', NULL, '2026-03-30 21:43:24', '2026-03-30 21:43:35'),
(64, 'App\\Models\\User', 1, 'admin-token', '243bab5f7ebb67a2d6d64ad2b766c4c98deea312e0e152ce0ceba223327d307f', '[\"*\"]', '2026-03-30 21:47:53', NULL, '2026-03-30 21:43:48', '2026-03-30 21:47:53'),
(65, 'App\\Models\\User', 1, 'admin-token', '248fb8e81d5dbbd4459b49ca1bc88ed4f6a5ba2cea6415ff716d2fd6c34eb8a8', '[\"*\"]', '2026-03-30 21:50:14', NULL, '2026-03-30 21:48:26', '2026-03-30 21:50:14'),
(66, 'App\\Models\\User', 1, 'admin-token', 'd5b1c19ea1eb7cc89d4206a78117670ea9f2d40689e4eee2d873a55565a72999', '[\"*\"]', '2026-03-30 21:56:42', NULL, '2026-03-30 21:50:30', '2026-03-30 21:56:42'),
(67, 'App\\Models\\User', 1, 'admin-token', '8e1eb569dd2c3fad057a8d6f41287e4cb7a3da00907cea13e4a24cf759a5c568', '[\"*\"]', '2026-03-30 22:06:32', NULL, '2026-03-30 21:56:56', '2026-03-30 22:06:32'),
(68, 'App\\Models\\User', 1, 'admin-token', 'b7e5ac82f0d190e938a5118abddbbc366f9d216e6204ac2e797b8b8601cc163a', '[\"*\"]', '2026-03-30 23:07:39', NULL, '2026-03-30 22:06:45', '2026-03-30 23:07:39'),
(69, 'App\\Models\\User', 1, 'admin-token', '71a27bda5b8e44857c1c0765af8db5c7a32f1622479b9934453c9a2cb06bebc7', '[\"*\"]', '2026-03-31 00:41:45', NULL, '2026-03-30 23:08:25', '2026-03-31 00:41:45'),
(70, 'App\\Models\\User', 2, 'admin-token', 'db14f05ae55d720c98b0792aeb12612d805caafe69478965495d5f9a7b031cca', '[\"*\"]', NULL, NULL, '2026-03-30 23:58:28', '2026-03-30 23:58:28'),
(71, 'App\\Models\\User', 1, 'admin-token', 'e7e3d5c587080d46202cc57c755a3afe7765be2f2dce55a5c4c63ca6aaba576d', '[\"*\"]', '2026-03-31 02:19:38', NULL, '2026-03-31 02:19:13', '2026-03-31 02:19:38'),
(72, 'App\\Models\\User', 1, 'admin-token', 'e9973433c3af839c013920039f6239459e50ba0b410d64a7ea59cdaf702e56fa', '[\"*\"]', '2026-03-31 23:01:55', NULL, '2026-03-31 20:30:16', '2026-03-31 23:01:55'),
(73, 'App\\Models\\User', 1, 'admin-token', 'ba25dca539f8adb187fb97b93df910ba0bf25b21f392fea6680552d9b0fea1bf', '[\"*\"]', '2026-04-01 00:22:01', NULL, '2026-04-01 00:07:29', '2026-04-01 00:22:01'),
(74, 'App\\Models\\User', 1, 'admin-token', 'ed3b89af358f1b502ee1003a92064f5add52d9031ef66057d7ee72be3a30b317', '[\"*\"]', '2026-04-01 00:38:55', NULL, '2026-04-01 00:22:19', '2026-04-01 00:38:55'),
(75, 'App\\Models\\User', 1, 'admin-token', 'a254f9365ffa5d7e6a86e73d34d6a0c70b921dc13e3f96bbb60cb7178d5d0e09', '[\"*\"]', '2026-04-01 00:45:50', NULL, '2026-04-01 00:40:14', '2026-04-01 00:45:50'),
(76, 'App\\Models\\User', 1, 'admin-token', 'ac03fd1d904ddcf4b218a1603a13311b7ed7784b77d4fc57d874fe00b9fa28c6', '[\"*\"]', '2026-04-01 00:46:54', NULL, '2026-04-01 00:46:15', '2026-04-01 00:46:54'),
(77, 'App\\Models\\User', 1, 'admin-token', '92479386d285206799d700057088dd7073451164065994a7815d9748a4619841', '[\"*\"]', '2026-04-01 00:49:10', NULL, '2026-04-01 00:49:02', '2026-04-01 00:49:10'),
(78, 'App\\Models\\User', 1, 'admin-token', '5fe611d41ebd53e4f0b02aaaf23927adadbdb65dd5961abaec194a95bc29c4e4', '[\"*\"]', NULL, NULL, '2026-04-01 00:54:22', '2026-04-01 00:54:22'),
(79, 'App\\Models\\User', 1, 'admin-token', 'cb29423bd8cf89e24fcf46b0578c24837892c1b0307f4741b48493851612c91d', '[\"*\"]', NULL, NULL, '2026-04-01 00:54:31', '2026-04-01 00:54:31'),
(80, 'App\\Models\\User', 1, 'admin-token', 'ca05cb448d4dcbe952389c77056d44446a724097bd31005a8923e8a7e2ea1b31', '[\"*\"]', '2026-04-01 00:58:20', NULL, '2026-04-01 00:56:14', '2026-04-01 00:58:20'),
(81, 'App\\Models\\User', 1, 'admin-token', '20836899b55893de59fb63441cd745732daa0b2d54bd5317f0ad0388afb1a633', '[\"*\"]', '2026-04-01 01:02:40', NULL, '2026-04-01 00:58:38', '2026-04-01 01:02:40'),
(82, 'App\\Models\\User', 1, 'admin-token', 'a5132e6d5e89db2c99293d687baf19c110c8f51d3cca01cd28dc56ed33d1f2e3', '[\"*\"]', '2026-04-01 01:03:47', NULL, '2026-04-01 01:02:56', '2026-04-01 01:03:47'),
(83, 'App\\Models\\User', 1, 'admin-token', '9ff2bcb642fd4e0310cac77272bc767742c797b81ee3305834823d1e3c60d502', '[\"*\"]', '2026-04-01 01:04:10', NULL, '2026-04-01 01:04:00', '2026-04-01 01:04:10'),
(84, 'App\\Models\\User', 1, 'admin-token', 'b5e74fdacb5707cb3ffb345cf28bcc8be1bd182fe182a11e89a2a8d9d65fbe47', '[\"*\"]', '2026-04-01 01:22:15', NULL, '2026-04-01 01:22:06', '2026-04-01 01:22:15'),
(85, 'App\\Models\\User', 1, 'admin-token', 'e9ba4b0ca0f77064e6e41d7a89d2c301e12dc38c149ed5ba56c3e7354088373a', '[\"*\"]', '2026-04-01 01:36:53', NULL, '2026-04-01 01:32:01', '2026-04-01 01:36:53'),
(86, 'App\\Models\\User', 1, 'admin-token', '44fb2083fb60a2f8bf7599056ecc456664343063b04159cca0536f510399c7d5', '[\"*\"]', '2026-04-01 01:37:10', NULL, '2026-04-01 01:37:07', '2026-04-01 01:37:10'),
(87, 'App\\Models\\User', 1, 'admin-token', 'fc7ac395f0277b076a59768b2c17443e5ee0423f06e94f1af1e9e8eab01e3f3b', '[\"*\"]', '2026-04-01 02:12:43', NULL, '2026-04-01 02:07:36', '2026-04-01 02:12:43'),
(88, 'App\\Models\\User', 1, 'admin-token', 'bc8744077469a55e06aaccba1819991f5b7b1e086ef9b52fe021438dbdd38c9b', '[\"*\"]', '2026-04-01 02:16:00', NULL, '2026-04-01 02:12:56', '2026-04-01 02:16:00'),
(89, 'App\\Models\\User', 1, 'admin-token', '9da7fb388575af85f9c120c03fa1f55ba4235fed0db76260864761922db736e1', '[\"*\"]', '2026-04-01 02:25:16', NULL, '2026-04-01 02:16:13', '2026-04-01 02:25:16'),
(90, 'App\\Models\\User', 1, 'admin-token', '91898b49b919c21ed2c55e959db9342c169f6dbc9864bdd2cefbb47fb89237d7', '[\"*\"]', '2026-04-01 02:26:41', NULL, '2026-04-01 02:25:46', '2026-04-01 02:26:41'),
(91, 'App\\Models\\User', 1, 'admin-token', '2432ba87c5c27d749841da008deb9bfe620db68e8e7c218fb9bd069e1ef2fffc', '[\"*\"]', '2026-04-01 02:52:53', NULL, '2026-04-01 02:27:03', '2026-04-01 02:52:53'),
(92, 'App\\Models\\User', 1, 'admin-token', 'c01799341573ecc3c98c6acd306b07be2c3815815ffaba0fe63beac583ec7776', '[\"*\"]', '2026-04-01 02:54:07', NULL, '2026-04-01 02:53:21', '2026-04-01 02:54:07'),
(93, 'App\\Models\\User', 1, 'admin-token', '3bef3d825a08322fbeb1591eda0890f1c6d498ff89704922b44245bc05e94a10', '[\"*\"]', '2026-04-01 19:23:11', NULL, '2026-04-01 19:20:02', '2026-04-01 19:23:11'),
(94, 'App\\Models\\User', 1, 'admin-token', '1d2d1b57b969db92da309871bb8acbd7f95c2a835b6f4e7262663a0220eed4a1', '[\"*\"]', '2026-04-01 19:29:58', NULL, '2026-04-01 19:29:45', '2026-04-01 19:29:58'),
(95, 'App\\Models\\User', 1, 'admin-token', 'b4a0b9e7fe99e0bcfcb930747a6b6624fdf840a7799b7eadeea4ac01229f50f6', '[\"*\"]', '2026-04-01 19:38:11', NULL, '2026-04-01 19:30:52', '2026-04-01 19:38:11'),
(96, 'App\\Models\\User', 1, 'admin-token', '06aa584cd840018c691acf02d340f8477b0c08812f5f67721c97473e325d83f7', '[\"*\"]', '2026-04-01 19:39:39', NULL, '2026-04-01 19:38:31', '2026-04-01 19:39:39'),
(97, 'App\\Models\\User', 1, 'admin-token', '945d2327bed0482d6fc644ba074f7c5744aa83ddb1d9454b232a4af842737665', '[\"*\"]', '2026-04-01 19:49:25', NULL, '2026-04-01 19:40:08', '2026-04-01 19:49:25'),
(98, 'App\\Models\\User', 1, 'admin-token', '19221baad92850e942e3ef002f8fcad36acbcfeb8619fb42a61076c6f3444e04', '[\"*\"]', '2026-04-01 19:53:02', NULL, '2026-04-01 19:49:43', '2026-04-01 19:53:02'),
(99, 'App\\Models\\User', 1, 'admin-token', '94491ee9b1d4f3c73134200b995d1458f4e95b2bce64ba5e290b1e0234fd7de1', '[\"*\"]', '2026-04-01 19:59:43', NULL, '2026-04-01 19:53:44', '2026-04-01 19:59:43'),
(100, 'App\\Models\\User', 1, 'admin-token', '657c02a2a28f85627a8947a71b2ba693b3942483caeb8469865f94eb99f8444c', '[\"*\"]', '2026-04-01 20:08:23', NULL, '2026-04-01 20:00:05', '2026-04-01 20:08:23'),
(101, 'App\\Models\\User', 1, 'admin-token', '8d3b8a9a8b1bcaa5c6f154a2b45fefb8e8244f3794d92b87cbc5523c0f1b2be9', '[\"*\"]', '2026-04-01 20:18:59', NULL, '2026-04-01 20:08:39', '2026-04-01 20:18:59'),
(102, 'App\\Models\\User', 1, 'admin-token', '043f94184c1f5fb968c25cb2835d42e132b00c463f218fe215d2c36ca85c1853', '[\"*\"]', '2026-04-01 20:21:18', NULL, '2026-04-01 20:19:19', '2026-04-01 20:21:18'),
(103, 'App\\Models\\User', 1, 'admin-token', '881afbc4499ca63a3160d1a7b4d705e7452ce5efab9d675cfe2aeff339fbdea9', '[\"*\"]', '2026-04-01 20:29:31', NULL, '2026-04-01 20:21:43', '2026-04-01 20:29:31'),
(104, 'App\\Models\\User', 1, 'admin-token', '25db23fb918e612bd81411c79316ec10ef980fc94591679c6338dd56b5a0b893', '[\"*\"]', '2026-04-01 20:32:34', NULL, '2026-04-01 20:30:26', '2026-04-01 20:32:34'),
(105, 'App\\Models\\User', 1, 'admin-token', '96d7fae230ba64cb6ccbbd7b925464fcbc1c1524665da4ce664924bdf963c30c', '[\"*\"]', '2026-04-01 20:32:59', NULL, '2026-04-01 20:32:56', '2026-04-01 20:32:59'),
(106, 'App\\Models\\User', 1, 'admin-token', 'f8f0d3d6cfbaa0189a98539c342c56a68b856eb8e9912a0e27ab71c26fba056e', '[\"*\"]', '2026-04-01 20:58:57', NULL, '2026-04-01 20:56:32', '2026-04-01 20:58:57'),
(107, 'App\\Models\\User', 1, 'admin-token', '497047232441c7c0b4c77c1c834f3faeb8afbf3ca3cc7ef225d62d7361ddfe2e', '[\"*\"]', '2026-04-01 21:13:34', NULL, '2026-04-01 20:59:14', '2026-04-01 21:13:34'),
(108, 'App\\Models\\User', 1, 'admin-token', '18a51bb8308c29c80366293adc9f201b95605c531f8c63f02174386d870e69d3', '[\"*\"]', '2026-04-01 21:16:33', NULL, '2026-04-01 21:13:57', '2026-04-01 21:16:33'),
(109, 'App\\Models\\User', 1, 'admin-token', '24b30c49b178ddd50852c43a073481892856323e1fc75e29f018a27bb9085f81', '[\"*\"]', '2026-04-01 21:25:31', NULL, '2026-04-01 21:16:52', '2026-04-01 21:25:31'),
(110, 'App\\Models\\User', 1, 'admin-token', '6bc8bed11cebd0c04006db0f10effca1d2045b5459c8bf64e2a9f2133271c4f5', '[\"*\"]', '2026-04-01 21:37:02', NULL, '2026-04-01 21:25:47', '2026-04-01 21:37:02'),
(111, 'App\\Models\\User', 1, 'admin-token', '8513517fe1092fc88bfd1fdbdb87e7dcadbcef7823e4e8dc6ad906b96d420586', '[\"*\"]', '2026-04-01 21:40:08', NULL, '2026-04-01 21:37:49', '2026-04-01 21:40:08'),
(112, 'App\\Models\\User', 1, 'admin-token', '4f8b3c2d0d02589976b3f5d3ac36ce73df72a4e2f119629df7c793933a0ca5a3', '[\"*\"]', '2026-04-01 21:44:05', NULL, '2026-04-01 21:40:22', '2026-04-01 21:44:05'),
(113, 'App\\Models\\User', 1, 'admin-token', 'bdaf7f196c3a70885983f15e373982f2b80786a37d4231bc7b4f7038d53f0c21', '[\"*\"]', '2026-04-01 21:45:17', NULL, '2026-04-01 21:44:26', '2026-04-01 21:45:17'),
(114, 'App\\Models\\User', 1, 'admin-token', 'bda0714b7a1ecca8ea58eae24e0787aebc050454b2d2ff3d08472c6b7cddbd7b', '[\"*\"]', '2026-04-01 21:47:39', NULL, '2026-04-01 21:45:36', '2026-04-01 21:47:39'),
(115, 'App\\Models\\User', 1, 'admin-token', '2e93a01000f15cdd7f8655e432944980c16bac0308ab53100e64345c7bdb0af8', '[\"*\"]', '2026-04-01 21:49:22', NULL, '2026-04-01 21:47:55', '2026-04-01 21:49:22'),
(116, 'App\\Models\\User', 1, 'admin-token', '75dc16d6f9529466d8400fd05a20a30670f127a35749f61760c79c97067f157f', '[\"*\"]', '2026-04-01 21:50:52', NULL, '2026-04-01 21:49:41', '2026-04-01 21:50:52'),
(117, 'App\\Models\\User', 1, 'admin-token', '89bfd1d2c31c99af0e718b01b09e1f71ff552937bf1c400249d8e4172056ca1f', '[\"*\"]', '2026-04-01 21:55:38', NULL, '2026-04-01 21:51:03', '2026-04-01 21:55:38'),
(118, 'App\\Models\\User', 1, 'admin-token', 'de3931a18b6db4dd468604c0ace329edb008d1e40a1deea05447d950579acd14', '[\"*\"]', '2026-04-01 21:59:14', NULL, '2026-04-01 21:55:55', '2026-04-01 21:59:14'),
(119, 'App\\Models\\User', 1, 'admin-token', '8ed352a89c0855e7da413911c46462ac807a8236b813c706790f94491d1287bd', '[\"*\"]', '2026-04-01 22:00:46', NULL, '2026-04-01 21:59:32', '2026-04-01 22:00:46'),
(120, 'App\\Models\\User', 1, 'admin-token', '885972462d9b14850281e156423ea6218901c6f495f812623730b2cd1b9561eb', '[\"*\"]', '2026-04-01 23:08:17', NULL, '2026-04-01 22:01:08', '2026-04-01 23:08:17'),
(121, 'App\\Models\\User', 1, 'admin-token', '9ee7a5606c95b3d080be961e1b8ea89b1338cf8e343f1727c7a4cb0698bc9202', '[\"*\"]', '2026-04-01 23:37:54', NULL, '2026-04-01 23:34:18', '2026-04-01 23:37:54'),
(122, 'App\\Models\\User', 1, 'admin-token', '7ed83a2f7597f18f2b17bcbd7910d2199bca92b3b07b6c2a1f25f50853256486', '[\"*\"]', '2026-04-01 23:55:21', NULL, '2026-04-01 23:38:23', '2026-04-01 23:55:21'),
(123, 'App\\Models\\User', 1, 'admin-token', '883fa9a70469fc0b4c8b0d31a856fa456cd69873546e6d0f4324edc2633a736f', '[\"*\"]', '2026-04-02 00:05:44', NULL, '2026-04-01 23:55:42', '2026-04-02 00:05:44'),
(124, 'App\\Models\\User', 1, 'admin-token', 'a9032428ac96392b44edc9c6ffcf9402566d14598fb7228ae66b681fe18c274c', '[\"*\"]', '2026-04-02 00:08:17', NULL, '2026-04-02 00:06:02', '2026-04-02 00:08:17'),
(125, 'App\\Models\\User', 1, 'admin-token', 'a9440fb92b967bfda1dd0aa9ccceabe7b455ae30f2e852398e0bca10133b30be', '[\"*\"]', '2026-04-02 00:16:05', NULL, '2026-04-02 00:08:27', '2026-04-02 00:16:05'),
(126, 'App\\Models\\User', 1, 'admin-token', '92d5ca4762ab2efc4c7cc45aab832e36b15c0d607ec5d97b7799b2e6c751ee78', '[\"*\"]', '2026-04-02 00:23:41', NULL, '2026-04-02 00:16:24', '2026-04-02 00:23:41'),
(127, 'App\\Models\\User', 1, 'admin-token', 'ab502c7fd57b6b7cc7037f24821e0ebfa88d1cad12af1536c529ff336310fcb6', '[\"*\"]', '2026-04-02 00:31:20', NULL, '2026-04-02 00:25:19', '2026-04-02 00:31:20'),
(128, 'App\\Models\\User', 1, 'admin-token', '7f21487c79706968b8feec33be8ce5564e924f06e67a18d56250ca54bbab6c50', '[\"*\"]', '2026-04-02 00:32:57', NULL, '2026-04-02 00:32:10', '2026-04-02 00:32:57'),
(129, 'App\\Models\\User', 1, 'admin-token', 'b825a68689025f7cc447b31ed59f27bf3ebe891f785728fe4a4a7f722f7e84a1', '[\"*\"]', '2026-04-02 00:40:32', NULL, '2026-04-02 00:33:09', '2026-04-02 00:40:32'),
(130, 'App\\Models\\User', 1, 'admin-token', 'c7ad94b218205a6d1ec822e3807eb9813a95e2106c84ec79fc0bdb2a35497099', '[\"*\"]', '2026-04-02 00:43:52', NULL, '2026-04-02 00:40:55', '2026-04-02 00:43:52'),
(131, 'App\\Models\\User', 1, 'admin-token', 'c1f0bf1e81a932ce4484995bda9a69a7b31b4f8c1632cf19b7a547c91673b6f7', '[\"*\"]', '2026-04-02 00:50:20', NULL, '2026-04-02 00:44:35', '2026-04-02 00:50:20'),
(132, 'App\\Models\\User', 1, 'admin-token', '2d28e73945e5f95db4c433ef12847e51dcccb59d560b45514ff37ef298f67f5c', '[\"*\"]', '2026-04-02 00:56:18', NULL, '2026-04-02 00:50:41', '2026-04-02 00:56:18'),
(133, 'App\\Models\\User', 1, 'admin-token', 'fa0ee5b296171546a3dbf4700552c9112e8ccf9d141be56b78ebf7105a77901b', '[\"*\"]', '2026-04-02 01:04:14', NULL, '2026-04-02 00:57:53', '2026-04-02 01:04:14'),
(134, 'App\\Models\\User', 1, 'admin-token', 'b5f98fef648128ca147bc4a356ca052a833f95285aa6d646097326c142021013', '[\"*\"]', '2026-04-02 01:09:02', NULL, '2026-04-02 01:04:38', '2026-04-02 01:09:02'),
(135, 'App\\Models\\User', 1, 'admin-token', '828c5ee4dbde09c96ad7b9714766894f3093d5e73fd238f4df4d891e9f28954d', '[\"*\"]', '2026-04-02 01:21:09', NULL, '2026-04-02 01:09:14', '2026-04-02 01:21:09'),
(136, 'App\\Models\\User', 1, 'admin-token', 'fca5ce5854447075170e16a6fad5a5c446f0728f73cdebb485b7f923f90cf0db', '[\"*\"]', '2026-04-02 02:42:44', NULL, '2026-04-02 01:21:53', '2026-04-02 02:42:44'),
(137, 'App\\Models\\User', 1, 'admin-token', '675d87b95e2c32ba336ba50e95750f800d4db3e485295c06cc3a4a6a3b609a44', '[\"*\"]', '2026-04-06 19:13:00', NULL, '2026-04-06 19:12:54', '2026-04-06 19:13:00'),
(138, 'App\\Models\\User', 1, 'admin-token', '4aec1f4c73640ae7ff0a7a4de3463177a39087403d9ed3dce4e9ed8defccb155', '[\"*\"]', '2026-04-07 02:13:12', NULL, '2026-04-07 01:19:26', '2026-04-07 02:13:12'),
(139, 'App\\Models\\User', 1, 'admin-token', 'd690a8ce8a1c5f8472ab6e3311691a427d07b11f561200736477253596f4f918', '[\"*\"]', '2026-04-07 02:30:28', NULL, '2026-04-07 02:13:32', '2026-04-07 02:30:28'),
(140, 'App\\Models\\User', 1, 'admin-token', '2152faf9b752cdf68dba706e4e072929c9c3214bfec6448c941e23fd1df362dd', '[\"*\"]', '2026-04-07 19:36:59', NULL, '2026-04-07 19:15:08', '2026-04-07 19:36:59'),
(141, 'App\\Models\\User', 1, 'admin-token', '081933615b458400d153bebc51e1e0d7d463c1b9e0397c7f209a47b59dc9f941', '[\"*\"]', '2026-04-07 19:43:45', NULL, '2026-04-07 19:37:22', '2026-04-07 19:43:45'),
(142, 'App\\Models\\User', 1, 'admin-token', '5562f6db229626704f71786115ada666caff3a3f7f9162cf70f917cff4dfcaf9', '[\"*\"]', '2026-04-07 19:46:50', NULL, '2026-04-07 19:44:09', '2026-04-07 19:46:50'),
(143, 'App\\Models\\User', 1, 'admin-token', 'ecaadc123fca80af1b50e9143235fa5b2d53a5e42afc40538f09af9d4c61748e', '[\"*\"]', '2026-04-07 19:54:27', NULL, '2026-04-07 19:47:09', '2026-04-07 19:54:27'),
(144, 'App\\Models\\User', 1, 'admin-token', '2743cb832eedec42f979d661794c920b6d2de3c1cbc8df87329a28f52fb9d4b4', '[\"*\"]', '2026-04-07 20:07:26', NULL, '2026-04-07 20:01:05', '2026-04-07 20:07:26'),
(145, 'App\\Models\\User', 1, 'admin-token', '6bafbcf873ac9f9fcd020644379941b7d113012b06d33b66ea3848c31674cda4', '[\"*\"]', '2026-04-07 20:14:27', NULL, '2026-04-07 20:08:22', '2026-04-07 20:14:27'),
(146, 'App\\Models\\User', 1, 'admin-token', '18250ad43eb4199a81f3a60fc2a594e84b0731ffd118d8ebc6da7f74f88aa902', '[\"*\"]', '2026-04-07 20:21:35', NULL, '2026-04-07 20:14:48', '2026-04-07 20:21:35'),
(147, 'App\\Models\\User', 1, 'admin-token', 'f7a288ca2a36317c587185c070b5922727f0b825e2f2d26457d868e6eef3f08c', '[\"*\"]', '2026-04-07 21:07:01', NULL, '2026-04-07 20:21:58', '2026-04-07 21:07:01'),
(148, 'App\\Models\\User', 1, 'admin-token', '082bbbd76039826c909405cfb3241f219660d81a888a86a7d8b74b0901c4462d', '[\"*\"]', '2026-04-07 21:57:19', NULL, '2026-04-07 21:07:25', '2026-04-07 21:57:19'),
(149, 'App\\Models\\User', 1, 'admin-token', 'b8064a7f92479c84921b3c5c8f13218e85a6b4e4c0ddcb7d28bb3cb3b8a94b25', '[\"*\"]', '2026-04-07 21:59:12', NULL, '2026-04-07 21:58:02', '2026-04-07 21:59:12'),
(150, 'App\\Models\\User', 1, 'admin-token', 'a1576ad46117b722d1bc27b5ba7f5ebc152c7ee8057af48d5f39b05298a52b45', '[\"*\"]', '2026-04-07 23:10:31', NULL, '2026-04-07 21:59:24', '2026-04-07 23:10:31');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('dhtvivpBc1FTEwQs1BtLCTQ9mV9x5mTamOuwVvJD', 1, '192.168.1.149', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/146.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiQzI3UEozUloydGtDblNESU5KbHp4OG96SzROZzF6UGhIU0FoZzl6ciI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6Mzg6Imh0dHA6Ly8xOTIuMTY4LjEuOTQ6ODAwMC9hdXRoL2thdGVnb3JpIjtzOjU6InJvdXRlIjtzOjE0OiJrYXRlZ29yaS5pbmRleCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7fQ==', 1775629459),
('iB59iZsJKwvHI3gmab8JeLqR3LUuii4qiR26Jazz', 1, '192.168.1.94', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/146.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoidVBxZ0VlaU1UNVVIQmR4U1IzM2paRm1mU1pqQ0pQVzRHamRaMjc1WSI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6NTE6Imh0dHA6Ly8xOTIuMTY4LjEuOTQ6ODAwMC9kb2t1bWVudGFzaS9kb2t1bWVudGFzaS8xOCI7czo1OiJyb3V0ZSI7czoxNjoiZG9rdW1lbnRhc2kuc2hvdyI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7fQ==', 1775555921);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT 0,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `role` enum('admin') NOT NULL DEFAULT 'admin'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `is_admin`, `remember_token`, `created_at`, `updated_at`, `role`) VALUES
(1, 'hy', 'hy@gmail.com', NULL, '$2y$12$dE9FasQ1SbbLcCi/MUsDeOCWGmWarz0GS7VWnYV22UHPs5Tcrlo9a', 0, NULL, '2026-03-08 19:55:19', '2026-03-08 19:55:19', 'admin'),
(2, 'cctva', 'cctv@gmail.com', NULL, '$2y$12$EDJAdt.cv5i..H1uFfE1ROF9M0NtZxlBUEUh8jaSgf..WOVHxwat6', 0, NULL, '2026-03-30 23:58:28', '2026-03-30 23:58:28', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bagian`
--
ALTER TABLE `bagian`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`),
  ADD KEY `cache_expiration_index` (`expiration`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`),
  ADD KEY `cache_locks_expiration_index` (`expiration`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `halaman`
--
ALTER TABLE `halaman`
  ADD PRIMARY KEY (`id`),
  ADD KEY `halaman_kategori_id_foreign` (`kategori_id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kategori_bagian_id_foreign` (`bagian_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifikasi`
--
ALTER TABLE `notifikasi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notifikasi_user_id_foreign` (`user_id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`),
  ADD KEY `personal_access_tokens_expires_at_index` (`expires_at`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

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
-- AUTO_INCREMENT for table `bagian`
--
ALTER TABLE `bagian`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `halaman`
--
ALTER TABLE `halaman`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `notifikasi`
--
ALTER TABLE `notifikasi`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=151;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `halaman`
--
ALTER TABLE `halaman`
  ADD CONSTRAINT `halaman_kategori_id_foreign` FOREIGN KEY (`kategori_id`) REFERENCES `kategori` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `kategori`
--
ALTER TABLE `kategori`
  ADD CONSTRAINT `kategori_bagian_id_foreign` FOREIGN KEY (`bagian_id`) REFERENCES `bagian` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `notifikasi`
--
ALTER TABLE `notifikasi`
  ADD CONSTRAINT `notifikasi_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
