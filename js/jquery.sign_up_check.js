$(function(){

	$(".n_check").bind("blur", function(event){
	//$(".n_check").keyup(function () {
		if(!nullCheck($(this).val())){
			$(this).parent().children(".alert_text").text("空白です");
			flgAttr($(this),false);
		}else{
			
			if($(this).attr("id") == "u_ma"){
				if(!$(this).val().match(/^([a-zA-Z0-9])+([a-zA-Z0-9\._-])*@([a-zA-Z0-9_-])+([a-zA-Z0-9\._-]+)+$/)){
					flgAttr($(this),false);
					$(this).parent().children(".alert_text").text("正しいメールアドレスの形式ではありません。");
				}else{
					$(this).parent().children(".alert_text").text("");
					flgAttr($(this),true);
				}
			}else{
				$(this).parent().children(".alert_text").text("");
				flgAttr($(this),true);
			}
		}
		
		
		if($(this).hasClass("m_like")){
			var val = $(".m_like").map(function() {
				return $(this).val();
			}).get();
			if(valLike(val[0],val[1])){
				flgAttr($("#check_mail"),true);
//				$("#u_mat").parent().children(".alert_text").text("");
			}else{
				flgAttr($("#check_mail"),false);
				$("#u_mat").parent().children(".alert_text").text("正しいメールアドレスを入力してください。");
			}
		}
		if($(this).hasClass("p_like")){
			var val = $(".p_like").map(function() {
				return $(this).val();
			}).get();
			if(valLike(val[0],val[1])){
				flgAttr($("#check_pass"),true);
			}else{
				flgAttr($("#check_pass"),false);
				$("#u_pat").parent().children(".alert_text").text("正しいパスワードを入力してください。");
			}
		}
	});
	
	
	$(".len_check").bind("keyup blur", function(event){
	$n = $(this).parent().children(".alert_text").attr("data");
	$text = $(this).parent().children("label").text();
		if(!lengthCheck($(this).val(), $n)){
			$(this).parent().children(".alert_text").text($text+"は"+ $n +"文字以上必要です。");
			flgAttr($(this),false);
		}else{
		
		
		
		if($(this).attr("id") == "u_id"){
			var url = "http://www3268uf.sakura.ne.jp/next_c/index.php";
			$.ajax({
				type:"POST",
				url: url,
				data:{
					"user_id": $(this).val()
				},
			}).done(function(data){
//				alert(data);
			}).fail(function(data){
				alert('error!!!');
console.log(data);
			});
		}
		
		
		
		
		
		
			$(this).parent().children(".alert_text").text("");
			flgAttr($(this),true);
		}
		
		
	});
	
	
	$("input").bind("keyup blur", function(event){
		var flg = true;
		var rolls = $("input").map(function() {
			return $(this).attr("data-roll");
		}).get();
		for(var i = 0; i < rolls.length; i++){
			if(rolls[i] == "false"){
				flg = false;
			}else{
				flg = true;
			}
		}
		
		if(flg){
			$("input[type='submit']").css(
			"back-ground: #fff"
			);
		}
		
	});
	


	
	$('form').submit(function(){
		var flg = true;
		var rolls = $("input").map(function() {
			return $(this).attr("data-roll");
		}).get();
		for(var i = 0; i < rolls.length; i++){
			if(rolls[i] == "false"){
//				alert(rolls[i]);
				flg = false;
			}else{
				//alert(rolls[i]);
			}
		}
		alert(flg);
		return flg;
	});
	
	
	
	function nullCheck($val){
		if($val != ""){
			return true;
		}else{
			return false;
		}
	}
	
	function lengthCheck($val, $len){
		if($val != ""){
			if($val.length >= $len){
				return true;
			}else{
				return false;
			}
		}else{
			return false;
		}
	}
	
	
	function valLike($val1, $val2){
		if($val1 == $val2){
			return true;
		}else{
			return false;
		}
	}
	
	function flgAttr($elem, $flg){
		if($flg === true){
			$($elem).attr("data-roll", "true");
			return true;
		}else{
			$($elem).attr("data-roll","false");
			return false;
		}
	}
});