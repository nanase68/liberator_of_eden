<?php
require_once(dirname(__FILE__) . '/../../common/connection.php');
// TempretMethod パターン

/*
 * Abstract クラス
 *
 * 使い方：
 * AbstractDAOを継承したクラス内で
 * コンストラクタで$tableと$column_aryを指定する。
 * execute()を定義し、
 * データベースにアクセスしたいタイミングでaccessDB()を呼び出す。
 *
 * @access public
 * @author shima
 * @category 
 * @package dao
 */
abstract class AbstractDAO{
  // SQLの実行に必要な値を入れるための配列
  private $input_ary = array();
  // SQLの結果を入れるための配列
  private $return_ary = array();

  // SQLのテーブル名をコンストラクタで指定する必要がある
  // テーブル名は大文字でなければいけない
  private $table;
  // SQLの列名をコンストラクタで指定する必要がある
  private $column_ary;

  // 抽象クラスを実装する必要がある
  abstract protected function execute();

  public function accessDB(){
    try{
      DBX::connect();

      $this->execute();

      DBX::close();
    }catch(PDOException $e){
      DBX::close();
      exit('データベース接続失敗。'.$e->getMessage());
    }
  }

  protected function makeSelectSql(){
    $sql = "";
    $sql .= "SELECT ";

    for($i=0; $i < count($this->getColumnAry()); $i++){
      if($i > 0){
        $sql .= ", ";
      }
      $sql .= $this->getColumnAry()[$i];
    }
    $sql .= " FROM " . $this->getTable();
    return($sql);
  }

  protected function makeInsertSql(){
    $sql = "";
    $sql .= "INSERT ";
    $sql .= "INTO " . DBNAME . ".$this->getTable()"; 
    $sql .= " (";
    for($i=0; $i < count($this->getColumnAry()); $i++){
      if($i > 0){
        $sql .= ", ";
      }
      $sql .= $this->getColumnAry()[$i];
    }
    $sql .= ")";
    $sql .= " VALUES";
    $sql .= " (";
    for($i=0; $i < count($this->getColumnAry()); $i++){
      if($i > 0){
        $sql .= ", ";
      }
      $sql .= ":" .$this->getColumnAry()[$i];
    }
    $sql .= ")";
    return($sql);
  }

  protected function makeDeleteSql(){
    $sql = "";
    $sql .= "DELETE FROM";
    $sql .= " " . DBNAME . ".$this->getTable()"; 
    $sql .= " WHERE ";
    $i = 0;
    foreach ($this->getColumnAry() as $col_name) {
      $sql .= $col_name . "= :" . $col_name . " AND ";
    }
    $sql = rtrim($sql, " AND ");
    return($sql);
  }

  protected function exeSelectSql($sql){
    $st = DBX::getPdo()->prepare($sql);

    //基本的にPDO::PARAM_STR 
    //"NULL"を代入する場合もPDO::PARAM_STR
    //たまにPDO::PARAM_INTも使用するが変数の型に注意
    foreach($this->getInputAry() as $key => $value){
      $st -> bindParam(":$key", $value, PDO::PARAM_STR);
    }

    $st->execute();
    //コミットすると適用される
    DBX::getPdo() -> commit();

    $ary = array();
    while($row = $st->fetch(PDO::FETCH_ASSOC)){
      $ary[] = $row;
    }
    return($ary);
  }

  protected function exeInsertSql($sql){
    $st = DBX::getPdo()->prepare($sql);
    
    foreach($this->getInputAry() as $key => $value){
      $st -> bindParam(":$key", $value, PDO::PARAM_STR);
    }
  
    $st -> execute();
    DBX::getPdo() -> commit();
  }


  protected function exeDeleteSql($sql){
    $st = DBX::getPdo()->prepare($sql);
    
    foreach($this->getInputAry() as $key => $value){
      $st -> bindParam(":$key", $value, PDO::PARAM_STR);
    }
  
    $st -> execute();
    DBX::getPdo() -> commit();
  }

  /*
   * getter / setter
   */
  public function putInputAry($key, $value){
    if(!is_null($key)){
      $this->input_ary[$key] = $value;
    } else {
      exit('keyの値がnull');
    }
  }
  public function popInputAry($key){
    if (array_key_exists($key, $this->input_ary)) {
      return $this->input_ary[$key];
    } else {
      return NULL;
    }
  }
  public function setInputAry($arg){
    $this->input_ary = $arg;
  }
  public function getInputAry(){
    return $this->input_ary;
  }
  public function setReturnAry($arg){
    $this->return_ary = $arg;
  }
  public function getReturnAry(){
    return $this->return_ary;
  }
  public function setTable($arg){
    $this->table = $arg;
  }
  public function getTable(){
    return $this->table;
  }
  public function setColumnAry($arg){
    $this->column_ary = $arg;
  }
  public function getColumnAry(){
    return $this->column_ary;
  }
}

class DBX{
  private static $pdo;

  public static function connect(){
    self::$pdo = new PDO(DSN, USER, PASS);
    self::$pdo -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    self::$pdo -> beginTransaction();
    self::$pdo -> query("SET NAMES utf8");
   }

  public static function close(){
    self::$pdo = null;
  }

  public static function getPdo(){
    return self::$pdo;
  }
}
