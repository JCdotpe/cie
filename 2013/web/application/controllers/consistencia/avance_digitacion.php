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
		$data['title'] = 'Reporte de Avance de Digitacion';
		$data['main_content'] = 'consistencia/reportes/avance_digitacion_view';
		$this->load->view('backend/includes/template', $data);
	}

	public function digitacion()
	{
		$fecha_min = $this->input->get('v_fxmin');
		// $fecha_max = $this->input->get('v_fxmax');

		$data = $this->reporte_model->get_avance_digitacion($fecha_min);

		$i=0;
		echo "[";

		foreach ($data->result() as $fila ){

			if($i>0){echo",";}

			$x= array("Sede_Operativa" => $fila->Sede_Operativa,
			"Meta" => $fila->Meta,
			"Digit_Dia" => $fila->Digit_Dia,
			"Digit_Acum" => $fila->Digit_Acum,
			"Avance1" => $fila->Avance1,
			"Falta_Dig" => $fila->Falta_Dig,
			"Avance2" => $fila->Avance2
			);

			$jsonData = my_json_encode($x);

			prettyPrint($jsonData);

			$i++;
		}

		echo "]";

	}

}