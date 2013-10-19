<?php 


////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////
// CAP 8
////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////

// TABLA P8 - Capitulo VIII

$P8_2_Tipo = array(
	'name'	=> 'P8_2_Tipo',
	'id'	=> 'P8_2_Tipo',
	'maxlength'	=> 3,
	'class'	=> 'input3',
	'disabled' => 'disabled',
);

$Nro_Pred = array(
	'name'	=> 'Nro_Pred',
	'id'	=> 'Nro_Pred',
	'maxlength'	=> 2,
	'class'	=> 'input2',
	'disabled' => 'disabled',
);

$P8_2_Nro = array(
	'name'	=> 'P8_2_Nro',
	'id'	=> 'P8_2_Nro',
	'class'	=> 'input3',
	'disabled' => 'disabled',
);

$P8_area = array(
	'name'	=> 'P8_area',
	'id'	=> 'P8_area',
	'maxlength'	=> 6,
	'class'	=> 'input6',	
);

$P8_altura = array(
	'name'	=> 'P8_altura',
	'id'	=> 'P8_altura',
);

$P8_ejecuto = array(
	'name'	=> 'P8_ejecuto',
	'id'	=> 'P8_ejecuto',
	'maxlength'	=> 1,
	'class'	=> 'input1',		
);

$P8_ejecuto_O = array(
	'name'	=> 'P8_ejecuto_O',
	'id'	=> 'P8_ejecuto_O',
);

$P8_Est_E = array(
	'name'	=> 'P8_Est_E',
	'id'	=> 'P8_Est_E',
	'maxlength'	=> 1,
	'class'	=> 'input1',			
);

$P8_Ant = array(
	'name'	=> 'P8_Ant',
	'id'	=> 'P8_Ant',
	'maxlength'	=> 1,
	'class'	=> 'input1',			
);

$P8_RecTec = array(
	'name'	=> 'P8_RecTec',
	'id'	=> 'P8_RecTec',
	'maxlength'	=> 1,
	'class'	=> 'input1',		
);

$P8_Est_PaLo = array(
	'name'	=> 'P8_Est_PaLo',
	'id'	=> 'P8_Est_PaLo',
);

$P8_Obs = array(
	'name'	=> 'P8_Obs',
	'id'	=> 'P8_Obs',
	'class'	=> 'textarea98p',		
);

// FIN TABLA P8 - Capitulo VIII



////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////
// CAP 8
////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////

echo '

<div class="panel panel-info">
	  	    				<div class="panel-heading">CAPITULO VIII: CARACTERÍSTICAS DE OTRAS EDIFICACIONES DEL LOCAL ESCOLAR</div>

							<div class="panel" style="background:#DDD;">
								<div id="panel_tipo_edificaciones" style="margin-top:10px;margin-bottom:10px;">
									
								</div>
							</div>	 

							<div class="panel" style="background:#DDD;">
								<div id="panel_nro_tedificaciones" style="margin-top:10px;margin-bottom:10px;">
									
								</div>
							</div>	  	    				

	  	    				<table class="table table-bordered">
		  	    				<thead>

			  	    					<tr><th colspan="3">SECCIÓN A: IDENTIFICACIÓN DE OTRAS EDIFICACIONES DEL LOCAL ESCOLAR</th>

		  	    				</tr></thead>
		  	    			</table>
		  	    			<table class="table table-bordered">
		  	    				<thead>
		  	    					<tr>
			  	    					<th colspan="3">PATIOS DEL LOCAL ESCOLAR</th>
		  	    					</tr>
		  	    				</thead>
		  	    				<tbody>
		  	    					<tr>
		  	    						<td>1.</td>
		  	    						<td>
		  	    							<strong>Número de patios del local escolar</strong>
		  	    						</td>
		  	    						<td>
		  	    							<label>Nº de patios  verificar Cap. 5</label>
		  	    							'.form_input($P8_2_Tipo).'
		  	    						</td>
		  	    					</tr>
		  	    				</tbody>
		  	    			</table>

		  	    			<table id="datos_otros_ed" class="table table-bordered">
		  	    				<thead>
		  	    					<tr>
			  	    					<th id="titulo_edificacion" colspan="3">&nbsp;</th>
		  	    					</tr>
		  	    				</thead>
		  	    				<tbody>
		  	    					<tr>
		  	    						<td>1.</td>
		  	    						<td>
		  	    							<strong>Código de la edificación</strong>
		  	    						</td>
		  	    						<td>
		  	    							'.form_input($P8_2_Nro).'
		  	    						</td>
		  	    					</tr>
		  	    					<tr>
		  	    						<td>2.1</td>
		  	    						<td id="area_edificacion">
		  	    							<strong>Area de </strong>
		  	    						</td>
		  	    						<td>
											<label>Area en m2</label>
											<table class="table table-bordered">
												<tbody><tr>
													<th style="text-align:center;">Enteros</th>
													<th style="text-align:center;">Decimales</th>
												</tr>
												<tr>
													</tr><tr>
														<td> '.form_input($P8_area).' </td>
														<td> 00 </td>
													</tr>
												
											</tbody></table>
		  	    						</td>
		  	    					</tr>
		  	    					<tr>
		  	    						<td>2.2</td>
		  	    						<td>
		  	    							<strong>Predio en el que se ubica la edificación</strong>
		  	    						</td>
		  	    						<td>
		  	    							'.form_input($Nro_Pred).'
		  	    						</td>
		  	    					</tr>
		  	    					<tr>
		  	    						<td>2.3</td>
		  	    						<td>
		  	    							<strong>¿Qué institución, organismo o empresa ejecutó la edificación?</strong>
		  	    							<label>(Acepte sólo un código)</label>
		  	    						</td>
		  	    						<td>
		  	    							'.form_input($P8_ejecuto).'
		  	    						</td>
		  	    					</tr>
		  	    					<tr>
		  	    						<td>2.4</td>
		  	    						<td>
		  	    							<strong>Estado de conservación de la edificación</strong>
		  	    							<label>(Acepte sólo un código)</label>
		  	    						</td>
		  	    						<td>
		  	    							'.form_input($P8_Est_E).'
		  	    						</td>
		  	    					</tr>
		  	    					<tr>
		  	    						<td>2.5</td>
		  	    						<td>
		  	    							<strong>¿Cuál es el estado de antigüedad de la edificación?</strong>
		  	    							<label>(Acepte sólo un código)</label>
		  	    						</td>
		  	    						<td>
		  	    							'.form_input($P8_Ant).'
		  	    						</td>
		  	    					</tr>
		  	    					<tr>
		  	    						<td>2.6</td>
		  	    						<td>
		  	    							<strong>Recomendación técnica de la evaluación de la edificación</strong>
		  	    							<label>(Acepte sólo un código)</label>
		  	    						</td>
		  	    						<td>
		  	    							'.form_input($P8_RecTec).'
		  	    						</td>
		  	    					</tr>
		  	    					<tr>
			  	    					<td colspan="3">
			  	    							<div class="panel">
													<label>Observaciones:</label>
													'.form_textarea($P8_Obs).'
												</div>
			  	    					</td>
			  	    				</tr>
		  	    				</tbody>
		  	    			</table>

		  	    		</div>

';


 ?>

<script type="text/javascript">

$.each( <?php echo json_encode($cap5_i->result()); ?>, function(i, data) {

		$('#panel_tipo_edificaciones > div').remove('.btn-group');
		var asd ='<div class="btn-group">';
			asd+='<a class="btn dropdown-toggle" data-toggle="dropdown" href="#">Seleccione una Edificación <span class="caret"></span></a>';
			asd+='<ul class="dropdown-menu">';
		if (data.P5_Tot_P > 0){
			asd+='<li id="' + data.P5_Tot_P +'.cmb_P5_Tot_P" class="combo_ins1"><a href="" data-toggle="dropdown"> Patios del local escolar</a></li>';
		}
		if (data.P5_Tot_LD > 0){
			asd+='<li id="' + data.P5_Tot_LD +'.cmb_P5_Tot_LD" class="combo_ins1"><a href="" data-toggle="dropdown"> Losas deportivas del local escolar</a></li>';
		}
		if (data.P5_Tot_CTE > 0){
			asd+='<li id="' + data.P5_Tot_CTE +'.cmb_P5_Tot_CTE" class="combo_ins1"><a href="" data-toggle="dropdown"> Cisternas y/o tanques del local escolar</a></li>';
		}
		if (data.P5_Tot_MC > 0){
			asd+='<li id="' + data.P5_Tot_MC +'.cmb_P5_Tot_MC" class="combo_ins1"><a href="" data-toggle="dropdown"> Muros de contención del local escolar</a></li>';
		}
		asd+='</ul>';
		asd+='</div>';

		$('#panel_tipo_edificaciones').html(asd);

});


	$('#panel_tipo_edificaciones').on('click','.combo_ins1',function(event){

		val= $(this).attr('id');
		array=val.split(".")
		Get_Nro_Edif(array[0],array[1]);
		//alert(array[0]);
		$('.combo_ins1').removeClass('active');
		$(this).addClass('active');
	});

	function Get_Nro_Edif(numero,tipo){
		$('#panel_nro_tedificaciones > div').remove('.btn-group');
		var asd ='<div class="btn-group">';

		var titulo = '';
		var codtipo = '';
		var contenido = '';

		switch(tipo)
		{
			case 'cmb_P5_Tot_P':
				titulo = 'Seleccione un Patio';
				codtipo = 'P.';
				contenido = 'Patio Nro: ';
				$('#titulo_edificacion').html('PATIO');
				$('#area_edificacion').html('<strong>Area del Patio</strong>');	
				break;

			case 'cmb_P5_Tot_LD':
				titulo = 'Seleccione una Losa Deportiva';
				codtipo = 'LD.';
				contenido = 'Losa deportiva Nro: ';
				$('#titulo_edificacion').html('LOSA DEPORTIVA');
				$('#area_edificacion').html('<strong>Area de la Losa Deportiva</strong>');
				break;

			case 'cmb_P5_Tot_CTE':
				titulo = 'Seleccione una Cisterna o Tanque';
				codtipo = 'CTE.';
				contenido = 'Cisterna y/o Tanque Nro: ';
				$('#titulo_edificacion').html('CISTERNA - TANQUE');
				break;

			case 'cmb_P5_Tot_MC':
				titulo = 'Seleccione un Muro de Contención';
				codtipo = 'MC.';
				contenido = 'Muro de contención Nro: ';
				$('#titulo_edificacion').html('MURO DE CONTENCION');
				break;
		}

		asd+='<a class="btn dropdown-toggle" data-toggle="dropdown" href="#">' + titulo + '<span class="caret"></span></a>';
			asd+='<ul class="dropdown-menu">';
		for (var i=1; i<=numero; i++) {
			asd+='<li id="' + codtipo + i +'" class="combo_ins1"><a href="" data-toggle="dropdown">' + contenido + i + ' </a></li>';
		}
		asd+='</ul>';
		asd+='</div>';

		$('#panel_nro_tedificaciones').html(asd);
		$('#P8_2_Tipo').val(numero);
	}


	$('#panel_nro_tedificaciones').on('click','.combo_ins1',function(event){

		val= $(this).attr('id');
		array=val.split(".")
		Limpiar_Datos();
		Get_Datos_Edif(array[0],array[1]);
		$('.combo_ins1').removeClass('active');
		$(this).addClass('active');
	});

	function Get_Datos_Edif(tipo_edi,numero){

		$('#P8_2_Nro').val(tipo_edi+' - '+numero);
		
		$.getJSON(urlRoot('index.php')+'/consistencia/cap8/cap8_i/', {codigo:'<?php echo $cod; ?>',predio:<?php echo $pr; ?>,tipo:tipo_edi,nro:numero}, function(data, textStatus) {

			$.each(data, function(index, val) {				
				$('#P8_area').val(val.P8_area);
				$('#P8_ejecuto').val(val.P8_ejecuto);
				$('#P8_Est_E').val(val.P8_Est_E);
				$('#P8_Ant').val(val.P8_Ant);
				$('#P8_RecTec').val(val.P8_RecTec);
				$('#P8_Obs').val(val.P8_Obs);
			});

		});
	}

	function Limpiar_Datos(){
		$('#P8_2_Nro').val('');
		$('#P8_area').val('');
		$('#P8_ejecuto').val('');
		$('#P8_Est_E').val('');
		$('#P8_Ant').val('');
		$('#P8_RecTec').val('');
		$('#P8_Obs').val('');
	}

</script>