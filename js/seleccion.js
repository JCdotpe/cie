function cargarProv()
{
    var doLoginMethodUrl = 'aprobacioncv/obtenerprovincia';
    var id_depa = $("#departamento").val();
    $.ajax({
      type: "POST",
      url: doLoginMethodUrl,
      data: "id_depa="+id_depa,
      success: function(provinciaResponse){
        console.log(provinciaResponse);
        $("#provincia").empty().append($(provinciaResponse).find("option"));
        $("#provincia").prepend("<option value='-1' selected='true'>Seleccione...</value>");
      }
    });
}