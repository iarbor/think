<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:69:"D:\WWW\apache\think\public/../application/index\view\index\index.html";i:1479824526;s:71:"D:\WWW\apache\think\public/../application/index\view\public\header.html";i:1479824065;}*/ ?>
﻿<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<meta name="renderer" content="webkit|ie-comp|ie-stand">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
<meta http-equiv="Cache-Control" content="no-siteapp" />
<LINK rel="Bookmark" href="/favicon.ico" >
<LINK rel="Shortcut Icon" href="/favicon.ico" />
<!--[if lt IE 9]>
<script type="text/javascript" src="lib/html5.js"></script>
<script type="text/javascript" src="lib/respond.min.js"></script>
<script type="text/javascript" src="lib/PIE_IE678.js"></script>
<![endif]-->
<link rel="stylesheet" type="text/css" href="Static/css/min.css" />
<link rel="stylesheet" type="text/css" href="Static/css/admin.css" />
<link rel="stylesheet" type="text/css" href="lib/Hui-iconfont/1.0.7/iconfont.css" />
<link rel="stylesheet" type="text/css" href="lib/icheck/icheck.css" />
<link rel="stylesheet" type="text/css" href="Static/skin/blue/skin.css" id="skin" />
<link rel="stylesheet" type="text/css" href="Static/css/style.css" />
<!--[if IE 6]>
<script type="text/javascript" src="lib/DD_belatedPNG_0.0.8a-min.js" ></script>
<script>DD_belatedPNG.fix('*');</script>
<![endif]-->
<title>湘潭市公积金管理中心网上自助服务平台</title>
<meta name="keywords" content="湘潭市公积金管理中心,湘潭职工公积金查询,公积金证明打印">
<meta name="description" content="湘潭市公积金管理中心,湘潭职工公积金查询,公积金证明打印。">
</head>
<body>
<header class="navbar-wrapper">
	<div class="navbar navbar-fixed-top">
		<div class="container-fluid cl"> <span class="logo navbar-logo f-l mr-10 hidden-xs" >湘潭市公积金管理中心网上自助服务平台</span>  <a aria-hidden="false" class="nav-toggle Hui-iconfont visible-xs" href="javascript:;">&#xe667;</a>
			<nav id="Hui-userbar" class="nav navbar-nav navbar-userbar hidden-xs">
				<ul class="cl">
					<li class="dropDown dropDown_hover"> <a href="#" class="dropDown_A"><?php echo $spname; ?> <i class="Hui-iconfont">&#xe62c;</i></a>

					</li>
					<li id="Hui-msg"> <a href="#" onclick="backxt()" title="退出"><i class="Hui-iconfont" style="font-size:18px">&#xe634;</i></a> </li>
					<li id="Hui-skin" class="dropDown right dropDown_hover"> <a href="javascript:;" class="dropDown_A" title="换肤"><i class="Hui-iconfont" style="font-size:18px">&#xe62a;</i></a>
						<ul class="dropDown-menu menu radius box-shadow">
							<li><a href="javascript:;" data-val="blue" title="默认（蓝色）">默认（蓝色）</a></li>
							<li><a href="javascript:;" data-val="green" title="绿色">绿色</a></li>
							<li><a href="javascript:;" data-val="red" title="红色">红色</a></li>
							<li><a href="javascript:;" data-val="yellow" title="黄色">黄色</a></li>
							<li><a href="javascript:;" data-val="orange" title="绿色">橙色</a></li>
						</ul>
					</li>
				</ul>
			</nav>
		</div>
	</div>
</header>
<aside class="Hui-aside">
	<input runat="server" id="divScrollValue" type="hidden" value="" />
	<div class="menu_dropdown bk_2">
		<dl id="menu-deposit">
			<dt><i class="Hui-iconfont">&#xe616;</i>公积金缴存<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
			<dd>
				<ul>
					<li><a _href="<?php echo url('Qfund/accountInfo'); ?>" data-title="账户信息" href="javascript:void(0)">账户信息</a></li>
					<li><a _href="<?php echo url('Qfund/accountDetail'); ?>" data-title="缴存明细" href="javascript:void(0)">缴存明细</a></li>
				</ul>
			</dd>
		</dl>
		<dl id="menu-loan">
			<dt><i class="Hui-iconfont">&#xe6b7;</i> 公积金贷款<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
			<dd>
				<ul>
					<li><a _href="<?php echo url('Qfund/loanInfo'); ?>" data-title="贷款合同" href="javascript:void(0)">贷款合同</a></li>
					<li><a _href="<?php echo url('qfund/loanDetail'); ?>" data-title="还贷明细" href="javascript:void(0)">还贷明细</a></li>
				</ul>
			</dd>
		</dl>
		<dl id="menu-proof">
			<dt><i class="Hui-iconfont">&#xe652;</i> 打印证明<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
			<dd>
				<ul>
					<li><a _href="<?php echo url('Proof/accountProof'); ?>" data-title="帐户缴存证明" href="javascript:void(0)">帐户缴存证明</a></li>
					<li><a _href="<?php echo url('Proof/loanProof'); ?>" data-title="个人还贷证明" href="javascript:void(0)">个人还贷证明</a></li>
					<li><a _href="<?php echo url('Proof/noloanProof'); ?>" data-title="无贷款证明" href="javascript:void(0)">无贷款证明</a></li>
					<!--
					<li><a _href="<?php echo url('Qfund/allopatryProof'); ?>" data-title="异地贷款证明" href="javascript:void(0)">异地贷款证明</a></li>
					-->	
				</ul>
			</dd>
		</dl>
		<!--
		<dl id="menu-document">
			<dt><i class="Hui-iconfont">&#xe638;</i> 公积金提取<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
			<dd>
				<ul>
					<li><a _href="<?php echo url('Doc/docHelp'); ?>" data-title="公积金提取注意事项" href="javascript:void(0)">注意事项</a></li>
					<li><a _href="<?php echo url('Doc/docBase'); ?>" data-title="个人基本资料" href="javascript:void(0)">基本资料</a></li>
					<li><a _href="<?php echo url('Doc/docList'); ?>" data-title="公积金提取证明资料" href="javascript:void(0)">证明资料</a></li>					
				</ul>
			</dd>
		</dl>
		-->
		<dl id="menu-admin">
			<dt><i class="Hui-iconfont">&#xe62d;</i>系统操作<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
			<dd>
				<ul>
					<li><a _href="<?php echo url('Index/changePassword'); ?>" data-title="修改密码" href="javascript:void(0)">修改密码</a></li>
					<li><a _href="<?php echo url('Login/logout'); ?>" data-title="退出系统" href="javascript:backxt()">退出系统</a></li>

				</ul>
			</dd>
		</dl>
	</div>
</aside>
<div class="dislpayArrow hidden-xs"><a class="pngfix" href="javascript:void(0);" onClick="displaynavbar(this)"></a></div>
<section class="Hui-article-box">
	<div id="Hui-tabNav" class="Hui-tabNav hidden-xs">
		<div class="Hui-tabNav-wp">
			<ul id="min_title_list" class="acrossTab cl">
				<li class="active"><span title="帐户概览" data-href="welcome.html">帐户概览</span><em></em></li>
			</ul>
		</div>
		<div class="Hui-tabNav-more btn-group"><a id="js-tabNav-prev" class="btn radius btn-Default size-S" href="javascript:;"><i class="Hui-iconfont">&#xe6d4;</i></a><a id="js-tabNav-next" class="btn radius btn-default size-S" href="javascript:;"><i class="Hui-iconfont">&#xe6d7;</i></a></div>
	</div>
	<div id="iframe_box" class="Hui-article">
		<div class="show_iframe">
			<div style="display:none" class="loading"></div>
			<iframe scrolling="yes" frameborder="0" src="<?php echo url('welcome'); ?>"></iframe>
		</div>
	</div>
</section>
<script type="text/javascript" src="lib/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript" src="lib/layer/2.1/layer.js"></script>
<script type="text/javascript" src="Static/js/base.js"></script>
<script type="text/javascript" src="Static/js/admin.js"></script>
<script type="text/javascript">
	function backxt(){
     	window.location.replace('<?php echo url('Login/logout'); ?>');
   	}
</script>
</body>
</html>