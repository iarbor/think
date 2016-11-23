<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:67:"D:\WWW\apache\think\public/../app/index\view\Qfund\accountInfo.html";i:1479831889;s:61:"D:\WWW\apache\think\public/../app/index\view\Public\body.html";i:1479832251;s:63:"D:\WWW\apache\think\public/../app/index\view\Public\header.html";i:1479832105;s:63:"D:\WWW\apache\think\public/../app/index\view\Public\footer.html";i:1479832136;}*/ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta charset="utf-8">
<meta name="renderer" content="webkit|ie-comp|ie-stand">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
<meta http-equiv="Cache-Control" content="no-siteapp" />
<LINK rel="Bookmark" href="/favicon.ico" >
<LINK rel="Shortcut Icon" href="/favicon.ico" />
<!--[if lt IE 9]>
<script type="text/javascript" src="/lib/html5.js"></script>
<script type="text/javascript" src="/lib/respond.min.js"></script>
<script type="text/javascript" src="/lib/PIE_IE678.js"></script>
<![endif]-->
<link rel="stylesheet" type="text/css" href="/static/css/min.css" />
<link rel="stylesheet" type="text/css" href="/static/css/admin.css" />
<link rel="stylesheet" type="text/css" href="/lib/Hui-iconfont/1.0.7/iconfont.css" />
<link rel="stylesheet" type="text/css" href="/lib/icheck/icheck.css" />
<link rel="stylesheet" type="text/css" href="/static/skin/blue/skin.css" id="skin" />
<link rel="stylesheet" type="text/css" href="/static/css/style.css" />
<!--[if IE 6]>
<script type="text/javascript" src="/lib/DD_belatedPNG_0.0.8a-min.js" ></script>
<script>DD_belatedPNG.fix('*');</script>
<![endif]-->
<title>公积金缴存账户信息</title>
</head>
<body>
<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 公积金缴存 <span class="c-gray en">&gt;</span> 账户信息 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>

<div class="page-container">
	<p class="f-20 text-success">公积金账户信息</p>	
	<table class="table table-border table-bordered table-bg" id="baseInfo">
		<thead>
			<tr>
				<th class="c-primary" colspan="6" scope="col">基本信息</th>
			</tr>			
		</thead>
		<tbody>		
			<tr>
				<th class="c-primary tips"  align="right" >职工账号</th>
				<td  ><?php echo $person['spcode']; ?>&nbsp;</td>
				<th class="c-primary tips"  align="right">职工姓名</th>
				<td  ><?php echo $person['spname']; ?>&nbsp;</td>               	
				<th class="c-primary tips"  align="right">汇缴状态</th>
				<td ><p><?php echo $person['hjstatus']; ?> &nbsp;</p></td>
			</tr>
			<tr>  
				<td class="c-primary tips " align="right">单位账号</th>
				<td ><?php echo $person['sncode']; ?>&nbsp;</td>
				<th class="c-primary tips" align="right">单位名称</th>
				<td colspan="3" ><?php echo $person['snname']; ?>&nbsp;</td>
			</tr>
			<tr>
				<th class="c-primary tips" align="right">身份证号</th>
				<td><?php echo $person['spidno']; ?>&nbsp;</td>
				<th class="c-primary tips" align="right">手机号码</th>
				<td>       <?php echo $person['sjh']; ?>&nbsp;</td>
				<th class="c-primary tips" align="right">公积金卡</th>
				<td><?php echo $person['cardno']; ?>&nbsp;</td>
			</tr>
			<tr>
				<th class="c-primary tips" align="right">开户日期</th>
				<td><?php echo $person['spkhrq']; ?>&nbsp;</td>
				<th class="c-primary tips" align="right">缴至年月</th>
				<td>&nbsp;<?php echo $person['spjym']; ?></td>
				<th class="c-primary tips" align="right">缴存比例</th>
				<td>&nbsp;个人<?php echo $person['spsingl']; ?>%/单位<?php echo $person['spjcbl']; ?>%</td>
			</tr>
			<tr> 
				<th class="c-primary tips" align="right">月缴额</th>
				<td><?php echo number_format($person['spmfact'],2); ?>&nbsp;元</td>
				<th class="c-primary tips" align="right">公积金余额</th>
				<td colspan="3"><?php echo number_format($person['spmend'],2); ?>&nbsp;元</td>
			</tr>			
		</tbody>
	</table>	
</div>
<script type="text/javascript" src="/lib/jquery/jquery-1.10.2.min.js"></script> 
<script type="text/javascript" src="/lib/jquery/jquery.form.js"></script> 
<script type="text/javascript" src="/lib/layer/2.1/layer.js"></script> 
<script type="text/javascript" src="/lib/icheck/jquery.icheck.min.js"></script> 
<script type="text/javascript" src="/lib/My97DatePicker/WdatePicker.js"></script> 
<script type="text/javascript" src="/lib/datatables/1.10.0/jquery.dataTables.min.js"></script> 
<script type="text/javascript" src="/static/js/base.js"></script> 
<script type="text/javascript" src="/static/js/admin.js"></script> 
<script type="text/javascript" src="/lib/printArea/jquery.PrintArea.js"></script> 
<footer class="footer mt-20">
	<div class="container">
		<p>Copyright &copy;2016 湘潭市住房公积金管理中心 All Rights Reserved.</p>
	</div>
</footer>


</body>
</html>