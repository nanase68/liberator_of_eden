<?php
require_once('./abstract_dao.php');

class MutterDAO extends AbstractDAO{
  private $mutter_id;
  private $user_id;
  private $mutter_title;
  private $mutter_detail;
  private $mutter_date;
  private $mutter_img;

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
    $sql = $this->makeSql($this->table, $this->column_ary);

    $list = $this->sqlToList($sql);
    print_r($list);
  }

}


$mutter = new MutterDAO;
$mutter->accessDB();
