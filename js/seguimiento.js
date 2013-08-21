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
			$("#periodo").empty().append("<option value='-1' selected='true'></value>");

			verdatos(0);
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
			$("#periodo").empty().append("<option value='-1' selected='true'></value>");

			verdatos(1);
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
			$("#periodo").empty().append("<option value='-1' selected='true'></value>");

			verdatos(2);
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

			$("#periodo").empty().append("<option value='-1' selected='true'></value>");

			verdatos(3);
		}
	});
}

function cargarPeriodo()
{
	var doLoginMethodUrl = 'seguimiento/seguimiento/obtenerperiodo';
	var id_cp = $("#centropoblado").val();
	var id_ruta = $("#rutas").val();
	$.ajax({
		type: "POST",
		url: doLoginMethodUrl,
		data: "id_cp="+id_cp+"&id_ruta="+id_ruta,
		success: function(periodoResponse){
			console.log(periodoResponse);
			$("#periodo").empty().append($(periodoResponse).find("option"));
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
		case 0: condicion = "seguimiento/seguimiento/ver_datos";
			break;

		case 1: condicion = "seguimiento/seguimiento/ver_datos?coddepa="+coddepa+"&codprov="+codprov;
			break;

		case 2:	condicion = "seguimiento/seguimiento/ver_datos?coddepa="+coddepa+"&codprov="+codprov+"&coddist="+coddist;
			break;

		case 3: condicion = "seguimiento/seguimiento/ver_datos?coddepa="+coddepa+"&codprov="+codprov+"&coddist="+coddist+"&codcentrop="+codcentrop;
			break;

		case 4: condicion = "seguimiento/seguimiento/ver_datos?coddepa="+coddepa+"&codprov="+codprov+"&coddist="+coddist+"&codcentrop="+codcentrop+"&codruta="+codruta;
			break;

		case 5: condicion = "seguimiento/seguimiento/ver_datos?coddepa="+coddepa+"&codprov="+codprov+"&coddist="+coddist+"&codcentrop="+codcentrop+"&codruta="+codruta+"&nroperiodo="+nroperiodo;
			break;
	}

	jQuery("#list2").jqGrid('setGridParam',{url:condicion,page:1}).trigger("reloadGrid");
}