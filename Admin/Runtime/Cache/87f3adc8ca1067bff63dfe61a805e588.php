<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML><html><head><link rel="stylesheet" type="text/css" href="/ThinkPHP__CSS__/common.css"><link rel="stylesheet" type="text/css" href="/ThinkPHP__CSS__/annouce_edit.css"><script type="text/javascript" src = "/ThinkPHP__JS__/common.js"></script><script type="text/javascript" src = "/ThinkPHP__JS__/Annouce_edit.js"></script><script type="text/javascript" src = "/ThinkPHP__JS__/jquery-1.9.0.min.js"></script><link rel="stylesheet" href="/ThinkPHP__JS__/kindeditor/themes/default/default.css" /><link rel="stylesheet" href="/ThinkPHP__JS__/kindeditor/themes/edit/edit.css" /><script charset="utf-8" src="/ThinkPHP__JS__/kindeditor/kindeditor.js"></script><script charset="utf-8" src="/ThinkPHP__JS__/kindeditor/lang/zh_CN.js"></script><script>		var editor;
        KindEditor.ready(function(K) {
                window.editor = K.create('#kindeditor', {
                        themeType : 'edit',
                        uploadJson:'__JS__/kindeditor/php/upload_json.php',
                        fileManagerJson:'__JS__/kindeditor/php/file_manager_json.php',
                        allowFileManager:true
                });

        });
        KindEditor.options.cssData = 'body { font-size: 20px; color:#fff;}';
</script></head><body><div id = "frame"><div id = "editArea"><div id = "option"><div class ="header">				Choose Your Class</div><div class = "mainEdit"><form>				学校：<input type = "text" value = "输入你所在的学校"><br/>				学院：<input type = "text"><br/>				课程：<input type = "text"><br/></form></div><div class = "triangle"></div></div><div id = "editing"><div class = "header">					Loudly,Please!
				</div><div class = "mainEdit"><form name = "edit" action = "__URL__/add" method = "post"><span class = "word">标题</span><input type = "text" id = "title" name = "title"><br/><span class = "word">内容</span><textarea id="kindeditor" name="content" ><?php echo htmlspecialchars($htmlData); ?></textarea><span class = "word" style = "cursor:pointer" onclick = "editor.sync();submit()">发布</span></form></div></div></div></div><div id ="footer"></div></body></html>