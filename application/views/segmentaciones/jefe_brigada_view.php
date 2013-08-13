<link rel="stylesheet" href="<?php echo base_url('css/jquery-ui-1.10.3.custom.min.css') ?>">
<link rel="stylesheet" href="<?php echo base_url('css/ui.jqgrid.css') ?>">
<script src="<?php echo base_url('js/jqgrid/i18n/grid.locale-es.js'); ?>"></script>
<script src="<?php echo base_url('js/jqgrid/jquery.jqGrid.min.js'); ?>"></script>
<script src="<?php echo base_url('js/segmentaciones.js'); ?>"></script>

<?php

	$sedeArray = array(-1 => 'Seleccione...');
    foreach($sedeoperativa->result() as $filas)
    {
      $sedeArray[$filas->cod_sede_operativa]=utf8_encode(strtoupper($filas->sede_operativa));
    }
    

    $provArray = array(-1 => '');
    $jefeArray = array(-1 => '');
    $rutaArray = array(-1 => '');
    $localArray = array(-1 => '');

$txtECodLocal =array( 
	'name'	=> 'ecodlocal',	
	'id'	=> 'ecodlocal',	
	'value'	=> set_value('ecodlocal'),
	'readonly' => 'true',
	'style' => 'width: 50px;'	
);

$departamento =array(
	'name'	=> 'depa',
	'id'	=> 'depa',
	'value'	=> set_value('depa'),
	'readonly' => 'true',
	'style' => 'width: 120px;'
);

$provincia =array(
	'name'	=> 'prov',
	'id'	=> 'prov',
	'value'	=> set_value('prov'),
	'readonly' => 'true',
	'style' => 'width: 120px;'
);

$distrito =array(
	'name'	=> 'dist',
	'id'	=> 'dist',
	'value'	=> set_value('dist'),
	'readonly' => 'true',
	'style' => 'width: 120px;'
);

$centro_poblado =array(
	'name'	=> 'cent_pob',
	'id'	=> 'cent_pob',
	'value'	=> set_value('cent_pob'),
	'readonly' => 'true',
	'style' => 'width: 120px;'
);

$fecha_inicio =array(
	'name'	=> 'fxinicio',
	'id'	=> 'fxinicio',
	'value'	=> set_value('fxinicio'),
	'maxlength'	=> 10,
	'style' => 'width: 70px;',
	'tabindex' => '5',
	'onblur' => 'validaFechaDDMMAAAA(this.value)',
	'onkeypress' => 'return validar_fechas(event)'
);

$fecha_final =array(
	'name'	=> 'fxfinal',
	'id'	=> 'fxfinal',
	'value'	=> set_value('fxfinal'),
	'maxlength'	=> 10,
	'style' => 'width: 70px;',
	'tabindex' => '6',
	'onblur' => 'validaFechaDDMMAAAA(this.value)',
	'onkeypress' => 'return validar_fechas(event)'
);

$traslado =array(
	'name'	=> 'traslado',
	'id'	=> 'traslado',
	'value'	=> set_value('traslado'),
	'maxlength'	=> 3,
	'style' => 'width: 60px;',
	'tabindex' => '7',
	'onblur' => 'valida_traslado(this)',
	'onkeypress' => 'return validar_decimales(event)'
);

$trabajo_supervisor =array(
	'name'	=> 'trabajo_supervisor',
	'id'	=> 'trabajo_supervisor',
	'value'	=> set_value('trabajo_supervisor'),
	'maxlength'	=> 3,
	'style' => 'width: 60px;',
	'tabindex' => '8',
	'onblur' => 'valida_trabajo(this)',
	'onkeypress' => 'return validar_decimales(event)'
);

$retorno_sede =array(
	'name'	=> 'retornosede',
	'id'	=> 'retornosede',
	'value'	=> set_value('retornosede'),
	'maxlength'	=> 1,
	'style' => 'width: 60px;',
	'tabindex' => '10',
	'onkeypress' => 'return valida_retorno(event)',
	'onblur' => 'calculo_general()'
);

$gabinete =array(
	'name'	=> 'gabinete',
	'id'	=> 'gabinete',
	'value'	=> set_value('gabinete'),
	'maxlength'	=> 1,
	'style' => 'width: 60px;',
	'tabindex' => '11',
	'onkeypress' => 'return valida_recugabidesc(event)',
	'onblur' => 'calcula_totaldias()'
);

$descanso =array(
	'name'	=> 'descanso',
	'id'	=> 'descanso',
	'value'	=> set_value('descanso'),
	'maxlength'	=> 1,
	'style' => 'width: 60px;',
	'tabindex' => '12',
	'onkeypress' => 'return valida_recugabidesc(event)',
	'onblur' => 'calcula_totaldias()'
);

$total_dias =array(
	'name'	=> 'totaldias',
	'id'	=> 'totaldias',
	'value'	=> set_value('totaldias'),	
	'style' => 'width: 60px;',
	'readonly' => 'true'
);

$movlocal_ma =array(
	'name'	=> 'movilocal_ma',
	'id'	=> 'movilocal_ma',
	'value'	=> set_value('movilocal_ma'),
	'maxlength'	=> 2,
	'style' => 'width: 60px;',
	'tabindex' => '13',
	'onkeypress' => 'return validar_decimales(event)',
	'onblur' => 'validar_movi_ma(this.value)'
);

$gastoperativo_ma =array(
	'name'	=> 'gastooperativo_ma',
	'id'	=> 'gastooperativo_ma',
	'value'	=> set_value('gastooperativo_ma'),
	'maxlength'	=> 10,
	'style' => 'width: 60px;',
	'tabindex' => '14',
	'onkeypress' => 'return validar_decimales(event)',
	'onblur' => 'validar_gasto_ma(this.value)'
);

$movlocal_af =array(
	'name'	=> 'movilocal_af',
	'id'	=> 'movilocal_af',
	'value'	=> set_value('movilocal_af'),
	'readonly' => 'true',
	'style' => 'width: 60px;',
);

$gastoperativo_af =array(
	'name'	=> 'gastooperativo_af',
	'id'	=> 'gastooperativo_af',
	'value'	=> set_value('gastooperativo_af'),
	'readonly' => 'true',
	'style' => 'width: 60px;',
);

$pasaje =array(
	'name'	=> 'pasaje',
	'id'	=> 'pasaje',
	'value'	=> set_value('pasaje'),
	'maxlength'	=> 6,
	'style' => 'width: 60px;',
	'tabindex' => '15',
	'onkeypress' => 'return validar_decimales(event)',
	'onblur' => 'calcula_totalaf()'
);

$total_af =array(
	'name'	=> 'total_af',
	'id'	=> 'total_af',
	'value'	=> set_value('total_af'),
	'readonly' => 'true',
	'style' => 'width: 60px;',
);


$observaciones =array(
	'name'	=> 'observaciones',
	'id'	=> 'observaciones',
	'value'	=> set_value('observaciones'),
	'maxlength'	=> 200,
	'style' => 'width: 350px;',
	'tabindex' => '16',
	'rows' => '4',
	'cols' => '6'
);

$txtBuscarCodigo = array(
	'name'	=> 'BuscarCodigo',
	'id'	=> 'BuscarCodigo',
	'value' => set_value('BuscarCodigo'),
	'maxlength'	=> 6,
	'style' => 'width: 100px;',	
	'onkeypress' => 'return validar_numeros(event)',
	'onpaste' => 'return false;'
);

$btnconsultar = array(
    'name' => 'consulta',
    'id' => 'consulta',
    'type' => 'button',
    'class' => 'btn btn-primary pull-left',
    'style' => 'margin-top:20px',
    'tabindex' => '2',
    'onclick' => 'buscar_local()'
);

$btnagregar = array(
    'name' => 'agregar',
    'id' => 'agregar',
    'onclick' => 'Form_Validar()',
    'type' => 'button',
    'content' => 'Agregar',
    'tabindex' => '17',
    'class' => 'btn btn-primary pull-left'
);

$btnBuscarCodigoLocal = array(
	'name' => 'BuscarCL',
	'id' => 'BuscarCL',
	'type' => 'button',
	'onclick' => 'BuscarCodigoLocal()',
    'content' => 'Buscar Código de Local',
    'class' => 'btn btn-primary pull-right'
);

$btnRecargar = array(
    'name' => 'recargar',
    'id' => 'recargar',    
    'type' => 'button',
    'content' => 'Recargar',
    'onclick' => 'mostrar();',
    'class' => 'btn btn-inverse pull-left'
);

$btneliminar = array(
    'name' => 'eliminar',
    'id' => 'eliminar',    
    'type' => 'button',
    'style' => 'margin-left:5px',
    'content' => 'Eliminar',
    'class' => 'btn btn-inverse pull-right'
);

$attr = array('id' => 'frm_registro');
?>
<div class="row-fluid">
	<div class="span12">
		<div id="ap-content" class="span12">
			<div class="row-fluid well top-conv">
				<div class="span2">
					<div class="control-group">
							<?php echo form_label('Sede Operativa', 'sede'); ?>
						<div class="controls">
							<?php echo form_dropdown('sedeoperativa', $sedeArray, '#', 'id="sedeoperativa" onChange="cargarProvOpe();" style="width:100%"'); ?>
						</div>
					</div>
				</div>
				<div class="span2">
					<div class="control-group">
							<?php echo form_label('Provincia Operativa', 'provincia'); ?>
						<div class="controls">
							<?php echo form_dropdown('provoperativa', $provArray, '#', 'id="provoperativa" onChange="cargar_JB();" style="width:100%"'); ?>
						</div>
					</div>
				</div>
				<div class="span2">
					<div class="control-group">
							<?php echo form_label('Jefe de Brigada', 'jefe'); ?>
						<div class="controls">
							<?php echo form_dropdown('jefebrigada', $jefeArray, '#', 'id="jefebrigada" onChange="cargar_rutas_JB();" style="width:100%"'); ?>
						</div>
					</div>
				</div>
				<div class="span2">
					<div class="control-group">
							<?php echo form_label('Código de Ruta', 'ruta'); ?>
						<div class="controls">
							<?php echo form_dropdown('codigoruta', $rutaArray, '#', 'id="codigoruta" onChange="cargar_colegios_JB();" style="width:100%"'); ?>
						</div>
					</div>
				</div>
				<div class="span2">
					<div class="control-group">
							<?php echo form_label('Código de Colegio', 'colegio'); ?>
						<div class="controls">
							<?php echo form_dropdown('codigocolegio', $localArray, '#', 'id="codigocolegio" onChange="mostrar_ubigeo_colegio();" style="width:100%"'); ?>
						</div>
					</div>
				</div>
				<div class="span1">
					<?php echo form_button($btnconsultar, 'Consulta'); ?>	
				</div>
			</div>
		</div>
		<?php echo form_open('',$attr); ?>		
		<div id="ap-content" class="span12">
		<table >
			<tbody>
				<tr align="center">
					<td><?php echo form_label('Código de Local', 'lblCodLocal'); ?></td>
					<td><?php echo form_label('Departamento', 'lblDepartamento'); ?></td>
					<td><?php echo form_label('Provincia', 'lblProvincia'); ?></td>
					<td><?php echo form_label('Distrito', 'lblDistrito'); ?></td>
					<td><?php echo form_label('Centro Poblado', 'lblCentroPoblado'); ?></td>
					<td><?php echo form_label('Fecha Inicio', 'lblFechaInicio'); ?></td>
					<td><?php echo form_label('Fecha Final', 'lblFechaFinal'); ?></td>
					<td><?php echo form_label('Traslado', 'lblTraslado'); ?></td>
					<td><?php echo form_label('Trabajo', 'lblTrabajo'); ?></td>
				</tr>
				<tr align="center">
					<td><?php echo form_input($txtECodLocal); ?></td>
					<td><?php echo form_input($departamento); ?></td>
					<td><?php echo form_input($provincia); ?></td>
					<td><?php echo form_input($distrito); ?></td>
					<td><?php echo form_input($centro_poblado); ?></td>
					<td><?php echo form_input($fecha_inicio); ?></td>
					<td><?php echo form_input($fecha_final); ?></td>
					<td><?php echo form_input($traslado); ?></td>
					<td><?php echo form_input($trabajo_supervisor); ?></td>
				</tr>				
				<tr align="center">
					<td><?php echo form_label('Retorno a Sede', 'lblRetornoSede'); ?></td>
					<td><?php echo form_label('Gabinete', 'lblGabinete'); ?></td>
					<td><?php echo form_label('Descanso', 'lblDescanso'); ?></td>
					<td><?php echo form_label('Total de Dias', 'lblTotalDias'); ?></td>
					<td><?php echo form_label('Movi. Local MA', 'lblMovLocalMA'); ?></td>
					<td><?php echo form_label('Gasto Ope. MA', 'lblGastoOpeMA'); ?></td>
					<td><?php echo form_label('Movi. Local AF', 'lblMovLocalAF'); ?></td>
					<td><?php echo form_label('Gasto Ope. AF', 'lblGastoOpeAF'); ?></td>
					<td><?php echo form_label('Pasaje', 'lblPasaje'); ?></td>
				</tr>
				<tr align="center">
					<td><?php echo form_input($retorno_sede); ?></td>
					<td><?php echo form_input($gabinete); ?></td>
					<td><?php echo form_input($descanso); ?></td>
					<td><?php echo form_input($total_dias); ?></td>
					<td><?php echo form_input($movlocal_ma); ?></td>
					<td><?php echo form_input($gastoperativo_ma); ?></td>
					<td><?php echo form_input($movlocal_af); ?></td>
					<td><?php echo form_input($gastoperativo_af); ?></td>
					<td><?php echo form_input($pasaje); ?></td>
				</tr>
				<tr>					
					<td><?php echo form_label('Total AF', 'lblTotalAF'); ?></td>
					<td colspan="4"><?php echo form_label('Observaciones', 'lblObservaciones'); ?></td>
					<td colspan="4"></td>
				</tr>
				<tr>					
					<td valign="top"><?php echo form_input($total_af); ?></td>
					<td colspan="4"><?php echo form_textarea($observaciones); ?></td>
					<td colspan="4">
						<?php echo form_button($btnagregar); ?>
						<input type="hidden" id="rangofechas" name="rangofechas" value="">
					</td>
				</tr>
			</tbody>
		</table>
		</div>
		<input type="hidden" name="existe" value="" id="existe" />
		<?php echo form_close(); ?>
	</div>
</div>
	<div class="form-search" style="float: right; margin-right: 20px; margin-bottom: 10px;">
		<?php echo form_input($txtBuscarCodigo); ?>
		<?php echo form_button($btnBuscarCodigoLocal); ?>		
	</div>
<div class="row-fluid">
	<div id="grid_content" class="span12">
		<table id="list2"></table>
		<div id="pager2"></div>
		<div class="span2 pull-right">
			<?php echo form_button($btnRecargar); ?>
			<?php echo form_button($btneliminar); ?>
		</div>
	</div>
</div>

<script type="text/javascript">

	$(document).ready(function() {
		jQuery("#list2").jqGrid({
		   	type:"POST",
		   	url:'registro_rutas/ver_datos',
			datatype: "json",
			height: 255,
		   	colNames:['Centro Poblado', 'Provincia Operativa', 'Local', 'F. Inicio', 'F. Final', 'Traslado', 'Trabajo', 'Recuperación', 'Retorno Sede', 'Gabinete', 'Descanso', 'Total Dias', 'Mov. Local MA', 'Gasto Op. MA', 'Mov. Local AF', 'Gasto Op. AF', 'Pasaje', 'Total AF', 'Observaciones', 'Ruta'],
		   	colModel:[		   		
		   		{name:'centroPoblado',index:'centroPoblado', width:100, align:"center"},
		   		{name:'prov_operativa_ugel',index:'prov_operativa_ugel', width:100, align:"center"},
		   		{name:'codlocal',index:'codlocal', width:100},		   		
		   		{name:'fxinicio',index:'convert(datetime,fxinicio)', width:80, align:"center"},
		   		{name:'fxfinal',index:'convert(datetime,fxfinal)', width:80,},
		   		{name:'traslado',index:'traslado', width:80, align:"center"},
		   		{name:'trabajo_supervisor',index:'trabajo_supervisor', width:80,},
		   		{name:'recuperacion',index:'recuperacion', width:80,},
		   		{name:'retornosede',index:'retornosede', width:80,},
		   		{name:'gabinete',index:'gabinete', width:80,},
		   		{name:'descanso',index:'descanso', width:80,},
		   		{name:'totaldias',index:'totaldias', width:80,},
		   		{name:'movilocal_ma',index:'movilocal_ma', width:80,},
		   		{name:'gastooperativo_ma',index:'gastooperativo_ma', width:80,},
		   		{name:'movilocal_af',index:'movilocal_af', width:80,},
		   		{name:'gastooperativo_af',index:'gastooperativo_af', width:80,},
		   		{name:'pasaje',index:'pasaje', width:80,},
		   		{name:'total_af',index:'total_af', width:80,},
		   		{name:'observaciones',index:'observaciones', width:150,},
		   		{name:'idruta',index:'idruta', width:90},
		   	],
		   	pager: '#pager2',
		   	rowNum:10,
		   	rowList:[10,20,30],
		   	sortname: 'convert(datetime,fxinicio,103), prov_operativa_ugel',
		    viewrecords: true,
		    sortorder: "asc",
		    caption:"Lista de Rutas",
		    editurl:"registro_rutas/eliminar"
		});
		jQuery("#list2").jqGrid('navGrid','#pager2',{edit:false,add:false,del:false,search:false});
		$("#list2").setGridWidth($('#grid_content').width(), true);
	});

$("#eliminar").click(function(){
	var gr = jQuery("#list2").jqGrid('getGridParam','selrow');
	if( gr != null ) jQuery("#list2").jqGrid('delGridRow',gr,{reloadAfterSubmit:true});
	else alert("Por Favor Seleccionar la Fila a ELiminar!");
});

	function mostrar()
	{
		var codsede = $("#sedeoperativa").val();
		var codprov = $("#provoperativa").val();
		
		if (codsede == -1 || codprov == -1 )
		{ alert("Debe Seleccionar una Sede y Provincia Operativa");
		}else{
			jQuery("#list2").jqGrid('setGridParam',{url:"registro_rutas/ver_datos?codsede="+codsede+"&codprov="+codprov,page:1}).trigger("reloadGrid");
		}
	}

	function BuscarCodigoLocal()
	{
    	var codigolocal = $("#BuscarCodigo").val();

    	if (codigolocal == "")
    	{
    		alert("Ingrese un Código de Local a Buscar");
    	}else{
    		jQuery("#list2").jqGrid('setGridParam',{url:"registro_rutas/Buscar_Grilla?codigolocal="+codigolocal,page:1}).trigger("reloadGrid");
    		$("#BuscarCodigo").val('');
    	}
	}

</script>