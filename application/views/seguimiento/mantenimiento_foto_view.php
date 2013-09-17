<link rel="stylesheet" href="<?php echo base_url('css/jquery-ui-1.10.3.custom.min.css') ?>">
<link rel="stylesheet" href="<?php echo base_url('css/ui.jqgrid.css') ?>">
<script src="<?php echo base_url('js/jqgrid/i18n/grid.locale-es.js'); ?>"></script>
<script src="<?php echo base_url('js/jqgrid/jquery.jqGrid.min.js'); ?>"></script>
<script src="<?php echo base_url('js/seguimiento.js'); ?>"></script>
<style>
	.ui-jqgrid tr.jqgrow td {
		white-space: normal !important;
	}
</style>
<?php

	$label_class =  array('class' => 'control-label');

	$txtCodigoLocal = array(
		'name'	=> 'codigolocal',
		'id'	=> 'codigolocal',
		'value' => set_value('codigolocal'),		
		'style' => 'width: 100px;',
		'onkeypress' => 'return validar_numeros(event)',
		'onblur' => 'return consultar_codigo()',
		'maxlength' => 6
	);

	$txtObservaciones = array(
		'name'	=> 'observaciones',
		'id'	=> 'observaciones',
		'value' => set_value('observaciones'),		
		'style' => 'width: 300px;',
		'maxlength' => 150
	);

	$btnGrabar = array(
		'name' => 'guardar',
		'id' => 'guardar',
		'onclick' => 'Validar_Fotos()',
		'type' => 'button',
		'content' => 'Registrar',
		'class' => 'btn btn-primary pull-left'
	);

?>

<div class="row-fluid">
	<div class="row-fluid">
		<div id="ap-content" class="span12">
			<div class="row-fluid well top-conv">
				<?php echo form_open('','id="frm_seguimiento_mant"'); ?>
				<div class="span2">
					<div class="control-group">
						<?php echo form_label('Código de Local', 'codigo', $label_class); ?>
						<div class="controls">
							<?php echo form_input($txtCodigoLocal); ?>
						</div>
					</div>
				</div>
				<div class="span2">
					<div class="control-group">
						<?php echo form_label('Repositorio', 'repositorio', $label_class); ?>
						<div class="controls">
							<input type="radio" name="estado_repo" value="1"> FTP
							<input type="radio" name="estado_repo" value="2"> STORAGE
						</div>
					</div>
				</div>
				<div class="span4">
					<div class="control-group">
						<?php echo form_label('Observaciones', 'observaciones', $label_class); ?>
						<div class="controls">
							<?php echo form_input($txtObservaciones); ?>
						</div>
					</div>
				</div>
				<div class="span2">
					<div class="control-group">
						<?php echo form_label('', '', $label_class); ?>
						<div class="controls">
							<?php echo form_button($btnGrabar); ?>
						</div>
					</div>
				</div>
				<?php echo form_close(); ?>
			</div>
		</div>
		<!--
		<div class="row-fluid">
			<div id="grid_content" class="span12">
				<table id="list2"></table>
				<div id="pager2"></div>
			</div>
		</div>
		-->
	</div>
</div>
<!--
<script type="text/javascript">

	$(document).ready(function() {
		jQuery("#list2").jqGrid({
			type:"POST",
			url:'mantenimiento_fotos/ver_datos',
			datatype: "json",
			height: 200,
			colNames:['Código de Local', 'Repositorio', 'Fecha de FTP', 'Fecha de STORAGE'],
			colModel:[
				{name:'id_local',index:'id_local', align:"center"},
				{name:'repositorio',index:'repositorio', align:"center"},
				{name:'fecha_ftp',index:'fecha_ftp', align:"center"},
				{name:'fecha_storage',index:'fecha_storage', align:"center"}
			],
			pager: '#pager2',
			rowNum:10,
			rowList:[10,15,20],
			sortname: 'id_local',
			viewrecords: true,
			sortorder: "asc",
			caption:"Lista de Locales con Fotos"
		});
		jQuery("#list2").jqGrid('navGrid','#pager2',{edit:false,add:false,del:false,search:false});
		$("#list2").setGridWidth($('#grid_content').width(), true);
	});

</script>-->