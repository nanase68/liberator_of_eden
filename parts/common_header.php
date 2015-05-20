<div id="rose"></div>
	<article>
		<header>
			<h1>解放者の楽園<span>-Eden of Liberators-</span></h1>
			<?php
			if(isset($_SESSION['user_id'])){
				if(isset($_SESSION['user_id'])){
			?>
			
			<a href="mypage.php" id="login"><?php echo $_SESSION['user_id']?>さん</a>
			<?php } }else{?>
			<a href="sign_up.php" id="header_sign_up">新規会員登録</a>
			<a href="login.php" id="login">ログイン</a>
			<?php }?>
			<div class="clear"></div>
		</header>
	</article>