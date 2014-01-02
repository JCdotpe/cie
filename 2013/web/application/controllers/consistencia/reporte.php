	<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Reporte extends CI_Controller {
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
		$this->load->model('consistencia/reporte_model');

		//User is logged in
		// if (!$this->tank_auth->is_logged_in()) {
		// 	redirect('/auth/login/');
		// }

		//Check user privileges 
		// $roles = $this->tank_auth->get_roles();
		// $flag = FALSE;
		// foreach ($roles as $role) {
		// 	if($role->role_id == 16){
		// 		$flag = TRUE;
		// 		break;
		// 	}
		// }

		//If not author is the maintenance guy!
		// if (!$flag) {
		// 	show_404();
		// 	die();
		// }		
	}


	public function index()
	{
		$data['option'] = 0;
		$data['nav'] = TRUE;
		$data['title'] = 'Reporte de Consistencia';
		$data['main_content'] = 'consistencia/reporte_view';
		$this->load->view('backend/includes/template', $data);
	}

}