<?php
require_once(dirname(__FILE__) . '/../dao/mutter_select_dao.php');

class MutterSelectModel{
  private $mutter_select_dao; //クラスインスタンス
  private $data_ary = "";

  function __construct(){
    $this->mutter_select_dao = new MutterSelectDao;
  }

  public function printHtml(){
    $this->userId();
    $this->exeDao();
    return($this->makeHtml());
  }

  private function userId(){
    $user = "";

    //何らかの方法でuserを取得
    //common/get_user.phpを使う
    $user = "root";

    $this->mutter_select_dao->setUserId($user);
  }

  private function exeDao(){
    $this->mutter_select_dao->accessDB();
    $this->data_ary = $this->mutter_select_dao->getReturnAry();
  }

  private function makeHtml(){
    $html = "";
    foreach($this->data_ary as $row){
      $html .= "<div class='micro_content'>";
      if(empty($row['mutter_img'])){
        $html .= "<p class='micro_content_txt'>${row['mutter_detail']}</p>";
      } else {
        $html .= "<img src='./images/sample.png'>";
      }
      $html .= "<p class='uploader'>${row['mutter_title']}</p>";
      $html .= "</div>";
      $html .= "\n";
    }
    return($html);
  }
}
