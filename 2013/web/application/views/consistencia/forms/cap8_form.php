<?php 


////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////
// CAP 8
////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////

// TABLA P8 - Capitulo VIII

$P8_2_Tipo = array(
	'name'	=> 'P8_2_Tipo',
	'id'	=> 'P8_2_Tipo',
	'maxlength'	=> 3,
	'class'	=> 'input3',
	'disabled' => 'disabled',
);

$Nro_Pred = array(
	'name'	=> 'Nro_Pred',
	'id'	=> 'Nro_Pred',
	'maxlength'	=> 2,
	'class'	=> 'input2',
	'disabled' => 'disabled',
);

$P8_2 = array(
	'name'	=> 'P8_2',
	'id'	=> 'P8_2',
);

$P8_area = array(
	'name'	=> 'P8_area',
	'id'	=> 'P8_area',
	'maxlength'	=> 6,
	'class'	=> 'input6',	
);

$P8_altura = array(
	'name'	=> 'P8_altura',
	'id'	=> 'P8_altura',
);

$P8_ejecuto = array(
	'name'	=> 'P8_ejecuto',
	'id'	=> 'P8_ejecuto',
	'maxlength'	=> 1,
	'class'	=> 'input1',		
);

$P8_ejecuto_O = array(
	'name'	=> 'P8_ejecuto_O',
	'id'	=> 'P8_ejecuto_O',
);

$P8_Est_E = array(
	'name'	=> 'P8_Est_E',
	'id'	=> 'P8_Est_E',
	'maxlength'	=> 1,
	'class'	=> 'input1',			
);

$P8_Ant = array(
	'name'	=> 'P8_Ant',
	'id'	=> 'P8_Ant',
	'maxlength'	=> 1,
	'class'	=> 'input1',			
);

$P8_RecTec = array(
	'name'	=> 'P8_RecTec',
	'id'	=> 'P8_RecTec',
	'maxlength'	=> 1,
	'class'	=> 'input1',		
);

$P8_Est_PaLo = array(
	'name'	=> 'P8_Est_PaLo',
	'id'	=> 'P8_Est_PaLo',
);

$P8_Obs = array(
	'name'	=> 'P8_Obs',
	'id'	=> 'P8_Obs',
	'class'	=> 'textarea98p',		
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

							<div class="panel" style="background:#DDD;">
								<div id="panel_edificaciones" style="margin-top:10px;margin-bottom:10px;">
									<div class="btn-group">
										<a class="btn dropdown-toggle" data-toggle="dropdown" href="#">Seleccione una Edificación <span class="caret"></span></a>
										<ul class="dropdown-menu">
											<li class="combo_ins7 active"><a href="" data-toggle="dropdown"> Patios del local escolar</a></li>
											<li class="combo_ins7"><a href="" data-toggle="dropdown"> Losas deportivas del local escolar</a></li>
											<li class="combo_ins7"><a href="" data-toggle="dropdown"> Cisternas y/o tanques del local escolar</a></li>
											<li class="combo_ins7"><a href="" data-toggle="dropdown"> Muros de contención del local escolar</a></li>
										</ul>
									</div>
								</div>
							</div>	 

							<div class="panel" style="background:#DDD;">
								<div id="panel_edificaciones" style="margin-top:10px;margin-bottom:10px;">
									<div class="btn-group">
										<a class="btn dropdown-toggle" data-toggle="dropdown" href="#">Seleccione un Patio <span class="caret"></span></a>
										<ul class="dropdown-menu">
											<li class="combo_ins7 active"><a href="" data-toggle="dropdown"> Patio Nro:01</a></li>
											<li class="combo_ins7"><a href="" data-toggle="dropdown"> Patio Nro:02</a></li>
											<li class="combo_ins7"><a href="" data-toggle="dropdown"> Patio Nro:03</a></li>
											<li class="combo_ins7"><a href="" data-toggle="dropdown"> Patio Nro:04</a></li>
											<li class="combo_ins7"><a href="" data-toggle="dropdown"> Patio Nro:05</a></li>
										</ul>
									</div>
								</div>
							</div>	  	    				

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
		  	    							'.form_input($P8_2_Tipo).'
		  	    						</td>
		  	    					</tr>
		  	    				</tbody>
		  	    			</table>

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
		  	    							'.form_input($P8_2_Tipo).'
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
														<td> 00 </td>
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
		  	    							'.form_input($Nro_Pred).'
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