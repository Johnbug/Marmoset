<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html>
<head>
	<script type="text/javascript">
		var cnt = 5;
		var timer = setInterval(function(){
			if(cnt > 0){
				cnt --;
			}else {
				clearInterval(timer);
				window.location = "http://localhost/ThinkPHP/index.php/Annouce/edit";
			}
		},1000);
	</script>
</head>
<body>
	Failed!
	5 秒后跳转回公告编辑。
</body>
</html>