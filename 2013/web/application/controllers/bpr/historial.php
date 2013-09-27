<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Historial extends CI_Controller {

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
		
		$data['nav'] = TRUE;
		$data['title'] = 'BPR - Historial de Preguntas y Respuestas';
		$data['main_content'] = 'bpr/historial_view';
		$data['codigo'] = $_GET['variable'];
		$this->load->view('backend/includes/template', $data);
	}

	public function view_pregunta_historial()
	{
		$data = $this->bpr_model->get_pregunta_historial($_GET['id_cuestionario']);

		$i=0;
		echo "[";

		foreach ($data->result() as $fila ){

			if($i>0){echo",";}

			$x= array("id_cuestionario" => $fila->id_cuestionario,
			"id_nro" => $fila->id_nro,
			"consulta" => $fila->consulta,
			"fecha_creacion" => $fila->fecha_creacion,
			"respuesta" => $this->view_respuesta_historial($fila->id_cuestionario,$fila->id_nro));

			$jsonData = my_json_encode($x);

			prettyPrint($jsonData);

			$i++;
		}

		echo "]";

	}

	public function view_respuesta_historial($id_cuestionario,$id_nro)
	{
		$res = $this->bpr_model->get_respuesta_historial($id_cuestionario,$id_nro);

		return $res->result();
	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */