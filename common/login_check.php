<?php
session_start();
$login_flg = false;
if(isset($_SESSION['user_id'])){
  if($_SESSION['user_id'] != ""){
    $login_flg = true;
  }
}
