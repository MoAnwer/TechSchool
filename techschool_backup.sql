-- MariaDB dump 10.19  Distrib 10.4.27-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: techschool
-- ------------------------------------------------------
-- Server version	10.4.27-MariaDB

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
-- Table structure for table `inputs`
--

DROP TABLE IF EXISTS `inputs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `inputs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `std_name` varchar(255) NOT NULL,
  `stage` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `parent` varchar(255) NOT NULL,
  `phone` varchar(11) NOT NULL,
  `address` varchar(255) NOT NULL,
  `enroll_money` int(11) NOT NULL,
  `study_money` int(11) NOT NULL,
  `offer` int(11) NOT NULL,
  `last_money` int(11) DEFAULT NULL,
  `total` int(11) NOT NULL,
  `g1` int(11) NOT NULL,
  `d1` date NOT NULL,
  `g2` int(11) NOT NULL,
  `d2` date NOT NULL,
  `g3` int(11) NOT NULL,
  `d3` date NOT NULL,
  `g4` int(11) NOT NULL,
  `d4` date NOT NULL,
  `g5` int(11) NOT NULL,
  `d5` date NOT NULL,
  `g6` int(11) NOT NULL,
  `d6` date NOT NULL,
  `g7` int(11) NOT NULL,
  `d7` date NOT NULL,
  `pulled` int(11) NOT NULL,
  `result` int(11) NOT NULL,
  `date` date NOT NULL,
  `notes` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `inputs`
--

LOCK TABLES `inputs` WRITE;
/*!40000 ALTER TABLE `inputs` DISABLE KEYS */;
INSERT INTO `inputs` VALUES (1,'عمر يوسف الطيب علي','الإبتدائي','الأول','يوسف الطيب علي','0971236471','كسلا',2000,100000,2000,0,100000,20000,'2024-03-01',20000,'2024-04-01',20000,'2024-05-01',10000,'2024-06-01',10000,'2024-07-01',10000,'2024-08-01',10000,'2024-09-01',100000,0,'2024-02-01','جيد'),(2,'محمد عادل احمد','المتوسط','الأول المتوسط','عادل','0989786875','كسلا',2000,100000,2000,0,100000,20000,'2024-02-22',20000,'2024-02-20',20000,'2024-02-14',10000,'2024-02-20',10000,'2024-02-19',10000,'2024-02-21',10000,'2024-02-29',100000,0,'2024-02-01','ممتاز'),(3,'محمد متوكل عبدالرحيم علي','الروضة','الأول','متوكل عبدالرحيم علي','09238947','الخرطوم',2000,100000,2000,0,100000,20000,'2024-02-29',20000,'2024-02-14',20000,'2024-02-21',10000,'2024-03-08',10000,'2024-03-06',10000,'2024-03-23',10000,'2024-04-12',100000,0,'2024-02-01','good'),(6,'محمد انور ليمان','الثانوي','الثاني الثانوي',' انور ليمان','0926354179','كسلا',2000,200000,2000,10000,210000,20000,'2024-02-24',20000,'2024-03-09',20000,'2024-03-02',40000,'2024-02-15',40000,'2024-02-13',30000,'2024-02-17',30000,'2024-03-07',200000,0,'2024-02-05','ممتاز');
/*!40000 ALTER TABLE `inputs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `outputs`
--

DROP TABLE IF EXISTS `outputs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `outputs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `electric_water` int(11) DEFAULT NULL,
  `home_money` int(11) DEFAULT NULL,
  `desk_tools` int(11) DEFAULT NULL,
  `gomash` int(11) DEFAULT NULL,
  `tafseel` int(11) DEFAULT NULL,
  `mangal_money` int(11) DEFAULT NULL,
  `social_protection` int(11) DEFAULT NULL,
  `buy` int(11) DEFAULT NULL,
  `print_scan` int(11) DEFAULT NULL,
  `events` int(11) DEFAULT NULL,
  `maintains` int(11) DEFAULT NULL,
  `notes` text DEFAULT NULL,
  `manger_rule` int(11) DEFAULT NULL,
  `total` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `outputs`
--

LOCK TABLES `outputs` WRITE;
/*!40000 ALTER TABLE `outputs` DISABLE KEYS */;
INSERT INTO `outputs` VALUES (3,'2024-02-01',20000,0,0,0,0,0,0,0,0,0,0,'00',0,20000),(4,'2024-02-01',0,0,0,0,0,0,0,0,0,0,10000,'صيانة اثاث مكتبي و مكاتب عمل',0,10000),(5,'2024-02-01',0,0,10000,0,0,0,0,0,0,0,0,'مستلزمات مكتبية',0,10000),(6,'2024-02-02',0,0,10000,0,0,0,0,0,0,0,0,'ادوات مكتبية',0,10000),(7,'2024-02-05',10000,0,10000,0,0,10000,0,10000,0,0,10000,'محمد',0,50000);
/*!40000 ALTER TABLE `outputs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `UserName` varchar(50) NOT NULL,
  `UserPassword` varchar(255) NOT NULL,
  `UserEmail` varchar(50) DEFAULT NULL,
  `IsAdmin` varchar(3) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UserName` (`UserName`),
  UNIQUE KEY `UserName_2` (`UserName`)
) ENGINE=InnoDB AUTO_INCREMENT=61 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'محمد','40bd001563085fc35165329ea1ff5c5ecbdbbeef','ma@gmail.com','yes'),(29,'مظفر','7c4a8d09ca3762af61e59520943dc26494f8941b','mothafer898@gmail.com','no'),(35,'محمد انور','69277917edf03758a41a78b65f3b6fe96588d599','mohamedanwer26@gmail.com','yes');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-02-08  7:02:56
