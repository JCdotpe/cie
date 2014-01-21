<div class="row-fluid" style="padding-bottom:34px"><h5>Fuente: Instituto Nacional de Estadística e Informática - Primer Censo Nacional de Pesca Continental 2013.</h5></div>
<div class="row-fluid">
	<h3>COMENTARIO</h3><hr>
	<table>
		<tr><td style='width="30px";'><textarea class="span12" id="textn" name="textn" rows="2" cols="183"  ><?php echo $texto; ?></textarea></td></tr>
		<tr><td style='width="30px";'><textarea class="span12" id="textn_2" name="textn_2" rows="3" cols="183"  ><?php echo $texto_2; ?></textarea></td></tr>
	</table>
	
</div>
<div class="row-fluid"  style="padding-bottom:10px;padding-top:7px" >
	<!-- <input type="submit" class="btn btn-success pull-left" id="excel" value="↓ Excel" name="excel"> -->
	<input type="button" class="btn btn-primary pull-right" id="btab" value="Guardar" name="btab">
	<input type="hidden"  id="excel_div"  name="excel_div" >
	<input type="hidden"  id="reporte_n"  name="reporte_n" value= <?php  echo $opcion; ?> >	 	
</div>


<script type="text/javascript">

$(function(){

		//Mueve la fila de los totales al inicio de los deps
		$.fn.extend({ 
		  moveRow: function(oldPosition, newPosition) { 
		    return this.each(function(){ 
		      var row = $(this).find('tr').eq(oldPosition).remove(); 
		      $(this).find('tr').eq(newPosition).before(row); 
		    }); 
		   }
		 }); 
 		for (var i = 5; i<=84; i+=3) {
 			$('#tabul').moveRow(i, i-2); 

 		};
		$('#tabul').moveRow(84, 3);
		$('#tabul').moveRow(85, 4);
		$('#tabul').moveRow(86, 5);
		$(".td_remove").remove();
		$(".to_rowspan").attr('rowspan',3);
		$(".to_rowspan").css("vertical-align","middle");
		$(".td_lima > td").css("border-top","3px double");
		
      	//carga la tabla dentro del objeto
      	$("#excel_div").val( $("<div>").append( $("#tabul").eq(0).clone()).html());

      	//Deshabilitar comentario
		<?php
      		if($restriccion){//para usuarios no permitidos (solo: Alan, Susan, Cecilia)
      	?>
      		$("#textn").attr('readonly','readonly');
      		$("#textn_2").attr('readonly','readonly');
      		$("#btab").addClass('hide');
      	<?php
      		}
      	?>

		var direccion ;
		<?php 
			echo 'direccion = "/tabulados/capitulo'.$capitulo.'/texto" ;';
		?>
		$('#btab').click(function() {

				    var t_data = {
			            csrf_token_c: CI.cct,
			            texto: $("#textn").val(),
			            texto_2: $("#textn_2").val(),
			            preg: <?php echo $opcion; ?>,
			            tipo: 1,
			            ajax:1							    	   
				    };
					
			        var bsub3 = $(this);
			        bsub3.attr("disabled", "disabled");

			        $.ajax({
			            url: CI.site_url + direccion ,
			            //url: CI.base_url + direccion ,
			            type:'POST',
			            data:t_data,
			            success:function(){
			            	alert('Se guardo con éxito.');
							bsub3.removeAttr('disabled');
			            }
			        });   

					
 		}); 


 }); 		

</script>