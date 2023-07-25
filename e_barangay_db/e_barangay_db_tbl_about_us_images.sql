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
-- Table structure for table `tbl_about_us_images`
--

DROP TABLE IF EXISTS `tbl_about_us_images`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_about_us_images` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `column` int(11) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `position` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `created_date` datetime DEFAULT current_timestamp(),
  `updated_date` datetime DEFAULT current_timestamp(),
  `deleted_flag` tinyint(4) DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_about_us_images`
--

LOCK TABLES `tbl_about_us_images` WRITE;
/*!40000 ALTER TABLE `tbl_about_us_images` DISABLE KEYS */;
INSERT INTO `tbl_about_us_images` VALUES (1,1,'img1.jpg','CAPTAIN','Phillip E. Buenaflor','2022-11-15 10:25:49','2022-11-15 10:25:49',1),(2,2,'img2.jpg','KAGAWAD','Joey Dionisio','2022-11-15 10:25:49','2022-11-15 10:25:49',0),(3,2,'img3.jpg','KAGAWAD','Bogie Garcia','2022-11-15 10:25:49','2022-11-15 10:25:49',0),(4,2,'img4.jpg','KAGAWAD','Manuel Liwanag','2022-11-15 10:25:49','2022-11-15 10:25:49',0),(5,3,'img5.jpg','KAGAWAD','Virgilio Dionisio','2022-11-15 10:25:49','2022-11-15 10:25:49',0),(6,3,'img6.jpg','KAGAWAD','Cyndie','2022-11-15 10:25:49','2022-11-15 10:25:49',0),(7,3,'img7.jpg','KAGAWAD','Rizalito Sta Barbara','2022-11-15 10:25:49','2022-11-15 10:25:49',0),(8,3,'img9.jpg','KAGAWAD','Butch Valenzuela','2022-11-15 10:25:49','2022-11-15 10:25:49',0),(9,4,'img10.jpg','SKCHAIRMAN','Julian Erico Cartano','2022-11-15 10:27:30','2022-11-15 10:27:30',0),(10,4,'img11.jpg','SECRETARY','Dennis Catama','2022-11-15 10:27:30','2022-11-15 10:27:30',0),(11,4,'img12.jpg','BSF CHIEF','Ronald Ulanday','2022-11-15 10:27:30','2022-11-15 10:27:30',0),(12,4,'img13.jpg','DEPUTY','Andet Quintero','2022-11-15 10:27:30','2022-11-15 10:27:30',0),(13,4,'img14.jpg','TREASURY','Sally Miguel Dionisio','2022-11-15 10:27:30','2022-11-15 10:27:30',0),(14,5,'default.jpg','BrgyAdmin','Yrma Bonifacio Ulanday','2022-11-15 10:28:18','2022-11-15 10:28:18',0),(15,5,'default.jpg','BrgyAdmin','Anna Pasco','2022-11-15 10:28:18','2022-11-15 10:28:18',0),(16,5,'default.jpg','BrgyAdmin','Jojo Aguinaldo','2022-11-15 10:28:18','2022-11-15 10:28:18',0);
/*!40000 ALTER TABLE `tbl_about_us_images` ENABLE KEYS */;
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
