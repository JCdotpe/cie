
$(document).ready(function() {

		get_PadLocal();
		get_PCar();

		$('input').attr({
			disabled : true,
		});

});

function get_PadLocal(cod_local){

		$.post(urlRoot('index.php')+'/visor/visor/get_PadLocal/', {cod_local:getLocal()}, function(data) {
			
			$.each(data, function(index, val) {

				get_Depa(val.cod_dpto);
				get_Prov(val.cod_dpto,val.cod_prov);
				get_Dist(val.cod_dpto,val.cod_prov,val.cod_dist);
				$('.ugel').val(val.descripcion_DRE_UGEL);

			});

		}).fail(function( jqxhr, textStatus, error ) {
	
			var err = textStatus + ', ' + error;
			console.log( "Request Failed: " + err);
	
		});
}

function get_PCar(cod_local){

	var cod_loc="";
	$.getJSON(urlRoot('index.php')+'/visor/PCar/Data/', {token:getToken() ,id_local: getLocal(), predio: getPredio()}, function(data, textStatus) {
		
		//$.each(data, function(index, val) {		
			var cod_loc="";	


			$.each(data, function(index, val) {
				
				$('.id_local').val(val.id_local);
				$('.PC_A_4_CentroP').val(val.PC_A_4_CentroP);
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

				get_PCar_C_1N(val.PC_B_1_CodLocal)

				$('#PC_C_2_Rfinal_fecha').html(val.PC_C_2_Rfinal_fecha);
				
				if(val.PC_C_2_Rfinal_resul==5){
				
					$('#PC_C_2_Rfinal_resul').html(val.PC_C_2_Rfinal_resul+" - "+val.PC_C_2_Rfinal_resul_O);
				
				}else{
				
					$('#PC_C_2_Rfinal_resul').html(val.PC_C_2_Rfinal_resul);		
				
				}
				


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
				$('#Nro_Pred').html(val.Nro_Pred);

			})
		
			//})
	}).fail(function( jqxhr, textStatus, error ) {
	
		var err = textStatus + ', ' + error;
		console.log( "Request Failed: " + err);
	
	});
}

function get_PCar_C_1N(cod_local){
	//alert(cod_local)
	$.getJSON(urlRoot('index.php')+'/visor/PCarC1N/Data/', {token: getToken(),id_local: getToken(), predio:getPredio()}, function(data, textStatus) {
	
		var html="";

		$.each(data, function(index, val) {

			resET=val.PC_C_1_Et_Res;

			if(val.PC_C_1_Et_Res==5){
				resET=val.PC_C_1_Et_Res+" - "+val.PC_C_1_Et_Res_O;
			}

			resJB=val.PC_C_1_Jb_Res;
			
			if(val.PC_C_1_Jb_Res==5){
				resJB=val.PC_C_1_Jb_Res+" - "+val.PC_C_1_Jb_Res_O;
			}

 			html+='<tr>'+
				'<td style="text-align:center;">'+val.PC_C_1_NroVis+'°</td>'+
				'<td>'+val.PC_C_1_Et_Fecha+'</td>'+
				'<td>'+val.PC_C_1_Et_Hini+'</td>'+
				'<td>'+val.PC_C_1_Et_Hfin+'</td>'+
				'<td>'+val.PC_C_1_Et_Fecha_Prox+'</td>'+
				'<td>'+val.PC_C_1_Et_Hora_Prox+'</td>'+
				'<td>'+resET+'</td>'+

				'<td>'+val.PC_C_1_Jb_Fecha+'</td>'+
				'<td>'+val.PC_C_1_Jb_Hini+'</td>'+
				'<td>'+val.PC_C_1_Jb_Hfin+'</td>'+
				'<td>'+resJB+'</td>'+
			'</tr>';

		});

		$('#eva_solu1').html(html);

	}).fail(function( jqxhr, textStatus, error ) {
		
		var err = textStatus + ', ' + error;
		console.log( "Request Failed: " + err);
	
	});
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

//-------------------------------------------------------------------------------------
//CARGA NOMBRE DE DEPARTAMENTO POR CODIGO
function get_Depa(code){

	$.ajax({
		url: urlRoot('index.php')+'/convocatoria/registro/get_ajax_dptobyCode/',
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

//CARGA NOMBRE DE PROVINCIA POR CODIGOS
function get_Prov(depa,prov){

	$.ajax({
		url: urlRoot('index.php')+'/convocatoria/registro/get_ajax_provsbyCode/',
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

//CARGA NOMBRE DE DISTRITO POR CODIGOS
function get_Dist(depa,prov,dist){

	$.ajax({
		url: urlRoot('index.php')+'/convocatoria/registro/get_ajax_distbyCode/',
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