<!DOCTYPE HTML>
<html lang="en">
<head>
	<title>Administration Login</title>
	<link rel="stylesheet" href="style_login.css" type="text/css" media="screen" />
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.3/jquery.min.js"></script>
	<script type="text/javascript" src="jquery-css-transform.js"></script> 
	<script type="text/javascript" src="system_login.js"></script> 
</head>
<body>
	<div id="error" style="display:none;">Username was not found, please try again...</div>
	<div id="login-form">
		<form action="javascript:login();" method="post">
			<div id="login_form_i">
				<h1>MineCraft Admin Panel</h1>
				<label><span>Username</span><input type="text" name="user" id="user" /></label><br />
				<label><span>Password</span><input type="password" name="pass" id="pass" /></label><br />
				<input type="submit" value="Login">
			</div>
			<div id="loading" style="display:none;">
				<div id="div4"> 
  					<div class="bar1"></div> 
  					<div class="bar2"></div> 
					<div class="bar3"></div> 
  					<div class="bar4"></div> 
  					<div class="bar5"></div> 
  					<div class="bar6"></div> 
  					<div class="bar7"></div> 
  					<div class="bar8"></div> 
				</div> 
			</div>
		</form>
	</div>
</body>
</html>