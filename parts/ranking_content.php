<?php 
require_once(dirname(__FILE__) . '/../class/model/mutter_ranking_select_model.php');
$mutter_ranking = new MutterRankingModel;
$rank_ary = $mutter_ranking->getRankingAry();
?>

<article id="main_content" class="bottom">
	<div id="content_wrapper">
		<section id="ranking_wrapper">
			
			<h2>ランキングページ</h2>
			
			<h3>今週のランキングを見る</h3>
			
			<div id="ranking">


				<?php 
				$ranknum = 1;
				foreach($rank_ary as $row){
					echo "<div class='ranking_content'>";
					echo "<div class='rank'>" . $ranknum . "位</div>";
					$ranknum+=1;
				?>
					<div class="image_area">
						<a href= <?php echo ("mutter.php?id=" . $row['MUTTER_ID']); ?> >
							<?php 
							if(!empty($row['MUTTER_IMG'])){
								//echo "<img src='./images/content_sample.jpg'>"; //mutterの画像を出力する
							} else{
								echo "<img src='./images/content_sample.jpg'>"; //テスト画像
							} 
							?>
						</a>
					</div>
					<div class="content_area">
						<h5><a href= <?php echo ("mutter.php?id=" . $row['MUTTER_ID']); ?> ><?php echo $row['MUTTER_TITLE']; ?></a></h5>

						<a href="my_page.php" class="content_area_user">
							<img src="./images/batman.jpg">
							<span><?php echo $row['USER_NAME'] ;?></span>
						</a>
						
						<a href= <?php echo("mutter.php?id=" . $row['MUTTER_ID']); ?> class="content_area_detail ellipsis">
							<?php echo $row['MUTTER_DETAIL']; ?>
						</a>
					</div>
					<div class="clear"></div>
				</div>
				
				<?php }?>
				
				
				
			</div>
			
			
			

		</section>
		<div class="clear"></div>
		
	</div>
</article>