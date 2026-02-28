-- $ git tag v.2.0

-- MySQL dump 10.13  Distrib 8.0.44, for Win64 (x86_64)
--
-- Host: localhost    Database: candles
-- ------------------------------------------------------
-- Server version	8.0.44

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `candles`
--

DROP TABLE IF EXISTS `candles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `candles` (
  `candles_id` int NOT NULL,
  `candles_code` varchar(10) NOT NULL,
  `candles_name` varchar(255) NOT NULL,
  `candles_description` text NOT NULL,
  `candles_size` varchar(50) NOT NULL,
  `candles_burn_time` varchar(60) NOT NULL,
  `candles_type_id` int DEFAULT '0',
  `candles_buy_price` decimal(10,2) NOT NULL,
  `candles_sell_price` decimal(10,2) NOT NULL,
  `date_time_created` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `date_time_updated` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`candles_id`),
  UNIQUE KEY `candles_code` (`candles_code`),
  KEY `candles_type_id` (`candles_type_id`),
  CONSTRAINT `candles_ibfk_1` FOREIGN KEY (`candles_type_id`) REFERENCES `candles_types` (`candles_type_id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `candles`
--

LOCK TABLES `candles` WRITE;
/*!40000 ALTER TABLE `candles` DISABLE KEYS */;
INSERT INTO `candles` VALUES (2,'FLAM','Flameless','This candle requires batteries.','1 oz','10,000h',2,2.00,2.40,'2026-02-28 16:10:06','2026-02-28 16:10:06');
/*!40000 ALTER TABLE `candles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `candles_types`
--

DROP TABLE IF EXISTS `candles_types`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `candles_types` (
  `candles_type_id` int NOT NULL,
  `candles_type_code` varchar(255) NOT NULL,
  `candles_type_name` varchar(255) NOT NULL,
  `candles_type_shelf_number` varchar(50) NOT NULL,
  `date_time_created` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `date_time_updated` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`candles_type_id`),
  UNIQUE KEY `candles_type_code` (`candles_type_code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `candles_types`
--

LOCK TABLES `candles_types` WRITE;
/*!40000 ALTER TABLE `candles_types` DISABLE KEYS */;
INSERT INTO `candles_types` VALUES (1,'SCNT','Scented','A1','2026-02-28 16:05:28','2026-02-28 16:05:28'),(2,'LED','LED','B2','2026-02-28 15:42:42','2026-02-28 15:42:42'),(3,'DECO','Decorative','C3','2026-02-28 16:18:41','2026-02-28 16:18:41');
/*!40000 ALTER TABLE `candles_types` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `candles_users`
--

DROP TABLE IF EXISTS `candles_users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `candles_users` (
  `candles_user_id` int NOT NULL AUTO_INCREMENT,
  `email_address` varchar(255) NOT NULL,
  `password` varchar(64) NOT NULL,
  `pronouns` varchar(60) NOT NULL,
  `first_name` varchar(60) NOT NULL,
  `last_name` varchar(60) NOT NULL,
  `phone_number` varchar(20) NOT NULL,
  `date_time_created` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `date_time_updated` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`candles_user_id`),
  UNIQUE KEY `email_address` (`email_address`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `candles_users`
--

LOCK TABLES `candles_users` WRITE;
/*!40000 ALTER TABLE `candles_users` DISABLE KEYS */;
INSERT INTO `candles_users` VALUES (1,'reefieteefie@candles.com','3cdfa761361762ddedc01ea1428db10a92e327325f490f7f34f1b1b91d994f22','She/Her','Reef','Teef','222-2359','2026-02-28 15:33:06','2026-02-28 15:33:06'),(2,'beebeeboopboop@candles.com','3cdfa761361762ddedc01ea1428db10a92e327325f490f7f34f1b1b91d994f22','He/They','Bee','Boop','177-8903','2026-02-28 15:33:11','2026-02-28 15:33:11'),(3,'supermegaaves@candles.com','3cdfa761361762ddedc01ea1428db10a92e327325f490f7f34f1b1b91d994f22','She/They','Aves','Fox','584-0237','2026-02-28 15:33:12','2026-02-28 15:33:12');
/*!40000 ALTER TABLE `candles_users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2026-02-28 11:21:29
