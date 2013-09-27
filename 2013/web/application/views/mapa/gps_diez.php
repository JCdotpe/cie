<!DOCTYPE html>
<html>
  <head>
    <title>Puntos GPS del Local Escolar</title>
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
          <?php echo "var myLatlng2 = new google.maps.LatLng(".$_REQUEST['lat2'].",".$_REQUEST['long2'].");"; ?>
          <?php echo "var myLatlng3 = new google.maps.LatLng(".$_REQUEST['lat3'].",".$_REQUEST['long3'].");"; ?>
          <?php echo "var myLatlng4 = new google.maps.LatLng(".$_REQUEST['lat4'].",".$_REQUEST['long4'].");"; ?>
          <?php echo "var myLatlng5 = new google.maps.LatLng(".$_REQUEST['lat5'].",".$_REQUEST['long5'].");"; ?>
          <?php echo "var myLatlng6 = new google.maps.LatLng(".$_REQUEST['lat6'].",".$_REQUEST['long6'].");"; ?>
          <?php echo "var myLatlng7 = new google.maps.LatLng(".$_REQUEST['lat7'].",".$_REQUEST['long7'].");"; ?>
          <?php echo "var myLatlng8 = new google.maps.LatLng(".$_REQUEST['lat8'].",".$_REQUEST['long8'].");"; ?>
          <?php echo "var myLatlng9 = new google.maps.LatLng(".$_REQUEST['lat9'].",".$_REQUEST['long9'].");"; ?>
          <?php echo "var myLatlng10 = new google.maps.LatLng(".$_REQUEST['lat10'].",".$_REQUEST['long10'].");"; ?>
          var mapOptions = {
            zoom: 14,
            center: myLatlng,
            mapTypeId: google.maps.MapTypeId.ROADMAP
          }

          var map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);

          var marker = new google.maps.Marker({
            position: myLatlng,
            map: map,
            title: 'Punto 1'
          });

          var marker = new google.maps.Marker({
            position: myLatlng2,
            map: map,
            title: 'Punto 2'
          });

          var marker = new google.maps.Marker({
            position: myLatlng3,
            map: map,
            title: 'Punto 3'
          });

          var marker = new google.maps.Marker({
            position: myLatlng4,
            map: map,
            title: 'Punto 4'
          });

          var marker = new google.maps.Marker({
            position: myLatlng5,
            map: map,
            title: 'Punto 5'
          });

          var marker = new google.maps.Marker({
            position: myLatlng6,
            map: map,
            title: 'Punto 6'
          });

          var marker = new google.maps.Marker({
            position: myLatlng7,
            map: map,
            title: 'Punto 7'
          });

          var marker = new google.maps.Marker({
            position: myLatlng8,
            map: map,
            title: 'Punto 8'
          });

          var marker = new google.maps.Marker({
            position: myLatlng9,
            map: map,
            title: 'Punto 9'
          });

          var marker = new google.maps.Marker({
            position: myLatlng10,
            map: map,
            title: 'Punto 10'
          });


      }

      google.maps.event.addDomListener(window, 'load', initialize);

    </script>
  </head>
  <body>
    <div id="map-canvas"></div>
  </body>
</html>