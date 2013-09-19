function cargarProvBySede()
{
	var doLoginMethodUrl = 'aprobacioncv/obtenerprovincia_by_sede';
	//var id_dpto = $("#departamento").val();

	var codigo = $("#departamento").val();

	if (codigo.length < 5)
	{
		id_sede = codigo.substring(0,2);
		id_dpto = codigo.substring(2,4);
	}else{
		id_sede = codigo.substring(0,3);
		id_dpto = codigo.substring(3,5);
	}


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