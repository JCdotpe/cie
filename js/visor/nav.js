$(document).ready(function() {
	
	nav_Active()

	function nav_Active(){

	    pos_array=6;
	    var delimiter="/";
	    var loc = document.location.href;
	    var url = loc.split(delimiter);
	    $('#'+url[pos_array]).addClass('active');

	    if(url[pos_array]=="caratula1" || url[pos_array]=="capitulo1" || url[pos_array]=="capitulo2" || url[pos_array]=="capitulo3"){

	    	$('#tab1').addClass('active');	

	    }
	    
	    if(url[pos_array]=="caratula2" || url[pos_array]=="capitulo4" || url[pos_array]=="capitulo5"){

	    	$('#tab2').addClass('active');	

	    }

	    if(url[pos_array]=="caratula3" || url[pos_array]=="capitulo6" || url[pos_array]=="capitulo7" || url[pos_array]=="capitulo8"){

	    	$('#tab3').addClass('active');	

	    }
	                
	}

});