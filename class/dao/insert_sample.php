<?php
require_once("../../common/connection.php");

try {
    //参考:: http://detail.chiebukuro.yahoo.co.jp/qa/question_detail/q14108830479
    //if (!isset($_GET['name'], $_GET['id']) || !is_string($name = $_GET['name']) || !is_string($id = $_GET['id'])) {
    //    throw new Exception('invalid GET parameters');
    //} 

    $user_id = "ping";
    $user_name = "pingさん";
    $user_email = "root@anonymous.com";
    $user_pass_tmp = "hogehoge"; 
    $user_pass = md5($user_pass_tmp);
    $user_last_login = $time = date("Y")."-".date("n")."-".date("d")." ". date("H").":". date("i").":". date("s");

    $dbh = new PDO(DSN, USER, PASS);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $dbh -> query("SET NAMES utf8");

    $sql = "INSERT INTO next_c.M_USER ";
    $sql .= "(USER_ID, USER_NAME, USER_EMAIL, USER_PASS, USER_PASS_TMP, USER_LAST_LOGIN) ";
    $sql .= "VALUES (:USER_ID, :USER_NAME, :USER_EMAIL, :USER_PASS, :USER_PASS_TMP, :USER_LAST_LOGIN)";
    //:USER_ID.....はバインド変数なので""は必要ない
    $st = $dbh->prepare($sql);
    
    //基本的にPDO::PARAM_STR 
    //"NULL"を代入する場合もPDO::PARAM_STR
    //たまにPDO::PARAM_INTも使用するが変数の型に注意
    
    $st -> bindParam(":USER_ID", $user_id, PDO::PARAM_STR);
    $st -> bindParam(":USER_NAME", $user_name, PDO::PARAM_STR);
    $st -> bindParam(":USER_EMAIL", $user_email, PDO::PARAM_STR);
    $st -> bindParam(":USER_PASS", $user_pass, PDO::PARAM_STR);
    $st -> bindParam(":USER_PASS_TMP", $user_pass_tmp, PDO::PARAM_STR);
    $st -> bindParam(":USER_LAST_LOGIN", $time, PDO::PARAM_STR);
    var_dump($st);
    

    $st->execute();#array($name, $id));

} catch (Exception $e){
    echo 'エラー: ' . $e->getMessage();
}

?>