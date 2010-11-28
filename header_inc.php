<?php
function head($title)
{
?>
<!DOCTYPE HTML>
<html lang="en">
<head>
	<title><?php echo htmlentities($title); ?></title>
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
		<h2>MineCraft Server</h2>
		<ul>
			<li><a href="logout_process.php">Logout</a></li>
			<li><a href="settings.php">Settings</a></li>
                        <li><a href="backup.php">Backup</a></li>
			<li><a href="exec.php">Exec</a></li>
			<li><a href="groups.php">Groups</a></li>
			<li><a href="bans.php">Bans</a></li>
			<li><a href="users.php">Users</a></li>
			<li><a href="start.php">Online Now</a></li>
		</ul>
	</div>
<?php
}

session_start();
if ($_SESSION['user'] == '') {
	header("Location: login.php");
	exit();
}
require_once ('config.php');
require ('classes/mysql.class.php');
$db = new MySQL($mysql['HOST'], $mysql['USER'], $mysql['PASS'], $mysql['DB']);
if (!$db->isconnected()) {
	echo 'MySQL Configuration Incorrect.';
	exit();
}
require ('classes/minecraft.class.php');
$minecraft = new MineCraft();
?>