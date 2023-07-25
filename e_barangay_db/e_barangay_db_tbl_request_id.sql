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
-- Table structure for table `tbl_request_id`
--

DROP TABLE IF EXISTS `tbl_request_id`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_request_id` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `issued_date` date DEFAULT NULL,
  `requester_id` int(11) DEFAULT NULL,
  `blood_type_id` int(11) DEFAULT NULL,
  `phil_health` varchar(45) DEFAULT NULL,
  `sss` varchar(45) DEFAULT NULL,
  `tin` varchar(45) DEFAULT NULL,
  `contact_person` text DEFAULT NULL,
  `contact_person_address` text DEFAULT NULL,
  `contact_person_no` varchar(45) DEFAULT NULL,
  `request_type_id` int(11) DEFAULT 3,
  `minor` int(11) DEFAULT NULL,
  `guardian` varchar(255) DEFAULT NULL,
  `request_status_id` int(11) DEFAULT 1,
  `updated_by` int(11) DEFAULT NULL,
  `reviewer_id` int(11) DEFAULT NULL,
  `remarks` text DEFAULT NULL,
  `created_date` datetime DEFAULT current_timestamp(),
  `deleted_flag` tinyint(4) DEFAULT 0,
  `updated_date` datetime DEFAULT current_timestamp(),
  `government_id` varchar(255) DEFAULT NULL,
  `picture` varchar(255) DEFAULT NULL,
  `signature` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_request_id`
--

LOCK TABLES `tbl_request_id` WRITE;
/*!40000 ALTER TABLE `tbl_request_id` DISABLE KEYS */;
INSERT INTO `tbl_request_id` VALUES (1,'2022-09-27',3,1,'123213213','123213213','asdasd','asdsadasd','asdasdasd','0999999999',3,1,'asdasdsa',4,1,NULL,NULL,'2022-09-27 18:19:30',0,'2022-10-02 15:26:59','img_20220927181930.jfif','img_20220927181930.jfif','img_20220927181930.jfif'),(2,'2022-10-04',293,NULL,NULL,NULL,NULL,NULL,NULL,NULL,3,0,'annie',4,1,NULL,NULL,'2022-10-03 22:58:47',0,'2022-10-04 14:00:51','img_20221004135847.PNG','img_20221004135847.jpg','img_20221004135847.jpg'),(3,'2022-10-07',308,NULL,NULL,NULL,NULL,NULL,NULL,NULL,3,0,'',1,308,NULL,NULL,'2022-10-07 03:19:26',0,'2022-10-07 03:19:26','img_20221007181926.docx','img_20221007181926.docx','img_20221007181926.docx'),(4,'2022-10-11',3,NULL,NULL,NULL,NULL,NULL,NULL,NULL,3,0,'',1,3,NULL,NULL,'2022-10-11 05:35:10',0,'2022-10-11 05:35:10','img_20221011203510.jpg','img_20221011203510.jpg','img_20221011203510.jpg'),(5,'2022-10-11',3,NULL,NULL,NULL,NULL,NULL,NULL,NULL,3,0,'',4,1,NULL,NULL,'2022-10-11 05:39:16',0,'2022-11-12 17:44:10','img_20221011203916.jpg','img_20221011203916.jpg','img_20221011203916.jpg'),(6,'2022-10-12',291,NULL,NULL,NULL,NULL,NULL,NULL,NULL,3,0,'',6,1,NULL,NULL,'2022-10-11 22:39:15',0,'2022-10-12 13:40:08','img_20221012133915.txt','img_20221012133915.txt','img_20221012133915.txt'),(7,'2022-10-18',288,NULL,NULL,NULL,NULL,NULL,NULL,NULL,3,0,'',4,1,NULL,NULL,'2022-10-17 23:11:31',0,'2022-10-18 14:12:45','img_20221018141131.jpg','img_20221018141131.jpg','img_20221018141131.jpg'),(8,'2022-11-12',3,NULL,NULL,NULL,NULL,NULL,NULL,NULL,3,0,'',4,1,NULL,NULL,'2022-11-12 18:28:07',0,'2022-11-12 18:29:18','img_20221112182807.jpg','img_20221112182807.jpg','img_20221112182807.jpg');
/*!40000 ALTER TABLE `tbl_request_id` ENABLE KEYS */;
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
