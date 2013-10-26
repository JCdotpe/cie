<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class registro extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		$this->load->library('security');
		$this->load->library('tank_auth');
		$this->lang->load('tank_auth');
		$this->load->model('udra/Udra_model');
		$this->load->model('udra/Activo_model');
		$this->load->model('udra/Udra_registro_model');
		$this->load->model('udra/udra_detalle_model');


	}

	public function index()
	{
			$data['nav'] = TRUE;
			$data['title'] = 'Registro UDRA';
			$data['activos'] = $this->Activo_model->Get_Activos();
			$data['main_content'] = 'udra/registro';
			$data['option'] = 1;
	        $this->load->view('backend/includes/template', $data);
	}



}