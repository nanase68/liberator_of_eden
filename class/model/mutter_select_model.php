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
      $html .= "<div class='mutter_base'>";
      $html .= $row["mutter_title"];
      
      $html .= "</div>";

    }
    return($html);
  }
}

$mutter_select_model = new MutterSelectModel;
echo($mutter_select_model->printHtml());
