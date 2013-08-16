<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html>
	<head>
	<link rel="stylesheet" type="text/css" href="__CSS__/common.css" />
	<link rel="stylesheet" type="text/css" href="__CSS__/my_note.css" />
	<script type="text/javascript" src = "__JS__/common.js"></script>
	<script type="text/javascript" src = "__JS__/my_note.js"></script>
	<script type="text/javascript" src = "__JS__/jquery-1.9.0.min.js"></script>
	</head>
	<body>
		<div id = "left_side_bar">
			<div id = "header">
				<div class = "logo">Marmoset</div>
			</div>
			<div id = "user">
				<div class = "userPhoto center"><img src="__IMAGE__/User/zard.jpg" width="160px" height="160px" />
				</div>
				<span class="plain center transform"><?php echo ($user['user']['username']); ?><br /></span>
				<span class = "plain center transform"><?php echo ($user['aprt']['name']); ?><br /></span>
				<span class="plain center transform"><?php echo ($user['school']['name']); ?><br /></span>
			</div>
			<div id = "pages"></div>
		</div>
		<div id = "main">  
			<?php if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$list): $mod = ($i % 2 );++$i;?><div class = "mynote">
					<div class = "title"> <span class = "date"><span class="adjust"><?php echo ($list['note']['time']); ?></span></span><?php echo ($list['note']['title']); ?></div>
					<div class = "content">
					<?php echo ($list['note']['content']); ?>
					</div>
					<div class = "footer">
						<div class = "operation">
							<span class = "op hand transform" onclick="Ajax_delete(<?php echo ($list['note']['id']); ?>,this)">删除</span>
							<span class = "op hand transform" onclick='window.location = "__URL__/update/id/<?php echo ($list['note']['id']); ?>"'>编辑</span>
							<span class = "op hand transform" onclick='window.location = "__URL__/detail/id/<?php echo ($list['note']['id']); ?>"'>查看</span>
						</div>
						<div class = "info">
							<span>Knowledge is not power until it is shared By Johnbug</span>
						</div>
					</div>
				</div><?php endforeach; endif; else: echo "" ;endif; ?>
		</div>
	</body>
</html>