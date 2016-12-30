/*
MySQL Backup
Source Server Version: 5.5.5
Source Database: ponsel_handphone
Date: 12/30/2016 17:09:35
*/


-- ----------------------------
--  Table structure for `detail_penerimaan_barang`
-- ----------------------------
DROP TABLE IF EXISTS `detail_penerimaan_barang`;
CREATE TABLE `detail_penerimaan_barang` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `no_penerimaan` int(11) NOT NULL,
  `kd_barang` int(11) NOT NULL,
  `jumlah_penerimaan` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_detail_penerimaan` (`no_penerimaan`),
  CONSTRAINT `fk_detail_penerimaan` FOREIGN KEY (`no_penerimaan`) REFERENCES `penerimaan_barang` (`no_penerimaaan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `kode_barang` int(11) NOT NULL,
  `nama_barang` varchar(50) NOT NULL,
  `jumlah_barang` int(11) NOT NULL,
  `satuan` varchar(30) DEFAULT NULL,
  `keterangan` text,
  PRIMARY KEY (`kode_barang`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
--  Table structure for `penerimaan_barang`
-- ----------------------------
DROP TABLE IF EXISTS `penerimaan_barang`;
CREATE TABLE `penerimaan_barang` (
  `no_penerimaaan` int(11) NOT NULL AUTO_INCREMENT,
  `tanggal_penerimaan` datetime NOT NULL,
  `id_user` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`no_penerimaaan`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- ----------------------------
--  Table structure for `penjualan_barang`
-- ----------------------------
DROP TABLE IF EXISTS `penjualan_barang`;
CREATE TABLE `penjualan_barang` (
  `no_penjualan` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `tanggal_penjualan` datetime NOT NULL,
  PRIMARY KEY (`no_penjualan`)
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=latin1;

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
INSERT INTO `masterbarang` VALUES ('123','charger hape','30','pcs',''),  ('1234','casing black berry','40','',''),  ('12345','kondom hape','34','','');
