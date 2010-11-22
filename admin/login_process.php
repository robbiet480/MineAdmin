<?php
session_start();
require_once('config.php');
require("mysql.class.php");
$db = new MySQL($mysql['HOST'], $mysql['USER'], $mysql['PASS'], $mysql['DB']);
$user=$_POST['user'];
$result=$db->fetch_sql("SELECT password FROM `users` WHERE `name`='".$user."' LIMIT 1;");
if($result[0]['password'] == sha1($_POST['pass'])) {
        $_SESSION['user']=$user;
        echo "1";
}else{
        echo "0";
}
?>