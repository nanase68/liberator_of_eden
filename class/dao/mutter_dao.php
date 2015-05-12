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
    $sql .= "M_USER.user_id, ";
    $sql .= "* FROM T_MUTTER";

    $sql .= "FROM T_MUTTER";


    $list = $this->sqlToList($sql);
    print_r($list);
  }





}


$mutter = new MutterDAO;
$mutter->accessDB();
