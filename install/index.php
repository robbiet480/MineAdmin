<?php
//superfantabolous installer
?>
<!DOCTYPE HTML> 
<html lang="en"> 
<head>
	<title>MinecraftServers SuperFantabolous Installer!</title>
	<style type="text/css">
	body {
		background: #FFF url('ui-progress-bar/images/bg-tile.png') repeat;
		font-family: 'Helvetica','Arial Narrow','Nimbus Sans L',sans-serif;
	}
	</style>
	<script type="text/javascript" language="javascript">
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
	<h1>Hi!</h1>
	<p>Hello there and welcome to the official MinecraftServers.com (&copy;) SuperFantabolous Installer!</p>
	<p>We are going to ask you a few simple questions and then you will be on your way to MineCrack!</p>
	<form action="javascript:get(document.getElementById('myform'));" name="myform" id="myform" method="post">
		<label>First, what is your first name?</label><input type="text" name="f_name" id="f_name" onchange="this.form.submit();">
	</form>
<div name="message" id="message"></div>
		
</body>
</html>