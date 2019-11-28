-- MySQL dump 10.13  Distrib 8.0.16, for Win64 (x86_64)
--
-- Host: localhost    Database: gauchorocket
-- ------------------------------------------------------
-- Server version	8.0.16

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
-- Table structure for table `cabina`
--

DROP TABLE IF EXISTS `cabina`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `cabina` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cabina`
--

LOCK TABLES `cabina` WRITE;
/*!40000 ALTER TABLE `cabina` DISABLE KEYS */;
INSERT INTO `cabina` VALUES (1,'General'),(2,'Familiar'),(3,'Suite');
/*!40000 ALTER TABLE `cabina` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `centro_medico`
--

DROP TABLE IF EXISTS `centro_medico`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `centro_medico` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `turnos` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `centro_medico`
--

LOCK TABLES `centro_medico` WRITE;
/*!40000 ALTER TABLE `centro_medico` DISABLE KEYS */;
INSERT INTO `centro_medico` VALUES (1,'Buenos Aires',300),(2,'Shangai',210),(3,'Ankara',200);
/*!40000 ALTER TABLE `centro_medico` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `client`
--

DROP TABLE IF EXISTS `client`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `client` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `tipo_cliente` int(11) DEFAULT NULL,
  `usuario` int(11) NOT NULL,
  `telefono` varchar(20) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `foto` varchar(20) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  PRIMARY KEY (`id`),
  KEY `tipo_cliente` (`tipo_cliente`),
  KEY `usuario` (`usuario`),
  CONSTRAINT `client_ibfk_1` FOREIGN KEY (`tipo_cliente`) REFERENCES `tipo_cliente` (`id`),
  CONSTRAINT `client_ibfk_2` FOREIGN KEY (`usuario`) REFERENCES `usuario` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `client`
--

LOCK TABLES `client` WRITE;
/*!40000 ALTER TABLE `client` DISABLE KEYS */;
INSERT INTO `client` VALUES (4,'Root',2,0,'11111111','','1994-08-27');
/*!40000 ALTER TABLE `client` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `locacion`
--

DROP TABLE IF EXISTS `locacion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `locacion` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `locacion`
--

LOCK TABLES `locacion` WRITE;
/*!40000 ALTER TABLE `locacion` DISABLE KEYS */;
INSERT INTO `locacion` VALUES (1,'EEI'),(2,'Luna'),(3,'Ganimedes'),(4,'Marte'),(5,'Io'),(6,'Encedalo'),(7,'Titan'),(8,'Buenos Aires'),(9,'Ankara');
/*!40000 ALTER TABLE `locacion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `modelo`
--

DROP TABLE IF EXISTS `modelo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `modelo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `tipo_vuelo` int(11) NOT NULL,
  `capacidad` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `tipo_vuelo` (`tipo_vuelo`),
  CONSTRAINT `modelo_ibfk_1` FOREIGN KEY (`tipo_vuelo`) REFERENCES `tipo_vuelo` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `modelo`
--

LOCK TABLES `modelo` WRITE;
/*!40000 ALTER TABLE `modelo` DISABLE KEYS */;
INSERT INTO `modelo` VALUES (1,'Calandria',1,300),(2,'Colibri',1,120),(3,'Zorzal',2,100),(4,'Carancho',2,110),(5,'Aguilucho',2,60),(6,'Canario',2,80),(7,'Aguila',3,300),(8,'Condor',3,350),(9,'Halcon',3,200),(10,'Guanaco',3,100);
/*!40000 ALTER TABLE `modelo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `modelo_cabina`
--

DROP TABLE IF EXISTS `modelo_cabina`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `modelo_cabina` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `modelo` int(11) NOT NULL,
  `cabina` int(11) NOT NULL,
  `capacidad` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `cabina` (`cabina`),
  KEY `modelo` (`modelo`),
  CONSTRAINT `modelo_cabina_ibfk_1` FOREIGN KEY (`cabina`) REFERENCES `cabina` (`id`),
  CONSTRAINT `modelo_cabina_ibfk_2` FOREIGN KEY (`modelo`) REFERENCES `modelo` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `modelo_cabina`
--

LOCK TABLES `modelo_cabina` WRITE;
/*!40000 ALTER TABLE `modelo_cabina` DISABLE KEYS */;
INSERT INTO `modelo_cabina` VALUES (1,1,1,200),(2,1,2,75),(3,1,3,25),(4,2,1,100),(5,2,2,18),(6,2,3,2),(7,3,1,50),(8,3,3,50),(9,4,1,110),(10,5,2,50),(11,5,3,10),(12,6,2,70),(13,6,3,10),(14,7,1,200),(15,7,2,75),(16,7,3,25),(17,8,1,300),(18,8,2,10),(19,8,3,40),(20,9,1,150),(21,9,2,25),(22,9,3,25),(23,10,3,100);
/*!40000 ALTER TABLE `modelo_cabina` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `nave`
--

DROP TABLE IF EXISTS `nave`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `nave` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `matricula` varchar(10) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `modelo` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `nave_ibfk_1` (`modelo`),
  CONSTRAINT `nave_ibfk_1` FOREIGN KEY (`modelo`) REFERENCES `modelo` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `nave`
--

LOCK TABLES `nave` WRITE;
/*!40000 ALTER TABLE `nave` DISABLE KEYS */;
INSERT INTO `nave` VALUES (1,'AA1',7),(2,'AA5',7),(3,'AA9',7),(4,'AA13',7),(5,'AA17',7),(6,'BA8',5),(7,'BA9',5),(8,'BA10',5),(9,'BA11',5),(10,'BA12',5),(11,'O1',1),(12,'O2',1),(13,'O6',1),(14,'O7',1),(15,'BA13',6),(16,'BA14',6),(17,'BA15',6),(18,'BA16',6),(19,'BA17',6),(20,'BA5',4),(21,'BA6',4),(22,'BA7',4),(23,'O3',2),(24,'O4',2),(25,'O5',2),(26,'O8',2),(27,'O9',2),(28,'AA2',8),(29,'AA6',8),(30,'AA10',8),(31,'AA14',8),(32,'AA18',8),(33,'AA4',10),(34,'AA8',10),(35,'AA12',10),(36,'AA16',10),(37,'AA3',9),(38,'AA7',9),(39,'AA11',9),(40,'AA15',9),(41,'AA19',9),(42,'BA1',3),(43,'BA2',3),(44,'BA3',3);
/*!40000 ALTER TABLE `nave` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pasaje`
--

DROP TABLE IF EXISTS `pasaje`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `pasaje` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `vuelo` int(11) unsigned NOT NULL,
  `cliente` int(11) NOT NULL,
  `reserva` tinyint(1) DEFAULT NULL,
  `fecha_reserva` datetime DEFAULT NULL,
  `checkin` tinyint(1) DEFAULT NULL,
  `fecha_checkin` datetime DEFAULT NULL,
  `compra` tinyint(1) DEFAULT NULL,
  `fecha_compra` datetime DEFAULT NULL,
  `codigo` varchar(10) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `precio` decimal(10,0) NOT NULL,
  `cabina` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `vuelo` (`vuelo`),
  KEY `cliente` (`cliente`),
  KEY `cabina` (`cabina`),
  CONSTRAINT `pasaje_ibfk_1` FOREIGN KEY (`vuelo`) REFERENCES `vuelo` (`id`),
  CONSTRAINT `pasaje_ibfk_2` FOREIGN KEY (`cliente`) REFERENCES `client` (`id`),
  CONSTRAINT `pasaje_ibfk_3` FOREIGN KEY (`cabina`) REFERENCES `cabina` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pasaje`
--

LOCK TABLES `pasaje` WRITE;
/*!40000 ALTER TABLE `pasaje` DISABLE KEYS */;
/*!40000 ALTER TABLE `pasaje` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pasaje_trayecto`
--

DROP TABLE IF EXISTS `pasaje_trayecto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `pasaje_trayecto` (
  `pasaje_id` int(11) NOT NULL,
  `trayecto_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`pasaje_id`,`trayecto_id`),
  KEY `trayecto_id_idx` (`trayecto_id`),
  CONSTRAINT `pasaje_id` FOREIGN KEY (`pasaje_id`) REFERENCES `pasaje` (`id`),
  CONSTRAINT `trayecto_id` FOREIGN KEY (`trayecto_id`) REFERENCES `trayecto` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pasaje_trayecto`
--

LOCK TABLES `pasaje_trayecto` WRITE;
/*!40000 ALTER TABLE `pasaje_trayecto` DISABLE KEYS */;
/*!40000 ALTER TABLE `pasaje_trayecto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipo_cliente`
--

DROP TABLE IF EXISTS `tipo_cliente`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `tipo_cliente` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tipo` tinyint(3) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipo_cliente`
--

LOCK TABLES `tipo_cliente` WRITE;
/*!40000 ALTER TABLE `tipo_cliente` DISABLE KEYS */;
INSERT INTO `tipo_cliente` VALUES (1,1),(2,2),(3,3);
/*!40000 ALTER TABLE `tipo_cliente` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipo_cliente_vuelo`
--

DROP TABLE IF EXISTS `tipo_cliente_vuelo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `tipo_cliente_vuelo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tipo_cliente` int(11) NOT NULL,
  `tipo_vuelo` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `tipo_cliente` (`tipo_cliente`),
  KEY `tipo_vuelo` (`tipo_vuelo`),
  CONSTRAINT `tipo_cliente_vuelo_ibfk_1` FOREIGN KEY (`tipo_cliente`) REFERENCES `tipo_cliente` (`id`),
  CONSTRAINT `tipo_cliente_vuelo_ibfk_2` FOREIGN KEY (`tipo_vuelo`) REFERENCES `tipo_vuelo` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipo_cliente_vuelo`
--

LOCK TABLES `tipo_cliente_vuelo` WRITE;
/*!40000 ALTER TABLE `tipo_cliente_vuelo` DISABLE KEYS */;
INSERT INTO `tipo_cliente_vuelo` VALUES (1,1,1),(2,1,2),(3,2,1),(4,2,2),(5,3,1),(6,3,2),(7,3,3);
/*!40000 ALTER TABLE `tipo_cliente_vuelo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipo_vuelo`
--

DROP TABLE IF EXISTS `tipo_vuelo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `tipo_vuelo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipo_vuelo`
--

LOCK TABLES `tipo_vuelo` WRITE;
/*!40000 ALTER TABLE `tipo_vuelo` DISABLE KEYS */;
INSERT INTO `tipo_vuelo` VALUES (1,'Orbital'),(2,'Baja Aceleracion'),(3,'Alta Aceleracion'),(4,'Entre destino');
/*!40000 ALTER TABLE `tipo_vuelo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `trayecto`
--

DROP TABLE IF EXISTS `trayecto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `trayecto` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `pasaje_id` int(11) NOT NULL,
  `origen` int(11) NOT NULL,
  PRIMARY KEY (`id`,`pasaje_id`),
  KEY `reserva_id_idx` (`pasaje_id`),
  KEY `origen_idx` (`origen`),
  CONSTRAINT `origen` FOREIGN KEY (`origen`) REFERENCES `locacion` (`id`),
  CONSTRAINT `pasaje` FOREIGN KEY (`pasaje_id`) REFERENCES `pasaje` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `trayecto`
--

LOCK TABLES `trayecto` WRITE;
/*!40000 ALTER TABLE `trayecto` DISABLE KEYS */;
/*!40000 ALTER TABLE `trayecto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `turno`
--

DROP TABLE IF EXISTS `turno`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `turno` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fecha` date NOT NULL,
  `cliente` int(11) NOT NULL,
  `centro_medico` int(11) NOT NULL,
  `asistencia` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `centro_medico` (`centro_medico`),
  KEY `cliente` (`cliente`),
  CONSTRAINT `turno_ibfk_1` FOREIGN KEY (`centro_medico`) REFERENCES `centro_medico` (`id`),
  CONSTRAINT `turno_ibfk_2` FOREIGN KEY (`cliente`) REFERENCES `client` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `turno`
--

LOCK TABLES `turno` WRITE;
/*!40000 ALTER TABLE `turno` DISABLE KEYS */;
INSERT INTO `turno` VALUES (5,'2019-11-30',4,1,NULL),(6,'2019-12-31',4,1,NULL),(7,'2019-10-22',4,1,NULL),(8,'2019-10-17',4,1,NULL),(9,'2019-10-11',4,1,NULL),(10,'2019-10-11',4,1,NULL),(11,'2019-10-11',4,1,NULL),(12,'2019-10-09',4,1,NULL),(13,'2019-10-10',4,1,NULL),(14,'2019-10-10',4,1,NULL),(15,'2019-10-03',4,1,NULL);
/*!40000 ALTER TABLE `turno` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuario`
--

DROP TABLE IF EXISTS `usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `user` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `password` varchar(1000) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario`
--

LOCK TABLES `usuario` WRITE;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` VALUES (0,'root','63a9f0ea7bb98050796b649e85481845');
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `vuelo`
--

DROP TABLE IF EXISTS `vuelo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `vuelo` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `origen` int(11) NOT NULL,
  `destino` int(11) NOT NULL,
  `duracion` int(11) NOT NULL,
  `nave` int(11) NOT NULL,
  `partida` date NOT NULL,
  `hora` time NOT NULL,
  PRIMARY KEY (`id`),
  KEY `origen` (`origen`),
  KEY `destino` (`destino`),
  KEY `vuelo_ibfk_3` (`nave`),
  CONSTRAINT `vuelo_ibfk_1` FOREIGN KEY (`origen`) REFERENCES `locacion` (`id`),
  CONSTRAINT `vuelo_ibfk_2` FOREIGN KEY (`destino`) REFERENCES `locacion` (`id`),
  CONSTRAINT `vuelo_ibfk_3` FOREIGN KEY (`nave`) REFERENCES `nave` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `vuelo`
--

LOCK TABLES `vuelo` WRITE;
/*!40000 ALTER TABLE `vuelo` DISABLE KEYS */;
INSERT INTO `vuelo` VALUES (2,8,2,8,1,'2019-11-01','00:00:00'),(3,9,2,8,4,'2019-11-01','00:00:00'),(4,2,8,8,1,'2019-11-08','00:00:00'),(5,2,9,8,4,'2019-11-08','00:00:00'),(6,8,2,8,30,'2019-11-01','13:00:00'),(7,8,2,8,3,'2019-11-01','05:00:00'),(8,2,8,8,7,'2019-11-08','06:00:00');
/*!40000 ALTER TABLE `vuelo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'gauchorocket'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-11-06  0:42:45
