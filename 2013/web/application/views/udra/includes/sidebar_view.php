
  <div class="well sidebar-nav cen-sidebar">
      <ul class="nav nav-list">
          <li class="nav-header">OPCIONES</li>
          <li <?php echo ($option == 1) ? '' : ''; ?> ><a href="<?php echo base_url('index.php/registro'); ?>">Registro</a></li>
          <li <?php echo ($option == 2) ? '' : ''; ?> ><a href="<?php echo base_url('index.php/udra'); ?>">Reportes</a></li>
          <!--
          <li <?php echo ($option == 1) ? 'class="active"' : ''; ?> ><a href="<?php echo base_url('index.php/udra'); ?>">Registro</a></li>
          <li <?php echo ($option == 2) ? 'class="active"' : ''; ?> ><a href="<?php echo base_url('index.php/udra_reporte'); ?>">Reportes</a></li>
          <li <?php echo ($option == 2) ? 'class="active"' : ''; ?> ><a href="<?php echo base_url('index.php/udra_registro'); ?>">Formularios</a></li>
        -->
          <!--
          <li <?php #echo ($option == 2) ? 'class="active"' : ''; ?> ><a href="<?php #echo base_url('index.php/festividad'); ?>">Festividad</a></li>
      -->
      </ul>
  </div>