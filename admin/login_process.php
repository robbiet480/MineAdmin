<?php
session_start();
require_once('config.php');
require_once('hash/OfHash.php');

if($useflatfile){
    require("flatfile.class.php");
    $db = new Flatfile($flatfile['HOST'], $flatfile['USER'], $flatfile['PASS'], $flatfile['DB']);
}
else
{
    require("mysql.class.php");
    $db = new MySQL($mysql['HOST'], $mysql['USER'], $mysql['PASS'], $mysql['DB']);
}

if ( !$db->isconnected() ) {
    echo "MySQL Configuration Incorrect.";
    exit();
}
$result=$db->fetch_by("users",Array("password"=>hash($_POST['pass']),"name"=>$_POST['user']),"");
if($result['password'] == hash($_POST['pass'])) {
        $_SESSION['user']=$result["name"];
        echo "1";
}else{
        echo "0";
}
?>