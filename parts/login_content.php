<?php require("./class/model/login_model.php")?>
<article id="main_content" class="bottom">
		<div id="content_wrapper">
			<section id="login_wrapper">
				
				<h2>ログインページ</h2>
				
				<div id="login">
					<div class="login_content">
						<form action="login.php" method="POST">
							
							<div>
								<label for="l_id">ログインID</label>
								<input type="text" id="l_id" name="login_id">
							</div>

							<div>
								<label for="l_pa">ログインPASS</label>
								<input type="password" id="l_ps" name="login_pass">
							</div>

							<div>
								<input type="submit" value="ログイン">
							</div>
						
						</form>
					</div>

				</div>
			</section>
			<div class="clear"></div>
			
		</div>
	</article>
