-- MariaDB dump 10.19  Distrib 10.4.24-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: controlpanel
-- ------------------------------------------------------
-- Server version	10.4.24-MariaDB

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
-- Table structure for table `tb.control_transactions`
--

DROP TABLE IF EXISTS `tb.control_transactions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb.control_transactions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniqId` varchar(255) NOT NULL,
  `tipo-transacao` int(11) NOT NULL,
  `forma-pagamento` varchar(255) NOT NULL,
  `descricao` varchar(255) NOT NULL,
  `resp-transacao` varchar(255) NOT NULL,
  `amount` int(11) NOT NULL,
  `tipo-entrada` varchar(255) NOT NULL,
  `observacoes` text NOT NULL,
  `data-atual` date NOT NULL,
  `resp-responsavel` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb.control_transactions`
--

LOCK TABLES `tb.control_transactions` WRITE;
/*!40000 ALTER TABLE `tb.control_transactions` DISABLE KEYS */;
INSERT INTO `tb.control_transactions` VALUES (6,'1660843201926-_-4982529605778',0,'Dinheiro','aaa','Valdean Palmeira de Souza',5464,'','','2022-08-18','Valdean Souza');
/*!40000 ALTER TABLE `tb.control_transactions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb.control_user`
--

DROP TABLE IF EXISTS `tb.control_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb.control_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `themeMode` int(11) NOT NULL,
  `img` varchar(255) NOT NULL,
  `cargo` int(11) NOT NULL,
  PRIMARY KEY (`id`)
);
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb.control_user`
--

LOCK TABLES `tb.control_user` WRITE;
/*!40000 ALTER TABLE `tb.control_user` DISABLE KEYS */;
INSERT INTO `tb.control_user` VALUES (null,'valdean','VmFsZGVhbg==','Valdean Souza',0,'',2);
/*!40000 ALTER TABLE `tb.control_user` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-08-18 13:45:38
