<?php
require_once(dirname(__FILE__) . '/abstract_dao.php');

class CheckUserIdDAO extends AbstractDAO{

  function __construct(){
    $this->setTable("M_USER");
    $this->setColumnAry(array(
      "user_id",
    ));
  }

  public function execute(){
    $sql = $this->makeSelectSql($this->getTable(), $this->getColumnAry());
    // WHERE文を追記
    $sql .= $this->singleWhereSql('user_id');

    $ary = $this->exeSelectSql($sql);

    $this->setReturnAry($ary);
  }

  public function setUserId($user_id){
    $this->putInputAry('user_id', $user_id);
  }
}

// $o = new CheckUserIdDAO;
// $o->setUserId('root');
// $o->accessDB();

