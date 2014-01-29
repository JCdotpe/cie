<link rel="stylesheet" href="<?php echo base_url('css/jquery-ui-1.10.3.custom.min.css') ?>">
<link rel="stylesheet" href="<?php echo base_url('css/datatable/demo_page.css'); ?>">
<link rel="stylesheet" href="<?php echo base_url('css/datatable/demo_table.css'); ?>">
<script src="<?php echo base_url('js/datatable/jquery.dataTables.js'); ?>"></script>
<style>
	.ui-jqgrid tr.jqgrow td {
		white-space: normal !important;
	}
	.border-total{
		border: 1px solid black;
	}
	.border_l{
		border-left: 1px solid black;
	}
	.border_r{
		border-right: 1px solid black;
	}
</style>
<?php
	$label_class =  array('class' => 'control-label');
?>

<div class="row-fluid">
	<div class="row-fluid">
		<div id="ap-sidebar" class="span2">
			<?php $this->load->view('consistencia/includes/sidebar_view.php'); ?>
		</div>
		
		<div id="ap-content" class="span10">
				<?php echo form_open('','id="frm_reporte"'); ?>
					<div id="table" class="span12">
					</div>
				<?php echo form_close(); ?>
		</div>
		<div class="span12">
			<?php echo form_button('expo','Exportar a Excel','class="btn btn-inverse pull-right" id="expo" style="margin-top:20px" onClick="exportExcel()"'); ?>
		</div>
	</div>
</div>
<script type="text/javascript">

$(document).ready(function(){
	ViewResultado();
});

function ViewResultado()
{
	$.getJSON(urlRoot('index.php')+'/consistencia/avance_digitacion/estado_situacional/' , {}, function(data, textStatus) {

			table='<table id="lista" style="width:950px;" class="display">'+
			'<thead>'+
				'<tr>'+
					'<th rowspan="2">N°</th>'+
					'<th rowspan="2">Departamento</th>'+
					'<th colspan="3" class="border-total">TOTAL</th>'+
					'<th colspan="3" class="border-total">PERIODO 9 - 14</th>'+
					'<th colspan="4" class="border-total">PERIODO 1 - 8</th>'+
				'</tr>'+
				'<tr>'+
					'<th class="border_l">Meta</th>'+
					'<th>En BD</th>'+
					'<th>Avance %</th>'+
					'<th class="border_l">Meta</th>'+
					'<th>Procesado TABLET</th>'+
					'<th>Avance %</th>'+
					'<th class="border_l">Meta</th>'+
					'<th>Procesado TABLET</th>'+
					'<th>Procesado OTIN</th>'+
					'<th class="border_r">Avance %</th>'+
				'</tr>'+
			'</thead>'+
			'<tbody>';

			$.each(data, function(index, val) {

				table+='<tr>'+
						'<td class="center">'+val.cod_dpto+'</td>'+
						'<td class="center">'+val.Dpto+'</td>'+
						'<td class="center">'+val.Total_Meta+'</td>'+
						'<td class="center">'+val.Total_Cant+'</td>'+
						'<td class="center">'+val.Total_Porc+'</td>'+
						'<td class="center">'+val.Tablet_Meta+'</td>'+
						'<td class="center">'+val.Tablet_Cant+'</td>'+
						'<td class="center">'+val.Tablet_Porc+'</td>'+
						'<td class="center">'+val.OTIN_Meta+'</td>'+
						'<td class="center">'+val.Tablet_Cant_1_8+'</td>'+
						'<td class="center">'+val.OTIN_Cant+'</td>'+
						'<td class="center">'+val.OTIN_Porc+'</td>'+
					'</tr>';
			});

			table+='</tbody>'+
			'</table>';
		
		$("#table").html(table);
		$('#lista').dataTable( {
			"bJQueryUI": false,
			"bFilter": false,
			"bLengthChange": false,
			"bPaginate":false,
			// "sPaginationType": "full_numbers",
			"bScrollCollapse": true,
			"sScrollY": "500px",
			// "iDisplayLength" : 50,
		} );
	});
}

function exportExcel()
{
	document.forms[0].method='POST';
	document.forms[0].action=urlRoot('index.php')+"/consistencia/csvExport/exp_estado_situacional";
	document.forms[0].target='_blank';
	document.forms[0].submit();
}

</script>