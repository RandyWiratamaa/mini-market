-- MariaDB dump 10.19  Distrib 10.7.3-MariaDB, for Linux (x86_64)
--
-- Host: localhost    Database: penjualan
-- ------------------------------------------------------
-- Server version	10.7.3-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `barang`
--

DROP TABLE IF EXISTS `barang`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `barang` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(250) DEFAULT NULL,
  `satuan` varchar(25) NOT NULL,
  `id_kategori` int(11) DEFAULT NULL,
  `harga_beli` float DEFAULT NULL,
  `harga_eceran` float DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp(),
  `barcode` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `barang_ibfk_3` (`id_kategori`)
) ENGINE=InnoDB AUTO_INCREMENT=2787 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `barang`
--

LOCK TABLES `barang` WRITE;
/*!40000 ALTER TABLE `barang` DISABLE KEYS */;
INSERT INTO `barang` VALUES
(2786,'Sampoerna isi 12','KTK',1,19000,20000,'2022-04-02 16:43:13','2022-04-02 16:43:13','8999909982000');
/*!40000 ALTER TABLE `barang` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `detail_jual`
--

DROP TABLE IF EXISTS `detail_jual`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `detail_jual` (
  `nota_jual` varchar(50) DEFAULT NULL,
  `barang_id` int(11) DEFAULT NULL,
  `jml_jual` float DEFAULT NULL,
  `harga_jual` float DEFAULT NULL,
  `subtotal` float DEFAULT NULL,
  `diskon` float DEFAULT NULL,
  `total_jual` float DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` datetime DEFAULT NULL,
  KEY `fk_nota_jual` (`nota_jual`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `detail_jual`
--

LOCK TABLES `detail_jual` WRITE;
/*!40000 ALTER TABLE `detail_jual` DISABLE KEYS */;
INSERT INTO `detail_jual` VALUES
('AM030420220311191',2786,2,20000,40000,0,40000,'2022-04-02 20:11:41',NULL),
('AM030420220311191',2786,2,20000,40000,0,40000,'2022-04-02 20:12:02',NULL),
('AM050420220458241',2786,10,20000,200000,NULL,200000,'2022-04-04 21:59:49',NULL);
/*!40000 ALTER TABLE `detail_jual` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `kategori`
--

DROP TABLE IF EXISTS `kategori`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_kategori`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kategori`
--

LOCK TABLES `kategori` WRITE;
/*!40000 ALTER TABLE `kategori` DISABLE KEYS */;
INSERT INTO `kategori` VALUES
(1,'Rokok'),
(2,'Makanan'),
(3,'Minuman'),
(4,'Kosmetik'),
(6,'Obat');
/*!40000 ALTER TABLE `kategori` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `konfigurasi`
--

DROP TABLE IF EXISTS `konfigurasi`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `konfigurasi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(200) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `nohp` varchar(20) DEFAULT NULL,
  `pemilik` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `konfigurasi`
--

LOCK TABLES `konfigurasi` WRITE;
/*!40000 ALTER TABLE `konfigurasi` DISABLE KEYS */;
INSERT INTO `konfigurasi` VALUES
(1,'Alhamdulillah Mart','Taram, Kab. 50 Kota','08xxxxxxxxx','Rona');
/*!40000 ALTER TABLE `konfigurasi` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `letak_barang`
--

DROP TABLE IF EXISTS `letak_barang`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `letak_barang` (
  `id_letak` int(11) NOT NULL AUTO_INCREMENT,
  `letak` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_letak`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `letak_barang`
--

LOCK TABLES `letak_barang` WRITE;
/*!40000 ALTER TABLE `letak_barang` DISABLE KEYS */;
INSERT INTO `letak_barang` VALUES
(1,'Toko');
/*!40000 ALTER TABLE `letak_barang` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `penjualan`
--

DROP TABLE IF EXISTS `penjualan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `penjualan` (
  `nota_jual` varchar(50) NOT NULL,
  `letak_id` int(11) DEFAULT NULL,
  `total_jual` float DEFAULT NULL,
  `hpp` float DEFAULT NULL,
  `cara_bayar` enum('TUNAI','KREDIT') DEFAULT NULL,
  `bayar` float NOT NULL,
  `kembalian` float NOT NULL,
  `jenis_jual` varchar(50) NOT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL,
  PRIMARY KEY (`nota_jual`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `penjualan`
--

LOCK TABLES `penjualan` WRITE;
/*!40000 ALTER TABLE `penjualan` DISABLE KEYS */;
INSERT INTO `penjualan` VALUES
('AM030420220311191',1,40000,38000,NULL,40000,0,'GROSIR','2022-04-03',NULL),
('AM050420220458241',1,200000,190000,NULL,200000,0,'GROSIR','2022-04-05',NULL);
/*!40000 ALTER TABLE `penjualan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `riwayat`
--

DROP TABLE IF EXISTS `riwayat`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `riwayat` (
  `barang_id` int(11) DEFAULT NULL,
  `stok_awal` float DEFAULT 0,
  `masuk` float DEFAULT 0,
  `keluar` float DEFAULT 0,
  `stok_akhir` float DEFAULT 0,
  `bagian` varchar(200) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `jam` time DEFAULT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `letak_id` int(11) DEFAULT NULL,
  `aksi` varchar(100) DEFAULT NULL,
  `no_faktur` varchar(100) DEFAULT NULL,
  KEY `fk_barang` (`barang_id`),
  KEY `fk_letak` (`letak_id`),
  KEY `fk_user_id` (`user_id`),
  CONSTRAINT `fk_barang` FOREIGN KEY (`barang_id`) REFERENCES `barang` (`id`),
  CONSTRAINT `fk_letak` FOREIGN KEY (`letak_id`) REFERENCES `letak_barang` (`id_letak`),
  CONSTRAINT `fk_user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `riwayat`
--

LOCK TABLES `riwayat` WRITE;
/*!40000 ALTER TABLE `riwayat` DISABLE KEYS */;
INSERT INTO `riwayat` VALUES
(2786,NULL,1000,0,1000,'Opname',NULL,NULL,1,1,'Simpan',NULL),
(2786,1000,0,10,990,'Penjualan','2022-04-02',NULL,1,1,'Simpan',NULL),
(2786,990,0,15,975,'Penjualan','2022-04-03',NULL,1,1,'Simpan',NULL),
(2786,975,0,10,965,'Penjualan','2022-04-03',NULL,1,1,'Simpan',NULL),
(2786,965,0,25,940,'Penjualan','2022-04-03',NULL,1,1,'Simpan',NULL),
(2786,940,0,2,938,'Penjualan','2022-04-03',NULL,1,1,'Simpan',NULL),
(2786,938,0,1,937,'Penjualan','2022-04-03',NULL,1,1,'Simpan',NULL),
(2786,937,0,1,936,'Penjualan','2022-04-03',NULL,1,1,'Simpan',NULL),
(2786,936,0,1,935,'Penjualan','2022-04-03',NULL,1,1,'Simpan',NULL),
(2786,935,0,1,934,'Penjualan','2022-04-03',NULL,1,1,'Simpan',NULL),
(2786,934,0,1,933,'Penjualan','2022-04-03',NULL,1,1,'Simpan',NULL),
(2786,933,0,2,931,'Penjualan','2022-04-03',NULL,1,1,'Simpan',NULL),
(2786,931,0,2,929,'Penjualan','2022-04-03',NULL,1,1,'Simpan',NULL),
(2786,929,0,10,919,'Penjualan','2022-04-05',NULL,1,1,'Simpan',NULL);
/*!40000 ALTER TABLE `riwayat` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `set_ppn_jual`
--

DROP TABLE IF EXISTS `set_ppn_jual`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `set_ppn_jual` (
  `id` int(11) NOT NULL,
  `ppn` float DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `set_ppn_jual`
--

LOCK TABLES `set_ppn_jual` WRITE;
/*!40000 ALTER TABLE `set_ppn_jual` DISABLE KEYS */;
INSERT INTO `set_ppn_jual` VALUES
(1,10);
/*!40000 ALTER TABLE `set_ppn_jual` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `stok_per_lokasi`
--

DROP TABLE IF EXISTS `stok_per_lokasi`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `stok_per_lokasi` (
  `id_barang` int(11) DEFAULT NULL,
  `id_letak` int(11) DEFAULT NULL,
  `stok` float DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp(),
  KEY `fk_barang_id` (`id_barang`),
  KEY `fk_letak_id` (`id_letak`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `stok_per_lokasi`
--

LOCK TABLES `stok_per_lokasi` WRITE;
/*!40000 ALTER TABLE `stok_per_lokasi` DISABLE KEYS */;
INSERT INTO `stok_per_lokasi` VALUES
(2786,1,919,'2022-04-02 16:43:13','2022-04-05 04:59:50');
/*!40000 ALTER TABLE `stok_per_lokasi` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES
(1,'Administrator','admin@google.com',NULL,'$2y$10$ySboYSJnOD53brTmz.GACuWRr01hlr2gWSND3Qz9tfGcEQaHSaBcu',NULL,'2020-12-04 08:26:37','2020-12-04 08:26:37');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-04-05 14:53:53
