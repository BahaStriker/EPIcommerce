/*
Navicat MySQL Data Transfer

Source Server         : EPI
Source Server Version : 50554
Source Host           : 173.212.208.17:3306
Source Database       : market

Target Server Type    : MYSQL
Target Server Version : 50554
File Encoding         : 65001

Date: 2017-03-12 05:00:40
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for category
-- ----------------------------
DROP TABLE IF EXISTS `category`;
CREATE TABLE `category` (
  `refcat` varchar(11) NOT NULL,
  `name` text NOT NULL,
  `type` enum('Girl','Boy','Child','Women','Men') NOT NULL,
  KEY `refcat` (`refcat`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for history
-- ----------------------------
DROP TABLE IF EXISTS `history`;
CREATE TABLE `history` (
  `ProductId` varchar(11) NOT NULL,
  `BuyDate` datetime NOT NULL,
  KEY `ProductId` (`ProductId`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for product
-- ----------------------------
DROP TABLE IF EXISTS `product`;
CREATE TABLE `product` (
  `ProductId` varchar(11) NOT NULL,
  `Name` text NOT NULL,
  `Prix` decimal(10,0) NOT NULL,
  `Ref` varchar(20) NOT NULL,
  `Quant` int(11) NOT NULL,
  `Img` varchar(100) NOT NULL,
  `Description` varchar(100) NOT NULL,
  PRIMARY KEY (`ProductId`),
  KEY `Ref` (`Ref`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(64) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(20) DEFAULT NULL,
  `lastname` varchar(35) DEFAULT NULL,
  `email` varchar(50) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `zip` varchar(255) DEFAULT NULL,
  `birthdate` date DEFAULT NULL,
  `role` enum('member','seller','admin') NOT NULL DEFAULT 'member',
  `ip` varchar(255) NOT NULL,
  `banned` int(11) NOT NULL DEFAULT '0',
  `interest` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
