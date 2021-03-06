<?php
require_once(dirname(__FILE__) . '/abstract_dao.php');

class MutterFavoritesSelectDao extends AbstractDAO{

  function __construct(){
    $this->setTable("T_MUTTER_FAVORITES");
    $this->setColumnAry(array(
      "mutter_favorites_id",
      "user_id",
      "mutter_id",
      "mutter_favorites_date",
    ));
  }

  public function execute(){
    $sql = $this->makeSelectSql();
    // WHERE文を追記
    $sql .= $this->singleWhereSql('mutter_favorites_id', 'mutter_id', 'user_id');

    $ary = $this->exeSelectSql($sql);

    $this->setReturnAry($ary);
  }

  public function setMutterFavoritesId($mutter_favorites_id){
    $this->putInputAry('mutter_favorites_id', $mutter_favorites_id);
  }

  public function setMutterId($mutter_id){
    $this->putInputAry('mutter_id', $mutter_id);
  }

  public function setUserId($user_id){
    $this->putInputAry('user_id', $user_id);
  }
}


//$dao = new MutterFavoritesSelectDao;
//$dao->setUserId("kanzakiranko");
//$dao->setMutterId(10);
//$dao->accessDB();
//print_r($dao->getReturnAry());
