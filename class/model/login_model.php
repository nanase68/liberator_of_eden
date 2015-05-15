<?php
session_start();//セッションを開始

require_once ('/class/dao/login_select_dao.php');

if(isset($_POST["login_id"]) && isset($_POST["login_pass"])){
	//ログインDAOから受け取った値を変数に登録
	$user_id = $_POST["login_id"];
	$user_pass = $_POST["login_pass"];

	$login = new LoginDAO;
	$login -> setUserId($user_id);
	$login -> setUserPass($user_pass);
	$login -> accessDB();

	//ログイン名・パスワードが適切かどうかを確認
	if(!empty($login->getReturnAry())){//値が返ってきたら
		//セッションID・passを記録
		echo "ログインに成功しました。<br>";
		$loginAry=$login->getReturnAry();
		$_SESSION['user_id'] = $loginAry[0]['user_id'];
		$_SESSION['user_name'] = $loginAry[0]['user_name'];
		echo $_SESSION['user_name'];
		header("Location: my_page.php");
		exit;
	}else{
		//セッションID・passを削除
		echo "ログインに失敗しました。<br>";
	}

}else{
	//echo "string";
}

session_destroy();

?>

