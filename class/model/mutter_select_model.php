<?php 
require_once(dirname(__FILE__) . '/../dao/mutter_select_dao.php');

class MutterSelectModel{
	private $mutter_select_dao; //クラスインスタンス
	private $user_select_dao;
	private $data_ary = "";
	private $mutter_id;

	function __construct(){
		$this->mutter_select_dao = new MutterSelectDao;
	}

	public function getMutterAry(){
    	$this->mutter_select_dao -> setMutterId($this->mutter_id);
		$this->exeDao();
		return($this->data_ary);
	}

	private function exeDao(){
		$this->mutter_select_dao->accessDB();
		$this->data_ary = $this->mutter_select_dao->getReturnAry();
	}

	public function setMutterId($mutter_id){
		$this->mutter_id = $mutter_id;
	}
}

//$model = new MutterSelectModel;
//$mutter_id = $_GET['id'];
//$model->setMutterId($mutter_id);
//print_r($model->getMutterAry());

