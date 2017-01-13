/*
MySQL Backup
Source Server Version: 5.5.5
Source Database: ponsel_handphone
Date: 1/13/2017 17:44:00
*/


-- ----------------------------
--  Table structure for `detail_penerimaan_barang`
-- ----------------------------
DROP TABLE IF EXISTS `detail_penerimaan_barang`;
CREATE TABLE `detail_penerimaan_barang` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `penerimaan_id` int(11) NOT NULL,
  `master_barang_id` int(11) NOT NULL,
  `jumlah_penerimaan` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_detail_penerimaan` (`penerimaan_id`),
  KEY `fk_detail_master` (`master_barang_id`),
  CONSTRAINT `fk_detail_master` FOREIGN KEY (`master_barang_id`) REFERENCES `masterbarang` (`id`),
  CONSTRAINT `fk_detail_penerimaan` FOREIGN KEY (`penerimaan_id`) REFERENCES `penerimaan_barang` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

-- ----------------------------
--  Table structure for `detail_penjualan_barang`
-- ----------------------------
DROP TABLE IF EXISTS `detail_penjualan_barang`;
CREATE TABLE `detail_penjualan_barang` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `no_penjualan` int(11) NOT NULL,
  `kd_barang` int(11) NOT NULL,
  `jumlah_penjualan` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_detail_penjualan` (`no_penjualan`),
  CONSTRAINT `fk_detail_penjualan` FOREIGN KEY (`no_penjualan`) REFERENCES `penjualan_barang` (`no_penjualan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
--  Table structure for `detail_retur_barang`
-- ----------------------------
DROP TABLE IF EXISTS `detail_retur_barang`;
CREATE TABLE `detail_retur_barang` (
  `id` int(11) NOT NULL,
  `no_retur` int(11) NOT NULL,
  `kd_barang` int(11) NOT NULL,
  `jumlah_retur` int(11) NOT NULL,
  `keterangan` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_detail_retur` (`no_retur`),
  CONSTRAINT `fk_detail_retur` FOREIGN KEY (`no_retur`) REFERENCES `retur_barang` (`no_retur`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
--  Table structure for `masterbarang`
-- ----------------------------
DROP TABLE IF EXISTS `masterbarang`;
CREATE TABLE `masterbarang` (
  `id` int(11) NOT NULL,
  `nama_barang` varchar(50) NOT NULL,
  `jumlah_barang` int(11) NOT NULL,
  `satuan` varchar(30) DEFAULT NULL,
  `keterangan` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
--  Table structure for `penerimaan_barang`
-- ----------------------------
DROP TABLE IF EXISTS `penerimaan_barang`;
CREATE TABLE `penerimaan_barang` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tanggal_penerimaan` datetime NOT NULL,
  `id_user` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=latin1;

-- ----------------------------
--  Table structure for `penjualan_barang`
-- ----------------------------
DROP TABLE IF EXISTS `penjualan_barang`;
CREATE TABLE `penjualan_barang` (
  `no_penjualan` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) DEFAULT NULL,
  `tanggal_penjualan` datetime NOT NULL,
  PRIMARY KEY (`no_penjualan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
--  Table structure for `retur_barang`
-- ----------------------------
DROP TABLE IF EXISTS `retur_barang`;
CREATE TABLE `retur_barang` (
  `no_retur` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(50) NOT NULL,
  `tanggal_retur` datetime NOT NULL,
  PRIMARY KEY (`no_retur`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
--  Records 
-- ----------------------------
INSERT INTO `detail_penerimaan_barang` VALUES ('11','43','1234','6'),  ('12','43','12345','7'),  ('13','43','123','10'),  ('14','44','1234','10'),  ('15','44','12345','12'),  ('16','44','123','17'),  ('17','45','1234','15'),  ('18','45','12345','7'),  ('19','45','123','70');
INSERT INTO `masterbarang` VALUES ('123','charger hape','30','pcs',''),  ('1234','casing black berry','40','',''),  ('12345','kondom hape','34','','');
INSERT INTO `penerimaan_barang` VALUES ('43','2017-01-09 00:00:00','0'),  ('44','2017-01-10 00:00:00','0'),  ('45','2017-01-11 00:00:00','0');
