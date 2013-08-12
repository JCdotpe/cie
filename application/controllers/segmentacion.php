<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Segmentacion extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->output->nocache();
		$this->load->library('form_validation');
		$this->load->library('security');
		$this->load->library('tank_auth');
		$this->lang->load('tank_auth');	
		
		if (!$this->tank_auth->is_logged_in()) {
			redirect('/auth/login/');
		}

		
		$roles = $this->tank_auth->get_roles();
		$flag = FALSE;
		foreach ($roles as $role) {
			if($role->role_id == 3 && $role->rolename == 'Rutas y Segmentación'){
				$flag = TRUE;
				break;
			}
		}

		
		if (!$flag) {
			show_404();
			die();
		}
		
		$this->load->model('pesca_model');
		$this->load->model('ubigeo_model');
	}


	public function index()
	{
			$data['nav'] = TRUE;
		
			$data['title'] = 'Rutas y Segmentación';
			$data['dptos'] = $this->ubigeo_model->get_dptos();
			$data['main_content'] = 'segmentacion/index_view';
		
	        $this->load->view('backend/includes/template', $data);
	        

	}


}
