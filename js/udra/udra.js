 function showValues() {
    var fields = $("#udra_registro").serializeArray();
    $("#results").empty();
    $.each(fields, function(i, field){
        $("#results").append(field.value + " ");
    });
}

function reportar_udra()
{
   /*$('#waiting1').waiting({
        elements: 10,
        auto: true
    });*/
    var id_activo = $("#comboactivo").val();

    jQuery("#list2").jqGrid('setGridParam',{url:"udra/udra/get_datatables?id_activo="+id_activo ,page:1}).trigger("reloadGrid");
}

function exportExcel()
  {
        var id_activo = $("#comboactivo").val();

        document.forms[0].method='POST';
        document.forms[0].action="udra/udra_excel/Exportacionudra?id_activo="+id_activo;
        document.forms[0].target='_blank';
        document.forms[0].submit();
  }

function exportExcel_All_Activos()
  {
        document.forms[0].method='POST';
        document.forms[0].action="udra/udra_excel/Exportacionudra_all";
        document.forms[0].target='_blank';
        document.forms[0].submit();
  }

  function exportExcel_All_formularios()
  {
        document.forms[0].method='POST';
        document.forms[0].action="udra/udra_registro/Expor_formularios_all";
        document.forms[0].target='_blank';
        document.forms[0].submit();
  }


function get_udra_cantidad(values){

        var gr = jQuery("#list2").jqGrid('getGridParam','selrow');
        var form_data= new Array();

        form_data.push(
            {name: 'ajax',value:1},
            {name: 'codigo_udra',value:values}
        );
        var cantidads= null;

        form_data = $.param(form_data);

        $.ajax({
                  type: "POST",
                  url: CI.base_url + "index.php/udra/udra/Get_udra_cantidad/"+ values,
                  data: form_data,
                  success: function(data){
                    $('#cantidad').val(data);
                  },
                  error: function(error) {
                        alert(error);
                  }
        });
}

function get_count_patrimonio(values){

  var form_data= new Array();

   form_data.push(
         {name: 'ajax',value:1},
         {name: 'codigo_udra',value:values}
   );
  form_data = $.param(form_data);
        $.ajax({
                  type: "POST",
                  url: CI.base_url + "index.php/udra/udra/Count_patrimonio/",
                  data: form_data,
                  success: function(data){
                    $('#ingresado').val(data);
                  },
                  error: function(error) {
                        alert(error);
                  }
        });
}
function focus_text(){
  $('#udra_patrimonio').on('shown', function(){
          $('#inputpatrimonio').focus();
  });
}

function savedetalle(values)
{
        $("#alerta").hide();
        $('#inputpatrimonio').val('');
        get_udra_cantidad(values)
        get_count_patrimonio(values)
        focus_text();
        $("#add-detalle-modal").modal('show');
        $('#codigo_udra').val(values);
}

$(function(){

    $("#udra_patrimonio").keypress(function(e) {
      if ((e.keyCode == 13) && (e.target.type != "textarea")) {
        e.preventDefault();
        $(this).submit();
      }
    });

    $.validator.addMethod("validName", function(value, element) {
        return this.optional(element) || /^[a-zA-ZàáâäãåąćęèéêëìíîïłńòóôöõøùúûüÿýżźñçčšžÀÁÂÄÃÅĄĆĘÈÉÊËÌÍÎÏŁŃÒÓÔÖÕØÙÚÛÜŸÝŻŹÑßÇŒÆČŠŽ∂ð .-]+$/.test(value);
    }, "Caracteres no permitidos");

    $.validator.addMethod("validName2", function(value, element) {
    return this.optional(element) || /^[a-zA-ZàáâäãåąćęèéêëìíîïłńòóôöõøùúûüÿýżźñçčšžÀÁÂÄÃÅĄĆĘÈÉÊËÌÍÎÏŁŃÒÓÔÖÕØÙÚÛÜŸÝŻŹÑßÇŒÆČŠŽ∂ð .-123456789]+$/.test(value);
    }, "Caracteres no permitidos");

    $("#udra_registro").validate({
    rules: {
        comboactivo:{
            required: true,
         },
        inputcantidad: {
            required: true,
            number: true,
            maxlength: 10
         },
        comboestado: {
            required: true,
         },
        combonaturaleza:{
           required: true,
         },
        destino:{
           required: true,
         },
         combodocumento:{
           required: true,
         },
        inputnrodocumento:{
           required: true,
           validName2: true,
           maxlength: 25
         },
         inputglosa:{
           validName2: true,
           maxlength: 70
         },
    },
    messages: {

       comboactivo: {
            required:  "Ingrese un activo",
         },
        inputcantidad:{
            required: "Ingrese una cantidad",
            number:"Ingrese un valor numérico",
             maxlength: 'máximo 10 caracteres'
         },
        comboestado: {
            required: "Ingrese un estado",
         },
        combonaturaleza:{
            required: "Ingrese una naturaleza",
         },
        destino:{
            required: "Ingrese un destino",
         },
         combodocumento:{
            required: "Ingrese un documento",
         },
        inputnrodocumento:{
            required: "Ingrese un número de documento",
            validName2: "caracteres inválidos",
            maxlength: 'máximo 25 caracteres'
         },
         inputglosa:{
           validName2: "caracteres inválidos",
           maxlength: 'máximo 70 caracteres'
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
        reg_form();
        $('#list2').trigger( 'reloadGrid' );
    }

    });

            $("#udra_activo").validate({
                rules: {
                    inputactivonuevo:{
                        required: true,
                        validName2: true,
                        maxlength: 70
                     },
                },
                messages: {

                   inputactivonuevo: {
                        required: "Ingrese un nombre de activo",
                        validName2: "caracteres inválidos",
                        maxlength: 'máximo 70 caracteres'
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

      $("#udra_patrimonio").validate({
                rules: {
                    inputpatrimonio:{
                        required: true,
                        validName2: true,
                        maxlength: 15
                     },
                },
                messages: {

                   inputpatrimonio: {
                        required: "Ingrese un nombre de activo",
                        validName2: "caracteres inválidos",
                        maxlength: 'máximo 70 caracteres'
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
                  var ingresado= $("#ingresado").val();
                  var cantidad = $("#cantidad").val();
                  ingresado=parseInt(ingresado)+1;
                  if (ingresado>cantidad) {
                    alert("No puede exceder la cantidad : "+cantidad);
                  }else{
                    reg_form_patrimonio();
                    focus_text();
                  };

                }
      });
  function reg_form_patrimonio(){

        var form_data1= new Array();


        form_data1.push(
            {name: 'ajax',value:1},
            {name: 'codigo_udra',value:$("#codigo_udra").val()},
            {name: 'codigo_patrimonial',value:$( "#inputpatrimonio" ).val()}
        );
        form_data1 = $.param(form_data1);

        $.ajax({
                  type: "POST",
                  url: CI.base_url + "index.php/udra/udra/Find_codigo_patrimonial/",
                  data: form_data1,
                  success: function(data){
                    if (data==1) {

                      $("#alerta").show("slow");
                      //$("#alerta").alert();
                      //$(".alert").alert()

                    }else{
                      var form_data= new Array();
                      var codigo_udra= $("#codigo_udra").val();
                      var codigo_patrimonial= $("#inputpatrimonio").val();
                        form_data.push(
                            {name: 'ajax',value:1},
                            {name: 'codigo_udra',value:codigo_udra},
                            {name: 'codigo_patrimonial',value:codigo_patrimonial}
                        );
                        form_data = $.param(form_data);
                        $.ajax({
                            type: "POST",
                            url: CI.base_url + "index.php/udra/udra/save_patrimonio/",
                            data: form_data,
                            success: function(data){
                             $("#inputpatrimonio").val('');
                             get_count_patrimonio($("#codigo_udra").val());
                             $("#alerta").hide(1000);
                            },
                            error: function(error) {
                                  alert(error);
                             }

                          });
                    }

                  },
                  error: function(error) {
                        alert(error);
                   }

                });
    };


    $('#NOM_DD_f').change(function(event) {
        var code_odei = $(this).val();
        $("#NOM_DD_f option[value=" + code_odei + "]").attr('selected', 'selected');

        var coddepe=$('#NOM_DD_f').find('option:selected').text();
        var sele = $('#provincia_postu').val();
        var form_data = {
            code: code_odei,
            ajax:1
        };
        $.ajax({
            url: CI.base_url + "index.php/convocatoria/registro/get_ajax_prov/" + code_odei,
            type:'POST',
            data:form_data,
            dataType:'json',
            success:function(json_data){

                $("#NOM_PP_f").empty();
                $.each(json_data, function(i, data){
                    $("#NOM_PP_f").append('<option value="' + data.CCPP + '">' + data.Nombre + '</option>');
                });
                $("#NOM_PP_f  option[value=" + sele + "]").attr('selected', 'selected');
            }
        });
      });


    function reg_form(){

        var form_data= new Array();
        form_data.push(
            {name: 'ajax',value:1},
            {name: 'activo',value:$( "#comboactivo" ).val()},
            {name: 'cantidad',value:$( "#inputcantidad" ).val()},
            {name: 'comboestado',value:$( "#comboestado" ).val()},
            {name: 'combo_tipo_mov',value:$( "#combo_tipo_mov" ).val()},
            {name: 'combonaturaleza',value:$( "#combonaturaleza" ).val()},
            {name: 'destino',value:$( "#destino" ).val()},
            {name: 'combodocumento',value:$( "#combodocumento" ).val()},
            {name: 'inputglosa',value:$( "#inputglosa" ).val()},
            {name: 'inputnrodocumento',value:$( "#inputnrodocumento" ).val()},
            {name: 'comboproyecto',value:$( "#comboproyecto" ).val()}
        );

        form_data = $.param(form_data);



                var activo=$("#comboactivo").val();
                var combo_tipo = $("#combo_tipo_mov").val();

                var cantidad = $("#inputcantidad").val();
                var verdadero= true;

                var form_data2 = {
                    code: activo,
                    ajax:1
                };
                if (combo_tipo==2){
                    $.ajax({
                        type: "POST",
                        url: CI.base_url + "index.php/udra/udra/Find_mov_udra/"+ activo,
                        data: form_data2,
                        dataType:'json',
                        success: function(json_data){
                            $.each(json_data, function(i, data){

                              if ((cantidad)> (data.ingreso-data.egreso) || (data.ingreso-data.egreso)==0 ){
                                  verdadero=false;
                              }
                              if (verdadero) {
                                  $.ajax({
                                      type: "POST",
                                      url: CI.base_url + "index.php/udra/udra/save",
                                      data: form_data,
                                      success: function(response){
                                          alert("se inserto correctamente");
                                          $('#udra_registro')[0].reset();
                                      }
                                  });
                              }else{
                                alert("no puede retirar mercaderia, porque es mayor al saldo actual ");
                                $("#results").html("<p style='color:red'> saldo actual "+ (data.ingreso-data.egreso) +"</p>");
                              }
                            });
                        },
                        error: function(error) {
                            alert(error);
                        }
                    });
                }else{
                  $.ajax({
                        type: "POST",
                        url: CI.base_url + "index.php/udra/udra/save",
                        data: form_data,
                        success: function(response){
                                 alert("se inserto correctamente");
                                 $('#udra_registro')[0].reset();
                        }
                  });
                }
    }

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

                       var sel = $("#comboactivo");
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

    $("#add-activo").click(function(){
        $("#add-activo-modal").modal('show');
    });

    jQuery("#list2").jqGrid({
              type:"POST",
              url:'udra/udra/get_datatables',
              datatype: "json",
              height: 255,
              colNames:['Num','Tipo de mov','Activo','Cantidad',' Naturaleza ','Destino','Tipo documento','Nro. doc.','Estado','Nombre de proyecto','Glosa','Fecha de registro','detalle'],
              colModel:[
                {name:'codigo_udra',index:'codigo_udra', width:10,editable:true, editoptions:{readonly:true}},
                {name:'combo_tipo_mov',index:'tipo_mov', width:10,editable:true,edittype:"select",editoptions:{value:"1:INGRESO;2:SALIDA"}},
                {name:'activo',index:'codigo_act', width:10,editable:false},
                {name:'cantidad',index:'cantidad', width:10,editable:true},
                {name:'combonaturaleza',index:'codigo_Naturaleza', width:10,editable:true,edittype:"select",editoptions:{value:"1:ADQUISICIÓN;2:PRESTAMO;3:TRASALADO"}},
                {name:'destino',index:'codigo_destino', width:10,editable:true,edittype:"select",editoptions:{value:"1:CAMPO;2:CAPACITACIÓN;3:OFICINA;4:SEGMENTACION;5:METODOLOGÍA;6:UDRA"}},
                {name:'combodocumento',index:'tipo_documento', width:10,editable:true,edittype:"select",editoptions:{value:"1:FACTURA;2:CARGO;3:GUIA DE REMISIÓN;4:ORDEN DE COMPRA"}},
                {name:'inputnrodocumento',index:'nro_doc', width:10,editable:true},
                {name:'comboestado',index:'estado_activo', width:10,editable:true,edittype:"select",editoptions:{value:"1:NUEVO;2:USADO;3:DAÑADO"}},
                {name:'comboproyecto',index:'NombreProyecto', width:10,editable:true,edittype:"select",editoptions:{value:"1:ECE;2:INFRAESTRUCTURA;3:CENPESCO;4:BOSQUE;5:EDNOM"}},
                {name:'inputglosa',index:'glosa', width:10,editable:true},
                {name:'fecha_registro',index:'fecha_registro', width:10,editable:false},
                {name:'detalle',index:'detalle', width:10,editable:false}

              ],
              rowNum:10,
              rowList:[10,20,30],
              pager: '#pager2',
              sortname: 'codigo_udra',
              viewrecords: true,
              gridComplete: function(){
               var ids = jQuery("#list2").jqGrid('getDataIDs');
                for(var i=0;i < ids.length;i++){
                   var cl = ids[i];
                   be = "<input style='height:22px;width:50px;' type='button' value='detalle' onclick=savedetalle('"+cl+"') />";
                   jQuery("#list2").jqGrid('setRowData',ids[i],{detalle:be});
                }
              },
              sortorder: "asc",
              autowidth: false,
              caption:"Editar",
              shrinkToFit:false,
              caption:"Datos del Reporte",
              editurl:"udra/udra/update"
          });

          jQuery("#list2").jqGrid('navGrid','#pager2',{edit:false,add:false,del:false,search:false})

          $("#list2").setGridWidth($('#grid_content').width(), true);
          $('#list2').trigger( 'reloadGrid' );

         $("#bedata").click(function(){
            var gr = jQuery("#list2").jqGrid('getGridParam','selrow');
            if( gr != null )
              jQuery("#list2").jqGrid('editGridRow',gr,{height:500,width:350,reloadAfterSubmit:true,closeAfterEdit: true}); else alert("Por favor, selecciona un registro");
          });

         $("#elim_bedata").click(function(){
            var gr = jQuery("#list2").jqGrid('getGridParam','selrow');
             if( gr != null ) jQuery("#list2").jqGrid('delGridRow',gr,{reloadAfterSubmit:true, url:"udra/udra/update_estado"});
             else alert("Please Select Row to delete!");
         });


         $("#combo_tipo_mov").change(function(event){
              var nivel = $("#combo_tipo_mov").val();
              var json_data=null;

              switch(nivel){
                  case '1' :
                      json_data = [{"id": "1","nombre" : "ABASTECIMIENTO"},
                              {"id": "2","nombre" : "PROVEEDOR"},
                              {"id": "3","nombre" : "SALDO INICIAL"},
                              {"id": "4","nombre" : "TRASPASO"},
                              {"id": "5","nombre" : "PRESTAMO"},
                              {"id": "6","nombre" : "DEVOLUCIÓN"}];
                      break;
                  case '2' :
                      json_data =[{"id": "1","nombre" : "CONSUMO"},
                              {"id": "4","nombre" : "TRASPASO"},
                              {"id": "5","nombre" : "PRESTAMO"},
                              {"id": "6","nombre" : "DEVOLUCIÓN"}
                              ];

                      break;
              }
              if (json_data!=null) {
                  $("#combonaturaleza").empty();
                  $.each(json_data, function(i, data){
                                  $("#combonaturaleza").append('<option value="' + data.id + '">' + data.nombre + '</option>');
                  });

              }
          }).change();

});