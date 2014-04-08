
    

       <div class="navtopper navbar navbar-inverse navbar-fixed-top ">
            <div class=" navbar-inner navtopper-inner" id="navbarflex">
                <div class="container-left">
                  <div class="row">
                    <div class="span12">
                      <a href="<?php echo base_url(); ?>"><img style="margin-top: 2.5px;" src="<?php echo base_url('img/brand.jpg'); ?>"/></a>
                      <div id="oted">OFICINA TECNICA DE ESTADISTICA DEPARTAMENTALES - OTED</div>
                    </div>
                  </div>

                </div>
          </div>
      </div>
       <!--  <div class="navbar navbar-inverse navbar-fixed-top " > -->
       <div id="menu_nav2" class="navbar navbar-inverse navbar-fixed-top navbottom">
            <div class="navbar-inner">
                <div class="container-fluid">
                    <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </a>
                    <div class="nav-collapse collapse">


<style type="text/css">

#oted {
color: #00A1C7 !important;
height: 30px !important;
position: absolute !important;
right: 20px !important;
text-align: right !important;
text-transform: uppercase !important;
top: 25px !important;
font-family: 'Open Sans', sans-serif !important;
font-size: 14px !important;
}

</style>


      <?php
          if($this->tank_auth->is_logged_in()){
            $roles = $this->tank_auth->get_roles();
            if(!empty($roles)){
      ?>
        <ul class="nav">
                    <?php
                      $i = 1;
                      foreach ($roles as $role) {
                        $c = "";
                        if($this->uri->segment(1) == $role->url){
                          $c = ' class="active"';
                        }
                    ?>
                    <li <?php echo $c; ?>><?php echo anchor(base_url()  . strtolower($role->url), $i++ . '. ' . utf8_encode($role->rolename)); ?></li>
                    <?php
                      }
                    ?>

          </ul>
              <?php } }else{?>
               <ul class="nav">
                   <li><a href="<?php echo base_url('index.php/convocatoria/consulta'); ?>">Consulta de Inscripción</a></li>
                   <li><a href="<?php echo base_url('index.php/convocatoria/contacto'); ?>">Contacto</a></li>
                   <li><a href="<?php echo base_url('index.php/convocatoria/resultados'); ?>">Resultados</a></li>
                   <li><a href="<?php echo base_url('index.php/auth/login'); ?>">Login</a></li>
                   <li><a href="<?php echo base_url('index.php/bpr/menu'); ?>">BPR</a></li>
                </ul>

            <?php }?>



                    </div>
                </div>
            </div>
        </div>



        <?php if(isset($fluid)){ ?>
        <div class="container-fluid front">
        <?php }else{ ?>
        <div class="container front">
        <?php } ?>
         <?php

                $this->load->view('backend/includes/breadcrumb');

        ?>