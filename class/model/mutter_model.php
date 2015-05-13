<?php
require_once(dirname(__FILE__) . '/../dao/mutter_dao.php');

class MutterModel{
  private $mutter_dao; //クラスインスタンス
  private $data_ary = "";

  function __construct(){
    $this->mutter_dao = new MutterDao;
  }

  public function printHtml(){
    $this->userId();
    $this->exeDao();
    return($this->makeHtml());
  }

  public function userId(){
    $user = "";

    //何らかの方法でuserを取得
    $user = "root";

    $this->mutter_dao->setUserId($user);
  }

  public function exeDao(){
    $this->mutter_dao->accessDB();
    $this->data_ary = $this->mutter_dao->getDataAry();
  }

  public function makeHtml(){
    $html = "";
    foreach($this->data_ary as $row){
      $html .= "<div class='mutter_base'>";
      $html .= $row["mutter_title"];
      
      $html .= "</div>";

    }
    return($html);
  }
}

$mutter_model = new MutterModel;
echo($mutter_model->printHtml());
