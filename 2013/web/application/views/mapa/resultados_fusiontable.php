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
	<!-- <script type="text/javascript" src="<?php #echo base_url('js/map/markerclusterer.js'); ?>"></script>-->
	<script type="text/javascript" src="<?php echo base_url('js/general/basic.js'); ?>"></script>

	<script type="text/javascript">
		var kmlArray = [];
		var layer = new google.maps.FusionTablesLayer();
		// var markerCluster = null;
		// var markers = [];

		var gmarkers = [];
		var map = null;
		var category = "";

		var infowindow = new google.maps.InfoWindow({
			size: new google.maps.Size(300,400)
		});

		var maploaded = false;

		var ot1 = 0;
		var ot2 = 0;
		var ot3 = 0;

		var r1 = 0;
		var r2 = 0;

		var op1 = 0;
		var op2 = 0;
		var op3 = 0;
		var op4 = 0;
		var op5 = 0;
		var op6 = 0;
		var op7 = 0;

		// A function to create the marker and set up the event window
		function createMarkerLEN(latlng,name,html,category,icon,tiporesul) {
			var contentString = html;
			var color = null;
			var myCoordsLenght = 6;

			color = urlRoot('web/')+'img/infra/default.png';

			if (tiporesul == 1 || (tiporesul >= 9 && tiporesul <= 11))
			{
				switch (icon)
				{
					case 1:
						color=urlRoot('web/')+'img/infra/ot1.png';
						ot1++;
						break;
					case 2:
						color=urlRoot('web/')+'img/infra/ot2.png';
						ot2++;
						break;
					case 3:
						color=urlRoot('web/')+'img/infra/ot3.png';
						ot3++;
						break;
				}
			}else if (tiporesul > 1 && tiporesul <= 5){
				switch (icon)
				{
					case '1':
						color=urlRoot('web/')+'img/infra/resul_si.png';
						r1++;
						break;
					case '2':
						color=urlRoot('web/')+'img/infra/resul_no.png';
						r2++;
						break;
				}
			}else if (tiporesul > 5 && tiporesul <= 7){
				switch (category)
				{
					case 'Op1':
						color=urlRoot('web/')+'img/infra/resul_op1.png';
						op1++;
						break;
					case 'Op2':
						color=urlRoot('web/')+'img/infra/resul_op2.png';
						op2++;
						break;
					case 'Op3':
						color=urlRoot('web/')+'img/infra/resul_op3.png';
						op3++;
						break;
				}
			}if (tiporesul == 8){
				switch (icon)
				{
					case 1:
						color=urlRoot('web/')+'img/infra/resul_op1.png';
						op1++;
						break;
					case 2:
						color=urlRoot('web/')+'img/infra/resul_op2.png';
						op2++;
						break;
					case 3:
						color=urlRoot('web/')+'img/infra/resul_op3.png';
						op3++;
						break;
					case 4:
						color=urlRoot('web/')+'img/infra/resul_op4.png';
						op4++;
						break;
					case 5:
						color=urlRoot('web/')+'img/infra/resul_op5.png';
						op5++;
						break;
					case 6:
						color=urlRoot('web/')+'img/infra/resul_op6.png';
						op6++;
						break;
					case 7:
						color=urlRoot('web/')+'img/infra/resul_op7.png';
						op7++;
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


			google.maps.event.addDomListener(marker, 'click', function() {
				infowindow.setContent(contentString);
				infowindow.open(map,marker);
			});

		}

		function checkGoogleMap() {
			
			//specify the target element for our messages
			var msg = document.getElementById('msg');

			if (maploaded == false) {
				//if we dont have a fully loaded map - show the message
				msg.innerHTML = 'Cargando puntos...';
				$("#msg").slideDown("fast");

			} else {
				//otherwise, show 'loaded' message then hide the message after a second
				msg.innerHTML = 'Puntos cargados.'
				$("#msg").slideUp("slow");
			} 
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

			// layer = new google.maps.FusionTablesLayer({
			// 	map: map,
			// 	// heatmap: { enabled: false },
			// 	query: {
			// 		select: "col4\x3e\x3e1",
			// 		from: "1NTiF0yLsmYVDU3KqSmZcYcl3IMTT1AAfTfqr9gUM",
			// 		where: ""
			// 		},
			// 	suppressInfoWindows: true
			// 	// 	,
			// 	// options: {
			// 	// 	styleId: 2,
			// 	// 	templateId: 2
			// 	// }
			// });


			// google.maps.event.addListener(layer, 'click', function(e) {

			// 	// e.infoWindowHtml = "Hola!";
			// 	// update the content of the InfoWindow
			// 	e.infoWindowHtml = e.row['codigo_de_local'].value + "<br />";

			// 	// if the delivery == yes, add content to the window
			// 	if (e.row['Nro_Pred'].value == 1) {
			// 		e.infoWindowHtml += "Delivers!";
			// 	}

			// 	var contentString = e.infoWindowHtml;

			// 	infowindow.setContent(contentString);
			// 	infolatlng = new google.maps.LatLng( parseFloat(e.row['LatitudPunto'].value),parseFloat(e.row['LongitudPunto'].value)),
			// 	infowindow.setPosition(infolatlng);
			// 	infowindow.open(map);

			// });

			// google.maps.event.addListener(map, 'click', function() {
			// 	infowindow.close();
			// });


			<?php $urlKml = 'http://webinei.inei.gob.pe/cie/2013/web/'; ?>
			var kmlPeru = '<?php echo $urlKml.'kml/peru.kml'."?nocache|=".time(); ?>';
			// var kmlPeru = 'http://www.uxglass.com/kml/demo.kml';
			// http://www.uxglass.com/lenguas/departamento/


			kmlPeruLayer = new google.maps.KmlLayer ( kmlPeru, {preserveViewport:true});
			kmlArray.push({cd:'0', nomkml:kmlPeruLayer, lat:-7.1663, lng:-71.455078, zm:6});
			// kmlArray[0].nomkml.setMap(map);

			// KML MAPS LAYERS
			var kmlAmazonas = '<?php echo $urlKml.'kml/amazonas.kml'."?nocache|=".time(); ?>';
			kmlAmazonasLayer = new google.maps.KmlLayer ( kmlAmazonas, {preserveViewport:true});
			kmlArray.push({cd:'01', nomkml:kmlAmazonasLayer, lat:-5.06036873877975, lng:-78.056629714081, zm:8});

			var kmlAncash = '<?php echo $urlKml.'kml/ancash.kml'."?nocache|=".time(); ?>';
			kmlAncashLayer = new google.maps.KmlLayer ( kmlAncash, {preserveViewport:true});       
			kmlArray.push({cd:'02', nomkml:kmlAncashLayer, lat:-9.40575405924352, lng:-77.6734802079553, zm:9});

			var kmlApurimac = '<?php echo $urlKml.'kml/apurimac.kml'."?nocache|=".time(); ?>';
			kmlApurimacLayer = new google.maps.KmlLayer ( kmlApurimac, {preserveViewport:true});
			kmlArray.push({cd:'03', nomkml:kmlApurimacLayer, lat:-14.030814122799, lng:-72.9736536493109, zm:9});

			var kmlArequipa = '<?php echo $urlKml.'kml/arequipa.kml'."?nocache|=".time(); ?>';
			kmlArequipaLayer = new google.maps.KmlLayer ( kmlArequipa, {preserveViewport:true});
			kmlArray.push({cd:'04', nomkml:kmlArequipaLayer, lat:-15.8418343150547, lng:-72.4808283366732, zm:8});

			var kmlAyacucho = '<?php echo $urlKml.'kml/ayacucho.kml'."?nocache|=".time(); ?>';
			kmlAyacuchoLayer = new google.maps.KmlLayer ( kmlAyacucho, {preserveViewport:true});
			kmlArray.push({cd:'05', nomkml:kmlAyacuchoLayer, lat:-14.0892883309093, lng:-74.075890651585, zm:8});

			var kmlCajamarca = '<?php echo $urlKml.'kml/cajamarca.kml'."?nocache|=".time(); ?>';
			kmlCajamarcaLayer = new google.maps.KmlLayer ( kmlCajamarca, {preserveViewport:true});
			kmlArray.push({cd:'06', nomkml:kmlCajamarcaLayer, lat:-6.43276922845617, lng:-78.7435054751844, zm:8});

			var kmlCallao = '<?php echo $urlKml.'kml/callao.kml'."?nocache|=".time(); ?>';
			kmlCallaoLayer = new google.maps.KmlLayer ( kmlCallao, {preserveViewport:true});
			kmlArray.push({cd:'07', nomkml:kmlCallaoLayer, lat:-11.955555624777, lng:-77.1416258913623, zm:12});

			var kmlCusco = '<?php echo $urlKml.'kml/cusco.kml'."?nocache|=".time(); ?>';
			kmlCuscoLayer = new google.maps.KmlLayer ( kmlCusco, {preserveViewport:true});
			kmlArray.push({cd:'08', nomkml:kmlCuscoLayer, lat:-13.2000014858382, lng:-72.1637731157334, zm:9});

			var kmlHuancavelica = '<?php echo $urlKml.'kml/huancavelica.kml'."?nocache|=".time(); ?>';
			kmlHuancavelicaLayer = new google.maps.KmlLayer ( kmlHuancavelica, {preserveViewport:true});
			kmlArray.push({cd:'09', nomkml:kmlHuancavelicaLayer, lat:-13.0287170903714, lng:-75.0036723168008, zm:9});

			var kmlHuanuco = '<?php echo $urlKml.'kml/huanuco.kml'."?nocache|=".time(); ?>';
			kmlHuanucoLayer = new google.maps.KmlLayer ( kmlHuanuco, {preserveViewport:true});
			kmlArray.push({cd:'10', nomkml:kmlHuanucoLayer, lat:-9.41976048562642, lng:-76.0330524961483, zm:9});

			var kmlIca = '<?php echo $urlKml.'kml/ica.kml'."?nocache|=".time(); ?>';
			kmlIcaLayer = new google.maps.KmlLayer ( kmlIca, {preserveViewport:true});
			kmlArray.push({cd:'11', nomkml:kmlIcaLayer, lat:-14.2334842159937, lng:-75.5735306802363, zm:9});

			var kmlJunin = '<?php echo $urlKml.'kml/junin.kml'."?nocache|=".time(); ?>';
			kmlJuninLayer = new google.maps.KmlLayer ( kmlJunin, {preserveViewport:true});
			kmlArray.push({cd:'12', nomkml:kmlJuninLayer, lat:-11.5436597300396, lng:-74.8749510303952, zm:8});

			var kmlLibertad = '<?php echo $urlKml.'kml/libertad.kml'."?nocache|=".time(); ?>'
			kmlLibertadLayer = new google.maps.KmlLayer ( kmlLibertad, {preserveViewport:true});
			kmlArray.push({cd:'13', nomkml:kmlLibertadLayer, lat:-7.9169754349312, lng:-78.3810111865851, zm:8});

			var kmlLambayeque = '<?php echo $urlKml.'kml/lambayeque.kml'."?nocache|=".time(); ?>'
			kmlLambayequeLayer = new google.maps.KmlLayer ( kmlLambayeque, {preserveViewport:true});
			kmlArray.push({cd:'14', nomkml:kmlLambayequeLayer, lat:-6.36380361377563, lng:-79.8249923276084, zm:8});

			var kmlLima = '<?php echo $urlKml.'kml/lima.kml'."?nocache|=".time(); ?>';
			kmlLimaLayer = new google.maps.KmlLayer ( kmlLima, {preserveViewport:true});
			kmlArray.push({cd:'15', nomkml:kmlLimaLayer, lat:-11.7866731456649, lng:-76.6324097107669, zm:8});

			var kmlLoreto = '<?php echo $urlKml.'kml/loreto.kml'."?nocache|=".time(); ?>';
			kmlLoretoLayer = new google.maps.KmlLayer ( kmlLoreto, {preserveViewport:true});
			kmlArray.push({cd:'16', nomkml:kmlLoretoLayer, lat:-4.12302517090165, lng:-74.4265053944273, zm:7});

			var kmlMadre = '<?php echo $urlKml.'kml/madre.kml'."?nocache|=".time(); ?>';
			kmlMadreLayer = new google.maps.KmlLayer ( kmlMadre, {preserveViewport:true});
			kmlArray.push({cd:'17', nomkml:kmlMadreLayer, lat:-11.9781015474597, lng:-70.5450541729619, zm:9});

			var kmlMoquegua = '<?php echo $urlKml.'kml/moquegua.kml'."?nocache|=".time(); ?>';
			kmlMoqueguaLayer = new google.maps.KmlLayer ( kmlMoquegua, {preserveViewport:true});
			kmlArray.push({cd:'18', nomkml:kmlMoqueguaLayer, lat:-16.8651923223222, lng:-70.8510673506577, zm:8});

			var kmlPasco = '<?php echo $urlKml.'kml/pasco.kml'."?nocache|=".time(); ?>';
			kmlPascoLayer = new google.maps.KmlLayer ( kmlPasco, {preserveViewport:true});
			kmlArray.push({cd:'19', nomkml:kmlPascoLayer, lat:-10.4033365152324, lng:-75.3099258151342, zm:9});

			var kmlPiura = '<?php echo $urlKml.'kml/piura.kml'."?nocache|=".time(); ?>';
			kmlPiuraLayer = new google.maps.KmlLayer ( kmlPiura, {preserveViewport:true});
			kmlArray.push({cd:'20', nomkml:kmlPiuraLayer, lat:-5.12938480280296, lng:-80.3297169479797, zm:8});  

			var kmlPuno = '<?php echo $urlKml.'kml/puno.kml'."?nocache|=".time(); ?>';
			kmlPunoLayer = new google.maps.KmlLayer ( kmlPuno, {preserveViewport:true});
			kmlArray.push({cd:'21', nomkml:kmlPunoLayer, lat:-14.9320741925803, lng:-69.9489916069943, zm:8});

			var kmlMartin = '<?php echo $urlKml.'kml/martin.kml'."?nocache|=".time(); ?>';
			kmlMartinLayer = new google.maps.KmlLayer ( kmlMartin, {preserveViewport:true});
			kmlArray.push({cd:'22', nomkml:kmlMartinLayer, lat:-7.03440262104589, lng:-76.7157680323349, zm:9});

			var kmlTacna = '<?php echo $urlKml.'kml/tacna.kml'."?nocache|=".time(); ?>';
			kmlTacnaLayer = new google.maps.KmlLayer ( kmlTacna, {preserveViewport:true});
			kmlArray.push({cd:'23', nomkml:kmlTacnaLayer, lat:-17.6416549925828, lng:-70.2785118500858, zm:8});

			var kmlTumbes = '<?php echo $urlKml.'kml/tumbes.kml'."?nocache|=".time(); ?>';
			kmlTumbesLayer = new google.maps.KmlLayer ( kmlTumbes, {preserveViewport:true});
			kmlArray.push({cd:'24', nomkml:kmlTumbesLayer, lat:-3.85033718439041, lng:-80.541902047432, zm:9});

			var kmlUcayali = '<?php echo $urlKml.'kml/ucayali.kml'."?nocache|=".time(); ?>';
			kmlUcayaliLayer = new google.maps.KmlLayer ( kmlUcayali, {preserveViewport:true});
			kmlArray.push({cd:'25', nomkml:kmlUcayaliLayer, lat:-9.61980385850328, lng:-73.4371206808515, zm:8});

			var kmlLimaMetro = '<?php echo $urlKml.'kml/limametro.kml'."?nocache|=".time(); ?>';
			kmlLimaMetroLayer = new google.maps.KmlLayer ( kmlLimaMetro, {preserveViewport:true});
			kmlArray.push({cd:'1501', nomkml:kmlLimaMetroLayer, lat:-11.7866731456649, lng:-76.6324097107669, zm:8});

			var kmlLimaProv = '<?php echo $urlKml.'kml/limaprov.kml'."?nocache|=".time(); ?>';
			kmlLimaProvLayer = new google.maps.KmlLayer ( kmlLimaProv, {preserveViewport:true});
			kmlArray.push({cd:'1502', nomkml:kmlLimaProvLayer, lat:-11.7866731456649, lng:-76.6324097107669, zm:8});
		}

		google.maps.event.addDomListener(window, 'load', initialize);

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
					case '10':
					case '11':						
						$('#infra').show();
						$('#OP_TECNICA').val(0);
						$('#OP_TECNICA').off("change"); 
						if ( $(this).val() == 1)
						{
							$('#lbl_optecnica').text('OPINIÓN TÉCNICA INICIAL');
							html_subtitulo = '<p class="pull-right">OPINIÓN TÉCNICA INICIAL</p>';
							$('#OP_TECNICA').on("change", function(event) { 
								ot1 = 0;
								ot2 = 0;
								ot3 = 0;
								maploaded = false;
								checkGoogleMap();

     							OpinionTecnica($('#NOM_DPTO').val(),$('#NOM_PROV').val(),$('#NOM_DIST').val(),$('#NOM_AREA').val(),$('#OP_TECNICA').val());
							});
						}else if ( $(this).val() == 10){
							$('#lbl_optecnica').text('ALGORITMO EDIFICACIÓN');
							html_subtitulo = '<p class="pull-right">ALGORITMO EDIFICACIÓN</p>';
							$('#OP_TECNICA').on("change", function(event) { 
								ot1 = 0;
								ot2 = 0;
								ot3 = 0;
								maploaded = false;
								checkGoogleMap();

     							AlgoritmoEdificacion($('#NOM_DPTO').val(),$('#NOM_PROV').val(),$('#NOM_DIST').val(),$('#NOM_AREA').val(),$('#OP_TECNICA').val());

							});
						}else if ( $(this).val() == 11){
							$('#lbl_optecnica').text('ALGORITMO AULAS');
							html_subtitulo = '<p class="pull-right">ALGORITMO AULAS</p>';
							$('#OP_TECNICA').on("change", function(event) { 
								ot1 = 0;
								ot2 = 0;
								ot3 = 0;
								maploaded = false;
								checkGoogleMap();

     							AlgoritmoAulas($('#NOM_DPTO').val(),$('#NOM_PROV').val(),$('#NOM_DIST').val(),$('#NOM_AREA').val(),$('#OP_TECNICA').val());

							});
						}
						break;
					case '2':
						$('#def').show();
						$('#DEF_CIVIL').val(0);
						html_subtitulo = '<p class="pull-right">INSPERCCIONADA POR DEFENSA CIVIL</p>';
						break;
					case '3':
						$('#altriesg').show();
						$('#ALT_RIESGO').val(0);
						html_subtitulo = '<p class="pull-right">INHABITABLES EN ALTO RIESGO</p>';
						break;
					case '4':
						$('#patcult').show();
						$('#PAT_CULT').val(0);
						html_subtitulo = '<p class="pull-right">PATRIMONIO CULTURAL</p>';
						break;
					case '5':
						$('#obejec').show();
						$('#OBR_EJEC').val(0);
						html_subtitulo = '<p class="pull-right">OBRAS EN EJECUCION</p>';
						break;
					case '6':
						$('#serv').show();
						$('#serv input[type=checkbox]').removeAttr('checked');
						html_subtitulo = '<p class="pull-right">SERVICIOS</p>';
						break;
					case '7':
						$('#comuni').show();
						$('#comuni input[type=checkbox]').removeAttr('checked');
						html_subtitulo = '<p class="pull-right">COMUNICACION</p>';
						break;
					case '8':
						$('#vulne').show();
						$('#vulne input[type=checkbox]').removeAttr('checked');
						html_subtitulo = '<p class="pull-right">VULNERABILIDAD</p>';
						break;
					case '9':
						$('#niveledu').show();
						$('#NIVEL_EDU').val(0);
						$('#OP_TECNICA').off("change");
						$('#lbl_optecnica').text('OPINIÓN TÉCNICA INICIAL');
						html_subtitulo = '<p class="pull-right">NIVEL EDUCATIVO</p>';
						break;
				}
				$('#geo_leyenda').html(html_leyenda);
				$('#subtitulo').html(html_subtitulo);
			});

			$('#DEF_CIVIL').change(function(event) {
				r1 = 0;
				r2 = 0;
				maploaded = false;
				checkGoogleMap();
				
				DefensaCivil($('#NOM_DPTO').val(),$('#NOM_PROV').val(),$('#NOM_DIST').val(),$('#NOM_AREA').val(),$('#DEF_CIVIL').val());

			});

			$('#ALT_RIESGO').change(function(event) {
				r1 = 0;
				r2 = 0;
				maploaded = false;
				checkGoogleMap();

				AltoRiesgo($('#NOM_DPTO').val(),$('#NOM_PROV').val(),$('#NOM_DIST').val(),$('#NOM_AREA').val(),$('#ALT_RIESGO').val());

			});

			$('#PAT_CULT').change(function(event) {
				r1 = 0;
				r2 = 0;
				maploaded = false;
				checkGoogleMap();

				PatrimonioCultural($('#NOM_DPTO').val(),$('#NOM_PROV').val(),$('#NOM_DIST').val(),$('#NOM_AREA').val(),$('#PAT_CULT').val());

			});

			$('#OBR_EJEC').change(function(event) {
				r1 = 0;
				r2 = 0;
				maploaded = false;
				checkGoogleMap();

				ObrasEjecucion($('#NOM_DPTO').val(),$('#NOM_PROV').val(),$('#NOM_DIST').val(),$('#NOM_AREA').val(),$('#OBR_EJEC').val());

			});

			$('#NIVEL_EDU').change(function(event) {
				clean_map();
				$('#infra').show();
				$('#OP_TECNICA').val(0);
				$('#OP_TECNICA').off("change");
				$('#OP_TECNICA').on("change", function(event) { 
					ot1 = 0;
					ot2 = 0;
					ot3 = 0;
					maploaded = false;
					checkGoogleMap();

     				NivelEducativo($('#NOM_DPTO').val(),$('#NOM_PROV').val(),$('#NOM_DIST').val(),$('#NOM_AREA').val(),$('#NIVEL_EDU').val(),$('#OP_TECNICA').val());
     				
				});
			});
		});

		function ocultar_cmb () {
			$('#infra').hide();
			$('#def').hide();
			$('#altriesg').hide();
			$('#patcult').hide();
			$('#obejec').hide();
			$('#serv').hide();
			$('#comuni').hide();
			$('#vulne').hide();
			$('#niveledu').hide();
		}

		function view_leyenda () {
			
			switch( $('#RESULTADO').val() )
				{
					case '1':
					case '9':
					case '10':
					case '11':
						html_leyenda = '<p>LEYENDA:  <img src="<?php echo base_url('img/infra/ot1.png') ; ?>" /> ('+ot1+') Mantenimiento, <img src="<?php echo base_url('img/infra/ot2.png') ; ?>" /> ('+ot2+') Reforzamiento, <img src="<?php echo base_url('img/infra/ot3.png') ; ?>" /> ('+ot3+') Demolición</p>';
						break;
					case '2':
					case '3':
					case '4':
					case '5':
						html_leyenda = '<p>LEYENDA: <img src="<?php echo base_url('img/infra/resul_si.png') ; ?>" /> ('+r1+') SI, <img src="<?php echo base_url('img/infra/resul_no.png') ; ?>" /> ('+r2+') NO</p>';
						break;
					case '6':
						html_leyenda = '<p>LEYENDA: <img src="<?php echo base_url('img/infra/resul_op1.png') ; ?>" /> ('+op1+') Energía Eléctrica, <img src="<?php echo base_url('img/infra/resul_op2.png') ; ?>" /> ('+op2+') Agua Potable, <img src="<?php echo base_url('img/infra/resul_op3.png') ; ?>" /> ('+op3+') Alcantarillado</p>';
						break;
					case '7':
						html_leyenda = '<p>LEYENDA: <img src="<?php echo base_url('img/infra/resul_op1.png') ; ?>" /> ('+op1+') Telefonía Fija, <img src="<?php echo base_url('img/infra/resul_op2.png') ; ?>" /> ('+op2+') Telefonía Móvil, <img src="<?php echo base_url('img/infra/resul_op3.png') ; ?>" /> ('+op3+') Internet</p>';
						break;
					case '8':
						html_leyenda = '<p>LEYENDA: <img src="<?php echo base_url('img/infra/resul_op1.png') ; ?>" />  ('+op1+') Cercanía lecho de río, quebrada, <img src="<?php echo base_url('img/infra/resul_op2.png') ; ?>" /> ('+op2+') Cercanía a vía ferrea, <img src="<?php echo base_url('img/infra/resul_op3.png') ; ?>" /> ('+op3+') Cercanía a barranco o precipicio, <img src="<?php echo base_url('img/infra/resul_op4.png') ; ?>" /> ('+op4+') Cercanía a cuartel militar o policial, <img src="<?php echo base_url('img/infra/resul_op5.png') ; ?>" /> ('+op5+') Erosión fluvial de laderas, <img src="<?php echo base_url('img/infra/resul_op6.png') ; ?>" /> ('+op6+') Otro, <img src="<?php echo base_url('img/infra/resul_op7.png') ; ?>" /> ('+op7+') Ninguno</p>';
						break;
				}

				$('#geo_leyenda').html(html_leyenda);
		}

		function kml_dpto(code){

			ckb = ($('#ckb_kml').is(':checked')) ? 0 : 1;

			for (var i = 0; i < kmlArray.length; i++) {

				kmlArray[i].nomkml.setMap(null);

				if (kmlArray[i].cd == code){
					if ( ckb == 1 ){
						kmlArray[i].nomkml.setMap(map);
					}
					map.setCenter(new google.maps.LatLng(kmlArray[i].lat,kmlArray[i].lng));
					map.setZoom(kmlArray[i].zm);
				}
			}
		}

		function clean_kml_dpto(){

			ckb = ($('#ckb_kml').is(':checked')) ? 0 : 1;
			code = $('#NOM_DPTO').val();

			for (var i = 0; i < kmlArray.length; i++) {
				if (kmlArray[i].cd == code || code == -1){
					if ( ckb == 0 )
					{
						kmlArray[i].nomkml.setMap(null);
					}else{
						kmlArray[i].nomkml.setMap(map);
						map.setCenter(new google.maps.LatLng(kmlArray[i].lat,kmlArray[i].lng));
					}
					break;
				}
			}
		}

		function combo_dpto(){

			$.getJSON(urlRoot('index.php')+'/mapa/resultados/dpto', {}, function(data, textStatus) {

				var html='<option value="-1">SELECCIONE...</option>';
				// html+='<option class="cmbsede" value="0">TODOS</option>';

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
		
		// $('.dtaulas').onClick(ver_detalle('000019'));

		function OpinionTecnica(departamento,provincia,distrito,tipoarea,opinion){

			if ( layer != undefined ) layer.setMap(null);

			var condicion =  ( opinion > 0 ) ? 'R_OT = '+opinion+' ' : 'R_OT > '+opinion+' ';

			if ( departamento > 0 )
			{
				condicion += 'AND cod_dpto = '+departamento+' ';
				if ( provincia > 0 )
				{
					condicion += 'AND cod_prov = '+provincia+' ';
					if ( distrito > 0 ){
						condicion += 'AND cod_dist = '+distrito+' ';
					}
				}checkGoogleMap()
			}

			condicion += ( tipoarea != 0 ) ? "AND des_area = '"+tipoarea+"'" : "";

			layer = new google.maps.FusionTablesLayer({
				query: {
					select: "codigo_de_local, Nro_Pred, dpto_nombre, prov_nombre, dist_nombre, des_area, nombres_IIEE, Tot_Ed, OT_1, OT_2, OT_3, R_OT, LatitudPunto, LongitudPunto",
					from: "1NTiF0yLsmYVDU3KqSmZcYcl3IMTT1AAfTfqr9gUM",
					where: condicion
				},
				suppressInfoWindows: true,
				// ,
				// map:map,
				options: {
					styleId: 2,
					templateId: 2
				}
			});

			layer.setMap(map);

			infowindow.close();

			// google.maps.event.addListener(layer, 'click', function(e) {

			// 	// e.infoWindowHtml = "Hola!";
			// 	// update the content of the InfoWindow
			// 	e.infoWindowHtml = e.row['codigo_de_local'].value + "<br />";

			// 	// if the delivery == yes, add content to the window
			// 	if (e.row['Nro_Pred'].value == 1) {
			// 		e.infoWindowHtml += "Delivers!";
			// 	}

			// 	// alert(e.infoWindowHtml);

			// });

			google.maps.event.addListener(layer, 'click', function(e) {

				// e.infoWindowHtml = "Hola!";
				// update the content of the InfoWindow
				e.infoWindowHtml = e.row['codigo_de_local'].value + "<br />";

				// if the delivery == yes, add content to the window
				if (e.row['Nro_Pred'].value == 1) {
					e.infoWindowHtml += "Delivers!";
				}
				
				var contentString = "<div>"+
					"<div class='marker activeMarker'>"+
						"<div class='markerInfo activeInfo' style='display: block'>"+

							"<h2>LOCAL: "+e.row['codigo_de_local'].value+" - PREDIO: "+e.row['Nro_Pred'].value+"</h2>"+
							"<p><b>Departamento:</b> "+e.row['dpto_nombre'].value+"</p>"+
							"<p><b>Provincia:</b> "+e.row['prov_nombre'].value+"</p>"+
							"<p><b>Distrito:</b> "+e.row['dist_nombre'].value+"</p>"+
							"<p><b>Tipo de área:</b> "+e.row['des_area'].value+"</p>"+
							"<p class='detalle'>"+
							"<a target='_blank' href='http://webinei.inei.gob.pe/cie/2013/web/index.php/consistencia/local/"+e.row['codigo_de_local'].value+"/"+e.row['Nro_Pred'].value+"/1'>Ir a cédula censal evaluada →</a>"+
							"</p>"+

							"<h3>INSTITUCIONES EDUCATIVAS</h3>"+
							"<p>"+e.row['nombres_IIEE'].value+"</p>"+

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

				// var contentString = e.infoWindowHtml;

				infowindow.setContent(contentString);
				infolatlng = new google.maps.LatLng( parseFloat(e.row['LatitudPunto'].value),parseFloat(e.row['LongitudPunto'].value)),
				infowindow.setPosition(infolatlng);
				infowindow.open(map);

			});

			maploaded = true;
			setTimeout('checkGoogleMap()',1000);
			view_leyenda();


			// var query = "SELECT codigo_de_local, Nro_Pred, dpto_nombre, prov_nombre, dist_nombre, des_area, nombres_IIEE, Tot_Ed, OT_1, OT_2, OT_3, R_OT, LatitudPunto, LongitudPunto FROM " +
			// 	'1NTiF0yLsmYVDU3KqSmZcYcl3IMTT1AAfTfqr9gUM';
			// var encodedQuery = encodeURIComponent(query);

			// // Construct the URL
			// var url = ['https://www.googleapis.com/fusiontables/v1/query'];
			// url.push('?sql=' + encodedQuery);
			// url.push('&key=AIzaSyAkIa4SdnQDXiuLkg2tPW42vgVrR9wWarA');
			// url.push('&callback=?');


			// $.getJSON(url.join(''),null, function( data ) {
			// 	clean_map();

			// 	var rows = data['rows'];
			// 	for (i in rows) {

			// 		var contentString="<div><div class='marker activeMarker'>"+
			// 			"<div class='markerInfo activeInfo' style='display: block'>"+
			// 			"<h2>LOCAL: "+rows[i][0]+" - PREDIO: "+rows[i][1]+"</h2>"+
			// 			"<p><b>Departamento:</b> "+rows[i][2]+"</p>"+
			// 			"<p><b>Provincia:</b> "+rows[i][3]+"</p>"+
			// 			"<p><b>Distrito:</b> "+rows[i][4]+"</p>"+
			// 			"<p><b>Tipo de área:</b> "+rows[i][5]+"</p>"+
			// 			"<p class='detalle'><a target='_blank' href='http://webinei.inei.gob.pe/cie/2013/web/index.php/consistencia/local/"+rows[i][0]+"/"+rows[i][1]+"/1'>Ir a cédula censal evaluada →</a></p>"+

			// 			"<h3>INSTITUCIONES EDUCATIVAS</h3>"+
			// 			"<p>"+rows[i][6]+"</p>"+

			// 			"<h3>EDIFICACIONES</h3>"+
			// 			"<p><b>Total de edificaciones:</b> "+rows[i][7]+"</p>"+
			// 			"<p><b>Mantenimiento:</b> "+rows[i][8]+"</p>"+
			// 			"<p><b>Reforzamiento:</b> "+rows[i][9]+"</p>"+
			// 			"<p><b>Demolicion:</b> "+rows[i][10]+"</p>"+
			// 			"<p class='detalle'><a href='#' onclick='ver_detalle(\""+rows[i][0]+"\")'>Ir a detalle aulas por edificación →</a></p>"+
			// 			"</div>"+
			// 			"</div><div>";

			// 		var point = new google.maps.LatLng(rows[i][12],rows[i][13]);
			// 		var marker = createMarkerLEN(point, rows[i][0], contentString,'punto', parseInt(rows[i][11]), 1);
					
			// 	}

				// $.each(json_data, function(i, datos){

				// 	var contentString="<div><div class='marker activeMarker'>"+
				// 		"<div class='markerInfo activeInfo' style='display: block'>"+
				// 		"<h2>LOCAL: "+datos.codigo_de_local+" - PREDIO: "+datos.Nro_Pred+"</h2>"+
				// 		"<p><b>Departamento:</b> "+datos.dpto_nombre.trim()+"</p>"+
				// 		"<p><b>Provincia:</b> "+datos.prov_nombre+"</p>"+
				// 		"<p><b>Distrito:</b> "+datos.dist_nombre+"</p>"+
				// 		"<p><b>Tipo de área:</b> "+datos.des_area+"</p>"+
				// 		"<p class='detalle'><a target='_blank' href='http://webinei.inei.gob.pe/cie/2013/web/index.php/consistencia/local/"+datos.codigo_de_local+"/"+datos.Nro_Pred+"/1'>Ir a cédula censal evaluada →</a></p>"+

				// 		"<h3>INSTITUCIONES EDUCATIVAS</h3>"+
				// 		"<p>"+datos.nombres_IIEE+"</p>"+

				// 		"<h3>EDIFICACIONES</h3>"+
				// 		"<p><b>Total de edificaciones:</b> "+datos.Tot_Ed+"</p>"+
				// 		"<p><b>Mantenimiento:</b> "+datos.OT_1+"</p>"+
				// 		"<p><b>Reforzamiento:</b> "+datos.OT_2+"</p>"+
				// 		"<p><b>Demolicion:</b> "+datos.OT_3+"</p>"+
				// 		"<p class='detalle'><a href='#' onclick='ver_detalle(\""+datos.codigo_de_local+"\")'>Ir a detalle aulas por edificación →</a></p>"+
				// 		"</div>"+
				// 		"</div><div>";

				// 	var point = new google.maps.LatLng(datos.UltP_Latitud,datos.UltP_Longitud);
				// 	var marker = createMarkerLEN(point, datos.codigo_de_local, contentString,'punto', parseInt(datos.R_OT), 1);
				// 	// var marker = new google.maps.Marker({
				// 		// position: point
				// 	// });
				// 	// markers.push(marker);
				// });

				// maploaded = true;
				// setTimeout('checkGoogleMap()',1000);
				// view_leyenda();
				// markerCluster = new MarkerClusterer(map, markers);

			// }).fail(function( jqxhr, textStatus, error ) {
			// 	var err = textStatus + ', ' + error;
			// 	console.log( "Request Failed: " + err);
			// });
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
						"</div>"+
						"</div><div>";

					var point = new google.maps.LatLng(datos.UltP_Latitud,datos.UltP_Longitud);
					var marker = createMarkerLEN(point, datos.codigo_de_local, contentString,'punto', datos.R_DC, 2);
				});

				maploaded = true;
				setTimeout('checkGoogleMap()',1000);
				view_leyenda();

			}).fail(function( jqxhr, textStatus, error ) {
				var err = textStatus + ', ' + error;
				console.log( "Request Failed: " + err);
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
						"</div>"+
						"</div><div>";

					var point = new google.maps.LatLng(datos.UltP_Latitud,datos.UltP_Longitud);
					var marker = createMarkerLEN(point, datos.codigo_de_local, contentString,'punto', datos.R_AR, 3);
				});
				
				maploaded = true;
				setTimeout('checkGoogleMap()',1000);
				view_leyenda();

			}).fail(function( jqxhr, textStatus, error ) {
				var err = textStatus + ', ' + error;
				console.log( "Request Failed: " + err);
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
						"</div>"+
						"</div><div>";

					var point = new google.maps.LatLng(datos.UltP_Latitud,datos.UltP_Longitud);
					var marker = createMarkerLEN(point, datos.codigo_de_local, contentString,'punto', datos.R_PC, 4);
				});

				maploaded = true;
				setTimeout('checkGoogleMap()',1000);
				view_leyenda();
				
			}).fail(function( jqxhr, textStatus, error ) {
				var err = textStatus + ', ' + error;
				console.log( "Request Failed: " + err);
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
						"</div>"+
						"</div><div>";

					var point = new google.maps.LatLng(datos.UltP_Latitud,datos.UltP_Longitud);
					var marker = createMarkerLEN(point, datos.codigo_de_local, contentString,'punto', datos.R_OB, 5);
				});
				
				maploaded = true;
				setTimeout('checkGoogleMap()',1000);
				view_leyenda();
				
			}).fail(function( jqxhr, textStatus, error ) {
				var err = textStatus + ', ' + error;
				console.log( "Request Failed: " + err);
			});
		}

		function ini_button(posicion) {
			op1 = 0;
			op2 = 0;
			op3 = 0;
			op4 = 0;
			op5 = 0;
			op6 = 0;
			op7 = 0;
		 	maploaded = false;
			checkGoogleMap();
			
			if ( posicion == 1 ) { 
				Servicios(); 
			}else if ( posicion == 2) {
				Comunicacion();
			}else if ( posicion == 3 ) {
				Vulnerabilidad();
			}
		 }


		function Servicios(){

			var ee = ($('#energia').is(':checked')) ? 1 : 0;
			var ag = ($('#agua').is(':checked')) ? 1 : 0;
			var alc = ($('#alcantarillado').is(':checked')) ? 1 : 0;

			categ = 'punto';

			if (ee == 1 && ag == 0 && alc == 0){
				categ = 'Op1';
			}else if (ee == 0 && ag == 1 && alc == 0){
				categ = 'Op2';
			}else if (ee == 0 && ag == 0 && alc == 1){
				categ = 'Op3';
			}

			$.getJSON(urlRoot('index.php')+'/mapa/resultados/servicios', {dpto:$('#NOM_DPTO').val(),prov:$('#NOM_PROV').val(),dist:$('#NOM_DIST').val(),area:$('#NOM_AREA').val(),ee:ee,ag:ag,alc:alc}, function(json_data, textStatus) {

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

						"<h3>SERVICIOS</h3>"+
						"<p><b>Energía Eléctrica:</b> "+(datos.EE == 1 ? 'Si' : 'No')+"</p>"+
						"<p><b>Agua Potable:</b> "+(datos.AP == 1 ? 'Si' : 'No')+"</p>"+
						"<p><b>Alcantarillado:</b> "+(datos.ALC == 1 ? 'Si' : 'No')+"</p>"+
						"</div>"+
						"</div><div>";

					var point = new google.maps.LatLng(datos.UltP_Latitud,datos.UltP_Longitud);
					var marker = createMarkerLEN(point, datos.codigo_de_local, contentString,categ, '0', 6);
				});
				
				maploaded = true;
				setTimeout('checkGoogleMap()',1000);
				view_leyenda();
				
			}).fail(function( jqxhr, textStatus, error ) {
				var err = textStatus + ', ' + error;
				console.log( "Request Failed: " + err);
			});
		}

		function Comunicacion(){

			var tf = ($('#tfija').is(':checked')) ? 1 : 0;
			var tm = ($('#tmovil').is(':checked')) ? 1 : 0;
			var inter = ($('#inter').is(':checked')) ? 1 : 0;

			categ = 'punto';

			if (tf == 1 && tm == 0 && inter == 0){
				categ = 'Op1';
			}else if (tf == 0 && tm == 1 && inter == 0){
				categ = 'Op2';
			}else if (tf == 0 && tm == 0 && inter == 1){
				categ = 'Op3';
			}

			$.getJSON(urlRoot('index.php')+'/mapa/resultados/comunicacion', {dpto:$('#NOM_DPTO').val(),prov:$('#NOM_PROV').val(),dist:$('#NOM_DIST').val(),area:$('#NOM_AREA').val(),tf:tf,tm:tm,inter:inter}, function(json_data, textStatus) {

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

						"<h3>COMUNICACION</h3>"+
						"<p><b>Telefonía Fija:</b> "+(datos.TF == 1 ? 'Si' : 'No')+"</p>"+
						"<p><b>Telefonía Móvil:</b> "+(datos.TM == 1 ? 'Si' : 'No')+"</p>"+
						"<p><b>Internet:</b> "+(datos.INTER == 1 ? 'Si' : 'No')+"</p>"+
						"</div>"+
						"</div><div>";

					var point = new google.maps.LatLng(datos.UltP_Latitud,datos.UltP_Longitud);
					var marker = createMarkerLEN(point, datos.codigo_de_local, contentString,categ, '0', 7);
				});
			
				maploaded = true;
				setTimeout('checkGoogleMap()',1000);
				view_leyenda();
				
			}).fail(function( jqxhr, textStatus, error ) {
				var err = textStatus + ', ' + error;
				console.log( "Request Failed: " + err);
			});
		}

		function Vulnerabilidad(){

			var v1 = ($('#v1').is(':checked')) ? 1 : 0;
			var v2 = ($('#v2').is(':checked')) ? 2 : 0;
			var v3 = ($('#v3').is(':checked')) ? 3 : 0;
			var v4 = ($('#v4').is(':checked')) ? 4 : 0;
			var v5 = ($('#v5').is(':checked')) ? 5 : 0;
			var v6 = ($('#v6').is(':checked')) ? 6 : 0;
			var v7 = ($('#v7').is(':checked')) ? 7 : 0;

			var vt = v1+v2+v3+v4+v5+v6+v7;

			$.getJSON(urlRoot('index.php')+'/mapa/resultados/vulnerabilidad', {dpto:$('#NOM_DPTO').val(),prov:$('#NOM_PROV').val(),dist:$('#NOM_DIST').val(),area:$('#NOM_AREA').val(),v1:v1,v2:v2,v3:v3,v4:v4,v5:v5,v6:v6,v7:v7}, function(json_data, textStatus) {

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

						"<h3>VULNERABILIDAD</h3>"+
						"<p><b>Cercanía lecho de río, quebrada?:</b> "+(datos.Op1 == 1 ? 'Si' : 'No')+"</p>"+
						"<p><b>Cercanía a vía ferrea?:</b> "+(datos.Op2 == 2 ? 'Si' : 'No')+"</p>"+
						"<p><b>Cercanía a barranco o precipicio?:</b> "+(datos.Op3 == 3 ? 'Si' : 'No')+"</p>"+
						"<p><b>Cercanía a cuartel militar o policial?:</b> "+(datos.Op4 == 4 ? 'Si' : 'No')+"</p>"+
						"<p><b>Erosión fluvial de laderas?:</b> "+(datos.Op5 == 5 ? 'Si' : 'No')+"</p>"+
						"<p><b>Otro?:</b> "+(datos.Op6 == 6 ? 'Si' : 'No')+"</p>"+
						"<p><b>Ninguno:</b> "+(datos.Op7 == 7 ? 'Si' : 'No')+"</p>"+
						"</div>"+
						"</div><div>";

					var point = new google.maps.LatLng(datos.UltP_Latitud,datos.UltP_Longitud);
					var marker = createMarkerLEN(point, datos.codigo_de_local, contentString,'punto', vt, 8);
				});
			
				maploaded = true;
				setTimeout('checkGoogleMap()',1000);
				view_leyenda();
				
			}).fail(function( jqxhr, textStatus, error ) {
				var err = textStatus + ', ' + error;
				console.log( "Request Failed: " + err);
			});
		}


		function AlgoritmoEdificacion(departamento,provincia,distrito,tipoarea,opinion){

			$.getJSON(urlRoot('index.php')+'/mapa/resultados/algoritmo_edificacion', {dpto:departamento,prov:provincia,dist:distrito,area:tipoarea,opt:opinion}, function(json_data, textStatus) {

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
						"<p><b>Total de edificaciones:</b> "+datos.Total_Ed+"</p>"+
						"<p><b>Mantenimiento:</b> "+datos.Cant_Ed_M+"</p>"+
						"<p><b>Reforzamiento:</b> "+datos.Cant_Ed_R+"</p>"+
						"<p><b>Demolicion:</b> "+datos.Cant_Ed_S+"</p>"+
						"</div>"+
						"</div><div>";
					
						var iconito = 0;

						if (datos.Nivel_Int_F == 'M'){
							iconito = 1;
						}else if (datos.Nivel_Int_F == 'R'){
							iconito = 2;
						}else if (datos.Nivel_Int_F == 'S'){
							iconito = 3;
						}

					var point = new google.maps.LatLng(datos.UltP_Latitud,datos.UltP_Longitud);
					var marker = createMarkerLEN(point, datos.codigo_de_local, contentString,'punto', iconito, 10);
				});
				
				maploaded = true;
				setTimeout('checkGoogleMap()',1000);
				view_leyenda();

			}).fail(function( jqxhr, textStatus, error ) {
				var err = textStatus + ', ' + error;
				console.log( "Request Failed: " + err);
			});
		}

		function AlgoritmoAulas(departamento,provincia,distrito,tipoarea,opinion){

			$.getJSON(urlRoot('index.php')+'/mapa/resultados/algoritmo_aulas', {dpto:departamento,prov:provincia,dist:distrito,area:tipoarea,opt:opinion}, function(json_data, textStatus) {

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

						"<h3>AULAS</h3>"+
						"<p><b>Total de Aulas:</b> "+datos.Total_Au+"</p>"+
						"<p><b>Mantenimiento:</b> "+datos.Cant_Au_M+"</p>"+
						"<p><b>Reforzamiento:</b> "+datos.Cant_Au_R+"</p>"+
						"<p><b>Demolicion:</b> "+datos.Cant_Au_S+"</p>"+
						"</div>"+
						"</div><div>";
					
						var iconito = 0;

						if (datos.Nivel_Int_F == 'M'){
							iconito = 1;
						}else if (datos.Nivel_Int_F == 'R'){
							iconito = 2;
						}else if (datos.Nivel_Int_F == 'S'){
							iconito = 3;
						}

					var point = new google.maps.LatLng(datos.UltP_Latitud,datos.UltP_Longitud);
					var marker = createMarkerLEN(point, datos.codigo_de_local, contentString,'punto', iconito, 11);
				});

				maploaded = true;
				setTimeout('checkGoogleMap()',1000);
				view_leyenda();

			}).fail(function( jqxhr, textStatus, error ) {
				var err = textStatus + ', ' + error;
				console.log( "Request Failed: " + err);
			});
		}

		function NivelEducativo(departamento,provincia,distrito,tipoarea,nivedu,opinion){

			$.getJSON(urlRoot('index.php')+'/mapa/resultados/nivel_educativo', {dpto:departamento,prov:provincia,dist:distrito,area:tipoarea,ne:nivedu,opt:opinion}, function(json_data, textStatus) {

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
						"<p><b>Mantenimiento:</b> "+datos.OT_1+"</p>"+
						"<p><b>Reforzamiento:</b> "+datos.OT_2+"</p>"+
						"<p><b>Demolicion:</b> "+datos.OT_3+"</p>"+
						"</div>"+
						"</div><div>";

					var point = new google.maps.LatLng(datos.UltP_Latitud,datos.UltP_Longitud);
					var marker = createMarkerLEN(point, datos.codigo_de_local, contentString,'punto', parseInt(datos.R_OT), 9);
				});

				maploaded = true;
				setTimeout('checkGoogleMap()',1000);
				view_leyenda();

			}).fail(function( jqxhr, textStatus, error ) {
				var err = textStatus + ', ' + error;
				console.log( "Request Failed: " + err);
			});
		}

		function clean_map () {
			if (gmarkers.length > 0)
			{
				for (var i=0; i<gmarkers.length; i++) {
				// for (var i=0; i<markers.length; i++) {
					if (gmarkers[i].mycategory == 'punto' || gmarkers[i].mycategory == 'Op1' || gmarkers[i].mycategory == 'Op2' || gmarkers[i].mycategory == 'Op3') {
						// gmarkers[i].setVisible(false);
						gmarkers[i].setMap(null);
					}
				}

				gmarkers = [];

				infowindow.close();
			}
			
		}

		var contenido = "";

		function ver_detalle(code){

			// alert("Hola! Soy el Atributo OnClick");

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
				<input type="checkbox" name="ckb_kml" id="ckb_kml" onclick="clean_kml_dpto();" > Ocultar KML
			</div>

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
						<option value="Urbano">URBANO</option>
						<option value="Rural">RURAL</option>
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
				<label class="preguntas_sub2" for="NIVEL_EDU">NIVEL EDUCATIVO</label>
				<div class="controls">
					<select id="NIVEL_EDU" class="span12" name="NIVEL_EDU">
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

			<div id="infra" class="row-fluid control-group span9">
				<label id="lbl_optecnica" class="preguntas_sub2" for="OP_TECNICA">OPINIÓN TÉCNICA INICIAL</label>
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

			<div id="serv" class="row-fluid control-group span9">
				<label class="preguntas_sub2" for="SERV">SERVICIOS</label>
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
				<label class="preguntas_sub2" for="COMUNI">COMUNICACIÓN</label>
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
				<label class="preguntas_sub2" for="VULNE">VULNERABILIDAD</label>
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

	<script>
	  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
	  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
	  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
	  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

	  ga('create', 'UA-47317828-1', 'inei.gob.pe');
	  ga('send', 'pageview');

	</script>
	
</body>
</html>
