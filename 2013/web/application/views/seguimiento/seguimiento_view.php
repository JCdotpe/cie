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
	//$depaArray = array(-1 => 'Seleccione...');
	$sedeArray = array(-1 => 'Seleccione...');
	
    foreach($depa->result() as $filas)
    {
		//$depaArray[$filas->CCDD]=utf8_encode($filas->Departamento);
		$sedeArray[$filas->cod_sede_operativa] = utf8_encode(strtoupper($filas->sede_operativa));
    }
    //$selected_sede = (set_value('departamento')) ? set_value('departamento') : '' ;
	$provArray = array(-1 => '');
	$distArray = array(-1 => '');
	$centropArray = array(-1 => '');
	$rutasArray = array(-1 => '');
	$periodoArray = array(-1 => '');
?>

<div class="row-fluid">
	<div class="row-fluid">

		<div class="form-span10 row-fluid well top-conv" style="margin-left:0px;">

            <div class="span3" style="margin:0 auto; border-right:1px solid #CCC; width:340px;">

                    <div style="font-weight:bold; padding:0 0 15px 0; font-size:14px;">1. Busqueda de Locales por numero de Local.</div>

                    <div class="control-group">
                     
                        <label>Codigo de Local</label>
                        <div class="controls">
                            
                            <input id="cod_local" style="width:50px;float:left;" type="text" class="form-control">
                            <?php echo form_button('ver','Visualizar','class="btn btn-inverse" id="ver" onclick="verdatos(2)" style="margin-left:15px;"'); ?>
                        </div>

                    </div>

            </div>		


			    <div class="span2" style="width:640px;">
			     <div style="font-weight:bold; padding:0 0 10px 0; font-size:14px;">2. Busqueda de Locales Escolares por Departamento y Provincia.</div>

				<?php echo form_open('','id="frm_seguimiento"'); ?>

			
					<div class="control-group" style="float:left">
						<?php echo form_label('Sede Operativa', 'sedeoperativa', $label_class); ?>
						<div class="controls">
							<?php 
								echo form_dropdown('sedeoperativa', $sedeArray, '#', 'id="sedeoperativa" style="width:140px" onChange="cargarProvBySede();"');
							?>
						</div>
					</div>
			
				
					<div class="control-group;" style="float:left; margin-left:15px">
						<?php echo form_label('Provincia Operativa', 'provincia_ope', $label_class); ?>
						<div class="controls">
							<?php echo form_dropdown('provincia_ope', $provArray, '#', 'id="provincia_ope" style="width:140px; " onChange="cargarRutas();"'); ?>
						</div>
					</div>
				
				
					<div class="control-group;" style="float:left; margin-left:15px">
						<?php echo form_label('Código de Ruta', 'rutas', $label_class); ?>
						<div class="controls">
							<?php echo form_dropdown('rutas', $rutasArray, '#', 'id="rutas" style="width:140px" onChange="verdatos(1);"');
							?>
						</div>
					</div>

					<div class="control-group;" style="float:left; margin-left:15px">
						<?php echo form_label('Periodo de Trabajo', 'periodo', $label_class); ?>
						<div class="controls">
							<?php echo form_dropdown('periodo', $periodoArray, '#', 'id="periodo" style="width:140px;" onChange="verdatos(1);"');
							?>
						</div>
					</div>
				
			
			<?php echo form_close(); ?>

			</div>
		</div>
		<div class="row-fluid">
			<div id="grid_content" class="span12">
				<table id="list2"></table>
				<div id="pager2"></div>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">

	$(document).ready(function() {
		jQuery("#list2").jqGrid({
			type:"POST",
			url:'registro_seguimiento/ver_datos',
			datatype: "json",
			height: 255,
			colNames:['Periodo', 'Código de Local', 'Resultado de ET', 'Entrada de Información', 'Datos GPS', 'Fotos', 'Avance', 'Cedulas'],
			colModel:[
				{name:'periodo',index:'periodo',width:50, align:"center"},
				{name:'codigo_de_local',index:'codigo_de_local',width:80, align:"center"},
				{name:'estado',index:'estado', width:100,align:"center"},
				{name:'entrada_informacion',index:'entrada_informacion',width:120, align:"center"},
				{name:'datos_gps',index:'datos_gps', width:100, align:"center"},
				{name:'foto_ruta',index:'foto_ruta', width:80, align:"center"},
				{name:'avance',index:'avance', width:80, align:"center"},
				{name:'detalle',index:'detalle', width:80,  align:"center"}
			],
			pager: '#pager2',
			rowNum:20,
			rowList:[10,20,30],
			sortname: 'codigo_de_local',
			viewrecords: true,
			gridComplete: function(){
				var ids = jQuery("#list2").jqGrid('getDataIDs');
				for(var i=0;i < ids.length;i++){
					var cl = ids[i];
					be = "<input type='button' value='Diario' onclick=saveavance('"+cl+"') />";
					jQuery("#list2").jqGrid('setRowData',ids[i],{avance:be});
					be = "<input type='button' value='Diligenciadas' onclick=savedetalle('"+cl+"') />";
					jQuery("#list2").jqGrid('setRowData',ids[i],{detalle:be});
					

				}
			},
			sortorder: "asc",
			caption:"Resumen de Trabajo de Campo del Evaluador Técnico"
		});
		

		jQuery("#list2").jqGrid('setGroupHeaders', {
		  useColSpanStyle: true, 
		  groupHeaders:[
			{startColumnName: 'entrada_informacion', numberOfColumns: 3, titleText: 'TABLET'},
			{startColumnName: 'avance', numberOfColumns: 3, titleText: 'Registrar'}
		  ]	
		});




		jQuery("#list2").jqGrid('navGrid','#pager2',{edit:false,add:false,del:false,search:false});
		$("#list2").setGridWidth($('#grid_content').width(), true);
		

		//cargarRutas();
		cargarPeriodo();
	});
</script>


<!-- Modal de AVANCE -->
<?php
	$estadoArray = array(-1 => 'Seleccione...', 1=>'Completa', 2=>'Incompleta', 3=>'Rechazo', 4=>'Local Cerrado / Desocupado', 5=>'Otro');

	$txtFechaAvance = array(
	'name'	=> 'fecha_avance',
	'id'	=> 'fecha_avance',
	'value' => set_value('fecha_avance'),
	'onKeyUp' => 'javascript:this.value=formateafecha(this.value);',
	'maxlength'	=> 10,
	'style' => 'width:100px'
	);

	$txtEspecifique = array(
	'name'	=> 'especifique',
	'id'	=> 'especifique',
	'value' => set_value('especifique'),
	'maxlength'	=> 45,
	'style' => 'width:120px',
	'disabled' => 'disabled'
	);

	$btnAgregar = array(
		'name' => 'agregar',
		'id' => 'agregar',
		'onclick' => 'frm_ValidarAvance()',
		'type' => 'button',
		'content' => 'Agregar',		
		'class' => 'btn btn-inverse'
	);


	$attr = array('class' => 'form-val','id' => 'frm_avance', 'style' => 'overflow: auto;');
	echo form_open('', $attr);
?>
<style type="text/css">
	body .modal {
		width: 900px;
		margin-left: -480px;
	}
</style>
<!-- Modal save patrimonio -->
<div id="add-avance-modal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			<h3 id="myModalLabel">Registro de Resumen del Trabajo de Campo del Evaluador</h3>
		</div>
 
		<div class="modal-body">
			<div class="span8">
				<table class="table table-condensed">
					<thead>
						<tr>
							<th>CODIGO DE LOCAL</th>
							<th>FECHA</th>
							<th>ESTADO</th>
							<th>ESPECIFIQUE</th>
							<th></th>
						</tr>
					</thead>
					<tbody>
						<tr class="well">
							<td>
								<input type="text" id="codigo" name="codigo" value="" readonly="true" class="span1">
							</td>
							<td><?php echo form_input($txtFechaAvance); ?></td>
							<td><?php echo form_dropdown('estado', $estadoArray, '#', 'id="estado" onChange="activar_especifique();"'); ?></td>
							<td><?php echo form_input($txtEspecifique); ?></td>
							<td>
								<?php echo form_button($btnAgregar); ?>		
								<input type="hidden" id="usuario" name="usuario" value="<?php echo $user_id; ?>">
							</td>
						</tr>
					</tbody>
				</table>
				<div class="controls">
					<div id="grid_content_detail" class="span8">
						<table id="list3"></table>
						<div id="pager3"></div>
					</div>
				</div>
			</div>
		</div>
	<div class="modal-footer">
		<button class="btn" data-dismiss="modal" aria-hidden="true">Cerrar</button>		
	</div>
</div>
<?php echo form_close(); ?>
<script type="text/javascript">
	$(document).ready(function() {
		jQuery("#list3").jqGrid({
			type:"POST",
			url:'registro_seguimiento/ver_datos_avance',
			datatype: "json",
			height: 200,
			colNames:['Nro de Visita', 'Código de Local', 'Estado', 'Fecha de Visita', 'Fecha y Hora de Registro'],
			colModel:[
				{name:'nro_visita',index:'nro_visita', align:"center"},
				{name:'codlocal',index:'codlocal', align:"center"},
				{name:'NEstado',index:'estado', align:"center"},
				{name:'fecha_visita',index:'fecha_visita', align:"center"},
				{name:'fecha_hora',index:'fecha_registro', align:"center"}
				//{name:'modificar',index:'modificar', align:"center"},
				//{name:'eliminar',index:'eliminar', align:"center"}
			],
			pager: '#pager3',
			rowNum:10,
			rowList:[10,15,20],
			sortname: 'convert(datetime,fecha_visita,103)',
			viewrecords: true,
			/*gridComplete: function(){
				var ids = jQuery("#list3").jqGrid('getDataIDs');
				for(var i=0;i < ids.length;i++){
					var cl = ids[i];
					//bi = "<input type='button' value='Modificar' onclick=modificar_avance('"+cl+"') />";
					//be = "<input type='button' value='Eliminar' onclick=eliminar_avance('"+cl+"') />";

					//jQuery("#list3").jqGrid('setRowData',ids[i],{modificar:bi});
					//jQuery("#list3").jqGrid('setRowData',ids[i],{eliminar:be});
				}
			},*/
			sortorder: "asc",
			caption:"Lista de Avances"
		});
		jQuery("#list3").jqGrid('navGrid','#pager3',{edit:false,add:false,del:false,search:false});
		$("#list3").setGridWidth($('#grid_content_detail').width(), true);
	});

	
/*
	function modificar_avance(values)
	{
		var codigo = $('#codigo').val();
		var id = values;

		$.ajax({
			type: "POST",
			url: "seguimiento/seguimiento/Modificar_Avance",
			datatype: "json",
			data: "codigo="+codigo+"&id="+id,
			cache: false,
			success: function(data){
				//if (data.cantidad>0)
				//{
					$("#fecha_avance").val(data.fecha_visita);
					//$("#fecha_avance").attr({'disabled':'disabled'});
					$("#especifique").val(data.especifique);
				//}				
			}
		});
		return false;
	}

	function eliminar_avance(values)
	{
		var codigo = $('#codigo').val();
		var id = values;

		$.ajax({
			type: "POST",
			url: "seguimiento/seguimiento/Eliminar_Avance",
			datatype: "json",
			data: "codigo="+codigo+"&id="+id,
			cache: false,
			success: function(data){
				if (data>0)
				{
					$("#list3").trigger("reloadGrid");
					alert("Avance eliminado!");
				}
			}
		});
	}*/
</script>


<!-- Modal de DETALLE -->
<?php
	$cedArray = array();

	$txtCantidad = array(
	'name'	=> 'cantidad',
	'id'	=> 'cantidad',
	'value' => set_value('cantidad'),
	'onkeypress' => 'return validar_numeros(event)',
	'maxlength'	=> 7,
	'style' => 'width:100px'
	);

	$txtFechaDetalle = array(
	'name'	=> 'fecha_detalle',
	'id'	=> 'fecha_detalle',
	'value' => set_value('fecha_detalle'),
	'onKeyUp' => 'javascript:this.value=formateafecha(this.value);',
	'maxlength'	=> 10,
	'style' => 'width:100px'
	);

	$btnAgregar = array(
		'name' => 'agregar_dt',
		'id' => 'agregar_dt',
		'onclick' => 'frm_ValidarEnvio()',
		'type' => 'button',
		'content' => 'Agregar',		
		'class' => 'btn btn-inverse'
	);


	$attr = array('class' => 'form-val','id' => 'frm_detalle', 'style' => 'overflow: auto;');
	echo form_open('', $attr);
?>
<style type="text/css">
	body .modal {
		width: 900px;
		margin-left: -480px;
	}
</style>
<!-- Modal save patrimonio -->
<div id="add-detalle-modal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			<h3 id="myModalLabel">Registro de Cedulas Diligenciadas</h3>
		</div>
 
		<div class="modal-body">
			<div class="span8">
				<table class="table table-condensed">
					<thead>
						<tr>
							<th>CODIGO DE LOCAL</th>
							<th>CEDULA</th>
							<th>CANTIDAD</th>
							<th>FECHA</th>
							<th></th>
						</tr>
					</thead>
					<tbody>
						<tr class="well">
							<td>
								<input type="text" id="codigo_dt" name="codigo_dt" value="" readonly="true" class="span1">
							</td>
							<td><?php echo form_dropdown('cedula', $cedArray, '#', 'id="cedula"'); ?></td>
							<td><?php echo form_input($txtCantidad); ?></td>
							<td><?php echo form_input($txtFechaDetalle); ?></td>
							<td>
								<?php echo form_button($btnAgregar); ?>		
								<input type="hidden" id="usuario_dt" name="usuario_dt" value="<?php echo $user_id; ?>">
							</td>
						</tr>
					</tbody>
				</table>
				<div class="controls">
					<div id="grid_content_detail" class="span8">
						<table id="list4"></table>
						<div id="pager4"></div>
					</div>
				</div>
			</div>
		</div>
	<div class="modal-footer">
		<button class="btn" data-dismiss="modal" aria-hidden="true">Cerrar</button>		
	</div>
</div>
<?php echo form_close(); ?>

<script type="text/javascript">
	$(document).ready(function() {
		jQuery("#list4").jqGrid({
			type:"POST",
			url:urlRoot('index.php')+'/seguimiento/registro_seguimiento/ver_datos_detalle',
			datatype: "json",
			height: 200,
			colNames:['Código de Local', 'Cédula', 'Cantidad', 'Fecha de Visita', 'Fecha y Hora de Registro'],
			colModel:[
				{name:'codlocal',index:'codlocal', align:"center"},
				{name:'cedula',index:'cedula', align:"center"},
				{name:'cantidad',index:'cantidad', align:"center"},
				{name:'fecha_avance',index:'fecha_avance', align:"center"},
				{name:'fecha_hora',index:'fecha_registro', align:"center"}
			],
			pager: '#pager4',
			rowNum:10,
			rowList:[10,15,20],
			sortname: 'convert(datetime,fecha_avance,103)',
			viewrecords: true,
			sortorder: "asc",
			caption:"Detalles"
		});
		jQuery("#list4").jqGrid('navGrid','#pager4',{edit:false,add:false,del:false,search:false});
		$("#list4").setGridWidth($('#grid_content_detail').width(), true);

		cargarCedula();
	});
</script>

<?php
	$cedArray = array();

	$txtGPS = array(
	'name'	=> 'cantGPS',
	'id'	=> 'cantGPS',
	'value' => set_value('cantGPS'),
	'onkeypress' => 'return validar_numeros(event)',
	'maxlength'	=> 2,
	'style' => 'width:50px'
	);

	$txtCantFotos = array(
	'name'	=> 'CantFotos',
	'id'	=> 'CantFotos',
	'value' => set_value('CantFotos'),
	'onKeyUp' => 'return validar_numeros(event))',
	'maxlength'	=> 2,
	'style' => 'width:50px'
	);
	$txtCantDatos = array(
	'name'	=> 'CantDatos',
	'id'	=> 'CantDatos',
	'value' => set_value('CantDatos'),
	'onKeyUp' => 'return validar_numeros(event))',
	'maxlength'	=> 2,
	'style' => 'width:50px'
	);

	$btnAgregar = array(
		'name' => 'agregar_dt',
		'id' => 'agregar_dt',
		'onclick' => 'frm_ValidarEnvio()',
		'type' => 'button',
		'content' => 'Agregar',		
		'class' => 'btn btn-inverse'
	);


	$attr = array('class' => 'form-val','id' => 'frm_detalle', 'style' => 'overflow: auto;');
	echo form_open('', $attr);
?>

<!-- Modal save patrimonio -->
<div id="add-envio-modal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			<h3 id="myModalLabel">Registro de Datos Enviados</h3>
		</div>
 
		<div class="modal-body">
			<div class="span8">
				<table class="table table-condensed">
					<thead>
						<tr>
							<th>Código DE Local</th>
							<th>Datos de Cedula</th>
							<th>Fotos</th>
							<th>Puntos GPS</th>
							<th></th>
						</tr>
					</thead>
					<tbody>
						<tr class="well">
							<td>
								<input type="text" id="codigo_dt" name="codigo_dt" value="" readonly="true" class="span1">
							</td>
							<td><?php echo form_dropdown('cedula', $cedArray, '#', 'id="cedula"'); ?></td>
							<td><?php echo form_input($txtCantidad); ?></td>
							<td><?php echo form_input($txtFechaDetalle); ?></td>
							<td>
								<?php echo form_button($btnAgregar); ?>		
								<input type="hidden" id="usuario_dt" name="usuario_dt" value="<?php echo $user_id; ?>">
							</td>
						</tr>
					</tbody>
				</table>
				<div class="controls">
					<div id="grid_content_detail" class="span8">
						<table id="list4"></table>
						<div id="pager4"></div>
					</div>
				</div>
			</div>
		</div>
	<div class="modal-footer">
		<button class="btn" data-dismiss="modal" aria-hidden="true">Cerrar</button>		
	</div>
</div>
<?php echo form_close(); ?>

<script type="text/javascript">
	$(document).ready(function() {
		jQuery("#list4").jqGrid({
			type:"POST",
			url:urlRoot('index.php')+'/seguimiento/registro_seguimiento/ver_datos_detalle',
			datatype: "json",
			height: 200,
			colNames:['Código de Local', 'Cédula', 'Cantidad', 'Fecha de Visita', 'Fecha y Hora de Registro'],
			colModel:[
				{name:'codlocal',index:'codlocal', align:"center"},
				{name:'cedula',index:'cedula', align:"center"},
				{name:'cantidad',index:'cantidad', align:"center"},
				{name:'fecha_avance',index:'fecha_avance', align:"center"},
				{name:'fecha_hora',index:'fecha_registro', align:"center"}
			],
			pager: '#pager4',
			rowNum:10,
			rowList:[10,15,20],
			sortname: 'convert(datetime,fecha_avance,103)',
			viewrecords: true,
			sortorder: "asc",
			caption:"Detalles"
		});
		jQuery("#list4").jqGrid('navGrid','#pager4',{edit:false,add:false,del:false,search:false});
		$("#list4").setGridWidth($('#grid_content_detail').width(), true);

		cargarCedula();
	});
</script>