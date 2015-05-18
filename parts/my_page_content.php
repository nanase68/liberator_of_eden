<?php
require_once(dirname(__FILE__) . '/../class/model/my_page_mutters_select_model.php');
require_once(dirname(__FILE__) . '/../class/model/mutter_insert_model.php');
$my_page_mutters_select_model = new MyPageMuttersSelectModel;
$mutter_insert_model = new MutterInsertModel;
// if((isset($_POST['mutter_title'])) && (isset($_POST['mutter_detail']))){
if(isset($_POST['mutter_detail'])){
  //投稿ボタンを押されてリダイレクト
  // $title = $_POST['mutter_title'];
  $detail = $_POST['mutter_detail'];
  $mutter_insert_model->putParam($detail);
  $mutter_insert_model->printHtml();
}
?>
  <article id="main_content" class="bottom">
		<div id="content_wrapper">
			<section id="my_content">
				<h2>マイページ</h2>
				
				
				<h3>呟きを投稿する</h3>
				
				<form action="#" method="POST">
					<div>
						<input type="text" name="mutter_detail">
						<input type="submit" value="投稿する">
					</div>
				</form>
				
			</section>
			<section class="item">
				<h3>コメントのついた呟き</h3>
				
				<div class="micro_content">
					<img src="./images/sample.png">
					<p class="uploader">SAMPLE: <a href="#">BattoMan</a></p>
				</div>
				
				<div class="micro_content">
					<img src="./images/sample.png">
					<p class="uploader">SAMPLE: <a href="#">BattoMan</a></p>
				</div>
				
				<div class="micro_content">
					<img src="./images/sample.png">
					<p class="uploader">SAMPLE: <a href="#">BattoMan</a></p>
				</div>
				<div class="clear"></div>
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
