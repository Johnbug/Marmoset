
function submitUserData(){
	var oForm = document.login;
	var username = oForm.username;
	var password = oForm.password;		
	var code = oForm.code;
	if(username == ""||password==""||code == ""){
		alert("error");
	}else {
		oForm.submit();
	}
}

