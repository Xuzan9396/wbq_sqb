<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<title>系统自定义配置</title>

	<meta name="description" content="Static &amp; Dynamic Tables" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />

	<!--basic styles-->

	<link href="__PUBLIC__/css/bootstrap.min.css" rel="stylesheet" />
	<link href="__PUBLIC__/css/bootstrap-responsive.min.css" rel="stylesheet" />
	<link href="__PUBLIC__/css/animate.min.css" rel="stylesheet" />
	<link rel="stylesheet" href="__PUBLIC__/css/font-awesome.min.css" />

	<style type="text/css" title="currentStyle">
		@import "__PUBLIC__/css/TableTools.css";
	</style>

	<!--[if IE 7]>
	<link rel="stylesheet" href="__PUBLIC__/css/font-awesome-ie7.min.css" />
	<![endif]-->

	<!--page specific plugin styles-->

	<!--bbc styles-->

	<link rel="stylesheet" href="__PUBLIC__/css/bbc.min.css" />
	<link rel="stylesheet" href="__PUBLIC__/css/bbc-responsive.min.css" />
	<link rel="stylesheet" href="__PUBLIC__/css/bbc-skins.min.css" />

	<!--[if lte IE 8]>
	<link rel="stylesheet" href="__PUBLIC__/css/bbc-ie.min.css" />
	<![endif]-->

	<!--inline styles if any-->
</head>

<body>
<!--导航-->
<div class="navbar navbar-inverse">
			<div class="navbar-inner">
				<div class="container-fluid">
					<a href="#" class="brand">
						<small>
							<i class="icon-leaf"></i>
							内部销售系统
						</small>
					</a><!--/.brand-->

					<ul class="nav ace-nav pull-right">




						<li class="light-blue user-profile">
							<a data-toggle="dropdown" href="#" class="user-menu dropdown-toggle">
								<img class="nav-user-photo" src="__PUBLIC__/avatars/avatar2.png"/>
								<span id="user_info">
									<small>管理员</small>
									<?php echo (session('adminusername')); ?>
								</span>

								<i class="icon-caret-down"></i>
							</a>

							<ul class="pull-right dropdown-menu dropdown-yellow dropdown-caret dropdown-closer" id="user_menu">
								<li>
									<a href="<?php echo U(GROUP_NAME.'/Index/Logout');?>">
										<i class="icon-off"></i>
										安全退出
									</a>
								</li>
							</ul>
						</li>
					</ul><!--/.ace-nav-->
				</div><!--/.container-fluid-->
			</div><!--/.navbar-inner-->
		</div>
        
        
<style>
#page_search input{ border:0px; background:#ccc;color:#ffffff; margin-left:5px;}
#page_search .current{ background:#005580; color:#ffffff;}
.page a{font-size:16px;}
a.active{ color:#C30 !important; font-size:18px;}

</style>        
        

<div class="container-fluid" id="main-container">
	<a id="menu-toggler" href="#">
		<span></span>
	</a>

	<!--边栏-->
	<div id="sidebar">
<?php $acc = session("_ACCESS_LIST");?>
				<div id="sidebar-shortcuts">
				
					<div id="sidebar-shortcuts-mini">
						<span class="btn btn-success"></span>

						<span class="btn btn-info"></span>

						<span class="btn btn-warning"></span>

						<span class="btn btn-danger"></span>
					</div>
				</div><!--#sidebar-shortcuts-->

				<ul class="nav nav-list">
					<li>
						<a href="<?php echo U(GROUP_NAME.'/Index/index');?>">
							<i class="icon-dashboard"></i>
							<span>首页</span>
						</a>
					</li>
<?php if((isset($acc[strtoupper(GROUP_NAME)][strtoupper('Member')])) or (!empty($_SESSION[C('ADMIN_AUTH_KEY')]))): ?><li sid="Memberuncheck_Membercheck" <?php if(MODULE_NAME == 'Member'): ?>class="open"<?php endif; ?>>
						<a href="#" class="dropdown-toggle">
							<i class="icon-edit"></i>
							<span>会员管理</span>

							<b class="arrow icon-angle-down"></b>
						</a>

						<ul class="submenu" <?php if(MODULE_NAME == 'Member'): ?>style="display: block;"<?php endif; ?>>				
<?php if((isset($acc[strtoupper(GROUP_NAME)][strtoupper('Member')][strtoupper('member_group')])) or (!empty($_SESSION[C('ADMIN_AUTH_KEY')]))): ?><li url="Memberuncheck">
								<a href="<?php echo U(GROUP_NAME.'/Member/member_group');?>">
									<i class="icon-double-angle-right"></i>
									会员等级
								</a>
							</li><?php endif; ?>		


<?php if((isset($acc[strtoupper(GROUP_NAME)][strtoupper('Member')][strtoupper('check')])) or (!empty($_SESSION[C('ADMIN_AUTH_KEY')]))): ?><li url="Membercheck">
								<a href="<?php echo U(GROUP_NAME.'/Member/check');?>">
									<i class="icon-double-angle-right"></i>
									会员列表
								</a>
							</li><?php endif; ?>

	<?php if((isset($acc[strtoupper(GROUP_NAME)][strtoupper('Member')][strtoupper('shequn')])) or (!empty($_SESSION[C('ADMIN_AUTH_KEY')]))): ?><li url="Membercheck">
			<a href="<?php echo U(GROUP_NAME.'/Member/shequn');?>">
				<i class="icon-double-angle-right"></i>
				社群资料审核
			</a>
		</li><?php endif; ?>

<?php if((isset($acc[strtoupper(GROUP_NAME)][strtoupper('Member')][strtoupper('shu_list')])) or (!empty($_SESSION[C('ADMIN_AUTH_KEY')]))): ?><li url="Membercheck">
								<a href="<?php echo U(GROUP_NAME.'/Member/shu_list');?>">
									<i class="icon-double-angle-right"></i>
									团队树形图
								</a>
							</li><?php endif; ?>

	<?php if((isset($acc[strtoupper(GROUP_NAME)][strtoupper('Member')][strtoupper('award')])) or (!empty($_SESSION[C('ADMIN_AUTH_KEY')]))): ?><li url="Memberuncheck">
								<a href="<?php echo U(GROUP_NAME.'/Member/award');?>">
									<i class="icon-double-angle-right"></i>
									赠送矿机
								</a>
							</li><?php endif; ?>

	<?php if((isset($acc[strtoupper(GROUP_NAME)][strtoupper('Member')][strtoupper('awardlist')])) or (!empty($_SESSION[C('ADMIN_AUTH_KEY')]))): ?><li url="Memberuncheck">
								<a href="<?php echo U(GROUP_NAME.'/Member/awardlist');?>">
									<i class="icon-double-angle-right"></i>
									赠送矿机记录
								</a>
							</li><?php endif; ?>
	<?php if((isset($acc[strtoupper(GROUP_NAME)][strtoupper('Member')][strtoupper('qianbaolist')])) or (!empty($_SESSION[C('ADMIN_AUTH_KEY')]))): ?><li url="Memberuncheck">
			<a href="<?php echo U(GROUP_NAME.'/Member/qianbaolist');?>">
				<i class="icon-double-angle-right"></i>
				赠送矿池钱包记录
			</a>
		</li><?php endif; ?>
	<?php if((isset($acc[strtoupper(GROUP_NAME)][strtoupper('Member')][strtoupper('zichanlist')])) or (!empty($_SESSION[C('ADMIN_AUTH_KEY')]))): ?><li url="Memberuncheck">
			<a href="<?php echo U(GROUP_NAME.'/Member/zichanlist');?>">
				<i class="icon-double-angle-right"></i>
				赠送矿池资产记录
			</a>
		</li><?php endif; ?>
	<?php if((isset($acc[strtoupper(GROUP_NAME)][strtoupper('Member')][strtoupper('yuelist')])) or (!empty($_SESSION[C('ADMIN_AUTH_KEY')]))): ?><li url="Memberuncheck">
			<a href="<?php echo U(GROUP_NAME.'/Member/yuelist');?>">
				<i class="icon-double-angle-right"></i>
				赠送可售余额记录
			</a>
		</li><?php endif; ?>

						</ul>
					</li><?php endif; ?>

<?php if((isset($acc[strtoupper(GROUP_NAME)][strtoupper('Shop')])) or (!empty($_SESSION[C('ADMIN_AUTH_KEY')]))): ?><li sid="top"  <?php if(MODULE_NAME == 'Shop'): ?>class="open"<?php endif; ?>>
						<a href="#" class="dropdown-toggle">
							<i class="icon-random"></i>
							<span>矿机管理</span>

							<b class="arrow icon-angle-down"></b>
						</a>

						<ul class="submenu" <?php if(MODULE_NAME == 'Shop'): ?>style="display: block;"<?php endif; ?>>
<?php if((isset($acc[strtoupper(GROUP_NAME)][strtoupper('Shop')][strtoupper('banner')])) or (!empty($_SESSION[C('ADMIN_AUTH_KEY')]))): ?><li url="Memberuncheck">
								<a href="<?php echo U(GROUP_NAME.'/Shop/banner');?>">
									<i class="icon-double-angle-right"></i>
									首页滚动横幅
								</a>
							</li><?php endif; ?>
	<?php if((isset($acc[strtoupper(GROUP_NAME)][strtoupper('Shop')][strtoupper('hdgl')])) or (!empty($_SESSION[C('ADMIN_AUTH_KEY')]))): ?><li url="Memberuncheck">
			<a href="<?php echo U(GROUP_NAME.'/Shop/hdgl');?>">
				<i class="icon-double-angle-right"></i>
				活动管理
			</a>
		</li><?php endif; ?>
<?php if((isset($acc[strtoupper(GROUP_NAME)][strtoupper('Shop')][strtoupper('type_list')])) or (!empty($_SESSION[C('ADMIN_AUTH_KEY')]))): ?><li url="Memberuncheck">
								<a href="<?php echo U(GROUP_NAME.'/Shop/type_list');?>">
									<i class="icon-double-angle-right"></i>
									分类列表
								</a>
							</li><?php endif; ?>	
<?php if((isset($acc[strtoupper(GROUP_NAME)][strtoupper('Shop')][strtoupper('lists')])) or (!empty($_SESSION[C('ADMIN_AUTH_KEY')]))): ?><li url="Memberuncheck">
								<a href="<?php echo U(GROUP_NAME.'/Shop/lists');?>">
									<i class="icon-double-angle-right"></i>
									矿机列表
								</a>
							</li><?php endif; ?>					
<?php if((isset($acc[strtoupper(GROUP_NAME)][strtoupper('Shop')][strtoupper('orderlist')])) or (!empty($_SESSION[C('ADMIN_AUTH_KEY')]))): ?><li url="Memberuncheck">
								<a href="<?php echo U(GROUP_NAME.'/Shop/orderlist');?>">
									<i class="icon-double-angle-right"></i>
									已购矿机
								</a>
							</li><?php endif; ?>							
						</ul>
					</li><?php endif; ?>						
<?php if((isset($acc[strtoupper(GROUP_NAME)][strtoupper('Jinbidetail')])) or (!empty($_SESSION[C('ADMIN_AUTH_KEY')]))): ?><li sid="Bonusindex_Jinbidetailindex_JinbidetailjinbiAddList_Jinzhongzidetailindex" <?php if(MODULE_NAME == 'Jinbidetail'): ?>class="open"<?php endif; ?>>
						<a href="#" class="dropdown-toggle">
							<i class="icon-calendar"></i>
							<span>资金管理</span>

							<b class="arrow icon-angle-down"></b>
						</a>

						<ul class="submenu" <?php if(MODULE_NAME == 'Jinbidetail'): ?>style="display: block;"<?php endif; ?>>
						
<?php if((isset($acc[strtoupper(GROUP_NAME)][strtoupper('Jinbidetail')][strtoupper('csdd')])) or (!empty($_SESSION[C('ADMIN_AUTH_KEY')]))): ?><li url="Jinbidetailindex">
								<a href="<?php echo U(GROUP_NAME.'/Jinbidetail/csdd');?>">
									<i class="icon-double-angle-right"></i>
									出售订单
								</a>
							</li><?php endif; ?>						
<?php if((isset($acc[strtoupper(GROUP_NAME)][strtoupper('Jinbidetail')][strtoupper('qiugou')])) or (!empty($_SESSION[C('ADMIN_AUTH_KEY')]))): ?><li url="Jinbidetailindex">
								<a href="<?php echo U(GROUP_NAME.'/Jinbidetail/qiugou');?>">
									<i class="icon-double-angle-right"></i>
									求购订单
								</a>
							</li><?php endif; ?>	
<?php if((isset($acc[strtoupper(GROUP_NAME)][strtoupper('Jinbidetail')][strtoupper('jiaoyi')])) or (!empty($_SESSION[C('ADMIN_AUTH_KEY')]))): ?><li url="Jinbidetailindex">
								<a href="<?php echo U(GROUP_NAME.'/Jinbidetail/jiaoyi');?>">
									<i class="icon-double-angle-right"></i>
									交易中的订单
								</a>
							</li><?php endif; ?>			
<?php if((isset($acc[strtoupper(GROUP_NAME)][strtoupper('Jinbidetail')][strtoupper('jywc')])) or (!empty($_SESSION[C('ADMIN_AUTH_KEY')]))): ?><li url="Jinbidetailindex">
								<a href="<?php echo U(GROUP_NAME.'/Jinbidetail/jywc');?>">
									<i class="icon-double-angle-right"></i>
									交易完成订单
								</a>
							</li><?php endif; ?>	


	<?php if((isset($acc[strtoupper(GROUP_NAME)][strtoupper('Jinbidetail')][strtoupper('report_order')])) or (!empty($_SESSION[C('ADMIN_AUTH_KEY')]))): ?><li url="Jinbidetailindex">
                    <a href="<?php echo U(GROUP_NAME.'/Jinbidetail/report_order');?>">
                        <i class="icon-double-angle-right"></i>
                        投诉中的订单
                    </a>
                </li><?php endif; ?>
  
  
    
    
    
				
<?php if((isset($acc[strtoupper(GROUP_NAME)][strtoupper('Jinbidetail')][strtoupper('zichandetail')])) or (!empty($_SESSION[C('ADMIN_AUTH_KEY')]))): ?><li url="Jinbidetailindex">
								<a href="<?php echo U(GROUP_NAME.'/Jinbidetail/zichandetail');?>">
									<i class="icon-double-angle-right"></i>
									矿池资产明细
								</a>
							</li><?php endif; ?>

	
<?php if((isset($acc[strtoupper(GROUP_NAME)][strtoupper('Jinbidetail')][strtoupper('qianbaodetail')])) or (!empty($_SESSION[C('ADMIN_AUTH_KEY')]))): ?><li url="Jinbidetailindex">
								<a href="<?php echo U(GROUP_NAME.'/Jinbidetail/qianbaodetail');?>">
									<i class="icon-double-angle-right"></i>
									矿池钱包明细
								</a>
	
						</li><?php endif; ?>	
<?php if((isset($acc[strtoupper(GROUP_NAME)][strtoupper('Jinbidetail')][strtoupper('dongjiedetail')])) or (!empty($_SESSION[C('ADMIN_AUTH_KEY')]))): ?><li url="Jinbidetailindex">
								<a href="<?php echo U(GROUP_NAME.'/Jinbidetail/dongjiedetail');?>">
									<i class="icon-double-angle-right"></i>
									交易冻结明细
								</a>
							</li><?php endif; ?>
	<?php if((isset($acc[strtoupper(GROUP_NAME)][strtoupper('Jinbidetail')][strtoupper('ksyedetail')])) or (!empty($_SESSION[C('ADMIN_AUTH_KEY')]))): ?><li url="Jinbidetailindex">
			<a href="<?php echo U(GROUP_NAME.'/Jinbidetail/ksyedetail');?>">
				<i class="icon-double-angle-right"></i>
				可售余额明细
			</a>

		</li><?php endif; ?>

				
						</ul>
					</li><?php endif; ?>					
					
<?php if((isset($acc[strtoupper(GROUP_NAME)][strtoupper('Info')])) or (!empty($_SESSION[C('ADMIN_AUTH_KEY')]))): ?><li sid="Infoannounce_InfoannType_InfomsgReceive_InfomsgSend" <?php if(MODULE_NAME == 'Info'): ?>class="open"<?php endif; ?>>
						<a href="#" class="dropdown-toggle">
							<i class="icon-list-alt"></i>
							<span>信息交流</span>

							<b class="arrow icon-angle-down"></b>
						</a>

						<ul class="submenu" <?php if(MODULE_NAME == 'Info'): ?>style="display: block;"<?php endif; ?>>
<?php if((isset($acc[strtoupper(GROUP_NAME)][strtoupper('Info')][strtoupper('announce')])) or (!empty($_SESSION[C('ADMIN_AUTH_KEY')]))): ?><li url="Infoannounce">
								<a href="<?php echo U(GROUP_NAME.'/Info/announce');?>">
									<i class="icon-double-angle-right"></i>
									公告管理
								</a>
							</li><?php endif; ?>							
<?php if((isset($acc[strtoupper(GROUP_NAME)][strtoupper('Info')][strtoupper('annType')])) or (!empty($_SESSION[C('ADMIN_AUTH_KEY')]))): ?><li url="InfoannType">
								<a href="<?php echo U(GROUP_NAME.'/Info/annType');?>">
									<i class="icon-double-angle-right"></i>
									公告类别
								</a>
							</li><?php endif; ?>
	<?php if((isset($acc[strtoupper(GROUP_NAME)][strtoupper('Info')][strtoupper('updatenew')])) or (!empty($_SESSION[C('ADMIN_AUTH_KEY')]))): ?><li url="InfoannType">
			<a href="<?php echo U(GROUP_NAME.'/Info/updatenew');?>">
				<i class="icon-double-angle-right"></i>
				更新公告
			</a>
		</li><?php endif; ?>
<?php if((isset($acc[strtoupper(GROUP_NAME)][strtoupper('Info')][strtoupper('msgReceive')])) or (!empty($_SESSION[C('ADMIN_AUTH_KEY')]))): ?><li url="InfomsgReceive">
								<a href="<?php echo U(GROUP_NAME.'/Info/msgReceive');?>">
									<i class="icon-double-angle-right"></i>
									收件箱
								</a>
							</li><?php endif; ?>							
<?php if((isset($acc[strtoupper(GROUP_NAME)][strtoupper('Info')][strtoupper('msgSend')])) or (!empty($_SESSION[C('ADMIN_AUTH_KEY')]))): ?><li url="InfomsgSend">
								<a href="<?php echo U(GROUP_NAME.'/Info/msgSend');?>">
									<i class="icon-double-angle-right"></i>
									发件箱
								</a>
							</li><?php endif; ?>						
						</ul>
					</li><?php endif; ?>			
<?php if((isset($acc[strtoupper(GROUP_NAME)][strtoupper('Rbac')])) or (!empty($_SESSION[C('ADMIN_AUTH_KEY')]))): ?><li sid="Rbacindex_Rbacrole_Rbacnode" <?php if(MODULE_NAME == 'Rbac'): ?>class="open"<?php endif; ?>>
						<a href="#" class="dropdown-toggle">
							<i class="icon-file"></i>
							<span>权限管理</span>

							<b class="arrow icon-angle-down"></b>
						</a>

						<ul class="submenu" <?php if(MODULE_NAME == 'Rbac'): ?>style="display: block;"<?php endif; ?>>
<?php if((isset($acc[strtoupper(GROUP_NAME)][strtoupper('Rbac')][strtoupper('index')])) or (!empty($_SESSION[C('ADMIN_AUTH_KEY')]))): ?><li url="Rbacindex">
								<a href="<?php echo U(GROUP_NAME.'/Rbac/index');?>">
									<i class="icon-double-angle-right"></i>
									管理员列表
								</a>
							</li><?php endif; ?>	
						
<?php if((isset($acc[strtoupper(GROUP_NAME)][strtoupper('Rbac')][strtoupper('role')])) or (!empty($_SESSION[C('ADMIN_AUTH_KEY')]))): ?><li url="Rbacrole">
								<a href="<?php echo U(GROUP_NAME.'/Rbac/role');?>">
									<i class="icon-double-angle-right"></i>
									角色列表
								</a>
							</li><?php endif; ?>	




<!--<?php if((isset($acc[strtoupper(GROUP_NAME)][strtoupper('Rbac')][strtoupper('node')])) or (!empty($_SESSION[C('ADMIN_AUTH_KEY')]))): ?><li url="Rbacnode">
								<a href="<?php echo U(GROUP_NAME.'/Rbac/node');?>">
									<i class="icon-double-angle-right"></i>
									节点列表
								</a>
							</li><?php endif; ?>-->

				
						</ul>
						
					</li><?php endif; ?>	
		
<?php if((isset($acc[strtoupper(GROUP_NAME)][strtoupper('System')])) or (!empty($_SESSION[C('ADMIN_AUTH_KEY')]))): ?><li sid="Logindex_BakbackUp_SystemcustomSetting"  <?php if(MODULE_NAME == 'System'): ?>class="open"<?php endif; ?>>
						<a href="#" class="dropdown-toggle">
							<i class="icon-text-width"></i>
							<span>系统设置</span>

							<b class="arrow icon-angle-down"></b>
						</a>

						<ul class="submenu" <?php if(MODULE_NAME == 'System'): ?>style="display: block;"<?php endif; ?>>
<?php if((isset($acc[strtoupper(GROUP_NAME)][strtoupper('System')][strtoupper('backUp')])) or (!empty($_SESSION[C('ADMIN_AUTH_KEY')]))): ?><li url="BakbackUp">
								<a href="<?php echo U(GROUP_NAME.'/System/backUp');?>">
									<i class="icon-double-angle-right"></i>
									数据备份
								</a>
							</li><?php endif; ?>	
<?php if((isset($acc[strtoupper(GROUP_NAME)][strtoupper('System')][strtoupper('customSetting')])) or (!empty($_SESSION[C('ADMIN_AUTH_KEY')]))): ?><li url="SystemcustomSetting">
								<a href="<?php echo U(GROUP_NAME.'/System/customSetting');?>">
									<i class="icon-double-angle-right"></i>
									自定义配置
								</a>
							</li><?php endif; ?>								
							
						</ul>
					</li><?php endif; ?>					
					
				</ul><!--/.nav-list-->

				<div id="sidebar-collapse">
					<i class="icon-double-angle-left"></i>
				</div>
			</div>

<script type="text/javascript">
	window.jQuery || document.write("<script src='__PUBLIC__/js/jquery-1.9.1.min.js">"+"<"+"/script>");
</script>
<script type="text/javascript">
	$(function() {
		var method = '<?php echo ($_SERVER['PATH_INFO']); ?>';
		var middle = method.split('/')[2];
		var end = method.split('/')[3];

		$('li[sid*='+ middle + end +']').addClass("active open");
		$('li[url*='+ middle + end +']').addClass("active");
	});
</script>

	<div id="main-content" class="clearfix">
		<div id="breadcrumbs">
			<ul class="breadcrumb">
				<li>
					<i class="icon-home"></i>
					<a href="#">Home</a>

					<span class="divider">
								<i class="icon-angle-right"></i>
							</span>
				</li>
				<li class="active">系统设置</li>
			</ul><!--.breadcrumb-->
		</div>

		<div id="page-content" class="clearfix">
			<div class="page-header position-relative">
				<h1> 自定义配置 </h1>
			</div><!--/.page-header-->

			<div class="row-fluid">
				<!--PAGE CONTENT BEGINS HERE-->
				<div class="row-fluid">
					<div class="span10">
						<div class="tabbable">
							<ul class="nav nav-tabs" id="myTab">
								<li class="active">
									<a data-toggle="tab" href="#home">
										<i class="green icon-cogs bigger-110"></i>
										系统参数设置
									</a>
								</li>
								<li>
									<a data-toggle="tab" href="#rechargeconf">
										<i class="green icon-plus-sign-alt  bigger-110"></i>
										交易中心设置
									</a>
								</li>
								<li>
									<a data-toggle="tab" href="#withdrawconf">
										<i class="green icon-credit-card bigger-110"></i>
										K线价格控制
									</a>
								</li>
								<li>
									<a data-toggle="tab" href="#transferconf">
										<i class="green icon-exchange bigger-110"></i>
										推广奖励设置
									</a>
								</li>
								<li>
									<a data-toggle="tab" href="#memberconf">
										<i class="green icon-user  bigger-110"></i>
										短信接口设置
									</a>
								</li>

							</ul>
							<!--奖金配置-->
							<div class="tab-content">
								<div id="home" class="tab-pane in active">
									<form class="form-horizontal" action="<?php echo U(GROUP_NAME.'/System/bonusConf');?>" method="post">
										<div class="control-group">
											<label class="control-label" for="zs_num">注册奖励</label>

											<div class="controls">
												赠送矿池资产<input type="text" id="zs_num" name="zs_num" value="<?php echo ($config["zs_num"]); ?>" style=" width: 50px;" class="span3"/>个&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
												赠送矿机编号<input type="text" id="z_num" name="z_num" value="<?php echo ($config["z_num"]); ?>" style=" width: 50px;" class="span3"/><font color="red">此处填写的是矿机列表的矿机编号</font>
											</div>
<div style="height: 20px"></div>
											<div class="controls" >
												赠送矿机数量<input type="text" id="num" name="num" value="<?php echo ($config["num"]); ?>" style=" width: 50px;" class="span3"/><font color="red">切记，最高只能设置3台，</font>
											</div>
										</div>

										<div class="control-group">
											<label class="control-label" for="dhzcbs">兑换资产的倍数</label>

											<div class="controls">
												<input type="text" id="dhzcbs" name="dhzcbs" value="<?php echo ($config["dhzcbs"]); ?>" style=" width: 50px;" class="span3"/><font color="red">可售余额兑换矿池资产的倍数</font>
											</div>
										</div>
										<div class="control-group">
											<label class="control-label" for="qdzs">每天签到设置</label>

											<div class="controls">
												每天可签到总人数<input type="text" id="qdzs" name="qdzs" value="<?php echo ($config["qdzs"]); ?>" style=" width: 50px;" class="span3"/>人次
												签到奖励<input type="text" id="qdjiangli" name="qdjiangli" value="<?php echo ($config["qdjiangli"]); ?>" style=" width: 50px;" class="span3"/>个矿池钱包
											</div>
										</div>
										<div class="control-group">
											<label class="control-label" for="adurl">推荐链接广告</label>

											<div class="controls">
												<textarea name="adurl" style="width:500px; height:80px;"><?php echo ($config["adurl"]); ?></textarea>这里直接设置推荐人的注册链接：[adurl]
											</div>
										</div>
										<div class="control-group">
											<label class="control-label" for="open_web">是否开启网站</label>

											<div class="controls">
												<select name="open_web" style=" width:100px;">
													<option value="1" <?php if($config['open_web'] == 1): ?>selected="selected"<?php endif; ?>>开启</option>
													<option value="0" <?php if($config['open_web'] == 0): ?>selected="selected"<?php endif; ?>>关闭</option>
												</select>
											</div>
										</div>
										<div class="control-group">
											<label class="control-label" for="open_web_notice">网站关闭提示语</label>

											<div class="controls">
												<input type="text" id="open_web_notice" name="open_web_notice" value="<?php echo ($config["open_web_notice"]); ?>"  class="span3"/>
											</div>
										</div>
										<div class="form-actions">
											<button type="submit" class="btn btn-info no-border">
												<i class="icon-ok bigger-110"></i>
												保存设置
											</button>
										</div>
									</form>
								</div>


								<div id="rechargeconf" class="tab-pane">
									<p>
									<form class="form-horizontal" action="<?php echo U(GROUP_NAME.'/System/jiaoyi');?>" method="post">
										<div class="control-group">
											<label class="control-label" for="jy_open">是否开启交易中心</label>

											<div class="controls">
												<select name="jy_open" style=" width:100px;">
													<option value="1" <?php if($config['jy_open'] == 1): ?>selected="selected"<?php endif; ?>>是</option>
													<option value="0" <?php if($config['jy_open'] == 0): ?>selected="selected"<?php endif; ?>>否</option>
												</select>
											</div>
										</div>
										<div class="control-group">
											<label class="control-label" for="jy_time">交易中心每日开启时间段</label>

											<div class="controls">
												<input type="text" id="jy_time" name="jy_time" value="<?php echo ($config["jy_time"]); ?>"  class="span3"/> (如：08:30-17:40 )
											</div>
										</div>
										<div class="control-group">
											<label class="control-label" for="rmb_hl">一美元</label>

											<div class="controls">
												<input type="text" id="rmb_hl" name="rmb_hl" value="<?php echo ($config["rmb_hl"]); ?>" style=" width: 250px;" class="span3"/>人民币
											</div>
										</div>
										<div class="control-group">
											<label class="control-label" for="mcnum">限制每天出售单数</label>
											<div class="controls">
												<input type="text" id="mcnum" name="mcnum" value="<?php echo ($config["mcnum"]); ?>" style=" width: 150px;" class="span3"/><font color="red">限制交易中心每天可以卖出的单数！</font>
											</div>
										</div>
										<div class="control-group">
											<label class="control-label" for="tousu_time">多少小时后可以投诉</label>

											<div class="controls">
												<input type="text" id="tousu_time" name="tousu_time" value="<?php echo ($config["tousu_time"]); ?>" style=" width: 150px;" class="span3"/>小时
											</div>
										</div>
										<div class="form-actions">
											<button type="submit" class="btn btn-info no-border">
												<i class="icon-ok bigger-110"></i>
												保存设置
											</button>
										</div>
									</form>
									</p>
								</div>




								<div id="withdrawconf" class="tab-pane">
									<p>
									<form class="form-horizontal" action="<?php echo U(GROUP_NAME.'/System/kxian');?>" method="post">

										<div class="control-group">
											<label class="control-label" for="everyday_rose">每日涨幅</label>

											<div class="controls">
												<!-- <input type="text" id="everyday_rose" name="everyday_rose" value="<?php echo ($config["everyday_rose"]); ?>" style=" width: 150px;" class="span3"/><font color="red">交易中心每天的币价固定明天涨的金额</font> -->
												<input type="text" id="everyday_rose" name="everyday_rose" value="<?php echo ($dateToday["price"]); ?>" style=" width: 150px;" class="span3"/><font color="red">设置交易中心币价当天交易的金额</font>
											</div>
										</div>


										<div class="control-group" >
											<label class="control-label" for="everyday_last_time">上次更新时间</label>

											<div class="controls">
												<!-- <input type="text" id="everyday_last_time" name="everyday_last_time" value="<?php echo (date('Y-m-d H:i:s',$config["everyday_last_time"])); ?>" style=" width: 150px;" class="span3"/><font color="red">此处不可随意个更改</font> -->
												<input type="text" id="everyday_last_time" name="everyday_last_time" value="<?php echo (date('Y-m-d H:i:s',$dateToday["date"])); ?>" style=" width: 150px;" class="span3"/><font color="red">此处不可随意个更改</font>
											</div>
										</div>


										<div class="form-actions">
											<button type="submit" class="btn btn-info no-border">
												<i class="icon-ok bigger-110"></i>
												保存设置
											</button>
										</div>
									</form>
									</p>
								</div>





								<div id="transferconf" class="tab-pane">
									<p>
									<form class="form-horizontal" action="<?php echo U(GROUP_NAME.'/System/tuiguang');?>" method="post">

										<div class="control-group" >
											<label class="control-label" for="tjj">团队购买奖励</label>

											<div class="controls">
												一代<input type="text" id="tjj_1" name="tjj_1" value="<?php echo ($config["tjj_1"]); ?>" style=" width: 100px;" class="span3"/>&nbsp;&nbsp;
												二代<input type="text" id="tjj_2" name="tjj_2" value="<?php echo ($config["tjj_2"]); ?>" style=" width: 100px;" class="span3"/>&nbsp;&nbsp;
												三代<input type="text" id="tjj_3" name="tjj_3" value="<?php echo ($config["tjj_3"]); ?>" style=" width: 100px;" class="span3"/>&nbsp;&nbsp;

											</div>
										</div>
										<div class="control-group" >

											<div class="controls">
												四代<input type="text" id="tjj_4" name="tjj_4" value="<?php echo ($config["tjj_4"]); ?>" style=" width: 100px;" class="span3"/>&nbsp;&nbsp;
												五代<input type="text" id="tjj_5" name="tjj_5" value="<?php echo ($config["tjj_5"]); ?>" style=" width: 100px;" class="span3"/>&nbsp;&nbsp;
												六代<input type="text" id="tjj_6" name="tjj_6" value="<?php echo ($config["tjj_6"]); ?>" style=" width: 100px;" class="span3"/>
												<br>
												<font color="red">此处设置6代以内有人购买矿机，可以获得相应的奖励，例如：矿机10矿池钱包，一代奖励0.1，计算方式为10*0.1=1，秒到账可获取自己伞下6代奖励！</font>
											</div>

										</div>
										<div class="control-group" >
											<label class="control-label" for="tjj">社群推广奖励</label>

											<div class="controls">
												社群人数<input type="text" id="sq_num" name="sq_num" value="<?php echo ($config["sq_num"]); ?>" style=" width: 100px;" class="span3"/>&nbsp;&nbsp;
												直推人数<input type="text" id="zhitui" name="zhitui" value="<?php echo ($config["zhitui"]); ?>" style=" width: 100px;" class="span3"/>&nbsp;&nbsp;
												矿池钱包<input type="text" id="qianbao" name="qianbao" value="<?php echo ($config["qianbao"]); ?>" style=" width: 100px;" class="span3"/>&nbsp;&nbsp;
											</div>
										</div>
									<div class="control-group" >

										<div class="controls">
									矿池资产<input type="text" id="sq_zc" name="sq_zc" value="<?php echo ($config["sq_zc"]); ?>" style=" width: 100px;" class="span3"/>&nbsp;&nbsp;
									矿机编号<input type="text" id="sq_id" name="sq_id" value="<?php echo ($config["sq_id"]); ?>" style=" width: 100px;" class="span3"/>&nbsp;&nbsp;
									矿机个数<input type="text" id="sqkj_num" name="sqkj_num" value="<?php echo ($config["sqkj_num"]); ?>" style=" width: 100px;" class="span3"/>&nbsp;&nbsp;
											<br>
											<font color="red">设置0即不赠送，这里设置与下面社群备注内容一致！</font>

										</div>
							</div>
									<div class="control-group">
										<label class="control-label" for="sqbz">社群备注内容</label>

										<div class="controls">
											<textarea name="sqbz" style="width:500px; height:80px;"><?php echo ($config["sqbz"]); ?></textarea>这里的内容显示在前台社群奖励界面
										</div>
									</div>
										<div class="form-actions">
											<button type="submit" class="btn btn-info no-border">
												<i class="icon-ok bigger-110"></i>
												保存设置
											</button>
										</div>
									</form>
									</p>
								</div>








								<!--会员配置-->
								<div id="memberconf" class="tab-pane">
									<p>
									<form class="form-horizontal" action="<?php echo U(GROUP_NAME.'/System/memberConf');?>" method="post">
										<div class="control-group">
											<label class="control-label" for="code_apikey">极速apikey</label>

											<div class="controls">
												<input type="text" id="code_apikey" name="code_apikey" value="<?php echo ($config["CODE_APIKEY"]); ?>" class="span3"/><span class="help-inline"></span>
											</div>
										</div>

										<div class="control-group">
											<label class="control-label" for="code_cf">短信禁止重复发送时间</label>

											<div class="controls">
												<input type="text" id="code_cf" name="code_cf" value="<?php echo ($config["CODE_CF"]); ?>" class="span3"/><span class="help-inline">秒</span>
											</div>
										</div>
										<div class="control-group">
											<label class="control-label" for="code_gq">短信验证过期时间</label>

											<div class="controls">
												<input type="text" id="code_gq" name="code_gq" value="<?php echo ($config["CODE_GQ"]); ?>" class="span3"/><span class="help-inline">秒</span>
											</div>
										</div>
										<div class="control-group">
											<label class="control-label" for="memberlogin">是否允许会员登入</label>

											<div class="controls">
												<input type="radio" value="on" <?php if($config['MEMBER_LOGIN'] == 'on'): ?>checked="checked"<?php endif; ?> name="memberlogin">
												<span class="lbl">允许</span>
												&nbsp;
												<input type="radio" value="off" <?php if($config['MEMBER_LOGIN'] == 'off'): ?>checked="checked"<?php endif; ?> name="memberlogin">
												<span class="lbl">禁止</span>
											</div>
										</div>
										<hr>

										<div class="form-actions">
											<button type="submit" class="btn btn-info no-border">
												<i class="icon-ok bigger-110"></i>
												保存设置
											</button>
										</div>
									</form>
									</p>
								</div>

							</div>
						</div>
					</div><!--/span-->
				</div><!--/row-->
				<!--PAGE CONTENT ENDS HERE-->
			</div><!--/row-->
		</div><!--/#page-content-->
	</div><!--/#main-content-->
</div><!--/.fluid-container#main-container-->

<a href="#" id="btn-scroll-up" class="btn btn-small btn-inverse">
	<i class="icon-double-angle-up icon-only bigger-110"></i>
</a>

<!--basic scripts-->
<script src="__PUBLIC__/js/jquery-1.9.1.min.js"></script>

<script src="__PUBLIC__/js/bootstrap.min.js"></script>

<!--page specific plugin scripts-->
<script src="__PUBLIC__/js/bootbox.min.js"></script>
<script src="__PUBLIC__/js/jquery.dataTables.min.js"></script>
<script src="__PUBLIC__/js/jquery.dataTables.bootstrap.js"></script>.
<script src="__PUBLIC__/js/TableTools.min.js"></script>
<!--bbc scripts-->

<script src="__PUBLIC__/js/bbc-elements.min.js"></script>
<script src="__PUBLIC__/js/bbc.min.js"></script>

<script src="__PUBLIC__/js/bootstrap.notification.js"></script>
<script src="__PUBLIC__/js/jquery.easing.1.3.js"></script>
<!--inline scripts related to this page-->
</body>
</html>