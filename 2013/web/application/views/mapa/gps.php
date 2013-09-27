<!DOCTYPE html>
<html>
  <head>
    <title>Ultima toma de Punto GPS del Local Escolar</title>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
    <style>
      html, body, #map-canvas {
        margin: 0;
        padding: 0;
        height: 100%;
      }
    </style>
    <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false"></script>
    <script>

      function initialize() {
          <?php echo "var myLatlng = new google.maps.LatLng(".$_REQUEST['lat1'].",".$_REQUEST['long1'].");"; ?>
             var mapOptions = {
            zoom: 14,
            center: myLatlng,
            mapTypeId: google.maps.MapTypeId.ROADMAP
          }

          var map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);

          var marker = new google.maps.Marker({
            position: myLatlng,
            map: map,
            title: 'Punto GPS'
          });

      }

      google.maps.event.addDomListener(window, 'load', initialize);

    </script>
  </head>
  <body>
    <div id="map-canvas"></div>
  </body>
</html>