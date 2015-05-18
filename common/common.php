<?php
define("DEFAULT_DIR","files/".date("Y")."-".date("m")."-".date("d"));
define("NOW_TIME", date("Y")."-".date("n")."-".date("d")." ". date("H").":". date("i").":". date("s"));
define("NOW_DATE", date("Y")."-".date("n")."-".date("d"));


//page title
define("PAGE_TITLE", "Eden of Liberators");


define("CSS_PATH", "http://www3268uf.sakura.ne.jp/next_c/css/");
define("IMG_PATH", "http://www3268uf.sakura.ne.jp/next_c/img/");
define("JS_PATH", "http://www3268uf.sakura.ne.jp/next_c/js/");

class Common{
  public static function goToError(){
    header(dirname(__FILE__) . '../error.php');
  }
}
