<?php
require_once(dirname(__FILE__) . '/abstract_dao.php');
require_once(dirname(__FILE__) . '/../../common/common.php');

class MutterFavoritesInsertDAO extends AbstractDAO{
  private $user_id = "";

  function __construct(){
    $this->setTable("T_MUTTER_FAVORITES");
    $this->setColumnAry(array(
      //"mutter_favorites_id",
      "user_id",
      "mutter_id",
      "mutter_favorites_date",
    ));
  }

  public function putMutter($mutter_ary){
    $this->setInputAry($mutter_ary);
  }


  public function execute(){
    $sql = $this->makeInsertSql($this->getTable(), $this->getColumnAry());

    $this->exeInsertSql($sql, $this->getColumnAry());
  }
}
