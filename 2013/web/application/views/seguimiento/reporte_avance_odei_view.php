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
    $periodoArray = array(-1 => 'Seleccione...', 1 => '1', 2 => '2', 3 => '3', 4 => '4', 5 => '5', 6 => '6', 7 => '7', 8 => '8', 9 => '9', 10 => '10', 11 => '11', 12 => '12', 13 => '13', 14 => '14', 99 => 'Todos');
?>

<div class="row-fluid">
	<div class="row-fluid">
		<div id="ap-sidebar" class="span2">
			<?php $this->load->view('seguimiento/includes/sidebar_view.php'); ?>
		</div>
		<div id="ap-content" class="span10">
			<?php echo form_open('','id="frm_reporte"'); ?>
			<div class="row-fluid well top-conv">				
				<div class="span2">
					<div class="control-group">
						<?php echo form_label('Periodo', 'periodo', $label_class); ?>
						<div class="controls">
							<?php echo form_dropdown('periodo', $periodoArray, '#', 'id="periodo"'); ?>
						</div>
					</div>
				</div>
			</div>
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

	$(document).ready(function() {
		$('#periodo').change(function(event) {
			var periodo = $('#periodo').val();
			ViewResultado(periodo);
		});
	});

function ViewResultado(periodo)
{
	$.getJSON(urlRoot('index.php')+'/seguimiento/reporte_avance_odei/view_resultado/' , {vperiodo:periodo}, function(data, textStatus) {

			table='<table id="lista" style="width:950px;" class="display">'+
			'<thead>'+
				'<tr>'+
					'<th>ODEI</th>'+
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
						'<td class="center">'+val.detadepen+'</td>'+
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
			"sPaginationType": "full_numbers"
		} );
	});
}
	function exportExcel()
	{
		var codper = $("#periodo").val();

		if (codper == -1)
		{ 
			alert("Ud. No ha realizado ninguna búsqueda"); 
		}else{
			document.forms[0].method='POST';
			document.forms[0].action=urlRoot('index.php')+"/seguimiento/csvExport/ExportacionODEI_Avance?periodo="+codper;
			document.forms[0].target='_blank';
			document.forms[0].submit();
		}
	}

</script>