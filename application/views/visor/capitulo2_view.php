<?php $this->load->view('visor/nav_view.php'); ?>

<script type="text/javascript">


	$.import('js/visor/capitulo2/index.js','js');

</script>
<div class="tab-pane" id="cap2">
	  	    		<div class="content" id="content3">
	  	    			<div class="panel panel-info">
							<div class="panel-heading">
								<h5 class="panel-title" style="text-transform: uppercase;">Capitulo II. Caracteristicas del clima y terreno - Servicios y obras en ejecución</h5>
							</div>

							<table class="table table-bordered">
									<thead>
										<tr>
											<th colspan="3">
												<h6 style="text-transform: uppercase;" >Sección A: Caracteristica climatica local</h6>
											</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td>1.</td>
											<td>
												<strong>¿El Clima que predomina en esta localidad es:</strong>
											</td>
											<td>
												<label class="checkbox-inline">
													<input type="radio" id="P2_A_1_Clima1" name="check" value="option1"> 1. Cálido?
												</label>

												<label class="checkbox-inline">
													<input type="radio" id="P2_A_1_Clima2" name="check" value="option2"> 2. Templado?
												</label>

												<label class="checkbox-inline">
													<input type="radio" id="P2_A_1_Clima3" name="check" value="option3"> 3. Frio?
												</label>
											</td>
										</tr>
										<tr>
											<td>2.</td>
											<td>
												<strong>¿La intensidad de la lluvia en esta localidad es:</strong>
											</td>
											<td>
												<label class="checkbox-inline">
													<input type="radio" id="P2_A_2_Lluv1" name="check1" value="option1"> 1. Minima?
												</label>

												<label class="checkbox-inline">
													<input type="radio" id="P2_A_2_Lluv2" name="check1" value="option2"> 2. Moderada?
												</label>

												<label class="checkbox-inline">
													<input type="radio" id="P2_A_2_Lluv3" name="check1" value="option3"> 3. Torrencial?
												</label>
											</td>
										</tr>
										<tr>
											<td>2A.</td>
											<td>
												<strong>¿En qué meses se da la temporada de lluvia?</strong>
											</td>
											<td>
												<label>Mes de inicio</label>
												<input style="width:200px;" id="P2_A_2A_Lluv_Mini" type="text" class="form-control">
												<label>Mes de término</label>
												<input style="width:200px;" id="P2_A_2A_Lluv_Mfin" type="text" class="form-control">
											</td>
										</tr>
										<tr>
											<td>3.</td>
											<td>
												<strong>¿En esta localidad se producen heladas/friajes?</strong>
											</td>
											<td>
												<label class="checkbox-inline">
													<input type="radio" id="P2_A_3_Hel1" name="check2" value="option1"> 1. Si?
												</label>

												<label class="checkbox-inline">
													<input type="radio" id="P2_A_3_Hel2" name="check2" value="option2"> 2. No?
												</label>
											</td>
										</tr>
										<tr>
											<td>3A.</td>
											<td>
												<strong>¿En qué meses se da la temporada de heladas?</strong>
											</td>
											<td>
												<label>Mes de inicio</label>
												<input style="width:200px;" id="P2_A_3A_Hel_Mini" type="text" class="form-control">
												<label>Mes de término</label>
												<input style="width:200px;" id="P2_A_3A_Hel_Mfin" type="text" class="form-control">
											</td>
										</tr>
										<tr>
											<td>4.</td>
											<td>
												<strong>¿En esta localidad cae granizada?</strong>
											</td>
											<td>
												<label class="checkbox-inline">
													<input type="radio" id="P2_A_4_Gra1" name="check3" value="option1"> 1. Si?
												</label>

												<label class="checkbox-inline">
													<input type="radio" id="P2_A_4_Gra2" name="check3" value="option2"> 2. No?
												</label>
											</td>
										</tr>
										<tr>
											<td>4A.</td>
											<td>
												<strong>¿En qué meses se da la temporada de granizada?</strong>
											</td>
											<td>
												<label>Mes de inicio</label>
												<input style="width:200px;" id="P2_A_4A_Gra_Mini" type="text" class="form-control">
												<label>Mes de término</label>
												<input style="width:200px;" id="P2_A_4A_Gra_Mfin" type="text" class="form-control">
											</td>
										</tr>
										<tr>
											<td>5.</td>
											<td>
												<strong>¿En esta localidad se forman vendavales?</strong>
											</td>
											<td>
												<label class="checkbox-inline">
													<input type="radio" id="P2_A_5_Vend1" name="check4" value="option1"> 1. Si?
												</label>

												<label class="checkbox-inline">
													<input type="radio" id="P2_A_5_Vend2" name="check4" value="option2"> 2. No?
												</label>
											</td>
										</tr>
										<tr>
											<td>5A.</td>
											<td>
												<strong>¿Los vendavales son:</strong>
												<br/>(Acepte solo un código)
											</td>
											<td>
												<label>
													<input type="radio" id="P2_A_5A_Vend_Tip1" name="check5" value="option1"> 1. Moderados?
												</label>

												<label>
													<input type="radio" id="P2_A_5A_Vend_Tip2" name="check5" value="option2"> 2. Fuertes (Que afecten la infraestructura de la localidad)?
												</label>
											</td>
										</tr>
										<tr>
											<td>5B.</td>
											<td>
												<strong>¿En qué meses se forman los vendavales?</strong>
											</td>
											<td>
												<label>Mes de inicio</label>
												<input style="width:200px;" id="P2_A_5B_Vend_Mini" type="text" class="form-control">
												<label>Mes de término</label>
												<input style="width:200px;" id="P2_A_5B_Vend_Mfin" type="text" class="form-control">
											</td>
										</tr>
									</tbody>
							</table>

							<table class="table table-bordered">
									<thead>
										<tr>
											<th colspan="3">
												<h6 style="text-transform: uppercase;">Sección B: Condición del terreno y acceso</h6>
											</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td>1.</td>
											<td>
												<strong>¿Topografía del terreno del local escolar?</strong>
												<br>(Acepte un solo código)
											</td>
											<td>
												<label>
													<input type="radio" id="P2_B_1_Topo1" name="check6" value="option1"> 1. Llano
												</label>

												<label>
													<input type="radio" id="P2_B_1_Topo2" name="check6" value="option2"> 2. Inclinado
												</label>
												<label>
													<input type="radio" id="P2_B_1_Topo1" name="check6" value="option1"> 3. Muy inclinado
												</label>
												<label>
													<input type="radio" id="P2_B_1_Topo2" name="check6" value="option2"> 4. Accidentado
												</label>
											</td>
										</tr>
										<tr>
											<td>2.</td>
											<td>
												<strong>¿Tipo de suelo predominante del local escolar?</strong>
												<br>(Acepte un solo código)
											</td>
											<td>
												<label>
													<input type="radio" id="P2_B_2_Suelo1" name="check7" value="option1"> 1. Arcilloso
												</label>

												<label>
													<input type="radio" id="P2_B_2_Suelo2" name="check7" value="option2"> 2. Rocoso
												</label>
												<label>
													<input type="radio" id="P2_B_2_Suelo3" name="check7" value="option1"> 3. Arenoso
												</label>
												<label>
													<input type="radio" id="P2_B_2_Suelo4" name="check7" value="option2"> 4. Relleno
												</label>
												<label>
													<input type="radio" id="P2_B_2_Suelo5" name="check7" value="option2"> 5. Gravoso
												</label>
												<label>
													<input type="radio" id="P2_B_2_Suelo6" name="check7" value="option2"> 6. Otro
												</label>
												<label>(Especifique)</label>
												<input id="P2_B_2_Suelo_O" style="width:400px;" type="text" class="form-control">

											</td>
										</tr>
										<tr>
											<td>3.</td>
											<td><strong>¿A qué profundidad se encuentra la napa freatica del local escolar?</strong></td>
											<td>
												<label>
													<input type="radio" id="P2_B_3_Prof1" name="check8" value="option1"> 1. A menos de 1.50 m
												</label>

												<label>
													<input type="radio" id="P2_B_3_Prof2" name="check8" value="option2"> 2. A mas de 1.50 m
												</label>
											</td>
										</tr>
										<tr>
											<td>4.</td>
											<td><strong>¿Cuál es la capital del distrito mas accesible al local escolar?</strong></td>
											<td><input id="P2_B_4_CapAcc" style="width:400px;" type="text" class="form-control"></td>
										</tr>
										<tr>
											<td>5.</td>
											<td>
												<strong>¿Cuál es el medio de transporte  que utiliza para desplazarse de la capital del distrito mas accesible al local escolar?</strong>
												<br>(Acepte uno o mas códigos)
											</td>
											<td>
												<label>
													<input type="checkbox" id="P2_B_5_Mtran_11" name="check9" value="option1"> 1. Terrestre
												</label>
												<label>
													<input type="checkbox" id="P2_B_5_Mtran_22" name="check9" value="option2"> 2. Fluvial/lacustre/maritimo
												</label>
												<label>
													<input type="checkbox" id="P2_B_5_Mtran_33" name="check9" value="option2"> 3. Aereo
												</label>
											</td>
										</tr>
										<tr>
											<td>5A.</td>
											<td><strong>¿El uso mas frecuente es?</strong></td>
											<td>
												<label>
													<input type="radio" id="P2_B_5A_Uso1" name="check10" value="option1"> 1. Con motor
												</label>
												<label>
													<input type="radio" id="P2_B_5A_Uso2" name="check10" value="option2"> 2. Sin motor
												</label>
											</td>
										</tr>
										<tr>
											<td>5B.</td>
											<td>
												<strong>¿Cuál es el tipo de via que utiliza para desplazarse  de la capital del distrito mas accesible al local escolar?</strong>
												<br>(Acepte uno o mas códigos)
											</td>
											<td>
												<label>
													<input type="checkbox" id="P2_B_5B_Tvia_uso_11" name="check11" value="option1"> 1. Camino de herradura
												</label>
												<label>
													<input type="checkbox" id="P2_B_5B_Tvia_uso_22" name="check11" value="option2"> 2. Trocha carrozable
												</label>
												<label>
													<input type="checkbox" id="P2_B_5B_Tvia_uso_33" name="check11" value="option1"> 3. carretera afirmada
												</label>
												<label>
													<input type="checkbox" id="P2_B_5B_Tvia_uso_44" name="check11" value="option2"> 4. vía asfaltada
												</label>
											</td>
										</tr>
										<tr>
											<td>6.</td>
											<td><strong>¿Cuál es el tiempo total de recorrido de la capital del distrito mas accesible al local escolar?</strong></td>
											<td>
												<div class="panel" style="height:60px; width:130px; margin-left:130px;">
													<input id="P2_B_6_Trec_H" style="width:50px;float:left;" type="text" class="form-control">
													<input id="P2_B_6_Trec_M" style="width:50px;float:left;" type="text" class="form-control">
													<br/><br/>
													<div style="width:50px;float:left; text-align:center; padding:5px;">Hora</div>
													<div style="width:50px;float:left; text-align:center; padding:5px;">Minuto</div>
												</div>
											</td>
										</tr>
										<tr>
											<td>7.</td>
											<td><strong>¿Cuál es el tiempo del recorrido en el tramo mas dificultoso desde la capital del distrito mas accesible al local escolar?</strong></td>
											<td>
												<div class="panel" style="height:60px; width:130px; margin-left:130px;">
													<input id="P2_B_7_Ttramo_H" style="width:50px;float:left;" type="text" class="form-control">
													<input id="P2_B_7_Ttramo_M" style="width:50px;float:left;" type="text" class="form-control">
													<br/><br/>
													<div style="width:50px;float:left; text-align:center; padding:5px;">Hora</div>
													<div style="width:50px;float:left; text-align:center; padding:5px;">Minuto</div>
												</div>
											</td>
										</tr>
										<tr>
											<td>8.</td>
											<td><strong>¿Existen peligros asociados ala ubicación de esta localidad?</strong></td>
											<td>
												<label>
													<input type="radio" id="P2_B_8_Pelig1" name="check12" value="option1"> 1. Si
												</label>
												<label>
													<input type="radio" id="P2_B_8_Pelig2" name="check12" value="option2"> 2. SNo
												</label>
											</td>
										</tr>
										<tr>
											<td>9.</td>
											<td>
												<strong>¿Existen peligros naturales en esta localidad como:</strong>
												<br>(Acepte uno o mas códigos)
											</td>
											<td>
												<label>
													<input type="checkbox" id="P2_B_91" name="check13" value="option1"> 1. Sismos?
												</label>
												<label>
													<input type="checkbox" id="P2_B_92" name="check13" value="option2"> 2. Tsunami u oleaje anómalos?
												</label>
												<label>
													<input type="checkbox" id="P2_B_93" name="check13" value="option1"> 3. Lluvias?
												</label>
												<label>
													<input type="checkbox" id="P2_B_94" name="check13" value="option2"> 4. Heladas?
												</label>
												<label>
													<input type="checkbox" id="P2_B_95" name="check13" value="option1"> 5. Sequías?
												</label>
												<label>
													<input type="checkbox" id="P2_B_96" name="check13" value="option2"> 6. Granizadas?
												</label>
												<label>
													<input type="checkbox" id="P2_B_97" name="check13" value="option1"> 7. Nevadas?
												</label>
												<label>
													<input type="checkbox" id="P2_B_98" name="check13" value="option2"> 8. Vendavales?
												</label>
												<label>
													<input type="checkbox" id="P2_B_99" name="check13" value="option1"> 9. Actividades volcánicas?
												</label>
												<label>
													<input type="checkbox" id="P2_B_910" name="check13" value="option2"> 10. Ninguno
												</label>
											</td>
										</tr>
										<tr>
											<td>10.</td>
											<td>
												<strong>¿Existen peligros socio-naturales en esta localidad como:</strong>
												<br>(Acepte uno o mas códigos)
											</td>
											<td>
												<label>
													<input type="checkbox" id="P2_B_101" name="check14" value="option1"> 1. Inundaciones?
												</label>
												<label>
													<input type="checkbox" id="P2_B_102" name="check14" value="option2"> 2. Deslizamientos?
												</label>
												<label>
													<input type="checkbox" id="P2_B_103" name="check14" value="option1"> 3. Huaycos / Aluviones / Aludes?
												</label>
												<label>
													<input type="checkbox" id="P2_B_104" name="check14" value="option2"> 4. Derrumbes?
												</label>
												<label>
													<input type="checkbox" id="P2_B_105" name="check14" value="option1"> 5. Desertificaciones?
												</label>
												<label>
													<input type="checkbox" id="P2_B_106" name="check14" value="option2"> 6. Salinización de los suelos?
												</label>
												<label>
													<input type="checkbox" id="P2_B_10" name="check14" value="option1"> 7. Ninguno?
												</label>
											</td>
										</tr>
										<tr>
											<td>11.</td>
											<td>
												<strong>¿Existen peligros antrópicos en esta localidad como:</strong>
												<br>(Acepte uno o mas códigos)
											</td>
											<td>
												<label>
													<input type="checkbox" id="P2_B_111" name="check15" value="option1"> 1. Contaminación ambiental?
												</label>
												<label>
													<input type="checkbox" id="P2_B_112" name="check15" value="option2"> 2. Incendios, quemas?
												</label>
												<label>
													<input type="checkbox" id="P2_B_113" name="check15" value="option1"> 3. Explosiones?
												</label>
												<label>
													<input type="checkbox" id="P2_B_114" name="check15" value="option2"> 4. Derrame de sustancias tóxicas?
												</label>
												<label>
													<input type="checkbox" id="P2_B_115" name="check15" value="option1"> 5. Fuga de gases?
												</label>
												<label>
													<input type="checkbox" id="P2_B_116" name="check15" value="option2"> 6. Zonas aereoportuarias?
												</label>
												<label>
													<input type="checkbox" id="P2_B_117" name="check15" value="option1"> 7. Zonas industriales?
												</label>
												<label>
													<input type="checkbox" id="P2_B_118" name="check15" value="option2"> 8. Crianza de animales?
												</label>
												<label>
													<input type="checkbox" id="P2_B_119" name="check15" value="option1"> 9. Subversiónes / conflictos?
												</label>
												<label>
													<input type="checkbox" id="P2_B_1110" name="check15" value="option2"> 10. Rellenos sanitarios?
												</label>
												<label>
													<input type="checkbox" id="P2_B_1111" name="check15" value="option1"> 11. Otro?
												</label>
												<label>(Especifique)</label>
												<input style="width:400px;" id="P2_B_11_Cod_O" type="text" class="form-control">
												<label>
													<input type="checkbox" id="P2_B_1112" name="check" value="option2"> 12. Ninguno
												</label>
											</td>
										</tr>
										<tr>
											<td>12.</td>
											<td>
												<strong>¿Existe vulnerabilidad por factores de exposición como:</strong>
												<br>(Acepte uno o mas códigos)
											</td>
											<td>
												<label>
													<input type="checkbox" id="P2_B_121" name="check16" value="option1"> 1. Cercanía lecho de río, quebrada?
												</label>
												<label>
													<input type="checkbox" id="P2_B_122" name="check16" value="option2"> 2. Cercanía a vía ferrea?
												</label>
												<label>
													<input type="checkbox" id="P2_B_123" name="check16" value="option1"> 3. Cercanía a barranco o precipicio?
												</label>
												<label>
													<input type="checkbox" id="P2_B_124" name="check16" value="option2"> 4. Cercanía a cuartel militar o policial?
												</label>
												<label>
													<input type="checkbox" id="P2_B_125" name="check16" value="option1"> 5. Erosión fluvial de laderas?
												</label>
												<label>
													<input type="checkbox" id="P2_B_126" name="check16" value="option2"> 6. Otro?
												</label>
												<label>(Especifique)</label>
												<input style="width:400px;" id="P2_B_12_Cod_O" type="text" class="form-control">
												<label>
												<label>
													<input type="checkbox" id="P2_B_127" name="check16" value="option1"> 7. Ninguno
												</label>
											</td>
										</tr>
									</tbody>
							</table>

							<table class="table table-bordered">
								<thead>
									<tr>
										<th colspan="4" style="text-align:center; text-transform: uppercase;" >Sección C: Servicios basicos y comunicaciones</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td>1.</td>
										<td><strong>¿En esta localidad cuentan con servicio de:</strong></td>
										<td>

											<table class="table table-bordered" style="width:250px;height:200px;">
												<thead>
													<tr>
														<th style="text-align:center;">Servicios</th>
														<th style="text-align:center;">Si</th>
														<th style="text-align:center;">No</th>
													</tr>
												</thead>
												<tbody>
													<tr>
														<td>1.	Energía eléctrica?</td>
														<td>
															<label>
																<input type="checkbox" id="P2_C_1Locl_1_Energ1" name="P2_C_1Locl_1_Energ1" value="">
																 1
															</label>
														</td>
														<td>
															<label>
																<input type="checkbox" id="P2_C_1Locl_1_Energ2" name="P2_C_1Locl_1_Energ2" value="">
																 2
															</label>
														</td>
													</tr>
													<tr>
														<td>2.	Agua potable?</td>
														<td>
															<label>
																<input type="checkbox" id="P2_C_1Locl_2_Agua1" name="P2_C_1Locl_2_Agua1" value="">
																 1
															</label>
														</td>
														<td>
															<label>
																<input type="checkbox" id="P2_C_1Locl_2_Agua2" name="P2_C_1Locl_2_Agua2" value="">
																 2
															</label>
														</td>
													</tr>
													<tr>
														<td>3.	Alcantarillado?	</td>
														<td>
															<label>
																<input type="checkbox" id="P2_C_1Locl_3_Alc1" name="P2_C_1Locl_3_Alc11" value="">
																 1
															</label>
														</td>
														<td>
															<label>
																<input type="checkbox" id="P2_C_1Locl_3_Alc12" name="P2_C_1Locl_3_Alc12" value="">
																 2
															</label>
														</td>
													</tr>
												</tbody>
											</table>

										</td>
										<td>
											<table class="table table-bordered" style="width:250px;height:200px;">
												<thead>
													<tr>
														<th style="text-align:center;">Servicios</th>
														<th style="text-align:center;">Si</th>
														<th style="text-align:center;">No</th>
													</tr>
												</thead>
												<tbody>
													<tr>
														<td>Telefonía fija?</td>
														<td>
															<label>
																<input type="checkbox" id="P2_C_1Locl_4_Tfija1" name="P2_C_1Locl_4_Tfija1" value="option2">
																 1
															</label>
														</td>
														<td>
															<label>
																<input type="checkbox" id="P2_C_1Locl_4_Tfija1" name="P2_C_1Locl_4_Tfija2" value="option2">
																 2
															</label>
														</td>
													</tr>
													<tr>
														<td>Telefonía móvil?</td>
														<td>
															<label>
																<input type="checkbox" id="P2_C_1Locl_5_Tmov1" name="P2_C_1Locl_5_Tmov1" value="option2">
																 1
															</label>
														</td>
														<td>
															<label>
																<input type="checkbox" id="P2_C_1Locl_5_Tmov2" name="P2_C_1Locl_5_Tmov2" value="option2">
																 2
															</label>
														</td>
													</tr>
													<tr>
														<td>Internet?</td>
														<td>
															<label>
																<input type="checkbox" id="P2_C_1Locl_6_Int1" name="P2_C_1Locl_6_Int1" value="option2">
																 1
															</label>
														</td>
														<td>
															<label>
																<input type="checkbox" id="P2_C_1Locl_6_Int2" name="P2_C_1Locl_6_Int2" value="option2">
																 2
															</label>
														</td>
													</tr>
												</tbody>
											</table>

										</td>
									</tr>
									<tr>
										<td>2.</td>
										<td><strong>¿En este local escolar cuentan con servicio de:</strong></td>
										<td>

											<table class="table table-bordered" style="width:250px;height:200px;">
												<thead>
													<tr>
														<th style="text-align:center;">Servicios</th>
														<th style="text-align:center;">Si</th>
														<th style="text-align:center;">No</th>
													</tr>
												</thead>
												<tbody>
													<tr>
														<td>1.	Energía eléctrica?</td>
														<td>
															<label>
																<input type="checkbox" id="P2_C_2LocE_1_Energ1" name="P2_C_2LocE_1_Energ1" value="option2">
																 1
															</label>
														</td>
														<td>
															<label>
																<input type="checkbox" id="P2_C_2LocE_1_Energ2" name="P2_C_2LocE_1_Energ2" value="option2">
																 2
															</label>
														</td>
													</tr>
													<tr>
														<td>2.	Agua potable?</td>
														<td>
															<label>
																<input type="checkbox" id="P2_C_2LocE_2_Agua1" name="P2_C_2LocE_2_Agua1" value="option2">
																 1
															</label>
														</td>
														<td>
															<label>
																<input type="checkbox" id="P2_C_2LocE_2_Agua2" name="P2_C_2LocE_2_Agua2" value="option2">
																 2
															</label>
														</td>
													</tr>
													<tr>
														<td>3.	Alcantarillado?	</td>
														<td>
															<label>
																<input type="checkbox" id="P2_C_2LocE_3_Alc1" name="P2_C_2LocE_3_Alc1" value="option2">
																 1
															</label>
														</td>
														<td>
															<label>
																<input type="checkbox" id="P2_C_2LocE_3_Alc2" name="P2_C_2LocE_3_Alc2" value="option2">
																 2
															</label>
														</td>
													</tr>
												</tbody>
											</table>

										</td>
										<td>

											<table class="table table-bordered" style="width:250px;height:200px;">
												<thead>
													<tr>
														<th style="text-align:center;">Servicios</th>
														<th style="text-align:center;">Si</th>
														<th style="text-align:center;">No</th>
													</tr>
												</thead>
												<tbody>
													<tr>
														<td>Telefonía fija?</td>
														<td>
															<label>
																<input type="checkbox" id="P2_C_2LocE_4_Tfija1" name="P2_C_2LocE_4_Tfija1" value="option2">
																 1
															</label>
														</td>
														<td>
															<label>
																<input type="checkbox" id="P2_C_2LocE_4_Tfija2" name="P2_C_2LocE_4_Tfija2" value="option2">
																 2
															</label>
														</td>
													</tr>
													<tr>
														<td>Telefonía móvil?</td>
														<td>
															<label>
																<input type="checkbox" id="P2_C_2LocE_5_Tmov1" name="P2_C_2LocE_5_Tmov1" value="option2">
																 1
															</label>
														</td>
														<td>
															<label>
																<input type="checkbox" id="P2_C_2LocE_5_Tmov2" name="P2_C_2LocE_5_Tmov2" value="option2">
																 2
															</label>
														</td>
													</tr>
													<tr>
														<td>Internet?</td>
														<td>
															<label>
																<input type="checkbox" id="P2_C_2LocE_6_Int1" name="P2_C_2LocE_6_Int1" value="option2">
																 1
															</label>
														</td>
														<td>
															<label>
																<input type="checkbox" id="P2_C_2LocE_6_Int2" name="P2_C_2LocE_6_Int2" value="option2">
																 2
															</label>
														</td>
													</tr>
												</tbody>
											</table>

										</td>
									</tr>
								</tbody>
							</table>

							<table class="table table-bordered">
								<thead>
									<tr>
										<th colspan="3" style="text-transform: uppercase;">Sección D: Conexión de los servicios basicos del local escolar</th>
									</tr>
									<tr>
										<td colspan="3">Si en la Sección C, pregunta 2, ítem 1, circuló código 2 (No), pasar a la pregunta 5.</td>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td>1.</td>
										<td>
											<strong>La energía eléctrica del local escolar, ¿procede de:</strong><br />
											(Acepte uno o más códigos)
										</td>
										<td>
											<label>
												<input type="checkbox" id="P2_D_1_EnergCod1" name="P2_D_1_EnergCod" value=""> 1. Red pública?
											</label>
											<label>
												<input type="checkbox" id="P2_D_1_EnergCod2" name="P2_D_1_EnergCod" value=""> 2. Generador o motor?
											</label>
											<label>
												<input type="checkbox" id="P2_D_1_EnergCod3" name="P2_D_1_EnergCod" value=""> 3. Panel solar?
											</label>
											<label>
												<input type="checkbox" id="P2_D_1_EnergCod4" name="P2_D_1_EnergCod" value=""> 4. Otro?
											</label>
											<label>(Especifique)</label>
											<input style="width:400px;" id="P2_D_1_EnergCod_O" type="text" class="form-control">
										</td>

									</tr>
								</tbody>
							</table>

							<table class="table table-bordered">
								<thead>
									<tr>
										<th colspan="3">Evaluador: Verifique la pregunta 1, si tiene circulado el código 1 “Red pública”, pase a la pregunta 2, de los contrario pase a la pregunta 5</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td>2.</td>
										<td><strong>¿Con cuántos suministros eléctricos cuenta este local escolar?</strong></td>
										<td>
											<div class="panel">
												<label>Cantidad</label>
												<input style="width:100px;" id="P2_D_2_Energ_CantSum" type="text" class="form-control">
											</div>
										</td>
									</tr>
									<tr>
										<td>3.</td>
										<td><strong>¿Cuáles son los números de suministros eléctricos con que cuenta este local escolar?</strong>
											<br />(diligencie, según respuesta en pregunta 2)
										</td>
										<td>
											<div id="suministros_electricos">
												<!-- AJAX -->
											</div>
											<div class="panel" style="text-align:center">
												(1) No tiene documento de referencia
											</div>
										</td>
									</tr>
									<tr>
										<td>4.</td>
										<td><strong>¿Cuál es el nombre de la empresa que suministra el servicio eléctrico?</strong></td>
										<td><input style="width:400px;" id="P2_D_4_Energ_Emp" type="text" class="form-control"></td>
									</tr>
									<tr>
										<td>5.</td>
										<td><strong>El abastecimiento de agua, ¿procede de:</strong>
											<br />(Acepte uno o más códigos)
										</td>
										<td>
											<label>
												<input type="checkbox" id="P2_D_5_AbastAgCod1" name="" value=""> 1. Red pública?
											</label>
											<label>
												<input type="checkbox" id="P2_D_5_AbastAgCod2" name="" value=""> 2. Pilón de uso público (agua potable)?
											</label>
											<label>
												<input type="checkbox" id="P2_D_5_AbastAgCod3" name="" value=""> 3. Camión cisterna u otro similar?
											</label>
											<label>
												<input type="checkbox" id="P2_D_5_AbastAgCod4" name="" value=""> 4. Pozo?
											</label>
											<label>
												<input type="checkbox" id="P2_D_5_AbastAgCod5" name="" value=""> 5. Río, acequia, manantial o similar?
											</label>
											<label>
												<input type="checkbox" id="P2_D_5_AbastAgCod6" name="" value=""> 6. Otro?
											</label>
											<label>(Especifique)</label>
											<input id="P2_D_5_AbastAgCod_O" style="width:400px;" type="text" class="form-control">
										</td>
									</tr>

								</tbody>
							</table>

							<table class="table table-bordered">
								<thead>
									<tr>
										<th colspan="3">Evaluador: Verifique la pregunta 5, si tiene circulado el código 1, pase a la pregunta 6, de lo contrario pase a la pregunta 9</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td>6.</td>
										<td><strong>¿Con cuántos suministros de agua cuenta el local escolar?</strong></td>
										<td>
											<div class="panel">
												<label>Cantidad</label>
												<input style="width:100px;" id="P2_D_6_Agua_CantSum" type="text" class="form-control">
											</div>
										</td>
									</tr>
									<tr>
										<td>7.</td>
										<td><strong>¿Cuáles son los números de suministros de agua con que cuenta el local escolar?</strong>
											<br />(diligencie, según respuesta en pregunta 6)
										</td>
										<td>

											<div id="suministros_agua">
												<!-- AJAX -->
											</div>

											<div class="panel" style="text-align:center">
												(1) No tiene documento de referencia
											</div>
										</td>
									</tr>
									<tr>
										<td>8.</td>
										<td><strong>¿Cuál es el nombre de la empresa que suministra el servicio de agua?</strong></td>
										<td><input style="width:400px;" id="P2_D_8_Agua_Emp" type="text" class="form-control"></td>
									</tr>
									<tr>
										<td>9.</td>
										<td><strong>¿el desagüe del local escolar está conectado a:</strong>
											<br />(Acepte solo un código)
										</td>
										<td>
											<label>
												<input type="checkbox" id="P2_D_9_Desag1" name="" value=""> 1. Red pública?
											</label>
											<label>
												<input type="checkbox" id="P2_D_9_Desag2" name="" value=""> 2. Tanque séptico y pozo percolador?
											</label>
											<label>
												<input type="checkbox" id="P2_D_9_Desag3" name="" value=""> 3. Pozo con tratamiento (cal, ceniza y otro)?
											</label>
											<label>
												<input type="checkbox" id="P2_D_9_Desag4" name="" value=""> 4. Pozo sin tratamiento alguno?
											</label>
											<label>
												<input type="checkbox" id="P2_D_9_Desag5" name="" value=""> 5. Río, acequia, manantial o canal?
											</label>
											<label>
												<input type="checkbox" id="P2_D_9_Desag6" name="" value=""> 6. Zanja filtrante?
											</label>
											<label>
												<input type="checkbox" id="P2_D_9_Desag7" name="" value=""> 7. No tiene
											</label>
										</td>
									</tr>

								</tbody>
							</table>

							<table class="table table-bordered">
								<thead>
									<tr>
										<th colspan="3" style="text-transform: uppercase;">Sección E:  Pararrayos – Descargadores o Discipadores de sobretensiones</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td>1.</td>
										<td><strong>¿El local escolar, cuenta con pararrayos?</strong></td>
										<td>
											<label>
												<input type="radio" id="P2_E_1_Prayo1" name="prayo" value=""> 1. Si?
											</label>
											<label>
												<input type="radio" id="P2_E_1_Prayo2" name="prayo" value=""> 2. No?
											</label>
										</td>
									</tr>
									<tr>
										<td>2.</td>
										<td><strong>¿Con cuántas puestas a tierra cuenta el pararrayos?</strong></td>
										<td>
											<div class="panel">
												<label>Cantidad</label>
												<input id="P2_E_2_Ptierra" style="width:100px;" type="text" class="form-control">
											</div>
										</td>
									</tr>
									<tr>
										<td>3.</td>
										<td><strong>¿En que año se hizo el último mantenimiento al sistema de puesta a tierra?</strong></td>
										<td>
											<div class="panel">
												<label>Año</label>
												<input id="P2_E_3_Ano" style="width:100px;" type="text" class="form-control">
											</div>
										</td>
									</tr>

								</tbody>
							</table>

							<div class="panel">
								<label>Observaciones:</label>
								<textarea id="P2_E_Obs" style="width:870px; height:100px;"></textarea>
							</div>


							<table class="table table-bordered">
								<thead>
									<tr>
										<th colspan="3" style="text-transform: uppercase;">Sección F:  Eliminación de basura</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td>1</td>
										<td>
											<strong>¿En el local escolar la basura que se elimina es:</strong>
											<br />(Acepte uno o más códigos)
										</td>
										<td>
											<label>
													<input type="checkbox" id="P2_F_1_ElimBas1" name="" value=""> 1. Arrojada al camión/triciclo municipal?
												</label>
												<label>
													<input type="checkbox" id="P2_F_1_ElimBas2" name="" value=""> 2. Arrojada al camión/informal?
												</label>
												<label>
													<input type="checkbox" id="P2_F_1_ElimBas3" name="" value=""> 3. Depositada en contenedor?
												</label>
												<label>
													<input type="checkbox" id="P2_F_1_ElimBas4" name="" value=""> 4. Acumulada en calles/campo abierto?
												</label>
												<label>
													<input type="checkbox" id="P2_F_1_ElimBas5" name="" value=""> 5. Reciclada?
												</label>
												<label>
													<input type="checkbox" id="P2_F_1_ElimBas6" name="" value=""> 6. Quemada?
												</label>
												<label>
													<input type="checkbox" id="P2_F_1_ElimBas7" name="" value=""> 7. Enterrada?
												</label>
												<label>
													<input type="checkbox" id="P2_F_1_ElimBas8" name="" value=""> 8. Usada como alimento para animales?
												</label>
												<label>
													<input type="checkbox" id="P2_F_1_ElimBas9" name="" value=""> 9. Separada para el compost?
												</label>
												<label>
													<input type="checkbox" id="P2_F_1_ElimBas10" name="" value=""> 10. Otra forma?
												</label>
												<label>(Especifique)</label>
												<input id="P2_F_1_ElimBas_O" style="width:400px;" type="text" class="form-control">
										</td>
									</tr>
								</tbody>
							</table>

							<table class="table table-bordered">
								<thead>
									<tr>
										<th colspan="3" style="text-transform: uppercase;">Sección G:  Nuevas intervenciones en el local escolar</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td>1.</td>
										<td>
											<strong>¿En el local escolar existen obras en ejecución?</strong>
										</td>
										<td>
											<label>
												<input type="radio" id="P2_G_1_ObEjec1" name="P2_G_1_ObEjec" value=""> 1. Si?
											</label>
											<label>
												<input type="radio" id="P2_G_1_ObEjec2" name="P2_G_1_ObEjec" value=""> 2. No?
											</label>
										</td>
									</tr>
									<tr>
										<td>2.</td>
										<td>
											<strong>¿Qué instituciones, organismos o empresas están ejecutando estas obras?</strong>
											<br />(Acepte uno o más códigos)
										</td>
										<td>
											<table class="table table-bordered">
												<thead>
													<tr>
														<td style="text-align:center" rowspan="2">Instituciones</td>
														<td style="text-align:center" colspan="2">2A. ¿cuenta con estudio de pre-inversión?</td>
														<td style="text-align:center" rowspan="2">2B. ¿cuál es el código snip?</td>
													</tr>
													<tr>
														<td style="text-align:center">Si</td>
														<td style="text-align:center">No</td>
													</tr>
												</thead>
												<tbody>
													<tr>
														<td>
															<input type="checkbox" id="P2_G_2_Cod1" name="" value="">
															1.Gobierno nacional / proyectos especiales</td>
														<td>
															<label>
																<input type="checkbox" id="P2_G_2A_EstPre11" name="" value=""> 1
															</label>
														</td>
														<td><label>
																<input type="checkbox" id="P2_G_2A_EstPre12" name="" value=""> 2
															</label>
														</td>
														<td><input style="width:250px;" id="P2_G_2B_snip1" type="text" class="form-control"></td>
													</tr>
													<tr>
														<td>
															<input type="checkbox" id="P2_G_2_Cod2" name="" value="">
															2.Gobierno regional / local</td>
														<td>
															<label>
																<input type="checkbox" id="P2_G_2A_EstPre21" name="" value=""> 1
															</label>
														</td>
														<td><label>
																<input type="checkbox" id="P2_G_2A_EstPre22" name="" value=""> 2
															</label>
														</td>
														<td><input style="width:250px;" id="P2_G_2B_snip2" type="text" class="form-control"></td>
													</tr>
													<tr>
														<td>
															<input type="checkbox" id="P2_G_2_Cod3" name="" value="">
															3.Apafa / autoconstrucción</td>
														<td>
															<label>
																<input type="checkbox" id="P2_G_2A_EstPre31" name="" value=""> 1
															</label>
														</td>
														<td><label>
																<input type="checkbox" id="P2_G_2A_EstPre32" name="" value=""> 2
															</label>
														</td>
														<td><input style="width:250px;" id="P2_G_2B_snip3" type="text" class="form-control"></td>
													</tr>
													<tr>
														<td>
															<input type="checkbox" id="P2_G_2_Cod4" name="" value="">
															4.Entidades cooperantes</td>
														<td>
															<label>
																<input type="checkbox" id="P2_G_2A_EstPre41" name="" value=""> 1
															</label>
														</td>
														<td><label>
																<input type="checkbox" id="P2_G_2A_EstPre42" name="" value=""> 2
															</label>
														</td>
														<td><input style="width:250px;" id="P2_G_2B_snip4" type="text" class="form-control"></td>
													</tr>
													<tr>
														<td>
															<input type="checkbox" id="P2_G_2_Cod5" name="" value="">
															5.Organismos sin fines de lucro</td>
														<td>
															<label>
																<input type="checkbox" id="P2_G_2A_EstPre51" name="" value=""> 1
															</label>
														</td>
														<td><label>
																<input type="checkbox" id="P2_G_2A_EstPre52" name="" value=""> 2
															</label>
														</td>
														<td><input style="width:250px;" id="P2_G_2B_snip5" type="text" class="form-control"></td>
													</tr>
													<tr>
														<td>
															<input type="checkbox" id="P2_G_2_Cod6" name="" value="">
															6.Empresa privada</td>
														<td>
															<label>
																<input type="checkbox" id="P2_G_2A_EstPre61" name="" value=""> 1
															</label>
														</td>
														<td><label>
																<input type="checkbox" id="P2_G_2A_EstPre62" name="" value=""> 2
															</label>
														</td>
														<td><input style="width:250px;" id="P2_G_2B_snip6" type="text" class="form-control"></td>
													</tr>
													<tr>
														<td>
															<input type="checkbox" id="P2_G_2_Cod7" name="" value="">
															<label>7.Otro (Especifique)</label>
															<input id="P2_F_1_ElimBas_O" style="width:300px;" type="text" class="form-control">
														</td>
														<td>
															<label>
																<input type="checkbox" id="P2_G_2A_EstPre71" name="" value=""> 1
															</label>
														</td>
														<td><label>
																<input type="checkbox" id="P2_G_2A_EstPre72" name="" value=""> 2
															</label>
														</td>
														<td><input style="width:250px;" id="P2_G_2B_snip7" type="text" class="form-control"></td>
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

						</div><!--END PANEL PRINCIPAL CAP2-->
	  	    		</div>
	  	    	</div>