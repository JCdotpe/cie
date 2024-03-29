<?php $this->load->view('visor/nav_view.php'); ?>

<script type="text/javascript">

	$.import('js/visor/capitulo4/index.js','js');
	
</script>

<!-- CAPITULO 4-->
	  	    	<div class="tab-pane" id="cap4">
	  	    		<div class="content" id="content6">

	  	    			<div class="panel panel-info">
	  	    				<div class="panel-heading">
	  	    					<h5>Capitulo IV. Localización del predio y caracteristicas de sus linderos</h5>
	  	    				</div>

	  	    				<table class="table table-bordered">
		  	    				<thead>
		  	    					<tr>
			  	    					<th>Sección A: Croquis de localización del predio</th>
		  	    					</tr>
		  	    				</thead>
		  	    				<tbody>
		  	    					<tr>
		  	    						<td><input id="P4_1_Foto" type="text" style="width:900px;" class="form-control"></td>
		  	    					</tr>
		  	    				</tbody>
		  	    			</table>

		  	    			<table class="table table-bordered">
		  	    				<thead>
		  	    					<tr>
		  	    						<th colspan="3">Sección B:  características de linderos</th>
		  	    					</tr>
		  	    				</thead>
		  	    				<tbody>
		  	    					<tr>
		  	    						<td>1.</td>
		  	    						<td><strong>De cuántos tramos está conformado el lindero frente con o sin cerco</strong></td>
		  	    						<td>
		  	    							<label>Nº total de tramos:</label>
		  	    							<input id="P4_2_CantTram_Lfrente" style="width:50px;" type="text" class="form-control">
		  	    						</td>
		  	    					</tr>
		  	    					<tr>
		  	    						<td></td>
		  	    						<td colspan="2">

		  	    							<table class="table table-bordered">
		  	    								<thead>
		  	    									<tr>
		  	    										<th colspan="8" style="text-align:center; vertical-align:middle;">
		  	    											Lindero frente (especifique cada uno de los tramos en el cuadro)
		  	    										</th>
		  	    									</tr>
		  	    									<tr>
		  	    										<th style="text-align:center; vertical-align:middle;" rowspan="2">N°</th>
		  	    										<th style="text-align:center; vertical-align:middle;" rowspan="2">1A. Nº de tramo</th>
		  	    										<th style="text-align:center; vertical-align:middle;" rowspan="2">1B. Longitud del tramo (m)</th>
		  	    										<th style="text-align:center; vertical-align:middle;" colspan="1">1C. El tramo tiene cerco</th>
		  	    										<th style="text-align:center; vertical-align:middle;" rowspan="2">1D. El sistema estructural predominante del tramo es:</th>
		  	    										<th style="text-align:center; vertical-align:middle;" rowspan="2">1E. Estado de conservación del tramo</th>
		  	    										<th style="text-align:center; vertical-align:middle;" rowspan="2">1F. Opinión técnica del evaluador</th>
		  	    									</tr>
		  	    								</thead>
		  	    								<tbody id="lindero_frente">
		  	    								</tbody>
		  	    							</table>

		  	    						</td>
		  	    					</tr>
		  	    					<tr>
		  	    						<td>2.</td>
		  	    						<td><strong>De cuántos tramos está conformado el lindero derecho con o sin cerco</strong></td>
		  	    						<td>
		  	    							<label>Nº total de tramos:</label>
		  	    							<input id="P4_2_CantTram_Lderecho" style="width:50px;" type="text" class="form-control">
		  	    						</td>
		  	    					</tr>
		  	    					<tr>
		  	    						<td></td>
		  	    						<td colspan="2">

		  	    							<table class="table table-bordered">
		  	    								<thead>
		  	    									<tr>
		  	    										<th colspan="8" style="text-align:center; vertical-align:middle;">
		  	    											Lindero Derecho (especifique cada uno de los tramos en el cuadro)
		  	    										</th>
		  	    									</tr>
		  	    									<tr>
		  	    										<th style="text-align:center; vertical-align:middle;" rowspan="2">N°</th>
		  	    										<th style="text-align:center; vertical-align:middle;" rowspan="2">2A. Nº de tramo</th>
		  	    										<th style="text-align:center; vertical-align:middle;" rowspan="2">2B. Longitud del tramo (m)</th>
		  	    										<th style="text-align:center; vertical-align:middle;" colspan="1">2C. El tramo tiene cerco</th>
		  	    										<th style="text-align:center; vertical-align:middle;" rowspan="2">2D. El sistema estructural predominante del tramo es:</th>
		  	    										<th style="text-align:center; vertical-align:middle;" rowspan="2">2E. Estado de conservación del tramo</th>
		  	    										<th style="text-align:center; vertical-align:middle;" rowspan="2">2F. Opinión técnica del evaluador</th>
		  	    									</tr>
		  	    								</thead>
		  	    								<tbody id="lindero_derecho">
		  	    								</tbody>
		  	    							</table>

		  	    						</td>
		  	    					</tr>
		  	    					<tr>
		  	    						<td>3.</td>
		  	    						<td><strong>De cuántos tramos está conformado el lindero fondo con o sin cerco</strong></td>
		  	    						<td>
		  	    							<label>Nº total de tramos:</label>
		  	    							<input id="P4_2_CantTram_Lfondo" style="width:50px;" type="text" class="form-control">
		  	    						</td>
		  	    					</tr>
		  	    					<tr>
		  	    						<td></td>
		  	    						<td colspan="2">

		  	    							<table class="table table-bordered">
		  	    								<thead>
		  	    									<tr>
		  	    										<th colspan="8" style="text-align:center; vertical-align:middle;">
		  	    											Lindero fondo (especifique cada uno de los tramos en el cuadro)
		  	    										</th>
		  	    									</tr>
		  	    									<tr>
		  	    										<th style="text-align:center; vertical-align:middle;" rowspan="2">N°</th>
		  	    										<th style="text-align:center; vertical-align:middle;" rowspan="2">3A. Nº de tramo</th>
		  	    										<th style="text-align:center; vertical-align:middle;" rowspan="2">3B. Longitud del tramo (m)</th>
		  	    										<th style="text-align:center; vertical-align:middle;" colspan="1">3C. El tramo tiene cerco</th>
		  	    										<th style="text-align:center; vertical-align:middle;" rowspan="2">3D. El sistema estructural predominante del tramo es:</th>
		  	    										<th style="text-align:center; vertical-align:middle;" rowspan="2">3E. Estado de conservación del tramo</th>
		  	    										<th style="text-align:center; vertical-align:middle;" rowspan="2">3F. Opinión técnica del evaluador</th>
		  	    									</tr>
		  	    								</thead>
		  	    								<tbody id="lindero_fondo">
		  	    								</tbody>
		  	    							</table>

		  	    						</td>
		  	    					</tr>
		  	    					<tr>
		  	    						<td>4.</td>
		  	    						<td><strong>De cuántos tramos está conformado el lindero izquierdo con o sin cerco</strong></td>
		  	    						<td>
		  	    							<label>Nº total de tramos:</label>
		  	    							<input id="P4_2_CantTram_Lizq" style="width:50px;" type="text" class="form-control">
		  	    						</td>
		  	    					</tr>
		  	    					<tr>
		  	    						<td></td>
		  	    						<td colspan="2">

		  	    							<table class="table table-bordered">
		  	    								<thead>
		  	    									<tr>
		  	    										<th colspan="8" style="text-align:center; vertical-align:middle;">
		  	    											Lindero izquierdo (especifique cada uno de los tramos en el cuadro)
		  	    										</th>
		  	    									</tr>
		  	    									<tr>
		  	    										<th style="text-align:center; vertical-align:middle;" rowspan="2">N°</th>
		  	    										<th style="text-align:center; vertical-align:middle;" rowspan="2">4A. Nº de tramo</th>
		  	    										<th style="text-align:center; vertical-align:middle;" rowspan="2">4B. Longitud del tramo (m)</th>
		  	    										<th style="text-align:center; vertical-align:middle;" colspan="1">4C. El tramo tiene cerco</th>
		  	    										<th style="text-align:center; vertical-align:middle;" rowspan="2">4D. El sistema estructural predominante del tramo es:</th>
		  	    										<th style="text-align:center; vertical-align:middle;" rowspan="2">4E. Estado de conservación del tramo</th>
		  	    										<th style="text-align:center; vertical-align:middle;" rowspan="2">4F. Opinión técnica del evaluador</th>
		  	    									</tr>
		  	    								</thead>
		  	    								<tbody id="lindero_izquierdo">
		  	    								</tbody>
		  	    							</table>

		  	    						</td>
		  	    					</tr>
		  	    					<tr>
		  	    						<th>OBSERVACIONES</th>
		  	    						<td id="P4_1_Obs"></td>
		  	    					</tr>

		  	    				</tbody>
		  	    			</table>

	  	    			</div>

	  	    		</div>
	  	    	</div><!-- END CAPITULO 4-->