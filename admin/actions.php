<?php
require_once('header_inc.php');
$logged=true;
if($_SESSION['user']==""){
	$logged=false;
}
function stop_server() {
	$os_string = php_uname('s');

	if (strpos(strtoupper($os_string), 'WIN')!==false)
	{
		//(12-6-2010)Emirin: Windows specific stop
		$WshShell = new COM("WScript.Shell");
		$oExec = $WshShell->Run("net stop " . $MCSERVER['SERVICENAME'], 7, false);
	}
	else
	{
		shell_exec("screen -S Minecraft -p 0 -X stuff `printf 'stop.\r'`; sleep 5");
	}

}

$os_string = php_uname('s');

switch($_POST['act']){
	case "start":
	//(12-6-2010)Emirin: Port check, is the server alive?
		error_reporting(E_ERROR | E_PARSE);
		if(fsockopen($API['ADDRESS'], $MCSERVER['PORT'], $errno, $errstr, 1)) {
			echo "<div class='error' style='display:block;'>Failed to start! Server is already running!</div>";
		} else {
			if (strpos(strtoupper($os_string), 'WIN')!==false)
			{
				//(12-6-2010)Emirin: Windows specific start
				$WshShell = new COM("WScript.Shell");
				$oExec = $WshShell->Run("net start " . $MCSERVER['SERVICENAME'], 7, false);
			}
			else
			{
				shell_exec('screen -dmS Minecraft java -Xmx'.$GENERAL["memory"].' -Xms'.$GENERAL["memory"].' -jar /opt/Minecraft_Mod.jar');
				echo "windows";
			}
			echo "<div class='success' style='display:block;'>Started server!</div>";
		}
		error_reporting(E_ERROR | E_WARNING | E_PARSE);
	break;
	case "stop":
		error_reporting(E_ERROR | E_PARSE);
		if(fsockopen($API['ADDRESS'], $MCSERVER['PORT'], $errno, $errstr, 1)) {
			stop_server();
			echo "<div class='success' style='display:block;'>Stopped server!</div>";
		} else {
			echo "<div class='error' style='display:block;'>Failed to stop! Server is not running!</div>";
		}
		error_reporting(E_ERROR | E_WARNING | E_PARSE);
	break;
	case "restart":
			if (strpos(strtoupper($os_string), 'WIN')!==false)
			{
				//(12-6-2010)Emirin: Windows restart...& ftw!
				$WshShell = new COM("WScript.Shell");
				$oExec = $WshShell->Run("cmd /c net stop " . & $MCSERVER['SERVICENAME'] . " & net start " . $MCSERVER['SERVICENAME'], 7, false);
			}
			else
			{
				stop_server();
				shell_exec('screen -dmS Minecraft java -Xmx'.$GENERAL["memory"].' -Xms'.$GENERAL["memory"].' -jar /opt/Minecraft_Mod.jar');
			}
		echo "<div class='success' style='display:block;'>Restarted server!</div>";
	break;
}
?>