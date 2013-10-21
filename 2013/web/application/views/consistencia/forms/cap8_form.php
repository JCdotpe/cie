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
	'class'	=> 'input7',
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

$P8_longitud = array(
	'name'	=> 'P8_longitud',
	'id'	=> 'P8_longitud',
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
	'maxlength'	=> 1,
	'class'	=> 'input1',
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
								<div id="panel_tipo_edificaciones_viii" style="margin-top:10px;margin-bottom:10px;">
									
								</div>
							</div>	 

							<div class="panel" style="background:#DDD;">
								<div id="panel_nro_tedificaciones_viii" style="margin-top:10px;margin-bottom:10px;">
									&nbsp;
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
		  	    					<tr id="f1_edi">
		  	    						<td>1.</td>
		  	    						<td>
		  	    							<strong>Código de la edificación</strong>
		  	    						</td>
		  	    						<td>
		  	    							'.form_input($P8_2_Nro).'
		  	    						</td>
		  	    					</tr>
		  	    					<tr id="f2_edi">
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
		  	    					<tr id="f3_edi">
		  	    						<td>2.1</td>
		  	    						<td>
		  	    							<strong>Longitud del Muro de Contención</strong>
		  	    						</td>
		  	    						<td>
		  	    							En metros '.form_input($P8_longitud).'
		  	    						</td>
		  	    					</tr>
		  	    					<tr id="f4_edi">
		  	    						<td>2.2</td>
		  	    						<td>
		  	    							<strong>Altura del Muro de Contención</strong>
		  	    						</td>
		  	    						<td>
		  	    							En metros '.form_input($P8_altura).'
		  	    						</td>
		  	    					</tr>
		  	    					<tr id="f5_edi">
		  	    						<td class="f5_c1_edi">2.2</td>
		  	    						<td class="f5_c2_edi">
		  	    							<strong>Predio en el que se ubica la edificación</strong>
		  	    						</td>
		  	    						<td>
		  	    							'.form_input($Nro_Pred).'
		  	    						</td>
		  	    					</tr>
		  	    					<tr id="f6_edi">
		  	    						<td class="f6_c1_edi">2.3</td>
		  	    						<td>
		  	    							<strong>¿Qué institución, organismo o empresa ejecutó la edificación?</strong>
		  	    							<label>(Acepte sólo un código)</label>
		  	    						</td>
		  	    						<td>
		  	    							'.form_input($P8_ejecuto).' (Especifique) '.form_input($P8_ejecuto_O).'
		  	    						</td>
		  	    					</tr>
		  	    					<tr id="f7_edi">
		  	    						<td>2.4</td>
		  	    						<td>
		  	    							<strong>Estado de conservación de la edificación</strong>
		  	    							<label>(Acepte sólo un código)</label>
		  	    						</td>
		  	    						<td>
		  	    							'.form_input($P8_Est_E).'
		  	    						</td>
		  	    					</tr>
		  	    					<tr id="f8_edi">
		  	    						<td>2.5</td>
		  	    						<td>
		  	    							<strong>¿Cuál es la  antigüedad de la edificación?</strong>
		  	    							<label>(Acepte sólo un código)</label>
		  	    						</td>
		  	    						<td>
		  	    							'.form_input($P8_Ant).'
		  	    						</td>
		  	    					</tr>
		  	    					<tr id="f9_edi">
		  	    						<td>2.6</td>
		  	    						<td>
		  	    							<strong>Estado de Conversación de Paredes y Losas del Tanque Elevado</strong>
		  	    							<label>(Acepte sólo un código)</label>
		  	    						</td>
		  	    						<td>
		  	    							'.form_input($P8_Est_PaLo).'
		  	    						</td>
		  	    					</tr>
		  	    					<tr id="f10_edi">
		  	    						<td class="f10_c1_edi">2.6</td>
		  	    						<td>
		  	    							<strong>Recomendación técnica de la evaluación de la edificación</strong>
		  	    							<label>(Acepte sólo un código)</label>
		  	    						</td>
		  	    						<td>
		  	    							'.form_input($P8_RecTec).'
		  	    						</td>
		  	    					</tr>
		  	    					<tr id="f11_edi">
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

$(document).ready(function(){
	$('#datos_otros_ed > tbody > tr#f3_edi').hide();	
	$('#datos_otros_ed > tbody > tr#f4_edi').hide();
	$('#datos_otros_ed > tbody > tr#f9_edi').hide();
});

$.each( <?php echo json_encode($cap5_i->result()); ?>, function(i, data) {

		$('#panel_tipo_edificaciones_viii > div').remove('.btn-group');
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

		$('#panel_tipo_edificaciones_viii').html(asd);

});


	$('#panel_tipo_edificaciones_viii').on('click','.combo_ins1',function(event){

		val= $(this).attr('id');
		array=val.split(".")
		Limpiar_Datos();
		Get_Nro_Edif(array[0],array[1]);
		$('#panel_tipo_edificaciones_viii > div > ul > li.combo_ins1').removeClass('active');
		$(this).addClass('active');
	});

	function Get_Nro_Edif(numero,tipo){
		$('#panel_nro_tedificaciones_viii > div').remove('.btn-group');
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
				view_options('P');
				break;

			case 'cmb_P5_Tot_LD':
				titulo = 'Seleccione una Losa Deportiva';
				codtipo = 'LD.';
				contenido = 'Losa deportiva Nro: ';
				view_options('LD');
				break;

			case 'cmb_P5_Tot_CTE':
				titulo = 'Seleccione una Cisterna o Tanque';
				codtipo = 'CTE.';
				contenido = 'Cisterna y/o Tanque Nro: ';
				view_options('CTE');
				break;

			case 'cmb_P5_Tot_MC':
				titulo = 'Seleccione un Muro de Contención';
				codtipo = 'MC.';
				contenido = 'Muro de contención Nro: ';
				view_options('MC');
				break;
		}

		asd+='<a class="btn dropdown-toggle" data-toggle="dropdown" href="#">' + titulo + '<span class="caret"></span></a>';
			asd+='<ul class="dropdown-menu">';
		for (var i=1; i<=numero; i++) {
			asd+='<li id="' + codtipo + i +'" class="combo_ins1"><a href="" data-toggle="dropdown">' + contenido + i + ' </a></li>';
		}
		asd+='</ul>';
		asd+='</div>';

		$('#panel_nro_tedificaciones_viii').html(asd);
		$('#P8_2_Tipo').val(numero);
	}

	function view_options(tipo){

		var cont_1 = '';
		var cont_2 = '';
		var cont_3 = '';
		var cont_4 = '';
		var cont_5 = '';
		var cont_6 = '';

		switch (tipo){
			case 'P':
				cont_1='PATIO';
				cont_2='<strong>Area del Patio</strong>';
				cont_3='<strong>Predio en el que se ubica la edificación</strong>';
				cont_4='<td>2.4</td>'+
						'<td><strong>Estado de conservación de la edificación</strong><label>(Acepte sólo un código)</label></td>'+
						'<td><?php echo form_input($P8_Est_E); ?></td>';
				cont_5='<td>2.5</td>'+
						'<td><strong>¿Cuál es la  antigüedad de la edificación?</strong><label>(Acepte sólo un código)</label></td>'+
						'<td><?php echo form_input($P8_Ant); ?></td>';
			break;

			case 'LD':
				cont_1='LOSA DEPORTIVA';
				cont_2='<strong>Area de la Losa Deportiva</strong>';
				cont_3='<strong>Predio en el que se ubica la edificación</strong>';
				cont_4='<td>2.4</td>'+
						'<td><strong>Estado de conservación de la edificación</strong><label>(Acepte sólo un código)</label></td>'+
						'<td><?php echo form_input($P8_Est_E); ?></td>';
				cont_5='<td>2.5</td>'+
						'<td><strong>¿Cuál es la  antigüedad de la edificación?</strong><label>(Acepte sólo un código)</label></td>'+
						'<td><?php echo form_input($P8_Ant); ?></td>';
			break;

			case 'CTE':
				cont_1='CISTERNA - TANQUE';
				cont_2='<strong>Area Construida de la Edificación</strong>';
				cont_3='<strong>Predio en el que se ubica la edificación</strong>';
				cont_4='<td>2.4</td>'+
						'<td><strong>¿Cuál es la  antigüedad de la edificación?</strong><label>(Acepte sólo un código)</label></td>'+
						'<td><?php echo form_input($P8_Ant); ?></td>';
				cont_5='<td>2.5</td>'+
						'<td><strong>Estado de conservación de la edificación</strong><label>(Acepte sólo un código)</label></td>'+
						'<td><?php echo form_input($P8_Est_E); ?></td>';
			break;

			case 'MC':
				cont_1='MURO DE CONTENCION';
				cont_2='';
				cont_3='<strong>Predio en el que se ubica el Muro de Contención</strong>';
				cont_4='<td>2.5</td>'+
						'<td><strong>Estado de Conservación</strong><label>(Acepte sólo un código)</label></td>'+
						'<td><?php echo form_input($P8_Est_E); ?></td>';
				cont_5='<td>2.6</td>'+
						'<td><strong>¿Cuál es la  antigüedad de la edificación?</strong><label>(Acepte sólo un código)</label></td>'+
						'<td><?php echo form_input($P8_Ant); ?></td>';
			break;
		}

		$('#titulo_edificacion').html(cont_1);
		if (tipo!='MC')	$('#area_edificacion').html(cont_2);
		$('#f5_edi > td.f5_c2_edi').html(cont_3);
		$('#f7_edi').html(cont_4);
		$('#f8_edi').html(cont_5);

		if (tipo!='CTE') { 
			$('#datos_otros_ed > tbody > tr#f9_edi').hide();
		}else{ 
			$('#datos_otros_ed > tbody > tr#f9_edi').show(); 
		}

		if (tipo=='MC') { 
			$('#datos_otros_ed > tbody > tr#f2_edi').hide();
			$('#datos_otros_ed > tbody > tr#f3_edi').show();
			$('#datos_otros_ed > tbody > tr#f4_edi').show();
			$('#f5_edi > td.f5_c1_edi').html('2.3');
			$('#f6_edi > td.f6_c1_edi').html('2.4');
		}else{ 
			$('#datos_otros_ed > tbody > tr#f2_edi').show(); 
			$('#datos_otros_ed > tbody > tr#f3_edi').hide();
			$('#datos_otros_ed > tbody > tr#f4_edi').hide();
			$('#f5_edi > td.f5_c1_edi').html('2.2');
			$('#f6_edi > td.f6_c1_edi').html('2.3');
		}

		if (tipo=='MC' || tipo=='CTE') { $('#f10_edi > td.f10_c1_edi').html('2.7'); }else{ $('#f10_edi > td.f10_c1_edi').html('2.6'); }
	}


	$('#panel_nro_tedificaciones_viii').on('click','.combo_ins1',function(event){

		val= $(this).attr('id');
		array=val.split(".")
		Limpiar_Datos();
		Get_Datos_Edif(array[0],array[1]);
		$('#panel_nro_tedificaciones_viii > div > ul > li.combo_ins1').removeClass('active');
		$(this).addClass('active');
	});

	function Get_Datos_Edif(tipo_edi,numero){

		$('#P8_2_Nro').val(tipo_edi+' - '+numero);
		
		$.getJSON(urlRoot('index.php')+'/consistencia/cap8/cap8_i/', {codigo:'<?php echo $cod; ?>',predio:<?php echo $pr; ?>,tipo:tipo_edi,nro:numero}, function(data, textStatus) {

			$.each(data, function(index, val) {				
				$('#P8_area').val(val.P8_area);
				$('#P8_altura').val(val.P8_altura);
				$('#P8_longitud').val(val.P8_longitud);
				$('#P8_ejecuto').val(val.P8_ejecuto);
				$('#P8_ejecuto_O').val(val.P8_ejecuto_O);
				$('#P8_Est_E').val(val.P8_Est_E);
				$('#P8_Ant').val(val.P8_Ant);
				$('#P8_Est_PaLo').val(val.P8_Est_PaLo);
				$('#P8_RecTec').val(val.P8_RecTec);
				$('#P8_Obs').val(val.P8_Obs);
			});

		});
	}

	function Limpiar_Datos(){
		$('#P8_2_Nro').val('');
		$('#P8_area').val('');
		$('#P8_altura').val('');
		$('#P8_longitud').val('');
		$('#P8_ejecuto').val('');
		$('#P8_ejecuto_O').val('');
		$('#P8_Est_E').val('');
		$('#P8_Ant').val('');
		$('#P8_Est_PaLo').val('');
		$('#P8_RecTec').val('');
		$('#P8_Obs').val('');
	}

</script>