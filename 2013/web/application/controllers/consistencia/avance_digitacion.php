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
		$fecha_max = $this->input->get('v_fxmax');

		$data = $this->reporte_model->get_avance_digitacion($fecha_min,$fecha_max);

		$i=0;
		echo "[";

		foreach ($data->result() as $fila ){

			if($i>0){echo",";}

			$x= array("Sede" => $fila->Sede,
			"Prov" => $fila->Prov,
			"LocEscolares" => $fila->LocaProg,
			"LocEscolar_Censado" => $fila->TotalVisitados,
			"LocEscolar_Censado_Porc" => is_null($fila->PorAvance) ? '' : $fila->PorAvance,
			"Completa" => is_null($fila->Tcompletos) ? '' : $fila->Tcompletos,
			"Completa_Porc" => is_null($fila->Porcompletos) ? '' : $fila->Porcompletos,
			"Incompleta" => is_null($fila->TIncompleto) ? '' : $fila->TIncompleto,
			"Incompleta_Porc" => is_null($fila->PorInc) ? '' : $fila->PorInc,
			"Rechazo" => is_null($fila->TRechazo) ? '' : $fila->TRechazo,
			"Rechazo_Porc" => is_null($fila->PorRechazo) ? '' : $fila->PorRechazo,
			"Desocupada" => is_null($fila->TLocal_Cerrado) ? '' : $fila->TLocal_Cerrado,
			"Desocupada_Porc" => is_null($fila->PorLocal_Cerrado) ? '' : $fila->PorLocal_Cerrado,
			"Otro" => is_null($fila->TOtros) ? '' : $fila->TOtros,
			"Otro_Porc" => is_null($fila->PorOtros) ? '' : $fila->PorOtros
			);

			$jsonData = my_json_encode($x);

			prettyPrint($jsonData);

			$i++;
		}

		echo "]";

	}

}