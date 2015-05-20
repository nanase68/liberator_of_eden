$(function(){
// javascriptの相対パスは、呼び出し元のhtmlが基準となる
var url = "class/model/theme_response_star_insert_model.php";
$.fn.raty.defaults.path = "./js/jquery.raty/stars";
	$('.star').raty({
		score: function(){
			return $(this).attr('data');
		},
		click: function(score, evt) {
			// alert($(this).attr("u-value") + "星の数"+score);
			
			$ajaxConnection = $.ajax({
				type:"POST",
				url: url,
				data:{
					"user_id": $(this).attr("u-value"),
					"response_id": $(this).attr("data-value"),
					"star_score": score
        }
			}).done(function(data){
        // alert(data);
			}).fail(function(data){
			});
		}
	});
});
