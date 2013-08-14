	<div class="row-fluid ">

		<div class="span12 preguntas_n">
			<h3>CENSO  DE INFRAESTRUCTURA EDUCATIVA</h3>
			<h4>CONVOCATORIA DE PERSONAL</h4>
		</div>

	</div>
						<?php
							$cierre=0;
							$i=0;
							foreach($datos->result() as $filas){

							if ($filas->cierre>0){
								$cierre++;
								$i++;
								if ($i==1) {
									# code...
									echo '<h5>Se convoca personal para el Censo de Infraestructura Educativa, para ocupar los cargos siguientes:</h5>';
								}
						?>
						<div class="well modulo">
						<div class="accordion" id="accordion2">
						<div class="accordion-group">
							<div class="accordion-heading_new">
              				<a class="accordion-toggle_new" data-toggle="collapse" data-parent="#accordion2" href=<?php echo  "#collapse".$i ?>>
              						<h5><?php	echo $i.".- ".utf8_encode($filas->CargoFunciona); ?></h5>
              				</a>
	             			</div>
	             				<div id=<?php echo  "collapse".$i ?> class="accordion-body collapse">
			              			<div class="accordion-inner_new">

										<div class="span12">
											<h5>1.1.	Objetivo</h5>
											<p><?php echo utf8_encode($filas->objetivo); ?></p>
											<h5>1.2.	Perfil de personal</h5>
											<p><?php echo utf8_encode($filas->perfil); ?></p>
											<h5>1.3.	Proceso de selección </h5>
											<p><?php echo utf8_encode($filas->proceso); ?></p>
											<h5>1.4.	Periodo de contratación</h5>
											<p>• <?php echo utf8_encode($filas->periodo); ?></p>
											<h5>1.5.	Cantidad requerida: <?php echo utf8_encode($filas->peaConvocatoria); ?></h5>
											<h5>1.6.	Modalidad de contratación </h5>
											<p><?php echo utf8_encode($filas->modalidad); ?></p>

										</div>
			              			</div>
	              				</div>
	              			 </div>
	              			 </div>
	              			 </div>
              	 		<? }else{
              	 				echo '<h4>Por el momento no existen convocatorias vigentes. Gracias.</h4>';
              	 			}

              	 		} ?>
              	 		<?php if ($cierre>0) { ?>

</br>
<p><b>LAS PERSONAS QUE NO CUMPLAN CON LOS REQUISITOS SOLICITADOS, ABSTENERSE DE PRESENTARSE</b><p>
<p><b>IMPORTANTE: PARA TODOS LOS CARGOS, es necesario contar con RUC vigente al momento de la Contratación. Se verificará con SUNAT.</b></p>

<div class="row-fluid" style="margin-top:40px">
	<div class="control-group offset2">
			<?php
			echo '<label class="checkbox">';
				echo form_checkbox('acept', 1,FALSE,'id="acept"');
				echo '<p>Acepto haber leído todas las indicaciones de la inscripción de postulantes y habilitar la inscripción a la postulación</p>';
			echo '</label>';

				# code...
				echo form_button('redr', 'inscripciones','class="btn btn-inverse pull-right" id="redr"');
			}


			?>
	</div>
</div>

<script type="text/javascript">

$(function(){


        $('#redr').click(function() {
				if($('#acept').is(':checked')) {
					window.location = CI.base_url + 'index.php/inscripcion'
				}else{
					alert('Debe aceptar las condiciones para continuar.');
				}
          });
});

</script>