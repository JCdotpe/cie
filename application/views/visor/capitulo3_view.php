<?php $this->load->view('visor/nav_view.php'); ?>

<script type="text/javascript">

	$.import('js/visor/capitulo3/index.js','js');
	
</script>

<div class="tab-pane" id="cap3">
	  	    		<div class="content" id="content4">
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
												<input type="radio" id="P3_1_1_LugGeoref1" name="check" value="option1"> 1. Patio Central
											</label>
											<label>
												<input type="radio" id="P3_1_1_LugGeoref2" name="check" value="option2"> 2. Frente al local
											</label>
										</td>
									</tr>
									<tr>
										<td>2.</td>
										<td>
											<strong>Rango de puntos</strong>
										</td>
										<td>
											<table class="table table-bordered" style="width:250px;">
												<tr>
													<td>Punto Inicial</td>
													<td id="punto_inicial" style="text-align:center;"></td>
												</tr>
												<tr>
													<td>Punto Final</td>
													<td id="punto_final" style="text-align:center;"></td>
												</tr>
												<tr>
													<td>
														<strong>Ver 10 puntos en el Mapa</strong>
													</td>
													<td style="text-align:center;">
														<a id="map1" target="_blank" href="" class="map"></a>
													</td>
												</tr>
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
												<tr>
													<td></td>
													<th style="text-align:center;">Longitud</th>
													<th style="text-align:center;">Latitud</th>
													<th style="text-align:center;">Altitud (msnm)</th>
													<th style="text-align:center;">
														<strong>Ver punto final en el Mapa</strong>
													</th>
												</tr>
												<tr>
													<td>Punto Final</td>
													<td id="LongitudPunto" style="text-align:center;"></td>
													<td id="LatitudPunto" style="text-align:center;"></td>
													<td id="AltitudPunto" style="text-align:center;"></td>
													<td style="text-align:center;">
														<a id="map2" target="_blank" href="" class="map"></a>
													</td>
												</tr>
											</table>
										</td>
									</tr>
									<tr>
										<td>4.</td>
										<td>
											<strong>
												Nombre del archivo gps
											</strong>
											<br />(sólo si utilizó equipo gps)
										</td>
										<td><input id="P3_1_4_ArchGPS" style="width:400px;" type="text" class="form-control"></td>
									</tr>
									<tr>
										<td>5.</td>
										<td>
											<strong>Código de la fotografía del local escolar</strong>
										</td>
										<td><input id="RutaFoto" style="width:400px;" type="text" class="form-control"></td>
									</tr>
								</tbody>
							</table>

							<div class="panel">
								<label>Observaciones:</label>
								<textarea id="Observaciones" style="width:870px; height:100px;"></textarea>
							</div>


						</div>
	  	    		</div>
	  	    	</div><!-- END CAPITULO 3-->