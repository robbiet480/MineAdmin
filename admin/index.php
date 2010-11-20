<?php
session_start();
if($_SESSION['user']==""){
	header("Location: login.php");
	exit;
}else{
	header("Location: start.php");
}
?>