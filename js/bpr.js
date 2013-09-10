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

function cargarCapitulo()
{
	var doLoginMethodUrl = 'preguntas/obtenercapitulo';
	$.ajax({
		type: "POST",
		url: doLoginMethodUrl,
		//data: "id_depa="+id_depa+"&id_prov="+id_prov,
		dataType:'json',
		success: function(json_data){
			$("#capitulo").empty();
			$.each(json_data, function(i, data){
				$("#capitulo").append('<option value="' + data.CODIGO + '">' + data.NOMBRE + '</option>');
			});
			
			$("#capitulo").prepend("<option value='-1' selected='true'>Seleccione...</value>");	
			$("#seccion").empty().append("<option value='-1' selected='true'></value>");
			$("#pregunta").empty().append("<option value='-1' selected='true'></value>");
		}
	});
}

function cargarSeccion()
{
	var doLoginMethodUrl = 'preguntas/obtenerseccion';
	var id_cap = $("#capitulo").val();
	$.ajax({
		type: "POST",
		url: doLoginMethodUrl,
		data: "id_cap="+id_cap,
		dataType:'json',
		success: function(json_data){
			$("#seccion").empty();
			$.each(json_data, function(i, data){
				$("#seccion").append('<option value="' + data.CODIGO + '">' + data.NOMBRE + '</option>');
			});
			
			$("#seccion").prepend("<option value='-1' selected='true'>Seleccione...</value>");
			$("#pregunta").empty().append("<option value='-1' selected='true'></value>");	
		}
	});
}

function cargarPreguntas()
{
	var doLoginMethodUrl = 'preguntas/obtenerpregunta';
	var id_cap = $("#capitulo").val();
	var id_sec = $("#seccion").val();
	$.ajax({
		type: "POST",
		url: doLoginMethodUrl,
		data: "id_cap="+id_cap+"&id_sec="+id_sec,
		dataType:'json',
		success: function(json_data){
			$("#pregunta").empty();
			$.each(json_data, function(i, data){
				$("#pregunta").append('<option value="' + data.CODIGO + '">' + data.NOMBRE + '</option>');
			});
			
			$("#pregunta").prepend("<option value='-1' selected='true'>Seleccione...</value>");			
		}
	});
}

function validar_numeros(e)
{
	e= (window.event)? event : e;
	tecla= (e.keyCode)? e.keyCode: e.which;
	if (tecla==8 || tecla==9 || tecla==16 || (tecla>=35 && tecla<=40)) return true; 
	patron =/[0-9]/;
	te = String.fromCharCode(tecla);
	return patron.test(te); 
}

function Form_Validar()
{
	id_depa = $("#departamento").val();
	id_prov = $("#provincia").val();
	id_dist = $("#distrito").val();
	id_cargo = document.getElementById("cargo").value;
	id_cap = $("#capitulo").val();
	id_sec = $("#seccion").val();
	id_pre = $("#pregunta").val();

	cons = $("#consulta").val();
	nombre = $("#nombrecompleto").val();

	if (id_depa == -1 || id_prov == -1 || id_dist == -1 || id_cargo == -1 || id_cap == -1 || id_sec == -1 || id_pre == -1)
	{
		alert("Faltan Seleccionar Datos!");
		return false;
	}

	if (nombre == "") { alert("Ingrese Nombre Completo!");  return false; }

	if (cons == "") { alert("Ingrese Consulta que desea realizar!");  return false; }

	preguntas_form(id_cargo);
}

function preguntas_form(cargo)
{
	var bsub = $( ":submit" );
	var form_data = $('#frm_preguntas').serializeArray();

	form_data.push(
		{name: 'id_cargo',value:cargo}
	);
	form_data = $.param(form_data);

	$.ajax({
		type: "POST", 
		url: "preguntas/registro",
		data: form_data,
		success: function(response){
			$("#frm_preguntas :input").val('');
			alert("Consulta Enviada!");
		}
	});
}