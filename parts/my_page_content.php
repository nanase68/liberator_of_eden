<?php
require_once(dirname(__FILE__) . '/../class/model/my_page_mutters_select_model.php');
$my_page_mutters_select_model = new MyPageMuttersSelectModel;

// if((isset($_POST['mutter_title'])) && (isset($_POST['mutter_detail']))){
if(isset($_POST['mutter_title'])){
  require_once(dirname(__FILE__) . '/../class/model/mutter_insert_model.php');
  $mutter_insert_model = new MutterInsertModel;
  //投稿ボタンを押されてリダイレクト
  $title = $_POST['mutter_title'];
  $detail = $_POST['mutter_detail'];
  $mutter_insert_model->putParam($title, $detail);
  $mutter_insert_model->printHtml();
}
?>
  <article id="main_content" class="bottom">
		<div id="content_wrapper">
			<section id="my_content">
				<h2>マイページ</h2>
				
				
				<h3>呟きを投稿する</h3>
						
					<div id="response_area">
						<form action= "#" method="POST" enctype="multipart/form-data" accept-charset="UTF-8">
							<div>
								<label for="r_title">タイトル</label>
								<input type="text" name="mutter_title" id="r_title">
							</div>
							<div>
								<label for="r_detail">内容</label>
								<textarea name="mutter_detail" id="r_detail"></textarea>
                            </div>
<!--
                            <div>
                                <label for="r_image">画像を添付する</label>
                                <input type="file" name="files" id="r_image" accept="image/*">
                            </div>
 // -->
							<div><input type="submit" value="投稿する"></div>
						</form>
					</div>
			</section>

		<section class="item">
        <h3>投稿した呟き</h3>
<?php
echo($my_page_mutters_select_model->printHtml());
?>
				<div class="clear"></div>
			</section>
			<div class="clear"></div>
		</div>
		<div class="clear"></div>
	</article>
