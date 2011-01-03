<?php
require_once('header_inc.php');
?>
<!DOCTYPE HTML>
<html lang="en">
<head>
	<title>Administration Group Listing</title>
	<link rel="stylesheet" href="style.css" type="text/css" media="screen" />
	<link rel="stylesheet" href="jquery.alerts.css" type="text/css" media="screen" />
	<link rel="stylesheet" href="jquery.autocomplete.css" type="text/css" media="screen" />
        <link rel="stylesheet" type="text/css" href="fancybox/jquery.fancybox-1.3.2.css" media="screen" />
	<link rel="stylesheet" href="jquery.jgrowl.css" type="text/css" media="screen" />
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.3/jquery.min.js"></script>
	<script type="text/javascript" src="jquery-css-transform.js"></script>
	<script type="text/javascript" src="jquery.autocomplete.pack.js"></script>
	<script type="text/javascript" src="jquery.bgiframe.min.js"></script>
	<script type="text/javascript" src="jquery.alerts.js"></script>
        <script type="text/javascript" src="fancybox/jquery.mousewheel-3.0.4.pack.js"></script>
	<script type="text/javascript" src="fancybox/jquery.fancybox-1.3.2.js"></script>
	<script type="text/javascript" src="jquery.jgrowl_minimized.js"></script>
	<script type="text/javascript" src="jquery.ui.all.js"></script>
	<script type="text/javascript" src="system.js"></script> 
</head>
<body>
	<div id="menu-wrap">
		<h2>MineCraft Server</h2>
		<ul>
			<li><a href="logout_process.php">Logout</a></li>
			<li><a href="settings.php">Settings</a></li>
                        <li><a href="backup.php">Backup</a></li>
			<li><a href="exec.php">Exec</a></li>
			<li><a href="groups.php">Groups</a></li>
			<li><a href="bans.php">Bans</a></li>
			<li><a href="users.php">Users</a></li>
			<li><a href="start.php">Online Now</a></li>
		</ul>
	</div>
	<div id="page_wrap">
		<div id="online_wrap">
			<h1>Group Configuration</h1>
                        <div class="give_link"><span style="height:19px;float:left;text-align:left;margin-top:10px;"><a href="add_group.php" class="link_give fancy">&lsaquo; Add &rsaquo;</a></span></div>
			<span id="online">
                            <ul>
                                    <li class="name" style="text-align:left;text-decoration:underline;">Group Name</li>
                                    <li class="name" style="width:40px;text-align:center;text-decoration:underline;">Prefix</li>
                                    <li class="name" style="text-decoration:underline;text-align:center;">Inherit Group</li>
                                    <li class="world" style="width:70px;text-decoration:underline;">Admin</li>
                                    <li class="world" style="width:70px;text-decoration:underline;">Ignore</li>
                                    <li class="world" style="width:70px;text-decoration:underline;">Default</li>
                                    <li class="world" style="width:70px;text-decoration:underline;">Modify</li>
                                    <li class="actions" style="width:235px;text-decoration:underline;"></li>
                            </ul>
                            <?php
                            foreach($minecraft->group_list() as $group){
                                ?>
                                <div>
                                    <ul>
                                            <li class="name" style="text-align:left;"><?php echo $group['name'];?></li>
                                            <li class="name" style="width:40px;text-align:center;"><?php echo $group['prefix'];?></li>
                                            <li class="name" style="text-align:center;"><?php echo $group['inheritedgroups'];?></li>
                                            <li class="world" style="width:70px;"><?php if($group['admin']){ echo "<img src=\"images/icon-checkmark.png\" />"; }else{ echo "<img src=\"images/toolbar-icon-delete.png\" />"; };?></li>
                                            <li class="world" style="width:70px;"><?php if($group['ignoresrestrictions']){ echo "<img src=\"images/icon-checkmark.png\" title=\"Ignoring restriction\" />"; }else{ echo "<img src=\"images/toolbar-icon-delete.png\" title=\"restriction in place for this user\" />"; };?></li>
                                            <li class="world" style="width:70px;"><?php if($group['defaultgroup']){ echo "<img src=\"images/icon-checkmark.png\"/>"; }else{ echo "<img src=\"images/toolbar-icon-delete.png\" />"; };?></li>
                                            <li class="world" style="width:70px;"><?php if($group['canmodifyworld']){ echo "<img src=\"images/icon-checkmark.png\" />"; }else{ echo "<img src=\"images/toolbar-icon-delete.png\" />"; };?></li>
                                            <li class="actions" style="width:235px;"><a class="fancy" href="edit_group.php?gid=<?php echo $group['id'];?>">&lsaquo; edit &rsaquo;</a> <a class="fancy" href="group_commands.php?gid=<?php echo $group['id'];?>">&lsaquo; clist &rsaquo;</a> <a href="javascript: default_group('<?php echo $group['name'];?>','<?php echo $group['id'];?>');">&lsaquo; default &rsaquo;</a>  <a href="javascript:delete_group('<?php echo $group['name'];?>','<?php echo $group['id'];?>');">&lsaquo; delete &rsaquo;</a> </li>
                                    </ul>
                                </div>
                                <?PHP
                            }
                            ?>
                        </span>
		</div>
	</div>
        <script type="text/javascript">
		$("body").ready(function(){
			$(".fancy").fancybox();
		});
	</script> 
</body>
</html>