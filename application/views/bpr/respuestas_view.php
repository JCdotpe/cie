<link rel="stylesheet" href="<?php echo base_url('css/jquery-ui-1.10.3.custom.min.css') ?>">
<link rel="stylesheet" href="<?php echo base_url('css/ui.jqgrid.css') ?>">
<script src="<?php echo base_url('js/jqgrid/i18n/grid.locale-es.js'); ?>"></script>
<script src="<?php echo base_url('js/jqgrid/jquery.jqGrid.min.js'); ?>"></script>
<script src="<?php echo base_url('js/bpr.js'); ?>"></script>
<style>
	.ui-jqgrid tr.jqgrow td {
		white-space: normal !important;
	}
</style>
<?php
	$label_class =  array('class' => 'control-label');
	$depaArray = array(-1 => 'Seleccione...');
    foreach($depa->result() as $filas)
    {
      $depaArray[$filas->CCDD]=utf8_encode(strtoupper($filas->Nombre));
    }
    $provArray = array(-1 => '');
    $distArray = array(-1 => '');

    $cargosArray = array(-1 => 'Seleccione...'); 
	$cargospresupuestario=array(-1 => '-1');
	$cargosadm=array(-1 => '-1');

	foreach ($cargos->result() as $filas) 
	{
		$cargosArray[$filas->codigo_Convocatoria] = utf8_encode($filas->CargoFunciona);
		$cargospresupuestario[$filas->codigo_Convocatoria] = $filas->codigo_CredPresupuestario;
		$cargosadm[$filas->codigo_Convocatoria] = $filas->codigo_adm;
	}

	$selected_cargo = (set_value('cargo')) ? set_value('cargo') : '' ;

	$capArray = array(-1 => '');
    $secArray = array(-1 => '');
    $preArray = array(-1 => '');

    $txtNombre = array(
		'name'	=> 'nombrecompleto',
		'id'	=> 'nombrecompleto',
		'value' => set_value('nombrecompleto'),		
		'style' => 'width: 250px;',
		'maxlength' => 80
	);

	$txtDni = array(
		'name'	=> 'nrodni',
		'id'	=> 'nrodni',
		'value' => set_value('nrodni'),		
		'style' => 'width: 100px;',
		'onkeypress' => 'return validar_numeros(event)',
		'maxlength' => 8
	);

	$txtConsulta =array(
		'name'	=> 'consulta',
		'id'	=> 'consulta',
		'value'	=> set_value('consulta'),
		'maxlength'	=> 400,
		'style' => 'width: 500px;',		
		'rows' => '4',
		'cols' => '20'
	);

	$btnGrabar = array(
		'name' => 'guardar',
		'id' => 'guardar',
		'onclick' => 'Form_Validar()',
		'type' => 'button',
		'content' => 'Enviar',
		'class' => 'btn btn-primary pull-left'
	);

?>

<div class="row-fluid">
	<div class="row-fluid">
		<div id="ap-content" class="span12">
			<?php echo form_open('','id="frm_ver"'); ?>
			<div class="row-fluid well top-conv">				
				<div class="span3">
					<div class="control-group">
						<?php echo form_label('Departamento', 'departamento', $label_class); ?>
						<div class="controls">
							<?php echo form_dropdown('departamento', $depaArray, '#', 'id="departamento" onChange="cargarProv();"'); ?>
						</div>
					</div>
				</div>
				<div class="span3">
					<div class="control-group">
						<?php echo form_label('Provincia', 'provincia', $label_class); ?>
						<div class="controls">
							<?php echo form_dropdown('provincia', $provArray, '#', 'id="provincia" onChange="cargarDist();"'); ?>
						</div>
					</div>
				</div>
				<div class="span3">
					<div class="control-group">
						<?php echo form_label('Distrito', 'distrito', $label_class); ?>
						<div class="controls">
							<?php echo form_dropdown('distrito', $distArray, '#', 'id="distrito" onChange="cargarDatosbyDistrito();"'); ?>
						</div>
					</div>
				</div>
				<div class="span3">
					<div class="control-group">
						<?php echo form_label('Cargo', 'cargo', $label_class); ?>
						<div class="controls">
							<?php
								echo form_dropdown('cargo', $cargosArray, $selected_cargo, ' id="cargo"  onChange="cargarCapitulo();"'); 
								echo form_dropdown('cargo', $cargospresupuestario, $selected_cargo, ' id="cargo_presupuestal" style="display:none"'); 
								echo form_dropdown('cargo', $cargosadm, $selected_cargo, 'id="cargo_adm" style="display:none"');
							?>
						</div>
					</div>
				</div>
				<div class="span3">
					<div class="control-group">
						<?php echo form_label('Capítulo', 'capitulo', $label_class); ?>
						<div class="controls">
							<?php echo form_dropdown('capitulo', $capArray, '#', 'id="capitulo" onChange="cargarSeccion();"'); ?>
						</div>
					</div>
				</div>
				<div class="span3">
					<div class="control-group">
						<?php echo form_label('Sección', 'seccion', $label_class); ?>
						<div class="controls">
							<?php echo form_dropdown('seccion', $secArray, '#', 'id="seccion" onChange="cargarPreguntas();"'); ?>
						</div>
					</div>
				</div>
				<div class="span3">
					<div class="control-group">
						<?php echo form_label('Pregunta', 'pregunta', $label_class); ?>
						<div class="controls">
							<?php echo form_dropdown('pregunta', $preArray, '#', 'id="pregunta" onChange="cargarDatosbyPregunta();"'); ?>
						</div>
					</div>
				</div>
			</div>
			<?php echo form_close(); ?>			
		</div>
		<div id="grid_content" class="span12">
			<div class="span6">
				<table id="list2"></table>
				<div id="pager2"></div>
			</div>
		</div>
	</div>
</div>

<?php
	$txtCodigoPregunta = array(
		'name'	=> 'codigo',
		'id'	=> 'codigo',
		'value' => set_value('codigo'),
		'readonly' => true,
		'class' => 'span1'
	);

	$txtCapitulo = array(
		'name'	=> 'desc_capitulo',
		'id'	=> 'desc_capitulo',
		'value' => set_value('desc_capitulo'),
		'readonly' => true,
		'class' => 'span2'
	);

	$txtSeccion = array(
		'name'	=> 'desc_seccion',
		'id'	=> 'desc_seccion',
		'value' => set_value('desc_seccion'),
		'readonly' => true
	);

	$txtPregunta = array(
		'name'	=> 'desc_pregunta',
		'id'	=> 'desc_pregunta',
		'value' => set_value('desc_pregunta'),
		'readonly' => true
	);

	$txtConsulta =array(
		'name'	=> 'consulta',
		'id'	=> 'consulta',
		'value'	=> set_value('consulta'),
		'maxlength'	=> 400,
		'style' => 'width: 600px;',
		'rows' => '2',
		'cols' => '10',
		'readonly' => true
	);

	$txtRespuesta =array(
		'name'	=> 'respuesta',
		'id'	=> 'respuesta',
		'value'	=> set_value('respuesta'),
		'maxlength'	=> 400,
		'style' => 'width: 600px;',
		'rows' => '2',
		'cols' => '10'
	);

	$btnResponder = array(
		'name' => 'responder',
		'id' => 'responder',
		'onclick' => 'frm_ValidarRespuesta()',
		'type' => 'button',
		'content' => 'Responder',
		'class' => 'btn btn-primary'
	);


	$attr = array('class' => 'form-val','id' => 'frm_respuesta', 'style' => 'overflow: auto;');
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
			<h3 id="myModalLabel">Respuesta</h3>
		</div>
 
		<div class="modal-body">
			<div class="span8">
				<table class="table table-condensed">
					<tr>
						<th>CODIGO</th>
						<th>CAPITULO</th>
						<th>SECCION</th>
						<th>PREGUNTA</th>
					</tr>
					<tr class="success">
						<td><?php echo form_input($txtCodigoPregunta); ?></td>
						<td><?php echo form_input($txtCapitulo); ?></td>
						<td><?php echo form_input($txtSeccion); ?></td>
						<td><?php echo form_input($txtPregunta); ?></td>
					</tr>
					<tr>
						<th colspan="4">CONSULTA</th>
					</tr>
					<tr class="success">
						<td colspan="4"><?php echo form_textarea($txtConsulta); ?></td>
					</tr>
					<tr>
						<th colspan="4">RESPUESTA</th>
					</tr>
					<tr class="success">
						<td colspan="4"><?php echo form_textarea($txtRespuesta); ?></td>
					</tr>
				</table>
			</div>
		</div>
	<div class="modal-footer">
		<?php echo form_button($btnResponder); ?>		
		<input type="hidden" id="usuario" name="usuario" value="<?php echo $user_id; ?>">
		<button class="btn" data-dismiss="modal" aria-hidden="true">Cerrar</button>
	</div>
</div>
<?php echo form_close(); ?>

<script type="text/javascript">

	$(document).ready(function() {
		jQuery("#list2").jqGrid({
		   	type:"POST",
		   	url:'respuestas/lista_consultas',
			datatype: "json",
			height: 255,			
		   	colNames:['Nro', 'Capitulo', 'Seccion', 'Pregunta', 'Consulta',''],
		   	colModel:[
		   		{name:'nro_fila', sortable:false, width:20},
		   		{name:'desc_capitulo',index:'desc_capitulo'},
		   		{name:'desc_seccion',index:'desc_seccion'},
		   		{name:'desc_pregunta',index:'desc_pregunta'},
		   		{name:'consulta',index:'consulta'},
		   		{name:'detalle',index:'detalle', align:"center"}
			],
		   	rowNum:10,
		   	rowList:[10,20,30],
		   	pager: '#pager2',
		   	sortname: 'cod_cap',
		    viewrecords: true,
		    gridComplete: function(){
				var ids = jQuery("#list2").jqGrid('getDataIDs');
				for(var i=0;i < ids.length;i++){
					var cl = ids[i];
					be = "<input type='button' value='Responder' onclick=savedetalle('"+cl+"') />";
					jQuery("#list2").jqGrid('setRowData',ids[i],{detalle:be});
				}
			},	
		    sortorder: "asc",
		    caption:"Lista de Consultas"		    
		});
		jQuery("#list2").jqGrid('navGrid','#pager2',{edit:false,add:false,del:false,search:false})			
		$("#list2").setGridWidth($('#grid_content').width(), true);

	});

	function savedetalle(values)
	{
			$('#codigo').val(values);
			BuscarDetalle(values);
			$("#add-detalle-modal").modal('show');
	}
</script>