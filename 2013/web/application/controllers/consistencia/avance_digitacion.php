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

	public function index_usuario()
	{
		$data['option'] = 2;
		$data['nav'] = TRUE;
		$data['title'] = 'Reporte de Avance de Procesamiento por Usuario';
		$data['main_content'] = 'consistencia/reportes/avance_digitacion_usuario_view';
		$this->load->view('backend/includes/template', $data);
	}


	public function digitacion_usuario()
	{
		$data = $this->reporte_model->get_avance_digitacion_usuario();

		$i=0;
		echo "[";

		foreach ($data->result() as $fila ){

			if($i>0){echo",";}

			$x= array("Departamento" => $fila->Departamento,
			"Meta" => $fila->Meta,
			"Usuario" => is_null($fila->Usuario) ? '' : $fila->Usuario,
			"Digitado" => $fila->Digitado,
			"Avance" => $fila->Avance
			);

			$jsonData = my_json_encode($x);

			prettyPrint($jsonData);

			$i++;
		}

		echo "]";

	}

}