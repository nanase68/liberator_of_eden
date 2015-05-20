<?php
require_once(dirname(__FILE__) . '/abstract_dao.php');

class ThemeResponseStarUpdateDAO extends AbstractDAO{

  function __construct(){
    $this->setTable("T_THEME_RESPONSE_STAR");
    $this->setColumnAry(array(
      // "t_theme_response_star_id",
      // "theme_response_id",
      "t_theme_response_star_point",
      // "t_theme_response_date",
      // "user_id"
    ));
  }


  public function execute(){
    $sql = $this->makeUpdateSql('t_theme_response_star_point');
    // WHERE文を追記user_id
    $sql .= $this->singleWhereSql('theme_response_id', 'user_id');

    $this->exeUpdateSql($sql);
  }

  public function setResponseId($theme_response_id){
    $this->putInputAry('theme_response_id', $theme_response_id);
  }

  public function setUserId($user_id){
    $this->putInputAry('user_id', $user_id);
  }

  public function setStarPoint($star_point){
    $this->putInputAry('t_theme_response_star_point', $star_point);
  }
}


