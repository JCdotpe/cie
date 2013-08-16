<div class="tab-pane active" id="general">
					<div class="content" id="content1">

						<div class="panel">
							<label>Codigo de Local Escolar</label>
							<input style="width:300px;" type="text" class="form-control codigo_local">
						</div>

						<div class="panel panel-info">
							<div class="panel-heading">
								<h4 class="panel-title">Sección A: Ubicación Geográfica del local escolar</h4>
							</div>


								<ul class="list-group">
									<li class="list-group-item"><div style="width:150px; margin-left:10px; float:left;">1. Departamento </div> <input style="width:300px;" type="text" class="form-control departamento"></li>
									<li class="list-group-item"><div style="width:150px; margin-left:10px; float:left;">2. Provincia </div> <input style="width:300px;" type="text" class="form-control provincia"></li>
									<li class="list-group-item"><div style="width:150px; margin-left:10px; float:left;">3. Distrito </div> <input style="width:300px;" type="text" class="form-control distrito"></li>
									<li class="list-group-item"><div style="width:150px; margin-left:10px; float:left;">4. Centro Poblado </div> <input style="width:300px;" type="text" class="form-control PC_A_1_CentroP"></li>
									<li class="list-group-item"><div style="width:150px; margin-left:10px; float:left;">5. Nucleo Urbano </div> <input style="width:300px;" type="text" class="form-control PC_A_5_NucleoUrb"></li>
									<li class="list-group-item"><div style="width:150px; margin-left:10px; float:left;">6. UGEL </div> <input style="width:300px;" type="text" class="form-control ugel"></li>
								</ul>

						</div>

						<div class="panel">
									<div class="panel-heading">7. Dirección del local escolar (Para tipo de via circule solo un codigo)</div>

								  	<label class="checkbox-inline">
										<input type="radio" name="check" id="avenida1" value="option1"> 1. Avenida
									</label>

									<label class="checkbox-inline">
										<input type="radio" name="check" id="jiron1" value="option2"> 2. Jiron
									</label>

									<label class="checkbox-inline">
										<input type="radio" name="check" id="calle1" value="option3"> 3. Calle
									</label>

									<label class="checkbox-inline">
										<input type="radio" name="check" id="pasaje1" value="option4"> 4. Pasaje
									</label>

									<label class="checkbox-inline">
										<input type="radio" name="check" id="carretera1" value="option5"> 5. Carretera
									</label>

									<label class="checkbox-inline">
										<input type="radio" name="check" id="autopista1" value="option6"> 6. Autopista
									</label>

									<label class="checkbox-inline">
										<input type="radio" name="check" id="otro1" value="option7"> 7. Otro
									</label>

						</div>

						<table class="table table-bordered">
							<thead>

								<tr>
									<th>Nombre de la via</th>
									<th>N° de Puerta</th>
									<th>Piso</th>
									<th>Mz.</th>
									<th>Lote</th>
									<th>Sector</th>
									<th>Zona</th>
									<th>Etapa</th>
									<th>Km</th>
								</tr>

							</thead>
							<tbody>

								<tr>
									<td id="PC_A_7Dir_2_Nomb"></td>
									<td id="PC_A_7Dir_3_Nro"></td>
									<td id="PC_A_7Dir_4_Piso"></td>
									<td id="PC_A_7Dir_5_Mz"></td>
									<td id="PC_A_7Dir_6_Lt"></td>
									<td id="PC_A_7Dir_7_Sect"></td>
									<td id="PC_A_7Dir_8_Zona"></td>
									<td id="PC_A_7Dir_9_Et"></td>
									<td id="PC_A_7Dir_10_Km"></td>
								</tr>

							</tbody>
						</table>

						<ul class="list-group">
							<li class="list-group-item">
								8. La dirección del colegio del local escolar del DOC.CIE.03.06
								<label class="checkbox-inline">
									<input type="radio" id="verif1" name="radio" value="option1"> 1. Si
								</label>
								<label class="checkbox-inline">
									<input type="radio" id="verif2" name="radio" value="option2"> 2. No
								</label>
							</li>
							<li class="list-group-item">
								9. Referencia de la dirección del local escolar
								<input type="text" id="PC_A_9_RefDir" class="form-control">
							</li>
						</ul>

						<div class="panel panel-info">
							<div class="panel-heading">
								<h5 class="panel-title">Sección B: Identificación del local escolar</h5>
							</div>

							<h6>Evaluador Tecnico</h6>

							<ul class="list-group">
								<li class="list-group-item">1. Transcriba el codigo del local DOC.CIE.03.06 <input type="text" class="PC_B_1_CodLocal" class="form-control"></li>
								<li class="list-group-item">2. Cuantos códigos de local escolar registrados en el DOC.CIE.03.06 se evaluaran en esta cedula censal <input id="PC_B_2_CantEv" type="text" class="form-control"></li>
							</ul>

						</div>

						<div class="panel panel-info" style="height:500px;">
							<div class="panel-heading">
								<h5 class="panel-title">Sección C: Entrevista y Supervision</h5>
							</div>

							<h6>1. Evaluación y Supervisión</h6>

							<table class="table table-bordered">
								<thead>

									<tr>
										<th rowspan="3" style="text-align:center;vertical-align:middle;">Visitas</th>

										<th colspan="6" style="text-align:center;">Evaluador Técnico</th>
										<!-- <th>Piso</th> -->
										<!-- <th>Mz.</th>
										<th>Lote</th>
										<th>Sector</th>
										<th>Zona</th> -->
										<th colspan="4" style="text-align:center;">Jefe de Brigada</th>
									</tr>
									<tr>

										<th rowspan="2" style="text-align:center;vertical-align:middle;">Fecha</th>
										<th colspan="2" style="text-align:center;">Hora</th>
										<th colspan="2" style="text-align:center;">Próxima Visita</th>
										<th rowspan="2" style="text-align:center;vertical-align:middle;">Resultado de la visita (*)</th>
										<th rowspan="2" style="text-align:center;vertical-align:middle;">Fecha</th>
										<th colspan="2" style="text-align:center;">Hora</th>
										<th rowspan="2" style="text-align:center;vertical-align:middle;">Resultado de la visita (*)</th>


									</tr>

									<tr>

										<th style="text-align:center;">De</th>
										<th style="text-align:center;">A</th>
										<th style="text-align:center;">Fecha</th>
										<th style="text-align:center;">Hora</th>
										<th style="text-align:center;">De</th>
										<th style="text-align:center;">A</th>

									</tr>

								</thead>
								<tbody id="eva_solu1">

									<!--AJAX-->

								</tbody>
							</table>

							<table class="table table-bordered" style="width:300px; float:left;">
								<thead>
									<tr>
										<th colspan="2">2.Resultado final de la evaluacion tecnica</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td>Fecha: </td>
										<td id="PC_C_2_Rfinal_fecha"></td>
									</tr>
									<tr>
										<td>Resultado: </td>
										<td id="PC_C_2_Rfinal_resul"></td>
									</tr>
								</tbody>
							</table>

							<table class="table table-bordered" style="width:600px; margin-left:10px; float:left;">
								<thead>
									<tr>
										<th colspan="2" style="text-align:center;">(*) Codigos de Resultado</th>
									</tr>
								</thead>
								<tbody>
									<td>
										<ul>
											<li>1.Completa</li>
											<li>2.Rechazo</li>
											<li>3.Incompleta</li>
											<li>4.Local cerrado/desocupado</li>
										</ul>
									</td>
									<td>5.Otro <!-- <textarea id="PC_C_2_Rfinal_resul_O" class="form-control" rows="3"></textarea> --></td>
								</tbody>
							</table>

						</div>

						<div class="panel panel-info">
							<div class="panel-heading">
								<h5 class="panel-title">Sección D: Funcionarios de la evaluacion técnica</h5>
							</div>

							<table class="table table-bordered">
								<thead>
									<tr>
										<th style="text-align:center;">Cargo</th>
										<th style="text-align:center;">DNI</th>
										<th style="text-align:center;">Nombres y Apellidos</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td>Evaluador Técnico</td>
										<td id="PC_D_EvT_dni"></td>
										<td id="PC_D_EvT_Nomb"></td>
									</tr>

									<tr>
										<td>Jefe de Brigada</td>
										<td id="PC_D_JBri_dni"></td>
										<td id="PC_D_JBri_Nomb"></td>
									</tr>

									<tr>
										<td>Coordinador Provincial</td>
										<td id="PC_D_CProv_dni"></td>
										<td id="PC_D_CProv_Nomb"></td>
									</tr>

									<tr>
										<td>Coordinador Departamental</td>
										<td id="PC_D_CDep_dni"></td>
										<td id="PC_D_CDep_Nomb"></td>
									</tr>

									<tr>
										<td>Supervisor Nacional</td>
										<td id="PC_D_SupN_dni"></td>
										<td id="PC_D_SupN_Nomb"></td>
									</tr>

								</tbody>
							</table>

						</div>

						<div class="panel panel-info" style="float:left;width:600px;height:160px;">
							<div class="panel-heading">
								<h5 class="panel-title">Sección E: Resumen</h5>
							</div>

							<table class="table table-bordered">
								<thead>
									<tr>
										<th style="text-align:center;">1.Total de predios</th>
										<th style="text-align:center;">2.Total de predios no colindantes</th>
										<th style="text-align:center;">3.Total de edificaciones</th>
										<th style="text-align:center;">4.Total de patios</th>
										<th style="text-align:center;">5.Total de lozas deportivas</th>
										<th style="text-align:center;">6.Total de cisternas - Tanques elevados</th>
										<th style="text-align:center;">7.Total de Muros de contencion</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td id="PC_E_1_TPred"></td>
										<td id="PC_E_2_TPred_NoCol"></td>
										<td id="PC_E_3_TEdif"></td>
										<td id="PC_E_4_TPat"></td>
										<td id="PC_E_5_TLosa"></td>
										<td id="PC_E_6_TCist"></td>
										<td id="PC_E_7_TMurCon"></td>
									</tr>
								</tbody>
							</table>

						</div>

						<div class="panel panel-info" style="float:left;width:260px; margin-left:10px;height:160px;">
							<div class="panel-heading">
								<h5 class="panel-title">Sección F: Predio NO Colindante</h5>
							</div>

							<table class="table table-bordered">
								<tr>
									<th rowspan="2">(Diligencia sólo en el caso de predio No Colindante)</th>
									<th>N° de Predio</th>
								</tr>
								<tr>
									<td id="PC_F_1"></td>
								</tr>
							</table>

						</div>
						<!-- End Secciones -->
					</div>
				</div>

				<div class="tab-pane" id="cap1">
					<div class="content" id="content2">

						<div class="panel panel-info">
							<div class="panel-heading">
								<h5 class="panel-title">Capitulo I Identificación de las instituciones eductivas, predios y anexos del local escolar</h5>
							</div>

							<table class="table table-bordered">
								<thead>
									<th colspan="2">Sección A: Instituciones educativas</th>
								</thead>
								<tbody>
									<td><strong>1.¿Cuantas instituciones educativas prestan servicio en este local escolar?</strong></td>
									<td>N° de instituciones educativas <input id="nie2" style="width:40px;" type="text" class="form-control"></td>
								</tbody>
							</table>

							<div id="inst_educa">
								<!--AJAX-->
							</div>

					</div><!-- END PANEL PRINCIPAL-->

						<div class="panel panel-info">

							<!-- PANEL SECCION B N PREDIOS-->

							<div class="panel-heading">
								<h5 class="panel-title">Sección B: Predio o predios ocupados por el local escolar</h5>
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
											<input style="width:300px;" type="text" class="form-control">
										</td>
									</tr>
								</tbody>
							</table>

							<div class="panel">
								Visualizar Predios
								<div class="btn-toolbar">
									 <div class="btn-group">
									    <a class="btn" href="#"><i class="icon-fast-backward"></i></a>
									    <a class="btn" href="#"><i class="icon-backward"></i></a>
									    <a class="btn" href="#"><i class="icon-th"></i>Total: <span id="tpredio">5</span></a>
									    <a class="btn" href="#"><i class="icon-time"></i>Actual: <span id="apredio">5</span></a>
									    icon-time
									    <a class="btn" href="#"><i class="icon-forward"></i></a>
									    <a class="btn" href="#"><i class="icon-fast-forward"></i></a>
									  </div>
								</div>

							</div>

							<table class="table table-bordered">
								<thead>
									<tr>
										<th colspan="2">
											<label style="float:left;">Predio N°</label>
										</th>
										<th>
											<input style="float:left; width:300px;" type="text" class="form-control">
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
											<input style="float:left; width:300px;" type="text" class="form-control"><br />
											<label class="checkbox-inline">
												<input type="radio" id="Checkbox1" name="check" value="option1"> 1. No tiene constancia
											</label>

											<label class="checkbox-inline">
												<input type="radio" id="Checkbox2" name="check" value="option2"> 2. No sabe
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
												<input type="radio" id="Checkbox1" name="check" value="option1"> 1. Ministerio de Educación
											</label>
											<label>
												<input type="radio" id="Checkbox2" name="check" value="option2"> 2. Institucion educativa
											</label>
											<label>
												<input type="radio" id="Checkbox1" name="check" value="option3"> 3. Estado
											</label>
											<label>
												<input type="radio" id="Checkbox1" name="check" value="option4">
												4. Otro sector del estado
											</label>
											<label>
												<input style="float:left; width:300px;" type="text" class="form-control">
												(Especifique)
											</label>

											<label>
												<input type="radio" id="Checkbox1" name="check" value="option5">
												5. Propiedad de terceros
											</label>
											<label>
												<input style="float:left; width:300px;" type="text" class="form-control">
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
												<input type="radio" id="Checkbox1" name="check" value="option1"> 1. Partida electrónica?
											</label>
											<label>
												<input type="radio" id="Checkbox2" name="check" value="option2"> 2. Código de predio?
											</label>
											<label>
												<input type="radio" id="Checkbox1" name="check" value="option3"> 3. Ficha?
											</label>
											<label>
												<input type="radio" id="Checkbox1" name="check" value="option4"> 4. Tomo/Foja/Asiento?
											</label>
											<label>
												<input type="radio" id="Checkbox1" name="check" value="option5"> 5. Ninguno?
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
											<input style="float:left; width:300px;" type="text" class="form-control"><br />
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
												<input type="radio" id="Checkbox1" name="check" value="option1"> 1. Escritura pública?
											</label>
											<label>
												<input type="radio" id="Checkbox2" name="check" value="option2"> 2. Minuta de compra-venta?
											</label>
											<label>
												<input type="radio" id="Checkbox1" name="check" value="option3"> 3. Minuta de donación?
											</label>
											<label>
												<input type="radio" id="Checkbox1" name="check" value="option4">	4. Minuta de cesión?
											</label>
											<label>
												<input type="radio" id="Checkbox1" name="check" value="option4">	5. Minuta de permuta?
											</label>
											<label>
												<input type="radio" id="Checkbox1" name="check" value="option4">	6. Aporte reglamentario?
											</label>
											<label>
												<input type="radio" id="Checkbox1" name="check" value="option4">	7. Resolución emitida por  entidad del estado?
											</label>
											<label>
												<input type="radio" id="Checkbox1" name="check" value="option4">	8. Acta de donación de CC/CN?
											</label>
											<label>
												<input type="radio" id="Checkbox1" name="check" value="option4">	9. Otro?
											</label>

											<label>
												<input style="float:left; width:300px;" type="text" class="form-control"> (Especifique)
											</label>

											<label>
												<input type="radio" id="Checkbox1" name="check" value="option5">	10. Ninguno
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
											<input style="float:left; width:100px;" type="text" class="form-control"><br />
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
												<input type="radio" id="Checkbox1" name="check" value="option1"> 1. Constancia de posesion de Juez de Paz?
											</label>
											<label>
												<input type="radio" id="Checkbox2" name="check" value="option2"> 2. Constancia de posesion municipal?
											</label>
											<label>
												<input type="radio" id="Checkbox1" name="check" value="option3"> 3. Resolución municipal?
											</label>
											<label>
												<input type="radio" id="Checkbox1" name="check" value="option4">	4. Resolución de afectación en uso?
											</label>
											<label>
												<input type="radio" id="Checkbox1" name="check" value="option4">	5. Convenio con entidad estatal?
											</label>
											<label>
												<input type="radio" id="Checkbox1" name="check" value="option4">	6. Convenio con particulares?
											</label>
											<label>
												<input type="radio" id="Checkbox1" name="check" value="option4">	7. Contrato de arrendamiento?
											</label>
											<label>
												<input type="radio" id="Checkbox1" name="check" value="option4">	8. Contrato de servidumbre?
											</label>
											<label>
												<input type="radio" id="Checkbox1" name="check" value="option4">	9. Otro?
											</label>

											<label>
												<input style="float:left; width:300px;" type="text" class="form-control"> (Especifique)
											</label>

											<label>
												<input type="radio" id="Checkbox1" name="check" value="option5">	10. Ninguno
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
											<input style="float:left; width:100px;" type="text" class="form-control">
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
													<th style="text-align:center;">Enteros</th>
													<th style="text-align:center;">Decimales</th>
												</tr>
												<tr>
													<td></td>
													<td></td>
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
													<td></td>
													<td></td>
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
												<input type="radio" id="Checkbox1" name="check" value="option1"> 1. Si
											</label>

											<label class="checkbox-inline">
												<input type="radio" id="Checkbox2" name="check" value="option2"> 2. No
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
											<input style="float:left; width:100px;" type="text" class="form-control">
										</td>
									</tr>
									<tr>
										<td style="text-align:center;">3.12</td>
										<td>
											<strong>¿cuáles son los nombres de los locales escolares, otras instituciones o servicios con los que comparte el predio?</strong><br />
											(Diligencie, según respuesta en pregunta 3.11)
										</td>
										<td>
											<textarea style="width:300px; height:100px;"></textarea>
										</td>
									</tr>
								</tbody>
							</table>

							<div class="panel">
								<label>Observaciones:</label>
								<textarea style="width:870px; height:100px;"></textarea>
							</div>

						</div><!-- END PANEL SECCION B-->

						<div class="panel panel-info"><!-- PANEL SECCION C N ANEXOS-->
							<div class="panel-heading">
								<h5 class="panel-title">Sección C: Anexos de la institución educativa</h5>
							</div>

							<div class="panel">
								Evaluador: Diligencie esta sección sólo si en la columna (f) de la pregunta 2.9 Sección A, declaro tener 1 o mas anexos
							</div>

							<div class="panel">
								Visualizar Anexos
								<div class="btn-toolbar">
									 <div class="btn-group">
									    <a class="btn" href="#"><i class="icon-fast-backward"></i></a>
									    <a class="btn" href="#"><i class="icon-backward"></i></a>
									    <a class="btn" href="#"><i class="icon-th"></i>Total: <span id="tanexo">5</span></a>
									    <a class="btn" href="#"><i class="icon-time"></i>Actual: <span id="aanexo">1</span></a>
									    <a class="btn" href="#"><i class="icon-forward"></i></a>
									    <a class="btn" href="#"><i class="icon-fast-forward"></i></a>
									  </div>
								</div>
							</div>

							<div class="panel" style="height:100px;">
								<div class="panel" style="float:left; margin-left:150px;">
									<label>Número de Anexo</label>
									<input style="float:left; width:200px;" type="text" class="form-control">
								</div>
								<div class="panel" style="float:left; margin-left:150px;">
									<label>Codigo Modular</label>
									<input style="float:left; width:200px;" type="text" class="form-control">
								</div>
							</div>

							<div class="panel">
								<div class="panel">
									<strong>1. ¿Cuál es el código del local escolar del anexo? </strong>
									<input style="width:200px;" type="text" class="form-control">
								</div>

								<ul class="list-group">
									<li class="list-group-item"><div style="width:150px; margin-left:10px; float:left;"><strong>2. Provincia</strong></div> <input style="width:300px;" type="text" class="form-control"></li>
									<li class="list-group-item"><div style="width:150px; margin-left:10px; float:left;"><strong>3. Distrito</strong></div> <input style="width:300px;" type="text" class="form-control"></li>
									<li class="list-group-item"><div style="width:150px; margin-left:10px; float:left;"><strong>4. Centro Poblado</strong> </div> <input style="width:300px;" type="text" class="form-control"></li>
									<li class="list-group-item"><div style="width:150px; margin-left:10px; float:left;"><strong>5. Nucleo Urbano</strong> </div> <input style="width:300px;" type="text" class="form-control"></li>
									<li class="list-group-item" style="height:100px;">
										<div style=" width:120px; margin-left:10px; margin-right:10px; float:left;"><strong>6. Dirección del local escolar</strong><br /> (Para tipo de via circule sólo un código)</div>

											<div style="width:680px; margin-left:10px; margin-right:10px; float:left;">

												<label class="checkbox-inline"><strong>Tipo de Via: </strong></label>

												<div class="panel">

													<label class="checkbox-inline">
														<input type="radio" id="Checkbox1" name="check" value="option1"> 1. Avenida
													</label>
													<label class="checkbox-inline">
														<input type="radio" id="Checkbox2" name="check" value="option2"> 2. Jirón
													</label>
													<label class="checkbox-inline">
														<input type="radio" id="Checkbox2" name="check" value="option2"> 3. Calle
													</label>
													<label class="checkbox-inline">
														<input type="radio" id="Checkbox2" name="check" value="option2"> 4. Pasaje
													</label>
													<label class="checkbox-inline">
														<input type="radio" id="Checkbox2" name="check" value="option2"> 5. Carretera
													</label>
													<label class="checkbox-inline">
														<input type="radio" id="Checkbox2" name="check" value="option2"> 6. Autopista
													</label>
													<label class="checkbox-inline">
														<input type="radio" id="Checkbox2" name="check" value="option2"> 7. Otro
													</label>
												</div>

											<div>

									</li>
								</ul>

								<table class="table table-bordered" style="margin-top:20px;">
									<thead>
										<tr>
											<th style="text-align:center;">Nombre de via</th>
											<th style="text-align:center;">N° de puerta</th>
											<th style="text-align:center;">Piso</th>
											<th style="text-align:center;">Mz.</th>
											<th style="text-align:center;">Lote</th>
											<th style="text-align:center;">Sector</th>
											<th style="text-align:center;">Zona</th>
											<th style="text-align:center;">Etapa</th>
											<th style="text-align:center;">Km.</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td style="text-align:center;"></td>
											<td style="text-align:center;"></td>
											<td style="text-align:center;"></td>
											<td style="text-align:center;"></td>
											<td style="text-align:center;"></td>
											<td style="text-align:center;"></td>
											<td style="text-align:center;"></td>
											<td style="text-align:center;"></td>
											<td style="text-align:center;"></td>
										</tr>
									</tbody>
								</table>

								<div class="panel">
									<strong>7. Referencia de la dirección del anexo del local escolar: </strong>
									<input style="width:840px;" type="text" class="form-control">
								</div>

							</div><!--END PANEL -->

							<table class="table table-bordered" style="margin-top:20px;">
								<tr>
									<td>8.</td>
									<td><strong>¿Cuál es el código del inmueble del anexo 01?</strong><br />
										(Este código se encuentra en la constancia MARGESI)</td>
									<td>
										<input style="float:left; width:500px;" type="text" class="form-control"><br />
											<label class="checkbox-inline">
												<input type="radio" id="Checkbox1" name="check" value="option1"> 1. No tiene constancia
											</label>

											<label class="checkbox-inline">
												<input type="radio" id="Checkbox2" name="check" value="option2"> 2. No sabe
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
												<input type="radio" id="Checkbox1" name="check" value="option1"> 1. Ministerio de educación?
											</label>
											<label>
												<input type="radio" id="Checkbox2" name="check" value="option2"> 2. Institución educativa?
											</label>
											<label>
												<input type="radio" id="Checkbox1" name="check" value="option3"> 3. Estado?
											</label>
											<label>
												<input type="radio" id="Checkbox1" name="check" value="option4">	4. Otro sector del estado?
											</label>
											<label>
												<input style="float:left; width:500px;" type="text" class="form-control"> (Especifique)
											</label>
											<label>
												<input type="radio" id="Checkbox1" name="check" value="option4">	5.Propiedad de terceros?
											</label>
											<label>
												<input style="float:left; width:500px;" type="text" class="form-control"> (Especifique)
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
												<input type="radio" id="Checkbox1" name="check" value="option1"> 1. Partida electrónica?
											</label>
											<label>
												<input type="radio" id="Checkbox2" name="check" value="option2"> 2. Código de predio?
											</label>
											<label>
												<input type="radio" id="Checkbox1" name="check" value="option3"> 3. Ficha?
											</label>
											<label>
												<input type="radio" id="Checkbox1" name="check" value="option4">	4. Tomo/Foja/Asiento?
											</label>
											<label>
												<input type="radio" id="Checkbox1" name="check" value="option4">	5. Ninguno?
											</label>
									</td>
								</tr>
								<tr>
									<td>11.</td>
									<td><strong>¿Cuál es el número del antecedente registral?</strong></td>
									<td>
										<label>N° de antecedente registral</label>
										<input style="float:left; width:200px;" type="text" class="form-control">
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
												<input type="radio" id="Checkbox1" name="check" value="option1"> 1. Escritura pública?
											</label>
											<label>
												<input type="radio" id="Checkbox2" name="check" value="option2"> 2. Minuta de compra-venta?
											</label>
											<label>
												<input type="radio" id="Checkbox1" name="check" value="option3"> 3. Minuta de donación?
											</label>
											<label>
												<input type="radio" id="Checkbox1" name="check" value="option3"> 4. Minuta de cesión?
											</label>
											<label>
												<input type="radio" id="Checkbox1" name="check" value="option4">	5. Minuta de permuta?
											</label>
											<label>
												<input type="radio" id="Checkbox1" name="check" value="option4">	6. Aporte de reglamento?
											</label>
											<label>
												<input type="radio" id="Checkbox1" name="check" value="option4">	7. Resolución emitida por entidad del estado?
											</label>
											<label>
												<input type="radio" id="Checkbox1" name="check" value="option4">	8. Acta de donación de CC/CN?
											</label>
											<label>
												<input type="radio" id="Checkbox1" name="check" value="option4">	9. Otro?
											</label>

											<label>
												<input style="float:left; width:500px;" type="text" class="form-control"> (Especifique)
											</label>

											<label>
												<input type="radio" id="Checkbox1" name="check" value="option5">	10. Ninguno
											</label>
									</td>
								</tr>
								<tr>
									<td>13.</td>
									<td><strong>¿En qué fecha se emitió el título no inscrito?</strong></td>
									<td>
										<label>Fecha</label>
										<input style="float:left; width:100px;" type="text" class="form-control">
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
												<input type="radio" id="Checkbox1" name="check" value="option1"> 1. Constancia de posesion de Juez de Paz?
											</label>
											<label>
												<input type="radio" id="Checkbox2" name="check" value="option2"> 2. Constancia de posesion municipal?
											</label>
											<label>
												<input type="radio" id="Checkbox1" name="check" value="option3"> 3. Resolución municipal?
											</label>
											<label>
												<input type="radio" id="Checkbox1" name="check" value="option4">	4. Resolución de afectación en uso?
											</label>
											<label>
												<input type="radio" id="Checkbox1" name="check" value="option4">	5. Convenio con entidad estatal?
											</label>
											<label>
												<input type="radio" id="Checkbox1" name="check" value="option4">	6. Convenio con particulares?
											</label>
											<label>
												<input type="radio" id="Checkbox1" name="check" value="option4">	7. Contrato de arrendamiento?
											</label>
											<label>
												<input type="radio" id="Checkbox1" name="check" value="option4">	8. Contrato de servidumbre?
											</label>
											<label>
												<input type="radio" id="Checkbox1" name="check" value="option4">	9. Otro?
											</label>

											<label>
												<input style="float:left; width:500px;" type="text" class="form-control"> (Especifique)
											</label>

											<label>
												<input type="radio" id="Checkbox1" name="check" value="option5">	10. Ninguno
											</label>
									</td>
								</tr>
								<tr>
									<td>15.</td>
									<td><strong>¿En qué fecha se emitió el documento de posesión?</strong></td>
									<td>
										<label>Fecha</label>
										<input style="float:left; width:100px;" type="text" class="form-control">
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
												<td></td>
												<td></td>
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
												<td></td>
												<td></td>
											</tr>
										</table>
									</td>
								</tr>
								<tr>
									<td>18.</td>
									<td><strong>¿Con cuantos locales escolares, otras instituciones o servicios comparten el predio?</strong></td>
									<td>
										<label class="checkbox-inline">
											<input type="radio" id="Checkbox1" name="radio" value="option1"> 1. Si
										</label>
										<label class="checkbox-inline">
											<input type="radio" id="Checkbox2" name="radio" value="option2"> 2. No
										</label>
									</td>
								</tr>
								<tr>
									<td>19.</td>
									<td><strong>¿Cuáles son los nombres de los locales escolares, otras instituciones o servicios con los que comparte el predio?</strong></td>
									<td>
										<label>N°</label>
										<input style="width:200px;" type="text" class="form-control">
									</td>
								</tr>
								<tr>
									<td>20.</td>
									<td>
										<strong>¿Cuáles son los nombres de los locales escolares, otras instituciones o servicios con los que comparte el predio?</strong>
										<br />(Diligencie según respuesta en pregunta 18)
									</td>
									<td>
										<textarea style="width:300px; height:100px;"></textarea>
									</td>
								</tr>
							</table>

							<div class="panel">
								<label>Observaciones:</label>
								<textarea style="width:870px; height:100px;"></textarea>
							</div>

						</div><!-- END SECCIOM C -->


					</div>
				</div>


	  	    	<div class="tab-pane" id="cap2">
	  	    		<div class="content" id="content3">
	  	    			<div class="panel panel-info">
							<div class="panel-heading">
								<h5 class="panel-title">Capitulo II. Caracteristicas del clima y terreno - Servicios y obras en ejecución</h5>
							</div>

							<table class="table table-bordered">
									<thead>
										<tr>
											<th colspan="3">
												<h6>Sección A: Caracteristica climatica local</h6>
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
												<h6>Sección B: Condición del terreno y acceso</h6>
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
										<th colspan="4" style="text-align:center;">Sección C: Servicios basicos y comunicaciones</th>
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
										<th colspan="3">Sección D: Conexión de los servicios basicos del local escolar</th>
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
												<input style="width:100px;" type="text" class="form-control">
											</div>
										</td>
									</tr>
									<tr>
										<td>3.</td>
										<td><strong>¿Cuáles son los números de suministros eléctricos con que cuenta este local escolar?</strong>
											<br />(diligencie, según respuesta en pregunta 2)
										</td>
										<td>
											<table class="table table-bordered">
												<tr>
													<td style="text-align:center"><strong>Suministro N°</strong></td>
												</tr>
												<tr>
													<th style="text-align:center">1</th>
													<td><input style="width:250px;" type="text" class="form-control"></td>
													<td style="text-align:center">1</td>
												</tr>
												<tr>
													<th style="text-align:center">2</th>
													<td><input style="width:250px;" type="text" class="form-control"></td>
													<td style="text-align:center">2</td>
												</tr>
												<tr>
													<th style="text-align:center">3</th>
													<td><input style="width:250px;" type="text" class="form-control"></td>
													<td style="text-align:center">3</td>
												</tr>
											</table>
											<div class="panel" style="text-align:center">
												(1) No tiene documento de referencia
											</div>
										</td>
									</tr>
									<tr>
										<td>4.</td>
										<td><strong>¿Cuál es el nombre de la empresa que suministra el servicio eléctrico?</strong></td>
										<td><input style="width:400px;" type="text" class="form-control"></td>
									</tr>
									<tr>
										<td>5.</td>
										<td><strong>El abastecimiento de agua, ¿procede de:</strong>
											<br />(Acepte uno o más códigos)
										</td>
										<td>
											<label>
												<input type="checkbox" id="Checkbox1" name="check" value="option1"> 1. Red pública?
											</label>
											<label>
												<input type="checkbox" id="Checkbox2" name="check" value="option2"> 2. Pilón de uso público (agua potable)?
											</label>
											<label>
												<input type="checkbox" id="Checkbox1" name="check" value="option1"> 3. Camión cisterna u otro similar?
											</label>
											<label>
												<input type="checkbox" id="Checkbox2" name="check" value="option2"> 4. Pozo?
											</label>
											<label>
												<input type="checkbox" id="Checkbox1" name="check" value="option1"> 5. Río, acequia, manantial o similar?
											</label>
											<label>
												<input type="checkbox" id="Checkbox2" name="check" value="option2"> 6. Otro?
											</label>
											<label>(Especifique)</label>
											<input style="width:400px;" type="text" class="form-control">
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
												<input style="width:100px;" type="text" class="form-control">
											</div>
										</td>
									</tr>
									<tr>
										<td>7.</td>
										<td><strong>¿Cuáles son los números de suministros de agua con que cuenta el local escolar?</strong>
											<br />(diligencie, según respuesta en pregunta 6)
										</td>
										<td>
											<table class="table table-bordered">
												<tr>
													<td style="text-align:center"><strong>Suministro N°</strong></td>
												</tr>
												<tr>
													<th style="text-align:center">1</th>
													<td><input style="width:250px;" type="text" class="form-control"></td>
													<td style="text-align:center">1</td>
												</tr>
												<tr>
													<th style="text-align:center">2</th>
													<td><input style="width:250px;" type="text" class="form-control"></td>
													<td style="text-align:center">2</td>
												</tr>
												<tr>
													<th style="text-align:center">3</th>
													<td><input style="width:250px;" type="text" class="form-control"></td>
													<td style="text-align:center">3</td>
												</tr>
											</table>
											<div class="panel" style="text-align:center">
												(1) No tiene documento de referencia
											</div>
										</td>
									</tr>
									<tr>
										<td>8.</td>
										<td><strong>¿Cuál es el nombre de la empresa que suministra el servicio de agua?</strong></td>
										<td><input style="width:400px;" type="text" class="form-control"></td>
									</tr>
									<tr>
										<td>9.</td>
										<td><strong>¿el desagüe del local escolar está conectado a:</strong>
											<br />(Acepte solo un código)
										</td>
										<td>
											<label>
												<input type="checkbox" id="Checkbox1" name="check" value="option1"> 1. Red pública?
											</label>
											<label>
												<input type="checkbox" id="Checkbox2" name="check" value="option2"> 2. Tanque séptico y pozo percolador?
											</label>
											<label>
												<input type="checkbox" id="Checkbox1" name="check" value="option1"> 3. Pozo con tratamiento (cal, ceniza y otro)?
											</label>
											<label>
												<input type="checkbox" id="Checkbox2" name="check" value="option2"> 4. Pozo sin tratamiento alguno?
											</label>
											<label>
												<input type="checkbox" id="Checkbox1" name="check" value="option1"> 5. Río, acequia, manantial o canal?
											</label>
											<label>
												<input type="checkbox" id="Checkbox2" name="check" value="option2"> 6. Zanja filtrante?
											</label>
											<label>
												<input type="checkbox" id="Checkbox2" name="check" value="option2"> 7. No tiene
											</label>
										</td>
									</tr>

								</tbody>
							</table>

							<table class="table table-bordered">
								<thead>
									<tr>
										<th colspan="3">Sección E:  Pararrayos – Descargadores o Discipadores de sobretensiones</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td>1.</td>
										<td><strong>¿El local escolar, cuenta con pararrayos?</strong></td>
										<td>
											<label>
												<input type="radio" id="Checkbox1" name="check" value="option1"> 1. Si?
											</label>
											<label>
												<input type="radio" id="Checkbox2" name="check" value="option2"> 2. No?
											</label>
										</td>
									</tr>
									<tr>
										<td>2.</td>
										<td><strong>¿Con cuántas puestas a tierra cuenta el pararrayos?</strong></td>
										<td>
											<div class="panel">
												<label>Cantidad</label>
												<input style="width:100px;" type="text" class="form-control">
											</div>
										</td>
									</tr>
									<tr>
										<td>3.</td>
										<td><strong>¿En que año se hizo el último mantenimiento al sistema de puesta a tierra?</strong></td>
										<td>
											<div class="panel">
												<label>Año</label>
												<input style="width:100px;" type="text" class="form-control">
											</div>
										</td>
									</tr>

								</tbody>
							</table>

							<table class="table table-bordered">
								<thead>
									<tr>
										<th>Sección F:  Eliminación de basura</th>
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
													<input type="checkbox" id="Checkbox1" name="check" value="option1"> 1. Arrojada al camión/triciclo municipal?
												</label>
												<label>
													<input type="checkbox" id="Checkbox2" name="check" value="option2"> 2. Arrojada al camión/informal?
												</label>
												<label>
													<input type="checkbox" id="Checkbox1" name="check" value="option1"> 3. Depositada en contenedor?
												</label>
												<label>
													<input type="checkbox" id="Checkbox2" name="check" value="option2"> 4. Acumulada en calles/campo abierto?
												</label>
												<label>
													<input type="checkbox" id="Checkbox1" name="check" value="option1"> 5. Reciclada?
												</label>
												<label>
													<input type="checkbox" id="Checkbox2" name="check" value="option2"> 6. Quemada?
												</label>
												<label>
													<input type="checkbox" id="Checkbox1" name="check" value="option1"> 7. Enterrada?
												</label>
												<label>
													<input type="checkbox" id="Checkbox2" name="check" value="option2"> 8. Usada como alimento para animales?
												</label>
												<label>
													<input type="checkbox" id="Checkbox1" name="check" value="option1"> 9. Separada para el compost?
												</label>
												<label>
													<input type="checkbox" id="Checkbox1" name="check" value="option1"> 10. Otra forma?
												</label>
												<label>(Especifique)</label>
												<input style="width:400px;" type="text" class="form-control">
										</td>
									</tr>
								</tbody>
							</table>

							<table class="table table-bordered">
								<thead>
									<tr>
										<th>Sección G:  Nuevas intervenciones en el local escolar</th>
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
												<input type="radio" id="Checkbox1" name="check" value="option1"> 1. Si?
											</label>
											<label>
												<input type="radio" id="Checkbox2" name="check" value="option2"> 2. No?
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
														<td>Gobierno nacional / proyectos especiales</td>
														<td>
															<label>
																<input type="checkbox" id="Checkbox1" name="check" value="option1"> 1
															</label>
														</td>
														<td><label>
																<input type="checkbox" id="Checkbox1" name="check" value="option1"> 2
															</label>
														</td>
														<td><input style="width:250px;" type="text" class="form-control"></td>
													</tr>
													<tr>
														<td>Gobierno regional / local</td>
														<td>
															<label>
																<input type="checkbox" id="Checkbox1" name="check" value="option1"> 1
															</label>
														</td>
														<td><label>
																<input type="checkbox" id="Checkbox1" name="check" value="option1"> 2
															</label>
														</td>
														<td><input style="width:250px;" type="text" class="form-control"></td>
													</tr>
													<tr>
														<td>Apafa / autoconstrucción</td>
														<td>
															<label>
																<input type="checkbox" id="Checkbox1" name="check" value="option1"> 1
															</label>
														</td>
														<td><label>
																<input type="checkbox" id="Checkbox1" name="check" value="option1"> 2
															</label>
														</td>
														<td><input style="width:250px;" type="text" class="form-control"></td>
													</tr>
													<tr>
														<td>Entidades cooperantes</td>
														<td>
															<label>
																<input type="checkbox" id="Checkbox1" name="check" value="option1"> 1
															</label>
														</td>
														<td><label>
																<input type="checkbox" id="Checkbox1" name="check" value="option1"> 2
															</label>
														</td>
														<td><input style="width:250px;" type="text" class="form-control"></td>
													</tr>
													<tr>
														<td>Organismos sin fines de lucro</td>
														<td>
															<label>
																<input type="checkbox" id="Checkbox1" name="check" value="option1"> 1
															</label>
														</td>
														<td><label>
																<input type="checkbox" id="Checkbox1" name="check" value="option1"> 2
															</label>
														</td>
														<td><input style="width:250px;" type="text" class="form-control"></td>
													</tr>
													<tr>
														<td>Empresa privada</td>
														<td>
															<label>
																<input type="checkbox" id="Checkbox1" name="check" value="option1"> 1
															</label>
														</td>
														<td><label>
																<input type="checkbox" id="Checkbox1" name="check" value="option1"> 2
															</label>
														</td>
														<td><input style="width:250px;" type="text" class="form-control"></td>
													</tr>
													<tr>
														<td>Otro</td>
														<td>
															<label>
																<input type="checkbox" id="Checkbox1" name="check" value="option1"> 1
															</label>
														</td>
														<td><label>
																<input type="checkbox" id="Checkbox1" name="check" value="option1"> 2
															</label>
														</td>
														<td><input style="width:250px;" type="text" class="form-control"></td>
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
												<input type="radio" id="Checkbox1" name="check" value="option1"> 1. Patio Central
											</label>
											<label>
												<input type="radio" id="Checkbox2" name="check" value="option2"> 2. Frente al local
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