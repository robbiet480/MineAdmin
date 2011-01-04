<?php
	/*Alright kids, its time to build your config files!
	
		We are going to do this the easy way.
	*/
	$config = file_get_contents("config.example.php");

	
	
	/* General Server Configuration */

	if ($_POST['conf_mapath'] != '')
	{
		$config = str_replace("<pathWWW>", $_POST['conf_mapath'], $config);
	} else {
		$config = str_replace("<pathWWW>", "/var/adminpanel/", $config);
	}

	if ($_POST['conf_srvpath'] != '')
	{
		$config = str_replace("<pathMinecraft>", $_POST['conf_srvpath'], $config);
	} else {
		$config = str_replace("<pathMinecraft>", "/var/minecraftserver/", $config);
	}

	if ($_POST['conf_srvport'] != '')
	{
		$config = str_replace("<mcserverPort>", $_POST['conf_srvport'], $config);
	} else {
		$config = str_replace("<mcserverPort>", "25565", $config);
	}

	if ($_POST['conf_service'] != '')
	{
		$config = str_replace("<mcserverService>", $_POST['conf_service'], $config);
	} else {
		$config = str_replace("<mcserverService>", "Minecraft", $config);
	}
	
	
	/* Data Storage (MYSQL for now but maybe if your lucky TheCrazyT will make ya some options!  You have to ask him really nice though.) */

	if ($_POST['mysql_host'] != '')
	{
		$config = str_replace("<dbHost>", $_POST['mysql_host'], $config);
	} else {
		$config = str_replace("<dbHost>", "localhost", $config);
	}

	if ($_POST['mysql_database'] != '')
	{
		$config = str_replace("<dbName>", $_POST['mysql_database'], $config);
	} else {
		$config = str_replace("<dbName>", "minecraft", $config);
	}

	if ($_POST['mysql_username'] != '')
	{
		$config = str_replace("<dbUser>", $_POST['mysql_username'], $config);
	} else {
		$config = str_replace("<dbUser>", "root", $config);
	}

	if ($_POST['mysql_password'] != '')
	{
		$config = str_replace("<dbPass>", $_POST['mysql_password'], $config);
	} else {
		$config = str_replace("<dbPass>", "root", $config);
	}


	/* API */

	if ($_POST['api_username'] != '')
	{
		$config = str_replace("<apiUser>", $_POST['api_username'], $config);
	} else {
		$config = str_replace("<apiUser>", "admin", $config);
	}

	if ($_POST['api_password'] != '')
	{
		$config = str_replace("<apiPass>", $_POST['api_password'], $config);
	} else {
		$config = str_replace("<apiPass>", "test", $config);
	}

	if ($_POST['api_address'] != '')
	{
		$config = str_replace("<apiAddress>", $_POST['api_address'], $config);
	} else {
		$config = str_replace("<apiAddress>", "localhost", $config);
	}

	if ($_POST['api_port'] != '')
	{
		$config = str_replace("<apiPort>", $_POST['api_port'], $config);
	} else {
		$config = str_replace("<apiPort>", "20059", $config);
	}
	
	if ($_POST['api_salt'] != '')
	{
		$config = str_replace("<apiSalt>", $_POST['api_salt'], $config);
	} else {
		$config = str_replace("<apiSalt>", "wib32ib$(TH\$g42y42bv42G#@G*(", $config);
	}
	
	$newconfig = fopen("config.php", "w");
	fwrite($newconfig, str_replace("\\", "\\\\", $config));
	fclose($newconfig);
	header("Location: index.php");
	
?>