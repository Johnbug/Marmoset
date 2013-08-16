function Ajax_delete(id,self){
	var url = "http://localhost/ThinkPHP/index.php/Annouce/deleteAnnouce/id/"+id;
	//console.log(url);
	var res;

	comfirm(self);

	var cCom = $(self).prev();

	var btnOk = $(cCom).children()[1];
	var btnCancel = $(cCom).children()[2];
	$(btnOk).click(function(){
		jQuery.get(url,function(data){
			res = JSON.parse(data);
			$("#frame").before(res["val"]);
			if(res["return"]) {
				var _parentElement = self.parentNode.parentNode;
				$(_parentElement).remove();
			}
			setTimeout(function(){
				$("div.success").remove();
				$("div.failed").remove();
			},2000);
			window.location.reload();
		})
		$(cCom).remove();
	});

	$(btnCancel).click(function(){
		$(cCom).remove();
	});	
}

function comfirm(self){
	var parent = self.parentNode;
	$(self).before('<div class = "comfirm"><span class = "ques">Are you sure to delete?</span><span class = "radio">确定</span> <span class = "radio">取消</span></div>');
}

function no_annouce(){
	if($("#mes_dialog").children().length == 0){
		$("#mes_dialog").remove();
		$("#message").append('<div class = "no_annouce"><span class = "no_warning">You have no annoucement here! <br/>Go <a href = "http://localhost/ThinkPHP/index.php/Annouce/edit">EDIT</a> to create a new one!</span><br /><span class = "no_icon">"</span></div>');
	}
}

window.onload = function(){
	no_annouce();
	topHeaderUser();
}