function cargarProvBySede()
{
	var doLoginMethodUrl = 'registro_seguimiento/obtenerprovincia_by_sede';
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
			$("#distrito").empty().append("<option value='-1' selected='true'></value>");
			$("#centropoblado").empty().append("<option value='-1' selected='true'></value>");
			$("#rutas").empty().append("<option value='-1' selected='true'></value>");
			$("#periodo").empty().append("<option value='-1' selected='true'></value>");

			verdatos(0);
		}
	});
}

function cargarDist()
{
	var doLoginMethodUrl = 'registro_seguimiento/obtenerdistrito';
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
			$("#centropoblado").empty().append("<option value='-1' selected='true'></value>");
			$("#rutas").empty().append("<option value='-1' selected='true'></value>");
			$("#periodo").empty().append("<option value='-1' selected='true'></value>");

			verdatos(1);
		}
	});
}

function cargarCentroPoblado()
{
	var doLoginMethodUrl = 'registro_seguimiento/obtenercentropoblado';
	var id_depa = $("#departamento").val();
	var id_prov = $("#provincia").val();
	var id_dist = $("#distrito").val();
	$.ajax({
		type: "POST",
		url: doLoginMethodUrl,
		data: "id_depa="+id_depa+"&id_prov="+id_prov+"&id_dist="+id_dist,
		dataType:'json',
		success: function(json_data){
			$("#centropoblado").empty();
			$.each(json_data, function(i, data){
				$("#centropoblado").append('<option value="' + data.CODIGO + '">' + data.NOMBRE + '</option>');
			});

			$("#centropoblado").prepend("<option value='-1' selected='true'>Seleccione...</value>");			
			$("#rutas").empty().append("<option value='-1' selected='true'></value>");
			$("#periodo").empty().append("<option value='-1' selected='true'></value>");

			verdatos(2);
		}
	});
}

function cargarRutas()
{
	var doLoginMethodUrl = 'registro_seguimiento/obtenerrutas';
	var id_cp = $("#centropoblado").val();
	$.ajax({
		type: "POST",
		url: doLoginMethodUrl,
		data: "id_cp="+id_cp,
		dataType:'json',
		success: function(json_data){
			$("#rutas").empty();
			$.each(json_data, function(i, data){
				$("#rutas").append('<option value="' + data.CODIGO + '">' + data.NOMBRE + '</option>');
			});

			$("#rutas").prepend("<option value='-1' selected='true'>Seleccione...</value>");
			$("#periodo").empty().append("<option value='-1' selected='true'></value>");

			verdatos(3);
		}
	});
}

function cargarPeriodo()
{
	var doLoginMethodUrl = 'registro_seguimiento/obtenerperiodo';
	var id_cp = $("#centropoblado").val();
	var id_ruta = $("#rutas").val();
	$.ajax({
		type: "POST",
		url: doLoginMethodUrl,
		data: "id_cp="+id_cp+"&id_ruta="+id_ruta,
		dataType:'json',
		success: function(json_data){
			$("#periodo").empty();
			$.each(json_data, function(i, data){
				$("#periodo").append('<option value="' + data.CODIGO + '">' + data.NOMBRE + '</option>');
			});
			
			$("#periodo").prepend("<option value='-1' selected='true'>Seleccione...</value>");

			verdatos(4);
		}
	});
}

function verdatos(intervalo)
{
	var coddepa = $("#departamento").val();
	var codprov = $("#provincia").val();
	var coddist = $("#distrito").val();
	var codcentrop = $("#centropoblado").val();
	var codruta = $("#rutas").val();
	var nroperiodo = $("#periodo").val();

	var condicion;

	switch(intervalo)
	{
		case 0: condicion = "registro_seguimiento/ver_datos";
			break;

		case 1: condicion = "registro_seguimiento/ver_datos?coddepa="+coddepa+"&codprov="+codprov;
			break;

		case 2:	condicion = "registro_seguimiento/ver_datos?coddepa="+coddepa+"&codprov="+codprov+"&coddist="+coddist;
			break;

		case 3: condicion = "registro_seguimiento/ver_datos?coddepa="+coddepa+"&codprov="+codprov+"&coddist="+coddist+"&codcentrop="+codcentrop;
			break;

		case 4: condicion = "registro_seguimiento/ver_datos?coddepa="+coddepa+"&codprov="+codprov+"&coddist="+coddist+"&codcentrop="+codcentrop+"&codruta="+codruta;
			break;

		case 5: condicion = "registro_seguimiento/ver_datos?coddepa="+coddepa+"&codprov="+codprov+"&coddist="+coddist+"&codcentrop="+codcentrop+"&codruta="+codruta+"&nroperiodo="+nroperiodo;
			break;
	}

	jQuery("#list2").jqGrid('setGridParam',{url:condicion,page:1}).trigger("reloadGrid");
}