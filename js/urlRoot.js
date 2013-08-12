function urlRoot(){
	pos_array=0;
	var delimiter="index.php/";
	var loc = document.location.href;
	var url = loc.split(delimiter);

	return url[pos_array]+delimiter;	
				
}