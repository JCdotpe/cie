
<div class="well sidebar-nav cen-sidebar">
	<ul class="nav nav-list">
		<li class="nav-header">Opciones</li>
		<li <?php echo ($option == 1) ? 'class="active"' : ''; ?> ><a href="<?php echo base_url('index.php/seguimiento'); ?>">Inicio</a></li>
		<li <?php echo ($option == 2) ? 'class="active"' : ''; ?> ><a href="<?php echo base_url('index.php/seguimiento/reporte_odei'); ?>">Reporte por ODEI</a></li>
		<li <?php echo ($option == 3) ? 'class="active"' : ''; ?> ><a href="<?php echo base_url('index.php/seguimiento/reporte_avance_odei'); ?>">Reporte de Avance por ODEI</a></li>
		<li <?php echo ($option == 4) ? 'class="active"' : ''; ?> ><a href="<?php echo base_url('index.php/seguimiento/reporte_ubigeo'); ?>">Reporte por Ubigeo</a></li>
		<li <?php echo ($option == 5) ? 'class="active"' : ''; ?> ><a href="<?php echo base_url('index.php/seguimiento/reporte_avance_ubigeo'); ?>">Reporte de Avance por Ubigeo</a></li>
	</ul>
</div>