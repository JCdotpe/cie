
<?php

	$label_class =  array('class' => 'control-label');

	$depaArray = array(-1 => 'Seleccione...');

	$provArray = array(-1 => '');

	$regArray = array(-1 => '');

    foreach($depa->result() as $filas)
    {
      $depaArray[$filas->CCDD]=utf8_encode(strtoupper($filas->Nombre));
    }

?>

<div class="row-fluid ">

		<div class="form-span10 row-fluid well top-conv" style="margin-left:30px; width:1000px;">

			<div class="span3">
					<div class="control-group">
						<?php echo form_label('Departamento', 'departamento', $label_class); ?>
						<div class="controls">
							<?php echo form_dropdown('departamento', $depaArray, '#', 'id="departamento"'); ?>
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
						<?php /*echo form_label('Ruta', 'ruta', $label_class);*/ ?>
						<label>Codigo de Local</label>
						<div class="controls">
							<?php /*echo form_dropdown('ruta', $regArray, '#', 'id="ruta"');*/ ?>
							<input id="cod_local" style="width:50px;float:left;" type="text" class="form-control">
						</div>
					</div>
			</div>

			<div class="span1">
					<?php echo form_button('ver','Visualizar','class="btn btn-primary" id="ver" style="margin-top:20px"'); ?>
			</div>

		</div>

	</div>
<div class="row-fluid">
  <div id="grid_content" class="span12" style="width: 1170px;">
        <table id="editgrid"></table>
          <div class="span12">
            <table id="list2" style="width: 1170px;"></table>
            <div id="pager2" style="width: 1170px;"></div>
          </div>
  </div>
</div>