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
      function createMarkerLEN(latlng,name,html,category,icon,texto) {
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
            case '4':
                color=urlRoot('web/')+'img/infra/ot4.png';
              break;
            case '5':
                color=urlRoot('web/')+'img/infra/ot5.png';
              break;
            case '6':
                color=urlRoot('web/')+'img/infra/ot6.png';
              break;
            case '7':
                color=urlRoot('web/')+'img/infra/ot7.png';
              break;
          }


          var marker = new MarkerWithLabel({
              draggable: true,
              raiseOnDrag: false,
              position: latlng,
              map: map,
              icon: color,
              title: name,
              zIndex: Math.round(latlng.lat()*-100000)<<5,
              labelContent: texto,
              labelAnchor: new google.maps.Point(22, 0),
              labelClass: "glabels", // the CSS class for the label
              labelStyle: {opacity: 0.75}
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
                var Local_Predio=texto.split('-');
                document.getElementById('local').value = Local_Predio[0];
                document.getElementById('predio').value = Local_Predio[1];

                $('#edit_gps').slideDown(200);

              });

      }

      function initialize() {
          var myOptions = {
            zoom: 6,
            center: new google.maps.LatLng(-7.1663,-71.455078),
            // mapTypeId: google.maps.MapTypeId.ROADMAP,
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

    }


    </script>

    <script type="text/javascript">

    $(document).ready(function() {

        initialize();

        combo_dpto();

        $('#infra').hide();

        $('#NOM_PROV').attr('disabled', true);

        $('#RESULTADO').change(function(event) {

          switch( $(this).val() )
          {
            case '1':
              $('#infra').show();
              $('#OP_TECNICA').val(0);
              break;
            default:
              $('#infra').hide();
              break;
          }

        });

        $('#OP_TECNICA').change(function(event) {

           puntosGPS($('#NOM_DPTO').val(),$('#NOM_PROV').val(),$('#OP_TECNICA').val());

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

          $('#NOM_PROV').attr('disabled', false);

          $.each(data, function(i, datos) {

            html+='<option value="'+datos.CCPP+'">'+datos.Nombre+'</option>';

          });

          $('#NOM_PROV').html(html);

          $('#NOM_PROV').change(function(event) {
            $('#RESULTADO').val(0);
            $('#RESULTADO').trigger('change');
            $('#OP_TECNICA').val(0);
          });

        }).fail(function( jqxhr, textStatus, error ) {

          var err = textStatus + ', ' + error;
          console.log( "Request Failed: " + err);

        });
    }

    function puntosGPS(departamento,provincia,opinion){

        $.getJSON(urlRoot('index.php')+'/mapa/resultados/busqueda', {dpto:departamento,prov:provincia,opt:opinion}, function(data, textStatus) {

                for (var i=0; i<gmarkers.length; i++) {
                        if (gmarkers[i].mycategory == 'punto') {
                            gmarkers[i].setVisible(false);
                     }
                }
                infowindow.close();

                $.each(data, function(i, datos){

                    var contentString="<div>"+
                    "<div><strong>Codigo de local: </strong>"+datos.codigo_de_local+"<br /></div>"+
                    "<div><strong>Predio: </strong>"+datos.Nro_Pred+"<br /></div>"+
                    "<strong>Departamento: </strong>"+datos.dpto_nombre+"<br />"+
                    "<strong>Provincia: </strong>"+datos.prov_nombre+"<br />"+
                    "<strong>Distrito: </strong>"+datos.dist_nombre+"<br />"+
                    "<strong>Tipo de Area: </strong>"+datos.des_area+"<br />"+
                    "<strong>1. Mantenimiento: </strong>"+datos.OT_1+"<br />"+
                    "<strong>2. Reforzamiento Estruc.: </strong>"+datos.OT_2+"<br />"+
                    "<strong>3. Demolicion: </strong>"+datos.OT_3+"<br />"+
                    "<strong>Total Edificaciones: </strong>"+datos.Tot_Ed+"<br />"+
                    "</div>";
                    
                    var point = new google.maps.LatLng(datos.UltP_Latitud,datos.UltP_Longitud);
                    var marker = createMarkerLEN(point, datos.codigo_de_local, contentString,'punto', datos.R_OT, datos.codigo_de_local+" - Predio:"+datos.Nro_Pred+" - T.E:"+datos.Tot_Ed);
                });

            });

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
      <option value="4">TODOS</option>
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
    <div class="span9">
      <p>LEYENDA:  <img src="<?php echo base_url('img/infra/ot1.png') ; ?>" />  Mantenimiento, <img src="<?php echo base_url('img/infra/ot2.png') ; ?>" /> Rehabilitación, <img src="<?php echo base_url('img/infra/ot3.png') ; ?>" /> Demolición</p>
    </div>

    <div class="span3">
      <p class="pull-right">OPINIÓN TÉCNICA INICIAL</p>
     
    </div>    

 

  </div>
</div>
</div>

  </body>
</html>