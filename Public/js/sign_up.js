var url = "http://localhost/ThinkPHP/index.php/Join"

function checkSubmit(){
	var t = document.getElementById("sTable");
	var p = t.getElementsByTagName("tr");
	var s = 0,i;
	for(i = 0;i < p.length-1;i ++){
		//console.log(p[i].children[2].innerHTML);
		if(p[i].children[2].innerHTML!="OK"){
			break;
		}
	}
	if(i == p.length-1) return true;
	else return false;
}

function submitUserData(){
	if(checkSubmit()) document.sign_up.submit();
	else {
		var btn = document.getElementById("btn");
		btn.innerHTML = "You didn't finish the whole form!"
	}
}

function check(action,emailData,self){
	var getUrl = url+"/"+action;
	var p = self.parentNode.nextElementSibling;
	console.log(p);
	if(self.value == "") p.innerHTML = "blank";else{
	$.post(getUrl,
		{type:emailData},
		function(data){
		console.log(data);
		if(data == "0"){
			p.innerHTML = "OK";
		}else {
			p.innerHTML = "NO";
		}
	});
	}
}

function checkEmail(self){
	var dataEmail = document.sign_up.email.value;
	var btn = document.getElementById("btn");
	check("checkEmail",dataEmail,self);
	//console.log(checkSubmit());
	if(checkSubmit()) btn.innerHTML = "Click to join us! Welcome "+document.sign_up.username.value;
}
function checkUsername(self){
	var data = document.sign_up.username.value;
	check("checkUsername",data,self);
	//console.log(checkSubmit());
	if(checkSubmit()) btn.innerHTML = "Click to join us! Welcome "+document.sign_up.username.value;
}

function checkPassword(self){
	var p = self.parentNode.nextElementSibling;
	var com = document.sign_up.comfirmPw.value;
	var comp = self.parentNode.parentNode.nextElementSibling.nextElementSibling.childNodes[4];
	if(com!=""&&self.value != ""&&com!=self.value){
		comp.innerHTML = "do not match";
	}else {
	if(self.value != "") {
		p.innerHTML = "OK";
	}else {
		p.innerHTML = "blank";
	}
	}
	//console.log(checkSubmit());
	if(checkSubmit()) btn.innerHTML = "Click to join us! Welcome "+document.sign_up.username.value;
}

function comfirmPassword(self){
	var p = self.parentNode.nextElementSibling;
	if(self.value != ""){
		var pw = document.sign_up.password.value;
		if(pw == ""){
			p.innerHTML = "密码不能为空";
		}else {
			if(self.value == pw){
				p.innerHTML = "OK";
			}else {
				p.innerHTML = "do not match";
			}
		}
	}else {
		p.innerHTML = "blank";
	}
	//console.log(checkSubmit());
	if(checkSubmit()) btn.innerHTML = "Click to join us! Welcome "+document.sign_up.username.value;
}
function checkValidEmail(){
	
}
var state = 0;
function slide(){
	$("span.icon").click(function(){
		if(state == 0){
		$("#sign_up_session").css("display","block");
		var p = 0;
		var timer = setInterval(function(){
			if(p == 560) clearInterval(timer);
			else {
				$("#sign_up_session").css("height",p+"px");
				p += 20;
				window.scrollTo(0,p);
			}
		},30);
		this.innerHTML = "í";
		state = 1;
		}else {
		
		var p = 560;
		var timer = setInterval(function(){
			if(p == 0) {clearInterval(timer);
			$("#sign_up_session").css("display","none");
			}
			else {
				$("#sign_up_session").css("height",p+"px");
				p -= 20;
				window.scrollTo(0,p);
			}
		},30);
		this.innerHTML = "ì";
		state = 0;
		}
	});
}

function getApartment(self){
	var apart = document.getElementById("apartment");
	var d = document.sign_up.apartment;
	d.value = self.innerHTML;
	var td = self.parentNode.parentNode.parentNode.previousElementSibling;
	//console.log(td);
	td.innerHTML = "OK";
	apart.style["display"] = "none";
}

function getApartmentScroll(){
	var apart = document.getElementById("apartment");
	apart.style["display"] = "block";
}

window.onload = function(){
	slide();
}


