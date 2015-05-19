<?php
require_once(dirname(__FILE__) . '/abstract_dao.php');

class ThemeResponseCommentSelectDAO extends AbstractDAO{

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
    $sql .= $this->singleWhereSql('theme_response_id');

    $ary = $this->exeSelectSql($sql);

    $this->setReturnAry($ary);
  }

  public function setThemeResponseId($theme_response_id){
    $this->putInputAry('theme_response_id', $theme_response_id);
  }
}

/*
$model = new ThemeResponseCommentSelectDAO;
$model->setThemeResponseId(1);
$model->accessDB();
print_r($model->getReturnAry());
*/