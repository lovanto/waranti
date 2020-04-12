/*
SQLyog Professional v12.09 (64 bit)
MySQL - 10.1.9-MariaDB : Database - waranti_db
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`waranti_db` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `waranti_db`;

/*Table structure for table `karyawan` */

DROP TABLE IF EXISTS `karyawan`;

CREATE TABLE `karyawan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `npk` int(11) NOT NULL,
  `nama_karyawan` varchar(50) NOT NULL,
  `jk` varchar(10) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `no_telp` varchar(13) NOT NULL,
  `no_ktp` int(11) NOT NULL,
  `email` varchar(35) NOT NULL,
  `tgl_masuk` date NOT NULL,
  `status_karyawan` varchar(30) NOT NULL,
  `qr_code` varchar(50) NOT NULL,
  `user_create` varchar(50) DEFAULT NULL,
  `create_date` date DEFAULT NULL,
  `user_update` varchar(50) DEFAULT NULL,
  `update_date` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `karyawan` */

insert  into `karyawan`(`id`,`npk`,`nama_karyawan`,`jk`,`tgl_lahir`,`alamat`,`no_telp`,`no_ktp`,`email`,`tgl_masuk`,`status_karyawan`,`qr_code`,`user_create`,`create_date`,`user_update`,`update_date`) values (4,12,'wulan','perempuan','1994-09-13','dusun sukawening desa hegarmanah rt 04 rw 06','085715329867',2147483647,'wulammariaulfah@gmail.com','2020-02-13','Kontrak','.png','dani hamdani','2020-04-11',NULL,NULL);

/*Table structure for table `kendaraan` */

DROP TABLE IF EXISTS `kendaraan`;

CREATE TABLE `kendaraan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nopol` varchar(100) NOT NULL,
  `model` varchar(100) NOT NULL,
  `tipe_mesin` varchar(100) NOT NULL,
  `model_kendaraan` varchar(100) NOT NULL,
  `vin_rangka` varchar(100) NOT NULL,
  `kilometer` varchar(100) NOT NULL,
  `qr_code` varchar(50) NOT NULL,
  `user_create` varchar(100) NOT NULL,
  `create_date` date NOT NULL,
  `user_update` varchar(100) NOT NULL,
  `update_date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `kendaraan` */

insert  into `kendaraan`(`id`,`nopol`,`model`,`tipe_mesin`,`model_kendaraan`,`vin_rangka`,`kilometer`,`qr_code`,`user_create`,`create_date`,`user_update`,`update_date`) values (1,'D65411','avanza','tipeuting','sdhagd','19821928','131313313','sdhagd.png','dani hamdani','2020-04-12','dani hamdani','2020-04-12');

/*Table structure for table `level` */

DROP TABLE IF EXISTS `level`;

CREATE TABLE `level` (
  `id_level` int(11) NOT NULL AUTO_INCREMENT,
  `nama_level` varchar(20) NOT NULL,
  PRIMARY KEY (`id_level`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `level` */

insert  into `level`(`id_level`,`nama_level`) values (1,'admin'),(2,'checker'),(3,'owner'),(4,'pelanggan');

/*Table structure for table `rak` */

DROP TABLE IF EXISTS `rak`;

CREATE TABLE `rak` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `no_rak` int(11) NOT NULL,
  `nama_rak` varchar(50) NOT NULL,
  `qr_code` varchar(50) NOT NULL,
  `user_create` varchar(100) DEFAULT NULL,
  `create_date` date DEFAULT NULL,
  `user_update` varchar(100) DEFAULT NULL,
  `update_date` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

/*Data for the table `rak` */

insert  into `rak`(`id`,`no_rak`,`nama_rak`,`qr_code`,`user_create`,`create_date`,`user_update`,`update_date`) values (2,111,'kastilion','0111.png','dani hamdani','2020-04-11','dani hamdani','2020-04-11'),(3,120,'aaaa','120.png','dani hamdani','2020-04-11',NULL,NULL),(4,22,'rok','22.png','dani hamdani','2020-04-11',NULL,NULL),(5,400,'JULID','400.png','dani hamdani','2020-04-11',NULL,NULL),(6,21,'aaaaaaaaaaaaaaaaaaa','21.png','dani hamdani','2020-04-11',NULL,NULL),(7,55,'esien','55.png','dani hamdani','2020-04-11',NULL,NULL),(9,89,'suqi','89.png','dani hamdani','2020-04-11',NULL,NULL),(11,56,'dani hamdani','dani hamdani.png','dani hamdani','2020-04-11',NULL,NULL),(12,8999,'lovanto jurig','lovanto jurig.png','dani hamdani','2020-04-11',NULL,NULL),(13,999,'juriggg','juriggg.png','dani hamdani','2020-04-11',NULL,NULL);

/*Table structure for table `sparepart` */

DROP TABLE IF EXISTS `sparepart`;

CREATE TABLE `sparepart` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `no_part` varchar(50) NOT NULL,
  `deskripsi` varchar(50) NOT NULL,
  `qr_code` varchar(50) NOT NULL,
  `user_create` varchar(50) NOT NULL,
  `create_date` date NOT NULL,
  `user_update` varchar(50) NOT NULL,
  `update_date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `sparepart` */

insert  into `sparepart`(`id`,`no_part`,`deskripsi`,`qr_code`,`user_create`,`create_date`,`user_update`,`update_date`) values (1,'D04465-BZ153-000','PAD KIT, DISC BRAKE ,BRACKER','D04465-BZ153-000.png','dani hamdani','2020-04-11','dani hamdani','2020-04-11'),(2,'D04478-BZ060-001','\"CYLINDER KIT, FR DISC BRAKE\"','D04478-BZ060-001.png','dani hamdani','2020-04-11','','0000-00-00');

/*Table structure for table `user` */

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(10) NOT NULL,
  `password` varchar(20) NOT NULL,
  `nama_user` varchar(20) NOT NULL,
  `id_level` int(20) NOT NULL,
  `user_create` varchar(50) NOT NULL,
  `create_date` date NOT NULL,
  `user_update` varchar(50) NOT NULL,
  `update_date` date NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

/*Data for the table `user` */

insert  into `user`(`id_user`,`username`,`password`,`nama_user`,`id_level`,`user_create`,`create_date`,`user_update`,`update_date`) values (1,'dani','dani','dani hamdani',1,'','0000-00-00','','0000-00-00'),(7,'wulan','eulan','wulan maria ulfah',3,'','0000-00-00','','0000-00-00'),(8,'ouu','dani','juara',4,'','0000-00-00','dani hamdani','2020-01-24'),(9,'gila','dani','juara',2,'dani hamdani','2020-01-24','dani hamdani','2020-01-25'),(10,'Wulantok','wulan','Wulantok',1,'dani hamdani','2020-02-21','dani hamdani','2020-04-10');

/*Table structure for table `login` */

DROP TABLE IF EXISTS `login`;

/*!50001 DROP VIEW IF EXISTS `login` */;
/*!50001 DROP TABLE IF EXISTS `login` */;

/*!50001 CREATE TABLE  `login`(
 `id_user` int(11) ,
 `username` varchar(10) ,
 `password` varchar(20) ,
 `nama_user` varchar(20) ,
 `user_create` varchar(50) ,
 `create_date` date ,
 `user_update` varchar(50) ,
 `update_date` date ,
 `id_level` int(11) ,
 `nama_level` varchar(20) 
)*/;

/*View structure for view login */

/*!50001 DROP TABLE IF EXISTS `login` */;
/*!50001 DROP VIEW IF EXISTS `login` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `login` AS select `user`.`id_user` AS `id_user`,`user`.`username` AS `username`,`user`.`password` AS `password`,`user`.`nama_user` AS `nama_user`,`user`.`user_create` AS `user_create`,`user`.`create_date` AS `create_date`,`user`.`user_update` AS `user_update`,`user`.`update_date` AS `update_date`,`level`.`id_level` AS `id_level`,`level`.`nama_level` AS `nama_level` from (`user` left join `level` on((`user`.`id_level` = `level`.`id_level`))) */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
