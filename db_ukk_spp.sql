/*
 Navicat Premium Data Transfer

 Source Server         : MySql
 Source Server Type    : MySQL
 Source Server Version : 100416
 Source Host           : localhost:3306
 Source Schema         : db_ukk_spp

 Target Server Type    : MySQL
 Target Server Version : 100416
 File Encoding         : 65001

 Date: 23/05/2021 14:21:24
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for tb_bulan
-- ----------------------------
DROP TABLE IF EXISTS `tb_bulan`;
CREATE TABLE `tb_bulan`  (
  `id_bulan` int(11) NOT NULL AUTO_INCREMENT,
  `bulan` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id_bulan`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 14 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tb_bulan
-- ----------------------------
INSERT INTO `tb_bulan` VALUES (1, 'January');
INSERT INTO `tb_bulan` VALUES (2, 'Febuary');
INSERT INTO `tb_bulan` VALUES (3, 'Maret');
INSERT INTO `tb_bulan` VALUES (4, 'April');
INSERT INTO `tb_bulan` VALUES (5, 'Mei');
INSERT INTO `tb_bulan` VALUES (6, 'Juni');
INSERT INTO `tb_bulan` VALUES (7, 'July');
INSERT INTO `tb_bulan` VALUES (8, 'Agustus');
INSERT INTO `tb_bulan` VALUES (9, 'September');
INSERT INTO `tb_bulan` VALUES (10, 'Oktober');
INSERT INTO `tb_bulan` VALUES (11, 'November');
INSERT INTO `tb_bulan` VALUES (12, 'Desember');

-- ----------------------------
-- Table structure for tb_kelas
-- ----------------------------
DROP TABLE IF EXISTS `tb_kelas`;
CREATE TABLE `tb_kelas`  (
  `id_kelas` int(11) NOT NULL AUTO_INCREMENT,
  `kelas` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `jurusan` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id_kelas`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tb_kelas
-- ----------------------------
INSERT INTO `tb_kelas` VALUES (1, 'XII RPL A', 'Rekayasa Perangkat Lunak');
INSERT INTO `tb_kelas` VALUES (2, 'XII RPL B', 'Rekayasa Perangkat Lunak');
INSERT INTO `tb_kelas` VALUES (3, 'XII RPL C', 'Rekayasa Perangkat Lunak');
INSERT INTO `tb_kelas` VALUES (5, 'XII DG A', 'Desain Grafis');

-- ----------------------------
-- Table structure for tb_petugas
-- ----------------------------
DROP TABLE IF EXISTS `tb_petugas`;
CREATE TABLE `tb_petugas`  (
  `id_petugas` varchar(11) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `nama` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `username` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id_petugas`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tb_petugas
-- ----------------------------
INSERT INTO `tb_petugas` VALUES ('P0001', 'petugas', 'petugas', '$2y$10$JmDW9qN5HZB86bNFA2pN4e9GtGBMvsbA9s1OFlP7c7BmY/99asZ.a');
INSERT INTO `tb_petugas` VALUES ('P0002', 'petugas2', 'petugas2', '$2y$10$2hprkAws9.ZtoFYjopD4XeZJqLNsKnNVhRDQu6hIlQYaYx5LI4SvW');

-- ----------------------------
-- Table structure for tb_role
-- ----------------------------
DROP TABLE IF EXISTS `tb_role`;
CREATE TABLE `tb_role`  (
  `id_role` int(11) NOT NULL AUTO_INCREMENT,
  `role` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id_role`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tb_role
-- ----------------------------
INSERT INTO `tb_role` VALUES (1, 'Admin');
INSERT INTO `tb_role` VALUES (2, 'Petugas');
INSERT INTO `tb_role` VALUES (3, 'Siswa');

-- ----------------------------
-- Table structure for tb_siswa
-- ----------------------------
DROP TABLE IF EXISTS `tb_siswa`;
CREATE TABLE `tb_siswa`  (
  `id_siswa` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `nis` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `nama` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `kelas` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `tahun` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id_siswa`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tb_siswa
-- ----------------------------
INSERT INTO `tb_siswa` VALUES ('S0001', '185831233065', 'Bariq Firjatullah', 'XII RPL B', '2021');
INSERT INTO `tb_siswa` VALUES ('S0003', '195131927065', 'Adriel Baptista Adiwiguna', 'XII RPL B', '2021');
INSERT INTO `tb_siswa` VALUES ('S0004', '195141928065', 'Aldy Yuan Guruh Nugroho', 'XII RPL B', '2021');
INSERT INTO `tb_siswa` VALUES ('S0005', '195131927065', 'Alvin Amroe Ainaura', 'XII RPL B', '2021');
INSERT INTO `tb_siswa` VALUES ('S0006', '195141928065', 'Alya Harwanda Dwi Putri', 'XII RPL B', '2021');
INSERT INTO `tb_siswa` VALUES ('S0007', '195131927065', 'Amanda Gabby Jenisi Andraini', 'XII RPL B', '2021');
INSERT INTO `tb_siswa` VALUES ('S0008', '195141928065', 'Amiruddin Fadhillah', 'XII RPL B', '2021');
INSERT INTO `tb_siswa` VALUES ('S0009', '195131927065', 'Ananta Wira Satriaji', 'XII RPL B', '2021');
INSERT INTO `tb_siswa` VALUES ('S0010', '195141928065', 'Ardhian Satria Boediarto', 'XII RPL B', '2021');
INSERT INTO `tb_siswa` VALUES ('S0011', '195131927065', 'Bayu Firmansyah Wahyudi', 'XII RPL B', '2021');
INSERT INTO `tb_siswa` VALUES ('S0012', '195141928065', 'Dewa Caravelle Athaullah Syach Erdian', 'XII RPL B', '2021');
INSERT INTO `tb_siswa` VALUES ('S0013', '195131927065', 'Dian Afiandi', 'XII RPL B', '2021');
INSERT INTO `tb_siswa` VALUES ('S0014', '195141928065', 'Dimas Nuansa Bening', 'XII RPL B', '2021');
INSERT INTO `tb_siswa` VALUES ('S0015', '195131927065', 'Dwiky Riza Prasetya', 'XII RPL B', '2021');
INSERT INTO `tb_siswa` VALUES ('S0016', '195141928065', 'Enrico Rizky Ilhami', 'XII RPL B', '2021');
INSERT INTO `tb_siswa` VALUES ('S0017', '195131927065', 'Esti Widyawati', 'XII RPL B', '2021');
INSERT INTO `tb_siswa` VALUES ('S0018', '195141928065', 'Gilang Purnama', 'XII RPL B', '2021');
INSERT INTO `tb_siswa` VALUES ('S0019', '195131927065', 'Joshua Ariel Readyan', 'XII RPL B', '2021');
INSERT INTO `tb_siswa` VALUES ('S0020', '195141928065', 'Krisna Amarilian Adi Putra', 'XII RPL B', '2021');
INSERT INTO `tb_siswa` VALUES ('S0021', '195131927065', 'Lukman Hakim', 'XII RPL B', '2021');
INSERT INTO `tb_siswa` VALUES ('S0022', '195141928065', 'Lyra Ayu Sephia', 'XII RPL B', '2021');
INSERT INTO `tb_siswa` VALUES ('S0023', '195131927065', 'Moch Tegar Hendrawan', 'XII RPL B', '2021');
INSERT INTO `tb_siswa` VALUES ('S0024', '195141928065', 'Muhammad Hanafi Syabana', 'XII RPL B', '2021');
INSERT INTO `tb_siswa` VALUES ('S0025', '195131927065', 'Muhammad Fadilah Maulana', 'XII RPL B', '2021');
INSERT INTO `tb_siswa` VALUES ('S0026', '195141928065', 'Muhammad Haqqi Yuliansyah', 'XII RPL B', '2021');
INSERT INTO `tb_siswa` VALUES ('S0027', '195131927065', 'Ni Putu Oudheta Rageswa Udiyana', 'XII RPL B', '2021');
INSERT INTO `tb_siswa` VALUES ('S0028', '195141928065', 'Priska Larasati', 'XII RPL B', '2021');
INSERT INTO `tb_siswa` VALUES ('S0029', '195131927065', 'Rachmania Yusa Afriani', 'XII RPL B', '2021');
INSERT INTO `tb_siswa` VALUES ('S0030', '195141928065', 'Ramadhani Adriansyah', 'XII RPL B', '2021');
INSERT INTO `tb_siswa` VALUES ('S0031', '195131927065', 'Rangga Dwi Saputra', 'XII RPL B', '2021');
INSERT INTO `tb_siswa` VALUES ('S0032', '195141928065', 'Riski Abdi Prasetya', 'XII RPL B', '2021');
INSERT INTO `tb_siswa` VALUES ('S0033', '195131927065', 'Salim', 'XII RPL B', '2021');
INSERT INTO `tb_siswa` VALUES ('S0034', '195141928065', 'Shierly Margaretha Tetelepta', 'XII RPL B', '2021');
INSERT INTO `tb_siswa` VALUES ('S0035', '195131927065', 'Vina Eka Laylani', 'XII RPL B', '2021');
INSERT INTO `tb_siswa` VALUES ('S0036', '1234', 'saya', 'XII RPL B', '2021');

-- ----------------------------
-- Table structure for tb_spp
-- ----------------------------
DROP TABLE IF EXISTS `tb_spp`;
CREATE TABLE `tb_spp`  (
  `id_spp` int(11) NOT NULL AUTO_INCREMENT,
  `tahun` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `nominal` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id_spp`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tb_spp
-- ----------------------------
INSERT INTO `tb_spp` VALUES (2, '2021', '150000');
INSERT INTO `tb_spp` VALUES (3, '2020', '130000');
INSERT INTO `tb_spp` VALUES (4, '2022', '150000');

-- ----------------------------
-- Table structure for tb_transaksi
-- ----------------------------
DROP TABLE IF EXISTS `tb_transaksi`;
CREATE TABLE `tb_transaksi`  (
  `id_transaksi` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `id_siswa` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `id_petugas` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `id_bulan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `id_spp` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `date_created` date NULL DEFAULT NULL,
  PRIMARY KEY (`id_transaksi`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tb_transaksi
-- ----------------------------
INSERT INTO `tb_transaksi` VALUES ('1619570916', 'S0001', 'ADMIN', '1', '2', 'Lunas', '2021-04-28');
INSERT INTO `tb_transaksi` VALUES ('1619571150', 'S0001', 'ADMIN', '2', '2', 'Lunas', '2021-04-28');
INSERT INTO `tb_transaksi` VALUES ('1619571151', 'S0001', 'ADMIN', '2', '2', 'Lunas', '2021-04-28');
INSERT INTO `tb_transaksi` VALUES ('1619571180', 'S0001', 'ADMIN', '3', '2', 'Lunas', '2021-04-28');
INSERT INTO `tb_transaksi` VALUES ('1619572041', 'S0001', 'ADMIN', '4', '2', 'Lunas', '2021-04-28');
INSERT INTO `tb_transaksi` VALUES ('1619572047', 'S0001', 'ADMIN', '5', '2', 'Lunas', '2021-04-28');
INSERT INTO `tb_transaksi` VALUES ('1619572145', 'S0001', 'ADMIN', '6', '2', 'Lunas', '2021-04-28');
INSERT INTO `tb_transaksi` VALUES ('1620101987', 'S0001', 'ADMIN', '7', '2', 'Lunas', '2021-05-04');
INSERT INTO `tb_transaksi` VALUES ('1620102096', 'S0001', 'P0001', '8', '2', 'Lunas', '2021-05-04');

-- ----------------------------
-- Table structure for tb_user
-- ----------------------------
DROP TABLE IF EXISTS `tb_user`;
CREATE TABLE `tb_user`  (
  `id_user` varchar(11) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `nama` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `username` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `role_id` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id_user`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tb_user
-- ----------------------------
INSERT INTO `tb_user` VALUES ('ADMIN', 'admin', 'admin', '$2y$10$E/GqYUJTokkaQ7Y3THMyruGlOxrahusOVC2F6YGHkqE93XvX0reBa', '1');
INSERT INTO `tb_user` VALUES ('P0001', 'Petugas', 'petugas', '$2y$10$JmDW9qN5HZB86bNFA2pN4e9GtGBMvsbA9s1OFlP7c7BmY/99asZ.a', '2');
INSERT INTO `tb_user` VALUES ('P0002', 'petugas2', 'petugas2', '$2y$10$2hprkAws9.ZtoFYjopD4XeZJqLNsKnNVhRDQu6hIlQYaYx5LI4SvW', '2');

-- ----------------------------
-- Procedure structure for GetAllSiswa
-- ----------------------------
DROP PROCEDURE IF EXISTS `GetAllSiswa`;
delimiter ;;
CREATE PROCEDURE `GetAllSiswa`()
BEGIN
SELECT * FROM tb_siswa ORDER BY nama ASC;
END
;;
delimiter ;

-- ----------------------------
-- Triggers structure for table tb_siswa
-- ----------------------------
DROP TRIGGER IF EXISTS `delete_pembayaran`;
delimiter ;;
CREATE TRIGGER `delete_pembayaran` AFTER DELETE ON `tb_siswa` FOR EACH ROW BEGIN
DELETE FROM tb_transaksi WHERE tb_transaksi.id_siswa = old.id_siswa;
END
;;
delimiter ;

SET FOREIGN_KEY_CHECKS = 1;
