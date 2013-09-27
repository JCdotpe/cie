<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Banco extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->library('security');
		$this->load->library('tank_auth');
		$this->lang->load('tank_auth');
		$this->load->helper('my');

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
		$data['sedeope'] = $this->operativa_model->Get_SedeOpe();
		$data['cargos']=$this->Cargo_funcional_vista->Get_Cargo_vista();
		$data['cedula']=$this->operativa_model->Get_Cedula();
		$this->load->view('backend/includes/template', $data);
	}

	public function view_pregunta()
	{
		$data = $this->bpr_model->get_pregunta_principal();

		$i=0;
		echo "[";

		foreach ($data->result() as $fila ){

			if($i>0){echo",";}

			$x= array("id_cuestionario" => $fila->id_cuestionario,
			"id_nro" => $fila->id_nro,
			"consulta" => $fila->consulta,
			"fecha_creacion" => $fila->fecha_creacion,
			"respuesta" => $this->view_ultima_respuesta($fila->id_cuestionario));

			$jsonData = my_json_encode($x);

			prettyPrint($jsonData);

			$i++;
		}

		echo "]";

	}

	public function view_ultima_respuesta($id_cuestionario)
	{
		$res = $this->bpr_model->get_ultima_respuesta($id_cuestionario);

		return $res->result();
	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */