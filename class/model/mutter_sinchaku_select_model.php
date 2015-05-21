<?php 
/**
 * [API]新着のつぶやきをDBから取ってくるクラス
 *
 * クラスの詳細
 * DAOを呼び出してDBからつぶやきを取ってきて降順に並び替えられたデータを得るクラス。
 *
 * @access public
 * @author ShinyaKudo <shinya.k930@gmail.com>
 * @copyright ShinyaKudo All Rights Reserved
 * @category カテゴリー（処理系）
 * @package Model
 */
require_once(dirname(__FILE__) . '/../dao/mutter_sinchaku_select_dao.php');

class NewMutterModel{
	private $new_mutter_dao; //クラスインスタンス
	private $user_select_dao;
	private $data_ary = "";

	function __construct(){
		$this->new_mutter_dao = new NewMutterDao;
	}

	public function getNewMutterAry(){
		$this->exeDao();
		return($this->data_ary);
	}

	private function exeDao(){
		$this->new_mutter_dao->accessDB();
		$this->data_ary = $this->new_mutter_dao->getReturnAry();
	}
}

//$model = new MutterRankingModel;
//print_r($model->getRankingAry());

