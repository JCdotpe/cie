<?php 



////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////
// CAP 3
////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////

$P3_1_1_LugGeoref = array(
	'name'	=> 'P3_1_1_LugGeoref',
	'id'	=> 'P3_1_1_LugGeoref',
	'maxlength'	=> 1,
	'class' => 'input1',
);

$P3_1_3_NroPtos = array(
	'name'	=> 'P3_1_3_NroPtos',
	'id'	=> 'P3_1_3_NroPtos',
	'maxlength'	=> 2,
	'class' => 'input2',	
	'disabled' => 'disabled',
);

$P3_1_4_ArchGPS = array(
	'name'	=> 'P3_1_4_ArchGPS',
	'id'	=> 'P3_1_4_ArchGPS',
	'class' => 'input98p',	
	'disabled' => 'disabled',		
);

$RutaFoto = array(
	'name'	=> 'RutaFoto',
	'id'	=> 'RutaFoto',
	'class' => 'input98p',	
	'disabled' => 'disabled',		
);

$Observaciones = array(
	'name'	=> 'Observaciones',
	'id'	=> 'Observaciones',
	'class' => 'textarea98',	
);

$CodigoPuntoGPS = array(
	'name'	=> 'CodigoPuntoGPS',
	'id'	=> 'CodigoPuntoGPS',
);

$LatitudPuntof = array(
	'name'	=> 'LatitudPuntof',
	'id'	=> 'LatitudPuntof',
	'class' => 'input10',		
	'disabled' => 'disabled',		
);

$LongitudPuntof = array(
	'name'	=> 'LongitudPuntof',
	'id'	=> 'LongitudPuntof',
	'class' => 'input10',			
	'disabled' => 'disabled',		
);

$AltitudPuntof = array(
	'name'	=> 'AltitudPuntof',
	'id'	=> 'AltitudPuntof',
	'class' => 'input10',		
	'disabled' => 'disabled',		
);


////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////
// CAPITULO 3
////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////

echo '

<div class="panel panel-info">
							<div class="panel-heading">
								<h5 class="panel-title">Capítulo III. Georeferenciación del local escolar</h5>
							</div>

							<table class="table table-bordered">
								<thead>
									<tr>
										<th colspan="3">Sección A:  georeferenciación del terreno con GPS</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td>1.</td>
										<td>
											<strong>Lugar de georeferenciación</strong>
										</td>
										<td>
											<label>
												'.form_input($P3_1_1_LugGeoref).'
											</label>
										</td>
									</tr>
									<tr>
										<td>2.</td>
										<td>
											<strong>Rango de puntos</strong>
										</td>
										<td>
											<table class="table table-bordered">
												<tbody><tr>
													<td>Punto Inicial</td>
													<td>'.form_input($P3_1_3_NroPtos).'</td>
												</tr>
												<tr>
													<td>Punto Final</td>
													<td>'.form_input($P3_1_3_NroPtos).'</td>
												</tr>
											</tbody>


											</table>

											<p><strong>Ver 10 puntos en el Mapa</strong><a class="map" href="#" target="_blank" id="map2f"><img alt="" src="'.base_url().'img/map.png"></a></p>
											<table class="table table-bordered" id="tcap3_n">
												</tbody>
													<tr>
													</tr>
												</tbody>
											</table>											
										</td>
									</tr>
									<tr>
										<td>3.</td>
										<td>
											<strong>Toma de última coordenada</strong>
										</td>

										<td>
											<table class="table table-bordered">
												<tbody><tr>
													<td></td>
													<th style="text-align:center;">Latitud</th>
													<th style="text-align:center;">Longitud</th>
													<th style="text-align:center;">Altitud (msnm)</th>
													<th style="text-align:center;">
														<strong>Ver punto final en el Mapa</strong>
													</th>
												</tr>
												<tr>
													<th>Punto Final</th>
													<td style="text-align:center;">'.form_input($LatitudPuntof).'</td>
													<td style="text-align:center;">'.form_input($LongitudPuntof).'</td>
													<td style="text-align:center;">'.form_input($AltitudPuntof).'</td>
													<td style="text-align:center;">
														<a class="map" href="#" target="_blank" id="map2"><img alt="" src="'.base_url().'img/map.png"></a>
													</td>
												</tr>
											</tbody></table>
										</td>
									</tr>
									<tr>
										<td>4.</td>
										<td>
											<strong>
												Nombre del archivo gps
											</strong>
											<br>(sólo si utilizó equipo gps)
										</td>
										<td>'.form_input($P3_1_4_ArchGPS).'</td>
									</tr>
									<tr>
										<td>5.</td>
										<td>
											<strong>Código de la fotografía del local escolar</strong>
										</td>
										<td>'.form_input($RutaFoto).'</td>
									</tr>
								</tbody>
							</table>

							<div class="panel">
								<label>Observaciones:</label>
								'.form_textarea($Observaciones).'
							</div>


						</div>

';

?>



<script type="text/javascript">

$(function(){
//car
$.each( <?php echo json_encode($cap3_i->row()); ?>, function(fila, valor) {
	   $('#' + fila).val(valor);
}); 



var ahua = <?php echo $cap3_n->num_rows(); ?>;

	if(ahua > 0){
	  for(var i=1; i<=ahua;i++){
	    var asd = '<tr class="">';
	    asd +='<td><input disabled="disabled" type="text" class="span12 embc' + i + '" name="LatitudPunto' + '_' + i + '" id="LatitudPunto' + '_' + i + '" value="" ><div class="help-block error"></div></td>';
	    asd +='<td><input disabled="disabled" type="text" class="span12 embc' + i + '" name="LongitudPunto' + '_' + i + '" id="LongitudPunto' + '_' + i + '" value="" ><div class="help-block error"></div></td>';
	    asd +='<td><input disabled="disabled" type="text" class="span12 embc' + i + '" name="AltitudPunto' + '_' + i + '" id="AltitudPunto' + '_' + i + '" value="" ><div class="help-block error"></div></td>';
	    asd += '</tr>';
	    $('#tcap3_n > tbody').append(asd);
	  }
	}

var as = 1;
var pts;
$.each( <?php echo json_encode($cap3_n->result()); ?>, function(i, data) {
	   $('#LatitudPunto' + '_' + as).val(data.LatitudPunto);
	   $('#LongitudPunto' + '_' +  as).val(data.LongitudPunto);
	   $('#AltitudPunto' + '_' +  as).val(data.AltitudPunto);
	   pts += 'lat' + as + '=' + data.LatitudPunto+'&long' + as + '='+ data.LongitudPunto + '';
	   if(as == ahua){
		   $('#LatitudPuntof').val(data.LatitudPunto);
		   $('#LongitudPuntof').val(data.LongitudPunto);
		   $('#AltitudPuntof').val(data.AltitudPunto);	 
		   $("#map2").attr("href", 'http://webinei.inei.gob.pe/cie/2013/web/index.php/mapa/gps/?lat1=' + data.LatitudPunto+'&long1='+ data.LongitudPunto);		
		   $("#map2f").attr("href", 'http://webinei.inei.gob.pe/cie/2013/web/index.php/mapa/gps/diez/?' + pts);		
	   }
	   as++;
}); 


}); 
</script>


