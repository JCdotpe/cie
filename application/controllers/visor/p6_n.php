<?php
 if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class p6_n extends CI_Controller {

	function __construct()
	{
		parent::__construct();

		$this->load->library('tank_auth');
		$this->lang->load('tank_auth');
		$this->load->model('visor/P6_n_model');
		$this->load->model('visor/visor_model');
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
			$data['main_content'] = 'visor/visor_view';
	        $this->load->view('backend/includes/template', $data);
	}

	public function Find_All_by_local(){

			$codigo=$this->input->post('cod_local');
			$resultado = $this->P6_n_model->Get_All_by_local($codigo)->result();
			header_json();
			$jsonData = json_encode($resultado);
			prettyPrint($jsonData);
	}

}
?>