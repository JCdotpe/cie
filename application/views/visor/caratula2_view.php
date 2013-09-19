<?php $this->load->view('visor/nav_view.php'); ?>
<script type="text/javascript">

	$.import('js/visor/caratula1/index.js','js');
	$(document).ready(function() {

		get_PadLocal();
		get_PCar('simple');

		$('input').attr({
			disabled : true,
		});

	});

</script>
<!-- CAPITULO G2-->
	  	    	<div class="tab-pane" id="general2">
	  	    		<div class="content" id="content5">
	  	    			<div class="panel panel-info">

							<div class="panel-heading">
								<h4 class="panel-title">Sección A: Ubicación Geográfica del local escolar</h4>
							</div>

								<ul class="list-group">
									<li class="list-group-item"><div style="width:150px; margin-left:10px; float:left;">1. Departamento </div> <input style="width:300px;" type="text" class="form-control departamento"></li>
									<li class="list-group-item"><div style="width:150px; margin-left:10px; float:left;">2. Provincia </div> <input style="width:300px;" type="text" class="form-control provincia"></li>
									<li class="list-group-item"><div style="width:150px; margin-left:10px; float:left;">3. Distrito </div> <input style="width:300px;" type="text" class="form-control distrito"></li>
									<li class="list-group-item"><div style="width:150px; margin-left:10px; float:left;">4. Centro Poblado </div> <input style="width:300px;" type="text" class="form-control PC_A_4_CentroP"></li>
									<li class="list-group-item"><div style="width:150px; margin-left:10px; float:left;">5. Nucleo Urbano </div> <input style="width:300px;" type="text" class="form-control PC_A_5_NucleoUrb"></li>
									<li class="list-group-item"><div style="width:150px; margin-left:10px; float:left;">6. UGEL </div> <input style="width:300px;" type="text" class="form-control ugel"></li>
								</ul>


						</div>

						<table class="table table-bordered">
							<thead>
								<th colspan="2">Sección B: Identificación del local escolar</th>
							</thead>
							<tbody>
								<td><strong>1. Transcriba el código del local escolar del DOC.CIE.03.06</strong></td>
								<td><input style="width:400px;" type="text" class="form-control PC_B_1_CodLocal" ></td>
							</tbody>
						</table>

						<table class="table table-bordered">
							<tbody>
								<tr>
									<td>
										<!-- <div class="panel">
											<label>Observaciones:</label>
											<textarea style="width:870px; height:100px;"></textarea>
										</div> -->
									</td>
								</tr>
							</tbody>
						</table>

	  	    		</div><!--END CONTENT-->
	  	    	</div><!-- END CAPITULO G2-->