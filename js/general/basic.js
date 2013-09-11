
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


    if(value!=null){
        
        document.getElementById(id+value).checked=true; 
    
    }
}


(function($){

    var imported = [];

    $.extend(true,
    {
        import : function(url,type,clase)
        {
            var found = false;
            for (var i = 0; i < imported.length; i++)
                if (imported[i] == url) {
                    found = true;
                    break;
                }

            if(clase==null || clase==undefined || clase==''){
                clase="head";                
            }else{
                clase='.'+clase;
            }

            if (found == false) {

                switch(type){
                    case 'js':
                    $(clase).append('<script type="text/javascript" src="' + urlRoot("cie/") + url + '"></script>');
                    break;
                    case 'css':
                    $(clase).append('<link rel="stylesheet" href="' + urlRoot("cie/") + url + '"/>');
                    break;
                    case 'image':
                    $(clase).html('<img src="' + urlRoot("cie/") + url + '" alt="" />');
                    break;

                }
                
                

                imported.push(url);
            }
        }
        
    });

})(jQuery);