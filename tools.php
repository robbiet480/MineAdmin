<?php
require_once('header_inc.php');
require_once('includes/header.php');
//passthru('/usr/bin/python /opt/Minecraft-Overviewer/gmap.py /opt/world /var/www/map/');
if($_GET['action'] == "restart") {
	echo 
}
?>
	<div id="page_wrap">
		<div id="online_wrap">
			<h1>Tools</h1>
			<span id="online"></span>
			
		</div>
		<div id="actions">
			<a href="#"><img src="images/icons/asterisk_yellow.png">Start</a>&nbsp;<a href="#"><img src="images/icons/stop.png">Stop</a>&nbsp;<a href="#"><img src="images/icons/arrow_refresh.png">Restart</a>&nbsp;
		</div>
		<div id="backup_wrap">
		<h1>Backups</h1>
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
		<a href="#">Start a new map job</a>
		</div>
	</div>
</body>
</html>