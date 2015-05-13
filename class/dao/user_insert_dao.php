<?php
require_once(dirname(__FILE__) . '/abstract_dao.php');

class UserInsertDAO extends AbstractDAO{
  function __construct(){
    $this->setTable("M_USER");
    $this->setColumnAry(array(
      "user_id",
      "user_name",
      "user_email",
      "user_pass_tmp",
      "user_pass",
      "user_last_login",
    ));
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
    $sql = $this->makeInsertSql($this->getTable(), $this->getColumnAry());

    $this->exeInsertSql($sql, $this->getColumnAry());
  }
}

$user_dao = new UserInsertDAO;
$user_dao->putUser();
$user_dao->accessDB();
