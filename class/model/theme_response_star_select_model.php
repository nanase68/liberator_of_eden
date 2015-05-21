<?php
require_once(dirname(__FILE__) . '/../../common/common.php');
require_once(dirname(__FILE__) . '/../../common/get_user_id.php');
require_once(dirname(__FILE__) . '/../dao/theme_response_star_select_dao');

if(isset($_POST['theme_response_id'])){
  // ajaxからpostされる
  $return = $model->selectData($_POST['theme_response_id']);
  echo($return);
}

/**
 * [Model] 
 *
 * クラスの詳細
 * テーマへのレスポンスへの☆を呼び出すモデル
 *
 * @access public
 * @author Shima Yusuke <mashi4729@gmail.com>
 * @copyright Shima Yusuke All Rights Reserved
 * @category カテゴリー（処理系）
 * @package Model
 */
class ThemeResponseStarSelectModel{
  private $select_dao; //クラスインスタンス

  function __construct(){
    $this->select_dao = new ThemeResponseStarSelectDao;
  }

  public function selectData($theme_response_id){
    $this->select_dao->setResponseId($theme_response_id);

    //common/get_id.php
    global $user_id_from_session;
    $this->select_dao->setUserId($user_id_from_session);
    return($this->exeDao());
  }


  private function exeDao(){
    $this->select_dao->accessDB();
    $data_ary = $this->select_dao->getReturnAry();
    return($data_ary[0]['t_theme_response_star_point']);
  }
}

// $m = new SignUpModel;
// $m->putParam();
// $m->printHtml();
