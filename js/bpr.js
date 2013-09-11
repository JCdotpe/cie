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
			
			if ($("#list2").length)
			{
				if (id_prov=='-1'){ verdatos(0); }else{ verdatos(1); }	
			}
		}
	});
}

function cargarDatosbyDistrito()
{
	var id_dist = $("#distrito").val();

	if ($("#list2").length)
	{
		if (id_dist=='-1'){ verdatos(1); }else{ verdatos(2); }	
	}
}

function cargarCapitulo()
{
	var doLoginMethodUrl = 'preguntas/obtenercapitulo';
	var id_cargo = document.getElementById("cargo").value;
	$.ajax({
		type: "POST",
		url: doLoginMethodUrl,
		dataType:'json',
		success: function(json_data){
			$("#capitulo").empty();
			$.each(json_data, function(i, data){
				$("#capitulo").append('<option value="' + data.CODIGO + '">' + data.NOMBRE + '</option>');
			});
			
			$("#capitulo").prepend("<option value='-1' selected='true'>Seleccione...</value>");	
			$("#seccion").empty().append("<option value='-1' selected='true'></value>");
			$("#pregunta").empty().append("<option value='-1' selected='true'></value>");

			if ($("#list2").length)
			{
				if (id_cargo=='-1'){ verdatos(2); }else{ verdatos(3); }	
			}
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

			if ($("#list2").length)
			{
				if (id_cap=='-1'){ verdatos(3); }else{ verdatos(4); }	
			}
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

			if ($("#list2").length)
			{
				if (id_sec=='-1'){ verdatos(4); }else{ verdatos(5); }	
			}		
		}
	});
}

function cargarDatosbyPregunta()
{
	var id_pre = $("#pregunta").val();

	if ($("#list2").length)
	{
		if (id_pre=='-1'){ verdatos(5); }else{ verdatos(6); }	
	}
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

function verdatos(intervalo)
{
	var id_depa = $("#departamento").val();
	var id_prov = $("#provincia").val();
	var id_dist = $("#distrito").val();
	var cargo = document.getElementById("cargo").value;
	var id_cap = $("#capitulo").val();
	var id_sec = $("#seccion").val();
	var id_pre = $("#pregunta").val();

	if (id_pre=='-1' && intervalo == 6){ intervalo=5; }

	var condicion;

	switch(intervalo)
	{
		case 0: condicion = "respuestas/lista_consultas";
			break;

		case 1: condicion = "respuestas/lista_consultas?coddepa="+id_depa+"&codprov="+id_prov;
			break;

		case 2:	condicion = "respuestas/lista_consultas?coddepa="+id_depa+"&codprov="+id_prov+"&coddis="+id_dist;
			break;

		case 3: condicion = "respuestas/lista_consultas?coddepa="+id_depa+"&codprov="+id_prov+"&coddis="+id_dist+"&codcargo="+cargo;
			break;

		case 4: condicion = "respuestas/lista_consultas?coddepa="+id_depa+"&codprov="+id_prov+"&coddis="+id_dist+"&codcargo="+cargo+"&codcap="+id_cap;
			break;

		case 5: condicion = "respuestas/lista_consultas?coddepa="+id_depa+"&codprov="+id_prov+"&coddis="+id_dist+"&codcargo="+cargo+"&codcap="+id_cap+"&codsec="+id_sec;
			break;

		case 6: condicion = "respuestas/lista_consultas?coddepa="+id_depa+"&codprov="+id_prov+"&coddis="+id_dist+"&codcargo="+cargo+"&codcap="+id_cap+"&codsec="+id_sec+"&codpre="+id_pre;
			break;
	}

	jQuery("#list2").jqGrid('setGridParam',{url:condicion,page:1}).trigger("reloadGrid");
}

function BuscarDetalle(codigo)
{
	var doLoginMethodUrl = 'respuestas/buscardetalle';
	$.ajax({
		type: "POST",
		url: doLoginMethodUrl,
		data: "codigo="+codigo,
		dataType:'json',
		success: function(json_data){
			$.each(json_data, function(i, data){
				$("#desc_capitulo").val(data.desc_capitulo);
				$("#desc_seccion").val(data.desc_seccion);
				$("#desc_pregunta").val(data.desc_pregunta);
				$("#consulta").val(data.consulta);
			});
		}
	});
}

function frm_ValidarRespuesta()
{
	resp = $("#respuesta").val();
	if (resp == "") { alert("Ingrese una Respuesta!");  return false; }
	usuario = $("#usuario").val();
	respuestas_form(usuario);
}

function respuestas_form(usuario)
{
	var bsub = $( ":submit" );
	var form_data = $('#frm_respuesta').serializeArray();

	form_data = $.param(form_data);

	$.ajax({
		type: "POST", 
		url: "respuestas/registro",
		data: form_data,
		success: function(response){
			$("#frm_respuesta :input").val('');
			$("#usuario").val(usuario);
			$("#list2").trigger("reloadGrid");
			alert("Respuesta Enviada!");
		}
	});
}