<?php 
require_once(dirname(__FILE__) . '/../dao/user_select_dao.php');

class UserSelectModel{
	private $user_select_dao; //クラスインスタンス
	private $data_ary = "";
	private $user_id;

	function __construct(){
		$this->user_select_dao = new UserSelectDao;
	}

	public function getUserAry(){
    	$this->user_select_dao -> setUserId($this->user_id);
		$this->exeDao();
		return($this->data_ary);
	}

	private function exeDao(){
		$this->user_select_dao->accessDB();
		$this->data_ary = $this->user_select_dao->getReturnAry();
	}

	public function setUserId($user_id){
		$this->user_id = $user_id;
	}
}

/*
$model = new UserSelectModel;
$user_id = "kanzakiranko";
$model->setUserId($user_id);
print_r($model->getUserAry());
*/