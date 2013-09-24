
<?php

	$label_class =  array('class' => 'control-label');

    $this->load->helper('my');

?>

<link rel="stylesheet" href="<?php echo base_url('css/datatable/demo_page.css'); ?>">
<link rel="stylesheet" href="<?php echo base_url('css/datatable/demo_table.css'); ?>">
<script src="<?php echo base_url('js/datatable/jquery.dataTables.js'); ?>"></script>
<script type="text/javascript">
	
	$(document).ready(function() {
		
        /*$('#lista').dataTable( {
			"bJQueryUI": false,
            "bFilter": false,
            "bLengthChange": false,
			"sPaginationType": "full_numbers"
		} );*/
        combosede();
        $('#NOM_PROV').attr('disabled', true);
        $('#PERIODO').attr('disabled', true);

	});

    function combosede(){

        $.getJSON(urlRoot('index.php')+'/visor/gps/sedeOperativa', {token: getToken()}, function(data, textStatus) {
          
          var html='<option value="0">SELECCIONE...</option>';

          $.each(data, function(index, val) {
            
            html+='<option class="cmbsede" value="'+val.cod_sede_operativa+'">'+val.sede_operativa+'</option>';

          });

          $('#NOM_SEDE').html(html);

          $('#NOM_SEDE').change(function(event){

            comboprovincia($(this).val());

            $('#PERIODO').attr('disabled', true); 
            $('#PERIODO').val(0)

          });

        }).fail(function( jqxhr, textStatus, error ) {
        
          var err = textStatus + ', ' + error;
          console.log( "Request Failed: " + err);
        
        });
      
    }   

     function comboprovincia(code){

        $.getJSON(urlRoot('index.php')+'/visor/gps/provinciaOperativa', {token: getToken(),code:code}, function(data, textStatus) {
          
          var html='<option value="0">SELECCIONE...</option>';

          $('#NOM_PROV').attr('disabled', false);
          
          $.each(data, function(index, val) {
            
            html+='<option value="'+val.cod_prov_operativa+'">'+val.prov_operativa_ugel+'</option>';

          });

            $('#NOM_PROV').html(html);
            $('#NOM_PROV').change(function(event){
            $('#PERIODO').attr('disabled', false);
            $('#PERIODO').val(0);

          });

        }).fail(function( jqxhr, textStatus, error ) {
        
          var err = textStatus + ', ' + error;
          console.log( "Request Failed: " + err);
        
        });
      
    }

    function query_by_local(){
        
        $.getJSON(urlRoot('index.php')+'/visor/gps/provinciaOperativa', {token: getToken(),id_local:id_local}, function(data, textStatus) {
            
            

        });    
    
    }


</script>

<div id="visor-content">


<div class="row-fluid ">

        <h4 align="center">VISOR DE CEDULAS</h4>

        <div class="form-span10 row-fluid well top-conv" style="margin-left:0px;">

            <div class="span3" style="margin:0 auto; border-right:1px solid #CCC; width:340px;">

                    <div style="font-weight:bold; padding:0 0 15px 0; font-size:14px;">1. Busqueda de Locales por numero de Local.</div>

                    <div class="control-group">
                        <?php /*echo form_label('Ruta', 'ruta', $label_class);*/ ?>
                        <label>CODIGO DE LOCAL</label>
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
                        <?php echo form_label('SEDE OPERATIVA', 'departamento', $label_class); ?>
                        <div class="controls">
                            <select id="NOM_SEDE" style="width:140px;"></select>
                        </div>
                    </div>

                    <div class="control-group" style="float:left; margin-left:15px;">
                        <?php echo form_label('PROVINCIA', 'provincia', $label_class); ?>
                        <div class="controls">
                            <select id="NOM_PROV" style="width:140px;"></select>
                        </div>
                    </div>

                    <div class="control-group" style="float:left; margin-left:15px;">
                        <?php echo form_label('PERIODO', 'provincia', $label_class); ?>
                        <div class="controls">
                            <select id="PERIODO" style="width:140px;">
                                <option value="0">SELECCIONE...</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                                <option value="10">10</option>
                                <option value="11">11</option>
                                <option value="12">12</option>
                                <option value="13">13</option>
                                <option value="14">14</option>
                            </select>
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