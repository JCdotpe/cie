<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mantenimiento extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->library('security');
		$this->load->library('tank_auth');
		$this->lang->load('tank_auth');
		$this->load->model('regs_model');
		$this->load->model('convocatoria/Profesion_model');
		$this->load->model('convocatoria/Dpto_model');
		$this->load->model('convocatoria/Dist_model');
		$this->load->model('convocatoria/Provincia_model');
		$this->load->model('convocatoria/Cargo_funcional_model');
		$this->load->model('convocatoria/Universidad_model');
		$this->load->model('convocatoria/Cargo_funcional_vista');
		$this->load->model('convocatoria/Odei_model');
		$this->load->model('convocatoria/Proyectos_model');
		$this->load->model('convocatoria/Pais_model');
	}


	public function index(){
			$data['nav'] = TRUE;
			$data['title'] = 'Convocatoria - Módulo de Consulta';
			$data['recaptcha_html'] = $this->_create_recaptcha();
			$data['errors'] = array();
			$this->form_validation->set_rules('dni','DNI','required|xss_clean');

			if($this->form_validation->run() === TRUE){
				$dni = $this->input->post('dni');
				$res = $this->regs_model->consulta_dni_mantenimiento($dni);
				$data['departamento']=$this->Dpto_model->get_dpto();
				$data['registro']= $this->regs_model->consulta_dni_mantenimiento($dni);
				$data['sexo_c'] = $this->config->item('c_sexo');
				$data['ecivil'] = $this->config->item('c_ecivil');
				$data['nivel'] = $this->config->item('c_nivel');
				$data['grado']= $this->config->item('c_grado');
				$data['tvia'] = $this->config->item('c_tvia');
				$data['tzona'] = $this->config->item('c_tzona');
				$data['cargos_c']= $this->config->item('c_cargos');

				$data['declaracion'] = $this->config->item('c_sino');
				$data['condicional'] = $this->config->item('c_sino');
				$data['periodo'] = $this->config->item('c_periodo');



				$data['cargos']=$this->Cargo_funcional_vista->Get_Cargo_vista();
				$data['cargo_funcional']=$this->Cargo_funcional_model->Get_Cargo();
				$data['proyectos'] = $this->Proyectos_model->Get_Proyectos();
				$data['distritos']=$this->Dist_model->Get_Dist();
				$data['universidad']=$this->Universidad_model->Get_Universidad();
				$data['odei']=$this->Odei_model->Get_Odei();

				$data['provincia']= $this->Provincia_model->Get_Provincia();
				$data['profesion']= $this->Profesion_model->Get_Profesion();
				$data['pais']=$this->Pais_model->Get_Pais();

				$data['option'] = 1;
				if($res->num_rows() > 0){

					foreach($res->result() as $filas)
					{

						$odei=(strlen(trim($filas->cod_dep))==1) ? "0".trim($filas->cod_dep) : trim($filas->cod_dep);
						$cod_prov=(strlen(trim($filas->cod_prov))==1) ? "0".trim($filas->cod_prov) : trim($filas->cod_prov);

						if ($odei=="02" &&  ($cod_prov=="08" || $cod_prov=="11" || $cod_prov=="15" || $cod_prov=="18")){
							# code...
							$cod_prov="08";
						}elseif ($odei=="22" &&  ($cod_prov=="02" || $cod_prov=="04" || $cod_prov=="06" || $cod_prov=="07" || $cod_prov=="09" || $cod_prov=="10")) {
							# code...
							$cod_prov="09";
						}else{
							$cod_prov="01";
						}

						$odei.=$cod_prov;

						$data['selected_odei']['value']=$odei;
						$data['selected_cargo']['value']= trim($filas->cargo);

						$data['ap_paterno']['name']= 'ap_paterno';
						$data['ap_paterno']['id']= 'ap_paterno';
						$data['ap_paterno']['maxlength']= 40;
						$data['ap_paterno']['value']= utf8_encode($filas->ap_paterno);


						$data['ap_materno']['name']= 'ap_materno';
						$data['ap_materno']['id']= 'ap_materno';
						$data['ap_materno']['maxlength']= 40;
						$data['ap_materno']['value']= utf8_encode($filas->ap_materno);

						$data['nombre1']['name']= 'nombre1';
						$data['nombre1']['id']= 'nombre1';
						$data['nombre1']['maxlength']= 40;
						$data['nombre1']['value']= utf8_encode($filas->nombre1);
						$data['nombre1']['class']= 'span10';

						$data['nombre2']['name']= 'nombre2';
						$data['nombre2']['id']= 'nombre2';
						$data['nombre2']['value']= utf8_encode($filas->nombre2);
						$data['nombre2']['class']= 'span10';

						$data['dni2']['name']= 'dni2';
						$data['dni2']['id']= 'dni2';
						$data['dni2']['value']= $filas->dni;
						$data['dni2']['maxlength']= 8;
						$data['dni2']['readonly']= 'readonly';
						$data['dni2']['class']= 'span10';

						$data['selected_sexo']['value']= $filas->sexo;

						$data['fecha_nac']['name']= 'fecha_nac';
						$data['fecha_nac']['id']= 'fecha_nac';
						$data['fecha_nac']['class']= 'span10 sincursor';
						$data['fecha_nac']['type']= 'text';
						$data['fecha_nac']['readonly']= 'readonly';

						$data['fecha_nac']['value']= substr(trim($filas->fecha_nac), 8,2)."-".substr(trim($filas->fecha_nac), 5,2)."-".substr(trim($filas->fecha_nac), 0,4);

						$data['fecha_exp']['name']= 'fecha_exp';
						$data['fecha_exp']['id']= 'fecha_exp';
						$data['fecha_exp']['class']= 'span10 sincursor';
						$data['fecha_exp']['type']= 'text';
						$data['fecha_exp']['readonly']= 'readonly';
						if ($filas->fecha_exp<>'') {
							# code...
							$data['fecha_exp']['value']= substr(trim($filas->fecha_exp), 8,2)."-".substr(trim($filas->fecha_exp), 5,2)."-".substr(trim($filas->fecha_exp), 0,4);
						}



						$data['selected_departamento2']['value']= trim($filas->cod_dep_nac);
						$data['selected_provincia2']['value']= $filas->cod_prov_nac;
						$retVal = (strlen(trim($filas->cod_prov_nac))==1) ? "0".$filas->cod_prov_nac : $filas->cod_prov_nac ;
						$data['prov']['value']= array(
													  trim($retVal)   => utf8_encode($filas->nom_prov_nac)
													);
						$data['selected_distrito2']['value']= $filas->cod_dist_nac;
						$distindice = (strlen(trim($filas->cod_dist_nac))==1) ? "0".$filas->cod_dist_nac : $filas->cod_dist_nac ;
						$data['distritossArray2']['value']= array(
													  trim($distindice)   => utf8_encode($filas->nom_dist_nac)
													);

						$data['ruc']['name']= 'ruc';
						$data['ruc']['id']= 'ruc';
						$data['ruc']['maxlength']= 11;
						$data['ruc']['value']= $filas->ruc;
						$data['ruc']['class']= 'span10';


						$data['n_registro']['name']= 'n_registro';
						$data['n_registro']['id']= 'n_registro';
						$data['n_registro']['maxlength']= 25;
						$data['n_registro']['value']= trim(utf8_encode($filas->n_registro));
						$data['n_registro']['class']= 'span10';

						$data['ruc2']['name']= 'ruc2';
						$data['ruc2']['id']= 'ruc2';
						$data['ruc2']['maxlength']= 11;
						$data['ruc2']['value']= $filas->ruc;
						$data['ruc2']['class']= 'span10';

						$data['selected_estado_c']['value']= $filas->estado_civil;

						$data['nro_tel']['name']= 'nro_tel';
						$data['nro_tel']['id']= 'nro_tel';
						$data['nro_tel']['maxlength']= 9;
						$data['nro_tel']['value']= $filas->nro_tel;
						$data['nro_tel']['class']= 'span10';

						$data['nro_cel']['name']= 'nro_cel';
						$data['nro_cel']['id']= 'nro_cel';
						$data['nro_cel']['maxlength']= 12;
						$data['nro_cel']['value']= $filas->nro_cel;
						$data['nro_cel']['class']= 'span10';

						$data['email']['name']= 'email';
						$data['email']['id']= 'email';
						$data['email']['maxlength']= 50;
						$data['email']['value']= $filas->email;
						$data['email']['class']= 'span10';

						$data['selected_t_via']['value'] = (strlen($filas->t_via)==1) ? "0".trim($filas->t_via) : trim($filas->t_via);

						$data['nombre_via']['name']= 'nombre_via';
						$data['nombre_via']['id']= 'nombre_via';
						$data['nombre_via']['maxlength']= 80;
						$data['nombre_via']['value']= utf8_encode($filas->nombre_via);
						$data['nombre_via']['class']= 'span10';

						$data['nro']['name']= 'nro';
						$data['nro']['id']= 'nro';
						$data['nro']['maxlength']= 6;
						$data['nro']['value']= $filas->nro;
						$data['nro']['class']= 'span10';

						$data['km']['name']= 'km';
						$data['km']['id']= 'km';
						$data['km']['maxlength']= 6;
						$data['km']['value']= $filas->km;
						$data['km']['class']= 'span10';

						$data['mz']['name']= 'mz';
						$data['mz']['id']= 'mz';
						$data['mz']['maxlength']= 6;
						$data['mz']['value']= $filas->mz;
						$data['mz']['class']= 'span10';

						$data['lote']['name']= 'lote';
						$data['lote']['id']= 'lote';
						$data['lote']['maxlength']= 6;
						$data['lote']['value']= $filas->lote;
						$data['lote']['class']= 'span10';

						$data['interior']['name']= 'interior';
						$data['interior']['id']= 'interior';
						$data['interior']['maxlength']= 6;
						$data['interior']['value']= $filas->interior;
						$data['interior']['class']= 'span10';

						$data['dpto']['name']= 'dpto';
						$data['dpto']['id']= 'dpto';
						$data['dpto']['maxlength']= 6;
						$data['dpto']['value']= $filas->dpto;
						$data['dpto']['class']= 'span10';

						$data['piso']['name']= 'piso';
						$data['piso']['id']= 'piso';
						$data['piso']['maxlength']= 6;
						$data['piso']['value']= $filas->piso;
						$data['piso']['class']= 'span10';

						$data['selected_t_zona']['value']=  "0".trim($filas->t_zona);

						$data['nombre_zona']['name']= 'nombre_zona';
						$data['nombre_zona']['id']= 'nombre_zona';
						$data['nombre_zona']['maxlength']= 80;
						$data['nombre_zona']['value']= utf8_encode($filas->nombre_zona);
						$data['nombre_zona']['class']= 'span10';

						$data['selected_departamento3']['value']= trim($filas->cod_dep_dom);

						$provindice3 = (strlen(trim($filas->cod_prov_nac))==1) ? "0".$filas->cod_prov_dom : $filas->cod_prov_dom ;
						$data['prov3']['value']= array(
													  trim($provindice3)   => utf8_encode($filas->nom_prov_dom)
													);

						$data['selected_distrito3']['value']= $filas->cod_dist_dom;
						$distindice3 = (strlen(trim($filas->cod_dist_dom))==1) ? "0".$filas->cod_dist_dom : $filas->cod_dist_dom ;
						$data['distritossArray3']['value']= array(
													  trim($distindice3)   => utf8_encode($filas->nom_dist_dom)
													);

						$data['odeiprovincia']['value']= array(
													  trim($filas->cod_prov)   => "-"
													);
						$data['odei_selected_provincia']['value']= trim($filas->cod_prov);

						$data['selected_provincia3']['value']= trim($filas->cod_prov_dom);
						$data['selected_distrito3']['value']= trim($filas->cod_dist_dom);
						$data['selected_nivel_instruccion']['value']=  trim($filas->nivel_instruccion);
						$data['grado']['value']= trim($filas->grado_alcanzado);

						$data['grado']['value']= array(
													  trim($filas->grado_alcanzado)   => "-"
													);
						$data['selected_grado_alcanzado']['value']= trim($filas->grado_alcanzado);


						$data['ultimo_selected_cargo']['value']= trim($filas->cargos_inei);


						$data['periodo_alcanzado']['name']= 'periodo_alcanzado';
						$data['periodo_alcanzado']['id']= 'periodo_alcanzado';
						$data['periodo_alcanzado']['value']= $filas->periodo_alcanzado;
						$data['periodo_alcanzado']['class']= 'span10';

						$data['selected_tipo_periodo']['value']= (strlen($filas->t_periodo)==1) ? "0".trim($filas->t_periodo) : trim($filas->t_periodo);
						$data['selecteprofesion']['value']= trim($filas->ocupacion);
						$data['selected_universidades']['value']= trim($filas->id_universidad);

						$data['expe_gen_a']['name']= 'expe_gen_a';
						$data['expe_gen_a']['id']= 'expe_gen_a';
						$data['expe_gen_a']['maxlength']= 2;
						$data['expe_gen_a']['value']= $filas->expe_gen_a;
						$data['expe_gen_a']['class']= 'span10';

						$data['expe_gen_m']['name']= 'expe_gen_m';
						$data['expe_gen_m']['id']= 'expe_gen_m';
						$data['expe_gen_m']['maxlength']= 2;
						$data['expe_gen_m']['value']= $filas->expe_gen_m;
						$data['expe_gen_m']['class']= 'span10';

						$data['expe_trab_a']['name']= 'expe_trab_a';
						$data['expe_trab_a']['id']= 'expe_trab_a';
						$data['expe_trab_a']['maxlength']= 2;
						$data['expe_trab_a']['value']= $filas->expe_trab_a;
						$data['expe_trab_a']['class']= 'span10';

						$data['expe_trab_m']['name']= 'expe_trab_m';
						$data['expe_trab_m']['id']= 'expe_trab_m';
						$data['expe_trab_m']['maxlength']= 2;
						$data['expe_trab_m']['value']= $filas->expe_trab_m;
						$data['expe_trab_m']['class']= 'span10';

						$data['expe_manejo_a']['name']= 'expe_manejo_a';
						$data['expe_manejo_a']['id']= 'expe_manejo_a';
						$data['expe_manejo_a']['maxlength']= 2;
						$data['expe_manejo_a']['value']= $filas->expe_manejo_a;
						$data['expe_manejo_a']['class']= 'span10';

						$data['expe_manejo_m']['name']= 'expe_manejo_m';
						$data['expe_manejo_m']['id']= 'expe_manejo_m';
						$data['expe_manejo_m']['maxlength']= 2;
						$data['expe_manejo_m']['value']= $filas->expe_manejo_m;
						$data['expe_manejo_m']['class']= 'span10';

						$data['selected_participo']=trim($filas->participo);
						$data['selected_paises']=trim($filas->cod_pais);

						$data['ultimo_ano']['name']= 'ultimo_ano';
						$data['ultimo_ano']['id']= 'ultimo_ano';
						$data['ultimo_ano']['maxlength']= 4;
						$data['ultimo_ano']['value']= $filas->ultimo_ano;
						$data['ultimo_ano']['class']= 'span10';

						$data['selected_proyectos']=trim($filas->proyectos_inei);

						$data['selected_velocidadpc']=$filas->velocidadpc;
						$data['selected_ofimatica']=$filas->ofimatica;


						$data['selected_impedimento']['value']= $filas->impedimento;
						$data['selected_disposicion']['value']= $filas->disposicion;
						$data['selected_declaracion']['value']= $filas->declaracion;

						$data['centro_estudios']['name']= 'centro_estudios';
						$data['centro_estudios']['id']= 'centro_estudios';
						$data['centro_estudios']['value']= utf8_encode($filas->centro_estudios);
						$data['centro_estudios']['class']= 'span10';

					}
					$data['msg'] = '1';
				}else{
					$data['msg'] = 'No esta inscrito en esta Convocatoria';
				}
			}
        	$data['main_content'] = 'convocatoria/mantenimiento_view';
        	$this->load->view('backend/includes/template', $data);
	}

	function _check_recaptcha()
	{
		$this->load->helper('recaptcha');

		$resp = recaptcha_check_answer($this->config->item('recaptcha_private_key', 'tank_auth'),
				$_SERVER['REMOTE_ADDR'],
				$_POST['recaptcha_challenge_field'],
				$_POST['recaptcha_response_field']);

		if (!$resp->is_valid) {
			$this->form_validation->set_message('_check_recaptcha', $this->lang->line('auth_incorrect_captcha'));
			return FALSE;
		}
		return TRUE;
	}

	function _create_recaptcha()
	{
		$this->load->helper('recaptcha');

		$options = "<script>var RecaptchaOptions = {theme: 'red'};</script>\n";

		$html = recaptcha_get_html($this->config->item('recaptcha_public_key', 'tank_auth'));

		return $options.$html;
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */