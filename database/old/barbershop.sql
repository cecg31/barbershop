-- MySQL dump 10.13  Distrib 5.7.17, for Win64 (x86_64)
--
-- Host: localhost    Database: barbershop
-- ------------------------------------------------------
-- Server version	5.5.5-10.1.28-MariaDB

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
-- Table structure for table `admins`
--

DROP TABLE IF EXISTS `admins`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `admins` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admins`
--

LOCK TABLES `admins` WRITE;
/*!40000 ALTER TABLE `admins` DISABLE KEYS */;
INSERT INTO `admins` VALUES (1,'teste','698dc19d489c4e4db73e28a713eab07b');
/*!40000 ALTER TABLE `admins` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `clients`
--

DROP TABLE IF EXISTS `clients`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `clients` (
  `id_client` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `birth_date` date DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` int(11) DEFAULT NULL,
  `photo` varchar(255) DEFAULT 'undifined.png',
  `nif` int(11) DEFAULT NULL,
  `notification` varchar(255) DEFAULT NULL,
  `active` tinyint(1) DEFAULT '1',
  `date_add` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_client`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `clients`
--

LOCK TABLES `clients` WRITE;
/*!40000 ALTER TABLE `clients` DISABLE KEYS */;
INSERT INTO `clients` VALUES (1,'Gonçalo','0000-00-00','Barcelos','goncalonuno_1995@hotmail.com',123123,'1532180564.png',123123,'1',1,'2018-07-21 14:42:44'),(2,'Carlos','0000-00-00','Fafe','goncalonuno_1995@hotmail.com',654,'undifined.png',987,'3',1,'2018-07-23 20:46:54'),(3,'Teste','0000-00-00','Teste','sofiapereira3@hotmail.com',123456,'1532375781.png',12345,'3',0,'2018-07-23 20:56:21');
/*!40000 ALTER TABLE `clients` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `notification`
--

DROP TABLE IF EXISTS `notification`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `notification` (
  `id_notification` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_notification`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `notification`
--

LOCK TABLES `notification` WRITE;
/*!40000 ALTER TABLE `notification` DISABLE KEYS */;
INSERT INTO `notification` VALUES (1,'SMS'),(2,'Email'),(3,'Whatsapp'),(4,'Facebook');
/*!40000 ALTER TABLE `notification` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `parameters`
--

DROP TABLE IF EXISTS `parameters`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `parameters` (
  `id_parameter` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `begin_time` time DEFAULT NULL,
  `end_time` time DEFAULT NULL,
  PRIMARY KEY (`id_parameter`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `parameters`
--

LOCK TABLES `parameters` WRITE;
/*!40000 ALTER TABLE `parameters` DISABLE KEYS */;
/*!40000 ALTER TABLE `parameters` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product_bought`
--

DROP TABLE IF EXISTS `product_bought`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `product_bought` (
  `id_product_bought` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `id_client` int(11) DEFAULT NULL,
  `id_product` int(11) DEFAULT NULL,
  `quantity_bought` int(11) DEFAULT NULL,
  `sale_price` float DEFAULT NULL,
  `date_add` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_product_bought`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product_bought`
--

LOCK TABLES `product_bought` WRITE;
/*!40000 ALTER TABLE `product_bought` DISABLE KEYS */;
/*!40000 ALTER TABLE `product_bought` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `products` (
  `id_product` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `supplier` varchar(255) DEFAULT NULL,
  `img_url` varchar(255) DEFAULT NULL,
  `date_add` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_product`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products`
--

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
/*!40000 ALTER TABLE `products` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `resources`
--

DROP TABLE IF EXISTS `resources`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `resources` (
  `id_resource` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `birth_date` varchar(255) DEFAULT NULL,
  `start_hour` varchar(255) DEFAULT '',
  `end_hour` varchar(255) DEFAULT NULL,
  `holidays_begin` varchar(255) DEFAULT NULL,
  `holidays_end` varchar(255) DEFAULT NULL,
  `photo_resources` varchar(255) DEFAULT 'undifined.png',
  `active` tinyint(1) DEFAULT '1',
  `date_add` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_resource`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `resources`
--

LOCK TABLES `resources` WRITE;
/*!40000 ALTER TABLE `resources` DISABLE KEYS */;
INSERT INTO `resources` VALUES (1,'Gonçalo111','11/20/1900','05:01','10:01','11/21/1900','12/07/1900','1532175714.png',0,'2018-07-21 11:56:46'),(2,'Gonçaloqwe','12/05/1900','05:01','05:01','11/07/1900','11/05/1900','1532170633.png',0,'2018-07-21 11:58:00'),(3,'Gonçalo','0000-00-00','01:01:00','01:01:00','0000-00-00','0000-00-00','1532170633.png',0,'2018-07-21 11:58:01'),(4,'Gonçalo','07/18/2018','01:01','01:01','07/06/2018','07/02/2018','1532170633.png',0,'2018-07-21 11:59:59'),(5,'Gonçalo','07/04/2018','01:01','01:01','','','undifined.png',0,'2018-07-21 12:00:52'),(6,'Gonçalo1111','07/14/2018','02:01','02:01','','','1532172762.png',0,'2018-07-21 12:32:42'),(7,'Gonçalo','07/04/2018','01:01','04:01','07/26/2018','12/07/1900','undifined.png',0,'2018-07-21 12:57:48'),(8,'Gonçalo','07/31/1995','07:00','07:00','','','1532175433.png',0,'2018-07-21 13:16:30'),(9,'Gonçalo1111','05/23/2019','07:57','00:02','07/19/2020','09/04/2000','1532176559.png',0,'2018-07-21 13:35:59'),(10,'Gonçalo','07/18/2018','00:59','23:00','','','undifined.png',0,'2018-07-21 13:42:01'),(11,'Gonçalo','07/31/1995','23:59','01:01','11/07/1900','07/02/2018','1532185314.png',0,'2018-07-21 16:01:54'),(12,'Gonçalo','07/18/2018','01:01','22:01','','','1532546709.png',1,'2018-07-25 20:25:09');
/*!40000 ALTER TABLE `resources` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `schedule`
--

DROP TABLE IF EXISTS `schedule`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `schedule` (
  `id_schedule` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `id_client` int(11) DEFAULT NULL,
  `id_resource` int(11) DEFAULT NULL,
  `id_service` int(11) DEFAULT NULL,
  `datetime` datetime DEFAULT NULL,
  PRIMARY KEY (`id_schedule`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `schedule`
--

LOCK TABLES `schedule` WRITE;
/*!40000 ALTER TABLE `schedule` DISABLE KEYS */;
INSERT INTO `schedule` VALUES (1,2,12,5,'2018-07-31 10:00:00'),(2,1,12,6,'2018-07-31 10:25:00');
/*!40000 ALTER TABLE `schedule` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `services`
--

DROP TABLE IF EXISTS `services`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `services` (
  `id_service` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `time` time DEFAULT NULL,
  `color` varchar(100) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `active` tinyint(1) DEFAULT '1',
  `date_add` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_service`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `services`
--

LOCK TABLES `services` WRITE;
/*!40000 ALTER TABLE `services` DISABLE KEYS */;
INSERT INTO `services` VALUES (1,'Gonçalo','23:00:00','FFFFFF',NULL,0,'2018-07-21 15:02:19'),(2,'Gonçalo111','06:58:00','blue',NULL,0,'2018-07-21 15:03:05'),(3,'Gonçalo','01:58:00','7B3DFF',NULL,0,'2018-07-21 15:03:31'),(4,'Barba','00:05:00','4DFF44',NULL,0,'2018-07-21 15:42:34'),(5,'Corte','00:25:00','9EFF84',NULL,1,'2018-07-21 16:00:56'),(6,'Barba','00:05:00','FF8468',NULL,1,'2018-07-21 16:02:35'),(7,'Corte','00:45:00','FF7AD4',5,0,'2018-07-25 20:15:35');
/*!40000 ALTER TABLE `services` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `stock`
--

DROP TABLE IF EXISTS `stock`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `stock` (
  `id_stock` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `id_product` int(11) DEFAULT NULL,
  `last_stock_update` datetime DEFAULT NULL,
  `last_purchase` datetime DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `unit_price` float DEFAULT NULL,
  `date_add` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_stock`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `stock`
--

LOCK TABLES `stock` WRITE;
/*!40000 ALTER TABLE `stock` DISABLE KEYS */;
/*!40000 ALTER TABLE `stock` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id_user` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(11) DEFAULT NULL,
  `ordered` int(11) unsigned NOT NULL,
  `visible` tinyint(1) DEFAULT '1',
  `photo` varchar(255) DEFAULT NULL,
  `data_add` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'user1',0,1,NULL,'2018-07-15 18:52:41'),(2,'user2',1,1,NULL,'2018-07-15 18:53:32'),(3,'user3',2,1,NULL,'2018-07-15 18:53:42');
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

-- Dump completed on 2018-07-26  4:04:39
