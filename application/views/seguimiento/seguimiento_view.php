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
		<div id="ap-content" class="span12">
			<div class="row-fluid well top-conv">
				<?php echo form_open('','id="frm_seguimiento"'); ?>
				<div class="span2">
					<div class="control-group">
						<?php echo form_label('Sede Operativa', 'sedeoperativa', $label_class); ?>
						<div class="controls">
							<?php 
								echo form_dropdown('sedeoperativa', $sedeArray, '#', 'id="sedeoperativa" style="width:180px;" onChange="cargarProvBySede();"');
								#echo form_dropdown('sedeoperativa', $sedeArray, $selected_dpto, '" id="sedeoperativa" style="display:none"');
							?>
						</div>
					</div>
				</div>
				<div class="span2">
					<div class="control-group">
						<?php echo form_label('Provincia Operativa', 'provincia_ope', $label_class); ?>
						<div class="controls">
							<?php echo form_dropdown('provincia_ope', $provArray, '#', 'id="provincia_ope" style="width:180px;" onChange="cargarDist();"'); ?>
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
							<?php echo form_dropdown('periodo', $periodoArray, '#', 'id="periodo" style="width:100px;" onChange="verdatos(5);"');
							?>
						</div>
					</div>
				</div>
			</div>
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
	'onKeyUp' => 'javascript:this.value=formateafecha(this.value);',
	'maxlength'	=> 10,
	'style' => 'width:100px'
	);

	$txtEspecifique = array(
	'name'	=> 'especifique',
	'id'	=> 'especifique',
	'value' => set_value('especifique'),
	'maxlength'	=> 50,
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
<!-- Modal save patrimonio -->
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
							<th>CODIGO DE LOCAL</th>
							<th>FECHA</th>
							<th>ESTADO</th>
							<th>ESPECIFIQUE</th>
							<th></th>
						</tr>
					</thead>
					<tbody>
						<tr class="success">
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
		jQuery("#list2").jqGrid({
			type:"POST",
			url:'registro_seguimiento/ver_datos',
			datatype: "json",
			height: 255,
			colNames:['Periodo', 'Código de Local', 'Estado', 'Entrada de Información', 'Datos GPS', 'Fotos', 'Reentrevista'],
			colModel:[
				{name:'periodo',index:'periodo', align:"center"},
				{name:'codigo_de_local',index:'codigo_de_local', align:"center"},
				{name:'estado',index:'estado', align:"center"},
				{name:'entrada_informacion',index:'entrada_informacion', align:"center"},
				{name:'datos_gps',index:'datos_gps', align:"center"},
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
			caption:"Lista de Locales"
		});
		jQuery("#list2").jqGrid('navGrid','#pager2',{edit:false,add:false,del:false,search:false});
		$("#list2").setGridWidth($('#grid_content').width(), true);
	});

	function savedetalle(values)
	{
			$('#codigo').val(values);
			ver_detalle_avance(values);
			$("#add-detalle-modal").modal('show');
	}

	$(document).ready(function() {
		jQuery("#list3").jqGrid({
			type:"POST",
			url:'registro_seguimiento/ver_datos_avance',
			datatype: "json",
			height: 200,
			colNames:['Nro', 'Código de Local', 'Estado', 'Fecha de Visita'],
			colModel:[
				{name:'nro_fila',index:'nro_fila', align:"center"},
				{name:'codlocal',index:'codlocal', align:"center"},
				{name:'NEstado',index:'estado', align:"center"},
				{name:'fecha_visita',index:'fecha_visita', align:"center"}
				//{name:'modificar',index:'modificar', align:"center"},
				//{name:'eliminar',index:'eliminar', align:"center"}
			],
			pager: '#pager3',
			rowNum:10,
			rowList:[10,15,20],
			sortname: 'fecha_visita',
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

	function activar_especifique() 
	{
		$("#especifique").val('');
		var codestado = $("#estado").val();
		if (codestado == 4)
		{
			if ($("#especifique").attr('disabled'))
			{
				$("#especifique").removeAttr('disabled');
			}
		}else{
			$("#especifique").attr({'disabled':'disabled'});
		}
	}

	function ver_detalle_avance(codigo)
	{
		jQuery("#list3").jqGrid('setGridParam',{url:"registro_seguimiento/ver_datos_avance?codigo="+codigo,page:1}).trigger("reloadGrid");
	}

	function frm_ValidarAvance()
	{
		var fecha = $("#fecha_avance").val();
		var estado = $("#estado").val();
		var codigo = $("#codigo").val();
		
		if (estado == -1 || fecha == "")
		{
			alert("Cuidado, Faltan Datos!");
			return false;
		}

		if (fecha.length<10){ alert("Fecha Incompleta"); return false; }

		registrar_avance();
	}
	
	function registrar_avance()
	{
		var bsub = $( ":submit" );
		var form_data = $('#frm_avance').serializeArray();

		form_data.push(
			{name: 'ajax',value:1}
		);
		form_data = $.param(form_data);

		$.ajax({
			type: "POST",
			url: "registro_seguimiento/registro_avance",
			data: form_data,

			success: function(data){
				$("#fecha_avance").val('');
				$("#estado").val('');
				$("#especifique").val('');
				$("#list3").trigger("reloadGrid");
				$("#list2").trigger("reloadGrid");
				alert("Avance Guardado!");
			}
		});
	}
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

//*******************************************************
	function IsNumeric(valor) 
	{ 
		var log=valor.length; var sw="S"; 
		for (x=0; x<log; x++) 
		{ v1=valor.substr(x,1); 
		v2 = parseInt(v1); 
		//Compruebo si es un valor numérico 
		if (isNaN(v2)) { sw= "N";} 
		} 
		if (sw=="S") {return true;} else {return false; } 
	} 
	var primerslap=false; 
	var segundoslap=false; 

	function formateafecha(fecha) 
	{ 
		var long = fecha.length; 
		var dia; 
		var mes; 
		var ano;
		var d = new Date();
		var anoactual = d.getFullYear();
		if ((long>=2) && (primerslap==false)) { dia=fecha.substr(0,2); 
		if ((IsNumeric(dia)==true) && (dia<=31) && (dia!="00")) { fecha=fecha.substr(0,2)+"/"+fecha.substr(3,7); primerslap=true; } 
		else { fecha=""; primerslap=false;} 
		} 
		else 
		{ dia=fecha.substr(0,1); 
		if (IsNumeric(dia)==false) 
		{fecha="";} 
		if ((long<=2) && (primerslap=true)) {fecha=fecha.substr(0,1); primerslap=false; } 
		} 
		if ((long>=5) && (segundoslap==false)) 
		{ mes=fecha.substr(3,2); 
		if ((IsNumeric(mes)==true) &&(mes<=12) && (mes!="00")) { fecha=fecha.substr(0,5)+"/"+fecha.substr(6,4); segundoslap=true; } 
		else { fecha=fecha.substr(0,3);; segundoslap=false;} 
		} 
		else { if ((long<=5) && (segundoslap=true)) { fecha=fecha.substr(0,4); segundoslap=false; } } 
		if (long>=7) 
		{ ano=fecha.substr(6,4); 
		if (IsNumeric(ano)==false) { fecha=fecha.substr(0,6); } 
		else { if (long==10){ if ((ano==0) || (ano<2013) || (ano>anoactual)) { fecha=fecha.substr(0,6); } } } 
		}
		if (long==10)
		{ 
			dia=fecha.substr(0,2); 
			mes=fecha.substr(3,2); 
			if ((ano==2013) && (mes<=9) && (dia<9))
			{
				fecha="";
			}
		}
		if (long>=10) 
		{ 
		fecha=fecha.substr(0,10); 
		dia=fecha.substr(0,2); 
		mes=fecha.substr(3,2); 
		ano=fecha.substr(6,4); 
		// Año no viciesto y es febrero y el dia es mayor a 28 
		if ( (ano%4 != 0) && (mes ==02) && (dia > 28) ) { fecha=fecha.substr(0,2)+"/"; } 
		} 
		return (fecha); 
	}

</script>