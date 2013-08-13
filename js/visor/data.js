//================================BASICAS=============================================

function get_Depa(code){

	$.ajax({
		url: 'convocatoria/registro/get_ajax_dptobyCode/',
		type: 'POST',
		dataType: 'json',
		data: {code: code},
		success: function(data){
        	
            $.each(data, function(index, val) {
				$('.departamento').val(val.Nombre);			
			});

        }
		
	});
	
}

function get_Prov(depa,prov){

	$.ajax({
		url: 'convocatoria/registro/get_ajax_provsbyCode/',
		type: 'POST',
		dataType: 'json',
		data: { depa: depa , prov:prov },
		success: function(data){
        	
            $.each(data, function(index, val) {
				$('.provincia').val(val.Nombre);			
			});

        }
		
	});

}

function get_Dist(depa,prov,dist){

	$.ajax({
		url: 'convocatoria/registro/get_ajax_distbyCode/',
		type: 'POST',
		dataType: 'json',
		data: {depa:depa , prov:prov , dist:dist},
		success: function(data){
        	
            $.each(data, function(index, val) {
				$('.distrito').val(val.Nombre);			
			});

        }
		
	});

}

//=============================GENERAL1=========================================

function get_PadLocal(cod_local){
	
		$.getJSON('visor/visor/get_PadLocal/'+cod_local, {}, function(data, textStatus) {
			
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
	
				$('.centro_poblado').val(val.PC_A_1_CentroP);
				$('.nucleo_urbano').val(val.PC_A_5_NucleoUrb);
				$('#via1').html(val.PC_A_7Dir_2_Nomb);
				$('#puerta1').html(val.PC_A_7Dir_3_Nro);
				$('#piso1').html(val.PC_A_7Dir_4_Piso);
				$('#mz1').html(val.PC_A_7Dir_5_Mz);
				$('#lote1').html(val.PC_A_7Dir_6_Lt);
				$('#sector1').html(val.PC_A_7Dir_7_Sect);
				$('#zona1').html(val.PC_A_7Dir_8_Zona);
				$('#etapa1').html(val.PC_A_7Dir_9_Et);
				$('#km1').html(val.PC_A_7Dir_10_Km);

				get_type_Address(val.PC_A_7Dir_1_Tvia);
				get_dir_Verif(val.PC_A_8_DirVerif);

				$('#referencia_local1').val(val.PC_A_9_RefDir);
				$('#tr_cod_local1').val(val.PC_B_1_CodLocal); 
				$('#cnt_cod_env1').val(val.PC_B_2_CantEv); 

				cod_loc=val.codigo_de_local;//<--

				$('#resf_f1').html(val.PC_C_2_Rfinal_fecha); 
				$('#resf_res1').html(val.PC_C_2_Rfinal_resul); 
				$('#resf_otro1').html(val.PC_C_2_Rfinal_resul_O);
				$('#etdni1').html(val.PC_D_EvT_dni);
				$('#etnombres1').html(val.PC_D_EvT_Nomb);
				$('#jbdni1').html(val.PC_D_JBri_dni);
				$('#jbnombres1').html(val.PC_D_JBri_Nomb);
				$('#cpdni1').html(val.PC_D_CProv_dni);
				$('#cpnombres1').html(val.PC_D_CProv_Nomb);
				$('#cddni1').html(val.PC_D_CDep_dni);
				$('#cdnombres1').html(val.PC_D_CDep_Nomb);
				$('#sndni1').html(val.PC_D_SupN_dni);
				$('#snnombres1').html(val.PC_D_SupN_Nomb);

				$('#tpr1').html(val.PC_E_1_TPred);
				$('#tpn2').html(val.PC_E_2_TPred_NoCol);
				$('#ted1').html(val.PC_E_3_TEdif);
				$('#tpa1').html(val.PC_E_4_TPat);
				$('#tld1').html(val.PC_E_5_TLosa);
				$('#tct1').html(val.PC_E_6_TCist);
				$('#tmc1').html(val.PC_E_7_TMurCon);
				$('#n_predio1').html(val.PC_F_1);

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


//=============================CAPITULO I===========================================

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

		$.each(data, function(index, val) {

			/*$('#ie_num2').val();
			$('#nom_ie2').val(val.);
			$('#nya_dir2').val(val.);
				//P1_A_2_3_DocTip
			$('#dni_dir2').val(val.);
			$('#carnet_dir2').val(val.);
			
			$('#telf_ie2').val(val. );
			$('#telef_dir2').val(val. );
			$('#mail_ie2').val(val.);
			$('#mail_dir2').val(val.);
			$('#ayn_info2').val(val.);
			$('#cargo_info2').val(val.);
			$('#ncod_mod2').val(val.);*/

			
			html+='<table class="table table-bordered">'+
				'<thead>'+
					'<th colspan="2">2. Institución educativa N° <span><input value="'+val.P1_A_2_NroIE+'" id="ie_num2" style="width:20px;" type="text" class="form-control"></span></th>'+
				'</thead>'+
				'<tbody>'+
					'<tr>'+
						'<td>'+
							'<strong>2.1.¿Cuál es el nombre de la institución educativa?</strong>'+
						'</td>'+
						'<td><input value="'+val.P1_A_2_1_NomIE+'" id="nom_ie2" style="width:350px;" type="text" class="form-control"></td>'+
					'</tr>'+
					'<tr>'+
						'<td>'+
							'<strong>2.2.¿Cuáles son los apellidos y nombres del director?</strong>'+
						'</td>'+
						'<td><input value="'+val.P1_A_2_2_Direc+'" id="nya_dir2" style="width:350px;" type="text" class="form-control"></td>'+
					'</tr>'+
					'<tr>'+
						'<td>'+
							'<strong>2.3.¿Cuál es el numero número de DNI o Carnet de Extranjería del Director?</strong>'+
						'</td>'+
						'<td>'+
							'<div class="panel">'+
								'<label>D.N.I.</label>'+
								'<input value="'+val.P1_A_2_3_DocNro+'" id="dni_dir2" style="width:200px;" type="text" class="form-control">'+
							'</div>'+
							'<div class="panel">'+
								'<label>Carnet del Extrangero</label>'+
								'<input value="'+val.P1_A_2_3_DocNro+'" id="carnet_dir2" style="width:200px;" type="text" class="form-control">'+
							'</div>'+
						'</td>'+
					'</tr>'+
					'<tr>'+
						'<td><strong>2.4.¿Cuál es el numero de teléfono de (L) ?</strong></td>'+
						'<td>'+
							'<div class="panel">'+
								'<label>La Institucion Educativa?</label>'+
								'<input value="'+val.P1_A_2_4_TelfIE+'" id="telf_ie2" style="width:200px;" type="text" class="form-control">'+
							'</div>'+
							'<div class="panel">'+
								'<label>Director?</label>'+
								'<input value="'+val.P1_A_2_4_TelfDir+'" id="telef_dir2" style="width:200px;" type="text" class="form-control">'+
							'</div>'+
						'</td>'+
					'</tr>'+
					'<tr>'+
						'<td><strong>2.5.¿Cuál es el correo electronico de (L)?</strong></td>'+
						'<td>'+
							'<div class="panel">'+
								'<label>La Institucion Educativa?</label>'+
								'<input value="'+val.P1_A_2_5_EmailIE+'" id="mail_ie2" style="width:400px;" type="text" class="form-control">'+
							'</div>'+
							'<div class="panel">'+
								'<label>Director?</label>'+
								'<input value="'+val.P1_A_2_5_EmailDir+'" id="mail_dir2" style="width:400px;" type="text" class="form-control">'+
							'</div>'+
						'</td>'+
					'</tr>'+
					'<tr>'+
						'<td><strong>2.6.¿Apellidos y Nombres del informante?</strong></td>'+
						'<td><input value="'+val.P1_A_2_6_Informant+'" id="ayn_info2" style="width:400px;" type="text" class="form-control"></td>'+
					'</tr>'+
					'<tr>'+
						'<td><strong>2.7.¿Cargo del informante?</strong></td>'+
						'<td><input value="'+val.P1_A_2_7_InformantCarg+'" id="cargo_info2" style="width:400px;" type="text" class="form-control"></td>'+
					'</tr>'+
					'<tr>'+
						'<td><strong>2.8.¿Cuántos códigos modulares tiene asignada una institución educativa?</strong></td>'+
						'<td>'+
							'<div class="panel">'+
								'<label>N° de Códigos Modulares</label>'+
								'<input value="'+val.P1_A_2_8_Can_CMod_IE+'" id="ncod_mod2" style="width:200px;" type="text" class="form-control">'+
							'</div>'+
						'</td>'+
					'</tr>'+
				'</tbody>'+
								
			'</table>'+
							
						

			'<div class="panel"><!-- N CODIGOS -->'+
							'<label>2.9 Códigos modulares asignados a la institución educativa:</label>'+
							
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
								'<tbody>'+

									'<tr>'+
										'<td style="text-align:center;">1er</td>'+
										'<td></td>'+
										'<td></td>'+
										'<td></td>'+
										'<td></td>'+
										'<td></td>'+
										'<td></td>'+
										'<td></td>'+
										'<td></td>'+
										'<td></td>'+
										'<td></td>'+
										'<td></td>'+
										'<td></td>'+
									'</tr>'+

										'<tr>'+
											'<td></td>'+
											'<th colspan="2" style="text-align:center;">Nombre asignado al anexo</th>'+
											'<th style="text-align:center;">N°</th>'+
											'<td></td>'+
											'<td colspan="2"></td>'+
											'<td></td>'+
											'<td></td>'+
											'<td></td>'+
											'<td></td>'+
											'<td></td>'+
											'<td></td>'+
										'</tr>'+

										'<tr>'+
											'<td></td>'+
											'<th colspan="2" style="text-align:center;">Nombre asignado al anexo</th>'+
											'<th style="text-align:center;">N°</th>'+
											'<td></td>'+
											'<td colspan="2"></td>'+
											'<td></td>'+
											'<td></td>'+
											'<td></td>'+
											'<td></td>'+
											'<td></td>'+
											'<td></td>'+
										'</tr>'+

									'<tr>'+
										'<td style="text-align:center;">2do</td>'+
										'<td></td>'+
										'<td></td>'+
										'<td></td>'+
										'<td></td>'+
										'<td></td>'+
										'<td></td>'+
										'<td></td>'+
										'<td></td>'+
										'<td></td>'+
										'<td></td>'+
										'<td></td>'+
										'<td></td>'+
									'</tr>'+

										'<tr>'+
											'<td></td>'+
											'<th colspan="2" style="text-align:center;">Nombre asignado al anexo</th>'+
											'<th style="text-align:center;">N°</th>'+
											'<td></td>'+
											'<td colspan="2"></td>'+
											'<td></td>'+
											'<td></td>'+
											'<td></td>'+
											'<td></td>'+
											'<td></td>'+
											'<td></td>'+
										'</tr>'+

										'<tr>'+
											'<td></td>'+
											'<th colspan="2" style="text-align:center;">Nombre asignado al anexo</th>'+
											'<th style="text-align:center;">N°</th>'+
											'<td></td>'+
											'<td colspan="2"></td>'+
											'<td></td>'+
											'<td></td>'+
											'<td></td>'+
											'<td></td>'+
											'<td></td>'+
											'<td></td>'+
										'</tr>'+
	

										
								'</tbody>'+
							'</table>'+

							'<div class="panel">'+
									'<label>Observaciones:</label>'+
									'<textarea style="width:870px; height:100px;"></textarea>'+
							'</div>'+

			'</div><!-- end panel ncodigod-->';

		})
		
		$('#inst_educa').html(html);

	})
}


