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
		$this->load->model('consistencia/cap1_model');		
		$this->load->model('consistencia/cap2_model');		
		$this->load->model('consistencia/cap3_model');		
		$this->load->model('consistencia/principal_model');		
		$this->load->model('consistencia/ubigeo_model');	
		$this->load->model('consistencia/cap4_model');
		$this->load->model('consistencia/cap5_model');
		$this->load->model('consistencia/cap9_model');
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


			$data['cap1_p1_a'] = $this->cap1_model->get_p1_a($id,$prd);
			$data['cap1_p1_a_2n'] = $this->cap1_model->get_p1_a_2n($id,$prd);
			$data['cap1_p1_a_2_8n'] = $this->cap1_model->get_p1_a_2_8n($id,$prd);
			$data['cap1_p1_a_2_9n'] = $this->cap1_model->get_p1_a_2_9n($id,$prd);
			$data['cap1_p1_b'] = $this->cap1_model->get_p1_b($id,$prd);
			$data['cap1_p1_c'] = $this->cap1_model->get_p1_c($id,$prd);
			$data['cap1_p1_c_20n'] = $this->cap1_model->get_p1_c_20n($id,$prd);






			$data['cap2_p2_a'] = $this->cap2_model->get_p2_a($id,$prd);
			$data['cap2_p2_b'] = $this->cap2_model->get_p2_b($id,$prd);
			$data['cap2_p2_b_9n'] = $this->cap2_model->get_p2_b_9n($id,$prd);
			$data['cap2_p2_b_10n'] = $this->cap2_model->get_p2_b_10n($id,$prd);
			$data['cap2_p2_b_11n'] = $this->cap2_model->get_p2_b_11n($id,$prd);
			$data['cap2_p2_b_12n'] = $this->cap2_model->get_p2_b_12n($id,$prd);
			$data['cap2_p2_c'] = $this->cap2_model->get_p2_c($id,$prd);

			$data['cap2_p2_d'] = $this->cap2_model->get_p2_d($id,$prd);
			$data['cap2_p2_d_1n'] = $this->cap2_model->get_p2_d_1n($id,$prd);
			$data['cap2_p2_d_3n'] = $this->cap2_model->get_p2_d_3n($id,$prd);
			$data['cap2_p2_d_5n'] = $this->cap2_model->get_p2_d_5n($id,$prd);
			$data['cap2_p2_d_7n'] = $this->cap2_model->get_p2_d_7n($id,$prd);
			$data['cap2_p2_d_9n'] = $this->cap2_model->get_p2_d_9n($id,$prd);

			$data['cap2_p2_e'] = $this->cap2_model->get_p2_e($id,$prd);

			$data['cap2_p2_f'] = $this->cap2_model->get_p2_f($id,$prd);

			$data['cap2_p2_g'] = $this->cap2_model->get_p2_g($id,$prd);

			$data['cap2_p2_g_2n'] = $this->cap2_model->get_p2_g_2n($id,$prd);

			$data['dptos'] = $this->ubigeo_model->get_dptos();


			$data['cap3_i'] = $this->cap3_model->get_cap3($id,$prd);
			$data['cap3_n'] = $this->cap3_model->get_cap3_n($id,$prd);	

			$data['cap4_i'] = $this->cap4_model->get_cap4($id,$prd);
			$data['cap4_n'] = $this->cap4_model->get_cap4_n($id,$prd);
			$data['cap5_i'] = $this->cap5_model->get_cap5($id,$prd);
			$data['cap5_f'] = $this->cap5_model->get_cap5_f($id,$prd);


			$data['cap9_f'] = $this->cap9_model->get_cap9_f($id,$prd);


			$data['cod'] = $id;
			$real_prd = ($data['predios']->num_rows() > 0)? $prd : 0; 
			$data['pr'] = $real_prd;
			$data['main_content'] = 'consistencia/predios_view';
	  		$this->load->view('backend/includes/template', $data);
	}	


}
