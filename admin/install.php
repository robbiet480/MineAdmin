<?php
//superfantabolous installer
if(file_exists('config.php')) {
	header("Location: index.php");
}
?>
<!DOCTYPE HTML> 
<html lang="en"> 
<head>
	<title>MCSAdmin Installer - MinecraftServers.com</title>
	<style type="text/css">
		body {
			background: #ebebeb;
			font-family: 'Helvetica','Arial Narrow','Nimbus Sans L',sans-serif;
		}
		#installer {
		    background: #fff;
			left:50%;
			top:50%;
			margin-top: -202px;
			padding-bottom: 30px;
			margin-left: -250px;
			position: absolute;
			display: none;
		    width: 500px;
		    height: 404px;
		    overflow: show;
		    border-bottom-left-radius: 6px;
		    border-bottom-right-radius: 6px;
		    -moz-border-bottom-left-radius: 6px;
		    -moz-border-bottom-right-radius: 6px;		    
		}
		h1#logo {
			background: #972e2e url('../images/logo.png') no-repeat center;
			text-indent: -9999px;
			padding: 10px;
			margin-top: -10px;
		}
		h2, p, label, table {
			margin-left: 20px;
			margin-right: 20px;
		}
		table {
			width: 90%;
			text-align: left;
			border-collapse: collapse;
		}
		a {
			color: #144564;
			text-decoration: none;
		}
		.breadcrumb {
			color:#c6c6c6;
		}
		.active {
			color:#000;
		}
		#steps ul, #steps li {
			margin: -6px 0 0 0;
			padding: 0;
			list-style: none;
		}
		#steps, #steps li {
			width: 500px;
			overflow: hidden;
		}
		.input_text{
			padding:3px;
			padding-left:6px;
			font-size:18px;
			border-radius: 6px;
			-moz-border-radius: 6px;
			width:200px;
			letter-spacing: 2px;
			color:#000;
			border-radius: 6px;
			border:1px solid #e3e3e3;
			background:#f6f6f6;
		}
		#copy {
			position: absolute;
			color: #ccc;
			text-shadow:#fff 0px 1px 0, #999 0 -1px 0;
			margin-top: 40px;
			left: 30%;
		}
		span#prevBtn {
			padding-bottom: 10px;
		}
		span#nextBtn {
			padding-bottom: 10px;
			padding-right: 10px;
		}
	</style>
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.3/jquery.min.js"></script>
	<script type="text/javascript" src="js/easySlider.js"></script>
	<script type="text/javascript" language="javascript">
		$(document).ready(function(){	
			$('#installer').slideDown(500);
			$("#steps").easySlider({
				prevText:'< Back',
				nextText:'Next >',
				speed:'300',
			});
		});
	   var http_request = false;
	   function makePOSTRequest(url, parameters) {
	      http_request = false;
	      if (window.XMLHttpRequest) { // Mozilla, Safari,...
	         http_request = new XMLHttpRequest();
	         if (http_request.overrideMimeType) {
	         	// set type accordingly to anticipated content type
	            //http_request.overrideMimeType('text/xml');
	            http_request.overrideMimeType('text/html');
	         }
	      } else if (window.ActiveXObject) { // IE
	         try {
	            http_request = new ActiveXObject("Msxml2.XMLHTTP");
	         } catch (e) {
	            try {
	               http_request = new ActiveXObject("Microsoft.XMLHTTP");
	            } catch (e) {}
	         }
	      }
	      if (!http_request) {
	         alert('Cannot create XMLHTTP instance');
	         return false;
	      }

	      http_request.onreadystatechange = alertContents;
	      http_request.open('POST', url, true);
	      http_request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	      http_request.setRequestHeader("Content-length", parameters.length);
	      http_request.setRequestHeader("Connection", "close");
	      http_request.send(parameters);
	   }

	   function alertContents() {
	      if (http_request.readyState == 4) {
	         if (http_request.status == 200) {
	            //alert(http_request.responseText);
	            result = http_request.responseText;
	            document.getElementById('message').innerHTML = result;            
	         } else {
	            alert('There was a problem with the request.');
	         }
	      }
	   }

	   function get(obj) {
	      var poststr = "f_name=" + encodeURI( document.getElementById("f_name").value );
	      makePOSTRequest('post.php', poststr);
	   }
	</script>
</head>
<body>
	<div id="installer">
		<h1 id="logo">MCSAdmin</h1>
		<div id="steps">
			<ul>
				<li>
					<?php
					if(!file_exists('../config.php')) {
					?>
					<p class="breadcrumb"><span class="active">Welcome</span> > Account > Plugins > Install</p>
					<h2>Welcome to MCSAdmin.</h2>
					<p>Before you can use MCSAdmin, there are a few things that need to be set up.</p>
					<p>Ready? Click 'Next' to get started.</p>
					<?php
					} else {
					?>
					<p class="breadcrumb"><span class="active">Error</span></p>
					<h2>Hey!</h2>
					<p>You already installed MCSAdmin! You can't do it again dummy!</p>
					<p><a href="<?php echo $_SERVER['HTTP_HOST']; ?>/index.php">Go Login</a></p>
					<?php
					}
					?>
				</li>
				<li>
					<form action="javascript:get(document.getElementById('myform'));" name="myform" id="myform" method="post">
					<p class="breadcrumb">Welcome > <span class="active">Account</span> > Plugins > Install</p>
					<h2>Account Setup</h2>
					<p>Create the admin account to administer MCSAdmin.</p>
					<label for="username">Username: <input type="text" class="input_text" name="username" id="username"></label><br /><br />
					<label for="password">Password: <input type="password" class="input_text" name="password" id="password"></label>
				</li>
				<!--<li>
					<p class="breadcrumb">Welcome > Account > <span class="active">Plugins</span> > Install</p>
					<h2>Plugins</h2>
					<p>Plugins will extend the functionality of your Minecraft server, check the ones you'd like to install!</p>
					<table>
						<th>Plugin Name</th>
						<th>Description</th>
						<th>Install</th>
						<tr>
						<td>iConomy</td>
						<td>Lorizzle ipsizzle dolor mofo the bizzle, da bomb adipiscing elit.</td>
						<td><input type="checkbox" /></td>
						</tr>
						<tr>
						<td>EditLog</td>
						<td>Phasellizzle interdum volutpat pot.</td>
						<td><input type="checkbox" /></td>
						</tr>
						<tr>
						<td>LogBlock</td>
						<td>Praesent nizzle mi i saw beyonces tizzles and my pizzle went crizzle mauris bow wow wow bibendizzle.</td>
						<td><input type="checkbox" /></td>
						</tr>
						<tr>
						<td>Craftizens</td>
						<td>In sagittis shut the shizzle up nizzle nisi.</td>
						<td><input type="checkbox" /></td>
						</tr>																		
					</table>
					<br/>
				</li>-->
				<li>
					<p class="breadcrumb">Welcome > Account > Plugins > <span class="active">Install</span></p>
					<h2>Ready to install.</h2>
					<p>We have everything we need, all you need to do is click 'Install'!</p>
					<p style="color:#ff0000;font-weight:bold;text-transform:uppercase;">Do not close this page while installing.</p>
					<input type="submit" style="background:#144564;color:#fff;font-size:24px;width:92%;height:48px;margin-left:20px;margin-top:60px;" name="install" value="Install" />
					</form>
				</li>
			</ul>
		 </div>
		<p id="copy">&copy; <?php echo date("Y"); ?> Hostiio, LLC.</p>
	</div>
</body>
</html>