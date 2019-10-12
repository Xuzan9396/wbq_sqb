/* This file is created by MySQLReback 2019-06-09 21:51:48 */
 /* 创建表结构 `ds_announce` */
 DROP TABLE IF EXISTS `ds_announce`;/* MySQLReback Separation */ CREATE TABLE `ds_announce` (
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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COMMENT='公告信息表';/* MySQLReback Separation */
 /* 插入数据 `ds_announce` */
 INSERT INTO `ds_announce` VALUES ('1','活动买币奖励','<p>
	活动买币奖励：购买10个,奖励矿池300+两台微矿机！
</p>
<p>
	&nbsp;<br />
购买50个币,奖励矿池1000+两台小矿机！
</p>
<p>
	<br />
购买150个币,奖励矿池2000+两台中矿机账！
</p>
<p>
	<br />
购买300个币,奖励矿池4000+两台大矿机！
</p>
<p>
	<br />
购买1000个币,奖励矿池8000+超矿机一台！
</p>','admin','1553794396','1554868136','all','3'),('2','推广奖励制度','<p>
	<span>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;推广奖励制度</span> 
</p>
<p>
	一级矿工：直推10人,团队30人,奖励矿池500+100钱包币+小矿机台,
</p>
<br />
<span>二级矿工：直推30人,团队200人,奖励矿池1000+200钱包币+中矿机一台</span><br />
<br />
<span>三级矿工：直推50人,团队500人,奖励矿池2000+300钱包币+大矿机一台</span><br />
<br />
<span>四级矿工：直推100人,团队1500,奖励矿池3000+500钱包币+大矿机一台</span><br />
<br />
<p>
	五级矿工：直推200人.团队5000人,奖励矿池5000+1000钱包币+超矿机一台
</p>
<p>
	<br />
</p>
<p>
	<br />
</p>
<p>
	<br />
</p>','admin','1553794574','1554868113','all','3'),('4','关于交易问题','关于交易问题关于交易问题关于交易问题关于交易问题关于交易问题','admin','1553888337','1554873872','all','3'),('5','测试','<p style=\"color:#333333;font-family:微软雅黑, &quot;font-size:14px;background-color:#FFFFFF;\">
	<b>11112222</b>
</p>','admin','1554883787','1554883787','all','3'),('6','11','11','admin','1560068222','1560068222','all','7');/* MySQLReback Separation */
 /* 创建表结构 `ds_announcetype` */
 DROP TABLE IF EXISTS `ds_announcetype`;/* MySQLReback Separation */ CREATE TABLE `ds_announcetype` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '类别ID',
  `name` varchar(45) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COMMENT='公告类别';/* MySQLReback Separation */
 /* 插入数据 `ds_announcetype` */
 INSERT INTO `ds_announcetype` VALUES ('3','公司公告'),('7','帮助中心'),('10','通知'),('11','用户调查');/* MySQLReback Separation */
 /* 创建表结构 `ds_auth_group` */
 DROP TABLE IF EXISTS `ds_auth_group`;/* MySQLReback Separation */ CREATE TABLE `ds_auth_group` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `title` char(100) NOT NULL DEFAULT '',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `rules` varchar(500) NOT NULL DEFAULT '',
  `description` char(50) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;/* MySQLReback Separation */
 /* 插入数据 `ds_auth_group` */
 INSERT INTO `ds_auth_group` VALUES ('7','首页管理员','1','13,14,15,16,17,18,19,20,21,22,23,24,25,26,9','能够管理首页推荐位'),('4','超级管理员','1','13,14,15,16,17,18,19,20,21,22,23,24,25,26,89,27,28,29,30,31,32,80,81,33,34,35,36,37,38,39,41,42,43,44,45,46,47,48,49,50,51,52,82,83,84,85,87,88,9,10,11,12,86,62,63,64,65,66,67,68,69,70,71,72,73,74,75,76,77,78,7913,14,15,16,17,18,19,20,21,22,23,24,25,26,89,27,28,29,30,31,32,80,81,33,34,35,36,37,38,39,41,42,43,44,45,46,47,48,49,50,51,52,82,83,84,85,87,88,9,10,11,12,86,62,63,64,65,66,67,68,69,70,71,72,73,74,75,76,77,78,79','拥有所有权限的管理员'),('8','广告管理员','1','27,28,29,30,31,32,9','管理全部广告'),('9','分类管理员','1','33,34,35,36,37,38,39,40,41,42,43,44,45,46,47,48,49,50,51,52,9','分类管理员'),('10','优惠券管理','1','53,54,55,56,57,58,59,60','优惠券管理');/* MySQLReback Separation */
 /* 创建表结构 `ds_auth_group_access` */
 DROP TABLE IF EXISTS `ds_auth_group_access`;/* MySQLReback Separation */ CREATE TABLE `ds_auth_group_access` (
  `uid` mediumint(8) unsigned NOT NULL,
  `group_id` mediumint(8) unsigned NOT NULL,
  UNIQUE KEY `uid_group_id` (`uid`,`group_id`),
  KEY `uid` (`uid`),
  KEY `group_id` (`group_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=FIXED;/* MySQLReback Separation */
 /* 插入数据 `ds_auth_group_access` */
 INSERT INTO `ds_auth_group_access` VALUES ('2651','4');/* MySQLReback Separation */
 /* 创建表结构 `ds_auth_rule` */
 DROP TABLE IF EXISTS `ds_auth_rule`;/* MySQLReback Separation */ CREATE TABLE `ds_auth_rule` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `name` char(80) NOT NULL DEFAULT '',
  `title` char(20) NOT NULL DEFAULT '',
  `type` tinyint(1) NOT NULL DEFAULT '1',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `condition` char(100) NOT NULL DEFAULT '',
  `mid` tinyint(3) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=FIXED;/* MySQLReback Separation */
 /* 创建表结构 `ds_banner` */
 DROP TABLE IF EXISTS `ds_banner`;/* MySQLReback Separation */ CREATE TABLE `ds_banner` (
  `id` int(10) NOT NULL,
  `path` varchar(100) NOT NULL,
  `sort` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;/* MySQLReback Separation */
 /* 创建表结构 `ds_date` */
 DROP TABLE IF EXISTS `ds_date`;/* MySQLReback Separation */ CREATE TABLE `ds_date` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `date` varchar(255) DEFAULT NULL,
  `price` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=43390 DEFAULT CHARSET=utf8;/* MySQLReback Separation */
 /* 插入数据 `ds_date` */
 INSERT INTO `ds_date` VALUES ('43379','1554342845','1'),('43380','1554866011','1.01'),('43381','1554946206','1.02'),('43382','1555036248','1.03'),('43383','1559483548','1.04'),('43384','1559526132','1.05'),('43385','1559711019','1.06'),('43386','1559782927','1.07'),('43387','1559867046','1.08'),('43388','1559960333','1.09'),('43389','1560046244','1.1');/* MySQLReback Separation */
 /* 创建表结构 `ds_date_today` */
 DROP TABLE IF EXISTS `ds_date_today`;/* MySQLReback Separation */ CREATE TABLE `ds_date_today` (
  `id` int(8) unsigned NOT NULL AUTO_INCREMENT,
  `price` decimal(10,2) DEFAULT NULL,
  `last_time` varchar(50) DEFAULT NULL COMMENT '上次更新时间',
  `date` varchar(50) DEFAULT NULL COMMENT '当前更新时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=30 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;/* MySQLReback Separation */
 /* 插入数据 `ds_date_today` */
 INSERT INTO `ds_date_today` VALUES ('1','0.30','1553316095','1553316210'),('2','0.50','','1553323917'),('3','1.50','','1553325684'),('4','1.80','','1553350545'),('5','0.31','','1553351934'),('6','0.35','','1553423578'),('7','0.50','','1553527414'),('8','0.58','','1553573699'),('9','0.59','','1553636590'),('10','0.60','','1553729030'),('11','0.61','','1553796092'),('12','0.62','','1553894780'),('13','0.63','','1553962756'),('14','0.65','','1553962862'),('15','0.63','','1553962917'),('16','0.63','','1553964261'),('17','0.63','','1553964332'),('18','0.64','','1554006387'),('19','0.64','','1554006407'),('20','0.64','','1554006439'),('21','0.63','','1554006486'),('22','0.64','','1554049830'),('23','0.65','','1554133532'),('24','0.66','','1554231626'),('25','0.67','','1554317304'),('26','1.00','','1559973233'),('27','2.00','','1559973768'),('28','0.20','','1560050530'),('29','0.20','','1560072705');/* MySQLReback Separation */
 /* 创建表结构 `ds_dongjiedetail` */
 DROP TABLE IF EXISTS `ds_dongjiedetail`;/* MySQLReback Separation */ CREATE TABLE `ds_dongjiedetail` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `member` varchar(255) DEFAULT '' COMMENT '会员编号',
  `adds` decimal(11,2) DEFAULT '0.00' COMMENT '添加',
  `reduce` decimal(11,2) DEFAULT '0.00' COMMENT '减少',
  `balance` decimal(11,2) DEFAULT '0.00' COMMENT '余额',
  `addtime` int(11) DEFAULT '0' COMMENT '添加时间',
  `desc` varchar(255) DEFAULT '' COMMENT '说明',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COMMENT='购物券明细';/* MySQLReback Separation */
 /* 插入数据 `ds_dongjiedetail` */
 INSERT INTO `ds_dongjiedetail` VALUES ('1','18888888888','0.00','20.00','980.00','1559999462','交易中心下单'),('2','18888888888','0.00','10.00','970.00','1559999751','交易中心下单'),('3','18888888888','10.00','0.00','980.00','1560079730','交易取消退款');/* MySQLReback Separation */
 /* 创建表结构 `ds_hdjl` */
 DROP TABLE IF EXISTS `ds_hdjl`;/* MySQLReback Separation */ CREATE TABLE `ds_hdjl` (
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
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8 COMMENT='欠钱明细';/* MySQLReback Separation */
 /* 插入数据 `ds_hdjl` */
 INSERT INTO `ds_hdjl` VALUES ('11','IOX买币活动奖励1','10.00','200.00','2','2','1553535592','1554485995'),('12','IOX买币活动奖励2','50.00','1000.00','2','2','1553535721','1554486124'),('13','IOX买币活动奖励3','150.00','2000.00','4','2','1553535878','1554486281'),('14','IOX买币活动奖励4','300.00','4000.00','5','2','1553536025','1554486427'),('15','IOX买币活动奖励5','100.00','0.00','4','6','1553536187','1559484209');/* MySQLReback Separation */
 /* 创建表结构 `ds_jinbidetail` */
 DROP TABLE IF EXISTS `ds_jinbidetail`;/* MySQLReback Separation */ CREATE TABLE `ds_jinbidetail` (
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
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8 COMMENT='金币明细';/* MySQLReback Separation */
 /* 插入数据 `ds_jinbidetail` */
 INSERT INTO `ds_jinbidetail` VALUES ('1','0','15013029112','0.01000','0.00000','0.29726','1554868149','每日签到'),('3','0','15013029111','0.01000','0.00000','0.01000','1554876655','每日签到'),('4','0','15013029111','0.01000','0.00000','0.02000','1554946548','每日签到'),('5','0','15013029111','0.01000','0.00000','0.03000','1555038040','每日签到'),('6','1','15013029112','100.00000','0.00000','100.29726','1559484320','平台充值'),('7','1','15013029111','100.00000','0.00000','100.03000','1559484845','平台充值'),('8','0','15013029111','0.00000','10.00000','90.03000','1559484907','兑换矿池资产'),('9','0','15013029111','0.01000','0.00000','90.04000','1559484961','每日签到'),('10','0','15713784528','0.01000','0.00000','0.00000','1559487981','每日签到'),('11','0','15713784528','0.01000','0.00000','0.00000','1559489439','每日签到'),('12','0','18607072312','0.01000','0.00000','0.00000','1559489846','每日签到'),('13','0','15013029111','0.01000','0.00000','0.00000','1559490435','每日签到'),('14','0','18888888888','0.01000','0.00000','90.05000','1559711259','每日签到'),('15','0','18888888888','0.00000','10.00000','80.05000','1559714003','购买微型矿机'),('16','2','18888888888','0.00000','0.00000','80.05000','1559716461','平台赠中型矿机'),('17','2','18888888888','0.00000','0.00000','80.05000','1559717144','平台赠中型矿机'),('18','3','17122178115','0.00000','0.00000','0.00000','1559725052','注册赠微型矿机'),('19','3','15612722035','0.00000','0.00000','0.00000','1559725214','注册赠微型矿机'),('20','0','18888888888','1000.00000','0.00000','0.00000','1559733439','可售余额兑换'),('21','0','18888888888','1000.00000','0.00000','0.00000','1559733445','可售余额兑换'),('22','0','18888888888','100000.00000','0.00000','0.00000','1559733453','可售余额兑换'),('23','0','18888888888','0.01000','0.00000','0.01000','1559782979','每日签到'),('24','0','18888888888','0.63786','0.00000','0.64786','1559824225','矿机收益'),('25','0','18888888888','15.59086','0.00000','16.23872','1559824226','矿机收益'),('26','0','18888888888','15.49219','0.00000','31.73090','1559824226','矿机收益'),('27','2','13888888888','0.00000','0.00000','0.00000','1560067919','平台赠大型矿机'),('28','0','18888888888','1.43708','0.00000','33.16798','1560072552','矿机收益'),('29','0','18888888888','35.92679','0.00000','69.09477','1560072552','矿机收益'),('30','0','18888888888','35.92679','0.00000','105.02157','1560072552','矿机收益'),('31','0','18888888888','0.00000','10.00000','95.02157','1560076700','兑换矿池资产'),('32','0','18888888888','0.00000','10.00000','85.02157','1560076791','兑换矿池资产'),('33','0','18888888888','0.01000','0.00000','85.03157','1560078612','每日签到'),('34','0','15556586272','0.01000','0.00000','0.01000','1560078966','每日签到');/* MySQLReback Separation */
 /* 创建表结构 `ds_jyzx` */
 DROP TABLE IF EXISTS `ds_jyzx`;/* MySQLReback Separation */ CREATE TABLE `ds_jyzx` (
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
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;/* MySQLReback Separation */
 /* 插入数据 `ds_jyzx` */
 INSERT INTO `ds_jyzx` VALUES ('6','15','','20','10','15612722035','','1559973246','0','','0','','0000-00-00 00:00:00','','0.2','qgcbt'),('8','15','11','20','20','15612722035','18888888888','1559973620','1','','0','0','2019-06-08 21:11:02','','0.2','qgcbt');/* MySQLReback Separation */
 /* 创建表结构 `ds_keshoudetail` */
 DROP TABLE IF EXISTS `ds_keshoudetail`;/* MySQLReback Separation */ CREATE TABLE `ds_keshoudetail` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `member` varchar(255) DEFAULT '' COMMENT '会员编号',
  `adds` decimal(11,2) DEFAULT '0.00' COMMENT '添加',
  `reduce` decimal(11,2) DEFAULT '0.00' COMMENT '减少',
  `balance` decimal(11,2) DEFAULT '0.00' COMMENT '余额',
  `addtime` int(11) DEFAULT '0' COMMENT '添加时间',
  `type` tinyint(4) DEFAULT '0',
  `desc` varchar(255) DEFAULT '' COMMENT '说明',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COMMENT='购物券明细';/* MySQLReback Separation */
 /* 插入数据 `ds_keshoudetail` */
 INSERT INTO `ds_keshoudetail` VALUES ('1','15013029111','5.99','0.00','11.99','1554952621','0','释放金额'),('2','15013029111','5.98','0.00','17.96','1555040243','0','释放金额'),('3','15013029111','5000.00','0.00','5017.96','1555052355','1','平台充值'),('4','18888888888','6.08','0.00','18.06','1559714136','0','释放金额'),('5','18888888888','0.00','1000.00','1018.06','1559733439','0','兑换矿池钱包'),('6','18888888888','0.00','1000.00','2018.06','1559733445','0','兑换矿池钱包'),('7','18888888888','0.00','100000.00','102018.06','1559733453','0','兑换矿池钱包'),('8','18888888888','500.00','0.00','102518.06','1559810088','1','平台充值'),('9','18888888888','6.06','0.00','102524.13','1559918363','0','释放金额'),('10','18888888888','0.00','26.00','102498.13','1559999462','0','交易中心下单'),('11','18888888888','0.00','13.00','102485.13','1559999751','0','交易中心下单'),('12','15612722035','2.00','0.00','2.00','1560067855','0','释放金额'),('13','18888888888','13.00','0.00','102498.13','1560079730','0','交易取消退款');/* MySQLReback Separation */
 /* 创建表结构 `ds_log` */
 DROP TABLE IF EXISTS `ds_log`;/* MySQLReback Separation */ CREATE TABLE `ds_log` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `logtime` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '操作时间',
  `logaccount` varchar(45) NOT NULL DEFAULT '' COMMENT '操作对应的账号',
  `logip` varchar(100) NOT NULL DEFAULT '' COMMENT '操作者IP',
  `logdesc` varchar(200) NOT NULL DEFAULT '' COMMENT '操作描述',
  `logtype` varchar(10) NOT NULL DEFAULT '' COMMENT '日志类型: member:会员日志 admin:管理员日志',
  `logiplocal` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `logtype` (`logtype`)
) ENGINE=InnoDB AUTO_INCREMENT=120 DEFAULT CHARSET=utf8 COMMENT='系统操作日志';/* MySQLReback Separation */
 /* 插入数据 `ds_log` */
 INSERT INTO `ds_log` VALUES ('1','1554865579','admin','113.56.200.221','管理员[admin]登录','admin','湖北省襄阳市联通'),('2','1554865973','admin','113.56.200.221','管理员[admin]登录','admin','湖北省襄阳市联通'),('3','1554867660','admin','113.56.200.221','管理员[admin]登录','admin','湖北省襄阳市联通'),('4','1554867864','15013029112','113.56.200.221','删除一个商品','admin','湖北省襄阳市联通'),('5','1554868076','15013029112','113.56.200.221','修改公告','admin','湖北省襄阳市联通'),('6','1554868113','15013029112','113.56.200.221','修改公告','admin','湖北省襄阳市联通'),('7','1554868136','15013029112','113.56.200.221','修改公告','admin','湖北省襄阳市联通'),('8','1554868229','15013029112','113.56.200.221','修改更新公告','admin','湖北省襄阳市联通'),('9','1554868239','15013029112','113.56.200.221','修改更新公告','admin','湖北省襄阳市联通'),('10','1554868909','','113.56.200.221','会员登出','member','湖北省襄阳市联通'),('11','1554869095','','113.56.200.221','会员登出','member','湖北省襄阳市联通'),('12','1554872793','admin','113.56.200.221','管理员admin登出','admin','湖北省襄阳市联通'),('13','1554873192','','113.56.200.221','会员登出','member','湖北省襄阳市联通'),('14','1554873752','','113.56.200.221','管理员登出','admin','湖北省襄阳市联通'),('15','1554873830','admin','113.56.200.221','管理员[admin]登录','admin','湖北省襄阳市联通'),('16','1554873872','15013029111','113.56.200.221','修改公告','admin','湖北省襄阳市联通'),('17','1554873879','15013029111','113.56.200.221','删除公告','admin','湖北省襄阳市联通'),('18','1554873914','15013029111','113.56.200.221','修改更新公告','admin','湖北省襄阳市联通'),('19','1554876530','','113.56.200.221','会员登出','member','湖北省襄阳市联通'),('20','1554876565','','113.56.200.221','编辑ID为1的管理员','admin','湖北省襄阳市联通'),('21','1554876959','admin','113.56.200.221','管理员admin登出','admin','湖北省襄阳市联通'),('22','1554877348','admin','182.135.14.114','管理员[admin]登录','admin','四川省乐山市电信'),('23','1554877588','admin','182.135.14.114','管理员[admin]登录','admin','四川省乐山市电信'),('24','1554878714','','113.56.200.221','管理员登出','admin','湖北省襄阳市联通'),('25','1554878729','admin','113.56.200.221','管理员[admin]登录','admin','湖北省襄阳市联通'),('26','1554878745','','113.56.200.221','编辑ID为1的管理员','admin','湖北省襄阳市联通'),('27','1554881663','admin','175.11.213.81','管理员[admin]登录','admin','湖南省电信'),('28','1554883261','admin','113.56.200.221','管理员[admin]登录','admin','湖北省襄阳市联通'),('29','1554883409','admin','113.56.200.221','管理员admin登出','admin','湖北省襄阳市联通'),('30','1554883433','','113.56.200.221','管理员登出','admin','湖北省襄阳市联通'),('31','1554883447','admin','113.56.200.221','管理员[admin]登录','admin','湖北省襄阳市联通'),('32','1554883800','','175.11.213.81','发布公告','admin','湖南省电信'),('33','1554883814','','175.11.213.81','备份数据库','admin','湖南省电信'),('34','1554976047','admin','113.56.201.146','管理员[admin]登录','admin','湖北省襄阳市联通'),('35','1554976068','15013029111','113.56.201.146','编辑ID为1的管理员','admin','湖北省襄阳市联通'),('36','1554976123','admin','119.123.129.113','管理员[admin]登录','admin','广东省深圳市电信'),('37','1554984254','admin','223.104.2.201','管理员[admin]登录','admin','中国移动'),('38','1554986200','admin','113.56.201.146','管理员admin登出','admin','湖北省襄阳市联通'),('39','1555036333','','117.136.38.144','会员登出','member','中国移动'),('40','1555036561','admin','202.85.208.14','管理员[admin]登录','admin','北京市中关村数据中心'),('41','1555043114','admin','221.178.124.236','管理员[admin]登录','admin','重庆市移动'),('42','1555044398','admin','117.141.11.19','管理员[admin]登录','admin','广西南宁市移动'),('43','1555044768','admin','117.141.11.19','管理员[admin]登录','admin','广西南宁市移动'),('44','1555046687','','113.56.206.5','会员登出','member','湖北省襄阳市联通'),('45','1555046792','admin','182.35.109.187','管理员[admin]登录','admin','山东省泰安市电信'),('46','1555047336','admin','117.136.77.87','管理员[admin]登录','admin','中国移动'),('47','1555052241','admin','221.178.124.236','管理员[admin]登录','admin','重庆市移动'),('48','1555054402','admin','36.157.149.171','管理员[admin]登录','admin','中国移动'),('49','1555056709','admin','113.56.206.5','管理员[admin]登录','admin','湖北省襄阳市联通'),('50','1555056925','','113.56.206.5','删除备份文件','admin','湖北省襄阳市联通'),('51','1555057352','admin','117.136.78.96','管理员[admin]登录','admin','中国移动'),('52','1555058841','','113.56.206.5','会员登出','member','湖北省襄阳市联通');/* MySQLReback Separation */
 /* 插入数据 `ds_log` */
 INSERT INTO `ds_log` VALUES ('53','1555060017','admin','113.56.206.5','管理员admin登出','admin','湖北省襄阳市联通');/* MySQLReback Separation */
 /* 插入数据 `ds_log` */
 INSERT INTO `ds_log` VALUES ('54','1555060080','admin','113.56.206.5','管理员[admin]登录','admin','湖北省襄阳市联通'),('55','1555062520','','113.56.206.5','会员登出','member','湖北省襄阳市联通'),('56','1559483755','','58.32.217.165','会员登出','member','上海市电信ADSL'),('57','1559483879','admin','58.32.217.165','管理员[admin]登录','admin','上海市电信ADSL'),('58','1559483902','admin','221.192.178.3','管理员[admin]登录','admin','河北省石家庄市联通ADSL'),('59','1559484807','admin','221.192.178.3','管理员[admin]登录','admin','河北省石家庄市联通ADSL'),('60','1559485452','admin','221.192.178.3','管理员[admin]登录','admin','河北省石家庄市联通ADSL'),('61','1559485996','admin','58.32.217.165','管理员[admin]登录','admin','上海市电信ADSL'),('62','1559486210','','58.32.217.165','会员登出','member','上海市电信ADSL'),('63','1559486565','','58.32.217.165','会员登出','member','上海市电信ADSL'),('64','1559486784','','221.192.178.3','会员登出','member','河北省石家庄市联通ADSL'),('65','1559487077','','58.32.217.165','会员登出','member','上海市电信ADSL'),('66','1559487435','','221.192.178.3','会员登出','member','河北省石家庄市联通ADSL'),('67','1559487937','','58.32.217.165','会员登出','member','上海市电信ADSL'),('68','1559489462','admin','223.167.1.158','管理员[admin]登录','admin','上海市联通'),('69','1559706768','admin','58.32.217.165','管理员[admin]登录','admin','上海市电信ADSL'),('70','1559706779','','58.32.217.165','编辑ID为1的管理员','admin','上海市电信ADSL'),('71','1559711367','18888888888','58.32.217.165','删除一个商品','admin','上海市电信ADSL'),('72','1559711791','','58.32.217.165','会员登出','member','上海市电信ADSL'),('73','1559711803','','58.32.217.165','会员登出','member','上海市电信ADSL'),('74','1559713951','admin','222.90.87.62','管理员[admin]登录','admin','陕西省西安市电信ADSL'),('75','1559714191','admin','61.92.20.19','管理员[admin]登录','admin','香港城市电讯有限公司'),('76','1559714212','18888888888','222.90.87.62','备份数据库','admin','陕西省西安市电信ADSL'),('77','1559714332','admin','171.40.26.135','管理员[admin]登录','admin','湖北省电信'),('78','1559715577','admin','36.106.21.21','管理员[admin]登录','admin','浙江省电信'),('79','1559720648','admin','221.192.178.26','管理员[admin]登录','admin','河北省石家庄市联通ADSL'),('80','1559723820','17122178115','221.192.178.26','修改ID为3的会员组','admin','河北省石家庄市联通ADSL'),('81','1559723842','17122178115','221.192.178.26','修改ID为3的会员组','admin','河北省石家庄市联通ADSL'),('82','1559723953','','58.32.217.165','会员登出','member','上海市电信ADSL'),('83','1559724142','admin','112.96.116.208','管理员[admin]登录','admin','广东省广州市联通'),('84','1559724593','','221.192.178.26','会员登出','member','河北省石家庄市联通ADSL'),('85','1559724700','','221.192.178.26','会员登出','member','河北省石家庄市联通ADSL'),('86','1559724783','','221.192.178.26','会员登出','member','河北省石家庄市联通ADSL'),('87','1559724845','','221.192.178.26','会员登出','member','河北省石家庄市联通ADSL'),('88','1559725074','','221.192.178.26','会员登出','member','河北省石家庄市联通ADSL'),('89','1559725111','','221.192.178.26','会员登出','member','河北省石家庄市联通ADSL'),('90','1559733246','admin','182.243.208.247','管理员[admin]登录','admin','云南省玉溪市电信'),('91','1559787006','admin','43.227.138.224','管理员[admin]登录','admin','亚太地区'),('92','1559787425','admin','113.87.192.202','管理员[admin]登录','admin','广东省深圳市电信'),('93','1559787538','','61.158.152.176','会员登出','member','河南省郑州市联通'),('94','1559787660','admin','61.158.152.176','管理员[admin]登录','admin','河南省郑州市联通'),('95','1559791364','','223.89.206.143','会员登出','member','中国移动'),('96','1559809941','admin','61.242.114.113','管理员[admin]登录','admin','广东省江门市联通LAN'),('97','1559810692','admin','58.32.217.165','管理员[admin]登录','admin','上海市电信ADSL'),('98','1559828837','admin','61.242.114.113','管理员[admin]登录','admin','广东省江门市联通LAN'),('99','1559874652','admin','39.187.90.12','管理员[admin]登录','admin','中国移动'),('100','1559920001','admin','112.111.204.223','管理员[admin]登录','admin','福建省宁德市(寿宁县)联通'),('101','1559920392','18888888888','112.111.204.223','添加一个新的角色','admin','福建省宁德市(寿宁县)联通'),('102','1559920439','admin','220.249.163.131','管理员[admin]登录','admin','福建省福州市(连江县)联通ADSL'),('103','1559973141','admin','58.32.217.165','管理员[admin]登录','admin','上海市电信ADSL'),('104','1559999355','admin','61.242.114.116','管理员[admin]登录','admin','广东省江门市联通LAN');/* MySQLReback Separation */
 /* 插入数据 `ds_log` */
 INSERT INTO `ds_log` VALUES ('105','1560058244','admin','58.32.217.165','管理员[admin]登录','admin','上海市电信ADSL');/* MySQLReback Separation */
 /* 插入数据 `ds_log` */
 INSERT INTO `ds_log` VALUES ('106','1560067654','admin','115.63.172.198','管理员[admin]登录','admin','河南省信阳市联通'),('107','1560068231','15612722035','115.63.172.198','发布公告','admin','河南省信阳市联通'),('108','1560068267','15612722035','115.63.172.198','下载备份文件','admin','河南省信阳市联通'),('109','1560072649','admin','58.62.31.51','管理员[admin]登录','admin','广东省广州市荔湾区电信'),('110','1560072796','admin','119.84.251.111','管理员[admin]登录','admin','重庆市电信'),('111','1560076738','admin','58.32.217.165','管理员[admin]登录','admin','上海市电信ADSL'),('112','1560076833','admin','58.32.217.165','管理员[admin]登录','admin','上海市电信ADSL'),('113','1560076872','admin','58.32.217.165','管理员[admin]登录','admin','上海市电信ADSL'),('114','1560079695','admin','39.187.90.12','管理员[admin]登录','admin','中国移动'),('115','1560079706','','39.187.90.12','删除备份文件','admin','中国移动'),('116','1560081021','admin','182.101.2.59','管理员[admin]登录','admin','江西省南昌市电信'),('117','1560083566','admin','58.32.217.165','管理员[admin]登录','admin','上海市电信ADSL'),('118','1560087998','admin','222.184.166.39','管理员[admin]登录','admin','江苏省南通市电信ADSL'),('119','1560088132','admin','61.158.149.50','管理员[admin]登录','admin','河南省开封市联通ADSL');/* MySQLReback Separation */
 /* 创建表结构 `ds_member` */
 DROP TABLE IF EXISTS `ds_member`;/* MySQLReback Separation */ CREATE TABLE `ds_member` (
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
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8 COMMENT='会员';/* MySQLReback Separation */
 /* 插入数据 `ds_member` */
 INSERT INTO `ds_member` VALUES ('10','0','admin','e10adc3949ba59abbe56e057f20f883e','e10adc3949ba59abbe56e057f20f883e','1553576412','1559973738','3','13324','217','15713784528','1789','2279.00','700.00','0.00000000','1250.00000000','95.35328099','102710.64671901','100.29726178','测试2','15013029112','0','','1554867708','1554300574','1','103','1|1760|1764|1776|1782|1788|1789|','/Public/Uploads/shoukuanma//1553576989710.jpg','41022219980909111',''),('11','0','18888888888','e10adc3949ba59abbe56e057f20f883e','e10adc3949ba59abbe56e057f20f883e','1553576588','1560087968','1','8','4','18607072312','1785','0.00','1.00','0.00000000','980.00000000','102498.12789595','3125.87210405','85.03156729','测试','18888888888','0','','1560087935','1560078568','1','69','1|1760|1764|1776|1785|','/Public/Uploads/shoukuanma//1553578329888.jpg','admin',''),('14','0','17122178115','18f10a8a9673465771ff554a8f4567be','bb8c7e453b17c53837874a100fac32e6','1559724894','1559810755','0','0','0','18888888888','11','0.00','0.00','0.00000000','0.00000000','0.00000000','1000.00000000','0.00000000','你在','17122178115','0','','0','0','1','0','1|1760|1764|1776|1785|11|','/Public/Uploads/shoukuanma/20190605/1559725038992.jpg','130983199511043011','221.192.178.26'),('15','0','15612722035','18f10a8a9673465771ff554a8f4567be','e10adc3949ba59abbe56e057f20f883e','1559725158','1560068322','0','0','0','18888888888','11','0.00','0.00','0.00000000','20000.00000000','2.00000000','998.00000000','0.00000000','闫京1','15612722035','0','','0','0','1','0','1|1760|1764|1776|1785|11|','/Public/Uploads/shoukuanma/20190605/1559725211973.jpg','130983199511043011','221.192.178.26'),('16','0','15556586272','e10adc3949ba59abbe56e057f20f883e','e10adc3949ba59abbe56e057f20f883e','1560078812','1560078971','0','0','0','18888888888','11','0.00','0.00','0.00000000','0.00000000','0.00000000','1000.00000000','0.01000000','','15556586272','0','','1560078831','0','0','1','1|1760|1764|1776|1785|11|','','','39.187.90.12');/* MySQLReback Separation */
 /* 创建表结构 `ds_member_group` */
 DROP TABLE IF EXISTS `ds_member_group`;/* MySQLReback Separation */ CREATE TABLE `ds_member_group` (
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
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;/* MySQLReback Separation */
 /* 插入数据 `ds_member_group` */
 INSERT INTO `ds_member_group` VALUES ('1','0','普通会员','10','30','0.00','80.00','0.30','10','5','5','1.70','0.00200','0','0','1','1487262445','00:00-24:00','1','50.00','100.00','500.00','2','1'),('2','1','一级矿工','30','200','80.00','80.00','0.30','10','6','5','1.70','0.00200','2','50','1','1487262481','00:00-24:00','1','50.00','200.00','1000.00','3','1'),('3','2','二级矿工','1','2','500.00','80.00','0.30','10','6','5','1.70','0.00200','3','100','1','1487262481','00:00-24:00','5','50.00','66666.00','2000.00','4','1'),('4','3','三级矿工','100','1500','3000.00','100.00','0.30','10','6','5','1.70','0.00200','1','150','1','1487262481','00:00-24:00','1','50.00','500.00','3000.00','4','1'),('5','4','四级矿工','200','5000','5000.00','200.00','0.30','10','6','5','1.70','0.00200','1','200','1','1487262481','00:00-24:00','1','100.00','500.00','3000.00','5','1'),('6','5','五级矿工','999999999','999999999','','','0.30','0','6','5','1.17','0.00200','1','','1','1487262481','00:00-24:00','2','200.00','1000.00','5000.00','5','1'),('7','6','六级矿工','999999999','999999999','','','0.30','0','5','0','1.17','0.00200','5','','1','1487262481','00:00-24:00','2','0.00','0.00','0.00','9','1');/* MySQLReback Separation */
 /* 创建表结构 `ds_members_sign` */
 DROP TABLE IF EXISTS `ds_members_sign`;/* MySQLReback Separation */ CREATE TABLE `ds_members_sign` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) unsigned NOT NULL COMMENT '用户id',
  `username` varchar(255) DEFAULT NULL,
  `jiangli` decimal(15,8) unsigned DEFAULT '0.00000000' COMMENT '是否签到过',
  `stime` int(10) unsigned DEFAULT '0' COMMENT '签到的时间',
  `desc` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `index_uid` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COMMENT='签到分享表';/* MySQLReback Separation */
 /* 插入数据 `ds_members_sign` */
 INSERT INTO `ds_members_sign` VALUES ('1','11','15013029111','0.01000000','1559484961','签到奖励'),('2','0','15713784528','0.01000000','1559487981','签到奖励'),('3','0','15713784528','0.01000000','1559489439','签到奖励'),('4','0','18607072312','0.01000000','1559489846','签到奖励'),('5','0','15013029111','0.01000000','1559490435','签到奖励'),('6','11','18888888888','0.01000000','1559711259','签到奖励'),('7','11','18888888888','0.01000000','1559782979','签到奖励'),('8','11','18888888888','0.01000000','1560078612','签到奖励'),('9','16','15556586272','0.01000000','1560078966','签到奖励');/* MySQLReback Separation */
 /* 创建表结构 `ds_message` */
 DROP TABLE IF EXISTS `ds_message`;/* MySQLReback Separation */ CREATE TABLE `ds_message` (
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='站内信息表';/* MySQLReback Separation */
 /* 创建表结构 `ds_node` */
 DROP TABLE IF EXISTS `ds_node`;/* MySQLReback Separation */ CREATE TABLE `ds_node` (
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
) ENGINE=InnoDB AUTO_INCREMENT=53 DEFAULT CHARSET=utf8;/* MySQLReback Separation */
 /* 插入数据 `ds_node` */
 INSERT INTO `ds_node` VALUES ('1','systemlogined','后台应用','1','','1','0','1'),('6','Rbac','Rbac权限控制','1','','6','1','2'),('7','Index','后台首页','1','','1','1','2'),('10','index','管理员列表','1','','1','6','3'),('11','role','角色列表','1','','1','6','3'),('12','node','节点列表','1','','1','6','3'),('16','index','后台首页','1','','1','7','3'),('17','Member','会员管理','1','','2','1','2'),('18','check','会员列表','1','','1','17','3'),('19','award','赠送矿机','1','','1','17','3'),('20','shu_list','团队树形图','1','','1','17','3'),('22','Jinbidetail','资金管理','1','','4','1','2'),('23','csdd','出售订单','1','','1','22','3'),('24','qiugou','求购订单','1','','1','22','3'),('25','jiaoyi','交易中的订单','1','','1','22','3'),('26','shop','矿机管理','1','','3','1','2'),('27','type_list','分类列表','1','','1','26','3'),('28','Info','信息交流','1','','5','1','2'),('29','announce','公告管理','1','','1','28','3'),('30','annType','公告类别','1','','1','28','3'),('31','msgReceive','收件箱','1','','1','28','3'),('32','msgSend','发件箱','1','','1','28','3'),('33','System','系统设置','1','','7','1','2'),('34','backUp','数据备份','1','','1','33','3'),('35','customSetting','自定义配置','1','','1','33','3'),('36','jywc','交易完成订单','1','','1','22','3'),('37','member_group','会员等级','1','','1','17','3'),('38','lists','矿机列表','1','','1','26','3'),('39','orderlist','已购矿机','1','','1','26','3'),('40','report_order','投诉中的订单','1','','1','22','3'),('41','zichandetail','矿池资产明细','1','','1','22','3'),('42','qianbaodetail','矿池钱包明细','1','','1','22','3'),('43','dongjiedetail','交易冻结明细','1','','1','22','3'),('44','ksyedetail','可售余额明细','1','','1','22','3'),('47','awardlist','赠送矿机记录','1','','1','17','3'),('48','qianbaolist','赠送矿池钱包记录','1','','1','17','3'),('49','zichanlist','赠送矿池资产记录','1','','1','17','3'),('50','yuelist','赠送可售余额记录','1','','1','17','3'),('51','banner','首页滚动横幅','1','','1','26','3'),('52','updatenew','更新公告','1','','1','28','3');/* MySQLReback Separation */
 /* 创建表结构 `ds_order` */
 DROP TABLE IF EXISTS `ds_order`;/* MySQLReback Separation */ CREATE TABLE `ds_order` (
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
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8;/* MySQLReback Separation */
 /* 插入数据 `ds_order` */
 INSERT INTO `ds_order` VALUES ('10','14444444444','1761','微型矿机（赠）','0.00','10.00','2019-03-15 12:10:48','1553610829','1','1','/Public/Uploads/20180526/5b090cf0e10d9.png','1440','0.01','0.00902778','I152304859','2.47707488'),('11','14444444444','1761','微型矿机（赠）','0.00','10.00','2019-03-15 12:10:48','1553610829','1','1','/Public/Uploads/20180526/5b090cf0e10d9.png','1440','0.01','0.00902778','I152304800','2.47707488'),('12','14444444444','1761','微型矿机（赠）','0.00','10.00','2019-03-15 12:10:49','1553610829','1','1','/Public/Uploads/20180526/5b090cf0e10d9.png','1440','0.01','0.00902778','I152304969','2.47707237'),('13','18888888888','2147483647','微型矿机（赠）','0.00','10.00','2019-03-15 12:21:04','1552623664','1','1','/Public/Uploads/20180526/5b090cf0e10d9.png','1440','0.01','0.00902778','I152366470','0.00000000'),('14','18888888888','2147483647','微型矿机（赠）','0.00','10.00','2019-03-15 12:21:04','1552623664','1','1','/Public/Uploads/20180526/5b090cf0e10d9.png','1440','0.01','0.00902778','I152366469','0.00000000'),('15','18888888888','2147483647','微型矿机（赠）','0.00','10.00','2019-03-15 12:21:05','1552623665','1','1','/Public/Uploads/20180526/5b090cf0e10d9.png','1440','0.01','0.00902778','I152366513','0.00000000'),('16','18888888888','2147483647','微型矿机（赠）','0.00','10.00','2019-03-15 12:21:05','1552623665','1','1','/Public/Uploads/20180526/5b090cf0e10d9.png','1440','0.01','0.00902778','I152366593','0.00000000'),('17','18888888888','2147483647','微型矿机（赠）','0.00','10.00','2019-03-15 12:21:05','1552623665','1','1','/Public/Uploads/20180526/5b090cf0e10d9.png','1440','0.01','0.00902778','I152366566','0.00000000'),('18','18888888888','2147483647','微型矿机（赠）','0.00','10.00','2019-03-15 12:21:18','1552623678','1','1','/Public/Uploads/20180526/5b090cf0e10d9.png','1440','0.01','0.00902778','I152367803','0.00000000'),('19','18888888888','2147483647','微型矿机（赠）','0.00','10.00','2019-03-15 12:21:18','1552623678','1','1','/Public/Uploads/20180526/5b090cf0e10d9.png','1440','0.01','0.00902778','I152367878','0.00000000'),('20','18888888888','2147483647','微型矿机（赠）','0.00','10.00','2019-03-15 12:21:18','1552623678','1','1','/Public/Uploads/20180526/5b090cf0e10d9.png','1440','0.01','0.00902778','I152367869','0.00000000'),('21','18888888888','2147483647','微型矿机（赠）','0.00','10.00','2019-03-15 12:21:18','1552623678','1','1','/Public/Uploads/20180526/5b090cf0e10d9.png','1440','0.01','0.00902778','I152367890','0.00000000'),('22','18888888888','2147483647','微型矿机（赠）','0.00','10.00','2019-03-15 12:21:18','1552623678','1','1','/Public/Uploads/20180526/5b090cf0e10d9.png','1440','0.01','0.00902778','I152367870','0.00000000'),('23','18888888888','11','微型矿机','0.00','10.00','2019-06-05 13:53:23','1560072552','1','9','/Public/Uploads/20190324/5c976bf4ecda7.jpg','720','1.00','0.02083333','I051400373','2.07493601'),('24','18888888888','11','中型矿机','0.00','500.00','2019-06-05 14:34:21','1560072552','1','4','/Public/Uploads/20190410/5cad66ff999cd.jpg','1440','50.00','0.52083333','ZS051646179','51.51765013'),('25','18888888888','11','中型矿机','0.00','500.00','2019-06-05 14:45:44','1560072552','1','4','/Public/Uploads/20190410/5cad66ff999cd.jpg','1440','50.00','0.52083333','ZS051714408','51.41898115'),('26','17122178115','14','微型矿机','0.00','10.00','2019-06-05 16:57:32','1559725052','1','9','/Public/Uploads/20190324/5c976bf4ecda7.jpg','720','1.00','0.02083333','I052505271','0.00000000'),('27','15612722035','15','微型矿机','0.00','10.00','2019-06-05 17:00:14','1559725214','1','9','/Public/Uploads/20190324/5c976bf4ecda7.jpg','720','1.00','0.02083333','I052521420','0.00000000'),('28','13888888888','0','大型矿机','0.00','1000.00','2019-06-09 16:11:59','1560067919','1','5','/Public/Uploads/20190410/5cad6709cf08c.jpg','2400','100.00','0.72916667','ZS096791981','0.00000000');/* MySQLReback Separation */
 /* 创建表结构 `ds_product` */
 DROP TABLE IF EXISTS `ds_product`;/* MySQLReback Separation */ CREATE TABLE `ds_product` (
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
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;/* MySQLReback Separation */
 /* 插入数据 `ds_product` */
 INSERT INTO `ds_product` VALUES ('4','3','中型矿机','500.00','998503','50.00','1440','0.52083333','/Public/Uploads/20190410/5cad66ff999cd.jpg','<br />','0','1509817983','100000','100000','0'),('5','3','大型矿机','1000.00','999374','100.00','2400','0.72916667','/Public/Uploads/20190410/5cad6709cf08c.jpg','<br />','0','1509818020','1000000','10000000','0'),('6','3','超级矿机','5000.00','999507','500.00','4320','1.85185185','/Public/Uploads/20190410/5cad671258cac.jpg','<p>
	<br />
</p>','0','1526664588','10000','100000','0'),('9','3','微型矿机','10.00','990287','1.00','720','0.02083333','/Public/Uploads/20190324/5c976bf4ecda7.jpg','<br />','0','1527322722','1000000','1000000','0');/* MySQLReback Separation */
 /* 创建表结构 `ds_qjinbidetail` */
 DROP TABLE IF EXISTS `ds_qjinbidetail`;/* MySQLReback Separation */ CREATE TABLE `ds_qjinbidetail` (
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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='欠钱明细';/* MySQLReback Separation */
 /* 插入数据 `ds_qjinbidetail` */
 INSERT INTO `ds_qjinbidetail` VALUES ('1','0','13242579157','12.00','0.00','12.00','1527386419','交易市场下单','1');/* MySQLReback Separation */
 /* 创建表结构 `ds_role` */
 DROP TABLE IF EXISTS `ds_role`;/* MySQLReback Separation */ CREATE TABLE `ds_role` (
  `id` smallint(6) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL DEFAULT '',
  `pid` smallint(6) DEFAULT NULL,
  `status` tinyint(1) unsigned DEFAULT NULL,
  `remark` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `pid` (`pid`),
  KEY `status` (`status`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;/* MySQLReback Separation */
 /* 插入数据 `ds_role` */
 INSERT INTO `ds_role` VALUES ('1','角色','','1','角色');/* MySQLReback Separation */
 /* 创建表结构 `ds_role_user` */
 DROP TABLE IF EXISTS `ds_role_user`;/* MySQLReback Separation */ CREATE TABLE `ds_role_user` (
  `role_id` mediumint(9) unsigned DEFAULT NULL,
  `user_id` char(32) DEFAULT NULL,
  KEY `group_id` (`role_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;/* MySQLReback Separation */
 /* 创建表结构 `ds_session` */
 DROP TABLE IF EXISTS `ds_session`;/* MySQLReback Separation */ CREATE TABLE `ds_session` (
  `session_id` varchar(255) NOT NULL DEFAULT '',
  `session_expire` int(11) NOT NULL,
  `session_data` blob,
  UNIQUE KEY `session_id` (`session_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;/* MySQLReback Separation */
 /* 创建表结构 `ds_shequn` */
 DROP TABLE IF EXISTS `ds_shequn`;/* MySQLReback Separation */ CREATE TABLE `ds_shequn` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `member` varchar(255) NOT NULL DEFAULT '0',
  `name` varchar(255) DEFAULT NULL,
  `number` varchar(255) DEFAULT NULL,
  `weixin` varchar(255) DEFAULT NULL,
  `QQ` varchar(255) DEFAULT NULL,
  `status` int(11) DEFAULT '0',
  `image` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;/* MySQLReback Separation */
 /* 创建表结构 `ds_sms_log` */
 DROP TABLE IF EXISTS `ds_sms_log`;/* MySQLReback Separation */ CREATE TABLE `ds_sms_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '表id',
  `mobile` varchar(11) DEFAULT '' COMMENT '手机号',
  `session_id` varchar(128) DEFAULT '' COMMENT 'session_id',
  `add_time` int(11) DEFAULT '0' COMMENT '发送时间',
  `code` varchar(10) DEFAULT '' COMMENT '验证码',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;/* MySQLReback Separation */
 /* 插入数据 `ds_sms_log` */
 INSERT INTO `ds_sms_log` VALUES ('1','15172682240','r55vaknp9eb79vdi2thanas5s6','1555058249','462944'),('2','15172682240','r55vaknp9eb79vdi2thanas5s6','1555058320','322618'),('3','15172682240','r55vaknp9eb79vdi2thanas5s6','1555058468','595079'),('4','18616142128','p83pnfc0ro0ievrk3bdjkp9sr3','1559724768','818305'),('5','17122178115','htrghgc987haegnvrjb3n53rn3','1559724860','966417'),('6','15612722035','htrghgc987haegnvrjb3n53rn3','1559725125','303710'),('7','15557110293','m3amf5qcdn6lhtqh4prdd71ik4','1559787603','698187'),('8','15612722035','11','1559999463','873643'),('9','15612722035','11','1559999751','557427'),('10','15556586272','02mco4pthgknhhgafpv084jbd0','1560078770','734239');/* MySQLReback Separation */
 /* 创建表结构 `ds_tousu` */
 DROP TABLE IF EXISTS `ds_tousu`;/* MySQLReback Separation */ CREATE TABLE `ds_tousu` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user` varchar(255) DEFAULT NULL,
  `buser` varchar(255) DEFAULT NULL,
  `text` varchar(255) DEFAULT NULL,
  `date` varchar(255) DEFAULT NULL,
  `zt` int(10) NOT NULL DEFAULT '0',
  `pid` int(11) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;/* MySQLReback Separation */
 /* 创建表结构 `ds_type` */
 DROP TABLE IF EXISTS `ds_type`;/* MySQLReback Separation */ CREATE TABLE `ds_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` char(32) NOT NULL,
  `pid` int(11) NOT NULL DEFAULT '0',
  `path` char(30) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;/* MySQLReback Separation */
 /* 插入数据 `ds_type` */
 INSERT INTO `ds_type` VALUES ('3','系统矿机','0','0');/* MySQLReback Separation */
 /* 创建表结构 `ds_updatenew` */
 DROP TABLE IF EXISTS `ds_updatenew`;/* MySQLReback Separation */ CREATE TABLE `ds_updatenew` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` char(60) NOT NULL DEFAULT '' COMMENT '公告标题',
  `content` text NOT NULL COMMENT '公告内容',
  `addtime` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '添加时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='公告信息表';/* MySQLReback Separation */
 /* 插入数据 `ds_updatenew` */
 INSERT INTO `ds_updatenew` VALUES ('1','公告公告','<p>
	公告公告公告公告公告公告公告公告公告公告公告公告公告公告公告公告公告公告
</p>
<p>
	<br />
</p>
<p>
	<br />
</p>
<p>
	<br />
</p>
<p>
	<br />
</p>','1554873914');/* MySQLReback Separation */
 /* 创建表结构 `ds_user` */
 DROP TABLE IF EXISTS `ds_user`;/* MySQLReback Separation */ CREATE TABLE `ds_user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` char(20) NOT NULL DEFAULT '',
  `password` char(32) NOT NULL DEFAULT '',
  `logtime` int(10) NOT NULL,
  `loginip` char(30) NOT NULL DEFAULT '',
  `lock` tinyint(1) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;/* MySQLReback Separation */
 /* 插入数据 `ds_user` */
 INSERT INTO `ds_user` VALUES ('1','admin','e10adc3949ba59abbe56e057f20f883e','1560088132','61.158.149.50','0');/* MySQLReback Separation */
 /* 创建表结构 `ds_zichandetail` */
 DROP TABLE IF EXISTS `ds_zichandetail`;/* MySQLReback Separation */ CREATE TABLE `ds_zichandetail` (
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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COMMENT='购物券明细';/* MySQLReback Separation */
 /* 插入数据 `ds_zichandetail` */
 INSERT INTO `ds_zichandetail` VALUES ('1','15013029111','50.00','0.00','3038.01','1559484907','0','矿池钱包兑换',''),('2','18888888888','0.00','6.08','3031.94','1559714136','0','释放金额',''),('3','18888888888','0.00','6.06','3025.87','1559918363','0','释放金额',''),('4','15612722035','0.00','2.00','998.00','1560067855','0','释放金额',''),('5','18888888888','50.00','0.00','3075.87','1560076700','0','矿池钱包兑换',''),('6','18888888888','50.00','0.00','3125.87','1560076791','0','矿池钱包兑换','');/* MySQLReback Separation */