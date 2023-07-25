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
-- Table structure for table `tbl_blotter`
--

DROP TABLE IF EXISTS `tbl_blotter`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_blotter` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `complainant_id` int(11) DEFAULT NULL,
  `complainee_id` int(11) DEFAULT NULL,
  `blotter_status_id` int(11) DEFAULT NULL,
  `complaint` text DEFAULT NULL,
  `incidence` text DEFAULT NULL COMMENT 'location',
  `action_id` int(11) DEFAULT 1,
  `created_by` int(11) DEFAULT NULL,
  `incidence_date` date DEFAULT NULL,
  `created_date` datetime DEFAULT current_timestamp(),
  `updated_date` datetime DEFAULT current_timestamp(),
  `deleted_flag` tinyint(4) DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=59 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_blotter`
--

LOCK TABLES `tbl_blotter` WRITE;
/*!40000 ALTER TABLE `tbl_blotter` DISABLE KEYS */;
INSERT INTO `tbl_blotter` VALUES (1,1,1,1,'aD','AV',3,1,'2022-10-03','2022-08-13 19:56:16','2022-10-03 00:01:19',0),(2,1,1,2,'Grave Threat Complainee tried to assualt complainant with a gun','plaza',1,1,'2022-08-28','2022-08-15 22:57:38','2022-08-28 03:35:36',0),(4,8,9,1,'asdas','asdsa',1,1,'2022-08-20','2022-08-20 16:40:57','2022-08-20 16:40:57',0),(5,15,4,1,'asd','asd',2,1,'2022-08-28','2022-08-20 16:42:31','2022-08-28 03:33:34',0),(6,12,13,1,'asda','plaza',1,1,'2022-08-20','2022-08-20 16:45:26','2022-08-20 16:45:26',0),(7,14,15,1,'asda','plaza',1,1,'2022-08-20','2022-08-20 16:45:55','2022-08-20 16:45:55',0),(8,16,17,1,'asda','plaza',1,1,'2022-08-20','2022-08-20 16:48:45','2022-08-20 16:48:45',0),(9,0,18,1,'asda','plaza',1,1,'2022-08-20','2022-08-20 16:49:11','2022-08-20 16:49:11',0),(10,0,19,1,'asda','plaza',1,1,'2022-08-20','2022-08-20 16:50:25','2022-08-20 16:50:25',0),(11,0,20,1,'asd','asd',1,1,'2022-08-20','2022-08-20 16:55:35','2022-08-20 16:55:35',0),(18,33,34,1,'asd','asd',1,1,'2022-08-20','2022-08-20 17:08:53','2022-08-20 17:08:53',0),(20,1,1,1,'asd','asd',1,1,'2022-08-28','2022-08-20 17:10:28','2022-08-28 03:35:47',0),(21,39,40,1,'asd','asd',1,1,'2022-08-20','2022-08-20 17:10:37','2022-08-20 17:10:37',0),(26,49,50,1,'asd','asd',1,1,'2022-08-20','2022-08-20 17:14:21','2022-08-20 17:14:21',0),(27,51,52,1,'asd','asd',1,1,'2022-08-20','2022-08-20 17:14:45','2022-08-20 17:14:45',0),(28,53,54,1,'asd','asd',1,1,'2022-08-20','2022-08-20 17:15:33','2022-08-20 17:15:33',0),(29,55,56,1,'asd','asd',1,1,'2022-08-20','2022-08-20 17:15:45','2022-08-20 17:15:45',0),(30,57,58,1,'asd','asd',1,1,'2022-08-20','2022-08-20 17:16:21','2022-08-20 17:16:21',0),(31,59,60,1,'asd','asd',1,1,'2022-08-20','2022-08-20 17:16:32','2022-08-20 17:16:32',0),(32,61,62,1,'asd','asd',1,1,'2022-08-20','2022-08-20 17:17:07','2022-08-20 17:17:07',0),(33,0,63,1,'asd','asd',1,1,'2022-08-20','2022-08-20 17:17:52','2022-08-20 17:17:52',0),(34,64,65,1,'asd','asd',1,1,'2022-08-20','2022-08-20 17:18:16','2022-08-20 17:18:16',0),(35,0,66,1,'asd','asd',1,1,'2022-08-20','2022-08-20 17:18:21','2022-08-20 17:18:21',0),(36,71,72,1,'asd','asd',1,1,'2022-08-20','2022-08-20 17:24:09','2022-08-20 17:24:09',0),(37,73,74,1,'asd','asd',1,1,'2022-08-20','2022-08-20 17:24:25','2022-08-20 17:24:25',0),(38,101,102,1,'asd','asd',1,1,'2022-08-20','2022-08-20 17:31:46','2022-08-20 17:31:46',0),(39,105,106,1,'asd','asd',1,1,'2022-08-20','2022-08-20 17:32:37','2022-08-20 17:32:37',0),(40,107,108,1,'asd','asd',1,1,'2022-08-20','2022-08-20 17:33:49','2022-08-20 17:33:49',0),(41,109,110,1,'asd','asd',1,1,'2022-08-20','2022-08-20 17:34:41','2022-08-20 17:34:41',0),(42,113,114,1,'asd','asd',1,1,'2022-08-20','2022-08-20 17:35:30','2022-08-20 17:35:30',0),(43,139,140,1,'12','1212',1,1,'2022-08-20','2022-08-20 17:46:32','2022-08-20 17:46:32',0),(44,141,142,1,'12','1212',1,1,'2022-08-20','2022-08-20 17:46:53','2022-08-20 17:46:53',0),(45,145,146,1,'12','1212',1,1,'2022-08-20','2022-08-20 17:47:36','2022-08-20 17:47:36',0),(46,1,3,1,'Robbery','1212',1,1,'2022-08-20','2022-08-24 20:06:28','2022-08-24 20:06:28',0),(47,282,285,2,'NAGNAKAW NG PENCIL','SCHOOL',1,1,'2022-09-12','2022-09-12 00:33:09','2022-09-12 15:34:44',0),(48,291,3,2,'ninakaw ang ballbpen','Pasig',2,1,'2022-10-02','2022-09-20 08:13:05','2022-10-02 10:55:22',0),(49,287,306,2,'pinabili ng hatdog pero footlong binili ','court',2,1,'2022-09-24','2022-10-03 21:30:34','2022-10-03 21:30:34',0),(50,306,306,2,'pinabili ng hatdog pero footlong binili ','court',2,1,'2022-10-07','2022-10-03 21:30:37','2022-10-07 18:38:41',0),(51,305,306,1,'bumili hotdog, footlong binili','court',2,1,'2022-07-20','2022-10-11 05:53:06','2022-10-11 05:53:06',0),(52,305,306,1,'bumili hotdog, footlong binili','court',2,1,'2022-07-20','2022-10-11 05:53:14','2022-10-11 05:53:14',0),(53,315,316,2,'Rekkless driving','SCHOOL',2,1,'2022-10-12','2022-10-11 23:12:41','2022-10-11 23:12:41',0),(54,316,313,1,'wdawdawd','awdawdawdawd',1,1,'2022-10-12','2022-10-12 03:11:56','2022-10-12 03:11:56',0),(55,291,290,2,'wdawdawd','aawdawdawd',3,1,'2022-10-12','2022-10-12 03:17:32','2022-10-12 03:17:32',0),(56,3,1,2,'Nagnakaw ng hotdog','UE SCHOOl',2,1,'2022-11-01','2022-11-02 07:34:17','2022-11-02 07:34:17',0),(57,3,1,2,'Nagnakaw ng hotdog','UE SCHOOl',2,1,'2022-11-01','2022-11-02 07:34:51','2022-11-02 07:34:51',0),(58,3,1,2,'Nagnakaw ng hotdog','UE SCHOOl',2,1,'2022-11-01','2022-11-02 07:35:01','2022-11-12 15:17:44',0);
/*!40000 ALTER TABLE `tbl_blotter` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-07-25 23:17:41
