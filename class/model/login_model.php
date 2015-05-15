<?php
session_start();//セッションを開始

require_once (dirname(__FILE__) . '/../dao/login_select_dao.php');

if(isset($_POST["login_id"]) && isset($_POST["login_pass"])){
	//ログインDAOから受け取った値（ユーザが入力した値）を変数に登録
	$user_id = $_POST["login_id"];
	$user_pass = $_POST["login_pass"];

	$user_pass=md5($user_pass);

	//入力値をデータベースにアクセスし、IDとPASSが一致するものがあるか確認
	$login = new LoginDAO;
	$login -> setUserId($user_id);
	$login -> setUserPass($user_pass);
	$login -> accessDB();

	if(!empty($login->getReturnAry())){//値が返ってきたら（一致したら）
		//セッションIDを発行
		$loginAry=$login->getReturnAry();
		$_SESSION['user_id'] = $loginAry[0]['user_id'];
		$_SESSION['user_name'] = $loginAry[0]['user_name'];
		//echo "ログインに成功しました。<br>";
		//echo $_SESSION['user_name'];
		header("Location: my_page.php");//ログイン後マイページに自動で飛ぶ
		exit;
	}else{
		echo "ログインに失敗しました。<br>";
	}
}else{
	//echo "string";
}
session_destroy();
?>

