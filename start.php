<?php
require_once('header_inc.php');
require_once('includes/header.php');
function get_memory() {
  foreach(file('/proc/meminfo') as $ri)
    $m[strtok($ri, ':')] = strtok('');
  return 100 - round(($m['MemFree'] + $m['Buffers'] + $m['Cached']) / $m['MemTotal'] * 100);
}

?>
	<div id="page_wrap">
		<p>Hostname: <?php echo shell_exec('cat /etc/hostname'); ?></p><br />
		<p>CPU Usage: <?php echo shell_exec("ps aux|awk 'NR > 0 { s +=$3 }; END {print s}'"); ?>%</p><br />
		<p>Memory Usage: <?php echo get_memory(); ?>%</p><br />
		<p>Disk usage: <?php disk_free_space("/")."/".disk_total_space("/");?></p><br />
	</div>
</body>
</html>