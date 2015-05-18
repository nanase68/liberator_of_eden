<?php
require_once(dirname(__FILE__) . '/abstract_dao.php');

class MutterFavoritesDeleteDAO extends AbstractDAO{
  private $user_id = "";

  function __construct(){
    $this->setTable("T_MUTTER_FAVORITES");
    $this->setColumnAry(array(
      // "mutter_favorites_id",
      "user_id",
      "mutter_id",
      //"mutter_favorites_date",
    ));
  }

  public function execute(){
    $sql = $this->makeDeleteSql($this->getTable(), $this->getColumnAry());
    $this->exeDeleteSql($sql, $this->getColumnAry());
  }
}

/*
$model = new MutterFavoritesDeleteDAO;
$mutter_ary = array();
$mutter_ary['user_id'] = 'root';
$mutter_ary['mutter_id'] = 3;
//var_dump($mutter_ary);

$model->setInputAry($mutter_ary);
//$model->getInputAry();

$model->accessDB();
$model->getReturnAry();
*/