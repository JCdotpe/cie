$(document).ready(function(){

	var token='7959ac60dc22523a9ac306ac6f9308d3d7201c55';
	var predio= $('#Nro_Pred').html();
	var cod_local=localE();
	Get_Tot_Edif_Cap05(token,cod_local);
	Get_List_Edif_Cap06(token,cod_local);
	Get_Edif_Cap06(token,cod_local,1,1);
	Get_Edif_Pisos_Cap06(token,cod_local,1,1);
	Get_Edif_Pisos_Ambiente(token,cod_local,1,1,1);

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

	$.getJSON(CI.base_url+'index.php/visor/P61/Data/?token='+token+'&id_local='+cod_local+'', function(data) {

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

// devuelve los ambientes y pisos
function Get_Edif_Pisos_Cap06(token,cod_local,predio,nro_edif){

	var html="";
	var i=1;

	$.getJSON(CI.base_url+'index.php/visor/P62/Data/?token='+token+'&id_local='+cod_local+'&Nro_Pred='+predio+'&P5_Ed_Nro='+nro_edif+'', function(data) {

				$.each(data, function(index, val){
					html+='<tr>'+
		  	    					'<td style="text-align:center"> Ambiente N° : '+val.P6_2_1+'.</td>'+
		  	    					'<td style="text-align:center">Piso :'+val.P5_NroPiso+'.</td>'+
		  	    				'</tr>';

				});
				$('#seccion_b').html(html);
	});
}

// devuelve los ambientes y pisos
function Get_Edif_Pisos_Ambiente(token,cod_local,predio,nro_edif,nro_ambiente){

	var html="";
	var i=1;
	var radiop15="";
	var radiop15a="";
	var arraychecked16="";

	$.getJSON(CI.base_url+'index.php/visor/P62/DataAmbiente/?token='+token+'&id_local='+cod_local+'&Nro_Pred='+predio+'&P5_Ed_Nro='+nro_edif+'&P6_2_1='+nro_ambiente+'', function(data) {

				$.each(data, function(index, val){
					$("#P6_2_1").val(val.P6_2_1);
					$("#P5_NroPiso").val(val.P5_NroPiso);
					check_Radio(val.P6_2_3,'P6_2_3');
					//console.log(val.P6_2_4ID);
					$.each(val.P6_2_4ID, function(index, val){
						check_Radio(val.P6_2_4Turno_M,val.P6_2_4Mod+'P6_2_4Turno_M');
						check_Radio(val.P6_2_4Turno_T,val.P6_2_4Mod+'P6_2_4Turno_T');
						check_Radio(val.P6_2_4Turno_N,val.P6_2_4Mod+'P6_2_4Turno_N');
						i++;
					});
					check_Radio(val.P6_2_5,'P6_2_5');
					switch(val.P6_2_5){
						case 1 :
							radiop15=val.P6_2_15;
							radiop15a=val.P6_2_15a;
							html+='<table class="table table-bordered">'+
		  	    				'<thead>'+
		  	    					'<tr>'+
		  	    						'<th style="text-align:center;" colspan="3">Evaluación del estado de conservación:</th>'+
		  	    					'</tr>'+
		  	    				'</thead>'+
		  	    				'<tbody>'+
		  	    					'<tr>'+
		  	    						'<td>15.</td>'+
		  	    						'<td>'+
		  	    							'<strong>'+
		  	    								'Material predominante del piso'+
		  	    							'</strong>'+
		  	    						'</td>'+
		  	    						'<td>'+
			  	    						'<table class="table table-bordered">'+
			  	    							'<thead>'+
			  	    								'<tr>'+
			  	    									'<td rowspan="2" style="text-align:center;">Material predominante en los pisos</td>'+
				  	    								'<td colspan="3" style="text-align:center;">15A. Estado de conservación</td>'+
			  	    								'</tr>'+
			  	    								'<tr>'+
			  	    									'<td style="text-align:center;">Bueno</td>'+
				  	    								'<td style="text-align:center;">Regular</td>'+
				  	    								'<td style="text-align:center;">Malo</td>'+
			  	    								'</tr>'+
			  	    							'</thead>'+
			  	    							'<tbody>'+
			  	    								'<tr>'+
			  	    									'<td>'+
				  	    									'1. Parquet o madera pulida'+
				  	    								'</td>'+
				  	    								'<td>'+
				  	    									'<label class="radio">'+
																'<input type="radio" id="1P6_2_15a1" value="option3"> 1'+
															'</label>'+
				  	    								'</td>'+
				  	    								'<td>'+
				  	    									'<label class="radio">'+
																'<input type="radio" id="1P6_2_15a2" value="option3"> 2'+
															'</label>'+
				  	    								'</td>'+
				  	    								'<td>'+
				  	    									'<label class="radio">'+
																'<input type="radio" id="1P6_2_15a3" value="option3"> 3'+
															'</label>'+
				  	    								'</td>'+
			  	    								'</tr>'+
			  	    								'<tr>'+
			  	    									'<td>'+
				  	    									'2. Láminas asfálticas, vinílicos o similares'+
				  	    								'</td>'+
				  	    								'<td>'+
				  	    									'<label class="radio">'+
																'<input type="radio" id="2P6_2_15a1" value="option3"> 1'+
															'</label>'+
				  	    								'</td>'+
				  	    								'<td>'+
				  	    									'<label class="radio">'+
																'<input type="radio" id="2P6_2_15a2" value="option3"> 2'+
															'</label>'+
				  	    								'</td>'+
				  	    								'<td>'+
				  	    									'<label class="radio">'+
																'<input type="radio" id="2P6_2_15a3" value="option3"> 3'+
															'</label>'+
				  	    								'</td>'+
			  	    								'</tr>'+
			  	    								'<tr>'+
			  	    									'<td>'+
				  	    									'3. Losetas, terrazos o similares'+
				  	    								'</td>'+
				  	    								'<td>'+
				  	    									'<label class="radio">'+
																'<input type="radio" id="3P6_2_15a1" value="option3"> 1'+
															'</label>'+
				  	    								'</tTipo de puertad>'+
				  	    								'<td>'+
				  	    									'<label class="radio">'+
																'<input type="radio" id="3P6_2_15a2" value="option3"> 2'+
															'</label>'+
				  	    								'</td>'+
				  	    								'<td>'+
				  	    									'<label class="radio">'+
																'<input type="radio" id="3P6_2_15a3" value="option3"> 3'+
															'</label>'+
				  	    								'</td>'+
			  	    								'</tr>'+
			  	    								'<tr>'+
			  	    									'<td>'+
				  	    									'4. Madera (entablados)'+
				  	    								'</td>'+
				  	    								'<td>'+
				  	    									'<label class="radio">'+
																'<input type="radio" id="4P6_2_15a1" value="option3"> 1'+
															'</label>'+
				  	    								'</td>'+
				  	    								'<td>'+
				  	    									'<label class="radio">'+
																'<input type="radio" id="4P6_2_15a2" value="option3"> 2'+
															'</label>'+
				  	    								'</td>'+
				  	    								'<td>'+
				  	    									'<label class="radio">'+
																'<input type="radio" id="4P6_2_15a3" value="option3"> 3'+
															'</label>'+
				  	    								'</td>'+
			  	    								'</tr>'+
			  	    								'<tr>'+
			  	    									'<td>'+
				  	    									'5. Cemento'+
				  	    								'</td>'+
				  	    								'<td>'+
				  	    									'<label class="radio">'+
																'<input type="radio" id="5P6_2_15a1" value="option3"> 1'+
															'</label>'+
				  	    								'</td>'+
				  	    								'<td>'+
				  	    									'<label class="radio">'+
																'<input type="radio" id="5P6_2_15a2" value="option3"> 2'+
															'</label>'+
				  	    								'</td>'+
				  	    								'<td>'+
				  	    									'<label class="radio">'+
																'<input type="radio" id="5P6_2_15a3" value="option3"> 3'+
															'</label>'+
				  	    								'</td>'+
			  	    								'</tr>'+
			  	    								'<tr>'+
			  	    									'<td>'+
				  	    									'6. Tierra'+
				  	    								'</td>'+
				  	    								'<td>'+
				  	    									'<label class="radio">'+
																'<input type="radio" id="6P6_2_15a1" value="option3"> 1'+
															'</label>'+
				  	    								'</td>'+
				  	    								'<td>'+
				  	    									'<label class="radio">'+
																'<input type="radio" id="6P6_2_15a2" value="option3"> 2'+
															'</label>'+
				  	    								'</td>'+
				  	    								'<td>'+
				  	    									'<label class="radio">'+
																'<input type="radio" id="6P6_2_15a3" value="option3"> 3'+
															'</label>'+
				  	    								'</td>'+
			  	    								'</tr>'+
			  	    								'<tr>'+
			  	    									'<td>'+
				  	    									'<label>'+
				  	    										'7. Otro material'+
				  	    									'</label>'+
				  	    									'<label>'+
																'<input style="float:left; width:300px;" type="text" class="form-control" value="'+val.P6_2_15_O+'">'+
																'(Especifique)'+
															'</label>'+
				  	    								'</td>'+
				  	    								'<td>'+
				  	    									'<label class="radio">'+
																'<input type="radio" id="7P6_2_15a1" value="option3"> 1'+
															'</label>'+
				  	    								'</td>'+
				  	    								'<td>'+
				  	    									'<label class="radio">'+
																'<input type="radio" id="7P6_2_15a2" value="option3"> 2'+
															'</label>'+
				  	    								'</td>'+
				  	    								'<td>'+
				  	    									'<label class="radio">'+
																'<input type="radio" id="7P6_2_15a3" value="option3"> 3'+
															'</label>'+
				  	    								'</td>'+
			  	    								'</tr>'+
			  	    							'</tbody>'+
			  	    						'</table>'+
		  	    						'</td>'+
		  	    					'</tr>'+
		  	    					'<tr>'+
		  	    						'<td>16.</td>'+
		  	    						'<td>'+
		  	    							'<strong>'+
		  	    								'Tipo de puerta'+
		  	    							'</strong>'+
		  	    						'</td>'+
		  	    						'<td>'+
		  	    							'<table class="table table-bordered">'+
			  	    							'<thead>'+
			  	    								'<tr>'+
			  	    									'<td rowspan="2" style="text-align:center;">Tipo de puerta</td>'+
				  	    								'<td colspan="3" style="text-align:center;">16A. Estado de conservación</td>'+
			  	    								'</tr>'+
			  	    								'<tr>'+
			  	    									'<td style="text-align:center;">Bueno</td>'+
				  	    								'<td style="text-align:center;">Regular</td>'+
				  	    								'<td style="text-align:center;">Malo</td>'+
			  	    								'</tr>'+
			  	    							'</thead>'+
			  	    							'<tbody>'+
			  	    								'<tr>'+
			  	    									'<td>'+
				  	    									'1. Metalica'+
				  	    								'</td>'+
				  	    								'<td>'+
				  	    									'<label class="radio">'+
																'<input type="radio" id="inlineradio3" value="option3"> 1'+
															'</label>'+
				  	    								'</td>'+
				  	    								'<td>'+
				  	    									'<label class="radio">'+
																'<input type="radio" id="inlineradio3" value="option3"> 2'+
															'</label>'+
				  	    								'</td>'+
				  	    								'<td>'+
				  	    									'<label class="radio">'+
																'<input type="radio" id="inlineradio3" value="option3"> 3'+
															'</label>'+
				  	    								'</td>'+
			  	    								'</tr>'+
			  	    								'<tr>'+
			  	    									'<td>'+
				  	    									'2. Metálica con vidrio'+
				  	    								'</td>'+
				  	    								'<td>'+
				  	    									'<label class="radio">'+
																'<input type="radio" id="inlineradio3" value="option3"> 1'+
															'</label>'+
				  	    								'</td>'+
				  	    								'<td>'+
				  	    									'<label class="radio">'+
																'<input type="radio" id="inlineradio3" value="option3"> 2'+
															'</label>'+
				  	    								'</td>'+
				  	    								'<td>'+
				  	    									'<label class="radio">'+
																'<input type="radio" id="inlineradio3" value="option3"> 3'+
															'</label>'+
				  	    								'</td>'+
			  	    								'</tr>'+
			  	    								'<tr>'+
			  	    									'<td>'+
				  	    									'3. Madera'+
				  	    								'</td>'+
				  	    								'<td>'+
				  	    									'<label class="radio">'+
																'<input type="radio" id="inlineradio3" value="option3"> 1'+
															'</label>'+
				  	    								'</td>'+
				  	    								'<td>'+
				  	    									'<label class="radio">'+
																'<input type="radio" id="inlineradio3" value="option3"> 2'+
															'</label>'+
				  	    								'</td>'+
				  	    								'<td>'+
				  	    									'<label class="radio">'+
																'<input type="radio" id="inlineradio3" value="option3"> 3'+
															'</label>'+
				  	    								'</td>'+
			  	    								'</tr>'+
			  	    								'<tr>'+
			  	    									'<td>'+
				  	    									'4. Madera con vidrio'+
				  	    								'</td>'+
				  	    								'<td>'+
				  	    									'<label class="radio">'+
																'<input type="radio" id="inlineradio3" value="option3"> 1'+
															'</label>'+
				  	    								'</td>'+
				  	    								'<td>'+
				  	    									'<label class="radio">'+
																'<input type="radio" id="inlineradio3" value="option3"> 2'+
															'</label>'+
				  	    								'</td>'+
				  	    								'<td>'+
				  	    									'<label class="radio">'+
																'<input type="radio" id="inlineradio3" value="option3"> 3'+
															'</label>'+
				  	    								'</td>'+
			  	    								'</tr>'+
			  	    								'<tr>'+
			  	    									'<td>'+
			  	    										'<label>'+
				  	    										'5. Otro material'+
				  	    									'</label>'+
				  	    									'<label>'+
																'<input style="float:left; width:300px;" type="text" class="form-control">'+
																'(Especifique)'+
															'</label>'+
			  	    									'</td>'+
				  	    								'<td>'+
				  	    									'<label class="radio">'+
																'<input type="radio" id="inlineradio3" value="option3"> 1'+
															'</label>'+
				  	    								'</td>'+
				  	    								'<td>'+
				  	    									'<label class="radio">'+
																'<input type="radio" id="inlineradio3" value="option3"> 2'+
															'</label>'+
				  	    								'</td>'+
				  	    								'<td>'+
				  	    									'<label class="radio">'+
																'<input type="radio" id="inlineradio3" value="option3"> 3'+
															'</label>'+
				  	    								'</td>'+
			  	    								'</tr>'+
			  	    								'<tr>'+
			  	    									'<td>'+
				  	    									'6. No tiene'+
				  	    								'</td>'+
				  	    								'<td>'+
				  	    									'<label class="radio">'+
																'<input type="radio" id="inlineradio3" value="option3"> 1'+
															'</label>'+
				  	    								'</td>'+
				  	    								'<td>'+
				  	    									'<label class="radio">'+
																'<input type="radio" id="inlineradio3" value="option3"> 2'+
															'</label>'+
				  	    								'</td>'+
				  	    								'<td>'+
				  	    									'<label class="radio">'+
																'<input type="radio" id="inlineCheckbox3" value="option3"> 3'+
															'</label>'+
				  	    								'</td>'+
			  	    								'</tr>'+
			  	    							'</tbody>'+
			  	    						'</table>'+
		  	    						'</td>'+
		  	    					'</tr></tbody></table>';
							alert('1');
							break;
						case 2 :
							alert('2');
							break;
						case 3 :
							alert('3');
							break;
						case 4 :
							alert('4');
							break;
						case 5 :
							alert('5');
							break;
					}
					alert(html);
					$('#funcion_educativa').html(html);
					check_Radio(radiop15a,radiop15+'P6_2_15a');
				});
	});
}


function check_Radio(value,id){

    if(value!=null && value!=0){

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

	$.getJSON(CI.base_url+'index.php/visor/P61/DataNroEdif/?token='+token+'&id_local='+cod_local+'&Nro_Pred='+predio+'&NRO_ED='+nro_edif+'', function(data) {


				$.each(data, function(index, val) {
					arraychecked= {
									  0: 'P6_1_5'+val.P6_1_5,
									  1: 'P6_1_6'+val.P6_1_6,
									  2: 'P6_1_7'+val.P6_1_7
									};
					i++;
					//console.log(arraychecked);
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

				  	    		$.each(val.P6_1_8_N, function(index, val) {

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
										  	    		'</tr>';
										  	    		x++;

								});
								html+='<tr>'+
						  	    				'<td><strong>9.</strong></td>'+
						  	    				'<td><strong>¿ Cuántos  niveles o modalidades hacen uso de esta edificación? </strong></td>'+
							  	    			'<td>'+
							  	    				'<input style="width:100px;" type="text" class="form-control P6_1_8" value="'+val.P6_1_9+'">'+
							  	    			'</td>'+
				  	    				  '</tr>';
				  	    		$.each(val.P6_1_10_e, function(index, val) {

				  	    			check_Radio(val.P6_1_10_e,'P6_1_10_e');
								});

					});
				$('#seccion_a').html(html);
				check_Radio3(arraychecked);
				check_Radio4(arraycheckpisos);
	});
}

//==============================FINCAPITULO 6=================================