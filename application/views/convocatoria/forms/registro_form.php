<?php


$label_class =  array('class' => 'control-label');
$span_class =  'span10';
$span_class2 =  'span10';
// ****** VARIABLES ***



$ap_paterno =array(
	'name'	=> 'ap_paterno',
	'id'	=> 'ap_paterno',
	'value'	=> set_value('ap_paterno'),
	'maxlength'	=> 80,
	'class' => $span_class,
);
$ap_materno =array(
	'name'	=> 'ap_materno',
	'id'	=> 'ap_materno',
	'value'	=> set_value('ap_materno'),
	'maxlength'	=> 80,
	'class' => $span_class,
);
$nombre1 =array(
	'name'	=> 'nombre1',
	'id'	=> 'nombre1',
	'value'	=> set_value('nombre1'),
	'maxlength'	=> 80,
	'class' => $span_class,
);
$nombre2 =array(
	'name'	=> 'nombre2',
	'id'	=> 'nombre2',
	'value'	=> set_value('nombre2'),
	'maxlength'	=> 80,
	'class' => $span_class,
);
$grado= array('-1' => '-' );
$fecha_nac =array(
	'name'	=> 'fecha_nac',
	'id'	=> 'fecha_nac',
	'value'	=> set_value('fecha_nac'),
	'maxlength'	=> 80,
	'class' => $span_class,
);

$fecha_exp =array(
	'name'	=> 'fecha_exp',
	'id'	=> 'fecha_exp',
	'value'	=> set_value('fecha_exp'),
	'maxlength'	=> 80,
	'class' => $span_class,
);

$dni =array(
	'name'	=> 'dni',
	'id'	=> 'dni',
	'value'	=> set_value('dni'),
	'maxlength'	=> 8,
	'class' => $span_class,
);
$dni2 =array(
	'name'	=> 'dni2',
	'id'	=> 'dni2',
	'value'	=> set_value('dni2'),
	'maxlength'	=> 8,
	'class' => $span_class,
);
$ruc =array(
	'name'	=> 'ruc',
	'id'	=> 'ruc',
	'value'	=> set_value('ruc'),
	'maxlength'	=> 11,
	'class' => $span_class,
);
$ruc2 =array(
	'name'	=> 'ruc2',
	'id'	=> 'ruc2',
	'value'	=> set_value('ruc2'),
	'maxlength'	=> 11,
	'class' => $span_class,
);

$nro_tel =array(
	'name'	=> 'nro_tel',
	'id'	=> 'nro_tel',
	'value'	=> set_value('nro_tel'),
	'maxlength'	=> 9,
	'class' => $span_class,
);
$nro_cel =array(
	'name'	=> 'nro_cel',
	'id'	=> 'nro_cel',
	'value'	=> set_value('nro_cel'),
	'maxlength'	=> 12,
	'class' => $span_class,
);

$email =array(
	'name'	=> 'email',
	'id'	=> 'email',
	'value'	=> set_value('email'),
	'maxlength'	=> 45,
	'class' => $span_class,
);

$nombre_via =array(
	'name'	=> 'nombre_via',
	'id'	=> 'nombre_via',
	'value'	=> set_value('nombre_via'),
	'maxlength'	=> 80,
	'class' => $span_class,
);
$n_registro =array(
	'name'	=> 'n_registro',
	'id'	=> 'n_registro',
	'value'	=> set_value('n_registro'),
	'maxlength'	=> 80,
	'class' => $span_class,
	'disabled'=> "disabled",
);
$nro =array(
	'name'	=> 'nro',
	'id'	=> 'nro',
	'value'	=> set_value('nro'),
	'maxlength'	=> 6,
	'class' => $span_class,
);
$km =array(
	'name'	=> 'km',
	'id'	=> 'km',
	'value'	=> set_value('km'),
	'maxlength'	=> 6,
	'class' => $span_class,
);
$mz =array(
	'name'	=> 'mz',
	'id'	=> 'mz',
	'value'	=> set_value('mz'),
	'maxlength'	=> 6,
	'class' => $span_class,
);
$interior =array(
	'name'	=> 'interior',
	'id'	=> 'interior',
	'value'	=> set_value('interior'),
	'maxlength'	=> 6,
	'class' => $span_class,
);
$dpto =array(
	'name'	=> 'dpto',
	'id'	=> 'dpto',
	'value'	=> set_value('dpto'),
	'maxlength'	=> 6,
	'class' => $span_class,
);
$lote =array(
	'name'	=> 'lote',
	'id'	=> 'lote',
	'value'	=> set_value('lote'),
	'maxlength'	=> 6,
	'class' => $span_class,
);
$piso =array(
	'name'	=> 'piso',
	'id'	=> 'piso',
	'value'	=> set_value('piso'),
	'maxlength'	=> 6,
	'class' => $span_class,
);

$nombre_zona =array(
	'name'	=> 'nombre_zona',
	'id'	=> 'nombre_zona',
	'value'	=> set_value('nombre_zona'),
	'maxlength'	=> 80,
	'class' => $span_class,
);

$periodo_alcanzado =array(
	'name'	=> 'periodo_alcanzado',
	'id'	=> 'periodo_alcanzado',
	'value'	=> set_value('periodo_alcanzado'),
	'maxlength'	=> 2,
	'class' => $span_class,
);

$centro_estudios =array(
	'name'	=> 'centro_estudios',
	'id'	=> 'centro_estudios',
	'value'	=> set_value('centro_estudios'),
	'maxlength'	=> 80,
	'class' => $span_class,
);

$expe_gen_a =array(
	'name'	=> 'expe_gen_a',
	'id'	=> 'expe_gen_a',
	'value'	=> set_value('expe_gen_a'),
	'maxlength'	=> 2,
	'class' => $span_class,
);
$expe_gen_m =array(
	'name'	=> 'expe_gen_m',
	'id'	=> 'expe_gen_m',
	'value'	=> set_value('expe_gen_m'),
	'maxlength'	=> 2,
	'class' => $span_class,
);
$expe_trab_a =array(
	'name'	=> 'expe_trab_a',
	'id'	=> 'expe_trab_a',
	'value'	=> set_value('expe_trab_a'),
	'maxlength'	=> 2,
	'class' => $span_class,
);
$expe_trab_m =array(
	'name'	=> 'expe_trab_m',
	'id'	=> 'expe_trab_m',
	'value'	=> set_value('expe_trab_m'),
	'maxlength'	=> 2,
	'class' => $span_class,
);
$expe_manejo_a =array(
	'name'	=> 'expe_manejo_a',
	'id'	=> 'expe_manejo_a',
	'value'	=> set_value('expe_manejo_a'),
	'maxlength'	=> 2,
	'class' => $span_class,
);
$expe_manejo_m =array(
	'name'	=> 'expe_manejo_m',
	'id'	=> 'expe_manejo_m',
	'value'	=> set_value('expe_manejo_m'),
	'maxlength'	=> 2,
	'class' => $span_class,
);

$ultimo_ano =array(
	'name'	=> 'ultimo_ano',
	'id'	=> 'ultimo_ano',
	'value'	=> set_value('ultimo_ano'),
	'maxlength'	=> 4,
	'class' => $span_class,
);



		$cargosArray = array(-1 => '-');
		$cargosadm=array(-1 => '-');
		$cargospresupuestario=array(-1 => '-');
		foreach ($cargos->result() as $filas)
			 	{
			 		if ($filas->cierre>0) {
			 			# code...
			 			$cargosArray[$filas->codigo_Convocatoria] = utf8_encode($filas->CargoFunciona);
			 			$cargospresupuestario[$filas->codigo_Convocatoria] = $filas->codigo_CredPresupuestario;
			 			$cargosadm[$filas->codigo_Convocatoria] = $filas->codigo_adm;
			 		}
			 	}
		$cargo_funcional_Array = array(-1 => '-');
		foreach ($cargo_funcional->result() as $filas)
			 	{
			 		$cargo_funcional_Array[$filas->codigo_cf] = utf8_encode($filas->nombre_cf);

			 	}
		$cargosprofesion = array(-1 => '-');
		foreach ($profesion->result() as $filas)
			 	{
			 		$cargosprofesion[trim($filas->id)] = utf8_encode($filas->detalle);
			 	}
		$odeiarray = array(-1 => '-');
		$odeiccddarray = array(-1 => '-');
		$odeiccpparray = array(-1 => '-');
		$odeicodepe= array(-1 => '-');
		foreach ($odei->result() as $filas)
			 	{
			 		$odeiarray[$filas->ccdd.$filas->ccpp] =  strtoupper(utf8_encode($filas->deta_convo));
			 		$odeiccddarray[$filas->ccdd.$filas->ccpp] = $filas->ccdd;
			 		$odeiccpparray[$filas->ccdd.$filas->ccpp] = $filas->ccpp;
			 		$odeicodepe[$filas->ccdd.$filas->ccpp] = $filas->coddepe;
			 	}
		$odeiprovincia=array(-1 => '-');
		$odei_selected_provincia=array(-1 => '-');
		$uniArray = array(-1 => '-');
		$selected_universidades = (set_value('universidad')) ? set_value('universidad') : '' ;
		foreach ($universidad->result() as $filas){
			$uniArray[$filas->id_universidad] = utf8_encode($filas->detalle);
		}

		$paisarray= array(-1 => '-');
		$selected_paises = (set_value('pais')) ? set_value('pais') : '' ;
		foreach ($pais->result() as $filas) {
			# code...
			$paisarray[trim($filas->codigo)] = utf8_encode($filas->detalle);
		}

		$proyectosArray = array(-1 => '-');
		$selected_proyectos = (set_value('proyectos')) ? set_value('proyectos') : '' ;
		foreach ($proyectos->result() as $filas)
		{
			$proyectosArray[$filas->codigo_Proyectos] = utf8_encode($filas->DESC_PROYECTO);
		}
		$prov = array(-1 => '-');
		foreach ($provincia->result() as $filas)
			 	{
			 		//$prov[$filas->CCDD] = $filas->Nombre;
			 	}



		$distritos== array(-1 => '-');
		$distritossArray = array(-1 => '-');
		foreach ($distritos->result() as $filas)
			 	{
			 		//$distritossArray[$filas->CCDD] = utf8_encode($filas->Nombre);
			 	}

		$ocupaArray = array(-1 => '-');
		$selected_ocupaciones = (set_value('ocupacion')) ? set_value('ocupacion') : '' ;


		$projecArray = array(-1 => '-');
		$selected_proyectos_inei = (set_value('proyectos_inei')) ? set_value('proyectos_inei') : '' ;



		$odeiArray = array(-1 => '-' );
		$selected_odei = (set_value('departamento')) ? set_value('departamento') : '';


		$depaArray = array(-1 => '-');

		$selected_departamento2 = (set_value('departamento2')) ?  set_value('departamento2') : '';
		$selected_departamento3 = (set_value('departamento3')) ?  set_value('departamento3') : '';

		foreach($departamento->result() as $filas)
		{
			$depaArray[$filas->CCDD]=strtoupper($filas->Nombre);
		}

		$provArray = array(-1 => '-');
		$selected_provincia = (set_value('provincia')) ?  set_value('provincia') : '';
		$selected_provincia2 = (set_value('provincia2')) ?  set_value('provincia2') : '';
		$selected_provincia3 = (set_value('provincia3')) ?  set_value('provincia3') : '';

		$distArray = array(-1 => '-');
		$selected_distrito = (set_value('distrito')) ?  set_value('distrito') : '';
		$selected_distrito2 = (set_value('distrito2')) ?  set_value('distrito2') : '';
		$selected_distrito3 = (set_value('distrito3')) ?  set_value('distrito3') : '';

		$selected_sexo = (set_value('sexo')) ? set_value('sexo') : '' ;
		$selected_cargo = (set_value('cargo')) ? set_value('cargo') : '' ;
		$selected_estado_c = (set_value('estado_civil')) ? set_value('estado_civil') : '' ;
		$selected_t_via = (set_value('t_via')) ? set_value('t_via') : '' ;
		$selected_t_zona = (set_value('t_zona')) ? set_value('t_zona') : '' ;
		$selected_nivel_instruccion = (set_value('nivel_instruccion')) ? set_value('nivel_instruccion') : '' ;
		$selected_tipo_periodo = (set_value('tipo_periodo')) ? set_value('tipo_periodo') : '' ;
		$selected_declaracion = (set_value('declaracion')) ? set_value('declaracion') : '' ;
		$selected_disposicion = (set_value('disposicion')) ? set_value('disposicion') : '' ;
		$selected_grado_alcanzado = (set_value('grado_alcanzado')) ? set_value('grado_alcanzado') : '' ;
		$selected_participo = (set_value('participo')) ? set_value('participo') : '' ;
		$selected_cargos_inei = (set_value('cargos_inei')) ? set_value('cargos_inei') : '' ;
		$selected_ofimatica = (set_value('ofimatica')) ? set_value('ofimatica') : '' ;
		$selected_velocidadpc = (set_value('velocidadpc')) ? set_value('velocidadpc') : '' ;
		$selected_impedimento = (set_value('impedimento')) ? set_value('impedimento') : '' ;

$attr = array('class' => 'form-val','id' => 'conv_registro', 'style' => 'overflow: auto;');

echo form_open($this->uri->uri_string(),$attr);
echo '<div id="impresion">';
	echo '<div class="well modulo">';


	echo '<h5>1. Departamento y cargo al que postula</h5>';

		echo '<div class="row-fluid">';
			echo '<div class="span4">';
				echo '<div class="control-group">';
					echo form_label('Departamento', 'departamento', $label_class);
					echo '<div class="controls">';


						echo form_dropdown('departamento', $odeiarray, $selected_odei, 'class="' . $span_class . '" id="departamento" autocomplete="off"');
						echo form_dropdown('departamentoccdd', $odeiccddarray, $selected_cargo,'class="' . $span_class . '" id="departamentoccdd" style="display:none"');
						echo form_dropdown('departamentoccpp', $odeiccpparray, $selected_cargo,'class="' . $span_class . '" id="departamentoccpp" style="display:none" ');
						echo form_dropdown('departamentocoddepe', $odeicodepe, $selected_cargo,'class="' . $span_class . '" id="departamentocoddepe" style="display:none" ');

						echo '<span class="help-inline">*</span>';
						echo '<div class="help-block error">' . form_error('departamento') . '</div>';
					echo '</div>';
				echo '</div>';
			echo '</div>';

			echo '<div class="span4">';
				echo '<div class="control-group">';
					echo form_label('Provincia', 'provincia', $label_class);
					echo '<div class="controls">';
						echo form_dropdown('provincia_postu', $odeiprovincia, $odei_selected_provincia, 'class="' . $span_class . '" id="provincia_postu" autocomplete="off"');
						echo '<span class="help-inline">*</span>';
						echo '<div class="help-block error">' . form_error('provincia_postu') . '</div>';
					echo '</div>';
				echo '</div>';
			echo '</div>';

			echo '<div class="span4">';
				echo '<div class="control-group">';
					echo form_label('Cargo al que postula', 'cargo', $label_class);
					echo '<div class="controls">';
						echo form_dropdown('cargo', $cargosArray, $selected_cargo,'class="' . $span_class . '" id="cargo"');
						echo form_dropdown('cargo', $cargospresupuestario, $selected_cargo,'class="' . $span_class . '" id="cargo_presupuestal" style="display:none"');
						echo form_dropdown('cargo', $cargosadm, $selected_cargo,'class="' . $span_class . '" id="cargo_adm" style="display:none" ');
						echo '<span class="help-inline">*</span>';
						echo '<div class="help-block error">' . form_error('cargo') . '</div>';
					echo '</div>';
				echo '</div>';
			echo '</div>';

		echo '</div>';
	echo '</div>';


	echo '<div class="well modulo">';
		echo '<h5>2. Datos del Postulante</h5><p><b>(Escriba sus datos tal como figuran en su DNI)</b></p>';

		echo '<div class="row-fluid">';

			echo '<div class="span3">';
				echo '<div class="control-group">';
					 echo form_label('Ap. Paterno', $ap_paterno['id'], $label_class);
					 echo '<div class="controls">';
						echo form_input($ap_paterno);
						echo '<span class="help-inline">*</span>';
						echo '<div class="help-block error">' . form_error($ap_paterno['name']) . '</div>';
					echo '</div>';
				echo '</div>';
			echo '</div>';

			echo '<div class="span3">';
				echo '<div class="control-group">';
					 echo form_label('Ap. Materno', $ap_materno['id'], $label_class);
					 echo '<div class="controls">';
						echo form_input($ap_materno);
						echo '<span class="help-inline">*</span>';
						echo '<div class="help-block error">' . form_error($ap_materno['name']) . '</div>';

					 echo '</div>';
				echo '</div>';
			echo '</div>';

			echo '<div class="span2">';
				echo '<div class="control-group">';
					 echo form_label('Primer Nombre', $nombre1['id'], $label_class);
					 echo '<div class="controls">';
						echo form_input($nombre1);
						echo '<span class="help-inline">*</span>';
						echo '<div class="help-block error">' . form_error($nombre1['name']) . '</div>';
					 echo '</div>';
				echo '</div>';
			echo '</div>';

			echo '<div class="span2">';
				echo '<div class="control-group">';
					 echo form_label('Segundo Nombre', $nombre2['id'], $label_class);
					 echo '<div class="controls">';
						echo form_input($nombre2);

					 echo '</div>';
				echo '</div>';
			echo '</div>';

			echo '<div class="span2">';
				echo '<div class="control-group">';
					echo form_label('Sexo', 'sexo', $label_class);
					echo '<div class="controls">';
						echo form_dropdown('sexo', $sexo_c, $selected_sexo,'class="' . $span_class . '" id="sexo"');
						echo '<span class="help-inline">*</span>';
						echo '<div class="help-block error">' . form_error('sexo') . '</div>';

					echo '</div>';
				echo '</div>';
			echo '</div>';


		echo '</div>';


		echo '<div class="row-fluid">';

			echo '<div class="span2">';
				echo '<div class="control-group">';
					 echo form_label('Fecha de Nacimiento', $fecha_nac['id'], $label_class);
					 echo '<div class="controls">';
						echo '<input class="span10 sincursor" id="fecha_nac" name="fecha_nac" type="text" value="" readonly="readonly" >';
						echo '<span class="help-inline">*</span>';
						echo '<div class="help-block error">' . form_error($fecha_nac['name']) . '</div>';

					 echo '</div>';
				echo '</div>';
			echo '</div>';

			echo '<div class="span2">';
				echo '<div class="control-group">';
					echo form_label('Pais', 'pais', $label_class);
					echo '<div class="controls">';
						echo form_dropdown('pais', $paisarray, $selected_paises,'class="' . $span_class . '" id="pais"  autocomplete="off"');
						echo '<span class="help-inline">*</span>';
						echo '<div class="help-block error">' . form_error('pais') . '</div>';
					echo '</div>';
				echo '</div>';
			echo '</div>';

			echo '<div class="span2">';
				echo '<div class="control-group">';
					echo form_label('Dpto Nacimiento', 'departamento2', $label_class);
					echo '<div class="controls">';
						echo form_dropdown('departamento2', $depaArray, $selected_departamento2,'class="' . $span_class . '" id="departamento2"  autocomplete="off"');
						echo '<span class="help-inline">*</span>';
						echo '<div class="help-block error">' . form_error('departamento2') . '</div>';
					echo '</div>';
				echo '</div>';
			echo '</div>';

			echo '<div class="span2">';
				echo '<div class="control-group">';
					echo form_label('Provincia Nacimiento', 'provincia2', $label_class);
					echo '<div class="controls">';
						echo form_dropdown('provincia2',$prov, $selected_provincia2,'class="' . $span_class . '" id="provincia2"');
						echo '<span class="help-inline">*</span>';
						echo '<div class="help-block error">' . form_error('provincia2') . '</div>';
					echo '</div>';
				echo '</div>';
			echo '</div>';

			echo '<div class="span3">';
				echo '<div class="control-group">';
					echo form_label('Distrito Nacimiento', 'distrito2', $label_class);
					echo '<div class="controls">';

						echo form_dropdown('distrito2', $distritossArray, $selected_distrito2,'class="' . $span_class . '" id="distrito2"');
						echo '<span class="help-inline">*</span>';
						echo '<div class="help-block error">' . form_error('distrito2') . '</div>';

					echo '</div>';
				echo '</div>';
			echo '</div>';


		echo '</div>';


		echo '<div class="row-fluid">';

			echo '<div class="span3">';
				echo '<div class="control-group">';
					 echo form_label('DNI', $dni['id'], $label_class);
					 echo '<div class="controls">';
						echo form_input($dni);
						echo '<span class="help-inline">*</span>';
						echo '<div class="help-block error">' . form_error($dni['name']) . '</div>';
					 echo '</div>';
				echo '</div>';
			echo '</div>';

			echo '<div class="span3">';
				echo '<div class="control-group">';
					 echo form_label('Confirme DNI', $dni2['id'], $label_class);
					 echo '<div class="controls">';
						echo form_input($dni2);
						echo '<span class="help-inline">*</span>';
						echo '<div class="help-block error">' . form_error($dni2['name']) . '</div>';
					 echo '</div>';
				echo '</div>';
			echo '</div>';


			echo '<div class="span3">';
				echo '<div class="control-group">';
					 echo form_label('RUC', $ruc['id'], $label_class);
					 echo '<div class="controls">';
						echo form_input($ruc);
						echo '<span class="help-inline">*</span>';
						echo '<div class="help-block error">' . form_error($ruc['name']) . '</div>';

					 echo '</div>';
				echo '</div>';
			echo '</div>';

			echo '<div class="span3">';
				echo '<div class="control-group">';
					 echo form_label('Confirme RUC', $ruc2['id'], $label_class);
					 echo '<div class="controls">';
						echo form_input($ruc2);
						echo '<span class="help-inline">*</span>';
						echo '<div class="help-block error">' . form_error($ruc2['name']) . '</div>';


					 echo '</div>';
				echo '</div>';
			echo '</div>';

		echo '</div>';


		echo '<div class="row-fluid">';


			echo '<div class="span3">';
				echo '<div class="control-group">';
					echo form_label('Estado Civil', 'estado_civil', $label_class);
					echo '<div class="controls">';
						echo form_dropdown('estado_civil', $ecivil, $selected_estado_c,'class="' . $span_class . '" id="estado_civil"');
						echo '<span class="help-inline">*</span>';
						echo '<div class="help-block error">' . form_error('estado_civil') . '</div>';
					echo '</div>';
				echo '</div>';
			echo '</div>';

			echo '<div class="span3">';
				echo '<div class="control-group">';
					 echo form_label('Teléfono', $nro_tel['id'], $label_class);
					 echo '<div class="controls">';
						echo form_input($nro_tel);

						echo '<div class="help-block error" >' . form_error($nro_tel['name']) . '</div>';

					 echo '</div>';
				echo '</div>';
			echo '</div>';


			echo '<div class="span3">';
				echo '<div class="control-group">';
					 echo form_label('Celular', $nro_cel['id'], $label_class);
					 echo '<div class="controls">';
						echo form_input($nro_cel);

						echo '<div class="help-block error">' . form_error($nro_cel['name']) . '</div>';

					 echo '</div>';
				echo '</div>';
			echo '</div>';


			echo '<div class="span3">';
				echo '<div class="control-group">';
					 echo form_label('Correo Electrónico', $email['id'], $label_class);
					 echo '<div class="controls">';
						echo form_input($email);
						echo '<span class="help-inline">*</span>';
						echo '<div class="help-block error">' . form_error($email['name']) . '</div>';

					 echo '</div>';
				echo '</div>';
			echo '</div>';

		echo '</div>';

	echo '</div>';





	echo '<div class="well modulo">';
	echo '<h5>3. Domicilio del Postulante</h5>';

		echo '<div class="row-fluid">';


			echo '<div class="span3">';
				echo '<div class="control-group">';
					echo form_label('Tipo de Vía', 't_via', $label_class);
					echo '<div class="controls">';
						echo form_dropdown('t_via',$tvia, $selected_t_via,'class="' . $span_class . '" id="t_via"');
						echo '<span class="help-inline">*</span>';
						echo '<div class="help-block error">' . form_error('t_via') . '</div>';
					echo '</div>';
				echo '</div>';
			echo '</div>';

			echo '<div class="span3">';
				echo '<div class="control-group">';
					 echo form_label('Nombre de Vía', $nombre_via['id'], $label_class);
					 echo '<div class="controls">';
						echo form_input($nombre_via);
						echo '<span class="help-inline">*</span>';
						echo '<div class="help-block error">' . form_error($nombre_via['name']) . '</div>';
					 echo '</div>';
				echo '</div>';
			echo '</div>';


			echo '<div class="span1">';
				echo '<div class="control-group">';
					 echo form_label('Nro', $nro['id'], $label_class);
					 echo '<div class="controls">';
						echo form_input($nro);

						echo '<div class="help-block error">' . form_error($nro['name']) . '</div>';
					 echo '</div>';
				echo '</div>';
			echo '</div>';

			echo '<div class="span1">';
				echo '<div class="control-group">';
					 echo form_label('KM', $km['id'], $label_class);
					 echo '<div class="controls">';
						echo form_input($km);

						echo '<div class="help-block error">' . form_error($km['name']) . '</div>';
					 echo '</div>';
				echo '</div>';
			echo '</div>';

			echo '<div class="span1">';
				echo '<div class="control-group">';
					 echo form_label('MZ', $mz['id'], $label_class);
					 echo '<div class="controls">';
						echo form_input($mz);

						echo '<div class="help-block error">' . form_error($mz['name']) . '</div>';
					 echo '</div>';
				echo '</div>';
			echo '</div>';

			echo '<div class="span1">';
				echo '<div class="control-group">';
					 echo form_label('interior', $interior['id'], $label_class);
					 echo '<div class="controls">';
						echo form_input($interior);

						echo '<div class="help-block error">' . form_error($interior['name']) . '</div>';
					 echo '</div>';
				echo '</div>';
			echo '</div>';

			echo '<div class="span1">';
				echo '<div class="control-group">';
					 echo form_label('dpto.', $dpto['id'], $label_class);
					 echo '<div class="controls">';
						echo form_input($dpto);

						echo '<div class="help-block error">' . form_error($dpto['name']) . '</div>';
					 echo '</div>';
				echo '</div>';
			echo '</div>';

		echo '</div>';



		echo '<div class="row-fluid">';

			echo '<div class="span1">';
				echo '<div class="control-group">';
					 echo form_label('Lote', $lote['id'], $label_class);
					 echo '<div class="controls">';
						echo form_input($lote);

						echo '<div class="help-block error">' . form_error($lote['name']) . '</div>';
					 echo '</div>';
				echo '</div>';
			echo '</div>';

			echo '<div class="span1">';
				echo '<div class="control-group">';
					 echo form_label('Piso', $piso['id'], $label_class);
					 echo '<div class="controls">';
						echo form_input($piso);

						echo '<div class="help-block error">' . form_error($piso['name']) . '</div>';
					 echo '</div>';
				echo '</div>';
			echo '</div>';

			echo '<div class="span3">';
				echo '<div class="control-group">';
					echo form_label('Tipo de Zona', 't_zona', $label_class);
					echo '<div class="controls">';
						echo form_dropdown('t_zona', $tzona, $selected_t_zona,'class="' . $span_class . '" id="t_zona"');
						echo '<span class="help-inline">*</span>';
						echo '<div class="help-block error">' . form_error('t_zona') . '</div>';

					echo '</div>';
				echo '</div>';
			echo '</div>';

			echo '<div class="span3">';
				echo '<div class="control-group">';
					 echo form_label('Nombre de Zona', $nombre_zona['id'], $label_class);
					 echo '<div class="controls">';
						echo form_input($nombre_zona);
						echo '<span class="help-inline">*</span>';
						echo '<div class="help-block error">' . form_error($nombre_zona['name']) . '</div>';

					 echo '</div>';
				echo '</div>';
			echo '</div>';

		echo '</div>';


		echo '<div class="row-fluid">';

			echo '<div class="span4">';
				echo '<div class="control-group">';
					echo form_label('Departamento Domicilio', 'departamento3', $label_class);
					echo '<div class="controls">';
						echo form_dropdown('departamento3', $depaArray, $selected_departamento3,'class="' . $span_class . '" id="departamento3" autocomplete="off"');
						echo '<span class="help-inline">*</span>';
						echo '<div class="help-block error">' . form_error('departamento3') . '</div>';

					echo '</div>';
				echo '</div>';
			echo '</div>';

			echo '<div class="span4">';
				echo '<div class="control-group">';
					echo form_label('Provincia Domicilio', 'provincia3', $label_class);
					echo '<div class="controls">';
						echo form_dropdown('provincia3', $prov, $selected_provincia3,'class="' . $span_class . '" id="provincia3"');
						echo '<span class="help-inline">*</span>';
						echo '<div class="help-block error">' . form_error('provincia3') . '</div>';

					echo '</div>';
				echo '</div>';
			echo '</div>';

			echo '<div class="span4">';
				echo '<div class="control-group">';
					echo form_label('Distrito Domicilio', 'distrito3', $label_class);
					echo '<div class="controls">';
						echo form_dropdown('distrito3', $distritossArray, $selected_distrito3,'class="' . $span_class . '" id="distrito3"');
						echo '<span class="help-inline">*</span>';
						echo '<div class="help-block error">' . form_error('distrito3') . '</div>';

					echo '</div>';
				echo '</div>';
			echo '</div>';

		echo '</div>';
	echo '</div>';



	echo '<div class="well modulo">';
	echo '<h5>4. Perfil del Postulante</h5> <p><b>(Si Ud. es seleccionado, se le solicitará que los datos que consigne a continuación sean respaldados con algún documento. Si no presenta los documentos será descalificado automáticamente.)</b></p>';

		echo '<div class="row-fluid">';

			echo '<div class="span3">';
				echo '<div class="control-group">';
					echo form_label('Nivel de Instrucción', 'nivel_instruccion', $label_class);
					echo '<div class="controls">';
						echo form_dropdown('nivel_instruccion', $nivel, $selected_nivel_instruccion,'class="' . $span_class . '" id="nivel_instruccion"');
						echo '<span class="help-inline">*</span>';
						echo '<div class="help-block error">' . form_error('nivel_instruccion') . '</div>';

					echo '</div>';
				echo '</div>';
			echo '</div>';



			echo '<div class="span3">';
				echo '<div class="control-group">';
					echo form_label('Grado Alcanzado', 'grado_alcanzado', $label_class);
					echo '<div class="controls">';
						echo form_dropdown('grado_alcanzado', $grado, $selected_grado_alcanzado,'class="' . $span_class . '" id="grado_alcanzado"');
						echo '<span class="help-inline">*</span>';
						echo '<div class="help-block error">' . form_error('grado_alcanzado') . '</div>';
					echo '</div>';
				echo '</div>';
			echo '</div>';

			echo '<div class="span3">';
				echo '<div class="control-group">';
					echo form_label('Periodo Alcanzado', $periodo_alcanzado['id'], $label_class);
					echo '<div class="controls">';
						echo form_input($periodo_alcanzado);
						echo '<span class="help-inline">*</span>';
						echo '<div class="help-block error">' . form_error('periodo_alcanzado') . '</div>';
					echo '</div>';
				echo '</div>';
			echo '</div>';

			echo '<div class="span3">';
				echo '<div class="control-group">';
					echo form_label('Tipo de Periodo', 'tipo_periodo', $label_class);
					echo '<div class="controls">';
						echo form_dropdown('tipo_periodo', $periodo, $selected_tipo_periodo,'class="' . $span_class . '" id="tipo_periodo"');
						echo '<span class="help-inline">*</span>';
						echo '<div class="help-block error">' . form_error('tipo_periodo') . '</div>';
					echo '</div>';
				echo '</div>';
			echo '</div>';

		echo '</div>';

		echo '<div class="row-fluid">';

			echo '<div class="span3">';
				echo '<div class="control-group">';
					 echo form_label('Fecha de Expedición', $fecha_exp['id'], $label_class);
					 echo '<div class="controls">';
						echo '<input class="span10 sincursor" id="fecha_exp" name="fecha_exp" type="text" value="" readonly="readonly" disabled="disabled" >';
						echo '<span class="help-inline">*</span>';
						echo '<div class="help-block error">' . form_error($fecha_exp['name']) . '</div>';

					 echo '</div>';
				echo '</div>';
			echo '</div>';

			echo '<div class="span3">';
				echo '<div class="control-group">';
					echo form_label('N° Registro', 'registro', $label_class);
					echo '<div class="controls">';
						echo form_input($n_registro);
						echo '<span class="help-inline">*</span>';
						echo '<div class="help-block error">' . form_error('registro') . '</div>';
					echo '</div>';
				echo '</div>';
			echo '</div>';

		echo '</div>';

		echo '<div class="row-fluid">';

			echo '<div class="span5">';
				echo '<div class="control-group">';
					echo form_label('Profesión', 'ocupacion', $label_class);
					echo '<div class="controls">';
						echo form_dropdown('ocupacion', $cargosprofesion, $selected_ocupaciones,'class="' . $span_class . '" id="ocupacion"');
						echo '<span class="help-inline">*</span>';
						echo '<div class="help-block error">' . form_error('ocupacion') . '</div>';
					echo '</div>';
				echo '</div>';
			echo '</div>';

			echo '<div class="span4">';
				echo '<div class="control-group">';
					echo form_label('Universidad', 'universidad', $label_class);
					echo '<div class="controls">';
						echo form_dropdown('universidad', $uniArray, $selected_universidades,'class="' . $span_class . '" id="universidad" disabled="disabled"');
						echo '<span class="help-inline">*</span>';
						echo '<div class="help-block error">' . form_error('universidad') . '</div>';

					echo '</div>';
				echo '</div>';
			echo '</div>';

			echo '<div class="span3">';

				echo '<div class="control-group">';
					echo form_label('Nombre de Centro de Estudios', $centro_estudios['id'], $label_class);
					echo '<div class="controls">';
						echo form_input($centro_estudios);
						echo '<span class="help-inline">*</span>';
						echo '<div class="help-block error">' . form_error($centro_estudios['name']) . '</div>';
					echo '</div>';
				echo '</div>';

			echo '</div>';

		echo '</div>';
	echo '</div>';



	echo '<div class="well modulo">';

		echo '<div class="row-fluid">';
			echo '<div class="span12" >';

				echo '<div class="row-fluid">';

					echo '<div class="span6">';
						echo '<div class="span8">';
							echo '<h5> EXPERIENCIA </h5>';
						echo '</div>';
						echo '<div class="span2">';
							echo '<h5> AÑOS </h5>';
						echo '</div>';
						echo '<div class="span2">';
							echo '<h5> MESES </h5>';
						echo '</div>';
					echo '</div>';

					echo '<div class="span6">';
						echo '<div class="span8">';
							echo '<h5> PROYECTOS EN EL INEI </h5>';

						echo '</div>';

					echo '</div>';

				echo '</div>';


				echo '<div class="row-fluid">';

					echo '<div class="span6">';
						echo '<div class="span8">';
						echo '<p> Años o meses de experiencia en actividades generales  </p>';

						echo '</div>';
						echo '<div class="span2">';
							echo '<div class="control-group">';
								echo '<div class="controls">';
									echo form_input($expe_gen_a);
									echo '<span class="help-inline"></span>';
								echo '</div>';
							echo '</div>';
						echo '</div>';
						echo '<div class="span2">';
							echo '<div class="control-group">';
								echo '<div class="controls">';
									echo form_input($expe_gen_m);
									echo '<span class="help-inline"></span>';
								echo '</div>';
							echo '</div>';
						echo '</div>';
					echo '</div>';

					echo '<div class="span6">';
						echo '<div class="span6">';
							echo '<p>¿Ha laborado en el INEI?</p>';
						echo '</div>';
						echo '<div class="span2">';
							echo '<div class="controls">';
								echo form_dropdown('participo', $condicional, $selected_participo,'class="' . $span_class . '" id="participo"');
								echo '<span class="help-inline">*</span>';
								echo '<div class="help-block error">' . form_error('ocupacion') . '</div>';
							echo '</div>';
						echo '</div>';
					echo '</div>';

				echo '</div>';



				echo '<div class="row-fluid">';

					echo '<div class="span6">';
						echo '<div class="span8">';
							echo '<p>Años o meses de experiencia en trabajos de campo (censos/encuestas)</p> ';
						echo '</div>';
						echo '<div class="span2">';
							echo '<div class="control-group">';
								echo '<div class="controls">';
									echo form_input($expe_trab_a);
									echo '<span class="help-inline"></span>';
								echo '</div>';
							echo '</div>';
						echo '</div>';
						echo '<div class="span2">';
							echo '<div class="control-group">';
								echo '<div class="controls">';
									echo form_input($expe_trab_m);
									echo '<span class="help-inline"></span>';
								echo '</div>';
							echo '</div>';
						echo '</div>';
					echo '</div>';

					echo '<div class="span6">';
						echo '<div class="span6">';
							echo '<p>Último proyecto que participó en el INEI</p>';
						echo '</div>';
						echo '<div class="span6">';
							echo '<div class="control-group">';
								echo '<div class="controls">';
									echo form_dropdown('proyectos_inei', $proyectosArray, $selected_proyectos,'class="' . $span_class . '" id="proyectos_inei" disabled="disabled"');
								echo '</div>';
							echo '</div>';
						echo '</div>';
					echo '</div>';
				echo '</div>';



				echo '<div class="row-fluid">';

					echo '<div class="span6">';
						echo '<div class="span8">';
							echo '<p>Años o meses de experiencia en manejo de grupos </p>';
						echo '</div>';
						echo '<div class="span2">';
							echo '<div class="control-group">';
								echo '<div class="controls">';
									echo form_input($expe_manejo_a);
									echo '<span class="help-inline"></span>';
								echo '</div>';
							echo '</div>';
						echo '</div>';
						echo '<div class="span2">';
							echo '<div class="control-group">';
								echo '<div class="controls">';
									echo form_input($expe_manejo_m);
									echo '<span class="help-inline"></span>';
								echo '</div>';
							echo '</div>';
						echo '</div>';
					echo '</div>';

					echo '<div class="span6">';
						echo '<div class="span6">';
							echo '<p>Último año que participó en el INEI</p>';
						echo '</div>';
						echo '<div class="span2">';
							echo '<div class="control-group">';
								echo '<div class="controls">';
									echo form_input($ultimo_ano,'','disabled="disabled"');
									echo '<span class="help-inline"></span>';
								echo '</div>';
							echo '</div>';
						echo '</div>';
					echo '</div>';

				echo '</div>';

				echo '<div class="row-fluid">';

					echo '<div class="span6">';
						echo '<div class="span6">';
							echo '<p>Conocimiento de Ofimática</p>';
						echo '</div>';
						echo '<div class="span4 offset2">';
							echo '<div class="controls">';
								echo form_dropdown('ofimatica', $condicional, $selected_ofimatica,'class="' . $span_class . '" id="ofimatica"');
								echo '<span class="help-inline">*</span>';
								echo '<div class="help-block error">' . form_error('ofimatica') . '</div>';
							echo '</div>';
						echo '</div>';
					echo '</div>';

					echo '<div class="span6">';
						echo '<div class="span6">';
							echo '<p>Último cargo en el INEI</p>';
						echo '</div>';
						echo '<div class="span6">';
							echo '<div class="control-group">';
								echo '<div class="controls">';
									echo form_dropdown('ultimo_cargo', $cargo_funcional_Array, $selected_cargo,'class="' . $span_class . '" id="ultimo_cargo" disabled="disabled"');
									echo '<span class="help-inline">*</span>';
									echo '<div class="help-block error">' . form_error('ultimo_cargo') . '</div>';
								echo '</div>';
							echo '</div>';
						echo '</div>';
					echo '</div>';


				echo '</div>';

				echo '<div class="row-fluid">';
					echo '<div class="span6">';
						echo '<div class="span6">';
							echo '<p>Velocidad al digitar en una PC</p>';
						echo '</div>';
						echo '<div class="span4 offset2">';
							echo '<div class="controls">';
								echo form_dropdown('velocidadpc', $condicional, $selected_velocidadpc,'class="' . $span_class . '" id="velocidadpc"');
								echo '<span class="help-inline">*</span>';
								echo '<div class="help-block error">' . form_error('velocidadpc') . '</div>';
							echo '</div>';
						echo '</div>';
					echo '</div>';
				echo '</div>';

			echo '</div>';
		echo '</div>';
	echo '</div>';





	echo '<div class="well modulo">';

		echo '<div class="row-fluid">';
			echo '<div class="span5">';
					echo '<h5>OTROS ASPECTOS</h5>';
			echo '</div>';
		echo '</div>';

		echo '<div class="row-fluid">';

			echo '<div class="span5">';
					echo '<p>Tiene algún impedimento para trabajar en el INEI</p>';
			echo '</div>';

			echo '<div class="span5">';
				echo '<div class="control-group">';
					echo form_dropdown('impedimento', $condicional, $selected_impedimento,'class="' . $span_class . '" id="impedimento"');
					echo '<span class="help-inline">*</span>';
					echo '<div class="help-block error">' . form_error('impedimento') . '</div>';
				echo '</div>';
			echo '</div>';

		echo '</div>';

		echo '<div class="row-fluid">';

			echo '<div class="span5">';
					echo '<p>Disposicion para trabajar tiempo completo</p>';
			echo '</div>';

			echo '<div class="span5">';
				echo '<div class="control-group">';
					echo form_dropdown('disposicion', $condicional, $selected_disposicion,'class="' . $span_class . '" id="disposicion"');
					echo '<span class="help-inline">*</span>';
					echo '<div class="help-block error">' . form_error('disposicion') . '</div>';
				echo '</div>';
			echo '</div>';

		echo '</div>';
	echo '</div>';


	echo '<div class="well modulo">';

		echo '<div class="row-fluid">';
			echo '<div class="span5">';
					echo '<h5>DECLARACION DE VERACIDAD DE DATOS</h5>';
			echo '</div>';
		echo '</div>';

		echo '<div class="row-fluid">';
			echo '<div class="span10">';
					echo '<p>Declaro bajo juramento que los datos consignados en la presente ficha de inscripción, corresponden a la verdad; los mismos que podrán ser verificados con los documentos sustentatorios de mi Curriculum Vitae, conforme presente a la institución.</p>';
			echo '</div>';

			echo '<div class="span2">';
				echo '<div class="control-group">';
					echo form_dropdown('declaracion', $declaracion, $selected_declaracion,'class="' . $span_class . '" id="declaracion"');
					echo '<span class="help-inline">*</span>';
					echo '<div class="help-block error">' . form_error('declaracion') . '</div>';
				echo '</div>';
			echo '</div>';
		echo '</div>';

	echo '</div>';
 echo '</div>'
?>
<div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3 id="myModalLabel">Registro satisfactorio</h3>
  </div>
  <div class="modal-body">
            <div class="span3">
              <div class="control-group">
              </div>
            </div>
            <div class="span10">
              <p>Muchas gracias por partipar. Entregar el Cv documentado a la siguiente dirección : </p>
              <div id='id_direccion' class="span10">
              </div>
            </div>
  </div>
  <div class="modal-footer">
  </div>
</div>

<?

echo form_submit('send', 'Inscripción','class="btn btn-inverse pull-right"');

?>

<a onClick="window.print()" id="impre_buton" class="btn btn-info"  style="float: right; margin-right: 20px;" rel="popover" data-content="It's so simple to create a tooltop for my website!" data-original-title="Twitter Bootstrap Popover" ><i class="icon-white icon-print"></i> Imprimir ficha</a>

<?
echo form_fieldset_close();
echo form_close();

 ?>