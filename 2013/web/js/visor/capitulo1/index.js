$(document).ready(function(){

	$('#ie_educa').hide();
	$('#table_predios').hide();

	P1A();
	
	lista_ie();

	lista_Predios();

	lista_Anexos();
	
	$('input,textarea').attr({
		disabled : true,
	});
	
	$('#ie-panel').on('click','.combo_ins',function(event){

		P1A2N($(this).attr('id'));

		$('.combo_ins').removeClass('active');
		$(this).addClass('active');

	});

	$('#list-predio').on('click','.combo_predio',function(event){
	
		$('.combo_pred').removeClass('active');
		$(this).addClass('active');

		get_P1B2AN();
		get_P1B();
	
		get_P1B3N($(this).attr('id'));
		get_P1B312N($(this).attr('id'));

	});

	$('#list-anexo').on('click','.combo_anexo',function(event){

		$('.combo_anexo').removeClass('active');
		$(this).addClass('active');

			p=$(this).attr('id').split('-');

		P1C(p[0],p[1],p[2]);
	    P1C20N(p[0],p[1],p[2]);
	    Anexos_Datos(p[0],p[1],p[2])


	});

});


function P1A(){

	$.getJSON(urlRoot('index.php')+'/visor/p1a/Data/', {token: getToken(),id_local: getLocal(), predio: getPredio()}, function(data, textStatus) {
		
		$.each(data, function(index, val) {

			$('#nie2').val(leftceros(val.P1_A_1_Cant_IE));

		});


	}).fail(function( jqxhr, textStatus, error ) {
	
		var err = textStatus + ', ' + error;
		console.log( "Request Failed: " + err);
	
	});

}

function lista_ie(){

	$.getJSON(urlRoot('index.php')+'/visor/procedure/Lista_IE/', {token: getToken(),id_local: getLocal(), predio: getPredio()}, function(data, textStatus) {
	
		var html="";
		var ie="";
		var i=0;
		var first="";

		var combo='<div class="btn-group">'+
						'<a class="btn dropdown-toggle" data-toggle="dropdown" id="combo_ie" href="#">'+
							'Seleccione una Institución Educativa '+
							'<span class="caret"></span>'+
						'</a>'+
						'<ul class="dropdown-menu">';

		$.each(data, function(index, val) {
			i++;
			if(i==1){
				P1A2N(val.P1_A_2_NroIE);
				cl="active";
			}else{
				cl="";
			}
				
			combo+='<li class="combo_ins '+cl+'" id="'+val.P1_A_2_NroIE+'">'+
						'<a href="" data-toggle="dropdown">I.E. N° '+val.P1_A_2_NroIE+' - '+val.P1_A_2_1_NomIE+'</a>'+
					'</li>';

		});

		combo+='</ul>'+
				'</div>';

		if(i==1){
			 $("#ie-panel-bg").hide();
		}

		$("#ie-panel").html(combo);
		
		if(i==0){
			$('#combo_ie').html('No Existen Instituciones Educativas en el Predio '+getPredio());
			$('#panel-list-ie').hide();
		}
	});

}

function P1A2N(ie){

	$.getJSON(urlRoot('index.php')+'/visor/p1a2n/Data/format/json/', {token: getToken(), id_local: getLocal(), predio: getPredio(), nroie: ie}, function(data, textStatus) {

		$('#ie_educa').show();
		
		$.each(data, function(index, val) {

			$("#P1_A_2_NroIE").val(leftceros(val.P1_A_2_NroIE));
			$("#P1_A_2_1_NomIE").val(val.P1_A_2_1_NomIE);
			$("#P1_A_2_2_Direc").val(val.P1_A_2_2_Direc);
			$("#P1_A_2_3_DocNro").val(val.P1_A_2_3_DocNro);
			$("#P1_A_2_3_DocNro").val(val.P1_A_2_3_DocNro);
			$("#P1_A_2_4_TelfIE").val(val.P1_A_2_4_TelfIE);
			$("#P1_A_2_4_TelfDir").val(val.P1_A_2_4_TelfDir);
			$("#P1_A_2_5_EmailIE").val(val.P1_A_2_5_EmailIE);
			$("#P1_A_2_5_EmailDir").val(val.P1_A_2_5_EmailDir);
			$("#P1_A_2_6_Informant").val(val.P1_A_2_6_Informant);
			$("#P1_A_2_7_InformantCarg").val(val.P1_A_2_7_InformantCarg);
			$("#P1_A_2_8_Can_CMod_IE").val(leftceros(val.P1_A_2_8_Can_CMod_IE));
			$("#P1_A_2_Obs").val(val.P1_A_2_Obs);
			get_P1_A_2_8N(getLocal(),getPredio(),val.P1_A_2_NroIE);

		});
		

		

	}).fail(function( jqxhr, textStatus, error ) {
	
		var err = textStatus + ', ' + error;
		console.log( "Request Failed: " + err);
	
	});
			
}

function get_P1_A_2_8N(cod_local,predio,nroie){

	$.getJSON(urlRoot('index.php')+'/visor/p1a28n/Tabla/', {token: getToken(), id_local: getLocal(), predio: getPredio(), nroie: nroie}, function(data, textStatus) {

		var html="";

		$.each(data, function(index, val) {

			html+='<tr>'+
				'<td style="text-align:center;" class="P1_A_2_9_NroCMod">'+val.P1_A_2_9_NroCMod+'</td>'+
				'<td>'+val.P1_A_2_9A_CMod+'</td>'+
				'<td>'+val.P1_A_2_9B_CodLocal+'</td>'+
				'<td>'+val.P1_A_2_9C_Nivel+'</td>'+
				'<td>'+val.P1_A_2_9D_Car+'</td>'+
				'<td>'+leftceros(val.P1_A_2_9E_NroAnex)+'</td>'+
				'<td>'+leftceros(val.P1_A_2_9F_CantAnex)+'</td>'+
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
							'<td>'+leftceros(val.P1_A_2_9_AnexNro)+'</td>'+
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


		$('#table_ies').html(html);
											
	});

}

function lista_Predios(){

	$.getJSON(urlRoot('index.php')+'/visor/procedure/Lista_Predio/', {token: getToken(),id_local: getLocal(), predio: getPredio()}, function(data, textStatus) {
	
		var html="";
		var ie="";
		var i=0;
		var first="";

		var combo='<div class="btn-group">'+
						'<a class="btn dropdown-toggle" data-toggle="dropdown" id="combo_predio" href="#">'+
							'Seleccione un Predio '+
							'<span class="caret"></span>'+
						'</a>'+
						'<ul class="dropdown-menu">';

		$.each(data, function(index, val) {
			i++;
			if(i==1){
				
			get_P1B2AN();
			get_P1B();
			get_P1B3N(1);
			get_P1B312N(1);

				cl="active";
			}else{
				cl="";
			}

			if(val.Nro_Pred==1){
				tipo="Predio Principal";
			}else{
				tipo=tipoPredio(val.Colindante);
			}

			if(val.Inmueble_Cod==null || val.Inmueble_Cod==undefined || val.Inmueble_Cod==''){
				inmueble=inmueble_Predio(val.Inmueble_Tip);
			}else{
				inmueble=val.Inmueble_Cod;
			}
				
			combo+='<li class="combo_pred '+cl+'" id="'+val.Nro_Pred+'">'+
							'<a href="" data-toggle="dropdown">Predio N° '+val.Nro_Pred+' ('+tipo+') - Inmueble: '+inmueble+'</a>'+
						'</li>';

		});

		combo+='</ul>'+
				'</div>';

		if(i==1){
			 $("#panel-predio").hide();
		}

		$("#list-predio").html(combo);
		
		if(i==0){
			$('#combo_predio').html('No Existen Predios');
			$('#panel-list-predio').hide();
		}
	});

}

function get_P1B(){

	$.getJSON(urlRoot('index.php')+'/visor/p1b/Data/', {token: getToken(),id_local: getLocal(), predio: getPredio()}, function(data, textStatus) {
		
		$('#table_predios').show();

		$.each(data, function(index, val) {

			$("#P1_B_1_TPred").val(leftceros(val.P1_B_1_TPred));
			check_Radio(val.P1_B_2_PredCol,"P1_B_2_PredCol");

		});

	});


}

function get_P1B2AN(){
	$.getJSON(urlRoot('index.php')+'/visor/p1b2an/Data/', {token: getToken(),id_local: getLocal(), predio: getPredio()}, function(data, textStatus) {

		var p="";
		var c=0;

		$.each(data, function(index, val) {
			
			if(val.P1_B_2A_PredNoCol==1){
				c++;if(c>1){p+=" - ";};p+=val.Nro_Pred;
			}
			
			$('#predios_no_colindantes').val(p);

		});

	});
}

function get_P1B3N(predio){

	$.getJSON(urlRoot('index.php')+'/visor/p1b3n/Data/', {token: getToken(),id_local: getLocal(), predio: predio}, function(data, textStatus) {
		
		$.each(data, function(index, val) {

			$("#Nro_Pred").val(leftceros(val.Nro_Pred));
			$("#P1_B_3_InmCod").val(val.P1_B_3_InmCod);

			check_Radio(val.P1_B_3_InmTip,"P1_B_3_InmTip");
			
			check_Radio(val.P1_B_3_1_Prop,"P1_B_3_1_Prop");
			
			if(val.P1_B_3_1_Prop==4){
				$("#P1_B_3_1_Prop_O1").val(val.P1_B_3_1_Prop_O);
			}else if(val.P1_B_3_1_Prop==5){
				$("#P1_B_3_1_Prop_O2").val(val.P1_B_3_1_Prop_O);
			}
			
			check_Radio(val.P1_B_3_2_AntReg_Cod,"P1_B_3_2_AntReg_Cod");//
			
			$("#P1_B_3_3_AntReg_Nro").val(val.P1_B_3_3_AntReg_Nro);
			
			check_Radio(val.P1_B_3_4_Tipo_TProp,"P1_B_3_4_Tipo_TProp");

			if(val.P1_B_3_4_Tipo_TProp==9){
				$("#P1_B_3_4_Tipo_TProp_O").val(val.P1_B_3_4_Tipo_TProp_O);
			}

			$("#P1_B_3_5_FecTit").val(val.P1_B_3_5_FecTit);
			
			check_Radio(val.P1_B_3_6_DocPos,"P1_B_3_6_DocPos");

			if(val.P1_B_3_6_DocPos==9){
				$("#P1_B_3_6_DocPos_O").val(val.P1_B_3_6_DocPos_O);
			}
			
			$("#P1_B_3_7_DocPos_Fech").val(val.P1_B_3_7_DocPos_Fech);
			
			decimal1=val.P1_B_3_8_At_Pred.split('.');

			$("#P1_B_3_8_At_Pred1").html(decimal1[0]); 
			$("#P1_B_3_8_At_Pred2").html(decimal1[1]);

			decimal2=val.P1_B_3_8_At_Pred.split('.');

			$("#P1_B_3_9_At_Local1").html(decimal2[0]); 
			$("#P1_B_3_9_At_Local2").html(decimal2[1]);

			check_Radio(val.P1_B_3_10_Comp,"P1_B_3_10_Comp");
			
			$("#P1_B_3_11_CompCan").val(leftceros(val.P1_B_3_11_CompCan));
			$("#P1_B_3_Obs").val(val.P1_B_3_Obs);

		});

	});

}


function get_P1B312N(predio){

	$.getJSON(urlRoot('index.php')+'/visor/p1b312n/Data/', {token: getToken(),id_local: getLocal(), predio: predio}, function(data, textStatus) {
		
		var c=0;
		var p="";

		$.each(data, function(index, val) {
				c++;
				if(c>1){p+=" - ";};
				p+=val.P1_B_3_12_NombComp;
			
			$('#P1_B_3_12_NombComp').val(p);
		})

	});

}

function lista_Anexos(){

	$.getJSON(urlRoot('index.php')+'/visor/procedure/Lista_Anexo/', {token: getToken(),id_local: getLocal(), predio: getPredio()}, function(data, textStatus) {
	
		var html="";
		var ie="";
		var i=0;
		var first="";

		var combo='<div class="btn-group">'+
						'<a class="btn dropdown-toggle" data-toggle="dropdown" id="combo_anexo" href="#">'+
							'Seleccione un Anexo '+
							'<span class="caret"></span>'+
						'</a>'+
						'<ul class="dropdown-menu">';

		$.each(data, function(index, val) {
			i++;
			if(i==1){
				P1C(1,1,1);
				P1C20N(1,1,1);
				Anexos_Datos(1,1,1)

				cl="active";
			}else{
				cl="";
			}
				
			combo+='<li class="combo_anexo '+cl+'" id="'+val.IE_Nro+'-'+val.CodigoModular_Nro+'-'+val.Anex_Correl+'">'+
						'<a href="" data-toggle="dropdown">Anexo N° '+val.P1_A_2_9_Nro+' - Codigo Modular: '+val.P1_A_2_9A_CMod+' - '+val.P1_A_2_1_NomIE+'</a>'+
					'</li>';
		
		});

		combo+='</ul>'+
				'</div>';

		if(i==1){
			 $("#panel-anexo").hide();
		}

		$("#list-anexo").html(combo);
		
		if(i==0){
			$('#combo_anexo').html('No Existen Anexos');
			$('#panel-list-anexo').hide();
		}


	});

}

function P1C(nroie,nmodulo,anexo){

	$.getJSON(urlRoot('index.php')+'/visor/p1c/Data/', {token: getToken(),id_local: getLocal(), predio:getPredio(), nmodulo:nmodulo, nroie:nroie, anexo: anexo}, function(data, textStatus) {
		
		$.each(data, function(index, val){

		$("#P1_A_2_9_NroCMod").val(leftceros(val.P1_A_2_9_NroCMod));
		$("#P1_A_2_9_Nro").val(leftceros(val.P1_A_2_9_Nro));
		$("#P1_C_1_CodLoc_Anex").val(val.P1_C_1_CodLoc_Anex)
		
		check_Radio(val.P1_C_6Dir_1_Tvia,"P1_C_6Dir_1_Tvia");
		
		$("#P1_C_6Dir_2_Nomb").html(val.P1_C_6Dir_2_Nomb);
		$("#P1_C_6Dir_3_Nro").html(val.P1_C_6Dir_3_Nro);
		$("#P1_C_6Dir_4_Piso").html(leftceros(val.P1_C_6Dir_4_Piso));
		$("#P1_C_6Dir_5_Mz").html(val.P1_C_6Dir_5_Mz);
		$("#P1_C_6Dir_6_Lt").html(val.P1_C_6Dir_6_Lt);
		$("#P1_C_6Dir_7_Sect").html(val.P1_C_6Dir_7_Sect);
		$("#P1_C_6Dir_8_Zona").html(val.P1_C_6Dir_8_Zona);
		$("#P1_C_6Dir_9_Et").html(val.P1_C_6Dir_9_Et);
		$("#P1_C_6Dir_10_Km").html(val.P1_C_6Dir_10_Km);
		$("#P1_C_7_RefDir").val(val.P1_C_7_RefDir);
		
		$("#P1_C_8_InmCod").val(val.P1_C_8_InmCod);
		
		check_Radio(val.P1_C_8_InmTip,"P1_C_8_InmTip");
				
		check_Radio(val.P1_C_9_Prop,"P1_C_9_Prop");
		
		if(val.P1_C_9_Prop==4){
			$("#P1_C_9_Prop_O1").val(val.P1_C_9_Prop_O);
		}else if(val.P1_C_9_Prop==5){
			$("#P1_C_9_Prop_O2").val(val.P1_C_9_Prop_O);
		}
		
		check_Radio(val.P1_C_10_AntReg_Cod,"P1_C_10_AntReg_Cod");
		
		$("#P1_C_11_AntReg_Nro").val(val.P1_C_11_AntReg_Nro);
		
		check_Radio(val.P1_C_12_Tipo_TProp,"P1_C_12_Tipo_TProp");

		$("#P1_C_12_Tipo_TProp_O").val(val.P1_C_12_Tipo_TProp_O);
				
		$("#P1_C_13_FecTit").val(val.P1_C_13_FecTit);

		check_Radio(val.P1_C_14_DocPos,"P1_C_14_DocPos");

		if(val.P1_C_14_DocPos==9){

			$("#P1_C_14_DocPos_O").val(val.P1_C_14_DocPos_O);
		
		}
		
		$("#P1_C_15_DocPos_Fech").val(val.P1_C_15_DocPos_Fech);

		decimal3=val.P1_C_16_At_Pred.split('.');
		
		$("#P1_C_16_At_Pred1").html(decimal3[0]);
		$("#P1_C_16_At_Pred2").html(decimal3[1]);
		
		decimal4=val.P1_C_17_At_Local.split('.');

		$("#P1_C_17_At_Local1").html(decimal4[0]);
		$("#P1_C_17_At_Local2").html(decimal4[1]);

		check_Radio(val.P1_C_18_Comp,"P1_C_18_Comp");

		$("#P1_C_19_CompCan").val(leftceros(val.P1_C_19_CompCan));
		$("#P1_C_Obs").val(val.P1_C_Obs);
		
		});

	});

	
}

function P1C20N(nroie,nmodulo,anexo){

	$.getJSON(urlRoot('index.php')+'/visor/p1c20n/Data/', {token: getToken(),id_local: getLocal(), predio:getPredio(), nmodulo:nmodulo, nroie:nroie, anexo: anexo}, function(data, textStatus) {
		p="";
		c=0;
		$.each(data, function(index, val) {

			c++;
				if(c>1){p+=" - ";};
				p+=val.P1_C_20_NombComp;
			
			$("#P1_C_20_NombComp").val(p);

		});

	});


}

function Anexos_Datos(nroie,nmodulo,anexo){

	$.getJSON(urlRoot('index.php')+'/visor/procedure/Anexo_Datos/', {token: getToken(),id_local: getLocal(), predio:getPredio(), nmodulo:nmodulo, nroie:nroie, anexo: anexo}, function(data, textStatus) {
		
		$.each(data, function(index, val) {


		$(".provincia").val(val.Provincia);
		$(".distrito").val(val.Distrito);
		$(".PC_A_4_CentroP").val(val.P1_C_4_CCPP);
		$(".PC_A_5_NucleoUrb").val(val.P1_C_5_NucleoUrb);

		});

	});

}


