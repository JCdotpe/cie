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
			"prc_local" => ($t_local > 0) ? round(($fila->c_local * 100) / $t_local,1) : 0,
			"c_predio" => $fila->c_predio,
			"prc_predio" => ($t_predio > 0) ? round(($fila->c_predio * 100) / $t_predio,1) : 0, 
			"c_edifica" => $fila->c_edifica,
			"prc_edifica" => ($t_edif > 0) ? round(($fila->c_edifica * 100) / $t_edif,1) : 0,
			"c_ambient" => $fila->c_ambient,
			"prc_ambient" => ($t_amb > 0) ? round(($fila->c_ambient * 100) / $t_amb,1) : 0
			);

			$jsonData = my_json_encode($x);

			prettyPrint($jsonData);

			$i++;
		}

		echo "]";

	}

	public function index_estadsitua()
	{
		$data['option'] = 3;
		$data['nav'] = TRUE;
		$data['title'] = 'Reporte de Estado Situacional';
		$data['main_content'] = 'consistencia/reportes/estado_situacional_view';
		$this->load->view('backend/includes/template', $data);
	}

	public function estado_situacional()
	{
		$data = $this->reporte_model->get_estado_situacional();

		$i=0;
		echo "[";

		foreach ($data->result() as $fila ){

			if($i>0){echo",";}

			$x= array("cod_dpto" => $fila->cod_dpto,
			"Dpto" => $fila->Dpto,
			"Total_Meta" => $fila->Total_Meta,
			"Total_Cant" => $fila->Total_Cant,
			"Total_Porc" => $fila->Total_Porc,
			"Tablet_Meta" => $fila->Tablet_Meta,
			"Tablet_Cant" => $fila->Tablet_Cant,
			"Tablet_Porc" => $fila->Tablet_Porc,
			"OTIN_Meta" => $fila->OTIN_Meta,
			"OTIN_Udra" => is_null($fila->OTIN_Udra) ? '' : $fila->OTIN_Udra,
			"OTIN_Cant" => $fila->OTIN_Cant,
			"OTIN_Porc" => $fila->OTIN_Porc
			);

			$jsonData = my_json_encode($x);

			prettyPrint($jsonData);

			$i++;
		}

		echo "]";

	}

	public function index_coberotin()
	{
		$data['option'] = 4;
		$data['nav'] = TRUE;
		$data['title'] = 'Reporte de Cobertura de OTIN';
		$data['main_content'] = 'consistencia/reportes/cobertura_otin_view';
		$this->load->view('backend/includes/template', $data);
	}


	public function cobertura_otin()
	{
		$data = $this->reporte_model->get_cobertura_otin();

		$i=0;
		echo "[";

		foreach ($data->result() as $fila ){

			if($i>0){echo",";}

			$x= array("Sede_Operativa" => $fila->Sede_Operativa,
			"Provincia_Operativa" => $fila->Provincia_Operativa,
			"Departamento" => $fila->Departamento,
			"Provincia" => $fila->Provincia,
			"Distrito" => $fila->Distrito,
			"codigo_de_local" => $fila->codigo_de_local,
			"Digitado" => $fila->Digitado
			);

			$jsonData = my_json_encode($x);

			prettyPrint($jsonData);

			$i++;
		}

		echo "]";

	}

}