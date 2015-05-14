<?php
require_once('./abstract_dao.php');

class ThemeFavoritesDAO extends AbstractDAO{
  private $theme_favorites_id = "";
  private $data_ary = "";

  private $table = "T_THEME_FAVORITES";
  private $column_ary = array(
    "theme_favorites_id",
    "user_id",
    "theme_id",
    "theme_favorites_date",
  );

  public function execute(){
    $sql = $this->makeSelectSql($this->table, $this->column_ary);
    // WHERE文を追記
    if(!empty($this->theme_id)){
      $sql .= " WHERE " . "theme_favorites_id=" . "'$this->theme_favorites_id'";
    }

    $ary = $this->exeSelectSql($sql);

    $this->data_ary = $ary;
  }

  public function setThemeFavoritesId($theme_favorites_id){
    print_r($theme_favorites_id);
    $this->theme_favorites_id = $theme_favorites_id;
  }
  public function getDataAry(){
    return $this->data_ary;
  }
}


$theme_favorites = new ThemeFavoritesDAO;
$theme_favorites->setThemeFavoritesId("5");
$theme_favorites->accessDB();
print_r($theme_favorites->getDataAry());

