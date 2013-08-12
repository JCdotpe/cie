<script type="text/javascript" src="http://maps.google.com/maps/api/js?v=3&amp;sensor=false"></script>
<script src="<?php echo base_url('js/vendor/geoxmlv3.js'); ?>"></script>
<script src="<?php echo base_url('js/vendor/ProjectedOverlay.js'); ?>"></script>
<div class="row-fluid">
  <div id="ap-sidebar" class="span2">
  	<?php $this->load->view('convocatoria/includes/sidebar_view.php'); ?>
  </div>
  <div id="ap-content" class="span10">
<div id="map" style="width: 100%; height: 500px"></div>

<div class="accordion" id="accordion2">
  <div class="accordion-group">
    <div class="accordion-heading">
      <a id="acordion" class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseOne">
        Mostrar Datos Consolidados
      </a>
    </div>
    <div id="collapseOne" class="accordion-body collapse">
      <div class="accordion-inner">

			<table class="table table-hover table-condensed">
			              <thead>
			                <tr>
			                  <th>Departamento</th>
			                  <th>Centros Poblados</th>
			                  <th>Empadronadores</th>
			                  <th>Jefes de Brigada</th>
			                  <th>Asistente Dep.</th>
			                  <th>Total</th>
			                  <th>PEA a Capacitar</th>
			                  <th>Inscritos</th>
			                  <th>Seleccionados</th>
			                </tr>
			              </thead>
			              <tbody>

			        <?php $i = 0;foreach($ptsdep->result() as $p){ ?>
			                <tr class="<?= ($i++ % 2 == 0) ? "strip-table" : ""; ?>">
			                  <td><?php echo $p->departamento ?></td>
			                  <td><?php echo $p->centro_poblado ?></td>
			                  <td><?php echo $p->empadronador ?></td>
			                  <td><?php echo $p->jefe_brigada ?></td>
			                  <td><?php echo $p->asis_departamento ?></td>
			                  <td><?php echo $p->total_pea ?></td>
			                  <td><?php echo $p->pea_capacitar ?></td>
			                  <td style="color:green"><?php echo $nro[$p->ubigeo]->numero; ?></td>
			                  <td><?php echo $nrocap[$p->ubigeo]->numero; ?></td>
			                </tr>                               
			         <?php } 	?>       
			              </tbody>
			</table>
      </div>
    </div>
  </div>
</div>


  </div>
</div>
<?php $this->load->view('convocatoria/includes/footer_view.php'); ?>

<script type="text/javascript">

      var gmarkers = [];
      var map = null;
      var category = "";

      var infowindow = new google.maps.InfoWindow({ 
        size: new google.maps.Size(150,50)
        });

      
      function createMarkerLEN(latlng,name,html,category) {
          var contentString = html;           
          var marker = new google.maps.Marker({
              position: latlng,
              map: map,
              title: name,
              zIndex: Math.round(latlng.lat()*-100000)<<5
              });
              
              marker.mycategory = category;                                 
              marker.myname = name;

              gmarkers.push(marker);

              google.maps.event.addListener(marker, 'click', function() {
              infowindow.setContent(contentString); 
              infowindow.open(map,marker);
              });
      }

      function initialize() {
         var infowindow = null;
          var myOptions = {
            zoom: 5,
            center: new google.maps.LatLng(-7.1663,-71.455078),
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
        
          map = new google.maps.Map(document.getElementById("map"), myOptions);

          google.maps.event.addListener(map, 'click', function() {
            if (infowindow !== null) {
              google.maps.event.clearInstanceListeners(infowindow); 
              infowindow.close();
              infowindow = null;
            }
              });

          var kmlURL = CI.base_url + "kml/demo.kml?nocache|=" + Math.round(new Date().getTime());
          var kmlURL = "http://www.uxglass.com/kml/demo.kml?nocache|=" + Math.round(new Date().getTime());
          kmlLayer = new google.maps.KmlLayer(kmlURL, {preserveViewport:true});
          kmlLayer.setMap(map);


         
          }

    $("#acordion").click(function(e) { 
            
          e.preventDefault(); 
            
          goToByScroll($(this).attr("id"));           
      });
    
  	$(function(){
        initialize();

        <?php foreach($ptsdep->result() as $pt){
            $prev = explode(" ", $pt->CENTRO);
            echo 'var lat =' . $prev[1] . ';';
            echo 'var lng =' . $prev[0] . ';';                
            echo 'var point = new google.maps.LatLng(lat,lng);';
            echo 'var html = \'<div class="marker activeMarker"><div class="markerInfo activeInfo" style="display: block"><h3>' . $pt->DES_DISTRITO . '</h3><p><b>A Capacitar: </b>' . $pt->pea_capacitar . '</p><p><b>Inscritos: </b>' . $nro[$pt->ubigeo]->numero . '</p><p style="color:red"><b>Seleccionados: </b>' . $nrocap[$pt->ubigeo]->numero . '</p></div></div>\';';     
            echo 'var marker = createMarkerLEN(point, \'' . $pt->DES_DISTRITO . '\', html);';            
        } ?>      

              

    });
</script>

<?php  ?>