<?php
require_once(dirname(__FILE__) . '/abstract_dao.php');

class MyPageMuttersSelectDAO extends AbstractDAO{

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
