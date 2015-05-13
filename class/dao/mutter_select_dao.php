<?php
require_once(dirname(__FILE__) . '/abstract_dao.php');

class MutterSelectDAO extends AbstractDAO{
  private $user_id = "";
  private $data_ary = "";

  private $table = "T_MUTTER";
  private $column_ary = array(
    "mutter_id",
    "user_id",
    "mutter_title",
    "mutter_detail",
    "mutter_date",
    "mutter_img",
  );

  public function execute(){
    $sql = $this->makeSelectSql($this->table, $this->column_ary);
    // WHERE文を追記
    if(!empty($this->user_id)){
      $sql .= " WHERE " . "user_id=" . "'$this->user_id'";
    }

    $ary = $this->exeSelectSql($sql);

    $this->data_ary = $ary;
  }

  public function setUserId($user_id){
    $this->user_id = $user_id;
  }
  public function getDataAry(){
    return $this->data_ary;
  }
  public function getTable(){
    return $this->table;
  }
  public function getColumnAry(){
    return $this->column_ary;
  }
}
