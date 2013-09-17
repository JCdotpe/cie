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

    <?php     
 
        $data = $this->Procedure_model->Lista_Last_Gps();
        $x=0;  
          foreach($data->result() as $filas){
            $x++;

    ?>

         

           var marker<?php echo $x; ?> = new MarkerWithLabel({
             position: myLatlng<?php echo $x; ?>,
             draggable: true,
             raiseOnDrag: true,
             map: map,
             labelContent: <?php echo "'".$filas->codigo_de_local." - ".$filas->nro_pred."'"; ?>,
             labelAnchor: new google.maps.Point(22, 0),
             labelClass: "labels", // the CSS class for the label
             labelStyle: {opacity: 1.0}
           });

       
          
          var contentString<?php echo $x; ?>="<table>"+
            "<thead>"+
              "<tr>"+
              "<th colspan='9' style='text-align:center;'>Punto GPS</th>"+
              "</tr>"+
              "<tr>"+
              "<th>Local</th>"+
              "<th>Predio</th>"+
              "<th>Departamento</th>"+
              "<th>Provincia</th>"+
              "<th>Distrito</th>"+
              "<th>Longitud</th>"+
              "<th>Latitud</th>"+
              "<th>Altitud</th>"+
              "<th>cedula</th>"+
              "</tr>"+
            "</thead>"+
            "<tbody>"+
              "<td><?php echo $filas->codigo_de_local; ?></td>"+
              "<td><?php echo $filas->nro_pred; ?></td>"+
              "<td><?php echo $filas->Departamento; ?></td>"+
              "<td><?php echo $filas->Provincia; ?></td>"+
              "<td><?php echo $filas->Distrito; ?></td>"+
              "<td><?php echo $filas->LongitudPunto; ?></td>"+
              "<td><?php echo $filas->LatitudPunto; ?></td>"+
              "<td><?php echo $filas->AltitudPunto; ?></td>"+
              "<td><a href='#'>Cedula</a></td>"+
            "</tbody>"+
          "</table>";



          var infowindow<?php echo $x; ?> = new google.maps.InfoWindow({
            content: contentString<?php echo $x; ?>,
          });

          google.maps.event.addListener(marker<?php echo $x; ?>, 'click', function() {
            infowindow<?php echo $x; ?>.open(map,marker<?php echo $x; ?>);
          });

          var markerCluster = new MarkerClusterer(map, marker<?php echo $x; ?>);
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