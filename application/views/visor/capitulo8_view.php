<script type="text/javascript">

	$.import('js/visor/capitulo8/index.js','js');

</script>

<?php $this->load->view('visor/nav_view.php'); ?>

<!-- CAPITULO 6-->
	  	    	<div class="tab-pane" id="cap8">
	  	    		<div class="content" id="content8">
	  	    			<div class="panel panel-info">
	  	    				<div class="panel-heading">Capitulo VIII: CARACTERÍSTICAS DE OTRAS EDIFICACIONES DEL LOCAL ESCOLAR</div>

	  	    				<table class="table table-bordered">
		  	    				<thead>
		  	    					<tr>
			  	    					<th colspan="3">Sección A: IDENTIFICACIÓN DE OTRAS EDIFICACIONES DEL LOCAL ESCOLAR</th>
		  	    					</tr>
		  	    				</thead>
		  	    			</table>
		  	    			<table class="table table-bordered">
		  	    				<thead>
		  	    					<tr>
			  	    					<th colspan="3">PATIOS DEL LOCAL ESCOLAR</th>
		  	    					</tr>
		  	    				</thead>
		  	    				<tbody>
		  	    					<tr>
		  	    						<td>1.</td>
		  	    						<td>
		  	    							<strong>Total de patios del local escolar</strong>
		  	    						</td>
		  	    						<td>
		  	    							<label>Nº de patios  verificar Cap. 5</label>
		  	    							<input style="width:100px;" type="text" class="form-control 0">
		  	    						</td>
		  	    					</tr>
		  	    				</tbody>
		  	    			</table>
		  	    			<div>
		  	    				<label>Listado de Patios</label>
			  	    			<select id="combopatios">
			  	    			</select>

		  	    			</div>
		  	    			<table class="table table-bordered">
		  	    				<thead>
		  	    					<tr>
			  	    					<th colspan="3">PATIO</th>
		  	    					</tr>
		  	    				</thead>
		  	    				<tbody>
		  	    					<tr>
		  	    						<td>1.</td>
		  	    						<td>
		  	    							<strong>Código de la edificación</strong>
		  	    						</td>
		  	    						<td>

		  	    							<input style="width:100px;" type="text" class="form-control P8_2_NroP" id="P8_2_NroP">
		  	    						</td>
		  	    					</tr>
		  	    					<tr>
		  	    						<td>2.1</td>
		  	    						<td>
		  	    							<strong>Area de la losa deportiva</strong>
		  	    						</td>
		  	    						<td>
											<label>Area en m2</label>
											<table class="table table-bordered">
												<tr>
													<th style="text-align:center;">Enteros</th>
													<th style="text-align:center;">Decimales</th>
												</tr>
												<tr>
													<tr>
														<td> <input style="width:100px;" type="text" class="form-control P8_areaP" id="P8_areaP"> </td>
														<td> <input style="width:100px;" type="text" class="form-control P8_area_decimalP" id="P8_area_decimalP"> </td>
													</tr>
												</tr>
											</table>
		  	    						</td>
		  	    					</tr>
		  	    					<tr>
		  	    						<td>2.2</td>
		  	    						<td>
		  	    							<strong>Predio en el que ubica la edificación</strong>
		  	    						</td>
		  	    						<td>
		  	    							<input style="width:100px;" type="text" class="form-control Nro_PredP" id="Nro_PredP">
		  	    						</td>
		  	    					</tr>
		  	    					<tr>
		  	    						<td>2.3</td>
		  	    						<td>
		  	    							<strong>¿Qué institución, organismo o empresa ejecutó la edificación?</strong>
		  	    							<label>(Acepte sólo un código)</label>
		  	    						</td>
		  	    						<td>
		  	    							<div class="radio">
												<label>
													<input type="radio" name="P8_ejecutoP" id="P8_ejecutoP1" value="option1" >
													    1. Gobierno Nacional / Poryecto especial
													</label>
											</div>
											<div class="radio">
												<label>
													<input type="radio" name="P8_ejecutoP" id="P8_ejecutoP2" value="option1" >
													    2. Gobierno Regional / Local
													</label>
											</div>
											<div class="radio">
												<label>
													<input type="radio" name="P8_ejecutoP" id="P8_ejecutoP3" value="option1" >
													    3. APAFA / Autoconstrucción
													</label>
											</div>
											<div class="radio">
												<label>
													<input type="radio" name="P8_ejecutoP" id="P8_ejecutoP4" value="option1" >
													    4. Entidades cooperantes
													</label>
											</div>
											<div class="radio">
												<label>
													<input type="radio" name="P8_ejecutoP" id="P8_ejecutoP5" value="option1" >
													    5. Organismos sin fines de lucro
													</label>
											</div>
											<div class="radio">
												<label>
													<input type="radio" name="P8_ejecutoP" id="P8_ejecutoP6" value="option1" >
													    6. Empresa privada
													</label>
											</div>
		  	    						</td>
		  	    					</tr>
		  	    					<tr>
		  	    						<td>2.4</td>
		  	    						<td>
		  	    							<strong>Estado de conservación de la edificación</strong>
		  	    							<label>(Acepte sólo un código)</label>
		  	    						</td>
		  	    						<td>
		  	    							<div class="radio">
												<label>
													<input type="radio" name="P8_Est_EP" id="P8_Est_EP1" value="option1" >
													    1. Sin daños
													</label>
											</div>
											<div class="radio">
												<label>
													<input type="radio" name="P8_Est_EP" id="P8_Est_EP2" value="option1" >
													    2. Fisuras leves
													</label>
											</div>
											<div class="radio">
												<label>
													<input type="radio" name="P8_Est_EP" id="P8_Est_EP3" value="option1" >
													    3. Fisuras moderadas / ataques por sales
													</label>
											</div>
											<div class="radio">
												<label>
													<input type="radio" name="P8_Est_EP" id="P8_Est_EP4" value="option1" >
													    4. Agrietamiento / colapso
													</label>
											</div>
		  	    						</td>
		  	    					</tr>
		  	    					<tr>
		  	    						<td>2.5</td>
		  	    						<td>
		  	    							<strong>¿Cuál es el estado de antigüedad de la edificación?</strong>
		  	    							<label>(Acepte sólo un código)</label>
		  	    						</td>
		  	    						<td>
		  	    							<div class="radio">
												<label>
													<input type="radio" name="P8_AntP" id="P8_AntP1" value="option1" >
													    1. Antes y durante 1977
													</label>
											</div>
											<div class="radio">
												<label>
													<input type="radio" name="P8_AntP" id="P8_AntP2" value="option1" >
													    2. Entre 1978 y 1998
													</label>
											</div>
											<div class="radio">
												<label>
													<input type="radio" name="P8_AntP" id="P8_AntP3" value="option1" >
													    3. Después de 1998
													</label>
											</div>
		  	    						</td>
		  	    					</tr>
		  	    					<tr>
		  	    						<td>2.6</td>
		  	    						<td>
		  	    							<strong>Recomendación técnica de la evaluación de la edificación</strong>
		  	    							<label>(Acepte sólo un código)</label>
		  	    						</td>
		  	    						<td>
		  	    							<div class="radio">
												<label>
													<input type="radio" name="P8_RecTecP" id="P8_RecTecP1" value="option1" >
													    1. Mantenimiento
													</label>
											</div>
											<div class="radio">
												<label>
													<input type="radio" name="P8_RecTecP" id="P8_RecTecP2" value="option1" >
													    2. Rehabilitación
													</label>
											</div>
											<div class="radio">
												<label>
													<input type="radio" name="P8_RecTecP" id="P8_RecTecP3" value="option1" >
													    3. Sustitución
													</label>
											</div>
		  	    						</td>
		  	    					</tr>
		  	    				</tbody>
		  	    			</table>

		  	    			<table class="table table-bordered">
		  	    				<thead>
		  	    					<tr>
			  	    					<th colspan="3">LOSAS DEPORTIVAS DEL LOCAL ESCOLAR</th>
		  	    					</tr>
		  	    				</thead>
		  	    				<tbody>
		  	    					<tr>
		  	    						<td>1.</td>
		  	    						<td>
		  	    							<strong>Número de losas deportivas del local escolar</strong>
		  	    						</td>
		  	    						<td>
		  	    							<label>Nº de losas deportivas Cap. 5</label>
		  	    							<input style="width:100px;" type="text" class="form-control">
		  	    						</td>
		  	    					</tr>
		  	    				</tbody>
		  	    			</table>

		  	    			<div>
		  	    				<label>Listado Losas deportivas</label>
			  	    			<select id="losasdeportivas">
			  	    			</select>

		  	    			</div>

		  	    			<table class="table table-bordered">
		  	    				<thead>
		  	    					<tr>
			  	    					<th colspan="3">LOSA DEPORTIVA</th>
		  	    					</tr>
		  	    				</thead>
		  	    				<tbody>
		  	    					<tr>
		  	    						<td>1.</td>
		  	    						<td>
		  	    							<strong>Código de la edificación</strong>
		  	    						</td>
		  	    						<td>

		  	    							<input style="width:100px;" type="text" class="form-control P8_2_NroLD" id="P8_2_NroLD">
		  	    						</td>
		  	    					</tr>
		  	    					<tr>
		  	    						<td>2.1</td>
		  	    						<td>
		  	    							<strong>Area de la losa deportiva</strong>
		  	    						</td>
		  	    						<td>
											<label>Area en m2</label>
											<table class="table table-bordered">
												<tr>
													<th style="text-align:center;">Enteros</th>
													<th style="text-align:center;">Decimales</th>
												</tr>
												<tr>
													<td> <input style="width:100px;" type="text" class="form-control P8_areaLD" id="P8_areaLD"> </td>
														<td> <input style="width:100px;" type="text" class="form-control P8_area_decimalLD" id="P8_area_decimalLD"> </td>
												</tr>
											</table>
		  	    						</td>
		  	    					</tr>
		  	    					<tr>
		  	    						<td>2.2</td>
		  	    						<td>
		  	    							<strong>Predio en el que ubica la edificación</strong>
		  	    						</td>
		  	    						<td>
		  	    							<input style="width:100px;" type="text" class="form-control Nro_PredLD" id="Nro_PredLD">
		  	    						</td>
		  	    					</tr>
		  	    					<tr>
		  	    						<td>2.3</td>
		  	    						<td>
		  	    							<strong>¿Qué institución, organismo o empresa ejecutó la edificación?</strong>
		  	    							<label>(Acepte sólo un código)</label>
		  	    						</td>
		  	    						<td>
		  	    							<div class="radio">
												<label>
													<input type="radio" name="P8_ejecutoLD" id="P8_ejecutoLD1" value="option1" >
													    1. Gobierno Nacional / Poryecto especial
													</label>
											</div>
											<div class="radio">
												<label>
													<input type="radio" name="P8_ejecutoLD" id="P8_ejecutoLD2" value="option1" >
													    2. Gobierno Regional / Local
													</label>
											</div>
											<div class="radio">
												<label>
													<input type="radio" name="P8_ejecutoLD" id="P8_ejecutoLD3" value="option1" >
													    3. APAFA / Autoconstrucción
													</label>
											</div>
											<div class="radio">
												<label>
													<input type="radio" name="P8_ejecutoLD" id="P8_ejecutoLD4" value="option1" >
													    4. Entidades cooperantes
													</label>
											</div>
											<div class="radio">
												<label>
													<input type="radio" name="P8_ejecutoLD" id="P8_ejecutoLD5" value="option1" >
													    5. Organismos sin fines de lucro
													</label>
											</div>
											<div class="radio">
												<label>
													<input type="radio" name="P8_ejecutoLD" id="P8_ejecutoLD6" value="option1" >
													    6. Empresa privada
													</label>
											</div>
		  	    						</td>
		  	    					</tr>
		  	    					<tr>
		  	    						<td>2.4</td>
		  	    						<td>
		  	    							<strong>Estado de conservación de la edificación</strong>
		  	    							<label>(Acepte sólo un código)</label>
		  	    						</td>
		  	    						<td>
		  	    							<div class="radio">
												<label>
													<input type="radio" name="P8_Est_ELD" id="P8_Est_ELD1" value="option1" >
													    1. Sin daños
													</label>
											</div>
											<div class="radio">
												<label>
													<input type="radio" name="P8_Est_ELD" id="P8_Est_ELD2" value="option1" >
													    2. Fisuras leves
													</label>
											</div>
											<div class="radio">
												<label>
													<input type="radio" name="P8_Est_ELD" id="P8_Est_ELD3" value="option1" >
													    3. Fisuras moderadas / ataques por sales
													</label>
											</div>
											<div class="radio">
												<label>
													<input type="radio" name="P8_Est_ELD" id="P8_Est_ELD4" value="option1" >
													    4. Agrietamiento / colapso
													</label>
											</div>
		  	    						</td>
		  	    					</tr>
		  	    					<tr>
		  	    						<td>2.5</td>
		  	    						<td>
		  	    							<strong>¿Cuál es el estado de antigüedad de la edificación?</strong>
		  	    							<label>(Acepte sólo un código)</label>
		  	    						</td>
		  	    						<td>
		  	    							<div class="radio">
												<label>
													<input type="radio" name="P8_AntLD" id="P8_AntLD1" value="option1" >
													    1. Antes y durante 1977
													</label>
											</div>
											<div class="radio">
												<label>
													<input type="radio" name="P8_AntLD" id="P8_AntLD2" value="option1" >
													    2. Entre 1978 y 1998
													</label>
											</div>
											<div class="radio">
												<label>
													<input type="radio" name="P8_AntLD" id="P8_AntLD3" value="option1" >
													    3. Después de 1998
													</label>
											</div>
		  	    						</td>
		  	    					</tr>
		  	    					<tr>
		  	    						<td>2.6</td>
		  	    						<td>
		  	    							<strong>Recomendación técnica de la evaluación de la edificación</strong>
		  	    							<label>(Acepte sólo un código)</label>
		  	    						</td>
		  	    						<td>
		  	    							<div class="radio">
												<label>
													<input type="radio" name="P8_RecTecLD" id="P8_RecTecLD1" value="option1" >
													    1. Mantenimiento
													</label>
											</div>
											<div class="radio">
												<label>
													<input type="radio" name="P8_RecTecLD" id="P8_RecTecLD2" value="option1" >
													    2. Rehabilitación
													</label>
											</div>
											<div class="radio">
												<label>
													<input type="radio" name="P8_RecTecLD" id="P8_RecTecLD3" value="option1" >
													    3. Sustitución
													</label>
											</div>
		  	    						</td>
		  	    					</tr>
		  	    				</tbody>
		  	    			</table>

		  	    			<table class="table table-bordered">
		  	    				<thead>
		  	    					<tr>
			  	    					<th colspan="3">CISTERNAS Y/O TANQUES DEL LOCAL ESCOLAR</th>
		  	    					</tr>
		  	    				</thead>
		  	    				<tbody>
		  	    					<tr>
		  	    						<td>1.</td>
		  	    						<td>
		  	    							<strong>Número de cisternas y/o tanques elevados del local escolar</strong>
		  	    						</td>
		  	    						<td>
		  	    							<label>Nº de de cisternas y/o tanques elevados Cap. 5</label>
		  	    							<input style="width:100px;" type="text" class="form-control">
		  	    						</td>
		  	    					</tr>
		  	    				</tbody>
		  	    			</table>

		  	    			<div>
		  	    				<label>Listado de Cisternas - tanques</label>
			  	    			<select id="cisterna">
			  	    			</select>

		  	    			</div>

		  	    			<table class="table table-bordered">
		  	    				<thead>
		  	    					<tr>
			  	    					<th colspan="3">CISTERNA - TANQUE</th>
		  	    					</tr>
		  	    				</thead>
		  	    				<tbody>
		  	    					<tr>
		  	    						<td>1.</td>
		  	    						<td>
		  	    							<strong>Código de la edificación</strong>
		  	    						</td>
		  	    						<td>

		  	    							<input style="width:100px;" type="text" class="form-control P8_2_NroCTE">
		  	    						</td>
		  	    					</tr>
		  	    					<tr>
		  	    						<td>2.1</td>
		  	    						<td>
		  	    							<strong>Area construida de la edificación</strong>
		  	    						</td>
		  	    						<td>
											<label>Area en m2</label>
											<table class="table table-bordered">
												<tr>
													<th style="text-align:center;">Enteros</th>
													<th style="text-align:center;">Decimales</th>
												</tr>
												<tr>
													    <td> <input style="width:100px;" type="text" class="form-control P8_areaCTE" id="P8_areaCTE"> </td>
														<td> <input style="width:100px;" type="text" class="form-control P8_area_decimalCTE" id="P8_area_decimalCTE"> </td>
												</tr>
											</table>
		  	    						</td>
		  	    					</tr>
		  	    					<tr>
		  	    						<td>2.2</td>
		  	    						<td>
		  	    							<strong>Predio en el que ubica la edificación</strong>
		  	    						</td>
		  	    						<td>
		  	    							<input style="width:100px;" type="text" class="form-control Nro_PredCTE" id="Nro_PredCTE">
		  	    						</td>
		  	    					</tr>
		  	    					<tr>
		  	    						<td>2.3</td>
		  	    						<td>
		  	    							<strong>¿Qué institución, organismo o empresa ejecutó la edificación?</strong>
		  	    							<label>(Acepte sólo un código)</label>
		  	    						</td>
		  	    						<td>
		  	    							<div class="radio">
												<label>
													<input type="radio" name="P8_ejecuto_O" id="P8_ejecuto_O1" value="option1" >
													    1. Gobierno Nacional / Poryecto especial
													</label>
											</div>
											<div class="radio">
												<label>
													<input type="radio" name="P8_ejecuto_O" id="P8_ejecuto_O2" value="option1" >
													    2. Gobierno Regional / Local
													</label>
											</div>
											<div class="radio">
												<label>
													<input type="radio" name="P8_ejecuto_O" id="P8_ejecuto_O3" value="option1" >
													    3. APAFA / Autoconstrucción
													</label>
											</div>
											<div class="radio">
												<label>
													<input type="radio" name="P8_ejecuto_O" id="P8_ejecuto_O4" value="option1" >
													    4. Entidades cooperantes
													</label>
											</div>
											<div class="radio">
												<label>
													<input type="radio" name="P8_ejecuto_O" id="P8_ejecuto_O5" value="option1" >
													    5. Organismos sin fines de lucro
													</label>
											</div>
											<div class="radio">
												<label>
													<input type="radio" name="P8_ejecuto_O" id="P8_ejecuto_O6" value="option1" >
													    6. Empresa privada
													</label>
											</div>
											<div class="radio">
												<label>
													<input type="radio" name="P8_ejecuto_O" id="P8_ejecuto_O6" value="option1" >
													    7. Otra
													</label>
											</div>
		  	    						</td>
		  	    					</tr>
		  	    					<tr>
		  	    						<td>2.4</td>
		  	    						<td>
		  	    							<strong>Estado de conservación de la edificación</strong>
		  	    							<label>(Acepte sólo un código)</label>
		  	    						</td>
		  	    						<td>
		  	    							<div class="radio">
												<label>
													<input type="radio" name="P8_Est_E" id="P8_Est_E1" value="option1" >
													    1. Sin daños
													</label>
											</div>
											<div class="radio">
												<label>
													<input type="radio" name="P8_Est_E" id="P8_Est_E2" value="option1" >
													    2. Fisuras leves
													</label>
											</div>
											<div class="radio">
												<label>
													<input type="radio" name="P8_Est_E" id="P8_Est_E3" value="option1" >
													    3. Fisuras moderadas / ataques por sales
													</label>
											</div>
											<div class="radio">
												<label>
													<input type="radio" name="P8_Est_E" id="P8_Est_E4" value="option1" >
													    4. Agrietamiento / colapso
													</label>
											</div>
		  	    						</td>
		  	    					</tr>
		  	    					<tr>
		  	    						<td>2.5</td>
		  	    						<td>
		  	    							<strong>¿Cuál es el estado de antigüedad de la edificación?</strong>
		  	    							<label>(Acepte sólo un código)</label>
		  	    						</td>
		  	    						<td>
		  	    							<div class="radio">
												<label>
													<input type="radio" name="P8_Ant" id="P8_Ant1" value="option1" >
													    1. Antes y durante 1977
													</label>
											</div>
											<div class="radio">
												<label>
													<input type="radio" name="P8_Ant" id="P8_Ant2" value="option1" >
													    2. Entre 1978 y 1998
													</label>
											</div>
											<div class="radio">
												<label>
													<input type="radio" name="P8_Ant" id="P8_Ant3" value="option1" >
													    3. Después de 1998
													</label>
											</div>
		  	    						</td>
		  	    					</tr>
		  	    					<tr>
		  	    						<td>2.6</td>
		  	    						<td>
		  	    							<strong>Recomendación técnica de la evaluación de la edificación</strong>
		  	    							<label>(Acepte sólo un código)</label>
		  	    						</td>
		  	    						<td>
		  	    							<div class="radio">
												<label>
													<input type="radio" name="P8_RecTec" id="P8_RecTec1" value="option1" >
													    1. Mantenimiento
													</label>
											</div>
											<div class="radio">
												<label>
													<input type="radio" name="P8_RecTec" id="P8_RecTec2" value="option1" >
													    2. Rehabilitación
													</label>
											</div>
											<div class="radio">
												<label>
													<input type="radio" name="P8_RecTec" id="P8_RecTec3" value="option1" >
													    3. Sustitución
													</label>
											</div>
		  	    						</td>
		  	    					</tr>
		  	    				</tbody>
		  	    			</table>

		  	    			<table class="table table-bordered">
		  	    				<thead>
		  	    					<tr>
			  	    					<th colspan="3">MUROS DE CONTENCIÓN DEL LOCAL ESCOLAR</th>
		  	    					</tr>
		  	    				</thead>
		  	    				<tbody>
		  	    					<tr>
		  	    						<td>1.</td>
		  	    						<td>
		  	    							<strong>Número de muros de contención del local escolar</strong>
		  	    						</td>
		  	    						<td>
		  	    							<label>Nº de muros de contención Cap. 5</label>
		  	    							<input style="width:100px;" type="text" class="form-control">
		  	    						</td>
		  	    					</tr>
		  	    				</tbody>
		  	    			</table>

		  	    			<div>
		  	    				<label>Listado de muros de contención</label>
			  	    			<select id="muros">
			  	    			</select>

		  	    			</div>

		  	    			<table class="table table-bordered">
		  	    				<thead>
		  	    					<tr>
			  	    					<th colspan="3">MUROS DE CONTENCIÓN</th>
		  	    					</tr>
		  	    				</thead>
		  	    				<tbody>
		  	    					<tr>
		  	    						<td>1.</td>
		  	    						<td>
		  	    							<strong>Código de la edificación</strong>
		  	    						</td>
		  	    						<td>

		  	    							<input style="width:100px;" type="text" class="form-control P8_2_Nro" id="P8_2_Nro">
		  	    						</td>
		  	    					</tr>
		  	    					<tr>
		  	    						<td>2.1</td>
		  	    						<td>
		  	    							<strong>Longitud del muro de contención</strong>
		  	    						</td>
		  	    						<td>
											<label>En metros</label>

		  	    						</td>
		  	    					</tr>
		  	    					<tr>
		  	    						<td>2.1</td>
		  	    						<td>
		  	    							<strong>Altura del muro de contención</strong>
		  	    						</td>
		  	    						<td>
											<label>En metros</label>

		  	    						</td>
		  	    					</tr>
		  	    					<tr>
		  	    						<td>2.2</td>
		  	    						<td>
		  	    							<strong>Predio en el que ubica la edificación</strong>
		  	    						</td>
		  	    						<td>
		  	    							<input style="width:100px;" type="text" class="form-control Nro_Pred" id="Nro_Pred">
		  	    						</td>
		  	    					</tr>
		  	    					<tr>
		  	    						<td>2.3</td>
		  	    						<td>
		  	    							<strong>¿Qué institución, organismo o empresa ejecutó la edificación?</strong>
		  	    							<label>(Acepte sólo un código)</label>
		  	    						</td>
		  	    						<td>
		  	    							<div class="radio">
												<label>
													<input type="radio" name="P8_ejecuto_O" id="P8_ejecuto_O1" value="option1" >
													    1. Gobierno Nacional / Poryecto especial
													</label>
											</div>
											<div class="radio">
												<label>
													<input type="radio" name="P8_ejecuto_O" id="P8_ejecuto_O2" value="option1" >
													    2. Gobierno Regional / Local
													</label>
											</div>
											<div class="radio">
												<label>
													<input type="radio" name="P8_ejecuto_O" id="P8_ejecuto_O3" value="option1" >
													    3. APAFA / Autoconstrucción
													</label>
											</div>
											<div class="radio">
												<label>
													<input type="radio" name="P8_ejecuto_O" id="P8_ejecuto_O4" value="option1" >
													    4. Entidades cooperantes
													</label>
											</div>
											<div class="radio">
												<label>
													<input type="radio" name="P8_ejecuto_O" id="P8_ejecuto_O5" value="option1" >
													    5. Organismos sin fines de lucro
													</label>
											</div>
											<div class="radio">
												<label>
													<input type="radio" name="P8_ejecuto_O" id="P8_ejecuto_O6" value="option1" >
													    6. Empresa privada
													</label>
											</div>
		  	    						</td>
		  	    					</tr>
		  	    					<tr>
		  	    						<td>2.4</td>
		  	    						<td>
		  	    							<strong>Estado de conservación de la edificación</strong>
		  	    							<label>(Acepte sólo un código)</label>
		  	    						</td>
		  	    						<td>
		  	    							<div class="radio">
												<label>
													<input type="radio" name="P8_Est_E" id="P8_Est_E1" value="option1" >
													    1. Sin daños
													</label>
											</div>
											<div class="radio">
												<label>
													<input type="radio" name="P8_Est_E" id="P8_Est_E2" value="option1" >
													    2. Fisuras leves
													</label>
											</div>
											<div class="radio">
												<label>
													<input type="radio" name="P8_Est_E" id="P8_Est_E3" value="option1" >
													    3. Fisuras moderadas / ataques por sales
													</label>
											</div>
											<div class="radio">
												<label>
													<input type="radio" name="P8_Est_E" id="P8_Est_E4" value="option1" >
													    4. Agrietamiento / colapso
													</label>
											</div>
		  	    						</td>
		  	    					</tr>
		  	    					<tr>
		  	    						<td>2.5</td>
		  	    						<td>
		  	    							<strong>¿Cuál es el estado de antigüedad de la edificación?</strong>
		  	    							<label>(Acepte sólo un código)</label>
		  	    						</td>
		  	    						<td>
		  	    							<div class="radio">
												<label>
													<input type="radio" name="P8_Ant" id="P8_Ant1" value="option1" >
													    1. Antes y durante 1977
													</label>
											</div>
											<div class="radio">
												<label>
													<input type="radio" name="P8_Ant" id="P8_Ant2" value="option1" >
													    2. Entre 1978 y 1998
													</label>
											</div>
											<div class="radio">
												<label>
													<input type="radio" name="P8_Ant" id="P8_Ant3" value="option1" >
													    3. Después de 1998
													</label>
											</div>
		  	    						</td>
		  	    					</tr>
		  	    					<tr>
		  	    						<td>2.6</td>
		  	    						<td>
		  	    							<strong>Recomendación técnica de la evaluación de la edificación</strong>
		  	    							<label>(Acepte sólo un código)</label>
		  	    						</td>
		  	    						<td>
		  	    							<div class="radio">
												<label>
													<input type="radio" name="P8_RecTec" id="P8_RecTec1" value="option1" >
													    1. Mantenimiento
													</label>
											</div>
											<div class="radio">
												<label>
													<input type="radio" name="P8_RecTec" id="P8_RecTec2" value="option1" >
													    2. Rehabilitación
													</label>
											</div>
											<div class="radio">
												<label>
													<input type="radio" name="P8_RecTec" id="P8_RecTec3" value="option1" >
													    3. Sustitución
													</label>
											</div>
		  	    						</td>
		  	    					</tr>
		  	    				</tbody>
		  	    			</table>

		  	    		</div>
	  	    		</div>
	  	    	</div><!-- END CAPITULO 6-->