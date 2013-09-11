$(document).ready(function(){

	//alert(localE());

	var token='7959ac60dc22523a9ac306ac6f9308d3d7201c55';
	var predio= $('#PC_F_1').html();
	var cod_local=localE();
			//get_TotalEdif(code);
			//get_Edificacion(code);
			//Get_Cap06(code,predio);
			//token,cod_local,predio,nro_edif
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
				alert(html);
				$('#seccion_m').html(html);
	});
}

function Get_Edif_Pisos_Cap06(token,cod_local,predio,nro_edif){

	var html="";
	var i=1;

	$.getJSON(CI.base_url+'index.php/visor/P618N/Data/?token='+token+'&id_local='+cod_local+'&PC_F_1='+predio+'&Nro_Ed='+nro_edif+'', function(data) {

				$.each(data, function(index, val){
					i++;
		  	    	alert(i);
				});
	});
}

//
// devuelve la edificacion filtrado por numero de edificacion
function Get_Edif_Cap06(token,cod_local,predio,nro_edif){

	var html="";
	var i=1;

	$.getJSON(CI.base_url+'index.php/visor/P6N/DataNroEdif/?token='+token+'&id_local='+cod_local+'&PC_F_1='+predio+'&NRO_ED='+nro_edif+'', function(data) {


				$.each(data, function(index, val) {

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
												'<input type="radio" id="P6_1_51" name="check" value="option1" checked > 1. Si'+
											'</label>'+
											'<label class="checkbox-inline">'+
												'<input type="radio" id="P6_1_52" name="check" value="option2" > 2. No'+
											'</label>'+
				  	    			'</td>'+
				  	    		'</tr>'+
				  	    		'<tr>'+
			  	    				'<td><strong>6.</strong></td>'+
			  	    				'<td><strong>¿La edificación  fue inspeccionada por defensa civil? </strong></td>'+
				  	    			'<td>'+
				  	    				'<input style="width:100px;" type="text" class="form-control P6_1_6" value="'+val.P6_1_6+'">'+
				  	    					'<label class="checkbox-inline">'+
												'<input type="radio" id="P6_1_61" name="check" value="option1" checked> 1. Si'+
											'</label>'+
											'<label class="checkbox-inline">'+
												'<input type="radio" id="P6_1_62" name="check" value="option2" > 2. No'+
											'</label>'+
				  	    			'</td>'+
				  	    		'</tr>'+
				  	    		'<tr>'+
			  	    				'<td><strong>7.</strong></td>'+
			  	    				'<td><strong>¿La edificación  se encuentra declarada inhabitable (alto riesgo) ? </strong></td>'+
				  	    			'<td>'+
				  	    				'<input style="width:100px;" type="text" class="form-control P6_1_7" value="'+val.P6_1_7+'">'+
				  	    				'<label class="checkbox-inline">'+
												'<input type="radio" id="P6_1_61" name="check" value="option1" checked> 1. Si'+
											'</label>'+
											'<label class="checkbox-inline">'+
												'<input type="radio" id="P6_1_62" name="check" value="option2" > 2. No'+
										'</label>'+
				  	    			'</td>'+
				  	    		'</tr>'+
				  	    		'<tr>'+
			  	    				'<td><strong>8.</strong></td>'+
			  	    				'<td><strong>Nro de pisos de esta edificación </strong></td>'+
				  	    			'<td>'+
				  	    				'<input style="width:100px;" type="text" class="form-control P6_1_8" value="'+val.P6_1_8+'">'+
				  	    			'</td>'+
				  	    		'</tr>'+
		  	    			'</tbody></table>';
					});
				alert(html);
				check_Radio();
				$('#seccion_a').html(html);
	});
}

//==============================FINCAPITULO 6=================================