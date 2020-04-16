#
# TABLE STRUCTURE FOR: detail
#

DROP TABLE IF EXISTS `detail`;

CREATE TABLE `detail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
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
  `update_date` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

INSERT INTO `detail` (`id`, `nama_karyawan`, `nopol`, `model_kendaraan`, `vin_rangka`, `kilometer`, `tgl_perbaikan`, `tgl_penyerahan`, `no_part`, `barcode`, `lpd`, `nama_rak`, `qr_code`, `user_create`, `create_date`, `user_update`, `update_date`) VALUES (4, 'wulan', 'D65411', 'sdhagd', '19821928', '131313313', '2020-04-02', '2020-04-30', 'D04465-BZ153-000', '2311112331', '12131231', 'lovanto jurig', 'sdhagd.png', 'dani hamdani', '2020-04-15', 'dani hamdani', '2020-04-15');
INSERT INTO `detail` (`id`, `nama_karyawan`, `nopol`, `model_kendaraan`, `vin_rangka`, `kilometer`, `tgl_perbaikan`, `tgl_penyerahan`, `no_part`, `barcode`, `lpd`, `nama_rak`, `qr_code`, `user_create`, `create_date`, `user_update`, `update_date`) VALUES (6, 'awdawdawda', '232131', 'adwad', '9769809', '8978', '0000-00-00', '0000-00-00', '232', '12313', '1222', 'awdawdw', 'awdawdawda.png', 'dani hamdani', '2020-04-15', NULL, NULL);


#
# TABLE STRUCTURE FOR: karyawan
#

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
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

INSERT INTO `karyawan` (`id`, `npk`, `nama_karyawan`, `jk`, `tgl_lahir`, `alamat`, `no_telp`, `no_ktp`, `email`, `tgl_masuk`, `status_karyawan`, `qr_code`, `user_create`, `create_date`, `user_update`, `update_date`) VALUES (4, 12, 'wulan', 'perempuan', '1994-09-13', 'dusun sukawening desa hegarmanah rt 04 rw 06', '085715329867', 2147483647, 'wulammariaulfah@gmail.com', '2020-02-13', 'Kontrak', '.png', 'dani hamdani', '2020-04-11', NULL, NULL);
INSERT INTO `karyawan` (`id`, `npk`, `nama_karyawan`, `jk`, `tgl_lahir`, `alamat`, `no_telp`, `no_ktp`, `email`, `tgl_masuk`, `status_karyawan`, `qr_code`, `user_create`, `create_date`, `user_update`, `update_date`) VALUES (10, 232, 'adawdwad', 'awdwad', '0000-00-00', 'adwdw awdada dawdawdad adwwa awd', '9384292', 128372722, 'alwdkhnawd', '0000-00-00', 'ajwd', '232.png', 'dani hamdani', '2020-04-15', NULL, NULL);


#
# TABLE STRUCTURE FOR: kendaraan
#

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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

INSERT INTO `kendaraan` (`id`, `nopol`, `model`, `tipe_mesin`, `model_kendaraan`, `vin_rangka`, `kilometer`, `qr_code`, `user_create`, `create_date`, `user_update`, `update_date`) VALUES (1, 'D65411', 'avanza', 'tipeuting', 'sdhagd', '19821928', '131313313', 'sdhagd.png', 'dani hamdani', '2020-04-12', 'dani hamdani', '2020-04-12');
INSERT INTO `kendaraan` (`id`, `nopol`, `model`, `tipe_mesin`, `model_kendaraan`, `vin_rangka`, `kilometer`, `qr_code`, `user_create`, `create_date`, `user_update`, `update_date`) VALUES (3, '23222', 'awd', 'adw', 'awdadawd', '20193', '29833', '23222.png', 'dani hamdani', '2020-04-15', '', '0000-00-00');


#
# TABLE STRUCTURE FOR: level
#

DROP TABLE IF EXISTS `level`;

CREATE TABLE `level` (
  `id_level` int(11) NOT NULL AUTO_INCREMENT,
  `nama_level` varchar(20) NOT NULL,
  PRIMARY KEY (`id_level`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

INSERT INTO `level` (`id_level`, `nama_level`) VALUES (1, 'admin');
INSERT INTO `level` (`id_level`, `nama_level`) VALUES (2, 'checker');
INSERT INTO `level` (`id_level`, `nama_level`) VALUES (3, 'owner');
INSERT INTO `level` (`id_level`, `nama_level`) VALUES (4, 'pelanggan');


#
# TABLE STRUCTURE FOR: rak
#

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
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

INSERT INTO `rak` (`id`, `no_rak`, `nama_rak`, `qr_code`, `user_create`, `create_date`, `user_update`, `update_date`) VALUES (2, 111, 'kastilion', '0111.png', 'dani hamdani', '2020-04-11', 'dani hamdani', '2020-04-11');
INSERT INTO `rak` (`id`, `no_rak`, `nama_rak`, `qr_code`, `user_create`, `create_date`, `user_update`, `update_date`) VALUES (3, 120, 'aaaa', '120.png', 'dani hamdani', '2020-04-11', NULL, NULL);
INSERT INTO `rak` (`id`, `no_rak`, `nama_rak`, `qr_code`, `user_create`, `create_date`, `user_update`, `update_date`) VALUES (4, 22, 'rok', '22.png', 'dani hamdani', '2020-04-11', NULL, NULL);
INSERT INTO `rak` (`id`, `no_rak`, `nama_rak`, `qr_code`, `user_create`, `create_date`, `user_update`, `update_date`) VALUES (5, 400, 'JULID', '400.png', 'dani hamdani', '2020-04-11', NULL, NULL);
INSERT INTO `rak` (`id`, `no_rak`, `nama_rak`, `qr_code`, `user_create`, `create_date`, `user_update`, `update_date`) VALUES (6, 21, 'aaaaaaaaaaaaaaaaaaa', '21.png', 'dani hamdani', '2020-04-11', NULL, NULL);
INSERT INTO `rak` (`id`, `no_rak`, `nama_rak`, `qr_code`, `user_create`, `create_date`, `user_update`, `update_date`) VALUES (7, 55, 'esien', '55.png', 'dani hamdani', '2020-04-11', NULL, NULL);
INSERT INTO `rak` (`id`, `no_rak`, `nama_rak`, `qr_code`, `user_create`, `create_date`, `user_update`, `update_date`) VALUES (9, 89, 'suqi', '89.png', 'dani hamdani', '2020-04-11', NULL, NULL);
INSERT INTO `rak` (`id`, `no_rak`, `nama_rak`, `qr_code`, `user_create`, `create_date`, `user_update`, `update_date`) VALUES (11, 56, 'dani hamdani', 'dani hamdani.png', 'dani hamdani', '2020-04-11', NULL, NULL);
INSERT INTO `rak` (`id`, `no_rak`, `nama_rak`, `qr_code`, `user_create`, `create_date`, `user_update`, `update_date`) VALUES (12, 8999, 'lovanto jurig', 'lovanto jurig.png', 'dani hamdani', '2020-04-11', NULL, NULL);
INSERT INTO `rak` (`id`, `no_rak`, `nama_rak`, `qr_code`, `user_create`, `create_date`, `user_update`, `update_date`) VALUES (13, 999, 'juriggg', 'juriggg.png', 'dani hamdani', '2020-04-11', NULL, NULL);
INSERT INTO `rak` (`id`, `no_rak`, `nama_rak`, `qr_code`, `user_create`, `create_date`, `user_update`, `update_date`) VALUES (16, 231242421, 'awdjhlnawd', '231242421.png', 'dani hamdani', '2020-04-15', NULL, NULL);


#
# TABLE STRUCTURE FOR: sparepart
#

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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

INSERT INTO `sparepart` (`id`, `no_part`, `deskripsi`, `qr_code`, `user_create`, `create_date`, `user_update`, `update_date`) VALUES (1, 'D04465-BZ153-000', 'PAD KIT, DISC BRAKE ,BRACKER', 'D04465-BZ153-000.png', 'dani hamdani', '2020-04-11', 'dani hamdani', '2020-04-11');
INSERT INTO `sparepart` (`id`, `no_part`, `deskripsi`, `qr_code`, `user_create`, `create_date`, `user_update`, `update_date`) VALUES (2, 'D04478-BZ060-001', '\"CYLINDER KIT, FR DISC BRAKE\"', 'D04478-BZ060-001.png', 'dani hamdani', '2020-04-11', '', '0000-00-00');
INSERT INTO `sparepart` (`id`, `no_part`, `deskripsi`, `qr_code`, `user_create`, `create_date`, `user_update`, `update_date`) VALUES (4, '123456789', 'aljwndkaw awkdw wadaaw', '123456789.png', 'dani hamdani', '2020-04-15', '', '0000-00-00');


#
# TABLE STRUCTURE FOR: user
#

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

INSERT INTO `user` (`id_user`, `username`, `password`, `nama_user`, `id_level`, `user_create`, `create_date`, `user_update`, `update_date`) VALUES (1, 'dani', 'dani', 'dani hamdani', 1, '', '0000-00-00', '', '0000-00-00');
INSERT INTO `user` (`id_user`, `username`, `password`, `nama_user`, `id_level`, `user_create`, `create_date`, `user_update`, `update_date`) VALUES (7, 'wulan', 'eulan', 'wulan maria ulfah', 3, '', '0000-00-00', '', '0000-00-00');
INSERT INTO `user` (`id_user`, `username`, `password`, `nama_user`, `id_level`, `user_create`, `create_date`, `user_update`, `update_date`) VALUES (8, 'ouu', 'dani', 'juara', 4, '', '0000-00-00', 'dani hamdani', '2020-01-24');
INSERT INTO `user` (`id_user`, `username`, `password`, `nama_user`, `id_level`, `user_create`, `create_date`, `user_update`, `update_date`) VALUES (9, 'gila', 'dani', 'juara', 2, 'dani hamdani', '2020-01-24', 'dani hamdani', '2020-01-25');
INSERT INTO `user` (`id_user`, `username`, `password`, `nama_user`, `id_level`, `user_create`, `create_date`, `user_update`, `update_date`) VALUES (10, 'Wulantok', 'wulan', 'Wulantok', 1, 'dani hamdani', '2020-02-21', 'dani hamdani', '2020-04-10');


