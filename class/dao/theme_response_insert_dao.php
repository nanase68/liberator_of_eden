<?php
require_once(dirname(__FILE__) . '/abstract_dao.php');
require_once(dirname(__FILE__) . '/../../common/common.php');
require_once(dirname(__FILE__) . '/../api/FileUploadClass.php');

$fuc = new FileUploadClass();

class ThemeResponseInsertDAO extends AbstractDAO{

  function __construct(){
    $this->setTable("T_THEME_RESPONSE");
    $this->setColumnAry(array(
      "theme_response_id",
      "theme_id",
      "theme_response_title",
      "theme_response_detail",
      "theme_response_date",
      "theme_response_img"
    ));
  }

  public function putThemeResponce($theme_ary){
    $this->setInputAry($theme_ary);
  }


  public function execute(){
    $sql = $this->makeInsertSql();

    $this->exeInsertSql($sql);
  }
}

$fuc -> setFileParam($_FILES['files']);
$fuc -> setDirPath("./test_files_directory/");
$fuc -> setFileName("test_image");
$imgFlg = true;

$model = new ThemeResponseInsertDAO;
$theme_ary = array();
$theme_ary["theme_response_id"] = "NULL";
$theme_ary['theme_id'] = 1;
$theme_ary['theme_response_title'] = $_POST['title'];
$theme_ary['theme_response_detail'] = $_POST['detail'];
$theme_ary['theme_response_date'] = NOW_TIME;
$theme_ary['theme_response_img'] = $fuc -> getMovePath();

//var_dump($theme_ary);

$model->setInputAry($theme_ary);
$model->getInputAry();

$model->accessDB();
$model->getReturnAry();
header("Location: ../../theme.php");