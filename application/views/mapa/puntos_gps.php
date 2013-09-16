<!DOCTYPE html>
<html>
  <head>
    <title>Simple Map</title>
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
    
    <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false"></script>
    <script>

      function initialize() {
          <?php echo "var myLatlng = new google.maps.LatLng(".$_REQUEST['lat1'].",".$_REQUEST['long1'].");"; ?>
            var mapOptions = {
            zoom: 5,
            center: myLatlng,
            mapTypeId: google.maps.MapTypeId.ROADMAP
          }

          var map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);

          var marker = new google.maps.Marker({
            position: myLatlng,
            map: map,
            title: 'Punto 1',
            animation: google.maps.Animation.DROP
          });

         
          var contentString="<table style='margin-top:20px;' class='table table-bordered'>"+
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
              "<td>000118</td>"+
              "<td>1</td>"+
              "<td>Puno</td>"+
              "<td>Puno</td>"+
              "<td>Juliaca</td>"+
              "<td></td>"+
              "<td></td>"+
              "<td></td>"+
              "<td><a href='#'>Cedula</a></td>"+
            "</tbody>"+
          "</table>";

          var infowindow = new google.maps.InfoWindow({
            content: contentString
          });

          google.maps.event.addListener(marker, 'click', function() {
            infowindow.open(map,marker);
          });

      }

      google.maps.event.addDomListener(window, 'load', initialize);

    </script>
  </head>
  <body>
    <div id="map-canvas"></div>
  </body>
</html>