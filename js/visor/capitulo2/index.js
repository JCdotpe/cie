$(document).ready(function(){

	$.import('css/basic.css','css');

	/*-----------------defaults-----------------------*/

	get_P2_A();
	get_P2_B();
	get_P2_C();
	get_P2_D();
	get_P2_D_1N();
	get_P2_D_3N();
	get_P2_D_5N();


	/*-----------------deshabilita inputs-------------*/

	$('input').attr({
		disabled : true,
	});

	$('input,textarea').attr({
		disabled : true,
	});

});


//===============================CAPITULO2=============================================

function get_P2_A(){

		$.getJSON(CI.base_url+'index.php/visor/P2A/Data/', {token: getToken(),id_local: getLocal(), Nro_Pred: getPredio()}, function(data) {

			$.each(data, function(index, val) {

			 	get_Radio_Check_Verif(val.P2_A_1_Clima,"P2_A_1_Clima");
			 	get_Radio_Check_Verif(val.P2_A_2_Lluv,"P2_A_2_Lluv");
			 	$("#P2_A_2A_Lluv_Mini").val(val.P2_A_2A_Lluv_Mini);
			 	$("#P2_A_2A_Lluv_Mfin").val(val.P2_A_2A_Lluv_Mfin);
			 	get_Radio_Check_Verif(val.P2_A_3_Hel,"P2_A_3_Hel");
			 	$("#P2_A_3A_Hel_Mini").val(val.P2_A_3A_Hel_Mini);
			 	$("#P2_A_3A_Hel_Mfin").val(val.P2_A_3A_Hel_Mfin);
			 	get_Radio_Check_Verif(val.P2_A_4_Gra,"P2_A_4_Gra");
			 	$("#P2_A_4A_Gra_Mini").val(val.P2_A_4A_Gra_Mini);
			 	$("#P2_A_4A_Gra_Mfin").val(val.P2_A_4A_Gra_Mfin);
			 	get_Radio_Check_Verif(val.P2_A_5_Vend,"P2_A_5_Vend");
			 	get_Radio_Check_Verif(val.P2_A_5A_Vend_Tip,"P2_A_5A_Vend_Tip");
			 	$("#P2_A_5B_Vend_Mini").val(val.P2_A_5B_Vend_Mini);
			 	$("#P2_A_5B_Vend_Mfin").val(val.P2_A_5B_Vend_Mfin);


			 });
		});
}



function get_P2_B(){

		$.getJSON(CI.base_url+'index.php/visor/P2B/Data/', {token: getToken(),id_local: getLocal(), Nro_Pred: getPredio()}, function(data) {

			$.each(data, function(index, val) {


			 	get_Radio_Check_Verif(val.P2_B_1_Topo,"P2_B_1_Topo")

			 	get_Radio_Check_Verif(val.P2_B_2_Suelo,"P2_B_2_Suelo")
			 	$("#P2_B_2_Suelo_O").val(val.P2_B_2_Suelo_O)

			 	get_Radio_Check_Verif(val.P2_B_3_Prof,"P2_B_3_Prof")

			 	$("#P2_B_4_CapAcc").val(val.P2_B_4_CapAcc)

			 	get_Radio_Check_Verif(val.P2_B_5_Mtran_1,"P2_B_5_Mtran_1");
			 	get_Radio_Check_Verif(val.P2_B_5_Mtran_2,"P2_B_5_Mtran_2");
			 	get_Radio_Check_Verif(val.P2_B_5_Mtran_3,"P2_B_5_Mtran_3");

			 	get_Radio_Check_Verif(val.P2_B_5A_Uso,"P2_B_5A_Uso")

			 	get_Radio_Check_Verif(val.P2_B_5B_Tvia_uso_1,"P2_B_5B_Tvia_uso_1");
			 	get_Radio_Check_Verif(val.P2_B_5B_Tvia_uso_2,"P2_B_5B_Tvia_uso_2");
			 	get_Radio_Check_Verif(val.P2_B_5B_Tvia_uso_3,"P2_B_5B_Tvia_uso_3");
			 	get_Radio_Check_Verif(val.P2_B_5B_Tvia_uso_4,"P2_B_5B_Tvia_uso_4");

			 	$("#P2_B_6_Trec_H").val(val.P2_B_6_Trec_H);
		 		$("#P2_B_6_Trec_M").val(val.P2_B_6_Trec_M);

		 		$("#P2_B_7_Ttramo_H").val(val.P2_B_7_Ttramo_H);
		 		$("#P2_B_7_Ttramo_M").val(val.P2_B_7_Ttramo_M);

		 		get_Radio_Check_Verif(val.P2_B_8_Pelig,"P2_B_8_Pelig");

			 		$.each(val.peligros1, function(index, val) {


						get_Radio_Check_Verif(val.P2_B_9_Cod,"P2_B_9")

			 		});

			 		$.each(val.peligros2, function(index, val) {

						get_Radio_Check_Verif(val.P2_B_10_Cod,"P2_B_10")

			 		});

			 		$.each(val.peligros3, function(index, val) {

						get_Radio_Check_Verif(val.P2_B_11_Cod,"P2_B_11")

						if(val.P2_B_11_Cod==11){
							$("#P2_B_11_Cod_O").val(val.P2_B_11_Cod_O);
						}

			 		});

			 		$.each(val.vulnerabilidades, function(index, val) {


						get_Radio_Check_Verif(val.P2_B_12_Cod,"P2_B_12")

						if(val.P2_B_12_Cod==6){
							$("#P2_B_12_Cod_O").val(val.P2_B_12_Cod_O);
						}

			 		});

			 });

		});
}











function get_P2_C(){

		$.getJSON(CI.base_url+'index.php/visor/P2C/Data/', {token: getToken(),id_local: getLocal(), Nro_Pred: getPredio()}, function(data) {

			$.each(data, function(index, val) {

					get_Radio_Check_Verif($.trim(val.P2_C_1Locl_1_Energ),"P2_C_1Locl_1_Energ");
					get_Radio_Check_Verif(val.P2_C_1Locl_2_Agua,"P2_C_1Locl_2_Agua");
					get_Radio_Check_Verif(val.P2_C_1Locl_3_Alc,"P2_C_1Locl_3_Alc");
					get_Radio_Check_Verif(val.P2_C_1Locl_4_Tfija,"P2_C_1Locl_4_Tfija");
					get_Radio_Check_Verif(val.P2_C_1Locl_5_Tmov,"P2_C_1Locl_5_Tmov");
					get_Radio_Check_Verif(val.P2_C_1Locl_6_Int,"P2_C_1Locl_6_Int");
					get_Radio_Check_Verif(val.P2_C_2LocE_1_Energ,"P2_C_2LocE_1_Energ");
					get_Radio_Check_Verif(val.P2_C_2LocE_2_Agua,"P2_C_2LocE_2_Agua");
					get_Radio_Check_Verif(val.P2_C_2LocE_3_Alc,"P2_C_2LocE_3_Alc");
					get_Radio_Check_Verif(val.P2_C_2LocE_4_Tfija,"P2_C_2LocE_4_Tfija");
					get_Radio_Check_Verif(val.P2_C_2LocE_5_Tmov,"P2_C_2LocE_5_Tmov");
					get_Radio_Check_Verif(val.P2_C_2LocE_6_Int,"P2_C_2LocE_6_Int");

			});

		});
}








function get_P2_D(){

	$.getJSON(CI.base_url+'index.php/visor/P2D/Data/', {token: getToken(),id_local: getLocal(), Nro_Pred: getPredio()}, function(data) {

		$.each(data, function(index, val) {

			$("#P2_D_2_Energ_CantSum").val(val.P2_D_2_Energ_CantSum);
			$("#P2_D_4_Energ_Emp").val(val.P2_D_4_Energ_Emp);
			$("#P2_D_6_Agua_CantSum").val(val.P2_D_6_Agua_CantSum);
			$("#P2_D_8_Agua_Emp").val(val.P2_D_8_Agua_Emp);
			get_Radio_Check_Verif(val.P2_D_9_Desag,"P2_D_9_Desag");

		});

	});
}








function get_P2_D_1N(){

	$.getJSON(CI.base_url+'index.php/visor/P2D1N/Data/', {token: getToken(),id_local: getLocal(), Nro_Pred: getPredio()} , function(data) {

		$.each(data, function(index, val) {

			get_Radio_Check_Verif(val.P2_D_1_EnergCod,"P2_D_1_EnergCod");

			if(val.P2_D_1_EnergCod==4){

				$("#P2_D_1_EnergCod_O").val(val.P2_D_1_EnergCod_O);
			}

		});

	});
}







function get_P2_D_3N(){

	$.getJSON(CI.base_url+'index.php/visor/P2D3N/Data/', {token: getToken(),id_local: getLocal() , Nro_Pred: getPredio()}, function(data) {


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

	$.getJSON(CI.base_url+'index.php/visor/P2D5N/Data/', {token: getToken(),id_local: getLocal(),Nro_Pred: getPredio()}, function(data) {

		$.each(data, function(index, val) {

			get_Radio_Check_Verif(val.P2_D_5_AbastAgCod,"P2_D_5_AbastAgCod");

			if(val.P2_D_5_AbastAgCod==6){

				$("#P2_D_5_AbastAgCod_O").val(val.P2_D_5_AbastAgCod_O);
			}

		});
	});
}










function get_P2_D_7N(){

	$.post('visor/visor/get_P2_D_7N/', {token: getToken(),id_local: getLocal()}, function(data) {

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







/*

//===============================CAPITULO2=============================================

function get_P2_A(cod_local){

		$.post('visor/visor/get_P2_A/', {cod_local:cod_local}, function(data) {

			$.each(data, function(index, val) {

			 	get_Radio_Check_Verif(val.P2_A_1_Clima,"P2_A_1_Clima");
			 	get_Radio_Check_Verif(val.P2_A_2_Lluv,"P2_A_2_Lluv");
			 	$("#P2_A_2A_Lluv_Mini").val(val.P2_A_2A_Lluv_Mini);
			 	$("#P2_A_2A_Lluv_Mfin").val(val.P2_A_2A_Lluv_Mfin);
			 	get_Radio_Check_Verif(val.P2_A_3_Hel,"P2_A_3_Hel");
			 	$("#P2_A_3A_Hel_Mini").val(val.P2_A_3A_Hel_Mini);
			 	$("#P2_A_3A_Hel_Mfin").val(val.P2_A_3A_Hel_Mfin);
			 	get_Radio_Check_Verif(val.P2_A_4_Gra,"P2_A_4_Gra");
			 	$("#P2_A_4A_Gra_Mini").val(val.P2_A_4A_Gra_Mini);
			 	$("#P2_A_4A_Gra_Mfin").val(val.P2_A_4A_Gra_Mfin);
			 	get_Radio_Check_Verif(val.P2_A_5_Vend,"P2_A_5_Vend");
			 	get_Radio_Check_Verif(val.P2_A_5A_Vend_Tip,"P2_A_5A_Vend_Tip");
			 	$("#P2_A_5B_Vend_Mini").val(val.P2_A_5B_Vend_Mini);
			 	$("#P2_A_5B_Vend_Mfin").val(val.P2_A_5B_Vend_Mfin);


			 });


		});
}



function get_P2_B(cod_local){

		$.post('visor/visor/get_P2_B/', {cod_local:cod_local}, function(data) {

			$.each(data, function(index, val) {


			 	get_Radio_Check_Verif(val.P2_B_1_Topo,"P2_B_1_Topo")

			 	get_Radio_Check_Verif(val.P2_B_2_Suelo,"P2_B_2_Suelo")
			 	$("#P2_B_2_Suelo_O").val(val.P2_B_2_Suelo_O)

			 	get_Radio_Check_Verif(val.P2_B_3_Prof,"P2_B_3_Prof")

			 	$("#P2_B_4_CapAcc").val(val.P2_B_4_CapAcc)

			 	get_Radio_Check_Verif(val.P2_B_5_Mtran_1,"P2_B_5_Mtran_1");
			 	get_Radio_Check_Verif(val.P2_B_5_Mtran_2,"P2_B_5_Mtran_2");
			 	get_Radio_Check_Verif(val.P2_B_5_Mtran_3,"P2_B_5_Mtran_3");

			 	get_Radio_Check_Verif(val.P2_B_5A_Uso,"P2_B_5A_Uso")

			 	get_Radio_Check_Verif(val.P2_B_5B_Tvia_uso_1,"P2_B_5B_Tvia_uso_1");
			 	get_Radio_Check_Verif(val.P2_B_5B_Tvia_uso_2,"P2_B_5B_Tvia_uso_2");
			 	get_Radio_Check_Verif(val.P2_B_5B_Tvia_uso_3,"P2_B_5B_Tvia_uso_3");
			 	get_Radio_Check_Verif(val.P2_B_5B_Tvia_uso_4,"P2_B_5B_Tvia_uso_4");

			 	$("#P2_B_6_Trec_H").val(val.P2_B_6_Trec_H);
		 		$("#P2_B_6_Trec_M").val(val.P2_B_6_Trec_M);

		 		$("#P2_B_7_Ttramo_H").val(val.P2_B_7_Ttramo_H);
		 		$("#P2_B_7_Ttramo_M").val(val.P2_B_7_Ttramo_M);

		 		get_Radio_Check_Verif(val.P2_B_8_Pelig,"P2_B_8_Pelig");

			 		$.each(val.peligros1, function(index, val) {


						get_Radio_Check_Verif(val.P2_B_9_Cod,"P2_B_9")

			 		});

			 		$.each(val.peligros2, function(index, val) {

						get_Radio_Check_Verif(val.P2_B_10_Cod,"P2_B_10")

			 		});

			 		$.each(val.peligros3, function(index, val) {

						get_Radio_Check_Verif(val.P2_B_11_Cod,"P2_B_11")

						if(val.P2_B_11_Cod==11){
							$("#P2_B_11_Cod_O").val(val.P2_B_11_Cod_O);
						}

			 		});

			 		$.each(val.vulnerabilidades, function(index, val) {


						get_Radio_Check_Verif(val.P2_B_12_Cod,"P2_B_12")

						if(val.P2_B_12_Cod==6){
							$("#P2_B_12_Cod_O").val(val.P2_B_12_Cod_O);
						}

			 		});

			 });

		});
}











function get_P2_C(cod_local){

		$.post('visor/visor/get_P2_C/', {cod_local:cod_local}, function(data) {

			$.each(data, function(index, val) {

					get_Radio_Check_Verif($.trim(val.P2_C_1Locl_1_Energ),"P2_C_1Locl_1_Energ");
					get_Radio_Check_Verif(val.P2_C_1Locl_2_Agua,"P2_C_1Locl_2_Agua");
					get_Radio_Check_Verif(val.P2_C_1Locl_3_Alc,"P2_C_1Locl_3_Alc");
					get_Radio_Check_Verif(val.P2_C_1Locl_4_Tfija,"P2_C_1Locl_4_Tfija");
					get_Radio_Check_Verif(val.P2_C_1Locl_5_Tmov,"P2_C_1Locl_5_Tmov");
					get_Radio_Check_Verif(val.P2_C_1Locl_6_Int,"P2_C_1Locl_6_Int");
					get_Radio_Check_Verif(val.P2_C_2LocE_1_Energ,"P2_C_2LocE_1_Energ");
					get_Radio_Check_Verif(val.P2_C_2LocE_2_Agua,"P2_C_2LocE_2_Agua");
					get_Radio_Check_Verif(val.P2_C_2LocE_3_Alc,"P2_C_2LocE_3_Alc");
					get_Radio_Check_Verif(val.P2_C_2LocE_4_Tfija,"P2_C_2LocE_4_Tfija");
					get_Radio_Check_Verif(val.P2_C_2LocE_5_Tmov,"P2_C_2LocE_5_Tmov");
					get_Radio_Check_Verif(val.P2_C_2LocE_6_Int,"P2_C_2LocE_6_Int");

			});

		});
}








function get_P2_D(cod_local){

	$.post('visor/visor/get_P2_D/', {cod_local:cod_local}, function(data) {

		$.each(data, function(index, val) {

			$("#P2_D_2_Energ_CantSum").val(val.P2_D_2_Energ_CantSum);
			$("#P2_D_4_Energ_Emp").val(val.P2_D_4_Energ_Emp);
			$("#P2_D_6_Agua_CantSum").val(val.P2_D_6_Agua_CantSum);
			$("#P2_D_8_Agua_Emp").val(val.P2_D_8_Agua_Emp);
			get_Radio_Check_Verif(val.P2_D_9_Desag,"P2_D_9_Desag");

		});

	});
}








function get_P2_D_1N(cod_local){

	$.post('visor/visor/get_P2_D_1N/', {cod_local:cod_local}, function(data) {

		$.each(data, function(index, val) {

			get_Radio_Check_Verif(val.P2_D_1_EnergCod,"P2_D_1_EnergCod");

			if(val.P2_D_1_EnergCod==4){
				//alert(val.P2_D_1_EnergCod)
				$("#P2_D_1_EnergCod_O").val(val.P2_D_1_EnergCod_O);
			}

		});

	});
}







function get_P2_D_3N(cod_local){

	$.post('visor/visor/get_P2_D_3N/', {cod_local:cod_local}, function(data) {


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









function get_P2_D_5N(cod_local){

	$.post('visor/visor/get_P2_D_5N/', {cod_local:cod_local}, function(data) {

		$.each(data, function(index, val) {

			get_Radio_Check_Verif(val.P2_D_5_AbastAgCod,"P2_D_5_AbastAgCod");

			if(val.P2_D_5_AbastAgCod==6){

				$("#P2_D_5_AbastAgCod_O").val(val.P2_D_5_AbastAgCod_O);
			}

		});
	});
}










function get_P2_D_7N(cod_local){

	$.post('visor/visor/get_P2_D_7N/', {cod_local:cod_local}, function(data) {

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





*/


//==============================FIN CAPITULO 2=================================