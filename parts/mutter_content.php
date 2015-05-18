<?php require_once(dirname(__FILE__) . '/../class/model/mutter_select_model.php');

$model = new MutterSelectModel;
$mutter_id = $_GET['id'];
$model -> setMutterId($mutter_id);
$mutterAry = $model -> getMutterAry();
?>
<article id="main_content" class="bottom">
	<div id="content_wrapper">
		<section id="mutter_wrapper">
			
		<?php if(empty($mutterAry)){ ?>
			<p>指定されたコンテンツは存在しません。</p>
		<?php }else{ ?> 
			<h2>呟きを確認</h2>
			
			<h3><?php echo $mutterAry[0]['mutter_title']; ?></h3><!--OK?-->
		
			<div class="mutter_content">
				<div class="image_area">
					<img src="./images/content_sample.jpg">
				</div>
				<div class="content_area">
					<h5><a href="#"><?php echo $mutterAry[0]['mutter_title']; ?> </a></h5><!--OK?-->
					<a href="my_page.php" class="content_area_user">
						<img src="./images/batman.jpg">
						<span> <?php echo $mutterAry[0]['user_id']; ?> </span>
					</a>
					<div id="star" data="<?php echo 2;?>"></div>
						<p>
							<?php echo $mutterAry[0]['mutter_detail']; ?><!--OK?-->
						</p>
					</div>
					<div class="clear"></div>
				</div>
		</section>
		<div class="clear"></div>	
	</div>
</article>
<?php } ?>