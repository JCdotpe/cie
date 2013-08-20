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
	$depaArray = array(-1 => 'Seleccione...');
	$sedeArray = array(-1 => '-1');
	
    foreach($depa->result() as $filas)
    {
		$depaArray[$filas->CCDD]=utf8_encode($filas->Departamento);
		$sedeArray[$filas->CCDD] = $filas->cod_sede_operativa;
    }
    $selected_dpto = (set_value('departamento')) ? set_value('departamento') : '' ;
	$provArray = array(-1 => '');
	$distArray = array(-1 => '');
	$centropArray = array(-1 => '');
	$rutasArray = array(-1 => '');
	$periodoArray = array(-1 => '');
?>

<div class="row-fluid">
	<div class="row-fluid">
		<div id="ap-content" class="span12">
			<div class="row-fluid well top-conv">
				<?php echo form_open('','id="frm_seguimiento"'); ?>
				<div class="span2">
					<div class="control-group">
						<?php echo form_label('Departamento', 'departamento', $label_class); ?>
						<div class="controls">
							<?php 
								echo form_dropdown('departamento', $depaArray, '#', 'id="departamento" style="width:180px;" onChange="cargarProvBySede();"');
								echo form_dropdown('sedeoperativa', $sedeArray, $selected_dpto, '" id="sedeoperativa" style="display:none"');
							?>
						</div>
					</div>
				</div>
				<div class="span2">
					<div class="control-group">
						<?php echo form_label('Provincia', 'provincia', $label_class); ?>
						<div class="controls">
							<?php echo form_dropdown('provincia', $provArray, '#', 'id="provincia" style="width:180px;" onChange="cargarDist();"'); ?>
						</div>
					</div>
				</div>
				<div class="span2">
					<div class="control-group">
						<?php echo form_label('Distrito', 'distrito', $label_class); ?>
						<div class="controls">
							<?php echo form_dropdown('distrito', $distArray, '#', 'id="distrito" style="width:180px;" onChange="cargarCentroPoblado();"'); ?>
						</div>
					</div>
				</div>
				<div class="span2">
					<div class="control-group">
						<?php echo form_label('Centro Poblado', 'centropoblado', $label_class); ?>
						<div class="controls">
							<?php echo form_dropdown('centropoblado', $centropArray, '#', 'id="centropoblado" style="width:180px;" onChange="cargarRutas();"');
							?>
						</div>
					</div>
				</div>
				<div class="span2">
					<div class="control-group">
						<?php echo form_label('Código de Ruta', 'rutas', $label_class); ?>
						<div class="controls">
							<?php echo form_dropdown('rutas', $rutasArray, '#', 'id="rutas" style="width:180px;" onChange="cargarPeriodo();"');
							?>
						</div>
					</div>
				</div>
				<div class="span2">
					<div class="control-group">
						<?php echo form_label('Periodo de Trabajo', 'periodo', $label_class); ?>
						<div class="controls">
							<?php echo form_dropdown('periodo', $periodoArray, '#', 'id="periodo" style="width:100px;" onChange="verdatos();"');
							?>
						</div>
					</div>
				</div>
				<!--
				<div class="span1">
					<?php #echo form_button('ver','Visualizar','class="btn btn-primary" id="ver" style="margin-top:20px" onClick="reportar()"'); ?>
				</div>
				-->
			</div>
			<input type="hidden" name="user" id="user" value="<?php echo $user_id; ?>" />
			<?php echo form_close(); ?>
		</div>
		<div class="row-fluid">
			<div id="grid_content" class="span12">
				<table id="list2"></table>
				<div id="pager2"></div>
			</div>
		</div>
	</div>
</div>

<?php
	$estadoArray = array(-1 => 'Seleccione...', 1 => 'Completa', 2 => 'Incompleta', 3 => 'Local Cerrado / Desocupado', 4 => 'Otro');

	$txtFechaAvance = array(
	'name'	=> 'fecha_avance',
	'id'	=> 'fecha_avance',
	'value' => set_value('fecha_avance'),
	'maxlength'	=> 10,
	'class' => 'span1'
	);

	$txtEspecifique = array(
	'name'	=> 'especifique',
	'id'	=> 'especifique',
	'value' => set_value('especifique'),
	'maxlength'	=> 50,
	'class' => 'span1',
	'style' => 'width:120px',
	'disabled' => 'disabled'
	);

	$btnAgregar = array(
		'name' => 'agregar',
		'id' => 'agregar',
		'onclick' => 'frm_ValidarAvance()',
		'type' => 'button',
		'content' => 'Agregar',		
		'class' => 'btn btn-primary'
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
<!-- Modal save patrimonio-->
	<div id="add-detalle-modal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			<h3 id="myModalLabel">Registro de Avance</h3>
		</div>
 
		<div class="modal-body">
			<div class="span8">
				<table class="table table-condensed">
					<thead>
						<tr>
							<th>FECHA</th>
							<th>ESTADO</th>
							<th>ESPECIFIQUE</th>
							<th></th>
						</tr>
					</thead>
					<tbody>
						<tr class="success">
							<td><?php echo form_input($txtFechaAvance); ?></td>
							<td><?php echo form_dropdown('estado', $estadoArray, '#', 'id="estado" onChange="activar_especifique();"'); ?></td>
							<td><?php echo form_input($txtEspecifique); ?></td>
							<td><?php echo form_button($btnAgregar); ?></td>
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
			<div class="span4" id="alerta" style="display: none">
				<div class="alert alert-danger">
					<strong>Alerta!</strong> Ya existe la fecha.
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
		jQuery("#list2").jqGrid({
			type:"POST",
			url:'seguimiento/seguimiento/ver_datos',
			datatype: "json",
			height: 255,
			colNames:['Nro', 'Código de Local', 'Estado', 'Entrada de Información', 'Datos GPS', 'Fotos', 'Reentrevista'],
			colModel:[
				{name:'nro_fila',index:'nro_fila', align:"center"},
				{name:'codigo_de_local',index:'codigo_de_local', align:"center"},
				{name:'estado',index:'estado', align:"center"},
				{name:'entrada_info',index:'entrada_info', align:"center"},
				{name:'gps',index:'gps', align:"center"},
				{name:'fotos',index:'fotos', align:"center"},
				{name:'detalle',index:'detalle', align:"center"}
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
					be = "<input type='button' value='Registrar Detalle' onclick=savedetalle('"+cl+"') />";
					jQuery("#list2").jqGrid('setRowData',ids[i],{detalle:be});
				}
			},			
			sortorder: "asc",
			caption:"Lista de Locales",
			//editurl:"registro_rutas/eliminar"
		});
		jQuery("#list2").jqGrid('navGrid','#pager2',{edit:false,add:false,del:false,search:false});
		$("#list2").setGridWidth($('#grid_content').width(), true);
	});

function verdatos()
{
	var coddepa = $("#departamento").val();
	var codprov = $("#provincia").val();
	var coddist = $("#distrito").val();
	var codcentrop = $("#centropoblado").val();
	var codruta = $("#rutas").val();
	var nroperiodo = $("#periodo").val();

	jQuery("#list2").jqGrid('setGridParam',{url:"seguimiento/seguimiento/ver_datos?coddepa="+coddepa+"&codprov="+codprov+"&coddist="+coddist+"&codcentrop="+codcentrop+"&codruta="+codruta+"&nroperiodo="+nroperiodo,page:1}).trigger("reloadGrid");
}


function savedetalle(values)
{
        $("#alerta").hide();
        $('#inputpatrimonio').val('');
        $("#add-detalle-modal").modal('show');
        $('#codigo_udra').val(values);
}

function activar_especifique() 
{
	$("#especifique").val('');
	var codigo = $("#estado").val();
	if (codigo == 4)
	{
		if ($("#especifique").attr('disabled'))
		{
			$("#especifique").removeAttr('disabled');
		}
	}else{
		$("#especifique").attr({'disabled':'disabled'});
	}
}

	$(document).ready(function() {
		jQuery("#list3").jqGrid({
			type:"POST",
			url:'seguimiento/seguimiento/ver_datos',
			datatype: "json",
			height: 200,
			colNames:['Nro', 'Código de Local', 'Estado', 'Fecha de Visita'],
			colModel:[
				{name:'nro_fila',index:'nro_fila', align:"center"},
				{name:'codigo_de_local',index:'codigo_de_local', align:"center"},
				{name:'estado',index:'estado', align:"center"},
				{name:'entrada_info',index:'entrada_info', align:"center"}
			],
			pager: '#pager3',
			rowNum:10,
			rowList:[10,15,20],
			sortname: 'codigo_de_local',
			viewrecords: true,
			sortorder: "asc",
			caption:"Lista de Visitas"
			//editurl:"registro_rutas/eliminar"
		});
		jQuery("#list3").jqGrid('navGrid','#pager3',{edit:false,add:false,del:false,search:false});
		$("#list3").setGridWidth($('#grid_content_detail').width(), true);
	});

	function frm_ValidarAvance()
	{
		var bsub = $( ":submit" );
		var form_data = $('#frm_avance').serializeArray();

		form_data.push(
			{name: 'ajax',value:1}
		);
		form_data = $.param(form_data);

		$.ajax({
			type: "POST", 
			url: "seguimiento/seguimiento/registro_avance",   
			data: form_data,

			success: function(response){

			$("#frm_avance :input").val('');
			$("#list3").trigger("reloadGrid");
			alert("Local Asignado a Ruta Satisfactoriamente"); 
			}
		});
	}

</script>