<?php
require_once(dirname(__FILE__) . '/abstract_dao.php');

class ThemeResponseSelectDAO extends AbstractDAO{

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
    $sql = $this->makeSelectSql();
    // WHERE文を追記
    $sql .= $this->singleWhereSql('theme_response_id','theme_id');

    $ary = $this->exeSelectSql($sql);

    $this->setReturnAry($ary);
  }

  public function setThemeId($theme_id){
    $this->putInputAry('theme_id', $theme_id);
  }

  public function setThemeResponseId($theme_response_id){
    $this->putInputAry('theme_response_id', $theme_response_id);
  }
}

/*$dao = new ThemeResponseSelectDAO;
$dao->setThemeId(1); //user_idやtheme_idをwhere文で指定できる
$dao->setThemeResponseId(1);
$dao->accessDB();
print_r($dao->getReturnAry());*/

