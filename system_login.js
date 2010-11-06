var error_showing=false;
function login(){
//	document.getElementById("login-form").style.webkitTransition="-webkit-transform linear 0.2s";
//	document.getElementById("login-form").style.webkitTransform="rotateX(90deg)";
	setTimeout(function(){
		$("#login_form_i").hide();
		$("#loading").show();
		play=true;
		setTimeout(rotate, 100);
//		document.getElementById("login-form").style.webkitTransform="rotateX(0deg)";
		var user=$("#user").val();
		var pass=$("#pass").val();
		$.post("login_process.php",{"user":user,"pass":pass},function(data){
			if(data=="1"){
				location.href="index.php";
			}else{
				if(!error_showing){
					error_showing=true;
					$("#error").css({"display":"block","opacity":"0"});
					$("#error").animate({"opacity":"0.6","marginTop":"-264px"},500);
					setTimeout(function(){
						$("#error").animate({"opacity":"0","marginTop":"-304px"},500,function(){
							$("#error").css({"display":"none","opacity":"0"});
							error_showing=false;
						});
					}, 3000);
				}
//				document.getElementById("login-form").style.webkitTransform="rotateX(90deg)";
				setTimeout(function(){
					$("#login_form_i").show();
//					document.getElementById("login-form").style.webkitTransform="rotateX(0deg)";
					$("#loading").hide();
				}, 200);
				play=false;
			}
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
    if(play)
    	setTimeout(rotate, 100);
}