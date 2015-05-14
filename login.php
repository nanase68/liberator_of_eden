<?php require("./common/common.php")?>
<!DOCTYPE html>
<html lang="ja">
<head>
	<title><?php echo PAGE_TITLE?>:TOPページ</title>
	<?php require("./parts/common_head.php");?>
	<link rel="stylesheet" href="./css/login.css">

</head>
<body>
<div id="wrapper">

	<article>
		<header>
			<h1>解放者の楽園<span>-Liberator of Eden-</span></h1>
			<div class="clear"></div>
		</header>
	</article>
	<?php require("./parts/common_menu.php");?>
	<?php require("./parts/login_content.php");?>
	<?php require("./parts/common_footer.php");?>
</div>
<?php //require("./parts/common_haguruma.php");?>
</body>
</html>