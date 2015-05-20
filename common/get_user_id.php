<?php
session_start();
$user_id_from_session = NULL;
if(isset($_SESSION['user_id'])){
  if($_SESSION['user_id'] != ""){
    $user_id_from_session = $_SESSION['user_id'];
  }
}

//stub
// $user_id_from_session = 'root';
