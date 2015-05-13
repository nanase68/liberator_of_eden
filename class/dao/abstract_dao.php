<?php
require_once('../../common/connection.php');

// TempretMethod パターン

/*
 * Abstract クラス
 *
 * 使い方：
 * AbstractDAOを継承したクラス内でexecute()を定義し、
 * データベースにアクセスしたいタイミングでaccessDBを呼び出す。
 *
 * execute()内では、
 * $sqlを作り、
  function execute(){
    $sql = "SELECT * FROM staff";

    $st = DBX::getPdo()->query($sql);
    $st->execute();

    $list = array();
    while($row = $st->fetch(PDO::FETCH_ASSOC)){
      $list[] = $row;
    }
  }
 * ↑のような感じでクエリを実行して自分の変数に結果を格納する
 */
abstract class AbstractDAO{
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

  /*
   * $table テーブル名は大文字でなければいけない
   */
  public function makeSelectSql($table, $column_ary){
    $sql = "";
    $sql .= "SELECT ";

    for($i=0; $i < count($column_ary); $i++){
      if($i > 0){
        $sql .= ", ";
      }
      $sql .= $table . "." . $column_ary[$i];
    }
    $sql .= " FROM " . $table;
    return($sql);
  }

  public function exeSql($sql){
    $st = DBX::getPdo()->query($sql);
    $st->execute();

    $ary = array();
    while($row = $st->fetch(PDO::FETCH_ASSOC)){
      $ary[] = $row;
    }
    return($ary);
  }




  abstract protected function execute();

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
