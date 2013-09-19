$(document).ready(function(){

	$.import('img/map.png','image','map');

	P31();
	P313N();

	$('input').attr({
		disabled : true,
	});

});


function P31(){

	$.getJSON(urlRoot('index.php')+'/visor/P31/Data/', {token: getToken(),id_local: getLocal(), predio: getPredio()}, function(data, textStatus) {
		
		$.each(data, function(index, val) {

			check_Radio(val.P3_1_1_LugGeoref,'P3_1_1_LugGeoref');
			$('#P3_1_4_ArchGPS').val(val.P3_1_4_ArchGPS);
			$('#RutaFoto').val(val.RutaFoto);
			$('#Observaciones').val(val.Observaciones);

		});


	}).fail(function( jqxhr, textStatus, error ) {
	
		var err = textStatus + ', ' + error;
		console.log( "Request Failed: " + err);
	
	});
			
}

function P313N(){

	$.getJSON(urlRoot('index.php')+'/visor/P313N/Data/', {token: getToken(),id_local: getLocal(), predio: getPredio()}, function(data, textStatus) {

		var i=0;
		var urlfinal="";
		var url10="";
		
		$.each(data, function(index, val) {

			i++;

			if(i==1){
			
				url10+="?lat"+i+"="+val.LatitudPunto+"&long"+i+"="+val.LongitudPunto;
			
			}else{

				url10+="&lat"+i+"="+val.LatitudPunto+"&long"+i+"="+val.LongitudPunto;
			
			}

			

			if(i==1){
				$('#punto_inicial').html(val.CodigoPuntoGPS);
			}

			if(i==10){

				urlfinal+="?lat1="+val.LatitudPunto+"&long1="+val.LongitudPunto;
			
				$('#punto_final').html(val.CodigoPuntoGPS);
				$('#LongitudPunto').html(val.LongitudPunto);
				$('#LatitudPunto').html(val.LatitudPunto);
				$('#AltitudPunto').html(val.AltitudPunto);
			}

		});

		$('#map1').attr('href',urlRoot('index.php')+'/mapa/gps/diez/'+url10);
		$('#map2').attr('href',urlRoot('index.php')+'/mapa/gps/'+urlfinal);

	}).fail(function( jqxhr, textStatus, error ) {
  	
  		var err = textStatus + ', ' + error;
  		console.log( "Request Failed: " + err);
	
	});

}