<?php
require_once(dirname(__FILE__) . '/abstract_dao.php');

class MutterSelectDAO extends AbstractDAO{

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
    $sql .= $this->singleWhereSql('mutter_id','user_id');

    $ary = $this->exeSelectSql($sql);

    $this->setReturnAry($ary);
  }

  public function setMutterId($mutter_id){
    $this->putInputAry('mutter_id', $mutter_id);
  }

  public function setUserId($user_id){
    $this->putInputAry('user_id', $user_id);
  }
}

/*
$dao = new MutterSelectDAO;
//$dao->setUserId('kanzakiranko');
$dao->setMutterId(1);
$dao->accessDB();
print_r($dao->getReturnAry());
*/