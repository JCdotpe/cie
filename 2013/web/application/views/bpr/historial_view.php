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
		'onclick' => 'Form_Validar_Repregunta()',
		'type' => 'button',
		'content' => 'Enviar',
		'class' => 'btn btn-primary pull-left'
	);

?>

<div class="row-fluid">
	<div class="row-fluid">
		<div id="ap-content" class="span12">
			<input type="hidden" name="codigo" id="codigo" value="<?php echo $codigo; ?>" />
			<div id="v_historial" class="row-fluid well top-conv">
			</div>
			<?php echo form_open('','id="frm_repreguntas"'); ?>
			<div class="row-fluid well top-conv">
				<div class="span3">
					<div class="control-group">
						<?php echo form_label('Nombre Completo', 'nombre', $label_class); ?>
						<div class="controls">
							<?php echo form_input($txtNombre); ?>
						</div>
					</div>
				</div>
				<div class="span3">
					<div class="control-group">
						<?php echo form_label('Nro DNI', 'dni', $label_class); ?>
						<div class="controls">
							<?php echo form_input($txtDni); ?>
						</div>
					</div>
				</div>
				<div>
					<div class="span7">
						<div class="control-group">
							<?php echo form_label('Consulta', 'cons', $label_class); ?>
							<div class="controls">
								<?php echo form_textarea($txtConsulta); ?>
							</div>
						</div>
					</div>
				</div>
				<div>
					<div class="span12">
						<?php echo form_button($btnGrabar); ?>
					</div>
				</div>
			</div>
			<?php echo form_close(); ?>			
		</div>
	</div>
</div>

<script type="text/javascript">

	$(document).ready(function() {
		var codigo = $("#codigo").val();
		//alert(codigo);
		ListarHistorial(codigo);
	});

function ListarHistorial(codigo)
{
	$.getJSON(urlRoot('index.php')+'/bpr/historial/view_pregunta_historial/', {id_cuestionario: codigo}, function(data, textStatus) {

		var html="";

		$.each(data, function(index, val) {
			html+='<div class="row-fluid"><p>PREGUNTA:</p>'+
						'<div id="preg'+val.id_cuestionario+'" class="span8">'+
							val.consulta
						+'</div>'+
						'<div id="fex'+val.id_cuestionario+'" class="span3">'+
							val.fecha_creacion
						+'</div>'+
					'</div>';
				$.each(val.respuesta, function(index, val) {

					html+='<div class="row-fluid"><p>RESPUESTA:</p>'+
							'<div id="resp'+val.id_cuestionario+'" class="span10">'+
							val.respuesta
						+'</div>'+'</div>';
				});
		});
		$("#v_historial").append(html);
	});
}

</script>