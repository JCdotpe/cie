function cargarProv()
{
    var doLoginMethodUrl = 'coberturapea/obtenerprovincia';
    var id_depa = $("#departamento").val();
    $.ajax({
      type: "POST",
      url: doLoginMethodUrl,
      data: "id_depa="+id_depa,
      success: function(provinciaResponse){
        console.log(provinciaResponse);
        $("#provincia").empty().append($(provinciaResponse).find("option"));
        $("#provincia").prepend("<option value='-1' selected='true'>Seleccione...</value>");
        $.ajax({
          type: "POST",
          url: "coberturapea/obtenerdistrito",            
          data: "id_depa="+$("#departamento").val()+"&id_prov="+$("#provincia").val(),        
          success:function(distritoResponse) { 
            console.log(distritoResponse);
            
            $("#distrito").empty().append($(distritoResponse).find("option"));
            $("#distrito").prepend("<option value='-1' selected='true'>Seleccione...</value>");
            console.log($("#distrito"));
          }
        });
      }
    });
}

function cargarDist()
{
    var doLoginMethodUrl = 'coberturapea/obtenerdistrito';
    var id_depa = $("#departamento").val();
    var id_prov = $("#provincia").val();
    $.ajax({
      type: "POST",
      url: doLoginMethodUrl,
      data: "id_depa="+id_depa+"&id_prov="+id_prov,
      success: function(distritoResponse){
        console.log(distritoResponse);
        $("#distrito").empty().append($(distritoResponse).find("option"));
        $("#distrito").prepend("<option value='-1' selected='true'>Seleccione...</value>");
      }
    });
}

function cargarProvBySede()
{
    var doLoginMethodUrl = 'estadoseleccion/obtenerprovincia_by_sede';

    var id_dpto = $("#departamento").val();
    $("#sedeoperativa option[value="+id_dpto+"]").attr('selected','selected');
    var id_sede = $("#sedeoperativa").find('option:selected').text();

    $.ajax({
      type: "POST",
      url: doLoginMethodUrl,
      data: "id_sede="+id_sede+"&id_dpto="+id_dpto,
      success: function(provinciaResponse){
        console.log(provinciaResponse);
        $("#provincia").empty().append($(provinciaResponse).find("option"));
        $("#provincia").prepend("<option value='-1' selected='true'>Seleccione...</value>");
      }
    });
}