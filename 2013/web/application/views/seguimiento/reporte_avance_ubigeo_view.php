<link rel="stylesheet" href="<?php echo base_url('css/jquery-ui-1.10.3.custom.min.css') ?>">
<link rel="stylesheet" href="<?php echo base_url('css/datatable/demo_page.css'); ?>">
<link rel="stylesheet" href="<?php echo base_url('css/datatable/demo_table.css'); ?>">
<script src="<?php echo base_url('js/datatable/jquery.dataTables.js'); ?>"></script>
<script src="<?php echo base_url('js/seguimiento.js'); ?>"></script>
<style>
	.ui-jqgrid tr.jqgrow td {
		white-space: normal !important;
	}
</style>
<?php
	$label_class =  array('class' => 'control-label');

	$depaArray = array(-1 => 'Seleccione...', 99 => 'Departamentos');
	foreach($depa->result() as $filas)
	{
		$depaArray[$filas->CCDD]=utf8_encode(strtoupper($filas->Nombre));
	}
	$provArray = array(-1 => '');

	//$periodoArray = array(-1 => 'Seleccione...', 1 => '1', 2 => '2', 3 => '3', 4 => '4', 5 => '5', 6 => '6', 7 => '7', 8 => '8', 9 => '9', 10 => '10', 11 => '11', 12 => '12', 13 => '13', 14 => '14', 99 => 'Todos');

?>

<div class="row-fluid">
	<div class="row-fluid">
		<div id="ap-sidebar" class="span2">
			<?php $this->load->view('seguimiento/includes/sidebar_view.php'); ?>
		</div>
		<div id="ap-content" class="span10">
			<?php echo form_open('','id="frm_reporte"'); ?>
			<div class="row-fluid well top-conv">				
				<div class="span3">
					<div class="control-group">
						<?php echo form_label('Departamento', 'depa', $label_class); ?>
						<div class="controls">
							<?php echo form_dropdown('departamento', $depaArray, '#', 'id="departamento" onChange="cargarProv();"'); ?>
						</div>
					</div>
				</div>
				<div class="span3">
					<div class="control-group">
						<?php echo form_label('Provincia', 'prov', $label_class); ?>
						<div class="controls">
							<?php echo form_dropdown('provincia', $provArray, '#', 'id="provincia"'); ?>
						</div>
					</div>
				</div>
				<div class="span3">
					<div class="control-group">
						<?php echo form_label('Periodo', 'periodo', $label_class); ?>
						<div class="controls">
							<input type="text" id="periodo_min" class="span4" maxlength="2" onkeypress="return validar_numeros(event)" name="periodo_min"> - 
							<input type="text" id="periodo_max" class="span4" maxlength="2" onkeypress="return validar_numeros(event)" name="periodo_max">
						</div>
					</div>
				</div>
				<div class="span1">
					<?php echo form_button('ver','Visualizar','class="btn btn-primary" id="ver" style="margin-top:20px" onClick="Reportar()"'); ?>
				</div>
			</div>
			<input type="hidden" name="cod_depa" id="cod_depa" value="" />
			<input type="hidden" name="cod_prov" id="cod_prov" value="" />
			<input type="hidden" name="cod_per1" id="cod_per1" value="" />
			<input type="hidden" name="cod_per2" id="cod_per2" value="" />
			<?php echo form_close(); ?>
		</div>
		<div id="grid_content" class="span12">
		</div>
		<div class="span12">
			<?php echo form_button('expo','Exportar a Excel','class="btn btn-inverse pull-right" id="expo" style="margin-top:20px" onClick="exportExcel()"'); ?>
		</div>
	</div>
</div>
<script type="text/javascript">

function Reportar()
{
	var depa = $('#departamento').val();
	var prov = $('#provincia').val();
	var periodo_min = $('#periodo_min').val();
	var periodo_max = $('#periodo_max').val();

	$("#cod_depa").val(depa);
	$("#cod_prov").val(prov);
	$("#cod_per1").val(periodo_min);
	$("#cod_per2").val(periodo_max);

	ViewResultado(depa,prov,periodo_min,periodo_max)

}

function ViewResultado(depa,prov,periodo1,periodo2)
{
	$.getJSON(urlRoot('index.php')+'/seguimiento/reporte_avance_ubigeo/view_resultado/' , {vdepa:depa,vprov:prov,vperiodo1:periodo1,vperiodo2:periodo2}, function(data, textStatus) {

			table='<table id="lista" style="width:950px;" class="display">'+
			'<thead>'+
				'<tr>'+
					'<th>Departamento</th>'+
					'<th>Provincia</th>'+
					'<th>Total de Locales Escolares</th>'+
					'<th>Locales Visitados</th>'+
					'<th>Avance (%)</th>'+
					'<th>Completa (Abs)</th>'+
					'<th>Completa (%)</th>'+
					'<th>Incompleta (Abs)</th>'+
					'<th>Incompleta (%)</th>'+
					'<th>Rechazo (Abs)</th>'+
					'<th>Rechazo (%)</th>'+
					'<th>Desocupada (Abs)</th>'+
					'<th>Desocupada (%)</th>'+
					'<th>Otro (Abs)</th>'+
					'<th>Otro (%)</th>'+
				'</tr>'+
			'</thead>'+
			'<tbody>';

			$.each(data, function(index, val) {

				table+='<tr>'+
						'<td class="center">'+val.departamento+'</td>'+
						'<td class="center">'+val.provincia+'</td>'+
						'<td>'+val.LocEscolares+'</td>'+
						'<td>'+val.LocEscolar_Censado+'</td>'+
						'<td>'+val.LocEscolar_Censado_Porc+'</td>'+
						'<td>'+val.Completa+'</td>'+
						'<td>'+val.Completa_Porc+'</td>'+
						'<td>'+val.Incompleta+'</td>'+
						'<td>'+val.Incompleta_Porc+'</td>'+
						'<td>'+val.Rechazo+'</td>'+
						'<td>'+val.Rechazo_Porc+'</td>'+
						'<td>'+val.Desocupada+'</td>'+
						'<td>'+val.Desocupada_Porc+'</td>'+
						'<td>'+val.Otro+'</td>'+
						'<td>'+val.Otro_Porc+'</td>'+
					'</tr>';
			});

			table+='</tbody>'+
			'</table>';
		
		$("#grid_content").html(table);
		$('#lista').dataTable( {
			"bJQueryUI": false,
			"bFilter": false,
			"bLengthChange": false,
			"sPaginationType": "full_numbers",
			"bScrollCollapse": true,
			"sScrollY": "300px"
		} );
	});
}
	function exportExcel()
	{
		var coddepa = $("#cod_depa").val();
		var codprov = $("#cod_prov").val();
		var codper1 = $("#cod_per1").val();
		var codper2 = $("#cod_per2").val();

		if (coddepa == -1)
		{ 
			alert("Ud. No ha realizado ninguna búsqueda"); 
		}else{
			document.forms[0].method='POST';
			document.forms[0].action=urlRoot('index.php')+"/seguimiento/csvExport/ExportacionUbigeo_Avance?vperiodo1="+codper1+"&vperiodo2="+codper2+"&vdepa="+coddepa+"&vprov="+codprov;
			document.forms[0].target='_blank';
			document.forms[0].submit();
		}
	}

</script>