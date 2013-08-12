<link rel="stylesheet" href="<?php echo base_url('css/jquery-ui-1.10.3.custom.min.css') ?>">
<link rel="stylesheet" href="<?php echo base_url('css/ui.jqgrid.css') ?>">
<script src="<?php echo base_url('js/jqgrid/i18n/grid.locale-es.js'); ?>"></script>
<script src="<?php echo base_url('js/jqgrid/jquery.jqGrid.min.js'); ?>"></script>
<script src="<?php echo base_url('js/seleccion.js'); ?>"></script>
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
    
    $cargosArray = array(-1 => 'Seleccione...'); 
	$cargospresupuestario=array(-1 => '-1');
	$cargosadm=array(-1 => '-1');
	$nuevoCombo=array(-1 => 'Seleccione...');

	$i=0;
	foreach ($cargos->result() as $filas) 
	{
		$cargosArray[$filas->codigo_Convocatoria] = utf8_encode($filas->CargoFunciona);
		$cargospresupuestario[$filas->codigo_Convocatoria] = $filas->codigo_CredPresupuestario;
		$cargosadm[$filas->codigo_Convocatoria] = $filas->codigo_adm;
		$nuevoCombo[$i]['codigo'] = $filas->codigo_adm;
		$nuevoCombo[$i]['nombre'] = utf8_encode($filas->CargoFunciona);
		$i++;
	}

	$selected_cargo = (set_value('cargo')) ? set_value('cargo') : '' ;
?>

<div class="row-fluid">
	<div class="row-fluid">
		<div id="ap-sidebar" class="span2">
			<?php $this->load->view('seleccion/includes/sidebar_view.php'); ?>
		</div>
		<div id="ap-content" class="span10">
			<div class="row-fluid well top-conv">
				<?php echo form_open('','id="frm_reporte"'); ?>
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
							<?php echo form_dropdown('provincia', $provArray, '#', 'id="provincia"'); ?>
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
				<div class="span1">
					<?php echo form_button('ver','Visualizar','class="btn btn-primary" id="ver" style="margin-top:20px" onClick="reportar()"'); ?>
				</div>
			</div>
			<input type="hidden" name="cod_depa" id="cod_depa" value="" />
			<input type="hidden" name="cod_prov" id="cod_prov" value="" />
			<input type="hidden" name="cod_cargo" id="cod_cargo" value="" />
			<input type="hidden" name="cod_presu" id="cod_presu" value="" />
			<input type="hidden" name="cod_adm" id="cod_adm" value="" />
			<input type="hidden" name="user" id="user" value="<?php echo $user_id; ?>" />
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
		   	url:'seleccionpea/obtenreporte',
			datatype: "json",
			height: 255,
		   	colNames:['Nro', 'Departamento', 'Provincia', 'Cargo', 'Nombre', 'DNI', 'RUC', 'Nivel', 'Profesion', 'Estado', 'Fecha Inscripcion'],
		   	colModel:[
		   		{name:'nro_fila', sortable:false, width:40},
		   		{name:'departamento',index:'departamento'},
		   		{name:'provincia',index:'provincia'},
		   		{name:'codigo_adm', index:'codigo_adm', edittype:'select', formatter:selectFormatter, editable:true},
		   		{name:'nombrecompleto',index:'ap_paterno'},
		   		{name:'dni',index:'dni'},
		   		{name:'ruc',index:'ruc'},
		   		{name:'nivel',index:'nivel'},
		   		{name:'profesion',index:'profesion'},
		   		{name:'estado', index:'estado', edittype:'select', formatter:cmbFormatter, editable:true},
				{name:'fecha_registro',index:'fecha_registro'}
		   	],
		   	rowNum:10,
		   	rowList:[10,20,30],
		   	pager: '#pager2',
		   	sortname: 'fecha_registro,ap_paterno',
		    viewrecords: true,
		    sortorder: "asc",
			caption:"Datos del Reporte"
		});
		jQuery("#list2").jqGrid('navGrid','#pager2',{edit:false,add:false,del:false,search:false});
		$("#list2").setGridWidth($('#grid_content').width(), true);

	});
	
	function cmbFormatter(cellvalue, options, rowObject)
	{
		return '<select onchange="RegistroSeleccionPea('+options.rowId+',this)"><option value="5"'+(cellvalue == 5 ? 'selected' : '' )+'>Seleccione...</option><option value="8"'+(cellvalue == 8 ? 'selected' : '' )+'>Titular</option><option value="7"'+(cellvalue == 7 ? 'selected' : '' )+'>Suplente</option><option value="6"'+(cellvalue == 6 ? 'selected' : '' )+'>No Seleccionado</option></select>';
	}

	function selectFormatter(cellvalue, options, rowObject)
	{
		var combo;

		combo = '<select onchange="CambiarCargo('+options.rowId+',this)">';
		<?php for($i = 0; $i < count($nuevoCombo)-1; $i++){	?>
			cod = <?php echo $nuevoCombo[$i]["codigo"]; ?>;
			combo += '<option value="<?php echo $nuevoCombo[$i]["codigo"]; ?>"'+ (cellvalue == cod ? 'selected':'')+'><?php echo $nuevoCombo[$i]["nombre"]; ?></option>';
		<?php } ?>
		combo += '</select>';

		return combo;
	}

	function RegistroSeleccionPea(id,combo)
	{
		var seleccionado = $(combo).val();
		var user = $('#user').val();
		var doLoginMethodUrl = 'seleccionpea/registrar_seleccionpea';
        $.ajax({
          type: "POST",
          url: doLoginMethodUrl,
          dataType: "json",
          data: "codigo_registro="+id+"&seleccion=" +seleccionado+"&user="+user,
          cache: false,
          success: function(response){
			//alert("Yeah! Se logro");
		  }
        });
        return false;
	}

	function CambiarCargo(id,combo)
	{
		var codigo = $(combo).val();
		var user = $('#user').val();
		var doLoginMethodUrl = 'seleccionpea/cambiar_cargo';
		$.ajax({
          type: "POST",
          url: doLoginMethodUrl,
          dataType: "json",
          data: "codigo_registro="+id+"&codigo_adm="+codigo+"&user="+user,
          cache: false,
          success: function(response){
            //alert("Yeah! Se logro");
          }
        });
        return false;
	}

	function reportar()
	{
		var coddepa = jQuery("#departamento").val();
		var codprov = jQuery("#provincia").val();

		var id_cargo = $('#cargo').val();
		$("#cargo_presupuestal option[value=" + id_cargo + "]").attr('selected', 'selected');
		$("#cargo_adm option[value=" + id_cargo + "]").attr('selected', 'selected');
		var cargo_presupuestal = $('#cargo_presupuestal').find('option:selected').text();
		var cargo_adm = $('#cargo_adm').find('option:selected').text();

		if (coddepa == -1 || codprov == -1 || id_cargo == -1)
		{ 
			alert("Debe Seleccionar un Departamento, Provincia y Cargo");
		}else{
			$('#cod_depa').val(coddepa);
			$('#cod_prov').val(codprov);
			$('#cod_cargo').val(id_cargo);
			$('#cod_presu').val(cargo_presupuestal);
			$('#cod_adm').val(cargo_adm);

			jQuery("#list2").jqGrid('setGridParam',{url:"seleccionpea/obtenreporte?coddepa="+coddepa+"&codprov="+codprov+"&codconvo="+id_cargo+"&codpresu="+cargo_presupuestal+"&codadm="+cargo_adm,page:1}).trigger("reloadGrid");
		}
	}

	function exportExcel()
	{
		var coddepa = $('#cod_depa').val();
		var codprov = $('#cod_prov').val();
		var id_cargo = $('#cod_cargo').val();
		var cargo_presupuestal = $('#cod_presu').val();
		var cargo_adm = $('#cod_adm').val();

		if (coddepa == "" || codprov == "" || id_cargo == "")
		{ 
			alert("Ud. No ha realizado ninguna búsqueda"); 
		}else{
			document.forms[0].method='POST';
			document.forms[0].action="csvExport/ExportacionSeleccionPEA?coddepa="+coddepa+"&codprov="+codprov+"&codconvo="+id_cargo+"&codpresu="+cargo_presupuestal+"&codadm="+cargo_adm;
			document.forms[0].target='_blank';
			document.forms[0].submit();
		}
	}

</script>