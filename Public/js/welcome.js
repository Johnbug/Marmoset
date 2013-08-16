var timer = [null,null,null];
var obj = [null,null,null];
function over(self,t,action){
	var oDiv = self.getElementsByTagName("div")[0];
	clearInterval(timer[t]);
	var s = action*0.1;
	var op;
	var delay;
	if(action == 1) {
		op = 0;
		delay = 60;
	}
	else {
		op = 1;
		delay = 50;
	}
	timer[t] = setInterval(function(){
		if(action == 1){
			if(op >= 1) {
				clearInterval(timer[t]);
				
			}else {
				oDiv.style["display"] = "block";
				oDiv.style["opacity"] = op;
				//console.log(op);
				op += s;
			}
		}else{
			if(op <= 0) {
				clearInterval(timer[t]);
				oDiv.style["display"] = "none";
			}else {
				oDiv.style["opacity"] = op;
				op += s;
				//console.log(op);
			}
		}
	},delay);
}



window.onload = function(){
	obj[0] = document.getElementById("note");
	obj[1] = document.getElementById("annouce");
	obj[2] = document.getElementById("answer");
	obj[0].onmouseover = function(){
		over(this,0,-1);
	}
	obj[1].onmouseover = function(){
		over(this,1,-1);
	}
	obj[0].onmouseout = function(){
		over(this,0,1);
	}
	obj[1].onmouseout = function(){
		over(this,1,1);
	}
	topHeaderUser();
}
