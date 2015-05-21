<?php
require_once(dirname(__FILE__) . '/../../common/get_user_id.php');
require_once(dirname(__FILE__) . '/../dao/my_page_mutters_select_dao.php');

/**
 * [Model] 
 *
 * クラスの詳細
 * マイページの自分のつぶやきを表示させるモデル
 *
 * @access public
 * @author Shima Yusuke <mashi4729@gmail.com>
 * @copyright Shima Yusuke All Rights Reserved
 * @category カテゴリー（処理系）
 * @package Model
 */
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
      $html .= "<a href='./mutter.php?id=".$row['mutter_id']."'><div class='micro_content'>";
      if(empty($row['mutter_img'])){
        $html .= "<p class='micro_content_txt'>${row['mutter_detail']}</p>";
      } else {
        // :TODO スタブ
        $html .= "<img src='./images/sample.png'>";
      }
      $html .= "<p class='uploader'>${row['mutter_title']}</p>";
      $html .= "</div></a>";
      $html .= "\n";
    }
    return($html);
  }
}
