/*
SQLyog Community v10.51 
MySQL - 5.5.5-10.1.9-MariaDB-log : Database - sim_gothy
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`sim_gothy` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `sim_gothy`;

/*Table structure for table `admin` */

CREATE TABLE `admin` (
  `id` varchar(5) NOT NULL,
  `username` varchar(25) DEFAULT NULL,
  `password` varchar(225) DEFAULT NULL,
  `nama` varchar(25) DEFAULT NULL,
  `level` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `admin` */

insert  into `admin`(`id`,`username`,`password`,`nama`,`level`) values ('A-001','bayu','c4ca4238a0b923820dcc509a6f75849b','Admin Distribusi','Admin Distribusi'),('A-002','bagus','c4ca4238a0b923820dcc509a6f75849b','Admin Penjualan','Admin Penjualan'),('A-003','Rahmad','c4ca4238a0b923820dcc509a6f75849b','Rahmad Junianto','Keuangan'),('A-004','Trio','c4ca4238a0b923820dcc509a6f75849b','Trio','Manager'),('O-005','banyakan','c4ca4238a0b923820dcc509a6f75849b','Banyakan','Outlet'),('O-006','Pesantren','c4ca4238a0b923820dcc509a6f75849b','Pesantren','Outlet');

/*Table structure for table `daftar_barang` */

CREATE TABLE `daftar_barang` (
  `kd_barang` varchar(5) NOT NULL,
  `nm_barang` varchar(30) DEFAULT NULL,
  `satuan` varchar(20) DEFAULT NULL,
  `harga_jual` int(15) DEFAULT NULL,
  `stok` int(5) DEFAULT NULL,
  `stok_minimal` int(5) DEFAULT NULL,
  PRIMARY KEY (`kd_barang`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `daftar_barang` */

insert  into `daftar_barang`(`kd_barang`,`nm_barang`,`satuan`,`harga_jual`,`stok`,`stok_minimal`) values ('B-001','Oreo','roll',5000,130,50),('B-002','Coklat Batang','Batang',16000,30,15),('B-003','Kresek Besar','pack',3500,420,30),('B-004','Kresek Kecil','pack',2000,420,50),('B-005','Sedotan','pack',10000,11,20),('B-006','Cup DIngin','Slop',15000,9876,5000),('B-007','Cup Hangat','Slop',15000,7915,3000),('B-008','Coklat Bubuk','pack',20000,22,20),('B-009','Capucino','pack',15000,31,15),('B-011','Strawberry','pack',12000,16,15),('B-013','Resep Hangat','pack',1300,8100,200),('B-014','Resep Dingin','pack',1400,4400,500),('B-015','Indomilk','botol',7000,69,20),('B-016','Roll Press','Roll',95000,20,5);

/*Table structure for table `daftar_outlet` */

CREATE TABLE `daftar_outlet` (
  `kd_outlet` varchar(5) NOT NULL,
  `nm_outlet` varchar(20) DEFAULT NULL,
  `alamat` varchar(60) DEFAULT NULL,
  PRIMARY KEY (`kd_outlet`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `daftar_outlet` */

insert  into `daftar_outlet`(`kd_outlet`,`nm_outlet`,`alamat`) values ('O-001','Wilis Mulya','Jl WIlis Mulya No 58 Kota Kediri'),('O-002','Mrican','Jl Sersan Bahrun Kota Kediri'),('O-003','Ngadiluwih','Ngadiluwih'),('O-004','Grogol','Jl Raya Grogol');

/*Table structure for table `daftar_rasa` */

CREATE TABLE `daftar_rasa` (
  `kd_rasa` varchar(5) NOT NULL,
  `nm_rasa` varchar(30) DEFAULT NULL,
  `harga` int(15) DEFAULT NULL,
  PRIMARY KEY (`kd_rasa`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `daftar_rasa` */

insert  into `daftar_rasa`(`kd_rasa`,`nm_rasa`,`harga`) values ('R-001','Milk Oreo',6000),('R-002','Milk Strawberry',6000),('R-003','Milk Choco',6000),('R-004','Milk Original',6000),('R-005','Milk Cappucino',6000),('R-006','Milk Soda',6000);

/*Table structure for table `detail_distribusi` */

CREATE TABLE `detail_distribusi` (
  `kd_distribusi` varchar(5) NOT NULL,
  `kd_barang` varchar(5) DEFAULT NULL,
  `jumlah` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `detail_distribusi` */

insert  into `detail_distribusi`(`kd_distribusi`,`kd_barang`,`jumlah`) values ('D-001','B-001','10'),('D-001','B-002','5'),('D-001','B-003','10'),('D-001','B-004','10'),('D-001','B-005','10'),('D-001','B-006','10'),('D-001','B-007','5'),('D-001','B-008','5'),('D-001','B-009','5'),('D-001','B-011','5'),('D-001','B-013','200'),('D-001','B-014','400'),('D-001','B-015','5'),('D-001','B-016','2'),('D-002','B-001','10'),('D-002','B-002','5'),('D-002','B-003','10'),('D-002','B-004','10'),('D-002','B-005','5'),('D-002','B-006','10'),('D-002','B-007','5'),('D-002','B-008','5'),('D-002','B-009','5'),('D-002','B-011','6'),('D-002','B-013','200'),('D-002','B-014','400'),('D-002','B-015','6'),('D-002','B-016','3'),('D-003','B-001','10'),('D-003','B-002','10'),('D-003','B-003','10'),('D-003','B-004','10'),('D-003','B-005','5'),('D-003','B-006','20'),('D-003','B-007','20'),('D-003','B-008','9'),('D-003','B-009','5'),('D-003','B-011','10'),('D-003','B-013','200'),('D-003','B-014','300'),('D-003','B-016','1'),('D-003','B-015','4'),('D-004','B-001','10'),('D-004','B-002','10'),('D-004','B-003','10'),('D-004','B-004','10'),('D-004','B-005','10'),('D-004','B-006','10'),('D-004','B-007','10'),('D-004','B-008','10'),('D-004','B-009','10'),('D-004','B-011','10'),('D-004','B-013','100'),('D-004','B-014','400'),('D-004','B-015','6'),('D-004','B-016','2'),('D-005','B-001','10'),('D-005','B-002','10'),('D-005','B-003','10'),('D-005','B-004','10'),('D-005','B-005','10'),('D-005','B-006','10'),('D-005','B-007','6'),('D-005','B-008','6'),('D-005','B-009','4'),('D-005','B-011','10'),('D-005','B-013','500'),('D-005','B-014','800'),('D-006','B-001','10'),('D-006','B-002','5'),('D-006','B-003','10'),('D-006','B-004','10'),('D-006','B-005','9'),('D-006','B-006','20'),('D-006','B-007','16'),('D-006','B-008','11'),('D-006','B-009','12'),('D-006','B-011','10'),('D-006','B-013','200'),('D-006','B-014','500'),('D-007','B-001','10'),('D-007','B-002','10'),('D-007','B-003','10'),('D-007','B-004','10'),('D-007','B-005','10'),('D-007','B-006','30'),('D-007','B-007','10'),('D-007','B-008','6'),('D-007','B-009','4'),('D-007','B-011','10'),('D-007','B-013','400'),('D-007','B-014','400'),('D-008','B-001','10'),('D-008','B-002','10'),('D-008','B-003','10'),('D-008','B-004','10'),('D-008','B-005','10'),('D-008','B-006','14'),('D-008','B-007','13'),('D-008','B-008','6'),('D-008','B-009','4'),('D-008','B-011','3'),('D-008','B-013','100'),('D-008','B-014','400'),('D-009','B-002','5');

/*Table structure for table `detail_jual` */

CREATE TABLE `detail_jual` (
  `kd_penjualan` varchar(5) NOT NULL,
  `kd_rasa` varchar(5) DEFAULT NULL,
  `jumlah` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `detail_jual` */

insert  into `detail_jual`(`kd_penjualan`,`kd_rasa`,`jumlah`) values ('P-001','R-001','50'),('P-001','R-002','30'),('P-001','R-003','35'),('P-001','R-004','25'),('P-001','R-005','40'),('P-001','R-006','20'),('P-002','R-001','90'),('P-002','R-002','80'),('P-002','R-003','100'),('P-002','R-004','100'),('P-002','R-005','60'),('P-002','R-006','60'),('P-003','R-001','100'),('P-003','R-002','80'),('P-003','R-003','100'),('P-003','R-004','100'),('P-003','R-005','70'),('P-003','R-006','80'),('P-004','R-001','120'),('P-004','R-002','110'),('P-004','R-003','120'),('P-004','R-004','130'),('P-004','R-005','140'),('P-004','R-006','90'),('P-005','R-001','100'),('P-005','R-002','150'),('P-005','R-003','130'),('P-005','R-004','120'),('P-005','R-005','140'),('P-005','R-006','145'),('P-006','R-001','130'),('P-006','R-002','120'),('P-006','R-003','120'),('P-006','R-004','110'),('P-006','R-005','140'),('P-006','R-006','140'),('P-007','R-001','100'),('P-007','R-002','100'),('P-007','R-003','130'),('P-007','R-004','100'),('P-007','R-005','120'),('P-007','R-006','111'),('P-008','R-001','130'),('P-008','R-002','100'),('P-008','R-003','120'),('P-008','R-004','132'),('P-008','R-005','130'),('P-008','R-006','123'),('P-009','R-001','100'),('P-009','R-002','120'),('P-009','R-003','100'),('P-009','R-004','120'),('P-009','R-005','90'),('P-009','R-006','90'),('P-010','R-001','100'),('P-010','R-002','90'),('P-010','R-003','100'),('P-010','R-004','120'),('P-010','R-005','100'),('P-010','R-006','100'),('P-011','R-001','100'),('P-011','R-002','120'),('P-011','R-003','130'),('P-011','R-004','120'),('P-011','R-005','120'),('P-011','R-006','80'),('P-012','R-001','100'),('P-012','R-002','120'),('P-012','R-003','80'),('P-012','R-004','90'),('P-012','R-005','190'),('P-012','R-006','80'),('P-013','R-002','1000'),('P-014','R-002','1200'),('P-015','R-002','1000'),('P-016','R-002','1400'),('P-017','R-001','1900'),('P-018','R-002','1860'),('P-019','R-003','1999'),('P-020','R-005','1788'),('P-021','R-001','900'),('P-022','R-002','870'),('P-023','R-002','890');

/*Table structure for table `distribusi` */

CREATE TABLE `distribusi` (
  `kd_distribusi` varchar(5) NOT NULL,
  `kd_outlet` varchar(5) DEFAULT NULL,
  `total_harga` int(20) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `status` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`kd_distribusi`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `distribusi` */

insert  into `distribusi`(`kd_distribusi`,`kd_outlet`,`total_harga`,`tanggal`,`status`) values ('D-001','O-001',1790000,'2017-07-01','Selesai'),('D-002','O-002',1854000,'2017-07-01','Selesai'),('D-003','O-003',2093000,'2017-07-01','Selesai'),('D-004','O-004',2057000,'2017-07-01','Selesai'),('D-005','O-001',2675000,'2017-07-02','Selesai'),('D-006','O-002',2295000,'2017-07-02','Selesai'),('D-007','O-003',2345000,'2017-07-02','Selesai'),('D-008','O-004',1676000,'2017-07-02','Selesai'),('D-009','O-002',80000,'2017-07-24','Selesai');

/*Table structure for table `jual` */

CREATE TABLE `jual` (
  `kd_penjualan` varchar(5) NOT NULL,
  `kd_outlet` varchar(5) DEFAULT NULL,
  `total_harga` int(20) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  PRIMARY KEY (`kd_penjualan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `jual` */

insert  into `jual`(`kd_penjualan`,`kd_outlet`,`total_harga`,`tanggal`) values ('P-001','O-001',1200000,'2017-07-01'),('P-002','O-002',2940000,'2017-07-01'),('P-003','O-003',3180000,'2017-07-01'),('P-004','O-004',4260000,'2017-07-01'),('P-005','O-001',4710000,'2017-07-02'),('P-006','O-002',4560000,'2017-07-02'),('P-007','O-003',3966000,'2017-07-02'),('P-008','O-004',4410000,'2017-07-02'),('P-009','O-001',3720000,'2017-07-03'),('P-010','O-002',3660000,'2017-07-03'),('P-011','O-003',4020000,'2017-07-03'),('P-012','O-004',3960000,'2017-07-03'),('P-013','O-001',6000000,'2017-06-01'),('P-014','O-002',7200000,'2017-06-01'),('P-015','O-003',6000000,'2017-06-01'),('P-016','O-004',8400000,'2017-06-01'),('P-017','O-001',11400000,'2017-05-01'),('P-018','O-002',11160000,'2017-05-01'),('P-019','O-003',11994000,'2017-05-01'),('P-020','O-004',10728000,'2017-05-01'),('P-021','O-001',5400000,'2017-06-02'),('P-022','O-002',5220000,'2017-06-02'),('P-023','O-003',5340000,'2017-06-02');

/*Table structure for table `kategori_pengeluaran` */

CREATE TABLE `kategori_pengeluaran` (
  `kd_kategori` varchar(8) NOT NULL,
  `nm_kategori` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`kd_kategori`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `kategori_pengeluaran` */

insert  into `kategori_pengeluaran`(`kd_kategori`,`nm_kategori`) values ('K-001','Transportasi'),('K-002','Gaji'),('K-003','Sewa Tempat'),('K-004','Lain-lain');

/*Table structure for table `pembelian` */

CREATE TABLE `pembelian` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tanggal` date DEFAULT NULL,
  `kd_barang` varchar(5) DEFAULT NULL,
  `jumlah` char(3) DEFAULT NULL,
  `harga` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

/*Data for the table `pembelian` */

insert  into `pembelian`(`id`,`tanggal`,`kd_barang`,`jumlah`,`harga`) values (1,'2017-01-20','B-001','10',NULL),(2,'2017-01-20','B-002','4',NULL),(3,'2017-04-12','B-001','50',NULL),(4,'2017-04-12','B-002','25',NULL),(6,'2017-05-21','B-014','100',NULL),(7,'2017-05-21','B-013','200',NULL),(8,'2017-06-02','B-001','1',NULL),(9,'2017-07-15','B-002','3',NULL),(10,'2017-07-15','B-001','2',NULL),(11,'2017-07-16','B-001','3',NULL),(12,'2017-07-18','B-001','100',4000),(13,'2017-08-01','B-001','10',4000);

/*Table structure for table `pengeluaran` */

CREATE TABLE `pengeluaran` (
  `kd_pengeluaran` varchar(8) NOT NULL,
  `kd_outlet` varchar(8) DEFAULT NULL,
  `tgl` date DEFAULT NULL,
  `kd_kategori` varchar(8) DEFAULT NULL,
  `keterangan` text,
  `jumlah` int(10) DEFAULT NULL,
  PRIMARY KEY (`kd_pengeluaran`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `pengeluaran` */

insert  into `pengeluaran`(`kd_pengeluaran`,`kd_outlet`,`tgl`,`kd_kategori`,`keterangan`,`jumlah`) values ('PE-001','O-002','2017-07-16','K-002','Gaji Pramusaji',700000),('PE-002','O-002','2017-07-16','K-001','Sewa Bulan Juli',300000),('PE-003','O-001','2017-07-24','K-001','Survei',600000);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
