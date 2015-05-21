<?php 
/**
 * [MODEL]ThemeのResponseのCommentを取得するクラス。
 *
 * クラスの詳細
 * ThemeのResponseのCommentを連想配列として取得するクラス。
 * theme_response_idを指定することができる。
 *
 * @access public
 * @author NinomiyaTakeshi <sci.and.eng@gmail.com>
 * @copyright NinomiyaTakeshi All Rights Reserved
 * @category カテゴリー（処理系）
 * @package Model
 */
require_once(dirname(__FILE__) . '/../dao/theme_response_comment_select_dao.php');

class ThemeResponseCommentSelectModel{
	private $comment_select_dao; //クラスインスタンス
	private $data_ary = "";
	private $response_id;

	function __construct(){
		$this->comment_select_dao = new ThemeResponseCommentSelectDAO;
	}

	public function getThemeResponseCommentAry(){
    	$this->comment_select_dao -> setThemeResponseId($this->response_id);
		$this->exeDao();
		return($this->data_ary);
	}

	private function exeDao(){
		$this->comment_select_dao->accessDB();
		$this->data_ary = $this->comment_select_dao->getReturnAry();
	}

	public function setThemeResponseId($response_id){
		$this->response_id = $response_id;
	}
}

/*
$model = new ThemeResponseCommentSelectModel;
$response_id = 1;
$model->setThemeResponseId($response_id);
print_r($model->getThemeResponseCommentAry());
/**/