//CIE01B



//==============================CAPITULO 6=================================
function get_TotalEdif(cod_local){
	$.post('visor/p5/Find_Total_Edif/', {cod_local:cod_local}, function(data) {

				$.each(data, function(index, val) {

					 $('.P5_TOT_E').val(val.P5_TOT_E);

				});
	});
}

function Get_Cap06(cod_local,predio){
	$.post('visor/p6_n/Find_Cap06_pag/', {cod_local:cod_local, cod_predio:predio}, function(data) {
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
		  	    							'miguel'+
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
		  	    				'</tr>'+
		  	    			'</tbody></table>';
				});
	});
	$('#pag_seccion_a').html(html);
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