<?php
require_once(dirname(__FILE__) . '/abstract_dao.php');

class LoginDAO extends AbstractDAO{

  function __construct(){
    $this->setTable("M_USER");
    $this->setColumnAry(array(
      "user_id",
      "user_name",
      "user_last_login",
    ));  
  }

  public function execute(){
    $sql = $this->makeSelectSql($this->getTable(), $this->getColumnAry());
    // WHERE文を追記
    if(!empty($this->popInputAry('user_id')) && !empty($this->popInputAry('user_pass'))){
      $sql .= " WHERE " . "user_id=" . ":user_id" . " AND " . "user_pass=" . ":user_pass";
    }

    $ary = $this->exeSelectSql($sql);

    $this->setReturnAry($ary);
  }

  public function setUserId($user_id){
    $this->putInputAry('user_id', $user_id);
  }

  public function setUserPass($user_pass){
    $this->putInputAry('user_pass', $user_pass);
  }
}

//$login = new LoginDAO;
//$login->setUserId("5");
//$login->accessDB();
//print_r($login->getReturnAry());
