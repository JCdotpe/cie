<?php
 if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Convocatoria_interno extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->library('tank_auth');
		$this->load->library('security');
		$this->lang->load('tank_auth');
		$this->load->model('convocatoria/convocatoria_model');


		if (!$this->tank_auth->is_logged_in()) {

			redirect('/auth/login/');
		}


		$roles = $this->tank_auth->get_roles();
		$flag = FALSE;
		foreach ($roles as $role) {
			if($role->role_id ==1 && $role->rolename == 'Convocatoria'){
				$flag = TRUE;
				break;
			}
		}

		if (!$flag) {
			show_404();
			die();
		}

	}
	public function index(){
			$data['option'] = 1;
			$data['nav'] = TRUE;
			$data['title'] = 'Convocatoria';
			$data['datos']	= $this->convocatoria_model->Get_Convocatoria();

			$data['main_content'] = 'convocatoria/inscripcion_view_interno';
	        $this->load->view('backend/includes/template', $data);
	}
}
