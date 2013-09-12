$(document).ready(function(){

	$.import('img/map.png','image','map');

	P4();
	P42N();

	$('input').attr({
		disabled : true,
	});

});


function P4(){

	$.getJSON(urlRoot('index.php')+'/visor/P4/Data/', {token: '7959ac60dc22523a9ac306ac6f9308d3d7201c56',id_local: localE(), predio: '1'}, function(data, textStatus) {

		$.each(data, function(index, val) {

			$('#P4_1_Foto').val(val.P4_1_Foto);
			$('#P4_1_Obs').val(val.P4_1_Obs);
			$('#P4_2_CantTram_Lfrente').val(val.P4_2_CantTram_Lfrente);
			$('#P4_2_CantTram_Lderecho').val(val.P4_2_CantTram_Lderecho);
			$('#P4_2_CantTram_Lfondo').val(val.P4_2_CantTram_Lfondo);
			$('#P4_2_CantTram_Lizq').val(val.P4_2_CantTram_Lfondo);

		});


	}).fail(function( jqxhr, textStatus, error ) {

		var err = textStatus + ', ' + error;
		console.log( "Request Failed: " + err);

	});

}

function P42N(){

	$.getJSON(urlRoot('index.php')+'/visor/P42N/Data/', {token: '7959ac60dc22523a9ac306ac6f9308d3d7201c56',id_local: localE(), predio: '1'}, function(data, textStatus) {

		$('#P4_2_LindTipo').val(val.P4_2_LindTipo);
		$('#P4_2_1A_NroTramo').val(val.P4_2_1A_NroTramo);
		$('#P4_2_1A_i').val(val.P4_2_1A_i);
		$('#P4_2_1A_f').val(val.P4_2_1A_f);
		$('#P4_2_1B_LongTramo').val(val.P4_2_1B_LongTramo);
		$('#P4_2_1C_Cerco').val(val.P4_2_1C_Cerco);
		$('#P4_2_1D_Estruc').val(val.P4_2_1D_Estruc);
		$('#P4_2_1E_EstCons').val(val.P4_2_1E_EstCons);
		$('#P4_2_1F_Opin').val(val.P4_2_1F_Opin);


		$.each(data, function(index, val) {

		});

	}).fail(function( jqxhr, textStatus, error ) {

  		var err = textStatus + ', ' + error;
  		console.log( "Request Failed: " + err);

	});

}