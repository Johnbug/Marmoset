<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html>
	<head>
	<link rel="stylesheet" type="text/css" href="__CSS__/common.css" />
	<link rel="stylesheet" type="text/css" href="__CSS__/note_detail.css" />
	<script language="javascript">
  window.onload=function()
  {
     var oimg=document.getElementById("img0");
	 var odiv3=document.getElementById("div3");
	 var omenu1=document.getElementById("menu1");
	 var omenu2=document.getElementById("menu2");
	 var omenu3=document.getElementById("menu3");
	 var src2=["__IMAGE__/logo/cursordown.png","__IMAGE__/logo/cursorup.png"];
	 var i=0;
	 oimg.onclick=function()
	 {
		 if(i==0)
		 {
			setTimeout("menu1.style.display='block'",25);
			setTimeout("menu2.style.display='block'",125);
			setTimeout("menu3.style.display='block'",225);
		 }
	//	   odiv3.style.display="block";
		  else
		  {
			setTimeout("menu3.style.display='none'",25);
			setTimeout("menu2.style.display='none'",125);
			setTimeout("menu1.style.display='none'",225);
		  }
		   i++;
		   oimg.src=src2[i%=2];
	 }
	 function a(t1)
	 {
        
		 odiv[t1].style.display="block";
		 // alert(odiv[t1]);

	 }
	 
  }
</script>
	</head>	
	<body>
		<div id="div1">
   <div id="div2">
   <img id="img0" src="__IMAGE__/logo/cursordown.png" />
   </div>
   <div id="div3">
     <div id="menu1" onclick = 'window.location = "__APP__/Index"'>首页</div>
	 <div id="menu2" onclick = 'window.location = "__APP__/Note"'>笔记</div>
	 <div id="menu3" onclick = 'window.location = "__APP__/Annouce"'>公告</div>
   </div>
 </div>
		<div id= "detail-frame" class = "center">
			<div id= "detail-title">
				<?php echo ($data['note']['title']); ?>
			</div>
			<div id= "detail-content">
				<?php echo ($data['note']['content']); ?>
			</div>
			<div id = "detail-footer">
				<span class= "icon">Ü</span><span class = "word"><?php echo ($data['user']['username']); ?></span>
			</div>
		</div>
		<div id = "detail-admire" class="center">
			<span class = "icon">B</span>
			<span class = "word1">Knowledge</span><br />
			<span class= "word2">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;is not </span>
			<span class = "word1">power</span><br />
			<span class = "word3">&nbsp;until you </span>
			<span class = "word1">share</span>
			<span class = "word3">them</span>
			<span class = "icon">C<span><br />
		</div>
	</body>
</html>