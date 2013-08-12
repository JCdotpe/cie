
  <div class="well sidebar-nav cen-sidebar">
      <ul class="nav nav-list">
          <li class="nav-header">Opciones</li>
          <li <?php echo ($option == 1) ? 'class="active"' : ''; ?> ><a href="<?php echo base_url('index.php/convocatoria'); ?>">Inicio</a></li>           
          <li <?php echo ($option == 3) ? 'class="active"' : ''; ?> ><a href="<?php echo base_url('index.php/convocatoria/mantenimiento'); ?>">Mantenimiento</a></li> 
          <li><a href="<?php echo base_url('index.php/convocatoria/convocatoria'); ?>">Inscripcion</a></li> 
      </ul>
  </div>