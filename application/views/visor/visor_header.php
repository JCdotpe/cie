
<link rel="stylesheet" href="<?php echo base_url('css/smoothness/jquery-ui-1.10.2.custom.min.css'); ?>">
<script src="<?php echo base_url('js/general/jquery-ui-1.10.2.custom.min.js'); ?>"></script>
<link rel="stylesheet" href="<?php echo base_url('css/jquery-ui-1.10.3.custom.min.css') ?>">
<link rel="stylesheet" href="<?php echo base_url('css/ui.jqgrid.css') ?>">
<script src="<?php echo base_url('js/jqgrid/i18n/grid.locale-es.js'); ?>"></script>
<script src="<?php echo base_url('js/jqgrid/jquery.jqGrid.min.js'); ?>"></script>
<script src="<?php echo base_url('js/urlRoot.js'); ?>"></script>
<script src="<?php echo base_url('js/visor/basic.js'); ?>"></script>
<script src="<?php echo base_url('js/visor/cedulas.js'); ?>"></script>
<script src="<?php echo base_url('js/visor/cie01.js'); ?>"></script>
<script src="<?php echo base_url('js/visor/cie01a.js'); ?>"></script>
<script src="<?php echo base_url('js/visor/cie01b.js'); ?>"></script>
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

		//CIE 01

		//DATOS GENERALES 1
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
			get_P2_D_1N(code);
		});

		$('#c3').click(function(event) {

		});

		//CIE01A

		//DATOS GENERALES 2
		$('#g2').click(function(event) {

		});

		$('#c4').click(function(event) {

		});

		$('#c5').click(function(event) {

		});

		//CIE01B

		//DATOS GENERALES 3
		$('#g3').click(function(event) {
			var code=$('.codigo_local').val();
			get_PadLocal(code);
			get_PCar(code);

		});

		$('#c6').click(function(event) {
			var code=$('.codigo_local').val();
			get_TotalEdif(code);
			get_Edificacion(code);

		});

		$('#c7').click(function(event) {

		});

		$('#c8').click(function(event) {

		});

	});
</script>