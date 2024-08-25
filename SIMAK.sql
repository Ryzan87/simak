-- MySQL dump 10.13  Distrib 8.0.36, for macos14 (x86_64)
--
-- Host: 127.0.0.1    Database: arsip_kita
-- ------------------------------------------------------
-- Server version	8.3.0

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `admin` (
  `admin_id` int NOT NULL AUTO_INCREMENT,
  `admin_nama` varchar(255) NOT NULL,
  `admin_username` varchar(255) NOT NULL,
  `admin_password` varchar(255) NOT NULL,
  `admin_foto` varchar(255) NOT NULL,
  PRIMARY KEY (`admin_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin`
--

LOCK TABLES `admin` WRITE;
/*!40000 ALTER TABLE `admin` DISABLE KEYS */;
INSERT INTO `admin` VALUES (1,'Administrator','admin','0192023a7bbd73250516f069df18b500','1471275613_Screen Shot 2019-10-11 at 16.26.42.png');
/*!40000 ALTER TABLE `admin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `arsip`
--

DROP TABLE IF EXISTS `arsip`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `arsip` (
  `arsip_id` int NOT NULL AUTO_INCREMENT,
  `kategori_id` int NOT NULL,
  `arsip_kode` varchar(25) NOT NULL,
  `arsip_petugas` varchar(255) NOT NULL,
  `arsip_nama` varchar(255) NOT NULL,
  `arsip_file` varchar(255) NOT NULL,
  `arsip_tipe` varchar(25) NOT NULL,
  `arsip_keterangan` varchar(255) NOT NULL,
  `arsip_pelaksanaan` datetime DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`arsip_id`),
  KEY `kategori_id` (`kategori_id`),
  CONSTRAINT `arsip_ibfk_1` FOREIGN KEY (`kategori_id`) REFERENCES `kategori` (`kategori_id`)
) ENGINE=InnoDB AUTO_INCREMENT=60 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `arsip`
--

LOCK TABLES `arsip` WRITE;
/*!40000 ALTER TABLE `arsip` DISABLE KEYS */;
INSERT INTO `arsip` VALUES (42,26,'PK-1','Rizky Septian','Daftar Nama Agen Sekolah 2024','1722169071_daftar agen sekolah.xlsx','xlsx','File excel berisi nama agen, asal sekolah, dan nomor HP agen sekolah','2024-03-28 00:00:00','2024-07-28 12:18:49','2024-07-28 05:18:49'),(43,27,'PK-43','Rizky Septian','Data Perusahaan di Kota Bandung','1722171109_Daftar Nama LP3I.xlsx','xlsx','Daftar perusahaan di kota Bandung untuk mencari mahasiswa kelas karyawan','2024-03-03 00:00:00','2024-07-28 05:51:49','2024-07-28 05:51:49'),(44,28,'PK-44','Rizky Septian','Daftar Nama Sekolah','1722171280_Daftar Nama Sekolah .xlsx','xlsx','Daftar nama nama sekolah di bandung untuk program sosialisasi program marketing STMIK Bandung','2024-03-04 00:00:00','2024-07-28 05:54:40','2024-07-28 05:54:40'),(45,29,'PK-45','Rizky Septian','Daftar Perusahaan di Jawa Barat','1722171460_Daftar Perusahaan Jawa Barat new.xlsx','xlsx','Berisi daftar nama perusahaan beserta nomor telepon perusaan ataupun HRD untuk mengajukan kerjasama dalam merekrut mahasiswa kelas karyawan','2024-04-17 00:00:00','2024-07-28 05:57:40','2024-07-28 05:57:40'),(46,30,'PK-46','Rizky Septian','Jawal konten sosial media','1722171591_Jadual Konten marketing.xlsx','xlsx','Berisi Jadwal konten sosial media STMIK Bandung perhari dari satu bulan penuh tahun 2024','2024-06-30 00:00:00','2024-07-28 13:00:52','2024-07-28 06:00:52'),(47,31,'PK-47','Rizky Septian','Surat MOU','1722171935_mou yg ini.docx','docx','Contoh penulisan MOU STMIK Bandung dengan sekolah SMA/SMK/MA','2024-05-17 00:00:00','2024-07-28 06:05:35','2024-07-28 06:05:35'),(48,32,'PK-48','Rizky Septian','SK PMB STMIK Bandung','1722172032_SK pmb 2021 gelombang 1.pdf','pdf','Penulisan Surat Keputusan STMIK Bandung untuk calon mahasiswa baru','2021-08-31 00:00:00','2024-07-28 13:07:46','2024-07-28 06:07:46'),(49,33,'PK-49','Rizky Septian','Sertifikat Beasiswa STMIK Bandung','1722172189_Template Serifikat Beasiswa STMIK Bandung.psd','psd','File Project sertifikat beasiswa STMIK Bandung','2023-06-12 00:00:00','2024-07-28 06:09:49','2024-07-28 06:09:49'),(50,35,'PK-50','Rizky Septian','Brosur STMIK Bandung','1722172800_BROSUR STMIK 2024.pdf','pdf','Brosur STMIK Bandung 2024','2024-01-26 00:00:00','2024-07-28 06:20:00','2024-07-28 06:20:00'),(51,39,'PK-51','Rizky Septian','Undangan Wisuda STMIK Bandung','1722173299_UNDANGAN WISUDA.zip','zip','Undangan Wisuda STMIK Bandung','2022-09-19 00:00:00','2024-07-28 06:28:19','2024-07-28 06:28:19'),(52,44,'PK-52','Rizky Septian','Buku Tahunan WIsuda STMIK Bandung','1722173554_Update Buku Wisuda STMIK BANDUNG XXXI.ai','ai','Desain Buku Tahunan WIsuda STMIK Bandung','2023-08-23 00:00:00','2024-07-28 06:32:34','2024-07-28 06:32:34');
/*!40000 ALTER TABLE `arsip` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `kategori`
--

DROP TABLE IF EXISTS `kategori`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `kategori` (
  `kategori_id` int NOT NULL AUTO_INCREMENT,
  `kategori_nama` varchar(255) NOT NULL,
  `kategori_keterangan` text NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`kategori_id`)
) ENGINE=InnoDB AUTO_INCREMENT=47 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kategori`
--

LOCK TABLES `kategori` WRITE;
/*!40000 ALTER TABLE `kategori` DISABLE KEYS */;
INSERT INTO `kategori` VALUES (26,'Data Agen Sekolah','Daftar data agen sekolah SMA/SMK/MA','2024-07-28 11:42:47','2024-07-28 11:42:47'),(27,'Daftar Perusahaan di Kota Bandung','Daftar nama perusahaan yang ada di kota Bandung','2024-07-28 11:48:04','2024-07-28 11:45:01'),(28,'Data Nama Sekolah','Daftar nama nama sekolah yang akan dikunjungi saat program marketing','2024-07-28 11:46:37','2024-07-28 11:46:37'),(29,'Daftar Perusahaan di Jawa Barat','Daftar nama perusahaan yang ada di Jawa Barat','2024-07-28 11:48:26','2024-07-28 11:47:24'),(30,'Jadwal konten marketing Instagram 2024','File excel yang berisi jadwal-jadwal konten marketing tiap bulannya','2024-07-28 11:50:43','2024-07-28 11:50:43'),(31,'Surat MOU','Template surat MOU kerjasama antara kampus dan sekolah','2024-07-28 11:52:02','2024-07-28 11:52:02'),(32,'SK PMB','Template Surat Keputusan Penerimaan Mahasiswa Baru','2024-07-28 11:53:11','2024-07-28 11:53:11'),(33,'Sertifikat Beasiswa','Template Sertifikat Beasiswa STMIK Bandung','2024-07-28 11:53:56','2024-07-28 11:53:56'),(34,'Backdrop Wisuda STMIK Bandung','Project File Desain Backdrop Wisuda STMIK Bandung','2024-07-28 11:56:35','2024-07-28 11:55:26'),(35,'Brosur STMIK Bandung','Project File Brosur STMIK Bandung','2024-07-28 11:56:16','2024-07-28 11:56:16'),(36,'Banner PSPT STMIK Bandung','Project FIle Desain Banner PSPT STMIK Bandung','2024-07-28 11:57:40','2024-07-28 11:57:40'),(37,'Foto Wisuda STMIK Bandung 2022','Dokumentasi Full Wisuda STMIK Bandung 2022','2024-07-28 11:59:33','2024-07-28 11:59:33'),(38,'Foto Wisuda STMIK Bandung 2023','Dokumentasi Full Wisuda STMIK Bandung 2023','2024-07-28 12:00:09','2024-07-28 12:00:09'),(39,'Undangan Wisuda STMIK Bandung','Project FIle Undangan Wisuda STMIK Bandung','2024-07-28 12:01:32','2024-07-28 12:01:32'),(40,'Desain Plakat Wisuda STMIK Bandung','Project FIle Desain Plakat Wisuda STMIK Bandung','2024-07-28 12:02:09','2024-07-28 12:02:09'),(41,'Foto Yudisium Mahasiswa STMIK Bandung','Dokumentasi Yudisium Mahasiswa STMIK Bandung','2024-07-28 12:04:03','2024-07-28 12:04:03'),(42,'Program Sosialisasi Marketing','Foto dokumentasi saat tim marketing STMIK Bandung mengunjungi sekolah','2024-07-28 12:06:41','2024-07-28 12:06:41'),(43,'Brosur STMIK Bandung','File PDF Brosur STMIK Bandung 2024','2024-07-28 12:09:17','2024-07-28 12:09:17'),(44,'Buku Tahunan WIsuda STMIK Bandung','File Project Buku Tahunan WIsuda STMIK Bandung','2024-07-28 12:10:01','2024-07-28 12:10:01'),(46,'Test','testing','2024-07-30 03:14:10','2024-07-30 03:14:10');
/*!40000 ALTER TABLE `kategori` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `petugas`
--

DROP TABLE IF EXISTS `petugas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `petugas` (
  `petugas_id` int NOT NULL AUTO_INCREMENT,
  `petugas_nama` varchar(255) NOT NULL,
  `petugas_username` varchar(255) NOT NULL,
  `petugas_password` varchar(255) NOT NULL,
  `petugas_foto` varchar(255) NOT NULL,
  PRIMARY KEY (`petugas_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `petugas`
--

LOCK TABLES `petugas` WRITE;
/*!40000 ALTER TABLE `petugas` DISABLE KEYS */;
INSERT INTO `petugas` VALUES (4,'Jhony Andrean','petugas1','b53fe7751b37e40ff34d012c7774d65f',''),(5,'Junaidi Mus','petugas2','ac5604a8b8504d4ff5b842480df02e91',''),(6,'Jamilah Suanda','petugas3','6f7dc121bccfd778744109cac9593474','');
/*!40000 ALTER TABLE `petugas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `riwayat`
--

DROP TABLE IF EXISTS `riwayat`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `riwayat` (
  `riwayat_id` int NOT NULL AUTO_INCREMENT,
  `riwayat_user` varchar(255) NOT NULL,
  `riwayat_arsip` int NOT NULL,
  `role` tinyint(1) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`riwayat_id`),
  KEY `riwayat_arsip` (`riwayat_arsip`),
  CONSTRAINT `riwayat_ibfk_1` FOREIGN KEY (`riwayat_arsip`) REFERENCES `arsip` (`arsip_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `riwayat`
--

LOCK TABLES `riwayat` WRITE;
/*!40000 ALTER TABLE `riwayat` DISABLE KEYS */;
INSERT INTO `riwayat` VALUES (50,'Admin Marketing',42,1,'2024-07-31 11:49:18','2024-07-31 11:49:18');
/*!40000 ALTER TABLE `riwayat` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `user` (
  `user_id` int NOT NULL AUTO_INCREMENT,
  `user_nama` varchar(100) NOT NULL,
  `user_username` varchar(100) NOT NULL,
  `user_password` varchar(100) NOT NULL,
  `user_foto` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (8,'Samsul Bahri','user1','24c9e15e52afc47c225b757e7bee1f9d',''),(9,'Reza Yuzanni','user2','7e58d63b60197ceb55a1c487989a3720',''),(10,'Ajir Muhajier','user3','92877af70a45fd6a2ed7fe81e1236b78',''),(11,'Cut Nanda Somay','user4','3f02ebe3d7929b091e3d8ccfde2f3bc6','');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-08-01 17:45:43
