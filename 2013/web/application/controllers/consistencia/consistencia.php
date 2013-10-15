<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Consistencia extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->library('security');
		$this->load->library('tank_auth');	
		$this->lang->load('tank_auth');	
		$this->load->model('regs_model');		
		$this->load->model('consistencia/principal');		
	}

	public function index()
	{
			$data['nav'] = TRUE;
			$data['title'] = 'Consistencia';
			$data['main_content'] = 'consistencia/index_view';
	  		$this->load->view('backend/includes/template', $data);
	}

	public function local($id)
	{
			$data['nav'] = TRUE;
			$data['title'] = 'Predios';
			$data['predios'] = $this->principal->get_predios($id);
			$data['cod'] = $id;
			$data['main_content'] = 'consistencia/predios_view';
	  		$this->load->view('backend/includes/template', $data);
	}	

	public function predio($id,$pr)
	{
			$data['nav'] = TRUE;
			$data['title'] = 'Predios';
			$data['predios'] = $this->principal->get_predios($id);
			$data['cod'] = $id;
			$data['main_content'] = 'consistencia/predios_view';
	  		$this->load->view('backend/includes/template', $data);
	}	

}
