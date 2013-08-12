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

   $depend=array("" => 'Seleccione' );
    $selected_dependencia = (set_value('dependencia')) ? set_value('dependencia') : '';
    foreach ($dependencia->result() as $fila) {
      # code...
      $depend[$fila->codigo_dep]=$fila->desc_depe_tde;
    }
    $selected_mes= (set_value('mes')) ? set_value('mes') : '';
    $meses=array('' =>' Seleccione' ,
                  '1' =>' Días' ,
                  '2' => 'Meses'
                  );
    $periodo=array(
            'name'  => 'periodo',
            'id'  => 'periodo',
            'value' => set_value('periodo'),
            'maxlength' => 6,
            'class' => $span_class);
    $periodo=array(
            'name'  => 'periodo',
            'id'  => 'periodo',
            'value' => set_value('periodo'),
            'maxlength' => 6,
            'class' => $span_class);
    $detalle=array(
            'name'  => 'detalle',
            'id'  => 'detalle',
            'value' => set_value('detalle'),
            'class' => $span_class);

    $detalle_ma=array(
            'name'  => 'detalle_ma',
            'id'  => 'detalle_ma',
            'value' => set_value('detalle_ma'),
            'class' => $span_class);

    $oficio=array(
            'name'  => 'oficio',
            'id'  => 'oficio',
            'value' => set_value('oficio')
            );
    $fecha_oficio=array(
            'name'  => 'fecha_oficio',
            'id'  => 'fecha_oficio',
            'value' => set_value('fecha_oficio'),
            'maxlength' => 20);

    $selected_pea=(set_value('pea')) ? set_value('pea') : '';
  	$pea =array(
            'name'  => 'totalpea',
            'id'  => 'totalpea',
            'value' => set_value('pea'),
            'maxlength' => 8,
            'class' => $span_class);
    $cantidad =array(
            'name'  => 'cantidad',
            'id'  => 'cantidad',
            'value' => set_value('cantidad'),
            'class' => $span_class);

    $contratacion_rh=array("" => 'Seleccione' );
    $contratacion_mt=array("" => 'Seleccione' );
    $basecontratacion= array("" => 'Seleccione' );
    $selected_contratacion = (set_value('presupuestado')) ? set_value('presupuestado') : '';

    foreach ($cargo->result_array() as $filas) {

      if ($filas['cant_cpp']<$filas['total_pea'] ) {

          if ($filas['tipo_requerimiento']==1) {

            $contratacion_rh[$filas['num']]= $filas['cargo_funcional']." - ".$filas['cargo_contratacion'];
          }else{

            $contratacion_mt[$filas['num']]=$filas['nombre_act'];
          }
      }

    }

    $selected_requerimiento = (set_value('tipo')) ? set_value('tipo') : '';
    $tipo_requerimiento=array(
                  '1' =>' Recursos humanos' ,
                  '2' => ' Material'
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
                    <?php echo form_label('Cargo presupuestado', 'presupuestado', $label_class); ?>
                  <div class="controls">
                      <?php echo  form_dropdown('presupuestado', $contratacion_rh, $selected_contratacion ,'class="' . $span_class . '" id="presupuestado"'); ?>
                    <span class="help-inline">*</span>
                    <div class="help-block error"></div>
                  </div>
                </div>
              </div>

              <div class="span3">
                <div class="control-group">
                    <?php echo form_label('Dependencia', 'dependencia', $label_class); ?>
                  <div class="controls">
                      <?php echo  form_dropdown('dependencia',$depend, $selected_dependencia ,'class="' . $span_class . '" id="dependencia"'); ?>
                    <span class="help-inline">*</span>
                    <div class="help-block error"></div>
                  </div>
                </div>
              </div>


          	<div class="span2">
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
                       <?php echo form_label(' Base periodo', 'baseperiodo', $label_class); ?>
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
              </div>
              <div class="row-fluid">
                <div class="span6">
                    <div class="control-group">
                       <?php echo form_label('Detalle', 'detalle', $label_class); ?>
                  <div class="controls">

                        <?php echo form_input($detalle);?>
                    <div class="help-block error"></div>
                  </div>
                  </div>
                 </div>
              </div>

                  <span id="resultado"></span>
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
                        <?php echo form_label('Materiales', 'requerimiento', $label_class); ?>
                      <div class="controls">
                          <?php echo  form_dropdown('requerimiento', $contratacion_mt, $selected_contratacion ,'class="' . $span_class . '" id="requerimiento"'); ?>
                        <span class="help-inline">*</span>
                        <div class="help-block error"></div>
                      </div>
                    </div>
                  </div>

                  <div class="span3">
                    <div class="control-group">
                        <?php echo form_label('Dependencia', 'dependencia_ma', $label_class); ?>
                      <div class="controls">
                          <?php echo  form_dropdown('dependencia_ma',$depend, $selected_dependencia ,'class="' . $span_class . '" id="dependencia_ma"'); ?>
                        <span class="help-inline">*</span>
                        <div class="help-block error"></div>
                      </div>
                    </div>
                  </div>


                <div class="span2">
                  <div class="control-group">
                           <?php echo form_label('Cantidad', 'cantidad', $label_class); ?>
                      <div class="controls">
                            <?php echo form_input($cantidad);?>
                        <span class="help-inline">*</span>
                        <div class="help-block error"></div>
                      </div>
                    </div>
                  </div>

                  <div class="span6">
                    <div class="control-group">
                       <?php echo form_label('Detalle', 'detalle_ma', $label_class); ?>
                  <div class="controls">

                        <?php echo form_input($detalle_ma);?>
                    <div class="help-block error"></div>
                  </div>
                  </div>
                 </div>
             </div>
             <span id="resultado2"></span>
          </div>
              <?php echo form_submit('send', 'Guardar','class="btn btn-primary dtadd" '); ?>
              <?php echo form_close();  ?>
        </div>

<div>
  <button id="activar" class="btn" style="float:right; margin-top:-10px; margin-left:" > activar</button>
</div>

 <div id="grid_content" class="span12" style="width: 1170px;margin-top: 20px;">
        <div class="span12">
          <table id="list2" style="width: 1170px;"></table>
          <div id="pager2" style="width: 1170px;"></div>
        </div>
</div>

</div>


<div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3 id="myModalLabel">Registro de oficio</h3>
  </div>
  <div class="modal-body">
            <div class="span3">
              <div class="control-group">
                       <?php echo form_label('Número de oficio', 'oficio', $label_class); ?>
                  <div class="controls">
                        <?php echo form_input($oficio);?>
                    <span class="help-inline">*</span>
                    <div class="help-block error"></div>
                  </div>
                </div>
            </div>
             <div class="span3">
              <div class="control-group">
                       <?php echo form_label('Fecha', 'fecha_oficio', $label_class); ?>
                  <div class="controls">
                        <?php echo form_input($fecha_oficio);?>
                    <span class="help-inline">*</span>
                    <div class="help-block error"></div>
                  </div>
                </div>
            </div>
  </div>
  <div class="modal-footer">
    <button class="btn" data-dismiss="modal" aria-hidden="true">Cerrar</button>
    <button id="modal-button" class="btn btn-primary">Guardar</button>
    <div class="done" style="display:none">
        <b>Se inserto correctamente!</b>
    </div>
  </div>
</div>

<form action="presupuesto/presupuesto/send_email" method="post"> <label for="nombre">Nombre y apellidos : </label>
    <input type="text" name="nombre" size="50" maxlength="80"><br> <label for="email">Email : </label>
    <input type="text" name="email" size="50" maxlength="60"><br> <label for="asunto">Asunto : </label>
    <input type="text" name="asunto" size="50" maxlength="60"><br> <label for="mensaje">Mensaje : </label>  <textarea name="mensaje" cols="31" rows="5"></textarea> <br>
    <label for="enviar">
    <input type="submit" name="enviar" value="Enviar consulta"></label>
 </form>
<script type="text/javascript" charset="utf-8">
$(function(){


      $( "#presupuestado" ).change(function(){
        var presupuestado = $("#presupuestado").val();
        var parametros= {
          "presupuestadoid" : presupuestado,
          "csrf_token_c" : CI.cct
        }
        $.ajax({
          data:  parametros,
          url: CI.base_url + "index.php/presupuesto/presupuesto/Find_Presupuesto",
          type: 'post',
          dataType: 'json',
          beforeSend: function(){
            $("#resultado").html("Procesando, espere por favor...");

          },
          success: function(response){

            $("#resultado").html("<p> Cantidad presupuestada : "+ response.resultado +" por "+ response.periodo+" "+response.baseperiodo +"</p>");
            $("#baseperiodo").html("");
            $("<option value='4'>"+response.baseperiodo+"</option>").appendTo("#baseperiodo");
          }

        });

      });

      $( "#requerimiento" ).change(function(){
        var presupuestado = $("#requerimiento").val();
        var parametros= {
          "presupuestadoid" : presupuestado,
          "csrf_token_c" : CI.cct
        }
        $.ajax({
          data:  parametros,
          url: CI.base_url + "index.php/presupuesto/presupuesto/Find_Presupuesto",
          type: 'post',
          dataType: 'json',
          beforeSend: function(){
            $("#resultado2").html("Procesando, espere por favor...");

          },
          success: function(response){
             $("#resultado2").html("<p> Cantidad presupuestada : "+ response.resultado +" </p>");

          }

        });

        });

      $( "#fecha_oficio" ).datepicker();
      $( "#fecha_oficio" ).datepicker( "option", "dateFormat", "yy-mm-dd" );

      $( "#materiales" ).hide();
      $("#tipo option[value=1]").attr('selected', 'selected');
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
              url:'presupuesto/presupuesto/get_datatables',
              datatype: "json",
              height: 255,
              colNames:['code','tipo' ,'Detalle', 'Cargo funcional', 'Cargo contratacion',  'Unitario', 'Cantidad presupuestada','Cantidad solicitada', 'Periodo', 'Tipo de periodo',' Monto'],
              colModel:[
                {name:'codigo_adm',index:'codigo_adm', width:10},
                {name:'tipo',index:'tipo', width:70},
                {name:'observaciones',index:'observaciones', width:80},
                {name:'nombre_cf',index:'nombre_cf', width:90},
                {name:'DESC_CARG',index:'DESC_CARG', width:90},
                {name:'SUEL_CARG_DIA',index:'SUEL_CARG_DIA', width:30},
                {name:'cantidad',index:'cantidad', width:20},
                {name:'cantidad2',index:'cantidad', width:20},
                {name:'periodo',index:'periodo', width:20},
                {name:'tipoPeriodo',index:'tipoPeriodo', width:40},
                {name:'monto',index:'monto', width:25},
              ],
              rowNum:10,
              rowList:[10,20,30],
              pager: '#pager2',
              sortname: 'codigo_CredPresupuestario',
              viewrecords: true,
              sortorder: "asc",
              autowidth: false,
              shrinkToFit:false,
              caption:"Datos del Reporte"
          });
          jQuery("#list2").jqGrid('navGrid','#pager2',{edit:false,add:false,del:false,search:false})
          $("#list2").setGridWidth($('#grid_content').width(), true);

  $("button.dtdelete").live("click", function(e) {

    $.post(CI.base_url + "presupuesto/presupuesto/delete", { "code": $(this).attr("id"),"csrf_token_c": CI.cct }, function() {
      productTable.fnDraw(true);
    });
  });


   $('#activar').click(function(){
      var  cells=[];
      var rows = $("#t_regs2").dataTable().fnGetNodes();
      var id="";
      var res=0;
      var select= true;

      $("#t_regs2 tbody tr").each(function(i) {

                if($('input', rows[i]).is(":checked")){
                  id=id+$(rows[i]).find("td:eq(0)").html()+",";
                  select=false;
                }

      });

      var elem=[];
      id=id.substring(0,id.length-1);
      var elem = id.split(',');
      if (select) {
        alert("Debe seleccionar un item");
      }else{

              $('#myModal').modal('show');



              $('#modal-button').click(function(){
                var oficio = $("#oficio").val();
                var date_oficio = $("#fecha_oficio").val();
                for (var i =0; i< elem.length ; i++) {
                    var submitdata ={
                                  "code" : elem[i],
                                  "oficio" : oficio,
                                  "date_oficio" : date_oficio,
                                  "activado" : "ACTIVADO",
                                  "csrf_token_c": CI.cct
                    };
                    $.post(CI.base_url + "presupuesto/presupuesto/edit_oficio", submitdata,function (result){
                      $('.done').fadeIn('slow');
                      productTable.fnDraw(true);
                      $('#myModal').modal('hide');

                    });

                }
                id="";
                elem="";
                oficio="";
                date_oficio="";
              });

      }

    });


  $("#recursos form").validate({
       rules: {

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
            dependencia:{
               required: true,
            },
            presupuestado:{
               required: true,
            },
            baseperiodo:{
               required: true,
            },

       },
       messages: {
          periodo:{
               required: "Informacion requerida",
               number : " Ingrese un valor numerico"
          },
          baseperiodo:{
               required: "Informacion requerida",
          },
          totalpea:{
              required: "Informacion requerida",
              number: " Ingrese un valor numerico"
          },
          dependencia:{
              required: "Informacion requerida",
          },
          baseperiodo:{
               required: "Informacion requerida",
          },
          presupuestado:{
               required: "Informacion requerida",
          },
       },

      submitHandler: function(form) {


          var periodo = $('#periodo').val();
          var baseperiodo = $('#baseperiodo').val();
          var presupuestadoid = $('#presupuestado').val();
          $('#baseperiodo').find('option:selected').text();
          var tipo_periodo = $('#baseperiodo').val();
          $('#dependencia').find('option:selected').text();
          var dependencia = $('#dependencia').val();

          var totalpea = $('#totalpea').val();
          var detalle = $('#detalle').val();

          var submitdata2 = { "presupuestadoid" : presupuestadoid,
                              "detalle" : detalle,
                              "periodo_cc" : periodo,
                              "dependencia_cc" : dependencia,
                             "baseperiodo_cc" : tipo_periodo,
                             "totalpea_cc" : totalpea,
                             "csrf_token_c": CI.cct
                          };
                var bsub = $(".dtadd");
                bsub.attr("disabled", "disabled");
                $form = $("#recursos form");
                var str=$form.serialize();
                var parametros= {
                  "presupuestadoid" : presupuestadoid,
                  "csrf_token_c" : CI.cct
                }
                $.ajax({
                    data:  parametros,
                    url: CI.base_url + "index.php/presupuesto/presupuesto/Find_Presupuesto",
                    type: 'post',
                    dataType: 'json',
                    beforeSend: function(){
                      $("#resultado").html("Procesando, espere por favor...");

                    },
                    success: function(response){
                      bsub.removeAttr('disabled');
                      if (totalpea>response.resultado || periodo > response.periodo) {
                          $("#resultado").html("<p>No se puede registrar, porque la cantidad de pea presupuestada es  de "+ response.resultado +" por  "+response.periodo+" "+response.baseperiodo+" </p>");

                      }else{
                          $("#resultado").html("<p> Cantidad presupuestada : "+ response.resultado +" </p>");
                          $.post(CI.base_url + "index.php/presupuesto/presupuesto/save", submitdata2 , function(result) {
                              bsub.removeAttr('disabled');
                              productTable.fnDraw();
                              $form[0].reset();
                          });
                      }
                    }

                });
       }
    });

$("#materiales form").validate({
       rules: {
            requerimiento:{
               required: true,
            },
            dependencia_ma:{
               required: true,
            },
            cantidad:{
               required: true,
               number : true
            },
       },
       messages: {
          requerimiento:{
               required: "Informacion requerida",

          },
          dependencia_ma:{
              required: "Informacion requerida",
          },
          cantidad:{
               required: "Informacion requerida",
               number : " Ingrese un valor numerico"
          },
       },

       submitHandler: function(form) {
          var requerimientoid = $('#requerimiento').val();
          var requerimiento = $('#requerimiento').find('option:selected').text();
          var dependencia_ma = $('#dependencia_ma').val();
          var detalle_ma = $('#detalle_ma').val();
          var cantidad = $('#cantidad').val();

          var submitdata2 = { "requerimientoid" : requerimientoid,
                              "detalle" : detalle_ma,
                              "requerimiento" : requerimiento,
                              "dependencia" : dependencia_ma,
                              "cantidad" : cantidad,
                             "csrf_token_c": CI.cct
                          };
              var bsub = $(".dtadd");
              bsub.attr("disabled", "disabled");

              $form = $("#materiales form");
              var str=$form.serialize();

              var parametros= {
                "presupuestadoid" : requerimientoid,
                "csrf_token_c" : CI.cct
              }
              $.ajax({
                data:  parametros,
                url: CI.base_url + "index.php/presupuesto/presupuesto/Find_Presupuesto",
                type: 'post',
                dataType: 'json',
                beforeSend: function(){
                  $("#resultado").html("Procesando, espere por favor...");

                },
                success: function(response){

                  bsub.removeAttr('disabled');
                  $("#baseperiodo").html("");
                  $("<option value='9'>"+response.baseperiodo+"</option>").appendTo("#baseperiodo");
                   if (cantidad>response.resultado) {
                      $("#resultado2").html("<p>No se puede registrar, porque la cantidad solicitada es mayor al presupuesto "+ response.resultado +" </p>");
                   }else{
                      $.post(CI.base_url + "index.php/presupuesto/presupuesto/save_material", submitdata2 , function(result) {

                          productTable.fnDraw();
                          $("#resultado2").html("<p> Se guardo exitosamente </p>");
                          $form[0].reset();
                      });
                   }

                }

              });
        }
    });

});
    </script>