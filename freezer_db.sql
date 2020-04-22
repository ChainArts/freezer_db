CREATE DATABASE IF NOT EXISTS `freezer_db` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `freezer_db`;
-- MariaDB dump 10.17  Distrib 10.4.6-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: freezer_db
-- ------------------------------------------------------
-- Server version	10.4.6-MariaDB

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
-- Table structure for table `contents`
--

DROP TABLE IF EXISTS `contents`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `contents` (
  `item_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `notes` varchar(1000) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `user` varchar(45) DEFAULT NULL,
  `type` varchar(45) DEFAULT NULL,
  `location` varchar(256) DEFAULT NULL,
  PRIMARY KEY (`item_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contents`
--

LOCK TABLES `contents` WRITE;
/*!40000 ALTER TABLE `contents` DISABLE KEYS */;
INSERT INTO `contents` VALUES (1,'Goldbrasse','1 STK','2020-04-22 14:49:54','admin','Fisch','1'),(2,'Schweineschnitzel','2 STK Pute','2020-04-22 15:13:41','admin','Fleisch','6'),(4,'fadsf','afsdsaf','2020-04-22 16:25:32','admin','dfassdf','14');
/*!40000 ALTER TABLE `contents` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `freezer`
--

DROP TABLE IF EXISTS `freezer`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `freezer` (
  `frz_id` int(11) NOT NULL AUTO_INCREMENT,
  `location` varchar(45) DEFAULT NULL,
  `model` varchar(45) DEFAULT NULL,
  `capacity` int(11) NOT NULL,
  `brand` varchar(45) DEFAULT NULL,
  `status` int(11) unsigned NOT NULL DEFAULT 0,
  PRIMARY KEY (`frz_id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `freezer`
--

LOCK TABLES `freezer` WRITE;
/*!40000 ALTER TABLE `freezer` DISABLE KEYS */;
INSERT INTO `freezer` VALUES (1,'Kitchen','AGS 0993 F',400,'AEG',1),(2,'Kitchen','TF 140.1',600,'Novamatic',0),(3,'Kitchen','TG095',300,'Electrolux',0),(4,'Kitchen','GS54NAW42',800,'Siemens',0),(5,'Kitchen','GKN ECO 18',800,'Bauknecht',0),(6,'Kitchen','GS58NAWDPH ',800,'Siemens',1),(7,'Kitchen','LTGN 268',800,'Liebherr',0),(14,'Kitchen 1','Ag429F',5,'Siemens',1),(15,'Cellar','ag41092',300,'Siemens',0);
/*!40000 ALTER TABLE `freezer` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `userdata`
--

DROP TABLE IF EXISTS `userdata`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `userdata` (
  `usr_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(45) DEFAULT NULL,
  `firstname` varchar(45) DEFAULT NULL,
  `lastname` varchar(45) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `usr_lvl` int(2) DEFAULT 0,
  PRIMARY KEY (`usr_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `userdata`
--

LOCK TABLES `userdata` WRITE;
/*!40000 ALTER TABLE `userdata` DISABLE KEYS */;
INSERT INTO `userdata` VALUES (0,'admin','Maximilian','Roll','$2y$10$udCcydVvo0Fw.dJZQpXZCuLVGGFZAr78gJjNOmd8VXtek7kwpSNzC',1),(1,'hansi','Hansi','Huber','$2y$10$7fRb8h3WIy/cdyqDcL1YzeszIofq00kfOYG1O8CnwX/ApLUeFWs5m',0),(2,'NeoPlays','Martin','Platajs','$2y$10$wkgILISFUBr56D.EEX78I.bKNNi4kp/wv78Fzpw09BQGQFxjTeOIq',0),(5,'maroan','Marion','Roll','$2y$10$mglDO2cKeb95DTGbuZ817O3xa.1Aoo63pfIbKFOBXf3kXZW7Sykfm',0),(6,'hans','hansi','huber','$2y$10$KO9fsylsv0k4V5.uPHpBXO70lA/3zzyaMi1wQvHs919SyTFisDmX6',0);
/*!40000 ALTER TABLE `userdata` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-04-22 19:31:05
