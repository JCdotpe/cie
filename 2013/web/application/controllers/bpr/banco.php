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
		$this->load->library('session');

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
		$data['user_id'] = $this->session->userdata('user_id');
		$this->load->view('backend/includes/template', $data);
	}

	public function view_pregunta()
	{
		$condicion="";

		$sede_ope = $this->input->get('sede_ope');
		$prov_ope = $this->input->get('prov_ope');
		$cargo = $this->input->get('cargo');
		$cedula = $this->input->get('cedula');
		$capitulo = $this->input->get('capitulo');
		$seccion = $this->input->get('seccion');
		$pregunta = $this->input->get('pregunta');

		if ($sede_ope!=-1) { $condicion=$condicion." and cod_sede_operativa='$sede_ope'"; }
		if ($prov_ope!=-1) { $condicion=$condicion." and cod_prov_operativa='$prov_ope'"; }
		if ($cargo!=-1) { $condicion=$condicion." and cargo=$cargo"; }
		if ($cedula!=-1) { $condicion=$condicion." and cedula='$cedula'"; }
		if ($capitulo!=-1) { $condicion=$condicion." and cod_cap='$capitulo'"; }
		if ($seccion!=-1) { $condicion=$condicion." and cod_sec='$seccion'"; }
		if ($pregunta!=-1) { $condicion=$condicion." and cod_preg='$pregunta'"; }

		$data = $this->bpr_model->get_pregunta_principal($condicion);

		$i=0;
		echo "[";

		foreach ($data->result() as $fila ){

			if($i>0){echo",";}

			$x= array("id_cuestionario" => $fila->id_cuestionario,
			"id_nro" => $fila->id_nro,
			"consulta" => $fila->consulta,
			"fecha_creacion" => $fila->fecha_creacion,
			"historial" => $this->view_historial_tema($fila->id_cuestionario));

			$jsonData = my_json_encode($x);

			prettyPrint($jsonData);

			$i++;
		}

		echo "]";

	}

	public function view_historial_tema($id_cuestionario)
	{
		$res = $this->bpr_model->get_historial_tema($id_cuestionario);

		return $res->result();
	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */