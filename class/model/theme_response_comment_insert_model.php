<?php
/**
 * [MODEL]ThemeのResponseのCommentをDBに書き込むクラス。
 *
 * クラスの詳細
 * ThemeのResponseのCommentをDBに書き込むクラス。
 * ログインしているユーザーのuser_idと現在時刻を取得し、
 * response_idと書き込み内容(detail)を指定できる。
 *
 * @access public
 * @author NinomiyaTakeshi <sci.and.eng@gmail.com>
 * @copyright NinomiyaTakeshi All Rights Reserved
 * @category カテゴリー（処理系）
 * @package Model
 */

require_once(dirname(__FILE__) . '/../../common/get_user_id.php');
require_once(dirname(__FILE__) . '/../../common/common.php');
require_once(dirname(__FILE__) . '/../dao/theme_response_comment_insert_dao.php');

class ThemeResponseCommentInsertModel{
  private $comment_insert_dao; //クラスインスタンス
  private $data_ary = "";

  function __construct(){
    $this->comment_insert_dao = new ThemeResponseCommentInsertDAO;
  }

  public function printHtml(){
    $this->exeDao();
    return($this->makeHtml());
  }

  public function putParam($response_id, $detail){
    $comment_ary = array();

    //common/get_id.php
    global $user_id_from_session;
    $comment_ary['user_id'] = $user_id_from_session;
    // $comment_ary['theme_response_comment_id'] = NULL;
    $comment_ary['theme_response_id'] = $response_id;
    $comment_ary['theme_response_comment_detail'] = $detail;
    $comment_ary['theme_response_comment_date'] = NOW_TIME;

    $this->comment_insert_dao->setInputAry($comment_ary);
  }

  private function exeDao(){
    $this->comment_insert_dao->accessDB();
    $this->data_ary = $this->comment_insert_dao->getReturnAry();
  }

  private function makeHtml(){
    $html = "";
    return($html);
  }
}

/*
$model = new ThemeResponseCommentInsertModel;
$response_id = 1;
$detail = "マミメガネ";
$model->putParam($response_id, $detail);
$model->printHtml();
*/