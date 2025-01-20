-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 20, 2025 at 04:32 AM
-- Server version: 8.0.30
-- PHP Version: 8.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `carensy`
--

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `total_amount` decimal(10,2) NOT NULL DEFAULT '0.00',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`id`, `user_id`, `total_amount`, `created_at`, `updated_at`) VALUES
(3, 1, '0.00', '2025-01-19 20:26:57', '2025-01-19 20:31:06');

-- --------------------------------------------------------

--
-- Table structure for table `cart_items`
--

CREATE TABLE `cart_items` (
  `id` bigint UNSIGNED NOT NULL,
  `cart_id` bigint UNSIGNED DEFAULT NULL,
  `product_id` bigint UNSIGNED NOT NULL,
  `transaction_id` bigint UNSIGNED DEFAULT NULL,
  `quantity` int NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `histori_items`
--

CREATE TABLE `histori_items` (
  `id` bigint UNSIGNED NOT NULL,
  `histori_transaksi_id` bigint UNSIGNED NOT NULL,
  `product_id` bigint UNSIGNED NOT NULL,
  `quantity` int NOT NULL,
  `price` decimal(13,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `histori_items`
--

INSERT INTO `histori_items` (`id`, `histori_transaksi_id`, `product_id`, `quantity`, `price`, `created_at`, `updated_at`) VALUES
(2, 1, 4, 1, '630000.00', '2025-01-19 20:08:50', '2025-01-19 20:08:50'),
(3, 2, 5, 1, '150000.00', '2025-01-19 20:10:40', '2025-01-19 20:10:40');

-- --------------------------------------------------------

--
-- Table structure for table `histori_transaksis`
--

CREATE TABLE `histori_transaksis` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `tanggal_pinjam` date NOT NULL,
  `tanggal_kembali` date NOT NULL,
  `kode_transaksi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat_now` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat_ktp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `histori_transaksis`
--

INSERT INTO `histori_transaksis` (`id`, `user_id`, `tanggal_pinjam`, `tanggal_kembali`, `kode_transaksi`, `alamat_now`, `alamat_ktp`, `email`, `created_at`, `updated_at`) VALUES
(1, 1, '2025-01-21', '2025-01-22', '198c8447-2858-4b5e-843b-dab45fb17dca', 'Jl. Poltek', 'Jl. Poltek', 'xixixixi@gmail.com', '2025-01-19 20:08:50', '2025-01-19 20:08:50'),
(2, 1, '2025-01-21', '2025-01-22', '090ec1ac-3126-449d-9278-dd8c8c9a8d6c', 'Jl. Poltek', 'Jl. Poltek', 'xixixixi@gmail.com', '2025-01-19 20:10:40', '2025-01-19 20:10:40');

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
(1, '2024_12_16_125936_create_users_table', 1),
(2, '2024_12_17_075711_create_cache_table', 1),
(3, '2024_12_17_075959_create_sessions_table', 1),
(4, '2024_12_19_014254_create_products_table', 1),
(5, '2024_12_25_042254_create_carts_table', 1),
(6, '2024_12_25_075813_create_profiles_table', 1),
(7, '2024_12_26_040216_create_transactions_table', 1),
(8, '2024_12_26_040217_create_cart_items_table', 1),
(9, '2024_12_26_151257_create_history_transaksis_table', 1),
(10, '2024_12_26_151325_create_history_items_table', 1),
(11, '2024_12_28_021714_create_receipts_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint UNSIGNED NOT NULL,
  `kode_product` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_product` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `merek_product` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kategori_product` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `detail_product` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `tahun_rilis` date NOT NULL,
  `stock` int NOT NULL,
  `harga_sewa` decimal(13,2) NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `kode_product`, `nama_product`, `merek_product`, `kategori_product`, `detail_product`, `tahun_rilis`, `stock`, `harga_sewa`, `image`, `created_at`, `updated_at`) VALUES
(2, 'K002', 'Fujifilm X-T300', 'FujiFilm', 'Kamera', 'Vantage camera with 17500 px', '2024-12-10', 1, '250000.00', 'img/produk/cam6.jpeg', '2024-12-29 16:09:10', '2025-01-01 16:39:17'),
(4, 'K004', 'Sony FIXCAM', 'Sony', 'Kamera', 'Kamera syuting terbaik 2050', '2024-12-29', 9, '630000.00', 'img/produk/cam3.jpeg', '2024-12-31 16:36:01', '2025-01-19 20:08:50'),
(5, 'G001', 'Gimbal C-002', 'Dll', 'Gimbal', 'Gimbal dengan ke stabilan seperti kepala ayam', '2024-12-31', 3, '150000.00', 'img/produk/Screenshot 2024-12-23 101003.png', '2024-12-31 16:37:51', '2025-01-19 20:10:40'),
(6, 'K004', 'Nikon Z fc', 'Nikon', 'Kamera', 'NIKONIKONI', '2024-12-29', 3, '500000.00', 'img/produk/review-kamera-nikon-z-fc_169.jpeg', '2024-12-31 16:39:53', '2025-01-01 16:39:25'),
(7, 'G002', 'Insta 360 Flow', 'Dll', 'Gimbal', 'Gimbal yang bisa berputar 360 derajat', '2024-12-29', 12, '75000.00', 'img/produk/Screenshot 2025-01-01 164057.png', '2024-12-31 16:43:12', '2025-01-01 15:47:16'),
(8, 'L001', 'Sigma 50mm F1.4 Art DG HSM Lens', 'Dll', 'Lensa', 'Lensa super cepat dengan aperture f/1.4 benar-benar lensa yang bagus untuk dimiliki jika Anda memiliki uang ekstra. Ini akan memberi Anda keunggulan yang Anda butuhkan dalam situasi cahaya redup, serta menghasilkan depth of field yang lebih dangkal untuk bokeh Anda (latar belakang buram).', '2024-12-31', 3, '400000.00', 'img/produk/Screenshot 2025-01-01 164351.png', '2024-12-31 16:45:20', '2025-01-01 16:42:46'),
(9, 'L002', 'Sony 24-70mm f/2.8 DSLR lenses', 'Sony', 'Lensa', 'Setiap merek besar memiliki lensa 24-70mm f/2.8, tetapi lensa ini ditujukan untuk para profesional.', '2024-12-31', 2, '700000.00', 'img/produk/Screenshot 2025-01-01 164558.png', '2024-12-31 16:47:43', '2024-12-31 16:47:43'),
(10, 'T001', 'Manfrotto', 'Dll', 'Tripod', 'Dirancang untuk mendukung muatan yang besar, tripod ini memiliki berat lebih dari 2 kg sendiri dan memiliki ketinggian maksimum hingga 150 cm.   Tapi tenang saja, karena tinggi tripod ini normalnya hanya memakan 40 cm saja sehingga dapat kamu masukan ke dalam tas', '2024-12-11', 5, '150000.00', 'img/produk/Screenshot 2025-01-01 164956.png', '2024-12-31 16:51:10', '2025-01-01 15:46:58'),
(11, 'T002', 'Takara', 'Dll', 'Tripod', 'Produk Takara tripod kamu dapat memanjangkan leher tripod ini hingga 145 cm. Dengan kekohoan tersebut, berat tripod ini hanya 850 gram.  Kaki yang menopang nya hingga dapat digunakan dengan stabil dan konsisten adalah 3 kaki section yang berbahan alumunium nya.', '2024-07-15', 9, '50000.00', 'img/produk/Screenshot 2025-01-01 165009.png', '2024-12-31 16:51:51', '2025-01-01 15:46:44'),
(12, 'K005', 'Canon EOS 5D', 'Canon', 'Kamera', 'Kamera lengkap dengan lensa tambahan', '2024-12-10', 1, '1200000.00', 'img/produk/cam5.jpeg', '2024-12-31 17:14:52', '2025-01-01 16:39:21'),
(13, 'K006', 'Sony HXR-MC2500', 'Sony', 'Kamera', 'Kamera video dilengkapi dengan mic tambahan serta mampu zoom 50x', '2024-09-24', 3, '1500000.00', 'img/produk/hxr-mc2500.jpg', '2024-12-31 17:17:25', '2024-12-31 17:17:25'),
(14, 'K007', 'Nikon COOLPIX', 'Nikon', 'Kamera', 'Kamera yang seukuran kanton dan mudah dibawa', '2024-12-30', 3, '450000.00', 'img/produk/Screenshot 2025-01-01 171825.png', '2024-12-31 17:19:37', '2024-12-31 17:19:37'),
(15, 'K008', 'FujiFilm X-S20', 'FujiFilm', 'Kamera', 'Untuk pertama kalinya dalam model seri X-S, sensor X Trans CMOS 4 26,1 megapiksel dipasangkan dengan mesin pencitraan X-Processor 5, menghasilkan pemrosesan gambar dan video berkecepatan tinggi, kecepatan dan akurasi fokus otomatis yang lebih baik, FUJIFILM color science, dan stabilisasi IBIS (In-Body Image Stabilization) hingga tujuh stops. X-S20 unggul dalam video dan menampilkan mode Vlog yang memungkinkan rekaman berkualitas profesional dengan penyesuaian pengaturan layar sentuh yang mudah saat merekam.', '2024-09-17', 4, '350000.00', 'img/produk/Screenshot 2025-01-01 172101.png', '2024-12-31 17:22:08', '2024-12-31 17:22:08'),
(16, 'G003', 'Leofoto PG-1 Gimbal Tripod Head', 'Dll', 'Gimbal', 'Bepergianlah dengan ringan dengan Leofoto PG-1 Gimbal Head hitam 2,2 lb, yang dibuat dari aluminium T6061. Seiring dengan tripod ringan Anda, ini memungkinkan Anda untuk melakukan perjalanan jarak yang lebih jauh dengan pengaturan Anda dengan nyaman. Kepala gimbal memungkinkan Anda menangkap subjek yang bergerak cepat dengan lensa telefoto besar dan berat yang tidak dapat Anda lakukan hanya dengan memegang lensa dengan tangan.', '2024-11-06', 4, '250000.00', 'img/produk/Screenshot 2025-01-02 153647.png', '2025-01-01 15:37:36', '2025-01-01 15:37:36'),
(17, 'G004', 'Feiyu Scrop Pro F4 3-Axis Handheld Gimbal Stabilizer', 'Dll', 'Gimbal', 'FeiyuTech Scorp adalah desain baru penstabil gimbal genggam 3 sumbu untuk DSLR dan Kamera Mirrorless. Ini memiliki pegangan pegangan belakang underslung terintegrasi untuk pengalaman pemotretan yang lebih baik. 5.5lbs payload, yang dapat mendukung sebagian besar kamera Sony, Canon, Panasonic Lumix, Nikon, Fujifilm. Ini juga dapat mendukung motor fokus untuk kontrol fokus dan zoom yang lebih baik.', '2024-11-04', 2, '180000.00', 'img/produk/Screenshot 2025-01-02 153804.png', '2025-01-01 15:39:41', '2025-01-01 15:39:41'),
(18, 'T003', 'Tripod Bexin', 'Dll', 'Tripod', 'Mini tripod ini sangat praktis untuk dibawa kemana-mana karena bentuknya yang kecil. Selain itu, alat tripod ini sangat kokoh dan stabil, sehingga dapat kamu gunakan dengan kualitas yang tidak perlu dihiraukan lagi.  Dipersenjati dengan ball head untuk mendapatkan kemudahan mengambil sudut hingga 360 derajat untuk profesional fotografi.', '2024-12-30', 3, '90000.00', 'img/produk/Screenshot 2025-01-02 154432.png', '2025-01-01 15:45:45', '2025-01-01 15:45:45'),
(19, 'T004', 'Gorilla MaxiGrip Flexible Tripod', 'Dll', 'Tripod', 'Gorilla MaxiGrip Flexible yang punya tiga kaki kuat dan fleksibel, ini bisa menunjang berat hingga 3 kg.', '2025-01-01', 1, '85000.00', 'img/produk/Screenshot 2025-01-02 154910.png', '2025-01-01 15:50:03', '2025-01-01 15:50:03'),
(20, 'L003', '7Artisans 35mm F1.2', 'Canon', 'Lensa', 'Brand 7Artisans ini dikenal memiliki lensa berkualitas yang dapat melengkapi berbagai merk kamera profesional denga sensor APS-C. Seperti kamera Fujifilm, Canon, Sony, Olympus, dan lain sebagainya.', '2024-12-29', 4, '150000.00', 'img/produk/Screenshot 2025-01-02 155103.png', '2025-01-01 15:51:59', '2025-01-01 15:51:59'),
(21, 'L004', 'Canon EF-S 24mm f/2.8 STM', 'Canon', 'Lensa', 'Lensa dengan desain yang slim dan ringan serta motor autofocus yang canggih. Merupakan tipe lensa wide-angle yang dapat menangkap gambar dengan jangkauan yang lebih luas dan lebar. Cocok digunakan untuk pengambilan video dengan jangkauan pengambilan yang luas, fokus, smooth dan tanpa blur.', '2024-12-29', 2, '200000.00', 'img/produk/Screenshot 2025-01-02 155217.png', '2025-01-01 15:52:53', '2025-01-01 15:52:53'),
(22, 'LK001', 'National Geographic NG A4470', 'Dll', 'Dll', 'Kompartemen utamanya terdiri dari tiga bagian. Dimana satu saku untuk kamera dengan lensanya, satu lagi untuk smartphone dan dompet, sedangkan satu di bagian belakang untuk menempatkan barang-barang kecil dan datar. Tak hanya itu, pada bagian sisi kiri dan kanan ada dua buah saku kecil. Saku tersebut bisa digunakan menyimpan SD Card cadangan, lap mikrofiber, earphone, dan lainnya.', '2024-09-11', 2, '100000.00', 'img/produk/Screenshot 2025-01-02 155447.png', '2025-01-01 15:57:57', '2025-01-01 15:57:57'),
(23, 'LK002', 'Manfrotto NX CSC', 'Dll', 'Dll', 'Kompartemennya dapat disesuaikan dengan kebutuhan pengguna. Bahkan, tas juga bisa digunakan untuk menyimpan drone dengan ukuran mini. Jika dikustomisasi sedemikian rupa, tas dapat membawa laptop berukuran 15 inci maupun tablet.  Dimana setiap kompartemennya dilapisi dengan bantalan yang empuk. Membawa tripod pun tidak masalah, sebab pengguna dapat memanfaatkan strap khusus yang dimilikinya. Walaupun terlihat simpel, tas berukuran besar ini bisa digunakan indoor maupun outdoor.', '2024-12-17', 4, '85000.00', 'img/produk/Screenshot 2025-01-02 155838.png', '2025-01-01 15:59:36', '2025-01-01 15:59:36'),
(24, 'LK003', 'Canon Wireless Remote Controller RC-6', 'Canon', 'Dll', 'Berdesain sederhana dan praktis, ukuran release ini hanya sekitar 6,35 cm. Dengan ukuran yang kecil, release ini mudah dimasukkan ke dalam kantung. Walaupun kecil, produk ini dapat membantu Anda mengambil foto hingga jarak 4,8 meter.     Release ini juga dilengkapi fungsi mirror lock, bulb, dan delay shoot. Dengan fitur yang lengkap tersebut, Anda para pengguna kamera Canon profesional tentu tidak boleh melewatkan produk ini.', '2024-12-30', 2, '5000.00', 'img/produk/Screenshot 2025-01-02 160138.png', '2025-01-01 16:02:55', '2025-01-01 16:02:55'),
(25, 'LK004', 'Cuely Remote Switch ｜ MC-DC2', 'Dll', 'Dll', 'Dilihat dari desainnya yang simpel dan sederhana, Anda mungkin tidak terlalu berekspektasi terhadap produk ini. Terlebih lagi, untuk ukuran shutter release berkabel, harganya pun cukup terjangkau. Meski demikian, produk ini sudah dibekali fitur half press, dan lock untuk bulb, lho. Anda bisa menggunakan shutter release ini untuk foto resmi, selfie, video time lapse, dan lainnya', '2024-12-29', 5, '7500.00', 'img/produk/Screenshot 2025-01-02 160331.png', '2025-01-01 16:04:17', '2025-01-01 16:04:42'),
(26, 'K009', 'Panasonic Lumix DMC-GX80', 'Dll', 'Kamera', 'Kamera mirrorless dengan sensor four thirds dan resolusi kamera 16MP serta resolusi video maksimal 4K', '2024-12-29', 2, '430000.00', 'img/produk/Screenshot 2025-01-02 160649.png', '2025-01-01 16:09:38', '2025-01-01 16:11:57'),
(27, 'K010', 'Canon EOS M200', 'Canon', 'Kamera', 'Kamera dengan sensor APS-C dan resolusi sebesar 24,1MP', '2024-12-29', 2, '450000.00', 'img/produk/Screenshot 2025-01-02 161000.png', '2025-01-01 16:11:39', '2025-01-01 16:11:39'),
(28, 'K011', 'FujiFilm X-T200', 'FujiFilm', 'Kamera', 'Tipe kamera: Mirrorless,  Sensor: APS-C,  Resolusi kamera: 24,2 MP,  Layar: 3,5 inci, 2.780k, layar sentuh', '2024-12-31', 1, '450000.00', 'img/produk/Screenshot 2025-01-02 161231.png', '2025-01-01 16:13:55', '2025-01-01 16:13:55'),
(29, 'K012', 'Canon EOS 250D', 'Canon', 'Kamera', 'Tipe kamera: DSLR,  Sensor: APS-C,  Resolusi kamera: 24,1MP,  Layar: 3 inci, 1.040k, layar sentuh.  Lensa: Canon EF-S', '2024-12-30', 3, '750000.00', 'img/produk/Screenshot 2025-01-02 161433.png', '2025-01-01 16:15:57', '2025-01-01 16:15:57'),
(30, 'K013', 'Sony A6100', 'Sony', 'Kamera', 'Tipe kamera: Mirrorless  Sensor: APS-C  Resolusi kamera: 24,2 MP  Layar: 3 inci, TFT, layar sentuh  Lensa: Lensa E-mount Sony', '2024-12-30', 6, '800000.00', 'img/produk/Screenshot 2025-01-02 161623.png', '2025-01-01 16:17:11', '2025-01-01 16:17:11'),
(31, 'K014', 'Panasonic Lumix G100', 'Dll', 'Kamera', 'Tipe kamera: Mirrorless  Sensor: Micro Four Thirds  Resolusi kamera: 20,3 MP  Layar: 3 inci, 1.840k, layar sentuh  Lensa: Micro Four Thirds', '2024-12-31', 2, '950000.00', 'img/produk/Screenshot 2025-01-02 161726.png', '2025-01-01 16:18:45', '2025-01-01 16:18:45'),
(32, 'K015', 'Nikon D5600', 'Nikon', 'Kamera', 'Tipe kamera: DSLR  Sensor: APS-C  Resolusi kamera: 24,2 MP  Layar: 3,2 inci, 1.040k, layar sentuh  Lensa: 27-210mm', '2024-12-31', 2, '600000.00', 'img/produk/Screenshot 2025-01-02 162018.png', '2025-01-01 16:21:10', '2025-01-01 16:21:10'),
(33, 'K016', 'Niikon D3500', 'Nikon', 'Kamera', 'Tipe kamera: DLSR  Sensor: APS-C CMOS  Resolusi kamera: 24,2 MP  Layar: 3 inci, 921k  Lensa: Nikon DX', '2024-10-08', 1, '350000.00', 'img/produk/Screenshot 2025-01-02 162147.png', '2025-01-01 16:22:31', '2025-01-01 16:22:31'),
(34, 'K017', 'FujiFilm X70', 'FujiFilm', 'Kamera', 'Produk ini memiliki lensa fixed 18 mm (bisa disamakan kegunaannya dengan lensa 28 mm) dengan sensor 16,3 MP. Meskipun kecil, kamera ini terbuat dari bahan alloy yang kuat. Karena ukurannya tersebut, ia sangat mudah dimasukkan ke dalam saku atau tas pinggang kalian.', '2024-12-31', 2, '550000.00', 'img/produk/Screenshot 2025-01-02 162319.png', '2025-01-01 16:25:52', '2025-01-01 16:25:52'),
(35, 'K018', 'Sony FX3', 'Sony', 'Kamera', 'Sony FX3 dibekali dengan sensitivitas yang sangat tinggi serta ISO yang dapat ditingkatkan hingga 409.600 bahkan untuk kondisi pencahayaan yang sangat sulit sekalipun. productnation', '2024-12-31', 3, '2700000.00', 'img/produk/Screenshot 2025-01-02 162732.png', '2025-01-01 16:28:57', '2025-01-01 16:28:57'),
(36, 'K019', 'Olympus OM-D E-M10 Mark II', 'Dll', 'Kamera', 'Kamera ini dilengkapi Touch AF Shutter yang populer karena kecepatannya. Ia dapat menangkap ekspresi subjek yang bergerak dengan cepat secara akurat. Kamera mirrorless Olympus OM-D E-M10 Mark II cocok untuk menangkap momen sehari-hari bersama orang terdekat Anda. Model ini sangat direkomendasikan untuk Anda yang mencari kemudahan penggunaan.', '2024-12-29', 3, '250000.00', 'img/produk/Screenshot 2025-01-02 163041.png', '2025-01-01 16:31:43', '2025-01-01 16:31:43'),
(38, 'K021', 'SAMSUNG SMART CAMERA NX210', 'Dll', 'Kamera', 'Samsung NX210 dapat bekerja sempurna dengan ketepatan tinggi tanpa waktu lama dengan dukungan ultra-high speed Auto Focus (AF) yang ciamik. Samsung NX210 juga dibekali dengan ISO Sensitivity hingga 12.800, sehingga dapat menghasilkan foto pada kondisi low light secara sempurna, tanpa flash sekalipun. Samsung NX210 juga mampu menghasilkan bidik sempurna dengan teknologi 1080 30p Full HD Movie Recording.', '2024-12-29', 2, '650000.00', 'img/produk/Screenshot 2025-01-02 163206.png', '2025-01-01 16:42:07', '2025-01-01 16:42:07');

-- --------------------------------------------------------

--
-- Table structure for table `profiles`
--

CREATE TABLE `profiles` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `foto_profile` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` enum('L','P') COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_telp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat_now` text COLLATE utf8mb4_unicode_ci,
  `alamat_ktp` text COLLATE utf8mb4_unicode_ci,
  `media_sosial` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `profiles`
--

INSERT INTO `profiles` (`id`, `user_id`, `foto_profile`, `gender`, `no_telp`, `alamat_now`, `alamat_ktp`, `media_sosial`, `email`, `created_at`, `updated_at`) VALUES
(1, 1, 'profile_pictures/Dpqhu0y3rz4NsFb5qsCvaC2QVdWwnicVYjtJuvT7.png', 'L', '081329756879', NULL, 'Jl. Poltek', NULL, 'xixixixi@gmail.com', '2025-01-19 20:02:37', '2025-01-19 20:02:37');

-- --------------------------------------------------------

--
-- Table structure for table `receipts`
--

CREATE TABLE `receipts` (
  `id` bigint UNSIGNED NOT NULL,
  `receipt_no` varchar(4) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_pinjam` date NOT NULL,
  `tgl_kembali` date NOT NULL,
  `transaction_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
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
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('PaqnbiCRBn4sRrYjFjU2HTTUuQBVanKpRW9tE2ij', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiS21rMHZSbFZkNTRDQ1dPSnZldXFzNm9CbzNrclU1RTlGMmlVdWRZZCI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czoyMDoiaHR0cDovL2NhcmVuc3kubG9sb2siO31zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czoyMDoiaHR0cDovL2NhcmVuc3kubG9sb2siO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO30=', 1737347553);

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` bigint UNSIGNED NOT NULL,
  `kode_transaksi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat_now` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat_ktp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `media_sosial` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_pinjam` date NOT NULL,
  `tanggal_kembali` date NOT NULL,
  `jaminan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `password`, `is_admin`, `created_at`, `updated_at`) VALUES
(1, 'PREXIDENXI', 'user1', '$2y$12$sxCJWVQ5Zsq7IlJAKP1U9OVaoi9XRGzhWEmRNpY3qQOvq4ULpwPLq', 0, '2025-01-19 20:01:15', '2025-01-19 20:01:15'),
(2, 'admin', 'admin', '$2y$12$mNKT5auRCHO1hV6tweOVSudA8HHN3bE1NrCyFviMbpF5F1vqED1Dy', 1, '2025-01-19 20:05:56', '2025-01-19 20:05:56');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `carts_user_id_foreign` (`user_id`);

--
-- Indexes for table `cart_items`
--
ALTER TABLE `cart_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cart_items_cart_id_foreign` (`cart_id`),
  ADD KEY `cart_items_product_id_foreign` (`product_id`),
  ADD KEY `cart_items_transaction_id_foreign` (`transaction_id`);

--
-- Indexes for table `histori_items`
--
ALTER TABLE `histori_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `histori_items_histori_transaksi_id_foreign` (`histori_transaksi_id`),
  ADD KEY `histori_items_product_id_foreign` (`product_id`);

--
-- Indexes for table `histori_transaksis`
--
ALTER TABLE `histori_transaksis`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `histori_transaksis_kode_transaksi_unique` (`kode_transaksi`),
  ADD KEY `histori_transaksis_user_id_foreign` (`user_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `profiles`
--
ALTER TABLE `profiles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `profiles_user_id_foreign` (`user_id`);

--
-- Indexes for table `receipts`
--
ALTER TABLE `receipts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `receipts_receipt_no_unique` (`receipt_no`),
  ADD KEY `receipts_transaction_id_foreign` (`transaction_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `transactions_kode_transaksi_unique` (`kode_transaksi`),
  ADD KEY `transactions_user_id_foreign` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `cart_items`
--
ALTER TABLE `cart_items`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `histori_items`
--
ALTER TABLE `histori_items`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `histori_transaksis`
--
ALTER TABLE `histori_transaksis`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `profiles`
--
ALTER TABLE `profiles`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `receipts`
--
ALTER TABLE `receipts`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `carts`
--
ALTER TABLE `carts`
  ADD CONSTRAINT `carts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `cart_items`
--
ALTER TABLE `cart_items`
  ADD CONSTRAINT `cart_items_cart_id_foreign` FOREIGN KEY (`cart_id`) REFERENCES `carts` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `cart_items_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `cart_items_transaction_id_foreign` FOREIGN KEY (`transaction_id`) REFERENCES `transactions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `histori_items`
--
ALTER TABLE `histori_items`
  ADD CONSTRAINT `histori_items_histori_transaksi_id_foreign` FOREIGN KEY (`histori_transaksi_id`) REFERENCES `histori_transaksis` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `histori_items_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `histori_transaksis`
--
ALTER TABLE `histori_transaksis`
  ADD CONSTRAINT `histori_transaksis_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `profiles`
--
ALTER TABLE `profiles`
  ADD CONSTRAINT `profiles_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `receipts`
--
ALTER TABLE `receipts`
  ADD CONSTRAINT `receipts_transaction_id_foreign` FOREIGN KEY (`transaction_id`) REFERENCES `transactions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `transactions`
--
ALTER TABLE `transactions`
  ADD CONSTRAINT `transactions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
