<script src="<?php echo base_url('js/visor/cedulas.js'); ?>"></script>
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

		    var doLoginMethodUrl = urlRoot()+'informes/coberturapea/obtenerprovincia';
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
		      dataType:'json',
		      success: function(json_data){

		        $("#provincia").empty().attr({
		   			disabled: false,
		   		});
				$.each(json_data, function(i, data){
					$("#provincia").append('<option value="' + data.CODIGO + '">' + data.NOMBRE + '</option>');
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
			/*get_data();*/
		});

		//=========================EVENTOS=========================================

		//CIE 01

		//DATOS GENERALES 1
		/*$('.view').live('click', function(event) {

			$('#myModal').modal('show');
			$('.codigo_local').val($(this).attr('id'));
			get_PadLocal($(this).attr('id'));
			get_PCar($(this).attr('id'));

		});*/


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
			get_P2_D(code);
			get_P2_D_1N(code);
			get_P2_D_3N(code);
			get_P2_D_5N(code);
			get_P2_D_7N(code);
			get_P2_E(code);
			get_P2_F(code);
			get_P2_G(code);
			/*get_P2_G_2N(code);*/
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
			var token='7959ac60dc22523a9ac306ac6f9308d3d7201c55';
			var predio= $('#PC_F_1').html();
			var cod_local=$('.codigo_local').val();
			//get_TotalEdif(code);
			//get_Edificacion(code);
			//Get_Cap06(code,predio);
			//token,cod_local,predio,nro_edif
			Get_Tot_Edif_Cap05(token,cod_local);
			Get_List_Edif_Cap06(token,cod_local);
			Get_Edif_Cap06(token,cod_local,1,1);

		});

		$('#c7').click(function(event) {

		});

		$('#c8').click(function(event) {

		});

	});
</script>