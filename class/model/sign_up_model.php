<?php
require_once(dirname(__FILE__) . '/../../common/common.php');
require_once(dirname(__FILE__) . '/../dao/user_insert_dao.php');
require_once(dirname(__FILE__) . '/../dao/sign_up_dao.php');
require_once(dirname(__FILE__) . '/sign_up_check_model.php');

class SignUpModel{
  private $insert_dao; //クラスインスタンス
  private $data_ary = "";

  function __construct(){
    $this->insert_dao = new UserInsertDao;
  }

  public function printHtml(){
    $this->exeDao();
    return($this->makeHtml());
  }

  public function checkParam($name, $email){
    $check_model = new SignUpCheckModel;
    if(($check_model->checkUserName($name) == true) && ($check_model->checkuserEmail($email) == true)){
      // check通過
    } else {
      // checkアウト
    }
  }

  public function putParam($user_id, $user_name, $user_email, $user_pass){
    $user_ary = array();

    $user_ary['user_id'] = $user_id;
    $user_ary['user_name'] = $user_name;
    $user_ary['user_email'] = $user_email;
    $user_ary['user_pass_tmp'] = NULL;
    $user_ary['user_pass'] = md5($user_pass);
    $user_ary['user_last_login'] = NOW_TIME;

    $this->insert_dao->setInputAry($user_ary);
  }

  private function exeDao(){
    $this->insert_dao->accessDB();
    $this->data_ary = $this->insert_dao->getReturnAry();
  }

  private function makeHtml(){
    $html = "";
    return($html);
  }
}

// $m = new SignUpModel;
// $m->putParam();
// $m->printHtml();
