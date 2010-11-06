<?php
require_once('header_inc.php');
?>
<!DOCTYPE HTML>
<html lang="en">
<head>
	<title>Administration Index</title>
	<link rel="stylesheet" href="style.css" type="text/css" media="screen" />
	<link rel="stylesheet" href="jquery.alerts.css" type="text/css" media="screen" />
	<link rel="stylesheet" href="jquery.autocomplete.css" type="text/css" media="screen" />
	<link rel="stylesheet" href="jquery.jgrowl.css" type="text/css" media="screen" />
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.3/jquery.min.js"></script>
	<script type="text/javascript" src="jquery-css-transform.js"></script>
	<script type="text/javascript" src="jquery.autocomplete.pack.js"></script>
	<script type="text/javascript" src="jquery.bgiframe.min.js"></script>
	<script type="text/javascript" src="jquery.alerts.js"></script>
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
	<div id="page_wrap">
		<div id="online_wrap">
			<h1>Who's Online</h1>
			<span id="online"></span>
		</div>
		<div id="inventory_wrap" style="display:none;">
			<h1><span id="user"></span>'s Inventory</h1>
			<div class="give_link"><span style="float:left;text-align:left;margin-top:10px;"><a href="javascript:clear_inv();" class="link_give">&lsaquo; Clear Inventory &rsaquo;</a></span><span style="float:right;text-align:right;"><label><span>Item Name</span><input type="text" id="item_complete" /></label> <label><span>Amount</span><input type="text" id="item_amount" /></label> <a href="javascript:give_item();" class="link_give">&lsaquo; Give Item &rsaquo;</a></span></div>
			<div class="back_link"><a href="javascript:hide_inv();" class="link_hide">&lsaquo;&lsaquo; Go Back</a></div>
			<span id="inventory"></span>
			<div class="back_link"><a href="javascript:hide_inv();" class="link_hide">&lsaquo;&lsaquo; Go Back</a></div>
		</div>
	</div>
	<script type="text/javascript">
		$("body").ready(function(){
			get_player_list();
		});
	</script> 
</body>
</html>