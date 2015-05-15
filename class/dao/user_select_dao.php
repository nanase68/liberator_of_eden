<?php
require_once(dirname(__FILE__) . '/abstract_dao.php');

class UserSelectDAO extends AbstractDAO{
  private $user_id = "";

  function __construct(){
    $this->setTable("M_USER");
    $this->setColumnAry(array(
      "user_id",
      "user_name",
      "user_email",
      "user_pass",
      "user_pass_tmp",
      "user_last_login"
    ));
  }

  public function execute(){
    $sql = $this->makeSelectSql($this->getTable(), $this->getColumnAry());
    // WHERE文を追記
    if(!empty($this->user_id)){
      $sql .= " WHERE " . "user_id=" . "'$this->user_id'";
    }

    $ary = $this->exeSelectSql($sql);

    $this->setReturnAry($ary);
  }

  public function setUserId($user_id){
    $this->user_id = $user_id;
  }
}

//$dao = new UserSelectDao;
//$dao->setUserId("kanzakiranko");
//$dao->accessDB();
//print_r($dao->getReturnAry());