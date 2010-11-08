<?php
$pid = shell_exec('pidof java');
if(count($pid)==1) {
	$status = '<font color="green">Status: Online</font>';
} else {
	$status = '<font color="red">Status: OFFLINE</font>';
}
?>
<!DOCTYPE HTML>
<html lang="en">
<head>
	<title>MCSAdmin - MinecraftServers.com</title>
	<link rel="stylesheet" href="style.css" type="text/css" media="screen" />
	<link rel="stylesheet" href="jquery.alerts.css" type="text/css" media="screen" />
	<link rel="stylesheet" href="jquery.autocomplete.css" type="text/css" media="screen" />
    <link rel="stylesheet" type="text/css" href="fancybox/jquery.fancybox-1.3.2.css" media="screen" />
	<link rel="stylesheet" href="jquery.jgrowl.css" type="text/css" media="screen" />
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.3/jquery.min.js"></script>
	<script type="text/javascript" src="jquery-css-transform.js"></script>
	<script type="text/javascript" src="jquery.autocomplete.pack.js"></script>
	<script type="text/javascript" src="jquery.bgiframe.min.js"></script>
	<script type="text/javascript" src="jquery.alerts.js"></script>
    <script type="text/javascript" src="fancybox/jquery.mousewheel-3.0.4.pack.js"></script>
	<script type="text/javascript" src="fancybox/jquery.fancybox-1.3.2.js"></script>
	<script type="text/javascript" src="jquery.jgrowl_minimized.js"></script>
	<script type="text/javascript" src="jquery.ui.all.js"></script>
	<script type="text/javascript" src="system.js"></script> 
</head>
<body>
	<div id="menu-wrap">
		<h2>MCSAdmin</h2>
		<ul>
			<li><a href="logout_process.php">Logout</a></li>
			<li><a href="settings.php">Settings</a></li>
            <li><a href="tools.php">Tools</a></li>
			<li><a href="groups.php">Groups</a></li>
			<!--<li><a href="bans.php">Bans</a></li>-->
			<li><a href="users.php">Users</a></li>
			<li><a href="active.php">Online Now</a></li>
			<li><a href="start.php">Home</a></li>
		</ul>
		<div id="status">
			<p><?php echo $status; ?><a href="javascript:power_control('start');"><img src="images/icons/asterisk_yellow.png">Start</a>&nbsp;<a href="javascript:power_control('stop');"><img src="images/icons/stop.png">Stop</a>&nbsp;<a href="javascript:power_control('restart');"><img src="images/icons/arrow_refresh.png">Restart</a></p>
		</div>
	</div>

