
<?php 
$pr_view = ($pr == 0)? 'No se encontraron' : $pr;
 ?>
<h4>Codigo de local: <?php echo $cod; ?> - Predio <?php echo $pr_view; ?></h4>

<ul id="predios" class="predios_views">
</ul>

<script type="text/javascript">
$(function(){
	// function(i, data){
	// 	function( fila, valor )
  $.each( <?php echo json_encode($predios->result()); ?>, function(i, data) {
	  	var ahua = 'Principal';
	  	var act = (<?php echo $pr; ?> == data.Nro_Pred)? 'class="active"' : '';
	  	if(data.Nro_Pred != 1){
	  		ahua = (data.P1_B_2A_PredNoCol==0)? 'Colindante' : 'No Colindante';
	  	}

		$('#predios').append('<li ' + act + '><a target="_self"  href="' + CI.site_url + '/consistencia/local/' + data.id_local + '/' + data.Nro_Pred + '">'+ data.Nro_Pred  + ' - ' + ahua + '</a></li>')
	});

}); 
</script>
<?php 
echo form_hidden('id_local', $cod); 
echo form_hidden('Nro_Pred', $pr); 
?>
<div class="row-fluid" id="pesc_tabs" style="margin-top:10px">
	<div class="span12" id="insidetabs" style="text-align:center">
		<div class="tabbable"> <!-- Only required for left/right tabs -->
		  <ul class="nav nav-tabs" style="text-align:center">
		    <li id="ctab2"><a href="#tabc" data-toggle="tab">Carátula</a></li>
		    <li id="ctab2"><a href="#tab1" data-toggle="tab">Capítulo I</a></li>
		    <li id="ctab2"><a href="#tab2" data-toggle="tab">Capítulo II</a></li>
		    <li id="ctab3"><a href="#tab3" data-toggle="tab">Capítulo III</a></li>
		    <li id="ctab4"><a href="#tab4" data-toggle="tab">Capítulo IV</a></li>
		    <li id="ctab5"><a href="#tab5" data-toggle="tab">Capítulo V</a></li>
		    <li id="ctab6"><a href="#tab6" data-toggle="tab">Capítulo VI</a></li>
		    <li id="ctab7"><a href="#tab7" data-toggle="tab">Capítulo VII</a></li>
		    <li id="ctab8"><a href="#tab8" data-toggle="tab">Capítulo VIII</a></li>
		    <li id="ctab9"><a href="#tab9" data-toggle="tab">Capítulo IX</a></li>
		  </ul>
		  <div class="tab-content">
		    <div class="tab-pane" id="tabc">
		      <p><?php $this->load->view('consistencia/forms/car_form'); ?></p>
		    </div>	

		    <div class="tab-pane" id="tab1">
		      <p><?php $this->load->view('consistencia/forms/cap1_form'); ?></p>
		    </div>	

		    <div class="tab-pane" id="tab2">
		      <p><?php $this->load->view('consistencia/forms/cap2_form'); ?></p>
		    </div>

		    <div class="tab-pane" id="tab3">
		      <p><?php $this->load->view('consistencia/forms/cap3_form'); ?></p>
		    </div>

		    <div class="tab-pane" id="tab4">
		      <p><?php $this->load->view('consistencia/forms/cap4_form'); ?></p>
		    </div>

		    <div class="tab-pane" id="tab5">
		      <p><?php $this->load->view('consistencia/forms/cap5_form'); ?></p>
		    </div>

		    <div class="tab-pane" id="tab6">
		      <p><?php $this->load->view('consistencia/forms/cap6_form'); ?></p>
		    </div>

		    <div class="tab-pane" id="tab7">
		      <p><?php $this->load->view('consistencia/forms/cap7_form'); ?></p>
		    </div>

		    <div class="tab-pane" id="tab8">
		      <p><?php $this->load->view('consistencia/forms/cap8_form'); ?></p>
		    </div>  

		    <div class="tab-pane" id="tab9">
		      <p><?php $this->load->view('consistencia/forms/cap9_form'); ?></p>
		    </div>  

		  </div>
		</div>
	</div>
</div>



