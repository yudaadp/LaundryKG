/*
SQLyog Ultimate v11.5 (64 bit)
MySQL - 10.1.35-MariaDB : Database - db_laundry
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
/*Table structure for table `mywebs_cash_register` */

DROP TABLE IF EXISTS `mywebs_cash_register`;

CREATE TABLE `mywebs_cash_register` (
  `id` bigint(8) unsigned NOT NULL AUTO_INCREMENT,
  `store_id` int(8) DEFAULT NULL,
  `csh_open_dt` datetime DEFAULT NULL,
  `open_by` varchar(12) DEFAULT NULL,
  `csh_open` decimal(25,2) NOT NULL,
  `csh_sale` decimal(25,2) NOT NULL,
  `csh_adjust` decimal(25,2) NOT NULL,
  `csh_total` decimal(25,2) NOT NULL,
  `csh_close` decimal(25,2) NOT NULL,
  `status` enum('open','closed') DEFAULT NULL,
  `reg_note` varchar(220) DEFAULT NULL,
  `close_by` varchar(12) DEFAULT NULL,
  `csh_close_dt` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=latin1;

/*Data for the table `mywebs_cash_register` */

insert  into `mywebs_cash_register`(`id`,`store_id`,`csh_open_dt`,`open_by`,`csh_open`,`csh_sale`,`csh_adjust`,`csh_total`,`csh_close`,`status`,`reg_note`,`close_by`,`csh_close_dt`) values (16,3,'2017-08-18 18:28:58','yuda','100000.00','0.00','0.00','100000.00','0.00','open',NULL,NULL,NULL),(17,1,'2017-08-18 18:29:34','yuda','100000.00','0.00','0.00','100000.00','0.00','open',NULL,NULL,NULL),(18,5,'2017-08-18 18:59:12','yuda','100000.00','0.00','20000.00','120000.00','0.00','open',NULL,NULL,NULL),(19,5,'2017-08-21 21:21:28','yuda','500000.00','0.00','150000.00','650000.00','0.00','open',NULL,NULL,NULL),(20,1,'2017-08-22 10:34:14','yuda','100000.00','0.00','0.00','100000.00','0.00','open',NULL,NULL,NULL),(21,1,'2017-08-24 18:26:39','yuda','100000.00','0.00','0.00','100000.00','0.00','open',NULL,NULL,NULL),(22,1,'2017-08-25 10:48:43','yuda','100000.00','0.00','100000.00','200000.00','0.00','open',NULL,NULL,NULL),(23,3,'2017-08-25 22:42:43','yuda','100000.00','0.00','300000.00','400000.00','0.00','open',NULL,NULL,NULL),(24,2,'2017-08-27 18:41:20','yuda','100000.00','0.00','200000.00','300000.00','0.00','open',NULL,NULL,NULL),(25,1,'2017-08-30 23:13:18','A000001','100000.00','0.00','100000.00','200000.00','0.00','open',NULL,NULL,NULL),(26,2,'2017-09-03 13:58:55','yuda','100000.00','0.00','0.00','100000.00','0.00','open',NULL,NULL,NULL),(27,2,'2017-09-04 21:48:01','yuda','100000.00','0.00','0.00','100000.00','0.00','open',NULL,NULL,NULL),(28,1,'2017-09-08 10:52:45','yuda','100000.00','0.00','0.00','100000.00','0.00','open',NULL,NULL,NULL),(29,1,'2017-09-10 16:34:46','yuda','200000.00','0.00','0.00','200000.00','0.00','open',NULL,NULL,NULL),(30,1,'2017-09-11 10:52:18','yuda','200000.00','0.00','10000.00','210000.00','0.00','open',NULL,NULL,NULL),(31,2,'2017-09-11 11:23:06','yuda','200000.00','0.00','0.00','200000.00','0.00','open',NULL,NULL,NULL),(32,3,'2017-09-11 11:29:25','yuda','200000.00','0.00','0.00','200000.00','0.00','open',NULL,NULL,NULL),(33,6,'2017-09-11 11:30:24','yuda','200000.00','0.00','0.00','200000.00','0.00','open',NULL,NULL,NULL),(34,1,'2017-09-12 10:45:36','yuda','50000.00','0.00','0.00','50000.00','0.00','open',NULL,NULL,NULL),(35,1,'2017-09-13 17:49:07','yuda','100000.00','0.00','0.00','100000.00','0.00','open',NULL,NULL,NULL),(36,1,'2017-09-17 22:15:45','yuda','100000.00','0.00','0.00','100000.00','0.00','open',NULL,NULL,NULL),(37,1,'2017-09-18 00:39:16','yuda','100.00','0.00','0.00','100.00','0.00','open',NULL,NULL,NULL),(38,1,'2017-09-20 14:00:09','yuda','200000.00','0.00','0.00','200000.00','0.00','open',NULL,NULL,NULL),(39,1,'2017-09-28 21:59:39','yuda','100000.00','0.00','0.00','100000.00','0.00','open',NULL,NULL,NULL),(40,1,'2017-10-05 15:49:56','yuda','1000.00','0.00','0.00','1000.00','0.00','open',NULL,NULL,NULL),(41,2,'2018-08-26 22:02:16','yuda','500000.00','0.00','0.00','500000.00','0.00','open',NULL,NULL,NULL),(42,2,'2019-02-11 11:58:32','yuda','500.00','0.00','0.00','500.00','0.00','open',NULL,NULL,NULL);

/*Table structure for table `mywebs_cash_register_hs` */

DROP TABLE IF EXISTS `mywebs_cash_register_hs`;

CREATE TABLE `mywebs_cash_register_hs` (
  `refid` bigint(8) DEFAULT NULL,
  `store_id` int(8) DEFAULT NULL,
  `csh_before` decimal(25,2) DEFAULT NULL,
  `csh_adjust` decimal(25,2) DEFAULT NULL,
  `createdate` datetime DEFAULT NULL,
  `createby` varchar(12) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `mywebs_cash_register_hs` */

insert  into `mywebs_cash_register_hs`(`refid`,`store_id`,`csh_before`,`csh_adjust`,`createdate`,`createby`) values (16,3,'0.00','100000.00','2017-08-18 18:28:58','yuda'),(17,1,'0.00','100000.00','2017-08-18 18:29:35','yuda'),(18,5,'0.00','100000.00','2017-08-18 18:59:12','yuda'),(18,5,'100000.00','20000.00','2017-08-18 18:59:35','yuda'),(19,5,'0.00','500000.00','2017-08-21 21:21:28','yuda'),(19,5,'500000.00','100000.00','2017-08-21 21:21:44','yuda'),(19,5,'600000.00','50000.00','2017-08-21 21:35:26','yuda'),(20,1,'0.00','100000.00','2017-08-22 10:34:15','yuda'),(21,1,'0.00','100000.00','2017-08-24 18:26:39','yuda'),(22,1,'0.00','100000.00','2017-08-25 10:48:44','yuda'),(22,1,'100000.00','100000.00','2017-08-25 10:48:49','yuda'),(23,3,'0.00','100000.00','2017-08-25 22:42:43','yuda'),(23,3,'100000.00','100000.00','2017-08-25 22:45:02','yuda'),(23,3,'200000.00','200000.00','2017-08-25 23:06:22','yuda'),(24,2,'0.00','100000.00','2017-08-27 18:41:20','yuda'),(24,2,'100000.00','100000.00','2017-08-27 20:35:19','yuda'),(24,2,'200000.00','100000.00','2017-08-27 20:36:48','yuda'),(25,1,'0.00','100000.00','2017-08-30 23:13:18','A000001'),(25,1,'100000.00','100000.00','2017-08-30 23:13:24','A000001'),(26,2,'0.00','100000.00','2017-09-03 13:58:55','yuda'),(27,2,'0.00','100000.00','2017-09-04 21:48:01','yuda'),(28,1,'0.00','100000.00','2017-09-08 10:52:45','yuda'),(29,1,'0.00','200000.00','2017-09-10 16:34:46','yuda'),(30,1,'0.00','200000.00','2017-09-11 10:52:19','yuda'),(31,2,'0.00','200000.00','2017-09-11 11:23:06','yuda'),(32,3,'0.00','200000.00','2017-09-11 11:29:25','yuda'),(33,6,'0.00','200000.00','2017-09-11 11:30:24','yuda'),(30,1,'200000.00','10000.00','2017-09-11 18:21:22','A000001'),(34,1,'0.00','50000.00','2017-09-12 10:45:36','yuda'),(35,1,'0.00','100000.00','2017-09-13 17:49:07','yuda'),(36,1,'0.00','100000.00','2017-09-17 22:15:45','yuda'),(37,1,'0.00','100.00','2017-09-18 00:39:16','yuda'),(38,1,'0.00','200000.00','2017-09-20 14:00:09','yuda'),(39,1,'0.00','100000.00','2017-09-28 21:59:39','yuda'),(40,1,'0.00','1000.00','2017-10-05 15:49:56','yuda'),(41,2,'0.00','500000.00','2018-08-26 22:02:16','yuda'),(42,2,'0.00','500.00','2019-02-11 11:58:32','yuda');

/*Table structure for table `mywebs_combo_items` */

DROP TABLE IF EXISTS `mywebs_combo_items`;

CREATE TABLE `mywebs_combo_items` (
  `id` int(8) unsigned NOT NULL AUTO_INCREMENT,
  `prod_id` bigint(8) DEFAULT NULL,
  `refcode` varchar(50) DEFAULT NULL,
  `qty_val` int(5) DEFAULT NULL,
  `createby` varchar(12) DEFAULT NULL,
  `createdate` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `mywebs_combo_items` */

/*Table structure for table `mywebs_customers` */

DROP TABLE IF EXISTS `mywebs_customers`;

CREATE TABLE `mywebs_customers` (
  `id` int(8) unsigned NOT NULL AUTO_INCREMENT,
  `cust_name` varchar(50) DEFAULT NULL,
  `addrs` varchar(150) DEFAULT NULL,
  `tlp` varchar(15) DEFAULT NULL,
  `createby` varchar(12) DEFAULT NULL,
  `createdate` datetime DEFAULT NULL,
  `last_update` datetime DEFAULT NULL,
  `last_updateby` varchar(12) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `mywebs_customers` */

insert  into `mywebs_customers`(`id`,`cust_name`,`addrs`,`tlp`,`createby`,`createdate`,`last_update`,`last_updateby`) values (1,'Abdul','Binong permai','081321212','yuda','2020-01-01 23:03:25',NULL,NULL);

/*Table structure for table `mywebs_favmenus` */

DROP TABLE IF EXISTS `mywebs_favmenus`;

CREATE TABLE `mywebs_favmenus` (
  `id` int(8) unsigned NOT NULL AUTO_INCREMENT,
  `mn_id` tinyint(5) DEFAULT NULL,
  `createdate` datetime DEFAULT NULL,
  `userid` varchar(12) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=118 DEFAULT CHARSET=latin1;

/*Data for the table `mywebs_favmenus` */

insert  into `mywebs_favmenus`(`id`,`mn_id`,`createdate`,`userid`) values (81,12,'2017-07-24 08:29:09','yuda'),(82,5,'2017-07-24 08:31:54','yuda'),(90,43,'2017-07-24 14:34:42','yuda'),(101,45,'2017-07-26 19:32:23','yuda'),(103,50,'2017-08-03 23:15:02','yuda'),(105,45,'2017-08-16 20:04:23','A000001'),(106,47,'2017-08-16 20:04:32','A000001'),(107,4,'2017-08-18 19:00:04','yuda'),(110,48,'2017-08-26 15:51:00','A000001'),(111,52,'2017-08-27 20:06:03','yuda'),(112,44,'2019-02-11 15:02:32','yuda'),(113,63,'2019-02-11 15:02:35','yuda'),(114,54,'2019-03-04 08:00:51','wahyu'),(115,54,'2019-03-04 08:00:53','wahyu'),(116,54,'2019-03-04 22:11:19','yuda'),(117,54,'2019-03-04 22:11:23','yuda');

/*Table structure for table `mywebs_genparameter` */

DROP TABLE IF EXISTS `mywebs_genparameter`;

CREATE TABLE `mywebs_genparameter` (
  `id` int(8) unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(15) NOT NULL,
  `p_desc` varchar(200) DEFAULT NULL,
  `createdate` datetime DEFAULT NULL,
  `createby` varchar(12) DEFAULT NULL,
  PRIMARY KEY (`id`,`code`),
  UNIQUE KEY `UNIQ` (`code`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

/*Data for the table `mywebs_genparameter` */

insert  into `mywebs_genparameter`(`id`,`code`,`p_desc`,`createdate`,`createby`) values (1,'HTTP_CODE','HTTP Error code','2016-11-11 11:28:20','SYS'),(2,'STD_CH','Standart choice','2016-11-11 12:47:55','SYS'),(3,'TEST','Just test','2016-11-13 22:06:23','yuda'),(4,'ROLES','Role Permission List','2016-11-21 11:33:43','yuda'),(5,'NOT_MODAL','Parameter untuk button non modal','2016-12-06 17:43:08','yuda'),(6,'PYPL_USD_IDR','Rate paypal USD IDR','2016-12-06 22:27:17','yuda'),(7,'TRX_FEE','Free Transaction','2016-12-11 13:01:09','yuda'),(8,'BANK_CD','BANK CODE','2017-01-03 19:39:29','yuda'),(9,'OCC_CD','Kode pekerjaan','2017-05-01 22:08:53','yuda'),(10,'EDU_CD','Kode Pendidikan','2017-05-01 22:13:30','yuda'),(11,'COR_CD','Kode Badan Usaha','2017-05-01 22:18:05','yuda'),(12,'AGAMA','Data agama indonesia','2017-05-07 23:11:42','yuda'),(13,'SUKU','Data suku indonesia','2017-05-07 23:22:29','yuda'),(14,'GENDER','Jenis kelamin','2017-05-09 20:13:41','yuda'),(15,'JUST_VIEW','just view page','2017-05-25 21:02:15','yuda'),(16,'STS_NIKAH','Kode status pernikahan','2017-05-29 10:28:07','yuda'),(17,'ID_TYPE','Tipe id card','2017-05-31 13:37:01','yuda'),(18,'ANK_STS','Status anak','2017-06-01 23:13:47','yuda'),(19,'SYNCH_STEP','Step of synchronization','2017-12-13 17:04:29','yuda'),(20,'ECARD','ELECTRONIK CARD','2018-08-27 11:43:25','yuda'),(21,'TOLLGATE','TOLL GATE NAME','2018-08-27 11:43:52','yuda');

/*Table structure for table `mywebs_genparameter_dtl` */

DROP TABLE IF EXISTS `mywebs_genparameter_dtl`;

CREATE TABLE `mywebs_genparameter_dtl` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `group_cd` varchar(15) DEFAULT NULL,
  `p1` varchar(220) DEFAULT NULL,
  `p2` varchar(220) DEFAULT NULL,
  `p3` varchar(220) DEFAULT NULL,
  `createdate` datetime DEFAULT NULL,
  `createby` varchar(12) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=98 DEFAULT CHARSET=latin1;

/*Data for the table `mywebs_genparameter_dtl` */

insert  into `mywebs_genparameter_dtl`(`id`,`group_cd`,`p1`,`p2`,`p3`,`createdate`,`createby`) values (1,'HTTP_CODE','401','Access denied. Please contact your administrator','1','2016-11-11 11:30:11','SYS'),(2,'HTTP_CODE','403','Forbidden.','1','2016-11-11 11:31:43','SYS'),(3,'HTTP_CODE','404','Not found.','1','2016-11-11 11:31:45','SYS'),(4,'HTTP_CODE','500','Internal server error.','1','2016-11-11 11:31:48','SYS'),(6,'HTTP_CODE','404.0','Mod File or directory not found.','1','2016-11-11 12:20:37','SYS'),(7,'STD_CH','Y','Yes',NULL,'2016-11-11 12:48:27','SYS'),(8,'STD_CH','N','No',NULL,'2016-11-11 12:48:47','SYS'),(9,'HTTP_CODE','1064','Error! Invalid query, SQL syntax error.','1','2016-11-13 13:18:23','SYS'),(10,'HTTP_CODE','201','Success! Row has been created/updated.','0','2016-11-13 14:02:46','SYS'),(11,'HTTP_CODE','400','400 - Bad request. Duplicate data ID.','1','2016-11-20 11:22:25','SYS'),(12,'ROLES','0','na','Not Available','2016-11-21 11:34:47','SYS'),(13,'ROLES','1','dl','Delete','2016-11-21 11:36:09','SYS'),(14,'ROLES','2','vw','View','2016-11-21 11:36:11','SYS'),(15,'ROLES','4','ed','Edit','2016-11-21 11:36:13','SYS'),(16,'ROLES','8','cr','Create','2016-11-21 11:36:14','SYS'),(17,'TEST','test12','test12','test12','2016-11-21 14:34:01','yuda'),(18,'HTTP_CODE','401.1','Invalid user/password, plase try again.','1','2016-11-22 13:02:14','yuda'),(19,'HTTP_CODE','403.1','Mod is not active!','1','2016-11-23 13:01:06','yuda'),(20,'HTTP_CODE','201.1','Success! Session has been killed','0','2016-11-29 17:18:16','yuda'),(21,'NOT_MODAL','create','my-notes','button create','2016-12-06 17:43:45','yuda'),(22,'TRX_FEE','BUY_FEE','1.00','','2016-12-11 13:01:47','yuda'),(23,'TRX_FEE','SELL_FEE','1.00','','2016-12-11 13:01:59','yuda'),(24,'HTTP_CODE','401.2','Order denied. You cannot do this transaction.','1','2016-12-12 11:58:01','yuda'),(25,'BANK_CD','BCA','BCA','Y','2017-01-03 19:40:15','yuda'),(26,'BANK_CD','MNDR','Mandiri','Y','2017-01-03 19:40:43','yuda'),(27,'OCC_CD','001','Accounting/Finance Officer','','2017-05-01 22:10:15','yuda'),(28,'OCC_CD','002','Customer service','','2017-05-01 22:10:33','yuda'),(29,'OCC_CD','003','Engineering','','2017-05-01 22:10:47','yuda'),(30,'OCC_CD','004','Eksekutif','','2017-05-01 22:11:17','yuda'),(31,'OCC_CD','005','Administrasi umum','','2017-05-01 22:11:37','yuda'),(32,'OCC_CD','006','Teknologi Informasi','','2017-05-01 22:11:48','yuda'),(33,'OCC_CD','007','Konsultan/Analis','','2017-05-01 22:12:05','yuda'),(34,'OCC_CD','008','Marketing','','2017-05-01 22:12:20','yuda'),(35,'OCC_CD','009','Pengajar (Guru, Dosen)','','2017-05-01 22:12:47','yuda'),(36,'OCC_CD','010','Militer','','2017-05-01 22:13:06','yuda'),(37,'EDU_CD','00','N/A','','2017-05-01 22:14:26','yuda'),(38,'EDU_CD','01','SD','','2017-05-01 22:14:37','yuda'),(39,'EDU_CD','02','SMP','','2017-05-01 22:14:45','yuda'),(40,'EDU_CD','03','SMA/SMK/SMU','','2017-05-01 22:15:11','yuda'),(41,'EDU_CD','04','D-1','Diploma 1','2017-05-01 22:15:44','yuda'),(42,'EDU_CD','05','D-2','Diploma 2','2017-05-01 22:15:58','yuda'),(43,'EDU_CD','06','D-3','Diploma 3','2017-05-01 22:16:14','yuda'),(44,'EDU_CD','07','S-1','','2017-05-01 22:16:41','yuda'),(45,'EDU_CD','08','S-2','','2017-05-01 22:16:59','yuda'),(46,'COR_CD','01','Badan Usaha Unit Desa (BUUD)','','2017-05-01 22:18:31','yuda'),(47,'COR_CD','02','Commanditer Venotschap (CV)','','2017-05-01 22:19:22','yuda'),(48,'COR_CD','03','Debitur Kelompok','','2017-05-01 22:19:47','yuda'),(49,'COR_CD','04','Ekspedisi Muatan Kapal Laut (EMKL)','','2017-05-01 22:20:06','yuda'),(50,'COR_CD','05','FIRMA','','2017-05-01 22:20:18','yuda'),(51,'HTTP_CODE','500.1','Internal server error - Upload Failed','1','2017-05-02 19:33:18','yuda'),(52,'HTTP_CODE','415','Unsupported Media Type','1','2017-05-02 19:34:54','yuda'),(53,'HTTP_CODE','408','Request Timeout','1','2017-05-02 19:36:41','yuda'),(54,'PROV','Banten','Kab. Tangerang','Curug','2017-05-07 23:12:52','yuda'),(55,'PROV','Banten','Tangerang Selatan','Serpong','2017-05-07 23:13:38','yuda'),(56,'AGAMA','Budha','Budha','-','2017-05-07 23:21:02','yuda'),(57,'AGAMA','Hindu','Hindu','-','2017-05-07 23:21:16','yuda'),(58,'AGAMA','Islam','Islam','-','2017-05-07 23:21:28','yuda'),(59,'AGAMA','Katolik','Katolik','-','2017-05-07 23:21:39','yuda'),(60,'AGAMA','Kristen','Kristen','-','2017-05-07 23:21:49','yuda'),(61,'SUKU','Jawa','Suku Jawa','','2017-05-07 23:22:47','yuda'),(62,'SUKU','Tionghoa','Suku Tionghoa, Chinese','','2017-05-07 23:23:05','yuda'),(63,'SUKU','Batak','Suku Batak','','2017-05-07 23:23:17','yuda'),(64,'GENDER','P','Pria','-','2017-05-09 20:13:59','yuda'),(65,'GENDER','W','Wanita','-','2017-05-09 20:14:10','yuda'),(66,'JUST_VIEW','inq-umat','-','-','2017-05-25 21:02:52','yuda'),(67,'STS_NIKAH','KKK','Katolik - Katolik','-','2017-05-29 10:28:54','yuda'),(68,'STS_NIKAH','AAB','Katolik - Budha','-','2017-05-29 10:29:16','yuda'),(69,'STS_NIKAH','CSS','Catatan Sipil','-','2017-05-29 10:29:34','yuda'),(70,'STS_NIKAH','AAK','Katolik - Kristen','-','2017-05-29 10:29:51','yuda'),(71,'STS_NIKAH','AAI','Katolik - Islam','-','2017-05-29 10:30:06','yuda'),(72,'STS_NIKAH','BM','Belum Menikah','-','2017-05-29 10:30:24','yuda'),(73,'STS_NIKAH','KKL','Katolik - Lain- lain','-','2017-05-29 10:30:46','yuda'),(74,'STS_NIKAH','AAH','Katolik - Hindu','-','2017-05-29 10:31:40','yuda'),(75,'STS_NIKAH','SGP','Janda/Duda','-','2017-05-29 10:31:55','yuda'),(76,'ID_TYPE','KTP','KTP','-','2017-05-31 13:37:20','yuda'),(77,'ID_TYPE','SIM','SIM','-','2017-05-31 13:37:29','yuda'),(78,'ANK_STS','1','Anak Ke 1','-','2017-06-01 23:14:08','yuda'),(79,'ANK_STS','2','Anak ke 2','-','2017-06-01 23:14:19','yuda'),(80,'ANK_STS','3','Anak ke 3','-','2017-06-01 23:14:33','yuda'),(81,'ANK_STS','4','Anak ke 4','-','2017-06-01 23:21:41','yuda'),(82,'ANK_STS','5','Anak ke 5','-','2017-06-01 23:21:52','yuda'),(83,'JUST_VIEW','mutasi-kk-print','-','-','2017-06-09 13:24:29','yuda'),(84,'JUST_VIEW','mutasi-kk-in','-','-','2017-06-11 18:30:34','yuda'),(85,'NOT_MODAL','create','productsxxxxxxx','button create','2017-07-22 20:46:50','yuda'),(86,'NOT_MODAL','create','sales','button create','2017-08-11 22:19:30','yuda'),(87,'HTTP_CODE','100','Before you made a sales transaction, please create cash register first.','1','2017-08-12 14:04:47','yuda'),(88,'NOT_MODAL','create','purchase','button create','2017-08-24 19:02:22','yuda'),(89,'NOT_MODAL','create','laundry','button create','2017-09-03 15:32:27','yuda'),(90,'JUST_VIEW','settings','-','-','2017-09-06 17:43:19','yuda'),(91,'SYNCH_STEP','1','synch_template','-','2017-12-13 17:05:14','yuda'),(92,'SYNCH_STEP','2','synch_store','-','2017-12-13 17:05:29','yuda'),(93,'SYNCH_STEP','3','synch_items','-','2017-12-13 17:05:46','yuda'),(94,'SYNCH_STEP','4','synch_sales','-','2017-12-14 13:59:13','yuda'),(95,'SYNCH_STEP','5','synch_sales_id_items','-','2017-12-14 15:45:50','yuda'),(96,'ECARD','BCA','123456789012','100000','2018-08-27 11:43:40','yuda'),(97,'TOLLGATE','KUNCIRAN 1','OUT','7000','2018-08-27 11:44:51','yuda');

/*Table structure for table `mywebs_level` */

DROP TABLE IF EXISTS `mywebs_level`;

CREATE TABLE `mywebs_level` (
  `id` int(5) unsigned NOT NULL AUTO_INCREMENT,
  `level_name` varchar(15) DEFAULT NULL,
  `level_desc` varchar(30) DEFAULT NULL,
  `create_date` datetime DEFAULT NULL,
  `create_by` varchar(12) DEFAULT NULL,
  `sts` enum('Y','N') DEFAULT NULL,
  `updateby` varchar(12) DEFAULT NULL,
  `lastupdate` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

/*Data for the table `mywebs_level` */

insert  into `mywebs_level`(`id`,`level_name`,`level_desc`,`create_date`,`create_by`,`sts`,`updateby`,`lastupdate`) values (1,'super user','administrator','2016-10-31 10:49:27','SYS','Y','yuda','2017-08-26 14:28:09');

/*Table structure for table `mywebs_logs` */

DROP TABLE IF EXISTS `mywebs_logs`;

CREATE TABLE `mywebs_logs` (
  `errcode` varchar(12) NOT NULL,
  `p1` text,
  `p2` text,
  `p3` text,
  `createdate` datetime DEFAULT NULL,
  `createby` varchar(12) DEFAULT NULL,
  PRIMARY KEY (`errcode`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `mywebs_logs` */

insert  into `mywebs_logs`(`errcode`,`p1`,`p2`,`p3`,`createdate`,`createby`) values ('SQL000001','INSERT INTO mywebs_modul SET mn_id=1, mod=\'Level Access\', mod_name=\'level\', mod_detail=\'Manage level access\', mod_location=\'system/level\', set_order=1, create_date=NOW(), create_by=\'yuda\'','Error No: 0 - MySQL error You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near \'mod=\'Level Access\', mod_name=\'level\', mod_detail=\'Manage level access\', mod_loca\' at line 1',NULL,'2016-11-13 00:00:00','yuda');

/*Table structure for table `mywebs_logs_cnf` */

DROP TABLE IF EXISTS `mywebs_logs_cnf`;

CREATE TABLE `mywebs_logs_cnf` (
  `id` int(8) unsigned NOT NULL AUTO_INCREMENT,
  `mod` varchar(35) DEFAULT NULL,
  `createby` varchar(12) DEFAULT NULL,
  `createdate` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ` (`mod`)
) ENGINE=InnoDB AUTO_INCREMENT=56 DEFAULT CHARSET=latin1;

/*Data for the table `mywebs_logs_cnf` */

insert  into `mywebs_logs_cnf`(`id`,`mod`,`createby`,`createdate`) values (18,'mod_logs','yuda','2017-07-28 18:44:26'),(20,'role','yuda','2017-07-28 18:45:44'),(29,'settings','yuda','2017-07-29 20:22:40'),(32,'menu','yuda','2017-07-30 13:47:35'),(33,'users','yuda','2017-07-30 13:47:44'),(34,'mods','yuda','2017-07-30 13:47:52'),(35,'level','yuda','2017-07-30 13:47:56'),(36,'genparameter','yuda','2017-07-30 13:48:10'),(37,'fav-menu','yuda','2017-07-30 16:02:52'),(38,'genparameterlist','yuda','2017-07-30 16:02:58'),(39,'reports','yuda','2017-07-30 16:03:05'),(40,'stores','yuda','2017-07-30 16:03:13'),(41,'other-expenses','yuda','2017-08-02 16:06:43'),(42,'sales','yuda','2017-08-02 16:06:52'),(43,'about-us','yuda','2017-08-03 23:13:35'),(45,'products','yuda','2017-08-06 22:31:59'),(46,'cash-register','yuda','2017-08-10 17:28:32'),(50,'fake-store','yuda','2017-09-03 13:04:43'),(51,'fake-product','yuda','2017-09-03 15:48:25'),(52,'laundry','yuda','2017-09-03 15:48:33'),(53,'customers','yuda','2017-09-08 21:11:14'),(54,'fake-transport','yuda','2017-11-02 16:06:58'),(55,'my-notes','yuda','2017-11-04 22:28:25');

/*Table structure for table `mywebs_menu` */

DROP TABLE IF EXISTS `mywebs_menu`;

CREATE TABLE `mywebs_menu` (
  `menuID` tinyint(3) NOT NULL AUTO_INCREMENT,
  `menu` varchar(30) NOT NULL,
  `url` varchar(50) DEFAULT NULL,
  `class` varchar(30) DEFAULT NULL,
  `aktif` enum('Y','N') DEFAULT NULL,
  `set_order` tinyint(3) NOT NULL,
  PRIMARY KEY (`menuID`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;

/*Data for the table `mywebs_menu` */

insert  into `mywebs_menu`(`menuID`,`menu`,`url`,`class`,`aktif`,`set_order`) values (1,'System Settings','#','fa fa-gears fa-fw','Y',99),(2,'home','home.php','fa fa-windows fa-fw','Y',0),(3,'logout','?method=logout','fa fa-power-off fa-fw','Y',127),(7,'master','#','fa fa-tasks fa-fw','Y',1),(16,'General Settings','#','fa fa-gear fa-fw','Y',98),(17,'My Account','#','fa fa-user fa-fw','Y',1),(21,'mypos','#','fa fa-laptop fa-fw','Y',126),(23,'Transaksi','#','fa fa-shopping-cart fa-fw','Y',2);

/*Table structure for table `mywebs_mod_update` */

DROP TABLE IF EXISTS `mywebs_mod_update`;

CREATE TABLE `mywebs_mod_update` (
  `id` int(8) unsigned NOT NULL AUTO_INCREMENT,
  `refid` int(8) DEFAULT NULL,
  `upd_files` varchar(100) DEFAULT NULL,
  `upd_note` text,
  `last_update` datetime DEFAULT NULL,
  `last_updateby` varchar(12) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `mywebs_mod_update` */

/*Table structure for table `mywebs_modul` */

DROP TABLE IF EXISTS `mywebs_modul`;

CREATE TABLE `mywebs_modul` (
  `id` int(8) unsigned NOT NULL AUTO_INCREMENT,
  `mn_id` tinyint(3) DEFAULT NULL,
  `mod` varchar(35) NOT NULL COMMENT 'nama mod untuk menu',
  `mod_name` varchar(35) NOT NULL COMMENT 'nama folder mod',
  `mod_detail` varchar(100) NOT NULL COMMENT 'desktipsi mod',
  `mod_location` varchar(100) NOT NULL COMMENT 'lokasi mod',
  `mod_type` enum('P','S') DEFAULT 'P',
  `parent` varchar(35) DEFAULT NULL,
  `sts` enum('Y','N') NOT NULL DEFAULT 'Y',
  `show` enum('Y','N') DEFAULT 'Y',
  `set_order` tinyint(5) DEFAULT NULL,
  `create_date` datetime DEFAULT NULL,
  `create_by` varchar(12) DEFAULT NULL,
  `last_update` datetime DEFAULT NULL,
  `last_update_by` varchar(12) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=65 DEFAULT CHARSET=latin1;

/*Data for the table `mywebs_modul` */

insert  into `mywebs_modul`(`id`,`mn_id`,`mod`,`mod_name`,`mod_detail`,`mod_location`,`mod_type`,`parent`,`sts`,`show`,`set_order`,`create_date`,`create_by`,`last_update`,`last_update_by`) values (1,1,'menu','menu','menu','system/menu','P',NULL,'Y','Y',0,'2016-10-31 11:23:15','SYS','2017-05-16 17:24:42','yuda'),(2,7,'Users','users','Users','users','P',NULL,'Y','Y',1,'2016-10-31 11:21:31','SYS','2020-01-01 22:05:33','yuda'),(3,1,'modul management','mods','Modul Management','system/mods','P',NULL,'Y','Y',1,'2016-10-31 11:24:50','SYS','2016-11-13 17:52:15','yuda'),(4,1,'Roles','level','Manage Roles','system/level','P',NULL,'Y','Y',2,'2016-11-13 00:00:00','yuda','2020-01-01 22:47:10','yuda'),(5,1,'General Parameter','genparameter','General parameter group','system/genparameter','P',NULL,'Y','Y',3,'2016-11-13 13:28:09','yuda','2016-11-13 21:18:04','yuda'),(6,1,'role &amp; permissions','role','Setup Role &amp; Permission','system/role','S','level','Y','N',1,'2016-11-13 21:01:13','yuda','2016-11-26 19:41:00','yuda'),(7,1,'Parameter List','genparameterlist','Parameter List','system/genparameterlist','S','genparameter','Y','N',1,'2016-11-13 21:39:59','yuda',NULL,NULL),(11,1,'App Config','settings','App Configuration','system/settings','P',NULL,'Y','Y',10,'2016-11-20 11:58:08','yuda','2020-01-01 22:08:47','yuda'),(12,16,'My Favorites Menu','fav-menu','My Favorites Menu','system/fav-menu','P',NULL,'Y','Y',1,'2016-11-22 15:09:56','yuda','2017-08-27 19:13:56','yuda'),(31,20,'laporan','laporan','Laporan','laporan','P',NULL,'Y','Y',1,'2017-05-14 17:00:22','yuda',NULL,NULL),(32,20,'print','print','Print data','print','P',NULL,'Y','Y',1,'2017-05-14 17:01:09','yuda',NULL,NULL),(34,1,'report management','reports','report management','system/reports','P',NULL,'Y','Y',1,'2017-06-05 18:34:59','yuda',NULL,NULL),(35,7,'report access','rpt_access','report access management','system/rpt_access','S','level','Y','N',3,'2017-06-05 18:54:19','yuda',NULL,NULL),(44,21,'contact us','contact-us','contact us','system/mypos','P',NULL,'Y','Y',1,'2017-07-08 15:39:16','yuda','2017-07-08 16:05:10','yuda'),(45,21,'about us','about-us','about us','system/mypos','P',NULL,'Y','Y',2,'2017-07-08 15:45:47','yuda','2017-07-08 16:04:51','yuda'),(46,14,'sale transaction','sales','sale transaction list','sales','P',NULL,'Y','Y',2,'2017-07-14 16:43:58','yuda','2017-07-14 19:30:14','yuda'),(47,14,'cash register','cash-register','cash register','cash-register','P',NULL,'Y','Y',1,'2017-07-14 19:03:33','yuda',NULL,NULL),(50,24,'logs config','mod_logs','modul logs config','system/mod_logs','P',NULL,'Y','Y',3,'2017-07-26 23:45:09','yuda','2017-11-04 22:35:43','yuda'),(53,7,'Customers','customers','Customers','customers','P',NULL,'Y','Y',1,'2017-08-31 23:53:53','yuda','2020-01-01 22:13:59','yuda'),(54,23,'laundry','laundry','laundry','laundry','P',NULL,'Y','Y',1,'2017-08-31 23:54:30','yuda','2020-01-01 22:14:50','yuda'),(55,7,'Products','products','Products','products','P',NULL,'Y','Y',1,'2017-08-31 23:55:11','yuda','2020-01-01 22:04:56','yuda'),(57,1,'printer','printer','printer','system/printer','P',NULL,'Y','Y',6,'2017-09-06 14:56:53','yuda','2020-01-01 22:07:35','yuda'),(63,24,'deploy &amp; update','mod-deployment','deploy &amp; update','system/mod-deployment','P',NULL,'Y','Y',1,'2017-11-04 22:34:14','yuda','2017-11-04 22:35:32','yuda'),(64,23,'pengeluaran','pengeluaran','pengeluaran','pengeluaran','P',NULL,'Y','Y',2,'2020-01-02 00:29:43','yuda','2020-01-02 00:30:33','yuda');

/*Table structure for table `mywebs_modul_role` */

DROP TABLE IF EXISTS `mywebs_modul_role`;

CREATE TABLE `mywebs_modul_role` (
  `id` int(5) unsigned NOT NULL AUTO_INCREMENT,
  `lid` int(5) DEFAULT NULL,
  `mid` int(5) DEFAULT NULL,
  `gid` int(5) DEFAULT NULL,
  `sts` enum('1','0') DEFAULT '0' COMMENT '0=yes;1=no',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=685 DEFAULT CHARSET=latin1;

/*Data for the table `mywebs_modul_role` */

insert  into `mywebs_modul_role`(`id`,`lid`,`mid`,`gid`,`sts`) values (1,1,1,3,'0'),(2,1,2,3,'0'),(3,1,3,3,'0'),(4,1,4,3,'0'),(5,1,5,3,'0'),(6,1,6,3,'0'),(7,1,7,3,'0'),(12,2,1,8,'1'),(13,2,2,3,'0'),(14,2,3,8,'1'),(15,2,4,8,'1'),(16,2,5,8,'1'),(17,2,6,8,'1'),(18,2,7,8,'1'),(27,1,11,3,'0'),(28,2,11,2,'0'),(89,1,12,3,'0'),(90,2,12,3,'0'),(149,1,22,3,'0'),(150,2,22,3,'0'),(245,1,31,3,'0'),(246,2,31,3,'0'),(248,1,32,3,'0'),(249,2,32,3,'0'),(252,1,34,3,'0'),(253,2,34,8,'1'),(255,1,35,3,'0'),(256,2,35,8,'1'),(274,1,42,3,'0'),(275,2,42,8,'1'),(277,1,43,3,'0'),(278,2,43,8,'1'),(280,1,44,7,'0'),(281,2,44,7,'0'),(283,1,45,7,'0'),(284,2,45,7,'0'),(285,1,46,3,'0'),(286,2,46,3,'0'),(288,1,47,3,'0'),(289,2,47,3,'0'),(291,1,48,3,'0'),(292,2,48,3,'0'),(294,1,49,3,'0'),(295,2,49,3,'0'),(296,1,50,3,'0'),(297,2,50,8,'1'),(299,3,1,8,'1'),(300,3,2,8,'1'),(301,3,3,8,'1'),(302,3,4,8,'1'),(303,3,5,8,'1'),(304,3,6,8,'1'),(305,3,7,8,'1'),(306,3,11,8,'1'),(307,3,12,8,'1'),(308,3,14,8,'1'),(309,3,15,8,'1'),(310,3,22,8,'1'),(311,3,31,8,'1'),(312,3,32,8,'1'),(313,3,34,8,'1'),(314,3,35,8,'1'),(315,3,42,8,'1'),(316,3,43,8,'1'),(317,3,44,7,'0'),(318,3,45,7,'0'),(319,3,46,8,'1'),(320,3,47,8,'1'),(321,3,48,8,'1'),(322,3,49,8,'1'),(323,3,50,8,'1'),(330,4,1,8,'1'),(331,4,2,8,'1'),(332,4,3,8,'1'),(333,4,4,8,'1'),(334,4,5,8,'1'),(335,4,6,8,'1'),(336,4,7,8,'1'),(337,4,11,8,'1'),(338,4,12,8,'1'),(339,4,14,8,'1'),(340,4,15,8,'1'),(341,4,22,8,'1'),(342,4,31,8,'1'),(343,4,32,8,'1'),(344,4,34,8,'1'),(345,4,35,8,'1'),(346,4,42,8,'1'),(347,4,43,8,'1'),(348,4,44,7,'0'),(349,4,45,7,'0'),(350,4,46,8,'1'),(351,4,47,8,'1'),(352,4,48,8,'1'),(353,4,49,8,'1'),(354,4,50,8,'1'),(361,5,1,8,'1'),(362,5,2,8,'1'),(363,5,3,8,'1'),(364,5,4,8,'1'),(365,5,5,8,'1'),(366,5,6,8,'1'),(367,5,7,8,'1'),(368,5,11,8,'1'),(369,5,12,8,'1'),(370,5,14,8,'1'),(371,5,15,8,'1'),(372,5,22,8,'1'),(373,5,31,8,'1'),(374,5,32,8,'1'),(375,5,34,8,'1'),(376,5,35,8,'1'),(377,5,42,8,'1'),(378,5,43,8,'1'),(379,5,44,7,'0'),(380,5,45,7,'0'),(381,5,46,8,'1'),(382,5,47,8,'1'),(383,5,48,8,'1'),(384,5,49,8,'1'),(385,5,50,8,'1'),(392,6,1,8,'1'),(393,6,2,1,'0'),(394,6,3,8,'1'),(395,6,4,8,'1'),(396,6,5,8,'1'),(397,6,6,8,'1'),(398,6,7,8,'1'),(399,6,11,8,'1'),(400,6,12,3,'0'),(401,6,14,8,'1'),(402,6,15,8,'1'),(403,6,22,8,'1'),(404,6,31,8,'1'),(405,6,32,8,'1'),(406,6,34,8,'1'),(407,6,35,8,'1'),(408,6,42,8,'1'),(409,6,43,8,'1'),(410,6,44,7,'0'),(411,6,45,7,'0'),(412,6,46,8,'1'),(413,6,47,8,'1'),(414,6,48,8,'1'),(415,6,49,8,'1'),(416,6,50,8,'1'),(423,7,1,8,'1'),(424,7,2,8,'1'),(425,7,3,8,'1'),(426,7,4,8,'1'),(427,7,5,8,'1'),(428,7,6,8,'1'),(429,7,7,8,'1'),(430,7,11,8,'1'),(431,7,12,3,'0'),(432,7,14,8,'1'),(433,7,15,8,'1'),(434,7,22,8,'1'),(435,7,31,8,'1'),(436,7,32,8,'1'),(437,7,34,8,'1'),(438,7,35,8,'1'),(439,7,42,8,'1'),(440,7,43,8,'1'),(441,7,44,7,'0'),(442,7,45,7,'0'),(443,7,46,8,'1'),(444,7,47,8,'1'),(445,7,48,8,'1'),(446,7,49,8,'1'),(447,7,50,8,'1'),(454,8,1,8,'1'),(455,8,2,8,'1'),(456,8,3,8,'1'),(457,8,4,8,'1'),(458,8,5,8,'1'),(459,8,6,8,'1'),(460,8,7,8,'1'),(461,8,11,8,'1'),(462,8,12,8,'1'),(463,8,14,8,'1'),(464,8,15,8,'1'),(465,8,22,8,'1'),(466,8,31,8,'1'),(467,8,32,8,'1'),(468,8,34,8,'1'),(469,8,35,8,'1'),(470,8,42,8,'1'),(471,8,43,8,'1'),(472,8,44,7,'0'),(473,8,45,7,'0'),(474,8,46,8,'1'),(475,8,47,8,'1'),(476,8,48,8,'1'),(477,8,49,8,'1'),(478,8,50,8,'1'),(485,9,1,8,'1'),(486,9,2,8,'1'),(487,9,3,8,'1'),(488,9,4,8,'1'),(489,9,5,8,'1'),(490,9,6,8,'1'),(491,9,7,8,'1'),(492,9,11,8,'1'),(493,9,12,8,'1'),(494,9,14,8,'1'),(495,9,15,8,'1'),(496,9,22,8,'1'),(497,9,31,8,'1'),(498,9,32,8,'1'),(499,9,34,8,'1'),(500,9,35,8,'1'),(501,9,42,8,'1'),(502,9,43,8,'1'),(503,9,44,7,'0'),(504,9,45,7,'0'),(505,9,46,8,'1'),(506,9,47,8,'1'),(507,9,48,8,'1'),(508,9,49,8,'1'),(509,9,50,8,'1'),(516,10,1,8,'1'),(517,10,2,8,'1'),(518,10,3,8,'1'),(519,10,4,8,'1'),(520,10,5,8,'1'),(521,10,6,8,'1'),(522,10,7,8,'1'),(523,10,11,8,'1'),(524,10,12,8,'1'),(525,10,14,8,'1'),(526,10,15,8,'1'),(527,10,22,8,'1'),(528,10,31,8,'1'),(529,10,32,8,'1'),(530,10,34,8,'1'),(531,10,35,8,'1'),(532,10,42,8,'1'),(533,10,43,8,'1'),(534,10,44,7,'0'),(535,10,45,7,'0'),(536,10,46,8,'1'),(537,10,47,8,'1'),(538,10,48,8,'1'),(539,10,49,8,'1'),(540,10,50,8,'1'),(547,11,1,8,'1'),(548,11,2,8,'1'),(549,11,3,8,'1'),(550,11,4,8,'1'),(551,11,5,8,'1'),(552,11,6,8,'1'),(553,11,7,8,'1'),(554,11,11,8,'1'),(555,11,12,8,'1'),(556,11,14,8,'1'),(557,11,15,8,'1'),(558,11,22,8,'1'),(559,11,31,8,'1'),(560,11,32,8,'1'),(561,11,34,8,'1'),(562,11,35,8,'1'),(563,11,42,8,'1'),(564,11,43,8,'1'),(565,11,44,7,'0'),(566,11,45,7,'0'),(567,11,46,8,'1'),(568,11,47,8,'1'),(569,11,48,8,'1'),(570,11,49,8,'1'),(571,11,50,8,'1'),(572,1,51,3,'0'),(573,2,51,8,'1'),(574,3,51,8,'1'),(575,4,51,8,'1'),(579,5,51,8,'1'),(580,6,51,8,'1'),(581,1,52,3,'0'),(582,2,52,8,'1'),(583,3,52,8,'1'),(584,6,52,8,'1'),(588,1,53,3,'0'),(589,2,53,8,'1'),(590,3,53,8,'1'),(591,6,53,3,'0'),(595,1,54,3,'0'),(596,2,54,8,'1'),(597,3,54,8,'1'),(598,6,54,3,'0'),(602,1,55,3,'0'),(603,2,55,8,'1'),(604,3,55,8,'1'),(605,6,55,3,'0'),(609,1,56,3,'0'),(610,2,56,8,'1'),(611,3,56,8,'1'),(612,6,56,7,'0'),(616,1,57,3,'0'),(617,2,57,8,'1'),(618,3,57,8,'1'),(619,6,57,8,'1'),(620,1,58,3,'0'),(621,2,58,8,'1'),(622,3,58,8,'1'),(623,6,58,8,'1'),(624,1,59,3,'0'),(625,2,59,8,'1'),(626,3,59,8,'1'),(627,6,59,7,'0'),(631,1,60,3,'0'),(632,2,60,8,'1'),(633,3,60,8,'1'),(634,6,60,3,'0'),(638,1,61,3,'0'),(639,2,61,8,'1'),(640,3,61,8,'1'),(641,6,61,8,'1'),(645,1,62,3,'0'),(646,2,62,8,'1'),(647,3,62,8,'1'),(648,6,62,8,'1'),(652,1,63,3,'0'),(653,2,63,8,'1'),(654,3,63,8,'1'),(655,6,63,8,'1'),(656,7,51,8,'1'),(657,7,52,8,'1'),(658,7,53,3,'0'),(659,7,54,3,'0'),(660,7,55,3,'0'),(661,7,56,3,'0'),(662,7,57,3,'0'),(663,7,58,3,'0'),(664,7,59,8,'1'),(665,7,60,3,'0'),(666,7,61,8,'1'),(667,7,62,8,'1'),(668,7,63,8,'1'),(671,8,51,8,'1'),(672,8,52,8,'1'),(673,8,53,8,'1'),(674,8,54,8,'1'),(675,8,55,8,'1'),(676,8,56,8,'1'),(677,8,57,8,'1'),(678,8,58,8,'1'),(679,8,59,8,'1'),(680,8,60,8,'1'),(681,8,61,8,'1'),(682,8,62,8,'1'),(683,8,63,8,'1'),(684,1,64,3,'0');

/*Table structure for table `mywebs_payments` */

DROP TABLE IF EXISTS `mywebs_payments`;

CREATE TABLE `mywebs_payments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sale_id` int(11) DEFAULT NULL,
  `cust_id` int(11) DEFAULT NULL,
  `store_id` int(8) NOT NULL,
  `paydate` datetime DEFAULT NULL,
  `paid_by` varchar(20) NOT NULL,
  `cheque_no` varchar(20) DEFAULT NULL,
  `cc_no` varchar(20) DEFAULT NULL,
  `cc_holder` varchar(25) DEFAULT NULL,
  `cc_month` varchar(2) DEFAULT NULL,
  `cc_year` varchar(4) DEFAULT NULL,
  `cc_type` varchar(20) DEFAULT NULL,
  `amount` decimal(25,2) NOT NULL,
  `currency` varchar(3) DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `attachment` varchar(55) DEFAULT NULL,
  `note` varchar(1000) DEFAULT NULL,
  `pos_paid` decimal(25,2) DEFAULT '0.00',
  `pos_balance` decimal(25,2) DEFAULT '0.00',
  `gc_no` varchar(20) DEFAULT NULL,
  `reference` varchar(50) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

/*Data for the table `mywebs_payments` */

insert  into `mywebs_payments`(`id`,`sale_id`,`cust_id`,`store_id`,`paydate`,`paid_by`,`cheque_no`,`cc_no`,`cc_holder`,`cc_month`,`cc_year`,`cc_type`,`amount`,`currency`,`created_by`,`attachment`,`note`,`pos_paid`,`pos_balance`,`gc_no`,`reference`,`updated_by`,`updated_at`) values (1,1,1,1,'2017-07-14 17:02:11','cash','','','','','','','1050.00',NULL,1,NULL,'','1050.00','0.00','',NULL,NULL,NULL);

/*Table structure for table `mywebs_permission` */

DROP TABLE IF EXISTS `mywebs_permission`;

CREATE TABLE `mywebs_permission` (
  `bit` int(10) NOT NULL,
  `bit_cd` varchar(3) DEFAULT NULL,
  `bit_name` varchar(30) NOT NULL,
  `create_date` datetime DEFAULT NULL,
  `create_by` varchar(12) DEFAULT NULL,
  PRIMARY KEY (`bit`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `mywebs_permission` */

insert  into `mywebs_permission`(`bit`,`bit_cd`,`bit_name`,`create_date`,`create_by`) values (0,'na','not allowed','2016-11-20 09:46:08','SYS'),(1,'dl','delete','2016-10-31 11:25:46','SYS'),(2,'vw','view','2016-10-31 11:25:49','SYS'),(4,'ed','edit','2016-10-31 11:25:50','SYS'),(8,'cr','create','2016-10-31 11:25:52','SYS');

/*Table structure for table `mywebs_permission_group` */

DROP TABLE IF EXISTS `mywebs_permission_group`;

CREATE TABLE `mywebs_permission_group` (
  `groupid` int(5) unsigned NOT NULL AUTO_INCREMENT,
  `role` int(5) DEFAULT NULL,
  `createdate` datetime DEFAULT NULL,
  `createby` varchar(12) DEFAULT 'SYS',
  PRIMARY KEY (`groupid`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

/*Data for the table `mywebs_permission_group` */

insert  into `mywebs_permission_group`(`groupid`,`role`,`createdate`,`createby`) values (1,10,'2016-11-19 10:21:54','SYS'),(2,14,'2016-11-19 10:21:56','SYS'),(3,15,'2016-11-19 10:21:58','SYS'),(6,6,'2016-11-20 09:35:42','SYS'),(7,2,'2016-11-20 09:36:11','SYS'),(8,0,'2016-11-20 09:45:11','SYS');

/*Table structure for table `mywebs_printer` */

DROP TABLE IF EXISTS `mywebs_printer`;

CREATE TABLE `mywebs_printer` (
  `id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `printer_name` varchar(50) DEFAULT NULL,
  `type` varchar(25) DEFAULT 'windows',
  `profile` varchar(25) DEFAULT 'default',
  `max_char_line` tinyint(3) DEFAULT NULL,
  `printer_path` varchar(250) DEFAULT NULL,
  `ip_addrs` varchar(45) DEFAULT NULL,
  `port` varchar(10) DEFAULT NULL,
  `createby` varchar(12) DEFAULT NULL,
  `createdate` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `mywebs_printer` */

insert  into `mywebs_printer`(`id`,`printer_name`,`type`,`profile`,`max_char_line`,`printer_path`,`ip_addrs`,`port`,`createby`,`createdate`) values (1,'POS58','windows','default',30,'smb://S-201407017/POS58BT','192.168.1.1','8080',NULL,NULL),(2,'ZJ58','windows','default',30,'smb://S-201407017/ZJ58','-','-',NULL,NULL),(3,'GP80','windows','default',32,'smb://S-201407017/GP80','-','-',NULL,NULL);

/*Table structure for table `mywebs_products` */

DROP TABLE IF EXISTS `mywebs_products`;

CREATE TABLE `mywebs_products` (
  `id` int(8) unsigned NOT NULL AUTO_INCREMENT,
  `prod_nm` varchar(100) DEFAULT NULL,
  `price` decimal(12,2) DEFAULT NULL,
  `satuan` varchar(5) DEFAULT NULL,
  `createdate` datetime DEFAULT NULL,
  `createby` varchar(12) DEFAULT NULL,
  `last_update` datetime DEFAULT NULL,
  `last_updateby` varchar(12) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ` (`prod_nm`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `mywebs_products` */

insert  into `mywebs_products`(`id`,`prod_nm`,`price`,`satuan`,`createdate`,`createby`,`last_update`,`last_updateby`) values (1,'Paket Laundry Kiloan','7.00','gr','2020-01-01 23:32:03','yuda',NULL,NULL),(2,'Cuci Mukena (GRATIS)','0.00','pcs','2020-01-01 23:32:51','yuda',NULL,NULL);

/*Table structure for table `mywebs_purchase` */

DROP TABLE IF EXISTS `mywebs_purchase`;

CREATE TABLE `mywebs_purchase` (
  `id` bigint(8) unsigned NOT NULL AUTO_INCREMENT,
  `store_id` int(8) unsigned DEFAULT NULL,
  `sup_id` int(5) unsigned DEFAULT NULL,
  `refid` varchar(20) DEFAULT NULL,
  `received` tinyint(1) DEFAULT NULL COMMENT '0=yes,1=no',
  `total` decimal(25,2) DEFAULT NULL,
  `note` text,
  `purchase_date` date DEFAULT NULL,
  `createdate` datetime DEFAULT NULL,
  `createby` varchar(12) DEFAULT NULL,
  `last_update` datetime DEFAULT NULL,
  `updateby` varchar(12) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `mywebs_purchase` */

/*Table structure for table `mywebs_report_roles` */

DROP TABLE IF EXISTS `mywebs_report_roles`;

CREATE TABLE `mywebs_report_roles` (
  `rpt` int(5) unsigned DEFAULT NULL,
  `lid` tinyint(3) unsigned DEFAULT NULL,
  `createby` varchar(12) DEFAULT NULL,
  `createdate` datetime DEFAULT NULL,
  `updateby` varchar(12) DEFAULT NULL,
  `last_update` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `mywebs_report_roles` */

insert  into `mywebs_report_roles`(`rpt`,`lid`,`createby`,`createdate`,`updateby`,`last_update`) values (2,1,'SYS','2017-05-05 12:38:13',NULL,NULL),(3,1,'SYS','2017-05-14 18:34:34',NULL,NULL),(4,2,'SYS','2017-06-04 21:27:31',NULL,NULL),(4,1,'SYS','2017-06-05 18:31:33',NULL,NULL),(2,2,'yuda','2017-06-06 23:11:15',NULL,NULL),(3,2,'yuda','2017-06-11 22:31:13',NULL,NULL),(6,2,'yuda','2017-06-17 15:01:19',NULL,NULL);

/*Table structure for table `mywebs_reports` */

DROP TABLE IF EXISTS `mywebs_reports`;

CREATE TABLE `mywebs_reports` (
  `id` int(5) unsigned NOT NULL AUTO_INCREMENT,
  `rpt_fn` varchar(30) DEFAULT NULL,
  `rpt_name` varchar(30) DEFAULT NULL,
  `rpt_desc` varchar(220) DEFAULT NULL,
  `rpt_path` varchar(200) DEFAULT NULL,
  `p1` varchar(100) DEFAULT NULL,
  `p2` varchar(100) DEFAULT NULL,
  `p3` varchar(100) DEFAULT NULL,
  `rptType` enum('R','P') DEFAULT NULL COMMENT 'R=report, P=print',
  `rpt_sts` enum('Y','N') DEFAULT 'Y',
  `paper` varchar(5) DEFAULT 'A4',
  `ppr_orts` char(1) DEFAULT 'P',
  `mt` varchar(5) DEFAULT NULL,
  `mr` varchar(5) DEFAULT NULL,
  `mb` varchar(5) DEFAULT NULL,
  `ml` varchar(5) DEFAULT NULL,
  `createby` varchar(12) DEFAULT NULL,
  `createdate` datetime DEFAULT NULL,
  `last_update` datetime DEFAULT NULL,
  `last_updateby` varchar(12) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

/*Data for the table `mywebs_reports` */

insert  into `mywebs_reports`(`id`,`rpt_fn`,`rpt_name`,`rpt_desc`,`rpt_path`,`p1`,`p2`,`p3`,`rptType`,`rpt_sts`,`paper`,`ppr_orts`,`mt`,`mr`,`mb`,`ml`,`createby`,`createdate`,`last_update`,`last_updateby`) values (2,'rpt-total-jemaat','Laporan Jumlah Umat','Laporan Jumlah Umat','source',NULL,NULL,NULL,'R','Y','A4','P',NULL,NULL,NULL,NULL,'SYS','2017-05-05 12:33:06',NULL,NULL),(3,'rpt-kta','kartu tanda anggota','cetak kartu tanda anggota jemaat','source',NULL,NULL,NULL,'P','Y','A4','P',NULL,NULL,NULL,NULL,'SYS','2017-05-05 17:34:28',NULL,NULL),(4,'rpt-kk-anggota','anggota keluarga','Daftar anggota keluarga','source',NULL,NULL,NULL,'P','Y','A4','P','7','10','7','10','SYS','2017-06-04 21:25:37','2017-07-23 14:16:17','yuda'),(6,'rpt-kkjmt','kartu keluarga','cetak kartu keluarga jemaat','source',NULL,NULL,NULL,'P','Y','A4','L','7','10','7','10',NULL,NULL,NULL,NULL);

/*Table structure for table `mywebs_settings` */

DROP TABLE IF EXISTS `mywebs_settings`;

CREATE TABLE `mywebs_settings` (
  `setting_id` int(5) unsigned NOT NULL AUTO_INCREMENT,
  `setting_desc` varchar(25) DEFAULT NULL,
  `store_name` varchar(35) DEFAULT NULL,
  `store_addrs` varchar(100) DEFAULT NULL,
  `store_phone` varchar(15) DEFAULT NULL,
  `store_phone_alt` varchar(15) DEFAULT NULL,
  `site_nm` varchar(30) DEFAULT NULL,
  `base_url` varchar(220) DEFAULT NULL,
  `currency_cd` varchar(3) DEFAULT NULL,
  `rows_per_page` tinyint(3) DEFAULT NULL,
  `printer_id` tinyint(3) DEFAULT NULL,
  `auto_print` enum('0','1') DEFAULT NULL COMMENT '0=yes, 1=no',
  `mail_name` varchar(50) DEFAULT NULL,
  `mail_pwd` varchar(50) DEFAULT NULL,
  `mail_port` varchar(10) DEFAULT NULL,
  `mail_host` varchar(50) DEFAULT NULL,
  `alive_sts` tinyint(1) DEFAULT '1',
  `tls_sts` tinyint(1) DEFAULT '1',
  `createby` varchar(12) DEFAULT NULL,
  `createdate` datetime DEFAULT NULL,
  `last_update_by` varchar(12) DEFAULT NULL,
  `last_update` datetime DEFAULT NULL,
  PRIMARY KEY (`setting_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `mywebs_settings` */

insert  into `mywebs_settings`(`setting_id`,`setting_desc`,`store_name`,`store_addrs`,`store_phone`,`store_phone_alt`,`site_nm`,`base_url`,`currency_cd`,`rows_per_page`,`printer_id`,`auto_print`,`mail_name`,`mail_pwd`,`mail_port`,`mail_host`,`alive_sts`,`tls_sts`,`createby`,`createdate`,`last_update_by`,`last_update`) values (1,'LAUNDRYKU','BU TIK LAUNDRY','Binong Permai, Blok I8/10','081311000512',NULL,'LAUNDRYKU','http://dgtl.lab/elaundry','IDR',10,2,'1','ameda@sharingyuk.com','-','26','digitalisasi.com',1,1,'SYS','2017-09-06 18:00:42','','0000-00-00 00:00:00');

/*Table structure for table `mywebs_suppliers` */

DROP TABLE IF EXISTS `mywebs_suppliers`;

CREATE TABLE `mywebs_suppliers` (
  `id` int(5) unsigned NOT NULL AUTO_INCREMENT,
  `sup_nm` varchar(30) DEFAULT NULL,
  `sup_desc` varchar(100) DEFAULT NULL,
  `addrs` text,
  `email` varchar(50) DEFAULT NULL,
  `mob_no_1` varchar(15) DEFAULT NULL,
  `mob_no_2` varchar(15) DEFAULT NULL,
  `createdate` datetime DEFAULT NULL,
  `createby` varchar(12) DEFAULT NULL,
  `last_update` datetime DEFAULT NULL,
  `updateby` varchar(12) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `mywebs_suppliers` */

insert  into `mywebs_suppliers`(`id`,`sup_nm`,`sup_desc`,`addrs`,`email`,`mob_no_1`,`mob_no_2`,`createdate`,`createby`,`last_update`,`updateby`) values (3,'supplier ABC','just test','alamat suplier','abc@test.com','0121212121','06764534343','2017-08-26 19:18:48','yuda','2017-08-31 15:27:53','yuda');

/*Table structure for table `mywebs_transaction` */

DROP TABLE IF EXISTS `mywebs_transaction`;

CREATE TABLE `mywebs_transaction` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `scd` varchar(100) DEFAULT NULL,
  `inv_cd` varchar(10) DEFAULT NULL,
  `cust_id` int(8) DEFAULT NULL,
  `cust_nm` varchar(20) DEFAULT NULL,
  `trx_date` date DEFAULT NULL,
  `grab_date` date DEFAULT NULL,
  `total` decimal(12,2) DEFAULT NULL,
  `paid` decimal(12,2) DEFAULT NULL,
  `change` decimal(12,2) DEFAULT NULL,
  `remarks` varchar(220) DEFAULT NULL,
  `prog_sts` enum('NEW','PROG','DONE','COMPLETED') DEFAULT NULL,
  `createby` varchar(12) DEFAULT NULL,
  `createdate` datetime DEFAULT NULL,
  `last_update` datetime DEFAULT NULL,
  `last_updateby` varchar(12) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ` (`scd`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

/*Data for the table `mywebs_transaction` */

insert  into `mywebs_transaction`(`id`,`scd`,`inv_cd`,`cust_id`,`cust_nm`,`trx_date`,`grab_date`,`total`,`paid`,`change`,`remarks`,`prog_sts`,`createby`,`createdate`,`last_update`,`last_updateby`) values (1,'YUDA21201434','T00001',1,'Abdul','2020-01-02','2020-01-02',NULL,NULL,NULL,NULL,NULL,'yuda','2020-01-02 14:34:58',NULL,NULL),(2,'YUDA21201436','T00002',1,'Abdul','2020-01-02','2020-01-02','7840.00',NULL,NULL,NULL,NULL,'yuda','2020-01-02 14:36:55',NULL,NULL),(3,'YUDA21201439','T00003',1,'Abdul','2020-01-02','2020-01-02','109550.00',NULL,NULL,NULL,NULL,'yuda','2020-01-02 14:39:27',NULL,NULL),(4,'YUDA21201805','T00004',1,'Abdul','2020-01-02','2020-01-02','31500.00',NULL,NULL,NULL,NULL,'yuda','2020-01-02 18:06:26',NULL,NULL),(5,'YUDA51201407','T00005',1,'Abdul','2020-01-05','2020-01-08','21000.00','0.00',NULL,'oke','NEW','yuda','2020-01-05 14:12:06',NULL,NULL),(6,'YUDA51201445','T00006',1,'Abdul','2020-01-05','2020-01-08','32900.00','20000.00',NULL,'oke','NEW','yuda','2020-01-05 14:46:01',NULL,NULL),(7,'YUDA51202039','T00007',1,'Abdul','2020-01-05','2020-01-08','7000.00','7000.00',NULL,'OKE','NEW','yuda','2020-01-05 20:39:44',NULL,NULL),(8,'YUDA51202049','T00008',1,'Abdul','2020-01-05','2020-01-08','28000.00','10000.00',NULL,'oke','NEW','yuda','2020-01-05 20:49:53',NULL,NULL),(9,'YUDA51202105','T00009',1,'Abdul','2020-01-05','2020-01-08','31500.00','12000.00',NULL,'oke','NEW','yuda','2020-01-05 21:05:25',NULL,NULL),(10,'YUDA51202116','T00010',1,'Abdul','2020-01-05','2020-01-08','31500.00','12000.00',NULL,'oke','NEW','yuda','2020-01-05 21:16:26',NULL,NULL),(11,'YUDA51202138','T00011',1,'Abdul','2020-01-05','2020-01-08','31500.00','0.00',NULL,'oke','NEW','yuda','2020-01-05 21:39:02',NULL,NULL);

/*Table structure for table `mywebs_trx_products` */

DROP TABLE IF EXISTS `mywebs_trx_products`;

CREATE TABLE `mywebs_trx_products` (
  `id` bigint(12) unsigned NOT NULL AUTO_INCREMENT,
  `refid` int(10) DEFAULT NULL,
  `prod_id` int(8) DEFAULT NULL,
  `price` decimal(12,2) DEFAULT NULL,
  `qty` int(5) DEFAULT NULL,
  `sub_ttl` decimal(12,2) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

/*Data for the table `mywebs_trx_products` */

insert  into `mywebs_trx_products`(`id`,`refid`,`prod_id`,`price`,`qty`,`sub_ttl`) values (1,2,1,'7.00',560,'3920.00'),(2,2,1,'7.00',560,'3920.00'),(3,3,1,'7.00',7000,'49000.00'),(4,3,1,'7.00',7000,'49000.00'),(5,3,1,'7.00',1000,'7000.00'),(6,3,1,'7.00',650,'4550.00'),(7,4,1,'7.00',500,'3500.00'),(8,4,1,'7.00',4000,'28000.00'),(9,5,1,'7.00',3000,'21000.00'),(10,6,1,'7.00',3500,'24500.00'),(11,6,1,'7.00',1200,'8400.00'),(12,6,2,'0.00',1,'0.00'),(13,7,1,'7.00',1000,'7000.00'),(14,7,2,'0.00',1,'0.00'),(15,8,1,'7.00',4000,'28000.00'),(16,9,1,'7.00',4500,'31500.00'),(17,9,2,'0.00',1,'0.00'),(18,10,1,'7.00',4500,'31500.00'),(19,11,1,'7.00',4500,'31500.00');

/*Table structure for table `mywebs_user_login` */

DROP TABLE IF EXISTS `mywebs_user_login`;

CREATE TABLE `mywebs_user_login` (
  `id` bigint(12) unsigned NOT NULL AUTO_INCREMENT,
  `store_id` int(8) DEFAULT NULL,
  `usr_id` varchar(12) DEFAULT NULL,
  `ip_addrs` varbinary(16) DEFAULT NULL,
  `log_date` datetime DEFAULT NULL,
  `log_sts` char(1) DEFAULT NULL COMMENT '0=scs,1=failed',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=475 DEFAULT CHARSET=latin1;

/*Data for the table `mywebs_user_login` */

insert  into `mywebs_user_login`(`id`,`store_id`,`usr_id`,`ip_addrs`,`log_date`,`log_sts`) values (1,3,'yuda','::1','2017-08-28 07:28:31','0'),(2,3,'yuda','::1','2017-08-28 10:28:02','0'),(3,1,'A000001','::1','2017-08-30 23:13:06','0'),(4,1,'A000001','::1','2017-08-30 23:14:47','0'),(5,1,'A000001','::1','2017-08-30 23:15:23','0'),(6,1,'A000001','::1','2017-08-31 12:56:32','0'),(7,3,'yuda','::1','2017-08-31 13:03:32','0'),(8,3,'yuda','::1','2017-08-31 14:49:44','0'),(9,2,'yuda','::1','2017-08-31 15:30:49','0'),(10,2,'aguss','::1','2017-08-31 16:07:39','0'),(11,2,'yuda','::1','2017-08-31 16:07:57','0'),(12,2,'yuda','::1','2017-08-31 22:05:20','0'),(13,2,'yuda','::1','2017-08-31 22:05:41','0'),(14,2,'YUDA','::1','2017-08-31 22:11:14','1'),(15,2,'yuda','::1','2017-08-31 22:11:16','1'),(16,2,'yuda','::1','2017-08-31 22:11:20','0'),(17,2,'yuda','::1','2017-08-31 22:11:39','0'),(18,2,'yuda','::1','2017-08-31 22:55:03','0'),(19,2,'yuda','::1','2017-08-31 22:57:17','0'),(20,2,'yuda','::1','2017-08-31 22:57:35','0'),(21,2,'yuda','::1','2017-08-31 23:03:30','0'),(22,0,'aguss','::1','2017-08-31 23:05:45','1'),(23,1,'aguss','::1','2017-08-31 23:05:55','0'),(24,2,'yuda','::1','2017-08-31 23:10:51','0'),(25,2,'yuda','::1','2017-08-31 23:17:08','0'),(26,2,'yuda','::1','2017-08-31 23:19:18','0'),(27,0,'dasdsa','::1','2017-08-31 23:24:58','1'),(28,2,'yuda','::1','2017-08-31 23:28:22','0'),(29,1,'aguss','::1','2017-08-31 23:56:30','0'),(30,6,'yuda','::1','2017-08-31 23:58:39','0'),(31,2,'yuda','::1','2017-09-03 17:45:29','0'),(32,2,'yuda','::1','2017-09-04 21:47:13','0'),(33,1,'yuda','::1','2017-09-07 11:35:52','0'),(34,1,'yuda','::1','2017-09-08 10:42:36','0'),(35,1,'yuda','::1','2017-09-08 18:55:49','0'),(36,1,'yuda','::1','2017-09-11 10:51:54','0'),(37,6,'yuda','::1','2017-09-11 15:39:09','0'),(38,1,'A000001','::1','2017-09-11 18:01:52','0'),(39,5,'yuda','::1','2017-09-11 18:04:16','0'),(40,1,'A000001','::1','2017-09-11 18:08:25','0'),(41,5,'yuda','::1','2017-09-11 18:22:31','0'),(42,5,'yuda','::1','2017-09-11 19:55:55','0'),(43,1,'A000001','::1','2017-09-12 10:21:33','0'),(44,1,'yuda','::1','2017-09-12 10:45:15','0'),(45,1,'A000001','::1','2017-09-14 15:10:18','0'),(46,1,'yuda','::1','2017-09-14 15:43:18','0'),(47,1,'yuda','::1','2017-09-15 17:33:25','0'),(48,1,'yuda','::1','2017-09-15 18:58:19','0'),(49,1,'yuda','::1','2017-09-17 18:17:41','0'),(50,1,'yuda','::1','2017-09-17 22:14:37','0'),(51,1,'yuda','::1','2017-09-18 15:55:42','0'),(52,1,'yuda','::1','2017-09-19 18:11:32','0'),(53,1,'yuda','::1','2017-09-20 12:48:48','0'),(54,1,'yuda','::1','2017-09-20 13:16:20','0'),(55,1,'yuda','::1','2017-09-20 17:24:55','0'),(56,1,'yuda','::1','2017-09-22 16:24:10','0'),(57,0,'dev','::1','2017-09-22 16:24:36','1'),(58,0,'dev','::1','2017-09-22 16:24:42','1'),(59,1,'yuda','::1','2017-09-28 12:05:37','0'),(60,1,'yuda','::1','2017-09-28 21:34:29','0'),(61,1,'yuda','::1','2017-10-05 15:49:39','0'),(62,1,'yuda','::1','2017-10-05 19:52:11','0'),(63,1,'yuda','::1','2017-10-10 17:46:36','0'),(64,1,'yuda','::1','2017-10-18 11:20:27','0'),(65,1,'yuda','10.10.124.120','2017-10-18 11:23:05','0'),(66,1,'yuda','::1','2017-10-18 11:27:01','0'),(67,1,'yuda','10.10.124.120','2017-10-24 10:33:19','0'),(68,6,'wahyu','10.10.124.62','2017-10-24 10:58:42','0'),(69,1,'yuda','::1','2017-10-24 17:52:15','0'),(70,2,'yuda','::1','2017-10-30 14:26:21','0'),(71,2,'yuda','::1','2017-10-30 15:52:18','0'),(72,2,'yuda','::1','2017-10-31 17:34:23','0'),(73,2,'yuda','::1','2017-11-01 13:16:39','0'),(74,2,'yuda','10.10.124.59','2017-11-01 13:50:30','0'),(75,0,'wahyu','10.10.124.82','2017-11-01 14:45:15','1'),(76,6,'wahyu','10.10.124.82','2017-11-01 14:45:25','0'),(77,2,'yuda','10.10.124.82','2017-11-01 14:47:49','0'),(78,2,'yuda','10.10.124.82','2017-11-01 14:48:32','0'),(79,2,'yuda','::1','2017-11-01 16:18:06','0'),(80,2,'yuda','::1','2017-11-02 13:24:10','0'),(81,6,'wahyu','::1','2017-11-02 18:21:30','0'),(82,0,'yuda','::1','2017-11-02 18:22:56','1'),(83,2,'yuda','::1','2017-11-02 18:22:59','0'),(84,1,'wahyu','::1','2017-11-02 18:32:01','0'),(85,2,'yuda','::1','2017-11-03 10:16:16','0'),(86,0,'yuda','127.0.0.1','2017-11-03 15:24:23','1'),(87,2,'yuda','127.0.0.1','2017-11-03 15:24:26','0'),(88,2,'yuda','::1','2017-11-04 21:01:54','0'),(89,1,'wahyu','::1','2017-11-04 21:03:02','0'),(90,2,'yuda','::1','2017-11-04 21:03:40','0'),(91,2,'yuda','::1','2017-11-04 21:05:33','0'),(92,2,'yuda','::1','2017-11-04 22:33:22','0'),(93,2,'yuda','127.0.0.1','2017-11-05 00:24:53','0'),(94,2,'yuda','127.0.0.1','2017-11-05 13:15:27','0'),(95,2,'yuda','127.0.0.1','2017-11-05 13:24:27','0'),(96,0,'wahyu','127.0.0.1','2017-11-06 10:14:48','1'),(97,1,'wahyu','127.0.0.1','2017-11-06 10:14:51','0'),(98,2,'yuda','127.0.0.1','2017-11-06 13:00:31','0'),(99,2,'yuda','127.0.0.1','2017-11-08 15:44:00','0'),(100,2,'yuda','127.0.0.1','2017-11-09 10:17:36','0'),(101,2,'yuda','127.0.0.1','2017-11-09 12:05:33','0'),(102,0,'YUDA','127.0.0.1','2017-11-09 17:51:09','1'),(103,0,'yuda','127.0.0.1','2017-11-09 17:51:12','1'),(104,2,'yuda','127.0.0.1','2017-11-09 17:51:15','0'),(105,2,'yuda','127.0.0.1','2017-11-13 14:37:45','0'),(106,2,'yuda','127.0.0.1','2017-11-13 17:08:01','0'),(107,2,'yuda','127.0.0.1','2017-11-14 14:03:24','0'),(108,2,'yuda','127.0.0.1','2017-11-14 15:25:39','0'),(109,2,'yuda','127.0.0.1','2017-11-15 10:27:05','0'),(110,2,'yuda','127.0.0.1','2017-11-21 19:39:52','0'),(111,2,'yuda','127.0.0.1','2017-11-28 11:45:30','0'),(112,2,'yuda','127.0.0.1','2017-11-28 19:30:07','0'),(113,2,'yuda','127.0.0.1','2017-11-29 19:35:15','0'),(114,2,'yuda','127.0.0.1','2017-12-05 18:29:06','0'),(115,2,'yuda','127.0.0.1','2017-12-06 10:29:09','0'),(116,2,'yuda','127.0.0.1','2017-12-06 14:44:35','0'),(117,2,'yuda','127.0.0.1','2017-12-11 08:25:17','0'),(118,2,'yuda','127.0.0.1','2017-12-11 16:31:08','0'),(119,2,'yuda','127.0.0.1','2017-12-11 17:18:37','0'),(120,2,'yuda','127.0.0.1','2017-12-11 19:24:49','0'),(121,2,'yuda','127.0.0.1','2017-12-12 11:36:18','0'),(122,2,'yuda','127.0.0.1','2017-12-12 21:29:18','0'),(123,2,'yuda','127.0.0.1','2017-12-13 11:33:29','0'),(124,2,'yuda','127.0.0.1','2017-12-13 12:24:04','0'),(125,2,'yuda','127.0.0.1','2017-12-13 16:13:06','0'),(126,2,'yuda','127.0.0.1','2017-12-13 18:13:15','0'),(127,2,'yuda','127.0.0.1','2017-12-14 13:58:32','0'),(128,2,'yuda','127.0.0.1','2017-12-14 15:15:50','0'),(129,2,'yuda','127.0.0.1','2017-12-18 14:19:15','0'),(130,2,'yuda','127.0.0.1','2017-12-18 19:10:23','0'),(131,2,'yuda','127.0.0.1','2017-12-18 19:47:50','0'),(132,2,'yuda','127.0.0.1','2017-12-18 19:51:01','0'),(133,2,'yuda','127.0.0.1','2017-12-18 19:55:15','0'),(134,2,'yuda','127.0.0.1','2017-12-18 20:04:59','0'),(135,2,'yuda','127.0.0.1','2017-12-18 21:27:46','0'),(136,2,'yuda','127.0.0.1','2017-12-19 12:09:33','0'),(137,2,'yuda','127.0.0.1','2017-12-19 13:41:44','0'),(138,2,'yuda','127.0.0.1','2017-12-21 12:56:16','0'),(139,0,'yuda','127.0.0.1','2017-12-21 13:47:11','1'),(140,2,'yuda','127.0.0.1','2017-12-21 13:47:14','0'),(141,0,'yuda','127.0.0.1','2017-12-21 13:49:34','1'),(142,2,'yuda','127.0.0.1','2017-12-21 13:49:36','0'),(143,0,'yuda','127.0.0.1','2017-12-21 15:06:00','1'),(144,0,'yuda','127.0.0.1','2017-12-21 15:06:04','1'),(145,2,'yuda','127.0.0.1','2017-12-21 15:06:07','0'),(146,0,'yuda','127.0.0.1','2017-12-21 17:16:03','1'),(147,2,'yuda','127.0.0.1','2017-12-21 17:16:08','0'),(148,0,'yuda','127.0.0.1','2017-12-27 11:13:16','1'),(149,2,'yuda','127.0.0.1','2017-12-27 11:13:22','0'),(150,0,'yuda','127.0.0.1','2017-12-27 16:52:25','1'),(151,2,'yuda','127.0.0.1','2017-12-27 16:52:28','0'),(152,0,'yuda','127.0.0.1','2017-12-29 10:59:47','1'),(153,2,'yuda','127.0.0.1','2017-12-29 10:59:50','0'),(154,2,'yuda','127.0.0.1','2017-12-29 21:24:51','0'),(155,0,'yuda','127.0.0.1','2018-01-02 19:09:57','1'),(156,2,'yuda','127.0.0.1','2018-01-02 19:10:04','0'),(157,6,'timkacrut','127.0.0.1','2018-01-02 19:11:30','0'),(158,0,'kacrut','127.0.0.1','2018-01-02 19:25:09','1'),(159,0,'kacrut','127.0.0.1','2018-01-02 19:25:23','1'),(160,6,'timkacrut','127.0.0.1','2018-01-02 19:25:30','0'),(161,0,'yuda','127.0.0.1','2018-01-02 20:08:11','1'),(162,2,'yuda','127.0.0.1','2018-01-02 20:08:14','0'),(163,6,'timkacrut','127.0.0.1','2018-01-02 20:14:58','0'),(164,6,'timkacrut','127.0.0.1','2018-01-02 20:26:01','0'),(165,6,'timkacrut','127.0.0.1','2018-01-02 20:26:17','0'),(166,6,'timkacrut','127.0.0.1','2018-01-02 20:27:39','0'),(167,6,'timkacrut','127.0.0.1','2018-01-02 20:27:58','0'),(168,0,'yuda','127.0.0.1','2018-01-03 17:03:25','1'),(169,2,'yuda','127.0.0.1','2018-01-03 17:03:28','0'),(170,0,'yuda','127.0.0.1','2018-01-04 10:32:57','1'),(171,2,'yuda','127.0.0.1','2018-01-04 10:33:00','0'),(172,2,'yuda','127.0.0.1','2018-01-04 11:14:45','0'),(173,6,'timkacrut','127.0.0.1','2018-01-04 13:24:25','0'),(174,6,'timkacrut','127.0.0.1','2018-01-04 13:37:56','0'),(175,6,'timkacrut','127.0.0.1','2018-01-04 15:38:19','0'),(176,2,'yuda','127.0.0.1','2018-01-04 17:16:07','0'),(177,0,'Yuda','127.0.0.1','2018-01-04 17:16:42','1'),(178,0,'Xp','127.0.0.1','2018-01-04 17:17:04','1'),(179,2,'yuda','127.0.0.1','2018-01-04 17:17:45','0'),(180,2,'yuda','127.0.0.1','2018-01-04 17:40:53','0'),(181,2,'yuda','127.0.0.1','2018-01-04 18:16:57','0'),(182,2,'yuda','127.0.0.1','2018-01-04 18:21:13','0'),(183,2,'yuda','127.0.0.1','2018-01-04 18:55:00','0'),(184,2,'Yuda','127.0.0.1','2018-01-04 21:19:18','0'),(185,2,'yuda','127.0.0.1','2018-01-04 21:22:25','0'),(186,2,'yuda','127.0.0.1','2018-01-04 21:23:14','0'),(187,2,'yuda','127.0.0.1','2018-01-04 21:29:25','0'),(188,2,'yuda','127.0.0.1','2018-01-05 11:04:51','0'),(189,6,'bukit','127.0.0.1','2018-01-05 11:14:18','0'),(190,6,'bukit','127.0.0.1','2018-01-05 11:14:45','0'),(191,6,'bukit','127.0.0.1','2018-01-05 11:15:10','0'),(192,2,'yuda','127.0.0.1','2018-01-05 14:02:51','0'),(193,2,'yuda','127.0.0.1','2018-01-05 17:16:58','0'),(194,0,'dev_team','127.0.0.1','2018-01-07 20:08:25','1'),(195,0,'febri','127.0.0.1','2018-01-07 20:08:40','1'),(196,2,'yuda','127.0.0.1','2018-01-08 11:30:30','0'),(197,6,'timkacrut','127.0.0.1','2018-01-08 15:58:53','0'),(198,2,'yuda','127.0.0.1','2018-01-08 15:59:07','0'),(199,6,'timkacrut','127.0.0.1','2018-01-08 16:56:55','0'),(200,2,'yuda','127.0.0.1','2018-01-08 18:56:36','0'),(201,0,'yuda','127.0.0.1','2018-01-10 18:01:58','1'),(202,2,'yuda','127.0.0.1','2018-01-10 18:02:01','0'),(203,6,'kampret02','127.0.0.1','2018-01-10 18:04:45','0'),(204,2,'yuda','127.0.0.1','2018-01-10 18:05:15','0'),(205,6,'kampret02','127.0.0.1','2018-01-10 18:07:20','0'),(206,6,'kampret02','127.0.0.1','2018-01-10 18:52:30','0'),(207,6,'kampret02','127.0.0.1','2018-01-10 18:56:43','0'),(208,6,'kampret02','127.0.0.1','2018-01-10 19:02:54','0'),(209,6,'kampret02','127.0.0.1','2018-01-10 19:11:00','0'),(210,2,'yuda','127.0.0.1','2018-01-10 19:58:01','0'),(211,6,'kampret02','127.0.0.1','2018-01-10 19:59:42','0'),(212,6,'kampret02','127.0.0.1','2018-01-11 10:44:28','0'),(213,6,'kampret02','127.0.0.1','2018-01-11 11:50:34','0'),(214,6,'kampret02','127.0.0.1','2018-01-15 09:26:43','0'),(215,0,'yuda','127.0.0.1','2018-01-16 14:03:30','1'),(216,2,'yuda','127.0.0.1','2018-01-16 14:03:33','0'),(217,2,'yuda','127.0.0.1','2018-01-23 11:22:59','0'),(218,2,'yuda','127.0.0.1','2018-01-24 14:55:18','0'),(219,2,'yuda','127.0.0.1','2018-01-29 09:40:26','0'),(220,2,'yuda','127.0.0.1','2018-01-29 15:02:57','0'),(221,2,'yuda','127.0.0.1','2018-01-29 17:06:05','0'),(222,0,'yuda','127.0.0.1','2018-01-30 17:01:05','1'),(223,0,'yuda','127.0.0.1','2018-01-30 17:01:23','1'),(224,0,'yuda17','127.0.0.1','2018-01-30 17:01:27','1'),(225,0,'yuda17','127.0.0.1','2018-01-30 17:01:27','1'),(226,0,'yuda','127.0.0.1','2018-01-30 17:01:34','1'),(227,2,'yuda','127.0.0.1','2018-01-30 17:02:15','0'),(228,2,'yuda','127.0.0.1','2018-01-31 10:39:05','0'),(229,2,'yuda','127.0.0.1','2018-02-01 17:40:36','0'),(230,2,'yuda','127.0.0.1','2018-02-02 10:41:00','0'),(231,2,'yuda','127.0.0.1','2018-02-02 11:08:22','0'),(232,2,'yuda','127.0.0.1','2018-02-02 14:44:52','0'),(233,2,'yuda','127.0.0.1','2018-02-05 15:01:02','0'),(234,2,'yuda','127.0.0.1','2018-02-07 13:39:00','0'),(235,0,'yuda','127.0.0.1','2018-02-19 14:11:43','1'),(236,2,'yuda','127.0.0.1','2018-02-19 14:11:46','0'),(237,0,'yuda','127.0.0.1','2018-02-20 09:47:17','1'),(238,2,'yuda','127.0.0.1','2018-02-20 09:47:19','0'),(239,2,'yuda','127.0.0.1','2018-02-20 14:38:38','0'),(240,6,'kampret02','127.0.0.1','2018-02-26 10:46:21','0'),(241,0,'yuda','127.0.0.1','2018-02-27 14:12:22','1'),(242,2,'yuda','127.0.0.1','2018-02-27 14:12:25','0'),(243,6,'kampret02','127.0.0.1','2018-03-05 10:54:02','0'),(244,6,'kampret02','127.0.0.1','2018-03-05 11:02:38','0'),(245,0,'yuda','127.0.0.1','2018-03-06 10:35:41','1'),(246,2,'yuda','127.0.0.1','2018-03-06 10:35:46','0'),(247,0,'yuda','127.0.0.1','2018-03-06 12:12:37','1'),(248,2,'yuda','127.0.0.1','2018-03-06 12:12:39','0'),(249,6,'kampret02','127.0.0.1','2018-03-06 12:28:03','0'),(250,0,'yuda','127.0.0.1','2018-03-06 13:52:20','1'),(251,2,'yuda','127.0.0.1','2018-03-06 13:52:23','0'),(252,2,'yuda','127.0.0.1','2018-03-06 14:57:54','0'),(253,0,'yuda','127.0.0.1','2018-03-19 19:10:25','1'),(254,2,'yuda','127.0.0.1','2018-03-19 19:10:27','0'),(255,0,'yuda','127.0.0.1','2018-03-22 14:44:36','1'),(256,2,'yuda','127.0.0.1','2018-03-22 14:44:39','0'),(257,0,'yuda','127.0.0.1','2018-03-23 15:28:42','1'),(258,2,'yuda','127.0.0.1','2018-03-23 15:28:46','0'),(259,0,'yuda','127.0.0.1','2018-03-26 14:38:12','1'),(260,2,'yuda','127.0.0.1','2018-03-26 14:38:15','0'),(261,2,'yuda','127.0.0.1','2018-03-27 09:41:05','0'),(262,2,'yuda','127.0.0.1','2018-03-28 16:38:03','0'),(263,2,'yuda','127.0.0.1','2018-03-29 15:36:46','0'),(264,0,'yuda','127.0.0.1','2018-04-02 14:30:17','1'),(265,2,'yuda','127.0.0.1','2018-04-02 14:30:21','0'),(266,0,'yuda','127.0.0.1','2018-04-10 14:48:51','1'),(267,2,'yuda','127.0.0.1','2018-04-10 14:48:54','0'),(268,0,'yuda','127.0.0.1','2018-04-16 13:55:37','1'),(269,2,'yuda','127.0.0.1','2018-04-16 13:55:40','0'),(270,0,'yuda','127.0.0.1','2018-04-16 13:57:18','1'),(271,2,'yuda','127.0.0.1','2018-04-16 13:57:21','0'),(272,0,'yuda','127.0.0.1','2018-04-17 13:23:02','1'),(273,2,'yuda','127.0.0.1','2018-04-17 13:23:06','0'),(274,2,'yuda','127.0.0.1','2018-04-25 10:10:02','0'),(275,2,'yuda','127.0.0.1','2018-04-26 14:29:15','0'),(276,0,'yuda','127.0.0.1','2018-04-30 13:51:40','1'),(277,2,'yuda','127.0.0.1','2018-04-30 13:51:44','0'),(278,2,'yuda','127.0.0.1','2018-04-30 16:23:52','0'),(279,2,'yuda','127.0.0.1','2018-05-03 17:34:39','0'),(280,2,'yuda','127.0.0.1','2018-05-09 08:53:00','0'),(281,2,'yuda','127.0.0.1','2018-05-11 17:56:16','0'),(282,2,'yuda','127.0.0.1','2018-05-14 20:05:46','0'),(283,2,'yuda','127.0.0.1','2018-05-15 14:09:21','0'),(284,2,'yuda','127.0.0.1','2018-05-16 14:42:46','0'),(285,0,'yuda','127.0.0.1','2018-05-18 11:07:14','1'),(286,2,'yuda','127.0.0.1','2018-05-18 11:07:16','0'),(287,2,'yuda','127.0.0.1','2018-05-18 17:50:53','0'),(288,2,'yuda','127.0.0.1','2018-06-08 11:25:45','0'),(289,2,'yuda','127.0.0.1','2018-06-08 13:12:40','0'),(290,2,'yuda','127.0.0.1','2018-06-21 12:22:06','0'),(291,2,'yuda','127.0.0.1','2018-06-22 15:19:07','0'),(292,2,'yuda','127.0.0.1','2018-06-25 13:15:59','0'),(293,2,'yuda','127.0.0.1','2018-07-02 13:58:15','0'),(294,0,'yuda','127.0.0.1','2018-07-02 15:44:26','1'),(295,2,'yuda','127.0.0.1','2018-07-02 15:44:28','0'),(296,2,'yuda','127.0.0.1','2018-07-03 09:41:46','0'),(297,0,'yuda','127.0.0.1','2018-07-03 17:03:18','1'),(298,2,'yuda','127.0.0.1','2018-07-03 17:03:21','0'),(299,2,'yuda','127.0.0.1','2018-07-03 18:31:37','0'),(300,0,'yuda','127.0.0.1','2018-07-04 15:29:22','1'),(301,2,'yuda','127.0.0.1','2018-07-04 15:29:27','0'),(302,2,'yuda','127.0.0.1','2018-07-10 15:42:24','0'),(303,2,'yuda','127.0.0.1','2018-07-11 09:27:26','0'),(304,2,'yuda','127.0.0.1','2018-07-12 14:42:17','0'),(305,0,'yuda','127.0.0.1','2018-07-18 18:04:25','1'),(306,2,'yuda','127.0.0.1','2018-07-18 18:04:26','0'),(307,0,'yogi','127.0.0.1','2018-07-18 18:06:34','1'),(308,6,'yogi','127.0.0.1','2018-07-18 18:06:49','0'),(309,6,'yogi','127.0.0.1','2018-07-18 21:03:14','0'),(310,2,'yuda','127.0.0.1','2018-07-20 05:05:35','0'),(311,0,'yuda','127.0.0.1','2018-07-23 06:45:52','1'),(312,2,'yuda','127.0.0.1','2018-07-23 06:45:55','0'),(313,0,'yuda','127.0.0.1','2018-07-24 02:27:08','1'),(314,2,'yuda','127.0.0.1','2018-07-24 02:27:10','0'),(315,0,'yuda','127.0.0.1','2018-07-25 07:29:57','1'),(316,2,'yuda','127.0.0.1','2018-07-25 07:29:59','0'),(317,2,'yuda','127.0.0.1','2018-07-25 08:15:19','0'),(318,2,'yuda','127.0.0.1','2018-07-26 14:16:01','0'),(319,2,'yuda','127.0.0.1','2018-08-02 08:21:21','0'),(320,2,'yuda','127.0.0.1','2018-08-06 18:36:23','0'),(321,6,'fetto','127.0.0.1','2018-08-06 18:38:15','0'),(322,2,'yuda','127.0.0.1','2018-08-09 10:23:08','0'),(323,6,'fetto','127.0.0.1','2018-08-10 15:19:28','0'),(324,2,'yuda','127.0.0.1','2018-08-13 14:38:37','0'),(325,6,'fetto','127.0.0.1','2018-08-13 17:47:06','0'),(326,2,'yuda','127.0.0.1','2018-08-13 18:40:11','0'),(327,2,'yuda','127.0.0.1','2018-08-14 15:48:41','0'),(328,0,'yuda','127.0.0.1','2018-08-15 12:35:31','1'),(329,0,'yuda','127.0.0.1','2018-08-15 12:35:35','1'),(330,0,'yudaadp@gmai','127.0.0.1','2018-08-15 12:35:52','1'),(331,0,'yuda','127.0.0.1','2018-08-15 12:36:01','1'),(332,0,'yudayuda','127.0.0.1','2018-08-15 12:36:19','1'),(333,0,'yuda','127.0.0.1','2018-08-15 12:36:56','1'),(334,2,'yuda','127.0.0.1','2018-08-15 12:37:08','0'),(335,2,'yuda','127.0.0.1','2018-08-16 10:41:15','0'),(336,6,'fetto','127.0.0.1','2018-08-24 16:25:20','0'),(337,2,'yuda','127.0.0.1','2018-08-25 14:41:40','0'),(338,2,'yuda','127.0.0.1','2018-08-26 21:03:54','0'),(339,0,'yuda','127.0.0.1','2018-08-26 22:01:21','1'),(340,0,'yuda','127.0.0.1','2018-08-26 22:01:24','1'),(341,2,'yuda','127.0.0.1','2018-08-26 22:01:27','0'),(342,2,'yuda','127.0.0.1','2018-08-27 11:36:52','0'),(343,2,'yuda','127.0.0.1','2018-08-27 11:42:48','0'),(344,0,'yuda','127.0.0.1','2018-08-27 15:59:17','1'),(345,0,'yuda','127.0.0.1','2018-08-29 14:40:48','1'),(346,0,'yuda','127.0.0.1','2018-08-29 14:40:49','1'),(347,0,'yuda','127.0.0.1','2018-08-29 14:40:51','1'),(348,0,'yudaadp@gmai','127.0.0.1','2018-08-29 14:41:25','1'),(349,0,'yudaadp@gmai','127.0.0.1','2018-08-29 14:41:30','1'),(350,0,'yudaadp@gmai','127.0.0.1','2018-08-29 14:42:23','1'),(351,0,'yudaadp@gmai','127.0.0.1','2018-08-29 14:42:34','1'),(352,0,'yuda','127.0.0.1','2018-08-30 10:14:31','1'),(353,2,'yuda','127.0.0.1','2018-08-30 10:14:36','0'),(354,0,'yudaadp@gmai','127.0.0.1','2018-08-31 14:34:35','1'),(355,0,'yudaadp@gmai','127.0.0.1','2018-08-31 14:34:40','1'),(356,2,'yuda','127.0.0.1','2018-08-31 14:38:44','0'),(357,2,'yuda','127.0.0.1','2018-08-31 17:45:37','0'),(358,2,'yuda','127.0.0.1','2018-09-02 23:28:20','0'),(359,0,'yuda','127.0.0.1','2018-09-04 09:35:15','1'),(360,0,'yuda','127.0.0.1','2018-09-04 09:35:19','1'),(361,0,'yuda','127.0.0.1','2018-09-04 09:35:23','1'),(362,0,'yuda','127.0.0.1','2018-09-04 09:35:30','1'),(363,0,'yuda','127.0.0.1','2018-09-04 09:35:49','1'),(364,0,'yuda','127.0.0.1','2018-09-04 09:35:53','1'),(365,0,'yuda','127.0.0.1','2018-09-04 09:36:09','1'),(366,0,'yuda','127.0.0.1','2018-09-04 09:36:43','1'),(367,0,'yuda','127.0.0.1','2018-09-04 18:59:12','1'),(368,2,'yuda','127.0.0.1','2018-09-04 18:59:14','0'),(369,2,'yuda','127.0.0.1','2018-09-07 09:40:25','0'),(370,2,'yuda','127.0.0.1','2018-09-07 10:57:37','0'),(371,6,'fetto','127.0.0.1','2018-09-07 11:17:07','0'),(372,0,'yuda','127.0.0.1','2018-09-08 20:26:00','1'),(373,2,'yuda','127.0.0.1','2018-09-08 20:26:03','0'),(374,2,'yuda','127.0.0.1','2018-09-10 19:20:28','0'),(375,2,'yuda','127.0.0.1','2018-09-10 20:49:55','0'),(376,2,'yuda','127.0.0.1','2018-09-13 09:39:50','0'),(377,2,'yuda','127.0.0.1','2018-09-13 14:30:08','0'),(378,0,'yuda','127.0.0.1','2018-09-17 12:05:24','1'),(379,2,'yuda','127.0.0.1','2018-09-17 12:05:27','0'),(380,2,'yuda','127.0.0.1','2018-09-17 14:30:21','0'),(381,6,'fetto','127.0.0.1','2018-09-21 17:40:11','0'),(382,2,'yuda','127.0.0.1','2018-09-24 10:29:10','0'),(383,6,'fetto','127.0.0.1','2018-09-24 14:39:55','0'),(384,6,'fetto','127.0.0.1','2018-09-24 16:11:54','0'),(385,6,'fetto','127.0.0.1','2018-09-24 17:44:50','0'),(386,6,'fetto','127.0.0.1','2018-09-25 09:55:26','0'),(387,6,'kampret02','127.0.0.1','2018-10-02 09:44:41','0'),(388,6,'kampret02','127.0.0.1','2018-10-02 09:46:02','0'),(389,0,'kampret02','127.0.0.1','2018-10-02 09:46:27','1'),(390,6,'kampret02','127.0.0.1','2018-10-02 09:47:12','0'),(391,6,'kampret02','127.0.0.1','2018-10-02 09:47:37','0'),(392,6,'kampret02','127.0.0.1','2018-10-02 09:47:50','0'),(393,6,'kampret02','127.0.0.1','2018-10-02 09:48:11','0'),(394,2,'yuda','127.0.0.1','2018-10-02 09:53:35','0'),(395,0,'yuda','127.0.0.1','2018-10-02 09:54:00','1'),(396,2,'yuda','127.0.0.1','2018-10-02 09:54:23','0'),(397,2,'yuda','127.0.0.1','2018-10-02 11:25:08','0'),(398,2,'yuda','127.0.0.1','2018-10-02 11:53:08','0'),(399,2,'yuda','127.0.0.1','2018-10-03 16:42:44','0'),(400,2,'yuda','127.0.0.1','2018-10-08 19:51:40','0'),(401,2,'yuda','127.0.0.1','2018-10-08 19:58:26','0'),(402,2,'yuda','127.0.0.1','2018-10-10 09:34:06','0'),(403,2,'yuda','127.0.0.1','2018-10-10 12:57:06','0'),(404,2,'yuda','127.0.0.1','2018-10-18 23:11:34','0'),(405,2,'yuda','127.0.0.1','2018-10-19 14:56:26','0'),(406,2,'yuda','127.0.0.1','2018-10-20 09:00:03','0'),(407,2,'yuda','127.0.0.1','2018-10-24 10:11:58','0'),(408,2,'yuda','127.0.0.1','2018-10-24 11:25:35','0'),(409,2,'yuda','127.0.0.1','2018-10-25 08:52:57','0'),(410,0,'yuda','127.0.0.1','2018-10-25 10:46:44','1'),(411,2,'yuda','127.0.0.1','2018-10-25 10:46:46','0'),(412,0,'yudaadp@gmai','127.0.0.1','2018-10-26 13:40:27','1'),(413,0,'yudaadp@gmai','127.0.0.1','2018-10-26 13:44:23','1'),(414,0,'yudaadp@gmai','127.0.0.1','2018-10-26 13:44:27','1'),(415,0,'yuda','127.0.0.1','2018-10-26 13:44:40','1'),(416,0,'yuda','127.0.0.1','2018-10-26 13:44:41','1'),(417,0,'yudaadp@gmai','127.0.0.1','2018-10-26 13:44:51','1'),(418,0,'yudaadp@gmai','127.0.0.1','2018-10-26 13:44:52','1'),(419,0,'yudaadp@gmai','127.0.0.1','2018-10-26 13:44:55','1'),(420,2,'yuda','127.0.0.1','2018-10-26 13:53:35','0'),(421,6,'yogi','127.0.0.1','2018-10-26 14:10:10','0'),(422,6,'yogi','127.0.0.1','2018-10-26 15:01:49','0'),(423,2,'yuda','127.0.0.1','2018-10-29 09:54:40','0'),(424,6,'fetto','127.0.0.1','2018-10-30 18:59:42','0'),(425,6,'fetto','127.0.0.1','2018-10-30 19:27:08','0'),(426,6,'fetto','127.0.0.1','2018-10-30 21:10:11','0'),(427,0,'yuda','127.0.0.1','2018-11-24 08:48:15','1'),(428,2,'yuda','127.0.0.1','2018-11-24 08:48:19','0'),(429,0,'yuda','127.0.0.1','2018-12-12 21:22:40','1'),(430,0,'yudaadp@gmai','127.0.0.1','2018-12-12 21:22:47','1'),(431,0,'yudaadp@gmai','127.0.0.1','2018-12-12 21:22:52','1'),(432,6,'yogi','127.0.0.1','2018-12-12 21:23:22','0'),(433,6,'yogi','127.0.0.1','2018-12-12 22:10:03','0'),(434,0,'yogi','127.0.0.1','2018-12-12 23:33:46','1'),(435,6,'yogi','127.0.0.1','2018-12-12 23:33:51','0'),(436,0,'yuda','127.0.0.1','2018-12-17 14:24:19','1'),(437,2,'yuda','127.0.0.1','2018-12-17 14:24:22','0'),(438,0,'yuda','127.0.0.1','2018-12-18 17:02:32','1'),(439,2,'yuda','127.0.0.1','2018-12-18 17:02:35','0'),(440,6,'yogi','127.0.0.1','2018-12-20 13:47:56','0'),(441,0,'yuda','127.0.0.1','2019-01-04 14:08:12','1'),(442,2,'yuda','127.0.0.1','2019-01-04 14:08:15','0'),(443,2,'yuda','127.0.0.1','2019-01-07 15:33:25','0'),(444,0,'yuda','127.0.0.1','2019-01-17 08:40:04','1'),(445,2,'yuda','127.0.0.1','2019-01-17 08:40:07','0'),(446,2,'yuda','127.0.0.1','2019-01-29 15:20:00','0'),(447,0,'yuda','127.0.0.1','2019-02-11 11:33:37','1'),(448,2,'yuda','127.0.0.1','2019-02-11 11:33:39','0'),(449,2,'yuda','127.0.0.1','2019-02-11 14:38:15','0'),(450,2,'yuda','127.0.0.1','2019-02-18 11:40:06','0'),(451,2,'YUDA','127.0.0.1','2019-02-18 13:43:06','0'),(452,2,'yuda','127.0.0.1','2019-02-28 13:26:41','0'),(453,2,'yuda','127.0.0.1','2019-03-01 14:21:59','0'),(454,1,'wahyu','127.0.0.1','2019-03-04 08:00:04','0'),(455,1,'wahyu','127.0.0.1','2019-03-04 10:10:10','0'),(456,2,'yuda','127.0.0.1','2019-03-04 18:09:15','0'),(457,1,'wahyu','127.0.0.1','2019-03-04 22:03:29','0'),(458,2,'Yuda','127.0.0.1','2019-03-04 22:09:47','0'),(459,0,'yuda','127.0.0.1','2019-03-05 07:06:04','1'),(460,2,'yuda','127.0.0.1','2019-03-05 07:06:07','0'),(461,0,'yuda','127.0.0.1','2019-04-02 13:31:11','1'),(462,0,'yuda','127.0.0.1','2020-01-01 21:51:56','1'),(463,0,'yuda','127.0.0.1','2020-01-01 21:52:00','1'),(464,2,'yuda','127.0.0.1','2020-01-01 21:52:37','0'),(465,0,'yuda','127.0.0.1','2020-01-02 09:51:52','1'),(466,0,'yuda','127.0.0.1','2020-01-02 09:51:55','1'),(467,0,'yuda','127.0.0.1','2020-01-02 09:51:58','1'),(468,0,'yuda','127.0.0.1','2020-01-02 09:52:07','1'),(469,0,'yuda','127.0.0.1','2020-01-02 09:52:12','1'),(470,0,'yuda','127.0.0.1','2020-01-02 09:52:35','1'),(471,0,'yuda','127.0.0.1','2020-01-02 09:54:29','1'),(472,0,'yuda','127.0.0.1','2020-01-02 09:54:32','0'),(473,0,'yuda','127.0.0.1','2020-01-05 12:33:16','1'),(474,0,'yuda','127.0.0.1','2020-01-05 12:33:19','0');

/*Table structure for table `mywebs_users` */

DROP TABLE IF EXISTS `mywebs_users`;

CREATE TABLE `mywebs_users` (
  `uid` varchar(12) NOT NULL,
  `store_id` int(8) DEFAULT NULL,
  `lid` int(5) DEFAULT NULL,
  `full_name` varchar(50) DEFAULT NULL,
  `photo` varchar(100) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `pass` varchar(50) DEFAULT NULL,
  `addrs` text,
  `mobile_1` varchar(15) DEFAULT NULL,
  `mobile_2` varchar(15) DEFAULT NULL,
  `ip` varchar(20) DEFAULT NULL,
  `cnt_fail` tinyint(5) DEFAULT NULL,
  `sid` varchar(50) DEFAULT NULL,
  `aktif` enum('Y','N') DEFAULT NULL,
  `sts` enum('ON','OFF') NOT NULL DEFAULT 'OFF',
  `last_in` datetime DEFAULT NULL,
  `last_out` datetime DEFAULT NULL,
  `create_date` datetime NOT NULL,
  `create_by` varchar(12) DEFAULT 'SYS',
  `last_update` datetime DEFAULT NULL,
  `last_update_by` varchar(12) DEFAULT NULL,
  PRIMARY KEY (`uid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `mywebs_users` */

insert  into `mywebs_users`(`uid`,`store_id`,`lid`,`full_name`,`photo`,`email`,`pass`,`addrs`,`mobile_1`,`mobile_2`,`ip`,`cnt_fail`,`sid`,`aktif`,`sts`,`last_in`,`last_out`,`create_date`,`create_by`,`last_update`,`last_update_by`) values ('A000001',1,2,'Test Name','ea12af8995772487199b908755430877_20170831221228_IMG_20120616_154244.jpg','test@gmail.com','97db1846570837fce6ff62a408f1c26a','Test alamat','12345678','098987878','::1',NULL,'','Y','OFF','2017-09-14 15:10:18','2017-09-14 15:43:14','2017-05-06 23:05:13','yuda','2017-08-31 22:12:28','yuda'),('bukit',6,7,'bukit',NULL,'bukit@example.com','4297f44b13955235245b2497399d7a93','-',NULL,NULL,'127.0.0.1',NULL,NULL,'Y','OFF','2018-01-05 11:15:10','2018-01-23 11:24:26','2018-01-05 11:05:43','yuda','2018-01-23 11:24:26','yuda'),('fetto',6,1,'fetto',NULL,'fetto@gmail.com','4297f44b13955235245b2497399d7a93','',NULL,NULL,'127.0.0.1',NULL,'b979b24ad8f33da0b92794edc6b4760e','Y','ON','2018-10-30 21:10:11','2018-10-30 19:21:25','2018-08-06 18:37:02','yuda',NULL,NULL),('kampret02',6,7,'kampret',NULL,'kampret@gmail.com','3c7f44e75dbe4568ba46db5fa8ee4d0d','--',NULL,NULL,'127.0.0.1',NULL,'','Y','OFF','2018-10-02 09:48:11','2018-10-02 09:53:49','2018-01-10 18:03:03','yuda','2018-01-23 11:24:22','yuda'),('mememei',3,2,'meilinda','yuda_59550f4b182f66ea00d334aeb1ec8fff_20170830_bukti.jpg','meilindayudisetiani@gmail.com','cb32680debebb48f8fb8a09965d7bfd4','','081321761616','0989878781',NULL,NULL,NULL,'Y','',NULL,NULL,'2017-08-30 22:52:36','yuda',NULL,NULL),('timkacrut',6,6,'tim kacrut',NULL,'kacrut@gmail.com','b6ecbac45c48a94105a88bf44a9eaf46','',NULL,NULL,'127.0.0.1',NULL,NULL,'Y','OFF','2018-01-08 16:56:55','2018-01-23 11:24:43','2018-01-02 19:11:08','yuda','2018-01-23 11:24:43','yuda'),('TIMKACRUT01',6,3,'timkacrut01',NULL,'TIMKACRUT01@gmail.com','94c9569c237b6f7ee7401079247c80e2','Perumahan Kampret',NULL,NULL,NULL,NULL,NULL,'Y','OFF',NULL,NULL,'2018-01-08 17:00:58','timkacrut',NULL,NULL),('wahyu',1,6,'wahyu','ea12af8995772487199b908755430877_20170831171452_office-technology.jpg','-','32c9e71e866ecdbc93e497482aa6779f','dvdsvds','081321761616','0989878781','127.0.0.1',NULL,'17f7009148b918ca40c28d320451760f','Y','ON','2019-03-04 22:03:29','2018-01-23 11:24:38','2017-08-30 23:02:20','yuda','2018-01-23 11:24:38','yuda'),('yogi',6,1,'yogi',NULL,'yogi@hmail.com','0eaa10e0fe071aad556b744f8cf4970e','sd',NULL,NULL,'127.0.0.1',NULL,'8767d1f4ea898a3078c52341264750bd','Y','ON','2018-12-20 13:47:56','2018-10-26 14:10:13','2018-07-18 18:06:20','yuda','2018-10-26 14:10:00','yuda'),('yuda',2,1,'Yuda','b414bb97b14b8a3aa4fa848f57626e04_20170906003510_IMG_20120616_154244.jpg','yudaadp@gmail.com','43532d0762a8516d395d8e603d161b10','','','','127.0.0.1',NULL,'fba541a4a5acb889ba38995510c82d2f','Y','ON','2020-01-05 12:33:19','2020-01-02 00:30:57','2017-05-06 23:03:45','SYS','2017-12-21 13:49:25','yuda');

/*Table structure for table `mywebs_version` */

DROP TABLE IF EXISTS `mywebs_version`;

CREATE TABLE `mywebs_version` (
  `id` int(5) unsigned NOT NULL AUTO_INCREMENT,
  `v_cd` varchar(30) DEFAULT NULL,
  `v_pub` varchar(10) DEFAULT NULL,
  `v_dtl` varchar(15) DEFAULT NULL,
  `changes_log` text,
  `createdate` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `mywebs_version` */

insert  into `mywebs_version`(`id`,`v_cd`,`v_pub`,`v_dtl`,`changes_log`,`createdate`) values (1,'beta','1.0','1.0.0','first build','2017-08-04 21:07:24');

/* Procedure structure for procedure `change_pass` */

/*!50003 DROP PROCEDURE IF EXISTS  `change_pass` */;

DELIMITER $$

/*!50003 CREATE PROCEDURE `change_pass`(
    p_uid VARCHAR(12),
    p_pwd varchar(50),
    p_userid VARCHAR(12),
    OUT retval INT(5)
    )
BEGIN
    DECLARE CONTINUE HANDLER FOR SQLSTATE '23000' BEGIN END ;
    
   UPDATE mywebs_users SET pass=p_pwd, last_update=NOW(), last_update_by=p_userid WHERE uid=p_uid;
	sET retval = 201;
	SELECT retval;
    END */$$
DELIMITER ;

/* Procedure structure for procedure `change_pic` */

/*!50003 DROP PROCEDURE IF EXISTS  `change_pic` */;

DELIMITER $$

/*!50003 CREATE PROCEDURE `change_pic`(
    p_uid VARCHAR(12),
    p_pic varchar(100),
    p_userid VARCHAR(12),
    OUT retval INT(5)
    )
BEGIN
   DECLARE CONTINUE HANDLER FOR SQLSTATE '23000' BEGIN END ;
   UPDATE mywebs_users SET photo=p_pic, last_update=NOW(), last_update_by=p_userid WHERE uid=p_uid;
	SET retval = 201;
SELECT retval;
    END */$$
DELIMITER ;

/* Procedure structure for procedure `change_store` */

/*!50003 DROP PROCEDURE IF EXISTS  `change_store` */;

DELIMITER $$

/*!50003 CREATE PROCEDURE `change_store`(
    p_id int(5),
    p_usr varchar(12)
    )
BEGIN
	UPDATE mywebs_users SET store_id=p_id WHERE uid=p_usr;
	insert into mywebs_store_hs values (null, p_usr, p_id, now());
	
    END */$$
DELIMITER ;

/* Procedure structure for procedure `create_handcash_logs` */

/*!50003 DROP PROCEDURE IF EXISTS  `create_handcash_logs` */;

DELIMITER $$

/*!50003 CREATE PROCEDURE `create_handcash_logs`(
    ref_id bigint(8),
    str_id int(8),
    cash_before decimal(25,2),
    cash_add decimal(25,2),
    userid varchar(12)
    )
BEGIN
	insert into mywebs_cash_register_hs
		values (ref_id, str_id, cash_before, cash_add, NOW(), userid);
    END */$$
DELIMITER ;

/* Procedure structure for procedure `create_level` */

/*!50003 DROP PROCEDURE IF EXISTS  `create_level` */;

DELIMITER $$

/*!50003 CREATE PROCEDURE `create_level`(
    in p_name varchar(15),
    in p_desc varchar(30),
    in p_userid varchar(12),
    out errno varchar(5)
    )
BEGIN
    DECLARE last_id INT(5);
    DECLARE CONTINUE HANDLER FOR SQLSTATE '23000' BEGIN END ;
    
if exists(select 'x' FROM mywebs_level WHERE level_name=p_name) then
begin
	set errno='400';
end;
else
begin
	INSERT INTO mywebs_level (level_name, level_desc, create_date, create_by, `sts`) 
	VALUES (p_name, p_desc, NOW(), p_userid, 'Y');
	set last_id = LAST_INSERT_ID();
	
	call generate_mods (last_id);
	set errno = '201';
end;
end if;
select errno;
END */$$
DELIMITER ;

/* Procedure structure for procedure `create_mods` */

/*!50003 DROP PROCEDURE IF EXISTS  `create_mods` */;

DELIMITER $$

/*!50003 CREATE PROCEDURE `create_mods`(
    in p_mn tinyint(3),
    in p_mod varchar(35),
    in p_modnm varchar(35),
    in p_moddtl varchar(100),
    in p_modloc varchar(100),
    in p_show enum('Y','N'),
    in p_set tinyint(5),
    in p_user varchar(12),
    out retval varchar(5)
    )
BEGIN
    DECLARE last_id INT(8);
    DECLARE CONTINUE HANDLER FOR SQLSTATE '23000' BEGIN END ;
    
if exists(select 'x' FROM mywebs_modul WHERE mod_name=p_modnm) then
begin
	set retval='400';
end;
else
begin
	INSERT INTO mywebs_modul (`mn_id`, `mod`, `mod_name`, `mod_detail`, `mod_location`, `sts`, `show`, `set_order`, `create_date`, `create_by`) 
	VALUES (p_mn, p_mod, p_modnm, p_moddtl, p_modloc, 'Y', p_show, p_set, NOW(), p_user);
	set last_id = LAST_INSERT_ID();
	
	call generate_mods_all (last_id);
	set retval = '201';
end;
end if;
select retval;
END */$$
DELIMITER ;

/* Procedure structure for procedure `addtocart` */

/*!50003 DROP PROCEDURE IF EXISTS  `addtocart` */;

DELIMITER $$

/*!50003 CREATE PROCEDURE `addtocart`(
    p_ssid varchar(20),
    p_inv varchar(10),
    p_enddate date,
    p_user varchar(12),
    p_cust_id int(8),
    p_cust varchar(20),
    p_id int(8),
    p_qty decimal(12,2),
    p_paid decimal(12,2),
    p_note varchar(220),
    out retval int(8)
    )
BEGIN
SELECT price, satuan INTO @price, @satuan FROM mywebs_products WHERE id=p_id;
    if exists(select 'x' from mywebs_transaction where scd=p_ssid) then
	select id into @sale_id from mywebs_transaction where scd=p_ssid;
	INSERT INTO mywebs_trx_products set refid=@sale_id, prod_id=p_id, price=@price, qty=p_qty, sub_ttl=@price * p_qty;
    else
	insert into mywebs_transaction set id=null, scd=p_ssid, inv_cd=p_inv, cust_id=p_cust_id, cust_nm=p_cust, trx_date=NOW(), grab_date=p_enddate, paid=p_paid, remarks=p_note, prog_sts='NEW', createby=p_user, createdate=now();
	select last_insert_id() into @sale_id;
	INSERT INTO mywebs_trx_products SET refid=@sale_id, prod_id=p_id, price=@price, qty=p_qty, sub_ttl=@price * p_qty;
    end if;
    
    	SELECT SUM(sub_ttl) INTO @total FROM mywebs_trx_products WHERE refid=@sale_id;
	UPDATE mywebs_transaction SET grab_date=p_enddate, total=@total, paid=p_paid, remarks=p_note, prog_sts='NEW' WHERE id=@sale_id AND scd=p_ssid;
	set retval = @sale_id;
	select retval;
END */$$
DELIMITER ;

/* Procedure structure for procedure `create_handcash` */

/*!50003 DROP PROCEDURE IF EXISTS  `create_handcash` */;

DELIMITER $$

/*!50003 CREATE PROCEDURE `create_handcash`(
    in str_id int(8),
    in cash_in decimal(25,2),
    in userid varchar(12)
    )
BEGIN
    if exists (select 'x' from mywebs_cash_register where store_id=str_id and cast(csh_open_dt as date)=CAST(NOW() AS DATE) and `status`='open') then
	select id, ifnull(csh_open,0), ifnull(csh_sale,0), ifnull(csh_adjust,0) into @refid, @cash_open, @cash_sales, @cash_adjust 
		from mywebs_cash_register 
			where store_id=str_id AND CAST(csh_open_dt AS DATE)=CAST(NOW() AS DATE) AND `status`='open';
	
	select @cash_open + @cash_sales + @cash_adjust into @cash_total;
	UPDATE mywebs_cash_register set csh_adjust=@cash_adjust + cash_in, csh_total= cash_in + @cash_total 
		where store_id=str_id AND CAST(csh_open_dt AS DATE)=CAST(NOW() AS DATE) AND `status`='open';
	call create_handcash_logs (@refid, str_id, @cash_total, cash_in, userid);
    else
	insert into mywebs_cash_register (store_id, csh_open_dt, open_by, csh_open, csh_total, `status`) 
		value (str_id, now(), userid, cash_in, cash_in, 'open');
	select id into @new_id from mywebs_cash_register where store_id=str_id AND CAST(csh_open_dt AS DATE)=CAST(NOW() AS DATE) AND `status`='open';
	CALL create_handcash_logs (@new_id, str_id, 0 , cash_in, userid);
    end if;
    END */$$
DELIMITER ;

/* Procedure structure for procedure `create_users` */

/*!50003 DROP PROCEDURE IF EXISTS  `create_users` */;

DELIMITER $$

/*!50003 CREATE PROCEDURE `create_users`(
    p_uid varchar(12),
    p_store int(8),
    p_lvl int(5),
    p_pass varchar(50),
    p_name varchar(30),
    p_address text,
    p_mail varchar(65),
    p_userid varchar(12),
    out retval int(5)
    )
BEGIN
    DECLARE CONTINUE HANDLER FOR SQLSTATE '23000' BEGIN END ;
    
    if exists(select 'x' from mywebs_users where uid=p_uid) then
	set retval = 400;
    else
	insert into mywebs_users (uid, store_id, lid, full_name, email, pass, addrs, aktif, create_date, create_by)
			values (p_uid, p_store, p_lvl, p_name, p_mail, p_pass, p_address,'Y', NOW(), p_userid);
	-- INSERT INTO mywebs_store_hs VALUES (NULL, p_uid, p_store, NOW());
	set retval = 201;
    end if;
	select retval;
    END */$$
DELIMITER ;

/* Procedure structure for procedure `delfromcart` */

/*!50003 DROP PROCEDURE IF EXISTS  `delfromcart` */;

DELIMITER $$

/*!50003 CREATE PROCEDURE `delfromcart`(
    p_ssid varchar(100),
    p_item bigint(12),
    out retval int(8)
    )
BEGIN
SELECT refid, sub_ttl INTO @sale_id, @price FROM mywebs_fake_sales_item WHERE id=p_item;
delete from mywebs_fake_sales_item where id=p_item;
UPDATE mywebs_fake_sales SET total=total-@price WHERE id=@sale_id && scd=p_ssid;
set retval = @sale_id;
select retval;
END */$$
DELIMITER ;

/* Procedure structure for procedure `edit_users` */

/*!50003 DROP PROCEDURE IF EXISTS  `edit_users` */;

DELIMITER $$

/*!50003 CREATE PROCEDURE `edit_users`(
    p_uid VARCHAR(12),
    p_lvl INT(5),
    p_store int(8),
    p_actv char(1),
    p_name VARCHAR(50),
    p_address TEXT,
    p_mail VARCHAR(65),
    p_hp1 VARCHAR(15),
    p_hp2 VARCHAR(15),
    p_userid VARCHAR(12),
    OUT retval INT(5)
    )
BEGIN
    DECLARE CONTINUE HANDLER FOR SQLSTATE '23000' BEGIN END ;
    
   UPDATE mywebs_users SET store_id=p_store, lid=p_lvl, full_name=p_name, email=p_mail, addrs=p_address, mobile_1=p_hp1, mobile_2=p_hp2, aktif=p_actv, last_update=now(), last_update_by=p_userid
	WHERE uid=p_uid;
	sET retval = 201;
	SELECT retval;
    END */$$
DELIMITER ;

/* Procedure structure for procedure `generate_mods` */

/*!50003 DROP PROCEDURE IF EXISTS  `generate_mods` */;

DELIMITER $$

/*!50003 CREATE PROCEDURE `generate_mods`(
IN p_lid INT(5)
)
BEGIN
DECLARE CONTINUE HANDLER FOR SQLSTATE '23000' BEGIN END ;
IF EXISTS (SELECT 'x' FROM mywebs_modul WHERE id NOT IN (SELECT `mid` FROM mywebs_modul_role WHERE lid=p_lid)) then
	begin
		INSERT INTO mywebs_modul_role (`lid`, `mid`, `gid`, `sts`)
		SELECT p_lid, id, '8', '1' FROM  mywebs_modul WHERE id NOT IN 
			(SELECT `mid` FROM mywebs_modul_role WHERE lid=p_lid);
		UPDATE mywebs_modul_role SET gid='7', sts='0' WHERE `mid` IN (44,45);
	end;
end if;
END */$$
DELIMITER ;

/* Procedure structure for procedure `generate_mods_all` */

/*!50003 DROP PROCEDURE IF EXISTS  `generate_mods_all` */;

DELIMITER $$

/*!50003 CREATE PROCEDURE `generate_mods_all`(
IN p_id INT(5)
)
BEGIN
DECLARE CONTINUE HANDLER FOR SQLSTATE '23000' BEGIN END ;
	INSERT INTO mywebs_modul_role (`lid`, `mid`, `gid`, `sts`)
		SELECT id, p_id, '8', '1' FROM  mywebs_level WHERE id NOT IN 
		(SELECT `lid` FROM mywebs_modul_role WHERE `mid`=p_id);
	-- update mywebs_modul_role SET gid='7' where `mid` in (44,45);
END */$$
DELIMITER ;

/* Procedure structure for procedure `kill_session` */

/*!50003 DROP PROCEDURE IF EXISTS  `kill_session` */;

DELIMITER $$

/*!50003 CREATE PROCEDURE `kill_session`(
    p_uid varchar(12),
    p_user VARCHAR(12),
    out retval int(3)
    )
BEGIN
	UPDATE mywebs_users set sid=null, sts='OFF', last_out=NOW(), last_update=NOW(), last_update_by=p_user
		WHERE uid=p_uid;
	set retval = '201.1';
	select retval;
    END */$$
DELIMITER ;

/* Procedure structure for procedure `upd_level` */

/*!50003 DROP PROCEDURE IF EXISTS  `upd_level` */;

DELIMITER $$

/*!50003 CREATE PROCEDURE `upd_level`(
    in p_id int(5),
    in p_name varchar(15),
    in p_desc varchar(30),
    in p_userid varchar(12),
    in p_sts char(1)
    )
BEGIN
    DECLARE last_id INT(5);
    DECLARE CONTINUE HANDLER FOR SQLSTATE '23000' BEGIN END ;
    
	update mywebs_level set level_name=p_name, level_desc=p_desc, `sts`=p_sts, updateby=p_userid, lastupdate=now()
		where id=p_id;
END */$$
DELIMITER ;

/*Table structure for table `permission_group` */

DROP TABLE IF EXISTS `permission_group`;

/*!50001 DROP VIEW IF EXISTS `permission_group` */;
/*!50001 DROP TABLE IF EXISTS `permission_group` */;

/*!50001 CREATE TABLE  `permission_group`(
 `groupid` int(5) unsigned ,
 `role` int(5) ,
 `role_desc` text ,
 `createdate` datetime ,
 `createby` varchar(12) 
)*/;

/*Table structure for table `userslist` */

DROP TABLE IF EXISTS `userslist`;

/*!50001 DROP VIEW IF EXISTS `userslist` */;
/*!50001 DROP TABLE IF EXISTS `userslist` */;

/*!50001 CREATE TABLE  `userslist`(
 `uid` varchar(12) ,
 `lid` int(5) ,
 `full_name` varchar(50) ,
 `email` varchar(50) ,
 `pass` varchar(50) ,
 `addrs` text ,
 `ip` varchar(20) ,
 `cnt_fail` tinyint(5) ,
 `sid` varchar(50) ,
 `aktif` enum('Y','N') ,
 `sts` enum('ON','OFF') ,
 `last_in` datetime ,
 `last_out` datetime ,
 `create_date` datetime ,
 `create_by` varchar(12) ,
 `last_update` datetime ,
 `last_update_by` varchar(12) ,
 `level_name` varchar(15) 
)*/;

/*View structure for view permission_group */

/*!50001 DROP TABLE IF EXISTS `permission_group` */;
/*!50001 DROP VIEW IF EXISTS `permission_group` */;

/*!50001 CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `permission_group` AS select `mywebs_permission_group`.`groupid` AS `groupid`,`mywebs_permission_group`.`role` AS `role`,group_concat(distinct `mywebs_permission`.`bit_name` order by `mywebs_permission`.`bit_name` ASC separator ',') AS `role_desc`,`mywebs_permission_group`.`createdate` AS `createdate`,`mywebs_permission_group`.`createby` AS `createby` from (`mywebs_permission_group` left join `mywebs_permission` on((`mywebs_permission_group`.`role` & `mywebs_permission`.`bit`))) group by `mywebs_permission_group`.`groupid` */;

/*View structure for view userslist */

/*!50001 DROP TABLE IF EXISTS `userslist` */;
/*!50001 DROP VIEW IF EXISTS `userslist` */;

/*!50001 CREATE ALGORITHM=TEMPTABLE SQL SECURITY DEFINER VIEW `userslist` AS select `u`.`uid` AS `uid`,`u`.`lid` AS `lid`,`u`.`full_name` AS `full_name`,`u`.`email` AS `email`,`u`.`pass` AS `pass`,`u`.`addrs` AS `addrs`,`u`.`ip` AS `ip`,`u`.`cnt_fail` AS `cnt_fail`,`u`.`sid` AS `sid`,`u`.`aktif` AS `aktif`,`u`.`sts` AS `sts`,`u`.`last_in` AS `last_in`,`u`.`last_out` AS `last_out`,`u`.`create_date` AS `create_date`,`u`.`create_by` AS `create_by`,`u`.`last_update` AS `last_update`,`u`.`last_update_by` AS `last_update_by`,`l`.`level_name` AS `level_name` from (`mywebs_users` `u` join `mywebs_level` `l` on((`u`.`lid` = `l`.`id`))) */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
