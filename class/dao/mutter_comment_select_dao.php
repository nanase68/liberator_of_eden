<?php
require_once(dirname(__FILE__) . './abstract_dao.php');

class MutterCommentDAO extends AbstractDAO{

  function __construct(){
    $this->setTable("T_MUTTER_COMMENT");
    $this->setColumnAry(array(
      "mutter_comment_id",
      "mutter_id",
      "mutter_comment_detail",
      "mutter_comment_date",
      "user_id",
    ));
  }

  public function execute(){
    $sql = $this->makeSelectSql();
    // WHERE文を追記
    $sql .= $this->singleWhereSql('mutter_comment_id');

    $ary = $this->exeSelectSql($sql);

    $this->setReturnAry($ary);
  }

  public function setMutterCommentId($mutter_comment_id){
    $this->putInputAry('mutter_comment_id', $mutter_comment_id);
  }
}
