<link rel="stylesheet" href="<?php echo base_url('css/jquery-ui-1.10.3.custom.min.css') ?>">
<link rel="stylesheet" href="<?php echo base_url('css/datatable/demo_page.css'); ?>">
<link rel="stylesheet" href="<?php echo base_url('css/datatable/demo_table.css'); ?>">
<script src="<?php echo base_url('js/datatable/jquery.dataTables.js'); ?>"></script>
<style>
	.ui-jqgrid tr.jqgrow td {
		white-space: normal !important;
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
			<!-- <table id="lista" style="width:950px;" class="display">
				<thead>
					<tr>
						<th>Sede_Operativa</th>
						<th>Provincia_Operativa</th>
						<th>Departamento</th>
						<th>Provincia</th>
						<th>Distrito</th>
						<th>codigo_local</th>
						<th>Digitado</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td class="center">val.Sede_Operativa</td>
						<td class="center">val.Provincia_Operativa</td>
						<td class="center">val.Departamento</td>
						<td class="center">val.Provincia</td>
						<td class="center">val.Distrito</td>
						<td class="center">val.codigo_local</td>
						<td class="center">val.Digitado</td>
					</tr>
				</tbody>
			</table> -->

									

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
	$.getJSON(urlRoot('index.php')+'/consistencia/avance_digitacion/cobertura_otin/' , {}, function(data, textStatus) {

			table='<table id="lista" style="width:950px;" class="display">'+
			'<thead>'+
				'<tr>'+
					'<th>Sede Operativa</th>'+
					'<th>Provincia Operativa</th>'+
					'<th>Departamento</th>'+
					'<th>Provincia</th>'+
					'<th>Distrito</th>'+
					'<th>Codigo de Local</th>'+
					'<th>Digitado</th>'+
				'</tr>'+
			'</thead>'+
			'<tbody>';

			$.each(data, function(index, val) {

				table+='<tr>'+
						'<td class="center">'+val.Sede_Operativa+'</td>'+
						'<td class="center">'+val.Provincia_Operativa+'</td>'+
						'<td class="center">'+val.Departamento+'</td>'+
						'<td class="center">'+val.Provincia+'</td>'+
						'<td class="center">'+val.Distrito+'</td>'+
						'<td class="center">'+val.codigo_de_local+'</td>'+
						'<td class="center">'+val.Digitado+'</td>'+
					'</tr>';
			});

			table+='</tbody>'+
			'</table>';
		
		$("#table").html(table);
		$('#lista').dataTable( {
			"bJQueryUI": false,
			"bFilter": true,
			"bLengthChange": false,
			"sPaginationType": "full_numbers",
			"bScrollCollapse": true,
			"sScrollY": "500px",
			"iDisplayLength" : 50,
		} );
	});
}

function exportExcel()
{
	document.forms[0].method='POST';
	document.forms[0].action=urlRoot('index.php')+"/consistencia/csvExport/exp_cobertura_otin";
	document.forms[0].target='_blank';
	document.forms[0].submit();
}

</script>