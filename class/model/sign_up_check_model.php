<?php
ini_set( 'display_errors', 1 );
// このモデルはユーザーサイドのajaxからのPOSTで起動する

if(isset($_POST['user_id'])){
  // ajaxからpostされる
  $model = new SignUpCheckModel;
  $return = $model->checkUserId($_POST['user_id']);
  echo($return);
} else if(isset($_POST['user_email'])){
  // ajaxからpostされる
  $model = new SignUpCheckModel;
  $return = $model->checkUserEmail($_POST['user_email']);
  echo($return);
}

class SignUpCheckModel{
  public function checkUserId($user_id){
    require_once(dirname(__FILE__) . '/../dao/check_user_id_dao.php');

    $dao = new CheckUserIdDao;
    $dao->setUserId($user_id);
    $dao->accessDB();
    $return_ary = $dao->getReturnAry();

    if(empty($return_ary)){
      return("ok");
    } else {
      return("ng");
    }
  }

  public function checkUserEmail($user_email){
    require_once(dirname(__FILE__) . '/../dao/check_user_email_dao.php');

    $dao = new CheckUserEmailDao;
    $dao->setUserEmail($user_email);
    $dao->accessDB();
    $return_ary = $dao->getReturnAry();

    if(empty($return_ary)){
      return("ok");
    } else {
      return("ng");
    }
  }
}

// $check_model = new SignUpCheckModel;
// print_r($check_model->checkUserId('root') == "ng");
// print_r($check_model->checkUserEmail('root'));
