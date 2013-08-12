//================================BASICAS=============================================

function get_Depa(code){

	$.ajax({
		url: 'convocatoria/registro/get_ajax_dpto/',
		type: 'POST',
		dataType: 'json',
		data: {code: code},
	})
	.done(function(data) {
		console.log("success");

	});
	
	

}

function get_Prov(depa,prov){

	$.ajax({
		url: 'convocatoria/registro/get_ajax_provsbyCode/',
		type: 'POST',
		dataType: 'json',
		data: { depa: depa , prov:prov }
	})
	.done(function(data) {
		console.log("success");
		
	});

}

function get_Dist(code){

	$.ajax({
		url: 'convocatoria/registro/get_ajax_dpto/',
		type: 'POST',
		dataType: 'json',
		data: {code: code},
	})
	.done(function(data) {
		console.log("success");
		
	});

}

//=============================GENERAL1=========================================

function get_PadLocal(cod_local){
	
		$.getJSON('visor/visor/get_PadLocal/'+cod_local, {}, function(data, textStatus) {
			
			$.each(data, function(index, val) {
				 
				 $('.departamento').val(val.cod_dpto);
				 $('.provincia').val(val.cod_prov);
				 $('.distrito').val(val.cod_dist);
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
				PC_F_1

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


