

<div class="row-fluid"  style="padding-bottom:10px;padding-top:10px" ></div>
	<h3>METADATOS</h3><hr>
<table id="tab_meta"  >
	<tr>
		<td style='width="30px";'><h5>1. TABULADO </h5></td><td colspan="10" style="padding-left:2em"><textarea class="span12" id="txt_tabulado" name="txt_tabulado" rows="1" cols="160"><?php //echo $txt_tabulado; ?></textarea></td>
	</tr>
	<tr>
		<td style='width="30px";'><h5>2. CONTENIDO </h5></td><td colspan="10" style="padding-left:2em"><textarea class="span12" id="txt_contenido" name="txt_contenido" rows="1" cols="160"><?php //echo $txt_contenido; ?></textarea></td>
	</tr>
	<tr>
		<td style='width="30px";'><h5>3. CASOS </h5></td><td colspan="10" style="padding-left:2em"><textarea class="span12" id="txt_casos" name="txt_casos" rows="1" cols="160"><?php //echo $txt_casos; ?></textarea></td>
	</tr>
	<tr>
		<td style='width="30px";'><h5>4. VARIABLES </h5></td><td colspan="10" style="padding-left:2em"><textarea class="span12" id="txt_variables" name="txt_variables" rows="1" cols="160"><?php //echo $txt_variables; ?></textarea></td>
	</tr>
	<tr>
		<td style='width="30px";'><h5>5. ALTERNATIVAS </h5></td><td colspan="10" style="padding-left:2em"><textarea class="span12" id="txt_alternativas" name="txt_alternativas" rows="1" cols="160"><?php //echo $txt_alternativas; ?></textarea></td>
	</tr>
	<tr>
		<td style='width="30px";'><h5>6. OTRO </h5></td><td colspan="10" style="padding-left:2em"><textarea class="span12" id="txt_otro" name="txt_otro" rows="1" cols="160"><?php //echo $txt_otro; ?></textarea></td>
	</tr>		
	<tr>
		<td style='width="30px";'><h5>7. DATOS FALTANTES </h5></td><td colspan="10" style="padding-left:2em"><textarea class="span12" id="txt_faltantes" name="txt_faltantes" rows="1" cols="160"><?php //echo $txt_faltantes; ?></textarea></td>
	</tr>
	<tr>
		<td style='width="30px";'><h5>8. INSTITUCIÓN </h5></td><td colspan="10" style="padding-left:2em"><textarea class="span12" id="txt_productor" name="txt_productor" rows="1" cols="160"><?php //echo $txt_productor; ?></textarea></td>
	</tr>		
	<tr>
		<td style='width="30px";'><h5>9. DEFINICIONES </h5></td><td colspan="10" style="padding-left:2em"><textarea class="span12" id="txt_definiciones" name="txt_definiciones" rows="10" cols="160"><?php //echo $txt_definiciones; ?></textarea></td>
	</tr>
</table>
<input type="hidden" id="cantidad_var" name="cantidad_var" value="<?php echo count($series); ?>">
<input type="hidden" id="nombre_var" name="nombre_var" value="<?php echo $series[0]['name']; ?>">

<hr>
<div class="row-fluid"  style="padding-bottom:10px;padding-top:7px" >
	<input type="submit" class="btn btn-success pull-left" id="excel" value="↓ Excel" name="excel">
	<input type="button" class="btn btn-primary pull-right" id="btn_metadata" name="btn_metadata" value="Guardar" >
	<!-- <input type="hidden"  id="metadata_div"  name="metadata_div" > -->

</div>


<script type="text/javascript">

$(function(){


      	//carga la tabla dentro del objeto
      	//$("#metadata_div").val( $("<div>").append( $("#tab_meta").eq(0).clone()).html());

      	//Deshabilitar comentario
		<?php
      		if($restriccion){//para usuarios no permitidos (solo: Alan, Susan, Cecilia)
      	?>
      		$("#txt_tabulado").attr('readonly','readonly');
      		$("#txt_contenido").attr('readonly','readonly');
      		$("#txt_casos").attr('readonly','readonly');
      		$("#txt_variables").attr('readonly','readonly');
      		$("#txt_alternativas").attr('readonly','readonly');
      		$("#txt_otro").attr('readonly','readonly');
      		$("#txt_faltantes").attr('readonly','readonly');
      		$("#txt_productor").attr('readonly','readonly');
      		$("#txt_definiciones").attr('readonly','readonly');
      		$("#btn_metadata").addClass('hide');
      	<?php
      		}
      	?>
		var direccion ;
		<?php if ($opcion<100) {
			echo 'direccion = "tabulados/pescador/metadata" ;';
		} else if ($opcion<198){
			echo 'direccion = "tabulados/acuicultor/metadata" ;';
		}else if ($opcion<253){
			echo 'direccion = "tabulados/comunidad/metadata" ;';
		}; ?>
	
		$('#btn_metadata').click(function() {

				    var t_data = {
			            csrf_token_c: CI.cct,
			            txt_tabulado: $("#txt_tabulado").val(),
			            txt_contenido: $("#txt_contenido").val(),
			            txt_casos: $("#txt_casos").val(),
			            txt_variables: $("#txt_variables").val(),
			            txt_alternativas: $("#txt_alternativas").val(),
			            txt_otro: $("#txt_otro").val(),
			            txt_faltantes: $("#txt_faltantes").val(),
			            txt_productor: $("#txt_productor").val(),
			            txt_definiciones: $("#txt_definiciones").val(),
			            preg: <?php echo $opcion; ?>,
			            tipo: 1,
			            ajax:1							    	   
				    };
					
			        var bsub3 = $(this);
			        bsub3.attr("disabled", "disabled");

			        $.ajax({
			            url: CI.base_url + direccion ,
			            type:'POST',
			            data:t_data,
			            success:function(){
			            	alert('Se guardó con éxito');
							bsub3.removeAttr('disabled');
			            }
			        });   

					
 		}); 


 




 }); 		

</script>