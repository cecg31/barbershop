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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `clients`
--

LOCK TABLES `clients` WRITE;
/*!40000 ALTER TABLE `clients` DISABLE KEYS */;
INSERT INTO `clients` VALUES (1,'Gonçalo Nuno Costa','0000-00-00','Barcelos','goncalonuno_1995@hotmail.com',123123,'1532180564.png',2147483647,'1',1,'2018-07-21 14:42:44'),(2,'Carlos Emanuel C. Gonçalves','0000-00-00','Fafe','carlosecg_1996@hotmail.com',969912337,'undifined.png',9878469,'3',1,'2018-07-23 20:46:54'),(3,'Teste','0000-00-00','Teste','sofiapereira3@hotmail.com',123456,'1532375781.png',12345,'3',0,'2018-07-23 20:56:21'),(4,'André Jesus Costa','0000-00-00','Rua das Moradias, Sol Poente 31','andrecosta_31@gmail.com',968548962,'undifined.png',256987452,'1',1,'2018-07-28 20:22:02'),(5,'Jorge Manuel Castro Pereira','0000-00-00','Av. Lisboa Costa','jorge_cp@mail.pt',916587395,'undifined.png',36589452,'3',1,'2018-07-28 20:23:05');
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
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `resources`
--

LOCK TABLES `resources` WRITE;
/*!40000 ALTER TABLE `resources` DISABLE KEYS */;
INSERT INTO `resources` VALUES (12,'Pedro Carvalho','07/18/1992','07:00:00','20:00:00','','','1532546709.png',1,'2018-07-25 20:25:09'),(13,'Manuel Teixeira','08/28/1991','09:00:00','23:00:00','','','undifined.png',1,'2018-07-28 20:35:22');
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
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `schedule`
--

LOCK TABLES `schedule` WRITE;
/*!40000 ALTER TABLE `schedule` DISABLE KEYS */;
INSERT INTO `schedule` VALUES (6,4,12,5,'2018-07-31 09:30:00'),(7,2,12,6,'2018-07-31 10:00:00'),(8,1,12,6,'2018-07-31 10:10:00'),(9,5,12,5,'2018-07-31 10:15:00'),(10,4,12,5,'2018-08-01 09:30:00'),(11,4,13,5,'2018-07-31 09:00:00'),(12,2,13,5,'2018-07-31 10:00:00'),(13,1,13,5,'2018-07-31 10:30:00'),(14,5,13,5,'2018-07-31 11:00:00'),(15,1,13,5,'2018-08-01 09:30:00'),(16,4,12,5,'2018-08-01 10:58:00');
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
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `services`
--

LOCK TABLES `services` WRITE;
/*!40000 ALTER TABLE `services` DISABLE KEYS */;
INSERT INTO `services` VALUES (5,'Corte','00:25:00','9EFF84',NULL,1,'2018-07-21 16:00:56'),(6,'Barba','00:05:00','FF8468',NULL,1,'2018-07-21 16:02:35'),(8,'Corte e Barba','00:30:00','FFE851',5,1,'2018-07-28 20:37:24');
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

-- Dump completed on 2018-07-29 22:30:09
