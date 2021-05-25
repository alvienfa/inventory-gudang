-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 25, 2021 at 03:50 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `web_gudang`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_barang_keluar`
--

CREATE TABLE `tb_barang_keluar` (
  `id` int(10) NOT NULL,
  `id_transaksi` varchar(50) NOT NULL,
  `tanggal_masuk` varchar(20) NOT NULL,
  `tanggal_keluar` varchar(20) NOT NULL,
  `lokasi` varchar(100) NOT NULL,
  `kode_barang` varchar(100) NOT NULL,
  `nama_barang` varchar(100) NOT NULL,
  `satuan` varchar(50) NOT NULL,
  `jumlah` varchar(10) NOT NULL,
  `status` enum('0','1','2','3') NOT NULL,
  `keterangan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_barang_keluar`
--

INSERT INTO `tb_barang_keluar` (`id`, `id_transaksi`, `tanggal_masuk`, `tanggal_keluar`, `lokasi`, `kode_barang`, `nama_barang`, `satuan`, `jumlah`, `status`, `keterangan`) VALUES
(1, 'WG-201713067948', '8/11/2017', '11/11/2017', 'NTB', '8888166995215', 'Ciki Walens', 'Dus', '50', '1', ''),
(2, 'WG-201713067948', '8/11/2017', '11/12/2017', 'NTB', '8888166995215', 'Ciki Walens', 'Dus', '6', '', ''),
(3, 'WG-201713549728', '4/11/2017', '11/11/2017', 'Banten', '1923081008002', 'Buku Hiragana', 'Pack', '3', '', ''),
(4, 'WG-201774896520', '9/11/2017', '12/11/2017', 'Yogyakarta', '60201311121008264', 'Battery ZTE', 'Dus', '3', '', ''),
(5, 'WG-201727134650', '05/12/2017', '20/12/2017', 'Jakarta', '29312390203', 'Susu', 'Dus', '17', '', ''),
(6, 'WG-201810974628', '15/01/2018', '16/01/2018', 'Lampung', '1923081008002', 'Buku Nihongo', 'Dus', '50', '', ''),
(7, 'WG-201781267543', '7/11/2017', '17/01/2018', 'Yogyakarta', '97897952889', 'Buku Framework Codeigniter', 'Dus', '1', '', ''),
(8, 'WG-201832570869', '15/01/2018', '17/01/2018', 'Bali', '1923081008002', 'test', 'Dus', '10', '', ''),
(9, 'WG-201893850472', '15/01/2018', '18/01/2018', 'Bali', '1923081008002', 'lumpur nartugo', 'Pcs', '11', '', ''),
(10, 'WG-201781267543', '7/11/2017', '15/01/2018', 'Yogyakarta', '97897952889', 'Buku Framework Codeigniter', 'Dus', '1', '', ''),
(11, 'WG-201727134650', '05/12/2017', '15/01/2018', 'Jakarta', '29312390203', 'Susu', 'Dus', '3', '', ''),
(12, 'WG-201774896520', '9/11/2017', '15/01/2018', 'Yogyakarta', '60201311121008264', 'Battery ZTE', 'Dus', '3', '', ''),
(13, 'WG-201727134650', '05/12/2017', '16/01/2018', 'Jakarta', '29312390203', 'Susu', 'Dus', '1', '', ''),
(14, 'WG-201727134650', '05/12/2017', '17/01/2018', 'Jakarta', '29312390203', 'Susu', 'Dus', '1', '', ''),
(15, 'WG-201885472106', '18/01/2018', '19/01/2018', 'Riau', '8996001600146', 'Teh Pucuk', 'Dus', '50', '', ''),
(16, 'WG-201871602934', '18/01/2018', '16/03/2018', 'Papua', '312212331222', 'Kopi Hitam', 'Dus', '10', '', ''),
(17, 'WG-202197250483', '19/05/2021', '19/05/2021', 'Bengkulu', 'aa', 'ada', 'Pcs', '8', '', ''),
(18, 'WG-202197250483', '19/05/2021', '19/05/2021', 'Bengkulu', 'aa', 'ada', 'Pcs', '8', '', ''),
(19, 'WG-201871602934', '18/01/2018', '21/05/2021', 'Papua', '312212331222', 'Kopi Hitam', 'Dus', '8', '', ''),
(20, 'WG-201871602934', '18/01/2018', '20/05/2021', 'Papua', '312212331222', 'Kopi Hitam', 'Dus', '80', '', ''),
(21, 'WG-201871602934', '18/01/2018', '29/05/2021', 'Papua', '312212331222', 'Kopi Hitam', 'Dus', '2', '', ''),
(22, 'WG-202183492571', '20/05/2021', '19/05/2021', 'Jawa Tengah', 'kp134', 'ada', 'Pcs', '8', '', ''),
(23, 'WG-202162130875', '21/05/2021', '21/05/2021', 'NTB', 'kp134', 'Kopi Merah', 'Dus', '80', '', ''),
(24, 'WG-202162130875', '21/05/2021', '22/05/2021', 'NTB', 'kp134', 'Kopi Merah', 'Dus', '60', '', ''),
(25, 'WG-202162130875', '21/05/2021', '31/05/2021', 'NTB', 'kp134', 'Kopi Merah', 'Dus', '20', '', 'Disewa'),
(26, 'WG-202162130875', '21/05/2021', '21/05/2021', 'J25', 'kp134', 'Kopi Merah', 'Dus', '28', '', 'Dijual'),
(27, 'WG-202152170389', '21/05/2021', '21/05/2021', 'J26', 'ad1e44', 'Anggur', 'Dus', '80', '0', 'Disewa'),
(28, 'WG-202152170389', '21/05/2021', '21/05/2021', 'J26', 'ad1e44', 'Anggur', 'Dus', '10', '0', 'Disewa'),
(29, 'WG-202152170389', '21/05/2021', '24/05/2021', 'J26', 'ad1e44', 'Anggur', 'Dus', '110', '0', 'dijual'),
(30, 'WG-202104925683', '22/05/2021', '24/05/2021', 'I20', 'Kp828', 'CB90', 'Dus', '155', '0', 'Dijual'),
(31, 'WG-202181925376', '2021-05-24', '18/05/2021', 'i20', 'kp134323', 'ASAP', 'Pcs', '11', '1', ''),
(32, 'WG-202181925376', '2021-05-24', '05/05/2021', 'i20', 'kp134323', 'ASAP', 'Pcs', '1', '3', ''),
(33, 'WG-202108641975', '2021-05-22', '25/05/2021', 'Blok J 25', 'ad1e44', 'Kopi Merah', 'Dus', '50', '', ''),
(34, 'WG-202108641975', '2021-05-22', '25/05/2021', 'Blok J 25', 'ad1e44', 'Kopi Merah', 'Dus', '50', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tb_barang_kembali`
--

CREATE TABLE `tb_barang_kembali` (
  `id` int(10) NOT NULL,
  `id_transaksi` varchar(50) NOT NULL,
  `tanggal_kembali` varchar(20) NOT NULL,
  `lokasi` varchar(100) NOT NULL,
  `kode_barang` varchar(100) NOT NULL,
  `nama_barang` varchar(100) NOT NULL,
  `satuan` varchar(50) NOT NULL,
  `jumlah` int(10) NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_barang_kembali`
--

INSERT INTO `tb_barang_kembali` (`id`, `id_transaksi`, `tanggal_kembali`, `lokasi`, `kode_barang`, `nama_barang`, `satuan`, `jumlah`, `status`) VALUES
(9, 'WG-202181925376', '2021-05-24', 'i20', 'kp134323', 'ASAP', 'Pcs', 0, '1'),
(10, 'WG-202181925376', '2021-05-24', 'i20', 'kp134323', 'ASAP', 'Pcs', 0, '3'),
(11, 'WG-202181925376', '2021-05-25', 'i20', 'kp134323', 'ASAP', 'Pcs', 1, '3');

-- --------------------------------------------------------

--
-- Table structure for table `tb_barang_masuk`
--

CREATE TABLE `tb_barang_masuk` (
  `id` int(11) NOT NULL,
  `id_transaksi` varchar(50) NOT NULL,
  `tanggal` varchar(20) NOT NULL,
  `lokasi` varchar(100) NOT NULL,
  `kode_barang` varchar(100) NOT NULL,
  `nama_barang` varchar(100) NOT NULL,
  `satuan` varchar(50) NOT NULL,
  `jumlah` varchar(10) NOT NULL,
  `qr_code` varchar(50) NOT NULL,
  `gambar` varchar(100) NOT NULL,
  `keterangan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_barang_masuk`
--

INSERT INTO `tb_barang_masuk` (`id`, `id_transaksi`, `tanggal`, `lokasi`, `kode_barang`, `nama_barang`, `satuan`, `jumlah`, `qr_code`, `gambar`, `keterangan`) VALUES
(2, 'WG-202113468729', '2021-05-22', 'i20', 'i201838', 'CB45', 'Pack', '133', 'WG-202113468729.png', '', ''),
(3, 'WG-202129804716', '2021-05-24', 'Blok J 25', 'kp13456', 'daging', 'Dus', '23', 'WG-202129804716.png', 'TTD_Dra__Heni_Agustina,_MEM1.jpeg', ''),
(4, 'WG-202151936704', '2021-05-24', 'i20', '45544', 'kumci', 'Pcs', '9', 'WG-202151936704.png', 'TTD_Dra__Heni_Agustina,_MEM.jpeg', ''),
(5, 'WG-202153746281', '2021-05-22', 'MOI', 'er4566', 'Jamur', 'Dus', '124', 'WG-202153746281.png', 'download_(1).png', ''),
(6, 'WG-202157204169', '2021-05-22', 'Biro KLN', 'i201838', 'Anggur', 'Pcs', '144', 'WG-202157204169.png', 'download_(3).png', '');

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
(5, 'Pack', 'Pack');

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
(5, 'admin', 'foto_mas_dim.png', '1.64'),
(6, 'user', 'nopic2.png', '6.33');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(12) NOT NULL,
  `username` varchar(200) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(200) NOT NULL,
  `role` tinyint(4) NOT NULL DEFAULT 0,
  `last_login` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `email`, `password`, `role`, `last_login`) VALUES
(11, 'zahidin', 'riskididin@ymail.com', '$2y$10$WZYOZcN05JHriS09.C6o7evdWIJ3Obj7vNHzuLunFIAZCDJtG6W1C', 1, '17-03-2018 11:47'),
(12, 'husni', 'husni@gmail.com', '$2y$10$MXbWRsLw6S6xpyQu2/ZiEeB7oTCLrfEPpDcXWaszFVoYj.Yv51wG.', 0, '17-03-2018 11:19'),
(16, 'test', 'test@gmail.com', '$2y$10$CTjzvmT5B.dxojKZOxsjTeMc4E7.Gwl9slAgX.0lozwGrKSMxzWdO', 1, '16-03-2018 4:46'),
(17, 'coba', 'coba@gmail.com', '$2y$10$WRMyjAi8nnkr3J3QvzvyHuEoqay5dYd5NgMJKxsxtXKCp8.JCxZm.', 1, '15-01-2018 15:41'),
(20, 'admin', 'admin@gmail.com', '$2y$10$3HNkMOtwX8X88Xb3DIveYuhXScTnJ9m16/rPDF1/VTa/VTisxVZ4i', 1, '25-05-2021 3:09'),
(22, 'adit', 'adityadwinanto@gmail.com', '$2y$10$pwnpMu9BtTNA47DAStkwFeqZQRVYOqNBwu58JMcjwI60ZkuAVxbCS', 1, ''),
(23, 'user', 'adityadwinanto@gmail.com', '$2y$10$H8vihdbIoMdEcZgchcCGU.e7EZZEnEqPiNdr23LInfbqvuobX/CIS', 0, '21-05-2021 5:19');

--
-- Indexes for dumped tables
--

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
-- Indexes for table `tb_satuan`
--
ALTER TABLE `tb_satuan`
  ADD PRIMARY KEY (`id_satuan`);

--
-- Indexes for table `tb_upload_gambar_user`
--
ALTER TABLE `tb_upload_gambar_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_barang_keluar`
--
ALTER TABLE `tb_barang_keluar`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `tb_barang_kembali`
--
ALTER TABLE `tb_barang_kembali`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tb_barang_masuk`
--
ALTER TABLE `tb_barang_masuk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tb_satuan`
--
ALTER TABLE `tb_satuan`
  MODIFY `id_satuan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_upload_gambar_user`
--
ALTER TABLE `tb_upload_gambar_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
