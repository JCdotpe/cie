<link rel="stylesheet" href="<?php echo base_url('css/jquery-ui-1.10.3.custom.min.css') ?>">
<link rel="stylesheet" href="<?php echo base_url('css/ui.jqgrid.css') ?>">
<script src="<?php echo base_url('js/jqgrid/i18n/grid.locale-es.js'); ?>"></script>
<script src="<?php echo base_url('js/jqgrid/jquery.jqGrid.min.js'); ?>"></script>
<script src="<?php echo base_url('js/procesamiento/procesamiento.js'); ?>"></script>

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
		'style' => 'width: 60px;',
		'onkeypress' => 'return validar_numeros(event)',
		'onblur' => 'return consultar_codigo()',
		'maxlength' => 6
	);

	$txtF01 = array(
		'name'	=> 'ficha01',
		'id'	=> 'ficha01',
		'onkeypress' => 'return validar_numeros(event)',
		'value' => set_value('ficha01'),		
		'style' => 'width: 60px;',
		'maxlength' => 4
	);

	$txtF01A = array(
		'name'	=> 'ficha01A',
		'id'	=> 'ficha01A',
		'value' => set_value('ficha01A'),
		'onkeypress' => 'return validar_numeros(event)',		
		'style' => 'width: 60px;',
		'maxlength' => 4
	);
	$txtF01B = array(
		'name'	=> 'ficha01B',
		'id'	=> 'ficha01B',
		'value' => set_value('ficha01B'),	
		'onkeypress' => 'return validar_numeros(event)',	
		'style' => 'width: 60px;',
		'maxlength' => 4
	);
	$txtResut = array(
		'name'	=> 'result',
		'id'	=> 'result',
		'value' => set_value('result'),
		'onkeypress' => 'return validar_numeros(event)',
		'style' => 'width: 60px;',
		'maxlength' => 1
	);
	$txtLegajo = array(
		'name'	=> 'legajo',
		'id'	=> 'legajo',
		'value' => set_value('legajo'),
		'style' => 'width: 60px;',
		'maxlength' => 6
	);
	$btnGrabar = array(
		'name' => 'guardar',
		'id' => 'guardar',
		'onclick' => 'Validar_Cedulas()',
		'type' => 'button',
		'content' => 'Registrar',
		'class' => 'btn btn-inverse btn-sm pull-right'
	);

	$btnExportar = array(
		'name' => 'btnExportar',
		'id' => 'btnExportar',
		'onclick' => 'exportReport()',
		'type' => 'button',
		'content' => 'Reporte Udra',
		'class' => 'btn btn-inverse btn-sm pull-right'
	);




?>


	<div class="row-fluid">
		<div id="ap-content" class="span12">
			<div class="row-fluid well top-conv">
				<?php echo form_open('','id="frm_dig_udra"'); ?>
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
						<?php echo form_label('Cantidad Cedula 01', 'F01', $label_class); ?>
						<div class="controls">
							<?php echo form_input($txtF01); ?>
						</div>
					</div>
				</div>
				<div class="span2">
					<div class="control-group">
						<?php echo form_label('Cantidad Cedula 01A', 'F01A', $label_class); ?>
						<div class="controls">
							<?php echo form_input($txtF01A); ?>
						</div>
					</div>
				</div>
				<div class="span2">
					<div class="control-group">
						<?php echo form_label('Cantidad Cedula 01B', 'F01B', $label_class); ?>
						<div class="controls">
							<?php echo form_input($txtF01B); ?>
						</div>
					</div>
				</div>
				<div class="span2">
					<div class="control-group">
						<?php echo form_label('Codigo de Legajo', 'Codigo de Legajo', $label_class); ?>
						<div class="controls">
							<?php echo form_input($txtLegajo); ?>
						</div>
					</div>
				</div>
				<div class="span2">
					<div class="control-group">
						<?php echo form_label('Resultado', 'result', $label_class); ?>
						<div class="controls">
							<?php echo form_input($txtResut); ?>
						</div>
					</div>
				</div>
				

				<div>
				<div class="span11">
					<div class="control-group">
						<?php echo form_label('', '', $label_class); ?>
						<div class="controls">
							<?php echo form_button($btnGrabar); ?>
						</div>
					</div>
				</div>
				</div>

				<?php echo form_close(); ?>
			</div>
		</div>	
		<div>
			<div id="grid_content" class="span12">
				<table id="list2"></table>
				<div id="pager2"></div>
			</div>
		</div>
		<div>
			<div class="span12">
				<div class="control-group">
					<?php echo form_label('', '', $label_class); ?>
					<div class="controls">
						<?php echo form_button($btnExportar); ?>
					</div>
				</div>
			</div>
		</div>
		
	
</div>

<script type="text/javascript">

	$(document).ready(function() {
		jQuery("#list2").jqGrid({
			type:"POST",
			url:'dudra/ver_datos',
			datatype: "json",
			height: 200,
			colNames:['Código de Local', 'Cedula 01', 'Cedula 01A', 'Cedula 01B','Código de Legajo', 'Resultado', 'Fecha de Registro'],
			colModel:[
				{name:'id_local',index:'id_local', align:"center"},
				{name:'cnt_01',index:'cnt_01', align:"center"},
				{name:'cnt_01A',index:'cnt_01A', align:"center"},
				{name:'cnt_01B',index:'cnt_01B', align:"center"},
				{name:'cod_legajo',index:'cod_legajo', align:"center"},
				{name:'res',index:'res', align:"center"},
				{name:'fecha_reg',index:'fecha_reg', align:"center"}
			],
			pager: '#pager2',
			rowNum:10,
			rowList:[10,15,20],
			sortname: 'fecha_reg',
			viewrecords: true,
			sortorder: "asc",
			caption:"Registro de UDRA"
		});
		jQuery("#list2").jqGrid('navGrid','#pager2',{edit:true,add:false,del:true,search:false});
		$("#list2").setGridWidth($('#grid_content').width(), true);
		ver_datos();



	});

</script>