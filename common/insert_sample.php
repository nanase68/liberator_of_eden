<?php
require("common/connect.php");
try{
    //auto_incrementが適応されているIDの場合は $user_id = "NULL";でNULLを代入する
    $user_id = "root";
    $user_name = "ルートさん";
    $user_email = "root@anonymous.com";
    $user_pass_tmp = "hogehoge"; 
    $user_pass = md5($user_pass_tmp);
    $user_last_login = $time = date("Y")."-".date("n")."-".date("d")." ". date("H").":". date("i").":". date("s");



    $dbh = new PDO(DSN, USER, PASS);
    $dbh -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $dbh -> beginTransaction();
    $dbh -> query("SET NAMES utf8");
    
    
    //複数個の値をINSERTする場合は↓
    //$sql = "INSERT INTO next_c.M_USER (USER_ID, USER_NAME, USER_EMAIL, USER_PASS, USER_PASS_TMP, USER_LAST_LOGIN) VALUES (?, ?, ?, ?, ?, ?)";
    //↑の使い方はGoogleさんに聞いて
    
    $sql = "INSERT INTO next_c.M_USER ";
    $sql .= "(USER_ID, USER_NAME, USER_EMAIL, USER_PASS, USER_PASS_TMP, USER_LAST_LOGIN) ";
    $sql .= "VALUES (:USER_ID, :USER_NAME, :USER_PASS, :USER_PASS_TMP, :USER_LAST_LOGIN)";
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
    
    //コミットすると適用される
    $dbh -> commit();
} catch (PDOException $e) {
    echo $e;
    exit;
}
?>