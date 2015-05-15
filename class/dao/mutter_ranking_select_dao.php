<?php
require_once(dirname(__FILE__) . '/abstract_dao.php');

class MutterRankingDAO extends AbstractDAO{

  public function execute(){
    $sql = "SELECT T_MUTTER.MUTTER_ID, T_MUTTER.USER_ID,
            T_MUTTER.MUTTER_TITLE,
            T_MUTTER.MUTTER_DETAIL, T_MUTTER.MUTTER_DATE,
            T_MUTTER.MUTTER_IMG ,COUNT(T_MUTTER_FAVORITES.MUTTER_FAVORITES_ID) AS FAVORITES,
            M_USER.USER_NAME
            FROM T_MUTTER, T_MUTTER_FAVORITES, M_USER
            WHERE T_MUTTER.MUTTER_ID = T_MUTTER_FAVORITES.MUTTER_ID
            AND M_USER.USER_ID = T_MUTTER.USER_ID
            GROUP BY T_MUTTER.MUTTER_ID
            ORDER BY FAVORITES DESC";

    //20件のデータを取得
    $sql .= " LIMIT 20";

    $ary = $this->exeSelectSql($sql);

    $this->setReturnAry($ary);
  }
}

//$mutter = new MutterRankingDAO;
//$mutter->accessDB();
//print_r($mutter->getReturnAry());

