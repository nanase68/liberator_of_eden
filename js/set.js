/******************/
// Masonry & imagesloaded 設定
$(function(){
var $container = $('#content_wrapper'); 
$container.imagesLoaded(function(){
	$container.masonry({
	itemSelector: '.item',
	isFitWidth: true,
	isAnimated: true,
	isResizable: true
	});
});
});
// end Masonry
/******************/