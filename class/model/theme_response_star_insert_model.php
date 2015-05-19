<?php
// require_once(dirname(__FILE__) . '/../../common/get_user_id.php');
require_once(dirname(__FILE__) . '/../../common/common.php');
require_once(dirname(__FILE__) . '/../dao/theme_response_star_insert_dao');

// このモデルはユーザーサイドのajaxからのPOSTで起動する
$model = new ThemeResponseStarInsertModel;

if(isset($_POST['theme_response_id'])
  &&(isset($_POST['t_theme_response_star_point']))
  &&(isset($_POST['user_id']))){
  // ajaxからpostされる
  $model->putParam($_POST['theme_response_id'], $_POST['t_theme_response_star_point'], $_POST['user_id']);
  $model->printHtml();
  // echo($return);
}

class ThemeResponseStarInsertModel{
  private $insert_dao; //クラスインスタンス
  private $data_ary = "";

  function __construct(){
    $this->insert_dao = new ThemeResponseStarInsertDao;
  }

  public function printHtml(){
    $this->exeDao();
    return($this->makeHtml());
  }

  public function putParam($theme_response_id, $star_point, $user_id){
    $star_ary = array();

    //common/get_id.php
    // global $user_id_from_session;
    $star_ary["theme_response_id"] = $theme_response_id;
    $star_ary["t_theme_response_star_point"] = $star_point;
    $star_ary["t_theme_response_date"] = NOW_TIME;
    $star_ary["user_id"] = $user_id;
 
    $this->insert_dao->setInputAry($star_ary);
  }

  private function exeDao(){
    $this->insert_dao->accessDB();
    $this->data_ary = $this->insert_dao->getReturnAry();
  }

  private function makeHtml(){
    $html = "";
    return($html);
  }
}
