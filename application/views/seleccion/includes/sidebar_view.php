
  <div class="well sidebar-nav cen-sidebar">
      <ul class="nav nav-list">
          <li class="nav-header">Opciones</li>
          <li <?php echo ($option == 1) ? 'class="active"' : ''; ?> ><a href="<?php echo base_url('index.php/seleccion'); ?>">Inicio</a></li> 
          <li <?php echo ($option == 2) ? 'class="active"' : ''; ?> ><a href="<?php echo base_url('index.php/seleccion/aprobacioncv'); ?>">Aprobación de CV</a></li>
          <li <?php echo ($option == 3) ? 'class="active"' : ''; ?> ><a href="<?php echo base_url('index.php/seleccion/capacitacion'); ?>">Capacitación</a></li>
          <li <?php echo ($option == 4) ? 'class="active"' : ''; ?> ><a href="<?php echo base_url('index.php/seleccion/seleccionpea'); ?>">Selección</a></li>
      </ul>
  </div>