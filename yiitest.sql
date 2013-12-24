/*
Navicat MySQL Data Transfer

Source Server         : local
Source Server Version : 50529
Source Host           : localhost:3306
Source Database       : yiitest

Target Server Type    : MYSQL
Target Server Version : 50529
File Encoding         : 65001

Date: 2013-12-24 16:47:28
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `yii_admin`
-- ----------------------------
DROP TABLE IF EXISTS `yii_admin`;
CREATE TABLE `yii_admin` (
  `uid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `password` char(32) NOT NULL,
  PRIMARY KEY (`uid`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of yii_admin
-- ----------------------------
INSERT INTO `yii_admin` VALUES ('1', 'admin', '21232f297a57a5a743894a0e4a801fc3');

-- ----------------------------
-- Table structure for `yii_article`
-- ----------------------------
DROP TABLE IF EXISTS `yii_article`;
CREATE TABLE `yii_article` (
  `aid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(200) NOT NULL,
  `pubtime` int(10) unsigned NOT NULL DEFAULT '0',
  `pic` varchar(200) NOT NULL,
  `content` text,
  `type` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `info` varchar(200) NOT NULL,
  `cid` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`aid`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of yii_article
-- ----------------------------
INSERT INTO `yii_article` VALUES ('6', 'aaa', '1387789321', 'img_201312231634271898.jpg', '<p>aaaaaa</p>', '0', 'aaa', '1');
INSERT INTO `yii_article` VALUES ('7', 'bbb', '1387789322', 'img_201312231634372315.jpg', '<p>bbbbb</p>', '0', 'bbb', '3');
INSERT INTO `yii_article` VALUES ('8', 'cccc', '1387789323', 'img_201312231634521977.jpg', '<p>ccc<br/></p>', '0', 'ccc', '3');
INSERT INTO `yii_article` VALUES ('9', 'dd', '1387789327', 'img_201312231702073745.jpg', '<p>ddddd</p>', '1', 'ddd', '1');

-- ----------------------------
-- Table structure for `yii_cate`
-- ----------------------------
DROP TABLE IF EXISTS `yii_cate`;
CREATE TABLE `yii_cate` (
  `cid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `cname` varchar(20) NOT NULL,
  PRIMARY KEY (`cid`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of yii_cate
-- ----------------------------
INSERT INTO `yii_cate` VALUES ('1', '情感');
INSERT INTO `yii_cate` VALUES ('3', '生活');
