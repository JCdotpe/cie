<link rel="stylesheet" href="<?php echo base_url('css/jquery-ui-1.10.3.custom.min.css') ?>">
<link rel="stylesheet" href="<?php echo base_url('css/ui.jqgrid.css') ?>">
<script src="<?php echo base_url('js/jqgrid/i18n/grid.locale-es.js'); ?>"></script>
<script src="<?php echo base_url('js/jqgrid/jquery.jqGrid.min.js'); ?>"></script>
<script src="<?php echo base_url('js/convocatorias.js'); ?>"></script>
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
      $depaArray[$filas->CCDD]=utf8_encode(strtoupper($filas->Departamento));
      $sedeArray[$filas->CCDD] = $filas->cod_sede_operativa;
    }
    $selected_dpto = (set_value('departamento')) ? set_value('departamento') : '' ;

    $provArray = array(-1 => '');
    $distArray = array(-1 => '');

    $estadosArray = array(-1 => 'Seleccione...', 1 => 'Inscritos', 2 => 'Desaprobado CV', 3 => 'Aprobados CV', 4 => 'Desaprobados Capacitación', 5 => 'Aprobados Capacitación', 6 => 'No Seleccionado', 7 => 'Suplente', 8 => 'Titular');
    $selected_estados = (set_value('estados')) ? set_value('estados') : '' ;

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

?>

<div class="row-fluid">
	<div class="row-fluid">
		<div id="ap-sidebar" class="span2">
			<?php $this->load->view('informes/includes/sidebar_view.php'); ?>
		</div>
		<div id="ap-content" class="span10">
			<div class="row-fluid well top-conv">
				<?php echo form_open('','id="frm_reporte"'); ?>
				<div class="span3">
					<div class="control-group">
						<?php echo form_label('Departamento', 'departamento', $label_class); ?>
						<div class="controls">
							<?php 
								echo form_dropdown('departamento', $depaArray, '#', 'id="departamento" onChange="cargarProvBySede();"');
								echo form_dropdown('sedeoperativa', $sedeArray, $selected_dpto, '" id="sedeoperativa" style="display:none"');
							?>
						</div>
					</div>
				</div>
				<div class="span3">
					<div class="control-group">
						<?php echo form_label('Provincia', 'provincia', $label_class); ?>
						<div class="controls">
							<?php echo form_dropdown('provincia', $provArray, '#', 'id="provincia"'); ?>
						</div>
					</div>
				</div>
				<div class="span3">
					<div class="control-group">
						<?php echo form_label('Estados', 'lblestados', $label_class); ?>
						<div class="controls">
							<?php
								echo form_dropdown('estados', $estadosArray, $selected_estados, '" id="estados"'); 								
							?>
						</div>
					</div>
				</div>	
				<div class="span3">
					<div class="control-group">
						<?php echo form_label('Cargo', 'cargo', $label_class); ?>
						<div class="controls">
							<?php
								echo form_dropdown('cargo', $cargosArray, $selected_cargo, '" id="cargo"'); 
								echo form_dropdown('cargo', $cargospresupuestario, $selected_cargo, '" id="cargo_presupuestal" style="display:none"'); 
								echo form_dropdown('cargo', $cargosadm, $selected_cargo, '" id="cargo_adm" style="display:none" ');
							?>
						</div>
					</div>
				</div>
				<div class="span11">
					<?php echo form_button('ver','Visualizar','class="btn btn-primary pull-right" id="ver" style="margin-top:20px" onClick="reportar()"'); ?>
				</div>
			</div>
			<input type="hidden" name="cod_depa" id="cod_depa" value="" />
			<input type="hidden" name="cod_prov" id="cod_prov" value="" />
			<input type="hidden" name="cod_estado" id="cod_estado" value="" />
			<input type="hidden" name="cod_cargo" id="cod_cargo" value="" />
			<input type="hidden" name="cod_presu" id="cod_presu" value="" />
			<input type="hidden" name="cod_adm" id="cod_adm" value="" />
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
		   	url:'estadoseleccion/obtenreporte',
			datatype: "json",
			height: 255,			
		   	colNames:['Nro', 'Departamento', 'Provincia', 'Distrito', 'Cargo Funcional', 'Nombre', 'DNI', 'RUC', 'Telefono', 'Celular', 'Email', 'Nivel', 'Fecha Inscripción', 'Estado'],		   	
		   	colModel:[
		   		{name:'nro_fila', sortable:false, width:40},
		   		{name:'departamento',index:'departamento'},
		   		{name:'provincia',index:'provincia'},
		   		{name:'distrito',index:'distrito'},
		   		{name:'cargofuncional',index:'cargofuncional'},
		   		{name:'nombrecompleto',index:'ap_paterno'},
		   		{name:'dni',index:'dni'},
		   		{name:'ruc',index:'ruc'},
		   		{name:'nro_tel',index:'nro_tel'},
		   		{name:'nro_cel',index:'nro_cel'},
		   		{name:'email',index:'email'},
		   		{name:'nivel',index:'nivel'},
		   		{name:'fecharegistro',index:'fecharegistro'},
		   		{name:'nestado',index:'nestado'}
		   	],
		   	rowNum:10,
		   	rowList:[10,20,30],
		   	pager: '#pager2',
		   	sortname: 'fecharegistro,departamento,provincia,distrito,cargofuncional,ap_paterno',
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
		var estadoselec = $("#estados").val();

		var id_cargo = $('#cargo').val();
		$("#cargo_presupuestal option[value=" + id_cargo + "]").attr('selected', 'selected');
		$("#cargo_adm option[value=" + id_cargo + "]").attr('selected', 'selected');
		var cargo_presupuestal = $('#cargo_presupuestal').find('option:selected').text();
		var cargo_adm = $('#cargo_adm').find('option:selected').text();

		if (coddepa == -1 || estadoselec == -1 || id_cargo == -1)
		{ 
			alert("Debe Seleccionar un Departamento, Tipo de Estado y Cargo"); 
		}else{
			$('#cod_depa').val(coddepa);
			$('#cod_prov').val(codprov);
			$('#cod_estado').val(estadoselec);
			$('#cod_cargo').val(id_cargo);
			$('#cod_presu').val(cargo_presupuestal);
			$('#cod_adm').val(cargo_adm);

			jQuery("#list2").jqGrid('setGridParam',{url:"estadoseleccion/obtenreporte?coddepa="+coddepa+"&codprov="+codprov+"&codconvo="+id_cargo+"&codpresu="+cargo_presupuestal+"&codadm="+cargo_adm+"&codestado="+estadoselec,page:1}).trigger("reloadGrid");
		}		
	}

	function exportExcel()
	{
		var coddepa = $('#cod_depa').val();
		var codprov = $('#cod_prov').val();
		var estadoselec = $('#cod_estado').val();
		var id_cargo = $('#cod_cargo').val();
		var cargo_presupuestal = $('#cod_presu').val();
		var cargo_adm = $('#cod_adm').val();

		if (coddepa == "" || estadoselec == "" || id_cargo == "")
		{ 
			alert("Ud. No ha realizado ninguna búsqueda"); 
		}else{
			document.forms[0].method='POST';
			document.forms[0].action="csvExport/ExportacionEstadoSeleccion?coddepa="+coddepa+"&codprov="+codprov+"&codconvo="+id_cargo+"&codpresu="+cargo_presupuestal+"&codadm="+cargo_adm+"&codestado="+estadoselec;
			document.forms[0].target='_blank';
			document.forms[0].submit();
		}
	}

</script>