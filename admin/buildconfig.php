<?php
	error_reporting(E_ERROR | E_PARSE);
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

	if ($_POST['conf_backuppath'] != '')
	{
		if ($_POST['conf_backuppath'][strlen($_POST['conf_backuppath']) - 1] == "/")
		{
			$_POST['conf_backuppath'][strlen($_POST['conf_backuppath']) - 1] = " ";
		}
		$config = str_replace("<backupPath>", trim($_POST['conf_backuppath']), $config);
	} else {
		$config = str_replace("<backupPath>", "/backups", $config);
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

	/* Validation that we can actualy do everything */
	ini_set('mysql.connect_timeout', 2);
	flush();
	$conn = mysql_connect($_POST['mysql_host'], $_POST['mysql_username'],  $_POST['mysql_password']);
	if (!$conn)
	{
		$err .= "Cannot find your database server.  Please make sure its up and running.<br />";
	} else {
		if (!mysql_select_db($_POST['mysql_database'], $conn))
		{
			$err .= "Cannot find your database.  Your server is up, but your database ". $_POST['mysql_database'] ." cannot be found.<br />";
		} else {
			$rs = mysql_query('SELECT * FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME = "users" and table_schema = '.$_POST['mysql_database'].'"', $conn);
			if (mysql_num_rows($rs) == 0)
			{
				mysql_query('CREATE TABLE \'users\' (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(32) NOT NULL,
  `password` varchar(32) NOT NULL
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1');
			}
			$rs = mysql_query('SELECT * FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME = "users" AND COLUMN_NAME = "password" and table_schema = '.$_POST['mysql_database'].'"', $conn);
			if (mysql_num_rows($rs) == 0)
			{
				mysql_query('ALTER TABLE users ADD password varchar(255)');
			}
			mysql_query('insert into users (name, password) values ("admin", "a94a8fe5ccb19ba61c4c0873d391e987982fbbd3");', $conn);
			if(mysql_errno($conn))
			{
				$err .= "Could not set up a default user for you, most likely cause there is no password field due to user rights to the information_schema table.<br />";
			}
		}
	}
	
	foreach(get_loaded_extensions() as $ext)
	{
		if (strpos(" " . $ext, 	"json") > 0)
		{
			$jsontest = true;
		}
	}
	if (!$jsontest)
	{
		$err .= "You do not have Json installed as an extension in php.<br />";
	}

	if (strlen($err) > 0)
	{
		echo '<img src="images/321.png" style="display:none;" onload="document.getElementById(\'errors\').innerHTML = \''.$err.'\'">';
	}else {
		$newconfig = fopen("config.php", "w");
		if ($newconfig)
		{
			fwrite($newconfig, str_replace("\\", "\\\\", $config));
			fclose($newconfig);
			echo '<img src="images/321.png" style="display:none;" onload="document.location.href=\'index.php\'">';
		} else
		{
			$err .= "Cannot write the config.php.  Please make sure your web server user (usualy apache) has access to the directory.<br />";
			echo '<img src="images/321.png" style="display:none;" onload="document.getElementById(\'errors\').innerHTML = \''.$err.'\'">';
		}
	}
	
?>