<?php
require_once(dirname(__FILE__) . '/../class/model/mutter_select_model.php');
$mutter_select_model = new MutterSelectModel;
?>
	<article id="main_content">
		<div id="content_wrapper">
			<section id="my_content">
				<h2>マイページ</h2>
				
				
				<h3>呟きを投稿する</h3>
				
				<form action="#" method="POST">
					<div>
						<input type="text" name="mutter">
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
echo($mutter_select_model->printHtml());
?>
				<div class="clear"></div>
			</section>
			<div class="clear"></div>
		</div>
		<div class="clear"></div>
	</article>
