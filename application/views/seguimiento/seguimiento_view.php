<link rel="stylesheet" href="<?php echo base_url('css/jquery-ui-1.10.3.custom.min.css') ?>">
<link rel="stylesheet" href="<?php echo base_url('css/ui.jqgrid.css') ?>">
<script src="<?php echo base_url('js/jqgrid/i18n/grid.locale-es.js'); ?>"></script>
<script src="<?php echo base_url('js/jqgrid/jquery.jqGrid.min.js'); ?>"></script>
<script src="<?php echo base_url('js/seguimiento.js'); ?>"></script>
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
		$depaArray[$filas->CCDD]=utf8_encode($filas->Departamento);
		$sedeArray[$filas->CCDD] = $filas->cod_sede_operativa;
    }
    $selected_dpto = (set_value('departamento')) ? set_value('departamento') : '' ;
	$provArray = array(-1 => '');
	$distArray = array(-1 => '');
	$centropArray = array(-1 => '');
	$rutasArray = array(-1 => '');
	$periodoArray = array(-1 => '');
?>

<div class="row-fluid">
	<div class="row-fluid">
		<div id="ap-content" class="span12">
			<div class="row-fluid well top-conv">
				<?php echo form_open('','id="frm_seguimiento"'); ?>
				<div class="span2">
					<div class="control-group">
						<?php echo form_label('Departamento', 'departamento', $label_class); ?>
						<div class="controls">
							<?php 
								echo form_dropdown('departamento', $depaArray, '#', 'id="departamento" style="width:180px;" onChange="cargarProvBySede();"');
								echo form_dropdown('sedeoperativa', $sedeArray, $selected_dpto, '" id="sedeoperativa" style="display:none"');
							?>
						</div>
					</div>
				</div>
				<div class="span2">
					<div class="control-group">
						<?php echo form_label('Provincia', 'provincia', $label_class); ?>
						<div class="controls">
							<?php echo form_dropdown('provincia', $provArray, '#', 'id="provincia" style="width:180px;" onChange="cargarDist();"'); ?>
						</div>
					</div>
				</div>
				<div class="span2">
					<div class="control-group">
						<?php echo form_label('Distrito', 'distrito', $label_class); ?>
						<div class="controls">
							<?php echo form_dropdown('distrito', $distArray, '#', 'id="distrito" style="width:180px;" onChange="cargarCentroPoblado();"'); ?>
						</div>
					</div>
				</div>
				<div class="span2">
					<div class="control-group">
						<?php echo form_label('Centro Poblado', 'centropoblado', $label_class); ?>
						<div class="controls">
							<?php echo form_dropdown('centropoblado', $centropArray, '#', 'id="centropoblado" style="width:180px;" onChange="cargarRutas();"');
							?>
						</div>
					</div>
				</div>
				<div class="span2">
					<div class="control-group">
						<?php echo form_label('Código de Ruta', 'rutas', $label_class); ?>
						<div class="controls">
							<?php echo form_dropdown('rutas', $rutasArray, '#', 'id="rutas" style="width:180px;" onChange="cargarPeriodo();"');
							?>
						</div>
					</div>
				</div>
				<div class="span2">
					<div class="control-group">
						<?php echo form_label('Periodo de Trabajo', 'periodo', $label_class); ?>
						<div class="controls">
							<?php echo form_dropdown('periodo', $periodoArray, '#', 'id="periodo" style="width:180px;"');
							?>
						</div>
					</div>
				</div>
				<!--
				<div class="span1">
					<?php #echo form_button('ver','Visualizar','class="btn btn-primary" id="ver" style="margin-top:20px" onClick="reportar()"'); ?>
				</div>
				-->
			</div>
			<input type="hidden" name="user" id="user" value="<?php echo $user_id; ?>" />
			<?php echo form_close(); ?>
		</div>
	</div>
</div>