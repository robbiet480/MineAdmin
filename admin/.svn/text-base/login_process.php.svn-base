<?php
session_start();
require_once('config.php');
$user=$_POST['user'];
if($ADMIN_LOGINS[$user]==sha1($_POST['pass'])){
	$_SESSION['user']=$_POST['user'];
	echo "1";
}else{
	echo "0";
}
?>