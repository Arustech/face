/*
SQLyog Ultimate v9.63 
MySQL - 5.6.12-log : Database - face_db
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
/*Table structure for table `tbl_admin` */

DROP TABLE IF EXISTS `tbl_admin`;

CREATE TABLE `tbl_admin` (
  `admin_id` int(12) NOT NULL AUTO_INCREMENT,
  `admin_username` varchar(100) DEFAULT NULL,
  `admin_password` varchar(250) DEFAULT NULL,
  `admin_email` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`admin_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_admin` */

LOCK TABLES `tbl_admin` WRITE;

insert  into `tbl_admin`(`admin_id`,`admin_username`,`admin_password`,`admin_email`) values (1,'admin','21232f297a57a5a743894a0e4a801fc3','asimbsit@gmail.com');

UNLOCK TABLES;

/*Table structure for table `tbl_album` */

DROP TABLE IF EXISTS `tbl_album`;

CREATE TABLE `tbl_album` (
  `album_id` int(13) NOT NULL AUTO_INCREMENT,
  `user_id` int(13) DEFAULT NULL,
  `album_name` varchar(150) DEFAULT NULL,
  `cover_photo_name` varchar(100) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `access` enum('public','onlyme','friends') DEFAULT 'public',
  `user_access` varchar(300) DEFAULT NULL,
  PRIMARY KEY (`album_id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `tbl_album_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `tbl_user` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_album` */

LOCK TABLES `tbl_album` WRITE;

UNLOCK TABLES;

/*Table structure for table `tbl_country` */

DROP TABLE IF EXISTS `tbl_country`;

CREATE TABLE `tbl_country` (
  `country_id` int(11) NOT NULL AUTO_INCREMENT,
  `country_symbol` varchar(3) NOT NULL,
  `country_name` varchar(255) NOT NULL,
  PRIMARY KEY (`country_id`)
) ENGINE=InnoDB AUTO_INCREMENT=238 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_country` */

LOCK TABLES `tbl_country` WRITE;

insert  into `tbl_country`(`country_id`,`country_symbol`,`country_name`) values (1,'US','United States'),(2,'AF','Afghanistan'),(3,'AL','Albania'),(4,'DZ','Algeria'),(5,'AS','American Samoa'),(6,'AD','Andorra'),(7,'AO','Angola'),(8,'AI','Anguilla'),(9,'AG','Antigua and Barbuda'),(10,'AR','Argentina'),(11,'AM','Armenia'),(12,'AW','Aruba'),(13,'AU','Australia'),(14,'AT','Austria'),(15,'AZ','Azerbaijan'),(16,'BS','Bahamas'),(17,'BH','Bahrain'),(18,'BD','Bangladesh'),(19,'BB','Barbados'),(20,'BY','Belarus'),(21,'BE','Belgium'),(22,'BZ','Belize'),(23,'BJ','Benin'),(24,'BM','Bermuda'),(25,'BT','Bhutan'),(26,'BO','Bolivia'),(27,'BA','Bosnia and Herzegovina'),(28,'BW','Botswana'),(29,'BV','Bouvet Island'),(30,'BR','Brazil'),(31,'IO','British Indian Ocean Territory'),(32,'VG','British Virgin Islands'),(33,'BN','Brunei'),(34,'BG','Bulgaria'),(35,'BF','Burkina Faso'),(36,'BI','Burundi'),(37,'KH','Cambodia'),(38,'CM','Cameroon'),(39,'CA','Canada'),(40,'CV','Cape Verde'),(41,'KY','Cayman Islands'),(42,'CF','Central African Republic'),(43,'TD','Chad'),(44,'CL','Chile'),(45,'CN','China'),(46,'CX','Christmas Island'),(47,'CC','Cocos (Keeling) Islands'),(48,'CO','Colombia'),(49,'KM','Comoros'),(50,'CG','Congo'),(51,'CD','Congo - Democratic Republic of'),(52,'CK','Cook Islands'),(53,'CR','Costa Rica'),(54,'HR','Croatia'),(55,'CU','Cuba'),(56,'CY','Cyprus'),(57,'CZ','Czech Republic'),(58,'DK','Denmark'),(59,'DJ','Djibouti'),(60,'DM','Dominica'),(61,'DO','Dominican Republic'),(62,'TP','East Timor'),(63,'EC','Ecuador'),(64,'EG','Egypt'),(65,'SV','El Salvador'),(66,'GQ','Equitorial Guinea'),(67,'ER','Eritrea'),(68,'EE','Estonia'),(69,'ET','Ethiopia'),(70,'FK','Falkland Islands (Islas Malvinas)'),(71,'FO','Faroe Islands'),(72,'FJ','Fiji'),(73,'FI','Finland'),(74,'FR','France'),(75,'GF','French Guyana'),(76,'PF','French Polynesia'),(77,'TF','French Southern and Antarctic Lands'),(78,'GA','Gabon'),(79,'GM','Gambia'),(80,'GZ','Gaza Strip'),(81,'GE','Georgia'),(82,'DE','Germany'),(83,'GH','Ghana'),(84,'GI','Gibraltar'),(85,'GR','Greece'),(86,'GL','Greenland'),(87,'GD','Grenada'),(88,'GP','Guadeloupe'),(89,'GU','Guam'),(90,'GT','Guatemala'),(91,'GN','Guinea'),(92,'GW','Guinea-Bissau'),(93,'GY','Guyana'),(94,'HT','Haiti'),(95,'HM','Heard Island and McDonald Islands'),(96,'VA','Holy See (Vatican City)'),(97,'HN','Honduras'),(98,'HK','Hong Kong'),(99,'HU','Hungary'),(100,'IS','Iceland'),(101,'IN','India'),(102,'ID','Indonesia'),(103,'IR','Iran'),(104,'IQ','Iraq'),(105,'IE','Ireland'),(106,'IL','Israel'),(107,'IT','Italy'),(108,'JM','Jamaica'),(109,'JP','Japan'),(110,'JO','Jordan'),(111,'KZ','Kazakhstan'),(112,'KE','Kenya'),(113,'KI','Kiribati'),(114,'KW','Kuwait'),(115,'KG','Kyrgyzstan'),(116,'LA','Laos'),(117,'LV','Latvia'),(118,'LB','Lebanon'),(119,'LS','Lesotho'),(120,'LR','Liberia'),(121,'LY','Libya'),(122,'LI','Liechtenstein'),(123,'LT','Lithuania'),(124,'LU','Luxembourg'),(125,'MO','Macau'),(126,'MK','Macedonia - The Former Yugoslav Republic of'),(127,'MG','Madagascar'),(128,'MW','Malawi'),(129,'MY','Malaysia'),(130,'MV','Maldives'),(131,'ML','Mali'),(132,'MT','Malta'),(133,'MH','Marshall Islands'),(134,'MQ','Martinique'),(135,'MR','Mauritania'),(136,'MU','Mauritius'),(137,'YT','Mayotte'),(138,'MX','Mexico'),(139,'FM','Micronesia - Federated States of'),(140,'MD','Moldova'),(141,'MC','Monaco'),(142,'MN','Mongolia'),(143,'MS','Montserrat'),(144,'MA','Morocco'),(145,'MZ','Mozambique'),(146,'MM','Myanmar'),(147,'NA','Namibia'),(148,'NR','Naura'),(149,'NP','Nepal'),(150,'NL','Netherlands'),(151,'AN','Netherlands Antilles'),(152,'NC','New Caledonia'),(153,'NZ','New Zealand'),(154,'NI','Nicaragua'),(155,'NE','Niger'),(156,'NG','Nigeria'),(157,'NU','Niue'),(158,'NF','Norfolk Island'),(159,'KP','North Korea'),(160,'MP','Northern Mariana Islands'),(161,'NO','Norway'),(162,'OM','Oman'),(163,'PK','Pakistan'),(164,'PW','Palau'),(165,'PA','Panama'),(166,'PG','Papua New Guinea'),(167,'PY','Paraguay'),(168,'PE','Peru'),(169,'PH','Philippines'),(170,'PN','Pitcairn Islands'),(171,'PL','Poland'),(172,'PT','Portugal'),(173,'PR','Puerto Rico'),(174,'QA','Qatar'),(175,'RE','Reunion'),(176,'RO','Romania'),(177,'RU','Russia'),(178,'RW','wanda'),(179,'KN','Saint Kitts and Nevis'),(180,'LC','Saint Lucia'),(181,'VC','Saint Vincent and the Grenadines'),(182,'WS','Samoa'),(183,'SM','San Marino'),(184,'ST','Sao Tome and Principe'),(185,'SA','Saudi Arabia'),(186,'SN','Senegal'),(187,'CS','Serbia and Montenegro'),(188,'SC','Seychelles'),(189,'SL','Sierra Leone'),(190,'SG','Singapore'),(191,'SK','Slovakia'),(192,'SI','Slovenia'),(193,'SB','Solomon Islands'),(194,'SO','Somalia'),(195,'ZA','South Africa'),(196,'GS','South Georgia and the South Sandwich Islands'),(197,'KR','South Korea'),(198,'ES','Spain'),(199,'LK','Sri Lanka'),(200,'SH','St. Helena'),(201,'PM','St. Pierre and Miquelon'),(202,'SD','Sudan'),(203,'SR','Suriname'),(204,'SJ','Svalbard'),(205,'SZ','Swaziland'),(206,'SE','Sweden'),(207,'CH','Switzerland'),(208,'SY','Syria'),(209,'TW','Taiwan'),(210,'TJ','Tajikistan'),(211,'TZ','Tanzania'),(212,'TH','Thailand'),(213,'TG','Togo'),(214,'TK','Tokelau'),(215,'TO','Tonga'),(216,'TT','Trinidad and Tobago'),(217,'TN','Tunisia'),(218,'TR','Turkey'),(219,'TM','Turkmenistan'),(220,'TC','Turks and Caicos Islands'),(221,'TV','Tuvalu'),(222,'UG','Uganda'),(223,'UA','Ukraine'),(224,'AE','United Arab Emirates'),(225,'GB','United Kingdom'),(226,'VI','United States Virgin Islands'),(227,'UY','Uruguay'),(228,'UZ','Uzbekistan'),(229,'VU','Vanuatu'),(230,'VE','Venezuela'),(231,'VN','Vietnam'),(232,'WF','Wallis and Futuna'),(233,'PS','West Bank'),(234,'EH','Western Sahara'),(235,'YE','Yemen'),(236,'ZM','Zambia'),(237,'ZW','Zimbabwe');

UNLOCK TABLES;

/*Table structure for table `tbl_events` */

DROP TABLE IF EXISTS `tbl_events`;

CREATE TABLE `tbl_events` (
  `event_id` int(11) NOT NULL AUTO_INCREMENT,
  `event_name` varchar(150) NOT NULL,
  `event_date` date NOT NULL,
  `religion_type` enum('Christian','Hindu','Jew','Muslim') DEFAULT NULL,
  PRIMARY KEY (`event_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_events` */

LOCK TABLES `tbl_events` WRITE;

insert  into `tbl_events`(`event_id`,`event_name`,`event_date`,`religion_type`) values (9,'23rd March','2014-03-22','Muslim'),(10,'25 december','2014-03-20','Christian');

UNLOCK TABLES;

/*Table structure for table `tbl_friend` */

DROP TABLE IF EXISTS `tbl_friend`;

CREATE TABLE `tbl_friend` (
  `friend_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(13) DEFAULT NULL,
  `user_friend_id` int(13) DEFAULT NULL,
  `friend_type` enum('family','friends') DEFAULT 'friends',
  PRIMARY KEY (`friend_id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `tbl_friend_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `tbl_user` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tbl_friend` */

LOCK TABLES `tbl_friend` WRITE;

UNLOCK TABLES;

/*Table structure for table `tbl_friend_request` */

DROP TABLE IF EXISTS `tbl_friend_request`;

CREATE TABLE `tbl_friend_request` (
  `request_id` int(13) NOT NULL AUTO_INCREMENT,
  `request_by` int(13) DEFAULT NULL,
  `request_to` int(13) DEFAULT NULL,
  PRIMARY KEY (`request_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tbl_friend_request` */

LOCK TABLES `tbl_friend_request` WRITE;

UNLOCK TABLES;

/*Table structure for table `tbl_hobbies` */

DROP TABLE IF EXISTS `tbl_hobbies`;

CREATE TABLE `tbl_hobbies` (
  `hobby_id` int(11) NOT NULL AUTO_INCREMENT,
  `hobby_name` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`hobby_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_hobbies` */

LOCK TABLES `tbl_hobbies` WRITE;

insert  into `tbl_hobbies`(`hobby_id`,`hobby_name`) values (2,'Football'),(3,'Hokey'),(4,'Cricket'),(6,'Ball'),(7,'Bat'),(8,'Bottle'),(9,'Singing'),(10,'Cooking');

UNLOCK TABLES;

/*Table structure for table `tbl_msgs` */

DROP TABLE IF EXISTS `tbl_msgs`;

CREATE TABLE `tbl_msgs` (
  `msg_id` int(13) NOT NULL AUTO_INCREMENT,
  `msg_send_by` int(13) DEFAULT NULL,
  `msg_send_to` int(13) DEFAULT NULL,
  `msg_is_read` enum('1','0') DEFAULT '0',
  `msg_send_date` datetime DEFAULT NULL,
  `msg_data` text,
  PRIMARY KEY (`msg_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tbl_msgs` */

LOCK TABLES `tbl_msgs` WRITE;

UNLOCK TABLES;

/*Table structure for table `tbl_photo` */

DROP TABLE IF EXISTS `tbl_photo`;

CREATE TABLE `tbl_photo` (
  `photo_id` int(13) NOT NULL AUTO_INCREMENT,
  `album_id` int(13) DEFAULT NULL,
  `photo_src` varchar(150) DEFAULT NULL,
  `photo_created` datetime DEFAULT NULL,
  PRIMARY KEY (`photo_id`),
  KEY `album_id` (`album_id`),
  CONSTRAINT `tbl_photo_ibfk_1` FOREIGN KEY (`album_id`) REFERENCES `tbl_album` (`album_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tbl_photo` */

LOCK TABLES `tbl_photo` WRITE;

UNLOCK TABLES;

/*Table structure for table `tbl_post` */

DROP TABLE IF EXISTS `tbl_post`;

CREATE TABLE `tbl_post` (
  `post_id` int(13) NOT NULL AUTO_INCREMENT,
  `post_data` text,
  `post_date_time` datetime DEFAULT NULL,
  `posted_on_user_id` int(13) DEFAULT '0',
  `posted_by_user_id` int(13) DEFAULT NULL,
  `post_type` enum('video','link','msg','album','photo') DEFAULT NULL,
  `post_title` text,
  `post_access` enum('public','friends','family') DEFAULT 'public',
  `post_user_access` varchar(300) DEFAULT '0',
  PRIMARY KEY (`post_id`),
  KEY `posted_by_user_id` (`posted_by_user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=185 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_post` */

LOCK TABLES `tbl_post` WRITE;

UNLOCK TABLES;

/*Table structure for table `tbl_post_comment` */

DROP TABLE IF EXISTS `tbl_post_comment`;

CREATE TABLE `tbl_post_comment` (
  `comment_id` int(13) NOT NULL AUTO_INCREMENT,
  `post_id` int(11) DEFAULT NULL,
  `comment_on_date` datetime DEFAULT NULL,
  `comment_by` int(13) DEFAULT NULL,
  `description` text,
  PRIMARY KEY (`comment_id`),
  KEY `comment_by` (`comment_by`),
  KEY `post_id` (`post_id`),
  CONSTRAINT `tbl_post_comment_ibfk_1` FOREIGN KEY (`post_id`) REFERENCES `tbl_post` (`post_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tbl_post_comment` */

LOCK TABLES `tbl_post_comment` WRITE;

UNLOCK TABLES;

/*Table structure for table `tbl_profile_basic` */

DROP TABLE IF EXISTS `tbl_profile_basic`;

CREATE TABLE `tbl_profile_basic` (
  `profile_basic_id` int(13) NOT NULL AUTO_INCREMENT,
  `user_id` int(13) DEFAULT NULL,
  `birthday` date DEFAULT '0000-00-00',
  `first_name` varchar(150) DEFAULT NULL,
  `last_name` varchar(150) DEFAULT NULL,
  `religion` enum('Muslim','Hindu','Christian','Jew','Unspecified') DEFAULT 'Unspecified',
  `gender` enum('Male','Female','Unspecified') DEFAULT 'Unspecified',
  `relation` enum('Engaged','Married','Unspecified','Single','In An Open Relationship','In a Relationship','Its Complicated') DEFAULT 'Unspecified',
  `lookingfor` enum('Dating','Friendship','RandomPlay','Relationship','Unspecified','WhateverIcanGet') DEFAULT 'Unspecified',
  PRIMARY KEY (`profile_basic_id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `tbl_profile_basic_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `tbl_user` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tbl_profile_basic` */

LOCK TABLES `tbl_profile_basic` WRITE;

UNLOCK TABLES;

/*Table structure for table `tbl_profile_contact` */

DROP TABLE IF EXISTS `tbl_profile_contact`;

CREATE TABLE `tbl_profile_contact` (
  `contact_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `land_line` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `city` varchar(255) NOT NULL,
  `state_province` varchar(255) NOT NULL,
  `country_id` int(13) NOT NULL DEFAULT '1',
  `zip_code` varchar(255) NOT NULL,
  `website` text NOT NULL,
  `last_updated` date NOT NULL,
  PRIMARY KEY (`contact_id`),
  KEY `country_id` (`country_id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `tbl_profile_contact_ibfk_3` FOREIGN KEY (`country_id`) REFERENCES `tbl_country` (`country_id`),
  CONSTRAINT `tbl_profile_contact_ibfk_4` FOREIGN KEY (`user_id`) REFERENCES `tbl_user` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tbl_profile_contact` */

LOCK TABLES `tbl_profile_contact` WRITE;

UNLOCK TABLES;

/*Table structure for table `tbl_profile_education` */

DROP TABLE IF EXISTS `tbl_profile_education`;

CREATE TABLE `tbl_profile_education` (
  `education_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` bigint(11) NOT NULL,
  `high_school` varchar(255) NOT NULL,
  `last_updated` date NOT NULL,
  PRIMARY KEY (`education_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tbl_profile_education` */

LOCK TABLES `tbl_profile_education` WRITE;

UNLOCK TABLES;

/*Table structure for table `tbl_profile_personal` */

DROP TABLE IF EXISTS `tbl_profile_personal`;

CREATE TABLE `tbl_profile_personal` (
  `personal_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `activities` text NOT NULL,
  `favorite_music` text NOT NULL,
  `favorite_tv_shows` text NOT NULL,
  `favorite_movies` text NOT NULL,
  `favorite_books` text NOT NULL,
  `favorite_quotes` text NOT NULL,
  `about_me` text NOT NULL,
  `last_updated` date NOT NULL,
  PRIMARY KEY (`personal_id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `tbl_profile_personal_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `tbl_user` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tbl_profile_personal` */

LOCK TABLES `tbl_profile_personal` WRITE;

UNLOCK TABLES;

/*Table structure for table `tbl_profile_work` */

DROP TABLE IF EXISTS `tbl_profile_work`;

CREATE TABLE `tbl_profile_work` (
  `work_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `company_name` varchar(255) NOT NULL,
  `position` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `country` int(11) NOT NULL DEFAULT '1',
  `current_job` enum('yes','no') NOT NULL DEFAULT 'yes',
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `job_type` varchar(255) NOT NULL,
  PRIMARY KEY (`work_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tbl_profile_work` */

LOCK TABLES `tbl_profile_work` WRITE;

UNLOCK TABLES;

/*Table structure for table `tbl_remember` */

DROP TABLE IF EXISTS `tbl_remember`;

CREATE TABLE `tbl_remember` (
  `remember_id` int(13) NOT NULL AUTO_INCREMENT,
  `user_id` int(13) DEFAULT NULL,
  `token` text,
  PRIMARY KEY (`remember_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tbl_remember` */

LOCK TABLES `tbl_remember` WRITE;

UNLOCK TABLES;

/*Table structure for table `tbl_report` */

DROP TABLE IF EXISTS `tbl_report`;

CREATE TABLE `tbl_report` (
  `report_id` int(11) NOT NULL AUTO_INCREMENT,
  `report_post_id` int(11) DEFAULT NULL,
  `report_submit_by` int(11) DEFAULT NULL,
  `report_date` datetime DEFAULT NULL,
  `report_flag` enum('0','1') DEFAULT '0' COMMENT '0:unread,1:action',
  PRIMARY KEY (`report_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tbl_report` */

LOCK TABLES `tbl_report` WRITE;

UNLOCK TABLES;

/*Table structure for table `tbl_user` */

DROP TABLE IF EXISTS `tbl_user`;

CREATE TABLE `tbl_user` (
  `user_id` int(13) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(50) DEFAULT NULL,
  `user_pwd` varchar(255) DEFAULT NULL,
  `user_email` varchar(150) DEFAULT NULL,
  `user_online` enum('Online','Offline') DEFAULT 'Offline',
  `user_register_date` date DEFAULT NULL,
  `user_last_login` date DEFAULT '0000-00-00',
  `user_avatar` varchar(150) DEFAULT 'default.png',
  `user_status` enum('pending','approved','blocked') DEFAULT 'pending',
  `user_key` varchar(255) DEFAULT NULL,
  `user_type` enum('business','personal') DEFAULT NULL,
  `user_cover` varchar(500) DEFAULT 'default.jpg',
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=66 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_user` */

LOCK TABLES `tbl_user` WRITE;

UNLOCK TABLES;

/*Table structure for table `tbl_user_hobbies` */

DROP TABLE IF EXISTS `tbl_user_hobbies`;

CREATE TABLE `tbl_user_hobbies` (
  `user_hobby_id` int(11) NOT NULL AUTO_INCREMENT,
  `hobby_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`user_hobby_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tbl_user_hobbies` */

LOCK TABLES `tbl_user_hobbies` WRITE;

UNLOCK TABLES;

/*Table structure for table `tbl_video` */

DROP TABLE IF EXISTS `tbl_video`;

CREATE TABLE `tbl_video` (
  `video_id` int(13) NOT NULL AUTO_INCREMENT,
  `user_id` int(13) DEFAULT NULL,
  `video_src` varchar(250) DEFAULT NULL,
  `video_created` datetime DEFAULT NULL,
  PRIMARY KEY (`video_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tbl_video` */

LOCK TABLES `tbl_video` WRITE;

UNLOCK TABLES;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
