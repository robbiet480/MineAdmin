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
	 function toggleElement(btn)
			{
				x=document.getElementById("step1");
				x.style.display=(x.style.display=="none")?"block":(x.style.display=="block")?"none":"block";
				//btn.value=(x.style.display=="none")?"Hide":"Unhide";
			}
			function add_content(){
				document.getElementById("well").innerHTML="What are you looking at me for? I told you NOT to click it! Next time, listen to directions. But here, <a onClick='add_content1()' target='_blank' href='http://vimeo.com/1109226?pg=embed&sec=1109226'>this is actually cool</a>...";
			}
			function add_content1(){
				document.getElementById("well").innerHTML="See now wasn't that cool! Ok, now I am out of videos and if this progress bar isn't done yet then someone screwed the pooch. Please file a support ticket <a href='https://billing.hostiio.com/submitticket.php?step=2&deptid=2'>here</a>. I'm real sorry 'bout this. :(";
			}
	</script>
</head>
<body>
	<h1>Hi!</h1>
	<p>Hello there and welcome to the official MinecraftServers.com (&copy;) SuperFantabolous Installer!</p>
	<p>We are going to ask you a few simple questions and then you will be on your way to MineCrack!</p>
	<form action="javascript:get(document.getElementById('myform'));" name="myform" id="myform" method="post">
		<label for="f_name">First, what is your first name?</label><input type="text" name="f_name" id="f_name" onchange="this.form.submit();toggleElement(this);">

<div name="message" id="message"></div>
<div id="step1" style="display:none;">
<p>Next, I need to get some basic info from you.</p>
<label for="username">What username would you like to use to access the web interface?</label><input type="text" name="username" id="username"><br/>
<label for="password">And what password would you like to use to access the web interface?</label><input type="password" name="password" id="password"><br/>
<h2>Allrighty then...,</h2><p>what about plugins? We are offering a few specific plugins to you because during the setup process when your database is created, we need to do some special magic</p>
<p>PLUGINS HERE</p>
<br/>
<h2>OK then!</h2><p>You are all done. Feel free to now sit back, relax, and watch this pretty progress bar scroll quickly across your screen as our magical server gremlins do their work. I must insist however that you <b>DO NOT LEAVE THIS PAGE</b>. Don't close it. Or it will be your head!</p>
<p>Also, please don't press <a onclick="add_content()" href="http://www.youtube.com/v/4R-7ZO4I1pI&fs=1&iv_load_policy=3&autoplay=1" target="_blank">this</a>.</p>
<span id="well"></span>
</div>
</form>
</body>
</html>