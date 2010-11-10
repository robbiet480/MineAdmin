<?php
$pageid = "items";
require_once('header_inc.php');
require_once('includes/header.php');
$items = $minecraft->item_list();
if(isset($_POST['item_name'])) {
	global $db;
	$result=$db->set('items',array('name'=>$_POST['item_name']),array('id'=>$_POST['id']));
}
?>

	<div id="page_wrap">

		<h1>Items</h1>
		<div id="kits">
		<?php
		foreach($items as $item) {
			echo '<img src="images/'.$item['itemid'].'.png" width="25px" height="25px" />';
			echo '<input type="checkbox" name="item" value="'.$item['itemid'].'">';
		}
		?>
		</div>
        <div id="items">
			<?php
			foreach ($items as $item) {
				echo '<label style="clear:both;"><span><img src="images/'.$item['itemid'].'.png" width="25px" height="25px" /><input type="text" disabled="disabled" class="item_id" name="id_'.$item['itemid'].'" value="'.$item['itemid'].'" />';
				echo '<input type="hidden" name="id" value="'.$item['itemid'].'">';
				echo '<input type="text" class="item_name" name="item_name" value="'.$item['name'].'" /></span></label><br />';
			}
			?>
        </div>
			
		<div>
			<form action="items.php" method="POST">
			<input class="button" type="submit">
			</form>
		</div>
	</div>
<?php require_once('includes/footer.php'); ?>