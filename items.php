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

		<div id="add_kit">
			<?php
			foreach($items as $item) {
				echo '<img src="images/'.$item['itemid'].'.png" width="25px" height="25px" />';
				echo '<input type="checkbox" name="item" value="'.$item['itemid'].'">';
			}
			?>		
		</div>

		<div id="kits">
			<h1>Kits</h1>
			<table>
				<th>Kit name</th>
				<th>Kit items</th>
				<th>Kit group</th>
				<th>Actions</th>
			<?php
			$kits = $minecraft->kit_list();
			foreach ($kits as $kit) {
				echo "<tr>";
				echo "<td>".$kit['name'].'</td>';
				echo "<td>";
				$items = explode(",",$kit['items']);
				foreach($items as &$item){   
					echo '<img src="images/'.$item.'.png">';
				}
				echo "</td>";
				echo "<td>".$kit['group'].'</td>';
				echo "<td><a href='tools.php?action=dlkit&id=".$kit['id']."'><img src='images/icons/delete.png'></a></td>";
				echo "</tr>";
			}
			?>
			</table>
		</div>
		
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
			<input class="button" type="submit">
			</form>
		</div>
	</div>
<?php require_once('includes/footer.php'); ?>