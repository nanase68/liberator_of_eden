<?php
require_once(dirname(__FILE__) . '/abstract_dao.php');
require_once(dirname(__FILE__) . '/../../common/common.php');
//後で直す


class ThemeResponseCommentInsertDAO extends AbstractDAO{

  function __construct(){
    $this->setTable("T_THEME_RESPONSE_COMMENT");
    $this->setColumnAry(array(
      //"theme_response_comment_id",
      "theme_response_id",  
      "theme_response_comment_detail",
      "theme_response_comment_date",
      "user_id",
    ));
  }

  public function putThemeResponseComment($comment_ary){
    $this->setInputAry($comment_ary);
  }


  public function execute(){
    $sql = $this->makeInsertSql();

    $this->exeInsertSql($sql);
  }
}

/*
$model = new ThemeResponseCommentInsertDAO;
$comment_ary = array();
$comment_ary['theme_response_id'] = 1;
$comment_ary['theme_response_comment_detail'] = '巴マミさんじゅうよんさい';
$comment_ary['theme_response_comment_date'] = NOW_TIME;
$comment_ary['user_id'] = 'root';
//var_dump($comment_ary);

$model->setInputAry($comment_ary);
//$model->getInputAry();

$model->accessDB();
$model->getReturnAry();
*/