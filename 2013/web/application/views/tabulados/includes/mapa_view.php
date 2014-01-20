<script src="http://cdnjs.cloudflare.com/ajax/libs/openlayers/2.12/OpenLayers.js"></script>
<!--<script type="text/javascript"  src="<?php echo base_url('js/openlayers/OpenLayers.js'); ?>"></script>-->
<!--<script type="text/javascript"  src="cenpesco/js/openlayers/OpenLayers.js"></script>-->


	<div style="text-align: center">

	</div>

    <div class="tab-content inei">

          <div id="feature_map" class="hidden-phone tab-pane active" >
          		<div class="row-fluid">
          				<div class="span2" style="position:relative;top:210px;">

			          			<div> 
								    <div class="btn-group">
								        <button class="btn btn-warning">Variables del tabulado</button>
								        <button data-toggle="dropdown" class="btn-warning btn dropdown-toggle"><span class="caret"></span></button>
								        <ul id="combo-map" class="dropdown-menu">
				          					<?php $v=0;
				          						foreach ($series as  $y) {
				          							foreach ($y as $i => $k) {
				          								echo (  ($i == 'name' &&  $k != 'No especificado' && $k != 'TOTAL' ) ? '<li value='.$v.'><a >'. $k.'</a></li>' :'' );
				          							}
				          							$v++;
				          						}
				          				 	?>
								        </ul>
								    </div>


			          			</div >
			          			<hr>

          				</div>
						<div class="span7">	<div id="map-tematico" class="hidden-phone" style="height:1010px; width:928px; margin: 0 auto !important;"> </div> </div>
						<!-- <div class="span3" style="margin-left:0px;"><input class="btn-warning btn" type="button" value="IMPRIMIR" onclick="PrintElem('#map-tematico');" /><div id="image_var" style="position:relative;top:550px;"></div></div> -->
				</div>
          </div>

    </div>

	<script type="text/javascript">
		var mi_json;

		$(function(){ // carga al inicio		

			var mi_json = (function () {
		
			    var json = null;
			    $.ajax({
			        'async': false,
			        'global': false,
			        'url': CI.base_url + '/json/mapa.json',
			        'dataType': "json",
			        'success': function(data) {
			            json = data;
			        }
			    });
			    return json;
			})(); 



			function init_tematico(var_num){
				$("#map-tematico").empty();
			    var valor_min = 100;
			    var valor_medio = 0;
			    var valor_max = 0;
			    var valor_acu = 0;

			    for (var i = 0; i < 25; i++) {
			    	if (valor_dep[var_num][i] > valor_max) {
			    		valor_max = valor_dep[var_num][i];
			    	} 
			    	if (valor_dep[var_num][i] < valor_min) {
			    		valor_min = valor_dep[var_num][i];
			    	}
			    };
			    valor_min =  Math.floor(valor_min);
			    valor_acu = Math.round(((valor_max-valor_min)/3));
			    if (valor_acu ==0) {valor_acu = 0.5;};
			    valor_medio = valor_min + valor_acu;
			    //valor_medio = 248;
			    valor_max = valor_medio+valor_acu; 					    	

			    var tipo_dato = 'PORCENTAJE %'; var resto = 0.1;
			    if(valor_max>100){tipo_dato = 'ABSOLUTO'; resto = 1;};

			    //$("#map-tematico").html('<div><div style="position:absolute;"><div id="img_mapa"style="position:absolute;" class="row-fluid"> </div>  <div id="title"></div> 	</div>	<div id="porcentaje"> <strong>' + tipo_dato + '</strong> </div> 	<div id="cuadro_uno"><div class="cuadro_porc" id="cuadro_num1"></div> </div> <div id="cuadro_dos"><div class="cuadro_porc" id="cuadro_num2"></div> </div>  <div id="cuadro_tres"><div class="cuadro_porc" id="cuadro_num3"></div> </div>  </div>');
			    $("#map-tematico").html('<div style="position:relative;"><div ><div id="img_mapa"style="position:absolute;" class="span12"> </div>   	</div>	<div id="porcentaje"> <strong>' + tipo_dato + '</strong> </div> 	<div id="cuadro_uno"><div class="cuadro_porc" id="cuadro_num1"></div> </div> <div id="cuadro_dos"><div class="cuadro_porc" id="cuadro_num2"></div> </div>  <div id="cuadro_tres"><div class="cuadro_porc" id="cuadro_num3"></div> </div>  </div>');
			    $("#img_mapa").append('<div class = "span2" style = "position:relative"><img style="margin-top: 2.5px;height: 103px;" src="<?php echo  base_url('img/inei.gif'); ?>"/>');
			    $("#img_mapa").append("<div id='title' class='span8' style='margin:0px;'><h3><strong> "+ name_mapa[var_num] + "</strong></h3><div>");			    
			    $("#img_mapa").append('<div class = "span2" style = "position:relative;left:60px"><img style="margin-top: 2.5px;height: 105px;" src="<?php echo  base_url('img/cenpesco.png'); ?>"/>');

			 	// var imagen = new Image();
			 	// imagen.src = "<?php echo  base_url('img/tabulados/cuadro'.$opcion.'.jpg'); ?>";
				// imagen.onload = function(){
				// if (imagen.width >0 ) { $("#img_mapa").html("<img style='margin-top: 2.5px;height: 168px;' src='<?php echo  base_url('img/tabulados/cuadro'.$opcion.'.jpg'); ?>'  />");  }; //CHECK EXIST

				// }

			    //$("#title").html("<h3>MAPA TEMÁTICO N° <?php echo sprintf('%02d', $opcion); ?> </h3><h3><strong> "+ name_mapa[var_num] + "</strong></h3>");
			    $("#cuadro_num1").html("<strong>De "+valor_min+" - "+ (valor_medio-resto)+" </strong>");
			    $("#cuadro_num2").html("<strong>De "+valor_medio+" - "+ (valor_max-resto)+" </strong>");
			    $("#cuadro_num3").html("<strong>De "+valor_max+" a más </strong>");

    var options = { 
    	// scales: [50000000000000, 30000000000000, 1000000000000, 5000000000000000],
     //                resolutions: [100000.40625,111000000.703125,110000010.3515625,111000010.17578125,111000010.087890625,100000000.0439453125],
     //                minScale: 5000000000000,
     //                maxResolution: 1500,
     //                maxExtent: new OpenLayers.Bounds(-1800, -900, 18000, 90000),
     //                maxResolution: 0.17578125,
     //                maxScale: 10000000000000,
     //               minResolution: 1500,
     //                minExtent: new OpenLayers.Bounds(-10, -10, 10000, 100000),
     //                minResolution: 1000.0439453125,
     //               numZoomLevels: 8,
     //                units: "degrees"
                    // h:1500,
                    // w:2000,
                  };
			    map_thematic = new OpenLayers.Map('map-tematico',{
			    	    controls: [
				    ]},
    			options);
			    var vectors = new OpenLayers.Layer.Vector("vector", {isBaseLayer: true});
			    map_thematic.addLayers([vectors]);

					    	$.each(mi_json, function(index) {
					    		var geo = mi_json[index].geo;
					    		var cen = mi_json[index].cen;
					    		var ubi = mi_json[index].ubi;
					    		var valor = (valor_dep[var_num][index]).toFixed(1);							    		
					    		var nom = mi_json[index].nom;
					    		if (index == 4 || index == 5) { nom = '\n'+ nom };//<br> a CAJAMARCA Y AYACUCHO
					    		
					    		nom = nom +'\n' + ((valor.toString()).replace(".",","));
					    		nom = nom + '\n' + '[' + valor_dep_abs[var_num][index] + ']'; 

					    		var format = new OpenLayers.Format.WKT();
					    		var createPOLYGON = format.read("POLYGON(("+geo+"))");
					    		
					    		createPOLYGON.attributes = {cen: cen, nom: nom, ubi: ubi, valor: valor};
					    		
					            var m1 = "#D8E4BC";
					            var m2 = "#95B3D7";
					            var m3 = "#E26B0A";

					            // porcentaje
						            if(valor < valor_medio){
						                thematic = m1;
						            }else if(valor < valor_max){
						                thematic = m2;
						            }else if(valor >= valor_max){
						                thematic = m3;
						            }else{
						            	alert('medio: '+valor_medio + ', max: ' + valor_max + ', valor: ' + valor);
						            }
						        //    
												    		
					    		if (index == 6 ) { tex_align = 'rt' }else if(index == 14){tex_align = 'cb'}else{tex_align = 'cc'};//align especial para Callao y Lima
					    		createPOLYGON.style = {fill: true, fillColor: thematic, strokeWidth: "1", strokeColor: "#F3C768", label:nom,fontFamily: "Calibri", fontSize:"14",fontOpacity: 0.9,labelAlign: tex_align,};

					    		vectors.addFeatures(createPOLYGON);

					        });// end each data


			    // Map Center 
			    var lon = -75.240009714081; 
			    var lat = -9.750000000075;
			    var zoom = 6;
			    map_thematic.setCenter(new OpenLayers.LonLat(lon, lat), zoom);
			   //map_thematic.size.h = 300;
			    
			} // end init


			$("ul li").click(function(e) {
				if( $(this).parent().attr('id') == "combo-map"){
					init_tematico($(this).val()); 
					$("#image_var").empty();
					var url = "<?php echo  base_url('img/tabulados/cuadro'.$opcion); ?>" + "-" + (parseInt($(this).val()) + 1) + ".png";
					$.ajax({	
							url:url,
							type:'HEAD',
							error:function() { console.log('error de imagen al cargar') }, 
							success: function(){ $("#image_var").html("<img style='margin-top: 2.5px;height: 168px;' src='"+ url +"'  /><hr size='3'>") },
					});						
				}
			});



			//$("#combo_map").trigger('change');
			init_tematico(0);
			var url = "<?php echo  base_url('img/tabulados/cuadro'.$opcion); ?>" + "-1.png";
			$.ajax({	
					url:url,
					type:'HEAD',
					error:function(){console.log('error de imagen al cargar')}, 
					success: function(){ $("#image_var").html("<img style='margin-top: 2.5px;height: 168px;' src='"+ url +"'  /><hr size='3'>") },
			});
			// var image = new Image(); 
			// image.src = url; alert(url);
			// if (image.width == 0) {
			//   alert("no image");
			// }else{
			// 	$("#image_var").html("<img style='margin-top: 2.5px;height: 168px;' src='"+ url +"'  /><hr size='3'>");
			// }






				
		    function PrintElem(elem)
		    {

					// $("#map-tematico").printThis({
					//       debug: false,              //* show the iframe for debugging
					//       importCSS: true,          //* import page CSS
					//       printContainer: true,      //* grab outer container as well as the contents of the selector
					//       loadCSS: "path/to/my.css", //* path to additional css file
					//       pageTitle: "",             //* add title to print page
					//       removeInline: false        //* remove all inline styles from print elements
					//   });



		       		Popup($(elem).html());
		    }

		    function Popup(data) 
		    {
		        var mywindow = window.open('', 'my div', 'height=1160,width=928');
		        mywindow.document.write('<html><head><title>my div</title>');
		        /*optional stylesheet*/ //
		        mywindow.document.write('<link rel="stylesheet" href="<?php echo base_url('css/main.css'); ?>" type="text/css" />');
		        mywindow.document.write('<link rel="stylesheet" href="<?php echo base_url('css/bootstrap.min.css'); ?>" />');
		        mywindow.document.write('<link rel="stylesheet" href="<?php echo base_url('css/bootstrap.spacelab.css'); ?>" />');
		        mywindow.document.write('<link rel="stylesheet" href="<?php echo base_url('css/bootstrap-responsive.min.css'); ?>" />');
		        mywindow.document.write('</head><body >');
		        mywindow.document.write(data);
		        mywindow.document.write('</body></html>');

		        mywindow.print();
		        mywindow.close();

		        return true;
		    }

		})	
	</script>
