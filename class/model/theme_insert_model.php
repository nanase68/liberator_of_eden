<?php
require_once(dirname(__FILE__) . '/../../common/get_user_id.php');
require_once(dirname(__FILE__) . '/../../common/common.php');
require_once(dirname(__FILE__) . '/../dao/theme_insert_dao.php');

class ThemeInsertModel{
  private $theme_insert_dao; //クラスインスタンス
  private $data_ary = "";

  function __construct(){
    $this->theme_insert_dao = new ThemeInsertDao;
  }

  public function printHtml(){
    $this->exeDao();
    return($this->makeHtml());
  }

  public function putParam($title){
    $theme_ary = array();

    //common/get_id.php
    global $user_id_from_session;
    $theme_ary['user_id'] = $user_id_from_session;
    $theme_ary['theme_title'] = $title;
    $theme_ary['theme_create_date'] = NOW_TIME;

    $this->theme_insert_dao->setInputAry($theme_ary);
  }

  private function exeDao(){
    $this->theme_insert_dao->accessDB();
    $this->data_ary = $this->theme_insert_dao->getReturnAry();
  }

  private function makeHtml(){
    $html = "";
    return($html);
  }
}

/*
$model = new ThemeInsertModel;
$model->putParam("かっこいい必殺技");
$model->printHtml();
*/