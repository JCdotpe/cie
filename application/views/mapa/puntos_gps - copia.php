<!DOCTYPE html>
<html>
  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

    <title>Georeferenciación de Locales Escolares</title>
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
       .labels {
         color: black;
         font-family: "Lucida Grande", "Arial", sans-serif;
         font-size: 15px;
         font-weight: bold;
         text-align: center;
         width: auto;
         white-space: nowrap;
         background: yellow;
         padding: 3px;
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
    bottom: 50px;
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

    function initialize() {

    <?php     
 
        $data = $this->Procedure_model->Lista_Last_Gps();
        $x=0;  
          foreach($data->result() as $filas){
            $x++;

    ?>
      
          <?php echo "var myLatlng".$x." = new google.maps.LatLng(".$filas->LatitudPunto.",".$filas->LongitudPunto.");"; ?>
            var mapOptions = {
      zoom: 6,
      center: new google.maps.LatLng(-7.1663,-71.455078),
      mapTypeId: google.maps.MapTypeId.ROADMAP,
zoomControl: true,
zoomControlOptions: {
    style: google.maps.ZoomControlStyle.LARGE,
    position: google.maps.ControlPosition.RIGHT_CENTER
},
streetViewControl: true,
streetViewControlOptions: {
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
             icon: <?php if($filas->Tipo==0){echo "image2";}else{echo "image";} ?>
           });
          
          var contentString<?php echo $x; ?>="<div>"+
              "<strong>Codigo de local: </strong><?php echo $filas->codigo_de_local; ?><br />"+
              "<strong>Predio: </strong><?php echo $filas->nro_pred; ?> (<?php if($filas->Tipo==0){echo 'Principal o Colindante';}else{echo 'No Colindante';} ?>)<br />"+
              "<strong>Departamento: </strong><?php echo $filas->Departamento; ?><br />"+
              "<strong>Provincia: </strong><?php echo $filas->Provincia; ?><br />"+
              "<strong>Distrito: </strong><?php echo $filas->Distrito; ?><br />"+
              "<strong>Latitud: </strong><?php echo $filas->LatitudPunto; ?><br />"+
              "<strong>Longitud: </strong><?php echo $filas->LongitudPunto; ?><br />"+
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
    <script type="text/javascript">
   
    $(document).ready(function() {
          
        combosede();

/*        $('#NOM_SEDE').on('click', '.cmbsede', function(event) {
          
            comboprovincia($(this).val());
          
        });
*/
        

        $('#NOM_PROV').attr('disabled', true);    
    });

    function combosede(){

        $.getJSON(urlRoot('index.php')+'/visor/gps/sedeOperativa', {token: getToken()}, function(data, textStatus) {
          
          var html='<option value="">SELECCIONE...</option>';

          $.each(data, function(index, val) {
            
            html+='<option class="cmbsede" value="'+val.cod_sede_operativa+'">'+val.sede_operativa+'</option>';

          });

          $('#NOM_SEDE').html(html);

          $('#NOM_SEDE').change(function(event) {
            comboprovincia($(this).val());
          });

        }).fail(function( jqxhr, textStatus, error ) {
        
          var err = textStatus + ', ' + error;
          console.log( "Request Failed: " + err);
        
        });
      
    }   

     function comboprovincia(code){

        $.getJSON(urlRoot('index.php')+'/visor/gps/provinciaOperativa', {token: getToken(),code:code}, function(data, textStatus) {
          
          var html='<option value="00">SELECCIONE...</option>';

          $('#NOM_PROV').attr('disabled', false);
          
          $.each(data, function(index, val) {
            
            html+='<option value="'+val.cod_prov_operativa+'">'+val.prov_operativa_ugel+'</option>';

          });

          $('#NOM_PROV').html(html);

        }).fail(function( jqxhr, textStatus, error ) {
        
          var err = textStatus + ', ' + error;
          console.log( "Request Failed: " + err);
        
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



<div class="filtro_map preguntas_sub2 span2"><div class="row-fluid control-group span9">
<label class="preguntas_sub2" for="NOM_SEDE">SEDE OPERATIVA</label>
<div class="controls span">
<select id="NOM_SEDE" class="span12" name="NOM_SEDE">
<!-- <option value="01">AMAZONAS</option>
<option value="04">APURIMAC</option>
<option value="05">AREQUIPA</option>
<option value="06">AYACUCHO</option>
<option value="07">CAJAMARCA</option>
<option value="03">CHIMBOTE</option>
<option value="08">CUSCO</option>
<option value="09">HUANCAVELICA</option>
<option value="10">HUANUCO</option>
<option value="02">HUARAZ</option>
<option value="11">ICA</option>
<option value="12">JUNIN</option>
<option value="13">LA LIBERTAD</option>
<option value="14">LAMBAYEQUE</option>
<option value="15">LIMA</option>
<option value="16">LORETO</option>
<option value="17">MADRE DE DIOS</option>
<option value="18">MOQUEGUA</option>
<option value="22">MOYOBAMBA</option>
<option value="19">PASCO</option>
<option value="20">PIURA</option>
<option value="21">PUNO</option>
<option value="24">TACNA</option>
<option value="23">TARAPOTO</option>
<option value="25">TUMBES</option>
<option value="26">UCAYALI</option> -->
</select></div></div>

<div class="row-fluid control-group span9">
  <label class="preguntas_sub2" for="NOM_DD">PROVINCIA</label>
  <div class="controls">
  <select id="NOM_PROV" class="span12" name="NOM_PROV">
    
  </select>
  </div>
</div>

<div class="row-fluid control-group span9">
  <label class="preguntas_sub2" for="PERIODO">PERIODO</label>
  <div class="controls">
  <select id="PERIODO" class="span12" name="PERIODO">
    <option value="-1">SELECCIONE...</option>
    <option value="1">1</option>
    <option value="2">2</option>
    <option value="3">3</option>
    <option value="4">4</option>
    <option value="5">5</option>
    <option value="6">6</option>
    <option value="7">7</option>
    <option value="8">8</option>
    <option value="9">9</option>
    <option value="10">10</option>
    <option value="11">11</option>
    <option value="12">12</option>
    <option value="13">13</option>
    <option value="14">14</option>
  </select>
  </div>
</div>


</div>


<div id="footer">
<div class="container-fluid">
  <div class="row-fluid">
    <div class="span9">
      <p>AVANCE DE LA COBERTURA DE LOCALES ESCOLARES: 3845 / 49638 </p>
    </div>

    <div class="span3">
      <p class="pull-right">CENSO DE INFRAESTRUCTURA EDUCATIVA 2013</p>
    </div>    

  </div>
</div>
</div>  

  </body>
</html>