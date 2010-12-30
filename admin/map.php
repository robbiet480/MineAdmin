<?php
$WshShell = new COM("WScript.Shell");
$oExec = $WshShell->Run("C:\Minecraft\maps.bat", 7, false);
echo "<script langauge=\"javascript\">history.go(-1)</script>";
?>