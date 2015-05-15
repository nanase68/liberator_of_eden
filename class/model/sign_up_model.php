<?php
require_once(dirname(__FILE__) . '/../../common/common.php');
require_once(dirname(__FILE__) . '/../dao/user_insert_dao.php');
require_once(dirname(__FILE__) . '/../dao/sign_up_dao.php');

class SignUpModel{
  private $select_dao; //クラスインスタンス
  private $insert_dao; //クラスインスタンス
  private $data_ary = "";

  function __construct(){
    $this->select_dao = new SignUpDao;
    $this->insert_dao = new UserInsertDao;
  }

  public function printHtml(){
    $this->exeDao();
    return($this->makeHtml());
  }
  public function checkParam($name, $email){


  }

  public function putParam(){
    $user_ary = array();

    //common/get_user.php
    global $user_name;
    $user_ary['user_name'] = $user_name;
    $user_ary['user_email'] = 'test';
    $user_ary['user_pass_tmp'] = '';
    $user_ary['user_pass'] = '';
    $user_ary['user_last_login'] = NOW_TIME;

    // $user_ary['user_name'] = $user_;
    // $user_ary['user_email'] = ;
    // $user_ary['user_pass_tmp'] = ;
    // $user_ary['user_pass'] = ;
    // $user_ary['user_last_login'] = ;

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

$m = new SignUpModel;
$m->putParam();
$m->printHtml();
