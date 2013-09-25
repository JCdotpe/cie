<?php
 if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class capitulo3 extends CI_Controller {

	function __construct()
	{
		parent::__construct();

		$this->load->library('tank_auth');
		$this->lang->load('tank_auth');
		$this->load->model('visor/visor_model');

		if (!$this->tank_auth->is_logged_in()) {
			redirect('/auth/login/');
		}

	}

	public function index(){

			$data['option'] = 1;
			$data['nav'] = FALSE;
			$data['title'] = 'Capitulo 3';
			$code="-1";
			$data['main_content'] = 'visor/capitulo3_view';
	        $this->load->view('backend/includes/template', $data);
	}

//=====================BASICAS==============================
}
?>