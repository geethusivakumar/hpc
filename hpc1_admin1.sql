-- MySQL dump 10.19  Distrib 10.2.38-MariaDB, for Linux (x86_64)
--
-- Host: localhost    Database: hpc1_admin1
-- ------------------------------------------------------
-- Server version	10.2.38-MariaDB

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
-- Table structure for table `admin_details`
--

DROP TABLE IF EXISTS `admin_details`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `admin_details` (
  `admin_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `photo` varchar(100) NOT NULL,
  PRIMARY KEY (`admin_id`),
  UNIQUE KEY `user_id` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin_details`
--

LOCK TABLES `admin_details` WRITE;
/*!40000 ALTER TABLE `admin_details` DISABLE KEYS */;
INSERT INTO `admin_details` VALUES (9,42,'Chuck','42.jpeg');
/*!40000 ALTER TABLE `admin_details` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `assigncourse`
--

DROP TABLE IF EXISTS `assigncourse`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `assigncourse` (
  `username` varchar(50) NOT NULL,
  `coursename` varchar(100) NOT NULL,
  `assignedby` varchar(50) NOT NULL,
  `progress` varchar(100) NOT NULL,
  `certpath` varchar(100) NOT NULL,
  `status` varchar(10) NOT NULL,
  UNIQUE KEY `username` (`username`,`coursename`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `assigncourse`
--

LOCK TABLES `assigncourse` WRITE;
/*!40000 ALTER TABLE `assigncourse` DISABLE KEYS */;
INSERT INTO `assigncourse` VALUES ('employee1','HPC 105','admin1','0','/CertPath/','A'),('geethu19','HPC 102','admin1','0','/CertPath/','A'),('geethu19','HPC 105','admin1','0','/CertPath/','A');
/*!40000 ALTER TABLE `assigncourse` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `certificates`
--

DROP TABLE IF EXISTS `certificates`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `certificates` (
  `cert_id` int(11) NOT NULL AUTO_INCREMENT,
  `join_id` int(11) NOT NULL,
  `certificate` varchar(100) NOT NULL,
  PRIMARY KEY (`cert_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `certificates`
--

LOCK TABLES `certificates` WRITE;
/*!40000 ALTER TABLE `certificates` DISABLE KEYS */;
INSERT INTO `certificates` VALUES (1,24,'24.pdf'),(2,26,'26.pdf');
/*!40000 ALTER TABLE `certificates` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `coursedetails`
--

DROP TABLE IF EXISTS `coursedetails`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `coursedetails` (
  `chapter_id` int(11) NOT NULL AUTO_INCREMENT,
  `courseid` int(11) NOT NULL,
  `chaptername` text NOT NULL,
  `chaptersummary` text NOT NULL,
  `videopath` varchar(100) DEFAULT NULL,
  `pdfpath` varchar(100) DEFAULT NULL,
  `pptxpath` varchar(100) DEFAULT NULL,
  `createdby` int(11) NOT NULL,
  PRIMARY KEY (`chapter_id`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `coursedetails`
--

LOCK TABLES `coursedetails` WRITE;
/*!40000 ALTER TABLE `coursedetails` DISABLE KEYS */;
INSERT INTO `coursedetails` VALUES (7,113,'Gas Types','Other important aspects to think about concerning burners are the design going into them. Each burner can influence the operation of the fire pit in some way.','7.mp4','7.pdf',NULL,42),(8,113,'Ignition Systems','One critical component to all fire products, indoor and outdoor, are ignition systems. In the narrowest definition and as pertains to natural gas and propane products, ignition systems exist to ignite a flame on a burner. In a broader definition, they exist to light a flame and ensure the flame remains lit, or else turn off the gas supply. In this section we will cover:','8.mp4','8.pdf',NULL,42),(9,114,'Match lit Ignition','Match-lit products are the simplest type of ignition systems; the operation is in the name. The customer must start the flow of gas by opening a valve and then quickly lighting the fuel. The customer may then bring the fuel flow to the desired flame levels. The best tool for lighting match lit fire features is typically a long-nosed butane torch or lighter, but as the name implies, a match would also work. A photo of one of HPCï¿½s match lit products is given below.','9.mp4','9.pdf','9.pptx',42),(10,115,'HPC 101-a Burners','','10.','10.pdf',NULL,42),(11,114,'Burner','Combustion','11.','11.',NULL,42),(12,116,'102','NA','12.mp4','12.pdf','12.pptx',42),(18,120,'Chapter1','description','18.mp4','18.pdf','18.pptx',42),(19,121,'Chapter1','Other important aspects to think about concerning burners are the design going into them. Each burner can influence the operation of the fire pit in some way.','19.mp4','19.pdf','19.pptx',42),(21,123,'HPC-102','You can say the genesis of our current Fire Features would be the burners themselves. Around 2003 the HPC began manufacturing stainless steel burners for outdoor use. Starting with just round and square burners. These burners fueled new ideas at HPC and expanded into our current CSA certified product line.','21.mp4','21.pdf','21.pptx',42),(22,129,'Outdoor Dining','HPC already has a huge name in the Outdoor Living industry, known for top quality and reliability','22.mp4','22.pdf','22.pptx',42),(24,126,'HPC-101','HPCâ€™s products require either Natural Gas (Methane) or Propane','24.mp4','24.pdf','24.pptx',42),(25,128,'Indoor Product Lines','The indoor hearth appliance has been a part of our lifestyle since the discovery of fire, since that time the hearth has been a source of heat, comfort style and romance. HPC Fire Inspired has been dedicated to delivering a wide array of products, kits and components that fulfill the consumers demand for the indoor hearth industry since 1975.','25.mp4','25.pdf','25.pptx',42),(27,127,'Outdoor Product Lines','HPC offers a wide range of products to fit our customerâ€™s needs. This includes different types of ignition types and different types of pans and burners. ','27.mp4','27.pdf','27.pptx',42),(28,131,'Warranty & Services','At HPC Fire Inspired we build our products with great care, and we back it up with the strongest warranty in the industry. Whether the customer is a dealer, distributor, end user, or even a prospect customer, when trouble arises on the job site or an exiting unit needs service, repair, or just simple product and install advice we have the avenues needed to help the customer. In this section we will go over the keys to keeping HPC Fire Inspired customer happy, and make sure they come back. ','28.mp4','28.pdf','28.pptx',42),(29,130,'HPC-109 ','HPC Fire Inspired ensures that every product we sell meets all requirements of excellent quality. Each step in the quality process in key to ensure the best product for our customers. It all starts with Research and Development â€“ Incoming quality inspections â€“ Quality Control â€“ Build checklist inspections â€“ Shipping and Handling. ','29.mp4','29.vnd.openxmlformats-officedocument.wordprocessingml.document','29.pptx',42),(30,125,'HPC-104','Every product gets a unique model number that defines what the product is just by the model number. The model number is broken down into several segments to describe each characteristic in that product. You can identify which type of product it is just by looking at the model number.','30.mp4','30.vnd.openxmlformats-officedocument.wordprocessingml.document','30.pptx',42),(31,124,'HPC-103','Although HPCs electronic ignition systems are the simplest to operate, there is a particular sequence of operations. Its not an instantaneous ignition as there are too many safety points the system must prove to itself before ignition.','31.mp4','31.pdf','31.pptx',42),(32,133,'HPC-112','OSHA offers a variety training programs designed to work in series, to provide the best learning experience for the customer and their employees. ',NULL,NULL,NULL,42),(33,133,'HPC-112','OSHA offers a variety training programs designed to work in series, to provide the best learning experience for the customer and their employees. ',NULL,NULL,NULL,42);
/*!40000 ALTER TABLE `coursedetails` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `courses`
--

DROP TABLE IF EXISTS `courses`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `courses` (
  `courseid` int(11) NOT NULL AUTO_INCREMENT,
  `course_code` varchar(30) NOT NULL,
  `course_name` text NOT NULL,
  `description` text NOT NULL,
  `photo` varchar(100) DEFAULT NULL,
  `createdby` varchar(100) NOT NULL,
  `status` varchar(10) NOT NULL,
  PRIMARY KEY (`courseid`),
  UNIQUE KEY `course_code` (`course_code`)
) ENGINE=MyISAM AUTO_INCREMENT=134 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `courses`
--

LOCK TABLES `courses` WRITE;
/*!40000 ALTER TABLE `courses` DISABLE KEYS */;
INSERT INTO `courses` VALUES (129,'HPC-107 ','Outdoor Dining','HPC offers a wide range of products to fit our customerâ€™s needs. This includes different types of ignition types and different types of pans and burners. ','129.png','42','Active'),(130,'HPC-109 ','Quality Assurance','HPC Fire Inspired ensures that every product we sell meets all requirements of excellent quality. Each step in the quality process in key to ensure the best product for our customers.','130.png','42','Active'),(124,'HPC-103','Ignition Systems','Although HPCs electronic ignition systems are the simplest to operate, there is a particular sequence of operations. Its not an instantaneous ignition as there are too many safety points the system must prove to itself before ignition.','124.png','42','Active'),(125,'HPC-104 ','Engineering Documents','Every product gets a unique model number that defines what the product is just by the model number. The model number is broken down into several segments to describe each characteristic in that product. You can identify which type of product it is just by looking at the model number.','125.png','42','Active'),(126,'HPC-101','Gas Types','HPCâ€™s products require either Natural Gas (Methane) or Propane\r\n','126.png','42','Active'),(123,'HPC-102','Burners','You can say the genesis of our current Fire Features would be the burners themselves. Around 2003 the HPC began manufacturing stainless steel burners for outdoor use. Starting with just round and square burners. These burners fueled new ideas at HPC and expanded into our current CSA certified product line.','123.png','42','Active'),(127,'HPC-105 ','Outdoor Product Lines ','HPC offers a wide range of products to fit our customerâ€™s needs. This includes different types of ignition types and different types of pans and burners. ','127.png','42','Active'),(128,'HPC-106','Indoor Product Line','The indoor hearth appliance has been a part of our lifestyle since the discovery of fire, since that time the hearth has been a source of heat, comfort style and romance. HPC Fire Inspired has been dedicated to delivering a wide array of products, kits and components that fulfill the consumers demand for the indoor hearth industry since 1975.','128.png','42','Active'),(131,'HPC-110 ','Warranty and Service','At HPC Fire Inspired we build our products with great care, and we back it up with the strongest warranty in the industry. Whether the customer is a dealer, distributor, end user, or even a prospect customer, when trouble arises on the job site or an exiting unit needs service, repair, or just simple product and install advice we have the avenues needed to help the customer. In this section we will go over the keys to keeping HPC Fire Inspired customer happy, and make sure they come back. ','131.png','42','Active'),(133,'HPC-112','Safety & OSHA Requirements','Occupational Safety and Health Administration or OSHA as it is known, is a branch of the United States Department of Labor.  ','133.png','42','Active');
/*!40000 ALTER TABLE `courses` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `courses1`
--

DROP TABLE IF EXISTS `courses1`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `courses1` (
  `courseid` int(11) NOT NULL AUTO_INCREMENT,
  `coursename` varchar(30) NOT NULL,
  `title` varchar(30) NOT NULL,
  `description` varchar(30) NOT NULL,
  `status` varchar(10) NOT NULL,
  UNIQUE KEY `courseid` (`courseid`)
) ENGINE=MyISAM AUTO_INCREMENT=109 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `courses1`
--

LOCK TABLES `courses1` WRITE;
/*!40000 ALTER TABLE `courses1` DISABLE KEYS */;
INSERT INTO `courses1` VALUES (101,'HPC 101','Ignition and Burners','Some text','P'),(102,'HPC 102','Combustion','Combustion helps to burn','P'),(103,'HPC 103','Engineering Documentation','ED is under HPC 103','P'),(104,'HPC 104','Outdoor Product Lines','Outdoor Product Lines defines ','P'),(105,'HPC 105','New Course','HPC 105 added','P'),(106,'HPC 105','Course for HPC 105 ','Course for HPC 105  is added','P'),(107,'','','','P'),(108,'101','Burner','XYZ','P');
/*!40000 ALTER TABLE `courses1` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `questions`
--

DROP TABLE IF EXISTS `questions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `questions` (
  `qn_id` int(11) NOT NULL AUTO_INCREMENT,
  `quiz_id` int(11) NOT NULL,
  `question` text NOT NULL,
  `option_a` text NOT NULL,
  `option_b` text NOT NULL,
  `option_c` text NOT NULL,
  `option_d` text NOT NULL,
  `answer` varchar(10) NOT NULL,
  PRIMARY KEY (`qn_id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `questions`
--

LOCK TABLES `questions` WRITE;
/*!40000 ALTER TABLE `questions` DISABLE KEYS */;
INSERT INTO `questions` VALUES (1,1,'Through what type of hole does fuel flow just before burning?','Drilled and tapped holes','Punch holes','Port holes','¼” diameter holes','B'),(2,1,'For a design rule of thumb, for how many BTU’s per foot should a burner be designed?','23k','25k','26k','50k','B'),(3,1,'The main feature of SST Torpedo versions is:','More evenly distributed flame','Significantly higher BTU’s','Longer warranty period','Higher flame','C'),(4,1,'How many types of burners are offered by HPC?','6','7','8','76','D'),(5,1,'Which of the following is not a burner sold by HPC?','Round','Octagon','Rectangular','Square','A'),(6,1,'','','','','','A'),(7,1,'','','','','','A'),(8,2,'question 1?','1','2','3','4','A'),(9,2,'question 2?','1','2','3','4','B'),(10,4,'What is a?','Apple','Bat','Cat','Dog','A'),(11,2,'question 1?','1','2','3','4','A'),(12,2,'question 2 ?','1','2','3','4','B'),(13,4,'B for what?','Apple','Bat','Cat','Dog','B'),(14,9,'A for _ ?','Apple','Bag','Cat','Dog','A'),(15,10,'Which animal is known as the \'Ship of the Desert\"?','Camel','Cat','Dog','Goat','A'),(16,10,'How many hours are there in a day?','20 hours','24 hours','4 hours','4 hours','B'),(17,10,'How many days are there in a year?','365','300','65','165','A'),(18,10,'How many minutes are there in an hour?','23','60','12','11','B'),(19,10,'How many letters are there in the English alphabet?','16','36','26','46','C'),(20,10,'Rainbow consist of how many colours?','8','10','3','7','D'),(21,10,'How many seconds are there in a minute?','60 seconds','30','25','40','A'),(22,10,'Name the National animal of India?','Tiger','Cat','Dog','Lion','A'),(23,10,'Name the National fruit of India?','Mango','Apple','banana','jackfruit','A'),(24,10,'Name the national flower of India?','Lotus flower','rose','sunflower','jasmine','A');
/*!40000 ALTER TABLE `questions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `quiz`
--

DROP TABLE IF EXISTS `quiz`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `quiz` (
  `quiz_id` int(11) NOT NULL AUTO_INCREMENT,
  `courseid` int(11) NOT NULL,
  `chapter_id` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  PRIMARY KEY (`quiz_id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `quiz`
--

LOCK TABLES `quiz` WRITE;
/*!40000 ALTER TABLE `quiz` DISABLE KEYS */;
INSERT INTO `quiz` VALUES (1,113,7,42),(2,114,9,42),(4,114,11,42),(5,114,9,42),(6,114,9,42),(7,113,7,42),(8,113,7,42),(9,120,18,42),(10,121,19,42),(11,121,20,42);
/*!40000 ALTER TABLE `quiz` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `quizdetails`
--

DROP TABLE IF EXISTS `quizdetails`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `quizdetails` (
  `courseid` int(11) NOT NULL,
  `quizref` int(11) NOT NULL,
  `questionnum` int(11) NOT NULL,
  `question` varchar(255) NOT NULL,
  `optiona` varchar(255) NOT NULL,
  `optionb` varchar(255) NOT NULL,
  `optionc` varchar(255) NOT NULL,
  `optiond` varchar(255) NOT NULL,
  `ansoption` varchar(10) NOT NULL,
  UNIQUE KEY `courseid` (`courseid`,`quizref`,`questionnum`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `quizdetails`
--

LOCK TABLES `quizdetails` WRITE;
/*!40000 ALTER TABLE `quizdetails` DISABLE KEYS */;
INSERT INTO `quizdetails` VALUES (101,1,1,'Which of the following spells 3','One','Two','Three','Four','c'),(101,1,2,'What is Water?','O2','N2','H2O','SO2','c'),(101,2,1,'What is the current ignition system used by HPC?','Electronic Coil','Hot Surface Ignition','Hot Wire Ignition (HWI)','Matches','c'),(101,3,1,'What is Good?','GOOD','god','Bd','Bad','a'),(102,1,1,'Which is larger?','Elephant','Tiger','Onion','Carrot','a'),(102,1,2,'Which is smaller?','Elephant','Tiger','Onion','Carrot','c'),(102,2,1,'Which is larger?','Elephant','Tiger','Onion','Carrot','a'),(102,3,1,'Which is larger?','Elephant','Tiger','Onion','Carrot','a'),(105,1,1,'Which is Greener?','Sky','Earth','Oceans','Water','b'),(105,1,2,'Ok','1','2','3','4','b'),(105,2,1,'What is Greener?','Earth','Leaf','Sky','Planet','b');
/*!40000 ALTER TABLE `quizdetails` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `quizdetails1`
--

DROP TABLE IF EXISTS `quizdetails1`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `quizdetails1` (
  `courseid` int(11) NOT NULL,
  `quizref` int(11) NOT NULL,
  `questionnum` int(11) NOT NULL,
  `question` varchar(255) NOT NULL,
  `optiona` varchar(255) NOT NULL,
  `optionb` varchar(255) NOT NULL,
  `optionc` varchar(255) NOT NULL,
  `optiond` varchar(255) NOT NULL,
  `ansoption` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `quizdetails1`
--

LOCK TABLES `quizdetails1` WRITE;
/*!40000 ALTER TABLE `quizdetails1` DISABLE KEYS */;
INSERT INTO `quizdetails1` VALUES (1,1,1,'Which of the following spells 3','One','Two','Three','Four','3');
/*!40000 ALTER TABLE `quizdetails1` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `quizscores`
--

DROP TABLE IF EXISTS `quizscores`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `quizscores` (
  `username` varchar(255) NOT NULL,
  `courseid` varchar(255) NOT NULL,
  `scores` int(11) NOT NULL,
  `status` varchar(10) NOT NULL,
  UNIQUE KEY `username` (`username`,`courseid`,`scores`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `quizscores`
--

LOCK TABLES `quizscores` WRITE;
/*!40000 ALTER TABLE `quizscores` DISABLE KEYS */;
INSERT INTO `quizscores` VALUES ('geethu19','102',0,'A'),('geethu19','105',0,'A');
/*!40000 ALTER TABLE `quizscores` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `student`
--

DROP TABLE IF EXISTS `student`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `student` (
  `studentid` int(11) NOT NULL AUTO_INCREMENT,
  `studentname` varchar(30) NOT NULL,
  `courseid` int(11) NOT NULL,
  `coursename` varchar(30) NOT NULL,
  `studenttype` varchar(30) NOT NULL,
  `progress` int(11) NOT NULL,
  `certificatepath` varchar(255) NOT NULL,
  PRIMARY KEY (`studentid`),
  UNIQUE KEY `studentid` (`studentid`,`courseid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `student`
--

LOCK TABLES `student` WRITE;
/*!40000 ALTER TABLE `student` DISABLE KEYS */;
/*!40000 ALTER TABLE `student` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `test_result`
--

DROP TABLE IF EXISTS `test_result`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `test_result` (
  `result_id` int(11) NOT NULL AUTO_INCREMENT,
  `test_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `right_ans` int(11) NOT NULL,
  `wrong_ans` int(11) NOT NULL,
  `no_attempt` int(11) NOT NULL,
  `score` float NOT NULL,
  PRIMARY KEY (`result_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `test_result`
--

LOCK TABLES `test_result` WRITE;
/*!40000 ALTER TABLE `test_result` DISABLE KEYS */;
INSERT INTO `test_result` VALUES (1,10,29,8,1,1,80),(2,10,29,0,0,10,0),(3,10,29,8,1,1,80),(4,10,27,4,0,6,40),(5,10,27,5,1,4,50),(6,10,29,0,0,10,0);
/*!40000 ALTER TABLE `test_result` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `role` varchar(30) NOT NULL,
  `status` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_courses`
--

DROP TABLE IF EXISTS `user_courses`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_courses` (
  `join_id` int(11) NOT NULL AUTO_INCREMENT,
  `course_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `joined_date` date NOT NULL,
  `status` varchar(100) NOT NULL,
  `created_by` int(11) NOT NULL,
  PRIMARY KEY (`join_id`)
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_courses`
--

LOCK TABLES `user_courses` WRITE;
/*!40000 ALTER TABLE `user_courses` DISABLE KEYS */;
INSERT INTO `user_courses` VALUES (1,114,24,'2022-04-15','ongoing',42),(2,114,29,'2022-04-15','completed',42),(3,114,30,'2022-04-15','ongoing',42),(4,113,24,'2022-04-15','ongoing',42),(5,113,29,'2022-04-15','ongoing',42),(9,114,27,'2022-04-16','ongoing',42),(10,113,28,'2022-04-16','ongoing',42),(11,113,27,'2022-04-16','ongoing',42),(17,115,36,'2022-04-18','ongoing',42),(18,114,38,'2022-04-19','ongoing',42),(19,113,38,'2022-04-19','ongoing',42),(20,113,30,'2022-04-26','ongoing',42),(22,120,53,'2022-05-05','ongoing',42),(23,120,54,'2022-05-05','ongoing',42),(24,121,29,'2022-05-05','completed',42),(26,121,27,'2022-05-05','completed',42),(27,120,50,'2022-05-05','ongoing',42),(28,121,50,'2022-05-05','ongoing',42),(31,129,29,'2022-05-07','ongoing',42),(32,129,27,'2022-05-07','ongoing',42),(33,129,50,'2022-05-07','ongoing',42),(34,130,50,'2022-05-07','ongoing',42),(36,125,50,'2022-05-07','ongoing',42),(37,126,50,'2022-05-07','ongoing',42),(38,123,50,'2022-05-07','ongoing',42),(39,127,50,'2022-05-07','ongoing',42),(40,128,50,'2022-05-07','ongoing',42),(41,131,50,'2022-05-07','ongoing',42),(42,133,50,'2022-05-07','ongoing',42),(43,124,50,'2022-05-07','ongoing',42);
/*!40000 ALTER TABLE `user_courses` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `userdetails`
--

DROP TABLE IF EXISTS `userdetails`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `userdetails` (
  `u_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `address` text NOT NULL,
  `phone` varchar(25) NOT NULL,
  `qualifn` varchar(100) NOT NULL,
  `photo` varchar(100) NOT NULL,
  `created_by` int(11) NOT NULL,
  PRIMARY KEY (`u_id`),
  UNIQUE KEY `user_id` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `userdetails`
--

LOCK TABLES `userdetails` WRITE;
/*!40000 ALTER TABLE `userdetails` DISABLE KEYS */;
INSERT INTO `userdetails` VALUES (1,24,'Kamal','Male','Kamal Nivas\r\nVarkala','9876543210','Diploma','24.jpeg',42),(3,27,'Kannan','Male','Kannan Nivas\r\nKulathoor','8784356423','Diploma','27.jpeg',42),(4,28,'Anu','Female','Kannan Nivas\r\nKulathoor','9678768567','Diploma','28.jpeg',42),(5,29,'Aswathy','Female','trivandrum','9876543210','MCA','29.jpeg',42),(6,30,'sunil','Male','sunil nivas','9856441219','BCA','30.jpeg',42),(12,38,'geethu','Female','Djkfn','9999999999','Fjfj','38.',42),(13,41,'Anirudh','Male','Anirudh homes','9856441210','B.tech','41.jpeg',42),(14,44,'ammu','Female','ammu nivas','8129706069','BTECH','44.png',42),(15,45,'achu','Male','achu nivas','8714190012','BTECH','45.jpeg',42),(17,48,'Sarath','Male','Sarath Bhavan\r\nKollam','9685675462','Diploma','48.jpeg',42),(18,49,'Sujesh','Male','N/A','9345876422','N/A','49.',42),(19,50,'HarshaG','Male','NA','9886296366','NA','50.',42),(20,51,'PalaniA','Male','Na','7843009887','Na','51.png',42),(21,53,'seetha','Female','seetha home','98765432101','BTECH','53.png',42),(22,54,'sanjana','Female','sanjana home','9435783781','BTECH','54.jpeg',42);
/*!40000 ALTER TABLE `userdetails` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `userlogin`
--

DROP TABLE IF EXISTS `userlogin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `userlogin` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) NOT NULL,
  `emailid` varchar(50) NOT NULL,
  `pass` varchar(30) NOT NULL,
  `role` varchar(10) NOT NULL,
  `status` varchar(10) NOT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `emailid` (`emailid`)
) ENGINE=MyISAM AUTO_INCREMENT=59 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `userlogin`
--

LOCK TABLES `userlogin` WRITE;
/*!40000 ALTER TABLE `userlogin` DISABLE KEYS */;
INSERT INTO `userlogin` VALUES (1,'hpcadmin','hpcadmin@gmail.com','hpcadmin1','superadmin','Active'),(24,'kamal123','kamal@gmail.com','kamal','employee','Active'),(27,'kannan','kannan@gmail.com','kannan','customer','Active'),(28,'anu','anu@gmail.com','anu','customer','Active'),(29,'aswathy20','aswathy@gmail.com','123456789','employee','Active'),(30,'sunil200','sunil@gmail.com','123456789','employee','Active'),(41,'anirudh1','anirudh@gmail.com','anirudh1','employee','Active'),(38,'geethu','Dhfj@gdj.ghj','geethu','customer','Active'),(50,'harshag','harsha.g@actualize.co.in','hpc123','customer','Active'),(42,'Chuckhpc','chuckp@hpcfire.com','hpc123','admin','Active'),(44,'ammu123','ammu123@gmail.com','123456789','employee','Active'),(45,'achu123','achu123@gmail.com','123456789','customer','Active'),(48,'sarath','sarath@gmail.com','sarath','customer','Active'),(49,'sujesh','sujesh@gmail.com','sujesh','customer','Active'),(51,'palani','palani@hpcfire.com','hpc123','employee','Active'),(53,'seetha','seetha@gmail.com','seetha','employee','Active'),(54,'sanjana','sanjana@gmail.com','sanjana','customer','Active');
/*!40000 ALTER TABLE `userlogin` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-05-07 12:53:12
