<?php
    /* Configuration Settings */
    
    $API['USER']       =   "admin";
    $API['PASS']       =   "admin";
    $API['ADDRESS']    =   "127.0.0.1";
    $API['PORT']       =   "20012";
    
    
    /* MYSQL CONFIGURATION*/
    
    $mysql['HOST']     =   "localhost"; // Mysql Host
    $mysql['USER']     =   "root"; // Mysql Username
    $mysql['PASS']     =   "DC91652D1695606F425FBDAA017E357DC4026DD3CFF04D49CCCB94BCC583BFFA";          // Mysql Password
    $mysql['DB']       =   "minecraft"; // Mysql Database
   
    /* Paths to files */
    
    $PATH['www']        =   "/var/www/current/"; // path to MineAdmin
    $PATH['minecraft']  =   "/opt/"; // Path to minecraft server folder
	$PATH['backups']	=   "/var/www/current/backups/"; //Path to Backups folder
	//$PATH['backup_url'] =	"http://"
    
	/* General settings */
	$GENERAL['memory']				=	"256M"; //memory to allocate for MC
	$GENERAL['mapper_cmd']			=	"screen -dmS Mapper python gmap.py --cachedir /opt/cache/ /opt/world /var/www/map; find /opt/cache -name '*.png' -exec pngcrush {} {}.crush \; -exec mv {}.crush {} \;"; //Mapping program, needs to be installed. Valid options: c10t, minecraft-overviewer. for Minecraft-Overviewer, it is recommended that you set the cache directory to something other then world. You may also want to append this command to the end: find /path/to/destination -name "*.png" -exec pngcrush {} {}.crush \; -exec mv {}.crush {} \;
	$GENERAL['version']				=	"0.1"; //dont touch me
	
    /*
        ADMIN LOGINS
        FORMAT, USERNAME=>SHA1(PASSWORD)
    */
    
    $ADMIN_LOGINS=array(
        "test"=>"a94a8fe5ccb19ba61c4c0873d391e987982fbbd3"
    );
    
?>

