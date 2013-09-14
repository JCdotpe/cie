$(document).ready(function(){

	$.import('img/map.png','image','map');

	P5();
	P5F();
	P5N();

	$('input').attr({
		disabled : true,
	});

});


function P5(){

	$.getJSON(urlRoot('index.php')+'/visor/P5/Data/', {token: '7959ac60dc22523a9ac306ac6f9308d3d7201c56',id_local: localE(), predio: '1'}, function(data, textStatus) {
		
		$.each(data, function(index, val) {

			$('#P5_Tot_E').html(val.P5_Tot_E);
			$('#P5_Tot_P').html(val.P5_Tot_P);
			$('#P5_Tot_LD').html(val.P5_Tot_LD);
			$('#P5_Tot_CTE').html(val.P5_Tot_CTE);
			$('#P5_Tot_MC').html(val.P5_Tot_MC);
			$('#P5_Tot_P1').html(val.P5_Tot_P1);
			$('#P5_Tot_R').html(val.P5_Tot_R);
			$('#P5_Opin').html(val.P5_Opin);

		});


	}).fail(function( jqxhr, textStatus, error ) {
	
		var err = textStatus + ', ' + error;
		console.log( "Request Failed: " + err);
	
	});
			
}


function P5F(){

	$.getJSON(urlRoot('index.php')+'/visor/P5F/Data/', {token: '7959ac60dc22523a9ac306ac6f9308d3d7201c56',id_local: localE(), predio: '1'}, function(data, textStatus) {
		
		$.each(data, function(index, val) {

			if(val.P5_NroPiso == 1)
			{
				piso_1 = val.P5_Foto;
				$('#piso_1').html(piso_1);	
			}

			if(val.P5_NroPiso == 2)
			{
				piso_2 = val.P5_Foto;
				$('#piso_2').html(piso_2);	
			}			
			
			if(val.P5_NroPiso ==3)
			{
				piso_3 = val.P5_Foto;
				$('#piso_3').html(piso_3);	
			}			

			if(val.P5_NroPiso == 4)
			{
				piso_4 = val.P5_Foto;
				$('#piso_4').html(piso_4);	
			}			

		});


	}).fail(function( jqxhr, textStatus, error ) {
	
		var err = textStatus + ', ' + error;
		console.log( "Request Failed: " + err);
	
	});
			
}


function P5N(){

	$.getJSON(urlRoot('index.php')+'/visor/P5N/Data/', {token: '7959ac60dc22523a9ac306ac6f9308d3d7201c56',id_local: localE(), predio: '1'}, function(data, textStatus) {
		
		$.each(data, function(index, val) {


		});


	}).fail(function( jqxhr, textStatus, error ) {
	
		var err = textStatus + ', ' + error;
		console.log( "Request Failed: " + err);
	
	});
			
}