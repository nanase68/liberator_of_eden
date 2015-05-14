<?php
require_once(dirname(__FILE__) . '/abstract_dao.php');

class ThemeRankingDAO extends AbstractDAO{

  public function execute(){
    $sql = "SELECT T_THEME.THEME_ID, T_THEME.USER_ID, T_THEME.THEME_RESPONSE_DETAIL, 
            T_THEME.THEME_CREATE_DATE, 
            COUNT(T_THEME_FAVORITES.THEME_FAVORITES_ID) AS FAVORITES
            FROM T_THEME, T_THEME_FAVORITES
            WHERE T_THEME.THEME_ID = T_THEME_FAVORITES.THEME_ID
            GROUP BY T_THEME.THEME_ID
            ORDER BY FAVORITES DESC";

    //20件のデータを取得
    $sql .= " LIMIT 20";

    $ary = $this->exeSelectSql($sql);

    $this->setReturnAry($ary);
  }
}

//$mutter = new ThemeRankingDAO;
//$mutter->accessDB();
//print_r($mutter->getReturnAry());

