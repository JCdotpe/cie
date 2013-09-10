function urlRoot(){
	pos_array=0;
	var delimiter="index.php/";
	var loc = document.location.href;
	var url = loc.split(delimiter);

	return url[pos_array]+delimiter;	
				
}

function loadScript(url, callback)
{
    // adding the script tag to the head as suggested before
   var head = document.getElementsByTagName('head')[0];
   var script = document.createElement('script');
   script.type = 'text/javascript';
   script.src = url;

   // then bind the event to the callback function 
   // there are several events for cross browser compatibility
   script.onreadystatechange = callback;
   script.onload = callback;

   // fire the loading
   head.appendChild(script);
}