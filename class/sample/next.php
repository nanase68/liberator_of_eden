<?php
require("../api/FileUploadClass.php");
//FileUploadClass宣言
$fuc = new FileUploadClass();

$fuc -> setFileParam($_FILES['files']);
$fuc -> setDirPath("./test_files_directory/");
$fuc -> setFileName("test_image");

$imgFlg = true;
if(!$fuc -> isImage()){
	$imgFlg = false;
}

?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>form test:prev</title>
<style type="text/css">
td{
	border:1px solid #000;
}
.title{
	font-weight:bold;
}
th{
	border:1px solid #333;
	background:#888;
}
h2{
	padding:50px 0 0 0;
}
h1+h2{
	padding:0;
}
</style>
</head>
<body>
<h1>$_FILES関連のメソッドテスト</h1>
<h2>$_FILES['name']['OPTION']</h2>
<table>
<tr><th>OPTION</th><th>VALUE</th></tr>
<?php
foreach($_FILES['files'] as $key => $value){
	echo "<td class='title'>".$key ."</td><td>". $value."</td></tr>";
}
?>
</table>


<h2>FileUploadClass()</h2>

<h3>Setter</h3>
<table>
	<tr><th>Method(Setter)</th><th>parameter</th><th>option</th></tr>
	<tr><td>setFileParam(Array)</td><td>$_FILES['files']</td><td style="color: #f00;">※必須</td></tr>
	<tr><td>setDirPath(String)</td><td>./test_files_directory/</td><td>宣言不要</td></tr>
	<tr><td>setFileName(String)</td><td>test_image</td><td>宣言不要</td></tr>
</table>




<h3>Getter</h3>
<table>
	<tr><th>Method(Getter)</th><th>return</th></tr>
	<tr><td>getFile()</td><td><?php if($fuc -> getFile()){echo "true";}else{echo "false";}?></td></tr>
	<tr><td>getMovePath()</td><td><?php echo $fuc -> getMovePath()?></td></tr>
	<tr><td>getFileMIME()</td><td><?php echo $fuc -> getFileMIME()?></td></tr>
	<tr><td>getFileMimeName()</td><td><?php echo $fuc -> getFileMimeName()?></td></tr>
	
	<tr><td>getFileSize()</td><td><?php echo $fuc -> getFileSize()?></td></tr>
	<tr><td>isImage()</td><td><?php if($fuc -> isImage()){echo "true";}else{echo "false";}?></td></tr>
	<?php if($imgFlg){?><tr><td>&lt;a href="&lt;?php=getMovePath()?&gt;"&gt;</td><td><img src="<?php echo $fuc -> getMovePath()?>"></td></tr><?php }?>

</table>






<?php
if($imgFlg){
require("../api/ImgResizeClass.php");
$irc = new ImgResizeClass();
$min_dir= "./test_files_directory/test_image_min.jpg";
$irc -> setUri($fuc -> getMovePath(), $min_dir);
$irc -> setImageParth(1);
?>


<h2>ImageResiseClass()</h2>



<h3>Setter</h3>
<table>
	<tr><th>Method(Setter)</th><th>parameter</th><th>option</th></tr>
	<tr><td>setUri(String , String)</td><td>$fuc -&gt; getMovePath()</td><td style="color: #f00;">※必須(第二引数は省略すると上書きとなる)</td></tr>
	<tr><td>setImageParth(Int)</td><td>1</td><td>宣言不要</td></tr>
	<tr><td>setMaxWidth(Int)</td><td>350</td><td>宣言不要</td></tr>
	<tr><td>setMaxHeight(Int)</td><td>200</td><td>宣言不要</td></tr>
</table>

<h3>Getter</h3>
<table>
	<tr><th>Method(Getter)</th><th>return</th></tr>
	<tr><td>getImage()</td><td><?php if($irc -> getImage()){echo "true";}else{echo "false";}?></td></tr>
	<tr><td>getImageWidth()</td><td><?php echo $irc -> getImageWidth()?></td></tr>
	<tr><td>getImageHeight()</td><td><?php echo $irc -> getImageHeight()?></td></tr>
	<tr><td></td><td><img src="<?php echo $min_dir/*$fuc -> getMovePath()*/?>"></td></tr>
</table>



<?php }?>
</body>
</html>