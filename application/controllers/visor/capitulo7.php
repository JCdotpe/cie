<?php
 if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class capitulo7 extends CI_Controller {

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
			$data['title'] = 'Capitulo 7';
			$code="-1";
			$data['main_content'] = 'visor/capitulo7_view';
	        $this->load->view('backend/includes/template', $data);
	}

//=====================BASICAS==============================
}
?>