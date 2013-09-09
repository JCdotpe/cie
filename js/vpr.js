function cargarProv()
{
	var doLoginMethodUrl = 'preguntas/obtenerprovincia';
	var id_dpto = $("#departamento").val();
	
	$.ajax({
		type: "POST",
		url: doLoginMethodUrl,
		data: "id_dpto="+id_dpto,
		dataType:'json',
		success: function(json_data){
			$("#provincia").empty();
			$.each(json_data, function(i, data){
				$("#provincia").append('<option value="' + data.CODIGO + '">' + data.NOMBRE + '</option>');
			});
			
			$("#provincia").prepend("<option value='-1' selected='true'>Seleccione...</value>");
			$("#distrito").empty().append("<option value='-1' selected='true'></value>");
		}
	});
}

function cargarDist()
{
	var doLoginMethodUrl = 'preguntas/obtenerdistrito';
	var id_depa = $("#departamento").val();
	var id_prov = $("#provincia").val();
	$.ajax({
		type: "POST",
		url: doLoginMethodUrl,
		data: "id_depa="+id_depa+"&id_prov="+id_prov,
		dataType:'json',
		success: function(json_data){
			$("#distrito").empty();
			$.each(json_data, function(i, data){
				$("#distrito").append('<option value="' + data.CODIGO + '">' + data.NOMBRE + '</option>');
			});
			
			$("#distrito").prepend("<option value='-1' selected='true'>Seleccione...</value>");
			//verdatos(1);
		}
	});
}