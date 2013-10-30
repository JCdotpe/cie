<link rel="stylesheet" href="<?php echo base_url('css/jquery-ui-1.10.3.custom.min.css') ?>">
<link rel="stylesheet" href="<?php echo base_url('css/ui.jqgrid.css') ?>">
<script src="<?php echo base_url('js/jqgrid/i18n/grid.locale-es.js'); ?>"></script>
<script src="<?php echo base_url('js/jqgrid/jquery.jqGrid.min.js'); ?>"></script>
<script src="<?php echo base_url('js/bpr.js'); ?>"></script>
<style>
	.ui-jqgrid tr.jqgrow td {
		white-space: normal !important;
	}
</style>
<?php
	$label_class =  array('class' => 'control-label');
	$sedeArray = array(-1 => 'Seleccione...');
	foreach($sedeope->result() as $filas)
	{
		$sedeArray[$filas->cod_sede_operativa] = utf8_encode(strtoupper($filas->sede_operativa));
	}
	$provArray = array(-1 => '');

	$cargosArray = array(-1 => 'Seleccione...'); 
	$cargospresupuestario=array(-1 => '-1');
	$cargosadm=array(-1 => '-1');
	foreach ($cargos->result() as $filas) 
	{
		$cargosArray[$filas->codigo_Convocatoria] = utf8_encode($filas->CargoFunciona);
		$cargospresupuestario[$filas->codigo_Convocatoria] = $filas->codigo_CredPresupuestario;
		$cargosadm[$filas->codigo_Convocatoria] = $filas->codigo_adm;
	}
	$selected_cargo = (set_value('cargo')) ? set_value('cargo') : '' ;

	$cedulaArray = array(-1 => 'Seleccione...');
	foreach($cedula->result() as $filas)
	{
		$cedulaArray[$filas->cedula] = utf8_encode(strtoupper($filas->cedula));
	}
	$capArray = array(-1 => '');
    $secArray = array(-1 => '');
    $preArray = array(-1 => '');

    $txtNombre = array(
		'name'	=> 'nombrecompleto',
		'id'	=> 'nombrecompleto',
		'value' => set_value('nombrecompleto'),		
		'style' => 'width: 250px;',
		'maxlength' => 80
	);

	$txtDni = array(
		'name'	=> 'nrodni',
		'id'	=> 'nrodni',
		'value' => set_value('nrodni'),		
		'style' => 'width: 100px;',
		'onkeypress' => 'return validar_numeros(event)',
		'maxlength' => 8
	);

	$txtConsulta =array(
		'name'	=> 'consulta',
		'id'	=> 'consulta',
		'value'	=> set_value('consulta'),
		'maxlength'	=> 400,
		'style' => 'width: 500px;',		
		'rows' => '4',
		'cols' => '20'
	);

	$btnGrabar = array(
		'name' => 'guardar',
		'id' => 'guardar',
		'onclick' => 'Form_Validar()',
		'type' => 'button',
		'content' => 'Enviar',
		'class' => 'btn btn-primary pull-left'
	);

?>

<div class="row-fluid">
	<div class="row-fluid">
		<div id="ap-content" class="span12">
			<?php echo form_open('','id="frm_preguntas"'); ?>
			<div class="row-fluid well top-conv">				
				<div class="span3">
					<div class="control-group">
						<?php echo form_label('Sede Operativa', 'sedeope', $label_class); ?>
						<div class="controls">
							<?php echo form_dropdown('sedeoperativa', $sedeArray, '#', 'id="sedeoperativa" onChange="cargarProv();"'); ?>
						</div>
					</div>
				</div>
				<div class="span3">
					<div class="control-group">
						<?php echo form_label('Provincia Operativa', 'provinciaope', $label_class); ?>
						<div class="controls">
							<?php echo form_dropdown('provincia_ope', $provArray, '#', 'id="provincia_ope" onChange="cargarDatos();"'); ?>
						</div>
					</div>
				</div>
				<div class="span3">
					<div class="control-group">
						<?php echo form_label('Cargo', 'cargo', $label_class); ?>
						<div class="controls">
							<?php
								echo form_dropdown('cargo', $cargosArray, $selected_cargo, ' id="cargo" onChange="cargarDatos();"'); 
								echo form_dropdown('cargo', $cargospresupuestario, $selected_cargo, ' id="cargo_presupuestal" style="display:none"'); 
								echo form_dropdown('cargo', $cargosadm, $selected_cargo, 'id="cargo_adm" style="display:none"');
							?>
						</div>
					</div>
				</div>
				<div class="span3"></div>
				<div>
					<div class="span3">
						<div class="control-group">
							<?php echo form_label('Cédula', 'cedula', $label_class); ?>
							<div class="controls">
								<?php echo form_dropdown('cedula', $cedulaArray, '#', 'id="cedula" onChange="cargarCapitulo();"'); ?>
							</div>
						</div>
					</div>
					<div class="span3">
						<div class="control-group">
							<?php echo form_label('Capítulo', 'capitulo', $label_class); ?>
							<div class="controls">
								<?php echo form_dropdown('capitulo', $capArray, '#', 'id="capitulo" onChange="cargarSeccion();"'); ?>
							</div>
						</div>
					</div>
					<div class="span3">
						<div class="control-group">
							<?php echo form_label('Sección', 'seccion', $label_class); ?>
							<div class="controls">
								<?php echo form_dropdown('seccion', $secArray, '#', 'id="seccion" onChange="cargarPreguntas();"'); ?>
							</div>
						</div>
					</div>
					<div class="span3">
						<div class="control-group">
							<?php echo form_label('Pregunta', 'pregunta', $label_class); ?>
							<div class="controls">
								<?php echo form_dropdown('pregunta', $preArray, '#', 'id="pregunta" onChange="cargarDatos();"'); ?>
							</div>
						</div>
					</div>
				</div>
			</div>
			<input type="hidden" name="codigo" id="codigo" value="<?php echo $user_id; ?>" />
			<div class="accordion" id="accordion2">
			</div>
			<?php echo form_close(); ?>			
		</div>
	</div>
</div>

<script type="text/javascript">

	$(document).ready(function() {
		var codigo = $("#codigo").val();
		ListarPreguntaPrincipal(codigo);
	});

function ListarPreguntaPrincipal(usuario)
{
	var sedeope=$("#sedeoperativa").val();
	var provope = $("#provincia_ope").val();
	var cargo = document.getElementById("cargo").value;
	var cedula = $("#cedula").val();
	var capitulo = $("#capitulo").val();
	var seccion = $("#seccion").val();
	var pregunta = $("#pregunta").val();

	$.getJSON(urlRoot('index.php')+'/bpr/banco/view_pregunta/', {sede_ope:sedeope,prov_ope:provope,cargo:cargo,cedula:cedula,capitulo:capitulo,seccion:seccion,pregunta:pregunta}, function(data, textStatus) {

		var html="";
		var estado="";
		var nro="";
		$.each(data, function(index, val) {
			html+='<div class="accordion-group">'+
					'<div class="accordion-heading">'+
						'<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapse'+val.id_cuestionario+'">'+
							val.consulta+' <span class="fecha_pregunta_titulo">'+val.fecha_creacion+
						'</span></a>'+
					'</div>'+
					'<div id="collapse'+val.id_cuestionario+'" class="accordion-body collapse">'+
						'<div id="content_'+val.id_cuestionario+'" class="accordion-inner">';
							$.each(val.historial, function(index, val) {
								if (val.id_nro == 1)
								{
									html+="<div><span style='font-size: 12px; color: #000;'>Respuesta "+val.id_nro+" : </span><span style='font-size: 12px; color: #000; float:right;'>"+val.fecha_respuesta+"</span></div>";
									html+="<div><span style='color:#494BDE;'>"+val.respuesta+"</span></div>";
								}else{
									html+="<div><span style='font-size: 12px; color: #000;'>Pregunta "+val.id_nro+" : </span><span style='font-size: 12px; color: #000; float:right;'>"+val.fecha_pregunta+"</span></div>";
									html+="<div><span style='color:#FC5B42;'>"+val.consulta+"</span></div>";
										if (val.estado>0)
										{	
										html+="<div><span style='font-size: 12px; color: #000;'>Respuesta "+val.id_nro+" : </span><span style='font-size: 12px; color: #000; float:right;'>"+val.fecha_respuesta+"</span></div>";
										html+="<div><span style='color:#494BDE;'>"+val.respuesta+"<span></div>";
										}
								}
								html+="<br>";
								estado=val.estado;
								nro=val.id_nro;
							});
					html+='</div>';
					if (usuario!='' && estado==0)
					{
					html+='<div id="respuesta_'+val.id_cuestionario+'" style="padding:20px;">'+
							'<div class="span7">'+
								'<div class="control-group">'+
									'<label class="control-label" for="resp">Respuesta</label>'+
									'<div class="controls">'+
										'<textarea id="contenido_'+val.id_cuestionario+'" style="width: 500px;" maxlength="400" rows="4" cols="20" name="respuesta"></textarea>'+
									'</div>'+
								'</div>'+
							'</div>'+
							'<div>'+
								'<div class="span12">'+
									'<button id="rpt" class="btn btn-primary pull-left" onclick="respuesta_bpr('+val.id_cuestionario+','+nro+')" type="button" name="rpt">Reponder</button>'+
								'</div>'+
							'</div>'+
					'</div>';
					}else if (usuario=='' && estado==1){
					html+='<div id="pregunta_'+val.id_cuestionario+'" style="padding:20px;">'+
							'<div class="span4">'+
								'<div class="control-group">'+
									'<label for="nombre" class="control-label">Nombre Completo</label>'+
									'<div class="controls">'+
										'<input id="nombrecompleto_'+val.id_cuestionario+'" type="text" maxlength="80" style="width: 250px;" value="" name="nombrecompleto"></input>'+
									'</div>'+
								'</div>'+
							'</div>'+
							'<div class="span4">'+
								'<div class="control-group">'+
									'<label for="dni" class="control-label">Nro DNI</label>'+
									'<div class="controls">'+
										'<input id="nrodni_'+val.id_cuestionario+'" type="text" maxlength="8" onkeypress="return validar_numeros(event)" style="width: 100px;" value="" name="nrodni"></input>'+
									'</div>'+
								'</div>'+
							'</div>'+
							'<div>'+
								'<div class="span7">'+
									'<div class="control-group">'+
										'<label class="control-label" for="cons">Consulta</label>'+
										'<div class="controls">'+
											'<textarea id="consulta_'+val.id_cuestionario+'" style="width: 500px;" maxlength="400" rows="4" cols="20" name="consulta"></textarea>'+
										'</div>'+
									'</div>'+
								'</div>'+
							'</div>'+
							'<div>'+
								'<div class="span12">'+
									'<button id="guardar" class="btn btn-primary pull-left" onclick="repregunta_bpr('+val.id_cuestionario+')" type="button" name="guardar">Enviar</button>'+
								'</div>'+
							'</div>'+
						'</div>';
					}
				html+='</div>'+
				'</div>';
		});
		$("#accordion2").html(html);
	});
}

function repregunta_bpr(codigo_cuestionario)
{
	var nombre = $("#nombrecompleto_"+codigo_cuestionario).val();
	var nrodni = $("#nrodni_"+codigo_cuestionario).val();
	var consulta = $("#consulta_"+codigo_cuestionario).val();

	if (consulta=='' || nombre ="" || nrodni="") { alert("Ingrese su Consulta!"); return false; }

	$.ajax({
		type: "POST", 
		url: urlRoot('index.php')+"/bpr/preguntas/re_pregunta",
		data: "id_cuestionario="+codigo_cuestionario+"&nombrecompleto="+nombre+"&nrodni="+nrodni+"&consulta="+consulta,
		success: function(response){
			view_last_quest(codigo_cuestionario);
			$("#pregunta_"+codigo_cuestionario).hide();
			$("#nombrecompleto_"+codigo_cuestionario).val('');
			$("#nrodni_"+codigo_cuestionario).val('');
			$("#consulta_"+codigo_cuestionario).val('');
			alert("Consulta Enviada!");
		}
	});
}

function view_last_quest(codigo)
{
	$.getJSON(urlRoot('index.php')+'/bpr/preguntas/view_ultima_pregunta/', {id_cuestionario:codigo}, function(data, textStatus) {

		var html="";
		$.each(data, function(index, val) {
			html+="<div><span style='font-size: 12px; color: #000;'>Pregunta "+val.id_nro+" : </span><span style='font-size: 12px; color: #000; float:right;'>"+val.fecha_pregunta+"</span></div>";
			html+="<div><span style='color:#FC5B42;'>"+val.consulta+'</span></div>';
		});
		$("#content_"+codigo).append(html);
	});
}

function respuesta_bpr(codigo_cuestionario,nro_cuestionario)
{
	var codigo = $("#codigo").val();
	var respuesta = $("#contenido_"+codigo_cuestionario).val();
	var codigo_rpt = codigo_cuestionario+'.'+nro_cuestionario;

	if (respuesta=='') { alert("Ingrese su Respuesta!"); return false; }

	$.ajax({
		type: "POST", 
		url: urlRoot('index.php')+"/bpr/respuestas/registro",
		data: "codigo="+codigo_rpt+"&respuesta="+respuesta+"&usuario="+codigo,
		success: function(response){
			view_last_resp(codigo_cuestionario);
			$("#respuesta_"+codigo_cuestionario).hide();
			$("#contenido_"+codigo_cuestionario).val('');
			alert("Respuesta Enviada!");
		}
	});
}

function view_last_resp(codigo)
{
	$.getJSON(urlRoot('index.php')+'/bpr/respuestas/view_ultima_respuesta/', {id_cuestionario:codigo}, function(data, textStatus) {

		var html="";
		$.each(data, function(index, val) {
			html+="<div><span style='font-size: 12px; color: #000;'>Respuesta "+val.id_nro+" : </span><span style='font-size: 12px; color: #000; float:right;'>"+val.fecha_respuesta+"</span></div>";
			html+="<div><span style='color:#494BDE;'>"+val.respuesta+"</span></div>";
		});
		$("#content_"+codigo).append(html);
	});
}

</script>