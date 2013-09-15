$(document).ready(function(){

	P1A();
	/*P1A2N();*/
	lista_ie();
	
	$('input').attr({
		disabled : true,
	});
	
	$('#list_ie').on('click','.ie',function(event){

		P1A2N($(this).attr('id'));

	});

});


function P1A(){

	$.getJSON(urlRoot('index.php')+'/visor/P1A/Data/', {token: getToken(),id_local: getLocal(), predio: getPredio()}, function(data, textStatus) {
		
		$.each(data, function(index, val) {

			$('#nie2').val(val.P1_A_1_Cant_IE);

		});


	}).fail(function( jqxhr, textStatus, error ) {
	
		var err = textStatus + ', ' + error;
		console.log( "Request Failed: " + err);
	
	});
			
}

function lista_ie(){

	$.getJSON(urlRoot('index.php')+'/visor/Procedure/Lista_IE/', {token: '7959ac60dc22523a9ac306ac6f9308d3d7201c56',id_local: localE(), predio: '1'}, function(data, textStatus) {
	
		var html="";
		var ie="";

		$.each(data, function(index, val) {
			
			ie+='<tr class="ie" id="'+val.P1_A_2_NroIE+'">'+
				'<td style="text-align:center;">'+val.P1_A_2_NroIE+'</td>'+
				'<td style="text-align:center;">'+val.P1_A_2_1_NomIE+'</td>'+							    			
			'</tr>';

		});

		$("#list_ie").html(ie);

	});

}

function P1A2N(ie){

	$.getJSON(urlRoot('index.php')+'/visor/P1A2N/Data/', {token: '7959ac60dc22523a9ac306ac6f9308d3d7201c56', id_local: localE(), predio: '1', nroie: ie}, function(data, textStatus) {
		
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
										'<tbody id="'+val.P1_A_2_NroIE+'">'+

										'</tbody>'+

									'</table>'+

									'<div class="panel">'+
											'<label>Observaciones:</label>'+
											'<textarea style="width:800px; height:100px;">'+val.P1_A_2_Obs+'</textarea>'+
									'</div>'+

					'</div><!-- end panel ncodigod-->';
		});
		

		$('#inst_educa').html(html);
		/*each_get_P1_A_2_8N(cod_local);*/

	}).fail(function( jqxhr, textStatus, error ) {
	
		var err = textStatus + ', ' + error;
		console.log( "Request Failed: " + err);
	
	});
			
}

/*function get_P1_A_2N(cod_local){

	$.post('visor/visor/get_P1_A_2N/', {cod_local:cod_local}, function(data) {

	







		})
		
		

	})
}*/

