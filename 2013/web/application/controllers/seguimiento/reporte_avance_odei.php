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
		$data['main_content'] = 'seguimiento/reporte_avance_odei_view';

		$this->load->view('backend/includes/template', $data);
	}

	public function view_resultado()
	{
		$periodo = $this->input->get('vperiodo');
		if ($periodo!=99){
			$data = $this->seguimiento_model->get_avance_odei($periodo);
		}else{
			$data = $this->seguimiento_model->get_avance_odei_total();
		}

		$i=0;
		echo "[";

		foreach ($data->result() as $fila ){

			if($i>0){echo",";}

			$x= array("detadepen" => $fila->detadepen,
			"LocEscolares" => $fila->LocEscolares,
			"LocEscolar_Censado" => $fila->LocEscolar_Censado,
			"LocEscolar_Censado_Porc" => is_null($fila->LocEscolar_Censado_Porc) ? '' : $fila->LocEscolar_Censado_Porc,
			"Completa" => is_null($fila->Completa) ? '' : $fila->Completa,
			"Completa_Porc" => is_null($fila->Completa_Porc) ? '' : $fila->Completa_Porc,
			"Incompleta" => is_null($fila->Incompleta) ? '' : $fila->Incompleta,
			"Incompleta_Porc" => is_null($fila->Incompleta_Porc) ? '' : $fila->Incompleta_Porc,
			"Rechazo" => is_null($fila->Rechazo) ? '' : $fila->Rechazo,
			"Rechazo_Porc" => is_null($fila->Rechazo_Porc) ? '' : $fila->Rechazo_Porc,
			"Desocupada" => is_null($fila->Desocupada) ? '' : $fila->Desocupada,
			"Desocupada_Porc" => is_null($fila->Desocupada_Porc) ? '' : $fila->Desocupada_Porc,
			"Otro" => is_null($fila->Otro) ? '' : $fila->Otro,
			"Otro_Porc" => is_null($fila->Otro_Porc) ? '' : $fila->Otro_Porc
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