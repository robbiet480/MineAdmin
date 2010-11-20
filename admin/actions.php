<?php
require_once('header_inc.php');
$logged=true;
if($_SESSION['user']==""){
	$logged=false;
}
function stop_server() {
	shell_exec("screen -S Minecraft -p 0 -X stuff `printf 'stop.\r'`; sleep 5");
}
switch($_POST['act']){
	case "start":
	$pid = shell_exec('pidof java');
	if(count($pid)==1) {
		echo "<div class='error' style='display:block;'>Failed to start! Server is already running!</div>";
	} else {
		shell_exec('screen -dmS Minecraft java -Xmx'.$GENERAL["memory"].' -Xms'.$GENERAL["memory"].' -jar /opt/Minecraft_Mod.jar');
		echo "<div class='success' style='display:block;'>Started server!</div>";
	}
	break;
	case "stop":
	$pid = shell_exec('pidof java');
	if(count($pid)==0) {
		echo "<div class='error' style='display:block;'>Failed to stop! Server is not running!</div>";
	} else {
		stop_server();
		echo "<div class='success' style='display:block;'>Stopped server!</div>";
	}
	break;
	case "restart":
	stop_server();
	shell_exec('screen -dmS Minecraft java -Xmx'.$GENERAL["memory"].' -Xms'.$GENERAL["memory"].' -jar /opt/Minecraft_Mod.jar');
	echo "<div class='success' style='display:block;'>Restarted server!</div>";
	break;
}
?>