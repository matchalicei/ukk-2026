/*M!999999\- enable the sandbox mode */ 
-- MariaDB dump 10.19  Distrib 10.6.22-MariaDB, for debian-linux-gnu (x86_64)
--
-- Host: 127.0.0.1    Database: db_alvira
-- ------------------------------------------------------
-- Server version	8.0.35

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
-- Table structure for table `area_parkir`
--

DROP TABLE IF EXISTS `area_parkir`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `area_parkir` (
  `id_area` int unsigned NOT NULL AUTO_INCREMENT,
  `nama_area` varchar(255) NOT NULL,
  `kapasitas` int NOT NULL,
  `terisi` int NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id_area`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `area_parkir`
--

LOCK TABLES `area_parkir` WRITE;
/*!40000 ALTER TABLE `area_parkir` DISABLE KEYS */;
INSERT INTO `area_parkir` VALUES (7,'area parkir utama',30,1,'2026-09-27 16:54:09','2026-10-23 12:22:10'),(8,'area parkir timur',20,0,'2026-09-27 16:54:35','2026-11-11 07:57:00'),(9,'area parkir barat ',20,0,'2026-09-27 16:54:55','2026-10-20 09:49:51'),(10,'area parkir utara ',15,1,'2026-09-27 16:55:23','2026-11-11 08:03:18'),(11,'area parkir selatan',15,0,'2026-09-27 16:55:40','2026-09-27 17:11:51');
/*!40000 ALTER TABLE `area_parkir` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `log_aktivitas`
--

DROP TABLE IF EXISTS `log_aktivitas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `log_aktivitas` (
  `id_log` int unsigned NOT NULL AUTO_INCREMENT,
  `id_user` int unsigned NOT NULL,
  `aktivitas` varchar(255) NOT NULL,
  `keterangan` text,
  `waktu` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_log`),
  KEY `fk_log_aktivitas_user` (`id_user`),
  CONSTRAINT `fk_log_aktivitas_user` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=87 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `log_aktivitas`
--

LOCK TABLES `log_aktivitas` WRITE;
/*!40000 ALTER TABLE `log_aktivitas` DISABLE KEYS */;
INSERT INTO `log_aktivitas` VALUES (1,8,'Menambah tarif','Menambahkan tarif kendaraan \"bus\" sebesar Rp 8.000 per jam.','2026-09-27 16:14:36'),(2,8,'Menghapus tarif','Menghapus tarif kendaraan \"mobil\" sebesar Rp 5.000 per jam.','2026-09-27 16:16:55'),(3,8,'Menambah tarif','Menambahkan tarif kendaraan \"mobil\" sebesar Rp 5.000 per jam.','2026-09-27 16:19:17'),(4,8,'Menambah tarif','Menambahkan tarif kendaraan \"mini bus\" sebesar Rp 6.000 per jam.','2026-09-27 16:21:55'),(5,8,'Menambah tarif','Menambahkan tarif kendaraan \"truk\" sebesar Rp 10.000 per jam.','2026-09-27 16:22:28'),(6,8,'Menambah tarif','Menambahkan tarif kendaraan \"motor listrik\" sebesar Rp 3.000 per jam.','2026-09-27 16:23:13'),(7,8,'Menambah tarif','Menambahkan tarif kendaraan \"mobil sport\" sebesar Rp 8.000 per jam.','2026-09-27 16:23:52'),(8,8,'Mengubah tarif','Mengubah tarif kendaraan dari \"Motor\" Rp 3.000 menjadi \"Bus Pariwisata\" Rp 10.000 per jam.','2026-09-27 16:28:22'),(9,8,'Mengubah tarif','Mengubah tarif kendaraan dari \"mobil\" Rp 5.000 menjadi \"tronton\" Rp 15.000 per jam.','2026-09-27 16:29:12'),(10,8,'Mengubah tarif','Mengubah tarif kendaraan dari \"mini bus\" Rp 6.000 menjadi \"truk tangki\" Rp 12.000 per jam.','2026-09-27 16:29:48'),(11,8,'Mengubah tarif','Mengubah tarif kendaraan dari \"motor listrik\" Rp 3.000 menjadi \"pickup\" Rp 7.000 per jam.','2026-09-27 16:30:27'),(12,8,'Mengubah tarif','Mengubah tarif kendaraan dari \"mobil sport\" Rp 8.000 menjadi \"van\" Rp 6.000 per jam.','2026-09-27 16:30:58'),(13,8,'Menambah tarif','Menambahkan tarif kendaraan \"mini bus\" sebesar Rp 6.000 per jam.','2026-09-27 16:31:10'),(14,8,'Menambah tarif','Menambahkan tarif kendaraan \"mobil sport\" sebesar Rp 8.000 per jam.','2026-09-27 16:31:38'),(15,8,'Menambah tarif','Menambahkan tarif kendaraan \"mobil listrik\" sebesar Rp 6.000 per jam.','2026-09-27 16:31:50'),(16,8,'Menambah tarif','Menambahkan tarif kendaraan \"mobil\" sebesar Rp 5.000 per jam.','2026-09-27 16:32:21'),(17,8,'Menambah tarif','Menambahkan tarif kendaraan \"motor sport\" sebesar Rp 4.000 per jam.','2026-09-27 16:32:54'),(18,8,'Menambah tarif','Menambahkan tarif kendaraan \"motor listrik\" sebesar Rp 3.000 per jam.','2026-09-27 16:33:07'),(19,8,'Menambah tarif','Menambahkan tarif kendaraan \"motor\" sebesar Rp 3.000 per jam.','2026-09-27 16:33:16'),(20,8,'Menambah member','Menambahkan member dengan plat nomor \"D 6666 RTA\", jenis kendaraan \"Bus\", warna \"putih\", pemilik \"irsyaad\".','2026-09-27 16:35:30'),(21,8,'Menambah member','Menambahkan member dengan plat nomor \"D 2222 SKR\", jenis kendaraan \"truk\", warna \"biru\", pemilik \"alvaro\".','2026-09-27 16:36:04'),(22,8,'Menambah member','Menambahkan member dengan plat nomor \"D 2469 RTA\", jenis kendaraan \"van\", warna \"silver\", pemilik \"sakura\".','2026-09-27 16:36:46'),(23,8,'Menambah member','Menambahkan member dengan plat nomor \"mini bus\", jenis kendaraan \"D 9900 IRS\", warna \"kuning\", pemilik \"siska\".','2026-09-27 16:37:56'),(24,8,'Mengubah member','Mengubah member dari plat nomor \"mini bus\", jenis kendaraan \"D 9900 IRS\", warna \"kuning\" menjadi plat nomor \"D 9900 IRS\", jenis kendaraan \"mini bus\", warna \"kuning\".','2026-09-27 16:38:16'),(25,8,'Menambah member','Menambahkan member dengan plat nomor \"D 2233 KSH\", jenis kendaraan \"mobil sport\", warna \"silver\", pemilik \"keisha\".','2026-09-27 16:38:49'),(26,8,'Menambah member','Menambahkan member dengan plat nomor \"D 3344 ALV\", jenis kendaraan \"mobil listrik\", warna \"pink\", pemilik \"ratu\".','2026-09-27 16:39:31'),(27,8,'Menambah member','Menambahkan member dengan plat nomor \"D 0912 VIR\", jenis kendaraan \"mobil\", warna \"maroon\", pemilik \"alvira\".','2026-09-27 16:40:24'),(28,8,'Menambah area parkir','Menambahkan area \"area parkir utama\" dengan kapasitas 30 kendaraan.','2026-09-27 16:54:09'),(29,8,'Menambah area parkir','Menambahkan area \"area parkir timur\" dengan kapasitas 20 kendaraan.','2026-09-27 16:54:35'),(30,8,'Menambah area parkir','Menambahkan area \"area parkir barat \" dengan kapasitas 20 kendaraan.','2026-09-27 16:54:55'),(31,8,'Menambah area parkir','Menambahkan area \"area parkir utara \" dengan kapasitas 15 kendaraan.','2026-09-27 16:55:23'),(32,8,'Menambah area parkir','Menambahkan area \"area parkir selatan\" dengan kapasitas 15 kendaraan.','2026-09-27 16:55:40'),(33,8,'Kendaraan masuk','Kendaraan dengan nomor karcis \"PKR-2026-09-27-001\" dan plat nomor \"D 6666 RTA\" masuk ke area \"area parkir selatan\".','2026-09-27 17:03:05'),(34,8,'Kendaraan masuk','Kendaraan dengan nomor karcis \"PKR-2026-09-27-002\" dan plat nomor \"D 0912 VIR\" masuk ke area \"area parkir utama\".','2026-09-27 17:10:52'),(35,8,'Kendaraan masuk','Kendaraan dengan nomor karcis \"PKR-2026-09-27-003\" dan plat nomor \"D 2222 SKR\" masuk ke area \"area parkir utara \".','2026-09-27 17:11:34'),(36,8,'Kendaraan keluar','Kendaraan dengan nomor karcis \"PKR-2026-09-27-001\" dan plat nomor \"D 6666 RTA\" keluar. Durasi 1 jam dengan biaya Rp 8.000.','2026-09-27 17:11:51'),(37,8,'Kendaraan keluar','Kendaraan dengan nomor karcis \"PKR-2026-09-27-003\" dan plat nomor \"D 2222 SKR\" keluar. Durasi 1 jam dengan biaya Rp 10.000.','2026-09-27 17:12:51'),(38,8,'Kendaraan keluar','Kendaraan dengan nomor karcis \"PKR-2026-09-27-002\" dan plat nomor \"D 0912 VIR\" keluar. Durasi 1 jam dengan biaya Rp 5.000.','2026-09-27 17:15:04'),(39,8,'Mengubah member','Mengubah member dari plat nomor \"D 2222 SKR\", jenis kendaraan \"truk\", warna \"biru\" menjadi plat nomor \"D 2856 ZBV\", jenis kendaraan \"truk\", warna \"biru\".','2026-09-28 09:00:01'),(40,8,'Mengubah member','Mengubah member dari plat nomor \"D 2856 ZBV\", jenis kendaraan \"truk\", warna \"biru\" menjadi plat nomor \"D 2856 ZBV\", jenis kendaraan \"Motor\", warna \"Merah\".','2026-09-28 09:00:26'),(41,8,'Mengubah member','Mengubah member dari plat nomor \"D 2856 ZBV\", jenis kendaraan \"Motor\", warna \"Merah\" menjadi plat nomor \"D 2856 ZBV\", jenis kendaraan \"Motor\", warna \"Merah\".','2026-09-28 09:00:27'),(42,8,'Kendaraan masuk','Kendaraan dengan nomor karcis \"PKR-2026-09-28-001\" dan plat nomor \"D 0912 VIR\" masuk ke area \"area parkir utama\".','2026-09-28 11:48:22'),(43,8,'Kendaraan keluar','Kendaraan dengan nomor karcis \"PKR-2026-09-28-001\" dan plat nomor \"D 0912 VIR\" keluar. Durasi 1 jam dengan biaya Rp 6.000.','2026-09-28 11:48:48'),(44,9,'Kendaraan masuk','Kendaraan dengan nomor karcis \"PKR-2026-10-01-001\" dan plat nomor \"D 2469 RTA\" masuk ke area \"area parkir utama\".','2026-10-01 11:08:47'),(45,8,'Menghapus user','Menghapus user \"ratu\".','2026-10-01 11:16:09'),(46,8,'Menghapus user','Menghapus user \"alvira\".','2026-10-01 11:16:21'),(47,8,'Menambah user','Menambahkan user \"nayma\" dengan role \"petugas\".','2026-10-01 11:16:43'),(48,8,'Menambah user','Menambahkan user \"derry\" dengan role \"petugas\".','2026-10-01 11:17:08'),(49,8,'Menambah user','Menambahkan user \"alvira\" dengan role \"user\".','2026-10-01 11:18:32'),(50,8,'Menambah user','Menambahkan user \"ratu\" dengan role \"user\".','2026-10-01 11:18:44'),(51,8,'Menambah member','Menambahkan member dengan plat nomor \"D 0912 VIR\", jenis kendaraan \"mobil\", warna \"pink\", pemilik \"alvira\".','2026-10-01 11:19:35'),(52,8,'Menambah member','Menambahkan member dengan plat nomor \"D 3011 RTU\", jenis kendaraan \"motor\", warna \"biru\", pemilik \"ratu\".','2026-10-01 11:20:16'),(53,9,'Kendaraan masuk','Kendaraan dengan nomor karcis \"PKR-2026-10-01-001\" dan plat nomor \"D 0912 VIR\" masuk ke area \"area parkir timur\".','2026-10-01 11:28:46'),(54,9,'Kendaraan keluar','Kendaraan dengan nomor karcis \"PKR-2026-10-01-001\" dan plat nomor \"D 0912 VIR\" keluar. Durasi 3 jam dengan biaya Rp 15.000.','2026-10-01 14:19:16'),(55,8,'Menambah user','Menambahkan user \"owner\" dengan role \"owner\".','2026-10-01 14:24:21'),(56,9,'Kendaraan masuk','Kendaraan dengan nomor karcis \"PKR-2026-10-01-002\" dan plat nomor \"D 6666 RTA\" masuk ke area \"area parkir utama\".','2026-10-01 15:02:19'),(57,9,'Kendaraan keluar','Kendaraan dengan nomor karcis \"PKR-2026-10-01-002\" dan plat nomor \"D 6666 RTA\" keluar. Durasi 1 jam dengan biaya Rp 7.000.','2026-10-01 15:02:36'),(58,9,'Kendaraan masuk','Kendaraan dengan nomor karcis \"PKR-2026-10-08-001\" dan plat nomor \"D 9900 IRS\" masuk ke area \"area parkir utama\".','2026-10-08 11:29:27'),(59,9,'Kendaraan keluar','Kendaraan dengan nomor karcis \"PKR-2026-10-08-001\" dan plat nomor \"D 9900 IRS\" keluar. Durasi 1 jam dengan biaya Rp 6.000.','2026-10-08 11:31:03'),(60,9,'Kendaraan masuk','Kendaraan dengan nomor karcis \"PKR-2026-10-19-001\" dan plat nomor \"D 6666 RTA\" masuk ke area \"area parkir timur\".','2026-10-19 16:57:22'),(61,9,'Kendaraan masuk','Kendaraan dengan nomor karcis \"PKR-2026-10-19-002\" dan plat nomor \"D 6666 RTA\" masuk ke area \"area parkir utama\".','2026-10-19 17:01:21'),(62,9,'Kendaraan masuk','Kendaraan dengan nomor karcis \"PKR-2026-10-19-003\" dan plat nomor \"D 6666 RTA\" masuk ke area \"area parkir timur\".','2026-10-19 17:03:02'),(63,9,'Kendaraan keluar','Kendaraan dengan nomor karcis \"PKR-2026-10-19-001\" dan plat nomor \"D 6666 RTA\" keluar. Durasi 1 jam dengan biaya Rp 8.000.','2026-10-19 17:15:02'),(64,9,'Kendaraan keluar','Kendaraan dengan nomor karcis \"PKR-2026-10-19-002\" dan plat nomor \"D 6666 RTA\" keluar. Durasi 1 jam dengan biaya Rp 8.000.','2026-10-19 17:36:58'),(65,9,'Kendaraan keluar','Kendaraan dengan nomor karcis \"PKR-2026-10-19-003\" dan plat nomor \"D 6666 RTA\" keluar. Durasi 1 jam dengan biaya Rp 8.000.','2026-10-19 17:37:10'),(66,8,'Menambah member','Menambahkan member dengan plat nomor \"jedb\", jenis kendaraan \"ehd\", warna \"jhwhbs\", pemilik \"ratu\".','2026-10-19 17:48:41'),(67,8,'Menghapus member','Menghapus member dengan plat nomor \"jedb\" dan jenis kendaraan \"ehd\".','2026-10-19 17:55:59'),(68,8,'Menambah area parkir','Menambahkan area \"area parkir selatan\" dengan kapasitas 99 kendaraan.','2026-10-19 17:56:23'),(69,8,'Menghapus area parkir','Menghapus area \"area parkir selatan\".','2026-10-19 18:00:33'),(70,9,'Kendaraan masuk','Kendaraan dengan nomor karcis \"PKR-2026-10-20-001\" dan plat nomor \"D 3011 RTU\" masuk ke area \"area parkir timur\".','2026-10-20 07:00:32'),(71,9,'Kendaraan keluar','Kendaraan dengan nomor karcis \"PKR-2026-10-20-001\" dan plat nomor \"D 3011 RTU\" keluar. Durasi 1 jam dengan biaya Rp 3.000.','2026-10-20 07:00:43'),(72,9,'Kendaraan masuk','Kendaraan dengan nomor karcis \"PKR-2026-10-20-002\" dan plat nomor \"D 0912 VIR\" masuk ke area \"area parkir barat \".','2026-10-20 09:41:49'),(73,9,'Kendaraan masuk','Kendaraan dengan nomor karcis \"PKR-2026-10-20-003\" dan plat nomor \"D 2469 RTA\" masuk ke area \"area parkir utara \".','2026-10-20 09:44:18'),(74,9,'Kendaraan keluar','Kendaraan dengan nomor karcis \"PKR-2026-10-20-002\" dan plat nomor \"D 0912 VIR\" keluar. Durasi 1 jam dengan biaya Rp 5.000.','2026-10-20 09:49:51'),(75,9,'Kendaraan keluar','Kendaraan dengan nomor karcis \"PKR-2026-10-20-003\" dan plat nomor \"D 2469 RTA\" keluar. Durasi 1 jam dengan biaya Rp 6.000.','2026-10-20 09:49:57'),(76,9,'Kendaraan masuk','Kendaraan dengan nomor karcis \"PKR-2026-10-20-004\" dan plat nomor \"D 2856 ZBV\" masuk ke area \"area parkir utama\".','2026-10-20 10:31:14'),(77,9,'Kendaraan keluar','Kendaraan dengan nomor karcis \"PKR-2026-10-20-004\" dan plat nomor \"D 2856 ZBV\" keluar. Durasi 74 jam dengan biaya Rp 222.000.','2026-10-23 12:22:10'),(78,8,'Menambah user','Menambahkan user \"sasa\" dengan role \"user\".','2026-10-23 12:39:52'),(79,8,'Menghapus user','Menghapus user \"didin\".','2026-11-11 01:16:10'),(80,9,'Kendaraan masuk','Kendaraan dengan nomor karcis \"PKR-2026-11-11-001\" dan plat nomor \"D 2856 ZBV\" masuk ke area \"area parkir timur\".','2026-11-11 07:56:15'),(81,9,'Kendaraan keluar','Kendaraan dengan nomor karcis \"PKR-2026-11-11-001\" dan plat nomor \"D 2856 ZBV\" keluar. Durasi 1 jam dengan biaya Rp 3.000.','2026-11-11 07:57:00'),(82,8,'Menambah user','Menambahkan user \"sangkuriang\" dengan role \"user\".','2026-11-11 08:00:25'),(83,8,'Menambah member','Menambahkan member dengan plat nomor \"1212\", jenis kendaraan \"motor\", warna \"pink\", pemilik \"sangkuriang\".','2026-11-11 08:01:10'),(84,8,'Mengubah member','Mengubah member dari plat nomor \"1212\", jenis kendaraan \"motor\", warna \"pink\" menjadi plat nomor \"D 1212 UHC\", jenis kendaraan \"motor\", warna \"pink\".','2026-11-11 08:01:41'),(85,9,'Kendaraan masuk','Kendaraan dengan nomor karcis \"PKR-2026-11-11-002\" dan plat nomor \"D 1212 UHC\" masuk ke area \"area parkir utara \".','2026-11-11 08:03:18'),(86,8,'Menambah member','Menambahkan member dengan plat nomor \"1212\", jenis kendaraan \"motor\", warna \"putih\", pemilik \"sakura\".','2026-11-11 10:58:31');
/*!40000 ALTER TABLE `log_aktivitas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `member`
--

DROP TABLE IF EXISTS `member`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `member` (
  `id_member` int unsigned NOT NULL AUTO_INCREMENT,
  `plat_nomor` varchar(100) NOT NULL,
  `jenis_kendaraan` varchar(100) NOT NULL,
  `warna` varchar(100) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `id_user` int unsigned DEFAULT NULL,
  PRIMARY KEY (`id_member`),
  KEY `id_user` (`id_user`),
  CONSTRAINT `member_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `member`
--

LOCK TABLES `member` WRITE;
/*!40000 ALTER TABLE `member` DISABLE KEYS */;
INSERT INTO `member` VALUES (11,'D 6666 RTA','Bus','putih','2026-09-27 16:35:30','2026-09-27 16:35:30',16),(12,'D 2856 ZBV','Motor','Merah','2026-09-27 16:36:04','2026-09-28 09:00:27',15),(13,'D 2469 RTA','van','silver','2026-09-27 16:36:46','2026-09-27 16:36:46',14),(14,'D 9900 IRS','mini bus','kuning','2026-09-27 16:37:56','2026-09-27 16:38:16',13),(15,'D 2233 KSH','mobil sport','silver','2026-09-27 16:38:49','2026-09-27 16:38:49',12),(18,'D 0912 VIR','mobil','pink','2026-10-01 11:19:35','2026-10-01 11:19:35',19),(19,'D 3011 RTU','motor','biru','2026-10-01 11:20:15','2026-10-01 11:20:15',20),(21,'D 1212 UHC','motor','pink','2026-11-11 08:01:10','2026-11-11 08:01:41',24),(22,'1212','motor','putih','2026-11-11 10:58:31','2026-11-11 10:58:31',14);
/*!40000 ALTER TABLE `member` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `migrations` (
  `id` int NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ran_at` varchar(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2026_08_20_090000_create_users_table.sql','2026-09-14 09:01:47'),(2,'2026_08_21_090000_create_roles_table.sql','2026-09-14 09:01:47'),(3,'2026_08_23_100000_add_can_register_to_roles_table.sql','2026-09-14 09:01:48'),(4,'2026_09_01_183642_create_tarifs_table.sql','2026-09-14 09:01:49'),(5,'2026_09_15_232152_create_members_table.sql','2026-09-17 15:29:07'),(6,'2026_09_21_084901_create_area_parkirs_table.sql','2026-09-22 09:20:03'),(7,'2026_09_23_220809_create_transaksis_table.sql','2026-09-27 13:01:53'),(8,'2026_09_27_141137_create_log_aktivitases_table.sql','2026-09-27 15:28:40'),(9,'2026_10_19_162549_create_add_fotos_table.sql','2026-10-19 16:27:29');
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `roles` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `can_register` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` VALUES (1,'admin','2026-09-14 09:01:47','2026-09-14 09:01:47',0),(3,'owner','2026-09-23 21:21:48','2026-09-23 21:21:48',0),(4,'petugas','2026-09-23 21:21:55','2026-09-23 21:21:55',0),(5,'user','2026-09-23 21:22:00','2026-09-23 21:22:08',1);
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tarif`
--

DROP TABLE IF EXISTS `tarif`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `tarif` (
  `id_tarif` int unsigned NOT NULL AUTO_INCREMENT,
  `jenis_kendaraan` varchar(100) NOT NULL,
  `tarif_per_jam` decimal(10,0) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id_tarif`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tarif`
--

LOCK TABLES `tarif` WRITE;
/*!40000 ALTER TABLE `tarif` DISABLE KEYS */;
INSERT INTO `tarif` VALUES (7,'Bus Pariwisata',10000,'2026-09-27 16:03:46','2026-09-27 16:03:46'),(9,'bus',8000,NULL,NULL),(10,'tronton',15000,NULL,NULL),(11,'truk tangki',12000,NULL,NULL),(12,'truk',10000,NULL,NULL),(13,'pickup',7000,NULL,NULL),(14,'van',6000,NULL,NULL),(15,'mini bus',6000,NULL,NULL),(16,'mobil sport',8000,NULL,NULL),(17,'mobil listrik',6000,NULL,NULL),(18,'mobil',5000,NULL,NULL),(19,'motor sport',4000,NULL,NULL),(20,'motor listrik',3000,NULL,NULL),(21,'motor',3000,NULL,NULL);
/*!40000 ALTER TABLE `tarif` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `transaksi`
--

DROP TABLE IF EXISTS `transaksi`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `transaksi` (
  `id_parkir` int unsigned NOT NULL AUTO_INCREMENT,
  `nomor_karcis` varchar(30) NOT NULL,
  `id_member` int unsigned NOT NULL,
  `waktu_masuk` datetime NOT NULL,
  `waktu_keluar` datetime DEFAULT NULL,
  `id_tarif` int unsigned NOT NULL,
  `durasi_jam` int NOT NULL DEFAULT '0',
  `biaya_total` decimal(10,0) NOT NULL DEFAULT '0',
  `status` enum('masuk','keluar') NOT NULL DEFAULT 'masuk',
  `id_user` int unsigned NOT NULL,
  `id_area` int unsigned NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `foto_plat` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_parkir`),
  UNIQUE KEY `nomor_karcis` (`nomor_karcis`),
  KEY `fk_transaksi_user` (`id_user`),
  KEY `fk_transaksi_tarif` (`id_tarif`),
  KEY `fk_transaksi_area` (`id_area`),
  KEY `fk_transaksi_member` (`id_member`),
  CONSTRAINT `fk_transaksi_area` FOREIGN KEY (`id_area`) REFERENCES `area_parkir` (`id_area`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_transaksi_member` FOREIGN KEY (`id_member`) REFERENCES `member` (`id_member`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_transaksi_tarif` FOREIGN KEY (`id_tarif`) REFERENCES `tarif` (`id_tarif`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_transaksi_user` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `transaksi`
--

LOCK TABLES `transaksi` WRITE;
/*!40000 ALTER TABLE `transaksi` DISABLE KEYS */;
INSERT INTO `transaksi` VALUES (3,'PKR-2026-09-27-001',11,'2026-09-27 17:03:04','2026-09-27 17:11:51',9,1,8000,'keluar',9,11,'2026-09-27 17:03:04','2026-09-27 17:11:51',NULL),(5,'PKR-2026-09-27-003',12,'2026-09-27 17:11:34','2026-09-27 17:12:50',12,1,10000,'keluar',9,10,'2026-09-27 17:11:34','2026-09-27 17:12:50',NULL),(8,'PKR-2026-10-01-001',18,'2026-10-01 11:28:46','2026-10-01 14:19:16',18,3,15000,'keluar',17,8,'2026-10-01 11:28:46','2026-10-01 14:19:16',NULL),(9,'PKR-2026-10-01-002',11,'2026-10-01 15:02:19','2026-10-01 15:02:36',13,1,7000,'keluar',9,7,'2026-10-01 15:02:19','2026-10-01 15:02:36',NULL),(10,'PKR-2026-10-08-001',14,'2026-10-08 11:29:27','2026-10-08 11:31:03',15,1,6000,'keluar',17,7,'2026-10-08 11:29:27','2026-10-08 11:31:03',NULL),(11,'PKR-2026-10-19-001',11,'2026-10-19 16:57:22','2026-10-19 17:15:02',9,1,8000,'keluar',17,8,'2026-10-19 16:57:22','2026-10-19 17:15:02','uploads/plat/fd6c6bed7c4d288364e9461df34cd701.jpg'),(12,'PKR-2026-10-19-002',11,'2026-10-19 17:01:21','2026-10-19 17:36:57',9,1,8000,'keluar',17,7,'2026-10-19 17:01:21','2026-10-19 17:36:57','uploads/plat/39fa7dbda0f2a21cf2ce78f2d86857c9.jpeg'),(13,'PKR-2026-10-19-003',11,'2026-10-19 17:03:02','2026-10-19 17:37:10',9,1,8000,'keluar',17,8,'2026-10-19 17:03:02','2026-10-19 17:37:10','uploads/plat/f0780cd2b665d6b9a5d85e75bf4c7c51.jpeg'),(14,'PKR-2026-10-20-001',19,'2026-10-20 07:00:32','2026-10-20 07:00:43',21,1,3000,'keluar',17,8,'2026-10-20 07:00:32','2026-10-20 07:00:43','uploads/plat/59ea6889f14c4d24b4bcb33de4294f47.jpeg'),(15,'PKR-2026-10-20-002',18,'2026-10-20 09:41:49','2026-10-20 09:49:51',18,1,5000,'keluar',18,9,'2026-10-20 09:41:49','2026-10-20 09:49:51','uploads/plat/0bd4fce02d9311173cfebe3f88a7d24f.jpg'),(16,'PKR-2026-10-20-003',13,'2026-10-20 09:44:18','2026-10-20 09:49:57',14,1,6000,'keluar',18,10,'2026-10-20 09:44:18','2026-10-20 09:49:57','uploads/plat/291b58a0e7ac79c618543d76be05036e.jpg'),(17,'PKR-2026-10-20-004',12,'2026-10-20 10:31:13','2026-10-23 12:22:10',21,74,222000,'keluar',17,7,'2026-10-20 10:31:13','2026-10-23 12:22:10','uploads/plat/0d04de61bf182cb916fb2fe8536d3fb5.jpg'),(18,'PKR-2026-11-11-001',12,'2026-11-11 07:56:14','2026-11-11 07:57:00',21,1,3000,'keluar',9,8,'2026-11-11 07:56:14','2026-11-11 07:57:00','uploads/plat/49b2fcd687b9fe80cfdba6ab485e19d8.jpg'),(19,'PKR-2026-11-11-002',21,'2026-11-11 08:03:18',NULL,21,0,0,'masuk',9,10,'2026-11-11 08:03:18','2026-11-11 08:03:18','uploads/plat/c044a07910e320cf9860c96fb3ab06ac.jpg');
/*!40000 ALTER TABLE `transaksi` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(50) NOT NULL DEFAULT 'user',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (8,'admin','$2y$10$BV5SO9kdEgbGwpumFkU07u2b88BPfw/UxfG73wpGeLItFf8NN75ya','admin','2026-09-27 14:39:09','2026-09-27 14:39:09'),(9,'petugas','$2y$10$BwUz8y86pGjj/r1vp4mFeu.lhzMm3GAdhIcy1Jyfj/zP3JzsBBt7.','petugas','2026-09-27 15:07:38','2026-09-27 15:07:38'),(12,'keisha','$2y$10$9bdogtj7Gbm5r8vl88prhebtW2BjltzyJPBhhv/2.mS.I1PYqR7mG','user','2026-09-27 15:08:42','2026-09-27 15:08:42'),(13,'siska','$2y$10$JLuhlRp5SC/Jg3ccctLr4ebqIkkLuh20ou9l/q6WWILk5IMgrJseO','user','2026-09-27 15:08:52','2026-09-27 15:08:52'),(14,'sakura','$2y$10$TFPfbA/fGNe4AKbClCHy6usbruhU1E9CI/l8KIzILiydr2C6hdWiu','user','2026-09-27 15:09:04','2026-09-27 15:09:04'),(15,'alvaro','$2y$10$MWcGAAogcS1Ev34meKZjaekcJPNwT.hJQsan/KGwvAR4TjC17p.N.','user','2026-09-27 15:09:21','2026-09-27 15:09:21'),(16,'irsyaad','$2y$10$fqh200D7/64xn..X1OIzpO6ftmFCFMld6/xJXeCObq5yTuQ6KW0CW','user','2026-09-27 15:09:37','2026-09-27 15:09:37'),(17,'nayma','$2y$10$o6xHi9eM7v/0ZztpyzXYIOTHu466yVjhZW7BvM8KUmxSTYMYm2xpa','petugas','2026-10-01 11:16:43','2026-10-01 11:16:43'),(18,'derry','$2y$10$qKX9MROD.KqycgyhDU8yU.joPgO6j4HyU3a83SQy.dumXESCReyJK','petugas','2026-10-01 11:17:08','2026-10-01 11:17:08'),(19,'alvira','$2y$10$loJspn6GUXnq/Bwxh1PMb.fqgdi3ZIZ.M48G8X7Pe3ELExoOwlr62','user','2026-10-01 11:18:32','2026-10-01 11:18:32'),(20,'ratu','$2y$10$3F72bqYikc2fsTFc8NA2euPzU.PnC15JJSCoVXE4VhDpfUeGgjbN.','user','2026-10-01 11:18:44','2026-10-01 11:18:44'),(21,'owner','$2y$10$ZbugoNxtljeoVkyk6Pg3yOQYTykMRTKBWOVsZlMpmKOuErNOH1M1O','owner','2026-10-01 14:24:21','2026-10-01 14:24:21'),(22,'sasa','$2y$10$fteTjlyLL97Eq6cSS..FYOpaRqKKE3hwF9L7VhPSmY2dwd6w3UggW','user','2026-10-23 12:39:52','2026-10-23 12:39:52'),(24,'sangkuriang','$2y$10$8cQmEpXwKpSSLN6MC4QdfuXuG/M95O7XoqAs4QG4CS21kV/MLn1ci','user','2026-11-11 08:00:25','2026-11-11 08:00:25');
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

-- Dump completed on 2026-11-11 11:32:01
