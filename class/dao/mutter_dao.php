<?php
require_once('./abstract_dao.php');

class MutterDAO extends AbstractDAO{
  private $mutter_id;
  private $user_id;
  private $mutter_title;
  private $mutter_detail;
  private $mutter_date;
  private $mutter_img;

  public function execute(){
    $sql = "";
    $sql .= "SELECT ";
    $sql .= "T_MUTTER.MUTTER_ID";
    $sql .= ", T_MUTTER.USER_ID";
    $sql .= ", T_MUTTER.MUTTER_TITLE";
    $sql .= ", T_MUTTER.MUTTER_DETAIL";
    $sql .= ", T_MUTTER.MUTTER_DATE";
    $sql .= ", T_MUTTER.MUTTER_IMG";

    $sql .= " FROM T_MUTTER";


    $list = $this->sqlToList($sql);
    print_r($list);
  }





}


$mutter = new MutterDAO;
$mutter->accessDB();
