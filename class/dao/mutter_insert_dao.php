<?php
require_once(dirname(__FILE__) . '/abstract_dao.php');
require_once(dirname(__FILE__) . '/../../common/common.php');

class MutterInsertDAO extends AbstractDAO{
  private $user_id = "";

  function __construct(){
    $this->setTable("T_MUTTER");
    $this->setColumnAry(array(
      // "mutter_id",
      "user_id",
      // "mutter_title",
      "mutter_detail",
      "mutter_date",
      // "mutter_img",
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


//$model = new MutterInsertDAO;
//$mutter_ary = array();
//$mutter_ary['user_id'] = 'kanzakiranko';
//$mutter_ary['mutter_detail'] = "華蕾夢ミル狂詩曲～魂ノ導～";
//$mutter_ary['mutter_date'] = NOW_TIME;
//var_dump($mutter_ary);

//$model->setInputAry($mutter_ary);
//$model->getInputAry();

//$model->accessDB();
//$model->getReturnAry();