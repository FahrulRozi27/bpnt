/*
 Navicat Premium Data Transfer

 Source Server         : kominfo
 Source Server Type    : MySQL
 Source Server Version : 100406
 Source Host           : localhost:3306
 Source Schema         : db_bpnt

 Target Server Type    : MySQL
 Target Server Version : 100406
 File Encoding         : 65001

 Date: 01/06/2021 18:33:04
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for tb_user
-- ----------------------------
DROP TABLE IF EXISTS `tb_user`;
CREATE TABLE `tb_user`  (
  `username` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `nama_lengkap` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `jenis_kelamin` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `no_hp` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `jabatan` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `foto` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `role_id` int(1) NOT NULL,
  PRIMARY KEY (`username`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tb_user
-- ----------------------------
INSERT INTO `tb_user` VALUES ('12121', 'Deserunt temporibus ', 'Numquam in', 'zaqycifil@mailinator.com', 'Optio molestiae', 'Fugiat mollitia corp', '', '$2y$10$SC8.8fQ/GbITTxeJmguumOTNhtNosiuvSYC88.2mDcTOv66Cju33S', 1);
INSERT INTO `tb_user` VALUES ('123144', 'fahma', 'laki', 'rozifahrul897@gmail.', '12345678', 'rtt', 'avatar2811.png', '', 0);
INSERT INTO `tb_user` VALUES ('123456', 'rozi', 'laki', 'rozifahrul897@gmail.', '12345678', 'rtt', '', '$2y$10$PCIGW9I/LpoDyPB/239JLem2dSjKtEmPABvmGeycJ5.32HJiK7TOy', 1);
INSERT INTO `tb_user` VALUES ('1243672443', 'ghh', 'laki', 'rozifahrul897@gmail.', '533', '253', 'avatar2812.png', '', 1);
INSERT INTO `tb_user` VALUES ('cek', 'Agus Amirudin', 'Laki-laki', 'aamirudinkom@gmail.com', '089928732873', 'Kepala', 'avatar2812.png', '$2y$10$JbR92NNekoUJSYOhb7bOi.E13borgZknbiwzJTvDwCFM6gQKd2/da', 1);

SET FOREIGN_KEY_CHECKS = 1;
