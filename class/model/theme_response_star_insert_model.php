<?php
// require_once(dirname(__FILE__) . '/../../common/get_user_id.php');
require_once(dirname(__FILE__) . '/../../common/common.php');
require_once(dirname(__FILE__) . '/../dao/theme_response_star_insert_dao.php');
require_once(dirname(__FILE__) . '/../dao/theme_response_star_select_dao.php');
require_once(dirname(__FILE__) . '/../dao/theme_response_star_update_dao.php');

// このモデルはユーザーサイドのajaxからのPOSTで起動する
$model = new ThemeResponseStarInsertModel;

if(isset($_POST['response_id'])
  &&(isset($_POST['star_score']))
  &&(isset($_POST['user_id']))){
  // ajaxからpostされる
  $model->putParam($_POST['response_id'], $_POST['star_score'], $_POST['user_id']);
  $model->printHtml();
}

/**
 * [Model] 
 *
 * クラスの詳細
 * テーマへのレスポンスへの☆付けをデータベースに登録するモデル
 *
 * @access public
 * @author Shima Yusuke <mashi4729@gmail.com>
 * @copyright Shima Yusuke All Rights Reserved
 * @category カテゴリー（処理系）
 * @package Model
 */
class ThemeResponseStarInsertModel{
  private $insert_dao; //クラスインスタンス
  private $select_dao;
  private $update_dao;
  private $data_ary = "";

  function __construct(){
    $this->insert_dao = new ThemeResponseStarInsertDao;
    $this->select_dao = new ThemeResponseStarSelectDao;
    $this->update_dao = new ThemeResponseStarUpdateDao;
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

    $this->select_dao->setResponseId($theme_response_id);
    $this->select_dao->setUserId($user_id);

    $this->update_dao->setResponseId($theme_response_id);
    $this->update_dao->setUserId($user_id);
    $this->update_dao->setStarPoint($star_point);
  }

  private function exeDao(){
    $this->select_dao->accessDB();
    if(empty($this->select_dao->getReturnAry())){
      $this->insert_dao->accessDB();
    } else {
      $this->update_dao->accessDB();
    }
  }

  private function makeHtml(){
    $html = "";
    return($html);
  }
}
