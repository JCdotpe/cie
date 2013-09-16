//CIE01

//=============================GENERAL1=========================================





//====================SECCIÓN C:  ENTREVISTA Y SUPERVISIÓN==================================


//=============================FIN GENERAL1=====================================

//=============================CAPITULO1===========================================



function get_P1_B(cod_local){
	
		$.post('visor/visor/get_P1_B/', {cod_local:cod_local}, function(data) {
			
			$.each(data, function(index, val) {

				$('#P1_B_1_TPred').val(val.P1_B_1_TPred);
			 	get_P1_B_2_PredCol_Verif(val.P1_B_2_PredCol);

			});

		});
}

function get_P1_B_2_PredCol_Verif(type){
	switch(type){
		case 1:
			document.getElementById("P1_B_2_PredCol1").checked=true;
		break;
		case 2:
			document.getElementById("P1_B_2_PredCol2").checked=true;
		break;
	}
}



function get_P1_B_2A_N(cod_local){
	
		$.post('visor/visor/get_P1_B_2A_N/', {cod_local:cod_local}, function(data) {

			var i=0;
			var cod="";
			$.each(data, function(index, val) {
				if(i>0){cod+","}

				cod+=val.P1_B_2A_PredNoCol_Nro;

			});

			$('#P1_B_2A_PredNoCol_Nro').val(cod);

		 	//get_P1_B_2_PredCol_Verif(val.P1_B_2_PredCol);


		});
}

function get_P1_B_3N(cod_local){
	
		$.post('visor/visor/get_P1_B_3N/', {cod_local:cod_local}, function(data) {
			
			$.each(data, function(index, val) {

				$('#P1_B_1_TPred').val(val.P1_B_1_TPred);

			 	//get_P1_B_2_PredCol_Verif(val.P1_B_2_PredCol);

			});

		});
}


/*function get_Verif(type){
	switch(type){
		case 1:
			document.getElementById("P1_B_2_PredCol1").checked=true;
		break;
		case 2:
			document.getElementById("P1_B_2_PredCol2").checked=true;
		break;
	}
}*/


//-----PENDIENTE DE STOREDS

	/*function get_SP_CAP01_B_3(cod_local,predio,npredio){

<<<<<<< HEAD
		$.getJSON('visor/visor/SP_CAP01_B_3/'+cod_local+'/'+predio+'/'+npredio, {}, function(data, textStatus) {

=======
		$.getJSON('visor/visor/SP_CAP01_B_3/'+cod_local+'/'+predio+'/'+npredio, {}, function(data) {
			
>>>>>>> up
			$.each(data, function(index, val) {

				$('#P1_B_1_TPred').val(val.P1_B_1_TPred);

				"codigo_de_local"
				"Predio N"
				"P1_B_3_Obs"
				"P1_B_3_InmCod"
				"P1_B_3_InmTip"
				"P1_B_3_1_Prop"
				"P1_B_3_4_Tipo_TProp_O"
				"P1_B_3_2_AntReg_Cod"
				"P1_B_3_3_AntReg_Nro"
				"P1_B_3_4_Tipo_TProp"
				"P1_B_3_5_FecTit"
				"P1_B_3_6_DocPos"
				"P1_B_3_6_DocPos_O"
				"P1_B_3_7_DocPos_Fech"
				"P1_B_3_8_At_Pred"
				"P1_B_3_9_At_Local"
				"P1_B_3_10_Comp"
				"P1_B_3_11_CompCan"
				"P1_B_3_12_NombComp"


			 	get_P2_A_Verif(val.P1_B_2_PredCol);

			});

		});

	}*/

//===============================FIN CAPITULO1=============================================

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
				//alert(val.P2_D_1_EnergCod)
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
//==============================FIN CAPITULO 2=================================

function get_P2_E(cod_local){
		
	$.post('visor/visor/get_P2_E/', {cod_local:cod_local}, function(data) {

		$.each(data, function(index, val) {

			get_Radio_Check_Verif(val.P2_E_1_Prayo,"P2_E_1_Prayo");
			$("#P2_E_2_Ptierra").val(val.P2_E_2_Ptierra);
			$("#P2_E_3_Ano").val(val.P2_E_3_Ano);
			$("#P2_E_Obs").val(val.P2_E_Obs);

		})


	});
}

function get_P2_F(cod_local){
		
	$.post('visor/visor/get_P2_F/', {cod_local:cod_local}, function(data) {

		$.each(data, function(index, val) {

			get_Radio_Check_Verif(val.P2_F_1_ElimBas,"P2_F_1_ElimBas");

			if(val.P2_F_1_ElimBas==10){
				$("#P2_F_1_ElimBas_O").val(val.P2_F_1_ElimBas_O);
			}
			
		})


	});
}

function get_P2_G(cod_local){
		
	$.post('visor/visor/get_P2_G/', {cod_local:cod_local}, function(data) {

		$.each(data, function(index, val) {

			get_Radio_Check_Verif(val.P2_G_1_ObEjec,"P2_G_1_ObEjec");

		})

	});
}

function get_P2_G_2N(cod_local){
		
	$.post('visor/visor/get_P2_G_2N/', {cod_local:cod_local}, function(data) {
		var i=0;
		$.each(data, function(index, val) {

			i++;

			//get_Radio_Check_Verif(val.P2_G_2_Cod,"P2_G_2_Cod");
			//get_Radio_Check_Verif(val.P2_G_2A_EstPre,"P2_G_2A_EstPre"+i);
			$('#P2_G_2B_snip'+val.P2_G_2_Cod).val(val.P2_G_2B_snip);

			/*if(val.P2_G_2_Cod==7){
				$("#P2_G_2_Otro").val(val.P2_G_2_Otro);
			}*/			

		})


	});
}

//==============================CAPITULO 3=================================

//==============================FINCAPITULO 3=================================

