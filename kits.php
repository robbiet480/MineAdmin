<?php
$pageid = "kits";
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
			<form action="kits.php?action=savekit" method="post">
			<h3>Pick the items you'd like in your kit.</h3>
				<?php
				foreach($items as $item) {
				if(file_exists('images/'.$item['itemid'].'.png')) {
					echo '<span><img src="images/'.$item['itemid'].'.png" alt="'.$item['name'].'" width="25px" height="25px" />';
				} else {
					echo '<span><img src="images/default.png" alt="'.$item['name'].'" width="25px" height="25px" />';
				}
					echo '<input type="checkbox" name="item" value="'.$item['itemid'].'"></span>';
				}
				?>	
				<br />	
				<label>Kit Name
				<input class="input_text" type="text" name="kit_name" style="width:200px;margin-right:10px" />
				</label>
				<label>Group
				<select class="input_text" name="kit_group" style="width:100px;margin-left:10px">
				<?php
				foreach($minecraft->group_list as $groups) {
					echo "<option value='".$groups['name']."'>".$groups['name']."</option>";
				}
				?>
				</select>			
				</label>
				<label>Delay
				<select class="input_text" name="kit_delay" style="width:90px;margin-right:10px">	
					<option value="-1">Once</option>
					<option value="6000">5m</option>
					<option value="18000">15m</option>
					<option value="36000">30m</option>
					<option value="54000">45m</option>
					<option value="72000">60m</option>
				</select>			
				</label>				
				<span style="float:right;"><input class="button" type="submit" value="Save" /><input class="button" id="canceladd" type="button" value="Cancel" /></span>
			</form>
		</div>

		<div id="kits">
			<h1>Kits</h1>
			<p><a class="btn" href="javascript:void(0)" style="font-size:10px;color:#fff;" id="addnew">Add Kit</a></p><br /><br />
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

	</div>
	<script type="text/javascript">
		$(function(){
			$('#addnew').click(function(){
				$('#add_kit').slideDown();
			});
			$('#canceladd').click(function(){
				$('#add_kit').slideUp();
			});
		});
	</script>
<?php require_once('includes/footer.php'); ?>