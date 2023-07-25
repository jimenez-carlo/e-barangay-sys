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
-- Table structure for table `tbl_request_business`
--

DROP TABLE IF EXISTS `tbl_request_business`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_request_business` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `application_id` int(11) DEFAULT NULL,
  `old_clearance` varchar(255) DEFAULT NULL,
  `issued_date` date DEFAULT NULL,
  `business_start` date DEFAULT NULL,
  `dti` varchar(255) DEFAULT NULL,
  `contract` varchar(255) DEFAULT NULL,
  `serial_no` varchar(255) DEFAULT NULL,
  `affidavit` varchar(255) DEFAULT NULL,
  `request_letter` varchar(255) DEFAULT NULL,
  `ownership_id` int(11) DEFAULT NULL,
  `business_id` int(11) DEFAULT NULL,
  `others` text DEFAULT NULL,
  `business_name` varchar(255) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `no_employees` varchar(99) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `owner_name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `contact_no` varchar(45) DEFAULT NULL,
  `requester_id` int(11) DEFAULT NULL,
  `request_type_id` int(11) DEFAULT 2,
  `request_status_id` int(11) DEFAULT 1,
  `updated_by` int(11) DEFAULT NULL,
  `reviewer_id` int(11) DEFAULT NULL,
  `remarks` text DEFAULT NULL,
  `created_date` datetime DEFAULT current_timestamp(),
  `deleted_flag` tinyint(4) DEFAULT 0,
  `updated_date` datetime DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_request_business`
--

LOCK TABLES `tbl_request_business` WRITE;
/*!40000 ALTER TABLE `tbl_request_business` DISABLE KEYS */;
INSERT INTO `tbl_request_business` VALUES (1,1,NULL,'2022-09-27','2022-09-27','file_20220927200326.jfif','file_20220927200326.jfif',NULL,NULL,NULL,1,1,'','test','test','123','','test','test@gmail.com','099999999999',3,2,4,1,NULL,NULL,'2022-09-27 20:03:26',0,'2022-10-02 15:07:45'),(2,1,NULL,'2022-09-27','2022-09-27','file_20220927200410.jfif','file_20220927200410.jfif',NULL,NULL,NULL,1,1,'','test','test','123','','test','test@gmail.com','099999999999',3,2,1,3,NULL,NULL,'2022-09-27 20:04:10',0,'2022-09-27 20:04:10'),(3,2,'file_20220927200449.jfif','2022-09-27',NULL,NULL,NULL,NULL,NULL,NULL,1,1,'','test','test','23','none','test','jimenez.carlo.llabor@gmail.com','+639217635295',3,2,1,3,NULL,NULL,'2022-09-27 20:04:49',0,'2022-09-27 20:04:49'),(4,3,NULL,'2022-09-27',NULL,NULL,NULL,'999999999','file_20220927200542.jfif','file_20220927200542.jfif',1,1,'','test','test','89','test','test','test@gmail.com','099999999',3,2,1,3,NULL,NULL,'2022-09-27 20:05:42',0,'2022-09-27 20:05:42'),(5,1,NULL,'2022-10-04','2022-10-04','file_20221004122815.png','file_20221004122815.jpg',NULL,NULL,NULL,1,1,'','San miguel','port boni 1','1','None','Ropher Co','axie.verzonilla@gmail.com','09453860601',306,2,5,1,NULL,NULL,'2022-10-03 21:28:15',0,'2022-10-04 12:35:21'),(6,3,NULL,'2022-10-07',NULL,NULL,NULL,'1051061516100','file_20221007173805.docx','file_20221007173805.docx',1,1,'','1560465468','16451645465456','4130654165','34864684864','464684098','aranton.johnalfred@ue.edu.ph','056467',308,2,6,1,NULL,NULL,'2022-10-07 02:38:05',0,'2022-10-07 22:19:46'),(7,3,NULL,'2022-10-07',NULL,NULL,NULL,'awdasdawdaw','file_20221007174246.docx','file_20221007174246.docx',1,3,'','awdw321','237 otad yamaha','2165','34864684864','wantawsan','aranton.johnalfred@ue.edu.ph','09278960284',308,2,1,308,NULL,NULL,'2022-10-07 02:42:46',0,'2022-10-07 02:42:46'),(8,1,NULL,'2022-10-07','2022-10-07','file_20221007175729.docx','file_20221007175729.docx',NULL,NULL,NULL,1,1,'','23531%$^awdwa','389 rosas','wad256','2124asdas','wantawsan','aranton.johnalfred@ue.edu.ph','09278960284',308,2,1,308,NULL,NULL,'2022-10-07 02:57:29',0,'2022-10-07 02:57:29'),(9,3,NULL,'2022-10-07',NULL,NULL,NULL,'awdad','file_20221007175909.docx','file_20221007175909.docx',1,1,'','1560465468awd$%#','246 rosas','wad256','25325%sad-/','wantawsan','aw46d486','wadaw454',308,2,1,308,NULL,NULL,'2022-10-07 02:59:09',0,'2022-10-07 02:59:09'),(10,1,NULL,'2022-10-07','2022-10-07','file_20221007175952.docx','file_20221007175952.docx',NULL,NULL,NULL,1,1,'','waewaeaw$#5123--','245 rosas','wad256','awdawd#@$-=','wantawsan','aranton.johnalfred@ue.edu.ph','09278960284',308,2,1,308,NULL,NULL,'2022-10-07 02:59:52',0,'2022-10-07 02:59:52'),(11,2,'file_20221007180043.docx','2022-10-07',NULL,NULL,NULL,NULL,NULL,NULL,1,1,'','23531%$^awdwa','42095 - Makahiya shit','wad256','34864684864awdaw','wantawsan','aranton.johnalfred@ue.edu.ph','09278960284',308,2,1,308,NULL,NULL,'2022-10-07 03:00:43',0,'2022-10-07 03:00:43'),(12,1,NULL,'2022-10-10','2022-10-10','file_20221010111643.docx','file_20221010111643.pdf',NULL,NULL,NULL,1,3,'','Hotdog ni arman','35 A Jones St. Wawa','2','lutuan','Yrma Bonifacio','cruz.sebastianandre@ue.edu.ph','09514026673',293,2,1,293,NULL,NULL,'2022-10-09 20:16:43',0,'2022-10-09 20:16:43'),(13,1,NULL,'2022-10-10','2022-10-10','file_20221010113229.pdf','file_20221010113229.pdf',NULL,NULL,NULL,1,1,'','Hotdog ni arman','35 A Jones St. Wawa','2','LUTUAN','PHILLIP bUENA FLOR','yrma@yahoo.com','09453860601',314,2,4,1,NULL,NULL,'2022-10-09 20:32:29',0,'2022-10-29 22:37:02'),(14,1,NULL,'2022-10-10','2022-10-10','file_20221010205017.bat','file_20221010205017.bat',NULL,NULL,NULL,1,1,'','test','test','89','none','test','jimenez.carlo.llabor@gmail.com','09217635295',315,2,5,319,NULL,NULL,'2022-10-10 05:50:17',0,'2022-10-13 20:39:31'),(15,1,NULL,'2022-11-12','2022-11-22','file_20221112140138.xlsx','file_20221112140138.xlsx',NULL,NULL,NULL,1,1,'','none','test','89','test','test','test@gmail.com','099999999',3,2,5,1,NULL,NULL,'2022-11-12 14:01:38',0,'2022-11-15 22:51:59');
/*!40000 ALTER TABLE `tbl_request_business` ENABLE KEYS */;
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
