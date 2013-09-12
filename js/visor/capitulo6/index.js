$(document).ready(function(){

	var token='7959ac60dc22523a9ac306ac6f9308d3d7201c55';
	var predio= $('#PC_F_1').html();
	var cod_local=localE();
	Get_Tot_Edif_Cap05(token,cod_local);
	Get_List_Edif_Cap06(token,cod_local);
	Get_Edif_Cap06(token,cod_local,1,1);
	Get_Edif_Pisos_Cap06(token,cod_local,1,1);

});

function Get_Cap06(cod_local,predio){
	$.post(CI.base_url+'index.php/visor/p6_n/Find_Cap06_pag/', {cod_local:cod_local, cod_predio:predio}, function(data) {

				var html="";
				var i=1;

				$.each(data, function(index, val) {
					html+='<table class="table table-hover" style="width:900px; height:150px; overflow:auto;"> '+
		  	    			'<tbody>'+
		  	    				'<tr>'+
		  	    					'<td>'+ i +'.</td>'+
		  	    					'<td>'+ val.P6_1N_2_Cod_E +'</td>'+
		  	    					'<td>'+ val.P6_1N_3 +'</td>'+
		  	    					'<td>'+ val.P6_1N_4 +'</td>'+
		  	    				'</tr>'+
		  	    			'</tbody></table>';
		  	    	i++;
				});
				$('#pag_seccion_a').html(html);
	});
}

// vevuelve total de edificaciones del capitulo 5
function Get_Tot_Edif_Cap05(token,cod_local){

	$.getJSON(CI.base_url+'index.php/visor/P5/Data/?token='+token+'&id_local='+cod_local+'', function(data) {
				var html="";
				var i=1;
				$.each(data, function(index, val) {

					 $('.P5_TOT_E').val(val.P5_Tot_E);
				});
	});
}

//devuelve el listado de eficiaciones

function Get_List_Edif_Cap06(token,cod_local){

	var html="";
	var i=1;

	$.getJSON(CI.base_url+'index.php/visor/P6N/Data/?token='+token+'&id_local='+cod_local+'', function(data) {

				$.each(data, function(index, val) {

		  	    	html+='<tr>'+
		  	    					'<td style="text-align:center"> Edificación Nro. '+val.Nro_Ed+'.</td>'+
		  	    					'<td style="text-align:center">'+val.P6_1_3+'.</td>'+
		  	    					'<td style="text-align:center">'+val.P6_1_4+'.</td>'+
		  	    				'</tr>';
				});

				$('#seccion_m').html(html);
	});
}

function Get_Edif_Pisos_Cap06(token,cod_local,predio,nro_edif){

	var html="";
	var i=1;

	$.getJSON(CI.base_url+'index.php/visor/P618N/Data/?token='+token+'&id_local='+cod_local+'&PC_F_1='+predio+'&Nro_Ed='+nro_edif+'', function(data) {

				$.each(data, function(index, val){
					i++;

				});
	});
}


function check_Radio(value,id){

    if(value!=null){

       document.getElementById(id+value).checked=true;

    }
}

function check_Radio2(value){

    if(value!=null){

       document.getElementById(value).checked=true;

    }
}

function check_Radio3(arrayvalue){
	if(arrayvalue!=null){
	    for (var i in arrayvalue) {

	    	document.getElementById(arrayvalue[i]).checked=true;
	    }
    }
}

function check_Radio4(arrayvalue){
	if(arrayvalue!=null){
	    for (var i in arrayvalue) {

	    	document.getElementById(arrayvalue[i]).checked=true;
	    }
    }
}

//
// devuelve la edificacion filtrado por numero de edificacion
function Get_Edif_Cap06(token,cod_local,predio,nro_edif){

	var html="";
	var i=0;

	var numero_pisos = {
			  0: '8A',
			  1: '8B',
			  2: '8C',
			  3: '8D',
			  4: '8E',
			  5: '8F',
			  6: '8G',
			  7: '8H',
			  8: '8I',
			  9: '8J'
			};
	var nombre_pisos = {
			  0: ' El primer ',
			  1: ' El segundo ',
			  2: ' El tercer ',
			  3: ' El cuarto ',
			  4: ' El quinto ',
			  5: ' El sexto ',
			  6: ' El séptimo ',
			  7: ' El octavo ',
			  8: ' El noveno ',
			  9:' El décimo '
			};

	var x=0;
	var arraychecked;
	var arraycheckpisos=[];

	$.getJSON(CI.base_url+'index.php/visor/P6N/DataNroEdif/?token='+token+'&id_local='+cod_local+'&PC_F_1='+predio+'&NRO_ED='+nro_edif+'', function(data) {


				$.each(data, function(index, val) {
					arraychecked= {
									  0: 'P6_1_5'+val.P6_1_5,
									  1: 'P6_1_6'+val.P6_1_6,
									  2: 'P6_1_7'+val.P6_1_7
									};
					i++;
		  	    	html+='<table class="table table-bordered">'+
		  	    			'<tbody>'+
			  	    			'<tr>'+
				  	    			'<td><strong>2.</strong></td>'+
				  	    			'<td><strong>Código de la edificación </strong></td>'+
				  	    			'<td>'+
				  	    				'<input style="width:100px;" type="text" class="form-control Nro_Ed"  value="'+val.Nro_Ed+'">'+
				  	    			'</td>'+
			  	    			'</tr>'+
			  	    			'<tr>'+
			  	    				'<td><strong>3.</strong></td>'+
			  	    				'<td><strong>Area techada del primer piso de la edificación </strong></td>'+
				  	    			'<td>'+
				  	    					'<label>Área en m2</label>'+
											'<table class="table table-bordered">'+
												'<tr>'+
												'</tr>'+
												'<tr>'+
													'<th style="text-align:center;">Enteros</th>'+
													'<th style="text-align:center;">Decimales</th>'+
												'</tr>'+
												'<tr>'+
													'<td> <input style="width:100px;" type="text" class="form-control P6_1_3" value="'+val.P6_1_3+'"> </td>'+
													'<td> <input style="width:100px;" type="text" class="form-control P6_1_3_D" value="'+val.P6_1_3+'"> </td>'+
												'</tr>'+
											'</table>'+
				  	    			'</td>'+
				  	    		'</tr>'+
				  	    		'<tr>'+
			  	    				'<td><strong>4.</strong></td>'+
			  	    				'<td><strong>Predio en el que se ubica la edificación </strong></td>'+
				  	    			'<td>'+
				  	    				'<label>Predio N° </label>'+
				  	    				'<input style="width:100px;" type="text" class="form-control P6_1_4" value="'+val.P6_1_4+'">'+
				  	    			'</td>'+
				  	    		'</tr>'+
				  	    		'<tr>'+
			  	    				'<td><strong>5.</strong></td>'+
			  	    				'<td><strong>Esta edificación es parte del patrimonio cultural inmueble reconocido por el ministerio de cultura? </strong></td>'+
				  	    			'<td>'+
				  	    				'<input style="width:100px;" type="text" class="form-control P6_1_5" value="'+val.P6_1_5+'">'+
				  	    					'<label class="checkbox-inline">'+
												'<input type="radio" id="P6_1_51" name="P6_1_5" value="option1" > 1. Si'+
											'</label>'+
											'<label class="checkbox-inline">'+
												'<input type="radio" id="P6_1_52" name="P6_1_5" value="option2" > 2. No'+
											'</label>'+
				  	    			'</td>'+
				  	    		'</tr>'+
				  	    		'<tr>'+
			  	    				'<td><strong>6.</strong></td>'+
			  	    				'<td><strong>¿La edificación  fue inspeccionada por defensa civil? </strong></td>'+
				  	    			'<td>'+
				  	    				'<input style="width:100px;" type="text" class="form-control P6_1_6" value="'+val.P6_1_6+'">'+
				  	    					'<label class="checkbox-inline">'+
												'<input type="radio" id="P6_1_61" name="P6_1_6" value="option1" checked> 1. Si'+
											'</label>'+
											'<label class="checkbox-inline">'+
												'<input type="radio" id="P6_1_62" name="P6_1_6" value="option2" > 2. No'+
											'</label>'+
				  	    			'</td>'+
				  	    		'</tr>'+
				  	    		'<tr>'+
			  	    				'<td><strong>7.</strong></td>'+
			  	    				'<td><strong>¿La edificación  se encuentra declarada inhabitable (alto riesgo) ? </strong></td>'+
				  	    			'<td>'+
				  	    				'<input style="width:100px;" type="text" class="form-control P6_1_7" value="'+val.P6_1_7+'">'+
				  	    				'<label class="checkbox-inline">'+
												'<input type="radio" id="P6_1_71" name="P6_1_7" value="option1" checked> 1. Si'+
											'</label>'+
											'<label class="checkbox-inline">'+
												'<input type="radio" id="P6_1_72" name="P6_1_7" value="option2" > 2. No'+
										'</label>'+
				  	    			'</td>'+
				  	    		'</tr>'+
				  	    		'<tr>'+
			  	    				'<td><strong>8.</strong></td>'+
			  	    				'<td><strong>Nro de pisos de esta edificación </strong></td>'+
				  	    			'<td>'+
				  	    				'<input style="width:100px;" type="text" class="form-control P6_1_8" value="'+val.P6_1_8+'">'+
				  	    			'</td>'+
				  	    		'</tr>';
			  	    			$.getJSON(CI.base_url+'index.php/visor/P618N/Data/?token='+token+'&id_local='+cod_local+'&PC_F_1='+predio+'&Nro_Ed='+nro_edif+'', function(data) {

											$.each(data, function(index, val){

													arraycheckpisos[x]='P6_1_8_Accesibilidad'+numero_pisos[x]+val.P6_1_8_Accesibilidad;
													html+='<tr>'+
				  	    									'<td><strong>'+numero_pisos[x]+'.</strong></td>'+
									  	    				'<td><strong>'+nombre_pisos[x]+'Nro de pisos de esta edificación </strong></td>'+

										  	    			'<td>'+
										  	    					'<label class="checkbox-inline">'+
																		'<input type="radio" id="P6_1_8_Accesibilidad'+numero_pisos[x]+'1" name="check'+numero_pisos[x]+'" value="option1" > 1. Si'+
																	'</label>'+
																	'<label class="checkbox-inline">'+
																		'<input type="radio" id="P6_1_8_Accesibilidad'+numero_pisos[x]+'2" name="check'+numero_pisos[x]+'" value="option2" > 2. No'+
																	'</label>'+
															'</td>'+
										  	    		'</tr>'+
										  	    		x++;
											});
									html+='<tr>'+
						  	    				'<td><strong>9.</strong></td>'+
						  	    				'<td><strong>¿ Cuántos  niveles o modalidades hacen uso de esta edificación? </strong></td>'+
							  	    			'<td>'+
							  	    				'<input style="width:100px;" type="text" class="form-control P6_1_8" value="'+val.P6_1_9+'">'+
							  	    			'</td>'+
				  	    				  '</tr>';


								});
								$.getJSON(CI.base_url+'index.php/visor/P6110N/Data/?token='+token+'&id_local='+cod_local+'&PC_F_1='+predio+'&Nro_Ed='+nro_edif+'', function(data) {

											$.each(data, function(index, val){

												check_Radio(val.P6_1_10_e,'P6_1_10_e');
											});
								});
					});
				$('#seccion_a').html(html);
				check_Radio3(arraychecked);
				check_Radio4(arraycheckpisos);
	});
}

//==============================FINCAPITULO 6=================================