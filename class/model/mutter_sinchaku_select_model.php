<?php 
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

