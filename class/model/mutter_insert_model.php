<?php
include(dirname(__FILE__) . '/../../common/get_user_name.php');
require_once(dirname(__FILE__) . '/../../common/common.php');
require_once(dirname(__FILE__) . '/../dao/mutter_insert_dao.php');

class MutterInsertModel{
  private $mutter_insert_dao; //クラスインスタンス
  private $data_ary = "";

  function __construct(){
    $this->mutter_insert_dao = new MutterInsertDao;
  }

  public function printHtml(){
    $this->exeDao();
    return($this->makeHtml());
  }

  public function putParam($detail){
    $mutter_ary = array();

    //common/get_user.php
    global $user_name;
    $mutter_ary['user_id'] = $user_name;
    // $mutter_ary['mutter_title'] = $title;
    $mutter_ary['mutter_detail'] = $detail;
    $mutter_ary['mutter_date'] = NOW_TIME;
    // $mutter_ary['mutter_img'] = NULL;

    $this->mutter_insert_dao->setInputAry($mutter_ary);
  }

  private function exeDao(){
    $this->mutter_insert_dao->accessDB();
    $this->data_ary = $this->mutter_insert_dao->getReturnAry();
  }

  private function makeHtml(){
    $html = "";
    return($html);
  }
}
