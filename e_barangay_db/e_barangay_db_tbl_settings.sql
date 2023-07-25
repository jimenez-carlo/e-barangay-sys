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
-- Table structure for table `tbl_settings`
--

DROP TABLE IF EXISTS `tbl_settings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_settings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `about` text DEFAULT NULL,
  `mission` text DEFAULT NULL,
  `vision` text DEFAULT NULL,
  `created_date` datetime DEFAULT current_timestamp(),
  `updated_date` datetime DEFAULT current_timestamp(),
  `deleted_flag` tinyint(4) DEFAULT 0,
  `home_title` text DEFAULT NULL,
  `home_description` text DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_settings`
--

LOCK TABLES `tbl_settings` WRITE;
/*!40000 ALTER TABLE `tbl_settings` DISABLE KEYS */;
INSERT INTO `tbl_settings` VALUES (1,'Barangay Wawa is a thriving neighborhood in Taguig. Laguna de Bay is to the east, Hagonoy is to the south, Bambang is to the west, and the Taguig River is to the north. Due to its farming, Barangay Wawa is about 140 hectares in size. There are several wards in Barangay Wawa, including Purok 1 - Quezon St., which extends to the middle of the street and leads to Tambak; Ward 2 - Piles; Ward 3 - Horse Shoe or Guerrero St., which leads to Jones St.; and Ward 4 - Puwang (farms). Historically, the village was also known by the name Wawa. The meeting location for fish dealers and fishermen is here. Other elders claim that the word \"Wawa\" derives from the baby\'s \"ua-ua\" cry because this village was thought to have been impoverished in the past. As a result, the name of the village was derived from this cry, which eventually became Wawa. The population was 14,350 according to the 2020 Census. This accounted for 1.62% of Taguig\'s total population. The current appointed officials were led by Barangay Chairman Phillip E. Buenaflor and the Barangay Councilors Jenson R. Garcia, Gregorio A. Valenzuela Jr, Manuel D. Liwanag, Cyndie C. Bonifacio, Joey C. Dionisio, Virgilio S. Dionisio, Rizalito SP. sta. Barbara, Julian Erico S. Cartaño, Dennis D. Catama, Sally M. Dionisio, Arcangel C. Silvestre','Barangay Wawa aims to eradicate poverty and catastrophe effect avoidance utilizing disaster-resilient, climate-change competent, and financially viable improvement initiatives, endeavors, and services that are completely in line with the development and preservation of human culture and ecosystem.','A truly sustainable, financially advanced, disaster-resilient, climate-change competent, and self-subsistent society with priviledged citizens living in quite well-organized and clean atmosphere administered by vigorous, innovative, knowledgeable, and God-fearing government officials.','2022-11-15 10:04:21','2022-11-15 10:04:21',0,'Welcome to <strong>Barangay Wawa Website!</strong>','Barangay Wawa is a barangay located in the city of Taguig. Its population as determined by the 2020 Census was 14,350. This represented 1.62% of the total population of Taguig. with the current appointed barangay officials Philip E. Buenaflor as Barangay Chairman with Joey Dionisio, Bogie Garcia, Manuel Liwanag, Virgilio Dionisio, Cyndie Bonifacio, Gregorio Valenzuela Jr, Jenson Garcia as Barangay Kagawads.');
/*!40000 ALTER TABLE `tbl_settings` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-07-25 23:17:43
