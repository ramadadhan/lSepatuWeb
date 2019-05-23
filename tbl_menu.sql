-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 22 Bulan Mei 2019 pada 16.44
-- Versi server: 10.1.37-MariaDB
-- Versi PHP: 7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_lsepatu`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_menu`
--

CREATE TABLE `tbl_menu` (
  `menu_id` int(1) NOT NULL,
  `menu_title` varchar(20) NOT NULL,
  `menu_icon` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_menu`
--

INSERT INTO `tbl_menu` (`menu_id`, `menu_title`, `menu_icon`) VALUES
(1, 'Transaksi Masuk', '<i class=\"fa fa-cart-plus\"></i>'),
(2, 'Transaksi Keluar', '<i class=\"fa fa-cart-arrow-down\"></i>'),
(3, 'Data Paket', '<i class=\"fa fa-list\" aria-hidden=\"true\"></i>'),
(4, 'Data Admin', '<i class=\"fa fa-user\" aria-hidden=\"true\"></i>'),
(5, 'Data User', '<i class=\"fa fa-users\" aria-hidden=\"true\"></i>'),
(6, 'Data Pengeluaran', '<i class=\"fa fa-shopping-cart\" aria-hidden=\"true\"></i>'),
(7, 'Laporan', '<i class=\"fa fa-list-ol\" aria-hidden=\"true\"></i>'),
(8, 'Registrasi Pegawai', '<i class=\"fa fa-pencil-square-o\" aria-hidden=\"true\"></i>'),
(9, 'Registrasi User', '<i class=\"fa fa-pencil-square-o\" aria-hidden=\"true\"'),
(10, 'Profil', '<i class=\"fa fa-street-view\" aria-hidden=\"true\"></i>');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tbl_menu`
--
ALTER TABLE `tbl_menu`
  ADD PRIMARY KEY (`menu_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
