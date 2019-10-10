<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

	<meta name="robots" content="noindex,nofollow">
	<meta name="robots" content="noarchive">
	<!-- 屏蔽-->
	<title>会员中心</title>
	<meta name="keywords" content="">
	<meta name="viewport" content="initial-scale=1, maximum-scale=1">
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="apple-mobile-web-app-status-bar-style" content="black">
	<meta content="IE=9; IE=EDGE" http-equiv="X-UA-Compatible">
	<link rel="stylesheet" href="/Public/ybt/css/sm.css">
	<script src="/Public/ybt/js/jquery-1.10.2.min.js"></script>
	<link rel="stylesheet" href="/Public/ybt/css/sm-extend.css">
	<link rel="stylesheet" href="/Public/ybt/css/iconfont.css">
	<link rel="stylesheet" href="/Public/ybt/css/main.css">
	<link rel="stylesheet" href="/Public/ybt/css/order.css">
	<!-- 变量声明  -->

</head>
<body style="">
<div class="page">
	<!-- 标题栏 -->
	<header class="bar bar-nav"><a style="position: absolute;z-index: 19;width: 94%;text-align: center;display: inline-block;line-height: 50px;font-size: 1.1rem; color:#FFF;">会员中心</a>
		<div class="logo"><a id="cancle" href="javascript:history.go(-1)"><i class="icon icon-left"></i></a></div>
		<a class="icon pull-right open-panel"></a></header>
	<nav class="foot-bar">
		<div class="foot-menu"><a href="<?php echo U('Index/Emoney/shouye');?>">
			<i class="iconfont icon-shouye"></i><span>首页</span></a></div>
		<div class="foot-menu"><a href="<?php echo U('Index/Shop/orderlist');?>">
			<i class="iconfont icon-wxbmingxingdianpu"></i><span>我的矿机</span></a></div>
		<div class="foot-menu"><a href="<?php echo U('Index/Account/myAccount');?>">
			<i class="iconfont icon-gouwuche"></i><span>我的团队</span></a></div>
		<div class="foot-menu"><a href="<?php echo U('Index/Emoney/index');?>">
			<i class="iconfont icon-wxbdingwei"></i><span>交易平台</span></a></div>
		<div class="foot-menu"><a href="/">
			<i class="iconfont icon-geren"></i><span>会员中心</span></a></div>
	</nav>

	<div class="content" id="main_content">
		<div class="info-top">
			<div class="uphoto"><img src="/Public/ybt/image/user1.png"></div>
			<div class="uinfo">
				<p>用户编号：<?php echo ($minfo["username"]); ?></p>
				<p>用户等级：<?php
 if($ljmrl>=10000){ $level = 7; echo '八级矿工'; }else if($ljmrl>=5600){ $level = 6; echo '七级矿工'; }else if($ljmrl>=2800){ echo '六级矿工'; $level = 5; }else if($ljmrl>=1200){ echo '五级矿工'; $level = 4; }else if($ljmrl>=600){ echo '四级矿工'; $level = 3; }else if($ljmrl>=300){ echo '三级矿工'; $level = 2; }else if($ljmrl>=50){ echo '二级矿工'; $level = 1; }else{ echo '一级矿工'; $level = 0; } M('member')->where(array('id' => $minfo['id']))->save(array('level'=>$level)); ?>
				</p>
				<p>直推人数：<?php echo ($ztnum); ?></p>
				<p>团队人数：<?php echo ($tdnum); ?></p>
			</div>
		</div>
		<div class="my-qiandao" style="width:100%;">
			<div class="row-box clearfix"><a class="col-xs-3 sub-tab" style="border:0px;"><span class="num_qiandao"><?php echo (two_number($minfo["ksye"])); ?></span>
				<p class="subtitle">可售余额</p>
			</a><a class="col-xs-3 sub-tab"><span class="num_qiandao"><?php echo (two_number($minfo["ksed"])); ?></span>
				<p class="subtitle">可售额度</p>
			</a><a class="col-xs-3 sub-tab"><span class="num_qiandao"><?php echo ($ljmrl); ?></span>
				<p class="subtitle">累计买量</p>
			</a></div>
		</div>
		<div class="my-qiandao" style="width:100%; background:#0e696d">
			<div class="row-box clearfix"><a class="col-xs-3 sub-tab" style="border:0px;"><span class="num_qiandao"><?php echo (two_number($jytj11)); ?></span>
				<p class="subtitle">交易冻结</p>
			</a><a class="col-xs-3 sub-tab"><span class="num_qiandao"><?php echo (two_number($ljcl)); ?></span>
				<p class="subtitle">总收益</p>
			</a><a class="col-xs-3 sub-tab"><span class="num_qiandao"><?php echo ($yxkj); ?>台</span>
				<p class="subtitle">有效矿机</p>
			</a></div>
		</div>
		<div class="my-qiandao" style="width:100%; background:#0e696d">
			<div class="row-box clearfix"><a class="col-xs-3 sub-tab" style="border:0px;"><span class="num_qiandao"><?php echo (two_number($minfo["jinbi"])); ?></span>
				<p class="subtitle">矿池钱包</p>
			</a><a class="col-xs-3 sub-tab"><span class="num_qiandao"><?php echo (two_number($minfo["kczc"])); ?></span>
				<p class="subtitle">矿池资产</p>
			</a><a class="col-xs-3 sub-tab"><span class="num_qiandao"><?php echo ($minfo["teamgonglv"]); ?></span>
				<p class="subtitle">团队算力</p>
			</a></div>
		</div>

		<style>
			.info-list{margin-bottom: 1px; height:auto;}
			.info-list li{height:100%;padding: 20px 0 19px 0; border-bottom: 1px solid #efeff4;margin-top:0px;}
		</style>
		<ul>
			<div class="info-list">
				<li><a href="<?php echo U('Index/Shop/qiandao');?>"><img src="/Public/ybt/image/info-jsbz.png"><span>我要签到</span></a></li>
				<li><a href="<?php echo U('Account/dhgl');?>"><img src="/Public/ybt/image/info-zhuan.png"><span>兑换管理</span></a></li>
				<li><a href="<?php echo U('Account/kczc');?>"><img src="/Public/ybt/image/info-jsbz.png"><span>矿池资产</span></a></li>
				<li><a href="<?php echo U('Account/hdjl');?>"><img src="/Public/ybt/image/info-score.png"><span>活动奖励</span></a></li>

				<li><a href="<?php echo U('Account/jiefeng');?>"><img src="/Public/ybt/image/info-pass.png"><span>账户解封</span></a></li>
				<li><a href="<?php echo U('Account/tuiguangma');?>"><img src="/Public/ybt/image/info-code.png"><span>推广文案</span></a></li>
				<li><a href="<?php echo U('Financial/keshou');?>"><img src="/Public/ybt/image/info-tgbz.png"><span>财务明细</span></a></li>

				<li><a href="<?php echo U('Account/shoukuanma');?>"><img src="/Public/ybt/image/info-update.png"><span>实名认证</span></a></li>
				<li><a href="<?php echo U('Account/grzl');?>"><img src="/Public/ybt/image/info-pass.png"><span>个人资料</span></a></li>

				<li><a href="<?php echo U('Account/sqjl');?>"><img src="/Public/ybt/image/info-tuandui.png"><span>社群奖励</span></a></li>
				<li><a href="<?php echo U('Index/new/news');?>"><img src="/Public/ybt/image/info-out.png"><span>系统消息</span></a></li>

				<li><a href="<?php echo U('Account/gonggao');?>"><img src="/Public/ybt/image/info-update.png"><span>更新公告</span></a></li>
			</div>

			<iframe src="<?php echo U('Index/Account/resource');?>" id="iframepage" name="iframepage" frameborder="0" marginheight="0" marginwidth="0" width="100%" onload="iFrameHeight()" height="340"></iframe>
			<script type="text/javascript" language="javascript">
                function iFrameHeight() {
                    var ifm= document.getElementById("iframepage");
                    var subWeb = document.frames ? document.frames["iframepage"].document : ifm.contentDocument;
                    if(ifm != null && subWeb != null) {
                        ifm.height = subWeb.body.scrollHeight;
                        // ifm.width = subWeb.body.scrollWidth;
                    }
                }
			</script>

			<div class="content-block" style="margin:10px;">
				<div class="row">
					<div class="col-100">

						<a href="<?php echo U('Index/Index/logout');?>" class="button button-big button-fill button-success" style="width: 100%;" onclick="if(confirm('确认退出登录吗？')==false)return false;">退出登录</a>
					</div>
				</div>
			</div>
		</ul>

	</div>
</div>

</body></html>