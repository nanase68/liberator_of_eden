<?php
require_once(dirname(__FILE__) . '/../../common/get_user_id.php');
require_once(dirname(__FILE__) . '/../../common/common.php');
require_once(dirname(__FILE__) . '/../dao/mutter_favorites_insert_dao.php');
require_once(dirname(__FILE__) . '/../dao/mutter_favorites_delete_dao.php'); 
//お気に入り重複チェックのため
require_once(dirname(__FILE__) . '/../dao/mutter_favorites_select_dao.php');

class MutterFavoritesModel{
  private $mutter_fav_insert_dao; //クラスインスタンス
  private $mutter_fav_select_dao;
  private $mutter_fav_delete_dao;
  private $data_ary = "";
  private $is_exist_on_DB; //既にお気に入りが存在するかのフラグ

  function __construct(){
    $this->mutter_fav_insert_dao = new MutterFavoritesInsertDao;
    $this->mutter_fav_select_dao = new MutterFavoritesSelectDao;
    $this->mutter_fav_delete_dao = new MutterFavoritesDeleteDao;
  }

  public function printHtml(){
    //DBにデータが存在するかどうかで条件分岐
    if($this->is_exist_on_DB == 0){
      //INSERT文を実行
      $input_ary = $this->mutter_fav_insert_dao->getInputAry();
      $this->exeInsertDao();
    } elseif($this->is_exist_on_DB == 1){
      //DELETE文を実行
      $this->exeDeleteDao();
    } else{ //$is_exist_on_DBが変な値の場合
      //do nothing;
    }
  }

  public function putParam($mutter_id){
    global $user_id_from_session;
    $user_id = $user_id_from_session;
    $mutter_ary = array();

    //DBにmutter_idやuser_idが一致するものが既に存在するかチェック
    $this->mutter_fav_select_dao->setMutterId($mutter_id);
    $this->mutter_fav_select_dao->setUserId($user_id);
    $this->mutter_fav_select_dao->accessDB();
    $existing_data = $this->mutter_fav_select_dao->getReturnAry();
    
    //既にお気に入りが存在しない場合 
    if(empty($existing_data)){ 
      //common/get_id.php
      //global $user_id_from_session;
      $mutter_ary['user_id'] = $user_id;
      $mutter_ary['mutter_id'] = $mutter_id;
      $mutter_ary['mutter_favorites_date'] = NOW_TIME;

      $this->mutter_fav_insert_dao->setInputAry($mutter_ary);
      $this->is_exist_on_DB = 0; //INSERTフラグ
    } else{
      $mutter_ary['user_id'] = $user_id;
      $mutter_ary['mutter_id'] = $mutter_id;
      //$mutter_ary['mutter_favorites_date']は指定しない;

      $this->mutter_fav_delete_dao->setInputAry($mutter_ary);
      $this->is_exist_on_DB = 1; //DELETEフラグ
    }
  }

  private function exeInsertDao(){
    $this->mutter_fav_insert_dao->accessDB();
  }

  private function exeDeleteDao(){
    $this->mutter_fav_delete_dao->accessDB();
  }
}

//$model = new MutterFavoritesModel;
//$model->putParam($mutter_id=15);
//$model->printHtml();
