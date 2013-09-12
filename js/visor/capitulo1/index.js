$(document).ready(function(){

	P1A();
	
	$('input').attr({
		disabled : true,
	});

});


function P1A(){

	$.getJSON(urlRoot('index.php')+'/visor/P1A/Data/', {token: '7959ac60dc22523a9ac306ac6f9308d3d7201c56',id_local: localE(), predio: '1'}, function(data, textStatus) {
		
		$.each(data, function(index, val) {

			$('#nie2').val(val.P1_A_1_Cant_IE);

		});


	}).fail(function( jqxhr, textStatus, error ) {
	
		var err = textStatus + ', ' + error;
		console.log( "Request Failed: " + err);
	
	});
			
}

