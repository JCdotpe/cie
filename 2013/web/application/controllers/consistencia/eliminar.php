<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Eliminar extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->library('security');
		$this->load->library('tank_auth');
		$this->lang->load('tank_auth');		


		$this->load->library('form_validation');
		$this->load->library('security');
		$this->load->library('tank_auth');	
		$this->lang->load('tank_auth');	
		$this->load->model('regs_model');		
		$this->load->model('consistencia/car_model');			
		$this->load->model('consistencia/principal_model');		

		//User is logged in
		if (!$this->tank_auth->is_logged_in()) {
			redirect('/auth/login/');
		}

		//Check user privileges 
		$roles = $this->tank_auth->get_roles();
		$flag = FALSE;
		foreach ($roles as $role) {
			if($role->role_id == 16){
				$flag = TRUE;
				break;
			}
		}

		$users = $this->tank_auth->get_user_id();
		if ($users != 849) {
			$flag = FALSE;
		}

		//If not author is the maintenance guy!
		if (!$flag) {
			show_404();
			die();
		}		
	}


	public function index()
	{
			// $datos['flag'] = $flag;	
			// $datos['msg'] = $msg;	
			// $data['datos'] = $datos;
			$data['main_content'] = 'consistencia/eliminar_view';
	  		$this->load->view('backend/includes/template', $data);					
	}


	public function del()
	{

		$is_ajax = $this->input->post('ajax');
		$cod_local = $this->input->post('cod_local');
		$datos['cod_local'] = $cod_local;
		if($is_ajax){
			$this->principal_model->eliminar_cod($cod_local);
			$data['datos'] = $datos;
			$this->load->view('backend/json/json_view', $data);					
		}else{
			show_404();
		}

	}

}