<!DOCTYPE html>
<html>
  <head>
    <title>Puntos GPS de Locales Escolares</title>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
    <style>
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
       .labels {
         color: black;
         font-family: "Lucida Grande", "Arial", sans-serif;
         font-size: 14px;
         font-weight: bold;
         text-align: center;
         width: auto;
         white-space: nowrap;
       }
   </style>
    
    <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false"></script>
    <script src="<?php echo base_url('js/map/markerwithlabel.js'); ?>"></script>
    <script src="<?php echo base_url('js/general/basic.js'); ?>"></script>
    <script>

    function initialize() {

    <?php     
 
        $data = $this->Procedure_model->Lista_Last_Gps();
        $x=0;  
          foreach($data->result() as $filas){
            $x++;

    ?>
      
          <?php echo "var myLatlng".$x." = new google.maps.LatLng(".$filas->LatitudPunto.",".$filas->LongitudPunto.");"; ?>
            var mapOptions = {
            zoom: 5,
            center: myLatlng<?php echo $x; ?>,
            mapTypeId: google.maps.MapTypeId.ROADMAP
          }
    
    <?php 

         }

    ?>

          var map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);

          var image = {
            url: urlRoot('cie/')+'img/colindante.png',
            // This marker is 20 pixels wide by 32 pixels tall.
            size: new google.maps.Size(40, 40),
            // The origin for this image is 0,0.
            origin: new google.maps.Point(0,0),
            // The anchor for this image is the base of the flagpole at 0,32.
            anchor: new google.maps.Point(0, 32)
          };

           var image2 = {
            url: urlRoot('cie/')+'img/nocolindante.png',
            // This marker is 20 pixels wide by 32 pixels tall.
            size: new google.maps.Size(40, 40),
            // The origin for this image is 0,0.
            origin: new google.maps.Point(0,0),
            // The anchor for this image is the base of the flagpole at 0,32.
            anchor: new google.maps.Point(0, 32)
          };

    <?php     
 
        $data = $this->Procedure_model->Lista_Last_Gps();
        $x=0;  
          foreach($data->result() as $filas){
            $x++;

    ?>

         

           var marker<?php echo $x; ?> = new MarkerWithLabel({
             position: myLatlng<?php echo $x; ?>,
             draggable: false,
             raiseOnDrag: true,
             map: map,
             labelContent: <?php echo "'".$filas->codigo_de_local." - ".$filas->nro_pred."'"; ?>,
             labelAnchor: new google.maps.Point(22, 0),
             labelClass: "labels", // the CSS class for the label
             labelStyle: {opacity: 1.0},
             icon: <?php if($filas->Tipo==0){echo "image";}else{echo "image2";} ?>
           });
          
          var contentString<?php echo $x; ?>="<div>"+
              "<strong>Codigo de local: </strong><?php echo $filas->codigo_de_local; ?><br />"+
              "<strong>Predio: </strong><?php echo $filas->nro_pred; ?> (<?php if($filas->Tipo==0){echo 'Principal o Colindante';}else{echo 'No Colindante';} ?>)<br />"+
              "<strong>Departamento: </strong><?php echo $filas->Departamento; ?><br />"+
              "<strong>Provincia: </strong><?php echo $filas->Provincia; ?><br />"+
              "<strong>Distrito: </strong><?php echo $filas->Distrito; ?><br />"+
              "<strong>Longitud: </strong><?php echo $filas->LongitudPunto; ?><br />"+
              "<strong>Latitud: </strong><?php echo $filas->LatitudPunto; ?><br />"+
              "<strong>Altitud: </strong><?php echo $filas->AltitudPunto; ?><br />"+
              "<a href='"+urlRoot('index.php/')+"visor/caratula1/?le=<?php echo obfuscate($filas->codigo_de_local); ?>&pr=1' target='_blank'>Cedula</a>"+
            "</div>";

          var infowindow<?php echo $x; ?> = new google.maps.InfoWindow({
            content: contentString<?php echo $x; ?>,
          });

          google.maps.event.addListener(marker<?php echo $x; ?>, 'click', function() {
            infowindow<?php echo $x; ?>.open(map,marker<?php echo $x; ?>);
          });
          
        <?php 

         }

        ?>

      }

      google.maps.event.addDomListener(window, 'load', initialize);

    </script>
  </head>
  <body>
    <div id="map-canvas"></div>
  </body>
</html>