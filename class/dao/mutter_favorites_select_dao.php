<?php
require_once(dirname(__FILE__) . '/abstract_dao.php');

class MutterFavoritesDAO extends AbstractDAO{
  private $mutter_favorites_id = "";

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
    if(!empty($this->mutter_favorites_id)){
      $sql .= " WHERE " . "mutter_favorites_id=" . "'$this->mutter_favorites_id'";
    }

    $ary = $this->exeSelectSql($sql);

    $this->setReturnAry($ary);
  }

  public function setMutterFavoritesId($mutter_favorites_id){
    $this->mutter_favorites_id = $mutter_favorites_id;
  }
}
