<?php
require_once(dirname(__FILE__) . '/abstract_dao.php');

class ThemeSelectDAO extends AbstractDAO{
  function __construct(){
    $this->setTable("T_THEME");
    $this->setColumnAry(array(
      "theme_id",
      "user_id",
      "theme_title",
      "theme_create_date",
    ));
  }

  public function execute(){
    //$sql = $this->makeSelectSql();
    $sql = "SELECT T_THEME.theme_id, T_THEME.user_id,
            T_THEME.theme_title, T_THEME.theme_create_date,
            M_USER.user_name";
    $sql .= " FROM T_THEME" . " INNER JOIN M_USER";
    $sql .= " ON T_THEME.user_id = M_USER.user_id";
    //echo $sql;
    // WHERE文を追記
    $sql .= $this->singleWhereSql('user_id', 'theme_id');
    //echo $sql;

    $ary = $this->exeSelectSql($sql);

    $this->setReturnAry($ary);
  }

  public function setUserId($user_id){
    $this->putInputAry('user_id', $user_id);
  }

  public function setThemeId($theme_id){
    $this->putInputAry('theme_id', $theme_id);
  }

}

/*
$dao = new ThemeSelectDao;
$dao->setUserId("root"); //user_idやtheme_idをwhere文で指定できる
$dao->setThemeId(1);
$dao->accessDB();
print_r($dao->getReturnAry());
*/