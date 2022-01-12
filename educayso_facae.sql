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
-- Table structure for table `asignatura`
--

use educayso_facae;

DROP TABLE IF EXISTS `asignatura`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `asignatura` (
  `idasignatura` int NOT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `creditos` int DEFAULT NULL,
  PRIMARY KEY (`idasignatura`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `asignatura`
--

LOCK TABLES `asignatura` WRITE;
/*!40000 ALTER TABLE `asignatura` DISABLE KEYS */;
/*!40000 ALTER TABLE `asignatura` ENABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `certificado`
--

LOCK TABLES `certificado` WRITE;
/*!40000 ALTER TABLE `certificado` DISABLE KEYS */;
INSERT INTO `certificado` VALUES (2,'Certificado de Alex Quispe Mera.pdf',NULL,'http://congresoutlvte.org/facped/Repositorio/Certificados/','1er CONGRESO INTERNACIONAL VIRTUAL PEDAGOGÍA E INTERCULTURALIDAD FACULTAD DE LA PEDAGOGÍA -2021'),(3,'Certificado de Ana Bedoya Gutierrez.pdf',NULL,'http://congresoutlvte.org/facped/Repositorio/Certificados/','1er CONGRESO INTERNACIONAL VIRTUAL PEDAGOGÍA E INTERCULTURALIDAD FACULTAD DE LA PEDAGOGÍA -2021'),(4,'Certificado de Andrea Cortes Gutierrez.pdf',NULL,'http://congresoutlvte.org/facped/Repositorio/Certificados/','1er CONGRESO INTERNACIONAL VIRTUAL PEDAGOGÍA E INTERCULTURALIDAD FACULTAD DE LA PEDAGOGÍA -2021'),(5,'Certificado de Carla Bernal Villavicencio.pdf',NULL,'http://congresoutlvte.org/facped/Repositorio/Certificados/','1er CONGRESO INTERNACIONAL VIRTUAL PEDAGOGÍA E INTERCULTURALIDAD FACULTAD DE LA PEDAGOGÍA -2021'),(6,'Certificado de Carlos Simon Plata Cabrera.pdf',NULL,'http://congresoutlvte.org/facped/Repositorio/Certificados/','1er CONGRESO INTERNACIONAL VIRTUAL PEDAGOGÍA E INTERCULTURALIDAD FACULTAD DE LA PEDAGOGÍA -2021'),(7,'Certificado de Carmen Karina Hurtado Toral.pdf',NULL,'http://congresoutlvte.org/facped/Repositorio/Certificados/','1er CONGRESO INTERNACIONAL VIRTUAL PEDAGOGÍA E INTERCULTURALIDAD FACULTAD DE LA PEDAGOGÍA -2021'),(8,'Certificado de Celia Batalla Benavides.pdf',NULL,'http://congresoutlvte.org/facped/Repositorio/Certificados/','1er CONGRESO INTERNACIONAL VIRTUAL PEDAGOGÍA E INTERCULTURALIDAD FACULTAD DE LA PEDAGOGÍA -2021'),(9,'Certificado de Celia Veronica Batalla Benavides.pdf',NULL,'http://congresoutlvte.org/facped/Repositorio/Certificados/','1er CONGRESO INTERNACIONAL VIRTUAL PEDAGOGÍA E INTERCULTURALIDAD FACULTAD DE LA PEDAGOGÍA -2021'),(10,'Certificado de Diego Hurtado.pdf',NULL,'http://congresoutlvte.org/facped/Repositorio/Certificados/','1er CONGRESO INTERNACIONAL VIRTUAL PEDAGOGÍA E INTERCULTURALIDAD FACULTAD DE LA PEDAGOGÍA -2021'),(11,'Certificado de Ena Alexandra Diaz Iturre.pdf',NULL,'http://congresoutlvte.org/facped/Repositorio/Certificados/','1er CONGRESO INTERNACIONAL VIRTUAL PEDAGOGÍA E INTERCULTURALIDAD FACULTAD DE LA PEDAGOGÍA -2021'),(12,'Certificado de Evelyn Perea Rodríguez.pdf',NULL,'http://congresoutlvte.org/facped/Repositorio/Certificados/','1er CONGRESO INTERNACIONAL VIRTUAL PEDAGOGÍA E INTERCULTURALIDAD FACULTAD DE LA PEDAGOGÍA -2021'),(13,'Certificado de Fausto Ivan Guapi Guaman.pdf',NULL,'http://congresoutlvte.org/facped/Repositorio/Certificados/','1er CONGRESO INTERNACIONAL VIRTUAL PEDAGOGÍA E INTERCULTURALIDAD FACULTAD DE LA PEDAGOGÍA -2021'),(14,'Certificado de Francisco Angel Simon Ricardo.pdf',NULL,'http://congresoutlvte.org/facped/Repositorio/Certificados/','1er CONGRESO INTERNACIONAL VIRTUAL PEDAGOGÍA E INTERCULTURALIDAD FACULTAD DE LA PEDAGOGÍA -2021'),(15,'Certificado de Gaby A Arroyo Preciado.pdf',NULL,'http://congresoutlvte.org/facped/Repositorio/Certificados/','1er CONGRESO INTERNACIONAL VIRTUAL PEDAGOGÍA E INTERCULTURALIDAD FACULTAD DE LA PEDAGOGÍA -2021'),(16,'Certificado de Gaby Adelaida Arroyo Preciado.pdf',NULL,'http://congresoutlvte.org/facped/Repositorio/Certificados/','1er CONGRESO INTERNACIONAL VIRTUAL PEDAGOGÍA E INTERCULTURALIDAD FACULTAD DE LA PEDAGOGÍA -2021'),(17,'Certificado de Henry Javier Renteria Macias.pdf',NULL,'http://congresoutlvte.org/facped/Repositorio/Certificados/','1er CONGRESO INTERNACIONAL VIRTUAL PEDAGOGÍA E INTERCULTURALIDAD FACULTAD DE LA PEDAGOGÍA -2021'),(18,'Certificado de Henry Renteria Macias.pdf',NULL,'http://congresoutlvte.org/facped/Repositorio/Certificados/','1er CONGRESO INTERNACIONAL VIRTUAL PEDAGOGÍA E INTERCULTURALIDAD FACULTAD DE LA PEDAGOGÍA -2021'),(19,'Certificado de Hernan Chila Ortiz.pdf',NULL,'http://congresoutlvte.org/facped/Repositorio/Certificados/','1er CONGRESO INTERNACIONAL VIRTUAL PEDAGOGÍA E INTERCULTURALIDAD FACULTAD DE LA PEDAGOGÍA -2021'),(20,'Certificado de Hernan Chila.pdf',NULL,'http://congresoutlvte.org/facped/Repositorio/Certificados/','1er CONGRESO INTERNACIONAL VIRTUAL PEDAGOGÍA E INTERCULTURALIDAD FACULTAD DE LA PEDAGOGÍA -2021'),(21,'Certificado de Hugo David Tapia Sosa-1er Congreso.pdf',NULL,'http://congresoutlvte.org/facped/Repositorio/Certificados/','1er CONGRESO INTERNACIONAL VIRTUAL PEDAGOGÍA E INTERCULTURALIDAD FACULTAD DE LA PEDAGOGÍA -2021'),(22,'Certificado de Isabel Clavijo Robinson.pdf',NULL,'http://congresoutlvte.org/facped/Repositorio/Certificados/','1er CONGRESO INTERNACIONAL VIRTUAL PEDAGOGÍA E INTERCULTURALIDAD FACULTAD DE LA PEDAGOGÍA -2021'),(23,'Certificado de Isabel Veronica Clavijo Robinson.pdf',NULL,'http://congresoutlvte.org/facped/Repositorio/Certificados/','1er CONGRESO INTERNACIONAL VIRTUAL PEDAGOGÍA E INTERCULTURALIDAD FACULTAD DE LA PEDAGOGÍA -2021'),(24,'Certificado de Jeimy Hernandez Martinez.pdf',NULL,'http://congresoutlvte.org/facped/Repositorio/Certificados/','1er CONGRESO INTERNACIONAL VIRTUAL PEDAGOGÍA E INTERCULTURALIDAD FACULTAD DE LA PEDAGOGÍA -2021'),(25,'Certificado de Jenny Margarita Valverde Medina.pdf',NULL,'http://congresoutlvte.org/facped/Repositorio/Certificados/','1er CONGRESO INTERNACIONAL VIRTUAL PEDAGOGÍA E INTERCULTURALIDAD FACULTAD DE LA PEDAGOGÍA -2021'),(26,'Certificado de Jessica Marquez Ramirez.pdf',NULL,'http://congresoutlvte.org/facped/Repositorio/Certificados/','1er CONGRESO INTERNACIONAL VIRTUAL PEDAGOGÍA E INTERCULTURALIDAD FACULTAD DE LA PEDAGOGÍA -2021'),(27,'Certificado de Jimmy Fernando Ramirez Marquez.pdf',NULL,'http://congresoutlvte.org/facped/Repositorio/Certificados/','1er CONGRESO INTERNACIONAL VIRTUAL PEDAGOGÍA E INTERCULTURALIDAD FACULTAD DE LA PEDAGOGÍA -2021'),(28,'Certificado de Joseph Cruel Siguenza.pdf',NULL,'http://congresoutlvte.org/facped/Repositorio/Certificados/','1er CONGRESO INTERNACIONAL VIRTUAL PEDAGOGÍA E INTERCULTURALIDAD FACULTAD DE LA PEDAGOGÍA -2021'),(29,'Certificado de Juan Taporonte Morales.pdf',NULL,'http://congresoutlvte.org/facped/Repositorio/Certificados/','1er CONGRESO INTERNACIONAL VIRTUAL PEDAGOGÍA E INTERCULTURALIDAD FACULTAD DE LA PEDAGOGÍA -2021'),(30,'Certificado de Leonel Aldana Naranjo.pdf',NULL,'http://congresoutlvte.org/facped/Repositorio/Certificados/','1er CONGRESO INTERNACIONAL VIRTUAL PEDAGOGÍA E INTERCULTURALIDAD FACULTAD DE LA PEDAGOGÍA -2021'),(31,'Certificado de Luis Estupiñan Rodriguez.pdf',NULL,'http://congresoutlvte.org/facped/Repositorio/Certificados/','1er CONGRESO INTERNACIONAL VIRTUAL PEDAGOGÍA E INTERCULTURALIDAD FACULTAD DE LA PEDAGOGÍA -2021'),(32,'Certificado de Maria Isabel Vallejo Cardenas.pdf',NULL,'http://congresoutlvte.org/facped/Repositorio/Certificados/','1er CONGRESO INTERNACIONAL VIRTUAL PEDAGOGÍA E INTERCULTURALIDAD FACULTAD DE LA PEDAGOGÍA -2021'),(33,'Certificado de Maria Paula Villa Lujano.pdf',NULL,'http://congresoutlvte.org/facped/Repositorio/Certificados/','1er CONGRESO INTERNACIONAL VIRTUAL PEDAGOGÍA E INTERCULTURALIDAD FACULTAD DE LA PEDAGOGÍA -2021'),(34,'Certificado de Martin Mateo Ramirez Marquez.pdf',NULL,'http://congresoutlvte.org/facped/Repositorio/Certificados/','1er CONGRESO INTERNACIONAL VIRTUAL PEDAGOGÍA E INTERCULTURALIDAD FACULTAD DE LA PEDAGOGÍA -2021'),(35,'Certificado de Nelly del Rocio Panchano.pdf',NULL,'http://congresoutlvte.org/facped/Repositorio/Certificados/','1er CONGRESO INTERNACIONAL VIRTUAL PEDAGOGÍA E INTERCULTURALIDAD FACULTAD DE LA PEDAGOGÍA -2021'),(36,'Certificado de Olga Quiñonez Cagua.pdf',NULL,'http://congresoutlvte.org/facped/Repositorio/Certificados/','1er CONGRESO INTERNACIONAL VIRTUAL PEDAGOGÍA E INTERCULTURALIDAD FACULTAD DE LA PEDAGOGÍA -2021'),(37,'Certificado de Patricia M Lujano Meza.pdf',NULL,'http://congresoutlvte.org/facped/Repositorio/Certificados/','1er CONGRESO INTERNACIONAL VIRTUAL PEDAGOGÍA E INTERCULTURALIDAD FACULTAD DE LA PEDAGOGÍA -2021'),(38,'Certificado de Patricia Margarita Lujano Meza.pdf',NULL,'http://congresoutlvte.org/facped/Repositorio/Certificados/','1er CONGRESO INTERNACIONAL VIRTUAL PEDAGOGÍA E INTERCULTURALIDAD FACULTAD DE LA PEDAGOGÍA -2021'),(39,'Certificado de Pedro Cesar Godoy Roser.pdf',NULL,'http://congresoutlvte.org/facped/Repositorio/Certificados/','1er CONGRESO INTERNACIONAL VIRTUAL PEDAGOGÍA E INTERCULTURALIDAD FACULTAD DE LA PEDAGOGÍA -2021'),(40,'Certificado de Rita Leivis Bolaños Mosquera.pdf',NULL,'http://congresoutlvte.org/facped/Repositorio/Certificados/','1er CONGRESO INTERNACIONAL VIRTUAL PEDAGOGÍA E INTERCULTURALIDAD FACULTAD DE LA PEDAGOGÍA -2021'),(41,'Certificado de Santa Rocio Toala Ponce.pdf',NULL,'http://congresoutlvte.org/facped/Repositorio/Certificados/','1er CONGRESO INTERNACIONAL VIRTUAL PEDAGOGÍA E INTERCULTURALIDAD FACULTAD DE LA PEDAGOGÍA -2021'),(42,'Certificado de Santos Geovanny Mina Bone.pdf',NULL,'http://congresoutlvte.org/facped/Repositorio/Certificados/','1er CONGRESO INTERNACIONAL VIRTUAL PEDAGOGÍA E INTERCULTURALIDAD FACULTAD DE LA PEDAGOGÍA -2021'),(43,'Certificado de Sergio Guzman Garcia Sanclemente.pdf',NULL,'http://congresoutlvte.org/facped/Repositorio/Certificados/','1er CONGRESO INTERNACIONAL VIRTUAL PEDAGOGÍA E INTERCULTURALIDAD FACULTAD DE LA PEDAGOGÍA -2021'),(44,'Certificado de Tunin Gilmar Murillo andrade.pdf',NULL,'http://congresoutlvte.org/facped/Repositorio/Certificados/','1er CONGRESO INTERNACIONAL VIRTUAL PEDAGOGÍA E INTERCULTURALIDAD FACULTAD DE LA PEDAGOGÍA -2021'),(45,'Certificado de Victor Manuel Arroyo Quiñonez.pdf',NULL,'http://congresoutlvte.org/facped/Repositorio/Certificados/','1er CONGRESO INTERNACIONAL VIRTUAL PEDAGOGÍA E INTERCULTURALIDAD FACULTAD DE LA PEDAGOGÍA -2021'),(46,'Certificado de Wendy  Santos Marquez.pdf',NULL,'http://congresoutlvte.org/facped/Repositorio/Certificados/','1er CONGRESO INTERNACIONAL VIRTUAL PEDAGOGÍA E INTERCULTURALIDAD FACULTAD DE LA PEDAGOGÍA -2021'),(47,'Certificado de Wendy Narcisa Santos Marquez.pdf',NULL,'http://congresoutlvte.org/facped/Repositorio/Certificados/','1er CONGRESO INTERNACIONAL VIRTUAL PEDAGOGÍA E INTERCULTURALIDAD FACULTAD DE LA PEDAGOGÍA -2021'),(48,'Certificado de Xiomara Grueso Guerrero.pdf',NULL,'http://congresoutlvte.org/facped/Repositorio/Certificados/','1er CONGRESO INTERNACIONAL VIRTUAL PEDAGOGÍA E INTERCULTURALIDAD FACULTAD DE LA PEDAGOGÍA -2021'),(49,'Certificado de Yessica Tapia Ortiz-1er Congreso.pdf',NULL,'http://congresoutlvte.org/facped/Repositorio/Certificados/','1er CONGRESO INTERNACIONAL VIRTUAL PEDAGOGÍA E INTERCULTURALIDAD FACULTAD DE LA PEDAGOGÍA -2021');
/*!40000 ALTER TABLE `certificado` ENABLE KEYS */;
UNLOCK TABLES;

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
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `correo`
--

LOCK TABLES `correo` WRITE;
/*!40000 ALTER TABLE `correo` DISABLE KEYS */;
INSERT INTO `correo` VALUES (4,'geralva@hotmail.es',11,1),(5,'vdtr.eqm1995@gmail.com',27,1),(6,'wcontreras_1994@hotmail.com',13,1),(7,'bustamantelopezmariansonia@gmail.com',25,1),(8,'jovanitty_85@hotmail.com',21,1),(9,'gerardo_solano@utelvt.edu.ec',20,1),(10,'yamiloelunico@gmail.com',19,1),(11,'cesarmanchay3@gmail.com',17,1),(12,'veronikita_linda@hotmail.es',14,1),(13,'roberto_edwin1979@hotmail.com',15,1),(14,'jacksonmanchay@yahoo.es',28,1),(15,'ilsi.n31@hotmail.com',9,1),(16,'rafael.perez@policia.gob.ec',16,1),(17,'deyanirachila@hotmail.com',26,1),(18,'nela.qocortes91@gmail.com',24,1),(19,'byronramirez1994@gmail.com',18,1),(21,'educaysoft@gmail.com',8,1),(22,'kevinaguilar16sm@gmial.com',29,1),(23,'damaris.miranda@utelvte.edu.ec',31,1),(24,'jimmypaz_22@hotmail.com',12,1),(25,'stefydiaz_1325@hotmail.com',10,1),(26,'congresoutlvte@utelvt.edu.ec',32,1),(27,'admin',33,1);
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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `directorio`
--

LOCK TABLES `directorio` WRITE;
/*!40000 ALTER TABLE `directorio` DISABLE KEYS */;
INSERT INTO `directorio` VALUES (1,'pdf',NULL,NULL,1),(2,'pdf','/pdfs',NULL,1);
/*!40000 ALTER TABLE `directorio` ENABLE KEYS */;
UNLOCK TABLES;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
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
  PRIMARY KEY (`iddocumento`,`idtipodocu`),
  KEY `fk_documento_tipodocu1_idx` (`idtipodocu`),
  CONSTRAINT `fk_documento_tipodocu1` FOREIGN KEY (`idtipodocu`) REFERENCES `tipodocu` (`idtipodocu`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `documento`
--

LOCK TABLES `documento` WRITE;
/*!40000 ALTER TABLE `documento` DISABLE KEYS */;
INSERT INTO `documento` VALUES (1,'2021-09-02','Documento de prueba','Planificacion-MTI.pdf','2021-09-22 00:00:00','Este es un documento de prueba que se sube',2),(3,'2021-09-17','prueba de documento recibido','2021-09-17-MBOD-000003.pdf','2021-09-23 00:00:00','Esta es un documeot de prueba',1),(4,'2021-09-24','RECLAMO SOBRE NOTAS','cronograma_y_plana_docente_Maestrías_2021-2021.pdf','2021-09-30 00:00:00','UN RECLAMO SOBRE NOTAS ATRASADAS ',3),(5,'2021-09-18','SOLICITUD DE MATRICULA PARA EL PERIODO 2021-1S','PagoRosangelaMesEnero.pdf','2021-09-20 00:00:00','EL DOCUMENTO ES UN PAGO',2),(6,'2021-09-21','CORRECCION DE NOTAS DEL SEGUNDO PARCIAL 2021-1S','','2021-09-22 00:00:00','ESTE DOCUMENTO LO RECIBO EN LA OFICION ',1);
/*!40000 ALTER TABLE `documento` ENABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `emisor`
--

LOCK TABLES `emisor` WRITE;
/*!40000 ALTER TABLE `emisor` DISABLE KEYS */;
INSERT INTO `emisor` VALUES (2,7,1),(3,7,3);
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
 1 AS `asunto`,
 1 AS `nombres`*/;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `estudiane`
--

DROP TABLE IF EXISTS `estudiane`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `estudiane` (
  `idestudiane` int NOT NULL AUTO_INCREMENT,
  `idpersona` int NOT NULL,
  PRIMARY KEY (`idestudiane`,`idpersona`),
  KEY `fk_estudiane_persona1_idx` (`idpersona`),
  CONSTRAINT `fk_estudiane_persona1` FOREIGN KEY (`idpersona`) REFERENCES `persona` (`idpersona`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `estudiane`
--

LOCK TABLES `estudiane` WRITE;
/*!40000 ALTER TABLE `estudiane` DISABLE KEYS */;
/*!40000 ALTER TABLE `estudiane` ENABLE KEYS */;
UNLOCK TABLES;

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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
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
  PRIMARY KEY (`idevento`,`idevento_estado`),
  KEY `fk_evento_evento_estado1_idx` (`idevento_estado`),
  CONSTRAINT `fk_evento_evento_estado1` FOREIGN KEY (`idevento_estado`) REFERENCES `evento_estado` (`idevento_estado`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `evento`
--

LOCK TABLES `evento` WRITE;
/*!40000 ALTER TABLE `evento` DISABLE KEYS */;
INSERT INTO `evento` VALUES (1,'PRUEBA DE CONOCIMIENTO','2021-10-22','2021-10-22 00:00:00','2021-10-22 00:00:00','LOS ASPIRANTE DEBEN RENDIR LA PRUEBA DE CONOCIMIENTO',1),(2,'ENTREVISTA A ASPIRANTE DE MAESTRIA','2021-10-22','0000-00-00 00:00:00','2021-10-22 10:30:00','entrevistas a aspirantes dirige johana',1),(3,'ENTREVISTA A BUSTAMANTE LOPEZ SONIA MARIA','2021-10-25','2021-10-25 15:00:00','2021-10-25 15:30:00','VIA MEET',1);
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
 1 AS `estado`*/;
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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `funcionario`
--

LOCK TABLES `funcionario` WRITE;
/*!40000 ALTER TABLE `funcionario` DISABLE KEYS */;
/*!40000 ALTER TABLE `funcionario` ENABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `institucion`
--

LOCK TABLES `institucion` WRITE;
/*!40000 ALTER TABLE `institucion` DISABLE KEYS */;
INSERT INTO `institucion` VALUES (1,'Universidad Tecnica Luis Vargas Torres'),(2,'UTLVTE-LA CONCORDIA');
/*!40000 ALTER TABLE `institucion` ENABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mensaje_estado`
--

LOCK TABLES `mensaje_estado` WRITE;
/*!40000 ALTER TABLE `mensaje_estado` DISABLE KEYS */;
/*!40000 ALTER TABLE `mensaje_estado` ENABLE KEYS */;
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `operadora`
--

LOCK TABLES `operadora` WRITE;
/*!40000 ALTER TABLE `operadora` DISABLE KEYS */;
INSERT INTO `operadora` VALUES (1,'claro');
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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ordenador`
--

LOCK TABLES `ordenador` WRITE;
/*!40000 ALTER TABLE `ordenador` DISABLE KEYS */;
INSERT INTO `ordenador` VALUES (1,'XArchivos.org'),(4,'OFICINASECRETARIA'),(6,'Ingreso a Maestrias');
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
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
  `descripcion` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`idperfil`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
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
  `fechanaci` date DEFAULT NULL,
  `foto` char(50) DEFAULT NULL,
  `pdf` char(50) DEFAULT NULL,
  `idgenero` int DEFAULT NULL,
  `idtiposangre` int DEFAULT NULL,
  `idestadocivil` int DEFAULT NULL,
  `idnacionalidad` int DEFAULT NULL,
  PRIMARY KEY (`idpersona`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `persona`
--

LOCK TABLES `persona` WRITE;
/*!40000 ALTER TABLE `persona` DISABLE KEYS */;
INSERT INTO `persona` VALUES (7,'Miranda Bolaños Damaris',NULL,'0850489881',NULL,'fotos/0850489881.jpg','pdfs/0850489881.pdf',1,1,1,1),(8,'STALIN ADALBERTO','FRANCIS QUINDE','0801560517',NULL,NULL,NULL,NULL,NULL,NULL,NULL),(9,'ILCI MONSERRATE','NAZARENO ARTEAGA','0804363265',NULL,NULL,NULL,NULL,NULL,NULL,NULL),(10,'ROXANA STEFANIA','DIAZ ESTUPIÑAN','0801951781',NULL,NULL,NULL,NULL,NULL,NULL,NULL),(11,'CRUZ DIANA','COROZO CAGUA','0802656686',NULL,NULL,NULL,NULL,NULL,NULL,NULL),(12,'JIMMY ALEXANDER','PAZMIÑO TORRES','0802394338',NULL,NULL,NULL,NULL,NULL,NULL,NULL),(13,'WILSON ENRRIQUE','CONTRERAS PASCUAZA','0803775345',NULL,NULL,NULL,NULL,NULL,NULL,NULL),(14,'BETTY VERONICA','MOSQUERA CASTILLO','0802169581',NULL,NULL,NULL,NULL,NULL,NULL,NULL),(15,'ROBERTO EDWIN','MONTAÑO ROLDAN','0802200154',NULL,NULL,NULL,NULL,NULL,NULL,NULL),(16,'RAFAEL MARCELO','PEREZ AGUIRRE','1500434095',NULL,NULL,NULL,NULL,NULL,NULL,NULL),(17,'CESAR ALBERTO','MANCHAY ORBEA','082324665',NULL,NULL,NULL,NULL,NULL,NULL,NULL),(18,'BYRON  JAVIER','RAMIREZ DUEÑAS','0850036823',NULL,NULL,NULL,NULL,NULL,NULL,NULL),(19,'YAMIL RODRIGO','LOPEZ ALBAN','0802402131',NULL,NULL,NULL,NULL,NULL,NULL,NULL),(20,'GERARDO ALFREDO','SOLORZANO GUTIERREZ','1714184429',NULL,NULL,NULL,NULL,NULL,NULL,NULL),(21,'GEOVANY','RIVERA BAZAN','0803063593',NULL,NULL,NULL,NULL,NULL,NULL,NULL),(22,'RAFAEL MARCELO','PEREZ AGUIRRE','1500434095',NULL,NULL,NULL,NULL,NULL,NULL,NULL),(23,'PATRICIO EDUARDO','PERALTA VALVERDE','0801943655',NULL,NULL,NULL,NULL,NULL,NULL,NULL),(24,'MARIA NELA','QUIÑONEZ CORTEZ','0804096675',NULL,NULL,NULL,NULL,NULL,NULL,NULL),(25,'SONIA MARÍA','BUSTAMANTE LÓPEZ','0920298460',NULL,NULL,NULL,NULL,NULL,NULL,NULL),(26,'INGRID DEYANIRA','QUINDE ACOSTA','0801416017',NULL,NULL,NULL,NULL,NULL,NULL,NULL),(27,'VICTOR EDUARDO','QUISPE MERA','0804383495',NULL,NULL,NULL,NULL,NULL,NULL,NULL),(28,'JACKSON ARTURO','MANCHAY ORBEA','0802654681',NULL,NULL,NULL,NULL,NULL,NULL,NULL),(29,'KEVIN STEEVEN','AGUILAR MOLINA','0803708940',NULL,NULL,NULL,NULL,NULL,NULL,NULL),(31,'DAMARIS MARGARITA','MIRANDA BOLAÑOS','0850489881',NULL,NULL,NULL,NULL,NULL,NULL,NULL),(32,'congresoutlvte','facped','0000000000',NULL,'fotos/0000000000.jpg',NULL,NULL,NULL,NULL,NULL),(33,'admin','admin','0000000000',NULL,'fotos/0000000000.jpg',NULL,NULL,NULL,NULL,NULL);
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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
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
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `telefono`
--

LOCK TABLES `telefono` WRITE;
/*!40000 ALTER TABLE `telefono` DISABLE KEYS */;
INSERT INTO `telefono` VALUES (2,'0968619870',10,1,1),(3,'0896442331',11,1,1),(4,'0967653764',12,1,1),(5,'0989678140',27,1,1),(6,'0999168280',26,1,1),(7,'0920298460',25,1,1),(9,'0967774874',21,1,1),(10,'0997100105',20,1,1),(11,'0994673447',19,1,1),(12,'0996705278',18,1,1),(13,'0939734500',17,1,1),(14,'0997335572',14,1,1),(15,'0987524609',16,1,1),(16,'0997153938',15,1,1),(19,'0989891748',13,1,1),(20,'0988685744',28,1,1),(21,'0990377244',9,1,1),(22,'0997627379',24,1,1),(23,'0985418026',29,1,1),(24,'08093833454',32,1,1),(25,'0938373',33,1,1);
/*!40000 ALTER TABLE `telefono` ENABLE KEYS */;
UNLOCK TABLES;

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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
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
  PRIMARY KEY (`idtipodocu`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipodocu`
--

LOCK TABLES `tipodocu` WRITE;
/*!40000 ALTER TABLE `tipodocu` DISABLE KEYS */;
INSERT INTO `tipodocu` VALUES (1,'OFICIO RECIBIDO'),(2,'OFICIO ENTREGADOS'),(3,'OFICIO DE RECLAMO'),(6,'CERTIFICADO ENTREGADO');
/*!40000 ALTER TABLE `tipodocu` ENABLE KEYS */;
UNLOCK TABLES;

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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
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
  PRIMARY KEY (`idusuario`),
  KEY `idpersona` (`idpersona`),
  KEY `fk_usuario_perfil1_idx` (`idperfil`),
  CONSTRAINT `fk_usuario_perfil1` FOREIGN KEY (`idperfil`) REFERENCES `perfil` (`idperfil`),
  CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`idpersona`) REFERENCES `persona` (`idpersona`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario`
--

LOCK TABLES `usuario` WRITE;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` VALUES (3,'123456',7,'damaris.miranda@utelvt.edu.ec',1),(4,'PIWIIB1234',8,'educaysoft@gmail.com',1),(5,'congresoutlvte',32,'congresoutlvte@utelvte.edu.ec',3),(6,'admin',33,'admin',3);
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
 1 AS `password`,
 1 AS `idpersona`,
 1 AS `nombres`,
 1 AS `idperfil`,
 1 AS `descripcion`,
 1 AS `email`*/;
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
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `visitas`
--

LOCK TABLES `visitas` WRITE;
/*!40000 ALTER TABLE `visitas` DISABLE KEYS */;
INSERT INTO `visitas` VALUES (1,'http://localhost/facped/index.php',23),(2,'http://localhost/facped/congresoutlvte-normas.php',8),(3,'http://localhost/facped/congresoutlvte-prese.php',8),(4,'http://192.168.1.10/facped/',1),(5,'http://192.168.1.10/facped/congresoutlvte-normas.php',4),(6,'http://192.168.1.10/facped/index.php',3),(7,'http://localhost/facped/congresoutlvte-pdf.php',12),(8,'http://localhost/facped/',20),(9,'http://localhost/facped/congresoutlvte-agenda.php',6),(10,'http://localhost/facped/congresoutlvte-tematicas.php',10),(11,'http://localhost/facped/congresoutlvte-confe.php',2),(12,'http://localhost/facped/congresoutlvte-confe2.php',17),(13,'http://192.168.1.10/facped/congresoutlvte-confe2.php',1),(14,'http://192.168.1.10/facped/congresoutlvte-prese.php',1),(15,'http://localhost/facped/congresoutlvte-momoria.php',11),(16,'http://localhost/facped/congresoutlvte-certi.php',5),(17,'http://localhost/facped/congresoutlvte-saludos.php',3),(18,'http://192.168.1.10/facped/congresoutlvte-saludos.php',1),(19,'http://localhost/facped/congresoutlvte-agendafinal.php',2),(20,'http://localhost/facped/congresoutlvte-evento.php',2),(21,'http://192.168.43.26/facped/congresoutlvte-evento.php',1),(22,'http://192.168.1.10/facped/congresoutlvte-evento.php',1);
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
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
-- Final view structure for view `correo1`
--

/*!50001 DROP VIEW IF EXISTS `correo1`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_general_ci */;
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
/*!50001 SET collation_connection      = utf8mb4_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `destinatario1` AS select `destinatario`.`iddocumento` AS `iddocumento`,`documento`.`asunto` AS `asunto`,`destinatario`.`idpersona` AS `idpersona`,`persona`.`nombres` AS `nombres` from ((`destinatario` join `documento`) join `persona`) where ((`destinatario`.`iddocumento` = `documento`.`iddocumento`) and (`destinatario`.`idpersona` = `persona`.`idpersona`)) */;
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
/*!50001 SET collation_connection      = utf8mb4_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `emisor1` AS select `emisor`.`iddocumento` AS `iddocumento`,`emisor`.`idpersona` AS `idpersona`,`documento`.`asunto` AS `asunto`,`persona`.`nombres` AS `nombres` from ((`emisor` join `documento`) join `persona`) where ((`emisor`.`iddocumento` = `documento`.`iddocumento`) and (`emisor`.`idpersona` = `persona`.`idpersona`)) */;
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
/*!50001 SET collation_connection      = utf8mb4_general_ci */;
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
/*!50001 SET collation_connection      = utf8mb4_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `evento1` AS select `evento`.`idevento` AS `idevento`,`evento`.`titulo` AS `titulo`,`evento`.`detalle` AS `detalle`,`evento`.`fechacreacion` AS `fechacreacion`,`evento`.`fechainicia` AS `fechainicia`,`evento`.`fechafinaliza` AS `fechafinaliza`,`evento_estado`.`nombre` AS `estado` from (`evento` join `evento_estado`) where (`evento`.`idevento_estado` = `evento_estado`.`idevento_estado`) */;
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
/*!50001 SET collation_connection      = utf8mb4_general_ci */;
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
/*!50001 SET collation_connection      = utf8mb4_general_ci */;
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
/*!50001 SET collation_connection      = utf8mb4_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `persona2` AS select `persona`.`idpersona` AS `idpersona`,concat(`persona`.`apellidos`,' ',`persona`.`nombres`) AS `lapersona`,`correo`.`nombre` AS `correo`,`telefono`.`numero` AS `telefono` from ((((`persona` join `correo`) join `telefono`) join `correo_estado`) join `telefono_estado`) where ((`persona`.`idpersona` = `correo`.`idpersona`) and (`persona`.`idpersona` = `telefono`.`idpersona`) and (`correo`.`idcorreo_estado` = 1) and (`telefono`.`idtelefono_estado` = 1)) */;
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
/*!50001 SET collation_connection      = utf8mb4_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `usuario1` AS select `usuario`.`idusuario` AS `idusuario`,`usuario`.`password` AS `password`,`usuario`.`idpersona` AS `idpersona`,`persona`.`nombres` AS `nombres`,`usuario`.`idperfil` AS `idperfil`,`perfil`.`descripcion` AS `descripcion`,`usuario`.`email` AS `email` from ((`usuario` join `perfil`) join `persona`) where ((`usuario`.`idpersona` = `persona`.`idpersona`) and (`usuario`.`idperfil` = `perfil`.`idperfil`)) */;
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
/*!50001 SET collation_connection      = utf8mb4_general_ci */;
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

-- Dump completed on 2021-12-09 14:40:31
