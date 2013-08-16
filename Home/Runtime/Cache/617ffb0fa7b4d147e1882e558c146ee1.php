<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html>
	<head>
	<link rel="stylesheet" type="text/css" href="__CSS__/common.css" />
	<link rel="stylesheet" type="text/css" href="__CSS__/note_idx.css" />
	<script type="text/javascript" src = "__JS__/common.js"></script>
	<script type="text/javascript" src = "__JS__/note_idx.js"></script>
	<script type="text/javascript" src = "__JS__/jquery-1.9.0.min.js"></script>
	</head>	
	<body>
		<header>
		<div id = "topHeader">
		<div id = "main"><span class = "logo">Marmoset</div>
		<div id = "user"><span class = "usermata"><?php echo ($name); ?>
		<ul id = "userop">
		<li><a href = "__APP__/Login/logout">logout</a></li>
		</ul>
		</span></div>
		</div>
		</header>
		<div id = "frame" class = "center">
			<div id = "navi" class="center">
				<ul id = "ul-navi">
					<li><span onclick='window.location = "__URL__/edit"'>></span></li>
					<li><span onclick='window.location = "__URL__/My_Note"'>E</span></li>
					<li><span>_</span></li>
					<div style="clear: both"></div>
				</ul>
			</div>	
			<div id = "content">
				<ul id = "con-content">
					<?php if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$list): $mod = ($i % 2 );++$i;?><li>
						<span class =  "icon block"><?php echo ($list['note']['time']); ?></span>
						<span class = "title block"><?php echo ($list['note']['title']); ?></span>
						<span class = "op block"><a href = "__URL__/detail/id/<?php echo ($list['note']['id']); ?>">:</a><span style = 'font-size:14px;float:none;font-family: "微软雅黑"'><?php echo ($list['class']['name']); ?></spamn> </span>
						
					</li><?php endforeach; endif; else: echo "" ;endif; ?>
				</ul>
			</div>
		</div>
		
	</body>
</html>