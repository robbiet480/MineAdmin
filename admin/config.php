<?php
    $PATH        = Array();
    $mysql       = Array();
    $flatfile    = Array();
    $API         = Array();
    $GENERAL     = Array();
    $useflatfile = false;

    /* Configuration Settings */
    
    $API['USER']       =   "emirin";
    $API['PASS']       =   "ustick";
    $API['ADDRESS']    =   "localhost";
    $API['PORT']       =   "20059";
    
    /* MYSQL CONFIGURATION*/
    
    $mysql['HOST']     =   "192.168.1.200"; // Mysql Host
    $mysql['USER']     =   "root"; // Mysql Username
    $mysql['PASS']     =   "s0f/\\K1nG";          // Mysql Password
    $mysql['DB']       =   "minecraft"; // Mysql Database
   
   
    /* Paths to files */
    
    $PATH['www']        =   "c:/server/www/admin/admin/"; // path to MineAdmin
    $PATH['minecraft']  =   "c:/minecraft/bin"; // Path to minecraft server folder

    $flatfile['HOST']    =   '';
    $flatfile['USER']    =   '';
    $flatfile['PASS']    =   '';
    $flatfile['DB']      =   $PATH['minecraft'];

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

