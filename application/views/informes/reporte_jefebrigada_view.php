<link rel="stylesheet" href="<?php echo base_url('css/jquery-ui-1.10.3.custom.min.css') ?>">
<link rel="stylesheet" href="<?php echo base_url('css/ui.jqgrid.css') ?>">
<script src="<?php echo base_url('js/jqgrid/i18n/grid.locale-es.js'); ?>"></script>
<script src="<?php echo base_url('js/jqgrid/jquery.jqGrid.min.js'); ?>"></script>
<script src="<?php echo base_url('js/segmentaciones.js'); ?>"></script>
<style>
	.ui-jqgrid tr.jqgrow td {
		white-space: normal !important;
	}
</style>
<?php
	$label_class =  array('class' => 'control-label');
	$sedeArray = array(-1 => 'Seleccione...');
    foreach($sedeoperativa->result() as $filas)
    {
      $sedeArray[$filas->cod_sede_operativa]=utf8_encode(strtoupper($filas->sede_operativa));
    }

	$provArray = array(-1 => '');
	$jefeArray = array(-1 => '');
?>

<div class="row-fluid">
	<div class="row-fluid">
		<div id="ap-sidebar" class="span2">
			<?php $this->load->view('informes/includes/sidebar_segmentacion_view.php'); ?>
		</div>
		<div id="ap-content" class="span10">
			<div class="row-fluid well top-conv">
				<?php echo form_open('','id="frm_reporte"'); ?>
				<div class="span3">
					<div class="control-group">
						<?php echo form_label('Sede Operativa', 'sede', $label_class); ?>
						<div class="controls">
							<?php echo form_dropdown('sedeoperativa', $sedeArray, '#', 'id="sedeoperativa" onChange="cargarProvOpe();"'); ?>
						</div>
					</div>
				</div>
				<div class="span3">
					<div class="control-group">
						<?php echo form_label('Provincia Operativa', 'provincia', $label_class); ?>
						<div class="controls">
							<?php echo form_dropdown('provoperativa', $provArray, '#', 'id="provoperativa" onChange="cargar_JB();"'); ?>
						</div>
					</div>
				</div>
				<div class="span2">
					<div class="control-group">
							<?php echo form_label('Jefe de Brigada', 'jefe'); ?>
						<div class="controls">
							<?php echo form_dropdown('jefebrigada', $jefeArray, '#', 'id="jefebrigada" onChange="reportar();" style="width:100%"'); ?>
						</div>
					</div>
				</div>
			</div>
			<input type="hidden" name="cod_sede" id="cod_sede" value="" />
			<input type="hidden" name="cod_prov" id="cod_prov" value="" />
			<input type="hidden" name="cod_jb" id="cod_jb" value="" />
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
		   	url:'reporte_jefebrigada/obtenreporte',
			datatype: "json",
			height: 255,
		   	colNames:['Nro', 'Departamento', 'Provincia', 'Distrito', 'Centro Poblado', 'Codigo de Local', 'Sede Operativa', 'Provincia Operativa', 'F. Inicio', 'F. Final', 'Traslado', 'Trabajo', 'Retorno Sede', 'Gabinete', 'Descanso', 'Total Dias', 'Mov. Local MA', 'Gasto Op. MA', 'Mov. Local AF', 'Gasto Op. AF', 'Pasaje', 'Total AF', 'Observaciones','Ruta'],
		   	colModel:[
		   		{name:'nro_filas',sortable:false,width:80,align:"center"},
		   		{name:'nombre_dpto',index:'nombre_dpto',width:350,align:"center"},
		   		{name:'nombre_provincia',index:'nombre_provincia',width:350,align:"center"},
		   		{name:'nombre_distrito',index:'nombre_distrito',width:350,align:"center"},
		   		{name:'centroPoblado',index:'centroPoblado',width:350,align:"center"},
		   		{name:'codigo_de_local',index:'codigo_de_local',width:200,align:"center"},
		   		{name:'sede_operativa',index:'sede_operativa',width:350,align:"center"},
		   		{name:'prov_operativa_ugel',index:'prov_operativa_ugel',width:350,align:"center"},
		   		{name:'fxinicio_jb',index:'convert(datetime,fxinicio_jb)',width:200,align:"center"},
		   		{name:'fxfinal_jb',index:'convert(datetime,fxfinal_jb)',width:200,align:"center"},
		   		{name:'traslado_jb',index:'traslado_jb',width:350,align:"center"},
		   		{name:'trabajo_supervisor_jb',index:'trabajo_supervisor_jb',width:350,align:"center"},
		   		{name:'retornosede_jb',index:'retornosede_jb',width:350,align:"center"},
		   		{name:'gabinete_jb',index:'gabinete_jb',width:350,align:"center"},
		   		{name:'descanso_jb',index:'descanso_jb',width:350,align:"center"},
		   		{name:'totaldias_jb',index:'totaldias_jb',width:350,align:"center"},
		   		{name:'movilocal_ma_jb',index:'movilocal_ma_jb',width:350,align:"center"},
		   		{name:'gastooperativo_ma_jb',index:'gastooperativo_ma_jb',width:350,align:"center"},
		   		{name:'movilocal_af_jb',index:'movilocal_af_jb',width:350,align:"center"},
		   		{name:'gastooperativo_af_jb',index:'gastooperativo_af_jb',width:350,align:"center"},
		   		{name:'pasaje_jb',index:'pasaje_jb',width:350,align:"center"},
		   		{name:'total_af_jb',index:'total_af_jb',width:350,align:"center"},
		   		{name:'observaciones_jb',index:'observaciones_jb',width:350,align:"center"},
		   		{name:'idruta',index:'idruta',width:350,align:"center"}
		   	],
		   	pager: '#pager2',
		   	rowNum:10,
		   	rowList:[10,20,30],
		   	sortname: 'convert(datetime,fxinicio_jb,103), prov_operativa_ugel',
		    viewrecords: true,
		    sortorder: "asc",
		    caption:"Lista de Rutas de Jefe de Brigada"
		});
		jQuery("#list2").jqGrid('navGrid','#pager2',{edit:false,add:false,del:false,search:false});
		$("#list2").setGridWidth($('#grid_content').width(), true);
	});

	function reportar()
	{
		var codsede = $("#sedeoperativa").val();
		var codprov = $("#provoperativa").val();
		var codjb = $("#jefebrigada").val();

		$("#cod_sede").val(codsede);
		$("#cod_prov").val(codprov);
		$("#cod_jb").val(codjb);

		jQuery("#list2").jqGrid('setGridParam',{url:"reporte_jefebrigada/obtenreporte?codsede="+codsede+"&codprov="+codprov+"&codjb="+codjb,page:1}).trigger("reloadGrid");
	}

	function exportExcel()
	{
        var codsede = $("#cod_sede").val();
		var codprov = $("#cod_prov").val();
		var codjb = $("#cod_jb").val();

		if (codsede == "" || codprov == "" || codjb == "" )
		{ 
			alert("Ud. No ha realizado ninguna búsqueda"); 
		}else{
	        document.forms[0].method='POST';
	        document.forms[0].action=CI.base_url+"index.php/segmentaciones/csvExport/ExportacionJefeBrigada?codsede="+codsede+"&codprov="+codprov+"&codjb="+codjb;
	        document.forms[0].target='_blank';
	        document.forms[0].submit();
    	}
	}
</script>