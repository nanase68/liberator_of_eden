<?php
require_once('./abstract_dao.php');

class LoginDAO extends AbstractDAO{
  private $user_id = "";
  private $data_ary = "";

  private $table = "M_USER";
  private $column_ary = array(
    "user_id",
    "user_name",
    "user_last_login",
  );

  public function execute(){
    $sql = $this->makeSelectSql($this->table, $this->column_ary);
    // WHERE文を追記
    if(!empty($this->user_id)){
      $sql .= " WHERE " . "user_id=" . "'$this->user_id'";
    }

    $ary = $this->exeSelectSql($sql);

    $this->data_ary = $ary;
  }

  public function setUserId($user_id){
    print_r($user_id);
    $this->user_id = $user_id;
  }
  public function getDataAry(){
    return $this->data_ary;
  }
}


$login = new LoginDAO;
$login->setUserId("homes");
$login->accessDB();
print_r($login->getDataAry());

