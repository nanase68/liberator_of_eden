<?php 
require_once(dirname(__FILE__) . '/../class/model/theme_select_model.php');
$theme_list = new ThemeSelectModel;
$theme_ary = $theme_list->getThemeAry();
?>

<article id="main_content" class="bottom">
	<div id="content_wrapper">
		<section id="ranking_wrapper">
			
			<h2>テーマ一覧ページ</h2>
			
			<div id="ranking">


				<?php 
				$ranknum = 1;
				foreach($theme_ary as $row){
					//echo "<div class='ranking_content'>";
					//echo "<div class='rank'>" . $ranknum . "位</div>";
					$ranknum+=1;
				?>
					<div class="content_area">
						<h5><a href= <?php echo "theme.php?id=" . $row['theme_id']; ?>><?php echo $row['theme_title']; ?></a></h5>

						<a href="my_page.php" class="content_area_user">
							<img src="./images/batman.jpg">
							<span><?php echo $row['user_id']; ?></span>
						</a>
					</div>
					<div class="clear"></div>
				
				<?php }?>
				
				
				
			</div>
			
			
			

		</section>
		<div class="clear"></div>
		
	</div>
</article>