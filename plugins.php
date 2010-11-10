<?php
$pageid = "plugins";
require_once('header_inc.php');
require_once('includes/header.php');
?>
	<div id="page_wrap">
		<?php foreach $minecraft->get_plugins() as $plugin {
			echo "Name".$plugin['id']."<br>";
			echo "Status".$plugin['enabled']."<br>";
		} 
		?>
	</div>
<?php require_once('includes/footer.php'); ?>