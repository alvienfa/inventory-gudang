-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 09, 2021 at 02:31 PM
-- Server version: 10.2.38-MariaDB-log
-- PHP Version: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `appliedi_web_gudang`
--

-- --------------------------------------------------------

--
-- Table structure for table `map_lokasi`
--

CREATE TABLE `map_lokasi` (
  `id` int(11) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `kecamatan` varchar(100) NOT NULL,
  `kota` varchar(100) NOT NULL,
  `provinsi` varchar(100) NOT NULL,
  `kode_pos` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `map_lokasi`
--

INSERT INTO `map_lokasi` (`id`, `alamat`, `kecamatan`, `kota`, `provinsi`, `kode_pos`) VALUES
(1, 'Jl. Raya Boulevard Barat Ruko Italian Walk blok J no.6 Kelapa Gading Square Jakarta Utara 14240', '123', '123', '123', '123'),
(2, 'Jl. Raya Boulevard Barat Ruko Italian Walk blok I no.20 Kelapa Gading Square Jakarta Utara 14240', '123', '123', '123', '12312'),
(3, 'Jl. Raya Boulevard Barat Ruko Italian Walk blok I no.20 Kelapa Gading Square Jakarta Utara 14240', '123', '123', '123', '12312'),
(4, 'Lt.20, Mid Plaza 2, Jl. Jend. Sudirman No.10-11, RT.10/RW.11, Karet Tengsin, Tanah Abang, Kota Jakar', '123', '123', '123', '12312'),
(5, 'Lt.20, Mid Plaza 2, Jl. Jend. Sudirman No.10-11, RT.10/RW.11, Karet Tengsin, Tanah Abang, Kota Jakar', '123', '123', '123', '12312'),
(6, 'Jl  partai', 'Bogor', 'Bogor', 'Jawa', '18656'),
(7, 'Jl. Raya Boulevard Barat Ruko Italian Walk blok J no.6 Kelapa Gading Square Jakarta Utara 14240', 'bogot', 'Bogor', 'Jawa', '12312'),
(8, '', '', '', '', ''),
(9, 'fsdfdffd', 'bogot', 'Bogor', 'Jawa', '123'),
(10, 'Jl. Raya Boulevard Barat Ruko Italian Walk blok I no.20 Kelapa Gading Square Jakarta Utara 14240', '123', 'Bogor', '123', '123'),
(11, 'Jl. Raya Boulevard Barat Ruko Italian Walk blok I no.20 Kelapa Gading Square Jakarta Utara 14240', '123', 'Bogor', 'Jawa', '12312'),
(12, 'Jl. Raya Boulevard Barat Ruko Italian Walk blok J no.6 Kelapa Gading Square Jakarta Utara 14240', 'bogot', 'Bogor', 'Jawa', '12312'),
(13, '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tb_barang_keluar`
--

CREATE TABLE `tb_barang_keluar` (
  `id` int(10) NOT NULL,
  `id_transaksi` varchar(50) NOT NULL,
  `tanggal_masuk` varchar(20) NOT NULL,
  `tanggal_keluar` varchar(20) NOT NULL,
  `id_lokasi` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `keterangan` varchar(100) DEFAULT NULL,
  `nm_penjab` varchar(50) NOT NULL,
  `nohp_penjab` varchar(25) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `created_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_barang_keluar`
--

INSERT INTO `tb_barang_keluar` (`id`, `id_transaksi`, `tanggal_masuk`, `tanggal_keluar`, `id_lokasi`, `jumlah`, `status`, `keterangan`, `nm_penjab`, `nohp_penjab`, `created_at`, `updated_at`, `created_by`) VALUES
(52, 'WG-202190371584', '2021-05-29', '29/05/2021', 13, 2, 1, '', '', '', '2021-06-04 02:26:59', '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tb_barang_kembali`
--

CREATE TABLE `tb_barang_kembali` (
  `id` int(10) NOT NULL,
  `id_transaksi` varchar(50) NOT NULL,
  `tanggal_kembali` date NOT NULL,
  `jumlah` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `keterangan` text DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `created_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_barang_kembali`
--

INSERT INTO `tb_barang_kembali` (`id`, `id_transaksi`, `tanggal_kembali`, `jumlah`, `status`, `keterangan`, `created_at`, `updated_at`, `created_by`) VALUES
(28, 'WG-202190371584', '2021-06-04', 2, 1, '', '2021-06-04 02:33:43', '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tb_barang_masuk`
--

CREATE TABLE `tb_barang_masuk` (
  `id` int(11) NOT NULL,
  `id_transaksi` varchar(50) NOT NULL,
  `tanggal` varchar(20) NOT NULL,
  `keterangan` varchar(100) NOT NULL,
  `kode_barang` varchar(100) NOT NULL,
  `nama_barang` varchar(100) NOT NULL,
  `satuan` varchar(50) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `qr_code` varchar(50) NOT NULL,
  `gambar` varchar(100) NOT NULL,
  `id_gudang` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `updated_at` datetime NOT NULL,
  `created_at` datetime NOT NULL,
  `deleted_at` datetime NOT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT 0,
  `created_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_barang_masuk`
--

INSERT INTO `tb_barang_masuk` (`id`, `id_transaksi`, `tanggal`, `keterangan`, `kode_barang`, `nama_barang`, `satuan`, `jumlah`, `qr_code`, `gambar`, `id_gudang`, `id_kategori`, `updated_at`, `created_at`, `deleted_at`, `is_deleted`, `created_by`) VALUES
(19, 'WG-202161753820', '2021-05-29', '', 'S-005', 'Intelligent Disinfectan Manufactur', 'Dus', 5, 'WG-202161753820.png', 'preview.jpg', 1, 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(20, 'WG-202180137249', '2021-05-29', '', 'S-007', 'Generator Ozon 10Gr', 'Dus', 12, 'WG-202180137249.png', 'preview.jpg', 1, 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(21, 'WG-202153801246', '2021-05-29', '', 'S-011', 'Mist maker mata 10', 'Pcs', 1, 'WG-202153801246.png', 'preview.jpg', 1, 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(22, 'WG-202151067824', '2021-05-29', '', 'S-012', 'Mist maker mata 6', 'Pcs', 2, 'WG-202151067824.png', 'preview.jpg', 1, 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(23, 'WG-202107913564', '2021-05-29', '', 'S-013', 'Generator ozon (24gr) ', 'Pcs', 3, 'WG-202107913564.png', 'preview.jpg', 1, 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(24, 'WG-202139426507', '2021-05-29', '', 'S-014 ', 'Remote Timer', 'Pcs', 7, 'WG-202139426507.png', 'preview.jpg', 1, 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(25, 'WG-202118946037', '2021-05-29', '', 'PDM USB', 'Disinfektan Generator USB ', 'Dus', 132, 'WG-202118946037.png', 'preview.jpg', 1, 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(26, 'WG-202110897654', '2021-05-29', '', 'S-017 ', 'Buzzer 220 Volt ', 'Pcs', 20, 'WG-202110897654.png', 'preview.jpg', 1, 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(27, 'WG-202194516720', '2021-05-29', '', 'PES PP-07 B', 'Replenis Water Biru ', 'Dus', 47, 'WG-202194516720.png', 'preview.jpg', 1, 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(28, 'WG-202114907832', '2021-05-29', '', 'PES PP-07G', 'Replenis Water Gold', 'Dus', 26, 'WG-202114907832.png', 'preview.jpg', 1, 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(29, 'WG-202174028519', '2021-05-29', '', 'PES PP 08', 'Portable Air Brush 120 ml ', 'Pcs', 0, 'WG-202174028519.png', 'preview.jpg', 1, 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(30, 'WG-202114398526', '2021-05-29', '', 'PES PP 09', 'Beauty Air Brush System 105 ml', 'Pcs', 0, 'WG-202114398526.png', 'preview.jpg', 1, 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(31, 'WG-202103741968', '2021-05-29', '', 'PES PP-03 ', 'Healthy Lifestyle Hand-Held ', 'Dus', 4, 'WG-202103741968.png', 'preview.jpg', 1, 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(32, 'WG-202191824706', '2021-05-29', '', 'ULV Cold', 'ULV Electric Sprayer', 'Dus', 1, 'WG-202191824706.png', 'preview.jpg', 1, 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(33, 'WG-202151074698', '2021-05-29', '', 'PES PP-05', 'Nano Spray Machine', 'Dus', 83, 'WG-202151074698.png', 'preview.jpg', 1, 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(34, 'WG-202171590246', '2021-05-29', '', 'PES PP-06 ', 'Handheld Electric Sprayer', 'Dus', 78, 'WG-202171590246.png', 'preview.jpg', 1, 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(35, 'WG-202165427830', '2021-05-29', '', 'R-065 ', 'Kertas Pengukur Kadar Klorin', 'Dus', 296, 'WG-202165427830.png', 'preview.jpg', 1, 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(36, 'WG-202105746129', '2021-05-29', '', 'R-056 ', 'Masker Tomo ( Ukuran S ) ', 'Pcs', 0, 'WG-202105746129.png', 'preview.jpg', 1, 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(37, 'WG-202138492017', '2021-05-29', '', 'R-058', 'Masker Tomo ( Ukuran M )', 'Pcs', 2, 'WG-202138492017.png', 'preview.jpg', 1, 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(38, 'WG-202151246390', '2021-05-29', '', 'R-057', 'Masker Tomo ( Ukuran L )', 'Pcs', 2, 'WG-202151246390.png', 'preview.jpg', 1, 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(39, 'WG-202160479835', '2021-05-29', 'Demo/Entertain', 'C-002', 'Klinox', 'Pcs', 36, 'WG-202160479835.png', 'preview.jpg', 2, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(40, 'WG-202154908627', '2021-05-29', 'Persediaan', 'C-002', 'Klinox', 'Pcs', 22, 'WG-202154908627.png', 'preview.jpg', 2, 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(41, 'WG-202110829547', '2021-05-29', 'Inventori', 'C-002', 'Klinox', 'Pcs', 48, 'WG-202110829547.png', 'preview.jpg', 2, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(42, 'WG-202190576248', '2021-05-29', 'Demo/Entertain', 'R-042', 'Botol Plastik Putih 100ml', 'Pcs', 12, 'WG-202190576248.png', 'preview.jpg', 2, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(43, 'WG-202154291870', '2021-05-29', 'Persediaan', 'R-042 ', 'Botol Plastik Putih 100ml ', 'Pcs', 12, 'WG-202154291870.png', 'preview.jpg', 2, 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(44, 'WG-202184219730', '2021-05-29', 'Inventory', 'R-042', 'Botol Plastik Putih 100ml ', 'Dus', 20, 'WG-202184219730.png', 'preview.jpg', 2, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(45, 'WG-202138715260', '2021-05-29', 'Demo/Entertain', 'R-043 ', 'Botol Plastik Putih 250ml ', 'Pcs', 40, 'WG-202138715260.png', 'preview.jpg', 2, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(46, 'WG-202156071394', '2021-05-29', 'Persediaan', 'R-043 ', 'Botol Plastik Putih 250ml ', 'Pcs', 20, 'WG-202156071394.png', 'preview.jpg', 2, 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(47, 'WG-202171324908', '2021-05-29', 'Inventori', 'R-043', 'Botol Plastik Putih 250ml ', 'Pcs', 34, 'WG-202171324908.png', 'preview.jpg', 2, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(48, 'WG-202174896325', '2021-05-29', 'Demo/Entertain', 'PM 03 PU ', 'Nano Spray (Putih Model Lama) ', 'Pcs', 11, 'WG-202174896325.png', 'preview.jpg', 2, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(49, 'WG-202173289514', '2021-05-29', 'Demo/Entertain', 'PDM 70 ml (Logo CB )', 'Portable Disinfektan Maker Logo CB', 'Pcs', 10, 'WG-202173289514.png', 'preview.jpg', 2, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(50, 'WG-202153680947', '2021-05-29', 'Persediaan', 'PDM 70 ml (Logo CB ) ', 'Portable Disinfektan Maker Logo CB', 'Pcs', 9, 'WG-202153680947.png', 'preview.jpg', 2, 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(51, 'WG-202103465982', '2021-05-29', 'Demo/Entertain', 'PDM 70 ml ( Non logo CB )', 'Portable Disinfektan Maker Non - Logo', 'Pcs', 10, 'WG-202103465982.png', 'preview.jpg', 2, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(52, 'WG-202162739810', '2021-05-29', 'Persediaan', 'PDM 70 ml ( Non logo CB )', 'Portable Disinfektan Maker Non - Logo', 'Pcs', 7, 'WG-202162739810.png', 'preview.jpg', 2, 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(53, 'WG-202109318756', '2021-05-29', 'Persediaan', 'PDM 70 ml', 'Disinfektan Making Machine WP-X20-22 ', 'Pcs', 75, 'WG-202109318756.png', 'preview.jpg', 2, 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(54, 'WG-202154183902', '2021-05-29', 'Inventori', 'PDM 70 ml ', 'Disinfektan Making Machine WP-X20-22 ', 'Pcs', 75, 'WG-202154183902.png', 'preview.jpg', 2, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(55, 'WG-202190371584', '2021-05-29', 'Inventori', 'PES PP-02 ', 'Agricultural Curticultural Non Portable Sprayer', 'Pcs', 4, 'WG-202190371584.png', 'preview.jpg', 2, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(56, 'WG-202138970241', '2021-05-29', 'Inventori', 'R-017', 'Googles Manajemen', 'Pcs', 9, 'WG-202138970241.png', 'preview.jpg', 2, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(57, 'WG-202143971650', '2021-05-29', 'Inventori', 'PDM 2,5 lt', 'Sodium hypo Clorite Generator Model YH-003 (Merah)', 'Pcs', 5, 'WG-202143971650.png', 'preview.jpg', 2, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(58, 'WG-202173802564', '2021-05-29', 'Inventori', 'R-019', 'Googles OP Eksternal ', 'Pcs', 19, 'WG-202173802564.png', 'preview.jpg', 2, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(59, 'WG-202115687924', '2021-05-29', 'Inventori', 'R-030', 'Termometer LCD Display 8inc', 'Pcs', 0, 'WG-202115687924.png', 'preview.jpg', 2, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(60, 'WG-202107398561', '2021-05-29', 'Inventori', 'R-021', 'Googles OP Internal ', 'Pcs', 11, 'WG-202107398561.png', 'preview.jpg', 2, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(61, 'WG-202169027348', '2021-05-29', 'Inventori', 'PES PP -01', 'Atomizer II ', 'Pcs', 2, 'WG-202169027348.png', 'preview.jpg', 2, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(62, 'WG-202145193607', '2021-05-29', 'Inventori', 'R-031', 'K3 PRO', 'Pcs', 3, 'WG-202145193607.png', 'preview.jpg', 2, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(63, 'WG-202163820415', '2021-05-29', 'Inventori', 'R-032 ', 'Digital Counter K3 Plus', 'Pcs', 8, 'WG-202163820415.png', 'preview.jpg', 2, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(64, 'WG-202164179583', '2021-05-29', 'Inventori', 'PES SW-001', 'Electrostatic Mist Blower - 16 L', 'Pcs', 2, 'WG-202164179583.png', 'preview.jpg', 2, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(65, 'WG-202109475126', '2021-05-31', 'Inventori', 'PES PSA 01', 'Ultralow Sprayer Non Kabel', 'Dus', 1, 'WG-202109475126.png', 'preview.jpg', 2, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(66, 'WG-202178345129', '2021-05-31', 'Inventori', 'PES PSB 01', 'Ultralow Sprayer Kabel ', 'Dus', 3, 'WG-202178345129.png', 'IMG_7878-min.JPG', 2, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(67, 'WG-202120967138', '2021-05-31', 'Demo/Entertain', 'S-006', 'Remote AB/ON/OFF/SLEEP ', 'Dus', 50, 'WG-202120967138.png', 'IMG_7879-min.JPG', 2, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(68, 'WG-202115230649', '2021-05-31', 'Inventori', 'S-010', 'Power Supply/Adaptor', 'Dus', 86, 'WG-202115230649.png', 'IMG_7880-min.JPG', 2, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(69, 'WG-202140912378', '2021-05-31', 'Demo/Entertain', 'PM-01', 'Nano Spray ', 'Dus', 46, 'WG-202140912378.png', 'IMG_7881-min.JPG', 2, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(70, 'WG-202129875461', '2021-05-31', 'Demo/Entertain', 'S-003 ', 'Generator Ozon + Kipas 15Gr', 'Dus', 40, 'WG-202129875461.png', 'IMG_7882-min.JPG', 2, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(71, 'WG-202124093687', '2021-05-31', 'Persediaan', 'PM 02 PU', 'Nano Spray (PUTIH) ', 'Dus', 131, 'WG-202124093687.png', 'IMG_7883-min.JPG', 2, 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(72, 'WG-202108764923', '2021-05-31', 'Demo/Entertain', 'PM 02 PI', 'Nano Spray (PINK) ', 'Dus', 96, 'WG-202108764923.png', 'IMG_7884-min.JPG', 2, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(73, 'WG-202147512908', '2021-05-31', 'Inventori', 'R-038 ', 'Box Sterilisasi ', 'Dus', 6, 'WG-202147512908.png', 'IMG_7885-min.JPG', 2, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(74, 'WG-202105619723', '2021-05-31', 'Demo/Entertain', 'S-009', 'Mist Maker mata 12', 'Dus', 44, 'WG-202105619723.png', 'IMG_7886-min.JPG', 2, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(75, 'WG-202195630824', '2021-05-31', 'Inventori', 'S-004 ', 'Hypoclorite Generator', 'Dus', 8, 'WG-202195630824.png', 'IMG_7887-min.JPG', 2, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(76, 'WG-202125079816', '2021-05-31', 'Inventori', 'R-039', 'RB Disinfektan Maker', 'Dus', 1, 'WG-202125079816.png', 'preview.jpg', 2, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(77, 'WG-202197408513', '2021-05-31', 'Inventori', 'R-057', 'Ultrasonic Cleaner', 'Pcs', 0, 'WG-202197408513.png', 'IMG_7888-min.JPG', 2, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(78, 'WG-202193826047', '2021-05-31', 'Inventori', 'PH-001', 'Handheld Sprayer 1,8L', 'Dus', 8, 'WG-202193826047.png', 'IMG_7889-min.JPG', 2, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(79, 'WG-202187546012', '2021-05-31', 'Inventori', 'R-005 ', 'Hazmat', 'Pcs', 19, 'WG-202187546012.png', 'IMG_7890-min.JPG', 2, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(80, 'WG-202137025846', '2021-05-31', 'Inventori', 'R-006', 'Kanebo', 'Pcs', 39, 'WG-202137025846.png', 'IMG_7891-min.JPG', 2, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(81, 'WG-202126594130', '2021-05-31', 'Inventori', 'R-007 ', 'Tang Jepit', 'Pcs', 6, 'WG-202126594130.png', 'IMG_7892-min.JPG', 2, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(82, 'WG-202131648279', '2021-05-31', 'Inventori', 'R-008', 'Suntikan', 'Pcs', 11, 'WG-202131648279.png', 'IMG_7893-min.JPG', 2, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(83, 'WG-202176805493', '2021-05-31', 'Inventori', 'R-009 ', 'Sarung Tangan Latex', 'Dus', 5, 'WG-202176805493.png', 'IMG_7894-min.JPG', 2, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(84, 'WG-202191530728', '2021-05-31', 'Inventori', 'R-010', 'Drigen 10L', 'Pcs', 2, 'WG-202191530728.png', 'IMG_7895-min.JPG', 2, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(85, 'WG-202181465079', '2021-05-31', 'Inventori', 'R-011 ', 'Container Box', 'Pcs', 4, 'WG-202181465079.png', 'IMG_7896-min.JPG', 2, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(86, 'WG-202138096571', '2021-05-31', 'Inventori', 'R-012', 'Kunci Inggris', 'Pcs', 2, 'WG-202138096571.png', 'IMG_7897-min.JPG', 2, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(87, 'WG-202106795831', '2021-05-31', 'Inventori', 'R-013 ', 'Gelas Ukur', 'Pcs', 15, 'WG-202106795831.png', 'IMG_7898-min.JPG', 2, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(88, 'WG-202170286593', '2021-05-31', 'Inventori', 'R-014 ', 'Corong', 'Pcs', 20, 'WG-202170286593.png', 'IMG_7899-min.JPG', 2, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(89, 'WG-202118634259', '2021-05-31', 'Inventori', 'R-015', 'Kabel Roll ', 'Pcs', 8, 'WG-202118634259.png', 'IMG_7900-min.JPG', 2, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(90, 'WG-202109483271', '2021-05-31', 'Inventori', 'R-016 ', 'Masker Manajemen ', 'Pcs', 9, 'WG-202109483271.png', 'IMG_7901-min.JPG', 2, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(91, 'WG-202191754860', '2021-05-31', 'Inventori', 'R-018', 'Masker OP Eksternal (Moncong 1) ', 'Pcs', 21, 'WG-202191754860.png', 'IMG_7902-min.JPG', 2, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(92, 'WG-202108596421', '2021-05-31', 'Inventori', 'R-020 ', 'Masker OP Internal ', 'Pcs', 7, 'WG-202108596421.png', 'preview.jpg', 2, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(93, 'WG-202171250384', '2021-05-31', 'Inventori', 'R-022', 'Kemeja Merah', 'Pcs', 95, 'WG-202171250384.png', 'WhatsApp_Image_2021-06-04_at_09_03_141.jpeg', 2, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(94, 'WG-202165478392', '2021-05-31', 'Inventori', 'R-023', 'Kemeja Putih', 'Pcs', 25, 'WG-202165478392.png', 'WhatsApp_Image_2021-06-04_at_09_03_14.jpeg', 2, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(95, 'WG-202130645192', '2021-05-31', 'Inventori', 'R-024', 'Baju Kaos Merah dan Hijau', 'Pcs', 16, 'WG-202130645192.png', 'IMG_7903-min.JPG', 2, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(96, 'WG-202164135872', '2021-05-31', 'Inventori', 'R-025 ', 'Sealant', 'Pcs', 3, 'WG-202164135872.png', 'preview.jpg', 2, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(97, 'WG-202174612530', '2021-05-31', 'Inventori', 'R-026', 'Pompa APH ', 'Pcs', 5, 'WG-202174612530.png', 'IMG_7904-min.JPG', 2, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(98, 'WG-202159304671', '2021-05-31', 'Inventori', 'R-028 ', 'Kipas Kecil 9ml', 'Pcs', 10, 'WG-202159304671.png', 'IMG_7905-min.JPG', 2, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(99, 'WG-202190275183', '2021-05-31', 'Inventori', 'R-029', 'Kipas Besar 12ml', 'Pcs', 9, 'WG-202190275183.png', 'IMG_7906-min.JPG', 2, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(100, 'WG-202168724951', '2021-05-31', 'Inventori', 'R-033 ', 'Ionizer probe 10', 'Pcs', 7, 'WG-202168724951.png', 'IMG_7910-min.JPG', 2, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(101, 'WG-202114023759', '2021-05-31', 'Inventori', 'R-034 ', 'Ionizer probe 4 ', 'Pcs', 3, 'WG-202114023759.png', 'IMG_7911-min.JPG', 2, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(102, 'WG-202196352804', '2021-05-31', 'Inventori', 'R-035', 'Ionizer probe 2 ', 'Pcs', 5, 'WG-202196352804.png', 'IMG_7912-min.JPG', 2, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(103, 'WG-202195807261', '2021-05-31', 'Inventori', 'S-011', 'Buzzer 220Volt', 'Pcs', 0, 'WG-202195807261.png', 'preview.jpg', 2, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(104, 'WG-202137910684', '2021-05-31', 'Inventori', 'R-040', 'Stick Spray Panjang (Putih)', 'Pcs', 45, 'WG-202137910684.png', 'IMG_7907-min.JPG', 2, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(105, 'WG-202120196547', '2021-05-31', 'Inventori', 'R-041 ', 'Stick Inhaler Pendek (Hitam & Putih)', 'Pcs', 74, 'WG-202120196547.png', 'IMG_7908-min.JPG', 2, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(106, 'WG-202109158634', '2021-05-31', 'Inventori', 'R-044 ', 'Mata Mist 20inc ', 'Pcs', 5, 'WG-202109158634.png', 'IMG_7909-min.JPG', 2, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(107, 'WG-202104175328', '2021-05-31', 'Inventori', 'R-045', 'Saklar ON/OFF', 'Pcs', 31, 'WG-202104175328.png', 'IMG_7913-min.JPG', 2, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(108, 'WG-202181523409', '2021-05-31', 'Inventori', 'R-047', 'SKUN', 'Pcs', 84, 'WG-202181523409.png', 'IMG_7914-min.JPG', 2, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(109, 'WG-202192730851', '2021-05-31', 'Inventori', 'R-047Y', 'SKUN Y', 'Pcs', 98, 'WG-202192730851.png', 'IMG_7915-min.JPG', 2, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(110, 'WG-202138021975', '2021-05-31', 'Inventori', 'R-046 ', 'Switch AC', 'Pcs', 1, 'WG-202138021975.png', 'preview.jpg', 2, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(111, 'WG-202142130859', '2021-05-31', 'Inventori', 'R-048', 'Sealtape', 'Dus', 1, 'WG-202142130859.png', 'IMG_7916-min.JPG', 2, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(112, 'WG-202184207395', '2021-05-31', 'Inventori', 'B-002', 'Mesin HOCl ', 'Dus', 0, 'WG-202184207395.png', '2d092777c80f8effd282c943b5ce888a.JPG', 2, 2, '2021-06-03 07:09:26', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tb_gudang`
--

CREATE TABLE `tb_gudang` (
  `id` int(11) NOT NULL,
  `nama_gudang` varchar(100) NOT NULL,
  `detail_gudang` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_gudang`
--

INSERT INTO `tb_gudang` (`id`, `nama_gudang`, `detail_gudang`) VALUES
(1, 'Stok Gudang Pak Sandy', 'Stok Gudang Pak Sandy'),
(2, 'Stok Gudang Rizqi Semesta', 'Stok Gudang Rizqi Semesta'),
(3, 'Stok Gudang BBL', 'Stok Gudang BBL');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kategori`
--

CREATE TABLE `tb_kategori` (
  `id` int(11) NOT NULL,
  `nama_kategori` varchar(100) NOT NULL,
  `detail_kategori` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_kategori`
--

INSERT INTO `tb_kategori` (`id`, `nama_kategori`, `detail_kategori`) VALUES
(1, 'Demo / Entertaint', 'Demo / Entertaint'),
(2, 'Inventory', 'Inventory'),
(3, 'Persediaan', 'Persediaan');

-- --------------------------------------------------------

--
-- Table structure for table `tb_revisi`
--

CREATE TABLE `tb_revisi` (
  `id` int(11) NOT NULL,
  `revisi` text NOT NULL,
  `status` enum('sudah','belum') NOT NULL DEFAULT 'belum'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_revisi`
--

INSERT INTO `tb_revisi` (`id`, `revisi`, `status`) VALUES
(1, 'tabel barang masuk di ganti jadi tabel stok barang', 'belum'),
(2, 'stok minimum dikasih warning', 'belum'),
(3, 'output terpisah\r\ndemo, inventaris dan persediaan', 'belum'),
(4, 'bikin system berbeda\r\n1. bbl\r\n2. rizqy', 'belum'),
(5, 'keterangan utk pengembalian barang yang rusak', 'belum'),
(6, 'barang yang rusak ditambah di tb stok barang dan diberi keterangan rusak ', 'belum'),
(7, 'tabel gudang tidak perlu', 'belum'),
(8, 'barang masuk berbeda', 'belum'),
(9, 'tanda terima pengembalian barang', 'belum'),
(10, 'surat jalan ttd', 'belum');

-- --------------------------------------------------------

--
-- Table structure for table `tb_role`
--

CREATE TABLE `tb_role` (
  `id` int(11) NOT NULL,
  `nama_role` varchar(100) NOT NULL,
  `detail_role` varchar(100) NOT NULL,
  `id_gudang` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_role`
--

INSERT INTO `tb_role` (`id`, `nama_role`, `detail_role`, `id_gudang`) VALUES
(1, 'superadmin', 'superadmin', NULL),
(2, 'admin1', 'gudang1', 1),
(3, 'admin2', 'gudang2', 2),
(4, 'admin3', 'gudang3', 3),
(5, 'atasan', 'atasan', NULL),
(6, 'user', 'user', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_satuan`
--

CREATE TABLE `tb_satuan` (
  `id_satuan` int(11) NOT NULL,
  `kode_satuan` varchar(100) NOT NULL,
  `nama_satuan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_satuan`
--

INSERT INTO `tb_satuan` (`id_satuan`, `kode_satuan`, `nama_satuan`) VALUES
(1, 'Dus', 'Dus'),
(2, 'Pcs', 'Pcs'),
(5, 'Pack', 'Pack'),
(6, 'buah', 'buah');

-- --------------------------------------------------------

--
-- Table structure for table `tb_status`
--

CREATE TABLE `tb_status` (
  `id` int(11) NOT NULL,
  `text_status` varchar(100) NOT NULL,
  `detail_status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_status`
--

INSERT INTO `tb_status` (`id`, `text_status`, `detail_status`) VALUES
(0, 'On going', 'Belum Kembali'),
(1, 'sudah', 'Sudah Kembali'),
(2, 'diperbaiki', 'Diservice'),
(3, 'rusak', 'Barang Rusak');

-- --------------------------------------------------------

--
-- Table structure for table `tb_upload_gambar_user`
--

CREATE TABLE `tb_upload_gambar_user` (
  `id` int(11) NOT NULL,
  `username_user` varchar(100) NOT NULL,
  `nama_file` varchar(220) NOT NULL,
  `ukuran_file` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_upload_gambar_user`
--

INSERT INTO `tb_upload_gambar_user` (`id`, `username_user`, `nama_file`, `ukuran_file`) VALUES
(1, 'zahidin', 'nopic5.png', '6.33'),
(2, 'test', 'nopic4.png', '6.33'),
(3, 'coba', 'logo_unsada1.jpg', '16.69'),
(5, 'admin', 'download_(1)1.png', '1.64'),
(6, 'user', 'nopic2.png', '6.33'),
(7, 'user', 'nopic.png', ''),
(8, 'user', 'nopic.png', ''),
(9, 'admin1', 'nopic.png', ''),
(10, 'leader', 'nopic.png', ''),
(11, 'admin 2', 'nopic.png', '');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(12) NOT NULL,
  `username` varchar(200) NOT NULL,
  `nama_user` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(200) NOT NULL,
  `role` tinyint(4) NOT NULL DEFAULT 0,
  `last_login` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `nama_user`, `email`, `password`, `role`, `last_login`) VALUES
(16, 'test', '', 'test@gmail.com', '$2y$10$CTjzvmT5B.dxojKZOxsjTeMc4E7.Gwl9slAgX.0lozwGrKSMxzWdO', 1, '16-03-2018 4:46'),
(17, 'coba', '', 'coba@gmail.com', '$2y$10$WRMyjAi8nnkr3J3QvzvyHuEoqay5dYd5NgMJKxsxtXKCp8.JCxZm.', 1, '15-01-2018 15:41'),
(20, 'admin', 'SuperAdmin', 'admin@gmail.com', '$2y$10$3HNkMOtwX8X88Xb3DIveYuhXScTnJ9m16/rPDF1/VTa/VTisxVZ4i', 1, '09-06-2021 7:27'),
(26, 'user', 'user 3', 'ama@gmail.com', '$2y$10$TAhIf5nxQV3iIghEqKgCxuvJs5uURIedsjCYr7IkLtWcJXEqvSKni', 6, '08-06-2021 7:58'),
(30, 'admin1', 'admin 1', 'adityadwinanto@gmail.com', '$2y$10$oxCMnT6lWHhoHXfSRzEjq.11/tEJZhxFbkDdD3S0og1SSFtWDKfdi', 2, '07-06-2021 8:13'),
(31, 'leader', 'leader', 'it.divapplied@gmail.com', '$2y$10$bYlDjjssSBCgIp2LEyJvHu5YhkmpfR/efFF.3RcNP85ovoXcplcC2', 5, '09-06-2021 3:58'),
(32, 'admin 2', 'Eka 2', 'adit.applied@gmail.com', '$2y$10$TatfvxAL0lwjKpB6bY7TRuscnX/8BBzWkxV3kX5hs4DMXXVZx2pQK', 3, '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `map_lokasi`
--
ALTER TABLE `map_lokasi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_barang_keluar`
--
ALTER TABLE `tb_barang_keluar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_barang_kembali`
--
ALTER TABLE `tb_barang_kembali`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_barang_masuk`
--
ALTER TABLE `tb_barang_masuk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_gudang`
--
ALTER TABLE `tb_gudang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_kategori`
--
ALTER TABLE `tb_kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_revisi`
--
ALTER TABLE `tb_revisi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_role`
--
ALTER TABLE `tb_role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_satuan`
--
ALTER TABLE `tb_satuan`
  ADD PRIMARY KEY (`id_satuan`);

--
-- Indexes for table `tb_status`
--
ALTER TABLE `tb_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_upload_gambar_user`
--
ALTER TABLE `tb_upload_gambar_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `map_lokasi`
--
ALTER TABLE `map_lokasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tb_barang_keluar`
--
ALTER TABLE `tb_barang_keluar`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `tb_barang_kembali`
--
ALTER TABLE `tb_barang_kembali`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `tb_barang_masuk`
--
ALTER TABLE `tb_barang_masuk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=117;

--
-- AUTO_INCREMENT for table `tb_gudang`
--
ALTER TABLE `tb_gudang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_kategori`
--
ALTER TABLE `tb_kategori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_revisi`
--
ALTER TABLE `tb_revisi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tb_role`
--
ALTER TABLE `tb_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tb_satuan`
--
ALTER TABLE `tb_satuan`
  MODIFY `id_satuan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tb_status`
--
ALTER TABLE `tb_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_upload_gambar_user`
--
ALTER TABLE `tb_upload_gambar_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
