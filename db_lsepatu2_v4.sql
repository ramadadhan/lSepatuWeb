-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 27, 2019 at 08:43 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_lsepatu2`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_detail_transaksi_masuk`
--

CREATE TABLE `tbl_detail_transaksi_masuk` (
  `dtm_id` int(11) NOT NULL,
  `dtm_nofak` varchar(15) DEFAULT NULL,
  `dtm_paket_id` varchar(15) DEFAULT NULL,
  `dtm_paket_nama` varchar(15) DEFAULT NULL,
  `dtm_satuan` varchar(15) DEFAULT NULL,
  `dtm_harga` double DEFAULT NULL,
  `dtm_qty` int(11) DEFAULT NULL,
  `dtm_total` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_detail_transaksi_masuk`
--

INSERT INTO `tbl_detail_transaksi_masuk` (`dtm_id`, `dtm_nofak`, `dtm_paket_id`, `dtm_paket_nama`, `dtm_satuan`, `dtm_harga`, `dtm_qty`, `dtm_total`) VALUES
(15, 'TM1905090001', 'PK01', 'deep clean', 'satu pasang', 20000, 1, 20000),
(16, 'TM1905090001', 'PK02', 'unyellowing', 'satu pasang', 25000, 1, 25000),
(17, 'TM1905090001', 'PK03', 'recolour', 'satu pasang', 80000, 1, 80000);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_level`
--

CREATE TABLE `tbl_level` (
  `level_id` int(1) NOT NULL,
  `level_role` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_level`
--

INSERT INTO `tbl_level` (`level_id`, `level_role`) VALUES
(1, 'owner'),
(2, 'pegawai'),
(3, 'user');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_menu`
--

CREATE TABLE `tbl_menu` (
  `menu_id` int(1) NOT NULL,
  `menu_title` varchar(20) NOT NULL,
  `menu_icon` varchar(100) NOT NULL,
  `menu_url` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_menu`
--

INSERT INTO `tbl_menu` (`menu_id`, `menu_title`, `menu_icon`, `menu_url`) VALUES
(1, 'Transaksi Masuk', '<i class=\"fa fa-cart-plus\" aria-hidden=\"true\"></i>', ''),
(2, 'Transaksi Keluar', '<i class=\"fa fa-cart-arrow-down\"></i>', ''),
(3, 'Data Paket', '<i class=\"fa fa-list\" aria-hidden=\"true\"></i>', ''),
(4, 'Data Admin', '<i class=\"fa fa-user\" aria-hidden=\"true\"></i>', ''),
(5, 'Data User', '<i class=\"fa fa-users\" aria-hidden=\"true\"></i>', ''),
(6, 'Data Pengeluaran', '<i class=\"fa fa-shopping-cart\" aria-hidden=\"true\"></i>', ''),
(7, 'Laporan', '<i class=\"fa fa-list-ol\" aria-hidden=\"true\"></i>', ''),
(8, 'Registrasi Pegawai', '<i class=\"fa fa-pencil-square-o\" aria-hidden=\"true\"></i>', ''),
(9, 'Registrasi User', '<i class=\"fa fa-pencil-square-o\" aria-hidden=\"true\"></i>', ''),
(10, 'Profil', '<i class=\"fa fa-street-view\" aria-hidden=\"true\"></i>', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_menu_akses`
--

CREATE TABLE `tbl_menu_akses` (
  `akses_id` int(1) NOT NULL,
  `akses_level_id` int(1) NOT NULL,
  `akses_menu_id` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_menu_akses`
--

INSERT INTO `tbl_menu_akses` (`akses_id`, `akses_level_id`, `akses_menu_id`) VALUES
(1, 1, 3),
(2, 1, 4),
(3, 1, 5),
(4, 1, 6),
(5, 1, 7),
(6, 1, 8),
(7, 1, 9),
(8, 2, 1),
(9, 2, 2),
(10, 2, 6),
(11, 2, 9),
(12, 2, 10),
(13, 2, 5),
(14, 2, 7),
(15, 3, 1),
(16, 3, 2),
(17, 3, 3);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_paket`
--

CREATE TABLE `tbl_paket` (
  `paket_id` varchar(15) NOT NULL,
  `paket_nama` varchar(100) DEFAULT NULL,
  `paket_satuan` varchar(100) DEFAULT NULL,
  `paket_harga` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_paket`
--

INSERT INTO `tbl_paket` (`paket_id`, `paket_nama`, `paket_satuan`, `paket_harga`) VALUES
('PK01', 'deep clean', 'satu pasang', 20000),
('PK02', 'unyellowing', 'satu pasang', 25000),
('PK03', 'recolour', 'satu pasang', 80000);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pengeluaran`
--

CREATE TABLE `tbl_pengeluaran` (
  `pengeluaran_id` int(11) NOT NULL,
  `pengeluaran_tanggal` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `pengeluaran_nama` varchar(100) DEFAULT NULL,
  `pengeluaran_harga` double DEFAULT NULL,
  `pengeluaran_keterangan` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_pengeluaran`
--

INSERT INTO `tbl_pengeluaran` (`pengeluaran_id`, `pengeluaran_tanggal`, `pengeluaran_nama`, `pengeluaran_harga`, `pengeluaran_keterangan`) VALUES
(99999, '2019-04-28 06:35:01', 'sabun cuci merk apa', 1, 'dasfsdf');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_token`
--

CREATE TABLE `tbl_token` (
  `tk_id` int(1) NOT NULL,
  `tk_email` varchar(128) NOT NULL,
  `tk_token` varchar(128) NOT NULL,
  `tk_time` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_token`
--

INSERT INTO `tbl_token` (`tk_id`, `tk_email`, `tk_token`, `tk_time`) VALUES
(23, 'slenderyman1@gmail.com', 'Y1bQO8kRolsS8+8rXt0ABRwSfCR7PVd7WjLMMpnLP/w=', 1557805558),
(24, 'korewamovie01@gmail.com', 'Z0MMP+qdGLM5PHTAOWPtX11fxOLZ9Fb0G/9+JMTWFDI=', 1557805581),
(32, 'yadribl@gmail.com', 'CsetmzMBnPLcyQtR06TEzkCIftcltmmZiUICd7+DRq0=', 1557893458),
(33, 'yadribl@gmail.com', 'VOUlS1MiJAuE4Xyp0dbjEiy/M6No7caO3KlO7n2eSZw=', 1558194818),
(34, 'yadribl@gmail.com', 'BEFIVd4kLsS+aFcjh7jFR0PzBDKdm5Fl42ABK+Wl4Hw=', 1558194905),
(35, 'yadribl@gmail.com', '7rV+7eh8Pz8iA6+8jS1/CmTmZkJHVqPbJjhotjumS/U=', 1558194959),
(36, 'yadribl@gmail.com', 'aotq+P0lD+2EyUWxEehVZmG+36tFMmH9rZh7sICiDJg=', 1558194979),
(37, 'yadribl@gmail.com', '4CE74P/KnUNo/dhE7sAOweyuVrM9/a3qGAFzcLEsWW8=', 1558194989),
(39, 'korewamovie01@gmail.com', 'asl7l0D9GVy49YaXefw6UBFEI92td6/qJoVzfDhoo68=', 1558538436),
(40, 'yadri.amz@gmail.com', 'Uq37uuiyl1aUBt5r7+5XGGdy921iDuQWzGuipVv/7QM=', 1558539217),
(45, 'mochnurcholes@gmail.com', 'pp36RN11GxeUeJurJ87v2aG97XRZNUocE3t7wyPKN40=', 1558636316),
(46, 'korewamovie01@gmail.com', 'WbHYX8x2w2ScsU94SsklgqbVTiPOwxM+MxRwcuND3Mo=', 1558636347),
(47, 'farhan7rizal@gmail.com', '4wuLpeyD+f2/JBbfM9Is0thYJKrzeLcSHQ5SUstqj+s=', 1558636717),
(48, 'mochnurcholes@gmail.com', 'iMFN4oE8Ak377CxSHo5lagdzeEJpiltMlnNTCv/KFvA=', 1558651303),
(49, 'slenderyman1@gmail.com', 'qzhvi4pfvUkoZl5zI//ubnS2Z0rMJm00JV1aSPwKnlk=', 1558652580);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_transaksi_keluar`
--

CREATE TABLE `tbl_transaksi_keluar` (
  `tk_nofak` varchar(15) NOT NULL,
  `tk_tanggal` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `tk_tm_nofak` varchar(15) DEFAULT NULL,
  `tk_total_sepatu` double NOT NULL,
  `tk_total` double DEFAULT NULL,
  `tk_jml_uang` double DEFAULT NULL,
  `tk_kembalian` double DEFAULT NULL,
  `tk_admin_id` int(11) DEFAULT NULL,
  `tk_user_id` int(11) DEFAULT NULL,
  `tk_nama` varchar(150) DEFAULT NULL,
  `tk_alamat` varchar(150) DEFAULT NULL,
  `tk_no_telp` varchar(12) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_transaksi_keluar`
--

INSERT INTO `tbl_transaksi_keluar` (`tk_nofak`, `tk_tanggal`, `tk_tm_nofak`, `tk_total_sepatu`, `tk_total`, `tk_jml_uang`, `tk_kembalian`, `tk_admin_id`, `tk_user_id`, `tk_nama`, `tk_alamat`, `tk_no_telp`) VALUES
('TK1905090001', '2019-05-09 15:08:48', 'TM1905090001', 3, 125000, 130, 5000, 2, 125000, 'ramadhan', 'no', 'no');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_transaksi_masuk`
--

CREATE TABLE `tbl_transaksi_masuk` (
  `tm_nofak` varchar(15) NOT NULL,
  `tm_tanggal` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `tm_total_sepatu` int(11) NOT NULL,
  `tm_total` double DEFAULT NULL,
  `tm_admin_id` int(11) DEFAULT NULL,
  `tm_keterangan` varchar(150) DEFAULT NULL,
  `tm_user_id` int(11) DEFAULT NULL,
  `tm_nama` varchar(150) DEFAULT NULL,
  `tm_alamat` varchar(150) DEFAULT NULL,
  `tm_no_telp` varchar(12) DEFAULT NULL,
  `tm_status` enum('belum','cuci','jemur','kering') NOT NULL DEFAULT 'belum',
  `tm_status_bayar` enum('belum','sudah') NOT NULL DEFAULT 'belum'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_transaksi_masuk`
--

INSERT INTO `tbl_transaksi_masuk` (`tm_nofak`, `tm_tanggal`, `tm_total_sepatu`, `tm_total`, `tm_admin_id`, `tm_keterangan`, `tm_user_id`, `tm_nama`, `tm_alamat`, `tm_no_telp`, `tm_status`, `tm_status_bayar`) VALUES
('TM1905090001', '2019-05-09 15:08:04', 3, 125000, 2, 'asd', 0, 'ramadhan', 'ramadhan', '', 'belum', 'sudah');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `users_id` int(11) NOT NULL,
  `users_tanggal` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `users_nama` varchar(150) DEFAULT NULL,
  `users_password` varchar(150) DEFAULT NULL,
  `users_email` varchar(100) NOT NULL,
  `users_level` varchar(2) DEFAULT NULL,
  `users_status` varchar(2) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`users_id`, `users_tanggal`, `users_nama`, `users_password`, `users_email`, `users_level`, `users_status`) VALUES
(2, '2019-04-28 06:34:59', 'pegawai', 'pegawai', '', '2', '1'),
(51, '2019-05-15 04:10:58', 'yadri', '$2y$10$BkuERaA./Yek5fqIbRGXq.hZJLapq71lHMKgLgxZ8U7hbXRzguJT.', 'yadribl@gmail.com', '1', '1'),
(53, '2019-05-22 15:20:36', 'farhanrizal', '$2y$10$50sTywXt5BjL9hGmKvT3G.tUaknHVII3ZzD.RMUI9ZkOreJ3KGLcG', 'korewamovie01@gmail.com', '2', '1'),
(54, '2019-05-22 15:33:37', 'yamzal', '$2y$10$6rpxopB5zClHeD8Qy3w/e.M9OfD/FjIQjNs2fheAzMjUlKjHzgXYe', 'yadri.amz@gmail.com', '3', '1'),
(60, '2019-05-23 18:38:37', 'Farhan Rizal', '$2y$10$hGVLxyJQtDqo3H8.WV1ukOn4UrgaXcJgQy/toX6e.pfFw3pygOmim', 'farhan7rizal@gmail.com', '2', '0'),
(61, '2019-05-23 22:41:43', 'irfan siddiq', '$2y$10$XU.1L38H4J2o3DcN9ZIg1uPxLEFjpAmeBqJJzyuwNVOkNyOhqVWhi', 'mochnurcholes@gmail.com', '2', '0'),
(62, '2019-05-23 23:03:00', 'test', '$2y$10$NzHmesIlZjrH570hlkcT0.S4b3aDJRMT0/4LizST1EzkfP8tt8Cu2', 'slenderyman1@gmail.com', '2', '0');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_detail_transaksi_masuk`
--
ALTER TABLE `tbl_detail_transaksi_masuk`
  ADD PRIMARY KEY (`dtm_id`),
  ADD KEY `dtm_nofak` (`dtm_nofak`),
  ADD KEY `dtm_paket_id` (`dtm_paket_id`);

--
-- Indexes for table `tbl_level`
--
ALTER TABLE `tbl_level`
  ADD PRIMARY KEY (`level_id`);

--
-- Indexes for table `tbl_menu`
--
ALTER TABLE `tbl_menu`
  ADD PRIMARY KEY (`menu_id`);

--
-- Indexes for table `tbl_menu_akses`
--
ALTER TABLE `tbl_menu_akses`
  ADD PRIMARY KEY (`akses_id`);

--
-- Indexes for table `tbl_paket`
--
ALTER TABLE `tbl_paket`
  ADD PRIMARY KEY (`paket_id`);

--
-- Indexes for table `tbl_pengeluaran`
--
ALTER TABLE `tbl_pengeluaran`
  ADD PRIMARY KEY (`pengeluaran_id`);

--
-- Indexes for table `tbl_token`
--
ALTER TABLE `tbl_token`
  ADD PRIMARY KEY (`tk_id`);

--
-- Indexes for table `tbl_transaksi_keluar`
--
ALTER TABLE `tbl_transaksi_keluar`
  ADD PRIMARY KEY (`tk_nofak`),
  ADD KEY `tk_tm_nofak` (`tk_tm_nofak`);

--
-- Indexes for table `tbl_transaksi_masuk`
--
ALTER TABLE `tbl_transaksi_masuk`
  ADD PRIMARY KEY (`tm_nofak`),
  ADD KEY `tm_admin_id` (`tm_admin_id`),
  ADD KEY `tm_user_id` (`tm_user_id`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`users_id`),
  ADD KEY `admin_level` (`users_level`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_detail_transaksi_masuk`
--
ALTER TABLE `tbl_detail_transaksi_masuk`
  MODIFY `dtm_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tbl_level`
--
ALTER TABLE `tbl_level`
  MODIFY `level_id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_pengeluaran`
--
ALTER TABLE `tbl_pengeluaran`
  MODIFY `pengeluaran_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100000;

--
-- AUTO_INCREMENT for table `tbl_token`
--
ALTER TABLE `tbl_token`
  MODIFY `tk_id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `users_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_detail_transaksi_masuk`
--
ALTER TABLE `tbl_detail_transaksi_masuk`
  ADD CONSTRAINT `tbl_detail_transaksi_masuk_ibfk_1` FOREIGN KEY (`dtm_paket_id`) REFERENCES `tbl_paket` (`paket_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_detail_transaksi_masuk_ibfk_2` FOREIGN KEY (`dtm_nofak`) REFERENCES `tbl_transaksi_masuk` (`tm_nofak`) ON UPDATE CASCADE;

--
-- Constraints for table `tbl_transaksi_keluar`
--
ALTER TABLE `tbl_transaksi_keluar`
  ADD CONSTRAINT `tbl_transaksi_keluar_ibfk_1` FOREIGN KEY (`tk_tm_nofak`) REFERENCES `tbl_transaksi_masuk` (`tm_nofak`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
