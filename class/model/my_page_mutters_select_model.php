<?php
include(dirname(__FILE__) . '/../../common/get_user_id.php');
require_once(dirname(__FILE__) . '/../dao/my_page_mutters_select_dao.php');

class MyPageMuttersSelectModel{
  private $dao; //クラスインスタンス
  private $data_ary = "";

  function __construct(){
    $this->dao = new MyPageMuttersSelectDao;
  }

  public function printHtml(){
    $this->userId();
    $this->exeDao();
    return($this->makeHtml());
  }

  private function userId(){
    $user = "";

    //common/get_id.php
    global $user_id_from_session;

    $this->dao->setUserId($user_id_from_session);
  }

  private function exeDao(){
    $this->dao->accessDB();
    $this->data_ary = $this->dao->getReturnAry();
  }

  private function makeHtml(){
    $html = "";
    foreach($this->data_ary as $row){
      $html .= "<div class='micro_content'>";
      if(empty($row['mutter_img'])){
        $html .= "<p class='micro_content_txt'>${row['mutter_detail']}</p>";
      } else {
        // :TODO スタブ
        $html .= "<img src='./images/sample.png'>";
      }
      $html .= "<p class='uploader'>${row['mutter_title']}</p>";
      $html .= "</div>";
      $html .= "\n";
    }
    return($html);
  }
}
