<?php 
require_once(dirname(__FILE__) . '/../class/model/mutter_ranking_select_model.php');
require_once(dirname(__FILE__) . '/../class/model/mutter_sinchaku_select_model.php');
$mutter_ranking = new MutterRankingModel;
$rank_ary = $mutter_ranking -> getRankingAry();

$new_mutter = new NewMutterModel;
$new_mutter_ary = $new_mutter -> getNewMutterAry();
?>
	<article id="main_content" class="bottom">
		<div id="content_wrapper">
			<section class="item" id="con01">
				<h3>今週の一押しフレーズ</h3>
				<div class="top_image">
					<img src="$rank_ary[0]['MUTTER_IMG']">
					<p class="uploader">投稿者: <a href="#"><?php echo $rank_ary[0]['USER_ID']; ?></a></p>
				</div>
				<div class="top_phrase">
					<h4> <a href= <?php echo "mutter.php?id=" . $rank_ary[0]['MUTTER_ID']; ?> ><?php echo $rank_ary[0]['MUTTER_TITLE']; ?> </a></h4>
					<p> <a href= <?php echo "mutter.php?id=" . $rank_ary[0]['MUTTER_ID']; ?> ><?php echo $rank_ary[0]['MUTTER_DETAIL']; ?> </a></p>
				</div>
				<div class="clear"></div>
			</section>
			
			<section class="item">
				<h3>新着</h3>
				<div class="micro_content">
					<p class="micro_content_text"> <a href= <?php echo "mutter.php?id=" . $new_mutter_ary[0]['MUTTER_ID']; ?>><?php echo $new_mutter_ary[0]['MUTTER_TITLE']; ?></a></p>
					<p class="uploader">投稿者： <a href="#"> <?php echo $new_mutter_ary[0]['USER_ID'];?></a></p>
				</div>
				
				<div class="micro_content">
					<p class="micro_content_text"> <a href= <?php echo "mutter.php?id=" . $new_mutter_ary[1]['MUTTER_ID']; ?>> <?php echo $new_mutter_ary[1]['MUTTER_TITLE']; ?></a></p>
					<p class="uploader">投稿者： <a href="#"><?php echo $new_mutter_ary[1]['USER_ID'];?></a></p>
				</div>
				
				<div class="micro_content">
					<p class="micro_content_text"> <a href= <?php echo "mutter.php?id=" . $new_mutter_ary[2]['MUTTER_ID']; ?>> <?php echo $new_mutter_ary[2]['MUTTER_TITLE']; ?></a></p> 
					<p class="uploader">投稿者： <a href="#"><?php echo $new_mutter_ary[2]['USER_ID'];?></a></p>
				</div>
				<div class="clear"></div>
			</section>
			
			<section class="item">
				<h3>人気の投稿</h3>
				
				<div class="micro_content">
					<!--<img src="$rank_ary[3]['MUTTER_IMG']">-->
					<p class="micro_content_text"> <a href= <?php echo "mutter.php?id=" . $rank_ary[1]['MUTTER_ID']; ?>><?php echo $rank_ary[1]['MUTTER_TITLE'] ?> </a></p>
					<p class="uploader">投稿者： <a href="#"><?php echo $rank_ary[1]['USER_ID'] ?> </a></p>
				</div>
				
				<div class="micro_content">
					<p class="micro_content_text"> <a href=<?php echo "mutter.php?id=" . $rank_ary[2]['MUTTER_ID']; ?>><?php echo $rank_ary[2]['MUTTER_TITLE'] ?> </a></p>
					<p class="uploader">投稿者： <a href="#"><?php echo $rank_ary[2]['USER_ID'] ?></a></p>
				</div>
				
				<div class="micro_content">
					<p class="micro_content_text"> <a href=<?php echo "mutter.php?id=" . $rank_ary[3]['MUTTER_ID']; ?>><?php echo $rank_ary[3]['MUTTER_TITLE'] ?> </a></p>
					<p class="uploader">投稿者： <a href="#"><?php echo $rank_ary[3]['USER_ID'] ?></a></p>
				</div>
				<div class="clear"></div>
			</section>
			
			<section class="item">
				<h3>項目サンプル</h3>
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
				<h3>項目サンプル</h3>
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
			<div class="clear"></div>
		</div>
	</article>