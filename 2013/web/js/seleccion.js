function cargarProvBySede()
{
	var doLoginMethodUrl = urlRoot('index.php')+'/seleccion/aprobacioncv/obtenerprovincia_by_sede';
	
	var codigo = $("#departamento").val();
	var id_sede="";
	var id_dpto="";

	if (codigo.length < 5)
	{
		id_sede = codigo.substring(0,2);
		id_dpto = codigo.substring(2,4);
	}else{
		id_sede = codigo.substring(0,3);
		id_dpto = codigo.substring(3,5);
	}

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