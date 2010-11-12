var Ajax = new Object();
Ajax.isUpdating = true;

Ajax.Request = function(method, url, query, callback)
{
	this.isUpdating = true;
	this.callbackMethod = callback;
	this.request = (window.XMLHttpRequest)? new XMLHttpRequest(): new ActiveXObject("MSXML2.XMLHTTP");
	this.request.onreadystatechange = function() { Ajax.checkReadyState(); };

	if(method.toLowerCase() == 'get') url = url+"?"+query;
	this.request.open(method, url, true);
	this.request.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	this.request.send(query);
}

Ajax.checkReadyState = function(_id)
{
	switch(this.request.readyState)
	{
		case 1: break;
		case 2: break;
		case 3: break;
		case 4:
			this.isUpdating = false;
			this.callbackMethod(this.request.responseXML.documentElement);
	}
}
