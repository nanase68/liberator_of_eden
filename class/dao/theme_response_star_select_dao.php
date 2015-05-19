<?php
require_once(dirname(__FILE__) . '/abstract_dao.php');

class StarSelectDAO extends AbstractDAO{
  private $user_id = "";
  private $data_ary = "";

  private $table = "T_THEME_RESPONSE_STAR";
  private $column_ary = array(
    "t_theme_response_star_id",
    "theme_response_id",
    "t_theme_response_star_point",
    "t_theme_response_date",
    "user_id"
  );

  public function execute(){
    $sql = $this->makeSelectSql($this->table, $this->column_ary);
    // WHERE文を追記user_id
    $sql .= $this->singleWhereSql('user_id');

    $ary = $this->exeSelectSql($sql);

    $this->data_ary = $ary;
  }

  public function setUserId($user_id){
    $this->user_id = $user_id;
  }
  public function setResponseId($theme_response_id){
    $this->putInputAry('theme_response_id', $theme_response_id);
  }
  public function getDataAry(){
    return $this->data_ary;
  }
  public function getTable(){
    return $this->table;
  }
  public function getColumnAry(){
    return $this->column_ary;
  }
}

/*
$theme = new StarSelectDAO;
$theme->setUserId("root");
$theme->setResponseId("1");
$theme->accessDB();
 */
print_r($theme->getDataAry());
