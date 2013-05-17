	var HttPRequest = false;
	
	function newHttpRequest() {
		HttPRequest = false;
		if (window.XMLHttpRequest) { // Mozilla, Safari,...
			HttPRequest = new XMLHttpRequest();
			if (HttPRequest.overrideMimeType) {
				HttPRequest.overrideMimeType('text/html');
			}
		} else if (window.ActiveXObject) { // IE
			try {
				HttPRequest = new ActiveXObject("Msxml2.XMLHTTP");
			} catch (e) {
				try {
					HttPRequest = new ActiveXObject("Microsoft.XMLHTTP");
				} catch (e) {}
			}	
		} 
	
		if (!HttPRequest) {
			alert('Cannot create XMLHTTP instance');
			return false;
		}
	}
	
	
	
	
	function send(type, url, parameters, result_id){
		newHttpRequest();
		
		HttPRequest.open('POST',url, true);
		HttPRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		//HttPRequest.setRequestHeader("Content-length", parameters.length);
		//HttPRequest.setRequestHeader("Connection", "close");
		HttPRequest.send(parameters);
		
		HttPRequest.onreadystatechange = function(){
		
			if(HttPRequest.readyState == 3){  // Loading Request
				document.getElementById(result_id).innerHTML = "Loading ...";
			}
		
			if(HttPRequest.readyState == 4){ // Return Request
				document.getElementById(result_id).innerHTML = HttPRequest.responseText;
			}
		}
	}