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
    <script src="<?php echo base_url('js/map/markcluster.js'); ?>"></script>
    <script>

    function initialize() {
       var neighborhoods = [
    <?php     
 
        $data = $this->Procedure_model->Lista_Last_Gps();
        $x=0;  
          foreach($data->result() as $filas){
            $x++;

    ?>

         <?php echo "google.maps.LatLng(".$filas->LatitudPunto.",".$filas->LongitudPunto."),"; ?>
            
            
    
    <?php 

         }

    ?>

           ];

          var markers = [];
          var iterator = 0;

          var map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);

          function addMarker() {
              markers.push(new google.maps.Marker({
                position: neighborhoods[iterator],
                map: map,
                draggable: false,
                animation: google.maps.Animation.DROP
              }));
              iterator++;
          }

     

      }



      google.maps.event.addDomListener(window, 'load', initialize);

    </script>
  </head>
  <body>
    <div id="map-canvas"></div>
  </body>
</html>