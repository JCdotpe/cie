//CIE01B



//==============================CAPITULO 6=================================
function get_TotalEdif(cod_local){
	$.post('visor/P5/Find_Total_Edif/', {cod_local:cod_local}, function(data) {

				$.each(data, function(index, val) {

					 $('.P5_TOT_E').val(val.P5_TOT_E);

				});
	});
}


function get_Edificacion(cod_local){
	$.post('visor/p6/Find_All_by_local/', {cod_local:cod_local}, function(data) {
		alert(data);
				$.each(data, function(index, val) {

					// $('.P5_TOT_E').val(val.P5_TOT_E);

				});
	});
}

//==============================FINCAPITULO 6=================================


//==============================CAPITULO 7=================================

//==============================FINCAPITULO 7=================================


//==============================CAPITULO 8=================================

//==============================FINCAPITULO 8=================================
