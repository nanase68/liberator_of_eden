<?php
require_once(dirname(__FILE__) . '/abstract_dao.php');

class ThemeDeleteDAO extends AbstractDAO{
  function __construct(){
    $this->setTable("T_THEME");
    $this->setColumnAry(array(
      "theme_id",
      //"user_id",
      //"theme_title",
      //"theme_create_date",
    ));
  }

  public function execute(){
    $sql = $this->makeDeleteSql($this->getTable(), $this->getColumnAry());
    $this->exeDeleteSql($sql, $this->getColumnAry());
  }
}

/*
$model = new ThemeDeleteDAO;
$theme_ary = array();
$theme_ary['theme_id'] = 21;
//$theme_ary['user_id'] = 'root';
//var_dump($theme_ary);

$model->setInputAry($theme_ary);
print_r($model->getInputAry());

$model->accessDB();
*/