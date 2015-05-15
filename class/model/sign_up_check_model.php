<?php
// このモデルはユーザーサイドのajaxからのPOSTで起動する
$model = new SignUpCheckModel;

if(isset($_POST['user_name'])){
  // ajaxからpostされる
  $return = $model->checkUserName($_POST['user_name']);
  echo($return);
} else if(isset($_POST['user_email'])){
  // ajaxからpostされる
  $return = $model->checkUserEmail($_POST['user_email']);
  echo($return);
}

class SignUpCheckModel{
  public function checkUserName($user_name){
    require_once(dirname(__FILE__) . '/../dao/check_user_name_dao.php');

    $dao = new CheckUserNameDao;
    $dao->setUserName($user_name);
    $dao->accessDB();
    $return_ary = $dao->getReturnAry();

    if(empty($return_ary)){
      return(false);
    } else {
      return(true);
    }
  }

  public function checkUserEmail($user_email){
    require_once(dirname(__FILE__) . '/../dao/check_user_email_dao.php');

    $dao = new CheckUserEmailDao;
    $dao->setUserEmail($user_email);
    $dao->accessDB();
    $return_ary = $dao->getReturnAry();

    if(empty($return_ary)){
      return(false);
    } else {
      return(true);
    }
  }
}
