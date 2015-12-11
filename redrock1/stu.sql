/*
Navicat MySQL Data Transfer

Source Server         : fortest
Source Server Version : 50612
Source Host           : 127.0.0.1:3306
Source Database       : stu

Target Server Type    : MYSQL
Target Server Version : 50612
File Encoding         : 65001

Date: 2015-11-27 16:25:45
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `Id` int(100) NOT NULL,
  `Name` varchar(255) DEFAULT NULL,
  `Price` decimal(10,2) DEFAULT NULL,
  `Production date` datetime(6) DEFAULT NULL,
  `Product quantity` varchar(255) DEFAULT NULL,
  `Order form` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('1', '秋冬新款羊毛呢大衣', '521.00', '2015-10-19 14:39:14.000000', '16', '3');
INSERT INTO `users` VALUES ('2', '新款冬季男士风衣中长款修身', '198.00', '2015-11-01 06:31:52.000000', '6', '1');
INSERT INTO `users` VALUES ('3', '秋冬季男士格子加厚保暖衬衫', '99.00', '2015-11-10 19:33:51.000000', '13', '10');
INSERT INTO `users` VALUES ('4', '秋冬男装中年男士长袖衬衫加绒加厚保暖', '78.00', '2015-10-30 09:37:27.000000', '20', '14');
INSERT INTO `users` VALUES ('5', '秋冬季男装棉麻休闲裤日系修身款小脚裤', '88.00', '2015-11-18 13:40:15.000000', '9', '2');
INSERT INTO `users` VALUES ('6', '冬季加绒休闲裤男士修身秋冬青年男裤', '98.00', '2015-04-14 09:42:19.000000', '11', '5');
INSERT INTO `users` VALUES ('7', '纯色黑色 休闲裤 男士修身夏季韩版小脚', '79.00', '2015-05-29 09:43:15.000000', '7', '0');
INSERT INTO `users` VALUES ('8', '秋冬季高帮板鞋运动休闲鞋', '39.90', '2015-03-18 08:44:43.000000', '26', '18');
INSERT INTO `users` VALUES ('9', '真皮英伦皮鞋男鞋青春潮流韩版', '158.00', '2015-11-02 17:46:38.000000', '30', '12');
INSERT INTO `users` VALUES ('10', '韩版大码女装秋装连衣裙棉麻长袖', '78.00', '2015-10-05 15:47:50.000000', '21', '9');
INSERT INTO `users` VALUES ('11', '品牌女装修身显瘦新品冬天裙子七分袖', '169.00', '2015-10-15 09:49:05.000000', '14', '7');
INSERT INTO `users` VALUES ('12', '情侣装秋装2015新款韩版条纹连衣裙', '128.00', '2015-07-15 14:49:50.000000', '40', '23');
INSERT INTO `users` VALUES ('13', '加绒加厚蕾丝打底衫女长袖', '59.00', '2015-10-11 09:51:51.000000', '31', '14');
INSERT INTO `users` VALUES ('14', '圆领打底衫长袖条纹t恤', '89.00', '2015-09-09 16:52:41.000000', '16', '13');
INSERT INTO `users` VALUES ('15', '正品特百惠水杯子新款茶韵紫罗兰', '71.00', '2015-06-01 08:54:03.000000', '30', '6');
INSERT INTO `users` VALUES ('16', '高档扣扣感温杯魔术杯智能水杯', '88.00', '2015-04-23 05:54:57.000000', '17', '2');
INSERT INTO `users` VALUES ('17', '拉杆箱牛津布手拉帆布旅行箱', '129.00', '2014-12-15 12:55:49.000000', '6', '1');
INSERT INTO `users` VALUES ('18', '学生硬箱万向轮密码旅行箱', '118.00', '2014-09-22 17:56:32.000000', '4', '1');
INSERT INTO `users` VALUES ('19', '真皮男包手提包商务公文包', '158.00', '2014-05-16 09:57:21.000000', '9', '2');
INSERT INTO `users` VALUES ('20', '单肩包女士包包', '49.00', '2013-12-05 07:58:04.000000', '6', '1');
