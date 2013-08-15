function cargarProvBySede()
{
    var doLoginMethodUrl = 'aprobacioncv/obtenerprovincia_by_sede';

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