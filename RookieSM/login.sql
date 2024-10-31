-- MariaDB dump 10.19  Distrib 10.4.32-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: login
-- ------------------------------------------------------
-- Server version	10.4.32-MariaDB

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
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `admin` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Username` varchar(50) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Role` enum('A','S') NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `join_date` date DEFAULT NULL,
  PRIMARY KEY (`ID`,`Username`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin`
--

LOCK TABLES `admin` WRITE;
/*!40000 ALTER TABLE `admin` DISABLE KEYS */;
INSERT INTO `admin` VALUES (2,'admin','$2y$10$2y/8t3aFaw2QoFFrz5QLx.hiFPMvDZsAvkFub14QGJgZogij0zl2W','A','John Doe','johndoe@gmail.com','08951234567','2024-10-20'),(4,'admin_baru','dea75af85f93d7819eab44a0065ce6cd5a5f0c4109bac0b9ff95d8da3cbac1b0','A',NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `admin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mata_pelajaran`
--

DROP TABLE IF EXISTS `mata_pelajaran`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mata_pelajaran` (
  `id` int(11) NOT NULL,
  `nama_pelajaran` varchar(255) NOT NULL,
  `link_pelajaran` varchar(255) NOT NULL,
  `gambar` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mata_pelajaran`
--

LOCK TABLES `mata_pelajaran` WRITE;
/*!40000 ALTER TABLE `mata_pelajaran` DISABLE KEYS */;
INSERT INTO `mata_pelajaran` VALUES (1,'HTML & CSS','learningHtml.php','img-logo/htmlcss-removebg-preview.png'),(2,'JavaScript','','img-logo/js.png');
/*!40000 ALTER TABLE `mata_pelajaran` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `siswa`
--

DROP TABLE IF EXISTS `siswa`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `siswa` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Nama` varchar(100) NOT NULL,
  `Username` varchar(50) NOT NULL,
  `NIS` varchar(20) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Role` enum('A','S') NOT NULL,
  `status` enum('aktif','tidak aktif') DEFAULT 'aktif',
  `kelas` varchar(50) NOT NULL,
  `jurusan` varchar(50) NOT NULL,
  `last_login` datetime DEFAULT NULL,
  PRIMARY KEY (`ID`,`Username`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `siswa`
--

LOCK TABLES `siswa` WRITE;
/*!40000 ALTER TABLE `siswa` DISABLE KEYS */;
INSERT INTO `siswa` VALUES (5,'Travis Scott','trav567','','$2y$10$Hl0DMTybvpgSFEyTLNbcIe4/60dDtkIoMTLymx5rs91q7i1XnbmiO','S','aktif','10','PPLG','2024-10-31 13:22:48'),(13,'mas ardi','siswa1','NIS12345','a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3','S','aktif','10','RPL',NULL),(14,'Rizwan Hawwari','raxxs','56789123','$2y$10$hOUPRO/.8fYesJB1JCt8gOKIlDUqSSM4Bvt/Xa6sop5PqJ8ETcvrq','S','aktif','11','PPLG',NULL),(15,'Gunawan Hakim','gnwn67','567891233','$2y$10$n3yUsAuaPzSJ5oTXRH.wp.vFQoX7UB4Oql2POmGbdiZjAOFnuHlu6','S','aktif','10','PPLG',NULL),(16,'Arif Erlangga','rifff','45612789','$2y$10$J5QXZAfk3J4WKEur3oWYHeuZPl5E41Pev.UUnXfLoEtARUaKqURn.','S','aktif','11','TJKT',NULL),(17,'Kiara Elvia','kiaraaa','567812990','$2y$10$.fVdvmXh8Vd/T914nTsZkelsOpks0eIwEaW.Mz8PnXm1BxXA0ZUjC','S','aktif','12','OTKP',NULL),(18,'Fatimah Hasan','flowertim','7894456','$2y$10$pK8pEE84ppPu4DDKrmPLO.dy7YU1wm38F33emyFIU87ZFrUFmMx/O','S','aktif','10','PM',NULL);
/*!40000 ALTER TABLE `siswa` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-10-31 20:31:33
