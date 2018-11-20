CREATE DATABASE  IF NOT EXISTS `escolar` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `escolar`;
-- MySQL dump 10.13  Distrib 5.7.17, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: escolar
-- ------------------------------------------------------
-- Server version	5.5.5-10.1.36-MariaDB

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
-- Table structure for table `aluno`
--

DROP TABLE IF EXISTS `aluno`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `aluno` (
  `id_aluno` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(200) COLLATE utf8_bin NOT NULL,
  `data_nascimento` date NOT NULL,
  `sexo` char(1) COLLATE utf8_bin NOT NULL,
  `telefone` varchar(15) COLLATE utf8_bin DEFAULT NULL,
  `cpf` varchar(15) COLLATE utf8_bin DEFAULT NULL,
  `turno` char(1) COLLATE utf8_bin NOT NULL,
  `cep` int(11) NOT NULL,
  `logradouro` varchar(200) COLLATE utf8_bin NOT NULL,
  `numero` int(11) NOT NULL,
  `bairro` varchar(100) COLLATE utf8_bin NOT NULL,
  `localidade` varchar(50) COLLATE utf8_bin NOT NULL,
  `uf` varchar(15) COLLATE utf8_bin NOT NULL,
  `id_responsavel` int(11) DEFAULT NULL,
  `id_escola` int(11) NOT NULL,
  PRIMARY KEY (`id_aluno`),
  KEY `fk_aluno_responsavel1_idx` (`id_responsavel`),
  KEY `fk_aluno_escola1_idx` (`id_escola`),
  CONSTRAINT `fk_aluno_escola1` FOREIGN KEY (`id_escola`) REFERENCES `escola` (`id_escola`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_aluno_responsavel1` FOREIGN KEY (`id_responsavel`) REFERENCES `responsavel` (`id_responsavel`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `aluno`
--

LOCK TABLES `aluno` WRITE;
/*!40000 ALTER TABLE `aluno` DISABLE KEYS */;
/*!40000 ALTER TABLE `aluno` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-11-20 11:26:36
