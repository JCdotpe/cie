
<?php 

$label_class =  array('class' => 'control-label');
$span_class =  'span10';
$span_class2 =  'span10'; 

$nombres = array(
	'name'	=> 'nombres',
	'id'	=> 'nombres',
	'value'	=> set_value('nombres'),
	'maxlength'	=> 100,
	'class' => $span_class,	
);

$correo = array(
	'name'	=> 'correo',
	'id'	=> 'correo',
	'value'	=> set_value('correo'),
	'maxlength'	=> 100,
	'class' => $span_class
);

$asunto = array(
	'name'	=> 'asunto',
	'id'	=> 'asunto',
	'value'	=> set_value('asunto'),
	'maxlength'	=> 120,
	'class' => $span_class
);

$mensaje = array(
	'name'	=> 'mensaje',
	'id'	=> 'mensaje',
	'value'	=> set_value('mensaje'),
	'maxlength'	=> 1000,
	'class' => $span_class,
	'rows'	=>3,
);

$attr = array('class' => 'form-val','id' => 'form_contacto', 'style' => 'overflow: auto;');

echo form_open($this->uri->uri_string(),$attr); 

	echo '<div class="row-fluid">';
		echo '<div class="span10">';
		if ($this->session->flashdata('msgbox')===1){
		    echo '<div class="alert alert-success">';
			    echo '<button class="close" data-dismiss="alert" type="button">×</button>';
			    echo 'Su consulta fue enviada satisfactoriamente';
		    echo '</div>';
		} elseif ($this->session->flashdata('msgbox')===2) {
		    echo '<div class="alert alert-error">';
			    echo '<button class="close" data-dismiss="alert" type="button">×</button>';
			    echo '<strong>Error! </strong>';
			    echo ' Inesperado vuelva a intentarlo';
		    echo '</div>';			
		}		
			echo '<h3>CONTÁCTANOS </h3>';
			echo '<p>Si presento algún problema durante su inscripción en el sistema o tiene alguna duda por favor háganos saber.</p>';
		echo '</div>';

	echo '</div>';

	echo '<div class="row-fluid">';

		echo '<div class="span10">';

			echo '<div class="row-fluid">';

				echo '<div class="span10">';
					echo '<h5>Nombres </h5>';
				echo '</div>';

			echo '</div>';

			echo '<div class="row-fluid">';

				echo '<div class="span6">';
					echo '<div class="control-group">';
							echo '<div class="controls">';
								echo form_input($nombres); 
								echo '<span class="help-inline">*</span>';
								echo '<div class="help-block error">' . form_error($nombres['name']) . '</div>';
							echo '</div>';	
					echo '</div>'; 
				echo '</div>';	

			echo '</div>';	

		echo '</div>';	

	echo '</div>';


	echo '<div class="row-fluid">';

		echo '<div class="span10">';

			echo '<div class="row-fluid">';

				echo '<div class="span10">';
					echo '<h5>Correo Electronico</h5>';
				echo '</div>';

			echo '</div>';

			echo '<div class="row-fluid">';

				echo '<div class="span6">';
					echo '<div class="control-group">';
							echo '<div class="controls">';
								echo form_input($correo); 
								echo '<span class="help-inline">*</span>';
								echo '<div class="help-block error">' . form_error($correo['name']) . '</div>';
							echo '</div>';	
					echo '</div>'; 
				echo '</div>';	

			echo '</div>';	

		echo '</div>';	

	echo '</div>';

	echo '<div class="row-fluid">';

		echo '<div class="span10">';

			echo '<div class="row-fluid">';

				echo '<div class="span6">';
					echo '<h5>Asunto </h5>';
				echo '</div>';

			echo '</div>';

			echo '<div class="row-fluid">';

				echo '<div class="span6">';
					echo '<div class="control-group">';
							echo '<div class="controls">';
								echo form_input($asunto); 
								echo '<span class="help-inline">*</span>';
								echo '<div class="help-block error">' . form_error($asunto['name']) . '</div>';
							echo '</div>';	
					echo '</div>'; 
				echo '</div>';	

			echo '</div>';	

		echo '</div>';	

	echo '</div>';


	echo '<div class="row-fluid">';

		echo '<div class="span10">';

			echo '<div class="row-fluid">';

				echo '<div class="span6">';
					echo '<h5>Mensaje</h5>';
				echo '</div>';

			echo '</div>';

			echo '<div class="row-fluid">';

				echo '<div class="span6">';
					echo '<div class="control-group">';
							echo '<div class="controls">';
								echo form_textarea($mensaje); 
								echo '<span class="help-inline">*</span>';
								echo '<div class="help-block error">' . form_error($mensaje['name']) . '</div>';
							echo '</div>';	
					echo '</div>'; 
				echo '</div>';	

			echo '</div>';	

		echo '</div>';	

		echo '<div class="row-fluid">';

			echo '<div class="span6">';
				echo $recaptcha_html;
				echo form_error('recaptcha_response_field');
			echo '</div>';

		echo '</div>';
		echo '</br>';
		echo '<div class="row-fluid">';

			echo '<div class="span4">';

				echo form_submit('send', 'Enviar','class="btn btn-inverse pull-left"'); 

			echo '</div>';

		echo '</div>';

	echo '</div>';

echo form_close();	

 ?>