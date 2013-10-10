<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Visor extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		
		$this->load->library('form_validation');
		$this->load->library('security');
		$this->load->library('tank_auth');
		$this->lang->load('tank_auth');
		$this->load->helper('form');
		
		// if (!$this->tank_auth->is_logged_in()) {
		// 	redirect('/auth/login/');
		// }

		
		// $roles = $this->tank_auth->get_roles();
		// $flag = FALSE;
		// foreach ($roles as $role) {
		// 	if($role->role_id == 3){
		// 		$flag = TRUE;
		// 		break;
		// 	}
		// }

		
		// if (!$flag) {
		// 	show_404();
		// 	die();
		// }
		
	}

	public function index()
	{
		$data['nav'] = TRUE;
		$data['title'] = 'Visor';
		$data['main_content'] = 'menu/visor_view';
		$this->load->view('backend/includes/template', $data);
	}	
}