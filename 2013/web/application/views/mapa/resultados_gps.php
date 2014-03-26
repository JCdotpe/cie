<!DOCTYPE html>
<html>
<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="initial-scale=1.0, user-scalable=no">
	<meta name="viewport" content="width=device-width">
	<meta name="description" content="">

	<title>Resultados Georeferenciados</title>

	<link rel="stylesheet" type="text/css" href="<?php echo base_url('css/bootstrap.min.css'); ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('css/bootstrap.spacelab.css'); ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('css/bootstrap-responsive.min.css'); ?>">
	<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Open+Sans">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('css/maps.css'); ?>">
	
	<script type="text/javascript" src="<?php echo base_url('js/general/jquery-1.10.2.min.js'); ?>"></script>
	<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false"></script>
	<script type="text/javascript" src="<?php echo base_url('js/general/basic.js'); ?>"></script>
	<script type="text/javascript" src="http://geoxml3.googlecode.com/svn/branches/polys/geoxml3.js"></script>
	<script type="text/javascript" src="http://www.google.com/jsapi"></script>

	<script type="text/javascript">
		var html;
		var condicion;
		
		var layer;
		var capaKml;
		var maploaded = false;


		google.load('visualization', '1', {'packages':['corechart', 'table', 'geomap']});

		var infowindow = new google.maps.InfoWindow({
			size: new google.maps.Size(300,400)
		});
		
		function checkGoogleMap() {
			
			var msg = document.getElementById('msg');

			if (maploaded == false) {
				msg.innerHTML = 'Cargando puntos...';
				$("#msg").slideDown("fast");

			} else {
				msg.innerHTML = 'Puntos cargados.'
				$("#msg").slideUp("slow");
			} 
		}

		function initialize() {
			var myOptions = {
				zoom: 6,
				center: new google.maps.LatLng(-9.817329,-69.920655),
				// mapTypeId: google.maps.MapTypeId.SATELLITE,
				mapTypeId: google.maps.MapTypeId.ROADMAP,
				zoomControl: true,
				zoomControlOptions: {
					style: google.maps.ZoomControlStyle.LARGE,
					position: google.maps.ControlPosition.RIGHT_CENTER
				},
				streetViewControl: true,
				streetViewControlOptions:{
					position: google.maps.ControlPosition.RIGHT_CENTER
				},
				panControl: false,
				panControlOptions: {
					position: google.maps.ControlPosition.RIGHT_CENTER
				},
				scaleControl: false,
				scaleControlOptions: {
					position: google.maps.ControlPosition.RIGHT_CENTER
				},
				mapTypeControl: true,
				mapTypeControlOptions: {
					style: google.maps.MapTypeControlStyle.DROPDOWN_MENU,
					position: google.maps.ControlPosition.RIGHT_CENTER
				}
			}

			map = new google.maps.Map(document.getElementById("map-canvas"), myOptions);

			capaKml = new google.maps.FusionTablesLayer({
				query: {
					select: " * ",
					from: "1GpIA0mBHMTame6QFenQeQCazLW4NiLciy3lfLvSZ"
				},
				options: {
					styleId: 2
				}
			});

			capaKml.setMap(map);


		}

		google.maps.event.addDomListener(window, 'load', initialize);

		$(document).ready(function () {

			$('#NOM_PROV').attr('disabled', true);
			$('#NOM_DIST').attr('disabled', true);

			combo_dpto();
			ocultar_cmb();

			$('#dpto').change(function(event){

				code = $(this).val();

				if ( code != '1501' && code != '1502')
				{
					combo_prov(code);
					$('#dv_prov').show();
					$('#dv_dist').show();
				}else{
					$('#dv_prov').hide();
					$('#dv_dist').hide();
				}

				$('#prov').val(0);
				$('#dist').val(0);
				$('#area').val(0);
				$('#resultado').val(0);

				code = ( code == '1501' || code == '1502' ) ? 15 : code;
				if ( $(this).val() != 0 ){
					load_kml_ft( '1GpIA0mBHMTame6QFenQeQCazLW4NiLciy3lfLvSZ', code );
				}else{
					load_kml_ft( '1GpIA0mBHMTame6QFenQeQCazLW4NiLciy3lfLvSZ', 0 );
				}

			});

			$('#prov').change(function(event) {

				combo_dist( $('#dpto').val(), $(this).val() );
				$('#area').val(0);

				code = $('#dpto').val() + $(this).val();

				if ( $(this).val() != 0 ){
					load_kml_ft( '1tmpbIqHGt8ymHU_L_qTEOpzcMHTOh3i_zzvWB7ZQ', code );
				}else{
					load_kml_ft( '1GpIA0mBHMTame6QFenQeQCazLW4NiLciy3lfLvSZ', code.substring(0,2) );
				}

			});

			$('#dist').change(function(event) {
				
				$('#area').val(0);

				code = $('#dpto').val() + $('#prov').val() + $(this).val();
				if ( $(this).val() != 0 ){
					load_kml_ft( '1Qvu7A-6HA7TCPVTAJ6xgld_3J7UFBr2SIlbQBz4w', code );
				}else{
					load_kml_ft( '1tmpbIqHGt8ymHU_L_qTEOpzcMHTOh3i_zzvWB7ZQ', code.substring(0,4) );
				}

			});


			$('#resultado').change(function(event) {
				
				ocultar_cmb();
				code = $(this).val();

				switch( code )
				{
					case '1':
					case '10':
					case '11':						
						$('#optecnica').show();
						$('#op_tecnica').val(0);
						// $('#op_tecnica').on("change", function(event) { 
						// 	maploaded = false;
						// 	checkGoogleMap();

 					// 		OpinionTecnica($('#dpto').val(),$('#prov').val(),$('#dist').val(),$('#area').val(),$('#op_tecnica').val());
						// });
						break;
					case '2':
						$('#defcivil').show();
						$('#def_civil').val(0);
						break;
					case '3':
						$('#altriesgo').show();
						$('#alt_riesgo').val(0);
						break;
					case '4':
						$('#patricult').show();
						$('#patri_cult').val(0);
						break;
					case '5':
						$('#obrasejec').show();
						$('#obras_ejec').val(0);
						break;
					case '6':
						$('#serv').show();
						$('#serv input[type=checkbox]').removeAttr('checked');
						break;
					case '7':
						$('#comuni').show();
						$('#comuni input[type=checkbox]').removeAttr('checked');
						break;
					case '8':
						$('#vulne').show();
						$('#vulne input[type=checkbox]').removeAttr('checked');
						break;
					case '9':
						$('#niveledu').show();
						$('#nivel_edu').val(0);
						break;
				}
				
			});

			$('#niveledu').change(function(event) {
				
				$('#optecnica').show();
				$('#op_tecnica').val(0);
				
			});

			$('#op_tecnica').change(function(event) { 
				maploaded = false;
				checkGoogleMap();

				departamento = $('#dpto').val();
				provincia = $('#prov').val();
				distrito = $('#dist').val();
				tipoarea = $('#area').val();
				opinion = $(this).val();

				condicion =  ( opinion > 0 ) ? 'R_OT = '+opinion+' ' : 'R_OT > '+opinion+' ';

				if ( departamento > 0 )
				{
					condicion += 'AND cod_dpto = '+departamento+' ';
					if ( provincia > 0 )
					{
						condicion += 'AND cod_prov = '+provincia+' ';
						if ( distrito > 0 ){
							condicion += 'AND cod_dist = '+distrito+' ';
						}
					}
				}

				condicion += ( tipoarea != 0 ) ? "AND des_area = '"+tipoarea+"'" : "";

				load_data_ft( '13AXj1E5m7hUELP-Kzut8tbi2TeWjg7qWk-qhm7TM' );
			});

		});


		function ocultar_cmb() {
			$('#optecnica').hide();
			$('#defcivil').hide();
			$('#altriesgo').hide();
			$('#patricult').hide();
			$('#obrasejec').hide();
			$('#serv').hide();
			$('#comuni').hide();
			$('#vulne').hide();
			$('#niveledu').hide();
		}

		function combo_dpto(){

			$.getJSON(urlRoot('index.php')+'/mapa/resultados/dpto', {}, function(data, textStatus) {

				html='<option value="0">SELECCIONE...</option>';

				$.each(data, function(i, datos) {
					html+='<option class="cmbsede" value="'+datos.CCDD+'">'+datos.Nombre+'</option>';
				});
				html+='<option class="cmbsede" value="1501">LIMA METROPOLITANA</option>';
				html+='<option class="cmbsede" value="1502">LIMA PROVINCIA</option>';

				$('#dpto').html(html);
				
			}).fail(function( jqxhr, textStatus, error ) {
				var err = textStatus + ', ' + error;
				console.log( "Request Failed: " + err);
			});
		}

		function combo_prov(code){

			$.getJSON(urlRoot('index.php')+'/mapa/resultados/prov', {ccdd:code}, function(data, textStatus) {

				html ='<option value="0">TODOS</option>';

				$.each(data, function(i, datos) {
					html+='<option value="'+datos.CCPP+'">'+datos.Nombre+'</option>';
				});

				$('#prov').html(html);

			}).fail(function( jqxhr, textStatus, error ) {
				var err = textStatus + ', ' + error;
				console.log( "Request Failed: " + err);
			});
		}

		function combo_dist(dpto,prov){

			$.getJSON(urlRoot('index.php')+'/mapa/resultados/dist', {ccdd:dpto,ccpp:prov}, function(data, textStatus) {

				html ='<option value="0">TODOS</option>';

				$.each(data, function(i, datos) {
					html+='<option value="'+datos.CCDI+'">'+datos.Nombre+'</option>';
				});

				$('#dist').html(html);

			}).fail(function( jqxhr, textStatus, error ) {
				var err = textStatus + ', ' + error;
				console.log( "Request Failed: " + err);
			});
		}


		function load_kml_ft( tabla, code ) {

			capaKml.setMap(null);

			cond = ( code != 0 ) ? 'Ubigeo = ' + code : 'Ubigeo >= ' + code 

			capaKml = new google.maps.FusionTablesLayer({
				query: {
					select: "geometry",
					from: tabla,
					where: cond,
				},
				options: {
					styleId: 2,
					templateId: 2
				},
				suppressInfoWindows: true
			});
			capaKml.setMap(map);

			if ( code != 0 ){
				var queryText = "SELECT Ubigeo, geometry FROM " + tabla + " Where Ubigeo = " + code;
				var encodedQuery = encodeURIComponent(queryText);

				var query = new google.visualization.Query('http://www.google.com/fusiontables/gvizdata?tq=' + queryText);

				query.send(zoomTo);
			}else{
				zomCenter = new google.maps.LatLng(-9.817329,-69.920655);
				zom = 6;
				map.setCenter( zomCenter );
				map.setZoom( zom );
			}
			
		}

		function zoomTo(response) {
			if (!response) {
				alert('no response');
				return;
			}
			if (response.isError()) {
				alert('Error in query: ' + response.getMessage() + ' ' + response.getDetailedMessage());
				return;
			} 
			FTresponse = response;

			var kml =  FTresponse.getDataTable().getValue(0,1);
			// create a geoXml3 parser for the click handlers
			var geoXml = new geoXML3.parser({
				map: map,
				zoom: false
			});

			geoXml.parseKmlString("<Placemark>"+kml+"</Placemark>");
			geoXml.docs[0].gpolygons[0].setMap(null);
			map.fitBounds(geoXml.docs[0].gpolygons[0].bounds);
		}



		function load_data_ft( tabla ){

			if ( layer != undefined ) layer.setMap(null);

			alert(condicion);

			layer = new google.maps.FusionTablesLayer({
				query: {
					select: " * ",
					from: tabla,
					where: condicion
				},
				suppressInfoWindows: true,
				options: {
					styleId: 2
				}
			});

			layer.setMap(map);

			infowindow.close();

			google.maps.event.addListener(layer, 'click', function(e) {

				var contentString = "<div>"+
					"<div class='marker activeMarker'>"+
						"<div class='markerInfo activeInfo' style='display: block'>"+

							"<h2>LOCAL: "+e.row['codigo_de_local'].value+" - PREDIO: "+e.row['Nro_Pred'].value+"</h2>"+
							"<p><b>Departamento:</b> "+e.row['dpto_nombre'].value+"</p>"+
							"<p><b>Provincia:</b> "+e.row['prov_nombre'].value+"</p>"+
							"<p><b>Distrito:</b> "+e.row['dist_nombre'].value+"</p>"+
							"<p><b>Tipo de área:</b> "+e.row['des_area'].value+"</p>"+
							"<p class='detalle'>"+
							"<a target='_blank' href='http://webinei.inei.gob.pe/cie/2013/web/index.php/consistencia/local/"+e.row['codigo_de_local'].value+"/"+e.row['Nro_Pred'].value+"/114'>Ir a cédula censal evaluada →</a>"+
							"</p>"+

							"<h3>INSTITUCIONES EDUCATIVAS</h3>"+
							"<p>"+e.row['nombre_IE'].value+"</p>"+

							"<h3>EDIFICACIONES</h3>"+
							"<p><b>Total de edificaciones:</b> "+e.row['Tot_Ed'].value+"</p>"+
							"<p><b>Mantenimiento:</b> "+e.row['OT_1'].value+"</p>"+
							"<p><b>Reforzamiento:</b> "+e.row['OT_2'].value+"</p>"+
							"<p><b>Demolicion:</b> "+e.row['OT_3'].value+"</p>"+
							"<p class='detalle'>"+
							"<a href='#' onclick='ver_detalle(\""+e.row['codigo_de_local'].value+"\")'>Ir a detalle aulas por edificación →</a></p>"+

						"</div>"+
					"</div>"+
				"<div>";

				infowindow.setContent(contentString);
				array = e.row['LatitudLongitud'].value.split(",");
				infolatlng = new google.maps.LatLng( parseFloat(array[0]) , parseFloat(array[1]) );
				infowindow.setPosition(infolatlng);
				infowindow.open(map);

			});

			maploaded = true;
			setTimeout('checkGoogleMap()',1000);

		}

		var contenido = "";

		function ver_detalle(code){

			$.getJSON(urlRoot('index.php')+'/mapa/resultados/detalle_ot', {codigo:code}, function(data, textStatus){

				contenido = infowindow.getContent();

				var contentString2="<div><div class='marker activeMarker'>"+
					"<div class='markerInfo activeInfo' style='display: block'>"+
					"<table class='table box-header'><thead><tr><th>N° DE PREDIO</th><th>EDIFICACIÓN</th><th>N° DE AULAS</td></th></thead><tbody>";

				$.each(data, function(i, datos){
					var clase = "";
					switch (datos.P7_2_1)
					{
						case 1:
							clase ="background-color:#dff0d8;";
							break;
						case 2:
							clase ="background-color:#f2dede;";
							break;
						case 3:
							clase ="background-color:#fcf8e3;";
							break;
					}
					contentString2+="<tr><td style='"+clase+"'>"+datos.Nro_Pred+"</td><td style='"+clase+"'>E-"+datos.P5_Ed_Nro+"</td><td style='"+clase+"'>"+datos.Cant_Aula+"</td></tr>";
				});

				contentString2+="</tbody></table><p class='detalle'><a href='#' onclick='ver_atras()'>← Regresar</a></p>"+
					"</div>"+
					"</div><div>";
				infowindow.setContent(contentString2);
			});
		}

		function ver_atras(){
			infowindow.setContent(contenido);
		}

	</script>

</head>
<body>
	
	<div id="header" style="display: block;">
		<a id="logo" href="#"><img src="<?php echo base_url('img/brand_gps.png') ; ?>" alt="CIE2013"></a>
		<div id="oted">Oficina Técnica de Estadísticas Departamentales - OTED</div>
	</div>

	<div id="cuerpo" >
		<div id="msg"></div>
		<div class="map_container">
			<div id="map-canvas"></div>
		</div>

		<div class="filtro_map preguntas_sub2 span2">

			<div class="row-fluid control-group span9">
				<label class="preguntas_sub2">DEPARTAMENTO</label>
				<div class="controls span">
					<select id="dpto" class="span12">
					<!-- AJAX -->
					</select>
				</div>
			</div>

			<div id="dv_prov" class="row-fluid control-group span9">
				<label class="preguntas_sub2">PROVINCIA</label>
				<div class="controls">
					<select id="prov" class="span12">
						<option value="0">SELECCIONE...</option>
					</select>
				</div>
			</div>

			<div id="dv_dist" class="row-fluid control-group span9">
				<label class="preguntas_sub2">DISTRITO</label>
				<div class="controls">
					<select id="dist" class="span12">
						<option value="0">SELECCIONE...</option>
					</select>
				</div>
			</div>

			<div class="row-fluid control-group span9">
				<label class="preguntas_sub2">TIPO DE AREA</label>
				<div class="controls">
					<select id="area" class="span12">
						<option value="0">SELECCIONE...</option>
						<option value="0">TODOS</option>
						<option value="Urbano">URBANO</option>
						<option value="Rural">RURAL</option>
					</select>
				</div>
			</div>

			<div class="row-fluid control-group span9">
				<label class="preguntas_sub2">RESULTADO</label>
				<div class="controls">
					<select id="resultado" class="span12">
						<option value="0">SELECCIONE...</option>
						<option value="1">INFRAESTRUCTURA</option>
						<option value="2">DEFENSA CIVIL</option>
						<option value="3">ALTO RIESGO</option>
						<option value="4">PATRIMONIO CULTURAL</option>
						<option value="5">OBRAS EN EJECUCION</option>
						<option value="6">SERVICIOS</option>
						<option value="7">COMUNICACION</option>
						<option value="8">VULNERABILIDAD</option>
						<option value="9">NIVEL EDUCATIVO</option>
						<option value="10">ALGORITMO EDIFICACION</option>
						<option value="11">ALGORITMO AULAS</option>
					</select>
				</div>
			</div>

			<div id="niveledu" class="row-fluid control-group span9">
				<label class="preguntas_sub2">NIVEL EDUCATIVO</label>
				<div class="controls">
					<select id="nivel_edu" class="span12">
						<option value="0">SELECCIONE...</option>
						<option value="1">Inicial Cuna?</option>
						<option value="2">Inicial Jardin?</option>
						<option value="3">Inicial Cuna Jardin?</option>
						<option value="4">Primaria?</option>
						<option value="5">Secundaria?</option>
						<option value="6">Educación Básica Alternativa (EBA)?</option>
						<option value="7">Educación Básica Especial (EBE)?</option>
						<option value="8">Educación Superior de Formación Artística (ESFA)?</option>
						<option value="9">Instituto Superior Tecnológico (IST)?</option>
						<option value="10">Instituto Superior Pedagógico (ISP)?</option>
						<option value="11">Centro de Educación Técnico Productivo (CETPRO)?</option>
						<option value="12">Programa No Escolarizado de Educación Inicial (PRONOEI)?</option>
						<option value="13">Sala de Educación Temprana?</option>
						<option value="14">Ludoteca?</option>
					</select>
				</div>
			</div>

			<div id="optecnica" class="row-fluid control-group span9">
				<label id="lbl_optecnica" class="preguntas_sub2">OPINIÓN TÉCNICA INICIAL</label>
				<div class="controls">
					<select id="op_tecnica" class="span12">
						<option value="0">SELECCIONE...</option>
						<option value="0">TODOS</option>
						<option value="1">MANTENIMIENTO</option>
						<option value="2">REFORZAMIENTO ESTRUCTURAL</option>
						<option value="3">DEMOLICION</option>
					</select>
				</div>
			</div>

			<div id="defcivil" class="row-fluid control-group span9">
				<label class="preguntas_sub2">INSPERCCIONADA POR DEFENSA CIVIL</label>
				<div class="controls">
					<select id="def_civil" class="span12">
						<option value="0">SELECCIONE...</option>
						<option value="0">TODOS</option>
						<option value="1">SI</option>
						<option value="2">NO</option>
					</select>
				</div>
			</div>

			<div id="altriesgo" class="row-fluid control-group span9">
				<label class="preguntas_sub2">INHABITABLES EN ALTO RIESGO</label>
				<div class="controls">
					<select id="alt_riesgo" class="span12">
						<option value="0">SELECCIONE...</option>
						<option value="0">TODOS</option>
						<option value="1">SI</option>
						<option value="2">NO</option>
					</select>
				</div>
			</div>

			<div id="patricult" class="row-fluid control-group span9">
				<label class="preguntas_sub2">PATRIMONIO CULTURAL</label>
				<div class="controls">
					<select id="patri_cult" class="span12">
						<option value="0">SELECCIONE...</option>
						<option value="0">TODOS</option>
						<option value="1">SI</option>
						<option value="2">NO</option>
					</select>
				</div>
			</div>

			<div id="obrasejec" class="row-fluid control-group span9">
				<label class="preguntas_sub2">OBRAS EN EJECUCION</label>
				<div class="controls">
					<select id="obras_ejec" class="span12">
						<option value="0">SELECCIONE...</option>
						<option value="0">TODOS</option>
						<option value="1">SI</option>
						<option value="2">NO</option>
					</select>
				</div>
			</div>

			<div id="serv" class="row-fluid control-group span9">
				<label class="preguntas_sub2">SERVICIOS</label>
				<div class="controls">
					<div>
						<input type="checkbox" name="energia" id="energia"> Energía Eléctrica <br>
						<input type="checkbox" name="agua" id="agua"> Agua Potable <br>
						<input type="checkbox" name="alcantarillado" id="alcantarillado"> Alcantarillado <br>
					</div><br>
					<div>
						<input type="submit" name="btn_serv" id="btn_serv" value="Consultar" class="btn btn-primary" onclick="ini_button(1);">
					</div>
				</div>
			</div>

			<div id="comuni" class="row-fluid control-group span9">
				<label class="preguntas_sub2">COMUNICACIÓN</label>
				<div class="controls">
					<div>
						<input type="checkbox" name="tfija" id="tfija"> Telefonía Fija <br>
						<input type="checkbox" name="tmovil" id="tmovil"> Telefonía Móvil <br>
						<input type="checkbox" name="inter" id="inter"> Internet <br>
					</div><br>
					<div>
						<input type="submit" name="btn_comuni" id="btn_comuni" value="Consultar" class="btn btn-primary" onclick="ini_button(2);">
					</div>
				</div>
			</div>

			<div id="vulne" class="row-fluid control-group span9">
				<label class="preguntas_sub2">VULNERABILIDAD</label>
				<div class="controls">
					<div>
						<input type="checkbox" name="v1" id="v1"> Cercanía lecho de río, quebrada? <br>
						<input type="checkbox" name="v2" id="v2"> Cercanía a vía ferrea? <br>
						<input type="checkbox" name="v3" id="v3"> Cercanía a barranco o precipicio? <br>
						<input type="checkbox" name="v4" id="v4"> Cercanía a cuartel militar o policial? <br>
						<input type="checkbox" name="v5" id="v5"> Erosión fluvial de laderas? <br>
						<input type="checkbox" name="v6" id="v6"> Otro? <br>
						<input type="checkbox" name="v7" id="v7"> Ninguno <br>
					</div><br>
					<div>
						<input type="submit" name="btn_vulne" id="btn_vulne" value="Consultar" class="btn btn-primary" onclick="ini_button(3);">
					</div>
				</div>
			</div>

		</div>
	</div>
	
	<div id="footer">
		<div class="container-fluid">
			<div class="row-fluid">
				<div id="geo_leyenda" class="span9">
					<!-- ajax -->
				</div>
				<div id="subtitulo" class="span3">
					<!-- ajax -->
				</div>
			</div>
		</div>
	</div>

</body>
</html>