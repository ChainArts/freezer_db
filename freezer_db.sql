CREATE DATABASE  IF NOT EXISTS `freezer_db` /*!40100 DEFAULT CHARACTER SET latin1 */;
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
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contents`
--

LOCK TABLES `contents` WRITE;
/*!40000 ALTER TABLE `contents` DISABLE KEYS */;
INSERT INTO `contents` VALUES (1,'Polardorsch','2 Stk','2020-04-23 00:43:38','admin','Fisch','1'),(2,'Schollenfilet','3 Stk','2020-04-23 00:44:07','admin','Fisch','1'),(3,'Zander','1 Stk','2020-04-23 00:44:30','admin','Fisch','1'),(4,'Wock','2 Portionen','2020-04-23 00:44:48','admin','Gericht','1'),(5,'Wock','1 Portion','2020-04-23 00:45:20','admin','Gericht','1'),(6,'HÃ¼hnerbrust','350g','2020-04-23 00:46:34','admin','Fleisch','2'),(7,'Vollkorn Toast','Auf einer Seite zerbrÃ¶selt','2020-04-23 00:48:03','admin','GebÃ¤ck','2'),(8,'Schweinsschnitzel','2 Stk','2020-04-23 00:49:24','admin','Fleisch','2'),(9,'Putenschnitzel','2 Stk','2020-04-23 00:50:02','admin','Fleisch','2'),(10,'HÃ¼hnergeschnetzeltes','2 Portionen','2020-04-23 00:50:28','admin','Gericht','2'),(11,'Kroketten','1 Sack','2020-04-23 00:51:12','admin','Beilage','3'),(12,'Kroketten','1 Sack','2020-04-23 00:52:00','admin','Beilage','3'),(13,'Pommes','1 Sack','2020-04-23 00:52:21','admin','Beilage','3'),(14,'Pommes','1 Sack','2020-04-23 00:52:49','admin','Beilage','3'),(15,'Pommes','1 Sack','2020-04-23 00:53:04','admin','Beilage','3'),(16,'TiefkÃ¼hlgemÃ¼se','1 Sack, 500g','2020-04-23 00:57:15','admin','Beilage','4'),(17,'HÃ¼hnersuppe','2 Portionen','2020-04-23 00:59:10','maroan','Suppe','4'),(18,'HÃ¼hnersuppe','1 Port','2020-04-23 01:01:14','maroan','Suppe','4'),(19,'Rindssuppe','1 Portion','2020-04-23 01:02:14','maroan','Suppe','4'),(20,'GermknÃ¶del','4 StÃ¼ck','2020-04-23 01:03:00','maroan','Gericht','4'),(21,'Pasta Ascuita','1 Port','2020-04-23 01:04:11','maroan','Gericht','5'),(22,'Pasta Ascuita','2 Portionen','2020-04-23 01:07:17','floste','Gericht','5'),(23,'Mehrkorn Toast','','2020-04-23 01:07:42','floste','GebÃ¤ck','5'),(24,'Putenschnetzel','200g','2020-04-23 01:09:18','floste','Fleisch','5'),(25,'IGLO FischstÃ¤bchen','12 Stk','2020-04-23 01:10:31','floste','Fisch','6'),(26,'IGLO FischstÃ¤bchen','12 Stk','2020-04-23 01:11:51','floste','Fisch','6'),(27,'IGLO Spinat','','2020-04-23 01:12:25','floste','Beilage','6'),(28,'IGLO Spinat','','2020-04-23 01:12:48','floste','Beilage','6'),(29,'Dr. Oetker Salami Pizza','','2020-04-23 01:13:58','floste','Gericht','6'),(30,'Dr. Oetker Hawaii Pizza','','2020-04-23 01:18:29','hansi','Gericht','7'),(31,'Dr. Oetker Margarita Pizza','','2020-04-23 01:19:27','hansi','Gericht','7'),(32,'IGLO Polardorsch','4 Stk','2020-04-23 01:20:21','hansi','Fisch','7'),(33,'IGLO Polardorsch','4 Stk','2020-04-23 01:20:45','hansi','Fisch','7'),(34,'SemmelknÃ¶del','Von Oma gemacht','2020-04-23 01:21:24','hansi','Beilage','7'),(35,'Spargel','6 Stk','2020-04-23 01:23:19','aroll','GemÃ¼se','8'),(36,'Burgerlaberl','Roh ','2020-04-23 01:24:16','aroll','Fleisch','8'),(37,'BurgerbrÃ¶tchen','6 Stk','2020-04-23 01:24:37','aroll','GebÃ¤ck','8'),(38,'Roggen Weckerl','6 Stk','2020-04-23 01:26:14','aroll','GebÃ¤ck','8'),(39,'Lasagne','1 1/2 Portionen','2020-04-23 01:26:54','aroll','Gericht','8');
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
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `freezer`
--

LOCK TABLES `freezer` WRITE;
/*!40000 ALTER TABLE `freezer` DISABLE KEYS */;
INSERT INTO `freezer` VALUES (1,'Kitchen 1','GKN 17G3 ',200,'Bauknecht',5),(2,'Cellar','FSN 7952',150,'Elektra Bregenz',5),(3,'Kitchen 1','G1213',80,'Liebherr',5),(4,'Kitchen 2','RB30J3213SA',150,'Samsung',5),(5,'Cellar','RS68N8320S9',620,'Samsung',4),(6,'Cellar','KGV39VL33',250,'Bosch',5),(7,'Kitchen 1','G1217',80,'Liebherr',5),(8,'Kitchen 2','KGR4913',4,'Bosch',5);
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
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `userdata`
--

LOCK TABLES `userdata` WRITE;
/*!40000 ALTER TABLE `userdata` DISABLE KEYS */;
INSERT INTO `userdata` VALUES (0,'admin','admin',' ','$2y$10$udCcydVvo0Fw.dJZQpXZCuLVGGFZAr78gJjNOmd8VXtek7kwpSNzC',1),(1,'hansi','Hansi','Huber','$2y$10$.Pi4cqfME5PebA26KCsbGuL6DLtSuafqkqfESc6HxUR/GpmhVR69a',0),(5,'maroan','Marion','Roll','$2y$10$Bc6RUEEmFVsJkFwdJoim6OW8TPPZdI1cjdZTaAzakPqgViRgpFzHK',0),(7,'floste','Florian','Stella','$2y$10$JYMsoL56e8ndNU1JfH8/4eAtfAelDVnkxUJMc/XKS5UOG0n6OVAuO',1),(8,'aroll','Andreas','Roll','$2y$10$FNx7lnQjFkkrhZP0XGK9v.JmI4oeOVL3SimRkDfeRQSVF0k2jB7tG',0),(9,'Neoplays','Martin','Platajs','$2y$10$AhGK8wvpObZr9ZcFHnn6COzN5DD/4OAMt1LKIj.6uyoK/C78GF86.',0),(10,'ChainArts','Maximilian','Roll','$2y$10$k3CwU7PS9bGDVrOVM82bNOazsXSX75ojKFNWbamRLyjmFdnX.DOym',1),(11,'Stoll','Gerald','Stoll','$2y$10$vHgGC0vm..RGt1GTuV.ZJex0hCJby3TWYc.hCBYZdO.qXhEMecZNm',0),(12,'Gei','Franz','GeischlÃ¤ger','$2y$10$bGcW7StEeWJ12LfLCY5jRuTl4NhFq7A/rIfFuWcju436PaB3FzqY6',0);
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

-- Dump completed on 2020-04-23  1:45:58
