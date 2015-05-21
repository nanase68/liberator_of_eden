<?php 
/**
 * [API]投稿されたテーマをDBから取得するクラス
 *
 * クラスの詳細
 * DAOで投稿されたすべてのテーマに関するデータをDBから取得するクラス
 *
 *　@access public
 * @author ShinyaKudo <shinya.k930@gmail.com>
 * @copyright ShinyaKudo All Rights Reserved
 * @category カテゴリー（処理系）
 * @package Model
 */
require_once(dirname(__FILE__) . '/../dao/theme_select_dao.php');

class ThemeSelectModel{
	private $theme_select_dao; //クラスインスタンス
	private $data_ary = "";
	private $theme_id;

	function __construct(){
		$this->theme_select_dao = new ThemeSelectDao;
	}

	public function getThemeAry(){
    	$this->theme_select_dao -> setThemeId($this->theme_id);
		$this->exeDao();
		return($this->data_ary);
	}

	private function exeDao(){
		$this->theme_select_dao->accessDB();
		$this->data_ary = $this->theme_select_dao->getReturnAry();
	}

	public function setThemeId($theme_id){
		$this->theme_id = $theme_id;
	}
}

//$model = new ThemeSelectModel;
//$theme_id = 1;//$_GET['id'];
//$model->setThemeId($theme_id);
//print_r($model->getThemeAry());
