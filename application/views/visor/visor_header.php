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

		

		$('#ver').click(function(){
			/*get_data();*/
		});

		//=========================EVENTOS=========================================

		


		

		

		

	});
</script>