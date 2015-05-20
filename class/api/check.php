<?php
if(!isset($_SESSION['user_id'])){
	header("Location: sign_up.php");
}
?>