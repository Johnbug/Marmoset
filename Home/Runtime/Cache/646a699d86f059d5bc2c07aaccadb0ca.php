<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html>
<head>
<link rel="stylesheet" type="text/css" href="__CSS__/common.css">
<link rel="stylesheet" type="text/css" href="__CSS__/annouce_edit.css">
<script type="text/javascript" src = "__JS__/common.js"></script>
<script type="text/javascript" src = "__JS__/Annouce_edit.js"></script>
<script type="text/javascript" src = "__JS__/jquery-1.9.0.min.js"></script>

<link rel="stylesheet" href="__JS__/kindeditor/themes/default/default.css" />
<link rel="stylesheet" href="__JS__/kindeditor/themes/edit/edit.css" />
<script charset="utf-8" src="__JS__/kindeditor/kindeditor.js"></script>
<script charset="utf-8" src="__JS__/kindeditor/lang/zh_CN.js"></script>

<script>
		var editor;
        KindEditor.ready(function(K) {
                window.editor = K.create('#kindeditor', {
                        themeType : 'edit',
                        uploadJson:'__JS__/kindeditor/php/upload_json.php',
                        fileManagerJson:'__JS__/kindeditor/php/file_manager_json.php',
                        allowFileManager:true
                });

        });
        KindEditor.options.cssData = 'body { font-size: 20px; color:#fff;}';
</script>
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
					<form name = "edit" action = "__URL__/add" method = "post">
						<span class = "word">标题</span>
						<input type = "text" id = "title" name = "title"><br/>
						<span class = "word">内容</span>
						<textarea id="kindeditor" name="content" >
							<?php echo htmlspecialchars($htmlData); ?>
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