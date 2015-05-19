<?php
require_once(dirname(__FILE__) . '/abstract_dao.php');

class ThemeResponseCommentDAO extends AbstractDAO{

  function __construct(){
    $this->setTable("T_THEME_RESPONSE_COMMENT");
    $this->setColumnAry(array(
      "theme_response_comment_id",
      "theme_response_id",
      "theme_response_comment_detail",
      "theme_response_comment_date",
      "user_id",
    ));
  }

  public function execute(){
    $sql = $this->makeSelectSql();
    // WHERE文を追記
    $sql .= $this->singleWhereSql('theme_response_comment_id');

    $ary = $this->exeSelectSql($sql);

    $this->setReturnAry($ary);
  }

  public function setThemeResponseCommentId($theme_response_comment_id){
    $this->putInputAry('theme_response_comment_id', $theme_response_comment_id);
  }
}

