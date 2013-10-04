<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Menu extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->library('security');
		$this->load->library('tank_auth');
		$this->lang->load('tank_auth');
	}

	public function index()
	{		
		$data['nav'] = TRUE;
		$data['title'] = 'BPR - Menu';
		$data['main_content'] = 'bpr/index_view';
		$this->load->view('backend/includes/template', $data);
	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */