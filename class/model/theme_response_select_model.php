<?php 
/**
 * [MODEL]ThemeのResponseを取得するクラス。
 *
 * クラスの詳細
 * ThemeのResponseを連想配列として取得するクラス。
 * theme_idを指定することができる。
 *
 * @access public
 * @author NinomiyaTakeshi <sci.and.eng@gmail.com>
 * @copyright NinomiyaTakeshi All Rights Reserved
 * @category カテゴリー（処理系）
 * @package Model
 */
require_once(dirname(__FILE__) . '/../dao/theme_response_select_dao.php');

class ThemeResponseSelectModel{
	private $theme_response_select_dao; //クラスインスタンス
	private $user_select_dao;
	private $data_ary = "";
	private $theme_id;

	function __construct(){
		$this->theme_response_select_dao = new ThemeResponseSelectDao;
	}

	public function getThemeResponseAry(){
    	$this->theme_response_select_dao -> setThemeId($this->theme_id);
		$this->exeDao();
		return($this->data_ary);
	}

	private function exeDao(){
		$this->theme_response_select_dao->accessDB();
		$this->data_ary = $this->theme_response_select_dao->getReturnAry();
	}

	public function setThemeId($theme_id){
		$this->theme_id = $theme_id;
	}
}


/*
$model = new ThemeResponseSelectModel;
$model->setThemeId(5);
print_r($model->getThemeResponseAry());
*/