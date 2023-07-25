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
-- Table structure for table `tbl_system_error`
--

DROP TABLE IF EXISTS `tbl_system_error`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_system_error` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `message` text DEFAULT NULL,
  `created_date` datetime DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=79 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_system_error`
--

LOCK TABLES `tbl_system_error` WRITE;
/*!40000 ALTER TABLE `tbl_system_error` DISABLE KEYS */;
INSERT INTO `tbl_system_error` VALUES (1,'()','2022-08-20 17:31:46'),(2,'','2022-08-20 18:20:35'),(3,'test','2022-08-20 18:35:48'),(4,'test','2022-08-20 18:36:05'),(5,'test','2022-08-20 18:36:13'),(6,'test','2022-08-20 18:36:53'),(7,'test','2022-08-20 18:44:48'),(8,'ttest123','2022-08-20 18:48:39'),(9,'Unknown column \'asd1\' in \'field list\'','2022-08-20 18:48:53'),(10,'Unknown column \'announcement_id\' in \'field list\'','2022-08-21 18:43:35'),(11,'You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near \' end_date = , updated_date = \'2022-08-21 19:33:30\', updated_by = 1 where id = 16\' at line 1','2022-08-21 19:33:30'),(12,'You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near \' end_date = , updated_date = \'2022-08-21 19:34:09\', updated_by = 1 where id = 16\' at line 1','2022-08-21 19:34:09'),(13,'You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near \'(request_status_id, updated_date) values(2, \'2022-08-23 19:39:08\')\' at line 1','2022-08-23 19:39:08'),(14,'You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near \'(request_status_id, updated_date) values(2, \'2022-08-23 19:40:57\') where id = 23\' at line 1','2022-08-23 19:40:57'),(15,'Unknown column \'img_20220824193617.jpg\' in \'field list\'','2022-08-24 19:36:17'),(16,'You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near \'\'12345678910\',\'jimenez.carlo.llabor@gmail.com\', \'$2y$10$KKYMmphhiBr9szoYIW3Bq...\' at line 1','2022-08-24 22:15:55'),(17,'You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near \'\'12345678910\',\'jimenez.carlo.llabor@gmail.com\', \'$2y$10$KKYMmphhiBr9szoYIW3Bq...\' at line 1','2022-08-24 22:15:59'),(18,'You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near \' \'\', 1)\' at line 1','2022-08-24 22:54:54'),(19,'You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near \' street = \'test\', contact_no = \'09217635295\', updated_date = \'2022-08-26 00:2...\' at line 1','2022-08-26 00:26:25'),(20,'9','2022-08-26 00:27:55'),(21,'3','2022-08-26 00:28:52'),(22,'You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near \' street = \'123\', contact_no = \'09217635295\', updated_date = \'2022-08-26 01:04...\' at line 1','2022-08-26 01:04:02'),(23,'Column \'deleted_flag\' in where clause is ambiguous','2022-08-26 01:46:52'),(24,'Column \'deleted_flag\' in where clause is ambiguous','2022-08-26 01:47:07'),(25,'Column \'deleted_flag\' in where clause is ambiguous','2022-08-26 01:47:25'),(26,'You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near \')\' at line 1','2022-08-26 03:41:00'),(27,'You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near \')\' at line 1','2022-08-26 03:49:10'),(28,'You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near \')\' at line 1','2022-08-26 04:01:56'),(29,'Column \'deleted_flag\' in where clause is ambiguous','2022-09-03 08:22:56'),(30,'Column \'deleted_flag\' in where clause is ambiguous','2022-09-03 08:23:05'),(31,'Column \'deleted_flag\' in where clause is ambiguous','2022-09-03 08:24:03'),(32,'Column \'deleted_flag\' in where clause is ambiguous','2022-09-22 20:52:12'),(33,'Column \'deleted_flag\' in where clause is ambiguous','2022-09-22 20:52:16'),(34,'Column \'deleted_flag\' in where clause is ambiguous','2022-09-22 20:52:21'),(35,'Column \'deleted_flag\' in where clause is ambiguous','2022-09-22 20:52:47'),(36,'Column \'deleted_flag\' in where clause is ambiguous','2022-09-22 20:52:59'),(37,'Column \'deleted_flag\' in where clause is ambiguous','2022-10-01 07:52:06'),(38,'Column \'deleted_flag\' in where clause is ambiguous','2022-10-01 07:52:14'),(39,'Column \'deleted_flag\' in where clause is ambiguous','2022-10-01 07:52:23'),(40,'Column \'deleted_flag\' in where clause is ambiguous','2022-10-01 07:52:47'),(41,'Column \'deleted_flag\' in where clause is ambiguous','2022-10-01 07:53:34'),(42,'Column \'deleted_flag\' in where clause is ambiguous','2022-10-01 19:51:09'),(43,'Column \'deleted_flag\' in where clause is ambiguous','2022-10-01 19:51:19'),(44,'Column \'deleted_flag\' in where clause is ambiguous','2022-10-01 19:53:02'),(45,'Column \'deleted_flag\' in where clause is ambiguous','2022-10-01 19:53:10'),(46,'Column \'deleted_flag\' in where clause is ambiguous','2022-10-01 19:54:11'),(47,'Column \'deleted_flag\' in where clause is ambiguous','2022-10-01 20:39:09'),(48,'Column \'deleted_flag\' in where clause is ambiguous','2022-10-01 21:40:20'),(49,'Column \'deleted_flag\' in where clause is ambiguous','2022-10-01 21:40:26'),(50,'Column \'deleted_flag\' in where clause is ambiguous','2022-10-01 22:48:00'),(51,'Unknown column \'relgion\' in \'field list\'','2022-11-05 14:58:56'),(52,'Unknown column \'relgion\' in \'field list\'','2022-11-05 14:59:13'),(53,'Unknown column \'relgion\' in \'field list\'','2022-11-05 15:01:07'),(54,'Unknown column \'relgion\' in \'field list\'','2022-11-05 15:04:40'),(55,'You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near \'updated_date = \'2022-11-12 11:42:22\' where id = 3\' at line 1','2022-11-12 11:42:22'),(56,'You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near \'updated_date = \'2022-11-12 11:42:47\' where id = 3\' at line 1','2022-11-12 11:42:47'),(57,'You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near \'updated_date = \'2022-11-12 11:44:10\',`nationality`= \'test\' where id = 3\' at line 1','2022-11-12 11:44:10'),(58,'You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near \'updated_date = \'2022-11-12 11:44:40\',`nationality`= \'test\' where id = 3\' at line 1','2022-11-12 11:44:40'),(59,'You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near \'\'nationality\') values(332,\'carlo\',\'b\',\'jimenezz\',\'2022-11-12\',\'dagupan\',1, \'1...\' at line 1','2022-11-12 13:48:35'),(60,'You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near \'\'nationality\') values(333,\'carlo\',\'b\',\'jimenezz\',\'2022-11-12\',\'dagupan\',1, \'1...\' at line 1','2022-11-12 13:48:56'),(61,'You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near \'\'nationality\') values(335,\'carlo\',\'b\',\'jimenezz\',\'2022-11-12\',\'dagupan\',1, \'1...\' at line 1','2022-11-12 13:49:50'),(62,'Column count doesn\'t match value count at row 1','2022-11-12 14:33:26'),(63,'Column count doesn\'t match value count at row 1','2022-11-12 14:34:52'),(64,'Column count doesn\'t match value count at row 1','2022-11-12 14:35:21'),(65,'Column count doesn\'t match value count at row 1','2022-11-12 14:35:42'),(66,'Column count doesn\'t match value count at row 1','2022-11-12 14:36:56'),(67,'Column count doesn\'t match value count at row 1','2022-11-12 14:40:50'),(68,'Unknown column \'update_date\' in \'field list\'','2022-11-12 14:43:21'),(69,'Unknown column \'update_date\' in \'field list\'','2022-11-12 14:43:42'),(70,'Unknown column \'update_date\' in \'field list\'','2022-11-12 14:44:14'),(71,'Unknown column \'update_date\' in \'field list\'','2022-11-12 14:44:37'),(72,'Unknown column \'update_date\' in \'field list\'','2022-11-12 14:44:56'),(73,'Unknown column \'update_date\' in \'field list\'','2022-11-12 14:45:09'),(74,'Unknown column \'update_date\' in \'field list\'','2022-11-12 14:46:38'),(75,'Unknown column \'update_date\' in \'field list\'','2022-11-12 14:47:05'),(76,'You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near \'s \"ua-ua\" cry because this village was thought to have been impoverished in t...\' at line 1','2022-11-15 18:46:33'),(77,'You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near \'s \"ua-ua\" cry because this village was thought to have been impoverished in t...\' at line 1','2022-11-15 18:48:11'),(78,'Duplicate entry \'1\' for key \'PRIMARY\'','2022-11-15 18:54:46');
/*!40000 ALTER TABLE `tbl_system_error` ENABLE KEYS */;
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
