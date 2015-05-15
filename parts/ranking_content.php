	<article id="main_content" class="bottom">
		<div id="content_wrapper">
			<section id="ranking_wrapper">
				
				<h2>ランキングページ</h2>
				
				<h3>今週のランキングを見る</h3>
				
				<div id="ranking">


					<?php for($i = 0; 20 > $i; $i++){?>
					<div class="ranking_content">
					
						<div class="rank"><?php echo $i+1;?>位</div>
					
						<div class="image_area">
							<a href="mutter.php">
								<img src="./images/content_sample.jpg">
							</a>
						</div>
						<div class="content_area">
							<h5><a href="#">ｴﾀｰﾅﾙ.ｱﾌﾞﾌｨﾆｽ</a></h5>
							
							<a href="my_page.php" class="content_area_user">
								<img src="./images/batman.jpg">
								<span>†BattoMan†</span>
							</a>
							
							<a href="mutter.php" class="content_area_detail ellipsis">
ｴﾀｰﾅﾙ.ｱﾌﾞﾌｨﾆｽ <br>
【深淵憎悪の怨幻】 <br>
【闇属性】 <br>

無を闇属性に変換する事ができる能力 <br>
無＝空間＝宇宙＝真理故、この能力はもはや深淵さえもまた、愉悦 <br>
闇属性に変換された物はこの能力者が吸収できる <br>
この能力者は闇を吸収し力にする事ができる 
闇属性全てを吸収するために、倒すには光属性しかないが 
変換スピードよりも早く、この能力者を倒さねばならない
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