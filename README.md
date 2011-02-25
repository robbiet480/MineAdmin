# MineAdmin

## Introduction
MineAdmin is a PHP/MySQL based web control panel for Minecraft Servers utilizing [Bukkit](http://bukkit.org) and [JSONApi](http://forum.hey0.net/showthread.php?pid=21769).
This is a continuation of the great work of Firestar, The009, ricin and Zeryl. Firestar has passed the project to me.

## Requirements

- Bukkit
- [JSONApi](http://forum.hey0.net/showthread.php?pid=21769)
- PHP 5.2.0+
- LAMP (Linux, Apache, MySQL, PHP5) stack

## Windows Support

We have heard mixed responses as to Windows support. We will update this area or the wiki when we hear more.

## General
Project Website is on [Github](https://github.com/robbiet480/MineAdmin)

If you need any help, [send me a message](https://github.com/inbox/new/robbiet480) on [GitHub](http://github.com/robbiet480) or on the forums or on IRC (i'm always in #bukkit on Esper or robbiet480 on Freenode. I may not respond instantly as I use IRSSI+screen+ssh). You can also join our IRC channel on Esper, #mineadmin

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
- Chat
- Console
- Log Viewing
- Flat File support
- Awesomeness

## Coming Soon
- Plugins
- Player forum signature support (got a favorite server? get a custom built forum signature box with dynamic data of your stats)

Installation
------------
1.	Set up Bukkit. 
	1.	Simply start Minecraft_Mod.jar once. It will fail. Stop it.
	2.	Open server.properties, change data-source to mysql. 
	3.	Start Minecraft_Mod.jar again. It will create a mysql.properties file. 
2.	Checkout the files or download a tarball/zipball from [Github](http://github.com/robbiet480/MineAdmin)
3.	Move config.example.php to config.php and change the values to match.
4.	Import the mineadmin.sql file into a database of your choice. Match the username, password, hostname and database name in both config.php and mysql.properties
5.	Start Bukkit
6.	Open your browser and go to your site.  Type Admin for the user name and test for the password. (Make sure you remove this user after you set up a user for yourself.)
7.	Done!
	

## Current contributors
- robbiet480
- dtang
- Emirin
- TheCrazyT
- resba

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