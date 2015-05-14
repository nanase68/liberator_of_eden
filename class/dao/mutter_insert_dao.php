<?php
require_once(dirname(__FILE__) . '/abstract_dao.php');
require_once(dirname(__FILE__) . '../../common/common.php');

class MutterSelectDAO extends AbstractDAO{
  private $user_id = "";

  function __construct(){
    $this->setTable("T_MUTTER");
    $this->setColumnAry(array(
      "mutter_id",
      "user_id",
      "mutter_title",
      "mutter_detail",
      "mutter_date",
      "mutter_img",
    ));
  }

  public function putMutter($mutter_ary){
    $this->setInputAry($mutter_ary);
  }


  public function execute(){
    $sql = $this->makeInsertSql($this->getTable(), $this->getColumnAry());

    $this->exeInsertSql($sql, $this->getColumnAry());
  }
}
