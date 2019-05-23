CREATE DATABASE  IF NOT EXISTS `locamoto` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */;
USE `locamoto`;
-- MySQL dump 10.13  Distrib 8.0.15, for Win64 (x86_64)
--
-- Host: localhost    Database: locamoto
-- ------------------------------------------------------
-- Server version	8.0.15

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
 SET NAMES utf8 ;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Dumping data for table `images`
--

LOCK TABLES `images` WRITE;
/*!40000 ALTER TABLE `images` DISABLE KEYS */;
INSERT INTO `images` VALUES (1,'14258E_1.jpg','img/14258E_1.jpg'),(2,'14227S_1.jpg','img/14227S_1.jpg'),(3,'ducati-model.jpeg','img/ducati-model.jpeg'),(6,'kawasakininja.jpg','img/kawasakininja.jpg'),(10,'bwm.jpg','img/bwm.jpg'),(18,'honda.jpg','img/honda.jpg'),(19,'HarleyDavidson.png','img/HarleyDavidson.png'),(20,'triomphe.jpg','img/triomphe.jpg');
/*!40000 ALTER TABLE `images` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `locations`
--

LOCK TABLES `locations` WRITE;
/*!40000 ALTER TABLE `locations` DISABLE KEYS */;
INSERT INTO `locations` VALUES (4,'2019-05-15 06:02:36','2019-05-09 00:00:00','2019-05-18 00:00:00',77,'Très bon',2,123732),(7,'2019-05-15 11:14:34','2019-06-03 00:00:00','2019-06-07 00:00:00',34,'Génial !',2,123456),(8,'2019-05-15 11:28:29','2019-06-12 00:00:00','2019-06-14 00:00:00',17,NULL,2,123732),(11,'2019-05-20 14:10:59','2019-05-28 00:00:00','2019-05-31 00:00:00',25,NULL,2,123570),(12,'2019-05-21 06:33:05','2019-06-07 00:00:00','2019-06-09 00:00:00',17,NULL,2,123732),(14,'2019-05-21 06:52:49','2019-05-29 00:00:00','2019-06-01 00:00:00',25,NULL,1,234567),(15,'2019-05-22 08:35:36','2019-06-01 00:00:00','2019-06-03 00:00:00',17,NULL,9,123456);
/*!40000 ALTER TABLE `locations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `motos`
--

LOCK TABLES `motos` WRITE;
/*!40000 ALTER TABLE `motos` DISABLE KEYS */;
INSERT INTO `motos` VALUES (120358,'Triomphe','450 cm3','Jaune','2018-10-07',20),(123456,'Kawasako','230 cm3','Verte','2019-01-02',6),(123570,'Honga','780 cm3','Noir/Rouge','2018-02-22',18),(123732,'Yahama','683 cm3','Bleue','2003-01-20',1),(234567,'Yahama','660 cm3','Noire','2018-05-17',2),(328345,'Harley Davidfils','820 cm3','Noire','2019-05-22',19),(345678,'Ducato','821 cm3','Rouge','2017-02-02',3),(984532,'BWM','864 cm3','Noir','2019-05-17',10);
/*!40000 ALTER TABLE `motos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `utilisateurs`
--

LOCK TABLES `utilisateurs` WRITE;
/*!40000 ALTER TABLE `utilisateurs` DISABLE KEYS */;
INSERT INTO `utilisateurs` VALUES (1,'Jacot-dit-Montandon','Ludovic','Ludo','f6889fc97e14b42dec11a8c183ea791c5465b658','ludovic.jctdt@eduge.ch','2000-06-26',1),(2,'Admin','Admin','Admin','f6889fc97e14b42dec11a8c183ea791c5465b658','Admin.admin@gmail.com','2000-01-02',2),(9,'Cotture','Corentin','Coco','f6889fc97e14b42dec11a8c183ea791c5465b658','corentin.cttr@eduge.ch','1998-06-02',1);
/*!40000 ALTER TABLE `utilisateurs` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-05-23  9:13:52
