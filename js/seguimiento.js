function cargarProvBySede()
{
	var doLoginMethodUrl = 'seguimiento/seguimiento/obtenerprovincia_by_sede';
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

			$("#distrito").empty().append("<option value='-1' selected='true'></value>");
			$("#centropoblado").empty().append("<option value='-1' selected='true'></value>");
			$("#rutas").empty().append("<option value='-1' selected='true'></value>");
			/*$.ajax({
				type: "POST",
				url: "seguimiento/seguimiento/obtenerdistrito",
				data: "id_depa="+$("#departamento").val()+"&id_prov="+$("#provincia").val(),
				success:function(distritoResponse){
					console.log(distritoResponse);
					$("#distrito").empty().append($(distritoResponse).find("option"));
					$("#distrito").prepend("<option value='-1' selected='true'>Seleccione...</value>");
					console.log($("#distrito"));
				}
			});*/
		}
	});
}

function cargarDist()
{
	var doLoginMethodUrl = 'seguimiento/seguimiento/obtenerdistrito';
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

			$("#centropoblado").empty().append("<option value='-1' selected='true'></value>");
			$("#rutas").empty().append("<option value='-1' selected='true'></value>");
		}
	});
}

function cargarCentroPoblado()
{
	var doLoginMethodUrl = 'seguimiento/seguimiento/obtenercentropoblado';
	var id_depa = $("#departamento").val();
	var id_prov = $("#provincia").val();
	var id_dist = $("#distrito").val();
	$.ajax({
		type: "POST",
		url: doLoginMethodUrl,
		data: "id_depa="+id_depa+"&id_prov="+id_prov+"&id_dist="+id_dist,
		success: function(centropobladoResponse){
			console.log(centropobladoResponse);
			$("#centropoblado").empty().append($(centropobladoResponse).find("option"));
			$("#centropoblado").prepend("<option value='-1' selected='true'>Seleccione...</value>");
			
			$("#rutas").empty().append("<option value='-1' selected='true'></value>");
		}
	});
}

function cargarRutas()
{
	var doLoginMethodUrl = 'seguimiento/seguimiento/obtenerrutas';
	var id_cp = $("#centropoblado").val();
	$.ajax({
		type: "POST",
		url: doLoginMethodUrl,
		data: "id_cp="+id_cp,
		success: function(rutasResponse){
			console.log(rutasResponse);
			$("#rutas").empty().append($(rutasResponse).find("option"));
			$("#rutas").prepend("<option value='-1' selected='true'>Seleccione...</value>");
		}
	});
}