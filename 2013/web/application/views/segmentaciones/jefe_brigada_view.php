<link rel="stylesheet" href="<?php echo base_url('css/jquery-ui-1.10.3.custom.min.css') ?>">
<link rel="stylesheet" href="<?php echo base_url('css/ui.jqgrid.css') ?>">
<script src="<?php echo base_url('js/jqgrid/i18n/grid.locale-es.js'); ?>"></script>
<script src="<?php echo base_url('js/jqgrid/jquery.jqGrid.min.js'); ?>"></script>
<script src="<?php echo base_url('js/segmentaciones.js'); ?>"></script>



<style type="text/css">
	/*span11{
		background-color: #000 !important;
	}*/

	#ap-content{
		width:1200px !important;
		/*background-color: #000 !important;*/ 
		/*border-width: 0px !important;*/
		
	}


	.clasliz{
		/*lista de rutas*/
		/*background-color: #000 !important;*/
		width: 1210px !important;
		/*border-width: 10px !important;*/
		position: relative !important;
		top: 20px !important;
	}


	.ui-jqgrid-sortable{
		font-size: 10px !important;
	}


	.ui-jqgrid-title{
		font-size: 15px !important;
	}


/*	.ui-jqgrid-htable{
		width:1210px !important;
	}*/
	
	

	.capa{
		/*boton buscar*/
		position: relative !important;
		left:60px !important;
		top: 25px !important;
        /*float: right;*/
        /*margin-right: 20px !important;*/
        margin-bottom: 20px !important;


	}


	.medio{
		position: relative !important;
		/*left:0px !important;*/
		top: 10px !important;
		font-family: arial !important;
		font-size: 0px !important;
		width: 1200px !important;
		

	}


	.claslii
	{
		border-width: 0px !important;
		background-color: #F2F2F1 !important;
		height: 0px !important;
	}


	.clasgrupo{
		/*background-color:#000 !important ;*/
		font-size: 100px !important;
		/*width: 1200px !important;*/
		height: 70px !important;
	}

	span2 .clasgrupo1{

	/*font-size: 100px !important;*/
	height: 70px !important;

	}

	.clasbc{
		position: relative;
		/*left:20px !important; */
		top:20px !important;
		/*font-weight:bold !important;
		font-size: 10px !important;*/

	}

	.clasbtn2{
		/*botones recargar y*/
		position: relative;
		top: 5px !important;
		/*left: 50px !important;*/
		
		/*background-color: #000 !important;*/
	}

	/*.ui-jqgrid-btable{
		width: 10px !important;
	}*/
.ui-jqgrid-btable{
	width: 1210px !important;
}




.span11{
/*background-color: #000 !important;*/
width: 1210px !important;

}

.tbody{

/*background-color: #000 !important;*/
width: 1500px !important;	
text-align: center !important;
}



</style>



<?php

	$sedeArray = array(-1 => 'Seleccione...');
    foreach($sedeoperativa->result() as $filas)
    {
      $sedeArray[$filas->cod_sede_operativa]=utf8_encode(strtoupper($filas->sede_operativa));
    }

    $provArray = array(-1 => '');
    $jefeArray = array(-1 => '');
    
$txtcodigolocal = array(
	'name'	=> 'codigolocal',
	'id'	=> 'codigolocal',
	'value' => set_value('codigolocal'),
	'maxlength'	=> 6,
	'style' => 'width: 120px;',
	'tabindex' => '1',
	'onkeypress' => 'return validar_numeros(event)',
	'onpaste' => 'return false;'
);

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

$periodo =array(
	'name'	=> 'periodo',
	'id'	=> 'periodo',
	'value'	=> set_value('periodo'),
	'maxlength'	=> 2,
	'style' => 'width: 70px;',
	'tabindex' => '3',
	'onblur' => 'valida_periodo_jb(this)',
	'onkeypress' => 'return validar_numeros(event)'
);

$fecha_inicio =array(
	'name'	=> 'fxinicio',
	'id'	=> 'fxinicio',
	'value'	=> set_value('fxinicio'),
	'maxlength'	=> 10,
	'style' => 'width: 70px;',
	'tabindex' => '4',
	'onblur' => 'validaFechaDDMMAAAA(this.value)',
	'onkeypress' => 'return validar_fechas(event)'
);

$fecha_final =array(
	'name'	=> 'fxfinal',
	'id'	=> 'fxfinal',
	'value'	=> set_value('fxfinal'),
	'maxlength'	=> 10,
	'style' => 'width: 70px;',
	'tabindex' => '5',
	'onblur' => 'validaFechaDDMMAAAA(this.value)',
	'onkeypress' => 'return validar_fechas(event)'
);

$traslado =array(
	'name'	=> 'traslado',
	'id'	=> 'traslado',
	'value'	=> set_value('traslado'),
	'maxlength'	=> 1,
	'style' => 'width: 60px;',
	'tabindex' => '6',
	'onblur' => 'valida_traslado_jb(this)',
	'onkeypress' => 'return validar_numeros(event)'
);

$trabajo_supervisor =array(
	'name'	=> 'trabajo_supervisor',
	'id'	=> 'trabajo_supervisor',
	'value'	=> set_value('trabajo_supervisor'),
	'maxlength'	=> 1,
	'style' => 'width: 60px;',
	'tabindex' => '7',
	'onblur' => 'valida_trabajo_jb(this)',
	'onkeypress' => 'return validar_numeros(event)'
);

$retorno_sede =array(
	'name'	=> 'retornosede',
	'id'	=> 'retornosede',
	'value'	=> set_value('retornosede'),
	'maxlength'	=> 1,
	'style' => 'width: 60px;',
	'tabindex' => '8',
	'onkeypress' => 'return valida_retorno(event)',
	'onblur' => 'calculo_general()'
);

$gabinete =array(
	'name'	=> 'gabinete',
	'id'	=> 'gabinete',
	'value'	=> set_value('gabinete'),
	'maxlength'	=> 1,
	'style' => 'width: 60px;',
	'tabindex' => '9',
	'onkeypress' => 'return valida_recugabidesc(event)',
	'onblur' => 'calcula_totaldias()'
);

$descanso =array(
	'name'	=> 'descanso',
	'id'	=> 'descanso',
	'value'	=> set_value('descanso'),
	'maxlength'	=> 1,
	'style' => 'width: 60px;',
	'tabindex' => '10',
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
	'tabindex' => '11',
	'onkeypress' => 'return validar_decimales(event)',
	'onblur' => 'validar_movi_ma(this.value)'
);

$gastoperativo_ma =array(
	'name'	=> 'gastooperativo_ma',
	'id'	=> 'gastooperativo_ma',
	'value'	=> set_value('gastooperativo_ma'),
	'maxlength'	=> 10,
	'style' => 'width: 60px;',
	'tabindex' => '12',
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
	'tabindex' => '13',
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
	'tabindex' => '14',
	'rows' => '4',
	'cols' => '6'
);

$btnconsultar = array(
    'name' => 'consulta',
    'id' => 'consulta',
    'type' => 'button',
    'class' => 'btn btn-primary pull-left',
    'style' => 'margin-top:20px',
    'tabindex' => '2',
    'onclick' => 'cargar_info_jefebrigada()'
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

$btnagregar = array(
    'name' => 'agregar',
    'id' => 'agregar',
    'onclick' => 'Form_Validar_JB()',
    'type' => 'button',
    'content' => 'Registrar Datos',
    'tabindex' => '15',
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
			<div class="row-fluid well top-conv claslii">
				<div class="span3 clasgrupo">
					<div class="control-group">
							<?php echo form_label('Sede Operativa', 'sede'); ?>
						<div class="controls">
							<?php echo form_dropdown('sedeoperativa', $sedeArray, '#', 'id="sedeoperativa" onChange="cargarProvOpe();" style="width:100%"'); ?>
						</div>
					</div>
				</div>
				<div class="span3 clasgrupo">
					<div class="control-group">
							<?php echo form_label('Provincia Operativa', 'provincia'); ?>
						<div class="controls">
							<?php echo form_dropdown('provoperativa', $provArray, '#', 'id="provoperativa" onChange="cargar_JB();" style="width:100%"'); ?>
						</div>
					</div>
				</div>
				<div class="span2 clasgrupo1">
					<div class="control-group">
							<?php echo form_label('Jefe de Brigada', 'jefe'); ?>
						<div class="controls">
							<?php echo form_dropdown('jefebrigada', $jefeArray, '#', 'id="jefebrigada" onChange="mostrar_grilla_jb();" style="width:100%"'); ?>
						</div>
					</div>
				</div>
				<div class="span2 clasgrupo1">
					<div class="control-group">
							<?php echo form_label('Código de Local Educativo', 'local'); ?>
						<div class="controls">
							<?php echo form_input($txtcodigolocal); ?>	
						</div>
					</div>
				</div>
				<div class="span1 clasbc">
					<?php echo form_button($btnconsultar, 'Consulta'); ?>
				</div>
			</div>
		</div>
		<?php echo form_open('',$attr); ?>		
		<div id="ap-content" class="span12 medio">
		<table class=tbody >
			<tbody>
				<tr align="center">
					<td><?php echo form_label('Código de Local', 'lblCodLocal'); ?></td>
					<td><?php echo form_label('Departamento', 'lblDepartamento'); ?></td>
					<td><?php echo form_label('Provincia', 'lblProvincia'); ?></td>
					<td><?php echo form_label('Distrito', 'lblDistrito'); ?></td>
					<td><?php echo form_label('Centro Poblado', 'lblCentroPoblado'); ?></td>
					<td><?php echo form_label('Periodo', 'lblPeriodo'); ?></td>
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
					<td><?php echo form_input($periodo); ?></td>
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
					<td><?php echo form_label('Total AF', 'lblTotalAF'); ?></td>
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
					<td><?php echo form_input($total_af); ?></td>
				</tr>
				<tr>		
					<td colspan="4"><?php echo form_label('Observaciones', 'lblObservaciones'); ?></td>
					<td colspan="4"></td>
				</tr>
				<tr>				
					<td colspan="4"><?php echo form_textarea($observaciones); ?></td>
					<td colspan="5">
						<?php echo form_button($btnagregar); ?>
						<input type="hidden" id="rangofechas" name="rangofechas" value="">
					</td>
				</tr>
			</tbody>
		</table>
		</div>
		<?php echo form_close(); ?>
	</div>
</div>

<div class="capa">
	<div class="form-search" style="float: right; margin-right: 20px; margin-bottom: 10px;">
		<div class="row-fluid" style="margin-right: 10px">
		<?php echo form_input($txtBuscarCodigo); ?>
		<?php echo form_button($btnBuscarCodigoLocal); ?>
		</div>		
	</div>
</div>


<div class="row-fluid">
	<div id="grid_content" class="span12 clasliz">
		<table id="list2"></table>
		<div id="pager2"></div>
		<div class="span2 pull-right clasbtn2">
			<?php echo form_button($btneliminar); ?>
		</div>
	</div>
</div>

<script type="text/javascript">

	$(document).ready(function() {
		jQuery("#list2").jqGrid({
		   	type:"POST",
		   	url:'registro_jefe_brigada/ver_datos',
			datatype: "json",
			height: 255,
		   	colNames:['C. Poblado', 'Prov. Operativa', 'Local', 'Periodo', 'F. Inicio', 'F. Final', 'Traslado', 'Trabajo', 'Ret. Sede', 'Gabinete', 'Descanso', 'T. Dias', 'Mov. Local MA', 'Gasto Op. MA', 'Mov. Local AF', 'Gasto Op. AF', 'Pasaje', 'Total AF', 'Obs.', 'Ruta'],
		   	colModel:[		   		
		   		{name:'centroPoblado',index:'centroPoblado', width:100, align:"center"},
		   		{name:'prov_operativa_ugel',index:'prov_operativa_ugel', width:100, align:"center"},
		   		{name:'codigo_de_local',index:'codigo_de_local', width:100},
		   		{name:'periodo_jb',index:'periodo_jb', width:100},
		   		{name:'fxinicio_jb',index:'convert(datetime,fxinicio_jb,103)', width:100, align:"center"},
		   		{name:'fxfinal_jb',index:'convert(datetime,fxfinal_jb,103)', width:100,},
		   		{name:'traslado_jb',index:'traslado_jb', width:100, align:"center"},
		   		{name:'trabajo_supervisor_jb',index:'trabajo_supervisor_jb', width:100,},
		   		{name:'retornosede_jb',index:'retornosede_jb', width:100,},
		   		{name:'gabinete_jb',index:'gabinete_jb', width:100,},
		   		{name:'descanso_jb',index:'descanso_jb', width:100,},
		   		{name:'totaldias_jb',index:'totaldias_jb', width:100,},
		   		{name:'movilocal_ma_jb',index:'movilocal_ma_jb', width:100,},
		   		{name:'gastooperativo_ma_jb',index:'gastooperativo_ma_jb', width:100,},
		   		{name:'movilocal_af_jb',index:'movilocal_af_jb', width:100,},
		   		{name:'gastooperativo_af_jb',index:'gastooperativo_af_jb', width:100,},
		   		{name:'pasaje_jb',index:'pasaje_jb', width:100,},
		   		{name:'total_af_jb',index:'total_af_jb', width:100,},
		   		{name:'observaciones_jb',index:'observaciones_jb', width:100,},
		   		{name:'idruta',index:'idruta', width:100},
		   	],
		   	pager: '#pager2',
		   	rowNum:10,
		   	rowList:[10,20,30],
		   	sortname: 'convert(datetime,fxinicio_jb,103), prov_operativa_ugel',
		    viewrecords: true,
		    sortorder: "asc",
		    editurl:"registro_jefe_brigada/eliminar",
		    caption:"Lista de Rutas de Jefe de Brigada"
		});
		jQuery("#list2").jqGrid('navGrid','#pager2',{edit:false,add:false,del:false,search:false});
		$("#list2").setGridWidth($('#grid_content').width(), true);
	});

	$("#eliminar").click(function(){
		var gr = jQuery("#list2").jqGrid('getGridParam','selrow');
		if( gr != null ) jQuery("#list2").jqGrid('delGridRow',gr,{reloadAfterSubmit:true});
		else alert("Por Favor Seleccionar la Fila a ELiminar!");
	});
	
	function BuscarCodigoLocal()
	{
    	var codigolocal = $("#BuscarCodigo").val();

    	if (codigolocal == "")
    	{
    		alert("Ingrese un Código de Local a Buscar");
    	}else{
    		jQuery("#list2").jqGrid('setGridParam',{url:"registro_jefe_brigada/Buscar_Grilla_JB?codigolocal="+codigolocal,page:1}).trigger("reloadGrid");
    		$("#BuscarCodigo").val('');
    	}
	}

</script>