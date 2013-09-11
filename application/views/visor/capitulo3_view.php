<?php $this->load->view('visor/nav_view.php'); ?>

<script type="text/javascript">

	$.import('js/visor/capitulo3/index.js');
	
</script>

<!-- CAPITULO 3 -->
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
												<input type="radio" id="codigoLugarReferenciacion1" name="check" value="option1"> 1. Patio Central
											</label>
											<label>
												<input type="radio" id="codigoLugarReferenciacion2" name="check" value="option2"> 2. Frente al local
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
												<tr>
													<td>Punto Inicial</td>
													<td></td>
												</tr>
												<tr>
													<td>Punto Final</td>
													<td></td>
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
												</tr>
												<tr>
													<td>Punto Final</td>
													<td></td>
													<td></td>
													<td></td>
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
										<td><input style="width:400px;" type="text" class="form-control"></td>
									</tr>
									<tr>
										<td>5.</td>
										<td>
											<strong>Código de la fotografía del local escolar</strong>
										</td>
										<td><input style="width:400px;" type="text" class="form-control"></td>
									</tr>
								</tbody>
							</table>

							<div class="panel">
								<label>Observaciones:</label>
								<textarea style="width:870px; height:100px;"></textarea>
							</div>


						</div>
	  	    		</div>
	  	    	</div><!-- END CAPITULO 3-->