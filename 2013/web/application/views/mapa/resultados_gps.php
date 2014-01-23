<!DOCTYPE html>
<html>
<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

	<title>Resultados Georeferenciados</title>
	<meta name="viewport" content="initial-scale=1.0, user-scalable=no">
	<meta charset="utf-8">
	<script type="text/javascript" src="<?php echo base_url('js/general/jquery-1.10.2.min.js'); ?>"></script>

	<meta name="description" content="">
	<meta name="viewport" content="width=device-width">

	<link rel="stylesheet" type="text/css" href="<?php echo base_url('css/bootstrap.min.css'); ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('css/bootstrap.spacelab.css'); ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('css/bootstrap-responsive.min.css'); ?>">
	<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Open+Sans">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('css/maps.css'); ?>">

	<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false"></script>
	<script type="text/javascript" src="<?php echo base_url('js/map/markerwithlabel.js'); ?>"></script>
	<script type="text/javascript" src="<?php echo base_url('js/general/basic.js'); ?>"></script>

	<script type="text/javascript">
		var kmlArray = [];

		var gmarkers = [];
		var map = null;
		var category = "";

		var infowindow = new google.maps.InfoWindow({
			size: new google.maps.Size(300,400)
		});

		// A function to create the marker and set up the event window
		function createMarkerLEN(latlng,name,html,category,icon,tiporesul) {
			var contentString = html;
			var color = null;
			var myCoordsLenght = 6;

			if (tiporesul == 1)
			{
				switch (icon)
				{
					case '1':
						color=urlRoot('web/')+'img/infra/ot1.png';
						break;
					case '2':
						color=urlRoot('web/')+'img/infra/ot2.png';
						break;
					case '3':
						color=urlRoot('web/')+'img/infra/ot3.png';
						break;
				}
			}else if (tiporesul > 1 && tiporesul <= 5){
				switch (icon)
				{
					case '1':
						color=urlRoot('web/')+'img/infra/resul_si.png';
						break;
					case '2':
						color=urlRoot('web/')+'img/infra/resul_no.png';
						break;
				}
			}
			

			var marker = new MarkerWithLabel({
			draggable: false,
			raiseOnDrag: false,
			position: latlng,
			map: map,
			icon: color,
			title: name,
			zIndex: Math.round(latlng.lat()*-100000)<<5,
			// labelContent: texto,
			// labelAnchor: new google.maps.Point(22, 0),
			// labelClass: "glabels", // the CSS class for the label
			// labelStyle: {opacity: 0.75}
			});
		
		// === Store the category and name info as a marker properties ===
			marker.mycategory = category;
			marker.myname = name;

			gmarkers.push(marker);

			google.maps.event.addListener(marker, 'click', function() {
				infowindow.setContent(contentString);
				infowindow.open(map,marker);
			});

			// google.maps.event.addListener(marker, 'dragend', function(evt){
			// 	document.getElementById('latitud').value = evt.latLng.lat().toFixed(myCoordsLenght);
			// 	document.getElementById('longitud').value = evt.latLng.lng().toFixed(myCoordsLenght);
			// 	$('#edit_gps').slideDown(200);
			// });
		}

		function initialize() {
			var myOptions = {
			zoom: 6,
			center: new google.maps.LatLng(-7.1663,-71.455078),
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

			google.maps.event.addListener(map, 'click', function() {
				infowindow.close();
			});

			          
			<?php $urlKml = 'http://webinei.inei.gob.pe/cie/2013/web/'; ?>
			var kmlPeru = '<?php echo $urlKml.'kml/peru.kml'; ?>';
			// var kmlPeru = 'http://www.uxglass.com/kml/demo.kml';
			// http://www.uxglass.com/lenguas/departamento/


			kmlPeruLayer = new google.maps.KmlLayer ( kmlPeru, {preserveViewport:true});
			kmlArray.push({cd:'0', nomkml:kmlPeruLayer, lat:-7.1663, lng:-71.455078, zm:6});
			kmlArray[0].nomkml.setMap(map);

			// KML MAPS LAYERS
			var kmlAmazonas = '<?php echo $urlKml.'kml/amazonas.kml'; ?>';
			kmlAmazonasLayer = new google.maps.KmlLayer ( kmlAmazonas, {preserveViewport:true});
			kmlArray.push({cd:'01', nomkml:kmlAmazonasLayer, lat:-5.06036873877975, lng:-78.056629714081, zm:8});

			var kmlAncash = '<?php echo $urlKml.'kml/ancash.kml'; ?>';
			kmlAncashLayer = new google.maps.KmlLayer ( kmlAncash, {preserveViewport:true});       
			kmlArray.push({cd:'02', nomkml:kmlAncashLayer, lat:-9.40575405924352, lng:-77.6734802079553, zm:9});

			var kmlApurimac = '<?php echo $urlKml.'kml/apurimac.kml'; ?>';
			kmlApurimacLayer = new google.maps.KmlLayer ( kmlApurimac, {preserveViewport:true});
			kmlArray.push({cd:'03', nomkml:kmlApurimacLayer, lat:-14.030814122799, lng:-72.9736536493109, zm:9});

			var kmlArequipa = '<?php echo $urlKml.'kml/arequipa.kml'; ?>';
			kmlArequipaLayer = new google.maps.KmlLayer ( kmlArequipa, {preserveViewport:true});
			kmlArray.push({cd:'04', nomkml:kmlArequipaLayer, lat:-15.8418343150547, lng:-72.4808283366732, zm:8});

			var kmlAyacucho = '<?php echo $urlKml.'kml/ayacucho.kml'; ?>';
			kmlAyacuchoLayer = new google.maps.KmlLayer ( kmlAyacucho, {preserveViewport:true});
			kmlArray.push({cd:'05', nomkml:kmlAyacuchoLayer, lat:-14.0892883309093, lng:-74.075890651585, zm:8});

			var kmlCajamarca = '<?php echo $urlKml.'kml/cajamarca.kml'; ?>';
			kmlCajamarcaLayer = new google.maps.KmlLayer ( kmlCajamarca, {preserveViewport:true});
			kmlArray.push({cd:'06', nomkml:kmlCajamarcaLayer, lat:-6.43276922845617, lng:-78.7435054751844, zm:8});

			var kmlCallao = '<?php echo $urlKml.'kml/callao.kml'; ?>';
			kmlCallaoLayer = new google.maps.KmlLayer ( kmlCallao, {preserveViewport:true});
			kmlArray.push({cd:'07', nomkml:kmlCallaoLayer, lat:-11.955555624777, lng:-77.1416258913623, zm:12});

			var kmlCusco = '<?php echo $urlKml.'kml/cusco.kml'; ?>';
			kmlCuscoLayer = new google.maps.KmlLayer ( kmlCusco, {preserveViewport:true});
			kmlArray.push({cd:'08', nomkml:kmlCuscoLayer, lat:-13.2000014858382, lng:-72.1637731157334, zm:9});

			var kmlHuancavelica = '<?php echo $urlKml.'kml/huancavelica.kml'; ?>';
			kmlHuancavelicaLayer = new google.maps.KmlLayer ( kmlHuancavelica, {preserveViewport:true});
			kmlArray.push({cd:'09', nomkml:kmlHuancavelicaLayer, lat:-13.0287170903714, lng:-75.0036723168008, zm:9});

			var kmlHuanuco = '<?php echo $urlKml.'kml/huanuco.kml'; ?>';
			kmlHuanucoLayer = new google.maps.KmlLayer ( kmlHuanuco, {preserveViewport:true});
			kmlArray.push({cd:'10', nomkml:kmlHuanucoLayer, lat:-9.41976048562642, lng:-76.0330524961483, zm:9});

			var kmlIca = '<?php echo $urlKml.'kml/ica.kml'; ?>';
			kmlIcaLayer = new google.maps.KmlLayer ( kmlIca, {preserveViewport:true});
			kmlArray.push({cd:'11', nomkml:kmlIcaLayer, lat:-14.2334842159937, lng:-75.5735306802363, zm:9});

			var kmlJunin = '<?php echo $urlKml.'kml/junin.kml'; ?>';
			kmlJuninLayer = new google.maps.KmlLayer ( kmlJunin, {preserveViewport:true});
			kmlArray.push({cd:'12', nomkml:kmlJuninLayer, lat:-11.5436597300396, lng:-74.8749510303952, zm:8});

			var kmlLibertad = '<?php echo $urlKml.'kml/libertad.kml'; ?>'
			kmlLibertadLayer = new google.maps.KmlLayer ( kmlLibertad, {preserveViewport:true});
			kmlArray.push({cd:'13', nomkml:kmlLibertadLayer, lat:-7.9169754349312, lng:-78.3810111865851, zm:8});

			var kmlLambayeque = '<?php echo $urlKml.'kml/lambayeque.kml'; ?>'
			kmlLambayequeLayer = new google.maps.KmlLayer ( kmlLambayeque, {preserveViewport:true});
			kmlArray.push({cd:'14', nomkml:kmlLambayequeLayer, lat:-6.36380361377563, lng:-79.8249923276084, zm:8});

			var kmlLima = '<?php echo $urlKml.'kml/lima.kml'; ?>';
			kmlLimaLayer = new google.maps.KmlLayer ( kmlLima, {preserveViewport:true});
			kmlArray.push({cd:'15', nomkml:kmlLimaLayer, lat:-11.7866731456649, lng:-76.6324097107669, zm:8});

			var kmlLoreto = '<?php echo $urlKml.'kml/loreto.kml'; ?>';
			kmlLoretoLayer = new google.maps.KmlLayer ( kmlLoreto, {preserveViewport:true});
			kmlArray.push({cd:'16', nomkml:kmlLoretoLayer, lat:-4.12302517090165, lng:-74.4265053944273, zm:7});

			var kmlMadre = '<?php echo $urlKml.'kml/madre.kml'; ?>';
			kmlMadreLayer = new google.maps.KmlLayer ( kmlMadre, {preserveViewport:true});
			kmlArray.push({cd:'17', nomkml:kmlMadreLayer, lat:-11.9781015474597, lng:-70.5450541729619, zm:9});

			var kmlMoquegua = '<?php echo $urlKml.'kml/moquegua.kml'; ?>';
			kmlMoqueguaLayer = new google.maps.KmlLayer ( kmlMoquegua, {preserveViewport:true});
			kmlArray.push({cd:'18', nomkml:kmlMoqueguaLayer, lat:-16.8651923223222, lng:-70.8510673506577, zm:8});

			var kmlPasco = '<?php echo $urlKml.'kml/pasco.kml'; ?>';
			kmlPascoLayer = new google.maps.KmlLayer ( kmlPasco, {preserveViewport:true});
			kmlArray.push({cd:'19', nomkml:kmlPascoLayer, lat:-10.4033365152324, lng:-75.3099258151342, zm:9});

			var kmlPiura = '<?php echo $urlKml.'kml/piura.kml'; ?>';
			kmlPiuraLayer = new google.maps.KmlLayer ( kmlPiura, {preserveViewport:true});
			kmlArray.push({cd:'20', nomkml:kmlPiuraLayer, lat:-5.12938480280296, lng:-80.3297169479797, zm:8});  

			var kmlPuno = '<?php echo $urlKml.'kml/puno.kml'; ?>';
			kmlPunoLayer = new google.maps.KmlLayer ( kmlPuno, {preserveViewport:true});
			kmlArray.push({cd:'21', nomkml:kmlPunoLayer, lat:-14.9320741925803, lng:-69.9489916069943, zm:8});

			var kmlMartin = '<?php echo $urlKml.'kml/martin.kml'; ?>';
			kmlMartinLayer = new google.maps.KmlLayer ( kmlMartin, {preserveViewport:true});
			kmlArray.push({cd:'22', nomkml:kmlMartinLayer, lat:-7.03440262104589, lng:-76.7157680323349, zm:9});

			var kmlTacna = '<?php echo $urlKml.'kml/tacna.kml'; ?>';
			kmlTacnaLayer = new google.maps.KmlLayer ( kmlTacna, {preserveViewport:true});
			kmlArray.push({cd:'23', nomkml:kmlTacnaLayer, lat:-17.6416549925828, lng:-70.2785118500858, zm:8});

			var kmlTumbes = '<?php echo $urlKml.'kml/tumbes.kml'; ?>';
			kmlTumbesLayer = new google.maps.KmlLayer ( kmlTumbes, {preserveViewport:true});
			kmlArray.push({cd:'24', nomkml:kmlTumbesLayer, lat:-3.85033718439041, lng:-80.541902047432, zm:9});

			var kmlUcayali = '<?php echo $urlKml.'kml/ucayali.kml'; ?>';
			kmlUcayaliLayer = new google.maps.KmlLayer ( kmlUcayali, {preserveViewport:true});
			kmlArray.push({cd:'25', nomkml:kmlUcayaliLayer, lat:-9.61980385850328, lng:-73.4371206808515, zm:8});

			var kmlLimaMetro = '<?php echo $urlKml.'kml/limametro.kml'; ?>';
			kmlLimaMetroLayer = new google.maps.KmlLayer ( kmlLimaMetro, {preserveViewport:true});
			kmlArray.push({cd:'1501', nomkml:kmlLimaMetroLayer, lat:-11.7866731456649, lng:-76.6324097107669, zm:8});

			var kmlLimaProv = '<?php echo $urlKml.'kml/limaprov.kml'; ?>';
			kmlLimaProvLayer = new google.maps.KmlLayer ( kmlLimaProv, {preserveViewport:true});
			kmlArray.push({cd:'1502', nomkml:kmlLimaProvLayer, lat:-11.7866731456649, lng:-76.6324097107669, zm:8});
		}

	</script>
	<script type="text/javascript">
		$(document).ready(function () {
			
			initialize();

			combo_dpto();
			ocultar_cmb();

			$('#NOM_PROV').attr('disabled', true);
			$('#NOM_DIST').attr('disabled', true);

			$('#NOM_AREA').change(function(event) {
				clean_map();
				$('#RESULTADO').val(0);
				$('#RESULTADO').trigger('change');
				$('#OP_TECNICA').val(0);
			});

			$('#RESULTADO').change(function(event) {
				var html_leyenda = '';
				var html_subtitulo = '';
				clean_map();
				ocultar_cmb();

				switch( $(this).val() )
				{
					case '1':
						$('#infra').show();
						$('#OP_TECNICA').val(0);
						html_leyenda = '<p>LEYENDA:  <img src="<?php echo base_url('img/infra/ot1.png') ; ?>" />  Mantenimiento, <img src="<?php echo base_url('img/infra/ot2.png') ; ?>" /> Rehabilitación, <img src="<?php echo base_url('img/infra/ot3.png') ; ?>" />Demolición</p>';
						html_subtitulo = '<p class="pull-right">OPINIÓN TÉCNICA INICIAL</p>';
						break;
					case '2':
						$('#def').show();
						$('#DEF_CIVIL').val(0);
						html_leyenda = '<p>LEYENDA: </p>';
						html_subtitulo = '<p class="pull-right">INSPERCCIONADA POR DEFENSA CIVIL</p>';
						break;
					case '3':
						$('#altriesg').show();
						$('#ALT_RIESGO').val(0);
						html_leyenda = '<p>LEYENDA: </p>';
						html_subtitulo = '<p class="pull-right">INHABITABLES EN ALTO RIESGO</p>';
						break;
					case '4':
						$('#patcult').show();
						$('#PAT_CULT').val(0);
						html_leyenda = '<p>LEYENDA: </p>';
						html_subtitulo = '<p class="pull-right">PATRIMONIO CULTURAL</p>';
						break;
					case '5':
						$('#obejec').show();
						$('#OBR_EJEC').val(0);
						html_leyenda = '<p>LEYENDA: </p>';
						html_subtitulo = '<p class="pull-right">OBRAS EN EJECUCION</p>';
						break;
				}

				$('#geo_leyenda').html(html_leyenda);
				$('#subtitulo').html(html_subtitulo);
			});


			$('#OP_TECNICA').change(function(event) {
				OpinionTecnica($('#NOM_DPTO').val(),$('#NOM_PROV').val(),$('#NOM_DIST').val(),$('#NOM_AREA').val(),$('#OP_TECNICA').val());
			});

			$('#DEF_CIVIL').change(function(event) {
				DefensaCivil($('#NOM_DPTO').val(),$('#NOM_PROV').val(),$('#NOM_DIST').val(),$('#NOM_AREA').val(),$('#DEF_CIVIL').val());
			});

			$('#ALT_RIESGO').change(function(event) {
				AltoRiesgo($('#NOM_DPTO').val(),$('#NOM_PROV').val(),$('#NOM_DIST').val(),$('#NOM_AREA').val(),$('#ALT_RIESGO').val());
			});

			$('#PAT_CULT').change(function(event) {
				PatrimonioCultural($('#NOM_DPTO').val(),$('#NOM_PROV').val(),$('#NOM_DIST').val(),$('#NOM_AREA').val(),$('#PAT_CULT').val());
			});

			$('#OBR_EJEC').change(function(event) {
				ObrasEjecucion($('#NOM_DPTO').val(),$('#NOM_PROV').val(),$('#NOM_DIST').val(),$('#NOM_AREA').val(),$('#OBR_EJEC').val());
			});
		});

		function ocultar_cmb () {
			$('#infra').hide();
			$('#def').hide();
			$('#altriesg').hide();
			$('#patcult').hide();
			$('#obejec').hide();
		}

		function kml_dpto(code){

			for (var i = 0; i < kmlArray.length; i++) {

				kmlArray[i].nomkml.setMap(null);

				if (kmlArray[i].cd == code){
					kmlArray[i].nomkml.setMap(map);
					map.setCenter(new google.maps.LatLng(kmlArray[i].lat,kmlArray[i].lng));
					map.setZoom(kmlArray[i].zm);
				}
			}
		}

		function combo_dpto(){

			$.getJSON(urlRoot('index.php')+'/mapa/resultados/dpto', {}, function(data, textStatus) {

				var html='<option value="0">SELECCIONE...</option>';
				html+='<option class="cmbsede" value="0">TODOS</option>';

				$.each(data, function(i, datos) {
					html+='<option class="cmbsede" value="'+datos.CCDD+'">'+datos.Nombre+'</option>';
				});
				html+='<option class="cmbsede" value="1501">LIMA METROPOLITANA</option>';
				html+='<option class="cmbsede" value="1502">LIMA PROVINCIA</option>';

				$('#NOM_DPTO').html(html);
				$('#NOM_DPTO').change(function(event){

					if ($(this).val() != '1501' && $(this).val() != '1502')
					{
						combo_prov($(this).val());
						$('#dv_prov').show();
						$('#dv_dist').show();
					}else{
						$('#dv_prov').hide();
						$('#dv_dist').hide();
					}

					kml_dpto($(this).val());
					clean_map();

					$('#NOM_PROV').attr('disabled', false);
					$('#NOM_DIST').val(0);
					$('#NOM_DIST').attr('disabled', true);
					$('#NOM_AREA').val(0);
					$('#RESULTADO').val(0);
					$('#RESULTADO').trigger('change');
					$('#OP_TECNICA').val(0);
				});
			
			}).fail(function( jqxhr, textStatus, error ) {
				var err = textStatus + ', ' + error;
				console.log( "Request Failed: " + err);
			});
		}
		   

		function combo_prov(code){

			$.getJSON(urlRoot('index.php')+'/mapa/resultados/prov', {ccdd:code}, function(data, textStatus) {

				var html='<option value="0">SELECCIONE...</option>';
				html+='<option value="0">TODOS</option>';

				$.each(data, function(i, datos) {
					html+='<option value="'+datos.CCPP+'">'+datos.Nombre+'</option>';
				});

				$('#NOM_PROV').html(html);

				$('#NOM_PROV').change(function(event) {
					clean_map();
					combo_dist( $('#NOM_DPTO').val(), $(this).val() );
					$('#NOM_DIST').attr('disabled', false);
					$('#NOM_AREA').val(0);
					$('#RESULTADO').val(0);
					$('#RESULTADO').trigger('change');
					$('#OP_TECNICA').val(0);
				});

			}).fail(function( jqxhr, textStatus, error ) {
				var err = textStatus + ', ' + error;
				console.log( "Request Failed: " + err);
			});
		}


		function combo_dist(dpto,prov){

			$.getJSON(urlRoot('index.php')+'/mapa/resultados/dist', {ccdd:dpto,ccpp:prov}, function(data, textStatus) {

				var html='<option value="0">SELECCIONE...</option>';
				html+='<option value="0">TODOS</option>';

				$.each(data, function(i, datos) {
					html+='<option value="'+datos.CCDI+'">'+datos.Nombre+'</option>';
				});

				$('#NOM_DIST').html(html);

				$('#NOM_DIST').change(function(event) {
					clean_map();
					$('#NOM_AREA').val(0);
					$('#RESULTADO').val(0);
					$('#RESULTADO').trigger('change');
					$('#OP_TECNICA').val(0);
				});

			}).fail(function( jqxhr, textStatus, error ) {
				var err = textStatus + ', ' + error;
				console.log( "Request Failed: " + err);
			});
		}


		function OpinionTecnica(departamento,provincia,distrito,tipoarea,opinion){

			$.getJSON(urlRoot('index.php')+'/mapa/resultados/opinion_tecnica', {dpto:departamento,prov:provincia,dist:distrito,area:tipoarea,opt:opinion}, function(json_data, textStatus) {

				clean_map();

				$.each(json_data, function(i, datos){

					var contentString="<div><div class='marker activeMarker'>"+
						"<div class='markerInfo activeInfo' style='display: block'>"+
						"<h2>LOCAL: "+datos.codigo_de_local+" - PREDIO: "+datos.Nro_Pred+"</h2>"+
						"<p><b>Departamento:</b> "+datos.dpto_nombre.trim()+"</p>"+
						"<p><b>Provincia:</b> "+datos.prov_nombre+"</p>"+
						"<p><b>Distrito:</b> "+datos.dist_nombre+"</p>"+
						"<p><b>Tipo de área:</b> "+datos.des_area+"</p>"+
						"<p class='detalle'><a target='_blank' href='http://webinei.inei.gob.pe/cie/2013/web/index.php/consistencia/local/"+datos.codigo_de_local+"/"+datos.Nro_Pred+"/1'>Ir a cédula censal evaluada →</a></p>"+

						"<h3>INSTITUCIONES EDUCATIVAS</h3>"+
						"<p>"+datos.nombres_IIEE+"</p>"+

						"<h3>EDIFICACIONES</h3>"+
						"<p><b>Total de edificaciones:</b> "+datos.Tot_Ed+"</p>"+
						"<p><b>Mantenimiento:</b> "+datos.OT_1+"</p>"+
						"<p><b>Reforzamiento:</b> "+datos.OT_2+"</p>"+
						"<p><b>Demolicion:</b> "+datos.OT_3+"</p>"+
						"<p class='detalle'><a href='#' onclick='ver_detalle(\""+datos.codigo_de_local+"\")'>Ir a detalle aulas por edificación →</a></p>"+
						"</div>"+
						"</div><div>";

					var point = new google.maps.LatLng(datos.UltP_Latitud,datos.UltP_Longitud);
					var marker = createMarkerLEN(point, datos.codigo_de_local, contentString,'punto', datos.R_OT, 1);
				});
			});
		}

		function DefensaCivil(departamento,provincia,distrito,tipoarea,defecivil){

			$.getJSON(urlRoot('index.php')+'/mapa/resultados/defensa_civil', {dpto:departamento,prov:provincia,dist:distrito,area:tipoarea,df:defecivil}, function(json_data, textStatus) {

				clean_map();

				$.each(json_data, function(i, datos){

					var contentString="<div><div class='marker activeMarker'>"+
						"<div class='markerInfo activeInfo' style='display: block'>"+
						"<h2>LOCAL: "+datos.codigo_de_local+" - PREDIO: "+datos.Nro_Pred+"</h2>"+
						"<p><b>Departamento:</b> "+datos.dpto_nombre.trim()+"</p>"+
						"<p><b>Provincia:</b> "+datos.prov_nombre+"</p>"+
						"<p><b>Distrito:</b> "+datos.dist_nombre+"</p>"+
						"<p><b>Tipo de área:</b> "+datos.des_area+"</p>"+
						"<p class='detalle'><a target='_blank' href='http://webinei.inei.gob.pe/cie/2013/web/index.php/consistencia/local/"+datos.codigo_de_local+"/"+datos.Nro_Pred+"/1'>Ir a cédula censal evaluada →</a></p>"+

						"<h3>INSTITUCIONES EDUCATIVAS</h3>"+
						"<p>"+datos.nombres_IIEE+"</p>"+

						"<h3>INSPECCIONADAS POR DEFENSA CIVIL</h3>"+
						"<p><b>Total de edificaciones:</b> "+datos.Tot_Ed+"</p>"+
						"<p><b>Si:</b> "+datos.DC+"</p>"+
						"<p><b>No:</b> "+datos.NDC+"</p>"+
						// "<p class='detalle'><a href='#' onclick='ver_detalle(\""+datos.codigo_de_local+"\")'>Ir a detalle aulas por edificación →</a></p>"+
						"</div>"+
						"</div><div>";

					var point = new google.maps.LatLng(datos.UltP_Latitud,datos.UltP_Longitud);
					var marker = createMarkerLEN(point, datos.codigo_de_local, contentString,'punto', datos.R_DC, 2);
				});
			});
		}

		function AltoRiesgo(departamento,provincia,distrito,tipoarea,altriesg){

			$.getJSON(urlRoot('index.php')+'/mapa/resultados/alto_riesgo', {dpto:departamento,prov:provincia,dist:distrito,area:tipoarea,ar:altriesg}, function(json_data, textStatus) {

				clean_map();

				$.each(json_data, function(i, datos){

					var contentString="<div><div class='marker activeMarker'>"+
						"<div class='markerInfo activeInfo' style='display: block'>"+
						"<h2>LOCAL: "+datos.codigo_de_local+" - PREDIO: "+datos.Nro_Pred+"</h2>"+
						"<p><b>Departamento:</b> "+datos.dpto_nombre.trim()+"</p>"+
						"<p><b>Provincia:</b> "+datos.prov_nombre+"</p>"+
						"<p><b>Distrito:</b> "+datos.dist_nombre+"</p>"+
						"<p><b>Tipo de área:</b> "+datos.des_area+"</p>"+
						"<p class='detalle'><a target='_blank' href='http://webinei.inei.gob.pe/cie/2013/web/index.php/consistencia/local/"+datos.codigo_de_local+"/"+datos.Nro_Pred+"/1'>Ir a cédula censal evaluada →</a></p>"+

						"<h3>INSTITUCIONES EDUCATIVAS</h3>"+
						"<p>"+datos.nombres_IIEE+"</p>"+

						"<h3>INHABITABLES EN ALTO RIESGO</h3>"+
						"<p><b>Total de edificaciones:</b> "+datos.Tot_Ed+"</p>"+
						"<p><b>Si:</b> "+datos.AR+"</p>"+
						"<p><b>No:</b> "+datos.NAR+"</p>"+
						// "<p class='detalle'><a href='#' onclick='ver_detalle(\""+datos.codigo_de_local+"\")'>Ir a detalle aulas por edificación →</a></p>"+
						"</div>"+
						"</div><div>";

					var point = new google.maps.LatLng(datos.UltP_Latitud,datos.UltP_Longitud);
					var marker = createMarkerLEN(point, datos.codigo_de_local, contentString,'punto', datos.R_AR, 3);
				});
			});
		}


		function PatrimonioCultural(departamento,provincia,distrito,tipoarea,patricult){

			$.getJSON(urlRoot('index.php')+'/mapa/resultados/patrimonio_cultural', {dpto:departamento,prov:provincia,dist:distrito,area:tipoarea,pc:patricult}, function(json_data, textStatus) {

				clean_map();

				$.each(json_data, function(i, datos){

					var contentString="<div><div class='marker activeMarker'>"+
						"<div class='markerInfo activeInfo' style='display: block'>"+
						"<h2>LOCAL: "+datos.codigo_de_local+" - PREDIO: "+datos.Nro_Pred+"</h2>"+
						"<p><b>Departamento:</b> "+datos.dpto_nombre.trim()+"</p>"+
						"<p><b>Provincia:</b> "+datos.prov_nombre+"</p>"+
						"<p><b>Distrito:</b> "+datos.dist_nombre+"</p>"+
						"<p><b>Tipo de área:</b> "+datos.des_area+"</p>"+
						"<p class='detalle'><a target='_blank' href='http://webinei.inei.gob.pe/cie/2013/web/index.php/consistencia/local/"+datos.codigo_de_local+"/"+datos.Nro_Pred+"/1'>Ir a cédula censal evaluada →</a></p>"+

						"<h3>INSTITUCIONES EDUCATIVAS</h3>"+
						"<p>"+datos.nombres_IIEE+"</p>"+

						"<h3>PATRIMONIO CULTURAL DEL INMUEBLE</h3>"+
						"<p><b>Total de edificaciones:</b> "+datos.Tot_Ed+"</p>"+
						"<p><b>Si:</b> "+datos.PC+"</p>"+
						"<p><b>No:</b> "+datos.NPC+"</p>"+
						// "<p class='detalle'><a href='#' onclick='ver_detalle(\""+datos.codigo_de_local+"\")'>Ir a detalle aulas por edificación →</a></p>"+
						"</div>"+
						"</div><div>";

					var point = new google.maps.LatLng(datos.UltP_Latitud,datos.UltP_Longitud);
					var marker = createMarkerLEN(point, datos.codigo_de_local, contentString,'punto', datos.R_PC, 4);
				});
			});
		}

		function ObrasEjecucion(departamento,provincia,distrito,tipoarea,obejec){

			$.getJSON(urlRoot('index.php')+'/mapa/resultados/obras_ejecucion', {dpto:departamento,prov:provincia,dist:distrito,area:tipoarea,oj:obejec}, function(json_data, textStatus) {

				clean_map();

				$.each(json_data, function(i, datos){

					var contentString="<div><div class='marker activeMarker'>"+
						"<div class='markerInfo activeInfo' style='display: block'>"+
						"<h2>LOCAL: "+datos.codigo_de_local+" - PREDIO: "+datos.Nro_Pred+"</h2>"+
						"<p><b>Departamento:</b> "+datos.dpto_nombre.trim()+"</p>"+
						"<p><b>Provincia:</b> "+datos.prov_nombre+"</p>"+
						"<p><b>Distrito:</b> "+datos.dist_nombre+"</p>"+
						"<p><b>Tipo de área:</b> "+datos.des_area+"</p>"+
						"<p class='detalle'><a target='_blank' href='http://webinei.inei.gob.pe/cie/2013/web/index.php/consistencia/local/"+datos.codigo_de_local+"/"+datos.Nro_Pred+"/1'>Ir a cédula censal evaluada →</a></p>"+

						"<h3>INSTITUCIONES EDUCATIVAS</h3>"+
						"<p>"+datos.nombres_IIEE+"</p>"+

						"<h3>OBRAS EN EJECUCION</h3>"+
						"<p><b>Total de edificaciones:</b> "+datos.Tot_Ed+"</p>"+
						"<p><b>Si:</b> "+datos.OB+"</p>"+
						"<p><b>No:</b> "+datos.NOB+"</p>"+
						// "<p class='detalle'><a href='#' onclick='ver_detalle(\""+datos.codigo_de_local+"\")'>Ir a detalle aulas por edificación →</a></p>"+
						"</div>"+
						"</div><div>";

					var point = new google.maps.LatLng(datos.UltP_Latitud,datos.UltP_Longitud);
					var marker = createMarkerLEN(point, datos.codigo_de_local, contentString,'punto', datos.R_OB, 5);
				});
			});
		}



		function clean_map () {
			for (var i=0; i<gmarkers.length; i++) {
				if (gmarkers[i].mycategory == 'punto') {
					gmarkers[i].setVisible(false);
				}
			}
			infowindow.close();
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

	<div class="map_container">
		<div id="map-canvas"></div>
	</div>

	<div id="header" style="display: block;">
		<a id="logo" href="#"><img src="<?php echo base_url('img/brand_gps.png') ; ?>" alt="CIE2013"></a>
		<div id="oted">Oficina Técnica de Estadísticas Departamentales - OTED</div>
	</div>

	<div class="filtro_map preguntas_sub2 span2">
		<div class="row-fluid control-group span9">
			<label class="preguntas_sub2" for="NOM_DPTO">DEPARTAMENTO</label>
			<div class="controls span">
				<select id="NOM_DPTO" class="span12" name="NOM_DPTO">
				<!-- AJAX -->
				</select>
			</div>
		</div>

		<div id="dv_prov" class="row-fluid control-group span9">
			<label class="preguntas_sub2" for="NOM_PROV">PROVINCIA</label>
			<div class="controls">
				<select id="NOM_PROV" class="span12" name="NOM_PROV">
					<option value="0">SELECCIONE...</option>
				</select>
			</div>
		</div>

		<div id="dv_dist" class="row-fluid control-group span9">
			<label class="preguntas_sub2" for="NOM_DIST">DISTRITO</label>
			<div class="controls">
				<select id="NOM_DIST" class="span12" name="NOM_DIST">
					<option value="0">SELECCIONE...</option>
				</select>
			</div>
		</div>

		<div class="row-fluid control-group span9">
			<label class="preguntas_sub2" for="NOM_AREA">TIPO DE AREA</label>
			<div class="controls">
				<select id="NOM_AREA" class="span12" name="NOM_AREA">
					<option value="0">SELECCIONE...</option>
					<option value="0">TODOS</option>
					<option value="URBANO">URBANO</option>
					<option value="RURAL">RURAL</option>
				</select>
			</div>
		</div>

		<div class="row-fluid control-group span9">
			<label class="preguntas_sub2" for="RESULTADO">RESULTADO</label>
			<div class="controls">
				<select id="RESULTADO" class="span12" name="RESULTADO">
					<option value="0">SELECCIONE...</option>
					<option value="1">INFRAESTRUCTURA</option>
					<option value="2">DEFENSA CIVIL</option>
					<option value="3">ALTO RIESGO</option>
					<option value="4">PATRIMONIO CULTURAL</option>
					<option value="5">OBRAS EN EJECUCION</option>
				</select>
			</div>
		</div>

		<div id="infra" class="row-fluid control-group span9">
			<label class="preguntas_sub2" for="OP_TECNICA">OPINIÓN TÉCNICA INICIAL</label>
			<div class="controls">
				<select id="OP_TECNICA" class="span12" name="OP_TECNICA">
					<option value="0">SELECCIONE...</option>
					<option value="0">TODOS</option>
					<option value="1">MANTENIMIENTO</option>
					<option value="2">REFORZAMIENTO ESTRUCTURAL</option>
					<option value="3">DEMOLICION</option>
				</select>
			</div>
		</div>

		<div id="def" class="row-fluid control-group span9">
			<label class="preguntas_sub2" for="DEF_CIVIL">INSPERCCIONADA POR DEFENSA CIVIL</label>
			<div class="controls">
				<select id="DEF_CIVIL" class="span12" name="DEF_CIVIL">
					<option value="0">SELECCIONE...</option>
					<option value="0">TODOS</option>
					<option value="1">SI</option>
					<option value="2">NO</option>
				</select>
			</div>
		</div>

		<div id="altriesg" class="row-fluid control-group span9">
			<label class="preguntas_sub2" for="ALT_RIESGO">INHABITABLES EN ALTO RIESGO</label>
			<div class="controls">
				<select id="ALT_RIESGO" class="span12" name="ALT_RIESGO">
					<option value="0">SELECCIONE...</option>
					<option value="0">TODOS</option>
					<option value="1">SI</option>
					<option value="2">NO</option>
				</select>
			</div>
		</div>

		<div id="patcult" class="row-fluid control-group span9">
			<label class="preguntas_sub2" for="PAT_CULT">PATRIMONIO CULTURAL</label>
			<div class="controls">
				<select id="PAT_CULT" class="span12" name="PAT_CULT">
					<option value="0">SELECCIONE...</option>
					<option value="0">TODOS</option>
					<option value="1">SI</option>
					<option value="2">NO</option>
				</select>
			</div>
		</div>

		<div id="obejec" class="row-fluid control-group span9">
			<label class="preguntas_sub2" for="OBR_EJEC">OBRAS EN EJECUCION</label>
			<div class="controls">
				<select id="OBR_EJEC" class="span12" name="OBR_EJEC">
					<option value="0">SELECCIONE...</option>
					<option value="0">TODOS</option>
					<option value="1">SI</option>
					<option value="2">NO</option>
				</select>
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
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-47317828-1', 'inei.gob.pe');
  ga('send', 'pageview');

</script>