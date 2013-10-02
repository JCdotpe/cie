<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Udra_reporte extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->library('security');
		$this->load->library('tank_auth');
		$this->lang->load('tank_auth');
		//User is logged in
	/*	if (!$this->tank_auth->is_logged_in()) {
			redirect();
		}

		//Check user privileges
		$roles = $this->tank_auth->get_roles();
		$flag = FALSE;
		foreach ($roles as $role) {
			if($role->rolename == 'UDRA'){
				$flag = TRUE;
				break;
			}
		}

		//If not author is BENDER!
		if (!$flag) {
			show_404();
			die();
		}*/
	}

	public function index()
	{
		$this->load->model('udra/Udra_model');
		$this->load->model('udra/Activo_model');

		$data['option'] = 3;
		$data['nav'] = TRUE;
		$data['title'] = 'Reporte de UDRA';
		$data['main_content'] = 'udra/udra_reporte_view';
		$data['activos'] = $this->Activo_model->Get_Activos();
		$this->load->view('backend/includes/template', $data);
	}

}
