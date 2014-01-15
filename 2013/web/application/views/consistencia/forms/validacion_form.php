<?php
////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////
// REPORTE DE VALIDACION
////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////

$sede_operativa = array(
	'name'	=> 'sede_operativa',
	'id'	=> 'sede_operativa',
	'readonly'	=> 'true',
	'class' => 'input100',
);

$dpto_nombre = array(
	'name'	=> 'dpto_nombre',
	'id'	=> 'dpto_nombre',
	'readonly'	=> 'true',
	'class' => 'input100',
);

$codigo_de_local = array(
	'name'	=> 'codigo_de_local',
	'id'	=> 'codigo_de_local',
	'readonly'	=> 'true',
	'class' => 'input6',
);

$Caratula_ResultF = array(
	'name'	=> 'Caratula_ResultF',
	'id'	=> 'Caratula_ResultF',
	'readonly'	=> 'true',
	'class' => 'input2',
);

$CapI_SecA_op1 = array(
	'name'	=> 'CapI_SecA_op1',
	'id'	=> 'CapI_SecA_op1',
	'readonly'	=> 'true',
	'class' => 'input2',
);

$CapI_SecA_op2 = array(
	'name'	=> 'CapI_SecA_op2',
	'id'	=> 'CapI_SecA_op2',
	'readonly'	=> 'true',
	'class' => 'input2',
);

$CapI_SecA_op3 = array(
	'name'	=> 'CapI_SecA_op3',
	'id'	=> 'CapI_SecA_op3',
	'readonly'	=> 'true',
	'class' => 'input2',
);

$CapI_SecB_op1 = array(
	'name'	=> 'CapI_SecB_op1',
	'id'	=> 'CapI_SecB_op1',
	'readonly'	=> 'true',
	'class' => 'input2',
);

$CapI_SecB_op2 = array(
	'name'	=> 'CapI_SecB_op2',
	'id'	=> 'CapI_SecB_op2',
	'readonly'	=> 'true',
	'class' => 'input2',
);

$CapI_SecC = array(
	'name'	=> 'CapI_SecC',
	'id'	=> 'CapI_SecC',
	'readonly'	=> 'true',
	'class' => 'input2',
);

$CapII_SecG = array(
	'name'	=> 'CapII_SecG',
	'id'	=> 'CapII_SecG',
	'readonly'	=> 'true',
	'class' => 'input2',
);

$CapIII_SecA = array(
	'name'	=> 'CapIII_SecA',
	'id'	=> 'CapIII_SecA',
	'readonly'	=> 'true',
	'class' => 'input2',
);

$CapIV_SecB = array(
	'name'	=> 'CapIV_SecB',
	'id'	=> 'CapIV_SecB',
	'readonly'	=> 'true',
	'class' => 'input2',
);

$CapV_TotEdf = array(
	'name'	=> 'CapV_TotEdf',
	'id'	=> 'CapV_TotEdf',
	'readonly'	=> 'true',
	'class' => 'input2',
);

$CapVI_SecA = array(
	'name'	=> 'CapVI_SecA',
	'id'	=> 'CapVI_SecA',
	'readonly'	=> 'true',
	'class' => 'input2',
);

$CapVI_SecB = array(
	'name'	=> 'CapVI_SecB',
	'id'	=> 'CapVI_SecB',
	'readonly'	=> 'true',
	'class' => 'input2',
);

$CapVI_SecE = array(
	'name'	=> 'CapVI_SecE',
	'id'	=> 'CapVI_SecE',
	'readonly'	=> 'true',
	'class' => 'input2',
);

$CapVII_SecB = array(
	'name'	=> 'CapVII_SecB',
	'id'	=> 'CapVII_SecB',
	'readonly'	=> 'true',
	'class' => 'input2',
);

$CapVIII_SecB_op1 = array(
	'name'	=> 'CapVIII_SecB_op1',
	'id'	=> 'CapVIII_SecB_op1',
	'readonly'	=> 'true',
	'class' => 'input2',
);

$CapVIII_SecB_op2 = array(
	'name'	=> 'CapVIII_SecB_op2',
	'id'	=> 'CapVIII_SecB_op2',
	'readonly'	=> 'true',
	'class' => 'input2',
);

$CapVIII_SecB_op3 = array(
	'name'	=> 'CapVIII_SecB_op3',
	'id'	=> 'CapVIII_SecB_op3',
	'readonly'	=> 'true',
	'class' => 'input2',
);

$CapVIII_SecB_op4 = array(
	'name'	=> 'CapVIII_SecB_op4',
	'id'	=> 'CapVIII_SecB_op4',
	'readonly'	=> 'true',
	'class' => 'input2',
);



$attr = array('class' => 'form-vertical form-auth','id' => 'validacion_f');

?>
<div class="panel panel-info">

	<?php echo form_open($this->uri->uri_string(),$attr); ?>
	<table border="1">
		<tr>
			<th colspan="3">Sede Operativa</th>
			<th><?php echo form_input($sede_operativa); ?></th>
		</tr>
		<tr>
			<th colspan="3">Departamento</th>
			<th><?php echo form_input($dpto_nombre); ?></th>
		</tr>
		<tr>
			<th colspan="3">Cod. Local</th>
			<th><?php echo form_input($codigo_de_local); ?></th>
		</tr>
		<tr>
			<th colspan="2">CARATULA</th>
			<th>Resultado Final</th>
			<th><?php echo form_input($Caratula_ResultF); ?></th>
		</tr>
		<tr>
			<th rowspan="6">CAP. I</th>
			<th rowspan="3">SEC. A</th>
			<th>PREGUNTA 1, Cuantas instituciones educativas prestan servicio en este local escolar?</th>
			<th><?php echo form_input($CapI_SecA_op1); ?></th>
		</tr>
		<tr>
			<th>NUMERO DE RESPUESTA DE LA PREGUNTA 2.8 cuantos codigos modulares tiene asignada la institucion educativa?</th>
			<th><?php echo form_input($CapI_SecA_op2); ?></th>
		</tr>
		<tr>
			<th>"NUMERO DE RESPUESTA DE LA PREGUNTA 2.9 CÓDIGO MODULAR Columna (a)"</th>
			<th><?php echo form_input($CapI_SecA_op3); ?></th>
		</tr>
		<tr>
			<th rowspan="2">SEC. B</th>
			<th>PREGUNTA 1 Cuantos predios ocupa el local escolar?</th>
			<th><?php echo form_input($CapI_SecB_op1); ?></th>
		</tr>
		<tr>
			<th>PREGUNTA 3.8 Cuál es el área del terreno que ocupa el local escolar en este predio</th>
			<th><?php echo form_input($CapI_SecB_op2); ?></th>
		</tr>
		<tr>
			<th>SEC. C</th>
			<th>ANEXOS DE LA INSTITUCIÓN EDUCATIVA  PREGUNTA 16, Cual es el area del terreno que ocupa el predio</th>
			<th><?php echo form_input($CapI_SecC); ?></th>
		</tr>
		<tr>
			<th>CAP. II</th>
			<th>SEC. G</th>
			<th>PREGUNTA 1. En el local escolar existen obras en ejecucion</th>
			<th><?php echo form_input($CapII_SecG); ?></th>
		</tr>
		<tr>
			<th>CAP. III</th>
			<th>SEC. A</th>
			<th>PREGUNTA 3. Toma de Ultima coordenada.</th>
			<th><?php echo form_input($CapIII_SecA); ?></th>
		</tr>
		<tr>
			<th>CAP. IV</th>
			<th>SEC. B</th>
			<th>PREGUNTA 4 De cuántos tramos está conformado el lindero izquierdo con o sin cerco?</th>
			<th><?php echo form_input($CapIV_SecB); ?></th>
		</tr>
		<tr>
			<th>CAP. V</th>
			<th>RESUMEN</th>
			<th>TOTAL DE EDIFICACIONES</th>
			<th><?php echo form_input($CapV_TotEdf); ?></th>
		</tr>
		<tr>
			<th rowspan="3">CAP. VI</th>
			<th>SEC. A</th>
			<th>PREGUNTA 10 ¿ Los niveles o modalidades que hacen uso de esta edificación son :  Ítem 14</th>
			<th><?php echo form_input($CapVI_SecA); ?></th>
		</tr>
		<tr>
			<th>SEC. B</th>
			<th>PREGUNTA 15 Material predominante del piso</th>
			<th><?php echo form_input($CapVI_SecB); ?></th>
		</tr>
		<tr>
			<th>SEC. E</th>
			<th>PREGUNTA 1 Esta edificación tiene instaladas canaletas aéreas y bajadas pluviales?</th>
			<th><?php echo form_input($CapVI_SecE); ?></th>
		</tr>
		<tr>
			<th>CAP. VII</th>
			<th>SEC. B</th>
			<th>PREGUNTA 1 En base a los resultados obtenidos en la evaluación, ¿ Cuál es la intervención a realizar en la edificación?</th>
			<th><?php echo form_input($CapVII_SecB); ?></th>
		</tr>
		<tr>
			<th rowspan="4">CAP. VIII</th>
			<th rowspan="4">SEC. B</th>
			<th>PREGUNTA 2.6 SECCIÓN A PATIOS Recomendación técnica de la evaluación de la edificación?</th>
			<th><?php echo form_input($CapVIII_SecB_op1); ?></th>
		</tr>
		<tr>
			<th>PREGUNTA 4.6 SECCIÓN A LOSAS Recomendación técnica de la evaluación de la edificación?</th>
			<th><?php echo form_input($CapVIII_SecB_op2); ?></th>
		</tr>
		<tr>
			<th>PREGUNTA 6.7 SECCIÓN A CISTERNA Recomendación técnica de la evaluación de la edificación?</th>
			<th><?php echo form_input($CapVIII_SecB_op3); ?></th>
		</tr>
		<tr>
			<th>PREGUNTA 8.7 SECCIÓN A MUROS DE CONTENCIÓN Recomendación técnica de la evaluación de la edificación?</th>
			<th><?php echo form_input($CapVIII_SecB_op4); ?></th>
		</tr>
	</table>
	<br>

	<?php  echo form_submit('send', 'Terminado','class="btn btn-primary pull-right"') ?>

	<?php echo form_close(); ?>

</div>


<script type="text/javascript">

$(document).ready(function(){

	$('#ctab10').bind('click', function (e) {

        $.getJSON(urlRoot('index.php')+'/consistencia/validacion/', {codigo:'<?php echo $cod; ?>'}, function(data, textStatus) {

        	$.each( data, function(index, val) {
				$('#sede_operativa').val(val.sede_operativa);
				$('#dpto_nombre').val(val.dpto_nombre);
				$('#codigo_de_local').val(val.codigo_de_local);
				$('#Caratula_ResultF').val(val.Caratula_ResultF);
				$('#CapI_SecA_op1').val(val.CapI_SecA_op1);
				$('#CapI_SecA_op2').val(val.CapI_SecA_op2);
				$('#CapI_SecA_op3').val(val.CapI_SecA_op3);
				$('#CapI_SecB_op1').val(val.CapI_SecB_op1);
				$('#CapI_SecB_op2').val(val.CapI_SecB_op2);
				$('#CapI_SecC').val(val.CapI_SecC);
				$('#CapII_SecG').val(val.CapII_SecG);
				$('#CapIII_SecA').val(val.CapIII_SecA);
				$('#CapIV_SecB').val(val.CapIV_SecB);
				$('#CapV_TotEdf').val(val.CapV_TotEdf);
				$('#CapVI_SecA').val(val.CapVI_SecA);
				$('#CapVI_SecB').val(val.CapVI_SecB);
				$('#CapVI_SecE').val(val.CapVI_SecE);
				$('#CapVII_SecB').val(val.CapVII_SecB);
				$('#CapVIII_SecB_op1').val(val.CapVIII_SecB_op1);
				$('#CapVIII_SecB_op2').val(val.CapVIII_SecB_op2);
				$('#CapVIII_SecB_op3').val(val.CapVIII_SecB_op3);
				$('#CapVIII_SecB_op4').val(val.CapVIII_SecB_op4);

				if (val.Termino > 0) {
					$( "#validacion_f :submit" ).attr("disabled", "disabled");
					if (val.Cerrado > 0){
						$( "#validacion_f :submit" ).removeClass("btn-primary");
						$( "#validacion_f :submit" ).addClass("btn-inverse");	
					}					
				}else{
					$( "#validacion_f :submit" ).removeAttr("disabled");
				}
			});
		});
		
    });



	$("#validacion_f").validate({
	    rules: {
	    },

	    messages: {   
		//FIN MESSAGES
	    },
	    errorPlacement: function(error, element) {
	        $(element).next().after(error);
	    },
	    invalidHandler: function(form, validator) {
	      var errors = validator.numberOfInvalids();
	      if (errors) {
	        var message = errors == 1
	          ? 'Por favor corrige estos errores:\n'
	          : 'Por favor corrige los ' + errors + ' errores.\n';
	        var errors = "";
	        if (validator.errorList.length > 0) {
	            for (x=0;x<validator.errorList.length;x++) {
	                errors += "\n\u25CF " + validator.errorList[x].message;
	            }
	        }
	        alert(message + errors);
	      }
	      validator.focusInvalid();
	    },
	    submitHandler: function(form) {

	    			var bcar = $( "#validacion_f :submit" );
			        bcar.attr("disabled", "disabled");
			    	
			        var id_local = $("input[name='id_local']").val();
			        var user_id = parseInt($("input[name='user_id']").val());

			        $.ajax({
			            url: CI.site_url + "/consistencia/validacion/estado_dig",
			            type:'POST',
			            data: 'codigo='+id_local+'&usuario=' +user_id,
			            dataType:'json',
			            success:function(data){
							alert(data.msg);
							bcar.removeAttr('disabled');
							bcar.removeClass("btn-primary");
							bcar.addClass("btn-inverse");
			            }
			        });
		}
	});


});

</script>