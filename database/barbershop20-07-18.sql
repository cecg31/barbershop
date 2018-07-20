# ************************************************************
# Sequel Pro SQL dump
# Versão 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 127.0.0.1 (MySQL 5.6.38)
# Base de Dados: barbershop
# Tempo de Geração: 2018-07-20 17:28:18 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump da tabela admins
# ------------------------------------------------------------

DROP TABLE IF EXISTS `admins`;

CREATE TABLE `admins` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `admins` WRITE;
/*!40000 ALTER TABLE `admins` DISABLE KEYS */;

INSERT INTO `admins` (`id`, `username`, `password`)
VALUES
	(1,'teste','698dc19d489c4e4db73e28a713eab07b');

/*!40000 ALTER TABLE `admins` ENABLE KEYS */;
UNLOCK TABLES;


# Dump da tabela clients
# ------------------------------------------------------------

DROP TABLE IF EXISTS `clients`;

CREATE TABLE `clients` (
  `id_client` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `birth_date` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` int(11) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `nif` int(11) DEFAULT NULL,
  `notification` varchar(255) DEFAULT NULL,
  `date_add` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_client`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `clients` WRITE;
/*!40000 ALTER TABLE `clients` DISABLE KEYS */;

INSERT INTO `clients` (`id_client`, `name`, `birth_date`, `address`, `email`, `phone`, `photo`, `nif`, `notification`, `date_add`)
VALUES
	(1,'Gonçalo','07/13/2018','Barcelos','goncalonuno_1995@hotmail.com',123123,'1532106852.png',123123,'1','0000-00-00 00:00:00');

/*!40000 ALTER TABLE `clients` ENABLE KEYS */;
UNLOCK TABLES;


# Dump da tabela notification
# ------------------------------------------------------------

DROP TABLE IF EXISTS `notification`;

CREATE TABLE `notification` (
  `id_notification` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_notification`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `notification` WRITE;
/*!40000 ALTER TABLE `notification` DISABLE KEYS */;

INSERT INTO `notification` (`id_notification`, `nome`)
VALUES
	(1,'SMS'),
	(2,'Email'),
	(3,'Whatsapp'),
	(4,'Facebook');

/*!40000 ALTER TABLE `notification` ENABLE KEYS */;
UNLOCK TABLES;


# Dump da tabela parameters
# ------------------------------------------------------------

DROP TABLE IF EXISTS `parameters`;

CREATE TABLE `parameters` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump da tabela product_bought
# ------------------------------------------------------------

DROP TABLE IF EXISTS `product_bought`;

CREATE TABLE `product_bought` (
  `id_product_bought` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `id_client` int(11) DEFAULT NULL,
  `id_product` int(11) DEFAULT NULL,
  `quantity_bought` int(11) DEFAULT NULL,
  `sale_price` float DEFAULT NULL,
  `date_add` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_product_bought`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump da tabela products
# ------------------------------------------------------------

DROP TABLE IF EXISTS `products`;

CREATE TABLE `products` (
  `id_product` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `supplier` varchar(255) DEFAULT NULL,
  `img_url` varchar(255) DEFAULT NULL,
  `date_add` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_product`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump da tabela schedule
# ------------------------------------------------------------

DROP TABLE IF EXISTS `schedule`;

CREATE TABLE `schedule` (
  `id_schedule` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `id_client` int(11) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  `id_service` int(11) DEFAULT NULL,
  `datetime` datetime DEFAULT NULL,
  PRIMARY KEY (`id_schedule`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump da tabela services
# ------------------------------------------------------------

DROP TABLE IF EXISTS `services`;

CREATE TABLE `services` (
  `id_services` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `time` int(11) DEFAULT NULL,
  `color` varchar(100) DEFAULT NULL,
  `barbericon` varchar(255) DEFAULT NULL,
  `date_add` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_services`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump da tabela stock
# ------------------------------------------------------------

DROP TABLE IF EXISTS `stock`;

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



# Dump da tabela users
# ------------------------------------------------------------

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id_user` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(11) DEFAULT NULL,
  `ordered` int(11) unsigned NOT NULL,
  `visible` tinyint(1) DEFAULT '1',
  `photo` varchar(255) DEFAULT NULL,
  `data_add` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;

INSERT INTO `users` (`id_user`, `name`, `ordered`, `visible`, `photo`, `data_add`)
VALUES
	(1,'user1',0,1,NULL,'2018-07-15 18:52:41'),
	(2,'user2',1,1,NULL,'2018-07-15 18:53:32'),
	(3,'user3',2,1,NULL,'2018-07-15 18:53:42');

/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
