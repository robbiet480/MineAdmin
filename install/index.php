<?php
//superfantabolous installer
?>
<!DOCTYPE HTML> 
<html lang="en"> 
<head>
	<title>MinecraftServers SuperFantabolous Installer!</title>
	<style type="text/css">
	body {
		background: #FFF url('../images/bg-tile.png') repeat;
		font-family: 'Helvetica','Arial Narrow','Nimbus Sans L',sans-serif;
	}
	</style>
	<script type="text/javascript" src="Ajax.js"></script><br> 
	<script type="text/javascript" src="Post.js"></script><br>
</head>
<body>
	<h1>Hi!</h1>
	<p>Hello there and welcome to the official MinecraftServers.com (&copy;) SuperFantabolous Installer!</p>
	<p>We are going to ask you a few simple questions and then you will be on your way to MineCrack!</p>
	<form action="bridge.php" method="post" onsubmit="Post.Send(this); return false;">
		<label>First, what is your first name?</label><input type="text" name="f_name" onchange="this.form.submit();">
		
</body>
</html>