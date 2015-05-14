<?php
session_start();
$user_name = NULL;
if(isset($_SESSION['user_id'])){
  if($_SESSION['user_id'] != ""){
    $user_name = $_SESSOIN['user_id'];
  }
}
