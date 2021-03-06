<?php
require_once(dirname(__FILE__) . '/abstract_dao.php');

class NewMutterDAO extends AbstractDAO{

  public function execute(){
    $sql = "SELECT T_MUTTER.MUTTER_ID, T_MUTTER.USER_ID,
            T_MUTTER.MUTTER_TITLE, T_MUTTER.MUTTER_DETAIL,
            T_MUTTER.MUTTER_DATE, T_MUTTER.MUTTER_IMG,
            M_USER.USER_NAME
            FROM T_MUTTER, M_USER 
            WHERE T_MUTTER.USER_ID = M_USER.USER_ID 
            ORDER BY T_MUTTER.MUTTER_ID DESC";

    //20件のデータを取得
    $sql .= " LIMIT 20";

    $ary = $this->exeSelectSql($sql);

    $this->setReturnAry($ary);
  }
}

//$mutter = new MutterRankingDAO;
//$mutter->accessDB();
//print_r($mutter->getReturnAry());

