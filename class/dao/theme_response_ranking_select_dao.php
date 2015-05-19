<?php
require_once(dirname(__FILE__) . '/abstract_dao.php');

class ThemeResponseRankingDAO extends AbstractDAO{

  public function execute(){
    $sql = "SELECT T_THEME_RESPONSE.THEME_RESPONSE_ID,
            T_THEME_RESPONSE.THEME_ID,T_THEME_RESPONSE.THEME_RESPONSE_TITLE,
            T_THEME_RESPONSE.THEME_RESPONSE_DATE, T_THEME_RESPONSE.THEME_RESPONSE_DETAIL,
            T_THEME_RESPONSE.THEME_RESPONSE_IMG, T_THEME_RESPONSE.USER_ID,
            SUM(T_THEME_RESPONSE_STAR.T_THEME_RESPONSE_STAR_POINT) AS STARS
            FROM T_THEME_RESPONSE, T_THEME_RESPONSE_STAR
            WHERE T_THEME_RESPONSE.THEME_RESPONSE_ID = T_THEME_RESPONSE_STAR.THEME_RESPONSE_ID";
    //theme_idでランキングを表示したいテーマを指定する
    if(!empty($this->popInputAry('theme_id'))){
      $sql .= " AND " . "theme_id=" . ":theme_id";
    }
    $sql .= " GROUP BY T_THEME_RESPONSE.THEME_RESPONSE_ID
            ORDER BY STARS DESC";

    //20件のデータを取得
    //$sql .= " LIMIT 20";

    $ary = $this->exeSelectSql($sql);

    $this->setReturnAry($ary);
  }
  public function setThemeId($theme_id){
    $this->putInputAry('theme_id', $theme_id);
  }
}

//$mutter = new ThemeResponseRankingDAO;
//$mutter->setThemeId("3");
//$mutter->accessDB();
//print_r($mutter->getReturnAry());

