function cargarProv()
{
	var doLoginMethodUrl = urlRoot('index.php')+'/bpr/preguntas/obtenerprovincia_by_sede';
	var id_sede = $("#sedeoperativa").val();

	$.ajax({
		type: "POST",
		url: doLoginMethodUrl,
		data: "id_sede="+id_sede,
		dataType:'json',
		success: function(json_data){
			$("#provincia_ope").empty();
			$.each(json_data, function(i, data){
				$("#provincia_ope").append('<option value="' + data.CODIGO + '">' + data.NOMBRE + '</option>');
			});
			
			$("#provincia_ope").prepend("<option value='-1' selected='true'>Seleccione...</value>");
			$("#distrito").empty().append("<option value='-1' selected='true'></value>");

			cargarDatos();
		}
	});
}

function cargarDatos()
{
	var codigo = $("#codigo").val();
	ListarPreguntaPrincipal(codigo);
}

function cargarCapitulo()
{
	var doLoginMethodUrl = urlRoot('index.php')+'/bpr/preguntas/obtenercapitulo';
	var id_cedula = $("#cedula").val();
	$.ajax({
		type: "POST",
		url: doLoginMethodUrl,
		data: "id_cedula="+id_cedula,
		dataType:'json',
		success: function(json_data){
			$("#capitulo").empty();
			$.each(json_data, function(i, data){
				$("#capitulo").append('<option value="' + data.CODIGO + '">' + data.NOMBRE + '</option>');
			});
			
			$("#capitulo").prepend("<option value='-1' selected='true'>Seleccione...</value>");	
			$("#seccion").empty().append("<option value='-1' selected='true'></value>");
			$("#pregunta").empty().append("<option value='-1' selected='true'></value>");

			cargarDatos();
		}
	});
}

function cargarSeccion()
{
	var doLoginMethodUrl = urlRoot('index.php')+'/bpr/preguntas/obtenerseccion';
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

			cargarDatos();
		}
	});
}

function cargarPreguntas()
{
	var doLoginMethodUrl = urlRoot('index.php')+'/bpr/preguntas/obtenerpregunta';
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

			cargarDatos();
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
	id_sede = $("#sedeoperativa").val();
	id_prov = $("#provincia_ope").val();
	
	id_cargo = document.getElementById("cargo").value;
	id_cedula = $("#cedula").val();
	id_cap = $("#capitulo").val();
	id_sec = $("#seccion").val();
	id_pre = $("#pregunta").val();
	nom = $("#nombrecompleto").val();
	nrodni = $("#nrodni").val();
	cons = $("#consulta").val();

	if (id_sede == -1 || id_prov == -1 || id_cargo == -1 || id_cedula == -1 || id_cap == -1 || id_sec == -1 || id_pre == -1 || nrodni == "" || nom == "")
	{
		alert("Faltan Seleccionar Datos!");
		return false;
	}

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
		url: urlRoot('index.php')+"/bpr/preguntas/registro",
		data: form_data,
		success: function(response){
			$("#frm_preguntas :input").val('');
			alert("Consulta Enviada!");
		}
	});
}