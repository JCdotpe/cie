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
		$depaArray[$filas->cod_sede_operativa.$filas->CCDD]=utf8_encode($filas->Departamento);
    }
    $selected_dpto = (set_value('departamento')) ? set_value('departamento') : '' ;
    $provArray = array(-1 => '');
    
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
			<?php $this->load->view('seleccion/includes/sidebar_view.php'); ?>
		</div>
		<div id="ap-content" class="span10">
			<?php echo form_open('','id="frm_reporte"'); ?>
			<div class="row-fluid well top-conv">				
				<div class="span3">
					<div class="control-group">
						<?php echo form_label('Departamento', 'departamento', $label_class); ?>
						<div class="controls">
							<?php echo form_dropdown('departamento', $depaArray, '#', 'id="departamento" onChange="cargarProvBySede();"'); ?>
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
								echo form_dropdown('cargo', $cargosArray, $selected_cargo, ' id="cargo"'); 
								echo form_dropdown('cargo', $cargospresupuestario, $selected_cargo, ' id="cargo_presupuestal" style="display:none"'); 
								echo form_dropdown('cargo', $cargosadm, $selected_cargo, ' id="cargo_adm" style="display:none" ');
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
		   	url:'capacitacion/obtenreporte',
			datatype: "json",
			height: 255,
		   	colNames:['Nro', 'Aprobado', 'Desaprobado', 'Departamento', 'Provincia', 'Nombre', 'DNI', 'RUC', 'Nivel', 'Profesion', 'Fecha Inscripcion'],
		   	colModel:[
		   		{name:'nro_fila', sortable:false, width:40, align:'center'},
				{name:'estado_sistemas',index:'estado_sistemas',edittype:'checkbox',formatter: cboxAprobado,editable:true,sortable:false,align:'center'},
				{name:'estado_sistemas',index:'estado_sistemas',edittype:'checkbox',formatter: cboxDesaprobado,editable:true,sortable:false,align:'center'},
		   		{name:'departamento',index:'departamento',align:'center'},
		   		{name:'provincia',index:'provincia',align:'center'},
		   		{name:'nombrecompleto',index:'ap_paterno',align:'center'},
		   		{name:'dni',index:'dni',align:'center'},
		   		{name:'ruc',index:'ruc',align:'center'},
		   		{name:'nivel',index:'nivel',align:'center'},
		   		{name:'profesion',index:'profesion',align:'center'},
		   		{name:'fecha_registro',index:'fecha_registro',align:'center'}
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

	function cboxAprobado(cellvalue, options, rowObject)
	{
		var estado = cellvalue.substring(0,1);
		var capa_sis = cellvalue.substring(1,2);

		return '<input id="a_'+options.rowId+'" type="checkbox"' + (estado >= 5 ? ' checked="checked"' : '') + (capa_sis == 1 ? ' disabled="disabled"' : '' ) + (estado <= 5 ? ' onclick="RegistroACapacitados(' + options.rowId + ',this)" />' : ' onclick="return false;"/> En Seleccíón');
	}

	function cboxDesaprobado(cellvalue, options, rowObject)
	{
		var estado = cellvalue.substring(0,1);
		var capa_sis = cellvalue.substring(1,2);

		return '<input id="d_'+options.rowId+'" type="checkbox"' + (estado == 4 ? ' checked="checked"' : '') + (capa_sis == 1 ? ' disabled="disabled"' : '' ) + (estado <= 5 ? ' onclick="RegistroDCapacitados(' + options.rowId + ',this)"' : ' onclick="return false;"') + '/>';
	}

	function RegistroACapacitados(id,checkbox)
	{
		$(checkbox).is(':checked') ? seleccionado = 5 : seleccionado = 3;
		$("#d_"+id+":checkbox").removeAttr('checked');

		var user = $('#user').val();
		var doLoginMethodUrl = 'capacitacion/registrar_capacitados';
		$.ajax({
          type: "POST",
          url: doLoginMethodUrl,
          dataType: "json",
          data: "codigo_registro="+id+"&seleccion="+seleccionado+"&user="+user,
          cache: false,
          success: function(response){          	
           //alert("Yeah! Se logro");
          }
        });
        return false;
	}

	function RegistroDCapacitados(id,checkbox)
	{
		$(checkbox).is(':checked') ? seleccionado = 4 : seleccionado = 3;
		$("#a_"+id+":checkbox").removeAttr('checked');

		var user = $('#user').val();
		var doLoginMethodUrl = 'capacitacion/registrar_capacitados';
        $.ajax({
          type: "POST",
          url: doLoginMethodUrl,
          dataType: "json",
          data: "codigo_registro="+id+"&seleccion="+seleccionado+"&user="+user,
          cache: false,
          success: function(response){          	
           //alert("Yeah! Se logro");
          }
        });
		return false;
	}

	function reportar()
	{
		var codigo = jQuery("#departamento").val();
		var codprov = jQuery("#provincia").val();

		if (codigo.length < 5)
		{
			coddepa = codigo.substring(2,4);
		}else{
			coddepa = codigo.substring(3,5);
		}

		var id_cargo = $('#cargo').val();
		$("#cargo_presupuestal option[value=" + id_cargo + "]").attr('selected', 'selected');
		$("#cargo_adm option[value=" + id_cargo + "]").attr('selected', 'selected');
		var cargo_presupuestal = $('#cargo_presupuestal').find('option:selected').text();
		var cargo_adm = $('#cargo_adm').find('option:selected').text();

		if (codigo == -1 || codprov == -1 || id_cargo == -1)
		{ 
			alert("Debe Seleccionar un Departamento, Provincia y Cargo");
		}else{
			$('#cod_depa').val(coddepa);
			$('#cod_prov').val(codprov);
			$('#cod_cargo').val(id_cargo);
			$('#cod_presu').val(cargo_presupuestal);
			$('#cod_adm').val(cargo_adm);

			jQuery("#list2").jqGrid('setGridParam',{url:"capacitacion/obtenreporte?coddepa="+coddepa+"&codprov="+codprov+"&codconvo="+id_cargo+"&codpresu="+cargo_presupuestal+"&codadm="+cargo_adm,page:1}).trigger("reloadGrid");
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
			document.forms[0].action="csvExport/ExportacionCapacitacion?coddepa="+coddepa+"&codprov="+codprov+"&codconvo="+id_cargo+"&codpresu="+cargo_presupuestal+"&codadm="+cargo_adm;
			document.forms[0].target='_blank';
			document.forms[0].submit();
		}
	}

</script>