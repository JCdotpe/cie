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

    var codigo = $("#departamento").val();

    if (codigo.length < 5)
    {
      id_sede = codigo.substring(0,2);
      id_dpto = codigo.substring(2,4);
    }else{
      id_sede = codigo.substring(0,3);
      id_dpto = codigo.substring(3,5);
    }

    //string = "el dpto es: "+id_dpto+" y la sede es: "+id_sede;

    //alert(string);
    

    //$("#sedeoperativa option[value="+id_dpto+"]").attr('selected','selected');
    //var id_sede = $("#sedeoperativa").find('option:selected').text();

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