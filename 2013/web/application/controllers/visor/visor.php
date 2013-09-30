<?php
 if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Visor extends CI_Controller {

	function __construct()
	{
		parent::__construct();

		$this->load->library('tank_auth');
		$this->lang->load('tank_auth');
		//$this->load->model('convocatoria/Resultados_model');
		
		$this->load->helper('my');

		if (!$this->tank_auth->is_logged_in()) {
			redirect('/auth/login/');
		}

	}

	public function index(){
			$data['option'] = 1;
			$data['nav'] = TRUE;
			$data['title'] = 'Seguimiento';
			$code="-1";
			//$data['datos']	= $this->Resultados_model->Get_Resultados($code);

			$this->load->model('convocatoria/Dpto_model');
			$data['depa'] = $this->Dpto_model->Get_Dpto();

			$data['main_content'] = 'visor/visor_view';
	        $this->load->view('backend/includes/template', $data);
	}

}

?>