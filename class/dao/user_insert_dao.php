<?php
require_once(dirname(__FILE__) . '/abstract_dao.php');
require_once(dirname(__FILE__) . '/../../common/common.php');

class UserInsertDAO extends AbstractDAO{
  function __construct(){
    $this->setTable("M_USER");
    $this->setColumnAry(array(
      "user_id",
      "user_name",
      "user_email",
      // "user_pass_tmp",
      "user_pass",
      "user_last_login",
    ));
  }

  public function putUser($user_ary){
    $this->setInputAry($user_ary);
  }

  public function execute(){
    $sql = $this->makeInsertSql($this->getTable(), $this->getColumnAry());

    $this->exeInsertSql($sql, $this->getColumnAry());
  }
}
