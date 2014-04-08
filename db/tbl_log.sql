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
/*Table structure for table `tbl_log` */

DROP TABLE IF EXISTS `tbl_log`;

CREATE TABLE `tbl_log` (
  `id` int(9) NOT NULL AUTO_INCREMENT,
  `log_time` datetime DEFAULT NULL,
  `noti_by_user_id` int(9) DEFAULT NULL,
  `noti_to_user_id` int(9) DEFAULT NULL,
  `log_type` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=97 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_log` */

insert  into `tbl_log`(`id`,`log_time`,`noti_by_user_id`,`noti_to_user_id`,`log_type`) values (33,'2014-04-07 18:35:34',66,67,'photo'),(35,'2014-04-07 18:36:44',66,67,'photo'),(37,'2014-04-07 18:39:26',66,67,'photo'),(39,'2014-04-07 18:39:58',66,67,'photo'),(41,'2014-04-07 18:40:10',66,67,'photo'),(47,'2014-04-07 18:51:32',66,67,'photo'),(48,'2014-04-07 18:52:01',66,67,'photo'),(60,'2014-04-07 19:11:03',66,67,'photo'),(64,'2014-04-07 19:16:19',66,67,'photo'),(67,'2014-04-07 20:26:44',66,67,'photo'),(68,'2014-04-08 10:27:23',66,67,'photo'),(71,'2014-04-08 10:55:36',66,67,'noti'),(93,'2014-04-08 12:32:52',66,67,'noti'),(95,'2014-04-08 12:42:42',66,67,'noti');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
