<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">



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

</head>

<body style="">



<!-- <div class="page">-->



<!-- 标题栏 -->

<header class="bar bar-nav">



    <a style="position: absolute;z-index: 19;width: 94%;text-align: center;display: inline-block;line-height: 50px;font-size: 1.1rem; color:#FFF;">我的直推</a>    <div class="logo">

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



    <div class="tabs">



        <div class="card">

            <table width="100%" border="0" cellpadding="0" cellspacing="0" id="table-5">

                <thead>

                <tr>

                    <th align="center"><div align="center">会员账号</div></th>

                    <th align="center"><div align="center">姓名</div></th>

                    <th align="center"><div align="center">等级</div></th>



                    <th align="center"><div align="center">直推</div></th>

                    <!-- <th align="center"><div align="center">矿机数量</div></th> -->

                    <th align="center"><div align="center">最近登陆</div></th>

                </tr>

                </thead>

                <tbody>

                <?php if(is_array($list)): foreach($list as $key=>$v): ?><tr>

                    <td align="center"><?php echo ($v["username"]); ?></td>

                    <td align="center"><?php echo ($v["truename"]); ?></td>

                    <td align="center"><?php echo group($v['level']);?></td>



                    <td align="center"><?php echo ($v["ztnum"]); ?></td>

                    <!-- <td align="center"><?php echo ($v["kjnum"]); ?></td> -->

                    <td align="center"><div align="center"><?php echo (friend_date($v["logintime"])); ?></div></td>

                </tr><?php endforeach; endif; ?>

                </tbody>

            </table>

        </div>

    </div>



    <div style="text-align: center"><?php echo ($page); ?></div>

</div>













</body></html>