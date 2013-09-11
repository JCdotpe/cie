$(document).ready(function(){

	P31();
	/*P313N();
*/
	
//alert(localE());

});


function P31(){

	$.ajax({
		url: 'http://localhost/cie/index.php/visor/P313N/Data/',
		type: 'POST',
		dataType: 'json',
		data: {token: '7959ac60dc22523a9ac306ac6f9308d3d7201c56',id_local: 'qltdoF9o',predio: '1'},
		success:function(data){
					
			check_Radio(data.codigoLugarReferenciacion,'codigoLugarReferenciacion');

		}
	});


}

function P313N(){

}