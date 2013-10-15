<?php 


////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////
// CAP 8
////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////

// TABLA P8 - Capitulo VIII

$P8_2 = array(
	'name'	=> 'P8_2',
	'id'	=> 'P8_2',
);

$P8_area = array(
	'name'	=> 'P8_area',
	'id'	=> 'P8_area',
);

$P8_altura = array(
	'name'	=> 'P8_altura',
	'id'	=> 'P8_altura',
);

$P8_longitud = array(
	'name'	=> 'P8_longitud',
	'id'	=> 'P8_longitud',
);

$P8_predio = array(
	'name'	=> 'P8_predio',
	'id'	=> 'P8_predio',
);

$P8_ejecuto = array(
	'name'	=> 'P8_ejecuto',
	'id'	=> 'P8_ejecuto',
);

$P8_ejecuto_O = array(
	'name'	=> 'P8_ejecuto_O',
	'id'	=> 'P8_ejecuto_O',
);

$P8_Est_E = array(
	'name'	=> 'P8_Est_E',
	'id'	=> 'P8_Est_E',
);

$P8_Ant = array(
	'name'	=> 'P8_Ant',
	'id'	=> 'P8_Ant',
);

$P8_RecTec = array(
	'name'	=> 'P8_RecTec',
	'id'	=> 'P8_RecTec',
);

$P8_Est_PaLo = array(
	'name'	=> 'P8_Est_PaLo',
	'id'	=> 'P8_Est_PaLo',
);

$P8_Obs = array(
	'name'	=> 'P8_Obs',
	'id'	=> 'P8_Obs',
);

// FIN TABLA P8 - Capitulo VIII



////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////
// CAP 8
////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////

echo '

<div class="panel panel-info">
	  	    				<div class="panel-heading">CAPITULO VIII: CARACTERÍSTICAS DE OTRAS EDIFICACIONES DEL LOCAL ESCOLAR</div>

	  	    				<table class="table table-bordered">
		  	    				<thead>

			  	    					<tr><th colspan="3">SECCIÓN A: IDENTIFICACIÓN DE OTRAS EDIFICACIONES DEL LOCAL ESCOLAR</th>

		  	    				</tr></thead>
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
		  	    							<strong>Número de patios del local escolar</strong>
		  	    						</td>
		  	    						<td>
		  	    							<label>Nº de patios  verificar Cap. 5</label>
		  	    							'.form_input($P5_Tot_P).'
		  	    						</td>
		  	    					</tr>
		  	    				</tbody>
		  	    			</table>

		  	    			<div style="background:#DDD;" class="panel">
									<strong>Visualizar Patios</strong>
									<div style="margin-top:10px;margin-bottom:10px;" id="combopatios"><div class="btn-group"><a href="#" data-toggle="dropdown" class="btn dropdown-toggle">Seleccione un patio <span class="caret"></span></a><ul class="dropdown-menu"></ul></div></div>
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

		  	    							'.form_input($P5_Tot_P).'
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
												<tbody><tr>
													<th style="text-align:center;">Enteros</th>
													<th style="text-align:center;">Decimales</th>
												</tr>
												<tr>
													</tr><tr>
														<td> '.form_input($P8_area).' </td>
														<td> '.form_input($P8_area).' </td>
													</tr>
												
											</tbody></table>
		  	    						</td>
		  	    					</tr>
		  	    					<tr>
		  	    						<td>2.2</td>
		  	    						<td>
		  	    							<strong>Predio en el que se ubica la edificación</strong>
		  	    						</td>
		  	    						<td>
		  	    							<input type="text" id="Nro_PredP" class="form-control Nro_PredP" style="width:100px;" disabled="disabled">
		  	    						</td>
		  	    					</tr>
		  	    					<tr>
		  	    						<td>2.3</td>
		  	    						<td>
		  	    							<strong>¿Qué institución, organismo o empresa ejecutó la edificación?</strong>
		  	    							<label>(Acepte sólo un código)</label>
		  	    						</td>
		  	    						<td>
		  	    							'.form_input($P8_ejecuto).'
		  	    						</td>
		  	    					</tr>
		  	    					<tr>
		  	    						<td>2.4</td>
		  	    						<td>
		  	    							<strong>Estado de conservación de la edificación</strong>
		  	    							<label>(Acepte sólo un código)</label>
		  	    						</td>
		  	    						<td>
		  	    							'.form_input($P8_Est_E).'
		  	    						</td>
		  	    					</tr>
		  	    					<tr>
		  	    						<td>2.5</td>
		  	    						<td>
		  	    							<strong>¿Cuál es el estado de antigüedad de la edificación?</strong>
		  	    							<label>(Acepte sólo un código)</label>
		  	    						</td>
		  	    						<td>
		  	    							'.form_input($P8_Ant).'
		  	    						</td>
		  	    					</tr>
		  	    					<tr>
		  	    						<td>2.6</td>
		  	    						<td>
		  	    							<strong>Recomendación técnica de la evaluación de la edificación</strong>
		  	    							<label>(Acepte sólo un código)</label>
		  	    						</td>
		  	    						<td>
		  	    							'.form_input($P8_RecTec).'
		  	    						</td>
		  	    					</tr>
		  	    					<tr>
			  	    					<td colspan="3">
			  	    							<div class="panel">
													<label>Observaciones:</label>
													'.form_textarea($P8_Obs).'
												</div>
			  	    					</td>
			  	    				</tr>
		  	    				</tbody>
		  	    			</table>

		  	    		</div>

';


 ?>