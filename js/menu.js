$(function(){
	var minWindow = 700;
	$(window).on('load resize', function(){
		var w = $(window).width();
		if(w < minWindow){
			var style = '<link rel="stylesheet" href="./css/menu_change.css">';
			$('head link:last').after(style);
		}else{
			var style = '<link rel="stylesheet" href="./css/menu.css">';
			$('head link:last').after(style);
		}
	});
});