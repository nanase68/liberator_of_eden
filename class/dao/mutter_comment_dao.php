<?php
require_once('./abstract_dao.php');

class MutterCommentDAO extends AbstractDAO{
  private $mutter_comment_id = "";
  private $data_ary = "";

  private $table = "T_MUTTER_COMMENT";
  private $column_ary = array(
    "mutter_comment_id",
    "mutter_id",
    "mutter_comment_detail",
    "mutter_comment_date",
    "user_id",
  );

  public function execute(){
    $sql = $this->makeSelectSql($this->table, $this->column_ary);
    // WHERE文を追記
    if(!empty($this->mutter_comment_id)){
      $sql .= " WHERE " . "mutter_comment_id=" . "'$this->mutter_comment_id'";
    }

    $ary = $this->exeSelectSql($sql);

    $this->data_ary = $ary;
  }

  public function setMutterCommentId($mutter_comment_id){
    print_r($mutter_comment_id);
    $this->mutter_comment_id = $mutter_comment_id;
  }
  public function getDataAry(){
    return $this->data_ary;
  }
}


$mutter_comment = new MutterCommentDAO;
$mutter_comment->setMutterCommentId("5");
$mutter_comment->accessDB();
print_r($mutter_comment->getDataAry());

