<?php
require_once(dirname(__FILE__) . '/abstract_dao.php');

class ThemeResponseCommentDeleteDAO extends AbstractDAO{
  function __construct(){
    $this->setTable("T_THEME_RESPONSE_COMMENT");
    $this->setColumnAry(array(
      "theme_response_comment_id",
      //"theme_response_id",  
      //"theme_response_comment_detail",
      //"theme_response_comment_date",
      //"user_id",
    ));
  }

  public function execute(){
    $sql = $this->makeDeleteSql($this->getTable(), $this->getColumnAry());
    $this->exeDeleteSql($sql, $this->getColumnAry());
  }
}

/*
$model = new ThemeResponseCommentDeleteDAO;
$comment_ary = array();
$comment_ary['theme_response_comment_id'] = 6;
//$comment_ary['user_id'] = 'root';
//var_dump($comment_ary);

$model->setInputAry($comment_ary);
//print_r($model->getInputAry());

$model->accessDB();
*/