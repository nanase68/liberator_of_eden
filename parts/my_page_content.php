<?php
require_once(dirname(__FILE__) . '/../common/get_user_id.php');
require_once(dirname(__FILE__) . '/../class/model/mutter_select_model.php');
require_once(dirname(__FILE__) . '/../class/model/user_select_model.php');

$mutter_select_model = new MutterSelectModel;
$user_select_model = new UserSelectModel;

//表示するuseridをセットする
if(!isset($_GET['id']) or !is_string($_GET['id'])){
	//セッションからアクセス者のuser_idを取得
    global $user_id_from_session;
	$user_id = $user_id_from_session;
} else{ 
	//$_GETから取得
	$user_id = $_GET['id'];
}

//指定されたユーザーidが存在するかチェック
$user_select_model->setUserId($user_id);
$user_ary = $user_select_model->getUserAry();
if(empty($user_ary)){
	echo "<article id='main_content' class='bottom'>";
	echo "<div id='content_wrapper'>";
	echo "<section id='my_content'>";
	echo "<p>指定されたユーザーは存在しません</p>";
	echo "</section></div></article>";
}else{ //最後に閉じる

$mutter_select_model->setUserId($user_id);
$mutter_ary = $mutter_select_model->getMutterAry();

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
				<h2>
				<?php if(isset($_GET['id'])){
					echo $user_id . "のマイページ";
				}else{
					echo "マイページ";
				}?>
				</h2>
				
				<?php if(isset($_GET['id'])){
					//idが指定されている場合、投稿フォームを表示しない
				} else{ ?>
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
				<?php } //投稿フォームの条件分岐終わり ?>
			</section>

		<section class="item">
        <h3>投稿した呟き</h3>
<?php

    foreach($mutter_ary as $row){
    	echo "<a href='./mutter.php?id=".$row['mutter_id']."'><div class='micro_content'>";
    	if(empty($row['mutter_img'])){
    		echo "<p class='micro_content_txt'>${row['mutter_detail']}</p>";
    	} else {
    		// :TODO スタブ
        	echo "<img src='./images/sample.png'>";
		}
		echo "<p class='uploader'>${row['mutter_title']}</p>";
		echo "</div></a>";
	}
?>
				<div class="clear"></div>
			</section>
			<div class="clear"></div>
		</div>
		<div class="clear"></div>
	</article>
<?php } // ?>