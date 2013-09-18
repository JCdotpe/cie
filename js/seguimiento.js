function cargarProvBySede()
{
	var doLoginMethodUrl = 'registro_seguimiento/obtenerprovincia_by_sede';
	//var id_dpto = $("#departamento").val();
	//$("#sedeoperativa option[value="+id_dpto+"]").attr('selected','selected');
	//var id_sede = $("#sedeoperativa").find('option:selected').text();
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
	var id_sede = $("#sedeoperativa").val();
	var id_prov = $("#provincia_ope").val();
	$.ajax({
		type: "POST",
		url: doLoginMethodUrl,
		data: "id_sede="+id_sede+"&id_prov="+id_prov,
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
	var id_depa = $("#sedeoperativa").val();
	var id_prov = $("#provincia_ope").val();
	var id_dist = $("#distrito").val();
	$.ajax({
		type: "POST",
		url: doLoginMethodUrl,
		data: "id_sede="+id_depa+"&id_prov="+id_prov+"&id_dist="+id_dist,
		dataType:'json',
		success: function(json_data){
			$("#centropoblado").empty();
			$.each(json_data, function(i, data){
				$("#centropoblado").append('<option value="' + data.CODIGO + '">' + data.NOMBRE + '</option>');
			});

			$("#centropoblado").prepend("<option value='-1' selected='true'>Seleccione...</value>");			
			$("#rutas").empty().append("<option value='-1' selected='true'></value>");
			$("#periodo").empty().append("<option value='-1' selected='true'></value>");

			if (id_dist=='-1'){ verdatos(1); }else{ verdatos(2); }
		}
	});
}

function cargarRutas()
{
	var doLoginMethodUrl = 'registro_seguimiento/obtenerrutas';
	var id_depa = $("#sedeoperativa").val();
	var id_prov = $("#provincia_ope").val();
	var id_dist = $("#distrito").val();
	var id_cp = $("#centropoblado").val();
	$.ajax({
		type: "POST",
		url: doLoginMethodUrl,
		data: "id_sede="+id_depa+"&id_prov="+id_prov+"&id_dist="+id_dist+"&id_cp="+id_cp,
		dataType:'json',
		success: function(json_data){
			$("#rutas").empty();
			$.each(json_data, function(i, data){
				$("#rutas").append('<option value="' + data.CODIGO + '">' + data.NOMBRE + '</option>');
			});

			$("#rutas").prepend("<option value='-1' selected='true'>Seleccione...</value>");
			$("#periodo").empty().append("<option value='-1' selected='true'></value>");

			if (id_cp=='-1'){ verdatos(2); }else{ verdatos(3); }
		}
	});
}

function cargarPeriodo()
{
	var doLoginMethodUrl = 'registro_seguimiento/obtenerperiodo';
	var id_depa = $("#sedeoperativa").val();
	var id_prov = $("#provincia_ope").val();
	var id_dist = $("#distrito").val();
	var id_cp = $("#centropoblado").val();
	var id_ruta = $("#rutas").val();
	$.ajax({
		type: "POST",
		url: doLoginMethodUrl,
		data: "id_sede="+id_depa+"&id_prov="+id_prov+"&id_dist="+id_dist+"&id_cp="+id_cp+"&id_ruta="+id_ruta,
		dataType:'json',
		success: function(json_data){
			$("#periodo").empty();
			$.each(json_data, function(i, data){
				$("#periodo").append('<option value="' + data.CODIGO + '">' + data.NOMBRE + '</option>');
			});
			
			$("#periodo").prepend("<option value='-1' selected='true'>Seleccione...</value>");

			if (id_ruta=='-1'){ verdatos(3); }else{ verdatos(4); }
		}
	});
}

function verdatos(intervalo)
{
	var codsede = $("#sedeoperativa").val();
	var codprov = $("#provincia_ope").val();
	var coddist = $("#distrito").val();
	var codcentrop = $("#centropoblado").val();
	var codruta = $("#rutas").val();
	var nroperiodo = $("#periodo").val();

	if (nroperiodo=='-1' && intervalo == 5){ intervalo=4; }

	var condicion;

	switch(intervalo)
	{
		case 0: condicion = "registro_seguimiento/ver_datos";
			break;

		case 1: condicion = "registro_seguimiento/ver_datos?codsede="+codsede+"&codprov="+codprov;
			break;

		case 2:	condicion = "registro_seguimiento/ver_datos?codsede="+codsede+"&codprov="+codprov+"&coddist="+coddist;
			break;

		case 3: condicion = "registro_seguimiento/ver_datos?codsede="+codsede+"&codprov="+codprov+"&coddist="+coddist+"&codcentrop="+codcentrop;
			break;

		case 4: condicion = "registro_seguimiento/ver_datos?codsede="+codsede+"&codprov="+codprov+"&coddist="+coddist+"&codcentrop="+codcentrop+"&codruta="+codruta;
			break;

		case 5: condicion = "registro_seguimiento/ver_datos?codsede="+codsede+"&codprov="+codprov+"&coddist="+coddist+"&codcentrop="+codcentrop+"&codruta="+codruta+"&nroperiodo="+nroperiodo;
			break;
	}

	jQuery("#list2").jqGrid('setGridParam',{url:condicion,page:1}).trigger("reloadGrid");
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

function consultar_codigo()
{
	var doLoginMethodUrl = 'mantenimiento_fotos/existelocal';
	var id_codigo = $("#codigolocal").val();
	
	$.ajax({
		type: "POST",
		url: doLoginMethodUrl,
		data: "codigo="+id_codigo,
		dataType:'json',
		success: function(data){
			if (data.cantidad==0)
			{
				alert("El Codigo es Invalido");
				$("#codigolocal").val('');				
			}
		}
	});
}


function Validar_Fotos()
{
	var codigo = $("#codigolocal").val();
	var repo = document.getElementsByName("estado_repo");
	var estado_repo ="";
  
	for(i=0;i<repo.length;i++){
		if(repo[i].checked){
			estado_repo = repo[i].value;
			break;
		}
	}

	if (codigo == "" || estado_repo == "")
	{
		alert("Faltan Datos!");
		return false;
	}else{
		registar_detalle_fotos(estado_repo);
	}
}

function registar_detalle_fotos(estado)
{
	var bsub = $( ":submit" );
	var form_data = $('#frm_seguimiento_mant').serializeArray();

	form_data.push(
		{name: 'estado_repo',value:estado}
	);
	form_data = $.param(form_data);

	$.ajax({
		type: "POST", 
		url: "mantenimiento_fotos/registro",
		data: form_data,
		success: function(response){
			$("#codigolocal").val('');
			$("#observaciones").val('');			
			$("input:radio").attr("checked", false);
			alert("Datos Registrados!");
		}
	});
}

function cargarProv()
{
	var doLoginMethodUrl = urlRoot('index.php')+'/seguimiento/reporte_ubigeo/obtenerprovincia';
	var id_depa = $("#departamento").val();

	$.ajax({
		type: "POST",
		url: doLoginMethodUrl,
		data: "id_depa="+id_depa,
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