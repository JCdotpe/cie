<h1>Predios - Codigo Local <?php echo $cod; ?></h1>

<ul id="predios">

</ul>

<script type="text/javascript">
$(function(){
	// function(i, data){
	// 	function( fila, valor )
  $.each( <?php echo json_encode($predios->result()); ?>, function(i, data) {
	  	var ahua = 'Principal';
	  	if(data.Nro_Pred != 1){
	  		ahua = (data.P1_B_2A_PredNoCol==0)? 'Colindante' : 'No Colindante';
	  	}
		$('#predios').append('<li><a href="' + CI.site_url + '/predio/' + data.id_local + '/' + data.Nro_Pred + '">'+ data.Nro_Pred  + ' - ' + ahua + '</a></li>')
	});

}); 
</script>

<div class="row-fluid" id="pesc_tabs" style="margin-top:10px">
	<div class="span12" id="insidetabs" style="text-align:center">
		<div class="tabbable"> <!-- Only required for left/right tabs -->
		  <ul class="nav nav-tabs" style="text-align:center">
		    <li id="ctab2"><a href="#tabc" data-toggle="tab">Caratula</a></li>
		    <li id="ctab2"><a href="#tab1" data-toggle="tab">Cap I</a></li>
		    <li id="ctab2"><a href="#tab2" data-toggle="tab">Cap II</a></li>
		    <li id="ctab3"><a href="#tab3" data-toggle="tab">Cap III</a></li>
		    <li id="ctab4"><a href="#tab4" data-toggle="tab">Cap IV</a></li>
		    <li id="ctab5"><a href="#tab5" data-toggle="tab">Cap V</a></li>
		    <li id="ctab6"><a href="#tab6" data-toggle="tab">Cap VI</a></li>
		    <li id="ctab7"><a href="#tab7" data-toggle="tab">Cap VII</a></li>
		    <li id="ctab8"><a href="#tab8" data-toggle="tab">Cap VIII</a></li>
		    <li id="ctab9"><a href="#tab9" data-toggle="tab">Cap IX</a></li>
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



