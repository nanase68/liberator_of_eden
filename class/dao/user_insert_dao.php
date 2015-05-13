<?php
require_once('./abstract_dao.php');

class UserDAO extends AbstractDAO{
  private $user_id = "";
  private $data_ary = "";

  private $user_name;
  private $user_email;
  private $user_pass;
  private $user_pass_tmp;
  private $user_last_login;

  $user_id = "unko";
  $user_name = "test";
  $user_email = "unko@anonymous.com";
  $user_pass_tmp = "hogehoge"; 
  $user_pass = md5($user_pass_tmp);
  $user_last_login = date("Y")."-".date("n")."-".date("d")." ". date("H").":". date("i").":". date("s");


  private $table = "M_USER";
  private $column_ary = array(
    "user_id",
    "user_name",
    "user_email",
    "user_pass",
    "user_pass_tmp",
    "user_last_login"
  );

  public function execute(){
    #$sql = $this->makeSelectSql($this->table, $this->column_ary);
    $sql = $this->makeInsertSql($this->table, $this->colmn_ary);
    // WHERE文を追記
    if(!empty($this->user_id)){
      $sql .= " WHERE " . "user_id=" . "'$this->user_id'";
    }

    $ary = $this->exeInsertSql($sql);

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

$mutter = new UserDAO;
$mutter->setUserId("root");
$mutter->accessDB();
print_r($mutter->getDataAry());


#__get

