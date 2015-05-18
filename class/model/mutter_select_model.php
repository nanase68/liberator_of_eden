<?php 
require_once(dirname(__FILE__) . '/../dao/mutter_select_dao.php');

class MutterSelectModel{
	private $mutter_select_dao; //クラスインスタンス
	private $user_select_dao;
	private $data_ary = "";

	function __construct(){
		$this->mutter_select_dao = new MutterSelectDao;
	}

	public function getMutterAry($mutter_id){
    $this->mutter_select_dao -> setMutterId($mutter_id);
		$this->exeDao();
		return($this->data_ary);
	}

	private function exeDao(){
		$this->mutter_select_dao->accessDB();
		$this->data_ary = $this->mutter_select_dao->getReturnAry();
	}
}

//$model = new MutterSelectModel;
//print_r($model->getMutterAry("1"));

