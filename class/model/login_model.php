<?php
session_start();//セッションを開始

require_once (dirname(__FILE__) . '/login_select_dao.php');

//ログインDAOから受け取った値を変数に登録
$user_id = $_POST["user_id"];
$user_pass = $_POST["user_pass"];

//ログイン名・パスワードが適切かどうかを確認
if(!empty($return_ary)){//値が返ってきたら
	//セッションID・passを記録
	echo "ログインに成功しました。<br>";
	$_SESSION['user_id'] = $this->return_ary[0]['user_id'];
	$_SESSION['user_name'] = $this->return_ary[0]['user_name'];
}else{
	//セッションID・passを削除
	echo "ログインに失敗しました。<br>";
	unset($_SESSION['user_id']);
	unset($_SESSION['user_pass']);
}

session_destroy();

?>

