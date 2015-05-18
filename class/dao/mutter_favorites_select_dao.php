<?php
require_once(dirname(__FILE__) . '/abstract_dao.php');

class MutterFavoritesSelectDao extends AbstractDAO{
  private $mutter_favorites_id = "";
  private $mutter_id = "";
  private $user_id = "";

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
    $sql = $this->makeSelectSql($this->getTable(), $this->getColumnAry());
    // WHERE文を追記
    $sql .= " WHERE";
    if(!empty($this->mutter_favorites_id)){
      $sql .= " mutter_favorites_id='$this->mutter_favorites_id' AND";
    }
    if(!empty($this->mutter_id)){
      $sql .= " mutter_id='$this->mutter_id' AND";
    }
    if(!empty($this->user_id)){
      $sql .= " user_id='$this->user_id'";
    }

    //SQL文の末尾にANDやWHEREが存在する場合、削除
    $sql = rtrim($sql , " AND");
    $sql = rtrim($sql , " WHERE");

    $ary = $this->exeSelectSql($sql);

    $this->setReturnAry($ary);
  }

  public function setMutterFavoritesId($mutter_favorites_id){
    $this->mutter_favorites_id = $mutter_favorites_id;
  }

  public function setMutterId($mutter_id){
    $this->mutter_id = $mutter_id;
  }

  public function setUserId($user_id){
    $this->user_id = $user_id;
  }
}


//$dao = new MutterFavoritesSelectDao;
//$dao->setUserId("kanzakiranko");
//$dao->setMutterId(10);
//$dao->accessDB();
//print_r($dao->getReturnAry());