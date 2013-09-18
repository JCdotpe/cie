$(document).ready(function(){

	$.import('css/basic.css','css');

	$('#ie_educa').hide();

	P1A();
	/*P1A2N();*/
	lista_ie();

	lista_Predios();
	
	$('input,textarea').attr({
		disabled : true,
	});

	
	
	$('#ie-panel').on('click','.combo_ins',function(event){

		P1A2N($(this).attr('id'));

		$('.combo_ins').removeClass('active');
		$(this).addClass('active');


	});

	$('#list-predio').on('click','.combo_pred',function(event){

		//P1A2N($(this).attr('id'));

		$('.combo_pred').removeClass('active');
		$(this).addClass('active');


	});

});


function P1A(){

	$.getJSON(urlRoot('index.php')+'/visor/P1A/Data/', {token: getToken(),id_local: getLocal(), predio: getPredio()}, function(data, textStatus) {
		
		$.each(data, function(index, val) {

			$('#nie2').val(val.P1_A_1_Cant_IE);

		});


	}).fail(function( jqxhr, textStatus, error ) {
	
		var err = textStatus + ', ' + error;
		console.log( "Request Failed: " + err);
	
	});
			
}

function lista_ie(){

	$.getJSON(urlRoot('index.php')+'/visor/Procedure/Lista_IE/', {token: getToken(),id_local: getLocal(), predio: getPredio()}, function(data, textStatus) {
	
		var html="";
		var ie="";
		var i=0;
		var first="";

		var combo='<div class="btn-group">'+
						'<a class="btn dropdown-toggle" data-toggle="dropdown" id="combo_ie" href="#">'+
							'Seleccione una Institución Educativa '+
							'<span class="caret"></span>'+
						'</a>'+
						'<ul class="dropdown-menu">';

		$.each(data, function(index, val) {
			i++;
			if(i==1){
				P1A2N(val.P1_A_2_NroIE);
				cl="active";
			}else{
				cl="";
			}
				
			combo+='<li class="combo_ins '+cl+'" id="'+val.P1_A_2_NroIE+'">'+
							'<a href="" data-toggle="dropdown">I.E. N° '+val.P1_A_2_NroIE+' - '+val.P1_A_2_1_NomIE+'</a>'+
						'</li>';

		});

		combo+='</ul>'+
				'</div>';

		if(i==1){
			 $("#ie-panel").hide();
		}

		$("#ie-panel").html(combo);
		
		if(i==0){
			$('#combo_ie').html('No Existen Instituciones Educativas en el Predio '+getPredio());
		}
	});

}

function P1A2N(ie){

	$.getJSON(urlRoot('index.php')+'/visor/P1A2N/Data/format/json/', {token: getToken(), id_local: getLocal(), predio: getPredio(), nroie: ie}, function(data, textStatus) {

		$('#ie_educa').show();
		
		$.each(data, function(index, val) {

			$("#P1_A_2_NroIE").val(val.P1_A_2_NroIE);
			$("#P1_A_2_1_NomIE").val(val.P1_A_2_1_NomIE);
			$("#P1_A_2_2_Direc").val(val.P1_A_2_2_Direc);
			$("#P1_A_2_3_DocNro").val(val.P1_A_2_3_DocNro);
			$("#P1_A_2_3_DocNro").val(val.P1_A_2_3_DocNro);
			$("#P1_A_2_4_TelfIE").val(val.P1_A_2_4_TelfIE);
			$("#P1_A_2_4_TelfDir").val(val.P1_A_2_4_TelfDir);
			$("#P1_A_2_5_EmailIE").val(val.P1_A_2_5_EmailIE);
			$("#P1_A_2_5_EmailDir").val(val.P1_A_2_5_EmailDir);
			$("#P1_A_2_6_Informant").val(val.P1_A_2_6_Informant);
			$("#P1_A_2_7_InformantCarg").val(val.P1_A_2_7_InformantCarg);
			$("#P1_A_2_8_Can_CMod_IE").val(val.P1_A_2_8_Can_CMod_IE);
			$("#P1_A_2_Obs").val(val.P1_A_2_Obs);
			get_P1_A_2_8N(getLocal(),getPredio(),val.P1_A_2_NroIE)
		});
		

		

	}).fail(function( jqxhr, textStatus, error ) {
	
		var err = textStatus + ', ' + error;
		console.log( "Request Failed: " + err);
	
	});
			
}

function get_P1_A_2_8N(cod_local,predio,nroie){

	$.getJSON(urlRoot('index.php')+'/visor/P1A28N/Tabla/', {token: getToken(), id_local: getLocal(), predio: getPredio(), nroie: nroie}, function(data, textStatus) {

		var html="";

		$.each(data, function(index, val) {

			html+='<tr>'+
				'<td style="text-align:center;" class="P1_A_2_9_NroCMod">'+val.P1_A_2_9_NroCMod+'</td>'+
				'<td>'+val.P1_A_2_9A_CMod+'</td>'+
				'<td>'+val.P1_A_2_9B_CodLocal+'</td>'+
				'<td>'+val.P1_A_2_9C_Nivel+'</td>'+
				'<td>'+val.P1_A_2_9D_Car+'</td>'+
				'<td>'+val.P1_A_2_9E_NroAnex+'</td>'+
				'<td>'+val.P1_A_2_9F_CantAnex+'</td>'+
				'<td>'+val.P1_A_2_9G_T1_Talu+'</td>'+
				'<td>'+val.P1_A_2_9H_T1_Taul+'</td>'+
				'<td>'+val.P1_A_2_9I_T2_Talu+'</td>'+
				'<td>'+val.P1_A_2_9J_T2_Taul+'</td>'+
				'<td>'+val.P1_A_2_9K_T3_Talu+'</td>'+
				'<td>'+val.P1_A_2_9L_T3_Taul+'</td>'+
				'</tr>';
				//alert(val.anexos)
				$.each(val.anexos, function(index, val) {

					html+='<tr>'+
							'<td></td>'+
							'<th colspan="2" style="text-align:center;">Nombre asignado al anexo</th>'+
							'<th style="text-align:center;">N°</th>'+
							'<td>'+val.P1_A_2_9_AnexNro+'</td>'+
							'<td colspan="2">'+val.P1_A_2_9_AnexNomb+'</td>'+
							'<td>'+val.P1_A_2_9G_T1_Talu+'</td>'+
							'<td>'+val.P1_A_2_9H_T1_Taul+'</td>'+
							'<td>'+val.P1_A_2_9I_T2_Talu+'</td>'+
							'<td>'+val.P1_A_2_9J_T2_Taul+'</td>'+
							'<td>'+val.P1_A_2_9K_T3_Talu+'</td>'+
							'<td>'+val.P1_A_2_9L_T3_Taul+'</td>'+
						'</tr>';

				});

		});


		$('#table_ies').html(html);
											
	});

}

function lista_Predios(){

	$.getJSON(urlRoot('index.php')+'/visor/Procedure/Lista_Predio/', {token: getToken(),id_local: getLocal(), predio: getPredio()}, function(data, textStatus) {
	
		var html="";
		var ie="";
		var i=0;
		var first="";

		var combo='<div class="btn-group">'+
						'<a class="btn dropdown-toggle" data-toggle="dropdown" id="combo_predio" href="#">'+
							'Seleccione un Predio '+
							'<span class="caret"></span>'+
						'</a>'+
						'<ul class="dropdown-menu">';

		$.each(data, function(index, val) {
			i++;
			if(i==1){
				//P1A2N(val.P1_A_2_NroIE);
				cl="active";
			}else{
				cl="";
			}
				
			combo+='<li class="combo_pred '+cl+'" id="'+val.Nro_Pred+'">'+
							'<a href="" data-toggle="dropdown">Predio N° '+val.Nro_Pred+' - Inmueble: '+val.Inmueble_Cod+'</a>'+
						'</li>';

		});

		combo+='</ul>'+
				'</div>';

		if(i==1){
			 $("#list-predio").hide();
		}

		$("#list-predio").html(combo);
		
		if(i==0){
			$('#combo_predio').html('No Existen Instituciones Educativas en el Predio '+getPredio());
		}
	});

}


