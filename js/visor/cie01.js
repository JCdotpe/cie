//CIE01

//=============================GENERAL1=========================================





//====================SECCIÓN C:  ENTREVISTA Y SUPERVISIÓN==================================


//=============================FIN GENERAL1=====================================

//=============================CAPITULO1===========================================

function get_P1_A(cod_local){
	
	$.post('visor/visor/get_P1_A/', {cod_local:cod_local}, function(data) {

		$.each(data, function(index, val) {
			$('#nie2').val(val.P1_A_1_Cant_IE);
		})

	})
}

function get_P1_A_2N(cod_local){
	
	$.post('visor/visor/get_P1_A_2N/', {cod_local:cod_local}, function(data) {

		var html="";

		var i=1;

		$.each(data, function(index, val) {

			i++;

			html+='<table class="table table-bordered">'+
				'<thead>'+
					'<th colspan="2">'+i+'. Institución educativa N° <span><input value="'+val.P1_A_2_NroIE+'" class="P1_A_2_NroIE" style="width:20px;" type="text" class="form-control"></span></th>'+
				'</thead>'+
				'<tbody>'+
					'<tr>'+
						'<td>'+
							'<strong>'+i+'.1¿Cuál es el nombre de la institución educativa?</strong>'+
						'</td>'+
						'<td><input value="'+val.P1_A_2_1_NomIE+'" id="P1_A_2_1_NomIE" style="width:350px;" type="text" class="form-control"></td>'+
					'</tr>'+
					'<tr>'+
						'<td>'+
							'<strong>'+i+'.2¿Cuáles son los apellidos y nombres del director?</strong>'+
						'</td>'+
						'<td><input value="'+val.P1_A_2_2_Direc+'" id="P1_A_2_2_Direc" style="width:350px;" type="text" class="form-control"></td>'+
					'</tr>'+
					'<tr>'+
						'<td>'+
							'<strong>'+i+'.3¿Cuál es el numero número de DNI o Carnet de Extranjería del Director?</strong>'+
						'</td>'+
						'<td>'+
							'<div class="panel">'+
								'<label>D.N.I.</label>'+
								'<input value="'+val.P1_A_2_3_DocNro+'" id="P1_A_2_3_DocNro" style="width:200px;" type="text" class="form-control">'+
							'</div>'+
							'<div class="panel">'+
								'<label>Carnet del Extrangero</label>'+
								'<input value="'+val.P1_A_2_3_DocNro+'" id="P1_A_2_3_DocNro" style="width:200px;" type="text" class="form-control">'+
							'</div>'+
						'</td>'+
					'</tr>'+
					'<tr>'+
						'<td><strong>'+i+'.4¿Cuál es el numero de teléfono de (L) ?</strong></td>'+
						'<td>'+
							'<div class="panel">'+
								'<label>La Institucion Educativa?</label>'+
								'<input value="'+val.P1_A_2_4_TelfIE+'" id="P1_A_2_4_TelfIE" style="width:200px;" type="text" class="form-control">'+
							'</div>'+
							'<div class="panel">'+
								'<label>Director?</label>'+
								'<input value="'+val.P1_A_2_4_TelfDir+'" id="P1_A_2_4_TelfDir" style="width:200px;" type="text" class="form-control">'+
							'</div>'+
						'</td>'+
					'</tr>'+
					'<tr>'+
						'<td><strong>'+i+'.5¿Cuál es el correo electronico de (L)?</strong></td>'+
						'<td>'+
							'<div class="panel">'+
								'<label>La Institucion Educativa?</label>'+
								'<input value="'+val.P1_A_2_5_EmailIE+'" id="P1_A_2_5_EmailIE" style="width:400px;" type="text" class="form-control">'+
							'</div>'+
							'<div class="panel">'+
								'<label>Director?</label>'+
								'<input value="'+val.P1_A_2_5_EmailDir+'" id="P1_A_2_5_EmailDir" style="width:400px;" type="text" class="form-control">'+
							'</div>'+
						'</td>'+
					'</tr>'+
					'<tr>'+
						'<td><strong>'+i+'.6¿Apellidos y Nombres del informante?</strong></td>'+
						'<td><input value="'+val.P1_A_2_6_Informant+'" id="P1_A_2_6_Informant" style="width:400px;" type="text" class="form-control"></td>'+
					'</tr>'+
					'<tr>'+
						'<td><strong>'+i+'.7¿Cargo del informante?</strong></td>'+
						'<td><input value="'+val.P1_A_2_7_InformantCarg+'" id="P1_A_2_7_InformantCarg" style="width:400px;" type="text" class="form-control"></td>'+
					'</tr>'+
					'<tr>'+
						'<td><strong>'+i+'.8¿Cuántos códigos modulares tiene asignada una institución educativa?</strong></td>'+
						'<td>'+
							'<div class="panel">'+
								'<label>N° de Códigos Modulares</label>'+
								'<input value="'+val.P1_A_2_8_Can_CMod_IE+'" id="P1_A_2_8_Can_CMod_IE" style="width:200px;" type="text" class="form-control">'+
							'</div>'+
						'</td>'+
					'</tr>'+
				'</tbody>'+

			'</table>'+



					'<div class="panel"><!-- N CODIGOS -->'+
									'<label>'+i+'.9 Códigos modulares asignados a la institución educativa:</label>'+

									'<table class="table table-bordered">'+
										'<thead>'+
											'<tr>'+
												'<th rowspan="2" style="text-align:center;vertical-align:middle;">N° Ord.</th>'+
												'<th rowspan="2" style="text-align:center;vertical-align:middle;">Codigo Modular</th>'+
												'<th rowspan="2" style="text-align:center;vertical-align:middle;">Codigo local escolar</th>'+
												'<th rowspan="2" style="text-align:center;vertical-align:middle;">Nivel o Modalidad</th>'+
												'<th rowspan="2" style="text-align:center;vertical-align:middle;">Caracteristica</th>'+
												'<th rowspan="2" style="text-align:center;vertical-align:middle;">Numero de anexo</th>'+
												'<th rowspan="2" style="text-align:center;vertical-align:middle;">¿Cuantos ANexos tiene?</th>'+
												'<th colspan="2" style="text-align:center; border:1px solid #333;">1er. Turno</th>'+
												'<th colspan="2" style="text-align:center; border:1px solid #333;">2do. Turno</th>'+
												'<th colspan="2" style="text-align:center; border:1px solid #333;">3er. Turno</th>'+
											'</tr>'+
											'<tr>'+
												'<th style="text-align:center;">Total Alumnos</th>'+
												'<th style="text-align:center;">Total Aulas</th>'+
												'<th style="text-align:center;">Total Alumnos</th>'+
												'<th style="text-align:center;">Total Aulas</th>'+
												'<th style="text-align:center;">Total Alumnos</th>'+
												'<th style="text-align:center;">Total Aulas</th>'+
											'</tr>'+
											'<tr>'+
												'<th></th>'+
												'<th style="text-align:center;">(a)</th>'+
												'<th style="text-align:center;">(b)</th>'+
												'<th style="text-align:center;">(c)</th>'+
												'<th style="text-align:center;">(d)</th>'+
												'<th style="text-align:center;">(e)</th>'+
												'<th style="text-align:center;">(f)</th>'+
												'<th style="text-align:center;">(g)</th>'+
												'<th style="text-align:center;">(h)</th>'+
												'<th style="text-align:center;">(i)</th>'+
												'<th style="text-align:center;">(j)</th>'+
												'<th style="text-align:center;">(k)</th>'+
												'<th style="text-align:center;">(l)</th>'+
											'</tr>'+
										'</thead>'+
										'<tbody id="'+cod_local+val.P1_A_2_NroIE+'">'+

										'</tbody>'+

									'</table>'+

									'<div class="panel">'+
											'<label>Observaciones:</label>'+
											'<textarea style="width:800px; height:100px;">'+val.P1_A_2_Obs+'</textarea>'+
									'</div>'+

					'</div><!-- end panel ncodigod-->';







		})

		$('#inst_educa').html(html);

		each_get_P1_A_2_8N(cod_local);

	})
}

function each_get_P1_A_2_8N(cod_local){
	$('.P1_A_2_NroIE').each(function() {
//		alert($(this).attr('value'));
		get_P1_A_2_8N(cod_local,$(this).attr('value'));
	});
}

function get_P1_A_2_8N(cod_local,NroIE){

	$.post('visor/visor/get_P1_A_2_8N/', {cod_local:cod_local,NroIE:NroIE}, function(data) {

		var html="";

		$.each(data, function(index, val) {

			html+='<tr>'+
				'<td style="text-align:center;" class="P1_A_2_9_NroCMod">'+val.P1_A_2_9_NroCMod+'</td>'+
				'<td>'+val.P1_A_2_9A_CMod+'</td>'+
				'<td>'+val.P1_A_2_9B_CodLocal+'</td>'+
				'<td>'+val.P1_A_2_9C_Nivel+'</td>'+
				'<td>'+val.P1_A_2_9D_Car+'</td>'+
				'<td>'+val.P1_A_2_9E_NroAnex+'</td>'+
				'<td>'+val.P1_A_2_9F_CantAnex+'</td>'+
				'<td>'+val.P1_A_2_9G_T1_Talu+'</td>'+
				'<td>'+val.P1_A_2_9H_T1_Taul+'</td>'+
				'<td>'+val.P1_A_2_9I_T2_Talu+'</td>'+
				'<td>'+val.P1_A_2_9J_T2_Taul+'</td>'+
				'<td>'+val.P1_A_2_9K_T3_Talu+'</td>'+
				'<td>'+val.P1_A_2_9L_T3_Taul+'</td>'+
				'</tr>';
				//alert(val.anexos)
				$.each(val.anexos, function(index, val) {

					html+='<tr>'+
							'<td></td>'+
							'<th colspan="2" style="text-align:center;">Nombre asignado al anexo</th>'+
							'<th style="text-align:center;">N°</th>'+
							'<td>'+val.P1_A_2_9_AnexNro+'</td>'+
							'<td colspan="2">'+val.P1_A_2_9_AnexNomb+'</td>'+
							'<td>'+val.P1_A_2_9G_T1_Talu+'</td>'+
							'<td>'+val.P1_A_2_9H_T1_Taul+'</td>'+
							'<td>'+val.P1_A_2_9I_T2_Talu+'</td>'+
							'<td>'+val.P1_A_2_9J_T2_Taul+'</td>'+
							'<td>'+val.P1_A_2_9K_T3_Talu+'</td>'+
							'<td>'+val.P1_A_2_9L_T3_Taul+'</td>'+
						'</tr>';

				});

		});


		$('#'+cod_local+NroIE).html(html);
											
	});

}

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

