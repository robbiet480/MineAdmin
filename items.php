<?php
$pageid = "items";
require_once('header_inc.php');
require_once('includes/header.php');
$items = $minecraft->item_list();
if(isset($_POST['item_name'])) {
	global $db;
	$result=$db->set('items',array('name'=>$_POST['item_name']),array('id'=>$_POST['id']));
}
if($_GET['action'] == "dlkit") {
	$result=$db->delete("kits", array("id"=>$_GET['id']));
	$minecraft->reload_kits();
	echo "<div class='success' style='display:block;'>Removed ".$_GET['id']." from kits</div>";
}
?>

	<div id="page_wrap">

        <div id="items">
    		<h1>Items</h1>
    		
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
			<input class="btn" type="submit">
			</form>
		</div>
		
	</div>
<?php require_once('includes/footer.php'); ?>