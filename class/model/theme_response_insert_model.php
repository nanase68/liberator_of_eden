<?php
require_once(dirname(__FILE__) . '/../../common/get_user_id.php');
require_once(dirname(__FILE__) . '/../../common/common.php');
require_once(dirname(__FILE__) . '/../dao/theme_response_insert_dao.php');

class ThemeResponseInsertModel{
  private $theme_response_insert_dao; //クラスインスタンス
  private $data_ary = "";

  function __construct(){
    $this->theme_response_insert_dao = new ThemeResponseInsertDao;
  }

  public function printHtml(){
    $this->exeDao();
    return($this->makeHtml());
  }

  public function putParam($detail){
    $theme_ary = array();

    //common/get_user_id.php
    global $user_id_from_session;
    $theme_ary['user_id'] = $user_id_from_session;
    $theme_ary['theme_response_title'] = $title;
    $theme_ary['theme_response_detail'] = $detail;
    $theme_ary['theme_response_date'] = NOW_TIME;
    $theme_ary['theme_response_img'] = "./test_files_directory/";

    $this->theme_response_insert_dao->setInputAry($theme_ary);
  }

  private function exeDao(){
    $this->theme_response_insert_dao->accessDB();
    $this->data_ary = $this->theme_response_insert_dao->getReturnAry();
  }

  private function makeHtml(){
    $html = "";
    return($html);
  }
}
