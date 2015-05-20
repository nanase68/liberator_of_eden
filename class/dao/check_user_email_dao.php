<?php
require_once(dirname(__FILE__) . '/abstract_dao.php');

class CheckUserEmailDAO extends AbstractDAO{

  function __construct(){
    $this->setTable("M_USER");
    $this->setColumnAry(array(
      "user_id",
    ));
  }

  public function execute(){
    $sql = $this->makeSelectSql($this->getTable(), $this->getColumnAry());
    // WHERE文を追記
    $sql .= $this->singleWhereSql('user_email');

    $ary = $this->exeSelectSql($sql);

    $this->setReturnAry($ary);
  }

  public function setUserEmail($email){
    $this->putInputAry('user_email', $email);
  }
}
