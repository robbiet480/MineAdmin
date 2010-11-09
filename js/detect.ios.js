if ( (navigator.userAgent.indexOf('iPad') != -1) ) {
	meta = document.createElement('meta');
	meta.name = "viewport";
	meta.content = "initial-scale = 1.0, user-scalable = no"
	document.getElementsByTagName('head').item(0).appendChild(meta);
	$("input").append(' autocorrect="off" autocapitalize="off" ');
}

