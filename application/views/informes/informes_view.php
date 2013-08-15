<div class="row-fluid">
  <div id="ap-sidebar" class="span2">
  	<?php
	  	switch ($rol) 
	  	{
			case '10':
				$this->load->view('informes/includes/sidebar_view.php'); 	
				break;
	  		
			case '3':
	  			$this->load->view('informes/includes/sidebar_segmentacion_view.php');
			break;
		}
  	?>
  </div>
</div>