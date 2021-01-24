-- MySQL dump 10.13  Distrib 5.5.29, for Win64 (x86)
--
-- Host: localhost    Database: warehouse
-- ------------------------------------------------------
-- Server version	5.5.29

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

DROP DATABASE IF EXISTS warehouse;
CREATE DATABASE warehouse;
USE warehouse;

--
-- Table structure for table `product`
--

DROP TABLE IF EXISTS `product`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Product_Category` (
  `category_id` int(11) NOT NULL AUTO_INCREMENT,
  `category_name` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`category_id`)
)
ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8;
CREATE TABLE `product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `price` float(7,2) DEFAULT NULL,
  `price_FPA` float(7,2)DEFAULT NULL,
  PRIMARY KEY (`id`),
  FOREIGN KEY (`category_id`) REFERENCES product_category(`category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;
CREATE TABLE `pack` (
  `Pack_id` int(11) NOT NULL AUTO_INCREMENT,
  `Pack_name` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`pack_id`)
);
CREATE TABLE `product_per_pack` (
  `Pack_id` int(11) NOT NULL ,
  `id` int(11) NOT NULL,
  `pack_quantity` int (10) DEFAULT NULL,
  PRIMARY KEY (`pack_id`,`id`),
  FOREIGN KEY (`pack_id`) REFERENCES pack(`pack_id`),
  FOREIGN KEY (`id`) REFERENCES product(`id`)
);
DROP PROCEDURE IF EXISTS CountPriceFpa;
DELIMITER $$
CREATE PROCEDURE CountPriceFpa(
      IN price double,
      OUT price_fpa  double)
	DETERMINISTIC 
    BEGIN
       set price_fpa= price + (price * (24/100));
    END$$
DELIMITER ;


drop TRIGGER if exists fpa ;
delimiter //
CREATE TRIGGER fpa
BEFORE INSERT ON product
FOR EACH ROW
BEGIN
 call CountPriceFpa(new.price,new.price_fpa);
END;
//
delimiter ;


delimiter //
CREATE TRIGGER fpa_update
BEFORE UPDATE ON product
FOR EACH ROW
BEGIN
 call CountPriceFpa(new.price,new.price_fpa);
END;
//
delimiter ;
--
-- Dumping data for table `product`
--
Insert into `pack`(`pack_name`)values('pack_a'),('pack_b'),('pack_c'),('pack_d'),('pack_e');
Insert INTO `product_category`(`category_name`)values('LTE'),('Server');
LOCK TABLES `product` WRITE;
/*!40000 ALTER TABLE `product` DISABLE KEYS */;

INSERT INTO `product` (`id`,`category_id`,`name`,`quantity`,`price`) VALUES (23,28,'LTE Base Station (eNodeB)',4,10),(24,28,'LTE Evolved Packet Core (EPC)',2,11),(25,28,'LTE User Terminal',10,12),(26,29,'Cloud Server',2,30.2),(27,29,'Mobile Edge Computing (MEC) Server',2,10);
/*!40000 ALTER TABLE `product` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-03-20 12:55:42
--
