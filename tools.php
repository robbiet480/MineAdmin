<?php
$pageid = "tools";
require_once('header_inc.php');
require_once('includes/header.php');
$pageid = "tools";
function stop_server() {
	shell_exec("screen -S Minecraft -p 0 -X stuff `printf 'stop.\r'`; sleep 5");
}
if($_GET['action'] == "backup") {
	$minecraft->backup($_POST['backup_name'],$_POST['backup_comment']);
} elseif($_GET['action'] == "dl") {
    $result=$db->fetch_sql("SELECT filename FROM `backups` WHERE id = ".$_GET['id']);
	if (file_exists($result[0]['filename'])) {
	    header('Content-Description: File Transfer');
	    header('Content-Type: application/octet-stream');
	    header('Content-Disposition: attachment; filename='.basename($result[0]['filename']));
	    header('Content-Transfer-Encoding: binary');
	    header('Expires: 0');
	    header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
	    header('Pragma: public');
	    header('Content-Length: ' . filesize($result[0]['filename']));
	    ob_clean();
	    flush();
	    readfile($result[0]['filename']);
	    exit;
	}
} elseif($_GET['action'] == "delete") {
	$minecraft->backup_delete($_GET['id']);
} elseif($_GET['action'] == "restore") {
	$result=$db->fetch_sql("SELECT filename FROM `backups` WHERE id = ".$_GET['id']);
	stop_server();
	$restore = shell_exec('tar xvfz -C '.$PATH['minecraft'].'.. '.$result[0]['filename']);
	shell_exec('screen -dmS Minecraft java -Xmx'.$GENERAL["memory"].' -Xms'.$GENERAL["memory"].' -jar /opt/Minecraft_Mod.jar');
	echo "<div class='success' style='display:block;'>Restored backup!</div>";
}

?>
	<div id="page_wrap">
		<div id="online_wrap">
			<h1>Tools</h1>
			<span id="online"></span>
			
		</div>
		<div class="info">Info message</div>
		        <div class="success">Successful operation message</div>
		        <div class="warning">Warning message</div>
		        <div class="error">Error message</div>
		<div id="actions">
			<p><a href="#"><img src="images/icons/asterisk_yellow.png">Start</a>&nbsp;<a href="#"><img src="images/icons/stop.png">Stop</a>&nbsp;<a href="#"><img src="images/icons/arrow_refresh.png">Restart</a></p>&nbsp;
		</div>
		<div id="backup_wrap">
		<h1>Backups</h1>
		<a href="javascript:void(0)" id="addnew">new backup</a>
		<div id="newbackup" style="display:none;margin: 15px 10px;">
			<form action="tools.php?action=backup" method="post">
				<label>Backup Name
				<input class="input_text" type="text" name="backup_name" style="width:200px;margin-left:10px" />
				</label>
				<label>Comment
				<input class="input_text" type="text" name="backup_comment" style="width:200px;margin-left:10px" />				
				</label>
				<span style="float:right;"><input class="button" type="submit" value="Save" /><input class="button" id="canceladd" type="button" value="Cancel" /></span>
			</form>
		</div>
		<table>
			<tr>
				<th>Name</th>
				<th>Date</th>
				<th>Time</th>
				<th>Size</th>
				<th>Comment</th>
				<th>Actions</th>
			</tr>
			<?php
            foreach($minecraft->backup_list() as $backup){
            ?>
			<tr>
				<td><?php echo $backup['name']; ?></td>
				<td><?php echo $backup['date']; ?></td>
				<td><?php echo $backup['time']; ?></td>
				<td><?php echo $backup['size']; ?></td>
				<td><?php echo $backup['comment']; ?></td>
				<td><a href="tools.php?action=dl&id=<?php echo $backup['id']; ?>"><img src="images/icons/database_save.png" alt="Download"></a>&nbsp;<a href="tools.php?action=delete&id=<?php echo $backup['id']; ?>"><img src="images/icons/database_delete.png" alt="Delete"></a>&nbsp;<a href="tools.php?action=restore&id=<?php echo $backup['id']; ?>"><img src="images/icons/database_go.png" alt="Restore"></a>&nbsp;</td>
			</tr>
			<?php
		}
			?>
		</table>
		</div>
		<div id="map_wrap">
			<h1>Mapping</h1>
			<p>Your last map generation was: NEVER</p>
			<p>You can access your map at xxxxxxx.minecraftservers.com/map/</p>
			<p><a href="#">Start a new map job</a></p>
		</div>
	<form action="#" method="POST">
	<input type="submit">
	</form>
	<h1>Reserve List</h1>
	<table>
		<th>Username</th>
	<?php
	$reserve = $minecraft->reserve_list();
	$i=0;
	foreach ($reserve as $user) {
		echo "<tr>";
		//echo '<input type="text" name="'.$i.'" value="'.$user['name'].'" <br />';
		echo "<td>".$user['name']."</td>";
		echo "</tr>";
	$i++;
	}
	?>
	</table>
	<h1>White List</h1>
	<table>
		<th>Username</th>
	<?php
	$white = $minecraft->white_list();
	$i=0;
	foreach ($white as $user) {
		echo "<tr>";
		//echo '<input type="text" name="'.$i.'" value="'.$user['name'].'" <br />';
		echo "<td>".$user['name']."</td>";
		echo "</tr>";
	$i++;
	}
	?>
	</table>
	<h1>Kits List</h1>
	<table>
		<th>Kit name</th>
		<th>Kit items</th>
		<th>Kit group</th>
	<?php
	$kits = $minecraft->kit_list();
	foreach ($kits as $kit) {
		echo "<tr>";
		echo "<td>".$kit['name'].'</td>';
		echo "<td>";
		$items = explode(",",$kit['items']);
		foreach($items as &$item){   
			echo '<img src="images/'.$item.'.png">';
		}
		echo "</td>";
		echo "<td>".$kit['group'].'</td>';
		echo "</tr>";
	}
	?>
	</table>
	<h1>Warp List</h1>
	<table>
		<th>Warp Name</th>
		<th>Warp Group</th>
	<?php
	$warps = $minecraft->warp_list();
	foreach ($warps as $warp) {
		echo "<tr>";
		echo "<td>".$warp['name'].'</td>';
		echo "<td>".$warp['group'].'</td>';
		echo "</tr>";
	}
	?>
	</table>
	</div>
	<script type="text/javascript">
		$(function(){
			$('#addnew').click(function(){
				$('#newbackup').slideDown();
			});
			$('#canceladd').click(function(){
				$('#newbackup').slideUp();
			});
		});
	</script>
<?php require_once('includes/footer.php'); ?>
