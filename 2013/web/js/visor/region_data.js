//CARGA NOMBRE DE DEPARTAMENTO POR CODIGO
function get_Depa(code){

	$.ajax({
		url: 'convocatoria/registro/get_ajax_dptobyCode/',
		type: 'POST',
		dataType: 'json',
		data: {code: code},
		success: function(data){
        	
            $.each(data, function(index, val) {
				$('.departamento').val(val.Nombre);			
			});

        }
		
	});
	
}

//CARGA NOMBRE DE PROVINCIA POR CODIGOS
function get_Prov(depa,prov){

	$.ajax({
		url: 'convocatoria/registro/get_ajax_provsbyCode/',
		type: 'POST',
		dataType: 'json',
		data: { depa: depa , prov:prov },
		success: function(data){
        	
            $.each(data, function(index, val) {
				$('.provincia').val(val.Nombre);			
			});

        }
		
	});

}

//CARGA NOMBRE DE DISTRITO POR CODIGOS
function get_Dist(depa,prov,dist){

	$.ajax({
		url: 'convocatoria/registro/get_ajax_distbyCode/',
		type: 'POST',
		dataType: 'json',
		data: {depa:depa , prov:prov , dist:dist},
		success: function(data){
        	
            $.each(data, function(index, val) {
				$('.distrito').val(val.Nombre);			
			});

        }
		
	});

}

//VERIFICA Y CHECKA LOS CHECKS Y RADIOBUTTONS 

function get_Radio_Check_Verif(value,id){

//	alert(id+value)
	if(value!=null){
		//alert(id+value)
		document.getElementById(id+value).checked=true; 
	}
}


//==============================FIN=BASICAS=============================================
