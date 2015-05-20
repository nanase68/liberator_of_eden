<?php 
require_once(dirname(__FILE__) . '/../dao/mutter_select_dao.php');

class MutterSelectModel{
	private $mutter_select_dao; //クラスインスタンス
	private $data_ary = "";
	//private $mutter_id;
	//private $user_id;

	function __construct(){
		$this->mutter_select_dao = new MutterSelectDao;
	}

	public function getMutterAry(){
		$this->exeDao();
		return($this->data_ary);
	}

	private function exeDao(){
		$this->mutter_select_dao->accessDB();
		$this->data_ary = $this->mutter_select_dao->getReturnAry();
	}

	public function setMutterId($mutter_id){
		$this->mutter_select_dao -> setMutterId($mutter_id);
	}

	public function setUserId($user_id){
		$this->mutter_select_dao -> setUserId($user_id);
	}
}

/*
$model = new MutterSelectModel;
//$model->setUserId('kanzakiranko');
$model->setMutterId(1);
print_r($model->getMutterAry());
*/