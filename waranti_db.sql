-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 22, 2020 at 11:38 PM
-- Server version: 10.1.35-MariaDB
-- PHP Version: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `waranti_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `detail`
--

CREATE TABLE `detail` (
  `id` int(11) NOT NULL,
  `nama_karyawan` varchar(100) NOT NULL,
  `nopol` varchar(100) NOT NULL,
  `model_kendaraan` varchar(100) NOT NULL,
  `vin_rangka` varchar(100) NOT NULL,
  `kilometer` varchar(100) NOT NULL,
  `tgl_perbaikan` date NOT NULL,
  `tgl_penyerahan` date NOT NULL,
  `no_part` varchar(100) NOT NULL,
  `barcode` varchar(100) NOT NULL,
  `lpd` varchar(100) NOT NULL,
  `nama_rak` varchar(100) NOT NULL,
  `qr_code` varchar(100) NOT NULL,
  `user_create` varchar(100) DEFAULT NULL,
  `create_date` date DEFAULT NULL,
  `user_update` varchar(100) DEFAULT NULL,
  `update_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail`
--

INSERT INTO `detail` (`id`, `nama_karyawan`, `nopol`, `model_kendaraan`, `vin_rangka`, `kilometer`, `tgl_perbaikan`, `tgl_penyerahan`, `no_part`, `barcode`, `lpd`, `nama_rak`, `qr_code`, `user_create`, `create_date`, `user_update`, `update_date`) VALUES
(4, 'wulan', 'D65411', 'sdhagd', '19821928', '131313313', '2020-04-02', '2020-04-30', 'D04465-BZ153-000', '2311112331', '12131231', 'lovanto jurig', 'sdhagd.png', 'dani hamdani', '2020-04-15', 'dani hamdani', '2020-04-15'),
(6, 'awdawdawda', '232131', 'adwad', '9769809', '8978', '0000-00-00', '0000-00-00', '232', '12313', '1222', 'awdawdw', 'awdawdawda.png', 'dani hamdani', '2020-04-15', NULL, NULL),
(7, 'wulan', 'D65411', 'sdhagd', '19821928', '131313313', '2020-04-24', '2020-04-29', 'D04478-BZ060-001', '2311112332', '2131111', 'aaaa', 'sdhagd.png', 'Rifky Lovanto', '2020-04-16', 'dani hamdani', '2020-04-25'),
(8, 'adawdwad', '23222', 'awdadawd', '20193', '29833', '2020-04-02', '2020-04-22', '123456789', '21313', '123', 'lovanto jurig', 'awdadawd.png', 'Rifky Lovanto', '2020-04-16', NULL, NULL),
(9, 'wulan', '23222', 'awdadawd', '20193', '29833', '2020-04-25', '2020-04-26', 'D04465-BZ153-000', '9348222', '334333', 'kastilion', 'awdadawd.png', 'juara', '2020-04-25', NULL, NULL),
(10, 'adawdwad', 'D65411', 'sdhagd', '19821928', '131313313', '2020-04-01', '2020-04-09', 'D04465-BZ153-000', '324324', '234', 'lovanto jurig', 'sdhagd.png', 'juara', '2020-04-25', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `karyawan`
--

CREATE TABLE `karyawan` (
  `id` int(11) NOT NULL,
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
  `update_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `karyawan`
--

INSERT INTO `karyawan` (`id`, `npk`, `nama_karyawan`, `jk`, `tgl_lahir`, `alamat`, `no_telp`, `no_ktp`, `email`, `tgl_masuk`, `status_karyawan`, `qr_code`, `user_create`, `create_date`, `user_update`, `update_date`) VALUES
(4, 12, 'wulan', 'perempuan', '1994-09-13', 'dusun sukawening desa hegarmanah rt 04 rw 06', '085715329867', 2147483647, 'wulammariaulfah@gmail.com', '2020-02-13', 'Kontrak', '.png', 'dani hamdani', '2020-04-11', NULL, NULL),
(10, 232, 'adawdwad', 'awdwad', '0000-00-00', 'adwdw awdada dawdawdad adwwa awd', '9384292', 128372722, 'alwdkhnawd', '0000-00-00', 'ajwd', '232.png', 'dani hamdani', '2020-04-15', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `kendaraan`
--

CREATE TABLE `kendaraan` (
  `id` int(11) NOT NULL,
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
  `update_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kendaraan`
--

INSERT INTO `kendaraan` (`id`, `nopol`, `model`, `tipe_mesin`, `model_kendaraan`, `vin_rangka`, `kilometer`, `qr_code`, `user_create`, `create_date`, `user_update`, `update_date`) VALUES
(1, 'D65411', 'avanza', 'tipeuting', 'sdhagd', '19821928', '131313313', 'sdhagd.png', 'dani hamdani', '2020-04-12', 'dani hamdani', '2020-04-12'),
(3, '23222', 'awd', 'adw', 'awdadawd', '20193', '29833', '23222.png', 'dani hamdani', '2020-04-15', '', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `level`
--

CREATE TABLE `level` (
  `id_level` int(11) NOT NULL,
  `nama_level` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `level`
--

INSERT INTO `level` (`id_level`, `nama_level`) VALUES
(1, 'admin'),
(2, 'checker'),
(3, 'owner'),
(4, 'pelanggan');

-- --------------------------------------------------------

--
-- Stand-in structure for view `login`
-- (See below for the actual view)
--
CREATE TABLE `login` (
`id_user` int(11)
,`username` varchar(10)
,`password` varchar(20)
,`nama_user` varchar(20)
,`user_create` varchar(50)
,`create_date` date
,`user_update` varchar(50)
,`update_date` date
,`id_level` int(11)
,`nama_level` varchar(20)
);

-- --------------------------------------------------------

--
-- Table structure for table `rak`
--

CREATE TABLE `rak` (
  `id` int(11) NOT NULL,
  `no_rak` int(11) NOT NULL,
  `nama_rak` varchar(50) NOT NULL,
  `qr_code` varchar(50) NOT NULL,
  `user_create` varchar(100) DEFAULT NULL,
  `create_date` date DEFAULT NULL,
  `user_update` varchar(100) DEFAULT NULL,
  `update_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rak`
--

INSERT INTO `rak` (`id`, `no_rak`, `nama_rak`, `qr_code`, `user_create`, `create_date`, `user_update`, `update_date`) VALUES
(2, 111, 'kastilion', '0111.png', 'dani hamdani', '2020-04-11', 'dani hamdani', '2020-04-11'),
(3, 120, 'aaaa', '120.png', 'dani hamdani', '2020-04-11', NULL, NULL),
(4, 22, 'rok', '22.png', 'dani hamdani', '2020-04-11', NULL, NULL),
(5, 400, 'JULID', '400.png', 'dani hamdani', '2020-04-11', NULL, NULL),
(6, 21, 'aaaaaaaaaaaaaaaaaaa', '21.png', 'dani hamdani', '2020-04-11', NULL, NULL),
(7, 55, 'esien', '55.png', 'dani hamdani', '2020-04-11', NULL, NULL),
(9, 89, 'suqi', '89.png', 'dani hamdani', '2020-04-11', NULL, NULL),
(11, 56, 'dani hamdani', 'dani hamdani.png', 'dani hamdani', '2020-04-11', NULL, NULL),
(12, 8999, 'lovanto jurig', 'lovanto jurig.png', 'dani hamdani', '2020-04-11', NULL, NULL),
(13, 999, 'juriggg', 'juriggg.png', 'dani hamdani', '2020-04-11', NULL, NULL),
(16, 231242421, 'awdjhlnawd', '231242421.png', 'dani hamdani', '2020-04-15', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sparepart`
--

CREATE TABLE `sparepart` (
  `id` int(11) NOT NULL,
  `no_part` varchar(50) NOT NULL,
  `deskripsi` varchar(50) NOT NULL,
  `qr_code` varchar(50) NOT NULL,
  `user_create` varchar(50) NOT NULL,
  `create_date` date NOT NULL,
  `user_update` varchar(50) NOT NULL,
  `update_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sparepart`
--

INSERT INTO `sparepart` (`id`, `no_part`, `deskripsi`, `qr_code`, `user_create`, `create_date`, `user_update`, `update_date`) VALUES
(1, 'D04465-BZ153-000', 'PAD KIT, DISC BRAKE ,BRACKER', 'D04465-BZ153-000.png', 'dani hamdani', '2020-04-11', 'dani hamdani', '2020-04-11'),
(2, 'D04478-BZ060-001', '\"CYLINDER KIT, FR DISC BRAKE\"', 'D04478-BZ060-001.png', 'dani hamdani', '2020-04-11', '', '0000-00-00'),
(4, '123456789', 'aljwndkaw awkdw wadaaw', '123456789.png', 'dani hamdani', '2020-04-15', '', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(10) NOT NULL,
  `password` varchar(20) NOT NULL,
  `nama_user` varchar(20) NOT NULL,
  `id_level` int(20) NOT NULL,
  `user_create` varchar(50) NOT NULL,
  `create_date` date NOT NULL,
  `user_update` varchar(50) NOT NULL,
  `update_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `nama_user`, `id_level`, `user_create`, `create_date`, `user_update`, `update_date`) VALUES
(1, 'dani', 'dani', 'dani hamdani', 1, '', '0000-00-00', '', '0000-00-00'),
(7, 'wulan', 'eulan', 'wulan maria ulfah', 3, '', '0000-00-00', '', '0000-00-00'),
(8, 'ouu', 'dani', 'juara', 4, '', '0000-00-00', 'dani hamdani', '2020-01-24'),
(9, 'gila', 'gila', 'juara', 2, 'dani hamdani', '2020-01-24', 'juara', '2020-04-25'),
(10, 'Wulantok', 'wulan', 'Wulantok', 1, 'dani hamdani', '2020-02-21', 'dani hamdani', '2020-04-10'),
(11, 'lovanto', 'lovanto', 'Rifky Lovanto', 4, 'dani hamdani', '2020-04-16', 'Rifky Lovanto', '2020-04-16'),
(12, 'awd', 'akdln', 'alkwnd', 2, 'dani hamdani', '2020-04-22', '', '0000-00-00'),
(13, 'awdawdawda', 'awd', 'awdwdawdadadawdadw', 2, 'dani hamdani', '2020-04-22', '', '0000-00-00'),
(14, '2eq', 'awd', '32124ewa', 1, 'dani hamdani', '2020-04-22', '', '0000-00-00'),
(15, 'awdawd', 'adwad', 'adw', 0, 'dani hamdani', '2020-04-22', '', '0000-00-00');

-- --------------------------------------------------------

--
-- Structure for view `login`
--
DROP TABLE IF EXISTS `login`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `login`  AS  select `user`.`id_user` AS `id_user`,`user`.`username` AS `username`,`user`.`password` AS `password`,`user`.`nama_user` AS `nama_user`,`user`.`user_create` AS `user_create`,`user`.`create_date` AS `create_date`,`user`.`user_update` AS `user_update`,`user`.`update_date` AS `update_date`,`level`.`id_level` AS `id_level`,`level`.`nama_level` AS `nama_level` from (`user` left join `level` on((`user`.`id_level` = `level`.`id_level`))) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `detail`
--
ALTER TABLE `detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kendaraan`
--
ALTER TABLE `kendaraan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `level`
--
ALTER TABLE `level`
  ADD PRIMARY KEY (`id_level`);

--
-- Indexes for table `rak`
--
ALTER TABLE `rak`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sparepart`
--
ALTER TABLE `sparepart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `detail`
--
ALTER TABLE `detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `karyawan`
--
ALTER TABLE `karyawan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `kendaraan`
--
ALTER TABLE `kendaraan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `level`
--
ALTER TABLE `level`
  MODIFY `id_level` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `rak`
--
ALTER TABLE `rak`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `sparepart`
--
ALTER TABLE `sparepart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
