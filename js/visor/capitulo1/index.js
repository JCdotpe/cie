$(document).ready(function(){

	$('#ie_educa').hide();

	P1A();
	/*P1A2N();*/
	lista_ie();
	
	$('input').attr({
		disabled : true,
	});
	
	$('#list_ie').on('click','.ie',function(event){

		P1A2N($(this).attr('id'));

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

		$.each(data, function(index, val) {
			
			ie+='<tr class="ie" id="'+val.P1_A_2_NroIE+'">'+
				'<td style="text-align:center;">'+val.P1_A_2_NroIE+'</td>'+
				'<td style="text-align:center;">'+val.P1_A_2_1_NomIE+'</td>'+							    			
			'</tr>';

		});

		$("#list_ie").html(ie);

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
			
		});
		

		/*each_get_P1_A_2_8N(cod_local);*/

	}).fail(function( jqxhr, textStatus, error ) {
	
		var err = textStatus + ', ' + error;
		console.log( "Request Failed: " + err);
	
	});
			
}

/*function get_P1_A_2N(cod_local){

	$.post('visor/visor/get_P1_A_2N/', {cod_local:cod_local}, function(data) {

	







		})
		
		

	})
}*/

