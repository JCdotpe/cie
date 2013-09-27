<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Registro extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->output->nocache();
		$this->load->library('form_validation');
		$this->load->library('security');
		$this->load->library('tank_auth');
		$this->lang->load('tank_auth');
		$this->lang->load('panel');
		$this->load->library('fx_email');

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
		$this->load->model('Regs_model');
	}

	public function index()
	{
		$data['nav'] = TRUE;
		$data['main_content'] = 'convocatoria/inscripcion_view';
		$this->load->view('backend/includes/template',$data);
	}

	public function get_ajax_dptobyCode(){

		$code=$_POST['code'];

		if($code){

			$resultado = $this->Dpto_model->Get_DptobyCode($code);
			$return_arr['datos']=  array();
			foreach ($resultado->result() as $fila) {

				$data['CCDD'] = utf8_encode($fila->CCDD);
				$data['Nombre'] = utf8_encode($fila->Nombre);
				array_push($return_arr['datos'],$data);
			}
			$this->load->view('backend/json/json_view', $return_arr);

		}else{
			show_404();
		}
	}

	public function get_ajax_provsbyCode(){

		$code1=$_POST['depa'];
		$code2=$_POST['prov'];

		if($code1){

			$resultado = $this->Provincia_model->get_provsbyCode($code1,$code2);
			$return_arr['datos']=  array();
			foreach ($resultado->result() as $fila) {

				$data['CCPP'] = utf8_encode($fila->CCPP);
				$data['Nombre'] = utf8_encode($fila->Nombre);
				array_push($return_arr['datos'],$data);
			}
			$this->load->view('backend/json/json_view', $return_arr);

		}else{
			show_404();
		}
	}

	public function get_ajax_distbyCode(){

		$code1=$_POST['depa'];
		$code2=$_POST['prov'];
		$code3=$_POST['dist'];

		if($code1){

			$resultado = $this->Dist_model->Get_DistbyCode($code1,$code2,$code3);
			$return_arr['datos']=  array();
			foreach ($resultado->result() as $fila) {

				$data['CCDI'] = utf8_encode($fila->CCDI);
				$data['Nombre'] = utf8_encode($fila->Nombre);
				array_push($return_arr['datos'],$data);
			}
			$this->load->view('backend/json/json_view', $return_arr);

		}else{
			show_404();
		}
	}

	public function get_ajax_prov($c){

		$this->output->cache(9999999999);
		$code = $this->input->post('code');
		$is_ajax = $this->input->post('ajax');
		if($is_ajax){

			$resultado = $this->Provincia_model->get_provs($code);
			$return_arr['datos']=  array();
			foreach ($resultado->result() as $fila) {

				$data['CCPP'] = utf8_encode($fila->CCPP);
				$data['Nombre'] = utf8_encode($fila->Nombre);
				array_push($return_arr['datos'],$data);
			}
			$this->load->view('backend/json/json_view', $return_arr);

		}else{
			show_404();
		}
	}

	public function get_ajax_prov_odei($c){

		$this->output->cache(9999999999);
		$code = $this->input->post('code');
		$is_ajax = $this->input->post('ajax');
		if($is_ajax){

			$resultado = $this->Provincia_model->get_prov_odei($code);
			$return_arr['datos']=  array();
			foreach ($resultado->result() as $fila) {

				$data['CCPP'] = utf8_encode($fila->CCPP);
				$data['Nombre'] = utf8_encode($fila->Nombre);
				array_push($return_arr['datos'],$data);
			}
			$this->load->view('backend/json/json_view', $return_arr);

		}else{
			show_404();
		}
	}

	public function get_ajax(){

		$departamento = $this->input->post('departamento');
		$provincia = $this->input->post('provincia');
		$resultado = $this->Dist_model->Get_Dist_combo($departamento,$provincia);

			$return_arr['datos']=  array();
			foreach ($resultado->result() as $fila) {

				$data['CCDI'] = utf8_encode($fila->CCDI);
				$data['Nombre'] = utf8_encode($fila->Nombre);
				array_push($return_arr['datos'],$data);
			}
			$this->load->view('backend/json/json_view', $return_arr);
	}

	public function get_ajax_direccion_odei($c){
		$departamento= $this->input->post('departamento');
		$provincia= $this->input->post('provincia');
		$data['datos'] = $this->Odei_model->Get_odei_combo($departamento,$provincia)->result();
		$this->load->view('backend/json/json_view', $data);
	}

	public function get_ajax_direccion_odei2($departamento,$provincia){

		$data['datos'] = $this->Odei_model->Get_odei_combo($departamento,$provincia)->result();
		$this->load->view('backend/json/json_view', $data);

	}

	public function get_ajax_dist($c){

		$this->output->cache(9999999999);
		$provincia = $this->input->post('provincia');
		$departamento = $this->input->post('departamento');
		$is_ajax = $this->input->post('ajax');
		if($is_ajax){
			$resultado = $this->Dist_model->Get_Dist_combo($provincia,$departamento);

			$return_arr['datos']=  array();
			foreach ($resultado->result() as $fila) {

				$data['CCDI'] = utf8_encode($fila->CCDI);
				$data['Nombre'] = utf8_encode($fila->Nombre);
				array_push($return_arr['datos'],$data);
			}
			$this->load->view('backend/json/json_view', $return_arr);
		}else{

			show_404();
		}
	}


	public function test($code,$is_ajax){


		if($is_ajax){

			$resultado = $this->Provincia_model->get_provs($code);
			$return_arr['datos']=  array();
			foreach ($resultado->result() as $fila) {

				$data['CCPP'] = utf8_encode($fila->CCPP);
				$data['Nombre'] = utf8_encode($fila->Nombre);
				array_push($return_arr['datos'],$data);
			}
			$this->load->view('backend/json/json_view', $return_arr);

		}else{
			show_404();
		}
	}


	public function inscripcion()
	{

		$data['nav'] = TRUE;
		$data['mensaje']=null;
		$data['title'] = 'Inicio';
		$data['test'] = array(1,2,3,4,5);
		$data['departamento']=$this->Dpto_model->get_dpto();

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
		$data['pais']=$this->Pais_model->Get_Pais();

		$data['provincia']=$this->Provincia_model->Get_Provincia();
		$data['profesion']=$this->Profesion_model->Get_Profesion();
		$data['option'] = 1;
		$data['main_content'] = 'convocatoria/registro_view';

		$this->form_validation->set_rules('departamento','Departamento','required|alpha_numeric');
		$this->form_validation->set_rules('cargo','Cargo','required|alpha_numeric');

		$this->form_validation->set_rules('ap_paterno','Apellido paterno','required|xss_clean');
		$this->form_validation->set_rules('ap_materno','Apellido materno','required|xss_clean');
		$this->form_validation->set_rules('nombre1','Primer nombre','required|xss_clean');
		$this->form_validation->set_rules('nombre2','segundo nombre','');
		$this->form_validation->set_rules('sexo','Sexo','required|alpha_numeric');

		$this->form_validation->set_rules('departamento','Departamento ','required|alpha_numeric');
		$this->form_validation->set_rules('provincia_postu','Provincia ','required|alpha_numeric');

		$this->form_validation->set_rules('fecha_nac','Fecha Nacimiento','required|xss_clean');
		$this->form_validation->set_rules('departamento2','Dpto Nacimiento','required|alpha_numeric');
		$this->form_validation->set_rules('provincia2','Prov. Nacimiento','required|alpha_numeric');
		$this->form_validation->set_rules('distrito2','Dist. Nacimiento','required|alpha_numeric');

		$this->form_validation->set_rules('dni','DNI','required|numeric|check_dni');
		$this->form_validation->set_rules('dni2','DNI Confirmación','required|numeric|matches[dni]');
		$this->form_validation->set_rules('ruc','RUC','required|numeric');
		$this->form_validation->set_rules('ruc2','RUC Confirmación','required|numeric|matches[ruc]');
		$this->form_validation->set_rules('estado_civil','Estado Civil','required|alpha_numeric');

		$this->form_validation->set_rules('nro_tel','Telefono','numeric');
		$this->form_validation->set_rules('nro_cel','Celular','numeric');
		$this->form_validation->set_rules('email','E-mail','required|xss_clean|valid_email');

		$this->form_validation->set_rules('t_via','Tipo Via','required|alpha_numeric');
		$this->form_validation->set_rules('nombre_via','Nombre de via','required|xss_clean');
		$this->form_validation->set_rules('nro','nro','');
		$this->form_validation->set_rules('km','km','');
		$this->form_validation->set_rules('mz','mz','');
		$this->form_validation->set_rules('interior','interior','');
		$this->form_validation->set_rules('dpto','dpto','');
		$this->form_validation->set_rules('lote','lote','');
		$this->form_validation->set_rules('piso','piso','');
		$this->form_validation->set_rules('t_zona','Tipo Zona','required|alpha_numeric');
		$this->form_validation->set_rules('nombre_zona','Nombre de zona','required|xss_clean');

		$this->form_validation->set_rules('departamento3','Dpto Domicilio','required|alpha_numeric');
		$this->form_validation->set_rules('provincia3','Prov. Domicilio','required|alpha_numeric');
		$this->form_validation->set_rules('distrito3','Distrito','required|alpha_numeric');

		$this->form_validation->set_rules('nivel_instruccion','Nivel de instruccion','required|alpha_numeric');
		$this->form_validation->set_rules('grado_alcanzado','Grado Alcanzado','required|alpha_numeric');
		$this->form_validation->set_rules('nivel_alcanzado','','');
		$this->form_validation->set_rules('tipo_periodo','Tipo periodo','required|alpha_numeric');

		$this->form_validation->set_rules('ocupacion','ocupacion','required|alpha_numeric');
		$this->form_validation->set_rules('universidad','Universidad','alpha_numeric');
		$this->form_validation->set_rules('centro_estudios','Cento de Estudios','xss_clean');


		$this->form_validation->set_rules('expe_gen_a','','');
		$this->form_validation->set_rules('expe_gen_m','','');
		$this->form_validation->set_rules('expe_trab_a','','');
		$this->form_validation->set_rules('expe_trab_m','','');
		$this->form_validation->set_rules('expe_manejo_a','','');
		$this->form_validation->set_rules('expe_manejo_m','','');

		$this->form_validation->set_rules('participo','participo','');
		$this->form_validation->set_rules('proyectos_inei','proyectos_inei','');
		$this->form_validation->set_rules('ultimo_ano','','');
		$this->form_validation->set_rules('cargos_inei','cargos_inei','');

		$this->form_validation->set_rules('declaracion','Declaracion','required|alpha_numeric');
		$this->form_validation->set_rules('periodo_alcanzado','Periodo alcanzado','required');
		$this->form_validation->set_rules('disposicion','Disposicion','required|alpha_numeric');

		$this->form_validation->set_rules('ofimatica','Ofimatica','required|alpha_numeric');
		$this->form_validation->set_rules('velocidadpc','Velocidad PC','required|alpha_numeric');
		$this->form_validation->set_rules('impedimento','Impedimento','required|alpha_numeric');

        if ($this->form_validation->run() === TRUE)
        {

        	$fecha = date("Y-m-d", strtotime($this->input->post('fecha_nac')));
			$c_data = array(
					'ipclient' => "hola",
					'cargos_inei'=> "cargo"
			);
			$flag = $this->regs_model->insert_reg($c_data);
        	$data['msg'] = 'Gracias por registrarse. ' . anchor(base_url('index.php/convocatoria/consulta'), 'Continuar');
			if(!$flag){
				$data['msg'] = 'Error inesperado, intentelo nuevamente.';
			}else{
				$data['sitename'] = $this->config->item('website_name', 'tank_auth');
				$data['nombre'] = $this->input->post('nombre1') . ' ' . $this->input->post('ap_paterno');
				$user_email = $this->input->post('email');
				$this->fx_email->send('inscrito', $user_email, $data);
			}

        	$this->load->view('backend/general/message_view', $data);


        }else{
        	$is_ajax = $this->input->post('ajax');
        	if(!$is_ajax){
        		$this->load->view('backend/includes/template', $data);
        	}else{
				$data['datos'] = $this->form_validation->error_array();
				$this->load->view('backend/json/json_view', $data);
        	}
        }

	}

	public function save (){

		$fecha = date("Y-m-d", strtotime($this->input->post('fecha_nac')));
		$fecha_exp = date("Y-m-d", strtotime($this->input->post('fecha_exp')));

		$this->form_validation->set_rules('departamento','Departamento','required|alpha_numeric');
		$this->form_validation->set_rules('cod_prov','Departamento','required|alpha_numeric');
		$this->form_validation->set_rules('cargo','Cargo','required|alpha_numeric');

		$this->form_validation->set_rules('ap_paterno','Apellido paterno','required|xss_clean');
		$this->form_validation->set_rules('ap_materno','Apellido materno','required|xss_clean');
		$this->form_validation->set_rules('nombre1','Primer nombre','required|xss_clean');
		$this->form_validation->set_rules('nombre2','segundo nombre','');
		$this->form_validation->set_rules('sexo','Sexo','required|alpha_numeric');

		$this->form_validation->set_rules('fecha_nac','Fecha Nacimiento','required|xss_clean');
		$this->form_validation->set_rules('departamento2','Dpto Nacimiento','');
		$this->form_validation->set_rules('provincia2','Prov. Nacimiento','');
		$this->form_validation->set_rules('distrito2','Dist. Nacimiento','');

		$this->form_validation->set_rules('dni','DNI','required|xss_clean|check_dni');
		$this->form_validation->set_rules('dni2','DNI Confirmación','required|xss_clean|matches[dni]');
		$this->form_validation->set_rules('ruc','RUC','required|xss_clean');
		$this->form_validation->set_rules('ruc2','RUC Confirmación','required|xss_clean|matches[ruc]');
		$this->form_validation->set_rules('estado_civil','Estado Civil','required|alpha_numeric');

		$this->form_validation->set_rules('nro_tel','Telefono','xss_clean');
		$this->form_validation->set_rules('nro_cel','Celular','xss_clean');
		$this->form_validation->set_rules('email','E-mail','required|xss_clean|valid_email');

		$this->form_validation->set_rules('t_via','Tipo Via','required|alpha_numeric');
		$this->form_validation->set_rules('nombre_via','Nombre de via','required|xss_clean');
		$this->form_validation->set_rules('nro','nro','');
		$this->form_validation->set_rules('km','km','');
		$this->form_validation->set_rules('mz','mz','');
		$this->form_validation->set_rules('interior','interior','');
		$this->form_validation->set_rules('dpto','dpto','');
		$this->form_validation->set_rules('lote','lote','');
		$this->form_validation->set_rules('piso','piso','');
		$this->form_validation->set_rules('t_zona','Tipo Zona','required|alpha_numeric');
		$this->form_validation->set_rules('nombre_zona','Nombre de zona','required|xss_clean');

		$this->form_validation->set_rules('departamento3','Dpto Domicilio','required|alpha_numeric');
		$this->form_validation->set_rules('provincia3','Prov. Domicilio','required|alpha_numeric');
		$this->form_validation->set_rules('distrito3','Distrito','required|alpha_numeric');

		$this->form_validation->set_rules('nivel_instruccion','Nivel de instruccion','required|alpha_numeric');
		$this->form_validation->set_rules('grado_alcanzado','Grado Alcanzado','required|alpha_numeric');
		$this->form_validation->set_rules('nivel_alcanzado','','');
		$this->form_validation->set_rules('tipo_periodo','Tipo periodo','required|alpha_numeric');

		$this->form_validation->set_rules('ocupacion','ocupacion','required|alpha_numeric');
		$this->form_validation->set_rules('universidad','Universidad','alpha_numeric');
		$this->form_validation->set_rules('centro_estudios','Cento de Estudios','xss_clean');


		$this->form_validation->set_rules('expe_gen_a','','');
		$this->form_validation->set_rules('expe_gen_m','','');
		$this->form_validation->set_rules('expe_trab_a','','');
		$this->form_validation->set_rules('expe_trab_m','','');
		$this->form_validation->set_rules('expe_manejo_a','','');
		$this->form_validation->set_rules('expe_manejo_m','','');

		$this->form_validation->set_rules('participo','participo','');
		$this->form_validation->set_rules('proyectos_inei','proyectos_inei','');
		$this->form_validation->set_rules('ultimo_ano','','');
		$this->form_validation->set_rules('cargos_inei','cargos_inei','');

		$this->form_validation->set_rules('declaracion','Declaracion','required|alpha_numeric');
		$this->form_validation->set_rules('periodo_alcanzado','Periodo alcanzado','required');
		$this->form_validation->set_rules('disposicion','Disposicion','required|alpha_numeric');

		$this->form_validation->set_rules('ofimatica','Ofimatica','required|alpha_numeric');
		$this->form_validation->set_rules('velocidadpc','Velocidad PC','required|alpha_numeric');
		$this->form_validation->set_rules('impedimento','Impedimento','required|alpha_numeric');
		$this->form_validation->set_rules('pais','Pais','required|alpha_numeric');



        if ($this->form_validation->run() === TRUE)
        {
		$data = array(
					'ipclient' => utf8_decode($this->input->ip_address()),
					'useragent' => $this->agent->agent_string(),
					'cargo'=> trim($this->input->post('cargo')),
					'ap_materno'=> trim(utf8_decode($this->input->post('ap_materno'))),
					'ap_paterno'=> trim(utf8_decode($this->input->post('ap_paterno'))),
					'centro_estudios'=> trim(utf8_decode($this->input->post('centro_estudios'))),
					'declaracion'=> utf8_decode($this->input->post('declaracion')),

					'ofimatica'=> trim($this->input->post('ofimatica')),
					'velocidadpc'=> trim($this->input->post('velocidadpc')),
					'impedimento'=> trim($this->input->post('impedimento')),

					'id_universidad'=> trim($this->input->post('id_universidad')),
					'cod_dep'=> trim($this->input->post('cod_depep')),
					'cod_dep_nac'=> trim($this->input->post('departamento2')),
					'cod_dep_dom'=> trim($this->input->post('departamento3')),
					'disposicion'=> trim($this->input->post('disposicion')),
					'cod_dist'=> trim($this->input->post('cod_dist')),
					'cod_dist_nac'=> trim($this->input->post('distrito2')),
					'cod_dist_dom'=> trim($this->input->post('distrito3')),
					'dni'=> trim($this->input->post('dni')),
					'dpto'=> trim($this->input->post('dpto')),
					'email'=> trim($this->input->post('email')),
					'estado_civil'=> trim($this->input->post('estado_civil')),
					'expe_gen_a'=> trim($this->input->post('expe_gen_a')),
					'expe_gen_m'=> trim($this->input->post('expe_gen_m')),
					'expe_manejo_a'=> trim($this->input->post('expe_manejo_a')),
					'expe_manejo_m'=> trim($this->input->post('expe_manejo_m')),
					'expe_trab_a'=> trim($this->input->post('expe_trab_a')),
					'expe_trab_m'=> trim($this->input->post('expe_trab_m')),
					'codigo_Convocatoria'=> trim($this->input->post('codigo_convocatoria')),
					'codigo_CredPresupuestario'=> trim($this->input->post('codigo_CredPresupuestario')),
					'codigo_adm'=> trim($this->input->post('codigo_adm')),
					'fecha_nac'=> $fecha,

					'grado_alcanzado'=> trim($this->input->post('grado_alcanzado')),
					'interior'=> trim($this->input->post('interior')),
					'km'=> trim($this->input->post('km')),
					'lote'=> trim($this->input->post('lote')),
					'mz'=> trim($this->input->post('mz')),
					'nivel_instruccion'=> trim($this->input->post('nivel_instruccion')),
					'nom_dep'=> trim(utf8_decode($this->input->post('nom_dep'))),
					'nom_dep_dom'=> trim(utf8_decode($this->input->post('nom_dep_dom'))),
					'nom_dep_nac'=> trim(utf8_decode($this->input->post('nom_dep_nac'))),
					'nom_dist'=> trim(utf8_decode($this->input->post('nom_dist'))),
					'nom_dist_dom'=> trim(utf8_decode($this->input->post('nom_dist_dom'))),
					'nom_dist_nac'=> trim(utf8_decode($this->input->post('nom_dist_nac'))),
					'nom_prov'=> trim(utf8_decode($this->input->post('nom_prov'))),
					'nom_prov_dom'=> trim(utf8_decode($this->input->post('nom_prov_dom'))),
					'nom_prov_nac'=> trim(utf8_decode($this->input->post('nom_prov_nac'))),
					'nombre1'=> trim(utf8_decode($this->input->post('nombre1'))),
					'nombre2'=> trim(utf8_decode($this->input->post('nombre2'))),
					'nombre_via'=> trim(utf8_decode($this->input->post('nombre_via'))),
					'nombre_zona'=> trim(utf8_decode($this->input->post('nombre_zona'))),
					'nro'=> trim($this->input->post('nro')),
					'nro_cel'=> trim($this->input->post('nro_cel')),
					'nro_tel'=> trim($this->input->post('nro_tel')),
					'ocupacion'=> trim(utf8_decode($this->input->post('ocupacion'))),
					'participo'=> trim($this->input->post('participo')),
					'periodo_alcanzado'=> trim($this->input->post('periodo_alcanzado')),
					'piso'=> trim($this->input->post('piso')),
					'cod_prov'=> trim($this->input->post('cod_prov')),
					'cod_prov_nac'=> trim($this->input->post('provincia2')),
					'cod_prov_dom'=> trim($this->input->post('provincia3')),
					'proyectos_inei'=> trim($this->input->post('proyectos_inei')),
					'cargos_inei'=> trim($this->input->post('ultimo_cargo')),
					'ruc'=> trim($this->input->post('ruc')),
					'sexo'=> trim($this->input->post('sexo')),
					't_via'=> trim($this->input->post('t_via')),
					't_zona'=> trim($this->input->post('t_zona')),
					't_periodo'=> trim($this->input->post('tipo_periodo')),
					'ultimo_ano'=> trim($this->input->post('ultimo_ano')),
					'estado'=> 1,
					'cod_pais'=> trim($this->input->post('pais')),
					'n_registro' => trim(utf8_decode($this->input->post('n_registro'))),
					'fecha_exp' => $fecha_exp,
					'activo'=> 1,
					'created'=> date('Y-m-d H:i:s')
			);
			$flag = $this->Regs_model->insert_reg($data);
			$data['msg2'] = '{"dni":"2"}';
			if(!$flag){
				$data['msg2'] = 'Error inesperado, intentelo nuevamente.';
			}
        	$this->load->view('backend/general/message_view', $data);
        }else{
        	$is_ajax = $this->input->post('ajax');
        	if(!$is_ajax){
        		$this->load->view('backend/includes/template', $data);
        	}else{
				$data['datos'] = $this->form_validation->error_array();
				$this->load->view('backend/json/json_view', $data);
        	}
        }

	}

	public function update (){
		$fecha = date("Y-m-d", strtotime($this->input->post('fecha_nac')));
		$fecha_exp = date("Y-m-d", strtotime($this->input->post('fecha_exp')));

		$data = array(
					'ipclient' => utf8_decode($this->input->ip_address()),
					'useragent' => $this->agent->agent_string(),
					'cargo'=> $this->input->post('cargo'),
					'ap_materno'=> utf8_decode($this->input->post('ap_materno')),
					'ap_paterno'=> utf8_decode($this->input->post('ap_paterno')),
					'centro_estudios'=> utf8_decode($this->input->post('centro_estudios')),
					'declaracion'=> utf8_decode($this->input->post('declaracion')),

					'ofimatica'=> $this->input->post('ofimatica'),
					'velocidadpc'=> $this->input->post('velocidadpc'),
					'impedimento'=> $this->input->post('impedimento'),

					'id_universidad'=> $this->input->post('id_universidad'),
					'cod_dep'=> $this->input->post('cod_depep'),
					'cod_dep_nac'=> $this->input->post('departamento2'),
					'cod_dep_dom'=> $this->input->post('departamento3'),
					'disposicion'=> $this->input->post('disposicion'),
					'cod_dist'=> $this->input->post('cod_dist'),
					'cod_dist_nac'=> $this->input->post('distrito2'),
					'cod_dist_dom'=> $this->input->post('distrito3'),
					'dni'=> $this->input->post('dni'),
					'dpto'=> $this->input->post('dpto'),
					'email'=> $this->input->post('email'),
					'estado_civil'=> $this->input->post('estado_civil'),
					'expe_gen_a'=> $this->input->post('expe_gen_a'),
					'expe_gen_m'=> $this->input->post('expe_gen_m'),
					'expe_manejo_a'=> $this->input->post('expe_manejo_a'),
					'expe_manejo_m'=> $this->input->post('expe_manejo_m'),
					'expe_trab_a'=> $this->input->post('expe_trab_a'),
					'expe_trab_m'=> $this->input->post('expe_trab_m'),
					'codigo_Convocatoria'=> $this->input->post('codigo_convocatoria'),
					'codigo_CredPresupuestario'=> $this->input->post('codigo_CredPresupuestario'),
					'codigo_adm'=> $this->input->post('codigo_adm'),
					'fecha_nac'=> $fecha,

					'grado_alcanzado'=> $this->input->post('grado_alcanzado'),
					'interior'=> $this->input->post('interior'),
					'km'=> $this->input->post('km'),
					'lote'=> $this->input->post('lote'),
					'mz'=> $this->input->post('mz'),
					'nivel_instruccion'=> $this->input->post('nivel_instruccion'),
					'nom_dep'=> utf8_decode($this->input->post('nom_dep')),
					'nom_dep_dom'=> utf8_decode($this->input->post('nom_dep_dom')),
					'nom_dep_nac'=> utf8_decode($this->input->post('nom_dep_nac')),
					'nom_dist'=> utf8_decode($this->input->post('nom_dist')),
					'nom_dist_dom'=> utf8_decode($this->input->post('nom_dist_dom')),
					'nom_dist_nac'=> utf8_decode($this->input->post('nom_dist_nac')),
					'nom_prov'=> utf8_decode($this->input->post('nom_prov')),
					'nom_prov_dom'=> utf8_decode($this->input->post('nom_prov_dom')),
					'nom_prov_nac'=> utf8_decode($this->input->post('nom_prov_nac')),
					'nombre1'=> utf8_decode($this->input->post('nombre1')),
					'nombre2'=> utf8_decode($this->input->post('nombre2')),
					'nombre_via'=> utf8_decode($this->input->post('nombre_via')),
					'nombre_zona'=> utf8_decode($this->input->post('nombre_zona')),
					'nro'=> $this->input->post('nro'),
					'nro_cel'=> $this->input->post('nro_cel'),
					'nro_tel'=> $this->input->post('nro_tel'),
					'ocupacion'=> utf8_decode($this->input->post('ocupacion')),
					'participo'=> $this->input->post('participo'),
					'periodo_alcanzado'=> $this->input->post('periodo_alcanzado'),
					'piso'=> $this->input->post('piso'),
					'cod_prov'=> $this->input->post('cod_prov'),
					'cod_prov_nac'=> $this->input->post('provincia2'),
					'cod_prov_dom'=> $this->input->post('provincia3'),
					'proyectos_inei'=> $this->input->post('proyectos_inei'),
					'cargos_inei'=> $this->input->post('ultimo_cargo'),
					'ruc'=> $this->input->post('ruc'),
					'sexo'=> $this->input->post('sexo'),
					't_via'=> $this->input->post('t_via'),
					't_zona'=> $this->input->post('t_zona'),
					't_periodo'=> $this->input->post('tipo_periodo'),
					'ultimo_ano'=> $this->input->post('ultimo_ano'),
					'estado'=> 1,
					'cod_pais'=> trim($this->input->post('pais')),
					'n_registro' => trim(utf8_decode($this->input->post('n_registro'))),
					'fecha_exp' => $fecha_exp,
					'activo'=> 1,
					'modified' => date('Y-m-d H:i:s')
			);

		$code = $this->Regs_model->update_reg($data,$this->input->post('dni'));

	}
	public function Send_Email($email,$nombre){
		$para  = $email;
		$titulo = 'Registro satisfactorio CIE 2013';
		$mensaje = '
		<html>
		<head>
		  <title>Correo de confirmación de registro</title>
		</head>
		<body>
		  <p>Gracias por registrarse Sr(a).'.$nombre.', ya forma parte del proceso de selección.</p>
		</body>
		</html>
		';
		$cabeceras = 'Content-type: text/html; charset=utf-8' . "\r\n";
		$cabeceras .= 'From: INEI <seleccioncie@inei.gob.pe>' . "\r\n";
		mail($para, $titulo, $mensaje, $cabeceras);
	}

	public function delete($c){

		$dni = $this->input->post('dni');
		$code = $this->Regs_model->delete_reg($dni);
	}
}