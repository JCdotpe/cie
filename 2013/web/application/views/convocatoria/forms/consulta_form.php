<?php
	$dni = array(
		'name'	=> 'dni',
		'id'	=> 'dni',
		'value' => set_value('dni'),
		'maxlength'	=> 8,
		'class' => 'span3',
	);

	$captcha = array(
		'name'	=> 'captcha',
		'id'	=> 'captcha',
		'maxlength'	=> 8,
		'class' => 'span3',
	);
?>

<?php 
echo '<div class="well modulo">';
$attr = array('class' => 'form-vertical form-auth','id' => 'conv_consulta');
echo form_open($this->uri->uri_string(),$attr); 
?>
		<?php 
		echo '<h5>CONSULTA EL ESTADO DE INSCRIPCIÓN</h5>';
		echo '<div class="control-group">';
		echo form_label('Ingrese DNI', $dni['id']); 
		echo '<div class="controls">';
		echo form_input($dni); ?>
		<span class="help-block error"><?php echo form_error($dni['name']); ?><?php echo isset($errors[$dni['name']])?$errors[$dni['name']]:''; ?></span>
		<?php 
			echo '</div>'; 
			echo '</div>';
	  ?>
<?php 
echo '</div>'; 
echo form_submit('consulta', 'Consulta','class="btn btn-inverse pull-right"'); ?>
<?php 
echo form_close(); 

?>