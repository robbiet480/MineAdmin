$(document).ready(function(){$('#login-form').animate({height: "show", opacity: 'show'},'slow')});
var error_showing=false;
function login(){
	document.getElementById("login-form").style.webkitTransition="-webkit-transform linear 0.2s";
	document.getElementById("login-form").style.webkitTransform="rotateX(90deg)";
	setTimeout(function(){
		$("#login_form_i").hide();
		$("#loading").show();
		play=true;
		setTimeout(rotate, 100);
		document.getElementById("login-form").style.webkitTransform="rotateX(0deg)";
		var user=$("#user").val();
		var pass=$("#pass").val();
		$.post("login_process.php",{"user":user,"pass":pass},function(data){
				window.location.href="index.php";
				document.getElementById("login-form").style.webkitTransform="rotateX(90deg)";
				setTimeout(function(){
					$("#login_form_i").show();
					document.getElementById("login-form").style.webkitTransform="rotateX(0deg)";
					$("#loading").hide();
				}, 3000);
				play=false;
			
		});
	}, 200);
}
var play=true;
var count = 0;
function rotate() {
    var elem4 = document.getElementById('div4');
    elem4.style.MozTransform = 'scale(0.5) rotate('+count+'deg)';
    elem4.style.WebkitTransform = 'scale(0.5) rotate('+count+'deg)';
    if (count==360) { count = 0 }
    count+=45;
    if(play){
    setTimeout(rotate, 100);}
}