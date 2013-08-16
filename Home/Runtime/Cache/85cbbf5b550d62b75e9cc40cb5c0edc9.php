<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html>
<head>
	<link rel="stylesheet" type="text/css" href="__CSS__/sign_up.css">
	<link rel="stylesheet" type="text/css" href="__CSS__/common.css">
	<script type="text/javascript" src = "__JS__/sign_up.js"></script>
	<script type="text/javascript" src = "__JS__/jquery-1.9.0.min.js"></script>
</head>
<body>
	<div class = "logo">Marmoset</div>
	<div id = "sign_up">
	<h1>Welcome to Join Us</h1>
	<div class = "display">
		<span class="icon">ì</span>
	</div>
	</div>
	<div id = "sign_up_session">
		<div id = "sign_up_area">
			<div id = "sign_up_form">
				<form name = "sign_up" method="post" action="__URL__/signUp">
					<table class = "sign_up_table" id = "sTable">
					<tr>
					<td class="bg"><span>用户名</span></td><td><input name = "username" type="text" class = "sign_up" onblur="checkUsername(this)"/></td>
					<td></td>
					</tr>
					<tr>
					<td class="bg"><span>邮箱</span></td><td><input name = "email" type = "email" class = "sign_up" onblur="checkEmail(this)"/> </td>
					<td></td>
					</tr>
					<tr>
					<td class="bg"><span>密码</span></td><td><input name = "password" type = "password" class = "sign_up" onblur="checkPassword(this)"/> </td>
					<td></td>
					</tr>
					<tr>
					<td class="bg"><span>确认密码</span></td><td><input name="comfirmPw" type="password" class = "sign_up" onblur="comfirmPassword(this)"/></td>
					<td></td>
					</tr>
					<tr>
					<td class="bg"><span>学院</span></td><td><input name = "apartment" type = "text" class = "sign_up" onfocus="getApartmentScroll()"/></td>
					<td></td>
					<td><div id = "apartment">
						<ul id = "apartul">
						<?php if(is_array($apartment)): $i = 0; $__LIST__ = $apartment;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$data): $mod = ($i % 2 );++$i;?><li onclick = "getApartment(this)"><?php echo ($data["name"]); ?></li><?php endforeach; endif; else: echo "" ;endif; ?>
						</ul>
					</div></td>
					</tr>
					<tr>
					<td class="bg"><span>验证码</span></td><td><input type="text" name="code" class = "sign_up_shorten"/>
					<img src="__APP__/Public/verify" onclick='this.src=this.src+"?"+Math.random()'/></td>
					<td></td>
					</tr>
					</table>
				</form>
			</div>
		</div>
		<div id = "sign_up_warm" >
				Do you Know? <br />You will be No. <span class = "number"><?php echo ($cnt+1); ?></span> Marmoset!  
		</div>
		
		<div style = "clear:both"></div>
		<div id = "btn" class= "join center" onclick="submitUserData()">Complete the whole form!</div>
	</div>
	<div id = "sign_footer">
		<br />
		<br />
		Knowledge is not power until it is shared!<br />
		welcome to Marmoset<br />
		<br />
		<span class = "log"><a href = "__APP__/Login">我已经是marmoset</a></span>
	</div>
</body>
</html>