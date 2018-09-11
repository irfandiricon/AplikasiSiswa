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

/*Table structure for table `app_bidang_layanan` */

DROP TABLE IF EXISTS `app_bidang_layanan`;

CREATE TABLE `app_bidang_layanan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `deskripsi` varchar(100) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_date` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `last_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `app_bidang_layanan` */

insert  into `app_bidang_layanan`(`id`,`deskripsi`,`created_date`,`created_by`,`updated_date`,`updated_by`,`last_update`) values (1,'Pribadi','2018-09-01 08:39:22',1,NULL,NULL,'2018-09-01 08:39:33'),(2,'Sosial','2018-09-01 08:39:53',1,NULL,NULL,'2018-09-01 08:39:52'),(3,'Belajar','2018-09-01 08:40:05',1,NULL,NULL,'2018-09-01 08:40:10'),(4,'Karir','2018-09-01 08:40:16',1,NULL,NULL,'2018-09-01 08:40:20');

/*Table structure for table `app_guru` */

DROP TABLE IF EXISTS `app_guru`;

CREATE TABLE `app_guru` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id_login` int(11) DEFAULT NULL,
  `nip` varchar(30) DEFAULT NULL,
  `nama_lengkap` varchar(50) DEFAULT NULL,
  `tempat_lahir` varchar(50) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT '0000-00-00',
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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `app_guru` */

insert  into `app_guru`(`user_id`,`user_id_login`,`nip`,`nama_lengkap`,`tempat_lahir`,`tanggal_lahir`,`jenis_kelamin`,`alamat`,`email`,`no_telp`,`id_sekolah`,`created_date`,`created_by`,`updated_date`,`updated_by`,`deleted_date`,`deleted_by`,`flag_aktif`) values (3,6,'','Guru 1','','2018-09-09','','','guru_1@gmail.com','021',10,'2018-09-03 00:57:18',NULL,'2018-09-09 01:41:25',6,NULL,NULL,'Y'),(4,7,NULL,'Guru 2',NULL,'0000-00-00',NULL,NULL,'guru_2@gmail.com','022',NULL,'2018-09-03 00:57:36',NULL,NULL,NULL,NULL,NULL,'Y'),(5,8,NULL,'Guru 3',NULL,'0000-00-00',NULL,NULL,'guru_3@gmail.com','023',NULL,'2018-09-03 00:57:50',NULL,'2018-09-03 00:58:23',1,NULL,NULL,'Y');

/*Table structure for table `app_jawaban` */

DROP TABLE IF EXISTS `app_jawaban`;

CREATE TABLE `app_jawaban` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `bidang_layanan` varchar(2) DEFAULT NULL,
  `id_pertanyaan` varchar(100) DEFAULT NULL,
  `jawaban` varchar(100) DEFAULT NULL,
  `jumlah` int(11) DEFAULT '0',
  `persentase` int(11) DEFAULT '0',
  `created_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

/*Data for the table `app_jawaban` */

insert  into `app_jawaban`(`id`,`user_id`,`bidang_layanan`,`id_pertanyaan`,`jawaban`,`jumlah`,`persentase`,`created_date`) values (16,3,'1','1,2,3,4,5,6,7,8,9,10,11,12','1,1,1,1,1,1,1,1,1,1,1,1',12,20,'2018-09-11 20:25:02'),(17,3,'2','13,14,15,16,17,18,19,20,21,22,23,24','1,1,1,1,1,1,1,1,1,1,1,1',12,20,'2018-09-11 20:25:08'),(18,3,'3','26,27,28','1,1,1',3,20,'2018-09-11 20:25:12'),(19,3,'4','29,30,31','1,1,1',3,20,'2018-09-11 20:25:16');

/*Table structure for table `app_komponen_layanan` */

DROP TABLE IF EXISTS `app_komponen_layanan`;

CREATE TABLE `app_komponen_layanan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `deskripsi` varchar(100) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_date` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `last_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `app_komponen_layanan` */

insert  into `app_komponen_layanan`(`id`,`deskripsi`,`created_date`,`created_by`,`updated_date`,`updated_by`,`last_update`) values (1,'Layanan Dasar','2018-09-01 08:41:09',1,NULL,NULL,'2018-09-01 08:41:12'),(2,'Layanan Responsive','2018-09-01 08:41:21',1,NULL,NULL,'2018-09-01 08:41:26');

/*Table structure for table `app_media_layanan` */

DROP TABLE IF EXISTS `app_media_layanan`;

CREATE TABLE `app_media_layanan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `deskripsi` varchar(100) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_date` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `last_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

/*Data for the table `app_media_layanan` */

insert  into `app_media_layanan`(`id`,`deskripsi`,`created_date`,`created_by`,`updated_date`,`updated_by`,`last_update`) values (1,'Vid','2018-09-01 08:42:37',NULL,NULL,NULL,'2018-09-01 08:42:40'),(2,'Slide','2018-09-01 08:42:50',NULL,NULL,NULL,'2018-09-01 08:42:53'),(3,'Kas','2018-09-01 10:08:10',NULL,NULL,NULL,'2018-09-01 09:07:07'),(4,'Sket','2018-09-01 09:08:19',NULL,NULL,NULL,'2018-09-01 09:07:23'),(5,'Lag','2018-09-01 09:08:21',NULL,NULL,NULL,'2018-09-01 09:07:25'),(6,'Lem','2018-09-01 09:08:23',NULL,NULL,NULL,'2018-09-01 09:07:38'),(7,'Inst','2018-09-01 09:08:25',NULL,NULL,NULL,'2018-09-01 09:07:40'),(8,'Flash','2018-09-01 09:08:26',NULL,NULL,NULL,'2018-09-01 09:08:02'),(9,'Menyesuaikan','2018-09-01 09:08:29',NULL,NULL,NULL,'2018-09-01 09:08:09');

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
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

/*Data for the table `app_menu` */

insert  into `app_menu`(`id_menu`,`id_group_menu`,`nama_menu`,`path`,`nama_file`,`created_date`,`created_by`,`updated_date`,`updated_by`,`deleted_date`,`deleted_by`,`flag_aktif`) values (1,1,'Pengaturan Menu','setting/app_menu','index.php','2018-08-04 13:32:31',1,NULL,NULL,NULL,NULL,'Y'),(4,3,'Master Akses','content/app_menu','index.php','2018-08-10 19:21:23',1,NULL,NULL,NULL,NULL,'Y'),(7,6,'Data Siswa','content/master_data_siswa','index.php','2018-08-11 06:30:41',1,NULL,NULL,NULL,NULL,'Y'),(8,6,'Data Guru','content/master_data_guru','index.php','2018-08-11 06:31:12',1,NULL,NULL,NULL,NULL,'Y'),(9,6,'Data Sekolah','content/master_data_sekolah','index.php','2018-08-11 06:33:27',1,NULL,NULL,NULL,NULL,'Y'),(10,6,'Data Pertanyaan','content/master_data_pertanyaan','index.php','2018-08-15 21:19:22',1,NULL,NULL,NULL,NULL,'Y');

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

insert  into `app_menu_group`(`id_group_menu`,`font_icon`,`nama_group_menu`,`created_date`,`created_by`,`updated_date`,`updated_by`,`deleted_date`,`deleted_by`,`flag_aktif`) values (1,'fa fa-desktop','Pengaturan','2018-08-04 13:30:15',NULL,NULL,NULL,NULL,NULL,''),(6,'fa fa-book','Pusat Data','2018-08-11 06:28:45',1,NULL,NULL,NULL,NULL,'Y');

/*Table structure for table `app_metode_layanan` */

DROP TABLE IF EXISTS `app_metode_layanan`;

CREATE TABLE `app_metode_layanan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `deskripsi` varchar(100) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_date` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `last_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

/*Data for the table `app_metode_layanan` */

insert  into `app_metode_layanan`(`id`,`deskripsi`,`created_date`,`created_by`,`updated_date`,`updated_by`,`last_update`) values (1,'Film review','2018-09-01 08:42:37',NULL,NULL,NULL,'2018-09-01 08:42:40'),(2,'Diskusi kelompok','2018-09-01 08:42:50',NULL,NULL,NULL,'2018-09-01 08:42:53'),(3,'Ceramah bervariasi','2018-09-01 08:54:13',NULL,NULL,NULL,'2018-09-01 08:53:39'),(4,'Mendatangkan narasumber orang sukses yang memiliki keterbatasan fisik','2018-09-01 08:54:15',NULL,NULL,NULL,'2018-09-01 08:53:48'),(5,'Jigsaw','2018-09-01 08:57:16',NULL,NULL,NULL,'2018-09-01 08:54:42'),(6,'Two stay two stray','2018-09-01 08:57:18',NULL,NULL,NULL,'2018-09-01 08:54:50'),(7,'Drill','2018-09-01 08:57:21',NULL,NULL,NULL,'2018-09-01 08:54:59'),(8,'Psikodrama','2018-09-01 08:57:23',NULL,NULL,NULL,'2018-09-01 08:55:13'),(9,'Sosiodrama','2018-09-01 08:57:25',NULL,NULL,NULL,'2018-09-01 08:55:24'),(10,'Roleplaying','2018-09-01 08:57:27',NULL,NULL,NULL,'2018-09-01 08:55:36'),(11,'Relaksasi','2018-09-01 08:57:29',NULL,NULL,NULL,'2018-09-01 08:55:46'),(12,'Self management','2018-09-01 08:57:31',NULL,NULL,NULL,'2018-09-01 08:56:10'),(13,'Kontrak','2018-09-01 08:57:33',NULL,NULL,NULL,'2018-09-01 08:56:27'),(14,'Permainan','2018-09-01 08:57:35',NULL,NULL,NULL,'2018-09-01 08:56:35'),(15,'Penilaian diri','2018-09-01 08:57:37',NULL,NULL,NULL,'2018-09-01 08:56:49'),(16,'Group investigasi','2018-09-01 08:57:41',NULL,NULL,NULL,'2018-09-01 08:57:12'),(17,'Sesuai dengan pendekatan dan teknik yang digunakan','2018-09-01 08:57:42',NULL,NULL,NULL,'2018-09-01 08:57:15');

/*Table structure for table `app_pertanyaan` */

DROP TABLE IF EXISTS `app_pertanyaan`;

CREATE TABLE `app_pertanyaan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kelas` varchar(50) DEFAULT NULL,
  `pertanyaan` varchar(250) DEFAULT NULL,
  `rumusan_kebutuhan` text,
  `rumusan_tujuan` text,
  `bidang_layanan` varchar(100) DEFAULT NULL,
  `tujuan_layanan` text,
  `komponen_layanan` varchar(50) DEFAULT NULL,
  `strategi_layanan` varchar(50) DEFAULT NULL,
  `materi_layanan` text,
  `metode_layanan` varchar(50) DEFAULT NULL,
  `media_layanan` varchar(50) DEFAULT NULL,
  `evaluasi` varchar(100) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_date` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `last_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=latin1;

/*Data for the table `app_pertanyaan` */

insert  into `app_pertanyaan`(`id`,`kelas`,`pertanyaan`,`rumusan_kebutuhan`,`rumusan_tujuan`,`bidang_layanan`,`tujuan_layanan`,`komponen_layanan`,`strategi_layanan`,`materi_layanan`,`metode_layanan`,`media_layanan`,`evaluasi`,`created_date`,`created_by`,`updated_date`,`updated_by`,`last_update`) values (1,'10','Bermasalah dengan jerawat','Memiliki masalah Jerawat','Peserta didik dapat menerima kondisi fisik yang dimiliki','1','Peserta didik dapat menerima kondisi fisik yang dimiliki','1','1','- Keragaman kondisi fisik individu\r\n- Bentuk positif menyikapi kondisi fisik\r\n- Bentuk negatif menyikapi kondisi fisik\r\n- Orang sukses dengan kondisi fisik kurang beruntung','1,2,3,4','1,2','Proses dan hasil','2018-09-01 17:08:42',6,NULL,NULL,'2018-09-01 17:08:42'),(2,'10','Tidak nyaman karena memiliki jerawat','Tidak nyaman karena memiliki jerawat','Peserta didik dapat mengatasi masalah kondisi fisik yang dimiliki','1','Peserta didik dapat mengatasi masalah kondisi fisik yang dimiliki','2','2','- Pemanfaatan ahli yang sesuai yang dapat membantu \r\n- Cara pengembangan diri sesuai dengan kondisi fisik','1,2','1,2,3','Proses dan hasil','2018-09-01 17:10:38',6,NULL,NULL,'2018-09-01 17:10:38'),(3,'10','Penglihatan terganggu','Memiliki masalah Gangguan pada mata ','Peserta didik mengenali gejala gangguan mata dan pendengaran serta dapat mengidentifikasi dokter spesialis yang dapat membantu','1','Peserta didik mengenali gejala gangguan mata dan pendengaran serta dapat mengidentifikasi dokter spesialis yang dapat membantu','1','1','- Gejala-gejala gangguan mata, dan pendengaran\r\n- Dokter spesialisasi yang menangani mata, dan pendengaran','3,5','1,2','Proses dan hasil','2018-09-01 17:16:35',6,NULL,NULL,'2018-09-01 17:16:35'),(4,'10','Penglihatan tidak jelas saat membaca','Memiliki masalah Gangguan pada mata','Peserta didik mampu membangun pola makan sehat','1','Peserta didik mampu membangun pola makan sehat','1','1','- Kandungan nutrisi dalam makanan\r\n4 sehat 5 sempurna\r\n- Penyakit akibat pola makan yang tidak seha','1,3,6','1,2,6','Proses dan hasil','2018-09-01 17:19:48',6,NULL,NULL,'2018-09-01 17:19:48'),(5,'10','Mengalami gangguan pendengaran','Memiliki masalah Gangguan pada alat pendengaran','Peserta didik menyadari pentingnya waktu istirahat bagi kesehatan','1','Peserta didik menyadari pentingnya waktu istirahat bagi kesehatan','1','1','- Kebiasaan istirahat di berbagai negara\r\n- Dampak positif dan negatif dari istirahat','1,3,6','1,2,6','Proses dan hasil','2018-09-01 17:23:50',6,NULL,NULL,'2018-09-01 17:23:50'),(6,'10','Tidak dapat mendengar suara dengan jelas','Memiliki masalah Gangguan pada alat pendengaran','Peserta didik mengembangkan kemampuan mengelola waktu istirahat dengan baik','1','Peserta didik mengembangkan kemampuan mengelola waktu istirahat dengan baik','2','2','- Cara mengelola waktu istirahat\r\n- Menyusun rencana dalam memanfaatkan waktu istirahat','1,7','1,2','Proses dan hasil','2018-09-01 17:30:05',6,NULL,NULL,'2018-09-01 17:30:05'),(7,'10','Makan makanan yang mengandung zat kimia','Memiliki Masalah gizi','Peserta didik dapat mengatasi masalah citra tubuh (body image) yang dimiliki','1','Peserta didik dapat mengatasi masalah citra tubuh (body image) yang dimiliki','2','2','- Permasalahan citra diri\r\n- Dampak citra diri negatif\r\n- Cara mengembangkan citra diri positif','1,7','1,2','Proses dan hasil','2018-09-01 17:33:11',6,NULL,NULL,'2018-09-01 17:33:11'),(8,'10','Mengantuk di dalam kelas','Memiliki masalah Gangguan dan kebutuhan tidur','Peserta didik memiliki Gaya hidup hemat','1','Peserta didik memiliki Gaya hidup hemat','1','1','- Alasan memiliki gaya hidup hemat\r\n- Contoh orang-orang dengan gaya hidup hemat\r\n- Contoh orang-orang dengan gaya hidup boros\r\n- Merencanakan gaya hidup hemat\r\n- Berlatih mengembangkan gaya hidup hemat','1,2,3','1,2','Proses dan hasil','2018-09-01 17:44:43',6,'2018-09-02 20:22:35',1,'2018-09-01 17:44:43'),(9,'10','Mengalami gangguan pencernaan','Memiliki Masalah gizi','Peserta didik memiliki citra tubuh (body image) yang baikPeserta didik memiliki citra tubuh (body image) yang baikPeserta didik memiliki citra tubuh (body image) yang baik Peserta didik memiliki citra tubuh (body image) yang baik','1','Peserta didik memiliki citra tubuh (body image) yang baikPeserta didik memiliki citra tubuh (body image) yang baikPeserta didik memiliki citra tubuh (body image) yang baikPeserta didik memiliki citra tubuh (body image) yang baik','1','1','- Permasalahan citra diri\r\n- Dampak citra diri negatif\r\n- Cara mengembangkan citra diri positif','8','2,4','Proses dan hasil','2018-09-02 01:53:17',6,'2018-09-02 20:19:38',1,'2018-09-02 01:53:17'),(10,'10','Tidak memiliki waktu tidur yang cukup','Memiliki masalah Gangguan dan kebutuhan tidur','Peserta didik memiliki Gaya hidup hemat','1','Peserta didik memiliki Gaya hidup hemat','2','2','- Akibat memiliki gaya hidup boros\r\n- Merencanakan gaya hidup hemat\r\n- Berlatih mengembangkan gaya hidup hemat','2,7','1,2','Proses dan hasil','2018-09-02 21:08:12',6,NULL,NULL,'2018-09-02 21:08:12'),(11,'10','Merasa terlalu gemuk/kurus','Memiliki masalah Bentuk tubuh','Peserta didik mampu mengelola uang dengan baik','1','Peserta didik mampu mengelola uang dengan baik','1','1','- Pentingnya uang dikelola dengan baik\r\n- Cara mengelola uang dengan baik\r\n- Latihan menggunakan uang dengan baik','2,7','1,2,3','Proses dan hasil','2018-09-02 21:25:18',6,NULL,NULL,'2018-09-02 21:25:18'),(12,'10','Ingin mengubah salah satu bentuk tubuh','Memiliki masalah Bentuk tubuh','Peserta didik mampu mengelola uang dengan baik','1','Peserta didik mampu mengelola uang dengan baik','2','2','pentingnya uang dikelola dengan baik\r\ncara mengelola uang dengan baik\r\nlatihan menggunakan uang dengan baik','2,7','1,2','Proses dan hasil','2018-09-02 21:44:55',6,'2018-09-02 22:18:59',1,'2018-09-02 21:44:55'),(13,'10','Remaja membeli setiap barang yang menjadi trend ','Memiliki Gaya hidup','Peserta didik dapat membangun konsep hidup harmonis di dalam keluarga','2','Peserta didik dapat membangun konsep hidup harmonis di dalam keluarga','1','1','- Konsep keluarga harmonis\r\n- Keluarga yang tidak harmonis\r\n- Dampak negatif keluarga yang tidak harmonis\r\n- Konflik di keluarga\r\n- Cara menyikapi konflik dengan anggota keluarga ','9','1,2,4','Proses dan hasil','2018-09-02 22:26:17',6,NULL,NULL,'2018-09-02 22:26:17'),(14,'10','Membeli barang yang tidak dibutuhkan','Memiliki Gaya hidup','Peserta didik dapat mengatasi masalah keluarga','2','Peserta didik dapat mengatasi masalah keluarga','2','2','- Identifikasi masalah keluarga\r\n- Pengembangan kemampuan menyikapi konflik','2,9','1,2,4','Proses dan hasil','2018-09-02 22:31:45',6,NULL,NULL,'2018-09-02 22:31:45'),(15,'10','Uang habis membeli barang bermerk (sepatu, tas dll)','Memiliki masalah keuangan','Peserta didik dapat membangun hubungan yang efektif dengan teman sebaya','2','Peserta didik dapat membangun hubungan yang efektif dengan teman sebaya','1','1','- Pentingnya hubungan yang positif dengan teman sebaya\r\n- Ciri hubungan yang efektif\r\n- Cara membangun hubungan yang positif\r\n- Membangun kebiasaan berhubungan secara positif dengan teman sebaya','3,10','1,2,4','Proses dan hasil','2018-09-02 22:37:04',6,NULL,NULL,'2018-09-02 22:37:04'),(16,'10','Menghabiskan uang jajan','Memiliki masalah keuangan','Peserta didik dapat menyelesaikan konflik dengan teman','2','Peserta didik dapat menyelesaikan konflik dengan teman','2','2','- Kesadaran mengatasi konflik\r\n- Keterampilan menyelesaikan konflik dengan teman sebaya ','10','1,2,4','Proses dan hasil','2018-09-02 22:40:42',6,NULL,NULL,'2018-09-02 22:40:42'),(17,'10','Tidak nyaman berada di rumah','Memiliki masalah keluarga','Peserta didik dapat mengendalikan keinginan mencuri barang milik teman','2','Peserta didik dapat mengendalikan keinginan mencuri barang milik teman','1','1','- Mengenali gejala clepto\r\n- Bagaimana menyikapi kondisi klepto','1','1,2','Proses dan hasil','2018-09-02 22:52:49',6,NULL,NULL,'2018-09-02 22:52:49'),(18,'10','Orang tua pilih kasih','Memiliki masalah keluarga','Peserta didik dapat mengendalikan keinginan mencuri barang milik teman','2','Peserta didik dapat mengendalikan keinginan mencuri barang milik teman','2','2','- Mengenali gejala clepto\r\n- Keterampilan mengendalika kondisi klepto','1,7','1,2','Proses dan hasil','2018-09-02 22:54:13',6,NULL,NULL,'2018-09-02 22:54:13'),(19,'10','Sulit bekerja sama dengan teman','Memiliki masalah dengan teman','Peserta didik dapat mengendalikan dorongan agresif yang dimiliki','2','Peserta didik dapat mengendalikan dorongan agresif yang dimiliki','1','1','- Definisi agresifitas \r\n- Faktor yang mempengaruhi agresifitas\r\n- Dampak negatif perilaku agresif\r\n- Cara mengendalikan perilaku agresif','1,2','1,2,3','Proses dan hasil','2018-09-02 22:56:15',6,NULL,NULL,'2018-09-02 22:56:15'),(20,'10','Bermusuhan dengan teman','Memiliki masalah dengan teman','Peserta didik dapat mengatsi masalah akibat dorongan agresif yang dimiliki','2','Peserta didik dapat mengatsi masalah akibat dorongan agresif yang dimiliki','2','2','- Keterampilan mengendalikan dorongan agresif','10,11','4,5','Proses dan hasil','2018-09-02 22:58:47',6,NULL,NULL,'2018-09-02 22:58:47'),(21,'10','Mengambil barang milik teman tanpa ijin','Memiliki masalah Mencuri','Peserta didik memformulasikan solusi terhadap perilaku membolos','2','Peserta didik memformulasikan solusi terhadap perilaku membolos','1','1','proses terbentuknya perilaku membolos\r\n- Faktor-faktor yang mempengaruhi perlaku membolos\r\n- Cara mengatasi perilaku membolos','2,5','1,2','Proses dan hasil','2018-09-02 23:01:02',6,NULL,NULL,'2018-09-02 23:01:02'),(22,'10','Tidak mengembalikan barang yang dipinjam','Memiliki masalah Mencuri','Peserta didik dapat mengurangi perilaku membolos yan dimiliki','2','Peserta didik dapat mengurangi perilaku membolos yan dimiliki','2','2','- Cara mengatasi perilaku membolos\r\n- Pembiasaan perilaku tepat waktu','12','1,2','Proses dan hasil','2018-09-02 23:02:59',6,NULL,NULL,'2018-09-02 23:02:59'),(23,'10','Berkelahi dengan teman','Memiliki masalah Perkelahian/tawuran pelajar','Peserta didik dapat menyadari dampak negatif perilaku Bullying ','2','Peserta didik dapat menyadari dampak negatif perilaku Bullying ','1','1','- Definisi perilaku bullying\r\n- Proses terbentuknya perilaku bullying\r\n- Dampak negatif perilaku bullying\r\n- Cara mengatasi perilaku bullying','1,2,6','1,2,6','Proses dan hasil','2018-09-02 23:04:54',6,NULL,NULL,'2018-09-02 23:04:54'),(24,'10','Mengajak teman ikut tawuran','Memiliki masalah Perkelahian/tawuran pelajar','Peserta didik dapat mengurangi perilaku Bullying yang dilakukannya','2','Peserta didik dapat mengurangi perilaku Bullying yang dilakukannya','2','2','- Kesadaran bahaya bullying\r\n- Keterampilan mengendalikan perilaku bullying','1,2','1,2','Proses dan hasil','2018-09-02 23:19:42',6,NULL,NULL,'2018-09-02 23:19:42'),(26,'10','Data 1','Data 1','Data 2','3','Data 2','1','1','Tes','7,8','5,6','Proses dan hasil','2018-09-06 22:50:47',6,NULL,NULL,'2018-09-06 22:50:47'),(27,'10','Data 2','Data 2','Data 2','3','Data 2','1','1','Data 2','5,8','6,8','Proses dan hasil','2018-09-09 11:18:57',6,NULL,NULL,'2018-09-09 11:18:57'),(28,'10','Data 3','Data 3','Data 3','3','Data 3','1','2','Data 3','3,8','7,8','Proses dan hasil','2018-09-09 11:19:24',6,NULL,NULL,'2018-09-09 11:19:24'),(29,'10','Data 4','Data 4','Data 4','4','Data 4','1','1','Data 4','6,10','8,9','Proses dan hasil','2018-09-09 18:13:20',6,NULL,NULL,'2018-09-09 18:13:20'),(30,'10','Data 5','Data 5','Data 5','4','Data 5','1','1','Data 5','7,8','4,8','Proses dan hasil','2018-09-09 18:13:45',6,NULL,NULL,'2018-09-09 18:13:45'),(31,'10,11','Data 6','Data 6','Data 6','4','Data 6','1','1','Data 6','12,14','6,8','Proses dan hasil','2018-09-09 18:14:12',6,NULL,NULL,'2018-09-09 18:14:12');

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
  `flag_aktif` enum('Y','N') DEFAULT 'Y',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

/*Data for the table `app_sekolah` */

insert  into `app_sekolah`(`id`,`nama`,`alamat`,`no_telpon`,`created_date`,`created_by`,`updated_date`,`updated_by`,`deleted_date`,`deleted_by`,`flag_aktif`) values (10,'SMKN 1 PADANG','PADANG','0751-232345','2018-09-01 11:32:55',1,NULL,NULL,NULL,NULL,'Y'),(11,'SMKN 2 PADANG','Padang','07512123343','2018-09-08 23:28:43',1,NULL,NULL,NULL,NULL,'Y');

/*Table structure for table `app_siswa` */

DROP TABLE IF EXISTS `app_siswa`;

CREATE TABLE `app_siswa` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id_login` int(11) DEFAULT NULL,
  `nis` varchar(30) DEFAULT NULL,
  `nama_lengkap` varchar(50) DEFAULT NULL,
  `tempat_lahir` varchar(50) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT '0000-00-00',
  `jenis_kelamin` enum('L','P') DEFAULT NULL,
  `alamat` text,
  `email` varchar(50) DEFAULT NULL,
  `no_telp` varchar(20) DEFAULT NULL,
  `id_sekolah` int(11) DEFAULT NULL,
  `kelas` enum('10','11','12') DEFAULT NULL,
  `id_guru` int(11) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_date` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_date` datetime DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL,
  `flag_aktif` enum('Y','N') DEFAULT 'Y',
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `app_siswa` */

insert  into `app_siswa`(`user_id`,`user_id_login`,`nis`,`nama_lengkap`,`tempat_lahir`,`tanggal_lahir`,`jenis_kelamin`,`alamat`,`email`,`no_telp`,`id_sekolah`,`kelas`,`id_guru`,`created_date`,`created_by`,`updated_date`,`updated_by`,`deleted_date`,`deleted_by`,`flag_aktif`) values (1,2,'','Afa','Padang','2018-09-02','P','','afa@gmail.com','021',10,'10',3,'2018-09-01 03:52:14',NULL,'2018-09-09 18:54:24',2,NULL,NULL,'Y'),(2,3,'11101152630092','Lilis','Padang','2018-09-03','P','Ciater Raya','2@gmail.com','021',10,'10',3,'2018-09-01 03:52:58',NULL,'2018-09-11 20:24:51',3,NULL,NULL,'Y'),(3,4,'','Guru 1','padang','1993-01-19','L','data','guru_1@gmail.com','021',10,'',3,'2018-09-01 03:55:04',NULL,'2018-09-06 23:08:06',6,'2018-09-03 00:50:01',1,'N'),(4,5,'','Masitoh noer ','','2018-09-11','','','4@gmail.com','021',10,'10',3,'2018-09-01 03:55:41',NULL,'2018-09-11 11:57:53',5,NULL,NULL,'N');

/*Table structure for table `app_strategi_layanan` */

DROP TABLE IF EXISTS `app_strategi_layanan`;

CREATE TABLE `app_strategi_layanan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `deskripsi` varchar(100) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_date` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `last_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `app_strategi_layanan` */

insert  into `app_strategi_layanan`(`id`,`deskripsi`,`created_date`,`created_by`,`updated_date`,`updated_by`,`last_update`) values (1,'Bimbingan Klasikal','2018-09-01 08:42:37',NULL,NULL,NULL,'2018-09-01 08:42:40'),(2,'Bimbingan Kelompok','2018-09-01 08:42:50',NULL,NULL,NULL,'2018-09-01 08:42:53');

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
  `verifikasi` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

/*Data for the table `app_user` */

insert  into `app_user`(`user_id`,`username`,`password`,`nama_lengkap`,`level`,`created_date`,`created_by`,`updated_date`,`updated_by`,`deleted_date`,`deleted_by`,`flag_aktif`,`last_login`,`verifikasi`) values (1,'irfandi','202cb962ac59075b964b07152d234b70','Irfandi Ricon','1','2018-08-04 13:31:12',NULL,NULL,NULL,NULL,NULL,'Y',NULL,NULL),(2,'afa','202cb962ac59075b964b07152d234b70','Afa','3','2018-09-01 03:52:14',NULL,NULL,NULL,NULL,NULL,'Y',NULL,NULL),(3,'lilis','202cb962ac59075b964b07152d234b70','Lilis','3','2018-09-01 03:52:58',NULL,'2018-09-03 01:00:20',1,NULL,NULL,'Y',NULL,NULL),(4,'imam_mawardi','202cb962ac59075b964b07152d234b70','Imam Mawardi','3','2018-09-01 03:55:04',NULL,NULL,NULL,'2018-09-03 00:50:01',1,'N',NULL,NULL),(5,'masitoh_noer','202cb962ac59075b964b07152d234b70','Masitoh noer ','3','2018-09-01 03:55:41',NULL,NULL,NULL,NULL,NULL,'Y',NULL,NULL),(6,'user_guru1','202cb962ac59075b964b07152d234b70','Guru 1','2','2018-09-03 00:57:18',NULL,NULL,NULL,NULL,NULL,'Y',NULL,NULL),(7,'user_guru2','202cb962ac59075b964b07152d234b70','Guru 2','2','2018-09-03 00:57:36',NULL,NULL,NULL,NULL,NULL,'Y',NULL,NULL),(8,'user_guru3','202cb962ac59075b964b07152d234b70','Guru 3','2','2018-09-03 00:57:50',NULL,'2018-09-03 00:58:23',1,NULL,NULL,'Y',NULL,NULL),(9,'sukma','202cb962ac59075b964b07152d234b70','Sukma','1','2018-09-03 04:27:13',NULL,NULL,NULL,NULL,NULL,'Y',NULL,NULL);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
