
  <div class="well sidebar-nav cen-sidebar">
      <ul class="nav nav-list">
          <li class="nav-header">Opciones</li>
          <li <?php echo ($option == 1) ? 'class="active"' : ''; ?> ><a href="<?php echo base_url('index.php/informes'); ?>">Inicio</a></li> 
          <li <?php echo ($option == 2) ? 'class="active"' : ''; ?> ><a href="<?php echo base_url('index.php/informes/coberturapea'); ?>">Cobertura de Personal</a></li>
          <li <?php echo ($option == 3) ? 'class="active"' : ''; ?> ><a href="<?php echo base_url('index.php/informes/estadoseleccion'); ?>">Estado de Selección</a></li>
      </ul>
  </div>