<div class="row-fluid">
	<div class="offset4 span4">
		<div class="well sidebar-nav cen-sidebar">
			<ul class="nav nav-list">
				<li class="nav-header">Módulos de Recursos Humanos</li>
				<li><a href="<?php echo site_url('convocatoria/convocatoria_interno'); ?>">Inscripción</a></li>
				<li><a href="<?php echo site_url('convocatoria/mantenimiento'); ?>">Modificación de Inscripción</a></li>
				<li><a href="<?php echo site_url('seleccion/aprobacioncv'); ?>">Aprobación de CV</a></li>
				<li><a href="<?php echo site_url('seleccion/capacitacion'); ?>">Capacitación</a></li>
				<li><a href="<?php echo site_url('seleccion/seleccionpea'); ?>">Selección</a></li>
				<li><a href="<?php echo site_url('informes/coberturapea'); ?>">Reporte de Cobertura de Personal</a></li>
				<li><a href="<?php echo site_url('informes/estadoseleccion'); ?>">Reporte de Estado de Selección</a></li>				
				<?php if ($user_id==1 || $user_id==69) { ?>
				<li><a href="<?php echo site_url('seguimiento/mantenimiento_fotos'); ?>">Mantenimiento de Fotos</a></li>
				<?php } ?>
			</ul>
		</div>
	</div>
</div>