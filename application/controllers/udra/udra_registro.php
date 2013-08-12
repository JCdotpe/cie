<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Udra_registro extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		$this->load->library('security');
		$this->load->library('tank_auth');
		$this->lang->load('tank_auth');
		$this->load->model('convocatoria/Dpto_model');
		$this->load->model('convocatoria/Dist_model');
		$this->load->model('convocatoria/Provincia_model');
		$this->load->model('udra/Udra_registro_model');
		$this->load->model('udra/v_ambito_censal_model');
		$this->load->helper('date');
		date_default_timezone_set('America/Lima');

		if (!$this->tank_auth->is_logged_in()) {
			// redirect('/auth/login/');
			//No loging enviar a bienvenida cenpesco
			redirect('/auth/login/');
		}

		//Check user privileges
		$roles = $this->tank_auth->get_roles();
		$flag = FALSE;
		foreach ($roles as $role) {
			if($role->role_id == 4 && $role->rolename == 'UDRA'){
				$flag = TRUE;
				break;
			}
		}

		//If not author is BENDER!
		if (!$flag) {
			show_404();
			die();
		}
	}

	public function index()
	{

			$data['nav'] = TRUE;
			$data['title'] = 'UDRA';
			$data['dpto'] = 'UDRA';
			$data['departamento']=$this->Dpto_model->get_dpto();
			$data['provincia']=$this->Provincia_model->Get_Provincia();
			$data['main_content'] = 'udra/registro_view';
			$data['option'] = 4;
			$data['error'] = 0;
			$this->load->view('backend/includes/template', $data);
	}


	public function save(){

		$this->form_validation->set_rules('cod_pto','Departamento','required|alpha_numeric');
		$this->form_validation->set_rules('cod_prov','Provincia','required|alpha_numeric');
		$this->form_validation->set_rules('ambito_censal','ambito_censal','required|alpha_numeric');

		$this->form_validation->set_rules('cantidad_formularios','cantidad_formularios','required|xss_clean');

		if ($this->form_validation->run() === TRUE) {
	    		//VALIDA USUARIO NO PILOTO

	    		$registros = array(
					'COD_DPTO'	=>trim(utf8_decode($this->input->post('cod_pto'))),
					'COD_PROV'	=> trim(utf8_decode($this->input->post('cod_prov'))),
					'AMBITO_CENSAL'	=> strtoupper(trim(utf8_decode($this->input->post('ambito_censal')))),
					'CANTIDAD_FORMULARIOS'	=> trim(utf8_decode($this->input->post('cantidad_formularios'))),
					'FECHA' => date('Y-m-d h:i:s'),
					'estado'=>1
					);

	    		$flag = $this->Udra_registro_model->insert_reg($registros);

		}else{

			$data['datos'] = $this->form_validation->error_array();
   		$this->load->view('backend/includes/template', $data);

	    }

	}
	public function Expor_formularios_all()
	{
		$this->load->helper('form');

		$data['consulta'] = $this->v_ambito_censal_model->Get_Ambitos();

		$this->load->view('excel/ambito_censal_xls', $data);
	}

}