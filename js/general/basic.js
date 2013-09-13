
function urlRoot(delimiter){

	pos_array=0;
	var delimiter;
	var loc = document.location.href;
	var url = loc.split(delimiter);

    return url[pos_array]+delimiter;	
	
}

function urlCombo(delimiter){

    pos_array=0;
    var delimiter;
    var loc = document.location.href;
    var url = loc.split(delimiter);
    
    if(delimiter=='.'){
        return loc;
    }else{
       return url[pos_array]; 
    }       

}

function localE(){
   
    pos_array=1;
    var delimiter="?le=";
    var loc = document.location.href;
    var url = loc.split(delimiter);

    return url[pos_array];    
                
}

function nroPredio(){

    pos_array=1;
    var delimiter="&pr=";
    var loc = document.location.href;
    var url = loc.split(delimiter);

    return url[pos_array];

}

function getToken(){

   var token='7959ac60dc22523a9ac306ac6f9308d3d7201c56';
   return token;

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

//---------VALIDATIONS-----------------

function tipoPredio(codigo){

    switch(codigo){
        case 0:
            return 'No Colindante';
        break;
        case 1:
            return 'Colindante';
        break;
    }

}

function prop_Predio(codigo,otro){

    switch(codigo){
        case 1:
            return 'Ministerio de Educación';
        break;
        case 2:
            return 'Institución Educativa';
        break;
        case 3:
            return 'Estado';
        break;
        case 4:
            return otro;
        break;
        case 5:
            return otro;
        break;
    }

}

function inmueble_Predio(codigo){
    switch(codigo){
        case 1:
            return 'No tiene Constancia';
        break;
        case 2:
            return 'No sabe';
        break;
    }
}