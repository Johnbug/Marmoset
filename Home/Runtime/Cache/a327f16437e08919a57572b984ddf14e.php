<?php if (!defined('THINK_PATH')) exit();?><html>
<head>
<link rel="stylesheet" type="text/css" href="__CSS__/welcome.css">
<script type="text/javascript" src = "__JS__/welcome.js"></script>
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
		<div id = "note">
		<div class = "over">笔记</div>
		<div class = "top">
			<span class = "logo">é</span>
		</div>
		</div>
		<div id = "annouce">
		<div class = "over">公告</div>
		<div class = "top">
		<span class = "logo">9</span>
		</div>

		</div>
		<div id = "answer">
		<div class = "over">问答</div>
		<div class = "top">
        <span class = "logo">Ý</span>
		</div>
		</div>

		<div id = "footer">
		
		</div>
	</div>
</body>
</html>