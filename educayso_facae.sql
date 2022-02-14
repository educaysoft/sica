-- MySQL dump 10.13  Distrib 8.0.27, for Linux (x86_64)
--
-- Host: localhost    Database: educayso_facae
-- ------------------------------------------------------
-- Server version	8.0.27

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
-- Table structure for table `acceso`
--

DROP TABLE IF EXISTS `acceso`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `acceso` (
  `idacceso` int NOT NULL AUTO_INCREMENT,
  `idusuario` int unsigned NOT NULL,
  `idmodulo` int NOT NULL,
  `idnivelacceso` int NOT NULL,
  PRIMARY KEY (`idacceso`,`idusuario`,`idmodulo`,`idnivelacceso`),
  KEY `fk_acceso_usuario1_idx` (`idusuario`),
  KEY `fk_acceso_modulo1_idx` (`idmodulo`),
  KEY `fk_acceso_nivelacceso1_idx` (`idnivelacceso`),
  CONSTRAINT `fk_acceso_modulo1` FOREIGN KEY (`idmodulo`) REFERENCES `modulo` (`idmodulo`),
  CONSTRAINT `fk_acceso_nivelacceso1` FOREIGN KEY (`idnivelacceso`) REFERENCES `nivelacceso` (`idnivelacceso`),
  CONSTRAINT `fk_acceso_usuario1` FOREIGN KEY (`idusuario`) REFERENCES `usuario` (`idusuario`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `acceso`
--

LOCK TABLES `acceso` WRITE;
/*!40000 ALTER TABLE `acceso` DISABLE KEYS */;
INSERT INTO `acceso` VALUES (3,4,1,2),(5,4,4,2),(6,4,5,2),(7,4,6,2),(30,4,3,2),(1,6,1,2),(2,6,2,2),(4,6,3,2),(8,8,1,2),(9,8,6,2),(10,8,5,2),(11,8,7,2),(12,8,8,2),(13,8,9,2),(14,8,10,2),(15,8,11,2),(16,8,12,2),(22,8,15,2),(17,10,13,2),(18,10,5,2),(19,10,11,2),(20,10,12,2),(21,11,14,2),(23,11,16,2),(25,11,8,2),(26,11,17,2),(27,11,18,2),(28,11,19,2),(29,11,5,2),(31,11,21,2),(32,11,1,2),(33,11,22,2),(34,11,23,2),(35,11,24,2),(24,12,16,2);
/*!40000 ALTER TABLE `acceso` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary view structure for view `acceso1`
--

DROP TABLE IF EXISTS `acceso1`;
/*!50001 DROP VIEW IF EXISTS `acceso1`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `acceso1` AS SELECT 
 1 AS `idusuario`,
 1 AS `idacceso`,
 1 AS `elusuario`,
 1 AS `idmodulo`,
 1 AS `elmodulo`,
 1 AS `idnivelacceso`,
 1 AS `elnivelacceso`*/;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `articulo`
--

DROP TABLE IF EXISTS `articulo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `articulo` (
  `idarticulo` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) DEFAULT NULL,
  `detalle` varchar(200) DEFAULT NULL,
  `idinstitucion` int NOT NULL,
  `idcategoria` int NOT NULL,
  PRIMARY KEY (`idarticulo`,`idcategoria`),
  KEY `fk_articulo_institucion1_idx` (`idinstitucion`),
  KEY `fk_articulo_categoria1_idx` (`idcategoria`),
  CONSTRAINT `fk_articulo_categoria1` FOREIGN KEY (`idcategoria`) REFERENCES `categoria` (`idcategoria`),
  CONSTRAINT `fk_articulo_institucion1` FOREIGN KEY (`idinstitucion`) REFERENCES `institucion` (`idinstitucion`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `articulo`
--

LOCK TABLES `articulo` WRITE;
/*!40000 ALTER TABLE `articulo` DISABLE KEYS */;
INSERT INTO `articulo` VALUES (1,'CINTURON BLANCO DE CHRISTOPHER','CINTURON BLANCO COGIO 001',3,1),(2,'CINTURON BLANCO DE STALIN','EL CINTURON BLANDO QUE SE LE DIO A STALIN',3,0),(3,'CINTURO BLANDO DE CHRISTIAN','EL CINTURON BLANDO QUE SE LE DIO A CHRISTIAN',3,0),(4,'CAJA MAGICA CORAZON','CAJA MAGICA CORAZON DE COLOR ROJO',4,1);
/*!40000 ALTER TABLE `articulo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary view structure for view `articulo1`
--

DROP TABLE IF EXISTS `articulo1`;
/*!50001 DROP VIEW IF EXISTS `articulo1`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `articulo1` AS SELECT 
 1 AS `idarticulo`,
 1 AS `idinstitucion`,
 1 AS `lainstitucion`,
 1 AS `nombre`*/;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `ascenso`
--

DROP TABLE IF EXISTS `ascenso`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ascenso` (
  `idascenso` int NOT NULL AUTO_INCREMENT,
  `idcliente` int NOT NULL,
  `idevento` int NOT NULL,
  `idcinturon` int NOT NULL,
  PRIMARY KEY (`idascenso`,`idcliente`,`idevento`,`idcinturon`),
  KEY `fk_ascenso_cliente1_idx` (`idcliente`),
  KEY `fk_ascenso_evento1_idx` (`idevento`),
  KEY `fk_ascenso_cinturon1_idx` (`idcinturon`),
  CONSTRAINT `fk_ascenso_cinturon1` FOREIGN KEY (`idcinturon`) REFERENCES `cinturon` (`idcinturon`),
  CONSTRAINT `fk_ascenso_cliente1` FOREIGN KEY (`idcliente`) REFERENCES `cliente` (`idcliente`),
  CONSTRAINT `fk_ascenso_evento1` FOREIGN KEY (`idevento`) REFERENCES `evento` (`idevento`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ascenso`
--

LOCK TABLES `ascenso` WRITE;
/*!40000 ALTER TABLE `ascenso` DISABLE KEYS */;
INSERT INTO `ascenso` VALUES (1,2,4,1);
/*!40000 ALTER TABLE `ascenso` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `asignatura`
--

DROP TABLE IF EXISTS `asignatura`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `asignatura` (
  `idasignatura` int NOT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `creditos` int DEFAULT NULL,
  PRIMARY KEY (`idasignatura`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `asignatura`
--

LOCK TABLES `asignatura` WRITE;
/*!40000 ALTER TABLE `asignatura` DISABLE KEYS */;
/*!40000 ALTER TABLE `asignatura` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categoria`
--

DROP TABLE IF EXISTS `categoria`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `categoria` (
  `idcategoria` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idcategoria`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categoria`
--

LOCK TABLES `categoria` WRITE;
/*!40000 ALTER TABLE `categoria` DISABLE KEYS */;
INSERT INTO `categoria` VALUES (1,'NO ASIGNADO');
/*!40000 ALTER TABLE `categoria` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `certificado`
--

DROP TABLE IF EXISTS `certificado`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `certificado` (
  `idcertificado` int NOT NULL AUTO_INCREMENT,
  `archivo` varchar(100) DEFAULT NULL,
  `propietario` varchar(50) DEFAULT NULL,
  `ubicacion` varchar(100) DEFAULT NULL,
  `evento` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`idcertificado`)
) ENGINE=InnoDB AUTO_INCREMENT=1311 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `certificado`
--

LOCK TABLES `certificado` WRITE;
/*!40000 ALTER TABLE `certificado` DISABLE KEYS */;
INSERT INTO `certificado` VALUES (1,'Certificado de Alex Gabriel Quispe Mera.pdf',NULL,'http://congresoutlvte.org/facped/Repositorio/Certificados/PonentesNacionales/',NULL),(2,'Certificado de Alfredo Nicolas Tenorio Obregón.pdf',NULL,'http://congresoutlvte.org/facped/Repositorio/Certificados/PonentesNacionales/',NULL),(3,'Certificado de Alfredo Nicolas Tenorio O.pdf',NULL,'http://congresoutlvte.org/facped/Repositorio/Certificados/PonentesNacionales/',NULL),(4,'Certificado de Ana Bedoya Gutierrez.pdf',NULL,'http://congresoutlvte.org/facped/Repositorio/Certificados/PonentesNacionales/',NULL),(5,'Certificado de Ana Carminea Bedoya Gutierrez.pdf',NULL,'http://congresoutlvte.org/facped/Repositorio/Certificados/PonentesNacionales/',NULL),(6,'Certificado de Andrea Cortes Gutierrez.pdf',NULL,'http://congresoutlvte.org/facped/Repositorio/Certificados/PonentesNacionales/',NULL),(7,'Certificado de Arturo Jose Roby Nivelo.pdf',NULL,'http://congresoutlvte.org/facped/Repositorio/Certificados/PonentesNacionales/',NULL),(8,'Certificado de Carla Bernal Villavicencio.pdf',NULL,'http://congresoutlvte.org/facped/Repositorio/Certificados/PonentesNacionales/',NULL),(9,'Certificado de Carlos Bruno Jaime.pdf',NULL,'http://congresoutlvte.org/facped/Repositorio/Certificados/PonentesNacionales/',NULL),(10,'Certificado de Carlos Simon Plata Cabrera.pdf',NULL,'http://congresoutlvte.org/facped/Repositorio/Certificados/PonentesNacionales/',NULL),(11,'Certificado de Carmen Karina Hurtado Toral.pdf',NULL,'http://congresoutlvte.org/facped/Repositorio/Certificados/PonentesNacionales/',NULL),(12,'Certificado de Cecilia Mariana Ulloa E.pdf',NULL,'http://congresoutlvte.org/facped/Repositorio/Certificados/PonentesNacionales/',NULL),(13,'Certificado de Cecilia Mariana Ulloa Espinoza.pdf',NULL,'http://congresoutlvte.org/facped/Repositorio/Certificados/PonentesNacionales/',NULL),(14,'Certificado de Celia Batalla Benavides.pdf',NULL,'http://congresoutlvte.org/facped/Repositorio/Certificados/PonentesNacionales/',NULL),(15,'Certificado de Celia Veronica Batalla Benavides.pdf',NULL,'http://congresoutlvte.org/facped/Repositorio/Certificados/PonentesNacionales/',NULL),(16,'Certificado de Celia Veronica Batalla B.pdf',NULL,'http://congresoutlvte.org/facped/Repositorio/Certificados/PonentesNacionales/',NULL),(17,'Certificado de Diego Hurtado.pdf',NULL,'http://congresoutlvte.org/facped/Repositorio/Certificados/PonentesNacionales/',NULL),(18,'Certificado de Ena Alexandra Diaz Iturre.pdf',NULL,'http://congresoutlvte.org/facped/Repositorio/Certificados/PonentesNacionales/',NULL),(19,'Certificado de Enma Elena Espinoza Echeverria.pdf',NULL,'http://congresoutlvte.org/facped/Repositorio/Certificados/PonentesNacionales/',NULL),(20,'Certificado de Evelyn Perea Rodríguez.pdf',NULL,'http://congresoutlvte.org/facped/Repositorio/Certificados/PonentesNacionales/',NULL),(21,'Certificado de Fausto Ivan Guapi Guaman.pdf',NULL,'http://congresoutlvte.org/facped/Repositorio/Certificados/PonentesNacionales/',NULL),(22,'Certificado de Fernando Teofilo Fernandez Rodriguez .pdf',NULL,'http://congresoutlvte.org/facped/Repositorio/Certificados/PonentesNacionales/',NULL),(23,'Certificado de Fernando Teofilo Fernandez R.pdf',NULL,'http://congresoutlvte.org/facped/Repositorio/Certificados/PonentesNacionales/',NULL),(24,'Certificado de Francisco Angel Simon Ricardo.pdf',NULL,'http://congresoutlvte.org/facped/Repositorio/Certificados/PonentesNacionales/',NULL),(25,'Certificado de Gaby A Arroyo Preciado.pdf',NULL,'http://congresoutlvte.org/facped/Repositorio/Certificados/PonentesNacionales/',NULL),(26,'Certificado de Gaby Adelaida Arroyo Preciado.pdf',NULL,'http://congresoutlvte.org/facped/Repositorio/Certificados/PonentesNacionales/',NULL),(27,'Certificado de Henry Javier Renteria Macias.pdf',NULL,'http://congresoutlvte.org/facped/Repositorio/Certificados/PonentesNacionales/',NULL),(28,'Certificado de Henry Renteria Macias.pdf',NULL,'http://congresoutlvte.org/facped/Repositorio/Certificados/PonentesNacionales/',NULL),(29,'Certificado de Hernan Chila Ortiz.pdf',NULL,'http://congresoutlvte.org/facped/Repositorio/Certificados/PonentesNacionales/',NULL),(30,'Certificado de Hernan Chila.pdf',NULL,'http://congresoutlvte.org/facped/Repositorio/Certificados/PonentesNacionales/',NULL),(31,'Certificado de Hugo David Tapia Sosa-1er Congreso.pdf',NULL,'http://congresoutlvte.org/facped/Repositorio/Certificados/PonentesNacionales/',NULL),(32,'Certificado de Isabel Clavijo Robinson.pdf',NULL,'http://congresoutlvte.org/facped/Repositorio/Certificados/PonentesNacionales/',NULL),(33,'Certificado de Isabel Veronica Clavijo Robinson.pdf',NULL,'http://congresoutlvte.org/facped/Repositorio/Certificados/PonentesNacionales/',NULL),(34,'Certificado de Jeimy Hernandez Martinez.pdf',NULL,'http://congresoutlvte.org/facped/Repositorio/Certificados/PonentesNacionales/',NULL),(35,'Certificado de Jenny Johanna Palacios Gonzalez.pdf',NULL,'http://congresoutlvte.org/facped/Repositorio/Certificados/PonentesNacionales/',NULL),(36,'Certificado de Jenny Margarita Valverde Medina.pdf',NULL,'http://congresoutlvte.org/facped/Repositorio/Certificados/PonentesNacionales/',NULL),(37,'Certificado de Jessica Marquez Ramirez.pdf',NULL,'http://congresoutlvte.org/facped/Repositorio/Certificados/PonentesNacionales/',NULL),(38,'Certificado de Jimmy Fernando Ramirez Marquez.pdf',NULL,'http://congresoutlvte.org/facped/Repositorio/Certificados/PonentesNacionales/',NULL),(39,'Certificado de Joseph Cruel Siguenza.pdf',NULL,'http://congresoutlvte.org/facped/Repositorio/Certificados/PonentesNacionales/',NULL),(40,'Certificado de Juan Tacoronte Morales.pdf',NULL,'http://congresoutlvte.org/facped/Repositorio/Certificados/PonentesNacionales/',NULL),(41,'Certificado de Kelly Estrada Realpe .pdf',NULL,'http://congresoutlvte.org/facped/Repositorio/Certificados/PonentesNacionales/',NULL),(42,'Certificado de Leonel Aldana Naranjo.pdf',NULL,'http://congresoutlvte.org/facped/Repositorio/Certificados/PonentesNacionales/',NULL),(43,'Certificado de Luis Estupiñan Rodriguez.pdf',NULL,'http://congresoutlvte.org/facped/Repositorio/Certificados/PonentesNacionales/',NULL),(44,'Certificado de Maria Isabel Vallejo Cardenas.pdf',NULL,'http://congresoutlvte.org/facped/Repositorio/Certificados/PonentesNacionales/',NULL),(45,'Certificado de Maria Paula Villa Lujano.pdf',NULL,'http://congresoutlvte.org/facped/Repositorio/Certificados/PonentesNacionales/',NULL),(46,'Certificado de Marianela Acuña Ortigosa.pdf',NULL,'http://congresoutlvte.org/facped/Repositorio/Certificados/PonentesNacionales/',NULL),(47,'Certificado de Marisol Morales Martinez .pdf',NULL,'http://congresoutlvte.org/facped/Repositorio/Certificados/PonentesNacionales/',NULL),(48,'Certificado de Martin Mateo Ramirez Marquez.pdf',NULL,'http://congresoutlvte.org/facped/Repositorio/Certificados/PonentesNacionales/',NULL),(49,'Certificado de Mercedes Bustos Gamez.pdf',NULL,'http://congresoutlvte.org/facped/Repositorio/Certificados/PonentesNacionales/',NULL),(50,'Certificado de Miryan Veronica Vera Mera.pdf',NULL,'http://congresoutlvte.org/facped/Repositorio/Certificados/PonentesNacionales/',NULL),(51,'Certificado de Monica Tatiana Tonato Velasco.pdf',NULL,'http://congresoutlvte.org/facped/Repositorio/Certificados/PonentesNacionales/',NULL),(52,'Certificado de Nelly del Rocio Panchano.pdf',NULL,'http://congresoutlvte.org/facped/Repositorio/Certificados/PonentesNacionales/',NULL),(53,'Certificado de Olga Quiñonez Guagua.pdf',NULL,'http://congresoutlvte.org/facped/Repositorio/Certificados/PonentesNacionales/',NULL),(54,'Certificado de Patricia M Lujano Meza.pdf',NULL,'http://congresoutlvte.org/facped/Repositorio/Certificados/PonentesNacionales/',NULL),(55,'Certificado de Patricia Margarita Lujano Meza.pdf',NULL,'http://congresoutlvte.org/facped/Repositorio/Certificados/PonentesNacionales/',NULL),(56,'Certificado de Pedro Cesar Godoy Roser.pdf',NULL,'http://congresoutlvte.org/facped/Repositorio/Certificados/PonentesNacionales/',NULL),(57,'Certificado de Rita Leivis Bolaños Mosquera.pdf',NULL,'http://congresoutlvte.org/facped/Repositorio/Certificados/PonentesNacionales/',NULL),(58,'Certificado de Santa Rocio Toala Ponce.pdf',NULL,'http://congresoutlvte.org/facped/Repositorio/Certificados/PonentesNacionales/',NULL),(59,'Certificado de Santos Geovanny Mina Bone.pdf',NULL,'http://congresoutlvte.org/facped/Repositorio/Certificados/PonentesNacionales/',NULL),(60,'Certificado de Sara Elizabeth Tenorio Segura.pdf',NULL,'http://congresoutlvte.org/facped/Repositorio/Certificados/PonentesNacionales/',NULL),(61,'Certificado de Sergio Guzman Garcia Sanclemente.pdf',NULL,'http://congresoutlvte.org/facped/Repositorio/Certificados/PonentesNacionales/',NULL),(62,'Certificado de Tunin Gilmar Murillo andrade.pdf',NULL,'http://congresoutlvte.org/facped/Repositorio/Certificados/PonentesNacionales/',NULL),(63,'Certificado de Victor Eduardo Quispe Mera.pdf',NULL,'http://congresoutlvte.org/facped/Repositorio/Certificados/PonentesNacionales/',NULL),(64,'Certificado de Victor Manuel Arroyo Quiñonez.pdf',NULL,'http://congresoutlvte.org/facped/Repositorio/Certificados/PonentesNacionales/',NULL),(65,'Certificado de Wendy  Santos Marquez.pdf',NULL,'http://congresoutlvte.org/facped/Repositorio/Certificados/PonentesNacionales/',NULL),(66,'Certificado de Wendy Narcisa Santos Marquez.pdf',NULL,'http://congresoutlvte.org/facped/Repositorio/Certificados/PonentesNacionales/',NULL),(67,'Certificado de Xiomara Grueso Guerrero.pdf',NULL,'http://congresoutlvte.org/facped/Repositorio/Certificados/PonentesNacionales/',NULL),(68,'Certificado de Alberto Renato Tambaco Quintero.pdf',NULL,'http://congresoutlvte.org/facped/Repositorio/Certificados/DocentesParticipantes/',NULL),(69,'Certificado de Alejandro Andres Marquez Quiñonez.pdf',NULL,'http://congresoutlvte.org/facped/Repositorio/Certificados/DocentesParticipantes/',NULL),(70,'Certificado de Alicia Caicedo Hurtado.pdf',NULL,'http://congresoutlvte.org/facped/Repositorio/Certificados/DocentesParticipantes/',NULL),(71,'Certificado de Alicia Magdalena Suarez Jijon.pdf',NULL,'http://congresoutlvte.org/facped/Repositorio/Certificados/DocentesParticipantes/',NULL),(72,'Certificado de Amalia Paula Angulo Caicedo.pdf',NULL,'http://congresoutlvte.org/facped/Repositorio/Certificados/DocentesParticipantes/',NULL),(73,'Certificado de Angy Brigitte Gruezo Espinoza.pdf',NULL,'http://congresoutlvte.org/facped/Repositorio/Certificados/DocentesParticipantes/',NULL),(74,'Certificado de Ariel Angel Angulo Quiñonez.pdf',NULL,'http://congresoutlvte.org/facped/Repositorio/Certificados/DocentesParticipantes/',NULL),(75,'Certificado de Belen Amador Rodriguez.pdf',NULL,'http://congresoutlvte.org/facped/Repositorio/Certificados/DocentesParticipantes/',NULL),(76,'Certificado de Carlos Ivan Realpe Camacho.pdf',NULL,'http://congresoutlvte.org/facped/Repositorio/Certificados/DocentesParticipantes/',NULL),(77,'Certificado de Carmen Laura Bone Medina.pdf',NULL,'http://congresoutlvte.org/facped/Repositorio/Certificados/DocentesParticipantes/',NULL),(78,'Certificado de Carmen Lila Casierra Castro.pdf',NULL,'http://congresoutlvte.org/facped/Repositorio/Certificados/DocentesParticipantes/',NULL),(79,'Certificado de Cristobal Colon Bone Obando.pdf',NULL,'http://congresoutlvte.org/facped/Repositorio/Certificados/DocentesParticipantes/',NULL),(80,'Certificado de Duvay Gerardo Carrillo Perdomo.pdf',NULL,'http://congresoutlvte.org/facped/Repositorio/Certificados/DocentesParticipantes/',NULL),(81,'Certificado de Elizabeth del Rocio Falcones Barbosa.pdf',NULL,'http://congresoutlvte.org/facped/Repositorio/Certificados/DocentesParticipantes/',NULL),(82,'Certificado de Elsa Cecilia Quiñonez Ortiz.pdf',NULL,'http://congresoutlvte.org/facped/Repositorio/Certificados/DocentesParticipantes/',NULL),(83,'Certificado de Erika Gina Ortiz Diaz.pdf',NULL,'http://congresoutlvte.org/facped/Repositorio/Certificados/DocentesParticipantes/',NULL),(84,'Certificado de Ermel Efrain Capurro Tapia.pdf',NULL,'http://congresoutlvte.org/facped/Repositorio/Certificados/DocentesParticipantes/',NULL),(85,'Certificado de Fanny Natividad Chanatasig Arcos.pdf',NULL,'http://congresoutlvte.org/facped/Repositorio/Certificados/DocentesParticipantes/',NULL),(86,'Certificado de Gilbert Nazareno Vivero.pdf',NULL,'http://congresoutlvte.org/facped/Repositorio/Certificados/DocentesParticipantes/',NULL),(87,'Certificado de Gissela Medina Cruz.pdf',NULL,'http://congresoutlvte.org/facped/Repositorio/Certificados/DocentesParticipantes/',NULL),(88,'Certificado de Ivan Alejandro Abad Rivera.pdf',NULL,'http://congresoutlvte.org/facped/Repositorio/Certificados/DocentesParticipantes/',NULL),(89,'Certificado de Ivette Kennia Montaño Salazar.pdf',NULL,'http://congresoutlvte.org/facped/Repositorio/Certificados/DocentesParticipantes/',NULL),(90,'Certificado de Jasmin Monserrate Druet Carvajal.pdf',NULL,'http://congresoutlvte.org/facped/Repositorio/Certificados/DocentesParticipantes/',NULL),(91,'Certificado de Jenny Antonieta Méndez Vivar.pdf',NULL,'http://congresoutlvte.org/facped/Repositorio/Certificados/DocentesParticipantes/',NULL),(92,'Certificado de Jose Gerardo Cortez Narvaez.pdf',NULL,'http://congresoutlvte.org/facped/Repositorio/Certificados/DocentesParticipantes/',NULL),(93,'Certificado de Juan Guillermo Rivas Rosero.pdf',NULL,'http://congresoutlvte.org/facped/Repositorio/Certificados/DocentesParticipantes/',NULL),(94,'Certificado de Juan Manuel Palma Salazar.pdf',NULL,'http://congresoutlvte.org/facped/Repositorio/Certificados/DocentesParticipantes/',NULL),(95,'Certificado de Julio Cesar Callaveral Angulo.pdf',NULL,'http://congresoutlvte.org/facped/Repositorio/Certificados/DocentesParticipantes/',NULL),(96,'Certificado de Karla Vanessa Carvajal Arroyo.pdf',NULL,'http://congresoutlvte.org/facped/Repositorio/Certificados/DocentesParticipantes/',NULL),(97,'Certificado de Ladymar Juliana Castro Rodriguez.pdf',NULL,'http://congresoutlvte.org/facped/Repositorio/Certificados/DocentesParticipantes/',NULL),(98,'Certificado de Laura Estefania Baes Rodriguez.pdf',NULL,'http://congresoutlvte.org/facped/Repositorio/Certificados/DocentesParticipantes/',NULL),(99,'Certificado de Leidy Virginia Realpe Rosero.pdf',NULL,'http://congresoutlvte.org/facped/Repositorio/Certificados/DocentesParticipantes/',NULL),(100,'Certificado de Leoaysa Priscila Ortiz Delgado.pdf',NULL,'http://congresoutlvte.org/facped/Repositorio/Certificados/DocentesParticipantes/',NULL),(101,'Certificado de Liliana Lourdes Franco Andrade.pdf',NULL,'http://congresoutlvte.org/facped/Repositorio/Certificados/DocentesParticipantes/',NULL),(102,'Certificado de Lizardo Ciro Chasing Reyna.pdf',NULL,'http://congresoutlvte.org/facped/Repositorio/Certificados/DocentesParticipantes/',NULL),(103,'Certificado de Lucia Germania Chavez Ruano.pdf',NULL,'http://congresoutlvte.org/facped/Repositorio/Certificados/DocentesParticipantes/',NULL),(104,'Certificado de Ludys Yoconda Gomez Pinillo.pdf',NULL,'http://congresoutlvte.org/facped/Repositorio/Certificados/DocentesParticipantes/',NULL),(105,'Certificado de Luis Alberto Diaz Lerma.pdf',NULL,'http://congresoutlvte.org/facped/Repositorio/Certificados/DocentesParticipantes/',NULL),(106,'Certificado de Mabel Orlanda Sanchez Mirana.pdf',NULL,'http://congresoutlvte.org/facped/Repositorio/Certificados/DocentesParticipantes/',NULL),(107,'Certificado de Marco Antonio Villavicencio Iñamagua.pdf',NULL,'http://congresoutlvte.org/facped/Repositorio/Certificados/DocentesParticipantes/',NULL),(108,'Certificado de Margarita Yisel Caicedo Arroyo.pdf',NULL,'http://congresoutlvte.org/facped/Repositorio/Certificados/DocentesParticipantes/',NULL),(109,'Certificado de Maria de Lourdes Quiñonez Araujo.pdf',NULL,'http://congresoutlvte.org/facped/Repositorio/Certificados/DocentesParticipantes/',NULL),(110,'Certificado de Maria Elena Peña Peña.pdf',NULL,'http://congresoutlvte.org/facped/Repositorio/Certificados/DocentesParticipantes/',NULL),(111,'Certificado de Maria Mercedes Cedeño Cortez.pdf',NULL,'http://congresoutlvte.org/facped/Repositorio/Certificados/DocentesParticipantes/',NULL),(112,'Certificado de Mauricio Edmundo Ojeda Morán.pdf',NULL,'http://congresoutlvte.org/facped/Repositorio/Certificados/DocentesParticipantes/',NULL),(113,'Certificado de Mercedes Preciado Trejo.pdf',NULL,'http://congresoutlvte.org/facped/Repositorio/Certificados/DocentesParticipantes/',NULL),(114,'Certificado de Mirtha Lorena Aguilar Mora .pdf',NULL,'http://congresoutlvte.org/facped/Repositorio/Certificados/DocentesParticipantes/',NULL),(115,'Certificado de Nilo Alberto Benavides Solis.pdf',NULL,'http://congresoutlvte.org/facped/Repositorio/Certificados/DocentesParticipantes/',NULL),(116,'Certificado de Norma Beatriz Lara Riera.pdf',NULL,'http://congresoutlvte.org/facped/Repositorio/Certificados/DocentesParticipantes/',NULL),(117,'Certificado de Patricia Jacqueline Mendoza Cortez.pdf',NULL,'http://congresoutlvte.org/facped/Repositorio/Certificados/DocentesParticipantes/',NULL),(118,'Certificado de Raquel Noemi Guevara Heredia.pdf',NULL,'http://congresoutlvte.org/facped/Repositorio/Certificados/DocentesParticipantes/',NULL),(119,'Certificado de Rocio Pilar Cuero Ortiz.pdf',NULL,'http://congresoutlvte.org/facped/Repositorio/Certificados/DocentesParticipantes/',NULL),(120,'Certificado de Ruben Dario Angulo Quiñonez.pdf',NULL,'http://congresoutlvte.org/facped/Repositorio/Certificados/DocentesParticipantes/',NULL),(121,'Certificado de Sara Noemi Zapata Moreira.pdf',NULL,'http://congresoutlvte.org/facped/Repositorio/Certificados/DocentesParticipantes/',NULL),(122,'Certificado de Sayda Janeth Palma Perea.pdf',NULL,'http://congresoutlvte.org/facped/Repositorio/Certificados/DocentesParticipantes/',NULL),(123,'Certificado de Sonia Holguin Mendoza.pdf',NULL,'http://congresoutlvte.org/facped/Repositorio/Certificados/DocentesParticipantes/',NULL),(124,'Certificado de Teofila Abigail Nazareno Ortiz.pdf',NULL,'http://congresoutlvte.org/facped/Repositorio/Certificados/DocentesParticipantes/',NULL),(125,'Certificado de Tunin Gilmar Murillo Andrade.pdf',NULL,'http://congresoutlvte.org/facped/Repositorio/Certificados/DocentesParticipantes/',NULL),(126,'Certificado de Vanessa Leonela Mideros Quiñonez.pdf',NULL,'http://congresoutlvte.org/facped/Repositorio/Certificados/DocentesParticipantes/',NULL),(127,'Certificado de Veronica Leonor Cadena Cortez.pdf',NULL,'http://congresoutlvte.org/facped/Repositorio/Certificados/DocentesParticipantes/',NULL),(128,'Certificado de Vilma Viviana Garcia Caicedo.pdf',NULL,'http://congresoutlvte.org/facped/Repositorio/Certificados/DocentesParticipantes/',NULL),(129,'Certificado de Viviana Vanessa Aparicio Izurieta.pdf',NULL,'http://congresoutlvte.org/facped/Repositorio/Certificados/DocentesParticipantes/',NULL),(130,'Certificado de Wiston Clemente Monrroy Quiñonez.pdf',NULL,'http://congresoutlvte.org/facped/Repositorio/Certificados/DocentesParticipantes/',NULL),(131,'Certificado de Yaquelin Caicedo Ñañez.pdf',NULL,'http://congresoutlvte.org/facped/Repositorio/Certificados/DocentesParticipantes/',NULL),(132,'Certificado de Yisela Monserrate Moreira Guerrero.pdf',NULL,'http://congresoutlvte.org/facped/Repositorio/Certificados/DocentesParticipantes/',NULL),(133,'ESTC-1000.pdf','Rosales Mero Raquel Noemi','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(134,'ESTC-1001.pdf','Rosales Sarria Suany Elizabeth','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(135,'ESTC-1002.pdf','Rosales segura ibonne VERNARDA','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(136,'ESTC-1003.pdf','Rossmery Becerra Cabezas','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(137,'ESTC-1004.pdf','Ruano Bustos Fricson Ricardo','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(138,'ESTC-1005.pdf','Ruano Cortez Erika Julissa','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(139,'ESTC-1006.pdf','RUGEL CHICA YULLY PATRICIA','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(140,'ESTC-1007.pdf','Ruiz Chiluisa Cristina','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(141,'ESTC-1008.pdf','Saavedra Castillo Thais Eduarda','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(142,'ESTC-1009.pdf','Saavedra Montaño Aishle Joyce','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(143,'ESTC-100.pdf','DAYRA ELIZABETH GONGORA MENDEZ','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(144,'ESTC-1010.pdf','Salazar Mosquera Maritza','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(145,'ESTC-1011.pdf','Salazar Reyes Xiomara Albertina','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(146,'ESTC-1012.pdf','Salazar Sánchez Janeth María','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(147,'ESTC-1013.pdf','Salazar Sánchez Janeth María','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(148,'ESTC-1014.pdf','Salazar Tuarez Diana Sandra','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(149,'ESTC-1015.pdf','Salcedo Bone Ariana Mayerli','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(150,'ESTC-1016.pdf','Salomón Mercado Nicole Patricia','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(151,'ESTC-1017.pdf','Samande Alava Saskya Layla','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(152,'ESTC-1018.pdf','San Nicolas Medina Klairet Alexandra','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(153,'ESTC-1019.pdf','San Nicolas Medina yovy Nimia','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(154,'ESTC-101.pdf','LUCY MAIRA BORJA GRUEZO','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(155,'ESTC-1020.pdf','Sanchez Angulo Rita Eleana','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(156,'ESTC-1021.pdf','SANCHEZ CAGUA BELEN DEL ROCIO','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(157,'ESTC-1022.pdf','Sanchez Govea Gimabel Viviana','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(158,'ESTC-1023.pdf','Sánchez Guevara Annisa Noemi','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(159,'ESTC-1024.pdf','Sandoval Chanaluisa Pedro Luis','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(160,'ESTC-1025.pdf','Sandoval Chanaluisa Pedro Luis','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(161,'ESTC-1026.pdf','Santa Verónica Samaniego Tamayo','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(162,'ESTC-1027.pdf','Santamaria Torres Karol Mishelle','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(163,'ESTC-1028.pdf','Santana Midero Mell Milena','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(164,'ESTC-1029.pdf','Santillán Candela Landy Nathaly','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(165,'ESTC-102.pdf','JAYSA JAMILETH FARIAS MALAT','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(166,'ESTC-1030.pdf','Santillán Mazo Karla Paola','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(167,'ESTC-1031.pdf','Santos González Margarita Yasmin','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(168,'ESTC-1032.pdf','Sara Tello Renteria','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(169,'ESTC-1033.pdf','Sarmiento Ordoñez Elizabeth Edith','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(170,'ESTC-1034.pdf','Sarmiento Ordoñez Kimberly','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(171,'ESTC-1035.pdf','Segovia Lopez Armenia Alisson','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(172,'ESTC-1036.pdf','Segovia Lopez Magerly Nohelia','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(173,'ESTC-1037.pdf','Segura Farias Gema Maite','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(174,'ESTC-1038.pdf','Segura Guerrero Silvia Dayana','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(175,'ESTC-1039.pdf','Segura Iturre Mirka Dayanara','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(176,'ESTC-103.pdf','ALIDA NARCISA ALCIVAR HERNANDEZ','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(177,'ESTC-1040.pdf','Sevilla cortes kelly','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(178,'ESTC-1041.pdf','Sevillano Gonzales Gladys Mirella','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(179,'ESTC-1042.pdf','Sheila Lisbeth Mero Alarcón','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(180,'ESTC-1043.pdf','Sifuentes Sol Nagelly Vanessa','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(181,'ESTC-1044.pdf','SIMISTERRA QUINTERO KEVIN JOSUE','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(182,'ESTC-1045.pdf','Sol Cheme Angie Gabriela','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(183,'ESTC-1046.pdf','Solis Tenorio Doris Elizabeth','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(184,'ESTC-1047.pdf','Solorzano Bravo yuleisy Vanessa','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(185,'ESTC-1048.pdf','Solorzano Navarrete Shanlly Nayely','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(186,'ESTC-1049.pdf','Soto Mera Carla Michelle','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(187,'ESTC-104.pdf','KATHERIN JULISSA JAMA DEL CASTILLO','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(188,'ESTC-1050.pdf','SUAREZ BRIONES MARCO VINICIO','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(189,'ESTC-1051.pdf','Suarez Caicedo Yasuri Dayana','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(190,'ESTC-1052.pdf','Sulema Roselly Cabezas Chasing','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(191,'ESTC-1053.pdf','Susana Isabel Saldarriaga Quintero','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(192,'ESTC-1054.pdf','Tafur Cagua Jonathan Eduardo','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(193,'ESTC-1055.pdf','Tafur Cagua Jonathan Eduardo','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(194,'ESTC-1056.pdf','Tafur Portez Fiama Zuleika','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(195,'ESTC-1057.pdf','Tapasco Chicaiza Nathalia Andrea','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(196,'ESTC-1058.pdf','Tapia Jama Karelis Estefania','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(197,'ESTC-1059.pdf','Tapuyo tapuyo Belsy Noelia','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(198,'ESTC-105.pdf','GENESIS XIOMARA FRANCO NAZARENO','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(199,'ESTC-1060.pdf','Tello Parrales Kevin Daniel','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(200,'ESTC-1061.pdf','Tenorio Arauz Pierina Esperanza','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(201,'ESTC-1062.pdf','Tenorio Ayoví Tamara Dayanna','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(202,'ESTC-1063.pdf','TENORIO BURGUEZ MARIA ELENA','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(203,'ESTC-1064.pdf','Tenorio Cabezas Andrea Nicole','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(204,'ESTC-1065.pdf','Tenorio Carvajal Angely karoly','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(205,'ESTC-1066.pdf','Tenorio Godoy Andrea Paola','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(206,'ESTC-1067.pdf','Tenorio Maldonado Fanny Jacqueline','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(207,'ESTC-1068.pdf','Tenorio Mina Jennily Juleidy','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(208,'ESTC-1069.pdf','Tenorio Orejuela Ana Karen','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(209,'ESTC-106.pdf','LIDIA ALEXANDRA RODRIGUEZ','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(210,'ESTC-1070.pdf','Tenorio Tenorio Maydana Xiomara','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(211,'ESTC-1071.pdf','tenorio vaca maria jose','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(212,'ESTC-1072.pdf','Thais Daniela Borja Ballesteros','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(213,'ESTC-1073.pdf','Thais Juliana benalcazar Pastrana','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(214,'ESTC-1074.pdf','Tierra Guzman Noemí Carolina','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(215,'ESTC-1075.pdf','Tobar Ortiz Stefania Nicole','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(216,'ESTC-1076.pdf','Tocagón Tabango Lady Marilyn','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(217,'ESTC-1077.pdf','Tofiño Alvares Ronmy Vanessa','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(218,'ESTC-1078.pdf','Toral Bailon Victoria Mariela','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(219,'ESTC-1079.pdf','TORRES CHILA DALILA TAHIRONA','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(220,'ESTC-107.pdf','NICOL MADELEIS PATA COLOBON','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(221,'ESTC-1080.pdf','Torres Ibarbo Jenniffer Leila','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(222,'ESTC-1081.pdf','Torres Ibarbo Jenniffer Leila','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(223,'ESTC-1082.pdf','Torres Quiñonez Dayana elizabeth','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(224,'ESTC-1083.pdf','Torres Reina Anthony Alexander','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(225,'ESTC-1084.pdf','TORRES TREJO MARIA PAULINA','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(226,'ESTC-1085.pdf','TORRES TREJO MARIA PAULINA','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(227,'ESTC-1086.pdf','Trejo Moreira Denisse Mariuxi','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(228,'ESTC-1087.pdf','Trejo perea yanela','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(229,'ESTC-1088.pdf','Triana Vera Dayanna Verenisse','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(230,'ESTC-1089.pdf','TRUJILLO ACEVEDO KARLA ARIANA','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(231,'ESTC-108.pdf','ALEXANDRA GASPAR CABEZA','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(232,'ESTC-1090.pdf','Trujillo Delgado Corina Elizabeth','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(233,'ESTC-1091.pdf','Tuares Moreira Erick Francisco','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(234,'ESTC-1092.pdf','Tufiño Gámez Liner Solanda','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(235,'ESTC-1093.pdf','Tufiño Mercado Tania Ivonne','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(236,'ESTC-1094.pdf','Uglade Casquete Klerida Isabel','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(237,'ESTC-1095.pdf','Ulloa Lemos Joel Enrique','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(238,'ESTC-1096.pdf','Ureña Chila Claudia','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(239,'ESTC-1097.pdf','Vaca Cepeda Johnny Nivaldo','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(240,'ESTC-1098.pdf','Valdez Hurtado Mirna Fanny','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(241,'ESTC-1099.pdf','Valdivieso Alcivar Jadira Jessenia','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(242,'ESTC-109.pdf','ANDREA YOCASTA CIFUENTES CRUEL','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(243,'ESTC-10.pdf','ANA QUINDE TARIRA','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(244,'ESTC-1100.pdf','valencia angulo paola katherine','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(245,'ESTC-1101.pdf','Valencia Ayovi Jenny Estefania','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(246,'ESTC-1102.pdf','Valencia Ballestero Landy Rebeca','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(247,'ESTC-1103.pdf','Valencia Bautista Guadalupe Jineth','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(248,'ESTC-1104.pdf','Valencia Klinger Carmen Gabriela','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(249,'ESTC-1105.pdf','Valencia Marquez Gemnia anais','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(250,'ESTC-1106.pdf','Valencia Martinez Danesis','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(251,'ESTC-1107.pdf','Valencia Murillo Paola','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(252,'ESTC-1108.pdf','Valencia obando laura elaxandra','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(253,'ESTC-1109.pdf','Valencia Ordónez Freddy Roberto','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(254,'ESTC-110.pdf','AIDA YOLIMA HERNANDEZ DAVILA','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(255,'ESTC-1110.pdf','VALENCIA PINCAY MARIA MARYURI','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(256,'ESTC-1111.pdf','Valencia Segura Ivonne Annabell','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(257,'ESTC-1112.pdf','Valencia Silva Alison Micaela','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(258,'ESTC-1113.pdf','Valencia Sosa Lucía Gissela','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(259,'ESTC-1114.pdf','Valencia Vernaza Celia Fernanda','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(260,'ESTC-1115.pdf','Valery Dayuma Acosta Olaves','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(261,'ESTC-1116.pdf','VALLADARES LOPEZ NATHALYA CARMEN','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(262,'ESTC-1117.pdf','Vallecilla Mosquera Andrea Liliana','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(263,'ESTC-1118.pdf','VALLEJO ESPINOZA JENNY DEL PILAR','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(264,'ESTC-1119.pdf','Valverde Gonzáles Gissella Estefania','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(265,'ESTC-111.pdf','JACQUELINE JANETH ARAUJO SAAVEDRA','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(266,'ESTC-1120.pdf','Vanessa Elena Mora GUAGUA','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(267,'ESTC-1121.pdf','VARGAS CEDENO GENESIS IRENE','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(268,'ESTC-1122.pdf','Vargas Torres Katherine Estefania','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(269,'ESTC-1123.pdf','Vásquez Quiñonez Alba Elvira','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(270,'ESTC-1124.pdf','Velasco Bailon Estefania Juliana','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(271,'ESTC-1125.pdf','Velasco Garcia Caroline Neyla','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(272,'ESTC-1126.pdf','Velasco Ortiz Liz Andreina','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(273,'ESTC-1127.pdf','Velásquez Meza Juan Diego','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(274,'ESTC-1128.pdf','Vélez Mendoza Neiva Katherine','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(275,'ESTC-1129.pdf','Verá Batioja Lisette Johanna','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(276,'ESTC-112.pdf','MARIA CRISTINA VERGARA SANTO','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(277,'ESTC-1130.pdf','Vera Casierra Nancy Jomaira','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(278,'ESTC-1131.pdf','Vera Farías Diana Cecilia','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(279,'ESTC-1132.pdf','Vera Ferrin Dixiana Maribel','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(280,'ESTC-1133.pdf','Vera Peñaherrera Jomayra Cecibel','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(281,'ESTC-1134.pdf','Vera Quiñones Ana Piedad','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(282,'ESTC-1135.pdf','Vera Rubio Eduardo','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(283,'ESTC-1136.pdf','Verduga Vera Virginia Viviana','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(284,'ESTC-1137.pdf','Vergara Merlin María José','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(285,'ESTC-1138.pdf','Vergara Merlin María Lastenia','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(286,'ESTC-1139.pdf','Vergara santos María Cristina','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(287,'ESTC-113.pdf','JACKSON AYTON BAGUI','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(288,'ESTC-1140.pdf','Vergara santos María Cristina','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(289,'ESTC-1141.pdf','Vernaza Arroyo Mariuxi Izabel','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(290,'ESTC-1142.pdf','Vernaza monroy patricia marlene','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(291,'ESTC-1143.pdf','Vernaza Padilla Dayra Dayana','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(292,'ESTC-1144.pdf','Victoria Geovanna Vera Angulo','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(293,'ESTC-1145.pdf','Vilela Figueroa nimia yolanda','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(294,'ESTC-1146.pdf','villacis santana betsy abigail','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(295,'ESTC-1147.pdf','Villalba Lara Rosa María','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(296,'ESTC-1148.pdf','Villamar Sanchez Mercedes Dioselina','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(297,'ESTC-1149.pdf','villamarin Intriago Silvia Eugenia','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(298,'ESTC-114.pdf','COSME SALVADOR RAMIREZ DUEÑAS','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(299,'ESTC-1150.pdf','Villarreal Ortega Carla Anahí','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(300,'ESTC-1151.pdf','Vinicio Miguel Vera Bone','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(301,'ESTC-1152.pdf','VINUEZA OLMEDO EVELYN ANDREA','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(302,'ESTC-1153.pdf','Vivas Quiroz Genesis Morelia','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(303,'ESTC-1154.pdf','Vivero Padilla Ana Rosmery','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(304,'ESTC-1155.pdf','Vivero Velasco Yanina','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(305,'ESTC-1156.pdf','Wila Corozo Karla Lisbeth','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(306,'ESTC-1157.pdf','Wila Rodriguez Graciela Thais','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(307,'ESTC-1158.pdf','Yaguana Sarango Selena Margoth','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(308,'ESTC-1159.pdf','Yaguana Sarango Valeria Estefania','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(309,'ESTC-115.pdf','JAHAYRA VERONICA PARCO PAUCAR','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(310,'ESTC-1160.pdf','Yandry Javier Ruiz Castillo','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(311,'ESTC-1161.pdf','Yanez franco evelyn andrea','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(312,'ESTC-1162.pdf','Yanza Maza Fernanda','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(313,'ESTC-1163.pdf','Yépez González Erika','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(314,'ESTC-1164.pdf','Yuly Tatiana Añapa San Nicolas','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(315,'ESTC-1165.pdf','zambrano angulo bethsaira lilibeth','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(316,'ESTC-1166.pdf','Zambrano Benites Betsy Mayra','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(317,'ESTC-1167.pdf','Zambrano Chila Angélica Alexandra','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(318,'ESTC-1168.pdf','Zambrano Mejía Andrea Stefania','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(319,'ESTC-1169.pdf','Zambrano Moncayo Shirley Mailyn','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(320,'ESTC-116.pdf','JESSICA ZENEIDA SANDOVAL SANDOVAL','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(321,'ESTC-1170.pdf','ZAMBRANO PUJOS NATHALY ESTEFANIA','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(322,'ESTC-1171.pdf','Zambrano Rivadeneira Angie Melissa','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(323,'ESTC-1172.pdf','Zambrano Valencia Melany Denisse','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(324,'ESTC-1173.pdf','Zambrano Vélez Damaris Marely','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(325,'ESTC-1174.pdf','Zamora Angulo Lisbeth Stefania','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(326,'ESTC-1175.pdf','Zamora Valdez Mónica Elizabeth','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(327,'ESTC-1176.pdf','ZAMORAANGULO DAYANA JAMILETH','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(328,'ESTC-1177.pdf','Zanipatín Erazo Alessia Fabiola','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(329,'ESTC-1178.pdf','Zanipatin Melville Néstor Abraham','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(330,'ESTC-117.pdf','DORA ILIANA CHEME PEREIRA','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(331,'ESTC-118.pdf','LISETTE JOHANNA VERA BATIOJA','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(332,'ESTC-119.pdf','MARCIA GIRABEL ALVAREZ QUINTO','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(333,'ESTC-11.pdf','PATRICK ESTUPIÑAN SILVA','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(334,'ESTC-120.pdf','EVELYN ANDREA PANEZO MINA','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(335,'ESTC-121.pdf','MISCHELLE DAYANA MARCHAN TELLO','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(336,'ESTC-122.pdf','PIERINA CELINA QUIÑONEZ ARBOLEDA','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(337,'ESTC-123.pdf','DEYVI PAUL LALEO PARRAGA','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(338,'ESTC-124.pdf','ANA KAREN CUERO CORREÑO','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(339,'ESTC-125.pdf','SELENY MODELEY TOALOMBO LÓPEZ','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(340,'ESTC-126.pdf','GERALDINE ROMINA PERA GUTIERREZ','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(341,'ESTC-127.pdf','YARITZA ANAIS LEÓN MORENO','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(342,'ESTC-128.pdf','ERIKA THALIA ANGULO LARA','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(343,'ESTC-129.pdf','SCARLET JURITZA PRECIADO PEREA','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(344,'ESTC-12.pdf','LINA JUDITH MENDOZA PÁRRAGA','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(345,'ESTC-130.pdf','WENDY ELIZABETH VELEZ BETANCOURT','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(346,'ESTC-131.pdf','JULIANA MILENA GONZALEZ MERIZALDE','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(347,'ESTC-132.pdf','JOSSELIN GIRABEL MINA VALDEZ','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(348,'ESTC-133.pdf','HIPOLITO LEONIDAS BUENO CASANOVA','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(349,'ESTC-134.pdf','CARLOS ANDRES AYOVI ESTUPIÑAN','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(350,'ESTC-135.pdf','ANYI BRIGETTE GRUEZO ESPINOZA','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(351,'ESTC-136.pdf','XIOMARA ALBERTINA SALAZAR REYES','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(352,'ESTC-137.pdf','SHADIA LILIBETH SANCHEZ CIFUENTES','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(353,'ESTC-138.pdf','ANDREW STEVEN RODRÍGUEZ ALCIVAR','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(354,'ESTC-139.pdf','ALBERTO TAYLOR ROJA VERA','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(355,'ESTC-13.pdf','GRACIELA THAIS WILA RODRÍGUEZ','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(356,'ESTC-140.pdf','LEONEL ALEXANDER RODRIGUEZ CHAVEZ','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(357,'ESTC-141.pdf','CRISTOPHER JAIRO VARGAS MURILLO','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(358,'ESTC-142.pdf','LINDSLEY SONIA ZAMORA','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(359,'ESTC-143.pdf','JOSSELIN GIRABEL MINA VALDEZ','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(360,'ESTC-144.pdf','KLERIDA ISABEL UGALDE CASQUETE','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(361,'ESTC-145.pdf','TAMARA PIERINA COROZO VALDEZ','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(362,'ESTC-146.pdf','ANA GENESIS QUIÑONEZ ORDOÑEZ','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(363,'ESTC-147.pdf','GEANNELLA DESIREE OBANDO GARCIA','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(364,'ESTC-148.pdf','NAISHA JAMA SANTIANO','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(365,'ESTC-149.pdf','JHONIER ALCIDES VITE PERLAZA','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(366,'ESTC-14.pdf','PAOLA GUADALUPE SEVILLA JORDAN','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(367,'ESTC-150.pdf','NICOL MARIANA COIME CUERO','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(368,'ESTC-151.pdf','HENRRY FABIAN NAZARENO MONTAÑO','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(369,'ESTC-152.pdf','GENESIS IRENE VARGAS CEDEÑO','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(370,'ESTC-153.pdf','HAYDEE COLORADO SALGERO','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(371,'ESTC-154.pdf','GENESIS SARAY CORTEZ FALCONI','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(372,'ESTC-155.pdf','JORDAN MAUEL TENORIO MARQUEZ','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(373,'ESTC-156.pdf','CARLA BRILLITTE CUERO COROZO','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(374,'ESTC-157.pdf','JEFFERSON BENITEZ BENITEZ','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(375,'ESTC-158.pdf','MARIA LEIDYS ANGULO GRUEZO','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(376,'ESTC-159.pdf','FERNANDA GISSELLA CASTILLO MORENO','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(377,'ESTC-15.pdf','DAMARIS DENNY NAZARENO BASTIDAS','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(378,'ESTC-160.pdf','JULIANA LISBETH AGUILA GAROFALO','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(379,'ESTC-161.pdf','JESSENIA ELIZABETH ALCIVAR VALDEZ','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(380,'ESTC-162.pdf','MONICA ROXANA MIDEROS FERRER','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(381,'ESTC-163.pdf','KIANA PAOLA LOOR DÍAZ','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(382,'ESTC-164.pdf','ANDREA BALDENUEVO VALENCIA','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(383,'ESTC-165.pdf','JENNIFFER MARTINEZ MENESES','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(384,'ESTC-166.pdf','LADY JASMIN CHICHANDE TORRES','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(385,'ESTC-167.pdf','JULIANA ANDREINA LANDAZURI','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(386,'ESTC-168.pdf','KAREN MALENA LANDAZURI RODRIGUEZ','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(387,'ESTC-169.pdf','MARIA JOSE ORDOÑEZ CLAVIJO','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(388,'ESTC-16.pdf','ELIA GENOVEVA IGLESIAS MONTAÑO','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(389,'ESTC-170.pdf','JOSE GREGORIO ORDOÑEZ CLAVIJO','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(390,'ESTC-171.pdf','MARIA ANTONELLA CALVERTO SUAREZ','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(391,'ESTC-172.pdf','JESSICA EDUARDA MARRETT ZAMORA','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(392,'ESTC-173.pdf','ELIDA MARCELA DIOFARE QUIÑONEZ','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(393,'ESTC-174.pdf','DANNA FABRIZZIA OLARTE BALLESTEROS','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(394,'ESTC-175.pdf','BRIYI THAIS QUIÑONEZ ARROYO','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(395,'ESTC-176.pdf','DANNY MARIUXI PRECIADO MENDEZ','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(396,'ESTC-177.pdf','MAIRA CECIBEL CHICHANDE DELGADO','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(397,'ESTC-178.pdf','DIANA CECILIA VERA FARIAS','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(398,'ESTC-179.pdf','SANDRA PIEDAD ESTACIO BATIOJA','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(399,'ESTC-17.pdf','GERALDINE ROMINA BONE MINA','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(400,'ESTC-180.pdf','MARIA FERNANDA ALCIVAR SEGURA','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(401,'ESTC-181.pdf','NAYELI ANAHI PRIAS MENENDEZ','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(402,'ESTC-182.pdf','ANNY ALISON CABEZA KLINGER','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(403,'ESTC-183.pdf','MOISES BAUTISTA FRANCIS','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(404,'ESTC-184.pdf','KIMBERLY ESTEFANIA CASTILLO GAMEZ','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(405,'ESTC-185.pdf','MARIA ALEJANDRA BALCAZAR ZAMBRANO','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(406,'ESTC-186.pdf','KARLA JAZMIN SAMANIEGO TAMBONERO','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(407,'ESTC-187.pdf','MARIUXI PAREDES MENDEZ','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(408,'ESTC-188.pdf','ALISÓN CARRASCA ESCOBAR','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(409,'ESTC-189.pdf','Acero Sampietro Adriana','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(410,'ESTC-18.pdf','IVANNA JASUTH PINEDA FARES','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(411,'ESTC-190.pdf','Acunzo Arroyo Juan Carlos','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(412,'ESTC-191.pdf','Adriana Estefania Fernandez Navia','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(413,'ESTC-192.pdf','Aguayo Zambrano Ines Briggitte','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(414,'ESTC-193.pdf','Águila Garofalo Juliana Lisbeth','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(415,'ESTC-194.pdf','Aguilar Molina Joyce Naomi','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(416,'ESTC-195.pdf','Alarcon Sanchez Justin Briana','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(417,'ESTC-196.pdf','Alban Mera Ariana Karina','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(418,'ESTC-197.pdf','Alban Nazareno María Isabel','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(419,'ESTC-198.pdf','Alcántara Quintero Amparo Nicole','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(420,'ESTC-199.pdf','Alcivar Casierra Andrea Leonela','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(421,'ESTC-19.pdf','DENNIS DANIELA GRUEZO ARROYO','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(422,'ESTC-1.pdf','LAURA BAES RODRIGUEZ','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(423,'ESTC-200.pdf','Alcivar Cuninghan Heler David','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(424,'ESTC-201.pdf','Alcivar Marquéz Thais Ivanna','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(425,'ESTC-202.pdf','Alcivar Moreno Alison Geannina','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(426,'ESTC-203.pdf','Alcívar Segura María Fernanda','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(427,'ESTC-204.pdf','Alcívar Valdez Jessenia Elizabeth','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(428,'ESTC-205.pdf','Alcivar Valencia Rebecca Alejandra','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(429,'ESTC-206.pdf','Almeida Gonzalez Nahomy Nicole','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(430,'ESTC-207.pdf','Alume Girón Maria jose','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(431,'ESTC-208.pdf','Álvarez Solorzano Arianne Pamela','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(432,'ESTC-209.pdf','Ortiz Palomino Ana Enriqueta','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(433,'ESTC-20.pdf','ADRIANA ESTEFANIA FERNANDEZ NAVIA','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(434,'ESTC-210.pdf','Quinonez Cadena Ana Karen','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(435,'ESTC-211.pdf','Delgado Párraga Ana Karina','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(436,'ESTC-212.pdf','Quinde Tarira Ana María','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(437,'ESTC-213.pdf','Ance Castillo Mariuxi','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(438,'ESTC-214.pdf','Anchundia Chávez Angie Gabriela','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(439,'ESTC-215.pdf','Anchundia Paz Maria Gabriela','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(440,'ESTC-216.pdf','Anchundia Veliz Luisa Margarita','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(441,'ESTC-217.pdf','Andrade Chinga John Jairo','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(442,'ESTC-218.pdf','Andrade Lazo Dayana Cecibel','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(443,'ESTC-219.pdf','Andrade LIino Arley Azael','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(444,'ESTC-21.pdf','ELIZABTEH LILIANA AGUIRRE GUAGUA','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(445,'ESTC-220.pdf','Andrade Macias Danyela Fernanda','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(446,'ESTC-221.pdf','Andrade Valencia Ibeth Carolina','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(447,'ESTC-222.pdf','Cortez Pacho Andrea Isabel','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(448,'ESTC-223.pdf','García Gonzáles Andrea Paulina','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(449,'ESTC-224.pdf','Morales Maza Andrea Vanessa','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(450,'ESTC-225.pdf','Sasintuña Estrada Angela Ximena','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(451,'ESTC-226.pdf','Corozo Quiñonez Angere Berónica','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(452,'ESTC-227.pdf','Ordoñez Portocarrero Angie Michelle','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(453,'ESTC-228.pdf','Angulo Alarcon Jenniffer Estefanía','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(454,'ESTC-229.pdf','Ángulo Álvarez Rider Darío','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(455,'ESTC-22.pdf','AKENA CARMEN CASTILLO CUZME','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(456,'ESTC-230.pdf','Angulo Angulo Génesis Dayana','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(457,'ESTC-231.pdf','Angulo Betancourt Maoly Lisbeth','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(458,'ESTC-232.pdf','Angulo Mero Angie Mishelle','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(459,'ESTC-233.pdf','Angulo Montaño Jean Carlos','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(460,'ESTC-234.pdf','Angulo Ramírez Reyshell Nashara','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(461,'ESTC-235.pdf','Angulo Rodríguez Lady Wendy','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(462,'ESTC-236.pdf','Angulo Rojas Okani Nohemy','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(463,'ESTC-237.pdf','Angulo Velasco Heidy Patricia','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(464,'ESTC-238.pdf','Angulo Zambrano Monica Madeleyne','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(465,'ESTC-239.pdf','García Loor Anlly Dayana','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(466,'ESTC-23.pdf','KATTY ANGELICA CAICEDO QUINTERO','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(467,'ESTC-240.pdf','Quiñomez Escobar Annabell Fernanda','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(468,'ESTC-241.pdf','Ortiz Bone Annabella Valeria','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(469,'ESTC-242.pdf','Ante Carranza María Fernanda','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(470,'ESTC-243.pdf','Añapa Añapa Marìa Viviana','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(471,'ESTC-244.pdf','Añapa Capena Fernanda Yanira','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(472,'ESTC-245.pdf','Añapa Chapiro Yohana Elizabeth','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(473,'ESTC-246.pdf','Añapa Lopez Jessica María','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(474,'ESTC-247.pdf','Añapa Pianchiche Johnny Yeferson','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(475,'ESTC-248.pdf','Añapa Pichota Licia Daniela','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(476,'ESTC-249.pdf','Aparicio Caicedo Andrea Carolina','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(477,'ESTC-24.pdf','MARIUXI PILAR VILLAQUIRAN VILLA','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(478,'ESTC-250.pdf','Araujo Quiñonez Paola Irene','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(479,'ESTC-251.pdf','Arboleda Batioja Alfredo Jair','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(480,'ESTC-252.pdf','Arboleda Campuzano Lina Lidia','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(481,'ESTC-253.pdf','Arboleda Guerrero Hortencia María','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(482,'ESTC-254.pdf','Arévalo García Dina Nicole','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(483,'ESTC-255.pdf','Quintero Carvajal Ariana Lisbeth','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(484,'ESTC-256.pdf','Arce Rodriguez Ariana Yamileth','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(485,'ESTC-257.pdf','Arismendi Caicedo Carolina Raquel','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(486,'ESTC-258.pdf','Arroyo Barcia Jorge Daniel','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(487,'ESTC-259.pdf','Arroyo Barcia Karelys Nathaly','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(488,'ESTC-25.pdf','MARIA JOSE BAUTISTA BODERO','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(489,'ESTC-260.pdf','Arroyo Bone Estefany Briggitte','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(490,'ESTC-261.pdf','Arroyo Caicedo Lourdes Thais','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(491,'ESTC-262.pdf','Arroyo Landázuri Ginger Hilary','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(492,'ESTC-263.pdf','Arroyo Mairongo Maura Catherine','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(493,'ESTC-264.pdf','Arroyo Valencia Thais Dayanara','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(494,'ESTC-265.pdf','Arroyo Vera Nedelyn Daniela','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(495,'ESTC-266.pdf','Arteaga Díaz Genesis Tahis','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(496,'ESTC-267.pdf','Arteaga Diaz Katherin Ginger','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(497,'ESTC-268.pdf','Arteaga Riera Diana Olinda','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(498,'ESTC-269.pdf','Arturo Casierra Stefany Naholy','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(499,'ESTC-26.pdf','ANA HURTADO CHILA','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(500,'ESTC-270.pdf','Ávila Bailón Billy Jordy','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(501,'ESTC-271.pdf','Avila Bravo Yudy Yaritza','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(502,'ESTC-272.pdf','Avila Hurtado Tatiana','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(503,'ESTC-273.pdf','Aviles Rodríguez Arelis Andreina','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(504,'ESTC-274.pdf','Ayala Quintero Karelys Irene','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(505,'ESTC-275.pdf','Ayovi Mina Dirkon Jenry','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(506,'ESTC-276.pdf','Ayovi Sosa Gisella Stefania','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(507,'ESTC-277.pdf','Bagui Tenorio Jackson Ayrton','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(508,'ESTC-278.pdf','Baicilla chamba Willian Gonzalo','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(509,'ESTC-279.pdf','Bajaña Pacheco Ginger Johanna','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(510,'ESTC-27.pdf','GELIO RIVAS TENORIO','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(511,'ESTC-280.pdf','Balcázar Zambrano Alejandra','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(512,'ESTC-281.pdf','Balderramo Valencia Andrea','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(513,'ESTC-282.pdf','Ballesteros Mera Lissette Fernanda','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(514,'ESTC-283.pdf','Ballesteros Ortiz Fernanda Ivanova','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(515,'ESTC-284.pdf','Ballesteros Roldan Nayeli Stefania','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(516,'ESTC-285.pdf','Barbosa Quintero Kelly Benedita','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(517,'ESTC-286.pdf','Bass Chichande Carmen Nayibe','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(518,'ESTC-287.pdf','Bass Padilla Yomira','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(519,'ESTC-288.pdf','Batalla Benavides Viviana Alexandra','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(520,'ESTC-289.pdf','Bateoja Alvarez Danfer Elian','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(521,'ESTC-28.pdf','ANGULO GUERRERO JOEL RONNY','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(522,'ESTC-290.pdf','Batioja blandon emily sayenka','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(523,'ESTC-291.pdf','Bautista Peña Deisy María','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(524,'ESTC-292.pdf','Bautista Rivera Rommel Oswaldo','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(525,'ESTC-293.pdf','Bautistas Francis Moisés Gabriel','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(526,'ESTC-294.pdf','Beatriz Stefania Alava Hernández','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(527,'ESTC-295.pdf','Becerra Rúa Ana Belén','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(528,'ESTC-296.pdf','Bedoya Angulo John Steven','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(529,'ESTC-297.pdf','Benavides Rosero Lisbeth','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(530,'ESTC-298.pdf','Vergara Palma Bertilda Ibelia','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(531,'ESTC-299.pdf','Betancourt Quiñónez Tanya Lilibeth','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(532,'ESTC-29.pdf','MARÍA CRISTINA VÁSQUEZ LOOR','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(533,'ESTC-2.pdf','MABEL SANCHEZ MIRANDA','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(534,'ESTC-300.pdf','Bolaño Reyna Guisell Selena','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(535,'ESTC-301.pdf','Bolaños Realpe Dania Jasmin','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(536,'ESTC-302.pdf','Bone Benítez Jessenia Carolina','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(537,'ESTC-303.pdf','Bone Braulio Dennisse','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(538,'ESTC-304.pdf','Bone Cagua Narcisa Elizabeth','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(539,'ESTC-305.pdf','Bone Castillo Dalia Lorena','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(540,'ESTC-306.pdf','Bone Castillo Stella Liyibeth','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(541,'ESTC-307.pdf','Bone Chila Jaritza Stefania','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(542,'ESTC-308.pdf','Bone Estrada Noelia Anahi','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(543,'ESTC-309.pdf','Bone Garcia Harriett Dioseline','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(544,'ESTC-30.pdf','DERIAN ISAAC POMA BARREZUETA','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(545,'ESTC-310.pdf','Bone Garrido Oliver Antonio','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(546,'ESTC-311.pdf','Bone Lopez Karla Gabriela','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(547,'ESTC-312.pdf','Bone Perlaza Pierina Paulette','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(548,'ESTC-313.pdf','Bone Ríos Ana Gabriela','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(549,'ESTC-314.pdf','Borja Figueroa melanny anay','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(550,'ESTC-315.pdf','Boya Merchancano Jorge Leo','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(551,'ESTC-316.pdf','Bravo Añapa Evelyn viviana','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(552,'ESTC-317.pdf','Bravo Solórzano Fanny Maritza','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(553,'ESTC-318.pdf','Bravo Tapia Diana Alexandra','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(554,'ESTC-319.pdf','Brenda Sofía Valencia Castillo','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(555,'ESTC-31.pdf','GENESSIS NAYELI LÓPEZ MANZABA','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(556,'ESTC-320.pdf','Briones Vera Matilde Asuncion','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(557,'ESTC-321.pdf','Bucheli Bone Jamileth Alejandra','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(558,'ESTC-322.pdf','Burbano Cabeza Jenny Valeria','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(559,'ESTC-323.pdf','Bustamante Piza Nayely Paulina','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(560,'ESTC-324.pdf','Cabeza cagua angela daniela','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(561,'ESTC-325.pdf','Cabeza Godoy Leidys Jajaira','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(562,'ESTC-326.pdf','Cabeza Meza Diana Narcisa','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(563,'ESTC-327.pdf','Cabeza Nazareno Kennis Cabeza','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(564,'ESTC-328.pdf','Cabeza Zatizabal Rosy Isela','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(565,'ESTC-329.pdf','Cabezas Arcentales América Vanessa','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(566,'ESTC-32.pdf','GANDY MINA BARAHONA','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(567,'ESTC-330.pdf','Cabezas Klinger Anny Alison','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(568,'ESTC-331.pdf','Cabezas Pianchiche Jaritza Jamileth','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(569,'ESTC-332.pdf','Cabrera Cortez Carla Viviana','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(570,'ESTC-333.pdf','Cadena Segura Deyanira Marisley','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(571,'ESTC-334.pdf','Cagua Quiñónez Carmen karina','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(572,'ESTC-335.pdf','Cagua Valencia Nancy','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(573,'ESTC-336.pdf','Cagua Valencia Sandra Elena','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(574,'ESTC-337.pdf','Cagua Vera Stefany Jamileth','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(575,'ESTC-338.pdf','Caicedo Arroyo Andrea Cristina','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(576,'ESTC-339.pdf','Caicedo Arroyo Karol Yaritza','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(577,'ESTC-33.pdf','KEVIN CEVALLOS VERNAZA','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(578,'ESTC-340.pdf','Caicedo Caicedo Denice Vihanney','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(579,'ESTC-341.pdf','Caicedo Camacho Gissella Elaine','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(580,'ESTC-342.pdf','Caicedo Cervera Milissen Johanna','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(581,'ESTC-343.pdf','Caicedo Cortez Yisbeth Tamara','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(582,'ESTC-344.pdf','Caicedo Flores Ana Gabriela','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(583,'ESTC-345.pdf','Caicedo Martínez Rosa Ángela','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(584,'ESTC-346.pdf','Caicedo Ortiz Wendy Alicia.','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(585,'ESTC-347.pdf','Caicedo Perlaza Jenniffer Alexandra','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(586,'ESTC-348.pdf','Caicedo Quintero Katty Angélica','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(587,'ESTC-349.pdf','Caicedo Quiñonez Elieth Janorieth','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(588,'ESTC-34.pdf','MILAGRO GABRIELA SOLES SOLIS','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(589,'ESTC-350.pdf','Caicedo Tufiño Briggite','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(590,'ESTC-351.pdf','Caicedo Valencia Julissa Nohemi','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(591,'ESTC-352.pdf','Caiza Manzaba Carla Pilar','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(592,'ESTC-353.pdf','Callaveral Bolaños Evelin Liliana','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(593,'ESTC-354.pdf','Camacho Godoy Genesis Julissa','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(594,'ESTC-355.pdf','Camacho Martínez Tamara Irene','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(595,'ESTC-356.pdf','Campaña Bone Carlos Alberto','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(596,'ESTC-357.pdf','Campusano Cheme Romina Naidelyn','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(597,'ESTC-358.pdf','Cando Zamora Ashley Lisbeth','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(598,'ESTC-359.pdf','Cañizarez Valencia génesis Abigail','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(599,'ESTC-35.pdf','NESTOR ABRAHAN SANIPATIN MELVILLA','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(600,'ESTC-360.pdf','Cañola Madrid Mateo Raúl','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(601,'ESTC-361.pdf','Cañola Quiñonez Sara del Carmen','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(602,'ESTC-362.pdf','Cañola Vera Génesis Mishelle','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(603,'ESTC-363.pdf','Capena Trejo Helen Melissa','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(604,'ESTC-364.pdf','Perea Montero Carlos Andres','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(605,'ESTC-365.pdf','Chica Vizcaíno Carlos Javier','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(606,'ESTC-366.pdf','Carmen Zambrano Pinto','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(607,'ESTC-367.pdf','Carrasco Escobar Alisson Arianna','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(608,'ESTC-368.pdf','Carrasco Vega Wilson wilfrido','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(609,'ESTC-369.pdf','Carvache Aguilar Isaac Enrique','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(610,'ESTC-36.pdf','DIEGO FERNANDO MASO PERDOMO','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(611,'ESTC-370.pdf','Carvache Burbano Maria Del Carmen','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(612,'ESTC-371.pdf','Carvajal Arcaye Victor Emanuel','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(613,'ESTC-372.pdf','Casierra Casierra Maria Alejandra','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(614,'ESTC-373.pdf','Castillo Alvarez Johanna Isayanna','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(615,'ESTC-374.pdf','Castillo Cortez Cinthya Jomaira','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(616,'ESTC-375.pdf','Castillo Esmeralda José Ramón','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(617,'ESTC-376.pdf','Castillo Francis Carmen Catherine','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(618,'ESTC-377.pdf','Castillo Gámez Kimberly Stefania','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(619,'ESTC-378.pdf','Castillo Monzón Bania Julissa','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(620,'ESTC-379.pdf','Castillo Quintero Lucciola Emiliana','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(621,'ESTC-37.pdf','ERICKA PERLAZA PERALTA','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(622,'ESTC-380.pdf','Castillo Quiñonez Julia Roxana','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(623,'ESTC-381.pdf','Castillo Rodríguez Michelle Carolina','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(624,'ESTC-382.pdf','Castillo Salas Katherine Elizabeth','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(625,'ESTC-383.pdf','Castillo Simisterra Julissa Daniela','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(626,'ESTC-384.pdf','Cayaveral Orobio Adonis Joao','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(627,'ESTC-385.pdf','Cedeño Bone Emiliana Emanuela','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(628,'ESTC-386.pdf','Cedeño Bustamante Janeth Mercedes','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(629,'ESTC-387.pdf','Cedeño Lucas Andrea Natali','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(630,'ESTC-388.pdf','Cedeño Morejón Catherine Alexandra','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(631,'ESTC-389.pdf','Celorio Quiñonez Sabrina Zuleika','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(632,'ESTC-38.pdf','MAURO ARROYO MAIRONGO','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(633,'ESTC-390.pdf','Centeno Domínguez Johana del Rocío','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(634,'ESTC-391.pdf','Cevallos Bautista Jessica Jasmin','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(635,'ESTC-392.pdf','Cevallos Bautista María Angelina','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(636,'ESTC-393.pdf','Cevallos Bustos Nancy Rosa','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(637,'ESTC-394.pdf','Cevallos Cabeza Jesenia Cecibel','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(638,'ESTC-395.pdf','Cevallos Porozo Wendy Paola','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(639,'ESTC-396.pdf','Chalaco Castro Lady Aracely','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(640,'ESTC-397.pdf','Chalar Vivas Michelle Alejandra','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(641,'ESTC-398.pdf','Chalen Flores Vincent Jhareft','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(642,'ESTC-399.pdf','Chamorro Guagua Diana del Rocío','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(643,'ESTC-39.pdf','KATHERINE ESTEFANIA VARGAS TORRES','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(644,'ESTC-3.pdf','MISCHELLE ORTIZ MIDEROS','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(645,'ESTC-400.pdf','Charcopa Gruezo Betsabeth Ruth','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(646,'ESTC-401.pdf','Charcopa Medina Andrea Melisa','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(647,'ESTC-402.pdf','Chaves Quiñonez Helen','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(648,'ESTC-403.pdf','Chavez Bagui Elaine Ibeth','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(649,'ESTC-404.pdf','Chávez Vélez Yesther Liliana','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(650,'ESTC-405.pdf','Cheme Jiménez Jessenia Elizabeth.','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(651,'ESTC-406.pdf','Cheme Montaño Nicol Estefani','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(652,'ESTC-407.pdf','Cherrez Vasco María Belén','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(653,'ESTC-408.pdf','Chica Cacique Janeth Alexandra','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(654,'ESTC-409.pdf','Chichande Bone Ana María','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(655,'ESTC-40.pdf','YUMIQUINGA NAPA','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(656,'ESTC-410.pdf','Chichande Bone Diana Carolina','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(657,'ESTC-411.pdf','Chichande Delgado Maira Cecibel','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(658,'ESTC-412.pdf','Chichande Gomez Genesis Comaira','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(659,'ESTC-413.pdf','Chichande Torres Jhonny Joel','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(660,'ESTC-414.pdf','Chichande Veliz Joselyn Liliana','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(661,'ESTC-415.pdf','Chichande Vernaza Naidelin Melissa','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(662,'ESTC-416.pdf','Chichande Zambrano Belén Mishelle','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(663,'ESTC-417.pdf','Chila Bagui Irene Jamileth','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(664,'ESTC-418.pdf','Chila Campas Elian Leonardo','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(665,'ESTC-419.pdf','Chila Mosquera Aileen Leonela','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(666,'ESTC-41.pdf','ERICK TUAREZ MOREIRA','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(667,'ESTC-420.pdf','Chila nevares margareth Elizabeth','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(668,'ESTC-421.pdf','Chila Ortiz Matilde Alexandra','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(669,'ESTC-422.pdf','Chila Paredes Maria Rocio','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(670,'ESTC-423.pdf','Chila Quiñónez Damary Dayana','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(671,'ESTC-424.pdf','Chinga Banguera Karen Alexandra','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(672,'ESTC-425.pdf','Chinga Canga Aramis Matilde','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(673,'ESTC-426.pdf','Chinga Espinal Karol Verónica','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(674,'ESTC-427.pdf','Cifuente Cruel Yokasta Andrea','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(675,'ESTC-428.pdf','Clavijo Alcívar Kerli Katherine','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(676,'ESTC-429.pdf','Cobeña Moreira NAYELI GISSELL','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(677,'ESTC-42.pdf','JESSY MOREIRA ANGULO','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(678,'ESTC-430.pdf','Coimen Pérez Angelina Nicole','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(679,'ESTC-431.pdf','Coox Clavijo Leidy Elizabeth','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(680,'ESTC-432.pdf','Copete granja yaritza','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(681,'ESTC-433.pdf','Cordova Rivero Karen Sugey','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(682,'ESTC-434.pdf','Corella Estacio Lilibeth Nathaly','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(683,'ESTC-435.pdf','Corozo castillo José tayson','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(684,'ESTC-436.pdf','Corozo Mina Nando David','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(685,'ESTC-437.pdf','Corozo Nazareno Karen Yusely','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(686,'ESTC-438.pdf','Cortez Bateoja Gabriela Maribel','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(687,'ESTC-439.pdf','Cortez Bateoja Melany Milena','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(688,'ESTC-43.pdf','MERCY CRISTHINA ANTE VALENCIA','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(689,'ESTC-440.pdf','Cortez Pinillo Deicy Michel','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(690,'ESTC-441.pdf','cortez zambrano maria nicole','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(691,'ESTC-442.pdf','Cotera Preciado Anais Janelly','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(692,'ESTC-443.pdf','Cotto Hernadez Xiomara Veronica','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(693,'ESTC-444.pdf','Cox Mosquera Angelica Maria','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(694,'ESTC-445.pdf','CRESPO ULLOA ANDREA ANNABELLA','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(695,'ESTC-446.pdf','Cruel Valarezo Jenniffer Lisseth','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(696,'ESTC-447.pdf','Cruz Sornoza Gloria Isabel','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(697,'ESTC-448.pdf','Cuasapaz Zavala Evelyn Margoth','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(698,'ESTC-449.pdf','Cuero Bedoya Rosa Angélica','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(699,'ESTC-44.pdf','SHINDER MINA VILLACRES','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(700,'ESTC-450.pdf','Cuero Caldas Bryan David','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(701,'ESTC-451.pdf','Cuero Camacho Jenniffer Pamela','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(702,'ESTC-452.pdf','Cuero Carreño Ana Karen','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(703,'ESTC-453.pdf','Cuero Chichande Domini Yaire','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(704,'ESTC-454.pdf','Cuero Torres Edwin Xavier','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(705,'ESTC-455.pdf','Curay Toainga Patricia lisbeth','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(706,'ESTC-456.pdf','Cusme Hurtado Angela Mishell','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(707,'ESTC-457.pdf','Daisy Dayana Sepúlveda Paredes','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(708,'ESTC-458.pdf','DARLIN JOEL RAMIREZ MENDEZ','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(709,'ESTC-459.pdf','De la cruz Simisterra Nury Paoly','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(710,'ESTC-45.pdf','FERNANDA YANINA QUIÑOÑEZ ARBOLEDA','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(711,'ESTC-460.pdf','De la cruz zambrano thalya','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(712,'ESTC-461.pdf','DE LA CRUZ ZUÑIGA NAHOMI JARITZA','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(713,'ESTC-462.pdf','Degny Zambrano','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(714,'ESTC-463.pdf','Delgado Correa Milena Jadira','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(715,'ESTC-464.pdf','Delgado Mercado Melina Andrea','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(716,'ESTC-465.pdf','DEMERA BATALLA DALESKA GIBELLY','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(717,'ESTC-466.pdf','Demera veliz Diana Herminia','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(718,'ESTC-467.pdf','Denílson Antony Mina Mina','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(719,'ESTC-468.pdf','Diana lilibeth Sánchez Molina','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(720,'ESTC-469.pdf','Díaz Acaro Eddy Javier','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(721,'ESTC-46.pdf','ANNY CECILIA SANCHEZ CABEZAS','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(722,'ESTC-470.pdf','Diaz Añapa Maira Yisela','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(723,'ESTC-471.pdf','Díaz Moreira Yamileth Ivette','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(724,'ESTC-472.pdf','Echeverria Ortiz Thalya Lisbette','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(725,'ESTC-473.pdf','Echeverria Sierra Mercy Dayana','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(726,'ESTC-474.pdf','Echeverría Sierra Milka Maleidy','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(727,'ESTC-475.pdf','ELIA GENOVEVA IGLESIAS MONTAÑO','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(728,'ESTC-476.pdf','Elida Marcela Diafare Quiñonez','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(729,'ESTC-477.pdf','Elizabeth Liliana Aguirre Guagua','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(730,'ESTC-478.pdf','Enriquez castillo geovanna cecibel','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(731,'ESTC-479.pdf','Erazo Loor Cindy Pamela','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(732,'ESTC-47.pdf','JOHANNA DEL ROCIO CENTENO','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(733,'ESTC-480.pdf','Erazo vaca Jenniffer Raquel','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(734,'ESTC-481.pdf','Erick Israel Guacan Lanchimba','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(735,'ESTC-482.pdf','Erika liliana Barbosa Quintero','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(736,'ESTC-483.pdf','Escobar Muñoz Jenniffer Adriana','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(737,'ESTC-484.pdf','Escobar Solís Marien Rocío','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(738,'ESTC-485.pdf','España Angulo Andrea Stefania','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(739,'ESTC-486.pdf','España Simisterra Jaxon Rosendo','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(740,'ESTC-487.pdf','España Urriola Angie Jhorvana','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(741,'ESTC-488.pdf','España Villamarin Sianela','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(742,'ESTC-489.pdf','Esparza Casanova Karen Janine','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(743,'ESTC-48.pdf','XIOMARA VERONICA JOTTO HERNANDEZ','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(744,'ESTC-490.pdf','Espinal Márquez jenniffer Geanine','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(745,'ESTC-491.pdf','Espinoza Mala Nedelka Isabel','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(746,'ESTC-492.pdf','Espinoza Meza Clara Lucila','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(747,'ESTC-493.pdf','Espinoza Meza Rosa Lisbeth','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(748,'ESTC-494.pdf','Espinoza Pacheco Katherin Andrea','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(749,'ESTC-495.pdf','espinoza paredes nayeli maria','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(750,'ESTC-496.pdf','Estacio Batioja Sandra Piedad','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(751,'ESTC-497.pdf','ESTACIO JAMA BRIANA JULISSA','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(752,'ESTC-498.pdf','Esther Cecilia Bustos Castillo','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(753,'ESTC-499.pdf','Estupinan Angulo Gabriela Lisseth','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(754,'ESTC-49.pdf','ARIANNA PAMELA ALVAREZ SOLORZANO','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(755,'ESTC-4.pdf','SILVIA MAYARIN INTRIAGO','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(756,'ESTC-500.pdf','Estupiñan Barbosa Ana','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(757,'ESTC-501.pdf','Estupiñan Barbosa Ana','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(758,'ESTC-502.pdf','ESTUPIÑAN GUEVARA ARACELY STEFANIA','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(759,'ESTC-503.pdf','Evelin Fernanda Murillo Garcia','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(760,'ESTC-504.pdf','Evelyn Nayeli Erazo Quetama','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(761,'ESTC-505.pdf','Farfán Bone Daniel Hernando','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(762,'ESTC-506.pdf','Farfan Bone Daniel Hernando','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(763,'ESTC-507.pdf','Farias Jaen Katty Maricela','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(764,'ESTC-508.pdf','Farías Malat Jaisa Jamileth','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(765,'ESTC-509.pdf','Farias Moreira Ivett Cecilia','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(766,'ESTC-50.pdf','DANIA BOLAÑOS REALPE','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(767,'ESTC-510.pdf','Ferrín Salazar Brithanny','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(768,'ESTC-511.pdf','Fiama Mishelle Cangá Valencia','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(769,'ESTC-512.pdf','FLORES GARRIDO NATHALY CAROLINA','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(770,'ESTC-513.pdf','FLORES RIVERA KARELYS ALEJANDRA','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(771,'ESTC-514.pdf','Fonseca Corozo Johanna Angelica','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(772,'ESTC-515.pdf','FRANCO RODRIGUEZ PEDRO ENRIQUE','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(773,'ESTC-516.pdf','Gabriela johanna Capurro saltos','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(774,'ESTC-517.pdf','Galarza Montalván Génesis Monserrate','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(775,'ESTC-518.pdf','Gamez Cabeza Stefania Jasmin','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(776,'ESTC-519.pdf','Gámez Cueva Jany Sofia','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(777,'ESTC-51.pdf','KERLY CLAVIJO ALCIVAR','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(778,'ESTC-520.pdf','Gamez Cueva Keila Janive','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(779,'ESTC-521.pdf','Garces Batioja Alexa Nicol','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(780,'ESTC-522.pdf','Garcés Bone Jessica Jomayra','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(781,'ESTC-523.pdf','Garces Rua Carmen Angelica','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(782,'ESTC-524.pdf','garcez sol lady briggitte','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(783,'ESTC-525.pdf','García Arroyo Dara Leonela','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(784,'ESTC-526.pdf','García Bone Gabriela Paola','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(785,'ESTC-527.pdf','GARCIA CHAVEZ JHONNY ROBERTO','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(786,'ESTC-528.pdf','García Chávez Lucía','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(787,'ESTC-529.pdf','GARCIA CIFUENTES WENDY XIOMARA','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(788,'ESTC-52.pdf','JAMILETH BUCHELI BONE','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(789,'ESTC-530.pdf','GARCIA CUERO JANETH LUCRECIA','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(790,'ESTC-531.pdf','García Espinoza Yasmin María','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(791,'ESTC-532.pdf','Garcia Holguin Mercedes Carolina','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(792,'ESTC-533.pdf','García Hurtado Javier Fabricio','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(793,'ESTC-534.pdf','Garcia Lara Juliana Katherine','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(794,'ESTC-535.pdf','Garcia Ortiz Consuelo Ariana','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(795,'ESTC-536.pdf','Garcia Rivera Kevin Jandry','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(796,'ESTC-537.pdf','García Sánchez Andrea Nicole','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(797,'ESTC-538.pdf','Garcia Vasquez Dayana','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(798,'ESTC-539.pdf','Garcia vite andreina mabel','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(799,'ESTC-53.pdf','ADRIANA SOSA HEREDIA','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(800,'ESTC-540.pdf','Gaspar Cabezas Alexandra','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(801,'ESTC-541.pdf','Gaspar Cifuentes Jessica Michelle','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(802,'ESTC-542.pdf','Gelio Rivas Tenorio','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(803,'ESTC-543.pdf','Génesis Saray Almache Bautista','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(804,'ESTC-544.pdf','George Ayosa Nancy','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(805,'ESTC-545.pdf','George Quiñónez karen viviana','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(806,'ESTC-546.pdf','Giler Palomino Adriana Cecilia','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(807,'ESTC-547.pdf','Gilma Carolina Sanchez Mendez','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(808,'ESTC-548.pdf','Godoy Pianchiche Mariana Janeth','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(809,'ESTC-549.pdf','Gomez Hernández Shirley Carolina','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(810,'ESTC-54.pdf','NADELKA ESPINOZA MALA','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(811,'ESTC-550.pdf','Gómez Pata Katty Bexabel','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(812,'ESTC-551.pdf','Gongora Alvarez Maria Ximena','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(813,'ESTC-552.pdf','Gongora Franco Adan Miguel','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(814,'ESTC-553.pdf','Góngora Mendez Daira','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(815,'ESTC-554.pdf','Góngora Méndez Jade Rocibel','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(816,'ESTC-555.pdf','Gonzáles Velasco Marianella','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(817,'ESTC-556.pdf','Gonzalez Bagüi Mailyn Elizabeth','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(818,'ESTC-557.pdf','Gonzalez Bautista Evelyn Katherine','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(819,'ESTC-558.pdf','González Cuero Nalleli Alejandra','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(820,'ESTC-559.pdf','González Cusme Mayeli','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(821,'ESTC-55.pdf','BRIGGETTE GARCES SOL','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(822,'ESTC-560.pdf','González Escobar María','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(823,'ESTC-561.pdf','González George Genessis Lizabeth','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(824,'ESTC-562.pdf','Gonzalez Hurtado Anny Elizabeth','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(825,'ESTC-563.pdf','GONZALEZ PADILLA CARLA VIVIANA','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(826,'ESTC-564.pdf','González Santana Adriana Melisa','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(827,'ESTC-565.pdf','Gonzalez Santana Joselyn Brigette','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(828,'ESTC-566.pdf','Gonzalez Velez Sonia Yaritza','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(829,'ESTC-567.pdf','Gorozabel Almache Marcela Lilibeth','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(830,'ESTC-568.pdf','Gracia Bailon Fabian Andres','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(831,'ESTC-569.pdf','Gracia Trejo Dastin Paola','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(832,'ESTC-56.pdf','ISABEL ALVAN NAZARENO','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(833,'ESTC-570.pdf','Gresely Villegas Abel Ivan','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(834,'ESTC-571.pdf','GRUEZO ARROYO DENISSE DANIELA','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(835,'ESTC-572.pdf','Gruezo Cortez Nathaly Fernanda','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(836,'ESTC-573.pdf','Gruezo Hernandez Briggitte Arianne','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(837,'ESTC-574.pdf','Guacan Lanchimba Yajaira Pamela','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(838,'ESTC-575.pdf','Guadalupe Estupiñan Vielka Nahomi','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(839,'ESTC-576.pdf','Guagua Bone Evelyn Adriana','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(840,'ESTC-577.pdf','Guajan Cuellar Signey Morellia','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(841,'ESTC-578.pdf','Guamán Aguila Leidy Johanna','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(842,'ESTC-579.pdf','Guamani Chicaiza Jhoana Lisbeth','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(843,'ESTC-57.pdf','DAYANA LISBETH RAMIREZ MINA','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(844,'ESTC-580.pdf','Gudiño Cervantes Melany Lizeth','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(845,'ESTC-581.pdf','Gudiño Quintero Carmen Tatiana','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(846,'ESTC-582.pdf','Guerrero Morales Letty Kamila','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(847,'ESTC-583.pdf','Guerrero Orobio Belkis Mercedes','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(848,'ESTC-584.pdf','Guerrón Rodríguez Mayerli','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(849,'ESTC-585.pdf','Gutiérrez Rincones Dafne Ivette','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(850,'ESTC-586.pdf','Gutiérrez Rincones Dafne Ivette','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(851,'ESTC-587.pdf','Guzmán Portocarrero Yolanda Jahaira','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(852,'ESTC-588.pdf','Heredia Marchán Daniela Estefania','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(853,'ESTC-589.pdf','Heredia Marchan Priscyla Eliseth','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(854,'ESTC-58.pdf','DANIELA JULIETH CEVALLOS PEREA','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(855,'ESTC-590.pdf','Hernandez Mieles Fabiana Yorleny','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(856,'ESTC-591.pdf','Herrera Mera Kelly Nathaly','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(857,'ESTC-592.pdf','Herrera Trejo Josselyn Wendy','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(858,'ESTC-593.pdf','Herrera Valle Josue Daniel','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(859,'ESTC-594.pdf','Herrera Valle Kimberly Mabel','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(860,'ESTC-595.pdf','Hidalgo Zapata Keiko Diolinda','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(861,'ESTC-596.pdf','Huertas Loor Katherine Mishelle','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(862,'ESTC-597.pdf','Hurtado Jiménez Gladys María','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(863,'ESTC-598.pdf','Hurtado Jiménez Gladys María','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(864,'ESTC-599.pdf','Hurtado Méndez Daniela Deyanire','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(865,'ESTC-59.pdf','AMANDA VALENCIA CHALAR','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(866,'ESTC-5.pdf','LISA GONZALEZ RODRIGUEZ','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(867,'ESTC-600.pdf','HURTADO ZURITA KAREN PIERINA','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(868,'ESTC-601.pdf','Ibarra Castillo Jenniffer María','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(869,'ESTC-602.pdf','Idrovo Sornoza Daleska Karellys','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(870,'ESTC-603.pdf','Jaen Mendoza Jandry Joshue','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(871,'ESTC-604.pdf','Jahir Moises Montes Bone','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(872,'ESTC-605.pdf','Jama Chila Daniela Alexandra','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(873,'ESTC-606.pdf','Jama Corozo Carla Teresa','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(874,'ESTC-607.pdf','Jama Tenorio karelis','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(875,'ESTC-608.pdf','Jama Vargas Verónica Beatriz','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(876,'ESTC-609.pdf','Jaramillo Mendez Yaire Elizabeth','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(877,'ESTC-60.pdf','KAREN JANETH QUIÑONEZ ANGULO','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(878,'ESTC-610.pdf','Jaramillo Reyna Arianna Maitte','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(879,'ESTC-611.pdf','Jaramillo Salinas Armando Augusto','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(880,'ESTC-612.pdf','JEFFERSON CARMELO RUA CALDERON','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(881,'ESTC-613.pdf','Jenifer Katherine Vargas Moreira','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(882,'ESTC-614.pdf','Jessica Montaño Perlaza','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(883,'ESTC-615.pdf','Jessica Sandoval','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(884,'ESTC-616.pdf','Jessy Argentina Moreira Angulo','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(885,'ESTC-617.pdf','JIJON SACON MARIA VIXIANA','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(886,'ESTC-618.pdf','Jiménez Gutiérrez Yaxuri Rosa','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(887,'ESTC-619.pdf','Jiménez Gutiérrez Yaxuri Rosa','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(888,'ESTC-61.pdf','YENY ANDREA BEMRAN MONCADA','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(889,'ESTC-620.pdf','John Jairo Angulo Medranda','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(890,'ESTC-621.pdf','Jorge marlon garcés cetre','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(891,'ESTC-622.pdf','Jose Domingo Hurtado Ponce','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(892,'ESTC-623.pdf','Joselin Elizabeth Angulo Angulo','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(893,'ESTC-624.pdf','Joselyn Andreina Villavicencio Espinal','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(894,'ESTC-625.pdf','Josselyn Michelle Gutiérrez Rodríguez','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(895,'ESTC-626.pdf','Juan Guillermo Rivas Veliz','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(896,'ESTC-627.pdf','Juliana jailin sellan Cobeña','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(897,'ESTC-628.pdf','Jumbo Figueroa jennifer celeste','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(898,'ESTC-629.pdf','Kaina Nayeli Bone Vilela','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(899,'ESTC-62.pdf','YOMIRA LILIBETH PANELSANO','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(900,'ESTC-630.pdf','Karen Alexandra Quiñonez Cortes','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(901,'ESTC-631.pdf','Karina Elizabeth Perea Quiñonez','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(902,'ESTC-632.pdf','KARINA MARIBEL FALCÓN VILLARREAL','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(903,'ESTC-633.pdf','Karina Veronica Lopez Vilela','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(904,'ESTC-634.pdf','Karina Verónica López vilela','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(905,'ESTC-635.pdf','Karla Paola Oleas Ramirez','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(906,'ESTC-636.pdf','Kevin Hernan Orellana Peralta','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(907,'ESTC-637.pdf','Kevin Isaias Delgado Saltos','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(908,'ESTC-638.pdf','KIARA JURLEY CARPE BUSTOS','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(909,'ESTC-639.pdf','Klinger Guerrero Paola Serafina','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(910,'ESTC-63.pdf','SUSANA ISABEL SALDARRIAGA QUINTERO','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(911,'ESTC-640.pdf','Klinger Otoya Shirley Esmeralda','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(912,'ESTC-641.pdf','Lalaleo Parraga Deyvi Paul','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(913,'ESTC-642.pdf','Landazuri Rodríguez Juliana Andreina','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(914,'ESTC-643.pdf','Landazuri Rodriguez karen Malena','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(915,'ESTC-644.pdf','Lara Castillo Génesis Nicole','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(916,'ESTC-645.pdf','Lara Quiñonez Evelyn juliana','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(917,'ESTC-646.pdf','Largo Añapa Angela Tatiana','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(918,'ESTC-647.pdf','Laura Rocio Gruezo Hurtado','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(919,'ESTC-648.pdf','León Chango Shirley Alexandra','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(920,'ESTC-649.pdf','Leon Moreno Yaritza Anais','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(921,'ESTC-64.pdf','LANDY NATHALY SANTILLAN CANDELA','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(922,'ESTC-650.pdf','Leon valencia susana fernanda','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(923,'ESTC-651.pdf','León Valencia Susana Fernanda','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(924,'ESTC-652.pdf','Lerma Perlaza Joisy Camila','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(925,'ESTC-653.pdf','Lerma Torres Cintya Guadalupe','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(926,'ESTC-654.pdf','Lis yirabel Gonzalez Rodriguez','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(927,'ESTC-655.pdf','Liz Sánchez Mero','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(928,'ESTC-656.pdf','Lizandra Verónica Caicedo Chasing','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(929,'ESTC-657.pdf','Llorente Nicolalde Paulina Elizabeth','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(930,'ESTC-658.pdf','Llumiquinga Pincay Nathaly Silvana','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(931,'ESTC-659.pdf','LOOR BATIOJA YENILY BELEN','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(932,'ESTC-65.pdf','BRILLY NICOLE VALLE BRAVO','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(933,'ESTC-660.pdf','Loor CarabaliGrace Elizabeth','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(934,'ESTC-661.pdf','Loor Quiñónez Alejandra Paola','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(935,'ESTC-662.pdf','Lopez Cruz Evelin Coral','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(936,'ESTC-663.pdf','Lopez cruz Evelin Coral','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(937,'ESTC-664.pdf','López Mancilla Ambar','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(938,'ESTC-665.pdf','López Manzaba Génesis Nayeli','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(939,'ESTC-666.pdf','López Manzaba Génesis Nayeli','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(940,'ESTC-667.pdf','López San Nicolas Roxana','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(941,'ESTC-668.pdf','LOPEZ VALENCIA JHON STIWAR','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(942,'ESTC-669.pdf','LOPEZ VALENCIA JHON STIWAR','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(943,'ESTC-66.pdf','CARLA ANAHI VILLAREAL ORTEGA','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(944,'ESTC-670.pdf','Lopez Valencia Karla Viviana','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(945,'ESTC-671.pdf','Lopez zambrano Jeanella elizabeth','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(946,'ESTC-672.pdf','Loyola Caiza Nathaly Silvana','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(947,'ESTC-673.pdf','LOZANO ANGULO JOSELYN JOHANNA','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(948,'ESTC-674.pdf','Lugo Ordoñez Karla Lissette','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(949,'ESTC-675.pdf','Luis David González Bennett','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(950,'ESTC-676.pdf','Luis Xavier Lajones Torres','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(951,'ESTC-677.pdf','LUJANO PATA NINFA VIVIANA','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(952,'ESTC-678.pdf','LUNA MORENO JASMIN STEFANIA','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(953,'ESTC-679.pdf','LUZÓN CASTILLO ANIA MALENA','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(954,'ESTC-67.pdf','KRISTHEL STEFANIA CHANALUISA JIMENEZ','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(955,'ESTC-680.pdf','Macías Bautista Veronica Fernanda','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(956,'ESTC-681.pdf','Macias Gonzalez Michelle Carolina','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(957,'ESTC-682.pdf','Maffare Bone Jessenia Dixiana','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(958,'ESTC-683.pdf','Maldonado chochos victor adan','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(959,'ESTC-684.pdf','maldonado chochos victor adan','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(960,'ESTC-685.pdf','MANCHAY ORBEA JUAN CARLOS','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(961,'ESTC-686.pdf','Mangely Johanna Verá Tenorio','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(962,'ESTC-687.pdf','Mantuano Moncayo Rosa Isabel','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(963,'ESTC-688.pdf','Manzaba Landazuri Maryuri Margarita','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(964,'ESTC-689.pdf','Manzaba Olave Yanari Sharley','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(965,'ESTC-68.pdf','NACHEL ARIANA QUIÑONEZ TUFIÑO','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(966,'ESTC-690.pdf','Manzaba Valencia Laura Melissa','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(967,'ESTC-691.pdf','Marchan Casierra Ariana Sarahi','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(968,'ESTC-692.pdf','Marchan Zambrano María Clara','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(969,'ESTC-693.pdf','MARCILLO JIJON MADELEYNE ROMINA','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(970,'ESTC-694.pdf','María Antonella Calberto Suares','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(971,'ESTC-695.pdf','Maria Cecilia Batioja Segura','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(972,'ESTC-696.pdf','Maria Isabel Preciado Moreno','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(973,'ESTC-697.pdf','María José Ordóñez Clavijo','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(974,'ESTC-698.pdf','MARIA VIXIANA JIJON SACON','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(975,'ESTC-699.pdf','Mariana Mercede Hinostroza Mancilla','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(976,'ESTC-69.pdf','MARIUXI JIMABEL ARCE CASTILLO','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(977,'ESTC-6.pdf','MIGUEL VERA BONE','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(978,'ESTC-700.pdf','Marín Sánchez Valeria Nathaly','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(979,'ESTC-701.pdf','Marín Valencia Maidelyn Nicole','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(980,'ESTC-702.pdf','Marín Vásquez Nicole Dayana','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(981,'ESTC-703.pdf','Marquez Canchingre Karla Nicole','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(982,'ESTC-704.pdf','Márquez Delgado Vianka Juliana','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(983,'ESTC-705.pdf','Márquez España Geoconda Pamela','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(984,'ESTC-706.pdf','Marquez Proaño Diana iliana','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(985,'ESTC-707.pdf','Marquez Vargas Kerly Estefania','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(986,'ESTC-708.pdf','Martínez Angulo Alisson Samantha','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(987,'ESTC-709.pdf','Martínez Meneses Jenniffer Lisbeth','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(988,'ESTC-70.pdf','KAREN VIVIANA GEORGE QUIÑONEZ','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(989,'ESTC-710.pdf','MASO PERDOMO DIEGO FERNANDO','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(990,'ESTC-711.pdf','Medina Monrroy kennia Rosibel','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(991,'ESTC-712.pdf','Mejía Quintero Evelyn Lissette','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(992,'ESTC-713.pdf','Melanie Danne Angulo Saavedra','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(993,'ESTC-714.pdf','Mell Irene Rodriguez Rodriguez','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(994,'ESTC-715.pdf','MENA PATA VANESSA ARACELLY','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(995,'ESTC-716.pdf','Mendez Espinoza Evelyn Lisbeth','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(996,'ESTC-717.pdf','Mendez Montaño Lissette Estefania','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(997,'ESTC-718.pdf','Méndez Quiñonez Delia Jasmín','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(998,'ESTC-719.pdf','Mendez Roman Milena Lilibeth','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(999,'ESTC-71.pdf','KARINA ELIZABETH PEREA QUIÑONEZ','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(1000,'ESTC-720.pdf','Mendoza Párraga Lina Judith','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(1001,'ESTC-721.pdf','Mendoza Paz Sonia Mercedes','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(1002,'ESTC-722.pdf','Mendoza Velez Elvia Margarita','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(1003,'ESTC-723.pdf','Mendoza Zambrano Ilda Maritza','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(1004,'ESTC-724.pdf','Meneses Bautista Melany Nohely','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(1005,'ESTC-725.pdf','Mera Angulo Arancha Alejandra','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(1006,'ESTC-726.pdf','Mera Mora Shirley Sandrelly','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(1007,'ESTC-727.pdf','MERA MURILLO JOSE LUIS','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(1008,'ESTC-728.pdf','Mercy cristina ante valencia','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(1009,'ESTC-729.pdf','Merlin Garcia Yaritza Jereni','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(1010,'ESTC-72.pdf','CARMEN ROSMERY ZAMBRANO PINTO','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(1011,'ESTC-730.pdf','Mero Castillo Aikel Yumally','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(1012,'ESTC-731.pdf','Mero Garcia Esthela Marisol','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(1013,'ESTC-732.pdf','Mero Quintero Magali Lissette','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(1014,'ESTC-733.pdf','Mero Zuñiga Genaro Alexander','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(1015,'ESTC-734.pdf','Meza Jama Nallely Lissette','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(1016,'ESTC-735.pdf','Meza Ortiz Gabriela Cristina','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(1017,'ESTC-736.pdf','Meza Quiñónez Nelly Tania','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(1018,'ESTC-737.pdf','Mezones Mera Lady Didi','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(1019,'ESTC-738.pdf','Micolta Estupiñan Raquel Elizabeth','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(1020,'ESTC-739.pdf','Mideros Cabeza Jaritza Thais','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(1021,'ESTC-73.pdf','CARLOS QUIÑONEZ ARROYO','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(1022,'ESTC-740.pdf','Mina Angulo Esther Rocio','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(1023,'ESTC-741.pdf','Mina Banguera Maira Elizabeth','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(1024,'ESTC-742.pdf','Mina Barre Jose Ignacio','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(1025,'ESTC-743.pdf','Mina Caicedo Ruth Noemi','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(1026,'ESTC-744.pdf','Mina Cherre Ginger Nicole','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(1027,'ESTC-745.pdf','Mina Cortez Kevin Liviston','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(1028,'ESTC-746.pdf','Mina Luna Yadira Betty','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(1029,'ESTC-747.pdf','Mina Medina Gardenia Balvina','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(1030,'ESTC-748.pdf','Mina Mina Loida Roxana','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(1031,'ESTC-749.pdf','Mina Mina Marcela Cristina','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(1032,'ESTC-74.pdf','RENE MACIAS OCHOA','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(1033,'ESTC-750.pdf','Mina Monroy Evelin Daniela','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(1034,'ESTC-751.pdf','Mina Villacrés shynder cecilia','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(1035,'ESTC-752.pdf','Miranda Murillo Cindy Joely.','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(1036,'ESTC-753.pdf','Mite Estupiñan Angélica María','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(1037,'ESTC-754.pdf','Mite Estupiñan Johanna Jahaira','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(1038,'ESTC-755.pdf','Molina Simisterra Sindy Madeleine','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(1039,'ESTC-756.pdf','Moncada Cedeño Erika Marisol','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(1040,'ESTC-757.pdf','MONTALVO BOLAÑOS AURA','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(1041,'ESTC-758.pdf','Montaño cabezas Daisy Paola','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(1042,'ESTC-759.pdf','Montaño Freire Nicole Marina','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(1043,'ESTC-75.pdf','STEFANIA GAMEZ CABEZA','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(1044,'ESTC-760.pdf','Montaño guerrero jessica','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(1045,'ESTC-761.pdf','Montaño Mideros Lourdes','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(1046,'ESTC-762.pdf','Montaño Pinillo Haydee Jisella','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(1047,'ESTC-763.pdf','Montaño Quiñonez Doris Marcia','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(1048,'ESTC-764.pdf','Montaño Simisterra Kathya Jasmin','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(1049,'ESTC-765.pdf','Mora Jaramillo Andrea Lissette','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(1050,'ESTC-766.pdf','Mora Silba Liliana','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(1051,'ESTC-767.pdf','MORALES BRUNO KAROL MICHELLE','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(1052,'ESTC-768.pdf','EVELYN GISSELLA MORALES OBANDO','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(1053,'ESTC-769.pdf','Morales Quiñónez Teodora Inés','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(1054,'ESTC-76.pdf','ANABEL KATHERINE JAMA MARQUEZ','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(1055,'ESTC-770.pdf','MORALES REINA YUSLEIVY CAROLINA','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(1056,'ESTC-771.pdf','Morán Chichande Bianca Katherine','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(1057,'ESTC-772.pdf','Moreira Angulo Denys Michell','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(1058,'ESTC-773.pdf','Moreira García Karelis Anaís','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(1059,'ESTC-774.pdf','Moreira Illapa Angie Adriana','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(1060,'ESTC-775.pdf','Moreira Jaramillo Maisa Nicole','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(1061,'ESTC-776.pdf','Moreira Rosalez Wendy Tatiana','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(1062,'ESTC-777.pdf','Morejón Gallegos Lisbeth Danyeli','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(1063,'ESTC-778.pdf','Moreno Barrionuevo Geraldine Pierina','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(1064,'ESTC-779.pdf','Moreno Valencia Vivian Dayana','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(1065,'ESTC-77.pdf','MICHELLE GISSELLA BRAVO CHASING','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(1066,'ESTC-780.pdf','Moreno Valencia Vivian Dayana','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(1067,'ESTC-781.pdf','Mosquera López Melanie Yamel','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(1068,'ESTC-782.pdf','Mosquera Mesias Francesca Milagro','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(1069,'ESTC-783.pdf','MOSQUERA MURILLO JHELENNY JULIETH','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(1070,'ESTC-784.pdf','Mosquera Murillo Josseline Mayerly','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(1071,'ESTC-785.pdf','Mosquera Suárez Leída Teresa','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(1072,'ESTC-786.pdf','Muentes Manzaba Brittany Naomi','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(1073,'ESTC-787.pdf','Muentes Vivero María José','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(1074,'ESTC-788.pdf','Muñoz Buste Cindy ivette','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(1075,'ESTC-789.pdf','Muñoz Valdiviezo Maria Fernanda','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(1076,'ESTC-78.pdf','LILIAN ANDREA ESTUPIÑAN MARTIN','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(1077,'ESTC-790.pdf','Nadia hibeth chila cheme','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(1078,'ESTC-791.pdf','Napa Ortiz Thais Irene','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(1079,'ESTC-792.pdf','Navarro López Jeimy','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(1080,'ESTC-793.pdf','Nazareno Ayovi Jessenia Katherine','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(1081,'ESTC-794.pdf','Nazareno Caicedo Jenniffer Eudocia','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(1082,'ESTC-795.pdf','Nazareno caiceo Yajaira lisseth','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(1083,'ESTC-796.pdf','Nazareno Cedeño Aura Isabel','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(1084,'ESTC-797.pdf','Nazareno Dàjome Jeniffer Raquel','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(1085,'ESTC-798.pdf','NAZARENO JACOME SARAI BETSABETH','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(1086,'ESTC-799.pdf','Nazareno Moreno Roxon Fabricio','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(1087,'ESTC-79.pdf','BETSY ELIZABETH GONZALEZ ORTIZ','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(1088,'ESTC-7.pdf','DANNYS PADILLA QUIÑONEZ','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(1089,'ESTC-800.pdf','NAZARENO PERLAZA PAMELA CECILIA','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(1090,'ESTC-801.pdf','Nazareno Zambrano Alejandra MIcaela','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(1091,'ESTC-802.pdf','Neivi Dayana Cortez Valdez','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(1092,'ESTC-803.pdf','Nevarez Cheme Gissella Marina','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(1093,'ESTC-804.pdf','Nevarez Zambrano Luis Fabian','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(1094,'ESTC-805.pdf','Nieves Boya Ladie Christina','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(1095,'ESTC-806.pdf','Nieves Nieves Daniela Lisbeth','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(1096,'ESTC-807.pdf','Obando García Geannella Desiree','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(1097,'ESTC-808.pdf','Obando Garcia Katherine Victoria','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(1098,'ESTC-809.pdf','Obando Rodríguez Carmen Alexandra','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(1099,'ESTC-80.pdf','NALLELY LUCÍA VALENCIA HURTADO','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(1100,'ESTC-810.pdf','Obando Valencia Nayelhy Isamar','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(1101,'ESTC-811.pdf','Obregón Rodríguez Vanessa Stefania','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(1102,'ESTC-812.pdf','Ocampo Arroyo Irley Mayrovi','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(1103,'ESTC-813.pdf','Ochoa Espinoza Mirka Dileidy','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(1104,'ESTC-814.pdf','Olave Altafuya Arianna Ninoska','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(1105,'ESTC-815.pdf','Olave Altafuya Melanie Yaritza','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(1106,'ESTC-816.pdf','oliverio cortez yajaira lissette','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(1107,'ESTC-817.pdf','OLIVERO ESPINOZA SANDRA CECILIA','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(1108,'ESTC-818.pdf','OLIVEROS REALPE MAIRA ALEJANDRA','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(1109,'ESTC-819.pdf','Olivo Angulo Luis Kevin','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(1110,'ESTC-81.pdf','FERNANDA BIOJO CENTENO','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(1111,'ESTC-820.pdf','Olmedo Chilla Mariana Esperanza','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(1112,'ESTC-821.pdf','Oña Montaño Daniela katherine','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(1113,'ESTC-822.pdf','Ordóñez Clavijo José Gregorio','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(1114,'ESTC-823.pdf','Ordoñez Quiñones Tania Joselyn','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(1115,'ESTC-824.pdf','Ordoñez Ramirez Alisson Melissa','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(1116,'ESTC-825.pdf','Ordoñez Villa Maoly Mariela','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(1117,'ESTC-826.pdf','Orejuela Canga Flor Mercedes','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(1118,'ESTC-827.pdf','Orejuela Pachay Marilin Jamille','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(1119,'ESTC-828.pdf','Orellana Loor Karla Elizabeth','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(1120,'ESTC-829.pdf','Orellana Peralta Helton Renato','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(1121,'ESTC-82.pdf','ANA RAQUEL REASCO ORTIZ','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(1122,'ESTC-830.pdf','Orellana Vite Alex Isaías','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(1123,'ESTC-831.pdf','Ortega Castillo Tatiana Cecibel','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(1124,'ESTC-832.pdf','Ortega Lastre Tatiana Ligia','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(1125,'ESTC-833.pdf','Ortiz Bedoya Alisson suleika','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(1126,'ESTC-834.pdf','Ortiz chere jhon jairo','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(1127,'ESTC-835.pdf','ORTIZ CHUVA JHONY GERMÁN','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(1128,'ESTC-836.pdf','Ortiz guagua karla viviana','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(1129,'ESTC-837.pdf','ORTIZ QUINTERO YIRA MARIA','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(1130,'ESTC-838.pdf','Ortiz Tenorio Alexander Javier','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(1131,'ESTC-839.pdf','Ortiz Villega Marlene Jacqueline','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(1132,'ESTC-83.pdf','ANDREA PAULINA GARCIA GONZALEZ','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(1133,'ESTC-840.pdf','ORTIZ ZULETA SHIRLEY NICOL','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(1134,'ESTC-841.pdf','Ospina Angulo Madeleine Dayana','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(1135,'ESTC-842.pdf','Oviedo Gamez Joselyn Bellanires','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(1136,'ESTC-843.pdf','Oviedo Gamez Joselyn Bellanires','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(1137,'ESTC-844.pdf','Pacheco Drouet Mery Cristel','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(1138,'ESTC-845.pdf','PACHECO LENIS ONGRID JULIETA','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(1139,'ESTC-846.pdf','Pachito Valencia Jemniffer Johanna','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(1140,'ESTC-847.pdf','Pachito Valencia Jennifer Johanna','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(1141,'ESTC-848.pdf','Pacho Ortiz Angie Tatiana','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(1142,'ESTC-849.pdf','Padilla Vera Mirian Julexy','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(1143,'ESTC-84.pdf','KARELYS ANDREINA BETANCOURT','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(1144,'ESTC-850.pdf','Palacios Falcones Rosa Karina','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(1145,'ESTC-851.pdf','Palacios García Victoria Lilibeth','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(1146,'ESTC-852.pdf','Palma canchingre Jessica Johanna','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(1147,'ESTC-853.pdf','Palma canchingre Jessica JOHANNA','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(1148,'ESTC-854.pdf','Palomino Angulo Ginger Dayana','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(1149,'ESTC-855.pdf','Panchano Castillo Mirta Paola','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(1150,'ESTC-856.pdf','Panezo Cortez Viviana Narcisa','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(1151,'ESTC-857.pdf','Paredes Méndez Mariuxi Yanara','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(1152,'ESTC-858.pdf','Pata Colobon Nicol Madeleis','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(1153,'ESTC-859.pdf','Patiño Alava Joselin Gabriela','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(1154,'ESTC-85.pdf','JENIFFER CRUEL VALAREZO','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(1155,'ESTC-860.pdf','Payán Obando Tania Elizabeth','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(1156,'ESTC-861.pdf','PAZ CEDEÑO JOSSELIN GABRIELA','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(1157,'ESTC-862.pdf','Pazmiño Cabezas Oreana Norelia','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(1158,'ESTC-863.pdf','Pazmiño Mora Jimmy Andrés','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(1159,'ESTC-864.pdf','Peralta Aparicio Josselyn Lilibeth','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(1160,'ESTC-865.pdf','PERALTa CASIERRA DIELKA ELIANA','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(1161,'ESTC-866.pdf','Peralta Chichande Aliana Gladys','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(1162,'ESTC-867.pdf','Peralta Gracia Jenniffer Annabella','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(1163,'ESTC-868.pdf','Peralta Jaramillo Lissette Yasmin','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(1164,'ESTC-869.pdf','Perdomo Cheme Emily Graciela','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(1165,'ESTC-86.pdf','KARLA LISSETTE LUGO ORDOÑEZ','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(1166,'ESTC-870.pdf','Perea Arana Rosangela','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(1167,'ESTC-871.pdf','Perea Gutierrez Romina Yeraldina','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(1168,'ESTC-872.pdf','PEREA MINA JANISE JAMILETH','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(1169,'ESTC-873.pdf','Perea Napa Ivana Noelia','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(1170,'ESTC-874.pdf','Perea Tarira Cinthya Marlene','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(1171,'ESTC-875.pdf','PÉREZ LUCAS JENNIFFER LIZBETH','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(1172,'ESTC-876.pdf','Perugachi Zambrano Jenniffer Tatiana','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(1173,'ESTC-877.pdf','Pianchiche Añapa Yahaira Lethycia','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(1174,'ESTC-878.pdf','pianchiche delacruz alba eulalia','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(1175,'ESTC-879.pdf','Piedra Ordoñez Tatiana Valeria','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(1176,'ESTC-87.pdf','ERIKA ELIANA BARBOSA QUINTERO','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(1177,'ESTC-880.pdf','Pinargorte Arias Ingrid Isamar','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(1178,'ESTC-881.pdf','Pinargote Leones Yandri Eduardo','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(1179,'ESTC-882.pdf','Pinargote Leones Yandri Eduardo','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(1180,'ESTC-883.pdf','Pineda Balarezo Melanie Elizabeth','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(1181,'ESTC-884.pdf','Pita Caicedo Karla Patricia','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(1182,'ESTC-885.pdf','Piza López Renata Gabriela','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(1183,'ESTC-886.pdf','Plaza Alvarez Raisa Carolina','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(1184,'ESTC-887.pdf','Plaza Bonifaz Giovanna Naomi','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(1185,'ESTC-888.pdf','Plaza Cruel Joao Fernando','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(1186,'ESTC-889.pdf','Plaza Hurtado Suleika Maritza','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(1187,'ESTC-88.pdf','LAURA CISNERO VALENCIA','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(1188,'ESTC-890.pdf','Plaza Hurtado Suleika Maritza','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(1189,'ESTC-891.pdf','Plaza Quiñones Cindy THAIS','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(1190,'ESTC-892.pdf','PONCE SANTANA ROXANA ALEJANDRA','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(1191,'ESTC-893.pdf','POROZO Méndez María Fernanda','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(1192,'ESTC-894.pdf','Porozo Mosquera Erika Elena','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(1193,'ESTC-895.pdf','Posligua zapata Sherley Estefanía','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(1194,'ESTC-896.pdf','Pozo Cañola María Belén','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(1195,'ESTC-897.pdf','Pozo Cumbal Andrea Fernanda','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(1196,'ESTC-898.pdf','Pozo Plaza Richard Kenneth','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(1197,'ESTC-899.pdf','Prado Reyna Adriana Ivett','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(1198,'ESTC-89.pdf','KAREN ESPARZA CASANOVA','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(1199,'ESTC-8.pdf','LIZ SANCHEZ MERO','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(1200,'ESTC-900.pdf','Preciado Méndez Danny Mariuxi','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(1201,'ESTC-901.pdf','Preciado Ortiz Luis Fernando','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(1202,'ESTC-902.pdf','Preciado velasco ana karen','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(1203,'ESTC-903.pdf','Preciado velasco ana karen','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(1204,'ESTC-904.pdf','Prías Menéndez Nayeli Anahí','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(1205,'ESTC-905.pdf','Prias Tenorio Nila Estefania','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(1206,'ESTC-906.pdf','Proaño Mero Astrid','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(1207,'ESTC-907.pdf','Proaño Mero Astrid Britany','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(1208,'ESTC-908.pdf','Proaño Montaño Johanna Angelina','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(1209,'ESTC-909.pdf','Proaño Ortiz Sandra Yahaira','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(1210,'ESTC-90.pdf','ALIANA PERALTA CHICHANDE','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(1211,'ESTC-910.pdf','Proaño Villacres Mioshoty Romelia','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(1212,'ESTC-911.pdf','Pulluquitin Parraga','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(1213,'ESTC-912.pdf','PULLUQUITIN PÁRRAGA MERY JEM','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(1214,'ESTC-913.pdf','Quelal Mora Dayse Silvana','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(1215,'ESTC-914.pdf','Quijije Zambrano Margely Jamileth','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(1216,'ESTC-915.pdf','Quimi Tumbaco Maritza Nayeli','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(1217,'ESTC-916.pdf','Quimis Tumbaco Joselyn Yaritza','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(1218,'ESTC-917.pdf','Quintero Arroyo Maria Nela','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(1219,'ESTC-918.pdf','Quintero Caicedo Mariana Maribel','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(1220,'ESTC-919.pdf','Quintero Candelejo Cinthia Gissela','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(1221,'ESTC-91.pdf','NURIS DE LA CRUZ SIMISTERRA','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(1222,'ESTC-920.pdf','Quintero Candelejo Nayra Mayin','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(1223,'ESTC-921.pdf','Quintero Mendez Jasmin Andreina','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(1224,'ESTC-922.pdf','Quintero Torres Anggie Mishell','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(1225,'ESTC-923.pdf','Quiñones Quiñonez Maria Andrea','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(1226,'ESTC-924.pdf','Quiñonez Angulo Josselyn Noelia','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(1227,'ESTC-925.pdf','Quiñónez Angulo Luisa Melina','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(1228,'ESTC-926.pdf','Quiñonez Arboleda Fernanda Yanina','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(1229,'ESTC-927.pdf','Quiñonez Arboleda Pierina Celina','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(1230,'ESTC-928.pdf','Quiñonez Arboleda Pierina Celina','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(1231,'ESTC-929.pdf','Quiñonez Arroyo Briyi Thais','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(1232,'ESTC-92.pdf','DANIELA ESTEFANIA HEREDIA MARCHAN','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(1233,'ESTC-930.pdf','Quiñonez Arroyo Carlos Raul','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(1234,'ESTC-931.pdf','Quiñonez Arroyo Carlos Raul','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(1235,'ESTC-932.pdf','Quiñónez Bravo Mayra Alejandra','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(1236,'ESTC-933.pdf','Quiñonez Castillo Silvia Milena','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(1237,'ESTC-934.pdf','Quiñónez Chichande Gissela','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(1238,'ESTC-935.pdf','Quiñonez Corozo Ignacio Joel','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(1239,'ESTC-936.pdf','Quiñonez Esterilla Francisca Yojana','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(1240,'ESTC-937.pdf','Quiñónez Iturre Nasly Naomi','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(1241,'ESTC-938.pdf','Quiñónez Jama Mileidy','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(1242,'ESTC-939.pdf','Quiñónez Jaramillo Marisela Sany','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(1243,'ESTC-93.pdf','PRISCILA ELISETH HEREDIA MARCHAN','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(1244,'ESTC-940.pdf','Quiñonez Lemos Kenny Michelle','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(1245,'ESTC-941.pdf','Quiñonez Mairongo Daniel David','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(1246,'ESTC-942.pdf','Quiñonez Méndez Jorge Javier','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(1247,'ESTC-943.pdf','Quiñónez Nazareno Carla Yaritza','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(1248,'ESTC-944.pdf','Quiñonez Ordoñez Doris Amelia','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(1249,'ESTC-945.pdf','Quiñonez Ortiz Darwin Esteban','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(1250,'ESTC-946.pdf','Quiñonez Salazar Carmen Aura','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(1251,'ESTC-947.pdf','Quiñónez satizabal Jessica Elizabeth','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(1252,'ESTC-948.pdf','Quiñonez Zambrano Yulexy Vanessa','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(1253,'ESTC-949.pdf','Quiroz Yugcha Tyrone Agustin','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(1254,'ESTC-94.pdf','PAOLA ANDREA CAMACHO CAICEDO','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(1255,'ESTC-950.pdf','Quispe Ortiz Edic Yoelin','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(1256,'ESTC-951.pdf','Ramirez Arce Cecilia Juleisy','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(1257,'ESTC-952.pdf','Ramirez Arce Tamara Solanyi','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(1258,'ESTC-953.pdf','Ramírez Demera Sara Shaling','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(1259,'ESTC-954.pdf','Ramírez Dueñas Cosme Salvador','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(1260,'ESTC-955.pdf','Ramírez Falcones Ana Grey','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(1261,'ESTC-956.pdf','Ramírez Manzaba Oscar Antonio','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(1262,'ESTC-957.pdf','Ramírez Mina dayana Lisbeth','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(1263,'ESTC-958.pdf','Ramírez Parrales Denisse Cristina','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(1264,'ESTC-959.pdf','Ramos Plaza Adriana Juliza','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(1265,'ESTC-95.pdf','JOSÉ LUIS RODRÍGUEZ PULLAS','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(1266,'ESTC-960.pdf','Reasco Meza Alis Dayana','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(1267,'ESTC-961.pdf','Remache Guamàn Esthela Janeth','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(1268,'ESTC-962.pdf','Rene Cristobal Macias Ochoa','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(1269,'ESTC-963.pdf','Rengifo gomez cindy paola','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(1270,'ESTC-964.pdf','Renteria Castro Lesly','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(1271,'ESTC-965.pdf','Reyes Bolaños Mailevis Ibette','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(1272,'ESTC-966.pdf','Reyes Díaz Carolina Esperanza','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(1273,'ESTC-967.pdf','Reyes Hurtado Bellanire Graciela','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(1274,'ESTC-968.pdf','REYES HURTADO NADIESKA MARLENE','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(1275,'ESTC-969.pdf','Reyes Jama Inés Alexandra','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(1276,'ESTC-96.pdf','VANESSA STEFANIA OBREGON','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(1277,'ESTC-970.pdf','Reyes Mendoza Mercedes Johanna','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(1278,'ESTC-971.pdf','REYES MERA THAIS LISSETTE','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(1279,'ESTC-972.pdf','Reyes Solórzano Keila Yanara','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(1280,'ESTC-973.pdf','Riasco Ortiz Ana Raquel','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(1281,'ESTC-974.pdf','Rincones Valencia Evelyn Patricia','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(1282,'ESTC-975.pdf','Rivera Ganan Jenniffer Hillary','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(1283,'ESTC-976.pdf','Rivera Uvidia Tatiana Janeth','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(1284,'ESTC-977.pdf','Robles Moreira Katty Paola','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(1285,'ESTC-978.pdf','Robles Vélez Sheylla Micaela','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(1286,'ESTC-979.pdf','Rodríguez Bajaña Aanagely Nicole','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(1287,'ESTC-97.pdf','MARIA CECILIA BATIOJA SEGURA','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(1288,'ESTC-980.pdf','RODRÍGUEZ BONE ODALYS BRIGGITTE','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(1289,'ESTC-981.pdf','Rodriguez Casierra Jessica Antonella','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(1290,'ESTC-982.pdf','Rodríguez Castillo Nayeli Fernanda','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(1291,'ESTC-983.pdf','Rodríguez Chávez Leonel Alexander','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(1292,'ESTC-984.pdf','Rodríguez García Martha Daniela','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(1293,'ESTC-985.pdf','Rodríguez Matamba Darla Karelis','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(1294,'ESTC-986.pdf','Rodríguez Montes Dayana Michelle','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(1295,'ESTC-987.pdf','RODRIGUEZ ORTIZ ALISSON THAIS','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(1296,'ESTC-988.pdf','Rodriguez preciado viviana stefania','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(1297,'ESTC-989.pdf','Rodríguez Pullas José Luis','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(1298,'ESTC-98.pdf','JENNIFFER VALERIA SALAZAR DE LA CRUZ','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(1299,'ESTC-990.pdf','Rodríguez Quiñonez Thais Doménica','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(1300,'ESTC-991.pdf','Rodríguez Vernaza Michelle Yamile','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(1301,'ESTC-992.pdf','Rodríguez Vilela Fabio Ernesto.','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(1302,'ESTC-993.pdf','Rojas Montezuma Romina Nathaly','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(1303,'ESTC-994.pdf','Rojas Vera Alberto Taylor','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(1304,'ESTC-995.pdf','Román Zambrano Karelys Milena','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(1305,'ESTC-996.pdf','Romero Cuero Ana Cristina','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(1306,'ESTC-997.pdf','Romero hurtado Aida Ester','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(1307,'ESTC-998.pdf','Romina Nathaly Rojas Montezuma','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(1308,'ESTC-999.pdf','Rosales Cabeza Josselyn Lilibeth','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(1309,'ESTC-99.pdf','NAYELI ESTEFANIA BALLESTEROS','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL),(1310,'ESTC-9.pdf','DENILSON ANTONY MINA MINA','http://congresoutlvte.org/facped/Repositorio/Certificados/Estudiantes/',NULL);
/*!40000 ALTER TABLE `certificado` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cinturon`
--

DROP TABLE IF EXISTS `cinturon`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cinturon` (
  `idcinturon` int NOT NULL AUTO_INCREMENT,
  `color` varchar(45) DEFAULT NULL,
  `idarticulo` int NOT NULL,
  PRIMARY KEY (`idcinturon`,`idarticulo`),
  KEY `fk_cinturon_articulo1_idx` (`idarticulo`),
  CONSTRAINT `fk_cinturon_articulo1` FOREIGN KEY (`idarticulo`) REFERENCES `articulo` (`idarticulo`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cinturon`
--

LOCK TABLES `cinturon` WRITE;
/*!40000 ALTER TABLE `cinturon` DISABLE KEYS */;
INSERT INTO `cinturon` VALUES (1,'BLANCO',1);
/*!40000 ALTER TABLE `cinturon` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary view structure for view `cinturon1`
--

DROP TABLE IF EXISTS `cinturon1`;
/*!50001 DROP VIEW IF EXISTS `cinturon1`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `cinturon1` AS SELECT 
 1 AS `idcinturon`,
 1 AS `color`,
 1 AS `elarticulo`*/;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `cliente`
--

DROP TABLE IF EXISTS `cliente`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cliente` (
  `idcliente` int NOT NULL AUTO_INCREMENT,
  `idpersona` int NOT NULL,
  `idinstitucion` int NOT NULL,
  `fechainscripcion` date DEFAULT NULL,
  PRIMARY KEY (`idcliente`,`idpersona`,`idinstitucion`),
  KEY `fk_cliente_persona1_idx` (`idpersona`),
  KEY `fk_cliente_institucion1_idx` (`idinstitucion`),
  CONSTRAINT `fk_cliente_institucion1` FOREIGN KEY (`idinstitucion`) REFERENCES `institucion` (`idinstitucion`),
  CONSTRAINT `fk_cliente_persona1` FOREIGN KEY (`idpersona`) REFERENCES `persona` (`idpersona`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cliente`
--

LOCK TABLES `cliente` WRITE;
/*!40000 ALTER TABLE `cliente` DISABLE KEYS */;
INSERT INTO `cliente` VALUES (2,34,3,'2022-01-06'),(3,35,3,'2022-01-31'),(4,36,3,'2022-01-28'),(5,38,3,'2022-01-14'),(6,39,3,'2022-01-07'),(7,40,3,'2022-01-13'),(8,41,3,'2022-01-13'),(9,42,3,'2022-01-13'),(10,43,3,'2022-01-21'),(11,44,3,'2022-01-13'),(12,45,3,'2022-01-19'),(13,46,3,'2022-01-14'),(14,50,3,'2021-11-30');
/*!40000 ALTER TABLE `cliente` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary view structure for view `cliente1`
--

DROP TABLE IF EXISTS `cliente1`;
/*!50001 DROP VIEW IF EXISTS `cliente1`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `cliente1` AS SELECT 
 1 AS `idcliente`,
 1 AS `idpersona`,
 1 AS `elcliente`,
 1 AS `idinstitucion`,
 1 AS `lainstitucion`,
 1 AS `fechainscripcion`*/;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `correo`
--

DROP TABLE IF EXISTS `correo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `correo` (
  `idcorreo` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) DEFAULT NULL,
  `idpersona` int NOT NULL,
  `idcorreo_estado` int NOT NULL,
  PRIMARY KEY (`idcorreo`,`idpersona`),
  KEY `fk_correo_persona1_idx` (`idpersona`),
  KEY `fk_correo_correo_estado1_idx` (`idcorreo_estado`),
  CONSTRAINT `fk_correo_correo_estado1` FOREIGN KEY (`idcorreo_estado`) REFERENCES `correo_estado` (`idcorreo_estado`),
  CONSTRAINT `fk_correo_persona1` FOREIGN KEY (`idpersona`) REFERENCES `persona` (`idpersona`)
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `correo`
--

LOCK TABLES `correo` WRITE;
/*!40000 ALTER TABLE `correo` DISABLE KEYS */;
INSERT INTO `correo` VALUES (4,'geralva@hotmail.es',11,1),(5,'vdtr.eqm1995@gmail.com',27,1),(6,'wcontreras_1994@hotmail.com',13,1),(7,'bustamantelopezmariansonia@gmail.com',25,1),(8,'jovanotty_85@hotmail.com',21,1),(9,'gerardo.solano@utelvt.edu.ec',20,1),(10,'yamiloelunico@gmail.com',19,1),(11,'cesarmanchay3@gmail.com',17,1),(12,'veronikita_linda@hotmail.es',14,1),(13,'roberto_edwin1979@hotmail.com',15,1),(14,'jacksonmanchay@yahoo.es',28,1),(15,'ilsi.n31@hotmail.com',9,1),(16,'rafael.perez@policia.gob.ec',16,1),(17,'deyanirachila@hotmail.com',26,1),(18,'nela.qocortes91@gmail.com',24,1),(19,'byronramirez1994@gmail.com',18,1),(21,'educaysoft@gmail.com',8,1),(22,'kevinaguilar16sm@gmial.com',29,1),(23,'damaris.miranda@utelvte.edu.ec',31,1),(24,'jimmypaz_22@hotmail.com',12,1),(25,'stefydiaz_1325@hotmail.com',10,1),(26,'congresoutlvte@utelvt.edu.ec',32,1),(27,'admin',33,1),(28,'francis.christopher@egbfcristorey.edu.ec',34,1),(29,'stefaniaz90@gmail.com',10,1),(30,'jimmy.pazmino.torres@utelvt.edu.ec',12,1),(31,'gasolanog@gmail.com',20,1),(32,'andres-martinez_1986@gmail.com',49,1),(35,'paperalta@claro.com.ec',23,1),(36,'edison.capurro@utelvt.edu.ec',51,1),(37,'mirian.reyes@utelvt.edu.ec',55,1),(38,'cinthya.castillo@utelvt.edu.ec',56,1),(39,'williamfranc25@gmail.com',50,1),(42,'mateo@gmail.com',60,1),(43,'fiorela@gmail.com',61,1),(44,'mirian.reyes@utelvt.edu.ec',7,1);
/*!40000 ALTER TABLE `correo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary view structure for view `correo1`
--

DROP TABLE IF EXISTS `correo1`;
/*!50001 DROP VIEW IF EXISTS `correo1`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `correo1` AS SELECT 
 1 AS `idcorreo`,
 1 AS `elcorreo`,
 1 AS `lapersona`*/;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `correo_estado`
--

DROP TABLE IF EXISTS `correo_estado`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `correo_estado` (
  `idcorreo_estado` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idcorreo_estado`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `correo_estado`
--

LOCK TABLES `correo_estado` WRITE;
/*!40000 ALTER TABLE `correo_estado` DISABLE KEYS */;
INSERT INTO `correo_estado` VALUES (1,'ENLINEA');
/*!40000 ALTER TABLE `correo_estado` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `departamento`
--

DROP TABLE IF EXISTS `departamento`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `departamento` (
  `iddepartamento` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) DEFAULT NULL,
  `idunidad` int NOT NULL,
  PRIMARY KEY (`iddepartamento`),
  KEY `fk_departamento_unidad1_idx` (`idunidad`),
  CONSTRAINT `fk_departamento_unidad1` FOREIGN KEY (`idunidad`) REFERENCES `unidad` (`idunidad`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `departamento`
--

LOCK TABLES `departamento` WRITE;
/*!40000 ALTER TABLE `departamento` DISABLE KEYS */;
INSERT INTO `departamento` VALUES (1,'Coordinación de Ingenieria en Tecnología de l',1);
/*!40000 ALTER TABLE `departamento` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `destinatario`
--

DROP TABLE IF EXISTS `destinatario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `destinatario` (
  `iddestinatario` int NOT NULL AUTO_INCREMENT,
  `iddocumento` int NOT NULL,
  `idpersona` int NOT NULL COMMENT '	',
  PRIMARY KEY (`iddestinatario`,`iddocumento`,`idpersona`),
  KEY `fk_documentos_has_persona_persona1_idx` (`idpersona`),
  KEY `fk_documentos_has_persona_documentos1_idx` (`iddocumento`),
  CONSTRAINT `fk_documentos_has_persona_documentos1` FOREIGN KEY (`iddocumento`) REFERENCES `documento` (`iddocumento`),
  CONSTRAINT `fk_documentos_has_persona_persona1` FOREIGN KEY (`idpersona`) REFERENCES `persona` (`idpersona`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `destinatario`
--

LOCK TABLES `destinatario` WRITE;
/*!40000 ALTER TABLE `destinatario` DISABLE KEYS */;
INSERT INTO `destinatario` VALUES (1,1,7),(4,4,13),(5,3,13),(3,3,15);
/*!40000 ALTER TABLE `destinatario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary view structure for view `destinatario1`
--

DROP TABLE IF EXISTS `destinatario1`;
/*!50001 DROP VIEW IF EXISTS `destinatario1`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `destinatario1` AS SELECT 
 1 AS `iddocumento`,
 1 AS `asunto`,
 1 AS `idpersona`,
 1 AS `nombres`*/;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `detainventario`
--

DROP TABLE IF EXISTS `detainventario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `detainventario` (
  `iddetainventario` int NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(100) DEFAULT NULL,
  `ubicacion` varchar(100) DEFAULT NULL,
  `idarticulo` int NOT NULL,
  `idinventario` int NOT NULL,
  `idpersona` int NOT NULL,
  PRIMARY KEY (`iddetainventario`,`idarticulo`,`idinventario`),
  KEY `fk_detainventario_articulo1_idx` (`idarticulo`),
  KEY `fk_detainventario_inventario1_idx` (`idinventario`),
  KEY `fk_detainventario_persona1_idx` (`idpersona`),
  CONSTRAINT `fk_detainventario_articulo1` FOREIGN KEY (`idarticulo`) REFERENCES `articulo` (`idarticulo`),
  CONSTRAINT `fk_detainventario_inventario1` FOREIGN KEY (`idinventario`) REFERENCES `inventario` (`idinventario`),
  CONSTRAINT `fk_detainventario_persona1` FOREIGN KEY (`idpersona`) REFERENCES `persona` (`idpersona`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `detainventario`
--

LOCK TABLES `detainventario` WRITE;
/*!40000 ALTER TABLE `detainventario` DISABLE KEYS */;
INSERT INTO `detainventario` VALUES (1,'en perfecto estado','laboratorio ',1,1,54),(2,'SE ENCUENRA EN BUEN ESTASO','EN LA CASA DE LA DUEÑA',4,2,50);
/*!40000 ALTER TABLE `detainventario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `directorio`
--

DROP TABLE IF EXISTS `directorio`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `directorio` (
  `iddirectorio` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) DEFAULT NULL,
  `ruta` varchar(200) DEFAULT NULL,
  `descripcion` text,
  `idordenador` int NOT NULL,
  PRIMARY KEY (`iddirectorio`,`idordenador`),
  KEY `fk_directorio_ordenador1_idx` (`idordenador`),
  CONSTRAINT `fk_directorio_ordenador1` FOREIGN KEY (`idordenador`) REFERENCES `ordenador` (`idordenador`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `directorio`
--

LOCK TABLES `directorio` WRITE;
/*!40000 ALTER TABLE `directorio` DISABLE KEYS */;
INSERT INTO `directorio` VALUES (1,'pdf','pdf','',1),(2,'pdf','/pdfs',NULL,1),(3,'Repositorio','/Repositorio/','',7),(4,'Repositorio','/Repositorio/',NULL,8);
/*!40000 ALTER TABLE `directorio` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary view structure for view `directorio1`
--

DROP TABLE IF EXISTS `directorio1`;
/*!50001 DROP VIEW IF EXISTS `directorio1`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `directorio1` AS SELECT 
 1 AS `iddirectorio`,
 1 AS `nombre`,
 1 AS `ruta`,
 1 AS `descripcion`,
 1 AS `elordenador`*/;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `docente`
--

DROP TABLE IF EXISTS `docente`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `docente` (
  `iddocente` int NOT NULL AUTO_INCREMENT,
  `idpersona` int NOT NULL,
  PRIMARY KEY (`iddocente`,`idpersona`),
  KEY `fk_docente_persona1_idx` (`idpersona`),
  CONSTRAINT `fk_docente_persona1` FOREIGN KEY (`idpersona`) REFERENCES `persona` (`idpersona`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `docente`
--

LOCK TABLES `docente` WRITE;
/*!40000 ALTER TABLE `docente` DISABLE KEYS */;
/*!40000 ALTER TABLE `docente` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `documento`
--

DROP TABLE IF EXISTS `documento`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `documento` (
  `iddocumento` int NOT NULL AUTO_INCREMENT,
  `fechaelaboracion` date DEFAULT NULL,
  `asunto` varchar(200) DEFAULT NULL,
  `archivopdf` varchar(100) DEFAULT NULL,
  `fechaentrerecep` datetime DEFAULT NULL,
  `observacion` text,
  `idtipodocu` int NOT NULL,
  `ubicacion` varchar(100) DEFAULT NULL,
  `idordenador` int NOT NULL,
  `iddirectorio` int NOT NULL,
  `iddocumento_estado` int NOT NULL,
  PRIMARY KEY (`iddocumento`,`idtipodocu`),
  KEY `fk_documento_tipodocu1_idx` (`idtipodocu`),
  KEY `fk_documento_ordenador1_idx` (`idordenador`),
  KEY `fk_documento_directorio1_idx` (`iddirectorio`),
  KEY `fk_documento_documento_estado1_idx` (`iddocumento_estado`),
  CONSTRAINT `fk_documento_directorio1` FOREIGN KEY (`iddirectorio`) REFERENCES `directorio` (`iddirectorio`),
  CONSTRAINT `fk_documento_documento_estado1` FOREIGN KEY (`iddocumento_estado`) REFERENCES `documento_estado` (`iddocumento_estado`),
  CONSTRAINT `fk_documento_ordenador1` FOREIGN KEY (`idordenador`) REFERENCES `ordenador` (`idordenador`),
  CONSTRAINT `fk_documento_tipodocu1` FOREIGN KEY (`idtipodocu`) REFERENCES `tipodocu` (`idtipodocu`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `documento`
--

LOCK TABLES `documento` WRITE;
/*!40000 ALTER TABLE `documento` DISABLE KEYS */;
INSERT INTO `documento` VALUES (1,'2021-09-02','Documento de prueba','Planificacion-MTI.pdf','2021-09-22 00:00:00','Este es un documento de prueba que se sube',2,'http://educaysoft.org/Repositorio/',7,3,0),(3,'2021-09-17','prueba de documento recibido','2021-09-17-MBOD-000003.pdf','2021-09-23 00:00:00','Esta es un documeot de prueba',1,'http://educaysoft.org/Repositorio/',7,3,0),(4,'2021-09-24','RECLAMO SOBRE NOTAS','cronograma_y_plana_docente_Maestrías_2021-2021.pdf','2021-09-30 00:00:00','UN RECLAMO SOBRE NOTAS ATRASADAS ',3,'http://educaysoft.org/Repositorio/',0,0,0),(5,'2021-09-18','SOLICITUD DE MATRICULA PARA EL PERIODO 2021-1S','PagoRosangelaMesEnero.pdf','2021-09-20 00:00:00','EL DOCUMENTO ES UN PAGO',2,'http://educaysoft.org/Repositorio/',0,0,0),(6,'2021-09-21','CORRECCION DE NOTAS DEL SEGUNDO PARCIAL 2021-1S','','2021-09-22 00:00:00','ESTE DOCUMENTO LO RECIBO EN LA OFICION ',1,'http://educaysoft.org/Repositorio/',0,0,0),(7,'2022-01-10','PRUEBA EN LA OFIINA HIGHKICK','AgendaFinal .pdf','2022-01-10 00:00:00','',1,'http://educaysoft.org/Repositorio/',0,0,0),(8,'2022-01-14','SOBRE TESIS DE MAESTRIA','documento.pdf','2022-01-20 00:00:00','XXASDFAD',1,'http://educaysoft.org/Repositorio/',0,0,0),(9,'2022-01-14','UNA IMAGEN EN PDF','secuencia.pdf','2022-01-21 00:00:00','',1,'http://educaysoft.org/Repositorio/',0,0,0),(10,'2022-01-14','zzzzzzzzzzzzzzzzz','secuencia.pdf','2022-01-21 00:00:00','',1,'http://educaysoft.org/Repositorio/',0,0,0),(11,'2022-01-21','PRIMER DOCUENTO EN REPOSITORIO ','secuencia.pdf','2022-01-27 00:00:00','',1,'http://educaysoft.org/Repositorio/',0,0,0),(12,'2022-01-14','UN ARCHOVO ON UN NOMBRE CORRECTO','2022-01-14-SA-000012.pdf','2022-01-21 00:00:00','UN ARCHIVO CON UN NOMBRE CORRECTO A PARTIR DE LA FECHA DE CREAION',1,'http://educaysoft.org/Repositorio/',0,0,0),(13,'2022-01-17','TESIS DE GRADO DE LA CARRRER DE TECNOLOGÍA DE LA INFORMACIÓN','','2022-01-27 00:00:00','',7,'http://educaysoft.org/Repositorio/',0,0,0),(14,'2022-01-10','TESIS DE GRAOD DE JAVIER QUIÑONEZ','2022-01-10-LAYR-000014.pdf','2022-01-17 00:00:00','',7,'http://educaysoft.org/Repositorio/',7,3,0),(15,'2015-03-19','“IDENTIFICACIÓN DE BACTERIAS PATÓGENAS EN CHORIZOS DE\r\nFABRICACIÒN ARTESANAL, QUE SE EXPENDEN EN EL PARQUE\r\nINFANTIL, ROBERTO LUIS CERVANTES AÑO 2014”','2015-03-19-CE-000015.pdf','2022-01-18 00:00:00','',7,'http://educaysoft.org/Repositorio/',0,0,0),(16,'2013-01-01','ESTUDIO DE LA CONTAMINACIÓN ACÚSTICA EN LA LOCACIÓN PETROLERA OSO G- BLOQUE 7, LOS EFECTOS SECUNDARIOS EN LA SALUD DE LOS TRABAJADORES Y PLAN DE MANJO ACÚSTICO','2013-01-01-RLNMM-000016.pdf','2013-01-01 00:00:00','TECNÓLOGO EN OPERACIONES DE PLANTAS INDUSTRIALES',8,'http://educaysoft.org/Repositorio/',0,0,0),(17,'2022-01-19','“DISEÑO DE UNA SOLUCIÓN QUE PERMITA GESTIONAR\r\nLA AUTOMATIZACIÓN DEL REGISTRO DE MATRÍCULA\r\nDE LOS ESTUDIANTES DE LA UNIDAD EDUCATIVA\r\nFISCOMISIONAL “DON BOSCO” DE LA CIUDAD DE\r\nESMERALDAS”','2022-01-19-CMCE-000017.pdf','2022-01-28 00:00:00','',8,'http://educaysoft.org/Repositorio/',0,0,0),(18,'2022-01-28','cc',NULL,'2022-01-28 00:00:00','cccccxxxx',1,NULL,7,3,0),(19,'2022-01-28','AAAAAAAAAAAAAAAA','2022-01-28-QAID-000019.pdf','2022-01-28 00:00:00','BBBBBBBBBBBBB',7,NULL,7,3,0),(20,'2022-01-21','OTRA PRUEBA ','2022-01-21-QMVE-000020.pdf','2022-01-21 00:00:00','OPTRA PRUEABA',8,NULL,7,3,0),(23,'2022-01-20','PRUEBA CON EL EMISOR',NULL,'2022-01-21 00:00:00','',7,NULL,7,3,0),(24,'2022-02-09','PRUEBA DE GRABAR NOMBRE DE ARCHIVO',NULL,'0000-00-00 00:00:00','',8,NULL,7,3,0),(25,'2022-02-20','OTRA PRUEBA PARA GRABAR DIRECTAMENTE EL NOMBRE DEL ARCHIVO','2022-02-20--0025','0000-00-00 00:00:00','',8,NULL,7,3,0),(26,'2022-02-20','PRUEBA 1',NULL,'0000-00-00 00:00:00','',7,NULL,7,3,0),(27,'2022-02-20','PRUEBA 1','2022-02-20--0027','0000-00-00 00:00:00','',7,NULL,7,3,0),(28,'2022-02-27','OTRA PRUEBA','','0000-00-00 00:00:00','',7,NULL,7,3,1),(29,'2022-02-27','OTRA PRUEBA','2022-02-27-MCBV-0029','0000-00-00 00:00:00','',7,NULL,7,3,1),(30,'2022-02-27','PRUEBA DE CARGADO ','2022-02-27-LAYR-0030','0000-00-00 00:00:00','',7,NULL,7,3,2),(31,'2022-03-04','pruba nuevo repos','2022-03-04-MOCA-0031','0000-00-00 00:00:00','',8,NULL,8,4,1);
/*!40000 ALTER TABLE `documento` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary view structure for view `documento1`
--

DROP TABLE IF EXISTS `documento1`;
/*!50001 DROP VIEW IF EXISTS `documento1`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `documento1` AS SELECT 
 1 AS `iddocumento`,
 1 AS `autor`,
 1 AS `asunto`,
 1 AS `fechaelaboracion`,
 1 AS `archivopdf`,
 1 AS `idtipodocu`,
 1 AS `eltipodocu`,
 1 AS `ruta`*/;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `documento_estado`
--

DROP TABLE IF EXISTS `documento_estado`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `documento_estado` (
  `iddocumento_estado` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`iddocumento_estado`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `documento_estado`
--

LOCK TABLES `documento_estado` WRITE;
/*!40000 ALTER TABLE `documento_estado` DISABLE KEYS */;
INSERT INTO `documento_estado` VALUES (1,'NO CARGADO'),(2,'CARGADO');
/*!40000 ALTER TABLE `documento_estado` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `emisor`
--

DROP TABLE IF EXISTS `emisor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `emisor` (
  `idemisor` int NOT NULL AUTO_INCREMENT,
  `idpersona` int NOT NULL,
  `iddocumento` int NOT NULL,
  PRIMARY KEY (`idemisor`,`idpersona`,`iddocumento`),
  KEY `fk_persona_has_documentos_persona1_idx` (`idpersona`),
  KEY `fk_emisor_documento1_idx` (`iddocumento`),
  CONSTRAINT `fk_emisor_documento1` FOREIGN KEY (`iddocumento`) REFERENCES `documento` (`iddocumento`),
  CONSTRAINT `fk_persona_has_documentos_persona1` FOREIGN KEY (`idpersona`) REFERENCES `persona` (`idpersona`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `emisor`
--

LOCK TABLES `emisor` WRITE;
/*!40000 ALTER TABLE `emisor` DISABLE KEYS */;
INSERT INTO `emisor` VALUES (2,7,1),(3,7,3),(5,8,12),(14,11,23),(15,11,24),(4,12,1),(19,14,28),(20,14,29),(16,15,25),(22,17,31),(7,19,14),(21,19,30),(6,23,13),(17,25,26),(18,25,27),(12,26,19),(13,27,20),(8,51,15),(9,51,15),(10,55,16),(11,56,17);
/*!40000 ALTER TABLE `emisor` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary view structure for view `emisor1`
--

DROP TABLE IF EXISTS `emisor1`;
/*!50001 DROP VIEW IF EXISTS `emisor1`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `emisor1` AS SELECT 
 1 AS `iddocumento`,
 1 AS `idpersona`,
 1 AS `elemisor`,
 1 AS `asunto`*/;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `estado_portafolio`
--

DROP TABLE IF EXISTS `estado_portafolio`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `estado_portafolio` (
  `idestado_portafolio` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idestado_portafolio`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `estado_portafolio`
--

LOCK TABLES `estado_portafolio` WRITE;
/*!40000 ALTER TABLE `estado_portafolio` DISABLE KEYS */;
INSERT INTO `estado_portafolio` VALUES (1,'NO CARGADO'),(2,'CARGADO'),(3,'REVISADO');
/*!40000 ALTER TABLE `estado_portafolio` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `estudiante`
--

DROP TABLE IF EXISTS `estudiante`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `estudiante` (
  `idestudiante` int NOT NULL AUTO_INCREMENT,
  `idpersona` int NOT NULL,
  `fechadesde` date DEFAULT NULL,
  `iddepartamento` int NOT NULL,
  `fechahasta` date DEFAULT NULL,
  PRIMARY KEY (`idestudiante`,`idpersona`,`iddepartamento`),
  KEY `fk_estudiante_persona1_idx` (`idpersona`),
  KEY `fk_estudiante_departamento1_idx` (`iddepartamento`),
  CONSTRAINT `fk_estudiante_departamento1` FOREIGN KEY (`iddepartamento`) REFERENCES `departamento` (`iddepartamento`),
  CONSTRAINT `fk_estudiante_persona1` FOREIGN KEY (`idpersona`) REFERENCES `persona` (`idpersona`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `estudiante`
--

LOCK TABLES `estudiante` WRITE;
/*!40000 ALTER TABLE `estudiante` DISABLE KEYS */;
INSERT INTO `estudiante` VALUES (1,47,'2022-02-01',1,'2022-02-25'),(2,28,'2022-02-04',1,'2022-02-24'),(3,17,'2022-02-02',1,'2022-02-25'),(4,14,'2022-02-01',1,'2022-02-25');
/*!40000 ALTER TABLE `estudiante` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary view structure for view `estudiante1`
--

DROP TABLE IF EXISTS `estudiante1`;
/*!50001 DROP VIEW IF EXISTS `estudiante1`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `estudiante1` AS SELECT 
 1 AS `idestudiante`,
 1 AS `idpersona`,
 1 AS `elestudiante`,
 1 AS `iddepartamento`,
 1 AS `lacarrera`,
 1 AS `fechadesde`,
 1 AS `fechahasta`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `estudiante2`
--

DROP TABLE IF EXISTS `estudiante2`;
/*!50001 DROP VIEW IF EXISTS `estudiante2`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `estudiante2` AS SELECT 
 1 AS `idestudiante`,
 1 AS `idpersona`,
 1 AS `elestudiante`,
 1 AS `iddepartamento`,
 1 AS `lacarrera`,
 1 AS `fechadesde`,
 1 AS `fechahasta`,
 1 AS `cantidad`*/;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `evaluacion`
--

DROP TABLE IF EXISTS `evaluacion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `evaluacion` (
  `idevaluacion` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  `detalle` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`idevaluacion`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `evaluacion`
--

LOCK TABLES `evaluacion` WRITE;
/*!40000 ALTER TABLE `evaluacion` DISABLE KEYS */;
INSERT INTO `evaluacion` VALUES (1,'Prueba de conocimiento MTI','Prueba de conocimiento tomada para la Maestría en Tecnología de la Información');
/*!40000 ALTER TABLE `evaluacion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `evaluado`
--

DROP TABLE IF EXISTS `evaluado`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `evaluado` (
  `idevaluado` int NOT NULL AUTO_INCREMENT,
  `idpersona` int NOT NULL,
  `idevaluacion` int NOT NULL,
  PRIMARY KEY (`idevaluado`,`idpersona`,`idevaluacion`),
  KEY `fk_evaluado_persona1_idx` (`idpersona`),
  KEY `fk_evaluado_evaluacion1_idx` (`idevaluacion`),
  CONSTRAINT `fk_evaluado_evaluacion1` FOREIGN KEY (`idevaluacion`) REFERENCES `evaluacion` (`idevaluacion`),
  CONSTRAINT `fk_evaluado_persona1` FOREIGN KEY (`idpersona`) REFERENCES `persona` (`idpersona`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `evaluado`
--

LOCK TABLES `evaluado` WRITE;
/*!40000 ALTER TABLE `evaluado` DISABLE KEYS */;
INSERT INTO `evaluado` VALUES (1,9,1);
/*!40000 ALTER TABLE `evaluado` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary view structure for view `evaluado1`
--

DROP TABLE IF EXISTS `evaluado1`;
/*!50001 DROP VIEW IF EXISTS `evaluado1`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `evaluado1` AS SELECT 
 1 AS `idevaluado`,
 1 AS `persona`*/;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `evento`
--

DROP TABLE IF EXISTS `evento`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `evento` (
  `idevento` int NOT NULL AUTO_INCREMENT,
  `titulo` varchar(200) DEFAULT NULL,
  `fechacreacion` date DEFAULT NULL,
  `fechainicia` datetime DEFAULT NULL,
  `fechafinaliza` datetime DEFAULT NULL,
  `detalle` text,
  `idevento_estado` int NOT NULL,
  `idinstitucion` int NOT NULL,
  PRIMARY KEY (`idevento`,`idevento_estado`),
  KEY `fk_evento_evento_estado1_idx` (`idevento_estado`),
  KEY `fk_evento_institucion1_idx` (`idinstitucion`),
  CONSTRAINT `fk_evento_evento_estado1` FOREIGN KEY (`idevento_estado`) REFERENCES `evento_estado` (`idevento_estado`),
  CONSTRAINT `fk_evento_institucion1` FOREIGN KEY (`idinstitucion`) REFERENCES `institucion` (`idinstitucion`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `evento`
--

LOCK TABLES `evento` WRITE;
/*!40000 ALTER TABLE `evento` DISABLE KEYS */;
INSERT INTO `evento` VALUES (1,'PRUEBA DE CONOCIMIENTO','2021-10-22','2021-10-22 00:00:00','2021-10-22 00:00:00','LOS ASPIRANTE DEBEN RENDIR LA PRUEBA DE CONOCIMIENTO',1,0),(2,'ENTREVISTA A ASPIRANTE DE MAESTRIA','2021-10-22','0000-00-00 00:00:00','2021-10-22 10:30:00','entrevistas a aspirantes dirige johana',1,0),(3,'ENTREVISTA A BUSTAMANTE LOPEZ SONIA MARIA','2021-10-25','2021-10-25 15:00:00','2021-10-25 15:30:00','VIA MEET',1,0),(4,'Primer ascenso en la academia Aguila','2022-01-07','2022-01-10 03:00:00','2022-01-10 00:00:00','Se entregara el cintural a los jugadora',1,3);
/*!40000 ALTER TABLE `evento` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary view structure for view `evento1`
--

DROP TABLE IF EXISTS `evento1`;
/*!50001 DROP VIEW IF EXISTS `evento1`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `evento1` AS SELECT 
 1 AS `idevento`,
 1 AS `titulo`,
 1 AS `detalle`,
 1 AS `fechacreacion`,
 1 AS `fechainicia`,
 1 AS `fechafinaliza`,
 1 AS `estado`,
 1 AS `lainstitucion`*/;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `evento_estado`
--

DROP TABLE IF EXISTS `evento_estado`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `evento_estado` (
  `idevento_estado` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idevento_estado`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `evento_estado`
--

LOCK TABLES `evento_estado` WRITE;
/*!40000 ALTER TABLE `evento_estado` DISABLE KEYS */;
INSERT INTO `evento_estado` VALUES (1,'TODO');
/*!40000 ALTER TABLE `evento_estado` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `foto`
--

DROP TABLE IF EXISTS `foto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `foto` (
  `idfoto` int NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(45) DEFAULT NULL,
  `detalle` varchar(200) DEFAULT NULL,
  `archivo` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`idfoto`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `foto`
--

LOCK TABLES `foto` WRITE;
/*!40000 ALTER TABLE `foto` DISABLE KEYS */;
INSERT INTO `foto` VALUES (1,'Foto de perfil de Christopher','Esta foto se utiliza para el registro','fotos/0850563412.png');
/*!40000 ALTER TABLE `foto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `funcionario`
--

DROP TABLE IF EXISTS `funcionario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `funcionario` (
  `idfuncionario` int NOT NULL AUTO_INCREMENT,
  `idpersona` int NOT NULL,
  PRIMARY KEY (`idfuncionario`),
  KEY `fk_funcionario_persona1_idx` (`idpersona`),
  CONSTRAINT `fk_funcionario_persona1` FOREIGN KEY (`idpersona`) REFERENCES `persona` (`idpersona`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `funcionario`
--

LOCK TABLES `funcionario` WRITE;
/*!40000 ALTER TABLE `funcionario` DISABLE KEYS */;
/*!40000 ALTER TABLE `funcionario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `genero`
--

DROP TABLE IF EXISTS `genero`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `genero` (
  `idgenero` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idgenero`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `genero`
--

LOCK TABLES `genero` WRITE;
/*!40000 ALTER TABLE `genero` DISABLE KEYS */;
INSERT INTO `genero` VALUES (1,'FEMENINO'),(2,'MASCULINO');
/*!40000 ALTER TABLE `genero` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `informe`
--

DROP TABLE IF EXISTS `informe`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `informe` (
  `idinforme` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) DEFAULT NULL,
  `descripcion` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`idinforme`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `informe`
--

LOCK TABLES `informe` WRITE;
/*!40000 ALTER TABLE `informe` DISABLE KEYS */;
INSERT INTO `informe` VALUES (1,'Maestreantes','Lista de maestrantes');
/*!40000 ALTER TABLE `informe` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `institucion`
--

DROP TABLE IF EXISTS `institucion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `institucion` (
  `idinstitucion` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idinstitucion`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `institucion`
--

LOCK TABLES `institucion` WRITE;
/*!40000 ALTER TABLE `institucion` DISABLE KEYS */;
INSERT INTO `institucion` VALUES (1,'Universidad Tecnica Luis Vargas Torres'),(2,'UTLVTE-LA CONCORDIA'),(3,'highkick'),(4,'Variedades Victoria');
/*!40000 ALTER TABLE `institucion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `inventario`
--

DROP TABLE IF EXISTS `inventario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `inventario` (
  `idinventario` int NOT NULL AUTO_INCREMENT,
  `idinstitucion` int NOT NULL,
  `fechaelaboracion` date DEFAULT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`idinventario`,`idinstitucion`),
  KEY `fk_Inventario_institucion1_idx` (`idinstitucion`),
  CONSTRAINT `fk_Inventario_institucion1` FOREIGN KEY (`idinstitucion`) REFERENCES `institucion` (`idinstitucion`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `inventario`
--

LOCK TABLES `inventario` WRITE;
/*!40000 ALTER TABLE `inventario` DISABLE KEYS */;
INSERT INTO `inventario` VALUES (1,1,'2022-01-20','Inventario de Enero/2022'),(2,4,'2022-01-21','INVERTARI DE LEVANTAMIENTO');
/*!40000 ALTER TABLE `inventario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `maestrante`
--

DROP TABLE IF EXISTS `maestrante`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `maestrante` (
  `idmaestrante` int NOT NULL AUTO_INCREMENT,
  `idmaestrante_estado` int NOT NULL,
  `idpersona` int NOT NULL,
  `idmaestria` int NOT NULL,
  PRIMARY KEY (`idmaestrante`,`idmaestrante_estado`,`idpersona`,`idmaestria`),
  KEY `fk_maestrante_maestrante_estado1_idx` (`idmaestrante_estado`),
  KEY `fk_maestrante_persona1_idx` (`idpersona`),
  KEY `fk_maestrante_maestria1_idx` (`idmaestria`),
  CONSTRAINT `fk_maestrante_maestrante_estado1` FOREIGN KEY (`idmaestrante_estado`) REFERENCES `maestrante_estado` (`idmaestrante_estado`),
  CONSTRAINT `fk_maestrante_maestria1` FOREIGN KEY (`idmaestria`) REFERENCES `maestria` (`idmaestria`),
  CONSTRAINT `fk_maestrante_persona1` FOREIGN KEY (`idpersona`) REFERENCES `persona` (`idpersona`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `maestrante`
--

LOCK TABLES `maestrante` WRITE;
/*!40000 ALTER TABLE `maestrante` DISABLE KEYS */;
INSERT INTO `maestrante` VALUES (1,1,9,1),(2,1,10,1),(3,1,11,1),(4,1,15,1),(5,1,12,1),(6,1,13,1),(7,1,21,1),(8,1,20,1),(9,1,19,1),(10,1,18,1),(11,1,17,1),(12,1,14,1),(13,1,16,1),(15,1,24,1),(16,1,25,1),(17,1,26,1),(19,1,28,1),(20,1,27,1);
/*!40000 ALTER TABLE `maestrante` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary view structure for view `maestrante1`
--

DROP TABLE IF EXISTS `maestrante1`;
/*!50001 DROP VIEW IF EXISTS `maestrante1`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `maestrante1` AS SELECT 
 1 AS `idmaestrante`,
 1 AS `idpersona`,
 1 AS `cedula`,
 1 AS `maestrante`,
 1 AS `idmaestrante_estado`,
 1 AS `estado`,
 1 AS `idmaestria`,
 1 AS `maestria`,
 1 AS `correo`,
 1 AS `telefono`*/;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `maestrante_estado`
--

DROP TABLE IF EXISTS `maestrante_estado`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `maestrante_estado` (
  `idmaestrante_estado` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idmaestrante_estado`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `maestrante_estado`
--

LOCK TABLES `maestrante_estado` WRITE;
/*!40000 ALTER TABLE `maestrante_estado` DISABLE KEYS */;
INSERT INTO `maestrante_estado` VALUES (1,'CON CARPETA'),(2,'Convocado a entrevista');
/*!40000 ALTER TABLE `maestrante_estado` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `maestria`
--

DROP TABLE IF EXISTS `maestria`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `maestria` (
  `idmaestria` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`idmaestria`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `maestria`
--

LOCK TABLES `maestria` WRITE;
/*!40000 ALTER TABLE `maestria` DISABLE KEYS */;
INSERT INTO `maestria` VALUES (1,'Maestria en Tecnología de la Información');
/*!40000 ALTER TABLE `maestria` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mensaje`
--

DROP TABLE IF EXISTS `mensaje`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `mensaje` (
  `idmensaje` int NOT NULL AUTO_INCREMENT,
  `fechaelaboracion` date DEFAULT NULL,
  `asunto` varchar(200) DEFAULT NULL,
  `archivoadjunto` varchar(100) DEFAULT NULL,
  `fechaentrerecep` varchar(45) DEFAULT NULL,
  `mensaje` text,
  `idmensaje_estado` int NOT NULL,
  PRIMARY KEY (`idmensaje`,`idmensaje_estado`),
  KEY `fk_mensaje_mensaje_estado1_idx` (`idmensaje_estado`),
  CONSTRAINT `fk_mensaje_mensaje_estado1` FOREIGN KEY (`idmensaje_estado`) REFERENCES `mensaje_estado` (`idmensaje_estado`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mensaje`
--

LOCK TABLES `mensaje` WRITE;
/*!40000 ALTER TABLE `mensaje` DISABLE KEYS */;
/*!40000 ALTER TABLE `mensaje` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mensaje_estado`
--

DROP TABLE IF EXISTS `mensaje_estado`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `mensaje_estado` (
  `idmensaje_estado` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`idmensaje_estado`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mensaje_estado`
--

LOCK TABLES `mensaje_estado` WRITE;
/*!40000 ALTER TABLE `mensaje_estado` DISABLE KEYS */;
/*!40000 ALTER TABLE `mensaje_estado` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `modulo`
--

DROP TABLE IF EXISTS `modulo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `modulo` (
  `idmodulo` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) DEFAULT NULL,
  `inicial` varchar(20) DEFAULT NULL,
  `icono` varchar(45) DEFAULT NULL,
  `modulo` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idmodulo`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `modulo`
--

LOCK TABLES `modulo` WRITE;
/*!40000 ALTER TABLE `modulo` DISABLE KEYS */;
INSERT INTO `modulo` VALUES (1,'Institución','INS','institucion','institucion'),(2,'Modulo','MOD','modulo','modulo'),(3,'Usuario','USU','usuario','usuario'),(4,'Acceso a menu','ACC','acceso','acceso'),(5,'Personas','PER','persona','persona'),(6,'Cliente','CLI','cliente','cliente'),(7,'Eventos','EVE','evento','evento'),(8,'Artículo','ART','articulo','articulo'),(9,'Cinturón Taek','CIN','cinturon','cinturon'),(10,'Ascenso','ASC','ascenso','ascenso'),(11,'Correo','COR','correo','correo'),(12,'Teléfono','TEL','telefono','telefono'),(13,'Maestrantes','','maestrante','maestrante'),(14,'Portafolil del estudiante','','portafolioestudiante','portafolioestudiante'),(15,'Uniforme','','uniforme','uniforme'),(16,'Documento','','documento','documento'),(17,'Categoria de articulo','','categoria','categoria'),(18,'Inventario','inventario','inventario','inventario'),(19,'Detalle de inventario','detainventario','detainventario','detainventario'),(20,'Ordenador','','ordenador','ordenador'),(21,'Tipos de documentos','tipodocu','tipodocu','tipodocu'),(22,'Unidad','UNI','unidad','unidad'),(23,'Departamento','departamento','departamento','departamento'),(24,'Estudiante','','estudiante','estudiante');
/*!40000 ALTER TABLE `modulo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `nivelacceso`
--

DROP TABLE IF EXISTS `nivelacceso`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `nivelacceso` (
  `idnivelacceso` int NOT NULL AUTO_INCREMENT,
  `create` tinyint DEFAULT NULL,
  `read` tinyint DEFAULT NULL,
  `update` tinyint DEFAULT NULL,
  `delete` tinyint DEFAULT NULL,
  `inicio` varchar(45) DEFAULT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idnivelacceso`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `nivelacceso`
--

LOCK TABLES `nivelacceso` WRITE;
/*!40000 ALTER TABLE `nivelacceso` DISABLE KEYS */;
INSERT INTO `nivelacceso` VALUES (1,0,0,0,0,'',''),(2,0,1,0,0,'','Solo lectura');
/*!40000 ALTER TABLE `nivelacceso` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `nombramiento`
--

DROP TABLE IF EXISTS `nombramiento`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `nombramiento` (
  `idfuncionario` int NOT NULL,
  `iddepartamento` int NOT NULL,
  `fechaingreso` date DEFAULT NULL,
  `fechasalida` date DEFAULT NULL,
  PRIMARY KEY (`idfuncionario`,`iddepartamento`),
  KEY `fk_funcionario_has_departamento_departamento1_idx` (`iddepartamento`),
  KEY `fk_funcionario_has_departamento_funcionario1_idx` (`idfuncionario`),
  CONSTRAINT `fk_funcionario_has_departamento_departamento1` FOREIGN KEY (`iddepartamento`) REFERENCES `departamento` (`iddepartamento`),
  CONSTRAINT `fk_funcionario_has_departamento_funcionario1` FOREIGN KEY (`idfuncionario`) REFERENCES `funcionario` (`idfuncionario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `nombramiento`
--

LOCK TABLES `nombramiento` WRITE;
/*!40000 ALTER TABLE `nombramiento` DISABLE KEYS */;
/*!40000 ALTER TABLE `nombramiento` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `operadora`
--

DROP TABLE IF EXISTS `operadora`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `operadora` (
  `idoperadora` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idoperadora`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `operadora`
--

LOCK TABLES `operadora` WRITE;
/*!40000 ALTER TABLE `operadora` DISABLE KEYS */;
INSERT INTO `operadora` VALUES (1,'claro'),(2,'CNT');
/*!40000 ALTER TABLE `operadora` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ordenador`
--

DROP TABLE IF EXISTS `ordenador`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ordenador` (
  `idordenador` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idordenador`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ordenador`
--

LOCK TABLES `ordenador` WRITE;
/*!40000 ALTER TABLE `ordenador` DISABLE KEYS */;
INSERT INTO `ordenador` VALUES (1,'XArchivos.org'),(4,'OFICINASECRETARIA'),(6,'Ingreso a Maestrias'),(7,'educaysoft.org'),(8,'142.132.132.157');
/*!40000 ALTER TABLE `ordenador` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `participante`
--

DROP TABLE IF EXISTS `participante`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `participante` (
  `idevento` int NOT NULL,
  `idpersona` int NOT NULL,
  PRIMARY KEY (`idevento`,`idpersona`),
  KEY `fk_evento_has_persona_persona1_idx` (`idpersona`),
  KEY `fk_evento_has_persona_evento1_idx` (`idevento`),
  CONSTRAINT `fk_evento_has_persona_evento1` FOREIGN KEY (`idevento`) REFERENCES `evento` (`idevento`),
  CONSTRAINT `fk_evento_has_persona_persona1` FOREIGN KEY (`idpersona`) REFERENCES `persona` (`idpersona`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `participante`
--

LOCK TABLES `participante` WRITE;
/*!40000 ALTER TABLE `participante` DISABLE KEYS */;
INSERT INTO `participante` VALUES (1,25),(3,25),(1,26),(1,27);
/*!40000 ALTER TABLE `participante` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary view structure for view `participante1`
--

DROP TABLE IF EXISTS `participante1`;
/*!50001 DROP VIEW IF EXISTS `participante1`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `participante1` AS SELECT 
 1 AS `idevento`,
 1 AS `idpersona`,
 1 AS `nombres`*/;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `perfil`
--

DROP TABLE IF EXISTS `perfil`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `perfil` (
  `idperfil` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`idperfil`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `perfil`
--

LOCK TABLES `perfil` WRITE;
/*!40000 ALTER TABLE `perfil` DISABLE KEYS */;
INSERT INTO `perfil` VALUES (1,'Administrador'),(2,'Invitado'),(3,'Ponente Nacional');
/*!40000 ALTER TABLE `perfil` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `persona`
--

DROP TABLE IF EXISTS `persona`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `persona` (
  `idpersona` int NOT NULL AUTO_INCREMENT,
  `nombres` varchar(50) DEFAULT NULL,
  `apellidos` varchar(50) DEFAULT NULL,
  `cedula` varchar(10) DEFAULT NULL,
  `fechanacimiento` date DEFAULT NULL,
  `foto` char(50) DEFAULT NULL,
  `pdf` char(50) DEFAULT NULL,
  `idtiposangre` int DEFAULT NULL,
  `idestadocivil` int DEFAULT NULL,
  `idnacionalidad` int DEFAULT NULL,
  `idgenero` int NOT NULL,
  `idfoto` int DEFAULT NULL,
  PRIMARY KEY (`idpersona`),
  KEY `fk_persona_genero1_idx` (`idgenero`),
  KEY `fk_persona_foto1_idx` (`idfoto`),
  CONSTRAINT `fk_persona_foto1` FOREIGN KEY (`idfoto`) REFERENCES `foto` (`idfoto`),
  CONSTRAINT `fk_persona_genero1` FOREIGN KEY (`idgenero`) REFERENCES `genero` (`idgenero`)
) ENGINE=InnoDB AUTO_INCREMENT=62 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `persona`
--

LOCK TABLES `persona` WRITE;
/*!40000 ALTER TABLE `persona` DISABLE KEYS */;
INSERT INTO `persona` VALUES (7,'Miranda Bolaños Damaris',NULL,'0850489881',NULL,'fotos/0850489881.jpg','pdfs/0850489881.pdf',1,1,1,0,0),(8,'STALIN ADALBERTO','FRANCIS QUINDE','0801560517',NULL,NULL,NULL,NULL,NULL,NULL,0,0),(9,'ILCI MONSERRATE','NAZARENO ARTEAGA','0804363265',NULL,NULL,NULL,NULL,NULL,NULL,0,0),(10,'ROXANA STEFANIA','DIAZ ESTUPIÑAN','0801951781',NULL,NULL,NULL,NULL,NULL,NULL,0,0),(11,'CRUZ DIANA','COROZO CAGUA','0802656686',NULL,NULL,NULL,NULL,NULL,NULL,0,0),(12,'JIMMY ALEXANDER','PAZMIÑO TORRES','0802394338',NULL,NULL,NULL,NULL,NULL,NULL,0,0),(13,'WILSON ENRRIQUE','CONTRERAS PASCUAZA','0803775345',NULL,NULL,NULL,NULL,NULL,NULL,0,0),(14,'BETTY VERONICA','MOSQUERA CASTILLO','0802169581',NULL,NULL,NULL,NULL,NULL,NULL,0,0),(15,'ROBERTO EDWIN','MONTAÑO ROLDAN','0802200154',NULL,NULL,NULL,NULL,NULL,NULL,0,0),(16,'RAFAEL MARCELO','PEREZ AGUIRRE','1500434095',NULL,NULL,NULL,NULL,NULL,NULL,0,0),(17,'CESAR ALBERTO','MANCHAY ORBEA','082324665',NULL,NULL,NULL,NULL,NULL,NULL,0,0),(18,'BYRON  JAVIER','RAMIREZ DUEÑAS','0850036823',NULL,NULL,NULL,NULL,NULL,NULL,0,0),(19,'YAMIL RODRIGO','LOPEZ ALBAN','0802402131',NULL,NULL,NULL,NULL,NULL,NULL,0,0),(20,'GERARDO ALFREDO','SOLORZANO GUTIERREZ','1714184429',NULL,NULL,NULL,NULL,NULL,NULL,0,0),(21,'GEOVANY','RIVERA BAZAN','0803063593',NULL,NULL,NULL,NULL,NULL,NULL,0,0),(23,'PATRICIO EDUARDO','PERALTA VALVERDE','0801943655',NULL,NULL,NULL,NULL,NULL,NULL,0,0),(24,'MARIA NELA','QUIÑONEZ CORTEZ','0804096675',NULL,NULL,NULL,NULL,NULL,NULL,0,0),(25,'SONIA MARÍA','BUSTAMANTE LÓPEZ','0920298460',NULL,NULL,NULL,NULL,NULL,NULL,0,0),(26,'INGRID DEYANIRA','QUINDE ACOSTA','0801416017',NULL,NULL,NULL,NULL,NULL,NULL,0,0),(27,'VICTOR EDUARDO','QUISPE MERA','0804383495',NULL,NULL,NULL,NULL,NULL,NULL,0,0),(28,'JACKSON ARTURO','MANCHAY ORBEA','0802654681',NULL,NULL,NULL,NULL,NULL,NULL,0,0),(29,'KEVIN STEEVEN','AGUILAR MOLINA','0803708940',NULL,NULL,NULL,NULL,NULL,NULL,0,0),(31,'DAMARIS MARGARITA','MIRANDA BOLAÑOS','0850489881',NULL,NULL,NULL,NULL,NULL,NULL,0,0),(32,'congresoutlvte','facped','0000000000',NULL,'fotos/0000000000.jpg',NULL,NULL,NULL,NULL,0,0),(33,'admin','admin','0000000000',NULL,'fotos/0000000000.jpg',NULL,NULL,NULL,NULL,0,0),(34,'CHRISTOPHER YERIEL','FRANCIS ANGULO','0850563412','2022-01-13','fotos/0850563412.jpg','pdfs/0850563412.pdf',1,1,1,2,0),(35,'WILLIAM GONZALO','BAICILLA CHANBA','0804314136','2022-01-15','',NULL,NULL,NULL,NULL,2,0),(36,'JOSEPH ALDAIR','CAMPAS MARQUEZ','0850108812','2022-01-20','',NULL,NULL,NULL,NULL,2,0),(37,'BONE PANEZO','SECRETARIA','0801593933',NULL,'fotos/0801593933.jpg','pdfs/0801593933.pdf',1,1,1,1,0),(38,'YORDAN  MANUEL','TIMARAN','0803154848','2022-01-13','',NULL,NULL,NULL,NULL,2,0),(39,'THIAGO','JIJON','0850694910','0000-00-00','',NULL,NULL,NULL,NULL,2,0),(40,'EDISON ','QUINDE','1050528395','0000-00-00','',NULL,NULL,NULL,NULL,2,0),(41,'HENRY','BONE','0850194481','0000-00-00','',NULL,NULL,NULL,NULL,2,0),(42,'JESSICA','BONE','0850454927','0000-00-00','',NULL,NULL,NULL,NULL,1,0),(43,'MIGUEL','MONTAÑO','085102954','0000-00-00','',NULL,NULL,NULL,NULL,2,0),(44,'STALIN','MERA','0850417304','0000-00-00','',NULL,NULL,NULL,NULL,2,0),(45,'MATEO','MERA','0851048785','0000-00-00','',NULL,NULL,NULL,NULL,2,0),(46,'JADEN','QUEZADA','0850147547','0000-00-00','',NULL,NULL,NULL,NULL,2,0),(47,'PATRICK DIDIER','FRANCIS','0850025479','0000-00-00','',NULL,NULL,NULL,NULL,2,0),(49,'GILBERT JOSE','MARINEZ RODRIGUEZ','00000000','0000-00-00','',NULL,NULL,NULL,NULL,2,NULL),(50,'WILLIAM JOEL','FRANCIS CAICEDO','0850060187','2002-08-25','',NULL,NULL,NULL,NULL,2,NULL),(51,'EDISON','CAPURRO','0803708940','2022-01-04','',NULL,NULL,NULL,NULL,2,NULL),(52,'JAVIER','QUIÑONZ','0801569493','2022-01-03','',NULL,NULL,NULL,NULL,2,NULL),(53,'JAVIER','QUIÑONEZ','0801569493','2022-01-03','',NULL,NULL,NULL,NULL,2,NULL),(54,'Priscila elizabe','Goyes Valencia','00930202','2022-01-12','',NULL,NULL,NULL,NULL,2,NULL),(55,'MIRIAN MARIA','REYES LEÓN','0802891614','2022-01-19','',NULL,NULL,NULL,NULL,1,NULL),(56,'CINTHYA ELAINE','CASTILLO MONTES','0802504498','2022-01-19','',NULL,NULL,NULL,NULL,1,NULL),(60,'MATEO MATIAS','CAICEDO ANGULO','083948382','0000-00-00','',NULL,NULL,NULL,NULL,2,NULL),(61,'fiorela marcola','francis molina','08888888','0000-00-00','',NULL,NULL,NULL,NULL,1,NULL);
/*!40000 ALTER TABLE `persona` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary view structure for view `persona2`
--

DROP TABLE IF EXISTS `persona2`;
/*!50001 DROP VIEW IF EXISTS `persona2`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `persona2` AS SELECT 
 1 AS `idpersona`,
 1 AS `lapersona`,
 1 AS `correo`,
 1 AS `telefono`*/;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `portafoliod`
--

DROP TABLE IF EXISTS `portafoliod`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `portafoliod` (
  `idportafoliod` int NOT NULL AUTO_INCREMENT,
  `color` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `hojadevida` tinyint DEFAULT NULL,
  `hojadevidapdf` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `silabo` tinyint DEFAULT NULL,
  `silabopdf` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `cuadernillo` tinyint DEFAULT NULL,
  `cuadernillopdf` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `horario` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `horariopdf` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `plancatedra` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `plancatedrapdf` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `reportenotas` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `reportenotaspdf` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `informelabores` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `informelaborespdf` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `horarioexamen` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `horarioexamenpdf` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `observaciones` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `iddocente` int NOT NULL,
  `idasignatura` int NOT NULL,
  PRIMARY KEY (`idportafoliod`,`iddocente`,`idasignatura`),
  KEY `fk_portafoliod_docente1_idx` (`iddocente`),
  KEY `fk_portafoliod_asignatura1_idx` (`idasignatura`),
  CONSTRAINT `fk_portafoliod_asignatura1` FOREIGN KEY (`idasignatura`) REFERENCES `asignatura` (`idasignatura`),
  CONSTRAINT `fk_portafoliod_docente1` FOREIGN KEY (`iddocente`) REFERENCES `docente` (`iddocente`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `portafoliod`
--

LOCK TABLES `portafoliod` WRITE;
/*!40000 ALTER TABLE `portafoliod` DISABLE KEYS */;
/*!40000 ALTER TABLE `portafoliod` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `portafolioestudiante`
--

DROP TABLE IF EXISTS `portafolioestudiante`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `portafolioestudiante` (
  `idportafolioestudiante` int NOT NULL AUTO_INCREMENT,
  `idportafoliomodelo` int NOT NULL,
  `idestado_portafolio` int NOT NULL,
  `idestudiante` int NOT NULL,
  PRIMARY KEY (`idportafolioestudiante`,`idportafoliomodelo`,`idestado_portafolio`,`idestudiante`),
  KEY `fk_portafolioestudiante_portafoliomodelo1_idx` (`idportafoliomodelo`),
  KEY `fk_portafolioestudiante_estado_portafolio1_idx` (`idestado_portafolio`),
  KEY `fk_portafolioestudiante_estudiante1_idx` (`idestudiante`),
  CONSTRAINT `fk_portafolioestudiante_estado_portafolio1` FOREIGN KEY (`idestado_portafolio`) REFERENCES `estado_portafolio` (`idestado_portafolio`),
  CONSTRAINT `fk_portafolioestudiante_estudiante1` FOREIGN KEY (`idestudiante`) REFERENCES `estudiante` (`idestudiante`),
  CONSTRAINT `fk_portafolioestudiante_portafoliomodelo1` FOREIGN KEY (`idportafoliomodelo`) REFERENCES `portafoliomodelo` (`idportafoliomodelo`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `portafolioestudiante`
--

LOCK TABLES `portafolioestudiante` WRITE;
/*!40000 ALTER TABLE `portafolioestudiante` DISABLE KEYS */;
/*!40000 ALTER TABLE `portafolioestudiante` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary view structure for view `portafolioestudiante1`
--

DROP TABLE IF EXISTS `portafolioestudiante1`;
/*!50001 DROP VIEW IF EXISTS `portafolioestudiante1`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `portafolioestudiante1` AS SELECT 
 1 AS `idportafolioestudiante`,
 1 AS `eldocumento`,
 1 AS `elestudiante`,
 1 AS `elestado`*/;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `portafoliomodelo`
--

DROP TABLE IF EXISTS `portafoliomodelo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `portafoliomodelo` (
  `idportafoliomodelo` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) DEFAULT NULL,
  `detalle` text,
  PRIMARY KEY (`idportafoliomodelo`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `portafoliomodelo`
--

LOCK TABLES `portafoliomodelo` WRITE;
/*!40000 ALTER TABLE `portafoliomodelo` DISABLE KEYS */;
INSERT INTO `portafoliomodelo` VALUES (1,'Copia de cédula de identidad',NULL),(2,'COPIA DE PAPELETA DE VOTACION',NULL),(3,'CERTIFICADO DE INGRESO A LA CARRERA',NULL);
/*!40000 ALTER TABLE `portafoliomodelo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pregunta`
--

DROP TABLE IF EXISTS `pregunta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `pregunta` (
  `idpregunta` int NOT NULL AUTO_INCREMENT,
  `pregunta` varchar(200) DEFAULT NULL,
  `idevaluacion` int NOT NULL,
  PRIMARY KEY (`idpregunta`,`idevaluacion`),
  KEY `fk_pregunta_evaluacion1_idx` (`idevaluacion`),
  CONSTRAINT `fk_pregunta_evaluacion1` FOREIGN KEY (`idevaluacion`) REFERENCES `evaluacion` (`idevaluacion`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pregunta`
--

LOCK TABLES `pregunta` WRITE;
/*!40000 ALTER TABLE `pregunta` DISABLE KEYS */;
INSERT INTO `pregunta` VALUES (1,'¿Por qué eligió este  programa de postgrado?',1),(2,'¿Qué le motivo a decidir estudiar un postgrado?',1),(3,'¿Qué aspira usted con ese programa académico?',1);
/*!40000 ALTER TABLE `pregunta` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `respuesta`
--

DROP TABLE IF EXISTS `respuesta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `respuesta` (
  `idrespuesta` int NOT NULL AUTO_INCREMENT,
  `respuesta` varchar(200) DEFAULT NULL,
  `idpregunta` int NOT NULL,
  PRIMARY KEY (`idrespuesta`,`idpregunta`),
  KEY `fk_respuesta_pregunta1_idx` (`idpregunta`),
  CONSTRAINT `fk_respuesta_pregunta1` FOREIGN KEY (`idpregunta`) REFERENCES `pregunta` (`idpregunta`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `respuesta`
--

LOCK TABLES `respuesta` WRITE;
/*!40000 ALTER TABLE `respuesta` DISABLE KEYS */;
INSERT INTO `respuesta` VALUES (1,'Exelente',1),(2,'Bueno',1),(3,'Exelente',2);
/*!40000 ALTER TABLE `respuesta` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `resultado`
--

DROP TABLE IF EXISTS `resultado`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `resultado` (
  `idresultado` int NOT NULL AUTO_INCREMENT,
  `idevaluado` int NOT NULL,
  `idpregunta` int NOT NULL,
  `nota` varchar(5) DEFAULT NULL,
  `idrespuesta` int NOT NULL,
  PRIMARY KEY (`idresultado`,`idevaluado`,`idpregunta`),
  KEY `fk_resultado_evaluado1_idx` (`idevaluado`),
  KEY `fk_resultado_pregunta1_idx` (`idpregunta`),
  KEY `fk_resultado_respuesta1_idx` (`idrespuesta`),
  CONSTRAINT `fk_resultado_evaluado1` FOREIGN KEY (`idevaluado`) REFERENCES `evaluado` (`idevaluado`),
  CONSTRAINT `fk_resultado_pregunta1` FOREIGN KEY (`idpregunta`) REFERENCES `pregunta` (`idpregunta`),
  CONSTRAINT `fk_resultado_respuesta1` FOREIGN KEY (`idrespuesta`) REFERENCES `respuesta` (`idrespuesta`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `resultado`
--

LOCK TABLES `resultado` WRITE;
/*!40000 ALTER TABLE `resultado` DISABLE KEYS */;
/*!40000 ALTER TABLE `resultado` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `telefono`
--

DROP TABLE IF EXISTS `telefono`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `telefono` (
  `idtelefono` int NOT NULL AUTO_INCREMENT,
  `numero` varchar(15) DEFAULT NULL,
  `idpersona` int NOT NULL,
  `idoperadora` int NOT NULL,
  `idtelefono_estado` int NOT NULL,
  PRIMARY KEY (`idtelefono`,`idpersona`,`idoperadora`),
  KEY `fk_telefono_persona1_idx` (`idpersona`),
  KEY `fk_telefono_operadora1_idx` (`idoperadora`),
  KEY `fk_telefono_telefono_estado1_idx` (`idtelefono_estado`),
  CONSTRAINT `fk_telefono_operadora1` FOREIGN KEY (`idoperadora`) REFERENCES `operadora` (`idoperadora`),
  CONSTRAINT `fk_telefono_persona1` FOREIGN KEY (`idpersona`) REFERENCES `persona` (`idpersona`),
  CONSTRAINT `fk_telefono_telefono_estado1` FOREIGN KEY (`idtelefono_estado`) REFERENCES `telefono_estado` (`idtelefono_estado`)
) ENGINE=InnoDB AUTO_INCREMENT=62 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `telefono`
--

LOCK TABLES `telefono` WRITE;
/*!40000 ALTER TABLE `telefono` DISABLE KEYS */;
INSERT INTO `telefono` VALUES (3,'0986442331',11,1,1),(4,'0967653764',12,1,1),(5,'0989678140',27,1,1),(6,'0999168280',26,1,1),(7,'0920298460',25,1,1),(9,'0967774874',21,1,1),(10,'0997100105',20,1,1),(11,'0994673447',19,1,1),(12,'0996705278',18,1,1),(13,'0939734500',17,1,1),(14,'0997335572',14,1,1),(15,'0987524609',16,1,1),(16,'0997153938',15,1,1),(19,'0989891748',13,1,1),(20,'0988685744',28,1,1),(21,'0990377244',9,1,1),(22,'0997627379',24,1,1),(23,'0985418026',29,1,1),(24,'08093833454',32,1,1),(25,'0938373',33,1,1),(26,'0997919650',34,1,1),(27,'062017660',12,1,1),(28,'0968672170',24,1,1),(29,'2454472',24,2,1),(30,'062460774',26,2,1),(31,'062737020',13,2,1),(32,'0986259779',25,1,1),(33,'062450727',21,2,1),(34,'062731684',21,2,1),(35,'0996277763',21,1,1),(36,'062453335',19,2,1),(37,'062016049',18,2,1),(38,'0982581469',49,1,1),(39,'062723236',17,2,1),(40,'0802169581',14,1,1),(41,'062453200',14,2,1),(42,'062452853',14,2,1),(43,'23270364',16,2,1),(44,'062453180',15,2,1),(45,'0997022029',23,1,1),(46,'062766262',23,2,1),(47,'099383833',51,1,1),(48,'0981035944',55,1,1),(49,'000900',56,1,1),(50,'0985681597',50,1,1),(51,'0967074494',50,1,1),(52,'0968619870',7,1,1),(53,'0920298460',7,1,1),(56,'0989891748',7,1,1),(57,'0896442331',7,1,1),(58,'0968619870',7,1,1),(59,'097363637',60,1,1),(60,'09999999',61,1,1),(61,'03938393',11,2,1);
/*!40000 ALTER TABLE `telefono` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary view structure for view `telefono1`
--

DROP TABLE IF EXISTS `telefono1`;
/*!50001 DROP VIEW IF EXISTS `telefono1`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `telefono1` AS SELECT 
 1 AS `idtelefono`,
 1 AS `numero`,
 1 AS `lapersona`*/;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `telefono_estado`
--

DROP TABLE IF EXISTS `telefono_estado`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `telefono_estado` (
  `idtelefono_estado` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idtelefono_estado`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `telefono_estado`
--

LOCK TABLES `telefono_estado` WRITE;
/*!40000 ALTER TABLE `telefono_estado` DISABLE KEYS */;
INSERT INTO `telefono_estado` VALUES (1,'ENLINEA');
/*!40000 ALTER TABLE `telefono_estado` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipodocu`
--

DROP TABLE IF EXISTS `tipodocu`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tipodocu` (
  `idtipodocu` int NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(45) DEFAULT NULL,
  `cantidad` int DEFAULT NULL,
  PRIMARY KEY (`idtipodocu`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipodocu`
--

LOCK TABLES `tipodocu` WRITE;
/*!40000 ALTER TABLE `tipodocu` DISABLE KEYS */;
INSERT INTO `tipodocu` VALUES (1,'OFICIO RECIBIDO',NULL),(2,'OFICIO ENTREGADOS',NULL),(3,'OFICIO DE RECLAMO',NULL),(6,'CERTIFICADO ENTREGADO',NULL),(7,'TESIS DE GRADO',NULL),(8,'TESINA',NULL),(9,'SILABOS',NULL);
/*!40000 ALTER TABLE `tipodocu` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary view structure for view `tipodocu1`
--

DROP TABLE IF EXISTS `tipodocu1`;
/*!50001 DROP VIEW IF EXISTS `tipodocu1`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `tipodocu1` AS SELECT 
 1 AS `idtipodocu`,
 1 AS `descripcion`,
 1 AS `cantidad`*/;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `unidad`
--

DROP TABLE IF EXISTS `unidad`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `unidad` (
  `idunidad` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) DEFAULT NULL,
  `idinstitucion` int NOT NULL,
  PRIMARY KEY (`idunidad`),
  KEY `fk_unidad_institucion1_idx` (`idinstitucion`),
  CONSTRAINT `fk_unidad_institucion1` FOREIGN KEY (`idinstitucion`) REFERENCES `institucion` (`idinstitucion`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `unidad`
--

LOCK TABLES `unidad` WRITE;
/*!40000 ALTER TABLE `unidad` DISABLE KEYS */;
INSERT INTO `unidad` VALUES (1,'Facultad de Ingenierias',1),(2,'FACULTAD FACPED',1);
/*!40000 ALTER TABLE `unidad` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuario`
--

DROP TABLE IF EXISTS `usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `usuario` (
  `idusuario` int unsigned NOT NULL AUTO_INCREMENT,
  `password` varchar(45) DEFAULT NULL,
  `idpersona` int DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `idperfil` int NOT NULL,
  `inicio` varchar(100) DEFAULT NULL,
  `idinstitucion` int DEFAULT NULL,
  PRIMARY KEY (`idusuario`),
  KEY `idpersona` (`idpersona`),
  KEY `fk_usuario_perfil1_idx` (`idperfil`),
  KEY `fk_usuarioinsttituicion` (`idinstitucion`),
  CONSTRAINT `fk_usuario_perfil1` FOREIGN KEY (`idperfil`) REFERENCES `perfil` (`idperfil`),
  CONSTRAINT `fk_usuarioinsttituicion` FOREIGN KEY (`idinstitucion`) REFERENCES `institucion` (`idinstitucion`),
  CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`idpersona`) REFERENCES `persona` (`idpersona`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario`
--

LOCK TABLES `usuario` WRITE;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` VALUES (3,'123456',31,'damaris.miranda@utelvt.edu.ec',1,'',1),(4,'PIWIIB1234',8,'educaysoft@gmail.com',1,'principal',1),(5,'congresoutlvte',32,'congresoutlvte@utelvte.edu.ec',3,'',1),(6,'admin',33,'admin',3,'certificado/listar',1),(7,'PIWIIB1234',34,'francis.christopher@egbfcristorey.edu.ec',1,'certificado/listar',3),(8,'PIWIIB1234',37,'highkickesmeraldas@gmail.com',1,'institucion',3),(10,'PIWIIB1234',8,'maestria.ti@utelvt.edu.ec',1,'principal',1),(11,'PIWIIB1234',8,'stalin.francis@utelvt.edu.ec',1,'principal',1),(12,'PIWIIB1234',40,'edison.capurro@utelvt.edu.ec',1,'principal',1);
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary view structure for view `usuario1`
--

DROP TABLE IF EXISTS `usuario1`;
/*!50001 DROP VIEW IF EXISTS `usuario1`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `usuario1` AS SELECT 
 1 AS `idusuario`,
 1 AS `elusuario`,
 1 AS `elperfil`,
 1 AS `email`,
 1 AS `password`*/;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `visitas`
--

DROP TABLE IF EXISTS `visitas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `visitas` (
  `idvisitas` int NOT NULL AUTO_INCREMENT,
  `enlace` varchar(300) DEFAULT NULL,
  `visitas` int DEFAULT NULL,
  PRIMARY KEY (`idvisitas`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `visitas`
--

LOCK TABLES `visitas` WRITE;
/*!40000 ALTER TABLE `visitas` DISABLE KEYS */;
INSERT INTO `visitas` VALUES (1,'http://localhost/facped/index.php',27),(2,'http://localhost/facped/congresoutlvte-normas.php',8),(3,'http://localhost/facped/congresoutlvte-prese.php',8),(4,'http://192.168.1.10/facped/',1),(5,'http://192.168.1.10/facped/congresoutlvte-normas.php',5),(6,'http://192.168.1.10/facped/index.php',3),(7,'http://localhost/facped/congresoutlvte-pdf.php',12),(8,'http://localhost/facped/',22),(9,'http://localhost/facped/congresoutlvte-agenda.php',6),(10,'http://localhost/facped/congresoutlvte-tematicas.php',10),(11,'http://localhost/facped/congresoutlvte-confe.php',2),(12,'http://localhost/facped/congresoutlvte-confe2.php',20),(13,'http://192.168.1.10/facped/congresoutlvte-confe2.php',1),(14,'http://192.168.1.10/facped/congresoutlvte-prese.php',1),(15,'http://localhost/facped/congresoutlvte-momoria.php',11),(16,'http://localhost/facped/congresoutlvte-certi.php',6),(17,'http://localhost/facped/congresoutlvte-saludos.php',3),(18,'http://192.168.1.10/facped/congresoutlvte-saludos.php',1),(19,'http://localhost/facped/congresoutlvte-agendafinal.php',2),(20,'http://localhost/facped/congresoutlvte-evento.php',2),(21,'http://192.168.43.26/facped/congresoutlvte-evento.php',1),(22,'http://192.168.1.10/facped/congresoutlvte-evento.php',1);
/*!40000 ALTER TABLE `visitas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `vitacora_maestrante_estado`
--

DROP TABLE IF EXISTS `vitacora_maestrante_estado`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `vitacora_maestrante_estado` (
  `idmaestrante` int NOT NULL,
  `idmaestrante_estado` int NOT NULL,
  `fechainicia` date DEFAULT NULL,
  `fechafinaliza` date DEFAULT NULL,
  `detalle` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`idmaestrante`,`idmaestrante_estado`),
  KEY `fk_maestrante_has_maestrante_estado_maestrante_estado1_idx` (`idmaestrante_estado`),
  KEY `fk_maestrante_has_maestrante_estado_maestrante1_idx` (`idmaestrante`),
  CONSTRAINT `fk_maestrante_has_maestrante_estado_maestrante1` FOREIGN KEY (`idmaestrante`) REFERENCES `maestrante` (`idmaestrante`),
  CONSTRAINT `fk_maestrante_has_maestrante_estado_maestrante_estado1` FOREIGN KEY (`idmaestrante_estado`) REFERENCES `maestrante_estado` (`idmaestrante_estado`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `vitacora_maestrante_estado`
--

LOCK TABLES `vitacora_maestrante_estado` WRITE;
/*!40000 ALTER TABLE `vitacora_maestrante_estado` DISABLE KEYS */;
INSERT INTO `vitacora_maestrante_estado` VALUES (1,1,'2021-10-21','2021-10-23',NULL),(1,2,'2021-10-23','2021-10-23','SE CONVOCA');
/*!40000 ALTER TABLE `vitacora_maestrante_estado` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary view structure for view `vitacora_maestrante_estado1`
--

DROP TABLE IF EXISTS `vitacora_maestrante_estado1`;
/*!50001 DROP VIEW IF EXISTS `vitacora_maestrante_estado1`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `vitacora_maestrante_estado1` AS SELECT 
 1 AS `idmaestrante`,
 1 AS `maestrante`,
 1 AS `estado`,
 1 AS `fechainicia`,
 1 AS `fechafinaliza`*/;
SET character_set_client = @saved_cs_client;

--
-- Final view structure for view `acceso1`
--

/*!50001 DROP VIEW IF EXISTS `acceso1`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_0900_ai_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `acceso1` AS select `usuario`.`idusuario` AS `idusuario`,`acceso`.`idacceso` AS `idacceso`,concat(coalesce(`persona`.`apellidos`,''),'  ',coalesce(`persona`.`nombres`,''),' : ',coalesce(`usuario`.`email`)) AS `elusuario`,`acceso`.`idmodulo` AS `idmodulo`,`modulo`.`nombre` AS `elmodulo`,`acceso`.`idnivelacceso` AS `idnivelacceso`,`nivelacceso`.`nombre` AS `elnivelacceso` from ((((`acceso` join `usuario`) join `persona`) join `modulo`) join `nivelacceso`) where ((`acceso`.`idusuario` = `usuario`.`idusuario`) and (`usuario`.`idpersona` = `persona`.`idpersona`) and (`acceso`.`idmodulo` = `modulo`.`idmodulo`) and (`acceso`.`idnivelacceso` = `nivelacceso`.`idnivelacceso`)) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `articulo1`
--

/*!50001 DROP VIEW IF EXISTS `articulo1`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_0900_ai_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `articulo1` AS select `articulo`.`idarticulo` AS `idarticulo`,`articulo`.`idinstitucion` AS `idinstitucion`,`institucion`.`nombre` AS `lainstitucion`,`articulo`.`nombre` AS `nombre` from (`articulo` join `institucion`) where (`articulo`.`idinstitucion` = `institucion`.`idinstitucion`) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `cinturon1`
--

/*!50001 DROP VIEW IF EXISTS `cinturon1`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_0900_ai_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `cinturon1` AS select `cinturon`.`idcinturon` AS `idcinturon`,`cinturon`.`color` AS `color`,`articulo`.`nombre` AS `elarticulo` from (`cinturon` join `articulo`) where (`cinturon`.`idarticulo` = `articulo`.`idarticulo`) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `cliente1`
--

/*!50001 DROP VIEW IF EXISTS `cliente1`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_0900_ai_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `cliente1` AS select `cliente`.`idcliente` AS `idcliente`,`persona`.`idpersona` AS `idpersona`,concat(coalesce(`persona`.`apellidos`,''),'  ',coalesce(`persona`.`nombres`,'')) AS `elcliente`,`cliente`.`idinstitucion` AS `idinstitucion`,`institucion`.`nombre` AS `lainstitucion`,`cliente`.`fechainscripcion` AS `fechainscripcion` from ((`cliente` join `persona`) join `institucion`) where ((`cliente`.`idpersona` = `persona`.`idpersona`) and (`cliente`.`idinstitucion` = `institucion`.`idinstitucion`)) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `correo1`
--

/*!50001 DROP VIEW IF EXISTS `correo1`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_0900_ai_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `correo1` AS select `correo`.`idcorreo` AS `idcorreo`,`correo`.`nombre` AS `elcorreo`,concat(`persona`.`apellidos`,'  ',`persona`.`nombres`) AS `lapersona` from (`correo` join `persona`) where (`correo`.`idpersona` = `persona`.`idpersona`) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `destinatario1`
--

/*!50001 DROP VIEW IF EXISTS `destinatario1`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_0900_ai_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `destinatario1` AS select `destinatario`.`iddocumento` AS `iddocumento`,`documento`.`asunto` AS `asunto`,`destinatario`.`idpersona` AS `idpersona`,`persona`.`nombres` AS `nombres` from ((`destinatario` join `documento`) join `persona`) where ((`destinatario`.`iddocumento` = `documento`.`iddocumento`) and (`destinatario`.`idpersona` = `persona`.`idpersona`)) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `directorio1`
--

/*!50001 DROP VIEW IF EXISTS `directorio1`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_0900_ai_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `directorio1` AS select `directorio`.`iddirectorio` AS `iddirectorio`,`directorio`.`nombre` AS `nombre`,`directorio`.`ruta` AS `ruta`,`directorio`.`descripcion` AS `descripcion`,`ordenador`.`nombre` AS `elordenador` from (`directorio` join `ordenador`) where (`directorio`.`idordenador` = `ordenador`.`idordenador`) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `documento1`
--

/*!50001 DROP VIEW IF EXISTS `documento1`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_0900_ai_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `documento1` AS select `do`.`iddocumento` AS `iddocumento`,(select concat(coalesce(`pe`.`apellidos`,''),'  ',coalesce(`pe`.`nombres`,'')) from (`persona` `pe` join `emisor` `em`) where ((`do`.`iddocumento` = `em`.`iddocumento`) and (`em`.`idpersona` = `pe`.`idpersona`)) limit 1) AS `autor`,`do`.`asunto` AS `asunto`,`do`.`fechaelaboracion` AS `fechaelaboracion`,`do`.`archivopdf` AS `archivopdf`,`ti`.`idtipodocu` AS `idtipodocu`,`ti`.`descripcion` AS `eltipodocu`,`di`.`ruta` AS `ruta` from ((`documento` `do` join `tipodocu` `ti`) join `directorio` `di`) where ((`do`.`idtipodocu` = `ti`.`idtipodocu`) and (`do`.`iddirectorio` = `di`.`iddirectorio`)) union select `do`.`iddocumento` AS `iddocumento`,(select concat(coalesce(`pe`.`apellidos`,''),'  ',coalesce(`pe`.`nombres`,'')) from (`persona` `pe` join `emisor` `em`) where ((`do`.`iddocumento` = `em`.`iddocumento`) and (`em`.`idpersona` = `pe`.`idpersona`)) limit 1) AS `autor`,`do`.`asunto` AS `asunto`,`do`.`fechaelaboracion` AS `fechaelaboracion`,`do`.`archivopdf` AS `archivopdf`,`ti`.`idtipodocu` AS `idtipodocu`,`ti`.`descripcion` AS `eltipodocu`,'' AS `ruta` from ((`documento` `do` join `tipodocu` `ti`) join `directorio` `di`) where ((`do`.`idtipodocu` = `ti`.`idtipodocu`) and (`do`.`iddirectorio` = 0)) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `emisor1`
--

/*!50001 DROP VIEW IF EXISTS `emisor1`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_0900_ai_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `emisor1` AS select `emisor`.`iddocumento` AS `iddocumento`,`emisor`.`idpersona` AS `idpersona`,concat(coalesce(`persona`.`apellidos`,''),'  ',coalesce(`persona`.`nombres`,'')) AS `elemisor`,`documento`.`asunto` AS `asunto` from ((`emisor` join `persona`) join `documento`) where ((`emisor`.`iddocumento` = `documento`.`iddocumento`) and (`emisor`.`idpersona` = `persona`.`idpersona`)) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `estudiante1`
--

/*!50001 DROP VIEW IF EXISTS `estudiante1`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_0900_ai_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `estudiante1` AS select `estudiante`.`idestudiante` AS `idestudiante`,`persona`.`idpersona` AS `idpersona`,concat(coalesce(`persona`.`apellidos`,''),'  ',coalesce(`persona`.`nombres`,'')) AS `elestudiante`,`estudiante`.`iddepartamento` AS `iddepartamento`,`departamento`.`nombre` AS `lacarrera`,`estudiante`.`fechadesde` AS `fechadesde`,`estudiante`.`fechahasta` AS `fechahasta` from ((`estudiante` join `persona`) join `departamento`) where ((`estudiante`.`idpersona` = `persona`.`idpersona`) and (`estudiante`.`iddepartamento` = `departamento`.`iddepartamento`)) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `estudiante2`
--

/*!50001 DROP VIEW IF EXISTS `estudiante2`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_0900_ai_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `estudiante2` AS select `es`.`idestudiante` AS `idestudiante`,`pe`.`idpersona` AS `idpersona`,concat(coalesce(`pe`.`apellidos`,''),'  ',coalesce(`pe`.`nombres`,'')) AS `elestudiante`,`es`.`iddepartamento` AS `iddepartamento`,`de`.`nombre` AS `lacarrera`,`es`.`fechadesde` AS `fechadesde`,`es`.`fechahasta` AS `fechahasta`,(select count(`em`.`iddocumento`) from `emisor` `em` where (`em`.`idpersona` = `pe`.`idpersona`)) AS `cantidad` from ((`estudiante` `es` join `persona` `pe`) join `departamento` `de`) where ((`es`.`idpersona` = `pe`.`idpersona`) and (`es`.`iddepartamento` = `de`.`iddepartamento`)) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `evaluado1`
--

/*!50001 DROP VIEW IF EXISTS `evaluado1`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_0900_ai_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `evaluado1` AS select `evaluado`.`idevaluado` AS `idevaluado`,concat(`persona`.`apellidos`,' ',`persona`.`nombres`) AS `persona` from (`evaluado` join `persona`) where (`evaluado`.`idpersona` = `persona`.`idpersona`) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `evento1`
--

/*!50001 DROP VIEW IF EXISTS `evento1`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_0900_ai_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `evento1` AS select `evento`.`idevento` AS `idevento`,`evento`.`titulo` AS `titulo`,`evento`.`detalle` AS `detalle`,`evento`.`fechacreacion` AS `fechacreacion`,`evento`.`fechainicia` AS `fechainicia`,`evento`.`fechafinaliza` AS `fechafinaliza`,`evento_estado`.`nombre` AS `estado`,`institucion`.`nombre` AS `lainstitucion` from ((`evento` join `evento_estado`) join `institucion`) where ((`evento`.`idevento_estado` = `evento_estado`.`idevento_estado`) and (`evento`.`idinstitucion` = `institucion`.`idinstitucion`)) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `maestrante1`
--

/*!50001 DROP VIEW IF EXISTS `maestrante1`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_0900_ai_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `maestrante1` AS select `maestrante`.`idmaestrante` AS `idmaestrante`,`persona`.`idpersona` AS `idpersona`,`persona`.`cedula` AS `cedula`,concat(`persona`.`apellidos`,'  ',`persona`.`nombres`) AS `maestrante`,`maestrante_estado`.`idmaestrante_estado` AS `idmaestrante_estado`,`maestrante_estado`.`nombre` AS `estado`,`maestria`.`idmaestria` AS `idmaestria`,`maestria`.`nombre` AS `maestria`,`correo`.`nombre` AS `correo`,`telefono`.`numero` AS `telefono` from (((((`maestrante` join `persona`) join `maestrante_estado`) join `maestria`) join `correo`) join `telefono`) where ((`maestrante`.`idpersona` = `persona`.`idpersona`) and (`maestrante`.`idmaestrante_estado` = `maestrante_estado`.`idmaestrante_estado`) and (`maestrante`.`idmaestria` = `maestria`.`idmaestria`) and (`correo`.`idpersona` = `persona`.`idpersona`) and (`correo`.`idcorreo_estado` = 1) and (`telefono`.`idpersona` = `persona`.`idpersona`) and (`telefono`.`idtelefono_estado` = 1)) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `participante1`
--

/*!50001 DROP VIEW IF EXISTS `participante1`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_0900_ai_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `participante1` AS select `participante`.`idevento` AS `idevento`,`participante`.`idpersona` AS `idpersona`,concat(`persona`.`apellidos`,' ',`persona`.`nombres`) AS `nombres` from (`participante` join `persona`) where (`participante`.`idpersona` = `persona`.`idpersona`) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `persona2`
--

/*!50001 DROP VIEW IF EXISTS `persona2`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_0900_ai_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `persona2` AS select `persona`.`idpersona` AS `idpersona`,concat(`persona`.`apellidos`,' ',`persona`.`nombres`) AS `lapersona`,`correo`.`nombre` AS `correo`,`telefono`.`numero` AS `telefono` from ((((`persona` join `correo`) join `telefono`) join `correo_estado`) join `telefono_estado`) where ((`persona`.`idpersona` = `correo`.`idpersona`) and (`persona`.`idpersona` = `telefono`.`idpersona`) and (`correo`.`idcorreo_estado` = 1) and (`telefono`.`idtelefono_estado` = 1)) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `portafolioestudiante1`
--

/*!50001 DROP VIEW IF EXISTS `portafolioestudiante1`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_0900_ai_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `portafolioestudiante1` AS select `portafolioestudiante`.`idportafolioestudiante` AS `idportafolioestudiante`,`portafoliomodelo`.`nombre` AS `eldocumento`,concat(coalesce(`persona`.`apellidos`,''),'  ',coalesce(`persona`.`nombres`,'')) AS `elestudiante`,`estado_portafolio`.`nombre` AS `elestado` from ((((`portafolioestudiante` join `estudiante`) join `persona`) join `estado_portafolio`) join `portafoliomodelo`) where ((`portafolioestudiante`.`idportafoliomodelo` = `portafoliomodelo`.`idportafoliomodelo`) and (`portafolioestudiante`.`idestudiante` = `estudiante`.`idestudiante`) and (`estudiante`.`idpersona` = `persona`.`idpersona`) and (`portafolioestudiante`.`idestado_portafolio` = `estado_portafolio`.`idestado_portafolio`)) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `telefono1`
--

/*!50001 DROP VIEW IF EXISTS `telefono1`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_0900_ai_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `telefono1` AS select `telefono`.`idtelefono` AS `idtelefono`,`telefono`.`numero` AS `numero`,concat(`persona`.`apellidos`,'  ',`persona`.`nombres`) AS `lapersona` from (`telefono` join `persona`) where (`telefono`.`idpersona` = `persona`.`idpersona`) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `tipodocu1`
--

/*!50001 DROP VIEW IF EXISTS `tipodocu1`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_0900_ai_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `tipodocu1` AS select `t`.`idtipodocu` AS `idtipodocu`,`t`.`descripcion` AS `descripcion`,(select count(`d`.`iddocumento`) from `documento` `d` where (`d`.`idtipodocu` = `t`.`idtipodocu`)) AS `cantidad` from `tipodocu` `t` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `usuario1`
--

/*!50001 DROP VIEW IF EXISTS `usuario1`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_0900_ai_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `usuario1` AS select `usuario`.`idusuario` AS `idusuario`,concat(coalesce(`persona`.`apellidos`,''),'  ',coalesce(`persona`.`nombres`,'')) AS `elusuario`,`perfil`.`nombre` AS `elperfil`,`usuario`.`email` AS `email`,`usuario`.`password` AS `password` from ((`usuario` join `persona`) join `perfil`) where ((`usuario`.`idpersona` = `persona`.`idpersona`) and (`usuario`.`idperfil` = `perfil`.`idperfil`)) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `vitacora_maestrante_estado1`
--

/*!50001 DROP VIEW IF EXISTS `vitacora_maestrante_estado1`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_0900_ai_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `vitacora_maestrante_estado1` AS select `maestrante`.`idmaestrante` AS `idmaestrante`,concat(`persona`.`apellidos`,'  ',`persona`.`nombres`) AS `maestrante`,`maestrante_estado`.`nombre` AS `estado`,`vitacora_maestrante_estado`.`fechainicia` AS `fechainicia`,`vitacora_maestrante_estado`.`fechafinaliza` AS `fechafinaliza` from (((`vitacora_maestrante_estado` join `maestrante`) join `persona`) join `maestrante_estado`) where ((`vitacora_maestrante_estado`.`idmaestrante` = `maestrante`.`idmaestrante`) and (`maestrante`.`idpersona` = `persona`.`idpersona`) and (`vitacora_maestrante_estado`.`idmaestrante_estado` = `maestrante_estado`.`idmaestrante_estado`)) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-02-14 17:41:59
