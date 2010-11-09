<?php
require_once('header_inc.php');
require_once('includes/header.php');
//passthru('/usr/bin/python /opt/Minecraft-Overviewer/gmap.py /opt/world /var/www/map/');
if($_GET['action'] == "backup") {
	$minecraft->backup($_POST['backup_name'],$_POST['backup_comment']);
} elseif($_GET['action'] == "dl") {
	
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
		<a href="#newbackup" id="addnew">new backup</a>
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
				<td><img src="images/icons/database_save.png" alt="Download">&nbsp;<img src="images/icons/database_delete.png" alt="Delete">&nbsp;<img src="images/icons/database_go.png" alt="Restore">&nbsp;</td>
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
</body>
</html>