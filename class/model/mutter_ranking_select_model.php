<?php 
require_once(dirname(__FILE__) . '/../dao/mutter_ranking_select_dao.php');

/**
 * [MODEL]mutterのランキングを取得するクラス。
 *
 * クラスの詳細
 * mutterのランキングを連想配列として取得するクラス。
 *
 * @access public
 * @author NinomiyaTakeshi <sci.and.eng@gmail.com>
 * @copyright NinomiyaTakeshi All Rights Reserved
 * @category カテゴリー（処理系）
 * @package Model
 */
class MutterRankingModel{
	private $mutter_ranking_dao; //クラスインスタンス
	private $user_select_dao;
	private $data_ary = "";

	function __construct(){
		$this->mutter_ranking_dao = new MutterRankingDao;
	}

	public function getRankingAry(){
		$this->exeDao();
		return($this->data_ary);
	}

	private function exeDao(){
		$this->mutter_ranking_dao->accessDB();
		$this->data_ary = $this->mutter_ranking_dao->getReturnAry();
	}
}

//$model = new MutterRankingModel;
//print_r($model->getRankingAry());

