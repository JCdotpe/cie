function cargarProvBySede()
{
	var doLoginMethodUrl = urlRoot('index.php')+'/seguimiento/registro_seguimiento/obtenerprovincia_by_sede';
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
			verdatos();
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
			verdatos();
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
			verdatos();
		}
	});
}

/*function cargarRutas()
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
}*/

/*function cargarPeriodo()
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
}*/

function cargarRutas()
{
	$("#rutas").empty();

	for (var i = 1; i <= 90; i++)
	{
		if (i<10)
		{
			codigo = "0"+i.toString();			
			$("#rutas").append('<option value="' + codigo + '">' + codigo + '</option>');
		}else{
			$("#rutas").append('<option value="' + i + '">' + i + '</option>');
		}
	}

	$("#rutas").prepend("<option value='-1' selected='true'>Seleccione...</value>");
}

function cargarPeriodo()
{
	$("#periodo").empty();

	for (var i = 1; i <= 14; i++)
	{
		$("#periodo").append('<option value="' + i + '">' + i + '</option>');
	}	
			
	$("#periodo").prepend("<option value='-1' selected='true'>Seleccione...</value>");
}

function verdatos()
{
	var codsede = $("#sedeoperativa").val();
	var codprov = $("#provincia_ope").val();
	var coddist = $("#distrito").val();
	var codcentrop = $("#centropoblado").val();
	var codruta = $("#rutas").val();
	var nroperiodo = $("#periodo").val();

	//if (nroperiodo=='-1' && intervalo == 5){ intervalo=4; }

	//var condicion;

	// switch(intervalo)
	// {
	// 	case 0: condicion = "registro_seguimiento/ver_datos";
	// 		break;

	// 	case 1: condicion = "registro_seguimiento/ver_datos?codsede="+codsede+"&codprov="+codprov;
	// 		break;

	// 	case 2:	condicion = "registro_seguimiento/ver_datos?codsede="+codsede+"&codprov="+codprov+"&coddist="+coddist;
	// 		break;

	// 	case 3: condicion = "registro_seguimiento/ver_datos?codsede="+codsede+"&codprov="+codprov+"&coddist="+coddist+"&codcentrop="+codcentrop;
	// 		break;

	// 	case 4: condicion = "registro_seguimiento/ver_datos?codsede="+codsede+"&codprov="+codprov+"&coddist="+coddist+"&codcentrop="+codcentrop+"&codruta="+codruta;
	// 		break;

	// 	case 5: condicion = "registro_seguimiento/ver_datos?codsede="+codsede+"&codprov="+codprov+"&coddist="+coddist+"&codcentrop="+codcentrop+"&codruta="+codruta+"&nroperiodo="+nroperiodo;
	// 		break;
	// }

	condicion = "registro_seguimiento/ver_datos?codsede="+codsede+"&codprov="+codprov+"&coddist="+coddist+"&codcentrop="+codcentrop+"&codruta="+codruta+"&nroperiodo="+nroperiodo;

	jQuery("#list2").jqGrid('setGridParam',{url:condicion,page:1}).trigger("reloadGrid");
}
///////////////////////////////////////////////////

function saveavance(values)
{
	$('#codigo').val(values);
	ver_avance(values);
	$("#add-avance-modal").modal('show');
}

function activar_especifique() 
{
	$("#especifique").val('');
	var codestado = $("#estado").val();
	if (codestado == 4)
	{
		if ($("#especifique").attr('disabled'))
		{
			$("#especifique").removeAttr('disabled');
		}
	}else{
		$("#especifique").attr({'disabled':'disabled'});
	}
}

function ver_avance(codigo)
{
	jQuery("#list3").jqGrid('setGridParam',{url:"registro_seguimiento/ver_datos_avance?codigo="+codigo,page:1}).trigger("reloadGrid");
}

function frm_ValidarAvance()
{
	var fecha = $("#fecha_avance").val();
	var estado = $("#estado").val();
	var codigo = $("#codigo").val();
	
	if (estado == -1 || fecha == "")
	{
		alert("Cuidado, Faltan Datos!");
		return false;
	}

	if (fecha.length<10){ alert("Fecha Incompleta"); return false; }

	registrar_avance();
}

function registrar_avance()
{
	var bsub = $( ":submit" );
	var form_data = $('#frm_avance').serializeArray();

	form_data.push(
		{name: 'ajax',value:1}
	);
	form_data = $.param(form_data);

	$.ajax({
		type: "POST",
		url: "registro_seguimiento/registro_avance",
		data: form_data,

		success: function(data){
			$("#fecha_avance").val('');
			//$("#estado").val('');
			$("#especifique").val('');
			$("#list3").trigger("reloadGrid");
			$("#list2").trigger("reloadGrid");
			alert("Avance Guardado!");
		}
	});
}
///////////////////////////////////////////////////

function savedetalle(values)
{
	$('#codigo_dt').val(values);
	ver_detalle(values);
	$("#add-detalle-modal").modal('show');
}

function ver_detalle(codigo)
{
	jQuery("#list4").jqGrid('setGridParam',{url:"registro_seguimiento/ver_datos_detalle?codigo="+codigo,page:1}).trigger("reloadGrid");
}

function cargarCedula()
{
	var doLoginMethodUrl = urlRoot('index.php')+'/bpr/preguntas/obtenercedula';
	$.ajax({
		type: "POST",
		url: doLoginMethodUrl,
		dataType:'json',
		success: function(json_data){
			$("#cedula").empty();
			$.each(json_data, function(i, data){
				$("#cedula").append('<option value="' + data.CODIGO + '">' + data.NOMBRE + '</option>');
			});

			$("#cedula").prepend("<option value='-1' selected='true'>Seleccione...</value>");
		}
	});
}

function frm_ValidarDetalle()
{
	var fecha = $("#fecha_detalle").val();
	var cedula = $("#cedula").val();
	var codigo = $("#codigo_dt").val();
	
	if (cedula == -1 || fecha == "")
	{
		alert("Cuidado, Faltan Datos!");
		return false;
	}

	if (fecha.length<10){ alert("Fecha Incompleta"); return false; }

	registrar_detalle();
}

function registrar_detalle()
{
	var bsub = $( ":submit" );
	var form_data = $('#frm_detalle').serializeArray();

	form_data.push(
		{name: 'ajax',value:1}
	);
	form_data = $.param(form_data);

	$.ajax({
		type: "POST",
		url: urlRoot('index.php')+"/seguimiento/registro_seguimiento/registro_detalle",
		data: form_data,

		success: function(data){
			$("#fecha_detalle").val('');
			$("#cantidad").val('');
			$("#list4").trigger("reloadGrid");
			alert("Avance Guardado!");
		}
	});
}

///////////////////////////////////////////////////
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


//*******************************************************
	function IsNumeric(valor) 
	{ 
		var log=valor.length; var sw="S"; 
		for (x=0; x<log; x++) 
		{ v1=valor.substr(x,1); 
		v2 = parseInt(v1); 
		//Compruebo si es un valor numérico 
		if (isNaN(v2)) { sw= "N";} 
		} 
		if (sw=="S") {return true;} else {return false; } 
	}

	function IsRange(dia, mes) 
	{
		var sw=0;
		switch(mes)
		{
			case '01':
				if (dia<=31){ sw=1; }
			break;
			case '03':
				if (dia<=31){ sw=1; }
			break;
			case '04':
				if (dia<=30){ sw=1; }
			break;
			case '05':
				if (dia<=31){ sw=1; }
			break;
			case '06':
				if (dia<=30){ sw=1; }
			break;
			case '07':
				if (dia<=31){ sw=1; }
			break;
			case '08':
				if (dia<=31){ sw=1; }
			break;
			case '09':
		  		if (dia<=30){ sw=1; }
		  	break;
		  	case '10':
				if (dia<=31){ sw=1; }
			break;
			case '11':
				if (dia<=30){ sw=1; }
			break;
			case '12':
				if (dia<=31){ sw=1; }
			break;
		}
		
		if (sw==1) {return true;} else {return false; } 
	}

	var primerslap=false; 
	var segundoslap=false; 

	function formateafecha(fecha) 
	{ 
		var long = fecha.length; 
		var dia; 
		var mes; 
		var ano;
		var d = new Date();
		var anoactual = d.getFullYear();
		if ((long>=2) && (primerslap==false)) { dia=fecha.substr(0,2); 
		if ((IsNumeric(dia)==true) && (dia<=31) && (dia!="00")) { fecha=fecha.substr(0,2)+"/"+fecha.substr(3,7); primerslap=true; } 
		else { fecha=""; primerslap=false;} 
		} 
		else 
		{ dia=fecha.substr(0,1); 
		if (IsNumeric(dia)==false) 
		{fecha="";} 
		if ((long<=2) && (primerslap=true)) {fecha=fecha.substr(0,1); primerslap=false; } 
		} 
		if ((long>=5) && (segundoslap==false)) 
		{ mes=fecha.substr(3,2); dia=fecha.substr(0,2);
		if ((IsNumeric(mes)==true) &&(mes<=12) && (mes!="00") && (IsRange(dia,mes)==true)) { fecha=fecha.substr(0,5)+"/"+fecha.substr(6,4); segundoslap=true; } 
		else { fecha=fecha.substr(0,3);; segundoslap=false;} 
		} 
		else { if ((long<=5) && (segundoslap=true)) { fecha=fecha.substr(0,4); segundoslap=false; } } 
		if (long>=7) 
		{ ano=fecha.substr(6,4); 
		if (IsNumeric(ano)==false) { fecha=fecha.substr(0,6); } 
		else { if (long==10){ if ((ano==0) || (ano<2013) || (ano>anoactual)) { fecha=fecha.substr(0,6); } } } 
		}
		if (long==10)
		{
			dia=fecha.substr(0,2);
			mes=fecha.substr(3,2);
			if ((ano<=2013) && (mes<9)){ fecha=""; }
			if ((ano==2013) && (mes==9) && (dia<9)){ fecha=""; }
		}
		if (long>=10) 
		{ 
			fecha=fecha.substr(0,10); 
			dia=fecha.substr(0,2); 
			mes=fecha.substr(3,2); 
			ano=fecha.substr(6,4); 
			// Año no viciesto y es febrero y el dia es mayor a 28 
			if ( (ano%4 != 0) && (mes ==02) && (dia > 28) ) { fecha=fecha.substr(0,2)+"/"; } 
		} 
		return (fecha); 
	}