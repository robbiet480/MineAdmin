var Post = new Object();
Post.Send = function(form)
{
	var query = Post.buildQuery(form);
	Ajax.Request(form.method, form.action, query, Post.OnResponse);
}

Post.OnResponse = function(xml)
{
	var results = document.createElement('div');
	document.getElementsByTagName('body')[0].appendChild(results)
	results.innerHTML = xml.firstChild.nodeValue;
}

Post.buildQuery = function(form)
{
	var query = "";
	for(var i=0; i< formElement.length; x++)
				if(formElement[x].checked == true)
			return formElement[x].value;

		case 'select-multiple':
			var myArray = new Array();
			for(var x=0; x < formElement.length; x++)
				if(formElement[x].selected == true)
					myArray[myArray.length] = formElement[x].value;
			return myArray;

		case 'checkbox': return formElement.checked;

		default: return formElement.value;
	}
}