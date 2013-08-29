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

    $txtCodRuta =array(
		'name'	=> 'codruta',
		'id'	=> 'codruta',
		'value'	=> set_value('codruta'),
		'maxlength'	=> 2,	
		'style' => 'width: 50px;',	
		'onpaste' => 'return false;',	
		'onkeypress' => 'return validar_numeros(event)'
	);
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
							<?php echo form_dropdown('provoperativa', $provArray, '#', 'id="provoperativa"'); ?>
						</div>
					</div>
				</div>
				<div class="span2">
					<div class="control-group">
						<?php echo form_label('Código de Ruta', 'ruta', $label_class); ?>
						<div class="controls">
							<?php echo form_input($txtCodRuta); ?>			
						</div>
					</div>
				</div>				
				<div class="span1">
					<?php echo form_button('ver','Visualizar','class="btn btn-primary" id="ver" style="margin-top:20px" onClick="reportar()"'); ?>
				</div>
			</div>
			<input type="hidden" name="cod_sede" id="cod_sede" value="" />
			<input type="hidden" name="cod_prov" id="cod_prov" value="" />
			<input type="hidden" name="cod_ruta" id="cod_ruta" value="" />
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
		   	url:'reporte_evaluador/obtenreporte',
			datatype: "json",
			height: 255,			
		   	colNames:['Nro', 'Departamento', 'Provincia', 'Distrito', 'Centro Poblado', 'Codigo de Local', 'Sede Operativa', 'Provincia Operativa', 'F. Inicio', 'F. Final', 'Traslado', 'Trabajo', 'Recuperación', 'Retorno Sede', 'Gabinete', 'Descanso', 'Total Dias', 'Mov. Local MA', 'Gasto Op. MA', 'Mov. Local AF', 'Gasto Op. AF', 'Pasaje', 'Total AF', 'Observaciones','Ruta'],
		   	colModel:[
		   		{name:'nro_filas',sortable:false,width:80,align:"center"},
		   		{name:'NomDept',index:'NomDept',width:350,align:"center"},
		   		{name:'NomProv',index:'NomProv',width:350,align:"center"},
		   		{name:'NomDist',index:'NomDist',width:350,align:"center"},
		   		{name:'centroPoblado',index:'centroPoblado',width:350,align:"center"},
		   		{name:'codlocal',index:'codlocal',width:200,align:"center"},
		   		{name:'sede_operativa',index:'sede_operativa',width:350,align:"center"},
		   		{name:'prov_operativa_ugel',index:'prov_operativa_ugel',width:350,align:"center"},
		   		{name:'fxinicio',index:'convert(datetime,fxinicio)',width:200,align:"center"},
		   		{name:'fxfinal',index:'convert(datetime,fxfinal)',width:200,align:"center"},
		   		{name:'traslado',index:'traslado',width:350,align:"center"},
		   		{name:'trabajo_supervisor',index:'trabajo_supervisor',width:350,align:"center"},
		   		{name:'recuperacion',index:'recuperacion',width:350,align:"center"},
		   		{name:'retornosede',index:'retornosede',width:350,align:"center"},
		   		{name:'gabinete',index:'gabinete',width:350,align:"center"},
		   		{name:'descanso',index:'descanso',width:350,align:"center"},
		   		{name:'totaldias',index:'totaldias',width:350,align:"center"},
		   		{name:'movilocal_ma',index:'movilocal_ma',width:350,align:"center"},
		   		{name:'gastooperativo_ma',index:'gastooperativo_ma',width:350,align:"center"},
		   		{name:'movilocal_af',index:'movilocal_af',width:350,align:"center"},
		   		{name:'gastooperativo_af',index:'gastooperativo_af',width:350,align:"center"},
		   		{name:'pasaje',index:'pasaje',width:350,align:"center"},
		   		{name:'total_af',index:'total_af',width:350,align:"center"},
		   		{name:'observaciones',index:'observaciones',width:350,align:"center"},
		   		{name:'idruta',index:'idruta',width:350,align:"center"}
		   	],
		   	rowNum:10,
		   	rowList:[10,20,30],		   	
		   	pager: '#pager2',
		   	sortname: 'convert(datetime,fxinicio,103), prov_operativa_ugel',
		    viewrecords: true,
		    sortorder: "asc",
		    caption:"Datos del Reporte"		    
		});
		jQuery("#list2").jqGrid('navGrid','#pager2',{edit:false,add:false,del:false,search:false})			
		$("#list2").setGridWidth($('#grid_content').width(), true);

	});

	function reportar()
	{
		var codsede = $("#sedeoperativa").val();
		var codprov = $("#provoperativa").val();
		var codruta = $("#codruta").val();

		if (codsede == -1 || codprov == -1 || codruta == "" )
		{ alert("Debe Seleccionar una Sede y Provincia Operativa, y Codigo de Ruta"); 
		}else{
			$("#cod_sede").val(codsede);
			$("#cod_prov").val(codprov);
			$("#cod_ruta").val(codruta);

			jQuery("#list2").jqGrid('setGridParam',{url:"reporte_evaluador/obtenreporte?codsede="+codsede+"&codprov="+codprov+"&codruta="+codruta,page:1}).trigger("reloadGrid");	
		}
	}

	function exportExcel()
	{
        var codsede = $("#cod_sede").val();
		var codprov = $("#cod_prov").val();
		var codruta = $("#cod_ruta").val();

		if (codsede == "" || codprov == "" || codruta == "" )
		{ 
			alert("Ud. No ha realizado ninguna búsqueda"); 
		}else{
	        document.forms[0].method='POST';
	        document.forms[0].action=CI.base_url+"index.php/segmentaciones/csvExport/ExportacionEvaluador?codsede="+codsede+"&codprov="+codprov+"&codruta="+codruta;
	        document.forms[0].target='_blank';
	        document.forms[0].submit();
    	}
	}
</script>