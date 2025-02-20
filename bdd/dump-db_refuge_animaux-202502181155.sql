-- MySQL dump 10.13  Distrib 8.0.19, for Win64 (x86_64)
--
-- Host: localhost    Database: db_refuge_animaux
-- ------------------------------------------------------
-- Server version	9.2.0

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
-- Table structure for table `animal`
--

DROP TABLE IF EXISTS `animal`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `animal` (
  `id_animal` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(100) DEFAULT NULL,
  `genre` enum('M','F') DEFAULT NULL,
  `numero` varchar(50) DEFAULT NULL,
  `pays` varchar(100) DEFAULT NULL,
  `date_naissance` date DEFAULT NULL,
  `date_arrivee` date DEFAULT NULL,
  `date_deces` date DEFAULT NULL,
  `description` text,
  `image` varchar(250) DEFAULT NULL,
  `id_cage` int DEFAULT NULL,
  PRIMARY KEY (`id_animal`),
  KEY `id_cage` (`id_cage`),
  CONSTRAINT `animal_ibfk_1` FOREIGN KEY (`id_cage`) REFERENCES `cage` (`id_cage`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `animal`
--

LOCK TABLES `animal` WRITE;
/*!40000 ALTER TABLE `animal` DISABLE KEYS */;
INSERT INTO `animal` VALUES (5,'Thor','M','CHI001','Islande','2020-05-10','2021-06-15',NULL,'Thor adore jouer à \"attraper le bâton\", mais il ramène toujours des pierres à la place. On l’appelle le \"Dieu du Mauvais Lancer\".','thor.jpg',1),(6,'Freya','F','CHI002','Norvège','2019-03-22','2020-04-12',NULL,'Freya a sauvé un chaton coincé dans un arbre. Depuis, elle se prend pour une super-héroïne.','freya.jpg',2),(7,'Odin','M','CHI003','Suède','2018-07-14','2019-08-20',NULL,'Odin a un œil qui brille comme une étoile. Il adore raconter des histoires de Vikings à ses amis.','odin.jpg',3),(8,'Loki','M','CHI004','Danemark','2021-01-05','2022-02-10',NULL,'Loki est un farceur. Il cache les chaussures des soigneurs et rit quand ils les cherchent.','loki.jpg',4),(9,'Sif','F','CHI005','Finlande','2017-11-30','2018-12-25',NULL,'Sif a une fourrure si brillante qu’on dirait de l’or. Elle adore se faire brosser.','sif.jpg',5),(10,'Eclipse','M','CHE001','France','2015-04-18','2016-05-22',NULL,'Eclipse est noir comme la nuit. Il adore galoper sous la pleine lune.','eclipse.jpg',6),(11,'Luna','F','CHE002','Belgique','2016-08-12','2017-09-15',NULL,'Luna a une crinière argentée. Elle rêve de devenir une licorne.','luna_cheval.jpg',7),(12,'Storm','M','CHE003','Canada','2014-02-28','2015-03-30',NULL,'Storm est un cheval puissant. Il adore les défis et les courses sous la pluie.','storm.jpg',8),(13,'Melman','M','GIR001','Kenya','2012-06-10','2013-07-12',NULL,'Melman est un peu hypocondriaque. Il porte toujours une écharpe, même en été.','melman.jpg',9),(14,'Dumbo','M','ELE001','Thaïlande','2010-09-05','2011-10-10',NULL,'Dumbo adore voler avec ses grandes oreilles. Enfin, il essaie…','dumbo.jpg',10),(15,'Ellie','F','ELE002','Inde','2009-12-15','2010-01-20','2023-01-01','Ellie était la reine du refuge. Elle adorait danser sous la pluie.','ellie.jpg',11),(16,'Slytherin','M','SERP001','Australie','2018-03-25','2019-04-30',NULL,'Slytherin est un serpent très malin. Il adore jouer à cache-cache.','slytherin.jpg',12),(17,'Vipera','F','SERP002','Brésil','2019-07-18','2020-08-22',NULL,'Vipera est rapide comme l’éclair. Elle adore surprendre ses soigneurs.','vipera.jpg',13),(18,'Cobra','M','SERP003','Inde','2020-11-12','2021-12-15',NULL,'Cobra a un regard hypnotique. Il adore faire des blagues en se dressant brusquement.','cobra.jpg',14),(19,'Python','F','SERP004','Afrique','2021-02-28','2022-03-30',NULL,'Python est une grande dormeuse. Elle s’enroule autour des arbres pour faire la sieste.','python.jpg',15),(20,'Croc','M','CROC001','Australie','2015-05-10','2016-06-15',NULL,'Croc est un vrai dur à cuire, mais il adore les câlins… quand personne ne regarde.','croc.jpg',16),(21,'Snap','F','CROC002','USA','2016-08-12','2017-09-15',NULL,'Snap est une coquine. Elle adore faire claquer ses mâchoires pour impressionner.','snap.jpg',17),(22,'Jaws','M','CROC003','Afrique','2017-11-30','2018-12-25',NULL,'Jaws est le roi des eaux. Il adore nager et faire des vagues.','jaws.jpg',18),(23,'Bite','F','CROC004','Inde','2018-03-25','2019-04-30',NULL,'Bite est une vraie mordante, mais elle a un cœur d’or.','bite.jpg',19),(24,'Rexy','M','CROC005','Brésil','2019-07-18','2020-08-22',NULL,'Rexy est un explorateur. Il adore découvrir de nouveaux coins du refuge.','rexy.jpg',20),(25,'Alpha','M','LOUP001','Canada','2016-08-12','2017-09-15',NULL,'Alpha est le chef de la meute. Il veille sur tous les animaux.','alpha.jpg',21),(26,'Luna','F','LOUP002','Russie','2017-11-30','2018-12-25',NULL,'Luna est une louve protectrice. Elle adore jouer avec les petits.','luna_loup.jpg',22),(27,'Shadow','M','LOUP003','Alaska','2018-03-25','2019-04-30',NULL,'Shadow est discret et mystérieux. On le voit rarement, mais il est toujours là.','shadow.jpg',23),(28,'Fang','M','LOUP004','Canada','2019-07-18','2020-08-22',NULL,'Fang est un loup solitaire, mais il adore les câlins en secret.','fang.jpg',24),(29,'Snow','F','LOUP005','Russie','2020-11-12','2021-12-15',NULL,'Snow est une louve blanche majestueuse. Elle adore la neige.','snow.jpg',25),(30,'Misty','F','CHAT001','France','2019-05-10','2020-06-15',NULL,'Misty est une chatte calme et affectueuse. Elle adore se prélasser au soleil.','misty.jpg',26),(31,'Shadow','M','CHAT002','Espagne','2020-03-22','2021-04-12',NULL,'Shadow est un chat discret. Il adore se cacher dans les cartons.','shadow_chat.jpg',27),(32,'Whiskers','M','CHAT003','Italie','2018-07-14','2019-08-20','2023-02-01','Whiskers était un chat espiègle. Il adorait jouer avec les lacets des soigneurs.','whiskers.jpg',28),(33,'Baudet','M','ANE001','France','2015-06-01','2016-07-10',NULL,'Baudet est un âne têtu mais très affectueux. Il adore les carottes.','baudet.jpg',29),(34,'Molly','F','MUL001','France','2021-02-28','2022-03-30',NULL,'Molly est un mulet robuste. Elle adore aider les soigneurs et porte toujours un sourire.','molly.jpg',30);
/*!40000 ALTER TABLE `animal` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `animal_espece`
--

DROP TABLE IF EXISTS `animal_espece`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `animal_espece` (
  `id_animal` int NOT NULL,
  `id_espece` int NOT NULL,
  PRIMARY KEY (`id_animal`,`id_espece`),
  KEY `id_espece` (`id_espece`),
  CONSTRAINT `animal_espece_ibfk_1` FOREIGN KEY (`id_animal`) REFERENCES `animal` (`id_animal`),
  CONSTRAINT `animal_espece_ibfk_2` FOREIGN KEY (`id_espece`) REFERENCES `espece` (`id_espece`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `animal_espece`
--

LOCK TABLES `animal_espece` WRITE;
/*!40000 ALTER TABLE `animal_espece` DISABLE KEYS */;
INSERT INTO `animal_espece` VALUES (5,1),(6,1),(7,1),(8,1),(9,1),(10,2),(11,2),(12,2),(34,2),(13,3),(14,4),(15,4),(16,5),(17,5),(18,5),(19,5),(20,6),(21,6),(22,6),(23,6),(24,6),(25,7),(26,7),(27,7),(28,7),(29,7),(30,8),(31,8),(32,8),(33,9),(34,9);
/*!40000 ALTER TABLE `animal_espece` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cage`
--

DROP TABLE IF EXISTS `cage`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cage` (
  `id_cage` int NOT NULL AUTO_INCREMENT,
  `numero` int DEFAULT NULL,
  `allee` int DEFAULT NULL,
  `salle` int DEFAULT NULL,
  PRIMARY KEY (`id_cage`)
) ENGINE=InnoDB AUTO_INCREMENT=63 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cage`
--

LOCK TABLES `cage` WRITE;
/*!40000 ALTER TABLE `cage` DISABLE KEYS */;
INSERT INTO `cage` VALUES (1,101,1,1),(2,102,1,1),(3,103,1,1),(4,104,1,1),(5,105,1,1),(6,201,2,1),(7,202,2,1),(8,203,2,1),(9,301,3,1),(10,401,4,1),(11,402,4,1),(12,501,5,1),(13,502,5,1),(14,503,5,1),(15,504,5,1),(16,601,6,1),(17,602,6,1),(18,603,6,1),(19,604,6,1),(20,605,6,1),(21,701,7,1),(22,702,7,1),(23,703,7,1),(24,704,7,1),(25,705,7,1),(26,801,8,1),(27,802,8,1),(28,803,8,1),(29,901,9,1),(30,1001,10,1),(31,1101,11,1),(32,101,1,1),(33,102,1,1),(34,103,1,1),(35,104,1,1),(36,105,1,1),(37,201,2,1),(38,202,2,1),(39,203,2,1),(40,301,3,1),(41,401,4,1),(42,402,4,1),(43,501,5,1),(44,502,5,1),(45,503,5,1),(46,504,5,1),(47,601,6,1),(48,602,6,1),(49,603,6,1),(50,604,6,1),(51,605,6,1),(52,701,7,1),(53,702,7,1),(54,703,7,1),(55,704,7,1),(56,705,7,1),(57,801,8,1),(58,802,8,1),(59,803,8,1),(60,901,9,1),(61,1001,10,1),(62,1101,11,1);
/*!40000 ALTER TABLE `cage` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `enfanter`
--

DROP TABLE IF EXISTS `enfanter`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `enfanter` (
  `id_animal` int NOT NULL,
  `id_animal_1` int NOT NULL,
  PRIMARY KEY (`id_animal`,`id_animal_1`),
  KEY `id_animal_1` (`id_animal_1`),
  CONSTRAINT `enfanter_ibfk_1` FOREIGN KEY (`id_animal`) REFERENCES `animal` (`id_animal`),
  CONSTRAINT `enfanter_ibfk_2` FOREIGN KEY (`id_animal_1`) REFERENCES `animal` (`id_animal`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `enfanter`
--

LOCK TABLES `enfanter` WRITE;
/*!40000 ALTER TABLE `enfanter` DISABLE KEYS */;
INSERT INTO `enfanter` VALUES (30,7),(23,21),(24,21),(30,29);
/*!40000 ALTER TABLE `enfanter` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `espece`
--

DROP TABLE IF EXISTS `espece`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `espece` (
  `id_espece` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_espece`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `espece`
--

LOCK TABLES `espece` WRITE;
/*!40000 ALTER TABLE `espece` DISABLE KEYS */;
INSERT INTO `espece` VALUES (1,'Chien'),(2,'Cheval'),(3,'Girafe'),(4,'Éléphant'),(5,'Serpent'),(6,'Crocodile'),(7,'Loup'),(8,'Chat'),(9,'Âne');
/*!40000 ALTER TABLE `espece` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `personnel`
--

DROP TABLE IF EXISTS `personnel`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `personnel` (
  `id_personnel` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(100) DEFAULT NULL,
  `prenom` varchar(100) DEFAULT NULL,
  `poste` enum('soigneur','administratif','cadre') DEFAULT NULL,
  `login` varchar(50) DEFAULT NULL,
  `mot_de_passe` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_personnel`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `personnel`
--

LOCK TABLES `personnel` WRITE;
/*!40000 ALTER TABLE `personnel` DISABLE KEYS */;
INSERT INTO `personnel` VALUES (1,'Dupont','Jean','soigneur','jean.dupont','motdepasse1'),(2,'Martin','Marie','soigneur','marie.martin','motdepasse2'),(3,'Bernard','Luc','soigneur','luc.bernard','motdepasse3'),(4,'Petit','Sophie','soigneur','sophie.petit','motdepasse4'),(5,'Leroy','Pierre','soigneur','pierre.leroy','motdepasse5'),(6,'Moreau','Claire','administratif','claire.moreau','motdepasse6'),(7,'Lefebvre','Thomas','cadre','thomas.lefebvre','motdepasse7'),(8,'Roux','Laura','administratif','laura.roux','motdepasse8');
/*!40000 ALTER TABLE `personnel` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `s_occuper`
--

DROP TABLE IF EXISTS `s_occuper`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `s_occuper` (
  `id_animal` int NOT NULL,
  `id_personnel` int NOT NULL,
  PRIMARY KEY (`id_animal`,`id_personnel`),
  KEY `id_personnel` (`id_personnel`),
  CONSTRAINT `s_occuper_ibfk_1` FOREIGN KEY (`id_animal`) REFERENCES `animal` (`id_animal`),
  CONSTRAINT `s_occuper_ibfk_2` FOREIGN KEY (`id_personnel`) REFERENCES `personnel` (`id_personnel`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `s_occuper`
--

LOCK TABLES `s_occuper` WRITE;
/*!40000 ALTER TABLE `s_occuper` DISABLE KEYS */;
INSERT INTO `s_occuper` VALUES (5,1),(10,1),(15,1),(20,1),(25,1),(30,1),(5,2),(6,2),(11,2),(16,2),(21,2),(26,2),(31,2),(7,3),(12,3),(17,3),(22,3),(27,3),(32,3),(8,4),(13,4),(18,4),(23,4),(28,4),(33,4),(9,5),(14,5),(19,5),(24,5),(29,5),(34,5);
/*!40000 ALTER TABLE `s_occuper` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'db_refuge_animaux'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2025-02-18 11:55:43
