<?php
require_once(dirname(__FILE__) . '/abstract_dao.php');

class ThemeSelectDAO extends AbstractDAO{
  private $theme_id = "";

  function __construct(){
    $this->setTable("T_THEME");
    $this->setColumnAry(array(
      "theme_id",
      "user_id",
      "theme_title",
      "theme_create_date",
    ));
  }

  public function execute(){
    $sql = $this->makeSelectSql($this->getTable(), $this->getColumnAry());
    // WHERE文を追記
    if(!empty($this->user_id) AND !empty($this->theme_id)){ //userとtheme両方が指定
      $sql .= " WHERE user_id = " . "'$this->user_id'"
               . "AND theme_id = " . "'$this->theme_id'";
    } elseif(!empty($this->user_id)){
      $sql .= " WHERE user_id = " . "'$this->user_id'";
    } elseif(!empty($this->theme_id)){
      $sql .= " WHERE theme_id = " . "'$this->theme_id'";
    }

    $ary = $this->exeSelectSql($sql);

    $this->setReturnAry($ary);
  }

  public function setUserId($user_id){
    $this->user_id = $user_id;
  }

  public function setThemeId($theme_id){
    $this->theme_id = $theme_id;
  }

}


//$dao = new ThemeSelectDao;
//$dao->setUserId(""); //user_idやtheme_idをwhere文で指定できる
//$dao->setThemeId(1);
//$dao->accessDB();
//seprint_r($dao->getReturnAry());