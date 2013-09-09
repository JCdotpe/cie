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