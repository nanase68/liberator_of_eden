<?php
require_once(dirname(__FILE__) . '/abstract_dao.php');

class ThemeResponseCommentDAO extends AbstractDAO{
  private $theme_response_comment_id = "";

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
    $sql = $this->makeSelectSql($this->getTable(), $this->getColumnAry());
    // WHERE文を追記
    if(!empty($this->theme_response_comment_id)){
      $sql .= " WHERE " . "theme_response_comment_id=" . "'$this->theme_response_comment_id'";
    }

    $ary = $this->exeSelectSql($sql);

    $this->setReturnAry($ary);
  }

  public function setThemeResponseCommentId($theme_response_comment_id){
    $this->theme_response_comment_id = $theme_response_comment_id;
  }
}

