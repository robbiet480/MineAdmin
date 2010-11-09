if ( (navigator.userAgent.indexOf('iPad') != -1) ) {
	meta = document.createElement('meta');
	meta.name = "viewport";
	meta.content = "initial-scale = 1.0, user-scalable = no"
	document.getElementsByTagName('head').item(0).appendChild(meta);
	link = document.createElement('link');
	link.rel = "apple-touch-startup-image";
	link.href = "../images/ipad-startup,png"
	document.getElementsByTagName('head').item(1).appendChild(link);
	$("input").append(' autocorrect="off" autocapitalize="off" ');
}