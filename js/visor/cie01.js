//CIE01

//=============================GENERAL1=========================================

function get_PadLocal(cod_local){

		$.post('visor/visor/get_PadLocal/', {cod_local:cod_local}, function(data) {
			alert('after')

			$.each(data, function(index, val) {
				 
				get_Depa(val.cod_dpto);
				get_Prov(val.cod_dpto,val.cod_prov);
				get_Dist(val.cod_dpto,val.cod_prov,val.cod_dist);
				 $('.ugel').val(val.descripcion_DRE_UGEL);

			});
			
		});
}

function get_PCar(cod_local){

	$.getJSON('visor/visor/get_PCar/'+cod_local, {}, function(data, textStatus) {
			
			var cod_loc="";	

			$.each(data, function(index, val) {
	
				$('.PC_A_1_CentroP').val(val.PC_A_1_CentroP);
				$('.PC_A_5_NucleoUrb').val(val.PC_A_5_NucleoUrb);
				$('#PC_A_7Dir_2_Nomb').html(val.PC_A_7Dir_2_Nomb);
				$('#PC_A_7Dir_3_Nro').html(val.PC_A_7Dir_3_Nro);
				$('#PC_A_7Dir_4_Piso').html(val.PC_A_7Dir_4_Piso);
				$('#PC_A_7Dir_5_Mz').html(val.PC_A_7Dir_5_Mz);
				$('#PC_A_7Dir_6_Lt').html(val.PC_A_7Dir_6_Lt);
				$('#PC_A_7Dir_7_Sect').html(val.PC_A_7Dir_7_Sect);
				$('#PC_A_7Dir_8_Zona').html(val.PC_A_7Dir_8_Zona);
				$('#PC_A_7Dir_9_Et').html(val.PC_A_7Dir_9_Et);
				$('#PC_A_7Dir_10_Km').html(val.PC_A_7Dir_10_Km);

				get_type_Address(val.PC_A_7Dir_1_Tvia);
				get_dir_Verif(val.PC_A_8_DirVerif);

				$('#PC_A_9_RefDir').val(val.PC_A_9_RefDir);
				$('.PC_B_1_CodLocal').val(val.PC_B_1_CodLocal); 
				$('#PC_B_2_CantEv').val(val.PC_B_2_CantEv); 

				cod_loc=val.codigo_de_local;//<--

				$('#PC_C_2_Rfinal_fecha').html(val.PC_C_2_Rfinal_fecha); 
				$('#PC_C_2_Rfinal_resul').html(val.PC_C_2_Rfinal_resul); 
				$('#PC_C_2_Rfinal_resul_O').html(val.PC_C_2_Rfinal_resul_O);
				$('#PC_D_EvT_dni').html(val.PC_D_EvT_dni);
				$('#PC_D_EvT_Nomb').html(val.PC_D_EvT_Nomb);
				$('#PC_D_JBri_dni').html(val.PC_D_JBri_dni);
				$('#PC_D_JBri_Nomb').html(val.PC_D_JBri_Nomb);
				$('#PC_D_CProv_dni').html(val.PC_D_CProv_dni);
				$('#PC_D_CProv_Nomb').html(val.PC_D_CProv_Nomb);
				$('#PC_D_CDep_dni').html(val.PC_D_CDep_dni);
				$('#PC_D_CDep_Nomb').html(val.PC_D_CDep_Nomb);
				$('#PC_D_SupN_dni').html(val.PC_D_SupN_dni);
				$('#PC_D_SupN_Nomb').html(val.PC_D_SupN_Nomb);

				$('#PC_E_1_TPred').html(val.PC_E_1_TPred);
				$('#PC_E_2_TPred_NoCol').html(val.PC_E_2_TPred_NoCol);
				$('#PC_E_3_TEdif').html(val.PC_E_3_TEdif);
				$('#PC_E_4_TPat').html(val.PC_E_4_TPat);
				$('#PC_E_5_TLosa').html(val.PC_E_5_TLosa);
				$('#PC_E_6_TCist').html(val.PC_E_6_TCist);
				$('#PC_E_7_TMurCon').html(val.PC_E_7_TMurCon);
				$('#PC_F_1').html(val.PC_F_1);

			})
			
			get_PCar_C_1N(cod_loc);//<--
	})
}

//=============VALID DATA GET_PCAR=================

function get_type_Address(type){
	
	switch(type){
		case 1:
			document.getElementById("avenida1").checked=true; 
		break;
		case 2:
			document.getElementById("jiron1").checked=true; 
		break;
		case 3:
			document.getElementById("calle1").checked=true; 
		break;
		case 4:
			document.getElementById("pasaje1").checked=true; 
		break;
		case 5:
			document.getElementById("carretera1").checked=true; 
		break;
		case 6:
			document.getElementById("autopista1").checked=true; 
		break;
		case 7:
			document.getElementById("otro1").checked=true; 
		break;
	}

}

function get_dir_Verif(type){
	switch(type){
		case 1:
			document.getElementById("verif1").checked=true; 
		break;
		case 2:
			document.getElementById("verif2").checked=true; 
		break;
	}
}

//====================SECCIÓN C:  ENTREVISTA Y SUPERVISIÓN==================================

function get_PCar_C_1N(cod_local){
	
	$.getJSON('visor/visor/get_PCar_C_1N/'+cod_local, {}, function(data, textStatus) {

		var html="";

		$.each(data, function(index, val) {
		

 			html+='<tr>'+
				'<td style="text-align:center;">'+val.PC_C_1_NroVis+'°</td>'+
				'<td>'+val.PC_C_1_Et_Fecha+'</td>'+
				'<td>'+val.PC_C_1_Et_Hini+'</td>'+
				'<td>'+val.PC_C_1_Et_Hfin+'</td>'+
				'<td>'+val.PC_C_1_Et_Fecha_Prox+'</td>'+											
				'<td>'+val.PC_C_1_Et_Hora_Prox+'</td>'+
				'<td>'+val.PC_C_1_Et_Res+'</td>'+
				'<td>'+val.PC_C_1_Jb_Fecha+'</td>'+											
				'<td>'+val.PC_C_1_Jb_Hini+'</td>'+											
				'<td>'+val.PC_C_1_Jb_Hfin+'</td>'+
				'<td>'+val.PC_C_1_Jb_Res+'</td>'+
			'</tr>';

		});

		$('#eva_solu1').html(html);

	})
}
//=============================FIN GENERAL1=====================================

//=============================CAPITULO1===========================================

function get_P1_A(cod_local){
	
	$.getJSON('visor/visor/get_P1_A/'+cod_local, {}, function(data, textStatus) {

		$.each(data, function(index, val) {
			$('#nie2').val(val.P1_A_1_Cant_IE);
		})

	})
}

function get_P1_A_2N(cod_local){
	
	$.getJSON('visor/visor/get_P1_A_2N/'+cod_local, {}, function(data, textStatus) {

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

function get_P1_A_2_8N(cod_local,nro_IE){

	var html="";
	
	$.getJSON('visor/visor/get_P1_A_2_8N/'+cod_local+'/'+nro_IE, {}, function(data, textStatus) {

									
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

		$('#'+cod_local+nro_IE).html(html);
											
	}, "json");

}

function get_P1_B(cod_local){
	
		$.getJSON('visor/visor/get_P1_B/'+cod_local, {}, function(data, textStatus) {
			
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
	
		$.getJSON('visor/visor/get_P1_B_2A_N/'+cod_local, {}, function(data, textStatus) {
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
	
		$.getJSON('visor/visor/get_P1_B_3N/'+cod_local, {}, function(data, textStatus) {
			
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

		$.getJSON('visor/visor/SP_CAP01_B_3/'+cod_local+'/'+predio+'/'+npredio, {}, function(data, textStatus) {
			
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
	
		$.getJSON('visor/visor/get_P2_A/'+cod_local, {}, function(data, textStatus) {
			
			$.each(data, function(index, val) {

			 	get_Radio_Verif(val.P2_A_1_Clima,"P2_A_1_Clima");
			 	get_Radio_Verif(val.P2_A_2_Lluv,"P2_A_2_Lluv");
			 	$("#P2_A_2A_Lluv_Mini").val(val.P2_A_2A_Lluv_Mini);
			 	$("#P2_A_2A_Lluv_Mfin").val(val.P2_A_2A_Lluv_Mfin);
			 	get_Radio_Verif(val.P2_A_3_Hel,"P2_A_3_Hel");
			 	$("#P2_A_3A_Hel_Mini").val(val.P2_A_3A_Hel_Mini);
			 	$("#P2_A_3A_Hel_Mfin").val(val.P2_A_3A_Hel_Mfin);
			 	get_Radio_Verif(val.P2_A_4_Gra,"P2_A_4_Gra");
			 	$("#P2_A_4A_Gra_Mini").val(val.P2_A_4A_Gra_Mini);
			 	$("#P2_A_4A_Gra_Mfin").val(val.P2_A_4A_Gra_Mfin);
			 	get_Radio_Verif(val.P2_A_5_Vend,"P2_A_5_Vend");
			 	get_Radio_Verif(val.P2_A_5A_Vend_Tip,"P2_A_5A_Vend_Tip");
			 	$("#P2_A_5B_Vend_Mini").val(val.P2_A_5B_Vend_Mini);
			 	$("#P2_A_5B_Vend_Mfin").val(val.P2_A_5B_Vend_Mfin);
			 	
			 
			 });
			 		
			
		});
}

function get_P2_B(cod_local){
	
		$.getJSON('visor/visor/get_P2_B/'+cod_local, {}, function(data, textStatus) {
			
			$.each(data, function(index, val) {
			 	
			 	
			 	get_Radio_Verif(val.P2_B_1_Topo,"P2_B_1_Topo")

			 	get_Radio_Verif(val.P2_B_2_Suelo,"P2_B_2_Suelo")
			 	$("#P2_B_2_Suelo_O").val(val.P2_B_2_Suelo_O)
			 	
			 	get_Radio_Verif(val.P2_B_3_Prof,"P2_B_3_Prof")
			 	
			 	$("#P2_B_4_CapAcc").val(val.P2_B_4_CapAcc)
			 	
			 	get_Radio_Verif(val.P2_B_5_Mtran_1,"P2_B_5_Mtran_1");
			 	get_Radio_Verif(val.P2_B_5_Mtran_2,"P2_B_5_Mtran_2");
			 	get_Radio_Verif(val.P2_B_5_Mtran_3,"P2_B_5_Mtran_3");

			 	get_Radio_Verif(val.P2_B_5A_Uso,"P2_B_5A_Uso")
			 	
			 	get_Radio_Verif(val.P2_B_5B_Tvia_uso_1,"P2_B_5B_Tvia_uso_1");
			 	get_Radio_Verif(val.P2_B_5B_Tvia_uso_2,"P2_B_5B_Tvia_uso_2");
			 	get_Radio_Verif(val.P2_B_5B_Tvia_uso_3,"P2_B_5B_Tvia_uso_3");
			 	get_Radio_Verif(val.P2_B_5B_Tvia_uso_4,"P2_B_5B_Tvia_uso_4");
			 	
			 	$("#P2_B_6_Trec_H").val(val.P2_B_6_Trec_H);
		 		$("#P2_B_6_Trec_M").val(val.P2_B_6_Trec_M);
		 		
		 		$("#P2_B_7_Ttramo_H").val(val.P2_B_7_Ttramo_H);
		 		$("#P2_B_7_Ttramo_M").val(val.P2_B_7_Ttramo_M);
		 		
		 		get_Radio_Verif(val.P2_B_8_Pelig,"P2_B_8_Pelig");

			 		$.each(val.peligros1, function(index, val) {

			 			
						get_Radio_Verif(val.P2_B_9_Cod,"P2_B_9") 

			 		});

			 		$.each(val.peligros2, function(index, val) {
			 			
						get_Radio_Verif(val.P2_B_10_Cod,"P2_B_10") 
			 			
			 		});

			 		$.each(val.peligros3, function(index, val) {
			 			
						get_Radio_Verif(val.P2_B_11_Cod,"P2_B_11") 
						
						if(val.P2_B_11_Cod==11){
							$("#P2_B_11_Cod_O").val(val.P2_B_11_Cod_O);
						}
			 			
			 		});
			 		
			 		$.each(val.vulnerabilidades, function(index, val) {

			 			
						get_Radio_Verif(val.P2_B_12_Cod,"P2_B_12")
						
						if(val.P2_B_12_Cod==6){
							$("#P2_B_12_Cod_O").val(val.P2_B_12_Cod_O);
						}
			 			
			 		});

			 });
			 				
		});
}

function get_P2_C(cod_local){
		
		$.getJSON('visor/visor/get_P2_C/'+cod_local, {}, function(data, textStatus) {
			
			$.each(data, function(index, val) {

					get_Radio_Verif($.trim(val.P2_C_1Locl_1_Energ),"P2_C_1Locl_1_Energ");
					get_Radio_Verif(val.P2_C_1Locl_2_Agua,"P2_C_1Locl_2_Agua");
					get_Radio_Verif(val.P2_C_1Locl_3_Alc,"P2_C_1Locl_3_Alc");
					get_Radio_Verif(val.P2_C_1Locl_4_Tfija,"P2_C_1Locl_4_Tfija");
					get_Radio_Verif(val.P2_C_1Locl_5_Tmov,"P2_C_1Locl_5_Tmov");
					get_Radio_Verif(val.P2_C_1Locl_6_Int,"P2_C_1Locl_6_Int");
					get_Radio_Verif(val.P2_C_2LocE_1_Energ,"P2_C_2LocE_1_Energ");
					get_Radio_Verif(val.P2_C_2LocE_2_Agua,"P2_C_2LocE_2_Agua");
					get_Radio_Verif(val.P2_C_2LocE_3_Alc,"P2_C_2LocE_3_Alc");
					get_Radio_Verif(val.P2_C_2LocE_4_Tfija,"P2_C_2LocE_4_Tfija");
					get_Radio_Verif(val.P2_C_2LocE_5_Tmov,"P2_C_2LocE_5_Tmov");
					get_Radio_Verif(val.P2_C_2LocE_6_Int,"P2_C_2LocE_6_Int");
			
			});
		
		});
}

function get_P2_D(cod_local){
		
	$.getJSON('visor/visor/get_P2_D/'+cod_local, {}, function(data, textStatus) {
			
		$.each(data, function(index, val) {

			$("#P2_D_2_Energ_CantSum").val(val.P2_D_2_Energ_CantSum);
			$("#P2_D_4_Energ_Emp").val(val.P2_D_4_Energ_Emp);
			$("#P2_D_6_Agua_CantSum").val(val.P2_D_6_Agua_CantSum);
			$("#P2_D_8_Agua_Emp").val(val.P2_D_8_Agua_Emp);
			get_Radio_Verif(val.P2_D_9_Desag,"P2_D_9_Desag");

		});

	});
}

function get_P2_D_1N(cod_local){
		
	$.getJSON('visor/visor/get_P2_D_1N/'+cod_local, {}, function(data, textStatus) {
			
		$.each(data, function(index, val) {

			get_Radio_Verif(val.P2_D_1_EnergCod,"P2_D_1_EnergCod");

			if(val.P2_D_1_EnergCod==4){
				alert(val.P2_D_1_EnergCod)
				$("#P2_D_1_EnergCod_O").val(val.P2_D_1_EnergCod_O);
			}

		});

	});
}

//==============================FIN CAPITULO 2=================================



//==============================CAPITULO 3=================================

//==============================FINCAPITULO 3=================================

