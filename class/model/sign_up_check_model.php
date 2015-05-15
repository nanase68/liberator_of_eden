<?php
// このモデルはユーザーサイドのajaxからのPOSTで起動する
if(isset($_POST['user_name'])){
  // ajaxからpostされる
  $user_name = $_POST['user_name'];

  require_once(dirname(__FILE__) . '/../dao/check_user_name_dao.php');

  $dao = new CheckUserNameDao;
  $dao->setUserName($user_name);
  $dao->accessDB();
  $return_ary = $dao->getReturnAry();

  if(empty($return_ary)){
    echo('false');
  } else {
    echo('true');
  }
} else if(isset($_POST['user_name'])){
  // ajaxからpostされる
  $user_email = $_POST['user_email'];

  require_once(dirname(__FILE__) . '/../dao/check_user_email_dao.php');

  $dao = new CheckUserEmailDao;
  $dao->setUserEmail($user_email);
  $dao->accessDB();
  $return_ary = $dao->getReturnAry();

  if(empty($return_ary)){
    echo('false');
  } else {
    echo('true');
  }
}

