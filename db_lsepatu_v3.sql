-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 19 Bulan Mei 2019 pada 15.51
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
-- Struktur dari tabel `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `admin_id` int(11) NOT NULL,
  `admin_tanggal` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `admin_nama` varchar(150) DEFAULT NULL,
  `admin_password` varchar(150) DEFAULT NULL,
  `admin_email` varchar(100) NOT NULL,
  `admin_level` varchar(2) DEFAULT NULL,
  `admin_status` varchar(2) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_admin`
--

INSERT INTO `tbl_admin` (`admin_id`, `admin_tanggal`, `admin_nama`, `admin_password`, `admin_email`, `admin_level`, `admin_status`) VALUES
(1, '2019-04-28 06:34:59', 'admin', 'admin', 'yadri.amz@gmail.com', '1', '1'),
(2, '2019-04-28 06:34:59', 'pegawai', 'pegawai', '', '2', '1'),
(51, '2019-05-15 04:10:58', 'yadri', '$2y$10$BkuERaA./Yek5fqIbRGXq.hZJLapq71lHMKgLgxZ8U7hbXRzguJT.', 'yadribl@gmail.com', '1', '1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_detail_transaksi_masuk`
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
-- Dumping data untuk tabel `tbl_detail_transaksi_masuk`
--

INSERT INTO `tbl_detail_transaksi_masuk` (`dtm_id`, `dtm_nofak`, `dtm_paket_id`, `dtm_paket_nama`, `dtm_satuan`, `dtm_harga`, `dtm_qty`, `dtm_total`) VALUES
(1, 'TM2804190001', 'PK01', 'deep clean', 'satu pasang', 20000, 2, 40000),
(2, 'TM2804190001', 'PK02', 'unyellowing', 'satu pasang', 25000, 2, 50000),
(3, 'TM2804190002', 'PK01', 'deep clean', 'satu pasang', 20000, 1, 20000),
(4, 'TM2804190002', 'PK02', 'unyellowing', 'satu pasang', 25000, 2, 50000),
(5, 'TM2804190003', 'PK02', 'unyellowing', 'satu pasang', 25000, 1, 25000),
(6, 'TM2804190003', 'PK03', 'recolour', 'satu pasang', 80000, 1, 80000),
(7, 'TM2904190001', 'PK01', 'deep clean', 'satu pasang', 20000, 1, 20000),
(8, 'TM2904190001', 'PK02', 'unyellowing', 'satu pasang', 25000, 1, 25000),
(9, 'TM2904190001', 'PK03', 'recolour', 'satu pasang', 80000, 1, 80000),
(10, 'TM3004190001', 'PK01', 'deep clean', 'satu pasang', 20000, 3, 60000),
(11, 'TM3004190001', 'PK02', 'unyellowing', 'satu pasang', 25000, 2, 50000),
(12, 'TM3004190002', 'PK01', 'deep clean', 'satu pasang', 20000, 1, 20000),
(13, 'TM0205190001', 'PK02', 'unyellowing', 'satu pasang', 25000, 2, 50000),
(14, 'TM0205190001', 'PK03', 'recolour', 'satu pasang', 80000, 1, 80000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_level`
--

CREATE TABLE `tbl_level` (
  `level_id` int(1) NOT NULL,
  `level_role` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_level`
--

INSERT INTO `tbl_level` (`level_id`, `level_role`) VALUES
(1, 'owner'),
(2, 'pegawai'),
(3, 'user');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_menu`
--

CREATE TABLE `tbl_menu` (
  `menu_id` int(1) NOT NULL,
  `menu_title` varchar(20) NOT NULL,
  `menu_icon` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_menu_akses`
--

CREATE TABLE `tbl_menu_akses` (
  `akses_id` int(1) NOT NULL,
  `akses_level_id` int(1) NOT NULL,
  `akses_menu` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_paket`
--

CREATE TABLE `tbl_paket` (
  `paket_id` varchar(15) NOT NULL,
  `paket_nama` varchar(100) DEFAULT NULL,
  `paket_satuan` varchar(100) DEFAULT NULL,
  `paket_harga` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_paket`
--

INSERT INTO `tbl_paket` (`paket_id`, `paket_nama`, `paket_satuan`, `paket_harga`) VALUES
('PK01', 'deep clean', 'satu pasang', 20000),
('PK02', 'unyellowing', 'satu pasang', 25000),
('PK03', 'recolour', 'satu pasang', 80000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_pengeluaran`
--

CREATE TABLE `tbl_pengeluaran` (
  `pengeluaran_id` int(11) NOT NULL,
  `pengeluaran_tanggal` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `pengeluaran_nama` varchar(100) DEFAULT NULL,
  `pengeluaran_harga` double DEFAULT NULL,
  `pengeluaran_keterangan` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_pengeluaran`
--

INSERT INTO `tbl_pengeluaran` (`pengeluaran_id`, `pengeluaran_tanggal`, `pengeluaran_nama`, `pengeluaran_harga`, `pengeluaran_keterangan`) VALUES
(99999, '2019-04-28 06:35:01', 'sabun cuci merk apa', 1, 'dasfsdf');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_token`
--

CREATE TABLE `tbl_token` (
  `tk_id` int(1) NOT NULL,
  `tk_email` varchar(128) NOT NULL,
  `tk_token` varchar(128) NOT NULL,
  `tk_time` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_token`
--

INSERT INTO `tbl_token` (`tk_id`, `tk_email`, `tk_token`, `tk_time`) VALUES
(23, 'slenderyman1@gmail.com', 'Y1bQO8kRolsS8+8rXt0ABRwSfCR7PVd7WjLMMpnLP/w=', 1557805558),
(24, 'korewamovie01@gmail.com', 'Z0MMP+qdGLM5PHTAOWPtX11fxOLZ9Fb0G/9+JMTWFDI=', 1557805581),
(32, 'yadribl@gmail.com', 'CsetmzMBnPLcyQtR06TEzkCIftcltmmZiUICd7+DRq0=', 1557893458),
(33, 'yadribl@gmail.com', 'VOUlS1MiJAuE4Xyp0dbjEiy/M6No7caO3KlO7n2eSZw=', 1558194818),
(34, 'yadribl@gmail.com', 'BEFIVd4kLsS+aFcjh7jFR0PzBDKdm5Fl42ABK+Wl4Hw=', 1558194905),
(35, 'yadribl@gmail.com', '7rV+7eh8Pz8iA6+8jS1/CmTmZkJHVqPbJjhotjumS/U=', 1558194959),
(36, 'yadribl@gmail.com', 'aotq+P0lD+2EyUWxEehVZmG+36tFMmH9rZh7sICiDJg=', 1558194979),
(37, 'yadribl@gmail.com', '4CE74P/KnUNo/dhE7sAOweyuVrM9/a3qGAFzcLEsWW8=', 1558194989);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_transaksi_keluar`
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
-- Dumping data untuk tabel `tbl_transaksi_keluar`
--

INSERT INTO `tbl_transaksi_keluar` (`tk_nofak`, `tk_tanggal`, `tk_tm_nofak`, `tk_total_sepatu`, `tk_total`, `tk_jml_uang`, `tk_kembalian`, `tk_admin_id`, `tk_user_id`, `tk_nama`, `tk_alamat`, `tk_no_telp`) VALUES
('TK2904190001', '2019-04-29 13:49:27', 'TM2804190001', 0, 90000, 100000, 10000, 1, NULL, 'susilawati', 'madura', '085447447445'),
('TK2904190002', '2019-04-29 14:16:17', 'TM2804190002', 0, 70000, 70000, 0, 2, NULL, 'Farhan', 'Jurangsapi', '085221445669');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_transaksi_masuk`
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
-- Dumping data untuk tabel `tbl_transaksi_masuk`
--

INSERT INTO `tbl_transaksi_masuk` (`tm_nofak`, `tm_tanggal`, `tm_total_sepatu`, `tm_total`, `tm_admin_id`, `tm_keterangan`, `tm_user_id`, `tm_nama`, `tm_alamat`, `tm_no_telp`, `tm_status`, `tm_status_bayar`) VALUES
('TM0205190001', '2019-05-02 06:39:21', 3, 130000, 2, 'ahew', 0, 'dadhan', 'perum puri', '085221244122', 'belum', 'belum'),
('TM2804190001', '2019-04-28 14:57:46', 4, 90000, 2, 'TIDAK ADA', 0, 'susilawati', 'madura', '085447447445', 'belum', 'belum'),
('TM2804190002', '2019-04-28 14:58:38', 3, 70000, 2, 'gk tau dah', 0, 'Farhan', 'Jurangsapi', '085221445669', 'belum', 'belum'),
('TM2804190003', '2019-04-28 15:00:01', 2, 105000, 2, 'isi sembarang', 0, 'yadri', 'kaliurang', '085441225447', 'belum', 'belum'),
('TM2904190001', '2019-04-29 15:17:51', 3, 125000, 2, 'fa', 0, 'fa', 'fa', '02', 'belum', 'belum'),
('TM3004190001', '2019-04-30 02:42:34', 5, 110000, 2, 'hggug', 0, 'yadreh', 'c32', '085221225224', 'belum', 'belum'),
('TM3004190002', '2019-04-30 08:33:17', 1, 20000, 2, 'tidak ada', 0, 'ada', 'ada', 'ada', 'belum', 'belum');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_user`
--

CREATE TABLE `tbl_user` (
  `user_id` int(11) NOT NULL,
  `user_tanggal` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `user_nama` varchar(150) DEFAULT NULL,
  `user_alamat` text,
  `user_no_telp` varchar(12) DEFAULT NULL,
  `user_username` varchar(150) DEFAULT NULL,
  `user_password` varchar(150) DEFAULT NULL,
  `user_level` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_user`
--

INSERT INTO `tbl_user` (`user_id`, `user_tanggal`, `user_nama`, `user_alamat`, `user_no_telp`, `user_username`, `user_password`, `user_level`) VALUES
(1, '2019-04-28 06:34:59', 'ramadhan', 'ramadhan', 'ramadhan', 'ramadhan', 'ramadhan', 0),
(2, '2019-04-28 06:34:59', 'yadri', 'yadri', 'yadri', 'yadri', 'yadri', 0);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`admin_id`),
  ADD KEY `admin_level` (`admin_level`);

--
-- Indeks untuk tabel `tbl_detail_transaksi_masuk`
--
ALTER TABLE `tbl_detail_transaksi_masuk`
  ADD PRIMARY KEY (`dtm_id`),
  ADD KEY `dtm_nofak` (`dtm_nofak`),
  ADD KEY `dtm_paket_id` (`dtm_paket_id`);

--
-- Indeks untuk tabel `tbl_level`
--
ALTER TABLE `tbl_level`
  ADD PRIMARY KEY (`level_id`);

--
-- Indeks untuk tabel `tbl_menu`
--
ALTER TABLE `tbl_menu`
  ADD PRIMARY KEY (`menu_id`);

--
-- Indeks untuk tabel `tbl_menu_akses`
--
ALTER TABLE `tbl_menu_akses`
  ADD PRIMARY KEY (`akses_id`);

--
-- Indeks untuk tabel `tbl_paket`
--
ALTER TABLE `tbl_paket`
  ADD PRIMARY KEY (`paket_id`);

--
-- Indeks untuk tabel `tbl_pengeluaran`
--
ALTER TABLE `tbl_pengeluaran`
  ADD PRIMARY KEY (`pengeluaran_id`);

--
-- Indeks untuk tabel `tbl_token`
--
ALTER TABLE `tbl_token`
  ADD PRIMARY KEY (`tk_id`);

--
-- Indeks untuk tabel `tbl_transaksi_keluar`
--
ALTER TABLE `tbl_transaksi_keluar`
  ADD PRIMARY KEY (`tk_nofak`),
  ADD KEY `tk_tm_nofak` (`tk_tm_nofak`);

--
-- Indeks untuk tabel `tbl_transaksi_masuk`
--
ALTER TABLE `tbl_transaksi_masuk`
  ADD PRIMARY KEY (`tm_nofak`),
  ADD KEY `tm_admin_id` (`tm_admin_id`),
  ADD KEY `tm_user_id` (`tm_user_id`);

--
-- Indeks untuk tabel `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `user_level` (`user_level`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT untuk tabel `tbl_detail_transaksi_masuk`
--
ALTER TABLE `tbl_detail_transaksi_masuk`
  MODIFY `dtm_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `tbl_level`
--
ALTER TABLE `tbl_level`
  MODIFY `level_id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tbl_pengeluaran`
--
ALTER TABLE `tbl_pengeluaran`
  MODIFY `pengeluaran_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100000;

--
-- AUTO_INCREMENT untuk tabel `tbl_token`
--
ALTER TABLE `tbl_token`
  MODIFY `tk_id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT untuk tabel `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tbl_detail_transaksi_masuk`
--
ALTER TABLE `tbl_detail_transaksi_masuk`
  ADD CONSTRAINT `tbl_detail_transaksi_masuk_ibfk_1` FOREIGN KEY (`dtm_paket_id`) REFERENCES `tbl_paket` (`paket_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_detail_transaksi_masuk_ibfk_2` FOREIGN KEY (`dtm_nofak`) REFERENCES `tbl_transaksi_masuk` (`tm_nofak`) ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tbl_transaksi_keluar`
--
ALTER TABLE `tbl_transaksi_keluar`
  ADD CONSTRAINT `tbl_transaksi_keluar_ibfk_1` FOREIGN KEY (`tk_tm_nofak`) REFERENCES `tbl_transaksi_masuk` (`tm_nofak`) ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tbl_transaksi_masuk`
--
ALTER TABLE `tbl_transaksi_masuk`
  ADD CONSTRAINT `tbl_transaksi_masuk_ibfk_1` FOREIGN KEY (`tm_admin_id`) REFERENCES `tbl_admin` (`admin_id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
