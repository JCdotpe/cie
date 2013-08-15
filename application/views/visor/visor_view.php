
<?php

	$label_class =  array('class' => 'control-label');

	$depaArray = array(-1 => 'Seleccione...');

	$provArray = array(-1 => '');

	$regArray = array(-1 => '');

    foreach($depa->result() as $filas)
    {
      $depaArray[$filas->CCDD]=utf8_encode(strtoupper($filas->Nombre));
    }

?>

<link rel="stylesheet" href="<?php echo base_url('css/smoothness/jquery-ui-1.10.2.custom.min.css'); ?>">
<script src="<?php echo base_url('js/general/jquery-ui-1.10.2.custom.min.js'); ?>"></script>
<link rel="stylesheet" href="<?php echo base_url('css/jquery-ui-1.10.3.custom.min.css') ?>">
<link rel="stylesheet" href="<?php echo base_url('css/ui.jqgrid.css') ?>">
<script src="<?php echo base_url('js/jqgrid/i18n/grid.locale-es.js'); ?>"></script>
<script src="<?php echo base_url('js/jqgrid/jquery.jqGrid.min.js'); ?>"></script>
<script src="<?php echo base_url('js/urlRoot.js'); ?>"></script>
<script src="<?php echo base_url('js/visor/cedulas.js'); ?>"></script>
<script src="<?php echo base_url('js/visor/data.js'); ?>"></script>
<style type="text/css">

	.modal{
		width: 1000px;
		height: 700px;
		margin-left: -510px;
		margin-top: -50px;
		display: none;
	}

	.modal-body{
		max-height: 600px;
	}

	.content{
		position: relative;
		width: 965px;
		height: 540px;
		overflow: auto;
		/*border: 1px solid #CCC;*/
	}

	.list-title-left{
		position: relative;
		float: left;
		width: 400px;
	}

	th{
		background: #EEE;
	}

</style>
<script type="text/javascript">
	$(document).ready(function(){

		$("#ver").attr({
			disabled: true,
		});

		$("#provincia").empty().attr({
		   		disabled: true,
	   	});

	   	$("#ruta").empty().attr({
		   		disabled: true,
	   	});

	    function cargarProv(){

		    var doLoginMethodUrl = urlRoot()+'seleccion/aprobacioncv/obtenerprovincia';
		    var id_depa = $("#departamento").val();


		   	$("#provincia").empty().attr({
		   		disabled: true,
		   	});
		   	$("#provincia").html("<option value='0' selected='true'>Cargando...</value>");

			$("#ruta").empty().attr({
		   		disabled: true,
		   	});

		   	$("#ver").attr({
				disabled: true,
			});

		   	$.ajax({
		      type: "POST",
		      url: doLoginMethodUrl,
		      data: "id_depa="+id_depa,
		      success: function(provinciaResponse){

		      	console.log(provinciaResponse);
		        $("#provincia").empty().append($(provinciaResponse).find("option")).attr({
		   			disabled: false,
		   		});

		        $("#provincia").prepend("<option value='0' selected='true'>Seleccione...</value>");

		      }

		    });

		}

		/*function cargarRuta(){

	    	$("#ruta").empty().attr({
		   		disabled: true,
		   	});

	    	$("#ver").attr({
				disabled: true,
			});

		    $("#ruta").html("<option value='0' selected='true'>Cargando...</value>")

		    var doLoginMethodUrl = urlRoot()+'visor/visor/obtenerregion';
		    var cod_dpto = $("#departamento").val();
		    var cod_prov = $("#provincia").val();

		   	$.ajax({
		      type: "POST",
		      url: doLoginMethodUrl,
		      data: "cod_dpto="+cod_dpto+"&cod_prov="+cod_prov,
		      success: function(provinciaResponse){
		      	console.log(provinciaResponse);
		        $("#ruta").empty().append($(provinciaResponse).find("option")).attr({
		   			disabled: false,
		   		});

		        $("#ruta").prepend("<option value='0' selected='true'>Seleccione...</value>");

		      }

		    });

		}*/

		//======================COMBOS=======================

		$('#departamento').change(function(){
			cargarProv();

			if($(this).val()>0){

				$('#cod_local').attr({
					disabled: false,
				});

			}else{

				$("#cod_local").attr({
					disabled: true,
				});

			}

		});

		$('#provincia').change(function(){

			if($(this).val()>0){

				$("#ver").attr({
					disabled: false,
				});

			}else{

				$("#ver").attr({
					disabled: true,
				});

			}

			/*cargarRuta();*/
		});

//===============CONSULTA POR CODIGO DE LOCAL================
		$('#cod_local').keyup(function(event) {

			if($(this).val()==""){

			}else{

			}

		});

		/*$('#ruta').change(function(){

			if($(this).val()>0){

				$("#ver").attr({
					disabled: false,
				});

			}else{

				$("#ver").attr({
					disabled: true,
				});

			}

		})*/

		$('#ver').click(function(){
			get_data();
		});

		//=========================EVENTOS=========================================



		$('.view').live('click', function(event) {

			$('#myModal').modal('show');
			$('.codigo_local').val($(this).attr('id'));
			get_PadLocal($(this).attr('id'));
			get_PCar($(this).attr('id'));

		});

		$('#c1').click(function(event) {
			var code=$('.codigo_local').val();
			get_P1_A(code);
			get_P1_A_2N(code);
			get_P1_B(code);
			get_P1_B_2A_N(code);
		});

		$('#c2').click(function(event) {
			var code=$('.codigo_local').val();
			get_P2_A(code);
			get_P2_B(code);
			get_P2_C(code);
		});
		$('#c6').click(function(event) {
			var code=$('.codigo_local').val();
			/*get_P2_A(code);
			get_P2_B(code);*/
			get_P2_C(code);
		});

		//$('#pop').popover('show');

	});
</script>

	<div class="row-fluid ">

		<div class="form-span10 row-fluid well top-conv" style="margin-left:30px; width:1000px;">

			<div class="span3">
					<div class="control-group">
						<?php echo form_label('Departamento', 'departamento', $label_class); ?>
						<div class="controls">
							<?php echo form_dropdown('departamento', $depaArray, '#', 'id="departamento"'); ?>
						</div>
					</div>
			</div>

			<div class="span3">
					<div class="control-group">
						<?php echo form_label('Provincia', 'provincia', $label_class); ?>
						<div class="controls">
							<?php echo form_dropdown('provincia', $provArray, '#', 'id="provincia"'); ?>
						</div>
					</div>
			</div>

			<div class="span3">
					<div class="control-group">
						<?php /*echo form_label('Ruta', 'ruta', $label_class);*/ ?>
						<label>Codigo de Local</label>
						<div class="controls">
							<?php /*echo form_dropdown('ruta', $regArray, '#', 'id="ruta"');*/ ?>
							<input id="cod_local" style="width:50px;float:left;" type="text" class="form-control">
						</div>
					</div>
			</div>

			<div class="span1">
					<?php echo form_button('ver','Visualizar','class="btn btn-primary" id="ver" style="margin-top:20px"'); ?>
			</div>

		</div>

	</div>
<div class="row-fluid">
  <div id="grid_content" class="span12" style="width: 1170px;">
        <table id="editgrid"></table>
          <div class="span12">
            <table id="list2" style="width: 1170px;"></table>
            <div id="pager2" style="width: 1170px;"></div>
          </div>
  </div>
</div>

 <!-- Modal -->
  <div class="modal fade" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h5 class="modal-title">Seguimiento de Cedulas</h5>
        </div>
        <div class="modal-body">

        	<ul class="nav nav-tabs">
  				<li class="dropdown active">
  					<a href="#" class="dropdown-toggle" data-toggle="dropdown">
  						CIE01 <b class="caret"></b>
  					</a>
  					<ul class="dropdown-menu">
  						<li class="active">
							<a data-toggle="tab" id="g1" href="#general">Datos Generales</a>
						</li>
						<li>
							<a data-toggle="tab" id="c1" href="#cap1">Capitulo I</a>
						</li>
						<li>
							<a data-toggle="tab" id="c2" href="#cap2">Capitulo II</a>
						</li>
						<li>
							<a data-toggle="tab" id="c3" href="#cap3">Capitulo III</a>
						</li>
					</ul>
  				</li>

  				<li class="dropdown">
  					<a href="#" class="dropdown-toggle" data-toggle="dropdown">
  						CIE01A <b class="caret"></b>
  					</a>
  					<ul class="dropdown-menu">
  						<li>
							<a data-toggle="tab" id="g2" href="#general2">Datos Generales</a>
						</li>
						<li>
							<a data-toggle="tab" id="c4" href="#cap4">Capitulo IV</a>
						</li>
						<li >
							<a data-toggle="tab" id="c5" href="#cap5">Capitulo V</a>
						</li>
					</ul>
  				</li>

  				<li class="dropdown">
  					<a href="#" class="dropdown-toggle" data-toggle="dropdown">
  						CIE01B <b class="caret"></b>
  					</a>
  					<ul class="dropdown-menu">
  						<li>
							<a data-toggle="tab" id="g3" href="#general3">Datos Generales</a>
						</li>
						<li>
							<a data-toggle="tab" id="c6" href="#cap6">Capitulo VI</a>
						</li>
						<li>
							<a data-toggle="tab" id="c7" href="#cap7">Capitulo VII</a>
						</li>
						<li>
							<a data-toggle="tab" id="c8" href="#cap8">Capitulo VIII</a>
						</li>
					</ul>
  				</li>
			</ul>

			<div class="tab-content">

				<div class="tab-pane active" id="general">
					<div class="content" id="content1">

						<div class="panel">
							<label>Codigo de Local Escolar</label>
							<input style="width:300px;" type="text" class="form-control codigo_local">
						</div>

						<div class="panel panel-info">
							<div class="panel-heading">
								<h4 class="panel-title">Sección A: Ubicación Geográfica del local escolar</h4>
							</div>


								<ul class="list-group">
									<li class="list-group-item"><div style="width:150px; margin-left:10px; float:left;">1. Departamento </div> <input style="width:300px;" type="text" class="form-control departamento"></li>
									<li class="list-group-item"><div style="width:150px; margin-left:10px; float:left;">2. Provincia </div> <input style="width:300px;" type="text" class="form-control provincia"></li>
									<li class="list-group-item"><div style="width:150px; margin-left:10px; float:left;">3. Distrito </div> <input style="width:300px;" type="text" class="form-control distrito"></li>
									<li class="list-group-item"><div style="width:150px; margin-left:10px; float:left;">4. Centro Poblado </div> <input style="width:300px;" type="text" class="form-control PC_A_1_CentroP"></li>
									<li class="list-group-item"><div style="width:150px; margin-left:10px; float:left;">5. Nucleo Urbano </div> <input style="width:300px;" type="text" class="form-control PC_A_5_NucleoUrb"></li>
									<li class="list-group-item"><div style="width:150px; margin-left:10px; float:left;">6. UGEL </div> <input style="width:300px;" type="text" class="form-control ugel"></li>
								</ul>

						</div>

						<div class="panel">
									<div class="panel-heading">7. Dirección del local escolar (Para tipo de via circule solo un codigo)</div>

								  	<label class="checkbox-inline">
										<input type="radio" name="check" id="avenida1" value="option1"> 1. Avenida
									</label>

									<label class="checkbox-inline">
										<input type="radio" name="check" id="jiron1" value="option2"> 2. Jiron
									</label>

									<label class="checkbox-inline">
										<input type="radio" name="check" id="calle1" value="option3"> 3. Calle
									</label>

									<label class="checkbox-inline">
										<input type="radio" name="check" id="pasaje1" value="option4"> 4. Pasaje
									</label>

									<label class="checkbox-inline">
										<input type="radio" name="check" id="carretera1" value="option5"> 5. Carretera
									</label>

									<label class="checkbox-inline">
										<input type="radio" name="check" id="autopista1" value="option6"> 6. Autopista
									</label>

									<label class="checkbox-inline">
										<input type="radio" name="check" id="otro1" value="option7"> 7. Otro
									</label>

						</div>

						<table class="table table-bordered">
							<thead>

								<tr>
									<th>Nombre de la via</th>
									<th>N° de Puerta</th>
									<th>Piso</th>
									<th>Mz.</th>
									<th>Lote</th>
									<th>Sector</th>
									<th>Zona</th>
									<th>Etapa</th>
									<th>Km</th>
								</tr>

							</thead>
							<tbody>

								<tr>
									<td id="PC_A_7Dir_2_Nomb"></td>
									<td id="PC_A_7Dir_3_Nro"></td>
									<td id="PC_A_7Dir_4_Piso"></td>
									<td id="PC_A_7Dir_5_Mz"></td>
									<td id="PC_A_7Dir_6_Lt"></td>
									<td id="PC_A_7Dir_7_Sect"></td>
									<td id="PC_A_7Dir_8_Zona"></td>
									<td id="PC_A_7Dir_9_Et"></td>
									<td id="PC_A_7Dir_10_Km"></td>
								</tr>

							</tbody>
						</table>

						<ul class="list-group">
							<li class="list-group-item">
								8. La dirección del colegio del local escolar del DOC.CIE.03.06
								<label class="checkbox-inline">
									<input type="radio" id="verif1" name="radio" value="option1"> 1. Si
								</label>
								<label class="checkbox-inline">
									<input type="radio" id="verif2" name="radio" value="option2"> 2. No
								</label>
							</li>
							<li class="list-group-item">
								9. Referencia de la dirección del local escolar
								<input type="text" id="PC_A_9_RefDir" class="form-control">
							</li>
						</ul>

						<div class="panel panel-info">
							<div class="panel-heading">
								<h5 class="panel-title">Sección B: Identificación del local escolar</h5>
							</div>

							<h6>Evaluador Tecnico</h6>

							<ul class="list-group">
								<li class="list-group-item">1. Transcriba el codigo del local DOC.CIE.03.06 <input type="text" id="PC_B_1_CodLocal" class="form-control"></li>
								<li class="list-group-item">2. Cuantos códigos de local escolar registrados en el DOC.CIE.03.06 se evaluaran en esta cedula censal <input id="PC_B_2_CantEv" type="text" class="form-control"></li>
							</ul>

						</div>

						<div class="panel panel-info" style="height:500px;">
							<div class="panel-heading">
								<h5 class="panel-title">Sección C: Entrevista y Supervision</h5>
							</div>

							<h6>1. Evaluación y Supervisión</h6>

							<table class="table table-bordered">
								<thead>

									<tr>
										<th rowspan="3" style="text-align:center;vertical-align:middle;">Visitas</th>

										<th colspan="6" style="text-align:center;">Evaluador Técnico</th>
										<!-- <th>Piso</th> -->
										<!-- <th>Mz.</th>
										<th>Lote</th>
										<th>Sector</th>
										<th>Zona</th> -->
										<th colspan="4" style="text-align:center;">Jefe de Brigada</th>
									</tr>
									<tr>

										<th rowspan="2" style="text-align:center;vertical-align:middle;">Fecha</th>
										<th colspan="2" style="text-align:center;">Hora</th>
										<th colspan="2" style="text-align:center;">Próxima Visita</th>
										<th rowspan="2" style="text-align:center;vertical-align:middle;">Resultado de la visita (*)</th>
										<th rowspan="2" style="text-align:center;vertical-align:middle;">Fecha</th>
										<th colspan="2" style="text-align:center;">Hora</th>
										<th rowspan="2" style="text-align:center;vertical-align:middle;">Resultado de la visita (*)</th>


									</tr>

									<tr>

										<th style="text-align:center;">De</th>
										<th style="text-align:center;">A</th>
										<th style="text-align:center;">Fecha</th>
										<th style="text-align:center;">Hora</th>
										<th style="text-align:center;">De</th>
										<th style="text-align:center;">A</th>

									</tr>

								</thead>
								<tbody id="eva_solu1">

									<!--AJAX-->

								</tbody>
							</table>

							<table class="table table-bordered" style="width:300px; float:left;">
								<thead>
									<tr>
										<th colspan="2">2.Resultado final de la evaluacion tecnica</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td>Fecha: </td>
										<td id="PC_C_2_Rfinal_fecha"></td>
									</tr>
									<tr>
										<td>Resultado: </td>
										<td id="PC_C_2_Rfinal_resul"></td>
									</tr>
								</tbody>
							</table>

							<table class="table table-bordered" style="width:600px; margin-left:10px; float:left;">
								<thead>
									<tr>
										<th colspan="2" style="text-align:center;">(*) Codigos de Resultado</th>
									</tr>
								</thead>
								<tbody>
									<td>
										<ul>
											<li>1.Completa</li>
											<li>2.Rechazo</li>
											<li>3.Incompleta</li>
											<li>4.Local cerrado/desocupado</li>
										</ul>
									</td>
									<td>5.Otro <!-- <textarea id="PC_C_2_Rfinal_resul_O" class="form-control" rows="3"></textarea> --></td>
								</tbody>
							</table>

						</div>

						<div class="panel panel-info">
							<div class="panel-heading">
								<h5 class="panel-title">Sección D: Funcionarios de la evaluacion técnica</h5>
							</div>

							<table class="table table-bordered">
								<thead>
									<tr>
										<th style="text-align:center;">Cargo</th>
										<th style="text-align:center;">DNI</th>
										<th style="text-align:center;">Nombres y Apellidos</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td>Evaluador Técnico</td>
										<td id="PC_D_EvT_dni"></td>
										<td id="PC_D_EvT_Nomb"></td>
									</tr>

									<tr>
										<td>Jefe de Brigada</td>
										<td id="PC_D_JBri_dni"></td>
										<td id="PC_D_JBri_Nomb"></td>
									</tr>

									<tr>
										<td>Coordinador Provincial</td>
										<td id="PC_D_CProv_dni"></td>
										<td id="PC_D_CProv_Nomb"></td>
									</tr>

									<tr>
										<td>Coordinador Departamental</td>
										<td id="PC_D_CDep_dni"></td>
										<td id="PC_D_CDep_Nomb"></td>
									</tr>

									<tr>
										<td>Supervisor Nacional</td>
										<td id="PC_D_SupN_dni"></td>
										<td id="PC_D_SupN_Nomb"></td>
									</tr>

								</tbody>
							</table>

						</div>

						<div class="panel panel-info" style="float:left;width:600px;height:160px;">
							<div class="panel-heading">
								<h5 class="panel-title">Sección E: Resumen</h5>
							</div>

							<table class="table table-bordered">
								<thead>
									<tr>
										<th style="text-align:center;">1.Total de predios</th>
										<th style="text-align:center;">2.Total de predios no colindantes</th>
										<th style="text-align:center;">3.Total de edificaciones</th>
										<th style="text-align:center;">4.Total de patios</th>
										<th style="text-align:center;">5.Total de lozas deportivas</th>
										<th style="text-align:center;">6.Total de cisternas - Tanques elevados</th>
										<th style="text-align:center;">7.Total de Muros de contencion</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td id="PC_E_1_TPred"></td>
										<td id="PC_E_2_TPred_NoCol"></td>
										<td id="PC_E_3_TEdif"></td>
										<td id="PC_E_4_TPat"></td>
										<td id="PC_E_5_TLosa"></td>
										<td id="PC_E_6_TCist"></td>
										<td id="PC_E_7_TMurCon"></td>
									</tr>
								</tbody>
							</table>

						</div>

						<div class="panel panel-info" style="float:left;width:260px; margin-left:10px;height:160px;">
							<div class="panel-heading">
								<h5 class="panel-title">Sección F: Predio NO Colindante</h5>
							</div>

							<table class="table table-bordered">
								<tr>
									<th rowspan="2">(Diligencia sólo en el caso de predio No Colindante)</th>
									<th>N° de Predio</th>
								</tr>
								<tr>
									<td id="PC_F_1"></td>
								</tr>
							</table>

						</div>
						<!-- End Secciones -->
					</div>
				</div>

				<div class="tab-pane" id="cap1">
					<div class="content" id="content2">

						<div class="panel panel-info">
							<div class="panel-heading">
								<h5 class="panel-title">Capitulo I Identificación de las instituciones eductivas, predios y anexos del local escolar</h5>
							</div>

							<table class="table table-bordered">
								<thead>
									<th colspan="2">Sección A: Instituciones educativas</th>
								</thead>
								<tbody>
									<td><strong>1.¿Cuantas instituciones educativas prestan servicio en este local escolar?</strong></td>
									<td>N° de instituciones educativas <input id="nie2" style="width:40px;" type="text" class="form-control"></td>
								</tbody>
							</table>

							<div id="inst_educa">
								<!--AJAX-->
							</div>

					</div><!-- END PANEL PRINCIPAL-->

						<div class="panel panel-info">

							<!-- PANEL SECCION B N PREDIOS-->

							<div class="panel-heading">
								<h5 class="panel-title">Sección B: Predio o predios ocupados por el local escolar</h5>
							</div>

							<table class="table table-bordered">
								<tbody>
									<tr>
										<td style="text-align:center;">1.</td>
										<td><strong>¿Cuantos predios ocupa el local escolar?</strong></td>
										<td>
											<label>N° de predios</label>
											<input style="width:300px;" id="P1_B_1_TPred" type="text" class="form-control">
										</td>
									</tr>
									<tr>
										<td style="text-align:center;">2.</td>
										<td><strong>¿Los predios son colindantes?</strong></td>
										<td>
											<label class="checkbox-inline">
												<input type="radio" id="P1_B_2_PredCol1" name="check" value="option1"> 1. Si
											</label>

											<label class="checkbox-inline">
												<input type="radio" id="P1_B_2_PredCol2" name="check" value="option2"> 2. No
											</label>
										</td>
									</tr>
									<tr>
										<td style="text-align:center;">2A.</td>
										<td><strong>¿cuales son los predios no colindantes?</strong></td>
										<td>
											<label>N° de predio</label>
											<input style="width:300px;" type="text" class="form-control">
										</td>
									</tr>
								</tbody>
							</table>

							<div class="panel">
								Visualizar Predios
								<div class="btn-toolbar">
									 <div class="btn-group">
									    <a class="btn" href="#"><i class="icon-fast-backward"></i></a>
									    <a class="btn" href="#"><i class="icon-backward"></i></a>
									    <a class="btn" href="#"><i class="icon-th"></i>Total: <span id="tpredio">5</span></a>
									    <a class="btn" href="#"><i class="icon-time"></i>Actual: <span id="apredio">5</span></a>
									    icon-time
									    <a class="btn" href="#"><i class="icon-forward"></i></a>
									    <a class="btn" href="#"><i class="icon-fast-forward"></i></a>
									  </div>
								</div>

							</div>

							<table class="table table-bordered">
								<thead>
									<tr>
										<th colspan="2">
											<label style="float:left;">Predio N°</label>
										</th>
										<th>
											<input style="float:left; width:300px;" type="text" class="form-control">
										</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td style="text-align:center;">3.</td>
										<td>
											<strong>¿Cuál es el código del inmueble del predio 01?</strong><br />
											(Este código se encuentranen la constancia MARGESI)
										</td>
										<td>
											<input style="float:left; width:300px;" type="text" class="form-control"><br />
											<label class="checkbox-inline">
												<input type="radio" id="Checkbox1" name="check" value="option1"> 1. No tiene constancia
											</label>

											<label class="checkbox-inline">
												<input type="radio" id="Checkbox2" name="check" value="option2"> 2. No sabe
											</label>
										</td>
									</tr>
									<tr>
										<td style="text-align:center;">3.1</td>
										<td>
											<strong>¿Quién es el propietario del predio?</strong><br />
											(Acepte sólo un código)
										</td>
										<td>
											<label>
												<input type="radio" id="Checkbox1" name="check" value="option1"> 1. Ministerio de Educación
											</label>
											<label>
												<input type="radio" id="Checkbox2" name="check" value="option2"> 2. Institucion educativa
											</label>
											<label>
												<input type="radio" id="Checkbox1" name="check" value="option3"> 3. Estado
											</label>
											<label>
												<input type="radio" id="Checkbox1" name="check" value="option4">
												4. Otro sector del estado
											</label>
											<label>
												<input style="float:left; width:300px;" type="text" class="form-control">
												(Especifique)
											</label>

											<label>
												<input type="radio" id="Checkbox1" name="check" value="option5">
												5. Propiedad de terceros
											</label>
											<label>
												<input style="float:left; width:300px;" type="text" class="form-control">
												(Especifique)
											</label>

										</td>
									</tr>
									<tr>
										<td style="text-align:center;">3.2</td>
										<td>
											<strong>¿El antecedente registral que tiene el predio es?</strong><br />
											(Acepte sólo un código)
										</td>
										<td>
											<label>
												<input type="radio" id="Checkbox1" name="check" value="option1"> 1. Partida electrónica?
											</label>
											<label>
												<input type="radio" id="Checkbox2" name="check" value="option2"> 2. Código de predio?
											</label>
											<label>
												<input type="radio" id="Checkbox1" name="check" value="option3"> 3. Ficha?
											</label>
											<label>
												<input type="radio" id="Checkbox1" name="check" value="option4"> 4. Tomo/Foja/Asiento?
											</label>
											<label>
												<input type="radio" id="Checkbox1" name="check" value="option5"> 5. Ninguno?
											</label>
										</td>
									</tr>
									<tr>
										<td style="text-align:center;">3.3</td>
										<td>
											<strong>¿Cuál es el número del antecedente registral?</strong><br />

										</td>
										<td>
											<label>N° de antecedente registral</label>
											<input style="float:left; width:300px;" type="text" class="form-control"><br />
										</td>
									</tr>
									<tr>
										<td style="text-align:center;">3.4</td>
										<td>
											<strong>¿El Título de propiedad no inscrito que tiene el predio es:</strong><br />
											(Acepte sólo un código)
										</td>
										<td>
											<label>
												<input type="radio" id="Checkbox1" name="check" value="option1"> 1. Escritura pública?
											</label>
											<label>
												<input type="radio" id="Checkbox2" name="check" value="option2"> 2. Minuta de compra-venta?
											</label>
											<label>
												<input type="radio" id="Checkbox1" name="check" value="option3"> 3. Minuta de donación?
											</label>
											<label>
												<input type="radio" id="Checkbox1" name="check" value="option4">	4. Minuta de cesión?
											</label>
											<label>
												<input type="radio" id="Checkbox1" name="check" value="option4">	5. Minuta de permuta?
											</label>
											<label>
												<input type="radio" id="Checkbox1" name="check" value="option4">	6. Aporte reglamentario?
											</label>
											<label>
												<input type="radio" id="Checkbox1" name="check" value="option4">	7. Resolución emitida por  entidad del estado?
											</label>
											<label>
												<input type="radio" id="Checkbox1" name="check" value="option4">	8. Acta de donación de CC/CN?
											</label>
											<label>
												<input type="radio" id="Checkbox1" name="check" value="option4">	9. Otro?
											</label>

											<label>
												<input style="float:left; width:300px;" type="text" class="form-control"> (Especifique)
											</label>

											<label>
												<input type="radio" id="Checkbox1" name="check" value="option5">	10. Ninguno
											</label>

										</td>
									</tr>
									<tr>
										<td style="text-align:center;">3.5</td>
										<td>
											<strong>¿En que fecha se emitio el título no inscrito?</strong><br />

										</td>
										<td>
											<label>Fecha</label>
											<input style="float:left; width:100px;" type="text" class="form-control"><br />
										</td>
									</tr>
									<tr>
										<td style="text-align:center;">3.6</td>
										<td>
											<strong>¿El documento de posesión que tiene el predio es:</strong><br />
											(Acepte sólo un código)
										</td>
										<td>
											<label>
												<input type="radio" id="Checkbox1" name="check" value="option1"> 1. Constancia de posesion de Juez de Paz?
											</label>
											<label>
												<input type="radio" id="Checkbox2" name="check" value="option2"> 2. Constancia de posesion municipal?
											</label>
											<label>
												<input type="radio" id="Checkbox1" name="check" value="option3"> 3. Resolución municipal?
											</label>
											<label>
												<input type="radio" id="Checkbox1" name="check" value="option4">	4. Resolución de afectación en uso?
											</label>
											<label>
												<input type="radio" id="Checkbox1" name="check" value="option4">	5. Convenio con entidad estatal?
											</label>
											<label>
												<input type="radio" id="Checkbox1" name="check" value="option4">	6. Convenio con particulares?
											</label>
											<label>
												<input type="radio" id="Checkbox1" name="check" value="option4">	7. Contrato de arrendamiento?
											</label>
											<label>
												<input type="radio" id="Checkbox1" name="check" value="option4">	8. Contrato de servidumbre?
											</label>
											<label>
												<input type="radio" id="Checkbox1" name="check" value="option4">	9. Otro?
											</label>

											<label>
												<input style="float:left; width:300px;" type="text" class="form-control"> (Especifique)
											</label>

											<label>
												<input type="radio" id="Checkbox1" name="check" value="option5">	10. Ninguno
											</label>
										</td>
									</tr>
									<tr>
										<td style="text-align:center;">3.7</td>
										<td>
											<strong>¿En qué fecha se emitió el documento de posesión?</strong><br />

										</td>
										<td>
											<label>Fecha</label>
											<input style="float:left; width:100px;" type="text" class="form-control">
										</td>
									</tr>
									<tr>
										<td style="text-align:center;">3.8</td>
										<td>
											<strong>¿Cuál es el area del terreno que ocupa el predio?</strong><br />

										</td>
										<td>
											<label>Area en m2</label>
											<table class="table table-bordered">
												<tr>
													<th style="text-align:center;">Enteros</th>
													<th style="text-align:center;">Decimales</th>
												</tr>
												<tr>
													<td></td>
													<td></td>
												</tr>
											</table>
										</td>
									</tr>
									<tr>
										<td style="text-align:center;">3.9</td>
										<td>
											<strong>¿Cuál es el area del terreno que ocupa el local escolar en este predio?</strong><br />

										</td>
										<td>
											<label>Area en m2</label>
											<table class="table table-bordered">
												<tr>
													<th style="text-align:center;">Enteros</th>
													<th style="text-align:center;">Decimales</th>
												</tr>
												<tr>
													<td></td>
													<td></td>
												</tr>
											</table>
										</td>
									</tr>
									<tr>
										<td style="text-align:center;">3.10</td>
										<td>
											<strong>¿El predio es compartido con otros locales escolares , otras instituciones o servicios?</strong>
										</td>
										<td>
											<label class="checkbox-inline">
												<input type="radio" id="Checkbox1" name="check" value="option1"> 1. Si
											</label>

											<label class="checkbox-inline">
												<input type="radio" id="Checkbox2" name="check" value="option2"> 2. No
											</label>
										</td>
									</tr>
									<tr>
										<td style="text-align:center;">3.11</td>
										<td>
											<strong>¿Con cuántos locales escolares otras instituciones o servicios comparten el predio?</strong>
										</td>
										<td>
											<label>N°</label>
											<input style="float:left; width:100px;" type="text" class="form-control">
										</td>
									</tr>
									<tr>
										<td style="text-align:center;">3.12</td>
										<td>
											<strong>¿cuáles son los nombres de los locales escolares, otras instituciones o servicios con los que comparte el predio?</strong><br />
											(Diligencie, según respuesta en pregunta 3.11)
										</td>
										<td>
											<textarea style="width:300px; height:100px;"></textarea>
										</td>
									</tr>
								</tbody>
							</table>

							<div class="panel">
								<label>Observaciones:</label>
								<textarea style="width:870px; height:100px;"></textarea>
							</div>

						</div><!-- END PANEL SECCION B-->

						<div class="panel panel-info"><!-- PANEL SECCION C N ANEXOS-->
							<div class="panel-heading">
								<h5 class="panel-title">Sección C: Anexos de la institución educativa</h5>
							</div>

							<div class="panel">
								Evaluador: Diligencie esta sección sólo si en la columna (f) de la pregunta 2.9 Sección A, declaro tener 1 o mas anexos
							</div>

							<div class="panel">
								Visualizar Anexos
								<div class="btn-toolbar">
									 <div class="btn-group">
									    <a class="btn" href="#"><i class="icon-fast-backward"></i></a>
									    <a class="btn" href="#"><i class="icon-backward"></i></a>
									    <a class="btn" href="#"><i class="icon-th"></i>Total: <span id="tanexo">5</span></a>
									    <a class="btn" href="#"><i class="icon-time"></i>Actual: <span id="aanexo">1</span></a>
									    <a class="btn" href="#"><i class="icon-forward"></i></a>
									    <a class="btn" href="#"><i class="icon-fast-forward"></i></a>
									  </div>
								</div>
							</div>

							<div class="panel" style="height:100px;">
								<div class="panel" style="float:left; margin-left:150px;">
									<label>Número de Anexo</label>
									<input style="float:left; width:200px;" type="text" class="form-control">
								</div>
								<div class="panel" style="float:left; margin-left:150px;">
									<label>Codigo Modular</label>
									<input style="float:left; width:200px;" type="text" class="form-control">
								</div>
							</div>

							<div class="panel">
								<div class="panel">
									<strong>1. ¿Cuál es el código del local escolar del anexo? </strong>
									<input style="width:200px;" type="text" class="form-control">
								</div>

								<ul class="list-group">
									<li class="list-group-item"><div style="width:150px; margin-left:10px; float:left;"><strong>2. Provincia</strong></div> <input style="width:300px;" type="text" class="form-control"></li>
									<li class="list-group-item"><div style="width:150px; margin-left:10px; float:left;"><strong>3. Distrito</strong></div> <input style="width:300px;" type="text" class="form-control"></li>
									<li class="list-group-item"><div style="width:150px; margin-left:10px; float:left;"><strong>4. Centro Poblado</strong> </div> <input style="width:300px;" type="text" class="form-control"></li>
									<li class="list-group-item"><div style="width:150px; margin-left:10px; float:left;"><strong>5. Nucleo Urbano</strong> </div> <input style="width:300px;" type="text" class="form-control"></li>
									<li class="list-group-item" style="height:100px;">
										<div style=" width:120px; margin-left:10px; margin-right:10px; float:left;"><strong>6. Dirección del local escolar</strong><br /> (Para tipo de via circule sólo un código)</div>

											<div style="width:680px; margin-left:10px; margin-right:10px; float:left;">

												<label class="checkbox-inline"><strong>Tipo de Via: </strong></label>

												<div class="panel">

													<label class="checkbox-inline">
														<input type="radio" id="Checkbox1" name="check" value="option1"> 1. Avenida
													</label>
													<label class="checkbox-inline">
														<input type="radio" id="Checkbox2" name="check" value="option2"> 2. Jirón
													</label>
													<label class="checkbox-inline">
														<input type="radio" id="Checkbox2" name="check" value="option2"> 3. Calle
													</label>
													<label class="checkbox-inline">
														<input type="radio" id="Checkbox2" name="check" value="option2"> 4. Pasaje
													</label>
													<label class="checkbox-inline">
														<input type="radio" id="Checkbox2" name="check" value="option2"> 5. Carretera
													</label>
													<label class="checkbox-inline">
														<input type="radio" id="Checkbox2" name="check" value="option2"> 6. Autopista
													</label>
													<label class="checkbox-inline">
														<input type="radio" id="Checkbox2" name="check" value="option2"> 7. Otro
													</label>
												</div>

											<div>

									</li>
								</ul>

								<table class="table table-bordered" style="margin-top:20px;">
									<thead>
										<tr>
											<th style="text-align:center;">Nombre de via</th>
											<th style="text-align:center;">N° de puerta</th>
											<th style="text-align:center;">Piso</th>
											<th style="text-align:center;">Mz.</th>
											<th style="text-align:center;">Lote</th>
											<th style="text-align:center;">Sector</th>
											<th style="text-align:center;">Zona</th>
											<th style="text-align:center;">Etapa</th>
											<th style="text-align:center;">Km.</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td style="text-align:center;"></td>
											<td style="text-align:center;"></td>
											<td style="text-align:center;"></td>
											<td style="text-align:center;"></td>
											<td style="text-align:center;"></td>
											<td style="text-align:center;"></td>
											<td style="text-align:center;"></td>
											<td style="text-align:center;"></td>
											<td style="text-align:center;"></td>
										</tr>
									</tbody>
								</table>

								<div class="panel">
									<strong>7. Referencia de la dirección del anexo del local escolar: </strong>
									<input style="width:840px;" type="text" class="form-control">
								</div>

							</div><!--END PANEL -->

							<table class="table table-bordered" style="margin-top:20px;">
								<tr>
									<td>8.</td>
									<td><strong>¿Cuál es el código del inmueble del anexo 01?</strong><br />
										(Este código se encuentra en la constancia MARGESI)</td>
									<td>
										<input style="float:left; width:500px;" type="text" class="form-control"><br />
											<label class="checkbox-inline">
												<input type="radio" id="Checkbox1" name="check" value="option1"> 1. No tiene constancia
											</label>

											<label class="checkbox-inline">
												<input type="radio" id="Checkbox2" name="check" value="option2"> 2. No sabe
											</label>
									</td>
								</tr>
								<tr>
									<td>9.</td>
									<td>
										<strong>¿Quien es el propietario del predio?</strong>
										<br />(Acepte sólo un código)
									</td>
									<td>
										<label>
												<input type="radio" id="Checkbox1" name="check" value="option1"> 1. Ministerio de educación?
											</label>
											<label>
												<input type="radio" id="Checkbox2" name="check" value="option2"> 2. Institución educativa?
											</label>
											<label>
												<input type="radio" id="Checkbox1" name="check" value="option3"> 3. Estado?
											</label>
											<label>
												<input type="radio" id="Checkbox1" name="check" value="option4">	4. Otro sector del estado?
											</label>
											<label>
												<input style="float:left; width:500px;" type="text" class="form-control"> (Especifique)
											</label>
											<label>
												<input type="radio" id="Checkbox1" name="check" value="option4">	5.Propiedad de terceros?
											</label>
											<label>
												<input style="float:left; width:500px;" type="text" class="form-control"> (Especifique)
											</label>


									</td>
								</tr>
								<tr>
									<td>10.</td>
									<td>
										<strong>¿El antecedente registral que tiene el predio es:</strong>
										<br />(Acepte sólo un código)
									</td>
									<td>
										<label>
												<input type="radio" id="Checkbox1" name="check" value="option1"> 1. Partida electrónica?
											</label>
											<label>
												<input type="radio" id="Checkbox2" name="check" value="option2"> 2. Código de predio?
											</label>
											<label>
												<input type="radio" id="Checkbox1" name="check" value="option3"> 3. Ficha?
											</label>
											<label>
												<input type="radio" id="Checkbox1" name="check" value="option4">	4. Tomo/Foja/Asiento?
											</label>
											<label>
												<input type="radio" id="Checkbox1" name="check" value="option4">	5. Ninguno?
											</label>
									</td>
								</tr>
								<tr>
									<td>11.</td>
									<td><strong>¿Cuál es el número del antecedente registral?</strong></td>
									<td>
										<label>N° de antecedente registral</label>
										<input style="float:left; width:200px;" type="text" class="form-control">
									</td>
								</tr>
								<tr>
									<td>12.</td>
									<td>
										<strong>¿El Título de propiedad no inscrito que tiene el predio es:</strong>
										<br />(Acepte sólo un código)
									</td>
									<td>
										<label>
												<input type="radio" id="Checkbox1" name="check" value="option1"> 1. Escritura pública?
											</label>
											<label>
												<input type="radio" id="Checkbox2" name="check" value="option2"> 2. Minuta de compra-venta?
											</label>
											<label>
												<input type="radio" id="Checkbox1" name="check" value="option3"> 3. Minuta de donación?
											</label>
											<label>
												<input type="radio" id="Checkbox1" name="check" value="option3"> 4. Minuta de cesión?
											</label>
											<label>
												<input type="radio" id="Checkbox1" name="check" value="option4">	5. Minuta de permuta?
											</label>
											<label>
												<input type="radio" id="Checkbox1" name="check" value="option4">	6. Aporte de reglamento?
											</label>
											<label>
												<input type="radio" id="Checkbox1" name="check" value="option4">	7. Resolución emitida por entidad del estado?
											</label>
											<label>
												<input type="radio" id="Checkbox1" name="check" value="option4">	8. Acta de donación de CC/CN?
											</label>
											<label>
												<input type="radio" id="Checkbox1" name="check" value="option4">	9. Otro?
											</label>

											<label>
												<input style="float:left; width:500px;" type="text" class="form-control"> (Especifique)
											</label>

											<label>
												<input type="radio" id="Checkbox1" name="check" value="option5">	10. Ninguno
											</label>
									</td>
								</tr>
								<tr>
									<td>13.</td>
									<td><strong>¿En qué fecha se emitió el título no inscrito?</strong></td>
									<td>
										<label>Fecha</label>
										<input style="float:left; width:100px;" type="text" class="form-control">
									</td>
								</tr>
								<tr>
									<td>14.</td>
									<td>
										<strong>¿El Documento de poseíón que tiene es:</strong>
										<br />(Acepte sólo un código)
									</td>
									<td>
										<label>
												<input type="radio" id="Checkbox1" name="check" value="option1"> 1. Constancia de posesion de Juez de Paz?
											</label>
											<label>
												<input type="radio" id="Checkbox2" name="check" value="option2"> 2. Constancia de posesion municipal?
											</label>
											<label>
												<input type="radio" id="Checkbox1" name="check" value="option3"> 3. Resolución municipal?
											</label>
											<label>
												<input type="radio" id="Checkbox1" name="check" value="option4">	4. Resolución de afectación en uso?
											</label>
											<label>
												<input type="radio" id="Checkbox1" name="check" value="option4">	5. Convenio con entidad estatal?
											</label>
											<label>
												<input type="radio" id="Checkbox1" name="check" value="option4">	6. Convenio con particulares?
											</label>
											<label>
												<input type="radio" id="Checkbox1" name="check" value="option4">	7. Contrato de arrendamiento?
											</label>
											<label>
												<input type="radio" id="Checkbox1" name="check" value="option4">	8. Contrato de servidumbre?
											</label>
											<label>
												<input type="radio" id="Checkbox1" name="check" value="option4">	9. Otro?
											</label>

											<label>
												<input style="float:left; width:500px;" type="text" class="form-control"> (Especifique)
											</label>

											<label>
												<input type="radio" id="Checkbox1" name="check" value="option5">	10. Ninguno
											</label>
									</td>
								</tr>
								<tr>
									<td>15.</td>
									<td><strong>¿En qué fecha se emitió el documento de posesión?</strong></td>
									<td>
										<label>Fecha</label>
										<input style="float:left; width:100px;" type="text" class="form-control">
									</td>
								</tr>
								<tr>
									<td>16.</td>
									<td><strong>¿Cuál es el area del terreno que ocupa el predio?</strong></td>
									<td>
										<label>Area en m2</label>
										<table class="table table-bordered">
											<tr>
												<th style="text-align:center;">Enteros</th>
												<th style="text-align:center;">Decimales</th>
											</tr>
											<tr>
												<td></td>
												<td></td>
											</tr>
										</table>
									</td>
								</tr>
								<tr>
									<td>17.</td>
									<td><strong>¿Cual es el area del terrreno que ocupa el local escolar?</strong></td>
									<td>
										<label>Area en m2</label>
										<table class="table table-bordered">
											<tr>
												<th style="text-align:center;">Enteros</th>
												<th style="text-align:center;">Decimales</th>
											</tr>
											<tr>
												<td></td>
												<td></td>
											</tr>
										</table>
									</td>
								</tr>
								<tr>
									<td>18.</td>
									<td><strong>¿Con cuantos locales escolares, otras instituciones o servicios comparten el predio?</strong></td>
									<td>
										<label class="checkbox-inline">
											<input type="radio" id="Checkbox1" name="radio" value="option1"> 1. Si
										</label>
										<label class="checkbox-inline">
											<input type="radio" id="Checkbox2" name="radio" value="option2"> 2. No
										</label>
									</td>
								</tr>
								<tr>
									<td>19.</td>
									<td><strong>¿Cuáles son los nombres de los locales escolares, otras instituciones o servicios con los que comparte el predio?</strong></td>
									<td>
										<label>N°</label>
										<input style="width:200px;" type="text" class="form-control">
									</td>
								</tr>
								<tr>
									<td>20.</td>
									<td>
										<strong>¿Cuáles son los nombres de los locales escolares, otras instituciones o servicios con los que comparte el predio?</strong>
										<br />(Diligencie según respuesta en pregunta 18)
									</td>
									<td>
										<textarea style="width:300px; height:100px;"></textarea>
									</td>
								</tr>
							</table>

							<div class="panel">
								<label>Observaciones:</label>
								<textarea style="width:870px; height:100px;"></textarea>
							</div>

						</div><!-- END SECCIOM C -->


					</div>
				</div>


	  	    	<div class="tab-pane" id="cap2">
	  	    		<div class="content" id="content3">
	  	    			<div class="panel panel-info">
							<div class="panel-heading">
								<h5 class="panel-title">Capitulo II. Caracteristicas del clima y terreno - Servicios y obras en ejecución</h5>
							</div>

							<table class="table table-bordered">
									<thead>
										<tr>
											<th colspan="3">
												<h6>Sección A: Caracteristica climatica local</h6>
											</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td>1.</td>
											<td>
												<strong>¿El Clima que predomina en esta localidad es:</strong>
											</td>
											<td>
												<label class="checkbox-inline">
													<input type="radio" id="P2_A_1_Clima1" name="check" value="option1"> 1. Cálido?
												</label>

												<label class="checkbox-inline">
													<input type="radio" id="P2_A_1_Clima2" name="check" value="option2"> 2. Templado?
												</label>

												<label class="checkbox-inline">
													<input type="radio" id="P2_A_1_Clima3" name="check" value="option3"> 3. Frio?
												</label>
											</td>
										</tr>
										<tr>
											<td>2.</td>
											<td>
												<strong>¿La intensidad de la lluvia en esta localidad es:</strong>
											</td>
											<td>
												<label class="checkbox-inline">
													<input type="radio" id="P2_A_2_Lluv1" name="check1" value="option1"> 1. Minima?
												</label>

												<label class="checkbox-inline">
													<input type="radio" id="P2_A_2_Lluv2" name="check1" value="option2"> 2. Moderada?
												</label>

												<label class="checkbox-inline">
													<input type="radio" id="P2_A_2_Lluv3" name="check1" value="option3"> 3. Torrencial?
												</label>
											</td>
										</tr>
										<tr>
											<td>2A.</td>
											<td>
												<strong>¿En qué meses se da la temporada de lluvia?</strong>
											</td>
											<td>
												<label>Mes de inicio</label>
												<input style="width:200px;" id="P2_A_2A_Lluv_Mini" type="text" class="form-control">
												<label>Mes de término</label>
												<input style="width:200px;" id="P2_A_2A_Lluv_Mfin" type="text" class="form-control">
											</td>
										</tr>
										<tr>
											<td>3.</td>
											<td>
												<strong>¿En esta localidad se producen heladas/friajes?</strong>
											</td>
											<td>
												<label class="checkbox-inline">
													<input type="radio" id="P2_A_3_Hel1" name="check2" value="option1"> 1. Si?
												</label>

												<label class="checkbox-inline">
													<input type="radio" id="P2_A_3_Hel2" name="check2" value="option2"> 2. No?
												</label>
											</td>
										</tr>
										<tr>
											<td>3A.</td>
											<td>
												<strong>¿En qué meses se da la temporada de heladas?</strong>
											</td>
											<td>
												<label>Mes de inicio</label>
												<input style="width:200px;" id="P2_A_3A_Hel_Mini" type="text" class="form-control">
												<label>Mes de término</label>
												<input style="width:200px;" id="P2_A_3A_Hel_Mfin" type="text" class="form-control">
											</td>
										</tr>
										<tr>
											<td>4.</td>
											<td>
												<strong>¿En esta localidad cae granizada?</strong>
											</td>
											<td>
												<label class="checkbox-inline">
													<input type="radio" id="P2_A_4_Gra1" name="check3" value="option1"> 1. Si?
												</label>

												<label class="checkbox-inline">
													<input type="radio" id="P2_A_4_Gra2" name="check3" value="option2"> 2. No?
												</label>
											</td>
										</tr>
										<tr>
											<td>4A.</td>
											<td>
												<strong>¿En qué meses se da la temporada de granizada?</strong>
											</td>
											<td>
												<label>Mes de inicio</label>
												<input style="width:200px;" id="P2_A_4A_Gra_Mini" type="text" class="form-control">
												<label>Mes de término</label>
												<input style="width:200px;" id="P2_A_4A_Gra_Mfin" type="text" class="form-control">
											</td>
										</tr>
										<tr>
											<td>5.</td>
											<td>
												<strong>¿En esta localidad se forman vendavales?</strong>
											</td>
											<td>
												<label class="checkbox-inline">
													<input type="radio" id="P2_A_5_Vend1" name="check4" value="option1"> 1. Si?
												</label>

												<label class="checkbox-inline">
													<input type="radio" id="P2_A_5_Vend2" name="check4" value="option2"> 2. No?
												</label>
											</td>
										</tr>
										<tr>
											<td>5A.</td>
											<td>
												<strong>¿Los vendavales son:</strong>
												<br/>(Acepte solo un código)
											</td>
											<td>
												<label>
													<input type="radio" id="P2_A_5A_Vend_Tip1" name="check5" value="option1"> 1. Moderados?
												</label>

												<label>
													<input type="radio" id="P2_A_5A_Vend_Tip2" name="check5" value="option2"> 2. Fuertes (Que afecten la infraestructura de la localidad)?
												</label>
											</td>
										</tr>
										<tr>
											<td>5B.</td>
											<td>
												<strong>¿En qué meses se forman los vendavales?</strong>
											</td>
											<td>
												<label>Mes de inicio</label>
												<input style="width:200px;" id="P2_A_5B_Vend_Mini" type="text" class="form-control">
												<label>Mes de término</label>
												<input style="width:200px;" id="P2_A_5B_Vend_Mfin" type="text" class="form-control">
											</td>
										</tr>
									</tbody>
							</table>

							<table class="table table-bordered">
									<thead>
										<tr>
											<th colspan="3">
												<h6>Sección B: Condición del terreno y acceso</h6>
											</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td>1.</td>
											<td>
												<strong>¿Topografía del terreno del local escolar?</strong>
												<br>(Acepte un solo código)
											</td>
											<td>
												<label>
													<input type="radio" id="P2_B_1_Topo1" name="check6" value="option1"> 1. Llano
												</label>

												<label>
													<input type="radio" id="P2_B_1_Topo2" name="check6" value="option2"> 2. Inclinado
												</label>
												<label>
													<input type="radio" id="P2_B_1_Topo1" name="check6" value="option1"> 3. Muy inclinado
												</label>
												<label>
													<input type="radio" id="P2_B_1_Topo2" name="check6" value="option2"> 4. Accidentado
												</label>
											</td>
										</tr>
										<tr>
											<td>2.</td>
											<td>
												<strong>¿Tipo de suelo predominante del local escolar?</strong>
												<br>(Acepte un solo código)
											</td>
											<td>
												<label>
													<input type="radio" id="P2_B_2_Suelo1" name="check7" value="option1"> 1. Arcilloso
												</label>

												<label>
													<input type="radio" id="P2_B_2_Suelo2" name="check7" value="option2"> 2. Rocoso
												</label>
												<label>
													<input type="radio" id="P2_B_2_Suelo3" name="check7" value="option1"> 3. Arenoso
												</label>
												<label>
													<input type="radio" id="P2_B_2_Suelo4" name="check7" value="option2"> 4. Relleno
												</label>
												<label>
													<input type="radio" id="P2_B_2_Suelo5" name="check7" value="option2"> 5. Gravoso
												</label>
												<label>
													<input type="radio" id="P2_B_2_Suelo6" name="check7" value="option2"> 6. Otro
												</label>
												<label>(Especifique)</label>
												<input id="P2_B_2_Suelo_O" style="width:400px;" type="text" class="form-control">

											</td>
										</tr>
										<tr>
											<td>3.</td>
											<td><strong>¿A qué profundidad se encuentra la napa freatica del local escolar?</strong></td>
											<td>
												<label>
													<input type="radio" id="P2_B_3_Prof1" name="check8" value="option1"> 1. A menos de 1.50 m
												</label>

												<label>
													<input type="radio" id="P2_B_3_Prof2" name="check8" value="option2"> 2. A mas de 1.50 m
												</label>
											</td>
										</tr>
										<tr>
											<td>4.</td>
											<td><strong>¿Cuál es la capital del distrito mas accesible al local escolar?</strong></td>
											<td><input id="P2_B_4_CapAcc" style="width:400px;" type="text" class="form-control"></td>
										</tr>
										<tr>
											<td>5.</td>
											<td>
												<strong>¿Cuál es el medio de transporte  que utiliza para desplazarse de la capital del distrito mas accesible al local escolar?</strong>
												<br>(Acepte uno o mas códigos)
											</td>
											<td>
												<label>
													<input type="checkbox" id="P2_B_5_Mtran_11" name="check9" value="option1"> 1. Terrestre
												</label>
												<label>
													<input type="checkbox" id="P2_B_5_Mtran_22" name="check9" value="option2"> 2. Fluvial/lacustre/maritimo
												</label>
												<label>
													<input type="checkbox" id="P2_B_5_Mtran_33" name="check9" value="option2"> 3. Aereo
												</label>
											</td>
										</tr>
										<tr>
											<td>5A.</td>
											<td><strong>¿El uso mas frecuente es?</strong></td>
											<td>
												<label>
													<input type="radio" id="P2_B_5A_Uso1" name="check10" value="option1"> 1. Con motor
												</label>
												<label>
													<input type="radio" id="P2_B_5A_Uso2" name="check10" value="option2"> 2. Sin motor
												</label>
											</td>
										</tr>
										<tr>
											<td>5B.</td>
											<td>
												<strong>¿Cuál es el tipo de via que utiliza para desplazarse  de la capital del distrito mas accesible al local escolar?</strong>
												<br>(Acepte uno o mas códigos)
											</td>
											<td>
												<label>
													<input type="checkbox" id="P2_B_5B_Tvia_uso_11" name="check11" value="option1"> 1. Camino de herradura
												</label>
												<label>
													<input type="checkbox" id="P2_B_5B_Tvia_uso_22" name="check11" value="option2"> 2. Trocha carrozable
												</label>
												<label>
													<input type="checkbox" id="P2_B_5B_Tvia_uso_33" name="check11" value="option1"> 3. carretera afirmada
												</label>
												<label>
													<input type="checkbox" id="P2_B_5B_Tvia_uso_44" name="check11" value="option2"> 4. vía asfaltada
												</label>
											</td>
										</tr>
										<tr>
											<td>6.</td>
											<td><strong>¿Cuál es el tiempo total de recorrido de la capital del distrito mas accesible al local escolar?</strong></td>
											<td>
												<div class="panel" style="height:60px; width:130px; margin-left:130px;">
													<input id="P2_B_6_Trec_H" style="width:50px;float:left;" type="text" class="form-control">
													<input id="P2_B_6_Trec_M" style="width:50px;float:left;" type="text" class="form-control">
													<br/><br/>
													<div style="width:50px;float:left; text-align:center; padding:5px;">Hora</div>
													<div style="width:50px;float:left; text-align:center; padding:5px;">Minuto</div>
												</div>
											</td>
										</tr>
										<tr>
											<td>7.</td>
											<td><strong>¿Cuál es el tiempo del recorrido en el tramo mas dificultoso desde la capital del distrito mas accesible al local escolar?</strong></td>
											<td>
												<div class="panel" style="height:60px; width:130px; margin-left:130px;">
													<input id="P2_B_7_Ttramo_H" style="width:50px;float:left;" type="text" class="form-control">
													<input id="P2_B_7_Ttramo_M" style="width:50px;float:left;" type="text" class="form-control">
													<br/><br/>
													<div style="width:50px;float:left; text-align:center; padding:5px;">Hora</div>
													<div style="width:50px;float:left; text-align:center; padding:5px;">Minuto</div>
												</div>
											</td>
										</tr>
										<tr>
											<td>8.</td>
											<td><strong>¿Existen peligros asociados ala ubicación de esta localidad?</strong></td>
											<td>
												<label>
													<input type="radio" id="P2_B_8_Pelig1" name="check12" value="option1"> 1. Si
												</label>
												<label>
													<input type="radio" id="P2_B_8_Pelig2" name="check12" value="option2"> 2. SNo
												</label>
											</td>
										</tr>
										<tr>
											<td>9.</td>
											<td>
												<strong>¿Existen peligros naturales en esta localidad como:</strong>
												<br>(Acepte uno o mas códigos)
											</td>
											<td>
												<label>
													<input type="checkbox" id="P2_B_91" name="check13" value="option1"> 1. Sismos?
												</label>
												<label>
													<input type="checkbox" id="P2_B_92" name="check13" value="option2"> 2. Tsunami u oleaje anómalos?
												</label>
												<label>
													<input type="checkbox" id="P2_B_93" name="check13" value="option1"> 3. Lluvias?
												</label>
												<label>
													<input type="checkbox" id="P2_B_94" name="check13" value="option2"> 4. Heladas?
												</label>
												<label>
													<input type="checkbox" id="P2_B_95" name="check13" value="option1"> 5. Sequías?
												</label>
												<label>
													<input type="checkbox" id="P2_B_96" name="check13" value="option2"> 6. Granizadas?
												</label>
												<label>
													<input type="checkbox" id="P2_B_97" name="check13" value="option1"> 7. Nevadas?
												</label>
												<label>
													<input type="checkbox" id="P2_B_98" name="check13" value="option2"> 8. Vendavales?
												</label>
												<label>
													<input type="checkbox" id="P2_B_99" name="check13" value="option1"> 9. Actividades volcánicas?
												</label>
												<label>
													<input type="checkbox" id="P2_B_910" name="check13" value="option2"> 10. Ninguno
												</label>
											</td>
										</tr>
										<tr>
											<td>10.</td>
											<td>
												<strong>¿Existen peligros socio-naturales en esta localidad como:</strong>
												<br>(Acepte uno o mas códigos)
											</td>
											<td>
												<label>
													<input type="checkbox" id="P2_B_101" name="check14" value="option1"> 1. Inundaciones?
												</label>
												<label>
													<input type="checkbox" id="P2_B_102" name="check14" value="option2"> 2. Deslizamientos?
												</label>
												<label>
													<input type="checkbox" id="P2_B_103" name="check14" value="option1"> 3. Huaycos / Aluviones / Aludes?
												</label>
												<label>
													<input type="checkbox" id="P2_B_104" name="check14" value="option2"> 4. Derrumbes?
												</label>
												<label>
													<input type="checkbox" id="P2_B_105" name="check14" value="option1"> 5. Desertificaciones?
												</label>
												<label>
													<input type="checkbox" id="P2_B_106" name="check14" value="option2"> 6. Salinización de los suelos?
												</label>
												<label>
													<input type="checkbox" id="P2_B_10" name="check14" value="option1"> 7. Ninguno?
												</label>
											</td>
										</tr>
										<tr>
											<td>11.</td>
											<td>
												<strong>¿Existen peligros antrópicos en esta localidad como:</strong>
												<br>(Acepte uno o mas códigos)
											</td>
											<td>
												<label>
													<input type="checkbox" id="P2_B_111" name="check15" value="option1"> 1. Contaminación ambiental?
												</label>
												<label>
													<input type="checkbox" id="P2_B_112" name="check15" value="option2"> 2. Incendios, quemas?
												</label>
												<label>
													<input type="checkbox" id="P2_B_113" name="check15" value="option1"> 3. Explosiones?
												</label>
												<label>
													<input type="checkbox" id="P2_B_114" name="check15" value="option2"> 4. Derrame de sustancias tóxicas?
												</label>
												<label>
													<input type="checkbox" id="P2_B_115" name="check15" value="option1"> 5. Fuga de gases?
												</label>
												<label>
													<input type="checkbox" id="P2_B_116" name="check15" value="option2"> 6. Zonas aereoportuarias?
												</label>
												<label>
													<input type="checkbox" id="P2_B_117" name="check15" value="option1"> 7. Zonas industriales?
												</label>
												<label>
													<input type="checkbox" id="P2_B_118" name="check15" value="option2"> 8. Crianza de animales?
												</label>
												<label>
													<input type="checkbox" id="P2_B_119" name="check15" value="option1"> 9. Subversiónes / conflictos?
												</label>
												<label>
													<input type="checkbox" id="P2_B_1110" name="check15" value="option2"> 10. Rellenos sanitarios?
												</label>
												<label>
													<input type="checkbox" id="P2_B_1111" name="check15" value="option1"> 11. Otro?
												</label>
												<label>(Especifique)</label>
												<input style="width:400px;" id="P2_B_11_Cod_O" type="text" class="form-control">
												<label>
													<input type="checkbox" id="P2_B_1112" name="check" value="option2"> 12. Ninguno
												</label>
											</td>
										</tr>
										<tr>
											<td>12.</td>
											<td>
												<strong>¿Existe vulnerabilidad por factores de exposición como:</strong>
												<br>(Acepte uno o mas códigos)
											</td>
											<td>
												<label>
													<input type="checkbox" id="P2_B_121" name="check16" value="option1"> 1. Cercanía lecho de río, quebrada?
												</label>
												<label>
													<input type="checkbox" id="P2_B_122" name="check16" value="option2"> 2. Cercanía a vía ferrea?
												</label>
												<label>
													<input type="checkbox" id="P2_B_123" name="check16" value="option1"> 3. Cercanía a barranco o precipicio?
												</label>
												<label>
													<input type="checkbox" id="P2_B_124" name="check16" value="option2"> 4. Cercanía a cuartel militar o policial?
												</label>
												<label>
													<input type="checkbox" id="P2_B_125" name="check16" value="option1"> 5. Erosión fluvial de laderas?
												</label>
												<label>
													<input type="checkbox" id="P2_B_126" name="check16" value="option2"> 6. Otro?
												</label>
												<label>(Especifique)</label>
												<input style="width:400px;" id="P2_B_12_Cod_O" type="text" class="form-control">
												<label>
												<label>
													<input type="checkbox" id="P2_B_127" name="check16" value="option1"> 7. Ninguno
												</label>
											</td>
										</tr>
									</tbody>
							</table>

							<table class="table table-bordered">
								<thead>
									<tr>
										<th colspan="4" style="text-align:center;">Sección C: Servicios basicos y comunicaciones</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td>1.</td>
										<td><strong>¿En esta localidad cuentan con servicio de:</strong></td>
										<td>

											<table class="table table-bordered" style="width:250px;height:200px;">
												<thead>
													<tr>
														<th style="text-align:center;">Servicios</th>
														<th style="text-align:center;">Si</th>
														<th style="text-align:center;">No</th>
													</tr>
												</thead>
												<tbody>
													<tr>
														<td>1.	Energía eléctrica?</td>
														<td>
															<label>
																<input type="checkbox" id="P2_C_1Locl_1_Energ1" name="P2_C_1Locl_1_Energ1" value="">
																 1
															</label>
														</td>
														<td>
															<label>
																<input type="checkbox" id="P2_C_1Locl_1_Energ2" name="P2_C_1Locl_1_Energ2" value="">
																 2
															</label>
														</td>
													</tr>
													<tr>
														<td>2.	Agua potable?</td>
														<td>
															<label>
																<input type="checkbox" id="P2_C_1Locl_2_Agua1" name="P2_C_1Locl_2_Agua1" value="">
																 1
															</label>
														</td>
														<td>
															<label>
																<input type="checkbox" id="P2_C_1Locl_2_Agua2" name="P2_C_1Locl_2_Agua2" value="">
																 2
															</label>
														</td>
													</tr>
													<tr>
														<td>3.	Alcantarillado?	</td>
														<td>
															<label>
																<input type="checkbox" id="P2_C_1Locl_3_Alc1" name="P2_C_1Locl_3_Alc11" value="">
																 1
															</label>
														</td>
														<td>
															<label>
																<input type="checkbox" id="P2_C_1Locl_3_Alc12" name="P2_C_1Locl_3_Alc12" value="">
																 2
															</label>
														</td>
													</tr>
												</tbody>
											</table>

										</td>
										<td>
											<table class="table table-bordered" style="width:250px;height:200px;">
												<thead>
													<tr>
														<th style="text-align:center;">Servicios</th>
														<th style="text-align:center;">Si</th>
														<th style="text-align:center;">No</th>
													</tr>
												</thead>
												<tbody>
													<tr>
														<td>Telefonía fija?</td>
														<td>
															<label>
																<input type="checkbox" id="P2_C_1Locl_4_Tfija1" name="P2_C_1Locl_4_Tfija1" value="option2">
																 1
															</label>
														</td>
														<td>
															<label>
																<input type="checkbox" id="P2_C_1Locl_4_Tfija1" name="P2_C_1Locl_4_Tfija2" value="option2">
																 2
															</label>
														</td>
													</tr>
													<tr>
														<td>Telefonía móvil?</td>
														<td>
															<label>
																<input type="checkbox" id="P2_C_1Locl_5_Tmov1" name="P2_C_1Locl_5_Tmov1" value="option2">
																 1
															</label>
														</td>
														<td>
															<label>
																<input type="checkbox" id="P2_C_1Locl_5_Tmov2" name="P2_C_1Locl_5_Tmov2" value="option2">
																 2
															</label>
														</td>
													</tr>
													<tr>
														<td>Internet?</td>
														<td>
															<label>
																<input type="checkbox" id="P2_C_1Locl_6_Int1" name="P2_C_1Locl_6_Int1" value="option2">
																 1
															</label>
														</td>
														<td>
															<label>
																<input type="checkbox" id="P2_C_1Locl_6_Int2" name="P2_C_1Locl_6_Int2" value="option2">
																 2
															</label>
														</td>
													</tr>
												</tbody>
											</table>

										</td>
									</tr>
									<tr>
										<td>2.</td>
										<td><strong>¿En este local escolar cuentan con servicio de:</strong></td>
										<td>

											<table class="table table-bordered" style="width:250px;height:200px;">
												<thead>
													<tr>
														<th style="text-align:center;">Servicios</th>
														<th style="text-align:center;">Si</th>
														<th style="text-align:center;">No</th>
													</tr>
												</thead>
												<tbody>
													<tr>
														<td>1.	Energía eléctrica?</td>
														<td>
															<label>
																<input type="checkbox" id="P2_C_2LocE_1_Energ1" name="P2_C_2LocE_1_Energ1" value="option2">
																 1
															</label>
														</td>
														<td>
															<label>
																<input type="checkbox" id="P2_C_2LocE_1_Energ2" name="P2_C_2LocE_1_Energ2" value="option2">
																 2
															</label>
														</td>
													</tr>
													<tr>
														<td>2.	Agua potable?</td>
														<td>
															<label>
																<input type="checkbox" id="P2_C_2LocE_2_Agua1" name="P2_C_2LocE_2_Agua1" value="option2">
																 1
															</label>
														</td>
														<td>
															<label>
																<input type="checkbox" id="P2_C_2LocE_2_Agua2" name="P2_C_2LocE_2_Agua2" value="option2">
																 2
															</label>
														</td>
													</tr>
													<tr>
														<td>3.	Alcantarillado?	</td>
														<td>
															<label>
																<input type="checkbox" id="P2_C_2LocE_3_Alc1" name="P2_C_2LocE_3_Alc1" value="option2">
																 1
															</label>
														</td>
														<td>
															<label>
																<input type="checkbox" id="P2_C_2LocE_3_Alc2" name="P2_C_2LocE_3_Alc2" value="option2">
																 2
															</label>
														</td>
													</tr>
												</tbody>
											</table>

										</td>
										<td>

											<table class="table table-bordered" style="width:250px;height:200px;">
												<thead>
													<tr>
														<th style="text-align:center;">Servicios</th>
														<th style="text-align:center;">Si</th>
														<th style="text-align:center;">No</th>
													</tr>
												</thead>
												<tbody>
													<tr>
														<td>Telefonía fija?</td>
														<td>
															<label>
																<input type="checkbox" id="P2_C_2LocE_4_Tfija1" name="P2_C_2LocE_4_Tfija1" value="option2">
																 1
															</label>
														</td>
														<td>
															<label>
																<input type="checkbox" id="P2_C_2LocE_4_Tfija2" name="P2_C_2LocE_4_Tfija2" value="option2">
																 2
															</label>
														</td>
													</tr>
													<tr>
														<td>Telefonía móvil?</td>
														<td>
															<label>
																<input type="checkbox" id="P2_C_2LocE_5_Tmov1" name="P2_C_2LocE_5_Tmov1" value="option2">
																 1
															</label>
														</td>
														<td>
															<label>
																<input type="checkbox" id="P2_C_2LocE_5_Tmov2" name="P2_C_2LocE_5_Tmov2" value="option2">
																 2
															</label>
														</td>
													</tr>
													<tr>
														<td>Internet?</td>
														<td>
															<label>
																<input type="checkbox" id="P2_C_2LocE_6_Int1" name="P2_C_2LocE_6_Int1" value="option2">
																 1
															</label>
														</td>
														<td>
															<label>
																<input type="checkbox" id="P2_C_2LocE_6_Int2" name="P2_C_2LocE_6_Int2" value="option2">
																 2
															</label>
														</td>
													</tr>
												</tbody>
											</table>

										</td>
									</tr>
								</tbody>
							</table>

							<table class="table table-bordered">
								<thead>
									<tr>
										<th colspan="3">Sección D: Conexión de los servicios basicos del local escolar</th>
									</tr>
									<tr>
										<td colspan="3">Si en la Sección C, pregunta 2, ítem 1, circuló código 2 (No), pasar a la pregunta 5.</td>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td>1.</td>
										<td>
											<strong>La energía eléctrica del local escolar, ¿procede de:</strong><br />
											(Acepte uno o más códigos)
										</td>
										<td>
											<label>
												<input type="checkbox" id="Checkbox2" name="check" value="option2"> 1. Red pública?
											</label>
											<label>
												<input type="checkbox" id="Checkbox2" name="check" value="option2"> 2. Generador o motor?
											</label>
											<label>
												<input type="checkbox" id="Checkbox2" name="check" value="option2"> 3. Panel solar?
											</label>
											<label>
												<input type="checkbox" id="Checkbox2" name="check" value="option2"> 4. Otro?
											</label>
											<label>(Especifique)</label>
											<input style="width:400px;" type="text" class="form-control">
										</td>

									</tr>
								</tbody>
							</table>

							<table class="table table-bordered">
								<thead>
									<tr>
										<th colspan="3">Evaluador: Verifique la pregunta 1, si tiene circulado el código 1 “Red pública”, pase a la pregunta 2, de los contrario pase a la pregunta 5</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td>2.</td>
										<td><strong>¿Con cuántos suministros eléctricos cuenta este local escolar?</strong></td>
										<td>
											<div class="panel">
												<label>Cantidad</label>
												<input style="width:100px;" type="text" class="form-control">
											</div>
										</td>
									</tr>
									<tr>
										<td>3.</td>
										<td><strong>¿Cuáles son los números de suministros eléctricos con que cuenta este local escolar?</strong>
											<br />(diligencie, según respuesta en pregunta 2)
										</td>
										<td>
											<table class="table table-bordered">
												<tr>
													<td style="text-align:center"><strong>Suministro N°</strong></td>
												</tr>
												<tr>
													<th style="text-align:center">1</th>
													<td><input style="width:250px;" type="text" class="form-control"></td>
													<td style="text-align:center">1</td>
												</tr>
												<tr>
													<th style="text-align:center">2</th>
													<td><input style="width:250px;" type="text" class="form-control"></td>
													<td style="text-align:center">2</td>
												</tr>
												<tr>
													<th style="text-align:center">3</th>
													<td><input style="width:250px;" type="text" class="form-control"></td>
													<td style="text-align:center">3</td>
												</tr>
											</table>
											<div class="panel" style="text-align:center">
												(1) No tiene documento de referencia
											</div>
										</td>
									</tr>
									<tr>
										<td>4.</td>
										<td><strong>¿Cuál es el nombre de la empresa que suministra el servicio eléctrico?</strong></td>
										<td><input style="width:400px;" type="text" class="form-control"></td>
									</tr>
									<tr>
										<td>5.</td>
										<td><strong>El abastecimiento de agua, ¿procede de:</strong>
											<br />(Acepte uno o más códigos)
										</td>
										<td>
											<label>
												<input type="checkbox" id="Checkbox1" name="check" value="option1"> 1. Red pública?
											</label>
											<label>
												<input type="checkbox" id="Checkbox2" name="check" value="option2"> 2. Pilón de uso público (agua potable)?
											</label>
											<label>
												<input type="checkbox" id="Checkbox1" name="check" value="option1"> 3. Camión cisterna u otro similar?
											</label>
											<label>
												<input type="checkbox" id="Checkbox2" name="check" value="option2"> 4. Pozo?
											</label>
											<label>
												<input type="checkbox" id="Checkbox1" name="check" value="option1"> 5. Río, acequia, manantial o similar?
											</label>
											<label>
												<input type="checkbox" id="Checkbox2" name="check" value="option2"> 6. Otro?
											</label>
											<label>(Especifique)</label>
											<input style="width:400px;" type="text" class="form-control">
										</td>
									</tr>

								</tbody>
							</table>

							<table class="table table-bordered">
								<thead>
									<tr>
										<th colspan="3">Evaluador: Verifique la pregunta 5, si tiene circulado el código 1, pase a la pregunta 6, de lo contrario pase a la pregunta 9</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td>6.</td>
										<td><strong>¿Con cuántos suministros de agua cuenta el local escolar?</strong></td>
										<td>
											<div class="panel">
												<label>Cantidad</label>
												<input style="width:100px;" type="text" class="form-control">
											</div>
										</td>
									</tr>
									<tr>
										<td>7.</td>
										<td><strong>¿Cuáles son los números de suministros de agua con que cuenta el local escolar?</strong>
											<br />(diligencie, según respuesta en pregunta 6)
										</td>
										<td>
											<table class="table table-bordered">
												<tr>
													<td style="text-align:center"><strong>Suministro N°</strong></td>
												</tr>
												<tr>
													<th style="text-align:center">1</th>
													<td><input style="width:250px;" type="text" class="form-control"></td>
													<td style="text-align:center">1</td>
												</tr>
												<tr>
													<th style="text-align:center">2</th>
													<td><input style="width:250px;" type="text" class="form-control"></td>
													<td style="text-align:center">2</td>
												</tr>
												<tr>
													<th style="text-align:center">3</th>
													<td><input style="width:250px;" type="text" class="form-control"></td>
													<td style="text-align:center">3</td>
												</tr>
											</table>
											<div class="panel" style="text-align:center">
												(1) No tiene documento de referencia
											</div>
										</td>
									</tr>
									<tr>
										<td>8.</td>
										<td><strong>¿Cuál es el nombre de la empresa que suministra el servicio de agua?</strong></td>
										<td><input style="width:400px;" type="text" class="form-control"></td>
									</tr>
									<tr>
										<td>9.</td>
										<td><strong>¿el desagüe del local escolar está conectado a:</strong>
											<br />(Acepte solo un código)
										</td>
										<td>
											<label>
												<input type="checkbox" id="Checkbox1" name="check" value="option1"> 1. Red pública?
											</label>
											<label>
												<input type="checkbox" id="Checkbox2" name="check" value="option2"> 2. Tanque séptico y pozo percolador?
											</label>
											<label>
												<input type="checkbox" id="Checkbox1" name="check" value="option1"> 3. Pozo con tratamiento (cal, ceniza y otro)?
											</label>
											<label>
												<input type="checkbox" id="Checkbox2" name="check" value="option2"> 4. Pozo sin tratamiento alguno?
											</label>
											<label>
												<input type="checkbox" id="Checkbox1" name="check" value="option1"> 5. Río, acequia, manantial o canal?
											</label>
											<label>
												<input type="checkbox" id="Checkbox2" name="check" value="option2"> 6. Zanja filtrante?
											</label>
											<label>
												<input type="checkbox" id="Checkbox2" name="check" value="option2"> 7. No tiene
											</label>
										</td>
									</tr>

								</tbody>
							</table>

							<table class="table table-bordered">
								<thead>
									<tr>
										<th colspan="3">Sección E:  Pararrayos – Descargadores o Discipadores de sobretensiones</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td>1.</td>
										<td><strong>¿El local escolar, cuenta con pararrayos?</strong></td>
										<td>
											<label>
												<input type="radio" id="Checkbox1" name="check" value="option1"> 1. Si?
											</label>
											<label>
												<input type="radio" id="Checkbox2" name="check" value="option2"> 2. No?
											</label>
										</td>
									</tr>
									<tr>
										<td>2.</td>
										<td><strong>¿Con cuántas puestas a tierra cuenta el pararrayos?</strong></td>
										<td>
											<div class="panel">
												<label>Cantidad</label>
												<input style="width:100px;" type="text" class="form-control">
											</div>
										</td>
									</tr>
									<tr>
										<td>3.</td>
										<td><strong>¿En que año se hizo el último mantenimiento al sistema de puesta a tierra?</strong></td>
										<td>
											<div class="panel">
												<label>Año</label>
												<input style="width:100px;" type="text" class="form-control">
											</div>
										</td>
									</tr>

								</tbody>
							</table>

							<table class="table table-bordered">
								<thead>
									<tr>
										<th>Sección F:  Eliminación de basura</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td>1</td>
										<td>
											<strong>¿En el local escolar la basura que se elimina es:</strong>
											<br />(Acepte uno o más códigos)
										</td>
										<td>
											<label>
													<input type="checkbox" id="Checkbox1" name="check" value="option1"> 1. Arrojada al camión/triciclo municipal?
												</label>
												<label>
													<input type="checkbox" id="Checkbox2" name="check" value="option2"> 2. Arrojada al camión/informal?
												</label>
												<label>
													<input type="checkbox" id="Checkbox1" name="check" value="option1"> 3. Depositada en contenedor?
												</label>
												<label>
													<input type="checkbox" id="Checkbox2" name="check" value="option2"> 4. Acumulada en calles/campo abierto?
												</label>
												<label>
													<input type="checkbox" id="Checkbox1" name="check" value="option1"> 5. Reciclada?
												</label>
												<label>
													<input type="checkbox" id="Checkbox2" name="check" value="option2"> 6. Quemada?
												</label>
												<label>
													<input type="checkbox" id="Checkbox1" name="check" value="option1"> 7. Enterrada?
												</label>
												<label>
													<input type="checkbox" id="Checkbox2" name="check" value="option2"> 8. Usada como alimento para animales?
												</label>
												<label>
													<input type="checkbox" id="Checkbox1" name="check" value="option1"> 9. Separada para el compost?
												</label>
												<label>
													<input type="checkbox" id="Checkbox1" name="check" value="option1"> 10. Otra forma?
												</label>
												<label>(Especifique)</label>
												<input style="width:400px;" type="text" class="form-control">
										</td>
									</tr>
								</tbody>
							</table>

							<table class="table table-bordered">
								<thead>
									<tr>
										<th>Sección G:  Nuevas intervenciones en el local escolar</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td>1.</td>
										<td>
											<strong>¿En el local escolar existen obras en ejecución?</strong>
										</td>
										<td>
											<label>
												<input type="radio" id="Checkbox1" name="check" value="option1"> 1. Si?
											</label>
											<label>
												<input type="radio" id="Checkbox2" name="check" value="option2"> 2. No?
											</label>
										</td>
									</tr>
									<tr>
										<td>2.</td>
										<td>
											<strong>¿Qué instituciones, organismos o empresas están ejecutando estas obras?</strong>
											<br />(Acepte uno o más códigos)
										</td>
										<td>
											<table class="table table-bordered">
												<thead>
													<tr>
														<td style="text-align:center" rowspan="2">Instituciones</td>
														<td style="text-align:center" colspan="2">2A. ¿cuenta con estudio de pre-inversión?</td>
														<td style="text-align:center" rowspan="2">2B. ¿cuál es el código snip?</td>
													</tr>
													<tr>
														<td style="text-align:center">Si</td>
														<td style="text-align:center">No</td>
													</tr>
												</thead>
												<tbody>
													<tr>
														<td>Gobierno nacional / proyectos especiales</td>
														<td>
															<label>
																<input type="checkbox" id="Checkbox1" name="check" value="option1"> 1
															</label>
														</td>
														<td><label>
																<input type="checkbox" id="Checkbox1" name="check" value="option1"> 2
															</label>
														</td>
														<td><input style="width:250px;" type="text" class="form-control"></td>
													</tr>
													<tr>
														<td>Gobierno regional / local</td>
														<td>
															<label>
																<input type="checkbox" id="Checkbox1" name="check" value="option1"> 1
															</label>
														</td>
														<td><label>
																<input type="checkbox" id="Checkbox1" name="check" value="option1"> 2
															</label>
														</td>
														<td><input style="width:250px;" type="text" class="form-control"></td>
													</tr>
													<tr>
														<td>Apafa / autoconstrucción</td>
														<td>
															<label>
																<input type="checkbox" id="Checkbox1" name="check" value="option1"> 1
															</label>
														</td>
														<td><label>
																<input type="checkbox" id="Checkbox1" name="check" value="option1"> 2
															</label>
														</td>
														<td><input style="width:250px;" type="text" class="form-control"></td>
													</tr>
													<tr>
														<td>Entidades cooperantes</td>
														<td>
															<label>
																<input type="checkbox" id="Checkbox1" name="check" value="option1"> 1
															</label>
														</td>
														<td><label>
																<input type="checkbox" id="Checkbox1" name="check" value="option1"> 2
															</label>
														</td>
														<td><input style="width:250px;" type="text" class="form-control"></td>
													</tr>
													<tr>
														<td>Organismos sin fines de lucro</td>
														<td>
															<label>
																<input type="checkbox" id="Checkbox1" name="check" value="option1"> 1
															</label>
														</td>
														<td><label>
																<input type="checkbox" id="Checkbox1" name="check" value="option1"> 2
															</label>
														</td>
														<td><input style="width:250px;" type="text" class="form-control"></td>
													</tr>
													<tr>
														<td>Empresa privada</td>
														<td>
															<label>
																<input type="checkbox" id="Checkbox1" name="check" value="option1"> 1
															</label>
														</td>
														<td><label>
																<input type="checkbox" id="Checkbox1" name="check" value="option1"> 2
															</label>
														</td>
														<td><input style="width:250px;" type="text" class="form-control"></td>
													</tr>
													<tr>
														<td>Otro</td>
														<td>
															<label>
																<input type="checkbox" id="Checkbox1" name="check" value="option1"> 1
															</label>
														</td>
														<td><label>
																<input type="checkbox" id="Checkbox1" name="check" value="option1"> 2
															</label>
														</td>
														<td><input style="width:250px;" type="text" class="form-control"></td>
													</tr>
												</tbody>
											</table>
										</td>
									</tr>
								</tbody>
							</table>

							<div class="panel">
								<label>Observaciones:</label>
								<textarea style="width:870px; height:100px;"></textarea>
							</div>

						</div><!--END PANEL PRINCIPAL CAP2-->
	  	    		</div>
	  	    	</div>

	  	    	<!-- CAPITULO 3 -->
	  	    	<div class="tab-pane" id="cap3">
	  	    		<div class="content" id="content4">
	  	    			<div class="panel panel-info">
							<div class="panel-heading">
								<h5 class="panel-title">Capítulo III. Georeferenciación del local escolar</h5>
							</div>

							<table class="table table-bordered">
								<thead>
									<tr>
										<th colspan="3">Sección A:  georeferenciación del terreno con GPS</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td>1.</td>
										<td>
											<strong>Lugar de georeferenciación</strong>
										</td>
										<td>
											<label>
												<input type="radio" id="Checkbox1" name="check" value="option1"> 1. Patio Central
											</label>
											<label>
												<input type="radio" id="Checkbox2" name="check" value="option2"> 2. Frente al local
											</label>
										</td>
									</tr>
									<tr>
										<td>2.</td>
										<td>
											<strong>Rango de puntos</strong>
										</td>
										<td>
											<table class="table table-bordered">
												<tr>
													<td>Punto Inicial</td>
													<td></td>
												</tr>
												<tr>
													<td>Punto Final</td>
													<td></td>
												</tr>
											</table>
										</td>
									</tr>
									<tr>
										<td>3.</td>
										<td>
											<strong>Toma de última coordenada</strong>
										</td>

										<td>
											<table class="table table-bordered">
												<tr>
													<td></td>
													<th style="text-align:center;">Longitud</th>
													<th style="text-align:center;">Latitud</th>
													<th style="text-align:center;">Altitud (msnm)</th>
												</tr>
												<tr>
													<td>Punto Final</td>
													<td></td>
													<td></td>
													<td></td>
												</tr>
											</table>
										</td>
									</tr>
									<tr>
										<td>4.</td>
										<td>
											<strong>
												Nombre del archivo gps
											</strong>
											<br />(sólo si utilizó equipo gps)
										</td>
										<td><input style="width:400px;" type="text" class="form-control"></td>
									</tr>
									<tr>
										<td>5.</td>
										<td>
											<strong>Código de la fotografía del local escolar</strong>
										</td>
										<td><input style="width:400px;" type="text" class="form-control"></td>
									</tr>
								</tbody>
							</table>

							<div class="panel">
								<label>Observaciones:</label>
								<textarea style="width:870px; height:100px;"></textarea>
							</div>


						</div>
	  	    		</div>
	  	    	</div><!-- END CAPITULO 3-->

	  	    	<!-- CAPITULO G2-->
	  	    	<div class="tab-pane" id="general2">
	  	    		<div class="content" id="content5">
	  	    			<div class="panel panel-info">

							<div class="panel-heading">
								<h4 class="panel-title">Sección A: Ubicación Geográfica del local escolar</h4>
							</div>

								<ul class="list-group">
									<li class="list-group-item"><div style="width:150px; margin-left:10px; float:left;">1. Departamento </div> <input style="width:300px;" type="text" class="form-control"></li>
									<li class="list-group-item"><div style="width:150px; margin-left:10px; float:left;">2. Provincia </div> <input style="width:300px;" type="text" class="form-control"></li>
									<li class="list-group-item"><div style="width:150px; margin-left:10px; float:left;">3. Distrito </div> <input style="width:300px;" type="text" class="form-control"></li>
									<li class="list-group-item"><div style="width:150px; margin-left:10px; float:left;">4. Centro Poblado </div> <input style="width:300px;" type="text" class="form-control"></li>
									<li class="list-group-item"><div style="width:150px; margin-left:10px; float:left;">5. Nucleo Urbano </div> <input style="width:300px;" type="text" class="form-control"></li>
									<li class="list-group-item"><div style="width:150px; margin-left:10px; float:left;">6. UGEL </div> <input style="width:300px;" type="text" class="form-control"></li>
								</ul>

						</div>

						<table class="table table-bordered">
							<thead>
								<th colspan="2">Sección B: Identificación del local escolar</th>
							</thead>
							<tbody>
								<td><strong>1. Transcriba el código del local escolar del DOC.CIE.03.06</strong></td>
								<td><input style="width:400px;" type="text" class="form-control" ></td>
							</tbody>
						</table>

						<table class="table table-bordered">
							<tbody>
								<tr>
									<td>
										<div class="panel">
											<label>Observaciones:</label>
											<textarea style="width:870px; height:100px;"></textarea>
										</div>
									</td>
								</tr>
							</tbody>
						</table>

	  	    		</div><!--END CONTENT-->
	  	    	</div><!-- END CAPITULO G2-->

	  	    	<!-- CAPITULO 4-->
	  	    	<div class="tab-pane" id="cap4">
	  	    		<div class="content" id="content6">

	  	    			<div class="panel panel-info">
	  	    				<div class="panel-heading">
	  	    					<h5>Capitulo VI. Localización del predio y caracteristicas de sus linderos</h5>
	  	    				</div>

	  	    				<table class="table table-bordered">
		  	    				<thead>
		  	    					<tr>
			  	    					<th>Sección A: Croquis de localización del predio</th>
		  	    					</tr>
		  	    				</thead>
		  	    				<tbody>
		  	    					<tr>
		  	    						<td><- Fotos -></td>
		  	    					</tr>
		  	    				</tbody>
		  	    			</table>

		  	    			<table class="table table-bordered">
		  	    				<thead>
		  	    					<tr>
		  	    						<th colspan="3">Sección B:  características de linderos</th>
		  	    					</tr>
		  	    				</thead>
		  	    				<tbody>
		  	    					<tr>
		  	    						<td>1.</td>
		  	    						<td><strong>De cuántos tramos está conformado el lindero frente con o sin cerco</strong></td>
		  	    						<td>
		  	    							<label>Nº total de tramos:</label>
		  	    							<input type="text" class="form-control">
		  	    						</td>
		  	    					</tr>
		  	    					<tr>
		  	    						<td></td>
		  	    						<td colspan="2">

		  	    							<table class="table table-bordered">
		  	    								<thead>
		  	    									<tr>
		  	    										<th colspan="8" style="text-align:center; vertical-align:middle;">
		  	    											Lindero frente (especifique cada uno de los tramos en el cuadro)
		  	    										</th>
		  	    									</tr>
		  	    									<tr>
		  	    										<th style="text-align:center; vertical-align:middle;" rowspan="2">N°</th>
		  	    										<th style="text-align:center; vertical-align:middle;" rowspan="2">1A. Nº de tramo</th>
		  	    										<th style="text-align:center; vertical-align:middle;" rowspan="2">1B. Longitud del tramo (m)</th>
		  	    										<th style="text-align:center; vertical-align:middle;" colspan="2">1C. El tramo tiene cerco</th>
		  	    										<th style="text-align:center; vertical-align:middle;" rowspan="2">1D. El sistema estructural predominante del tramo es:</th>
		  	    										<th style="text-align:center; vertical-align:middle;" rowspan="2">1E. Estado de conservación del tramo</th>
		  	    										<th style="text-align:center; vertical-align:middle;" rowspan="2">1F. Opinión técnica del evaluador</th>
		  	    									</tr>
		  	    									<tr>
		  	    										<th style="text-align:center; vertical-align:middle;"></th>
		  	    										<th style="text-align:center; vertical-align:middle;"></th>
		  	    									</tr>
		  	    								</thead>
		  	    								<tbody>
		  	    									<tr>
		  	    										<td style="text-align:center; vertical-align:middle;">1</td>
		  	    										<td>Hasta 20</td>
		  	    										<td></td>
		  	    										<td>
		  	    											<div class="checkbox">
														      <label>
														        <input type="checkbox"> 1
														      </label>
														    </div>
		  	    										</td>
		  	    										<td>
		  	    											<div class="checkbox">
														      <label>
														        <input type="checkbox"> 2
														      </label>
														    </div>
		  	    										</td>
		  	    										<td></td>
		  	    										<td></td>
		  	    										<td></td>
		  	    									</tr>
		  	    								</tbody>
		  	    							</table>

		  	    						</td>
		  	    					</tr>
		  	    					<tr>
		  	    						<td>2.</td>
		  	    						<td><strong>De cuántos tramos está conformado el lindero derecho con o sin cerco</strong></td>
		  	    						<td>
		  	    							<label>Nº total de tramos:</label>
		  	    							<input type="text" class="form-control">
		  	    						</td>
		  	    					</tr>
		  	    					<tr>
		  	    						<td></td>
		  	    						<td colspan="2">

		  	    							<table class="table table-bordered">
		  	    								<thead>
		  	    									<tr>
		  	    										<th colspan="8" style="text-align:center; vertical-align:middle;">
		  	    											Lindero Derecho (especifique cada uno de los tramos en el cuadro)
		  	    										</th>
		  	    									</tr>
		  	    									<tr>
		  	    										<th style="text-align:center; vertical-align:middle;" rowspan="2">N°</th>
		  	    										<th style="text-align:center; vertical-align:middle;" rowspan="2">2A. Nº de tramo</th>
		  	    										<th style="text-align:center; vertical-align:middle;" rowspan="2">2B. Longitud del tramo (m)</th>
		  	    										<th style="text-align:center; vertical-align:middle;" colspan="2">2C. El tramo tiene cerco</th>
		  	    										<th style="text-align:center; vertical-align:middle;" rowspan="2">2D. El sistema estructural predominante del tramo es:</th>
		  	    										<th style="text-align:center; vertical-align:middle;" rowspan="2">2E. Estado de conservación del tramo</th>
		  	    										<th style="text-align:center; vertical-align:middle;" rowspan="2">2F. Opinión técnica del evaluador</th>
		  	    									</tr>
		  	    									<tr>
		  	    										<th style="text-align:center; vertical-align:middle;"></th>
		  	    										<th style="text-align:center; vertical-align:middle;"></th>
		  	    									</tr>
		  	    								</thead>
		  	    								<tbody>
		  	    									<tr>
		  	    										<td style="text-align:center; vertical-align:middle;">1</td>
		  	    										<td>Hasta 20</td>
		  	    										<td></td>
		  	    										<td>
		  	    											<div class="checkbox">
														      <label>
														        <input type="checkbox"> 1
														      </label>
														    </div>
		  	    										</td>
		  	    										<td>
		  	    											<div class="checkbox">
														      <label>
														        <input type="checkbox"> 2
														      </label>
														    </div>
		  	    										</td>
		  	    										<td></td>
		  	    										<td></td>
		  	    										<td></td>
		  	    									</tr>
		  	    								</tbody>
		  	    							</table>

		  	    						</td>
		  	    					</tr>
		  	    					<tr>
		  	    						<td>3.</td>
		  	    						<td><strong>De cuántos tramos está conformado el lindero fondo con o sin cerco</strong></td>
		  	    						<td>
		  	    							<label>Nº total de tramos:</label>
		  	    							<input type="text" class="form-control">
		  	    						</td>
		  	    					</tr>
		  	    					<tr>
		  	    						<td></td>
		  	    						<td colspan="2">

		  	    							<table class="table table-bordered">
		  	    								<thead>
		  	    									<tr>
		  	    										<th colspan="8" style="text-align:center; vertical-align:middle;">
		  	    											Lindero fondo (especifique cada uno de los tramos en el cuadro)
		  	    										</th>
		  	    									</tr>
		  	    									<tr>
		  	    										<th style="text-align:center; vertical-align:middle;" rowspan="2">N°</th>
		  	    										<th style="text-align:center; vertical-align:middle;" rowspan="2">3A. Nº de tramo</th>
		  	    										<th style="text-align:center; vertical-align:middle;" rowspan="2">3B. Longitud del tramo (m)</th>
		  	    										<th style="text-align:center; vertical-align:middle;" colspan="2">3C. El tramo tiene cerco</th>
		  	    										<th style="text-align:center; vertical-align:middle;" rowspan="2">3D. El sistema estructural predominante del tramo es:</th>
		  	    										<th style="text-align:center; vertical-align:middle;" rowspan="2">3E. Estado de conservación del tramo</th>
		  	    										<th style="text-align:center; vertical-align:middle;" rowspan="2">3F. Opinión técnica del evaluador</th>
		  	    									</tr>
		  	    									<tr>
		  	    										<th style="text-align:center; vertical-align:middle;"></th>
		  	    										<th style="text-align:center; vertical-align:middle;"></th>
		  	    									</tr>
		  	    								</thead>
		  	    								<tbody>
		  	    									<tr>
		  	    										<td style="text-align:center; vertical-align:middle;">1</td>
		  	    										<td>Hasta 20</td>
		  	    										<td></td>
		  	    										<td>
		  	    											<div class="checkbox">
														      <label>
														        <input type="checkbox"> 1
														      </label>
														    </div>
		  	    										</td>
		  	    										<td>
		  	    											<div class="checkbox">
														      <label>
														        <input type="checkbox"> 2
														      </label>
														    </div>
		  	    										</td>
		  	    										<td></td>
		  	    										<td></td>
		  	    										<td></td>
		  	    									</tr>
		  	    								</tbody>
		  	    							</table>

		  	    						</td>
		  	    					</tr>
		  	    					<tr>
		  	    						<td>4.</td>
		  	    						<td><strong>De cuántos tramos está conformado el lindero izquierdo con o sin cerco</strong></td>
		  	    						<td>
		  	    							<label>Nº total de tramos:</label>
		  	    							<input type="text" class="form-control">
		  	    						</td>
		  	    					</tr>
		  	    					<tr>
		  	    						<td></td>
		  	    						<td colspan="2">

		  	    							<table class="table table-bordered">
		  	    								<thead>
		  	    									<tr>
		  	    										<th colspan="8" style="text-align:center; vertical-align:middle;">
		  	    											Lindero izquierdo (especifique cada uno de los tramos en el cuadro)
		  	    										</th>
		  	    									</tr>
		  	    									<tr>
		  	    										<th style="text-align:center; vertical-align:middle;" rowspan="2">N°</th>
		  	    										<th style="text-align:center; vertical-align:middle;" rowspan="2">4A. Nº de tramo</th>
		  	    										<th style="text-align:center; vertical-align:middle;" rowspan="2">4B. Longitud del tramo (m)</th>
		  	    										<th style="text-align:center; vertical-align:middle;" colspan="2">4C. El tramo tiene cerco</th>
		  	    										<th style="text-align:center; vertical-align:middle;" rowspan="2">4D. El sistema estructural predominante del tramo es:</th>
		  	    										<th style="text-align:center; vertical-align:middle;" rowspan="2">4E. Estado de conservación del tramo</th>
		  	    										<th style="text-align:center; vertical-align:middle;" rowspan="2">4F. Opinión técnica del evaluador</th>
		  	    									</tr>
		  	    									<tr>
		  	    										<th style="text-align:center; vertical-align:middle;"></th>
		  	    										<th style="text-align:center; vertical-align:middle;"></th>
		  	    									</tr>
		  	    								</thead>
		  	    								<tbody>
		  	    									<tr>
		  	    										<td style="text-align:center; vertical-align:middle;">1</td>
		  	    										<td>Hasta 20</td>
		  	    										<td></td>
		  	    										<td>
		  	    											<div class="checkbox">
														      <label>
														        <input type="checkbox"> 1
														      </label>
														    </div>
		  	    										</td>
		  	    										<td>
		  	    											<div class="checkbox">
														      <label>
														        <input type="checkbox"> 2
														      </label>
														    </div>
		  	    										</td>
		  	    										<td></td>
		  	    										<td></td>
		  	    										<td></td>
		  	    									</tr>
		  	    								</tbody>
		  	    							</table>

		  	    						</td>
		  	    					</tr>

		  	    				</tbody>
		  	    			</table>

	  	    			</div>

	  	    		</div>
	  	    	</div><!-- END CAPITULO 4-->

	  	    	<!-- CAPITULO 5-->
	  	    	<div class="tab-pane" id="cap5">
	  	    		<div class="content" id="content7">

	  	    			<div class="panel panel-info">
	  	    				<div class="panel-heading">Capitulo V: Esquema de distribución de las edificaciones con ambientes</div>

	  	    				<table class="table table-bordered">
		  	    				<thead>
		  	    					<tr>
			  	    					<th>Piso N°1</th>
		  	    					</tr>
		  	    				</thead>
		  	    				<tbody>
		  	    					<tr>
		  	    						<td><- Fotos -></td>
		  	    					</tr>
		  	    				</tbody>
		  	    			</table>
	  	    				<table class="table table-bordered">
		  	    				<thead>
		  	    					<tr>
			  	    					<th>Piso N°2</th>
		  	    					</tr>
		  	    				</thead>
		  	    				<tbody>
		  	    					<tr>
		  	    						<td><- Fotos -></td>
		  	    					</tr>
		  	    				</tbody>
		  	    			</table>
	  	    				<table class="table table-bordered">
		  	    				<thead>
		  	    					<tr>
			  	    					<th>Piso N°3</th>
		  	    					</tr>
		  	    				</thead>
		  	    				<tbody>
		  	    					<tr>
		  	    						<td><- Fotos -></td>
		  	    					</tr>
		  	    				</tbody>
		  	    			</table>
	  	    				<table class="table table-bordered">
		  	    				<thead>
		  	    					<tr>
			  	    					<th>Piso N°4</th>
		  	    					</tr>
		  	    				</thead>
		  	    				<tbody>
		  	    					<tr>
		  	    						<td><- Fotos -></td>
		  	    					</tr>
		  	    				</tbody>
		  	    			</table>

	  	    			</div>

	  	    		</div>
	  	    	</div><!-- END CAPITULO 5-->

	  	    	<!-- CAPITULO G3-->
	  	    	<div class="tab-pane" id="general3">
	  	    		<div class="content" id="content8">
	  	    			<div class="panel panel-info">

							<div class="panel-heading">
								<h4 class="panel-title">Sección A: Ubicación Geográfica del local escolar</h4>
							</div>

								<ul class="list-group">
									<li class="list-group-item"><div style="width:150px; margin-left:10px; float:left;">1. Departamento </div> <input style="width:300px;" type="text" class="form-control"></li>
									<li class="list-group-item"><div style="width:150px; margin-left:10px; float:left;">2. Provincia </div> <input style="width:300px;" type="text" class="form-control"></li>
									<li class="list-group-item"><div style="width:150px; margin-left:10px; float:left;">3. Distrito </div> <input style="width:300px;" type="text" class="form-control"></li>
									<li class="list-group-item"><div style="width:150px; margin-left:10px; float:left;">4. Centro Poblado </div> <input style="width:300px;" type="text" class="form-control"></li>
									<li class="list-group-item"><div style="width:150px; margin-left:10px; float:left;">5. Nucleo Urbano </div> <input style="width:300px;" type="text" class="form-control"></li>
									<li class="list-group-item"><div style="width:150px; margin-left:10px; float:left;">6. UGEL </div> <input style="width:300px;" type="text" class="form-control"></li>
								</ul>

						</div>

						<table class="table table-bordered">
							<thead>
								<th colspan="2">Sección B: Identificación del local escolar</th>
							</thead>
							<tbody>
								<td><strong>1. Transcriba el código del local escolar del DOC.CIE.03.06</strong></td>
								<td><input style="width:400px;" type="text" class="form-control" ></td>
							</tbody>
						</table>

						<table class="table table-bordered">
							<thead>
								<tr>
									<th>
										EDIFICACIÓN <input style="width:70px;" type="text" class="form-control" >
									</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td>
										<div class="panel">
											<label>Observaciones:</label>
											<textarea style="width:870px; height:100px;"></textarea>
										</div>
									</td>
								</tr>
							</tbody>
						</table>
	  	    		</div>
	  	    	</div><!-- END CAPITULO G3-->

	  	    	<!-- CAPITULO 6-->
	  	    	<div class="tab-pane" id="cap6">
	  	    		<div class="content" id="content8">
	  	    			<div class="panel panel-info">
	  	    				<div class="panel-heading">Capitulo VI: Caracteristicas generales de la edificación</div>

	  	    				<table class="table table-bordered">
		  	    				<thead>
		  	    					<tr>
			  	    					<th colspan="3">Sección A: Identificación de las edificaciones</th>
		  	    					</tr>
		  	    				</thead>
		  	    				<tbody>
		  	    					<tr>
		  	    						<td>1.</td>
		  	    						<td>
		  	    							<strong>Total de edificaciones “E” que conforman el local escolar</strong>
		  	    						</td>
		  	    						<td>
		  	    							<label>Verificar Cap. V</label>
		  	    							<input style="width:100px;" type="text" class="form-control">
		  	    						</td>
		  	    					</tr>
		  	    				</tbody>
		  	    			</table>

		  	    			<table class="table table-bordered">
		  	    				<thead>
		  	    					<tr>
			  	    					<th colspan="3">Sección A: Identificación de las edificaciones</th>
		  	    					</tr>
		  	    				</thead>
		  	    				<tbody>
		  	    					<tr>
		  	    						<td>2.</td>
		  	    						<td>
		  	    							<strong>
		  	    								Código de la edificación
		  	    							</strong>
		  	    						</td>
		  	    						<td>
		  	    							<span style="float:left;padding:8px;margin-right:10px; font-size:16px;" class="label label-default">E</span>
		  	    							<input style="width:100px;float:left;" type="text" class="form-control">
		  	    						</td>
		  	    					</tr>
		  	    					<tr>
		  	    						<td>3.</td>
		  	    						<td>
		  	    							<strong>
		  	    								Area techada del primer piso de la edificación
		  	    							</strong>
		  	    						</td>
		  	    						<td>
		  	    							Area en m2
		  	    							<table class="table table-bordered">
		  	    								<thead>
		  	    									<tr>
		  	    										<th style="text-align:center">Enteros</th>
		  	    										<th style="text-align:center">Decimales</th>
		  	    									</tr>
		  	    								</thead>
		  	    								<tbody>
		  	    									<tr>
		  	    										<td></td>
		  	    										<td></td>
		  	    									</tr>
		  	    								</tbody>
		  	    							</table>
		  	    						</td>
		  	    					</tr>
		  	    					<tr>
		  	    						<td>4.</td>
		  	    						<td>
		  	    							<strong>
		  	    								Predio en el que se ubica la edificación
		  	    							</strong>
		  	    						</td>
		  	    						<td>
		  	    							<label>Predio N°</label>
		  	    							<input style="width:100px;float:left;" type="text" class="form-control">
		  	    						</td>
		  	    					</tr>
		  	    					<tr>
		  	    						<td>5.</td>
		  	    						<td>
		  	    							<strong>
		  	    								¿esta edificación es parte del patrimonio cultural inmueble reconocido por el ministerio de cultura?
		  	    							</strong>
		  	    						</td>
		  	    						<td>
		  	    							<label class="checkbox-inline">
												<input type="radio" name="item1" id="inlineCheckbox2" value="option2"> 1. Si
											</label>
											<label class="checkbox-inline">
												<input type="radio" name="item1" id="inlineCheckbox3" value="option3"> 2. No
											</label>
		  	    						</td>
		  	    					</tr>
		  	    					<tr>
		  	    						<td>6.</td>
		  	    						<td>
		  	    							<strong>
		  	    								¿la edificación fue inspeccionada por defensa civil?
		  	    							</strong>
		  	    						</td>
		  	    						<td>
		  	    							<label class="checkbox-inline">
												<input type="radio" name="item2" id="inlineCheckbox2" value="option2"> 1. Si
											</label>
											<label class="checkbox-inline">
												<input type="radio" name="item2" id="inlineCheckbox3" value="option3"> 2. No
											</label>
		  	    						</td>
		  	    					</tr>
		  	    					<tr>
		  	    						<td>7.</td>
		  	    						<td>
		  	    							<strong>
		  	    								¿la edificación se encuentra declarada inhabitable (alto riesgo)?
		  	    							</strong>
		  	    						</td>
		  	    						<td>
		  	    							<label class="checkbox-inline">
												<input type="radio" name="item3" id="inlineCheckbox2" value="option2"> 1. Si
											</label>
											<label class="checkbox-inline">
												<input type="radio" name="item3" id="inlineCheckbox3" value="option3"> 2. No
											</label>
		  	    						</td>
		  	    					</tr>
		  	    					<tr>
		  	    						<td>8.</td>
		  	    						<td>
		  	    							<strong>
		  	    								Nº de pisos de esta edificación
		  	    							</strong>
		  	    						</td>
		  	    						<td>
		  	    							<label>N° de pisos</label>
		  	    							<input style="width:100px;float:left;" type="text" class="form-control">
		  	    							<br /><br />
		  	    							<label>Diligenciar las preguntas 8B, 8C, 8D según el número de pisos</label>
		  	    						</td>
		  	    					</tr>
		  	    					<tr>
		  	    						<td>8A.</td>
		  	    						<td>
		  	    							<strong>
		  	    								El primer piso cumple con la norma de accesibilidad para personas con discapacidad
		  	    							</strong>
		  	    						</td>
		  	    						<td>
		  	    							<label class="checkbox-inline">
												<input type="radio" name="radio1" id="inlineCheckbox2" value="option2"> 1. Si
											</label>
											<label class="checkbox-inline">
												<input type="radio" name="radio1" id="inlineCheckbox3" value="option3"> 2. No
											</label>
		  	    						</td>
		  	    					</tr>
		  	    					<tr>
		  	    						<td>8B.</td>
		  	    						<td>
		  	    							<strong>
		  	    								El segundo piso cumple con la norma de accesibilidad para personas con discapacidad
		  	    							</strong>
		  	    						</td>
		  	    						<td>
		  	    							<label class="checkbox-inline">
												<input type="radio" name="radio2" id="inlineCheckbox2" value="option2"> 1. Si
											</label>
											<label class="checkbox-inline">
												<input type="radio" name="radio2" id="inlineCheckbox3" value="option3"> 2. No
											</label>
		  	    						</td>
		  	    					</tr>
		  	    					<tr>
		  	    						<td>8C.</td>
		  	    						<td>
		  	    							<strong>
		  	    								El tercer piso cumple con la norma de accesibilidad para personas con discapacidad
		  	    							</strong>
		  	    						</td>
		  	    						<td>
		  	    							<label class="checkbox-inline">
												<input type="radio" name="radio3" id="inlineCheckbox2" value="option2"> 1. Si
											</label>
											<label class="checkbox-inline">
												<input type="radio" name="radio3" id="inlineCheckbox3" value="option3"> 2. No
											</label>
		  	    						</td>
		  	    					</tr>
		  	    					<tr>
		  	    						<td>8D.</td>
		  	    						<td>
		  	    							<strong>
		  	    								El cuarto piso cumple con la norma de accesibilidad para personas con discapacidad
		  	    							</strong>
		  	    						</td>
		  	    						<td>
		  	    							<label class="checkbox-inline">
												<input type="radio" name="radio4" id="inlineCheckbox2" value="option2"> 1. Si
											</label>
											<label class="checkbox-inline">
												<input type="radio" name="radio4" id="inlineCheckbox3" value="option3"> 2. No
											</label>
		  	    						</td>
		  	    					</tr>
		  	    					<tr>
		  	    						<td>9.</td>
		  	    						<td>
		  	    							<strong>
		  	    								¿cuántos niveles o modalidades hacen uso de esta edificación?
		  	    							</strong>
		  	    						</td>
		  	    						<td>
		  	    							<label>N° de niveles o modalidades</label>
		  	    							<input style="width:100px;float:left;" type="text" class="form-control">
		  	    						</td>
		  	    					</tr>
		  	    					<tr>
		  	    						<td>10.</td>
		  	    						<td>
		  	    							<strong>
		  	    								¿los niveles o modalidades que hacen uso de esta edificación son:
		  	    							</strong>
		  	    							<br />(acepte uno o más códigos)
		  	    						</td>
		  	    						<td>
		  	    							<label class="checkbox">
												<input type="checkbox" id="inlineCheckbox2" value="option2"> 1. Inicial cuna?
											</label>
											<label class="checkbox">
												<input type="checkbox" id="inlineCheckbox3" value="option3"> 2. Inicial jardín?
											</label>
		  	    							<label class="checkbox">
												<input type="checkbox" id="inlineCheckbox2" value="option2"> 3. Inicial cuna jardín?
											</label>
											<label class="checkbox">
												<input type="checkbox" id="inlineCheckbox3" value="option3"> 4. Primaria?
											</label>
		  	    							<label class="checkbox">
												<input type="checkbox" id="inlineCheckbox2" value="option2"> 5. Secundaria?
											</label>
											<label class="checkbox">
												<input type="checkbox" id="inlineCheckbox3" value="option3"> 6. Educación básica alternativa (eba)?
											</label>
		  	    							<label class="checkbox">
												<input type="checkbox" id="inlineCheckbox2" value="option2"> 7. Educación básica especial (ebe)?
											</label>
											<label class="checkbox">
												<input type="checkbox" id="inlineCheckbox3" value="option3"> 8. Educación superior de formación artistica (esfa)?
											</label>
		  	    							<label class="checkbox">
												<input type="checkbox" id="inlineCheckbox2" value="option2"> 9. Instituto superior tecnológico (ist)?
											</label>
											<label class="checkbox">
												<input type="checkbox" id="inlineCheckbox3" value="option3"> 10. Instituto superior pedagógico (isp)?
											</label>
		  	    							<label class="checkbox">
												<input type="checkbox" id="inlineCheckbox2" value="option2"> 11. Centro  de educación técnico productivo (cetpro)?
											</label>
											<label class="checkbox">
												<input type="checkbox" id="inlineCheckbox3" value="option3"> 12. Programa no escolarizado de educación inicial (pronoei)?
											</label>
		  	    							<label class="checkbox">
												<input type="checkbox" id="inlineCheckbox2" value="option2"> 13. Sala de educación temprana?
											</label>
											<label class="checkbox">
												<input type="checkbox" id="inlineCheckbox3" value="option3"> 14. Ludoteca?
											</label>
		  	    						</td>
		  	    					</tr>
		  	    				</tbody>
		  	    			</table>

		  	    			<div class="panel">
								<label>Observaciones:</label>
								<textarea style="width:870px; height:100px;"></textarea>
							</div>

							<table class="table table-bordered">
		  	    				<thead>
		  	    					<tr>
			  	    					<th colspan="2">Sección B: Verificación de los espacios educativos de la edificación</th>
		  	    					</tr>
		  	    				</thead>
		  	    				<tbody>
		  	    					<tr>
		  	    						<td>
		  	    							<label>1. Ambiente Nº</label>
		  	    							<input style="width:100px;float:left;" type="text" class="form-control">
		  	    						</td>
		  	    						<td>
		  	    							<label>2. Piso N°</label>
		  	    							<input style="width:100px;float:left;" type="text" class="form-control">
		  	    						</td>
		  	    					</tr>
		  	    				</tbody>
		  	    			</table>
		  	    			<table class="table table-bordered">
		  	    				<tbody>
		  	    					<td>3.</td>
		  	    					<td>
		  	    						<strong>
		  	    							<label class="checkbox-inline">
												<input type="checkbox" id="inlineCheckbox1" value="option1"> 1. Si
											</label>
											<label class="checkbox-inline">
												<input type="checkbox" id="inlineCheckbox1" value="option1"> 2. No
											</label>
		  	    						</strong>
		  	    					</td>
		  	    					<td>


		  	    					</td>
		  	    				</tbody>
		  	    				<tbody>
		  	    					<td>4.</td>
		  	    					<td>
		  	    						<strong>
		  	    							Nivel, modalidad y turno del ambiente / espacio educativo
		  	    						</strong>
		  	    						<br />
		  	    						<label>(acepte uno o más códigos)</label>
		  	    					</td>
		  	    					<td>
		  	    						<table class="table table-bordered">
		  	    							<thead>
		  	    								<tr>
		  	    									<th rowspan="2" style="text-align:center; vertical-align:middle;">Nivel o Modalidad Educativa</th>
			  	    								<th colspan="3" style="text-align:center;">Turno</th>
		  	    								</tr>
		  	    								<tr>
		  	    									<th style="text-align:center;">Mañana</th>
			  	    								<th style="text-align:center;">Tarde</th>
			  	    								<th style="text-align:center;">Noche</th>
		  	    								</tr>
		  	    							</thead>
		  	    							<tbody>
		  	    								<tr>
		  	    									<td>
			  	    									1. Inicial cuna
			  	    								</td>
			  	    								<td>
			  	    									<label class="checkbox">
															<input type="checkbox" id="inlineCheckbox3" value="option3"> 1
														</label>
			  	    								</td>
			  	    								<td>
			  	    									<label class="checkbox">
															<input type="checkbox" id="inlineCheckbox3" value="option3"> 2
														</label>
			  	    								</td>
			  	    								<td>
			  	    									<label class="checkbox">
															<input type="checkbox" id="inlineCheckbox3" value="option3"> 3
														</label>
			  	    								</td>
		  	    								</tr>
		  	    								<tr>
		  	    									<td>
			  	    									2. Inicial jardín
			  	    								</td>
			  	    								<td>
			  	    									<label class="checkbox">
															<input type="checkbox" id="inlineCheckbox3" value="option3"> 1
														</label>
			  	    								</td>
			  	    								<td>
			  	    									<label class="checkbox">
															<input type="checkbox" id="inlineCheckbox3" value="option3"> 2
														</label>
			  	    								</td>
			  	    								<td>
			  	    									<label class="checkbox">
															<input type="checkbox" id="inlineCheckbox3" value="option3"> 3
														</label>
			  	    								</td>
		  	    								</tr>
		  	    								<tr>
		  	    									<td>
			  	    									3. Inicial cuna jardín
			  	    								</td>
			  	    								<td>
			  	    									<label class="checkbox">
															<input type="checkbox" id="inlineCheckbox3" value="option3"> 1
														</label>
			  	    								</td>
			  	    								<td>
			  	    									<label class="checkbox">
															<input type="checkbox" id="inlineCheckbox3" value="option3"> 2
														</label>
			  	    								</td>
			  	    								<td>
			  	    									<label class="checkbox">
															<input type="checkbox" id="inlineCheckbox3" value="option3"> 3
														</label>
			  	    								</td>
		  	    								</tr>
		  	    								<tr>
		  	    									<td>
			  	    									4. Primaria
			  	    								</td>
			  	    								<td>
			  	    									<label class="checkbox">
															<input type="checkbox" id="inlineCheckbox3" value="option3"> 1
														</label>
			  	    								</td>
			  	    								<td>
			  	    									<label class="checkbox">
															<input type="checkbox" id="inlineCheckbox3" value="option3"> 2
														</label>
			  	    								</td>
			  	    								<td>
			  	    									<label class="checkbox">
															<input type="checkbox" id="inlineCheckbox3" value="option3"> 3
														</label>
			  	    								</td>
		  	    								</tr>
		  	    								<tr>
		  	    									<td>
			  	    									5. Secundaria
			  	    								</td>
			  	    								<td>
			  	    									<label class="checkbox">
															<input type="checkbox" id="inlineCheckbox3" value="option3"> 1
														</label>
			  	    								</td>
			  	    								<td>
			  	    									<label class="checkbox">
															<input type="checkbox" id="inlineCheckbox3" value="option3"> 2
														</label>
			  	    								</td>
			  	    								<td>
			  	    									<label class="checkbox">
															<input type="checkbox" id="inlineCheckbox3" value="option3"> 3
														</label>
			  	    								</td>
		  	    								</tr>
		  	    								<tr>
		  	    									<td>
			  	    									6. Educación básica alternativa (eba)
			  	    								</td>
			  	    								<td>
			  	    									<label class="checkbox">
															<input type="checkbox" id="inlineCheckbox3" value="option3"> 1
														</label>
			  	    								</td>
			  	    								<td>
			  	    									<label class="checkbox">
															<input type="checkbox" id="inlineCheckbox3" value="option3"> 2
														</label>
			  	    								</td>
			  	    								<td>
			  	    									<label class="checkbox">
															<input type="checkbox" id="inlineCheckbox3" value="option3"> 3
														</label>
			  	    								</td>
		  	    								</tr>
		  	    								<tr>
		  	    									<td>
			  	    									7. Educación básica especial (ebe)
			  	    								</td>
			  	    								<td>
			  	    									<label class="checkbox">
															<input type="checkbox" id="inlineCheckbox3" value="option3"> 1
														</label>
			  	    								</td>
			  	    								<td>
			  	    									<label class="checkbox">
															<input type="checkbox" id="inlineCheckbox3" value="option3"> 2
														</label>
			  	    								</td>
			  	    								<td>
			  	    									<label class="checkbox">
															<input type="checkbox" id="inlineCheckbox3" value="option3"> 3
														</label>
			  	    								</td>
		  	    								</tr>
		  	    								<tr>
		  	    									<td>
			  	    									8. Educación superior de formación artistica (esfa)
			  	    								</td>
			  	    								<td>
			  	    									<label class="checkbox">
															<input type="checkbox" id="inlineCheckbox3" value="option3"> 1
														</label>
			  	    								</td>
			  	    								<td>
			  	    									<label class="checkbox">
															<input type="checkbox" id="inlineCheckbox3" value="option3"> 2
														</label>
			  	    								</td>
			  	    								<td>
			  	    									<label class="checkbox">
															<input type="checkbox" id="inlineCheckbox3" value="option3"> 3
														</label>
			  	    								</td>
		  	    								</tr>
		  	    								<tr>
		  	    									<td>
			  	    									9. Instituto superior tecnológico (ist)
			  	    								</td>
			  	    								<td>
			  	    									<label class="checkbox">
															<input type="checkbox" id="inlineCheckbox3" value="option3"> 1
														</label>
			  	    								</td>
			  	    								<td>
			  	    									<label class="checkbox">
															<input type="checkbox" id="inlineCheckbox3" value="option3"> 2
														</label>
			  	    								</td>
			  	    								<td>
			  	    									<label class="checkbox">
															<input type="checkbox" id="inlineCheckbox3" value="option3"> 3
														</label>
			  	    								</td>
		  	    								</tr>
		  	    								<tr>
		  	    									<td>
			  	    									10. Instituto superior pedagógico (isp)
			  	    								</td>
			  	    								<td>
			  	    									<label class="checkbox">
															<input type="checkbox" id="inlineCheckbox3" value="option3"> 1
														</label>
			  	    								</td>
			  	    								<td>
			  	    									<label class="checkbox">
															<input type="checkbox" id="inlineCheckbox3" value="option3"> 2
														</label>
			  	    								</td>
			  	    								<td>
			  	    									<label class="checkbox">
															<input type="checkbox" id="inlineCheckbox3" value="option3"> 3
														</label>
			  	    								</td>
		  	    								</tr>
		  	    								<tr>
		  	    									<td>
			  	    									11. Centro de educación técnico productivo (cetpro)
			  	    								</td>
			  	    								<td>
			  	    									<label class="checkbox">
															<input type="checkbox" id="inlineCheckbox3" value="option3"> 1
														</label>
			  	    								</td>
			  	    								<td>
			  	    									<label class="checkbox">
															<input type="checkbox" id="inlineCheckbox3" value="option3"> 2
														</label>
			  	    								</td>
			  	    								<td>
			  	    									<label class="checkbox">
															<input type="checkbox" id="inlineCheckbox3" value="option3"> 3
														</label>
			  	    								</td>
		  	    								</tr>
		  	    								<tr>
		  	    									<td>
			  	    									12. Progrma no escolarizado de educación inicial (pronoei)
			  	    								</td>
			  	    								<td>
			  	    									<label class="checkbox">
															<input type="checkbox" id="inlineCheckbox3" value="option3"> 1
														</label>
			  	    								</td>
			  	    								<td>
			  	    									<label class="checkbox">
															<input type="checkbox" id="inlineCheckbox3" value="option3"> 2
														</label>
			  	    								</td>
			  	    								<td>
			  	    									<label class="checkbox">
															<input type="checkbox" id="inlineCheckbox3" value="option3"> 3
														</label>
			  	    								</td>
		  	    								</tr>
		  	    								<tr>
		  	    									<td>
			  	    									13. Sala de educación temprana
			  	    								</td>
			  	    								<td>
			  	    									<label class="checkbox">
															<input type="checkbox" id="inlineCheckbox3" value="option3"> 1
														</label>
			  	    								</td>
			  	    								<td>
			  	    									<label class="checkbox">
															<input type="checkbox" id="inlineCheckbox3" value="option3"> 2
														</label>
			  	    								</td>
			  	    								<td>
			  	    									<label class="checkbox">
															<input type="checkbox" id="inlineCheckbox3" value="option3"> 3
														</label>
			  	    								</td>
		  	    								</tr>
		  	    								<tr>
		  	    									<td>
			  	    									14. Ludoteca
			  	    								</td>
			  	    								<td>
			  	    									<label class="checkbox">
															<input type="checkbox" id="inlineCheckbox3" value="option3"> 1
														</label>
			  	    								</td>
			  	    								<td>
			  	    									<label class="checkbox">
															<input type="checkbox" id="inlineCheckbox3" value="option3"> 2
														</label>
			  	    								</td>
			  	    								<td>
			  	    									<label class="checkbox">
															<input type="checkbox" id="inlineCheckbox3" value="option3"> 3
														</label>
			  	    								</td>
		  	    								</tr>
		  	    							</tbody>
		  	    						</table>

		  	    					</td>
		  	    				</tbody>
		  	    				<tbody>
		  	    					<td>5.</td>
		  	    					<td>
		  	    						<strong>
		  	    							¿cuál es la función del espacio educativo?
		  	    						</strong>
		  	    						<br />
		  	    						<label>(acepte uno o más códigos)</label>
		  	    					</td>
		  	    					<td>
		  	    						<label class="checkbox">
											<input type="checkbox" id="inlineCheckbox3" value="option3"> 1. Aula común
										</label>
		  	    						<label class="checkbox">
											<input type="checkbox" id="inlineCheckbox3" value="option3"> 2. Pedagógico
										</label>
		  	    						<label class="checkbox">
											<input type="checkbox" id="inlineCheckbox3" value="option3"> 3. Administrativo
										</label>
		  	    						<label class="checkbox">
											<input type="checkbox" id="inlineCheckbox3" value="option3"> 4. Complementario
										</label>
		  	    						<label class="checkbox">
											<input type="checkbox" id="inlineCheckbox3" value="option3"> 5. Servicios
										</label>
		  	    					</td>
		  	    				</tbody>
		  	    			</table>

		  	    			<table class="table table-bordered">
		  	    				<thead>
		  	    					<tr>
		  	    						<th colspan="3" style="text-align:center;">
		  	    							Espacio Pedagógico
		  	    						</th>
		  	    					</tr>
		  	    				</thead>
		  	    				<tbody>
		  	    					<tr>
			  	    					<td>6.</td>
			  	    					<td>
			  	    						<strong>Tipo de espacio educativo</strong>
			  	    						<br />(acepte sólo un código)
			  	    					</td>
			  	    					<td>
			  	    						<label class="checkbox">
												<input type="checkbox" id="inlineCheckbox3" value="option3"> 1. Sala de usos múltiples
											</label>
			  	    						<label class="checkbox">
												<input type="checkbox" id="inlineCheckbox3" value="option3"> 2. Sala de psicomotricidad
											</label>
			  	    						<label class="checkbox">
												<input type="checkbox" id="inlineCheckbox3" value="option3"> 3. Aula de usos múltiples
											</label>
			  	    						<label class="checkbox">
												<input type="checkbox" id="inlineCheckbox3" value="option3"> 4. Aula especial
											</label>
			  	    						<label class="checkbox">
												<input type="checkbox" id="inlineCheckbox3" value="option3"> 5. Laboratorio
											</label>
			  	    						<label class="checkbox">
												<input type="checkbox" id="inlineCheckbox3" value="option3"> 6. Taller ligero
											</label>
			  	    						<label class="checkbox">
												<input type="checkbox" id="inlineCheckbox3" value="option3"> 7. Taller semi-pesado
											</label>
			  	    					</td>
		  	    					</tr>
		  	    					<tr>
			  	    					<td>7.</td>
			  	    					<td>
			  	    						<strong>Tipo de aula especial</strong>
			  	    						<br />(acepte sólo un código)
			  	    					</td>
			  	    					<td>
			  	    						<label class="checkbox">
												<input type="checkbox" id="inlineCheckbox3" value="option3"> 1. De computo
											</label>
			  	    						<label class="checkbox">
												<input type="checkbox" id="inlineCheckbox3" value="option3"> 2. De música / Banda
											</label>
			  	    						<label class="checkbox">
												<input type="checkbox" id="inlineCheckbox3" value="option3"> 3. De idiomas
											</label>
			  	    						<label class="checkbox">
												<input type="checkbox" id="inlineCheckbox3" value="option3"> 4. De artes plásticas
											</label>
			  	    						<label class="checkbox">
												<input type="checkbox" id="inlineCheckbox3" value="option3"> 5. De matemáticas
											</label>
			  	    						<label class="checkbox">
												<input type="checkbox" id="inlineCheckbox3" value="option3"> 6. De ciencias sociales
											</label>
			  	    						<label class="checkbox">
												<input type="checkbox" id="inlineCheckbox3" value="option3"> 7. otro
											</label>
											<label>
												<input style="float:left; width:300px;" type="text" class="form-control">
												(Especifique)
											</label>
			  	    					</td>
		  	    					</tr>
		  	    					<tr>
			  	    					<td>8.</td>
			  	    					<td>
			  	    						<strong>Tipo de laboratorio</strong>
			  	    						<br />(acepte sólo un código)
			  	    					</td>
			  	    					<td>
			  	    						<label class="checkbox">
												<input type="checkbox" id="inlineCheckbox3" value="option3"> 1. Laboratorio multifuncional
											</label>
			  	    						<label class="checkbox">
												<input type="checkbox" id="inlineCheckbox3" value="option3"> 2. Laboratorio de física
											</label>
			  	    						<label class="checkbox">
												<input type="checkbox" id="inlineCheckbox3" value="option3"> 3. Laboratorio de química
											</label>
			  	    						<label class="checkbox">
												<input type="checkbox" id="inlineCheckbox3" value="option3"> 4. Laboratorio de Biología
											</label>
			  	    						<label class="checkbox">
												<input type="checkbox" id="inlineCheckbox3" value="option3"> 5. Laboratorio de Química - Biología
											</label>
			  	    						<label class="checkbox">
												<input type="checkbox" id="inlineCheckbox3" value="option3"> 6. otro
											</label>
											<label>
												<input style="float:left; width:300px;" type="text" class="form-control">
												(Especifique)
											</label>
			  	    					</td>
		  	    					</tr>
		  	    					<tr>
			  	    					<td>9.</td>
			  	    					<td>
			  	    						<strong>Tipo de taller ligero</strong>
			  	    						<br />(acepte sólo un código)
			  	    					</td>
			  	    					<td>
			  	    						<label class="checkbox">
												<input type="checkbox" id="inlineCheckbox3" value="option3"> 1. Dibujo técnico
											</label>
			  	    						<label class="checkbox">
												<input type="checkbox" id="inlineCheckbox3" value="option3"> 2. Electricidad
											</label>
			  	    						<label class="checkbox">
												<input type="checkbox" id="inlineCheckbox3" value="option3"> 3. Electrónica
											</label>
			  	    						<label class="checkbox">
												<input type="checkbox" id="inlineCheckbox3" value="option3"> 4. Industria alimentaria
											</label>
			  	    						<label class="checkbox">
												<input type="checkbox" id="inlineCheckbox3" value="option3"> 5. Industria del vestido
											</label>
			  	    						<label class="checkbox">
												<input type="checkbox" id="inlineCheckbox3" value="option3"> 6. Cosmetología
											</label>
											<label class="checkbox">
												<input type="checkbox" id="inlineCheckbox3" value="option3"> 7. Cerámica
											</label>
			  	    						<label class="checkbox">
												<input type="checkbox" id="inlineCheckbox3" value="option3"> 8. Orfebrería
											</label>
			  	    						<label class="checkbox">
												<input type="checkbox" id="inlineCheckbox3" value="option3"> 9. Bordado
											</label>
			  	    						<label class="checkbox">
												<input type="checkbox" id="inlineCheckbox3" value="option3"> 10. Floristería
											</label>
			  	    						<label class="checkbox">
												<input type="checkbox" id="inlineCheckbox3" value="option3"> 11. Juglería
											</label>
			  	    						<label class="checkbox">
												<input type="checkbox" id="inlineCheckbox3" value="option3"> 12. Artes decorativas
											</label>
											<label class="checkbox">
												<input type="checkbox" id="inlineCheckbox3" value="option3"> 13. Artes gráficas
											</label>
			  	    						<label class="checkbox">
												<input type="checkbox" id="inlineCheckbox3" value="option3"> 14. Coreoplastía
											</label>
			  	    						<label class="checkbox">
												<input type="checkbox" id="inlineCheckbox3" value="option3"> 15. Contabilidad
											</label>
			  	    						<label class="checkbox">
												<input type="checkbox" id="inlineCheckbox3" value="option3"> 16. Mecanografía y taquigrafía
											</label>
			  	    						<label class="checkbox">
												<input type="checkbox" id="inlineCheckbox3" value="option3"> 17. Otro
											</label>
			  	    						<label>
												<input style="float:left; width:300px;" type="text" class="form-control">
												(Especifique)
											</label>
			  	    					</td>
		  	    					</tr>
		  	    					<tr>
			  	    					<td>10.</td>
			  	    					<td>
			  	    						<strong>Tipo de taller semi-pesado</strong>
			  	    						<br />(acepte sólo un código)
			  	    					</td>
			  	    					<td>
			  	    						<label class="checkbox">
												<input type="checkbox" id="inlineCheckbox3" value="option3"> 1. Modelería y fundición
											</label>
			  	    						<label class="checkbox">
												<input type="checkbox" id="inlineCheckbox3" value="option3"> 2. Construcciones metálicas
											</label>
			  	    						<label class="checkbox">
												<input type="checkbox" id="inlineCheckbox3" value="option3"> 3. Mecánica de taller
											</label>
			  	    						<label class="checkbox">
												<input type="checkbox" id="inlineCheckbox3" value="option3"> 4. Mecánica automotriz
											</label>
			  	    						<label class="checkbox">
												<input type="checkbox" id="inlineCheckbox3" value="option3"> 5. Artesanía en papel
											</label>
			  	    						<label class="checkbox">
												<input type="checkbox" id="inlineCheckbox3" value="option3"> 6. Carpintería
											</label>
											<label class="checkbox">
												<input type="checkbox" id="inlineCheckbox3" value="option3"> 7. Construcción civil
											</label>
			  	    						<label class="checkbox">
												<input type="checkbox" id="inlineCheckbox3" value="option3"> 8. Otro
											</label>
											<label>
												<input style="float:left; width:300px;" type="text" class="form-control">
												(Especifique)
											</label>
			  	    					</td>
		  	    					</tr>
		  	    				</tbody>
		  	    			</table>

		  	    			<table class="table table-bordered">
		  	    				<thead>
		  	    					<tr>
		  	    						<th style="text-align:center;" colspan="3">Espacio Administrativo:</th>
		  	    					</tr>
		  	    				</thead>
		  	    				<tbody>
		  	    					<tr>
		  	    						<td>11.</td>
		  	    						<td>
		  	    							<strong>
		  	    								Tipo de espacio educativo
		  	    							</strong>
		  	    						</td>
		  	    						<td>
		  	    							<label class="checkbox">
												<input type="checkbox" id="inlineCheckbox3" value="option3"> 1. Dirección
											</label>
			  	    						<label class="checkbox">
												<input type="checkbox" id="inlineCheckbox3" value="option3"> 2. Sub dirección
											</label>
			  	    						<label class="checkbox">
												<input type="checkbox" id="inlineCheckbox3" value="option3"> 3. Secretaría y espera
											</label>
			  	    						<label class="checkbox">
												<input type="checkbox" id="inlineCheckbox3" value="option3"> 4. Sala de profesores
											</label>
			  	    						<label class="checkbox">
												<input type="checkbox" id="inlineCheckbox3" value="option3"> 5. Asesoría
											</label>
			  	    						<label class="checkbox">
												<input type="checkbox" id="inlineCheckbox3" value="option3"> 6. Sala de serv. Complementarios
											</label>
											<label class="checkbox">
												<input type="checkbox" id="inlineCheckbox3" value="option3"> 7. Tópico y servicios sociales
											</label>
			  	    						<label class="checkbox">
												<input type="checkbox" id="inlineCheckbox3" value="option3"> 8. Depósito de material educativo
											</label>
											<label class="checkbox">
												<input type="checkbox" id="inlineCheckbox3" value="option3"> 9. Impresiones
											</label>
											<label class="checkbox">
												<input type="checkbox" id="inlineCheckbox3" value="option3"> 10. Archivo
											</label>
											<label class="checkbox">
												<input type="checkbox" id="inlineCheckbox3" value="option3"> 11. Otro
											</label>
											<label>
												<input style="float:left; width:300px;" type="text" class="form-control">
												(Especifique)
											</label>
		  	    						</td>
		  	    					</tr>
		  	    				</tbody>
		  	    			</table>
		  	    			<table class="table table-bordered">
		  	    				<thead>
		  	    					<tr>
		  	    						<th style="text-align:center;" colspan="3">Espacio Complementario:</th>
		  	    					</tr>
		  	    				</thead>
		  	    				<tbody>
		  	    					<tr>
		  	    						<td>12.</td>
		  	    						<td>
		  	    							<strong>
		  	    								Tipo de espacio educativo
		  	    							</strong>
		  	    						</td>
		  	    						<td>
		  	    							<label class="checkbox">
												<input type="checkbox" id="inlineCheckbox3" value="option3"> 1. Sala de lactancia
											</label>
			  	    						<label class="checkbox">
												<input type="checkbox" id="inlineCheckbox3" value="option3"> 2. Sala de descanso
											</label>
			  	    						<label class="checkbox">
												<input type="checkbox" id="inlineCheckbox3" value="option3"> 3. Sala de higienización
											</label>
			  	    						<label class="checkbox">
												<input type="checkbox" id="inlineCheckbox3" value="option3"> 4. Sala de preparación de biberones
											</label>
			  	    						<label class="checkbox">
												<input type="checkbox" id="inlineCheckbox3" value="option3"> 5. Cocina
											</label>
			  	    						<label class="checkbox">
												<input type="checkbox" id="inlineCheckbox3" value="option3"> 6. Biblioteca
											</label>
											<label class="checkbox">
												<input type="checkbox" id="inlineCheckbox3" value="option3"> 7. Otro
											</label>
											<label>
												<input style="float:left; width:300px;" type="text" class="form-control">
												(Especifique)
											</label>
		  	    						</td>
		  	    					</tr>
		  	    				</tbody>
		  	    			</table>
		  	    			<table class="table table-bordered">
		  	    				<thead>
		  	    					<tr>
		  	    						<th style="text-align:center;" colspan="3">Espacio de Servicios:</th>
		  	    					</tr>
		  	    				</thead>
		  	    				<tbody>
		  	    					<tr>
		  	    						<td>13.</td>
		  	    						<td>
		  	    							<strong>
		  	    								Tipo de espacio educativo
		  	    							</strong>
		  	    						</td>
		  	    						<td>
		  	    							<label class="checkbox">
												<input type="checkbox" id="inlineCheckbox3" value="option3"> 1. SS.HH. Alumnado
											</label>
			  	    						<label class="checkbox">
												<input type="checkbox" id="inlineCheckbox3" value="option3"> 2. SS.HH. Personal
											</label>
			  	    						<label class="checkbox">
												<input type="checkbox" id="inlineCheckbox3" value="option3"> 3. caseta de guardianía
											</label>
			  	    						<label class="checkbox">
												<input type="checkbox" id="inlineCheckbox3" value="option3"> 4. Atrio de ingreso
											</label>
			  	    						<label class="checkbox">
												<input type="checkbox" id="inlineCheckbox3" value="option3"> 5. Área de espera
											</label>
			  	    						<label class="checkbox">
												<input type="checkbox" id="inlineCheckbox3" value="option3"> 6. Limpieza y mantenimiento
											</label>
											<label class="checkbox">
												<input type="checkbox" id="inlineCheckbox3" value="option3"> 7. Vivienda para docentes
											</label>
			  	    						<label class="checkbox">
												<input type="checkbox" id="inlineCheckbox3" value="option3"> 8. Vivienda para alumnos
											</label>
											<label class="checkbox">
												<input type="checkbox" id="inlineCheckbox3" value="option3"> 9. guardianía
											</label>
											<label class="checkbox">
												<input type="checkbox" id="inlineCheckbox3" value="option3"> 10. Cafetería / kiosco
											</label>
											<label class="checkbox">
												<input type="checkbox" id="inlineCheckbox3" value="option3"> 11. Cocina
											</label>
											<label class="checkbox">
												<input type="checkbox" id="inlineCheckbox3" value="option3"> 11. Comedor
											</label>
											<label class="checkbox">
												<input type="checkbox" id="inlineCheckbox3" value="option3"> 11. Despensa
											</label>
											<label class="checkbox">
												<input type="checkbox" id="inlineCheckbox3" value="option3"> 11. Vestuario
											</label>
											<label class="checkbox">
												<input type="checkbox" id="inlineCheckbox3" value="option3"> 11. Escaleras
											</label>
											<label class="checkbox">
												<input type="checkbox" id="inlineCheckbox3" value="option3"> 11. Ascensor
											</label>
											<label class="checkbox">
												<input type="checkbox" id="inlineCheckbox3" value="option3"> 11. Otro
											</label>
											<label>
												<input style="float:left; width:300px;" type="text" class="form-control">
												(Especifique)
											</label>
		  	    						</td>
		  	    					</tr>
		  	    				</tbody>
		  	    			</table>
		  	    			<table class="table table-bordered">
		  	    				<thead>
		  	    					<tr>
		  	    						<th style="text-align:center;" colspan="3">Evaluación de los SS.HH.:</th>
		  	    					</tr>
		  	    				</thead>
		  	    				<tbody>
		  	    					<tr>
		  	    						<td>14.</td>
		  	    						<td>
		  	    							<strong>
		  	    								Total de aparatos sanitarios
		  	    							</strong>
		  	    						</td>
		  	    						<td>

		  	    							<table class="table table-bordered">
		  	    								<tr>
		  	    									<td style="text-align:center;">Tipo</td>
		  	    									<td style="text-align:center;">Total</td>
		  	    								</tr>
		  	    								<tr>
		  	    									<td>1. Turcos (piso)</td>
		  	    									<td><input style="float:left; width:100px;" type="text" class="form-control"></td>
		  	    								</tr>
		  	    								<tr>
		  	    									<td>2. Letrinas</td>
		  	    									<td><input style="float:left; width:100px;" type="text" class="form-control"></td>
		  	    								</tr>
		  	    								<tr>
		  	    									<td>3. Inodoros de adultos accesibles (discapacidad)</td>
		  	    									<td><input style="float:left; width:100px;" type="text" class="form-control"></td>
		  	    								</tr>
		  	    								<tr>
		  	    									<td>4. Inodoros de adultos</td>
		  	    									<td><input style="float:left; width:100px;" type="text" class="form-control"></td>
		  	    								</tr>
		  	    								<tr>
		  	    									<td>5. Inodoros de niños accesibles (discapacidad)</td>
		  	    									<td><input style="float:left; width:100px;" type="text" class="form-control"></td>
		  	    								</tr>
		  	    								<tr>
		  	    									<td>6. Inodoros de niños</td>
		  	    									<td><input style="float:left; width:100px;" type="text" class="form-control"></td>
		  	    								</tr>
		  	    							</table>

		  	    						</td>
		  	    					</tr>
		  	    				</tbody>
		  	    			</table>
		  	    			<table class="table table-bordered">
		  	    				<thead>
		  	    					<tr>
		  	    						<th style="text-align:center;" colspan="3">Evaluador: en la pregunta 14, si sólo anotó información para las alternativas 1 y/o 2, pase a 14B.</th>
		  	    					</tr>
		  	    				</thead>
		  	    				<tbody>
		  	    					<tr>
		  	    						<td>14A.</td>
		  	    						<td>
		  	    							<strong>
		  	    								Del total de inodoros del ss.hh., ¿cuántos cumplen con la función de descarga?
		  	    							</strong>
		  	    						</td>
		  	    						<td>
		  	    							<label>Total</label>
											<input style="float:left; width:300px;" type="text" class="form-control">
		  	    						</td>
		  	    					</tr>
		  	    					<tr>
		  	    						<td>14B.</td>
		  	    						<td>
		  	    							<strong>
		  	    								Total de lavaderos
		  	    							</strong>
		  	    						</td>
		  	    						<td>
		  	    							<table class="table table-bordered">
		  	    								<tr>
		  	    									<td style="text-align:center;">Tipo</td>
		  	    									<td style="text-align:center;">Total</td>
		  	    								</tr>
		  	    								<tr>
		  	    									<td>1. Lavaderos o lavatorios</td>
		  	    									<td><input style="float:left; width:100px;" type="text" class="form-control"></td>
		  	    								</tr>
		  	    								<tr>
		  	    									<td>2. Lavaderos o lavatorios operativos</td>
		  	    									<td><input style="float:left; width:100px;" type="text" class="form-control"></td>
		  	    								</tr>
		  	    							</table>
		  	    						</td>
		  	    					</tr>
		  	    				</tbody>
		  	    			</table>
		  	    			<table class="table table-bordered">
		  	    				<thead>
		  	    					<tr>
		  	    						<th style="text-align:center;" colspan="3">Evaluación del estado de conservación:</th>
		  	    					</tr>
		  	    				</thead>
		  	    				<tbody>
		  	    					<tr>
		  	    						<td>15.</td>
		  	    						<td>
		  	    							<strong>
		  	    								Material predominante del piso
		  	    							</strong>
		  	    						</td>
		  	    						<td>
			  	    						<table class="table table-bordered">
			  	    							<thead>
			  	    								<tr>
			  	    									<td rowspan="2" style="text-align:center;">Material predominante en los pisos</td>
				  	    								<td colspan="3" style="text-align:center;">15A. Estado de conservación</td>
			  	    								</tr>
			  	    								<tr>
			  	    									<td style="text-align:center;">Bueno</td>
				  	    								<td style="text-align:center;">Regular</td>
				  	    								<td style="text-align:center;">Malo</td>
			  	    								</tr>
			  	    							</thead>
			  	    							<tbody>
			  	    								<tr>
			  	    									<td>
				  	    									1. Parquet o madera pulida
				  	    								</td>
				  	    								<td>
				  	    									<label class="checkbox">
																<input type="checkbox" id="inlineCheckbox3" value="option3"> 1
															</label>
				  	    								</td>
				  	    								<td>
				  	    									<label class="checkbox">
																<input type="checkbox" id="inlineCheckbox3" value="option3"> 2
															</label>
				  	    								</td>
				  	    								<td>
				  	    									<label class="checkbox">
																<input type="checkbox" id="inlineCheckbox3" value="option3"> 3
															</label>
				  	    								</td>
			  	    								</tr>
			  	    								<tr>
			  	    									<td>
				  	    									2. Láminas asfálticas, vinílicos o similares
				  	    								</td>
				  	    								<td>
				  	    									<label class="checkbox">
																<input type="checkbox" id="inlineCheckbox3" value="option3"> 1
															</label>
				  	    								</td>
				  	    								<td>
				  	    									<label class="checkbox">
																<input type="checkbox" id="inlineCheckbox3" value="option3"> 2
															</label>
				  	    								</td>
				  	    								<td>
				  	    									<label class="checkbox">
																<input type="checkbox" id="inlineCheckbox3" value="option3"> 3
															</label>
				  	    								</td>
			  	    								</tr>
			  	    								<tr>
			  	    									<td>
				  	    									3. Losetas, terrazos o similares
				  	    								</td>
				  	    								<td>
				  	    									<label class="checkbox">
																<input type="checkbox" id="inlineCheckbox3" value="option3"> 1
															</label>
				  	    								</tTipo de puertad>
				  	    								<td>
				  	    									<label class="checkbox">
																<input type="checkbox" id="inlineCheckbox3" value="option3"> 2
															</label>
				  	    								</td>
				  	    								<td>
				  	    									<label class="checkbox">
																<input type="checkbox" id="inlineCheckbox3" value="option3"> 3
															</label>
				  	    								</td>
			  	    								</tr>
			  	    								<tr>
			  	    									<td>
				  	    									4. Madera (entablados)
				  	    								</td>
				  	    								<td>
				  	    									<label class="checkbox">
																<input type="checkbox" id="inlineCheckbox3" value="option3"> 1
															</label>
				  	    								</td>
				  	    								<td>
				  	    									<label class="checkbox">
																<input type="checkbox" id="inlineCheckbox3" value="option3"> 2
															</label>
				  	    								</td>
				  	    								<td>
				  	    									<label class="checkbox">
																<input type="checkbox" id="inlineCheckbox3" value="option3"> 3
															</label>
				  	    								</td>
			  	    								</tr>
			  	    								<tr>
			  	    									<td>
				  	    									5. Cemento
				  	    								</td>
				  	    								<td>
				  	    									<label class="checkbox">
																<input type="checkbox" id="inlineCheckbox3" value="option3"> 1
															</label>
				  	    								</td>
				  	    								<td>
				  	    									<label class="checkbox">
																<input type="checkbox" id="inlineCheckbox3" value="option3"> 2
															</label>
				  	    								</td>
				  	    								<td>
				  	    									<label class="checkbox">
																<input type="checkbox" id="inlineCheckbox3" value="option3"> 3
															</label>
				  	    								</td>
			  	    								</tr>
			  	    								<tr>
			  	    									<td>
				  	    									6. Tierra
				  	    								</td>
				  	    								<td>
				  	    									<label class="checkbox">
																<input type="checkbox" id="inlineCheckbox3" value="option3"> 1
															</label>
				  	    								</td>
				  	    								<td>
				  	    									<label class="checkbox">
																<input type="checkbox" id="inlineCheckbox3" value="option3"> 2
															</label>
				  	    								</td>
				  	    								<td>
				  	    									<label class="checkbox">
																<input type="checkbox" id="inlineCheckbox3" value="option3"> 3
															</label>
				  	    								</td>
			  	    								</tr>
			  	    								<tr>
			  	    									<td>
				  	    									<label>
				  	    										7. Otro material
				  	    									</label>
				  	    									<label>
																<input style="float:left; width:300px;" type="text" class="form-control">
																(Especifique)
															</label>
				  	    								</td>
				  	    								<td>
				  	    									<label class="checkbox">
																<input type="checkbox" id="inlineCheckbox3" value="option3"> 1
															</label>
				  	    								</td>
				  	    								<td>
				  	    									<label class="checkbox">
																<input type="checkbox" id="inlineCheckbox3" value="option3"> 2
															</label>
				  	    								</td>
				  	    								<td>
				  	    									<label class="checkbox">
																<input type="checkbox" id="inlineCheckbox3" value="option3"> 3
															</label>
				  	    								</td>
			  	    								</tr>
			  	    							</tbody>
			  	    						</table>
		  	    						</td>
		  	    					</tr>
		  	    					<tr>
		  	    						<td>16.</td>
		  	    						<td>
		  	    							<strong>
		  	    								Tipo de puerta
		  	    							</strong>
		  	    						</td>
		  	    						<td>
		  	    							<table class="table table-bordered">
			  	    							<thead>
			  	    								<tr>
			  	    									<td rowspan="2" style="text-align:center;">Tipo de puerta</td>
				  	    								<td colspan="3" style="text-align:center;">16A. Estado de conservación</td>
			  	    								</tr>
			  	    								<tr>
			  	    									<td style="text-align:center;">Bueno</td>
				  	    								<td style="text-align:center;">Regular</td>
				  	    								<td style="text-align:center;">Malo</td>
			  	    								</tr>
			  	    							</thead>
			  	    							<tbody>
			  	    								<tr>
			  	    									<td>
				  	    									1. Metalica
				  	    								</td>
				  	    								<td>
				  	    									<label class="checkbox">
																<input type="checkbox" id="inlineCheckbox3" value="option3"> 1
															</label>
				  	    								</td>
				  	    								<td>
				  	    									<label class="checkbox">
																<input type="checkbox" id="inlineCheckbox3" value="option3"> 2
															</label>
				  	    								</td>
				  	    								<td>
				  	    									<label class="checkbox">
																<input type="checkbox" id="inlineCheckbox3" value="option3"> 3
															</label>
				  	    								</td>
			  	    								</tr>
			  	    								<tr>
			  	    									<td>
				  	    									2. Metálica con vidrio
				  	    								</td>
				  	    								<td>
				  	    									<label class="checkbox">
																<input type="checkbox" id="inlineCheckbox3" value="option3"> 1
															</label>
				  	    								</td>
				  	    								<td>
				  	    									<label class="checkbox">
																<input type="checkbox" id="inlineCheckbox3" value="option3"> 2
															</label>
				  	    								</td>
				  	    								<td>
				  	    									<label class="checkbox">
																<input type="checkbox" id="inlineCheckbox3" value="option3"> 3
															</label>
				  	    								</td>
			  	    								</tr>
			  	    								<tr>
			  	    									<td>
				  	    									3. Madera
				  	    								</td>
				  	    								<td>
				  	    									<label class="checkbox">
																<input type="checkbox" id="inlineCheckbox3" value="option3"> 1
															</label>
				  	    								</td>
				  	    								<td>
				  	    									<label class="checkbox">
																<input type="checkbox" id="inlineCheckbox3" value="option3"> 2
															</label>
				  	    								</td>
				  	    								<td>
				  	    									<label class="checkbox">
																<input type="checkbox" id="inlineCheckbox3" value="option3"> 3
															</label>
				  	    								</td>
			  	    								</tr>
			  	    								<tr>
			  	    									<td>
				  	    									4. Madera con vidrio
				  	    								</td>
				  	    								<td>
				  	    									<label class="checkbox">
																<input type="checkbox" id="inlineCheckbox3" value="option3"> 1
															</label>
				  	    								</td>
				  	    								<td>
				  	    									<label class="checkbox">
																<input type="checkbox" id="inlineCheckbox3" value="option3"> 2
															</label>
				  	    								</td>
				  	    								<td>
				  	    									<label class="checkbox">
																<input type="checkbox" id="inlineCheckbox3" value="option3"> 3
															</label>
				  	    								</td>
			  	    								</tr>
			  	    								<tr>
			  	    									<td>
			  	    										<label>
				  	    										5. Otro material
				  	    									</label>
				  	    									<label>
																<input style="float:left; width:300px;" type="text" class="form-control">
																(Especifique)
															</label>
			  	    									</td>
				  	    								<td>
				  	    									<label class="checkbox">
																<input type="checkbox" id="inlineCheckbox3" value="option3"> 1
															</label>
				  	    								</td>
				  	    								<td>
				  	    									<label class="checkbox">
																<input type="checkbox" id="inlineCheckbox3" value="option3"> 2
															</label>
				  	    								</td>
				  	    								<td>
				  	    									<label class="checkbox">
																<input type="checkbox" id="inlineCheckbox3" value="option3"> 3
															</label>
				  	    								</td>
			  	    								</tr>
			  	    								<tr>
			  	    									<td>
				  	    									6. No tiene
				  	    								</td>
				  	    								<td>
				  	    									<label class="checkbox">
																<input type="checkbox" id="inlineCheckbox3" value="option3"> 1
															</label>
				  	    								</td>
				  	    								<td>
				  	    									<label class="checkbox">
																<input type="checkbox" id="inlineCheckbox3" value="option3"> 2
															</label>
				  	    								</td>
				  	    								<td>
				  	    									<label class="checkbox">
																<input type="checkbox" id="inlineCheckbox3" value="option3"> 3
															</label>
				  	    								</td>
			  	    								</tr>
			  	    							</tbody>
			  	    						</table>
		  	    						</td>
		  	    					</tr>
		  	    					<tr>
		  	    						<td>17.</td>
		  	    						<td>
		  	    							<strong>
		  	    								Estado de conservación de la chapa o cerradura de la puerta
		  	    							</strong>
		  	    						</td>
		  	    						<td>
		  	    							<table class="table table-bordered">
		  	    								<thead>
		  	    									<tr>
		  	    										<td></td>
		  	    										<th style="text-align:center;">Total</th>
		  	    									</tr>
		  	    								</thead>
		  	    								<tbody>
		  	    									<tr>
			  	    									<td>1. Buen estado</td>
			  	    									<td><input style="float:left; width:100px;" type="text" class="form-control"></td>
		  	    									</tr>
		  	    									<tr>
			  	    									<td>2. Oxidado</td>
			  	    									<td><input style="float:left; width:100px;" type="text" class="form-control"></td>
		  	    									</tr>
		  	    									<tr>
			  	    									<td>3. Deteriorado</td>
			  	    									<td><input style="float:left; width:100px;" type="text" class="form-control"></td>
		  	    									</tr>
		  	    									<tr>
			  	    									<td>3. No tiene</td>
			  	    									<td><input style="float:left; width:100px;" type="text" class="form-control"></td>
		  	    									</tr>
		  	    								</tbody>
		  	    							</table>
		  	    						</td>
		  	    					</tr>
		  	    					<tr>
		  	    						<td>18.</td>
		  	    						<td>
		  	    							<strong>
		  	    								Tipo de ventana
		  	    							</strong>
		  	    						</td>
		  	    						<td>
		  	    							<table class="table table-bordered">
			  	    							<thead>
			  	    								<tr>
			  	    									<td rowspan="2" style="text-align:center;">Tipo de puerta</td>
				  	    								<td colspan="3" style="text-align:center;">16A. Estado de conservación</td>
			  	    								</tr>
			  	    								<tr>
			  	    									<td style="text-align:center;">Bueno</td>
				  	    								<td style="text-align:center;">Regular</td>
				  	    								<td style="text-align:center;">Malo</td>
			  	    								</tr>
			  	    							</thead>
			  	    							<tbody>
			  	    								<tr>
			  	    									<td>
				  	    									1. Metalica
				  	    								</td>
				  	    								<td>
				  	    									<label class="checkbox">
																<input type="checkbox" id="inlineCheckbox3" value="option3"> 1
															</label>
				  	    								</td>
				  	    								<td>
				  	    									<label class="checkbox">
																<input type="checkbox" id="inlineCheckbox3" value="option3"> 2
															</label>
				  	    								</td>
				  	    								<td>
				  	    									<label class="checkbox">
																<input type="checkbox" id="inlineCheckbox3" value="option3"> 3
															</label>
				  	    								</td>
			  	    								</tr>
			  	    								<tr>
			  	    									<td>
				  	    									2. Madera
				  	    								</td>
				  	    								<td>
				  	    									<label class="checkbox">
																<input type="checkbox" id="inlineCheckbox3" value="option3"> 1
															</label>
				  	    								</td>
				  	    								<td>
				  	    									<label class="checkbox">
																<input type="checkbox" id="inlineCheckbox3" value="option3"> 2
															</label>
				  	    								</td>
				  	    								<td>
				  	    									<label class="checkbox">
																<input type="checkbox" id="inlineCheckbox3" value="option3"> 3
															</label>
				  	    								</td>
			  	    								</tr>
			  	    								<tr>
			  	    									<td>
				  	    									3. Aluminio
				  	    								</td>
				  	    								<td>
				  	    									<label class="checkbox">
																<input type="checkbox" id="inlineCheckbox3" value="option3"> 1
															</label>
				  	    								</td>
				  	    								<td>
				  	    									<label class="checkbox">
																<input type="checkbox" id="inlineCheckbox3" value="option3"> 2
															</label>
				  	    								</td>
				  	    								<td>
				  	    									<label class="checkbox">
																<input type="checkbox" id="inlineCheckbox3" value="option3"> 3
															</label>
				  	    								</td>
			  	    								</tr>
			  	    								<tr>
			  	    									<td>
				  	    									4. Malla
				  	    								</td>
				  	    								<td>
				  	    									<label class="checkbox">
																<input type="checkbox" id="inlineCheckbox3" value="option3"> 1
															</label>
				  	    								</td>
				  	    								<td>
				  	    									<label class="checkbox">
																<input type="checkbox" id="inlineCheckbox3" value="option3"> 2
															</label>
				  	    								</td>
				  	    								<td>
				  	    									<label class="checkbox">
																<input type="checkbox" id="inlineCheckbox3" value="option3"> 3
															</label>
				  	    								</td>
			  	    								</tr>
			  	    								<tr>
			  	    									<td>
			  	    										<label>
				  	    										5. Otro material
				  	    									</label>
				  	    									<label>
																<input style="float:left; width:300px;" type="text" class="form-control">
																(Especifique)
															</label>
			  	    									</td>
				  	    								<td>
				  	    									<label class="checkbox">
																<input type="checkbox" id="inlineCheckbox3" value="option3"> 1
															</label>
				  	    								</td>
				  	    								<td>
				  	    									<label class="checkbox">
																<input type="checkbox" id="inlineCheckbox3" value="option3"> 2
															</label>
				  	    								</td>
				  	    								<td>
				  	    									<label class="checkbox">
																<input type="checkbox" id="inlineCheckbox3" value="option3"> 3
															</label>
				  	    								</td>
			  	    								</tr>
			  	    								<tr>
			  	    									<td>
				  	    									6. No tiene
				  	    								</td>
				  	    								<td>
				  	    									<label class="checkbox">
																<input type="checkbox" id="inlineCheckbox3" value="option3"> 1
															</label>
				  	    								</td>
				  	    								<td>
				  	    									<label class="checkbox">
																<input type="checkbox" id="inlineCheckbox3" value="option3"> 2
															</label>
				  	    								</td>
				  	    								<td>
				  	    									<label class="checkbox">
																<input type="checkbox" id="inlineCheckbox3" value="option3"> 3
															</label>
				  	    								</td>
			  	    								</tr>
			  	    							</tbody>
			  	    						</table>
		  	    						</td>
		  	    					</tr>
		  	    					<tr>
		  	    						<td>19.</td>
		  	    						<td>
		  	    							<strong>
		  	    								Estado de conservación de los vidrios
		  	    							</strong>
		  	    						</td>
		  	    						<td>
		  	    							<table class="table table-bordered">
		  	    								<thead>
		  	    									<tr>
		  	    										<td></td>
		  	    										<th style="text-align:center;">Total</th>
		  	    									</tr>
		  	    								</thead>
		  	    								<tbody>
		  	    									<tr>
			  	    									<td>1. Completos</td>
			  	    									<td><input style="float:left; width:100px;" type="text" class="form-control"></td>
		  	    									</tr>
		  	    									<tr>
			  	    									<td>2. Con roturas</td>
			  	    									<td><input style="float:left; width:100px;" type="text" class="form-control"></td>
		  	    									</tr>
		  	    									<tr>
			  	    									<td>3. Sin vidrios</td>
			  	    									<td><input style="float:left; width:100px;" type="text" class="form-control"></td>
		  	    									</tr>
		  	    								</tbody>
		  	    							</table>
		  	    						</td>
		  	    					</tr>
		  	    				</tbody>
		  	    			</table>

		  	    			<div class="panel">
								<label>Observaciones:</label>
								<textarea style="width:870px; height:100px;"></textarea>
							</div>

							<table class="table table-bordered">
								<thead>
									<tr>
										<th colspan="3">Sección C:  instalaciones eléctricas interiores de la edificación</th>
									</tr>
									<tr>
										<th colspan="3">Evaluador: esta sección se realizará por observación directa excepto las preguntas 2, 3 y 3a, las cuales primero deberá preguntar y luego verificar.</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td>
											1.
										</td>
										<td><strong>Esta edificación tiene instalaciones eléctricas interiores</strong></td>
										<td>
											<div class="radio">
												<label>
													<input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked>
													    1. Si
													</label>
											</div>
											<div class="radio">
												<label>
													<input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked>
													    2. No
													</label>
											</div>
										</td>
									</tr>
									<tr>
										<td>
											1A.
										</td>
										<td>
											<strong>Indique el tipo de instalación de los circuitos eléctricos</strong>
											<br />(acepte sólo un código)
										</td>
										<td>
											<div class="radio">
												<label>
													<input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked>
													    Circuito canalizado empotrado
													</label>
											</div>
											<div class="radio">
												<label>
													<input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked>
													    Circuito canalizado expuesto
													</label>
											</div>
											<div class="radio">
												<label>
													<input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked>
													    Circuito sin canalizar
													</label>
											</div>
											<div class="radio">
												<label>
													<input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked>
													    Con conductor inadecuado
													</label>
											</div>
										</td>
									</tr>
								</tbody>
							</table>

							<table class="table table-bordered">
								<thead>
									<tr>
										<th colspan="3">Tablero de distribución</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td>
											2.
										</td>
										<td>
											<strong>¿Esta edificación tiene tablero de distribución?</strong>
											<br />(verificar)
										</td>
										<td>
											<div class="radio">
												<label>
													<input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked>
													    1. Si
													</label>
											</div>
											<div class="radio">
												<label>
													<input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked>
													    2. No
													</label>
											</div>
										</td>
									</tr>
									<tr>
										<td>
											2A.
										</td>
										<td>
											<strong>Es de fácil acceso</strong>
										</td>
										<td>
											<div class="radio">
												<label>
													<input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked>
													    1. Si
													</label>
											</div>
											<div class="radio">
												<label>
													<input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked>
													    2. No
													</label>
											</div>
										</td>
									</tr>
									<tr>
										<td>
											2B.
										</td>
										<td>
											<strong>Tiene un gabinete adecuado</strong>
										</td>
										<td>
											<div class="radio">
												<label>
													<input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked>
													    1. Si
													</label>
											</div>
											<div class="radio">
												<label>
													<input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked>
													    2. No
													</label>
											</div>
										</td>
									</tr>
									<tr>
										<td>
											2C.
										</td>
										<td>
											<strong>Tiene interruptores electromagnéticos</strong>
										</td>
										<td>
											<div class="radio">
												<label>
													<input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked>
													    1. Si
													</label>
											</div>
											<div class="radio">
												<label>
													<input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked>
													    2. No
													</label>
											</div>
										</td>
									</tr>
									<tr>
										<td>
											2D.
										</td>
										<td>
											<strong>Tiene interruptores diferenciales</strong>
										</td>
										<td>
											<div class="radio">
												<label>
													<input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked>
													    1. Si
													</label>
											</div>
											<div class="radio">
												<label>
													<input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked>
													    2. No
													</label>
											</div>
										</td>
									</tr>
									<tr>
										<td>
											3.
										</td>
										<td>
											<strong>¿Cuenta con sistema de puesta a tierra?</strong>
											<br />(Verificar)
										</td>
										<td>
											<div class="radio">
												<label>
													<input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked>
													    1. Si
													</label>
											</div>
											<div class="radio">
												<label>
													<input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked>
													    2. No
													</label>
											</div>
										</td>
									</tr>
									<tr>
										<td>
											3A.
										</td>
										<td>
											<strong>¿en qué año se hizo el último mantenimiento?</strong>
										</td>
										<td>
											<label>Año</label>
											<input style="width:100px;" type="text" class="form-control" placeholder="Text input">
										</td>
									</tr>
								</tbody>
							</table>

							<table class="table table-bordered">
								<thead>
									<tr>
										<th colspan="3">Sección D: Instalaciones sanitarias interiores de la edificación</th>
									</tr>
									<tr>
										<th colspan="3">Evaluador: Evaluador: esta sección se realizará por observación directa.</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td>
											1.
										</td>
										<td><strong>Esta edificación cuenta con red interna de agua</strong></td>
										<td>
											<div class="radio">
												<label>
													<input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked>
													    1. Si
													</label>
											</div>
											<div class="radio">
												<label>
													<input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked>
													    2. No
													</label>
											</div>
										</td>
									</tr>
									<tr>
										<td>
											1A.
										</td>
										<td>
											<strong>La instalación es empotrada</strong>
										</td>
										<td>
											<div class="radio">
												<label>
													<input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked>
													    1. Si
													</label>
											</div>
											<div class="radio">
												<label>
													<input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked>
													    2. No
													</label>
											</div>
										</td>
									</tr>
									<tr>
										<td>
											2.
										</td>
										<td>
											<strong>Esta edificación cuenta con red interna de desague</strong>
										</td>
										<td>
											<div class="radio">
												<label>
													<input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked>
													    1. Si
													</label>
											</div>
											<div class="radio">
												<label>
													<input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked>
													    2. No
													</label>
											</div>
										</td>
									</tr>
								</tbody>
							</table>

							<table class="table table-bordered">
								<thead>
									<tr>
										<th colspan="3">Sección E: Canaletas aéreas y bajadas pluviales de la edificación</th>
									</tr>
									<tr>
										<th colspan="3">Evaluador: Evaluador: esta sección se realizará por observación directa</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td>
											1.
										</td>
										<td><strong>Esta edificación tiene instaladas canaletas aéreas y bajadas pluviales</strong></td>
										<td>
											<div class="radio">
												<label>
													<input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked>
													    1. Si
													</label>
											</div>
											<div class="radio">
												<label>
													<input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked>
													    2. No
													</label>
											</div>
										</td>
									</tr>
									<tr>
										<td>
											1A.
										</td>
										<td>
											<strong>Cuál es el estado de conservación:</strong>
											<br />(acepte sólo un código)
										</td>
										<td>
											<div class="radio">
												<label>
													<input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked>
													    1. Sin daños
													</label>
											</div>
											<div class="radio">
												<label>
													<input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked>
													    2. Deterioro parcial
													</label>
											</div>
											<div class="radio">
												<label>
													<input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked>
													    2. Colapso total
													</label>
											</div>
										</td>
									</tr>
								</tbody>
							</table>

							<div class="panel">
								<label>Observaciones:</label>
								<textarea style="width:870px; height:100px;"></textarea>
							</div>

		  	    		</div>
	  	    		</div>
	  	    	</div><!-- END CAPITULO 6-->

	  	    	<!-- CAPITULO 7-->
	  	    	<div class="tab-pane" id="cap7">
	  	    		<div class="content" id="content8">
	  	    			<table class="table table-bordered">
	  	    				<thead>
	  	    					<th colspan="3" style="text-align:center;">Sección A:  Sistema estructural predominante y estado de conservación de la edificación</th>
	  	    				</thead>
	  	    				<tbody>
	  	    					<tr>
	  	    						<td>1.</td>
	  	    						<td>
	  	    							<strong>Código de la edificación</strong>
	  	    						</td>
	  	    						<td></td>
	  	    					</tr>
	  	    					<tr>
	  	    						<td>2.</td>
	  	    						<td>
	  	    							<strong>¿quién es el ejecutor de la obra?</strong>
	  	    							<br>(acepte un solo código)
	  	    						</td>
	  	    						<td></td>
	  	    					</tr>
	  	    					<tr>
	  	    						<td>3.</td>
	  	    						<td>
	  	    							<strong>¿cuál es la antigüedad de la edificación?</strong>
	  	    							<br>(acepte un solo código)
	  	    						</td>
	  	    						<td></td>
	  	    					</tr>
	  	    					<tr>
	  	    						<td>4.</td>
	  	    						<td>
	  	    							<strong>Sistema estructural predominante</strong>
	  	    							<br>(acepte un solo código)
	  	    						</td>
	  	    						<td></td>
	  	    					</tr>
	  	    				</tbody>
	  	    			</table>
	  	    			<table class="table table-bordered">
	  	    				<thead>
	  	    					<th colspan="3" style="text-align:center;">Estado de los pórticos de concreto armado y/o muros de albañilería</th>
	  	    				</thead>
	  	    				<tbody>
	  	    					<tr>
	  	    						<td>5.</td>
	  	    						<td>
	  	    							<strong>Estado de conservación de las columnas</strong>
	  	    						</td>
	  	    						<td></td>
	  	    					</tr>
	  	    					<tr>
	  	    						<td>6.</td>
	  	    						<td>
	  	    							<strong>Estado de conservación de los muros portantes</strong>
	  	    						</td>
	  	    						<td></td>
	  	    					</tr>
	  	    					<tr>
	  	    						<td>7.</td>
	  	    						<td>
	  	    							<strong>Estado de conservación de las vigas</strong>
	  	    						</td>
	  	    						<td></td>
	  	    					</tr>
	  	    					<tr>
	  	    						<td>8.</td>
	  	    						<td>
	  	    							<strong>Estado de conservación de la losa del entrepiso</strong>
	  	    						</td>
	  	    						<td></td>
	  	    					</tr>
	  	    					<tr>
	  	    						<td>9.</td>
	  	    						<td>
	  	    							<strong>El tipo de techo es:</strong>
	  	    						</td>
	  	    						<td>9A.</td>
	  	    					</tr>
	  	    					<tr>
	  	    						<td></td>
	  	    						<td>
	  	    							<strong>Estado de conservación del techo de material noble</strong>
	  	    						</td>
	  	    						<td></td>
	  	    					</tr>
	  	    					<tr>
	  	    						<td>9B.</td>
	  	    						<td>
	  	    							<strong>Cobertura final del techo</strong>
	  	    						</td>
	  	    						<td></td>
	  	    					</tr>
	  	    					<tr>
	  	    						<td>9C.</td>
	  	    						<td>
	  	    							<strong>Estado de conservación del techo de cobertura liviana</strong>
	  	    						</td>
	  	    						<td></td>
	  	    					</tr>
	  	    					<tr>
	  	    						<td>9D.</td>
	  	    						<td>
	  	    							<strong>Detalle cobertura liviana del techo</strong>
	  	    						</td>
	  	    						<td></td>
	  	    					</tr>
	  	    				</tbody>
	  	    			</table>
	  	    			<table class="table table-bordered">
	  	    				<thead>
	  	    					<th colspan="3" style="text-align:center;">Estructuración de los pórticos</th>
	  	    				</thead>
	  	    				<tbody>
	  	    					<tr>
	  	    						<td>10.</td>
	  	    						<td>
	  	    							<strong></strong>
	  	    						</td>
	  	    						<td></td>
	  	    					</tr>
	  	    					<tr>
	  	    						<td>11.</td>
	  	    						<td>
	  	    							<strong></strong>
	  	    						</td>
	  	    						<td></td>
	  	    					</tr>
	  	    				</tbody>
	  	    			</table>
	  	    			<table class="table table-bordered">
	  	    				<thead>
	  	    					<th colspan="3" style="text-align:center;">Albañilería confinada o armada</th>
	  	    				</thead>
	  	    				<tbody>
	  	    					<tr>
	  	    						<td>12.</td>
	  	    						<td>
	  	    							<strong></strong>
	  	    						</td>
	  	    						<td></td>
	  	    					</tr>
	  	    					<tr>
	  	    						<td>13.</td>
	  	    						<td>
	  	    							<strong></strong>
	  	    						</td>
	  	    						<td></td>
	  	    					</tr>
	  	    					<tr>
	  	    						<td>14.</td>
	  	    						<td>
	  	    							<strong></strong>
	  	    						</td>
	  	    						<td></td>
	  	    					</tr>
	  	    					<tr>
	  	    						<td>15.</td>
	  	    						<td>
	  	    							<strong></strong>
	  	    						</td>
	  	    						<td></td>
	  	    					</tr>
	  	    					<tr>
	  	    						<td>15A.</td>
	  	    						<td>
	  	    							<strong></strong>
	  	    						</td>
	  	    						<td></td>
	  	    					</tr>
	  	    					<tr>
	  	    						<td>15B.</td>
	  	    						<td>
	  	    							<strong></strong>
	  	    						</td>
	  	    						<td></td>
	  	    					</tr>
	  	    					<tr>
	  	    						<td>15C.</td>
	  	    						<td>
	  	    							<strong></strong>
	  	    						</td>
	  	    						<td></td>
	  	    					</tr>
	  	    					<tr>
	  	    						<td>15D.</td>
	  	    						<td>
	  	    							<strong></strong>
	  	    						</td>
	  	    						<td></td>
	  	    					</tr>
	  	    				</tbody>
	  	    			</table>
	  	    			<table class="table table-bordered">
	  	    				<thead>
	  	    					<th colspan="3" style="text-align:center;">Estructuración de albañilería</th>
	  	    				</thead>
	  	    				<tbody>
	  	    					<tr>
	  	    						<td>16.</td>
	  	    						<td>
	  	    							<strong></strong>
	  	    						</td>
	  	    						<td></td>
	  	    					</tr>
	  	    				</tbody>
	  	    			</table>
	  	    			<table class="table table-bordered">
	  	    				<thead>
	  	    					<th colspan="3" style="text-align:center;">Estructura de acero</th>
	  	    				</thead>
	  	    				<tbody>
	  	    					<tr>
	  	    						<td>17.</td>
	  	    						<td>
	  	    							<strong></strong>
	  	    						</td>
	  	    						<td></td>
	  	    					</tr>
	  	    					<tr>
	  	    						<td>18.</td>
	  	    						<td>
	  	    							<strong></strong>
	  	    						</td>
	  	    						<td></td>
	  	    					</tr>
	  	    					<tr>
	  	    						<td>19.</td>
	  	    						<td>
	  	    							<strong></strong>
	  	    						</td>
	  	    						<td></td>
	  	    					</tr>
	  	    					<tr>
	  	    						<td>20.</td>
	  	    						<td>
	  	    							<strong></strong>
	  	    						</td>
	  	    						<td></td>
	  	    					</tr>
	  	    				</tbody>
	  	    			</table>
	  	    			<table class="table table-bordered">
	  	    				<thead>
	  	    					<th colspan="3" style="text-align:center;">Estructuración de la estructura metálica</th>
	  	    				</thead>
	  	    				<tbody>
	  	    					<tr>
	  	    						<td>21.</td>
	  	    						<td>
	  	    							<strong></strong>
	  	    						</td>
	  	    						<td></td>
	  	    					</tr>
	  	    					<tr>
	  	    						<td>22.</td>
	  	    						<td>
	  	    							<strong></strong>
	  	    						</td>
	  	    						<td></td>
	  	    					</tr>
	  	    				</tbody>
	  	    			</table>
	  	    			<table class="table table-bordered">
	  	    				<thead>
	  	    					<th colspan="3" style="text-align:center;">Madera</th>
	  	    				</thead>
	  	    				<tbody>
	  	    					<tr>
	  	    						<td>23.</td>
	  	    						<td>
	  	    							<strong></strong>
	  	    						</td>
	  	    						<td></td>
	  	    					</tr>
	  	    					<tr>
	  	    						<td>24.</td>
	  	    						<td>
	  	    							<strong></strong>
	  	    						</td>
	  	    						<td></td>
	  	    					</tr>
	  	    				</tbody>
	  	    			</table>
	  	    			<table class="table table-bordered">
	  	    				<thead>
	  	    					<th colspan="3" style="text-align:center;">Adobe</th>
	  	    				</thead>
	  	    				<tbody>
	  	    					<tr>
	  	    						<td></td>
	  	    						<td>
	  	    							<strong></strong>
	  	    						</td>
	  	    						<td></td>
	  	    					</tr>
	  	    				</tbody>
	  	    			</table>
	  	    			<table class="table table-bordered">
	  	    				<thead>
	  	    					<th colspan="3" style="text-align:center;">Estructuración de adobe</th>
	  	    				</thead>
	  	    				<tbody>
	  	    					<tr>
	  	    						<td></td>
	  	    						<td>
	  	    							<strong></strong>
	  	    						</td>
	  	    						<td></td>
	  	    					</tr>
	  	    				</tbody>
	  	    			</table>
	  	    			<table class="table table-bordered">
	  	    				<thead>
	  	    					<th colspan="3" style="text-align:center;">Sección B:  Opinión técnica del evaluador</th>
	  	    				</thead>
	  	    				<tbody>
	  	    					<tr>
	  	    						<td></td>
	  	    						<td>
	  	    							<strong></strong>
	  	    						</td>
	  	    						<td></td>
	  	    					</tr>
	  	    				</tbody>
	  	    			</table>
	  	    		</div>
	  	    	</div><!-- END CAPITULO 6-->

	  	    	<!-- CAPITULO 8-->
	  	    	<div class="tab-pane" id="cap8">
	  	    		<div class="content" id="content8">
	  	    			8
	  	    		</div>
	  	    	</div><!-- END CAPITULO 6-->

			</div><!--END TAB CONTENTS-->

        </div>
        <!-- <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div> -->
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->

