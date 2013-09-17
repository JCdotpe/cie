<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Banco extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->library('security');
		$this->load->library('tank_auth');
		$this->lang->load('tank_auth');

		$this->load->model('bpr/operativa_model');
		$this->load->model('bpr/bpr_model');
	}

	public function index()
	{
		$this->load->model('convocatoria/Dpto_model');
		$this->load->model('convocatoria/Cargo_funcional_vista');

		$data['nav'] = TRUE;
		$data['title'] = 'BPR - Banco de Preguntas y Respuestas';
		$data['main_content'] = 'bpr/banco_view';
		$data['depa'] = $this->Dpto_model->Get_Dpto();
		$data['cargos']=$this->Cargo_funcional_vista->Get_Cargo_vista();
		$this->load->view('backend/includes/template', $data);
	}

	public function view_pregunta()
	{
		$preg = $this->bpr_model->get_pregunta_principal();
		$return_arr['datos']=array();
		foreach($preg->result() as $filas)
		{
			$data['CODIGO'] = $filas->id_cuestionario;
			$data['NRO'] = $filas->id_nro;
			$data['CONSULTA'] = utf8_encode(strtoupper($filas->consulta));
			$data['FECHA'] = $filas->fecha_creacion;
			array_push($return_arr['datos'], $data);
		}
		$this->load->view('backend/json/json_view', $return_arr);
	}

	public function view_ultima_respuesta()
	{
		$res = $this->bpr_model->get_ultima_respuesta($_POST['id_cuestionario']);
		$return_arr['datos']=array();
		foreach($res->result() as $filas)
		{
			$data['CODIGO'] = $filas->id_cuestionario;
			$data['NRO'] = $filas->id_nro;
			$data['RESPUESTA'] = utf8_encode(strtoupper($filas->respuesta));
			$data['FECHA'] = $filas->fecha_respuesta;
			array_push($return_arr['datos'], $data);
		}
		$this->load->view('backend/json/json_view', $return_arr);
	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */