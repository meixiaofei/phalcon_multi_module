/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50714
Source Host           : localhost:3306
Source Database       : phalcon

Target Server Type    : MYSQL
Target Server Version : 50714
File Encoding         : 65001

Date: 2017-06-15 23:51:11
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for ice_user
-- ----------------------------
DROP TABLE IF EXISTS `ice_user`;
CREATE TABLE `ice_user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `phone` bigint(20) unsigned DEFAULT NULL,
  `password` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `ice_table` tinyint(1) DEFAULT '1',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of ice_user
-- ----------------------------
INSERT INTO `ice_user` VALUES ('1', '15612345678', '123456', '1', '2017-06-14 10:09:32', '2017-06-15 12:47:25');
INSERT INTO `ice_user` VALUES ('2', '15612345678', '123456', '1', '2017-06-14 10:09:32', '2017-06-15 12:47:25');
INSERT INTO `ice_user` VALUES ('3', '15612345678', '123456', '1', '2017-06-14 10:09:51', '2017-06-15 12:47:25');
INSERT INTO `ice_user` VALUES ('4', '15612345678', '123456', '1', '2017-06-14 10:09:51', '2017-06-15 12:47:25');

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `phone` bigint(20) unsigned DEFAULT NULL,
  `password` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES ('2', '15612345678', '123456', '2017-06-14 10:09:32', '2017-06-15 12:44:48');
INSERT INTO `user` VALUES ('3', '15612345678', '123456', '2017-06-14 10:09:51', '2017-06-15 12:44:48');
INSERT INTO `user` VALUES ('4', '15612345678', '123456', '2017-06-14 10:09:51', '2017-06-15 12:44:48');
INSERT INTO `user` VALUES ('5', '15612345678', '123456', '2017-06-15 19:41:15', '2017-06-15 19:56:35');
INSERT INTO `user` VALUES ('6', '15612345678', '123456', '2017-06-15 19:41:16', '2017-06-15 19:56:35');
INSERT INTO `user` VALUES ('7', '15612345678', '123456', '2017-06-15 19:41:32', '2017-06-15 19:56:35');
INSERT INTO `user` VALUES ('8', '15612345678', '123456', '2017-06-15 19:41:32', '2017-06-15 19:56:35');
INSERT INTO `user` VALUES ('9', '15612345678', '123456', '2017-06-15 19:52:39', '2017-06-15 19:56:35');
INSERT INTO `user` VALUES ('10', '15612345678', '123456', '2017-06-15 19:52:39', '2017-06-15 19:56:35');
