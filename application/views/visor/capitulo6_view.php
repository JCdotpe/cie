<?php $this->load->view('visor/nav_view.php'); ?>
<!-- CAPITULO 6-->
	  	    	<div class="tab-pane" id="cap6">
	  	    		<div class="content" id="content8">
	  	    			<div class="panel panel-info">
	  	    				<div class="panel-heading">Capitulo VI: Caracteristicas generales de la edificación</div>

	  	    				<table class="table table-bordered">
		  	    				<thead>
		  	    					<tr>
			  	    					<th colspan="3">Sección A: Identificación de las edificaciones</th>
		  	    					</tr>
		  	    				</thead>
		  	    				<tbody>
		  	    					<tr>
		  	    						<td>1.</td>
		  	    						<td>
		  	    							<strong>Total de edificaciones “E” que conforman el local escolar</strong>
		  	    						</td>
		  	    						<td>
		  	    							<label>Verificar Cap. V</label>
		  	    							<input style="width:100px;" type="text" class="form-control P5_TOT_E">
		  	    						</td>
		  	    					</tr>
		  	    				</tbody>
		  	    			</table>



		  	    			<div id="pag_seccion_a" style="width:920px; height:200px; overflow:auto;"  >
		  	    				<!--AJAX-->
		  	    				<table class="table table-hover" style="width:920px;" class="content8">
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
							    		<tbody id="seccion_m">

							    		</tbody>
								</table>
		  	    			</div>

		  	    			<div id="seccion_a" class="content7">
								<!--AJAX-->
							</div>

		  	    			<!--<table class="table table-bordered"> aqui  loop

		  	    			</table>-->

		  	    			<div class="panel">
								<label>Observaciones:</label>
								<textarea style="width:870px; height:100px;"></textarea>
							</div>

							<table class="table table-bordered">
		  	    				<thead>
		  	    					<tr>
			  	    					<th colspan="2">Sección B: Verificación de los espacios educativos de la edificación</th>
		  	    					</tr>
		  	    				</thead>
		  	    				<tbody>
		  	    					<tr>
		  	    						<td>
		  	    							<label>1. Ambiente Nº</label>
		  	    							<input style="width:100px;float:left;" type="text" class="form-control">
		  	    						</td>
		  	    						<td>
		  	    							<label>2. Piso N°</label>
		  	    							<input style="width:100px;float:left;" type="text" class="form-control">
		  	    						</td>
		  	    					</tr>
		  	    				</tbody>
		  	    			</table>
		  	    			<table class="table table-bordered">
		  	    				<tbody>
		  	    					<td>3.</td>
		  	    					<td>
		  	    						<strong>
		  	    							<label class="checkbox-inline">
												<input type="checkbox" id="inlineCheckbox1" value="option1"> 1. Si
											</label>
											<label class="checkbox-inline">
												<input type="checkbox" id="inlineCheckbox1" value="option1"> 2. No
											</label>
		  	    						</strong>
		  	    					</td>
		  	    					<td>


		  	    					</td>
		  	    				</tbody>
		  	    				<tbody>
		  	    					<td>4.</td>
		  	    					<td>
		  	    						<strong>
		  	    							Nivel, modalidad y turno del ambiente / espacio educativo
		  	    						</strong>
		  	    						<br />
		  	    						<label>(acepte uno o más códigos)</label>
		  	    					</td>
		  	    					<td>
		  	    						<table class="table table-bordered">
		  	    							<thead>
		  	    								<tr>
		  	    									<th rowspan="2" style="text-align:center; vertical-align:middle;">Nivel o Modalidad Educativa</th>
			  	    								<th colspan="3" style="text-align:center;">Turno</th>
		  	    								</tr>
		  	    								<tr>
		  	    									<th style="text-align:center;">Mañana</th>
			  	    								<th style="text-align:center;">Tarde</th>
			  	    								<th style="text-align:center;">Noche</th>
		  	    								</tr>
		  	    							</thead>
		  	    							<tbody>
		  	    								<tr>
		  	    									<td>
			  	    									1. Inicial cuna
			  	    								</td>
			  	    								<td>
			  	    									<label class="checkbox">
															<input type="checkbox" id="inlineCheckbox3" value="option3"> 1
														</label>
			  	    								</td>
			  	    								<td>
			  	    									<label class="checkbox">
															<input type="checkbox" id="inlineCheckbox3" value="option3"> 2
														</label>
			  	    								</td>
			  	    								<td>
			  	    									<label class="checkbox">
															<input type="checkbox" id="inlineCheckbox3" value="option3"> 3
														</label>
			  	    								</td>
		  	    								</tr>
		  	    								<tr>
		  	    									<td>
			  	    									2. Inicial jardín
			  	    								</td>
			  	    								<td>
			  	    									<label class="checkbox">
															<input type="checkbox" id="inlineCheckbox3" value="option3"> 1
														</label>
			  	    								</td>
			  	    								<td>
			  	    									<label class="checkbox">
															<input type="checkbox" id="inlineCheckbox3" value="option3"> 2
														</label>
			  	    								</td>
			  	    								<td>
			  	    									<label class="checkbox">
															<input type="checkbox" id="inlineCheckbox3" value="option3"> 3
														</label>
			  	    								</td>
		  	    								</tr>
		  	    								<tr>
		  	    									<td>
			  	    									3. Inicial cuna jardín
			  	    								</td>
			  	    								<td>
			  	    									<label class="checkbox">
															<input type="checkbox" id="inlineCheckbox3" value="option3"> 1
														</label>
			  	    								</td>
			  	    								<td>
			  	    									<label class="checkbox">
															<input type="checkbox" id="inlineCheckbox3" value="option3"> 2
														</label>
			  	    								</td>
			  	    								<td>
			  	    									<label class="checkbox">
															<input type="checkbox" id="inlineCheckbox3" value="option3"> 3
														</label>
			  	    								</td>
		  	    								</tr>
		  	    								<tr>
		  	    									<td>
			  	    									4. Primaria
			  	    								</td>
			  	    								<td>
			  	    									<label class="checkbox">
															<input type="checkbox" id="inlineCheckbox3" value="option3"> 1
														</label>
			  	    								</td>
			  	    								<td>
			  	    									<label class="checkbox">
															<input type="checkbox" id="inlineCheckbox3" value="option3"> 2
														</label>
			  	    								</td>
			  	    								<td>
			  	    									<label class="checkbox">
															<input type="checkbox" id="inlineCheckbox3" value="option3"> 3
														</label>
			  	    								</td>
		  	    								</tr>
		  	    								<tr>
		  	    									<td>
			  	    									5. Secundaria
			  	    								</td>
			  	    								<td>
			  	    									<label class="checkbox">
															<input type="checkbox" id="inlineCheckbox3" value="option3"> 1
														</label>
			  	    								</td>
			  	    								<td>
			  	    									<label class="checkbox">
															<input type="checkbox" id="inlineCheckbox3" value="option3"> 2
														</label>
			  	    								</td>
			  	    								<td>
			  	    									<label class="checkbox">
															<input type="checkbox" id="inlineCheckbox3" value="option3"> 3
														</label>
			  	    								</td>
		  	    								</tr>
		  	    								<tr>
		  	    									<td>
			  	    									6. Educación básica alternativa (eba)
			  	    								</td>
			  	    								<td>
			  	    									<label class="checkbox">
															<input type="checkbox" id="inlineCheckbox3" value="option3"> 1
														</label>
			  	    								</td>
			  	    								<td>
			  	    									<label class="checkbox">
															<input type="checkbox" id="inlineCheckbox3" value="option3"> 2
														</label>
			  	    								</td>
			  	    								<td>
			  	    									<label class="checkbox">
															<input type="checkbox" id="inlineCheckbox3" value="option3"> 3
														</label>
			  	    								</td>
		  	    								</tr>
		  	    								<tr>
		  	    									<td>
			  	    									7. Educación básica especial (ebe)
			  	    								</td>
			  	    								<td>
			  	    									<label class="checkbox">
															<input type="checkbox" id="inlineCheckbox3" value="option3"> 1
														</label>
			  	    								</td>
			  	    								<td>
			  	    									<label class="checkbox">
															<input type="checkbox" id="inlineCheckbox3" value="option3"> 2
														</label>
			  	    								</td>
			  	    								<td>
			  	    									<label class="checkbox">
															<input type="checkbox" id="inlineCheckbox3" value="option3"> 3
														</label>
			  	    								</td>
		  	    								</tr>
		  	    								<tr>
		  	    									<td>
			  	    									8. Educación superior de formación artistica (esfa)
			  	    								</td>
			  	    								<td>
			  	    									<label class="checkbox">
															<input type="checkbox" id="inlineCheckbox3" value="option3"> 1
														</label>
			  	    								</td>
			  	    								<td>
			  	    									<label class="checkbox">
															<input type="checkbox" id="inlineCheckbox3" value="option3"> 2
														</label>
			  	    								</td>
			  	    								<td>
			  	    									<label class="checkbox">
															<input type="checkbox" id="inlineCheckbox3" value="option3"> 3
														</label>
			  	    								</td>
		  	    								</tr>
		  	    								<tr>
		  	    									<td>
			  	    									9. Instituto superior tecnológico (ist)
			  	    								</td>
			  	    								<td>
			  	    									<label class="checkbox">
															<input type="checkbox" id="inlineCheckbox3" value="option3"> 1
														</label>
			  	    								</td>
			  	    								<td>
			  	    									<label class="checkbox">
															<input type="checkbox" id="inlineCheckbox3" value="option3"> 2
														</label>
			  	    								</td>
			  	    								<td>
			  	    									<label class="checkbox">
															<input type="checkbox" id="inlineCheckbox3" value="option3"> 3
														</label>
			  	    								</td>
		  	    								</tr>
		  	    								<tr>
		  	    									<td>
			  	    									10. Instituto superior pedagógico (isp)
			  	    								</td>
			  	    								<td>
			  	    									<label class="checkbox">
															<input type="checkbox" id="inlineCheckbox3" value="option3"> 1
														</label>
			  	    								</td>
			  	    								<td>
			  	    									<label class="checkbox">
															<input type="checkbox" id="inlineCheckbox3" value="option3"> 2
														</label>
			  	    								</td>
			  	    								<td>
			  	    									<label class="checkbox">
															<input type="checkbox" id="inlineCheckbox3" value="option3"> 3
														</label>
			  	    								</td>
		  	    								</tr>
		  	    								<tr>
		  	    									<td>
			  	    									11. Centro de educación técnico productivo (cetpro)
			  	    								</td>
			  	    								<td>
			  	    									<label class="checkbox">
															<input type="checkbox" id="inlineCheckbox3" value="option3"> 1
														</label>
			  	    								</td>
			  	    								<td>
			  	    									<label class="checkbox">
															<input type="checkbox" id="inlineCheckbox3" value="option3"> 2
														</label>
			  	    								</td>
			  	    								<td>
			  	    									<label class="checkbox">
															<input type="checkbox" id="inlineCheckbox3" value="option3"> 3
														</label>
			  	    								</td>
		  	    								</tr>
		  	    								<tr>
		  	    									<td>
			  	    									12. Progrma no escolarizado de educación inicial (pronoei)
			  	    								</td>
			  	    								<td>
			  	    									<label class="checkbox">
															<input type="checkbox" id="inlineCheckbox3" value="option3"> 1
														</label>
			  	    								</td>
			  	    								<td>
			  	    									<label class="checkbox">
															<input type="checkbox" id="inlineCheckbox3" value="option3"> 2
														</label>
			  	    								</td>
			  	    								<td>
			  	    									<label class="checkbox">
															<input type="checkbox" id="inlineCheckbox3" value="option3"> 3
														</label>
			  	    								</td>
		  	    								</tr>
		  	    								<tr>
		  	    									<td>
			  	    									13. Sala de educación temprana
			  	    								</td>
			  	    								<td>
			  	    									<label class="checkbox">
															<input type="checkbox" id="inlineCheckbox3" value="option3"> 1
														</label>
			  	    								</td>
			  	    								<td>
			  	    									<label class="checkbox">
															<input type="checkbox" id="inlineCheckbox3" value="option3"> 2
														</label>
			  	    								</td>
			  	    								<td>
			  	    									<label class="checkbox">
															<input type="checkbox" id="inlineCheckbox3" value="option3"> 3
														</label>
			  	    								</td>
		  	    								</tr>
		  	    								<tr>
		  	    									<td>
			  	    									14. Ludoteca
			  	    								</td>
			  	    								<td>
			  	    									<label class="checkbox">
															<input type="checkbox" id="inlineCheckbox3" value="option3"> 1
														</label>
			  	    								</td>
			  	    								<td>
			  	    									<label class="checkbox">
															<input type="checkbox" id="inlineCheckbox3" value="option3"> 2
														</label>
			  	    								</td>
			  	    								<td>
			  	    									<label class="checkbox">
															<input type="checkbox" id="inlineCheckbox3" value="option3"> 3
														</label>
			  	    								</td>
		  	    								</tr>
		  	    							</tbody>
		  	    						</table>

		  	    					</td>
		  	    				</tbody>
		  	    				<tbody>
		  	    					<td>5.</td>
		  	    					<td>
		  	    						<strong>
		  	    							¿cuál es la función del espacio educativo?
		  	    						</strong>
		  	    						<br />
		  	    						<label>(acepte uno o más códigos)</label>
		  	    					</td>
		  	    					<td>
		  	    						<label class="checkbox">
											<input type="checkbox" id="inlineCheckbox3" value="option3"> 1. Aula común
										</label>
		  	    						<label class="checkbox">
											<input type="checkbox" id="inlineCheckbox3" value="option3"> 2. Pedagógico
										</label>
		  	    						<label class="checkbox">
											<input type="checkbox" id="inlineCheckbox3" value="option3"> 3. Administrativo
										</label>
		  	    						<label class="checkbox">
											<input type="checkbox" id="inlineCheckbox3" value="option3"> 4. Complementario
										</label>
		  	    						<label class="checkbox">
											<input type="checkbox" id="inlineCheckbox3" value="option3"> 5. Servicios
										</label>
		  	    					</td>
		  	    				</tbody>
		  	    			</table>

		  	    			<table class="table table-bordered">
		  	    				<thead>
		  	    					<tr>
		  	    						<th colspan="3" style="text-align:center;">
		  	    							Espacio Pedagógico
		  	    						</th>
		  	    					</tr>
		  	    				</thead>
		  	    				<tbody>
		  	    					<tr>
			  	    					<td>6.</td>
			  	    					<td>
			  	    						<strong>Tipo de espacio educativo</strong>
			  	    						<br />(acepte sólo un código)
			  	    					</td>
			  	    					<td>
			  	    						<label class="checkbox">
												<input type="checkbox" id="inlineCheckbox3" value="option3"> 1. Sala de usos múltiples
											</label>
			  	    						<label class="checkbox">
												<input type="checkbox" id="inlineCheckbox3" value="option3"> 2. Sala de psicomotricidad
											</label>
			  	    						<label class="checkbox">
												<input type="checkbox" id="inlineCheckbox3" value="option3"> 3. Aula de usos múltiples
											</label>
			  	    						<label class="checkbox">
												<input type="checkbox" id="inlineCheckbox3" value="option3"> 4. Aula especial
											</label>
			  	    						<label class="checkbox">
												<input type="checkbox" id="inlineCheckbox3" value="option3"> 5. Laboratorio
											</label>
			  	    						<label class="checkbox">
												<input type="checkbox" id="inlineCheckbox3" value="option3"> 6. Taller ligero
											</label>
			  	    						<label class="checkbox">
												<input type="checkbox" id="inlineCheckbox3" value="option3"> 7. Taller semi-pesado
											</label>
			  	    					</td>
		  	    					</tr>
		  	    					<tr>
			  	    					<td>7.</td>
			  	    					<td>
			  	    						<strong>Tipo de aula especial</strong>
			  	    						<br />(acepte sólo un código)
			  	    					</td>
			  	    					<td>
			  	    						<label class="checkbox">
												<input type="checkbox" id="inlineCheckbox3" value="option3"> 1. De computo
											</label>
			  	    						<label class="checkbox">
												<input type="checkbox" id="inlineCheckbox3" value="option3"> 2. De música / Banda
											</label>
			  	    						<label class="checkbox">
												<input type="checkbox" id="inlineCheckbox3" value="option3"> 3. De idiomas
											</label>
			  	    						<label class="checkbox">
												<input type="checkbox" id="inlineCheckbox3" value="option3"> 4. De artes plásticas
											</label>
			  	    						<label class="checkbox">
												<input type="checkbox" id="inlineCheckbox3" value="option3"> 5. De matemáticas
											</label>
			  	    						<label class="checkbox">
												<input type="checkbox" id="inlineCheckbox3" value="option3"> 6. De ciencias sociales
											</label>
			  	    						<label class="checkbox">
												<input type="checkbox" id="inlineCheckbox3" value="option3"> 7. otro
											</label>
											<label>
												<input style="float:left; width:300px;" type="text" class="form-control">
												(Especifique)
											</label>
			  	    					</td>
		  	    					</tr>
		  	    					<tr>
			  	    					<td>8.</td>
			  	    					<td>
			  	    						<strong>Tipo de laboratorio</strong>
			  	    						<br />(acepte sólo un código)
			  	    					</td>
			  	    					<td>
			  	    						<label class="checkbox">
												<input type="checkbox" id="inlineCheckbox3" value="option3"> 1. Laboratorio multifuncional
											</label>
			  	    						<label class="checkbox">
												<input type="checkbox" id="inlineCheckbox3" value="option3"> 2. Laboratorio de física
											</label>
			  	    						<label class="checkbox">
												<input type="checkbox" id="inlineCheckbox3" value="option3"> 3. Laboratorio de química
											</label>
			  	    						<label class="checkbox">
												<input type="checkbox" id="inlineCheckbox3" value="option3"> 4. Laboratorio de Biología
											</label>
			  	    						<label class="checkbox">
												<input type="checkbox" id="inlineCheckbox3" value="option3"> 5. Laboratorio de Química - Biología
											</label>
			  	    						<label class="checkbox">
												<input type="checkbox" id="inlineCheckbox3" value="option3"> 6. otro
											</label>
											<label>
												<input style="float:left; width:300px;" type="text" class="form-control">
												(Especifique)
											</label>
			  	    					</td>
		  	    					</tr>
		  	    					<tr>
			  	    					<td>9.</td>
			  	    					<td>
			  	    						<strong>Tipo de taller ligero</strong>
			  	    						<br />(acepte sólo un código)
			  	    					</td>
			  	    					<td>
			  	    						<label class="checkbox">
												<input type="checkbox" id="inlineCheckbox3" value="option3"> 1. Dibujo técnico
											</label>
			  	    						<label class="checkbox">
												<input type="checkbox" id="inlineCheckbox3" value="option3"> 2. Electricidad
											</label>
			  	    						<label class="checkbox">
												<input type="checkbox" id="inlineCheckbox3" value="option3"> 3. Electrónica
											</label>
			  	    						<label class="checkbox">
												<input type="checkbox" id="inlineCheckbox3" value="option3"> 4. Industria alimentaria
											</label>
			  	    						<label class="checkbox">
												<input type="checkbox" id="inlineCheckbox3" value="option3"> 5. Industria del vestido
											</label>
			  	    						<label class="checkbox">
												<input type="checkbox" id="inlineCheckbox3" value="option3"> 6. Cosmetología
											</label>
											<label class="checkbox">
												<input type="checkbox" id="inlineCheckbox3" value="option3"> 7. Cerámica
											</label>
			  	    						<label class="checkbox">
												<input type="checkbox" id="inlineCheckbox3" value="option3"> 8. Orfebrería
											</label>
			  	    						<label class="checkbox">
												<input type="checkbox" id="inlineCheckbox3" value="option3"> 9. Bordado
											</label>
			  	    						<label class="checkbox">
												<input type="checkbox" id="inlineCheckbox3" value="option3"> 10. Floristería
											</label>
			  	    						<label class="checkbox">
												<input type="checkbox" id="inlineCheckbox3" value="option3"> 11. Juglería
											</label>
			  	    						<label class="checkbox">
												<input type="checkbox" id="inlineCheckbox3" value="option3"> 12. Artes decorativas
											</label>
											<label class="checkbox">
												<input type="checkbox" id="inlineCheckbox3" value="option3"> 13. Artes gráficas
											</label>
			  	    						<label class="checkbox">
												<input type="checkbox" id="inlineCheckbox3" value="option3"> 14. Coreoplastía
											</label>
			  	    						<label class="checkbox">
												<input type="checkbox" id="inlineCheckbox3" value="option3"> 15. Contabilidad
											</label>
			  	    						<label class="checkbox">
												<input type="checkbox" id="inlineCheckbox3" value="option3"> 16. Mecanografía y taquigrafía
											</label>
			  	    						<label class="checkbox">
												<input type="checkbox" id="inlineCheckbox3" value="option3"> 17. Otro
											</label>
			  	    						<label>
												<input style="float:left; width:300px;" type="text" class="form-control">
												(Especifique)
											</label>
			  	    					</td>
		  	    					</tr>
		  	    					<tr>
			  	    					<td>10.</td>
			  	    					<td>
			  	    						<strong>Tipo de taller semi-pesado</strong>
			  	    						<br />(acepte sólo un código)
			  	    					</td>
			  	    					<td>
			  	    						<label class="checkbox">
												<input type="checkbox" id="inlineCheckbox3" value="option3"> 1. Modelería y fundición
											</label>
			  	    						<label class="checkbox">
												<input type="checkbox" id="inlineCheckbox3" value="option3"> 2. Construcciones metálicas
											</label>
			  	    						<label class="checkbox">
												<input type="checkbox" id="inlineCheckbox3" value="option3"> 3. Mecánica de taller
											</label>
			  	    						<label class="checkbox">
												<input type="checkbox" id="inlineCheckbox3" value="option3"> 4. Mecánica automotriz
											</label>
			  	    						<label class="checkbox">
												<input type="checkbox" id="inlineCheckbox3" value="option3"> 5. Artesanía en papel
											</label>
			  	    						<label class="checkbox">
												<input type="checkbox" id="inlineCheckbox3" value="option3"> 6. Carpintería
											</label>
											<label class="checkbox">
												<input type="checkbox" id="inlineCheckbox3" value="option3"> 7. Construcción civil
											</label>
			  	    						<label class="checkbox">
												<input type="checkbox" id="inlineCheckbox3" value="option3"> 8. Otro
											</label>
											<label>
												<input style="float:left; width:300px;" type="text" class="form-control">
												(Especifique)
											</label>
			  	    					</td>
		  	    					</tr>
		  	    				</tbody>
		  	    			</table>

		  	    			<table class="table table-bordered">
		  	    				<thead>
		  	    					<tr>
		  	    						<th style="text-align:center;" colspan="3">Espacio Administrativo:</th>
		  	    					</tr>
		  	    				</thead>
		  	    				<tbody>
		  	    					<tr>
		  	    						<td>11.</td>
		  	    						<td>
		  	    							<strong>
		  	    								Tipo de espacio educativo
		  	    							</strong>
		  	    						</td>
		  	    						<td>
		  	    							<label class="checkbox">
												<input type="checkbox" id="inlineCheckbox3" value="option3"> 1. Dirección
											</label>
			  	    						<label class="checkbox">
												<input type="checkbox" id="inlineCheckbox3" value="option3"> 2. Sub dirección
											</label>
			  	    						<label class="checkbox">
												<input type="checkbox" id="inlineCheckbox3" value="option3"> 3. Secretaría y espera
											</label>
			  	    						<label class="checkbox">
												<input type="checkbox" id="inlineCheckbox3" value="option3"> 4. Sala de profesores
											</label>
			  	    						<label class="checkbox">
												<input type="checkbox" id="inlineCheckbox3" value="option3"> 5. Asesoría
											</label>
			  	    						<label class="checkbox">
												<input type="checkbox" id="inlineCheckbox3" value="option3"> 6. Sala de serv. Complementarios
											</label>
											<label class="checkbox">
												<input type="checkbox" id="inlineCheckbox3" value="option3"> 7. Tópico y servicios sociales
											</label>
			  	    						<label class="checkbox">
												<input type="checkbox" id="inlineCheckbox3" value="option3"> 8. Depósito de material educativo
											</label>
											<label class="checkbox">
												<input type="checkbox" id="inlineCheckbox3" value="option3"> 9. Impresiones
											</label>
											<label class="checkbox">
												<input type="checkbox" id="inlineCheckbox3" value="option3"> 10. Archivo
											</label>
											<label class="checkbox">
												<input type="checkbox" id="inlineCheckbox3" value="option3"> 11. Otro
											</label>
											<label>
												<input style="float:left; width:300px;" type="text" class="form-control">
												(Especifique)
											</label>
		  	    						</td>
		  	    					</tr>
		  	    				</tbody>
		  	    			</table>
		  	    			<table class="table table-bordered">
		  	    				<thead>
		  	    					<tr>
		  	    						<th style="text-align:center;" colspan="3">Espacio Complementario:</th>
		  	    					</tr>
		  	    				</thead>
		  	    				<tbody>
		  	    					<tr>
		  	    						<td>12.</td>
		  	    						<td>
		  	    							<strong>
		  	    								Tipo de espacio educativo
		  	    							</strong>
		  	    						</td>
		  	    						<td>
		  	    							<label class="checkbox">
												<input type="checkbox" id="inlineCheckbox3" value="option3"> 1. Sala de lactancia
											</label>
			  	    						<label class="checkbox">
												<input type="checkbox" id="inlineCheckbox3" value="option3"> 2. Sala de descanso
											</label>
			  	    						<label class="checkbox">
												<input type="checkbox" id="inlineCheckbox3" value="option3"> 3. Sala de higienización
											</label>
			  	    						<label class="checkbox">
												<input type="checkbox" id="inlineCheckbox3" value="option3"> 4. Sala de preparación de biberones
											</label>
			  	    						<label class="checkbox">
												<input type="checkbox" id="inlineCheckbox3" value="option3"> 5. Cocina
											</label>
			  	    						<label class="checkbox">
												<input type="checkbox" id="inlineCheckbox3" value="option3"> 6. Biblioteca
											</label>
											<label class="checkbox">
												<input type="checkbox" id="inlineCheckbox3" value="option3"> 7. Otro
											</label>
											<label>
												<input style="float:left; width:300px;" type="text" class="form-control">
												(Especifique)
											</label>
		  	    						</td>
		  	    					</tr>
		  	    				</tbody>
		  	    			</table>
		  	    			<table class="table table-bordered">
		  	    				<thead>
		  	    					<tr>
		  	    						<th style="text-align:center;" colspan="3">Espacio de Servicios:</th>
		  	    					</tr>
		  	    				</thead>
		  	    				<tbody>
		  	    					<tr>
		  	    						<td>13.</td>
		  	    						<td>
		  	    							<strong>
		  	    								Tipo de espacio educativo
		  	    							</strong>
		  	    						</td>
		  	    						<td>
		  	    							<label class="checkbox">
												<input type="checkbox" id="inlineCheckbox3" value="option3"> 1. SS.HH. Alumnado
											</label>
			  	    						<label class="checkbox">
												<input type="checkbox" id="inlineCheckbox3" value="option3"> 2. SS.HH. Personal
											</label>
			  	    						<label class="checkbox">
												<input type="checkbox" id="inlineCheckbox3" value="option3"> 3. caseta de guardianía
											</label>
			  	    						<label class="checkbox">
												<input type="checkbox" id="inlineCheckbox3" value="option3"> 4. Atrio de ingreso
											</label>
			  	    						<label class="checkbox">
												<input type="checkbox" id="inlineCheckbox3" value="option3"> 5. Área de espera
											</label>
			  	    						<label class="checkbox">
												<input type="checkbox" id="inlineCheckbox3" value="option3"> 6. Limpieza y mantenimiento
											</label>
											<label class="checkbox">
												<input type="checkbox" id="inlineCheckbox3" value="option3"> 7. Vivienda para docentes
											</label>
			  	    						<label class="checkbox">
												<input type="checkbox" id="inlineCheckbox3" value="option3"> 8. Vivienda para alumnos
											</label>
											<label class="checkbox">
												<input type="checkbox" id="inlineCheckbox3" value="option3"> 9. guardianía
											</label>
											<label class="checkbox">
												<input type="checkbox" id="inlineCheckbox3" value="option3"> 10. Cafetería / kiosco
											</label>
											<label class="checkbox">
												<input type="checkbox" id="inlineCheckbox3" value="option3"> 11. Cocina
											</label>
											<label class="checkbox">
												<input type="checkbox" id="inlineCheckbox3" value="option3"> 11. Comedor
											</label>
											<label class="checkbox">
												<input type="checkbox" id="inlineCheckbox3" value="option3"> 11. Despensa
											</label>
											<label class="checkbox">
												<input type="checkbox" id="inlineCheckbox3" value="option3"> 11. Vestuario
											</label>
											<label class="checkbox">
												<input type="checkbox" id="inlineCheckbox3" value="option3"> 11. Escaleras
											</label>
											<label class="checkbox">
												<input type="checkbox" id="inlineCheckbox3" value="option3"> 11. Ascensor
											</label>
											<label class="checkbox">
												<input type="checkbox" id="inlineCheckbox3" value="option3"> 11. Otro
											</label>
											<label>
												<input style="float:left; width:300px;" type="text" class="form-control">
												(Especifique)
											</label>
		  	    						</td>
		  	    					</tr>
		  	    				</tbody>
		  	    			</table>
		  	    			<table class="table table-bordered">
		  	    				<thead>
		  	    					<tr>
		  	    						<th style="text-align:center;" colspan="3">Evaluación de los SS.HH.:</th>
		  	    					</tr>
		  	    				</thead>
		  	    				<tbody>
		  	    					<tr>
		  	    						<td>14.</td>
		  	    						<td>
		  	    							<strong>
		  	    								Total de aparatos sanitarios
		  	    							</strong>
		  	    						</td>
		  	    						<td>

		  	    							<table class="table table-bordered">
		  	    								<tr>
		  	    									<td style="text-align:center;">Tipo</td>
		  	    									<td style="text-align:center;">Total</td>
		  	    								</tr>
		  	    								<tr>
		  	    									<td>1. Turcos (piso)</td>
		  	    									<td><input style="float:left; width:100px;" type="text" class="form-control"></td>
		  	    								</tr>
		  	    								<tr>
		  	    									<td>2. Letrinas</td>
		  	    									<td><input style="float:left; width:100px;" type="text" class="form-control"></td>
		  	    								</tr>
		  	    								<tr>
		  	    									<td>3. Inodoros de adultos accesibles (discapacidad)</td>
		  	    									<td><input style="float:left; width:100px;" type="text" class="form-control"></td>
		  	    								</tr>
		  	    								<tr>
		  	    									<td>4. Inodoros de adultos</td>
		  	    									<td><input style="float:left; width:100px;" type="text" class="form-control"></td>
		  	    								</tr>
		  	    								<tr>
		  	    									<td>5. Inodoros de niños accesibles (discapacidad)</td>
		  	    									<td><input style="float:left; width:100px;" type="text" class="form-control"></td>
		  	    								</tr>
		  	    								<tr>
		  	    									<td>6. Inodoros de niños</td>
		  	    									<td><input style="float:left; width:100px;" type="text" class="form-control"></td>
		  	    								</tr>
		  	    							</table>

		  	    						</td>
		  	    					</tr>
		  	    				</tbody>
		  	    			</table>
		  	    			<table class="table table-bordered">
		  	    				<thead>
		  	    					<tr>
		  	    						<th style="text-align:center;" colspan="3">Evaluador: en la pregunta 14, si sólo anotó información para las alternativas 1 y/o 2, pase a 14B.</th>
		  	    					</tr>
		  	    				</thead>
		  	    				<tbody>
		  	    					<tr>
		  	    						<td>14A.</td>
		  	    						<td>
		  	    							<strong>
		  	    								Del total de inodoros del ss.hh., ¿cuántos cumplen con la función de descarga?
		  	    							</strong>
		  	    						</td>
		  	    						<td>
		  	    							<label>Total</label>
											<input style="float:left; width:300px;" type="text" class="form-control">
		  	    						</td>
		  	    					</tr>
		  	    					<tr>
		  	    						<td>14B.</td>
		  	    						<td>
		  	    							<strong>
		  	    								Total de lavaderos
		  	    							</strong>
		  	    						</td>
		  	    						<td>
		  	    							<table class="table table-bordered">
		  	    								<tr>
		  	    									<td style="text-align:center;">Tipo</td>
		  	    									<td style="text-align:center;">Total</td>
		  	    								</tr>
		  	    								<tr>
		  	    									<td>1. Lavaderos o lavatorios</td>
		  	    									<td><input style="float:left; width:100px;" type="text" class="form-control"></td>
		  	    								</tr>
		  	    								<tr>
		  	    									<td>2. Lavaderos o lavatorios operativos</td>
		  	    									<td><input style="float:left; width:100px;" type="text" class="form-control"></td>
		  	    								</tr>
		  	    							</table>
		  	    						</td>
		  	    					</tr>
		  	    				</tbody>
		  	    			</table>
		  	    			<table class="table table-bordered">
		  	    				<thead>
		  	    					<tr>
		  	    						<th style="text-align:center;" colspan="3">Evaluación del estado de conservación:</th>
		  	    					</tr>
		  	    				</thead>
		  	    				<tbody>
		  	    					<tr>
		  	    						<td>15.</td>
		  	    						<td>
		  	    							<strong>
		  	    								Material predominante del piso
		  	    							</strong>
		  	    						</td>
		  	    						<td>
			  	    						<table class="table table-bordered">
			  	    							<thead>
			  	    								<tr>
			  	    									<td rowspan="2" style="text-align:center;">Material predominante en los pisos</td>
				  	    								<td colspan="3" style="text-align:center;">15A. Estado de conservación</td>
			  	    								</tr>
			  	    								<tr>
			  	    									<td style="text-align:center;">Bueno</td>
				  	    								<td style="text-align:center;">Regular</td>
				  	    								<td style="text-align:center;">Malo</td>
			  	    								</tr>
			  	    							</thead>
			  	    							<tbody>
			  	    								<tr>
			  	    									<td>
				  	    									1. Parquet o madera pulida
				  	    								</td>
				  	    								<td>
				  	    									<label class="checkbox">
																<input type="checkbox" id="inlineCheckbox3" value="option3"> 1
															</label>
				  	    								</td>
				  	    								<td>
				  	    									<label class="checkbox">
																<input type="checkbox" id="inlineCheckbox3" value="option3"> 2
															</label>
				  	    								</td>
				  	    								<td>
				  	    									<label class="checkbox">
																<input type="checkbox" id="inlineCheckbox3" value="option3"> 3
															</label>
				  	    								</td>
			  	    								</tr>
			  	    								<tr>
			  	    									<td>
				  	    									2. Láminas asfálticas, vinílicos o similares
				  	    								</td>
				  	    								<td>
				  	    									<label class="checkbox">
																<input type="checkbox" id="inlineCheckbox3" value="option3"> 1
															</label>
				  	    								</td>
				  	    								<td>
				  	    									<label class="checkbox">
																<input type="checkbox" id="inlineCheckbox3" value="option3"> 2
															</label>
				  	    								</td>
				  	    								<td>
				  	    									<label class="checkbox">
																<input type="checkbox" id="inlineCheckbox3" value="option3"> 3
															</label>
				  	    								</td>
			  	    								</tr>
			  	    								<tr>
			  	    									<td>
				  	    									3. Losetas, terrazos o similares
				  	    								</td>
				  	    								<td>
				  	    									<label class="checkbox">
																<input type="checkbox" id="inlineCheckbox3" value="option3"> 1
															</label>
				  	    								</tTipo de puertad>
				  	    								<td>
				  	    									<label class="checkbox">
																<input type="checkbox" id="inlineCheckbox3" value="option3"> 2
															</label>
				  	    								</td>
				  	    								<td>
				  	    									<label class="checkbox">
																<input type="checkbox" id="inlineCheckbox3" value="option3"> 3
															</label>
				  	    								</td>
			  	    								</tr>
			  	    								<tr>
			  	    									<td>
				  	    									4. Madera (entablados)
				  	    								</td>
				  	    								<td>
				  	    									<label class="checkbox">
																<input type="checkbox" id="inlineCheckbox3" value="option3"> 1
															</label>
				  	    								</td>
				  	    								<td>
				  	    									<label class="checkbox">
																<input type="checkbox" id="inlineCheckbox3" value="option3"> 2
															</label>
				  	    								</td>
				  	    								<td>
				  	    									<label class="checkbox">
																<input type="checkbox" id="inlineCheckbox3" value="option3"> 3
															</label>
				  	    								</td>
			  	    								</tr>
			  	    								<tr>
			  	    									<td>
				  	    									5. Cemento
				  	    								</td>
				  	    								<td>
				  	    									<label class="checkbox">
																<input type="checkbox" id="inlineCheckbox3" value="option3"> 1
															</label>
				  	    								</td>
				  	    								<td>
				  	    									<label class="checkbox">
																<input type="checkbox" id="inlineCheckbox3" value="option3"> 2
															</label>
				  	    								</td>
				  	    								<td>
				  	    									<label class="checkbox">
																<input type="checkbox" id="inlineCheckbox3" value="option3"> 3
															</label>
				  	    								</td>
			  	    								</tr>
			  	    								<tr>
			  	    									<td>
				  	    									6. Tierra
				  	    								</td>
				  	    								<td>
				  	    									<label class="checkbox">
																<input type="checkbox" id="inlineCheckbox3" value="option3"> 1
															</label>
				  	    								</td>
				  	    								<td>
				  	    									<label class="checkbox">
																<input type="checkbox" id="inlineCheckbox3" value="option3"> 2
															</label>
				  	    								</td>
				  	    								<td>
				  	    									<label class="checkbox">
																<input type="checkbox" id="inlineCheckbox3" value="option3"> 3
															</label>
				  	    								</td>
			  	    								</tr>
			  	    								<tr>
			  	    									<td>
				  	    									<label>
				  	    										7. Otro material
				  	    									</label>
				  	    									<label>
																<input style="float:left; width:300px;" type="text" class="form-control">
																(Especifique)
															</label>
				  	    								</td>
				  	    								<td>
				  	    									<label class="checkbox">
																<input type="checkbox" id="inlineCheckbox3" value="option3"> 1
															</label>
				  	    								</td>
				  	    								<td>
				  	    									<label class="checkbox">
																<input type="checkbox" id="inlineCheckbox3" value="option3"> 2
															</label>
				  	    								</td>
				  	    								<td>
				  	    									<label class="checkbox">
																<input type="checkbox" id="inlineCheckbox3" value="option3"> 3
															</label>
				  	    								</td>
			  	    								</tr>
			  	    							</tbody>
			  	    						</table>
		  	    						</td>
		  	    					</tr>
		  	    					<tr>
		  	    						<td>16.</td>
		  	    						<td>
		  	    							<strong>
		  	    								Tipo de puerta
		  	    							</strong>
		  	    						</td>
		  	    						<td>
		  	    							<table class="table table-bordered">
			  	    							<thead>
			  	    								<tr>
			  	    									<td rowspan="2" style="text-align:center;">Tipo de puerta</td>
				  	    								<td colspan="3" style="text-align:center;">16A. Estado de conservación</td>
			  	    								</tr>
			  	    								<tr>
			  	    									<td style="text-align:center;">Bueno</td>
				  	    								<td style="text-align:center;">Regular</td>
				  	    								<td style="text-align:center;">Malo</td>
			  	    								</tr>
			  	    							</thead>
			  	    							<tbody>
			  	    								<tr>
			  	    									<td>
				  	    									1. Metalica
				  	    								</td>
				  	    								<td>
				  	    									<label class="checkbox">
																<input type="checkbox" id="inlineCheckbox3" value="option3"> 1
															</label>
				  	    								</td>
				  	    								<td>
				  	    									<label class="checkbox">
																<input type="checkbox" id="inlineCheckbox3" value="option3"> 2
															</label>
				  	    								</td>
				  	    								<td>
				  	    									<label class="checkbox">
																<input type="checkbox" id="inlineCheckbox3" value="option3"> 3
															</label>
				  	    								</td>
			  	    								</tr>
			  	    								<tr>
			  	    									<td>
				  	    									2. Metálica con vidrio
				  	    								</td>
				  	    								<td>
				  	    									<label class="checkbox">
																<input type="checkbox" id="inlineCheckbox3" value="option3"> 1
															</label>
				  	    								</td>
				  	    								<td>
				  	    									<label class="checkbox">
																<input type="checkbox" id="inlineCheckbox3" value="option3"> 2
															</label>
				  	    								</td>
				  	    								<td>
				  	    									<label class="checkbox">
																<input type="checkbox" id="inlineCheckbox3" value="option3"> 3
															</label>
				  	    								</td>
			  	    								</tr>
			  	    								<tr>
			  	    									<td>
				  	    									3. Madera
				  	    								</td>
				  	    								<td>
				  	    									<label class="checkbox">
																<input type="checkbox" id="inlineCheckbox3" value="option3"> 1
															</label>
				  	    								</td>
				  	    								<td>
				  	    									<label class="checkbox">
																<input type="checkbox" id="inlineCheckbox3" value="option3"> 2
															</label>
				  	    								</td>
				  	    								<td>
				  	    									<label class="checkbox">
																<input type="checkbox" id="inlineCheckbox3" value="option3"> 3
															</label>
				  	    								</td>
			  	    								</tr>
			  	    								<tr>
			  	    									<td>
				  	    									4. Madera con vidrio
				  	    								</td>
				  	    								<td>
				  	    									<label class="checkbox">
																<input type="checkbox" id="inlineCheckbox3" value="option3"> 1
															</label>
				  	    								</td>
				  	    								<td>
				  	    									<label class="checkbox">
																<input type="checkbox" id="inlineCheckbox3" value="option3"> 2
															</label>
				  	    								</td>
				  	    								<td>
				  	    									<label class="checkbox">
																<input type="checkbox" id="inlineCheckbox3" value="option3"> 3
															</label>
				  	    								</td>
			  	    								</tr>
			  	    								<tr>
			  	    									<td>
			  	    										<label>
				  	    										5. Otro material
				  	    									</label>
				  	    									<label>
																<input style="float:left; width:300px;" type="text" class="form-control">
																(Especifique)
															</label>
			  	    									</td>
				  	    								<td>
				  	    									<label class="checkbox">
																<input type="checkbox" id="inlineCheckbox3" value="option3"> 1
															</label>
				  	    								</td>
				  	    								<td>
				  	    									<label class="checkbox">
																<input type="checkbox" id="inlineCheckbox3" value="option3"> 2
															</label>
				  	    								</td>
				  	    								<td>
				  	    									<label class="checkbox">
																<input type="checkbox" id="inlineCheckbox3" value="option3"> 3
															</label>
				  	    								</td>
			  	    								</tr>
			  	    								<tr>
			  	    									<td>
				  	    									6. No tiene
				  	    								</td>
				  	    								<td>
				  	    									<label class="checkbox">
																<input type="checkbox" id="inlineCheckbox3" value="option3"> 1
															</label>
				  	    								</td>
				  	    								<td>
				  	    									<label class="checkbox">
																<input type="checkbox" id="inlineCheckbox3" value="option3"> 2
															</label>
				  	    								</td>
				  	    								<td>
				  	    									<label class="checkbox">
																<input type="checkbox" id="inlineCheckbox3" value="option3"> 3
															</label>
				  	    								</td>
			  	    								</tr>
			  	    							</tbody>
			  	    						</table>
		  	    						</td>
		  	    					</tr>
		  	    					<tr>
		  	    						<td>17.</td>
		  	    						<td>
		  	    							<strong>
		  	    								Estado de conservación de la chapa o cerradura de la puerta
		  	    							</strong>
		  	    						</td>
		  	    						<td>
		  	    							<table class="table table-bordered">
		  	    								<thead>
		  	    									<tr>
		  	    										<td></td>
		  	    										<th style="text-align:center;">Total</th>
		  	    									</tr>
		  	    								</thead>
		  	    								<tbody>
		  	    									<tr>
			  	    									<td>1. Buen estado</td>
			  	    									<td><input style="float:left; width:100px;" type="text" class="form-control"></td>
		  	    									</tr>
		  	    									<tr>
			  	    									<td>2. Oxidado</td>
			  	    									<td><input style="float:left; width:100px;" type="text" class="form-control"></td>
		  	    									</tr>
		  	    									<tr>
			  	    									<td>3. Deteriorado</td>
			  	    									<td><input style="float:left; width:100px;" type="text" class="form-control"></td>
		  	    									</tr>
		  	    									<tr>
			  	    									<td>3. No tiene</td>
			  	    									<td><input style="float:left; width:100px;" type="text" class="form-control"></td>
		  	    									</tr>
		  	    								</tbody>
		  	    							</table>
		  	    						</td>
		  	    					</tr>
		  	    					<tr>
		  	    						<td>18.</td>
		  	    						<td>
		  	    							<strong>
		  	    								Tipo de ventana
		  	    							</strong>
		  	    						</td>
		  	    						<td>
		  	    							<table class="table table-bordered">
			  	    							<thead>
			  	    								<tr>
			  	    									<td rowspan="2" style="text-align:center;">Tipo de puerta</td>
				  	    								<td colspan="3" style="text-align:center;">16A. Estado de conservación</td>
			  	    								</tr>
			  	    								<tr>
			  	    									<td style="text-align:center;">Bueno</td>
				  	    								<td style="text-align:center;">Regular</td>
				  	    								<td style="text-align:center;">Malo</td>
			  	    								</tr>
			  	    							</thead>
			  	    							<tbody>
			  	    								<tr>
			  	    									<td>
				  	    									1. Metalica
				  	    								</td>
				  	    								<td>
				  	    									<label class="checkbox">
																<input type="checkbox" id="inlineCheckbox3" value="option3"> 1
															</label>
				  	    								</td>
				  	    								<td>
				  	    									<label class="checkbox">
																<input type="checkbox" id="inlineCheckbox3" value="option3"> 2
															</label>
				  	    								</td>
				  	    								<td>
				  	    									<label class="checkbox">
																<input type="checkbox" id="inlineCheckbox3" value="option3"> 3
															</label>
				  	    								</td>
			  	    								</tr>
			  	    								<tr>
			  	    									<td>
				  	    									2. Madera
				  	    								</td>
				  	    								<td>
				  	    									<label class="checkbox">
																<input type="checkbox" id="inlineCheckbox3" value="option3"> 1
															</label>
				  	    								</td>
				  	    								<td>
				  	    									<label class="checkbox">
																<input type="checkbox" id="inlineCheckbox3" value="option3"> 2
															</label>
				  	    								</td>
				  	    								<td>
				  	    									<label class="checkbox">
																<input type="checkbox" id="inlineCheckbox3" value="option3"> 3
															</label>
				  	    								</td>
			  	    								</tr>
			  	    								<tr>
			  	    									<td>
				  	    									3. Aluminio
				  	    								</td>
				  	    								<td>
				  	    									<label class="checkbox">
																<input type="checkbox" id="inlineCheckbox3" value="option3"> 1
															</label>
				  	    								</td>
				  	    								<td>
				  	    									<label class="checkbox">
																<input type="checkbox" id="inlineCheckbox3" value="option3"> 2
															</label>
				  	    								</td>
				  	    								<td>
				  	    									<label class="checkbox">
																<input type="checkbox" id="inlineCheckbox3" value="option3"> 3
															</label>
				  	    								</td>
			  	    								</tr>
			  	    								<tr>
			  	    									<td>
				  	    									4. Malla
				  	    								</td>
				  	    								<td>
				  	    									<label class="checkbox">
																<input type="checkbox" id="inlineCheckbox3" value="option3"> 1
															</label>
				  	    								</td>
				  	    								<td>
				  	    									<label class="checkbox">
																<input type="checkbox" id="inlineCheckbox3" value="option3"> 2
															</label>
				  	    								</td>
				  	    								<td>
				  	    									<label class="checkbox">
																<input type="checkbox" id="inlineCheckbox3" value="option3"> 3
															</label>
				  	    								</td>
			  	    								</tr>
			  	    								<tr>
			  	    									<td>
			  	    										<label>
				  	    										5. Otro material
				  	    									</label>
				  	    									<label>
																<input style="float:left; width:300px;" type="text" class="form-control">
																(Especifique)
															</label>
			  	    									</td>
				  	    								<td>
				  	    									<label class="checkbox">
																<input type="checkbox" id="inlineCheckbox3" value="option3"> 1
															</label>
				  	    								</td>
				  	    								<td>
				  	    									<label class="checkbox">
																<input type="checkbox" id="inlineCheckbox3" value="option3"> 2
															</label>
				  	    								</td>
				  	    								<td>
				  	    									<label class="checkbox">
																<input type="checkbox" id="inlineCheckbox3" value="option3"> 3
															</label>
				  	    								</td>
			  	    								</tr>
			  	    								<tr>
			  	    									<td>
				  	    									6. No tiene
				  	    								</td>
				  	    								<td>
				  	    									<label class="checkbox">
																<input type="checkbox" id="inlineCheckbox3" value="option3"> 1
															</label>
				  	    								</td>
				  	    								<td>
				  	    									<label class="checkbox">
																<input type="checkbox" id="inlineCheckbox3" value="option3"> 2
															</label>
				  	    								</td>
				  	    								<td>
				  	    									<label class="checkbox">
																<input type="checkbox" id="inlineCheckbox3" value="option3"> 3
															</label>
				  	    								</td>
			  	    								</tr>
			  	    							</tbody>
			  	    						</table>
		  	    						</td>
		  	    					</tr>
		  	    					<tr>
		  	    						<td>19.</td>
		  	    						<td>
		  	    							<strong>
		  	    								Estado de conservación de los vidrios
		  	    							</strong>
		  	    						</td>
		  	    						<td>
		  	    							<table class="table table-bordered">
		  	    								<thead>
		  	    									<tr>
		  	    										<td></td>
		  	    										<th style="text-align:center;">Total</th>
		  	    									</tr>
		  	    								</thead>
		  	    								<tbody>
		  	    									<tr>
			  	    									<td>1. Completos</td>
			  	    									<td><input style="float:left; width:100px;" type="text" class="form-control"></td>
		  	    									</tr>
		  	    									<tr>
			  	    									<td>2. Con roturas</td>
			  	    									<td><input style="float:left; width:100px;" type="text" class="form-control"></td>
		  	    									</tr>
		  	    									<tr>
			  	    									<td>3. Sin vidrios</td>
			  	    									<td><input style="float:left; width:100px;" type="text" class="form-control"></td>
		  	    									</tr>
		  	    								</tbody>
		  	    							</table>
		  	    						</td>
		  	    					</tr>
		  	    				</tbody>
		  	    			</table>

		  	    			<div class="panel">
								<label>Observaciones:</label>
								<textarea style="width:870px; height:100px;"></textarea>
							</div>

							<table class="table table-bordered">
								<thead>
									<tr>
										<th colspan="3">Sección C:  instalaciones eléctricas interiores de la edificación</th>
									</tr>
									<tr>
										<th colspan="3">Evaluador: esta sección se realizará por observación directa excepto las preguntas 2, 3 y 3a, las cuales primero deberá preguntar y luego verificar.</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td>
											1.
										</td>
										<td><strong>Esta edificación tiene instalaciones eléctricas interiores</strong></td>
										<td>
											<div class="radio">
												<label>
													<input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked>
													    1. Si
													</label>
											</div>
											<div class="radio">
												<label>
													<input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked>
													    2. No
													</label>
											</div>
										</td>
									</tr>
									<tr>
										<td>
											1A.
										</td>
										<td>
											<strong>Indique el tipo de instalación de los circuitos eléctricos</strong>
											<br />(acepte sólo un código)
										</td>
										<td>
											<div class="radio">
												<label>
													<input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked>
													    Circuito canalizado empotrado
													</label>
											</div>
											<div class="radio">
												<label>
													<input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked>
													    Circuito canalizado expuesto
													</label>
											</div>
											<div class="radio">
												<label>
													<input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked>
													    Circuito sin canalizar
													</label>
											</div>
											<div class="radio">
												<label>
													<input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked>
													    Con conductor inadecuado
													</label>
											</div>
										</td>
									</tr>
								</tbody>
							</table>

							<table class="table table-bordered">
								<thead>
									<tr>
										<th colspan="3">Tablero de distribución</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td>
											2.
										</td>
										<td>
											<strong>¿Esta edificación tiene tablero de distribución?</strong>
											<br />(verificar)
										</td>
										<td>
											<div class="radio">
												<label>
													<input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked>
													    1. Si
													</label>
											</div>
											<div class="radio">
												<label>
													<input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked>
													    2. No
													</label>
											</div>
										</td>
									</tr>
									<tr>
										<td>
											2A.
										</td>
										<td>
											<strong>Es de fácil acceso</strong>
										</td>
										<td>
											<div class="radio">
												<label>
													<input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked>
													    1. Si
													</label>
											</div>
											<div class="radio">
												<label>
													<input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked>
													    2. No
													</label>
											</div>
										</td>
									</tr>
									<tr>
										<td>
											2B.
										</td>
										<td>
											<strong>Tiene un gabinete adecuado</strong>
										</td>
										<td>
											<div class="radio">
												<label>
													<input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked>
													    1. Si
													</label>
											</div>
											<div class="radio">
												<label>
													<input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked>
													    2. No
													</label>
											</div>
										</td>
									</tr>
									<tr>
										<td>
											2C.
										</td>
										<td>
											<strong>Tiene interruptores electromagnéticos</strong>
										</td>
										<td>
											<div class="radio">
												<label>
													<input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked>
													    1. Si
													</label>
											</div>
											<div class="radio">
												<label>
													<input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked>
													    2. No
													</label>
											</div>
										</td>
									</tr>
									<tr>
										<td>
											2D.
										</td>
										<td>
											<strong>Tiene interruptores diferenciales</strong>
										</td>
										<td>
											<div class="radio">
												<label>
													<input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked>
													    1. Si
													</label>
											</div>
											<div class="radio">
												<label>
													<input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked>
													    2. No
													</label>
											</div>
										</td>
									</tr>
									<tr>
										<td>
											3.
										</td>
										<td>
											<strong>¿Cuenta con sistema de puesta a tierra?</strong>
											<br />(Verificar)
										</td>
										<td>
											<div class="radio">
												<label>
													<input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked>
													    1. Si
													</label>
											</div>
											<div class="radio">
												<label>
													<input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked>
													    2. No
													</label>
											</div>
										</td>
									</tr>
									<tr>
										<td>
											3A.
										</td>
										<td>
											<strong>¿en qué año se hizo el último mantenimiento?</strong>
										</td>
										<td>
											<label>Año</label>
											<input style="width:100px;" type="text" class="form-control" placeholder="Text input">
										</td>
									</tr>
								</tbody>
							</table>

							<table class="table table-bordered">
								<thead>
									<tr>
										<th colspan="3">Sección D: Instalaciones sanitarias interiores de la edificación</th>
									</tr>
									<tr>
										<th colspan="3">Evaluador: Evaluador: esta sección se realizará por observación directa.</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td>
											1.
										</td>
										<td><strong>Esta edificación cuenta con red interna de agua</strong></td>
										<td>
											<div class="radio">
												<label>
													<input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked>
													    1. Si
													</label>
											</div>
											<div class="radio">
												<label>
													<input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked>
													    2. No
													</label>
											</div>
										</td>
									</tr>
									<tr>
										<td>
											1A.
										</td>
										<td>
											<strong>La instalación es empotrada</strong>
										</td>
										<td>
											<div class="radio">
												<label>
													<input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked>
													    1. Si
													</label>
											</div>
											<div class="radio">
												<label>
													<input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked>
													    2. No
													</label>
											</div>
										</td>
									</tr>
									<tr>
										<td>
											2.
										</td>
										<td>
											<strong>Esta edificación cuenta con red interna de desague</strong>
										</td>
										<td>
											<div class="radio">
												<label>
													<input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked>
													    1. Si
													</label>
											</div>
											<div class="radio">
												<label>
													<input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked>
													    2. No
													</label>
											</div>
										</td>
									</tr>
								</tbody>
							</table>

							<table class="table table-bordered">
								<thead>
									<tr>
										<th colspan="3">Sección E: Canaletas aéreas y bajadas pluviales de la edificación</th>
									</tr>
									<tr>
										<th colspan="3">Evaluador: Evaluador: esta sección se realizará por observación directa</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td>
											1.
										</td>
										<td><strong>Esta edificación tiene instaladas canaletas aéreas y bajadas pluviales</strong></td>
										<td>
											<div class="radio">
												<label>
													<input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked>
													    1. Si
													</label>
											</div>
											<div class="radio">
												<label>
													<input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked>
													    2. No
													</label>
											</div>
										</td>
									</tr>
									<tr>
										<td>
											1A.
										</td>
										<td>
											<strong>Cuál es el estado de conservación:</strong>
											<br />(acepte sólo un código)
										</td>
										<td>
											<div class="radio">
												<label>
													<input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked>
													    1. Sin daños
													</label>
											</div>
											<div class="radio">
												<label>
													<input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked>
													    2. Deterioro parcial
													</label>
											</div>
											<div class="radio">
												<label>
													<input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked>
													    2. Colapso total
													</label>
											</div>
										</td>
									</tr>
								</tbody>
							</table>

							<div class="panel">
								<label>Observaciones:</label>
								<textarea style="width:870px; height:100px;"></textarea>
							</div>

		  	    		</div>
	  	    		</div>
	  	    	</div><!-- END CAPITULO 6-->