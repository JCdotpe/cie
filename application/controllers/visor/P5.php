<?php
 if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class p5 extends CI_Controller {

	function __construct()
	{
		parent::__construct();

		$this->load->library('tank_auth');
		$this->lang->load('tank_auth');
		$this->load->model('visor/p5_model');
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

	public function Find_Total_Edif(){

			$codigo=$this->input->post('cod_local');
			//$codigo=$_REQUEST['code'];
			$resultado = $this->p5_model->Get_Total_Edif($codigo);
			$return_arr['datos']=  array();
			foreach ($resultado->result() as $fila) {
				$data['P5_TOT_E'] = utf8_encode($fila->P5_TOT_E);
				array_push($return_arr['datos'],$data);
			}

			header_json();
			$jsonData = json_encode($return_arr['datos']);
			prettyPrint($jsonData);
	}

}
?>