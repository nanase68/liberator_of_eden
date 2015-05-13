<?php
require_once('./abstract_dao.php');

class ThemeResponseCommentDAO extends AbstractDAO{
  private $theme_response_comment_id = "";
  private $data_ary = "";

  private $table = "T_THEME_RESPONSE_COMMENT";
  private $column_ary = array(
    "theme_response_comment_id",
    "theme_response_id",
    "theme_response_comment_detail",
    "theme_response_comment_date",
    "user_id",
  );

  public function execute(){
    $sql = $this->makeSelectSql($this->table, $this->column_ary);
    // WHERE文を追記
    if(!empty($this->theme_response_comment_id)){
      $sql .= " WHERE " . "theme_response_comment_id=" . "'$this->theme_response_comment_id'";
    }

    $ary = $this->exeSelectSql($sql);

    $this->data_ary = $ary;
  }

  public function setThemeResponseCommentId($theme_response_comment_id){
    print_r($theme_response_comment_id);
    $this->theme_response_comment_id = $theme_response_comment_id;
  }
  public function getDataAry(){
    return $this->data_ary;
  }
}


$theme_response_comment = new ThemeResponseCommentDAO;
$theme_response_comment->setThemeResponseCommentId("5");
$theme_response_comment->accessDB();
print_r($theme_response_comment->getDataAry());

