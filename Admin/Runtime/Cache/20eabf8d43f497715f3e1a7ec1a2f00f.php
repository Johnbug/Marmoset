<?php if (!defined('THINK_PATH')) exit();?><html><head><title>Management Center</title><load href='/ThinkPHP__CSS__/welcome.css'><link rel="stylesheet" type="text/css" href="/ThinkPHP__CSS__/common.css" /><link rel="stylesheet" type="text/css" href="/ThinkPHP__CSS__/transdmin.css" /><script type="text/javascript" src="/ThinkPHP__JS__/welcome.js"></script><script type="text/javascript" src="/ThinkPHP__JS__/common.js"></script><script type="text/javascript" src="/ThinkPHP__JS__/jquery-1.9.0.min.js"></script><script>	$(function(){
		$('.subMenuTitle a[href="#"]').next('ul').hide();
		$('.subMenuTitle a[href="#"]').click(function() {
			$(this).next('ul').toggle();
		});
	})
	</script></head><body><div id = "topHeader"><div id = "main"><span class = "logo2">Management Center</div><div id = "user"><span class = "usermata"><?php echo ($name); ?><ul id = "userop"><li><a href = "__APP__/Login/logout2">logout</a></li></ul></span></div><!-- // #end user --></div><!-- // #end topHeader --><div class="clear"></div><div id="wrapper"><div id="container"><div id="sidebar"><ul class="sideNav"><li class="subMenuTitle"><a href="#">Note Management</a><ul><li class="subMenu"><a href="../Note/index.html" target="right">Note Message</a></li><li class="subMenu"><a href="../Note/edit.html" target="right">Add Note</a></li></ul></li></ul><ul class="sideNav"><li class="subMenuTitle"><a href="#">Announcement Management</a><ul><li class="subMenu"><a href="../Announcement/index.html" target="right">Announcement Message</a></li><li class="subMenu"><a href="../Announcement/edit.html" target="right">Add Announcement</a></li></ul></li></ul><ul class="sideNav"><li class="subMenuTitle"><a href="#">User Management</a><ul><li class="subMenu"><a href="../User/index.html" target="right">User Message</a></li><li class="subMenu"><a href="../User/add.html" target="right">Add User</a></li></ul></li></ul><ul class="sideNav"><li class="subMenuTitle"><a href="#">Administrator Management</a><ul><li class="subMenu"><a href="../Administrator/index.html" target="right">Administrator Message</a></li><li class="subMenu"><a href="../Administrator/add.html" target="right">Add Administrator</a></li></ul></li></ul></div><!-- // #sidebar --><div id="page"><iframe  width="75%" scrolling="auto" height="550px" allowtransparency="true" style="border: medium none;" id="rightMain" name="right"></iframe></div><!-- // #page --><div class="clear"></div></div><!-- // #container --></div><!-- // #wrapper --></body></html>