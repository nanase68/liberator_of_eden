<?php
require_once(dirname(__FILE__) . '/abstract_dao.php');

class MyPageMuttersSelectDAO extends AbstractDAO{
  private $user_id = "";

  function __construct(){
    $this->setTable("T_MUTTER");
    $this->setColumnAry(array(
      "mutter_id",
      "user_id",  
      "mutter_title",
      "mutter_detail",
      "mutter_date",
      "mutter_img",
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
