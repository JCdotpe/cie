$(document).ready(function(){

	$.import('img/map.png','image','map');

	P4();
	P42N();

	$('input').attr({
		disabled : true,
	});

});


function P4(){

	$.getJSON(urlRoot('index.php')+'/visor/p4/Data/', {token: getToken(),id_local: getLocal(), predio: getPredio()}, function(data, textStatus) {
		
		$.each(data, function(index, val) {

			$('#P4_1_Foto').val(val.P4_1_Foto);
			$('#P4_1_Obs').html(val.P4_1_Obs);

			$('#P4_2_CantTram_Lfrente').val(val.P4_2_CantTram_Lfrente);
			$('#P4_2_CantTram_Lderecho').val(val.P4_2_CantTram_Lderecho);
			$('#P4_2_CantTram_Lfondo').val(val.P4_2_CantTram_Lfondo);
			$('#P4_2_CantTram_Lizq').val(val.P4_2_CantTram_Lizq);


		});


	}).fail(function( jqxhr, textStatus, error ) {
	
		var err = textStatus + ', ' + error;
		console.log( "Request Failed: " + err);
	
	});
			
}

function P42N(){



	$.getJSON(urlRoot('index.php')+'/visor/p42n/Data/', {token: getToken(),id_local: getLocal(), predio: getPredio()}, function(data, textStatus) {

		i = 1;

		var html_frente="";
		var html_derecho="";
		var html_fondo="";
		var html_izquierdo="";

		$.each(data, function(index, val) {

			if(val.P4_2_1C_Cerco == 1)
			{
				text_P4_2_1C_Cerco = "SI";
			}
			else
			{
				text_P4_2_1C_Cerco = "NO";	
			}

			if(val.P4_2_1D_Estruc == 0)
			{
				text_P4_2_1D_Estruc = "";
			}

			if(val.P4_2_1D_Estruc == 1)
			{
				text_P4_2_1D_Estruc = "Albañilería confinada / armada";
			}

			if(val.P4_2_1D_Estruc == 2)
			{
				text_P4_2_1D_Estruc = "Albañilería sin confinar";
			}			

			if(val.P4_2_1D_Estruc == 3)
			{
				text_P4_2_1D_Estruc = "Malla electrosoldada / alambre";
			}						

			if(val.P4_2_1D_Estruc == 4)
			{
				text_P4_2_1D_Estruc = "Adobe / tapia / pirca u otros";
			}									

//
			if(val.P4_2_1E_EstCons == 0)
			{
				text_P4_2_1E_EstCons = "";
			}

			if(val.P4_2_1E_EstCons == 1)
			{
				text_P4_2_1E_EstCons = "Sin daño";
			}

			if(val.P4_2_1E_EstCons == 2)
			{
				text_P4_2_1E_EstCons = "Fisuras leves";
			}			

			if(val.P4_2_1E_EstCons == 3)
			{
				text_P4_2_1E_EstCons = "Fisuras moderadas / ataque de sales";
			}						

			if(val.P4_2_1E_EstCons == 4)
			{
				text_P4_2_1E_EstCons = "Agrietamiento / colapso";
			}									

//

//
			if(val.P4_2_1F_Opin == 0)
			{
				text_P4_2_1F_Opin = "";
			}

			if(val.P4_2_1F_Opin == 1)
			{
				text_P4_2_1F_Opin = "Mantenimiento";
			}

			if(val.P4_2_1F_Opin == 2)
			{
				text_P4_2_1F_Opin = "Rehabilitación";
			}			

			if(val.P4_2_1F_Opin == 3)
			{
				text_P4_2_1F_Opin = "Demolición";
			}						

//


// lindero frente

			if(val.P4_2_LindTipo == 1)
			{

				html_frente+='<tr>'+
					'<td>'+val.P4_2_1A_NroTramo+'</td>'+
					'<td>'+val.P4_2_1A_i+' - '+val.P4_2_1A_f+'</td>'+
					'<td>'+val.P4_2_1B_LongTramo+'</td>'+
					'<td>'+text_P4_2_1C_Cerco+'</td>'+ 
					'<td>'+text_P4_2_1D_Estruc+'</td>'+
					'<td>'+text_P4_2_1E_EstCons+'</td>'+
					'<td>'+text_P4_2_1F_Opin+'</td>'+
				'</tr>';

				$('#lindero_frente').html(html_frente);				

			}

// lindero frente

// lindero_derecho

			if(val.P4_2_LindTipo == 2)
			{

				html_derecho+='<tr>'+
					'<td>'+val.P4_2_1A_NroTramo+'</td>'+
					'<td>'+val.P4_2_1A_i+' - '+val.P4_2_1A_f+'</td>'+
					'<td>'+val.P4_2_1B_LongTramo+'</td>'+
					'<td>'+text_P4_2_1C_Cerco+'</td>'+
					'<td>'+text_P4_2_1D_Estruc+'</td>'+
					'<td>'+text_P4_2_1E_EstCons+'</td>'+
					'<td>'+text_P4_2_1F_Opin+'</td>'+
				'</tr>';

				$('#lindero_derecho').html(html_derecho);				

			}

// lindero_derecho

// lindero_fondo

			if(val.P4_2_LindTipo == 3)
			{

				html_fondo+='<tr>'+
					'<td>'+val.P4_2_1A_NroTramo+'</td>'+
					'<td>'+val.P4_2_1A_i+' - '+val.P4_2_1A_f+'</td>'+
					'<td>'+val.P4_2_1B_LongTramo+'</td>'+
					'<td>'+text_P4_2_1C_Cerco+'</td>'+
					'<td>'+text_P4_2_1D_Estruc+'</td>'+
					'<td>'+text_P4_2_1E_EstCons+'</td>'+
					'<td>'+text_P4_2_1F_Opin+'</td>'+
				'</tr>';

				$('#lindero_fondo').html(html_fondo);				

			}

// lindero_fondo

// lindero_izquierdo

			if(val.P4_2_LindTipo == 4)
			{

				html_izquierdo+='<tr>'+
					'<td>'+val.P4_2_1A_NroTramo+'</td>'+
					'<td>'+val.P4_2_1A_i+' - '+val.P4_2_1A_f+'</td>'+
					'<td>'+val.P4_2_1B_LongTramo+'</td>'+
					'<td>'+text_P4_2_1C_Cerco+'</td>'+
					'<td>'+text_P4_2_1D_Estruc+'</td>'+
					'<td>'+text_P4_2_1E_EstCons+'</td>'+
					'<td>'+text_P4_2_1F_Opin+'</td>'+
				'</tr>';

				$('#lindero_izquierdo').html(html_izquierdo);				

			}

// lindero_izquierdo

			i++;

		});

					



	}).fail(function( jqxhr, textStatus, error ) {
  	
  		var err = textStatus + ', ' + error;
  		console.log( "Request Failed: " + err);
	
	});



}