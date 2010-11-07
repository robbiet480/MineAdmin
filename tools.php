<?php
require_once('header_inc.php');
require_once('includes/header.php');
//passthru('/usr/bin/python /opt/Minecraft-Overviewer/gmap.py /opt/world /var/www/map/');
if($_GET['action'] == "saveall") {
	save_all();
} elseif($_GET['action'] == "saveoff") {
	save_off();
} elseif($_GET['action'] == "saveaon") {
	save_on();
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
		<a href="tools.php?action=saveall">save-all</a>
		<a href="tools.php?action=saveoff">save-off</a>
		<a href="tools.php?action=saveon">save-on</a>
		<table>
			<tr>
				<th>Name</th>
				<th>Date</th>
				<th>Time</th>
				<th>Size</th>
				<th>Comment</th>
				<th>Actions</th>
			</tr>
			<tr>
				<td>backup1.tar.gz</td>
				<td>11/05/2010</td>
				<td>10:37PM PST</td>
				<td>500MB</td>
				<th>stuffs</th>
				<th><img src="images/icons/database_save.png" alt="Download">&nbsp;<img src="images/icons/database_delete.png" alt="Delete">&nbsp;<img src="images/icons/database_go.png" alt="Restore">&nbsp;
		</table>
		</div>
		<hr />
		<div id="map_wrap">
			<h1>Mapping</h1>
			<p>Your last map generation was: NEVER</p>
			<p>You can access your map at xxxxxxx.minecraftservers.com/map/</p>
			<p><a href="#">Start a new map job</a></p>
		</div>
	</div>
</body>
</html>