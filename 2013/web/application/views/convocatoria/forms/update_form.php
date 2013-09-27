<?php

$this->load->library('tank_auth');
$this->lang->load('tank_auth');

if (!$this->tank_auth->is_logged_in()) {

			redirect();
}

$tipo_user=0;
$roles = $this->tank_auth->get_roles();
$flag = FALSE;
foreach ($roles as $role) {
		if($role->role_id == 1 && $role->rolename == 'Convocatoria'){
				$tipo_user=1;
				break;
		}
}


$label_class =  array('class' => 'control-label');
$span_class =  'span10';
$span_class2 =  'span10';


//$grado= array('-1' => '-' );


$dni =array(
	'name'	=> 'dni',
	'id'	=> 'dni',
	'value'	=> set_value('dni'),
	'maxlength'	=> 8,
	'readonly'=> 'readonly',
	'class' => $span_class,
);


		$cargosArray = array(-1 => '-');
		$cargosadm=array(-1 => '-');
		$cargospresupuestario=array(-1 => '-');
		foreach ($cargos->result() as $filas)
			 	{
			 		$cargosArray[$filas->codigo_Convocatoria] = utf8_encode($filas->CargoFunciona);
			 		$cargospresupuestario[$filas->codigo_Convocatoria] = $filas->codigo_CredPresupuestario;
			 		$cargosadm[$filas->codigo_Convocatoria] = $filas->codigo_adm;
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
			 		$odeiarray[trim($filas->ccdd.$filas->ccpp)] =  strtoupper(utf8_encode($filas->deta_convo));
			 		$odeiccddarray[trim($filas->ccdd.$filas->ccpp)] = $filas->ccdd;
			 		$odeiccpparray[trim($filas->ccdd.$filas->ccpp)] = $filas->ccpp;
			 		$odeicodepe[trim($filas->ccdd.$filas->ccpp)] = $filas->coddepe;
			 	}

		$uniArray = array(-1 => '-');

		foreach ($universidad->result() as $filas)
		{
			$uniArray[$filas->id_universidad] = utf8_encode($filas->detalle);
		}

		$proyectosArray = array(-1 => '-');

		foreach ($proyectos->result() as $filas)
		{
			$proyectosArray[$filas->codigo_Proyectos] = utf8_encode($filas->DESC_PROYECTO);
		}

		$ocupaArray = array(-1 => '-');
		$selected_ocupaciones = (set_value('ocupacion')) ? set_value('ocupacion') : '' ;


		$projecArray = array(-1 => '-');
		$selected_proyectos_inei = (set_value('proyectos_inei')) ? set_value('proyectos_inei') : '' ;



		$odeiArray = array(-1 => '-' );



		$depaArray = array(-1 => '-');




		foreach($departamento->result() as $filas)
		{
			$depaArray[$filas->CCDD]=strtoupper($filas->Nombre);
		}

		$provArray = array(-1 => '-');
		$selected_provincia = (set_value('provincia')) ?  set_value('provincia') : '';


		$distArray = array(-1 => '-');
		$selected_distrito = (set_value('distrito')) ?  set_value('distrito') : '';

		$paisarray= array(-1 => '-');
		//$selected_paises = (set_value('pais')) ? set_value('pais') : '' ;
		foreach ($pais->result() as $filas) {
			# code...
			$paisarray[trim($filas->codigo)] = utf8_encode($filas->detalle);
		}

$attr = array('class' => 'form-val','id' => 'conv_update', 'style' => 'overflow: auto;');

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
						echo form_dropdown('departamentoccdd', $odeiccddarray, $selected_odei,'class="' . $span_class . '" id="departamentoccdd" style="display:none"');
						echo form_dropdown('departamentoccpp', $odeiccpparray,$selected_odei,'class="' . $span_class . '" id="departamentoccpp" style="display:none" ');
						echo form_dropdown('departamentocoddepe', $odeicodepe, $selected_odei,'class="' . $span_class . '" id="departamentocoddepe" style="display:none" ');

						echo '<span class="help-inline">*</span>';
						echo '<div class="help-block error"></div>';
					echo '</div>';
				echo '</div>';
			echo '</div>';

			echo '<div class="span4">';
				echo '<div class="control-group">';
					echo form_label('Provincia', 'provincia', $label_class);
					echo '<div class="controls">';
						echo form_dropdown('provincia_postu', $odeiprovincia, $odei_selected_provincia, 'class="' . $span_class . '" id="provincia_postu" autocomplete="off"');
						echo '<span class="help-inline">*</span>';
						echo '<div class="help-block error"></div>';
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
						echo form_input($fecha_nac);
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

						echo form_dropdown('distrito2', $distritossArray2, $selected_distrito2,'class="' . $span_class . '" id="distrito2"');
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
						echo form_dropdown('provincia3', $prov3, $selected_provincia3,'class="' . $span_class . '" id="provincia3"');
						echo '<span class="help-inline">*</span>';
						echo '<div class="help-block error">' . form_error('provincia3') . '</div>';

					echo '</div>';
				echo '</div>';
			echo '</div>';

			echo '<div class="span4">';
				echo '<div class="control-group">';
					echo form_label('Distrito Domicilio', 'distrito3', $label_class);
					echo '<div class="controls">';
						echo form_dropdown('distrito3', $distritossArray3, $selected_distrito3,'class="' . $span_class . '" id="distrito3"');
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
							echo form_input($fecha_exp);
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
						echo form_dropdown('ocupacion', $cargosprofesion, $selecteprofesion,'class="' . $span_class . '" id="ocupacion"');
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
									echo form_dropdown('ultimo_cargo', $cargo_funcional_Array, $ultimo_selected_cargo,'class="' . $span_class . '" id="ultimo_cargo" disabled="disabled"');
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
              <p>Se actualizó correctamente </p>
              <div id='id_direccion' class="span10">
              </div>
            </div>
  </div>
  <div class="modal-footer">
  </div>
</div>

<?
echo form_submit('send', 'Actualizar','class="btn btn-inverse pull-right"');
if ($tipo_user==1) {
	# code...
	?>
		<a href="#" id="eliminar" class="btn btn-danger" style="float: right; margin-right: 20px;"><i class="icon-white icon-remove"></i> Eliminar </a>
	<?
}
?>


<?
echo form_fieldset_close();
echo form_close();

 ?>