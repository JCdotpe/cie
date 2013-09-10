
<!--HEADER.PHP-->
	<?php $this->load->view('visor/visor_header.php');?>
<!--END HEADER.PHP-->

<!-- MAIN.PHP-->
	<?php $this->load->view('visor/visor_view_main.php');?>
<!--END MAIN -->

 <!-- Modal -->
  <div class="modal fade" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">

        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h5 class="modal-title">Seguimiento de Cedulas</h5>
        </div>

        <div class="modal-body">

        	<!-- NAVS-->
        		<?php $this->load->view('visor/nav_view.php');?>
        	<!-- END NAVS-->
			<div class="tab-content">

				<!--  SECCION CIE01-->
          <?php $this->load->view('visor/caratula1_view.php');?>
					<?php $this->load->view('visor/capitulo1_view.php');?>
          <?php $this->load->view('visor/capitulo2_view.php');?>
          <?php $this->load->view('visor/capitulo3_view.php');?>

	  	    	<!--END SECCION CIE01-->

	  	    	<!--  SECCION CIE01A-->
					<?php $this->load->view('visor/caratula2_view.php');?>
          <?php $this->load->view('visor/capitulo4_view.php');?>
          <?php $this->load->view('visor/capitulo5_view.php');?>
          <?php $this->load->view('visor/capitulo6_view.php');?>

	  	    	<!--END SECCION CIE01A-->

	  	    	<!--  SECCION  CIE01B-->
	  	    <?php $this->load->view('visor/caratula3_view.php');?>
          <?php $this->load->view('visor/capitulo7_view.php');?>
          <?php $this->load->view('visor/capitulo8_view.php');?>
	  	    	 <!-- END SECCION CIE01B-->


			</div><!--END TAB CONTENTS-->

        </div>

      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->

