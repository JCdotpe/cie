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
				<div class="span1">
					<?php echo form_button('ver','Visualizar','class="btn btn-primary" id="ver" style="margin-top:20px" onClick="reportar()"'); ?>
				</div>
			</div>
			<input type="hidden" name="cod_sede" id="cod_sede" value="" />
			<input type="hidden" name="cod_prov" id="cod_prov" value="" />
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
		   	url:'local_sin_ruta/obtenreporte',
			datatype: "json",
			height: 255,			
		   	colNames:['Nro', 'Departamento', 'Provincia', 'Distrito', 'Centro Poblado', 'Codigo de Local', 'Sede Operativa', 'Provincia Operativa',  'Dirección'],
		   	colModel:[
		   		{name:'nro_fila',sortable:false,width:25,align:"center"},
		   		{name:'NomDept',index:'NomDept',align:"center"},
		   		{name:'NomProv',index:'NomProv',align:"center"},
		   		{name:'NomDist',index:'NomDist',align:"center"},
		   		{name:'centroPoblado',index:'centroPoblado',align:"center"},
		   		{name:'codigo_de_local',index:'codigo_de_local',align:"center"},
		   		{name:'sede_operativa',index:'sede_operativa',align:"center"},
		   		{name:'prov_operativa_ugel',index:'prov_operativa_ugel',align:"center"},
		   		{name:'direccion',index:'direccion',align:"center"}
		   	],
		   	rowNum:10,
		   	rowList:[10,20,30],
		   	pager: '#pager2',
		   	sortname: 'prov_operativa_ugel,codigo_de_local',
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
		
		if (codsede == -1 || codprov == -1)
		{ 
			alert("Debe Seleccionar una Sede y Provincia Operativa"); 
		}else{
			$("#cod_sede").val(codsede);
			$("#cod_prov").val(codprov);

			jQuery("#list2").jqGrid('setGridParam',{url:"local_sin_ruta/obtenreporte?codsede="+codsede+"&codprov="+codprov,page:1}).trigger("reloadGrid");	
		}
	}

	function exportExcel()
	{
        var codsede = $("#cod_sede").val();
		var codprov = $("#cod_prov").val();

		if (codsede == "" || codprov == "")
		{ 
			alert("Ud. No ha realizado ninguna búsqueda"); 
		}else{
	        document.forms[0].method='POST';
	        document.forms[0].action=CI.base_url+"index.php/segmentaciones/csvExport/ExportacionLocalsinRuta?codsede="+codsede+"&codprov="+codprov;
	        document.forms[0].target='_blank';
	        document.forms[0].submit();
    	}
	}
</script>