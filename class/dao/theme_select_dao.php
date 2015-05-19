<?php
require_once(dirname(__FILE__) . '/abstract_dao.php');

class ThemeSelectDAO extends AbstractDAO{
  private $user_id;
  private $theme_id;

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
    $sql = $this->makeSelectSql();
    echo $sql;
    echo "<br>";
    var_dump($sql);
    // WHERE文を追記
    //FIXME:: 抽象クラスにDOUBLE:WHEREが実装されたら書き直す
    if(!empty($this->user_id) && !empty($this->theme_id)){ //userとtheme両方が指定
      $sql .= " WHERE user_id = " . "'$this->user_id'"
               . "AND theme_id = " . "'$this->theme_id'";
      echo "AAAAAA";
    } elseif(!empty($this->user_id)){
      $sql .= " WHERE user_id = " . "'$this->user_id'";
    } elseif(!empty($this->theme_id)){
      $sql .= " WHERE theme_id = " . "'$this->theme_id'";
    } else{
      echo "unko";
    }
    echo $sql . "<br>";

    $ary = $this->exeSelectSql($sql);

    $this->setReturnAry($ary);
  }

  public function setUserId($user_id){
    $this->putInputAry('user_id', $user_id);
  }

  public function setThemeId($theme_id){
    $this->putInputAry('theme_id', $theme_id);
  }

}


$dao = new ThemeSelectDao;
$dao->setUserId("root"); //user_idやtheme_idをwhere文で指定できる
$dao->setThemeId(1);
$dao->accessDB();
print_r($dao->getReturnAry());