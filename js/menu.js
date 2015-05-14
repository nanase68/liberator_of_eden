$(function(){
	var minWindow = 700;
	$(window).on('load resize', function(){
		var w = $(window).width();
		//$('div#wrapper').attr('width', w);
		if(w < minWindow){
			document.title = w + "px";
			var style = '<link rel="stylesheet" href="./css/menu_change.css">';
		}else{
			var style = '<link rel="stylesheet" href="./css/menu.css">';
			$('head link:last').after(style);
		}
	});
});