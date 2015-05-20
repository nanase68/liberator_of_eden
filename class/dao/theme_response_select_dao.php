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
    $sql = "SELECT ";
    $sql .= "T_THEME_RESPONSE.theme_response_id, ";
    $sql .= "T_THEME_RESPONSE.theme_id, ";
    $sql .= "T_THEME_RESPONSE.theme_response_title, ";
    $sql .= "T_THEME_RESPONSE.theme_response_detail, ";
    $sql .= "T_THEME_RESPONSE.theme_response_date, ";
    $sql .= "T_THEME_RESPONSE.theme_response_img, ";
    $sql .= "M_USER.user_name ";
    
    $sql .= "FROM T_THEME_RESPONSE ";
    
    $sql .= "INNER JOIN M_USER ";
    $sql .= "ON T_THEME_RESPONSE.user_id = M_USER.user_id";

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

