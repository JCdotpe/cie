<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Reporte_avance_odei extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->library('security');
		$this->load->library('tank_auth');
		$this->lang->load('tank_auth');
		$this->load->model('seguimiento/seguimiento_model');
		$this->load->model('seguimiento/operativa_model');
		//User is logged in
		if (!$this->tank_auth->is_logged_in()) {
			redirect();
		}

		//Check user privileges 
		$roles = $this->tank_auth->get_roles();
		$flag = FALSE;
		foreach ($roles as $role) {
			if($role->role_id == 11){
				$flag = TRUE;
				break;
			}
		}

		//If not author is BENDER!
		if (!$flag) {
			show_404();
			die();
		}
	}

	public function index()
	{
		$this->load->model('seguimiento/operativa_model');
		$data['option'] = 4;
		$data['nav'] = TRUE;
		$data['title'] = 'Reporte de Avance por ODEI';
		$data['Sede'] = $this->operativa_model->Get_Sede();
		$data['main_content'] = 'seguimiento/reporte_avance_odei_view';

		$this->load->view('backend/includes/template', $data);
	}

	public function view_resultado()
	{
		$sede = $this->input->get('vsede');
		$prov = $this->input->get('vprov');
		
		$periodo_min = $this->input->get('vperiodo1');
		$periodo_max = $this->input->get('vperiodo2');
		/*if ($periodo!=99){
			$data = $this->seguimiento_model->get_avance_odei($periodo);
		}else{
			$data = $this->seguimiento_model->get_avance_odei_total();
		}
		*/

		if ( $periodo_min == 1 && $periodo_max == 14 ) {
			$periodo = 99;
		}else if ( $periodo_min == '' && $periodo_max == '' ){
			$periodo = -1;
		}else{
			$periodo = 1;
		}

		$data = $this->seguimiento_model->get_avance_odeiST($sede,$prov,$periodo,$periodo_min,$periodo_max);	

		

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

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */