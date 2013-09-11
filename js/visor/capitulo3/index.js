$(document).ready(function(){

	P31();
	P313N();

	$('input').attr({
		disabled : true,
	});

	$.import('img/map.png','image','map');

//alert(localE());

});


function P31(){

	$.getJSON(urlRoot('index.php')+'/visor/P31/Data/', {token: '7959ac60dc22523a9ac306ac6f9308d3d7201c56',id_local: 'qltdoF9o',predio: '1'}, function(data, textStatus) {
		
		$.each(data, function(index, val) {

			check_Radio(val.codigoLugarReferenciacion,'codigoLugarReferenciacion');
			$('#P3_1_4_ArchGPS').val(val.P3_1_4_ArchGPS);
			$('#RutaFoto').val(val.RutaFoto);
			$('#Observaciones').val(val.Observaciones);

		});


	});
			
}

function P313N(){

	$.getJSON(urlRoot('index.php')+'/visor/P313N/Data/', {token: '7959ac60dc22523a9ac306ac6f9308d3d7201c56',id_local: 'qltdoF9o',predio: '1'}, function(data, textStatus) {

		var i=0;

		$.each(data, function(index, val) {

			i++;

			if(i==1){
				$('#punto_inicial').html(val.CodigoPuntoGPS);
			}

			if(i==10){
				$('#punto_final').html(val.CodigoPuntoGPS);
				$('#LongitudPunto').html(val.LongitudPunto);
				$('#LatitudPunto').html(val.LatitudPunto);
				$('#AltitudPunto').html(val.AltitudPunto);
			}

		});

	});

}