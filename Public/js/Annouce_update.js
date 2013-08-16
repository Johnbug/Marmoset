var clickCnt = 0;

function option(){
	$("div.triangle").click(function(){
		if(clickCnt % 2 == 0){
			$("div#option").css("height","220px");
			$(this).css("border-color","#e67e22 #e67e22 #16a085 #e67e22");
		}else {
			$("div#option").css("height","110px");
			$(this).css("border-color","#16a085 #e67e22 #e67e22 #e67e22");
		}
		clickCnt ++;
	})
}

var editor;
KindEditor.ready(function(K) {
    window.editor = K.create('#kindeditor', {
        themeType : 'edit'
    });
});
KindEditor.options.cssData = 'body { font-size: 20px; color:#fff;}';



window.onload = function(){
	option();
	topHeaderUser();
	editor.sync();
}