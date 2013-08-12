<link rel="stylesheet" href="<?php echo base_url('css/smoothness/jquery-ui-1.10.2.custom.min.css'); ?>">
<script src="<?php echo base_url('js/general/jquery-ui-1.10.2.custom.min.js'); ?>"></script>
<link rel="stylesheet" href="<?php echo base_url('css/jquery-ui-1.10.3.custom.min.css') ?>">
<link rel="stylesheet" href="<?php echo base_url('css/ui.jqgrid.css') ?>">
<script src="<?php echo base_url('js/jqgrid/i18n/grid.locale-es.js'); ?>"></script>
<script src="<?php echo base_url('js/jqgrid/jquery.jqGrid.min.js'); ?>"></script>
<?php
  $label_class =  array('class' => 'control-label');
  $span_class =  'span10';
  $span_class2 =  'span10';

    $actividad=array("" => 'Seleccione' );
    $selected_actividad = (set_value('rrhh')) ? set_value('rrhh') : '';
    foreach ($actividad_presupuestal->result() as $fila) {

      $actividad[$fila->codigo_ap]=$fila->nombre_ap;
    }

    $rrhh=array("" => 'Seleccione' );
    $selected_rrhh = (set_value('rrhh')) ? set_value('rrhh') : '';
    foreach ($nivel_rrhh->result() as  $filas) {

        $rrhh[$filas->codigo_nrrhh]=$filas->nombre_rrhh;
    }

    $fuente= array("" => 'Seleccione' );
    $selected_fuente = (set_value('fuente')) ? set_value('fuente') : '';
    foreach ($fuente_financiamiento->result() as  $filas) {

        $fuente[$filas->codigo_ff]=$filas->nombre_ff;
    }
    $arrayactivos= array("" => 'Seleccione' );
    $selected_activos=(set_value('activos')) ? set_value('activos') : '';
    foreach ($activos->result() as  $filas) {

      $arrayactivos[$filas->codigo_act]=$filas->nombre_act;
    }

    $cargo = array("" => 'Seleccione' );
    $selected_cargo= (set_value('cargo')) ? set_value('cargo') : '';
    foreach ($cargo_funcional->result() as  $filas) {

      $cargo[$filas->codigo_cf]=$filas->nombre_cf;
    }

    $contratacion=array("" => 'Seleccione' );
    $contratacion_dias="";
    $contratacion_mes="";
    $selected_contratacion = (set_value('cargo')) ? set_value('cargo') : '';
    foreach ($cargo_contratacion->result() as $filas) {

      $contratacion[$filas->CODI_CARG]=$filas->DESC_CARG." ( Sueldo mensual: ".$filas->SUEL_CARG.")";
      $contratacion_dias[$filas->CODI_CARG]=$filas->SUEL_CARG_DIA;
      $contratacion_mes[$filas->CODI_CARG]=$filas->SUEL_CARG;
    }


     $selected_mes= (set_value('mes')) ? set_value('mes') : '';
    $meses=array( "" =>' Seleccione' ,
                  '1' =>' Días' ,
                  '2' => 'Meses'
                  );

    $selected_requerimiento = (set_value('tipo')) ? set_value('tipo') : '';
    $tipo_requerimiento=array(
                  '1' =>' Recursos humanos' ,
                  '2' => ' Material / Servicios'
                  );

  $selected_pea=(set_value('pea')) ? set_value('pea') : '';
  $pea =array(
            'name'  => 'totalpea',
            'id'  => 'totalpea',
            'value' => set_value('pea'),
            'maxlength' => 8,
            'class' => $span_class);
  $partida=array(
            'name'  => 'partida',
            'id'  => 'partida',
            'value' => set_value('partida'),
            'maxlength' => 35,
            'class' => $span_class);
  $partida_ma=array(
            'name'  => 'partida_ma',
            'id'  => 'partida_ma',
            'value' => set_value('partida_ma'),
            'maxlength' => 35,
            'class' => $span_class);
  $cantidad_ma=array(
            'name'  => 'cantidad_ma',
            'id'  => 'cantidad_ma',
            'value' => set_value('cantidad_ma'),
            'class' => $span_class);
   $costo_ma=array(
            'name'  => 'costo_ma',
            'id'  => 'costo_ma',
            'value' => set_value('costo_ma'),
            'class' => $span_class);

  $periodo=array(
            'name'  => 'periodo',
            'id'  => 'periodo',
            'value' => set_value('periodo'),
            'maxlength' => 6,
            'class' => $span_class);
   $monto=array(
            'name'  => 'monto',
            'id'  => 'monto',
            'value' => set_value('monto'),
            'maxlength' => 20,
            'class' => $span_class);
   $observaciones=array(
            'name'  => 'observaciones',
            'id'  => 'observaciones',
            'value' => set_value('observaciones'),
            'maxlength'   => '250',
            'size'        => '25',
            'style'       => 'width:150%',
            'class' => $span_class);
   $requerimiento=array(
            'name'  => 'requerimiento_ma',
            'id'  => 'requerimiento_ma',
            'value' => set_value('requerimiento_ma'),
            'maxlength'   => '250',
            'class' => $span_class);

   $solicitud=array(
              'name'        => 'solicitud',
              'id'          => 'solicitud',
              'value'       => '',
              'maxlength'   => '50',
              'size'        => '10',
              'style'       => 'width:60%',
            );
   $vigencia=array(
              'name'        => 'vigencia',
              'id'          => 'vigencia',
              'value'       => '',
              'maxlength'   => '50',
              'size'        => '10',
              'style'       => 'width:60%',
            );
?>
<div class="row-fluid">

        <div class="row-fluid">

              <div class="span3">
                <div class="control-group">
                    <?php echo form_label('Tipo de requerimiento', 'tipo', $label_class); ?>
                  <div class="controls">
                      <?php echo  form_dropdown('tipo', $tipo_requerimiento, $selected_requerimiento ,'class="' . $span_class . '" id="tipo"'); ?>
                    <span class="help-inline">*</span>
                    <div class="help-block error"></div>
                  </div>
                </div>
              </div>
        </div>

      <div id="recursos">
          <?php echo form_open($this->uri->uri_string());  ?>
          <div class="well modulo">
            <h5>1. Datos</h5>



            <div class="row-fluid">

              <div class="span3">
                <div class="control-group">
                    <?php echo form_label('Actividad presupuestal', 'actividad', $label_class); ?>
                  <div class="controls">
                      <?php echo  form_dropdown('actividad',$actividad, $selected_actividad ,'class="' . $span_class . '" id="actividad"'); ?>
                    <span class="help-inline">*</span>
                    <div class="help-block error"></div>
                  </div>
                </div>
              </div>


              <div class="span3">
                <div class="control-group">
                      <?php echo form_label('Fuente de financiamiento','fuente', $label_class); ?>
                  <div class="controls">
                      <?php echo  form_dropdown('fuente',$fuente, $selected_fuente ,'class="' . $span_class . '" id="fuente"'); ?>
                  <span class="help-inline">*</span>
                  <div class="help-block error"></div>
                  </div>
                </div>
              </div>


              <div class="span3">
                <div class="control-group">
                  <?php echo form_label('Nivel de RRHH', 'rrhh', $label_class); ?>
                  <div class="controls">
                      <?php echo  form_dropdown('rrhh',$rrhh, $selected_rrhh ,'class="' . $span_class . '" id="rrhh"'); ?>
                  <span class="help-inline">*</span>
                  <div class="help-block error"></div>
                  </div>
                </div>
              </div>
          </div>

          <div class="row-fluid">

              <div class="span3">
                <div class="control-group">
                  <?php echo form_label('Cargo funcional', 'cargo', $label_class); ?>
                  <div class="controls">
                        <?php echo form_dropdown('cargo', $cargo, $selected_cargo,'class="' . $span_class . '" id="cargo"'); ?>
                    <span class="help-inline">*</span>
                    <div class="help-block error"></div>
                  </div>
                </div>
              </div>


              <div class="span3">
                <div class="control-group">
                        <?php echo form_label('Cargo contratación', 'contratacion', $label_class); ?>
                  <div class="controls">
                        <?php echo form_dropdown('contratacion', $contratacion, $selected_contratacion,'class="' . $span_class . '" id="contratacion"'); ?>
                        <?php echo  form_dropdown('contratacion_mes',$contratacion_mes, $selected_fuente ,'class="' . $span_class . '" id="contratacion_mes" style="display:none"'); ?>
                        <?php echo  form_dropdown('contratacion_dias',$contratacion_dias, $selected_fuente ,'class="' . $span_class . '" id="contratacion_dias" style="display:none"'); ?>
                    <span class="help-inline">*</span>
                    <div class="help-block error"></div>
                  </div>
                </div>
              </div>

              <div class="span2">
                <div class="control-group">
                       <?php echo form_label('Partida', 'partida', $label_class); ?>
                  <div class="controls">
                        <?php echo form_input($partida);?>
                    <span class="help-inline">*</span>
                    <div class="help-block error"></div>
                  </div>
                </div>
              </div>
          </div>
          <div class="row-fluid">
           <div class="span1">
                <div class="control-group">
                       <?php echo form_label('Periodo', 'periodo', $label_class); ?>
                  <div class="controls">
                        <?php echo form_input($periodo);?>
                    <span class="help-inline">*</span>
                    <div class="help-block error"></div>
                  </div>
                </div>
              </div>

              <div class="span2">
               <div class="control-group">
                       <?php echo form_label(' Base periodo', 'mes', $label_class); ?>
                  <div class="controls">
                        <?php echo form_dropdown('baseperiodo', $meses, $selected_mes,'class="' . $span_class . '" id="baseperiodo"'); ?>
                    <span class="help-inline">*</span>
                    <div class="help-block error"></div>
                  </div>
                </div>
              </div>

              <div class="span2">
                <div class="control-group">
                       <?php echo form_label('Total pea', 'pea', $label_class); ?>
                  <div class="controls">

                        <?php echo form_input($pea);?>
                    <span class="help-inline">*</span>
                    <div class="help-block error"></div>
                  </div>
                </div>
              </div>

              <div class="span2">
                <div class="control-group">
                       <?php echo form_label('observaciones', 'observaciones', $label_class); ?>
                  <div class="controls">
                        <?php echo form_input($observaciones);?>

                    <div class="help-block error"></div>
                  </div>
                </div>

              </div>
          </div>
        </div>
        <?php echo form_submit('send', 'Guardar','class="btn btn-primary dtadd" '); ?>
        <?php echo form_close();  ?>
      </div>

      <div id="materiales">
            <?php echo form_open($this->uri->uri_string());  ?>
            <div class="well modulo">
            <h5>1. Datos</h5>

            <div class="row-fluid">

              <div class="span3">
                <div class="control-group">
                    <?php echo form_label('Activos', 'activos', $label_class); ?>
                  <div class="controls">
                      <?php echo form_dropdown('activos',$arrayactivos, $selected_activos ,'class="' . $span_class . '" id="activos"');?>
                      <button type="button" id="add-activo">
                          <i class="icon-plus"></i>
                      </button>
                    <span class="help-inline">*</span>
                    <div class="help-block error"></div>
                  </div>
                </div>
              </div>

              <div class="span5">
                <div class="control-group">
                    <?php echo form_label('Detalle', 'detalle', $label_class); ?>
                  <div class="controls">
                      <?php echo form_input($requerimiento);?>
                    <span class="help-inline">*</span>
                    <div class="help-block error"></div>
                  </div>
                </div>
              </div>
              <div class="span2">
                <div class="control-group">
                    <?php echo form_label('Cantidad', 'cantidad_ma', $label_class); ?>
                  <div class="controls">
                      <?php echo form_input($cantidad_ma);?>
                    <span class="help-inline">*</span>
                    <div class="help-block error"></div>
                  </div>
                </div>
              </div>
              <div class="span2">
                <div class="control-group">
                    <?php echo form_label('Costo Unit.', 'costo_ma', $label_class); ?>
                  <div class="controls">
                      <?php echo form_input($costo_ma);?>
                    <span class="help-inline">*</span>
                    <div class="help-block error"></div>
                  </div>
                </div>
              </div>

            </div>

          <div class="row-fluid">
              <div class="span3">
                <div class="control-group">
                    <?php echo form_label('Actividad presupuestal', 'actividad_ma', $label_class); ?>
                  <div class="controls">
                      <?php echo  form_dropdown('actividad_ma',$actividad, $selected_actividad ,'class="' . $span_class . '" id="actividad_ma"'); ?>
                    <span class="help-inline">*</span>
                    <div class="help-block error"></div>
                  </div>
                </div>
              </div>


              <div class="span3">
                <div class="control-group">
                      <?php echo form_label('Fuente de financiamiento','fuente_ma', $label_class); ?>
                  <div class="controls">
                      <?php echo  form_dropdown('fuente_ma',$fuente, $selected_fuente ,'class="' . $span_class . '" id="fuente_ma"'); ?>
                  <span class="help-inline">*</span>
                  <div class="help-block error"></div>
                  </div>
                </div>
              </div>

              <div class="span2">
                <div class="control-group">
                       <?php echo form_label('Partida', 'partida_ma', $label_class); ?>
                  <div class="controls">
                        <?php echo form_input($partida_ma);?>
                    <span class="help-inline">*</span>
                    <div class="help-block error"></div>
                  </div>
                </div>
              </div>
          </div>
        </div>
         <?php echo form_submit('send', 'Guardar','class="btn btn-primary dtadd" '); ?>
        <?php echo form_close();  ?>
      </div>

  <div id="grid_content" class="span12" style="width: 1170px;">
        <div class="span12">
          <table id="list2" style="width: 1170px;"></table>
          <div id="pager2" style="width: 1170px;"></div>
        </div>
  </div>

  <div>
    <input type="BUTTON" id="bedata" value="Editar" />
    <input type="BUTTON" id="elim_bedata" value="Eliminar" />
  </div>

</div>
<?php
  $attr = array('class' => 'form-val','id' => 'udra_activo', 'style' => 'overflow: auto;');
  echo form_open($this->uri->uri_string(), $attr);  ?>

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

<script type="text/javascript" charset="utf-8">

    function validateCar (value, colname) {

              var result = null;
              var selr = jQuery('#list2').jqGrid('getGridParam','selrow');

              result = [false, 'ok'+ value+ 'selected'+selr];
              var form_data={name: 'codigo',value:selr };


              jQuery.ajax({
                  async: false,
                  url: 'administracion/seguimiento/Find_saldos',
                  data: form_data,
                  type:"POST",
                  success: function (data) {
                      if (data) {

                        if (value>=data) {
                          result = [true, ''];
                        }else{
                          result = [false,'saldo'+data+'presupuestado '+ value + ' la cantidad ingresada no debe ser menor a lo solicitado en solicitud de crédito presupuestario'];
                        }

                      } else {
                          result = [true,''];
                      }
                  },
                  error: function () { alert('Error al tratar de validate ' + value); }
              });
              return result;
        };

$(function(){


      $( "#materiales" ).hide();
      $("#tipo option[value=1]").attr('selected', 'selected');

      $("#add-activo").click(function(){
          $("#add-activo-modal").modal('show');
      });

      $('#tipo').change(function() {
        var tipo_value = $('#tipo').val();
        if (tipo_value == 1 ) {

            $( "#materiales" ).hide(1000);
            $( "#recursos" ).show("slow");

        }else{

          $( "#recursos" ).hide(1000);
          $( "#materiales" ).show("slow");
        }

      });



          jQuery("#list2").jqGrid({
              type:"POST",
              url:'administracion/seguimiento/get_datatables',
              datatype: "json",
              height: 255,
              colNames:['Num','tipo' ,'Detalle', 'Cargo funcional', 'Cargo contratacion', 'Fecha solicitud.', 'Unitario', 'Cantidad', 'Periodo', 'Tipo de periodo',' Monto','Actividad presupuestal', 'Fuente de financiamiento',' Nivel rrhh '],
              colModel:[
                {name:'codigo_adm',index:'codigo_adm', width:10, editable:false, editrules: {custom :true , custom_func : validateCar}},
                {name:'tipo_requerimiento',index:'tipo_requerimiento', width:70,editable:true,edittype:"select",editoptions:{value:"1:Recursos humanos;2:Material"}},
                {name:'observaciones',index:'observaciones', width:80, editable:true},
                {name:'codigo_cf',index:'nombre_cf', width:90, editable:true,edittype:"select",editoptions:{dataUrl:'cargofuncional/Find_cargo_funcional'}},
                {name:'DESC_CARG',index:'DESC_CARG', width:90, editable:false},
                {name:'created',index:'created', width:40, editable:false},
                {name:'SUEL_CARG_DIA',index:'SUEL_CARG_DIA', width:30, editable:false},
                {name:'cantidad',index:'cantidad', width:20, editable:true, editrules: {custom :true , custom_func : validateCar, integer: true, required: true } },
                {name:'periodo',index:'periodo', width:20, editable:true, editrules: { integer: true, required: true}},
                {name:'tipoPeriodo',index:'tipoPeriodo', width:40, editable:true,edittype:"select",editoptions:{value:"1:Días;2:Meses"}},
                {name:'monto',index:'monto', width:25, editable:false},
                {name:'codigo_ap',index:'nombre_ap', width:70, editable:true,edittype:"select",editoptions:{dataUrl:'actividadpresupuestal/Find_actividad_presupuestal'}},
                {name:'codigo_ff',index:'nombre_ff', width:70, editable:true,edittype:"select",editoptions:{dataUrl:'fuentefinanciamiento/Find_fuente_financiamiento'}},
                {name:'codigo_nrrhh',index:'nombre_rrhh', width:50, editable:true,edittype:"select",editoptions:{dataUrl:'nivelrrhh/Find_nivel_rrhh'}},
              ],
              rowNum:10,
              rowList:[10,20,30],
              pager: '#pager2',
              sortname: 'codigo_adm',
              viewrecords: true,
              sortorder: "asc",
              autowidth: false,
              shrinkToFit:false,
              caption:"Listado",
              editurl:"administracion/seguimiento/update"
          });

          jQuery("#list2").jqGrid('navGrid','#pager2',{edit:false,add:false,del:false,search:false})
          $("#list2").setGridWidth($('#grid_content').width(), true);
          $('#list2').trigger( 'reloadGrid' );

           $("#bedata").click(function(){
              var gr = jQuery("#list2").jqGrid('getGridParam','selrow');
              if( gr != null )
                jQuery("#list2").jqGrid('editGridRow',gr,{height:640,width:355,reloadAfterSubmit:true,closeAfterEdit: true}); else alert("Por favor, selecciona un registro");
            });

           $("#elim_bedata").click(function(){
              var gr = jQuery("#list2").jqGrid('getGridParam','selrow');
              var result = null;
              var selr = jQuery('#list2').jqGrid('getGridParam','selrow');
              var form_data={name: 'codigo',value:selr };

              jQuery.ajax({
                  async: false,
                  url: 'administracion/seguimiento/Find_saldos',
                  data: form_data,
                  type:"POST",
                  success: function (data) {
                      if (data) {
                        if (data>0) {
                          result = true;
                        }else{
                          result = false;
                        }

                      } else {
                          result = false;
                      }
                  },
                  error: function () { alert('Error al tratar de validate '); }
              });
              if (result) {
                  alert(" No se puede eliminar el registro, porque hay solicitudes asociadas");
              }else{
                  if( gr != null ) jQuery("#list2").jqGrid('delGridRow',gr,{reloadAfterSubmit:true, url:"administracion/seguimiento/update"});
                  else alert("Por favor, selecciona un registro");
              };

           });

      $("#recursos form").validate({
           rules: {
                actividad:{
                   required: true,
                },
                fuente:{
                   required: true,
                },
                rrhh:{
                   required: true,
                },
                cargo:{
                   required: true,
                },
                contratacion:{
                   required: true,
                },
                partida:{
                   required: true,
                   number: true
                },
                periodo:{
                   required: true,
                   number: true
                },
                baseperiodo:{
                   required: true,
                },
                totalpea:{
                   required: true,
                   number: true
                },
                solicitud:{
                   required: true,
                },
                vigencia:{
                   required: true,
                },
                rrhh:{
                   required: true,

                },
                actividad_ma:{
                   required: true,
                },
                partida_ma:{
                   required: true,
                },
                cantidad_ma:{
                   required: true,
                   number: true
                },
                fuente_ma:{
                   required: true,
                   number: true
                },
                requerimiento_ma:{
                   required: true,
                },
           },
           messages: {
              partida:{
                   required: "Información requerida",
                   number : " Ingrese un valor numerico"
              },
              periodo:{
                   required: "Información requerida",
                   number: " Ingrese un valor numerico"
                },
              totalpea:{
                  required: "Información requerida",
                  number: " Ingrese un valor numerico"
              },
              rrhh:{
                  required: "Información requerida",
              },
              totalpea:{
                  required: "Información requerida",
              },
              baseperiodo:{
                   required: "Información requerida",
              },
              actividad:{
                   required: "Información requerida",
              },
              fuente:{
                   required: "Información requerida",
              },
              cargo:{
                   required: "Información requerida",
              },
              contratacion:{
                    required: "Información requerida",
              },
              actividad_ma:{
                    required: "Información requerida",
              },
              requerimiento_ma:{
                    required: "Información requerida",
              },
              partida_ma:{
                    required: "Información requerida",
              },
              fuente_ma:{
                    required: "Información requerida",
              },
              cantidad_ma:{
                    required: "Información requerida",
                    number: " Ingrese un valor numerico"

              },
           },


          errorPlacement: function(error, element) {
               $(element).next().after(error);
           },

          submitHandler: function(form) {

              var actividad = $('#actividad').val();
              var fuente = $('#fuente').val();
              var rrhh = $('#rrhh').val();
              var cargo = $('#cargo').val();
              var id_contratacion = $('#contratacion').val();
              var partida = $('#partida').val();
              var periodo = $('#periodo').val();
              var baseperiodo = $('#baseperiodo').val();
              var tipo_periodo = $('#baseperiodo').find('option:selected').text();
              var totalpea = $('#totalpea').val();
              $("#contratacion_dias option[value=" + id_contratacion + "]").attr('selected', 'selected');
              $("#contratacion_mes option[value=" + id_contratacion + "]").attr('selected', 'selected');
              var contratacion_dias = $('#contratacion_dias').find('option:selected').text();
              var contratacion_mes = $('#contratacion_mes').find('option:selected').text();
              var observaciones1 = $('#observaciones').val();
              var sueldo=0;
              var sueldo_unit=0;
              var tipo_value = $('#tipo').val();
              if (baseperiodo==1) {
                  sueldo_unit = contratacion_dias;
                  sueldo = periodo*totalpea*contratacion_dias;
                  sueldo = (Math.round(sueldo * 100) /100);

              }else{
                  sueldo_unit = contratacion_mes;
                  sueldo = periodo*totalpea*contratacion_mes;
                  sueldo = (Math.round(sueldo * 100) /100);
              }
              if (tipo_value==1) {

                var submitdata = { "actividad" : actividad,
                                "fuente" : fuente,
                                "rrhh" : rrhh,
                                "cargo" : cargo,
                                "partida" : partida,
                                "periodo" : periodo,
                                "baseperiodo" : baseperiodo,
                                "totalpea" : totalpea,
                                "contratacion" : id_contratacion,
                                "monto" : sueldo,
                                "requerimiento" : observaciones1,
                                "tipo_requerimiento" : tipo_value,
                                "csrf_token_c": CI.cct
                              };
                  var bsub = $(".dtadd");
                  bsub.attr("disabled", "disabled");
                   $form = $("#recursos form");

                  $.post(CI.base_url + "index.php/administracion/seguimiento/save", submitdata , function(result) {
                     bsub.removeAttr('disabled');
                     $("#requerimiento" ).val('');
                     $form[0].reset();
                     $("#tipo option[value=1]").attr('selected', 'selected');
                  });
              }else{

                var actividad_ma = $('#actividad_ma').find('option:selected').text();
                var fuente_ma = $('#fuente_ma').find('option:selected').text();
                var partida_ma = $('#partida_ma').val();
                var requerimiento_ma = $('#requerimiento_ma').val();
                var cantidad_ma = $('#cantidad_ma').val();


                var submitdata = { "actividad" : actividad_ma,
                                    "fuente" : fuente_ma,
                                    "partida" : partida_ma,
                                    "requerimiento" : requerimiento_ma,
                                    "totalpea" : cantidad_ma,
                                    "tipo_requerimiento" : tipo_value,
                                    "requerimiento" : requerimiento_ma,
                                    "csrf_token_c": CI.cct
                                  };
                  var bsub = $(".dtadd");
                  bsub.attr("disabled", "disabled");
                   $form = $("#recursos form");

                  $.post(CI.base_url + "index.php/administracion/seguimiento/save", submitdata , function(result) {
                     bsub.removeAttr('disabled');
                     $form[0].reset();
                     $("#tipo option[value=2]").attr('selected', 'selected');
                  });
              }
            $('#list2').trigger( 'reloadGrid' );
           }
        });
     $("#materiales form").validate({
           rules: {
                actividad:{
                   required: true,
                },
                fuente:{
                   required: true,
                },
                rrhh:{
                   required: true,
                },
                cargo:{
                   required: true,
                },
                contratacion:{
                   required: true,
                },
                partida:{
                   required: true,
                   number: true
                },
                periodo:{
                   required: true,
                   number: true
                },
                baseperiodo:{
                   required: true,
                },
                totalpea:{
                   required: true,
                   number: true
                },
                solicitud:{
                   required: true,
                },
                vigencia:{
                   required: true,
                },
                rrhh:{
                   required: true,

                },
                actividad_ma:{
                   required: true,
                },
                partida_ma:{
                   required: true,
                },
                cantidad_ma:{
                   required: true,
                   number: true
                },
                fuente_ma:{
                   required: true,
                   number: true
                },
                requerimiento_ma:{
                   required: true,
                },
                costo_ma:{
                   required: true,
                   number: true
                },

           },
           messages: {
              partida:{
                   required: "Información requerida",
                   number : " Ingrese un valor numerico"
              },
              periodo:{
                   required: "Información requerida",
                   number: " Ingrese un valor numerico"
                },
              totalpea:{
                  required: "Información requerida",
                  number: " Ingrese un valor numerico"
              },
              rrhh:{
                  required: "Información requerida",
              },
              totalpea:{
                  required: "Información requerida",
              },
              baseperiodo:{
                   required: "Información requerida",
              },
              actividad:{
                   required: "Información requerida",
              },
              fuente:{
                   required: "Información requerida",
              },
              cargo:{
                   required: "Información requerida",
              },
              contratacion:{
                    required: "Información requerida",
              },
              actividad_ma:{
                    required: "Información requerida",
              },
              requerimiento_ma:{
                    required: "Información requerida",
              },
              partida_ma:{
                    required: "Información requerida",
              },
              fuente_ma:{
                    required: "Información requerida",
              },
              cantidad_ma:{
                    required: "Información requerida",
                    number: " Ingrese un valor numerico"

              },
              costo_ma:{
                   required: "Información requerida",
                   number : " Ingrese un valor numerico"
              },
           },


          errorPlacement: function(error, element) {
               $(element).next().after(error);
           },

          submitHandler: function(form) {

              var actividad = $('#actividad').find('option:selected').text();
              var fuente = $('#fuente').find('option:selected').text();
              var rrhh = $('#rrhh').find('option:selected').text();
              var cargo = $('#cargo').find('option:selected').text();
              var contratacion = $('#contratacion').find('option:selected').text();
              var id_contratacion = $('#contratacion').val();
              var partida = $('#partida').val();
              var periodo = $('#periodo').val();
              var baseperiodo = $('#baseperiodo').val();
              var tipo_periodo = $('#baseperiodo').find('option:selected').text();
              var totalpea = $('#totalpea').val();
              $("#contratacion_dias option[value=" + id_contratacion + "]").attr('selected', 'selected');
              $("#contratacion_mes option[value=" + id_contratacion + "]").attr('selected', 'selected');
              var contratacion_dias = $('#contratacion_dias').find('option:selected').text();
              var contratacion_mes = $('#contratacion_mes').find('option:selected').text();
              var observaciones = $('#observaciones').val();
              var sueldo=0;
              var sueldo_unit=0;
              var tipo_value = $('#tipo').val();
              if (baseperiodo==1) {
                  sueldo_unit = contratacion_dias;
                  sueldo = periodo*totalpea*contratacion_dias;
                  sueldo = (Math.round(sueldo * 100) /100);

              }else{
                  sueldo_unit = contratacion_mes;
                  sueldo = periodo*totalpea*contratacion_mes;
                  sueldo = (Math.round(sueldo * 100) /100);
              }
              if (tipo_value==1) {
                var submitdata = { "actividad" : actividad,
                                "fuente" : fuente,
                                "rrhh" : rrhh,
                                "cargo" : cargo,
                                "partida" : partida,
                                "periodo" : periodo,
                                "baseperiodo" : baseperiodo,
                                "totalpea" : totalpea,
                                "contratacion" : contratacion,
                                "tipo_periodo" : tipo_periodo,
                                "sueldo" : sueldo_unit,
                                "monto" : sueldo,
                                "observaciones" : observaciones,
                                "tipo_requerimiento" : tipo_value,
                                "csrf_token_c": CI.cct
                              };
                  var bsub = $(".dtadd");
                  bsub.attr("disabled", "disabled");
                   $form = $("#materiales form");

                  $.post(CI.base_url + "index.php/administracion/seguimiento/save", submitdata , function(result) {
                     bsub.removeAttr('disabled');
                     $("#requerimiento" ).val('');
                     $form[0].reset();
                     $("#tipo option[value=1]").attr('selected', 'selected');
                  });
              }else{
                var actividad_ma = $('#actividad_ma').val();
                var fuente_ma = $('#fuente_ma').val();
                var partida_ma = $('#partida_ma').val();
                var requerimiento_ma = $('#requerimiento_ma').val();
                var cantidad_ma = $('#cantidad_ma').val();
                var costo_ma = $('#costo_ma').val();
                var activos = $('#activos').val();

                var submitdata = { "actividad" : actividad_ma,
                                    "fuente" : fuente_ma,
                                    "rrhh" : null,
                                    "partida" : partida_ma,
                                    "requerimiento" : requerimiento_ma,
                                    "totalpea" : cantidad_ma,
                                    "tipo_requerimiento" : tipo_value,
                                    "monto" : costo_ma,
                                    "codigo_act" : activos,
                                    "csrf_token_c": CI.cct
                                  };
                  var bsub = $(".dtadd");
                  bsub.attr("disabled", "disabled");
                   $form = $("#materiales form");

                  $.post(CI.base_url + "index.php/administracion/seguimiento/save", submitdata , function(result) {
                     bsub.removeAttr('disabled');
                     $form[0].reset();
                     $("#tipo option[value=2]").attr('selected', 'selected');
                  });
              }
              $('#list2').trigger( 'reloadGrid' );
           }
        });

        $("#udra_activo").validate({
                        rules: {
                            inputactivonuevo:{
                                required: true
                             },
                        },
                        messages: {

                           inputactivonuevo: {
                                required: "Ingrese un nombre de activo"
                             },
                        },
                        errorPlacement: function(error, element) {
                            $(element).next().after(error);
                        },
                        invalidHandler: function(form, validator) {
                          var errors = validator.numberOfInvalids();
                          if (errors) {
                            var message = errors == 1
                              ? 'Por favor corrige estos errores:\n'
                              : 'Por favor corrige los ' + errors + ' errores.\n';
                            var errors = "";
                            if (validator.errorList.length > 0) {
                                for (x=0;x<validator.errorList.length;x++) {
                                    errors += "\n\u25CF " + validator.errorList[x].message;
                                }
                            }
                            alert(message + errors);
                          }
                          validator.focusInvalid();
                        },
                        submitHandler: function(form) {
                            reg_form_activo();
                        }
         });


        function reg_form_activo(){

                var bsub = $( "#save_activo" );
                bsub.attr("disabled", "disabled");

                var form_data= new Array();
                form_data.push(
                    {name: 'ajax',value:1},
                    {name: 'nombre_activo',value:$( "#inputactivonuevo" ).val()}
                );
                form_data = $.param(form_data);

                $.ajax({
                    type: "POST",
                    url: CI.base_url + "index.php/udra/udra/save_activo",
                    data: form_data,
                    success: function(response){
                              $("#results-activo").text("Se inserto el activo.");
                              var form_data2 = {
                                   ajax:1
                               };

                               var sel = $("#activos");
                                $.ajax({
                                      url: CI.base_url + "index.php/udra/udra/Find_ajax_activo/",
                                      type:'POST',
                                      data:form_data2,
                                      dataType:'json',
                                      success:function(json_data){
                                              sel.empty();
                                              $.each(json_data, function(i, data){
                                                  sel.append('<option value="' + data.codigo_act + '">' + data.nombre_act + '</option>');
                                              });
                                      }
                                });

                                if (!confirm("Desea Agregar otro activo ")){

                                    $("#add-activo-modal").modal('hide');
                                    bsub.removeAttr("disabled");
                                }
                                bsub.removeAttr("disabled");
                                $('#udra_activo')[0].reset();
                    }
                });
        }
});
    </script>