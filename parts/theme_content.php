<?php
require_once(dirname(__FILE__) . '/../class/model/theme_select_model.php');
require_once(dirname(__FILE__) . '/../class/model/theme_response_select_model.php');
require_once(dirname(__FILE__) . '/../class/model/theme_response_comment_select_model.php');

//idがセットされていない場合、エラー文を表示する
if(!isset($_GET['id']) or !is_string($_GET['id'])){
	echo "<article id='main_content' class='bottom'>";
	echo "<div id='content_wrapper'>";
	echo "<section id='theme_wrapper'>";
	echo "<p>指定したコンテンツは存在しません</p>";
	echo "</section></div></article>";
} else{ //タグは最後に閉じる

//themeのidを指定
$theme_id = $_GET['id'];

//テーマの配列を取得
$theme_model = new ThemeSelectModel;
$theme_model->setThemeId($theme_id);
$themeArray = $theme_model->getThemeAry();
//print_r($themeArray);

//idの値が不正な場合、エラー文を表示
if(empty($themeArray)){
	echo "<article id='main_content' class='bottom'>";
	echo "<div id='content_wrapper'>";
	echo "<section id='theme_wrapper'>";
	echo "<p>指定したコンテンツは存在しません</p>";
	echo "</section></div></article>";
} else{ //タグは最後に閉じる

//テーマへのレスポンスの配列を取得
$response_model = new ThemeResponseSelectModel;
$response_model->setThemeId($theme_id);
$responseArray = $response_model->getThemeResponseAry();
//print_r($responseArray);

//テーマのレスポンスのコメントの配列を取得する関数を定義

function getCommentAry($theme_response_id){
	$comment_model = new ThemeResponseCommentSelectModel;
	$comment_model->setThemeResponseId($theme_response_id);
	$commentAry = $comment_model->getThemeResponseCommentAry();
	return $commentAry;
}

?>

	<article id="main_content" class="bottom">
		<div id="content_wrapper">
			<section id="theme_wrapper">

				<h2>テーマページ</h2>
				
				<h3><?php echo $themeArray[0]['theme_title']; ?></h3>
			
				<div class="theme_content">
					<div class="image_area">
						<img src="./images/content_sample.jpg">
					</div>
					<div class="content_area">
						<h5><a href="#"><?php echo $themeArray[0]['theme_title']; ?></a></h5>
						
						<a href=<?php echo "my_page.php?id=" . $themeArray[0]['user_id']; ?> class="content_area_user">
							<img src="./images/batman.jpg">
							<span><?php echo $themeArray[0]['user_name']; ?></span>
						</a>
						<div id="okiniiri"></div>
<!--
						<p>
<?php echo $themeArray[0]['theme_detail']; ?><br>
<a href="http://www49.atwiki.jp/aniwotawiki/pages/10855.html" target="_blanc">#参考文献</a>
						</p>
-->
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
					
					
					
					<?php //RESPONSE表示のループ
					for($i = 0; count($responseArray) > $i; $i++){ ?>
					
					<div class="response_area">
						<h5><a href="#"><?php echo $responseArray[$i]["theme_response_title"]?></a></h5>
						
						<a href=<?php echo "my_page.php?id=" . $responseArray[0]['user_id']; ?> class="content_area_user">
							<img src="./images/batman.jpg">
							<span><?php echo $responseArray[$i]["user_name"]?></span>
						</a>
						<div class="star" data-value="<?php echo $responseArray[$i]["theme_response_id"]?>" u-value="root"></div>
						<p>
						<?php echo nl2br($responseArray[$i]["theme_response_detail"])?>
						</p>
						
						
						<form action="#" method="POST" class="response_form">
							<h6>返信する</h6>
							<input type="text" name="response_text">
							<input type="hidden" name="response_id" value="1">
							<input type="hidden" name="response_user" value="hoge">
							<input type="submit">
						</form>
						<?php 
						$commentAry = getCommentAry($responseArray[$i]["theme_response_id"]);
						foreach ($commentAry as $comment_elem) { ?>
							<div class="response_comment">
								<a href=<?php echo "my_page.php?id=" . $comment_elem['user_id']; ?> class="response_comment_area_user">
									<img src="./images/batman.jpg">
									<span><?php echo $comment_elem['user_name']; ?></span>
								</a>
								<p><?php echo $comment_elem['theme_response_comment_detail']; ?></p>
							</div>
						<?php } ?>
						
					</div>
					<?php } //RESPONSE表示のループ終わり ?>
					<div class="clear"></div>
				</div>
			</section>
			<div class="clear"></div>
			
		</div>
	</article>
<?php }} ?>