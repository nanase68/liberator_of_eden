<?php
require_once('./abstract_dao.php');

class MutterDAO extends AbstractDAO{
  private $dataAry = "";

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

    $ary = $this->exeSql($sql);

    $this->dataAry = $ary;
  }

  public function getDataAry(){
    return $this->dataAry;
  }
}


$mutter = new MutterDAO;
$mutter->accessDB();
print_r($mutter->getDataAry());

