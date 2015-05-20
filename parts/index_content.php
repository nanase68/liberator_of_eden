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
<?php if(!empty($rank_ary[0]['MUTTER_IMG'])){
echo('<div class="top_image">');
echo('<img src="'. $rank_ary[0]['MUTTER_IMG']) . '"'; ?>
					<p class="uploader">投稿者: <a href="#"><?php echo $rank_ary[0]['USER_NAME']; ?></a></p>
				</div>
<?php } ?>
				<div class="top_phrase">
					<h4> <a href= <?php echo "mutter.php?id=" . $rank_ary[0]['MUTTER_ID']; ?> ><?php echo $rank_ary[0]['MUTTER_TITLE']; ?> </a></h4>
					<p> <a href= <?php echo "mutter.php?id=" . $rank_ary[0]['MUTTER_ID']; ?> ><?php echo $rank_ary[0]['MUTTER_DETAIL']; ?> </a></p>
				</div>
				<div class="clear"></div>
			</section>
			
			<section class="item">
				<h3>新着</h3>
<?php $i=0;
foreach($new_mutter_ary as $mutter){ 

if($i >= 6){
  break;
}
$i++;
?>
				<div class="micro_content">
					<p class="micro_content_text"> <a href= <?php echo "mutter.php?id=" . $mutter['MUTTER_ID']; ?>><?php echo $mutter['MUTTER_TITLE']; ?></a></p>
					<p class="uploader">投稿者： <a href="#"> <?php echo $mutter['USER_NAME'];?></a></p>
				</div>
<?php } ?>

							<div class="clear"></div>
			</section>
			
			<section class="item">
				<h3>人気の投稿</h3>
<?php for($i=1; $i < count($rank_ary); $i++){ 
if($i >6){
  break;
}
				
?>
				<div class="micro_content">
					<!--<img src="$rank_ary[3]['MUTTER_IMG']">-->
					<p class="micro_content_text"> <a href= <?php echo "mutter.php?id=" . $rank_ary[$i]['MUTTER_ID']; ?>><?php echo $rank_ary[$i]['MUTTER_TITLE'] ?> </a></p>
					<p class="uploader">投稿者： <a href="#"><?php echo $rank_ary[$i]['USER_NAME'] ?> </a></p>
				</div>
<?php } ?>
      
        <div class="clear"></div>
			</section>
			
		<div class="clear"></div>
		</div>
	</article>
