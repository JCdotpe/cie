<link rel="stylesheet" href="<?php echo base_url('css/jquery-ui-1.10.3.custom.min.css') ?>">
<link rel="stylesheet" href="<?php echo base_url('css/ui.jqgrid.css') ?>"> 
<script src="<?php echo base_url('js/jqgrid/i18n/grid.locale-es.js'); ?>"></script>
<script src="<?php echo base_url('js/jqgrid/jquery.jqGrid.min.js'); ?>"></script>
<!-- <script src="<?php #echo base_url('js/procesamiento/procesamiento.js'); ?>"></script> -->

<style>
	.ui-jqgrid tr.jqgrow td {
		white-space: normal !important;
	}
</style>
<?php

	$label_class =  array('class' => 'control-label');

	$txtCodigoLocal = array(
		'name'	=> 'codigolocal',
		'id'	=> 'codigolocal',
		'style' => 'width: 60px;',
		'onblur' => 'return consultar_codigo()',
		'maxlength' => 6
	);

	$txtF01 = array(
		'name'	=> 'ficha01',
		'id'	=> 'ficha01',
		'style' => 'width: 60px;',
		'maxlength' => 2
	);

	$txtF01A = array(
		'name'	=> 'ficha01A',
		'id'	=> 'ficha01A',
		'style' => 'width: 60px;',
		'maxlength' => 2
	);
	$txtF01B = array(
		'name'	=> 'ficha01B',
		'id'	=> 'ficha01B',
		'style' => 'width: 60px;',
		'maxlength' => 2
	);
	$txtResut = array(
		'name'	=> 'result',
		'id'	=> 'result',
		'style' => 'width: 60px;',
		'maxlength' => 1
	);
	$txtLegajo = array(
		'name'	=> 'legajo',
		'id'	=> 'legajo',
		'style' => 'width: 60px;',
		'maxlength' => 8
	);

	$btnExportar = array(
		'name' => 'btnExportar',
		'id' => 'btnExportar',
		'type' => 'button',
		'content' => 'Reporte Udra',
		'class' => 'btn btn-inverse btn-sm pull-right'
	);

?>


	<div class="row-fluid">
		<div id="ap-content" class="span12">
			<div class="row-fluid well top-conv">
				<?php echo form_open('','id="frm_dig_udra"'); ?>
				<div class="span2">
					<div class="control-group">
						<?php echo form_label('Código de Local', 'codigo', $label_class); ?>
						<div class="controls">
							<?php echo form_input($txtCodigoLocal); ?>
							<div class="help-block error"></div>
						</div>
					</div>
				</div>
				
				<div class="span2">
					<div class="control-group">
						<?php echo form_label('Cantidad Cedula 01', 'F01', $label_class); ?>
						<div class="controls">
							<?php echo form_input($txtF01); ?>
							<div class="help-block error"></div>
						</div>
					</div>
				</div>
				<div class="span2">
					<div class="control-group">
						<?php echo form_label('Cantidad Cedula 01A', 'F01A', $label_class); ?>
						<div class="controls">
							<?php echo form_input($txtF01A); ?>
							<div class="help-block error"></div>
						</div>
					</div>
				</div>
				<div class="span2">
					<div class="control-group">
						<?php echo form_label('Cantidad Cedula 01B', 'F01B', $label_class); ?>
						<div class="controls">
							<?php echo form_input($txtF01B); ?>
							<div class="help-block error"></div>
						</div>
					</div>
				</div>
				<div class="span2">
					<div class="control-group">
						<?php echo form_label('Codigo de Legajo', 'Codigo de Legajo', $label_class); ?>
						<div class="controls">
							<?php echo form_input($txtLegajo); ?>
							<div class="help-block error"></div>
						</div>
					</div>
				</div>
				<div class="span2">
					<div class="control-group">
						<?php echo form_label('Resultado', 'result', $label_class); ?>
						<div class="controls">
							<?php echo form_input($txtResut); ?>
							<div class="help-block error"></div>
						</div>
					</div>
				</div>
				<div>
					<div class="span11">
						<div class="control-group">
							<?php echo form_label('', '', $label_class); ?>
							<div class="controls">
								<?php echo form_submit('send', 'Guardar','class="btn btn-inverse btn-sm pull-right"'); ?>
							</div>
						</div>
					</div>
				</div>

				<?php echo form_close(); ?>
			</div>
		</div>	
		<div>
			<div id="grid_content" class="span12">
				<table id="list2"></table>
				<div id="pager2"></div>
			</div>
		</div>
		<div>
			<div class="span12">
				<div class="control-group">
					<?php echo form_label('', '', $label_class); ?>
					<div class="controls">
						<!-- <?php #echo form_button($btnExportar); ?> -->
					</div>
				</div>
			</div>
		</div>
</div>

<script type="text/javascript">

	// $(function(){
		
		jQuery("#list2").jqGrid({
			type:"POST",
			url:'dudra/ver_datos',
			datatype: "json",
			height: 500,
			colNames:['Código de Local', 'Cedula 01', 'Cedula 01A', 'Cedula 01B','Código de Legajo', 'Resultado', 'Registro de Udra', 'Digitacion', 'Local Digitacion', 'Registro Digitacion'],
			colModel:[
				{name:'id_local',index:'id_local', align:"center"},
				{name:'cnt_01',index:'cnt_01', align:"center"},
				{name:'cnt_01A',index:'cnt_01A', align:"center"},
				{name:'cnt_01B',index:'cnt_01B', align:"center"},
				{name:'cod_legajo',index:'cod_legajo', align:"center"},
				{name:'resultado',index:'resultado', align:"center"},
				{name:'fecha_reg',index:'fecha_reg', align:"center"},
				{name:'Envio_dig',index:'Envio_dig', align:"center", edittype:'select', formatter:cmbFormatter, editable:true},
				{name:'Envio_dig_Local',index:'Envio_dig_Local', align:"center", edittype:'select', formatter:cmbLocal, editable:true},
				{name:'Envio_dig_fec',index:'Envio_dig_fec', align:"center"},
			],
			pager: '#pager2',
			rowNum:20,
			rowList:[20,30,40],
			sortname: 'fecha_reg',
			viewrecords: true,
			sortorder: "asc",
			caption:"Registro de UDRA"
		});
		jQuery("#list2").jqGrid('navGrid','#pager2',{edit:true,add:false,del:true,search:false});
		$("#list2").setGridWidth($('#grid_content').width(), true);
		ver_datos();

		function ver_datos()
		{
			condicion = urlRoot('index.php')+"/procesamiento/dudra/ver_datos";

			jQuery("#list2").jqGrid('setGridParam',{url:condicion,page:1}).trigger("reloadGrid");
		}

		function cmbFormatter(cellvalue, options, rowObject)
		{
			return '<select id="cmbenv_\''+options.rowId+'\'" name="cmbenv_\''+options.rowId+'\'" onchange="RegistroDigitacion(\''+options.rowId+'\',this)"  style="width:90%">'+
						'<option value="0"'+(cellvalue == 0 ? 'selected' : '' )+'>NO</option>'+
						'<option value="1"'+(cellvalue == 1 ? 'selected' : '' )+'>SI</option>'+
					'</select>';
		}

		function cmbLocal(cellvalue, options, rowObject)
		{
			return '<select id="cmbDiglocal_'+options.rowId+'" name="cmbDiglocal_'+options.rowId+'" onchange="RegistroDigLocal(\''+options.rowId+'\',this)"  style="width:90%" '+ (cellvalue.trim() == '' ? ' disabled="disabled"' : '') +'>'+
						'<option value="" '+(cellvalue.trim() == '' ? 'selected' : '' )+'></option>'+
						'<option value="R" '+(cellvalue == 'R' ? 'selected' : '' )+'>Ribeyro</option>'+
						'<option value="C" '+(cellvalue == 'C' ? 'selected' : '' )+'>Cervante</option>'+
					'</select>';
		}

		function RegistroDigitacion(id,combo)
		{
			var seleccionado = $(combo).val();
			$.ajax({
				type: "POST",
				url: CI.site_url + "/procesamiento/dudra/envio_digitacion",
				dataType: "json",
				data: "id_local="+id+"&Envio_dig=" +seleccionado,
				cache: false,
				success: function(json){
					// alert(json.msg);
					$("#list2").trigger("reloadGrid");
					// if (seleccionado == 0) { $("#cmbDiglocal_"+id+"").attr("disabled", "disabled"); }
				}
			});
			return false;
		}


		function RegistroDigLocal(id,combo)
		{
			var seleccionado = $(combo).val();
			if (seleccionado.trim() == '') { alert("Seleccione un Local"); return false; }
			$.ajax({
				type: "POST",
				url: CI.site_url + "/procesamiento/dudra/envio_diglocal",
				dataType: "json",
				data: "id_local="+id+"&Envio_dig_Local=" +seleccionado,
				cache: false,
				success: function(json){
					// alert(json.msg);
					$("#list2").trigger("reloadGrid");
				}
			});
			return false;
		}


		// jQuery Validator
		$.extend(jQuery.validator.messages, {
		    required: "Campo obligatorio",
		    // remote: "Please fix this field.",
		    email: "Ingrese un email válido",
		    // url: "Please enter a valid URL.",
		    date: "Ingrese una fecha válida",
		    // dateISO: "Please enter a valid date (ISO).",
		    number: "Solo se permiten números",
		    digits: "Solo se permiten números",
		    range: jQuery.validator.format("Por favor ingrese un valor  entre {0} y {1}."),
		    // creditcard: "Please enter a valid credit card number.",
		    // equalTo: "Please enter the same value again.",
		    // accept: "Please enter a value with a valid extension.",
		    // maxlength: jQuery.validator.format("Please enter no more than {0} characters."),
		    minlength: jQuery.validator.format("Por favor ingrese un valor mayor a {0} characteres."),
		    // rangelength: jQuery.validator.format("Please enter a value between {0} and {1} characters long."),
		    // range: jQuery.validator.format("Please enter a value between {0} and {1}."),
		    // max: jQuery.validator.format("Please enter a value less than or equal to {0}."),
		    // min: jQuery.validator.format("Please enter a value greater than or equal to {0}.")
		});


		$("#frm_dig_udra").validate({
				rules: {
					codigolocal:{
						digits:true,
						required:true,
			    	},
			    	ficha01:{
						digits:true,
						required:true,
						range:[0,20],
			    	},
				    ficha01A:{
							digits:true,
							required:true,
							range:[0,20],
				    },
				    ficha01B:{
							digits:true,
							required:true,
							range:[0,98],
				    },
				    legajo:{
				    	minlength:7,
				    },
				    result:{
							digits:true,
							required:true,
							range:[1,5],
				    },
				},

			    messages: {   
				//FIN MESSAGES
			    },
			    errorPlacement: function(error, element) {
			        $(element).next().after(error);
			    },
			    invalidHandler: function(form, validator) {
			      var errors = validator.numberOfInvalids();
			      if (errors) {
			        var message = errors == 1
			          ? 'Por favor corrige estos errores:\n'
			          : 'Por favor corrige los ' + errors + ' errores.\n';
			        var errors = "";
			        if (validator.errorList.length > 0) {
			            for (x=0;x<validator.errorList.length;x++) {
			                errors += "\n\u25CF " + validator.errorList[x].message;
			            }
			        }
			        alert(message + errors);
			      }
			      validator.focusInvalid();
			    },
			    submitHandler: function(form) {
					var form_data = $('#frm_dig_udra').serializeArray();
					var bsub = $( "#frm_dig_udra :submit" );
					bsub.attr("disabled","disabled");
					$.ajax({
						url: CI.site_url + "/procesamiento/dudra/registro",
						type: "POST", 
						cache:false,
						data: form_data,
						dataType:'json',
						success:function(json){
							alert("Datos Registrados!");
							$('#frm_dig_udra')[0].reset();
							bsub.removeAttr("disabled");
							$("#list2").trigger("reloadGrid");
						}
					});
				}
			});
	// });
</script>