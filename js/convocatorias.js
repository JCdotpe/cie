function cargarProv()
{
    var doLoginMethodUrl = 'coberturapea/obtenerprovincia';
    var id_depa = $("#departamento").val();
    $.ajax({
      type: "POST",
      url: doLoginMethodUrl,
      //dataType: "json",
      data: "id_depa="+id_depa,
      //cache: false,
      success: function(provinciaResponse){
        //document.getElementsByName("existelocal").value = data.fila;
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
      //dataType: "json",
      data: "id_depa="+id_depa+"&id_prov="+id_prov,
      //cache: false,
      success: function(distritoResponse){
        //document.getElementsByName("existelocal").value = data.fila;
        console.log(distritoResponse);
        $("#distrito").empty().append($(distritoResponse).find("option"));
        $("#distrito").prepend("<option value='-1' selected='true'>Seleccione...</value>");
      }
    });
}