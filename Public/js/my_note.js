function if_no_note(){
	if($("#main").children().length == 0){
		$("#main").append('<div class = "no_note"><span class = "no_warning">You have no notes here! <br/>Go <a href = "http://localhost/ThinkPHP/index.php/Note/edit">EDIT</a> to create a new one!</span><br /></div>');
	}
}

function Ajax_delete(id,self){
	var url = "http://localhost/ThinkPHP/index.php/Note/deleteNote/id/"+id;
	var res;
	//console.log(self);
	
	var footer = self.parentNode.parentNode;
	$(footer).append('<div class = "comfirm">确定要删除吗？<br/><br /><br /><span class = "option">确定</span><span class = "option">取消</span></div>');
	
	var Com = $(footer).children()[2];
	var btnSure = $(Com).children()[3];
	var btnCancel = $(Com).children()[4];
	
	$(btnSure).click(function(){
		jQuery.get(url,function(data){
			var res = JSON.parse(data);
			//console.log(res["val"]);
			if(res["return"]) {
				$("#left_side_bar").before(res["val"]);
				var _parentElement = self.parentNode.parentNode.parentNode;
				$(_parentElement).remove();
			}
			setTimeout(function(){
				$("div.success").remove();
				$("div.failed").remove();
			},2000);
			window.location.reload();
		});
	});

	$(btnCancel).click(function(){
		$(Com).remove();
	});	
	
}

window.onload = function(){
	if_no_note();
}
