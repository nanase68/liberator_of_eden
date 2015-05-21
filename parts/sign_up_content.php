<?php
require_once(dirname(__FILE__) . '/../class/model/sign_up_model.php');

// 投稿ボタンを押されてリダイレクト
if((isset($_POST['user_id'])) && (isset($_POST['user_name'])) && (isset($_POST['user_email'])) && (isset($_POST['user_pass']))){
  $sign_up_model = new SignUpModel;
  $sign_up_model->putParam($_POST['user_id'], $_POST['user_name'], $_POST['user_email'], $_POST['user_pass']);
  $sign_up_model->printHtml();
}
?>
	<article id="main_content" class="bottom">
		<div id="content_wrapper">
			<section id="sign_up_wrapper">

				<h2>新規会員登録ページ</h2>
				
				<div id="sign_up">
					<div class="sign_up_content">
						<form action="#" method="POST">
							<p id="test"></p>
							<div>
								<span class="alert_text"></span>
								<label for="u_id">ログインID</label>
								<input type="text" class="n_check" id="u_id" name="user_id" data-roll="false">
							</div>

							<div>
								<span class="alert_text"></span>
								<label for="u_na">表示名</label>
								<input type="text" class="n_check" id="u_na" name="user_name" data-roll="false">
							</div>
							
							<div>
								<span class="alert_text"></span>
								<label for="u_ma">メールアドレス</label>
								<input type="text" class="n_check m_like" id="u_ma" name="user_email" data-roll="false">
							</div>
							
							<div>
								<span class="alert_text"></span>
								<label for="u_mat">メールアドレス確認</label>
								<input type="text" class="n_check m_like" id="u_mat" name="user_emaiu_tmp" data-roll="false">
							</div>
							
							<div>
								<span class="alert_text" data="8"></span>
								<label for="u_pa">ログインPASS</label>
								<input type="password" class="n_check len_check p_like" id="u_pa" name="user_pass" data-roll="false">
							</div>
							
							<div>
								<span class="alert_text" data="8"></span>
								<label for="u_pat">ログインPASS確認</label>
								<input type="password" class="n_check len_check p_like" id="u_pat" name="user_pass_tmp" data-roll="false">
							</div>

							<div>
								<input type="hidden" id="check_mail" data-roll="false">
								<input type="hidden" id="check_pass" data-roll="false">
								<input type="submit" value="ログイン" id="submit_button">
							</div>
						
						</form>
					</div>

				</div>
			</section>
			<div class="clear"></div>
			
		</div>
	</article>
