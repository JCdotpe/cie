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
    $SedeArray =array(-1=>'Seleccione...',99 => 'Todos');
    
	foreach($Sede->result() as $filas)
	{
		
		$SedeArray[$filas->cod_sede_operativa] = utf8_encode(strtoupper($filas->sede_operativa));
	}
    
    $provArray = array(-1 => '',99=> 'TODOS');
	
	
	$rutasArray = array(-1 => '');
?>

<div class="row-fluid">
	<div class="row-fluid">
		<div id="ap-sidebar" class="span2">
			<?php $this->load->view('seguimiento/includes/sidebar_view.php'); ?>
		</div>
	
			
		<div id="ap-content" class="span10">
			<div class="row-fluid well top-conv">


			<?php echo form_open('','id="frm_reporte"'); ?>
							<div class="span3">
					<div class="control-group">
						<?php echo form_label('Sede Operativa', 'sedeoperativa', $label_class); ?>
						<div class="controls">
							<?php 
								echo form_dropdown('sedeoperativa', $SedeArray, '#', 'id="sedeoperativa" style="width:180px;" onChange="cargarProvBySede();"');
								
							?>
						</div>
					</div>
				</div>
				<div class="span3">
					<div class="control-group">
						<?php echo form_label('Provincia Operativa', 'provincia_ope', $label_class); ?>
						<div class="controls">
							<?php echo form_dropdown('provincia_ope', $provArray, '#', 'id="provincia_ope" style="width:180px;"'); ?>
						</div>
					</div>
				</div>
				
				
				
				<div class="span3">
					<div class="control-group">
						<?php echo form_label('Periodo de Trabajo', 'periodo', $label_class); ?>
						<div class="controls">
							<?php echo form_dropdown('periodo', $periodoArray, '#', 'id="periodo" style="width:100px;"');
							?>
						</div>
					</div>
				</div>
				<div class="span1">
					<?php echo form_button('ver','Visualizar','class="btn btn-inverse" id="ver" style="margin-top:20px" onClick="Reportar()"'); ?>
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
function Reportar()
{
	var sede = $('#sedeoperativa').val();
	var prov = $('#provincia_ope').val();
	var periodo = $('#periodo').val();

	/*$("#sedeoperativa").val(sede);
	$("#provincia_ope").val(prov);
	$("#cod_per").val(periodo);
*/
	ViewResultado(sede,prov,periodo)

}


function ViewResultado(sede,prov,periodo)
{		
	



	//$.getJSON(urlRoot('index.php')+'/seguimiento/reporte_avance_odei/view_resultado/' , {vperiodo:periodo}, function(data, textStatus) {
	$.getJSON(urlRoot('index.php')+'/seguimiento/reporte_avance_odei/view_resultado/' , {vsede:sede,vprov:prov,vperiodo:periodo}, function(data, textStatus) {

			table='<table id="lista" style="width:950px;" >'+
			'<thead>'+
				'<tr>'+
					'<th>Sede</th>'+
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
						'<td class="center">'+val.Sede+'</td>'+
						'<td class="center">'+val.Prov+'</td>'+
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
		var sede = $('#sedeoperativa').val();
		var prov = $('#provincia_ope').val();
		var codper = $('#periodo').val();

		if (codper == -1)
		{ 
			alert("Ud. No ha realizado ninguna búsqueda"); 
		}else{
			document.forms[0].method='POST';
			document.forms[0].action=urlRoot('index.php')+"/seguimiento/csvExport/ExportacionODEI_Avance?periodo="+codper+"&sede="+sede+"&prov="+prov;
			document.forms[0].target='_blank';
			document.forms[0].submit();
		}
	}

</script>