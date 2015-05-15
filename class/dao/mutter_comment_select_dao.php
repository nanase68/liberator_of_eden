<?php
require_once(dirname(__FILE__) . './abstract_dao.php');

class MutterCommentDAO extends AbstractDAO{
  private $mutter_comment_id = "";

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
    $sql = $this->makeSelectSql($this->getTable(), $this->getColumnAry());
    // WHERE文を追記
    if(!empty($this->mutter_comment_id)){
      $sql .= " WHERE " . "mutter_comment_id=" . "'$this->mutter_comment_id'";
    }

    $ary = $this->exeSelectSql($sql);

    $this->setReturnAry($ary);
  }

  public function setMutterCommentId($mutter_comment_id){
    $this->mutter_comment_id = $mutter_comment_id;
  }
}
