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
    $sql = $this->makeInsertSql();

    $this->exeInsertSql($sql);
  }
}

/*
$model = new UserInsertDAO;
$user_ary = array();
$user_ary['user_id'] = 'void';
$user_ary['user_name'] = '天使長ボイド';
$user_ary['user_email'] = "void@gmail.jp";
$user_ary['user_pass'] = 'void';
$user_ary['user_last_login'] = NOW_TIME;
//var_dump($theme_ary);
print_r($user_ary);
echo "<br>";

$model->setInputAry($user_ary);
print_r($model->getInputAry());
echo "<br>";

$model->accessDB();
//print_r($model->getReturnAry());
*/