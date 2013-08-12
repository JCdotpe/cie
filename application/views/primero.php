<?php

$txtprueba = array('name' => 'prueba' , 'id' => 'prueba' , 'onblur' => 'validar()' );

?>
<!doctype html>
<html>
<head>
	<title></title>
	
	<script src="<?php echo base_url('js/jquery-1.9.1.min.js'); ?>"></script>
	<script src="<?php echo base_url('js/jquery-ui-1.10.2.custom.min.js'); ?>"></script>
	<script src="<?php echo base_url('js/primero.js'); ?>"></script>
	
</head>
<body>
	<?php echo form_open(''); ?>
	<?php echo form_input($txtprueba); ?>
	<?php echo form_close(); ?>
	<div id="aviso">
		
	</div>
</body>
</html>