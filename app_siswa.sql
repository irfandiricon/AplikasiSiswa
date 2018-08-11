/*
SQLyog Ultimate v11.11 (64 bit)
MySQL - 5.5.5-10.1.19-MariaDB : Database - app_siswa
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`app_siswa` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `app_siswa`;

/*Table structure for table `app_guru` */

DROP TABLE IF EXISTS `app_guru`;

CREATE TABLE `app_guru` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `nip` varchar(30) DEFAULT NULL,
  `nama_lengkap` varchar(50) DEFAULT NULL,
  `tempat_lahir` varchar(50) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `jenis_kelamin` enum('L','P') DEFAULT NULL,
  `alamat` text,
  `email` varchar(50) DEFAULT NULL,
  `no_telp` varchar(20) DEFAULT NULL,
  `id_sekolah` int(11) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_date` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_date` datetime DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL,
  `flag_aktif` enum('Y','N') DEFAULT 'Y',
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `app_guru` */

/*Table structure for table `app_menu` */

DROP TABLE IF EXISTS `app_menu`;

CREATE TABLE `app_menu` (
  `id_menu` int(11) NOT NULL AUTO_INCREMENT,
  `id_group_menu` int(11) NOT NULL,
  `nama_menu` varchar(100) NOT NULL,
  `path` varchar(100) DEFAULT NULL,
  `nama_file` varchar(100) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_date` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_date` datetime DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL,
  `flag_aktif` enum('Y','N') DEFAULT 'Y',
  PRIMARY KEY (`id_menu`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

/*Data for the table `app_menu` */

insert  into `app_menu`(`id_menu`,`id_group_menu`,`nama_menu`,`path`,`nama_file`,`created_date`,`created_by`,`updated_date`,`updated_by`,`deleted_date`,`deleted_by`,`flag_aktif`) values (1,1,'Pengaturan Menu','setting/app_menu','index.php','2018-08-04 13:32:31',1,NULL,NULL,NULL,NULL,'Y'),(4,3,'Master Akses','content/app_menu','index.php','2018-08-10 19:21:23',1,NULL,NULL,NULL,NULL,'Y'),(7,6,'Data Siswa','content/master_data_siswa','index.php','2018-08-11 06:30:41',1,NULL,NULL,NULL,NULL,'Y'),(8,6,'Data Guru','master_data_guru','index.php','2018-08-11 06:31:12',1,NULL,NULL,NULL,NULL,'Y'),(9,6,'Data Sekolah','content/master_data_sekolah','index.php','2018-08-11 06:33:27',1,NULL,NULL,NULL,NULL,'Y');

/*Table structure for table `app_menu_group` */

DROP TABLE IF EXISTS `app_menu_group`;

CREATE TABLE `app_menu_group` (
  `id_group_menu` int(11) NOT NULL AUTO_INCREMENT,
  `font_icon` char(100) DEFAULT NULL,
  `nama_group_menu` varchar(100) NOT NULL,
  `created_date` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_date` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_date` datetime DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL,
  `flag_aktif` enum('Y','N') DEFAULT 'Y',
  PRIMARY KEY (`id_group_menu`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

/*Data for the table `app_menu_group` */

insert  into `app_menu_group`(`id_group_menu`,`font_icon`,`nama_group_menu`,`created_date`,`created_by`,`updated_date`,`updated_by`,`deleted_date`,`deleted_by`,`flag_aktif`) values (1,'fa fa-desktop','Pengaturan','2018-08-04 13:30:15',NULL,NULL,NULL,NULL,NULL,'Y'),(6,'fa fa-book','Pusat Data','2018-08-11 06:28:45',1,NULL,NULL,NULL,NULL,'Y');

/*Table structure for table `app_sekolah` */

DROP TABLE IF EXISTS `app_sekolah`;

CREATE TABLE `app_sekolah` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) DEFAULT NULL,
  `alamat` text,
  `no_telpon` varchar(20) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_date` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_date` datetime DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL,
  `flag_aktif` enum('Y') DEFAULT 'Y',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `app_sekolah` */

insert  into `app_sekolah`(`id`,`nama`,`alamat`,`no_telpon`,`created_date`,`created_by`,`updated_date`,`updated_by`,`deleted_date`,`deleted_by`,`flag_aktif`) values (1,'SMPN 4 PARIAMAN','PARIAMAN','0751-292929',NULL,NULL,NULL,NULL,NULL,NULL,'Y'),(2,'SMKN 1 PADANG','PADANG','0751-289191',NULL,NULL,NULL,NULL,NULL,NULL,'Y'),(3,'SMKN 2 PADANG','PADANG','0751-289192',NULL,NULL,NULL,NULL,NULL,NULL,'Y');

/*Table structure for table `app_siswa` */

DROP TABLE IF EXISTS `app_siswa`;

CREATE TABLE `app_siswa` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `nis` varchar(30) DEFAULT NULL,
  `nama_lengkap` varchar(50) DEFAULT NULL,
  `tempat_lahir` varchar(50) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `jenis_kelamin` enum('L','P') DEFAULT NULL,
  `alamat` text,
  `email` varchar(50) DEFAULT NULL,
  `no_telp` varchar(20) DEFAULT NULL,
  `id_sekolah` int(11) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_date` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_date` datetime DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL,
  `flag_aktif` enum('Y','N') DEFAULT 'Y',
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `app_siswa` */

/*Table structure for table `app_user` */

DROP TABLE IF EXISTS `app_user`;

CREATE TABLE `app_user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `nama_lengkap` varchar(50) DEFAULT NULL,
  `level` enum('1','2','3') DEFAULT '3',
  `created_date` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_date` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_date` datetime DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL,
  `flag_aktif` enum('Y','N') DEFAULT 'Y',
  `last_login` datetime DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `app_user` */

insert  into `app_user`(`user_id`,`username`,`password`,`nama_lengkap`,`level`,`created_date`,`created_by`,`updated_date`,`updated_by`,`deleted_date`,`deleted_by`,`flag_aktif`,`last_login`) values (1,'irfandi','202cb962ac59075b964b07152d234b70','Irfandi Ricon','1','2018-08-04 13:31:12',1,NULL,NULL,NULL,NULL,'Y',NULL),(2,'sherly','202cb962ac59075b964b07152d234b70','Sherly Prima Yani','2','2018-08-11 06:36:19',1,NULL,NULL,NULL,NULL,'Y',NULL);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
