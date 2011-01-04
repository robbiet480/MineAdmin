<?php
    $PATH        = Array();
    $mysql       = Array();
    $flatfile    = Array();
    $API         = Array();
    $GENERAL     = Array();
    $useflatfile = false;

    /* Configuration Settings */
    
    $API['USER']       =   "secure";
    $API['PASS']       =   "password";
    $API['ADDRESS']    =   "127.0.0.1";
    $API['PORT']       =   "20059";
    
    
    /* MYSQL CONFIGURATION*/
    
    $mysql['HOST']     =   "localhost"; // Mysql Host
    $mysql['USER']     =   ""; // Mysql Username
    $mysql['PASS']     =   "";          // Mysql Password
    $mysql['DB']       =   "minecraft"; // Mysql Database
   
    /* Paths to files */
    
    $PATH['www']        =   "/var/adminpanel/"; // path to MineAdmin
    $PATH['minecraft']  =   "/var/minecraftserver/"; // Path to minecraft server folder

    $flatfile['HOST']    =   '';
    $flatfile['USER']    =   '';
    $flatfile['PASS']    =   '';
    $flatfile['DB']      =   $PATH['minecraft'];

    /* Edit to use custom tablenames */
    $TABLES = Array(
        "backups"      => "backups",
        "bans"         => "bans",
        "groups"       => "groups",
        "homes"        => "homes",
        "items"        => "items",
        "kits"         => "kits",
        "reservelist"  => "reservelist",
        "users"        => "users",
        "warps"        => "warps",
        "whitelist"    => "whitelist"
    );

    /* Minecraft server speciic settings */
	
	$MCSERVER['PORT']	 = "25565";     //Default minecraft port
	$MCSERVER['SERVICENAME'] = "Minecraft"; //Default minecraft service/screen name

    /* Methods for backup */

    $Backup_Method      =   "node.js"; // node.js, backup.plugin
    
?>