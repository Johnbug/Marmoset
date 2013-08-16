<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html>
<head>
<link rel="stylesheet" type="text/css" href="__CSS__/common.css">
<link rel="stylesheet" type="text/css" href="__CSS__/note_edit.css">
<script type="text/javascript" src = "__JS__/common.js"></script>
<script type="text/javascript" src = "__JS__/note_edit.js"></script>
<script type="text/javascript" src = "__JS__/jquery-1.9.0.min.js"></script>

<link rel="stylesheet" href="__JS__/kindeditor/themes/default/default.css" />
<link rel="stylesheet" href="__JS__/kindeditor/themes/edit/edit.css" />
<script charset="utf-8" src="__JS__/kindeditor/kindeditor.js"></script>
<script charset="utf-8" src="__JS__/kindeditor/lang/zh_CN.js"></script>

<script>
		var editor;
        KindEditor.ready(function(K) {
                window.editor = K.create('#kindeditor', {
                        uploadJson:'__JS__/kindeditor/php/upload_json.php',
                        fileManagerJson:'__JS__/kindeditor/php/file_manager_json.php',
                        allowFileManager:true
                });
        });
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
		<form name = "edit" action="__URL__/updateData" method="post">
		<input type = "hidden" name = "id" value = "<?php echo ($data['note']['id']); ?>">
		<div id = "edit-title">
			<span class  = "title">Title</span><input type = "text" name = "title" class = "text-style" value = "<?php echo ($data["note"]["title"]); ?>"/>
			<span class = "action hand" onclick="editor.sync();submit();"> Publish</span><span class = "action hand"> Return</span>
		</div>
		<div id = "edit-content">
			<textarea id="kindeditor" name="content" >
							<?php echo htmlspecialchars($htmlData); ?>
							<?php echo ($data["note"]["content"]); ?>
			</textarea>
		</div>
		<div id = "edit-info">
			<span>学院</span><input type="text" name = "apartment"/>
			<div id = "note-apart">
				<ul>
					<?php if(is_array($apartmentdata)): $i = 0; $__LIST__ = $apartmentdata;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$data): $mod = ($i % 2 );++$i;?><li onclick = "select(this,1)"><?php echo ($data['name']); ?></li><?php endforeach; endif; else: echo "" ;endif; ?>
				</ul>
			</div>
			<span>课程</span><input type="text" name  = "class"/>
			<div id = "note-class">
			</div>
		</div>
		</form>
	</div>
</body>
</html>