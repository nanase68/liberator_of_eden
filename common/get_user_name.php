<?php
session_start();
$user_id = NULL;
if(isset($_SESSION['user_id'])){
  if($_SESSION['user_id'] != ""){
    $user_id = $_SESSOIN['user_id'];
  }
}

//stub
$user_id = 'root';
