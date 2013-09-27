//==============================CAPITULO 6=================================

/*function get_TotalEdif(cod_local){
	$.post('visor/p5/Find_Total_Edif/', {cod_local:cod_local}, function(data) {

				$.each(data, function(index, val) {

					 $('.P5_TOT_E').val(val.P5_TOT_E);

				});
	});
}*/

function Get_Cap06(cod_local,predio){
	$.post('visor/p6_n/Find_Cap06_pag/', {cod_local:cod_local, cod_predio:predio}, function(data) {

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

	$.getJSON('visor/P5/Data/?token='+token+'&id_local='+cod_local+'', function(data) {
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

	$.getJSON('visor/P6N/Data/?token='+token+'&id_local='+cod_local+'', function(data) {

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

// devuelve la edificacion filtrado por numero de edificacion
function Get_Edif_Cap06(token,cod_local,predio,nro_edif){

	var html="";
	var i=1;

	$.getJSON('visor/P6N/DataNroEdif/?token='+token+'&id_local='+cod_local+'&PC_F_1='+predio+'&NRO_ED='+nro_edif+'', function(data) {


				$.each(data, function(index, val) {
					i++;
		  	    	html+='<table class="table table-bordered">'+
		  	    			'<tbody>'+
			  	    			'<tr>'+
				  	    			'<td><strong>2.</strong></td>'+
				  	    			'<td><strong>Código de la edificación </strong></td>'+
				  	    			'<td>'+
				  	    				'<input style="width:100px;" type="text" class="form-control Nro_Ed">'+
				  	    			'</td>'+
				  	    			//'<td style="text-align:center">'+val.Nro_Ed+'</td>'+
			  	    			'</tr>'+
			  	    			'<tr>'+
			  	    				'<td><strong>3.</strong></td>'+
			  	    				'<td><strong>Area techada del primer piso de la edificación </strong></td>'+
				  	    			'<td>'+
				  	    				'<input style="width:100px;" type="text" class="form-control P6_1_3">'+
				  	    			'</td>'+
				  	    		'</tr>'+
				  	    		'<tr>'+
			  	    				'<td><strong>4.</strong></td>'+
			  	    				'<td><strong>Predio en el que se ubica la edificación </strong></td>'+
				  	    			'<td>'+
				  	    				'<input style="width:100px;" type="text" class="form-control P6_1_4">'+
				  	    			'</td>'+
				  	    		'</tr>'+
				  	    		'<tr>'+
			  	    				'<td><strong>5.</strong></td>'+
			  	    				'<td><strong>Esta edificación es parte del patrimonio cultural inmueble reconocido por el ministerio de cultura? </strong></td>'+
				  	    			'<td>'+
				  	    				'<input style="width:100px;" type="text" class="form-control P6_1_5">'+
				  	    			'</td>'+
				  	    		'</tr>'+
				  	    		'<tr>'+
			  	    				'<td><strong>6.</strong></td>'+
			  	    				'<td><strong>¿La edificación  fue inspeccionada por defensa civil? </strong></td>'+
				  	    			'<td>'+
				  	    				'<input style="width:100px;" type="text" class="form-control P6_1_6">'+
				  	    			'</td>'+
				  	    		'</tr>'+
				  	    		'<tr>'+
			  	    				'<td><strong>7.</strong></td>'+
			  	    				'<td><strong>¿La edificación  se encuentra declarada inhabitable (alto riesgo) ? </strong></td>'+
				  	    			'<td>'+
				  	    				'<input style="width:100px;" type="text" class="form-control P6_1_7">'+
				  	    			'</td>'+
				  	    		'</tr>'+
				  	    		'<tr>'+
			  	    				'<td><strong>8.</strong></td>'+
			  	    				'<td><strong>Nro de pisos de esta edificación </strong></td>'+
				  	    			'<td>'+
				  	    				'<input style="width:100px;" type="text" class="form-control P6_1_8">'+
				  	    			'</td>'+
				  	    		'</tr>'+
		  	    			'</tbody></table>';
					});
				alert(html);
				$('#seccion_a').html(html);
	});
}







//=========================================================================
function get_Edificacion(cod_local){
	$.post('visor/p6_n/Find_All_by_local/', {cod_local:cod_local}, function(data) {

				var html="";
				var i=1;

				$.each(data, function(index, val) {

					html+='<table class="table table-bordered"> <thead>'+
		  	    				'<tr>'+
			  	    				'<th colspan="3">Sección A: Identificación de las edificaciones</th>'+
		  	    				'</tr>'+
		  	    		    '</thead>'+
		  	    			'<tbody>'+
		  	    				'<tr>'+
		  	    					'<td>'+i+'.</td>'+
		  	    					'<td>'+
		  	    						'<strong>'+
		  	    							'Código de la edificación'+
		  	    						'</strong>'+
		  	    					'</td>'+
		  	    					'<td>'+
		  	    						'<span style="float:left;padding:8px;margin-right:10px; font-size:16px;" class="label label-default">E</span>'+
		  	    						'<input style="width:100px;float:left;" type="text" class="form-control">'+
		  	    					'<td>'+
		  	    				'</tr>'+
		  	    				'<tr>'+
		  	    					'<td>'+i+'.</td>'+
		  	    					'<td>'+
		  	    						'<strong>'+
		  	    							'Area techada del primer piso de la edificación'+
		  	    						'</strong>'+
		  	    					'</td>'+
		  	    					'<td>'+
		  	    						'Area en m2'+
		  	    					'</td>'+
		  	    					'<table class="table table-bordered">'+
		  	    						'<thead>'+
		  	    							'<tr>'+
		  	    								'<th style="text-align:center">Enteros</th>'+
		  	    								'<th style="text-align:center">Decimales</th>'+
		  	    							'</tr>'+
		  	    						'</thead>'+
		  	    						'<tbody>'+
		  	    							'<tr>'+
		  	    								'<td> </td>'+
		  	    								'<td> </td>'+
		  	    							'</tr>'+
		  	    						'</tbody>'+
		  	    					'</table>'+
		  	    					'</td>'+
		  	    				'</tr>'+
		  	    	'</tbody></table>';
				});

				$('#seccion_a').html(html);
	});
}

//==============================FINCAPITULO 6=================================


//==============================CAPITULO 7=================================

//==============================FINCAPITULO 7=================================


//==============================CAPITULO 8=================================

//==============================FINCAPITULO 8=================================