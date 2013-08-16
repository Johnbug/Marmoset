<?php if (!defined('THINK_PATH')) exit();?><html>
<head>
<link rel="stylesheet" type="text/css" href="__CSS__/welcome.css">
<link rel="stylesheet" type="text/css" href="__CSS__/common.css">
<script type="text/javascript" src = "__JS__/welcome.js"></script>
<script type="text/javascript" src = "__JS__/common.js"></script>
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
		<div class = "top" style = "background-color:#872211">
		</div>
		<span class = "logo1"><a href = "__APP__/Note/index">é</a></span>
		</div>
		<div id = "annouce">
		<div class = "over">公告</div>
		<div class = "top" style = "background-color:#2599a0">
		</div>
			<span class = "logo1"><a href = "__APP__/Annouce/index">9</a></span>
		</div>
		<div id = "footer">
		</div>
	</div>
</body>
</html>