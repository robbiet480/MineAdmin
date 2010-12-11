<?php
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

    /* Minecraft server speciic settings */
	
	$MCSERVER['PORT']	 = "25565";     //Default minecraft port
	$MCSERVER['SERVICENAME'] = "Minecraft"; //Default minecraft service name (Required for Windows)

    /* Methods for backup */

    $Backup_Method      =   "node.js"; // node.js, backup.plugin
    

    /*
        ADMIN LOGINS
        FORMAT, USERNAME=>SHA1(PASSWORD)
    */
    
    $ADMIN_LOGINS=array(
        "test"=>"a94a8fe5ccb19ba61c4c0873d391e987982fbbd3"
    );
    
?>