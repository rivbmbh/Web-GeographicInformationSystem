-- MariaDB dump 10.18  Distrib 10.4.17-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: webgis_sangihe
-- ------------------------------------------------------
-- Server version	10.4.17-MariaDB

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
-- Table structure for table `tb_geojson`
--

DROP TABLE IF EXISTS `tb_geojson`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_geojson` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_objek` varchar(55) DEFAULT NULL,
  `variabel` varchar(55) DEFAULT NULL,
  `file_geojson` text DEFAULT NULL,
  `color` text DEFAULT NULL,
  `type` varchar(25) DEFAULT NULL,
  `marker` text DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=89 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_geojson`
--

LOCK TABLES `tb_geojson` WRITE;
/*!40000 ALTER TABLE `tb_geojson` DISABLE KEYS */;
INSERT INTO `tb_geojson` VALUES (78,'Alam','nama_objek','alam.geojson','#000000','alam','alam.png'),(79,'Buatan','nama_objek','buatan-1.geojson','#000000','buatan','buatan.png'),(80,'Sejarah','nama_objek','sejarah-1.geojson','#000000','sejarah','sejarah.png'),(81,'Infrastruktur','nama_objek','infrastruktur.geojson','#000000','infra','infrastruktur.png'),(82,'Spot Diving','nama_objek','spot_diving-1.geojson','#000000','spotDiving','spot diving.png'),(83,'Alam','nama_objek','alam1.geojson','#000000','point','alam.png'),(84,'Buatan','nama_objek','buatan-11.geojson','#000000','point','buatan.png'),(85,'Sejarah','nama_objek','sejarah-11.geojson','#000000','point','sejarah.png'),(86,'Infrastruktur','nama_objek','infrastruktur1.geojson','#000000','point','infrastruktur.png'),(87,'Spot Diving','nama_objek','spot_diving-11.geojson','#000000','point','spot diving.png');
/*!40000 ALTER TABLE `tb_geojson` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_kampung`
--

DROP TABLE IF EXISTS `tb_kampung`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_kampung` (
  `id_kampung` int(11) NOT NULL AUTO_INCREMENT,
  `id_kecamatan` int(11) DEFAULT NULL,
  `n_kampung` varchar(125) DEFAULT NULL,
  PRIMARY KEY (`id_kampung`)
) ENGINE=InnoDB AUTO_INCREMENT=172 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_kampung`
--

LOCK TABLES `tb_kampung` WRITE;
/*!40000 ALTER TABLE `tb_kampung` DISABLE KEYS */;
INSERT INTO `tb_kampung` VALUES (35,4,'Kendahe 1'),(36,4,'Kendahe 2'),(37,4,'Kawaluso'),(38,4,'Lipang'),(39,4,'Mohongsawang'),(40,4,'Pempalaraeng'),(41,4,'Talawid'),(42,4,'Tariang Lama'),(43,10,'Bakalaeng'),(44,10,'Barangka'),(45,10,'Barangkalang'),(46,10,'Belengang'),(47,10,'Bengka'),(48,10,'Hiung'),(49,10,'Karatung 1'),(50,10,'Karatung 2'),(51,10,'Kauhis'),(52,10,'Lebo'),(53,10,'Mala'),(54,10,'Manumpitaeng'),(55,10,'Nahepese'),(56,10,'Pinebentengan'),(57,10,'Sesiwung'),(58,10,'Taloarane'),(59,10,'Taloarane 1'),(60,10,'Tawoali'),(61,11,'Batunderang'),(62,11,'Bebalang'),(63,11,'Kaluwatu'),(64,11,'Laine'),(65,11,'Lapango'),(66,11,'Lapango 1'),(67,11,'Lapepahe'),(68,11,'Lehimi Tariang'),(69,11,'Mawira'),(70,11,'Ngalipaeng 1'),(71,11,'Ngalipaeng 2'),(72,11,'Pindang'),(73,11,'Sowaeng'),(75,1,'Soataloara 1'),(76,1,'Soataloara 2'),(77,1,'Apeng Sembeka'),(78,1,'Bungalawang'),(79,1,'Mahena'),(80,1,'Manente'),(81,1,'Santiago'),(82,1,'Sawang Bendar'),(83,5,'Bahu'),(84,5,'Beha'),(85,5,'Bengketang'),(86,5,'Bowongkulu'),(87,5,'Bowongkulu 1'),(88,5,'Kalasuge'),(89,5,'Kalekube'),(90,5,'Kalekube 1'),(91,5,'Kalurae'),(92,5,'Lenganeng'),(93,5,'Likuang'),(94,5,'Mala'),(95,5,'Moade'),(96,5,'Naha'),(97,5,'Naha 1'),(98,5,'Petta'),(99,5,'Petta Barat'),(100,5,'Petta Selatan'),(101,5,'Petta Timur'),(102,5,'Pusunge'),(103,5,'Raku'),(104,5,'Tarolang'),(105,5,'Tola'),(106,5,'Utaurano'),(107,6,'Bira'),(108,6,'Biru'),(109,6,'Bowongkali'),(110,6,'Bungalawang'),(111,6,'Gunung'),(112,6,'Kulur 1'),(113,6,'Kulur 2'),(114,6,'Kuma'),(115,6,'Kuma 1'),(116,6,'Malueng'),(117,6,'Miulu'),(118,6,'Palahanaeng'),(119,6,'Palelangen'),(120,6,'Rendingan'),(121,6,'Sensong'),(122,6,'Talengen'),(123,6,'Tariang Baru'),(124,6,'Timbelang'),(125,14,'Dalako Bembanehe'),(126,14,'Kahakitang'),(127,14,'Kalama'),(128,14,'Mahenggetang'),(129,14,'Para'),(130,14,'Para 1'),(131,14,'Taleko Batusaiki'),(132,2,'Batulewehe'),(133,2,'Dumuhung'),(134,2,'Enengpahembang'),(135,2,'Lesa'),(136,2,'Tapuang'),(137,2,'Tidore'),(138,2,'Tona 1'),(139,2,'Tona 2'),(140,3,'Angges'),(141,3,'Kolongan Akembawi'),(142,3,'Kolongan Beha'),(143,3,'Kolongan Mitung'),(144,3,'Kolongan Beha Baru'),(145,3,'Pananekeng'),(147,18,'Bukide'),(148,18,'Bukide Timur'),(149,18,'Nanedakele'),(150,18,'Nusa'),(151,12,'Balane'),(152,12,'Bebu'),(153,12,'Binala'),(154,12,'Dagho'),(155,12,'Hesang'),(156,12,'Kalama Darat'),(157,12,'Kalinda'),(158,12,'Kalinda 1'),(159,12,'Lelipang'),(160,12,'Mahumu'),(161,12,'Mahumu 1'),(162,12,'Mahumu 2'),(163,12,'Makalakuhe'),(164,12,'Menggawa'),(165,12,'Menggawa 2'),(166,12,'Nagha 1'),(167,12,'Nagha 2'),(168,12,'Pananaru'),(169,12,'Pokol'),(170,12,'Ulungpeliang'),(171,8,'Salurang');
/*!40000 ALTER TABLE `tb_kampung` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_kecamatan`
--

DROP TABLE IF EXISTS `tb_kecamatan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_kecamatan` (
  `id_kecamatan` int(11) NOT NULL AUTO_INCREMENT,
  `nama_kecamatan` varchar(125) DEFAULT NULL,
  PRIMARY KEY (`id_kecamatan`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_kecamatan`
--

LOCK TABLES `tb_kecamatan` WRITE;
/*!40000 ALTER TABLE `tb_kecamatan` DISABLE KEYS */;
INSERT INTO `tb_kecamatan` VALUES (1,'Tahuna'),(2,'Tahuna Timur'),(3,'Tahuna Barat'),(4,'Kendahe'),(5,'Tabukan Utara'),(6,'Tabukan Tengah'),(7,'Tabukan Selatan'),(8,'Tabukan Selatan Tengah'),(9,'Tabukan Selatan Tenggara'),(10,'Manganitu'),(11,'Manganitu Selatan'),(12,'Tamako'),(13,'Tinkareng'),(14,'Tatoareng'),(18,'Nusa Tabukan');
/*!40000 ALTER TABLE `tb_kecamatan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_point`
--

DROP TABLE IF EXISTS `tb_point`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_point` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_objek` varchar(255) DEFAULT NULL,
  `id_kecamatan` int(10) DEFAULT NULL,
  `id_kampung` int(10) DEFAULT NULL,
  `jenis_wisata` varchar(55) DEFAULT NULL,
  `longitude` varchar(8) DEFAULT NULL,
  `latitude` varchar(8) DEFAULT NULL,
  `infrastruktur` varchar(155) DEFAULT NULL,
  `marker` text DEFAULT NULL,
  `gambar` text DEFAULT NULL,
  `ket` text DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_point`
--

LOCK TABLES `tb_point` WRITE;
/*!40000 ALTER TABLE `tb_point` DISABLE KEYS */;
INSERT INTO `tb_point` VALUES (33,'Pantai Pananualeng',6,123,'Alam','125.5856','3.623981','WC Umum, Tempat Makan, Tempat Parkir','alam.png','pananuareng.jpg',' Pantai yang sangat populer di kepulauan Sangihe.'),(34,'Air Terjun Kadadima',11,64,'Alam','125.6000','3.446814','Tidak Tersedia Apapun','alam.png','Kadadima.jpg','  .'),(35,'Tanjung Lelapide',12,159,'Alam','125.4851','3.467929','Tidak Tersedia Apapun','alam.png','lelapide.jpg',' .'),(36,'Nawirahi',12,168,'Buatan','125.5439','3.434201','Tempat Makan, Tempat Parkir','buatan.png','nawirahi.jpg',' .'),(37,'Puncak Alfa',5,92,'Buatan','125.5072','3.629994','WC Umum, Tempat Makan, Tempat Parkir','buatan.png','alfa.jpg',' .'),(38,'Kolam Lembah Kenari',10,55,'Buatan','125.5172','3.576491','WC Umum, Tempat Makan, Tempat Parkir','buatan.png','kolamLembah.jpg',' .'),(39,'Spot Diving Tanjung Tahuna',1,82,'Spot Diving','125.4911','3.606281','Tempat Makan, Tempat Parkir','spot diving.png','tamanL.jpg',' Spot diving tenggelamnya sebuah kapal '),(40,'Spot Diving Pulau Para',14,129,'Spot Diving','125.4994','3.073666','Tidak Tersedia Apapun','spot diving.png','para.jpg',' .'),(41,'Spot Diving Kahakitang ',14,126,'Spot Diving','125.5228','3.196734','Tidak Tersedia Apapun','spot diving.png','kahakitang.jpg',' ,'),(42,'Makam Raja Mokodompis',10,44,'Sejarah','125.5119','3.569886','Tempat Parkir','sejarah.png','mokodompis.jpg','  Kosong'),(43,'Makam Raja Makaampo',8,171,'Sejarah','125.6659','3.471645','Tidak Tersedia Apapun','sejarah.png','makaampo.jpg',' Kosong'),(44,'Makam Pahlawan Santiago',3,140,'Sejarah','125.4655','3.614987','WC Umum, Tempat Parkir, Penginapan','sejarah.png','makampahlawan.jpg','Kosong'),(45,'Megaria Mart',1,82,'Infrastruktur','125.4915','3.609387','WC Umum, Tempat Parkir','buatan.png','megaria.jpg',' Toko perbelanjaan nomor 1 di Sangihe'),(46,'Paragon Market',1,82,'Infrastruktur','125.4928','3.610356','WC Umum, Tempat Makan, Tempat Parkir','buatan.png','paragon.jpg','Pusat perbelanjaan '),(47,'Hotel Mafana',1,77,'Infrastruktur','125.4814','3.605631','WC Umum, Tempat Makan, Tempat Parkir, Penginapan','buatan.png','mafana.jpg',' Hotel Bintang 3 ');
/*!40000 ALTER TABLE `tb_point` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_polygon`
--

DROP TABLE IF EXISTS `tb_polygon`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_polygon` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_objek` text DEFAULT NULL,
  `color` text DEFAULT NULL,
  `geojson` mediumtext DEFAULT NULL,
  `gambar` text DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_polygon`
--

LOCK TABLES `tb_polygon` WRITE;
/*!40000 ALTER TABLE `tb_polygon` DISABLE KEYS */;
INSERT INTO `tb_polygon` VALUES (3,'Gunung Awu','#952eda','{\"type\":\"FeatureCollection\",\"features\":[{\"type\":\"Feature\",\"properties\":{},\"geometry\":{\"type\":\"Polygon\",\"coordinates\":[[[125.431167,3.685834],[125.432883,3.697655],[125.446614,3.698854],[125.464464,3.697312],[125.471845,3.686006],[125.47133,3.675556],[125.465151,3.665963],[125.452621,3.661166],[125.437861,3.665449],[125.43254,3.674186],[125.431167,3.685834]]]}}]}','199490531.jpg');
/*!40000 ALTER TABLE `tb_polygon` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_polyline`
--

DROP TABLE IF EXISTS `tb_polyline`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_polyline` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_objek` text NOT NULL,
  `weight` int(9) NOT NULL,
  `color` text NOT NULL,
  `geojson` mediumtext NOT NULL,
  `gambar` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_polyline`
--

LOCK TABLES `tb_polyline` WRITE;
/*!40000 ALTER TABLE `tb_polyline` DISABLE KEYS */;
INSERT INTO `tb_polyline` VALUES (4,'Jalan Manganitu',1,'#e945bc','{\"type\":\"FeatureCollection\",\"features\":[{\"type\":\"Feature\",\"properties\":{},\"geometry\":{\"type\":\"LineString\",\"coordinates\":[[125.513086,3.569153],[125.510941,3.572494],[125.508452,3.573865],[125.505877,3.573608],[125.505105,3.578662],[125.504676,3.581403]]}}]}','web.jpg');
/*!40000 ALTER TABLE `tb_polyline` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (11,'Rivaldo Del Piero','elpiero@gmail.com','$2y$10$W6yIsdXtyZavJvMYl3PRweFGhOzkBYjj9O04YUXuq/kSTLR2TlIAe'),(12,'admin','admin@gmail.com','$2y$10$E/ouV6Jlcwx6zrdstwo5QuHsmun.wSCiq6EVnJLe.b0GwdlO64CXC'),(16,'Leborn','Leborn@gmail.com','$2y$10$.c7.8wR8nGww1LhSbQtJmeGr9ZPmMMF2YHCb9.kPStFpiFdEargxm'),(17,'James','james@gmail.com','$2y$10$FFCH9G1yUF47h327eMRx3./e2He8nz4DiYO9ZDWWX3oQkcnQNnb.6'),(19,'RAB','rivaldoangelobomboah@gmail.com','$2y$10$YbQ42I5XJadbK4R/fU/ZyenMeeVI24qySkFi4Li1diH2CMmAH/R3i'),(20,'RAB','rab.jr.218@gmail.com','$2y$10$XTItKAC1v0ZG5duNqdkIaOk.CxFuvg4V7VYZYBhVVKce7FL3obsSG'),(21,'sleblew','rivaldobomboah@gmail.com','$2y$10$i/qrMiCbhVf3rfKGvsRpbOEPsEM1PSiWJ7WLFjkhk26jh.OagsViu');
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

-- Dump completed on 2023-12-11  9:09:25
