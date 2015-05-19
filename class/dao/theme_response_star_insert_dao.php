<?php
require_once(dirname(__FILE__) . '/abstract_dao.php');

class ThemeResponseStarInsertDAO extends AbstractDAO{

  function __construct(){
    $this->setTable("T_THEME_RESPONSE_STAR");
    $this->setColumnAry(array(
      "t_theme_response_star_id",
      "theme_response_id",
      "t_theme_response_star_point",
      "t_theme_response_date",
      "user_id"
    ));
  }

  public function putUser($theme_response_ary){
    $this->setInputAry($theme_response_ary);
  }

  public function execute(){
    $sql = $this->makeInsertSql();

    $this->exeInsertSql($sql);
  }
}
