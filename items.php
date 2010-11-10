<?php
$pageid = "news";
require_once('header_inc.php');
require_once('includes/header.php');
?>
	<div id="page_wrap">
		<?php
		$items = $minecraft->item_list();
		foreach ($items as $item) {
			echo '<img src="images/'.$item['itemid'].'.png">';
			echo '<input type="text" name="id_'.$item['itemid'].'" value="'.$item['itemid'].'" <br />';
			echo '<input type="text" name="name_'.$item['itemid'].'" value="'.$item['name'].'" <br /><br />';
		}
		?>
	</div>
<?php require_once('includes/footer.php'); ?>