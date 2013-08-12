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
		$this->load->model('cargos_model');
		$this->load->model('ocupacion_model');
		
		$this->load->model('universidades_model');
		$this->load->model('proyectos_inei_model');	
		$this->load->model('ubigeo_model');
		$this->load->model('regs_model');

		
		$this->load->model('fuente_finan_model');
		
	}

	public function index()
	{

		$data['nav'] = TRUE;
		$data['mensaje']=null;
		$data['title'] = 'Inicio';
		$data['test'] = array(1,2,3,4,5);

		
		$data['fuente_financiamiento']  = $this->fuente_finan_model->get_fuente_financiamiento();


		$data['departamento']=$this->ubigeo_model->get_dptos();

		
		$data['odei']  = $this->ubigeo_model->get_odei();
		

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

		
		$data['proyectos']=$this->proyectos_inei_model->select_proj();
		$data['cargos']=$this->cargos_model->select_cargo();
		$data['ocupaciones']=$this->ocupacion_model->select_ocupa();
		
		$data['universidades']=$this->universidades_model->select_uni();
		$data['main_content'] = 'presupuesto/template_form';
   		


		$this->form_validation->set_rules('fuentefinan','fuentefinan','required|alpha_numeric');

		
		$this->form_validation->set_rules('departamento','Departamento','required|alpha_numeric');
		
		$this->form_validation->set_rules('cargo','Cargo','required|alpha_numeric');

		$this->form_validation->set_rules('ap_paterno','Apellido paterno','required|xss_clean');
		$this->form_validation->set_rules('ap_materno','Apellido materno','required|xss_clean');
		$this->form_validation->set_rules('nombre1','Primer nombre','required|xss_clean');
		$this->form_validation->set_rules('nombre2','segundo nombre','');
		$this->form_validation->set_rules('sexo','Sexo','required|alpha_numeric');

		
		$this->form_validation->set_rules('fecha_nac','Fecha Nacimiento','required|xss_clean');
		$this->form_validation->set_rules('departamento2','Dpto Nacimiento','required|alpha_numeric');
		$this->form_validation->set_rules('provincia2','Prov. Nacimiento','required|alpha_numeric');
		$this->form_validation->set_rules('distrito2','Dist. Nacimiento','required|alpha_numeric');

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

		$this->form_validation->set_rules('ocupacion','Ocupacion','required|alpha_numeric');
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
					'ipclient' => $this->input->ip_address(),
					'useragent' => $this->agent->agent_string(),
					'cargo'=> $this->input->post('cargo'),
					'ap_materno'=> $this->input->post('ap_materno'),
					'ap_paterno'=> $this->input->post('ap_paterno'),
					'cargos_inei'=> $this->input->post('cargos_inei'),
					'centro_estudios'=> $this->input->post('centro_estudios'),
					'declaracion'=> $this->input->post('declaracion'),

					'ofimatica'=> $this->input->post('ofimatica'),
					'velocidadpc'=> $this->input->post('velocidadpc'),
					'impedimento'=> $this->input->post('impedimento'),

					'cod_dep'=> $this->input->post('departamento'),
					'cod_dep_nac'=> $this->input->post('departamento2'),
					'cod_dep_dom'=> $this->input->post('departamento3'),
					'disposicion'=> $this->input->post('disposicion'),
					'cod_dist'=> $this->input->post('distrito'),
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

					'fecha_nac'=> $fecha,

					'grado_alcanzado'=> $this->input->post('grado_alcanzado'),
					'interior'=> $this->input->post('interior'),
					'km'=> $this->input->post('km'),
					'lote'=> $this->input->post('lote'),
					'mz'=> $this->input->post('mz'),
					'nivel_instruccion'=> $this->input->post('nivel_instruccion'),
					'nom_dep'=> $this->input->post('nom_dep'),
					'nom_dep_dom'=> $this->input->post('nom_dep_dom'),
					'nom_dep_nac'=> $this->input->post('nom_dep_nac'),
					'nom_dist'=> $this->input->post('nom_dist'),
					'nom_dist_dom'=> $this->input->post('nom_dist_dom'),
					'nom_dist_nac'=> $this->input->post('nom_dist_nac'),					
					'nom_prov'=> $this->input->post('nom_prov'),		
					'nom_prov_dom'=> $this->input->post('nom_prov_dom'),
					'nom_prov_nac'=> $this->input->post('nom_prov_nac'),
					'nombre1'=> $this->input->post('nombre1'),
					'nombre2'=> $this->input->post('nombre2'),
					'nombre_via'=> $this->input->post('nombre_via'),
					'nombre_zona'=> $this->input->post('nombre_zona'),
					'nro'=> $this->input->post('nro'),
					'nro_cel'=> $this->input->post('nro_cel'),
					'nro_tel'=> $this->input->post('nro_tel'),
					'ocupacion'=> $this->input->post('ocupacion'),
					'participo'=> $this->input->post('participo'),
					'periodo_alcanzado'=> $this->input->post('periodo_alcanzado'),
					'piso'=> $this->input->post('piso'),
					'cod_prov'=> $this->input->post('provincia'),
					'cod_prov_nac'=> $this->input->post('provincia2'),
					'cod_prov_dom'=> $this->input->post('provincia3'),
					'proyectos_inei'=> $this->input->post('proyectos_inei'),					
					'ruc'=> $this->input->post('ruc'),			
					'sexo'=> $this->input->post('sexo'),
					't_via'=> $this->input->post('t_via'),
					't_zona'=> $this->input->post('t_zona'),
					't_periodo'=> $this->input->post('tipo_periodo'),
					'ultimo_ano'=> $this->input->post('ultimo_ano'),
					'universidad'=> $this->input->post('universidad'),
					'estado'=> 1,
					'activo'=> 1,
					'created'=> date('Y-m-d H:i:s')
				);   
			$flag = $this->regs_model->insert_reg($c_data);     	
        	$data['msg'] = 'Gracias por registrarse. ' . anchor(base_url('convocatoria/consulta'), 'Continuar');
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


}
