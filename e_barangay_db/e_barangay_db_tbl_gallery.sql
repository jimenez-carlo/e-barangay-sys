-- MariaDB dump 10.19  Distrib 10.4.22-MariaDB, for Win64 (AMD64)
--
-- Host: 127.0.0.1    Database: e_barangay_db
-- ------------------------------------------------------
-- Server version	10.4.22-MariaDB

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
-- Table structure for table `tbl_gallery`
--

DROP TABLE IF EXISTS `tbl_gallery`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_gallery` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `image` varchar(255) DEFAULT NULL,
  `label` varchar(255) DEFAULT NULL,
  `created_date` datetime DEFAULT current_timestamp(),
  `updated_date` datetime DEFAULT current_timestamp(),
  `deleted_flag` tinyint(4) DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_gallery`
--

LOCK TABLES `tbl_gallery` WRITE;
/*!40000 ALTER TABLE `tbl_gallery` DISABLE KEYS */;
INSERT INTO `tbl_gallery` VALUES (1,'1.jpg','label 1','2022-11-15 09:54:21','2022-11-15 09:54:21',1),(2,'2.jpg','label 2','2022-11-15 09:54:21','2022-11-15 09:54:21',0),(3,'3.jpg','label 3','2022-11-15 09:54:21','2022-11-15 09:54:21',0),(4,'4.jpg','label 4','2022-11-15 09:54:21','2022-11-15 09:54:21',0),(5,'5.jpg','label 5','2022-11-15 09:54:21','2022-11-15 09:54:21',0),(6,'6.jpg','label 6','2022-11-15 09:54:21','2022-11-15 09:54:21',0),(7,'7.jpg','label 7','2022-11-15 09:54:21','2022-11-15 09:54:21',0),(8,'8.jpg','label 8','2022-11-15 09:54:21','2022-11-15 09:54:21',0),(9,'img_20221115185642_0.png','ddd','2022-11-15 18:56:42','2022-11-15 18:56:42',0),(10,'img_20221115190821_0.png','asda','2022-11-15 19:08:21','2022-11-15 19:08:21',0);
/*!40000 ALTER TABLE `tbl_gallery` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-07-25 23:17:42
