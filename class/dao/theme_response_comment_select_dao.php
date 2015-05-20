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
    //$sql = $this->makeSelectSql();
    $sql = "SELECT T_THEME_RESPONSE_COMMENT.theme_response_comment_id";
    $sql .= ", T_THEME_RESPONSE_COMMENT.theme_response_id";
    $sql .= ", T_THEME_RESPONSE_COMMENT.theme_response_comment_detail";
    $sql .= ", T_THEME_RESPONSE_COMMENT.theme_response_comment_date";
    $sql .= ", T_THEME_RESPONSE_COMMENT.user_id";
    $sql .= ", M_USER.user_name";
    $sql .= " FROM T_THEME_RESPONSE_COMMENT" . " INNER JOIN M_USER";
    $sql .= " ON T_THEME_RESPONSE_COMMENT.user_id = M_USER.user_id";
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
/**/