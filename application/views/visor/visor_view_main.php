
<?php

	$label_class =  array('class' => 'control-label');

	$depaArray = array(-1 => 'Seleccione...');

	$provArray = array(-1 => '');

	$regArray = array(-1 => '');

    foreach($depa->result() as $filas)
    {
      $depaArray[$filas->CCDD]=utf8_encode(strtoupper($filas->Nombre));
    }

    $this->load->helper('my');

?>

<link rel="stylesheet" href="<?php echo base_url('css/datatable/demo_page.css'); ?>">
<link rel="stylesheet" href="<?php echo base_url('css/datatable/demo_table.css'); ?>">
<script src="<?php echo base_url('js/datatable/jquery.dataTables.js'); ?>"></script>
<script type="text/javascript">
	
	$(document).ready(function() {
		$('#lista').dataTable( {
			"bJQueryUI": false,
            "bFilter": false,
            "bLengthChange": false,
			"sPaginationType": "full_numbers"
		} );
	});

</script>

<div id="visor-content">


<div class="row-fluid ">

        <h4 align="center">VISOR DE CEDULAS</h4>

        <div class="form-span10 row-fluid well top-conv" style="margin-left:0px;">

            <div class="span3" style="margin:0 auto; border-right:1px solid #CCC; width:340px;">

                    <div style="font-weight:bold; padding:0 0 15px 0; font-size:14px;">1. Busqueda de Locales por numero de Local.</div>

                    <div class="control-group">
                        <?php /*echo form_label('Ruta', 'ruta', $label_class);*/ ?>
                        <label>Codigo de Local</label>
                        <div class="controls">
                            <?php /*echo form_dropdown('ruta', $regArray, '#', 'id="ruta"');*/ ?>
                            <input id="cod_local" style="width:50px;float:left;" type="text" class="form-control">
                            <?php echo form_button('ver','Visualizar','class="btn btn-primary" id="ver" style="margin-left:15px;"'); ?>
                        </div>

                    </div>

            </div>

            <div class="span3" style="width:470px;">

                    <div style="font-weight:bold; padding:0 0 10px 0; font-size:14px;">2. Busqueda de Locales Escolares por Departamento y Provincia.</div>

                    <div class="control-group" style="float:left;">
                        <?php echo form_label('Departamento', 'departamento', $label_class); ?>
                        <div class="controls" id="control1">
                            
                        </div>
                    </div>

                    <div class="control-group" style="float:left; margin-left:15px;">
                        <?php echo form_label('Provincia', 'provincia', $label_class); ?>
                        <div class="controls" id="control2">
                            
                        </div>
                    </div>

                    <div class="control-group" style="float:left; margin-left:15px;">
                        <?php echo form_label('Provincia', 'provincia', $label_class); ?>
                        <div class="controls" id="control3">
                            
                        </div>
                    </div>
            </div>

        </div>

    </div>
<div class="row-fluid">
  <div id="grid_content" class="span12" style="width: 900px;">
        <table id="editgrid"></table>
          <div class="span12">
            <!-- <table id="lista" style="width:950px;" class="display">
                <thead>
                    <tr>
                        <th>Codigo de Local</th>
                        <th>Departamento</th>
                        <th>Provincia</th>
                        <th>Distrito</th>
                        <th>Instituciones Educativas</th>
                        <th>Cedulas Registradas</th>
                        <th>Puntos GPS</th>
                        <th>Fotos</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="center"><?php echo '<a href="visor/caratula1/?le='.obfuscate('042076').'&pr=1" target="_blank">042076 <img class="view" style="cursor:pointer;" src="'.base_url('img/search32.png').'" height="16" width="16" /></a>'; ?></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>

                    <tr>
                        <td class="center"><?php echo '<a href="visor/caratula1/?le='.obfuscate('000024').'&pr=1" target="_blank">000024 <img class="view" style="cursor:pointer;" src="'.base_url('img/search32.png').'" height="16" width="16" /></a>'; ?></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                                        
                </tbody>
            </table> -->
           
          </div>
  </div>
</div>




</div>