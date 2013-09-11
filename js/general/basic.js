
function urlRoot(delimiter){
	pos_array=0;
	var delimiter;
	var loc = document.location.href;
	var url = loc.split(delimiter);

	return url[pos_array]+delimiter;	
				
}

function localE(){
    pos_array=1;
    var delimiter="?le=";
    var loc = document.location.href;
    var url = loc.split(delimiter);

    return url[pos_array];    
                
}

function check_Radio(value,id){

//  alert(id+value)
    if(value!=null){
        //alert(id+value)
        document.getElementById(id+value).checked=true; 
    }
}


(function($){

    var imported = [];

    $.extend(true,
    {
        import : function(script)
        {
            var found = false;
            for (var i = 0; i < imported.length; i++)
                if (imported[i] == script) {
                    found = true;
                    break;
                }

            if (found == false) {
                $("head").append('<script type="text/javascript" src="' + urlRoot("cie/") + script + '"></script>');
                imported.push(script);
            }
        }
        
    });

})(jQuery);