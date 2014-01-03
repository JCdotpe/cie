<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Avance_digitacion extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->library('security');
		$this->load->library('tank_auth');
		$this->lang->load('tank_auth');		


		$this->load->library('form_validation');
		$this->load->library('security');
		$this->load->library('tank_auth');	
		$this->lang->load('tank_auth');	
		$this->load->model('regs_model');		
		$this->load->model('consistencia/reporte_model');

		//User is logged in
		// if (!$this->tank_auth->is_logged_in()) {
		// 	redirect('/auth/login/');
		// }

		//Check user privileges 
		// $roles = $this->tank_auth->get_roles();
		// $flag = FALSE;
		// foreach ($roles as $role) {
		// 	if($role->role_id == 16){
		// 		$flag = TRUE;
		// 		break;
		// 	}
		// }

		//If not author is the maintenance guy!
		// if (!$flag) {
		// 	show_404();
		// 	die();
		// }		
	}


	public function index()
	{
		$data['option'] = 1;
		$data['nav'] = TRUE;
		$data['title'] = 'Reporte de Avance de Procesamiento';
		$data['main_content'] = 'consistencia/reportes/avance_digitacion_view';
		$this->load->view('backend/includes/template', $data);
	}

	public function digitacion()
	{
		$data = $this->reporte_model->get_avance_digitacion();

		$i=0;
		echo "[";

		foreach ($data->result() as $fila ){

			if($i>0){echo",";}

			$x= array("Departamento" => $fila->Departamento,
			"Meta" => $fila->Meta,
			"Digitado" => $fila->Digitado,
			"Avance" => $fila->Avance
			);

			$jsonData = my_json_encode($x);

			prettyPrint($jsonData);

			$i++;
		}

		echo "]";

	}

	public function index_userdig()
	{
		$data['option'] = 2;
		$data['nav'] = TRUE;
		$data['title'] = 'Reporte de Avance de Procesamiento por Digitador';
		$data['main_content'] = 'consistencia/reportes/avance_digitacion_userdig_view';
		$this->load->view('backend/includes/template', $data);
	}


	public function digitacion_userdig()
	{
		$data = $this->reporte_model->get_avance_digitacion_userdig();

		$t_local = 0;
		$t_predio = 0;
		$t_edif = 0;
		$t_amb = 0;

		foreach ($data->result() as $value) {
			$t_local += $value->c_local;
			$t_predio += $value->c_predio;
			$t_edif += $value->c_edifica;
			$t_amb += $value->c_ambient;
		}

		$i=0;
		echo "[";

		foreach ($data->result() as $fila ){

			if($i>0){echo",";}

			$x= array("user_id" => $fila->user_id,
			"c_local" => $fila->c_local,
			"prc_local" => ($t_local > 0) ? ($fila->c_local * 100) / $t_local : 0,
			"c_predio" => $fila->c_predio,
			"prc_predio" => ($t_predio > 0) ? ($fila->c_predio * 100) / $t_predio : 0, 
			"c_edifica" => $fila->c_edifica,
			"prc_edifica" => ($t_edif > 0) ? ($fila->c_edifica * 100) / $t_edif : 0,
			"c_ambient" => $fila->c_ambient,
			"prc_ambient" => ($t_amb > 0) ? ($fila->c_ambient * 100) / $t_amb : 0
			);

			$jsonData = my_json_encode($x);

			prettyPrint($jsonData);

			$i++;
		}

		echo "]";

	}

}