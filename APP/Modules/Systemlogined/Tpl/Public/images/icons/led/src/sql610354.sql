/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50553
Source Host           : localhost:3306
Source Database       : sql610354

Target Server Type    : MYSQL
Target Server Version : 50553
File Encoding         : 65001

Date: 2019-04-04 09:56:45
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for ds_announce
-- ----------------------------
DROP TABLE IF EXISTS `ds_announce`;
CREATE TABLE `ds_announce` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` char(60) NOT NULL DEFAULT '' COMMENT '公告标题',
  `content` text NOT NULL COMMENT '公告内容',
  `operator` varchar(45) NOT NULL DEFAULT '' COMMENT '发布人',
  `addtime` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '添加时间',
  `edittime` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '修改时间',
  `viewer` varchar(10) NOT NULL DEFAULT 'all' COMMENT '查看权限 all:所有人  member:会员  center:报单中心 ',
  `tid` int(10) unsigned NOT NULL COMMENT '公告类别ID',
  PRIMARY KEY (`id`),
  KEY `tid` (`tid`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COMMENT='公告信息表';

-- ----------------------------
-- Records of ds_announce
-- ----------------------------
INSERT INTO `ds_announce` VALUES ('1', '活动买币奖励', '<p>\r\n	活动买币奖励：购买10个,奖励矿池300+两台微矿机,系统自动到账！\r\n</p>\r\n<p>\r\n	&nbsp;<br />\r\n购买50个币,奖励矿池1000+两台小矿机,系统自动到账！\r\n</p>\r\n<p>\r\n	<br />\r\n购买150个币,奖励矿池2000+两台中矿机,系统自动到账！\r\n</p>\r\n<p>\r\n	<br />\r\n购买300个币,奖励矿池4000+两台大矿机,系统自动到账！\r\n</p>\r\n<p>\r\n	<br />\r\n购买1000个币,奖励矿池8000+超矿机一台,系统自动到账！\r\n</p>', 'admin', '1553794396', '1553794701', 'all', '3');
INSERT INTO `ds_announce` VALUES ('2', '推广奖励制度', '<p>\r\n	<span>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;推广奖励制度</span> \r\n</p>\r\n<p>\r\n	一级矿工：直推10人,团队30人,奖励矿池500+100钱包币+小矿机台,系统自动奖励。\r\n</p>\r\n<br />\r\n<span>二级矿工：直推30人,团队200人,奖励矿池1000+200钱包币+中矿机一台,系统自动奖励</span><br />\r\n<br />\r\n<span>三级矿工：直推50人,团队500人,奖励矿池2000+300钱包币+大矿机一台,系统自动奖励</span><br />\r\n<br />\r\n<span>四级矿工：直推100人,团队1500,奖励矿池3000+500钱包币+大矿机一台,系统自动奖励</span><br />\r\n<br />\r\n<p>\r\n	五级矿工：直推200人.团队5000人,奖励矿池5000+1000钱包币+超矿机一台,系统自动奖励\r\n</p>\r\n<p>\r\n	<br />\r\n</p>\r\n<p>\r\n	<br />\r\n</p>\r\n<p>\r\n	<br />\r\n</p>', 'admin', '1553794574', '1554231932', 'all', '3');
INSERT INTO `ds_announce` VALUES ('3', '官方微信群', '+客服微信：a1171631409 备注进群', 'admin', '1553794902', '1553794902', 'all', '3');
INSERT INTO `ds_announce` VALUES ('4', '关于交易买卖', '如发现对方支付宝名字与身份证名字不一支,请勿付款！免费买币免费买币！必须身份证号码信息+个人收款二维码信息一致！如不一致,可不用付款,免费买币买币！如卖家身份信息提示有风险请勿付款,请勿付款！', 'admin', '1553888337', '1553888337', 'all', '3');

-- ----------------------------
-- Table structure for ds_announcetype
-- ----------------------------
DROP TABLE IF EXISTS `ds_announcetype`;
CREATE TABLE `ds_announcetype` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '类别ID',
  `name` varchar(45) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COMMENT='公告类别';

-- ----------------------------
-- Records of ds_announcetype
-- ----------------------------
INSERT INTO `ds_announcetype` VALUES ('3', '公司公告');
INSERT INTO `ds_announcetype` VALUES ('7', '帮助中心');
INSERT INTO `ds_announcetype` VALUES ('10', '通知');
INSERT INTO `ds_announcetype` VALUES ('11', '用户调查');

-- ----------------------------
-- Table structure for ds_auth_group
-- ----------------------------
DROP TABLE IF EXISTS `ds_auth_group`;
CREATE TABLE `ds_auth_group` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `title` char(100) NOT NULL DEFAULT '',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `rules` varchar(500) NOT NULL DEFAULT '',
  `description` char(50) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of ds_auth_group
-- ----------------------------
INSERT INTO `ds_auth_group` VALUES ('7', '首页管理员', '1', '13,14,15,16,17,18,19,20,21,22,23,24,25,26,9', '能够管理首页推荐位');
INSERT INTO `ds_auth_group` VALUES ('4', '超级管理员', '1', '13,14,15,16,17,18,19,20,21,22,23,24,25,26,89,27,28,29,30,31,32,80,81,33,34,35,36,37,38,39,41,42,43,44,45,46,47,48,49,50,51,52,82,83,84,85,87,88,9,10,11,12,86,62,63,64,65,66,67,68,69,70,71,72,73,74,75,76,77,78,7913,14,15,16,17,18,19,20,21,22,23,24,25,26,89,27,28,29,30,31,32,80,81,33,34,35,36,37,38,39,41,42,43,44,45,46,47,48,49,50,51,52,82,83,84,85,87,88,9,10,11,12,86,62,63,64,65,66,67,68,69,70,71,72,73,74,75,76,77,78,79', '拥有所有权限的管理员');
INSERT INTO `ds_auth_group` VALUES ('8', '广告管理员', '1', '27,28,29,30,31,32,9', '管理全部广告');
INSERT INTO `ds_auth_group` VALUES ('9', '分类管理员', '1', '33,34,35,36,37,38,39,40,41,42,43,44,45,46,47,48,49,50,51,52,9', '分类管理员');
INSERT INTO `ds_auth_group` VALUES ('10', '优惠券管理', '1', '53,54,55,56,57,58,59,60', '优惠券管理');

-- ----------------------------
-- Table structure for ds_auth_group_access
-- ----------------------------
DROP TABLE IF EXISTS `ds_auth_group_access`;
CREATE TABLE `ds_auth_group_access` (
  `uid` mediumint(8) unsigned NOT NULL,
  `group_id` mediumint(8) unsigned NOT NULL,
  UNIQUE KEY `uid_group_id` (`uid`,`group_id`),
  KEY `uid` (`uid`),
  KEY `group_id` (`group_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=FIXED;

-- ----------------------------
-- Records of ds_auth_group_access
-- ----------------------------
INSERT INTO `ds_auth_group_access` VALUES ('2651', '4');

-- ----------------------------
-- Table structure for ds_auth_rule
-- ----------------------------
DROP TABLE IF EXISTS `ds_auth_rule`;
CREATE TABLE `ds_auth_rule` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `name` char(80) NOT NULL DEFAULT '',
  `title` char(20) NOT NULL DEFAULT '',
  `type` tinyint(1) NOT NULL DEFAULT '1',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `condition` char(100) NOT NULL DEFAULT '',
  `mid` tinyint(3) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=FIXED;

-- ----------------------------
-- Records of ds_auth_rule
-- ----------------------------

-- ----------------------------
-- Table structure for ds_banner
-- ----------------------------
DROP TABLE IF EXISTS `ds_banner`;
CREATE TABLE `ds_banner` (
  `id` int(10) NOT NULL,
  `path` varchar(100) NOT NULL,
  `sort` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of ds_banner
-- ----------------------------

-- ----------------------------
-- Table structure for ds_date
-- ----------------------------
DROP TABLE IF EXISTS `ds_date`;
CREATE TABLE `ds_date` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `date` varchar(255) DEFAULT NULL,
  `price` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=43380 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ds_date
-- ----------------------------
INSERT INTO `ds_date` VALUES ('43379', '1554342845', '1');

-- ----------------------------
-- Table structure for ds_date_today
-- ----------------------------
DROP TABLE IF EXISTS `ds_date_today`;
CREATE TABLE `ds_date_today` (
  `id` int(8) unsigned NOT NULL AUTO_INCREMENT,
  `price` decimal(10,2) DEFAULT NULL,
  `last_time` varchar(50) DEFAULT NULL COMMENT '上次更新时间',
  `date` varchar(50) DEFAULT NULL COMMENT '当前更新时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=26 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of ds_date_today
-- ----------------------------
INSERT INTO `ds_date_today` VALUES ('1', '0.30', '1553316095', '1553316210');
INSERT INTO `ds_date_today` VALUES ('2', '0.50', null, '1553323917');
INSERT INTO `ds_date_today` VALUES ('3', '1.50', null, '1553325684');
INSERT INTO `ds_date_today` VALUES ('4', '1.80', null, '1553350545');
INSERT INTO `ds_date_today` VALUES ('5', '0.31', null, '1553351934');
INSERT INTO `ds_date_today` VALUES ('6', '0.35', null, '1553423578');
INSERT INTO `ds_date_today` VALUES ('7', '0.50', null, '1553527414');
INSERT INTO `ds_date_today` VALUES ('8', '0.58', null, '1553573699');
INSERT INTO `ds_date_today` VALUES ('9', '0.59', null, '1553636590');
INSERT INTO `ds_date_today` VALUES ('10', '0.60', null, '1553729030');
INSERT INTO `ds_date_today` VALUES ('11', '0.61', null, '1553796092');
INSERT INTO `ds_date_today` VALUES ('12', '0.62', null, '1553894780');
INSERT INTO `ds_date_today` VALUES ('13', '0.63', null, '1553962756');
INSERT INTO `ds_date_today` VALUES ('14', '0.65', null, '1553962862');
INSERT INTO `ds_date_today` VALUES ('15', '0.63', null, '1553962917');
INSERT INTO `ds_date_today` VALUES ('16', '0.63', null, '1553964261');
INSERT INTO `ds_date_today` VALUES ('17', '0.63', null, '1553964332');
INSERT INTO `ds_date_today` VALUES ('18', '0.64', null, '1554006387');
INSERT INTO `ds_date_today` VALUES ('19', '0.64', null, '1554006407');
INSERT INTO `ds_date_today` VALUES ('20', '0.64', null, '1554006439');
INSERT INTO `ds_date_today` VALUES ('21', '0.63', null, '1554006486');
INSERT INTO `ds_date_today` VALUES ('22', '0.64', null, '1554049830');
INSERT INTO `ds_date_today` VALUES ('23', '0.65', null, '1554133532');
INSERT INTO `ds_date_today` VALUES ('24', '0.66', null, '1554231626');
INSERT INTO `ds_date_today` VALUES ('25', '0.67', null, '1554317304');

-- ----------------------------
-- Table structure for ds_dongjiedetail
-- ----------------------------
DROP TABLE IF EXISTS `ds_dongjiedetail`;
CREATE TABLE `ds_dongjiedetail` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `member` varchar(255) DEFAULT '' COMMENT '会员编号',
  `adds` decimal(11,2) DEFAULT '0.00' COMMENT '添加',
  `reduce` decimal(11,2) DEFAULT '0.00' COMMENT '减少',
  `balance` decimal(11,2) DEFAULT '0.00' COMMENT '余额',
  `addtime` int(11) DEFAULT '0' COMMENT '添加时间',
  `desc` varchar(255) DEFAULT '' COMMENT '说明',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9665 DEFAULT CHARSET=utf8 COMMENT='购物券明细';

-- ----------------------------
-- Records of ds_dongjiedetail
-- ----------------------------

-- ----------------------------
-- Table structure for ds_hdjl
-- ----------------------------
DROP TABLE IF EXISTS `ds_hdjl`;
CREATE TABLE `ds_hdjl` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT '' COMMENT '会员编号',
  `num` decimal(12,2) unsigned DEFAULT '0.00' COMMENT '添加',
  `zszc` decimal(12,2) unsigned DEFAULT '0.00' COMMENT '减少',
  `kj_id` int(10) DEFAULT '0',
  `kj_num` varchar(255) DEFAULT '0',
  `addtime` int(10) DEFAULT '0' COMMENT '操作时间',
  `endtime` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `member` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8 COMMENT='欠钱明细';

-- ----------------------------
-- Records of ds_hdjl
-- ----------------------------
INSERT INTO `ds_hdjl` VALUES ('11', 'BEG买币活动奖励1', '10.00', '200.00', '1', '2', '1553535592', '1554485995');
INSERT INTO `ds_hdjl` VALUES ('12', 'BEG买币活动奖励2', '50.00', '1000.00', '2', '2', '1553535721', '1554486124');
INSERT INTO `ds_hdjl` VALUES ('13', 'BEG买币活动奖励3', '150.00', '2000.00', '4', '2', '1553535878', '1554486281');
INSERT INTO `ds_hdjl` VALUES ('14', 'BEG买币活动奖励4', '300.00', '4000.00', '5', '2', '1553536025', '1554486427');
INSERT INTO `ds_hdjl` VALUES ('15', 'BEG买币活动奖励5', '1000.00', '8000.00', '6', '1', '1553536187', '1554486590');

-- ----------------------------
-- Table structure for ds_jinbidetail
-- ----------------------------
DROP TABLE IF EXISTS `ds_jinbidetail`;
CREATE TABLE `ds_jinbidetail` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `type` tinyint(4) NOT NULL DEFAULT '0',
  `member` varchar(255) DEFAULT '' COMMENT '会员编号',
  `adds` decimal(15,5) unsigned DEFAULT '0.00000' COMMENT '添加',
  `reduce` decimal(15,5) unsigned DEFAULT '0.00000' COMMENT '减少',
  `balance` decimal(15,5) unsigned DEFAULT '0.00000' COMMENT '余额',
  `addtime` int(10) DEFAULT '0' COMMENT '操作时间',
  `desc` varchar(255) DEFAULT '' COMMENT '说明',
  PRIMARY KEY (`id`),
  KEY `type` (`type`),
  KEY `member` (`member`),
  KEY `addtime` (`addtime`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='金币明细';

-- ----------------------------
-- Records of ds_jinbidetail
-- ----------------------------

-- ----------------------------
-- Table structure for ds_jyzx
-- ----------------------------
DROP TABLE IF EXISTS `ds_jyzx`;
CREATE TABLE `ds_jyzx` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `mr_id` varchar(255) DEFAULT NULL,
  `mc_id` varchar(255) DEFAULT NULL,
  `qian` decimal(10,0) DEFAULT NULL,
  `cbt` varchar(15) DEFAULT NULL,
  `mr_user` varchar(255) DEFAULT NULL,
  `mc_user` varchar(255) DEFAULT NULL,
  `date` int(10) DEFAULT NULL,
  `zt` int(8) NOT NULL DEFAULT '0',
  `pic2` varchar(255) DEFAULT NULL,
  `mr_level` varchar(60) DEFAULT NULL,
  `mc_level` varchar(60) DEFAULT NULL,
  `jydate` datetime DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `danjia` varchar(10) DEFAULT NULL,
  `datatype` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=43336 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ds_jyzx
-- ----------------------------

-- ----------------------------
-- Table structure for ds_keshoudetail
-- ----------------------------
DROP TABLE IF EXISTS `ds_keshoudetail`;
CREATE TABLE `ds_keshoudetail` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `member` varchar(255) DEFAULT '' COMMENT '会员编号',
  `adds` decimal(11,2) DEFAULT '0.00' COMMENT '添加',
  `reduce` decimal(11,2) DEFAULT '0.00' COMMENT '减少',
  `balance` decimal(11,2) DEFAULT '0.00' COMMENT '余额',
  `addtime` int(11) DEFAULT '0' COMMENT '添加时间',
  `type` tinyint(4) DEFAULT '0',
  `desc` varchar(255) DEFAULT '' COMMENT '说明',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=71357 DEFAULT CHARSET=utf8 COMMENT='购物券明细';

-- ----------------------------
-- Records of ds_keshoudetail
-- ----------------------------

-- ----------------------------
-- Table structure for ds_log
-- ----------------------------
DROP TABLE IF EXISTS `ds_log`;
CREATE TABLE `ds_log` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `logtime` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '操作时间',
  `logaccount` varchar(45) NOT NULL DEFAULT '' COMMENT '操作对应的账号',
  `logip` varchar(100) NOT NULL DEFAULT '' COMMENT '操作者IP',
  `logdesc` varchar(200) NOT NULL DEFAULT '' COMMENT '操作描述',
  `logtype` varchar(10) NOT NULL DEFAULT '' COMMENT '日志类型: member:会员日志 admin:管理员日志',
  `logiplocal` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `logtype` (`logtype`)
) ENGINE=InnoDB AUTO_INCREMENT=48659 DEFAULT CHARSET=utf8 COMMENT='系统操作日志';

-- ----------------------------
-- Records of ds_log
-- ----------------------------

-- ----------------------------
-- Table structure for ds_member
-- ----------------------------
DROP TABLE IF EXISTS `ds_member`;
CREATE TABLE `ds_member` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `level` int(10) unsigned NOT NULL DEFAULT '0',
  `username` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL COMMENT '会员编号',
  `password` varchar(32) DEFAULT NULL COMMENT '一级密码',
  `password2` varchar(32) DEFAULT NULL COMMENT '二级密码',
  `regdate` int(10) DEFAULT NULL COMMENT '注册时间',
  `online_time` int(11) NOT NULL,
  `kjnum` int(10) DEFAULT '0',
  `tdnum` int(10) NOT NULL DEFAULT '0',
  `ztnum` int(10) DEFAULT '0',
  `parent` varchar(255) DEFAULT NULL COMMENT '推荐人',
  `parent_id` int(11) unsigned NOT NULL,
  `teamgonglv` decimal(11,2) unsigned NOT NULL DEFAULT '0.00',
  `mygonglv` decimal(11,2) unsigned NOT NULL DEFAULT '0.00',
  `qjinbi` decimal(15,8) unsigned NOT NULL DEFAULT '0.00000000',
  `ksed` decimal(15,8) DEFAULT '0.00000000' COMMENT '可售额度',
  `ksye` decimal(15,8) DEFAULT '0.00000000',
  `kczc` decimal(15,8) DEFAULT '0.00000000',
  `jinbi` decimal(15,8) unsigned DEFAULT '0.00000000' COMMENT '金币数量',
  `truename` varchar(255) DEFAULT NULL COMMENT '真实姓名',
  `mobile` varchar(20) DEFAULT NULL COMMENT '手机',
  `jfcs` int(4) DEFAULT '0' COMMENT '解封次数',
  `lock` tinyint(4) unsigned zerofill DEFAULT NULL COMMENT '解封次数',
  `logintime` int(10) DEFAULT '0' COMMENT '本次登录时间',
  `prelogintime` int(10) DEFAULT '0' COMMENT '上次登录时间',
  `status` int(4) DEFAULT '0',
  `logincount` int(10) DEFAULT '0' COMMENT '登录总次数',
  `parentpath` longtext COMMENT '推荐遗传码',
  `image` varchar(300) DEFAULT NULL,
  `shenfen` varchar(255) DEFAULT NULL,
  `ip` varchar(100) DEFAULT NULL COMMENT 'ip',
  PRIMARY KEY (`id`),
  KEY `username` (`username`),
  KEY `parent` (`parent`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COMMENT='会员';

-- ----------------------------
-- Records of ds_member
-- ----------------------------
INSERT INTO `ds_member` VALUES ('1', '5', '13510619876', '17dfdc74483be1c44713340eec35840c', '1ae5d757b0c95a25d6848c00da20ef72', '1553573591', '1554338250', '2', '916', '169', '15555556666', '1776', '1.00', '200.00', '0.00000000', '1514.00000000', '1189.80342719', '127128.57157281', '0.09690728', '宋殿辉', '13510619876', '0', '0000', '1554338136', '1554285154', '1', '78', '1|1760|1764|1776|', '/Public/Uploads/shoukuanma//1553573689721.jpeg', '230523199008314414', null);
INSERT INTO `ds_member` VALUES ('2', '5', '18070610808', 'e6e352ef3a34b2dd48aafaaa52e5e0af', 'e6e352ef3a34b2dd48aafaaa52e5e0af', '1553575162', '1554340527', '0', '13271', '16', '15555556666', '1776', '63.00', '0.00', '0.00000000', '1432.00000000', '333.24808519', '108256.75191481', '0.76080380', '赖禹全', '18070610808', '0', '0000', '1554340463', '1554338078', '1', '61', '1|1760|1764|1776|', '/Public/Uploads/shoukuanma//1553575237749.jpg', '452421197504080114', null);
INSERT INTO `ds_member` VALUES ('3', '0', '18567000105', 'f2318917d4ee70883c0e06f4cc8ea58c', 'bc31eebb9301d69810c8d028b433f511', '1553575188', '1554287761', '0', '13110', '1', '15555556666', '1776', '2979.00', '0.00', '0.00000000', '890.00000000', '45.37192350', '38966.62807650', '3.87952955', '连海苇', '18567000105', '0', null, '1554287747', '1554281634', '2', '27', '1|1760|1764|1776|', '/Public/Uploads/shoukuanma/20190403/1554282427489.jpg', '410222200010101537', null);
INSERT INTO `ds_member` VALUES ('4', '5', '13821738600', '320735f560d89e8a15919439d9cac40f', '6cc2fd9c3745cb47a2b02678c97b7757', '1553575276', '1554334386', '0', '38207', '52', '15555556666', '1776', '923.00', '0.00', '0.00000000', '634.00000000', '572.51171085', '48351.48828915', '0.10538254', '丁长年', '13821738600', '0', null, '1554334339', '1554333787', '1', '178', '1|1760|1764|1776|', '/Public/Uploads/shoukuanma//1553576075688.jpg', '120222197901231411', null);
INSERT INTO `ds_member` VALUES ('5', '0', '18607072312', '406dd313e5b3b6599b7af6f6f99c3221', '406dd313e5b3b6599b7af6f6f99c3221', '1553575389', '1554297411', '0', '34', '7', '15555556666', '1776', '0.00', '0.00', '0.00000000', '40.00000000', '14.83947032', '2991.16052968', '3.60847022', '古艳萍', '18607072312', '0', null, '1554297381', '1554249679', '1', '26', '1|1760|1764|1776|', '/Public/Uploads/shoukuanma//1553575744153.jpg', '360733199503096445', null);
INSERT INTO `ds_member` VALUES ('6', '0', '13737459178', 'e6e352ef3a34b2dd48aafaaa52e5e0af', 'e6e352ef3a34b2dd48aafaaa52e5e0af', '1553575569', '1554340325', '0', '219', '3', '18070610808', '1780', '0.00', '0.00', '0.00000000', '460.00000000', '103.45777097', '20751.54222903', '3.34437288', '陈亮凤', '13737459178', '0', null, '1554340283', '1554249694', '1', '22', '1|1760|1764|1776|1780|', '/Public/Uploads/shoukuanma//1553575686802.jpg', '450481198605220488', null);
INSERT INTO `ds_member` VALUES ('7', '5', '13906704497', '2ad4ea2752a832345c35edbd267018fb', 'b34fe99e85d421b5b87f0cac969f1e49', '1553576235', '1554331060', '0', '442', '37', '15157012334', '1783', '1.00', '0.00', '0.00000000', '2050.00000000', '276.36021319', '69704.63978681', '0.18108719', '吴玉', '13906704497', '0', null, '1554330733', '1554279511', '1', '71', '1|1760|1764|1776|1783|', '/Public/Uploads/shoukuanma//1553576341470.jpg', '330823197309033748', null);
INSERT INTO `ds_member` VALUES ('8', '0', '15803780217', 'daf6cea48f3dee24cc1d10313b43b621', 'bc31eebb9301d69810c8d028b433f511', '1553576253', '1554270584', '0', '13111', '2', '18567000105', '1782', '2979.00', '0.00', '0.00000000', '150.00000000', '88.95507737', '38503.04492263', '0.09449604', '连国生', '15803780217', '0', null, '1554270339', '1554176996', '1', '19', '1|1760|1764|1776|1782|', '/Public/Uploads/shoukuanma//1553576720997.jpg', '410222197209281518', null);
INSERT INTO `ds_member` VALUES ('9', '0', '15713784528', 'daf6cea48f3dee24cc1d10313b43b621', 'bc31eebb9301d69810c8d028b433f511', '1553576339', '1554270821', '0', '13108', '1', '15803780217', '1788', '2979.00', '0.00', '0.00000000', '1035.00000000', '121.60249636', '47600.39750364', '7.88417681', '韦建霞', '15713784528', '0', null, '1554270716', '1554174250', '1', '16', '1|1760|1764|1776|1782|1788|', '/Public/Uploads/shoukuanma//1553576853390.jpg', '410222197206111521', null);
INSERT INTO `ds_member` VALUES ('10', '6', '18300685316', 'daf6cea48f3dee24cc1d10313b43b621', 'bc31eebb9301d69810c8d028b433f511', '1553576412', '1554300716', '3', '13324', '217', '15713784528', '1789', '2279.00', '700.00', '0.00000000', '1062.00000000', '95.35328099', '102710.64671901', '0.28726178', '连亚鹏', '18300685316', '0', null, '1554300574', '1554298730', '1', '101', '1|1760|1764|1776|1782|1788|1789|', '/Public/Uploads/shoukuanma//1553576989710.jpg', '410222199809091514', null);
INSERT INTO `ds_member` VALUES ('11', '0', '15177053814', 'e10adc3949ba59abbe56e057f20f883e', 'e10adc3949ba59abbe56e057f20f883e', '1553576588', '1554342855', '0', '0', '0', '18607072312', '1785', '0.00', '0.00', '0.00000000', '0.00000000', '6.00000000', '2994.00000000', '0.00000000', '测试', '15177053814', '0', null, '1554342843', '1553576688', '1', '3', '1|1760|1764|1776|1785|', '/Public/Uploads/shoukuanma//1553578329888.jpg', 'admin', null);

-- ----------------------------
-- Table structure for ds_members_sign
-- ----------------------------
DROP TABLE IF EXISTS `ds_members_sign`;
CREATE TABLE `ds_members_sign` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) unsigned NOT NULL COMMENT '用户id',
  `username` varchar(255) DEFAULT NULL,
  `jiangli` decimal(15,8) unsigned DEFAULT '0.00000000' COMMENT '是否签到过',
  `stime` int(10) unsigned DEFAULT '0' COMMENT '签到的时间',
  `desc` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `index_uid` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=53199 DEFAULT CHARSET=utf8 COMMENT='签到分享表';

-- ----------------------------
-- Records of ds_members_sign
-- ----------------------------

-- ----------------------------
-- Table structure for ds_member_group
-- ----------------------------
DROP TABLE IF EXISTS `ds_member_group`;
CREATE TABLE `ds_member_group` (
  `groupid` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `level` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `name` char(15) NOT NULL,
  `tjjnum` int(10) unsigned NOT NULL DEFAULT '0',
  `teamnum` int(10) unsigned NOT NULL DEFAULT '0',
  `teamsuanli` decimal(11,2) DEFAULT NULL,
  `mysuanli` decimal(11,2) DEFAULT NULL,
  `shouxu` decimal(11,2) unsigned NOT NULL DEFAULT '0.00',
  `ksyedh` int(10) DEFAULT '0' COMMENT '可售余额兑换',
  `ldj` int(10) DEFAULT '0',
  `dhkc` int(10) DEFAULT '0' COMMENT '兑换矿池',
  `yjbl` decimal(11,2) DEFAULT '0.00',
  `sfbl` decimal(11,5) DEFAULT NULL COMMENT '释放比例',
  `jfnum` char(11) DEFAULT '0',
  `jfmoney` decimal(11,0) DEFAULT NULL,
  `status` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `addtime` int(11) unsigned NOT NULL DEFAULT '0',
  `item1` varchar(50) DEFAULT NULL COMMENT '买入时间',
  `item2` int(8) DEFAULT NULL COMMENT '每天出售单数',
  `item3` decimal(10,2) DEFAULT NULL COMMENT '修改资料扣费',
  `item4` decimal(10,2) DEFAULT NULL COMMENT '升级将钱包',
  `item5` decimal(10,2) DEFAULT NULL COMMENT '升级将资产',
  `item6` varchar(50) DEFAULT NULL COMMENT '升级奖励 矿机编号',
  `item7` varchar(50) DEFAULT NULL COMMENT '奖励数量',
  PRIMARY KEY (`groupid`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ds_member_group
-- ----------------------------
INSERT INTO `ds_member_group` VALUES ('1', '0', '普通会员', '10', '30', '0.00', '80.00', '0.30', '10', '5', '5', '1.70', '0.00200', '0', '0', '1', '1487262445', '00:00-24:00', '1', '50.00', '100.00', '500.00', '2', '1');
INSERT INTO `ds_member_group` VALUES ('2', '1', '一级矿工', '30', '200', '80.00', '80.00', '0.30', '10', '6', '5', '1.70', '0.00200', '2', '50', '1', '1487262481', '00:00-24:00', '1', '50.00', '200.00', '1000.00', '3', '1');
INSERT INTO `ds_member_group` VALUES ('3', '2', '二级矿工', '50', '500', '500.00', '80.00', '0.30', '10', '6', '5', '1.70', '0.00200', '3', '100', '1', '1487262481', '00:00-24:00', '5', '50.00', '300.00', '2000.00', '4', '1');
INSERT INTO `ds_member_group` VALUES ('4', '3', '三级矿工', '100', '1500', '3000.00', '100.00', '0.30', '10', '6', '5', '1.70', '0.00200', '1', '150', '1', '1487262481', '00:00-24:00', '1', '50.00', '500.00', '3000.00', '4', '1');
INSERT INTO `ds_member_group` VALUES ('5', '4', '四级矿工', '200', '5000', '5000.00', '200.00', '0.30', '10', '6', '5', '1.70', '0.00200', '1', '200', '1', '1487262481', '00:00-24:00', '1', '100.00', '500.00', '3000.00', '5', '1');
INSERT INTO `ds_member_group` VALUES ('6', '5', '五级矿工', '999999999', '999999999', null, null, '0.30', '0', '6', '5', '1.17', '0.00200', '1', null, '1', '1487262481', '00:00-24:00', '2', '200.00', '1000.00', '5000.00', '5', '1');
INSERT INTO `ds_member_group` VALUES ('7', '6', '六级矿工', '999999999', '999999999', null, null, '0.30', '0', '5', '0', '1.17', '0.00200', '5', null, '1', '1487262481', '00:00-24:00', '2', '0.00', '0.00', '0.00', '9', '1');

-- ----------------------------
-- Table structure for ds_message
-- ----------------------------
DROP TABLE IF EXISTS `ds_message`;
CREATE TABLE `ds_message` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `from` varchar(45) NOT NULL DEFAULT '' COMMENT '发件人',
  `to` varchar(45) NOT NULL DEFAULT '' COMMENT '收件人',
  `subject` varchar(200) NOT NULL DEFAULT '' COMMENT '主题',
  `content` text NOT NULL COMMENT '内容',
  `reply` text NOT NULL COMMENT '回复',
  `hasview` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '是否已读 0:未读 1:已读',
  `sendtime` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '发送时间',
  `writetime` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '回复时间',
  `type` varchar(255) DEFAULT NULL COMMENT '留言类型',
  `status` varchar(255) DEFAULT NULL COMMENT '状态',
  PRIMARY KEY (`id`),
  KEY `subject` (`subject`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='站内信息表';

-- ----------------------------
-- Records of ds_message
-- ----------------------------

-- ----------------------------
-- Table structure for ds_node
-- ----------------------------
DROP TABLE IF EXISTS `ds_node`;
CREATE TABLE `ds_node` (
  `id` smallint(6) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL DEFAULT '',
  `title` varchar(50) DEFAULT NULL,
  `status` tinyint(1) DEFAULT '0',
  `remark` varchar(255) DEFAULT NULL,
  `sort` smallint(6) unsigned DEFAULT NULL,
  `pid` smallint(6) unsigned NOT NULL,
  `level` tinyint(1) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `level` (`level`),
  KEY `name` (`name`),
  KEY `pid` (`pid`),
  KEY `status` (`status`)
) ENGINE=InnoDB AUTO_INCREMENT=53 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ds_node
-- ----------------------------
INSERT INTO `ds_node` VALUES ('1', 'systemlogined', '后台应用', '1', '', '1', '0', '1');
INSERT INTO `ds_node` VALUES ('6', 'Rbac', 'Rbac权限控制', '1', '', '6', '1', '2');
INSERT INTO `ds_node` VALUES ('7', 'Index', '后台首页', '1', '', '1', '1', '2');
INSERT INTO `ds_node` VALUES ('10', 'index', '管理员列表', '1', '', '1', '6', '3');
INSERT INTO `ds_node` VALUES ('11', 'role', '角色列表', '1', '', '1', '6', '3');
INSERT INTO `ds_node` VALUES ('12', 'node', '节点列表', '1', '', '1', '6', '3');
INSERT INTO `ds_node` VALUES ('16', 'index', '后台首页', '1', '', '1', '7', '3');
INSERT INTO `ds_node` VALUES ('17', 'Member', '会员管理', '1', '', '2', '1', '2');
INSERT INTO `ds_node` VALUES ('18', 'check', '会员列表', '1', '', '1', '17', '3');
INSERT INTO `ds_node` VALUES ('19', 'award', '赠送矿机', '1', '', '1', '17', '3');
INSERT INTO `ds_node` VALUES ('20', 'shu_list', '团队树形图', '1', '', '1', '17', '3');
INSERT INTO `ds_node` VALUES ('22', 'Jinbidetail', '资金管理', '1', '', '4', '1', '2');
INSERT INTO `ds_node` VALUES ('23', 'csdd', '出售订单', '1', '', '1', '22', '3');
INSERT INTO `ds_node` VALUES ('24', 'qiugou', '求购订单', '1', '', '1', '22', '3');
INSERT INTO `ds_node` VALUES ('25', 'jiaoyi', '交易中的订单', '1', '', '1', '22', '3');
INSERT INTO `ds_node` VALUES ('26', 'shop', '矿机管理', '1', '', '3', '1', '2');
INSERT INTO `ds_node` VALUES ('27', 'type_list', '分类列表', '1', '', '1', '26', '3');
INSERT INTO `ds_node` VALUES ('28', 'Info', '信息交流', '1', '', '5', '1', '2');
INSERT INTO `ds_node` VALUES ('29', 'announce', '公告管理', '1', '', '1', '28', '3');
INSERT INTO `ds_node` VALUES ('30', 'annType', '公告类别', '1', '', '1', '28', '3');
INSERT INTO `ds_node` VALUES ('31', 'msgReceive', '收件箱', '1', '', '1', '28', '3');
INSERT INTO `ds_node` VALUES ('32', 'msgSend', '发件箱', '1', '', '1', '28', '3');
INSERT INTO `ds_node` VALUES ('33', 'System', '系统设置', '1', '', '7', '1', '2');
INSERT INTO `ds_node` VALUES ('34', 'backUp', '数据备份', '1', '', '1', '33', '3');
INSERT INTO `ds_node` VALUES ('35', 'customSetting', '自定义配置', '1', '', '1', '33', '3');
INSERT INTO `ds_node` VALUES ('36', 'jywc', '交易完成订单', '1', '', '1', '22', '3');
INSERT INTO `ds_node` VALUES ('37', 'member_group', '会员等级', '1', '', '1', '17', '3');
INSERT INTO `ds_node` VALUES ('38', 'lists', '矿机列表', '1', '', '1', '26', '3');
INSERT INTO `ds_node` VALUES ('39', 'orderlist', '已购矿机', '1', '', '1', '26', '3');
INSERT INTO `ds_node` VALUES ('40', 'report_order', '投诉中的订单', '1', '', '1', '22', '3');
INSERT INTO `ds_node` VALUES ('41', 'zichandetail', '矿池资产明细', '1', '', '1', '22', '3');
INSERT INTO `ds_node` VALUES ('42', 'qianbaodetail', '矿池钱包明细', '1', '', '1', '22', '3');
INSERT INTO `ds_node` VALUES ('43', 'dongjiedetail', '交易冻结明细', '1', '', '1', '22', '3');
INSERT INTO `ds_node` VALUES ('44', 'ksyedetail', '可售余额明细', '1', '', '1', '22', '3');
INSERT INTO `ds_node` VALUES ('47', 'awardlist', '赠送矿机记录', '1', null, '1', '17', '3');
INSERT INTO `ds_node` VALUES ('48', 'qianbaolist', '赠送矿池钱包记录', '1', null, '1', '17', '3');
INSERT INTO `ds_node` VALUES ('49', 'zichanlist', '赠送矿池资产记录', '1', null, '1', '17', '3');
INSERT INTO `ds_node` VALUES ('50', 'yuelist', '赠送可售余额记录', '1', null, '1', '17', '3');
INSERT INTO `ds_node` VALUES ('51', 'banner', '首页滚动横幅', '1', null, '1', '26', '3');
INSERT INTO `ds_node` VALUES ('52', 'updatenew', '更新公告', '1', null, '1', '28', '3');

-- ----------------------------
-- Table structure for ds_order
-- ----------------------------
DROP TABLE IF EXISTS `ds_order`;
CREATE TABLE `ds_order` (
  `id` int(255) unsigned NOT NULL AUTO_INCREMENT,
  `user` varchar(30) DEFAULT NULL,
  `user_id` int(11) unsigned NOT NULL,
  `project` varchar(30) DEFAULT NULL,
  `count` decimal(10,2) DEFAULT '0.00',
  `sumprice` decimal(10,2) NOT NULL,
  `addtime` varchar(30) DEFAULT NULL,
  `UG_getTime` int(11) unsigned NOT NULL DEFAULT '0',
  `zt` int(10) NOT NULL DEFAULT '0',
  `sid` int(11) DEFAULT NULL,
  `imagepath` text,
  `yxzq` varchar(60) DEFAULT NULL COMMENT '可运行时间小时',
  `lixi` varchar(60) NOT NULL COMMENT '功率',
  `kjsl` varchar(255) DEFAULT NULL COMMENT '收益每小时',
  `kjbh` varchar(255) DEFAULT NULL,
  `already_profit` decimal(15,8) NOT NULL COMMENT '已经收益',
  PRIMARY KEY (`id`),
  KEY `a` (`user`,`user_id`,`zt`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ds_order
-- ----------------------------
INSERT INTO `ds_order` VALUES ('10', '14444444444', '1761', '微型矿机（赠）', '0.00', '10.00', '2019-03-15 12:10:48', '1553610829', '1', '1', '/Public/Uploads/20180526/5b090cf0e10d9.png', '1440', '0.01', '0.00902778', 'I152304859', '2.47707488');
INSERT INTO `ds_order` VALUES ('11', '14444444444', '1761', '微型矿机（赠）', '0.00', '10.00', '2019-03-15 12:10:48', '1553610829', '1', '1', '/Public/Uploads/20180526/5b090cf0e10d9.png', '1440', '0.01', '0.00902778', 'I152304800', '2.47707488');
INSERT INTO `ds_order` VALUES ('12', '14444444444', '1761', '微型矿机（赠）', '0.00', '10.00', '2019-03-15 12:10:49', '1553610829', '1', '1', '/Public/Uploads/20180526/5b090cf0e10d9.png', '1440', '0.01', '0.00902778', 'I152304969', '2.47707237');
INSERT INTO `ds_order` VALUES ('13', '18888888888', '2147483647', '微型矿机（赠）', '0.00', '10.00', '2019-03-15 12:21:04', '1552623664', '1', '1', '/Public/Uploads/20180526/5b090cf0e10d9.png', '1440', '0.01', '0.00902778', 'I152366470', '0.00000000');
INSERT INTO `ds_order` VALUES ('14', '18888888888', '2147483647', '微型矿机（赠）', '0.00', '10.00', '2019-03-15 12:21:04', '1552623664', '1', '1', '/Public/Uploads/20180526/5b090cf0e10d9.png', '1440', '0.01', '0.00902778', 'I152366469', '0.00000000');
INSERT INTO `ds_order` VALUES ('15', '18888888888', '2147483647', '微型矿机（赠）', '0.00', '10.00', '2019-03-15 12:21:05', '1552623665', '1', '1', '/Public/Uploads/20180526/5b090cf0e10d9.png', '1440', '0.01', '0.00902778', 'I152366513', '0.00000000');
INSERT INTO `ds_order` VALUES ('16', '18888888888', '2147483647', '微型矿机（赠）', '0.00', '10.00', '2019-03-15 12:21:05', '1552623665', '1', '1', '/Public/Uploads/20180526/5b090cf0e10d9.png', '1440', '0.01', '0.00902778', 'I152366593', '0.00000000');
INSERT INTO `ds_order` VALUES ('17', '18888888888', '2147483647', '微型矿机（赠）', '0.00', '10.00', '2019-03-15 12:21:05', '1552623665', '1', '1', '/Public/Uploads/20180526/5b090cf0e10d9.png', '1440', '0.01', '0.00902778', 'I152366566', '0.00000000');
INSERT INTO `ds_order` VALUES ('18', '18888888888', '2147483647', '微型矿机（赠）', '0.00', '10.00', '2019-03-15 12:21:18', '1552623678', '1', '1', '/Public/Uploads/20180526/5b090cf0e10d9.png', '1440', '0.01', '0.00902778', 'I152367803', '0.00000000');
INSERT INTO `ds_order` VALUES ('19', '18888888888', '2147483647', '微型矿机（赠）', '0.00', '10.00', '2019-03-15 12:21:18', '1552623678', '1', '1', '/Public/Uploads/20180526/5b090cf0e10d9.png', '1440', '0.01', '0.00902778', 'I152367878', '0.00000000');
INSERT INTO `ds_order` VALUES ('20', '18888888888', '2147483647', '微型矿机（赠）', '0.00', '10.00', '2019-03-15 12:21:18', '1552623678', '1', '1', '/Public/Uploads/20180526/5b090cf0e10d9.png', '1440', '0.01', '0.00902778', 'I152367869', '0.00000000');
INSERT INTO `ds_order` VALUES ('21', '18888888888', '2147483647', '微型矿机（赠）', '0.00', '10.00', '2019-03-15 12:21:18', '1552623678', '1', '1', '/Public/Uploads/20180526/5b090cf0e10d9.png', '1440', '0.01', '0.00902778', 'I152367890', '0.00000000');
INSERT INTO `ds_order` VALUES ('22', '18888888888', '2147483647', '微型矿机（赠）', '0.00', '10.00', '2019-03-15 12:21:18', '1552623678', '1', '1', '/Public/Uploads/20180526/5b090cf0e10d9.png', '1440', '0.01', '0.00902778', 'I152367870', '0.00000000');

-- ----------------------------
-- Table structure for ds_product
-- ----------------------------
DROP TABLE IF EXISTS `ds_product`;
CREATE TABLE `ds_product` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `tid` int(11) NOT NULL,
  `title` char(255) NOT NULL,
  `price` decimal(10,2) NOT NULL DEFAULT '0.00',
  `stock` mediumint(9) NOT NULL DEFAULT '0',
  `gonglv` decimal(11,2) unsigned NOT NULL DEFAULT '0.00',
  `yszq` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `shouyi` decimal(15,8) unsigned NOT NULL DEFAULT '0.00000000',
  `thumb` char(255) NOT NULL DEFAULT 'pic.png',
  `content` text NOT NULL,
  `pid` int(11) NOT NULL,
  `inputtime` int(11) unsigned NOT NULL,
  `xianshou` int(11) NOT NULL,
  `xiangou` int(11) NOT NULL COMMENT '限购',
  `is_on` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ds_product
-- ----------------------------
INSERT INTO `ds_product` VALUES ('1', '3', '微型矿机（赠）', '10.00', '712101', '1.00', '720', '0.02083333', '/Public/Uploads/20190324/5c976c32457f2.jpg', '<p>\r\n	此矿机为推广赠送矿机，无法购买。\r\n</p>', '0', '1509817831', '10000', '10000', '1');
INSERT INTO `ds_product` VALUES ('2', '3', '小型矿机', '100.00', '996444', '10.00', '1440', '0.10416667', '/Public/Uploads/20190324/5c976c244aac2.jpg', '<br />', '0', '1509817897', '100000', '10000', '0');
INSERT INTO `ds_product` VALUES ('4', '3', '中型矿机', '500.00', '998505', '50.00', '1440', '0.52083333', '/Public/Uploads/20190324/5c976c147665a.jpg', '<br />', '0', '1509817983', '100000', '100000', '0');
INSERT INTO `ds_product` VALUES ('5', '3', '大型矿机', '1000.00', '999375', '100.00', '2400', '0.72916667', '/Public/Uploads/20190324/5c976c04d98b6.jpg', '<br />', '0', '1509818020', '1000000', '10000000', '0');
INSERT INTO `ds_product` VALUES ('6', '3', '超级矿机', '5000.00', '999507', '500.00', '4320', '1.85185185', '/Public/Uploads/20190324/5c976be5982a9.jpg', '<p>\r\n	<br />\r\n</p>', '0', '1526664588', '10000', '100000', '0');
INSERT INTO `ds_product` VALUES ('9', '3', '微型矿机', '10.00', '990291', '1.00', '720', '0.02083333', '/Public/Uploads/20190324/5c976bf4ecda7.jpg', '<br />', '0', '1527322722', '1000000', '1000000', '0');

-- ----------------------------
-- Table structure for ds_qjinbidetail
-- ----------------------------
DROP TABLE IF EXISTS `ds_qjinbidetail`;
CREATE TABLE `ds_qjinbidetail` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `type` tinyint(4) NOT NULL DEFAULT '0',
  `member` varchar(255) DEFAULT '' COMMENT '会员编号',
  `adds` decimal(12,2) unsigned DEFAULT '0.00' COMMENT '添加',
  `reduce` decimal(12,2) unsigned DEFAULT '0.00' COMMENT '减少',
  `balance` decimal(12,2) unsigned DEFAULT '0.00' COMMENT '余额',
  `addtime` int(10) DEFAULT '0' COMMENT '操作时间',
  `desc` varchar(255) DEFAULT '' COMMENT '说明',
  `status` tinyint(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `type` (`type`),
  KEY `member` (`member`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='欠钱明细';

-- ----------------------------
-- Records of ds_qjinbidetail
-- ----------------------------
INSERT INTO `ds_qjinbidetail` VALUES ('1', '0', '13242579157', '12.00', '0.00', '12.00', '1527386419', '交易市场下单', '1');

-- ----------------------------
-- Table structure for ds_role
-- ----------------------------
DROP TABLE IF EXISTS `ds_role`;
CREATE TABLE `ds_role` (
  `id` smallint(6) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL DEFAULT '',
  `pid` smallint(6) DEFAULT NULL,
  `status` tinyint(1) unsigned DEFAULT NULL,
  `remark` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `pid` (`pid`),
  KEY `status` (`status`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ds_role
-- ----------------------------

-- ----------------------------
-- Table structure for ds_role_user
-- ----------------------------
DROP TABLE IF EXISTS `ds_role_user`;
CREATE TABLE `ds_role_user` (
  `role_id` mediumint(9) unsigned DEFAULT NULL,
  `user_id` char(32) DEFAULT NULL,
  KEY `group_id` (`role_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ds_role_user
-- ----------------------------

-- ----------------------------
-- Table structure for ds_session
-- ----------------------------
DROP TABLE IF EXISTS `ds_session`;
CREATE TABLE `ds_session` (
  `session_id` varchar(255) NOT NULL DEFAULT '',
  `session_expire` int(11) NOT NULL,
  `session_data` blob,
  UNIQUE KEY `session_id` (`session_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ds_session
-- ----------------------------

-- ----------------------------
-- Table structure for ds_shequn
-- ----------------------------
DROP TABLE IF EXISTS `ds_shequn`;
CREATE TABLE `ds_shequn` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `member` varchar(255) NOT NULL DEFAULT '0',
  `name` varchar(255) DEFAULT NULL,
  `number` varchar(255) DEFAULT NULL,
  `weixin` varchar(255) DEFAULT NULL,
  `QQ` varchar(255) DEFAULT NULL,
  `status` int(11) DEFAULT '0',
  `image` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ds_shequn
-- ----------------------------
INSERT INTO `ds_shequn` VALUES ('1', '18888888888', '测试', '4564', '8794654', '65468764', '1', '1316');
INSERT INTO `ds_shequn` VALUES ('2', '17645798957', 'BEG~交流群', '', '416762346', '416762346', '1', '/Public/Uploads/shequn//1553665029448.png');
INSERT INTO `ds_shequn` VALUES ('3', '13510619876', 'BEG 官方6群禁广告', '', 'sdh1199044', '1199044', '1', '/Public/Uploads/shequn//1553670748425.jpg');
INSERT INTO `ds_shequn` VALUES ('4', '13593105141', 'BEG交流1群', '', '16634242564', '1197895764', '1', '/Public/Uploads/shequn//1553732754816.png');
INSERT INTO `ds_shequn` VALUES ('5', '18932593095', 'BEG官方8', '', '18932593095', '2703692580', '1', '/Public/Uploads/shequn//1553903938177.jpg');
INSERT INTO `ds_shequn` VALUES ('6', '18724710365', 'BEG', '', 'lwr1577125795', '2543261316', '0', '/Public/Uploads/shequn//1554015902566.jpg');
INSERT INTO `ds_shequn` VALUES ('7', '18777489092', 'BEG官方33群', '', '18777489092', '297045251', '1', '/Public/Uploads/shequn//1554096098558.jpg');
INSERT INTO `ds_shequn` VALUES ('8', '13419901671', 'BEG加好友群', '', '13419901671', '2436623730', '0', '/Public/Uploads/shequn//1554163336831.jpg');
INSERT INTO `ds_shequn` VALUES ('9', '18863585711', '', '', '18863585711', '2332998344', '0', '/Public/Uploads/shequn//1554192152667.jpg');
INSERT INTO `ds_shequn` VALUES ('10', '15079944684', 'BEG-交流群', '', 'qq443996690', '443996690', '0', '/Public/Uploads/shequn//1554206917548.png');
INSERT INTO `ds_shequn` VALUES ('11', '18031111053', 'BEG官方58群', '', '18031111053', '659509075', '0', '/Public/Uploads/shequn//1554276819763.jpg');

-- ----------------------------
-- Table structure for ds_sms_log
-- ----------------------------
DROP TABLE IF EXISTS `ds_sms_log`;
CREATE TABLE `ds_sms_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '表id',
  `mobile` varchar(11) DEFAULT '' COMMENT '手机号',
  `session_id` varchar(128) DEFAULT '' COMMENT 'session_id',
  `add_time` int(11) DEFAULT '0' COMMENT '发送时间',
  `code` varchar(10) DEFAULT '' COMMENT '验证码',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=146271 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ds_sms_log
-- ----------------------------

-- ----------------------------
-- Table structure for ds_tousu
-- ----------------------------
DROP TABLE IF EXISTS `ds_tousu`;
CREATE TABLE `ds_tousu` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user` varchar(255) DEFAULT NULL,
  `buser` varchar(255) DEFAULT NULL,
  `text` varchar(255) DEFAULT NULL,
  `date` varchar(255) DEFAULT NULL,
  `zt` int(10) NOT NULL DEFAULT '0',
  `pid` int(11) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=92 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ds_tousu
-- ----------------------------
INSERT INTO `ds_tousu` VALUES ('1', '15555555555', '15555556666', '不付款', '2019-03-25 04:22:14', '0', '42', null);
INSERT INTO `ds_tousu` VALUES ('2', '18245204810', '15555555555', '对方起过两小时不打钱', '2019-03-28 15:15:49', '0', '52', null);
INSERT INTO `ds_tousu` VALUES ('3', '18797825160', '15036768462', '没付款，打电话，发短信，都没有消息', '2019-03-28 15:22:42', '0', '481', null);
INSERT INTO `ds_tousu` VALUES ('4', '17634732159', '15555556666', '手机号以及姓名全部是假的，还一直不付款', '2019-03-28 15:38:44', '0', '53', null);
INSERT INTO `ds_tousu` VALUES ('5', '15167390158', '17332798720', '超过好几个小时不付款', '2019-03-28 15:39:07', '0', '536', null);
INSERT INTO `ds_tousu` VALUES ('6', '17090808536', '15555555555', '买家没付款 联系方式是假的', '2019-03-28 15:48:47', '0', '51', null);
INSERT INTO `ds_tousu` VALUES ('7', '13677774952', '15555555555', '非正常号，是刷的，而且手机号码关机', '2019-03-28 16:13:45', '0', '45', null);
INSERT INTO `ds_tousu` VALUES ('8', '13774404568', '15555556666', '超时未打款', '2019-03-28 16:32:21', '0', '49', null);
INSERT INTO `ds_tousu` VALUES ('9', '13503455126', '18697985092', '没付款，电话关机。', '2019-03-28 18:09:31', '0', '670', null);
INSERT INTO `ds_tousu` VALUES ('10', '15297603570', '18718220528', '三月二十八日买币付款成功对方超时不确认，现在币还没到账', '2019-03-29 14:03:14', '0', '2027', null);
INSERT INTO `ds_tousu` VALUES ('11', '13669883743', '18918174254', '二维码转账转不了', '2019-03-29 14:12:36', '0', '2192', null);
INSERT INTO `ds_tousu` VALUES ('12', '15058603349', '18889181907', '不付款', '2019-03-29 14:42:56', '0', '671', null);
INSERT INTO `ds_tousu` VALUES ('13', '17788613522', '13552935496', '不付款，电话也不接', '2019-03-29 14:44:28', '0', '177', null);
INSERT INTO `ds_tousu` VALUES ('14', '18528591955', '15098453230', '不付款', '2019-03-29 14:49:21', '0', '368', null);
INSERT INTO `ds_tousu` VALUES ('15', '13634041719', '13552935496', '买家不付款', '2019-03-29 14:57:59', '0', '462', null);
INSERT INTO `ds_tousu` VALUES ('16', '13737479571', '13652876775', '帮撒回', '2019-03-29 15:06:09', '0', '799', null);
INSERT INTO `ds_tousu` VALUES ('17', '13958949616', '18697985092', '对方未打款已经超时了.打电话打不通关机了，加对方支付宝也没有回复. 微信加不上. 麻烦客服处理下，谢谢！', '2019-03-29 15:47:02', '0', '674', null);
INSERT INTO `ds_tousu` VALUES ('18', '13697193306', '15273083215', '你好，客服，买家超时未付款，买家姓名:邓昭  电话号码:15273083215', '2019-03-29 15:57:15', '0', '654', null);
INSERT INTO `ds_tousu` VALUES ('19', '15777467603', '17687130250', '对方没有付款，也没有听电话，2个多小时了！', '2019-03-29 16:07:06', '0', '893', null);
INSERT INTO `ds_tousu` VALUES ('20', '18369810833', '13420250854', '打电话呼叫设限，未打款', '2019-03-29 16:17:33', '0', '1668', null);
INSERT INTO `ds_tousu` VALUES ('21', '18155572419', '15273083215', '买家超时不付款', '2019-03-29 17:19:04', '0', '655', null);
INSERT INTO `ds_tousu` VALUES ('22', '15872126205', '13552935496', '你好，买家超时不付款，姓名:周勇，电话号码：13552935496', '2019-03-29 17:34:34', '0', '464', null);
INSERT INTO `ds_tousu` VALUES ('23', '13057874112', '17687130250', '12点多已经付款，对方一直不确认，打无数个电话不接，发信息也不回，麻烦客服帮我处理一下', '2019-03-29 17:55:09', '0', '2007', null);
INSERT INTO `ds_tousu` VALUES ('24', '13634041719', '18170624901', '不付款', '2019-03-30 13:53:59', '0', '4249', null);
INSERT INTO `ds_tousu` VALUES ('25', '17604845001', '17620791969', '未付款', '2019-03-30 14:03:52', '0', '4081', null);
INSERT INTO `ds_tousu` VALUES ('26', '18306458608', '13162535140', '买家超时不付款', '2019-03-30 14:21:35', '0', '1536', null);
INSERT INTO `ds_tousu` VALUES ('27', '15079061667', '13279658539', '超时未打款', '2019-03-30 14:46:02', '0', '3867', null);
INSERT INTO `ds_tousu` VALUES ('28', '18975180737', '17607744435', '没有付款。', '2019-03-30 14:48:09', '0', '4871', null);
INSERT INTO `ds_tousu` VALUES ('29', '18107288957', '17620791969', '对方不打款', '2019-03-30 14:52:55', '0', '4082', null);
INSERT INTO `ds_tousu` VALUES ('30', '15116343505', '15383518353', '付款后，对方不确认发币。打电话关机', '2019-03-30 14:57:15', '0', '1814', null);
INSERT INTO `ds_tousu` VALUES ('31', '13677774952', '17193937599', '超时不打款，虚拟号码，打电话不接，支付宝账户不存在', '2019-03-30 15:01:33', '0', '4658', null);
INSERT INTO `ds_tousu` VALUES ('32', '15854716484', '18317537522', '一直不接电话，没法卖出，影响我卖币', '2019-03-30 15:05:32', '0', '1736', null);
INSERT INTO `ds_tousu` VALUES ('33', '15157012334', '17620791969', '对方不付款', '2019-03-30 15:14:50', '0', '4080', null);
INSERT INTO `ds_tousu` VALUES ('34', '13153696632', '13162535140', '尊敬的领导你好！买家接了电话说马上付款，到现在3个多小时了没付款，电话也不接了，请领导给撤销订单吧！谢谢！！！', '2019-03-30 15:26:32', '0', '1537', null);
INSERT INTO `ds_tousu` VALUES ('35', '15987012981', '15280072230', '买方不打款', '2019-03-30 15:29:12', '0', '5192', null);
INSERT INTO `ds_tousu` VALUES ('36', '15946463975', '13296653972', '对方买家不付款', '2019-03-30 15:34:49', '0', '2896', null);
INSERT INTO `ds_tousu` VALUES ('37', '18825820492', '18692346842', '电话打了空号的，又不打款', '2019-03-30 15:38:07', '0', '1509', null);
INSERT INTO `ds_tousu` VALUES ('38', '13593105141', '15954295859', '对方卸载不玩了，麻烦处理', '2019-03-30 15:48:13', '0', '304', null);
INSERT INTO `ds_tousu` VALUES ('39', '18742956045', '18525740923', '不打款，总监不打款，不相信平台，请处理', '2019-03-30 15:56:32', '0', '3113', null);
INSERT INTO `ds_tousu` VALUES ('40', '13422919485', '15819010148', '超时，给他打过电话', '2019-03-30 16:00:33', '0', '1836', null);
INSERT INTO `ds_tousu` VALUES ('41', '18202053705', '15060356545', '不打款', '2019-03-30 16:36:53', '0', '5405', null);
INSERT INTO `ds_tousu` VALUES ('42', '15166870156', '15974143921', '匹配后联系买家告知已匹配，买家此刻都没处理！', '2019-03-30 16:55:58', '0', '2582', null);
INSERT INTO `ds_tousu` VALUES ('43', '18677171821', '18317537522', '超时未付款', '2019-03-30 16:56:09', '0', '1737', null);
INSERT INTO `ds_tousu` VALUES ('44', '17551907167', '13763955567', '联系不到人', '2019-03-30 17:30:06', '0', '4765', null);
INSERT INTO `ds_tousu` VALUES ('45', '15372953725', '17520627472', '对方不打钱。电话通知过，还是不打', '2019-03-30 17:48:03', '0', '1702', null);
INSERT INTO `ds_tousu` VALUES ('46', '17686547907', '15139310713', '买家未付款', '2019-03-30 17:32:06', '0', '2681', null);
INSERT INTO `ds_tousu` VALUES ('47', '18132019485', '13510619876', '第一时间打电话通知对方匹配成功，需要打款，然后再打电话一直不接！现在已经超过两小时，建议封号', '2019-03-30 17:41:02', '0', '3177', null);
INSERT INTO `ds_tousu` VALUES ('48', '15957846116', '17178922949', '没付款', '2019-03-30 18:04:15', '0', '5545', null);
INSERT INTO `ds_tousu` VALUES ('49', '15975241681', '15874280461', '超时未打款', '2019-03-30 18:23:14', '0', '2208', null);
INSERT INTO `ds_tousu` VALUES ('50', '13774404568', '13162535140', '未付款', '2019-03-30 19:17:09', '0', '1539', null);
INSERT INTO `ds_tousu` VALUES ('51', '18030946359', '17878635054', '匹配不付款', '2019-03-30 19:57:48', '0', '3047', null);
INSERT INTO `ds_tousu` VALUES ('52', '13130435158', '13876080046', '我卖10个币，打电话沟通也不打款，发短信催也不打款，只能投诉。', '2019-03-30 20:12:01', '0', '6075', null);
INSERT INTO `ds_tousu` VALUES ('53', '13722922802', '13636955979', '没有截图', '2019-03-31 14:11:40', '0', '6556', null);
INSERT INTO `ds_tousu` VALUES ('54', '18105309599', '18865573843', '一直不付款，打电话不接', '2019-03-31 14:32:24', '0', '6450', null);
INSERT INTO `ds_tousu` VALUES ('55', '18759069779', '13738712383', '对方超时未打款', '2019-03-31 14:36:19', '0', '6489', null);
INSERT INTO `ds_tousu` VALUES ('56', '18226619235', '13703161431', '不付款', '2019-03-31 14:51:45', '0', '6469', null);
INSERT INTO `ds_tousu` VALUES ('57', '13464706815', '13152217085', '通知过三小时没打款', '2019-03-31 15:04:32', '0', '6515', null);
INSERT INTO `ds_tousu` VALUES ('58', '17626654954', '18510532439', '手机关机不付款', '2019-03-31 15:10:26', '0', '7257', null);
INSERT INTO `ds_tousu` VALUES ('59', '18760671221', '18482118468', '超过2小时未付款，也未取消！我已经发短信通知！并未回复', '2019-03-31 16:45:59', '0', '6981', null);
INSERT INTO `ds_tousu` VALUES ('60', '18278044420', '15280072230', '超时不打款', '2019-03-31 16:56:54', '0', '3825', null);
INSERT INTO `ds_tousu` VALUES ('61', '18742956045', '13762578918', '因为缓存错乱，导致价格出错，现在协商下来人取消订单，和客服三方确认完毕，求取消', '2019-03-31 16:53:19', '0', '523', null);
INSERT INTO `ds_tousu` VALUES ('62', '18865155077', '18376048463', '价格不对，买家不付款', '2019-03-31 18:29:28', '0', '6762', null);
INSERT INTO `ds_tousu` VALUES ('63', '13994046423', '17070300496', '付款码上传错了', '2019-03-31 18:59:45', '0', '6414', null);
INSERT INTO `ds_tousu` VALUES ('64', '13325146006', '18259717695', '超过两个小时未付款，电话不接  短信不回', '2019-03-31 20:05:56', '0', '6408', null);
INSERT INTO `ds_tousu` VALUES ('65', '13373953732', '17178922949', '买家不付款，手机关机，联系不上', '2019-03-31 20:17:23', '0', '5540', null);
INSERT INTO `ds_tousu` VALUES ('66', '17727099257', '13152217085', '早上的订单，现在晚上八点半还没付款', '2019-03-31 20:36:37', '0', '6514', null);
INSERT INTO `ds_tousu` VALUES ('67', '17183675228', '15355377912', '不付款', '2019-04-01 11:31:11', '0', '11351', null);
INSERT INTO `ds_tousu` VALUES ('68', '18039875925', '18258265373', '超时不打款', '2019-04-01 11:49:13', '0', '11346', null);
INSERT INTO `ds_tousu` VALUES ('69', '15179481657', '13718801690', '买家未付款，传假图，先不说他传的图片看不到，我压根就没收到款，支付宝都翻烂了也没看到他打款了！！！请求封他号，退回我币和额度！谢谢客服！', '2019-04-01 12:43:29', '0', '12386', null);
INSERT INTO `ds_tousu` VALUES ('70', '15730304827', '17600106725', '2小时未付款', '2019-04-01 13:01:17', '0', '12546', null);
INSERT INTO `ds_tousu` VALUES ('71', '13333962001', '13342250252', '付款后卖家一直不确认，联系不上！', '2019-04-01 17:14:15', '0', '14537', null);
INSERT INTO `ds_tousu` VALUES ('72', '15230524395', '18405707562', '八个小时不付款，打了4个电话不接！', '2019-04-01 21:44:19', '0', '17378', null);
INSERT INTO `ds_tousu` VALUES ('73', '18742956045', '18607072312', '不接电话，不打款', '2019-04-02 12:05:30', '0', '57', null);
INSERT INTO `ds_tousu` VALUES ('74', '17749652124', '15188708036', '买家没有付款，就上传照片了，我打电话过去，买家说不买了', '2019-04-02 13:34:26', '0', '21637', null);
INSERT INTO `ds_tousu` VALUES ('75', '13997528786', '18573840072', '对方一个多小时不打款，打对方电话他说不玩本平台了', '2019-04-02 15:17:35', '0', '115', null);
INSERT INTO `ds_tousu` VALUES ('76', '15159968815', '18177414074', '我已打款，对方超过2个小时还没确认！电话也关机打不通！', '2019-04-02 17:55:13', '0', '25515', null);
INSERT INTO `ds_tousu` VALUES ('77', '17134676179', '18140297727', '用户不确认', '2019-04-03 10:05:17', '0', '22562', null);
INSERT INTO `ds_tousu` VALUES ('78', '13035270920', '18587652273', '不付款的，', '2019-04-03 11:33:03', '0', '30541', null);
INSERT INTO `ds_tousu` VALUES ('79', '17512091663', '18587652273', '不付款', '2019-04-03 11:34:16', '0', '30552', null);
INSERT INTO `ds_tousu` VALUES ('80', '17601218484', '18587652273', '超时两个小时不付款', '2019-04-03 11:34:39', '0', '30492', null);
INSERT INTO `ds_tousu` VALUES ('81', '13700029201', '18256512860', '不打款', '2019-04-03 12:19:40', '0', '28122', null);
INSERT INTO `ds_tousu` VALUES ('82', '15245311301', '18256512860', '超时不付款 电话关机', '2019-04-03 12:42:25', '0', '32121', null);
INSERT INTO `ds_tousu` VALUES ('83', '15298006436', '13054908239', '联系了对方，对方说帐号和二维码号不一样，不打款', '2019-04-03 12:49:22', '0', '32473', null);
INSERT INTO `ds_tousu` VALUES ('84', '18873686930', '13643777640', '卖家超时不确定，电话也不接', '2019-04-03 13:14:26', '0', '32281', null);
INSERT INTO `ds_tousu` VALUES ('85', '15548033536', '15896304200', '买家不付款，超过两小时了，麻烦平台处理下，谢谢', '2019-04-03 15:38:09', '0', '35850', null);
INSERT INTO `ds_tousu` VALUES ('86', '13507898194', '13268589597', '买10币已付款，超时不确认', '2019-04-03 15:52:24', '0', '31815', null);
INSERT INTO `ds_tousu` VALUES ('87', '13414699980', '13860553210', '匹配后，不及时付款，', '2019-04-03 16:07:01', '0', '36592', null);
INSERT INTO `ds_tousu` VALUES ('88', '18115682771', '13679784531', '已打款超时未确认', '2019-04-03 16:50:15', '0', '37378', null);
INSERT INTO `ds_tousu` VALUES ('89', '18711485788', '13727206769', '不确认付款', '2019-04-03 17:29:02', '0', '35458', null);
INSERT INTO `ds_tousu` VALUES ('90', '18256512860', '13554519717', '打款了  不确认', '2019-04-03 21:38:25', '0', '32117', null);
INSERT INTO `ds_tousu` VALUES ('91', '18078286772', '15008239502', '对方不接电话，也不付款', '2019-04-03 21:58:23', '0', '42356', null);

-- ----------------------------
-- Table structure for ds_type
-- ----------------------------
DROP TABLE IF EXISTS `ds_type`;
CREATE TABLE `ds_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` char(32) NOT NULL,
  `pid` int(11) NOT NULL DEFAULT '0',
  `path` char(30) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ds_type
-- ----------------------------
INSERT INTO `ds_type` VALUES ('3', '系统矿机', '0', '0');

-- ----------------------------
-- Table structure for ds_updatenew
-- ----------------------------
DROP TABLE IF EXISTS `ds_updatenew`;
CREATE TABLE `ds_updatenew` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` char(60) NOT NULL DEFAULT '' COMMENT '公告标题',
  `content` text NOT NULL COMMENT '公告内容',
  `addtime` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '添加时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='公告信息表';

-- ----------------------------
-- Records of ds_updatenew
-- ----------------------------
INSERT INTO `ds_updatenew` VALUES ('1', '通知进官方QQ群！', '<p>\r\n	&nbsp; 官方QQ群号码：<span style=\"font-family:微软雅黑, -apple-system-font, \" line-height:20px;background-color:#f0f0f0;\"=\"\">976227931 &nbsp; &nbsp; &nbsp;官方<span>QQ群号码：</span><span line-height:20px;background-color:#f0f0f0;\"=\"\" style=\"white-space: normal;\">976227931 &nbsp;！ &nbsp;在交易过程中,卖家信息与个人收款信息不一致的请勿付款,向客服举报！免费买鱼,免费买鱼！</span></span> \r\n</p>\r\n<p>\r\n	<span style=\"font-family:微软雅黑, -apple-system-font, \" line-height:20px;background-color:#f0f0f0;\"=\"\"><span line-height:20px;background-color:#f0f0f0;\"=\"\" style=\"white-space: normal;\"><br />\r\n</span></span> \r\n</p>\r\n<p>\r\n	个人收款款不对不显示的找客服重新申请上传！ &nbsp;温馨提示：刷号的一律永久封号！清理一条线！绝不姑息\r\n</p>\r\n<p>\r\n	<br />\r\n</p>\r\n<p>\r\n	注册赠送矿池活动4.3号结束 &nbsp; 4.3号开始注册实名认证赠送矿池800+3台微矿机！ &nbsp; &nbsp; &nbsp;\r\n</p>\r\n<p>\r\n	<br />\r\n</p>\r\n<p>\r\n	<br />\r\n</p>', '1554231907');

-- ----------------------------
-- Table structure for ds_user
-- ----------------------------
DROP TABLE IF EXISTS `ds_user`;
CREATE TABLE `ds_user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` char(20) NOT NULL DEFAULT '',
  `password` char(32) NOT NULL DEFAULT '',
  `logtime` int(10) NOT NULL,
  `loginip` char(30) NOT NULL DEFAULT '',
  `lock` tinyint(1) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ds_user
-- ----------------------------
INSERT INTO `ds_user` VALUES ('1', 'admin', '21232f297a57a5a743894a0e4a801fc3', '1554341733', '127.0.0.1', '0');

-- ----------------------------
-- Table structure for ds_zichandetail
-- ----------------------------
DROP TABLE IF EXISTS `ds_zichandetail`;
CREATE TABLE `ds_zichandetail` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `member` varchar(255) DEFAULT '' COMMENT '会员编号',
  `adds` decimal(11,2) DEFAULT '0.00' COMMENT '添加',
  `reduce` decimal(11,2) DEFAULT '0.00' COMMENT '减少',
  `balance` decimal(11,2) DEFAULT '0.00' COMMENT '余额',
  `addtime` int(11) DEFAULT '0' COMMENT '添加时间',
  `type` tinyint(4) DEFAULT '0',
  `desc` varchar(255) DEFAULT '' COMMENT '说明',
  `hdjl_id` int(8) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=82673 DEFAULT CHARSET=utf8 COMMENT='购物券明细';

-- ----------------------------
-- Records of ds_zichandetail
-- ----------------------------
