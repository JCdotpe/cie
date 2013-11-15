
<div class="well sidebar-nav cen-sidebar">
	<ul class="nav nav-list">
		<li class="nav-header">Consultas por:</li>
		<li <?php echo ($option == 1) ? 'class="active"' : ''; ?> ><a href="<?php echo base_url('index.php/seguimiento'); ?>">Regresar</a></li>
		<li <?php echo ($option == 4) ? 'class="active"' : ''; ?> ><a href="<?php echo base_url('index.php/seguimiento/reporte_avance_odei'); ?>">Avance Diario por Sede Operativa</a></li>	
		<li <?php echo ($option == 5) ? 'class="active"' : ''; ?> ><a href="<?php echo base_url('index.php/seguimiento/reporte_avance_ubigeo'); ?>">Avance Diario por Ubigeo</a></li>
		<!--
		<li <?php #echo ($option == 2) ? 'class="active"' : ''; ?> ><a href="<?php #echo base_url('index.php/seguimiento/reporte_odei'); ?>">Registro en Tablet por Sede Operativa</a></li>
		<li <?php #echo ($option == 3) ? 'class="active"' : ''; ?> ><a href="<?php #echo base_url('index.php/seguimiento/reporte_ubigeo'); ?>">Registro en Tablet por Ubigeo</a></li>-->
		
	</ul>
</div>