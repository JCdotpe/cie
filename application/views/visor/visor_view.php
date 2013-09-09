
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
          <?php $this->load->view('visor/caratula1.php');?>
					<?php $this->load->view('visor/cap1.php');?>
          <?php $this->load->view('visor/cap2.php');?>
          <?php $this->load->view('visor/cap3.php');?>

	  	    	<!--END SECCION CIE01-->

	  	    	<!--  SECCION CIE01A-->
					<?php $this->load->view('visor/caratula2.php');?>
          <?php $this->load->view('visor/cap4.php');?>
          <?php $this->load->view('visor/cap5.php');?>
          <?php $this->load->view('visor/cap6.php');?>

	  	    	<!--END SECCION CIE01A-->

	  	    	<!--  SECCION  CIE01B-->
	  	    <?php $this->load->view('visor/caratula3.php');?>
          <?php $this->load->view('visor/cap7.php');?>
          <?php $this->load->view('visor/cap8.php');?>
	  	    	 <!-- END SECCION CIE01B-->


			</div><!--END TAB CONTENTS-->

        </div>

      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->

