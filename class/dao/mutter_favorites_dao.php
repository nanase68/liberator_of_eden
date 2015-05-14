<?php
require_once('./abstract_dao.php');

class MutterFavoritesDAO extends AbstractDAO{
  private $mutter_favorites_id = "";
  private $data_ary = "";

  private $table = "T_MUTTER_FAVORITES";
  private $column_ary = array(
    "mutter_favorites_id",
    "user_id",
    "mutter_id",
    "mutter_favorites_date",
  );

  public function execute(){
    $sql = $this->makeSelectSql($this->table, $this->column_ary);
    // WHERE文を追記
    if(!empty($this->theme_id)){
      $sql .= " WHERE " . "mutter_favorites_id=" . "'$this->mutter_favorites_id'";
    }

    $ary = $this->exeSelectSql($sql);

    $this->data_ary = $ary;
  }

  public function setMutterFavoritesId($mutter_favorites_id){
    print_r($mutter_favorites_id);
    $this->mutter_favorites_id = $mutter_favorites_id;
  }
  public function getDataAry(){
    return $this->data_ary;
  }
}


$mutter_favorites = new MutterFavoritesDAO;
$mutter_favorites->setMutterFavoritesId("5");
$mutter_favorites->accessDB();
print_r($mutter_favorites->getDataAry());

