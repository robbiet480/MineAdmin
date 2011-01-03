<?php
require_once('header_inc.php');
if($_GET['save']=="1"){
    $minecraft->configuration($_POST);
}
$config=$minecraft->configuration_files();
//echo "Coming soon....";
//exit;
?>
<!DOCTYPE HTML>
<html lang="en">
<head>
	<title>Administration Settings</title>
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
                    <form method="post" action="settings.php?save=1">
			<h1>Configuration Settings</h1>
                        <?php
                        foreach($config as $configuration){
                            ?><h1 style="width:850px;float:left;border-bottom:1px solid #e0e0e0;margin-top:40px;" class="over_html_h1">Configuration File: <?php echo $configuration['file'];?></h1><?php
                            foreach($configuration['properties'] as $conf){
                                ?>
                                <div class="over_html_row_wrap" style="width:840px;">
                                    <label>
                                        <span class="over_html_row" style="width:300px;font-size:18px;"><?php echo $conf[0];?></span>
                                        <input class="input_text" style="width:400px;margin-left:10px; type="text" name="<?php echo $configuration['file'].".".$conf[0];?>" value="<?php echo $conf[1];?>">
                                    </label>
                                </div>
                                <?php
                            }
                            ?>
                            <span class="input_area"><input class="button" type="submit" value="Save" /></span>
                            <?PHP
                        }
                        ?>
                        <div class="over_html_row_wrap" style="width:840px;">
                            <label>
                                <span class="over_html_row" style="width:300px;font-size:18px;"></span>
                                <span class="input_area"><input class="button" type="submit" value="Save" /></span>
                            </label>
                        </div>
                    </form>
		</div>
	</div>
        <script type="text/javascript">
		$("body").ready(function(){
			$(".fancy").fancybox();
		});
	</script> 
</body>
</html>