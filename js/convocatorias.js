function cargarProv()
{
    var doLoginMethodUrl = 'coberturapea/obtenerprovincia';
    var id_depa = $("#departamento").val();
    $.ajax({
      type: "POST",
      url: doLoginMethodUrl,
      data: "id_depa="+id_depa,
      dataType:'json',
      success: function(json_data){
        $("#provincia").empty();
        $.each(json_data, function(i, data){
          $("#provincia").append('<option value="' + data.CODIGO + '">' + data.NOMBRE + '</option>');
        });
        $("#provincia").prepend("<option value='-1' selected='true'>Seleccione...</value>");
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
      dataType:'json',
      success: function(json_data){
        $("#provincia").empty();
        $.each(json_data, function(i, data){
          $("#provincia").append('<option value="' + data.CODIGO + '">' + data.NOMBRE + '</option>');
        });
        $("#provincia").prepend("<option value='-1' selected='true'>Seleccione...</value>");
      }
    });
}