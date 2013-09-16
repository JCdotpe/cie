<script type="text/javascript">

	$.import('js/visor/capitulo7/index.js','js');

</script>

<?php $this->load->view('visor/nav_view.php'); ?>	  	    	<!-- CAPITULO 7-->
				<div id="pag_edificacion" style="width:920px; height:200px; overflow:auto;"  >
		  	    				<!--AJAX-->
		  	    				<table class="table table-hover" style="width:920px;" class="content8" >
										<thead>
										<tr align="center">
											<th colspan="3" style="text-align:center; vertical-align:middle;">EDIFICACIONES</th>
										</tr>
							    			<tr>
							    				<th>NRO DE EDIFICACION</th>
							    				<th style="text-align:right;">AREA TECHADA DEL PRIMER PISO DE LA EDIFICACIÓN</th>
							    				<th style="text-align:right;">PREDIO EN EL QUE SE UBICA LA EDIFICACIÓN</th>
							    			</tr>
							    		</thead>
							    		<tbody id="edificaciones">

							    		</tbody>
								</table>
		  	    </div>
	  	    	<div class="tab-pane" id="cap7">
	  	    		<div class="content" id="content8">
	  	    			<table class="table table-bordered">
	  	    				<thead>
	  	    					<th colspan="3" style="text-align:center;">Sección A:  Sistema estructural predominante y estado de conservación de la edificación</th>
	  	    				</thead>
	  	    				<tbody>
	  	    					<tr>
	  	    						<td>1.</td>
	  	    						<td>
	  	    							<strong>Código de la edificación</strong>
	  	    						</td>
	  	    						<td><input style="width:100px;" type="text" class="form-control Nro_Ed" id="Nro_Ed"></td>
	  	    					</tr>
	  	    					<tr>
	  	    						<td>2.</td>
	  	    						<td>
	  	    							<strong>¿quién es el ejecutor de la obra?</strong>
	  	    							<br>(acepte un solo código)
	  	    						</td>
	  	    						<td>	  	    							
											<div class="radio">
												<label>
													<input type="radio" name="P7_1_2" id="P7_1_21" value="option1" >
													    Gobierno Nacional / Proyecto Especial
													</label>
											</div>
											<div class="radio">
												<label>
													<input type="radio" name="P7_1_2" id="P7_1_22" value="option1" >
													    Gobierno Regional / Local
													</label>
											</div>
											<div class="radio">
												<label>
													<input type="radio" name="P7_1_2" id="P7_1_23" value="option1" >
													    APAFA / Autoconstrucción
													</label>
											</div>
											<div class="radio">
												<label>
													<input type="radio" name="P7_1_2" id="P7_1_24" value="option1" >
													    Entidades cooperantes / ONG's
													</label>
											</div>
											<div class="radio">
												<label>
													<input type="radio" name="P7_1_2" id="P7_1_25" value="option1" >
													    Empresa privada
													</label>
											</div>
	  	    						</td>
	  	    					</tr>
	  	    					<tr>
	  	    						<td>3.</td>
	  	    						<td>
	  	    							<strong>¿cuál es la antigüedad de la edificación?</strong>
	  	    							<br>(acepte un solo código)
	  	    						</td>
	  	    						<td>
	  	    								<div class="radio">
												<label>
													<input type="radio" name="P7_1_3" id="P7_1_31" value="option1" >
													    Antes y durante 1977
													</label>
											</div>
											<div class="radio">
												<label>
													<input type="radio" name="P7_1_3" id="P7_1_32" value="option1" >
													    Entre 1978 y 1998
													</label>
											</div>
											<div class="radio">
												<label>
													<input type="radio" name="P7_1_3" id="P7_1_33" value="option1" >
													    Después de 1998
													</label>
											</div>											
	  	    						</td>
	  	    					</tr>
	  	    					<tr>
	  	    						<td>4.</td>
	  	    						<td>
	  	    							<strong>Sistema estructural predominante</strong>
	  	    							<br>(acepte un solo código)
	  	    						</td>
	  	    						<td>
	  	    								<div class="radio">
												<label>
													<input type="radio" name="P7_1_4" id="P7_1_41" value="option1" >
													    Pórticos de concreto armado y/o muros de albañilería (dual)
													</label>
											</div>
											<div class="radio">
												<label>
													<input type="radio" name="P7_1_4" id="P7_1_42" value="option1" >
													    Albañileria confinada o armada
													</label>
											</div>
											<div class="radio">
												<label>
													<input type="radio" name="P7_1_4" id="P7_1_43" value="option1" >
													    Estructura de acero
													</label>
											</div>

											<div class="radio">
												<label>
													<input type="radio" name="P7_1_4" id="P7_1_44" value="option1" >
													    Madera (normalizada)
													</label>
											</div>
											<div class="radio">
												<label>
													<input type="radio" name="P7_1_4" id="P7_1_45" value="option1" >
													    Adobe
													</label>
											</div>
											<div class="radio">
												<label>
													<input type="radio" name="P7_1_4" id="P7_1_46" value="option1" >
													    Albañileria sin confinar
													</label>
											</div>
											<div class="radio">
												<label>
													<input type="radio" name="P7_1_4" id="P7_1_47" value="option1" >
													    Construcciones precarias(triplay, quincha, tapial, similares)
													</label>
											</div>

											<div class="radio">
												<label>
													<input type="radio" name="P7_1_4" id="P7_1_48" value="option1" >
													    Aulas provicionales
													</label>
											</div>
	  	    						</td>
	  	    					</tr>
	  	    				</tbody>
	  	    			</table>
	  	    			<table class="table table-bordered">
	  	    				<thead>
	  	    					<th colspan="3" style="text-align:center;">Pórticos de concreto armado y/o muros de albañilería</th>
	  	    				</thead>
	  	    				<tbody>
	  	    					<tr>
	  	    						<td>5.</td>
	  	    						<td>
	  	    							<strong>Estado de conservación de las columnas</strong>
	  	    						</td>
	  	    						<td>
	  	    								<div class="radio">
												<label>
													<input type="radio" name="P7_1_5" id="P7_1_51" value="option1" >
													    1. Sin daños evidentes
													</label>
											</div>
											<div class="radio">
												<label>
													<input type="radio" name="P7_1_5" id="P7_1_52" value="option1" >
													    2. Fisuras leves
													</label>
											</div>
											<div class="radio">
												<label>
													<input type="radio" name="P7_1_5" id="P7_1_53" value="option1" >
													    3. Fisuras moderadas
													</label>
											</div>

											<div class="radio">
												<label>
													<input type="radio" name="P7_1_5" id="P7_1_54" value="option1" >
													    4. Agrietamiento / exposición del acero
													</label>
											</div>
	  	    						</td>
	  	    					</tr>
	  	    					<tr>
	  	    						<td>6.</td>
	  	    						<td>
	  	    							<strong>Estado de conservación de los muros portantes</strong>
	  	    						</td>
	  	    						<td>
	  	    							<div class="radio">
												<label>
													<input type="radio" name="P7_1_6" id="P7_1_61" value="option1" >
													    1. Sin daños evidentes
													</label>
											</div>
											<div class="radio">
												<label>
													<input type="radio" name="P7_1_6" id="P7_1_62" value="option1" >
													    2. Fisuras leves
													</label>
											</div>
											<div class="radio">
												<label>
													<input type="radio" name="P7_1_6" id="P7_1_63" value="option1" >
													    3. Fisuras moderadas / afloramiento sales
													</label>
											</div>

											<div class="radio">
												<label>
													<input type="radio" name="P7_1_6" id="P7_1_64" value="option1" >
													    4. Agrietamiento / asentamiento
													</label>
											</div>
	  	    						</td>
	  	    					</tr>
	  	    					<tr>
	  	    						<td>7.</td>
	  	    						<td>
	  	    							<strong>Estado de conservación de las vigas</strong>
	  	    						</td>
	  	    						<td>
	  	    								<div class="radio">
												<label>
													<input type="radio" name="P7_1_7" id="P7_1_71" value="option1" >
													    1. Sin daños evidentes
													</label>
											</div>
											<div class="radio">
												<label>
													<input type="radio" name="P7_1_7" id="P7_1_72" value="option1" >
													    2. Fisuras leves
													</label>
											</div>
											<div class="radio">
												<label>
													<input type="radio" name="P7_1_7" id="P7_1_73" value="option1" >
													    3. Fisuras moderadas
													</label>
											</div>

											<div class="radio">
												<label>
													<input type="radio" name="P7_1_7" id="P7_1_74" value="option1" >
													    4. Agrietamiento / deflexión del elemento
													</label>
											</div>
	  	    						</td>
	  	    					</tr>
	  	    					<tr>
	  	    						<td>8.</td>
	  	    						<td>
	  	    							<strong>Estado de conservación de la losa del entrepiso</strong>
	  	    						</td>
	  	    						<td>
	  	    								<div class="radio">
												<label>
													<input type="radio" name="P7_1_8" id="P7_1_81" value="option1" >
													    1. Sin daños evidentes
													</label>
											</div>
											<div class="radio">
												<label>
													<input type="radio" name="P7_1_8" id="P7_1_82" value="option1" >
													    2. Fisuras leves
													</label>
											</div>
											<div class="radio">
												<label>
													<input type="radio" name="P7_1_8" id="P7_1_83" value="option1" >
													    3. Fisuras moderadas / filtraciones
													</label>
											</div>

											<div class="radio">
												<label>
													<input type="radio" name="P7_1_8" id="P7_1_84" value="option1" >
													    4. Agrietamiento / Pandeo
													</label>
											</div>
	  	    						</td>
	  	    					</tr>
	  	    					<tr>
	  	    						<td>9.</td>
	  	    						<td>
	  	    							<strong>El tipo de techo es:</strong>
	  	    						</td>
	  	    						<td>
	  	    								<div class="radio">
												<label>
													<input type="radio" name="P7_1_9" id="P7_1_91" value="option1" >
													   1. De material noble
													</label>
											</div>
											<div class="radio">
												<label>
													<input type="radio" name="P7_1_9" id="P7_1_92" value="option1" >
													    2. Estructura liviana
													</label>
											</div>
	  	    						</td>
	  	    					</tr>
	  	    					<tr>
	  	    						<td>9A.</td>
	  	    						<td>
	  	    							<strong>Estado de conservación del techo de material noble</strong>
	  	    						</td>
	  	    						<td>
	  	    								<div class="radio">
												<label>
													<input type="radio" name="P7_1_9A" id="P7_1_9A1" value="option1" >
													    1. Sin daños
													</label>
											</div>
											<div class="radio">
												<label>
													<input type="radio" name="P7_1_9A" id="P7_1_9A2" value="option1" >
													    2. Fisuras leves
													</label>
											</div>
											<div class="radio">
												<label>
													<input type="radio" name="P7_1_9A" id="P7_1_9A3" value="option1" >
													    3. Fisuras moderadas / filtraciones
													</label>
											</div>

											<div class="radio">
												<label>
													<input type="radio" name="P7_1_9A" id="P7_1_9A4" value="option1" >
													    4. Agrietamiento / Pandeo
													</label>
											</div>
	  	    						</td>
	  	    					</tr>
	  	    					<tr>
	  	    						<td>9B.</td>
	  	    						<td>
	  	    							<strong>Cobertura final del techo</strong>
	  	    						</td>
	  	    						<td>
	  	    								<div class="radio">
												<label>
													<input type="radio" name="P7_1_9B" id="P7_1_9B1" value="option1" >
													    1. Ladrillos pasteleros
													</label>
											</div>
											<div class="radio">
												<label>
													<input type="radio" name="P7_1_9B" id="P7_1_9B2" value="option1" >
													    2. Tejas de arcilla
													</label>
											</div>
											<div class="radio">
												<label>
													<input type="radio" name="P7_1_9B" id="P7_1_9B3" value="option1" >
													    3. Planchas termoacústicas, calaminas
													</label>
											</div>

											<div class="radio">
												<label>
													<input type="radio" name="P7_1_9B" id="P7_1_9B4" value="option1" >
													    4. Planchas fibrocemento
													</label>
											</div>

											<div class="radio">
												<label>
													<input type="radio" name="P7_1_9B" id="P7_1_9B5" value="option1" >
													    5. Fibras vegetales
													</label>
											</div>

											<div class="radio">
												<label>
													<input type="radio" name="P7_1_9B" id="P7_1_9B6" value="option1" >
													    6. Sin cobertura
													</label>
											</div>
	  	    						</td>
	  	    					</tr>
	  	    					<tr>
	  	    						<td>9C.</td>
	  	    						<td>
	  	    							<strong>Estado de conservación del techo de cobertura liviana</strong>
	  	    						</td>
	  	    						<td>
	  	    								<div class="radio">
												<label>
													<input type="radio" name="P7_1_9C" id="P7_1_9C1" value="option1" >
													    1. Sin daños
													</label>
											</div>
											<div class="radio">
												<label>
													<input type="radio" name="P7_1_9C" id="P7_1_9C2" value="option1" >
													    2. Falta de mantenimiento
													</label>
											</div>
											<div class="radio">
												<label>
													<input type="radio" name="P7_1_9C" id="P7_1_9C3" value="option1" >
													    3. Desprendimiento de nudos
													</label>
											</div>

											<div class="radio">
												<label>
													<input type="radio" name="P7_1_9C" id="P7_1_9C4" value="option1" >
													    4. Colapso parcial o total
													</label>
											</div>

	  	    						</td>
	  	    					</tr>
	  	    					<tr>
	  	    						<td>9D.</td>
	  	    						<td>
	  	    							<strong>Detalle cobertura liviana del techo</strong>
	  	    						</td>
	  	    						<td>
	  	    								<div class="radio">
												<label>
													<input type="radio" name="P7_1_9D" id="P7_1_9D1" value="option1" >
													    1. Tejas de arcilla
													</label>
											</div>
											<div class="radio">
												<label>
													<input type="radio" name="P7_1_9D" id="P7_1_9D2" value="option1" >
													    2. Planchas termoacústicas, calaminas
													</label>
											</div>
											<div class="radio">
												<label>
													<input type="radio" name="P7_1_9D" id="P7_1_9D3" value="option1" >
													    3. Planchas fibrocemento
													</label>
											</div>

											<div class="radio">
												<label>
													<input type="radio" name="P7_1_9D" id="P7_1_9D4" value="option1" >
													    4. Fibras vegetales
													</label>
											</div>
	  	    						</td>
	  	    					</tr>
	  	    				</tbody>
	  	    			</table>
	  	    			<table class="table table-bordered">
	  	    				<thead>
	  	    					<th colspan="3" style="text-align:center;">Estructuración de los pórticos</th>
	  	    				</thead>
	  	    				<tbody>
	  	    					<tr>
	  	    						<td>10.</td>
	  	    						<td>
	  	    							<strong>Hay presencia de columnas "T" / placas</strong>
	  	    						</td>
	  	    						<td>
	  	    								<div class="radio">
												<label>
													<input type="radio" name="P7_1_10" id="P7_1_101" value="option1" >
													    1. Si
													</label>
											</div>

											<div class="radio">
												<label>
													<input type="radio" name="P7_1_10" id="P7_1_102" value="option1" >
													    2. No
													</label>
											</div>
	  	    						</td>
	  	    					</tr>
	  	    					<tr>
	  	    						<td>11.</td>
	  	    						<td>
	  	    							<strong> Hay efectos de columna corta</strong>
	  	    						</td>
	  	    						<td>
	  	    								<div class="radio">
												<label>
													<input type="radio" name="P7_1_11" id="P7_1_111" value="option1" >
													    1. Si
													</label>
											</div>

											<div class="radio">
												<label>
													<input type="radio" name="P7_1_11" id="P7_1_112" value="option1" >
													    2. No
													</label>
											</div>
	  	    						</td>
	  	    					</tr>
	  	    				</tbody>
	  	    			</table>
	  	    			<div class="panel">
								<label>Observaciones:</label>
								<textarea style="width:870px; height:100px;" id="P6_Obs"></textarea>
						</div>

	  	    			<table class="table table-bordered">
	  	    				<thead>
	  	    					<th colspan="3" style="text-align:center;">Albañilería confinada o armada</th>
	  	    				</thead>
	  	    				<tbody>
	  	    					<tr>
	  	    						<td>12.</td>
	  	    						<td>
	  	    							<strong> Estado de conservación de los muros portantes</strong>
	  	    							<label>(Acepte sólo un código)</label>
	  	    						</td>
	  	    						<td>

	  	    							<div class="radio">
												<label>
													<input type="radio" name="P7_1_12" id="P7_1_121" value="option1" >
													    1. Sin daños
													</label>
											</div>
											<div class="radio">
												<label>
													<input type="radio" name="P7_1_12" id="P7_1_122" value="option1" >
													    2. Fisuras leves
													</label>
											</div>
											<div class="radio">
												<label>
													<input type="radio" name="P7_1_12" id="P7_1_123" value="option1" >
													    3. Fisuras moderadas
													</label>
											</div>

											<div class="radio">
												<label>
													<input type="radio" name="P7_1_12" id="P7_1_124" value="option1" >
													    4. Agrietamiento / pandeo de elemento
													</label>
											</div>
	  	    						</td>
	  	    					</tr>
	  	    					<tr>
	  	    						<td>13.</td>
	  	    						<td>
	  	    							<strong> Estado de conservación de los elementos de confinamiento</strong>
	  	    							<label>(Acepte sólo un código)</label>
	  	    						</td>
	  	    						<td>
	  	    								<div class="radio">
												<label>
													<input type="radio" name="P7_1_13" id="P7_1_131" value="option1" >
													    1. Sin daños
													</label>
											</div>
											<div class="radio">
												<label>
													<input type="radio" name="P7_1_13" id="P7_1_132" value="option1" >
													    2. Fisuras leves
													</label>
											</div>
											<div class="radio">
												<label>
													<input type="radio" name="P7_1_13" id="P7_1_133" value="option1" >
													    3. Fisuras moderadas
													</label>
											</div>

											<div class="radio">
												<label>
													<input type="radio" name="P7_1_13" id="P7_1_134" value="option1" >
													    4. Agrietamiento / exposición del acero
													</label>
											</div>
	  	    						</td>
	  	    					</tr>
	  	    					<tr>
	  	    						<td>14.</td>
	  	    						<td>
	  	    							<strong> Estado de conservación de los elementos de confinamiento</strong>
	  	    							<label>(Acepte sólo un código)</label>
	  	    						</td>
	  	    						<td>
	  	    								<div class="radio">
												<label>
													<input type="radio" name="P7_1_14" id="P7_1_141" value="option1" >
													    1. Sin daños
													</label>
											</div>
											<div class="radio">
												<label>
													<input type="radio" name="P7_1_14" id="P7_1_142" value="option1" >
													    2. Fisuras leves
													</label>
											</div>
											<div class="radio">
												<label>
													<input type="radio" name="P7_1_14" id="P7_1_143" value="option1" >
													    3. Fisuras moderadas
													</label>
											</div>

											<div class="radio">
												<label>
													<input type="radio" name="P7_1_14" id="P7_1_144" value="option1" >
													    4. Agrietamiento / pandeo de elemento
													</label>
											</div>
	  	    						</td>
	  	    					</tr>
	  	    					<tr>
	  	    						<td>15.</td>
	  	    						<td>
	  	    							<strong>El tipo de techo es :</strong>
	  	    							<label>(Acepte sólo un código)</label>
	  	    						</td>
	  	    						<td>
	  	    								<div class="radio">
												<label>
													<input type="radio" name="P7_1_15" id="P7_1_151" value="option1" >
													    1. De material noble
													</label>
											</div>

											<div class="radio">
												<label>
													<input type="radio" name="P7_1_15" id="P7_1_152" value="option1" >
													    2. Estructura liviana
													</label>
											</div>
	  	    						</td>
	  	    					</tr>
	  	    					<tr>
	  	    						<td>15A.</td>
	  	    						<td>
	  	    							<strong> Estado de consevación del techo de material noble</strong>
	  	    							<label>(Acepte sólo un código)</label>
	  	    						</td>
	  	    						<td>
	  	    								<div class="radio">
												<label>
													<input type="radio" name="P7_1_15A" id="P7_1_15A1" value="option1" >
													    1. Sin daños
													</label>
											</div>
											<div class="radio">
												<label>
													<input type="radio" name="P7_1_15A" id="P7_1_15A2" value="option1" >
													    2. Fisuras leves
													</label>
											</div>
											<div class="radio">
												<label>
													<input type="radio" name="P7_1_15A" id="P7_1_15A3" value="option1" >
													    3. Fisuras moderadas / filtraciones
													</label>
											</div>

											<div class="radio">
												<label>
													<input type="radio" name="P7_1_15" id="P7_1_154" value="option1" >
													    4. Agrietamiento / pandeo
													</label>
											</div>
	  	    						</td>
	  	    					</tr>
	  	    					<tr>
	  	    						<td>15B.</td>
	  	    						<td>
	  	    							<strong> Cobertura final</strong>
	  	    							<label>(Acepte sólo un código)</label>
	  	    						</td>
	  	    						<td>
	  	    							<div class="radio">
												<label>
													<input type="radio" name="P7_1_15B" id="P7_1_15B1" value="option1" >
													    1. Ladrillos pasteleros
													</label>
											</div>
											<div class="radio">
												<label>
													<input type="radio" name="P7_1_15B" id="P7_1_15B2" value="option1" >
													    2. Tejas de arcilla
													</label>
											</div>
											<div class="radio">
												<label>
													<input type="radio" name="P7_1_15B" id="P7_1_15B3" value="option1" >
													    3.Planchas termoacústicas, calaminas
													</label>
											</div>

											<div class="radio">
												<label>
													<input type="radio" name="P7_1_15B" id="P7_1_15B4" value="option1" >
													    4. Planchas fibrocemento
													</label>
											</div>

											<div class="radio">
												<label>
													<input type="radio" name="P7_1_15B" id="P7_1_15B5" value="option1" >
													    5. Fibras vegetales
													</label>
											</div>

											<div class="radio">
												<label>
													<input type="radio" name="P7_1_15B" id="P7_1_15B6" value="option1" >
													    6. Sin cobertura
													</label>
											</div>
	  	    						</td>
	  	    					</tr>
	  	    					<tr>
	  	    						<td>15C.</td>
	  	    						<td>
	  	    							<strong> Estado de conservación del techo de estructura liviana</strong>
	  	    							<label>(Acepte sólo un código)</label>
	  	    						</td>
	  	    						<td>
	  	    							<div class="radio">
												<label>
													<input type="radio" name="P7_1_15C" id="P7_1_15C1" value="option1" >
													    1. Sin daños
													</label>
											</div>
											<div class="radio">
												<label>
													<input type="radio" name="P7_1_15C" id="P7_1_15C2" value="option1" >
													    2. Falta mantenimiento
													</label>
											</div>
											<div class="radio">
												<label>
													<input type="radio" name="P7_1_15C" id="P7_1_15C3" value="option1" >
													    3.Desprendimiento de nudos
													</label>
											</div>

											<div class="radio">
												<label>
													<input type="radio" name="P7_1_15C" id="P7_1_15C4" value="option1" >
													    4. Colapso parcial o total
													</label>
											</div>
	  	    						</td>
	  	    					</tr>
	  	    					<tr>
	  	    						<td>15D.</td>
	  	    						<td>
	  	    						<strong> Cobertua final del techo</strong>
	  	    							<label>(Acepte sólo un código)</label>
	  	    						</td>
	  	    						<td>
	  	    							<div class="radio">
												<label>
													<input type="radio" name="P7_1_15D" id="P7_1_15D1" value="option1" >
													    1. Tejas de arcilla
													</label>
											</div>
											<div class="radio">
												<label>
													<input type="radio" name="P7_1_15D" id="P7_1_15D2" value="option1" >
													    2. Planchas termoacústicas, calaminas
													</label>
											</div>
											<div class="radio">
												<label>
													<input type="radio" name="P7_1_15D" id="P7_1_15D3" value="option1" >
													    3.Planchas fibrocemento
													</label>
											</div>

											<div class="radio">
												<label>
													<input type="radio" name="P7_1_15D" id="P7_1_15D4" value="option1" >
													    4. Fibras vegetales
													</label>
											</div>
	  	    						</td>
	  	    					</tr>
	  	    				</tbody>
	  	    			</table>
	  	    			<table class="table table-bordered">
	  	    				<thead>
	  	    					<th colspan="3" style="text-align:center;">Estructuración de albañilería</th>
	  	    				</thead>
	  	    				<tbody>
	  	    					<tr>
	  	    						<td>16.</td>
	  	    						<td>
	  	    							<strong>Hay una buena densidad de muros confinados</strong>
	  	    							<label>(Ambas direcciones)</label>
	  	    						</td>
	  	    						<td>
	  	    								<div class="radio">
												<label>
													<input type="radio" name="P7_1_16" id="P7_1_161" value="option1" >
													    1.Si
													</label>
											</div>

											<div class="radio">
												<label>
													<input type="radio" name="P7_1_16" id="P7_1_162" value="option1" >
													    2. No
													</label>
											</div>
	  	    						</td>
	  	    					</tr>
	  	    				</tbody>
	  	    			</table>
	  	    			<table class="table table-bordered">
	  	    				<thead>
	  	    					<th colspan="3" style="text-align:center;">Estructura de acero</th>
	  	    				</thead>
	  	    				<tbody>
	  	    					<tr>
	  	    						<td>17.</td>
	  	    						<td>
	  	    							<strong>Estado de conservación de las columnas</strong>
	  	    							<label>(Acepte sólo un código)</label>
	  	    						</td>
	  	    						<td>
	  	    							<div class="radio">
												<label>
													<input type="radio" name="P7_1_17" id="P7_1_171" value="option1" >
													    1. Sin daños
													</label>
											</div>
											<div class="radio">
												<label>
													<input type="radio" name="P7_1_17" id="P7_1_172" value="option1" >
													    2. Falta mantenimiento
													</label>
											</div>
											<div class="radio">
												<label>
													<input type="radio" name="P7_1_17" id="P7_1_173" value="option1" >
													    3.Torsiones o fracturas
													</label>
											</div>

											<div class="radio">
												<label>
													<input type="radio" name="P7_1_17" id="P7_1_174" value="option1" >
													    4. Colapso parcial o total
													</label>
											</div>
	  	    						</td>
	  	    					</tr>
	  	    					<tr>
	  	    						<td>18.</td>
	  	    						<td>
	  	    							<strong>Estado de conservación de los cerramientos</strong>
	  	    							<label>(Acepte sólo un código)</label>
	  	    						</td>
	  	    						<td>
	  	    							<div class="radio">
												<label>
													<input type="radio" name="P7_1_18" id="P7_1_181" value="option1" >
													    1. Sin daños
													</label>
											</div>
											<div class="radio">
												<label>
													<input type="radio" name="P7_1_18" id="P7_1_182" value="option1" >
													    2. Falta mantenimiento
													</label>
											</div>
											<div class="radio">
												<label>
													<input type="radio" name="P7_1_18" id="P7_1_183" value="option1" >
													    3.Torsiones o fracturas
													</label>
											</div>

											<div class="radio">
												<label>
													<input type="radio" name="P7_1_18" id="P7_1_184" value="option1" >
													    4. Colapso parcial o total
													</label>
											</div>
	  	    						</td>
	  	    					</tr>
	  	    					<tr>
	  	    						<td>19.</td>
	  	    						<td>
		  	    						<strong>Estado de conservación de las vigas</strong>
		  	    							<label> (Acepte sólo un código)</label>
	  	    						</td>
	  	    						<td>
	  	    							<div class="radio">
												<label>
													<input type="radio" name="P7_1_19" id="P7_1_191" value="option1" >
													    1. Sin daños
													</label>
											</div>
											<div class="radio">
												<label>
													<input type="radio" name="P7_1_19" id="P7_1_192" value="option1" >
													    2. Falta mantenimiento
													</label>
											</div>
											<div class="radio">
												<label>
													<input type="radio" name="P7_1_19" id="P7_1_193" value="option1" >
													    3.Torsiones o fracturas
													</label>
											</div>

											<div class="radio">
												<label>
													<input type="radio" name="P7_1_19" id="P7_1_194" value="option1" >
													    4. Colapso parcial o total
													</label>
											</div>
	  	    						</td>
	  	    					</tr>
	  	    					<tr>
	  	    						<td>20.</td>
	  	    						<td>
	  	    							<strong>Estado de conservación de la estructura</strong>
		  	    							<label> (Acepte sólo un código)</label>
	  	    						</td>
	  	    						<td>
	  	    							<div class="radio">
												<label>
													<input type="radio" name="P7_1_20" id="P7_1_201" value="option1" >
													    1. Sin daños
													</label>
											</div>
											<div class="radio">
												<label>
													<input type="radio" name="P7_1_20" id="P7_1_202" value="option1" >
													    2. Falta mantenimiento
													</label>
											</div>
											<div class="radio">
												<label>
													<input type="radio" name="P7_1_20" id="P7_1_203" value="option1" >
													    3.Torsiones o fracturas
													</label>
											</div>

											<div class="radio">
												<label>
													<input type="radio" name="P7_1_20" id="P7_1_204" value="option1" >
													    4. Colapso parcial o total
													</label>
											</div>
	  	    						</td>
	  	    					</tr>
	  	    				</tbody>
	  	    			</table>
	  	    			<table class="table table-bordered">
	  	    				<thead>
	  	    					<th colspan="3" style="text-align:center;">Estructuración de la estructura de Acero</th>
	  	    				</thead>
	  	    				<tbody>
	  	    					<tr>
	  	    						<td>21.</td>
	  	    						<td>
	  	    							<strong>Las conexiones estan en buen estado</strong>	    							
	  	    						</td>
	  	    						<td>
	  	    								<div class="radio">
												<label>
													<input type="radio" name="P7_1_21" id="P7_1_211" value="option1" >
													    1. Si
													</label>
											</div>

											<div class="radio">
												<label>
													<input type="radio" name="P7_1_21" id="P7_1_212" value="option1" >
													    2. No
													</label>
											</div>
	  	    						</td>
	  	    					</tr>
	  	    					<tr>
	  	    						<td>22.</td>
	  	    						<td>
	  	    							<strong>Presenta arriostramiento lateral</strong>	    							
	  	    						</td>
	  	    						<td>
	  	    								<div class="radio">
												<label>
													<input type="radio" name="P7_1_22" id="P7_1_221" value="option1" >
													    1. Si
													</label>
											</div>

											<div class="radio">
												<label>
													<input type="radio" name="P7_1_22" id="P7_1_222" value="option1" >
													    2. No
													</label>
											</div>
	  	    						</td>
	  	    					</tr>
	  	    				</tbody>
	  	    			</table>
	  	    			<table class="table table-bordered">
	  	    				<thead>
	  	    					<th colspan="3" style="text-align:center;">Madera</th>
	  	    				</thead>
	  	    				<tbody>
	  	    					<tr>
	  	    						<td>23.</td>
	  	    						<td>
	  	    							<strong>Estado de conservación de los paneles</strong>
	  	    							<label>(Acepte sólo un código)</label>
	  	    						</td>
	  	    						<td>
	  	    							<div class="radio">
												<label>
													<input type="radio" name="P7_1_23" id="P7_1_231" value="option1" >
													    1. Sin daños
													</label>
											</div>
											<div class="radio">
												<label>
													<input type="radio" name="P7_1_23" id="P7_1_232" value="option1" >
													    2. Fisuras leves
													</label>
											</div>
											<div class="radio">
												<label>
													<input type="radio" name="P7_1_23" id="P7_1_233" value="option1" >
													    3.Fisuras moderadas
													</label>
											</div>

											<div class="radio">
												<label>
													<input type="radio" name="P7_1_23" id="P7_1_234" value="option1" >
													    4. Fisuras severas
													</label>
											</div>
	  	    						</td>
	  	    					</tr>
	  	    					<tr>
	  	    						<td>24.</td>
	  	    						<td>
	  	    							<strong>Estado de conservación de la estructura liviana</strong>
	  	    							<label>(Acepte sólo un código)</label>
	  	    						</td>
	  	    						<td>
	  	    							<div class="radio">
												<label>
													<input type="radio" name="P7_1_24" id="P7_1_241" value="option1" >
													    1. Sin daños
													</label>
											</div>
											<div class="radio">
												<label>
													<input type="radio" name="P7_1_24" id="P7_1_242" value="option1" >
													    2. Falta de mantenimiento
													</label>
											</div>
											<div class="radio">
												<label>
													<input type="radio" name="P7_1_24" id="P7_1_243" value="option1" >
													    3.Desprendimiento de nudos
													</label>
											</div>

											<div class="radio">
												<label>
													<input type="radio" name="P7_1_24" id="P7_1_244" value="option1" >
													    4. Colapso parcial o total
													</label>
											</div>
	  	    						</td>
	  	    					</tr>
	  	    				</tbody>
	  	    			</table>
	  	    			<table class="table table-bordered">
	  	    				<thead>
	  	    					<th colspan="3" style="text-align:center;">Adobe</th>
	  	    				</thead>
	  	    				<tbody>
	  	    					<tr>
	  	    						<td>25.</td>
	  	    						<td>
	  	    							<strong>Estado de conservación de los muros portantes</strong>
	  	    							<label>(Acepte sólo un código)</label>
	  	    						</td>
	  	    						<td>
	  	    							<div class="radio">
												<label>
													<input type="radio" name="P7_1_25" id="P7_1_251" value="option1" >
													    1. Sin daños
													</label>
											</div>
											<div class="radio">
												<label>
													<input type="radio" name="P7_1_25" id="P7_1_252" value="option1" >
													    2. Fisuras leves
													</label>
											</div>
											<div class="radio">
												<label>
													<input type="radio" name="P7_1_25" id="P7_1_253" value="option1" >
													    3.Fisuras moderadas / afloramiento sales
													</label>
											</div>

											<div class="radio">
												<label>
													<input type="radio" name="P7_1_25" id="P7_1_254" value="option1" >
													    4. Agrietamiento / asentamiento
													</label>
											</div>
	  	    						</td>
	  	    					</tr>
	  	    					<tr>
	  	    						<td>26.</td>
	  	    						<td>
	  	    							<strong>Estado de conservación de la estructura liviana</strong>
	  	    							<label>(Acepte sólo un código)</label>
	  	    						</td>
	  	    						<td>
	  	    							<div class="radio">
												<label>
													<input type="radio" name="P7_1_26" id="P7_1_261" value="option1" >
													    1. Sin daños
													</label>
											</div>
											<div class="radio">
												<label>
													<input type="radio" name="P7_1_26" id="P7_1_262" value="option1" >
													    2. Falta de mantenimiento
													</label>
											</div>
											<div class="radio">
												<label>
													<input type="radio" name="P7_1_26" id="P7_1_263" value="option1" >
													    3.Desprendimiento de nudos
													</label>
											</div>

											<div class="radio">
												<label>
													<input type="radio" name="P7_1_26" id="P7_1_264" value="option1" >
													    4. Colapso parcial o total
													</label>
											</div>
	  	    						</td>
	  	    					</tr>
	  	    				</tbody>
	  	    			</table>
	  	    			<table class="table table-bordered">
	  	    				<thead>
	  	    					<th colspan="3" style="text-align:center;">Estructuración de adobe</th>
	  	    				</thead>
	  	    				<tbody>
	  	    					<tr>
	  	    						<td>27.</td>
	  	    						<td>
	  	    							<strong>Hay presencia de mochetas</strong>
	  	    						</td>
	  	    						<td>
	  	    								<div class="radio">
												<label>
													<input type="radio" name="P7_1_27" id="P7_1_271" value="option1" >
													    1. Si
													</label>
											</div>
											<div class="radio">
												<label>
													<input type="radio" name="P7_1_27" id="P7_1_272" value="option1" >
													    2. No
													</label>
											</div>
	  	    						</td>
	  	    					</tr>
	  	    					<tr>
	  	    						<td>28.</td>
	  	    						<td>
	  	    							<strong>¿Hay adobe reforzado (caña, malla, etc.)?</strong>
	  	    						</td>
	  	    						<td>
	  	    								<div class="radio">
												<label>
													<input type="radio" name="P7_1_28" id="P7_1_281" value="option1" >
													    1. Si
													</label>
											</div>
											<div class="radio">
												<label>
													<input type="radio" name="P7_1_28" id="P7_1_282" value="option1" >
													    2. No
													</label>
											</div>
	  	    						</td>
	  	    					</tr>
	  	    				</tbody>
	  	    			</table>
	  	    			<table class="table table-bordered">
	  	    				<thead>
	  	    					<th colspan="3" style="text-align:center;">Sección B:  Opinión técnica del evaluador</th>
	  	    				</thead>
	  	    				<tbody>
	  	    					<tr>
	  	    						<td>1.</td>
	  	    						<td>
	  	    							<strong>En base a los resultados obtenidos en la evaluación, ¿ Cuál es la intervención a realizar en la edificación?</strong>
	  	    						</td>
	  	    						<td>
	  	    								<div class="radio">
												<label>
													<input type="radio" name="P7_2_1" id="P7_2_11" value="option1" >
													    1. Mantenimiento (rehabilitación menor)
													</label>
											</div>
											<div class="radio">
												<label>
													<input type="radio" name="P7_2_1" id="P7_2_12" value="option1" >
													    2. Reforzamiento estructural (rehabilitación mayor)
													</label>
											</div>

											<div class="radio">
												<label>
													<input type="radio" name="P7_2_1" id="P7_2_13" value="option1" >
													    2. Demolición
													</label>
											</div>
	  	    						</td>
	  	    					</tr>
	  	    					<tr>
	  	    						<td>2.</td>
	  	    						<td>
	  	    							<strong>Comentario</strong>
	  	    						</td>
	  	    						<td>
	  	    								<div class="panel">
												<label>Observaciones:</label>
												<textarea style="width:870px; height:100px;" id="P7_2_2"></textarea>
											</div>
	  	    						</td>
	  	    					</tr>
	  	    				</tbody>
	  	    			</table>
	  	    		</div>
	  	    	</div><!-- END CAPITULO 7-->