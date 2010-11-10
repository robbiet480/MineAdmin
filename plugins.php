<?php
$pageid = "plugins";
require_once('header_inc.php');
require_once('includes/header.php');
?>
	<div id="page_wrap">
		<?php $minecraft->get_plugins(); ?>
	</div>
<?php require_once('includes/footer.php'); ?>