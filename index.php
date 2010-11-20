<!doctype html>
<html>
<head>
  <title>MinecraftServers.com</title>
  <style type="text/css">
    * { margin: 0; padding: 0; }
    #wrapper{display:table;overflow:hidden;margin:0px auto;}
    *:first-child+html #wrapper {position:relative;}/*ie7*/
    * html #wrapper{position:relative;}/*ie6*/
    #container{display:table-cell;}
    html,body{height:100%;}
    body {background: #d3d3d3 url('images/bg.png') no-repeat top center; font-family: sans-serif; font-size: 16px;}
    a {text-decoration: none;}
	#footer {color: #b2b2b2;text-shadow:#fff 0px 1px 0, #999 0 -1px 0;}
    #footer a {color: #144564;text-decoration: none;}
    #wrapper{height:100%;width:800px;}
    #content {margin-top: 75px;}
	#footer {position: absolute;bottom: 15px;width:800px;text-align: center;}
  </style>
</head>
<body>
   <div id="wrapper">
       <div id="container">
               <div id="content">
<?php echo file_get_contents('admin/markdown.md');?>
	            </div>
               <div id="footer">Powered by <a href="http://minecraftservers.com">MinecraftServers.com</a></div>
       </div>
  </div> 
</html>