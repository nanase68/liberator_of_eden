<?php
require_once('./abstract_dao.php');

class ThemeDAO extends AbstractDAO{
  private $theme_id = "";
  private $data_ary = "";

  private $table = "T_THEME";
  private $column_ary = array(
    "theme_id",
    "user_id",
    "theme_response_detail",
    "theme_create_date",
  );

  public function execute(){
    $sql = $this->makeSelectSql($this->table, $this->column_ary);
    // WHERE文を追記
    if(!empty($this->theme_id)){
      $sql .= " WHERE " . "theme_id=" . "'$this->theme_id'";
    }

    $ary = $this->exeSelectSql($sql);

    $this->data_ary = $ary;
  }

  public function setThemeId($theme_id){
    print_r($theme_id);
    $this->theme_id = $theme_id;
  }
  public function getDataAry(){
    return $this->data_ary;
  }
}


$theme = new ThemeDAO;
$theme->setThemeId("5");
$theme->accessDB();
print_r($theme->getDataAry());

