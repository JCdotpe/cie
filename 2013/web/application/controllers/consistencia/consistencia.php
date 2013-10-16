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
		$this->load->model('consistencia/car_model');		
		$this->load->model('consistencia/cap3_model');		
		$this->load->model('consistencia/principal_model');		
		$this->load->model('consistencia/ubigeo_model');	
		$this->load->model('consistencia/cap4_model');		
		$this->load->model('consistencia/cap5_model');			
	}

	public function index()
	{
			$data['nav'] = TRUE;
			$data['title'] = 'Consistencia';
			$data['main_content'] = 'consistencia/index_view';
	  		$this->load->view('backend/includes/template', $data);
	}

	public function local($id, $pr = null)
	{
			$prd = (is_null($pr))? 1 : $pr;
			$data['nav'] = TRUE;
			$data['title'] = 'Predios';
			$data['predios'] = $this->principal_model->get_predios($id);
			$data['car_i'] = $this->car_model->get_car($id,$prd);
			$data['car_n'] = $this->car_model->get_car_n($id,$prd);
			$data['dptos'] = $this->ubigeo_model->get_dptos();


			$data['cap3_i'] = $this->cap3_model->get_cap3($id,$prd);
			$data['cap3_n'] = $this->cap3_model->get_cap3_n($id,$prd);	

			$data['cap4_i'] = $this->cap4_model->get_cap4($id,$prd);
			$data['cap4_n'] = $this->cap4_model->get_cap4_n($id,$prd);
			$data['cap5_i'] = $this->cap5_model->get_cap5($id,$prd);
			$data['cap5_f'] = $this->cap5_model->get_cap5_f($id,$prd);

			$data['cod'] = $id;
			$data['pr'] = $prd;
			$data['main_content'] = 'consistencia/predios_view';
	  		$this->load->view('backend/includes/template', $data);
	}	


}
