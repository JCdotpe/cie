<link rel="stylesheet" href="<?php echo base_url('css/jquery-ui-1.10.3.custom.min.css') ?>">
<link rel="stylesheet" href="<?php echo base_url('css/ui.jqgrid.css') ?>">
<script src="<?php echo base_url('js/jqgrid/i18n/grid.locale-es.js'); ?>"></script>
<script src="<?php echo base_url('js/jqgrid/jquery.jqGrid.min.js'); ?>"></script>
<script src="<?php echo base_url('js/segmentaciones.js'); ?>"></script>

<style>
	.ui-jqgrid tr.jqgrow td {
		white-space: normal !important;
	}

    .clasliz{
		/*lista de rutas*/
		/*background-color: #000 !important;*/
		width: 1210px !important;
		/*border-width: 10px !important;*/
		position: relative !important;
		top: 0px !important;
		right:30px !important;

	}

	.claslii{

		border-width: 0px !important;
		background-color: #F2F2F1 !important;
		height: 0px !important;
	}

	.sedeopera{
		position: relative !important;
		top:5px !important;

	}

	.provope{
	position: relative !important;
	left:20px !important;
	top:5px !important;	
	}

	.codrutas{
	position: relative !important;
	left:55px !important;
	top:15px !important;	
	
	}

	.peri{
	position: relative !important;
	left:10px !important;
	top:15px !important;

	}

	.arribderech{
	position: relative !important;
	top: 25px !important;
	left: 60px !important;	
	/*width:10% !important;*/

	}


	 /*Boton Visualizar*/ 
	.clasbv{
		position: relative;
		left:10px !important; 
		top: 20px !important;
		/*font-weight:bold !important;
		font-size: 10px !important;*/
	}

	.ui-jqgrid-sortable{
		font-size: 10px !important;
	}


	.ui-jqgrid-title{
		font-size: 15px !important;
	}

	.ui-jqgrid-btable{
		width: 1210px !important;
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

	$txtPeriodo_Uno =array(
		'name'	=> 'periodo_uno',
		'id'	=> 'periodo_uno',
		'value'	=> set_value('periodo_uno'),
		'maxlength'	=> 2,	
		'style' => 'width: 30px;',	
		'onpaste' => 'return false;',	
		'onkeypress' => 'return validar_numeros(event)'
	);

	$txtPeriodo_Dos =array(
		'name'	=> 'periodo_dos',
		'id'	=> 'periodo_dos',
		'value'	=> set_value('periodo_dos'),
		'maxlength'	=> 2,	
		'style' => 'width: 30px;',	
		'onpaste' => 'return false;',	
		'onkeypress' => 'return validar_numeros(event)'
	);
?>

<div class="row-fluid">
	<div class="row-fluid">
		<div id="ap-sidebar" class="span2">
			<?php $this->load->view('informes/includes/sidebar_segmentacion_view.php'); ?>
		</div>
		<div id="ap-content" class="span10 arribderech">
			<div class="row-fluid well top-conv claslii">
				<?php echo form_open('','id="frm_reporte"'); ?>
				<div class="span3 sedeopera">
					<div class="control-group">
						<?php echo form_label('Sede Operativa', 'sede', $label_class); ?>
						<div class="controls">
							<?php echo form_dropdown('sedeoperativa', $sedeArray, '#', 'id="sedeoperativa" onChange="cargarProvOpe();"'); ?>
						</div>
					</div>
				</div>
				<div class="span3 provope">
					<div class="control-group">
						<?php echo form_label('Provincia Operativa', 'provincia', $label_class); ?>
						<div class="controls">
							<?php echo form_dropdown('provoperativa', $provArray, '#', 'id="provoperativa"'); ?>
						</div>
					</div>
				</div>
				<div class="span2 codrutas">
					<div class="control-group">
						<?php echo form_label('Código de Ruta', 'ruta', $label_class); ?>
						<div class="controls">
							<?php echo form_input($txtCodRuta); ?>			
						</div>
					</div>
				</div>
				<div class="span2 peri">
					<div class="control-group">
						<?php echo form_label('Periodos', 'periodos', $label_class); ?>
						<div class="controls">
							<?php echo form_input($txtPeriodo_Uno); ?> -
							<?php echo form_input($txtPeriodo_Dos); ?>
						</div>
					</div>
				</div>
				<div class="span1 clasbv">
					<?php echo form_button('ver','Visualizar','class="btn btn-primary" id="ver" style="margin-top:20px" onClick="reportar()"'); ?>
				</div>
			</div>
			<input type="hidden" name="cod_sede" id="cod_sede" value="" />
			<input type="hidden" name="cod_prov" id="cod_prov" value="" />
			<input type="hidden" name="cod_ruta" id="cod_ruta" value="" />
			<input type="hidden" name="periodo_1" id="periodo_1" value="" />
			<input type="hidden" name="periodo_2" id="periodo_2" value="" />
			<?php echo form_close(); ?>			
		</div>
		<div id="grid_content" class="span12 clasliz">
			<div class="span12">
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
		   	url:'listado_rutas/obtenreporte',
			datatype: "json",
			height: 255,
		   	colNames:['Nro', 'Departamento', 'Provincia', 'Distrito', 'Centro Poblado', 'Nombres de IEs', 'Codigo de Local', 'Dirección', 'Nivel Educativo', 'UGEL', 'Periodo', 'Area', 'Código de Ruta'],
		   	colModel:[
				{name:'nro_fila',sortable:false,width:25,align:"center"},
				{name:'NomDept',index:'NomDept',width:40,align:"center"},
				{name:'NomProv',index:'NomProv',width:40,align:"center"},
				{name:'NomDist',index:'NomDist',width:40,align:"center"},
				{name:'centroPoblado',index:'centroPoblado',width:40,align:"center"},
				{name:'nombres_IIEE',index:'nombres_IIEE',width:40,align:"center"},
				{name:'codlocal',index:'codlocal',width:40,align:"center"},
				{name:'direccion',index:'direccion',width:40,align:"center"},
				{name:'niveles_educativos',index:'niveles_educativos',width:40,align:"center"},
				{name:'ugel',index:'ugel',width:40,align:"center"},
				{name:'periodo',index:'periodo',width:40,align:"center"},
				{name:'area',index:'area',width:40,align:"center"},
				{name:'idruta',index:'idruta',width:40,align:"center"}
		   	],
			rowNum:10,
			rowList:[10,20,30],
			pager: '#pager2',
			sortname: 'convert(datetime,fxinicio,103), periodo, prov_operativa_ugel',
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
		var periodo_1 = $("#periodo_uno").val();
		var periodo_2 = $("#periodo_dos").val();

		if (codsede == -1 || codprov == -1 || codruta == "" || periodo_1 == "" || periodo_2 == "")
		{ alert("Faltan Datos para Realizar la Busqueda!"); 
		}else{
			$("#cod_sede").val(codsede);
			$("#cod_prov").val(codprov);
			$("#cod_ruta").val(codruta);
			$("#periodo_1").val(periodo_1);
			$("#periodo_2").val(periodo_2);

			jQuery("#list2").jqGrid('setGridParam',{url:"listado_rutas/obtenreporte?codsede="+codsede+"&codprov="+codprov+"&codruta="+codruta+"&per_uno="+periodo_1+"&per_dos="+periodo_2,page:1}).trigger("reloadGrid");
		}
	}

	function exportExcel()
	{
        var codsede = $("#cod_sede").val();
		var codprov = $("#cod_prov").val();
		var codruta = $("#cod_ruta").val();
		var periodo_1 = $("#periodo_1").val();
		var periodo_2 = $("#periodo_2").val();

		if (codsede == "" || codprov == "" || codruta == "" || periodo_1 == "" || periodo_2 == "")
		{ alert("Ud. No ha realizado ninguna búsqueda");
		}else{
			document.forms[0].method='POST';
			document.forms[0].action=CI.base_url+"index.php/segmentaciones/csvExport/ExportacionListadoRutas?codsede="+codsede+"&codprov="+codprov+"&codruta="+codruta+"&per_uno="+periodo_1+"&per_dos="+periodo_2;
			document.forms[0].target='_blank';
			document.forms[0].submit();
		}
	}
</script>