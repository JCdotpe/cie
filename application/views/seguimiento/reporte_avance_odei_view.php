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
    $periodoArray = array(-1 => 'Seleccione...', 1 => '1', 2 => '2', 3 => '3', 4 => '4', 5 => '5', 6 => '6', 7 => '7', 8 => '8', 9 => '9', 10 => '10', 11 => '11', 12 => '12', 13 => '13', 14 => '14', 99 => 'Todos');
?>

<div class="row-fluid">
	<div class="row-fluid">
		<div id="ap-sidebar" class="span2">
			<?php $this->load->view('seguimiento/includes/sidebar_view.php'); ?>
		</div>
		<div id="ap-content" class="span10">
			<?php echo form_open('','id="frm_reporte"'); ?>
			<div class="row-fluid well top-conv">				
				<div class="span2">
					<div class="control-group">
						<?php echo form_label('Periodo', 'periodo', $label_class); ?>
						<div class="controls">
							<?php echo form_dropdown('periodo', $periodoArray, '#', 'id="periodo" onChange="reportar();"'); ?>
						</div>
					</div>
				</div>
			</div>
			<input type="hidden" name="cod_per" id="cod_per" value="" />
			<?php echo form_close(); ?>
		</div>
		<div id="grid_content" class="span12">
			<div class="span6">
				<table id="list2"></table>
				<div id="pager2"></div>
			</div>
		</div>
		<div class="span12">
			<?php echo form_button('expo','Exportar a Excel','class="btn btn-inverse pull-right" id="expo" style="margin-top:20px" onClick="exportExcel()"'); ?>
		</div>
	</div>
</div>

<script type="text/javascript">

	$(document).ready(function() {
		jQuery("#list2").jqGrid({
		   	type:"POST",
		   	url:urlRoot('index.php')+'/seguimiento/reporte_avance_odei/obtenreporte',
			datatype: "json",
			height: 255,
		   	colNames:['Nro', 'ODEI', 'Total de Locales Escolares', 'Total Colegio Censados (Abs)', 'Total Colegio Censados (%)', 'Completa (Abs)', 'Completa (%)', 'Incompleta (Abs)',  'Incompleta (%)', 'Rechazo (Abs)',  'Rechazo (%)', 'Desocupada (Abs)',  'Desocupada (%)', 'Otro (Abs)',  'Otro (%)'],
		   	colModel:[
		   		{name:'nro_fila',sortable:false,width:25,align:"center"},
		   		{name:'detadepen',index:'detadepen',align:"center"},
		   		{name:'LocEscolares',index:'LocEscolares',align:"center"},
		   		{name:'LocEscolar_Censado',index:'LocEscolar_Censado',align:"center"},
		   		{name:'LocEscolar_Censado_Porc',index:'LocEscolar_Censado_Porc',align:"center"},
		   		{name:'Completa',index:'Completa',align:"center"},
		   		{name:'Completa_Porc',index:'Completa_Porc',align:"center"},
		   		{name:'Incompleta',index:'Incompleta',align:"center"},
		   		{name:'Incompleta_Porc',index:'Incompleta_Porc',align:"center"},
		   		{name:'Rechazo',index:'Rechazo',align:"center"},
		   		{name:'Rechazo_Porc',index:'Rechazo_Porc',align:"center"},
		   		{name:'Desocupada',index:'Desocupada',align:"center"},
		   		{name:'Desocupada_Porc',index:'Desocupada_Porc',align:"center"},
		   		{name:'Otro',index:'Otro',align:"center"},
		   		{name:'Otro_Porc',index:'Otro_Porc',align:"center"}
		   	],
		   	rowNum:10,
		   	rowList:[10,20,30],
		   	pager: '#pager2',
		   	sortname: 'detadepen',
		    viewrecords: true,
		    sortorder: "asc",
		    caption:"Datos del Reporte"		    
		});
		jQuery("#list2").jqGrid('navGrid','#pager2',{edit:false,add:false,del:false,search:false})			
		$("#list2").setGridWidth($('#grid_content').width(), true);

	});

	function reportar()
	{
		var codper = $("#periodo").val();

		if (codper == -1)
		{ 
			alert("Debe Seleccionar Periodo"); 
		}else{
			$("#cod_per").val(codper);

			jQuery("#list2").jqGrid('setGridParam',{url:urlRoot('index.php')+"/seguimiento/reporte_avance_odei/obtenreporte?periodo="+codper,page:1}).trigger("reloadGrid");
		}
	}

	function exportExcel()
	{
		var codper = $("#periodo").val();

		if (codper == -1)
		{ 
			alert("Ud. No ha realizado ninguna búsqueda"); 
		}else{
	        document.forms[0].method='POST';
	        document.forms[0].action=CI.base_url+"index.php/seguimiento/csvExport/ExportacionODEI?periodo="+codper;
	        document.forms[0].target='_blank';
	        document.forms[0].submit();
    	}
	}
</script>