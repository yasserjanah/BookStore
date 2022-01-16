-- MariaDB dump 10.19  Distrib 10.6.5-MariaDB, for Linux (x86_64)
--
-- Host: localhost    Database: BookStore
-- ------------------------------------------------------
-- Server version	10.6.5-MariaDB

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
-- Table structure for table `auteur`
--

CREATE DATABASE IF NOT EXISTS bookstore;

USE bookstore;

DROP TABLE IF EXISTS `auteur`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `auteur` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom_prenom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sexe` varchar(1) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_de_naissance` date NOT NULL,
  `nationalite` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_55AB14026EA0B0C` (`nom_prenom`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `auteur`
--

LOCK TABLES `auteur` WRITE;
/*!40000 ALTER TABLE `auteur` DISABLE KEYS */;
INSERT INTO `auteur` VALUES (1,'Dr. Arielle Mueller','F','1968-10-23','DM'),(2,'Mrs. Marisa Zulauf','F','1987-06-11','CX'),(3,'Susie Rowe','M','1972-04-01','GI'),(4,'Spencer Kohler III','F','1901-04-25','CU'),(5,'Mr. Kade Bauch V','M','1977-02-11','BQ'),(6,'Lorenza Hettinger','F','1948-06-09','KH'),(7,'Roscoe Schmitt PhD','F','2017-11-16','GB'),(8,'Miss Mina Kulas III','M','1928-11-16','ZW'),(9,'Lizeth Baumbach','F','1960-10-31','RE'),(10,'Prof. Walton Goldner','F','2013-07-29','YT'),(11,'Dr. Reilly Kuhn','F','1970-11-01','FO'),(12,'Christine Maggio','F','1966-10-08','VI'),(13,'Vesta Graham','F','1977-12-11','PN'),(14,'Creola O\'Conner','M','1999-07-31','LA'),(15,'Prof. Danielle D\'Amore MD','M','1963-06-13','NO'),(16,'Mrs. Victoria Block','M','1917-12-30','VC'),(17,'Pasquale Homenick','M','1910-07-01','PR'),(18,'Buford McDermott IV','F','1970-09-06','LC'),(19,'Thurman Prohaska','M','2001-01-24','LB'),(20,'Odessa Schneider','M','1947-03-09','WS');
/*!40000 ALTER TABLE `auteur` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `doctrine_migration_versions`
--

DROP TABLE IF EXISTS `doctrine_migration_versions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `doctrine_migration_versions` (
  `version` varchar(191) COLLATE utf8mb3_unicode_ci NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `doctrine_migration_versions`
--

LOCK TABLES `doctrine_migration_versions` WRITE;
/*!40000 ALTER TABLE `doctrine_migration_versions` DISABLE KEYS */;
INSERT INTO `doctrine_migration_versions` VALUES ('DoctrineMigrations\\Version20220115145330','2022-01-15 14:53:36',512);
/*!40000 ALTER TABLE `doctrine_migration_versions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `genre`
--

DROP TABLE IF EXISTS `genre`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `genre` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_835033F86C6E55B5` (`nom`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `genre`
--

LOCK TABLES `genre` WRITE;
/*!40000 ALTER TABLE `genre` DISABLE KEYS */;
INSERT INTO `genre` VALUES (22,'Adventure'),(29,'Bande Déssinée'),(30,'Crime'),(26,'Documentary'),(27,'Encyclopedia'),(21,'Horror'),(28,'Manga'),(24,'Romance'),(25,'Science Fiction'),(23,'Sport');
/*!40000 ALTER TABLE `genre` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `livre`
--

DROP TABLE IF EXISTS `livre`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `livre` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `isbn` varchar(13) COLLATE utf8mb4_unicode_ci NOT NULL,
  `titre` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `nombre_pages` int(11) NOT NULL,
  `date_de_parution` date NOT NULL,
  `note` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_AC634F99CC1CF4E6` (`isbn`)
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `livre`
--

LOCK TABLES `livre` WRITE;
/*!40000 ALTER TABLE `livre` DISABLE KEYS */;
INSERT INTO `livre` VALUES (1,'9798217446100','NOT marked \'poison,\' so.',515,'2019-11-23',16),(2,'9786366702666','RED rose-tree, and we.',121,'2005-03-14',6),(3,'9796998822229','I THINK,\' said Alice..',747,'1994-09-24',14),(4,'9792470425018','I don\'t take this child.',670,'1920-03-18',14),(5,'9797539938034','I think--\' (she was so.',661,'1932-04-11',16),(6,'9787771250131','Alice indignantly. \'Ah!.',835,'1922-10-10',15),(7,'9787287371801','Mock Turtle repeated.',992,'1990-05-25',7),(8,'9780110216263','It was opened by.',976,'1936-09-12',18),(9,'9789937453738','THAT. Then.',355,'1970-08-05',20),(10,'9784893528865','Footman. \'That\'s the.',60,'1970-12-26',10),(11,'9782830924350','However, she soon found.',241,'1902-09-19',19),(12,'9794197490027','The question is, what.',874,'1976-11-13',13),(13,'9799818111114','And she kept on.',816,'1935-11-21',19),(14,'9798870617336','VERY wide, but she.',485,'2005-05-01',8),(15,'9796627226718','I shall see it quite.',86,'1902-05-06',2),(16,'9789738080607','Alice looked up, and.',75,'1976-04-29',18),(17,'9793807381755','And she kept fanning.',414,'2015-06-24',1),(18,'9781336614451','King in a tone of great.',910,'1934-05-10',20),(19,'9794289344924','Footman. \'That\'s the.',423,'1928-03-02',15),(20,'9796745262544','Latitude was, or.',193,'2007-06-09',12),(21,'9798729959730','Shakespeare, in the.',818,'1926-08-25',1),(22,'9799654446890','Dormouse,\' thought.',198,'2001-07-18',13),(23,'9787947888762','Alice asked. The Hatter.',423,'1907-02-10',9),(24,'9788023678178','Oh dear! I shall be a.',518,'1902-08-11',16),(25,'9795569397579','Duchess\'s knee, while.',128,'1901-07-14',9),(26,'9797416460542','I say--that\'s the same.',708,'1992-01-11',11),(27,'9796528720728','I fell off the subjects.',629,'1982-04-15',11),(28,'9786344421626','Mouse, turning to the.',583,'2007-05-20',8),(29,'9789962031956','Alice looked at the.',545,'1900-03-04',18),(30,'9785182203487','I may as well wait, as.',310,'1977-12-10',20),(31,'9797038929717','Here the Queen had.',19,'2018-08-08',17),(32,'9792555930024','IS it to make it stop..',247,'1918-01-10',9),(33,'9784996065380','I learn music.\' \'Ah!.',41,'1978-01-17',7),(34,'9785681698579','Alice; \'that\'s not at.',648,'1978-09-03',4),(35,'9798083606288','I BEG your pardon!\'.',471,'1910-11-17',15),(36,'9793247996557','Mock Turtle repeated.',309,'1970-08-07',8),(37,'9793120850747','I\'m I, and--oh dear,.',445,'1928-11-10',6),(38,'9791494336843','IT,\' the Mouse with an.',867,'2013-03-15',18),(39,'9789007933368','Mouse, turning to.',713,'1967-11-05',16),(40,'9793730912057','Oh, how I wish you.',917,'1948-06-05',10),(41,'9782027544552','King had said that day..',931,'1992-09-20',6),(42,'9798282376616','Majesty,\' the Hatter.',187,'1932-03-06',12),(43,'9795583964818','Lizard\'s slate-pencil,.',705,'2018-09-10',2),(44,'9783884257135','White Rabbit, trotting.',358,'1971-08-11',6),(45,'9796336681952','Queen. First came ten.',277,'1925-08-12',15),(46,'9784402532277','I\'m perfectly sure I.',919,'1995-05-17',19),(47,'9794485900061','I wonder?\' As she said.',775,'1979-09-24',2),(48,'9791890610622','Hatter went on eagerly..',816,'1990-06-12',10),(49,'9797489150012','White Rabbit was still.',79,'1950-12-20',2),(50,'9797211068745','I\'m going to do that,\'.',441,'1992-07-16',8);
/*!40000 ALTER TABLE `livre` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `livre_auteur`
--

DROP TABLE IF EXISTS `livre_auteur`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `livre_auteur` (
  `livre_id` int(11) NOT NULL,
  `auteur_id` int(11) NOT NULL,
  PRIMARY KEY (`livre_id`,`auteur_id`),
  KEY `IDX_A11876B537D925CB` (`livre_id`),
  KEY `IDX_A11876B560BB6FE6` (`auteur_id`),
  CONSTRAINT `FK_A11876B537D925CB` FOREIGN KEY (`livre_id`) REFERENCES `livre` (`id`) ON DELETE CASCADE,
  CONSTRAINT `FK_A11876B560BB6FE6` FOREIGN KEY (`auteur_id`) REFERENCES `auteur` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `livre_auteur`
--

LOCK TABLES `livre_auteur` WRITE;
/*!40000 ALTER TABLE `livre_auteur` DISABLE KEYS */;
INSERT INTO `livre_auteur` VALUES (1,8),(1,18),(2,3),(2,13),(3,2),(3,16),(4,14),(5,7),(6,7),(7,14),(8,9),(8,19),(9,4),(9,19),(10,7),(11,2),(11,17),(12,20),(13,13),(13,19),(14,5),(14,18),(15,2),(16,12),(17,14),(18,15),(19,11),(19,12),(20,2),(20,17),(21,13),(22,14),(22,17),(23,3),(24,11),(25,14),(26,7),(27,12),(28,4),(29,4),(29,16),(30,18),(30,19),(31,20),(32,8),(32,9),(33,10),(34,19),(35,6),(35,11),(36,10),(36,18),(37,13),(38,10),(38,18),(39,7),(40,12),(40,14),(41,8),(41,16),(42,17),(42,18),(43,10),(44,4),(44,20),(45,5),(45,10),(46,14),(46,20),(47,7),(48,1),(49,9),(49,11),(50,1);
/*!40000 ALTER TABLE `livre_auteur` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `livre_genre`
--

DROP TABLE IF EXISTS `livre_genre`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `livre_genre` (
  `livre_id` int(11) NOT NULL,
  `genre_id` int(11) NOT NULL,
  PRIMARY KEY (`livre_id`,`genre_id`),
  KEY `IDX_1053AB9E37D925CB` (`livre_id`),
  KEY `IDX_1053AB9E4296D31F` (`genre_id`),
  CONSTRAINT `FK_1053AB9E37D925CB` FOREIGN KEY (`livre_id`) REFERENCES `livre` (`id`) ON DELETE CASCADE,
  CONSTRAINT `FK_1053AB9E4296D31F` FOREIGN KEY (`genre_id`) REFERENCES `genre` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `livre_genre`
--

LOCK TABLES `livre_genre` WRITE;
/*!40000 ALTER TABLE `livre_genre` DISABLE KEYS */;
INSERT INTO `livre_genre` VALUES (1,24),(1,27),(2,23),(2,25),(3,22),(3,26),(4,29),(5,26),(5,29),(6,30),(7,22),(7,24),(8,27),(9,26),(9,29),(10,24),(10,28),(11,26),(12,28),(13,25),(14,24),(14,30),(15,26),(16,29),(17,23),(18,25),(18,27),(19,25),(20,26),(21,26),(21,28),(22,24),(22,30),(23,24),(24,21),(24,29),(25,24),(26,27),(26,30),(27,22),(27,25),(28,23),(28,24),(29,26),(29,30),(30,27),(31,22),(31,23),(32,22),(33,21),(33,29),(34,22),(34,27),(35,23),(36,22),(37,26),(38,25),(38,26),(39,23),(40,27),(40,29),(41,29),(42,27),(43,27),(44,22),(44,30),(45,30),(46,22),(47,23),(47,29),(48,21),(48,30),(49,25),(50,25);
/*!40000 ALTER TABLE `livre_genre` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(180) COLLATE utf8mb4_unicode_ci NOT NULL,
  `roles` longtext COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '(DC2Type:json)',
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_8D93D649E7927C74` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;

/* Those creds is for testing only */
INSERT INTO `user` VALUES (2,'admin@janah.com','[\"ROLE_ADMIN\"]','$2y$13$GhdjAze7bs2vHbYiCck8nugffTTxlhmAV/k9rb5wL2ZQeY/Am/eXu'),(3,'contact@yasser-janah.com','[\"ROLE_USER\"]','$2y$13$Os.K4uzPhq7jKNdCSE1Hje0/LJAd1QdogV30HV92cu/nhR2AnG/bu');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-01-16 10:55:29
