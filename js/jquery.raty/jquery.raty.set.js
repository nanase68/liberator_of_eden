$(function(){
var url = "../../../class/";
$.fn.raty.defaults.path = "./js/jquery.raty/stars";
	$('.star').raty({
		score: function(){
			return $(this).attr('data');
		},
		click: function(score, evt) {
			alert($(this).attr("u-value") + "星の数"+score);
			
			
			$ajaxConnection = $.ajax({
				type:"POST",
				url: url,
				data:{
					"user_id": $(this).attr("u-value"),
					"response_id": $(this).attr("data-value")
				}
			}).done(function(data){
			}).fail(function(data){
			});
		}
	});
});