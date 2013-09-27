
  <div class="well sidebar-nav cen-sidebar">
      <ul class="nav nav-list">
          <li class="nav-header">Opciones</li>
          <li <?php echo ($option == 1) ? 'class="active"' : ''; ?> ><a href="<?php echo base_url('index.php/segmentaciones/menu_consultas'); ?>">Inicio</a></li> 
          <li <?php echo ($option == 2) ? 'class="active"' : ''; ?> ><a href="<?php echo base_url('index.php/segmentaciones/reporte_evaluador'); ?>">Reporte de Evaluador</a></li>
          <li <?php echo ($option == 3) ? 'class="active"' : ''; ?> ><a href="<?php echo base_url('index.php/segmentaciones/reporte_jefebrigada'); ?>">Reporte de Jefe de Brigada</a></li>
          <li <?php echo ($option == 4) ? 'class="active"' : ''; ?> ><a href="<?php echo base_url('index.php/segmentaciones/listado_rutas'); ?>">Listado de Rutas</a></li>
          <li <?php echo ($option == 5) ? 'class="active"' : ''; ?> ><a href="<?php echo base_url('index.php/segmentaciones/local_sin_ruta'); ?>">Locales Sin Ruta</a></li>
      </ul>
  </div>