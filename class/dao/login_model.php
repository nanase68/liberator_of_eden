<?php
session_start();//セッションを開始

require ("login_dao.php");

//ログインDAOから受け取った値を変数に登録
$user_id = $_POST["user_id"];
$user_pass = $_POST["user_pass"];

//ログイン名・パスワードが適切かどうかを確認
if(!empty($this->data_ary){//値が返ってきたら
	//セッションID・passを記録
	echo "ログインに成功しました。<br>";
	$_SESSION['user_id'] = $this->data_ary[0]['user_id'];
	$_SESSION['user_name'] = $this->data_ary[0]['user_name'];
}else{
	//セッションID・passを削除
	echo "ログインに失敗しました。<br>";
	unset($_SESSION['login_id']);
	unset($_SESSION['login_pass']);
}

session_destroy();

?>

