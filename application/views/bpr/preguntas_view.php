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
			<?php echo form_open('','id="frm_preguntas"'); ?>
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
							<?php echo form_dropdown('distrito', $distArray, '#', 'id="distrito"'); ?>
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
							<?php echo form_dropdown('pregunta', $preArray, '#', 'id="pregunta"'); ?>
						</div>
					</div>
				</div>
			</div>
			<div class="row-fluid well top-conv">
				<div class="span3">
					<div class="control-group">
						<?php echo form_label('Nombre Completo', 'nombre', $label_class); ?>
						<div class="controls">
							<?php echo form_input($txtNombre); ?>
						</div>
					</div>
				</div>
				<div class="span3">
					<div class="control-group">
						<?php echo form_label('Nro DNI', 'dni', $label_class); ?>
						<div class="controls">
							<?php echo form_input($txtDni); ?>
						</div>
					</div>
				</div>
				<div>
					<div class="span7">
						<div class="control-group">
							<?php echo form_label('Consulta', 'cons', $label_class); ?>
							<div class="controls">
								<?php echo form_textarea($txtConsulta); ?>
							</div>
						</div>
					</div>
				</div>
				<div>
					<div class="span12">
						<?php echo form_button($btnGrabar); ?>
					</div>
				</div>
			</div>
			<!--
			<input type="hidden" name="cod_depa" id="cod_depa" value="" />
			<input type="hidden" name="cod_prov" id="cod_prov" value="" />
			<input type="hidden" name="cod_cargo" id="cod_cargo" value="" />
			<input type="hidden" name="cod_presu" id="cod_presu" value="" />
			<input type="hidden" name="cod_adm" id="cod_adm" value="" />
			-->
			<?php echo form_close(); ?>			
		</div>
		<div id="grid_content" class="span12">
			<!--
			<div class="span6">
				<table id="list2"></table>
				<div id="pager2"></div>
			</div>
			-->
		</div>
		<!--
		<div class="span12">
			<?php #echo form_button('expo','Exportar a Excel','class="btn btn-inverse pull-right" id="expo" style="margin-top:20px" onClick="exportExcel()"'); ?>
		</div>
		-->
	</div>
</div>
<!--
<script type="text/javascript">

	$(document).ready(function() {
		jQuery("#list2").jqGrid({
		   	type:"POST",
		   	url:'coberturapea/obtenreporte',
			datatype: "json",
			height: 255,			
		   	colNames:['Nro', 'Departamento', 'Provincia', 'ODEI', 'Meta Insc.', 'Inscritos', '% Inscritos', 'CV Calificados', 'CV Aprobados', 'Meta Cap.', 'Asistencia Cap.', '% Cobertura Meta', 'Capacitacion', '% Cobertura Meta', 'Meta Selec.', 'Seleccionado', '% Cobertura'],
		   	colModel:[
		   		{name:'nro_fila', sortable:false, width:20},
		   		{name:'departamento',index:'departamento', width:55},
		   		{name:'provincia',index:'provincia', width:55},
		   		{name:'odei',index:'odei', width:55},
		   		{name:'meta_insc',index:'meta_insc', width:20},
		   		{name:'inscritos',index:'inscritos', width:20},
		   		{name:'prct_inscritos',index:'prct_inscritos', width:20},
		   		{name:'CV_calificado',index:'CV_calificado', width:20},
		   		{name:'CV_aprobado',index:'CV_aprobado', width:20},
		   		{name:'meta_capa',index:'meta_capa', width:20},
		   		{name:'Asistente_Capacitacion',index:'Asistente_Capacitacion', width:20},
		   		{name:'prct_asis_capa',index:'prct_asis_capa', width:20},
		   		{name:'Aprobado_Capacitacion',index:'Aprobado_Capacitacion', width:20},
		   		{name:'prct_capa',index:'prct_capa', width:20},
		   		{name:'meta_con',index:'meta_con', width:20},
		   		{name:'Titular',index:'Titular', width:20},
		   		{name:'prct_selec',index:'prct_selec', width:20}	
		   	],
		   	rowNum:10,
		   	rowList:[10,20,30],
		   	pager: '#pager2',
		   	sortname: 'departamento, provincia',
		    viewrecords: true,
		    sortorder: "asc",
		    caption:"Datos del Reporte"		    
		});
		jQuery("#list2").jqGrid('navGrid','#pager2',{edit:false,add:false,del:false,search:false})			
		$("#list2").setGridWidth($('#grid_content').width(), true);

	});

	function reportar()
	{
		var coddepa = jQuery("#departamento").val();
		var codprov = jQuery("#provincia").val();

		var id_cargo = $('#cargo').val();
		$("#cargo_presupuestal option[value=" + id_cargo + "]").attr('selected', 'selected');
		$("#cargo_adm option[value=" + id_cargo + "]").attr('selected', 'selected');
		var cargo_presupuestal = $('#cargo_presupuestal').find('option:selected').text();
		var cargo_adm = $('#cargo_adm').find('option:selected').text();

		

		if (id_cargo == -1 || coddepa == -1 )
		{ 
			alert("Debe Seleccionar un Departamento y Cargo"); 
		}else{
			$('#cod_depa').val(coddepa);
			$('#cod_prov').val(codprov);
			$('#cod_cargo').val(id_cargo);
			$('#cod_presu').val(cargo_presupuestal);
			$('#cod_adm').val(cargo_adm);

			jQuery("#list2").jqGrid('setGridParam',{url:"coberturapea/obtenreporte?coddepa="+coddepa+"&codprov="+codprov+"&codconvo="+id_cargo+"&codpresu="+cargo_presupuestal+"&codadm="+cargo_adm,page:1}).trigger("reloadGrid");	
		}
	}

	function exportExcel()
	{
		var coddepa = jQuery("#cod_depa").val();
		var codprov = jQuery("#cod_prov").val();
		var id_cargo = jQuery('#cod_cargo').val();
		var cargo_presupuestal = jQuery('#cod_presu').val();
		var cargo_adm = jQuery('#cod_adm').val();

		if (coddepa == "" || id_cargo == "")
		{
			alert("Ud. No ha realizado ninguna búsqueda");
		}else{
			document.forms[0].method='POST';
			document.forms[0].action="csvExport/ExportacionCobertura?coddepa="+coddepa+"&codprov="+codprov+"&codconvo="+id_cargo+"&codpresu="+cargo_presupuestal+"&codadm="+cargo_adm;
			document.forms[0].target='_blank';
			document.forms[0].submit();
		}        
	}
</script>
-->