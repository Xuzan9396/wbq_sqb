<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<!-- saved from url=(0041)http://www.xxx.com/Home/Index/index -->

<html xmlns="http://www.w3.org/1999/xhtml"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">



	<meta name="robots" content="noindex,nofollow">

	<meta name="robots" content="noarchive">

	<!-- 屏蔽-->

	<title>IOX
-COIN</title>

	<meta name="keywords" content=" ">

	<meta name="viewport" content="initial-scale=1, maximum-scale=1">

	<meta name="apple-mobile-web-app-capable" content="yes">

	<meta name="apple-mobile-web-app-status-bar-style" content="black">

	<meta content="IE=9; IE=EDGE" http-equiv="X-UA-Compatible">

	<link rel="stylesheet" href="/Public/ybt/css/sm.css">

	<script src="/Public/ybt/js/jquery-1.10.2.min.js"></script>



	<link rel="stylesheet" href="/Public/ybt/css/sm-extend.css">



	<link rel="stylesheet" href="/Public/ybt/css/iconfont.css">

	<!--自定义-->

	<link rel="stylesheet" href="/Public/ybt/css/main.css">

	<link rel="stylesheet" href="/Public/ybt/css/order.css">

	<!-- 变量声明  -->



	<link rel="stylesheet" href="/Public/ybt/sy/css/style.css">

	<script type="text/javascript" src="/Public/ybt/sy/js/TouchSlide.1.1.js"></script>

	<script src="/Public/ybt/js/layer.js"></script>

</head>

<body style="">

<!--弹出公告-->

<!--弹出公告-->

<div class="page">



	<!-- 标题栏 -->

	<header class="bar bar-nav">



		<a style="position: absolute;z-index: 19;width: 94%;text-align: center;display: inline-block;line-height: 50px;font-size: 1.1rem; color:#FFF;">会员中心</a>    <div class="logo">

		<a id="cancle" href="javascript:history.go(-1)"><i class="icon icon-left"></i></a>    </div>

		<a class="icon pull-right open-panel"></a>

	</header>

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

		<!-- Slider -->

		<div id="slideBox" class="slideBox">

			<div class="bd">

				<ul>

					<?php if(is_array($banner_list)): foreach($banner_list as $key=>$vo): ?><li>

							<a class="pic" href="#"><img src="<?php echo ($vo['path']); ?>" style="height:300 px;"/></a>

						</li><?php endforeach; endif; ?>

				</ul>

			</div>

			<div class="hd">

				<ul></ul>

			</div>

		</div>



		<div class="row" style="margin-left:0px;">

			<div class="main_menu_bg"><a href="<?php echo U('Index/Shop/qiandao');?>"><img src="/Public/ybt/image/hot.png"><span>我要签到</span></a>

			</div>

			<div class="main_menu_bg"><a href="<?php echo U('Index/new/news');?>"><img src="/Public/ybt/image/duihuan.png"><span>新闻公告</span></a>

			</div>



			<div class="main_menu_bg"><a href="<?php echo U('Account/tgm');?>"><img src="/Public/ybt/image/qiandao.png"><span>推广二维码</span></a>

			</div>

			<div class="main_menu_bg"><a href="javascript:alert('暂未开放，敬请期待！');"><img src="/Public/ybt/image/dingdan.png"><span>在线客服</span></a>

			</div>

		</div>





		<div class="row" style="margin-left:0px;">

			<div class="main_now_tab">

				<div class="now_title">矿机商城</div>

				<div class="content-padded lobby-nav">

					<?php if(is_array($typeData)): foreach($typeData as $key=>$ty): ?><li>

							<span><img src="<?php echo ($ty["thumb"]); ?>" height="150"></span>

							<div class="title_shop"><?php echo ($ty["title"]); ?><br>

								产量/小时：<?php echo ($ty["shouyi"]); ?></div>

							<div class="price_shop">



								<font style="color:#F00">价格：<?php echo ($ty["price"]); ?>矿池钱包</font>

							</div>

							<div class="price_shop"><a href="<?php echo U('Index/Shop/buy',array('id'=>$ty['id']));?>" class="button button-fill button-warning" style="width:80%; margin:0 auto">立即租用</a></div>

						</li><?php endforeach; endif; ?>

				</div>

			</div>

		</div>

	</div>



</div>





<script type="text/javascript">

    TouchSlide({

        slideCell:"#slideBox",

        titCell:"#slideBox .hd ul",

        mainCell:"#slideBox .bd ul",

        effect:"leftLoop",

        autoPage:true,

        autoPlay:true,

        interTime:3000



    });

</script>



</body></html>