<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html>
<head>
<link rel="stylesheet" type="text/css" href="__CSS__/common.css">
<link rel="stylesheet" type="text/css" href="__CSS__/annouce_edit.css">
<script type="text/javascript" src = "__JS__/common.js"></script>
<script type="text/javascript" src = "__JS__/jquery-1.9.0.min.js"></script>
<link rel="stylesheet" href="__JS__/kindeditor/themes/default/default.css" />
<link rel="stylesheet" href="__JS__/kindeditor/themes/edit/edit.css" />
	<script charset="utf-8" src="__JS__/kindeditor/kindeditor.js"></script>
	<script charset="utf-8" src="__JS__/kindeditor/lang/zh_CN.js"></script>
	<script type="text/javascript" src = "__JS__/Annouce_update.js"></script>
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
			<div class = "icon">?</div>
			Make Some Noise.
		</div>
		<div id = "editArea">
			<div id = "option">
				<div class ="header">
				Choose Your Class</div>
				<div class = "mainEdit">
				<form>
				学校：<input type = "text" value = "输入你所在的学校"><br/>
				学院：<input type = "text"><br/>
				课程：<input type = "text"><br/>
				</form>
				</div>
				<div class = "triangle"></div>
			</div>
			<div id = "editing">
				<div class = "header">
					Loudly,Please!
				</div>
				<div class = "mainEdit">
					<form name = "edit" action = "__URL__/updateData" method = "post">
						<span class = "word">标题</span>
						<input type = "hidden" name = "id" value = "<?php echo ($data['annoucement']['id']); ?>">
						<input type = "text" id = "title" name = "title" value =  "<?php echo ($data['annoucement']['title']); ?>"><br/>
						<span class = "word">内容</span>
						<textarea id="kindeditor" name="content" >
							<?php echo htmlspecialchars($htmlData); ?>
							<?php echo ($data['annoucement']['content']); ?>
						</textarea>
						<span class = "word" style = "cursor:pointer" onclick = "editor.sync();submit()">发布</span>
						<span class = "word" style = "cursor:pointer" onclick = "window.location = 'http://localhost/ThinkPHP/index.php/Annouce/'">返回</span>
					</form>
				</div>
			</div>
		</div>
	</div>
	<div id ="footer"></div>
</body>
</html>