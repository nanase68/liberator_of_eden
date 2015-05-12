<?php
require("connection.php");

try{
	$sql = "";
	$sql .= "SELECT ";
	$sql .= "M_USER.user_id, ";
	$sql .= "M_USER.user_name ";
	
	$sql .= "FROM M_USER ";
	
	$dbh = new PDO(DSN, USER, PASS);
	$dbh -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$dbh -> beginTransaction();
	$dbh -> query("SET NAMES utf8");
	
	$st = $dbh->query($sql);
	$st->execute();
	while($row = $st->fetch(PDO::FETCH_ASSOC)){
		$Array[] = $row;
	}
	print_r($Array);
	
} catch (PDOException $e) {
	exit('データベース接続失敗。'.$e->getMessage());
}
?>
