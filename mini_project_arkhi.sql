-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 19, 2022 at 05:46 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mini_project_arkhi`
--

-- --------------------------------------------------------

--
-- Table structure for table `hakakses`
--

CREATE TABLE `hakakses` (
  `id_hakakses` bigint(20) UNSIGNED NOT NULL,
  `namahakakses` varchar(256) NOT NULL,
  `id_hak` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hakakses`
--

INSERT INTO `hakakses` (`id_hakakses`, `namahakakses`, `id_hak`) VALUES
(1, 'Staff', ''),
(4, 'Admin', 'Admin_akun');

-- --------------------------------------------------------

--
-- Table structure for table `hps_dokumen`
--

CREATE TABLE `hps_dokumen` (
  `id_hps` int(11) NOT NULL,
  `hps_nomorhps` varchar(256) DEFAULT NULL,
  `hps_nourutdok` int(11) DEFAULT NULL,
  `hps_nobulan` varchar(256) DEFAULT NULL,
  `hps_jt` int(11) DEFAULT NULL,
  `hps_namasales` varchar(256) DEFAULT NULL,
  `hps_tanggal` varchar(256) DEFAULT NULL,
  `hps_tahun` varchar(256) DEFAULT NULL,
  `hps_tanggal_lunas` varchar(256) DEFAULT NULL,
  `hps_kebun` varchar(256) DEFAULT NULL,
  `hps_date_dok` varchar(256) DEFAULT NULL,
  `hps_statusdok` int(11) DEFAULT NULL,
  `hps_status_approval` int(11) DEFAULT NULL,
  `hps_keterangan` varchar(256) DEFAULT NULL,
  `hps_pembuat` varchar(256) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `nama_pel` varchar(256) DEFAULT NULL,
  `alamat_pel` varchar(256) DEFAULT NULL,
  `no_pel` varchar(256) DEFAULT NULL,
  `email_pel` varchar(256) DEFAULT NULL,
  `tgl_deadline_lunas` varchar(255) DEFAULT NULL,
  `custom_ppn` int(25) DEFAULT NULL,
  `jenis_ppn` int(25) DEFAULT NULL,
  `total_harga` int(25) DEFAULT NULL,
  `total_net_harga` int(25) DEFAULT NULL,
  `total_ppn` int(25) DEFAULT NULL,
  `total_beli` int(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `hps_hj_uraian`
--

CREATE TABLE `hps_hj_uraian` (
  `id_hj_uraian` int(11) NOT NULL,
  `diskon` float DEFAULT NULL,
  `jumlah` int(255) DEFAULT NULL,
  `namabarang` int(255) DEFAULT NULL,
  `harga_total_items` int(255) DEFAULT NULL,
  `total_harga_beli` int(255) DEFAULT NULL,
  `total_harga_pokok_beli` int(255) DEFAULT NULL,
  `id_hps` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `laporan_aset`
--

CREATE TABLE `laporan_aset` (
  `id` int(11) NOT NULL,
  `tanggal` varchar(255) DEFAULT NULL,
  `bulan` varchar(255) DEFAULT NULL,
  `tahun` varchar(255) DEFAULT NULL,
  `date_complete` date DEFAULT NULL,
  `start_date` datetime(6) DEFAULT NULL,
  `end_date` datetime(6) DEFAULT NULL,
  `total_beli_aset` int(255) DEFAULT NULL,
  `total_jual_aset` int(255) DEFAULT NULL,
  `total_margin_aset` int(255) DEFAULT NULL,
  `Jumlah_aset` int(255) DEFAULT NULL,
  `updated_at` timestamp(6) NULL DEFAULT current_timestamp(6),
  `created_at` timestamp(6) NULL DEFAULT current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `laporan_labarugi`
--

CREATE TABLE `laporan_labarugi` (
  `id` int(11) NOT NULL,
  `tanggal` varchar(256) DEFAULT NULL,
  `bulan` varchar(256) DEFAULT NULL,
  `tahun` int(11) DEFAULT NULL,
  `date_complete` date DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `catatan` varchar(255) DEFAULT NULL,
  `start_date` datetime(6) DEFAULT NULL,
  `end_date` datetime(6) DEFAULT NULL,
  `pendapatan` int(255) DEFAULT NULL,
  `biaya_hpp` int(255) DEFAULT NULL,
  `biaya_lain` int(255) DEFAULT NULL,
  `laba_kotor` int(255) DEFAULT NULL,
  `laba_bersih` int(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `laporan_labarugi`
--

INSERT INTO `laporan_labarugi` (`id`, `tanggal`, `bulan`, `tahun`, `date_complete`, `updated_at`, `created_at`, `catatan`, `start_date`, `end_date`, `pendapatan`, `biaya_hpp`, `biaya_lain`, `laba_kotor`, `laba_bersih`) VALUES
(7840, '2022-01-11 01:15:38', 'January', 2022, '2022-01-31', '2022-01-10 18:15:38', '2022-01-10 18:15:38', NULL, '2022-01-01 00:00:00.000000', '2022-01-31 00:00:00.000000', 1531200, 497200, 0, 1034000, 1034000);

-- --------------------------------------------------------

--
-- Table structure for table `laporan_labarugi_biaya_hpp`
--

CREATE TABLE `laporan_labarugi_biaya_hpp` (
  `id` int(11) NOT NULL,
  `biaya_hpp` varchar(255) DEFAULT NULL,
  `jumlah_biaya_hpp` int(255) DEFAULT NULL,
  `id_lbrg` int(11) DEFAULT NULL,
  `jenis_labarugi` int(11) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `laporan_labarugi_biaya_hpp`
--

INSERT INTO `laporan_labarugi_biaya_hpp` (`id`, `biaya_hpp`, `jumlah_biaya_hpp`, `id_lbrg`, `jenis_labarugi`, `updated_at`, `created_at`) VALUES
(21, 'Biaya HPP', 497200, 7840, 2, '2022-01-10 18:15:38', '2022-01-10 18:15:38');

-- --------------------------------------------------------

--
-- Table structure for table `laporan_labarugi_biaya_lainnya`
--

CREATE TABLE `laporan_labarugi_biaya_lainnya` (
  `id` int(11) NOT NULL,
  `biaya_lain` varchar(255) DEFAULT NULL,
  `jumlah_biaya_lain` int(255) DEFAULT NULL,
  `id_lbrg` int(11) DEFAULT NULL,
  `jenis_labarugi` int(11) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `laporan_labarugi_pendapatan`
--

CREATE TABLE `laporan_labarugi_pendapatan` (
  `id` int(11) NOT NULL,
  `nama_pendapatan` varchar(255) DEFAULT NULL,
  `jumlah_p` int(255) DEFAULT NULL,
  `id_lbrg` int(11) DEFAULT NULL,
  `jenis_labarugi` int(11) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `laporan_labarugi_pendapatan`
--

INSERT INTO `laporan_labarugi_pendapatan` (`id`, `nama_pendapatan`, `jumlah_p`, `id_lbrg`, `jenis_labarugi`, `updated_at`, `created_at`) VALUES
(26, 'Penjualan', 1531200, 7840, 1, '2022-01-10 18:15:38', '2022-01-10 18:15:38');

-- --------------------------------------------------------

--
-- Table structure for table `laporan_piutang`
--

CREATE TABLE `laporan_piutang` (
  `id` int(11) NOT NULL,
  `start_date` datetime DEFAULT NULL,
  `end_date` datetime DEFAULT NULL,
  `total_piutang` int(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `master_coa`
--

CREATE TABLE `master_coa` (
  `id_c` int(11) NOT NULL,
  `jenis_coa` varchar(256) DEFAULT NULL,
  `created_at` timestamp(6) NULL DEFAULT NULL,
  `updated_at` timestamp(6) NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `master_coa`
--

INSERT INTO `master_coa` (`id_c`, `jenis_coa`, `created_at`, `updated_at`) VALUES
(1, 'Pendapatan/Revenue', '2021-12-21 01:09:38.000000', '2021-12-21 01:09:38.000000'),
(2, 'Biaya/Expenses', '2021-12-21 01:09:38.000000', '2021-12-21 01:09:38.000000'),
(3, 'Biaya lain', '2021-12-21 02:56:31.000000', '2021-12-21 02:56:36.000000');

-- --------------------------------------------------------

--
-- Table structure for table `master_identitas`
--

CREATE TABLE `master_identitas` (
  `nama_pt` int(11) NOT NULL,
  `email_pt` int(11) NOT NULL,
  `url` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `master_jenis_hitung`
--

CREATE TABLE `master_jenis_hitung` (
  `id_jenis_hitung` int(11) NOT NULL,
  `jenishitung` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `master_jenis_hitung`
--

INSERT INTO `master_jenis_hitung` (`id_jenis_hitung`, `jenishitung`) VALUES
(10, 'MIN'),
(20, 'MAX'),
(30, 'AVG'),
(40, 'MANUAL');

-- --------------------------------------------------------

--
-- Table structure for table `master_material`
--

CREATE TABLE `master_material` (
  `id` bigint(11) NOT NULL,
  `namamaterial` varchar(256) NOT NULL,
  `kodematerial` varchar(256) NOT NULL,
  `hargamaterial` int(255) NOT NULL,
  `batch_date` varchar(255) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` timestamp NULL DEFAULT NULL,
  `selisih` int(11) NOT NULL,
  `hargabeli_material` int(11) NOT NULL,
  `supllier` int(11) NOT NULL,
  `stok` int(11) DEFAULT NULL,
  `belikalistok` int(255) DEFAULT NULL,
  `jualkalistok` int(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `master_material`
--

INSERT INTO `master_material` (`id`, `namamaterial`, `kodematerial`, `hargamaterial`, `batch_date`, `updated_at`, `created_at`, `selisih`, `hargabeli_material`, `supllier`, `stok`, `belikalistok`, `jualkalistok`) VALUES
(167, 'test 1', '532846', 8000, '01-01-2026', '2022-02-19 03:16:21', '2022-01-09 23:35:22', 3000, 5000, 7, 10, 50000, 80000),
(168, 'AP003', '214595', 1740013, '01-01-2026', '2022-01-10 19:29:26', '2022-01-10 19:29:26', 1242866, 497147, 8, 2, 994294, 3480026),
(169, 'AP004', '246140', 3212332, '01-10-2026', '2022-01-10 19:31:08', '2022-01-10 19:31:08', 2294523, 917809, 8, 2, 1835618, 6424664),
(170, 'AP013', '94487', 1673090, '12-10-2026', '2022-01-10 19:34:17', '2022-01-10 19:34:17', 1195064, 478026, 8, 2, 956052, 3346180),
(171, 'AP014', '762945', 2743867, '19-02-2026', '2022-01-10 19:53:02', '2022-01-10 19:53:02', 1959905, 783962, 8, 2, 1567924, 5487734),
(172, 'AP024', '47361', 5621581, '28-01-2022', '2022-01-10 19:54:43', '2022-01-10 19:54:43', 4015415, 1606166, 8, 1, 1606166, 5621581),
(173, 'AP022', '127431', 7227747, '11-06-2026', '2022-01-10 19:56:29', '2022-01-10 19:56:29', 5162676, 2065071, 8, 2, 4130142, 14455494),
(174, 'AP110', '306643', 3413103, '11-02-2026', '2022-01-10 19:57:43', '2022-01-10 19:57:43', 2437931, 975172, 8, 1, 975172, 3413103),
(175, 'Dimentia Black', '790899', 134222, '10-06-2025', '2022-01-10 20:11:41', '2022-01-10 20:11:27', 57960, 76262, 8, 9, 686358, 1207998),
(176, 'Dimentia Blue', '458580', 148805, '16-06-2026', '2022-01-10 20:12:47', '2022-01-10 20:12:47', 64257, 84548, 8, 9, 760932, 1339245),
(177, 'Office Air Cushion (OF1)', '313141', 1529682, '04-03-2026', '2022-01-10 20:42:04', '2022-01-10 20:42:04', 917809, 611873, 8, 1, 611873, 1529682),
(178, 'Universal Car AirCushion (DR1)', '131057', 1529682, '15-06-2026', '2022-01-10 20:44:30', '2022-01-10 20:44:30', 917809, 611873, 8, 1, 611873, 1529682),
(179, 'Cozy Gel Cushion Blue (AGC1616)', '694569', 2437931, '13-10-2026', '2022-01-10 21:00:18', '2022-01-10 21:00:18', 1462759, 975172, 8, 3, 2925516, 7313793),
(180, 'U-Air Dynamic (1R UAD 3838)', '659025', 2629141, '09-06-2026', '2022-01-11 19:04:18', '2022-01-11 19:04:18', 1577485, 1051656, 8, 2, 2103312, 5258282),
(181, 'MTB Bicycle AirCushion (BC1)', '553420', 1147262, '02-07-2026', '2022-01-11 19:13:06', '2022-01-11 19:10:47', 688357, 458905, 8, 3, 1376715, 3441786),
(182, 'Life Bicycle AirCushion (BC3)', '952186', 1147262, '18-10-2028', '2022-01-11 19:13:26', '2022-01-11 19:12:45', 688357, 458905, 8, 4, 1835620, 4589048),
(183, 'Comfort Large Motorcycle AirCushion (MC1)', '424812', 1338472, '06-02-2029', '2022-01-11 19:16:34', '2022-01-11 19:16:34', 803083, 535389, 8, 2, 1070778, 2676944),
(184, 'Sports Motorcycle AirCushion (MC3)', '320639', 1338472, '12-10-2026', '2022-01-11 19:18:10', '2022-01-11 19:18:10', 803083, 535389, 8, 5, 2676945, 6692360),
(185, 'Passenger Motorcycle AirCushion (MC4)', '731910', 1338472, '16-07-2026', '2022-01-11 19:50:10', '2022-01-11 19:50:10', 803083, 535389, 8, 4, 2141556, 5353888),
(186, 'Bekam Hansol Bu hang', '638203', 488083, '06-06-2023', '2022-01-11 19:53:56', '2022-01-11 19:53:56', 190472, 297611, 8, 19, 5654609, 9273577),
(187, 'Bekam Silicon', '811590', 238089, '16-06-2026', '2022-01-11 19:55:42', '2022-01-11 19:55:42', 89284, 148805, 8, 40, 5952200, 9523560),
(188, 'Biogrip Medium (Pink)', '988027', 74402, '12-11-2025', '2022-01-11 19:57:04', '2022-01-11 19:57:04', 27901, 46501, 8, 56, 2604056, 4166512),
(189, 'Biogrip Hard (Blue)', '516575', 74402, '15-07-2026', '2022-01-11 20:01:33', '2022-01-11 20:01:33', 27901, 46501, 8, 64, 2976064, 4761728),
(190, 'Biogrip Soft (Yellow)', '311051', 74402, '09-06-2026', '2022-01-11 20:02:50', '2022-01-11 20:02:50', 27901, 46501, 8, 50, 2325050, 3720100),
(191, 'Blood Pressure Monitor (BPM)', '826358', 986582, '09-06-2026', '2022-01-11 20:04:19', '2022-01-11 20:04:19', 354158, 632424, 8, 8, 5059392, 7892656),
(192, 'Cold Pack', '796258', 53265, '08-07-2026', '2022-01-11 20:05:26', '2022-01-11 20:05:26', 23673, 29592, 8, 17, 503064, 905505),
(193, 'Pulse Electronic Massage', '237890', 854145, '09-06-2026', '2022-01-11 20:07:22', '2022-01-11 20:07:22', 333325, 520820, 8, 2, 1041640, 1708290),
(194, 'Eye Cold Pack', '402365', 33481, '21-10-2025', '2022-01-11 20:08:58', '2022-01-11 20:08:58', 14881, 18600, 8, 22, 409200, 736582),
(195, 'Gluco Machine', '616891', 0, '16-06-2026', '2022-01-17 18:55:01', '2022-01-11 20:10:19', 0, 0, 8, 127, 0, 0),
(196, 'Gluco Strip', '463729', 210019, '09-06-2026', '2022-01-17 18:53:58', '2022-01-11 20:12:10', 93319, 116700, 8, 207, 24156900, 43473933),
(197, 'Thermo Gun', '96151', 449726, '14-10-2026', '2022-01-11 20:22:50', '2022-01-11 20:22:50', 182032, 267694, 8, 47, 12581618, 21137122),
(198, 'Hot Pack', '226705', 83703, '23-06-2026', '2022-01-11 20:26:40', '2022-01-11 20:26:40', 37202, 46501, 8, 18, 837018, 1506654),
(199, 'Lancets', '67245', 37201, '03-02-2025', '2022-01-11 20:27:46', '2022-01-11 20:27:46', 13951, 23250, 8, 230, 5347500, 8556230),
(200, 'Lancet Pen', '545147', 37201, '21-10-2025', '2022-01-11 20:28:48', '2022-01-11 20:28:48', 13021, 24180, 8, 394, 9526920, 14657194),
(201, 'Standing Thermometer', '348308', 1204624, '06-03-2025', '2022-01-11 20:30:26', '2022-01-11 20:30:26', 535389, 669235, 8, 3, 2007705, 3613872),
(202, 'Oximeter Yuwell', '542803', 607819, '16-06-2026', '2022-01-11 20:41:35', '2022-01-11 20:41:35', 230142, 377677, 8, 20, 7553540, 12156380),
(203, 'Oximeter M100', '132713', 376531, '19-10-2021', '2022-01-11 21:12:02', '2022-01-11 21:12:02', 167347, 209184, 8, 100, 20918400, 37653100),
(204, 'Oximeter Vilekcokwl', '641445', 150750, '03-05-2026', '2022-01-12 00:10:40', '2022-01-12 00:10:40', 67000, 83750, 8, 200, 16750000, 30150000),
(205, 'Prime Crepe 15', '869074', 82316, '10-10-2025', '2022-01-12 00:28:02', '2022-01-12 00:25:56', 58797, 23519, 7, 200, 4703800, 16463200),
(206, 'Prime Crepe 10', '904993', 59562, '30-12-2024', '2022-01-12 00:27:33', '2022-01-12 00:27:33', 42544, 17018, 7, 174, 2961132, 10363788),
(207, 'Prime Crepe 06', '746850', 40154, '04-03-2026', '2022-01-12 00:29:26', '2022-01-12 00:29:26', 28681, 11473, 7, 50, 573650, 2007700),
(208, 'Prime POP 10', '623658', 26769, '09-06-2026', '2022-01-12 01:18:07', '2022-01-12 01:18:07', 19121, 7648, 7, 12, 91776, 321228),
(209, 'Prime POP 07', '692746', 23423, '13-10-2026', '2022-01-12 01:19:26', '2022-01-12 01:19:26', 16731, 6692, 7, 25, 167300, 585575),
(210, 'Prime POP 05', '195916', 16062, '09-07-2026', '2022-01-12 01:20:30', '2022-01-12 01:20:30', 11473, 4589, 7, 24, 110136, 385488),
(211, 'Ankle Small', '799830', 71426, '08-06-2026', '2022-01-12 01:24:54', '2022-01-12 01:24:54', 26785, 44641, 8, 29, 1294589, 2071354),
(212, 'Ankle Medium', '984081', 71426, '12-06-2028', '2022-01-12 01:25:50', '2022-01-12 01:25:50', 26785, 44641, 8, 79, 3526639, 5642654),
(213, 'Ankle Large', '920260', 71426, '17-06-2026', '2022-01-12 01:27:15', '2022-01-12 01:27:15', 26785, 44641, 8, 26, 1160666, 1857076),
(214, 'Elbow Small', '30159', 56546, '20-10-2026', '2022-01-12 01:28:31', '2022-01-12 01:28:31', 21205, 35341, 8, 29, 1024889, 1639834),
(215, 'Elbow Medium', '861430', 56546, '09-06-2026', '2022-01-12 01:30:32', '2022-01-12 01:30:32', 21205, 35341, 7, 78, 2756598, 4410588),
(216, 'Elbow Large', '986323', 56546, '10-06-2026', '2022-01-12 01:31:58', '2022-01-12 01:31:58', 21205, 35341, 8, 28, 989548, 1583288),
(217, 'Knee Large', '958347', 56546, '16-07-2026', '2022-01-12 01:33:52', '2022-01-12 01:33:52', 21205, 35341, 8, 25, 883525, 1413650),
(218, 'Knee Medium', '765465', 56546, '17-12-2026', '2022-01-12 01:38:21', '2022-01-12 01:38:21', 21205, 35341, 8, 78, 2756598, 4410588),
(219, 'Knee Small', '4868', 56546, '10-06-2026', '2022-01-12 01:39:23', '2022-01-12 01:39:23', 21205, 35341, 8, 29, 1024889, 1639834),
(220, 'Wrist Small', '422971', 74658, '29-02-2028', '2022-01-12 01:44:27', '2022-01-12 01:44:27', 33737, 40921, 7, 30, 1227630, 2239740),
(221, 'Wrist Large', '607088', 73658, '04-03-2026', '2022-01-12 01:45:22', '2022-01-12 01:45:22', 32737, 40921, 8, 30, 1227630, 2209740),
(222, 'Waist Small 10cm', '116426', 198283, '11-03-2026', '2022-01-12 01:49:19', '2022-01-12 01:49:19', 77379, 120904, 8, 4, 483616, 793132),
(223, 'Waist Medium 10cm', '423884', 198283, '15-07-2026', '2022-01-12 01:50:28', '2022-01-12 01:50:28', 77379, 120904, 8, 4, 483616, 793132),
(224, 'Paracetamol', '367387', 60000, '03-03-2022', '2022-02-19 09:30:48', '2022-02-19 09:30:48', 10000, 50000, 10, 5, 250000, 300000);

-- --------------------------------------------------------

--
-- Table structure for table `master_nama_pelanggan`
--

CREATE TABLE `master_nama_pelanggan` (
  `id` int(25) NOT NULL,
  `namapelanggan` varchar(256) NOT NULL,
  `Alamat` varchar(256) DEFAULT NULL,
  `Telp` varchar(256) DEFAULT NULL,
  `email` varchar(256) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `master_nama_pelanggan`
--

INSERT INTO `master_nama_pelanggan` (`id`, `namapelanggan`, `Alamat`, `Telp`, `email`, `updated_at`, `created_at`) VALUES
(34, 'Apotek berat', 'Jl. Dr. Wahidin SH No.16, Tulungagung', '085101744200', '-', '2022-02-16 03:00:40', '2021-09-12 21:38:11'),
(35, 'Apotek Swalayan', 'Jl. Raya Maesan No.1 MOJO', '081554964733', '-', '2021-09-13 23:18:40', '2021-09-13 23:18:40'),
(36, 'Apotek Kanigoro', 'Kios Pasar Kanigoro Kras, Kediri', '085785764621', NULL, '2021-09-13 23:35:27', '2021-09-13 23:35:27'),
(37, 'Apotek Sekar Farma', 'Jl. Patimura No.15, Tulungagung', '-', '-', '2021-09-15 19:30:36', '2021-09-15 19:30:36'),
(38, 'Apotek Pia Farma', 'RT/RW 06/02 Ds.Bendoagung, Kampak, Trenggalek', '082228080951', '-', '2021-09-15 23:21:55', '2021-09-15 23:21:55'),
(39, 'Apotek Subur Medika', 'Jl. Raya Pare Wates RT/RW 010/013', '082-1400 7715 3', NULL, '2021-09-15 23:32:03', '2021-09-15 23:32:03'),
(40, 'Apotek Sendang', 'Jl. KH. Agus Salim 9, Kediri', '(0354)779722', '-', '2021-09-15 23:41:46', '2021-09-15 23:41:46'),
(41, 'Apotek Asikin Farma', 'Jl. Laras Liris 82 Lamongan, Jawa Timur', '(0322) 317059', '-', '2021-09-15 23:49:58', '2021-09-15 23:49:58'),
(42, 'Apotek Durenan', 'Jl. Raya Durenan KM15 Trenggalek', '0355-879297 / 085259674848', '-', '2021-09-15 23:54:14', '2021-09-15 23:54:14'),
(43, 'Apotek Abra Farma', 'RT.21 RW.11 Ds. Sukorejo Kec. Gandusari, Trenggalek', '-', '-', '2021-09-16 00:02:44', '2021-09-16 00:02:44'),
(44, 'Apotek B24', 'Jl. Mayor Sujadi Timur 34 Plosokandang, Tulungagung', '-', '-', '2021-09-16 00:14:21', '2021-09-16 00:14:21'),
(45, 'Apotek Suruhwadang', 'Jl. Trisula Ruko Pasar Suruhwadang No.3, Blitar', NULL, NULL, '2021-09-16 00:37:00', '2021-09-16 00:37:00'),
(50, 'PT. Utama Sejahtera Nusantara', 'Perumahan griya utama, Blok K no 14, Bangkalan', '-', '-', '2022-01-17 20:03:44', '2022-01-17 20:03:44');

-- --------------------------------------------------------

--
-- Table structure for table `master_pt`
--

CREATE TABLE `master_pt` (
  `nama_pt` varchar(256) DEFAULT NULL,
  `email_pt` varchar(256) DEFAULT NULL,
  `url_pt` varchar(256) DEFAULT NULL,
  `alamat_pt` varchar(256) DEFAULT NULL,
  `tlp_pt` varchar(256) DEFAULT NULL,
  `fax_pt` varchar(256) DEFAULT NULL,
  `rekening` varchar(256) DEFAULT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `id_master_pt` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `master_status_aproval`
--

CREATE TABLE `master_status_aproval` (
  `id_statusapproval` int(11) NOT NULL,
  `statusapproval` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `master_status_aproval`
--

INSERT INTO `master_status_aproval` (`id_statusapproval`, `statusapproval`) VALUES
(1, 'Belum Lunas'),
(2, 'Sudah Lunas');

-- --------------------------------------------------------

--
-- Table structure for table `master_supplier`
--

CREATE TABLE `master_supplier` (
  `ids` int(11) NOT NULL,
  `nama_supplier` varchar(256) DEFAULT NULL,
  `alamat_supplier` varchar(256) DEFAULT NULL,
  `no_supplier` varchar(256) DEFAULT NULL,
  `email_supplier` varchar(256) DEFAULT NULL,
  `updated_at` timestamp(6) NOT NULL DEFAULT current_timestamp(6),
  `created_at` timestamp(6) NOT NULL DEFAULT current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `master_supplier`
--

INSERT INTO `master_supplier` (`ids`, `nama_supplier`, `alamat_supplier`, `no_supplier`, `email_supplier`, `updated_at`, `created_at`) VALUES
(7, 'Prime Medica Promotion Pvt. Ltd. India', 'E/96, G. I. D. C - Majusar Savil Road, Vadorada - 391 775, Gujarat, India', '+91 2667 264014', '-', '2022-01-09 23:32:57.000000', '2022-01-09 23:32:57.000000'),
(8, 'Libertech Corporation', '1352, Poseungjan-ro, Jangan-myeon, Hwaseong-si, Gyeonggi-do, 18584 Korea', '82-70-4680-2490', '-', '2022-01-10 19:22:48.000000', '2022-01-10 19:22:48.000000'),
(9, 'Medica permata', 'Jl. Purbajaya', '085608451', 'medica@gmail.com', '2022-02-19 02:37:51.000000', '2022-02-19 02:37:51.000000'),
(10, 'Medika Saja', 'hhihihiwhpdo', '9380973', 'soiqh7@gmail.com', '2022-02-19 02:44:55.000000', '2022-02-19 02:39:48.000000');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `nohp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `otp_1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `statusakun`
--

CREATE TABLE `statusakun` (
  `id_status` int(11) NOT NULL,
  `statusakun` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `statusakun`
--

INSERT INTO `statusakun` (`id_status`, `statusakun`) VALUES
(1, 'Aktif'),
(2, 'NonAktif');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `foto_profil` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `paraf` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `inisial` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nohp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_hakakses` int(11) DEFAULT NULL,
  `id_status` int(11) DEFAULT NULL,
  `otp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `ketepatan_waktu` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_seen` timestamp NULL DEFAULT current_timestamp(),
  `status` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `foto_profil`, `paraf`, `nama`, `inisial`, `password`, `nohp`, `id_hakakses`, `id_status`, `otp`, `remember_token`, `created_at`, `updated_at`, `ketepatan_waktu`, `last_seen`, `status`) VALUES
(47, 'admin', NULL, NULL, 'Admin', 'ADM', 'eyJpdiI6IjUrU3RyRXArbS92eVVrVmtxRC96S0E9PSIsInZhbHVlIjoib01IRlpKOEZkZ0ZkMnRuaFJZQittUT09IiwibWFjIjoiZmY2OGE4MGNjMjMyMjQ5NTFhMmRmNmEzN2Y0YWJjMThkNTJhMmM0MzQ2NDE0ZWRmNjkxY2YzZmFjYTE5ZWE1ZSIsInRhZyI6IiJ9', '87218', 4, 1, 'EsJV', 'pg6iMsQU', '2021-08-24 02:37:22', '2021-12-12 23:43:28', NULL, '2021-08-24 09:37:22', NULL),
(52, 'billgates_staff', NULL, NULL, 'Bill Gates', 'BG', 'eyJpdiI6Ilk5Q1RIYUppZUFCckpkSDJWRHVqUGc9PSIsInZhbHVlIjoiS0FOVjNBZFJ6cndBMTJsWi84ampCZFBNYzhwOHNQNUl1WnUzRmRlanB0UT0iLCJtYWMiOiI5OGNhOThlMzE1MDNjMTJiMjc1ZTg3Y2E1YWYwYTMyMzMyNGM2MzMxYTllN2Y5ODU1MTVhMThiOGQ0Y2NlMDFkIiwidGFnIjoiIn0=', '984165484', 1, 1, 'lxgO', '3aBu5O7P', '2022-02-16 03:13:56', '2022-02-16 03:13:56', NULL, '2022-02-16 10:13:56', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `hakakses`
--
ALTER TABLE `hakakses`
  ADD PRIMARY KEY (`id_hakakses`);

--
-- Indexes for table `hps_dokumen`
--
ALTER TABLE `hps_dokumen`
  ADD PRIMARY KEY (`id_hps`);

--
-- Indexes for table `hps_hj_uraian`
--
ALTER TABLE `hps_hj_uraian`
  ADD PRIMARY KEY (`id_hj_uraian`);

--
-- Indexes for table `laporan_aset`
--
ALTER TABLE `laporan_aset`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `laporan_labarugi`
--
ALTER TABLE `laporan_labarugi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `laporan_labarugi_biaya_hpp`
--
ALTER TABLE `laporan_labarugi_biaya_hpp`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `laporan_labarugi_biaya_lainnya`
--
ALTER TABLE `laporan_labarugi_biaya_lainnya`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `laporan_labarugi_pendapatan`
--
ALTER TABLE `laporan_labarugi_pendapatan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `laporan_piutang`
--
ALTER TABLE `laporan_piutang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `master_coa`
--
ALTER TABLE `master_coa`
  ADD PRIMARY KEY (`id_c`);

--
-- Indexes for table `master_jenis_hitung`
--
ALTER TABLE `master_jenis_hitung`
  ADD PRIMARY KEY (`id_jenis_hitung`);

--
-- Indexes for table `master_material`
--
ALTER TABLE `master_material`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `master_nama_pelanggan`
--
ALTER TABLE `master_nama_pelanggan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `master_pt`
--
ALTER TABLE `master_pt`
  ADD PRIMARY KEY (`id_master_pt`);

--
-- Indexes for table `master_status_aproval`
--
ALTER TABLE `master_status_aproval`
  ADD PRIMARY KEY (`id_statusapproval`);

--
-- Indexes for table `master_supplier`
--
ALTER TABLE `master_supplier`
  ADD PRIMARY KEY (`ids`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_nohp_index` (`nohp`);

--
-- Indexes for table `statusakun`
--
ALTER TABLE `statusakun`
  ADD PRIMARY KEY (`id_status`);

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
-- AUTO_INCREMENT for table `hakakses`
--
ALTER TABLE `hakakses`
  MODIFY `id_hakakses` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `hps_dokumen`
--
ALTER TABLE `hps_dokumen`
  MODIFY `id_hps` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91142;

--
-- AUTO_INCREMENT for table `hps_hj_uraian`
--
ALTER TABLE `hps_hj_uraian`
  MODIFY `id_hj_uraian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=448;

--
-- AUTO_INCREMENT for table `laporan_aset`
--
ALTER TABLE `laporan_aset`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `laporan_labarugi`
--
ALTER TABLE `laporan_labarugi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7841;

--
-- AUTO_INCREMENT for table `laporan_labarugi_biaya_hpp`
--
ALTER TABLE `laporan_labarugi_biaya_hpp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `laporan_labarugi_biaya_lainnya`
--
ALTER TABLE `laporan_labarugi_biaya_lainnya`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `laporan_labarugi_pendapatan`
--
ALTER TABLE `laporan_labarugi_pendapatan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `laporan_piutang`
--
ALTER TABLE `laporan_piutang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `master_coa`
--
ALTER TABLE `master_coa`
  MODIFY `id_c` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `master_material`
--
ALTER TABLE `master_material`
  MODIFY `id` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=225;

--
-- AUTO_INCREMENT for table `master_nama_pelanggan`
--
ALTER TABLE `master_nama_pelanggan`
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `master_pt`
--
ALTER TABLE `master_pt`
  MODIFY `id_master_pt` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `master_status_aproval`
--
ALTER TABLE `master_status_aproval`
  MODIFY `id_statusapproval` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT for table `master_supplier`
--
ALTER TABLE `master_supplier`
  MODIFY `ids` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `statusakun`
--
ALTER TABLE `statusakun`
  MODIFY `id_status` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
