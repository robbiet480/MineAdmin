<?php
if(!file_exists('admin/config.php')) {
	header("Location: admin/install.php");
}
include('admin/includes/markdown.php');
include('admin/config.php');
?>
<!doctype html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>MinecraftServers.com</title><link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
   <div id="wrapper">
       <div id="container">
               <div id="content">
			  <?php echo Markdown(file_get_contents('admin/markdown.md'));?></div>
               <div id="footer">Powered by <a href="http://minecraftservers.com">MinecraftServers.com</a></div>
       </div>
  </div> 
</body>
</html>