<?php
require_once(dirname(__FILE__) . '/../class/model/theme_select_model.php');
require_once(dirname(__FILE__) . '/../class/model/theme_response_select_model.php');

$model = new ThemeSelectModel;
$theme_id = $_GET['id'];
$model->setThemeId($theme_id);
$theme_ary = $model->getThemeAry();
?>
	<article id="main_content" class="bottom">
		<div id="content_wrapper">
			<section id="theme_wrapper">
				
				<h2><?php echo $theme_ary[0]['theme_title']; ?></h2>
			
				<div class="theme_content">
					<div class="image_area">
						<img src="./images/content_sample.jpg">
					</div>
					<div class="content_area">
						<h5><a href="#"><?php echo $theme_ary[0]['theme_title']; ?></a></h5>
						
						<a href="my_page.php" class="content_area_user">
							<img src="./images/batman.jpg">
							<span>†BattoMan†</span>
						</a>
						<div id="okiniiri"></div>
						<p>
授業中にテロリストが現れた時の対処法を教えてください。<br>
<a href="http://www49.atwiki.jp/aniwotawiki/pages/10855.html" target="_blanc">#参考文献</a>
						</p>
					</div>
					<div class="clear"></div>
					
					
					<div id="response_area">
						<form action= "class/model/theme_response_insert_model.php" method="POST" enctype="multipart/form-data" accept-charset="UTF-8">
							<div>
								<label for="r_title">タイトル</label>
								<input type="text" name="title" id="r_title">
							</div>
							<div>
								<label for="r_detail">内容</label>
								<textarea name="detail" id="r_detail"></textarea>
                            </div>
                            <div>
                                <label for="r_image">画像を添付する</label>
                                <input type="file" name="files" id="r_image" accept="image/*">
                            </div>
							<div><input type="submit" value="投稿する"></div>
						</form>
					</div>
					
					
					
					<?php for($i = 0; count($themeArray) > $i; $i++){?>
					
					<div class="response_area">
						<h5><a href="#"><?php echo $themeArray[$i]["theme_response_title"]?></a></h5>
						
						<a href="my_page.php" class="content_area_user">
							<img src="./images/batman.jpg">
							<span><?php echo $themeArray[$i]["user_name"]?></span>
						</a>
						<div class="star" data-value="<?php echo $themeArray[$i]["theme_response_id"]?>" u-value="root"></div>
						<p>
						<?php echo nl2br($themeArray[$i]["theme_response_detail"])?>
						</p>
						
						
						<form action="#" method="POST" class="response_form">
							<h6>返信する</h6>
							<input type="text" name="response_text">
							<input type="hidden" name="response_id" value="1">
							<input type="hidden" name="response_user" value="hoge">
							<input type="submit">
						</form>

						<div class="response_comment">
							<a href="my_page.php" class="response_comment_area_user">
								<img src="./images/batman.jpg">
								<span>†BattoMan†</span>
							</a>
							<p>厨二わろたｗｗｗｗｗｗｗｗｗｗｗｗ</p>
						</div>
						
						<div class="response_comment">
							<a href="my_page.php" class="response_comment_area_user">
								<img src="./images/batman.jpg">
								<span>†BattoMan†</span>
							</a>
							<p>厨二わろたｗｗｗｗｗｗｗｗｗｗｗｗ</p>
						</div>
						
						
					</div>
					<?php }?>
					<div class="clear"></div>
				</div>
			</section>
			<div class="clear"></div>
			
		</div>
	</article>
