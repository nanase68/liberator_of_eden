<?php
require_once(dirname(__FILE__) . '/abstract_dao.php');

class UserSelectDAO extends AbstractDAO{

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
    $sql = $this->makeSelectSql();
    // WHERE文を追記
    $sql .= $this->singleWhereSql('user_id');

    $ary = $this->exeSelectSql($sql);

    $this->setReturnAry($ary);
  }

  public function setUserId($user_id){
    $this->putInputAry('user_id', $user_id);
  }
}

//$dao = new UserSelectDao;
//$dao->setUserId("kanzakiranko");
//$dao->accessDB();
//print_r($dao->getReturnAry());
