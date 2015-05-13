<?php
require_once(dirname(__FILE__) . '/abstract_dao.php');

class UserInsertDAO extends AbstractDAO{
  private $data_ary = array();

  private $table = "M_USER";
  private $column_ary = array(
    "user_id",
    "user_name",
    "user_email",
    "user_pass_tmp",
    "user_pass",
    "user_last_login",
  );

  public function setData($key, $value){
    if(!is_null($key)){
      $this->data_ary[$key] = $value;
    } else {
      exit('keyの値がnull');
    }
  }

  public function getData($key){
    if (array_key_exists($key, $this->data_ary)) {
      return $this->data_ary[$key];
    } else {
      return NULL;
    }
  }

  public function putUser(){
    $this->setData("user_id" , "cute");
    $this->setData("user_name" , "キュートさん");
    $this->setData("user_email" , "cute@anonymous.com");
    $this->setData("user_pass_tmp" , "hogehoge");
    $this->setData("user_pass" , md5($this->getData("user_pass_tmp")));
    $this->setData("user_last_login" , $time = date("Y")."-".date("n")."-".date("d")." ". date("H").":". date("i").":". date("s"));
  }

  public function execute(){
    $sql = $this->makeInsertSql($this->table, $this->column_ary);

    $this->exeInsertSql($sql, $this->column_ary);
  }

  public function getTable(){
    return $this->table;
  }
  public function getColumnAry(){
    return $this->column_ary;
  }
}

$user_dao = new UserInsertDAO;
$user_dao->putUser();
$user_dao->accessDB();
