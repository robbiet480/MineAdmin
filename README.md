# MineAdmin

## Introduction
MineAdmin is a PHP/MySQL based web control panel for Minecraft Servers utilizing [hMod](http://www.minecraftforum.net/viewtopic.php?t=23340) and [CraftAPI](http://forum.hey0.net/showthread.php?tid=405).
This is a continuation of the great work of Firestar, The009, ricin and Zeryl. Firestar has passed the project to me.

## Requirements

- hMod Mod with MySQL set as the data-source
- [CraftAPI](http://forum.hey0.net/showthread.php?tid=405)
- PHP XML-RPC
- [MCStats](https://github.com/rmichela/MCStats)
- LAMP (Linux, Apache, MySQL, PHP5) stack
- PHP needs to have XML-RPC support. On Ubuntu (and maybe Debian) you can use the following command to install XML-RPC support:

	`sudo apt-get install php5-xmlrpc`

## Windows Support

I do not know how this performs under Windows since I only use Mac/Linux. Please report your findings to me.

## General
Project Website is on (https://github.com/robbiet480/MineAdmin)Github[/url)

If you need any help, [send me a message](https://github.com/inbox/new/robbiet480) on [GitHub](http://github.com/robbiet480) or on the forums or on IRC (i'm always in #hey0 on Esper or robbiet480 on Freenode. I may not respond instantly as I use IRSSI+screen+ssh). You can also join our IRC channel on Esper, #mineadmin

## Currently Working
- User Control
- Online Users
- Give Items
- Group Control
- Ban Control
- Whitelist
- Reservelist
- Better style (seriously)
- Backup support
- Mapping support
- Log viewer
- Items
- Kits
- Multi-user authentication
- Power functions
- Installer

## Coming Soon
- Plugins
- Voice server Support (most likely TeamSpeak)
- Player forum signature support (got a favorite server? get a custom built forum signature box with dynamic data of your stats)

Installation
------------
1.	Set up hey0. 
	1.	Simply start Minecraft_Mod.jar once. It will fail. Stop it.
	2.	Open server.properties, change data-source to mysql. 
	3.	Start Minecraft_Mod.jar again. It will create a mysql.properties file. 
	4.	Import minecraft.sql into a database (preferrably minecraft)
	5.	Fill in the settings in mysql.properties
	6.	Start the server one last time
2.	Checkout the files or download a tarball/zipball from [Github](http://github.com/robbiet480/MineAdmin)
3.	Move config.example.php to config.php and change the values to match.
4.	Done!

## Current contributors
- robbiet480
- dtang

## Past contributors
- Firestar
- Zeryl
- Ricin
- The009

## Contributing
If you want to make changes, fork my repo on GitHub and submit pull requests back to me.

## Other

[Screenshots!](http://forum.hey0.net/showthread.php?tid=1434&pid=21796#pid21796)

[Original thread](http://forum.hey0.net/showthread.php?tid=707)

## License
Please see [license.txt](http://github.com/robbiet480/MineAdmin/blob/master/license.txt) for the license