<?php
$pageid = "items";
require_once('header_inc.php');
require_once('includes/header.php');
?>

	<div id="page_wrap">

		<h1>Items</h1>
		
        <div id="items">
			<?php
			$items = $minecraft->item_list();
			foreach ($items as $item) {
				echo '<label style="clear:both;"><span><img src="images/'.$item['itemid'].'.png" width="25px" height="25px" /><input type="text" class="item_id" name="id_'.$item['itemid'].'" value="'.$item['itemid'].'" />';
				echo '<input type="text" class="item_name" name="name_'.$item['itemid'].'" value="'.$item['name'].'" /></span></label><br />';
			}
			?>
        </div>
			
		<div>
			<form action="#" method="POST">
			<input class="button" type="submit">
			</form>
		</div>
	</div>
<?php require_once('includes/footer.php'); ?>