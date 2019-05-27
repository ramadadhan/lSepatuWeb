-- MySQL dump 10.16  Distrib 10.1.35-MariaDB, for Win32 (AMD64)
--
-- Host: localhost    Database: db_lsepatu2
-- ------------------------------------------------------
-- Server version	10.1.35-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `tbl_admin`
--

DROP TABLE IF EXISTS `tbl_admin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_admin` (
  `admin_id` int(11) NOT NULL AUTO_INCREMENT,
  `admin_tanggal` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `admin_nama` varchar(150) DEFAULT NULL,
  `admin_username` varchar(150) DEFAULT NULL,
  `admin_password` varchar(150) DEFAULT NULL,
  `admin_level` varchar(2) DEFAULT NULL,
  `admin_status` varchar(2) DEFAULT '1',
  PRIMARY KEY (`admin_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_admin`
--

LOCK TABLES `tbl_admin` WRITE;
/*!40000 ALTER TABLE `tbl_admin` DISABLE KEYS */;
INSERT INTO `tbl_admin` VALUES (1,'2019-04-28 06:34:59','admin','admin','admin','1','1'),(2,'2019-04-28 06:34:59','pegawai','pegawai','pegawai','2','1');
/*!40000 ALTER TABLE `tbl_admin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_detail_transaksi_masuk`
--

DROP TABLE IF EXISTS `tbl_detail_transaksi_masuk`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_detail_transaksi_masuk` (
  `dtm_id` int(11) NOT NULL AUTO_INCREMENT,
  `dtm_nofak` varchar(15) DEFAULT NULL,
  `dtm_paket_id` varchar(15) DEFAULT NULL,
  `dtm_paket_nama` varchar(15) DEFAULT NULL,
  `dtm_satuan` varchar(15) DEFAULT NULL,
  `dtm_harga` double DEFAULT NULL,
  `dtm_qty` int(11) DEFAULT NULL,
  `dtm_total` double DEFAULT NULL,
  PRIMARY KEY (`dtm_id`),
  KEY `dtm_nofak` (`dtm_nofak`),
  KEY `dtm_paket_id` (`dtm_paket_id`),
  CONSTRAINT `tbl_detail_transaksi_masuk_ibfk_1` FOREIGN KEY (`dtm_paket_id`) REFERENCES `tbl_paket` (`paket_id`) ON UPDATE CASCADE,
  CONSTRAINT `tbl_detail_transaksi_masuk_ibfk_2` FOREIGN KEY (`dtm_nofak`) REFERENCES `tbl_transaksi_masuk` (`tm_nofak`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_detail_transaksi_masuk`
--

LOCK TABLES `tbl_detail_transaksi_masuk` WRITE;
/*!40000 ALTER TABLE `tbl_detail_transaksi_masuk` DISABLE KEYS */;
INSERT INTO `tbl_detail_transaksi_masuk` VALUES (15,'TM1905090001','PK01','deep clean','satu pasang',20000,1,20000),(16,'TM1905090001','PK02','unyellowing','satu pasang',25000,1,25000),(17,'TM1905090001','PK03','recolour','satu pasang',80000,1,80000);
/*!40000 ALTER TABLE `tbl_detail_transaksi_masuk` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_level`
--

DROP TABLE IF EXISTS `tbl_level`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_level` (
  `level_id` int(1) NOT NULL AUTO_INCREMENT,
  `level_role` varchar(15) NOT NULL,
  PRIMARY KEY (`level_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_level`
--

LOCK TABLES `tbl_level` WRITE;
/*!40000 ALTER TABLE `tbl_level` DISABLE KEYS */;
INSERT INTO `tbl_level` VALUES (1,'owner'),(2,'pegawai'),(3,'user');
/*!40000 ALTER TABLE `tbl_level` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_menu`
--

DROP TABLE IF EXISTS `tbl_menu`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_menu` (
  `menu_id` int(1) NOT NULL,
  `menu_title` varchar(20) NOT NULL,
  `menu_icon` varchar(100) NOT NULL,
  PRIMARY KEY (`menu_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_menu`
--

LOCK TABLES `tbl_menu` WRITE;
/*!40000 ALTER TABLE `tbl_menu` DISABLE KEYS */;
INSERT INTO `tbl_menu` VALUES (1,'Transaksi Masuk','<i class=\"fa fa-cart-plus\" aria-hidden=\"true\"></i>'),(2,'Transaksi Keluar','<i class=\"fa fa-cart-arrow-down\"></i>'),(3,'Data Paket','<i class=\"fa fa-list\" aria-hidden=\"true\"></i>'),(4,'Data Admin','<i class=\"fa fa-user\" aria-hidden=\"true\"></i>'),(5,'Data User','<i class=\"fa fa-users\" aria-hidden=\"true\"></i>'),(6,'Data Pengeluaran','<i class=\"fa fa-shopping-cart\" aria-hidden=\"true\"></i>'),(7,'Laporan','<i class=\"fa fa-list-ol\" aria-hidden=\"true\"></i>'),(8,'Registrasi Pegawai','<i class=\"fa fa-pencil-square-o\" aria-hidden=\"true\"></i>'),(9,'Registrasi User','<i class=\"fa fa-pencil-square-o\" aria-hidden=\"true\"></i>'),(10,'Profil','<i class=\"fa fa-street-view\" aria-hidden=\"true\"></i>');
/*!40000 ALTER TABLE `tbl_menu` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_menu_akses`
--

DROP TABLE IF EXISTS `tbl_menu_akses`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_menu_akses` (
  `akses_id` int(1) NOT NULL AUTO_INCREMENT,
  `akses_level_id` int(1) NOT NULL,
  `akses_menu_id` int(1) NOT NULL,
  PRIMARY KEY (`akses_id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_menu_akses`
--

LOCK TABLES `tbl_menu_akses` WRITE;
/*!40000 ALTER TABLE `tbl_menu_akses` DISABLE KEYS */;
INSERT INTO `tbl_menu_akses` VALUES (1,1,3),(2,1,4),(3,1,5),(4,1,6),(5,1,7),(6,1,8),(7,1,9),(8,2,1),(9,2,2),(10,2,6),(11,3,3),(12,2,9),(13,2,10),(14,2,5),(15,2,7),(16,3,1),(17,3,2);
/*!40000 ALTER TABLE `tbl_menu_akses` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_paket`
--

DROP TABLE IF EXISTS `tbl_paket`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_paket` (
  `paket_id` varchar(15) NOT NULL,
  `paket_nama` varchar(100) DEFAULT NULL,
  `paket_satuan` varchar(100) DEFAULT NULL,
  `paket_harga` double DEFAULT NULL,
  PRIMARY KEY (`paket_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_paket`
--

LOCK TABLES `tbl_paket` WRITE;
/*!40000 ALTER TABLE `tbl_paket` DISABLE KEYS */;
INSERT INTO `tbl_paket` VALUES ('PK01','deep clean','satu pasang',20000),('PK02','unyellowing','satu pasang',25000),('PK03','recolour','satu pasang',80000);
/*!40000 ALTER TABLE `tbl_paket` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_pengeluaran`
--

DROP TABLE IF EXISTS `tbl_pengeluaran`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_pengeluaran` (
  `pengeluaran_id` int(11) NOT NULL AUTO_INCREMENT,
  `pengeluaran_tanggal` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `pengeluaran_nama` varchar(100) DEFAULT NULL,
  `pengeluaran_harga` double DEFAULT NULL,
  `pengeluaran_keterangan` text,
  PRIMARY KEY (`pengeluaran_id`)
) ENGINE=InnoDB AUTO_INCREMENT=100000 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_pengeluaran`
--

LOCK TABLES `tbl_pengeluaran` WRITE;
/*!40000 ALTER TABLE `tbl_pengeluaran` DISABLE KEYS */;
INSERT INTO `tbl_pengeluaran` VALUES (99999,'2019-04-28 06:35:01','sabun cuci merk apa',1,'dasfsdf');
/*!40000 ALTER TABLE `tbl_pengeluaran` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_token`
--

DROP TABLE IF EXISTS `tbl_token`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_token` (
  `tk_id` int(1) NOT NULL AUTO_INCREMENT,
  `tk_email` varchar(128) NOT NULL,
  `tk_token` varchar(128) NOT NULL,
  `tk_time` int(11) NOT NULL,
  PRIMARY KEY (`tk_id`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_token`
--

LOCK TABLES `tbl_token` WRITE;
/*!40000 ALTER TABLE `tbl_token` DISABLE KEYS */;
INSERT INTO `tbl_token` VALUES (23,'slenderyman1@gmail.com','Y1bQO8kRolsS8+8rXt0ABRwSfCR7PVd7WjLMMpnLP/w=',1557805558),(24,'korewamovie01@gmail.com','Z0MMP+qdGLM5PHTAOWPtX11fxOLZ9Fb0G/9+JMTWFDI=',1557805581),(32,'yadribl@gmail.com','CsetmzMBnPLcyQtR06TEzkCIftcltmmZiUICd7+DRq0=',1557893458),(33,'yadribl@gmail.com','VOUlS1MiJAuE4Xyp0dbjEiy/M6No7caO3KlO7n2eSZw=',1558194818),(34,'yadribl@gmail.com','BEFIVd4kLsS+aFcjh7jFR0PzBDKdm5Fl42ABK+Wl4Hw=',1558194905),(35,'yadribl@gmail.com','7rV+7eh8Pz8iA6+8jS1/CmTmZkJHVqPbJjhotjumS/U=',1558194959),(36,'yadribl@gmail.com','aotq+P0lD+2EyUWxEehVZmG+36tFMmH9rZh7sICiDJg=',1558194979),(37,'yadribl@gmail.com','4CE74P/KnUNo/dhE7sAOweyuVrM9/a3qGAFzcLEsWW8=',1558194989),(39,'korewamovie01@gmail.com','asl7l0D9GVy49YaXefw6UBFEI92td6/qJoVzfDhoo68=',1558538436),(40,'yadri.amz@gmail.com','Uq37uuiyl1aUBt5r7+5XGGdy921iDuQWzGuipVv/7QM=',1558539217);
/*!40000 ALTER TABLE `tbl_token` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_transaksi_keluar`
--

DROP TABLE IF EXISTS `tbl_transaksi_keluar`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
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
  `tk_no_telp` varchar(12) DEFAULT NULL,
  PRIMARY KEY (`tk_nofak`),
  KEY `tk_tm_nofak` (`tk_tm_nofak`),
  CONSTRAINT `tbl_transaksi_keluar_ibfk_1` FOREIGN KEY (`tk_tm_nofak`) REFERENCES `tbl_transaksi_masuk` (`tm_nofak`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_transaksi_keluar`
--

LOCK TABLES `tbl_transaksi_keluar` WRITE;
/*!40000 ALTER TABLE `tbl_transaksi_keluar` DISABLE KEYS */;
INSERT INTO `tbl_transaksi_keluar` VALUES ('TK1905090001','2019-05-09 15:08:48','TM1905090001',3,125000,130,5000,2,125000,'ramadhan','no','no');
/*!40000 ALTER TABLE `tbl_transaksi_keluar` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_transaksi_masuk`
--

DROP TABLE IF EXISTS `tbl_transaksi_masuk`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
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
  `tm_status_bayar` enum('belum','sudah') NOT NULL DEFAULT 'belum',
  PRIMARY KEY (`tm_nofak`),
  KEY `tm_admin_id` (`tm_admin_id`),
  KEY `tm_user_id` (`tm_user_id`),
  CONSTRAINT `tbl_transaksi_masuk_ibfk_1` FOREIGN KEY (`tm_admin_id`) REFERENCES `tbl_admin` (`admin_id`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_transaksi_masuk`
--

LOCK TABLES `tbl_transaksi_masuk` WRITE;
/*!40000 ALTER TABLE `tbl_transaksi_masuk` DISABLE KEYS */;
INSERT INTO `tbl_transaksi_masuk` VALUES ('TM1905090001','2019-05-09 15:08:04',3,125000,2,'asd',0,'ramadhan','ramadhan','','belum','sudah');
/*!40000 ALTER TABLE `tbl_transaksi_masuk` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_users`
--

DROP TABLE IF EXISTS `tbl_users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_users` (
  `users_id` int(11) NOT NULL AUTO_INCREMENT,
  `users_tanggal` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `users_nama` varchar(150) DEFAULT NULL,
  `users_password` varchar(150) DEFAULT NULL,
  `users_email` varchar(100) NOT NULL,
  `users_level` varchar(2) DEFAULT NULL,
  `users_status` varchar(2) DEFAULT '1',
  PRIMARY KEY (`users_id`),
  KEY `admin_level` (`users_level`)
) ENGINE=InnoDB AUTO_INCREMENT=55 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_users`
--

LOCK TABLES `tbl_users` WRITE;
/*!40000 ALTER TABLE `tbl_users` DISABLE KEYS */;
INSERT INTO `tbl_users` VALUES (2,'2019-04-28 06:34:59','pegawai','pegawai','','2','1'),(51,'2019-05-15 04:10:58','yadri','$2y$10$BkuERaA./Yek5fqIbRGXq.hZJLapq71lHMKgLgxZ8U7hbXRzguJT.','yadribl@gmail.com','1','1'),(53,'2019-05-22 15:20:36','farhanrizal','$2y$10$n840QD7edLRZnBg42J7oM.55yz.NDl.AwAeGMQlYg9Pqg1WRcFPmK','korewamovie01@gmail.com','2','1'),(54,'2019-05-22 15:33:37','yamzal','$2y$10$6rpxopB5zClHeD8Qy3w/e.M9OfD/FjIQjNs2fheAzMjUlKjHzgXYe','yadri.amz@gmail.com','3','1');
/*!40000 ALTER TABLE `tbl_users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-05-23 22:02:58
