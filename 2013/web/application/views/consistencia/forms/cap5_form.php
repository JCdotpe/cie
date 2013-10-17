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
	'maxlength'	=> 2,
	'class' => 'input2',		
);

$P5_Tot_P = array(
	'name'	=> 'P5_Tot_P',
	'id'	=> 'P5_Tot_P',
	'maxlength'	=> 2,
	'class' => 'input2',			
);

$P5_Tot_LD = array(
	'name'	=> 'P5_Tot_LD',
	'id'	=> 'P5_Tot_LD',
	'maxlength'	=> 2,
	'class' => 'input2',			
);

$P5_Tot_CTE = array(
	'name'	=> 'P5_Tot_CTE',
	'id'	=> 'P5_Tot_CTE',
	'maxlength'	=> 2,
	'class' => 'input2',			
);

$P5_Tot_MC = array(
	'name'	=> 'P5_Tot_MC',
	'id'	=> 'P5_Tot_MC',
	'maxlength'	=> 2,
	'class' => 'input2',			
);

$P5_Tot_L1 = array(
	'name'	=> 'P5_Tot_L1',
	'id'	=> 'P5_Tot_L1',
	'maxlength'	=> 2,
	'class' => 'input2',			
);

$P5_Tot_R = array(
	'name'	=> 'P5_Tot_R',
	'id'	=> 'P5_Tot_R',
	'maxlength'	=> 2,
	'class' => 'input2',			
);

$P5_Opin = array(
	'name'	=> 'P5_Opin',
	'id'	=> 'P5_Opin',
	'maxlength'	=> 2,
	'class' => 'input2',			
);

// FIN TABLA P5 - Capitulo V

// TABLA P5_F - Capitulo V

$P5_cantNroPiso = array(
	'name'	=> 'P5_cantNroPiso',
	'id'	=> 'P5_cantNroPiso',
	'class' => 'input1',	
	'maxlength'	=> 2,
);

$P5_NroPiso = array(
	'name'	=> 'P5_NroPiso',
	'id'	=> 'P5_NroPiso',
	'disabled' => 'disabled',
	'class' => 'input1',	
);

$P5_Foto = array(
	'name'	=> 'P5_Foto',
	'id'	=> 'P5_Foto',
	'disabled' => 'disabled',
	'class' => 'input98p',
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
	'maxlength'	=> 2,
	'class' => 'input2',		
);

// TABLA P5_N - Capitulo V


////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////
// CAP 5
////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////

echo '

<div id="cap_5" class="panel panel-info">
	  	    				<div class="panel-heading">Capitulo V: Esquema de distribución de las edificaciones con ambientes</div>


	  	    				<h3>Resumen</h3>


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

		  	    			<h3>Pisos</h3>	  	    				

	  	    				<p>Número de pisos: '.form_input($P5_cantNroPiso).'</p>

	  	    				


	  	    			</div>

';

 ?>

<script type="text/javascript">

$(function(){

//cap5
$.each( <?php echo json_encode($cap5_i->row()); ?>, function(fila, valor) {
	   $('#' + fila).val(valor);
});

$('#P5_cantNroPiso').val(<?php echo $cap5_f->num_rows(); ?>);

$('#P5_cantNroPiso').change(function(event) {
	$('#cap_5 table').remove('#cap5_detalle');
	var ahua = $(this).val();
	var edi = document.getElementById('P5_Tot_E').value;
	for(var i=1; i<=ahua;i++){
		var asd = '<table id="cap5_detalle" class="table table-bordered">';
		asd+='<thead><tr>';
		asd+='<thead><tr>';
		asd+='<th colspan="2">Piso N° <input type="text" class="span3 embc' + i + '" name="P5_NroPiso' + '_p_' + i + '" id="P5_NroPiso' + '_p_' + i + '" value="" ></th>';
		asd+='</tr></thead>';
		asd+='<tbody id="piso' + i + '">';
		asd+='<tr><td colspan="2"><input type="text" class="input98p" disabled="disabled" name="P5_Foto' + '_p_' + i + '" id="P5_Foto' + '_p_' + i + '" value="" ></td></tr>';
			for (var j=1;j<=edi;j++){
				asd+='<tr class="detalle"><th>Edificación N° <input type="text" class="span3 embc' + i + '" name="P5_Ed_Nro' + '_p_' + i  + '_e_' + j + '" id="P5_Ed_Nro' + '_p_' + i + '_e_' + j + '" value="" ></th>';
				asd+='<td>Cantidad de Ambientes: <input type="text" class="input2" maxlength="2" name="P5_TotAmb' + '_p_' + i + '_a_' + j + '" id="P5_TotAmb' + '_p_' + i + '_a_' + j + '" value="" ></td></tr>';
			}
		asd+='</tbody></table>';
		$('#cap_5').append(asd);
	}

	var as = 1;
	$.each( <?php echo json_encode($cap5_f->result()); ?>, function(i, data) {
			$('#P5_NroPiso' + '_p_' + as).val(data.P5_NroPiso);
			$('#P5_Foto' + '_p_' + as).val(data.P5_Foto);
			
			$.getJSON(urlRoot('index.php')+'/consistencia/cap5/cap5_n/', {codigo:data.id_local,predio:data.Nro_Pred,piso:data.P5_NroPiso}, function(data, textStatus) {
					var ad = 1;
					$.each(data, function(index, val) {
						$('#P5_Ed_Nro' + '_p_' + val.P5_NroPiso + '_e_' + ad).val(val.P5_Ed_Nro);
						$('#P5_TotAmb' + '_p_' + val.P5_NroPiso + '_a_' + ad).val(val.P5_TotAmb);
						ad++;
					});
			});

			as++;
	});

});
$('#P5_cantNroPiso').trigger('change');


$('#P5_Tot_E').change(function(event) {
	$('#cap5_detalle > tbody > tr').remove('.detalle');
	var ahua = $(this).val();
	var n_pisos = $('#P5_cantNroPiso').val();
	
	for(var i=1; i<=n_pisos;i++){
		var asd = "";
			for (var j=1;j<=ahua;j++){
				asd+='<tr class="detalle"><th>Edificación N° <input type="text" class="span3 embc' + i + '" name="P5_Ed_Nro' + '_p_' + i  + '_e_' + j + '" id="P5_Ed_Nro' + '_p_' + i + '_e_' + j + '" value="" ></th>';
				asd+='<td>Cantidad de Ambientes: <input type="text" class="input2" maxlength="2" name="P5_TotAmb' + '_p_' + i + '_a_' + j + '" id="P5_TotAmb' + '_p_' + i + '_a_' + j + '" value="" ></td></tr>';
			}
		$('tbody#piso'+i).append(asd);
	}
		
	for (var i=1; i<=n_pisos;i++){
		$.getJSON(urlRoot('index.php')+'/consistencia/cap5/cap5_n/', {codigo:'<?php echo $cod; ?>',predio:<?php echo $pr; ?>,piso:i}, function(data, textStatus) {
				var ad = 1;
				$.each(data, function(index, val) {
					$('#P5_Ed_Nro' + '_p_' + val.P5_NroPiso + '_e_' + ad).val(val.P5_Ed_Nro);
					$('#P5_TotAmb' + '_p_' + val.P5_NroPiso + '_a_' + ad).val(val.P5_TotAmb);
					ad++;
				});
		});
	}
});



});
</script>