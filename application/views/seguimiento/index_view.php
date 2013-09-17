<div class="row-fluid">
  <div class="offset4 span4">
    <div class="well sidebar-nav cen-sidebar">
      <ul class="nav nav-list">
        <li class="nav-header">Módulos de Seguimiento</li>
        <li><a href="<?php echo site_url('seguimiento/registro_seguimiento'); ?>">Registro de Seguimiento</a></li>
        <li><a href="<?php echo site_url('seguimiento/menu_consultas'); ?>">Módulo de Consultas</a></li>
        <?php if ($user_id==1) { ?>
    		<li><a href="<?php echo site_url('seguimiento/mantenimiento_fotos'); ?>">Mantenimiento de Fotos</a></li>
		<?php } ?>
      </ul>
    </div>
  </div>
</div>