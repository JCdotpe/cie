<link rel="stylesheet" href="<?php echo base_url('css/jquery-ui-1.10.3.custom.min.css') ?>">
<link rel="stylesheet" href="<?php echo base_url('css/ui.jqgrid.css') ?>">
<script src="<?php echo base_url('js/jqgrid/i18n/grid.locale-es.js'); ?>"></script>
<script src="<?php echo base_url('js/jqgrid/jquery.jqGrid.min.js'); ?>"></script>
<script src="<?php echo base_url('js/bpr.js'); ?>"></script>
<style>
	.ui-jqgrid tr.jqgrow td {
		white-space: normal !important;
	}
</style>
<?php
	$label_class =  array('class' => 'control-label');
	$sedeArray = array(-1 => 'Seleccione...');
	foreach($sedeope->result() as $filas)
	{
		$sedeArray[$filas->cod_sede_operativa] = utf8_encode(strtoupper($filas->sede_operativa));
	}
	$provArray = array(-1 => '');
	//$distArray = array(-1 => '');

	$cargosArray = array(-1 => 'Seleccione...'); 
	$cargospresupuestario=array(-1 => '-1');
	$cargosadm=array(-1 => '-1');
	foreach ($cargos->result() as $filas) 
	{
		$cargosArray[$filas->codigo_Convocatoria] = utf8_encode($filas->CargoFunciona);
		$cargospresupuestario[$filas->codigo_Convocatoria] = $filas->codigo_CredPresupuestario;
		$cargosadm[$filas->codigo_Convocatoria] = $filas->codigo_adm;
	}
	$selected_cargo = (set_value('cargo')) ? set_value('cargo') : '' ;

	$cedulaArray = array(-1 => 'Seleccione...');
	foreach($cedula->result() as $filas)
	{
		$cedulaArray[$filas->cedula] = utf8_encode(strtoupper($filas->cedula));
	}
	$capArray = array(-1 => '');
    $secArray = array(-1 => '');
    $preArray = array(-1 => '');

    $txtNombre = array(
		'name'	=> 'nombrecompleto',
		'id'	=> 'nombrecompleto',
		'value' => set_value('nombrecompleto'),		
		'style' => 'width: 250px;',
		'maxlength' => 80
	);

	$txtDni = array(
		'name'	=> 'nrodni',
		'id'	=> 'nrodni',
		'value' => set_value('nrodni'),		
		'style' => 'width: 100px;',
		'onkeypress' => 'return validar_numeros(event)',
		'maxlength' => 8
	);

	$txtConsulta =array(
		'name'	=> 'consulta',
		'id'	=> 'consulta',
		'value'	=> set_value('consulta'),
		'maxlength'	=> 400,
		'style' => 'width: 500px;',		
		'rows' => '4',
		'cols' => '20'
	);

	$btnGrabar = array(
		'name' => 'guardar',
		'id' => 'guardar',
		'onclick' => 'Form_Validar()',
		'type' => 'button',
		'content' => 'Enviar',
		'class' => 'btn btn-primary pull-left'
	);

?>

<div class="row-fluid">
	<div class="row-fluid">
		<div id="ap-content" class="span12">
			<?php echo form_open('','id="frm_preguntas"'); ?>
			<div class="row-fluid well top-conv">				
				<div class="span3">
					<div class="control-group">
						<?php echo form_label('Sede Operativa', 'sedeope', $label_class); ?>
						<div class="controls">
							<?php echo form_dropdown('sedeoperativa', $sedeArray, '#', 'id="sedeoperativa" onChange="cargarProv();"'); ?>
						</div>
					</div>
				</div>
				<div class="span3">
					<div class="control-group">
						<?php echo form_label('Provincia Operativa', 'provinciaope', $label_class); ?>
						<div class="controls">
							<?php echo form_dropdown('provincia_ope', $provArray, '#', 'id="provincia_ope"'); ?>
						</div>
					</div>
				</div>
				<!--
				<div class="span3">
					<div class="control-group">
						<?php #echo form_label('Distrito', 'distrito', $label_class); ?>
						<div class="controls">
							<?php #echo form_dropdown('distrito', $distArray, '#', 'id="distrito"'); ?>
						</div>
					</div>
				</div>
				-->
				<div class="span6">
					<div class="control-group">
						<?php echo form_label('Cargo', 'cargo', $label_class); ?>
						<div class="controls">
							<?php
								echo form_dropdown('cargo', $cargosArray, $selected_cargo, ' id="cargo"'); 
								echo form_dropdown('cargo', $cargospresupuestario, $selected_cargo, ' id="cargo_presupuestal" style="display:none"'); 
								echo form_dropdown('cargo', $cargosadm, $selected_cargo, 'id="cargo_adm" style="display:none"');
							?>
						</div>
					</div>
				</div>
				<div>
					<div class="span3">
						<div class="control-group">
							<?php echo form_label('Cédula', 'cedula', $label_class); ?>
							<div class="controls">
								<?php echo form_dropdown('cedula', $cedulaArray, '#', 'id="cedula" onChange="cargarCapitulo();"'); ?>
							</div>
						</div>
					</div>
					<div class="span3">
						<div class="control-group">
							<?php echo form_label('Capítulo', 'capitulo', $label_class); ?>
							<div class="controls">
								<?php echo form_dropdown('capitulo', $capArray, '#', 'id="capitulo" onChange="cargarSeccion();"'); ?>
							</div>
						</div>
					</div>
					<div class="span3">
						<div class="control-group">
							<?php echo form_label('Sección', 'seccion', $label_class); ?>
							<div class="controls">
								<?php echo form_dropdown('seccion', $secArray, '#', 'id="seccion" onChange="cargarPreguntas();"'); ?>
							</div>
						</div>
					</div>
					<div class="span3">
						<div class="control-group">
							<?php echo form_label('Pregunta', 'pregunta', $label_class); ?>
							<div class="controls">
								<?php echo form_dropdown('pregunta', $preArray, '#', 'id="pregunta"'); ?>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div id="v_banco" class="row-fluid well top-conv">
			</div>
			<?php echo form_close(); ?>			
		</div>
	</div>
</div>

<script type="text/javascript">

	$(document).ready(function() {
		ListarBanco();
	});

function ListarBanco()
{
	$.getJSON(urlRoot('index.php')+'/bpr/banco/view_pregunta/', {}, function(data, textStatus) {

		var html="";

		$.each(data, function(index, val) {
			html+='<div class="row-fluid">'+
						'<div id="preg'+val.id_cuestionario+'" class="span8">'+
							'<a href="'+urlRoot('index.php')+'/bpr/historial/?variable='+val.id_cuestionario+'">'+val.consulta+'</a>'
						+'</div>'+
						'<div id="fex'+val.id_cuestionario+'" class="span3">'+
							val.fecha_creacion
						+'</div>'+
					'</div>';
				$.each(val.respuesta, function(index, val) {

					html+='<div class="row-fluid">'+
							'<div id="resp'+val.id_cuestionario+'" class="span10">'+
							val.respuesta
						+'</div>'+'</div>';
				});
		});
		$("#v_banco").append(html);
	});
}

</script>