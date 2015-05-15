<?php
require_once(dirname(__FILE__) . '/abstract_dao.php');

class ThemeResponseDAO extends AbstractDAO{
  private $theme_response_id = "";

  function __construct(){
    $this->setTable("T_THEME_RESPONSE");
    $this->setColumnAry(array(
      "theme_response_id",
      "theme_id",
      "theme_response_title",
      "theme_response_detail",
      "theme_response_date",
      "theme_response_img",
    ));
  }

  public function execute(){
    $sql = $this->makeSelectSql($this->getTable(), $this->getColumnAry());
    // WHERE文を追記
    if(!empty($this->theme_response_id)){
      $sql .= " WHERE " . "theme_response_id=" . "'$this->theme_response_id'";
    }

    $ary = $this->exeSelectSql($sql);

    $this->setReturnAry($ary);
  }

  public function setThemeResponseId($theme_response_id){
    $this->theme_response_id = $theme_response_id;
  }
}

