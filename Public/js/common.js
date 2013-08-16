function topHeaderUser(){
	$("div#topHeader div#user span.usermata").click(function(){
		$("div#topHeader div#user span.usermata ul#userop").css("display","block");
	});
	var userop = document.getElementById("userop");
	userop.onmouseover = function(){
		this.style["display"] = "block";
		
	}
	userop.onmouseout = function(){
		this.style["display"] = "none";
		
	}
	var op = userop.getElementsByTagName("li");
	for(var i = 0;i < op.length;i ++){
		var l = op[i];
		l.onmouseover = function(){
			this.style["background-color"] = "#ccc";
		}
		l.onmouseout = function(){
			this.style["background-color"] = "#fff";
			
		}
	}
}