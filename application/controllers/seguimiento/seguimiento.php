<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Seguimiento extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->library('security');
		$this->load->library('tank_auth');
		$this->lang->load('tank_auth');
		$this->load->library('session');
		$this->load->model('Seguimiento/seguimiento_model');

		//User is logged in
		if (!$this->tank_auth->is_logged_in()) {
			redirect();
		}

		//Check user privileges 
		$roles = $this->tank_auth->get_roles();
		$flag = FALSE;
		foreach ($roles as $role) {
			if($role->role_id == 11){
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
		$data['title'] = 'Seguimiento';
		$data['main_content'] = 'seguimiento/index_view';
		$this->load->view('backend/includes/template', $data);
	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */