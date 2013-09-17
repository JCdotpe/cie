
<script type="text/javascript">

	$.import('css/basic.css','css');
	$.import('js/visor/capitulo6/index.js','js');

</script>

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



		  	    			<div id="pag_seccion_a">

			  	    				<div class="panel panel_title">
										<strong>LISTADO DE EDIFICIACIONES</strong>
									</div>
									<table class="table table-hover" style="width:920px;">
											<thead>
								    		<tr>

								    				<th style="text-align:center;">NRO DE EDIFICACION</th>
								    				<th style="text-align:center;">AREA TECHADA DEL PRIMER PISO DE LA EDIFICACIÓN</th>
								    				<th style="text-align:center;">PREDIO EN EL QUE SE UBICA LA EDIFICACIÓN</th>
								    		</tr>
								    		</thead>

								    </table>
								    <div style="width:920px; height:150px; overflow:auto;">
									    <table class="table table-hover" >
									    	<tbody id="seccion_m">

									    	</tbody>
									    </table>

								    </div>
		  	    			</div>

		  	    			<div id="seccion_a" class="content7">
								<!--AJAX-->
							</div>

							<div id="seccion_a_p10" class="content7">
								<!--AJAX-->
								<table class="table table-bordered">
		  	    				<tbody>
		  	    					<td>10.</td>
		  	    					<td>
		  	    						<strong>
		  	    							¿ Los niveles o modalidades que hacen uso de esta edificación son :
		  	    						</strong>
		  	    						<br />
		  	    						<label>(Acepte uno o más códigos)</label>
		  	    					</td>
		  	    					<td>
		  	    						<table class="table table-bordered">

		  	    							<tbody>
		  	    								<tr>
		  	    									<td>
			  	    									1. Inicial cuna?
			  	    								</td>
			  	    								<td>
			  	    									<label class="checkbox">
															<input type="checkbox" id="P6_1_10_e1" value="option3">
														</label>
			  	    								</td>
		  	    								</tr>
		  	    								<tr>
		  	    									<td>
			  	    									2. Inicial jardín?
			  	    								</td>
			  	    								<td>
			  	    									<label class="checkbox">
															<input type="checkbox" id="P6_1_10_e2" value="option3">
														</label>
			  	    								</td>
		  	    								</tr>
		  	    								<tr>
		  	    									<td>
			  	    									3. Inicial cuna jardín?
			  	    								</td>
			  	    								<td>
			  	    									<label class="checkbox">
															<input type="checkbox" id="P6_1_10_e3" value="option3">
														</label>
			  	    								</td>
		  	    								</tr>
		  	    								<tr>
		  	    									<td>
			  	    									4. Primaria?
			  	    								</td>
			  	    								<td>
			  	    									<label class="checkbox">
															<input type="checkbox" id="P6_1_10_e4" value="option3">
														</label>
			  	    								</td>
		  	    								</tr>
		  	    								<tr>
		  	    									<td>
			  	    									5. Secundaria?
			  	    								</td>
			  	    								<td>
			  	    									<label class="checkbox">
															<input type="checkbox" id="P6_1_10_e5" value="option3">
														</label>
			  	    								</td>
		  	    								</tr>
		  	    								<tr>
		  	    									<td>
			  	    									6. Educación básica alternativa (EBA)?
			  	    								</td>
			  	    								<td>
			  	    									<label class="checkbox">
															<input type="checkbox" id="P6_1_10_e6" value="option3">
														</label>
			  	    								</td>
		  	    								</tr>
		  	    								<tr>
		  	    									<td>
			  	    									7. Educación básica especial (EBE)?
			  	    								</td>
			  	    								<td>
			  	    									<label class="checkbox">
															<input type="checkbox" id="P6_1_10_e7" value="option3">
														</label>
			  	    								</td>
		  	    								</tr>
		  	    								<tr>
		  	    									<td>
			  	    									8. Educación superior de formación artistica (ESFA)?
			  	    								</td>
			  	    								<td>
			  	    									<label class="checkbox">
															<input type="checkbox" id="P6_1_10_e8" value="option3">
														</label>
			  	    								</td>
		  	    								</tr>
		  	    								<tr>
		  	    									<td>
			  	    									9. Instituto superior tecnológico (IST)?
			  	    								</td>
			  	    								<td>
			  	    									<label class="checkbox">
															<input type="checkbox" id="P6_1_10_e9" value="option3">
														</label>
			  	    								</td>
		  	    								</tr>
		  	    								<tr>
		  	    									<td>
			  	    									10. Instituto superior pedagógico (IST)?
			  	    								</td>
			  	    								<td>
			  	    									<label class="checkbox">
															<input type="checkbox" id="P6_1_10_e10" value="option3">
														</label>
			  	    								</td>
		  	    								</tr>
		  	    								<tr>
		  	    									<td>
			  	    									11. Centro de educación técnico productivo (CETPRO)?
			  	    								</td>
			  	    								<td>
			  	    									<label class="checkbox">
															<input type="checkbox" id="P6_1_10_e11" value="option3">
														</label>
			  	    								</td>
		  	    								</tr>
		  	    								<tr>
		  	    									<td>
			  	    									12. Programa no escolarizado de educación inicial (PRONOEI)?
			  	    								</td>
			  	    								<td>
			  	    									<label class="checkbox">
															<input type="checkbox" id="P6_1_10_e12" value="option3">
														</label>
			  	    								</td>
		  	    								</tr>
		  	    								<tr>
		  	    									<td>
			  	    									13. Sala de educación temprana?
			  	    								</td>
			  	    								<td>
			  	    									<label class="checkbox">
															<input type="checkbox" id="P6_1_10_e13" value="option3">
														</label>
			  	    								</td>
		  	    								</tr>
		  	    								<tr>
		  	    									<td>
			  	    									14. Ludoteca?
			  	    								</td>
			  	    								<td>
			  	    									<label class="checkbox">
															<input type="checkbox" id="P6_1_10_e14" value="option3">
														</label>
			  	    								</td>
		  	    								</tr>
		  	    							</tbody>
		  	    						</table>

		  	    					</td>
		  	    				</tbody>
		  	    				</table>
							</div>

							<div id="pag_seccion_b" >
			  	    				<!--AJAX-->
			  	    				<div class="panel panel_title">
										<strong>LISTADO DE AMBIENTES</strong>
									</div>

			  	    				<table class="table table-hover" style="width:920px;" >
											<thead>
								    		<tr>
								    			<th style="text-align:center;">NRO DE AMBIENTE</th>
								    			<th style="text-align:center;">NRO DE PISO</th>
								    		</tr>
								    		</thead>
								    </table>

									<div style="width:920px; height:150px; overflow:auto;">
										    <table class="table table-hover" >
										    	<tbody id="seccion_b">

										    	</tbody>
										    </table>
									</div>
			  	    		</div>

							<table class="table table-bordered" id="pag_seccion_b1">
		  	    				<thead>
		  	    					<tr>
			  	    					<div class="panel-heading">
											<h5 class="panel-title">Sección B: Verificación de los espacios educativos de la edificación</h5>
										</div>
		  	    					</tr>
		  	    				</thead>
		  	    				<tbody>
		  	    					<tr>
		  	    						<td>
		  	    							<label>1. Ambiente Nº</label>
		  	    							<input style="width:100px;float:left;" type="text" class="form-control" id="P6_2_1">
		  	    						</td>
		  	    						<td>
		  	    							<label>2. Piso N°</label>
		  	    							<input style="width:100px;float:left;" type="text" class="form-control" id="P5_NroPiso">
		  	    						</td>
		  	    					</tr>
		  	    				</tbody>
		  	    			</table>
		  	    			<table class="table table-bordered" id="pag_seccion_b2">
		  	    				<tbody>
		  	    					<td>3.</td>
		  	    					<td>
		  	    						<strong>
		  	    							<label class="checkbox-inline">
												<input type="checkbox" id="P6_2_31" value="option1"> 1. Si
											</label>
											<label class="checkbox-inline">
												<input type="checkbox" id="P6_2_32" value="option1"> 2. No
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
		  	    						<label>(Acepte uno o más códigos)</label>
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
															<input type="checkbox" id="1P6_2_4Turno_M1" value="option3"> 1
														</label>
			  	    								</td>
			  	    								<td>
			  	    									<label class="checkbox">
															<input type="checkbox" id="1P6_2_4Turno_T2" value="option3"> 2
														</label>
			  	    								</td>
			  	    								<td>
			  	    									<label class="checkbox">
															<input type="checkbox" id="1P6_2_4Turno_N3" value="option3"> 3
														</label>
			  	    								</td>
		  	    								</tr>
		  	    								<tr>
		  	    									<td>
			  	    									2. Inicial jardín
			  	    								</td>
			  	    								<td>
			  	    									<label class="checkbox">
															<input type="checkbox" id="2P6_2_4Turno_M1" value="option3"> 1
														</label>
			  	    								</td>
			  	    								<td>
			  	    									<label class="checkbox">
															<input type="checkbox" id="2P6_2_4Turno_T2" value="option3"> 2
														</label>
			  	    								</td>
			  	    								<td>
			  	    									<label class="checkbox">
															<input type="checkbox" id="2P6_2_4Turno_N3" value="option3"> 3
														</label>
			  	    								</td>
		  	    								</tr>
		  	    								<tr>
		  	    									<td>
			  	    									3. Inicial cuna jardín
			  	    								</td>
			  	    								<td>
			  	    									<label class="checkbox">
															<input type="checkbox" id="3P6_2_4Turno_M1" value="option3"> 1
														</label>
			  	    								</td>
			  	    								<td>
			  	    									<label class="checkbox">
															<input type="checkbox" id="3P6_2_4Turno_T2" value="option3"> 2
														</label>
			  	    								</td>
			  	    								<td>
			  	    									<label class="checkbox">
															<input type="checkbox" id="3P6_2_4Turno_N3" value="option3"> 3
														</label>
			  	    								</td>
		  	    								</tr>
		  	    								<tr>
		  	    									<td>
			  	    									4. Primaria
			  	    								</td>
			  	    								<td>
			  	    									<label class="checkbox">
															<input type="checkbox" id="4P6_2_4Turno_M1" value="option3"> 1
														</label>
			  	    								</td>
			  	    								<td>
			  	    									<label class="checkbox">
															<input type="checkbox" id="4P6_2_4Turno_T2" value="option3"> 2
														</label>
			  	    								</td>
			  	    								<td>
			  	    									<label class="checkbox">
															<input type="checkbox" id="4P6_2_4Turno_N3" value="option3"> 3
														</label>
			  	    								</td>
		  	    								</tr>
		  	    								<tr>
		  	    									<td>
			  	    									5. Secundaria
			  	    								</td>
			  	    								<td>
			  	    									<label class="checkbox">
															<input type="checkbox" id="5P6_2_4Turno_M1" value="option3"> 1
														</label>
			  	    								</td>
			  	    								<td>
			  	    									<label class="checkbox">
															<input type="checkbox" id="5P6_2_4Turno_T2" value="option3"> 2
														</label>
			  	    								</td>
			  	    								<td>
			  	    									<label class="checkbox">
															<input type="checkbox" id="5P6_2_4Turno_N3" value="option3"> 3
														</label>
			  	    								</td>
		  	    								</tr>
		  	    								<tr>
		  	    									<td>
			  	    									6. Educación básica alternativa (EBA)
			  	    								</td>
			  	    								<td>
			  	    									<label class="checkbox">
															<input type="checkbox" id="6P6_2_4Turno_M1" value="option3"> 1
														</label>
			  	    								</td>
			  	    								<td>
			  	    									<label class="checkbox">
															<input type="checkbox" id="6P6_2_4Turno_T2" value="option3"> 2
														</label>
			  	    								</td>
			  	    								<td>
			  	    									<label class="checkbox">
															<input type="checkbox" id="6P6_2_4Turno_N3" value="option3"> 3
														</label>
			  	    								</td>
		  	    								</tr>
		  	    								<tr>
		  	    									<td>
			  	    									7. Educación básica especial (EBE)
			  	    								</td>
			  	    								<td>
			  	    									<label class="checkbox">
															<input type="checkbox" id="7P6_2_4Turno_M1" value="option3"> 1
														</label>
			  	    								</td>
			  	    								<td>
			  	    									<label class="checkbox">
															<input type="checkbox" id="7P6_2_4Turno_T2" value="option3"> 2
														</label>
			  	    								</td>
			  	    								<td>
			  	    									<label class="checkbox">
															<input type="checkbox" id="7P6_2_4Turno_N3" value="option3"> 3
														</label>
			  	    								</td>
		  	    								</tr>
		  	    								<tr>
		  	    									<td>
			  	    									8. Educación superior de formación artistica (esfa)
			  	    								</td>
			  	    								<td>
			  	    									<label class="checkbox">
															<input type="checkbox" id="8P6_2_4Turno_M1" value="option3"> 1
														</label>
			  	    								</td>
			  	    								<td>
			  	    									<label class="checkbox">
															<input type="checkbox" id="8P6_2_4Turno_T2" value="option3"> 2
														</label>
			  	    								</td>
			  	    								<td>
			  	    									<label class="checkbox">
															<input type="checkbox" id="8P6_2_4Turno_N3" value="option3"> 3
														</label>
			  	    								</td>
		  	    								</tr>
		  	    								<tr>
		  	    									<td>
			  	    									9. Instituto superior tecnológico (ist)
			  	    								</td>
			  	    								<td>
			  	    									<label class="checkbox">
															<input type="checkbox" id="9P6_2_4Turno_M1" value="option3"> 1
														</label>
			  	    								</td>
			  	    								<td>
			  	    									<label class="checkbox">
															<input type="checkbox" id="9P6_2_4Turno_T2" value="option3"> 2
														</label>
			  	    								</td>
			  	    								<td>
			  	    									<label class="checkbox">
															<input type="checkbox" id="9P6_2_4Turno_N3" value="option3"> 3
														</label>
			  	    								</td>
		  	    								</tr>
		  	    								<tr>
		  	    									<td>
			  	    									10. Instituto superior pedagógico (isp)
			  	    								</td>
			  	    								<td>
			  	    									<label class="checkbox">
															<input type="checkbox" id="10P6_2_4Turno_M1" value="option3"> 1
														</label>
			  	    								</td>
			  	    								<td>
			  	    									<label class="checkbox">
															<input type="checkbox" id="10P6_2_4Turno_T2" value="option3"> 2
														</label>
			  	    								</td>
			  	    								<td>
			  	    									<label class="checkbox">
															<input type="checkbox" id="10P6_2_4Turno_N3" value="option3"> 3
														</label>
			  	    								</td>
		  	    								</tr>
		  	    								<tr>
		  	    									<td>
			  	    									11. Centro de educación técnico productivo (cetpro)
			  	    								</td>
			  	    								<td>
			  	    									<label class="checkbox">
															<input type="checkbox" id="11P6_2_4Turno_M1" value="option3"> 1
														</label>
			  	    								</td>
			  	    								<td>
			  	    									<label class="checkbox">
															<input type="checkbox" id="11P6_2_4Turno_T2" value="option3"> 2
														</label>
			  	    								</td>
			  	    								<td>
			  	    									<label class="checkbox">
															<input type="checkbox" id="11P6_2_4Turno_N3" value="option3"> 3
														</label>
			  	    								</td>
		  	    								</tr>
		  	    								<tr>
		  	    									<td>
			  	    									12. Progrma no escolarizado de educación inicial (pronoei)
			  	    								</td>
			  	    								<td>
			  	    									<label class="checkbox">
															<input type="checkbox" id="12P6_2_4Turno_M1" value="option3"> 1
														</label>
			  	    								</td>
			  	    								<td>
			  	    									<label class="checkbox">
															<input type="checkbox" id="12P6_2_4Turno_T2" value="option3"> 2
														</label>
			  	    								</td>
			  	    								<td>
			  	    									<label class="checkbox">
															<input type="checkbox" id="12P6_2_4Turno_N3" value="option3"> 3
														</label>
			  	    								</td>
		  	    								</tr>
		  	    								<tr>
		  	    									<td>
			  	    									13. Sala de educación temprana
			  	    								</td>
			  	    								<td>
			  	    									<label class="checkbox">
															<input type="checkbox" id="13P6_2_4Turno_M1" value="option3"> 1
														</label>
			  	    								</td>
			  	    								<td>
			  	    									<label class="checkbox">
															<input type="checkbox" id="13P6_2_4Turno_T2" value="option3"> 2
														</label>
			  	    								</td>
			  	    								<td>
			  	    									<label class="checkbox">
															<input type="checkbox" id="13P6_2_4Turno_N3" value="option3"> 3
														</label>
			  	    								</td>
		  	    								</tr>
		  	    								<tr>
		  	    									<td>
			  	    									14. Ludoteca
			  	    								</td>
			  	    								<td>
			  	    									<label class="checkbox">
															<input type="checkbox" id="14P6_2_4Turno_M1" value="option3"> 1
														</label>
			  	    								</td>
			  	    								<td>
			  	    									<label class="checkbox">
															<input type="checkbox" id="14P6_2_4Turno_T2" value="option3"> 2
														</label>
			  	    								</td>
			  	    								<td>
			  	    									<label class="checkbox">
															<input type="checkbox" id="14P6_2_4Turno_N3" value="option3"> 3
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
		  	    						<label>(Acepte uno o más códigos)</label>
		  	    					</td>
		  	    					<td>
		  	    						<label class="radio">
											<input type="radio" id="P6_2_51" name="radio5" value="option3"> 1. Aula común
										</label>
		  	    						<label class="radio">
											<input type="radio" id="P6_2_52" name="radio5" value="option3"> 2. Pedagógico
										</label>
		  	    						<label class="radio">
											<input type="radio" id="P6_2_53"  name="radio5" value="option3"> 3. Administrativo
										</label>
		  	    						<label class="radio">
											<input type="radio" id="P6_2_54" name="radio5" value="option3"> 4. Complementario
										</label>
		  	    						<label class="radio">
											<input type="radio" id="P6_2_55" name="radio5" value="option3"> 5. Servicios
										</label>
		  	    					</td>
		  	    				</tbody>
		  	    			</table>

		  	    			<div id="funcion_educativa">
		  	    				<!-- Load secciones-->

		  	    				<!-- caso 2  espacio pedagogico-->
		  	    				<table class="table table-bordered" id="espaciopedagogico">
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
			  	    						<br />(Acepte sólo un código)
			  	    					</td>
			  	    					<td>
			  	    						<label class="radio">
												<input type="radio" id="P6_2_61" value="option3"> 1. Sala de usos múltiples
											</label>
			  	    						<label class="radio">
												<input type="radio" id="P6_2_62" value="option3"> 2. Sala de psicomotricidad
											</label>
			  	    						<label class="radio">
												<input type="radio" id="P6_2_63" value="option3"> 3. Aula de usos múltiples
											</label>
			  	    						<label class="radio">
												<input type="radio" id="P6_2_64" value="option3"> 4. Aula especial
											</label>
			  	    						<label class="radio">
												<input type="radio" id="P6_2_65" value="option3"> 5. Laboratorio
											</label>
			  	    						<label class="radio">
												<input type="radio" id="P6_2_66" value="option3"> 6. Taller ligero
											</label>
			  	    						<label class="radio">
												<input type="radio" id="P6_2_67" value="option3"> 7. Taller semi-pesado
											</label>
			  	    					</td>
		  	    					</tr>
		  	    					<tr id="P6caso4">
			  	    					<td>7.</td>
			  	    					<td>
			  	    						<strong>Tipo de aula especial</strong>
			  	    						<br />(Acepte sólo un código)
			  	    					</td>
			  	    					<td>
			  	    						<label class="radio">
												<input type="radio" id="P6_2_71" value="option3"> 1. De computo
											</label>
			  	    						<label class="radio">
												<input type="radio" id="P6_2_72" value="option3"> 2. De música / Banda
											</label>
			  	    						<label class="radio">
												<input type="radio" id="P6_2_73" value="option3"> 3. De idiomas
											</label>
			  	    						<label class="radio">
												<input type="radio" id="P6_2_74" value="option3"> 4. De artes plásticas
											</label>
			  	    						<label class="radio">
												<input type="radio" id="P6_2_75" value="option3"> 5. De matemáticas
											</label>
			  	    						<label class="radio">
												<input type="radio" id="P6_2_76" value="option3"> 6. De ciencias sociales
											</label>
			  	    						<label class="radio">
												<input type="radio" id="P6_2_77" value="option3"> 7. otro
											</label>
											<label>
												<input style="float:left; width:300px;" type="text" class="form-control P6_2_7_O" id="P6_2_7_O">
												(Especifique)
											</label>
			  	    					</td>
		  	    					</tr>
		  	    					<tr id="P6caso5">
			  	    					<td>8.</td>
			  	    					<td>
			  	    						<strong>Tipo de laboratorio</strong>
			  	    						<br />(Acepte sólo un código)
			  	    					</td>
			  	    					<td>
			  	    						<label class="radio">
												<input type="radio" id="P6_2_81" value="option3"> 1. Laboratorio multifuncional
											</label>
			  	    						<label class="radio">
												<input type="radio" id="P6_2_82" value="option3"> 2. Laboratorio de física
											</label>
			  	    						<label class="radio">
												<input type="radio" id="P6_2_83" value="option3"> 3. Laboratorio de química
											</label>
			  	    						<label class="radio">
												<input type="radio" id="P6_2_84" value="option3"> 4. Laboratorio de Biología
											</label>
			  	    						<label class="radio">
												<input type="radio" id="P6_2_85" value="option3"> 5. Laboratorio de Química - Biología
											</label>
			  	    						<label class="radio">
												<input type="radio" id="P6_2_86" value="option3"> 6. otro
											</label>
											<label>
												<input style="float:left; width:300px;" type="text" class="form-control P6_2_8_O" id="P6_2_8_O">
												(Especifique)
											</label>
			  	    					</td>
		  	    					</tr>
		  	    					<tr id="P6caso6">
			  	    					<td>9.</td>
			  	    					<td>
			  	    						<strong>Tipo de taller ligero</strong>
			  	    						<br />(Acepte sólo un código)
			  	    					</td>
			  	    					<td>
			  	    						<label class="radio">
												<input type="radio" id="P6_2_91" value="option3"> 1. Dibujo técnico
											</label>
			  	    						<label class="radio">
												<input type="radio" id="P6_2_92" value="option3"> 2. Electricidad
											</label>
			  	    						<label class="radio">
												<input type="radio" id="P6_2_93" value="option3"> 3. Electrónica
											</label>
			  	    						<label class="radio">
												<input type="radio" id="P6_2_94" value="option3"> 4. Industria alimentaria
											</label>
			  	    						<label class="radio">
												<input type="radio" id="P6_2_95" value="option3"> 5. Industria del vestido
											</label>
			  	    						<label class="radio">
												<input type="radio" id="P6_2_96" value="option3"> 6. Cosmetología
											</label>
											<label class="radio">
												<input type="radio" id="P6_2_97" value="option3"> 7. Cerámica
											</label>
			  	    						<label class="radio">
												<input type="radio" id="P6_2_98" value="option3"> 8. Orfebrería
											</label>
			  	    						<label class="radio">
												<input type="radio" id="P6_2_99" value="option3"> 9. Bordado
											</label>
			  	    						<label class="radio">
												<input type="radio" id="P6_2_910" value="option3"> 10. Floristería
											</label>
			  	    						<label class="radio">
												<input type="radio" id="P6_2_911" value="option3"> 11. Juglería
											</label>
			  	    						<label class="radio">
												<input type="radio" id="P6_2_912" value="option3"> 12. Artes decorativas
											</label>
											<label class="radio">
												<input type="radio" id="P6_2_913" value="option3"> 13. Artes gráficas
											</label>
			  	    						<label class="radio">
												<input type="radio" id="P6_2_914" value="option3"> 14. Coreoplastía
											</label>
			  	    						<label class="radio">
												<input type="radio" id="P6_2_915" value="option3"> 15. Contabilidad
											</label>
			  	    						<label class="radio">
												<input type="radio" id="P6_2_916" value="option3"> 16. Mecanografía y taquigrafía
											</label>
			  	    						<label class="radio">
												<input type="radio" id="P6_2_917" value="option3"> 17. Otro
											</label>
			  	    						<label>
												<input style="float:left; width:300px;" type="text" class="form-control P6_2_9_O" id="P6_2_9_O">
												(Especifique)
											</label>
			  	    					</td>
		  	    					</tr>
		  	    					<tr id="P6caso7">
			  	    					<td>10.</td>
			  	    					<td>
			  	    						<strong>Tipo de taller semi-pesado</strong>
			  	    						<br />(Acepte sólo un código)
			  	    					</td>
			  	    					<td>
			  	    						<label class="radio">
												<input type="radio" id="P6_2_101" value="option3"> 1. Modelería y fundición
											</label>
			  	    						<label class="radio">
												<input type="radio" id="P6_2_102" value="option3"> 2. Construcciones metálicas
											</label>
			  	    						<label class="radio">
												<input type="radio" id="P6_2_103" value="option3"> 3. Mecánica de taller
											</label>
			  	    						<label class="radio">
												<input type="radio" id="P6_2_104" value="option3"> 4. Mecánica automotriz
											</label>
			  	    						<label class="radio">
												<input type="radio" id="P6_2_105" value="option3"> 5. Artesanía en papel
											</label>
			  	    						<label class="radio">
												<input type="radio" id="P6_2_106" value="option3"> 6. Carpintería
											</label>
											<label class="radio">
												<input type="radio" id="P6_2_107" value="option3"> 7. Construcción civil
											</label>
			  	    						<label class="radio">
												<input type="radio" id="P6_2_108" value="option3"> 8. Otro
											</label>
											<label>
												<input style="float:left; width:300px;" type="text" class="form-control P6_2_10_O" id="P6_2_10_O">
												(Especifique)
											</label>
			  	    					</td>
		  	    					</tr>
		  	    				</tbody>
		  	    				</table>
		  	    				<!--cierra caso 2 -->

		  	    				<!-- caso 3 administrativo -->
		  	    				<table class="table table-bordered" id="administrativo">
		  	    				<thead>
		  	    					<tr>
		  	    						<th style="text-align:center;" colspan="3">Espacio Administrativo:</th>
		  	    					</tr>
		  	    				</thead>
		  	    				<tbody>
		  	    					<tr id="caso3p11">
		  	    						<td>11.</td>
		  	    						<td>
		  	    							<strong>
		  	    								Tipo de espacio educativo
		  	    							</strong>
		  	    						</td>
		  	    						<td>
		  	    							<label class="checkbox">
												<input type="checkbox" id="P6_2_111" value="option3"> 1. Dirección
											</label>
			  	    						<label class="checkbox">
												<input type="checkbox" id="P6_2_112" value="option3"> 2. Sub dirección
											</label>
			  	    						<label class="checkbox">
												<input type="checkbox" id="P6_2_113" value="option3"> 3. Secretaría y espera
											</label>
			  	    						<label class="checkbox">
												<input type="checkbox" id="P6_2_114" value="option3"> 4. Sala de profesores
											</label>
			  	    						<label class="checkbox">
												<input type="checkbox" id="P6_2_115" value="option3"> 5. Asesoría
											</label>
			  	    						<label class="checkbox">
												<input type="checkbox" id="P6_2_116" value="option3"> 6. Sala de serv. Complementarios
											</label>
											<label class="checkbox">
												<input type="checkbox" id="P6_2_117" value="option3"> 7. Tópico y servicios sociales
											</label>
			  	    						<label class="checkbox">
												<input type="checkbox" id="P6_2_118" value="option3"> 8. Depósito de material educativo
											</label>
											<label class="checkbox">
												<input type="checkbox" id="P6_2_119" value="option3"> 9. Impresiones
											</label>
											<label class="checkbox">
												<input type="checkbox" id="P6_2_1110" value="option3"> 10. Archivo
											</label>
											<label class="checkbox">
												<input type="checkbox" id="P6_2_1111" value="option3"> 11. Otro
											</label>
											<label>
												<input style="float:left; width:300px;" type="text" class="form-control P6_2_11_O" id="P6_2_11_O">
												(Especifique)
											</label>
		  	    						</td>
		  	    					</tr>
		  	    				</tbody>
		  	    				</table>
		  	    				<!--cierra caso 3 -->
		  	    				<!-- caso 4 complementario -->
		  	    				<table class="table table-bordered" id="complementario">
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
		  	    							<label class="radio">
												<input type="radio" id="P6_2_121" value="option3"> 1. Sala de lactancia
											</label>
			  	    						<label class="radio">
												<input type="radio" id="P6_2_122" value="option3"> 2. Sala de descanso
											</label>
			  	    						<label class="radio">
												<input type="radio" id="P6_2_123" value="option3"> 3. Sala de higienización
											</label>
			  	    						<label class="radio">
												<input type="radio" id="P6_2_124" value="option3"> 4. Sala de preparación de biberones
											</label>
			  	    						<label class="radio">
												<input type="radio" id="P6_2_125" value="option3"> 5. Cocina
											</label>
			  	    						<label class="radio">
												<input type="radio" id="P6_2_126" value="option3"> 6. Biblioteca
											</label>
											<label class="radio">
												<input type="radio" id="P6_2_127" value="option3"> 7. Otro
											</label>
											<label class="radio">
												<input type="radio" id="P6_2_128" value="option3">8. SS.HH. de niños y niñas (inicial)
											</label>
		  	    						</td>
		  	    					</tr>
		  	    				</tbody>
		  	    				</table>
		  	    				<!--cierra caso 4 -->
		  	    				<!--caso 5 -->
		  	    			<table class="table table-bordered" id="servicios">
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
		  	    							<label class="radio">
												<input type="radio" id="P6_2_131" value="option3"> 1. SS.HH. Alumnado
											</label>
			  	    						<label class="radio">
												<input type="radio" id="P6_2_132" value="option3"> 2. SS.HH. Personal
											</label>
			  	    						<label class="radio">
												<input type="radio" id="P6_2_133" value="option3"> 3. Caseta de Guardianía
											</label>
			  	    						<label class="radio">
												<input type="radio" id="P6_2_134" value="option3"> 4. Área de espera
											</label>
			  	    						<label class="radio">
												<input type="radio" id="P6_2_135" value="option3"> 5. Limpieza y mantenimiento
											</label>
											<label class="radio">
												<input type="radio" id="P6_2_136" value="option3"> 6. Vivienda para docentes
											</label>
			  	    						<label class="radio">
												<input type="radio" id="P6_2_137" value="option3"> 7. Vivienda para alumnos
											</label>
											<label class="radio">
												<input type="radio" id="P6_2_138" value="option3"> 8. Guardianía
											</label>
											<label class="radio">
												<input type="radio" id="P6_2_139" value="option3"> 9. Cafetería / kiosco
											</label>
											<label class="radio">
												<input type="radio" id="P6_2_1310" value="option3"> 10. Cocina
											</label>
											<label class="radio">
												<input type="radio" id="P6_2_1311" value="option3"> 11. Comedor
											</label>
											<label class="radio">
												<input type="radio" id="P6_2_1312" value="option3"> 12. Despensa
											</label>
											<label class="radio">
												<input type="radio" id="P6_2_1313" value="option3"> 13. Vestuario
											</label>
											<label class="radio">
												<input type="radio" id="P6_2_1314" value="option3"> 14. Escaleras
											</label>
											<label class="radio">
												<input type="radio" id="P6_2_1315" value="option3"> 15. Ascensor
											</label>
											<label class="radio">
												<input type="radio" id="P6_2_1316" value="option3"> 16. Otro
											</label>
											<label>
												<input style="float:left; width:300px;" type="text" class="form-control P6_2_13_O" id="P6_2_13_O">
												(Especifique)
											</label>
		  	    						</td>
		  	    					</tr>
		  	    				</tbody>
		  	    			</table>
		  	    			<!-- cierra caso 5 -->
		  	    			<table class="table table-bordered" id="sshh">
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
		  	    									<td><input style="float:left; width:100px;" type="text" class="form-control P6_2_14_1" id="P6_2_14_1"></td>
		  	    								</tr>
		  	    								<tr>
		  	    									<td>2. Letrinas</td>
		  	    									<td><input style="float:left; width:100px;" type="text" class="form-control P6_2_14_2" id="P6_2_14_2"></td>
		  	    								</tr>
		  	    								<tr>
		  	    									<td>3. Inodoros de adultos accesibles (discapacidad)</td>
		  	    									<td><input style="float:left; width:100px;" type="text" class="form-control P6_2_14_3" id="P6_2_14_3"></td>
		  	    								</tr>
		  	    								<tr>
		  	    									<td>4. Inodoros de adultos</td>
		  	    									<td><input style="float:left; width:100px;" type="text" class="form-control P6_2_14_4" id="P6_2_14_4"></td>
		  	    								</tr>
		  	    								<tr>
		  	    									<td>5. Inodoros de niños accesibles (discapacidad)</td>
		  	    									<td><input style="float:left; width:100px;" type="text" class="form-control P6_2_14_5" id="P6_2_14_5"></td>
		  	    								</tr>
		  	    								<tr>
		  	    									<td>6. Inodoros de niños</td>
		  	    									<td><input style="float:left; width:100px;" type="text" class="form-control P6_2_14_6" id="P6_2_14_6"></td>
		  	    								</tr>
		  	    							</table>

		  	    						</td>
		  	    					</tr>
		  	    				</tbody>
		  	    			</table>
		  	    			<table class="table table-bordered" id="evasshhh">
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
											<input style="float:left; width:300px;" type="text" class="form-control P6_2_14a" id="P6_2_14a">
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
		  	    									<td><input style="float:left; width:100px;" type="text" class="form-control P6_2_14b_1" id="P6_2_14b_1"></td>
		  	    								</tr>
		  	    								<tr>
		  	    									<td>2. Lavaderos o lavatorios operativos</td>
		  	    									<td><input style="float:left; width:100px;" type="text" class="form-control P6_2_14b_2" id="P6_2_14b_2"></td>
		  	    								</tr>
		  	    							</table>
		  	    						</td>
		  	    					</tr>
		  	    				</tbody>
		  	    			</table>
		  	    			<!-- caso 1-->
		  	    				<table class="table table-bordered" id="aulacomun">
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
				  	    									<label class="radio">
																<input type="radio" id="1P6_2_15a1" value="option3"> 1
															</label>
				  	    								</td>
				  	    								<td>
				  	    									<label class="radio">
																<input type="radio" id="1P6_2_15a2" value="option3"> 2
															</label>
				  	    								</td>
				  	    								<td>
				  	    									<label class="radio">
																<input type="radio" id="1P6_2_15a3" value="option3"> 3
															</label>
				  	    								</td>
			  	    								</tr>
			  	    								<tr>
			  	    									<td>
				  	    									2. Láminas asfálticas, vinílicos o similares
				  	    								</td>
				  	    								<td>
				  	    									<label class="radio">
																<input type="radio" id="2P6_2_15a1" value="option3"> 1
															</label>
				  	    								</td>
				  	    								<td>
				  	    									<label class="radio">
																<input type="radio" id="2P6_2_15a2" value="option3"> 2
															</label>
				  	    								</td>
				  	    								<td>
				  	    									<label class="radio">
																<input type="radio" id="2P6_2_15a3" value="option3"> 3
															</label>
				  	    								</td>
			  	    								</tr>
			  	    								<tr>
			  	    									<td>
				  	    									3. Losetas, terrazos o similares
				  	    								</td>
				  	    								<td>
				  	    									<label class="radio">
																<input type="radio" id="3P6_2_15a1" value="option3"> 1
															</label>
				  	    								</tTipo de puertad>
				  	    								<td>
				  	    									<label class="radio">
																<input type="radio" id="3P6_2_15a2" value="option3"> 2
															</label>
				  	    								</td>
				  	    								<td>
				  	    									<label class="radio">
																<input type="radio" id="3P6_2_15a3" value="option3"> 3
															</label>
				  	    								</td>
			  	    								</tr>
			  	    								<tr>
			  	    									<td>
				  	    									4. Madera (entablados)
				  	    								</td>
				  	    								<td>
				  	    									<label class="radio">
																<input type="radio" id="4P6_2_15a1" value="option3"> 1
															</label>
				  	    								</td>
				  	    								<td>
				  	    									<label class="radio">
																<input type="radio" id="4P6_2_15a2" value="option3"> 2
															</label>
				  	    								</td>
				  	    								<td>
				  	    									<label class="radio">
																<input type="radio" id="4P6_2_15a3" value="option3"> 3
															</label>
				  	    								</td>
			  	    								</tr>
			  	    								<tr>
			  	    									<td>
				  	    									5. Cemento
				  	    								</td>
				  	    								<td>
				  	    									<label class="radio">
																<input type="radio" id="5P6_2_15a1" value="option3"> 1
															</label>
				  	    								</td>
				  	    								<td>
				  	    									<label class="radio">
																<input type="radio" id="5P6_2_15a2" value="option3"> 2
															</label>
				  	    								</td>
				  	    								<td>
				  	    									<label class="radio">
																<input type="radio" id="5P6_2_15a3" value="option3"> 3
															</label>
				  	    								</td>
			  	    								</tr>
			  	    								<tr>
			  	    									<td>
				  	    									6. Tierra
				  	    								</td>
				  	    								<td>
				  	    									<label class="radio">
																<input type="radio" id="6P6_2_15a1" value="option3"> 1
															</label>
				  	    								</td>
				  	    								<td>
				  	    									<label class="radio">
																<input type="radio" id="6P6_2_15a2" value="option3"> 2
															</label>
				  	    								</td>
				  	    								<td>
				  	    									<label class="radio">
																<input type="radio" id="6P6_2_15a3" value="option3"> 3
															</label>
				  	    								</td>
			  	    								</tr>
			  	    								<tr>
			  	    									<td>
				  	    									<label>
				  	    										7. Otro material
				  	    									</label>
				  	    									<label>
																<input style="float:left; width:300px;" type="text" class="form-control" id="P6_2_15_O">
																(Especifique)
															</label>
				  	    								</td>
				  	    								<td>
				  	    									<label class="radio">
																<input type="radio" id="7P6_2_15a1" value="option3"> 1
															</label>
				  	    								</td>
				  	    								<td>
				  	    									<label class="radio">
																<input type="radio" id="7P6_2_15a2" value="option3"> 2
															</label>
				  	    								</td>
				  	    								<td>
				  	    									<label class="radio">
																<input type="radio" id="7P6_2_15a3" value="option3"> 3
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
				  	    								<td >
				  	    									<!--<label class="checkbox">-->
																<!--<input type="checkbox" id="inlineCheckbox3" value="option3"> 1-->
																<input style="float:left; width:50px;" type="text" id="P6_2_16a_b"  class="form-control P6_2_16a_b">
															<!--</label>-->
				  	    								</td>
				  	    								<td>
				  	    									<!--<label class="checkbox">-->
																<!--<input type="checkbox" id="inlineCheckbox3" value="option3"> 2-->
																<input style="float:left; width:50px;" type="text" id="P6_2_16a_r" class="form-control P6_2_16a_r" >
															<!--</label>-->
				  	    								</td>
				  	    								<td>
				  	    									<!--<label class="checkbox">-->
																<!--<input type="checkbox" id="inlineCheckbox3" > 3-->
																<input style="float:left; width:50px;" type="text" id="P6_2_16a_m" class="form-control P6_2_16a_m">
															<!--</label>-->
				  	    								</td>
			  	    								</tr>
			  	    								<tr>
			  	    									<td>
				  	    									2. Metálica con vidrio
				  	    								</td>
				  	    								<td>
				  	    									<!--<label class="checkbox">-->
																<input style="float:left; width:50px;" type="text" id="P6_2_16b_b"  class="form-control P6_2_16b_b">
															<!--</label>-->
				  	    								</td>
				  	    								<td>
				  	    									<!--<label class="checkbox">-->
																<input style="float:left; width:50px;" type="text" id="P6_2_16b_r" class="form-control P6_2_16b_r" >
															<!--</label>-->
				  	    								</td>
				  	    								<td>
				  	    									<!--<label class="checkbox">-->
																<input style="float:left; width:50px;" type="text" id="P6_2_16b_m" class="form-control P6_2_16b_m">
															<!--</label>-->
				  	    								</td>
			  	    								</tr>
			  	    								<tr>
			  	    									<td>
				  	    									3. Madera
				  	    								</td>
				  	    								<td>
				  	    									<!--<label class="checkbox">-->
																<input style="float:left; width:50px;" type="text" id="P6_2_16c_b"  class="form-control P6_2_16c_b">
															<!--</label>-->
				  	    								</td>
				  	    								<td>
				  	    									<!--<label class="checkbox">-->
																<input style="float:left; width:50px;" type="text" id="P6_2_16c_r" class="form-control P6_2_16c_r" >
															<!--</label>-->
				  	    								</td>
				  	    								<td>
				  	    									<!--<label class="checkbox">-->
																<input style="float:left; width:50px;" type="text" id="P6_2_16c_m" class="form-control P6_2_16c_m">
															<!--</label>-->
				  	    								</td>
			  	    								</tr>
			  	    								<tr>
			  	    									<td>
				  	    									4. Madera con vidrio
				  	    								</td>
				  	    								<td>
				  	    									<!--<label class="checkbox">-->
																<input style="float:left; width:50px;" type="text" id="P6_2_16d_b"  class="form-control P6_2_16d_b">
															<!--</label>-->
				  	    								</td>
				  	    								<td>
				  	    									<!--<label class="checkbox">-->
																<input style="float:left; width:50px;" type="text" id="P6_2_16d_r" class="form-control P6_2_16d_r" >
															<!--</label>-->
				  	    								</td>
				  	    								<td>
				  	    									<!--<label class="checkbox">-->
																<input style="float:left; width:50px;" type="text" id="P6_2_16d_m" class="form-control P6_2_16d_m">
															<!--</label>-->
				  	    								</td>
			  	    								</tr>
			  	    								<tr>
			  	    									<td>
			  	    										<label>
				  	    										5. Otro material
				  	    									<!--</label>-->
				  	    									<label>
																<input style="float:left; width:300px;" type="text" class="form-control P6_2_16e_O" id="P6_2_16e_O">
																(Especifique)
															<!--</label>-->
			  	    									</td>
				  	    								<td>
				  	    									<!--<label class="checkbox">-->
																<input style="float:left; width:50px;" type="text" id="P6_2_16e_b"  class="form-control P6_2_16e_b">
															<!--</label>-->
				  	    								</td>
				  	    								<td>
				  	    									<!--<label class="checkbox">-->
																<input style="float:left; width:50px;" type="text" id="P6_2_16e_r" class="form-control P6_2_16e_r" >
															<!--</label>-->
				  	    								</td>
				  	    								<td>
				  	    									<!--<label class="checkbox">-->
																<input style="float:left; width:50px;" type="text" id="P6_2_16e_m" class="form-control P6_2_16e_m">
															<!--</label>-->
				  	    								</td>
			  	    								</tr>
			  	    								<tr>
			  	    									<td>
			  	    										<label class="checkbox">
																<input type="checkbox" id="P6_2_16f6" value="option3"> 6. No tiene
															</label>

				  	    								</td>
				  	    								<td>



				  	    								</td>
				  	    								<td>



				  	    								</td>
				  	    								<td>



				  	    								</td>
			  	    								</tr>
			  	    							</tbody>
			  	    						</table>
		  	    						</td>
		  	    					</tr>
		  	    					<tr id="caso5p17">
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
			  	    									<td><input style="float:center; width:100px;" type="text" class="form-control P6_2_17a" id="P6_2_17a"></td>
		  	    									</tr>
		  	    									<tr>
			  	    									<td>2. Oxidado</td>
			  	    									<td><input style="float:center; width:100px;" type="text" class="form-control P6_2_17b" id="P6_2_17b"></td>
		  	    									</tr>
		  	    									<tr>
			  	    									<td>3. Deteriorado</td>
			  	    									<td><input style="float:center; width:100px;" type="text" class="form-control P6_2_17c" id="P6_2_17c"></td>
		  	    									</tr>
		  	    									<tr>
			  	    									<td>4. No tiene</td>
			  	    									<td><input style="float:center; width:100px;" type="text" class="form-control P6_2_17d" id="P6_2_17d"></td>
		  	    									</tr>
		  	    								</tbody>
		  	    							</table>
		  	    						</td>
		  	    					</tr>
		  	    					<tr id="caso5p18">
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
				  	    									<input style="float:left; width:50px;" type="text" id="P6_2_18a_b"  class="form-control P6_2_18a_b">
				  	    								</td>
				  	    								<td>
				  	    									<input style="float:left; width:50px;" type="text" id="P6_2_18a_r"  class="form-control P6_2_18a_r">
				  	    								</td>
				  	    								<td>
				  	    									<input style="float:left; width:50px;" type="text" id="P6_2_18a_m"  class="form-control P6_2_18a_m">
				  	    								</td>
			  	    								</tr>
			  	    								<tr>
			  	    									<td>
				  	    									2. Madera
				  	    								</td>
				  	    								<td>
				  	    									<input style="float:left; width:50px;" type="text" id="P6_2_18b_b"  class="form-control P6_2_18b_b">
				  	    								</td>
				  	    								<td>
				  	    									<input style="float:left; width:50px;" type="text" id="P6_2_18b_r"  class="form-control P6_2_18b_r">
				  	    								</td>
				  	    								<td>
				  	    									<input style="float:left; width:50px;" type="text" id="P6_2_18b_m"  class="form-control P6_2_18b_m">
				  	    								</td>
			  	    								</tr>
			  	    								<tr>
			  	    									<td>
				  	    									3. Aluminio
				  	    								</td>
				  	    								<td>
				  	    									<input style="float:left; width:50px;" type="text" id="P6_2_18c_b"  class="form-control P6_2_18b_b">
				  	    								</td>
				  	    								<td>
				  	    									<input style="float:left; width:50px;" type="text" id="P6_2_18c_r"  class="form-control P6_2_18c_r">
				  	    								</td>
				  	    								<td>
				  	    									<input style="float:left; width:50px;" type="text" id="P6_2_18c_m"  class="form-control P6_2_18c_m">
				  	    								</td>
			  	    								</tr>
			  	    								<tr>
			  	    									<td>
				  	    									4. Malla
				  	    								</td>
				  	    								<td>
				  	    									<input style="float:left; width:50px;" type="text" id="P6_2_18d_b"  class="form-control P6_2_18d_b">
				  	    								</td>
				  	    								<td>
				  	    									<input style="float:left; width:50px;" type="text" id="P6_2_18d_r"  class="form-control P6_2_18d_r">
				  	    								</td>
				  	    								<td>
				  	    									<input style="float:left; width:50px;" type="text" id="P6_2_18d_m"  class="form-control P6_2_18d_m">
				  	    								</td>
			  	    								</tr>
			  	    								<tr>
			  	    									<td>
			  	    										<label>
				  	    										5. Otro material
				  	    									</label>
				  	    									<label>
																<input style="float:left; width:300px;" type="text" class="form-control P6_2_18e_O" id="P6_2_18e_O">
																(Especifique)
															</label>
			  	    									</td>
				  	    								<td>
				  	    									<input style="float:left; width:50px;" type="text" id="P6_2_18e_b"  class="form-control P6_2_18e_b">
				  	    								</td>
				  	    								<td>
				  	    									<input style="float:left; width:50px;" type="text" id="P6_2_18e_r"  class="form-control P6_2_18e_r">
				  	    								</td>
				  	    								<td>
				  	    									<input style="float:left; width:50px;" type="text" id="P6_2_18f_m"  class="form-control P6_2_18f_m">
				  	    								</td>
			  	    								</tr>
			  	    								<tr>
			  	    									<td>
				  	    									<label class="checkbox">
																<input type="checkbox" id="P6_2_18f6" value="option3"> 6. No tiene
															</label>
				  	    								</td>
				  	    								<td>
				  	    									<!--<label class="checkbox">
																<input type="checkbox" id="inlineCheckbox3" value="option3">
															</label>-->
				  	    								</td>
				  	    								<td>
				  	    									<!--<label class="checkbox">
																<input type="checkbox" id="inlineCheckbox3" value="option3"> 2
															</label>-->
				  	    								</td>
				  	    								<td>
				  	    									<!--<label class="checkbox">
																<input type="checkbox" id="inlineCheckbox3" value="option3"> 3
															</label>-->
				  	    								</td>
			  	    								</tr>
			  	    							</tbody>
			  	    						</table>
		  	    						</td>
		  	    					</tr>
		  	    					<tr id="caso5p19">
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
			  	    									<td><input style="float:left; width:100px;" type="text" class="form-control P6_2_19a" id="P6_2_19a"></td>
		  	    									</tr>
		  	    									<tr>
			  	    									<td>2. Con roturas</td>
			  	    									<td><input style="float:left; width:100px;" type="text" class="form-control P6_2_19b" id="P6_2_19b"></td>
		  	    									</tr>
		  	    									<tr>
			  	    									<td>3. Sin vidrios</td>
			  	    									<td><input style="float:left; width:100px;" type="text" class="form-control P6_2_19c" id="P6_2_19c"></td>
		  	    									</tr>
		  	    								</tbody>
		  	    							</table>
		  	    						</td>
		  	    					</tr>
		  	    				</tbody>
		  	    				</table>
		  	    				<div class="panel">
									<label>Observaciones:</label>
									<textarea style="width:870px; height:100px;" id="P6_2_20Obs"></textarea>
								</div>
		  	    				<!-- cierre caso 1-->


		  	    			</div>



							<table class="table table-bordered">
								<thead>
									<tr>

										<div class="panel-heading">
											<h5 class="panel-title">Sección C: Verificación de los espacios educativos de la edificación</h5>
										</div>
									</tr>
									<tr>
										<th colspan="3">Evaluador: esta sección se realizará por observación directa excepto las preguntas 2, 3 y 3a, las cuales primero dEBErá preguntar y luego verificar.</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td>
											1.
										</td>
										<td><strong>Esta edificación tiene instalaciones eléctricas interiores</strong></td>
										<td>
										<!--	<div class="radio">-->
												<label class="radio">
													<input type="radio" name="P6_3_1" id="P6_3_11" value="option1">
													    1. Si
												</label>
											<!--</div>-->
											<div class="radio">
												<label>
													<input type="radio" name="P6_3_1" id="P6_3_12" value="option1">
													    2. No
													</label>
											</div>
										</td>
									</tr>
									<tr id="seccioncp1a">
										<td>
											1A.
										</td>
										<td>
											<strong>Indique el tipo de instalación de los circuitos eléctricos</strong>
											<br />(Acepte sólo un código)
										</td>
										<td>
											<div class="radio">
												<label>
													<input type="radio" name="P6_3_1A" id="P6_3_1A1" value="option1" >
													    Circuito canalizado empotrado
													</label>
											</div>
											<div class="radio">
												<label>
													<input type="radio" name="P6_3_1A" id="P6_3_1A2" value="option1" >
													    Circuito canalizado expuesto
													</label>
											</div>
											<div class="radio">
												<label>
													<input type="radio" name="P6_3_1A" id="P6_3_1A3" value="option1">
													    Circuito sin canalizar
													</label>
											</div>
											<div class="radio">
												<label>
													<input type="radio" name="P6_3_1A" id="P6_3_1A4" value="option1" >
													    Con conductor inadecuado
													</label>
											</div>
										</td>
									</tr>
								</tbody>
							</table>

							<table class="table table-bordered" id="distribucion">
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
													<input type="radio" name="P6_3_2" id="P6_3_21" value="option1" >
													    1. Si
													</label>
											</div>
											<div class="radio">
												<label>
													<input type="radio" name="P6_3_2" id="P6_3_22" value="option1" >
													    2. No
													</label>
											</div>
										</td>
									</tr>
									<tr id="distribucionp2a">
										<td>
											2A.
										</td>
										<td>
											<strong>Es de fácil acceso</strong>
										</td>
										<td>
											<div class="radio">
												<label>
													<input type="radio" name="P6_3_2A" id="P6_3_2A1" value="option1" >
													    1. Si
													</label>
											</div>
											<div class="radio">
												<label>
													<input type="radio" name="P6_3_2A" id="P6_3_2A2" value="option1" >
													    2. No
													</label>
											</div>
										</td>
									</tr>
									<tr id="distribucionp2b">
										<td>
											2B.
										</td>
										<td>
											<strong>Tiene un gabinete adecuado</strong>
										</td>
										<td>
											<div class="radio">
												<label>
													<input type="radio" name="P6_3_2B" id="P6_3_2B1" value="option1" >
													    1. Si
													</label>
											</div>
											<div class="radio">
												<label>
													<input type="radio" name="P6_3_2B" id="P6_3_2B2" value="option1" >
													    2. No
													</label>
											</div>
										</td>
									</tr>
									<tr id="distribucionp2c">
										<td>
											2C.
										</td>
										<td>
											<strong>Tiene interruptores electromagnéticos</strong>
										</td>
										<td>
											<div class="radio">
												<label>
													<input type="radio" name="P6_3_2C" id="P6_3_2C1" value="option1" >
													    1. Si
													</label>
											</div>
											<div class="radio">
												<label>
													<input type="radio" name="P6_3_2C" id="P6_3_2C2" value="option1" >
													    2. No
													</label>
											</div>
										</td>
									</tr>
									<tr id="distribucionp2d">
										<td>
											2D.
										</td>
										<td>
											<strong>Tiene interruptores diferenciales</strong>
										</td>
										<td>
											<div class="radio">
												<label>
													<input type="radio" name="P6_3_2D" id="P6_3_2D1" value="option1" >
													    1. Si
													</label>
											</div>
											<div class="radio">
												<label>
													<input type="radio" name="P6_3_2D" id="P6_3_2D2" value="option1" >
													    2. No
													</label>
											</div>
										</td>
									</tr>
									<tr id="distribucionp3">
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
													<input type="radio" name="P6_3_3" id="P6_3_31" value="option1" >
													    1. Si
													</label>
											</div>
											<div class="radio">
												<label>
													<input type="radio" name="P6_3_3" id="P6_3_32" value="option1" >
													    2. No
													</label>
											</div>
										</td>
									</tr>
									<tr id="distribucionp3a">
										<td>
											3A.
										</td>
										<td>
											<strong>¿en qué año se hizo el último mantenimiento?</strong>
										</td>
										<td>
											<label>Año</label>
											<input style="width:100px;" type="text" class="form-control P6_3_3A" id="P6_3_3A">
										</td>
									</tr>
								</tbody>
							</table>

							<table class="table table-bordered" id="secciond">
								<thead>

									<div class="panel-heading">
											<h5 class="panel-title">Sección D: Instalaciones sanitarias interiores de la edificación</h5>
									</div>
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
													<input type="radio" name="P6_4_1" id="P6_4_11" value="option1" >
													    1. Si
													</label>
											</div>
											<div class="radio">
												<label>
													<input type="radio" name="P6_4_1" id="P6_4_12" value="option1" >
													    2. No
													</label>
											</div>
										</td>
									</tr>
									<tr id="secciondp1a">
										<td>
											1A.
										</td>
										<td>
											<strong>La instalación es empotrada</strong>
										</td>
										<td>
											<div class="radio">
												<label>
													<input type="radio" name="P6_4_1A" id="P6_4_1A1" value="option1" >
													    1. Si
													</label>
											</div>
											<div class="radio">
												<label>
													<input type="radio" name="P6_4_1A" id="P6_4_1A2" value="option1" >
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
													<input type="radio" name="P6_4_2" id="P6_4_21" value="option1" >
													    1. Si
													</label>
											</div>
											<div class="radio">
												<label>
													<input type="radio" name="P6_4_2" id="P6_4_22" value="option1" >
													    2. No
													</label>
											</div>
										</td>
									</tr>
								</tbody>
							</table>

							<table class="table table-bordered">
								<thead>

									<div class="panel-heading">
											<h5 class="panel-title">Sección E: Instalaciones sanitarias interiores de la edificación</h5>
									</div>
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
													<input type="radio" name="P6_5_1" id="P6_5_11" value="option1" >
													    1. Si
													</label>
											</div>
											<div class="radio">
												<label>
													<input type="radio" name="P6_5_1" id="P6_5_12" value="option1" >
													    2. No
													</label>
											</div>
										</td>
									</tr>
									<tr id="seccionep1a">
										<td>
											1A.
										</td>
										<td>
											<strong>Cuál es el estado de conservación:</strong>
											<br/>(Acepte sólo un código)
										</td>
										<td>
											<div class="radio">
												<label>
													<input type="radio" name="P6_5_1A" id="P6_5_1A1" value="option1">
													    1. Sin daños
													</label>
											</div>
											<div class="radio">
												<label>
													<input type="radio" name="P6_5_1A" id="P6_5_1A2" value="option1">
													    2. Deterioro parcial
													</label>
											</div>
											<div class="radio">
												<label>
													<input type="radio" name="P6_5_1A" id="P6_5_1A3" value="option1">
													    2. Colapso total
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

		  	    		</div>
	  	    		</div>
	  	    	</div><!-- END CAPITULO 6-->