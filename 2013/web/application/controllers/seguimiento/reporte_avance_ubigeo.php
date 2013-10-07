<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Reporte_avance_ubigeo extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->library('security');
		$this->load->library('tank_auth');
		$this->lang->load('tank_auth');	
		$this->load->model('seguimiento/seguimiento_model');
		$this->load->model('seguimiento/operativa_model');
		
		$this->load->model('convocatoria/dpto_model');
		$this->load->model('convocatoria/provincia_model');

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
		$data['option'] = 5;
		$data['nav'] = TRUE;
		$data['title'] = 'Reporte de Ubigeo';
		$data['main_content'] = 'seguimiento/reporte_avance_ubigeo_view';
		$data['depa'] = $this->dpto_model->Get_Dpto();
		$this->load->view('backend/includes/template', $data);
	}

	public function obtenerprovincia()
	{
		$prov = $this->provincia_model->get_provs($_POST['id_depa']);
		$return_arr['datos']=array();
		foreach($prov->result() as $filas)
		{
			$data['CODIGO'] = $filas->CCPP;
			$data['NOMBRE'] = utf8_encode(strtoupper($filas->Nombre));
			array_push($return_arr['datos'], $data);
		}
		$this->load->view('backend/json/json_view', $return_arr);
	}

	public function view_resultado()
	{
		$depa = $this->input->get('vdepa');
		$prov = $this->input->get('vprov');
		$periodo = $this->input->get('vperiodo');
		
		$tipo = 0;

		if ($depa!=99 && $prov!=99 && $periodo!=99)
		{
			$tipo = 1;
		}elseif ($depa!=99 && $prov!=99 && $periodo==99){
			$tipo = 2;
		}elseif ($depa!=99 && $prov==99 && $periodo!=99){
			$tipo = 3;
		}elseif ($depa!=99 && $prov==99 && $periodo==99){
			$tipo = 4;
		}elseif ($depa==99 && $periodo!=99){
			$tipo = 5;
		}elseif ($depa==99 && $periodo==99){
			$tipo = 6;
		}
		$data = $this->seguimiento_model->get_avance_ubigeo($depa,$prov,$periodo,$tipo);

		$i=0;
		echo "[";

		foreach ($data->result() as $fila ){
			
			$provincia = ($tipo!=5 && $tipo!=6) ? $fila->NombProv : '';

			if($i>0){echo",";}

			$x= array("departamento" => $fila->NombDpto,
				"provincia" => $provincia,
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