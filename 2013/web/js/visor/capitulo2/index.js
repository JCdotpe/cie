$(document).ready(function(){

	$.import('css/basic.css','css');

	get_P2_A();
	get_P2_B();
	get_P2_C();
	get_P2_D();
	get_P2_D_1N();
	get_P2_D_3N();
	get_P2_D_5N();
	get_P2_D_7N();
	get_P2_D_9N();

	get_P2_E();
	get_P2_F();
	get_P2_G();
	get_P2_G_2N();

	$('input,textarea').attr({
		disabled : true,
	});

});


//===============================CAPITULO2=============================================

function get_P2_A(){

		$.getJSON(CI.base_url+'index.php/visor/p2a/Data/', {token: getToken(),id_local: getLocal(), predio: getPredio()}, function(data) {

			$.each(data, function(index, val) {

			 	check_Radio(val.P2_A_1_Clima,'P2_A_1_Clima');
			 	check_Radio(val.P2_A_2_Lluv,"P2_A_2_Lluv");
			 	$("#P2_A_2A_Lluv_Mini").val(getmonths(val.P2_A_2A_Lluv_Mini));
			 	$("#P2_A_2A_Lluv_Mfin").val(getmonths(val.P2_A_2A_Lluv_Mfin));
			 	check_Radio(val.P2_A_3_Hel,"P2_A_3_Hel");
			 	$("#P2_A_3A_Hel_Mini").val(getmonths(val.P2_A_3A_Hel_Mini));
			 	$("#P2_A_3A_Hel_Mfin").val(getmonths(val.P2_A_3A_Hel_Mfin));
			 	check_Radio(val.P2_A_4_Gra,"P2_A_4_Gra");
			 	$("#P2_A_4A_Gra_Mini").val(getmonths(val.P2_A_4A_Gra_Mini));
			 	$("#P2_A_4A_Gra_Mfin").val(getmonths(val.P2_A_4A_Gra_Mfin));
			 	check_Radio(val.P2_A_5_Vend,"P2_A_5_Vend");
			 	check_Radio(val.P2_A_5A_Vend_Tip,"P2_A_5A_Vend_Tip");
			 	$("#P2_A_5B_Vend_Mini").val(getmonths(val.P2_A_5B_Vend_Mini));
			 	$("#P2_A_5B_Vend_Mfin").val(getmonths(val.P2_A_5B_Vend_Mfin));

			 });
		});
}

function get_P2_B(){

		$.getJSON(CI.base_url+'index.php/visor/p2b/Data/', {token: getToken(),id_local: getLocal(), predio: getPredio()}, function(data) {

			$.each(data, function(index, val) {


			 	check_Radio(val.P2_B_1_Topo,"P2_B_1_Topo")

			 	check_Radio(val.P2_B_2_Suelo,"P2_B_2_Suelo")
			 	$("#P2_B_2_Suelo_O").val(val.P2_B_2_Suelo_O)

			 	check_Radio(val.P2_B_3_Prof,"P2_B_3_Prof")

			 	$("#P2_B_4_CapAcc").val(val.P2_B_4_CapAcc)

			 	check_Radio(val.P2_B_5_1,"P2_B_5_1");
			 	check_Radio(val.P2_B_5_2,"P2_B_5_2");
			 	check_Radio(val.P2_B_5_3,"P2_B_5_3");

			 	check_Radio(val.P2_B_5A_Uso,"P2_B_5A_Uso")

			 	check_Radio(val.P2_B_5B_1,"P2_B_5B_1");
			 	check_Radio(val.P2_B_5B_2,"P2_B_5B_2");
			 	check_Radio(val.P2_B_5B_3,"P2_B_5B_3");
			 	check_Radio(val.P2_B_5B_4,"P2_B_5B_4");

			 	$("#P2_B_6_Trec_H").val(leftceros(val.P2_B_6_Trec_H));
		 		$("#P2_B_6_Trec_M").val(leftceros(val.P2_B_6_Trec_M));

		 		$("#P2_B_7_Ttramo_H").val(leftceros(val.P2_B_7_Ttramo_H));
		 		$("#P2_B_7_Ttramo_M").val(leftceros(val.P2_B_7_Ttramo_M));

		 		check_Radio(val.P2_B_8_Pelig,"P2_B_8_Pelig");

			 		$.each(val.peligros1, function(index, val) {


						check_Radio(val.P2_B_9_Cod_e,"P2_B_9"+val.P2_B_9_Cod)

			 		});

			 		$.each(val.peligros2, function(index, val) {

						check_Radio(val.P2_B_10_Cod_e,"P2_B_10"+val.P2_B_10_Cod)

			 		});

			 		$.each(val.peligros3, function(index, val) {

						check_Radio(val.P2_B_11_Cod_e,"P2_B_11"+val.P2_B_11_Cod)

						if(val.P2_B_11_Cod==11){
							$("#P2_B_11_Cod_O").val(val.P2_B_11_Cod_O);
						}

			 		});

			 		$.each(val.vulnerabilidades, function(index, val) {


						check_Radio(val.P2_B_12_Cod_e,"P2_B_12"+val.P2_B_12_Cod)

						if(val.P2_B_12_Cod==6){
							$("#P2_B_12_Cod_O").val(val.P2_B_12_Cod_O);
						}

			 		});

			 });

		});
}

function get_P2_C(){

		$.getJSON(CI.base_url+'index.php/visor/p2c/Data/', {token: getToken(),id_local: getLocal(), predio: getPredio()}, function(data) {

			$.each(data, function(index, val) {

					check_Radio($.trim(val.P2_C_1Locl_1_Energ),"P2_C_1Locl_1_Energ");
					check_Radio(val.P2_C_1Locl_2_Agua,"P2_C_1Locl_2_Agua");
					check_Radio(val.P2_C_1Locl_3_Alc,"P2_C_1Locl_3_Alc");
					check_Radio(val.P2_C_1Locl_4_Tfija,"P2_C_1Locl_4_Tfija");
					check_Radio(val.P2_C_1Locl_5_Tmov,"P2_C_1Locl_5_Tmov");
					check_Radio(val.P2_C_1Locl_6_Int,"P2_C_1Locl_6_Int");
					check_Radio(val.P2_C_2LocE_1_Energ,"P2_C_2LocE_1_Energ");
					check_Radio(val.P2_C_2LocE_2_Agua,"P2_C_2LocE_2_Agua");
					check_Radio(val.P2_C_2LocE_3_Alc,"P2_C_2LocE_3_Alc");
					check_Radio(val.P2_C_2LocE_4_Tfija,"P2_C_2LocE_4_Tfija");
					check_Radio(val.P2_C_2LocE_5_Tmov,"P2_C_2LocE_5_Tmov");
					check_Radio(val.P2_C_2LocE_6_Int,"P2_C_2LocE_6_Int");

			});

		});
}

function get_P2_D(){

	$.getJSON(CI.base_url+'index.php/visor/p2d/Data/', {token: getToken(),id_local: getLocal(), predio: getPredio()}, function(data) {

		$.each(data, function(index, val) {

			$("#P2_D_2_Energ_CantSum").val(leftceros(val.P2_D_2_Energ_CantSum));
			$("#P2_D_4_Energ_Emp").val(val.P2_D_4_Energ_Emp);
			$("#P2_D_6_Agua_CantSum").val(leftceros(val.P2_D_6_Agua_CantSum));
			$("#P2_D_8_Agua_Emp").val(val.P2_D_8_Agua_Emp);
			check_Radio(val.P2_D_9_Desag,"P2_D_9_Desag");

		});

	});
}

function get_P2_D_1N(){

	$.getJSON(CI.base_url+'index.php/visor/p2d1n/Data/', {token: getToken(),id_local: getLocal(), predio: getPredio()} , function(data) {

		$.each(data, function(index, val) {

			check_Radio(val.P2_D_1_Cod,"P2_D_1_Cod"+val.P2_D_1_Cod_Est);

			if(val.P2_D_1_EnergCod==4){

				$("#P2_D_1_EnergCod_O").val(val.P2_D_1_EnergCod_O);
				
			}

		});

	});
}

function get_P2_D_3N(){

	$.getJSON(CI.base_url+'index.php/visor/p2d3n/Data/', {token: getToken(),id_local: getLocal() , predio: getPredio()}, function(data) {


			html='<table class="table table-bordered">'+
				'<tr>'+
					'<td colspan="3" style="text-align:center"><strong>Suministro N°</strong></td>'+
				'</tr>';


		$.each(data, function(index, val) {

				html+='<tr>'+
					'<th style="text-align:center">'+val.P2_D_3_Nro+'</th>'+
					'<td><input style="width:250px;" type="text" value="'+val.P2_D_3_SumNro+'" class="form-control"></td>'+
					'<td style="text-align:center">'+val.P2_D_3_1DocRef+'</td>'+
				'</tr>';

		});

			html+='</table>';
			$('#suministros_electricos').html(html)

	});
}

function get_P2_D_5N(){

	$.getJSON(CI.base_url+'index.php/visor/p2d5n/Data/', {token: getToken(),id_local: getLocal(),predio: getPredio()}, function(data) {

		$.each(data, function(index, val) {

			check_Radio(val.P2_D_5_Cod,"P2_D_5_Cod"+val.P2_D_5_Cod_Est);
				
			if(val.P2_D_5_AbastAgCod=="6"){

				$("#P2_D_5_AbastAgCod_O").val(val.P2_D_5_AbastAgCod_O);


			}

		});
	});
}

function get_P2_D_7N(){

	$.getJSON(CI.base_url+'index.php/visor/p2d7n/Data/', {token: getToken(),id_local: getLocal(),predio: getPredio()}, function(data) {


			html='<table class="table table-bordered">'+
				'<tr>'+
					'<td colspan="3" style="text-align:center"><strong>Suministro N°</strong></td>'+
			'</tr>';


		$.each(data, function(index, val) {

				html+='<tr>'+
					'<th style="text-align:center">'+val.P2_D_7_Nro+'</th>'+
					'<td><input style="width:250px;" type="text" value="'+val.P2_D_7_SumNro+'" class="form-control"></td>'+
					'<td style="text-align:center">'+val.P2_D_7_1DocRef+'</td>'+
				'</tr>';

		});

			html+='</table>';
			$('#suministros_agua').html(html)
	});
}

function get_P2_D_9N(){

	$.getJSON(CI.base_url+'index.php/visor/p2d9n/Data/', {token: getToken(),id_local: getLocal(),predio: getPredio()}, function(data) {

		$.each(data, function(index, val) {

			check_Radio(val.P2_D_9_Nro,"P2_D_9_Nro");
		
		});
	});
}

function get_P2_E(){

	$.getJSON(CI.base_url+'index.php/visor/p2e/Data/', {token: getToken(),id_local: getLocal(),predio: getPredio()}, function(data) {

		$.each(data, function(index, val) {

			check_Radio(val.P2_E_1_Prayo,'P2_E_1_Prayo');
			$('#P2_E_2_Ptierra').val(leftceros(val.P2_E_2_Ptierra));
			$('#P2_E_3_Ano').val(val.P2_E_3_Ano);
			$('#P2_E_Obs').val(val.P2_E_Obs);
			

		});

	});

}

function get_P2_F(){

	$.getJSON(CI.base_url+'index.php/visor/p2f/Data/', {token: getToken(),id_local: getLocal(),predio: getPredio()}, function(data) {

		$.each(data, function(index, val) {

			check_Radio(val.P2_F_1_ElimBas_e,'P2_F_1_ElimBas'+val.P2_F_1_ElimBas);
			
		});

	});

}

function get_P2_G(){

	$.getJSON(CI.base_url+'index.php/visor/p2g/Data/', {token: getToken(),id_local: getLocal(),predio: getPredio()}, function(data) {

		$.each(data, function(index, val) {

			check_Radio(val.P2_G_1_ObEjec,'P2_G_1_ObEjec');
			$('#P2_G_Obs').val(val.P2_G_Obs);
			
		});

	});

}

function get_P2_G_2N(){

	$.getJSON(CI.base_url+'index.php/visor/p2g2n/Data/', {token: getToken(),id_local: getLocal(),predio: getPredio()}, function(data) {

		$.each(data, function(index, val) {

			check_Radio(val.P2_G_2_Nro,'P2_G_2_Cod'+val.P2_G_2_Cod);
			check_Radio(val.P2_G_2A_EstPre,'P2_G_2A_EstPre'+val.P2_G_2_Nro);
			$('#P2_G_2B_snip'+val.P2_G_2_Nro).val(val.P2_G_2B_snip)

			if(val.P2_G_2_Nro=="7" && val.P2_G_2_Cod=="1"){
			
				$('#P2_F_1_ElimBas_O').val(val.P2_F_1_ElimBas_O);	

			}

		});

	});
}


