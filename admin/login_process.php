<?php
requre_once('header_inc.php');
require_once('config.php');
$user=$_POST['user'];
//if($ADMIN_LOGINS[$user]==sha1($_POST['pass'])){
$result=$db->fetch_sql("SELECT password FROM `users` WHERE `name`='".$user."' LIMIT 1;");
if($result[0] == sha1($_POST['pass'])) {
	$_SESSION['user']=$_POST['user'];
	echo "1";
}else{
	echo "0";
}
?>