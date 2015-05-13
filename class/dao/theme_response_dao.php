<?php
require_once('./abstract_dao.php');

class ThemeResponseDAO extends AbstractDAO{
  private $theme_response_id = "";
  private $data_ary = "";

  private $table = "T_THEME_RESPONSE";
  private $column_ary = array(
    "theme_response_id",
    "theme_id",
    "theme_response_title",
    "theme_response_detail",
    "theme_response_date",
    "theme_response_img",
  );

  public function execute(){
    $sql = $this->makeSelectSql($this->table, $this->column_ary);
    // WHERE文を追記
    if(!empty($this->theme_response_id)){
      $sql .= " WHERE " . "theme_response_id=" . "'$this->theme_response_id'";
    }

    $ary = $this->exeSelectSql($sql);

    $this->data_ary = $ary;
  }

  public function setThemeResponseId($theme_response_id){
    print_r($theme_response_id);
    $this->theme_response_id = $theme_response_id;
  }
  public function getDataAry(){
    return $this->data_ary;
  }
}


$theme_response = new ThemeResponseDAO;
$theme_response->setThemeResponseId("5");
$theme_response->accessDB();
print_r($theme_response->getDataAry());

