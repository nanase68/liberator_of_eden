$(function(){
$.fn.raty.defaults.path = "./js/jquery.raty/stars";
	$('#star').raty({
		score: function(){
			return $(this).attr('data');
		},
		click: function(score, evt) {
			alert("星の数"+score);
		}
	});
});