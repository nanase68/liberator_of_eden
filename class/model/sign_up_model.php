<?php
require_once(dirname(__FILE__) . '/../../common/common.php');
require_once(dirname(__FILE__) . '/../dao/user_insert_dao.php');
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

  private function checkParam($id, $email, $pass){
    $check_model = new SignUpCheckModel;
    // 重複チェック
    if(($check_model->checkUserId($id) == "ng") || ($check_model->checkuserEmail($email) == "ng")){
      Common::goToError('idまたはemailがすでに存在します。');
    }

    // idの正当性チェック
    $pattern = "/^([a-zA-Z0-9\._-])+$/";
    if(!preg_match($pattern, $id)){
      Common::goToError('idが不正です。');
    }

    // Emailの正当性チェック
    $pattern = "/^([a-zA-Z0-9])+([a-zA-Z0-9\._-])*@([a-zA-Z0-9_-])+([a-zA-Z0-9\._-]+)+$/";
    if(!preg_match($pattern, $email)){
      Common::goToError('emailが不正です。');
    }

    // passの正当性チェック
    $pattern = "/^([a-zA-Z0-9\._-])+$/";
    if(!preg_match($pattern, $pass)){
      Common::goToError('パスワードが不正です。');
    }

    // 文字数チェック
    if(strlen($pass) < 8){
      Common::goToError('パスワードが８文字未満です。');
    }
  }

  public function putParam($user_id, $user_name, $user_email, $user_pass){
    // エスケープ処理
    $user_id = htmlspecialchars($user_id, ENT_QUOTES);
    $user_name = htmlspecialchars($user_name, ENT_QUOTES);
    $user_email = htmlspecialchars($user_email, ENT_QUOTES);
    $user_pass = htmlspecialchars($user_pass, ENT_QUOTES);

    // 各パラメータの正当性チェック
    $this->checkParam($user_id, $user_email, $user_pass);

    $user_ary = array();
    $user_ary['user_id'] = $user_id;
    $user_ary['user_name'] = $user_name;
    $user_ary['user_email'] = $user_email;
    $user_ary['user_pass_tmp'] = NULL;
    $user_ary['user_pass'] = md5($user_pass);
    $user_ary['user_last_login'] = NOW_DATE;

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
