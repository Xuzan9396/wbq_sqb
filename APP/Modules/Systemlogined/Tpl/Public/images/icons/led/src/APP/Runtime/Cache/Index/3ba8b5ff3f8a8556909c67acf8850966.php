<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!-- saved from url=(0049)http://www.xxx.com/Home/Myuser/jihuo2/zt/0/ -->
<html xmlns="http://www.w3.org/1999/xhtml"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

	<meta name="robots" content="noindex,nofollow">
	<meta name="robots" content="noarchive">
	<!-- 屏蔽-->
	<title>EBT
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
</head>
<body style="">

<!--    <div class="page">-->

<!-- 标题栏 -->
<header class="bar bar-nav">

	<a style="position: absolute;z-index: 19;width: 94%;text-align: center;display: inline-block;line-height: 50px;font-size: 1.1rem; color:#FFF;">我的矿机</a>    <div class="logo">
	<a id="cancle"><i class="icon icon-left"></i></a>    </div>
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


<script type="text/javascript">
    $(function() {
        $("#cancle").click(function() {
            $.router.back();
        });
    });
</script>

<div class="content" id="main_content">


	<div class="buttons-tab">
		<a href="<?php echo U('Index/Shop/orderlist');?>" class="active button">正常矿机(<?php echo ($kjnum); ?>)</a>
		<a href="<?php echo U('Index/Shop/daoqi');?>" class=" button">到期矿机</a>


	</div>

	<div class="tabs">

		<div class="card">
			<table width="100%" border="0" cellpadding="0" cellspacing="0" id="table-5">
				<thead>
				<tr>
					<th colspan="2" align="center"><div align="center">矿机类型</div></th>
					<th align="center"><div align="center">运行时间</div></th>
					<th align="center"><div align="center">已领取</div></th>
					<th align="center"><div align="center">状态</div></th>
					<th align="center"><div align="center">编号</div></th>
				</tr>
				</thead>
				<tbody>
				<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
					<td align="center" valign="middle">
						<a href="<?php echo U('Index/Shop/show?id='.$vo['id']);?>"><img src="<?php echo ($vo["imagepath"]); ?>" width="60"></a>
					</td>
					<td align="center" valign="middle"><a href="<?php echo U('Index/Shop/show?id='.$vo['id']);?>"><?php echo ($vo["project"]); ?><br>
						预计<?php echo ($vo["kjsl"]); ?>/小时</a></td>
					<td align="center" valign="middle"><?php echo (set_number($vo["a_time"],'0')); ?>/<?php echo ($vo["yxzq"]); ?></td>
					<td align="center" valign="middle"><?php echo (four_number($vo["already_profit"])); ?></td>
					<td align="center" valign="middle">正常</td>
					<td align="center" valign="middle"><?php echo ($vo["kjbh"]); ?></td>
				</tr><?php endforeach; endif; else: echo "" ;endif; ?>
				</tbody></table>
		</div>
	</div>
<?php if($vo['zt'] != 0): ?><span><a class="button button-big button-fill button-success js-tixian-submit" href="<?php echo U('Shop/jiesuan');?>">一键领取</a></span><?php endif; ?>
	<div style="text-align: center"><?php echo ($page); ?></div>
<br>






</body></html>