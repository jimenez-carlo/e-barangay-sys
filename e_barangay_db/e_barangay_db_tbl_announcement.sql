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
-- Table structure for table `tbl_announcement`
--

DROP TABLE IF EXISTS `tbl_announcement`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_announcement` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `announcement_status_id` int(11) DEFAULT 1,
  `title` varchar(45) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `created_date` datetime DEFAULT current_timestamp(),
  `updated_date` datetime DEFAULT current_timestamp(),
  `deleted_flag` tinyint(4) DEFAULT 0,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_announcement`
--

LOCK TABLES `tbl_announcement` WRITE;
/*!40000 ALTER TABLE `tbl_announcement` DISABLE KEYS */;
INSERT INTO `tbl_announcement` VALUES (1,3,'Libreng Ligo','Salamat sa lahat ng pagmamahal mo </3','2022-10-20','2022-10-20','2022-08-26 01:48:31','2022-10-20 02:47:30',0,1,1),(2,3,'Event 2','Lorem, ipsum dolor sit amet consectetur adipisicing elit. Reiciendis libero voluptates repellendus dignissimos ad corrupti distinctio odio esse delectus minima. A hic sit, aliquam doloremque at qui dolor. Sit, maxime!Lorem, ipsum dolor sit amet consectetur adipisicing elit. Reiciendis libero voluptates repellendus dignissimos ad corrupti distinctio odio esse delectus minima. A hic sit, aliquam doloremque at qui dolor. Sit, maxime!Lorem, ipsum dolor sit amet consectetur adipisicing elit. Reiciendis libero voluptates repellendus dignissimos ad corrupti distinctio odio esse delectus minima. A hic sit, aliquam doloremque at qui dolor. Sit, maxime!','2022-09-04','2022-09-04','2022-08-26 02:58:04','2022-09-04 12:41:15',0,1,1),(3,1,'woah','Pasko','2022-09-03','2022-09-04','2022-09-03 08:22:21','2022-09-03 08:22:21',0,1,NULL),(4,3,'woah3','2222','2022-10-18','2022-10-18','2022-09-03 08:23:48','2022-10-18 23:02:08',0,1,1),(5,3,'Test Title','Barangay Fort Bonifacio (BFB) is considered a newly created barangay of the City of Taguig by virtue of the Sangguniang Panlungsod Ordinance No. 68 Series of 2008. Along with Barangay Pinagsama, BFB was once part of Barangay Western Bicutan (which was retained as the mother barangay). It started to function on April 04, 2009 under the following first appointed barangay officials: Armando S. Lopez as Barangay Chairman, with Nicasio T. Asyao, Henry S. Estribello, Benigno Z. Marasigan, Wilfredo S. Sayson Christian L. Tinga, and Lysandre T. Vertulfo as Barangay','2022-10-01','2022-10-01','2022-09-03 21:37:02','2022-10-01 22:44:41',0,1,1),(6,3,'Christmas Give away','Go to barangay','2022-10-16','2022-10-16','2022-10-01 07:55:06','2022-10-16 19:06:43',0,1,1),(7,3,'PUKPUKAN','PUKPOK MO SA ULO MO','2022-10-18','2022-10-18','2022-10-01 19:52:47','2022-10-18 23:01:19',0,1,1),(8,3,'PUKPUKAN','PUKPOK MO SA ULO MO','2022-10-16','2022-10-16','2022-10-01 19:52:47','2022-10-16 19:05:42',0,1,1),(9,2,'saf','df','2022-10-02','2022-10-02','2022-10-01 20:31:18','2022-10-01 20:31:18',0,1,NULL),(10,3,'THESIS DEFENSE','THESIS DEFENSE DUE NOVEMBER 7','2022-10-07','2022-10-07','2022-10-06 07:42:34','2022-10-07 18:45:06',0,1,1),(11,3,'merry xmas','pamaskong handog','2022-10-16','2022-10-16','2022-10-09 20:11:43','2022-10-16 19:07:04',0,1,1),(12,3,'Event 4','test4','2022-10-16','2022-10-16','2022-10-10 05:51:21','2022-10-16 19:07:14',0,1,1),(13,2,'Certification Exam','Chunin exam para sa mga studyante ng UE MANILA','2022-11-04','2022-11-04','2022-11-02 08:17:00','2022-11-02 08:17:00',0,1,NULL),(14,2,'Testing System','Bakit ang cute ni aranton talaga\r\n\r\nStart Date: November 3\r\nEnd Date: November 5','2022-11-02','2022-11-02','2022-11-02 08:23:54','2022-11-02 08:23:54',0,319,NULL),(15,2,'yrdydrydr','yrdydryrd','2022-11-12','2022-11-12','2022-11-12 19:48:46','2022-11-13 09:49:53',0,1,1);
/*!40000 ALTER TABLE `tbl_announcement` ENABLE KEYS */;
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
