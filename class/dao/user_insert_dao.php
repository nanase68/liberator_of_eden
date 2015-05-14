<?php
require_once(dirname(__FILE__) . '/abstract_dao.php');
require_once(dirname(__FILE__) . '../../common/common.php');

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
    $this->putInputAry("user_id" , "cute");
    $this->putInputAry("user_name" , "キュートさん");
    $this->putInputAry("user_email" , "cute@anonymous.com");
    $this->putInputAry("user_pass_tmp" , "hogehoge");
    $this->putInputAry("user_pass" , md5($this->popInputAry("user_pass_tmp")));
    $this->putInputAry("user_last_login" , NOWTIME);
  }

  public function execute(){
    $sql = $this->makeInsertSql($this->getTable(), $this->getColumnAry());

    $this->exeInsertSql($sql, $this->getColumnAry());
  }
}

$user_dao = new UserInsertDAO;
$user_dao->putUser();
$user_dao->accessDB();
