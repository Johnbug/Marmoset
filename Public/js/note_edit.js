function select(self,action){
	var p = self.parentNode.parentNode.previousElementSibling;
	p.value = self.innerHTML;
	if(action == 1)selectClass(p.value);
}
var url = "http://localhost/ThinkPHP/index.php/Note/getClass";
function selectClass(apart){
	var noteClass = document.getElementById("note-class");
	noteClass.style["display"] = "block";
	
	$.post(url,{apartment:apart},function(data){
		if($("div#note-class").children().length == 0) $("div#note-class").append("<ul></ul>");
		else {
			$("div#note-class ul").remove();
			$("div#note-class").append("<ul></ul>");
		}
		console.log(data);
		data = JSON.parse(data);
		if(data != null) {
		for(var i = 0;i < data.length;i ++){
			$("div#note-class ul").append('<li onclick = "select(this,0)">'+data[i]["name"]+"</li>");
		}
		}
		else {
			$("div#note-class ul").append("<li>没有课程</li>");
		}
	});
}
window.onload = function(){
	topHeaderUser();
}