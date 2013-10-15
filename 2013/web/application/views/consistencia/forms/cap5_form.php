<?php 


////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////
// CAP 5
////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////

// TABLA P5 - Capitulo V

$P5_Tot_E = array(
	'name'	=> 'P5_Tot_E',
	'id'	=> 'P5_Tot_E',
);

$P5_Tot_P = array(
	'name'	=> 'P5_Tot_P',
	'id'	=> 'P5_Tot_P',
);

$P5_Tot_LD = array(
	'name'	=> 'P5_Tot_LD',
	'id'	=> 'P5_Tot_LD',
);

$P5_Tot_CTE = array(
	'name'	=> 'P5_Tot_CTE',
	'id'	=> 'P5_Tot_CTE',
);

$P5_Tot_MC = array(
	'name'	=> 'P5_Tot_MC',
	'id'	=> 'P5_Tot_MC',
);

$P5_Tot_L1 = array(
	'name'	=> 'P5_Tot_L1',
	'id'	=> 'P5_Tot_L1',
);

$P5_Tot_R = array(
	'name'	=> 'P5_Tot_R',
	'id'	=> 'P5_Tot_R',
);

$P5_Opin = array(
	'name'	=> 'P5_Opin',
	'id'	=> 'P5_Opin',
);

// FIN TABLA P5 - Capitulo V

// TABLA P5_F - Capitulo V

$P5_NroPiso = array(
	'name'	=> 'P5_NroPiso',
	'id'	=> 'P5_NroPiso',
);

$P5_Foto = array(
	'name'	=> 'P5_Foto',
	'id'	=> 'P5_Foto',
);

$P5_Escala = array(
	'name'	=> 'P5_Escala',
	'id'	=> 'P5_Escala',
);

// FIN TABLA P5_F - Capitulo V

// TABLA P5_N - Capitulo V

$P5_Ed_Nro = array(
	'name'	=> 'P5_Ed_Nro',
	'id'	=> 'P5_Ed_Nro',
);

$P5_TotAmb = array(
	'name'	=> 'P5_TotAmb',
	'id'	=> 'P5_TotAmb',
);

// TABLA P5_N - Capitulo V


////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////
// CAP 5
////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////

echo '

<div class="panel panel-info">
	  	    				<div class="panel-heading">Capitulo V: Esquema de distribución de las edificaciones con ambientes</div>

	  	    				<table class="table table-bordered">
		  	    				<thead>
		  	    					<tr>
			  	    					<th>Piso N°1</th>
		  	    					</tr>
		  	    				</thead>
		  	    				<tbody>
		  	    					<tr>
		  	    						<td id="piso_1"> </td>
		  	    					</tr>
		  	    				</tbody>
		  	    			</table>
	  	    				<table class="table table-bordered">
		  	    				<thead>
		  	    					<tr>
			  	    					<th>Piso N°2</th>
		  	    					</tr>
		  	    				</thead>
		  	    				<tbody>
		  	    					<tr>
		  	    						<td id="piso_2"></td>
		  	    					</tr>
		  	    				</tbody>
		  	    			</table>
	  	    				<table class="table table-bordered">
		  	    				<thead>
		  	    					<tr>
			  	    					<th>Piso N°3</th>
		  	    					</tr>
		  	    				</thead>
		  	    				<tbody>
		  	    					<tr>
		  	    						<td id="piso_3"></td>
		  	    					</tr>
		  	    				</tbody>
		  	    			</table>
	  	    				<table class="table table-bordered">
		  	    				<thead>
		  	    					<tr>
			  	    					<th>Piso N°4</th>
		  	    					</tr>
		  	    				</thead>
		  	    				<tbody>
		  	    					<tr>
		  	    						<td id="piso_4"></td>
		  	    					</tr>
		  	    				</tbody>
		  	    			</table>

		  	    			<table class="table table-bordered">
		  	    				<tbody><tr>
		  	    					<th>EDIFICACIONES</th>
		  	    					<td>'.form_input($P5_Tot_E).'</td>
		  	    				</tr>
		  	    				<tr>
		  	    					<th>PATIOS</th>
		  	    					<td>'.form_input($P5_Tot_P).'</td>
		  	    				</tr>		  	    				
		  	    				<tr>
		  	    					<th>LOZAS DEPORTIVAS</th>
		  	    					<td>'.form_input($P5_Tot_LD).'</td>
		  	    				</tr>		  	    				
		  	    				<tr>
		  	    					<th>CISTERNA - TANQUE ELEVADO</th>
		  	    					<td>'.form_input($P5_Tot_CTE).'</td>
		  	    				</tr>			  	    				
		  	    				<tr>
		  	    					<th>MURO DE CONTENCIÓN</th>
		  	    					<td>'.form_input($P5_Tot_MC).'</td>
		  	    				</tr>			  	  		  	    				
		  	    				<tr>
		  	    					<th>PORTADA DE INGRESO, PORTÓN</th>
		  	    					<td>'.form_input($P5_Tot_L1).'</td>
		  	    				</tr>			  	 		  	    				
		  	    				<tr>
		  	    					<th>RAMPA</th>
		  	    					<td>'.form_input($P5_Tot_R).'</td>
		  	    				</tr>				  	    				
		  	    				<tr>
		  	    					<th>OPINIÓN</th>
		  	    					<td>'.form_input($P5_Opin).'</td>
		  	    				</tr>			  	    				
		  	    			</tbody></table>

	  	    			</div>

';

 ?>