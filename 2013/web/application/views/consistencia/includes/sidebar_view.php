
<div class="well sidebar-nav cen-sidebar">
	<ul class="nav nav-list">
		<li class="nav-header">Reporte de Consistencia:</li>
		<li <?php echo ($option == 1) ? 'class="active"' : ''; ?> ><a href="<?php echo base_url('index.php/consistencia/avance_digitacion'); ?>">Avance de Procesamiento</a></li>	
		<li <?php echo ($option == 2) ? 'class="active"' : ''; ?> ><a href="<?php echo base_url('index.php/consistencia/avance_digitacion/index_usuario'); ?>">Avance de Procesamiento por Usuario</a></li>	
	</ul>
</div>