<?php
require_once(dirname(__FILE__) . '/abstract_dao.php');

class ThemeFavoritesDAO extends AbstractDAO{

  function __construct(){
    $this->setTable("T_THEME_FAVORITES");
    $this->setColumnAry(array(
      "theme_favorites_id",
      "user_id",
      "theme_id",
      "theme_favorites_date",
    ));
  }

  public function execute(){
    $sql = $this->makeSelectSql();
    // WHERE文を追記
    $sql .= $this->singleWhereSql('theme_favorites_id');

    $ary = $this->exeSelectSql($sql);

    $this->setReturnAry($ary);
  }

  public function setThemeFavoritesId($theme_favorites_id){
    $this->putInputAry('theme_favorites_id', $theme_favorites_id);
  }
}

