<?php require("./common/common.php")?>
<!DOCTYPE html>
<html lang="ja">
<head>
	<title><?php echo PAGE_TITLE?>:TOPページ</title>
	<?php require("./parts/common_head.php");?>
	<link rel="stylesheet" href="./css/sign_up.css">
	<script type="text/javascript" src="./js/jquery.sign_up_check.js"></script>
</head>
<body>
<div id="wrapper">

	<?php require("./parts/common_header.php");?>
	<?php require("./parts/common_menu.php");?>
	<?php require("./parts/sign_up_content.php");?>
	<?php require("./parts/common_footer.php");?>
</div>
<?php //require("./parts/common_haguruma.php");?>
</body>
</html>