<!DOCTYPE html>
<html>
  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

    <title>Resultados Georefenciados</title>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
    <script src="<?php echo base_url('js/general/jquery-1.10.2.min.js'); ?>"></script>

    <style>



.map_container {
    height: 100%;
    position: absolute;
    width: 100%;
}

      html, body, #map-canvas {
        margin: 0;
        padding: 0;
        height: 100%;
      }
      table,td,tr,th{
        border:1px solid #BBB;
        border-spacing:0;
        border-collapse:collapse;
        padding: 8px;
      }
    </style>
    <style type="text/css">
       .glabels {
         color: black;
         font-family: "Lucida Grande", "Arial", sans-serif;
         font-size: 15px;
         font-weight: bold;
         text-align: center;
         width: auto;
         white-space: nowrap;
         background: #FFF;
         padding: 2px;
         border: 1px solid black;
       }

#footer {
    font-size: 80%;
}
#footer {
    background: none repeat scroll 0 0 #333333;
    border-top: 1px solid #000000;
    bottom: 0;
    color: #C2C2C2;
    display: block;
    padding: 5px 0 3px;
    position: fixed;
    width: 100%;
    z-index: 9999;
}


#footer p {
    margin: 0;
}

#footer img {
    margin-left: 15px;
    padding-right: 5px;
}

#header {
    background: none repeat scroll 0 0 #FFFFFF !important;
    border-bottom: 7px solid #00A1C7 !important;
    padding: 10px 20px 5px;
    position: relative;
}

#oted {
    color: #00A1C7;
    height: 30px;
    position: absolute;
    right: 20px;
    text-align: right;
    text-transform: uppercase;
    top: 33px;
}



.filtro_map {
    background: none repeat scroll 0 0 rgba(255, 255, 255, 0.8);
    border-radius: 5px 5px 5px 5px;
    top: 80px;
    left: 20px;
    margin: 0 !important;
    padding: 7px 12px !important;
    position: absolute;
}

.coordenadas_map {
    background: none repeat scroll 0 0 rgba(255, 255, 255, 0.8);
    border-radius: 5px 5px 5px 5px;
    top: 380px;
    left: 20px;
    margin: 0 !important;
    padding: 7px 12px !important;
    position: absolute;
}

.preguntas_sub2 {
    font-size: 11px !important;
    line-height: 20px !important;
    margin-bottom: 1px !important;
    margin-top: 1px !important;
    padding: 8px 10px !important;
    text-align: left;
}

.preguntas_sub2 {
    font-size: 11px !important;
    line-height: 20px !important;
    margin-bottom: 1px !important;
    margin-top: 1px !important;
    padding: 8px 10px !important;
    text-align: left;
}

.filtro_map .control-group .controls {
    margin-left: 0;
}


#footer .row-fluid [class*="span"] {
    min-height: 22px;
}


#footer .span3{height: auto; padding-top: 0}

.filtro_map .control-group {
    margin-left: 0;
}

#map-canvas img {
  max-width: none;
}

#map-canvas label {
  width: auto; display:inline;
}


#footer .pull-right {
    color: #F4EB13;
}

   </style>


    <meta name="description" content="">
    <meta name="viewport" content="width=device-width">



    <link rel="stylesheet" href="<?php echo base_url('css/bootstrap.min.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('css/bootstrap.spacelab.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('css/bootstrap-responsive.min.css'); ?>">


    <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false"></script>
    <script src="<?php echo base_url('js/map/markerwithlabel.js'); ?>"></script>
    <script src="<?php echo base_url('js/general/basic.js'); ?>"></script>

    <script>

      var gmarkers = [];
      var map = null;
      var category = "";

      var infowindow = new google.maps.InfoWindow({
        size: new google.maps.Size(300,400)
      });

      // A function to create the marker and set up the event window
      function createMarkerLEN(latlng,name,html,category,icon) {
          var contentString = html;
          var color = null;
          var myCoordsLenght = 6;

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

              google.maps.event.addListener(marker, 'dragend', function(evt){
                document.getElementById('latitud').value = evt.latLng.lat().toFixed(myCoordsLenght);
                document.getElementById('longitud').value = evt.latLng.lng().toFixed(myCoordsLenght);

                $('#edit_gps').slideDown(200);

              });
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

        var kmlPeru = '<?php echo base_url('kml/peru.kml') ; ?>';
        
        kmlPeruLayer = new google.maps.KmlLayer ( kmlPeru, {preserveViewport:true});
        kmlPeruLayer.setMap(map);

          // KML MAPS LAYERS
     
        var kmlAmazonas = '<?php echo base_url('kml/amazonas.kml') ; ?>';;
       kmlAmazonasLayer = new google.maps.KmlLayer ( kmlAmazonas, {preserveViewport:true});
     
       var kmlAncash = '<?php echo base_url('kml/ancash.kml') ; ?>';
       kmlAncashLayer = new google.maps.KmlLayer ( kmlAncash, {preserveViewport:true});       
       
       var kmlApurimac = '<?php echo base_url('kml/apurimac.kml') ; ?>';
       kmlApurimacLayer = new google.maps.KmlLayer ( kmlApurimac, {preserveViewport:true});              
       
       var kmlArequipa = '<?php echo base_url('kml/arequipa.kml') ; ?>';
       kmlArequipaLayer = new google.maps.KmlLayer ( kmlArequipa, {preserveViewport:true});                     

       var kmlAyacucho = '<?php echo base_url('kml/ayacucho.kml') ; ?>';
       kmlAyacuchoLayer = new google.maps.KmlLayer ( kmlAyacucho, {preserveViewport:true});                            
       
       var kmlCajamarca = '<?php echo base_url('kml/cajamarca.kml') ; ?>';
       kmlCajamarcaLayer = new google.maps.KmlLayer ( kmlCajamarca, {preserveViewport:true});                            
       
       var kmlCallao = '<?php echo base_url('kml/callao.kml') ; ?>';
       kmlCallaoLayer = new google.maps.KmlLayer ( kmlCallao, {preserveViewport:true});                                   
       
       var kmlCusco = '<?php echo base_url('kml/cusco.kml') ; ?>';
       kmlCuscoLayer = new google.maps.KmlLayer ( kmlCusco, {preserveViewport:true});                                          
       
       var kmlHuancavelica = '<?php echo base_url('kml/huancavelica.kml') ; ?>';
       kmlHuancavelicaLayer = new google.maps.KmlLayer ( kmlHuancavelica, {preserveViewport:true});                                                 
       
       var kmlHuanuco = '<?php echo base_url('kml/huanuco.kml') ; ?>';
       kmlHuanucoLayer = new google.maps.KmlLayer ( kmlHuanuco, {preserveViewport:true});                                                        
       
       var kmlIca = '<?php echo base_url('kml/ica.kml') ; ?>';
       kmlIcaLayer = new google.maps.KmlLayer ( kmlIca, {preserveViewport:true});                                                               
       
       var kmlJunin = '<?php echo base_url('kml/junin.kml') ; ?>';
       kmlJuninLayer = new google.maps.KmlLayer ( kmlJunin, {preserveViewport:true});                                                                      
       
       var kmlLambayeque = '<?php echo base_url('kml/lambayeque.kml') ; ?>'
       kmlLambayequeLayer = new google.maps.KmlLayer ( kmlLambayeque, {preserveViewport:true});                                                                             
       
       var kmlLibertad = '<?php echo base_url('kml/libertad.kml') ; ?>'
       kmlLibertadLayer = new google.maps.KmlLayer ( kmlLibertad, {preserveViewport:true});                                                                                    
       
       var kmlLima = '<?php echo base_url('kml/lima.kml') ; ?>';
       kmlLimaLayer = new google.maps.KmlLayer ( kmlLima, {preserveViewport:true});                                                                                           
       
       var kmlLoreto = '<?php echo base_url('kml/loreto.kml') ; ?>';
       kmlLoretoLayer = new google.maps.KmlLayer ( kmlLoreto, {preserveViewport:true});                                                                                                  
       
       var kmlMadre = '<?php echo base_url('kml/madre.kml') ; ?>';
       kmlMadreLayer = new google.maps.KmlLayer ( kmlMadre, {preserveViewport:true});                                                                                                         
       
       var kmlMartin = '<?php echo base_url('kml/martin.kml') ; ?>';
       kmlMartinLayer = new google.maps.KmlLayer ( kmlMartin, {preserveViewport:true});                                                                                                                
       
       var kmlMoquegua = '<?php echo base_url('kml/moquegua.kml') ; ?>';
       kmlMoqueguaLayer = new google.maps.KmlLayer ( kmlMoquegua, {preserveViewport:true});                                                                                                                       
       
       var kmlPasco = '<?php echo base_url('kml/pasco.kml') ; ?>';
       kmlPascoLayer = new google.maps.KmlLayer ( kmlPasco, {preserveViewport:true});                                                                                                                              
       
       var kmlPiura = '<?php echo base_url('kml/piura.kml') ; ?>';
       kmlPiuraLayer = new google.maps.KmlLayer ( kmlPiura, {preserveViewport:true});                                                                                                                                     
       
       var kmlPuno = '<?php echo base_url('kml/puno.kml') ; ?>';
       kmlPunoLayer = new google.maps.KmlLayer ( kmlPuno, {preserveViewport:true});                                                                                                                                            
       
       var kmlTacna = '<?php echo base_url('kml/tacna.kml') ; ?>';
       kmlTacnaLayer = new google.maps.KmlLayer ( kmlTacna, {preserveViewport:true});                                                                                                                                                   
       
       var kmlTumbes = '<?php echo base_url('kml/tumbes.kml') ; ?>';
       kmlTumbesLayer = new google.maps.KmlLayer ( kmlTumbes, {preserveViewport:true});                                                                                                                                                          
       
       var kmlUcayali = '<?php echo base_url('kml/ucayali.kml') ; ?>';
       kmlUcayaliLayer = new google.maps.KmlLayer ( kmlUcayali, {preserveViewport:true});
    }


    </script>

    <script type="text/javascript">

    $(document).ready(function() {

        initialize();

        combo_dpto();

        $('#infra').hide();

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

          switch( $(this).val() )
          {
            case '1':
              $('#infra').show();
              $('#OP_TECNICA').val(0);
              html_leyenda = '<p>LEYENDA:  <img src="<?php echo base_url('img/infra/ot1.png') ; ?>" />  Mantenimiento, <img src="<?php echo base_url('img/infra/ot2.png') ; ?>" /> Rehabilitación, <img src="<?php echo base_url('img/infra/ot3.png') ; ?>" /> Demolición</p>';
              html_subtitulo = '<p class="pull-right">OPINIÓN TÉCNICA INICIAL</p>';
              break;
            default:
              $('#infra').hide();
              break;
          }

          $('#geo_leyenda').html(html_leyenda);
          $('#subtitulo').html(html_subtitulo);

        });


        $('#OP_TECNICA').change(function(event) {

           puntosGPS($('#NOM_DPTO').val(),$('#NOM_PROV').val(),$('#NOM_DIST').val(),$('#NOM_AREA').val(),$('#OP_TECNICA').val());

        });

    });

    function combo_dpto(){

        $.getJSON(urlRoot('index.php')+'/mapa/resultados/dpto', {}, function(data, textStatus) {

          var html='<option value="0">SELECCIONE...</option>';
          html+='<option class="cmbsede" value="0">TODOS</option>';

          $.each(data, function(i, datos) {

            html+='<option class="cmbsede" value="'+datos.CCDD+'">'+datos.Nombre+'</option>';

          });

          $('#NOM_DPTO').html(html);

          $('#NOM_DPTO').change(function(event){
            
            combo_prov($(this).val());
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

    function kml_dpto(code){

      kmlPeruLayer.setMap(null);

      kmlAmazonasLayer.setMap(null);
      kmlAncashLayer.setMap(null);
      kmlApurimacLayer.setMap(null);
      kmlArequipaLayer.setMap(null);
      kmlAyacuchoLayer.setMap(null);
      kmlCajamarcaLayer.setMap(null);
      kmlCallaoLayer.setMap(null);
      kmlCuscoLayer.setMap(null);
      kmlHuancavelicaLayer.setMap(null);
      kmlHuanucoLayer.setMap(null);
      kmlIcaLayer.setMap(null);
      kmlJuninLayer.setMap(null);
      kmlLibertadLayer.setMap(null);
      kmlLambayequeLayer.setMap(null);
      kmlLimaLayer.setMap(null);
      kmlLoretoLayer.setMap(null);
      kmlMadreLayer.setMap(null);
      kmlMoqueguaLayer.setMap(null);
      kmlPascoLayer.setMap(null);
      kmlPiuraLayer.setMap(null);
      kmlPunoLayer.setMap(null);
      kmlMartinLayer.setMap(null);
      kmlTacnaLayer.setMap(null);
      kmlTumbesLayer.setMap(null);
      kmlUcayaliLayer.setMap(null);
      
      switch (code)
      {
        case '0':
            kmlPeruLayer.setMap(map);
            break;
        case '01':
            kmlAmazonasLayer.setMap(map);
            map.setCenter(new google.maps.LatLng(-5.06036873877975,-78.056629714081));
            map.setZoom(8);
            break;
        case '02':
            kmlAncashLayer.setMap(map);
            map.setCenter(new google.maps.LatLng(-9.40575405924352, -77.6734802079553));
            map.setZoom(9);
            break;
        case '03':
            kmlApurimacLayer.setMap(map);
            map.setCenter(new google.maps.LatLng(-14.030814122799, -72.9736536493109));
            map.setZoom(9);
            break;
        case '04':
            kmlArequipaLayer.setMap(map);
            map.setCenter(new google.maps.LatLng(-15.8418343150547, -72.4808283366732));
            map.setZoom(8);
            break;
        case '05':
            kmlAyacuchoLayer.setMap(map);
            map.setCenter(new google.maps.LatLng(-14.0892883309093, -74.075890651585));
            map.setZoom(8);
            break;
        case '06':
            kmlCajamarcaLayer.setMap(map);
            map.setCenter(new google.maps.LatLng(-6.43276922845617, -78.7435054751844));
            map.setZoom(8);
            break;
        case '07':
            kmlCallaoLayer.setMap(map);
            map.setCenter(new google.maps.LatLng(-11.955555624777,-77.1416258913623));
            map.setZoom(12);
            break;
        case '08':
            kmlCuscoLayer.setMap(map);
            map.setCenter(new google.maps.LatLng(-13.2000014858382, -72.1637731157334));
            map.setZoom(9);
            break;
        case '09':
            kmlHuancavelicaLayer.setMap(map);
            map.setCenter(new google.maps.LatLng(-13.0287170903714, -75.0036723168008));
            map.setZoom(9);
            break;
        case '10':
            kmlHuanucoLayer.setMap(map);
            map.setCenter(new google.maps.LatLng(-9.41976048562642, -76.0330524961483));
            map.setZoom(9);
            break;
        case '11':
            kmlIcaLayer.setMap(map);
            map.setCenter(new google.maps.LatLng(-14.2334842159937,-75.5735306802363));
            map.setZoom(9);
            break;
        case '12':
            kmlJuninLayer.setMap(map);
            map.setCenter(new google.maps.LatLng(-11.5436597300396,-74.8749510303952));
            map.setZoom(8);
            break;
        case '13':
            kmlLibertadLayer.setMap(map);
            map.setCenter(new google.maps.LatLng(-7.9169754349312,-78.3810111865851));
            map.setZoom(8);
            break;
        case '14':
            kmlLambayequeLayer.setMap(map);
            map.setCenter(new google.maps.LatLng(-6.36380361377563,-79.8249923276084));
            map.setZoom(8);
            break;
        case '15':
            kmlLimaLayer.setMap(map);
            map.setCenter(new google.maps.LatLng(-11.7866731456649, -76.6324097107669));
            map.setZoom(8);
            break;
        case '16':
            kmlLoretoLayer.setMap(map);
            map.setCenter(new google.maps.LatLng(-4.12302517090165,-74.4265053944273));
            map.setZoom(7);
            break;
        case '17':
            kmlMadreLayer.setMap(map);
            map.setCenter(new google.maps.LatLng(-11.9781015474597,-70.5450541729619));
            map.setZoom(9);
            break;
        case '18':
            kmlMoqueguaLayer.setMap(map);
            map.setCenter(new google.maps.LatLng(-16.8651923223222,-70.8510673506577));
            map.setZoom(8);
            break;
        case '19':
            kmlPascoLayer.setMap(map);
            map.setCenter(new google.maps.LatLng(-10.4033365152324,-75.3099258151342));
            map.setZoom(9);
            break;
        case '20':
            kmlPiuraLayer.setMap(map);
            map.setCenter(new google.maps.LatLng(-5.12938480280296 , -80.3297169479797));
            map.setZoom(8);
            break;
        case '21':
            kmlPunoLayer.setMap(map);
            map.setCenter(new google.maps.LatLng(-14.9320741925803, -69.9489916069943));
            map.setZoom(8);
            break;
        case '22':
            kmlMartinLayer.setMap(map);
            map.setCenter(new google.maps.LatLng(-7.03440262104589,-76.7157680323349));
            map.setZoom(9);
            break;
        case '23':
            kmlTacnaLayer.setMap(map);
            map.setCenter(new google.maps.LatLng(-17.6416549925828, -70.2785118500858));
            map.setZoom(8);
            break;
        case '24':
            kmlTumbesLayer.setMap(map);
            map.setCenter(new google.maps.LatLng(-3.85033718439041,-80.541902047432));
            map.setZoom(9);
            break;
        case '25':
            kmlUcayaliLayer.setMap(map);
            map.setCenter(new google.maps.LatLng(-9.61980385850328, -73.4371206808515));
            map.setZoom(8);
            break;
      }
      
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

    function puntosGPS(departamento,provincia,distrito,tipoarea,opinion){

        $.getJSON(urlRoot('index.php')+'/mapa/resultados/busqueda', {dpto:departamento,prov:provincia,dist:distrito,area:tipoarea,opt:opinion}, function(data, textStatus) {
                
                clean_map();

                $.each(data, function(i, datos){

                    var contentString="<div>"+
                    "<div><strong>Codigo de local: </strong>"+datos.codigo_de_local+"<br /></div>"+
                    "<div><strong>Nombre de Colegios: </strong><br /></div>"+
                    "<div><strong>Predio: </strong>"+datos.Nro_Pred+"<br /></div>"+
                    "<strong>Departamento: </strong>"+datos.dpto_nombre+"<br />"+
                    "<strong>Provincia: </strong>"+datos.prov_nombre+"<br />"+
                    "<strong>Distrito: </strong>"+datos.dist_nombre+"<br />"+
                    "<strong>Tipo de Area: </strong>"+datos.des_area+"<br />"+
                    "<strong>1. Mantenimiento: </strong>"+datos.OT_1+"<br />"+
                    "<strong>2. Reforzamiento Estruc.: </strong>"+datos.OT_2+"<br />"+
                    "<strong>3. Demolicion: </strong>"+datos.OT_3+"<br />"+
                    "<strong>Total Edificaciones: </strong>"+datos.Tot_Ed+"<br />"+
                    "<strong>Total Aulas: </strong><br />"+
                    "</div>";
                    
                    var point = new google.maps.LatLng(datos.UltP_Latitud,datos.UltP_Longitud);
                    var marker = createMarkerLEN(point, datos.codigo_de_local, contentString,'punto', datos.R_OT);
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
  </select></div></div>

  <div class="row-fluid control-group span9">
    <label class="preguntas_sub2" for="NOM_PROV">PROVINCIA</label>
    <div class="controls">
    <select id="NOM_PROV" class="span12" name="NOM_PROV">
      <option value="0">SELECCIONE...</option>
    </select>
    </div>
  </div>

  <div class="row-fluid control-group span9">
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


</div>

<!-- <div class="coordenadas_map preguntas_sub2 span2" id="edit_gps">

 
    <div>
      <h5>Actualizar Coordenadas <span id="id_local"></span></h5>
    </div>

    <input type="text" class="edit_gps" id="user_id" style="width:155px" value="<?php #echo $user_id ?> ">
    <label>Local Escolar:</label>
    <input type="text" class="edit_gps" id="local" style="width:155px">
    <label>Predio:</label>
    <input type="text" class="edit_gps" id="predio" style="width:155px">
    <label>Latitud:</label>
    <input type="text" class="edit_gps" id="latitud" style="width:155px">
    <label>Longitud:</label>
    <input type="text" class="edit_gps" id="longitud" style="width:155px">


    <button type="submit" id="save_edit" class="btn">Actualizar</button>
    <button type="submit" id="cancel_edit" class="btn">Cancelar</button>
 

</div> -->


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