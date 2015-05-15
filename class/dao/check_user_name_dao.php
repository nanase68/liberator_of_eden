<?php
require_once(dirname(__FILE__) . '/abstract_dao.php');

class CheckUserNameDAO extends AbstractDAO{
  private $select = "";

  function __construct(){
    $this->setTable("M_USER");
    $this->setColumnAry(array(
      "user_id",
    ));
  }

  public function execute(){
    $sql = $this->makeSelectSql($this->getTable(), $this->getColumnAry());
    // WHERE文を追記
    if(!empty($this->user_name)){
      $sql .= " WHERE " . "user_name=" . "'$this->select'";
    }

    $ary = $this->exeSelectSql($sql);

    $this->setReturnAry($ary);
  }

  public function setUserName($select){
    $this->select = $select;
  }
}
