# ************************************************************
# Sequel Pro SQL dump
# Version 3408
#
# http://www.sequelpro.com/
# http://code.google.com/p/sequel-pro/
#
# Host: 127.0.0.1 (MySQL 5.1.44)
# Database: ishop
# Generation Time: 2012-03-30 16:55:17 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table categories
# ------------------------------------------------------------

DROP TABLE IF EXISTS `categories`;

CREATE TABLE `categories` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;

INSERT INTO `categories` (`id`, `name`)
VALUES
	(1,'category 1'),
	(2,'category 2'),
	(3,'category 3'),
	(5,'category 5'),
	(666,'category 666');

/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table news
# ------------------------------------------------------------

DROP TABLE IF EXISTS `news`;

CREATE TABLE `news` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL DEFAULT '',
  `text` text NOT NULL,
  `date` varchar(32) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `news` WRITE;
/*!40000 ALTER TABLE `news` DISABLE KEYS */;

INSERT INTO `news` (`id`, `title`, `text`, `date`)
VALUES
	(1,'test news title','test news text\nmulti lines','2012-03-23'),
	(2,'test news title 1','test news text\nmulti lines','2012-03-23'),
	(3,'test news title 2','test news text\nmulti lines','2012-03-23'),
	(4,'test news title 3','test news text\nmulti lines','2012-03-23'),
	(5,'test news title 4','test news text\nmulti lines','2012-03-23'),
	(6,'test news title 5','test news text\nmulti lines','2012-03-23');

/*!40000 ALTER TABLE `news` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table products
# ------------------------------------------------------------

DROP TABLE IF EXISTS `products`;

CREATE TABLE `products` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL DEFAULT '',
  `image_url` varchar(255) DEFAULT NULL,
  `price` double NOT NULL,
  `category` int(11) NOT NULL,
  `description` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;

INSERT INTO `products` (`id`, `name`, `image_url`, `price`, `category`, `description`)
VALUES
	(1,'Bravo-07','bravo-07.png',2700,1,'Название говорит само за себя - Bravo! Еще больше необычных, яких и стильных туфель на столь актуальной танкетке'),
	(2,'Dynamite-03','Dynamite-03.png',3100,1,'Туфли на платформе. Искусственная кожа, на ремеках, в платформе сквозное отверстие в виде звезды. Высота платформы 13 см.'),
	(3,'stomp-101','stomp-101.png',5600,3,'Сапоги на фигурной платформе. Искусственная кожа, на шнуровке, с декоративными пряжками и ремешками. Высота платформы 12 см.'),
	(4,'Product 4','nothing4',123123,2,'Product\ndescription 4'),
	(5,'Product 5','nothing5',1222,2,'Product\ndescription 5'),
	(6,'Product 6','nothing6',999,5,'Product\ndescription 6'),
	(7,'Product 7','nothing7',666,666,'Product\ndescription 7');

/*!40000 ALTER TABLE `products` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table products_sizes
# ------------------------------------------------------------

DROP TABLE IF EXISTS `products_sizes`;

CREATE TABLE `products_sizes` (
  `pid` int(11) unsigned NOT NULL,
  `sid` int(11) unsigned NOT NULL,
  KEY `index` (`sid`,`pid`),
  KEY `pid` (`pid`),
  CONSTRAINT `products_sizes_ibfk_2` FOREIGN KEY (`sid`) REFERENCES `sizes` (`id`),
  CONSTRAINT `products_sizes_ibfk_3` FOREIGN KEY (`pid`) REFERENCES `products` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `products_sizes` WRITE;
/*!40000 ALTER TABLE `products_sizes` DISABLE KEYS */;

INSERT INTO `products_sizes` (`pid`, `sid`)
VALUES
	(1,1),
	(3,5),
	(2,6),
	(2,7),
	(4,7),
	(5,8),
	(6,9),
	(7,9),
	(7,10);

/*!40000 ALTER TABLE `products_sizes` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table related_products
# ------------------------------------------------------------

DROP TABLE IF EXISTS `related_products`;

CREATE TABLE `related_products` (
  `pid` int(11) unsigned NOT NULL,
  `rpid` int(11) unsigned NOT NULL,
  UNIQUE KEY `rpid` (`rpid`,`pid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;



# Dump of table sizes
# ------------------------------------------------------------

DROP TABLE IF EXISTS `sizes`;

CREATE TABLE `sizes` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `value` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `sizes` WRITE;
/*!40000 ALTER TABLE `sizes` DISABLE KEYS */;

INSERT INTO `sizes` (`id`, `value`)
VALUES
	(1,36),
	(5,37),
	(6,38),
	(7,39),
	(8,40),
	(9,41),
	(10,42);

/*!40000 ALTER TABLE `sizes` ENABLE KEYS */;
UNLOCK TABLES;

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `address` varchar(256) CHARACTER SET utf8 NOT NULL,
  `fio` varchar(256) CHARACTER SET utf8 NOT NULL,
  `username` varchar(128) CHARACTER SET utf8 NOT NULL,
  `password` varchar(64) CHARACTER SET utf8 NOT NULL,
  `isAdmin` tinyint(1) NOT NULL,
  `email` varchar(256) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
