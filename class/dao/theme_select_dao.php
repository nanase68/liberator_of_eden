<?php
require_once(dirname(__FILE__) . '/abstract_dao.php');

class ThemeDAO extends AbstractDAO{
  private $theme_id = "";

  function __construct(){
    $this->setTable("T_THEME");
    $this->setColumnAry(array(
      "theme_id",
      "user_id",
      "theme_response_detail",
      "theme_create_date",
    ));
  }

  public function execute(){
    $sql = $this->makeSelectSql($this->getTable(), $this->getColumnAry());
    // WHERE文を追記
    if(!empty($this->theme_id)){
      $sql .= " WHERE " . "theme_id=" . "'$this->theme_id'";
    }

    $ary = $this->exeSelectSql($sql);

    $this->setReturnAry($ary);
  }

  public function setThemeId($theme_id){
    $this->theme_id = $theme_id;
  }
}

