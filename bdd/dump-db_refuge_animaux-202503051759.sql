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
  `id_responsable` int DEFAULT NULL,
  `isArchived` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id_animal`),
  KEY `id_cage` (`id_cage`),
  KEY `fk_animal_personnel` (`id_responsable`),
  CONSTRAINT `animal_ibfk_1` FOREIGN KEY (`id_cage`) REFERENCES `cage` (`id_cage`),
  CONSTRAINT `fk_animal_personnel` FOREIGN KEY (`id_responsable`) REFERENCES `personnel` (`id_personnel`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `animal`
--

LOCK TABLES `animal` WRITE;
/*!40000 ALTER TABLE `animal` DISABLE KEYS */;
INSERT INTO `animal` VALUES (5,'Thor','M','CHI001','Islande','2020-05-10','2021-06-15',NULL,'Thor adore jouer à \"attraper le bâton\", mais il ramène toujours des pierres à la place. On l’appelle le \"Dieu du Mauvais Lancer\".','https://cdn.pixabay.com/photo/2020/10/08/18/56/dog-5638780_960_720.jpg',1,2,0),(6,'Freya','F','CHI002','Norvège','2019-03-22','2020-04-12',NULL,'Freya a sauvé un chaton coincé dans un arbre. Depuis, elle se prend pour une super-héroïne.','https://cdn.pixabay.com/photo/2020/10/08/18/56/dog-5638780_960_720.jpg',2,2,0),(7,'Odin','M','CHI003','Suède','2018-07-14','2019-08-20',NULL,'Odin a un œil qui brille comme une étoile. Il adore raconter des histoires de Vikings à ses amis.','https://cdn.pixabay.com/photo/2020/10/08/18/56/dog-5638780_960_720.jpg',3,2,0),(8,'Loki','M','CHI004','Danemark','2021-01-05','2022-02-10',NULL,'Loki est un farceur. Il cache les chaussures des soigneurs et rit quand ils les cherchent.','https://cdn.pixabay.com/photo/2020/10/08/18/56/dog-5638780_960_720.jpg',4,2,0),(9,'Sif','F','CHI005','Finlande','2017-11-30','2018-12-25',NULL,'Sif a une fourrure si brillante qu’on dirait de l’or. Elle adore se faire brosser.','https://cdn.pixabay.com/photo/2020/10/08/18/56/dog-5638780_960_720.jpg',5,3,0),(10,'Eclipse','M','CHE001','France','2015-04-18','2016-05-22',NULL,'Eclipse est noir comme la nuit. Il adore galoper sous la pleine lune.','https://cdn.pixabay.com/photo/2016/02/15/13/26/horse-1201143_960_720.jpg',6,5,0),(11,'Luna','F','CHE002','Belgique','2016-08-12','2017-09-15',NULL,'Luna a une crinière argentée. Elle rêve de devenir une licorne.','https://cdn.pixabay.com/photo/2016/02/15/13/26/horse-1201143_960_720.jpg',7,3,0),(12,'Storm','M','CHE003','Canada','2014-02-28','2015-03-30',NULL,'Storm est un cheval puissant. Il adore les défis et les courses sous la pluie.','https://cdn.pixabay.com/photo/2016/02/15/13/26/horse-1201143_960_720.jpg',8,3,0),(13,'Melman','M','GIR001','Kenya','2012-06-10','2013-07-12',NULL,'Melman est un peu hypocondriaque. Il porte toujours une écharpe, même en été.','https://cdn.pixabay.com/photo/2020/11/22/20/39/giraffe-5767909_960_720.jpg',9,4,0),(14,'Dumbo','M','ELE001','Thaïlande','2010-09-05','2011-10-10',NULL,'Dumbo adore voler avec ses grandes oreilles. Enfin, il essaie…','https://cdn.pixabay.com/photo/2017/11/06/15/30/elephant-2923916_960_720.jpg',10,5,0),(15,'Ellie','F','ELE002','Inde','2009-12-15','2010-01-20','2023-01-01','Ellie était la reine du refuge. Elle adorait danser sous la pluie.','https://cdn.pixabay.com/photo/2017/11/06/15/30/elephant-2923916_960_720.jpg',11,5,0),(16,'Slytherin','M','SERP001','Australie','2018-03-25','2019-04-30',NULL,'Slytherin est un serpent très malin. Il adore jouer à cache-cache.','https://cdn.pixabay.com/photo/2016/01/13/09/42/snake-1137456_960_720.jpg',12,2,0),(17,'Vipera','F','SERP002','Brésil','2019-07-18','2020-08-22',NULL,'Vipera est rapide comme l’éclair. Elle adore surprendre ses soigneurs.','https://cdn.pixabay.com/photo/2016/01/13/09/42/snake-1137456_960_720.jpg',13,2,0),(18,'Cobra','M','SERP003','Inde','2020-11-12','2021-12-15',NULL,'Cobra a un regard hypnotique. Il adore faire des blagues en se dressant brusquement.','https://cdn.pixabay.com/photo/2016/01/13/09/42/snake-1137456_960_720.jpg',14,4,0),(19,'Python','F','SERP004','Afrique','2021-02-28','2022-03-30',NULL,'Python est une grande dormeuse. Elle s’enroule autour des arbres pour faire la sieste.','https://cdn.pixabay.com/photo/2016/01/13/09/42/snake-1137456_960_720.jpg',15,3,0),(20,'Croc','M','CROC001','Australie','2015-05-10','2016-06-15',NULL,'Croc est un vrai dur à cuire, mais il adore les câlins… quand personne ne regarde.','https://cdn.pixabay.com/photo/2022/01/18/01/39/crocodile-6946072_960_720.jpg',16,2,0),(21,'Snap','F','CROC002','USA','2016-08-12','2017-09-15',NULL,'Snap est une coquine. Elle adore faire claquer ses mâchoires pour impressionner.','https://cdn.pixabay.com/photo/2022/01/18/01/39/crocodile-6946072_960_720.jpg',17,1,0),(22,'Jaws','M','CROC003','Afrique','2017-11-30','2018-12-25',NULL,'Jaws est le roi des eaux. Il adore nager et faire des vagues.','https://cdn.pixabay.com/photo/2022/01/18/01/39/crocodile-6946072_960_720.jpg',18,4,0),(23,'Bite','F','CROC004','Inde','2018-03-25','2019-04-30',NULL,'Bite est une vraie mordante, mais elle a un cœur d’or.','https://cdn.pixabay.com/photo/2022/01/18/01/39/crocodile-6946072_960_720.jpg',19,3,0),(24,'Rexy','M','CROC005','Brésil','2019-07-18','2020-08-22',NULL,'Rexy est un explorateur. Il adore découvrir de nouveaux coins du refuge.','https://cdn.pixabay.com/photo/2022/01/18/01/39/crocodile-6946072_960_720.jpg',20,1,0),(25,'Alpha','M','LOUP001','Canada','2016-08-12','2017-09-15',NULL,'Alpha est le chef de la meute. Il veille sur tous les animaux.','https://cdn.pixabay.com/photo/2023/06/26/13/41/wolf-8089783_960_720.jpg',21,5,0),(26,'Luna','F','LOUP002','Russie','2017-11-30','2018-12-25',NULL,'Luna est une louve protectrice. Elle adore jouer avec les petits.','https://cdn.pixabay.com/photo/2023/06/26/13/41/wolf-8089783_960_720.jpg',22,1,0),(27,'Shadow','M','LOUP003','Alaska','2018-03-25','2019-04-30',NULL,'Shadow est discret et mystérieux. On le voit rarement, mais il est toujours là.','https://cdn.pixabay.com/photo/2023/06/26/13/41/wolf-8089783_960_720.jpg',23,4,0),(28,'Fang','M','LOUP004','Canada','2019-07-18','2020-08-22',NULL,'Fang est un loup solitaire, mais il adore les câlins en secret.','https://cdn.pixabay.com/photo/2023/06/26/13/41/wolf-8089783_960_720.jpg',24,5,0),(29,'Snow','F','LOUP005','Russie','2020-11-12','2021-12-15',NULL,'Snow est une louve blanche majestueuse. Elle adore la neige.','https://cdn.pixabay.com/photo/2023/06/26/13/41/wolf-8089783_960_720.jpg',25,1,0),(30,'Misty','F','CHAT001','France','2019-05-10','2020-06-15',NULL,'Misty est une chatte calme et affectueuse. Elle adore se prélasser au soleil.','https://cdn.pixabay.com/photo/2021/09/02/16/48/cat-6593947_960_720.jpg',26,5,0),(31,'Shadow','M','CHAT002','Espagne','2020-03-22','2021-04-12',NULL,'Shadow est un chat discret. Il adore se cacher dans les cartons.','https://cdn.pixabay.com/photo/2021/09/02/16/48/cat-6593947_960_720.jpg',27,5,0),(32,'Whiskers','M','CHAT003','Italie','2018-07-14','2019-08-20','2023-02-01','Whiskers était un chat espiègle. Il adorait jouer avec les lacets des soigneurs.','https://cdn.pixabay.com/photo/2021/09/02/16/48/cat-6593947_960_720.jpg',28,4,0),(33,'Baudet','M','ANE001','France','2015-06-01','2016-07-10',NULL,'Baudet est un âne têtu mais très affectueux. Il adore les carottes.','https://cdn.pixabay.com/photo/2020/08/03/09/37/donkey-5459627_960_720.jpg',29,5,0),(34,'Molly','F','MUL001','France','2021-02-28','2022-03-30',NULL,'Molly est un mulet robuste. Elle adore aider les soigneurs et porte toujours un sourire.','https://cdn.pixabay.com/photo/2020/08/03/09/37/donkey-5459627_960_720.jpg',30,2,0);
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
) ENGINE=InnoDB AUTO_INCREMENT=69 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cage`
--

LOCK TABLES `cage` WRITE;
/*!40000 ALTER TABLE `cage` DISABLE KEYS */;
INSERT INTO `cage` VALUES (1,101,1,1),(2,102,1,1),(3,103,1,1),(4,104,1,1),(5,105,1,1),(6,201,2,1),(7,202,2,1),(8,203,2,1),(9,301,3,1),(10,401,4,1),(11,402,4,1),(12,501,5,1),(13,502,5,1),(14,503,5,1),(15,504,5,1),(16,601,6,1),(17,602,6,1),(18,603,6,1),(19,604,6,1),(20,605,6,1),(21,701,7,1),(22,702,7,1),(23,703,7,1),(24,704,7,1),(25,705,7,1),(26,801,8,1),(27,802,8,1),(28,803,8,1),(29,901,9,1),(30,1001,10,1),(31,1101,11,1);
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
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `espece`
--

LOCK TABLES `espece` WRITE;
/*!40000 ALTER TABLE `espece` DISABLE KEYS */;
INSERT INTO `espece` VALUES (1,'Chien'),(2,'Cheval'),(3,'Girafe'),(4,'Éléphant'),(5,'Serpent'),(6,'Crocodile'),(7,'Loup'),(8,'Chat'),(9,'Âne'),(10,'lion'),(11,'renard');
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
  `IsArchived` tinyint(1) DEFAULT '0',
  `role` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT 'admin',
  PRIMARY KEY (`id_personnel`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `personnel`
--

LOCK TABLES `personnel` WRITE;
/*!40000 ALTER TABLE `personnel` DISABLE KEYS */;
INSERT INTO `personnel` VALUES (1,'Dupont','Jean','soigneur','jean.dupont','$2y$10$l1zGC.EkwFCpLf22ckWBb.e8/8sbLhzrZw0YxuUaaZdasX3SfIIFW',0,'superadmin'),(2,'Martin','Marie','soigneur','marie.martin','$2y$10$mHDo5xyU06XVHYnWvQsTuuoLr1e6GCYRhaJCbmY9k2Ilga44wm5u2',0,'admin'),(3,'Bernard','Luc','soigneur','luc.bernard','$2y$10$uBk5MesMGmW/5/WLPXa1VOmxZnw.8PJvxzseejUPetNoXshVGAI4.',0,'admin'),(4,'Petit','Sophie','soigneur','sophie.petit','$2y$10$IPEWdgZ14B9b1yhQZRUFGuJj0Qz3GfsB1YkUIsz1ecpajID5xJZ72',0,'admin'),(5,'Leroy','Pierre','soigneur','pierre.leroy','$2y$10$cMxFgETni.qla1vkBDg3ee2lBkib1Y1t6oFGKIeg45ymUh6.3Xi9S',0,'admin'),(6,'Moreau','Claire','administratif','claire.moreau','$2y$10$wBlelF13g3zZ.Qn9Ofafy.Ob5Zn48KZcre15LG2/OUdjvmyX3snxm',0,'admin'),(7,'Lefebvre','Thomas','cadre','thomas.lefebvre','$2y$10$SqiddFsBceNpBH8tGZe9jOyBXHPqB2FTeVw7TwK8KTOn.EvrRh0i.',0,'admin'),(8,'Roux','Laura','administratif','laura.roux','$2y$10$z27FRLP.u3blqUfMPcFnT.8SHRk5K.aEndwSUxb2hugl/MMmEubbq',0,'admin');
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
INSERT INTO `s_occuper` VALUES (5,1),(6,1),(7,1),(8,1),(10,1),(15,1),(20,1),(25,1),(30,1),(5,2),(6,2),(7,2),(8,2),(9,2),(10,2),(16,2),(21,2),(26,2),(31,2),(5,3),(6,3),(7,3),(9,3),(12,3),(17,3),(22,3),(27,3),(32,3),(8,4),(13,4),(18,4),(23,4),(28,4),(33,4),(9,5),(14,5),(19,5),(24,5),(29,5),(34,5);
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

-- Dump completed on 2025-03-05 17:59:56
