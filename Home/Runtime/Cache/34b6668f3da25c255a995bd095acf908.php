<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html>
<head>
<link rel="stylesheet" type="text/css" href="__CSS__/common.css">
<link rel="stylesheet" type="text/css" href="__CSS__/bubble.css">
<link rel="stylesheet" type="text/css" href="__CSS__/annouce_myannouce.css">
<script type="text/javascript" src = "__JS__/common.js"></script>
<script type="text/javascript" src = "__JS__/Annouce_myannouce.js"></script>
<script type="text/javascript" src = "__JS__/jquery-1.9.0.min.js"></script>
</head>
<body>
	<div id = "topHeader">
		<div id = "main"><span class = "logo">Marmoset</div>
		<div id = "user"><span class = "usermata"><?php echo ($name); ?>
		<ul id = "userop">
		<li><a href = "__APP__/Login/logout">logout</a></li>
		</ul>
		</span></div>
	</div>
	<div id = "frame">
		<div id = "title">
			<div class = "icon">E</div>
			You Have Changed Things A Lot.
		</div>
		<div id = "content">
			<div id = "message">
				<ul id = "mes_dialog">
				<?php if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$list): $mod = ($i % 2 );++$i;?><li><div class = "triangle"></div>
					<div class = "lHeader">
					<span class = "op hand" onclick = "Ajax_delete(<?php echo ($list['annoucement']['id']); ?>,this)">ã</span>
					<span class = "op hand" onclick = "window.location = '__URL__/update/id/<?php echo ($list['annoucement']['id']); ?>'">`</span>
					<h3><?php echo ($list['annoucement']['title']); ?></h3>
					</div>
					<div class = "lContent">
					<?php echo ($list['annoucement']['content']); ?>
					</div>
					<div class = "readmore hand transform" onclick = "window.location = '__URL__/detail/id/<?php echo ($list['annoucement']['id']); ?>'">read more</div>
					<div class = "lFooter">
					author:<?php echo ($list['user']['username']); ?>from :<?php echo ($list['apartment']['name']); ?> <?php echo ($list['school']['name']); ?><br/>
					</div>
				</li><?php endforeach; endif; else: echo "" ;endif; ?>
				</ul>
			</div>
			<div style = "clear:both"></div>
		</div>
		<div style = "clear:both"></div>
	</div>
	<div id = "footer">
	</div>
</body>
</html>