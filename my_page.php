<?php require("./common/common.php")?>
<?php require("./class/api/check.php");?>
<!DOCTYPE html>
<html lang="ja">
<head>
	<title><?php echo PAGE_TITLE?>:TOPページ</title>
	<?php require("./parts/common_head.php");?>
	<link rel="stylesheet" href="./css/my_page.css">
	<link rel="stylesheet" href="./css/theme.css">
</head>
<body>
<div id="wrapper">
	<?php require("./parts/common_header.php");?>
	<?php require("./parts/common_menu.php");?>
	<?php require("./parts/my_page_content.php");?>
	<?php require("./parts/common_footer.php");?>
</div>
<?php require("./parts/common_haguruma.php");?>
</body>
</html>
