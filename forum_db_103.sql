/*
Navicat MySQL Data Transfer

Source Server         : test
Source Server Version : 80031
Source Host           : localhost:3306
Source Database       : forum_db_103

Target Server Type    : MYSQL
Target Server Version : 80031
File Encoding         : 65001

Date: 2022-12-09 12:45:56
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for huifu
-- ----------------------------
DROP TABLE IF EXISTS `huifu`;
CREATE TABLE `huifu` (
  `id` int NOT NULL AUTO_INCREMENT,
  `huifuneirong` varchar(255) DEFAULT NULL,
  `userid` int DEFAULT NULL,
  `pinglunid` int DEFAULT NULL,
  `zaihuifuid` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `hufuuserid` (`userid`),
  KEY `pinglunid` (`pinglunid`),
  KEY `zaihuifuid` (`zaihuifuid`),
  CONSTRAINT `huifuuserid` FOREIGN KEY (`userid`) REFERENCES `user_tab` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `pinglunid` FOREIGN KEY (`pinglunid`) REFERENCES `pinglun` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `zaihuifuid` FOREIGN KEY (`zaihuifuid`) REFERENCES `user_tab` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb3;

-- ----------------------------
-- Records of huifu
-- ----------------------------
INSERT INTO `huifu` VALUES ('11', '飞洒地方', '7', '78', '7');
INSERT INTO `huifu` VALUES ('14', '自动回复', '4', '80', '7');

-- ----------------------------
-- Table structure for luntan
-- ----------------------------
DROP TABLE IF EXISTS `luntan`;
CREATE TABLE `luntan` (
  `id` int NOT NULL AUTO_INCREMENT,
  `userid` int DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `neirong` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8mb3;

-- ----------------------------
-- Records of luntan
-- ----------------------------
INSERT INTO `luntan` VALUES ('22', '4', 'Dg', 'sdgGF');
INSERT INTO `luntan` VALUES ('24', '8', 'x第三个这个g', 'g芝士蛋糕');
INSERT INTO `luntan` VALUES ('25', '8', '啊发生的v部分', '昂菲VS反对');
INSERT INTO `luntan` VALUES ('26', '4', '月亮不睡我不睡', '我想回家！！！');
INSERT INTO `luntan` VALUES ('27', '4', '月亮不睡我不睡', '的气味的');
INSERT INTO `luntan` VALUES ('28', '4', '月亮不睡我不睡', '呃呃呃');
INSERT INTO `luntan` VALUES ('29', '4', '为前锋', '无球');
INSERT INTO `luntan` VALUES ('30', '4', '月亮不睡我不睡', '为');
INSERT INTO `luntan` VALUES ('31', '4', '月亮不睡我不睡', '二为前锋');
INSERT INTO `luntan` VALUES ('32', '4', '月亮不睡我不睡', '千峰');
INSERT INTO `luntan` VALUES ('33', '4', '月亮不睡我不睡', '违法');
INSERT INTO `luntan` VALUES ('34', '4', '月亮不睡我不睡', '而无法');
INSERT INTO `luntan` VALUES ('35', '4', '月亮不睡我不睡', '地方会');
INSERT INTO `luntan` VALUES ('36', '4', '月亮不睡我不睡', '额F');
INSERT INTO `luntan` VALUES ('37', '4', '月亮不睡我不睡', 'FEW');
INSERT INTO `luntan` VALUES ('38', '5', '7.2 课后练习rea', 'yaeryre');

-- ----------------------------
-- Table structure for pinglun
-- ----------------------------
DROP TABLE IF EXISTS `pinglun`;
CREATE TABLE `pinglun` (
  `id` int NOT NULL AUTO_INCREMENT,
  `titleid` int DEFAULT NULL,
  `pinglunneirong` varchar(255) DEFAULT NULL,
  `userid` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `userid` (`userid`),
  KEY `titleid` (`titleid`),
  CONSTRAINT `titleid` FOREIGN KEY (`titleid`) REFERENCES `luntan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `userid` FOREIGN KEY (`userid`) REFERENCES `user_tab` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=83 DEFAULT CHARSET=utf8mb3;

-- ----------------------------
-- Records of pinglun
-- ----------------------------
INSERT INTO `pinglun` VALUES ('78', '22', '12321a啊是大', '7');
INSERT INTO `pinglun` VALUES ('79', '22', '地方都是', '7');
INSERT INTO `pinglun` VALUES ('80', '22', '第三方vv', '7');
INSERT INTO `pinglun` VALUES ('82', '22', '来了', '4');

-- ----------------------------
-- Table structure for user_tab
-- ----------------------------
DROP TABLE IF EXISTS `user_tab`;
CREATE TABLE `user_tab` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb3;

-- ----------------------------
-- Records of user_tab
-- ----------------------------
INSERT INTO `user_tab` VALUES ('2', '999', '999');
INSERT INTO `user_tab` VALUES ('3', '432', '432');
INSERT INTO `user_tab` VALUES ('4', '123', '123');
INSERT INTO `user_tab` VALUES ('5', '111', '111');
INSERT INTO `user_tab` VALUES ('6', '222', '222');
INSERT INTO `user_tab` VALUES ('7', '333', '333');
INSERT INTO `user_tab` VALUES ('8', '444', '444');
