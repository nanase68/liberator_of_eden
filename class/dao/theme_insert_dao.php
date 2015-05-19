<?php
require_once(dirname(__FILE__) . '/abstract_dao.php');
require_once(dirname(__FILE__) . '/../../common/common.php');

class ThemeInsertDAO extends AbstractDAO{
  private $user_id = "";

  function __construct(){
    $this->setTable("T_THEME");
    $this->setColumnAry(array(
      //"theme_id", //auto incrementされる
      "user_id",
      "theme_title",
      "theme_create_date",
    ));
  }

  public function putTheme($theme_ary){
    $this->setInputAry($theme_ary);
  }


  public function execute(){
    $sql = $this->makeInsertSql($this->getTable(), $this->getColumnAry());

    $this->exeInsertSql($sql, $this->getColumnAry());
  }
}


$model = new ThemeInsertDAO;
$theme_ary = array();
$theme_ary['user_id'] = 'root';
$theme_ary['theme_title'] = "ぬるぽ";
$theme_ary['theme_create_date'] = NOW_TIME;
var_dump($theme_ary);

$model->setInputAry($theme_ary);
print_r($model->getInputAry());

$model->accessDB();
print_r($model->getReturnAry());