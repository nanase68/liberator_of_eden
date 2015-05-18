<?php
require_once(dirname(__FILE__) . '/../../common/get_user_id.php');
require_once(dirname(__FILE__) . '/../../common/common.php');
require_once(dirname(__FILE__) . '/../dao/mutter_favorites_insert_dao.php');
//お気に入り重複チェックのため
require_once(dirname(__FILE__) . '/../dao/mutter_favorites_select_dao.php'); 

class MutterFavoritesInsertModel{
  private $mutter_insert_dao; //クラスインスタンス
  private $mutter_select_dao;
  private $data_ary = "";

  function __construct(){
    $this->mutter_insert_dao = new MutterFavoritesInsertDao;
    $this->mutter_select_dao = new MutterFavoritesSelectDao;
  }

  //html
  public function printHtml(){
    //getInputAryで
    $input_ary = $this->mutter_insert_dao->getInputAry();
    if(!empty($input_ary)){
      $this->exeDao();
      $this->makeHtml();
    } else{
      //do nothing;
      //将来的にはdeleteできるようにする
    }
  }

  public function putParam($mutter_id){
    global $user_id_from_session;
    $user_id = $user_id_from_session;
    $mutter_ary = array();

    //DBにmutter_idやuser_idが一致するものが既に存在するかチェック
    $this->mutter_select_dao->setMutterId($mutter_id);
    $this->mutter_select_dao->setUserId($user_id);
    $this->mutter_select_dao->accessDB();
    $existing_data = $this->mutter_select_dao->getReturnAry();
    
    //既にデータが存在する場合 
    if(empty($existing_data)){ 
      //common/get_id.php
      //global $user_id_from_session;
      $mutter_ary['user_id'] = $user_id;
      $mutter_ary['mutter_id'] = $mutter_id;
      $mutter_ary['mutter_favorites_date'] = NOW_TIME;

      $this->mutter_insert_dao->setInputAry($mutter_ary);
    } else{
      $mutter_ary = ""; //値を代入しない
    }
    return "unko";
  }

  private function exeDao(){
    $this->mutter_insert_dao->accessDB();
    $this->data_ary = $this->mutter_insert_dao->getReturnAry();
  }

  private function makeHtml(){
    $html = "";
    return($html);
  }
}

//$model = new MutterFavoritesInsertModel;
//$model->putParam(5);
//$model->printHtml();