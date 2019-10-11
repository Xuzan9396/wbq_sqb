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



    <!--如果你用到了拓展包中的组件，还需要引用下面两个-->

    <link rel="stylesheet" href="/Public/ybt/css/sm-extend.css">



    <!--图标-->

    <link rel="stylesheet" href="/Public/ybt/css/iconfont.css">

    <!--自定义-->



    <link rel="stylesheet" href="/Public/ybt/css/main.css">

    <link rel="stylesheet" href="/Public/ybt/css/order.css">



</head>

<body style="">



<!--  <div class="page">-->



<!-- 标题栏 -->

<header class="bar bar-nav">



    <a style="position: absolute;z-index: 19;width: 94%;text-align: center;display: inline-block;line-height: 50px;font-size: 1.1rem; color:#FFF;">活动详情</a>    <div class="logo">

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





<!-- Main Container start -->

<div class="content" id="main_content">



    <style type="text/css">

        body{ background: #FFF;}

        .li_touxiang img {

            width: 80px;

            height: 80px;

            border-radius: 50%;

        }

    </style>

    <div class="list-block">

            <ul>

                <li>

                    <div class="item-content">

                        <div class="item-media"><i class="icon icon-form-name"></i></div>

                        <div class="item-inner">

                            <div class="item-title label">活动名称</div>

                            <div style="margin-top: -0.4rem;margin-bottom: -0.35rem;-webkit-box-flex: 1;color:#8c9aa0">

                                <?php echo ($list["name"]); ?>

                            </div>

                        </div>

                    </div>

                </li>

                <li>

                    <div class="item-content">

                        <div class="item-media"><i class="icon icon-form-name"></i></div>

                        <div class="item-inner">

                            <div class="item-title label">购买数量</div>

                            <div style="margin-top: -0.4rem;margin-bottom: -0.35rem;-webkit-box-flex: 1;color:#8c9aa0">

                                <?php echo ($list["num"]); ?>

                            </div>

                        </div>

                    </div>

                </li>

                <li>

                    <div class="item-content">

                        <div class="item-media"><i class="icon icon-form-name"></i></div>

                        <div class="item-inner">

                            <div class="item-title label">赠送矿池</div>

                            <div style="margin-top: -0.4rem;margin-bottom: -0.35rem;-webkit-box-flex: 1;color:#8c9aa0">

                                <?php echo ($list["zszc"]); ?>



                            </div>

                        </div>

                    </div>

                </li>

                <li>

                    <div class="item-content">

                        <div class="item-media"><i class="icon icon-form-name"></i></div>

                        <div class="item-inner">

                            <div class="item-title label">赠送矿机</div>

                            <div style="margin-top: -0.4rem;margin-bottom: -0.35rem;-webkit-box-flex: 1;color:#8c9aa0">

                                <?php echo ($kjname); ?>



                            </div>

                        </div>

                    </div>

                </li>

                <li>

                    <div class="item-content">

                        <div class="item-media"><i class="icon icon-form-name"></i></div>

                        <div class="item-inner">

                            <div class="item-title label">赠送矿机数量</div>

                            <div style="margin-top: -0.4rem;margin-bottom: -0.35rem;-webkit-box-flex: 1;color:#8c9aa0">

                                <?php echo ($list["kj_num"]); ?>



                            </div>

                        </div>

                    </div>

                </li>

                <li>

                    <div class="item-content">

                        <div class="item-media"><i class="icon icon-form-name"></i></div>

                        <div class="item-inner">

                            <div class="item-title label">开始时间</div>

                            <div style="margin-top: -0.4rem;margin-bottom: -0.35rem;-webkit-box-flex: 1;color:#8c9aa0">

                                <?php echo (date('Y-m-d H:i:s',$list["addtime"])); ?>



                            </div>

                        </div>

                    </div>

                </li>

                <li>

                    <div class="item-content">

                        <div class="item-media"><i class="icon icon-form-name"></i></div>

                        <div class="item-inner">

                            <div class="item-title label">结束时间</div>

                            <div style="margin-top: -0.4rem;margin-bottom: -0.35rem;-webkit-box-flex: 1;color:#8c9aa0">

                                <?php echo (date('Y-m-d H:i:s',$list["endtime"])); ?>



                            </div>

                        </div>

                    </div>

                </li>



            </ul>

    </div>

    <div class="content-block">

            <div class="col-50">

                <a href="<?php echo U('Account/lqjl',array('id'=>$list['id']));?>" class="button button-big button-fill button-success js-tixian-submit" style="width: 100%;">领取奖励</a>

            </div>

    </div>



</div>













</body></html>