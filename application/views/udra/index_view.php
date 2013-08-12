<link rel="stylesheet" href="<?php echo base_url('css/smoothness/jquery-ui-1.10.2.custom.min.css'); ?>">
<script src="<?php echo base_url('js/general/jquery-ui-1.10.2.custom.min.js'); ?>"></script>
<script src="<?php echo base_url('js/udra/udra.js'); ?>"></script>
<link rel="stylesheet" href="<?php echo base_url('css/jquery-ui-1.10.3.custom.min.css') ?>">
<link rel="stylesheet" href="<?php echo base_url('css/ui.jqgrid.css') ?>">
<script src="<?php echo base_url('js/jqgrid/i18n/grid.locale-es.js'); ?>"></script>
<script src="<?php echo base_url('js/jqgrid/jquery.jqGrid.min.js'); ?>"></script>

<?php
  $label_class =  array('class' => 'control-label');
  $span_class =  'span10';
  $span_class2 =  'span10';
  $Arrayactivo="";
  foreach ($activos->result() as $filas) {
    # code...
      $Arrayactivo[$filas->codigo_act]=utf8_encode(trim($filas->nombre_act));
  }
  $selected_activo = (set_value('comboactivo')) ? set_value('comboactivo') : '' ;
 ?>
<!-- empieza formulario registro-->

<?php
  $attr = array('class' => 'form-val','id' => 'udra_registro', 'style' => 'overflow: auto;');
  echo form_open($this->uri->uri_string(), $attr);  ?>
  <div class="well modulo">
     <!-- <div id="registro" class="container"> -->      <div class="row-fluid">
            <div class="span3">
                <div class="control-group">
                    <div class="controls">
                        <p> Tipo de movimiento</p>
                            <select class="span7" id="combo_tipo_mov" name="combo_tipo_mov">
                              <option value=1>INGRESO</option>
                              <option value=2>SALIDA</option>
                            </select>
                    </div>
                </div>
            </div>

             <div class="span3">
                <div class="control-group">
                  <label class="control-label" for="comboactivo">Activo</label>

                  <div class="controls">
                  <?php echo  form_dropdown('departamento', $Arrayactivo, $selected_activo, 'class="' . $span_class . '" id="comboactivo" autocomplete="off"');?>
                    <button type="button" id="add-activo">
                      <i class="icon-plus"></i>
                    </button>
                    <span class="help-inline">*</span>
                    <div class="help-block error"><?php echo   form_error('comboactivo') ?> </div>
                  </div>
                </div>
             </div>

             <div class="span3">
                <div class="control-group">
                  <label class="control-label" for="inputcantidad">Cantidad</label>
                  <div class="controls">
                    <div class="input-prepend">
                      <span class="add-on"><i class="icon-pencil"></i></span>
                      <input type="text" class="input-small" maxlength  = '6' id="inputcantidad" placeholder="Cantidad..." name="inputcantidad">
                      <span class="help-inline">*</span>
                      <div class="help-block error"><?php  echo  form_error('inputcantidad') ?> </div>
                    </div>
                  </div>
                </div>
             </div>

             <div class="span3">
                <div class="control-group">
                  <label class="control-label" for="comboestado">Estado</label>
                  <div class="controls">
                    <select class="span7" id="comboestado"  name="comboestado">
                      <option value=1>NUEVO</option>
                      <option value=2>USADO</option>
                      <option value=3>DAÑADO</option>
                    </select>
                    <span class="help-inline">*</span>
                    <div class="help-block error"><?php echo  form_error('comboestado') ?> </div>
                  </div>
                </div>
             </div>
      </div>
      <div class="row-fluid">

              <div class="span3">
                <div class="control-group">
                  <label class="control-label" for="combonaturaleza">Naturaleza</label>
                  <div class="controls" >
                    <select class="span7" id="combonaturaleza" name="combonaturaleza">
                      <option value=1>ADQUISICIÓN</option>
                      <option value=2>PRESTAMO</option>
                      <option value=3>TRASLADO</option>
                    </select>
                    <span class="help-inline">*</span>
                    <div class="help-block error"><?php echo  form_error('combonaturaleza'); ?> </div>
                  </div>
                </div>
             </div>

             <div class="span3">
                <div class="control-group">
                  <label class="control-label" for="combodestino">Destino</label>
                  <div class="controls">
                    <select class="span7" id="destino" name="destino">
                      <option value=1>CAMPO</option>
                      <option value=2>CAPACITACIÓN</option>
                      <option value=3>OFICINA</option>
                      <option value=4>SEGMENTACION</option>
                      <option value=5>METODOLOGÍA</option>
                      <option value=6>UDRA</option>
                    </select>
                    <span class="help-inline">*</span>
                    <div class="help-block error"><?php  echo  form_error('destino') ?> </div>
                  </div>
                </div>
             </div>

             <div class="span3">
                <div class="control-group">
                  <label class="control-label" for="combodocumento">Documento</label>
                  <div class="controls">

                     <select class="span7" id="combodocumento" name="combodocumento">
                        <option value=1>FACTURA</option>
                        <option value=2>CARGO</option>
                        <option value=3>GUIA DE REMISIÓN</option>
                        <option value=4>ORDEN DE SALIDA</option>
                      </select>
                    <span class="help-inline">*</span>
                    <div class="help-block error"><?php echo   form_error('combodocumento') ?> </div>
                  </div>
                </div>
             </div>

             <div class="span3">
                <div class="control-group">
                  <label class="control-label" for="inputnrodocumento">Nro de documento</label>
                  <div class="controls">
                    <div class="input-prepend">
                      <span class="add-on"><i class="icon-pencil"></i></span>
                      <input type="text" class="span10" maxlength  = '25' id="inputnrodocumento" name="inputnrodocumento" placeholder="Nro...">
                      <span class="help-inline">*</span>
                      <div class="help-block error"><?php  echo  form_error('inputnrodocumento') ?> </div>
                    </div>
                  </div>
                </div>
             </div>
      </div>

      <div class="row-fluid">
           <div class="span3">
                <div class="control-group">
                  <label class="control-label" for="combodoproyecto">Proyecto</label>
                  <div class="controls">

                     <select class="span7" id="comboproyecto" name="combodocumento">
                        <option value=1>ECE</option>
                        <option value=2>INFRAESTRUCTURA</option>
                        <option value=3>CENPESCO</option>
                        <option value=4>BOSQUE</option>
                        <option value=5>EDNOM</option>
                      </select>
                    <span class="help-inline">*</span>
                    <div class="help-block error"><?php echo   form_error('combodoproyecto') ?> </div>
                  </div>
                </div>
           </div>
           <div class="span3">
                <div class="control-group">
                  <label class="control-label" for="inputnglosa">Glosa</label>
                  <div class="controls">
                    <div class="input-prepend">
                      <span class="add-on"><i class="icon-pencil"></i></span>
                      <input type="text" class="span10" maxlength  = "125" id="inputglosa" name="inputglosa" placeholder="...">
                      <span class="help-inline">*</span>
                      <div class="help-block error"><?php  echo  form_error('inputglosa') ?> </div>
                    </div>
                  </div>
                </div>
           </div>
          <?php echo form_submit('send', 'Guardar','class="btn btn-primary dtadd" style="margin-top:20px" '); ?>
          <?php echo form_close();  ?>
      </div>

    <!-- </div> -->
    <p><tt id="results"></tt></p>
  </div>
<?php
  $attr = array('class' => 'form-val','id' => 'udra_activo', 'style' => 'overflow: auto;');
  echo form_open($this->uri->uri_string(), $attr);  ?>
    <!-- Modal -->
  <div id="add-activo-modal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
      <h3 id="myModalLabel">Ingreso de Activos</h3>
    </div>
    <div class="modal-body">
        <div class="span2">
                  <div class="control-group">
                    <label class="control-label" for="inputactivonuevo">Nombre de activo</label>
                    <div class="controls">
                      <div class="input-prepend">
                        <span class="add-on"><i class="icon-pencil"></i></span>
                        <input type="text" class="span3" id="inputactivonuevo" name="inputactivonuevo" placeholder="...">
                          <p><tt id="results-activo"></tt></p>
                        <span class="help-inline">*</span>
                        <div class="help-block error"></div>
                      </div>
                    </div>
                  </div>
        </div>
    </div>
    <div class="modal-footer">
        <button class="btn" data-dismiss="modal" aria-hidden="true">Cerrar</button>
        <button id="save_activo" class="btn btn-primary">Guardar</button>
    </div>
  </div>
  <?php echo form_close();  ?>

 <?php
  $attr = array('class' => 'form-val','id' => 'udra_patrimonio', 'style' => 'overflow: auto;');
  echo form_open($this->uri->uri_string(), $attr);  ?>
<!-- Modal save patrimonio-->
<div id="add-detalle-modal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

     <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
      <h3 id="myModalLabel">Ingreso de IMEI / Código patrimonial</h3>
    </div>
 
    <div class="modal-body">
        <div class="span2">
          <table class="table table-condensed">
            <thead>
              <tr>
                <th>CODIGO DE MOVIMIENTO</th>
                <th>CANTIDAD</th>
                <th>INGRESADO</th>
              </tr>
            </thead>
            <tbody>
              <tr class="success">
                  <td><input type="text" class="span1" id="codigo_udra" name="codigo_udra" disabled="disabled"></td>
                  <td><input type="text" class="span1" id="cantidad" name="cantidad" disabled="disabled"></td>
                  <td><input type="text" class="span1" id="ingresado" name="ingresado" disabled="disabled"></td>
              </tr>
            </tbody>          
          </table>
          <div class="control-group">
                    <label class="control-label" for="inputpatrimonio">IMEI / Código patrimonial</label>
                    <div class="controls">
                      <div class="input-prepend">
                        <span class="add-on"><i class="icon-pencil"></i></span>
                        <input type="text" class="span3" id="inputpatrimonio" name="inputpatrimonio" maxlength="15">
                        <span class="help-inline">*</span>
                        <div class="help-block error"></div>
                      </div>
                    </div>
          </div>          
    </div>
    <div class="span4" id="alerta" style="display: none">
        <div class="alert alert-danger">
           <!--  <button type="button" class="close" data-dismiss="alert">&times;</button> -->
            <strong>Alerta!</strong> Ya existe el código.
          </div>
    </div>
    </div>

    <div class="modal-footer">
        <button class="btn" data-dismiss="modal" aria-hidden="true">Cerrar</button>
        <button id="save_patrimonio" class="btn btn-primary">Guardar</button>
    </div>

</div>

 <?php echo form_close();  ?>

<div id="grid_content">
        <table id="editgrid"></table>
            <table id="list2"></table>
            <div id="pager2" ></div>
</div>
<div>
    <input type="BUTTON" id="bedata" value="Editar" />
    <input type="BUTTON" id="elim_bedata" value="Eliminar" />
</div>