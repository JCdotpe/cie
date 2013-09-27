<?php $this->load->view('visor/nav_view.php'); ?>

<script type="text/javascript">

	$.import('js/visor/capitulo1/index.js','js');
	
</script>

<div class="tab-pane" id="cap1">
					<div class="content" id="content2">

						<div class="panel panel-info">
							<div class="panel-heading">
								<h5 class="panel-title" style="text-transform: uppercase;">Capitulo I Identificación de las instituciones eductivas, predios y anexos del local escolar</h5>
							</div>

							<table class="table table-bordered">
								<thead>
									<th colspan="2" style="text-transform: uppercase;">Sección A: Instituciones educativas</th>
								</thead>
								<tbody>
									<td><strong>1.¿Cuantas instituciones educativas prestan servicio en este local escolar?</strong></td>
									<td>N° de instituciones educativas <input id="nie2" style="width:40px;" type="text" class="form-control"></td>
								</tbody>
							</table>

							<div class="panel" style="background:#DDD;">
								<strong>Visualizar Instituciones Educativas</strong>
								<div id="ie-panel" style="margin-top:20px;width:400px;">
									<!--  AJAX -->
								</div>
								<div id="ie_selected">
									
								</div>

							</div>

							<div id="ie_educa" style="margin-top:10px;">
								
								<table class="table table-bordered">
									<thead>
										<th colspan="2">2. Institución educativa N° <span><input value="" id="P1_A_2_NroIE" style="width:20px;" type="text" class="form-control"></span></th>
									</thead>
									<tbody>
										<tr>
											<td>
												<strong>2.1¿Cuál es el nombre de la institución educativa?</strong>
											</td>
											<td><input value="" id="P1_A_2_1_NomIE" style="width:350px;" type="text" class="form-control"></td>
										</tr>
										<tr>
											<td>
												<strong>2.2¿Cuáles son los apellidos y nombres del director?</strong>
											</td>
											<td><input value="" id="P1_A_2_2_Direc" style="width:350px;" type="text" class="form-control"></td>
										</tr>
										<tr>
											<td>
												<strong>2.3¿Cuál es el numero número de DNI o Carnet de Extranjería del Director?</strong>
											</td>
											<td>
												<div class="panel">
													<label>D.N.I.</label>
													<input value="" id="P1_A_2_3_DocNro" style="width:200px;" type="text" class="form-control">
												</div>
												<div class="panel">
													<label>Carnet del Extrangero</label>
													<input value="" id="P1_A_2_3_DocNro" style="width:200px;" type="text" class="form-control">
												</div>
											</td>
										</tr>
										<tr>
											<td><strong>2.4¿Cuál es el numero de teléfono de (L) ?</strong></td>
											<td>
												<div class="panel">
													<label>La Institucion Educativa?</label>
													<input value="" id="P1_A_2_4_TelfIE" style="width:200px;" type="text" class="form-control">
												</div>
												<div class="panel">
													<label>Director?</label>
													<input value="" id="P1_A_2_4_TelfDir" style="width:200px;" type="text" class="form-control">
												</div>
											</td>
										</tr>
										<tr>
											<td><strong>2.5¿Cuál es el correo electronico de (L)?</strong></td>
											<td>
												<div class="panel">
													<label>La Institucion Educativa?</label>
													<input value="" id="P1_A_2_5_EmailIE" style="width:400px;text-transform:lowercase;" type="text" class="form-control">
												</div>
												<div class="panel">
													<label>Director?</label>
													<input value="" id="P1_A_2_5_EmailDir" style="width:400px;text-transform:lowercase;" type="text" class="form-control">
												</div>
											</td>
										</tr>
										<tr>
											<td><strong>2.6¿Apellidos y Nombres del informante?</strong></td>
											<td><input value="" id="P1_A_2_6_Informant" style="width:400px;" type="text" class="form-control"></td>
										</tr>
										<tr>
											<td><strong>2.7¿Cargo del informante?</strong></td>
											<td><input value="" id="P1_A_2_7_InformantCarg" style="width:400px;" type="text" class="form-control"></td>
										</tr>
										<tr>
											<td><strong>2.8¿Cuántos códigos modulares tiene asignada una institución educativa?</strong></td>
											<td>
												<div class="panel">
													<label>N° de Códigos Modulares</label>
													<input value="" id="P1_A_2_8_Can_CMod_IE" style="width:200px;" type="text" class="form-control">
												</div>
											</td>
										</tr>
									</tbody>

								</table>



										<div class="panel"><!-- N CODIGOS -->
											<label>2.9 Códigos modulares asignados a la institución educativa:</label>

												<table class="table table-bordered">
															<thead>
																<tr>
																	<th rowspan="2" style="text-align:center;vertical-align:middle;">N° Ord.</th>
																	<th rowspan="2" style="text-align:center;vertical-align:middle;">Codigo Modular</th>
																	<th rowspan="2" style="text-align:center;vertical-align:middle;">Codigo local escolar</th>
																	<th rowspan="2" style="text-align:center;vertical-align:middle;">Nivel o Modalidad</th>
																	<th rowspan="2" style="text-align:center;vertical-align:middle;">Caracteristica</th>
																	<th rowspan="2" style="text-align:center;vertical-align:middle;">Numero de anexo</th>
																	<th rowspan="2" style="text-align:center;vertical-align:middle;">¿Cuantos ANexos tiene?</th>
																	<th colspan="2" style="text-align:center; border:1px solid #333;">1er. Turno</th>
																	<th colspan="2" style="text-align:center; border:1px solid #333;">2do. Turno</th>
																	<th colspan="2" style="text-align:center; border:1px solid #333;">3er. Turno</th>
																</tr>
																<tr>
																	<th style="text-align:center;">Total Alumnos</th>
																	<th style="text-align:center;">Total Aulas</th>
																	<th style="text-align:center;">Total Alumnos</th>
																	<th style="text-align:center;">Total Aulas</th>
																	<th style="text-align:center;">Total Alumnos</th>
																	<th style="text-align:center;">Total Aulas</th>
																</tr>
																<tr>
																	<th></th>
																	<th style="text-align:center;">(a)</th>
																	<th style="text-align:center;">(b)</th>
																	<th style="text-align:center;">(c)</th>
																	<th style="text-align:center;">(d)</th>
																	<th style="text-align:center;">(e)</th>
																	<th style="text-align:center;">(f)</th>
																	<th style="text-align:center;">(g)</th>
																	<th style="text-align:center;">(h)</th>
																	<th style="text-align:center;">(i)</th>
																	<th style="text-align:center;">(j)</th>
																	<th style="text-align:center;">(k)</th>
																	<th style="text-align:center;">(l)</th>
																</tr>
															</thead>
															<tbody id="table_ies">
																<!-- AJAX -->
															</tbody>

														</table>

														<div class="panel">
																<label>Observaciones:</label>
																<textarea id="P1_A_2_Obs" style="width:800px; height:100px;"></textarea>
														</div>

										</div><!-- end panel ncodigod-->
								</div><!-- END IE EDUCA -->

					</div><!-- END PANEL PRINCIPAL-->

						<div class="panel panel-info">

							<!-- PANEL SECCION B N PREDIOS-->

							<div class="panel-heading">
								<h5 class="panel-title" style="text-transform: uppercase;">Sección B: Predio o predios ocupados por el local escolar</h5>
							</div>

							<table class="table table-bordered">
								<tbody>
									<tr>
										<td style="text-align:center;">1.</td>
										<td><strong>¿Cuantos predios ocupa el local escolar?</strong></td>
										<td>
											<label>N° de predios</label>
											<input style="width:300px;" id="P1_B_1_TPred" type="text" class="form-control">
										</td>
									</tr>
									<tr>
										<td style="text-align:center;">2.</td>
										<td><strong>¿Los predios son colindantes?</strong></td>
										<td>
											<label class="checkbox-inline">
												<input type="radio" id="P1_B_2_PredCol1" name="check" value="option1"> 1. Si
											</label>

											<label class="checkbox-inline">
												<input type="radio" id="P1_B_2_PredCol2" name="check" value="option2"> 2. No
											</label>
										</td>
									</tr>
									<tr>
										<td style="text-align:center;">2A.</td>
										<td><strong>¿cuales son los predios no colindantes?</strong></td>
										<td>
											<label>N° de predio</label>
											<input style="width:300px;" id="predios_no_colindantes" type="text" class="form-control">
										</td>
									</tr>
								</tbody>
							</table>

								<div id="panel-predio" class="panel" style="background:#DDD;">
									
									<strong>Visualizar Predios</strong>

									<div id="list-predio" style="margin-top:20px;">

										<!--  AJAX -->

									</div>
								</div>

								


							<table id="table_predios" class="table table-bordered">
								<thead>
									<tr>
										<th colspan="2">
											<label style="float:left;">Predio N°</label>
										</th>
										<th>
											<input id="Nro_Pred" style="float:left; width:300px;" type="text" class="form-control">
										</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td style="text-align:center;">3.</td>
										<td>
											<strong>¿Cuál es el código del inmueble del predio 01?</strong><br />
											(Este código se encuentranen la constancia MARGESI)
										</td>
										<td>
											<input id="P1_B_3_InmCod" style="float:left; width:300px;" type="text" class="form-control">
											<br />

											<label class="checkbox-inline">
												<input type="radio" id="P1_B_3_InmTip1" name="P1_B_3_InmTip" value="option1"> 1. No tiene constancia
											</label>

											<label class="checkbox-inline">
												<input type="radio" id="P1_B_3_InmTip2" name="P1_B_3_InmTip" value="option2"> 2. No sabe
											</label>
										</td>
									</tr>
									<tr>
										<td style="text-align:center;">3.1</td>
										<td>
											<strong>¿Quién es el propietario del predio?</strong><br />
											(Acepte sólo un código)
										</td>
										<td>
											<label>
												<input type="radio" id="P1_B_3_1_Prop1" name="P1_B_3_1_Prop" value=""> 1. Ministerio de Educación
											</label>
											<label>
												<input type="radio" id="P1_B_3_1_Prop2" name="P1_B_3_1_Prop" value=""> 2. Institucion educativa
											</label>
											<label>
												<input type="radio" id="P1_B_3_1_Prop3" name="P1_B_3_1_Prop" value=""> 3. Estado
											</label>
											<label>
												<input type="radio" id="P1_B_3_1_Prop4" name="P1_B_3_1_Prop" value="">
												4. Otro sector del estado
											</label>
											<label>
												<input id="P1_B_3_1_Prop_O1" style="float:left; width:300px;" type="text" class="form-control">
												(Especifique)
											</label>

											<label>
												<input type="radio" id="P1_B_3_1_Prop5" name="P1_B_3_1_Prop" value="">
												5. Propiedad de terceros
											</label>
											<label>
												<input id="P1_B_3_1_Prop_O2" style="float:left; width:300px;" type="text" class="form-control">
												(Especifique)
											</label>

										</td>
									</tr>
									<tr>
										<td style="text-align:center;">3.2</td>
										<td>
											<strong>¿El antecedente registral que tiene el predio es?</strong><br />
											(Acepte sólo un código)
										</td>
										<td>
											<label>
												<input type="radio" id="P1_B_3_2_AntReg_Cod1" name="P1_B_3_2_AntReg_Cod" value="option1"> 1. Partida electrónica?
											</label>
											<label>
												<input type="radio" id="P1_B_3_2_AntReg_Cod2" name="P1_B_3_2_AntReg_Cod" value="option2"> 2. Código de predio?
											</label>
											<label>
												<input type="radio" id="P1_B_3_2_AntReg_Cod3" name="P1_B_3_2_AntReg_Cod" value="option3"> 3. Ficha?
											</label>
											<label>
												<input type="radio" id="P1_B_3_2_AntReg_Cod4" name="P1_B_3_2_AntReg_Cod" value="option4"> 4. Tomo/Foja/Asiento?
											</label>
											<label>
												<input type="radio" id="P1_B_3_2_AntReg_Cod5" name="P1_B_3_2_AntReg_Cod" value="option5"> 5. Ninguno?
											</label>
										</td>
									</tr>
									<tr>
										<td style="text-align:center;">3.3</td>
										<td>
											<strong>¿Cuál es el número del antecedente registral?</strong><br />

										</td>
										<td>
											<label>N° de antecedente registral</label>
											<input id="P1_B_3_3_AntReg_Nro" style="float:left; width:300px;" type="text" class="form-control"><br />
										</td>
									</tr>
									<tr>
										<td style="text-align:center;">3.4</td>
										<td>
											<strong>¿El Título de propiedad no inscrito que tiene el predio es:</strong><br />
											(Acepte sólo un código)
										</td>
										<td>
											<label>
												<input type="radio" id="P1_B_3_4_Tipo_TProp1" name="P1_B_3_4_Tipo_TProp" value="option1"> 1. Escritura pública?
											</label>
											<label>
												<input type="radio" id="P1_B_3_4_Tipo_TProp2" name="P1_B_3_4_Tipo_TProp" value="option2"> 2. Minuta de compra-venta?
											</label>
											<label>
												<input type="radio" id="P1_B_3_4_Tipo_TProp3" name="P1_B_3_4_Tipo_TProp" value="option3"> 3. Minuta de donación?
											</label>
											<label>
												<input type="radio" id="P1_B_3_4_Tipo_TProp4" name="P1_B_3_4_Tipo_TProp" value="option4">	4. Minuta de cesión?
											</label>
											<label>
												<input type="radio" id="P1_B_3_4_Tipo_TProp5" name="P1_B_3_4_Tipo_TProp" value="option4">	5. Minuta de permuta?
											</label>
											<label>
												<input type="radio" id="P1_B_3_4_Tipo_TProp6" name="P1_B_3_4_Tipo_TProp" value="option4">	6. Aporte reglamentario?
											</label>
											<label>
												<input type="radio" id="P1_B_3_4_Tipo_TProp7" name="P1_B_3_4_Tipo_TProp" value="option4">	7. Resolución emitida por  entidad del estado?
											</label>
											<label>
												<input type="radio" id="P1_B_3_4_Tipo_TProp8" name="P1_B_3_4_Tipo_TProp" value="option4">	8. Acta de donación de CC/CN?
											</label>
											<label>
												<input type="radio" id="P1_B_3_4_Tipo_TProp9" name="P1_B_3_4_Tipo_TProp" value="option4">	9. Otro?
											</label>

											<label>
												<input id="P1_B_3_4_Tipo_TProp_O" style="float:left; width:300px;" type="text" class="form-control"> (Especifique)
											</label>

											<label>
												<input type="radio" id="P1_B_3_4_Tipo_TProp10" name="P1_B_3_4_Tipo_TProp" value="option5">	10. Ninguno
											</label>

										</td>
									</tr>
									<tr>
										<td style="text-align:center;">3.5</td>
										<td>
											<strong>¿En que fecha se emitio el título no inscrito?</strong><br />

										</td>
										<td>
											<label>Fecha</label>
											<input id="P1_B_3_5_FecTit" style="float:left; width:100px;" type="text" class="form-control"><br />
										</td>
									</tr>
									<tr>
										<td style="text-align:center;">3.6</td>
										<td>
											<strong>¿El documento de posesión que tiene el predio es:</strong><br />
											(Acepte sólo un código)
										</td>
										<td>
											<label>
												<input type="radio" id="P1_B_3_6_DocPos1" name="P1_B_3_6_DocPos" value="option1"> 1. Constancia de posesion de Juez de Paz?
											</label>
											<label>
												<input type="radio" id="P1_B_3_6_DocPos2" name="P1_B_3_6_DocPos" value="option2"> 2. Constancia de posesion municipal?
											</label>
											<label>
												<input type="radio" id="P1_B_3_6_DocPos3" name="P1_B_3_6_DocPos" value="option3"> 3. Resolución municipal?
											</label>
											<label>
												<input type="radio" id="P1_B_3_6_DocPos4" name="P1_B_3_6_DocPos" value="option4">	4. Resolución de afectación en uso?
											</label>
											<label>
												<input type="radio" id="P1_B_3_6_DocPos5" name="P1_B_3_6_DocPos" value="option4">	5. Convenio con entidad estatal?
											</label>
											<label>
												<input type="radio" id="P1_B_3_6_DocPos6" name="P1_B_3_6_DocPos" value="option4">	6. Convenio con particulares?
											</label>
											<label>
												<input type="radio" id="P1_B_3_6_DocPos7" name="P1_B_3_6_DocPos" value="option4">	7. Contrato de arrendamiento?
											</label>
											<label>
												<input type="radio" id="P1_B_3_6_DocPos8" name="P1_B_3_6_DocPos" value="option4">	8. Contrato de servidumbre?
											</label>
											<label>
												<input type="radio" id="P1_B_3_6_DocPos9" name="P1_B_3_6_DocPos" value="option4">	9. Otro?
											</label>

											<label>
												<input id="P1_B_3_6_DocPos_O" style="float:left; width:300px;" type="text" class="form-control"> (Especifique)
											</label>

											<label>
												<input type="radio" id="P1_B_3_6_DocPos10" name="P1_B_3_6_DocPos" value="option5">	10. Ninguno
											</label>
										</td>
									</tr>
									<tr>
										<td style="text-align:center;">3.7</td>
										<td>
											<strong>¿En qué fecha se emitió el documento de posesión?</strong><br />

										</td>
										<td>
											<label>Fecha</label>
											<input id="P1_B_3_7_DocPos_Fech" style="float:left; width:100px;" type="text" class="form-control">
										</td>
									</tr>
									<tr>
										<td style="text-align:center;">3.8</td>
										<td>
											<strong>¿Cuál es el area del terreno que ocupa el predio?</strong><br />

										</td>
										<td>
											<label>Area en m2</label>
											<table class="table table-bordered">
												<tr>
													<th  style="text-align:center;">Enteros</th>
													<th  style="text-align:center;">Decimales</th>
												</tr>
												<tr>
													<td id="P1_B_3_8_At_Pred1"></td>
													<td id="P1_B_3_8_At_Pred2"></td>
												</tr>
											</table>
										</td>
									</tr>
									<tr>
										<td style="text-align:center;">3.9</td>
										<td>
											<strong>¿Cuál es el area del terreno que ocupa el local escolar en este predio?</strong><br />

										</td>
										<td>
											<label>Area en m2</label>
											<table class="table table-bordered">
												<tr>
													<th style="text-align:center;">Enteros</th>
													<th style="text-align:center;">Decimales</th>
												</tr>
												<tr>
													<td id="P1_B_3_9_At_Local1"></td>
													<td id="P1_B_3_9_At_Local2"></td>
												</tr>
											</table>
										</td>
									</tr>
									<tr>
										<td style="text-align:center;">3.10</td>
										<td>
											<strong>¿El predio es compartido con otros locales escolares , otras instituciones o servicios?</strong>
										</td>
										<td>
											<label class="checkbox-inline">
												<input type="radio" id="P1_B_3_10_Comp1" name="P1_B_3_10_Comp" value="option1"> 1. Si
											</label>

											<label class="checkbox-inline">
												<input type="radio" id="P1_B_3_10_Comp2" name="P1_B_3_10_Comp" value="option2"> 2. No
											</label>
										</td>
									</tr>
									<tr>
										<td style="text-align:center;">3.11</td>
										<td>
											<strong>¿Con cuántos locales escolares otras instituciones o servicios comparten el predio?</strong>
										</td>
										<td>
											<label>N°</label>
											<input id="P1_B_3_11_CompCan" style="float:left; width:50px;" type="text" class="form-control">
										</td>
									</tr>
									<tr>
										<td style="text-align:center;">3.12</td>
										<td>
											<strong>¿cuáles son los nombres de los locales escolares, otras instituciones o servicios con los que comparte el predio?</strong><br />
											(Diligencie, según respuesta en pregunta 3.11)
										</td>
										<td>
											<textarea id="P1_B_3_12_NombComp" style="width:300px; height:100px;">
											</textarea>
										</td>
									</tr>
								</tbody>
							</table>

							<div class="panel">
								<label>Observaciones:</label>
								<textarea id="P1_B_3_Obs" style="width:870px; height:100px;"></textarea>
							</div>

						</div><!-- END PANEL SECCION B-->

						<div class="panel panel-info"><!-- PANEL SECCION C N ANEXOS-->
							<div class="panel-heading">
								<h5 class="panel-title" style="text-transform: uppercase;">Sección C: Anexos de la institución educativa</h5>
							</div>

							<div class="panel">
								Evaluador: Diligencie esta sección sólo si en la columna (f) de la pregunta 2.9 Sección A, declaro tener 1 o mas anexos
							</div>

							<div id="panel-anexo" class="panel" style="background:#DDD;">
									
									<strong>Visualizar Anexos</strong>

									<div id="list-anexo" style="margin-top:20px;">

										<!--  AJAX -->

									</div>
								</div>

							<div class="panel" style="height:100px;">
								<div class="panel" style="float:left; margin-left:150px;">
									<label>Número de Anexo</label>
									<input id="P1_A_2_9_Nro" style="float:left; width:200px;" type="text" class="form-control">
								</div>
								<div class="panel" style="float:left; margin-left:150px;">
									<label>Codigo Modular</label>
									<input id="P1_A_2_9_NroCMod" style="float:left; width:200px;" type="text" class="form-control">
								</div>
							</div>

							<div class="panel">
								<div class="panel">
									<strong>1. ¿Cuál es el código del local escolar del anexo? </strong>
									<input id="P1_C_1_CodLoc_Anex" style="width:200px;" type="text" class="form-control">
								</div>

								<ul class="list-group">
								
									<li class="list-group-item"><div style="width:150px; margin-left:10px; float:left;">2. Provincia </div> <input style="width:300px;" type="text" class="form-control provincia"></li>
									<li class="list-group-item"><div style="width:150px; margin-left:10px; float:left;">3. Distrito </div> <input style="width:300px;" type="text" class="form-control distrito"></li>
									<li class="list-group-item"><div style="width:150px; margin-left:10px; float:left;">4. Centro Poblado </div> <input style="width:300px;" type="text" class="form-control PC_A_4_CentroP"></li>
									<li class="list-group-item"><div style="width:150px; margin-left:10px; float:left;">5. Nucleo Urbano </div> <input style="width:300px;" type="text" class="form-control PC_A_5_NucleoUrb"></li>
								
									<li class="list-group-item" style="height:100px;">
										<div style=" width:120px; margin-left:10px; margin-right:10px; float:left;"><strong>6. Dirección del local escolar</strong><br /> (Para tipo de via circule sólo un código)</div>

											<div style="width:680px; margin-left:10px; margin-right:10px; float:left;">

												<label class="checkbox-inline"><strong>Tipo de Via: </strong></label>

												<div class="panel">

													<label class="checkbox-inline">
														<input type="radio" id="P1_C_6Dir_1_Tvia1" name="P1_C_6Dir_1_Tvia" value="option1"> 1. Avenida
													</label>
													<label class="checkbox-inline">
														<input type="radio" id="P1_C_6Dir_1_Tvia2" name="P1_C_6Dir_1_Tvia" value="option2"> 2. Jirón
													</label>
													<label class="checkbox-inline">
														<input type="radio" id="P1_C_6Dir_1_Tvia3" name="P1_C_6Dir_1_Tvia" value="option2"> 3. Calle
													</label>
													<label class="checkbox-inline">
														<input type="radio" id="P1_C_6Dir_1_Tvia4" name="P1_C_6Dir_1_Tvia" value="option2"> 4. Pasaje
													</label>
													<label class="checkbox-inline">
														<input type="radio" id="P1_C_6Dir_1_Tvia5" name="P1_C_6Dir_1_Tvia" value="option2"> 5. Carretera
													</label>
													<label class="checkbox-inline">
														<input type="radio" id="P1_C_6Dir_1_Tvia6" name="P1_C_6Dir_1_Tvia" value="option2"> 6. Autopista
													</label>
													<label class="checkbox-inline">
														<input type="radio" id="P1_C_6Dir_1_Tvia7" name="P1_C_6Dir_1_Tvia" value="option2"> 7. Otro
													</label>
												</div>

											<div>

									</li>
								</ul>

								<table class="table table-bordered" style="margin-top:20px;">
									<thead>
										<tr>
											<th  style="text-align:center;">Nombre de via</th>
											<th  style="text-align:center;">N° de puerta</th>
											<th  style="text-align:center;">Piso</th>
											<th  style="text-align:center;">Mz.</th>
											<th  style="text-align:center;">Lote</th>
											<th  style="text-align:center;">Sector</th>
											<th  style="text-align:center;">Zona</th>
											<th  style="text-align:center;">Etapa</th>
											<th  style="text-align:center;">Km.</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td id="P1_C_6Dir_2_Nomb" style="text-align:center;"></td>
											<td id="P1_C_6Dir_3_Nro" style="text-align:center;"></td>
											<td id="P1_C_6Dir_4_Piso" style="text-align:center;"></td>
											<td id="P1_C_6Dir_5_Mz" style="text-align:center;"></td>
											<td id="P1_C_6Dir_6_Lt" style="text-align:center;"></td>
											<td id="P1_C_6Dir_7_Sect" style="text-align:center;"></td>
											<td id="P1_C_6Dir_8_Zona" style="text-align:center;"></td>
											<td id="P1_C_6Dir_9_Et" style="text-align:center;"></td>
											<td id="P1_C_6Dir_10_Km" style="text-align:center;"></td>
										</tr>
									</tbody>
								</table>

								<div class="panel">
									<strong>7. Referencia de la dirección del anexo del local escolar: </strong>
									<input id="P1_C_7_RefDir" style="width:840px;" type="text" class="form-control">
								</div>

							</div><!--END PANEL -->

							<table class="table table-bordered" style="margin-top:20px;">
								<tr>
									<td>8.</td>
									<td><strong>¿Cuál es el código del inmueble del anexo 01?</strong><br />
										(Este código se encuentra en la constancia MARGESI)</td>
									<td>
										<input id="P1_C_8_InmCod" style="float:left; width:500px;" type="text" class="form-control"><br />
											<label class="checkbox-inline">
												<input type="radio" id="P1_C_8_InmTip1" name="P1_C_8_InmTip" value="option1"> 1. No tiene constancia
											</label>

											<label class="checkbox-inline">
												<input type="radio" id="P1_C_8_InmTip2" name="P1_C_8_InmTip" value="option2"> 2. No sabe
											</label>
									</td>
								</tr>
								<tr>
									<td>9.</td>
									<td>
										<strong>¿Quien es el propietario del predio?</strong>
										<br />(Acepte sólo un código)
									</td>
									<td>
										<label>
												<input type="radio" id="P1_C_9_Prop1" name="P1_C_9_Prop" value="option1"> 1. Ministerio de educación?
											</label>
											<label>
												<input type="radio" id="P1_C_9_Prop2" name="P1_C_9_Prop" value="option2"> 2. Institución educativa?
											</label>
											<label>
												<input type="radio" id="P1_C_9_Prop3" name="P1_C_9_Prop" value="option3"> 3. Estado?
											</label>
											<label>
												<input type="radio" id="P1_C_9_Prop4" name="P1_C_9_Prop" value="option4">	4. Otro sector del estado?
											</label>
											<label>
												<input id="P1_C_9_Prop_O1" style="float:left; width:500px;" type="text" class="form-control"> (Especifique)
											</label>
											<label>
												<input type="radio" id="P1_C_9_Prop5" name="P1_C_9_Prop" value="option4">	5.Propiedad de terceros?
											</label>
											<label>
												<input id="P1_C_9_Prop_O2" style="float:left; width:500px;" type="text" class="form-control"> (Especifique)
											</label>


									</td>
								</tr>
								<tr>
									<td>10.</td>
									<td>
										<strong>¿El antecedente registral que tiene el predio es:</strong>
										<br />(Acepte sólo un código)
									</td>
									<td>
										<label>
												<input type="radio" id="P1_C_10_AntReg_Cod1" name="P1_C_10_AntReg_Cod" value="option1"> 1. Partida electrónica?
											</label>
											<label>
												<input type="radio" id="P1_C_10_AntReg_Cod2" name="P1_C_10_AntReg_Cod" value="option2"> 2. Código de predio?
											</label>
											<label>
												<input type="radio" id="P1_C_10_AntReg_Cod3" name="P1_C_10_AntReg_Cod" value="option3"> 3. Ficha?
											</label>
											<label>
												<input type="radio" id="P1_C_10_AntReg_Cod4" name="P1_C_10_AntReg_Cod" value="option4">	4. Tomo/Foja/Asiento?
											</label>
											<label>
												<input type="radio" id="P1_C_10_AntReg_Cod5" name="P1_C_10_AntReg_Cod" value="option4">	5. Ninguno?
											</label>
									</td>
								</tr>
								<tr>
									<td>11.</td>
									<td><strong>¿Cuál es el número del antecedente registral?</strong></td>
									<td>
										<label>N° de antecedente registral</label>
										<input id="P1_C_11_AntReg_Nro" style="float:left; width:200px;" type="text" class="form-control">
									</td>
								</tr>
								<tr>
									<td>12.</td>
									<td>
										<strong>¿El Título de propiedad no inscrito que tiene el predio es:</strong>
										<br />(Acepte sólo un código)
									</td>
									<td>
										<label>
												<input type="radio" id="P1_C_12_Tipo_TProp1" name="P1_C_12_Tipo_TProp" value="option1"> 1. Escritura pública?
											</label>
											<label>
												<input type="radio" id="P1_C_12_Tipo_TProp2" name="P1_C_12_Tipo_TProp" value="option2"> 2. Minuta de compra-venta?
											</label>
											<label>
												<input type="radio" id="P1_C_12_Tipo_TProp3" name="P1_C_12_Tipo_TProp" value="option3"> 3. Minuta de donación?
											</label>
											<label>
												<input type="radio" id="P1_C_12_Tipo_TProp4" name="P1_C_12_Tipo_TProp" value="option3"> 4. Minuta de cesión?
											</label>
											<label>
												<input type="radio" id="P1_C_12_Tipo_TProp5" name="P1_C_12_Tipo_TProp" value="option4">	5. Minuta de permuta?
											</label>
											<label>
												<input type="radio" id="P1_C_12_Tipo_TProp6" name="P1_C_12_Tipo_TProp" value="option4">	6. Aporte de reglamento?
											</label>
											<label>
												<input type="radio" id="P1_C_12_Tipo_TProp7" name="P1_C_12_Tipo_TProp" value="option4">	7. Resolución emitida por entidad del estado?
											</label>
											<label>
												<input type="radio" id="P1_C_12_Tipo_TProp8" name="P1_C_12_Tipo_TProp" value="option4">	8. Acta de donación de CC/CN?
											</label>
											<label>
												<input type="radio" id="P1_C_12_Tipo_TProp9" name="P1_C_12_Tipo_TProp" value="option4">	9. Otro?
											</label>

											<label>
												<input id="P1_C_12_Tipo_TProp_O" style="float:left; width:500px;" type="text" class="form-control"> (Especifique)
											</label>

											<label>
												<input type="radio" id="P1_C_12_Tipo_TProp10" name="P1_C_12_Tipo_TProp" value="option5">	10. Ninguno
											</label>
									</td>
								</tr>
								<tr>
									<td>13.</td>
									<td><strong>¿En qué fecha se emitió el título no inscrito?</strong></td>
									<td>
										<label>Fecha</label>
										<input id="P1_C_13_FecTit" style="float:left; width:100px;" type="text" class="form-control">
									</td>
								</tr>
								<tr>
									<td>14.</td>
									<td>
										<strong>¿El Documento de poseíón que tiene es:</strong>
										<br />(Acepte sólo un código)
									</td>
									<td>
										<label>
												<input type="radio" id="P1_C_14_DocPos1" name="P1_C_14_DocPos" value="option1"> 1. Constancia de posesion de Juez de Paz?
											</label>
											<label>
												<input type="radio" id="P1_C_14_DocPos2" name="P1_C_14_DocPos" value="option2"> 2. Constancia de posesion municipal?
											</label>
											<label>
												<input type="radio" id="P1_C_14_DocPos3" name="P1_C_14_DocPos" value="option3"> 3. Resolución municipal?
											</label>
											<label>
												<input type="radio" id="P1_C_14_DocPos4" name="P1_C_14_DocPos" value="option4">	4. Resolución de afectación en uso?
											</label>
											<label>
												<input type="radio" id="P1_C_14_DocPos5" name="P1_C_14_DocPos" value="option4">	5. Convenio con entidad estatal?
											</label>
											<label>
												<input type="radio" id="P1_C_14_DocPos6" name="P1_C_14_DocPos" value="option4">	6. Convenio con particulares?
											</label>
											<label>
												<input type="radio" id="P1_C_14_DocPos7" name="P1_C_14_DocPos" value="option4">	7. Contrato de arrendamiento?
											</label>
											<label>
												<input type="radio" id="P1_C_14_DocPos8" name="P1_C_14_DocPos" value="option4">	8. Contrato de servidumbre?
											</label>
											<label>
												<input type="radio" id="P1_C_14_DocPos9" name="P1_C_14_DocPos" value="option4">	9. Otro?
											</label>

											<label>
												<input id="P1_C_14_DocPos_O" style="float:left; width:500px;" type="text" class="form-control"> (Especifique)
											</label>

											<label>
												<input type="radio" id="P1_C_14_DocPos10" name="P1_C_14_DocPos" value="option5">	10. Ninguno
											</label>
									</td>
								</tr>
								<tr>
									<td>15.</td>
									<td><strong>¿En qué fecha se emitió el documento de posesión?</strong></td>
									<td>
										<label>Fecha</label>
										<input id="P1_C_15_DocPos_Fech" style="float:left; width:100px;" type="text" class="form-control">
									</td>
								</tr>
								<tr>
									<td>16.</td>
									<td><strong>¿Cuál es el area del terreno que ocupa el predio?</strong></td>
									<td>
										<label>Area en m2</label>
										<table class="table table-bordered">
											<tr>
												<th style="text-align:center;">Enteros</th>
												<th style="text-align:center;">Decimales</th>
											</tr>
											<tr>
												<td id="P1_C_16_At_Pred1"></td>
												<td id="P1_C_16_At_Pred2"></td>
											</tr>
										</table>
									</td>
								</tr>
								<tr>
									<td>17.</td>
									<td><strong>¿Cual es el area del terrreno que ocupa el local escolar?</strong></td>
									<td>
										<label>Area en m2</label>
										<table class="table table-bordered">
											<tr>
												<th style="text-align:center;">Enteros</th>
												<th style="text-align:center;">Decimales</th>
											</tr>
											<tr>
												<td id="P1_C_17_At_Local1"></td>
												<td id="P1_C_17_At_Local2"></td>
											</tr>
										</table>
									</td>
								</tr>
								<tr>
									<td>18.</td>
									<td><strong>¿El predio es compartido con otros locales escolares, otras instituciones o servicios?</strong></td>
									<td>
										<label class="checkbox-inline">
											<input type="radio" id="P1_C_18_Comp1" name="P1_C_18_Comp" value="option1"> 1. Si
										</label>
										<label class="checkbox-inline">
											<input type="radio" id="P1_C_18_Comp2" name="P1_C_18_Comp" value="option2"> 2. No
										</label>
									</td>
								</tr>
								<tr>
									<td>19.</td>
									<td><strong>¿Con cuántos locales escolares, otras instituciones o servicios comparten el predio?</strong></td>
									<td>
										<label>N°</label>
										<input id="P1_C_19_CompCan" style="width:200px;" type="text" class="form-control">
									</td>
								</tr>
								<tr>
									<td>20.</td>
									<td>
										<strong>¿Cuáles son los nombres de los locales escolares, otras instituciones o servicios con los que comparte el predio?</strong>
										<br />(Diligencie según respuesta en pregunta 18)
									</td>
									<td>
										<textarea id="P1_C_20_NombComp" style="width:300px; height:100px;"></textarea>
									</td>
								</tr>
							</table>

							<div class="panel">
								<label>Observaciones:</label>
								<textarea id="P1_C_Obs" style="width:870px; height:100px;"></textarea>
							</div>

						</div><!-- END SECCIOM C -->


					</div>
</div>