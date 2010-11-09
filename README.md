MineAdmin
=========

Introduction
------------
MineAdmin is a PHP/MySQL based web control panel for Minecraft servers utilizing [hey0](http://www.minecraftforum.net/viewtopic.php?t=23340) and [CraftAPI](http://forum.hey0.net/showthread.php?tid=405).

Requirements
------------
* Minecraft Server
* hey0 running
* CraftAPI installed as a plugin
* hey0 needs to store its data in MySQL.
* A LAMP (Linux, Apache, MySQL, PHP) server
* PHP needs to have XML-RPC support. On Ubuntu (and maybe Debian) you can use the following command to install XML-RPC support:
	sudo apt-get install php5-xmlrpc
Installation
------------
1.	Set up hey0. 
	1.	Simply start Minecraft_Mod.jar once. It will fail. Stop it.
	2.	Open server.properties, change data-source to mysql. 
	3.	Start Minecraft_Mod.jar again. It will create a mysql.properties file. 
	4.	Import minecraft.sql into a database (preferrably minecraft)
	5.	Fill in the settings in mysql.properties
	6.	Start the server one last time
2.	Checkout the files or download a tarball/zipball from [Github](http://github.com/robbiet480/MineAdmin#readme)
3.	Move config.example.php to config.php and change the values to match.
4.	Done!

Contributors
------------
Fork the code on Github, make your changes, then file a [pull request](http://github.com/robbiet480/MineAdmin/pull/new/master)

License
-------
Please see [license.txt](http://github.com/robbiet480/MineAdmin/blob/master/license.txt) for the license