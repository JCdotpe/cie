<?php 


////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////
// CAP 4
////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////

// TABLA FRENTE_LINDEROS - Capitulo IV

$P4_1_Foto = array(
	'name'	=> 'P4_1_Foto',
	'id'	=> 'P4_1_Foto',
);

$P4_2_CantTram_Lfrente = array(
	'name'	=> 'P4_2_CantTram_Lfrente',
	'id'	=> 'P4_2_CantTram_Lfrente',
);

$P4_2_CantTram_Lderecho = array(
	'name'	=> 'P4_2_CantTram_Lderecho',
	'id'	=> 'P4_2_CantTram_Lderecho',
);

$P4_2_CantTram_Lfondo = array(
	'name'	=> 'P4_2_CantTram_Lfondo',
	'id'	=> 'P4_2_CantTram_Lfondo',
);

$P4_2_CantTram_Lizq = array(
	'name'	=> 'P4_2_CantTram_Lizq',
	'id'	=> 'P4_2_CantTram_Lizq',
);

// FIN TABLA FRENTE_LINDEROS - Capitulo IV

// TABLA P4_2N - Capitulo IV

// $P4_2_LindTipo = array(
// 	'name'	=> 'P4_2_LindTipo',
// 	'id'	=> 'P4_2_LindTipo',
// );

// $P4_2_1A_NroTramo = array(
// 	'name'	=> 'P4_2_1A_NroTramo',
// 	'id'	=> 'P4_2_1A_NroTramo',
// );

// $P4_2_1A_i = array(
// 	'name'	=> 'P4_2_1A_i',
// 	'id'	=> 'P4_2_1A_i',
// );

// $P4_2_1A_f = array(
// 	'name'	=> 'P4_2_1A_f',
// 	'id'	=> 'P4_2_1A_f',
// );

// $P4_2_1B_LongTramo = array(
// 	'name'	=> 'P4_2_1B_LongTramo',
// 	'id'	=> 'P4_2_1B_LongTramo',
// );

// $P4_2_1C_Cerco = array(
// 	'name'	=> 'P4_2_1C_Cerco',
// 	'id'	=> 'P4_2_1C_Cerco',
// );

// $P4_2_1D_Estruc = array(
// 	'name'	=> 'P4_2_1D_Estruc',
// 	'id'	=> 'P4_2_1D_Estruc',
// );

// $P4_2_1E_EstCons = array(
// 	'name'	=> 'P4_2_1E_EstCons',
// 	'id'	=> 'P4_2_1E_EstCons',
// );

// $P4_2_1E_EstCons = array(
// 	'name'	=> 'P4_2_1E_EstCons',
// 	'id'	=> 'P4_2_1E_EstCons',
// );

// $P4_2_1F_Opin = array(
// 	'name'	=> 'P4_2_1F_Opin',
// 	'id'	=> 'P4_2_1F_Opin',
// );


// FIN TABLA P4_2N - Capitulo IV

$btnGrabar = array(
	'name' => 'registrar',
	'id' => 'registrar',
	//'onclick' => 'Form_Validar()',
	'type' => 'button',
	'content' => 'Grabar',
	'class' => 'btn btn-primary pull-left'
);


////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////
// CAP 4
////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////

echo '

<div class="panel panel-info">
	  	    				<div class="panel-heading">
	  	    					<h5>Capitulo IV. Localización del predio y caracteristicas de sus linderos</h5>
	  	    				</div>

	  	    				<table class="table table-bordered">
		  	    				<thead>
		  	    					<tr>
			  	    					<th>Sección A: Croquis de localización del predio</th>
		  	    					</tr>
		  	    				</thead>
		  	    				<tbody>
		  	    					<tr>
		  	    						<td>'.form_input($P4_1_Foto).'</td>
		  	    					</tr>
		  	    				</tbody>
		  	    			</table>

		  	    			<table class="table table-bordered">
		  	    				<thead>
		  	    					<tr>
		  	    						<th colspan="3">Sección B:  características de linderos</th>
		  	    					</tr>
		  	    				</thead>
		  	    				<tbody>
		  	    					<tr>
		  	    						<td>1.</td>
		  	    						<td><strong>De cuántos tramos está conformado el lindero frente con o sin cerco</strong></td>
		  	    						<td>
		  	    							<label>Nº total de tramos:</label>
		  	    							'.form_input($P4_2_CantTram_Lfrente).'
		  	    						</td>
		  	    					</tr>
		  	    					<tr>
		  	    						<td></td>
		  	    						<td colspan="2">

		  	    							<table id="lindero_frente" class="table table-bordered">
		  	    								<thead>
		  	    									<tr>
		  	    										<th style="text-align:center; vertical-align:middle;" colspan="8">
		  	    											Lindero frente (especifique cada uno de los tramos en el cuadro)
		  	    										</th>
		  	    									</tr>
		  	    									<tr>
		  	    										<th rowspan="2" style="text-align:center; vertical-align:middle;">N°</th>
		  	    										<th rowspan="2" style="text-align:center; vertical-align:middle;">1A. Nº de tramo</th>
		  	    										<th rowspan="2" style="text-align:center; vertical-align:middle;">1B. Longitud del tramo (m)</th>
		  	    										<th colspan="1" style="text-align:center; vertical-align:middle;">1C. El tramo tiene cerco</th>
		  	    										<th rowspan="2" style="text-align:center; vertical-align:middle;">1D. El sistema estructural predominante del tramo es:</th>
		  	    										<th rowspan="2" style="text-align:center; vertical-align:middle;">1E. Estado de conservación del tramo</th>
		  	    										<th rowspan="2" style="text-align:center; vertical-align:middle;">1F. Opinión técnica del evaluador</th>
		  	    									</tr>
		  	    								</thead>
		  	    								<tbody>
		  	    											  	    								
		  	    								</tbody>
		  	    							</table>

		  	    						</td>
		  	    					</tr>
		  	    					<tr>
		  	    						<td>2.</td>
		  	    						<td><strong>De cuántos tramos está conformado el lindero derecho con o sin cerco</strong></td>
		  	    						<td>
		  	    							<label>Nº total de tramos:</label>
		  	    							'.form_input($P4_2_CantTram_Lderecho).'
		  	    						</td>
		  	    					</tr>
		  	    					<tr>
		  	    						<td></td>
		  	    						<td colspan="2">

		  	    							<table id="lindero_derecha"  class="table table-bordered">
		  	    								<thead>
		  	    									<tr>
		  	    										<th style="text-align:center; vertical-align:middle;" colspan="8">
		  	    											Lindero Derecho (especifique cada uno de los tramos en el cuadro)
		  	    										</th>
		  	    									</tr>
		  	    									<tr>
		  	    										<th rowspan="2" style="text-align:center; vertical-align:middle;">N°</th>
		  	    										<th rowspan="2" style="text-align:center; vertical-align:middle;">2A. Nº de tramo</th>
		  	    										<th rowspan="2" style="text-align:center; vertical-align:middle;">2B. Longitud del tramo (m)</th>
		  	    										<th colspan="1" style="text-align:center; vertical-align:middle;">2C. El tramo tiene cerco</th>
		  	    										<th rowspan="2" style="text-align:center; vertical-align:middle;">2D. El sistema estructural predominante del tramo es:</th>
		  	    										<th rowspan="2" style="text-align:center; vertical-align:middle;">2E. Estado de conservación del tramo</th>
		  	    										<th rowspan="2" style="text-align:center; vertical-align:middle;">2F. Opinión técnica del evaluador</th>
		  	    									</tr>
		  	    								</thead>
		  	    								<tbody>
		  	    												  	    								
		  	    								</tbody>
		  	    							</table>

		  	    						</td>
		  	    					</tr>
		  	    					<tr>
		  	    						<td>3.</td>
		  	    						<td><strong>De cuántos tramos está conformado el lindero fondo con o sin cerco</strong></td>
		  	    						<td>
		  	    							<label>Nº total de tramos:</label>
		  	    							'.form_input($P4_2_CantTram_Lfondo).'
		  	    						</td>
		  	    					</tr>
		  	    					<tr>
		  	    						<td></td>
		  	    						<td colspan="2">

		  	    							<table id="lindero_fondo" class="table table-bordered">
		  	    								<thead>
		  	    									<tr>
		  	    										<th style="text-align:center; vertical-align:middle;" colspan="8">
		  	    											Lindero fondo (especifique cada uno de los tramos en el cuadro)
		  	    										</th>
		  	    									</tr>
		  	    									<tr>
		  	    										<th rowspan="2" style="text-align:center; vertical-align:middle;">N°</th>
		  	    										<th rowspan="2" style="text-align:center; vertical-align:middle;">3A. Nº de tramo</th>
		  	    										<th rowspan="2" style="text-align:center; vertical-align:middle;">3B. Longitud del tramo (m)</th>
		  	    										<th colspan="1" style="text-align:center; vertical-align:middle;">3C. El tramo tiene cerco</th>
		  	    										<th rowspan="2" style="text-align:center; vertical-align:middle;">3D. El sistema estructural predominante del tramo es:</th>
		  	    										<th rowspan="2" style="text-align:center; vertical-align:middle;">3E. Estado de conservación del tramo</th>
		  	    										<th rowspan="2" style="text-align:center; vertical-align:middle;">3F. Opinión técnica del evaluador</th>
		  	    									</tr>
		  	    								</thead>
		  	    								<tbody>
		  	    									  	    								
		  	    								</tbody>
		  	    							</table>

		  	    						</td>
		  	    					</tr>
		  	    					<tr>
		  	    						<td>4.</td>
		  	    						<td><strong>De cuántos tramos está conformado el lindero izquierdo con o sin cerco</strong></td>
		  	    						<td>
		  	    							<label>Nº total de tramos:</label>
		  	    							'.form_input($P4_2_CantTram_Lizq).'
		  	    						</td>
		  	    					</tr>
		  	    					<tr>
		  	    						<td></td>
		  	    						<td colspan="2">

		  	    							<table id="lindero_izquierda" class="table table-bordered">
		  	    								<thead>
		  	    									<tr>
		  	    										<th style="text-align:center; vertical-align:middle;" colspan="8">
		  	    											Lindero izquierdo (especifique cada uno de los tramos en el cuadro)
		  	    										</th>
		  	    									</tr>
		  	    									<tr>
		  	    										<th rowspan="2" style="text-align:center; vertical-align:middle;">N°</th>
		  	    										<th rowspan="2" style="text-align:center; vertical-align:middle;">4A. Nº de tramo</th>
		  	    										<th rowspan="2" style="text-align:center; vertical-align:middle;">4B. Longitud del tramo (m)</th>
		  	    										<th colspan="1" style="text-align:center; vertical-align:middle;">4C. El tramo tiene cerco</th>
		  	    										<th rowspan="2" style="text-align:center; vertical-align:middle;">4D. El sistema estructural predominante del tramo es:</th>
		  	    										<th rowspan="2" style="text-align:center; vertical-align:middle;">4E. Estado de conservación del tramo</th>
		  	    										<th rowspan="2" style="text-align:center; vertical-align:middle;">4F. Opinión técnica del evaluador</th>
		  	    									</tr>
		  	    								</thead>
		  	    								<tbody>
		  	    									  	    								
		  	    								</tbody>
		  	    							</table>

		  	    						</td>
		  	    					</tr>
		  	    					<tr>
		  	    						<th>OBSERVACIONES</th>
		  	    						<td></td>
		  	    					</tr>

		  	    				</tbody>
		  	    			</table>
		  	    			'.form_button($btnGrabar).'
	  	    			</div>

';


 ?>

 <script type="text/javascript">

$(function(){

//cap4
$.each( <?php echo json_encode($cap4_i->row()); ?>, function(fila, valor) {
	   $('#' + fila).val(valor);
}); 


//cap4 N
	/**** FRENTE *****/
$('#P4_2_CantTram_Lfrente').change(function(event) {

	$('#lindero_frente tr').remove('.entrev');
	var ahua = $(this).val();
	if(ahua > 0 && ahua<=10){
		for(var i=1; i<=ahua;i++){
			var asd = '<tr class="entrev">';
			asd +='<td><input type="text" class="span12 embc' + i + '" name="P4_2_1A_NroTramo' + '_t1_' + i + '" id="P4_2_1A_NroTramo' + '_t1_' + i + '" value="' + i + '" ><div class="help-block error"></div></td>';
			asd +='<td><input type="text" class="span12 embc' + i + '" name="P4_2_1A_i' + '_t1_' + i + '" id="P4_2_1A_i' + '_t1_' + i + '" value="" ><input type="text" class="span12 embc' + i + '" name="P4_2_1A_f' + '_t1_' + i + '" id="P4_2_1A_f' + '_t1_' + i + '" value="" ><div class="help-block error"></div></td>';
			asd +='<td><input type="text" class="span12 embc' + i + '" name="P4_2_1B_LongTramo' + '_t1_' + i + '" id="P4_2_1B_LongTramo' + '_t1_' + i + '" value="" ><div class="help-block error"></div></td>';
			asd +='<td><input type="text" class="span12 embc' + i + '" name="P4_2_1C_Cerco' + '_t1_' + i + '" id="P4_2_1C_Cerco' + '_t1_' + i + '" value="" ><div class="help-block error"></div></td>';
			asd +='<td><input type="text" class="span12 embc' + i + '" name="P4_2_1D_Estruc' + '_t1_' + i + '" id="P4_2_1D_Estruc' + '_t1_' + i + '" value="" ><div class="help-block error"></div></td>';
			asd +='<td><input type="text" class="span12 embc' + i + '" name="P4_2_1E_EstCons' + '_t1_' + i + '" id="P4_2_1E_EstCons' + '_t1_' + i + '" value="" ><div class="help-block error"></div></td>';
			asd +='<td><input type="text" class="span12 embc' + i + '" name="P4_2_1F_Opin' + '_t1_' + i + '" id="P4_2_1F_Opin' + '_t1_' + i + '" value="" ><div class="help-block error"></div></td>';
			asd += '</tr>';
			$('#lindero_frente > tbody').append(asd);
		}
	}else if(ahua==''){
		//
	}else{
		alert('10 Entrevistas máximo');
	}


	var as = 1;
	$.each( <?php echo json_encode($cap4_n->result()); ?>, function(i, data) {
			if (data.P4_2_LindTipo == 1){
				$('#P4_2_1A_NroTramo' + '_t1_' + as).val(data.P4_2_1A_NroTramo);
				$('#P4_2_1A_i' + '_t1_' + as).val(data.P4_2_1A_i);
				$('#P4_2_1A_f' + '_t1_' + as).val(data.P4_2_1A_f);
				$('#P4_2_1B_LongTramo' + '_t1_' + as).val(data.P4_2_1B_LongTramo);
				$('#P4_2_1C_Cerco' + '_t1_' +  as).val(data.P4_2_1C_Cerco);
				$('#P4_2_1D_Estruc' + '_t1_' +  as).val(data.P4_2_1D_Estruc);
				$('#P4_2_1E_EstCons' + '_t1_' +  as).val(data.P4_2_1E_EstCons);
				$('#P4_2_1F_Opin' + '_t1_' +  as).val(data.P4_2_1F_Opin);
				as++;
			}
	});
});
$('#P4_2_CantTram_Lfrente').trigger('change');
	/***************/

	/**** DERECHA *****/
$('#P4_2_CantTram_Lderecho').change(function(event) {

	$('#lindero_derecha tr').remove('.entrev');
	var ahua = $(this).val();
	if(ahua > 0 && ahua<=10){
		for(var i=1; i<=ahua;i++){
			var asd = '<tr class="entrev">';
			asd +='<td><input type="text" class="span12 embc' + i + '" name="P4_2_1A_NroTramo' + '_t2_' + i + '" id="P4_2_1A_NroTramo' + '_t2_' + i + '" value="' + i + '" ><div class="help-block error"></div></td>';
			asd +='<td><input type="text" class="span12 embc' + i + '" name="P4_2_1A_i' + '_t2_' + i + '" id="P4_2_1A_i' + '_t2_' + i + '" value="" ><input type="text" class="span12 embc' + i + '" name="P4_2_1A_f' + '_t2_' + i + '" id="P4_2_1A_f' + '_t2_' + i + '" value="" ><div class="help-block error"></div></td>';
			asd +='<td><input type="text" class="span12 embc' + i + '" name="P4_2_1B_LongTramo' + '_t2_' + i + '" id="P4_2_1B_LongTramo' + '_t2_' + i + '" value="" ><div class="help-block error"></div></td>';
			asd +='<td><input type="text" class="span12 embc' + i + '" name="P4_2_1C_Cerco' + '_t2_' + i + '" id="P4_2_1C_Cerco' + '_t2_' + i + '" value="" ><div class="help-block error"></div></td>';
			asd +='<td><input type="text" class="span12 embc' + i + '" name="P4_2_1D_Estruc' + '_t2_' + i + '" id="P4_2_1D_Estruc' + '_t2_' + i + '" value="" ><div class="help-block error"></div></td>';
			asd +='<td><input type="text" class="span12 embc' + i + '" name="P4_2_1E_EstCons' + '_t2_' + i + '" id="P4_2_1E_EstCons' + '_t2_' + i + '" value="" ><div class="help-block error"></div></td>';
			asd +='<td><input type="text" class="span12 embc' + i + '" name="P4_2_1F_Opin' + '_t2_' + i + '" id="P4_2_1F_Opin' + '_t2_' + i + '" value="" ><div class="help-block error"></div></td>';
			asd += '</tr>';
			$('#lindero_derecha > tbody').append(asd);
		}
	}else if(ahua==''){
		//
	}else{
		alert('10 Entrevistas máximo');
	}


	var as = 1;
	$.each( <?php echo json_encode($cap4_n->result()); ?>, function(i, data) {
			if (data.P4_2_LindTipo == 2){				
				$('#P4_2_1A_NroTramo' + '_t2_' + as).val(data.P4_2_1A_NroTramo);
				$('#P4_2_1A_i' + '_t2_' + as).val(data.P4_2_1A_i);
				$('#P4_2_1A_f' + '_t2_' + as).val(data.P4_2_1A_f);
				$('#P4_2_1B_LongTramo' + '_t2_' + as).val(data.P4_2_1B_LongTramo);
				$('#P4_2_1C_Cerco' + '_t2_' +  as).val(data.P4_2_1C_Cerco);
				$('#P4_2_1D_Estruc' + '_t2_' +  as).val(data.P4_2_1D_Estruc);
				$('#P4_2_1E_EstCons' + '_t2_' +  as).val(data.P4_2_1E_EstCons);
				$('#P4_2_1F_Opin' + '_t2_' +  as).val(data.P4_2_1F_Opin);
				as++;
			}
	});
});
$('#P4_2_CantTram_Lderecho').trigger('change');
	/*************/

	/**** FONDO *****/
$('#P4_2_CantTram_Lfondo').change(function(event) {

	$('#lindero_fondo tr').remove('.entrev');
	var ahua = $(this).val();
	if(ahua > 0 && ahua<=10){
		for(var i=1; i<=ahua;i++){
			var asd = '<tr class="entrev">';
			asd +='<td><input type="text" class="span12 embc' + i + '" name="P4_2_1A_NroTramo' + '_t3_' + i + '" id="P4_2_1A_NroTramo' + '_t3_' + i + '" value="' + i + '" ><div class="help-block error"></div></td>';
			asd +='<td><input type="text" class="span12 embc' + i + '" name="P4_2_1A_i' + '_t3_' + i + '" id="P4_2_1A_i' + '_t3_' + i + '" value="" ><input type="text" class="span12 embc' + i + '" name="P4_2_1A_f' + '_t3_' + i + '" id="P4_2_1A_f' + '_t3_' + i + '" value="" ><div class="help-block error"></div></td>';
			asd +='<td><input type="text" class="span12 embc' + i + '" name="P4_2_1B_LongTramo' + '_t3_' + i + '" id="P4_2_1B_LongTramo' + '_t3_' + i + '" value="" ><div class="help-block error"></div></td>';
			asd +='<td><input type="text" class="span12 embc' + i + '" name="P4_2_1C_Cerco' + '_t3_' + i + '" id="P4_2_1C_Cerco' + '_t3_' + i + '" value="" ><div class="help-block error"></div></td>';
			asd +='<td><input type="text" class="span12 embc' + i + '" name="P4_2_1D_Estruc' + '_t3_' + i + '" id="P4_2_1D_Estruc' + '_t3_' + i + '" value="" ><div class="help-block error"></div></td>';
			asd +='<td><input type="text" class="span12 embc' + i + '" name="P4_2_1E_EstCons' + '_t3_' + i + '" id="P4_2_1E_EstCons' + '_t3_' + i + '" value="" ><div class="help-block error"></div></td>';
			asd +='<td><input type="text" class="span12 embc' + i + '" name="P4_2_1F_Opin' + '_t3_' + i + '" id="P4_2_1F_Opin' + '_t3_' + i + '" value="" ><div class="help-block error"></div></td>';
			asd += '</tr>';
			$('#lindero_fondo > tbody').append(asd);
		}
	}else if(ahua==''){
		//
	}else{
		alert('10 Entrevistas máximo');
	}


	var as = 1;
	$.each( <?php echo json_encode($cap4_n->result()); ?>, function(i, data) {
			if (data.P4_2_LindTipo == 3){				
				$('#P4_2_1A_NroTramo' + '_t3_' + as).val(data.P4_2_1A_NroTramo);
				$('#P4_2_1A_i' + '_t3_' + as).val(data.P4_2_1A_i);
				$('#P4_2_1A_f' + '_t3_' + as).val(data.P4_2_1A_f);
				$('#P4_2_1B_LongTramo' + '_t3_' + as).val(data.P4_2_1B_LongTramo);
				$('#P4_2_1C_Cerco' + '_t3_' +  as).val(data.P4_2_1C_Cerco);
				$('#P4_2_1D_Estruc' + '_t3_' +  as).val(data.P4_2_1D_Estruc);
				$('#P4_2_1E_EstCons' + '_t3_' +  as).val(data.P4_2_1E_EstCons);
				$('#P4_2_1F_Opin' + '_t3_' +  as).val(data.P4_2_1F_Opin);
				as++;
			}
	});
});
$('#P4_2_CantTram_Lfondo').trigger('change');
	/**************/

	/**** IZQUIERDA *****/
$('#P4_2_CantTram_Lizq').change(function(event) {

	$('#lindero_izquierda tr').remove('.entrev');
	var ahua = $(this).val();
	if(ahua > 0 && ahua<=10){
		for(var i=1; i<=ahua;i++){
			var asd = '<tr class="entrev">';
			asd +='<td><input type="text" class="span12 embc' + i + '" name="P4_2_1A_NroTramo' + '_t4_' + i + '" id="P4_2_1A_NroTramo' + '_t4_' + i + '" value="' + i + '" ><div class="help-block error"></div></td>';
			asd +='<td><input type="text" class="span12 embc' + i + '" name="P4_2_1A_i' + '_t4_' + i + '" id="P4_2_1A_i' + '_t4_' + i + '" value="" ><input type="text" class="span12 embc' + i + '" name="P4_2_1A_f' + '_t4_' + i + '" id="P4_2_1A_f' + '_t4_' + i + '" value="" ><div class="help-block error"></div></td>';
			asd +='<td><input type="text" class="span12 embc' + i + '" name="P4_2_1B_LongTramo' + '_t4_' + i + '" id="P4_2_1B_LongTramo' + '_t4_' + i + '" value="" ><div class="help-block error"></div></td>';
			asd +='<td><input type="text" class="span12 embc' + i + '" name="P4_2_1C_Cerco' + '_t4_' + i + '" id="P4_2_1C_Cerco' + '_t4_' + i + '" value="" ><div class="help-block error"></div></td>';
			asd +='<td><input type="text" class="span12 embc' + i + '" name="P4_2_1D_Estruc' + '_t4_' + i + '" id="P4_2_1D_Estruc' + '_t4_' + i + '" value="" ><div class="help-block error"></div></td>';
			asd +='<td><input type="text" class="span12 embc' + i + '" name="P4_2_1E_EstCons' + '_t4_' + i + '" id="P4_2_1E_EstCons' + '_t4_' + i + '" value="" ><div class="help-block error"></div></td>';
			asd +='<td><input type="text" class="span12 embc' + i + '" name="P4_2_1F_Opin' + '_t4_' + i + '" id="P4_2_1F_Opin' + '_t4_' + i + '" value="" ><div class="help-block error"></div></td>';
			asd += '</tr>';
			$('#lindero_izquierda > tbody').append(asd);
		}
	}else if(ahua==''){
		//
	}else{
		alert('10 Entrevistas máximo');
	}


	var as = 1;
	$.each( <?php echo json_encode($cap4_n->result()); ?>, function(i, data) {
			if (data.P4_2_LindTipo == 4){				
				$('#P4_2_1A_NroTramo' + '_t4_' + as).val(data.P4_2_1A_NroTramo);
				$('#P4_2_1A_i' + '_t4_' + as).val(data.P4_2_1A_i);
				$('#P4_2_1A_f' + '_t4_' + as).val(data.P4_2_1A_f);
				$('#P4_2_1B_LongTramo' + '_t4_' + as).val(data.P4_2_1B_LongTramo);
				$('#P4_2_1C_Cerco' + '_t4_' +  as).val(data.P4_2_1C_Cerco);
				$('#P4_2_1D_Estruc' + '_t4_' +  as).val(data.P4_2_1D_Estruc);
				$('#P4_2_1E_EstCons' + '_t4_' +  as).val(data.P4_2_1E_EstCons);
				$('#P4_2_1F_Opin' + '_t4_' +  as).val(data.P4_2_1F_Opin);
				as++;
			}
	});
});
$('#P4_2_CantTram_Lizq').trigger('change');
	/*************/

}); 
</script>