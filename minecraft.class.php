<?php

include_once("prettyxmlrpc.php");
class minecraft{
    var $r;
    function __construct(){
        global $API;
        $this->r = new PrettyXMLRPC("http://".$API['USER'].":".$API['PASS']."@".$API['ADDRESS'].":".$API['PORT'], new PrettyXMLRPCEpiBackend());
    }
    function send_message($nick,$message){
        return $this->r->player->sendMessage($nick, $message);
    }
    function get_inventory($nick){
        return $this->r->player->getInventory($nick);
    }
    function remove_inventory($nick,$itemid,$amount){
        return $this->r->player->removeInventoryItem( $nick, $itemid, $amount );
    }
    function get_item_name($id){
        global $db;
        $result=$db->fetch_sql("SELECT * FROM `items` WHERE `itemid`='".$id."' LIMIT 1;");
        return $result[0]['name'];
    }
    function get_item_id($name){
        global $db;
        $result=$db->fetch_sql("SELECT * FROM `items` WHERE `name`='".$name."' LIMIT 1;");
        return $result[0]['itemid'];
    }
    function group_prefix($pref){
        global $db;
        $result=$db->fetch_sql("SELECT * FROM `groups` WHERE `prefix`='".$pref."' LIMIT 1;");
        return (isset($reult[0]) ? $result[0] : false);
    }
    function clear_inv($nick){
        for($x=0;$x<36;$x++){
            $ret=$this->r->player->removeInventorySlot($nick, $x);
        }
        return 1;
    }
    function msg($nick,$message){
        return $this->r->player->sendMessage($nick,$message);
    }
    function give_item($nick,$item,$amount){
        return $this->r->player->giveItem($nick,intval($item),intval($amount));
    }
    function player_list(){
        return $this->r->player->getPlayers();
    }
    function remove_slot($nick,$slot){
        return $this->r->player->removeInventorySlot($nick,intval($slot));
    }
    function player_info($nick){
        return $this->r->player->getPlayerInfo($nick);
    }
    function group_list(){
        global $db;
        $result=$db->fetch_sql("SELECT * FROM `groups` ORDER BY `name` DESC");
        return $result;
    }
    function user_list(){
        global $db;
        $result=$db->fetch_sql("SELECT * FROM `users` ORDER BY `id` DESC");
        return $result;
    }
    function get_plugin($plugin){
        return $this->r->server->getPlugin($plugin);
    }
    function get_plugins(){
        return $this->r->server->getPlugins();
    }
    function user_get_id($id){
        global $db;
        $result=$db->fetch_sql("SELECT * FROM `users` WHERE `id`='".$id."'");
        return $result[0];
    }
    function group_get_id($id){
        global $db;
        $result=$db->fetch_sql("SELECT * FROM `groups` WHERE `id`='".$id."'");
        return $result[0];
    }
    function player_kick($nick,$reason){
        return $this->r->player->kick($nick,$reason);
    }
    function player_ban($nick,$reason){
        return $this->r->server->runConsoleCommand("/ban $nick","Banned by MineAdmin");
    }
//added by robbiet480, 11/06/10
	function save_all(){
        return $this->r->server->runConsoleCommand("save-all");
    }
	function save_off(){
        return $this->r->server->runConsoleCommand("save-off");
    }
	function save_on(){
        return $this->r->server->runConsoleCommand("save-on");
    }
    function backup_list(){
	        global $db;
	        $result=$db->fetch_sql("SELECT * FROM `backups` ORDER BY `id` DESC");
	        return $result;
	}
	function backup($name,$comment){
		global $PATH;
		function ByteSize($bytes)  
		    { 
		    $size = $bytes / 1024; 
		    if($size < 1024) 
		        { 
		        $size = number_format($size, 2); 
		        $size .= ' KB'; 
		        }  
		    else  
		        { 
		        if($size / 1024 < 1024)  
		            { 
		            $size = number_format($size / 1024, 2); 
		            $size .= ' MB'; 
		            }  
		        else if ($size / 1024 / 1024 < 1024)   
		            { 
		            $size = number_format($size / 1024 / 1024, 2); 
		            $size .= ' GB'; 
		            }  
		        } 
		    return $size; 
		    }
		$this->r->server->broadcastMessage("Map backup now starting");
		$this->r->server->broadcastMessage("Issuing save-all command");
		$this->r->server->runConsoleCommand("save-all");
		$this->r->server->broadcastMessage("Issuing save-off command");
		$this->r->server->runConsoleCommand("save-off");
		$date = date('Y-m-d-H:i');
		$output = $PATH['backups']."/".$date.".tgz";
		echo "tar -czf ".$output." ".$PATH['minecraft']."world";
		$size = ByteSize(filesize($output));
		global $db;
		$result=$db->insert("backups", array("id"=>"","name"=>$name,"date"=>"","time"=>"","size"=>$size,"comment"=>$comment,"filename"=>$output), array(), true);
		return $result;
		
	}
     function configuration_files(){
        global $PATH;
        $file_array=array();
        if ($handle = opendir($PATH['minecraft'])) {
            while (false !== ($file = readdir($handle))) {
                if ($file != "." && $file != ".." && $file != "mysql.properties" && $file != "craftapi.properties") {
                    $file_out=preg_split('/\./si', $file);
                    if($file_out[1]=="properties"){
                        $filename = $PATH['minecraft'].$file_out[0].".properties";
                        $handle2 = fopen($filename, "r");
                        $contents = fread($handle2, filesize($PATH['minecraft'].$file_out[0].".properties"));
                        fclose($handle2);
                        $props=array();
                        preg_match_all('/^([a-zA-Z0-9\-]+)=(.*)/im', $contents, $resulti, PREG_PATTERN_ORDER);
                        for ($i = 0; $i < count($resulti[0]); $i++) {
                            $props[]=array($resulti[1][$i],$resulti[2][$i]);
                        }
                        $file_array[]=array(
                            "file"=>$file_out[0],
                            "properties"=>$props
                        );
                    }
                }
            }
            closedir($handle);
        }
        return $file_array;
    }
    function configuration($array){
        global $PATH;
        foreach($array as $key=>$val){
            if (preg_match('/\A([a-zA-Z0-9\-]+)_([a-zA-Z0-9\-]+)\Z/sim', $key)) {
                if (preg_match('/([a-zA-Z0-9\-]+)_([a-zA-Z0-9\-]+)/sim', $key, $regs)) {
                    $file_name = $regs[1];
                    $prop_var = $regs[2];
                }
                $filename = $PATH['minecraft'].$file_name.".properties";
                $handle2 = fopen($filename, "r");
                $contents = fread($handle2, filesize($filename));
                fclose($handle2);
                $contents = preg_replace('/'.$prop_var.'=([a-zA-Z0-9\-\t\. \/\\\\:,]+)*/sim', $prop_var.'='.$val, $contents);
                $fh=fopen($filename,"w"); 
                fwrite($fh,$contents);
                fclose($fh);
            }
        }
    }
    
    function item_list(){
        global $db;
        $result=$db->fetch_sql("SELECT * FROM `items`");
        return $result;
    }
    function server_test(){
        return $this->r->player->getInventory("Firestarthe");
    }
	function white_list(){
		global $db;
        $result=$db->fetch_sql("SELECT * FROM `whitelist`");
        return $result;
	}
}
?>