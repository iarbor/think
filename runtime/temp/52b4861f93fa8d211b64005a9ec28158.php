<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:67:"D:\WWW\apache\think\public/../app/index\view\qfund\accountinfo.html";i:1478187334;}*/ ?>
﻿
<extend name="Public/body"/>
<block name="title">公积金缴存账户信息</block>
<block name="nav">
<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 公积金缴存 <span class="c-gray en">&gt;</span> 账户信息 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav></block>
<block name="page">
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
</div></block>